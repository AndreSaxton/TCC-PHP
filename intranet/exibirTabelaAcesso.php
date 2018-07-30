<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<link rel="stylesheet" type="text/css" href="_css/exibirTabelaPessoa.css">
	
	<script language="javascript" src="_javascript/exibirTabelaPessoa.js">
	</script>
</head>
<body id="tabelaPessoa">
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php		
		/*
		$consulta = "
		SELECT cadastro.*, a.nm_login AS 'loginCadastrante', b.nm_login AS 'loginCadastrado', b.cd_login AS 'codigoLoginCadastrado' 
		FROM cadastro, login a, login b 
		WHERE cadastro.cd_login = a.cd_login AND cadastro.cd_cadastro = b.cd_cadastro
		ORDER BY cd_cadastro";	
		*/
		$consulta = "SELECT acesso.*, login.nm_login 
		FROM acesso 
		JOIN login ON acesso.cd_login=login.cd_login
		ORDER BY cd_acesso";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco	
			
		$verifica = $conexao->query($consulta);		
		
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, Log não encontrado";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);  
		
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código do Acesso </td>						
			<td> Data do Acesso </td>
			<td> Hora do Acesso </td>
			<td> Código do Login<br/>utilizado</td>			
			<td> Nome do Login<br/>utilizado</td>
		</tr>";
		while($info = $busca->fetch_assoc()){
		echo "<tr class='um'>	
			<td> ". $info['cd_acesso']." </td>
			<td> ". $info['dt_acesso']." </td>
			<td> ". $info['hr_acesso']." </td>
			<td> ". $info['cd_login']." </td>						
			<td> ". $info['nm_login']." </td>
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>