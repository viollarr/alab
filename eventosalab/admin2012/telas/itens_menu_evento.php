<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $itens = $GLOBALS["registros"]; ?>
Itens de Menu - 
<a href="controle.php?ctrl=item_menu_evento&acao=abrir_edicao">Inserir Novo</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">ID</td>
        <td>Texto do Bot&atilde;o</td>
    	<td width="70" align="center">Ordem</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($itens)) {
	foreach($itens as $item){ ?>
		<tr>
			<td align="center"><?php print $item["id"]; ?></td>
			<td>
				<?php print $item["texto_botao"]; ?> 
				<?php if (!empty($item["texto_botao_en"])) echo " / ".$item["texto_botao_en"]; ?>
			</td>
			<td align="center"><?php print $item["ordem"]; ?></td>
			<td><a href="controle.php?ctrl=item_menu_evento&acao=abrir_edicao&id=<?php echo $item["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=item_menu_evento&acao=deletar&id=<?php echo $item["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este item de menu?');">Deletar</a></td>
		</tr>
	<?php } //foreach
}//if ?>
</table>