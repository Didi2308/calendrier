<?php

require_once 'connexionBDD.php';

// fonction pour mettre ton image en bon format
function profilPic ($img){
    if (!empty($img)){
        return addslashes(file_get_contents($img));
    }else{
        return NULL;
    }
}

// là tu définis ton image en allant la chercher dans $_FILES que te renvois le formulaire que je t'ai mis avant
// t'occupe pas de c'est quoi le ['tmp_name'] il faut le mettre c'est tout x)
$taPhoto= profilPic($_FILES['LAPHOTO']['tmp_name']);

// là tu rentre ton image dans ta base avec un query (un pdo prepare marche pas je crois)


$qui = $pdo->exec("UPDATE t_lot SET image ='" . $taPhoto . "' WHERE ID_lot = '" . $_POST["id"]."'");

$test = $pdo->query("SELECT image FROM `t_lot` WHERE ID_lot ='" . $_POST["id"] ."'");
$testimg = $test->fetch();

// ici tu réencode ton image
$limg=base64_encode($testimg[0]);

?>


<!-- et enfin le HTML pour afficher ton image ^^ -->
<span ><img src='data:image;base64,<?=$limg?>' style="width:500px; height:200px"></span>

<a href="brouillon.php">Retour</a>

