<?php
	require_once("sessoes.php");
	$id_evento = $_SESSION["id_evento"];
	$select_evento = "SELECT * FROM ev_evento WHERE id = '".$_SESSION["id_evento"]."'";
	$query_evento = mysql_query($select_evento);	
	$rows = mysql_num_rows($query_evento);
	if($rows == 1){
		$evento_conteudo = mysql_fetch_array($query_evento);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="../admin2012/telas/imgs_topo_eventos/<?php echo $evento_conteudo['imagem_topo'] ;?>" width="990" height="215" />        
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
       <span class="txt_titulo_noticias_2">- Informe corretamente o CPF ou Passort, e senha de associado ALAB.</span><br />
       <span class="txt_titulo_noticias_2">- Verifique se esta em dia com as anuidades da ALAB.</span>
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
		<?php require_once("login_logout.php"); ?>
        <br />
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
