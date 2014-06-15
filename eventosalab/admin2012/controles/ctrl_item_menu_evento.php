<?php
class ctrl_item_menu_evento extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "item_menu_evento";
		require_once("conexao.php");
	}

	public function listar(){

		$sql = "SELECT * FROM ev_".$this->tabela." WHERE id_evento='".$this->id_evento."' ORDER BY ordem ASC";
		
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["registros"] = $registros;
		
		return "itens_menu_evento";
	}
	
	function abrir_edicao(){
		$id = addslashes( (int) $_GET["id"] );
		
		if(!empty($id)){
			$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
			$itens_menu = array();
			while($linha = mysql_fetch_array($result)){
				array_push($itens_menu, $linha);
			} //while
			
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}

/*		Nao mais utilizado
		/* Pegar os artigos Joomla! deste evento (categoria no Joomla!) 
		$sql = "SELECT id_categ_joomla FROM ev_evento WHERE id='".$this->id_evento."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$evento = array();
		while($linha = mysql_fetch_array($result)){
			array_push($evento, $linha);
		} //while
*/

		$sql = "SELECT id, titulo FROM ev_paginas WHERE id_evento='".$this->id_evento."' ";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$artigos = array();
		while($linha = mysql_fetch_array($result)){
			array_push($artigos, $linha);
		}
		
		$GLOBALS["itens_menu"] = $itens_menu;
		$GLOBALS["artigos"] = $artigos;
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		return "item_menu_evento";
	}

	function salvar_edicao(){
		$id = $_POST["id"];
		$id_artigo = addslashes($_POST["id_artigo"]);
		$texto_botao = addslashes($_POST["texto_botao"]);
		$texto_botao_en = addslashes($_POST["texto_botao_en"]);
		$ordem = addslashes($_POST["ordem"]);

		if(!empty($id)){
			$sql = "UPDATE ev_".$this->tabela."
				SET
				id_artigo = '".$id_artigo."',
				texto_botao = '".$texto_botao."',
				texto_botao_en = '".$texto_botao_en."',
				ordem = '".$ordem."'
					
				WHERE id='".$id."' ";
		}else{
			$sql = "INSERT INTO ev_".$this->tabela."(id_evento, id_artigo, texto_botao, texto_botao_en, ordem) VALUES('".$this->id_evento."', '".$id_artigo."', '".$texto_botao."', '".$texto_botao_en."', '".$ordem."')";
		}
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes( (int) $_GET["id"] );
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."' ";
		$result = mysql_query($sql);
		
		if($result){
			$GLOBALS["msg_tela"] = "Item de Menu deletado com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar o Item de Menu.";
		}
		return "mensagem";
	}
}
?>