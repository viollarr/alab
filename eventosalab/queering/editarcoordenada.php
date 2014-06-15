<?php
require_once("../conexao.php");
require_once("../check_user.php");
require_once("../check_lang.php");

$sql_participante = "SELECT nome FROM ev_participante WHERE id = {$_SESSION['id_participante']}";
$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
$p = mysql_fetch_assoc($qr_participante);

function envia_email_ja_cadastrado($email_para_quem, $nome_para_quem, $de_quem) {
	$id_evento_cript=base64_encode($_SESSION['id_evento']);
	
	$quemenvia="ALAB";
	$email_alab = "alab@alab.org.br";
	$assunto = "Convite para participar de evento - ALAB";
	
	$corpoemail = ' <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
								<td><a href="http://www.alab.org.br/eventosalab/cbla/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
							</tr>													 										 
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
					</div>	
					</body>
					</html>';
	$headers  = "From: ".$quemenvia."  <".$email_alab.">\n";
	$headers .= "MIME-Version: 1.1\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
	$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
	mail($email_para_quem, $assunto, $corpoemail, $headers);
}

function envia_email_nao_cadastrado($email_para_quem, $nome_para_quem, $de_quem,$senha_random) {					
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
								<td align=\"left\"><strong>Senha: </strong>'.$senha_random.'</td>
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
	$sql = "SELECT titulo, periodo, local FROM ev_evento WHERE id = ".$params_email_recebimento["id_evento"];
	$result = mysql_query($sql, $conexao);
	$row    = mysql_fetch_array($result);
	$nome_evento = $row[0];
	$periodo_evento = $row[1];
	$local_evento = $row[2];
	
	/* Tipo trabalho */
	$sql = "SELECT nome FROM ev_tipo_trabalho WHERE id = ".$params_email_recebimento["id_tipo_trab"];
	$result = mysql_query($sql, $conexao);
	$row = mysql_fetch_array($result);
	$tipo_trabalho = $row[0];

	/* Autor */
	$sql = "SELECT email FROM ev_participante WHERE id = ".$params_email_recebimento["id_participante"];
	$result = mysql_query($sql, $conexao);
	$row = mysql_fetch_array($result);
	$email_autor = $row[0];

	/* Configurando mail */
	$quemenvia = "ALAB";
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

if ($_POST["update"] == "true") {
	$id_evento = (int) $_SESSION['id_evento'];
	$id_participante = (int) $_SESSION["id_participante"];
	$id_trabalho = (int) $_POST['id_trabalho'];
	$id_topico = (int) $_POST['id_topico'];		

	$idcoordenada = (int) $_POST['id_coordenada'];		
	$linha_tematica = (int) $_POST['linha_tematica'];
	$titulo_sessao = addslashes(trim($_POST['titulo_sessao']));
	$resumo_sessao = addslashes(trim($_POST['resumo_sessao']));
	$palavras_sessao = addslashes(trim($_POST['palavras_sessao']));
	
	$titulos = $_POST["titulo"]; // array	
	$resumos = $_POST["resumo"]; // array
	$palavras = $_POST["palavras"]; // array
	
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
	
	// TRATA OS ERROS NO FORMULÁRIO
	if (empty($linha_tematica)) $error[] = stecho('Selecione a linha temática', 'Select the thematic line');
	if (empty($titulo_sessao)) $error[] = stecho('Informe o título da sessão', 'Enter the session title');
	if (empty($resumo_sessao)) $error[] = stecho('Informe o resumo da sessão', 'Enter the session summary');
	if (strlen($resumo_sessao) < 1500) $error[] = stecho('Você deve digitar pelo menos 1500 caracteres no resumo da sessão', 'You must enter at least 1500 characters in the session summary');
	if (strlen($resumo_sessao) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo da sessão', 'You have exceeded the 3500 character limit for the session summary');
	if (empty($palavras_sessao)) $error[] = stecho('Informe as palavras-chave da sessão', 'Enter the session keywords');

	// Verificar trabalhos
	for ($i = 0; $i <= 5; $i++) {
		$k = $i + 1; // para exibir a numeração a partir do número 1
	
		if (!empty($titulos[$i])) {
			if (isset($autores[$i]) and empty($autores[$i])) $error[] = stecho("Informe o nome do autor no Trabalho $k.", "Enter the name of the author at paper $k.");
			if (isset($emails_autor[$i]) and empty($emails_autor[$i])) $error[] = stecho("Informe o email do autor <b>$autores[$i]</b> no Trabalho $k.", "Enter the email address of the author <b>$autores[$i]</b> at paper $k.");
			if (isset($emails_autor[$i]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $emails_autor[$i])) $error[] = stecho("Infome um e-mail válido para o autor <b>{$autores[$i]}</b> do trabalho {$k}", "Enter a valid e-mail address for the author <b>{$autores[$i]}</b> at paper {$k}"); 
				
			if (isset($ids_formacao_autor[$i]) and empty($ids_formacao_autor[$i])) $error[] = stecho("Informe a formação do autor <b>{$autores[$i]}</b> no Trabalho {$k}.", "Enter the degree of the author <b>{$autores[$i]}</b> at paper {$k}.");

			// tratamento de erros para os co-autores
			if (isset($coautores[$i])) {
				for ($j = 0; $j < sizeof($coautores[$i]); $j++) {
					if (empty($emails_coautor[$i][$j]) and (!empty($cpfs_coautor[$i][$j]) or !empty($passaportes_coautor[$i][$j]))) $error[] = stecho('Informe o e-mail do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the email of co-author <b>'.$coautores[$i][$j].'</b> at paper '.$k);
					if (!empty($emails_coautor[$i][$j]) and !eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $emails_coautor[$i][$j])) $error[] = stecho('Infome um e-mail válido para o co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter a valid email to the co-author <b>'.$coautores[$i][$j].'</b> at paper '.$k); 
					if (!empty($emails_coautor[$i][$j]) and empty($cpfs_coautor[$i][$j]) and empty($passaportes_coautor[$i][$j])) $error[] = stecho('Informe o CPF ou passaporte do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the CPF or passaporte of co-author <b>'.$coautores[$i][$j].'</b> at paper '.$k);
					if (!empty($emails_coautor[$i][$j]) and empty($ids_formacao_co_autor[$i][$j])) $error[] = stecho('Informe a formação acadêmica do co-autor <b>'.$coautores[$i][$j].'</b> do trabalho '.$k, 'Enter the academic degree of co-author <b>'.$coautores[$i][$j].'</b> at paper '.$k);
					
					$sql_qtd_trabalhos = "SELECT id FROM ev_participante_resumo WHERE id_participante = 
											(SELECT id FROM ev_participante WHERE email = '{$emails_coautor[$i][$j]}'";
					if (!empty($cpfs_coautor[$i][$j])) $sql_qtd_trabalhos .= " AND cpf = '{$cpfs_coautor[$i][$j]}'";
					if (!empty($cpfs_coautor[$i][$j])) $sql_qtd_trabalhos .= " AND passaporte = '{$passaportes_coautor[$i][$j]}'";
					$sql_qtd_trabalhos .= ") AND id_evento = {$id_evento}";
					$qtd_trabalhos = mysql_num_rows(mysql_query($sql_qtd_trabalhos, $conexao));
					if ($qtd_trabalhos == 2) $error[] = stecho('O co-autor '.$coautores[$i][$j].' do trabalho '.$k.' ultrapassou o limite de trabalhos enviados', 'Co-author '.$coautores[$i][$j].' at paper '.$k.' exceeded the limit of paper submitted');
				}
			}
			
			if (empty($resumos[$i])) $error[] = stecho("Informe o resumo do Trabalho $k.", "Enter the summary of the paper $k.");
			if (strlen($resumos[$i]) < 1500) $error[] = stecho('Você deve digitar pelo menos 1500 caracteres no resumo do trabalho '.$k, 'You must enter at least 1500 characters in the paper '.$k.' summary');
			if (strlen($resumos[$i]) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo do trabalho '.$k, '');
			if (empty($palavras[$i])) $error[] = stecho("Informe as palavras-chave do Trabalho $k.", "Enter the keywords of the paper $k.");
		}
	}	
	// FIM DA VERIFICAÇÃO DE ERROS

	if(sizeof($error) == 0) {
		$sql_update = "UPDATE ev_comunicacao_coordenada SET
					   titulo_sessao = '{$titulo_sessao}',
					   resumo_sessao = '{$resumo_sessao}',
					   palavras_chave_sessao = '{$palavras_sessao}',
					   id_linha_tematica = {$linha_tematica}
					   WHERE id = {$idcoordenada}";	
		mysql_query($sql_update, $conexao);
			
		// atualiza os trabalhos (resumos) que já estavam no sistema
		$array_trabalhos = $_POST["id_resumo"]; // array
			
		$qtde_trab = count($array_trabalhos);
			
		for ($i = 0; $i < $qtde_trab; $i++) {		

			if (!empty($array_trabalhos[$i])) {		

				if (!empty($titulos[$i])) {
					if ($array_trabalhos[$i] != "-1") { // resumo já cadastrado, então é só atualizar
						$id_resumo = $array_trabalhos[$i];						
						$sql_update_trabalho = "UPDATE ev_resumo SET
												titulo = '{$titulos[$i]}',
												resumo = '{$resumos[$i]}',
												palavras_chave = '{$palavras[$i]}'
												WHERE id = {$id_resumo}";
						mysql_query($sql_update_trabalho, $conexao);
						
					} elseif ($array_trabalhos[$i] == "-1") { // São os resumos que estão sendo enviados
						$sql_insert = "INSERT INTO ev_resumo (id_evento, id_linha_tematica, id_tipo_trabalho, id_comunicacao_coordenada, titulo, resumo, palavras_chave)
									   VALUES ({$id_evento}, {$linha_tematica}, {$id_trabalho}, {$idcoordenada}, '{$titulos[$i]}', '{$resumos[$i]}', '{$palavras[$i]}')";
						mysql_query($sql_insert, $conexao);
						$id_resumo = mysql_insert_id();								
						
						// Cadastrar autor e co-autor
						
						// AUTOR
						$id_autor = 0;
						if (!empty($emails_autor[$i])) {
							$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento}";
							if(!empty($cpfs_autor[$i])) $sql_email .= " AND cpf = '{$cpfs_autor[$i]}'";
							if(!empty($passaportes_autor[$i])) $sql_email .= " AND passaporte = '{$passaportes_autor[$i]}'";
							
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado = mysql_num_rows($resultado_email);
							$ln = mysql_fetch_array($resultado_email);
							$id_autor = $ln['id']; // id_participante_autor							
							$nome_participante = $p['nome'];	
							$autor = $ln['nome'];				
							
							if ($email_ja_cadastrado > 0) // manda e-mail informando que a pessoa foi inserido no simposio
								envia_email_ja_cadastrado($emails_autor[$i], $autor, $nome_participante);
								
							else { // insere o e-mail do autor no banco e manda o e-mail 
								$senha_random = rand(111111, 999999);		

								// se o autor for doutorando, mestre ou mestrando, o tipo de participante dele é pós-graduação
								if (in_array($ids_formacao_autor[$i], array(2, 3, 4)))							
									$tipo_participante = 11; // pós-graduação / graduation students
								else
									$tipo_participante = 12; // professores / faculty

								$sql_insert = "INSERT INTO ev_participante (id_evento, nome, email, senha, modalidade_participacao, id_formacao, id_tipo_participante)
											   VALUES ({$id_evento}, '{$autores[$i]}', '{$emails_autor[$i]}', '{$senha_random}', 1, {$ids_formacao_autor[$i]}, $tipo_participante)";
								mysql_query($sql_insert, $conexao);	
								$id_autor = mysql_insert_id();		
								
								envia_email_nao_cadastrado($emails_autor[$i], $autores[$i], $nome_participante, $senha_random);							
							}
							
							// inserir autor na tabela que relaciona os participantes com os seus resumos
							mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
										 VALUES ({$id_resumo}, {$id_autor}, 'autor', {$id_evento}, {$id_trabalho})", $conexao);
						}
						
						
						// CO-AUTORES
						for($j = 0; $j < sizeof($coautores[$i]); $j++) {
						
							$id_coautor = 0;
							if (!empty($emails_coautor[$i][$j])) {
							
								$sql_email = "SELECT id, email FROM ev_participante WHERE id_evento = {$id_evento}";
								if (!empty($cpfs_coautor[$i][$j])) $sql_email .= " AND cpf = '{$cpfs_coautor[$i][$j]}'";
								if (!empty($passaportes_coautor[$i][$j])) $sql_email .= " AND passaporte = '{$passaportes_coautor[$i][$j]}'";
								
								$resultado_email = mysql_query($sql_email);
								$email_ja_cadastrado = mysql_num_rows($resultado_email);
								$ln = mysql_fetch_array($resultado_email);
								$id_coautor = $ln['id'];
								$nome_participante = $p['nome'];
								
								if ($email_ja_cadastrado > 0) // manda e-mail informando que a pessoa foi inserido no simposio
									envia_email_ja_cadastrado($emails_coautor[$i][$j], $coautores[$i][$j], $nome_participante);
									
								else { // insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
									$senha_random = rand(111111, 999999);
									
									// se o autor for doutorando, mestre ou mestrando, o tipo de participante dele é pós-graduação
									if (in_array($ids_formacao_co_autor[$i][$j], array(2, 3, 4)))							
										$tipo_participante = 11; // pós-graduação / graduation students
									else
										$tipo_participante = 12; // professores / faculty

									$sql_insert = "INSERT INTO ev_participante (id_evento, nome, email, senha, modalidade_participacao, id_formacao, id_tipo_participante)
												   VALUES ({$id_evento}, '{$coautores[$i][$j]}', '{$emails_coautor[$i][$j]}', '{$senha_random}', 1, {$ids_formacao_co_autor[$i][$j]}, $tipo_participante)";
									mysql_query($sql_insert, $conexao);		
									$id_coautor = mysql_insert_id();		
									
									envia_email_nao_cadastrado($emails_coautores[$i][$j], $coautores[$i][$j], $nome_participante, $senha_random);
								}

								// inserir co-autor na tabela que relaciona os participantes com os seus resumos
								mysql_query("INSERT INTO ev_participante_resumo (id_resumo, id_participante, tipo_participante, id_evento, tipo_trabalho) 
											 VALUES ({$id_resumo}, {$id_coautor}, 'coautor', {$id_evento}, {$id_trabalho})", $conexao);
							}
						}		
					}
				}
			} 	
		}
	}
}

$id_coordenada = (int) $_POST['id_coordenada'];	
$sql_coordenada = "SELECT p.nome AS nomeparticipante, c.id AS idcoordenada, c.id_linha_tematica, c.titulo_sessao, c.resumo_sessao, c.palavras_chave_sessao
				   FROM ev_comunicacao_coordenada c, ev_participante p
				   WHERE c.id = {$id_coordenada} AND c.id_coordenador = {$_SESSION['id_participante']} AND c.id_coordenador = p.id
				   ORDER BY c.id ASC";
$coordenadas = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
$ln = mysql_fetch_array($coordenadas);

$sql_temas = "SELECT t.id, t.titulo
			  FROM ev_linha_tematica t
			  WHERE t.id_evento = ".$_SESSION['id_evento'];
$qr_tema = mysql_query($sql_temas, $conexao) or die(mysql_error());

$sql_temas_esp = "SELECT t.id, t.titulo
				  FROM ev_linha_tematica t
				  WHERE t.id = ".$ln['id_linha_tematica'];
$qr_tema_esp = mysql_query($sql_temas_esp, $conexao) or die(mysql_error());
$ln_tema_esp = mysql_fetch_array($qr_tema_esp);
	
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
		$('#resumo_sessao').limit('3500', '#WordCount');	
		for (var i = 0; i <= 5; i++)
			$('#resumo' + i).limit('3500', '#WordCount' + i);
	});	
	
	function novo_coautor(i) {
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
	    <p class="txt_categorias"><strong><?php techo('EDI&Ccedil;&Atilde;O de trabalho', 'Paper editing'); ?></strong></p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if (sizeof($error) != 0) { 
		    print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div><br />";
		}
		
		if (($_POST["update"] == "true") and (sizeof($error) == 0)) { ?>
			<script>
			alert("<?php techo('Seu trabalho foi atualizado com sucesso.', 'Your paper has been updated successfully.'); ?>");
			window.top.location.href='resumos.php';
			</script>
        <?php
		} ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="editarcoordenada.php">
          <table width="600" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Linha Tem&aacute;tica', 'Thematic Line'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><select name="linha_tematica" class="formulario" id="linha_tematica">
                  <option value="<?php print $ln['id_linha_tematica']; ?>" selected><?php print $ln_tema_esp['titulo']; ?></option>
                  <?php while($ln_tema = mysql_fetch_assoc($qr_tema)){?>
                  <option  value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
                  <?php } ?>
                </select>              </td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="139" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo da sess&atilde;o', 'Session title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
              <td width="461"><input name="titulo_sessao" type="text" class="formulario" id="titulo_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo_sessao); }else{ print $ln['titulo_sessao'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Resumo da sess&atilde;o', 'Session summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1000 e 2000 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_topico_tabela">
                <textarea name="resumo_sessao" cols="65" rows="10" class="formulario" id="resumo_sessao"><?php if(sizeof($error)!= 0){ print stripslashes($resumo_sessao); }else{ print $ln['resumo_sessao'];} ?></textarea>
              </span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><input name="palavras_sessao" type="text" class="formulario" id="palavras_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras_sessao); }else{ print $ln['palavras_chave_sessao'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_desc_tabela"><?php techo('3 palavras-chave separadas por ponto e v&iacute;rgula', '3 keywords separated by semicolons'); ?></span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">--------------------------------------------------------------------------------------------------<br /><br /></td>
            </tr>
            <tr>
				<td colspan="2">
				<?php

				//busca resumos
			   	$sql_resumo = "SELECT * 
							   FROM ev_resumo 
							   WHERE id_comunicacao_coordenada = ".$ln['idcoordenada'];
				$qr_resumo=mysql_query($sql_resumo, $conexao);
				

				$i = $k = 0;
				while ($ln_resumo=mysql_fetch_array($qr_resumo)){
			   		$ln_autor = $ln_coautor = "";
					
					//busca nome e email do autor se existir
					$sql_autor = "SELECT nome, email 
								  FROM ev_participante 
								  WHERE id = (SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = {$ln_resumo['id']} AND tipo_participante = 'autor')";
					$qr_autor = mysql_query($sql_autor, $conexao) or die(mysql_error());
					$ln_autor = mysql_fetch_array($qr_autor);
					
					//busca nome e email do cocautor de existir
					$sql_coautor = "SELECT nome, email
									FROM ev_participante 
									WHERE id IN (SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = {$ln_resumo['id']} AND tipo_participante = 'coautor')";
					$qr_coautor = mysql_query($sql_coautor, $conexao) or die(mysql_error());
					
					$lista_coautores = array();
					while ($ln_coautor = mysql_fetch_array($qr_coautor))
						$lista_coautores[] = $ln_coautor;
					
					/*
					// busca autor do resumo
					if ($ln_resumo['autor'] != 0){
						$sql_autor = "SELECT id, nome, email FROM ev_participante WHERE id = ".$ln_resumo['autor'];
						$qr_autor = mysql_query($sql_autor, $conexao) or die(mysql_error());
						$ln_autor = mysql_fetch_array($qr_autor);
					}
					
					//busca nome do cocautor de existir
					if ($ln_resumo['co_autor'] != 0) {
						$sql_coautor = "SELECT id,nome,email FROM ev_participante WHERE id=".$ln_resumo['co_autor'];
						$qr_coautor = mysql_query($sql_coautor, $conexao) or die(mysql_error());
						$ln_coautor = mysql_fetch_array($qr_coautor);
					}*/
					?>
					<table width="600" border="0">
							<tr>
							  <td width="140" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo', 'Title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
							  <td width="460">
							  <input name="id_resumo[]" type="hidden" id="id_resumo[]" value="<?=$ln_resumo['id'];?>" />
							  <input name="titulo[]" type="text" class="formulario" id="titulo[]" size="72" maxlength="250" value="<?=$ln_resumo['titulo'];?>" /></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela"><strong><?php techo('Autor', 'Author'); ?><span class="dados_obrigatorios">*</span></strong></td>
							  <td class="txt_resposta"><?php print $ln_autor['nome'].' ('.$ln_autor['email'].')'; ?></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela"><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
							  <td class="txt_resposta">
								<?php 
								foreach($lista_coautores as $coautor) 
									echo "{$coautor['nome']} ({$coautor['email']}) <br />";
								if (sizeof($lista_coautores) == 0) 
									echo '-'; 
								?>
							  </td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela"><strong><?php techo('Resumo', 'Summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
							  <td><b><span id="WordCount<?=$i;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1000 e 2000 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela">&nbsp;</td>
							  <td><textarea name="resumo[]" cols="71" rows="10" class="formulario" id="resumo<?=$i;?>"><?=$ln_resumo['resumo'];?></textarea></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
							  <td><input name="palavras[]" type="text" class="formulario" id="palavras[]" size="72" maxlength="250" value="<?=$ln_resumo['palavras_chave'];?>" /></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela">&nbsp;</td>
							  <td><span class="txt_desc_tabela"><?php techo('3 palavras-chave separadas por ponto e v&iacute;rgula', '3 keywords separated by semicolons'); ?></span></td>
							</tr>
							<tr>
							  <td class="txt_topico_tabela">&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
					  </table>
		              --------------------------------------------------------------------------------------------------
        		     <?php
				$i++;
				$k++;
			} //while
			
			// Acrescentar mais campos para acrescentar mais trabalhos caso a qunatidade de trabalhos seja menor que 6.
			// Há usuário que cadastram trabalhos (resumos) depois de já terem cadastrado a Comunicação Coordenada
			while($k < 6){ ?>
				<table width="600" border="0">
                    <tr>
                      <td width="140" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo', 'Title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
                      <td width="460">
                      <input name="id_resumo[]" type="hidden" id="id_resumo[]" value="-1" />
                      <input name="titulo[<?php echo $k; ?>]" type="text" class="formulario" id="titulo[<?php echo $k; ?>]" size="72" maxlength="250" /></td>
                    </tr>
                    <?php /*
                    <tr>
                      <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
                      <td class="txt_resposta"></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
                      <td class="txt_resposta"></td>
                    </tr>
                    */ 
                    ?>
					<tr>
						<td class="txt_topico_tabela"><strong><?php techo('Autor', 'Author'); ?><span class="dados_obrigatorios">*</span></strong></td>
						<td>
							<input name="autor[<?php echo $k; ?>]" type="text" class="formulario" id="autor[<?php echo $k; ?>]" size="30" maxlength="70" />
							<span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
							<input name="email_autor[<?php echo $k; ?>]" type="text" class="formulario" id="email_autor[<?php echo $k; ?>]" size="30" maxlength="70" />
							<br />
							<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
							<input name="cpf_autor[<?php echo $k; ?>]" type="text" class="formulario cpf_autor" size="20" maxlength="70" />
							<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
							<input name="passaporte_autor[<?php echo $k; ?>]" type="text" class="formulario passaporte_autor" size="20" maxlength="70" />
						</td>
					</tr>
                      <tr>
                        <td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?><span class="dados_obrigatorios">*</span></strong></td>
                        <td>
                            <input type="radio" name="id_formacao_autor[<?php echo $k; ?>]" value="1" /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctoral'); ?></b></span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="id_formacao_autor[<?php echo $k; ?>]" value="2" /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral\'s program'); ?></b></span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="id_formacao_autor[<?php echo $k; ?>]" value="3" /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master'); ?></b></span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="id_formacao_autor[<?php echo $k; ?>]" value="4" /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s program'); ?></b></span>
                        </td>
                      </tr>
					  <tr>
						<td colspan="2">
							<table class="co_autor_<?php echo $k; ?>">
								<tr>
									<td class="txt_topico_tabela"><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
									<td>
										<input name="coautor[<?php echo $k; ?>][]" type="text" class="formulario" size="30" maxlength="70" /> <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
										<input name="email_coautor[<?php echo $k; ?>][]" type="text" class="formulario" size="30" maxlength="70" />
										<br />
										<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
										<input name="cpf_coautor[<?php echo $k; ?>][]" type="text" class="formulario cpf_coautor" size="20" maxlength="70" />
										<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
										<input name="passaporte_coautor[<?php echo $k; ?>][]" type="text" class="formulario passaporte_coautor" size="20" maxlength="70" />
									</td>
								</tr>
								<tr>
									<td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?><span class="dados_obrigatorios">*</span></strong></td>
									<td>
										<input type="radio" name="id_formacao_co_autor[<?php echo $k; ?>][0]" value="1" /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctoral'); ?></b></span>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" name="id_formacao_co_autor[<?php echo $k; ?>][0]" value="2" /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral\'s program'); ?></b></span>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" name="id_formacao_co_autor[<?php echo $k; ?>][0]" value="3" /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master'); ?></b></span>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" name="id_formacao_co_autor[<?php echo $k; ?>][0]" value="4" /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s program'); ?></b></span>
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>	  
						<td colspan="2">
							<a id="add_coautor_<?php echo $k; ?>" href="#" onclick="return novo_coautor(<?php echo $k; ?>);">+ <?php techo('Adicionar co-autor', 'Add co-author'); ?></a>
						</td>
					</tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong><?php techo('Resumo', 'Summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
                      <td><b><span id="WordCount<?=$k;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1000 e 2000 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><textarea name="resumo[<?php echo $k; ?>]" cols="71" rows="10" class="formulario" id="resumo<?=$k;?>"></textarea></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
                      <td><input name="palavras[<?php echo $k; ?>]" type="text" class="formulario" id="palavras[]" size="72" maxlength="250" /></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><span class="txt_desc_tabela"><?php techo('3 palavras-chave separadas por ponto e v&iacute;rgula', '3 keywords separated by semicolons'); ?></span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
              </table>
              --------------------------------------------------------------------------------------------------
              <?php
			  $k++;
			}//while
			?>
                </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="button" id="button" value="<?php techo('Atualizar trabalho', 'Update paper'); ?>" class="botao" />
                  <input name="update" type="hidden" id="insert" value="true" />
                  <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>" />
                  <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>" />
                  <input name="id_coordenada" type="hidden" value="<?php print $ln['idcoordenada'];?>" />              
			  </td>
            </tr>
          </table>
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