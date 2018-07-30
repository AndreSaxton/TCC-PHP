<?php
session_start();
require_once('conexao.php');
$cd_produto = $_REQUEST['cd'];

$busca = $conexao->query("
    SELECT * FROM produto JOIN imagem ON imagem.cd_imagem=produto.cd_imagem WHERE cd_produto =".$cd_produto.";");
while($info = $busca->fetch_assoc()){
    $nome = $info['nm_produto'];
    $valor = $info['vl_produto'];
    $descricao = $info['ds_produto'];
    $qtMaxima =  $info['qt_estoque_produto'];
    $imagem = $info['nm_imagem'];
}

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
        function adicionarCarrinho(cd_produto, qt_produto,cd_login){
            if (cd_login) {
                if(qt_produto > 0 && qt_produto<=document.getElementById('qt_comprada').max)
                    location.href = "_php/incluirNoCarrinho.php?cd_produto="+cd_produto+"&qt_produto="+qt_produto;
                else{
                    if(qt_produto<=0)
                        alert("Alerta!\nNão é possivel comprar 0 ou menos produtos");
                    if(qt_produto>document.getElementById('qt_comprada').max)
                        alert("Alerta!\nNão é possivel comprar acima do que há no estoque");
                    //alert("Alerta!\nNão é possivel adiciconar este produto no Carrinho.\nSelecione a quantidade que deseja comprar!");
                }
            }
            else
                alert("Por favor, faça o login antes de continuar!");                                    
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
  </head>
  <body>
   
    <div><?php require_once('cabecalho.php') ?></div>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Detalhes do Produto</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Pesquisar</h2>
                        <form action="#">
                            <input type="text" placeholder="Pesquisar...">
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
                        <div class="product-breadcroumb">
                            <a href="">Inicio</a>                            
                            <a href=""><?php echo $nome;?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <?php echo "<img src='/_imagem/".$imagem."' alt=''>";?>
                                    </div>                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $nome?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo$valor?></ins>
                                    </div>    
                                    
                                    <div class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1" max=<?php echo $qtMaxima; ?> id='qt_comprada'>
                                        </div>
                                        <?php echo "
                                        <button class='add_to_cart_button' type='button' onclick='adicionarCarrinho($cd_produto ,qt_comprada.value,$cd_login)'>Adicionar ao Carrinho</button>
                                        ";
                                        ?>
                                        
                                    </div>   <br>
                                                                        
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descrição do Produto</h2>  
                                                <p><?php echo $descricao?></p>
                                            </div>                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <!--div class="related-products-wrapper">
                            <h2 class="related-products-title">Produtos Relacionados</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>                            
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>                            
                                </div>                                    
                            </div>
                        </div-->
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
  </body>
</html>