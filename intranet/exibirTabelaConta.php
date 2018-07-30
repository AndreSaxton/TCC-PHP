<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<link rel="stylesheet" type="text/css" href="_css/exibirTabelaConta.css">
	
	<script language="javascript" src="_javascript/exibirTabelaConta.js">
	</script>
</head>
<body>
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php
	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
		
		$campoBusca =  $_GET["campoBusca"];
		$campoBusca2 =  $_GET["campoBusca2"];
		$condicaoBusca =  $_GET["condicaoBusca"];
		$buscarPor =  $_GET["buscarPor"];
		
		if($buscarPor!=""){
			if($buscarPor=="Gasto")
				$buscarPor = 0;
			else
				$buscarPor = 1;
		}
				
		//$consulta = "SELECT * FROM conta ";
		$consulta = "SELECT conta.*, pessoa.nm_pessoa 
					 FROM conta JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa
					 WHERE nm_status_conta = 'Ativo'";
				  //"SELECT conta.*, pessoa.nm_pessoa FROM conta INNER JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa");
		if(($campoBusca!="")||($campoBusca2!="")||($condicaoBusca!="")||($buscarPor!="")){
			if($condicaoBusca=="Nome"){//se buscar nome{
				if(($campoBusca =="")||($campoBusca2 =="")){//se um dos dois campos estiverem vazios
					$consulta = $consulta. " AND cd_movimentacao_conta =".$buscarPor."";
					
					if(($campoBusca !="")&&($campoBusca2 =="")){//se apenas o campo 2 estiver vazio
						$consulta = $consulta." AND nm_conta LIKE'%".$campoBusca."%'";
					}
					elseif(($campoBusca =="")&&($campoBusca2 !="")){//se apenas o campo 1 estiver vazio}
						$consulta = $consulta." AND pessoa.nm_pessoa LIKE '%".$campoBusca2."%'";
						//$consulta = "SELECT conta.*, pessoa.nm_pessoa FROM conta JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa"
						//." WHERE pessoa.nm_pessoa ='".$campoBusca2."'";
					}					
				}	
				else{//os dois campos estao preenchidos
						$consulta = $consulta. " AND cd_movimentacao_conta =".$buscarPor." AND nm_conta LIKE '%".$campoBusca."%' AND pessoa.nm_pessoa LIKE '%".$campoBusca2."%'";
				}
			}
			else{//se buscar por periodo
				if($campoBusca =="")//se nao houver nada preenchido
					$consulta = $consulta. " AND cd_movimentacao_conta ='".$buscarPor."'";
				else
					$consulta = $consulta. " AND dt_vencimento_conta = '".$campoBusca."' AND cd_movimentacao_conta ='".$buscarPor."'";	
			}
		}
		//olhar linha 20 a 40. 
		//ver consulta por beneficiario, na tabela conta tem apenas cd_pessoa

		
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "Erro ao buscar, a informação desejada esta cadastrada? ";
			//echo $consulta;
        }
		else{		
		//$busca = $conexao->query("SELECT conta.*, pessoa.nm_pessoa FROM conta INNER JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa");   
		$busca = $conexao->query($consulta);
				
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código da Conta </td>			
			<td> Nome da Conta </td>			
			<td> Valor </td>
			<td> Data de Vencimento </td>
			<td> Data de Pagamento </td>
			<td> Tipo da Transação </td>
			<td> Nome da Pessoa </td>
			<!--td> Condição </td-->
		</tr>";
		while($info = $busca->fetch_assoc()){
			if ($info['cd_movimentacao_conta'] == 0)
				$info['cd_movimentacao_conta'] = "Gasto";
			else
				$info['cd_movimentacao_conta'] = "Lucro";
		echo "<tr class='um' onclick='carregarDadosConta(".$info['cd_conta'].",this)'>
			<td> ".$info['cd_conta']." </td>
			<td> ". $info['nm_conta']." </td>
			<td> R$ ". number_format( $info['vl_conta'],2,',','.')." </td>
			<td> ". $info['dt_vencimento_conta']." </td>
			<td> ";
			if ($info['dt_pagamento_conta']=="0000-00-00")
				echo "Não Paga";
			else
				echo $info['dt_pagamento_conta'];
			echo " </td>
			<td> ". $info['cd_movimentacao_conta']." </td>
			<td> ". $info['nm_pessoa']." </td>
			<!--td> ". $info['nm_status_conta']." </td-->
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>