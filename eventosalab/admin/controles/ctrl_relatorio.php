<?php
class ctrl_relatorio extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		//$this->tabela = "ev_relatorio";
	}

	function relatorios(){
		$tipos = array("simposios", "comunicacoes_coordenadas", "comunicacoes_individuais", "posteres");
		$GLOBALS["tipos"] = $tipos;
		return "relatorios";
	}
	
	function listar_participantes(){
		
		if ($this->id_evento == 28) {
			$html = "<table border=\"1\">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Tipo de Inscrição</th>
								<th>Evento</th>
								<th>Formação</th>
								<th>CPF</th>
								<th>Passaporte</th>
								<th>Inscrição Sem/Com Trabalho</th>
								<th>Instituição</th>
								<th>Observações</th>
								<th>Inscrição Paga</th>
							</tr>
						</thead>";
		} else {
			$html = "<table border=\"1\">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Tipo de Inscrição</th>
								<th>Evento</th>
								<th>Formação</th>
								<th>Data de Nascimento</th>
								<th>CPF</th>
								<th>Passaporte</th>
								<th>Endereço</th>
								<th>Bairro</th>
								<th>Estado</th>
								<th>Cidade</th>
								<th>CEP</th>
								<th>Telefone</th>
								<th>Inscrição Sem/Com Trabalho</th>
								<th>ID Associado ALAB</th>
								<th>Instituição</th>
								<th>Inscrição Paga</th>
							</tr>
						</thead>";
		}
		
		$sql_participante = "SELECT * FROM ev_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result_participante = mysql_query($sql_participante) or trigger_error(mysql_error(), E_USER_ERROR);
		while($participante = mysql_fetch_array($result_participante)) {
			$id                      = $participante["id"];
			$id_tipo_participante    = $participante["id_tipo_participante"];
			$id_estado               = $participante["id_estado"];
			$id_cidade               = $participante["id_cidade"];
			$id_formacao             = $participante["id_formacao"];
			$nome                    = $participante["nome"];
			$datanascimento          = $participante["datanascimento"];
			$cpf                     = $participante["cpf"];
			$passaporte              = $participante["passaporte"];
			$email                   = $participante["email"];
			$endereco                = $participante["endereco"];
			$bairro                  = $participante["bairro"];
			$cep                     = $participante["cep"];
			$telefone                = $participante["telefone"];
			$modalidade_participacao = $participante["modalidade_participacao"];
			$id_associado_alab       = $participante["id_associado_alab"];
			$instituicao             = $participante["instituicao"];
			$pago                    = $participante["pago"];
	
			/* Tipo Participante */
			$sql = "SELECT nome FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' AND id='".$id_tipo_participante."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$tipo_participante = $linha["nome"];

			/* data Nascimento */
			if($datanascimento == "0000-00-00") $datanascimento = "";

			/* Estado */
			$sql = "SELECT sigla FROM ev_estados WHERE cod_estados='".$id_estado."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$estado = $linha["sigla"];

			/* Cidade */
			$sql = "SELECT nome FROM ev_cidades WHERE cod_cidades='".$id_cidade."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$cidade = $linha["nome"];

			/* Formação */
			$sql = "SELECT formacao FROM ev_formacao_academica WHERE id_formacao='".$id_formacao."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$formacao = $linha["formacao"];

			/* Inscrição com/sem trabalho */
			if ($modalidade_participacao=='0') $modalidade_participacao='Sem trabalho';
			if ($modalidade_participacao=='1') $modalidade_participacao='Com trabalho';

			/* Presença */
			/*
			if ($presenca=='sim') $presenca='Sim';
			if ($presenca=='nao') $presenca='Não';
			*/

			/* Pagamento */
			$sql = "SELECT pago FROM ev_pagamento WHERE id_participante='".$id."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$pago = $linha["pago"];
			if ($pago=='sim') $pago='Sim';
			if ($pago=='nao') $pago='Não';

			/* Evento */
			$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$evento = $linha["titulo"];
			
			if ($this->id_evento == 28) {
				$html .= "<tr>
							<td>$id</td>
							<td>$nome</td>
							<td>$email</td>
							<td>$tipo_participante</td>
							<td>$evento</td>
							<td>$formacao</td>
							<td>$cpf</td>
							<td>$passaporte</td>
							<td>$modalidade_participacao</td>
							<td>$instituicao</td>
							<td>$observacoes</td>
							<td>$pago</td>
						  </tr>";
			} else {
				$html .= "<tr>
							<td>$id</td>
							<td>$nome</td>
							<td>$email</td>
							<td>$tipo_participante</td>
							<td>$evento</td>
							<td>$formacao</td>
							<td>$datanascimento</td>
							<td>$cpf</td>
							<td>$passaporte</td>
							<td>$endereco</td>
							<td>$bairro</td>
							<td>$estado</td>
							<td>$cidade</td>
							<td>$cep</td>
							<td>$telefone</td>
							<td>$modalidade_participacao</td>
							<td>$id_associado_alab</td>
							<td>$instituicao</td>
							<td>$pago</td>
						  </tr>";
			}
		}
		$html .= '</table>';

		// Pegar título do evento e tratar
		$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$evento = mysql_fetch_assoc($result);
		$titulo_evento = $this->tratar_nome($evento['titulo']); // ESTE MÉTODO ESTÁ DECLARADO NO ctrl_generico

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$titulo_evento.'__Relatorio_de_Participantes_COMPLETO_'.date('d-m-Y-H\hi\m\i\ns\s').'.xls');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;

		//return "relatorios";
	}
	
	function getLinhasTematicas(){
	
		$sql = "SELECT * FROM ev_linha_tematica WHERE id_evento='".$this->id_evento."' ORDER BY titulo ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		
		return $registros;
	}

	function getParticipantes($params = array()){
		
		$attr_order  = (!empty($params['attr_order'])) ? $params['attr_order'] : "nome";
		$attr_select = (!empty($params['attr_select'])) ? $params['attr_select'] : "id, nome, email, instituicao";
		$attr_where  = (!empty($params['attr_where'])) ? " AND " . $params['attr_where'] : "";
	
		$sql = "SELECT ".$attr_select." FROM ev_participante WHERE id_evento='".$this->id_evento."' ".$attr_where." ORDER BY ".$attr_order." ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($registros, $linha);
		} //while
		
		return $registros;
	}

	function listar_posteres(){
		
		$exibir_linhas = (int) $_GET["exibir_linhas"];
		
		if(!$exibir_linhas){
			$id_linha_tematica = (int) $_GET["id_linha_tematica"];
		
			if($id_linha_tematica){
				$sql = "SELECT * FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_tipo_trabalho=4 
						AND id_linha_tematica = ".$id_linha_tematica."
					ORDER BY titulo ASC";
			}else{
				$sql = "SELECT * FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_tipo_trabalho=4 
					ORDER BY titulo ASC";
			}
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				array_push($registros, $linha);
			} //while
			
			// Verificando se os pôsteres foram aceitos, para setar o atributo $registro['aceito']
			require("controles/ctrl_avaliacao.php");
			$ctrl_avaliacao = new ctrl_avaliacao();
			foreach($registros as &$registro){
				$registro['aceito'] = $ctrl_avaliacao->aceito($registro['id'], 'poster');
			} // foreach
			
			
			if($_REQUEST['sem_resumo']){
				$this->gerar_trabalhos_doc($registros, $this->getLinhasTematicas(), $this->getParticipantes());
			}else{
				// Setando as variáveis globais para uso na tela (view)
				$GLOBALS["posteres"] = $registros;
				$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
				$GLOBALS["participantes"] = $this->getParticipantes();
			}
	
			return "relatorio_posteres";
		}else{
			$GLOBALS["id_tipo_trabalho"] = 4;
			$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
	
			return "relatorio_linhas_tipo";
		}
	}
	
	function listar_comunicacoes_individuais(){
		
		$exibir_linhas = (int) $_GET["exibir_linhas"];

		if(!$exibir_linhas){
			$id_linha_tematica = (int) $_GET["id_linha_tematica"];
		
			if($id_linha_tematica){
				$sql = "SELECT * FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_tipo_trabalho=3 
						AND id_linha_tematica = ".$id_linha_tematica."
					ORDER BY titulo ASC";
			}else{
				$sql = "SELECT * FROM ev_resumo WHERE id_evento='".$this->id_evento."' AND id_tipo_trabalho=3 ORDER BY titulo ASC";
			}
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result)){
				array_push($registros, $linha);
			} //while

			// Verificando se as comunicações individuais foram aceitas
			require("controles/ctrl_avaliacao.php");
			$ctrl_avaliacao = new ctrl_avaliacao();
			foreach($registros as &$registro){
				$registro['aceito'] = $ctrl_avaliacao->aceito($registro['id'], 'comunicacao_individual');
			} // foreach

			if($_REQUEST['sem_resumo']){
				$this->gerar_trabalhos_doc($registros, $this->getLinhasTematicas(), $this->getParticipantes());
			}else{
				// Setando as variáveis globais para uso na tela (view)
				$GLOBALS["comunicacoes_individuais"] = $registros;
				$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
				$GLOBALS["participantes"] = $this->getParticipantes();
			}
	
			return "relatorio_comunicacoes_individuais";
		}else{
			$GLOBALS["id_tipo_trabalho"] = 3;
			$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
	
			return "relatorio_linhas_tipo";
		}
	}
	
	function listar_simposios(){
		
		/* Simpósios */
		$sql = "SELECT * FROM ev_simposio WHERE id_evento='".$this->id_evento."' ORDER BY titulo_sessao ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		$GLOBALS["simposios"] = $registros;
		
		/* Tópicos */
		$sql_topicos = "SELECT * FROM ev_topico_simposio WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result_topicos = mysql_query($sql_topicos) or trigger_error(mysql_error(), E_USER_ERROR);
		$topicos = array();
		while($linha = mysql_fetch_array($result_topicos)){
			array_push($topicos, $linha);
		} //while
		$GLOBALS["topicos"] = $topicos;

		/* Resumos do Simpósio */
		$sql = "SELECT * FROM ev_resumo
			WHERE 
				id_evento='".$this->id_evento."' 
				AND id_simposio > 0
			ORDER BY titulo ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$resumos = array();
		while($linha = mysql_fetch_array($result)){
			array_push($resumos, $linha);
		} //while
		$GLOBALS["resumos"] = $resumos;

		$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
		$GLOBALS["participantes"] = $this->getParticipantes();

		return "relatorio_simposios";
	}
	
	function listar_comunicacoes_coordenadas(){
		
		$exibir_linhas = (int) $_GET["exibir_linhas"];

		if(!$exibir_linhas){
			$id_linha_tematica = (int) $_GET["id_linha_tematica"];
			
			
			$sem_resumo = $_GET["sem_resumo"];
			if($sem_resumo){
				$this->listar_coordenadas_sem_resumos($id_linha_tematica);
			}else{
				if($id_linha_tematica){
					$sql = "SELECT * FROM ev_comunicacao_coordenada 
						WHERE 
							id_evento='".$this->id_evento."' 
							AND id_linha_tematica = ".$id_linha_tematica."
						ORDER BY titulo_sessao ASC";
				}else{
					$sql = "SELECT * FROM ev_comunicacao_coordenada WHERE id_evento='".$this->id_evento."' ORDER BY titulo_sessao ASC";
				}
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$registros = array();
				while($linha = mysql_fetch_array($result)){
					array_push($registros, $linha);
				} //while
	
				// Verificando se as comunicações individuais foram aceitas
				require("controles/ctrl_avaliacao.php");
				$ctrl_avaliacao = new ctrl_avaliacao();
				foreach($registros as &$registro){
					$registro['aceito'] = $ctrl_avaliacao->aceito($registro['id'], 'comunicacao_coordenada');
				} // foreach
	
				// Variável global para uso na tela (view)
				$GLOBALS["comunicacoes_coordenadas"] = $registros;
	
				/* Resumos do Comunicações Coordenadas */
				$sql = "SELECT * FROM ev_resumo
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_comunicacao_coordenada > 0
					ORDER BY titulo ASC";
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$resumos = array();
				while($linha = mysql_fetch_array($result)){
					array_push($resumos, $linha);
				} //while
				$GLOBALS["resumos"] = $resumos;
		
				$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
				$GLOBALS["participantes"] = $this->getParticipantes();
		
				return "relatorio_comunicacoes_coordenadas";
			}//else
		}else{
			$GLOBALS["id_tipo_trabalho"] = 2;
			$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
	
			return "relatorio_linhas_tipo";
		}
	}
	
	function abrir_edicao(){

		$id = addslashes( (int) $_GET["id"] );
		
		if(!empty($id)){ /* Edição */
			$sql = "SELECT * FROM ev_".$this->tabela." WHERE id='".$id."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result)){
				array_push($registros, $linha);
			} //while
			
			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{ /* Insersão */
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}

		$GLOBALS["registros"] = $registros;
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;
		
		return "relatorio";
	}

	function salvar_edicao(){
	
		$id = addslashes((int) $_POST["id"]);
        $titulo = addslashes($_POST["titulo"]);
		
		if(!empty($id)){
			$sql = "UPDATE ev_".$this->tabela."
				SET titulo = '".$titulo."'
				WHERE id='".$id."' ";
		}else{
			$sql = "INSERT INTO ev_".$this->tabela."(id_evento, titulo) VALUES('".$this->id_evento."', '".$titulo."')";
		}
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);

		if($result) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados.";
		return "mensagem";
	}

	function deletar(){

		$id = addslashes((int) $_GET["id"]);
		$sql = "DELETE FROM ev_".$this->tabela." WHERE id='".$id."' ";
		$result = mysql_query($sql);
		
		if($result){
			$GLOBALS["msg_tela"] = "Linha Tem&aacute;tica deletada com sucesso.";
		}else{
			$GLOBALS["msg_tela"] = "N&atilde;o foi possível deletar a Linha Tem&aacute;tica.";
		}

		return "mensagem";
	}
	
	/**
	* Listar todos os trabalhos aceitos por ordem alfabética de nome de autor.
	* A lista gerada será em formato .doc
	*/
	function listar_aceitos() {
		// $filtros: são as modalidades de tabalhos (tipo de trabalho) selecionadas para gerar o relatório.
		$filtros = $_POST['filtros'];
		
		$nome_arquivo = "Trabalhos_Aceitos_por_Participante";
		$html = "";
		
		// Parâmetros para pegar os participantes
		$params['attr_order']  = "nome";
		$params['attr_select'] = "id, nome, instituicao, modalidade_participacao";
		$params['attr_where']  = " modalidade_participacao = 1 ";
		$html .= "<table style=\"font-family:sans-serif; text-align:justify;\">";
		foreach($this->getParticipantes($params) as $participante){
			// Pegar todos os trabalhos do participante de acordo com os filtros
			$trabalhos_aceitos = $this->trabalhos_aceitos_participante($participante['id'], $filtros);
			
			/*
			print "Participante: <pre>";
				print_r($participante);
			print "</pre>";
			*//*
			print "Trabalhos Aceitos: <pre>";
				print_r($trabalhos_aceitos);
			print "</pre>";
			/**/
			
			if(is_array($trabalhos_aceitos) && (count($trabalhos_aceitos) > 0)){
				foreach($trabalhos_aceitos as $trabalho){
					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td align='center'><strong>" . mb_strtoupper($trabalho['titulo']) . "</strong></td></tr>";
					$html .= "<tr><td>&nbsp;</td></tr>";

					// Autor, Coordenador
					$html .= "<tr><td align='right'>" . mb_strtoupper($participante['nome']) . "</td></tr>";
					if(!empty($participante['instituicao'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($participante['instituicao'])) . ")</td></tr>";
					}
					$html .= "<tr><td>&nbsp;</td></tr>";
					// Co-Autor, Co-Coordenador
					if(!empty($trabalho['co_autor'])){
						$html .= "<tr><td align='right'>" . mb_strtoupper($trabalho['co_autor']) . "</td></tr>";
					} //if
					if(!empty($trabalho['instituicao_co_autor'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($trabalho['instituicao_co_autor'])) . ")</td></tr>";
					}
					
					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td align='left'><span style='font-size:13px;'>" . $trabalho['tipo_trabalho'] . "</span></td></tr>";
					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td>" . $trabalho['resumo'] . "</td></tr>";
				}//foreach trabalhos_aceitos
				$html .= "<tr><td>&nbsp;</td></tr>";
				$html .= "<tr><td>&nbsp;</td></tr>";
			}//if trabalhos aceitos
		} //foreach participantes
		$html .= "<tr><td>&nbsp;</td></tr>";
		$html .= "</table>";

		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename='.$nome_arquivo.'.doc');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;
	}
	
	/**
	* Função que carrega trabalhos ACEITOS de um determinado participante
	*/
	function trabalhos_aceitos_participante($id_participante, $filtros = NULL){
		
		
		/*
		print "ID Participante: <pre>";
			print_r($id_participante);
		print "</pre>";
		print "Filtros: <pre>";
			print_r($filtros);
		print "</pre>";
		*/

		// $trabalhos: lista de trabalhos do participante em questão
		$trabalhos = array();

		// Incluindo a classe que verifica se o trabalho foi aceito, para poder usar o método aceito() dela.
		require_once("controles/ctrl_avaliacao.php");
		$ctrl_avaliacao = new ctrl_avaliacao();

		// Pegando os trabalhos de acordo com os filtros
		if(is_array($filtros)){
			foreach($filtros as $filtro){
				/*
				"comunicacao_individual"=>"Resumo de Comunica&ccedil;&atilde;o Individual",
				"poster"=>"Resumo de P&ocirc;ster",
				"coordenada"=>"Resumo de Sess&atilde;o Coordenada",
				"trabalho_em_coordenada"=>"Resumo de Trabalho em Sess&atilde;o Coordenada",
				"simposio"=>"Resumo de Simp&oacute;sio",
				"trabalho_em_simposio"=>"Resumo de Trabalho em Simp&oacute;sio"
				*/
				switch($filtro){
					case "comunicacao_individual":
						// Comunicações Individuais deste participante
						$sql = "SELECT id, titulo, resumo, co_autor
							FROM ev_resumo
							WHERE 
								autor = ".$id_participante." 
								AND id_tipo_trabalho = 3 
								AND id_evento = ".$this->id_evento."
								ORDER BY titulo ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de Comunica&ccedil;&atilde;o Individual';
				
							// Co-autor
							$sql = "SELECT nome, instituicao FROM ev_participante WHERE id = '".$linha['co_autor']."'";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['nome'];
							$linha['instituicao_co_autor'] = $co_autor['instituicao'];
							
							/*
							print "<hr>";
							print_r($co_autor);
							print "<hr><hr><br>";
							/**/

							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'comunicacao_individual')) array_push($trabalhos, $linha);
						} //while
						break;
						
					case "poster":
						// Pôsteres deste participante
						$sql = "SELECT id, titulo, resumo, co_autor
							FROM ev_resumo
							WHERE 
								autor = ".$id_participante." 
								AND id_tipo_trabalho = 4 
								AND id_evento = ".$this->id_evento."
								ORDER BY titulo ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de P&ocirc;ster';
				
							// Co-autor
							$sql = "SELECT nome, instituicao FROM ev_participante WHERE id = '".$linha['co_autor']."'";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['nome'];
							$linha['instituicao_co_autor'] = $co_autor['instituicao'];

							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'poster')) array_push($trabalhos, $linha);
						} //while
						break;
						
					case "coordenada":
						// Resumos de Sessões Coordenadas deste participante
						$sql = "SELECT id, titulo_sessao AS titulo, resumo_sessao AS resumo
							FROM ev_comunicacao_coordenada
							WHERE 
								id_coordenador = ".$id_participante." 
								AND id_evento = ".$this->id_evento."
								ORDER BY titulo_sessao ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de Sess&atilde;o Coordenada';
				
							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'comunicacao_coordenada')) array_push($trabalhos, $linha);
						} //while
						break;
					
					case "trabalho_em_coordenada":
						// Resumos deste participante em Comunicações Coordenadas
						$sql = "SELECT id, titulo, resumo, co_autor
							FROM ev_resumo
							WHERE 
								autor = ".$id_participante." 
								AND id_tipo_trabalho = 2 
								AND id_comunicacao_coordenada <> 0 
								AND id_evento = ".$this->id_evento."
							ORDER BY titulo ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de Trabalho em Sess&atilde;o Coordenada';
				
							// Co-autor
							$sql = "SELECT nome, instituicao FROM ev_participante WHERE id = '".$linha['co_autor']."'";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['nome'];
							$linha['instituicao_co_autor'] = $co_autor['instituicao'];

							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'resumo_em_coordenada')) array_push($trabalhos, $linha);
						} //while
						break;
					
					case "simposio":
						// Resumos de Simpósios deste participante
						$sql = "SELECT s.id, s.titulo_sessao AS titulo, s.resumo_sessao AS resumo
							FROM ev_simposio s, ev_simposio_coordenador sc
							WHERE 
								sc.id_participante = ".$id_participante." 
								AND s.id = sc.id_simposio 
								AND id_evento = ".$this->id_evento."
								AND sc.ordem = 1
							ORDER BY s.titulo_sessao ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de Simp&oacute;sio';
				
							// Co-autor
							$sql = "SELECT p.nome, p.instituicao 
								FROM ev_participante p, ev_simposio_coordenador sc
								WHERE 
									sc.id_simposio = '".$linha['id']."'
									AND sc.id_participante = p.id
									AND sc.ordem = 2
									";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['nome'];
							$linha['instituicao_co_autor'] = $co_autor['instituicao'];

							// Todos os simpósios, integralmente, são aceitos. Adicionando à lista de trabalhos do participante
							array_push($trabalhos, $linha);
						} //while
						break;
					
					case "trabalho_em_simposio":
						// Resumos de Trabalho deste participante em Simpósios
						$sql = "SELECT id, titulo, resumo, co_autor
							FROM ev_resumo
							WHERE 
								autor = ".$id_participante." 
								AND id_tipo_trabalho = 1 
								AND id_simposio <> 0 
								AND id_evento = ".$this->id_evento."
							ORDER BY titulo ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de Trabalho em Simp&oacute;sio';
				
							// Co-autor
							$sql = "SELECT nome, instituicao FROM ev_participante WHERE id = '".$linha['co_autor']."'";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['nome'];
							$linha['instituicao_co_autor'] = $co_autor['instituicao'];

							// Não precisa verficar se os resumos em simpósios foram aceitos. Todos os simpósios, integralmente, foram aceitos.
							array_push($trabalhos, $linha);
						} //while
						break;
				} //switch
			} //foreach
		} //if
		
		return $trabalhos;
	}
	
	/**
	* Exibe tela com opções de filtros (modalidades) para geração do relatório com todos os trabalhos avaliados e aceitos.
	* Serão exibidos os resumos em ordem alfabética de autor.
	*/
	function filtros_aceitos(){
		return "filtros_aceitos";
	}

	/**
	* Exibe tela com opções de filtros (opções) para geração de relatórios diferentes de participantes.
	*/
	function filtros_participantes(){
		return "filtros_participantes";
	}

	/**
	* Lista todos os participantes de acordo com os filtros selecionados.
	* Exibe em HTML, mas deve existir a opção de exportar para DOC.
	*/
	function listar_participantes_filtrados(){
		require_once("conexao.php");
		
		$filtro = $_POST['filtro'];
		
		$view = array();
		$sql = "";
		switch($filtro){
			case "completo":
				/*
				$sql = "SELECT UPPER(nome) AS nome, LOWER(email) AS email, id, id_tipo_participante, id_estado, id_cidade, id_formacao, datanascimento, cpf, passaporte, senha, endereco, bairro, cep, telefone, modalidade_participacao, id_associado_alab, instituicao
				FROM ev_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
				
				$view['label_tipo'] = "COMPLETO";
				$view['tipo'] = "completo";
				*/
				$this->listar_participantes();
				break;

			case "todos":
				$sql = "SELECT UPPER(nome) AS nome, LOWER(email) AS email FROM ev_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
				$view['label_tipo'] = "TODOS (nome e email)";
				$view['tipo'] = "todos";
				break;

			case "estrangeiros":
				$sql = "SELECT UPPER(nome) AS nome, LOWER(email) AS email FROM ev_participante 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND (cpf = NULL OR cpf = '' OR cpf = '00000000000')
						AND (passaporte <> NULL OR passaporte <> '')
						AND (pais <> 'Brasil')
					ORDER BY nome ASC";
					// Há registros com passaporte mas sem país... Nestes casos, optei por verificar somente o passaporte.
					// A linha abaixo seria o ideal caso tivesse passaporte e país.
					// AND (pais <> 'Brasil'  AND  pais <> 'Preencha com um país'  AND  pais <> NULL  AND  pais <> '')

				$view['label_tipo'] = "ESTRANGEIROS";
				$view['tipo'] = "estrangeiros";
				break;

			case "ouvintes":
				$sql = "SELECT UPPER(nome) AS nome, LOWER(email) AS email FROM ev_participante 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND modalidade_participacao = 0
					ORDER BY nome ASC";

				$view['label_tipo'] = "OUVINTES";
				$view['tipo'] = "ouvintes";
				break;

			case "pagantes":
				$sql = "SELECT UPPER(p.nome) AS nome, LOWER(p.email) AS email FROM ev_participante p, ev_pagamento pag
				  WHERE
					id_evento='".$this->id_evento."' 
					AND p.id = pag.id_participante
					AND pag.pago = 'sim'
					ORDER BY p.nome ASC";

				$view['label_tipo'] = "PAGARAM";
				$view['tipo'] = "pagantes";
				break;

			case "nao_pagantes":
				$sql = "SELECT UPPER(p.nome) AS nome, LOWER(p.email) AS email FROM ev_participante p, ev_pagamento pag
				  WHERE
					id_evento='".$this->id_evento."' 
					AND p.id = pag.id_participante
					AND pag.pago = 'nao'
					ORDER BY p.nome ASC";

				$view['label_tipo'] = "NÃO PAGARAM";
				$view['tipo'] = "nao_pagantes";
				break;
		}//switch
		$GLOBALS['view'] = $view;
		
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		while($participante = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$GLOBALS['participantes'][] = $participante;
		}

		return "relatorio_participantes";
	}
	
	/**
	* Exporta os participantes filtrados, para Excel
	*/
	function exportar_participantes_excel(){
		
		
		$tipo_label = addslashes($_POST['tipo_label']);
		
		$participantes_deserializados = $_POST['participantes'];
		/*
		print "Participantes deserializados: <pre>";
			print_r($participantes_deserializados);
		print "</pre>";
		/**/
		$participantes_deserializados = str_replace("'", "\"", $participantes_deserializados);
		/*
		print "Participantes deserializados: <pre>";
			print_r($participantes_deserializados);
		print "</pre>";
		/**/
		$participantes_deserializados = unserialize($participantes_deserializados);
		/*
		print "Participantes deserializados: <pre>";
			print_r($participantes_deserializados);
		print "</pre>";
		/**/

		$html = "<table border=\"1\">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
						</tr>
					</thead>";
		if(is_array($participantes_deserializados)){
			foreach($participantes_deserializados as $participante){
				$html .= "<tr>
							<td>".$participante['nome']."</td>
							<td>".$participante['email']."</td>
						  </tr>";
			} // foreach
		} //if
		$html .= '</table>';

		// Pegar título do evento e tratar
		$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$evento = mysql_fetch_assoc($result);
		$nome_arquivo = $evento['titulo'] . '__Relatorio_de_Participantes_' . $tipo_label . '_' . date('d-m-Y-H\hi\m\i\ns\s');
		$nome_arquivo = $this->tratar_nome($nome_arquivo); // ESTE MÉTODO ESTÁ DECLARADO NO ctrl_generico

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $nome_arquivo . '.xls');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;
	}

	/**
	* Gerar .doc contendo os trabalhos mas sem os resumos.
	*/
	function gerar_trabalhos_doc($trabalhos, $linhas_tematicas = NULL, $participantes = NULL){
		$nome_arquivo = "TRABALHOS";
		$html = "";
		
		$html .= "<table style=\"font-family:sans-serif; text-align:justify;\">";
		foreach($linhas_tematicas as $linha_tematica){ 
			foreach($trabalhos as $trabalho){
				if($linha_tematica["id"] == $trabalho["id_linha_tematica"]){
					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td>Linha Tem&aacute;tica: ".$linha_tematica["titulo"]."</td></tr>";
					if($trabalho["aceito"]){ 
                        $html .= "<tr><td>ACEITO</td></tr>";
					} else { 
                        $html .= "<tr><td>RECUSADO</td></tr>";
					} //else

					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td><strong>" . mb_strtoupper($trabalho['titulo']) . "</strong></td></tr>";
			
					if(!empty($participantes)){
						// Autor
						foreach($participantes as $participante){
							if($participante["id"] == $trabalho["autor"]) {
								$html .= "<tr><td>" . $participante['nome'] . "</td></tr>";
								if(!empty($participante['instituicao'])){
									$html .= "<tr><td>(" . mb_strtoupper(trim($participante['instituicao'])) . ")</td></tr>";
								}
							}//if
						}//foreach

						// Co-Autor
						foreach($participantes as $participante){
							if($participante["id"] == $trabalho["co_autor"]) {
								$html .= "<tr><td>" . $participante['nome'] . "</td></tr>";
								if(!empty($participante['instituicao'])){
									$html .= "<tr><td>(" . mb_strtoupper(trim($participante['instituicao'])) . ")</td></tr>";
								}
							}//if
						}//foreach
					}//if

					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td align='left'><span style='font-size:13px;'>" . $trabalho['tipo_trabalho'] . "</span></td></tr>";
				}//if
			}//foreach 
		} // foreach

		/**/
		$html .= "<tr><td>&nbsp;</td></tr>";
		$html .= "</table>";
		/**/

		/*
		echo $html;
		exit("<hr />ctrl_relatorio");
		/**/

		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename='.$nome_arquivo.'.doc');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;
	}
	
	
	function listar_simposios_sem_resumos(){
		

		/* Simpósios */
		$sql = "SELECT * FROM ev_simposio WHERE id_evento='".$this->id_evento."' ORDER BY titulo_sessao ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		$simposios = $registros;
		
		/* Tópicos */
		$sql_topicos = "SELECT * FROM ev_topico_simposio WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result_topicos = mysql_query($sql_topicos) or trigger_error(mysql_error(), E_USER_ERROR);
		$topicos = array();
		while($linha = mysql_fetch_array($result_topicos)){
			array_push($topicos, $linha);
		} //while

		/* Resumos do Simpósio */
		$sql = "SELECT * FROM ev_resumo
			WHERE 
				id_evento='".$this->id_evento."' 
				AND id_simposio > 0
			ORDER BY titulo ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$resumos = array();
		while($linha = mysql_fetch_array($result)){
			array_push($resumos, $linha);
		} //while

		$linhas_tematicas = $this->getLinhasTematicas();
		$participantes = $this->getParticipantes();

		/*
		$simposios = $GLOBALS["simposios"];
		$topicos = $GLOBALS["topicos"];
		$resumos = $GLOBALS["resumos"];
		$linhas_tematicas = $GLOBALS["linhas_tematicas"];
		$participantes = $GLOBALS["participantes"];
		*/

		$nome_arquivo = "Simposios";
		$html = "";
		
		$html .= "<table style=\"font-family:sans-serif; text-align:justify;\">";
		if(!empty($simposios)){
			foreach($simposios as $simposio){ 
				$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
				$html .= "<tr><td colspan='2'>Tópico: ";
					if(!empty($topicos)){
						foreach($topicos as $topico){
							if($topico["id"] == $simposio["id_topico"]) $html .= $topico["nome"]." </td></tr>"; 
						}
					}
				$html .= "<tr><td colspan='2' style=\"text-transform:uppercase; font-weight:bold;\">".$simposio["titulo_sessao"]."</td></tr>";
				

				// Coordenadores
				$sql = "SELECT p.nome, p.instituicao FROM ev_simposio_coordenador sc, ev_participante p
					WHERE 
						sc.id_simposio = '".$simposio["id"]."' 
						AND sc.id_participante = p.id
					ORDER BY ordem ASC";
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$coordenadores = array();
				while($linha = mysql_fetch_array($result)){
					array_push($coordenadores, $linha);
				} //while
				if(!empty($coordenadores)){
					foreach($coordenadores as $coordenador){
						$html .= "<tr><td colspan='2'>".$coordenador["nome"]."</td></tr>";
						$html .= "<tr><td colspan='2'>".$coordenador["instituicao"]."</td></tr>";
					}//foreach
				}//if
				$html .= "<tr><td colspan='2'>&nbsp</td></tr>";

				/* <div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $simposio["resumo_sessao"]; ?></div>
				<div style="margin-bottom:30px;"><strong>Palavras-chave:</strong> <?php echo $simposio["palavras_chave_sessao"]; ?></div> */
				
                // Trabalhos no Simpósio
                if(!empty($resumos)){
                    foreach($resumos as $resumo){ 
                        if( $resumo["id_simposio"] == $simposio["id"] ){ 
                            $html .= "<tr><td width=\"100\">&nbsp;</td><td style=\"text-transform:uppercase; font-weight:bold;\">".$resumo["titulo"]."</td></tr>";
                            
								if(!empty($participantes)){
									// Autor
									foreach($participantes as $participante){
										if($participante["id"] == $resumo["autor"]) {
											$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["nome"]."</td></tr>";
											$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["instituicao"]."</td></tr>";
										}//if
									}//foreach
									//Co-autor
									foreach($participantes as $participante){
										if($participante["id"] == $resumo["co_autor"]) {
											$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["nome"]."</td></tr>";
											$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["instituicao"]."</td></tr>";
										}//if
									}//foreach
								}//if

							/* <div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $resumo["resumo"]; ?></div>
                            <div style="margin-bottom:30px;"><strong>Palavras-chave:</strong> <?php echo $resumo["palavras_chave"]; ?></div> */ 
                            $html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
                        }//if
                    }//foreach 
                } //if ?>
			<?php }//foreach 
		} //if
		
		$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
		$html .= "</table>";
	
		/*
		echo $html;
		exit("<hr />listar_simposio_sem_resumos");
		/**/

		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename='.$nome_arquivo.'.doc');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;
	} // function

	function listar_coordenadas_sem_resumos($id_linha_tematica = NULL){
		

		//$id_linha_tematica = (int) $_GET["id_linha_tematica"];
	
		// Comunicações Coordenadas
		if($id_linha_tematica){
			$sql = "SELECT * FROM ev_comunicacao_coordenada 
				WHERE 
					id_evento='".$this->id_evento."' 
					AND id_linha_tematica = ".$id_linha_tematica."
				ORDER BY titulo_sessao ASC";
		}else{
			$sql = "SELECT * FROM ev_comunicacao_coordenada WHERE id_evento='".$this->id_evento."' ORDER BY titulo_sessao ASC";
		}
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$registros = array();
		while($linha = mysql_fetch_array($result)){
			array_push($registros, $linha);
		} //while
		
		// Verificando se as comunicações individuais foram aceitas
		require("controles/ctrl_avaliacao.php");
		$ctrl_avaliacao = new ctrl_avaliacao();
		foreach($registros as &$registro){
			$registro['aceito'] = $ctrl_avaliacao->aceito($registro['id'], 'comunicacao_coordenada');
		} // foreach
		$comunicacoes_coordenadas = $registros;

		/* Resumos do Comunicações Coordenadas */
		$sql = "SELECT * FROM ev_resumo
			WHERE 
				id_evento='".$this->id_evento."' 
				AND id_comunicacao_coordenada > 0
			ORDER BY titulo ASC";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$resumos = array();
		while($linha = mysql_fetch_array($result)){
			array_push($resumos, $linha);
		} //while
		$resumos = $resumos;

		$linhas_tematicas = $this->getLinhasTematicas();
		$participantes = $this->getParticipantes();


		$nome_arquivo = "Comunicacoes_Coordenadas";
		$html = "";
		
		$html .= "<table style=\"font-family:sans-serif; text-align:justify;\">";

		if(!empty($comunicacoes_coordenadas)){
			foreach($linhas_tematicas as $linha_tematica){
				foreach($comunicacoes_coordenadas as $comunicacao_coordenada){ 
					if($linha_tematica["id"] == $comunicacao_coordenada["id_linha_tematica"]){
						$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
						$html .= "<tr><td colspan='2'>Linha Tem&aacute;tica: ".$linha_tematica["titulo"]."</td></tr>";
						
						// ACEITA OU RECUSADA
						if($comunicacao_coordenada["aceito"]){ 
							$html .= "<tr><td colspan='2'>ACEITA</td></tr>";
						} else { 
							$html .= "<tr><td colspan='2'>RECUSADA</td></tr>";
						} //else
						$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
						$html .= "<tr><td colspan='2' style=\"text-transform:uppercase; font-weight:bold;\">".$comunicacao_coordenada["titulo_sessao"]."</td></tr>";
						
						// Coordenador 
						if(!empty($participantes)){
							foreach($participantes as $participante){
								if($participante["id"] == $comunicacao_coordenada["id_coordenador"]) {
									$html .= "<tr><td colspan='2'>".$participante["nome"]."</td></tr>";
									$html .= "<tr><td colspan='2'>".$participante["instituicao"]."</td></tr>";
								}//if
							}//foreach
						}//if
						$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
						
						// Resumos
						if(!empty($resumos)){
							foreach($resumos as $resumo){ 
								if( $resumo["id_comunicacao_coordenada"] == $comunicacao_coordenada["id"] ){ 
									$html .= "<tr><td width=\"100\">&nbsp;</td><td style=\"text-transform:uppercase; font-weight:bold;\">".$resumo["titulo"]."</td></tr>";
									if(!empty($participantes)){
										// Autor
										foreach($participantes as $participante){
											if($participante["id"] == $resumo["autor"]) {
												$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["nome"]."</td></tr>";
												$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["instituicao"]."</td></tr>";
											}//if
										}//foreach
										// Co-Autor
										foreach($participantes as $participante){
											if($participante["id"] == $resumo["co_autor"]) {
												$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["nome"]."</td></tr>";
												$html .= "<tr><td width=\"100\">&nbsp;</td><td>".$participante["instituicao"]."</td></tr>";
											}//if
										}//foreach
										$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
									}//if
								}//if
							}//foreach 
						} //if ?>
					<?php }//if
				}//foreach
			}//foreach 
		} //if
				
		$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
		$html .= "</table>";
	
		/*
		echo $html;
		exit("<hr />listar_simposio_sem_resumos");
		/**/

		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename='.$nome_arquivo.'.doc');
		header('Pragma: no-cache');
		header('Expires: 0');
		print $html;
		exit;
	} // function

}
?>