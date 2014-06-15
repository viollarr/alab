<?php

session_start();
require_once("../conexao.php");
require_once("../check_lang.php");
//require_once("../admin/funcoes/special_ucwords.php");
require_once("cpf.php");

$id_evento = addslashes($_REQUEST['id']);

$idioma_corrente = $_SESSION['lang'];

if (isset($_REQUEST['acao']) and (addslashes($_REQUEST['acao']) == "logout"))
	$id_evento=base64_decode($id_evento);

$_SESSION["id_evento"] = $id_evento;

if (empty($_SESSION["id_evento"])) 
	header("Location: http://www.alab.org.br/eventos/queering-paradigms-iv");

/* Comentado para evitar que alguém se cadastre acessando o enderço diretamente.
if ($_POST["insert"] == "true"){

	$nome = $_POST['nome'];
	$instituicao = addslashes($_POST['instituicao']);
	$cpf = trim($_POST['cpf']);
	$passaporte = trim($_POST['passaporte']);
	$email = strtolower(addslashes(trim($_POST['email']))); 
	$senha = trim($_POST['senha']); 
	$tipo_participante = trim($_POST['tipo_participante']);
	//$modalidade_participacao = $_POST['modalidade_participacao'];
	$observacoes = addslashes($_POST['observacoes']);
	$id_evento = trim($_POST['id_evento']);

	// TRATA OS ERROS NOS FORMULÁRIOS		
	if (empty($nome))
		$error[] = stecho('Informe seu nome completo', 'Enter your full name');
	if (empty($instituicao))
		$error[] = stecho('Informe a instituição', 'Enter the institution');
	if (empty($email))
		$error[] = stecho('Informe um e-mail', 'Enter a e-mail');
	elseif (!eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email))
		$error[] = stecho('O e-mail informado não é válido', 'The e-mail address is not valid'); 
	if (empty($senha))
		$error[] = stecho('Informe uma senha para acesso deste evento', 'Enter a password to access this event');
	if (empty($cpf) and empty($passaporte))
		$error[] = stecho('Informe o CPF ou o passaporte se for estrangeiro', 'Enter the CPF or passport if foreign');
	if (!empty($cpf) and !isCpf($cpf))
		$error[] = stecho('O CPF informado não é válido', 'The CPF is not valid');
	if (empty($tipo_participante))
		$error[] = stecho('Marque o tipo de inscrição desejado', 'Select the type of registration desired');
	
	// BUSCA EMAIL PARA VERIFICAR SE JÁ EXISTE NO BANCO		
	$resultado_email = mysql_query("SELECT email FROM ev_participante WHERE email='$email' AND id_evento='$id_evento'");
	$email_ja_cadastrado = mysql_affected_rows();
	if ($email_ja_cadastrado > 0)
		$error[] = stecho("O e-mail informado já tem cadastro para este evento", "The e-mail address is already registered for this event");
		
	// BUSCA CPF PARA VERIFICAR SE JÁ EXISTE NO BANCO	
	if (!empty($cpf)) {
		$sql_cpf = mysql_query("SELECT cpf FROM ev_participante WHERE cpf = '$cpf' AND id_evento = $id_evento");
		$count_cpf = mysql_affected_rows();
		if ($count_cpf > 0)
			$error[] = stecho("O CPF informado já tem cadastro para este evento", "The CPF is already registered for this event");
	}
	
	// BUSCA PASSAPORTE PARA VERIFICAR SE JÁ EXISTE NO BANCO	
	if (!empty($passaporte)) {
		$sql_passaporte = mysql_query("SELECT passaporte FROM ev_participante WHERE passaporte = '$passaporte' AND id_evento = $id_evento");
		$count_passaporte = mysql_affected_rows();
		if ($count_passaporte > 0)
			$error[] = stecho("O passaporte informado já tem cadastro para este evento", "The passport is already registered for this event");
	}
	
	if (sizeof($error) == 0) {
		$sql_insert = "INSERT INTO ev_participante (id_evento, nome, instituicao, email, senha, cpf, passaporte, id_tipo_participante, observacoes)
					   VALUES ($id_evento, '$nome', '$instituicao', '$email', '$senha', '$cpf', '$passaporte', $tipo_participante, '$observacoes')";	
		mysql_query($sql_insert, $conexao);
		$registro_inserido = mysql_affected_rows();
		
		if($registro_inserido > 0) { 
			$id_participante = mysql_insert_id();
			mysql_query("INSERT INTO ev_pagamento(id_participante, valor, pago) VALUES($id_participante, 0, 'nao')"); ?>
			<script>
				alert("<?php techo('Seu cadastro foi realizado com sucesso.\n\nEntre com seu e-mail e senha na área do participante para enviar seu trabalho.', 'Your registration was successful.\n\nEnter your email and password in the area of the participant to submit your paper.'); ?>");
				window.top.location.href='index.php?acao=logout&id=<?php print base64_encode($_SESSION['id_evento']); ?>';
			</script>
		<?php   
		}
	} 

}
*/

