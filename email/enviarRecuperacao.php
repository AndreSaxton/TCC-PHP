<?php
$email = $_REQUEST['nmEmail'];
date_default_timezone_set('America/Sao_Paulo');
$dia = date('Y-m-d');
$hora=date('H:i:s');
$hash = md5($email.$dia.$hora);
//echo $hash;
require_once('conexao.php'); //chama o arquivo de conexão com o banco

$busca = $conexao->query("SELECT * FROM login JOIN pessoa ON login.cd_pessoa = pessoa.cd_pessoa WHERE pessoa.nm_email_pessoa='".$email."' AND pessoa.nm_status_pessoa = 'Ativo' AND login.nm_status_login = 'Ativo'");
while($info = $busca->fetch_assoc()){
    $cd_login = $info['cd_login'];
}
$conexao->query("INSERT INTO recuperacaosenha (`cd_confirmacao`, `cd_login`) VALUES ('$hash',(SELECT cd_login FROM login WHERE cd_login = $cd_login))");
    
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "atendimento@tomodachi.xyz";
    //$to = "andre_saxton@hotmail.com";
    $to = $email;
    $subject = "Tomodachi - Recuperação de Conta";
    $message = "Utilize o link abaixo para prosseguir com a recuperação de sua conta.\nhttp://tomodachi.xyz/recuperarConta.php?hash=$hash";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Favor consultar o seu email.<br>Lhe enviamos por email o link para continuar com a recuperação";
?>