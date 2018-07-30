<?php
	$documento = $_GET["nDocumento"];
	$nome =  $_GET["nNome"];
	$endereco =  $_GET["nEndereco"];
	$cep =  $_GET["nCep"];
	$ddd =  $_GET["nDDD"];
	$telefone =  $_GET["nTelefone"];
	$email =  $_GET["nEmail"];
	$tipo =  $_GET["nTipoPessoa"];	
	$status =  $_GET["nStatus"];
	
	$documento=str_replace(",","",$documento);//tira parte da string
	$documento=str_replace(".","",$documento);
	$documento=str_replace("/","",$documento);
	$documento=str_replace("-","",$documento);

	//$novo = "window.location.href = 'funcaoSalvarPessoa.php?";
	//$atualizar = "window.location.href = 'funcaoAtualizarPessoa.php?";
	//$URLQuery = "nNome=".$nome."&nCep=".$cep."&nEndereco=".$endereco."&nDDD=".$ddd.
	//"&nTelefone=".$telefone."&nEmail=".$email."&nTipoPessoa=".$tipo."&nDocumento=".$documento."&nStatus=".$status."'";		
	
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT cd_documento_pessoa FROM pessoa WHERE cd_documento_pessoa = ".$documento."";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais
	
	if($info['cd_documento_pessoa']==$documento){//se existir documento no banco de dados
		echo"
		<script type='text/javascript'>
			var resposta=confirm('Documento já existe no Banco de Dados.\\nDeseja sobreescrever?');	
			if (resposta){";
				//se precionado confirm
				// update no banco de dados
				require_once("funcaoCadastro.php");
				atualizarPessoa();
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
		//se nao existir no banco de dados
		//insert novo
		$resultado = $conexao->query("INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa) VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','$status')"); //inserindo dados na tabela mercadoria"
	
		echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";
	}
?>