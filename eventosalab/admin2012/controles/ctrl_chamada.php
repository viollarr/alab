<?php
class ctrl_chamada extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "chamada";
		require_once("conexao.php");
	}

	function listar(){
		
		$tipos = array("trabalho", "inscricao");
		if(in_array($_GET["tipo"], $tipos)) $tipo = $_GET["tipo"];
		else $tipo = "";
		
		$where = " WHERE id_evento='".$this->id_evento."' ";
		if(!empty($tipo)) {
			$where .= " AND tipo='".$tipo."' ";
			
			$titulos_views = array("trabalho"=>"Trabalhos", "inscricao"=>"Inscri&ccedil;&otilde;es");
			$GLOBALS["titulo_tipo"] = $titulos_views[$tipo];
		}//if
		$sql = "SELECT * FROM ev_".$this->tabela." ".$where." ORDER BY tipo ASC, ordem ASC";
		
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while

		$GLOBALS["registros"] = $registros;
		return "chamadas";
	}
	
	function abrir_edicao(){
		$id = addslashes( (int) $_GET["id"] );
		
		/* EDITAR */
		if(!empty($id)){ 
			/* Chamada */
			$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
			$chamadas = array();
			while($linha = mysql_fetch_array($result)){
				array_push($chamadas, $linha);
			} //while
			

			/* Precos da chamada */
			$sql = "SELECT * FROM ev_chamada_tipo_participante WHERE id_chamada='".$id."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
			$precos_chamada = array();
			while($linha = mysql_fetch_array($result)){
				$sql_chamada = "SELECT tipo FROM ev_chamada WHERE id='".$linha['id_chamada']."' ";
				$result_chamada = mysql_query($sql_chamada) or trigger_error(mysql_error(),E_USER_ERROR);
				$tipo_chamada = "";
				list($tipo_chamada) = mysql_fetch_row($result_chamada);
				
				(empty($tipo_chamada)) ? $linha["tipo_chamada"] = "" : $linha["tipo_chamada"] = $tipo_chamada;

				array_push($precos_chamada, $linha);
			} //while
			

			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}
		/* INSERIR */
		else{ 
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}

		/* Tipos de participantes (modalidades de inscrição) */
		$sql = "SELECT * FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' AND isento_inscricao='nao'";
		$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
		$tipos_participante = array();
		while($linha = mysql_fetch_array($result)){
			array_push($tipos_participante, $linha);
		} //while

		
		$GLOBALS["chamadas"] = $chamadas;
		$GLOBALS["precos_chamada"] = $precos_chamada;
		$GLOBALS["tipos_participante"] = $tipos_participante;

		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		return "chamada";
	}

	function salvar_edicao(){
		$id = addslashes((int) $_POST["id"]);
        $ordem = addslashes($_POST["ordem"]);
		$data_inicio = addslashes($_POST["data_inicio"]);
		$data_fim = addslashes($_POST["data_fim"]);
		$estado = addslashes($_POST["estado"]);
		$tipo = addslashes($_POST["tipo"]);
		
		/* Formatando as datas */
		$arr_data_ini = explode("/", $data_inicio);
		$data_ini_format = $arr_data_ini[2]."/".$arr_data_ini[1]."/".$arr_data_ini[0];

		$arr_data_fim = explode("/", $data_fim);
		$data_fim_format = $arr_data_fim[2]."/".$arr_data_fim[1]."/".$arr_data_fim[0];

		/* Chamada */
		if(!empty($id)){
			$sql = "UPDATE ev_".$this->tabela."
				SET
					ordem = '".$ordem."',
					data_inicio = '".$data_ini_format."',
					data_fim = '".$data_fim_format."',
					estado = '".$estado."',
					tipo = '".$tipo."'
				WHERE id='".$id."' ";
		}else{
			$sql = "INSERT INTO ev_".$this->tabela."(id_evento, ordem, data_inicio, data_fim, estado, tipo) VALUES('".$this->id_evento."', '".$ordem."', '".$data_ini_format."', '".$data_fim_format."', '".$estado."', '".$tipo."')";
		}
		$result_chamada = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		
		/* Chamada - Tipo Participante */
		if($result_chamada){
			if(!empty($id)){ /* No caso de Edição */
				/* Deletando preços anteriores dessa chamada */
				$sql_ctp = "DELETE FROM ev_chamada_tipo_participante WHERE id_chamada='".$id."'";
				$result_ctp_del = mysql_query($sql_ctp) or trigger_error(mysql_error(), E_USER_ERROR);
			}else{ /* No caso de Inserção */
				$id = mysql_insert_id();
			}//else
				
			/* Cadastrando os preços atualizados */
			$sql_tp = "SELECT * FROM ev_tipo_participante";
			$result_tp = mysql_query($sql_tp);
			while($tipo_participante = mysql_fetch_array($result_tp)){
				$preco = "";
				$preco = addslashes(str_replace(",", ".", $_POST["preco_chamada_tipo_".$tipo_participante["id"]]));
				$preco_reais = addslashes(str_replace(",", ".", $_POST["preco_reais_chamada_tipo_".$tipo_participante["id"]]));
				if(!empty($preco) && !empty($preco_reais)){
					$sql_ins = "INSERT INTO ev_chamada_tipo_participante(id_chamada, id_tipo_participante, preco, preco_reais) 
						VALUES(".$id.", ".$tipo_participante["id"].", ".$preco.", ".$preco_reais.")";
					$result_ctp_ins = mysql_query($sql_ins) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if
				elseif(!empty($preco)){
					$sql_ins = "INSERT INTO ev_chamada_tipo_participante(id_chamada, id_tipo_participante, preco) 
						VALUES(".$id.", ".$tipo_participante["id"].", ".$preco.")";
					$result_ctp_ins = mysql_query($sql_ins) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if
			}//while
		}//if

		if($result_chamada) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){
		$id = addslashes((int) $_GET["id"]);
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."' ";
		$result = mysql_query($sql);
		
		if($result){
			$sql = "DELETE FROM ev_chamada_tipo_participante WHERE id_chamada='".$id."' ";
			$result_associativa = mysql_query($sql);
			if($result_associativa){
				$GLOBALS["msg_tela"] = "Chamada deletada com sucesso.";
			}else{
				$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar a Chamada.";
			}
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar a Chamada.";
		}
		return "mensagem";
	}
}
?>