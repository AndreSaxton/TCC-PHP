<?php  require_once('validarLogin.php');/*
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['login'];
*/
?>
<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/gestaoFinanceira.css">
	
	<script language="javascript" src="_javascript/gestaoFinanceira.js">
	</script>	
</head>
<body>
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<br/>
	<div id="meio">		
		<button type="submit" onclick="exibirTabelaConta()">Mostrar todos<br/>os Cadastros</button>
		<br/>
		<br/>
		<input type="submit" value="Buscar" onclick="mostraDiv()"/>	
		<br/>
		<br/>	
		<a href="salvarConta.php"><input type="submit" value="Cadastrar"></a>
		<br/><br/>
		<!--a href="index.php"><input type="submit" value="Voltar"></a-->
		
		<aside id="direita">
			<?php
			?>		
		</aside>
		
		<aside	id="busca">
			<?php			
				include("buscarConta.php");
			?>
		</aside>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>
</body>
</html>