<?php
/**
 *
 */
class Recompense
{
  private $_IDr;
  private $_idGroupe;
  private $_Categorie;

  function __construct($idR,$idGroupe,$Categorie)
  {
    $this->_IDr = $idR;
    $this->_idGroupe = $idGroupe;
    $this->_Categorie = $Categorie;
  }

  public function getID(){
    return $this->_IDr;
  }

  public function getIDGroupe(){
    return $this->_idGroupe;
  }

  public function getCategorie(){
    return $this->_Categorie;
  }

  public function setIDGroupe($idGroupe){
    $this->_idGroupe = $idGroupe;
  }
}
 ?>
