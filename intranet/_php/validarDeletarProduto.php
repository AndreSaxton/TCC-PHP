<?php
	$codigo = $_GET["nCodigo"];	

	$delete = "window.location.href = 'funcaoDeletarProduto.php?";
	$URLQuery = "nCodigo=".$codigo."'";
	
	require_once('../conexao.php');//chama o arquivo de conexão com o banco

	$consulta = "SELECT produto.cd_produto
					FROM produto WHERE cd_produto = ".$codigo."";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais	
	
	echo"
		<script type='text/javascript'>
			var resposta=confirm('Deseja retirar este Produto do Banco de Dados?');	
			if (resposta){				
				";
				//se precionado confirm
				//delete no banco de dados
				
				echo $delete.$URLQuery;
				
				//verificar se tem contas cadastradas desta pessoa
				
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
	
	//*/
?>