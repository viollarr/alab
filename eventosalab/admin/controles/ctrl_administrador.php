<?php

class ctrl_administrador extends ctrl_generico {

	function __construct() {
		require_once("conexao.php");
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_usuarios";
	}
	
	public function listar() {	
		$query = mysql_query("SELECT ID, login
							  FROM {$this->tabela} 
							  WHERE id_evento = {$this->id_evento} 
							  ORDER BY login ASC");
		$rs = array();
		while ($linha = mysql_fetch_array($query))
			$rs[] = $linha;

		$GLOBALS["registros"] = $rs;		
		return "administradores";
	}
	
	public function abrir_edicao() {
		$id = addslashes((int) $_GET["id"]);
		
		if ($id) {
			$query = mysql_query("SELECT * FROM {$this->tabela} WHERE id = $id");		
			$admin = mysql_fetch_array($query);
			
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
			
			$GLOBALS["admin"] = $admin;
		} else {
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}
		
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;	
		
		return "administrador";
	}
	
	function salvar_edicao() {
		$id = $_POST["id"];
		$login = addslashes($_POST["login"]);
		$senha = addslashes($_POST["senha"]);
		
		if ($id) //atualização
			$result = mysql_query("UPDATE {$this->tabela} SET login = '$login', senha = '$senha' WHERE ID = $id");
		else // inserção
			$result = mysql_query("INSERT INTO {$this->tabela} (login, senha, id_evento) VALUES ('$login', '$senha', {$this->id_evento})");
		
		if ($result) 
			$GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else 
			$GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		
		return "mensagem";
	}
	
	function deletar() {
		$id = addslashes( (int) $_GET["id"] );
		$result = mysql_query("DELETE FROM {$this->tabela} WHERE ID = $id");
		
		if ($result)
			$GLOBALS["msg_tela"] = "Administrador deletado com sucesso.";
		else
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar o Administrador.";
		
		return "mensagem";
	}

}