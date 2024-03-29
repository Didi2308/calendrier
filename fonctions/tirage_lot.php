    <?php
require_once "connexionBDD.php";

//Récupération du jour au clic sur la case (récupération en GET)
//jour compris entre le 01/12 et le 24/12
$jour = '2019-12-13';

// strtotime

// Liste les lots deja obtenus par l'utilisateur dans un tableau et le renvoi
// forme : id_lot => nb de fois obtenus
function lots_deja_obtenu($pdo, $user){
    $tab = [];
    $obtenu = $pdo->query("SELECT id_lot, count(id_lot) as c FROM t_historique WHERE id_util = '" . $user ."' GROUP BY id_lot");
    while($res = $obtenu->fetch()){
        $tab[$res["id_lot"]] = $res["c"];
    }
    return $tab;
}

// Crée un tableau avec tous les lots en 1 fois
// forme : index => id_lot
function crea_tab_lots($pdo){
    $i = 0;
    $tab = [];
    $lots = $pdo->query("SELECT id_lot FROM t_lot WHERE id_lot != 23");
    while($res = $lots->fetch()){
        $tab[$i] = $res['id_lot'];
        $i += 1;
    }
    return $tab;
}

// recupere les lots restants par rapport aux tableaux
function lots_restants($tab_lots, $tab_obtenus){
    $tab = [];
    foreach($tab_lots as $cle => $valeur){
        if(array_key_exists($valeur, $tab_obtenus)){
            if($tab_obtenus[$valeur] == 1){
                $tab[] = $valeur;
            }
        } else {
            $tab[] = $valeur;
            $tab[] = $valeur;
        }
    }
    return $tab;
}

//renvoi le nom du lot d'id id_lot
function nom_lot($pdo, $id_lot){
    $res = $pdo->query("SELECT nom FROM t_lot WHERE id_lot = '" . $id_lot ."'");
    if($nom = $res->fetch()){
        return $nom;
    } else {
        return 0;
    }
}

// rand(1,5)
function tirage_lot($pdo, $jour, $user){
    $adejatiré = $pdo->query("SELECT * FROM t_historique WHERE date_obtention = '" . $jour . "' AND id_util = '" . $user . "'");
    $fetch = $adejatiré->fetch();
    if (!($fetch)) {
        $tab = lots_restants(crea_tab_lots($pdo), lots_deja_obtenu($pdo, $user));
        $index = rand(0, count($tab) - 1);
        $sql = $pdo->prepare('INSERT INTO  t_historique(id_util, id_lot, date_obtention) 
            VALUES ( :util, :lot, :date_obt)');
        $sql->execute([
            'util' => $user,
            'lot' => $tab[$index],
            'date_obt' => $jour
        ]);
    $test = $pdo->query("SELECT image FROM `t_lot` WHERE ID_lot ='" . $tab[$index] ."'");
    $testimg = $test->fetch();

    // ici tu réencode ton image
    $limg=base64_encode($testimg[0]);

?>

<!-- et enfin le HTML pour afficher ton image ^^ -->
<span ><img src='data:image;base64,<?=$limg?>' style="width:500px; height:200px"></span>
<?php
        return nom_lot($pdo, $tab[$index]);
    } else {

        $test = $pdo->query("SELECT image FROM `t_lot` WHERE ID_lot ='" . $fetch['ID_LOT'] ."'");
        $testimg = $test->fetch();

        // ici tu réencode ton image
        $limg=base64_encode($testimg[0]);
        ?>
        <span ><img src='data:image;base64,<?=$limg?>' style="width:500px; height:200px"></span>
        <?php
    }
}

function tirage_gros_lot($pdo){
    $sql = $pdo->query("SELECT id_util FROM t_utilisateur where TAS='1'");
    $gagnant = $sql->fetch();
    if(!$gagnant){
        $tab = [];
        $utils = $pdo->query("SELECT id_util FROM t_utilisateur");
        while($res = ($utils -> fetch())){
            $tab[] = $res['id_util'];
        }
        $parrain = $pdo->query("SELECT parrain_id FROM est_filleul");
        while($res = ($parrain -> fetch())){
            $tab[] = $res['parrain_id'];
        }

        $nb_random = rand(0, count($tab));
        $pdo->exec("UPDATE t_utilisateur SET TAS ='1' WHERE ID_util = '".$tab[$nb_random]."'");
    } else {
        return $gagnant;
    }
}


// Renvoi :
//  -  -1 si d1 est avant d2
//  -  0  si d1 == d2
//  -  1  si d2 est avant d1
function test_date($d1, $d2){
    $date = strtotime($d1);
    $date2 = strtotime($d2);

    $dfr1 = strftime('%A %d %B %Y', $date);
    $dfr2 = strftime('%A %d %B %Y', $date2);

    if($date < $date2){
        return -1;
    }elseif($date == $date2){
        return 0;
    }else{
        return 1;
    }
}


    tirage_gros_lot($pdo);

?>


