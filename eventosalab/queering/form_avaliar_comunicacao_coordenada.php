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
<?php

$sql = "SELECT * FROM ev_comunicacao_coordenada WHERE id = '".$id_trabalho."'";
$result = mysql_query($sql, $conexao);
$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);

?>
<div class="avaliar_trabalho">
	<p class="txt_categorias">
		<b><?php techo('Comunica&ccedil;&atilde;o Coordenada', 'Panel'); ?></b>
	</p>
	<div class="titulo"><span><?php techo('T&iacute;tulo', 'Title'); ?></span><br /><?=$trabalho["titulo_sessao"]?></div>
	<div class="resumo"><span><?php techo('Resumo', 'Summary'); ?></span><br /><?=$trabalho["resumo_sessao"]?></div>
	<div class="palavras_chave"><span><?php techo('Palavras-chave', 'Keywords'); ?>:</span><?=$trabalho["palavras_chave_sessao"]?></div>
	<div id="resumos">
    	<div class="titulo"><?php techo('Resumos desta sess&atilde;o', 'Session Summaries'); ?></div>
        <?php 
		// Pegando os resumos desta sessão de comunicação coordenada
		$sql = "SELECT * FROM ev_resumo WHERE id_comunicacao_coordenada = '".$id_trabalho."' AND id_tipo_trabalho = 2 AND id_evento = {$_SESSION['id_evento']} ORDER BY titulo ASC";
		$result = mysql_query($sql, $conexao);
		$resumos = array();
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) { array_push($resumos, $linha); }
		foreach($resumos as $resumo){ ?>
        	<div class="resumo">
                <div class="titulo"><span><?php techo('T&iacute;tulo', 'Title'); ?></span><br /><?=$resumo["titulo"]?></div>
                <div class="corpo_resumo"><span><?php techo('Resumo', 'Summary'); ?></span><br /><?=$resumo["resumo"]?></div>
                <div class="palavras_chave"><span><?php techo('Palavras-chave', 'Keywords'); ?>:</span><?=$resumo["palavras_chave"]?></div>
            </div>
         <?php } //foreach ?>
    </div>
    <?php
	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// O Rodrigo Borba precisou acessar as telas de avaliação - principalmente o formulário que contem as questões - para mostrar a FAPERJ. //
	// Ver email recebido pelo Daniel Costa em "19 de março de 2012 20:20" (sistema de avaliacao) no qual o Rodrigo fala sobre isso.        //
	// Por isso, o código responsável por salvar as avaliações foi comentado, para evitar que as avaliações fossem re-feitas.               //
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	<form id="form_trabalho" name="form_trabalho" method="post" action="salvar_avaliacao.php">
	*/ ?>
	<form id="form_trabalho" name="form_trabalho" method="post" action="#">
		<input type="hidden" name="id_trabalho" value="<?=$trabalho["id"]?>" />
		<input type="hidden" name="id_tipo_trabalho" value="2" />
	  <div class="questionario">
		  <div class="titulo"><?php techo('Question&aacute;rio', 'Questions'); ?></div>
		  <div class="perguntas">
			  <?php
			  // Pegando as perguntas que devem ser respondidas para este tipo de trabalho
			  $sql = "SELECT * FROM ev_pergunta WHERE id_tipo_trabalho = '2' AND id_evento = {$_SESSION['id_evento']} ORDER BY ordem ASC";
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
						AND av.id_avaliador = '".$_SESSION['id_participante']."' 
					ORDER BY p.ordem ASC";
				  $result = mysql_query($sql, $conexao);
				  list($resposta) = mysql_fetch_array($result);
				  ?>
				  <div class="questao">
					<div class="questao_perg">
						<?=$pergunta["ordem"]?>) <?php echo ($_SESSION['lang'] == "en") ? $pergunta["pergunta_en"] : $pergunta["pergunta"]; ?>
                    </div>
					<div class="questao_resp">
						<label><input type="radio" name="resposta_<?=$pergunta["id"]?>" value="sim" <?php print ($resposta == 'sim') ? "checked=\"checked\"" : ""; ?> /><?php echo ($_SESSION['lang'] == "en") ? "Yes" : "Sim" ; ?></label>
						<label><input type="radio" name="resposta_<?=$pergunta["id"]?>" value="nao" <?php print ($resposta == 'nao') ? "checked=\"checked\"" : ""; ?> /><?php echo ($_SESSION['lang'] == "en") ? "No" : "N&atilde;o" ; ?></label>
					</div>
					<div style="clear:both"></div>
				  </div>
			  <?php }//foreach ?>
		  </div>
		  <div class="observacao">
			  <div class="titulo"><?php techo('Observa&ccedil;&atilde;o', 'Observation'); ?></div>
			  <div class="texto">
				<textarea name="observacao"><?php
					  $sql = "SELECT observacao 
					  	FROM ev_avaliacao 
						WHERE 
							id_trabalho = '".$id_trabalho."' 
							AND tipo_trabalho = '".$tipo_trabalho."' 
							AND id_evento = {$_SESSION['id_evento']} 
							AND id_avaliador = '".$_SESSION['id_participante']."' ";
					  $result = mysql_query($sql, $conexao);
					  list($observacao) = mysql_fetch_array($result);
					  print $observacao;
				?></textarea>
			  </div>
		  </div>
	  </div>
      <?php
	  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  // O Rodrigo Borba precisou acessar as telas de avaliação - principalmente o formulário que contem as questões - para mostrar a FAPERJ. //
	  // Ver email recebido pelo Daniel Costa em "19 de março de 2012 20:20" (sistema de avaliacao) no qual o Rodrigo fala sobre isso.        //
	  // Por isso, o código responsável por salvar as avaliações foi comentado, para evitar que as avaliações fossem re-feitas.               //
	  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  /*
	  <input type="submit" name="button" id="button" value="<?php techo('Salvar', 'Save'); ?>" class="botao">
	  */
	  ?>
      <button name="button" id="button" class="botao"><?php techo('Salvar', 'Save'); ?></button>
	</form>
</div>