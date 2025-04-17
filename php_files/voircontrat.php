<?php
session_start();
include_once '../php_baseDonnée_files/connexionAuDataBase.php';


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$sql = "SELECT * FROM Contrats";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt;

function getValue($array, $key, $default = 'Non spécifié') {
    return isset($array[$key]) && !empty($array[$key]) ? htmlspecialchars($array[$key]) : '<span class="warning">'.$default.'</span>';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contrats</title>
    <link rel="stylesheet" href="../css_files/contrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css_files/voircontrat.css">
</head>
<body>
    <main class="table" id="contrat">
        <div class="container">
            <div class="export__file">   
                <label for="export-file" class="export__file-btn" title="Exporter en PDF"><i class="fa-solid fa-file-pdf"></i></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-option">
                    <label for="">Export PDF &nbsp;&#10140;</label>
                    <label for="export-file" id="toPDF" onclick="window.print()">PDF <img src="../photo_files/th.jpeg" alt=""></label>
                </div> 
            </div>
            
            <h1 style="border-style: dashed; text-align: center">Contrat de Location</h1>
            

            <?php if ($result->rowCount() > 0): ?>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="contract-container">
                        <div class="contract-header">
                            <p>Date de création: <?= getValue($row, 'date_creation', 'Non spécifiée') ?></p>
                        </div>
                        
                        <div class="contract-section">
                            <h3>Parties Contractantes</h3>
                            <div class="contract-field">
                                <strong>Propriétaire:</strong> <?= getValue($row, 'bailleur_nom') ?>
                            </div>
                            <div class="contract-field">
                                <strong>Email propriétaire:</strong> <?= getValue($row, 'bailleur_Email') ?>
                            </div>
                        </div>
                        
                        <form id="contratForm_<?= $row['id_contrat'] ?>" class="contratForm" action="../php_baseDonnée_files/savecontrat3.php" method="post">
                            <input type="hidden" name="id_contrat" value="<?= $row['id_contrat'] ?>">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            
                            <div class="contract-section">
                                <h3>Informations Locataire</h3>
                                <table>
                                    <tr>
                                        <th>Nom / Prénom:</th>
                                        <td><input type="text" name="locataire_nom"   placeholder="Entrer votre_nom" required></td>
                                    </tr>
                                    <tr>
                                        <th>Adresse:</th>
                                        <td><input type="text" name="locataire_adresse" placeholder="Entrer votre_adresse"   required></td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone:</th>
                                        <td><input type="text" name="locataire_telephone" placeholder="Entrer votre_telephone"  required></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="email" name="locataire_email"placeholder="Entrer votre_email"   required></td>
                                    </tr>
                                    <tr>
                                        <th>CNE:</th>
                                        <td><input type="text" name="locataire_cne"placeholder="Entrer votre_cne"  required></td>
                                    </tr>
                                    <tr>
                                        <th>Code Apogée:</th>
                                        <td><input type="text" name="locataire_code_apoge"placeholder="Entrer votre_code_apoge"  ></td>
                                    </tr>
                                    <tr>
                                        <th>Nombre de personnes:</th>
                                        <td><input type="number" name="nombre_personnes"  min="1" required></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contract-section">
    <h3>Détails Financiers</h3>
    <div class="contract-field">
        <strong>Montant Garantie:</strong> <?= getValue($row, 'montant_garantie', '0.00') ?> DH
    </div>
</div>

<div class="contract-section">
                                <h3>Besoins en matière de logement</h3>
                                <div class="contract-field">
                                    <strong>Eau:</strong> <?= isset($row['besoin_eau']) && $row['besoin_eau'] ? '✓' : '✗' ?>
                                </div>
                                <div class="contract-field">
                                    <strong>Électricité:</strong> <?= isset($row['besoin_electricite']) && $row['besoin_electricite'] ? '✓' : '✗' ?>
                                </div>
                                <div class="contract-field">
                                    <strong>Chauffage:</strong> <?= isset($row['besoin_chauffage']) && $row['besoin_chauffage'] ? '✓' : '✗' ?>
                                </div>
                                <div class="contract-field">
                                    <strong>Internet:</strong> <?= isset($row['besoin_internet']) && $row['besoin_internet'] ? '✓' : '✗' ?>
                                </div>
                            </div>

<div class="contract-section">
    <h3>Durée de la Location</h3>
    <div class="contract-field">
        <strong>Date de début:</strong> <?= getValue($row, 'date_debut', '0000-00-00') ?> à <?= getValue($row, 'heure_debut', '00:00:00') ?>
    </div>
    <div class="contract-field">
        <strong>Date de fin:</strong> <?= getValue($row, 'date_fin', '0000-00-00') ?> à <?= getValue($row, 'heure_fin', '00:00:00') ?>
    </div>
</div>
   
<h2 class="art-soulignement">DÉCLARATION DES PARTIES :</h2>
            <p>Bailleur et locataire, résidents en maroc au sens de la réglementation fiscale, déclarent ne pas être l’objet de poursuites ou de condamnations dans le cadre d’une procédure collective, faillite, redressement ou liquidation judiciaire, interdiction ou déchéance de droits civiques, limitant leur capacité juridique. 
                Nonobstant les dispositions des articles 88-4 et 1801 du code civil, les termes du présent acte et les notifications ou significations faites en application du présent acte par le bailleur seront de plein droit opposables au partenaire lié par un pacte civil de solidarité au locataire.</p>
            
            <h2 class="art-soulignement">OBLIGATIONS DU LOCATAIRE:</h2>
            <ul>
                <li>De payer le loyer et les charges récupérables aux termes convenus.</li>
                <li>D'user paisiblement des locaux loués.</li>
                <li>De répondre des dégradations et pertes qui surviennent pendant la durée du contrat.</li>
                <li>De prendre à sa charge l'entretien courant du logement, des équipements mentionnés au contrat et les menues réparations.</li>
                <li>De permettre l'accès aux lieux loués pour la préparation et l'exécution de travaux d'amélioration des parties communes ou des parties privatives.</li>
                <li>De ne pas transformer les locaux et équipements loués sans l'accord écrit du propriétaire.</li>
                <li>De s'assurer contre les risques dont il doit répondre en sa qualité de locataire et d'en justifier lors de la remise des clés et chaque année, sauf si le bailleur en a souscrit une pour son compte.</li>
            </ul>
            
                            
                         
                            
                            <div class="signature-area">
                                <div class="signature-row">
                                    <p>Signature du locataire _________________________</p>
                                    <p>Signature du propriétaire _________________________</p>
                                </div>
                            </div>
                            
                            <div class="action-buttons"> 
                                               
                            <button  type="submit" class="accept-btn">Accepter</button>
                                <button type="button" class="reject-btn" onclick="page_daccueil()">Refuser</button>
                            </div>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 50px;">
                    <h2 style="color: red;">Aucun contrat trouvé dans la base de données</h2>
                    <p>Il n'y a actuellement aucun contrat enregistré.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <script src="../javascript_files/contrat.js"></script>
        <script src="../javascript_files/redirectHelp.js"></script>
        <script src="../javascript_files/fond.js"></script>
    </main>
</body>
</html>
<?php $conn = null; ?>
