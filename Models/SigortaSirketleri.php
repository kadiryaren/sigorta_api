<?php

class SigortaSirketleri{

    public function getSigortaSirketleri($database){
        try{
            $sql = "SELECT * FROM sigorta_sirketleri";
            $result = $database->query($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function getSigortaSirketleriById($database,$id){
        try{
            $sql = "SELECT * FROM sigorta_sirketleri WHERE id = $id";
            $result = $database->query($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function insertSigortaSirketleri($database,$sirket_adi){
        try{
            $sql = "INSERT INTO sigorta_sirketleri (sirket_adi) VALUES ('$sirket_adi')";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function updateSigortaSirketleri($database,$id, $sirket_adi){
        try{
            $sql = "UPDATE sigorta_sirketleri SET sirket_adi = '$sirket_adi' WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
    
    public function deleteSigortaSirketleri($database,$id){
        try{
            $sql = "DELETE FROM sigorta_sirketleri WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
}

