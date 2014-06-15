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
    
    <?php if($participante['id_tipo_participante'] == 10){ ?>
        <div class="categoria">
			<?php
            // Presenças
            if(is_array($participante['presencas'])){
                foreach($participante['presencas'] as $presenca){ 
                    if($presenca['tipo'] == 'comissao'){
                        $presente = "";
                        $presente = $presenca['presente'];
                    } //if
                } //foreach
            } //if
            // fim: Presenças
            ?>
            <div class="titulo">Comiss&atilde;o Acad&ecirc;mico-Cient&iacute;fica</div>Presente? <label><input type="radio" name="comissao" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="comissao" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['simposios_coordenados'])) { ?>
        <div class="categoria">
            <div class="titulo">Coordena&ccedil;&atilde;o de Simp&oacute;sio</div>
            <ul class="trabalhos">
                <?php foreach($participante['simposios_coordenados'] as $simposio){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $simposio['id']  &&  $presenca['tipo'] == 'coordenacao_simposio'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($simposio['titulo_sessao']); ?></div>
                        Presente? <label><input type="radio" name="simposio_<?php echo $simposio['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="simposio_<?php echo $simposio['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="simposios_coordenados[]" value="<?php echo $simposio['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['trabalhos_em_simposio'])) { ?>
        <div class="categoria">
            <div class="titulo">Trabalho em Simp&oacute;sio</div>
            <ul class="trabalhos">
                <?php foreach($participante['trabalhos_em_simposio'] as $trabalho){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $trabalho['id']  &&  $presenca['tipo'] == 'trabalho_em_simposio'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($trabalho['titulo']); ?></div>
                        Presente? <label><input type="radio" name="trabalho_em_simposio_<?php echo $trabalho['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="trabalho_em_simposio_<?php echo $trabalho['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="trabalhos_em_simposio[]" value="<?php echo $trabalho['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['sessoes_coordenadas'])) { ?>
        <div class="categoria">
            <div class="titulo">Coordena&ccedil;&atilde;o de Sess&atilde;o</div>
            <ul class="trabalhos">
                <?php foreach($participante['sessoes_coordenadas'] as $sessao){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $sessao['id']  &&  $presenca['tipo'] == 'coordenacao_sessao'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($sessao['titulo_sessao']); ?></div>
                        Presente? <label><input type="radio" name="sessao_coordenada_<?php echo $sessao['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="sessao_coordenada_<?php echo $sessao['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="sessoes_coordenadas[]" value="<?php echo $sessao['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['comunicacoes_individuais'])) { ?>
        <div class="categoria">
            <div class="titulo">Apresenta&ccedil;&atilde;o de Comunica&ccedil;&atilde;o Individual</div>
            <ul class="trabalhos">
                <?php foreach($participante['comunicacoes_individuais'] as $trabalho){ 
					// Presenças
					if(is_array($participante['presencas'])){
						foreach($participante['presencas'] as $presenca){ 
							if($presenca['id_trabalho'] == $trabalho['id']  &&  $presenca['tipo'] == 'comunicacao_individual'){
								$presente = "";
								$presente = $presenca['presente'];
							} //if
						} //foreach
					} //if
					// fim: Presenças
					?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($trabalho['titulo']); ?></div>
                        Presente? <label><input type="radio" name="comunicacao_individual_<?php echo $trabalho['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="comunicacao_individual_<?php echo $trabalho['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="comunicacoes_individuais[]" value="<?php echo $trabalho['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
    <?php if(!empty($participante['comunicacoes_coordenadas'])) { ?>
        <div class="categoria">
            <div class="titulo">Apresenta&ccedil;&atilde;o de Comunica&ccedil;&atilde;o Coordenada</div>
            <ul class="trabalhos">
                <?php foreach($participante['comunicacoes_coordenadas'] as $trabalho){ 
					// Presenças
                    if(is_array($participante['presencas'])){
                        foreach($participante['presencas'] as $presenca){ 
                            if($presenca['id_trabalho'] == $trabalho['id']  &&  $presenca['tipo'] == 'comunicacao_coordenada'){
                                $presente = "";
                                $presente = $presenca['presente'];
                            } //if
                        } //foreach
                    } //if
					// fim: Presenças
                    ?>
                    <li>
                        <div class="trabalho"><?php echo mb_strtoupper($trabalho['titulo']); ?></div>
                        Presente? <label><input type="radio" name="comunicacao_coordenada_<?php echo $trabalho['id']; ?>" value="sim" <?php echo ($presente == 'sim') ? "checked" : ""; ?> /> Sim&nbsp;&nbsp;</label><label><input type="radio" name="comunicacao_coordenada_<?php echo $trabalho['id']; ?>" value="nao" <?php echo ($presente == 'nao') ? "checked" : ""; ?> /> N&atilde;o</label>
                        <input type="hidden" name="comunicacoes_coordenadas[]" value="<?php echo $trabalho['id']; ?>" />
                    </li>
                <?php } // foreach ?>
            </ul>
        </div>
    <?php }//if ?>
    
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
    <input type="submit" value="Salvar" class="botao_editar" />
</form>
