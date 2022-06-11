<?php

class Musteriler{
    
    public function setDatabase($database){
        $this->database = $database;
    }

    public function getMusteriById($database, $id){
        
        try{
            $sql = "SELECT * FROM musteriler WHERE id = $id";
            $result = $this->database->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return "false";
        }
    }
    // returns all records
    public function getMusteriler($database){
        try{
            $sql = "SELECT * FROM musteriler ORDER BY musteri_adi ASC";
            $result = $database->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;

        }
        
    }

    public function insertMusteri($database,$musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik,$musteri_tipi_id){
        try{
            $query  =  $database->prepare("INSERT INTO musteriler (musteri_adi, dogum_tarihi, telefon, mail_adresi, tc_kimlik, musteri_tipi_id) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute(array($musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik, $musteri_tipi_id));
            return true;
        }
        catch(PDOException $e){
            return false;
        }        
    }

    public function updateMusteri($database,$id,$musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik,$musteri_tipi_id){
        try{
            $query  =  $database->prepare("UPDATE musteriler SET musteri_adi = ?, dogum_tarihi = ?, telefon = ?, mail_adresi = ?, tc_kimlik = ?, musteri_tipi_id = ? WHERE id = ?");
            $query->execute(array($musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik, $musteri_tipi_id, $id));
            return $query;
        }
       catch(PDOException $e){
           return false;

        }
    }
    public function deleteMusteri($database,$id){
        try{
            $query  =  $database->prepare("DELETE FROM musteriler WHERE id = ?");
            $query->execute(array($id));
            return $query;
        }
        catch(PDOException $e){
            return false;
        }
    }
    
}