<?php
/**
 * /anabrans  get all anabrans records
 * /anabrans/add  add new anabrans record
 */
include("../../Controller/login.php");
include("../../db/db.php");
include("../../Models/AnaBrans.php");


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
    $anabrans = new AnaBrans();

    // all records
    if(!isset($_POST["add"]) && isset($_POST["token"]) && !isset($_POST["delete"]) && !isset($_POST["update"]) && !isset($_POST["id"]) ) {
        $result = $anabrans->getAnaBrans($database);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"no records found"));
        }
        else{
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        exit();
    }

    // insert
    if(isset($_POST["add"]) && isset($_POST["token"])  && !isset($_POST["delete"]) && !isset($_POST["update"])  && !isset($_POST["id"]) ){
        // insert ana brans
        $result = $anabrans->insertAnaBrans($database,$_POST["ana_brans_adi"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"Ana Brans Eklendi"));
        }
        exit();
    }

    // delete
    if( !isset($_POST["add"]) && isset($_POST["token"])  && isset($_POST["delete"]) && !isset($_POST["update"])  && isset($_POST["id"])){
        $result = $anabrans->deleteAnaBrans($database,$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"Ana Brans Silindi"));
        }
        exit();
    }

    // update
    if( !isset($_POST["add"]) && isset($_POST["token"])  && !isset($_POST["delete"]) && isset($_POST["update"])  && isset($_POST["id"])){
        $result = $anabrans->updateAnaBrans($database,$_POST["id"],$_POST["ana_brans_adi"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
        else{
            echo json_encode(array("status"=>"success","message"=>"Ana Brans guncellendi"));
        }
        exit();
    }

    // get record by id 
    if( !isset($_POST["add"]) && isset($_POST["token"])  && !isset($_POST["delete"]) && !isset($_POST["update"])  && isset($_POST["id"])){
        $result = $anabrans->getAnaBransById($database,$_POST["id"]);
        if($result == false){
            echo json_encode(array("status"=>"error","message"=>"Database Error"));
        }
        else{
            echo json_encode(array("status"=>"success","data"=>$result));
        }
        exit();
    }


        


}






