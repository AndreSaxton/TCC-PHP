<?php
	$documento = $_GET["nDocumento"];	
	
	$documento=str_replace(",","",$documento);//tira parte da string
	$documento=str_replace(".","",$documento);
	$documento=str_replace("/","",$documento);
	$documento=str_replace("-","",$documento);
	
	
		require_once('../conexao.php'); 
		$consulta = "SELECT pessoa.cd_documento_pessoa
						FROM pessoa JOIN conta ON conta.cd_pessoa=pessoa.cd_pessoa 
						WHERE cd_documento_pessoa = ".$documento."";
		
		$busca = $conexao->query($consulta);	
		
		$info = $busca->fetch_assoc();
		
		if($info['cd_documento_pessoa']==$documento){// se existir a pessoa na tabela conta	
			echo"<script type='text/javascript'>
						alert('Não é possivel excluir uma Pessoa com Conta cadastrada!');
						window.history.back();
				</script>";		
		}
		else{ // se nao existir a pessoa na tabela conta
			echo"
			<script type='text/javascript'>
				var resposta=confirm('Deseja Deletar esta Pessoa do Banco de Dados?');	
				if (resposta){				
					";
					//se precionado confirm
					//delete no banco de dados
					
					$resultado = $conexao->query("DELETE FROM pessoa WHERE cd_documento_pessoa = ".$documento."");
	
					echo"
						<script type='text/javascript'>
							top.window.location='../gestaoPessoa.php';
						</script>					
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
?>