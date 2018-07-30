<?php
	$documento = $_GET["nDocumento"];	
	$codigo = $_GET["nCodigo"];	
	
	$documento=str_replace(",","",$documento);//tira parte da string
	$documento=str_replace(".","",$documento);
	$documento=str_replace("/","",$documento);
	$documento=str_replace("-","",$documento);
	
	$delete = "window.location.href = 'funcaoDeletarPessoa.php?";
	$URLQuery = "nDocumento=".$documento."&nCodigo=".$codigo."'";
	
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT pessoa.cd_documento_pessoa
					FROM pessoa JOIN conta ON conta.cd_pessoa=pessoa.cd_pessoa 
					WHERE cd_documento_pessoa = ".$documento."";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais	
	
	if($info['cd_documento_pessoa']==$documento){
		
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
	}
	//*/
?>