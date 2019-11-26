<?php
try {
    $dns_bdd ='mysql:host=localhost;dbname=calendrier_avent';
    $user_bdd = 'root';
    $pass_bdd = 'Totolinkepona76';
    // affiche les erreur MySql
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo = new PDO($dns_bdd, $user_bdd, $pass_bdd, $options);
} catch (Exception $e){
    die('Erreur:'.$e->getMessage());
}

