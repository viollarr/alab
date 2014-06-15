<?php
	require("../conexao.php");
	require("../check_user.php");
	require("../check_lang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script> 
<script type="text/javascript" src="../js/jquery.maskedinput-1.2.2.js"></script>

<style type="text/css">
	.avaliar_trabalho{ font-family:Arial, Helvetica, sans-serif;}
	.avaliar_trabalho .titulo, .avaliar_trabalho .resumo, .avaliar_trabalho .palavras_chave{color:#000; font-weight:normal; font-size:14px; text-align:justify; margin-bottom:10px; line-height:20px;}
	.avaliar_trabalho .titulo span, .avaliar_trabalho .resumo span, .avaliar_trabalho .palavras_chave span{font-weight:bold; margin-right:3px; font-size:14px; color:#0080C2; }
	.avaliar_trabalho .titulo{text-transform:uppercase;}
	.avaliar_trabalho .titulo span{text-transform:none;}
	
	.questionario{border-top:1px dashed #000; margin-bottom:20px;}
	.questionario .titulo{font-weight:bold; margin-right:3px; font-size:14px; color:#0080C2; margin-top:10px;}
	.questionario .observacao .titulo{margin-bottom:5px; text-transform:none;}
	.questionario .observacao .texto textarea{border:1px solid #000; width:100%; height:80px; padding:3px 5px;}
	.questionario .questao{padding-top:3px;}
	.questionario .questao:hover{background-color:#F2FBFF;}
	.questionario .questao .questao_perg,
		.questionario .questao .questao_resp{color:#000; font-weight:normal; font-size:14px; text-align:left; margin-bottom:10px; float:left;}
	.questionario .questao .questao_perg{margin-bottom:3px; margin-right:10px; width:470px;}
	.questionario .questao .questao_resp input{margin-left:5px; margin-right:3px;}
</style>

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
    	<div id="box_trabalhos">
        	<span class="txt_titulo_destaque"><?php techo('Avalia&ccedil;&atilde;o de Trabalhos', 'Paper review'); ?></span>
          <p>&nbsp;</p>
          <div class="trabalho_avaliado_header">
          	<?php
			$id_tipo_trabalho = $_REQUEST["id_tipo_trabalho"];
			$id_trabalho = $_REQUEST["id_trabalho"];

			$tipo_trabalho = "";
			switch($id_tipo_trabalho){
				case 2:
					$tipo_trabalho = "comunicacao_coordenada";
					break;
					
				case 3:
					$tipo_trabalho = "comunicacao_individual";
					break;
			}//switch
			
			/*************************
			* Comunicação Coordenada *
			**************************/
			if($id_tipo_trabalho == 2){ require("form_avaliar_comunicacao_coordenada.php"); }
			 
			/*************************
			* Comunicação Individual *
			**************************/
			elseif($id_tipo_trabalho == "3"){ require("form_avaliar_resumos_individuais.php"); } 
			?>
          </div>
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