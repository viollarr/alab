<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");

	//print_r($_SESSION);
	
	/*
	Cartas:
	- aceite comunicação individual
	- aceite sessão coordenada
	- aceite trabalho individual em sessão coordenada
	- recusa comunicação individual
	- recusa sessão coordenada
	*/
	
	$id_participante = $_SESSION['id_participante'];
	$id_evento       = $_SESSION['id_evento'];

	// COMUNICAÇÃO INDIVIDUAL - Autor ou Co-autor
	$sql_individual = "SELECT r.id, UPPER(r.titulo) as titulo
			FROM ev_resumo r
				INNER JOIN ev_participante_resumo pr ON r.id = pr.id_resumo 
			WHERE 
				r.id_tipo_trabalho = '3' AND r.id_evento = {$id_evento}
				AND r.id_comunicacao_coordenada = 0 AND r.id_simposio = 0
				AND pr.tipo_trabalho = 3 
				AND pr.id_participante = {$id_participante}";
	$individual = mysql_query($sql_individual, $conexao) or die(mysql_error());
	$qtd_individual = mysql_num_rows($individual);
	
	// VERIFICAR SE É COORDENADOR DE COMUNICAÇÃO COORDENADA
	$sql_coordenada = "SELECT cc.id, cc.titulo_sessao AS titulo
					  FROM ev_comunicacao_coordenada cc
					  WHERE 
						 cc.id_evento = {$id_evento} 
						 AND cc.id_coordenador = {$id_participante}
					  ORDER BY cc.titulo_sessao ASC";
    $coordenada = mysql_query($sql_coordenada, $conexao);// or die(mysql_error());
	$qtd_coordenada = mysql_num_rows($coordenada);

	// VERIFICAR SE É AUTOR/CO-AUTOR DE TRABALHO (RESUMO) EM SESSÃO DE COMUNICAÇÃO COORDENADA
	$sql_resumo_em_coordenada = 
		"SELECT r.id, UPPER(r.titulo) AS titulo
		FROM ev_resumo r
			INNER JOIN ev_participante_resumo pr ON r.id = pr.id_resumo 
		WHERE 
			r.id_tipo_trabalho = 2 AND r.id_evento = {$id_evento} 
			AND pr.tipo_trabalho = 2 
			AND r.id_comunicacao_coordenada <> 0
			AND pr.id_participante = {$id_participante}
		";
	$resumo_em_coordenada = mysql_query($sql_resumo_em_coordenada, $conexao) or die(mysql_error());
	$qtd_resumo_em_coordenada = mysql_num_rows($resumo_em_coordenada);

	/*
	// VERIFICAR SE É CO-AUTOR DE TRABALHO (RESUMO) EM SESSÃO DE COMUNICAÇÃO COORDENADA
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
	*/

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
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />     
    </div>
    <div id="menu_idiomas"><a href="principal.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="principal.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
    <?php require("menu_participante.php"); ?>
    <p>&nbsp;</p>
    <div class="clear"></div>
          
    <div id="centro">
      <div id="artigo">
         <div id="box_trabalhos"><span class="txt_titulo_destaque"><?php techo('Carta de Aceite/Recusa', 'Letter'); ?></span>
           <p>&nbsp;</p> 
           <?php 
			/*
			Cartas:
			- aceite comunicação individual
			- aceite sessão coordenada
			- aceite trabalho individual em sessão coordenada
			- recusa comunicação individual
			- recusa sessão coordenada
			*/
		
			/*
		   $categorias_carta = array(
		   		array("nome" => "coordenador_simposio", "existe" => $existe_simposio, "trabalhos" => $simposio, "label" => "Coordenador de Simp&oacute;sio"),
		   		array("nome" => "resumo_em_simposio", "existe" => $existe_resumo_em_simposio, "trabalhos" => $resumo_em_simposio, "label" => "Resumo em Simp&oacute;sio"),
		   		array("nome" => "debatedor", "existe" => $existe_debatedor_simposio, "trabalhos" => $debatedor_simposio, "label" => "Debatedor de Simp&oacute;sio"),
		   		array("nome" => "coordenador", "existe" => $existe_coordenada, "trabalhos" => $coordenada, "label" => "Comunica&ccedil;&atilde;o Coordenada"),
		   		array("nome" => "resumo_em_coordenada", "existe" => $existe_resumo_em_coordenada, "trabalhos" => $resumo_em_coordenada, "label" => "Resumo em Comunica&ccedil;&atilde;o Coordenada"),
		   		array("nome" => "comunicacao_individual", "existe" => $qtd_individual, "trabalhos" => $individual, "label" => "Comunica&ccedil;&atilde;o Individual"),
		   		array("nome" => "poster", "existe" => $existe_poster, "trabalhos" => $poster, "label" => "P&ocirc;ster")
		   );
		   */
		   
		   // Configurando os labels de acordo com o idioma
		   $label_individual = stecho('Comunica&ccedil;&atilde;o Individual', 'Individual Paper');
		   $label_coordenada = stecho('Comunica&ccedil;&atilde;o Coordenada', 'Panel');
		   $label_resumo_em_coordenada = stecho('Resumo em Comunica&ccedil;&atilde;o Coordenada', 'Abstract in a Panel Session');
		   
		   $categorias_carta = array(
		   		array("nome" => "comunicacao_individual", "qtd_trabalhos" => $qtd_individual, "trabalhos" => $individual, "label" => $label_individual), 
		   		array("nome" => "coordenador", "qtd_trabalhos" => $qtd_coordenada, "trabalhos" => $coordenada, "label" => $label_coordenada), 
		   		array("nome" => "resumo_em_coordenada", "qtd_trabalhos" => $qtd_resumo_em_coordenada, "trabalhos" => $resumo_em_coordenada, "label" => $label_resumo_em_coordenada)
		   );
		   foreach($categorias_carta as $categoria){
			   /*
			   print "categoria: <pre>";
			   		print_r($categoria);
			   print "</pre>";
			   /**/
			   if ($categoria['qtd_trabalhos'] > 0){
					while($mostrar = mysql_fetch_array($categoria['trabalhos'])){ ?>
						<p class="destaque"><span class="txt_categorias"><strong><?php echo $categoria['label']; ?></strong></span></p>
						<p class="destaque"><?php print $mostrar['titulo'];?></p>
						<span class="menuinterno"><a href="gerar_carta_aceite.php?id_trabalho=<?php echo $mostrar['id'];?>&categoria_carta=<?php echo $categoria['nome'];?>">Baixar Carta</a></span>
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
