<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$posteres = $GLOBALS["posteres"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 
$participantes = $GLOBALS["participantes"]; 

/*
print "<hr>relatorio_posteres.php:<pre>";
	print_r($posteres);
print "</pre>";
/**/
?>

<style type="text/css">
	.aceito{float:right; font-weight:bold; border:1px solid #DEDEDE; padding:0px 8px; font-size:10px; border-radius:5px; margin-bottom:20px;}
	.a_sim{color:#00F; background-color:#F1F1F1;}
	.a_nao{color:#F00; background-color:#F2E3E3;}
</style>

Relat&oacute;rio de Pôsteres
<br /><br />

<div style="margin-bottom:20px; margin-top:-5px; border:1px solid #0099cc; padding:10px; background:#fcfcfc">
    <h3>Quantidade de P&ocirc;steres inscritos (<?php echo count($posteres); ?>)</h3>
    <br />
    <?php
    // Quantidade de trabalhos por linha temática
    foreach($linhas_tematicas as &$linha_tematica){
        $linha_tematica['qtd_trabalhos'] = 0;
        foreach($posteres as $poster){
            if($poster['id_linha_tematica'] == $linha_tematica['id']){
                $linha_tematica['qtd_trabalhos']++;
            } //if
        } // foreach
    } //foreach


    // Exibindo as quantidades e links para cada linha temática 
    $columns = 2;
    $rows  = ceil((count($linhas_tematicas) / $columns));
    //print "<br />Quantidade de linhas para ".$columns." coluna(s): ".$rows.".<br /><br />";
    ?>
    <table border="1" width="100%" cellpascing="1" cellpadding="0">
        <?php
        if( empty($_GET['id_linha_tematica']) ){ 
            $k = 0;
            for ($i=0; $i < $rows; $i++){
                echo "<tr>";
                for($j=0; $j < $columns; $j++){
                    echo "<td>";
                        $item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_posteres&id_linha_tematica=".$linhas_tematicas[$k]['id']."\">- ".$linhas_tematicas[$k]['titulo'];
                        $item .= " <strong>(".$linhas_tematicas[$k]['qtd_trabalhos'].")</strong>";
                        $item .= "</a>";
                        print $item;
                    echo "</td>";
                    $k++;
                }// foreach coluna
                echo "</tr>";
            } //foreach linha
        } //if
        else{
            foreach($linhas_tematicas as $linha_tematica){
                if($linha_tematica['id'] == $_GET['id_linha_tematica']){
                    echo "<tr>";
                        echo "<td>";
                            $item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_posteres&id_linha_tematica=".$linha_tematica['id']."\">".$linha_tematica['titulo'];
                            $item .= " <strong>(".$linha_tematica['qtd_trabalhos'].")</strong>";
                            $item .= "</a>";
                            print $item;
                        echo "</td>";
                    echo "</tr>";
                } //if
            } // foreach
        } //elseif
        ?>
    </table>
</div>
<?php 
if(!empty($posteres)){
	foreach($linhas_tematicas as $linha_tematica){ 
		foreach($posteres as $poster){ 
			if($linha_tematica["id"] == $poster["id_linha_tematica"]){
			?>
                <hr style="border-bottom:#0066cc 2px dotted; margin:20px 0px;" />
				<div style="float:left; margin-bottom:10px; /*border:1px dashed #F00;*/ width:750px;">
					Linha Tem&aacute;tica: <?php echo $linha_tematica["titulo"];
					?>
				</div>
                <?php if($poster["aceito"]){ ?>
					<div class="aceito a_sim">ACEITO</div>
				<?php } else { ?>
                	<div class="aceito a_nao">RECUSADO</div>
                <?php } //else ?>
                <div style="clear:both; margin:0; padding:0; border:0; line-height:0;"></div>
				<div style="text-transform:uppercase; font-weight:bold; margin-bottom:15px;"><?php echo $poster["titulo"]; ?></div>
				<div style="margin-bottom:10px;">
					<?php 
						if(!empty($participantes)){
							foreach($participantes as $participante){
								if($participante["id"] == $poster["autor"]) {
									echo $participante["nome"];
									echo "<br />".$participante["instituicao"];
								}//if
							}//foreach
							foreach($participantes as $participante){
								if($participante["id"] == $poster["co_autor"]) {
									echo "<br />".$participante["nome"];
									echo "<br />".$participante["instituicao"];
								}//if
							}//foreach
						}//if
					?>
				</div>
				<div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $poster["resumo"]; ?></div>
				<div><strong>Palavras-chave:</strong> <?php echo $poster["palavras_chave"]; ?></div>
			<?php
			}//if
		}//foreach 
	} // foreach
} //if
?>
<br />
<a href="#topo" style="float:right;">Topo</a>