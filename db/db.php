<?php

try{

    $database  =  new  PDO("mysql:host=127.0.0.1;dbname=sigorta;charset=utf8", "root", "mysql");
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException  $e){
    die($e->getMessage());

}


