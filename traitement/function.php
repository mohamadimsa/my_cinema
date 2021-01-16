<?php

function infoError($debug){
    global $db;
    echo "\nPDO::errorInfo():\n";
    print_r($db->errorInfo());
}

function d($var){

    var_dump($var);
}