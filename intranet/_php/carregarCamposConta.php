<?php	
		$codigo = isset($_GET["nCodigo"]) ? $_GET["nCodigo"] : '';
		$pessoa = isset($_GET["nPessoa"]) ? $_GET["nPessoa"] : '';
		//if($pessoa!="")
			
		//$codigo = $_GET["nCodigo"];
		
		
		$consulta = "SELECT * FROM conta WHERE cd_conta = '".$codigo."'";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        
		$busca = $conexao->query($consulta);     
		
		if($codigo != ""){		
			while($info = $busca->fetch_assoc()){
				if($pessoa != "")
					$pessoa =  $pessoa;
				else
					$pessoa = $info["cd_pessoa"];
				$codigo = $info["cd_conta"];				
				$nome = $info['nm_conta'];								
				$transacao =  $info['cd_movimentacao_conta'];
				$valor =  $info['vl_conta'];
				$vencimento =  $info['dt_vencimento_conta'];
				$pagamento =  $info['dt_pagamento_conta'];
			}
		}
		else{
			if($pessoa != "")
				$pessoa =  $pessoa;
			else
				$pessoa =  "";
			$codigo =  "";
			$nome =  "";
			$transacao = "";
			$valor =  "";
			$vencimento = "";
			$pagamento =  "";
		}		
?>	