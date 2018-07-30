<?php  
	require_once('validarLogin.php');
	/*
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
	
	<link rel="stylesheet" type="text/css" href="_css/salvarConta.css">	
	
	<script language="javascript" src="_javascript/salvarConta.js">	
	</script>	
</head>
<body onload="carregarDadosConta()">
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<div id="meio">	
		<div>
			<p>Cadastro de Contas</p>
			<button id="btn" type="submit" onclick="mostraBuscaPessoa()">Buscar<br/>Pessoa</button>
			<button id="btn" type="submit" onclick="exibirTabelaPessoa()">Mostrar todas<br/>as Pessoas</button>
			<button id="btn" type="submit" onclick="mostraBuscaConta()">Buscar<br/>Conta</button>
			<button id="btn" type="submit" onclick="exibirTabelaConta()">Mostrar todas<br/>as Contas</button>
		</div>
		
		<div id="asides">
		<aside id="esquerda">			
		</aside>
				
		<aside id="direita">
		</aside>
		
		<aside id="direitaPessoa">					
		</aside>
		
		<aside id="buscaPessoa" src="buscarPessoa.php">
			<?php			
				include("buscarPessoa.php");
			?>
		</aside>
		<aside id="buscaConta" src="buscarConta.php">
			<?php			
				include("buscarConta.php");
			?>
		</aside>
		</div>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>	
</body>
</html>