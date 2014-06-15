<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $papers = $GLOBALS["registros"]; ?>
Papers
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
        <td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($papers)) {
	$num = 1;
	foreach($papers as $paper){ ?>
		<tr>
			<td align="center"><?=$num?></td>
			<td><?php print $paper["titulo"]; ?></td>
			<td><a href="controle.php?ctrl=paper&acao=abrir_edicao&id=<?php echo $paper["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=paper&acao=deletar&id=<?php echo $paper["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este pôster?');">Deletar</a></td>
		</tr>
		<?php 
		$num++;
	} //foreach
}//if ?>
</table>