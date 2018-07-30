<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>teste</title>
		
	<style>
		#buscaPessoa, #buscaConta{
			position: relative;
			left: 0px;
			top: 180px;
			display:none;
		}	
		#btn{
			
			position: relative;
			float: left;
			margin: 2px;
		}
		#direita, #direitaPessoa{
			color: blue;
			display: none;
			float: right;
			width: 50%;
			height: 600px;
			border-style: solid;
			border-width: 2px 2px 2px 2px;			
		}
		#esquerda{
			color: blue;
			display: block;
			float: left;
			width: auto;
			height: auto;
			border-style: solid;
			border-width: 2px 2px 2px 2px;
		}
		
		
	</style>
	<script language="javascript">	
		
		function someDataPagamento(){
			var teste = document.getElementById("iCheckPagamento").checked;
			if(teste == true)
				document.getElementById("iPagamento").readOnly="true";
			else
				document.getElementById("iPagamento").removeAttribute("readonly");
			document.getElementById("iPagamento").valueAsDate = null;
		}		
					
		function validarCodigoPessoa(){			
		var valor = document.getElementById("iCodigoPessoa").value;
			if(valor==""){
				var resposta = alert('Preencha o Código da Pessoa.');
				if (resposta){
					document.write("alerta");
				}				
			}			
		}
		function colValor(){
			document.getElementById("iCodigoPessoa").value = 5;
		}
	</script>
</head>
<body>
	<h1></h1>
	<aside id="esquerda">
		<aside name="cadastroConta" >	
			<p>Código da Pessoa:<input type="number" name="nCodigoPessoa" id="iCodigoPessoa" readonly="readonly"/></p>
			<p>Cadastrar como:
				<select name="nTransacao" id="iTransacao">
					<option value="Lucro">Lucro</option>
					<option value="Gasto">Gasto</option>
				</select>
			</p>
			<p>Nome da Conta:<input type="text" name="nNome" id="iNome" required/></p>
			<p>Valor da Conta:<input type="number" name="nValor" id="iValor" required/></p>			
			<p>Data de Vencimento:<input type="date" name="nVencimento" id="iVencimento" required/></p>
			<p>Data de Pagamento:<input type="date" name="nPagamento" id="iPagamento"/><input type="checkbox" name="nCheckPagamento" id="iCheckPagamento" value="naoPago" onchange="someDataPagamento()"/>Não há</p>
			<input id="btn" type="submit" value="Validar" onclick="validarCodigoPessoa()"/>		
		</aside>
		<a id="btn" onclick="colValor()"><button>colocar codigo</button></a>		
	</aside>
</body>
</html>