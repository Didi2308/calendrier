<?php
    include("assets/header.php");
    require "fonctions/tirage_lot.php";



    if(isset($_GET['jour'])){

        //
        //$adejatiré = $pdo->query("SELECT * FROM t_historique WHERE date_obtention = '" . $jour_bouton . "' AND id_util = '" . $_SESSION['id_user'] . "'");
        //$fetch = $adejatiré->fetch();
        //if (!($fetch)){}
        //
        if(isset($_SESSION['id'])){
            $jour_bouton = '2019-12-' . $_GET['jour'];
            $admin = $pdo->query("SELECT role FROM `t_utilisateur` WHERE id_util ='" . $_SESSION['id'] ."'");
            $est_admin = $admin->fetch();
            if($est_admin['role'] == 1){
                if(isset($_GET["date"])){
                    $date = test_date($_GET['date'], $jour_bouton) == 0 ? $jour_bouton : null;
                } else {
                    // Pour tester avec la date actuelle
                    // quand on est l'admin :
                     $date = date('Y-m-d');
                    //$date = null;
                }
            } else {
                $date = date("Y-m-d");
                $min = test_date($date, "2019-12-01");
                $max = test_date($date, "2019-12-25");
                if(!($min == 1 && $max == -1)){
                    $date = null;
                }
            }
            $user = $_SESSION['id'];

            //$lots_obtenus = lots_deja_obtenu($pdo,$user);
            //$lots = crea_tab_lots($pdo);
            //$tab = lots_restants($lots, $lots_obtenus);
        } else {
            header("Location: pages/inscription.php");
        }
    }



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/resultat.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/bulma.min.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="favicon.svg">
    <title>Félicitations ! | Carrefour</title>
</head>
<body>
<div class="box">
    <div class="degrade">
       <div>
       <img src="style/img/bandeau.png">
       </div>

        <?php if($date == null){ ?>
            <div class="title">
                <h1>Mauvais jour ! Revenez début décembre !</h1>
                <a href="index.php"> Revenir a l'index</a>
            </div>

        <?php } else if(test_date($date, "2019-12-01") >= 0 && test_date($date, "2019-12-24") <=0){ ?>
        <div class="title">
            <h1>Félicitations ! Vous avez gagné :</h1>
            <?php
            echo '1';
            tirage_lot($pdo, $date, $user); ?>
            <a href="index.php"> Revenir a l'index</a>
        </div>
        <div id="message">
           <p>Voulez-vous parrainer des amis? Cela permet d'avoir plus de chances pour le tirage au sort final du 25 décembre, avec la possibilité de remporter un voyage d'une valeur de 800 euros, ou un iPhone 11. Cliquez <a href="index.php">ici</a></p>
        </div>

        <?php } else if(test_date($date, '2019-12-25')==0){
            tirage_gros_lot($pdo);
            $sql = $pdo->query("SELECT id_util FROM `t_utilisateur` WHERE TAS ='1'");
            $gagnant = $sql->fetch();
            if($gagnant['id_util'] == $_SESSION['id']){
        ?>
            <div class="title">
                <h1>Félicitations ! Vous avez gagné le gros lot:</h1>
                <?php
                $test = $pdo->query("SELECT image FROM `t_lot` WHERE ID_lot ='23'");
                $testimg = $test->fetch();
                // ici tu réencode ton image
                $limg=base64_encode($testimg[0]);
                ?>
                <span ><img src='data:image;base64,<?=$limg?>' style="width:500px; height:200px"></span>
            </div>
                <div id="message">
                    <p>Voulez-vous parrainer des amis? Cela permet d'avoir plus de chances pour le tirage au sort final du 25 décembre, avec la possibilité de remporter un voyage d'une valeur de 800 euros, ou un iPhone 11. Cliquez <a href="index.php">ici</a></p>
                </div>
         <?php
            } else {
                ?>
                <div class="title">
                    <h1>Vous n'avez pas gagner le gros lot , Dommage !</h1>
                    <a href="index.php"> Revenir a l'index</a>
                </div>
        <?php
            }
        }?>
    </div>
</div>
</body>
</html>
