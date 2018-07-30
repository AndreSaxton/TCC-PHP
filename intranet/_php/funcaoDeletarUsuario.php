<?php
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
	
	$codigo =  $_GET["nCodigo"];
	session_start();
	$cd_login = $_SESSION['cd_login'];

	//$codigo =  $_GET["nCodigoUsuario"];	
	//pega os dados no html
	
	$consulta = "SELECT * FROM login WHERE cd_login = $codigo";
	$busca = $conexao->query($consulta);
	while($info = $busca->fetch_assoc()){	
		$nome = $info['nm_login'];
		$senha = $info['nm_senha_login'];
		$pessoa = $info['cd_pessoa'];
	}
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Exclusão','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$conexao->query("
	INSERT INTO login(nm_login, nm_senha_login, cd_pessoa, cd_cadastro, nm_status_login) 
	VALUES('$nome','$senha','$pessoa', $ultimo_id, 'Inativo')
	");
	
	$conexao->query("UPDATE login SET nm_status_login ='Inativo'WHERE cd_login = '$codigo'");
	
	//$resultado = $conexao->query("DELETE FROM usuario WHERE cd_usuario = ".$codigo."");
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoUsuario.php';
		</script>";
?>