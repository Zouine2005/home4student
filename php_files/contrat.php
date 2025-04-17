

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de Location</title>
    <link rel="stylesheet" href="../css_files/contrat.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css_files/pop-up-validation-annonce.css" type="text/css">
    <script src="../javascript_files/pop-up-validation.js"></script>
</head> 

<body>
<form id="contratForm" action="../php_baseDonnée_files/savecontrat.php" method="post">
<main class="table" id="contrat">
     
        <div class="container">
        <div class="export__file">   
            <label for="export-file" class="export__file-btn" title="exporte file"><i class="fa-solid fa-file-pdf"></i></label>
            <input type="checkbox" id="export-file">
            <div class="export__file-option">
                <label for="">IMPRIMER PDF  &nbsp;&#10140;</label>
                <label for="export-file" id="toPDF" onclick="window.print()">PDF <img src="../photo_files/th.jpeg" alt=""></label>
            </div> 
        </div>
            <h1 style="border-style: dashed; text-align: center">Contrat de Location </h1>
            <p><strong><i>BAILLEUR:</i></strong>
                <input type="text" name="bailleur" placeholder="D’autre part, ci-après dénommé « LE BAILLEUR »" required></p>
                <p><strong><i>BAILLEUREmeil:</i></strong>
                <input type="email" name="bailleur_Email" placeholder="email « LE BAILLEUR »" required></p>
            
            
                <div class="section">
                
            </div>
            
            <h2 class="art-soulignement">DÉPÔT DE GARANTIE:</h2>
            <p>A titre de dépôt de garantie, le locataire est tenu de verser la somme de  
                <input type="text" name="montant_garantie" placeholder="montant $" style="width: 70px;"> représentant au maximum un mois de loyer en principal.
                Cette somme est affectée à garantir l'exécution des obligations locatives et ne pourra, sous aucun prétexte, être affectée au paiement de loyer et charges durant le cours du bail ou de l’un de ses renouvellements.</p>
            
            <h2 class="art-soulignement">Besoins en matière de logement:</h2>
            <div class="checkbox-wrapper-10">
                <input type="checkbox" name="besoins_logement[]" value="eau" id="id01">
                <label for="id01">Eau</label><br>
                <input type="checkbox" name="besoins_logement[]" value="electricite" id="id02">
                <label for="id02">Électricité</label><br>
                <input type="checkbox" name="besoins_logement[]" value="chauffage" id="id03">
                <label for="id03">Chauffage</label><br>
                <input type="checkbox" name="besoins_logement[]" value="internet" id="id04">
                <label for="id04">Internet</label><br>
            </div>
            
            <h2 class="art-soulignement">Droit interne du logement:</h2>
            <div class="container1">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" name="droits_logement[]" value="payer_loyer" id="checkboxOne"><label for="checkboxOne">Payer le loyer et les charges à temps</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="souscrire_assurance" id="checkboxTwo"><label for="checkboxTwo">Souscrire une assurance</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="nbr_etudiant" id="checkboxThree"><label for="checkboxThree">Nombre d'étudiants > 1</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="respect" id="checkboxFour"><label for="checkboxFour">Respect</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="reglement_interieur" id="checkboxFive"><label for="checkboxFive">Respecter le règlement intérieur</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="nettoyage_chambres" id="checkboxSix"><label for="checkboxSix">Nettoyage de chambres</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="vie_privee" id="checkboxSeven"><label for="checkboxSeven">Respecter la vie privée</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="reparations" id="checkboxEight"><label for="checkboxEight">Effectuer les réparations</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="securite_chambre" id="checkboxNine"><label for="checkboxNine">Sécuriser la chambre</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="modification_logement" id="checkboxTen"><label for="checkboxTen">Ne pas modifier le logement sans accord</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="sous_location" id="checkboxEleven"><label for="checkboxEleven">Ne pas sous-louer le logement</label></li>
                    <li><input type="checkbox" name="droits_logement[]" value="informations_problemes" id="checkboxFifteen"><label for="checkboxFifteen">Informer le propriétaire en cas de problème</label></li>
                </ul>

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
            
            <div class="section">
                <h2 class="art-soulignement">Durée de la location</h2>
                <div class="section-content">
                    <p><strong>Date de début:</strong> 
                        <input type="date" name="date_debut"> à <input type="time" name="heure_debut"></p>
                    <p><strong>Date de fin:</strong> 
                        <input type="date" name="date_fin"> à <input type="time" name="heure_fin"></p>
                    <p class="highlight">Si vous souhaitez des horaires différents, merci de nous consulter.</p><br><br>
                    <pre class="Signature">Signature du locataire                            Signature du mandataire</pre><br><br><br>
                </div>
                
            </div>
  
            <button type="submit" id="submit" onclick="show_pop_up_validation()">ENREGISTRER</button>
          </form>
          
        </div>
        


    </div>
  
    <script src="../javascript_files/contrat.js"></script>
</main>


<div class="pop-up-validation">
        <div class="pop-up-cadre">
            <i class="fa -solid fa-circle-check" style="color:blue; font-size: 35px;"></i> 
            <span>Le contrat a été enregistré avec succès!</span>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
   
    setTimeout(function() {
       
        const exportCheckbox = document.getElementById('export-file');
        exportCheckbox.checked = true;
        
       
        setTimeout(function() {
            const pdfButton = document.getElementById('toPDF');
            if(pdfButton) {
               
                const printContent = document.getElementById('contrat-content').innerHTML;
                const printWindow = window.open('', '_blank');
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Contrat de Location</title>
                        <style>
                            body { font-family: Arial; margin: 20px; }
                            table { border-collapse: collapse; width: 100%; }
                            td { padding: 8px; border: 1px solid #ddd; }
                            hr { margin: 15px 0; border: 0; border-top: 1px dashed #999; }
                        </style>
                    </head>
                    <body>
                        ${printContent}
                        <script>
                            setTimeout(function() {
                                window.print();
                                window.close();
                            }, 200);
                        <\/script>
                    </body>
                    </html>
                `);
                printWindow.document.close();
            }
        }, 300);
    }, 500);
});
</script>
</body>
</html>