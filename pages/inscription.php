<?php
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/inscription.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/bulma.min.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="favicon.svg">
    <title>Calendrier de l'avent | Carrefour</title>
</head>
<body>
<div class="presentation">
    <img class="carouf" src="../style/img/logo.png" alt="logo">
    <div class="box">
        <img class="banderole" src="../style/img/bandeau.png" alt="objectif">
        <p class="descriptif">Du 1er au 25 décembre, participez au grand Calendrier de l'Avent organisé par Carrefour ! De nombreuses réductions sont à gagner ! Un grand tirage au sort sera organisé le 25 décembre afin de remporter un voyage d'une valeur de 800 euros ou un iPhone 11 !</p>
    </div>    
</div>
    <form class="form" action="../fonctions/ajout_util.php" method="post">
        <input class="case" type="text" name="pseudo" placeholder="Pseudo" rows="1">
        <input class="case" type="password" name="mdp" placeholder="Mot de passe" rows="1">
        <input class="case" type="email" name="mail" placeholder="E-mail" rows="1">
        <input class="case" type="text" name="parrain" placeholder="Parrain" rows="1">
        <input class="boutonco" type="submit" value="Inscrire">
        <input type="hidden" name="action" value="inscription">
    </form>
</body>