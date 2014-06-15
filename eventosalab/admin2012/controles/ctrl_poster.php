<?php
class ctrl_poster extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
	}

	public function listar(){

		$sql = "SELECT * FROM ev_resumo WHERE id_tipo_trabalho='4' AND id_evento='".$this->id_evento."' ORDER BY titulo ASC";
		
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["registros"] = $registros;
		
		return "posteres";
	}

	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );

		/* Pôster */
		$sql = "SELECT * FROM ev_resumo WHERE id='".$id."' AND id_tipo_trabalho=4 LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		$GLOBALS["poster"] = $registros[0];
		
		/* Participantes */
		$sql_participantes = "SELECT ev.id, us.name, us.email FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
		$result_participantes = mysql_query($sql_participantes) or trigger_error(mysql_error(), E_USER_ERROR);
		$participantes = array();
		while($linha = mysql_fetch_array($result_participantes)){
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;
		
		/* Linhas Temáticas */
		$sql_linhas = "SELECT id, titulo FROM ev_linha_tematica WHERE id_evento='".$this->id_evento."' ORDER BY titulo ASC";
		$result_linhas = mysql_query($sql_linhas) or trigger_error(mysql_error(), E_USER_ERROR);
		$linhas_tematicas = array();
		while($linha = mysql_fetch_array($result_linhas)){
			array_push($linhas_tematicas, $linha);
		} //while
		$GLOBALS["linhas_tematicas"] = $linhas_tematicas;
		
		return "poster";
	}

	function salvar_edicao(){
		require_once("funcoes/special_ucwords.php");
	
		$id = $_POST["id"];
		$id_linha_tematica = $_POST["id_linha_tematica"];
		$titulo     = special_ucwords($_POST["titulo"]);
		$resumo     = $_POST["resumo"];
		$palavras_chave = addslashes($_POST["palavras_chave"]);
		$autor      = addslashes($_POST["autor"]);
		$co_autor   = addslashes($_POST["co_autor"]);
		$dia        = addslashes($_POST["dia"]);
		$horario    = addslashes($_POST["horario"]);
		$local      = addslashes($_POST["local"]);

		$sql = "UPDATE ev_resumo
			SET
			id_linha_tematica = '".$id_linha_tematica."',
			titulo = '".$titulo."',
			resumo = '".$resumo."',
			palavras_chave = '".$palavras_chave."',
			autor = '".$autor."',
			co_autor = '".$co_autor."',
			dia = '".$dia."',
			horario = '".$horario."',
			local = '".$local."'
				
			WHERE 
				id='".$id."' 
				AND id_tipo_trabalho=4";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){
		$id = addslashes( (int) $_GET["id"] );
		$sql = "DELETE FROM ev_resumo WHERE id='".$id."' AND id_tipo_trabalho=4";
		$result = mysql_query($sql);
		
		if($result){
			$GLOBALS["msg_tela"] = "P&ocirc;ster deletado com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar o P&ocirc;ster.";
		}
		return "mensagem";
	}
}
?>