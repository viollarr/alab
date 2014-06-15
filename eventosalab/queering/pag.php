<?php
	session_start();
	require_once("../conexao.php");
	require_once("../check_lang.php");
	
	$id_artigo = (int) $_REQUEST['id'];
	
	$sql = "SELECT catid, introtext, title FROM jos_content WHERE id = $id_artigo";
	$qr = mysql_query($sql,$conexao) or die(mysql_error());
	$ln = mysql_fetch_array($qr);
	$id_evento = $ln['catid'];
	$title = $ln['title'];
	$conteudo = $ln['introtext'];
	
	$query_title = mysql_query("SELECT value FROM jos_jf_content WHERE reference_id = $id_artigo AND reference_field = 'title' AND reference_table = 'content'");
	$query_conteudo = mysql_query("SELECT value FROM jos_jf_content WHERE reference_id = $id_artigo AND reference_field = 'introtext' AND reference_table = 'content'");
	if (mysql_num_rows($query_title))
		$title_en = mysql_result($query_title, 0);
	if (mysql_num_rows($query_conteudo))
		$conteudo_en = mysql_result($query_conteudo, 0);
	
	
	// Para puxar as imagens do lugar certo! Ou seja, sair de eventosalab e ir para a raiz do site
	// images/
	$conteudo = str_replace("src=\"images/", "src=\"../../images/", $conteudo);
	$conteudo_en = str_replace("src=\"images/", "src=\"../../images/", $conteudo_en);
	
	// <a href="images/stories/alab/CBLA/anais-modelo-ixcbla.doc">anais-modelo-ixcbla.doc <img border="0" src="../components/com_linkr/assets/img/files.icon.doc.png"></a>
	$conteudo = str_replace("href=\"images/", "href=\"../../images/", $conteudo);
	$conteudo_en = str_replace("href=\"images/", "href=\"../../images/", $conteudo_en);
	
	// Componente Linkr
	// <img border="0" src="components/com_linkr/assets/img/files.icon.doc.png">
	$conteudo = str_replace("src=\"components/", "src=\"../../components/", $conteudo);
	$conteudo_en = str_replace("src=\"components/", "src=\"../../components/", $conteudo_en);
	
	
	$_SESSION["id_evento"] = $id_evento;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<!-- <script type="text/javascript" src="../js/jquery.js"></script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css" media="screen" />

<script type="text/javascript">
     $(document).ready(function(){
         
		$("select[name=estado]").change(function(){
		  $("select[name=cidade]").html('<option value="0">Carregando...</option>');
		  
		  $.post("cidades.php",
				{estado:$(this).val()},
				function(valor){
				   $("select[name=cidade]").html(valor);
				}
		  )
		});

		// Modal para exibir a imagem do programa.
		$('.QP4_Program').fancybox();
	});
	  
	$(function() {
		$('#datanascimento').mask('99/99/9999');
		$('#cep').mask('99999-999');
		$('#cpf').mask('99999999999');
		$('#telefone').mask('(99) 9999-9999');
	});
</script>
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />        
        </div>
		<div id="menu_idiomas"><a href="pag.php?view=article&id=<?=$id_artigo;?>&lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="pag.php?view=article&id=<?=$id_artigo;?>&lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<!--<div id="menu_eventos_alab">

        </div>--> 
		<div id="menu_eventos_alab">
                <!--<jdoc:include type="modules" name="menu_eventos_alab" style="xhtml" />-->
                <ul>
                	<? 
					$sql="SELECT * FROM ev_item_menu_evento WHERE id_evento='".$_SESSION["id_evento"]."' ORDER BY ordem";
					$qr=mysql_query($sql, $conexao) or die(mysql_error());
					while($ln=mysql_fetch_array($qr)){ 		 					
					?>                	
	                	<li><a href="pag.php?view=article&id=<?=$ln['id_artigo'];?>"><?php techo($ln['texto_botao'], $ln['texto_botao_en']);?></a></li>
                    <? } ?>
                </ul> 
                
      </div> 
      <div class="clear"></div>
		<?php 
		/////////////////////////////////////////////////////////////////////////
		// ALTERAR TAMBÉM NO ARQUIVO www/templates/eventos_templates/index.php //
		/////////////////////////////////////////////////////////////////////////
		//if($_GET['t'] == "daniel"){ 
			list($qtd_participantes) = mysql_fetch_array(mysql_query("SELECT COUNT(id) AS qtd_participantes FROM ev_participante WHERE id_evento = 28", $conexao));
			//echo "participantes: " . $qtd_participantes;
			if($qtd_participantes < 599){ //599
				?>
				<p>&nbsp;</p>
				<form action="index.php" method="post">
					<input name="inscreva" type="submit" value="<?php techo('Inscreva-se aqui para este evento', 'Sign up here for this event'); ?>" class="botao_inscrevase" />
					<input name="id" type="hidden" value="<?php echo $_SESSION['id_evento']; ?>" />
				</form>
				<?php 
			} //if
		//}
		/**/ 
		?>
	  
  <div id="centro">
     <div id="artigo">
     <div id="box_trabalhos">
       <p><span class="txt_titulo_destaque"><?php techo($title, $title_en); ?></span><br /></p>
       <p>&nbsp;</p>
       <div id="texto_conteudo">
	       <p><?php techo($conteudo, $conteudo_en);?></p>       
       </div>
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
                            <!-- id = id do envento-->
                            <td class="txt"><div align="left"><a href="pass.php" ><?php techo('esqueci minha senha', 'forgot my password'); ?></a></div></td>
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
    <?php 
	//print "id evento: ".$_SESSION["id_evento"].'<br />';
	//print $id_evento_codificado="codificado: ".base64_encode($id_evento).'<br />';
	//print $id_evento_decodificado="DEcodificado: ".base64_decode($id_evento_codificado).'<br />';
	?>    
</body>
</html>
