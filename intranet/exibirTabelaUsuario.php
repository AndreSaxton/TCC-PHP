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
	
	<script language="javascript" src="_javascript/exibirTabelaUsuario.js">
	</script>
</head>
<body id="tabelaPessoa">
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php	
		$departamento =  $_GET["nDepartamento"];
		$nome =  $_GET["nNome"];
		
		/*$consulta = "SELECT login.*, departamento.nm_departamento, pessoa.nm_pessoa FROM login 
			JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa
			JOIN departamento ON pessoa.cd_departamento = departamento.cd_departamento
			";*/
		$consulta = "SELECT login.*, setor.nm_setor, pessoa.nm_pessoa, pessoa.cd_pessoa FROM login JOIN setor ON login.cd_setor = setor.cd_setor JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa WHERE login.nm_status_login = 'Ativo'
			";
		//$consulta = $consulta. " AND nm_status_login = 'Ativo'";
		if($departamento!="")		
			$consulta = $consulta. " AND setor.nm_setor = '".$departamento."'";
		if($nome!="")
			$consulta = $consulta. " AND login.nm_login LIKE '%".$nome."%'";
		$consulta = $consulta. " ORDER BY cd_login";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco							
			
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, Usuário não encontrado";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código do Usuário </td>			
			<td> Nome </td>			
			<!--td> Senha </td-->
			<td> Colaborador </td>
			<td> Departamento </td>
			<!--td> Status </td-->
		</tr>";
		while($info = $busca->fetch_assoc()){
		echo "<tr class='um' onclick='carregarDadosUsuario(".$info['cd_login'].",this)'>	
			<td> ".$info['cd_login']." </td>
			<td> ". $info['nm_login']." </td>
			<!--td> ". $info['nm_senha_login']." </td-->
			<td> ". $info['nm_pessoa']." </td>
			<td> ". $info['nm_setor']." </td>
			<!--td> ". $info['nm_status_login']." </td-->
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>