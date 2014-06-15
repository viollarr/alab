<?php
class ctrl_simposio extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "simposio";
	}

	function listar(){
		
		$sql = "SELECT * FROM ev_".$this->tabela." WHERE id_evento='".$this->id_evento."' ";
		$result = mysql_query($sql);
		$simposios = array();
		while($linha = mysql_fetch_array($result)){
			array_push($simposios, $linha);			
		} //while
		$GLOBALS["simposios"] = $simposios;

		/* Pegar Tуpicos */
		$sql_topicos = "SELECT * FROM ev_topico_simposio ORDER BY nome ASC";
		$result_topicos = mysql_query($sql_topicos) or trigger_error(mysql_error(), E_USER_ERROR);
		$topicos = array();
		while($linha = mysql_fetch_array($result_topicos)){
			array_push($topicos, $linha);
		} //while
		$GLOBALS["topicos"] = $topicos;
		
		return "simposios";
	}

	function listar_resumos(){
	
		$id_simposio = addslashes( (int) $_GET["id_simposio"] );
		
		/* Resumos do Simpуsio */
		$sql = "SELECT * FROM ev_resumo WHERE id_simposio='".$id_simposio."'";
		$result = mysql_query($sql);
		$registros = array();
		while($registro = mysql_fetch_array($result)){
			array_push($registros, $registro);
		}
		$GLOBALS["resumos_simposio"] = $registros;

		/* Simpуsio */
		$sql_simp = "SELECT * FROM ev_simposio WHERE id='".$id_simposio."'";
		$result_simp = mysql_query($sql_simp);
		$simposios = array();
		while($registro = mysql_fetch_array($result_simp)){
			array_push($simposios, $registro);
		}
		$GLOBALS["simposio"] = $simposios[0];
		
		return "resumos_simposio";
	}

	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );
		if(!empty($id)){
			$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$simposios = array();
			while($linha = mysql_fetch_array($result)){
				array_push($simposios, $linha);
			} //while
	
			$GLOBALS["simposio"] = $simposios[0];
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}
		
		/* Pegar Tуpicos */
		$sql_topicos = "SELECT * FROM ev_topico_simposio ORDER BY nome ASC";
		$result_topicos = mysql_query($sql_topicos) or trigger_error(mysql_error(), E_USER_ERROR);
		$topicos = array();
		while($linha = mysql_fetch_array($result_topicos)){
			array_push($topicos, $linha);
		} //while
		$GLOBALS["topicos"] = $topicos;
		
		/* Pegar Participantes */
		$sql_participantes = "SELECT ev.id, us.name, us.email FROM ev_participante ev, jos_users us 
			WHERE ev.id_evento='".$this->id_evento."' AND (us.titulacao_academica='Doutor' OR us.titulacao_academica='Doutorando') AND ev.id_associado_alab = us.id  ORDER BY us.name ASC"; // Doutores ou Doutorandos
		$result_participantes = mysql_query($sql_participantes) or trigger_error(mysql_error(), E_USER_ERROR);
		$participantes = array();
		while($linha = mysql_fetch_array($result_participantes)){
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;
		
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		return "simposio";
	}

	function salvar_edicao(){
		require_once("funcoes/special_ucwords.php");
	
		$id            = addslashes((int) $_POST["id"]);
		$id_topico     = addslashes((int) $_POST["id_topico"]);
		$titulo_sessao = special_ucwords($_POST["titulo_sessao"]);
		$resumo_sessao = addslashes($_POST["resumo_sessao"]);
		$palavras_chave_sessao = addslashes($_POST["palavras_chave_sessao"]);
		$debatedor     = addslashes($_POST["debatedor"]);
		$dia           = addslashes($_POST["dia"]);
		$horario       = addslashes($_POST["horario"]);
		$local         = addslashes($_POST["local"]);
		$id_participante_debatedor   = (int)($_POST["id_participante_debatedor"]);
		$id_participante_debatedor_2 = (int)($_POST["id_participante_debatedor_2"]);

		$ids_coordenadores = array();
		$ids_coordenadores = $_POST["ids_coordenadores"];

		/* Ediзгo */
		if(!empty($id)){
			$sql = "UPDATE ev_".$this->tabela."
				SET
				id_topico = '".$id_topico."',
				titulo_sessao = '".$titulo_sessao."',
				resumo_sessao = '".$resumo_sessao."',
				palavras_chave_sessao = '".$palavras_chave_sessao."',
				debatedor = '".$debatedor."',
				dia = '".$dia."',
				horario = '".$horario."',
				local = '".$local."',
				id_participante_debatedor   = '".$id_participante_debatedor."',
				id_participante_debatedor_2 = '".$id_participante_debatedor_2."'
					
				WHERE id='".$id."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		}/* Inserзгo */
		else{
			$sql = "INSERT INTO ev_".$this->tabela."(id_evento, id_topico, dia, horario, local, id_participante_debatedor, id_participante_debatedor_2) 
				VALUES('".$this->id_evento."', '".$id_topico."', '".$dia."', '".$horario."', '".$local."', '".$id_participante_debatedor."', '".$id_participante_debatedor_2."')";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$id = mysql_insert_id();
		}
		

		/* Salvando a associativa ev_simposio_coordenador */
		if($result){
			mysql_query("DELETE FROM ev_simposio_coordenador WHERE id_simposio='".$id."' ");
			
			$ordem = 0;
			if(!empty($ids_coordenadores)){
				foreach($ids_coordenadores as $id_coordenador){
					if(!empty($id_coordenador)){
						$sql = "";
						$sql = "INSERT INTO ev_simposio_coordenador(id_simposio, id_participante, ordem) VALUES('".$id."', '".$id_coordenador."', '".++$ordem."')";
						mysql_query($sql);
					}//if
				}//foreach
			}//if
		}//if

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes( (int) $_GET["id"] );
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."'";
		$result = mysql_query($sql);
		
		if($result){
			$arr_sql = array();
			array_push($arr_sql, "DELETE FROM ev_resumo WHERE id_simposio='".$id."'");
			array_push($arr_sql, "DELETE FROM ev_simposio_coordenador WHERE id_simposio='".$id."'");
			
			foreach($arr_sql as $sql) mysql_query($sql);
			
			$GLOBALS["msg_tela"] = "Simp&oacute;sio deletado com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possнvel deletar o Simp&oacute;sio.";
		}
		return "mensagem";
	}
}
?>