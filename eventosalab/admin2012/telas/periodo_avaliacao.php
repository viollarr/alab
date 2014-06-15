<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	#msg_ctrl_avaliacao{margin-bottom:10px; margin-top:10px; border:1px solid #0099cc; padding:10px; background:#f1f1f1; display:none;}
</style>

<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/jquery.maskedinput.js"></script>
<script language="JavaScript">
 jQuery(function($){  
    $("#data_inicial").mask("99/99/9999"); 
    $("#data_final").mask("99/99/9999"); 
 });
</script>

<?php 
$periodo_avaliacao = $GLOBALS["periodo_avaliacao"]; 
?>
Per&iacute;odo de Avalia&ccedil;&atilde;o de Trabalhos
<?php
if(!empty($GLOBALS["msg_ctrl_avaliacao"])){ ?>
	<script language="JavaScript">
		jQuery(function($){ 
			$('#msg_ctrl_avaliacao').show(500); 
		});
    </script>
	<div id="msg_ctrl_avaliacao"><?=$GLOBALS["msg_ctrl_avaliacao"]?></div>
<?php } //if ?>
<form action="controle.php" method="post" id="form_dados">
  <input type="hidden" name="ctrl" value="avaliacao" />
<input type="hidden" name="acao" value="salvar_periodo" />
<style type="text/css">
	#tabela_periodo_avaliacao, #tabela_periodo_avaliacao tr, #tabela_periodo_avaliacao td{border:0;}
	#tabela_periodo_avaliacao #data_inicial, #tabela_periodo_avaliacao #data_final{width:75px;}
</style>
<table class="tab_admin" id="tabela_periodo_avaliacao">
    <tr>
        <td width="108">
            Data inicial:
      </td>
        <td width="993">
        	<?php
			// Formatando a data: Ex.: 2011-03-31 -> 31/03/2011
			$data_inicial = explode("-", $periodo_avaliacao["data_inicial"]);
			$data_inicial_format = $data_inicial["2"] . "-" . $data_inicial["1"] . "-" . $data_inicial["0"];
            ?>
            <input type="text" name="data_inicial" id="data_inicial" value="<?php echo $data_inicial_format; ?>"  class="formulario" />
        </td>
    </tr>
    <tr>
        <td>
    Data final:</td>
        <td>
        	<?php
			// Formatando a data: Ex.: 2011-03-31 -> 31/03/2011
			$data_final = explode("-", $periodo_avaliacao["data_final"]);
			$data_final_format = $data_final["2"] . "-" . $data_final["1"] . "-" . $data_final["0"];
            ?>
            <input type="text" name="data_final" id="data_final" value="<?php echo $data_final_format; ?>"  class="formulario" />
        </td>
    </tr>
</table>
<input type="submit" value="Salvar"  class="botao_editar"/>
</form>