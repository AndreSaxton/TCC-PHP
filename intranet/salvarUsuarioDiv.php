<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarPessoaDiv.css">
		
	<script language="javascript" src="_javascript\salvarUsuarioDiv.js">	
	</script>
	
</head>
<body>	
<?php	
		require_once('_php/carregarCamposUsuario.php');
?>	
		<form method="GET" name="cadastroPessoa" action="_php/validarSalvarUsuario.php" id="formCadastro">
			<p>Código do Usuário:<input type="number" name="nCodigoUsuario" id="iCodigoUsuario" readonly="readonly" value="<?php echo $codigoUsuario?>"/></p>
			<p>Código da Pessoa:<input type="number" name="nCodigoPessoa" id="iCodigoPessoa" readonly="readonly" value="<?php echo $pessoa?>"/></p>
			<p>Nome:<input type="text" name="nNome" id="iNome" required value="<?php echo $nome?>"/></p>
			<p>Senha:<input type="password" name="nSenha" id="iSenha" required value="<?php echo $senha?>"/></p>		
			
			<p>Departamento:
				<select name="nDepat" id="iDepat">
					<option value="Administrativo" <?php if($departamento=='Administrativo') echo 'selected';?>>Administrativo</option>
					<option value="Comercial" <?php if($departamento=='Comercial') echo 'selected';?>>Comercial</option>
					<option value="Financeiro" <?php if($departamento=='Financeiro') echo 'selected';?>>Financeiro</option>
				</select>
			</p>			
			<input id="btn" type="submit" value="Validar"/>		
		</form>			
		<a id="del" onclick="validarDeletarUsuario();"><button>Deletar</button></a>
		<a id="btn" onclick="top.window.history.back();"><button>Cancelar</button></a>	
</body>
</html>