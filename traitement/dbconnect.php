<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=cinema', 'mohamadi','mohamadi');
} catch (exeception $e) {
    die('Erreur'.$e->getMessage());
}