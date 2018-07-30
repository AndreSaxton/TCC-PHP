<?php
//session_start();
if(empty($_SESSION['login'])&&empty($_SESSION['senha'])){	
	//echo "nao logado";
	echo "<script>alert('Favor realizar Login!');</script>";
	header("location: index.php");
}
else{
	//echo "logado";
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];

	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
	
	//$consulta = "SELECT login.* FROM login JOIN pessoa on pessoa.cd_pessoa = login.cd_pessoa JOIN departamento ON departamento.cd_departamento = pessoa.cd_departamento WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo' AND departamento.nm_departamento = 'Cliente'";
	$consulta = "SELECT login.* FROM login	JOIN setor ON setor.cd_setor = login.cd_setor WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo' AND setor.nm_setor = 'Cliente'";

	$verifica = $conexao->query($consulta);
	$rows = $verifica->num_rows;
	if($rows > 0){/*
		//echo "tem 1 ou mais registros";
		$busca = $conexao->query($consulta);
		while($info = $busca->fetch_assoc()){
			echo $info['nm_login'];
			echo $info['nm_senha_login'];
		}*/
	}
	else{
		//echo "nao encontrado";
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);		
		unset ($_SESSION['cd_login']);
		header("location: index.php");
	}
}
?>