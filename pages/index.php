<?php
require_once "header.php";

?>


<?php
    if (isset($_SESSION['id'])){
?>
    <form class="form" action="../fonctions/deconnexion.php" method="post">
        <input class="boutonco" type="submit" value="Se Déconnecter">
        <input type="hidden" name="action" value="deconnexion">
    </form>
    <?php
        var_dump($_SESSION);
        echo "Bonjour ". $_SESSION['pseudo'];
        echo'<br>';
    ?>

    <a href="../fonctions/tirage_lot.php">Tirage !</a>


    <?php
        } else {
    ?>
        <a href="test_connexion.php">Connexion</a>
        <a href="inscription.php">Inscription</a>

<?php
       }
?>

