<?php
class Jury{
    private $_NumJury;
    private $_Login;
    private $_Password;

    public function __construct($id,$login,$pass)
    {   
        $this->_NumJury = $id;
        $this->_Login = $login;
        $this->_Password = $pass;
    }


    public function getNumJury(){
        return $this->_NumJury;
    }

    public function getLogin(){
        return $this->_Login;
    }

    public function getPassword(){
        return $this->_Password;
    }

    public function setPassword($Password){
        $_Password = $Password;
    }

    public function setLogin($Login){
        $_Login = $Login;
    }
}


?>