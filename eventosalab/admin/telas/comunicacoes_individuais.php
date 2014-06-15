<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $comunicacoes = $GLOBALS["registros"]; ?>
Comunica&ccedil;&otilde;es Individuais
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id" style="width:50px;">#</td>
        <td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($comunicacoes)) {
	$num = 1;
	foreach($comunicacoes as $comunicacao){ ?>
		<tr>
			<td align="center"><?=$num?></td>
			<td><?php print $comunicacao["titulo"]; ?></td>
			<td><a href="controle.php?ctrl=comunicacao_individual&acao=abrir_edicao&id=<?php echo $comunicacao["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=comunicacao_individual&acao=deletar&id=<?php echo $comunicacao["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar esta comunicação individual?');">Deletar</a></td>
		</tr>
		<?php 
		$num++;
	} //foreach
}//if ?>
</table>