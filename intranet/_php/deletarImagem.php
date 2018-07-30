<?php
	$cd_imagem = $_REQUEST["nCodigo"];

	$busca = "UPDATE produto SET cd_imagem = 1 WHERE produto.cd_imagem = $cd_imagem";
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco       
    $conexao->query($busca);     

	$busca = "DELETE FROM imagem WHERE cd_imagem = $cd_imagem";
	
    $conexao->query($busca);     


	echo"
		<script type='text/javascript'>
			window.location='../outros/salvarImagemDiv.php';
		</script>";
	

?>