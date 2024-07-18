<?php

session_start();

include 'conexao.php';

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');

$sql = "select * from login where usuario=? and senha=?";

$bc = new Conexao();
$con = $bc->getConexao();

$valores = $con->prepare($sql);
$valores->bindValue(1, $usuario);
$valores->bindValue(2, $senha);
$valores->execute();

if($valores->rowCount()>0){
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    header('Location:central.php');
}else{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location:index.php?erro=true');
}

?>