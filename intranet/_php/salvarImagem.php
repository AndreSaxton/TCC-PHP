<?php
	//salvar imagem no banco
	$filename ="";	
	if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
		require_once('../outros/salvarImagem.php');	//salva imagem na pasta

		$filename = $_REQUEST["fotoAtual"];		
		$busca = "INSERT INTO `imagem`(`nm_imagem`) VALUES ('$filename')";
        require_once('../conexao.php'); //chama o arquivo de conexão com o banco       
        $conexao->query($busca);     
	}
//	header('Location: salvarImagemDiv.php');

	echo"
		<script type='text/javascript'>
			window.location='../outros/salvarImagemDiv.php';
		</script>";
	

?>