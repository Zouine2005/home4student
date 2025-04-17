<?php
session_start();
include_once '../php_baseDonnée_files/connexionAuDataBase.php';

// التحقق من طريقة الإرسال
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['form_errors'] = ["Méthode non autorisée"];
    header("Location:../php_files/accueil.php");
    exit();
}

// التحقق من CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['form_errors'] = ["Token de sécurité invalide"];
    header("Location:../php_files/accueil.php");
    exit();
}

// استقبال البيانات من النموذج مع التحقق من وجودها
$id_contrat = $_POST['id_contrat'] ?? null;
$bailleur_nom = $_POST['bailleur'] ?? '';
$bailleur_Email = $_POST['bailleur_Email'] ?? '';
$locataire_nom = trim($_POST['locataire_nom'] ?? '');
$locataire_adresse = trim($_POST['locataire_adresse'] ?? '');
$locataire_telephone = trim($_POST['locataire_telephone'] ?? '');
$locataire_email = trim($_POST['locataire_email'] ?? '');
$locataire_cne = trim($_POST['locataire_cne'] ?? '');
$montant_garantie = $_POST['montant_garantie'] ?? 0;
$locataire_code_apoge = trim($_POST['locataire_code_apoge'] ?? '');
$nombre_personnes = intval($_POST['nombre_personnes'] ?? 1);

// ... [بقية استلام المتغيرات كما هي]

// التحقق من صحة البيانات
$errors = [];

if (empty($locataire_nom)) {
    $errors[] = "Le nom du locataire est requis";
}

if (empty($locataire_cne)) {
    $errors[] = "Le CNE du locataire est requis";
}

if (!filter_var($locataire_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email du locataire n'est pas valide";
}

if ($nombre_personnes < 1) {
    $errors[] = "Le nombre de personnes doit être au moins 1";
}

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    header("Location:../php_files/accueil.php");
    exit();
}

// إعداد استعلام SQL للتحديث
$sql = "UPDATE Contrats SET 
        locataire_nom = :locataire_nom,
        locataire_adresse = :locataire_adresse,
        locataire_telephone = :locataire_telephone,
        locataire_email = :locataire_email,
        locataire_cne = :locataire_cne,
        locataire_code_apoge = :locataire_code_apoge,
        nombre_personnes = :nombre_personnes,
        date_modification = NOW()
        WHERE id_contrat = :id_contrat";

try {
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT);
    $stmt->bindParam(':locataire_nom', $locataire_nom, PDO::PARAM_STR);
    $stmt->bindParam(':locataire_adresse', $locataire_adresse, PDO::PARAM_STR);
    $stmt->bindParam(':locataire_telephone', $locataire_telephone, PDO::PARAM_STR);
    $stmt->bindParam(':locataire_email', $locataire_email, PDO::PARAM_STR);
    $stmt->bindParam(':locataire_cne', $locataire_cne, PDO::PARAM_STR);
    $stmt->bindParam(':locataire_code_apoge', $locataire_code_apoge, PDO::PARAM_STR);
    $stmt->bindParam(':nombre_personnes', $nombre_personnes, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = 'Le contrat a été enregistré avec succès!';
        header('Location:../php_files/accueil.php');
        exit();
    } else {
        throw new Exception("Erreur lors de l'exécution de la requête");
    }
} catch (PDOException $e) {
    $_SESSION['form_errors'] = ["Erreur de base de données: " . $e->getMessage()];
    header("Location:../php_files/accueil.php");
    exit();
} catch (Exception $e) {
    $_SESSION['form_errors'] = ["Erreur: " . $e->getMessage()];
    header("Location:../php_files/accueil.php");
    exit();
}
?>