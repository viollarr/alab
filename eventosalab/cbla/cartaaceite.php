<?php
	require_once("../conexao.php");
	require_once("../check_user.php");

	//print_r($_SESSION);
	
	$id_participante = $_SESSION['id_participante'];
	$id_evento       = $_SESSION['id_evento'];

	// VERIFICAR SE É COORDENADOR DE SIMPÓSIO
	$sql_simposio = "SELECT s.id, s.titulo_sessao AS titulo
					 FROM  ev_simposio s, ev_simposio_coordenador sc
					 WHERE 
						 s.id_evento = '".$id_evento."' 
						 AND sc.id_participante = '".$id_participante."' 
						 AND s.id = sc.id_simposio
					 ORDER BY s.titulo_sessao ASC";
	$simposio = mysql_query($sql_simposio, $conexao) or die(mysql_error());
	$existe_simposio = mysql_num_rows($simposio);
	
	// VERIFICAR SE É APRESENTADOR (AUTOR) DE TRABALHO EM SIMPÓSIO
	$sql_resumo_em_simposio = "SELECT r.id, r.titulo
							FROM ev_resumo r
							WHERE  
								r.id_tipo_trabalho = 1
								AND (r.autor='".$id_participante."' OR r.co_autor='".$id_participante."') 
								AND r.id_evento='".$id_evento."'
							ORDER BY r.titulo ASC";
	$resumo_em_simposio = mysql_query($sql_resumo_em_simposio, $conexao) or die(mysql_error());
	$existe_resumo_em_simposio = mysql_num_rows($resumo_em_simposio);
	
	// VERIFICAR SE É DEBATEDOR DE SIMPÓSIO
	$sql_debatedor_simposio = "SELECT s.id, s.titulo_sessao AS titulo
							  FROM ev_simposio s
							  WHERE  
								  (s.id_participante_debatedor='".$id_participante."' OR s.id_participante_debatedor_2='".$id_participante."') 
								  AND s.id_evento='".$id_evento."'
							  ORDER BY s.titulo_sessao ASC";
	$debatedor_simposio = mysql_query($sql_debatedor_simposio, $conexao) or die(mysql_error());
	$existe_debatedor_simposio = mysql_num_rows($debatedor_simposio);
	
	// VERIFICAR SE É COORDENADOR DE COMUNICAÇÃO COORDENADA
	$sql_coordenada = "SELECT cc.id, cc.titulo_sessao AS titulo
					  FROM ev_comunicacao_coordenada cc
					  WHERE 
						 cc.id_evento = '".$id_evento."' 
						 AND cc.id_coordenador = '".$id_participante."'
					  ORDER BY cc.titulo_sessao ASC";
    $coordenada = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
	$existe_coordenada = mysql_num_rows($coordenada);
	
	// VERIFICAR SE É AUTOR DE TRABALHO (RESUMO) EM SESSÃO DE COMUNICAÇÃO COORDENADA
	$sql_resumo_em_coordenada = 
		"SELECT id, titulo
		FROM ev_resumo 
		WHERE 
			id_tipo_trabalho = 2 
			AND id_comunicacao_coordenada <> 0
			AND (autor = '".$id_participante."' OR co_autor = '".$id_participante."') 
			AND id_evento = '".$id_evento."' 
		";
	$resumo_em_coordenada = mysql_query($sql_resumo_em_coordenada, $conexao) or die(mysql_error());
	$existe_resumo_em_coordenada = mysql_num_rows($resumo_em_coordenada);

	// COMUNICAÇÃO INDIVIDUAL
	$sql_individual = 
		"SELECT id, titulo
		FROM ev_resumo r
		WHERE 
			id_tipo_trabalho = '3'
			AND (autor = '".$id_participante."' OR co_autor = '".$id_participante."') 
			AND id_evento = '".$id_evento."' 
		";
	$individual = mysql_query($sql_individual, $conexao) or die(mysql_error());
	$existe_individual = mysql_num_rows($individual);
	
	// PôSTER
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
    <img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
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
			// COORDENADOR DE SIMPÓSIO
			// APRESENTADOR (AUTOR) DE TRABALHO EM SIMPÓSIO
			// DEBATEDOR DE SIMPÓSIO
			// COORDENADOR DE COMUNICAÇÃO COORDENADA
			// AUTOR DE TRABALHO (RESUMO) EM SESSÃO DE COMUNICAÇÃO COORDENADA 
			// COMUNICAÇÃO INDIVIDUAL
			// PôSTER
		
		   $categorias_carta = array(
		   		array("categoria_carta" => "coordenador_simposio", "existe" => $existe_simposio, "trabalhos" => $simposio, "label" => "Coordenador de Simp&oacute;sio"),
		   		array("categoria_carta" => "resumo_em_simposio", "existe" => $existe_resumo_em_simposio, "trabalhos" => $resumo_em_simposio, "label" => "Resumo em Simp&oacute;sio"),
		   		array("categoria_carta" => "debatedor", "existe" => $existe_debatedor_simposio, "trabalhos" => $debatedor_simposio, "label" => "Debatedor de Simp&oacute;sio"),
		   		array("categoria_carta" => "coordenador_coordenada", "existe" => $existe_coordenada, "trabalhos" => $coordenada, "label" => "Comunica&ccedil;&atilde;o Coordenada"),
		   		array("categoria_carta" => "resumo_em_coordenada", "existe" => $existe_resumo_em_coordenada, "trabalhos" => $resumo_em_coordenada, "label" => "Resumo em Comunica&ccedil;&atilde;o Coordenada"),
		   		array("categoria_carta" => "comunicacao_individual", "existe" => $existe_individual, "trabalhos" => $individual, "label" => "Comunica&ccedil;&atilde;o Individual"),
		   		array("categoria_carta" => "poster", "existe" => $existe_poster, "trabalhos" => $poster, "label" => "P&ocirc;ster")
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
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Área do Participante</h2></div>
                    <form action="../controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="../controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
                            <!-- id = id do evento-->
                          </tr>
                        </table>
                      </div>
                    </form>

            </div>            <br />
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
