<?php
class ctrl_linha_tematica extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "linha_tematica";
	}

	function listar(){
		
		$sql = "SELECT * FROM ev_".$this->tabela." WHERE id_evento='".$this->id_evento."' ORDER BY titulo ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["registros"] = $registros;
		return "linha_tematicas";
	}
	
	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );
		
		if(!empty($id)){ /* Ediзгo */
			$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result)){
				array_push($registros, $linha);
			} //while
			
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{ /* Insersгo */
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}

		$GLOBALS["registros"] = $registros;
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		return "linha_tematica";
	}

	function salvar_edicao(){
	
		$id = addslashes((int) $_POST["id"]);
        $titulo = addslashes($_POST["titulo"]);
		
		if(!empty($id)){
			$sql = "UPDATE ev_".$this->tabela."
				SET titulo = '".$titulo."'
				WHERE id='".$id."' ";
		}else{
			$sql = "INSERT INTO ev_".$this->tabela."(id_evento, titulo) VALUES('".$this->id_evento."', '".$titulo."')";
		}
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes((int) $_GET["id"]);
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."' ";
		$result = mysql_query($sql);
		
		if($result){
			$GLOBALS["msg_tela"] = "Linha Tem&aacute;tica deletada com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possнvel deletar a Linha Tem&aacute;tica.";
		}

		return "mensagem";
	}
}
?>