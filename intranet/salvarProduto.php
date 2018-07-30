<?php  
	require_once('validarLogin.php');
?>
<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarPessoa.css">
	
	<script language="javascript" src="_javascript/salvarProduto.js">				
	</script>	
	
</head>
<body onload="carregarDadosProduto()">
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<div id="meio">
	
		<div>
			<p>Cadastro de Produtos</p>				
			<button id="btn" type="submit" onclick="mostraDiv()">Buscar<br/>Produtos</button>
			<button id="btn" type="submit" onclick="exibirTabelaProduto()">Mostrar todos<br/>os Produtos</button>
		</div>
		<div id="asides">
		<aside id="esquerda" style="width: 90%; border: none;">			
		</aside>
		
		<aside id="direita">
		</aside>
		
		<aside id="busca">
			<?php
				include("buscarProduto.php");
			?>
		</aside>
		</div>
		
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>	
</body>
</html>