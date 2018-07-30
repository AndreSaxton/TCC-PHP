<?php  
	require_once('validarLogin.php');/*
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['login'];*/
?>
<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarUsuario.css">
	
	<script language="javascript" src="_javascript/salvarUsuario.js">				
	</script>	
</head>
<body onload="carregarDadosUsuario()">	
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<div id="meio">
	
		<div>
			<p>Cadastro de Usuários</p>				
			<button id="btn" type="submit" onclick="mostraDiv()">Buscar<br/>Usuário</button>
			<button id="btn" type="submit" onclick="exibirTabelaUsuario()">Mostrar todos<br/>os Usuários</button>
			<button id="btn" type="submit" onclick="mostraBuscaPessoa()">Buscar<br/>Pessoa</button>
			<button id="btn" type="submit" onclick="exibirTabelaPessoa()">Mostrar todas<br/>as Pessoas</button>
		</div>
		<div id="asides">
		<aside id="esquerda">
		</aside>
		
		<aside id="direita">
		</aside>
		
		<aside id="buscaPessoa">
			<?php
				include("buscarPessoa.php");
			?>
		</aside>
		
		<aside id="busca">
			<?php
				include("buscarUsuario.php");
			?>
		</aside>
		</div>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>	
</body>
</html>