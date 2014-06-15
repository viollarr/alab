<?php
$participantes = $GLOBALS['participantes'];
$view = $GLOBALS['view'];

$participantes_serializados = serialize($participantes);
/*
print "Participantes serializados: <pre>";
	print_r($participantes_serializados);
print "</pre>";
/**/
$participantes_serializados = str_replace("\"", "'", $participantes_serializados);
/*
print "Participantes serializados: <pre>";
	print_r($participantes_serializados);
print "</pre>";
/**/
?>

<style type="text/css">
	#btn_exportar_participantes{border-radius: 5px; border:1px solid #666; font-size:12px; padding:3px 5px; color:#069;}
	#btn_exportar_participantes:hover{cursor:pointer; background:#DFDFDF; color:#000000; text-decoration:underline;}
</style>

<div style="display:inline">
	Relat&oacute;rio de Participantes - <?php echo $view['label_tipo']; ?>
</div>
<div style="float:right;">
    <form action="controle.php" method="post" id="form_dados">
        <input type="hidden" name="ctrl" value="relatorio" />
        <input type="hidden" name="acao" value="exportar_participantes_excel" />
        <input type="hidden" name="participantes" value="<?php echo $participantes_serializados; ?>" />
        <input type="hidden" name="tipo_label" value="<?php echo $view['label_tipo']; ?>" />
		<input type="submit" value="Exportar para Excel" id="btn_exportar_participantes" />
    </form>
</div>
<div style="clear:both;"></div>
<br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td style="text-align:center; width:50px;">#</td>
    	<td>Nome</td>
    	<td>Email</td>
    </tr>
    <?php
	if(is_array($participantes)){
		$i = 1;
		foreach($participantes as $participante){ 
			/*
			print "Participante: <pre>";
				print_r($participante);
			print "</pre>";
			*/
			?>
			<tr>
				<td style="text-align:center;"><?php echo $i; ?></td>
				<td><?php echo $participante['nome']; ?></td>
				<td><?php echo $participante['email']; ?></td>
			</tr>
            <?php if($i % 10 == 0){ ?>
                <tr style="background:#F4F1F3;">
                    <td style="text-align:center; width:50px;">#</td>
                    <td>Nome</td>
                    <td>Email</td>
                </tr>
 		   	<?php }//if
			$i++;
		}//foreach
	}//if
	?>
</table>