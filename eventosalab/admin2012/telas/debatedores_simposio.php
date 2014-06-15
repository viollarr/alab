<?php 
$participantes = $GLOBALS["debatedores"];

/*
print "<br /><br />Debatedores: <pre>";
	print_r($participantes);
print "</pre>";
/**/
?>
<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.destacar_linha:hover{background:#F4F1F3;}
</style>

<div>Controle de Presen&ccedil;as - Debatedores de Simp&oacute;sio</div>
<br />
<?php 
if(!empty($GLOBALS["msg_ctrl_presenca"])){ ?>
	<div style="margin-bottom:10px; margin-top:10px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?=$GLOBALS["msg_ctrl_presenca"]?></div>
<?php } //if 
?>
<form action="controle.php" method="post" id="form_dados">
	<input type="hidden" name="ctrl" value="presenca" />
	<input type="hidden" name="acao" value="salvar_presencas_debatedores_simposio" />

    <table class="tab_admin">
        <tr class="tab_admin_head">
            <td style="width:60px; text-align:center;">#</td>
            <td style="width:60px; text-align:center;">ID</td>
            <td>Participante</td>
        </tr>
        <?php 
        $i = 1;
        $j = 0;
        foreach($participantes as $participante){ ?>
            <tr class="destacar_linha">
                <td style="text-align:center;"><?php echo $i; ?></td>
                <td style="text-align:center;"><?php echo $participante['id']; ?></td>
                <td>
                    <b><?php echo $participante['nome']; ?></b>
                    <div>
                        <ul style="margin-left:19px;">
                            <?php foreach($participante['simposios'] as $simposio){ ?>
                                <li>
                                    <?php echo $simposio['titulo_sessao'];?>
                                    <?php //echo " (".$simposio['presenca'].") ";?>
                                    <br />
                                    Presente: 
                                    <label><input type="radio" name="presenca_<?php echo $j ; ?>" value="sim" <?php if($simposio['presenca']=='sim') echo "checked='checked'"; ?> /> Sim</label>&nbsp;
                                    <label><input type="radio" name="presenca_<?php echo $j ; ?>" value="nao" <?php if($simposio['presenca']=='nao') echo "checked='checked'"; ?> /> N&atilde;o</label>
                                    <input type="hidden" name="presencas[]" value="<?php echo $j; ?>|<?php echo $participante['id']; ?>|<?php echo $simposio['id'];?>" />
                                </li>
                            	<?php 
								$j++;
							} //foreach ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php if($i % 10 == 0){ ?>
                <tr class="tab_admin_head">
                    <td style="width:60px; text-align:center;">#</td>
                    <td style="width:60px; text-align:center;">ID</td>
                    <td>Participante</td>
                </tr>
            <?php }//if 
            $i++;
        } //foreach ?>
    </table>
    <input type="submit" value="Salvar" class="botao_editar" />
</form>
