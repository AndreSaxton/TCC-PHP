<?php
$nm_login = $_REQUEST['account_username'];
$nm_senha_login = $_REQUEST['account_password'];
$nm_pessoa = $_REQUEST['billing_first_name'];
$cd_cep_pessoa = $_REQUEST['billing_postcode'];
$nm_endereco_pessoa = $_REQUEST['billing_address_1'];
//$cd_ddd_pessoa = $_REQUEST['nDDD'];
$cd_telefone_pessoa = $_REQUEST['billing_phone'];
$nm_email_pessoa = $_REQUEST['billing_email'];
//$nm_tipo_pessoa = $_REQUEST['nTipoPessoa'];
$nm_tipo_pessoa = "Fisica";
$cd_documento_pessoa = $_REQUEST['billing_document'];

$cd_cep_pessoa=str_replace("-","",$cd_cep_pessoa);
$cd_telefone_pessoa=str_replace("-","",$cd_telefone_pessoa);

$cd_documento_pessoa=str_replace(",","",$cd_documento_pessoa);//tira parte da string
$cd_documento_pessoa=str_replace(".","",$cd_documento_pessoa);
$cd_documento_pessoa=str_replace("/","",$cd_documento_pessoa);
$cd_documento_pessoa=str_replace("-","",$cd_documento_pessoa);

require_once('conexao.php'); //chama o arquivo de conexão com o banco

	$cd_login = $_SESSION['cd_login'];
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Alteração','$dia',null, $cd_login)");

	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento

	$conexao->query("UPDATE pessoa SET nm_status_pessoa ='Inativo' WHERE cd_documento_pessoa = '$documento'");	
	$conexao->query("
	INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa, cd_cadastro) 
	VALUES('$nm_pessoa','$nm_endereco_pessoa','$cd_ddd_pessoa','$cd_telefone_pessoa','$nm_email_pessoa','$cd_cep_pessoa','$nm_tipo_pessoa', '$cd_documento_pessoa','Ativo', '$ultimo_id')");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	$conexao->query("UPDATE login SET nm_senha_login ='$nm_senha_login', nm_login ='$nm_login', cd_pessoa = '$ultimo_id' WHERE cd_login = '$cd_login'");

	echo"
		<script type='text/javascript'>
			alert('Cadastro editado com sucesso.');
			//alert('$nm_pessoa');
			top.window.location='cadastro.php';
		</script>";
?>