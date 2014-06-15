<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

Avalia&ccedil;&atilde;o dos Trabalhos Inscritos
<br />
<br />
<table class="tab_admin">
	<tr>
    	<td>
        	<ul style="margin-left:15px;">
                <!--<li><a href="controle.php?ctrl=avaliacao&acao=alocar_pareceristas">Alocar Pareceristas</a></li>-->
                <li><a href="controle.php?ctrl=avaliacao&acao=determinar_avaliadores">Determinar Avaliadores</a></li>
                <?php
                $periodo_avaliacao = $GLOBALS["periodo_avaliacao"];
                $data_inicial_periodo = explode("-",$periodo_avaliacao["data_inicial"]);
				$dia_inicial = $data_inicial_periodo[2];
				$mes_inicial = $data_inicial_periodo[1];
				$ano_inicial = $data_inicial_periodo[0];
                $hoje = date("Ymd");
				$data_inicial_periodo = $ano_inicial.$mes_inicial.$dia_inicial;
                if($hoje >= $data_inicial_periodo){ ?>
                    <li><a href="controle.php?ctrl=avaliacao&acao=relacionar_avaliador_trabalhos">Relacionar avaliadores com os trabalhos</a></li>
                <?php }else { ?>
                    <li>Relacionar avaliadores com os trabalhos (Altera&ccedil;&otilde;es n&atilde;o s&atilde;o mais permitidas pois o Período de Avaliação já se iniciou.)</li>
                <?php }//else?>
                <li><a href="controle.php?ctrl=avaliacao&acao=periodo_avaliacao">Definir Período de Avaliação</a></li>
                <li><a href="controle.php?ctrl=avaliacao&acao=ranking_trabalhos">Verificar <em>Ranking</em> dos Trabalhos</a></li>
            </ul>
        </td>
    </tr>
</table>