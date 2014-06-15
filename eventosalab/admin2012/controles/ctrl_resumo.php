<?php
class ctrl_resumo extends ctrl_generico{

	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_resumo";
	}

	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );
		if(!empty($id)){ /* Edição */
			$sql = "SELECT * FROM ".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result)){
				array_push($registros, $linha);
			} //while
			$GLOBALS["resumo"] = $registros[0];
			
			if ($this->id_evento == 28) {
				$GLOBALS["resumo"]["autor"] = mysql_result(
					mysql_query("SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'autor' AND tipo_trabalho = 2"), 0);
				$query_coautores = mysql_query("SELECT id_participante AS id FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'coautor' AND tipo_trabalho = 2");
				while ($coautor = mysql_fetch_assoc($query_coautores))
					$coautores[] = $coautor["id"];
					
				$GLOBALS["resumo"]["co_autor"] = $coautores; 

				/*
				echo 'ctrl_resumo: <pre>';
					print_r($GLOBALS["resumo"]);
				echo '</pre>';
				/**/
			}
	
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{ /* Insersão */
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		/* Participantes */
		$sql_participantes = "SELECT id, nome, email, id_formacao FROM ev_participante 
			WHERE id_evento='".$this->id_evento."' 
			ORDER BY nome ASC";
		$result_participantes = mysql_query($sql_participantes) or trigger_error(mysql_error(), E_USER_ERROR);
		$participantes = array();
		while($linha = mysql_fetch_array($result_participantes)){
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;

		/* Simpósio */
		$id_simposio = addslashes( (int) $_GET["id_simposio"] );
		if(!empty($id_simposio)){
			$sql = "SELECT id, dia, horario, local FROM ev_simposio WHERE id='".$id_simposio."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			$linha = mysql_fetch_array($result);
			$GLOBALS["sessao"] = $linha;

			return "resumo_simposio";
		}

		/* Comunicação Coordenada */
		$id_comunicacao_coordenada = addslashes( (int) $_GET["id_comunicacao_coordenada"] );
		if(!empty($id_comunicacao_coordenada)){
			$sql = "SELECT id, dia, horario, local FROM ev_comunicacao_coordenada WHERE id='".$id_comunicacao_coordenada."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			$linha = mysql_fetch_array($result);
			$GLOBALS["sessao"] = $linha;

			return "resumo_comunicacao_coordenada";
		}

		//return "resumo";
	}

	function salvar_edicao(){
		require_once("funcoes/special_ucwords.php");
	
		$id       = addslashes((int) $_POST["id"]);
        $titulo   = special_ucwords($_POST["titulo"]);
        $resumo   = addslashes($_POST["resumo"]);
        $palavras_chave = addslashes($_POST["palavras_chave"]);
        $autor    = addslashes((int) $_POST["autor"]);
        $co_autor = $_POST["co_autor"];
		
		/* Simpósio */
		$id_simposio = addslashes( (int) $_POST["id_simposio"] );
		if(!empty($id_simposio)){
			if(!empty($id)){
				$sql = "UPDATE ".$this->tabela."
					SET 
					titulo = '".$titulo."',
					resumo = '".$resumo."',
					palavras_chave = '".$palavras_chave."',
					autor = '".$autor."',
					co_autor = '".$co_autor."'
	
					WHERE id='".$id."' ";
				$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			}else{
				$sql = "INSERT INTO ".$this->tabela."(id_evento, id_simposio, titulo, resumo, palavras_chave, autor, co_autor)
					VALUES('".$this->id_evento."', '".$id_simposio."', '".$titulo."', '".$resumo."', '".$palavras_chave."', '".$autor."', '".$co_autor."' )";
				$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			}
		}else{
			/* Comunicação Coordenada */
			$id_comunicacao_coordenada = addslashes( (int) $_POST["id_comunicacao_coordenada"] );
			// Se for resumo de comunicação coordenada...
			if(!empty($id_comunicacao_coordenada)){
				// Se $id estiver preenchido é para editar o resumo se não, inserir.
				// Editar
				if(!empty($id)){
					// Se for o evento Queering Paradigms (Código editado em 07-10-2011 - Daniel Costa)
					if ($this->id_evento == 28) {
						$sql = "UPDATE ".$this->tabela."
							SET 
							titulo = '".$titulo."',
							resumo = '".$resumo."',
							palavras_chave = '".$palavras_chave."'
			
							WHERE id='".$id."' AND id_tipo_trabalho = 2";
						$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);	
			
						$results[] = mysql_query("UPDATE ev_participante_resumo SET id_participante = {$autor} WHERE id_resumo = {$id} AND tipo_participante = 'autor' AND tipo_trabalho = 2");
						
						$results[] = mysql_query("DELETE FROM ev_participante_resumo WHERE id_resumo = $id AND tipo_participante = 'coautor' AND tipo_trabalho = 2");			
						
						/*
						echo '(ctrl_resumo) Co-autores: <pre>';
							print_r($co_autor);
						echo '</pre>';
						/**/
						
						if( ! empty($co_autor)){
							foreach ($co_autor as $coautor)
								$results[] = mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) VALUES ($id, $coautor, 'coautor', {$this->id_evento}, 2)");
						}
					} else {
						$sql = "UPDATE ".$this->tabela."
							SET 
							titulo = '".$titulo."',
							resumo = '".$resumo."',
							palavras_chave = '".$palavras_chave."',
							autor = '".$autor."',
							co_autor = '".$co_autor."'
			
							WHERE id='".$id."' AND id_tipo_trabalho = 2";
						$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
					}
				}
				// Inserir
				else{
					// Se for o evento Queering Paradigms (Código editado em 07-10-2011 - Daniel Costa)
					if ($this->id_evento == 28) {
						// Inserir o resumo
						$sql = "INSERT INTO ".$this->tabela."(id_evento, id_comunicacao_coordenada, titulo, resumo, palavras_chave, id_tipo_trabalho)
							VALUES('".$this->id_evento."', '".$id_comunicacao_coordenada."', '".$titulo."', '".$resumo."', '".$palavras_chave."', 2)";
						$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						
						// Inserir o autor deste resumo
						$results[] = mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) VALUES ($id, $autor, 'autor', {$this->id_evento}, 2)");
						
						// Inserir os co-autores deste resumo
						if( ! empty($co_autor)){
							foreach ($co_autor as $coautor)
								$results[] = mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) VALUES ($id, $coautor, 'coautor', {$this->id_evento}, 2)");
						}
					}else{
						$sql = "INSERT INTO ".$this->tabela."(id_evento, id_comunicacao_coordenada, titulo, resumo, palavras_chave, autor, co_autor, id_tipo_trabalho)
							VALUES('".$this->id_evento."', '".$id_comunicacao_coordenada."', '".$titulo."', '".$resumo."', '".$palavras_chave."', '".$autor."', '".$co_autor."', 2)";
						$results[] = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
					}
				}
			}//if
		}//else

		$result = !in_array(false, $results);			
		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes((int) $_GET["id"]);
		$sql = "DELETE FROM ".$this->tabela." WHERE id='".$id."' LIMIT 1";
		$result = mysql_query($sql);
		if($result){
			// Apagar a relação de autoria/co-autoria do trabalho (ev_participante_resumo)
			$sql = "DELETE FROM ev_participante_resumo WHERE id_evento = {$this->id_evento} AND id_resumo = {$id} AND tipo_trabalho = 2";
			$result = mysql_query($sql);

			$GLOBALS["msg_tela"] = "Resumo deletado com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "Não foi possível deletar o Resumo.";
		}

		return "mensagem";
	}
}
?>