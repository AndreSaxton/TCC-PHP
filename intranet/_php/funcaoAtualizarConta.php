<?php

	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$codigo =  $_GET["nCodigoConta"];
	$pessoa =  $_GET["nCodigoPessoa"];
	$transacao =  $_GET["nTransacao"];
	$nome =  $_GET["nNome"];
	$valor =  $_GET["nValor"];
	$vencimento =  $_GET["nVencimento"];
	$pagamento =  $_GET["nPagamento"];	
	
	session_start();
	$cd_login = $_SESSION['cd_login'];
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Alteração','$dia',null, $cd_login)
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	//pega os dados no html
	//$resultado = $conexao->query("UPDATE conta SET cd_pessoa = '$pessoa', cd_movimentacao_conta = '$transacao', nm_conta ='$nome', vl_conta ='$valor', dt_vencimento_conta ='$vencimento', dt_pagamento_conta ='$pagamento' WHERE cd_conta = '$codigo'");//inserindo dados na tabela mercadoria"
	
	//header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoPessoa.php");
		
	$conexao->query("UPDATE conta SET nm_status_conta ='Inativo' WHERE cd_conta = '$codigo'");
		
	$resultado = $conexao->query("
	INSERT INTO conta(nm_conta,vl_conta,cd_movimentacao_conta,dt_vencimento_conta,dt_pagamento_conta,cd_pessoa, nm_status_conta, cd_cadastro)
	VALUES('$nome','$valor','$transacao','$vencimento','$pagamento','$pessoa', 'Ativo', '$ultimo_id')"); //inserindo dados na tabela conta"	
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
	
	$resultado = $conexao->query("SELECT * FROM `compra` WHERE cd_conta = '$codigo'");
	if(mysqli_num_rows($resultado)>0){
		//echo "tem compra";
		$conexao->query("UPDATE compra SET cd_conta ='$ultimo_id' WHERE cd_conta = '$codigo'");
	}
	else
		//echo "nao tem";

	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoFinanceira.php';
		</script>";
?>