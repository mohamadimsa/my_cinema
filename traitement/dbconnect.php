<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=cinema', 'mohamadi','mohamadi');
} catch (execeptions $e) {
    die('Erreur'.$e->getMessage());
}
?>