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
	
	<script language="javascript" src="_javascript/exibirTabelaProduto.js">
	</script>
</head>
<body id="tabelaPessoa">
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php
		$campoBusca =  $_GET["campoBusca"];
				
		$consulta = "SELECT produto.*, imagem.* FROM produto
		JOIN imagem ON imagem.cd_imagem = produto.cd_imagem
		WHERE nm_status_produto = 'Ativo'";
		if ($campoBusca!="") {
			$consulta = $consulta . " AND nm_produto LIKE '%$campoBusca%'";
		}

		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
			
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "Erro ao buscar, a informação desejada esta cadastrada? ";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		echo "<table>			
		<td>Código do Produto</td><td>Nome do PRODUTO</td><td>Em estoque</td><td>Valor Unitário</td><td>Imagem</td><td>Situação</td><td>Descrição</td></tr>
		</tr>";
		while($info = $busca->fetch_assoc()){			
		echo "<tr class='um' onclick='carregarDadosProduto(".$info['cd_produto'].",this)'>	
			<td> ".$info['cd_produto']." </td>
			<td> ". $info['nm_produto']." </td>			
			<td> ". $info['qt_estoque_produto']." </td>
			<td> ". $info['vl_produto']." </td>
			<!--td> ". $info['nm_imagem']." </td-->
			<td><img src='../_imagem/". $info['nm_imagem']."' height='50' width='50'></td>

			<td> ". $info['nm_status_produto']." </td>
			<td> ". $info['ds_produto']."</td>
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>