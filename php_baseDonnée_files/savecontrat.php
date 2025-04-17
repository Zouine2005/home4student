<?php
// save_contrat.php

// تكوين الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "location_colocation_logement_db";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استقبال البيانات من النموذج مع التحقق من وجودها
$bailleur_nom = $_POST['bailleur'] ?? '';
$bailleur_Email  = $_POST['bailleur_Email'] ?? '';
$locataire_nom = $_POST['locataire_nom'] ?? '';
$locataire_adresse = $_POST['locataire_adresse'] ?? '';
$locataire_telephone = $_POST['locataire_telephone'] ?? '';
$locataire_email = $_POST['locataire_email'] ?? '';
$locataire_cne = $_POST['locataire_cne'] ?? '';
$locataire_code_apoge = $_POST['locataire_code_apoge'] ?? '';
$nombre_personnes = $_POST['nombre_personnes'] ?? 1;
$montant_garantie = $_POST['montant_garantie'] ?? 0;
$date_debut = $_POST['date_debut'] ?? '';
$heure_debut = $_POST['heure_debut'] ?? '00:00';
$date_fin = $_POST['date_fin'] ?? '';
$heure_fin = $_POST['heure_fin'] ?? '00:00';

// معالجة الخدمات المطلوبة (تحويل من checkbox إلى boolean)
$besoin_eau = isset($_POST['besoins_logement']) && in_array('eau', $_POST['besoins_logement']) ? 1 : 0;
$besoin_electricite = isset($_POST['besoins_logement']) && in_array('electricite', $_POST['besoins_logement']) ? 1 : 0;
$besoin_chauffage = isset($_POST['besoins_logement']) && in_array('chauffage', $_POST['besoins_logement']) ? 1 : 0;
$besoin_internet = isset($_POST['besoins_logement']) && in_array('internet', $_POST['besoins_logement']) ? 1 : 0;

// معالجة الحقوق والواجبات (تحويل من checkbox إلى boolean)
$droit_payer_loyer = isset($_POST['droits_logement']) && in_array('payer_loyer', $_POST['droits_logement']) ? 1 : 0;
$droit_souscrire_assurance = isset($_POST['droits_logement']) && in_array('souscrire_assurance', $_POST['droits_logement']) ? 1 : 0;
$droit_nbr_etudiant = isset($_POST['droits_logement']) && in_array('nbr_etudiant', $_POST['droits_logement']) ? 1 : 0;
$droit_respect = isset($_POST['droits_logement']) && in_array('respect', $_POST['droits_logement']) ? 1 : 0;
$droit_reglement_interieur = isset($_POST['droits_logement']) && in_array('reglement_interieur', $_POST['droits_logement']) ? 1 : 0;
$droit_nettoyage_chambres = isset($_POST['droits_logement']) && in_array('nettoyage_chambres', $_POST['droits_logement']) ? 1 : 0;
$droit_vie_privee = isset($_POST['droits_logement']) && in_array('vie_privee', $_POST['droits_logement']) ? 1 : 0;
$droit_reparations = isset($_POST['droits_logement']) && in_array('reparations', $_POST['droits_logement']) ? 1 : 0;
$droit_securite_chambre = isset($_POST['droits_logement']) && in_array('securite_chambre', $_POST['droits_logement']) ? 1 : 0;
$droit_modification_logement = isset($_POST['droits_logement']) && in_array('modification_logement', $_POST['droits_logement']) ? 1 : 0;
$droit_sous_location = isset($_POST['droits_logement']) && in_array('sous_location', $_POST['droits_logement']) ? 1 : 0;
$droit_informations_problemes = isset($_POST['droits_logement']) && in_array('informations_problemes', $_POST['droits_logement']) ? 1 : 0;

// إدراج البيانات في الجدول
$sql = "INSERT INTO Contrats (
    bailleur_nom,bailleur_Email, locataire_nom, locataire_adresse, locataire_telephone,
    locataire_email, locataire_cne, locataire_code_apoge, nombre_personnes,
    montant_garantie, date_debut, heure_debut, date_fin, heure_fin,
    besoin_eau, besoin_electricite, besoin_chauffage, besoin_internet,
    droit_payer_loyer, droit_souscrire_assurance, droit_nbr_etudiant,
    droit_respect, droit_reglement_interieur, droit_nettoyage_chambres,
    droit_vie_privee, droit_reparations, droit_securite_chambre,
    droit_modification_logement, droit_sous_location, droit_informations_problemes
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param(
    "sssssssssisssssiiiiiiiiiiiiiii", // لاحظ إضافة حرف 's' إضافي للبريد الإلكتروني
    $bailleur_nom, $bailleur_Email, $locataire_nom, $locataire_adresse, $locataire_telephone,
    $locataire_email, $locataire_cne, $locataire_code_apoge, $nombre_personnes,
    $montant_garantie, $date_debut, $heure_debut, $date_fin, $heure_fin,
    $besoin_eau, $besoin_electricite, $besoin_chauffage, $besoin_internet,
    $droit_payer_loyer, $droit_souscrire_assurance, $droit_nbr_etudiant,
    $droit_respect, $droit_reglement_interieur, $droit_nettoyage_chambres,
    $droit_vie_privee, $droit_reparations, $droit_securite_chambre,
    $droit_modification_logement, $droit_sous_location, $droit_informations_problemes
);

if ($stmt->execute()) {
    // تخزين رسالة النجاح في الجلسة
    session_start();
    $_SESSION['success_message'] = 'Le contrat a été enregistré avec succès!';
    
    // التوجيه إلى صفحة الإعلانات
    header('Location: ../php_files/pageMesAnnonces.php');
    exit;
} else {
    die("Erreur lors de l'enregistrement: " . $stmt->error);
}

// إغلاق الاتصال
$stmt->close();
$conn->close();
?>