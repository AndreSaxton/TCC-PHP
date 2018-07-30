<?php
	$codigo = $_GET["nCodigo"];	
	
	$delete = "window.location.href = 'funcaoDeletarUsuario.php?";
	$URLQuery = "nCodigo=".$codigo."'";
	
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
		echo"
		<script type='text/javascript'>
			var resposta=confirm('Deseja Deletar esta Pessoa do Banco de Dados?');	
			if (resposta){				
				";
				//se precionado confirm
				//delete no banco de dados
				
				echo $delete.$URLQuery;
				
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
?>