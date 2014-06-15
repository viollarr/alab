<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");

	$id_trabalho=(int)$_POST['id_trabalho'];
		$_SESSION['id_trabalho']=$id_trabalho;
	$id_simposio=(int)$_POST['id_simposio'];
		$_SESSION['id_simposio']=$id_simposio;
	$id_topico=(int)$_POST['id_topico'];	
		$_SESSION['id_topico']=$id_topico;
	
	$sql_participante = "SELECT nome FROM ev_participante WHERE id='".$_SESSION['id_participante']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	
	$sql_trabalhos = "SELECT id, nome, descricao, nome_en, descricao_en
					  FROM ev_tipo_trabalho 
					  WHERE id = '".$_SESSION['id_trabalho']."'";
	$qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());	
	$mostrar=mysql_fetch_array($qr_trabalho);
	
	//linhas temáticas para comunicação coordenada, individual e poster
	$sql_temas = "SELECT t.id, t.titulo
				  FROM ev_linha_tematica t
				  WHERE t.id_evento = '".$_SESSION['id_evento']."'";
	$qr_tema= mysql_query($sql_temas, $conexao) or die(mysql_error());
	
				
	function envia_email_ja_cadastrado($email_para_quem, $nome_para_quem, $de_quem){
				
		$id_evento_cript=base64_encode($_SESSION['id_evento']);
		
		$quemenvia="ALAB";
		$email_alab = "alab@alab.org.br";
		$assunto = stecho('Convite para participar de evento', 'Invitation to participate in an event')." - ALAB";
		
		$corpoemail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
						<html>
							<head><title>ALAB</title></head>
							<body>
							<div style="height: 100%; font-family:Arial; width: 100%;left: auto; top: auto;right: auto;bottom: auto;position: static;">
							<br />
							<table width="500" cellpadding="0" cellspacing="0" style="margin-left:50px;">
								 <tr>
									<td>&nbsp;</td>
								 </tr>
								 <tr>
									<td align=\"left\">'.stecho('Olá', 'Hello').' '.$nome_para_quem.',<br /><br />
									'.$de_quem.' '.stecho('lhe convidou a fazer parte de um grupo de trabalho', 'has invited you to be part of a working group').'.<br /><br /></td>
								 </tr>
								 <tr>
									<td>&nbsp;</td>
								 </tr>
								 <tr>
									<td><a href="http://www.alab.org.br/eventosalab/queering/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
								 </tr>													 										 
								 <tr>
									<td>&nbsp;</td>
								 </tr>
							</table>
						</div>	
						</body>
						</html>		
						';		
			$headers = "From: ".$quemenvia."  <".$email_alab.">\n";
			$headers .= "MIME-Version: 1.1\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
			$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
			mail($email_para_quem, $assunto, $corpoemail, $headers);
		}
		
		
		
	function envia_email_nao_cadastrado($email_para_quem, $nome_para_quem, $de_quem,$senha_random){					
				
		$id_evento_cript=base64_encode($_SESSION['id_evento']);
		
		$quemenvia="ALAB";
		$email_alab = "alab@alab.org.br";
		$assunto = stecho('Convite para participar de evento', 'Invitation to participate in an event')." - ALAB";
		
		$corpoemail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
						<html>
							<head><title>ALAB</title></head>
							<body>
							<div style="height: 100%; font-family:Arial; width: 100%;left: auto; top: auto;right: auto;bottom: auto;position: static;">
							<br />
							<table width="500" cellpadding="0" cellspacing="0" style="margin-left:50px;">
								 <tr>
									<td>&nbsp;</td>
								 </tr>
								 <tr>
									<td align=\"left\">'.stecho('Olá', 'Hello').' '.$nome_para_quem.',<br /><br />
									'.$de_quem.' '.stecho('lhe convidou a fazer parte de um grupo de trabalho', 'has invited you to be part of a working group').'.<br /><br />
									'.stecho('Segue abaixo seu e-mail e senha de acesso do evento da ALAB', 'Below your email and password to access the event ALAB').':</td>
								 </tr>
								 <tr>
									<td>&nbsp;</td>
								 </tr>										 
								 <tr>
									<td align=\"left\"><strong>E-mail: </strong>'.$email_para_quem.'</td>
								 </tr>
								 <tr>
									<td align=\"left\"><strong>'.stecho('Senha', 'Password').': </strong>'.$senha_random.'</td>
								 </tr>
								 <tr>
									<td>&nbsp;</td>
								 </tr>
								 <tr>
									<td><a href="http://www.alab.org.br/eventosalab/cbla/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
								 </tr>
								 <tr>
									<td>&nbsp;</td>
								 </tr>													 														 
								 <tr>
									<td>'.stecho('Basta entrar com o e-mail e senha na área do participante e completar seus dados', 'Enter the e-mail address and password in the area of the participant and complete your data').'.</td>
								 </tr>
								 <tr>
									<td>&nbsp;</td>
								 </tr>
							</table>
						</div>	
						</body>
						</html>		
						';		
			$headers = "From: ".$quemenvia."  <".$email_alab.">\n";
			$headers .= "MIME-Version: 1.1\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
			$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
			mail($email_para_quem, $assunto, $corpoemail, $headers);
		}
		
	function envia_email_recebimento($params_email_recebimento){
		$conexao = $params_email_recebimento["conexao"];
		
		/* Dados evento */
		$sql = "SELECT titulo, periodo, local, periodo_en FROM ev_evento WHERE id=".$params_email_recebimento["id_evento"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$nome_evento  = $row[0];
		$periodo_evento   = stecho($row[1], $row[3]);
		$local_evento = $row[2];
		
		/* Tipo trabalho */
		$sql = "SELECT nome FROM ev_tipo_trabalho WHERE id=".$params_email_recebimento["id_tipo_trab"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$tipo_trabalho = $row[0];
	
		/* Autor */
		$sql = "SELECT email FROM ev_participante WHERE id=".$params_email_recebimento["id_participante"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$email_autor = $row[0];
	
		/* Configurando mail */
		$quemenvia="ALAB";
		$email_alab = "alab@alab.org.br";
		$assunto = stecho("Confirmação de recebimento de proposta de apresentação de trabalho", "Confirmation of receipt of proposal for the presentation of work");
				
		$corpoemail = stecho("Confirmamos o recebimento da sua proposta de <b>".$tipo_trabalho."</b> intitulada <b>".$params_email_recebimento["titulo_trab"]."</b> para apresentação no <b>".$nome_evento."</b>, a ser realizado no período de ".$periodo_evento." no local: ".$local_evento, "We confirm receipt of your proposal for <b>".$tipo_trabalho."</b> entitled <b>".$params_email_recebimento["titulo_trab"]."</b> for presentation at <b>".$nome_evento."</b>, to be carried out from ".$periodo_evento." on: ".$local_evento);
		// Frase original (email do dia 04-11-2010): "Confirmamos o recebimento da sua proposta de (comunicação coordenada/comunicação individual/pÿster) intitulada (nome da proposta inserido pelo participante) para apresentação no IX Congresso Brasileiro de Linguística Aplicada, a ser realizado no perído de 25 a 28 de julho de 2011 na Universidade Federal do Rio de Janeiro"
			
		$headers = "From: ".$quemenvia." <".$email_alab.">\n";
		$headers .= "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
		$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
		
		mail($email_autor, $assunto, $corpoemail, $headers);
	}
	
	if ($_POST["insert"] == "true"){
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho'];
		$id_topico=(int)$_POST['id_topico'];
		$titulo = addslashes($_POST['titulo']);
		
		//atributos únicos de comunicação individual
		$linha_tematica=$_POST['linha_tematica'];
		$autor=addslashes(trim($_POST['autor']));

		// Informações do(s) co-autor(es)
		$coautor = $_POST['coautor']; // array
		$email_coautor = $_POST['email_coautor']; // array
		$cpf_coautor = $_POST['cpf_coautor']; // array
		$passaporte_coautor = $_POST['passaporte_coautor']; // array
		//$formacao_coautor = $_POST['formacao_coautor']; // array

		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));

		// atributos únicos da comunicação coordenada
		$titulo_sessao = addslashes($_POST['titulo_sessao']);
		$resumo_sessao=addslashes(trim($_POST['resumo_sessao']));
		$palavras_sessao=addslashes(trim($_POST['palavras_sessao']));
		$debatedor=addslashes(trim($_POST['debatedor']));

		if ($id_trabalho == 2) {
		// comunicação coordenada
		
			// TRATA OS ERROS NOS FORMULÁRIOS
			if (empty($linha_tematica) or ($linha_tematica == 0)) $error[] = stecho("Selecione a linha temática", "Select the thematic line");
			if (empty($titulo_sessao)) $error[] = stecho("Informe o título da sessão", "Enter the session title");
			if (empty($resumo_sessao)) $error[] = stecho("Informe o resumo da sessão", "Enter the session summary");
			if (strlen($resumo_sessao) < 1500) $error[] = stecho('Você deve digitar pelo menos 1500 caracteres no resumo da sessão', 'You must enter at least 1500 characters in the session summary');
			if (strlen($resumo_sessao) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo da sessão', 'You have exceeded the 3500 character limit for the session summary');
			if (empty($palavras_sessao)) $error[] = stecho("Informe as palavras-chave da sessão", "Enter the session keywords");
			
			$titulos = $_POST["titulo"]; // array
			$autores = $_POST["autor"]; // array
			$emails_autor = $_POST["email_autor"]; // array
			$cpfs_autor = $_POST["cpf_autor"]; // array
			$passaportes_autor = $_POST["passaporte_autor"]; // array
			$ids_formacao_autor = $_POST["id_formacao_autor"]; // array
			
			$coautores = $_POST["coautor"]; // array array
			$emails_coautor = $_POST["email_coautor"]; // array array
			$cpfs_coautor = $_POST["cpf_coautor"]; // array array
			$passaportes_coautor = $_POST["passaporte_coautor"]; // array array
			$ids_formacao_co_autor = $_POST["id_formacao_co_autor"]; // array array
			
			$resumos = $_POST["resumo"]; // array
			$palavras = $_POST["palavras"]; // array
			
			$count_titulos = 0;
			foreach($titulos as $titulo)
				if(!empty($titulo)) 
					$count_titulos++;
			
			if ($count_titulos < 4) $error[] = stecho("A quantidade mínima de trabalhos inscritos na Comunicação Coordenada deve ser quatro.", "The minimum number of papers in the panel must be four");
	
			/* Verificar trabalhos */
			for ($i = 0; $i <= 5; $i++) {
				$k = $i + 1; // para exibir a numeração a partir do número 1
			
				if (!empty($titulos[$i])) {
					if (empty($autores[$i])) 
						$error[] = stecho("Informe o nome do autor no Trabalho $k.", "Enter the name of the author at Paper $k.");
					if (empty($emails_autor[$i])) 
						$error[] = stecho("Informe o email do autor <b>$autores[$i]</b> no Trabalho $k.", "Enter the email of the author <b>$autores[$i]</b> at Paper $k.");
					if (!empty($emails_autor[$i]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $emails_autor[$i])) 
						$error[] = stecho('Infome um e-mail válido para o autor <b>'.($autores[$i]).'</b> do trabalho '.$k, 'Enter a valid e-mail to the author <b>'.($autores[$i]).'</b> at Paper '.$k); 
					if (empty($cpfs_autor[$i]) and empty($passaportes_autor[$i])) 
						$error[] = stecho('Informe o CPF ou passaporte do autor <b>'.$autores[$i].'</b> do trabalho '.$k.'.', 'Enter the CPF or passport of the author <b>'.$autores[$i].'</b> at Paper '.$k.'.');
					if (empty($ids_formacao_autor[$i])) $error[] = stecho("Informe a formação do autor <b>$autores[$i]</b> no Trabalho $k.", "Enter the degree of the author <b>$autores[$i]</b> at Paper $k.");


					// Verificar se possui mais de dois trabalhos cadastrados. Se sim, informar ao usuário este "erro".
					if(!empty($emails_autor[$i])){
						$sql_qtd_trabalhos = "SELECT id FROM ev_participante_resumo WHERE id_participante IN 
												(SELECT id FROM ev_participante WHERE email = '{$emails_autor[$i]}'";
						if (!empty($cpfs_autor[$i])) $sql_qtd_trabalhos .= " OR cpf = '{$cpfs_autor[$i]}'";
						if (!empty($passaportes_autor[$i])) $sql_qtd_trabalhos .= " OR passaporte = '{$passaportes_autor[$i]}'";
						$sql_qtd_trabalhos .= ") AND id_evento = {$id_evento}";
						
						//echo "SQL: " . $sql_qtd_trabalhos;
						//echo "<br />";
						
						$qtd_trabalhos = mysql_num_rows(mysql_query($sql_qtd_trabalhos, $conexao));
						if($qtd_trabalhos >= 2) $error[] = stecho('O autor '.$autores[$i].' do trabalho '.$k.' ultrapassou o limite de trabalhos enviados.', 'Author '.$autores[$i].' at Paper '.$k.' exceeded the limit of paper submitted.');
					}


					// tratamento de erros para os co-autores
					for($j = 0; $j < sizeof($coautores[$i]); $j++) {
						/*
						if (empty($emails_coautor[$i][$j]) and (!empty($cpfs_coautor[$i][$j]) or !empty($passaportes_coautor[$i][$j]))) $error[] = stecho('Informe o e-mail do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the e-mail of the co-author <b>'.$coautores[$i][$j].'</b> at Paper '.$k);
						if (!empty($emails_coautor[$i][$j]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $emails_coautor[$i][$j])) $error[] = stecho('Infome um e-mail válido para o co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter a valid e-mail to the co-author <b>'.$coautores[$i][$j].'</b> at Paper '.$k); 
						if (!empty($emails_coautor[$i][$j]) and empty($cpfs_coautor[$i][$j]) and empty($passaportes_coautor[$i][$j])) $error[] = stecho('Informe o CPF ou passaporte do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the CPF or passport of the co-author <b>'.$coautores[$i][$j].'</b> at Paper '.$k);
						if (!empty($emails_coautor[$i][$j]) and empty($ids_formacao_co_autor[$i][$j])) $error[] = stecho('Informe a formação acadêmica do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the degree of the co-author <b>'.$coautores[$i][$j].'</b> at Paper '.$k);
						*/
						
						/*
						$coautores = $_POST["coautor"]; // array array
						$emails_coautor = $_POST["email_coautor"]; // array array
						$cpfs_coautor = $_POST["cpf_coautor"]; // array array
						$passaportes_coautor = $_POST["passaporte_coautor"]; // array array
						$ids_formacao_co_autor = $_POST["id_formacao_co_autor"]; // array array
						*/
	
						if(!empty($coautores[$i][$j])){
							if (empty($emails_coautor[$i][$j])) 
								$error[] = stecho('Informe o email do co-autor <b>'.($coautores[$i][$j]).'</b> no Trabalho '.($k).'.', 'Enter the email of the co-author <b>'.($coautores[$i][$j]).'</b> at Paper '.($k).'.');
							if (!empty($emails_coautor[$i][$j]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $emails_coautor[$i][$j])) 
								$error[] = stecho('Infome um e-mail válido para o co-autor <b>'.($coautores[$i][$j]).'</b> do trabalho '.($k).'.', 'Enter a valid e-mail to the co-author <b>'.($coautores[$i][$j]).'</b> at Paper '.($k).'.'); 
							if (empty($cpfs_coautor[$i][$j]) and empty($passaportes_coautor[$i][$j])) 
								$error[] = stecho('Informe o CPF ou passaporte do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.($k).'.', 'Enter the CPF or passport of the co-author <b>'.$coautores[$i][$j].'</b> at Paper '.($k).'.');
							if (empty($ids_formacao_co_autor[$i][$j])) $error[] = stecho('Informe a formação do co-autor <b>'.($coautores[$i][$j]).'</b> no Trabalho '.($k).'.', 'Enter the degree of the co-author <b>'.($coautores[$i][$j]).'</b> at Paper '.($k).'.');
	
	
							// Verificar se possui mais de dois trabalhos cadastrados. Se sim, informar ao usuário este "erro".
							if(!empty($emails_coautor[$i][$j])){
								$sql_qtd_trabalhos = "SELECT id FROM ev_participante_resumo WHERE id_participante IN 
														(SELECT id FROM ev_participante WHERE email = '{$emails_coautor[$i][$j]}'";
								if (!empty($cpfs_coautor[$i][$j])) $sql_qtd_trabalhos .= " OR cpf = '{$cpfs_coautor[$i][$j]}'";
								if (!empty($passaportes_coautor[$i][$j])) $sql_qtd_trabalhos .= " OR passaporte = '{$passaportes_coautor[$i][$j]}'";
								$sql_qtd_trabalhos .= ") AND id_evento = {$id_evento}";
								
								//echo "SQL: " . $sql_qtd_trabalhos;
								//echo "<br />";
								
								$qtd_trabalhos = mysql_num_rows(mysql_query($sql_qtd_trabalhos, $conexao));
								if($qtd_trabalhos >=2) $error[] = stecho('O co-autor '.$coautores[$i][$j].' do trabalho '.$k.' ultrapassou o limite de trabalhos enviados', 'Co-author '.$coautores[$i][$j].' at Paper '.$k.' exceeded the limit of paper submitted');
							}
						} //if
					} //for
					
					if (empty($resumos[$i])) $error[] = stecho("Informe o resumo do Trabalho $k.", "Enter the Paper $k summary.");
					if (strlen($resumos[$i]) < 1500) $error[] = stecho('Você deve digitar pelo menos 1000 caracteres no resumo do trabalho '.$k, 'You must enter at least 1500 characters in the summary of the Paper '.$k);
					if (strlen($resumos[$i]) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo do trabalho '.$k, 'You have exceeded the 3500 character limit for the summary of the Paper '.$k);
					if (empty($palavras[$i])) $error[] = stecho("Informe as palavras-chave do Trabalho $k.", "Enter the keywords of the Paper $k.");
				}
			}
			
			// FIM DA VERIFICAÇÃO DE ERROS
			if(sizeof($error) == 0) {
				$sql_insert = "INSERT INTO ev_comunicacao_coordenada (id_evento, id_coordenador, titulo_sessao, resumo_sessao, palavras_chave_sessao, id_linha_tematica)
							   VALUES ({$id_evento}, {$id_participante}, '$titulo_sessao', '$resumo_sessao', '$palavras_sessao', {$linha_tematica})";	
				mysql_query($sql_insert, $conexao);				
				$id_ultima_coordenada_inserida = mysql_insert_id();

				// Enviar email de confirmação de recebimento de proposta de trabalho
				if(!empty($id_ultima_coordenada_inserida)) {
					$params_email_recebimento = array(
						"id_evento"    		=> $id_evento,
						"id_tipo_trab" 		=> $id_trabalho,
						"titulo_trab"  		=> $titulo_sessao,
						"id_participante" 	=> $id_participante,
						"conexao"      		=> $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}
				
				// Insere os trabalhos(resumos)
				$qtde_trab = 6;
				$array_trabalhos = $_POST["titulo"];
				
				for($i = 0; $i < $qtde_trab; $i++) {		
					if (!empty($array_trabalhos[$i])) {
						$titulo = addslashes($_POST['titulo'][$i]);
						
						$autor = addslashes($_POST['autor'][$i]);
						$email_autor = strtolower(addslashes(trim($_POST['email_autor'][$i])));
						$cpf_autor = addslashes(trim($_POST['cpf_autor'][$i]));
						$passaporte_autor = addslashes(trim($_POST['passaporte_autor'][$i]));
						$id_formacao_autor = $_POST['id_formacao_autor'][$i];
						
						$_coautores = $_POST['coautor'][$i]; // array
						$_emails_coautores = $_POST['email_coautor'][$i]; // array
						$_cpfs_coautores = $_POST['cpf_coautor'][$i]; // array
						$_passaportes_coautores = $_POST['passaporte_coautor'][$i]; // array
						$_ids_formacao_coautores = $_POST['id_formacao_co_autor'][$i]; // array
						
						$resumo = addslashes($_POST['resumo'][$i]);
						$palavra = addslashes($_POST['palavras'][$i]);	

						$sql_insert = "INSERT INTO ev_resumo (id_evento, id_linha_tematica, id_tipo_trabalho, id_comunicacao_coordenada, id_simposio, titulo, resumo, palavras_chave)
									   VALUES ($id_evento, $linha_tematica, $id_trabalho, $id_ultima_coordenada_inserida, 0, '$titulo', '$resumo', '$palavra')";
						mysql_query($sql_insert, $conexao);
						$id_resumo = mysql_insert_id();		
						
						// AUTOR
						// Verifica se o autor já está inscrito no evento. Se sim, envia email direto confirmando inscrição, se não, cadastra e envia email confirmando inscrição.
						$id_autor = 0;
						if (!empty($email_autor)) {
							$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento} ";
							$sql_email .= " AND (email = '{$email_autor}' ";
							if(!empty($cpf_autor)) $sql_email .= " OR cpf = '{$cpf_autor}'";
							if(!empty($passaporte_autor)) $sql_email .= " OR passaporte = '{$passaporte_autor}'";
							$sql_email .= " ) ";
							//echo "<br/>SQL: " . $sql_email;
							//exit("<br/><br/>trabalho.php");
							
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado = mysql_num_rows($resultado_email);
							$ln = mysql_fetch_array($resultado_email);
							$id_autor = $ln['id']; // id_participante_autor							
							$nome_participante = $p['nome'];							
							
							if ($id_autor != $id_participante) {
							
								if ($email_ja_cadastrado > 0) // manda e-mail informando que a pessoa foi inserida na comunicação coordenada
									envia_email_ja_cadastrado($email_autor, $autor, $nome_participante);
									
								else { // insere o e-mail do autor no banco e manda o e-mail 
								
									// se o autor for doutorando, mestre ou mestrando, o tipo de participante dele é pós-graduação
									if (in_array($id_formacao_autor, array(2, 3, 4)))							
										$tipo_participante = 11; // pós-graduação / graduation students
									else
										$tipo_participante = 12; // professores / faculty
								
									$senha_random = rand(111111, 999999);									

									$sql_insert = "INSERT INTO ev_participante(id_evento, nome, email, senha, modalidade_participacao, id_formacao, id_tipo_participante)
												   VALUES ($id_evento, '$autor', '$email_autor', '$senha_random', 1, $id_formacao_autor, $tipo_participante)";
									mysql_query($sql_insert, $conexao);	
									$id_autor = mysql_insert_id();
									
									// Salvar o CPF ou o Passaporte deste participante
									if( !empty($cpf_autor) ) $sql_cpf_passaporte = "UPDATE ev_participante SET cpf = '{$cpf_autor}' WHERE id = {$id_autor}";
									elseif( !empty($passaporte_autor) ) $sql_cpf_passaporte = "UPDATE ev_participante SET passaporte = '{$passaporte_autor}' WHERE id = {$id_autor}";
									mysql_query($sql_cpf_passaporte, $conexao);
									
									envia_email_nao_cadastrado($email_autor, $autor, $nome_participante, $senha_random);							
								}
							}
							
							// inserir autor na tabela que relaciona os participantes com os seus resumos
							mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
										 VALUES ({$id_resumo}, {$id_autor}, 'autor', {$id_evento}, {$id_trabalho})", $conexao);
						}
						
						// CO-AUTORES
						// Verifica se o co-autor já está inscrito no evento. Se sim, envia email direto confirmando inscrição, se não, cadastra e envia email confirmando inscrição.
						for($j = 0; $j < sizeof($_coautores); $j++) {
						
							$id_coautor = 0;
							if (!empty($_emails_coautores[$j])) {
								$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento} ";
								$sql_email .= " AND (email = '".$_emails_coautores[$j]."' ";
								if(!empty($_cpfs_coautores[$j])) $sql_email .= " OR cpf = '".$_cpfs_coautores[$j]."'";
								if(!empty($_passaportes_coautores[$j])) $sql_email .= " OR passaporte = '".$_passaportes_coautores[$j]."'";
								$sql_email .= " ) ";
								/*
								$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento}";
								if(!empty($_cpfs_coautores[$j])) $sql_email .= " OR cpf = '{$_cpfs_coautores[$j]}'";
								if(!empty($_passaportes_coautores[$j])) $sql_email .= " OR passaporte = '{$_passaportes_coautores[$j]}'";
								*/
								
								$resultado_email = mysql_query($sql_email);
								$email_ja_cadastrado = mysql_num_rows($resultado_email);
								$ln = mysql_fetch_array($resultado_email);
								$id_coautor = $ln['id'];
								$nome_participante = $p['nome'];
								
								if ($id_coautor != $id_participante) { // id_participante, acho que é quem está logado...
									if ($email_ja_cadastrado > 0) // manda e-mail informando que a pessoa foi inserida na comunicação coordenada
										envia_email_ja_cadastrado($_emails_coautores[$j], $_coautores[$j], $nome_participante);
										
									else { // insere o participante com uma senha default e-mail do autor no banco e manda o e-mail 
										
										// se o autor for doutorando, mestre ou mestrando, o tipo de participante dele é pós-graduação
										if (in_array($_ids_formacao_coautores[$j], array(2, 3, 4)))							
											$tipo_participante = 11; // pós-graduação / graduation students
										else
											$tipo_participante = 12; // professores / faculty
											
										$senha_random = rand(111111, 999999);

										$sql_insert = "INSERT INTO ev_participante (id_evento, nome, email, senha, modalidade_participacao, id_formacao, id_tipo_participante, cpf, passaporte)
													   VALUES ({$id_evento}, '{$_coautores[$j]}', '{$_emails_coautores[$j]}', '$senha_random', 1, {$_ids_formacao_coautores[$j]}, $tipo_participante, '{$_cpfs_coautores[$j]}', '{$_passaportes_coautores[$j]}')";
										mysql_query($sql_insert, $conexao);		
										$id_coautor = mysql_insert_id();		
									
										// Salvar o CPF ou o Passaporte deste participante
										if( !empty($_cpfs_coautores[$j]) ) $sql_cpf_passaporte = "UPDATE ev_participante SET cpf = {$_cpfs_coautores[$j]} WHERE id = {$id_autor}";
										elseif( !empty($_passaportes_coautores[$j]) ) $sql_cpf_passaporte = "UPDATE ev_participante SET passaporte = {$_passaportes_coautores[$j]} WHERE id = {$id_autor}";
										mysql_query($sql_cpf_passaporte, $conexao);
										
										envia_email_nao_cadastrado($_emails_coautores[$j], $_coautores[$j], $nome_participante, $senha_random);
									}
								}

								// inserir co-autor na tabela que relaciona os participantes com os seus resumos
								mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
											 VALUES ({$id_resumo}, {$id_coautor}, 'coautor', {$id_evento}, {$id_trabalho})", $conexao);
							}
						}//for
						
					}
				}

			}
	
		}
		if ($id_trabalho==3){
		// comunicacao individual	
			
			// TRATA OS ERROS NOS FORMULÁRIOS		
			if (empty($linha_tematica) or $linha_tematica == 0) $error[] = stecho("Selecione a linha temática", "Select the thematic line");
			if (empty($titulo)) $error[] = stecho("Informe o título", "Enter the title");
			if (empty($autor)) $error[] = stecho("Informe o autor", "Enter the author name");
			
			// tratamento de erros para os co-autores
			for($i = 0; $i < sizeof($coautor); $i++) {
				if(!empty($coautor[$i])) {
					/*
					if (empty($email_coautor[$i]) and (!empty($cpf_coautor[$i]) or !empty($passaporte_coautor[$i]))) $error[] = stecho('Informe o e-mail do co-autor '.($i + 1), 'Enter the e-mail of co-author '.($i + 1));
					if (!empty($email_coautor[$i]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email_coautor[$i])) $error[] = stecho('Informe um e-mail válido para o co-autor '.($i + 1), 'Enter a valid e-mail to co-author '.($i + 1)); 
					if (!empty($email_coautor[$i]) and empty($cpf_coautor[$i]) and empty($passaporte_coautor[$i])) $error[] = stecho('Informe o CPF ou passaporte do co-autor '.($i + 1), 'Enter the CPF or passport of co-author '.($i + 1));
					*/
					if (empty($email_coautor[$i])) 
						$error[] = stecho('Informe o e-mail do co-autor <strong>'.$coautor[$i].'</strong>', 'Enter the e-mail of co-author <strong>'.$coautor[$i].'</strong>');
					if (!empty($email_coautor[$i]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email_coautor[$i])) 
						$error[] = stecho('Informe um e-mail válido para o co-autor <strong>'.$coautor[$i].'</strong>', 'Enter a valid e-mail to co-author <strong>'.$coautor[$i].'</strong>'); 
					if (empty($cpf_coautor[$i]) and empty($passaporte_coautor[$i])) 
						$error[] = stecho('Informe o CPF ou passaporte do co-autor <strong>'.$coautor[$i].'</strong>', 'Enter the CPF or passport of co-author <strong>'.$coautor[$i].'</strong>');
					
					$formacao_coautor = $_POST['formacao_coautor_'.($i+1)];
					//if (!empty($email_coautor[$i]) and empty($formacao_coautor)) $error[] = stecho('Informe a formação acadêmica do co-autor '.($i + 1), 'Inform the degree of co-author '.($i + 1));
					if (empty($formacao_coautor)) 
						$error[] = stecho('Informe a formação acadêmica do co-autor <strong>'.$coautor[$i].'</strong>', 'Inform the degree of co-author <strong>'.$coautor[$i].'</strong>');
					
					$sql_qtd_trabalhos = "SELECT id FROM ev_participante_resumo WHERE id_participante IN 
											(SELECT id FROM ev_participante WHERE email = '{$email_coautor[$i]}'";
					if (!empty($cpf_coautor[$i])) $sql_qtd_trabalhos .= " OR cpf = '{$cpf_coautor[$i]}'";
					if (!empty($passaporte_coautor[$i])) $sql_qtd_trabalhos .=	" OR passaporte = '{$passaporte_coautor[$i]}'";
					$sql_qtd_trabalhos .= ") AND id_evento = {$id_evento}";
					$qtd_trabalhos = mysql_num_rows(mysql_query($sql_qtd_trabalhos, $conexao));
					if ($qtd_trabalhos >= 2) $error[] = stecho('O co-autor '.($i + 1).' ultrapassou o limite de trabalhos enviados', 'Co-author '.($i + 1).' exceeded the limit of paper submitted');
				}
			}
			
			if (empty($resumo)) $error[] = stecho("Digite o resumo", "Enter the summary");
			if (strlen($resumo) < 1500) $error[] = stecho('Você deve digitar pelo menos 1500 caracteres no resumo', 'You must enter at least 1500 characters in the summary');
			if (strlen($resumo) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo', 'You have exceeded the 3500 character limit for the summary');
			
			if (empty($palavras)) $error[] = stecho("Informe as palavras-chave", "Enter the keywords");	
			
			if(sizeof($error) == 0) {
			
				$sql_insert = "INSERT INTO ev_resumo (id_evento, id_linha_tematica, id_tipo_trabalho, id_comunicacao_coordenada, id_simposio, titulo, resumo, palavras_chave)
							   VALUES ({$id_evento}, {$linha_tematica}, {$id_trabalho}, 0, 0, '{$titulo}', '{$resumo}', '{$palavras}')";	
				mysql_query($sql_insert, $conexao);
				$id_resumo = mysql_insert_id();
				
				if($id_resumo) {
					
					// inserir autor na tabela que relaciona os participantes com os seus resumos
					mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
								 VALUES ({$id_resumo}, {$id_participante}, 'autor', {$id_evento}, {$id_trabalho})", $conexao);
								 
					// Enviar email de confirmação de recebimento de proposta de trabalho					
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
					
					// envia e-mail de confirmação para os co-autores e faz o cadastro deles se necessário
					for($i = 0; $i < sizeof($coautor); $i++) {
						
						if (!empty($email_coautor[$i])) { // tem co-autor
						
							/*
							$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento}";
							if(!empty($cpf_coautor[$i])) $sql_email .= " OR cpf = '{$cpf_coautor[$i]}'";
							if(!empty($passaporte_coautor[$i])) $sql_email .= " OR passaporte = '{$passaporte_coautor[$i]}'";
							*/
							$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento} ";
							$sql_email .= " AND (email = '".$email_coautor[$i]."' ";
							if(!empty($cpf_coautor[$i])) $sql_email .= " OR cpf = '".$cpf_coautor[$i]."'";
							if(!empty($passaporte_coautor[$i])) $sql_email .= " OR passaporte = '".$passaporte_coautor[$i]."'";
							$sql_email .= " ) ";
							
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado = mysql_num_rows($resultado_email);
							$ln = mysql_fetch_array($resultado_email);
							$id_coautor = $ln['id'];
							$nome_participante = $p['nome'];
							
							// se o co-autor for doutorando, mestre ou mestrando, o tipo de participante dele é pós-graduação
							$formacao_coautor = $_POST['formacao_coautor_'.($i+1)];
							if(in_array($formacao_coautor, array(2, 3, 4)))							
								$tipo_participante = 11; // pós-graduação / graduation students
							else
								$tipo_participante = 12; // professores / faculty
								
							if ($id_coautor != $id_participante) { 
								if ($email_ja_cadastrado > 0) // manda e-mail informando que a pessoa foi inserida na comunicação individual									
									envia_email_ja_cadastrado($email_coautor[$i], $coautor[$i], $nome_participante);
								else { // insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
									$senha_random = rand(111111, 999999);
									$sql_insert = "INSERT INTO ev_participante (id_evento, id_formacao, nome, email, cpf, passaporte, senha, modalidade_participacao, id_tipo_participante)
												   VALUES ({$id_evento}, {$formacao_coautor}, '{$coautor[$i]}', '{$email_coautor[$i]}', '{$cpf_coautor[$i]}', '{$passaporte_coautor[$i]}', '{$senha_random}', 1, {$tipo_participante})";	
									mysql_query($sql_insert, $conexao);		
									$id_coautor = mysql_insert_id();	
									envia_email_nao_cadastrado($email_coautor[$i], $coautor[$i], $nome_participante, $senha_random);
								} // if email ja cadastrado
							}
							
							// inserir co-autor na tabela que relaciona os participantes com os seus resumos
							mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
										 VALUES ({$id_resumo}, {$id_coautor}, 'coautor', {$id_evento}, {$id_trabalho})", $conexao);
						} //if coautor diferente de vazio
					
					}
					
				}
				
			}
		}


	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script src="../js/jquery.limit-1.2.js" type="text/javascript"></script>


<script language="javascript">
	$(function() {			
		/*
		$("#coautor_comunicacao_individual").click(function() {
			var $qtd_coautor = $(".co_autor").length;
			if ($qtd_coautor < 6) {
				var $dolly = $(".co_autor:last");
				var novo_campo = $dolly.clone();
				novo_campo.find("input").val("");
				novo_campo.find(".cpf_coautor").mask('99999999999');
				novo_campo.insertAfter($dolly);
			}
			return false;
		});
		*/
		
		$('.cpf_coautor, .cpf_autor').mask('99999999999');
		
		$('#resumo_sessao, #resumo').limit('3500', '#WordCount');
		for (var i = 0; i <= 5; i++)
			$('#resumo' + i).limit('3500', '#WordCount' + i);
	});	
	
	function coautor_comunicacao_coordenada(i) {
		var $qtd_coautor = $(".co_autor_" + i).length;
		if ($qtd_coautor < 6) {
			var $dolly = $(".co_autor_" + i + ":last");
			var novo_campo = $dolly.clone();
			// manipulação do atributo name do input radio para que os valores não sejam perdidos ao fazer o clone
			var radios = novo_campo.find(":radio");
			var radios_name = radios.attr('name'); // id_formacao_co_autor[1][2]
			var index = parseInt(radios_name.substring(24, 25));
			index++;	
			radios.attr('name', radios_name.substring(0, 24) + index + ']');
			radios.attr('checked', false);
			// fim da manipulação
			novo_campo.find(":text").val("");
			novo_campo.find(".cpf_coautor").mask('99999999999');
			novo_campo.insertAfter($dolly);
		}
		return false;
	}
</script>

</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />       
        </div>
		<div id="menu_idiomas"><a href="principal.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="principal.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
        <div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
		<div id="box_trabalhos">
	    <p class="txt_categorias"><strong><?php techo('Envio de trabalho', 'Paper submission'); ?></strong></p>
       <p class="txt_titulo_destaque"><?php techo($mostrar['nome'], $mostrar['nome_en']); ?></p>
       <p class="txt_titulo_noticias_2"><?php techo($mostrar['descricao'], $mostrar['descricao_en']); ?></p>
       <p class="txt_titulo_noticias_2"><?php techo('Entre abaixo com os dados referentes ao seu trabalho.', 'Enter the data regarding your work below.'); ?></p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		
		if (($_POST["insert"] == "true") and (sizeof($error)== 0)){
		  //print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	  //print "Seu trabalho foi enviado com sucesso.<br />";
		  //print "</div> <br />";
		?>
		 <script>
		 alert("<?php techo('Seu trabalho foi enviado com sucesso.', 'Your work has been sent successfully.'); ?>");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="trabalho.php" >
			 <?php 
             switch($id_trabalho){
                case 2: //coordenada 
                    include('formulario_coordenada.php');
                    break;
                case 3: //individual
                    include('formulario_individual.php');
                    break;
             }
             ?>
        </form>
       <p>&nbsp;</p>
       <p>&nbsp;</p>       
    </div>
   </div>    
  </div>   

  		<div id="lado_direito">
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2><?php techo('Área do Participante', 'Participant Area'); ?></h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela"><?php techo('Ol&aacute;', 'Hello'); ?>, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" ><?php techo('sair', 'logout'); ?></a></td>
                            <!-- id = id do envento-->
                          </tr>
                        </table>
                      </div>
                    </form>

            </div>            <br />
            <!--<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Links interessantes</h2></div>
            	<ul>
                	<li><a href="#">Documento oficial</a></li>
                	<li><a href="#">Normas a serem seguidas</a></li>
                	<li><a href="#">Site da ALAB</a></li>                                                            
                </ul>
            </div>-->
        </div><!-- lado direito -->
        <div class="clear"></div>
		<div id="footer">
              <div align="center">
                  <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
              </div>	
        </div>

    </div><!-- tudo -->
</body>
</html>
