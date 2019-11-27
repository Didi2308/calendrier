<?php
session_start();
require_once "connexionBDD.php";

session_destroy();
header('Location: ../index.php');

?>
