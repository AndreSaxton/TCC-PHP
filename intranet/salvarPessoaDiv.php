<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarPessoaDiv.css">
		
	<script language="javascript" src="_javascript\salvarPessoaDiv.js"></script>
	<script type="text/javascript" src="myinputmask-master\src\InputMask.js"></script>
	
</head>
<body>	
<?php	
		require_once('_php/carregarCamposPessoa.php');
?>	
		<form method="GET" name="cadastroPessoa" action="_php/validarSalvarPessoa.php" id="formCadastro">
			<table>
			<tr><td><p>Código:</p></td><td><input type="number" name="nCodigoPessoa" id="iCodigo" readonly="readonly" value="<?php echo $codigo?>"/></td></tr>
			
			<tr><td><p>Nome:</p></td><td><input type="text" name="nNome" id="iNome" required value="<?php echo $nome?>"/></td></tr>
			
			<tr><td><p>CEP:</p></td><td><input type="text" name="nCep" id="iCep" required value="<?php echo $cep?>" size="7" placeholder="_____-___"/></td></tr>
			
			<tr><td><p>Endereço:</p></td><td><input type="text" name="nEndereco" id="iEndereco" required value="<?php echo $endereco?>"/></td></tr>
			
			<tr><td>
				<p>Telefone:</p></td><td><input type="text" name="nDDD" id="iDDD" required value="<?php echo $ddd?>" size="1"/>
				<input type="text" name="nTelefone" id="iTelefone" required value="<?php echo $telefone?>" size="7"  placeholder="____-____"/>
			</td></tr>
			
			
			<tr><td><p>Email:</p></td><td><input type="mail" name="nEmail" id="iEmail" required value="<?php echo $email?>"/></td></tr>
			
			<tr><td><p>Pessoa:</p></td><td>
				<select name="nTipoPessoa" id="iTipoPessoa" onchange="mudarDocumento(this.value);">
					<option value="Fisica" <?php if($tipo=='Fisica') echo 'selected';?>>Fisica</option>
					<option value="Juridica" <?php if($tipo=='Juridica') echo 'selected';?>>Juridica</option>
				</select>
			</td></tr>
					
			<tr><td><p id="pDocumento"><?php echo $pDocumento?>:</p></td><td><input type="text" name="nDocumento" id="iDocumento" required value="<?php echo $documento?>" size="15" placeholder="___.___.___/__"/></td></tr>
			
			<input id="btn" type="submit" value="Validar"/>
			</table>
		</form>			
		<a id="del" onclick="validarDeletarPessoa();"><button>Deletar</button></a>
		<a id="btn" onclick="top.window.history.back();"><button>Cancelar</button></a>
	<script type="text/javascript">	
        new InputMask({
            inputs : {
                '#iDocumento' : {
                    mask : '___.___.___/__',
                    strict : true,
                    pattern : '[0-9]'
                },
				'#iDDD' : {
                    mask : '__',
                    strict : true,
                    pattern : '[0-9]'
                },
				'#iTelefone' : {
                    mask : '____-____',
                    strict : true,
                    pattern : '[0-9]'
                },
				'#iCep' : {
                    mask : '_____-___',
                    strict : true,
                    pattern : '[0-9]'
                }
            },
            mask_symbol : '_' // when underscore is used we can actually omit this parameter
        });
    </script>		
</body>
</html>