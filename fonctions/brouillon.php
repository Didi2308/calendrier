<?php
    require_once 'connexionBDD.php'
?>
<!-- formulaire html pour entrer ton image -->

<form class="form"  method="post" action="image.php" enctype="multipart/form-data">

Photo :
<input type="file" name="LAPHOTO"/><br>
    <input type="number" name="id" min="0" max="100">

<input name="action" type="submit" value="Ajout Lot">

</form>

