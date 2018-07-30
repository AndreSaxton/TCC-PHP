<?php
session_start();
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
   
    <div><?php require_once('cabecalho.php') ?></div>
    
     <!-- End mainmenu area -->
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/mem_king_gb.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Memoria Kingston <span class="primary">4 <strong>GB</strong></span>
							</h2>
							<h4 class="caption subtitle"> </h4>

							<a class="caption button-radius" href="#"><span class="icon"></span>Comprar agora </a>
						</div>
					</li>
					<li><img src="img/pc_gamer_pichau_horus.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								PC GAMER <span class="primary">  <strong></strong></span>
							</h2>
							<h4 class="caption subtitle">Ideal para jogos de alta qualidade</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Comprar agora</a>
						</div>
					</li>
					<li><img src="img/teclado_mouse_redragon.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								RAZER <span class="primary"> <strong>TECLADO GAMER</strong></span>
							</h2>
							<h4 class="caption subtitle">   </h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Comprar agora</a>
						</div>
					</li>
					<li><img src="img/mouse_razer.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								RAZER <span class="primary"><strong>MOUSE GAMER</strong></span>
							</h2>
							<h4 class="caption subtitle"> </h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Comprar agora</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <!--div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Dias p/ Devolução</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Frete</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Site Seguro</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Novidades</p>
                    </div>
                </div>
            </div>
        </div>
    </div--> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Mais Procurados</h2>
                        <div class="product-carousel">
                        	<?php
                        	require_once('conexao.php');
                        	$busca = $conexao->query("SELECT * FROM PRODUTO JOIN imagem ON imagem.cd_imagem=produto.cd_imagem WHERE nm_status_produto = 'Ativo';");						    
						    while($info = $busca->fetch_assoc()){
						    	echo "
						    	<div class='single-product'>
                                <div class='product-f-image'>
                                    <img src='img/mouse_razer1.png' alt=''>
                                    <div class='product-hover'>
                                        <a href='#' class='add-to-cart-link'><i class='fa fa-shopping-cart'></i> Comprar</a>
                                        <a href='det_produto.html' class='view-details-link'><i class='fa fa-link'></i> Detalhes</a>
                                    </div>
                                </div>
                                
                                <h2><a href='det_produto.html'>Tomodachi</a></h2>

                                <div class='product-carousel-price'>
                                    <ins>R$00.00</ins>
                                </div>                            
                            </div>    
                            ";
						    }
                        	?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <!--div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div--> <!-- End brands area -->

    <div class="product-big-title-destaques">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title-destaques text-center">
                        <h2>DESTAQUES</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"> </h2>
                        <!--a href="" class="wid-view-more">Ver Agora</a-->
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">  </h2>
                        <!--a href="#" class="wid-view-more">Ver Agora</a-->
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">  </h2>
                        <!--a href="#" class="wid-view-more">Ver Agora</a-->
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="det_produto.html"><img src="img/monitor1.png" alt="" class="product-thumb"></a>
                            <h2><a href="det_produto.html">Monitor</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>R$200.00</ins> <del>R$100.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
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