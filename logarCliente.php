<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
if(!empty($_POST['login'])&&!empty($_POST['senha'])){
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	//echo $login;
	//echo $senha;
	//$login = "andre";
	//$senha = "teste";
	
	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
	
	//$consulta = "SELECT login.* FROM login JOIN pessoa on pessoa.cd_pessoa = login.cd_pessoa JOIN departamento ON departamento.cd_departamento = pessoa.cd_departamento WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo' AND departamento.nm_departamento = 'Cliente'";
	//$consulta = "CALL logarCliente('$login','$senha')";
	$consulta = "SELECT login.* FROM login	JOIN setor ON setor.cd_setor = login.cd_setor WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo' AND setor.nm_setor = 'Cliente'";

	//$consulta = "SELECT login.* FROM login JOIN setor ON setor.cd_setor = login.cd_setor WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo'";

	$verifica = $conexao->query($consulta);
	$rows = $verifica->num_rows;
	if($rows > 0){
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, ". $campoBusca." não encontrado";
			//echo $consulta;
        }
		else{
			$busca = $conexao->query($consulta);
			while($info = $busca->fetch_assoc()){					
				$_SESSION['login'] = $info['nm_login'];
				$_SESSION['senha'] = $info['nm_senha_login'];
				$_SESSION['cd_login'] = $info['cd_login'];
			}			
		}
		
		
		
		echo"
			<script type='text/javascript'>
				top.window.location='index.php';
			</script>";//*/
	}
	else{
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		unset ($_SESSION['cd_login']);
		echo"
			<script type='text/javascript'>
				alert('Login ou Senha incorretos');
				top.window.location='index.php';
			</script>";//*/			
	}
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['cd_login']);
	echo"
		<script type='text/javascript'>
			top.window.location='index.php';
		</script>";//*/		
	}
?>