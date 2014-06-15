<?php

function conection(){
	
	$host = 'mysql04.alab.org.br';
	$user = 'alab13';
	$pass = 'al441301';
	$db = 'alab13';
	
	$a = mysql_connect($host, $user, $pass);
	mysql_select_db($db);

return $a;

}

function closeConn(){
	
mysql_close();

	
}


?>