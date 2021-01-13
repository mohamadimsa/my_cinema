<?php
require_once 'dbconnect.php';

if (isset($_POST["nom"])) {

    $nom = "'" . $_POST["nom"] . "%'";
    $prenom = "'" . $_POST["prenom"] . "%'";
    $ville = "'" . $_POST["nomville"] . "%'";
    $email = $_POST["email"];

    $clientPrenoms = $db->prepare("SELECT * FROM fiche_personne WHERE prenom LIKE $prenom ORDER BY nom ASC");
    $clientPrenoms_noms = $db->prepare("SELECT * FROM fiche_personne WHERE nom LIKE $nom and  prenom LIKE $prenom ORDER BY nom ASC");
    $clientPrenoms_ville = $db->prepare("SELECT * FROM fiche_personne WHERE prenom LIKE $prenom and  ville LIKE $ville ORDER BY nom ASC");
    $clientPrenoms_email = $db->prepare("SELECT * FROM fiche_personne WHERE prenom LIKE $prenom and  email = '$email' ORDER BY nom ASC ");
    $clientNoms_ville = $db->prepare("SELECT * FROM fiche_personne WHERE nom LIKE $nom and  ville LIKE $ville ORDER BY nom ASC");
    $clientNoms = $db->prepare("SELECT * FROM fiche_personne WHERE nom LIKE $nom ORDER BY nom ASC");
    $clientNoms_email = $db->prepare("SELECT * FROM fiche_personne WHERE nom LIKE $nom and  email = '$email' ORDER BY nom ASC ");

    if ($_POST["nom"] != "" && $_POST["prenom"] == "" && $_POST["nomville"] == "" && $_POST["email"] == "" && !isset($_POST["membre"])) {
        if ($clientNoms->execute()) {
            $clientTrouver = $clientNoms->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] != "" && $_POST["nom"] == "" && $_POST["nomville"] == "" && $_POST["email"] == "" && !isset($_POST["membre"])) {
        if ($clientPrenoms->execute()) {
            $clientTrouver = $clientPrenoms->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] != "" && $_POST["nom"] != "" && $_POST["nomville"] == "" && $_POST["email"] == "" && !isset($_POST["membre"])) {
        if ($clientPrenoms_noms->execute()) {
            $clientTrouver = $clientPrenoms_noms->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] != "" && $_POST["nom"] == "" && $_POST["nomville"] != "" && $_POST["email"] == "" && !isset($_POST["membre"])) {
        if ($clientPrenoms_ville->execute()) {
            $clientTrouver = $clientPrenoms_ville->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] != "" && $_POST["nom"] == "" && $_POST["nomville"] == "" && $_POST["email"] != "" && !isset($_POST["membre"])) {
        if ($clientPrenoms_email->execute()) {
            $clientTrouver = $clientPrenoms_email->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] == "" && $_POST["nom"] != "" && $_POST["nomville"] != "" && $_POST["email"] == "" && !isset($_POST["membre"])) {
        if ($clientNoms_ville->execute()) {
            $clientTrouver = $clientNoms_ville->fetchAll(PDO::FETCH_OBJ);
        }
    }
    elseif($_POST["prenom"] == "" && $_POST["nom"] != "" && $_POST["nomville"] == "" && $_POST["email"] != "" && !isset($_POST["membre"])) {
        if ($clientNoms_email->execute()) {
            $clientTrouver = $clientNoms_email->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
}
