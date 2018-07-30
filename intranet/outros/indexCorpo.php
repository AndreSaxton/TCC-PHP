<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<style>
		#btn{
			width: 50%;
			heith: 250px;
			margin: 5px;
			border-style: solid;
			border-width: 2px 2px 2px 2p;
			border-color: black;
		}
		figure{
			float: left;	
			width: 50%;
			margin-left: auto;
			margin-right: auto;			
		}
		#menu:hover{
			left: 0px;
		}
		#menu{
			border-style: solid;
			border-width: 2px 2px 2px 2px;
			width: 160px;
			height: 99.4vh;
			transition: 1s;
			position: absolute;
			left: -120px;
			top: 0px;
			z-index: 1;
		}		
	</style>
</head>
<body>		
	<h1>Selecione para onde quer ir</h1>
	<center>
		<figure>
			<a href="gestaoPessoa.php"><img src="avatar.jpg" id="btn" type="submit" title="Gestão Comercial"/></a>
			<figcaption>Gestão Comercial</figcaption>
		</figure>
		<figure>
			<a href="gestaoFinanceira.php"><img src="envelope.png" id="btn"/></a>
			<figcaption>Gestão Financeira</figcaption>
		</figure>
	</center>
</body>
</html>