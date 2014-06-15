<?php
/*
print "Linhas tematicas: <pre>";
	print_r($GLOBALS["linhas_tematicas"]);
print "</pre>";
exit("view avaliacoes_trabalhos_queering");
/**/

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
?>

<!-- jQuery -->
<script src="telas/js/jquery-1.4.4.min.js"></script>

<!-- Accordion -->
<link href="telas/css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css"/>
<script src="telas/js/ui/jquery-ui-1.8.9.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#accordion").accordion({ autoHeight: false });
	});
</script>

<!-- Modal (lightbox) -->
<script type="text/javascript" src="telas/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="telas/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$(".exibir_observacao").fancybox();
	});
</script>

<!-- CSS da view -->
<style type="text/css">
	.trabalhos{width:100%; border-top:1px solid #CCCCCC;}
	.trabalhos td{border:1px solid #CCCCCC; padding:8px 8px;}
	
	/* Header */
	.trabalhos .header td{font-size:12px; font-weight:bold; color:#333333; background-color:#F4F4F4; border-top:0;}
	.trabalhos .header .titulo{border-right:none; width:560px;}
	.trabalhos .header .nota{text-align:center; border-right:none; width:70px;}
	.trabalhos .header .aceitar{text-align:center; border-right:none; width:50px;}
	.trabalhos .header .observacao{text-align:center; width:70px;}
	
	/* Linhas */
	.trabalhos .linha:hover{background-color:#F4F4F4;}
	.trabalhos .linha td{font-size:12px; font-weight:normal; color:#333333; border-top:none;}
	.trabalhos .linha .titulo{border-right:none;}
	.trabalhos .linha .nota{text-align:center; border-right:none; vertical-align:middle;}
	.trabalhos .linha .aceitar{text-align:center; border-right:none; vertical-align:middle;}
		.trabalhos .linha .aceitar label:hover{cursor:pointer;}
	.trabalhos .linha .observacao{text-align:center; vertical-align:middle;}
		.trabalhos .linha .observacao a{text-decoration:underline;}
		.trabalhos .linha .observacao a:hover{font-weight:bold;}
</style>
Avalia&ccedil;&atilde;o dos Trabalhos Inscritos - Aceitar/recusar trabalhos
<br />
<br />
<form action="controle.php" method="post" id="form_dados">
<input type="hidden" name="ctrl" value="avaliacao" />
<input type="hidden" name="acao" value="salvar_aceitos_queering" />
<div id="accordion">
	<?php foreach($linhas_tematicas as $linha_tematica): ?>
        <h3>
        	<a href="#"><?php echo $linha_tematica['titulo']; ?> (Total de trabalhos: <?php echo $linha_tematica['total_trabalhos']; ?>)</a>
        </h3>
        <div style="background:#FFFFFF !important; border-top:1px solid #DDDDDD !important;">
        	<h4>Comunica&ccedil;&otilde;es Individuais: (Total: <?php echo $linha_tematica['total_comunicacoes_individuais']; ?>)</h4>
            <br />
            <table class="trabalhos" cellpadding="0" cellspacing="0">
				<?php $i = 0; ?>
				<?php foreach($linha_tematica['comunicacoes_individuais'] as $comunicacao_individual): ?>
                    <?php if($i % 10 == 0) : ?>
                        <tr class="header">
                            <td class="titulo">T&iacute;tulo</td>
                            <td class="nota">Nota 1</td>
                            <td class="nota">Nota 2</td>
                            <td class="aceitar">Aceitar?</td>
                            <td class="observacao">Observa&ccedil;&atilde;o</td>
                        </tr>
					<?php endif; ?>
                   	<?php $i++; ?>
                	<tr class="linha">
                        <td class="titulo"><?php echo $comunicacao_individual['titulo']; ?></td>
                        <td class="nota">
							<?php 
								echo (!empty($comunicacao_individual['nota_1'])) ? $comunicacao_individual['nota_1'] : "N&atilde;o avaliado"; 
								/*
								$link_avaliador = "<span class='avaliador'>(<a href='controle.php?ctrl=participante&acao=abrir_edicao&id_participante=".$comunicacao_individual['avaliador_nota_1']."' target='_blank'>Avaliador</a>)</span>";
								if(!empty($comunicacao_individual['avaliador_nota_1'])) 
									echo "<br />" . $link_avaliador;
								//else echo "<br />(Sem avaliador)";
								*/
							?>
                        </td>
                        <td class="nota">
							<?php 
								echo (!empty($comunicacao_individual['nota_2'])) ? $comunicacao_individual['nota_2'] : "N&atilde;o avaliado"; 
								/*
								$link_avaliador = "<span class='avaliador'>(<a href='controle.php?ctrl=participante&acao=abrir_edicao&id_participante=".$comunicacao_individual['avaliador_nota_2']."' target='_blank'>Avaliador</a>)</span>";
								if(!empty($comunicacao_individual['avaliador_nota_2'])) 
									echo "<br />" . $link_avaliador;
								//else echo "<br />(Sem avaliador)";
								*/
							?>
                        </td>
                        <td class="aceitar">
                        	<?php 
							$name = "comunicacao_individual_aceito_" . $comunicacao_individual['id'];
							$aceito = $comunicacao_individual['aceito']; 
							?>
							<label><input type="radio" name="<?=$name?>" value="sim" <?= ($aceito == 'sim') ? "checked" : "" ;?> /> Sim</label>
                            <br />
							<label><input type="radio" name="<?=$name?>" value="nao" <?= ($aceito == 'nao') ? "checked" : "" ;?> /> N&atilde;o</label>
                        </td>
                        <td class="observacao">
                            <a class="exibir_observacao" href="controle.php?ctrl=avaliacao&acao=observacoes_avaliacoes&id_trabalho=<?php echo $comunicacao_individual['id']; ?>&tipo_trabalho=comunicacao_individual">Exibir</a>
                        </td>
                    </tr>
				<?php endforeach; ?>
            </table>
            <br />
            <br />
        	<h4>Comunica&ccedil;&otilde;es Coordenadas: (Total: <?php echo $linha_tematica['total_comunicacoes_coordenadas']; ?>)</h4>
            <br />
            <table class="trabalhos" cellpadding="0" cellspacing="0">
				<?php $i = 0; ?>
				<?php foreach($linha_tematica['comunicacoes_coordenadas'] as $comunicacao_coordenada): ?>
                    <?php if($i % 10 == 0) : ?>
                        <tr class="header">
                            <td class="titulo">T&iacute;tulo</td>
                            <td class="nota">Nota 1</td>
                            <td class="nota">Nota 2</td>
                            <td class="aceitar">Aceitar?</td>
                            <td class="observacao">Observa&ccedil;&atilde;o</td>
                        </tr>
					<?php endif; ?>
                   	<?php $i++; ?>
                	<tr class="linha">
                        <td class="titulo"><?php echo $comunicacao_coordenada['titulo']; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_coordenada['nota_1'])) ? $comunicacao_coordenada['nota_1'] : "N&atilde;o avaliado"; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_coordenada['nota_2'])) ? $comunicacao_coordenada['nota_2'] : "N&atilde;o avaliado"; ?></td>
                        <td class="aceitar">
                        	<?php 
							$name = "comunicacao_coordenada_aceito_" . $comunicacao_coordenada['id'];
							$aceito = $comunicacao_coordenada['aceito']; 
							?>
							<label><input type="radio" name="<?=$name?>" value="sim" <?= ($aceito == 'sim') ? "checked" : "" ;?> /> Sim</label>
                            <br />
							<label><input type="radio" name="<?=$name?>" value="nao" <?= ($aceito == 'nao') ? "checked" : "" ;?> /> N&atilde;o</label>
                        </td>
                        <td class="observacao">
                            <a class="exibir_observacao" href="controle.php?ctrl=avaliacao&acao=observacoes_avaliacoes&id_trabalho=<?php echo $comunicacao_coordenada['id']; ?>&tipo_trabalho=comunicacao_coordenada">Exibir</a>
                        </td>
                    </tr>
	            <?php endforeach; ?>
            </table>
        </div>
	<?php endforeach; ?>
</div>
<input type="submit" value="Salvar"  class="botao_editar"/>
</form>