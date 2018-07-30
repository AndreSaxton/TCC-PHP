<?php	
		$codigoUsuario = isset($_GET["nCodigo"]) ? $_GET["nCodigo"] : '';
		$pessoa = isset($_GET["nPessoa"]) ? $_GET["nPessoa"] : '';
		//$codigo = $_GET["nCodigo"];
		
		/*$consulta = "SELECT login.*, departamento.nm_departamento FROM login 
			JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa
			JOIN departamento ON pessoa.cd_departamento = departamento.cd_departamento WHERE cd_login = '".$codigoUsuario."'";
		*/
		$consulta = "SELECT login.*, setor.nm_setor FROM login 
			JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa
			JOIN setor ON login.cd_setor = setor.cd_setor WHERE cd_login ='".$codigoUsuario."'";

		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		
		if($codigoUsuario != ""){		
			while($info = $busca->fetch_assoc()){
				if($pessoa != "")
					$pessoa =  $pessoa;
				else
					$pessoa = $info["cd_pessoa"];
				$codigoUsuario = $info["cd_login"];
				$nome = $info['nm_login'];
				$senha = $info['nm_senha_login'];
				$departamento = $info['nm_setor'];				
			}
		}
		else{
			if($pessoa != "")
				$pessoa =  $pessoa;
			else
				$pessoa =  "";
			$codigoUsuario = "";
			$nome = "";
			$senha = "";
			$departamento = "";	
		}
?>	