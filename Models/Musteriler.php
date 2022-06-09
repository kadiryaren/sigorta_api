<?php

class Musteriler{
    private $musteri_adi;
    private $dogum_tarihi;
    private $telefon;
    private $mail_adresi;
    private $tc_kimlik;

    /**
     * Undocumented function
     *
     * @param [Object] $database
     * @param [String] $musteri_adi
     * @param [Date] $dogum_tarihi
     * @param [String] $telefon
     * @param [String] $mail_adresi
     * @param [String] $tc_kimlik
     */
    public function __construct($musteri_adi, $dogum_tarihi, $telefon, $mail_adresi, $tc_kimlik){
        $this->musteri_adi = $musteri_adi;
        $this->dogum_tarihi = $dogum_tarihi;
        $this->telefon = $telefon;
        $this->mail_adresi = $mail_adresi;
        $this->tc_kimlik = $tc_kimlik;
       
    }

    public function setDatabase($database){
        $this->database = $database;
    }

    public function getMusteriById($database, $id){
        
        try{
            $sql = "SELECT * FROM musteriler WHERE id = $id";
            $result = $this->database->query($sql);
            $musteri = $result->fetch_object();
            return $musteri;
        }
        catch(PDOException $e){
            return "false";
        }
    }

    public function getMusteriler(){
        try{
            $sql = "SELECT * FROM musteriler";
            $result = $this->database->query($sql);
            $musteriler = $result->fetch_all(MYSQLI_ASSOC);
            return $musteriler;
        }
        catch(PDOException $e){
            return "error";

        }
        
    }

    public function insertMusteri(){
        try{
            $query  =  $this->database->prepare("INSERT INTO musteriler (musteri_adi, dogum_tarihi, telefon, mail_adresi, tc_kimlik) VALUES (?, ?, ?, ?, ?)");
            $query->execute(array($this->musteri_adi, $this->dogum_tarihi, $this->telefon, $this->mail_adresi, $this->tc_kimlik));
        }
        catch(PDOException $e){
            return "error";
        }        
    }

    public function updateMusteri($id){
        try{
            $query  =  $this->database->prepare("UPDATE musteriler SET musteri_adi = ?, dogum_tarihi = ?, telefon = ?, mail_adresi = ?, tc_kimlik = ? WHERE id = ?");
            $query->execute(array($this->musteri_adi, $this->dogum_tarihi, $this->telefon, $this->mail_adresi, $this->tc_kimlik, $id));
        }
       catch(PDOException $e){
           return "error";

        }
    }
    public function deleteMusteri($id){
        try{
            $query  =  $this->database->prepare("DELETE FROM musteriler WHERE id = ?");
            $query->execute(array($id));
        }
        catch(PDOException $e){
            return "error";
        }
    }
    
}