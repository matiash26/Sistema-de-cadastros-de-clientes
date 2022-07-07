<?php
require_once 'configuration/connection.php';
class ClienteDB extends Connect{
    private $id;
    private $nome;
    private $telefone;
    private $filtro;
    private $compras;
    private $total;

    public function __construct()
    {
        parent::__construct();
    }
    public function Insert($nome, $telefone)
    {
        $QuerySqli =  $this->connection->prepare("INSERT INTO cliente(nome, telefone)
        VALUES(:n, :t)");
        $QuerySqli->bindParam(':n', $nome);
        $QuerySqli->bindParam(':t', $telefone);
        return $QuerySqli->execute();
        
    }
    public function select()
    {
        $QuerySqli = $this->connection->prepare("SELECT * FROM cliente ". $this->filtro);
        $QuerySqli->execute();
        return $QuerySqli->fetchAll(PDO::FETCH_OBJ);

    }
    public function update($nome, $telefone, $id)
    {
        $QuerySqli =  $this->connection->prepare("UPDATE cliente set nome = :n, telefone = :t WHERE id = :i");
        $QuerySqli->bindParam(':n', $nome);
        $QuerySqli->bindParam(':t', $telefone);
        $QuerySqli->bindParam(':i', $id);
        return $QuerySqli->execute();
    }

    public function delete()
    {
        $QuerySqli =  $this->connection->prepare("DELETE FROM cliente WHERE id = :i");
        $QuerySqli->bindParam(':i', $this->id);
        return $QuerySqli->execute();
    }
    public function lastID()
    {
        $QuerySqli =  $this->connection->prepare("SELECT max(id) from cliente");
        $QuerySqli->execute();
        $row = $QuerySqli->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['max(id)'];
    }

    //METODOS ESPECIAIS
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setTelefone($phone)
    {
        $this->telefone = $phone;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setFiltro($filtro)
    {
        $this->filtro = $filtro;
    }
    public function getFiltro()
    {
        return $this->filtro;
    }
    public function setCompras($compras){
        $this->compras = $compras;
    }
    public function getCompras()
    {
        return $this->compras;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getTotal()
    {
        return $this->total;
    }
}