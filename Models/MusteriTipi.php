<?php

class MusteriTipi{
    private $musteri_tipi_adi;
    private $komisyon_orani;

    public function __construct($musteri_tipi_adi, $komisyon_orani){
        $this->musteri_tipi_adi = $musteri_tipi_adi;
        $this->komisyon_orani = $komisyon_orani;
    }
    public function setDatabase($database){
        $this->database = $database;
    }
    public function getMusteriTipi(){
        try{
            $sql = "SELECT * FROM musteri_tipi";
            $result = $this->database->query($sql);
            $musteriTipi = $result->fetch_all(MYSQLI_ASSOC);
            return $musteriTipi;
        }
        catch(PDOException $e){
            return "error";
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
    public function insertMusteriTipi(){
        try{
            $sql = "INSERT INTO musteri_tipi (musteri_tipi_adi, komisyon_orani) VALUES ('$this->musteri_tipi_adi', '$this->komisyon_orani')";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    public function updateMusteriTipi($id, $musteri_tipi_adi, $komisyon_orani){
        try{
            $sql = "UPDATE musteri_tipi SET musteri_tipi_adi = '$musteri_tipi_adi', komisyon_orani = '$komisyon_orani' WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function deleteMusteriTipi($id){
        try{
            $sql = "DELETE FROM musteri_tipi WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }
    
}



