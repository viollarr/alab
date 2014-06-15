<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
/*	
				function envia_email_ja_cadastrado($email_para_quem, $nome_para_quem, $de_quem){
							
							$id_evento_cript=base64_encode($_SESSION['id_evento']);
							
							$quemenvia="ALAB";
							$email_alab = "alab@alab.org.br";
							$assunto = "Convite para participar de evento - ALAB";
							
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
														<td align=\"left\">Olá '.$nome_para_quem.',<br /><br />
														'.$de_quem.' lhe convidou a fazer parte de um grupo de trabalho.<br /><br /></td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>
													 <tr>
														<td><a href="http://www.alab.org.br/eventosalab/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
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
							$assunto = "Convite para participar de evento - ALAB";
							
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
														<td align=\"left\">Olá '.$nome_para_quem.',<br /><br />
														'.$de_quem.' lhe convidou a fazer parte de um grupo de trabalho.<br /><br />
														Segue abaixo seu e-mail e senha de acesso do evento da ALAB:</td>
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
														<td><a href="http://www.alab.org.br/eventosalab/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>													 														 
													 <tr>
														<td>Basta entrar com o e-mail e senha na área do participante e completar seus dados.</td>
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
					
	*/				
	
	if ($_POST["update"] == "true"){
		$id_evento		= (int)$_SESSION['id_evento'];
		$id_participante= (int)$_SESSION["id_participante"];
		$idresumo		= (int)$_POST['idresumo'];
		$tipo_poster	= (int)$_POST['tipo_poster'];

		$linha_tematica	= (int)$_POST['linha_tematica'];
		$titulo			= addslashes(trim($_POST['titulo']));
		$resumo			= addslashes(trim($_POST['resumo']));
		$palavras		= addslashes(trim($_POST['palavras']));
		//$autor=addslashes(trim($_POST['autor']));
		//$coautor=addslashes($_POST['coautor']);
		//$email_coautor=trim($_POST['email_coautor']);					

		if ($id_trabalho==4){ if($tipo_poster==""){$error[]="Informe a modalidade";}}
		if ($linha_tematica==""){$error[]="Selecione a linha temática"; }
		if ($titulo==""){$error[]="Infome o título"; }
		if ($resumo==""){$error[]="Infome o resumo"; }
		if ($palavras==""){$error[]="Informe as palavras-chave"; }
			
			if(sizeof($error)==0){
				$sql_update_trabalho = "UPDATE ev_resumo SET
									   id_linha_tematica = '$linha_tematica',
									   titulo = '$titulo',
									   resumo = '$resumo',
									   palavras_chave = '$palavras'
									   WHERE id='$idresumo'";
				mysql_query($sql_update_trabalho, $conexao);
				$registro_atualizado=mysql_affected_rows();
			}//size error
	}//update true

	$id_resumo=(int)$_POST['id_resumo'];
	$sql="SELECT lt.id AS idtematica, lt.titulo AS titulotematica, r.id_tipo_trabalho, r.id AS idresumo, r.tipo_poster, r.titulo, r.resumo, r.palavras_chave, r.autor, r.co_autor, r.co_autor2, r.co_autor3 
		  FROM ev_resumo r, ev_linha_tematica lt 
		  WHERE r.id = '".$id_resumo."' AND
		  r.id_linha_tematica = lt.id";
	$qr=mysql_query($sql, $conexao);
	$ln=mysql_fetch_array($qr);
		
	if ($ln['autor']!=0){
		$sql_autor="SELECT ev.id, us.name FROM ev_participante ev, jos_users us WHERE ev.id='".$ln['autor']."' AND ev.id_associado_alab = us.id";
		$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
		$ln_autor=mysql_fetch_array($qr_autor);
	}
	//busca nome do cocautor de existir
	if ($ln['co_autor']!=0){
		$sql_coautor="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$ln['co_autor']."' AND ev.id_associado_alab = us.id";
		$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
		$ln_coautor=mysql_fetch_array($qr_coautor);
	}
	if ($ln['co_autor2']!=0){
		$sql_coautor2="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$ln['co_autor2']."' AND ev.id_associado_alab = us.id";
		$qr_coautor2=mysql_query($sql_coautor2, $conexao) or die(mysql_error());
		$ln_coautor2=mysql_fetch_array($qr_coautor2);
	}
	if ($ln['co_autor3']!=0){
		$sql_coautor3="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$ln['co_autor2']."' AND ev.id_associado_alab = us.id";
		$qr_coautor3=mysql_query($sql_coautor3, $conexao) or die(mysql_error());
		$ln_coautor3=mysql_fetch_array($qr_coautor3);
	}

	$sql_temas = "SELECT t.id, t.titulo
				  FROM ev_linha_tematica t
				  WHERE t.id_evento = '".$_SESSION['id_evento']."'";
	$qr_tema= mysql_query($sql_temas, $conexao) or die(mysql_error());



	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />
