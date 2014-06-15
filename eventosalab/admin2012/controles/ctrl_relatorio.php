<?php
class ctrl_relatorio extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		//$this->tabela = "ev_relatorio";
	}

	function relatorios(){
		$tipos = array("posteres", "papers");
		$GLOBALS["tipos"] = $tipos;
		return "relatorios";
	}
	
	function listar_participantes(){
		
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
	
		$sql_participante = "SELECT ev.id AS id_participante, ev.id_tipo_participante, ev.modalidade_participacao, us.* FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
		$result_participante = mysql_query($sql_participante) or trigger_error(mysql_error(), E_USER_ERROR);
		while($participante = mysql_fetch_array($result_participante)) {
			$id                      = $participante["id_participante"];
			$id_tipo_participante    = $participante["id_tipo_participante"];
			if($participante['tipo_residencia'] == 1){
				$id_estado           = $participante["id_estado_res"];
				$id_cidade           = $participante["id_cidade_res"];
			}
			else{
				$estado              = $participante["estado_res"];
				$cidade              = $participante["cidade_res"];	
			}
			$formacao             	 = $participante["titulacao_academica"];
			$nome                    = $participante["name"];
			$data_nascimento         = $participante["data_nascimento"];
			$cpf                     = $participante["cpf"];
			$passaporte              = $participante["Passport"];
			$email                   = $participante["email"];
			$endereco                = $participante["endereco_res"];
			$bairro                  = $participante["bairro_res"];
			$cep                     = $participante["cep_res"];
			$telefone                = $participante["telefone_res"];
			$modalidade_participacao = $participante["modalidade_participacao"];
			$id_associado_alab       = $participante["id"];
			$instituicao             = $participante["sigla_instituicao"];
	
			/* Tipo Participante */
			$sql = "SELECT nome FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' AND id='".$id_tipo_participante."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$tipo_participante = $linha["nome"];

			/* data Nascimento */
			if($data_nascimento == "0000-00-00") $datana_scimento = "";

			if($participante["tipo_residencia"] == 1){
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
			}

			/* Inscrição com/sem trabalho */
			if ($modalidade_participacao=='0') $modalidade_participacao='Sem trabalho';
			if ($modalidade_participacao=='1') $modalidade_participacao='Com trabalho';

			/* Pagamento */
			$sql = "SELECT pago FROM ev_pagamento WHERE id_participante='".$id."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$rows_pago = mysql_num_rows($result);
			if($rows_pago > 0){
				$pago = $linha["pago"];
				if ($pago=='sim') $pago='Sim';
				if ($pago=='nao') $pago='Não';
			}
			else{
				$pago = 'Não';	
			}

			/* Evento */
			$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha = mysql_fetch_array($result);
			$evento = $linha["titulo"];
			
			$html .= "<tr>
						<td>$id</td>
						<td>$nome</td>
						<td>$email</td>
						<td>$tipo_participante</td>
						<td>$evento</td>
						<td>$formacao</td>
						<td>$data_nascimento</td>
						<td>'$cpf'</td>
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
		while($linha = mysql_fetch_assoc($result)){
			array_push($registros, $linha);
		} //while
		
		return $registros;
	}

	function getParticipantes($params = array()){
		
		$attr_order  = (!empty($params['attr_order'])) ? $params['attr_order'] : "us.name";
		$attr_select = (!empty($params['attr_select'])) ? $params['attr_select'] : "ev.id, us.name, us.email, us.sigla_instituicao";
		$attr_where  = (!empty($params['attr_where'])) ? " AND " . $params['attr_where'] : "";
	
		$sql = "SELECT ".$attr_select." FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' ".$attr_where." AND ev.id_associado_alab = us.id ORDER BY ".$attr_order." ASC";
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

	function listar_papers(){
		
		$exibir_linhas = (int) $_GET["exibir_linhas"];
		
		if(!$exibir_linhas){
			$id_linha_tematica = (int) $_GET["id_linha_tematica"];
		
			if($id_linha_tematica){
				$sql = "SELECT * FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_tipo_trabalho=5 
						AND id_linha_tematica = ".$id_linha_tematica."
					ORDER BY titulo ASC";
			}else{
				$sql = "SELECT * FROM ev_resumo 
					WHERE 
						id_evento='".$this->id_evento."' 
						AND id_tipo_trabalho=5 
					ORDER BY titulo ASC";
			}
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$registros = array();
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
				array_push($registros, $linha);
			} //while
			
			// Verificando se os papers foram aceitos, para setar o atributo $registro['aceito']
			require("controles/ctrl_avaliacao.php");
			$ctrl_avaliacao = new ctrl_avaliacao();
			foreach($registros as &$registro){
				$registro['aceito'] = $ctrl_avaliacao->aceito($registro['id'], 'paper');
			} // foreach
			
			
			if($_REQUEST['sem_resumo']){
				$this->gerar_trabalhos_doc($registros, $this->getLinhasTematicas(), $this->getParticipantes());
			}else{
				// Setando as variáveis globais para uso na tela (view)
				$GLOBALS["papers"] = $registros;
				$GLOBALS["linhas_tematicas"] = $this->getLinhasTematicas();
				$GLOBALS["participantes"] = $this->getParticipantes();
			}
	
			return "relatorio_papers";
		}else{
			$GLOBALS["id_tipo_trabalho"] = 5;
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
		$params['attr_order']  = "us.name";
		$params['attr_select'] = "ev.id, us.name, us.sigla_instituicao, ev.modalidade_participacao";
		$params['attr_where']  = " ev.modalidade_participacao = 1 ";
		$html .= "<table style=\"font-family:sans-serif; text-align:justify;\">";
		foreach($this->getParticipantes($params) as $participante){
			// Pegar todos os trabalhos do participante de acordo com os filtros
			$trabalhos_aceitos = $this->trabalhos_aceitos_participante($participante['id'], $filtros);
			
			if(is_array($trabalhos_aceitos) && (count($trabalhos_aceitos) > 0)){
				foreach($trabalhos_aceitos as $trabalho){
					$html .= "<tr><td>&nbsp;</td></tr>";
					$html .= "<tr><td align='center'><strong>" . mb_strtoupper($trabalho['titulo']) . "</strong></td></tr>";
					$html .= "<tr><td>&nbsp;</td></tr>";

					// Autor, Coordenador
					$html .= "<tr><td align='right'>" . mb_strtoupper($participante['name']) . "</td></tr>";
					if(!empty($participante['sigla_instituicao'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($participante['sigla_instituicao'])) . ")</td></tr>";
					}
					$html .= "<tr><td>&nbsp;</td></tr>";
					// Co-Autor, Co-Coordenador
					if(!empty($trabalho['co_autor'])){
						$html .= "<tr><td align='right'>" . mb_strtoupper($trabalho['co_autor']) . "</td></tr>";
					} //if
					if(!empty($trabalho['instituicao_co_autor'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($trabalho['instituicao_co_autor'])) . ")</td></tr>";
					}
					if(!empty($trabalho['co_autor2'])){
						$html .= "<tr><td align='right'>" . mb_strtoupper($trabalho['co_autor2']) . "</td></tr>";
					} //if
					if(!empty($trabalho['instituicao_co_autor2'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($trabalho['instituicao_co_autor2'])) . ")</td></tr>";
					}
					if(!empty($trabalho['co_autor3'])){
						$html .= "<tr><td align='right'>" . mb_strtoupper($trabalho['co_autor3']) . "</td></tr>";
					} //if					
					if(!empty($trabalho['instituicao_co_autor3'])){
						$html .= "<tr><td align='right'>(" . mb_strtoupper(trim($trabalho['instituicao_co_autor3'])) . ")</td></tr>";
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

		//header('Content-Type: application/vnd.ms-word');
		//header('Content-Disposition: attachment; filename='.$nome_arquivo.'.doc');
		//header('Pragma: no-cache');
		//header('Expires: 0');
		print $html;
		exit;
	}
	
	/**
	* Função que carrega trabalhos ACEITOS de um determinado participante
	*/
	function trabalhos_aceitos_participante($id_participante, $filtros = NULL){
		

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
						
					case "poster":
						// Pôsteres deste participante
						$sql = "SELECT id, titulo, resumo, co_autor, co_autor2, co_autor3
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
							$sql = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor']."' AND ev.id_associado_alab = us.id";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['name'];
							$linha['instituicao_co_autor'] = $co_autor['sigla_instituicao'];
							
							// Co-autor2
							$sql2 = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor2']."' AND ev.id_associado_alab = us.id";
							$result2 = mysql_query($sql2) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor2 = mysql_fetch_assoc($result2);
							$linha['co_autor2'] = $co_autor2['name'];
							$linha['instituicao_co_autor2'] = $co_autor2['sigla_instituicao'];

							// Co-autor3
							$sql3 = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor3']."' AND ev.id_associado_alab = us.id";
							$result3 = mysql_query($sql3) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor3 = mysql_fetch_assoc($result3);
							$linha['co_autor3'] = $co_autor3['name'];
							$linha['instituicao_co_autor3'] = $co_autor3['sigla_instituicao'];
							
							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'poster')) array_push($trabalhos, $linha);
						} //while
						break;
						
					case "paper":
						// Papess deste participante
						$sql = "SELECT id, titulo, resumo, co_autor, co_autor2, co_autor3
							FROM ev_resumo
							WHERE 
								autor = ".$id_participante." 
								AND id_tipo_trabalho = 5 
								AND id_evento = ".$this->id_evento."
								ORDER BY titulo ASC";
						$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
						while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
							$linha['tipo_trabalho'] = 'Resumo de P&ocirc;ster';
				
							// Co-autor
							$sql = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor']."' AND ev.id_associado_alab = us.id";
							$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor = mysql_fetch_assoc($result);
							$linha['co_autor'] = $co_autor['name'];
							$linha['instituicao_co_autor'] = $co_autor['sigla_instituicao'];
							
							// Co-autor2
							$sql2 = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor2']."' AND ev.id_associado_alab = us.id";
							$result2 = mysql_query($sql2) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor2 = mysql_fetch_assoc($result2);
							$linha['co_autor2'] = $co_autor2['name'];
							$linha['instituicao_co_autor2'] = $co_autor2['sigla_instituicao'];

							// Co-autor3
							$sql3 = "SELECT us.name, us.sigla_instituicao FROM ev_participante ev, jos_users us WHERE ev.id = '".$linha['co_autor3']."' AND ev.id_associado_alab = us.id";
							$result3 = mysql_query($sql3) or trigger_error(mysql_error(), E_USER_ERROR);
							$co_autor3 = mysql_fetch_assoc($result3);
							$linha['co_autor3'] = $co_autor3['name'];
							$linha['instituicao_co_autor3'] = $co_autor3['sigla_instituicao'];

							// Verificando se este trabalho foi aceito e adicionando à lista de trabalhos do participante
							if($ctrl_avaliacao->aceito($linha['id'], 'paper')) array_push($trabalhos, $linha);
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
				$this->listar_participantes();
				break;

			case "todos":
				$sql = "SELECT UPPER(us.name) AS name, LOWER(us.email) AS email FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY name ASC";
				$view['label_tipo'] = "TODOS (nome e email)";
				$view['tipo'] = "todos";
				break;

			case "estrangeiros":
				$sql = "SELECT UPPER(us.name) AS name, LOWER(us.email) AS email FROM ev_participante ev, jos_users us 
					WHERE 
						ev.id_evento='".$this->id_evento."' 
						AND (us.tipo_documento = 2)
						AND (us.Passport <> NULL OR us.Passport <> '')
						AND (us.pais_res <> 'Brasil' OR us.pais_res <> 'BRASIL')
						AND ev.id_associado_alab = us.id
					ORDER BY name ASC";

				$view['label_tipo'] = "ESTRANGEIROS";
				$view['tipo'] = "estrangeiros";
				break;

			case "ouvintes":
				$sql = "SELECT UPPER(us.name) AS name, LOWER(us.email) AS email FROM ev_participante ev, jos_users us
					WHERE 
						ev.id_evento='".$this->id_evento."' 
						AND ev.modalidade_participacao = 0
						AND ev.id_associado_alab = us.id
					ORDER BY name ASC";

				$view['label_tipo'] = "OUVINTES";
				$view['tipo'] = "ouvintes";
				break;

			case "pagantes":
				$sql = "SELECT UPPER(us.name) AS name, LOWER(us.email) AS email FROM ev_participante ev, jos_users us, ev_pagamento pag
				  WHERE
					ev.id_evento='".$this->id_evento."' 
					AND ev.id = pag.id_participante
					AND pag.pago = 'sim'
					AND ev.id_associado_alab = us.id
					ORDER BY name ASC";

				$view['label_tipo'] = "PAGARAM";
				$view['tipo'] = "pagantes";
				break;

			case "nao_pagantes":
				$sql = "SELECT UPPER(us.name) AS name, LOWER(us.email) AS email FROM ev_participante ev, jos_users us, ev_pagamento pag
				  WHERE
					ev.id_evento='".$this->id_evento."' 
					AND ev.id = pag.id_participante
					AND pag.pago = 'nao'
					AND ev.id_associado_alab = us.id
					ORDER BY us.name ASC";

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
							<td>".$participante['name']."</td>
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
		header('Content-Type: text/html; charset=utf8');
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
								$html .= "<tr><td>" . $participante['name'] . "</td></tr>";
								if(!empty($participante['sigla_instituicao'])){
									$html .= "<tr><td>(" . mb_strtoupper(trim($participante['sigla_instituicao'])) . ")</td></tr>";
								}
							}//if
						}//foreach

						// Co-Autor
						foreach($participantes as $participante){
							if($participante["id"] == $trabalho["co_autor"]) {
								$html .= "<tr><td>" . $participante['name'] . "</td></tr>";
								if(!empty($participante['instituicao'])){
									$html .= "<tr><td>(" . mb_strtoupper(trim($participante['sigla_instituicao'])) . ")</td></tr>";
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
	
	

}
?>