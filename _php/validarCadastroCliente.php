<?php
$nm_login = $_REQUEST['account_username'];
$nm_senha_login = $_REQUEST['account_password'];
$nm_pessoa = $_REQUEST['billing_first_name'];
$cd_cep_pessoa = $_REQUEST['billing_postcode'];
$nm_endereco_pessoa = $_REQUEST['billing_address_1'];
$cd_ddd_pessoa = $_REQUEST['billing_ddd'];
$cd_telefone_pessoa = $_REQUEST['billing_phone'];
$nm_email_pessoa = $_REQUEST['billing_email'];
//$nm_tipo_pessoa = $_REQUEST['nTipoPessoa'];
$cd_documento_pessoa = $_REQUEST['billing_document'];

$cd_cep_pessoa=str_replace("-","",$cd_cep_pessoa);
$cd_telefone_pessoa=str_replace("-","",$cd_telefone_pessoa);

$cd_documento_pessoa=str_replace(",","",$cd_documento_pessoa);//tira parte da string
$cd_documento_pessoa=str_replace(".","",$cd_documento_pessoa);
$cd_documento_pessoa=str_replace("/","",$cd_documento_pessoa);
$cd_documento_pessoa=str_replace("-","",$cd_documento_pessoa);

require_once('conexao.php'); //chama o arquivo de conexão com o banco

$consulta = "SELECT login.* FROM login WHERE nm_login = '$nm_login'";
	$verifica = $conexao->query($consulta);
	$rows = $verifica->num_rows;
	if($rows > 0){
        //echo "Login já cadastrado";
        echo "<script>alert('Login já cadastrado')</script>";
    }
    if($rows == 0){
		//echo "Login Disponivel";

		$consulta = "SELECT pessoa.* FROM pessoa WHERE cd_documento_pessoa = '$cd_documento_pessoa'";
		$verifica = $conexao->query($consulta);
		$rows = $verifica->num_rows;
		if($rows > 0){
	        //echo "Documento já cadastrado";
	        echo "<script>alert('Documento já cadastrado')</script>";
	    }
	    if($rows == 0){
			//echo "<br>Documento nao cadastrado\nVá para cadastro";
			require_once('_php/funcaoSalvarCliente.php');
		}
	}
	

	
?>