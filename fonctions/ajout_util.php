<?php
session_start();
require_once "connexionBDD.php";

$newlog = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$mail = $_POST['mail'];

$date = strtotime('25-12-2019');
$date_inscription = strtotime(date('d-m-Y'));

$dfr1 = strftime('%A %d %B %Y', $date);
$dfr2 = strftime('%A %d %B %Y', $date_inscription);

$dejaexistant = $pdo->query("SELECT * FROM t_utilisateur WHERE pseudo = '" . $newlog . "'");
if(!$dejaexistant->fetch() && ($date > $date_inscription)) {
    $mdphash = password_hash($mdp, PASSWORD_DEFAULT);

    //création de l'utilisateur
    $sql = $pdo->prepare('INSERT INTO  t_utilisateur( pseudo, mdp, mail, role) 
            VALUES ( :pseudo, :mdp, :mail, :role)');
    $sql->execute([
        'pseudo' => $newlog,
        'mdp' => $mdphash,
        'mail' => $mail,
        'role' => 0,
    ]);

    if(isset($_POST['parrain'])){
        $parrain = $_POST['parrain'];
        if(strcmp($parrain, $newlog) != 0) {
            $sql = $pdo->query("SELECT id_util FROM t_utilisateur WHERE pseudo = '" . $parrain . "'");
            if ($res = $sql->fetch()) {
                $cherche_filleul = $pdo->query("SELECT * FROM t_utilisateur WHERE pseudo = '" . $newlog . "'");
                $filleul = $cherche_filleul->fetch();
                var_dump($filleul);
                $id_filleul = $filleul["ID_UTIL"];
                $parrain = $res["id_util"];
                $sql = $pdo->prepare('INSERT INTO  est_filleul( parrain_id, filleul_id) 
                VALUES ( :parrain, :filleul)');
                $sql->execute([
                    'parrain' => $parrain,
                    'filleul' => $id_filleul
                ]);
            }
        }
    }

}

header('Location: ../index.php');
