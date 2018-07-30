<?php
	//$codigo = isset($_GET["nCodigoConta"]) ? $_GET["nCodigoConta"] : '';
	$codigo =  $_GET["nCodigoConta"];
	$pessoa =  $_GET["nCodigoPessoa"];
	$transacao =  $_GET["nTransacao"];
	if($transacao=="Gasto")
		$transacao=0;
	else
		$transacao=1;
	$nome =  $_GET["nNome"];
	$valor =  $_GET["nValor"];
	$vencimento =  $_GET["nVencimento"];
	$pagamento =  $_GET["nPagamento"];	
	
	$novo = "window.location.href = 'funcaoSalvarConta.php?";
	$atualizar = "window.location.href = 'funcaoAtualizarConta.php?";
	$URLQuery = "nCodigoConta=".$codigo."&nCodigoPessoa=".$pessoa."&nTransacao=".$transacao."&nNome=".$nome."&nValor=".$valor.
	"&nVencimento=".$vencimento."&nPagamento=".$pagamento."'";		
	
	if($codigo!=""){
		require_once('../conexao.php'); //chama o arquivo de conexão com o banco			
		$consulta = "SELECT cd_conta FROM conta WHERE cd_conta = ".$codigo."";	
		$busca = $conexao->query($consulta);			
		$info = $busca->fetch_assoc();//banco nao traz caracteres especiais						
		if($info['cd_conta']==$codigo){
		//if($codigo==$codigo){
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
	}
	else{
		echo"<script>";
		//se nao existir no banco de dados
		echo $novo.$URLQuery;//insert novo		
		echo"</script>";
	};	
?>