<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.filtro{}
	.filtro label:hover{cursor:pointer; font-weight:bold;}
	.filtro input{margin-right:5px;}
</style>

<?php $tipos = $GLOBALS["tipos"]; ?>
Filtros
<br /><br />
<form action="controle.php" method="post" id="form_dados">
    <input type="hidden" name="ctrl" value="relatorio" />
    <input type="hidden" name="acao" value="listar_aceitos" />
    <?php /*
    <style type="text/css">
		#gerar_com_resumos{text-align:right; margin-top:-20px; margin-bottom:10px;}
		#gerar_com_resumos label{cursor:pointer;}
	</style>
	<div id="gerar_com_resumos">
    	Gerar:&nbsp;&nbsp;<label><input type="radio" name="gerar_com_resumos" value="true" checked="checked" /> <strong>com</strong> resumos</label>
    	&nbsp;<label><input type="radio" name="gerar_com_resumos" value="false" /> <strong>sem</strong> resumos</label>
    </div>
	*/ ?>
    <table class="tab_admin">
        <tr class="tab_admin_head">
            <td>Modalidades de resumos</td>
        </tr>
    <?php 
	if ($_SESSION['id_evento_admin'] == 28) {
		$modalidades = array(
			"comunicacao_individual" => "Resumo de Comunica&ccedil;&atilde;o Individual",
			"coordenada" => "Resumo de Sess&atilde;o Coordenada",
			"trabalho_em_coordenada" => "Resumo de Trabalho em Sess&atilde;o Coordenada"
		);
	} else {
		$modalidades = array(
			"comunicacao_individual"=>"Resumo de Comunica&ccedil;&atilde;o Individual",
			"poster"=>"Resumo de P&ocirc;ster",
			"coordenada"=>"Resumo de Sess&atilde;o Coordenada",
			"trabalho_em_coordenada"=>"Resumo de Trabalho em Sess&atilde;o Coordenada",
			"simposio"=>"Resumo de Simp&oacute;sio",
			"trabalho_em_simposio"=>"Resumo de Trabalho em Simp&oacute;sio"
		);
	}
    
    foreach($modalidades as $modalidade => $label){ ?>
        <tr class="filtro">
            <td>
                <label>
                    <input type="checkbox" name="filtros[]" value="<?php echo $modalidade;?>"> <?php echo $label;?>
                </label>
            </td>
        </tr>
    <?php } //foreach
    ?>
    </table>
	<input type="submit" value="Gerar relat&oacute;rio"  class="botao_editar"/>
</form>