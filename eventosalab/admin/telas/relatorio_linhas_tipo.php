<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$id_tipo_trabalho = $GLOBALS["id_tipo_trabalho"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 

$tipos_trabalho = array(
	2 => "comunicacoes_coordenadas",
	3 => "comunicacoes_individuais",
	4 => "posteres"
);
?>
<a name="topo"></a>Selecione a Linha Tem&aacute;tica<br />
<br />
<?php if(!empty($linhas_tematicas)){ ?>
    <table class="tab_admin">
        <tr class="tab_admin_head">
            <td>Linha Tem&aacute;tica</td>
            <td class="col_editar" colspan="2" style="width:230px; text-align:center">Relat&oacute;rio</td>
        </tr>
		<?php foreach($linhas_tematicas as $linha_tematica){ 
            /*
            print "<hr>Linha temática:<pre>";
                print_r($linha_tematica);
            print "</pre>";
            */
			$tipo = $tipos_trabalho[$id_tipo_trabalho];
			$link_titulo = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&id_linha_tematica=".$linha_tematica["id"]."'>".$linha_tematica["titulo"]."</a>";
			$link_exibir = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&id_linha_tematica=".$linha_tematica["id"]."'>Exibir</a>";
			$link_exibir_sem_resumo = "<a href='controle.php?ctrl=relatorio&acao=listar_".$tipo."&id_linha_tematica=".$linha_tematica["id"]."&sem_resumo=true'>Sem resumos</a>";
			?>
			<tr>
				<td><?=$link_titulo?></td>
				<td align="center" ><?=$link_exibir?></td>
				<td align="center" ><?=$link_exibir_sem_resumo?></td>
			</tr>
		<?php } //foreach ?>
    </table>
<?php }//if ?>
<br />
<a href="#topo" style="float:right;">Topo</a>