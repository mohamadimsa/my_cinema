<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=cinema', 'admin','root');
} catch (PDOException $e) {
    die('Erreur'.$e->getMessage());
}
?>