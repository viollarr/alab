<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
	
	//$id_participante=$_SESSION['id_participante'];
	//$id_evento=$_SESSION['id_evento'];	
	
	$sql_participante = "SELECT ev.id, us.name, ev.modalidade_participacao FROM ev_participante ev, jos_users us
				    WHERE ev.id='".$_SESSION['id_participante']."' AND ev.id_evento='".$_SESSION['id_evento']."' AND ev.id_associado_alab = us.id";
	$participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$mostrar= mysql_fetch_array($participante);
	
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
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Certificado de Participa&ccedil;&atilde;o</span>
		 <p>&nbsp;</p>
         <?php 
		 /*
		 if($_SESSION['id_participante'] != 63){ // Rogério Casanovas Tilio ?> 
         	<p class="menuinterno">Seu certificado ainda não está disponível</p> 
         <?php } ?> 
         <?php
		 	if($_SESSION['id_participante'] == 63 || $_SESSION['id_participante'] == 1140){ Rogério Casanovas Tilio e DANIEL COSTA (IMAGINATTO) */
				$sql = "SELECT * FROM ev_presenca WHERE id_participante = '".$_SESSION['id_participante']."' AND id_evento = '".$_SESSION['id_evento']."' ORDER BY tipo ";
				$result = mysql_query($sql, $conexao);// or die(mysql_error());
				$presencas = array();
				while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
					$presencas[] = $linha;
				}//while
				
				/*
				print "Presenças: <pre>";
					print_r($presencas);
				print "</pre>";
				/**/
				
				/*
				TIPOS DE PRESENÇA
				ouvinte
				comissao
				coordenacao_simposio
				trabalho_em_simposio
				coordenacao_sessao
				comunicacao_individual
				comunicacao_coordenada
				poster
				*/
				foreach($presencas as $presenca){
					// OUVINTE
					if($presenca['tipo'] == 'ouvinte'){ ?>
						<p class="destaque"><span class="txt_categorias"><strong>Ouvinte</strong></span></p>
						<span class="menuinterno"><a href="gerar_certificado_presenca.php?certificado=ouvinte">Baixar Certificado</a></span>
						<p>&nbsp;</p>
					<?php }//if

					// COMISSÃO ACADÊMICO-CIENTÍFICA
					elseif($presenca['tipo'] == 'comissao'){ ?>
						<p class="destaque"><span class="txt_categorias"><strong>Comissão Acadêmico-Científica</strong></span></p>
						<span class="menuinterno"><a href="gerar_certificado_presenca.php?certificado=comissao">Baixar Certificado</a></span>
						<p>&nbsp;</p>
					<?php }//if

					else{
						switch($presenca['tipo']){
							case 'poster': 
								$sql = "SELECT id, titulo FROM ev_resumo 
									WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_tipo_trabalho = 4";
								$titulo_categoria = 'Apresentação de Pôster';
								break;
								
							case 'paper': 
								$sql = "SELECT id, titulo FROM ev_resumo 
									WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_tipo_trabalho = 5";
								$titulo_categoria = 'Apresentação de Paper';
								break;
								
								
						}//switch
						
						?>
						<p class="destaque"><span class="txt_categorias"><strong><?php echo $titulo_categoria; ?></strong></span></p>
						<?php 
						$result = mysql_query($sql, $conexao);// or die(mysql_error());
						$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
						?>
						<p class="destaque"><?php print mb_strtoupper($trabalho['titulo']);?></p>
						<span class="menuinterno"><a href="gerar_certificado_presenca.php?id_trabalho=<?php echo $presenca['id_trabalho'];?>&certificado=<?php echo $presenca['tipo'];?>">Baixar Certificado</a></span>
						<p>&nbsp;</p>
						<?php
					}//else

				}//foreach
				
			// }//if
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
