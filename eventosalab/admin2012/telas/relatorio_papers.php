<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$papers = $GLOBALS["papers"]; 
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

Relat&oacute;rio de Papers
<br /><br />

<div style="margin-bottom:20px; margin-top:-5px; border:1px solid #0099cc; padding:10px; background:#fcfcfc">
    <h3>Quantidade de Papers inscritos (<?php echo count($papers); ?>)</h3>
    <br />
    <?php
    // Quantidade de trabalhos por linha temática
    foreach($linhas_tematicas as &$linha_tematica){
        $linha_tematica['qtd_trabalhos'] = 0;
        foreach($papers as $paper){
            if($paper['id_linha_tematica'] == $linha_tematica['id']){
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
					if(!empty($linhas_tematicas[$k]['titulo'])){
						echo "<td>";
							$item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_papers&id_linha_tematica=".$linhas_tematicas[$k]['id']."\">- ".$linhas_tematicas[$k]['titulo'];
							$item .= " <strong>(".$linhas_tematicas[$k]['qtd_trabalhos'].")</strong>";
							$item .= "</a>";
							print $item;
						echo "</td>";
						$k++;
					}
                }// foreach coluna
                echo "</tr>";
            } //foreach linha
        } //if
        else{
            //foreach($linhas_tematicas as $linha_tematica){
			for($i=0; $i<=($rows_linhas-1); $i++){
                if($linhas_tematicas[$i]['id'] == $_GET['id_linha_tematica']){
                    echo "<tr>";
                        echo "<td>";
                            $item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_papers&id_linha_tematica=".$linhas_tematicas[$i]['id']."\">".$linhas_tematicas[$i]['titulo'];
                            $item .= " <strong>(".$linhas_tematicas[$i]['qtd_trabalhos'].")</strong>";
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
if(!empty($papers)){
	for($i=0; $i<=($rows_linhas-1); $i++){
		foreach($papers as $paper){
			if($linhas_tematicas[$i]["id"] == $poster["id_linha_tematica"]){
			?>
                <hr style="border-bottom:#0066cc 2px dotted; margin:20px 0px;" />
				<div style="float:left; margin-bottom:10px; /*border:1px dashed #F00;*/ width:750px;">
					Linha Tem&aacute;tica: <?php echo $linha_tematica["titulo"];
					?>
				</div>
                <?php if($paper["aceito"]){ ?>
					<div class="aceito a_sim">ACEITO</div>
				<?php } else { ?>
                	<div class="aceito a_nao">RECUSADO</div>
                <?php } //else ?>
                <div style="clear:both; margin:0; padding:0; border:0; line-height:0;"></div>
				<div style="text-transform:uppercase; font-weight:bold; margin-bottom:15px;"><?php echo $paper["titulo"]; ?></div>
				<div style="margin-bottom:10px;">
					<?php 
						if(!empty($participantes)){
							foreach($participantes as $participante){
								if($participante["id"] == $paper["autor"]) {
									echo $participante["name"];
									echo "<br />".$participante["sigla_instituicao"];
								}//if
							}//foreach
							foreach($participantes as $participante){
								if($participante["id"] == $paper["co_autor"]) {
									echo "<br />".$participante["name"];
									echo "<br />".$participante["sigla_instituicao"];
								}//if
							}//foreach
							foreach($participantes as $participante){
								if($participante["id"] == $paper["co_autor2"]) {
									echo "<br />".$participante["name"];
									echo "<br />".$participante["sigla_instituicao"];
								}//if
							}//foreach
							foreach($participantes as $participante){
								if($participante["id"] == $paper["co_autor3"]) {
									echo "<br />".$participante["name"];
									echo "<br />".$participante["sigla_instituicao"];
								}//if
							}//foreach
						}//if
					?>
				</div>
				<div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $paper["resumo"]; ?></div>
				<div><strong>Palavras-chave:</strong> <?php echo $paper["palavras_chave"]; ?></div>
			<?php
			}//if
		}//foreach 
	} // for
} //if
?>
<br />
<a href="#topo" style="float:right;">Topo</a>