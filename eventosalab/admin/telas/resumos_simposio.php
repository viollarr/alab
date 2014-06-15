<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$resumos = $GLOBALS["resumos_simposio"]; 
$simposio = $GLOBALS["simposio"]; 
?>
Resumos do Simp&oacute;sio <?php echo $simposio["titulo_sessao"]; ?>
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
        <td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php 
	$num = 1;
	foreach($resumos as $resumo){ ?>
	<tr>
    	<td align="center"><?=$num?></td>
        <td><?php print $resumo["titulo"]; ?></td>
    	<td><a href="controle.php?ctrl=resumo&acao=abrir_edicao&id=<?php echo $resumo["id"];?>&id_simposio=<?php echo $simposio["id"] ?>">Editar</a></td>
    	<td><a href="controle.php?ctrl=resumo&acao=deletar&id=<?php echo $resumo["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este resumo?');">Deletar</a></td>
    </tr>
	<?php 
	$num++;
} //foreach ?>
</table>