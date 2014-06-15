<?php
	$host = 'mysql04.alab.org.br';
	$user = 'alab13';
	$pass = "al441301";
	$db = 'alab13';

	$conexao = mysql_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!". mysql_error());
	mysql_select_db($db);
	
?>
