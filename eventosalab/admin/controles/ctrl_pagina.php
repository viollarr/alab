<?php

class ctrl_pagina extends ctrl_generico {

	function __construct() {
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "jos_content";
		require_once("conexao.php");
	}
	
	public function listar() {	
		$query = mysql_query("SELECT id, title as titulo
							  FROM {$this->tabela} 
							  WHERE catid = {$this->id_evento} 
							  ORDER BY titulo ASC");
		$rs = array();
		while ($linha = mysql_fetch_array($query))
			$rs[] = $linha;

		$GLOBALS["registros"] = $rs;		
		return "paginas";
	}
	
	public function abrir_edicao() {
		$id = addslashes((int) $_GET["id"]);
		
		if ($id) {
			$query = mysql_query("SELECT id, title as titulo, introtext as conteudo 
								  FROM {$this->tabela} 
								  WHERE id = $id 
								  ORDER BY titulo ASC");		
			$pagina = mysql_fetch_array($query);
			
			$query = mysql_query("SELECT value 
								  FROM jos_jf_content 
								  WHERE reference_id = $id AND reference_table = 'content' AND reference_field = 'title'");
			$pagina["titulo_en"] = mysql_result($query, 0); 
			
			$query = mysql_query("SELECT value 
								  FROM jos_jf_content 
								  WHERE reference_id = $id AND reference_table = 'content' AND reference_field = 'introtext'");
			$pagina["conteudo_en"] = mysql_result($query, 0);
			
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
			
			$GLOBALS["pagina"] = $pagina;
		} else {
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}
		
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;	
		
		return "pagina";
	}
	
	function salvar_edicao() {
		$id = $_POST["id"];
		$titulo = addslashes($_POST["titulo"]);
		$titulo_en = addslashes($_POST["titulo_en"]);
		$conteudo = addslashes($_POST["conteudo"]);
		$conteudo_en = addslashes($_POST["conteudo_en"]);
		
		if ($id) { //atualização
			$result[] = mysql_query("UPDATE {$this->tabela}
									 SET title = '$titulo', introtext = '$conteudo'
									 WHERE id = $id");
			
			$result[] = mysql_query("UPDATE jos_jf_content
									 SET value = '$titulo_en'
									 WHERE reference_id = $id AND reference_table = 'content' AND reference_field = 'title'");
			
			$result[] = mysql_query("UPDATE jos_jf_content
									 SET value = '$conteudo_en'
									 WHERE reference_id = $id AND reference_table = 'content' AND reference_field = 'introtext'");
		} else { // inserção
			$result[] = mysql_query("INSERT INTO {$this->tabela}(title, introtext, sectionid, catid, state, created_by) VALUES('$titulo', '$conteudo', 4, {$this->id_evento}, 1, 62)");
			$id = mysql_insert_id();
			$result[] = mysql_query("INSERT INTO jos_jf_content(language_id, reference_id, reference_table, reference_field, value, original_value, published) VALUES(1, $id, 'content', 'title', '$titulo_en', MD5('$titulo'), 1)");
			$result[] = mysql_query("INSERT INTO jos_jf_content(language_id, reference_id, reference_table, reference_field, value, original_value, published) VALUES(1, $id, 'content', 'introtext', '$conteudo_en', MD5('$conteudo'), 1)");
		}
		
		if (!in_array(false, $result)) 
			$GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else 
			$GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		
		return "mensagem";
	}

}