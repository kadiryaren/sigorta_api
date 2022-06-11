<?php

class SonKayitlar{
    public function getSonKayitlar(){
        try{
            $sql = "SELECT * FROM son_kayitlar";
            $result = $this->database->query($sql);
            $sonKayitlar = $result->fetch_all(MYSQLI_ASSOC);
            return $sonKayitlar;
        }
        catch(PDOException $e){
            return "error";
        }
    }
}

