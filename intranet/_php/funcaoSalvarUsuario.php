<?php

	require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
	echo $nome =  $_GET["nNome"];
	echo $senha =  $_GET["nSenha"];	
	echo $departamento =  $_GET["nDepat"];
	echo $pessoa =  $_GET["nCodigoPessoa"];
	session_start();
	echo $cd_login = $_SESSION['cd_login'];
	
	//$pessoa =  2;
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
			
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Novo','$dia',null, $cd_login)
	");
	
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	//pega os dados no html
	/*$resultado = $conexao->query("
	INSERT INTO login(nm_login, nm_senha_login, cd_pessoa, cd_cadastro, nm_status_login) 
	VALUES('$nome','$senha','$pessoa', $ultimo_id, 'Ativo')
	"); //inserindo dados na tabela mercadoria"
	*/
	$resultado = $conexao->query("
		INSERT INTO login(nm_login, nm_senha_login, nm_status_login, cd_setor, cd_pessoa, cd_cadastro) 
			VALUES('". $nome . "','" . $senha . "','Ativo', 
			(SELECT cd_setor FROM setor WHERE nm_setor= '" . $departamento . "'),
			(SELECT cd_pessoa FROM pessoa WHERE cd_pessoa= " . $pessoa . "),
			(SELECT cd_cadastro FROM cadastro WHERE cd_cadastro =" . $ultimo_id . "))
		");	

	//$resultado = $conexao->query("UPDATE pessoa SET cd_departamento = '$departamento' WHERE cd_pessoa = '$pessoa'");
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoUsuario.php';
		</script>";
		//echo $pessoa;
?>