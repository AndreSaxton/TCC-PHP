<?php

	require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
	$nome =  $_GET["nNome"];
	$endereco =  $_GET["nEndereco"];
	$cep =  $_GET["nCep"];
	$ddd =  $_GET["nDDD"];
	$telefone =  $_GET["nTelefone"];
	$email =  $_GET["nEmail"];
	$tipo =  $_GET["nTipoPessoa"];
	$documento =  $_GET["nDocumento"];
	//$status =  $_GET["nStatus"];
	//pega os dados no html
	
	session_start();
	$cd_login = $_SESSION['cd_login'];
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Novo','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$resultado = $conexao->query("
	INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa, cd_cadastro)
	VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','Ativo',(SELECT cd_cadastro FROM cadastro WHERE cadastro.cd_cadastro='$ultimo_id'))"); //inserindo dados na tabela mercadoria"	 
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";
?>