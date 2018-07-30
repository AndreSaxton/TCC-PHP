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
		$consulta = "
		SELECT cadastro.*, a.nm_login AS 'loginCadastrante', b.nm_login AS 'loginCadastrado', b.cd_login AS 'codigoLoginCadastrado' 
		FROM cadastro, login a, login b 
		WHERE cadastro.cd_login = a.cd_login AND cadastro.cd_cadastro = b.cd_cadastro
		ORDER BY cd_cadastro";
		
		$consultaPessoa = "
		SELECT cadastro.*, a.nm_login AS 'loginCadastrante', b.nm_pessoa AS 'pessoaCadastrado', b.cd_pessoa AS 'codigoPessoaCadastrado' 
		FROM cadastro, login a, pessoa b 
		WHERE cadastro.cd_login = a.cd_login AND cadastro.cd_cadastro = b.cd_cadastro
		ORDER BY cd_cadastro";	
		
		$consultaConta = "
		SELECT cadastro.*, a.nm_login AS 'loginCadastrante', b.nm_conta AS 'contaCadastrado', b.cd_conta AS 'codigoContaCadastrado' 
		FROM cadastro, login a, conta b 
		WHERE cadastro.cd_login = a.cd_login AND cadastro.cd_cadastro = b.cd_cadastro
		ORDER BY cd_cadastro";
		
		$consultaProduto = "
		SELECT cadastro.*, a.nm_login AS 'loginCadastrante', b.nm_produto AS 'produtoCadastrado', b.cd_produto AS 'codigoProdutoCadastrado' 
		FROM cadastro, login a, produto b 
		WHERE cadastro.cd_login = a.cd_login AND cadastro.cd_cadastro = b.cd_cadastro
		ORDER BY cd_cadastro";

		require_once('conexao.php'); //chama o arquivo de conexão com o banco	
			
		$verifica = $conexao->query($consulta);		
		
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, Log não encontrado";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);     
		$buscaPessoa = $conexao->query($consultaPessoa);    
		$buscaConta = $conexao->query($consultaConta);
		$buscaProduto = $conexao->query($consultaProduto);
		
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código do Cadastro </td>			
			<td> Tipo do Cadastro </td>			
			<td> Data do Cadastro </td>
			<td> Código do Login Cadastrante</td>
			<td> Login Cadastrante </td>			
			<td> Cadastra realizado em </td>
			<td> Código do Cadastrado</td>			
			<td> Nome Cadastrado </td>			
		</tr>";
		while($info = $busca->fetch_assoc()){
		echo "<tr class='um'>	
			<td> ".$info['cd_cadastro']." </td>
			<td> ". $info['nm_tipo_cadastro']." </td>
			<td> ". $info['dt_cadastro']." </td>
			<td> ". $info['cd_login']." </td>			
			<td> ". $info['loginCadastrante']." </td>
			<td> Login </td>
			<td> ". $info['codigoLoginCadastrado']." </td>
			<td> ". $info['loginCadastrado']." </td>						
		<tr/>";
        }
		while($info = $buscaPessoa->fetch_assoc()){
		echo "<tr class='um'>	
			<td> ".$info['cd_cadastro']." </td>
			<td> ". $info['nm_tipo_cadastro']." </td>
			<td> ". $info['dt_cadastro']." </td>
			<td> ". $info['cd_login']." </td>
			<td> ". $info['loginCadastrante']." </td>		
			<td> Pessoa </td>
			<td> ". $info['codigoPessoaCadastrado']." </td>
			<td> ". $info['pessoaCadastrado']." </td>				
		<tr/>";
        }
		while($info = $buscaConta->fetch_assoc()){
		echo "<tr class='um'>	
			<td> ".$info['cd_cadastro']." </td>
			<td> ". $info['nm_tipo_cadastro']." </td>
			<td> ". $info['dt_cadastro']." </td>
			<td> ". $info['cd_login']." </td>
			<td> ". $info['loginCadastrante']." </td>		
			<td> Conta </td>
			<td> ". $info['codigoContaCadastrado']." </td>
			<td> ". $info['contaCadastrado']." </td>				
		<tr/>";
        }
		while($info = $buscaProduto->fetch_assoc()){
		echo "<tr class='um'>	
			<td> ".$info['cd_cadastro']." </td>
			<td> ". $info['nm_tipo_cadastro']." </td>
			<td> ". $info['dt_cadastro']." </td>
			<td> ". $info['cd_login']." </td>
			<td> ". $info['loginCadastrante']." </td>		
			<td> Produto </td>
			<td> ". $info['codigoProdutoCadastrado']." </td>
			<td> ". $info['produtoCadastrado']." </td>				
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>