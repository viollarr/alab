<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");
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
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$idresumo=(int)$_POST['idresumo'];

		$linha_tematica=(int)$_POST['linha_tematica'];
		$titulo= addslashes(trim($_POST['titulo']));
		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));
		//$autor=addslashes(trim($_POST['autor']));
		//$coautor=addslashes($_POST['coautor']);
		//$email_coautor=trim($_POST['email_coautor']);					

		if ($linha_tematica=="") $error[] = stecho("Selecione a linha temática", "Select the thematic line");
		if ($titulo=="") $error[] = stecho("Infome o título", "Enter the title");
		if ($resumo=="") $error[] = stecho("Infome o resumo", "Enter the summary");
		if (strlen($resumo) < 1500) $error[] = stecho('Você deve digitar pelo menos 1500 caracteres no resumo', 'You must enter at least 1500 characters in the summary');
		if (strlen($resumo) > 3500) $error[] = stecho('Você ultrapassou o limite de 3500 caracteres para o resumo', 'You have exceeded the 3500 character limit for the summary');
		if ($palavras=="") $error[] = stecho("Informe as palavras-chave", "Enter the keywords");
			
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
	$sql="SELECT lt.id AS idtematica, lt.titulo AS titulotematica, r.id_tipo_trabalho, r.id AS idresumo, r.titulo, r.resumo, r.palavras_chave, r.autor, r.co_autor 
		  FROM ev_resumo r, ev_linha_tematica lt 
		  WHERE r.id = '".$id_resumo."' AND
		  r.id_linha_tematica = lt.id";
	$qr=mysql_query($sql, $conexao);
	$ln=mysql_fetch_array($qr);

	
	if ($ln['autor']!=0){
		$sql_autor="SELECT id,nome FROM ev_participante WHERE id='".$ln['autor']."'";
		$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
		$ln_autor=mysql_fetch_array($qr_autor);
	}
	//busca nome do cocautor de existir
	if ($ln['co_autor']!=0){
		$sql_coautor="SELECT id,nome,email FROM ev_participante WHERE id='".$ln['co_autor']."'";
		$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
		$ln_coautor=mysql_fetch_array($qr_coautor);
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
<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.limit-1.2.js" type="text/javascript"></script>

<script language="javascript">
	$(function() {
		$('#resumo').limit('3500', '#WordCount');
	});
</script>

<!--
<script type="text/javascript">
<!--
function CountCharacters(){
	//alert("dentro de CountCharacters");
	document.form_trabalho.CharacterCount.value=document.form_trabalho.resumo.value.length;
	//Conta caracteres
    wordcounter=0;
    for (x=0;x<document.form_trabalho.resumo.value.length;x++) {
        if (document.form_trabalho.resumo.value.charAt(x) == " " && document.form_trabalho.resumo.value.charAt(x-1) != " ")  {
            if (wordcounter < 10)
				wordcounter++
        }  // Counts the spaces while ignoring double spaces, usually one in between each word.
        document.form_trabalho.WordCount.value=wordcounter+1;
        WordCount.innerHTML = document.form_trabalho.WordCount.value=wordcounter+1;
    }
    return false;   
}
-->
<!--
</script>
-->
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
<!--        <p class="destaque"><?php if ($ln['id_tipo_trabalho']==3){ techo('Comunicação Individual', 'Individual Paper');} if ($ln['id_tipo_trabalho']==4){ print 'Pôster';} ?></p>-->
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
		   //print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   //print "Seu trabalho foi enviado com sucesso.<br />";
		   //print "</div> <br />";
		?>
		 <script>
		 alert("<?php techo('Seu trabalho foi atualizado com sucesso.', 'Your paper has been updated successfully.'); ?>");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="editarresumo.php">
          <table width="600" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Linha Tem&aacute;tica', 'Thematic Line'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><select name="linha_tematica" class="formulario" id="linha_tematica">
                  <option value="<?php print $ln['idtematica']; ?>" selected><?php print $ln['titulotematica']; ?></option>
                  <?php while($ln_tema = mysql_fetch_assoc($qr_tema)){?>
                  <option  value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="118" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo', 'Title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
              <td width="482"><input name="titulo" type="text" class="formulario" id="titulo" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo); }else{ print $ln['titulo'];} ?>" /></td>
            </tr>
            <tr>
              <td colspan="2" class="txt_desc_tabela">&nbsp;</td>
            </tr>
            <!--<tr>
              <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
              <td><input name="autor" type="text" class="formulario" id="autor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $autor; }else{ print $ln_autor['nome'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
              <td><input name="coautor" type="text" class="formulario" id="coautor" size="30" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $coautor; }else{ print $ln_coautor['nome'];} ?>" />
                  <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
                  <input name="email_coautor" type="text" class="formulario" id="email" size="30" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $email_coautor; }else{ print $ln_coautor['email'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>-->
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Resumo', 'Summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1000 e 2000 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_topico_tabela">
                <textarea name="resumo" cols="65" rows="15" class="formulario" id="resumo"><?php if(sizeof($error)!= 0){ print stripslashes($resumo); }else{ print $ln['resumo'];} ?></textarea>
              </span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
              <td><input name="palavras" type="text" class="formulario" id="palavras" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras); }else{ print $ln['palavras_chave'];} ?>" /></td>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="button" id="button" value="<?php techo('Atualizar trabalho', 'Update paper'); ?>" class="botao" />
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
