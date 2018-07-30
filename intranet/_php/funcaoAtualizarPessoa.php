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
	VALUES('Alteração','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$conexao->query("UPDATE pessoa SET nm_status_pessoa ='Inativo' WHERE cd_documento_pessoa = '$documento'");
	
	$resultado = $conexao->query("
	INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa, cd_cadastro) 
	VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','Ativo', '$ultimo_id')");
	
	//$resultado = $conexao->query("UPDATE pessoa SET nm_pessoa ='$nome', nm_endereco_pessoa ='$endereco', cd_documento_pessoa ='$documento', nm_tipo_pessoa ='$tipo',nm_status_pessoa = '$status',cd_ddd_pessoa = '$ddd',cd_telefone_pessoa = '$telefone',nm_email_pessoa = '$email',cd_cep_pessoa = '$cep' WHERE cd_documento_pessoa = '$documento'"); //inserindo dados na tabela mercadoria"
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";
?>