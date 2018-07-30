<?php
	
	$documento = $_GET["nDocumento"];
	$nome =  $_GET["nNome"];
	$endereco =  $_GET["nEndereco"];
	$cep =  $_GET["nCep"];
	$ddd =  $_GET["nDDD"];
	$telefone =  $_GET["nTelefone"];
	$email =  $_GET["nEmail"];
	$tipo =  $_GET["nTipoPessoa"];	
	//$status =  $_GET["nStatus"];
	
	//$documentoLimpo1 =  $_GET["nDocumento"];
	//$newstr = substr_replace($oldstr, $str_to_insert, $pos, 0);//usar para incluir ponto
	$documento=str_replace(",","",$documento);//tira parte da string
	$documento=str_replace(".","",$documento);
	$documento=str_replace("/","",$documento);
	$documento=str_replace("-","",$documento);
	$cep=str_replace("-","",$cep);
	$telefone=str_replace("-","",$telefone);
	//*/
	$novo = "window.location.href = 'funcaoSalvarPessoa.php?";
	$atualizar = "window.location.href = 'funcaoAtualizarPessoa.php?";
	$URLQuery = "nNome=".$nome."&nCep=".$cep."&nEndereco=".$endereco."&nDDD=".$ddd.
	"&nTelefone=".$telefone."&nEmail=".$email."&nTipoPessoa=".$tipo."&nDocumento=".$documento."'";
	//&nStatus=".$status."'";		
	
	/*echo "<script type='text/javascript'>
	
	document.write('$documento');
	</script>";*/
	//$documento = 4;
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT cd_documento_pessoa FROM pessoa WHERE cd_documento_pessoa = ".$documento."";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais
	//echo $info['cd_documento_pessoa'];
		/*$documentoLimpo2=str_replace(",","",$documentoLimpo2);//tira parte da string
		$documentoLimpo2=str_replace("/","",$documentoLimpo2);
		$documentoLimpo2=str_replace("-","",$documentoLimpo2);
		*/
	if($info['cd_documento_pessoa']==$documento){
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