<?php	
		$codigo = isset($_GET["nCodigo"]) ? $_GET["nCodigo"] : '';
		//$codigo = $_GET["nCodigo"];
		
		$consulta = "SELECT * FROM pessoa WHERE cd_pessoa = '".$codigo."'";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		
		if($codigo != ""){		
			while($info = $busca->fetch_assoc()){
				$codigo = $info["cd_pessoa"];
				$nome = $info['nm_pessoa'];
				$endereco = $info['nm_endereco_pessoa'];
				$cep = $info['cd_cep_pessoa'];
				$ddd = $info['cd_ddd_pessoa'];
				$telefone = $info['cd_telefone_pessoa'];
				$email = $info['nm_email_pessoa'];
				$tipo = $info['nm_tipo_pessoa'];
				//$documento = $info['cd_documento_pessoa'];
				$status = $info['nm_status_pessoa'];
				
				if($info['nm_tipo_pessoa']=="Juridica"){
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 2, 0);//usar para incluir ponto
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 6, 0);
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 10, 0);
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "-", 15, 0);
					
					$pDocumento = "CNPJ";
				}
				else{
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 3, 0);//usar para incluir ponto
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 7, 0);
					$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 11, 0);				
					$pDocumento = "CPF";
				}
				$telefone = substr_replace($telefone, "-", 4, 0);
				$cep = substr_replace($cep, "-", 5, 0);
				$documento = $info['cd_documento_pessoa'];
			}
		}
		else{
			$codigo = "";
			$nome = "";
			$endereco = "";
			$cep = "";
			$ddd = "";
			$telefone = "";
			$email = "";
			$tipo = "";
			$documento = "";
			$status = "";
			$pDocumento = "CPF";
		}
?>	