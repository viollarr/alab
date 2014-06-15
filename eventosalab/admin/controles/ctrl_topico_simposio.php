<?php
class ctrl_topico_simposio extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_topico_simposio";
	}

	function listar(){
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["topicos"] = $registros;

		return "topicos_simposios";
	}
	
	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );
		if(!empty($id)){ /* Ediзгo */
			$sql = "SELECT * FROM ".$this->tabela." WHERE id='".$id."' LIMIT 1";
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

		$GLOBALS["topico"] = $registros[0];
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		return "topico_simposio";
	}

	function salvar_edicao(){
	
		$id = addslashes((int) $_POST["id"]);
        $nome = addslashes($_POST["nome"]);
		
		if(!empty($id)){
			$sql = "UPDATE ".$this->tabela."
				SET nome = '".$nome."'
				WHERE id='".$id."' ";
		}else{
			$sql = "INSERT INTO ".$this->tabela."(id_evento, nome) VALUES('".$this->id_evento."', '".$nome."')";
		}
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes((int) $_GET["id"]);
		$sql = "DELETE FROM ".$this->tabela." WHERE id='".$id."' LIMIT 1";
		$result = mysql_query($sql);
		
		if($result){
			$sql = "UPDATE ev_simposio SET id_topico=0 WHERE id_topico='".$id."' ";
			$result = mysql_query($sql);
			if($result) $GLOBALS["msg_tela"] = "T&oacute;pico deletado com sucesso.";
			else $GLOBALS["msg_tela"] = "N&atilde;o foi possнvel deletar o T&oacute;pico.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possнvel deletar o T&oacute;pico.";
		}

		return "mensagem";
	}
}
?>