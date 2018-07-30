<?php
	function novaPessoa(){
	$resultado = $conexao->query("INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa) VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','$status')"); 
	
	echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";
	return null;
	}
	
	function atualizarPessoa(){
		$resultado = $conexao->query("UPDATE pessoa SET nm_pessoa ='$nome', nm_endereco_pessoa ='$endereco', cd_documento_pessoa ='$documento', nm_tipo_pessoa ='$tipo',nm_status_pessoa = '$status',cd_ddd_pessoa = '$ddd',cd_telefone_pessoa = '$telefone',nm_email_pessoa = '$email',cd_cep_pessoa = '$cep' WHERE cd_documento_pessoa = '$documento'");
	
		echo"
		<script type='text/javascript'>
			top.window.location='../gestaoPessoa.php';
		</script>";			
		return null;
	}
?>