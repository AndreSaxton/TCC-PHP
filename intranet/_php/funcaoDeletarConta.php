<?php
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
	echo $codigo;
	$codigo =  $_GET["nCodigoConta"];	
	//pega os dados no html
	
	//$resultado = $conexao->query("DELETE FROM conta WHERE cd_conta = ".$codigo."");
	
	$consulta = "SELECT * FROM conta WHERE cd_conta = $codigo";
	$busca = $conexao->query($consulta);
	while($info = $busca->fetch_assoc()){	
		//$info['cd_pessoa']
		$nome = $info['nm_conta'];
		$valor = $info['vl_conta'];
		$transacao = $info['cd_movimentacao_conta'];
		$vencimento = $info['dt_vencimento_conta'];
		$pagamento = $info['dt_pagamento_conta'];
		$pessoa = $info['cd_pessoa'];		
	}
	
	session_start();
	$cd_login = $_SESSION['cd_login'];
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Exclusão','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
		
	$resultado = $conexao->query("
	INSERT INTO conta(nm_conta,vl_conta,cd_movimentacao_conta,dt_vencimento_conta,dt_pagamento_conta,cd_pessoa, nm_status_conta, cd_cadastro)
	VALUES('$nome','$valor','$transacao','$vencimento','$pagamento','$pessoa', 'Inativo', '$ultimo_id')"); //inserindo dados na tabela conta"	
		
	$conexao->query("UPDATE conta SET nm_status_conta ='Inativo'WHERE cd_conta = '$codigo'");
	
	//header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoPessoa.php");
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoFinanceira.php';
		</script>";
?>