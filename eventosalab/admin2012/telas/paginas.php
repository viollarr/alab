<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $paginas = $GLOBALS["registros"]; ?>
P&aacute;ginas - <a href="controle.php?ctrl=pagina&acao=abrir_edicao">Inserir Nova</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
        <td>T&iacute;tulo</td>
    	<td class="col_editar">Editar</td>
    </tr>
<?php 
if(!empty($paginas)) {
	$num = 1;
	foreach($paginas as $pagina){ ?>
		<tr>
			<td align="center"><?php echo $num; ?></td>
			<td><?php echo $pagina["titulo"]; ?></td>
			<td><a href="controle.php?ctrl=pagina&acao=abrir_edicao&id=<?php echo $pagina["id"]; ?>">Editar</a></td>
		</tr>
		<?php 
		$num++;
	}
} ?>
</table>