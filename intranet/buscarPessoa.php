<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/buscarPessoa.css">
	
	<script language="javascript" src="_javascript/buscarPessoa.js">	
	</script>
	
	<script type="text/javascript" src="myinputmask-master\src\InputMask.js"></script>
</head>
<body>
	
	<aside id="asideBuscarPessoa">
		<h3>Preencha os campos<br/> para buscar</h3>	
		<input type="radio" name="condicao" value="Nome" id="iCondicaoBusca" onclick="mostraNome();">Nome</input>
		<input type="radio" name="condicao" value="Documento" id="iCondicaoBusca" onclick="mostraDocumento();">Documento</input>
		<section name="buscarNome" id="iBuscarNome">			
			<p>Cadastrado como:
				<select name="nStatus" id="iStatusBusca">
					<option value="Cliente">Cliente</option>
					<option value="Fornecedor">Fornecedor</option>
				</select>
			</p>		
			<p>Nome:<input type="text" name="nNome" id="iNomePessoaBusca"/></p>				
		</section>
		
		<section name="buscarDocumento" id="iBuscarDocumento">
			<p>Tipo de Pessoa:
			<br/>
				<select name="nTipoPessoa" id="iTipoPessoaBusca" onchange="mudarDocumento(this.value);">
					<option value="Fisica">Fisica</option>
					<option value="Juridica">Juridica</option>
				</select>
			</p>		
			<p id="pDocumento">CPF:</p><input type="text" name="nDocumento" id="iDocumentoBusca" placeholder="___.___.___/__"/>
		</section>
		
		<input id="btn1" type="submit" value="Validar" onclick="buscarPessoa()"/>
		<input id="btn2" type="submit" value="Cancelar" onclick="someBuscarPessoa()"/>		
	</aside>
	
	<script type="text/javascript">	
        new InputMask({
            inputs : {
                '#iDocumentoBusca' : {
                    mask : '___.___.___/__',
                    strict : true,
                    pattern : '[0-9]'                
                }
            },
            mask_symbol : '_' // when underscore is used we can actually omit this parameter
        });
    </script>
</body>
</html>