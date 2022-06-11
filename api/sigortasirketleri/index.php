<?php


include("../../Controller/login.php");
include("../../db/db.php");
include("../../Models/SigortaSirketleri.php");

if(!empty($_POST)){
    
    $login = new Login();
    if(isset($_POST["token"])){
       $result = $login->alreadyLoggedIn($_POST["token"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"token expired"));
            exit();
        }
    }
    else{
        echo json_encode(array("status"=>"error","message"=>"token missing"));
        exit();
    }


    $sigorta_sirketleri = new SigortaSirketleri();

    if(isset($_POST["token"]) && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $sigorta_sirketleri->getSigortaSirketleri($database);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","data"=>$result));
            exit();
        }
    }

    if(isset($_POST["token"]) && isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $sigorta_sirketleri->insertSigortaSirketleri($database,$_POST["sirket_adi"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"sigorta sirketi eklendi"));
            exit();
        }
    }
    
    if(isset($_POST["token"]) && !isset($_POST["add"]) && isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $sigorta_sirketleri->updateSigortaSirketleri($database,$_POST["id"],$_POST["sirket_adi"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"sigorta sirketi guncellendi!"));
            exit();
        }
    }

    if(isset($_POST["token"]) && !isset($_POST["add"]) && !isset($_POST["update"]) && isset($_POST["delete"]) ){
        $result = $sigorta_sirketleri->deleteSigortaSirketleri($database,$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"sigorta sirketi silindi!"));
            exit();
        }
    }
}




//    JcPe3kKanev2tHRuMFOxA4cfcovkCA==

