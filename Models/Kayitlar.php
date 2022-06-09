<?php

class Kayitlar{
    private $database;
    private $musteri_id;
    private $plaka;
    private $ruhsat_seri_no;
    private $sigorta_sirketi;
    private $ana_brans_id;
    private $police_no;
    private $police_bitis_tarih;
    private $iptal_durumu;
    

    public function __construct($musteri_id, $plaka, $ruhsat_seri_no, $sigorta_sirketi, $ana_brans_id, $police_no, $police_bitis_tarih, $iptal_durumu=false){
        $this->musteri_id = $musteri_id;
        $this->plaka = $plaka;
        $this->ruhsat_seri_no = $ruhsat_seri_no;
        $this->sigorta_sirketi = $sigorta_sirketi;
        $this->ana_brans_id = $ana_brans_id;
        $this->police_no = $police_no;
        $this->police_bitis_tarih = $police_bitis_tarih;
    }


    public function setDatabase($database){
        $this->database = $database;
    }

    public function getKayitlar(){
        try{
            $sql = "SELECT * FROM kayitlar";
            $result = $this->database->query($sql);
            $kayitlar = $result->fetch_all(MYSQLI_ASSOC);
            return $kayitlar;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function getKayitById($id){
        try{
            $sql = "SELECT * FROM kayitlar WHERE id = $id";
            $result = $this->database->query($sql);
            $kayit = $result->fetch_object();
            return $kayit;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function insertKayit(){
        try{
            $sql = "INSERT INTO kayitlar (musteri_id, plaka, ruhsat_seri_no, sigorta_sirketi, ana_brans_id, police_no, police_bitis_tarih, iptal_durumu) VALUES ('$this->musteri_id', '$this->plaka', '$this->ruhsat_seri_no', '$this->sigorta_sirketi', '$this->ana_brans_id', '$this->police_no', '$this->police_bitis_tarih', '$this->iptal_durumu')";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }
    }

    public function updateKayit($id){
        try{
            //$query  =  $this->database->prepare("UPDATE musteriler SET musteri_adi = ?, dogum_tarihi = ?, telefon = ?, mail_adresi = ?, tc_kimlik = ?, musteri_tipi_id = ? WHERE id = ?");
            //$query->execute(array($this->musteri_adi, $this->dogum_tarihi, $this->telefon, $this->mail_adresi, $this->tc_kimlik, $this->musteri_tipi_id, $id));
            $query = $this->database->prepare( "UPDATE kayitlar SET musteri_id = ?, plaka = ?, ruhsat_seri_no = ?, sigorta_sirketi = ?, ana_brans_id = ?, police_no = ?, police_bitis_tarih = ?, iptal_durumu = ? WHERE id = ?");
            $query->execute( array($this->musteri_id, $this->plaka, $this->ruhsat_seri_no, $this->sigorta_sirketi, $this->ana_brans_id, $this->police_no, $this->police_bitis_tarih, $this->iptal_durumu, $id) );
        }
        catch(PDOException $e){
            return "error";
        }

    }

    public function deleteKayit($id){
        try{
            $sql = "DELETE FROM kayitlar WHERE id = $id";
            $result = $this->database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return "error";
        }

    }

    

    


}








