<?php
require_once 'dbconnect.php';

if (isset($_POST["nom"])) {

    $nom = "'" . $_POST["nom"] . "%'";
    $prenom = "'" . $_POST["prenom"] . "%'";

    $clientNoms = $db->prepare("SELECT * FROM fiche_personne WHERE nom LIKE $nom ORDER BY nom ASC");

    if ($_POST["nom"] != "" && $_POST["prenom"] == "" && $_POST["nomville"] == "" && $_POST["code_postale"] == "" && !isset($_POST["membre"])) {
        if ($clientNoms->execute()) {
            $clientTrouver = $clientNoms->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
