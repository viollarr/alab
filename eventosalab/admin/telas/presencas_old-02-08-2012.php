<?php
$participantes = $GLOBALS["participantes"];

/*
print "<pre>";
	print_r($participantes);
print "</pre>";
/**/
?>
<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.destacar_linha:hover{background:#F4F1F3;}

	.btn_debatedores{border-radius: 5px; border:1px solid #069; font-size:12px; padding:3px 5px; color:#069;}
	.btn_debatedores:hover{cursor:pointer; background:#069; color:#FFFFFF; text-decoration:none;}
</style>

<div>Controle de Presen&ccedil;as</div>
<?php if ($_SESSION['id_evento_admin'] != 28): ?>
	<div style="text-align:right;"><a href="controle.php?ctrl=presenca&acao=debatedores_simposio" class="btn_debatedores">Debatedores de Simp&oacute;sio</a></div>
<?php endif; ?>
<br />
<?php if(!empty($GLOBALS["msg_ctrl_presenca"])){ ?>
	<div style="margin-bottom:10px; margin-top:10px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?=$GLOBALS["msg_ctrl_presenca"]?></div>
<?php } //if ?>
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td style="width:60px; text-align:center;">#</td>
    	<td style="width:60px; text-align:center;">ID</td>
    	<td>Participante</td>
    	<td style="width:100px; text-align:center;">Presen&ccedil;as</td>
    </tr>
    <?php 
	$i = 1;
	foreach($participantes as $participante){ ?>
        <tr class="destacar_linha">
            <td style="text-align:center;"><?php echo $i; ?></td>
            <td style="text-align:center;"><?php echo $participante['id']; ?></td>
            <td><?php echo $participante['nome']; ?></td>
            <td style="text-align:center;"><a href="controle.php?ctrl=presenca&acao=presencas_participante&id=<?php echo $participante['id']; ?>">Exibir</a></td>
        </tr>
		<?php if($i % 10 == 0){ ?>
            <tr class="tab_admin_head">
                <td style="width:60px; text-align:center;">#</td>
                <td style="width:60px; text-align:center;">ID</td>
                <td>Participante</td>
                <td style="width:100px; text-align:center;">Presen&ccedil;as</td>
            </tr>
        <?php }//if 
		$i++;
	} //foreach ?>
</table>