<?php
class ctrl_participante extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tabela = "ev_participante";
		require_once("conexao.php");
	}
	
	function listar(){
		/* Participantes */
		$sql = "SELECT id, nome, email, id_tipo_participante FROM ".$this->tabela." WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
		$result = mysql_query($sql);
		$participantes = array();
		while(list($id, $nome, $email, $id_tipo_participante) = mysql_fetch_array($result)){
			$linha = array();
		
			$linha["id"]    = $id;
			$linha["nome"]  = $nome;
			$linha["email"] = $email;
			$linha["id_tipo_participante"] = $id_tipo_participante;
			$linha["possui_trabalho"]      = false;
			
			if ($this->id_evento == 28)
			{
				// Verifica se й Autor/Co-autor de algum trabalho: Pфster, Comunicaзгo Individual, resumo de Comunic. Coordenada e resumo de Simpуsio
				$sql = "SELECT id_participante FROM ev_participante_resumo WHERE id_participante = $id";
				$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$linha["possui_trabalho"] = (mysql_num_rows($res) > 0) ? true : false;
			}
			else
			{
				// Verifica se й Autor de algum trabalho: Pфster, Comunicaзгo Individual, resumo de Comunic. Coordenada e resumo de Simpуsio
				$sql = "SELECT id FROM ev_resumo WHERE autor='".$id."' ORDER BY id ASC";
				$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				$linha["possui_trabalho"] = (mysql_num_rows($res) > 0) ? true : false;
				
				// Verifica se й Co-autor de algum trabalho: Pфster, Comunicaзгo Individual, resumo de Comunic. Coordenada e resumo de Simpуsio
				$sql = "SELECT id FROM ev_resumo WHERE co_autor='".$id."' ORDER BY id ASC";
				$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
				if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true; // Nгo se pode fazer o mesmo que acima pois poderia alterar o true do autor.
			}
			
			// Verifica se й Coordenador de Comunicaзгo Coordenada
			$sql = "SELECT id FROM ev_comunicacao_coordenada WHERE id_coordenador='".$id."' AND id_evento = '".$this->id_evento."' ";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true;
	
			// Verifica se й Coordenador de Simpуsio
			$sql = "SELECT id_simposio FROM ev_simposio_coordenador WHERE id_participante='".$id."' ";
			$res = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			if (mysql_num_rows($res) > 0) $linha["possui_trabalho"] = true;
				
			// Adiciona essa linha de registro na variбvel que serб passada para a TELA PARTICIPANTES
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
			$sql = "SELECT * FROM ".$this->tabela." WHERE id='".$id_participante."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$participantes = array();
			while($linha = mysql_fetch_array($result)){
				array_push($participantes, $linha);
			} //while
			$participante = $participantes[0];

			/* Usuбrio Joomla! */
			$sql = "SELECT username, email FROM jos_users WHERE id = '".$participante['id_associado_alab']."' LIMIT 1";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
			$jos_users = array();
			while($jos_users = mysql_fetch_array($result)){
				$participante['username_joomla'] = $jos_users['username'];
				$participante['email_joomla']    = $jos_users['email'];
			} //while

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

		/* Formaзгo Acadкmica */
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
	
		$id_participante = addslashes((int) $_POST["id_participante"]);
		$id_tipo_participante = addslashes( (int) $_POST["id_tipo_participante"]);
		$nome            = special_ucwords($_POST["nome"]);
        $datanascimento  = $_POST["datanascimento"];
		$cpf             = $_POST["cpf"];
		$email           = strtolower( trim(addslashes($_POST["email"])) );
		$senha           = addslashes($_POST["senha"]);
		$endereco        = addslashes($_POST["endereco"]);
		$bairro          = addslashes($_POST["bairro"]);
		$cep             = addslashes($_POST["cep"]);
		$passaporte      = addslashes($_POST["passaporte"]);
		$telefone        = addslashes($_POST["telefone"]);
		$instituicao     = addslashes($_POST["instituicao"]);
		$pais            = addslashes($_POST["pais"]);
		$id_cidade       = addslashes((int)$_POST["id_cidade"]);
		$id_estado       = addslashes((int)$_POST["id_estado"]);
		$id_formacao     = addslashes((int)$_POST["id_formacao"]);
		$modalidade_participacao     = addslashes((int)$_POST["modalidade_participacao"]);
		$observacoes	 = addslashes($_POST["observacoes"]);
		
		//$id_pagamento = addslashes( (int) $_POST["id_pagamento"]);
		$pago           = addslashes($_POST["pago"]);
		
		/* Formatando a data de nascimento */
		$arr_data_nasc = explode("/", $datanascimento);
		$data_nasc_format = $arr_data_nasc[2]."/".$arr_data_nasc[1]."/".$arr_data_nasc[0];

		/* Ediзгo */
		if($id_participante){
			/* Atualizando cidade, estado e formacao */
			$set = "";
			if(!empty($id_cidade)) $set .= ", id_cidade = '".$id_cidade."'";
			if(!empty($id_estado)) $set .= ", id_estado = '".$id_estado."'";
			if(!empty($id_formacao)) $set .= ", id_formacao = '".$id_formacao."'";
	
			$sql = "UPDATE ".$this->tabela." 
				SET
				id_tipo_participante = '".$id_tipo_participante."',
				nome = '".$nome."',
				datanascimento = '".$data_nasc_format."',
				cpf = '".$cpf."',
				passaporte = '".$passaporte."',
				email = '".$email."',
				senha = '".$senha."',
				endereco = '".$endereco."',
				bairro = '".$bairro."',
				cep = '".$cep."',
				telefone = '".$telefone."',
				instituicao = '".$instituicao."',
				pais = '".$pais."',
				modalidade_participacao = '".$modalidade_participacao."',
				observacoes = '$observacoes'
				".$set."
				WHERE id='".$id_participante."' ";
			$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		}/* Inserзгo */
		else{
			/* Atualizando cidade, estado e formacao */
			$set = "";
			if(!empty($id_cidade)) $set .= ", id_cidade = '".$id_cidade."'";
			if(!empty($id_estado)) $set .= ", id_estado = '".$id_estado."'";
			if(!empty($id_formacao)) $set .= ", id_formacao = '".$id_formacao."'";
	
			$sql = "INSERT INTO ".$this->tabela."(id_tipo_participante, id_evento, nome, datanascimento, cpf, passaporte, email, senha, endereco, bairro, cep, telefone, instituicao, id_cidade, id_estado, id_formacao, modalidade_participacao, pais, observacoes) VALUES('".$id_tipo_participante."', '".$this->id_evento."', '".$nome."', '".$data_nasc_format."', '".$cpf."', '".$passaporte."', '".$email."', '".$senha."', '".$endereco."', '".$bairro."', '".$cep."', '".$telefone."', '".$instituicao."', '".$id_cidade."', '".$id_estado."', '".$id_formacao."', '".$modalidade_participacao."', '".$pais."', '$observacoes')";
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
			//else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados do pagamento.";
			$GLOBALS["msg_tela"] = "Dados salvos com sucesso!";
		}else $GLOBALS["msg_tela"] = "Nгo foi possнvel salvar os dados do participante.";
		return "mensagem";
	}
	
	function deletar(){
		$id_participante = addslashes( (int) $_GET["id_participante"] );
		$sql = "DELETE FROM ".$this->tabela." WHERE id='".$id_participante."'";
		$result = mysql_query($sql);
		
		if($result){
			$arr_sql = array();
			array_push($arr_sql, "UPDATE ev_comunicacao_coordenada SET id_coordenador=0 WHERE id_coordenador='".$id_participante."'");
			array_push($arr_sql, "DELETE FROM ev_pagamento WHERE id_participante='".$id_participante."'");
			array_push($arr_sql, "UPDATE ev_resumo SET id_apresentador=0 WHERE id_apresentador='".$id_participante."'");
			array_push($arr_sql, "DELETE FROM ev_simposio_coordenador WHERE id_participante='".$id_participante."'");
			array_push($arr_sql, "DELETE FROM ev_participante_resumo WHERE id_participante='".$id_participante."'");
			
			foreach($arr_sql as $sql) mysql_query($sql);
			
			$GLOBALS["msg_tela"] = "Participante deletado com sucesso.";
		}else {
			$GLOBALS["msg_tela"] = "Nгo foi possнvel deletar o participante";
		}
		return "mensagem";
	}
	
	function exportar_gmail(){

		// Participantes
		$sql = "SELECT nome, email FROM ".$this->tabela." WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
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

			$nome  = $participante["nome"];
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
		
		// Pegar tнtulo do evento e tratar
		$sql = "SELECT titulo FROM ev_evento WHERE id='".$this->id_evento."' LIMIT 1";
		$result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
		$evento = mysql_fetch_assoc($result);
		$titulo_evento = $this->tratar_nome($evento['titulo']); // ESTE MЙTODO ESTБ DECLARADO NO ctrl_generico

		// Cabeзalho
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$titulo_evento."__Participantes.csv");

		echo $conteudo_csv;
		
        exit;
	}

}
?>