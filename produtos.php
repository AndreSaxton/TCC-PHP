<!DOCTYPE html>
<!--
    ustora by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com/ustora/
-->
<html>
  <head>
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
                        <h2>Produtos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

<?php
    require_once('conexao.php');
    $buscaNome = "";
    if (!empty($_REQUEST['busca']))
        $buscaNome = $_REQUEST['busca'];
    //$buscaNome = $_REQUEST['busca'];
    if ($buscaNome!="")
        $busca = $conexao->query("SELECT * FROM produto WHERE nm_status_produto = 'Ativo' 
            AND nm_produto LIKE'%$buscaNome%';");
    else
        $busca = $conexao->query("SELECT * FROM produto JOIN imagem ON imagem.cd_imagem=produto.cd_imagem WHERE nm_status_produto = 'Ativo';");
    
    $contLinha = 1;
    while($info = $busca->fetch_assoc()){
        echo "
        <div class='col-md-3 col-sm-6'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='/_imagem/".$info['nm_imagem']."' alt=''>
                        </div>
                        <h2><a href='det_produto.php?cd=".$info['cd_produto']."'>".$info['nm_produto']."</a></h2>
                        <div class='product-carousel-price'>
                            <ins>".$info['vl_produto']."</ins>
                        </div>  
                        
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' href='det_produto.php?cd=".$info['cd_produto']."'>Ver Produto</a>
                        </div>                       
                    </div>
                </div>
        ";
    }
    ?>
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