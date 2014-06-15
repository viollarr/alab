<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<div>
	<div style="display:inline">Selecione o tipo de trabalho</div>
    <div style="display:inline; float:right"><!--<a href="controle.php?ctrl=tipo_trabalho&acao=listar">Incluir outros tipos de trabalho</a>--></div>
</div>
<br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td>Nome</td>
    </tr>
    <?php
	$tipos_trabalho = $GLOBALS["tipos_trabalhos_equipe"];
	
	foreach($tipos_trabalho as $tipo){ ?>
	<tr>
    	<td>
        	<a href="controle.php?ctrl=<?php echo $tipo["tabela"];?>&acao=listar">
				<?php echo $tipo["nome"];?>
            </a>
        </td>
    </tr>
    <?php }//foreach ?>
</table>