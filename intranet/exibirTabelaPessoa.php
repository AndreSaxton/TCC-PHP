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
		//SELECT pessoa.nm_pessoa, conta.cd_movimentacao_conta FROM pessoa JOIN conta ON pessoa.cd_pessoa = conta.cd_pessoa WHERE cd_movimentacao_conta = 1
		
		$campoBusca =  $_GET["campoBusca"];
		$condicaoBusca =  $_GET["condicaoBusca"];
		$buscarPor =  $_GET["buscarPor"];
				
		$consulta = "SELECT pessoa.* FROM pessoa WHERE nm_status_pessoa = 'Ativo'";
		if(($campoBusca!="")||($condicaoBusca!="")||($buscarPor!="")){			
			if($condicaoBusca=="Nome"){//se buscar nome{
				$consulta = "SELECT pessoa.*, conta.cd_movimentacao_conta FROM pessoa JOIN conta ON pessoa.cd_pessoa = conta.cd_pessoa
				WHERE nm_status_pessoa = 'Ativo'";
				if($campoBusca =="")//se nao houver nada preenchido
				{
					if($buscarPor=="Fornecedor")
						$consulta = $consulta. " AND cd_movimentacao_conta = 0";
					else
						$consulta = $consulta. " AND cd_movimentacao_conta = 1";
				}
				else{
					$consulta = $consulta. " AND nm_pessoa LIKE '%".$campoBusca."%'";
					if($buscarPor=="Fornecedor")
						$consulta = $consulta. " AND cd_movimentacao_conta = 0";
					else
						$consulta = $consulta. " AND cd_movimentacao_conta = 1";					
				}
			}
			else{//se buscar documento
			/*
			$campoBusca=str_replace(",","",$campoBusca);//tira parte da string
			$campoBusca=str_replace(".","",$campoBusca);
			$campoBusca=str_replace("/","",$campoBusca);
			$campoBusca=str_replace("-","",$campoBusca);
			*/
			require_once('funcoesPHP.php');
			$campoBusca = limparDocumento($campoBusca);
			
				if($campoBusca =="")//se nao houver nada preenchido
					$consulta = $consulta. " AND nm_tipo_pessoa ='".$buscarPor."'";
				else
					$consulta = $consulta. " AND cd_documento_pessoa = '".$campoBusca."' AND nm_tipo_pessoa ='".$buscarPor."'";
					//nm_tipo_pessoa
			}
		}
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
			
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            //echo "falha ao buscar, ". $campoBusca." não encontrado";
			//echo $consulta;
			echo "Erro ao buscar, a informação desejada esta cadastrada? ";
        }else{		
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código da Pessoa </td>			
			<td> Nome da Pessoa </td>			
			<td> Endereço </td>
			<td> CEP </td>
			<td> DDD </td>
			<td> Telefone </td>
			<td> Email </td>
			<td> Pessoa </td>
			<td> Documento </td>
			<!--td> Condição </td-->
		</tr>";
		while($info = $busca->fetch_assoc()){
			if($info['nm_tipo_pessoa']=="Juridica"){
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 2, 0);//usar para incluir ponto
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 6, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 10, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "-", 15, 0);
			}
			else{
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 3, 0);//usar para incluir ponto
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 7, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 11, 0);				
			}
			$info['cd_telefone_pessoa'] = substr_replace($info['cd_telefone_pessoa'], "-", 4, 0);
			$info['cd_cep_pessoa'] = substr_replace($info['cd_cep_pessoa'], "-", 5, 0);
		echo "<tr class='um' onclick='carregarDadosPessoa(".$info['cd_pessoa'].",this)'>	
			<td> ".$info['cd_pessoa']." </td>
			<td> ". $info['nm_pessoa']." </td>			
			<td> ". $info['nm_endereco_pessoa']." </td>
			<td> ". $info['cd_cep_pessoa']." </td>
			<td> ". $info['cd_ddd_pessoa']." </td>
			<td> ". $info['cd_telefone_pessoa']." </td>
			<td> ". $info['nm_email_pessoa']." </td>			
			<td> ". $info['nm_tipo_pessoa']." </td>
			<td> ". $info['cd_documento_pessoa']." </td>
			<!--td> ". $info['nm_status_pessoa']." </td-->
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>