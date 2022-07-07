<?php
class Connect{
    protected $connection;

    public function __construct()
    {
        $this->Connection();
    }
    public function Connection()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=sistema_site", "root", "");
            
        }catch (PDOException $e) {
            echo "ERRO AO CONECTAR NO BANCO" .$e->getMessage();
            die;
        }
    }
}