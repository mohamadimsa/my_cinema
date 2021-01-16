<?php
require_once 'dbconnect.php';
require 'function.php';
$id = intval($_GET["id"]);
$infoClients = $db->prepare("SELECT * from fiche_personne LEFT JOIN membre On fiche_personne.id_perso = membre.id_fiche_perso WHERE fiche_personne.id_perso = :id");
$infoClients->bindValue(':id',$id,PDO::PARAM_INT);
$infoClients->execute();

$infoTrouver = $infoClients->fetch(PDO::FETCH_OBJ);
$date_aniv = new DateTime($infoTrouver->date_naissance);
$date_abonnement = new DateTime($infoTrouver->date_abo);
$date_insciption = new DATETime($infoTrouver->date_inscription);
$date_dernierfilm = new DATETime($infoTrouver->date_dernier_film);
$id_abo = intval($infoTrouver->id_abo);
$infoAbo =  $db->prepare("SELECT * FROM abonnement where id_abo = :id");
$infoAbo->bindValue(':id',$id_abo,PDO::PARAM_INT);
$infoAbo->execute();
$id_film = $infoTrouver->id_dernier_film; 
$detailAbo = $infoAbo->fetch(PDO::FETCH_OBJ);
$infoFilm = $db->prepare("SELECT titre from film  where id_film = :id");
$infoFilm->bindValue(':id', $id_film, PDO::FETCH_OBJ);
$infoFilm->execute();
$dernierflim = $infoFilm->fetch(PDO::FETCH_OBJ);

$listAbos = $db->prepare("SELECT * FROM abonnement");
$listAbos->execute();
$listAboTrouver = $listAbos->fetchAll(PDO::FETCH_OBJ);
$id_membre = $infoTrouver->id_membre;
$listHistorique = $db->prepare("SELECT film.titre, historique_membre.date, film.id_film  FROM historique_membre  LEFT JOIN film  ON film.id_film = historique_membre.id_film WHERE id_membre =:id_membre ORDER BY historique_membre.date ASC");
$listHistorique->bindValue(":id_membre",$id_membre,PDO::PARAM_INT);
$listHistorique->execute();
$historiqueMembre = $listHistorique->fetchAll(PDO::FETCH_OBJ);
