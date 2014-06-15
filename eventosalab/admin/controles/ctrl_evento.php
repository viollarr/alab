<?php
class ctrl_evento extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_evento";
	}
	
	/**
	* Apenas chama a tela que exibe as demais opcões.
	*/
	function outras_opcoes(){
		return "outras_opcoes";
	}
	
	function data_liberacao_cartas(){
		$registros = $this->select("SELECT data_liberacao_cartas FROM ".$this->tabela." WHERE id = '".$this->id_evento."' ");
		$GLOBALS["data_liberacao"] = $registros[0]['data_liberacao_cartas'];
		
		return "data_liberacao_cartas";
	}

	function salvar_data_liberacao(){
		//$id = (int)$_REQUEST["id"];
		$data_liberacao = addslashes($_REQUEST["data_liberacao"]);
		
		if(!empty($data_liberacao)){
			// Formatando a data: Ex.: 31/03/2011 -> 2011-03-31
			$arr_data = explode("/", $data_liberacao);
			$data_liberacao_format = $arr_data["2"] . "-" . $arr_data["1"] . "-" . $arr_data["0"];
			
			$err = 0;
			$atualizado = $this->update("
					UPDATE ".$this->tabela." 
					SET data_liberacao_cartas = '".$data_liberacao_format."'
					WHERE id  = '".$this->id_evento."' 
				");
			if(!$atualizado) $err++;
			
			$GLOBALS["msg_ctrl_avaliacao"] = ($err) ? "N&atilde;o foi poss&iacute;vel salvar a data." : "Data salva com sucesso.";
			return $this->data_liberacao_cartas();
		}
	}

}
?>