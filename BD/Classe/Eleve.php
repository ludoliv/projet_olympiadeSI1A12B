<?php
class Eleve{
    private $_ID;
    private $_NumGroupe;
    private $_Filiere;

    public function __construct($ID,$Filiere,$grp)
    {
        $this->_ID = $ID;
        $this->_Filiere = $Filiere;
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

    public function getFiliere(){
        return $this->_Filiere;
      }
    }
?>
