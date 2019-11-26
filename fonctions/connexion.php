<?php
session_start();
require_once "connexionBDD.php";

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$admin = false;
$resultat = $pdo->query("SELECT * FROM t_utilisateur WHERE pseudo='".$pseudo."'");
if($row = $resultat->fetch()) {
    var_dump($row);
    if(password_verify($mdp, $row['MDP'])){
        if ($row['ROLE']==0){
            $Admin=false;
        }
        if ($row['ROLE']==1){
            $Admin=true;
        }
        $_SESSION['admin'] = $Admin;
        $_SESSION['id'] = $row['ID_UTIL'];
        $_SESSION['pseudo'] = $row['PSEUDO'];
        $_SESSION['mdp'] = $row['MDP'];
        header('Location: ../pages/index.php');
    } else {
        header('Location: ../pages/index.php');
    }
}

?>
