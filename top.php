<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>SISTEMA</title>
</head>
<?php 
session_start();
require_once 'addcliente.php';
require_once 'addproduto.php';?>
<body>
    <div id="container">
        <aside>
            <div id="logotipo">
                <img src="image/logo_new.png" alt="imagem logo">
            </div>
            <ul>
                <li id="buttonSide" onclick="cliente()">Adicionar Cliente<span class="material-symbols-outlined">person_add</span></li>
                <li id="buttonSide" onclick="produto()">Adicionar Produto<span class="material-symbols-outlined">add</span></li>
                <li id="linkSide"><span class="material-symbols-outlined">groups</span><a href="clientes.php">Clientes</a></li>
                <li id="linkSide"><span class="material-symbols-outlined">inventory_2</span><a href="produtos.php">Produtos</a></li>
                <li id="linkSide"><span class="material-symbols-outlined">add_shopping_cart</span><a href="historico.php">Histórico</a></li>
            </ul>
        </aside>
        <main>
            <header>
                <form action="" method="GET">
                    <div id="buscar">
                        <span class="material-symbols-outlined">search</span>
                        <input type="text" name="search" id="search" placeholder="Pesquisar">
                    </div>
                </form>
                <div id="userlogin">
                    <span>
                        <strong>
                            <?php
                            if(isset($_SESSION["usuario"])) {
                                echo$_SESSION["nome"];
                            } else {
                                header("location: index.php");
                            }?>
                        </strong>
                    </span>
                    <a href="modules/function/logout.php"><span class="material-symbols-outlined logout">logout</span></a>
                </div>
            </header>