<?php
$participante = $GLOBALS["participante"];

/*
print "<pre>";
	print_r($participante);
print "</pre>";
/**/
?>
<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style>
	.categoria{margin-bottom:15px; border:1px solid #BBBBBB; padding:5px;}
	.categoria .titulo{font-size:16px;}
	.trabalhos{margin-left:30px;}
	.trabalhos .trabalho{font-weight:bold;}
</style>

<div style="margin-bottom:20px; /*border-bottom:1px dashed; width:215px;*/">
	Presen&ccedil;as - <strong><?php echo $participante['nome']; ?></strong>
</div>
<form action="controle.php" method="post" id="form_dados">
	<input type="hidden" name="ctrl" value="presenca" />
	<input type="hidden" name="acao" value="salvar" />
	<input type="hidden" name="id" value="<?php echo $participante["id"]; ?>" />
    
    <div class="categoria">
    	<?php
		// Presenças
		if(is_array($participante['presencas'])){
			foreach($participante['presencas'] as $presenca){ 
				if($presenca['tipo'] == 'ouvinte'){
					$presente = "";
					$presente = $presenca['presente'];
				} //if
			} //foreach
		} //if
		// fim: Presenças
        ?>
	    <div class="titulo">Ouvinte</div>Presente? <label><input type="radio" name="ouvinte" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="ouvinte" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
    </div>
        
    <?php if(!empty($participante['posteres'])) { ?>
        <div class="categoria">
            <div class="titulo">Apresenta&ccedil;&atilde;o de P&ocirc;ster</div>
            <ul class="trabalhos">
                <?php foreach($participante['posteres'] as $trabalho){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $trabalho['id']  &&  $presenca['tipo'] == 'poster'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($trabalho['titulo']); ?></div>
                        Presente? <label><input type="radio" name="poster_<?php echo $trabalho['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="poster_<?php echo $trabalho['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="posteres[]" value="<?php echo $trabalho['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['paper'])) { ?>
        <div class="categoria">
            <div class="titulo">Apresenta&ccedil;&atilde;o de P&ocirc;ster</div>
            <ul class="trabalhos">
                <?php foreach($participante['paper'] as $trabalho){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $trabalho['id']  &&  $presenca['tipo'] == 'paper'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($trabalho['titulo']); ?></div>
                        Presente? <label><input type="radio" name="paper_<?php echo $trabalho['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="paper_<?php echo $trabalho['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="papers[]" value="<?php echo $trabalho['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    <input type="submit" value="Salvar" class="botao_editar" />
</form>
