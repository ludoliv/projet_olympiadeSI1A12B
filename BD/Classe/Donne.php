<?php
/**
 *
 */
class Donne
{

  private $_NumJury;
  private $_NumGroupe;
  private $_IdNote;

  function __construct($NumJury,$NumGroupe,$idNote)
  {
    $this->_NumJury = $NumJury;
    $this->_NumGroupe = $NumGroupe;
    $this->_IdNote = $idNote;
  }

  public function get_NumJury(){
    return $this->_NumJury;
  }

  public function get_NumGroupe(){
    return $this->_NumGroupe;
  }

  public function get_IdNote(){
    return $this->_IdNote;
  }
}


 ?>