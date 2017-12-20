<?php
class Eleve{
    private $_NumEdition;
    private $_LogOlympiades;
    private $_LogoSponsor;
    private $_LogoUPSTI;
    private $_dateOlymp;
    private $_BandeauPartenaires;
    private $_LogoIUT;


    public function __construct($Editon,$LogOlympiades,$logoSponsor,$logoUPSTI,$date,$Bandeau,$logoIUT)
    {
        $this->_NumEdition = $Editon;
        $this->_LogOlympiades = $LogOlympiades;
        $this->_LogoSponsor = $logoSponsor;
        $this->_LogoUPSTI = $logoUPSTI;
        $this->_dateOlymp = $date;
        $this->_BandeauPartenaires = $Bandeau;
        $this->_LogoIUT = $logoIUT;
    }

    public function getEdition(){
        return $this->_NumEdition ;
    }

    public function getLogOlympiades(){
      return $this->_LogOlympiades;
    }

    public function getLogoSponsor(){
        return $this->_LogoSponsor;
    }

    public function getLogoUPSTI(){
        return $this->_LogoUPSTI;
    }

    public function getDate(){
        return $this->_dateOlymp;
    }

    public function getBandeau(){
        return $this->_BandeauPartenaires;
    }

    public function getIUT(){
        return $this->_LogoIUT;
    }

    public function setEdition($edition){
        $this->_NumEdition = $edition;
    }

    public function setLogOlympiades($logo){
        $this->_LogOlympiades = $logo;
      }
  
      public function setLogoSponsor($logo){
          $this->_LogoSponsor = $logo;
      }
  
      public function setLogoUPSTI($logo){
          $this->_LogoUPSTI = $logo;
      }
  
      public function setDate($date){
          $this->_dateOlymp = $date;
      }
  
      public function setBandeau($bandeau){
          $this->_BandeauPartenaires = $bandeau;
      }
  
      public function setIUT($logo){
          $this->_LogoIUT = $logo;
      }

    }
?>
