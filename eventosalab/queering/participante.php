<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");

	
	if ($_POST["atualizar"] == "true") {
	
		$nome = $_POST['nome'];
		$instituicao = addslashes($_POST['instituicao']);
		$cpf=addslashes($_POST['cpf']);
		$passaporte = trim($_POST['passaporte']);
		$email = strtolower(addslashes( trim($_POST['email']) )); 
		$senha = trim($_POST['senha']); 
		$tipo_participante = trim($_POST['tipo_participante']);
		$modalidade_participacao = trim($_POST['modalidade_participacao']);
		$observacoes = addslashes($_POST['observacoes']);
		$id_evento = (int) $_POST['id_evento'];
		
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
		
		if(sizeof($error)==0){
			/*
			$sql_update = "UPDATE ev_participante 
						   SET id_evento = '$id_evento', nome ='$nome', instituicao = '$instituicao', email = '$email', senha = '$senha', cpf = '$cpf', passaporte = '$passaporte', modalidade_participacao = '$modalidade_participacao', observacoes = '$observacoes' 
						   WHERE id='".$_SESSION['id_participante']."'";
			*/
			$sql_update = "UPDATE ev_participante 
						   SET id_evento = '$id_evento', nome ='$nome', instituicao = '$instituicao', email = '$email', senha = '$senha', cpf = '$cpf', passaporte = '$passaporte', observacoes = '$observacoes' 
						   WHERE id='".$_SESSION['id_participante']."'";
			mysql_query($sql_update, $conexao);
			$registro_atualizado=mysql_affected_rows();
		}

	
	}//fim form atualizar

	/*BUSCA TODOS OS TIPOS DE PARTICIPANTE - Modalidade de inscrição*/
	$sql_tipo_participante = "SELECT * FROM ev_tipo_participante WHERE id_evento = {$_SESSION["id_evento"]} AND online='sim'";
	$qr_tipo_participante = mysql_query($sql_tipo_participante, $conexao) or die(mysql_error());
	
	$sql_participante = "SELECT * FROM ev_participante WHERE id='".$_SESSION['id_participante']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />   
        </div>
		<div id="menu_idiomas"><a href="participante.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="participante.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
        <div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque"><?php techo('Dados do Participante', 'Participant\'s data'); ?></span>
       <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		else if (($_POST["atualizar"] == "true") and (sizeof($error)== 0)){
		 /*
		   print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   print "Seu cadastro foi atualizado com sucesso.<br />";
		   print "</div> <br />";
		 */
		 ?>
		<script>
		 alert("<?php techo('Seu cadastro foi atualizado com sucesso.', 'Your account has been successfully updated.'); ?>");
		 window.top.location.href='principal.php';
		 </script>
  	  <?php
        }	
	  ?>
       <p>&nbsp;</p>
       <form id="form1" name="form1" method="post" action="participante.php">
         <table width="600" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="138" class="txt_topico_tabela"><strong><?php techo('Nome', 'Registrant name'); ?></strong><span class="dados_obrigatorios">*</span> </td>
             <td width="462"><input name="nome" type="text" class="formulario" id="nome" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $nome; }else{ print $p['nome'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela"><?php techo('Os certificados  ser&atilde;o emitidos a partir dos dados apresentados', 'Certificates will be generated from the data presented'); ?></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td><span class="txt_topico_tabela"><strong><?php techo('Institui&ccedil;&atilde;o', 'Institution'); ?></strong><span class="dados_obrigatorios">*</span></span></td>
             <td><input name="instituicao" type="text" class="formulario" id="instituicao" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $instituicao; }else{ print $p['instituicao'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
		   <tr>
				<td class="txt_topico_tabela"><strong><?php techo('Endereço de e-mail', 'E-mail address'); ?></strong><span class="dados_obrigatorios">*</span></td>
				<td><input name="email" type="text" class="formulario" id="email" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $email; }else{ print $p['email'];} ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" class="txt_desc_tabela"><?php techo('Informe um e-mail v&aacute;lido (ser&aacute; usado para entrar na &aacute;rea do participante)', 'Enter a valid e-mail address (will be used to enter the participant area)'); ?></td>
			</tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong><?php techo('Senha', 'Password'); ?></strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="senha" type="password" class="formulario" id="senha" size="20" maxlength="30" value="<?php if(sizeof($error)!= 0){ print $senha; }else{ print $p['senha'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>CPF</strong></td>
             <td><input name="cpf" type="text" class="formulario" id="cpf" size="30" maxlength="11" value="<?php if(sizeof($error)!= 0){ print $cpf; }else{ print $p['cpf'];} ?>" /></td>
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
             <td><input name="passaporte" type="text" class="formulario" id="passaporte" size="30" maxlength="25" value="<?php if(sizeof($error)!= 0){ print $passaporte; }else{ print $p['passaporte'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2"><span class="txt_desc_tabela"><?php techo('Informe o n&uacute;mero do passaporte caso seja estrangeiro ou n&atilde;o tenha CPF', 'Enter the passport number if you\'re not brazilian or don\'t have CPF'); ?></span></td>
            </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <? if(($p['id_tipo_participante']!=8) and ($p['id_tipo_participante']!=10)){ ?>
           <tr>
             <td class="txt_topico_tabela" width="200"><strong><?php techo('Inscri&ccedil;&atilde;o', 'Registration'); ?></strong><span class="dados_obrigatorios">*</span></td>
             <td><span class="txt_resposta">
               <?php 
			   /*
			   while($ln_tipo_participante = mysql_fetch_assoc($qr_tipo_participante)){?>
               <input type="radio" name="tipo_participante" id="tipo_participante" value="<?php print $ln_tipo_participante['id']; ?>" <?php if(sizeof($error)!= 0){ if($tipo_participante==$ln_tipo_participante['id']){ print "checked"; }}else if($p['id_tipo_participante']==$ln_tipo_participante['id']){ print "checked"; } ?> />
               <?php print htmlentities($ln_tipo_participante['nome']); ?><br />
               <?php 
			   }//while 
			   */
			   while($ln_tipo_participante = mysql_fetch_assoc($qr_tipo_participante)){?>
               <input type="radio" name="tipo_participante" id="tipo_participante" value="<?php print $ln_tipo_participante['id']; ?>" <?php 
			   	if($p['id_tipo_participante']==$ln_tipo_participante['id']){ print "checked=\"checked\""; } 
				?> disabled="disabled" />
               <?php techo($ln_tipo_participante['nome'], $ln_tipo_participante['nome_en']); ?><br />
               <?php 
			   }//while 
			   ?>
             </span> </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <? }else{?>
		   	<input name="tipo_participante" type="hidden" value="<?=$p['id_tipo_participante']?>" />
		   <? } ?>
		   <tr>
				<td><span class="txt_topico_tabela"><strong><?php techo('Apresenta&ccedil;&atilde;o de trabalho?', 'Paper presentation?'); ?></strong></span></td>
				<td>
					<span class="txt_resposta">
						<input type="hidden" name="modalidade_participacao" value="0" />
						<input type="checkbox" name="modalidade_participacao" id="modalidade_participacao" value="1" <?php if(sizeof($error) != 0) { if($modalidade_participacao == 1) { print "checked"; }} elseif ($p['modalidade_participacao'] == 1) print "checked"; ?> />
					</span>
				</td>
			</tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
		   <tr>
				<td class="txt_topico_tabela"><strong><?php techo('Observa&ccedil;&otilde;es', 'Extra-information'); ?></strong></td>
				<td style="vertical-align: top;"><textarea name="observacoes" class="formulario" id="observacoes" rows="4" cols="50"><?php if (sizeof($error) != 0) { print $observacoes; } else { print $p['observacoes']; } ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><span class="txt_desc_tabela"><?php techo('Use este espaço para indicar necessidades especiais com referência à dieta alimentar, mobilidade, etc.', 'Use the space above to indicate IF you have any special needs such as dietary restrictions, preferences, special mobility needs etc.'); ?></span></td>
			</tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td><input type="submit" name="button" id="button" value="<?php techo('Confirmar', 'Confirm'); ?>" class="botao" /></td>
             <td><input name="atualizar" type="hidden" id="insert" value="true">
             <input name="id_evento" type="hidden" id="id_evento" value="<?php print $_SESSION['id_evento'];?>"></td>
           </tr>
         </table>
       </form>
        
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
<? //print $_SESSION['id_evento'];?>
</body>
</html>
