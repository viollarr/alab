<?php
	session_start();
	require_once("../conexao.php");
	
	$id_artigo=(int)$_REQUEST['id'];
	
	$sql="SELECT catid,introtext,title FROM jos_content WHERE id='$id_artigo'";
	$qr=mysql_query($sql,$conexao) or die(mysql_error());
	$ln=mysql_fetch_array($qr);
	$id_evento=$ln['catid'];
	$title=$ln['title'];
	$conteudo=$ln['introtext'];
	
	
	// Para puxar as imagens do lugar certo! Ou seja, sair de eventosalab e ir para a raiz do site
	// images/
	$conteudo = str_replace("src=\"images/", "src=\"../../images/", $conteudo);
	// <a href="images/stories/alab/CBLA/anais-modelo-ixcbla.doc">anais-modelo-ixcbla.doc <img border="0" src="../components/com_linkr/assets/img/files.icon.doc.png"></a>
	$conteudo = str_replace("href=\"images/", "href=\"../../images/", $conteudo);
	
	// Componente Linkr
	// <img border="0" src="components/com_linkr/assets/img/files.icon.doc.png">
	$conteudo = str_replace("src=\"components/", "src=\"../../components/", $conteudo);
	
	
	$_SESSION["id_evento"] = $id_evento;
	
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
     $(document).ready(function(){
         
         $("select[name=estado]").change(function(){
            $("select[name=cidade]").html('<option value="0">Carregando...</option>');
            
            $.post("cidades.php",
                  {estado:$(this).val()},
                  function(valor){
                     $("select[name=cidade]").html(valor);
                  }
            )
         })
      })
	  
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
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
        </div>
		<div id="menu_eventos_alab">
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
       <p><span class="txt_titulo_destaque"><?php echo $title; ?></span><br /></p>
       <p>&nbsp;</p>
       <div id="texto_conteudo">
	       <?php echo $conteudo;?>      
       </div>
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
                            <td class="txt"><div align="left"><a href="pass.php" >esqueci minha senha</a></div></td>
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
<?php 
//print "id evento: ".$_SESSION["id_evento"].'<br />';
//print $id_evento_codificado="codificado: ".base64_encode($id_evento).'<br />';
//print $id_evento_decodificado="DEcodificado: ".base64_decode($id_evento_codificado).'<br />';
?>    
</body>
</html>