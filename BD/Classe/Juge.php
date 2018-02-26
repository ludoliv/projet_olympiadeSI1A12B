<?php
/**
 *
 */
class Juge
{

  private $_NumJury;
  private $_NumGroupe;
  private $_IdHeure;
  private $_salle;

  function __construct($NumJury,$NumGroupe,$idHeure,$salle)
  {
    $this->_NumJury = $NumJury;
    $this->_NumGroupe = $NumGroupe;
    $this->_IdHeure = $idHeure;
    $this->_salle = $salle;
  }

  public function get_NumJury(){
    return $this->_NumJury;
  }

  public function get_NumGroupe(){
    return $this->_NumGroupe;
  }

  public function get_idHeure(){
    return $this->_IdHeure;
  }

  public function getSalle(){
    return $this->_salle;
  }

  public function setSalle($newSalle){
    $this->_salle = $newSalle;
  }

  public function setIdHeure($id)
  {
    $this->_IdHeure = $id;
  }

  public function __toString()
  {
      return $this->_NumGroupe. " ".$this->_IdHeure." ".$this->_NumJury."<br>";
  }
}


 ?>
