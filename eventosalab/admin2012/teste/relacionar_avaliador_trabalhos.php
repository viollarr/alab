<link href="telas/css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css"/>
<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/ui/jquery-ui-1.8.9.custom.js"></script>

<script>
	$(document).ready(function() {
		$("#accordion").accordion();
	});
</script>

<div id="accordion">
	<?php
    /*******************
    * Linhas Temáticas *
    ********************/
    $linhas_tematicas = $GLOBALS["linhas_tematicas"];
    foreach($linhas_tematicas as $linha_tematica) { ?>
        <h3>
            <a href="#"><?=$linha_tematica["titulo"]?></a>
        </h3>
        <div id="trabalhos_linha">
            <div style="margin-bottom:15px;">
                <strong>Trabalhos Inscritos:</strong>
            </div>
            <div>
                P&ocirc;steres
                <div>
                    <?php
                    $posteres = $GLOBALS["posteres"];
                    foreach($posteres as $poster) { ?>
                    	<input type="checkbox" name="resumos[]" value="<?=$poster["id"]?>">&nbsp;<?=$poster["titulo"]?>
                    <?php }//foreach ?>
                </div>
            </div>
            <div>
                - Comunicações Individuais
                <div>
                    --- Individual 1<br />
                    --- Individual 2<br />
                    --- Individual 3<br />
                </div>
            </div>
            <div>
                - Comunicações Coordenadas
                <div>
                    --- Coordenada 1<br />
                    --- Coordenada 2<br />
                    --- Coordenada 3<br />
                </div>
            </div>
        </div>
    <?php }//foreach 
    /************************
    * Fim: Linhas Temáticas *
    *************************/
	?>
</div>