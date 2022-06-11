<?php 

include("../../Controller/login.php");
include("../../db/db.php");
include("../../Models/Kayitlar.php");

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

    $kayitlar = new Kayitlar();


    // returns all data 
    if(isset($_POST["token"]) && !isset($_POST["userid"]) &&  isset($_POST["deleted"])  && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $kayitlar->getDeletedKayitlarByUser($database,$_POST["userid"]);
        if($result != false){
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
    }

    // returns all deleted kayitlar records 
    if(isset($_POST["token"]) && isset($_POST["userid"]) &&  !isset($_POST["deleted"])  && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $kayitlar->getKayitlarByUser($database,$_POST["userid"]);
        if($result != false){
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
    }
    // return all kayitlar by user 
    if(isset($_POST["token"]) && !isset($_POST["userid"]) && isset($_POST["deleted"])  && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $kayitlar->getKayitlarDeleted($database);
        if($result != false){
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
    }

    // return all deleted kayitlar by user 
    if(isset($_POST["token"]) && isset($_POST["userid"]) && isset($_POST["deleted"])  && !isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        $result = $kayitlar->getKayitlarByUser($database,$_POST["userid"]);
        if($result != false){
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"database error"));
        } 
    }

    // insert
    if( isset($_POST["token"]) && !isset($_POST["userid"]) && !isset($_POST["deleted"])  && isset($_POST["add"]) && !isset($_POST["update"]) && !isset($_POST["delete"]) ){
        
        $result = $kayitlar->insertKayit($database,$_POST["plaka"], $_POST["ruhsat_seri_no"], $_POST["sigorta_sirketi"], $_POST["ana_brans_id"], $_POST["police_no"], $_POST["police_bitis_tarih"],0,$_POST["musteri_id"],$_POST["tarih"]);
        if($result != false){
            echo json_encode(array("status"=>"success","message"=>"Kayit Eklendi"));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"database error"));
        }
    }

    // update
    if( isset($_POST["token"]) && !isset($_POST["userid"]) && isset($_POST["id"]) && !isset($_POST["deleted"])  && !isset($_POST["add"]) && isset($_POST["update"]) && !isset($_POST["delete"]) ){
        
        $result = $kayitlar->updateKayit($database,$_POST["plaka"], $_POST["ruhsat_seri_no"], $_POST["sigorta_sirketi"], $_POST["ana_brans_id"], $_POST["police_no"], $_POST["police_bitis_tarih"],$_POST["iptal_durum"],$_POST["musteri_id"],$_POST["tarih"],$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"database error"));
           
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"kayit guncellendi!"));
            
        }
    }

    // delete
    if( isset($_POST["token"]) && !isset($_POST["userid"]) && isset($_POST["id"]) && !isset($_POST["deleted"])  && !isset($_POST["add"]) && !isset($_POST["update"]) && isset($_POST["delete"]) ){
        
        $result = $kayitlar->deleteKayit($database, $_POST["id"]);
        if($result != false){
            echo json_encode(array("status"=>"success","message"=>"kayit silindi!"));
        }
        else{
            echo json_encode(array("status"=>"error","message"=>"database error"));
        }
    }



}


// JcPe3kKanev2tHRuMFOxA4YWc4HpDQ==











