<?php
	require_once("sessoes.php");
	require_once("check_lang.php");
			
	$id_artigo=(int)$_REQUEST['id'];
	$pagina = end(explode("/", $_SERVER['PHP_SELF']));
	
	$sql="SELECT id_evento, conteudo, titulo FROM ev_paginas WHERE id='$id_artigo'";
	$qr=mysql_query($sql,$conexao) or die(mysql_error());
	$ln=mysql_fetch_array($qr);
	$id_evento=$ln['id_evento'];
	$title=$ln['titulo'];
	$conteudo=$ln['conteudo'];
	
	
	// Para puxar as imagens do lugar certo! Ou seja, sair de eventosalab e ir para a raiz do site
	// images/
	$conteudo = str_replace("src=\"images/", "src=\"../../images/", $conteudo);
	// <a href="images/stories/alab/CBLA/anais-modelo-ixcbla.doc">anais-modelo-ixcbla.doc <img border="0" src="../components/com_linkr/assets/img/files.icon.doc.png"></a>
	$conteudo = str_replace("href=\"images/", "href=\"../../images/", $conteudo);
	
	// Componente Linkr
	// <img border="0" src="components/com_linkr/assets/img/files.icon.doc.png">
	$conteudo = str_replace("src=\"components/", "src=\"../../components/", $conteudo);
	
	
	$_SESSION["id_evento"] = $id_evento;
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
<link rel="stylesheet" href="css/template.css" type="text/css" />
<style type="text/css">
	.titulo_boxes {
		color:#FFFFFF;
		text-align:center;
		text-transform:uppercase;
	}
</style>
<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
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
    <div id="mask" style="display:none;"></div>   
        <div id="header">
            <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
        <div class="clear"></div>
		<?php require_once("inscreva_se.php");?>
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
		<?php require_once("login_logout.php"); ?>
        <br />
        <br />
    </div><!-- lado direito -->
    <div class="clear"></div>
    <div id="footer">
        <div align="center">
            <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
        </div>	
    </div>
  	</div>
</body>
</html>