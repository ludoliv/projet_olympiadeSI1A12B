<?php
class Eleve{
    private $_ID;
    private $_NumGroupe;

    public function __construct($ID,$grp)
    {
        $this->_ID = $ID;
        $this->_NumGroupe = $grp;
    }

    public function getID(){
        return $this->_ID;
    }

    public function getNumGroupe(){
      return $this->_NumGroupe;
    }

    public function setNumGroupe($grp){
      $this->_NumGroupe = $grp;
    }
    }
?>
