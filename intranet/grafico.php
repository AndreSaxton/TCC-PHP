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
	<link rel="stylesheet" type="text/css" href="_css/grafico.css">
	
	<script language="javascript" src="_javascript/grafico.js">
	</script>	
</head>
<body onload="setThisYear();">
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<br/>
	<div id="meio">	
		<div>
			<p>Buscar:
				<select name="nTipoConta" id="iTipoConta">
					<option value="1">Lucro</option>
					<option value="0">Gasto</option>
				</select>
			</p>
			<p>Mes:
				<select name="nMesConta" id="iMesConta">
					<option value="0">Anual</option>
					<option value="1">Janeiro</option>
					<option value="2">Fevereiro</option>
					<option value="3">Março</option>
					<option value="4">Abril</option>
					<option value="5">Maio</option>
					<option value="6">Junho</option>
					<option value="7">Julho</option>
					<option value="8">Agosto</option>				
					<option value="9">Setembro</option>
					<option value="10">Outubro</option>
					<option value="11">Novembro</option>
					<option value="12">Dezembro</option>
				</select>
			</p>
			<p>Ano:<input name="nAnoConta" id="iAnoConta" type="text" size="5"/></p>
			<br/><br/><br/>
			<input id="btn" type="submit" value="Buscar" onclick="gerarGrafico()"/>
		</div>
		<center><div id="divGrafico">
			<?php
				//include("../Grafico/googlechartMySql.php");
			?>
		</div></center>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>
</body>
</html>