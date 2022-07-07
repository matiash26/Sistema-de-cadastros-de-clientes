<?php
require_once "../historico.php";
require_once "../clientes.php";
require_once "../produtos.php";


session_start();
if ($_SESSION["cargo"] == 2) {
    $nome = addslashes($_POST["nome"] ?? "");
    $telefone = addslashes($_POST["telefone"] ?? "");
    $data = addslashes($_POST["data"] ?? "");
    $clienteID = addslashes($_POST["idcliente"]?? "");
    $historicoID = addslashes($_POST["historicoid"]);
    $preco = addslashes($_POST["preco"]);
    $produtos = addslashes($_POST["produtos"] ?? "");
    $qtd = addslashes($_POST["quantidade"] ?? "");
    $status = addslashes($_POST["status"] ?? "");

    $btn = addslashes($_POST["botao"] ?? "");

    $historico = new HistoricoDB();
    $cliente = new ClienteDB();
    $produto = new ProdutoDB();
    switch ($btn) {
        case "Adicionar Cliente";
            if ($cliente->Insert($nome, $telefone)) {
                $idCliente = $cliente->lastID();
            } else {
                $cliente->setFiltro("WHERE nome = '$nome'");
                $idCliente = $cliente->Select()[0]->id;
            }
            $valor = $produto->Valor($produtos);
            $historico->Insert($idCliente, $produtos, $data, $qtd, $valor, $status);
            break;
        case "Adicionar Produto";
            $produto->insert($produtos, $preco);
            break;
        case "Editar";
            $valor = $produto->Valor($produtos);
            var_dump($historico->Update($produtos, $data, $qtd, $valor, $status, $historicoID));
            $cliente->Update($nome, $telefone, $clienteID);
            break;
        case "Delete";
            $historico->delete($historicoID);
            break;
    }
    header("location: ../../index.php");
}
?>