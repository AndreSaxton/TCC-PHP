<?php
require_once('conexao.php');
session_start();/*
require_once('confirmarLogin.php');
$cd_login = $_SESSION['cd_login'];
*/
if(!isset ($_SESSION['cd_login']) == true)
	//header('location: cadastro.php');
?>
<!DOCTYPE html>
<!--
    ustora by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com/ustora/
-->
<html>
  <head>

    <script>
        function finalizarCompra(cd_cliente, total){           
            let frete = document.getElementById("frete").innerHTML;
            let subTotal = document.getElementById("subTotal").innerHTML;
            //str_replace(',', '.', $frete);
            /*frete=frete.replace("R$ ", "");
            frete=frete.replace("<br>", "");
            alert(frete);            */
            if ((frete == "À Calcular")||subTotal == "R$ 0"){
                if (frete == "À Calcular")
                    alert("Favor calcular o Frete.");
                if (subTotal == "R$ 0")
                    alert("Favor adicionar itens ao carrinho.");
            }
            else{
                if(confirm("Deseja finalizar a compra?")==true){
                    //alert("Alerta!\nCompra finalizada!"+cd_cliente+"\ntotal:"+total);
                    frete=frete.replace("R$ ", "");
                    frete=frete.replace("<br>", "");
                    
                    location.href = "_php/finalizarCompra.php?cd_cliente="+cd_cliente+"&vl_total="+total+"&frete="+frete;
                    //document.getElementById("formPgmt").submit();
                }
                else
                    alert("Alerta!\nSua compra não foi finalizada!");
            }
        }
        function excluirItem(cd_carrinho, cd_item){
            if(confirm("Deseja excluir este item do Carrinho?")==true){
                //alert("Item excluido!"+cd_carrinho+" e "+cd_item);            
                location.href = "_php/excluirItemCarrinho.php?cd_carrinho="+cd_carrinho+"&cd_item="+cd_item;
            }
        }
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja Virtual</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="intranet/myinputmask-master\src\InputMask.js"></script>
  </head>
  <body>
   
    <div><?php require_once('cabecalho.php') ?></div>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrinho de Compras</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Pesquisar</h2>
                        <form action="produtos.php?busca=busca.value">
                            <input name="busca" type="text" placeholder="Pesquisar...">
                            <input type="submit" value="Buscar">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Produtos</h2>
                        <?php 
                        $busca = $conexao->query("SELECT * FROM produto JOIN imagem ON imagem.cd_imagem=produto.cd_imagem WHERE nm_status_produto = 'Ativo' LIMIT 5;");
                        while($info = $busca->fetch_assoc()){
                        	echo "                        	
	                        <div class='thubmnail-recent'>
		                        <img src='/_imagem/".$info['nm_imagem']."' class='recent-thumb' alt=''>
		                        <h2><a href='det_produto.php?cd=".$info['cd_produto']."'>".$info['nm_produto']."</a></h2>
		                        <div class='product-sidebar-price'>
		                        	<ins>".$info['vl_produto']."</ins>
		                        </div>                             
	                        </div>	                        
	                        ";
                        }
                        ?>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Lançamentos</h2>
                        <ul>
                            <?php 
                            $busca = $conexao->query("SELECT produto.cd_produto, produto.nm_produto FROM produto WHERE nm_status_produto = 'Ativo' LIMIT 5;");
                            while($info = $busca->fetch_assoc()){
                                echo "<li><a href='det_produto.php?cd=".$info['cd_produto']."'>".$info['nm_produto']."</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                            <!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="blank" id="formPgmt"-->
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Produto</th>
                                            <th class="product-price">Preço</th>
                                            <th class="product-quantity">Quantidade</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
require_once('conexao.php');
$busca = $conexao->query("
    SELECT * FROM login
    JOIN carrinho on login.cd_login = carrinho.cd_login
    JOIN item on carrinho.cd_carrinho = item.cd_carrinho
    JOIN produto on item.cd_produto = produto.cd_produto
    JOIN imagem ON produto.cd_imagem=imagem.cd_imagem 
    WHERE login.cd_login = $cd_login
    AND carrinho.nm_status_carrinho = 'Ativo'
    ");
    $total = 0;
    while($info = $busca->fetch_assoc()){
        echo "

                                        <tr class='cart_item'>
                                            <td class='product-remove'>
                                                <a onclick='excluirItem(".$info['cd_carrinho'].",".$info['cd_item'].")' title='Remove this item' class='remove'>×</a> 
                                            </td>

                                            <td class='product-thumbnail'>
                                                <a href='det_produto.php?cd=".$info['cd_produto']."'><img width='145' height='145' alt='poster_1_up' class='shop_thumbnail' src='/_imagem/".$info['nm_imagem']."'></a>
                                            </td>

                                            <td class='product-name'>
                                                <a href='det_produto.php?cd=".$info['cd_produto']."'>".$info['nm_produto']."</a> 
                                            </td>

                                            <td class='product-price'>
                                                <span class='amount'>R$ ".$info['vl_produto']."</span> 
                                            </td>

                                            <td class='product-quantity'>
                                                ".$info['qt_item']."
                                            </td>

                                            <td class='product-subtotal'>
                                                <span class='amount'>R$ ".$info['vl_produto']*$info['qt_item']."</span> 
                                            </td>
                                        </tr>
                                        ";
                                        $total += $info['vl_produto']*$info['qt_item'];
                                    }
                                        //linha do item
                                        ?>
                                    </tbody>
                                </table>
                                <input type="hidden" name="total" value= <?php echo $total; ?> >
                            </form>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Total no Carrinho</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount" id="subTotal"><?php echo "R$ ".$total;?></span></td>
                                        </tr>

                                        <?php if (isset($_REQUEST["calc_shipping"])) {                                    
//https://sounoob.com.br/consultar-frete-utilizando-webservice-dos-correios-php/
 $data['nCdEmpresa'] = '';
 $data['sDsSenha'] = '';
 $data['sCepOrigem'] = '11700170';
// $data['sCepDestino'] = '11701190';
 $data['sCepDestino'] = $_REQUEST["calc_shipping_postcode"];
 $data['nVlPeso'] = '1';
 $data['nCdFormato'] = '1';
 $data['nVlComprimento'] = '16';
 $data['nVlAltura'] = '5';
 $data['nVlLargura'] = '15';
 $data['nVlDiametro'] = '0';
 $data['sCdMaoPropria'] = 'n';
 $data['nVlValorDeclarado'] = '300';
 $data['sCdAvisoRecebimento'] = 'n';
 $data['StrRetorno'] = 'xml';
 
 //$data['nCdServico'] = '40010';
 $data['nCdServico'] = '40010';
 //$data['nCdServico'] = '40010,40045,40215,41106';
/* 40010 SEDEX Varejo. 40045 SEDEX a Cobrar Varejo. 40215 SEDEX 10 Varejo. 41106 PAC Varejo.*/

 $data = http_build_query($data);

 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

 $curl = curl_init($url . '?' . $data);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($curl);
 $result = simplexml_load_string($result);
 foreach($result -> cServico as $row) {
 //Os dados de cada serviço estará aqui
 if($row -> Erro == 0) {
     //echo $row -> Codigo . '<br>';
     //echo $row -> Valor . '<br>';     
    $frete = $row -> Valor . '<br>';
     /*echo "Prazo ".$row -> PrazoEntrega . '<br>';
     echo $row -> ValorMaoPropria . '<br>';
     echo $row -> ValorAvisoRecebimento . '<br>';
     echo $row -> ValorValorDeclarado . '<br>';
     echo $row -> EntregaDomiciliar . '<br>';
     echo $row -> EntregaSabado;*/
 } else {
     echo "Erro ".$row -> MsgErro;
 }
 echo '<hr>';
 }
}
?>

                                        <tr class="shipping">
                                            <th>Frete</th>
                                            <!--td>Gratuito</td-->                                            
                                            <td id="frete"><?php if(isset($frete)) echo "R$ ".$frete = str_replace(',', '.', $frete); else echo "À Calcular"; ?></td>
                                            
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total de pedidos</th>
                                            <td><strong><span class="amount"><?php if(!isset($frete)) echo "À Calcular"; else echo "R$ ".($total + $frete);?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                                <button type="submit" onclick="finalizarCompra(<?php echo $cd_login.",".$total ?>)" >Finalizar Compra</button>
                            </div>


                            <form method="post" action="#" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calcular Frete</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="CEP" value="" class="input-text"></p>

                                <p><button class="button" value="1" name="calc_shipping" type="submit">Atualizar</button></p>

                                </section>

                            </form>
                            <script type="text/javascript">	
                                new InputMask({
                                    inputs : {
                        				'#calc_shipping_postcode' : {
                                            mask : '_____-___',
                                            strict : true,
                                            pattern : '[0-9]'
                                        }
                                    },
                                    mask_symbol : '_' // when underscore is used we can actually omit this parameter
                                });
                            </script>	


                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <div><?php require_once('footer.html') ?></div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>