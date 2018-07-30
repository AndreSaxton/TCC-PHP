<?php
$cd_produto = $_REQUEST['cd_produto'];
$qt_produto = $_REQUEST['qt_produto'];

session_start();
$cd_cliente = $_SESSION['cd_login'];
//$cd_carrinho = 2;//mudar

require_once('../conexao.php');

$busca = $conexao->query("SELECT * FROM `carrinho`
	JOIN login ON login.cd_login = carrinho.cd_login
	WHERE nm_status_carrinho = 'Ativo'
	AND login.cd_login = '$cd_cliente'");

if(mysqli_num_rows($busca)===0){
	echo "Você Nao tem carrinho";
	$conexao->query("INSERT INTO `carrinho`(cd_carrinho, nm_status_carrinho, cd_login) VALUES (null, 'Ativo', (SELECT login.cd_login FROM login WHERE cd_login='$cd_cliente'))");	
	echo "Você agora tem carrinho";
	$cd_carrinho = mysqli_insert_id($conexao);//pega o valor do ultimo auto incremento
}
else{
	echo "Você tem carrinho";
	while($info = $busca->fetch_assoc()){
		$cd_carrinho = $info['cd_carrinho'];
	}
}


$busca = $conexao->query("SELECT * FROM `login`
	JOIN carrinho ON carrinho.cd_login = login.cd_login
	JOIN item on item.cd_carrinho = carrinho.cd_carrinho
	WHERE login.cd_login = '$cd_cliente' AND carrinho.nm_status_carrinho = 'Ativo'");
while($info = $busca->fetch_assoc()){
	$cdItem = $info['cd_item'];
	echo $cdItem;
}//*/
if(mysqli_num_rows($busca)>0){
	echo "ja tem";
	//echo $cdItem;
	$conexao->query("UPDATE `item` SET `qt_item`=$qt_produto WHERE `cd_item`= $cdItem");
}
else{
	echo "nao tem";
	$conexao->query("INSERT INTO `item`(`cd_item`, `cd_carrinho`, `cd_produto`, `qt_item`) VALUES ( null, $cd_carrinho, $cd_produto, $qt_produto)");
}

//$conexao->query("INSERT INTO `item`(`cd_item`, `cd_carrinho`, `cd_produto`, `qt_item`) VALUES ( null, $cd_carrinho, $cd_produto, $qt_produto)");
//INSERT INTO `item`(`cd_item`, `cd_carrinho`, `cd_produto`, `qt_item`) VALUES ( null, 1, 3, 4)



//echo "<br/>".$cd_carrinho;
//echo $cd_cliente;
header('location: ../carrinho.php');
?>