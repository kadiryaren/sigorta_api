<?php

class AnaBrans{
    
    public function getAnaBrans($database){
        try{
            $sql = "SELECT * FROM ana_brans";
            $result = $database->query($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }
   

    public function getAnaBransById($database,$id){
        try{
            $sql = "SELECT * FROM ana_brans WHERE id = $id";
            $result = $database->query($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function insertAnaBrans($database,$brans_adi){
        try{
            $sql = "INSERT INTO ana_brans (brans_adi) VALUES ('$brans_adi')";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function updateAnaBrans($database,$id,$brans_adi){
        try{
            $sql = "UPDATE ana_brans SET brans_adi = '$brans_adi' WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function deleteAnaBrans($database,$id){
        try{
            $sql = "DELETE FROM ana_brans WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }

    
}







