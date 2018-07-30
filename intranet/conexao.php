<?php
$conexao = new mysqli('localhost', 'u315593964_andre','F0rn@zieri', 'u315593964_facul'); 
//Variavel = new mysqli("servidor", "usuario", "senha", "banco") or die("Erro ao conectar");
	if (!$conexao)
	{ 
	 	die('problema na conexão');
	}
?>