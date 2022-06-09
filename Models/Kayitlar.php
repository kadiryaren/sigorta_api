<?php

class Kayitlar{
 
    private $musteri_id;
    private $plaka;
    private $ruhsat_seri_no;
    private $sigorta_sirketi;
    private $ana_brans;
    private $police_no;
    private $police_bitis_tarih;
    private $iptal_durumu;
    

    public function __construct($musteri_id, $plaka, $ruhsat_seri_no, $sigorta_sirketi, $ana_brans, $police_no, $police_bitis_tarih, $iptal_durumu=false){
        $this->musteri_id = $musteri_id;
        $this->plaka = $plaka;
        $this->ruhsat_seri_no = $ruhsat_seri_no;
        $this->sigorta_sirketi = $sigorta_sirketi;
        $this->ana_brans = $ana_brans;
        $this->police_no = $police_no;
        $this->police_bitis_tarih = $police_bitis_tarih;
    }
    


}








