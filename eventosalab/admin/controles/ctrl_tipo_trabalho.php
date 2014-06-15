<?php
class ctrl_tipo_trabalho extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];

		$this->tabela = "tipo_trabalho";

		//$this->tela_retorno_listar = "tipos_trabalho";
		//$this->order_listar = " ORDER BY id ASC ";
	}

	public function listar_tipos_trabalho(){
		$GLOBALS["tipos_trabalhos_equipe"] = $this->select("SELECT * 
			FROM ev_tipo_trabalho tt, ev_evento_tipo_trabalho ett 
			WHERE ett.id_evento='".$this->id_evento."' AND ett.id_tipo_trabalho = tt.id 
			ORDER BY id ASC ");

		return "tipos_trabalho";
	}
	
	public function incluir_tipo_trabalho_evento(){
		$id_tipo_trabalho = addslashes( (int) $_GET["id_tipo_trabalho"] );
		
		$inserido = $this->insert("INSERT INTO ev_evento_tipo_trabalho(id_evento, id_tipo_trabalho) 
			VALUES('".$this->id_evento."', '".$id_tipo_trabalho."')");
			
		$msg_tela = ($inserido) ? "Inserido com sucesso!" : "Nгo foi possнvel inserir este tipo de trabalho.";
		$GLOBALS["msg_tela"] = $msg_tela;
		return "mensagem";
	}
	
	/**
	* Funзгo que carrega os trabalhos do participante selecionado para exibir a relaзгo de trabalho na quel ele й AUTOR ou CO_AUTOR.
	* Apуs carregar trabalhos salva em um $GLOBALS que serб utilizado pela tela TRABALHOS_PARTICIPANTE.
	*/
	public function trabalhos_participante(){
		$id_participante = addslashes( (int) $_REQUEST["id_participante"] );
	
		$resumos_autor = $resumos_co_autor = array();
		
		if ($this->id_evento == 28) 
		{
			$result = mysql_query("SELECT * FROM ev_resumo WHERE id IN (SELECT id_resumo FROM ev_participante_resumo WHERE id_evento = {$this->id_evento} AND id_participante = $id_participante)");
			$resumos = array();
			while ($resumo = mysql_fetch_array($result))
				$resumos[] = $resumo;			
		}
		else
		{
			// Verifica se й Autor: Pфster, Comunicaзгo Individual, resumo de Comunic. Coordenada e resumo de Simpуsio
			$sql = "SELECT * FROM ev_resumo WHERE autor='".$id_participante."' AND id_evento = '".$this->id_evento."' ";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result)){
				array_push($resumos_autor, $linha);			
			} //while
			
			// Verifica se Co-autor: Pфster, Comunicaзгo Individual, resumo de Comunic. Coordenada e resumo de Simpуsio
			$sql = "SELECT * FROM ev_resumo WHERE co_autor='".$id_participante."' AND id_evento = '".$this->id_evento."' ";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result)){
				array_push($resumos_co_autor, $linha);			
			} //while	
			
			// Juntando os trabalhos das duas categorias (Autor e Co-Autor)
			$resumos = array();
			foreach($resumos_autor as $resumo_autor){
				array_push($resumos, $resumo_autor);
			}//foreach
			foreach($resumos_co_autor as $resumo_co_autor){
				array_push($resumos, $resumo_co_autor);
			}//foreach
		}
		
		$GLOBALS["resumos"] = $resumos;

		// Verifica se й Coordenador de Comunicaзгo Coordenada
		$comunicacoes_coordenadas = array();
		$sql = "SELECT * FROM ev_comunicacao_coordenada WHERE id_coordenador='".$id_participante."' AND id_evento = '".$this->id_evento."' ";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result)){
			array_push($comunicacoes_coordenadas, $linha);
		} //while
		$GLOBALS["comunicacoes_coordenadas"] = $comunicacoes_coordenadas;

		// Verifica se й Coordenador de Simpуsio
		$simposios_coordenados = array();
		$sql = "SELECT *
					FROM ev_simposio_coordenador sc
					INNER JOIN ev_simposio s
					ON sc.id_simposio = s.id
					WHERE sc.id_participante = '".$id_participante."' AND s.id_evento = '".$this->id_evento."' ";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result)){
			array_push($simposios_coordenados, $linha);
		} //while
		$GLOBALS["simposios_coordenados"] = $simposios_coordenados;


		$GLOBALS["id_participante"] = $id_participante;
		return "trabalhos_participante";
	}
}
?>