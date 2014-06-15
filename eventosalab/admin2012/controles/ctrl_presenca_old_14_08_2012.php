<?php
class ctrl_presenca extends ctrl_generico {

	function __construct() {
		$this->id_evento = $_SESSION["id_evento_admin"];
		//$this->tabela = "ev_evento";
		
	}
	
	/**
	* Apenas chama a tela que exibe as demais opcões.
	*/
	function presencas(){
		
		/* Participantes */
		$sql = "SELECT ev.id, us.name FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
		$result = mysql_query($sql)or die(mysql_error());
		$participantes = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Adiciona essa linha de registro na variável que será passada para a TELA
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;
		
		return "presencas";
	}
	
	function presencas_participante(){
		//////////////////////////////////
		// Conexão com o banco de dados //
		//////////////////////////////////
		


		//////////////////////////////////////
		// Classe de avaliação de trabalhos //
		//////////////////////////////////////
		require_once("controles/ctrl_avaliacao.php");
		$ctrl_avaliacao = new ctrl_avaliacao();


		////////////////////////////////////
		// ID do participante selecionado //
		////////////////////////////////////
		$id_participante = (int) $_GET['id'];


		//////////////////
		// PARTICIPANTE //
		//////////////////
		$sql = "SELECT ev.id, us.name, ev.id_tipo_participante FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id = ".$id_participante." AND ev.id_associado_alab = us.id LIMIT 1";
		$result = mysql_query($sql);
		$participante = mysql_fetch_array($result, MYSQL_ASSOC);
		

		///////////////////////////////////
		// COMISSÃO ACADÊMICO-CIENTÍFICA //
		///////////////////////////////////
		// id_tipo_participante: 10
		
		
		///////////////
		// Presenças //
		///////////////
		$presencas = array();
		$sql = "SELECT * FROM ev_presenca WHERE id_evento='".$this->id_evento."' AND id_participante = ".$id_participante." ";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			$presencas[] = $linha;
		}//while
		$participante['presencas'] = $presencas;

		
		//////////////////////////
		// COORDENAÇÃO SIMPÓSIO //
		//////////////////////////
		$simposios_coordenados = array();
		// Pegar simpósios cooordenados por este participante
		$sql = "SELECT s.id, s.titulo_sessao 
				FROM ev_simposio s INNER JOIN ev_simposio_coordenador sc
					ON s.id = sc.id_simposio
				WHERE
					sc.id_participante = ".$id_participante."
					AND s.id_evento = ".$this->id_evento."
				";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			$simposios_coordenados[] = $linha;
		}//while
		$participante['simposios_coordenados'] = $simposios_coordenados;

		
		//////////////////////////
		// TRABALHO EM SIMPÓSIO //
		//////////////////////////
		$trabalhos_em_simposio = array();
		// Pegar trabalhos em simpósio deste participante
		$sql = "SELECT id, titulo 
				FROM ev_resumo 
				WHERE 
					id_evento='".$this->id_evento."' 
					AND (autor = ".$id_participante." OR co_autor = ".$id_participante.")
					AND id_tipo_trabalho = 1
					AND id_simposio > 0
				ORDER BY titulo ASC";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			$trabalhos_em_simposio[] = $linha;
		}//while
		$participante['trabalhos_em_simposio'] = $trabalhos_em_simposio; // array
		

		/////////////////////////////////////////////////
		// COORDENAÇÃO DE SESSÃO [COMUNIC. COORDENADA] //
		/////////////////////////////////////////////////
		$coordenadas = array();
		// Pegar simpósios cooordenados por este participante
		$sql = "SELECT id, titulo_sessao 
				FROM ev_comunicacao_coordenada
				WHERE
					id_coordenador = ".$id_participante."
					AND id_evento = ".$this->id_evento."
				";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			$coordenadas[] = $linha;
		}//while
		$participante['sessoes_coordenadas'] = $coordenadas;
		

		////////////////////////////////////////////
		// APRESENTAÇÃO DE COMUNICAÇÃO INDIVIDUAL //
		////////////////////////////////////////////
		$comunicacoes_individuais = array();
		// Pegar todas comunicações individuais deste participante
		if ($this->id_evento == 28) {
			$sql = "SELECT resumo.id, resumo.titulo 
					FROM ev_resumo resumo, ev_participante_resumo participante_resumo 
					WHERE participante_resumo.id_participante = $id_participante
						AND participante_resumo.id_resumo = resumo.id
						AND resumo.id_tipo_trabalho = 3
					ORDER BY resumo.titulo ASC";
		} else {
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$id_participante." OR co_autor = ".$id_participante.")
						AND id_tipo_trabalho = 3
					ORDER BY titulo ASC";
		}
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Verificar se foram aceitos, e caso SIM,
			// acrescentar no array de pôsteres deste participante
			if($ctrl_avaliacao->aceito($linha['id'], 'comunicacao_individual')){
				//echo "Trabalho Aceito";
				$comunicacoes_individuais[] = $linha;
			}//if
		}//while
		$participante['comunicacoes_individuais'] = $comunicacoes_individuais; // array
		

		////////////////////////////////////////////
		// APRESENTAÇÃO DE COMUNICAÇÃO COORDENADA //
		////////////////////////////////////////////
		$comunicacoes_coordenadas = array();
		// Pegar todos os trabalhos em comunicação coordenada deste participante
		if ($this->id_evento == 28) {
			$sql = "SELECT resumo.id, resumo.titulo
					FROM ev_resumo resumo, ev_participante_resumo participante_resumo
					WHERE participante_resumo.id_participante = $id_participante
						AND participante_resumo.id_resumo = resumo.id
						AND resumo.id_tipo_trabalho = 2
						AND resumo.id_comunicacao_coordenada > 0
					ORDER BY resumo.titulo ASC";
		} else {
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$id_participante." OR co_autor = ".$id_participante.")
						AND id_tipo_trabalho = 2
						AND id_comunicacao_coordenada > 0
					ORDER BY titulo ASC";
		}
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Verificar se foram aceitos, e caso SIM,
			// acrescentar no array de pôsteres deste participante
			if($ctrl_avaliacao->aceito($linha['id'], 'resumo_em_coordenada')){
				//echo "Trabalho Aceito";
				$comunicacoes_coordenadas[] = $linha;
			}//if
		}//while
		$participante['comunicacoes_coordenadas'] = $comunicacoes_coordenadas; // array


		////////////////////////////
		// APRESENTAÇÃO DE PÔSTER //
		////////////////////////////
		$posteres = array();
		// Pegar todos os posteres deste participante
		$sql = "SELECT id, titulo 
				FROM ev_resumo 
				WHERE 
					id_evento='".$this->id_evento."' 
					AND (autor = ".$id_participante." OR co_autor = ".$id_participante.")
					AND id_tipo_trabalho = 4
				ORDER BY titulo ASC";
		$result = mysql_query($sql);
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Verificar se foram aceitos, e caso SIM,
			// acrescentar no array de pôsteres deste participante
			if($ctrl_avaliacao->aceito($linha['id'], 'poster')){
				//echo "Trabalho Aceito";
				$posteres[] = $linha;
			}//if
		}//while
		$participante['posteres'] = $posteres; // array
		

		$GLOBALS["participante"] = $participante;
		return "presencas_participante";
	}
	
	
	function salvar(){
		//////////////////////////////////
		// Conexão com o banco de dados //
		//////////////////////////////////
		


		////////////////////////////////////
		// ID do participante selecionado //
		////////////////////////////////////
		$id_participante = (int) $_POST['id'];
		
		
		// DELETANDO PRESENÇAS ANTERIORES PARA PODER CADASTRAR AS NOVAS.
		$sql = "DELETE FROM ev_presenca WHERE id_participante = '$id_participante' AND id_evento='".$this->id_evento."' ";
		mysql_query($sql);// or die(mysql_error());

	
		// OUVINTE
		if(!empty($_POST['ouvinte'])){
			$ouvinte_presente  = $_POST['ouvinte'];
			$values[] = "('".$this->id_evento."', '$id_participante', '0', 'ouvinte', '$ouvinte_presente')";
		} //if

		// PÔSTERES
		$posteres = $_POST['posteres']; 
		if(is_array($posteres)){
			foreach($posteres as $id_trabalho){
				$presente = addslashes($_POST["poster_" . $id_trabalho]);
				$values[] = "('".$this->id_evento."', '$id_participante', '$id_trabalho', 'poster', '$presente')";
			} //foreach
		} //if
		
		$papers = $_POST['papers']; 
		if(is_array($papers)){
			foreach($papers as $id_trabalho){
				$presente = addslashes($_POST["paper_" . $id_trabalho]);
				$values[] = "('".$this->id_evento."', '$id_participante', '$id_trabalho', 'papers', '$presente')";
			} //foreach
		} //if

		// Concatenando os values para inserir no banco de dados
		$values = implode(", ", $values);

		$sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) VALUES " . $values;
		/*
		print "SQL: <pre>";
			print_r($sql);
		print "</pre>";
		/**/
		
		mysql_query($sql);// or die(mysql_error());
		if(mysql_affected_rows() > 0) $GLOBALS['msg_ctrl_presenca'] = "Presen&ccedil;a(s) cadastrada(s) com sucesso.";
		else $GLOBALS['msg_ctrl_presenca'] = "N&atilde;o foi poss&iacute;vel cadastrar a(s) presen&ccedil;a(s).";
		return $this->presencas();
		
		//exit("<hr />ctrl_presenca");
	}
		
	////////////////////////////////////////////////////////////////////////
	// Usada para popular a tabela presenca com valores 'sim' para todos. //
	//               ---> USAR COM MUITA CAUTELA!!! <---                  //
	////////////////////////////////////////////////////////////////////////
	/*
	function popular_presencas(){
		

		// Participantes 
		$sql = "SELECT ev.id, us.name FROM ev_participante ev, jos_uusers us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
		$result = mysql_query($sql);
		$participantes = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			// Adiciona essa linha de registro na variável que será passada para a TELA
			array_push($participantes, $linha);
		} //while


		//////////////////////////////////////
		// Classe de avaliação de trabalhos //
		//////////////////////////////////////
		require_once("controles/ctrl_avaliacao.php");
		$ctrl_avaliacao = new ctrl_avaliacao();

	
		foreach($participantes as $participante){
			$values = array();
			
			/////////////
			// OUVINTE //
			/////////////
			$values[] = "('".$this->id_evento."', '".$participante['id']."', '0', 'ouvinte', 'sim')";
			
	
			///////////////////////////////////
			// COMISSÃO ACADÊMICO-CIENTÍFICA //
			///////////////////////////////////
			// id_tipo_participante: 10
			if($participante['id_tipo_participante'] == 10){
				$values[] = "('".$this->id_evento."', '".$participante['id']."', '0', 'comissao', 'sim')";
			}
			
			
			//////////////////////////
			// COORDENAÇÃO SIMPÓSIO //
			//////////////////////////
			$simposios_coordenados = array();
			// Pegar simpósios cooordenados por este participante
			$sql = "SELECT s.id, s.titulo_sessao 
					FROM ev_simposio s INNER JOIN ev_simposio_coordenador sc
						ON s.id = sc.id_simposio
					WHERE
						sc.id_participante = ".$participante['id']."
						AND s.id_evento = ".$this->id_evento."
					";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'coordenacao_simposio', 'sim')";
			}//while
	
			
			//////////////////////////
			// TRABALHO EM SIMPÓSIO //
			//////////////////////////
			$trabalhos_em_simposio = array();
			// Pegar trabalhos em simpósio deste participante
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
						AND id_tipo_trabalho = 1
						AND id_simposio > 0
					ORDER BY titulo ASC";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'trabalho_em_simposio', 'sim')";
			}//while
			
	
			/////////////////////////////////////////////////
			// COORDENAÇÃO DE SESSÃO [COMUNIC. COORDENADA] //
			/////////////////////////////////////////////////
			$coordenadas = array();
			// Pegar simpósios cooordenados por este participante
			$sql = "SELECT id, titulo_sessao 
					FROM ev_comunicacao_coordenada
					WHERE
						id_coordenador = ".$participante['id']."
						AND id_evento = ".$this->id_evento."
					";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'coordenacao_sessao', 'sim')";
			}//while
			
	
			////////////////////////////////////////////
			// APRESENTAÇÃO DE COMUNICAÇÃO INDIVIDUAL //
			////////////////////////////////////////////
			$comunicacoes_individuais = array();
			// Pegar todas comunicações individuais deste participante
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
						AND id_tipo_trabalho = 3
					ORDER BY titulo ASC";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				// Verificar se foram aceitos, e caso SIM,
				// acrescentar no array de pôsteres deste participante
				if($ctrl_avaliacao->aceito($linha['id'], 'comunicacao_individual')){
					//echo "Trabalho Aceito";
					$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'comunicacao_individual', 'sim')";
				}//if
			}//while
			$participante['comunicacoes_individuais'] = $comunicacoes_individuais; // array
			
	
			////////////////////////////////////////////
			// APRESENTAÇÃO DE COMUNICAÇÃO COORDENADA //
			////////////////////////////////////////////
			$comunicacoes_coordenadas = array();
			// Pegar todos os trabalhos em comunicação coordenada deste participante
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
						AND id_tipo_trabalho = 2
						AND id_comunicacao_coordenada > 0
					ORDER BY titulo ASC";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				// Verificar se foram aceitos, e caso SIM,
				// acrescentar no array de pôsteres deste participante
				if($ctrl_avaliacao->aceito($linha['id'], 'resumo_em_coordenada')){
					//echo "Trabalho Aceito";
					$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'comunicacao_coordenada', 'sim')";
				}//if
			}//while
	
	
			////////////////////////////
			// APRESENTAÇÃO DE PÔSTER //
			////////////////////////////
			$posteres = array();
			// Pegar todos os posteres deste participante
			$sql = "SELECT id, titulo 
					FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
						AND id_tipo_trabalho = 4
					ORDER BY titulo ASC";
			$result = mysql_query($sql);
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				// Verificar se foram aceitos, e caso SIM,
				// acrescentar no array de pôsteres deste participante
				if($ctrl_avaliacao->aceito($linha['id'], 'poster')){
					//echo "Trabalho Aceito";
					$values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'poster', 'sim')";
				}//if
			}//while
			$participante['posteres'] = $posteres; // array
	
			// Concatenando os values para inserir no banco de dados
			$values = implode(", ", $values);
	
			$sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) VALUES " . $values;
			//print "SQL: <pre>";
			//	print_r($sql);
			//print "</pre>";
			mysql_query($sql);// or die(mysql_error());
		} //foreach participantes
		return $this->presencas();
	}//function
	*/
	

}
?>