<?php

include("../../Controller/login.php");
include("../../db/db.php");
include("../../Models/MusteriTipi.php");

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

    // return all musteritipi
    $musteriTipi = new MusteriTipi();

    if(isset($_POST["token"]) && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $musteriTipi->getMusteriTipi($database);
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
        $result = $musteriTipi->insertMusteriTipi($database,$_POST["musteri_tipi_adi"],$_POST["komisyon_orani"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"musteri tipi eklendi"));
            exit();
        }
    }

    if(isset($_POST["token"]) && !isset($_POST["add"]) && isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $musteriTipi->updateMusteriTipi($database,$_POST["id"],$_POST["musteri_tipi_adi"],$_POST["komisyon_orani"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"musteri tipi guncellendi!"));
            exit();
        }
    }

    if(isset($_POST["token"]) && !isset($_POST["add"]) && !isset($_POST["update"]) && isset($_POST["delete"]) ){
        $result = $musteriTipi->deleteMusteriTipi($database,$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"musteri tipi deleted!"));
            exit();
        }
    }




        
       

   



}








