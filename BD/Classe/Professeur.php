<?php
class Professeur{
    private $_ID;
    private $_NumJury;

    public function __construct($ID,$jury)
    {
        $this->_ID = $ID;
        $this->_NumJury = $jury;
    }

    public function getID(){
        return $this->_ID;
    }

    public function getNumJury(){
        return $this->_NumJury;
    }

    public function setNumJury($jury){
      $this->_NumJury = $jury;
    }
}

?>
