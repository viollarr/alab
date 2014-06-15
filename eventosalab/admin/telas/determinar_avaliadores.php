<style type="text/css">
	.linha_doutor:hover{background:#f4f1f3;}
</style>

<?php
$doutores = $GLOBALS["doutores"];

if(!empty($GLOBALS["msg_determinar_avaliadores"])){ ?>
	<div style="margin-bottom:30px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?=$GLOBALS["msg_determinar_avaliadores"]?></div>
<?php } //if
?>
<form action="controle.php" method="post" id="form_dados">
    <input type="hidden" name="ctrl" value="avaliacao" />
    <input type="hidden" name="acao" value="salvar_avaliadores" />
    <table class="tab_admin">
    	<tr style="background:#f4f1f3">
        	<td style="width:50px; text-align:center">#</td>
        	<td style="width:50px; text-align:center">ID</td>
        	<td>Nome</td>
        	<td style="width:120px; text-align:center">Avaliador</td>
        </tr>
        <?php
		$k = 1;
		foreach($doutores as $doutor) { 
			if($k % 15 == 0){ ?>
                <tr style="background:#f4f1f3">
                    <td style="width:50px; text-align:center">#</td>
                    <td style="width:50px; text-align:center">ID</td>
                    <td>Nome</td>
                    <td style="width:120px; text-align:center">Avaliador</td>
                </tr>
			<?php }//if
			?>
            <tr class="linha_doutor">
                <td style="text-align:center"><?=$k?></td>
                <td style="text-align:center"><?=$doutor["id"]?></td>
                <td><a href="controle.php?ctrl=participante&acao=abrir_edicao&id_participante=<?=$doutor["id"]?>"><?=$doutor["nome"]?></a></td>
                <td style="text-align:center">
                	<label><input type="radio" name="avaliador_<?=$doutor["id"]?>" value="sim" <?=($doutor["avaliador"] == "sim") ? "checked" : "";?> >&nbsp;Sim</label>
                    &nbsp;&nbsp;
                	<label><input type="radio" name="avaliador_<?=$doutor["id"]?>" value="nao" <?=($doutor["avaliador"] == "nao") ? "checked" : "";?> >&nbsp;N&atilde;o</label>
                </td>
            </tr>
        	<?php 
			$k++;
		}//foreach ?>
    </table>
    <input type="submit" value="Salvar"  class="botao_editar"/>
</form>