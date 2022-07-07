<?php
require_once 'configuration/connection.php';
class Usuario extends Connect{
    private $user;
    private $pwd;
    public function __construct($user, $pwd)
    {
        parent::__construct(); 
        
        $this->setUser($user);
        $this->setPwd($pwd);  
    }
    public function select()
    {
        $Sqli = $this->connection->prepare("SELECT * FROM usuario WHERE usuario = :u and password = :p");
        $Sqli->bindParam(":u", $this->user);
        $Sqli->bindParam(":p", $this->pwd);
        $Sqli->execute();
        return $Sqli->fetchAll(PDO::FETCH_OBJ);
    }
    private function setUser($user)
    {
        $this->user = $user;
    }
    private function getUser()
    {
        return $this->user;
    }
    private function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }
    private function getPwd()
    {
        return $this->pwd;
    }
}