<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $tipos = $GLOBALS["tipos"]; ?>
Relat&oacute;rios
<br /><br />
<table class="tab_admin">
	<tr class="tab_admin_head">
    	<td>Tipo de Relatório</td>
    	<td class="col_editar" colspan="2" style="width:350px; text-align:center">Listar</td>
    </tr>
    <tr>
        <td><a href="controle.php?ctrl=relatorio&acao=filtros_participantes">Participantes</a></td>
        <td colspan="2" style="text-align:center"><a href="controle.php?ctrl=relatorio&acao=filtros_participantes">Filtros</a></td>
    </tr>
<?php if(!empty($tipos)) {
	$nomes_tipos = array("posteres"=>"Pôsteres", "papers"=>"Papers");
		
	foreach($tipos as $tipo){ 
		$link_nome_tipo  = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."'>".$nomes_tipos[$tipo]."</a>";
		$link_todos  = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."'>Todos</a>";
		$link_linhas = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&exibir_linhas=1'>Linhas Tem&aacute;ticas</a>";
		//$tipo_poster = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&apresentacao=1'>Apresentação</a>";
		
		$link_todos_sem_resumos  = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&sem_resumo=1'>Sem resumos (.doc)</a>";
		//$link_linhas_sem_resumos = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&exibir_linhas=1&sem_resumos=1'>Sem resumos (.doc)</a>";
		
		if( ($tipo == "papers") || ($tipo == "posteres") ) { ?>
            <tr>
                <td><?=$link_nome_tipo?></td>
                <td colspan="2" style="text-align:center; padding:0; margin:0;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr style="text-align:left; ">
                            <td style="border:0; padding-left:30px;">
								<ul>
									<li><?=$link_todos?></li>
                                    <li><?=$link_todos_sem_resumos?></li>
                                </ul>
                            </td>
                            <td style="border:0; border-left:1px solid #000000; padding-left:30px;">
								<ul>
									<li><?=$link_linhas?></li>
                                    <?php
										//if($tipo == "posteres"){ 
									?>
											<!--<li><?=$tipo_poster?></li> -->
									<?php
										//}
									?>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
		<?php }//if
	} //foreach
}//if ?>
<tr>
    <td><a href="controle.php?ctrl=relatorio&acao=filtros_aceitos">Aceitos</a></td>
    <td colspan="2" style="text-align:center"><a href="controle.php?ctrl=relatorio&acao=filtros_aceitos">Filtros</a></td>
</tr>
</table>