<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $chamadas = $GLOBALS["registros"]; ?>
Chamadas<?php if(!empty($GLOBALS["titulo_tipo"])) print " de ".$GLOBALS["titulo_tipo"];?> - 
<a href="controle.php?ctrl=chamada&acao=abrir_edicao">Inserir Nova</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">ID</td>
        <td>Ordem</td>
        <?php if(empty($GLOBALS["titulo_tipo"])){ ?><td width="200">Tipo</td><?php }//if ?>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    </tr>
<?php if(!empty($chamadas)) {
	foreach($chamadas as $chamada){ ?>
		<tr>
			<td align="center"><?php print $chamada["id"]; ?></td>
			<td><?php print $chamada["ordem"]; ?>&ordf; chamada</td>
			<?php if(empty($GLOBALS["titulo_tipo"])){ 
				$tipos_chamada = array("inscricao"=>"Chamada de Inscrição", "trabalho"=>"Chamada de Trabalho");
				?>
            	<td><?php print $tipos_chamada[$chamada["tipo"]]; ?></td>
			<?php }//if ?>
			<td><a href="controle.php?ctrl=chamada&acao=abrir_edicao&id=<?php echo $chamada["id"];?>">Editar</a></td>
			<td><a href="controle.php?ctrl=chamada&acao=deletar&id=<?php echo $chamada["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar esta chamada?');">Deletar</a></td>
		</tr>
	<?php } //foreach
}//if ?>
</table>