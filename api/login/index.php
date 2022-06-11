<?php
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");


include("../../Controller/login.php");
include("../../db/db.php");

$login = new Login();
if(!empty($_POST)){
    @$username = $_POST["username"];
    @$password = $_POST["password"];
    @$token = $_POST["token"];
    if(isset($username) && isset($password)){
        if(isset($token)){
            $result = $login->login($database, $username, $password,180,$token);
            if($result != false){
                echo json_encode(array("status"=>"success","token"=>$result));
            }else{
                echo json_encode(array("status"=>"error","message"=>"kullanici adi veya sifre hatali"));
            }
        }else{
            $result = $login->login($database, $username, $password,180);
            if($result != false){
                echo json_encode(array("status"=>"success","token"=>$result));
            }else{
                echo json_encode(array("status"=>"error","message"=>"kullanici adi veya sifre hatali"));
            }
        }
        
    }else{
        echo json_encode(array("status"=>"missing-parameters","message"=>"kullanici adi veya sifre parametreleri eksik"));
    }
}





