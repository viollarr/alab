<?php
	//$hostname= "localhost";
	$hostname= "mysql04.alab.org.br";
	$database = "alab13"; 
	$username = "alab13"; 
	$password = "al441301";
		
	$conexao = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
	mysql_select_db($database, $conexao);
	
	/*
	function con_select($sql){
		print "conexao (select): ";
		print_r($sql);
		
		$result = mysql_query($sql);
		$retorno = array();
		//while($linha = mysql_fetch_array($result)){
		$i = 0;
		while(list($id, $nome) = mysql_fetch_array($result)){
			//array_push($retorno, $linha);
			$retorno[$i]["id"]   = $id;
			$retorno[$i]["nome"] = $nome;
			$i++;
		}//while
		return $retorno;
	}
	*/
?>
