<?php
	require_once("sessoes.php");
	require_once("check_user.php");

	//print_r($_SESSION);
	
	$id_participante = $_SESSION['id_participante'];
	$id_evento       = $_SESSION['id_evento'];
			
	// PÔSTER
	$sql_poster = 
		"SELECT id, titulo
		FROM ev_resumo r
		WHERE 
			id_tipo_trabalho = '4'
			AND (autor = '".$id_participante."' OR co_autor = '".$id_participante."') 
			AND id_evento = '".$id_evento."' 
		";
	$poster = mysql_query($sql_poster, $conexao) or die(mysql_error());
	$existe_poster = mysql_num_rows($poster);
	
	// PAPER
	$sql_paper = 
		"SELECT id, titulo
		FROM ev_resumo r
		WHERE 
			id_tipo_trabalho = '5'
			AND (autor = '".$id_participante."' OR co_autor = '".$id_participante."') 
			AND id_evento = '".$id_evento."' 
		";
	$paper = mysql_query($sql_paper, $conexao) or die(mysql_error());
	$existe_paper = mysql_num_rows($paper);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />
<style type="text/css">
	.titulo_boxes {
		color:#FFFFFF;
		text-align:center;
		text-transform:uppercase;
	}
</style>
<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
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
         <div id="box_trabalhos"><span class="txt_titulo_destaque">Carta de Aceite</span>
           <p>&nbsp;</p> 
           <?php 
		   	// Categorias de carta:
			//
			// PÔSTER
			// PAPER
			
		   $categorias_carta = array(
		   		array("categoria_carta" => "poster", "existe" => $existe_poster, "trabalhos" => $poster, "label" => "P&ocirc;ster"),
				array("categoria_carta" => "paper", "existe" => $existe_paper, "trabalhos" => $paper, "label" => "Paper")
		   );
		   foreach($categorias_carta as $categ_carta){
			   /*
			   print "categoria: <pre>";
			   		print_r($categ_carta);
			   print "</pre>";
			   */
			   if ($categ_carta['existe'] > 0){
						while($mostrar = mysql_fetch_array($categ_carta['trabalhos'])){ ?>
							<p class="destaque"><span class="txt_categorias"><strong><?php echo $categ_carta['label']; ?></strong></span></p>
							<p class="destaque"><?php print mb_strtoupper($mostrar['titulo']);?></p>
							<span class="menuinterno"><a href="gerar_carta_aceite.php?id_trabalho=<?php echo $mostrar['id'];?>&categoria_carta=<?php echo $categ_carta['categoria_carta'];?>">Baixar Carta</a></span>
							<p>&nbsp;</p>
							<?php 
						} //while
				} //if 
		   } //foreach
			?>
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
