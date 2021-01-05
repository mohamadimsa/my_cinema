<?php
try {
    $db =new PDO('mysql:host=localhost;dbname=cinema,'root','root');
} catch (\Throwable $th) {
    //throw $th;
}