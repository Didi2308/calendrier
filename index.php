<?php
    include("assets/header.php");
    require "fonctions/tirage_lot.php";
    if(test_date(date("Y-m-d"), '2019-12-25')){
        tirage_gros_lot($pdo);
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/bulma.min.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="favicon.svg">
    <title>Calendrier de l'avent | Carrefour</title>
</head>
<body>
    <div>
        <img class="fond" src="style/img/banniere2.jpg">
</div>
        <div class="degrade">
            <div class="flexbox">
                <div class="intern"><a href="page-resultat.php?jour=23" target="blank"><img class="case" src="style/img/case23.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=01" target="blank"><img class="case" src="style/img/case1.png"><img  class="perenoel" src="style/img/perenoeldam.png"></a>
</div>
                <div class="intern"><a href="page-resultat.php?jour=15" target="blank"><img class="case" src="style/img/case15.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=09" target="blank"><img class="case" src="style/img/case9.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=07" target="blank"><img class="case" src="style/img/case7.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=16" target="blank"><img class="case" src="style/img/case16.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=14" target="blank"><img class="case" src="style/img/case14.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=02" target="blank"><img class="case" src="style/img/case2.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=24" target="blank"><img class="case" src="style/img/case24.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=18" target="blank"><img class="case" src="style/img/case18.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=08" target="blank"><img class="case" src="style/img/case8.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=03" target="blank"><img class="case" src="style/img/case3.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=04" target="blank"><img class="case" src="style/img/case4.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=06" target="blank"><img class="case" src="style/img/case6.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=12" target="blank"><img class="case" src="style/img/case12.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=10" target="blank"><img class="case" src="style/img/case10.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=11" target="blank"><img class="case" src="style/img/case11.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=13" target="blank"><img class="case" src="style/img/case13.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=17" target="blank"><img class="case" src="style/img/case17.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=22" target="blank"><img class="case" src="style/img/case22.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=20" target="blank"><img class="case" src="style/img/case20.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=19" target="blank"><img class="case" src="style/img/case19.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=21" target="blank"><img class="case" src="style/img/case21.png"></a></div>
                <div class="intern"><a href="page-resultat.php?jour=05" target="blank"><img class="case" src="style/img/case5.png"></a></div>
            </div>
        <div>
</body>
</html>
