<head>
	<?php
		$cd_login = $_REQUEST['cd_cliente'];
		$vl_total = $_REQUEST['vl_total'];
		//echo $cd_login;

		$nomeCompra = $cd_login;
		$nomeCompra = "Compra$nomeCompra";
		//$frete = 15.35;
		$frete = $_REQUEST['frete'];
		$totFrete = ($frete + $vl_total);
	?>
	<script>
		//alert('Alerta!\nCompra finalizada!'+<?php echo $cd_login?>);
		//document.write('teste');
	</script>
<pre>
	<?php
		require_once('../conexao.php');
		$busca = $conexao->query("
		SELECT * FROM login
		JOIN carrinho on login.cd_login = carrinho.cd_login
		JOIN item on carrinho.cd_carrinho = item.cd_carrinho
		JOIN produto on item.cd_produto = produto.cd_produto 
		WHERE login.cd_login = $cd_login
		AND carrinho.nm_status_carrinho = 'Ativo'
		");
		//while($info = $busca->fetch_assoc())			
			//print_r($info);			

		$busca = $conexao->query("
		SELECT * FROM login
		JOIN carrinho on login.cd_login = carrinho.cd_login
		WHERE login.cd_login = $cd_login
		AND carrinho.nm_status_carrinho = 'Ativo'
		");

		$nm_status_carrinho = false;

		while($info = $busca->fetch_assoc()){
			//print_r($info);
			$cd_carrinho = $info['cd_carrinho'];
			$nm_status_carrinho = $info['nm_status_carrinho'];
			$nm_login = $info['nm_login'];
		}
		//echo $cd_carrinho;

		if($nm_status_carrinho==true){

			//cria o registro da conta
			date_default_timezone_set('America/Sao_Paulo');
			$dia = date('Y-m-d');
			$conexao->query("
			INSERT INTO cadastro(nm_tipo_cadastro, dt_cadastro, cd_cadastro, cd_login)
			VALUES('Novo','$dia',null, $cd_login)
			");
			$ultimo_id = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
				
			$date = strtotime("+10 day");
			$vencimento = date('Y-m-d', $date);

			$resultado = $conexao->query("
			INSERT INTO conta(nm_conta,vl_conta,cd_movimentacao_conta,dt_vencimento_conta,cd_pessoa, nm_status_conta, cd_cadastro)
			VALUES('Compra de $nm_login','$totFrete','1','$vencimento',(SELECT cd_pessoa FROM login WHERE cd_login='$cd_login'), 'Ativo', '$ultimo_id')"); //inserindo dados na tabela conta"

			$ultimo_id2 = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento

			$conexao->query("UPDATE `carrinho` SET `nm_status_carrinho`= 'Inativo' WHERE cd_carrinho = $cd_carrinho");

			$conexao->query("
			INSERT INTO `compra`(`nm_situacao_compra`, `cd_login`, `cd_carrinho`, `cd_conta`, `vl_total_compra`) 
			VALUES ('Pendente', (SELECT cd_login FROM login WHERE cd_login = $cd_login), 
	        (SELECT cd_carrinho FROM carrinho WHERE cd_carrinho = $cd_carrinho), 
	        (SELECT cd_conta FROM conta WHERE cd_conta = $ultimo_id2), $vl_total)
			");//*/

			$ultimo_id3 = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento

			//echo "Compra finalizada <script>alert($ultimo_id2)</script>";
			//echo $totFrete;
			echo"
			
			<script>document.getElementById('formPgmt').submit();</script>
			";
			//header("location: ../carrinho.php");

		}
		else
		//	echo "Compra não finalizada";
	?>
</pre>
</head>
<body onload="document.getElementById('formPgmt').submit();" display="none">
	<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top' id='formPgmt' >
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="92J3BDFQRUT7C">
	<input type="hidden" name="lc" value="BR">
	<!--input type="hidden" name="item_name" value="teste">
	<input type="hidden" name="item_number" value="2">
	<input type="hidden" name="amount" value="15.00"-->
	<input type="hidden" name="item_name" value= <?php echo $nomeCompra;?> >
	<input type="hidden" name="item_number" value= <?php echo $ultimo_id3;?> >
	<input type="hidden" name="amount" value= <?php echo $vl_total;?> >
	<input type="hidden" name="currency_code" value="BRL">
	<input type="hidden" name="button_subtype" value="services">
	<!--input type="hidden" name="tax_rate" value="2.000">
	<input type="hidden" name="shipping" value="20.00"-->
	<input type="hidden" name="tax_rate" value="0.000">
	<input type="hidden" name="shipping" value= <?php echo $frete;?> >
	<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHosted">
	<!--input type="image" src="https://www.paypalobjects.com/pt_BR/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!"-->
	<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
	</form>
</body>