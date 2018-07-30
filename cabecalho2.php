<?php
    $logado = "";
    $sigla = "";
    $cd_login = "";

    /*
$logado = "";
$sigla = "";
$cd_login = "";*/
//session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['cd_login']) == true)){}
else {
    require_once('confirmarLogin.php');
    $logado = $_SESSION['login'];
    $senha = $_SESSION['senha'];
    $cd_login = $_SESSION['cd_login'];                                        
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
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="cadastro.php"><i class="fa fa-user"></i> Minha Conta</a></li>
                            <?php 
                            if(!$logado) 
                                echo "<li><a href='cadastro.php'><i class='fa fa-user'></i> Carrinho</a></li>";
                            else
                                echo "<li><a href='carrinho.php'><i class='fa fa-user'></i> Carrinho</a></li>";
                            ?>                                                        
                            <li><a href="logarCliente.php"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="cadastro.php"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            
                                <?php   
                                    if($logado!="")
                                        echo "<li><a><i class='fa fa-user'></i> $logado</a></li>";
                                    
                                //*/?>                          
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="">TOMODACHI<img src=""></a></h1>

                    </div>
                </div>
                
                <div class="col-sm-6">



                    <div class="shopping-item">
                        <!--a href="carrinho.php">Carrinho<i class="fa fa-shopping-cart"></i></a-->                        
                        <?php 
                            if(!$logado) 
                                echo "<a href='cadastro.php'>Carrinho<i class='fa fa-shopping-cart'></i></a>";
                            else
                                echo "<a href='carrinho.php'>Carrinho<i class='fa fa-shopping-cart'></i></a>";
                                
                        ?>
                    </div>

                    <!-- TESTANDO PESQUISAR -->
                    <!--div class="buscar-item">
                    <form action="" class="navbar-form pull-right">
                    <input type="text" class="span2">
                    <button class="btn btn-inverse">Buscar</button>
                   </form>
                    </div -->

                    <div class="single-sidebar-index">
                        <!--h2 class="sidebar-title">Pesquisar</h2-->
                        <form action="produtos.php?busca=busca.value">
                            <input name="busca" type="text" placeholder="Pesquisar...">
                            <input type="submit" value="Buscar">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                         <!-- Vai valer apenas no clique da descrição -->
                        <!--li><a href="single-product.html">Informações do Produto </a></li-->                        
                        <?php 
                        if(!$logado) 
                            echo "<li><a href='cadastro.php'>Carrinho</a></li>";
                        else
                            echo "<li><a href='carrinho.php'>Carrinho</a></li>";
                        ?> 
                        <li><a href="cadastro.php">Cadastro</a></li>
                        <!--li><a href="#">Categoria</a></li>
                        <li><a href="#">Outros</a></li-->
                        <li><a href="#footer">Contato</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
     <!-- End mainmenu area -->
       
    
  </body>
</html>