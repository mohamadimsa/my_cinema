<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=cinema', 'mohamadi','mohamadi');
} catch (PDOException $e) {
    die('Erreur'.$e->getMessage());
}
?>