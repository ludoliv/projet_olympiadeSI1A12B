<?php
class Eleve{
    private $_ID;

    public function __construct($ID)
    {   
        $this->_ID = $ID;
    }

    public function getID(){
        return $this->_ID;
    }
}
?>