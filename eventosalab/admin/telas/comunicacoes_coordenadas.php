<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

Comunica&ccedil;&otilde;es Coordenadas
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td class="col_id">#</td>
    	<td>Nome</td>
    	<td class="col_editar">Editar</td>
    	<td class="col_deletar">Deletar</td>
    	<td width="80">Resumos</td>
    </tr>
    <?php
	$registros = $GLOBALS["lista_comunicacao_coordenada"];
	
	$num = 1;
	foreach($registros as $registro){ ?>
        <tr>
            <td align="center"><?=$num?></td>
            <td><?php echo $registro["titulo_sessao"];?></td>
            <td><a href="controle.php?ctrl=comunicacao_coordenada&acao=abrir_edicao&id=<?php echo $registro["id"];?>">Editar</a></td>
            <td><a href="controle.php?ctrl=comunicacao_coordenada&acao=deletar&id=<?php echo $registro["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar esta comunicação coordenada?');">Deletar</a></td>
            <td><a href="controle.php?ctrl=comunicacao_coordenada&acao=listar_resumos&id=<?php echo $registro["id"];?>">Resumos</a></td>
        </tr>
		<?php 
        $num++;
	}//foreach ?>
</table>