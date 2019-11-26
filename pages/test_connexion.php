<?php
require "header.php";
?>
<a href="index.php" title="retour">Retour</a>
<div class="container">

    <form class="form" action="../fonctions/connexion.php" method="post">
        <input type="text" class="input1" name="pseudo" placeholder="Login" rows="1">
        <input type="password" class="input1" name="mdp" placeholder="Mot de passe" rows="1">
        <input class="boutonco" type="submit" value="Se connecter">
        <input type="hidden" name="action" value="connexion">
    </form>
</div>
</body>
</html>
