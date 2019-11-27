<?php session_start();?>

<div class="columns">
    <div class="column"></div>
    <div class="column logo-center">
        <img class="logo" src="./style/img/logo.png">
    </div>
    <div class="info column columns">
        <div class="column">
            <ul class="lang">
                <li>
                    <a class="active fr" href="#">FR</a>
                </li>
                <li>
                    |
                </li>
                <li>
                    <a href="#">EN</a>
                </li>
            </ul>
        </div>
        <div class="column is-one-third-widescreen">
            <ul class="user">
                <li>
                    <img src="https://img.icons8.com/material-sharp/24/000000/user.png">
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['id'])){
                    ?>
                    <a href="fonctions/deconnexion.php"> <?php echo $_SESSION['pseudo'] ?></a>
                    <?php }else { ?>
                    <a href="pages/test_connexion.php">s'identifier</a>

                    <?php }?>
                </li>
            </ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-center has-background-grey-lighter">
    <a class="navbar-item" href="apropos.php">A propos </a>
    <p class="navbar-item">|</p>
    <a class="navbar-item" href="cgu.php">CGU</a>
    <p class="navbar-item">|</p>
    <a class="navbar-item" href="page-resultat?jour=25">GROS LOT</a>
    <p class="navbar-item">|</p>
    <a class="navbar-item" href="pages/inscription.php">Inscription</a>
    <p class="navbar-item">|</p>
    <a class="navbar-item" href="contact.php">Contact</a>
</nav>
