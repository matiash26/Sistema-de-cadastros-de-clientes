<?php
require_once "../usuario.php";
$user = addslashes($_POST["user"]);
$pwd  = addslashes($_POST["password"]);
session_start();
if (isset($user) && isset($pwd)) {
    $usuario = new Usuario($user, $pwd);
    if (!empty($usuario->select())) {
        $row = $usuario->select()[0];
        $_SESSION["usuario"] = $row->usuario;
        $_SESSION["nome"] = $row->nome;
        $_SESSION["cargo"] = $row->cargo;

        if (isset($_SESSION["msg-alert"])) {
            $_SESSION["msg-alert"] = "";
        }
    } else {
        $_SESSION["msg-alert"] = "Usuário ou senha inválida!";
    }
    header("location: ../../index.php");
}
