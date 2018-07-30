<?php
session_start();
$cd_login = $_SESSION['cd_login'];

$cd_carrinho = $_REQUEST["cd_carrinho"];
$cd_item = $_REQUEST["cd_item"];
echo $cd_carrinho;
echo $cd_item;
echo"<br>";

require_once('../conexao.php');

$busca = $conexao->query("DELETE item FROM item WHERE item.cd_item = $cd_item AND item.cd_carrinho = $cd_carrinho");
header('location: ../carrinho.php');
?>