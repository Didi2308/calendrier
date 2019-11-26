<?php

?>
    <form class="form" action="../fonctions/ajout_util.php" method="post">
        <input type="text" name="pseudo" placeholder="Login" rows="1">
        <input type="password" name="mdp" placeholder="Mot de passe" rows="1">
        <input type="email" name="mail" placeholder="E-mail" rows="1">
        <input type="text" name="parrain" placeholder="Parrain" rows="1">
        <input class="boutonco" type="submit" value="Inscrire">
        <input type="hidden" name="action" value="inscription">
    </form>
