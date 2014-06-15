<!-- Para poder visualizar no Dreamweaver -->
<link href="telas/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="telas/js/jquery.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() { 

	if($("#escolha1").is(":checked")){
		$('.sumir1').show();
		$('.sumir2').hide();

	}
	else if($("#escolha2").is(":checked")){
		$('.sumir1').hide();
		$('.sumir2').show();
	}
	else if($("#escolha3").is(":checked")){
		$('.sumir1').show();
		$('.sumir2').show();
	}
	
	$('#escolha1').click(function(){
		$('.sumir1').show();
		$('.sumir2').hide();
	});
	$('#escolha2').click(function(){
		$('.sumir1').hide();
		$('.sumir2').show();
	});	
	$('#escolha3').click(function(){
		$('.sumir1').show();
		$('.sumir2').show();
	});	

});	
</script>

<?php 
$posteres = $GLOBALS["posteres"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 
$participantes = $GLOBALS["participantes"];

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
	$rows_linhas = count($linhas_tematicas);


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
							$item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_posteres&id_linha_tematica=".$linhas_tematicas[$k]['id']."\">- ".$linhas_tematicas[$k]['titulo'];
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
                            $item = "<a href=\"controle.php?ctrl=relatorio&acao=listar_posteres&id_linha_tematica=".$linhas_tematicas[$i]['id']."\">".$linhas_tematicas[$i]['titulo'];
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
<div>
<?php
	if(!empty($posteres)){
		$qtde_poster_online = 0;
		$qtde_poster_presencial = 0; 
        foreach($posteres as $poster){
			if($poster["tipo_poster"] == 1){ 
                $qtde_poster_online++;
            }elseif($poster["tipo_poster"] == 2){
                $qtde_poster_presencial++;
            }        
        }
	}        
?>
<input type="radio" name="tipo_poster" id="escolha3" value="3" checked="checked" /> Todos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="tipo_poster" id="escolha1" value="1" /> Online (<?php print $qtde_poster_online;?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="tipo_poster" id="escolha2" value="2" /> Presencial (<?php print $qtde_poster_presencial;?>)

</div>
<?php 
if(!empty($posteres)){
	for($i=0; $i<=($rows_linhas-1); $i++){
		foreach($posteres as $poster){
			if($linhas_tematicas[$i]["id"] == $poster["id_linha_tematica"]){
			?>
                <hr style="border-bottom:#0066cc 2px dotted; margin:20px 0px;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>" />
				<div style="float:left; margin-bottom:10px; /*border:1px dashed #F00;*/ width:750px;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>">
					Linha Tem&aacute;tica: <?php echo $linha_tematica["titulo"];
					?>
				</div>
                <?php if($poster["aceito"] == 'sim'){ ?>
					<div class="aceito a_sim <?php echo 'sumir'.$poster["tipo_poster"]; ?>">ACEITO</div>
				<?php } else { ?>
                	<div class="aceito a_nao <?php echo 'sumir'.$poster["tipo_poster"]; ?>">RECUSADO</div>
                <?php } //else ?>
                <div style="clear:both; margin:0; padding:0; border:0; line-height:0;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>"></div>
				<div style="text-transform:uppercase; font-weight:bold; margin-bottom:15px;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>"><?php echo $poster["titulo"]; ?></div>
                <div style="margin-bottom:10px;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>">
					<?php
						if($poster["tipo_poster"] == 1){ 
							echo "Online"; 
						}elseif($poster["tipo_poster"] == 2){
							echo "Presencial"; 
						}
					?>
                </div>
				<div style="margin-bottom:10px;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>">
					<?php 
						if(!empty($participantes)){
							foreach($participantes as $participante){
								if($participante["id"] == $poster["autor"]) {
									echo $participante["name"];
									echo "<br />".$participante["sigla_instituicao"];
								}//if
							}//foreach
							foreach($participantes as $participante){
								if($participante["id"] == $poster["co_autor"]) {
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
				<div style="margin-bottom:10px; text-align:justify;" class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>"><strong>Resumo:</strong> <?php echo $poster["resumo"]; ?></div>
				<div class="<?php echo 'sumir'.$poster["tipo_poster"]; ?>"><strong>Palavras-chave:</strong> <?php echo $poster["palavras_chave"]; ?></div>
			<?php
			}//if
		}//foreach 
	} // for
} //if
?>
<br />
<a href="#topo" style="float:right;">Topo</a>