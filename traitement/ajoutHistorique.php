<?php

require_once 'dbconnect.php';
if (isset($_POST["date"]) && isset($_POST["titre"]) && isset($_POST["avis"]) && isset($_GET["id_membre"])&& isset($_GET["id_film"])) {

   $date = $_POST["date"];
   $date = date_create($date);
   $date = date_format($date, 'Y-m-d H:i:s');
   $titre = $_POST["titre"];
   $avis = $_POST["avis"];
   $id_membre = intval($_GET["id_membre"]);
   $id_film = intval($_GET["id_film"]);
   var_dump($date);
   if ($titre == "" || $avis == "" ) {
    $insert = $db->prepare("INSERT INTO historique_membre (id_membre, id_film, date) VALUES (:id_membre, :id_film, :date)");
    $insert->bindValue(":id_membre",$id_membre,PDO::PARAM_INT);
    $insert->bindValue(":id_film",$id_film,PDO::PARAM_INT);
    $insert->bindParam(":date",$date);
   }
   else{

    $insert = $db->prepare("INSERT INTO historique_membre (id_membre, id_film, date, avis, avis_date, titre_avis) VALUES (:id_membre, :id_film, :date, :avis, NOW(), :titre_avis)");

    $insert->bindValue(":id_membre",$id_membre,PDO::PARAM_INT);
    $insert->bindValue(":id_film",$id_film,PDO::PARAM_INT);
    $insert->bindParam(":date",$date);
    $insert->bindValue(":avis",$avis,PDO::PARAM_STR_CHAR);
    $insert->bindValue(":titre_avis",$titre,PDO::PARAM_STR_CHAR);

   }

    if ($insert->execute()) {
        echo "ok";
        header('Location:  ../pages/fiche_film.php?id='.$id_film);
exit;
    }
    else{
        echo "\nPDO::errorInfo():\n";
   print_r($insert->errorInfo());
    }
   

}
