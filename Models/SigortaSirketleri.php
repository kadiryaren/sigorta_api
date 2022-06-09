<?php

class SigortaSirketleri{
    private $sirket_adi;

    public function __construct($sirket_adi){
        $this->sirket_adi = $sirket_adi;
    }
    public function setDatabase($database){
        $this->database = $database;
    }
    public function getSigortaSirketleri(){
        try{
            $sql = "SELECT * FROM sigorta_sirketleri";
            $result = $this->database->query($sql);
            $sigortaSirketleri = $result->fetch_all(MYSQLI_ASSOC);
            return $sigortaSirketleri;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    public function getSigortaSirketleriById($id){
        try{
            $sql = "SELECT * FROM sigorta_sirketleri WHERE id = $id";
            $result = $this->database->query($sql);
            $sigortaSirketleri = $result->fetch_object();
            return $sigortaSirketleri;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    public function insertSigortaSirketleri(){
        try{
            $sql = "INSERT INTO sigorta_sirketleri (sirket_adi) VALUES ('$this->sirket_adi')";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    public function updateSigortaSirketleri($id, $sirket_adi){
        try{
            $sql = "UPDATE sigorta_sirketleri SET sirket_adi = '$sirket_adi' WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    
    public function deleteSigortaSirketleri($id){
        try{
            $sql = "DELETE FROM sigorta_sirketleri WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
}

