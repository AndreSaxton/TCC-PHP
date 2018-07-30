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
  			if (dialog) {
  				let senha = document.getElementById('senha').value;
  				let senha2 = document.getElementById('senha2').value;
  				if (senha!=senha2){
  					alert("Confirmação de senha invalida!");
  					document.getElementById('senha').focus();
  					return false;
  				}  					
  			}
  			else
  				return false;
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
                        <h2>Recuperação de Conta</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div style="width: 100%; text-align: center; margin: 50px;">
		<div id="recuperacao" style="display: inline-block;">
			
				<?php
				if(!isset($_REQUEST['hash'])){
					echo "
					<form>
					<table>
					<tr>
						<td><label for='email'>Insira seu Email:</label></td>
						<td><input type='email' name='nmEmail' required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td colspan='2'><button name='btn'>Enviar</button></td></tr>
					</table>
					</form>
					";
				}
				if(isset($_REQUEST['hash'])){
					require_once('conexao.php');
					$hash = $_REQUEST['hash'];					
					$busca = $conexao->query("SELECT * FROM recuperacaosenha WHERE cd_confirmacao ='".$hash."'");
					/* 
                    $busca = $conexao->query("SELECT recuperacaosenha.* FROM recuperacaosenha JOIN login ON login.cd_login = recuperacaosenha.cd_login WHERE cd_confirmacao ='".$hash."'");
					while($info=$busca->fetch_assoc()){
					    echo $nome = $info['nm_login'];
					}*/
					if ($busca->fetch_assoc()) {
						echo "
						<form onsubmit='return editarCadastro()' method='POST'>
						<table>
						<tr>
							<td><Insira a nova senha:</td>
							<td>$nome</td>
						</tr>
						<tr>
							<td><label for='senha'>Insira a nova senha:</label></td>
							<td><input type='password' name='nmSenha' id='senha' required></td>
						</tr>
						<tr>
							<td><label for='senha2'>Confirme a senha:</label></td>
							<td><input type='password' name='nmSenha2' id='senha2' required></td>
						</tr>
						<tr><td><br></td></tr>
						<tr><td colspan='2'><button name='btn2'>Enviar</button></td></tr>					
						</table>
						</form>					
						";
					}
					else
						echo "Link não encontrado.<br>Tente novamente ou entre em contato via email!";
				}
				?>

				

				<?php
		if(isset($_REQUEST['btn'])){
			$email = $_REQUEST['nmEmail'];
			require_once('conexao.php');
			$busca = $conexao->query("SELECT * FROM login JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa WHERE pessoa.nm_email_pessoa='".$email."' AND pessoa.nm_status_pessoa = 'Ativo' AND login.nm_status_login = 'Ativo'");

			if (!$busca->fetch_assoc()) {
				//echo "Email não cadastrado!";
				echo "<script>alert('Email não cadastrado!');</script>";
			}
			else{
				//echo "Enviamos para o email cadastrado, o link para a recuperação de sua conta.";
				//echo "<script>alert('Verifique o email cadastrado\n para prosseguir!');</script>";
				require_once("email/enviarRecuperacao.php");				
			}
		}

		if(isset($_REQUEST['btn2'])){
			//echo "alterar senha";

			$senha = "";
			$senha = $_POST['nmSenha'];
			//echo $_POST['nmSenha2'];
			
			$hash = $_REQUEST['hash'];
			require_once('conexao.php');
			$busca = $conexao->query("SELECT * FROM recuperacaosenha WHERE cd_confirmacao = '$hash'");
			if ($busca) {
				//echo "achou a hash";				
				while($info = $busca->fetch_assoc()){
			        $cd_login = $info['cd_login'];			        
			        //echo $cd_login;			        
			    }
			    //echo $cd_login;
				$conexao->query("UPDATE login SET nm_senha_login ='$senha' WHERE cd_login = '$cd_login'");
				$conexao->query("DELETE FROM recuperacaosenha WHERE cd_confirmacao = '$hash'");
			}
			//*/

		}
	?>
			
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