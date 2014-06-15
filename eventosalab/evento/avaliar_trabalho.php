<?php
	require("sessoes.php");
	require("check_user.php");
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
        <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
    	<div id="box_trabalhos">
        	<span class="txt_titulo_destaque">Avalia&ccedil;&atilde;o de Trabalho</span>
          <p>&nbsp;</p>
          <div class="trabalho_avaliado_header">
          	<?php
			$id_tipo_trabalho = $_REQUEST["id_tipo_trabalho"];
			$id_trabalho = $_REQUEST["id_trabalho"];

			$tipo_trabalho = "";
			switch($id_tipo_trabalho){
				case 4:
					$tipo_trabalho = "poster";
					break;
					
				case 5:
					$tipo_trabalho = "paper";
					break;
			}//switch
			
			/***********************************
			* Pôster ou Paper *
			************************************/
			require("form_avaliar_resumos_individuais.php");
			?>
          </div>
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