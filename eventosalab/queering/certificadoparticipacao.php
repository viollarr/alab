<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");
	
	//$id_participante=$_SESSION['id_participante'];
	//$id_evento=$_SESSION['id_evento'];
	
	
	$sql_participante = "SELECT id,nome,modalidade_participacao FROM ev_participante
				    WHERE id='".$_SESSION['id_participante']."' AND id_evento='".$_SESSION['id_evento']."'";
	$participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$mostrar= mysql_fetch_array($participante);
	
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
        <div id="menu_idiomas"><a href="certificadoparticipacao.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="certificadoparticipacao.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro"> 
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque"><?php techo('Certificado de Participa&ccedil;&atilde;o', 'Certificate of participation'); ?></span>
		 <p>&nbsp;</p>
         <?php 
		 
			$sql = "SELECT * FROM ev_presenca WHERE id_participante = '".$_SESSION['id_participante']."' AND id_evento = '".$_SESSION['id_evento']."' AND presente = 'sim' ORDER BY tipo ";
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
					<p class="destaque"><span class="txt_categorias"><strong><?php techo('Ouvinte', 'Attendance'); ?></strong></span></p>
					<span class="menuinterno"><a href="gerar_certificado_presenca.php?certificado=ouvinte"><?php techo('Baixar Certificado', 'Download Certificate'); ?></a></span>
					<p>&nbsp;</p>
				<?php }//if

				else{
					switch($presenca['tipo']){
						case 'coordenacao_sessao': 
							$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' ";
							$titulo_categoria = 'Coordenação de Sessão';
							$titulo_categoria_en = 'Coordination Session';
							break;
							
						case 'comunicacao_individual': 
							$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_tipo_trabalho = 3";
							$titulo_categoria = 'Apresentação de Comunicação Individual';
							$titulo_categoria_en = 'Presentation Individual Paper';
							break;
							
						case 'comunicacao_coordenada': 
							$sql = "SELECT id, titulo FROM ev_resumo 
								WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_comunicacao_coordenada > 0 AND id_tipo_trabalho = 2";
							$titulo_categoria = 'Apresentação de Comunicação Coordenada';
							$titulo_categoria_en = 'Presentation of Panel';
							break;								
							
					}//switch
					
					?>
					<p class="destaque"><span class="txt_categorias"><strong><?php echo techo($titulo_categoria, $titulo_categoria_en); ?></strong></span></p>
					<?php 
					$result = mysql_query($sql, $conexao);// or die(mysql_error());
					$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
					?>
					<p class="destaque" style="text-transform: uppercase;"><?php print $trabalho['titulo']; ?></p>
					<span class="menuinterno"><a href="gerar_certificado_presenca.php?id_trabalho=<?php echo $presenca['id_trabalho'];?>&certificado=<?php echo $presenca['tipo'];?>"><?php techo('Baixar Certificado', 'Download Certificate'); ?></a></span>
					<p>&nbsp;</p>
					<?php
				}//else

			}//foreach
			
			// Se não tiver nenhuma presença...
			if(empty($presencas)){
				echo "<p class=\"destaque\">";
				techo('Nenhum certificado encontrado no sistema.', 'No certificate found in the system.');
				echo "</p>";
			}
		 ?>
	  </div>
    </div>
       
  </div>   

  		<div id="lado_direito">
            
                <div id="links_rapidos">
                    <div class="titulo_boxes"><h2><?php techo('&Aacute;rea do Participante', 'Participant Area'); ?></h2></div>
                    <form action="controle.php" method="post">
                        <div align="center" style="margin-top:15px;">
                            <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                                <tr>
                                    <td class="txt_topico_tabela"><?php techo('Ol&aacute;', 'Hello'); ?>, <?php print $_SESSION["nome_participante"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" ><?php techo('sair', 'logout'); ?></a></td>
                                    <!-- id = id do envento-->
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
