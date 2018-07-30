<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	<style>
		#busca{
			position: relative;
			left: 275px;
			display:none;
		}	
		#btn{				
			position: relative;			
			margin: 2px;			
		}
		#direita{
			color: blue;
			display: none;
			float: right;			
			border-style: solid;
			border-width: 2px 2px 2px 2px;
			width: 60%;
			height: 410px;
			overflow:auto;
		}
		#esquerda{
			color: blue;
			display: block;
			float: left;
			width: 270px;
			height: auto;
			border-style: solid;
			border-width: 2px 2px 2px 2px;		
			
		}
		#validar{
			display: block;			
		}
	</style>
	<script language="javascript">					
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}
		function mostraDiv(){			
			document.getElementById("busca").style.display = "block";			
		}
		function someDiv(){			
			document.getElementById("busca").style.display="hidden";
		}
		function someBuscaPessoa(){							
			document.getElementById("busca").style.display="none";
		}
		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 440px;"></object>';
			
			mostraDireita();
		}
		function carregarDadosPessoa(cd_pessoa=""){			
			document.getElementById("esquerda").innerHTML='<object type="text/html" data="salvarPessoaDiv.php?nCodigo='+cd_pessoa+'" style="width:100%; height: 440px;"></object>';
		}		
	</script>
</head>
<body onload="carregarDadosPessoa()">

	<h1>Cadastrar Pessoa</h1>
	<aside id="esquerda">
		<?php
			//include("salvarPessoaDiv.php");
		?>
	</aside>
	
	<input id="btn" type="submit" value="Buscar" onclick="mostraDiv()"/>
	<input id="btn" type="submit" value="Ver Pessoa" onclick="exibirTabelaPessoa()"/>
	
	<aside id="direita">
		<?php
			//include("exibirTabelaPessoa.php");
		?>
	</aside>
	<aside id="busca">
		<?php
			include("buscarPessoa.php");
		?>
	</aside>
</body>
</html>