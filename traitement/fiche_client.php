<?php
require_once 'dbconnect.php';
$id = intval($_GET["id"]);
$infoClients = $db->prepare("SELECT * from fiche_personne LEFT JOIN membre On fiche_personne.id_perso = membre.id_fiche_perso WHERE fiche_personne.id_perso = :id");
$infoClients->bindValue(':id',$id,PDO::PARAM_INT);
$infoClients->execute();

$infoTrouver = $infoClients->fetch(PDO::FETCH_OBJ);
$date_aniv = new DateTime($infoTrouver->date_naissance);
$date_abonnement = new DateTime($infoTrouver->date_abo);
$date_insciption = new DATETime($infoTrouver->date_inscription);
$id_abo = intval($infoTrouver->id_abo);
$infoAbo =  $db->prepare("SELECT * FROM abonnement where id_abo = :id");
$infoAbo->bindValue(':id',$id_abo,PDO::PARAM_INT);
$infoAbo->execute();

$detailAbo = $infoAbo->fetch(PDO::FETCH_OBJ);

var_dump($detailAbo);
