<?php	
	$cd_produto =  $_GET["nCodigo"];
			
	require_once('../conexao.php');
	
	session_start();
	$cd_login = $_SESSION['cd_login'];
		
	date_default_timezone_set('America/Sao_Paulo');
	$dia = date('Y-m-d');
	$conexao->query("
	INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
	VALUES('Exclusão','$dia',null, (SELECT login.cd_login FROM login WHERE cd_login = $cd_login))
	");
	$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento

	require_once('../conexao.php');

	$consulta = "SELECT * FROM produto WHERE cd_produto = $cd_produto";
	$busca = $conexao->query($consulta);
	while($info = $busca->fetch_assoc()){			
		$cd_produto = $info["cd_produto"];
		$nm_produto = $info['nm_produto'];
		$qt_produto = $info['qt_estoque_produto'];
		$vl_produto = $info['vl_produto'];
		$ds_produto = $info['ds_produto'];
		$im_produto = $info['im_produto'];	
	}
	
	$resultado = $conexao->query("	
	INSERT INTO `produto`(`vl_produto`, `nm_produto`, `ds_produto`, `qt_estoque_produto`, `nm_status_produto`, im_produto, cd_cadastro) 
	VALUES ($vl_produto, '$nm_produto','$ds_produto', $qt_produto,'Inativo', (SELECT imagem.cd_imagem FROM imagem WHERE cd_imagem = '$im_produto'),(SELECT cadastro.cd_cadastro FROM cadastro WHERE cd_cadastro =  '$ultimo_id'))"
	);

	$conexao->query("UPDATE produto SET nm_status_produto ='Inativo' WHERE cd_produto = '$cd_produto'");
		
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoProduto.php';
		</script>";
?>