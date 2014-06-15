<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $linhas = $GLOBALS["registros"]; ?>
Linhas Tem&aacute;ticas - 
<a href="controle.php?ctrl=linha_tematica&acao=abrir_edicao">Inserir Nova</a>
<br />
<br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">ID</td>
    	<td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($linhas)) {
	foreach($linhas as $linha){ ?>
		<tr>
			<td align="center"><?php print $linha["id"]; ?></td>
			<td><?php print $linha["titulo"]; ?></td>
			<td><a href="controle.php?ctrl=linha_tematica&acao=abrir_edicao&id=<?php echo $linha["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=linha_tematica&acao=deletar&id=<?php echo $linha["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar esta linha temática?');">Deletar</a></td>
		</tr>
	<?php } //foreach
}//if ?>
</table>