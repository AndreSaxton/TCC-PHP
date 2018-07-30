<?php
	//$codigo = isset($_GET["nCodigoConta"]) ? $_GET["nCodigoConta"] : '';
	$codigo =  $_GET["nCodigoConta"];
		
	$deletar = "window.location.href = 'funcaoDeletarConta.php?";	
	$URLQuery = "nCodigoConta=".$codigo."'";
	
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT cd_conta, dt_pagamento_conta FROM conta WHERE cd_conta = ".$codigo."";	
	$busca = $conexao->query($consulta);		
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais	
	
	if($info['cd_conta']==$codigo){//se existir no banco
		if($info['dt_pagamento_conta']=="0000-00-00"){//se nao foi paga	
			echo"
			<script type='text/javascript'>
					var resposta=confirm('Deseja deletar do Banco de Dados?');	
					if(resposta){";
					//se precionado confirm
					//deletar no banco de dados
					//echo $info['cd_conta'];// teste
					
					echo $deletar.$URLQuery;								
					
					echo"				
					
				}
				else{				
					window.history.back();				
					//cancela				
				}
			</script>";		
		}
		else{// se foi pago		
			echo"<script type='text/javascript'>
					alert('Não é possivel excluir uma Conta que já foi paga!');
					window.history.back();
				</script>";		
		}			
	}
?>