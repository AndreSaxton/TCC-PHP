<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarContaDiv.css">
		
	<script language="javascript" src="_javascript\salvarContaDiv.js">	
	</script>
	
</head>
<body>	
<?php	
	require_once('_php/carregarCamposConta.php');
?>
		<form method="GET" name="cadastroConta" action="_php/validarSalvarConta.php" onsubmit="return validarCodigoPessoa()" id="formCadastro">
			<table>
			<tr><td><p>Código da Conta:</p></td><td><input type="text" name="nCodigoConta" id="iCodigoConta" readonly="readonly" value="<?php echo $codigo?>"/></td></tr>

			<tr><td><p>Código da Pessoa:</p></td><td><input type="text" name="nCodigoPessoa" id="iCodigoPessoa" readonly="readonly" value="<?php echo $pessoa?>"/></td></tr>

			<tr><td><p>Cadastrar como:</p></td><td>
				<select name="nTransacao" id="iTransacao">
					<option value="Lucro" <?php if($transacao==1) echo 'selected';?>>Lucro</option>
					<option value="Gasto" <?php if($transacao==0) echo 'selected';?>>Gasto</option>
				</select>
			</td></tr>

			<tr><td><p>Nome da Conta:</p></td><td><input type="text" name="nNome" id="iNome" required value="<?php echo $nome?>"/></td></tr>

			<tr><td><p>Valor da Conta:</p></td><td><input type="number" name="nValor" id="iValor" required value="<?php echo $valor?>" step=".01" /></td></tr>

			<tr><td><p>Data de Vencimento:</p></td><td><input type="date" name="nVencimento" id="iVencimento" required value="<?php echo $vencimento?>"/></td></tr>
			
			<tr><td rowspan=2><p>Data de Pagamento:</p></td><td><input type="date" name="nPagamento" id="iPagamento" value="<?php echo $pagamento?>"/></td></tr>			
			<tr><td><input type="checkbox" name="nCheckPagamento" id="iCheckPagamento" value="naoPago" onchange="someDataPagamento()"/>Não há</td></tr>
			
			</table>
			
			<input id="btn" type="submit" value="Validar"/>
		</form>
		<a id="del" onclick="validarDeletarConta();"><button>Deletar</button></a>
		<a id="btn" onclick="window.history.back();"><button>Cancelar</button></a>	
</body>
</html>