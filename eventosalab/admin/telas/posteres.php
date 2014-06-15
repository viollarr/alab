<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $posteres = $GLOBALS["registros"]; ?>
P&ocirc;steres
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
        <td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($posteres)) {
	$num = 1;
	foreach($posteres as $poster){ ?>
		<tr>
			<td align="center"><?=$num?></td>
			<td><?php print $poster["titulo"]; ?></td>
			<td><a href="controle.php?ctrl=poster&acao=abrir_edicao&id=<?php echo $poster["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=poster&acao=deletar&id=<?php echo $poster["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este pôster?');">Deletar</a></td>
		</tr>
		<?php 
		$num++;
	} //foreach
}//if ?>
</table>