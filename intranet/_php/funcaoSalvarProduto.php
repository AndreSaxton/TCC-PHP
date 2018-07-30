<?php
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	
	session_start();
	$cd_login = $_SESSION['cd_login'];
	
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Novo','$dia',null, (SELECT login.cd_login FROM login WHERE cd_login = $cd_login))
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento


	require_once('../conexao.php');//chama o arquivo de conexão com o banco			
	$nm_produto = $_REQUEST['nNome'];
	$qt_produto = $_REQUEST['nQuant'];
	$vl_produto = $_REQUEST['nValor'];
	$ds_produto = $_REQUEST['DSproduto'];
	$im_produto = $_REQUEST['im_produto'];
		
	$resultado = $conexao->query("
	INSERT INTO `produto`(`vl_produto`, `nm_produto`, `ds_produto`, `qt_estoque_produto`, `nm_status_produto`, cd_imagem, cd_cadastro) 
	VALUES ($vl_produto, '$nm_produto','$ds_produto', $qt_produto,'Ativo', (SELECT imagem.cd_imagem FROM imagem WHERE cd_imagem ='$im_produto'), (SELECT cadastro.cd_cadastro FROM cadastro WHERE cd_cadastro = '$ultimo_id'))
	"); //inserindo dados na tabela produto"
	
	echo"
		<script type='text/javascript'>
			alert('Produto adicionado!');
			top.window.location='../gestaoProduto.php';
		</script>";
		echo $im_produto;
?>