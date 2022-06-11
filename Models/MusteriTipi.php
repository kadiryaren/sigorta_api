<?php

class MusteriTipi{
   
    public function getMusteriTipi($database){
        try{
            $sql = "SELECT * FROM musteri_tipi";
            $result = $database->query($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function getMusteriTipiById($id){
        try{
            $sql = "SELECT * FROM musteri_tipi WHERE id = $id";
            $result = $this->database->query($sql);
            $musteriTipi = $result->fetch_object();
            return $musteriTipi;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    public function insertMusteriTipi($database,$musteri_tipi_adi,$komisyon_orani){
        try{
            $sql = "INSERT INTO musteri_tipi (musteri_tipi_adi, komisyon_orani) VALUES ('$musteri_tipi_adi', '$komisyon_orani')";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function updateMusteriTipi($database, $id, $musteri_tipi_adi, $komisyon_orani){
        try{
            $sql = "UPDATE musteri_tipi SET musteri_tipi_adi = '$musteri_tipi_adi', komisyon_orani = '$komisyon_orani' WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function deleteMusteriTipi($database,$id){
        try{
            $sql = "DELETE FROM musteri_tipi WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    
}



