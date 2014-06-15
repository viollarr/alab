<?php
class ctrl_comunicacao_coordenada extends ctrl_generico{

	function __construct(){
		require_once("conexao.php");
		$this->id_evento = $_SESSION["id_evento_admin"];

		$this->tabela = "comunicacao_coordenada";

		$this->tela_retorno_listar = "comunicacoes_coordenadas";
		$this->where_listar = " WHERE id_evento='".$this->id_evento."' ";
		$this->order_listar = " ORDER BY titulo_sessao ASC ";
	}

	public function listar(){
		$sql = "SELECT id, UPPER(titulo_sessao) AS titulo_sessao FROM ev_comunicacao_coordenada WHERE id_evento='".$this->id_evento."' ORDER BY titulo_sessao ASC";
		
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["lista_comunicacao_coordenada"] = $registros;
		
		return "comunicacoes_coordenadas";
	}


	function listar_resumos(){
		$id = addslashes( (int) $_GET["id"] );
		
		/* Resumos */
		$sql = "SELECT * FROM ev_resumo WHERE id_comunicacao_coordenada='".$id."'";
		$result = mysql_query($sql);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		}
		$GLOBALS["resumos_comunicacao_coordenada"] = $registros;

		/* Comunicaзгo Coordenada */
		$sql_comunicacao = "SELECT * FROM ev_comunicacao_coordenada WHERE id='".$id."'";
		$result_comunicacao = mysql_query($sql_comunicacao);
		$comunicacoes = array();
		while($registro = mysql_fetch_array($result_comunicacao)){
			array_push($comunicacoes, $registro);
		}
		$GLOBALS["comunicacao_coordenada"] = $comunicacoes[0];
		
		return "resumos_comunicacao_coordenada";
	}

	function abrir_edicao(){

		$id = addslashes((int) $_GET["id"]);

		// Comunicaзгo coordenada
		$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		$GLOBALS["registros"] = $registros;
		

		// Participantes
		$sql = "SELECT id, UPPER(nome) AS nome, email FROM ev_participante WHERE id_evento = {$this->id_evento} ORDER BY nome";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$participantes = array();
		while($linha = mysql_fetch_assoc($result)){
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;
		

		// Linhas Temбticas
		$sql = "SELECT * FROM ev_linha_tematica WHERE id_evento = {$this->id_evento} ORDER BY titulo";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$linhas_tematicas = array();
		while($linha = mysql_fetch_assoc($result)){
			array_push($linhas_tematicas, $linha);
		} //while
		$GLOBALS["linhas_tematicas"] = $linhas_tematicas;
		

		return "comunicacao_coordenada";
	}

	function salvar_edicao(){
		$id             = $_POST["id"];
		$id_coordenador = $_POST["id_coordenador"];
		$titulo_sessao  = addslashes($_POST["titulo_sessao"]);
		$resumo_sessao  = addslashes($_POST["resumo_sessao"]);
		$palavras_chave_sessao = addslashes($_POST["palavras_chave_sessao"]);
		$id_linha_tematica = $_POST["id_linha_tematica"];
		$dia               = addslashes($_POST["dia"]);
		$horario           = addslashes($_POST["horario"]);
		$local             = addslashes($_POST["local"]);


		$sql = "UPDATE ev_".$this->tabela."
			SET
			id_coordenador = '".$id_coordenador."',
			titulo_sessao = '".$titulo_sessao."',
			resumo_sessao = '".$resumo_sessao."',
			palavras_chave_sessao = '".$palavras_chave_sessao."',
			id_linha_tematica = '".$id_linha_tematica."',
			dia = '".$dia."',
			horario = '".$horario."',
			local = '".$local."'
				
			WHERE id='".$id."' ";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes( (int) $_GET["id"] );

		// Pegar os resumos desta sessгo coordenada
		$sql = "SELECT id FROM ev_resumo WHERE id_evento = {$this->id_evento} AND id_comunicacao_coordenada = {$id}";
		$resumos = mysql_query($sql);

		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."'";
		$result = mysql_query($sql);
		
		if($result){
			// Apagar a relaзгo de autoria/co-autoria do trabalho (ev_participante_resumo)
			while($resumo = mysql_fetch_assoc($resumos)){
				$sql = "DELETE FROM ev_participante_resumo WHERE id_evento = {$this->id_evento} AND id_resumo = {$resumo['id']} AND tipo_trabalho = 2";
				$result = mysql_query($sql);
			}
	
			$arr_sql = array();
			array_push($arr_sql, "DELETE FROM ev_resumo WHERE id_comunicacao_coordenada='".$id."'");
			
			foreach($arr_sql as $sql) mysql_query($sql);
			
			$GLOBALS["msg_tela"] = "Comunica&ccedil;&atilde;o Coordenada deletada com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possнvel deletar a Comunica&ccedil;&atilde;o Coordenada.";
		}
		return "mensagem";
	}
}
?>