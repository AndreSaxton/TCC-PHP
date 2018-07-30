<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	
	<link rel="stylesheet" type="text/css" href="_css/salvarPessoaDiv.css">
		
	<script language="javascript" src="_javascript\salvarProdutoDiv.js">	
	</script>
	<script type="text/javascript" src="myinputmask-master\src\InputMask.js"></script>
	<script type="text/javascript">
		function mostrarFotos(){
			document.getElementById('busca')
			//alert();
			//parent.document.getElementById('imgs').style.display='none';
			parent.document.getElementById('direita').style.display='none';
			document.getElementById("imgs").innerHTML='<object type="text/html" data="outros/salvarImagemDiv.php" style="width:100%; height: 99%;"></object>';
			document.getElementById('imgs').style.width='450px';
			document.getElementById('imgs').style.height='440px';
			document.getElementById('imgs').style.display='block';			
			//parent.document.getElementById('imgs').innerHTML='none';
		}
		function mudaFoto(src,cdImagem) {
			//let a =document.getElementById('esquerda');
			//a.getElementById('test').style.display='none';
			//alert(src);
			document.getElementById('foto').src=src;
			document.getElementById('cdImagem').value=cdImagem;
		}
	</script>
	
	<style type="text/css">
		#imgs{ 
			display: none; 
			position: absolute;
			top: 0px;
			opacity: 1;			
			z-index: 2;
			/*left: 30%; */
			background-color: #777;
		}
		#tudo{
			border: 2px solid black;
			height: 420px;
			width: 300px;			
		}
		#del, #btn{bottom: 10px;}
	</style>

</head>
<body>
<?php	
		require_once('_php/carregarCamposProduto.php');		
?>	<div id="tudo">
		<form method="POST" name="cadastroProduto" action="_php/validarSalvarProduto.php" id="formCadastro" enctype="multipart/form-data">
			<table>
			<tr><td><p>Código:</p></td><td><input type="number" name="nCodigoProduto" id="iCodigo" readonly="readonly" value="<?php echo $codigo?>"/></td></tr>
			
			<tr><td><p>Nome:</p></td><td><input type="text" name="nNome" id="iNome" required  value="<?php echo $nome?>"/></td></tr>
			
			<tr><td><p>Quantidade:</p></td><td><input type="number" name="nQuant" id="iQuant" required size="7"  value="<?php echo $quantidade?>"/></td></tr>
			
			<tr><td><p>Valor Unitário:</p></td><td><input type="number" name="nValor" id="iValor" step=".01" required  value="<?php echo $valor?>"/></td></tr>
			
			<tr><td>
				<p>Descrição:</p></td><td><textarea name="DSproduto"><?php echo $descricao?></textarea>
			</td></tr>

			<?php 
			if($imagem!=""){
				echo"<tr><td>Imagem atual:</td><td><input type='image' disabled='' src='../_imagem/$imagem' height='50' width='50' id='foto'></td></tr>
				<input type='hidden' name='fotoAtual' value='$imagem' id='fotoAtual'>";
			} else {
				echo"<tr><td>Imagem atual:</td><td><input type='image' disabled='' src='../_imagem/noImage.png' height='50' width='50' id='foto'></td></tr>
				<input type='hidden' name='fotoAtual' value='noImage.png' id='fotoAtual'>";
			}
			?>
			<input type="hidden" name="cdImagem" id="cdImagem">
			<tr>
				<td rowspan="2"><p>Imagem:</p></td>
				<td><button type="button" onclick="mostrarFotos()">Selecionar</button></td>
			</tr>			
						
			<input id="btn" type="submit" value="Validar"/>
			</table>
		</form>			
		<a id="del" onclick="validarDeletarProduto();"><button>Deletar</button></a>
		<a id="btn" onclick="top.window.history.back();"><button>Cancelar</button></a>		

		<div id="imgs" class="teste"></div>
	</div>
</body>
</html>