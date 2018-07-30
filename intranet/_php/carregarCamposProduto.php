<?php	
		$codigo = isset($_GET["nCodigo"]) ? $_GET["nCodigo"] : '';
		//$codigo = $_GET["nCodigo"];
		
		$consulta = "SELECT produto.*, imagem.* FROM produto JOIN imagem ON imagem.cd_imagem = produto.cd_imagem WHERE cd_produto = '".$codigo."'";
		
		require_once('conexao.php');//chama o arquivo de conexão com o banco
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		
		if($codigo != ""){		
			while($info = $busca->fetch_assoc()){
				$codigo = $info["cd_produto"];
				$nome = $info['nm_produto'];
				$quantidade = $info['qt_estoque_produto'];
				$valor = $info['vl_produto'];
				$descricao = $info['ds_produto'];
				$imagem = $info['nm_imagem'];
			}
		}
		else{
			$codigo = "";
			$nome = "";
			$quantidade = "";
			$valor = "";
			$descricao = "";
			$imagem = "";
		}
?>	