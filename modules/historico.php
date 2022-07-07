<?php
require_once 'configuration/connection.php';
class HistoricoDB extends Connect{
    private $filtro;
    private $h_id;
    private $h_idcliente;
    private $h_idproduto;
    private $h_entrega;
    private $h_qtd;
    private $h_valor;
    private $h_status;
    public function __construct()
    {
        parent::__construct();
    }
    public function select(){
        $res = array();
        $Sqli = $this->connection->query("SELECT h.id, c.nome, c.telefone, h.entrega, p.produto, h.qtd, h.valor, h.status_p , h.idproduto, h.idcliente FROM historico h join cliente c on h.idcliente = c.id 
        join produto p on h.idproduto = p.id ". $this->filtro ." order by h.id desc");
        $res = $Sqli->fetchAll(PDO::FETCH_OBJ);
        return $res;

    }
    public function insert($idcliente, $idproduto, $data, $qtd, $valor, $status){
        $Sqli = $this->connection->prepare("INSERT INTO historico(idcliente, idproduto, entrega, qtd, valor, status_p)
        VALUES(:idc, :idp, :e, :q, :v, :sp)");
        $Sqli->bindParam(':idc', $idcliente);
        $Sqli->bindParam(':idp', $idproduto);
        $Sqli->bindParam(':e', $data);
        $Sqli->bindParam(':q', $qtd);
        $Sqli->bindParam(':v', $valor);
        $Sqli->bindParam(':sp', $status);
        return $Sqli->execute();

    }
    public function update($idproduto, $data, $qtd, $valor, $status, $h_id){
        $Sqli = $this->connection->prepare("UPDATE historico SET idproduto = :p, entrega = :e, qtd = :q, valor = :v, status_p = :sp WHERE id = :id");
        $Sqli->bindParam(':p', $idproduto);
        $Sqli->bindParam(':e', $data);
        $Sqli->bindParam(':q', $qtd);
        $Sqli->bindParam(':v', $valor);
        $Sqli->bindParam(':sp',$status);
        $Sqli->bindParam(':id',$h_id);
        return $Sqli->execute();

    }
    public function delete($historicoID){
        $Sqli = $this->connection->prepare("DELETE FROM historico WHERE id = :i");
        $Sqli->bindParam(':i', $historicoID);
        return $Sqli->execute();
    }
    
    //METODOS ESPECIAIS
    public function setH_ID($id)
    {
        $this->h_id = $id;
    }
    public function getH_ID()
    {
        return $this->h_id;
    }
    public function setFiltro($filtro)
    {
        $this->filtro = $filtro;
    }
    public function getFiltro()
    {
        return $this->filtro;
    }
    public function setH_IDC($ID_C)
    {
        $this->h_idcliente = $ID_C;
    }
    public function getH_IDC()
    {
        return $this->h_idcliente;
    }
    public function setH_IDP($ID_P)
    {
        $this->h_idproduto = $ID_P;
    }
    public function getH_IDP()
    {
        return $this->h_idproduto;
    }
    public function setH_entrega($entrega)
    {
        $this->h_entrega = $entrega;
    }
    public function getH_entrega()
    {
        return $this->h_entrega;
    }
    public function setH_Qtd($qtd)
    {
        $this->h_qtd= $qtd;
    }
    public function getH_Qtd()
    {
        return $this->h_qtd;
    }
    public function setH_valor($valor)
    {
        $this->h_valor = $valor;
    }
    public function getH_valor()
    {
        return $this->h_valor;
    }
    public function setH_status($status)
    {
        $this->h_status = $status;
    }
    public function getH_status()
    {
        return $this->h_status;
    }
}