/*BUSCA TODOS OS TIPOS DE PARTICIPANTE - Modalidade de inscrição*/
$sql_tipo_participante = "SELECT * FROM ev_tipo_participante WHERE id_evento = {$_SESSION["id_evento"]} AND online='sim'";
$qr_tipo_participante = mysql_query($sql_tipo_participante, $conexao) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#cpf').mask('99999999999');
});
</script>
</head>
<body>
<div id="tudo">
	<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />  
	</div>
	<div id="menu_idiomas"><a href="index.php?id=<?php echo $_SESSION['id_evento'];?>&lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="index.php?id=<?php echo $_SESSION['id_evento'];?>&lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
	<div id="menu_eventos_alab">
        <ul>
			<?php 
			$sql = "SELECT * FROM ev_item_menu_evento WHERE id_evento='".$_SESSION["id_evento"]."' ORDER BY ordem";
			$qr = mysql_query($sql, $conexao) or die(mysql_error());
			while($ln = mysql_fetch_array($qr)): ?>                	
				<li>
					<a href="pag.php?view=article&id=<?php echo $ln['id_artigo'];?>">
						<?php techo($ln['texto_botao'], $ln['texto_botao_en']); ?>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>                
    </div> 
 	<div class="clear"></div>
	
	<div id="centro">
		<div id="artigo">
			<div id="box_trabalhos">
				<p>
					<span class="txt_titulo_destaque"><?php techo('Fa&ccedil;a abaixo seu cadastro para este evento', 'Register for this event'); ?></span><br />
					<span class="txt_titulo_noticias_2"><?php techo('Caso j&aacute; esteja cadastrado neste evento, fa&ccedil;a seu login ao lado.', 'If you are already registered for this event, log in using the sidebar.'); ?></span>
				</p>
				<?php
				// SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
				if(sizeof($error) != 0){ 
					echo "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
					foreach ($error as $err)
						echo $err . "<br />";
					echo "</div> <br />";
				}		
				?>
				<p>&nbsp;</p>
				<form id="form1" name="form1" method="post" action="index.php?id=<?php echo $_SESSION["id_evento"];?>">
					<table width="600" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="150" class="txt_topico_tabela"><strong><?php techo('Nome', 'Registrant name'); ?></strong><span class="dados_obrigatorios">*</span> </td>
							<td width="450"><input name="nome" type="text" class="formulario" id="nome" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $nome; } ?>" /></td>
						</tr>
						<tr>
							<td colspan="2" class="txt_desc_tabela"><?php techo('Os certificados  ser&atilde;o emitidos a partir dos dados apresentados', 'Certificates will be generated using the data entered'); ?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><span class="txt_topico_tabela"><strong><?php techo('Institui&ccedil;&atilde;o', 'Institution'); ?></strong><span class="dados_obrigatorios">*</span></span></td>
							<td><input name="instituicao" type="text" class="formulario" id="instituicao" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $instituicao; } ?>" /></td>
						</tr>  
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><strong><?php techo('Endereço de e-mail', 'E-mail address'); ?></strong><span class="dados_obrigatorios">*</span></td>
							<td><input name="email" type="text" class="formulario" id="email" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $email; } ?>" /></td>
						</tr>
						<tr>
							<td colspan="2" class="txt_desc_tabela"><?php techo('Informe um e-mail v&aacute;lido (ser&aacute; usado para entrar na &aacute;rea do participante)', 'Enter a valid email address (It will be used to enter the participant area)'); ?></td>
						</tr>   
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><strong><?php techo('Senha', 'Password'); ?></strong><span class="dados_obrigatorios">*</span></td>
							<td><input name="senha" type="password" class="formulario" id="senha" size="20" maxlength="30" value="<?php if(sizeof($error)!= 0){ print $senha; } ?>" /></td>
						</tr>      
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><strong>CPF</strong></td>
							<td><input name="cpf" type="text" class="formulario" id="cpf" size="30" maxlength="11" value="<?php if(sizeof($error)!= 0){ print $cpf; } ?>" /></td>
						</tr>
						<tr>
							<td colspan="2" class="txt_desc_tabela"><?php techo('Digite apenas n&uacute;meros (sem ponto e tra&ccedil;o)', 'Numbers only (no dot and dash)'); ?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><strong><?php techo('Passaporte', 'Passport'); ?></strong></td>
							<td><input name="passaporte" type="text" class="formulario" id="passaporte" size="30" maxlength="25" value="<?php if(sizeof($error)!= 0){ print $passaporte; } ?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><span class="txt_desc_tabela"><?php techo('Informe o n&uacute;mero do passaporte caso seja estrangeiro ou n&atilde;o tenha CPF', 'Enter your passport number if you\'re not Brazilian or don\'t have a CPF'); ?></span></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela" width="200"><strong><?php techo('Inscri&ccedil;&atilde;o', 'Registration'); ?></strong><span class="dados_obrigatorios">*</span></td>
							<td>
								<span class="txt_resposta">
								<?php while($ln_tipo_participante = mysql_fetch_assoc($qr_tipo_participante)) { ?>
									<input type="radio" name="tipo_participante" id="tipo_participante" value="<?php print $ln_tipo_participante['id']; ?>" <?php if(sizeof($error)!= 0) if($tipo_participante == $ln_tipo_participante['id']) print "checked";?> /> <?php techo($ln_tipo_participante['nome'], $ln_tipo_participante['nome_en']); ?><br />
								<?php } ?>
								</span>             
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
                        <?php /*
						<tr>
							<td><span class="txt_topico_tabela"><strong><?php techo('Apresenta&ccedil;&atilde;o de trabalho?', 'Paper presentation?'); ?></strong></span></td>
							<td>
								<span class="txt_resposta">
									<input type="hidden" name="modalidade_participacao" value="0" />
									<input type="checkbox" name="modalidade_participacao" id="modalidade_participacao" value="1" <?php if(sizeof($error) != 0) if($modalidade_participacao == 1) print "checked"; ?> />
								</span>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						*/ ?>
						<tr>
							<td class="txt_topico_tabela"><strong><?php techo('Observa&ccedil;&otilde;es', 'Extra information'); ?></strong></td>
							<td style="vertical-align: top;"><textarea name="observacoes" class="formulario" id="observacoes" rows="4" cols="50"><?php if (sizeof($error)!= 0) print stripslashes($observacoes); ?></textarea></td>
						</tr>
						<tr>
							<td colspan="2"><span class="txt_desc_tabela"><?php techo('Use este espaço para indicar necessidades especiais com referência à dieta alimentar, mobilidade, etc.', 'Use the space above to indicate IF you have any special needs such as dietary restrictions, preferences, special mobility needs etc.'); ?></span></td>
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
							<td><input type="submit" name="button" id="button" value="<?php techo('Confirmar', 'Confirm'); ?>" class="botao" /></td>
							<td>
								<input name="insert" type="hidden" id="insert" value="true">
								<input name="id_evento" type="hidden" value="<?php print $id_evento;?>">
							</td>
						</tr>
					</table>
				</form>
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
							<td width="51" class="txt_topico_tabela">e-mail:</td>
							<td width="149"><input name="login" type="text" class="formulario" size="26"></td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><?php techo('senha:', 'password:'); ?></td>
							<td><input name="pass" type="password" class="formulario" size="15" >&nbsp;<input type="submit" class="botao" value="<?php techo('entrar', 'sign in'); ?>" /><input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>"><input type="hidden" name="logar" value="true"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="txt"><div align="left"><a href="pass.php" ><?php techo('esqueci minha senha', 'forgot my password'); ?></a></div></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		<br />
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