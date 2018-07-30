<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
if(!empty($_POST['login'])&&!empty($_POST['senha'])){
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	//$login = "andre";
	//$senha = "teste";
	
	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
	
	/*$consulta = "SELECT login.*, pessoa.nm_pessoa, departamento.nm_departamento 
						FROM login JOIN pessoa, departamento
						WHERE `nm_login` = '$login' AND `nm_senha_login`= '$senha'
						AND pessoa.cd_pessoa = login.cd_pessoa
						AND pessoa.cd_departamento = departamento.cd_departamento
						AND nm_status_login = 'Ativo'
						AND nm_departamento != 'Cliente'
	";*/
	$consulta = "SELECT login.*, setor.nm_setor FROM login 
	JOIN setor ON setor.cd_setor= login.cd_setor 
	WHERE nm_login = '$login' 
	AND nm_senha_login = '$senha'
	AND nm_status_login = 'Ativo'
	AND nm_setor != 'Cliente'";
	
	$verifica = $conexao->query($consulta);
	$rows = $verifica->num_rows;
	if($rows > 0){ //se houver registro		
        if($rows == 0){ //se nao houver registro
            echo "falha ao buscar, ". $campoBusca." não encontrado";
			//echo $consulta;
        }
		else{//se houver registro
			$busca = $conexao->query($consulta);     		
			while($info = $busca->fetch_assoc()){					
				$_SESSION['login'] = $info['nm_login'];;
				$_SESSION['senha'] = $info['nm_senha_login'];
				$_SESSION['sigla'] = $info['nm_setor'];
				$cd_login = $info['cd_login'];
				$_SESSION['cd_login'] = $info['cd_login'];
			}
			
			date_default_timezone_set('America/Sao_Paulo');
			$dia = date('Y-m-d');
			$hora = date('H:i:s');
			$conexao->query("INSERT INTO acesso (dt_acesso, hr_acesso, cd_login) VALUES('$dia','$hora','$cd_login')");
		}
		echo"
			<script type='text/javascript'>
				top.window.location='index.php';
			</script>";//*/
	}
	else{
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		unset ($_SESSION['sigla']);
		unset ($_SESSION['cd_login']);
		echo"
			<script type='text/javascript'>
				top.window.location='index.php';
			</script>";//*/
	}
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['sigla']);
	unset ($_SESSION['cd_login']);
	echo"
		<script type='text/javascript'>
			top.window.location='index.php';
		</script>";//*/
	}
?>