<?php
include("../../Controller/login.php");
include("../../db/db.php");
include("../../Models/Musteriler.php");





if(!empty($_POST)){

    $login = new Login();
    if(isset($_POST["token"])){
       $result = $login->alreadyLoggedIn($_POST["token"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"token"));
            exit();
        }
    }
    else{
        echo json_encode(array("status"=>"error","message"=>"token"));
        exit();
    }

    $musteriler = new Musteriler();


    // get all customers
    if(isset($_POST["token"]) && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
    
        $result = $musteriler->getMusteriler($database);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","data"=>$result));
            exit();
        }
        
    }
    // add new customer
    if(isset($_POST["token"]) && isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
    
        @$musteri_adi = $_POST["musteri_adi"];
        @$dogum_tarihi = date("Y-m-d",strtotime($_POST["dogum_tarihi"]));
        @$telefon = $_POST["telefon"];
        @$mail_adresi = $_POST["mail_adresi"];
        @$tc_kimlik = $_POST["tc_kimlik"];
        @$musteri_tipi_id = $_POST["musteri_tipi_id"];

        $return = $musteriler->insertMusteri($database,$musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik,$musteri_tipi_id);
        if($return != false){
            echo json_encode(array("status"=>"success","message"=>"customer added"));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }  
    }

    //update musteri
    if(isset($_POST["token"]) && isset($_POST["update"]) && isset($_POST["id"]) && !isset($_POST["add"]) && !isset($_POST["delete"]) ){
    
        @$musteri_adi = $_POST["musteri_adi"];
        @$dogum_tarihi = date("Y-m-d",strtotime($_POST["dogum_tarihi"]));
        @$telefon = $_POST["telefon"];
        @$mail_adresi = $_POST["mail_adresi"];
        @$tc_kimlik = $_POST["tc_kimlik"];
        @$musteri_tipi_id = $_POST["musteri_tipi_id"];

        $result = $musteriler->updateMusteri($database,$_POST["id"],$musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik,$musteri_tipi_id);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"database error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"customer updated"));
            exit();
        }
    
    
    }

    //delete musteri
    if(isset($_POST["token"]) && isset($_POST["delete"]) && isset($_POST["id"]) && !isset($_POST["add"]) && !isset($_POST["update"]) ){
        $result = $musteriler->deleteMusteri($database,$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"error"));
            exit();
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"customer deleted"));
            exit();
        }
    
    
    }

}









