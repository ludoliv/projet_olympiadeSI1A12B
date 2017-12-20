<?php
class Administrateur{
    private $_Login;
    private $_Password;

    public function __construct($login,$pass)
    {   
        $this->_Login = $login;
        $this->_Password = $pass;
    }

    public function getLogin(){
        return $_Login;
    }

    public function getPassword(){
        return $_Password;
    }

    public function setPassword($Password){
        $_Password = $Password;
    }
}


?>