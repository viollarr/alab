<?php
class ctrl_generico{
	protected $id_evento;

	protected $tabela;

	protected $sql;
	
	protected $tela_retorno_listar;
	protected $where_listar;
	protected $order_listar;
	protected $from_listar;
	
	protected $tela_retorno_deletar;
	protected $msg_deletar_sucesso;
	protected $msg_deletar_falha;

	public function listar(){
		require_once("conexao.php");
		
		$sql = "SELECT * FROM ev_".$this->tabela;
		$sql .= $this->where_listar;
		$sql .= $this->order_listar;

		$result = mysql_query($sql);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);			
		} //while

		$GLOBALS["lista_".$this->tabela] = $registros;

		return $this->tela_retorno_listar;
	}
	
	/*
	public function deletar($sql){
		require_once("conexao.php");
		
		$id = $_GET["id"];
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."'";
		$result = mysql_query($sql, $conexao);

		if(mysql_affected_rows()) $GLOBALS["msg_tela"] = $this->msg_deletar_sucesso;
		else $GLOBALS["msg_tela"] = $this->msg_deletar_falha;
		return $this->tela_retorno_deletar;
	}
	*/
	
	public function select($sql){
		require("conexao.php");
		
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($registros, $linha);			
		} //while

		return $registros;
	}

	public function insert($sql){
		require("conexao.php");
		
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);

		return (mysql_affected_rows()) ? true : false;
	}
	
	public function update($sql){
		require("conexao.php");
		
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);

		return (mysql_affected_rows()) ? true : false;
	}
	
	public function delete($sql){
		require("conexao.php");
		
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);

		return (mysql_affected_rows()) ? true : false;
	}

	function tratar_nome($string){
		$string = utf8_encode($string);
		
		$variaveis = array(
			"Á"=>"A", 
			"À"=>"A", 
			"Â"=>"A", 
			"Ã"=>"A", 
			"É"=>"E", 
			"È"=>"E", 
			"Ê"=>"E", 
			"Í"=>"I", 
			"Ì"=>"I", 
			"Î"=>"I", 
			"Ó"=>"O", 
			"Ò"=>"O", 
			"Ô"=>"O", 
			"Õ"=>"O", 
			"Ú"=>"U", 
			"Ù"=>"U", 
			"Û"=>"U", 

			"á"=>"a", 
			"à"=>"a", 
			"â"=>"a", 
			"ã"=>"a", 
			"é"=>"e", 
			"è"=>"e", 
			"ê"=>"e", 
			"í"=>"i", 
			"ì"=>"i", 
			"î"=>"i", 
			"ó"=>"o", 
			"ò"=>"o", 
			"ô"=>"o", 
			"õ"=>"o", 
			"ú"=>"u", 
			"ù"=>"u", 
			"û"=>"u", 

			"º"=>"o", 
			"ª"=>"a", 
			"Ç"=>"C", 
			" "=>"_", 
			"-"=>"_", 
			","=>"_", 
	
			"("=>"_", 
			")"=>"_", 
			"["=>"_", 
			"]"=>"_", 
			"{"=>"_", 
			"}"=>"_", 
	
			"!"=>"_", 
			"?"=>"_", 
			"%"=>"_", 
			"&"=>"_", 
			"*"=>"_", 
			"@"=>"_", 
	
			"/"=>"_", 
			"\\"=>"_", 
	
			"ä"=>"_", 
			"ë"=>"_", 
			"ï"=>"_", 
			"ö"=>"_", 
			"ü"=>"_", 
	
			"'"=>"_", 
			"\""=>"_",
			"."=>"_",
			":"=>"_"
		);
		foreach($variaveis as $search => $replace){
			$string = str_replace($search, $replace, $string);
		} //foreach
	
		// Outro exemplo pode ser visto em http://www.revistaphp.com.br/artigo.php?id=14
		
		return $string;
	}// tratar_nome()
	
}
?>