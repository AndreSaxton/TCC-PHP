<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/buscarUsuario.css">
	
	<script language="javascript" src="_javascript/buscarUsuario.js">
	</script>
</head>
<body>	
	<aside id="asideBuscarUsuario">
		<h3>Preencha os campos<br/> para buscar</h3>			
		<section name="buscarNomeUsuario" id="iBuscarNomeUsuario">			
			<p>Departamento:
				<select name="nDepart" id="iDepart">
					<option value="Administrativo">Administrativo</option>
					<option value="Comercial">Comercial</option>
					<option value="Financeiro">Financeiro</option>
				</select>
			</p>		
			<p>Nome:<input type="text" name="nNome" id="iNomeUsuarioBusca"/></p>				
		</section>
		<input id="btn1" type="submit" value="Validar" onclick="buscarUsuario()"/>
		<input id="btn2" type="submit" value="Cancelar" onclick="someBuscarUsuario()"/>		
	</aside>
</body>
</html>