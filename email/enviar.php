<?php

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "atendimento@tomodachi.xyz";
    //$to = "andre_saxton@hotmail.com";
    $to = $nm_email_pessoa;
    $subject = "Tomodachi - Criação de Conta";
    $message = "Obrigado por se cadastrar em nosso site!\n\n\nAtt:Tomodachi";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Cadastro realizado com sucesso!";
?>