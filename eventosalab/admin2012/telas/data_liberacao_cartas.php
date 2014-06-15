<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/jquery.maskedinput.js"></script>
<script language="JavaScript">
 jQuery(function($){  
    $("#data_inicial").mask("99/99/9999"); 
    $("#data_final").mask("99/99/9999"); 
	$("#data_liberacao").mask("99/99/9999"); 
 });
</script>

<?php 
$data_liberacao = $GLOBALS["data_liberacao"];
?>
Data de Libera&ccedil;&atilde;o das Cartas
<?php
if(!empty($GLOBALS["msg_ctrl_avaliacao"])){ ?>
	<div style="margin-bottom:10px; margin-top:10px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?=$GLOBALS["msg_ctrl_avaliacao"]?></div>
<?php } //if ?>
<form action="controle.php" method="post" id="form_dados">
  <input type="hidden" name="ctrl" value="evento" />
<input type="hidden" name="acao" value="salvar_data_liberacao" />
<?php
/*
<style type="text/css">
	#tabela_periodo_avaliacao, #tabela_periodo_avaliacao tr, #tabela_periodo_avaliacao td{border:0;}
	#tabela_periodo_avaliacao #data_inicial, #tabela_periodo_avaliacao #data_final{width:75px;}
</style>
*/
?>
<table class="tab_admin" id="tabela_periodo_avaliacao">
    <tr>
        <td width="108">
            Data:
      </td>
        <td>
        	<?php
			// Formatando a data: Ex.: 2011-03-31 -> 31/03/2011
			$arr_data = explode("-", $data_liberacao);
			$data_liberacao_format = $arr_data["2"] . "/" . $arr_data["1"] . "/" . $arr_data["0"];
            ?>
            <input type="text" name="data_liberacao" id="data_liberacao" value="<?php echo $data_liberacao_format; ?>"  class="formulario" style="width:80px; text-align:center;" />
        </td>
    </tr>
</table>
<input type="submit" value="Salvar"  class="botao_editar"/>
</form>