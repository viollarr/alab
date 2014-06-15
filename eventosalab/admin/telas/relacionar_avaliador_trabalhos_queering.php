<link href="telas/css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css"/>
<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/ui/jquery-ui-1.8.9.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#accordion").accordion();
	});
</script>
<style type="text/css">
	.trabalhos_linha{max-height:400px;}
	.trabalhos_linha > h4{margin-bottom:7px; }
	.trabalhos_linha .trabalhos_opcoes{margin-left:10px; }
	
	
	.setinha{margin-right:7px; padding-bottom:1px;}
	
	.resumos {border-collapse: collapse;font-size: 11px;margin: 5px 0 10px;width: 100%;}
	.resumos td {border-top: 1px solid #aaa;font-weight: bold;padding: 5px 8px;}
	.resumos tr:first-child td {border-top: 0;}
	.resumos .avaliadores {text-align: right;}
	
</style>
<?php
require("conexao.php");

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
$comunicacoes_individuais = $GLOBALS["comunicacoes_individuais"];
$comunicacoes_coordenadas = $GLOBALS["comunicacoes_coordenadas"];

$avaliadores = $GLOBALS["avaliadores"];

$linhas_tematicas_aux = array();
foreach($linhas_tematicas as $linha_tematica) {
	$linha_tematica["count_trabalhos"] = $linha_tematica["count_comunicacoes_individuais"] = $linha_tematica["count_comunicacoes_coordenadas"] = 0;

	// Count Comunicações Individuais
    foreach($comunicacoes_individuais as $comunicacao_individual) { 
        if($comunicacao_individual["id_linha_tematica"] == $linha_tematica["id"]) {
			$linha_tematica["count_trabalhos"]++;
			$linha_tematica["count_comunicacoes_individuais"]++;
        } //if
    }//foreach 
    // Count Comunicações Coordenadas
    foreach($comunicacoes_coordenadas as $comunicacao_coordenada) { 
        if($comunicacao_coordenada["id_linha_tematica"] == $linha_tematica["id"]) {
			$linha_tematica["count_trabalhos"]++;
			$linha_tematica["count_comunicacoes_coordenadas"]++;
        } //if
    }//foreach 
	
	array_push($linhas_tematicas_aux, $linha_tematica);
}//foreach

if(!empty($GLOBALS["msg_ctrl_avaliacao"])){ ?>
	<div style="margin-bottom:30px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?=$GLOBALS["msg_ctrl_avaliacao"]?></div>
<?php } //if ?>
<h2 style="margin-bottom:20px">Linhas Tem&aacute;ticas</h2>
<form action="controle.php" method="post" >
    <input type="hidden" name="ctrl" value="avaliacao" />
    <input type="hidden" name="acao" value="salvar_avaliador_trabalhos" />
    <div id="accordion">
        <?php
        /*******************
        * Linhas Temáticas *
        ********************/
        foreach($linhas_tematicas_aux as $linha_tematica) { ?>
            <h3>
                <a href="#"><?=$linha_tematica["titulo"]?> (<?=$linha_tematica["count_trabalhos"]?> trabalhos)</a>
            </h3>
            <div>
            	<div class="trabalhos_linha">
                    <h4><img src="telas/imgs/setinha.png" class="setinha" />Modalidades de Trabalhos</h4>
                    <div class="trabalhos_opcoes">
                        <div>
                            Comunica&ccedil;&otilde;es Individuais (<?=$linha_tematica["count_comunicacoes_individuais"]?> trabalhos)
							<table class="resumos">
							<?php 
							foreach ($comunicacoes_individuais as $comunicacao_individual):
								if ($comunicacao_individual["id_linha_tematica"] == $linha_tematica["id"]) 
								{
									echo "<tr><td> &bull;&nbsp; {$comunicacao_individual["titulo"]}</td>";
									echo "<td class='avaliadores'><select name='comunicacao_individual[{$comunicacao_individual["id"]}]'><option value=''>Selecione um avaliador</option>";
									foreach ($avaliadores as $avaliador)
										echo "<option value='{$avaliador["id"]}'>{$avaliador["nome"]}</option>";
									echo "</select></td></tr>";
								}
							endforeach; 
							?>
							</table>
                        </div>
                        <div>
                            Comunica&ccedil;&otilde;es Coordenadas (<?=$linha_tematica["count_comunicacoes_coordenadas"]?> sess&otilde;es)
							<?php 
							foreach ($comunicacoes_coordenadas as $comunicacao_coordenada):
								if ($comunicacao_coordenada["id_linha_tematica"] == $linha_tematica["id"])
									echo "<p><img src='telas/imgs/setinha.png' class='setinha' /> {$comunicacao_coordenada["titulo"]}</p>";
							endforeach; 
							?>
                        </div>
                    </div>
                </div>
            </div>
        	<?php 
		}//foreach 
        /************************
        * Fim: Linhas Temáticas *
        *************************/
        ?>
    </div>
    <input type="submit" value="Salvar"  class="botao_editar"/>
</form>