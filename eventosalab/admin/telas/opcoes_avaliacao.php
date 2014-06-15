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
                $data_inicial_periodo = str_replace("-", "", $periodo_avaliacao["data_inicial"]);
                $hoje = date("Ymd");
                if($hoje < $data_inicial_periodo){ ?>
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