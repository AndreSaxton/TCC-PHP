<?php  
	$logado = "";
	$sigla = "";
	$cd_login = "";
	session_start();

	require_once('confirmarLogin.php');

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['cd_login']) == true)){}
	else {
		$logado = $_SESSION['login'];
		$sigla = $_SESSION['sigla'];
		$cd_login = $_SESSION['cd_login'];
		//$sigla = "Admin";
	}
//*/?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="_css/cabecalho.css">
		<style>
			body{
				margin: 5px;
			}
			#divLogin{
				
				float: right;
				position: relative;
				right: 10px;
				top: -5px;
			}
			#divLogin table, tr, td{
				margin 0px;
				padding: 0px;
				top: 0px;
				vertical-align: top;
			}
			#submit{
				height: 42px;
			}
		</style>
		<script language="javascript">		
		function deslogar(){
			window.location='logar.php';
		}		
		</script>		
	</head>
	<body>	
		<div id="itens1">
			<a target="_parent" href="index.php"><button id="item1">HOME</button></a>
		</div>
		<div id="itens2">
			<button id="item2">CONSULTA</button>
			<div id="sub2">
				<?php
					if($sigla=="Comercial"||$sigla=="Administrativo")
						echo"
						<a target='_parent' href='gestaoPessoa.php'><p>
						Gestão Comercial
						</p></a>";
					if($sigla=="Financeiro"||$sigla=="Administrativo")
						echo "
						<a target='_parent' href='gestaoFinanceira.php'><p>
						Gestão Financeira
						</p></a>";
				?>
			</div>
		</div>
		<div id="itens3">
			<button id="item3">CADASTRO</button>
			<div id="sub3">
				<?php
					if($sigla=="Comercial"||$sigla=="Administrativo")
						echo"
						<a target='_parent' href='salvarPessoa.php'><p>
						Cadastrar Pessoa
						</p></a>";
					if($sigla=="Financeiro"||$sigla=="Administrativo")
						echo "
						<a target='_parent' href='salvarConta.php'><p>
						Cadastrar Conta
						</p></a>";
				?>
			</div>
		</div>
		<?php
		if($sigla=="Administrativo")
		echo "
		<div id='itens4'>
			<button id='item4'>GRAFICOS</button>
			<div id='sub4'>
				<a target='_parent' href='grafico.php'><p>
					Grafico de Contas
				</p></a>
			</div>
		</div>
		";?>
		<?php
		if($sigla=="Administrativo")
		echo "
		<div id='itens4'>
			<button id='item4'>ADMINISTRATIVO</button>
			<div id='sub4'>
				<a target='_parent' href='gestaoUsuario.php'><p>
					Gestão de Usuários
				</p></a>
				<a target='_parent' href='salvarUsuario.php'><p>
					Cadastrar Usuários
				</p></a>
				<a target='_parent' href='relAlteracoes.php'><p>
					Históricos
				</p></a>
			</div>
		</div>
		";?>
		<?php
		if($sigla=="Administrativo")
		echo "
		<div id='itens4'>
			<button id='item4'>ESTOQUE</button>
			<div id='sub4'>
				<a target='_parent' href='gestaoProduto.php'><p>
					Gestão do Estoque
				</p></a>
				<a target='_parent' href='salvarProduto.php'><p>
					Cadastrar Produto
				</p></a>
			</div>
		</div>
		";?>
		<div id="divLogin">
			<?php 
			if($logado!="")
				{
					echo"
					<table>
					<tr><td>
					<label>Bem Vindo,</label>
					</td><td rowspan='2'>
					<button id='submit' onclick='deslogar()'>Logout</button>
					</td></tr>
					<tr><td>
					<label>$logado</label>
					</td></tr>
					</table>
				";}
			else
				echo "
					<form method='post' action='logar.php' id='formlogin' name='formlogin'>
						<table>
						<tr><td>
						<label>NOME:</label>
						</td>
						<td>
						<input type='text' name='login' id='login' size='10' tabindex=1/>
						</td>
						<td rowspan='2'>
						<input type='submit' id='submit' value='LOGAR' tabindex=3/>
						</td>
						</tr>
						<tr>
						<td>
						<label>SENHA:</label>
						</td>
						<td>
						<input type='password' name='senha' id='senha' size='10' tabindex=2/>
						</td>
						</tr>
						</table>
					</form>";
			?>
		</div>
	</body>
</html>