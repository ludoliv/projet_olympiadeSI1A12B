<?php
class Heure{
    private $_ID;
    private $_hDeb;
    private $_hFin;

    public function __construct($id,$deb,$fin)
    {   
        $this->_ID = $id;
        $this->_hDeb = $deb;
        $this->_hFin = $fin;
    }

    public function getID(){
        return $_ID;
    }

    public function getDeb(){
        return $_hDeb;
    }

    public function getFin(){
        return $_hFin;
    }

}
?>