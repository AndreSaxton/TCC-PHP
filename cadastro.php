<?php session_start(); ?>
<!DOCTYPE html>
<!--
    ustora by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com/ustora/
-->
<html>
  <head>
  	<script type="text/javascript">
  		function editarCadastro(){
  			let dialog = confirm("Deseja alterar as informações cadastradas?");
  			if (dialog) {}
  			else
  				return false;
  		}
  		function cadastrar(){
  		    let login = document.getElementById('account_username');
  			let senha = document.getElementById('account_password');
  			let nome = document.getElementById('billing_first_name');
  			let cpf = document.getElementById('billing_document');
  			let endereco = document.getElementById('billing_address_1');
  			let cep = document.getElementById('billing_postcode');
  			let email = document.getElementById('billing_email');
  			let ddd = document.getElementById('billing_ddd');
  			let telefone = document.getElementById('billing_phone');
  			if (login.value==""||login.value==" "
  			||senha.value==""||senha.value==" "
  			||nome.value==""||nome.value==" "
  			||cpf.value==""||cpf.value==" "
  			||endereco.value==""||endereco.value==" "
  			||cep.value==""||cep.value==" "
  			||email.value==""||email.value==" "
  			||ddd.value==""||ddd.value==" "
  			||telefone.value==""||telefone.value==" ") {
  			    alert("favor preencher todos os campos");
  			    if (login.value==""||login.value==" ")
  			        login.focus();
  			    else if (senha.value==""||senha.value==" ")
  			        senha.focus();
  			    else if (nome.value==""||nome.value==" ")
  			        nome.focus();
  			    else if (cpf.value==""||cpf.value==" ")
  			        cpf.focus();
  			    else if (endereco.value==""||endereco.value==" ")
  			        endereco.focus();
  			    else if (cep.value==""||cep.value==" ")
  			        cep.focus();
  			    else if (email.value==""||email.value==" ")
  			        email.focus();
  			    else if (ddd.value==""||ddd.value==" ")
  			        ddd.focus();
  			    else if (telefone.value==""||telefone.value==" ")
  			        telefone.focus();
  			    return false;
  			}
  			
  			else{
  			    /*alert("vai");
  			    return false;*/
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
                        <h2>Cadastro</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right" style="float: right;">
                        <div class="woocommerce">

							<?php
							if($logado)
								echo "<!--";
							?>

                            <div class="woocommerce-info">Ja tem cadastro ? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Clique para fazer o login...</a>
                            </div>

                            <form id="login-form-wrap" class="login collapse" method="post" action="logarCliente.php">


                                <p>Se você já esta cadastrado favor realizar o login. <br>Caso não seja, se cadastre abaixo para continuar  </p>

                                <p class="form-row form-row-first">
                                    <label for="username">Username<span class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="login" class="input-text" required>
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="senha" class="input-text" required>
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="recuperarConta.php">Esqueci minha senha</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                            <?php
							if($logado)
								echo "-->";
							?>                

							<?php
							if($logado){
								$login = $_SESSION['login'];
								$senha = $_SESSION['senha'];
								$consulta = "SELECT login.*, pessoa.* FROM login JOIN setor ON setor.cd_setor = login.cd_setor JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa WHERE login.nm_login = '$login' AND login.nm_senha_login='$senha' AND nm_status_login='Ativo' AND setor.nm_setor = 'Cliente'";
								
								$verifica = $conexao->query($consulta);
								$rows = $verifica->num_rows;
								if($rows > 0){
							        if($rows == 0){ //verifica se a informação chegou
							            echo "falha ao buscar";
										//echo $consulta;
							        }
									else{
										$busca = $conexao->query($consulta);
										while($info = $busca->fetch_assoc()){					
											$login = $info['nm_login'];
											$senha = $info['nm_senha_login'];
											$nome = $info['nm_pessoa'];
											$cep = $info['cd_cep_pessoa'];
											$endereco = $info['nm_endereco_pessoa'];
											$ddd = $info['cd_ddd_pessoa'];
											$telefone = $info['cd_telefone_pessoa'];
											$email = $info['nm_email_pessoa'];
											//$tipoPessoa = $info['nm_pessoa'];
											$documento = $info['cd_documento_pessoa'];
											$documento = substr_replace($documento, ".", 3, 0);
                        					$documento = substr_replace($documento, ".", 7, 0);
                        					$documento = substr_replace($documento, "/", 11, 0);
                        					$telefone = substr_replace($telefone, "-", 4, 0);
                        					$cep = substr_replace($cep, "-", 5, 0);
										}			
									}
								}
							}								
							else{
								$login = "";
								$senha = "";
								$nome = "";
								$cep = "";
								$endereco = "";
								$ddd = "";
								$telefone = "";
								$email = "";
								$tipoPessoa = "";
								$documento = "";
							}
							?>            

                            <form enctype="multipart/form-data" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Dados do Usuário</h3>

                                            <div class="create-account">
                                                <!--p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p-->

                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_username">Login <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" placeholder="Login" id="account_username" name="account_username" class="input-text" value='<?php echo $login;?>' <?php if($logado) echo"readonly";?> >
                                                </p>

                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_password">Senha <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" placeholder="Password" id="account_password" name="account_password" class="input-text" value='<?php echo $login;?>' >
                                                </p>
                                                <div class="clear"></div>
                                            </div>                                            

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Nome <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $nome;?>' placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_document">CPF <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $documento;?>' placeholder="" id="billing_document" name="billing_document" class="input-text " <?php if($logado) echo"readonly";?> >
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Endereço <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $endereco;?>' placeholder="Rua:" id="billing_address_1" name="billing_address_1" class="input-text ">
                                            </p>
                                            
                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">CEP <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $cep;?>' placeholder="CEP" id="billing_postcode" name="billing_postcode" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email  <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $email;?>' placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Telefone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value='<?php echo $ddd;?>' placeholder="" id="billing_ddd" name="billing_ddd" class="input-text " style="width: 20%;">
                                                <input type="text" value='<?php echo $telefone;?>' placeholder="" id="billing_phone" name="billing_phone" class="input-text " style="width: 77%;">
                                            </p>
                                            <div class="clear"></div>

                                            <?php if($logado) echo"<!--"?>
                                            <input type="submit" class="button" value="Cadastrar" name="btnSubmit" onclick="return cadastrar()">
                                            <?php 
                                            if($logado) {
                                            	echo"-->";                                            
                                            	echo"
                                            	<input type='submit' class='button' value='Salvar Alteração' name='btnEdit' onclick='return editarCadastro()'>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
								if (!empty($_REQUEST['btnSubmit'])) {
									require_once('_php/validarCadastroCliente.php');
                                    //echo "<script>alert('Cadastro realizado com sucesso!Verifique a Caixa de Entrada de seu email.')</script>";
								}
								if (!empty($_REQUEST['btnEdit'])) {
									require_once('_php/funcaoEditarCliente.php');
								}							
								?>
                                
                            </form>
                            <script type="text/javascript">	
                                new InputMask({
                                    inputs : {
                                        '#billing_document' : {
                                            mask : '___.___.___/__',
                                            strict : true,
                                            pattern : '[0-9]'
                                        },
                        				'#billing_ddd' : {
                                            mask : '__',
                                            strict : true,
                                            pattern : '[0-9]'
                                        },
                        				'#billing_phone' : {
                                            mask : '____-____',
                                            strict : true,
                                            pattern : '[0-9]'
                                        },
                        				'#billing_postcode' : {
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