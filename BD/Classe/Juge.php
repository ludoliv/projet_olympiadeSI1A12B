<?php
/**
 *
 */
class Juge
{

  private $_NumJury;
  private $_NumGroupe;
  private $_IdHeure;

  function __construct($NumJury,$NumGroupe,$idHeure)
  {
    $this->_NumJury = $NumJury;
    $this->_NumGroupe = $NumGroupe;
    $this->_IdHeure = $idHeure;
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
