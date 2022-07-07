<?php
require_once 'configuration/connection.php';
class ProdutoDB extends Connect{
    private $id;
    private $produto;
    private $valor;
    private $filtro;

    public function __construct()
    {
        parent::__construct();
        
    }
    public function Update()
    {
        $QuerySqli = $this->connection->prepare("UPDATE produto set produto = :p, valor = :v WHERE id = :i");
        $QuerySqli->bindParam(':p', $this->produto);
        $QuerySqli->bindParam(':v', $this->valor);
        $QuerySqli->bindParam(':i', $this->valor);
        return $QuerySqli->execute();
    }
    public function insert($produto, $valor)
    {
        $QuerySqli =  $this->connection->prepare("INSERT INTO produto(produto, valor)
        VALUES(:p, :v)");
        $QuerySqli->bindParam(':p', $produto);
        $QuerySqli->bindParam(':v', $valor);
        return $QuerySqli->execute();
    }
    public function select()
    {
        $QuerySqli =  $this->connection->prepare("SELECT * FROM produto ".$this->filtro);
        $QuerySqli->execute();
        return $QuerySqli->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteProduto()
    {
        $QuerySqli = $this->connection->prepare("DELETE FROM produto WHERE id = ':i'");
        $QuerySqli->bindParam(':i', $this->id);
        return $QuerySqli->execute();
    }
    public function valor($id)
    {
        $valor = $this->connection->prepare("SELECT valor FROM produto WHERE id = :i");
        $valor->bindParam(':i', $id);
        $valor->execute();
        $row_valor = $valor->fetchAll(PDO::FETCH_ASSOC);
        return $row_valor[0]['valor'];
    }

    public function setIDP($id)
    {
        $this->id = $id;
    }
    public function getIDP()
    {
        return $this->id;
    }
    public function setproduto($produto)
    {
        $this->produto = $produto;
    }
    public function getproduto()
    {
        return $this->produto;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setFiltro($filtro)
    {
        $this->filtro = $filtro;
    }
    public function getFiltro()
    {
        return $this->filtro;
    }
}