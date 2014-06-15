<?php
	require("conexao.php");
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

</head>

<body>
<div id="tudo">

		<div id="header">
        <img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
        </div>

        <div style="margin-left:30px;">
        	<span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impressão de boleto</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="cartaaceite.php">Carta de aceite</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participação</a>
			<?php
			if($_SESSION['id_participante'] == 63 || $_SESSION['id_participante'] == 1140){ ?>
	            &nbsp;&nbsp;|&nbsp;&nbsp;<a href="avaliacao_trabalhos.php">Avaliar Trabalhos</a>
	        <? }//if ?>
            </span>
		</div>
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
			
			/*************************
			* Comunicação Coordenada *
			**************************/
			if($id_tipo_trabalho == 2){} //if Comunicação Coordenada
			/***********************************
			* Comunicação Individual ou Pôster *
			************************************/
			if($id_tipo_trabalho == "3" || $id_tipo_trabalho == "4"){
				$sql = "SELECT * FROM ev_resumo WHERE id = '".$id_trabalho."'";
				$result = mysql_query($sql, $conexao);
				$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
				/*
				print "<pre>";
					print_r($trabalho);
				print "</pre>";
				/**/
				?>
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
				<div class="avaliar_trabalho">
		          	<p class="txt_categorias">
                    	<b>
						  <?php
                          switch($id_tipo_trabalho){
                              case 3: print "Comunica&ccedil;&atilde;o Individual"; break;
                              case 4: print "P&ocirc;ster"; break;
                          }
                          ?>
                        </b>
                    </p>
                	<div class="titulo"><span>T&iacute;tulo</span><br /><?=$trabalho["titulo"]?></div>
                	<div class="resumo"><span>Resumo</span><br /><?=$trabalho["resumo"]?></div>
                	<div class="palavras_chave"><span>Palavras-chave:</span><?=$trabalho["palavras_chave"]?></div>
                    <form id="form_trabalho" name="form_trabalho" method="post" action="salvar_avaliacao.php">
                    	<input type="hidden" name="id_trabalho" value="<?=$trabalho["id"]?>" />
                    	<input type="hidden" name="id_tipo_trabalho" value="<?=$trabalho["id_tipo_trabalho"]?>" />
                      <div class="questionario">
                          <div class="titulo">Questionário</div>
                          <div class="perguntas">
                              <?php
                              $sql = "SELECT * FROM ev_pergunta WHERE id_tipo_trabalho = '".$trabalho["id_tipo_trabalho"]."' ORDER BY ordem ASC";
                              $result = mysql_query($sql, $conexao);
                              $perguntas = array();
                              while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) array_push($perguntas, $linha);
                              foreach($perguntas as $pergunta){ 
								  $sql = "SELECT ap.resposta FROM ev_pergunta p, ev_avaliacao_perguntas ap, ev_avaliacao av
									WHERE 
										ap.id_pergunta = '".$pergunta["id"]."'
										AND ap.id_avaliacao = av.id
										AND av.id_trabalho = '".$id_trabalho."' 
									ORDER BY p.ordem ASC";
								  $result = mysql_query($sql, $conexao);
								  list($resposta) = mysql_fetch_array($result);
								  ?>
                                  <div class="questao">
                                    <div class="questao_perg"><?=$pergunta["ordem"]?>) <?=$pergunta["pergunta"]?></div>
                                    <div class="questao_resp">
                                        <label><input type="radio" name="resposta_<?=$pergunta["id"]?>" value="sim" <?php print ($resposta == 'sim') ? "checked=\"checked\"" : ""; ?> />Sim</label>
                                        <label><input type="radio" name="resposta_<?=$pergunta["id"]?>" value="nao" <?php print ($resposta == 'nao') ? "checked=\"checked\"" : ""; ?> />N&atilde;o</label>
                                    </div>
                                    <div style="clear:both"></div>
                                  </div>
                              <?php }//foreach ?>
                          </div>
                          <div class="observacao">
                              <div class="titulo">Observa&ccedil;&atilde;o</div>
                              <div class="texto">
                              	<textarea name="observacao"><?php
									  $sql = "SELECT observacao FROM ev_avaliacao WHERE id_trabalho = '".$id_trabalho."' ";
									  $result = mysql_query($sql, $conexao);
									  list($observacao) = mysql_fetch_array($result);
									  print $observacao;
								?></textarea>
                              </div>
                          </div>
                      </div>
                      <input type="submit" name="button" id="button" value="Salvar" class="botao">
                    </form>
				</div>
				<?php
			} //if Comunicação Individual ou PÔster
			?>
          </div>
        </div>
	</div>
  </div>   

  		<div id="lado_direito">
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Área do Participante</h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
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