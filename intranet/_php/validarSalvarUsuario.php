<?php	
	$nome =  $_GET["nNome"];
	$senha =  $_GET["nSenha"];	
	$departamento =  $_GET["nDepat"];
	$codigo =  $_GET["nCodigoUsuario"];
	$pessoa =  $_GET["nCodigoPessoa"];
		
	$novo = "window.location.href = 'funcaoSalvarUsuario.php?";
	$atualizar = "window.location.href = 'funcaoAtualizarUsuario.php?";
	$URLQuery = "nNome=".$nome."&nSenha=".$senha."&nDepat=".$departamento."&nCodigoPessoa=".$pessoa."&nCodigoUsuario=".$codigo."'";		
	
	require_once('../conexao.php'); //chama o arquivo de conexão com o banco
	$consulta = "SELECT cd_login FROM login WHERE cd_login = '".$codigo."'";
	
	$busca = $conexao->query($consulta);	
	
	$info = $busca->fetch_assoc();//banco nao traz caracteres especiais	
		
	if($info['cd_login']==$codigo && $codigo !=""){
		//se existir documento no banco de dados
		echo"
		<script type='text/javascript'>
			var resposta=confirm('Usuário já existe no Banco de Dados.\\nDeseja sobreescrever?');	
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