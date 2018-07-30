<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/buscarProduto.css">
	
	<script language="javascript" src="_javascript/buscarProduto.js">	
	</script>
</head>
<body>	
	<aside id="asideBuscarProduto">
		<h3>Preencha os campos<br/> para buscar</h3>			
		<section name="buscarNome" id="iBuscarNome">	
			<p>Nome:<input type="text" name="nNome" id="iNomeProdutoBusca"/></p>				
		</section>
		<input id="btn1" type="submit" value="Validar" onclick="buscarProduto()"/>
		<input id="btn2" type="submit" value="Cancelar" onclick="someBuscarProduto()"/>		
	</aside>	
</body>
</html>