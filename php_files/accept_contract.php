<?php

session_start();



require_once '../php_baseDonnée_files/connexionAuDataBase.php';
echo " recuperation" ;

$id_contrat = $_POST[' id_contrat'];

if (!$id_contrat) {
 
    echo json_encode(['success' => false, 'message' => 'Identifiant du contrat manquant']);
    exit;
}


    
    $sql = "SELECT bailleur_Email, locataire_nom, locataire_email FROM Contrats WHERE id_contrat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_contrat]); 
    $contract = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contract) {
        echo json_encode(['success' => false, 'message' => 'Contrat non trouvé']);
        exit;
    }
    $to = $contract['bailleur_Email'];
    $subject = "Confirmation d'acceptation de l'offre";
    $message = "Bonjour,\n\nVotre offre a été acceptée par l'étudiant : {$contract['locataire_nom']}.\n\nMerci !";
    $headers = "From: " . $contract['locataire_email'] . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


    $mailSent = mail($to, $subject, $message, $headers);
    
    echo json_encode([
        'success' => $mailSent,
        'message' => $mailSent ? 'Email envoyé avec succès' : 'Échec de l\'envoi de l\'email'
    ]);



?>