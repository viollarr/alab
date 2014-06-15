<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $topicos = $GLOBALS["topicos"]; ?>
T&oacute;picos dos Simp&oacute;sios - 
<a href="controle.php?ctrl=topico_simposio&acao=abrir_edicao">Inserir Novo</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">ID</td>
    	<td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($topicos)) {
	foreach($topicos as $topico){ ?>
		<tr>
			<td align="center"><?php print $topico["id"]; ?></td>
			<td><?php print $topico["nome"]; ?></td>
			<td><a href="controle.php?ctrl=topico_simposio&acao=abrir_edicao&id=<?php echo $topico["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=topico_simposio&acao=deletar&id=<?php echo $topico["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este tópico?');">Deletar</a></td>
		</tr>
	<?php } //foreach
}//if ?>
</table>