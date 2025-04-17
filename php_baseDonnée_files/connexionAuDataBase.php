<?php
    $conn= new PDO('mysql:host=localhost;dbname=location_colocation_logement_db','root','12345678');
    if(!$conn){
        echo'Erreur dans la connexion a la base de donné';
    }
?>