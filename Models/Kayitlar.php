<?php

class Kayitlar{

    // get all customers which not-deleted
    public function getKayitlar($database){
        try{
            $sql = "SELECT * FROM kayitlar Where iptal_durum = 0";
            $result = $database->prepare($sql);
            $result->execute();

            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }
    }

    // get all deleted records 
    public function getKayitlarDeleted($database){
        
        try{
            $sql = "SELECT * FROM kayitlar WHERE iptal_durum = 1";
            $result = $database->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }       
        
    }

    // get all deleted records 
    public function getKayitlarByUser($database,$userid){
        
        try{
            $sql = "SELECT * FROM kayitlar WHERE iptal_durum = 0 AND musteri_id = '$userid'";
            $result = $database->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return false;
        }       
        
    }

    // get all deleted records 
    public function getDeletedKayitlarByUser($database,$userid){
    
    try{
        $sql = "SELECT * FROM kayitlar WHERE iptal_durum = 1 AND musteri_id= '$userid'";
        $result = $database->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
    catch(PDOException $e){
        return false;
    }       
    
}

    public function getKayitlarPlate($database,$plate){
       
        try{
            $sql = "SELECT * FROM kayitlar WHERE plaka = '$plate'"; 
            $result = $database->query($sql);
            $kayitlar = $result->fetch_all(MYSQLI_ASSOC);
            return $kayitlar;
        }
        catch(PDOException $e){
            return false;
        }
        
    }
    

    public function insertKayit($database, $plaka, $ruhsat_seri_no, $sigorta_sirketi, $ana_brans_id, $police_no, $police_bitis_tarih, $iptal_durumu, $musteri_id, $tarih){
        try{
            $sql = "INSERT INTO kayitlar ( plaka, ruhsat_seri_no, sigorta_sirketi, ana_brans_id, police_no, police_bitis_tarih, iptal_durum, musteri_id, tarih) VALUES ( '$plaka', '$ruhsat_seri_no', '$sigorta_sirketi', '$ana_brans_id', '$police_no', '$police_bitis_tarih', '$iptal_durumu', '$musteri_id', '$tarih')";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateKayit($database, $plaka, $ruhsat_seri_no, $sigorta_sirketi, $ana_brans_id, $police_no, $police_bitis_tarih, $iptal_durumu, $musteri_id, $tarih,$id){
        try{
            //$query  =  $this->database->prepare("UPDATE musteriler SET musteri_adi = ?, dogum_tarihi = ?, telefon = ?, mail_adresi = ?, tc_kimlik = ?, musteri_tipi_id = ? WHERE id = ?");
            //$query->execute(array($this->musteri_adi, $this->dogum_tarihi, $this->telefon, $this->mail_adresi, $this->tc_kimlik, $this->musteri_tipi_id, $id));
            $query = $database->prepare( "UPDATE kayitlar SET plaka = ?, ruhsat_seri_no = ?, sigorta_sirketi = ?, ana_brans_id = ?, police_no = ?, police_bitis_tarih = ?, iptal_durum = ?, musteri_id = ?, tarih = ? WHERE id = ?");
            $query->execute( array($plaka, $ruhsat_seri_no, $sigorta_sirketi, $ana_brans_id, $police_no, $police_bitis_tarih, $iptal_durumu,$musteri_id,$tarih, $id) );
            return $query;
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

    }

    public function deleteKayit($database,$id){
        try{
            $sql = "DELETE FROM kayitlar WHERE id = $id";
            $result = $database->query($sql);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }

    }

    

    


}








