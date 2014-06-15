<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$simposios = $GLOBALS["simposios"];
$topicos = $GLOBALS["topicos"];
?>
Simp&oacute;sios - 
<a href="controle.php?ctrl=simposio&acao=abrir_edicao">Inserir Novo</a>
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
    	<td>T&iacute;tulo</td>
    	<td>T&oacute;pico</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    	<td width="80">Resumos</td>
    </tr>
    <?php
	$num = 1;
	foreach($simposios as $simposio){ ?>
	<tr>
    	<td align="center"><?=$num?></td>
    	<td><?php echo (!empty($simposio["titulo_sessao"])) ? $simposio["titulo_sessao"] : "<b>Ainda Sem Título</b>";?></td>
    	<td>
			<?php 
			foreach($topicos as $topico){
				if($topico["id"]==$simposio["id_topico"]) echo $topico["nome"];
			}//foreach
			?>
        </td>
    	<td><a href="controle.php?ctrl=simposio&acao=abrir_edicao&id=<?php echo $simposio["id"];?>">Editar</a></td>
    	<td><a href="controle.php?ctrl=simposio&acao=deletar&id=<?php echo $simposio["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este simpósio?');">Deletar</a></td>
    	<td><a href="controle.php?ctrl=simposio&acao=listar_resumos&id_simposio=<?php echo $simposio["id"];?>">Resumos</a></td>
    </tr>
	    <?php 
		$num++;
	}//foreach ?>
</table>