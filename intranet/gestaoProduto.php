<?php  require_once('validarLogin.php');?>
<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/gestaoPessoa.css">
		
	<script language="javascript" src="_javascript\gestaoProduto.js">	
	</script>	
</head>
<body>
	<iframe id="cabecalho" src="cabecalho.php" scrolling="no"></iframe>
	<br/>
	<div id="meio">	
		<button type="submit" onclick="exibirTabelaProduto()">Mostrar todos<br/>os Produtos</button>		
		<br/><br/>
		<input id="btn" type="submit" value="Buscar" onclick="mostraDiv()">	
		<br/><br/>
		<a id="btn" href="salvarProduto.php"><input type="submit" value="Cadastrar"></a>
		<br/><br/>				
		<aside id="direita">
			<?php
				//include("exibirTabelaPessoa.php");
			?>
		</aside>
		<aside id="busca">
			<?php
				include("buscarProduto.php");
			?>
		</aside>
	</div>
	<iframe id="rodape" src="rodape.html" scrolling="no"></iframe>
</body>
</html>