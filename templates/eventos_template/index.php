<?php
// Este redirecionamento é para o modal (FancyBox) do Programa do evento funcionar direito.
// Este arquivo index.php está dentro do Joomla! e o FancyBox não está funcionando direito.
// Por isso redirecionei para dentro do diretório eventoalab/queering, pois lá está funcionando.
// Para outros eventos essa parte poderá ser retirada.
// Daniel Costa - 15-03-2012
$id_artigo=JRequest::getVar('id');
if($id_artigo == 103): // Programa
	header("Location: http://alab.org.br/eventosalab/queering/pag.php?view=article&id=103&lang=pt");
endif;
?>
<?php include("eventosalab/conexao.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">

    <jdoc:include type="head" />
	<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/editor.css" type="text/css" />

	<script type="text/javascript" src="templates/<?php echo $this->template; ?>/js/jquery.js"></script> 
	<script language="javascript" type="text/javascript">
                                <!--
                                        function submitjnewslettermod1(formname) {
                                                var form = eval('document.'+formname);if(!form.elements) form = form[1];var place = form.email.value.indexOf("@",1);var point = form.email.value.indexOf(".",place+1);
                                if (form.name.value == "" || form.name.value == "Nome") {
                                        alert( "Por favor, informe seu nome." );return false;
                                } if (form.email.value == "" || form.email.value == "E-mail") {alert( "Por favor, informe um endereA§o de e-mail vAAlido." );return false;
                                                                        } else {if ((place > -1)&&(form.email.value.length >2)&&(point > 1)){form.submit();return true;
                                                                                                } else {alert( "Por favor, informe um endereA§o de e-mail vAAlido." );return false;}}}
                                                //-->
                        </script>


	<title>ALAB - Associação de Linguística Aplicada do Brasil</title>
</head>
<?
	$id_artigo=JRequest::getVar('id');
	$sql="SELECT catid FROM jos_content WHERE id='$id_artigo'";
	$qr=mysql_query($sql,$conexao) or die(mysql_error());
	$ln=mysql_fetch_array($qr);
	$id_evento=$ln['catid'];
//print_r($id_evento);
//print "id evento: ".$id_evento."<br />";
//print "id evento2: ".md5($id_evento);

?>
<body>
    <div id="tudo">
		<div id="header">
		<?php
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT description FROM #__categories WHERE id = '.$id_evento);
		$banner_evento = $db->loadResult();
		echo $banner_evento;
		?>
		
		<!--<img src="templates/<?php echo $this->template; ?>/images/cbla_banner_final_pequeno.jpg" width="990" height="215" />  -->      
        </div>
		<?php if ($id_evento == 28): //queering ?>
			<div id="menu_idiomas"><a href="http://alab.org.br/eventosalab/queering/pag.php?view=article&id=<?=$id_artigo;?>&lang=pt"><img src="http://alab.org.br/eventosalab/images/flag_pt.gif" alt="" /></a> &nbsp; <a href="http://alab.org.br/eventosalab/queering/pag.php?view=article&id=<?=$id_artigo;?>&lang=en"><img src="http://alab.org.br/eventosalab/images/flag_en.gif" alt="" /></a></div>
		<?php endif; ?>
		<div id="menu_eventos_alab">
                <!--<jdoc:include type="modules" name="menu_eventos_alab" style="xhtml" />-->
                <ul>
                	<? 
					$sql="SELECT * FROM ev_item_menu_evento WHERE id_evento='$id_evento' ORDER BY ordem";
					$qr=mysql_query($sql, $conexao) or die(mysql_error());
					while($ln=mysql_fetch_array($qr)){ 		 					
					?>                	
	                	<li><a href="index.php?option=com_content&view=article&id=<?=$ln['id_artigo'];?>"><?=utf8_encode($ln['texto_botao']);?></a></li>
                    <? } ?>
                </ul> 
                
      </div> 
      <div class="clear"></div>
	  <p>&nbsp;</p>
	  
	  <?php 
	  ////////////////////////////////////////////////////////////////
	  // ALTERAR TAMBÉM NO ARQUIVO www/eventosalab/queering/pag.php //
	  ////////////////////////////////////////////////////////////////
      //if($_GET['t'] == "daniel"){ 
          list($qtd_participantes) = mysql_fetch_array(mysql_query("SELECT COUNT(id) AS qtd_participantes FROM ev_participante WHERE id_evento = 28", $conexao));
          //echo "participantes: " . $qtd_participantes;
          if($qtd_participantes < 599){ //599
              ?>
				<form action="http://www.alab.org.br/eventosalab/queering/index.php" method="post">
					<input name="inscreva" type="submit" value="Inscreva-se aqui para este evento" class="botao_inscrevase" />
					<input name="id" type="hidden" value="<?php echo $id_evento; ?>" />
				</form>
              <?php 
          } //if
      //}
      /**/ 
      ?>
		
        
        <div id="centro">
		
           <div id="artigo">
	           <div id="box_trabalhos">	
           
	               <jdoc:include type="component" />
	           </div>
           </div>
        </div>   

  <div id="lado_direito">
			<div id="links_rapidos">
	            <div class="titulo_boxes">
	              <h2>&Aacute;rea do Participante</h2>
	            </div>
                    <form action="http://www.alab.org.br/eventosalab/<?php if ($id_evento == 28) echo 'queering/'; ?>controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td width="51" class="txt_topico_tabela">e-mail:</td>
                            <td width="149"><input name="login" type="text" class="formulario" size="26"></td>
                          </tr>
                          <tr>
                            <td class="txt_topico_tabela">senha:</td>
                            <td><input name="pass" type="password" class="formulario" size="15" >&nbsp;<input type="submit" class="botao" value="entrar" /><input name="id_evento" type="hidden" value="<?php print $id_evento;?>"><input type="hidden" name="logar" value="true"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <!-- id = id do envento-->
                            <td class="txt"><a href="http://www.alab.org.br/eventosalab/<?php if ($id_evento == 28) echo 'queering/'; ?>pass.php" >esqueci minha senha</a></td>
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

