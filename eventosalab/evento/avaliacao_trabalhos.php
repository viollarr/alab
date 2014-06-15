<?php
	require("sessoes.php");
	require("check_user.php");
	
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
<link rel="stylesheet" href="css/template.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

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
	/*.trabalho_avaliado .nota{border-right:1px solid #000;}*/
	
	.mensagens{background:#F4F1F3; border:1px solid #06C; font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:5px;}
</style>
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
    	<div id="box_trabalhos">
        	<span class="txt_titulo_destaque">Avalia&ccedil;&atilde;o de Trabalhos</span>
            <?php
				$posteres = $papers = array();
				// Carregando as Pôsteres para este avaliador
				$sql = "SELECT * FROM ev_avaliacao av, ev_resumo r
						WHERE 
							av.id_evento = '".$_SESSION['id_evento']."' 
							AND av.id_avaliador = '".$_SESSION['id_participante']."' 
							AND av.id_trabalho = r.id
							AND r.id_tipo_trabalho = 4
							AND av.tipo_trabalho = 'poster' ";
							
				$result = mysql_query($sql, $conexao) or die(mysql_error());
				while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
					array_push($posteres, $linha);
				}
				
				// Carregando os Papers para este avaliador
				$sql = "SELECT * FROM ev_avaliacao av, ev_resumo r
						WHERE 
							av.id_evento = '".$_SESSION['id_evento']."' 
							AND av.id_avaliador = '".$_SESSION['id_participante']."' 
							AND av.id_trabalho = r.id
							AND r.id_tipo_trabalho = 5
							AND av.tipo_trabalho = 'paper' ";
				$result = mysql_query($sql, $conexao) or die(mysql_error());
				while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
					array_push($papers, $linha);
				}
				
			?>
            <?php
			// Mensagens do controle de avaliação
			if(!empty($GLOBALS["msg_avaliacao_salva"])){ ?>
	            <p>&nbsp;</p>
				<div class="mensagens"><?=$GLOBALS["msg_avaliacao_salva"]?></div>
			<?php }//if 
			// Mensagem quando houver fora do período de avaliação
			$msg_periodo = "";
			$data_inicial_periodo_format = 
				substr($data_inicial_periodo, 6, 2) . "/" . substr($data_inicial_periodo, 4, 2) . "/" . substr($data_inicial_periodo, 0, 4);
			$data_final_periodo_format = 
				substr($data_final_periodo, 6, 2) . "/" . substr($data_final_periodo, 4, 2) . "/" . substr($data_final_periodo, 0, 4);
			if($hoje < $data_inicial_periodo) $msg_periodo = "O Per&iacute;odo de Avalia&ccedil;&atilde;o de Trabalhos se iniciar&aacute; em <b>".$data_inicial_periodo_format."</b>.";
			if($hoje > $data_final_periodo)  $msg_periodo = "O Per&iacute;odo de Avalia&ccedil;&atilde;o de Trabalhos se encerrou no dia <b>".$data_final_periodo_format."</b>.";
			if( empty($data_inicial_periodo) && empty($data_final_periodo) )  $msg_periodo = "O Per&iacute;odo de Avalia&ccedil;&atilde;o ainda n&atilde;o foi iniciado.";

			if(!empty($msg_periodo)){ ?>
				<p>&nbsp;</p>
				<div class="mensagens"><?php echo $msg_periodo; ?></div>
			<?php }//if 
			?>
            <p>&nbsp;</p>
            <?php 
			/***********
			* Pôsteres *
			************/
			?>
            <p class="txt_categorias"><b>P&ocirc;steres (<?=count($posteres)?>)</b></p>
            <div class="trabalho_avaliado_header">
              <div class="titulo">Título</div>
              <div class="nota">Nota
              	<?php
				$sql = "SELECT id FROM ev_pergunta WHERE id_tipo_trabalho = 4 AND id_evento = '".$_SESSION['id_evento']."'";
				$result = mysql_query($sql, $conexao);
				$num_perguntas = mysql_num_rows($result); ?>
				(0 a <?php print $num_perguntas; ?>)
              </div>
              <div class="avaliar">Avaliar</div>
              <div style="clear:both"></div>
            </div>
            <?php
			foreach($posteres as $k => $trabalho){
				?>
				<div class="trabalho_avaliado">
				  <div class="titulo"><?=$trabalho["titulo"]?></div>
				  <div class="nota">
                  	<?php
					$avaliacoes = array();
					$sql = "SELECT * 
						FROM ev_avaliacao av, ev_avaliacao_perguntas ap
						WHERE 
							av.id_trabalho = '".$trabalho["id"]."' 
							AND ap.id_avaliacao = av.id
							AND av.tipo_trabalho = 'poster'
						";
					
					$result = mysql_query($sql, $conexao);
					while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
						array_push($avaliacoes, $linha);
					} //while
					$estrelas = array();
					foreach($avaliacoes as $avaliacao){
					  /*
					  print "<pre>";
						  print_r($avaliacao);
					  print "</pre>";
					  /**/
					  if($avaliacao["resposta"] == 'sim' ) 
					  	$estrelas[] = "<img src='http://www.alab.org.br/eventosalab/images/estrela_mini.png' width='15' />";
					} //foreach
					if(count($avaliacoes) == 0) print "Ainda n&atilde;o avaliado.";
					else foreach($estrelas as $estrela) print $estrela;
					?>
                  </div>
				  <div class="avaliar">
                  	<?php if($exibir_btn_avaliar){ ?>
                      <a href="avaliar_trabalho.php?id_tipo_trabalho=<?=$trabalho["id_tipo_trabalho"]?>&id_trabalho=<?=$trabalho["id"]?>">
                          <img src="http://www.alab.org.br/eventosalab/images/edit_f2.png" title="Avaliar este trabalho" alt="Avaliar este trabalho" width="25" />
                      </a>
                    <?php }else{ ?>
                       	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="Avaliar este trabalho" alt="Avaliar este trabalho" width="25" />
                    <?php }//else ?>
                  </div>
				  <div style="clear:both"></div>
				</div>
	        	<?php
			} //foreach Posteres
			?>
           <br />
            <?php 
			/***********
			* Papers *
			************/
			?>
            <p class="txt_categorias"><b>Papers (<?=count($papers)?>)</b></p>
            <div class="trabalho_avaliado_header">
              <div class="titulo">Título</div>
              <div class="nota">Nota
              	<?php
				$sql = "SELECT id FROM ev_pergunta WHERE id_tipo_trabalho = 5 AND id_evento = '".$_SESSION['id_evento']."'";
				$result = mysql_query($sql, $conexao);
				$num_perguntas = mysql_num_rows($result); ?>
				(0 a <?php print $num_perguntas; ?>)
              </div>
              <div class="avaliar">Avaliar</div>
              <div style="clear:both"></div>
            </div>
            <?php
			foreach($papers as $y => $trabalho){
				?>
				<div class="trabalho_avaliado">
				  <div class="titulo"><?=$trabalho["titulo"]?></div>
				  <div class="nota">
                  	<?php
					$avaliacoes = array();
					$sql = "SELECT * 
						FROM ev_avaliacao av, ev_avaliacao_perguntas ap
						WHERE 
							av.id_trabalho = '".$trabalho["id"]."' 
							AND ap.id_avaliacao = av.id
							AND av.tipo_trabalho = 'paper'
						";
					$result = mysql_query($sql, $conexao);
					while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
						array_push($avaliacoes, $linha);
					} //while
					$estrelas = array();
					foreach($avaliacoes as $avaliacao){
					  if($avaliacao["resposta"] == 'sim' ) 
					  	$estrelas[] = "<img src='http://www.alab.org.br/eventosalab/images/estrela_mini.png' width='15' />";
					} //foreach
					if(count($avaliacoes) == 0) print "Ainda n&atilde;o avaliado.";
					else foreach($estrelas as $estrela) print $estrela;
					?>
                  </div>
				  <div class="avaliar">
                  	<?php if($exibir_btn_avaliar){ ?>
                      <a href="avaliar_trabalho.php?id_tipo_trabalho=<?=$trabalho["id_tipo_trabalho"]?>&id_trabalho=<?=$trabalho["id"]?>">
                          <img src="http://www.alab.org.br/eventosalab/images/edit_f2.png" title="Avaliar este trabalho" alt="Avaliar este trabalho" width="25" />
                      </a>
                    <?php }else{ ?>
                       	<img src="http://www.alab.org.br/eventosalab/images/edit_f2_pb.png" title="Avaliar este trabalho" alt="Avaliar este trabalho" width="25" />
                    <?php }//else ?>
                  </div>
				  <div style="clear:both"></div>
				</div>
	        	<?php
			} //foreach Posteres
			?>
           <br />
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