<?php
	require("../conexao.php");
	require("../check_user.php");
	require("../check_lang.php");
	
	$sql = "SELECT * FROM ev_periodo_avaliacao WHERE id_evento = '".$_SESSION['id_evento']."'";
	$result = mysql_query($sql, $conexao);
	$periodo_avaliacao = mysql_fetch_array($result, MYSQL_ASSOC);

	$data_inicial_periodo = str_replace("-", "", $periodo_avaliacao["data_inicial"]);
	$data_final_periodo   = str_replace("-", "", $periodo_avaliacao["data_final"]);
	$hoje = date("Ymd");
	$exibir_btn_avaliar = ( ($hoje >= $data_inicial_periodo) && ($hoje <= $data_final_periodo) ) ? true : false;
	
	//exit("avaliacao_trabalhos.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

<style type="text/css">
	.trabalho_avaliado_header{border:1px solid #AADBFF; background-color:#F2FBFF;}
	.trabalho_avaliado_header .titulo, .trabalho_avaliado_header .nota, .trabalho_avaliado_header .avaliar{margin:2px; float:left; color:#000; font-weight: bold; font-family:Arial, Helvetica, sans-serif; font-size:12px; padding:2px 4px;}
	.trabalho_avaliado_header .titulo{width:410px; border-right:1px solid #AADBFF;}
	.trabalho_avaliado_header .nota, .trabalho_avaliado_header .avaliar{width:70px; text-align:center;}

	.trabalho_avaliado{border:1px solid #AADBFF;}
	.trabalho_avaliado:hover{border:1px solid #AADBFF; background-color:#F2FBFF;}
	.trabalho_avaliado .titulo, .trabalho_avaliado .nota, .trabalho_avaliado .avaliar{margin:4px 2px; float:left; color:#000; font-weight: normal; font-family:Arial, Helvetica, sans-serif; font-size:12px; padding:2px 4px;}
	.trabalho_avaliado .titulo{width:410px; text-transform:uppercase; border-right:1px solid #AADBFF;}
	.trabalho_avaliado .nota, .trabalho_avaliado .avaliar{width:70px; text-align:center;}
	
	.mensagens{background:#F4F1F3; border:1px solid #06C; font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:5px;}
</style>
</head>

<body>
<div id="tudo">

		<div id="header">
			<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />
        </div>
		<div id="menu_idiomas"><a href="avaliacao_trabalhos.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="avaliacao_trabalhos.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<?php require("menu_participante.php"); ?>
        <p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
    	<div id="box_trabalhos">
        	<span class="txt_titulo_destaque"><?php techo('Avalia&ccedil;&atilde;o de Trabalhos', 'Paper review'); ?></span>
            <?php

			// Mensagens do controle de avaliação
			if(!empty($GLOBALS["msg_avaliacao_salva"])){ ?>
	            <p>&nbsp;</p>
				<div class="mensagens"><?=$GLOBALS["msg_avaliacao_salva"]?></div>
			<?php }//if 


			// Mensagem quando estiver fora do período de avaliação
			$msg_periodo = "";
			if($_GET['lang'] == 'en'){
				$data_inicial_periodo_format = substr($data_inicial_periodo, 4, 2) . "/" . substr($data_inicial_periodo, 6, 2) . "/" . substr($data_inicial_periodo, 0, 4);
				$data_final_periodo_format   = substr($data_final_periodo, 4, 2) . "/" . substr($data_final_periodo, 6, 2) . "/" . substr($data_final_periodo, 0, 4);
			}else{
				$data_inicial_periodo_format = substr($data_inicial_periodo, 6, 2) . "/" . substr($data_inicial_periodo, 4, 2) . "/" . substr($data_inicial_periodo, 0, 4);
				$data_final_periodo_format   = substr($data_final_periodo, 6, 2) . "/" . substr($data_final_periodo, 4, 2) . "/" . substr($data_final_periodo, 0, 4);
			}

			if($hoje < $data_inicial_periodo) $msg_periodo = stecho("O Per&iacute;odo de Avalia&ccedil;&atilde;o de Trabalhos se iniciar&aacute; em", "The evaluation period will begin on")." <b>".$data_inicial_periodo_format."</b>.";
			if($hoje > $data_final_periodo)  $msg_periodo = stecho("O Per&iacute;odo de Avalia&ccedil;&atilde;o de Trabalhos se encerrou no dia", "The review period ended on")." <b>".$data_final_periodo_format."</b>.";
			if( empty($data_inicial_periodo) && empty($data_final_periodo) )  $msg_periodo = stecho("O Per&iacute;odo de Avalia&ccedil;&atilde;o ainda n&atilde;o foi iniciado.", "The review period has not started yet.");

			if(!empty($msg_periodo)){ ?>
				<p>&nbsp;</p>
				<div class="mensagens"><?php echo $msg_periodo; ?></div>
			<?php }//if 


			/////////////////////////////////////////////
			// Pegar os trabalhos que serão avaliados. //
			/////////////////////////////////////////////
			
			$comunicacoes_coordenadas = $comunicacoes_individuais = array();
			
			// Carregando as Comunicações Coordenadas para este avaliador
			$sql = "SELECT * FROM ev_avaliacao av, ev_comunicacao_coordenada cc
					WHERE 
						av.id_evento = '".$_SESSION['id_evento']."' 
						AND av.id_avaliador = '".$_SESSION['id_participante']."' 
						AND av.id_trabalho = cc.id
						AND av.tipo_trabalho = 'comunicacao_coordenada' ";
			$result = mysql_query($sql, $conexao) or die(mysql_error());
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {array_push($comunicacoes_coordenadas, $linha);}
			
			// Carregando as Comunicações Individuais para este avaliador
			$sql = "SELECT * FROM ev_avaliacao av, ev_resumo r
					WHERE 
						av.id_evento = '".$_SESSION['id_evento']."' 
						AND av.id_avaliador = '".$_SESSION['id_participante']."' 
						AND av.id_trabalho = r.id
						AND r.id_tipo_trabalho = 3
						AND av.tipo_trabalho = 'comunicacao_individual' ";
			$result = mysql_query($sql, $conexao) or die(mysql_error());
			while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {array_push($comunicacoes_individuais, $linha);}

			?>
            <p>&nbsp;</p>
            <?php 
			
			///////////////////////////
			// Exibindo os trabalhos //
			///////////////////////////

			/***************************
			* Comunicações Coordenadas *
			****************************/
			?>
            <p class="txt_categorias"><b><?php techo('Comunica&ccedil;&otilde;es Coordenadas', 'Panels'); ?> (<?=count($comunicacoes_coordenadas)?>)</b></p>
            <div class="trabalho_avaliado_header">
              <div class="titulo"><?php techo('Título', 'Title'); ?></div>
              <div class="nota"><?php techo('Nota', 'Rate'); ?>
              	<?php
				// Pegar a quantidade de perguntas para este tipo de trabalho
				$sql = "SELECT id FROM ev_pergunta WHERE id_tipo_trabalho = 2 AND id_evento = {$_SESSION['id_evento']}";
				$result = mysql_query($sql, $conexao);
				?>
				(0 <?php techo('a', 'to'); ?> <?php print mysql_num_rows($result); ?>)
              </div>
              <div class="avaliar"><?php techo('Avaliar', 'Review'); ?></div>
              <div style="clear:both"></div>
            </div>
            <?php
			foreach($comunicacoes_coordenadas as $trabalho){
				?>
				<div class="trabalho_avaliado">
				  <div class="titulo"><?=$trabalho["titulo_sessao"]?></div>
				  <div class="nota">
                  	<?php
					// Código para exibir a nota deste trabalho.
					// Calcula a quantidade de respostas "sim" e exibe o mesmo número de estrelas.
					$avaliacoes = array();
					$sql = "SELECT * 
							FROM ev_avaliacao av, ev_avaliacao_perguntas ap
							WHERE 
								av.id_trabalho = '".$trabalho["id"]."' 
								AND ap.id_avaliacao = av.id
								AND av.tipo_trabalho = 'comunicacao_coordenada'
								AND av.id_avaliador = '".$_SESSION['id_participante']."' 
							";
					$result = mysql_query($sql, $conexao);
					while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) { array_push($avaliacoes, $linha); }
					$estrelas = array();
					foreach($avaliacoes as $avaliacao){
					  if($avaliacao["resposta"] == 'sim' ) 
					  	$estrelas[] = "<img src='http://www.alab.org.br/eventosalab/images/estrela_mini.png' width='15' />";
					} //foreach
					if(count($avaliacoes) == 0) techo("Ainda n&atilde;o avaliado.", "Not yet rated");
					elseif(empty($estrelas)) echo "0";
					else foreach($estrelas as $estrela) print $estrela;
					?>
                  </div>
				  <div class="avaliar">
                  	<?php 
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// Este primeiro IF não constava no funcionamento original. Foi colocado pois o Rodrigo Borba precisava ver as telas para entrar em contato com a FAPERJ. //
					// Ver email recebido pelo Daniel Costa em "19 de março de 2012 20:20" (sistema de avaliacao) no qual o Rodrigo fala sobre isso.                          //
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($_SESSION['id_participante'] == '1784'){ ?>
	                  	<a href="avaliar_trabalho.php?id_tipo_trabalho=2&id_trabalho=<?=$trabalho["id"]?>">
                        	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                        </a>
					<?php }elseif($exibir_btn_avaliar){ ?>
	                  	<a href="avaliar_trabalho.php?id_tipo_trabalho=2&id_trabalho=<?=$trabalho["id"]?>">
                        	<img src="http://www.alab.org.br/eventosalab/images/edit_f2.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                        </a>
                    <?php }else{ ?>
                       	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                    <?php }//else ?>
                  </div>
				  <div style="clear:both"></div>
				</div>
	        	<?php
			} //foreach Comunicações Coordenadas
			?>
            <br />
            <?php 
			/***************************
			* Comunicações Individuais *
			****************************/
			?>
            <p class="txt_categorias"><b><?php techo('Comunica&ccedil;&otilde;es Individuais', 'Individual Paper'); ?> (<?=count($comunicacoes_individuais)?>)</b></p>
            <div class="trabalho_avaliado_header">
              <div class="titulo"><?php techo('Título', 'Title'); ?></div>
              <div class="nota"><?php techo('Nota', 'Rate'); ?>
              	<?php
				// Pegar a quantidade de perguntas para este tipo de trabalho
				$sql = "SELECT id FROM ev_pergunta WHERE id_tipo_trabalho = 3  AND id_evento = {$_SESSION['id_evento']}";
				$result = mysql_query($sql, $conexao);
				?>
				(0 <?php techo('a', 'to'); ?> <?php print mysql_num_rows($result); ?>)
              </div>
              <div class="avaliar"><?php techo('Avaliar', 'Review'); ?></div>
              <div style="clear:both"></div>
            </div>
            <?php
			foreach($comunicacoes_individuais as $trabalho){
				?>
				<div class="trabalho_avaliado">
				  <div class="titulo"><?=$trabalho["titulo"]?></div>
				  <div class="nota">
                  	<?php
					// Código para exibir a nota deste trabalho.
					// Calcula a quantidade de respostas "sim" e exibe o mesmo número de estrelas.
					$avaliacoes = array();
					$sql = "SELECT * 
						FROM ev_avaliacao av, ev_avaliacao_perguntas ap
						WHERE 
							av.id_trabalho = '".$trabalho["id"]."' 
							AND ap.id_avaliacao = av.id
							AND av.tipo_trabalho = 'comunicacao_individual'
							AND av.id_avaliador = '".$_SESSION['id_participante']."' 
						";
					$result = mysql_query($sql, $conexao);
					while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) { array_push($avaliacoes, $linha); }
					$estrelas = array();
					foreach($avaliacoes as $avaliacao){
					  if($avaliacao["resposta"] == 'sim' ) 
					  	$estrelas[] = "<img src='http://www.alab.org.br/eventosalab/images/estrela_mini.png' width='15' />";
					} //foreach
					if(count($avaliacoes) == 0) techo("Ainda n&atilde;o avaliado.", "Not yet rated");
					elseif(empty($estrelas)) echo "0";
					else foreach($estrelas as $estrela) print $estrela;
					?>
                  </div>
				  <div class="avaliar">
                  	<?php 
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// Este primeiro IF não constava no funcionamento original. Foi colocado pois o Rodrigo Borba precisava ver as telas para entrar em contato com a FAPERJ. //
					// Ver email recebido pelo Daniel Costa em "19 de março de 2012 20:20" (sistema de avaliacao) no qual o Rodrigo fala sobre isso.                          //
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($_SESSION['id_participante'] == '1784'){ ?>
	                  	<a href="avaliar_trabalho.php?id_tipo_trabalho=<?=$trabalho["id_tipo_trabalho"]?>&id_trabalho=<?=$trabalho["id"]?>">
                        	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                        </a>
					<?php }elseif($exibir_btn_avaliar){ ?>
	                  	<a href="avaliar_trabalho.php?id_tipo_trabalho=<?=$trabalho["id_tipo_trabalho"]?>&id_trabalho=<?=$trabalho["id"]?>">
                        	<img src="http://www.alab.org.br/eventosalab/images/edit_f2.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                        </a>
                    <?php }else{ ?>
                       	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" alt="<?php techo('Avaliar este trabalho', 'Review this paper'); ?>" width="25" />
                    <?php }//else ?>
                  </div>
				  <div style="clear:both"></div>
				</div>
	        	<?php
			} //foreach Comunicações Individuais
			?>
           <br />
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