<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<link rel="stylesheet" type="text/css" href="_css/index.css">
	<script language="javascript">		
		function deslogar(){
			top.window.location='login.php';
		}		
	</script>
	<?php
		session_start();
		if(isset ($_SESSION['login']) == true){echo "<link rel='stylesheet' type='text/css' href='_css/index2.css'>";}
	?>
	<?php  /*
	$logado = "";
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	//unset($_SESSION['login']);
	//unset($_SESSION['senha']);
	//header('location:index.php');
	}

	$logado = $_SESSION['login'];
//*/?>
</head>
<body name="corpo">	
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<div id="meio">
		<h1>Utilize o Menu acima para navegar no Sistema</h1>		
		<h3>Não se esqueça de Logar antes</h3>
		<!--center>
			<figure>
				<a href="gestaoPessoa.php"><img src="_imagens/avatar.jpg" id="btn" type="submit" title="Gestão Comercial"/>
				<figcaption>Gestão Comercial</figcaption></a>
			</figure>
			<figure>
				<a href="gestaoFinanceira.php"><img src="_imagens/envelope.png" id="btn"/>
				<figcaption>Gestão Financeira</figcaption></a>
			</figure>
		</center-->	
		<center>
		<?php 
			if(isset ($_SESSION['login']) == true)
				{/*nao parece nada*/}
			else
				echo "
					<form method='post' action='logar.php' id='formlogin' name='formlogin'>
						<table>
						<tr><td>
						<label>NOME:</label>
						</td><td>
						<input type='text' name='login' id='login' size='10' tabindex=1/>
						</td></tr>
						<tr><td>
						<label>SENHA:</label>
						</td><td>
						<input type='password' name='senha' id='senha' size='10' tabindex=2/>
						</td></tr>
						<tr><td colspan='2'>
						<input type='submit' id='submit' value='LOGAR' tabindex=3/>
						</td></tr>
						</table>
					</form>";
			?>
		</center>
	</div>	
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>	
</body>
</html>