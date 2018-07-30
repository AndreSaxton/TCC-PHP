<?php	
		require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
		$pessoa =  $_GET["nCodigoPessoa"];
		$transacao =  $_GET["nTransacao"];
		$nome =  $_GET["nNome"];
		$valor =  $_GET["nValor"];
		$vencimento =  $_GET["nVencimento"];
		$pagamento =  $_GET["nPagamento"];				
		//$codigo = 2;
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
	INSERT INTO conta(nm_conta,vl_conta,cd_movimentacao_conta,dt_vencimento_conta,dt_pagamento_conta,cd_pessoa, nm_status_conta, cd_cadastro)
	VALUES('$nome','$valor','$transacao','$vencimento','$pagamento','$pessoa', 'Ativo', '$ultimo_id')"); //inserindo dados na tabela conta"		
	
		//header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoFinanceira.php");
		//exit;*/		
		echo"
		<script type='text/javascript'>
			top.window.location='../gestaoFinanceira.php';
		</script>";
?>	