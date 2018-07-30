<?php  
	$logado = "";
	$sigla = "";
	$cd_login = "";
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['cd_login']) == true)){}
	else {
		require_once('confirmarLogin.php');
		$logado = $_SESSION['login'];
		$senha = $_SESSION['senha'];
		$cd_login = $_SESSION['cd_login'];
		//$sigla = "Admin";
	}	
//*/?>
	<script type="text/javascript">
		function deslogar(){
			window.location='logarCliente.php';
		}		
		
	</script>
<?php
			if($logado!="")
				{					
					echo"
					<div id='divLogin'>
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
				";
				echo "<p id='carrinho'><a href='carrinho.php'>Ir para Carrinho</a></p>
				</div>
				";
			}
			else
				echo "
					<div id='divLogin'>
					<form method='post' action='logarCliente.php' id='formlogin' name='formlogin'>
						<table><tr><td>
						<label>NOME:</label>
						</td><td>
						<input type='text' name='login' id='login' size='10' tabindex=1/>
						</td><td rowspan='2'>
						<input type='submit' id='submit' value='LOGAR' tabindex=3/>
						</td></tr><tr><td>
						<label>SENHA:</label>
						</td><td>
						<input type='password' name='senha' id='senha' size='10' tabindex=2/>
						</td></tr>						
						<tr><td colspan=3><center>
						<a href='cadastroCliente.php'>Realizar Cadastro</a>
						</center></td></tr>
						<tr><td colspan=3><center>
						<a href='recuperarCadastroCliente.php'>Recuperar senha</a>
						</center></td></tr>
						</table>
					</form>
					</div>";
			?>