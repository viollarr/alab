<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $admins = $GLOBALS["registros"]; ?>
Administradores - <a href="controle.php?ctrl=administrador&acao=abrir_edicao">Inserir Novo</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
        <td>Login</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php 
if(!empty($admins)) {
	$num = 1;
	foreach($admins as $admin) { ?>
		<tr>
			<td align="center"><?php echo $num; ?></td>
			<td><?php echo $admin["login"]; ?></td>
			<td><a href="controle.php?ctrl=administrador&acao=abrir_edicao&id=<?php echo $admin["ID"]; ?>">Editar</a></td>
			<td><a href="controle.php?ctrl=administrador&acao=deletar&id=<?php echo $admin["ID"]; ?>" onclick="return confirm('Voc&ecirc; tem certeza que deseja deletar este administrador?');">Deletar</a></td>
		</tr>
		<?php 
		$num++;
	}
} ?>
</table>