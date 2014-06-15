<?php
	session_start();
	require_once("conexao.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
        </div>
		<div id="menu_eventos_alab">
                <!--<jdoc:include type="modules" name="menu_eventos_alab" style="xhtml" />-->
                <ul>
                	<? 
					$sql="SELECT * FROM ev_item_menu_evento WHERE id_evento='".$_SESSION["id_evento"]."' ORDER BY ordem";
					$qr=mysql_query($sql, $conexao) or die(mysql_error());
					while($ln=mysql_fetch_array($qr)){ 		 					
					?>                	
	                	<li><a href="pag.php?view=article&id=<?=$ln['id_artigo'];?>"><?=$ln['texto_botao'];?></a></li>
                    <? } ?>
                </ul> 
                
      </div> 
 	  <div class="clear"></div>

        
  <div id="centro">
     <div id="artigo">
     <div id="box_trabalhos">
       <p><span class="txt_titulo_destaque">Erro ao acessar a &aacute;rea do participante</span><br />
       <p>&nbsp;</p>
       <span class="txt_titulo_noticias_2">Informe corretamente o e-mail e senha cadastrados para este evento.</span>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
        <p>&nbsp;</p>
       <p>&nbsp;</p>
              <p>&nbsp;</p>
        <p>&nbsp;</p>
       </div>
     </div>
  </div>   

  		<div id="lado_direito">
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Área do Participante</h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td width="51" class="txt_topico_tabela">e-mail:</td>
                            <td width="149"><input name="login" type="text" class="formulario" size="26"></td>
                          </tr>
                          <tr>
                            <td class="txt_topico_tabela">senha:</td>
                            <td><input name="pass" type="password" class="formulario" size="15" >&nbsp;<input type="submit" class="botao" value="entrar" /><input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>"><input type="hidden" name="logar" value="true"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <!-- id = id do envento-->
                            <td class="txt"><div align="left"><a href="pass.php?id=<?php print base64_encode($id_evento); ?>" >esqueci minha senha</a></div></td>
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
