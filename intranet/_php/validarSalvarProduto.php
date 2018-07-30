<?php
	//salvar imagem no banco
	//$filename ="";	
	/*if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
	require_once('../outros/salvarImagem.php');	//salva imagem na pasta
	}
	else{
		$filename = $_REQUEST["fotoAtual"];		
	}*/


	$cd_produto =  $_REQUEST["nCodigoProduto"];
	$nm_produto = $_REQUEST['nNome'];
	$qt_produto = $_REQUEST['nQuant'];
	$vl_produto = $_REQUEST['nValor'];
	$ds_produto = $_REQUEST['DSproduto'];
	$filename = $_REQUEST["cdImagem"];		

	$novo = "window.location.href = 'funcaoSalvarProduto.php?";
	$atualizar = "window.location.href = 'funcaoAtualizarProduto.php?";
	$URLQuery = "nNome=".$nm_produto."&nQuant=".$qt_produto."&nValor=".$vl_produto."&DSproduto=".$ds_produto."&im_produto=".$filename."&nCodigo=".$cd_produto."'";	
	
	echo "<script type='text/javascript'>
	
	document.write('$nm_produto');
	</script>";
	//$documento = 4;
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT nm_produto FROM produto WHERE nm_produto = '".$nm_produto."' AND nm_status_produto = 'Ativo'";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais
	echo $info['nm_produto'] . " linha 23";
		
	if($info['nm_produto']==$nm_produto){
		//se existir documento no banco de dados
		echo"
		<script type='text/javascript'>
			var resposta=confirm('Documento já existe no Banco de Dados.\\nDeseja sobreescrever?');	
			if (resposta){";
				//se precionado confirm
				echo $atualizar.$URLQuery;// update no banco de dados
				echo"
			}
			else{				
				window.history.back();
				";
				//cancela
				echo"
			}";
		echo"
		</script>";
	}
	else{
		echo"<script>";
		//se nao existir no banco de dados		
		echo $novo.$URLQuery;//insert novo		
		echo"</script>";
	};
?>