<?php
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
	$codigo =  $_GET["nCodigo"];
	$documento =  $_GET["nDocumento"];	
	//pega os dados no html
	session_start();
	$cd_login = $_SESSION['cd_login'];
	
	$consulta = "SELECT * FROM pessoa WHERE cd_pessoa = $codigo";
	$busca = $conexao->query($consulta);
	while($info = $busca->fetch_assoc()){	
		//$info['cd_pessoa']
		$nome = $info['nm_pessoa'];
		$endereco = $info['nm_endereco_pessoa'];
		$cep = $info['cd_cep_pessoa'];
		$ddd = $info['cd_ddd_pessoa'];
		$telefone = $info['cd_telefone_pessoa'];
		$email = $info['nm_email_pessoa'];
		$tipo = $info['nm_tipo_pessoa'];
		$documento = $info['cd_documento_pessoa'];
		//$info['nm_status_pessoa']
		
	}
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Exclusão','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$resultado = $conexao->query("
	INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa, cd_cadastro) 
	VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','Inativo', '$ultimo_id')");
	
	$conexao->query("UPDATE pessoa SET nm_status_pessoa ='Inativo'WHERE cd_pessoa = '$codigo'");
	
	
	//$resultado = $conexao->query("DELETE FROM pessoa WHERE cd_documento_pessoa = ".$documento."");
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";
?>