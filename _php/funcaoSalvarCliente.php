<?php	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Novo','$dia',null, (select cd_login from login	WHERE login.cd_login = 1))
	");
	$nm_tipo_pessoa = "Fisica";
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$resultado = $conexao->query("
	INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa, cd_cadastro) 
	VALUES('$nm_pessoa','$nm_endereco_pessoa','$cd_ddd_pessoa','$cd_telefone_pessoa','$nm_email_pessoa','$cd_cep_pessoa','$nm_tipo_pessoa', '$cd_documento_pessoa','Ativo', (SELECT cd_cadastro FROM cadastro WHERE cadastro.cd_cadastro =  '$ultimo_id'))");

	$ultimo_id2 = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	$resultado = $conexao->query("
		INSERT INTO login(nm_login, nm_senha_login, nm_status_login, cd_setor, cd_pessoa, cd_cadastro) 
			VALUES('". $nm_login . "','" . $nm_senha_login . "','Ativo', 
			(SELECT cd_setor FROM setor WHERE nm_setor= 'Cliente'),
			(SELECT cd_pessoa FROM pessoa WHERE cd_pessoa= " . $ultimo_id2 . "),
			(SELECT cd_cadastro FROM cadastro WHERE cd_cadastro =" . $ultimo_id . "))
		");
	require_once("email/enviar.php");
?>