<?php
//session_start();
if(empty($_SESSION['login'])&&empty($_SESSION['senha'])){	
	//echo "nao logado";
	//echo "<script>alert('Favor realizar Login!');</script>";
	echo "<script type='text/javascript'>
			//top.window.location='index.php';
		</script>";
}
else{
	//echo "logado";
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];

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
	if($rows > 0){}
	else{
		//echo "nao encontrado";
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);		
		unset ($_SESSION['cd_login']);
		echo "<script type='text/javascript'>
			top.window.location='index.php';
		</script>";
	}
}
?>