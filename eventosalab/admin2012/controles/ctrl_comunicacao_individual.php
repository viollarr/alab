<?php
class ctrl_comunicacao_individual extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		require_once("conexao.php");
	}
	
	public function listar(){
		$sql = "SELECT id, UPPER(titulo) AS titulo FROM ev_resumo WHERE id_tipo_trabalho='3' AND id_evento='".$this->id_evento."' ORDER BY titulo ASC";
		
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["registros"] = $registros;
		
		return "comunicacoes_individuais";
	}

	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );

		/* Comunicação Individual */
		$sql = "SELECT * FROM ev_resumo WHERE id='".$id."' AND id_tipo_trabalho=3 LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while ($linha = mysql_fetch_array($result)) {
			array_push($registros, $linha);
		} //while
		$GLOBALS["comunicacao"] = $registros[0];
		
		if ($this->id_evento == 28) {
			$GLOBALS["comunicacao"]["autor"] = mysql_result(
				mysql_query("SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'autor' AND tipo_trabalho = 3"), 0);
			$query_coautores = mysql_query("SELECT id_participante AS id FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'coautor' AND tipo_trabalho = 3");
			while ($coautor = mysql_fetch_assoc($query_coautores))
				$coautores[] = $coautor["id"];
			$GLOBALS["comunicacao"]["co_autor"] = $coautores; 
		}
		
		/* Participantes */
		$sql_participantes = "SELECT id, nome, email FROM ev_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
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
		
		return "comunicacao_individual";
	}

	function salvar_edicao(){
		$id = $_POST["id"];
		$id_linha_tematica = $_POST["id_linha_tematica"];
		$titulo     = addslashes($_POST["titulo"]);
		$resumo     = addslashes($_POST["resumo"]);
		$palavras_chave = addslashes($_POST["palavras_chave"]);
		$autor      = $_POST["autor"];
		$co_autor   = $_POST["co_autor"];
		$dia        = addslashes($_POST["dia"]);
		$horario    = addslashes($_POST["horario"]);
		$local      = addslashes($_POST["local"]);
		
		if ($this->id_evento == 28) {
			$sql = "UPDATE ev_resumo
				SET
				id_linha_tematica = '".$id_linha_tematica."',
				titulo = '".$titulo."',
				resumo = '".$resumo."',
				palavras_chave = '".$palavras_chave."'					
				WHERE id=".$id." AND id_tipo_trabalho = 3";
			$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);	

			$results[] = mysql_query("UPDATE ev_participante_resumo SET id_participante = {$autor} WHERE id_resumo = {$id} AND tipo_participante = 'autor' AND tipo_trabalho = 3");
			
			$results[] = mysql_query("DELETE FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'coautor'");			
			
			/*
			echo '(ctrl_comunicacao_individual) Co-autores: <pre>';
				print_r($co_autor);
			echo '</pre>';
			*/
			
			if( ! empty($co_autor)){
				foreach ($co_autor as $coautor)
					$results[] = mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) VALUES ($id, $coautor, 'coautor', {$this->id_evento}, 3)");
			}
			
			$result = !in_array(false, $results);			
		} else {
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
					
				WHERE id=".$id." AND id_tipo_trabalho=3";
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		}

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){
		$id = addslashes( (int) $_GET["id"] );
		$sql = "DELETE FROM ev_resumo WHERE id='".$id."' AND id_tipo_trabalho=3";
		$result = mysql_query($sql);
		
		if($result){
			// Apagar a relação de autoria/co-autoria do trabalho (ev_participante_resumo)
			$sql = "DELETE FROM ev_participante_resumo WHERE id_evento = {$this->id_evento} AND id_resumo = {$id} AND tipo_trabalho = 3";
			$result = mysql_query($sql);
			
			$GLOBALS["msg_tela"] = "Comunica&ccedil;&atilde;o Individual deletada com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar a Comunica&ccedil;&atilde;o Individual.";
		}
		return "mensagem";
	}
}
?>