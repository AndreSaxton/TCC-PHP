<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/buscarConta.css">
	
	<script language="javascript" src="_javascript/buscarConta.js">
	</script>
</head>
<body>
	
	<aside id="asideBuscarConta">
		<h3>Preencha os campos para buscar</h3>	

		
			<input type="radio" name="condicao" value="Nome" id="iCondicaoBusca" onclick="mostraNomeConta();">Nome</input>
			<input type="radio" name="condicao" value="Periodo" id="iCondicaoBusca" onclick="mostraPeriodo();">Periodo</input>			
			
			<section name="buscarNomeConta" id="iBuscarNomeConta">
				<p>Nome:<input type="text" name="nNome" id="iNomeBusca"/></p>
				<p>Beneficiario:<input type="Text" name="nPessoa" id="iPessoaBusca"/></p>
			</section>
			<section name="buscarPeriodoConta" id="iBuscarPeriodoConta">
				<p>Vencimento:<input type="date" name="nVencimento" id="iVencimentoBusca"/></p>
			</section>
			
			<p>Tipo de Conta:
				<select name="nTipoConta" id="iTipoContaBusca">
					<option value="Lucro">Lucro</option>
					<option value="Gasto">Gasto</option>
				</select>
			</p>		
						
			<input id="btn" type="submit" value="Validar" onclick="buscarConta()"/>
		
		<input id="btn" type="submit" value="Cancelar" onclick="someBuscarConta()"/>		
	</aside>
</body>
</html>