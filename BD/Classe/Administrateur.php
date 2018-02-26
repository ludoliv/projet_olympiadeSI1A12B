<?php
class Administrateur{
    /**
     * @author Quentin Bouny
     * 
     * Classe interface pour l'administrateur 
     */
    private $_Login;
    private $_Password;

    public function __construct($login,$pass)
    {
        /**
         * Constructeur pour la classe Administrateur 
         *
         * @param String $login Login pour cette instance de la classe
         * @param String $pass Mot de passe 
         */   
        $this->_Login = $login;
        $this->_Password = $pass;
    }

    public function getLogin(){
        /**
         * Retourne le login correspondant à l'instance de cette classe
         */
        return $_Login;
    }

    public function getPassword(){
        /**
         * Retourne le mot de passe correspondant l'instance de cette classe
         */
        return $_Password;
    }

    public function setPassword($Password){
        /**
         * Redefinit le mot de passe de l'instance
         */
        $_Password = $Password;
    }
}


?>