<?php

echo "<br>" . $_FILES["photo"]["name"];
$teste = $_FILES["photo"]["name"];
$teste1 = pathinfo($teste);
echo "<br>".$teste1['extension'];


require_once('C:\xampp\htdocs\php estoque\conexao.php'); //chama o arquivo de conexão com o banco       
$consulta = "UPDATE `produto` SET `im_produto`= '$teste'";
$conexao->query($consulta);

?>