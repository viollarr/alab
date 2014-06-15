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
	
	.titulo_tipo_trabalho{font-weight:bold; margin:20px 0px 10px 0px;}
	
	.header_trabalhos{border:1px solid #565656; background:#DEDEDE;}
	.trabalho{border:1px solid #565656; /*height:40px;*/}
	
	.header_trabalhos div, .trabalho div{padding:3px 5px; font-size:12px;}
	.header_trabalhos div{background:#DEDEDE; font-weight:bold; min-height:30px;}
	.trabalho div{min-height:35px;}
	
	.trabalho_titulo, .trabalho_nota, .trabalho_aceitacao, .trabalho_avaliador{/*height:35px*/}
	.trabalho_titulo, .trabalho_nota, .trabalho_aceitacao{border-right:1px solid #565656;}

	.trabalho_titulo{width:600px; /*margin-bottom:3px;*/ width:555px; }
	.trabalho_nota{width:30px; text-align:center; }
	.trabalho_aceitacao{width:70px; text-align:center; }
	.header_trabalhos .trabalho_avaliador, .trabalho .trabalho_avaliador{width:160px;}
	.header_trabalhos .trabalho_avaliador{text-align:center; }
	.header_trabalhos .clear, .trabalho .clear{clear:both; border:0px; padding:0px; background:none; min-height:0px;}
	
</style>
<?php
require("conexao.php");

$nota_corte = 3;

$linhas_tematicas = $GLOBALS["linhas_tematicas"];
$posteres = $GLOBALS["posteres"];
$comunicacoes_individuais = $GLOBALS["comunicacoes_individuais"];
$comunicacoes_coordenadas = $GLOBALS["comunicacoes_coordenadas"];

/*
$variaveis = array("linhas_tematicas", "posteres", "comunicacoes_individuais", "comunicacoes_coordenadas");
foreach($variaveis as $variavel){
	print "<hr><strong>$variavel:</strong> <pre>";
		print_r($$variavel);
	print "</pre>";
}//foreach
exit("<hr>ranking_trabalhos.php");
*/

$linhas_tematicas_aux = array();
foreach($linhas_tematicas as $linha_tematica) {
	$linha_tematica["count_trabalhos"] = $linha_tematica["count_posteres"] = $linha_tematica["count_comunicacoes_individuais"] = $linha_tematica["count_comunicacoes_coordenadas"] = 0;

    // Count Pôsteres
	foreach($posteres as $poster) { 
        if($poster["id_linha_tematica"] == $linha_tematica["id"]) {
			$linha_tematica["count_trabalhos"]++;
			$linha_tematica["count_posteres"]++;
        } //if
    }//foreach 
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
<h2 style="margin-bottom:20px;"><em>Ranking</em> dos Trabalhos</h2>
<h5 style="margin-bottom:15px;">Nota de corte: <?php echo $nota_corte;?></h5>
<h4 style="margin-bottom:20px;">Linhas Tem&aacute;ticas</h4>
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
                	<?php
                    /**/
                    $tipos_trabalhos = array(
                        array("titulo"=>"Comunica&ccedil;&otilde;es Coordenadas", "tipo"=>"comunicacao_coordenada", "tipo_plural"=>"comunicacoes_coordenadas"),
                        array("titulo"=>"Comunica&ccedil;&otilde;es Individuais", "tipo"=>"comunicacao_individual", "tipo_plural"=>"comunicacoes_individuais"),
                        array("titulo"=>"P&ocirc;steres", "tipo"=>"poster", "tipo_plural"=>"posteres")
                    );

                    foreach($tipos_trabalhos as $tipo_trabalho){

// Pegar as notas e quantidade de trabalhos aprovados nesta Modalidade (tipo_trabalho) nesta Linha Temática
$tipo_trabalho['qtd_trabs_aceitos'] = 0;
foreach($$tipo_trabalho["tipo_plural"] as $trabalho){ 
	$nota_trabalho = 0;
	if($trabalho["id_linha_tematica"] == $linha_tematica["id"]) { 
		// Pega as respostas deste trabalho
		$sql = "SELECT avp.resposta 
		FROM ev_avaliacao a, ev_avaliacao_perguntas avp
		WHERE
			a.id_trabalho = ".$trabalho["id"]."
			AND a.tipo_trabalho = '".$tipo_trabalho['tipo']."'
			AND a.id = avp.id_avaliacao
		";
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);

		// Somar a quantidade de notas positivas deste trabalho
		while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
			if($linha['resposta'] == 'sim' ) $nota_trabalho++;
		} //while
		$trabalho["nota_trabalho"] = $nota_trabalho;
		//print "<hr>nota_trabalho: " . $trabalho["nota_trabalho"];

		// Incrementando ou não a quantidade de trabalhos aceitos para esta Modalidade (tipo_trabalho) nessa Linha Temática
		if($nota_trabalho >= $nota_corte) $tipo_trabalho['qtd_trabs_aceitos']++;
		//print "<hr>qtd_trabs_aceitos: " . $tipo_trabalho['qtd_trabs_aceitos'];
		//print "<hr><hr>";
	} //if
} //foreach
                        ?>
                        <div>
                            <div class="titulo_tipo_trabalho">
								<?php echo $tipo_trabalho['titulo']; ?> (Trabalhos aceitos: <?php echo $tipo_trabalho['qtd_trabs_aceitos'];?> de <?php echo $linha_tematica["count_" . $tipo_trabalho["tipo_plural"]]; ?>)
                            </div>
                            <div class="header_trabalhos">
                                <div class="trabalho_titulo" style="float:left; ">T&iacute;tulo do Trabalho</div>
                                <div class="trabalho_nota" style="float:left; ">Nota</div>
                                <div class="trabalho_aceitacao" style="float:left; ">Aceito?<br />(Sim / N&atilde;o)</div>
                                <div class="trabalho_avaliador" style="float:left; ">Avaliador</div>
                                <div class="clear" ></div>
                            </div>
                            <?php foreach($$tipo_trabalho["tipo_plural"] as $trabalho){ 
                                if($trabalho["id_linha_tematica"] == $linha_tematica["id"]) { 
                                    $sql = "SELECT avp.resposta 
                                    FROM ev_avaliacao a, ev_avaliacao_perguntas avp
                                    WHERE
                                        a.id_trabalho = ".$trabalho["id"]."
                                        AND a.tipo_trabalho = '".$tipo_trabalho['tipo']."'
                                        AND a.id = avp.id_avaliacao
                                    ";
                                    $result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
                                    $nota_trabalho = 0;
                                    while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
                                        if($linha['resposta'] == 'sim' ) $nota_trabalho++;
                                    } //while
                                    ?>
                                    <div class="trabalho">
                                        <div class="trabalho_titulo" style="float:left; ">
											<?php 
											//print $tipo_trabalho['tipo'];
											print ($tipo_trabalho['tipo'] == 'comunicacao_coordenada') ? $trabalho["titulo_sessao"] : $trabalho["titulo"]; ?>
                                        </div>
                                        <div class="trabalho_nota" style="float:left; "><?php echo $nota_trabalho; ?></div>
                                        <div class="trabalho_aceitacao" style="float:left; ">
                                            <?php
                                            echo ($nota_trabalho >= $nota_corte) ? "<span style='color:#1582c1'>Sim</span>" : "<span style='color:#eb0e0e'>N&atilde;o</span>";
                                            ?>
                                        </div>
		                                <div class="trabalho_avaliador" style="float:left; ">
                                        	<?php
											$sql = "SELECT p.nome 
											FROM ev_avaliacao a, ev_participante p
											WHERE
												a.id_trabalho = ".$trabalho["id"]."
												AND a.tipo_trabalho = '".$tipo_trabalho['tipo']."'
												AND a.id_avaliador = p.id
											";
											$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
											list($nome_avaliador) = mysql_fetch_array($result);
											echo $nome_avaliador;
											?>
                                        </div>
                                        <div class="clear" ></div>
                                    </div>
                                <?php }//if
                            } //foreach ?>
                        </div>
                        <?php
                    }//foreach
                    /**/
                    
					//========================================================================//
					/*
                    <div>
                        <strong>Comunica&ccedil;&otilde;es Coordenadas (<?=$linha_tematica["count_comunicacoes_coordenadas"]?> sess&otilde;es)</strong>
                        <div>
                            <div class="trabalho_titulo" style="float:left">T&iacute;tulo</div>
                            <div class="trabalho_nota" style="float:left">Nota</div>
                            <div style="clear:both"></div>
                        </div>
                        <?php foreach($comunicacoes_coordenadas as $comunicacao_coordenada){ 
							if($comunicacao_coordenada["id_linha_tematica"] == $linha_tematica["id"]){ ?>
                                <div>
                                    <div class="trabalho_titulo" style="float:left"><?php print $comunicacao_coordenada["titulo_sessao"]; ?></div>
                                    <div class="trabalho_nota" style="float:left">NOTA_TRABALHO</div>
                                    <div style="clear:both"></div>
                                </div>
                            <?php }//if
						} //foreach ?>
                    </div>
                    <div>
                        <strong>Comunica&ccedil;&otilde;es Individuais (<?=$linha_tematica["count_comunicacoes_individuais"]?> trabalhos)</strong>
                        <div>
                            <div class="trabalho_titulo" style="float:left">T&iacute;tulo</div>
                            <div class="trabalho_nota" style="float:left">Nota</div>
                            <div class="trabalho_nota" style="float:left">Aceito? (Sim / N&atilde;o)</div>
                            <div style="clear:both"></div>
                        </div>
                        <?php foreach($comunicacoes_individuais as $comunicacao_individual){ 
							if($comunicacao_individual["id_linha_tematica"] == $linha_tematica["id"]) { 
								$sql = "SELECT avp.resposta 
								FROM ev_avaliacao a, ev_avaliacao_perguntas avp
								WHERE
									".$comunicacao_individual["id"]." = a.id_trabalho
									AND a.tipo_trabalho = 'comunicacao_individual'
									AND a.id = avp.id_avaliacao
								";
								$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
								$nota_trabalho = 0;
								while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
									if($linha['resposta'] == 'sim' ) $nota_trabalho++;
								} //while
								?>
                                <div>
                                    <div class="trabalho_titulo" style="float:left"><?php print $comunicacao_individual["titulo"]; ?></div>
                                    <div class="trabalho_nota" style="float:left">NOTA_TRABALHO</div>
                                    <div class="trabalho_aceitacao" style="float:left">
                                    	<?php
										echo ($nota_trabalho >= $nota_corte) ? "Sim" : "N&atilde;o";
										?>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            <?php }//if
						} //foreach ?>
                    </div>
                    <div>
                        <strong>P&ocirc;steres (<?=$linha_tematica["count_posteres"]?> trabalhos)</strong>
                        <div>
                            <div class="trabalho_titulo" style="float:left">T&iacute;tulo</div>
                            <div class="trabalho_nota" style="float:left">Nota</div>
                            <div style="clear:both"></div>
                        </div>
                        <?php foreach($posteres as $poster){ 
							if($poster["id_linha_tematica"] == $linha_tematica["id"]) { ?>
                                <div>
                                    <div class="trabalho_titulo" style="float:left"><?php print $poster["titulo"]; ?></div>
                                    <div class="trabalho_nota" style="float:left">NOTA_TRABALHO</div>
                                    <div style="clear:both"></div>
                                </div>
                            <?php }//if
						} //foreach ?>
                    </div>
					<?php //======================================================================// */ ?>
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