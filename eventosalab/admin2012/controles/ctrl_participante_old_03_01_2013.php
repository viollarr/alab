<?php
class ctrl_participante extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_participante ev, jos_users us";
		require_once("conexao.php");
	}
	
	function listar(){
		/* Participantes */
		$modalidade = '';
		if(isset($_GET['modalidade'])){
			if($_GET['modalidade'] == 1){
				$modalidade = 	"AND ev.modalidade_participacao = 1 ";
			}else{
				$modalidade = 	"AND ev.modalidade_participacao = 0 ";
			}
		}
		$sql = "SELECT ev.id, us.name, us.email, ev.id_tipo_participante FROM ".$this->tabela." WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id $modalidade ORDER BY us.name ASC";
		$result = mysql_query($sql) or die (mysql_error());
		$participantes = array();
		while(list($id, $name, $email, $id_tipo_participante) = mysql_fetch_array($result)){
			$linha = array();
		
			$linha["id"]    = $id;
			$linha["name"]  = $name;
			$linha["email"] = $email;
			$linha["id_tipo_participante"] = $id_tipo_participante;
			$linha["possui_trabalho"]      = false;
			
			// Verifica se é Autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
			$sql = "SELECT id FROM ev_resumo WHERE autor='".$id."' ORDER BY id ASC";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$linha["possui_trabalho"] = (mysql_num_rows($res) > 0) ? true : false;
			
			// Verifica se é Co-autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
			$sql = "SELECT id FROM ev_resumo WHERE co_autor='".$id."' ORDER BY id ASC";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true; // Não se pode fazer o mesmo que acima pois poderia alterar o true do autor.
			
			// Verifica se é Co-autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
			$sql = "SELECT id FROM ev_resumo WHERE co_autor2='".$id."' ORDER BY id ASC";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true; // Não se pode fazer o mesmo que acima pois poderia alterar o true do autor.
			
			// Verifica se é Co-autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
			$sql = "SELECT id FROM ev_resumo WHERE co_autor3='".$id."' ORDER BY id ASC";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true; // Não se pode fazer o mesmo que acima pois poderia alterar o true do autor.
			// Adiciona essa linha de registro na variável que será passada para a TELA PARTICIPANTES
			array_push($participantes, $linha);
		} //while
		$GLOBALS["participantes"] = $participantes;

		/* Tipos de Participantes */
		$id_tipo_participante = (int) $_GET['id_tipo_participante'];
		$GLOBALS["id_tipo_participante"] = $id_tipo_participante;
		
		$sql_tipos = (empty($id_tipo_participante)) 
			? "SELECT id, nome FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC"
			: "SELECT id, nome FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' AND id = '".$id_tipo_participante."'";
		$result_tipos = mysql_query($sql_tipos);
		$tipos = array();
		while($linha = mysql_fetch_array($result_tipos)){
			array_push($tipos, $linha);			
		} //while
		$GLOBALS["tipos"] = $tipos;

		return "participantes";
	}

	function abrir_edicao(){
		$id_participante = addslashes( (int) $_GET["id_participante"] );

		if(!empty($id_participante)){
			/* Participante */
			$sql = "SELECT us.*, ev.id_associado_alab, ev.observacoes, ev.id AS id_participante, ev.id_tipo_participante, ev.modalidade_participacao FROM ".$this->tabela." WHERE ev.id='".$id_participante."' AND ev.id_associado_alab = us.id LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$participantes = array();
			while($linha = mysql_fetch_array($result)){
				array_push($participantes, $linha);
			} //while
			$participante = $participantes[0];
			$participante['cpf'] = substr($participante['cpf'], 0,3).'.'.substr($participante['cpf'], 3,3).'.'.substr($participante['cpf'], 6,3).'-'.substr($participante['cpf'], 9,2);

			/* Pagamento */
			$sql_pgmto = "SELECT * FROM ev_pagamento WHERE id_participante='".$id_participante."' LIMIT 1";
			$result_pgmto = mysql_query($sql_pgmto);
			$pagamentos = array();
			while($linha = mysql_fetch_array($result_pgmto)){
				array_push($pagamentos, $linha);			
			} //while
			$GLOBALS["pagamento"] = $pagamentos[0];

			$texto_botao = "Editar";
			$titulo_view = "Edi&ccedil;&atilde;o";
		}else{
			$sql_user = "SELECT us.id , us.name FROM jos_users us LEFT OUTER JOIN ev_participante ev ON us.id = ev.id_associado_alab WHERE us.usertype <>'Super Administrator' AND ev.id_evento <> '".$this->id_evento."' ORDER BY us.name ASC";
			//var_dump($select_user);
			//$sql_user = "SELECT id, name FROM jos_users WHERE usertype <> 'Super Administrator' AND ev.id_evento <> '".$this->id_evento."'  ORDER BY name ASC";
			$query_user = mysql_query($sql_user);
			$participante_novo = array();
			while($result_user = mysql_fetch_array($query_user)){
				array_push($participante_novo, $result_user);
			}
			$GLOBALS["participante_novo"] = $participante_novo;	
			$texto_botao = "Cadastrar";
			$titulo_view = "Inser&ccedil;&atilde;o";
		}
		$GLOBALS["participante"] = $participante;
		$GLOBALS["texto_botao"] = $texto_botao;
		$GLOBALS["titulo_view"] = $titulo_view;

		/* Cidade */
		$sql_cidades = "SELECT cod_cidades, nome FROM ev_cidades ORDER BY nome ASC";
		$result_cidades = mysql_query($sql_cidades);
		$cidades = array();
		while($linha = mysql_fetch_array($result_cidades)){
			array_push($cidades, $linha);			
		} //while
		$GLOBALS["cidades"] = $cidades;

		/* Estados */
		$sql_estados = "SELECT * FROM ev_estados ORDER BY nome ASC";
		$result_estados = mysql_query($sql_estados);
		$estados = array();
		while($linha = mysql_fetch_array($result_estados)){
			array_push($estados, $linha);			
		} //while
		$GLOBALS["estados"] = $estados;

		/* Formação Acadêmica */
		$sql_formacoes = "SELECT * FROM ev_formacao_academica ORDER BY formacao ASC";
		$result_formacoes = mysql_query($sql_formacoes);
		$formacoes = array();
		while($linha = mysql_fetch_array($result_formacoes)){
			array_push($formacoes, $linha);			
		} //while
		$GLOBALS["formacoes"] = $formacoes;
		
		/* Tipos de Participante */
		$sql_tipos = "SELECT id, nome FROM ev_tipo_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result_tipos = mysql_query($sql_tipos);
		$tipos = array();
		while($linha = mysql_fetch_array($result_tipos)){
			array_push($tipos, $linha);			
		} //while
		$GLOBALS["tipos"] = $tipos;
		
		return "participante";
	}
	
	function salvar_edicao(){
		require_once("funcoes/special_ucwords.php");
	
		$id_participante 			= addslashes((int) $_POST["id_participante"]);
		$id_joomla 					= addslashes((int) $_POST["id_joomla"]);
		$id_tipo_participante 		= addslashes( (int) $_POST["id_tipo_participante"]);
		$nome            			= special_ucwords($_POST["nome"]);
        $data_nascimento  			= $_POST["data_nascimento"];
		$tipo_documento	 			= $_POST["tipo_documento"];
		if($tipo_documento == 1){
			$Passport 				= '';
			$procura=array('.','-');
			$cpf					= str_replace($procura,'',$_POST['cpf']);
		}
		elseif($tipo_documento == 2){
			$cpf 					= '';
			$Passport   	 		= addslashes($_POST["Passport"]);
		}
		$email           			= strtolower( trim(addslashes($_POST["email"])) );
		$senha           			= addslashes($_POST["senha"]);
		$endereco        			= addslashes($_POST["endereco"]);
		$bairro          			= addslashes($_POST["bairro"]);
		$cep             			= addslashes($_POST["cep"]);
		$telefone        			= addslashes($_POST["telefone"]);
		$sigla_instituicao  		= addslashes($_POST["sigla_instituicao"]);
		$pais            			= addslashes($_POST["pais"]);
		$tipo_residencia	 		= $_POST["tipo_residencia"];
		if($tipo_residencia == 1){
			$id_cidade_res     		= addslashes((int)$_POST["id_cidade_res"]);
			$id_estado_res     		= addslashes((int)$_POST["id_estado_res"]);
			$estado_res     		= '';
			$cidade_res     		= '';
		}
		elseif($tipo_residencia == 2){
			$id_cidade_res     		= 0;
			$id_estado_res     		= 0;
			$estado_res     		= addslashes($_POST["estado_res"]);
			$cidade_res     		= addslashes($_POST["cidade_res"]);
		}
		$formacao	     			= addslashes($_POST["formacao"]);
		$modalidade_participacao	= addslashes((int)$_POST["modalidade_participacao"]);
		$observacoes				= addslashes($_POST["observacoes"]);
		
		//$id_pagamento = addslashes( (int) $_POST["id_pagamento"]);
		$pago          				= addslashes($_POST["pago"]);
		
/*		/* Formatando a data de nascimento 
		$arr_data_nasc = explode("/", $datanascimento);
		$data_nasc_format = $arr_data_nasc[2]."/".$arr_data_nasc[1]."/".$arr_data_nasc[0];
*/
		/* Edição */
		if(($id_participante)&&($id_joomla)){
			/* Atualizando cidade, estado e formacao */
			$set = "";
			if(!empty($id_cidade_res)) $set .= ", id_cidade_res = '".$id_cidade_res."'";
			if(!empty($id_estado_res)) $set .= ", id_estado_res = '".$id_estado_res."'";
			if(!empty($cidade_res)) $set .= ", cidade_res = '".$cidade_res."'";
			if(!empty($estado_res)) $set .= ", estado_res = '".$estado_res."'";
			if(!empty($formacao)) $set .= ", titulacao_academica = '".$formacao."'";
	
			$sql = "UPDATE jos_users 
				SET
					name 				= '".$nome."',
					data_nascimento 	= '".$data_nascimento."',
					tipo_documento 		= '".$tipo_documento."',
					cpf 				= '".$cpf."',
					Passport 			= '".$Passport."',
					email 				= '".$email."',
					tipo_residencia 	= '".$tipo_residencia."',
					endereco_res 		= '".$endereco."',
					bairro_res 			= '".$bairro."',
					cep_res 			= '".$cep."',
					telefone_res 		= '".$telefone."',
					sigla_instituicao 	= '".$sigla_instituicao."',
					pais_res 			= '".$pais."'
					".$set."
				WHERE 
					id					='".$id_joomla."' ";
				
			$sql1 = "UPDATE ev_participante 
				SET
					id_tipo_participante 		= '".$id_tipo_participante."',
					modalidade_participacao 	= '".$modalidade_participacao."',
					observacoes 				= '$observacoes'
				WHERE 
					id							='".$id_participante."' ";
				
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$result1 = mysql_query($sql1) or trigger_error(mysql_error(), E_USER_ERROR);
		}/* Inserção */
		else{
			/* Atualizando cidade, estado e formacao */
			
			$sql = "INSERT INTO ev_participante
				(
					id_tipo_participante, 
					id_evento, 
					modalidade_participacao,
					id_associado_alab,
					observacoes
				) 
				VALUES
				(
					'".$id_tipo_participante."', 
					'".$this->id_evento."', 
					'".$modalidade_participacao."',
					'".$id_joomla."', 
					'$observacoes'
				)";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$id_participante = mysql_insert_id();
		}

		$id_participante;
		if($result) {
			if(!empty($pago)) {
				$sql = "SELECT id FROM ev_pagamento WHERE id_participante='".$id_participante."' ";
				$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$linha = mysql_fetch_array($result);
				$id_pagamento = $linha["id"];
				if($id_pagamento>0){
					$sql_pgmto = "UPDATE ev_pagamento SET pago='".$pago."' WHERE id='".$id_pagamento."'";
				}else{
					$sql_pgmto = "INSERT INTO ev_pagamento(id_participante, pago) VALUES('".$id_participante."', '".$pago."')";
				}
				$result_pgmto = mysql_query($sql_pgmto);
			}//if

			//if($result_pgmto) $GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
			//else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados do pagamento.";
			$GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		}else $GLOBALS["msg_tela"] = "Não foi possível salvar os dados do participante.";
		return "mensagem";
	}
	
	function deletar(){
		$id_participante = addslashes( (int) $_GET["id_participante"] );
		$sql = "DELETE FROM ev_participante WHERE id='".$id_participante."'";
		$result = mysql_query($sql);
		
		if($result){
			$select = "SELECT autor, co_autor, co_autor2, co_autor3 FROM ev_resumo WHERE autor = '".$id_participante."' OR co_autor = '".$id_participante."' OR co_autor2 = '".$id_participante."' OR co_autor3 = '".$id_participante."' LIMIT 1";
			$query = mysql_query($select);
			$res = mysql_fetch_array($query);
			$rows = mysql_num_rows($query);
			$arr_sql = array();
			array_push($arr_sql, "DELETE FROM ev_pagamento WHERE id_participante='".$id_participante."'");
			if($rows > 0){
				if($res['autor']>0){
					$nome_campo = 'autor';
				}
				elseif($res['co_autor']>0){
					$nome_campo = 'co_autor';
				}
				elseif($res['co_autor2']>0){
					$nome_campo = 'co_autor2';
				}
				elseif($res['co_autor3']>0){
					$nome_campo = 'co_autor3';
				}
			array_push($arr_sql, "UPDATE ev_resumo SET ".$nome_campo."=0 WHERE ".$nome_campo."='".$id_participante."'");
			}
			
			foreach($arr_sql as $sql) mysql_query($sql);
			
			$GLOBALS["msg_tela"] = "Participante deletado com sucesso.";
		}else {
			$GLOBALS["msg_tela"] = "Não foi possível deletar o participante";
		}
		return "mensagem";
	}
	
	function exportar_gmail(){

		// Participantes
		$sql = "SELECT us.name, us.email FROM ".$this->tabela." WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
		$result = mysql_query($sql);
		$participantes = array();
		while($linha = mysql_fetch_array($result)){
			array_push($participantes, $linha);			
		} //while
		
		$conteudo_csv = "";
		$conteudo_csv .= "Nome;Name;E-mail\n";
		foreach($participantes as $participante){
			// Tratando os dados vindos do BD
			// Alguns participantes colocaram dois nomes/emails no mesmo campo o que pode atrapalhar na hora de gerar o CSV.

			$nome  = $participante["name"];
			$email = $participante["email"];

			$tratar = array(";", ",");
			foreach($tratar as $t){
				$nome_partes  = explode($t, $nome);
				$email_partes = explode($t, $email);
				$nome  = implode(" ", $nome_partes);
				$email = implode(" ", $email_partes);
			}
			
			$conteudo_csv .= $nome . ";" . $nome . ";" . $email . "\n";
		}//foreach
		
		// Pegar título do evento e tratar
		$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$evento = mysql_fetch_assoc($result);
		$titulo_evento = $this->tratar_nome($evento['titulo']); // ESTE MÉTODO ESTÁ DECLARADO NO ctrl_generico

		// Cabeçalho
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$titulo_evento."__Participantes.csv");

		echo $conteudo_csv;
		
        exit;
	}

}
?>