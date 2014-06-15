<?php
class ctrl_avaliacao extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tipo_evento = $_SESSION["tipo_evento"];
		//$this->tabela = "chamada";
		require("conexao.php");
	}
	
	/**
	* Apenas chama a tela que exibe as opcões para a avaliação dos trabalhos inscritos.
	*/
	function opcoes_avaliacao(){
		/*
		print "<pre>";
			print_r($_SESSION);
		print "</pre>";
		*/
		
		$periodos_avaliacao = $this->select("SELECT * FROM ev_periodo_avaliacao WHERE id_evento = '".$this->id_evento."' ");
		$GLOBALS["periodo_avaliacao"] = $periodos_avaliacao[0];

		switch($this->tipo_evento){
			case 1:	
				return "opcoes_avaliacao";	
				
			case 2:
				return "opcoes_avaliacao_queering";
		}
	}//exibir_opcoes
	
	/**
	* Chama uma tela que exibe as opções para alocar os participantes nas respectivas linhas de trabalho/tipos de trabalho.
	* Somente doutores poderão avaliar os trabalhos, sendo que, não necessariamente, todos os doutores irão avaliar algum trabalho.
	* Esse método carrega os dados de participantes (doutores), tipos de trabalho (Comunicação Corodenada, Comunicação Individual e Pôster) e as linhas de trabalho cadastradas
	* que serão usados pela tela ALOCAR_PARECERISTAS.
	*/
	function alocar_pareceristas(){
		
		$GLOBALS["tipos_trabalho"]   = $this->select("SELECT tt.id, tt.nome FROM ev_tipo_trabalho tt, ev_evento_tipo_trabalho ett WHERE id <> 1 AND ett.id_tipo_trabalho = tt.id AND ett.id_evento = '".$this->id_evento."' ORDER BY nome ASC");
		$GLOBALS["linhas_tematicas"] = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = '".$this->id_evento."' ORDER BY titulo ASC");
		$GLOBALS["avaliadores"]      = $this->select("SELECT id, nome FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_formacao = 1 ORDER BY nome ASC");
		
		return "alocar_pareceristas";
	}//alocar_pareceristas
	
	/**
	* Função que carrega os dados necessários (linhas temáticas, avaliadores e etc.) para o adminsitrador do sistema poder relacionar 
	* avaliador com os devidos trabalhos que ele avaliará...
	*/
	function relacionar_avaliador_trabalhos(){
		$GLOBALS["linhas_tematicas"] = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = '".$this->id_evento."' ORDER BY titulo ASC");

		if ($this->tipo_evento == 2) 
		{		
			$GLOBALS["comunicacoes_individuais"] = 
				$this->select("SELECT id, titulo, id_linha_tematica FROM ev_resumo 
					WHERE 
						id_tipo_trabalho = 3 
						AND id_evento = '".$this->id_evento."' 
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
						AND id NOT IN (SELECT id_trabalho FROM ev_avaliacao)
					ORDER BY titulo ASC");

			$GLOBALS["comunicacoes_coordenadas"] = 
				$this->select("SELECT id, titulo_sessao, id_linha_tematica FROM ev_comunicacao_coordenada WHERE id_evento = '".$this->id_evento."' AND id NOT IN (SELECT id_trabalho FROM ev_avaliacao) ORDER BY titulo_sessao ASC");
		}
		else 
		{
			$GLOBALS["posteres"] = 
				$this->select("SELECT id, titulo, id_linha_tematica FROM ev_resumo 
					WHERE 
						id_tipo_trabalho = 4 
						AND id_evento = '".$this->id_evento."' 
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
					ORDER BY titulo ASC");

		
			$GLOBALS["comunicacoes_individuais"] = 
				$this->select("SELECT id, titulo, id_linha_tematica FROM ev_resumo 
					WHERE 
						id_tipo_trabalho = 3 
						AND id_evento = '".$this->id_evento."' 
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
					ORDER BY titulo ASC");

			$GLOBALS["comunicacoes_coordenadas"] = 
				$this->select("SELECT id, titulo_sessao, id_linha_tematica FROM ev_comunicacao_coordenada WHERE id_evento = '".$this->id_evento."' ORDER BY titulo_sessao ASC");
		}
		
		$GLOBALS["avaliadores"] = 
			$this->select("SELECT id, nome FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND avaliador = 'sim' ORDER BY nome ASC");
		
		// tipo_evento: 1 > CBLA; 2 > Queering
		return ($this->tipo_evento == 2) ? "relacionar_avaliador_trabalhos_queering" : "relacionar_avaliador_trabalhos";
	}
	
	/**
	*
	*/
	/* 
	REAVALIAR OS DELETES DESTA FUNÇÃO!!! LEMBRAR DO PROBLEMA QUE O DANIEL COSTA CAUSOU EM JAN/2012!!!
	
	function salvar_avaliador_trabalhos(){
		
		/ Deletar avaliaçõees e repectivas respostas de perguntas /
		$avaliacoes_deletar = $this->select("SELECT id FROM ev_avaliacao WHERE id_evento = '".$this->id_evento."' ");

		foreach($avaliacoes_deletar as $avaliacao_deletar){
			// Deletando respostas desta avalaição
			$sql = "DELETE FROM ev_avaliacao_perguntas WHERE id_avaliacao = '".$avaliacao_deletar["id"]."' ";
			mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);

			// Deletando a avaliação
			$sql = "DELETE FROM ev_avaliacao WHERE id = '".$avaliacao_deletar["id"]."' ";
			mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		}//foreach
		
		$linhas_tematicas = $this->select("SELECT id FROM ev_linha_tematica WHERE id_evento = '".$this->id_evento."' ");
		
		foreach($linhas_tematicas as $linha_tematica){
			$id_linha_tematica = $linha_tematica["id"];
			$trabalhos = array();
		
			$posteres = 
				$this->select("SELECT id FROM ev_resumo 
					WHERE 
						id_tipo_trabalho = 4 
						AND id_evento = '".$this->id_evento."' 
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
						AND id_linha_tematica = '".$id_linha_tematica."' ");
			foreach($posteres as $poster) {
				$poster["tipo_trabalho"] = "poster";
				array_push($trabalhos, $poster);
			}//foreach
	
			$comunicacoes_individuais = 
				$this->select("SELECT id FROM ev_resumo 
					WHERE 
						id_tipo_trabalho = 3 
						AND id_evento = '".$this->id_evento."' 
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
						AND id_linha_tematica = '".$id_linha_tematica."' ");
			foreach($comunicacoes_individuais as $comunicacao_individual) {
				$comunicacao_individual["tipo_trabalho"] = "comunicacao_individual";
				array_push($trabalhos, $comunicacao_individual);
			}//foreach
	
			$comunicacoes_coordenadas = 
				$this->select("SELECT id FROM ev_comunicacao_coordenada 
					WHERE id_evento = '".$this->id_evento."' 
						AND id_linha_tematica = '".$id_linha_tematica."' ");
			foreach($comunicacoes_coordenadas as $comunicacao_coordenada) {
				$comunicacao_coordenada["tipo_trabalho"] = "comunicacao_coordenada";
				array_push($trabalhos, $comunicacao_coordenada);
			}//foreach

			// Fazendo a distribuição aleatória dos trabalhos pelos avaliadores
			$avaliadores = $_REQUEST["avaliadores_".$id_linha_tematica];
			if(is_array($avaliadores)){
				$j = 0;
				foreach($avaliadores as $id_avaliador){
					$k = $j;
					while($k < count($trabalhos)){
						$this->salvar_associacao($id_avaliador, $trabalhos[$k]);
						$k = $k + count($avaliadores);
					}//while
					$j++;
					//print "<br />";
				}//avaliadores
			}//if
		}//foreach linha_tematica

		//exit("<br><hr>[ctrl_avaliacao]");

		$GLOBALS["msg_ctrl_avaliacao"] = "Dados salvos com sucesso";
		return $this->relacionar_avaliador_trabalhos();
	}
	*/

	/**
	* salvar_avaliacao($id_avaliador, $trabalho)
	*/
	function salvar_associacao($id_avaliador, $trabalho){
		if(!empty($id_avaliador) && !empty($trabalho)){
			// Exemplo de formato datetime do MySQL: 2011-02-22 13:52:36
			$created = date("Y-m-d H:i:s");
		
			$sql = "INSERT INTO ev_avaliacao(id_avaliador, id_trabalho, tipo_trabalho, id_evento, created) 
					VALUES('".$id_avaliador."', '".$trabalho["id"]."', '".$trabalho["tipo_trabalho"]."', '".$this->id_evento."', '".$created."')";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		}//if
	}//save
	
	function determinar_avaliadores(){
		if ($this->tipo_evento == 2)
			$GLOBALS["doutores"] = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_tipo_participante = 11 ORDER BY nome ASC");
		else
			$GLOBALS["doutores"] = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_formacao = 1 ORDER BY nome ASC");
		$GLOBALS["msg_determinar_avaliadores"] = "";

		return "determinar_avaliadores";
	}
	
	function salvar_avaliadores(){
		if ($this->tipo_evento == 2)
			$doutores = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_tipo_participante = 11 ORDER BY nome ASC");
		else
			$doutores = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_formacao = 1 ORDER BY nome ASC");
		foreach($doutores as $doutor){
			$id_doutor = $doutor["id"];
			$avaliador = "";
			$avaliador = addslashes($_REQUEST["avaliador_".$id_doutor]);
			if($avaliador == "sim" || $avaliador == "nao"){
				$sql = "UPDATE ev_participante SET avaliador = '".$avaliador."' WHERE id = '".$id_doutor."'";
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			}//if
		}//foreach
		
		$GLOBALS["msg_determinar_avaliadores"] = "Altera&ccedil;&otilde;es salvas com sucesso.";
		
		if ($this->tipo_evento == 2)
			$GLOBALS["doutores"] = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_tipo_participante = 11 ORDER BY nome ASC");
		else
			$GLOBALS["doutores"] = $this->select("SELECT id, nome, avaliador FROM ev_participante WHERE id_evento = '".$this->id_evento."' AND id_formacao = 1 ORDER BY nome ASC");

		return "determinar_avaliadores";
	}
	
	
	/**
	* Função que retorna a tela que exibe os campos para setar os valores do Período de Avaliação para este evento.
	* Verifica se já existe algum valor setado e, caso exista, preenche uma variável para a tela PERIODO_AVALIACAO exibir.
	*/
	function periodo_avaliacao(){
		echo utf8_decode("Opção Bloqueada");
		exit();
		/*
		$periodos_avaliacao = $this->select("SELECT * FROM ev_periodo_avaliacao WHERE id_evento = '".$this->id_evento."' ");
		$GLOBALS["periodo_avaliacao"] = $periodos_avaliacao[0];
		
		return "periodo_avaliacao";
		*/
	}
	
	/**
	* Função que salva (insert ou update) o Período de Avaliação para este evento.
	*/
	function salvar_periodo(){
		$id = (int)$_REQUEST["id"];
		$data_inicial = addslashes($_REQUEST["data_inicial"]);
		$data_final   = addslashes($_REQUEST["data_final"]);
		
		// Formatando as datas: Ex.: 31/03/2011 -> 2011-03-31
		$data_inicial = explode("/", $data_inicial);
		$data_inicial_format = $data_inicial["2"] . "-" . $data_inicial["1"] . "-" . $data_inicial["0"];
		
		$data_final = explode("/", $data_final);
		$data_final_format = $data_final["2"] . "-" . $data_final["1"] . "-" . $data_final["0"];

		$periodos_avaliacao = $this->select("SELECT * FROM ev_periodo_avaliacao WHERE id_evento = '".$this->id_evento."' ");

		$err = 0;
		if(count($periodos_avaliacao) > 0){
			$atualizado = $this->update("
				UPDATE ev_periodo_avaliacao 
				SET id_evento = '".$this->id_evento."', data_inicial = '".$data_inicial_format."', data_final   = '".$data_final_format."' 
				WHERE id_evento  = '".$this->id_evento."' 
			");
			if(!$atualizado) $err++;
		}else{
			$inserido = $this->insert("INSERT INTO ev_periodo_avaliacao(id_evento, data_inicial, data_final)
				VALUES('".$this->id_evento."', '".$data_inicial_format."', '".$data_final_format."') ");
			if(!$inserido) $err++;
		}//else

		$GLOBALS["msg_ctrl_avaliacao"] = ($err) ? "N&atilde;o foi poss&iacute;vel salvar o per&iacute;odo." : "Per&iacute;odo salvo com sucesso.";
		return $this->periodo_avaliacao();
	}
	
	
	function ranking_trabalhos(){
		// Linhas Temáticas
		$GLOBALS["linhas_tematicas"] = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = '".$this->id_evento."' ORDER BY titulo ASC");

		// Pôsteres
		$GLOBALS["posteres"] = 
			$this->select("
				SELECT r.id, r.titulo, r.id_linha_tematica, av.id AS id_avaliacao, av.tipo_trabalho
				  FROM ev_resumo r
				  JOIN ev_avaliacao av
					ON r.id = av.id_trabalho
				  WHERE
					r.id_tipo_trabalho = 4
					AND r.id_simposio = 0
					AND r.id_comunicacao_coordenada = 0
					AND av.tipo_trabalho = 'poster'
					AND r.id_evento = '".$this->id_evento."'
				  ORDER BY r.titulo ASC;
			");

		// Comunicações Individuais
		$GLOBALS["comunicacoes_individuais"] = 
			$this->select("
				SELECT r.id, r.titulo, r.id_linha_tematica, av.id AS id_avaliacao, av.tipo_trabalho
				  FROM ev_resumo r
				  JOIN ev_avaliacao av
					ON r.id = av.id_trabalho
				  WHERE
					r.id_tipo_trabalho = 3
					AND r.id_simposio = 0
					AND r.id_comunicacao_coordenada = 0
					AND av.tipo_trabalho = 'comunicacao_individual'
					AND r.id_evento = '".$this->id_evento."'
				  ORDER BY r.titulo ASC;
			");

		// Comunicações Coordenadas
		$GLOBALS["comunicacoes_coordenadas"] = 
			$this->select("
				SELECT cc.id, cc.titulo_sessao, cc.id_linha_tematica, av.id AS id_avaliacao, av.tipo_trabalho
				  FROM ev_comunicacao_coordenada cc
				  JOIN ev_avaliacao av
					ON cc.id = av.id_trabalho
				  WHERE
					av.tipo_trabalho = 'comunicacao_coordenada'
					AND cc.id_evento = '".$this->id_evento."'
				  ORDER BY cc.id ASC;
			");
		
		
		return "ranking_trabalhos";
	}

	/**
	* Função que verifica se o trabalho foi aceito.
	* $tipo {'comunicacao_coordenada', 'comunicacao_individual', 'poster'}
	* Retornos: true [aceito] ou false [recusado]
	*/
	function aceito($id_trabalho, $tipo){
		$nota_corte = 3;
		
		if($tipo == 'resumo_em_coordenada'){
			$sql = "
				SELECT id_comunicacao_coordenada 
					FROM ev_resumo
					WHERE 
						id = '".$id_trabalho."'
						AND id_evento = '".$this->id_evento."'
						AND id_tipo_trabalho = 2
						AND id_comunicacao_coordenada <> 0
				";
			$result = mysql_query($sql) or die(mysql_error());
			list($id_trabalho) = mysql_fetch_array($result);
			$tipo = 'comunicacao_coordenada';
		}//if
	
		$sql = "
			SELECT avp.resposta 
			FROM ev_avaliacao av, ev_avaliacao_perguntas avp
			WHERE 
				av.id_evento = '".$this->id_evento."'
				AND av.id_trabalho = ".$id_trabalho."
				AND av.tipo_trabalho = '".$tipo."'
				AND avp.id_avaliacao = av.id
			";
		$notas = array();
		$result = mysql_query($sql) or die(mysql_error());
		while( $nota = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($notas, $nota['resposta']);
		}
		$respostas = array_count_values($notas);
		$num_sim = $respostas['sim'];
	
		if( $num_sim >= $nota_corte) return true;
		else return false;
	}//aceito
	
	/*
	function indicar_avaliadores(){
		$linhas_tematicas = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = {$this->id_evento} ORDER BY titulo");
		
		// Pegando as comunicações (individuais e coordenadas) de cada linha temática
		foreach($linhas_tematicas as &$linha_tematica){

			// Comunicações Individuais
			$linha_tematica["comunicacoes_individuais"] = $this->select("SELECT id, UPPER(titulo) AS titulo FROM ev_resumo WHERE id_tipo_trabalho = 3 AND id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_individuais"] = count($linha_tematica["comunicacoes_individuais"]);

			// Pegar as avaliações, já cadastradas, de cada comunicação individual
			foreach($linha_tematica["comunicacoes_individuais"] as &$comunicacao_individual){
				$comunicacao_individual['avaliacoes'] = $this->avaliacoes_trabalho($comunicacao_individual['id'], 'comunicacao_individual', array('id','id_avaliador'));
			}


			// Comunicações Coordenadas
			$linha_tematica["comunicacoes_coordenadas"] = $this->select("SELECT id, UPPER(titulo_sessao) AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_coordenadas"] = count($linha_tematica["comunicacoes_coordenadas"]);

			// Pegar as avaliações, já cadastradas, de cada comunicação coordenada
			foreach($linha_tematica["comunicacoes_coordenadas"] as &$comunicacao_coordenada){
				$comunicacao_coordenada['avaliacoes'] = $this->avaliacoes_trabalho($comunicacao_coordenada['id'], 'comunicacao_coordenada', array('id','id_avaliador'));
			}


			$linha_tematica["total_trabalhos"] = $linha_tematica["total_comunicacoes_individuais"] + $linha_tematica["total_comunicacoes_coordenadas"];
		}
		$GLOBALS["linhas_tematicas"] = $linhas_tematicas;
		
		// Participantes que podem avaliar trabalhos
		$GLOBALS["avaliadores"] = $this->select("SELECT id, UPPER(nome) AS nome, email FROM ev_participante WHERE id_evento = {$this->id_evento} ORDER BY nome");


		return "avaliadores_trabalho";
	}
	*/
	
	/*
	REAVALIAR OS DELETES DESTA FUNÇÃO!!! LEMBRAR DO PROBLEMA QUE O DANIEL COSTA CAUSOU EM JAN/2012!!!
	
	function salvar_avaliadores_trabalhos(){
		$hoje = $this->date_to_timestamp(date("Y-m-d"));

		$periodos_avaliacao = $this->select("SELECT data_inicial, data_final FROM ev_periodo_avaliacao WHERE id_evento = '".$this->id_evento."' ");
		$periodo_avaliacao = $periodos_avaliacao[0];
		$periodo_data_inicial = $this->date_to_timestamp($periodo_avaliacao['data_inicial']);
		$periodo_data_final = $this->date_to_timestamp($periodo_avaliacao['data_final']);
		
		// Verificar se já começou o período de avaliação. Se sim, não pode indicar mais avaliadores.
		if(($hoje < $periodo_data_inicial) && ($hoje < $periodo_data_final)) {
			// echo utf8_decode("Ainda não estamos no período de avaliação.");
			
			// Alterando o atributo "aceito" dos trabalhos pois serão avaliados novamente
			// Comunicações Individuais
			$sql = "UPDATE ev_resumo SET aceito = NULL WHERE id_evento = {$this->id_evento} AND id_tipo_trabalho = 3 ";
			mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			// Comunicações Coordenadas
			$sql = "UPDATE ev_comunicacao_coordenada SET aceito = NULL WHERE id_evento = {$this->id_evento} ";
			mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			
			// Pegar registros da tabela avaliacao para apagar mas abaixo.
			$avaliacoes_deletar = $this->select("SELECT id FROM ev_avaliacao WHERE id_evento = '".$this->id_evento."' ");
	
			foreach($avaliacoes_deletar as $avaliacao_deletar){
				// Deletando respostas desta avaliação
				$sql = "DELETE FROM ev_avaliacao_perguntas WHERE id_avaliacao = '".$avaliacao_deletar["id"]."' ";
				mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
	
				// Deletando a avaliação
				$sql = "DELETE FROM ev_avaliacao WHERE id = '".$avaliacao_deletar["id"]."' ";
				mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			}//foreach
			
			// Salvar relação entre trabalho e avaliador
			// Comunicações Individuais
			$comunicacoes_individuais = $this->select("SELECT id FROM ev_resumo WHERE id_tipo_trabalho = 3 AND id_evento = {$this->id_evento}");
			foreach($comunicacoes_individuais as $comunicacao_individual){
				$id_trabalho = $comunicacao_individual['id'];
				$id_avaliador_1 = (int) $_POST['avaliador_comunicacao_individual_' . $id_trabalho . '_1'];
				$id_avaliador_2 = (int) $_POST['avaliador_comunicacao_individual_' . $id_trabalho . '_2'];
				
				// Exemplo de formato datetime do MySQL: 2011-02-22 13:52:36
				$created = date("Y-m-d H:i:s");

				// Salvar relação entre trabalho e avaliador 1
				if(!empty($id_avaliador_1)){
					$sql = "INSERT INTO ev_avaliacao(id_avaliador, id_trabalho, tipo_trabalho, id_evento, created, ordem_avaliador) 
							VALUES({$id_avaliador_1}, {$id_trabalho}, 'comunicacao_individual', {$this->id_evento}, '{$created}', '1')";
					$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if

				// Salvar relação entre trabalho e avaliador 2
				if(!empty($id_avaliador_2)){
					$sql = "INSERT INTO ev_avaliacao(id_avaliador, id_trabalho, tipo_trabalho, id_evento, created, ordem_avaliador) 
							VALUES({$id_avaliador_2}, {$id_trabalho}, 'comunicacao_individual', {$this->id_evento}, '{$created}', '2')";
					$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if
			} //foreach
	  
			// Comunicações Coordenadas
			$comunicacoes_coordenadas = $this->select("SELECT id FROM ev_comunicacao_coordenada WHERE id_evento = {$this->id_evento}");
			foreach($comunicacoes_coordenadas as $comunicacao_coordenada){
				$id_trabalho = $comunicacao_coordenada['id'];
				$id_avaliador_1 = (int) $_POST['avaliador_comunicacao_coordenada_' . $id_trabalho . '_1'];
				$id_avaliador_2 = (int) $_POST['avaliador_comunicacao_coordenada_' . $id_trabalho . '_2'];
				
				// Exemplo de formato datetime do MySQL: 2011-02-22 13:52:36
				$created = date("Y-m-d H:i:s");

				// Salvar relação entre trabalho e avaliador 1
				if(!empty($id_avaliador_1)){
					$sql = "INSERT INTO ev_avaliacao(id_avaliador, id_trabalho, tipo_trabalho, id_evento, created, ordem_avaliador) 
							VALUES({$id_avaliador_1}, {$id_trabalho}, 'comunicacao_coordenada', {$this->id_evento}, '{$created}', '1')";
					$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if

				// Salvar relação entre trabalho e avaliador 2
				if(!empty($id_avaliador_2)){
					$sql = "INSERT INTO ev_avaliacao(id_avaliador, id_trabalho, tipo_trabalho, id_evento, created, ordem_avaliador) 
							VALUES({$id_avaliador_2}, {$id_trabalho}, 'comunicacao_coordenada', {$this->id_evento}, '{$created}', '2')";
					$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				}//if
			} //foreach
			$GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		}
		else{
			$GLOBALS["msg_tela"] = utf8_decode("Não é possível indicar mais avaliadores pois o período de avaliação já se iniciou.");
		}
		
		return "mensagem";
	}
	*/
	
	/**
	* Retorna o timestamp de uma data.
	* $date: "Y-m-d"
	*/
	function date_to_timestamp($date){
		// Pega o ano
		$ano = substr($date, 0, 4);
		// Pega o mês
		$mes = substr($date, 5, 2);
		// Pega o dia
		$dia = substr($date, 8, 2);
		
		
		// Obtém um timestamp Unix para a data do banco onde o 0 
		// ( zero ) são respectivamente horas , minutos , segundos         
		return mktime(0, 0, 0, $mes, $dia, $ano);
	}
	
	function avaliacoes_trabalhos_queering(){
		echo utf8_decode("Opção Bloqueada");
		exit();
		/*
		$linhas_tematicas = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = {$this->id_evento} ORDER BY titulo");
		
		// Pegando as comunicações (individuais e coordenadas) de cada linha temática
		foreach($linhas_tematicas as &$linha_tematica){
			// Comunicações Individuais
			$linha_tematica["comunicacoes_individuais"] = $this->select("SELECT id, UPPER(titulo) AS titulo, aceito FROM ev_resumo WHERE id_tipo_trabalho = 3 AND id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_individuais"] = count($linha_tematica["comunicacoes_individuais"]);
			
			//Pegar as notas de cada comunicação individual
			foreach($linha_tematica["comunicacoes_individuais"] as &$comunicacao_individual){
				$avaliacoes_notas = $this->notas_avaliacaoes_trabalho($comunicacao_individual['id'], 'comunicacao_individual', $this->id_evento);

				$comunicacao_individual['nota_1'] = $avaliacoes_notas[0]['nota'];
				$comunicacao_individual['nota_2'] = $avaliacoes_notas[1]['nota'];
				$comunicacao_individual['avaliador_nota_1'] = $avaliacoes_notas[0]['id_avaliador'];
				$comunicacao_individual['avaliador_nota_2'] = $avaliacoes_notas[1]['id_avaliador'];
			}


			// Comunicações Coordenadas
			$linha_tematica["comunicacoes_coordenadas"] = $this->select("SELECT id, UPPER(titulo_sessao) AS titulo, aceito FROM ev_comunicacao_coordenada WHERE id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_coordenadas"] = count($linha_tematica["comunicacoes_coordenadas"]);

			//Pegar as notas de cada comunicação coordenada
			foreach($linha_tematica["comunicacoes_coordenadas"] as &$comunicacao_coordenada){
				$avaliacoes_notas = $this->notas_avaliacaoes_trabalho($comunicacao_coordenada['id'], 'comunicacao_coordenada', $this->id_evento);

				$comunicacao_coordenada['nota_1'] = $avaliacoes_notas[0]['nota'];
				$comunicacao_coordenada['nota_2'] = $avaliacoes_notas[1]['nota'];
				$comunicacao_individual['avaliador_nota_1'] = $avaliacoes_notas[0]['id_avaliador'];
				$comunicacao_individual['avaliador_nota_2'] = $avaliacoes_notas[1]['id_avaliador'];
			}

			// Setar o total de trabalhos (Comunicações Coordenadas + Comunicações Individuais)
			$linha_tematica["total_trabalhos"] = $linha_tematica["total_comunicacoes_individuais"] + $linha_tematica["total_comunicacoes_coordenadas"];
		}

		$GLOBALS["linhas_tematicas"] = $linhas_tematicas;
		
		return "avaliacoes_trabalhos_queering";
		*/
	}
	
	
	function notas_avaliacaoes_trabalho($id_trabalho, $tipo_trabalho, $id_evento){
		// Notas de um determinado trabalho (1505, comunicacao_individual) no evento Queering Paradigms por avaliação deste trabalho e avaliador.
		$avaliacoes_notas = $this->select("
			SELECT a.id AS id_avaliacao, COUNT(ap.resposta) AS nota, a.id_avaliador, a.ordem_avaliador AS ordem
			FROM ev_avaliacao_perguntas ap
			INNER JOIN ev_avaliacao a
				ON a.id = ap.id_avaliacao
			WHERE 
				a.id_evento = {$this->id_evento}
				AND a.id_trabalho = {$id_trabalho}
				AND a.tipo_trabalho = '{$tipo_trabalho}'
			GROUP BY a.id, ap.resposta HAVING ap.resposta = 'sim'
			ORDER BY a.ordem_avaliador;
			");
			
		return $avaliacoes_notas;
	}


	function salvar_aceitos_queering(){
		// Comunicações Individuais
		$comunicacoes_individuais = $this->select("SELECT id FROM ev_resumo WHERE id_tipo_trabalho = 3 AND id_evento = {$this->id_evento} ");
		foreach($comunicacoes_individuais as $comunicacao_individual){
			$id_comunicacao = $comunicacao_individual['id'];
			$aceito = (!empty($_POST["comunicacao_individual_aceito_".$id_comunicacao])) ? $_POST["comunicacao_individual_aceito_".$id_comunicacao] : "NULL";
			//echo "<br />Comunica&ccedil;&atilde;o Individual {$id_comunicacao} aceita? ".$aceito;
			$atualizado = $this->update("
				UPDATE ev_resumo 
				SET aceito = '{$aceito}' 
				WHERE id = {$comunicacao_individual['id']} ");
		}//foreach
		
		// Comunicações Coordenadas
		$comunicacoes_coordenadas = $this->select("SELECT id FROM ev_comunicacao_coordenada WHERE id_evento = {$this->id_evento} ");
		foreach($comunicacoes_coordenadas as $comunicacao_coordenada){
			$id_comunicacao = $comunicacao_coordenada['id'];
			$aceito = (!empty($_POST["comunicacao_coordenada_aceito_".$id_comunicacao])) ? $_POST["comunicacao_coordenada_aceito_".$id_comunicacao] : "NULL";
			//echo "<br />Comunica&ccedil;&atilde;o Individual {$id_comunicacao} aceita? ".$aceito;
			$atualizado = $this->update("
				UPDATE ev_comunicacao_coordenada 
				SET aceito = '{$aceito}' 
				WHERE id = {$comunicacao_coordenada['id']} ");
		}//foreach
		
		//exit("<br />ctrl_avaliacao salvar_aceitos_queering()");
		$GLOBALS["msg_tela"] = utf8_decode("Alterações efetuadas com sucesso.");
		return "mensagem";
	}
	

	function notas_trabalhos_queering(){
		$linhas_tematicas = $this->select("SELECT id, titulo FROM ev_linha_tematica WHERE id_evento = {$this->id_evento} ORDER BY titulo");
		
		// Pegando as comunicações (individuais e coordenadas) de cada linha temática
		foreach($linhas_tematicas as &$linha_tematica){
			// Comunicações Individuais
			$linha_tematica["comunicacoes_individuais"] = $this->select("SELECT id, UPPER(titulo) AS titulo, aceito FROM ev_resumo WHERE id_tipo_trabalho = 3 AND id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_individuais"] = count($linha_tematica["comunicacoes_individuais"]);
			
			//Pegar as notas de cada comunicação individual
			foreach($linha_tematica["comunicacoes_individuais"] as &$comunicacao_individual){
				$avaliacoes_notas = $this->notas_avaliacaoes_trabalho($comunicacao_individual['id'], 'comunicacao_individual', $this->id_evento);

				/*
				print "Avaliações do trabalho {$comunicacao_individual['titulo']}:<pre>";
					print_r($avaliacoes_notas);
				print "</pre>";
				/**/

				$comunicacao_individual['nota_1'] = $avaliacoes_notas[0]['nota'];
				$comunicacao_individual['nota_2'] = $avaliacoes_notas[1]['nota'];
				//$comunicacao_individual['avaliador_nota_1'] = $avaliacoes_notas[0]['id_avaliador'];
				//$comunicacao_individual['avaliador_nota_2'] = $avaliacoes_notas[1]['id_avaliador'];
			}


			// Comunicações Coordenadas
			$linha_tematica["comunicacoes_coordenadas"] = $this->select("SELECT id, UPPER(titulo_sessao) AS titulo, aceito FROM ev_comunicacao_coordenada WHERE id_evento = {$this->id_evento} AND id_linha_tematica = {$linha_tematica['id']} ORDER BY titulo");
			$linha_tematica["total_comunicacoes_coordenadas"] = count($linha_tematica["comunicacoes_coordenadas"]);

			//Pegar as notas de cada comunicação coordenada
			foreach($linha_tematica["comunicacoes_coordenadas"] as &$comunicacao_coordenada){
				$avaliacoes_notas = $this->notas_avaliacaoes_trabalho($comunicacao_coordenada['id'], 'comunicacao_coordenada', $this->id_evento);

				/*
				print "Avaliações do trabalho {$comunicacao_coordenada['titulo']}:<pre>";
					print_r($avaliacoes_notas);
				print "</pre>";
				/**/

				$comunicacao_coordenada['nota_1'] = $avaliacoes_notas[0]['nota'];
				$comunicacao_coordenada['nota_2'] = $avaliacoes_notas[1]['nota'];
				//$comunicacao_individual['avaliador_nota_1'] = $avaliacoes_notas[0]['id_avaliador'];
				//$comunicacao_individual['avaliador_nota_2'] = $avaliacoes_notas[1]['id_avaliador'];
			}

			// Setar o total de trabalhos (Comunicações Coordenadas + Comunicações Individuais)
			$linha_tematica["total_trabalhos"] = $linha_tematica["total_comunicacoes_individuais"] + $linha_tematica["total_comunicacoes_coordenadas"];
		}

		$GLOBALS["linhas_tematicas"] = $linhas_tematicas;
		
		/*
		print "Linhas tematicas: <pre>";
			print_r($GLOBALS["linhas_tematicas"]);
		print "</pre>";
		print "<hr />";
		exit("<br />ctrl_avaliacao avaliacoes_trabalhos_queering()");
		/**/
		
		return "notas_trabalhos_queering";
	}
	
	
	function observacoes_avaliacoes(){
		$id_trabalho = (int) $_GET['id_trabalho'];
		$tipo_trabalho = addslashes($_GET['tipo_trabalho']);
		
		/*
		echo "<br>ID Trabalho: " . $id_trabalho;
		echo "<br>Tipo Trabalho: " . $tipo_trabalho;
		echo "<br>";
		*/
		
		// Pegar avaliações deste trabalho
		$avaliacoes = $this->select("
			SELECT id, observacao 
			FROM ev_avaliacao 
			WHERE 
				id_evento = {$this->id_evento}
				AND id_trabalho = {$id_trabalho}
				AND tipo_trabalho = '{$tipo_trabalho}' 
			ORDER BY ordem_avaliador");
		
		// Exibir observações de cada avaliação
		$i = 1;
		foreach($avaliacoes as $avaliacao){
			echo "<h3>Avaliação " . $i . "</h3>";
			echo "<br />";
			echo "<h4>Observação</h4>";
			//echo "<br />";
			
			$observacao = (empty($avaliacao['observacao'])) ? "Não preencheu a observação." : $avaliacao['observacao'];
			echo $observacao;
			echo "<br /><br />";
			
			$i++;
		}

		exit;
	}
	
	
	/**
	* Retorna as avaliações de um determinado trabalho.
	*/
	function avaliacoes_trabalho($id_trabalho, $tipo_trabalho, $attr_select = array()){
		// Setando os atributos do SELECT da consulta
		if(empty($attr_select)) $attr = " * ";
		else{
			$atributos = "";
			foreach($attr_select as $attr){
				$atributos .= $attr . ", ";
			}
			$atributos = substr($atributos, 0, -2);
		}//else
		
											
		// Pegar avaliações deste trabalho
		$avaliacoes = $this->select("
			SELECT {$atributos}
			FROM ev_avaliacao 
			WHERE 
				id_evento = {$this->id_evento}
				AND id_trabalho = {$id_trabalho}
				AND tipo_trabalho = '{$tipo_trabalho}' 
			ORDER BY ordem_avaliador");
			
		return $avaliacoes;
	}

	
}
?>