<?php
/*
print "Linhas tematicas: <pre>";
	print_r($GLOBALS["linhas_tematicas"]);
print "</pre>";
print "<hr />";
/*
print "Avaliadores: <pre>";
	print_r($GLOBALS["avaliadores"]);
print "</pre>";
exit("controle avaliacao");
/**/

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
$avaliadores = $GLOBALS["avaliadores"];
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
	.trabalho{width:100%; margin-bottom:15px;}
	.trabalho select{border:1px solid #000; background-color:#FFFFFF; font-size:12px;}
</style>
Avalia&ccedil;&atilde;o dos Trabalhos Inscritos - Indicar avaliadores para cada trabalho
<br />
<br />
<form action="controle.php" method="post" id="form_dados">
<input type="hidden" name="ctrl" value="avaliacao" />
<input type="hidden" name="acao" value="salvar_avaliadores_trabalhos" />
<?php /* <div id="accordion"> */ ?>
<?php /* <div> */ ?>
<div id="accordion">
	<?php foreach($linhas_tematicas as $linha_tematica): ?>
        <h3>
        	<a href="#"><?php echo $linha_tematica['titulo']; ?> (Total de trabalhos: <?php echo $linha_tematica['total_trabalhos']; ?>)</a>
        </h3>
        <div style="background:#FFFFFF !important; border-top:1px solid #DDDDDD !important;">
        	<h4>Comunica&ccedil;&otilde;es Individuais: (Total: <?php echo $linha_tematica['total_comunicacoes_individuais']; ?>)</h4>
            <br />
			<?php foreach($linha_tematica['comunicacoes_individuais'] as $comunicacao_individual): ?>
                <table class="trabalho">
                    <tr>
                        <td style="width:85px;"><strong>Trabalho:</strong></td>
                        <td><?php echo $comunicacao_individual['titulo']; ?></td>
                    </tr>
                    <tr>
                        <td>Avaliador 1:</td>
                        <td>
                            <select name="avaliador_comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>_1">
                                <option>selecione</option>
                                <option>----------------</option>
                                <?php foreach($avaliadores as $avaliador): 
									$selected = ($comunicacao_individual['avaliacoes'][0]['id_avaliador'] == $avaliador['id']) ? "selected='selected'" : "";
									?>
                                    <option value="<?php echo $avaliador['id']; ?>" <?php echo $selected; ?>><?php echo $avaliador['name']; ?> - <?php echo $avaliador['email']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Avaliador 2:</td>
                        <td>
                            <select name="avaliador_comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>_2">
                                <option>selecione</option>
                                <option>----------------</option>
                                <?php foreach($avaliadores as $avaliador): 
									$selected = ($comunicacao_individual['avaliacoes'][1]['id_avaliador'] == $avaliador['id']) ? "selected='selected'" : ""; ?>
                                    <option value="<?php echo $avaliador['id']; ?>" <?php echo $selected; ?>><?php echo $avaliador['name']; ?> - <?php echo $avaliador['email']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <br />
        	<h4>Comunica&ccedil;&otilde;es Coordenadas: (Total: <?php echo $linha_tematica['total_comunicacoes_coordenadas']; ?>)</h4>
            <br />
			<?php foreach($linha_tematica['comunicacoes_coordenadas'] as $comunicacao_coordenada): ?>
                <table class="trabalho">
                    <tr>
                        <td style="width:85px;"><strong>Trabalho:</strong></td>
                        <td><?php echo $comunicacao_coordenada['titulo']; ?></td>
                    </tr>
                    <tr>
                        <td>Avaliador 1:</td>
                        <td>
                            <select name="avaliador_comunicacao_coordenada_<?php echo $comunicacao_coordenada['id']; ?>_1">
                                <option>selecione</option>
                                <option>----------------</option>
                                <?php foreach($avaliadores as $avaliador): 
									$selected = ($comunicacao_coordenada['avaliacoes'][0]['id_avaliador'] == $avaliador['id']) ? "selected='selected'" : "";
									?>
                                    <option value="<?php echo $avaliador['id']; ?>" <?php echo $selected; ?>><?php echo $avaliador['name']; ?> - <?php echo $avaliador['email']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Avaliador 2:</td>
                        <td>
                            <select name="avaliador_comunicacao_coordenada_<?php echo $comunicacao_coordenada['id']; ?>_2">
                                <option>selecione</option>
                                <option>----------------</option>
                                <?php foreach($avaliadores as $avaliador): 
									$selected = ($comunicacao_coordenada['avaliacoes'][1]['id_avaliador'] == $avaliador['id']) ? "selected='selected'" : "";
									?>
                                    <option value="<?php echo $avaliador['id']; ?>" <?php echo $selected; ?>><?php echo $avaliador['name']; ?> - <?php echo $avaliador['email']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>
	<?php endforeach; ?>
</div>
<input type="submit" value="Salvar"  class="botao_editar"/>
</form>