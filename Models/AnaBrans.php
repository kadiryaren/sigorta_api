<?php

class AnaBrans{

    private $bransId;

    public function __construct($bransId){
        $this->bransId = $bransId;
    }
    public function setDatabase($database){
        $this->database = $database;
    }
    public function getAnaBrans(){
        try{
            $sql = "SELECT * FROM ana_branslar";
            $result = $this->database->query($sql);
            $anaBranslar = $result->fetch_all(MYSQLI_ASSOC);
            return $anaBranslar;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function getAnaBransById($id){
        try{
            $sql = "SELECT * FROM ana_branslar WHERE id = $id";
            $result = $this->database->query($sql);
            $anaBrans = $result->fetch_object();
            return $anaBrans;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function insertAnaBrans(){
        try{
            $sql = "INSERT INTO ana_branslar (brans_id) VALUES ('$this->bransId')";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function updateAnaBrans($id, $bransId){
        try{
            $sql = "UPDATE ana_branslar SET brans_id = '$bransId' WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function deleteAnaBrans($id){
        try{
            $sql = "DELETE FROM ana_branslar WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    
}







