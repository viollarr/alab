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
	
	
	.avaliadores > h4{margin-bottom:7px; margin-top:12px;}
	.avaliadores h4 + div > label div:hover{background:#e3e4ff;}
	.avaliadores input{margin-right:5px;}
	
	.avaliadores .avaliadores_opcoes{margin-left:10px;}
	
	.setinha{margin-right:7px; padding-bottom:1px;}
	
</style>
<?php
require("conexao.php");

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
if ($_SESSION["id_evento_admin"] != 28)
	$posteres = $GLOBALS["posteres"];
$comunicacoes_individuais = $GLOBALS["comunicacoes_individuais"];
$comunicacoes_coordenadas = $GLOBALS["comunicacoes_coordenadas"];

$avaliadores = $GLOBALS["avaliadores"];

$linhas_tematicas_aux = array();
foreach($linhas_tematicas as $linha_tematica) {
	$linha_tematica["count_trabalhos"] = $linha_tematica["count_posteres"] = $linha_tematica["count_comunicacoes_individuais"] = $linha_tematica["count_comunicacoes_coordenadas"] = 0;

    // Count Pôsteres
	if ($_SESSION["id_evento_admin"] != 28)
	{
		foreach($posteres as $poster) { 
			if($poster["id_linha_tematica"] == $linha_tematica["id"]) {
				$linha_tematica["count_trabalhos"]++;
				$linha_tematica["count_posteres"]++;
			} //if
		}//foreach 
    }
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
	
	/*
	print "\$linha_tematica: <pre>";
		print_r($linha_tematica);
	print "</pre>";
	*/
	
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
        foreach($linhas_tematicas_aux as $linha_tematica) { 
			/*
			print "\$linha_tematica: <pre>";
				print_r($linha_tematica);
			print "</pre>";
			*/
			?>
            <h3>
                <a href="#"><?=$linha_tematica["titulo"]?> (<?=$linha_tematica["count_trabalhos"]?> trabalhos)</a>
            </h3>
            <div>
            	<div class="trabalhos_linha">
                    <h4><img src="telas/imgs/setinha.png" class="setinha" />Modalidades de Trabalhos</h4>
                    <div class="trabalhos_opcoes">
						<?php if ($_SESSION["id_evento_admin"] != 28): ?>
							<div>
								P&ocirc;steres (<?=$linha_tematica["count_posteres"]?> trabalhos)
							</div>
						<?php endif; ?>
                        <div>
                            Comunica&ccedil;&otilde;es Individuais (<?=$linha_tematica["count_comunicacoes_individuais"]?> trabalhos)
                        </div>
                        <div>
                            Comunica&ccedil;&otilde;es Coordenadas (<?=$linha_tematica["count_comunicacoes_coordenadas"]?> sess&otilde;es)
                        </div>
                    </div>
                </div>
                <div class="avaliadores">
                	<h4><img src="telas/imgs/setinha.png" class="setinha" />Avaliadores (<?php print count($avaliadores);?>)</h4>
                    <div class="avaliadores_opcoes">
                    	<?php
						$colunas = 3;
						$linhas  = ceil((count($avaliadores) / $colunas));
						//print "<br />Quantidade de linhas para ".$colunas." coluna(s): ".$linhas."<br /><br />";
						
						?>
						<table border="1" width="100%" cellpascing="1" cellpadding="0">
							<?php
							$k = 0;
							for ($i=0; $i < $linhas; $i++){
								echo "<tr>";
								for($j=0; $j < $colunas; $j++){

									//////////////////////////
									// Checked do avaliador //
									//////////////////////////
									$check_avaliador = "";
									if ($_SESSION["id_evento_admin"] != 28)
									{
										// Contando Resumos (Pôster)
										$sql = "
											SELECT av.id 
											FROM 
												ev_avaliacao av, ev_resumo r
											WHERE 
												av.id_avaliador = '".$avaliadores[$k]["id"]."' 
												AND av.id_trabalho = r.id
												AND r.id_linha_tematica = '".$linha_tematica["id"]."' 
												AND av.tipo_trabalho = 'poster' 
												AND av.id_evento = '".$_SESSION["id_evento_admin"]."' 
												AND r.id_tipo_trabalho = 4
												";
										$res = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
										if(mysql_num_rows($res) > 0) $check_avaliador = "checked=\"checked\"";
										$teste_p = mysql_num_rows($res);
									}
									
									// Contando Resumos (Comunicações Individuais)
									$sql = "
										SELECT av.id 
										FROM 
											ev_avaliacao av, ev_resumo r
										WHERE 
											av.id_avaliador = '".$avaliadores[$k]["id"]."' 
											AND av.id_trabalho = r.id
											AND r.id_linha_tematica = '".$linha_tematica["id"]."' 
											AND av.tipo_trabalho = 'comunicacao_individual' 
											AND av.id_evento = '".$_SESSION["id_evento_admin"]."' 
											AND r.id_tipo_trabalho = 3
											";
									$res = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
									if(mysql_num_rows($res) > 0) $check_avaliador = "checked=\"checked\"";
									$teste_ci = mysql_num_rows($res);
									
									// Contando Comunicações Coordenadas
									$sql = "
										SELECT av.id 
										FROM 
											ev_avaliacao av, ev_comunicacao_coordenada cc
										WHERE 
											av.id_avaliador = '".$avaliadores[$k]["id"]."' 
											AND av.id_trabalho = cc.id
											AND cc.id_linha_tematica = '".$linha_tematica["id"]."' 
											AND av.tipo_trabalho = 'comunicacao_coordenada' 
											AND av.id_evento = '".$_SESSION["id_evento_admin"]."' ";
									$sql_aux = $sql;
									$res = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
									if(mysql_num_rows($res) > 0) $check_avaliador = "checked=\"checked\"";
									$teste_cc = mysql_num_rows($res);
									
									///////////////////////////////
									// fim: Checked do avaliador //
									///////////////////////////////

									echo "<td>";
									if(!empty($avaliadores[$k])){
										/*
										echo "\$teste_p: ".$teste_p."<br>";
										echo "\$teste_ci: ".$teste_ci."<br>";
										echo "\$teste_cc: ".$teste_cc."<br>";
										echo "\$sql_aux: ".$sql_aux."<br>";
										*/
										echo "<label>
												<input type='checkbox' name='avaliadores_".$linha_tematica["id"]."[]' value='".$avaliadores[$k]["id"]."' ".$check_avaliador." />
												<a href=\"controle.php?ctrl=participante&acao=abrir_edicao&id_participante=".$avaliadores[$k]["id"]."\">".$avaliadores[$k]["nome"]."</a>
											</label>";
									}//if
									else print "&nbsp;";
									echo "</td>";
									$k++;
								}// foreach coluna
								echo "</tr>";
							} //foreach linha
							?>
						</table>
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