<script language="javascript">
    function counterUpdate(opt_countedTextBox, opt_countBody, opt_maxSize) {
        var countedTextBox = opt_countedTextBox ?
                opt_countedTextBox : "countedTextBox";
        var countBody = opt_countBody ? opt_countBody : "countBody";
        var maxSize = opt_maxSize ? opt_maxSize : 1024;
    
        var field = document.getElementById(countedTextBox);
        if (field && field.value.length >= maxSize) {
            field.value = field.value.substring(0, maxSize);
        }
        var txtField = document.getElementById(countBody);
        if (txtField) {  
            txtField.innerHTML = field.value.length;
        }
    }
    </script>
</head>

<body>
<div id="tudo">

		<div id="header">
            <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
        <div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
		<div id="box_trabalhos">
	    <p class="txt_categorias"><strong>EDI&Ccedil;&Atilde;O de trabalho</strong></p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		
		if (($_POST["update"] == "true") and (sizeof($error)==0)){
		?>
		 <script>
		 alert("Seu trabalho foi atualizado com sucesso.");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
		
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="editarresumo.php">
          <table width="600" border="0" cellspacing="0" cellpadding="0">
	<?php
		if($ln['id_tipo_trabalho'] == 4){
	?>
            <tr>
                <td class="txt_topico_tabela"><strong>Modalidade<span class="dados_obrigatorios">*</span></strong></td>
                <td>
                	<input type="radio" disabled="disabled" name="tipo_poster" <?php if($tipo_poster == 1){ echo 'checked="checked"'; }elseif($ln['tipo_poster'] == 1){ echo 'checked="checked"'; } ?> value="1" />&nbsp;Online&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" disabled="disabled" name="tipo_poster" <?php if($tipo_poster == 2){ echo 'checked="checked"'; }elseif($ln['tipo_poster'] == 2){ echo 'checked="checked"'; } ?> value="2" />&nbsp;Presencial
                </td>
            </tr>
            <tr>
                <td class="txt_topico_tabela">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
    <?php } ?>
            <tr>
              <td class="txt_topico_tabela"><strong>Linha Tem&aacute;tica<span class="dados_obrigatorios">*</span></strong></td>
              <td><select name="linha_tematica" class="formulario" id="linha_tematica">
                  <?php while($ln_tema = mysql_fetch_assoc($qr_tema)){?>
                  <option <?php if($linha_tematica == $ln_tema['id']){ echo 'selected="selected"'; } ?> value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="118" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
              <td width="482"><input name="titulo" type="text" class="formulario" id="titulo" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo); }else{ print $ln['titulo'];} ?>" /></td>
            </tr>
            <tr>
              <td colspan="2" class="txt_desc_tabela">&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
              <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_topico_tabela">
                <textarea name="resumo" cols="65" rows="15" class="formulario" id="resumo" onkeyup="counterUpdate('resumo', 'WordCount', 2000);"><?php if(sizeof($error)!= 0){ print stripslashes($resumo); }else{ print $ln['resumo'];} ?></textarea>
              </span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
              <td><input name="palavras" type="text" class="formulario" id="palavras" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras); }else{ print $ln['palavras_chave'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="button" id="button" value="Atualizar trabalho" class="botao" />
                  <input name="update" type="hidden" id="update" value="true" />
                  <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>" />
                  <input name="idresumo" type="hidden" value="<?php print $ln['idresumo'];?>" />
                  <input name="id_tipo_trabalho" type="hidden" value="<?php print $id_tipo_trabalho;?>" />
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
			<?php require_once("login_logout.php"); ?>
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
