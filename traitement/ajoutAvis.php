<?php
require_once 'dbconnect.php';
var_dump($_GET);
if (isset($_GET["id_film"]) && isset($_GET["id_membre"]) && isset($_POST["titre"]) && isset($_POST["avis"])){
    $id_film = $_GET["id_film"];
    $id_film = intval($id_film);
    $id_membre = $_GET["id_membre"];
    $id_membre = intval($id_membre);
    $titre =$_POST["titre"];
    $avis = $_POST["avis"];

    $ajoutAvis = $db->prepare("UPDATE historique_membre set  avis=:avis, avis_date=NOW(), titre_avis=:titre WHERE id_membre=:membre and id_film=:film");
    $ajoutAvis->bindValue(":avis",$avis,PDO::PARAM_STR_CHAR);
    $ajoutAvis->bindValue(":titre",$titre,PDO::PARAM_STR_CHAR);
    $ajoutAvis->bindValue(":membre",$id_membre,PDO::PARAM_INT);
    $ajoutAvis->bindValue(":film",$id_film,PDO::PARAM_INT);

    if ($ajoutAvis->execute()) {
        header('Location: ../pages/membre.php');
        exit;
    }
     
}