<?php
/*
print "Linhas tematicas: <pre>";
	print_r($GLOBALS["linhas_tematicas"]);
print "</pre>";
exit("view avaliacoes_trabalhos_queering");
/**/

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
?>
<link href="telas/css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css"/>
<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/ui/jquery-ui-1.8.9.custom.js"></script>
<script>
	$(document).ready(function() {
		$("#accordion").accordion({ autoHeight: false });
	});
</script>
<style type="text/css">
	.trabalhos{width:100%; border-top:1px solid #CCCCCC;}
	.trabalhos td{border:1px solid #CCCCCC; padding:8px 8px;}
	
	/* Header */
	.trabalhos .header td{font-size:12px; font-weight:bold; color:#333333; background-color:#F4F4F4; border-top:0;}
	.trabalhos .header .titulo{border-right:none; width:560px;}
	.trabalhos .header .nota{text-align:center; border-right:none; width:50px;}
	.trabalhos .header .aceitar{text-align:center; width:50px;}

	/* Linhas */
	.trabalhos .linha:hover{background-color:#F4F4F4;}
	.trabalhos .linha td{font-size:12px; font-weight:normal; color:#333333; border-top:none;}
	.trabalhos .linha .titulo{border-right:none;}
	.trabalhos .linha .nota{text-align:center; border-right:none; vertical-align:middle;}
	.trabalhos .linha .aceitar{text-align:center; vertical-align:middle;}
</style>
Avalia&ccedil;&atilde;o dos Trabalhos Inscritos - Notas dos trabalhos
<br />
<br />
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
                            <td class="aceitar">Aceito?</td>
                        </tr>
					<?php endif; ?>
                   	<?php $i++; ?>
                	<tr class="linha">
                        <td class="titulo"><?php echo $comunicacao_individual['titulo']; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_individual['nota_1'])) ? $comunicacao_individual['nota_1'] : "N&atilde;o avaliado"; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_individual['nota_2'])) ? $comunicacao_individual['nota_2'] : "N&atilde;o avaliado"; ?></td>
                        <td class="aceitar">
                        	<?php 
							if($comunicacao_individual['aceito'] == 'sim') echo '<span style="color:#1582c1">Sim</span>';
							elseif($comunicacao_individual['aceito'] == 'nao') echo '<span style="color:#eb0e0e">N&atilde;o</span>';
							else echo "N&atilde;o avaliado";
							?>
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
                            <td class="aceitar">Aceito?</td>
                        </tr>
					<?php endif; ?>
                   	<?php $i++; ?>
                	<tr class="linha">
                        <td class="titulo"><?php echo $comunicacao_coordenada['titulo']; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_coordenada['nota_1'])) ? $comunicacao_coordenada['nota_1'] : "N&atilde;o avaliado"; ?></td>
                        <td class="nota"><?php echo (!empty($comunicacao_coordenada['nota_2'])) ? $comunicacao_coordenada['nota_2'] : "N&atilde;o avaliado"; ?></td>
                        <td class="aceitar">
                        	<?php 
							if($comunicacao_coordenada['aceito'] == 'sim') echo '<span style="color:#1582c1">Sim</span>';
							elseif($comunicacao_coordenada['aceito'] == 'nao') echo '<span style="color:#eb0e0e">N&atilde;o</span>';
							else echo "N&atilde;o avaliado";
							?>
                        </td>
                    </tr>
	            <?php endforeach; ?>
            </table>
        </div>
	<?php endforeach; ?>
</div>