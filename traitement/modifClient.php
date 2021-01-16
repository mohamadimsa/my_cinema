<?php
require_once 'dbconnect.php';
require_once 'function.php';



if ( isset($_GET["id"]) && isset($_POST["email"]) && isset($_POST["ville"]) && isset($_POST["cpostal"]) && $_POST["cpostal"] != "" && $_POST["email"] != "" && $_POST["ville"] != ""  && isset($_POST["adresse"]) && $_POST["adresse"] != "") {
    $email = $_POST["email"];
    $ville = $_POST["ville"];
    $cpostal = $_POST["cpostal"];
    $adresse = $_POST["adresse"];
    $id_client = intval($_GET["id"]);
    
    $requettemodifClient = $db->prepare("UPDATE fiche_personne SET email=:email, ville=:ville, cpostal=:cpostal, adresse=:adresse WHERE id_perso=:id");
    $requettemodifClient->bindValue(":email",$email,PDO::PARAM_STR_CHAR);
    $requettemodifClient->bindValue(":ville",$ville,PDO::PARAM_STR_CHAR);
    $requettemodifClient->bindValue(":cpostal",$cpostal,PDO::PARAM_STR_CHAR);
    $requettemodifClient->bindValue(":adresse",$adresse,PDO::PARAM_STR_CHAR);
    $requettemodifClient->bindValue(":id",$id_client,PDO::PARAM_INT);
    
    $requettemodifClient->execute();

   
}


if (isset($_POST["abonnement"]) && $_POST["abonnement"] !="" && isset($_GET["id"])) {
    $id_client = intval($_GET["id"]);
    $id_abo = $_POST["abonnement"];
    $uptadeAbo = $db->prepare("UPDATE membre SET id_abo=:id_abo, date_abo=NOW() WHERE id_fiche_perso=:id_client");
    $uptadeAbo->bindValue(":id_abo", $id_abo, PDO::PARAM_INT);
    $uptadeAbo->bindValue(":id_client", $id_client, PDO::PARAM_INT);
    $uptadeAbo->execute();
}

header('Location: ../pages/fiche_client.php?id='.$id_client);
exit;