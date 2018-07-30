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
	
	<link rel="stylesheet" type="text/css" href="_css/gestaoPessoa.css">
		
	<script language="javascript" src="_javascript\relAlteracoes.js">	
	</script>	
</head>
<body>
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<br/>
	<div id="meio">	
		<button type="submit" onclick="exibirTabelaLog()">Mostrar histórico de<br/>Cadastros</button>
		<br/><br/>
		<button type="submit" onclick="exibirTabelaAcesso()">Mostrar histórico de<br/>Acessos</button>

		<!--input id="btn" type="submit" value="Buscar" onclick="mostraDiv()"-->
		<!--br/><br/><br/-->
		
		<br/><br/>
		<!--a id="btn" href="index.php"><input type="submit" value="Voltar"></a-->
		<br/>
		<aside id="direita">
			<?php
				//include("exibirTabelaPessoa.php");
			?>
		</aside>
		<aside id="busca">
			<?php
				
			?>
		</aside>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>
</body>
</html>