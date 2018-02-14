<?php
class Groupe{
    private $_NumGroupe;
    private $_NomProj;
    private $_Lycee;
    private $_ImageProjet;
    private $_Salle;

    public function __construct($groupe,$Proj,$Lycee,$Salle,$img)
    {
        $this->_NumGroupe = $groupe;
        $this->_NomProj = $Proj;
        $this->_Lycee = $Lycee;
        $this->_Salle = $Salle;
        $this->_ImageProjet = $img;
    }

    public function getNumGroupe(){
        return $this->_NumGroupe;
    }

    public function getNomProj(){
        return $this->_NomProj;
    }

    public function getLycee(){
        return $this->_Lycee;
    }

    public function getSalle(){
        return $this->_Salle;
    }

    public function setSalle($newSalle){
        $this->_Salle = $newSalle;
    }

    public function getImageProjet(){
        return  $this->_ImageProjet;
    }

    public function setNomProj($NomProj){
        $this->_NomProj = $NomProj;
    }

    public function setLycee($Lycee){
        $this->_Lycee = $Lycee;
    }

    public function setImageProj($img){
        $this->_ImageProjet = $img;
    }

}

?>
