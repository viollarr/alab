<?php
$sql = "SELECT * FROM ev_comunicacao_coordenada WHERE id = '".$id_trabalho."'";
$result = mysql_query($sql, $conexao);
$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<div class="avaliar_trabalho">
	<p class="txt_categorias">
		<b>Comunica&ccedil;&atilde;o Coordenada</b>
	</p>
	<div class="titulo"><span>T&iacute;tulo</span><br /><?=$trabalho["titulo_sessao"]?></div>
	<div class="resumo"><span>Resumo</span><br /><?=$trabalho["resumo_sessao"]?></div>
	<div class="palavras_chave"><span>Palavras-chave:</span><?=$trabalho["palavras_chave_sessao"]?></div>
    <style type="text/css">
		#resumos{font-family:Arial, Helvetica, sans-serif; border-top:1px dashed #000; padding-top:15px; margin-top:15px;}
		#resumos .titulo{font-weight:bold; font-size:14px; color:#0080C2; text-transform:uppercase;}
		#resumos .resumo{margin-left:20px; border-bottom:1px dashed #000; padding-top:10px; padding-bottom:10px;}
		#resumos .resumo:last-child{border-bottom:0;}

		#resumos .resumo .titulo, 
		#resumos .resumo .corpo_resumo, 
		#resumos .resumo .palavras_chave{color:#000; font-weight:normal; font-size:14px; text-align:justify; margin-bottom:10px; line-height:20px;}

		#resumos .resumo .titulo span, 
		#resumos .resumo .resumo span, 
		#resumos .resumo .palavras_chave span{font-weight:bold; margin-right:3px; font-size:14px; color:#0080C2; }

		#resumos .resumo .titulo{text-transform:uppercase;}
		#resumos .resumo .titulo span{text-transform:none;}

	</style>
	<div id="resumos">
    	<div class="titulo">Resumos desta sess&atilde;o</div>
        <?php 
		$sql = "SELECT * FROM ev_resumo WHERE id_comunicacao_coordenada = '".$id_trabalho."' AND id_tipo_trabalho = 2 ORDER BY titulo ASC";
		$result = mysql_query($sql, $conexao);
		$resumos = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) { array_push($resumos, $linha); }
		foreach($resumos as $resumo){ ?>
        	<div class="resumo">
                <div class="titulo"><span>T&iacute;tulo</span><br /><?=$resumo["titulo"]?></div>
                <div class="corpo_resumo"><span>Resumo</span><br /><?=$resumo["resumo"]?></div>
                <div class="palavras_chave"><span>Palavras-chave:</span><?=$resumo["palavras_chave"]?></div>
            </div>
         <?php } //foreach ?>
    </div>
	<form id="form_trabalho" name="form_trabalho" method="post" action="salvar_avaliacao.php">
		<input type="hidden" name="id_trabalho" value="<?=$trabalho["id"]?>" />
		<input type="hidden" name="id_tipo_trabalho" value="2" />
	  <div class="questionario">
		  <div class="titulo">Question&aacute;rio</div>
		  <div class="perguntas">
			  <?php
			  $sql = "SELECT * FROM ev_pergunta WHERE id_tipo_trabalho = '2' ORDER BY ordem ASC";
			  $result = mysql_query($sql, $conexao);
			  $perguntas = array();
			  while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) array_push($perguntas, $linha);
			  foreach($perguntas as $pergunta){ 
				  $sql = "SELECT ap.resposta FROM ev_pergunta p, ev_avaliacao_perguntas ap, ev_avaliacao av
					WHERE 
						ap.id_pergunta = '".$pergunta["id"]."'
						AND ap.id_avaliacao = av.id
						AND av.id_trabalho = '".$id_trabalho."' 
						AND av.tipo_trabalho = '".$tipo_trabalho."' 
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
					  $sql = "SELECT observacao FROM ev_avaliacao WHERE id_trabalho = '".$id_trabalho."' AND tipo_trabalho = '".$tipo_trabalho."' ";
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