<?php
session_start();

//verifica dados da sessao de login
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){

    //usuario nao logado
    header("Location: login.php");
    exit;

}
?>