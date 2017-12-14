<?php
/**
 *
 */
class Note
{

  private $_id;
  private $_prototype;
  private $_originalite;
  private $_demarcheSI;
  private $_pluriDisciplinarite;
  private $_maitrise;
  private $_devDurable;

  function __construct($id,$proto,$originalite,$demarcheSI,$pluriDisciplinarite,$maitrise,$devDurable)
  {
    $this->_id = $id;
    $this->_prototype = $proto;
    $this->_originalite = $originalite;
    $this->_demarcheSI = $demarcheSI;
    $this->_pluriDisciplinarite = $pluriDisciplinarite;
    $this->_maitrise = $maitrise;
    $this->_devDurable = $devDurable;
  }

  public function getID()
  {
    return $this->_id;
  }

  public function getProto()
  {
    return $this->_prototype;
  }

  public function getOrigin()
  {
    return $this->_originalite;
  }

  public function getdemarcheSI()
  {
    return $this->_demarcheSI;
  }

  public function getPluriDiscipline()
  {
    return $this->_pluriDisciplinarite;
  }

  public function getMaitrise()
  {
    return $this->_maitrise;
  }

  public function getDurable()
  {
    return $this->_devDurable;
  }

  public function setProto($proto)
  {
    $this->_prototype = $proto;
  }

  public function setOrigin($origin)
  {
    $this->_originalite= $origin;
  }

  public function setdemarcheSI($demarcheSI)
  {
    $this->_demarcheSI = $demarcheSI;
  }

  public function setPluriDiscipline($pluriDisciplinarite)
  {
    $this->_pluriDisciplinarite = $pluriDisciplinarite;
  }

  public function setMaitrise($maitrise)
  {
    $this->_maitrise = $maitrise;
  }

  public function setDurable($devDurable)
  {
    $this->_devDurable = $devDurable;
  }

}



 ?>
