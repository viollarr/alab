<?php
$periodo_avaliacao = $GLOBALS["periodo_avaliacao"];
$periodo_data_inicial = str_replace("-", "", $periodo_avaliacao["data_inicial"]);
$periodo_data_final = str_replace("-", "", $periodo_avaliacao["data_final"]);
$hoje = date("Ymd");

$exibir_indicar_avaliadores = $exibir_aceitar_trabalhos = FALSE;

if($hoje < $periodo_data_inicial && $hoje < $periodo_data_final){ 
	$exibir_indicar_avaliadores = TRUE;
}
if($hoje > $periodo_data_final && $hoje > $periodo_data_inicial){ 
	$exibir_aceitar_trabalhos = TRUE;
	$exibir_notas = TRUE;
}
?>
<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	#opcoes_avaliacao{margin-left:15px;}
	#opcoes_avaliacao li{width:250px;}
</style>

Avalia&ccedil;&atilde;o dos Trabalhos Inscritos
<br />
<br />
<table class="tab_admin">
	<tr>
    	<td>
        	<ul id="opcoes_avaliacao">
                <?php /* <li><a href="controle.php?ctrl=avaliacao&acao=periodo_avaliacao">Definir Período de Avaliação</a></li> */ ?>
                <li>Definir Período de Avaliação</li>

                <?php
				//$exibir_indicar_avaliadores = TRUE;
				if($exibir_indicar_avaliadores): ?>
	                <li><a href="controle.php?ctrl=avaliacao&acao=indicar_avaliadores">Indicar avaliadores para cada trabalho</a></li>
                <?php else: ?>
	                <li title="Somente é possível indicar avaliadores antes do período de avaliação se iniciar.">Indicar avaliadores para cada trabalho</li>
                <?php endif; ?>

                <?php 
				/*
				if($exibir_aceitar_trabalhos): ?>
	                <li><a href="controle.php?ctrl=avaliacao&acao=avaliacoes_trabalhos_queering">Aceitar/recusar trabalhos</a></li>
                <?php else: ?>
	                <li title="Somente é possível aceitar/recusar os trabalhos depois que o período de avaliação se encerrar.">Aceitar/recusar trabalhos</li>
                <?php endif; 
				*/ ?>
                <li>Aceitar/recusar trabalhos</li>

                <?php if($exibir_notas): ?>
	                <li><a href="controle.php?ctrl=avaliacao&acao=notas_trabalhos_queering">Exibir notas e quais foram aceitos/recusados</a></li>
                <?php else: ?>
	                <li title="Somente é possível verificar se um trabalho foi aceito depois que o período de avaliação se encerrar.">Exibir notas</li>
                <?php endif; ?>
            </ul>
        </td>
    </tr>
</table>