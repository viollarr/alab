<?php
require_once("../conexao.php");
require_once("../check_user.php");
require_once("../check_lang.php");

$data_hoje = date('Y-m-d');
//$data_hoje="2011-02-01";

$sql_chamada = "SELECT data_fim 
                FROM ev_chamada 
                WHERE 
                        id_evento='" . $_SESSION['id_evento'] . "' 
                        AND tipo='trabalho' 
                        AND estado = 'ativa'
                ORDER BY ordem DESC LIMIT 1";
$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
$m_chamada = mysql_fetch_assoc($qr_chamada);
$ultima_chamada_trabalho = $m_chamada['data_fim'];
//$ultima_chamada_trabalho = "2011-01-25"; // teste

$sql_participante = "SELECT * FROM ev_participante WHERE id='" . $_SESSION['id_participante'] . "'";
$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
$mostrar = mysql_fetch_array($qr_participante);
$id_tipo_participante = $mostrar['id_tipo_participante'];
$modalidade_participacao = $mostrar['modalidade_participacao'];
$passaporte = $mostrar['passaporte'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Sistema de eventos ALAB</title>
        <link rel="stylesheet" href="../css/template.css" type="text/css" />

        <script type="text/javascript" src="../js/jquery.js"></script> 
        <script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

    </head>

    <body>
        <div id="tudo">

            <div id="header">
                <img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />  
            </div>
            <div id="menu_idiomas"><a href="principal.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="principal.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
            <?php require("menu_participante.php"); ?>
            <p>&nbsp;</p>
            <div class="clear"></div>

            <div id="centro">
                <div id="artigo">

                    <?php if ($modalidade_participacao == 1) {//1 -> com trabalho //1 -> ï¿½ associado alab  ?>

                        <span class="txt_categorias"><strong><?php techo('Inscri&ccedil;&otilde;es com trabalho', 'Registration with panel/paper proposal(s)'); ?></strong></span>
                        <div id="box_trabalhos">		

                            <?php
                            ///////////////////////////////////////
                            // Verificar quantidade de trabalhos //
                            ///////////////////////////////////////

                            $qtd_trabalhos_cadastrados = 0;
                            $trabalhos_cadastrados = array();
                            $j = 0;

                            // Autor: Pï¿½ster, Comunicaï¿½ï¿½o Individual, resumo de Comunic. Coordenada e resumo de Simpï¿½sio
                            $sql = "SELECT r.id, r.id_tipo_trabalho, r.titulo 
				FROM ev_resumo r, ev_participante_resumo pr
				WHERE pr.id_participante = {$_SESSION['id_participante']} AND pr.id_resumo = r.id AND pr.tipo_participante = 'autor' ORDER BY r.id ASC";
                            $result = mysql_query($sql, $conexao);

                            while ($resumo = mysql_fetch_array($result)) {
                                $trabalhos_cadastrados[$j]["id"] = $resumo["id"];
                                $trabalhos_cadastrados[$j]["id_tipo_trabalho"] = $resumo["id_tipo_trabalho"];
                                $trabalhos_cadastrados[$j]["titulo"] = $resumo["titulo"];
                                $trabalhos_cadastrados[$j]["eh_autor"] = true;
                                $j++;
                            } //while
                            // Co-autor: Pï¿½ster, Comunicaï¿½ï¿½o Individual, resumo de Comunic. Coordenada e resumo de Simpï¿½sio
                            $sql = "SELECT r.id, r.id_tipo_trabalho, r.titulo 
				FROM ev_resumo r, ev_participante_resumo pr
				WHERE pr.id_participante = {$_SESSION['id_participante']} AND pr.id_resumo = r.id AND pr.tipo_participante = 'coautor' ORDER BY r.id ASC";
                            $result = mysql_query($sql, $conexao);
                            while ($resumo = mysql_fetch_array($result)) {
                                $trabalhos_cadastrados[$j]["id"] = $resumo["id"];
                                $trabalhos_cadastrados[$j]["id_tipo_trabalho"] = $resumo["id_tipo_trabalho"];
                                $trabalhos_cadastrados[$j]["titulo"] = $resumo["titulo"];
                                $trabalhos_cadastrados[$j]["eh_co_autor"] = true;
                                $j++;
                            }//while
                            // Coordenador de Comunicaï¿½ï¿½o Coordenada
                            $sql = "SELECT id, titulo_sessao FROM ev_comunicacao_coordenada 
			WHERE id_coordenador='" . $_SESSION['id_participante'] . "' ORDER BY id ASC";
                            $result = mysql_query($sql, $conexao);
                            while ($resumo = mysql_fetch_array($result)) {
                                $trabalhos_cadastrados[$j]["id"] = $resumo["id"];
                                $trabalhos_cadastrados[$j]["titulo"] = $resumo["titulo_sessao"];
                                $trabalhos_cadastrados[$j]["id_tipo_trabalho"] = 2;
                                $trabalhos_cadastrados[$j]["eh_coordenador"] = true;
                                $j++;
                            }//while
                            // Coordenador de Simpï¿½sio
                            $sql = "SELECT s.id, s.titulo_sessao, sp.ordem 
			FROM ev_simposio_coordenador sp, ev_simposio s
			WHERE 
				id_participante = '" . $_SESSION['id_participante'] . "'
				AND sp.id_simposio = s.id
			ORDER BY id ASC";
                            $result = mysql_query($sql, $conexao);
                            while ($resumo = mysql_fetch_array($result)) {
                                $trabalhos_cadastrados[$j]["id"] = $resumo["id"];
                                $trabalhos_cadastrados[$j]["titulo"] = $resumo["titulo_sessao"];
                                $trabalhos_cadastrados[$j]["id_tipo_trabalho"] = 1;
                                $trabalhos_cadastrados[$j]["eh_coordenador"] = true;
                                $j++;
                            }//while

                            $qtd_trabalhos_cadastrados = $j;
                            //print "\$qtd_trabalhos_cadastrados: ".$qtd_trabalhos_cadastrados."</br>";
                            if ($qtd_trabalhos_cadastrados >= 2) {
                                ?>
                                <span class="txt_topico_tabela"><?php techo('Limite de cadastro de trabalhos alcan&ccedil;ado.', 'Limit papers sent achieved.'); ?>
                                    <br />
                                    <ul>
                                        <?php
                                        foreach ($trabalhos_cadastrados as $trabalho_cadastrado) {
                                            echo "<li>";
                                            switch ($trabalho_cadastrado["id_tipo_trabalho"]) {
                                                case 1:
                                                    if ($trabalho_cadastrado["eh_coordenador"])
                                                        techo("Coordenador do Simp&oacute;sio <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>. Caso ainda n&atilde;o tenha cadastrado os trabalhos do simp&oacute;sio ser&aacute; exibido um bot&atilde;o <b>Envie seu trabalho</b> abaixo.", "Coordinator of the Symposium <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>. If you have not registered the paper of the symposium, a <b>Send your paper</b> button will be displayed below.");
                                                    elseif ($trabalho_cadastrado["eh_autor"])
                                                        techo("Autor do trabalho <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> em um Simp&oacute;sio.", "Author of the paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> in a Symposium.");
                                                    elseif ($trabalho_cadastrado["eh_co_autor"])
                                                        techo("Co-autor do trabalho <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> em um Simp&oacute;sio.", "Co-author of the paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> in a Symposium.");
                                                    break;

                                                case 2:
                                                    if ($trabalho_cadastrado["eh_coordenador"])
                                                        techo("Coordenador da Comunica&ccedil;&atilde;o Coordenada <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.", "Coordinator of the panel <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.");
                                                    elseif ($trabalho_cadastrado["eh_autor"])
                                                        techo("Autor do trabalho <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> em uma Comunica&ccedil;&atilde;o Coordenada.", "Author of the paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> in a Panel.");
                                                    elseif ($trabalho_cadastrado["eh_co_autor"])
                                                        techo("Co-autor do trabalho <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> em uma Comunica&ccedil;&atilde;o Coordenada.", "Co-author of the paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b> in a Panel.");
                                                    break;

                                                case 3:
                                                    if ($trabalho_cadastrado["eh_autor"])
                                                        techo("Autor da Comunica&ccedil;&atilde;o Individual <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.", "Author of the Individual Paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.");
                                                    elseif ($trabalho_cadastrado["eh_co_autor"])
                                                        techo("Co-autor da Comunica&ccedil;&atilde;o Individual <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.", "Co-author of the Individual Paper <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.");
                                                    break;

                                                case 4:
                                                    if ($trabalho_cadastrado["eh_autor"])
                                                        echo "Autor do P&ocirc;ster <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.";
                                                    elseif ($trabalho_cadastrado["eh_co_autor"])
                                                        echo "Co-autor do P&ocirc;ster <b><span style=\"text-transform:uppercase\">" . $trabalho_cadastrado["titulo"] . "</span></b>.";
                                                    break;
                                            }
                                            echo "</li>";
                                        }//foreach 
                                        ?>
                                    </ul>
                                    <br />
                                    <?php techo('Para ver os detalhes dos trabalhos enviados clique em', 'To view details of papers sent click'); ?> <span class="menuinterno"><a href="resumos.php" title="<?php techo('Detalhes dos trabalhos enviados', 'Papers sent details'); ?>"><?php techo('RESUMOS ENVIADOS', 'PAPERS SENT'); ?></a></span>.</span>
                                <br />
                                <br />
                                <?php
                            } else { //if		
                                $sql_trabalhos = "SELECT t.id, t.nome, t.nome_en, t.descricao, t.descricao_en
							  FROM ev_evento_tipo_trabalho ev_t, ev_tipo_trabalho t
							  WHERE ev_t.id_evento = '" . $_SESSION['id_evento'] . "'  
							  AND t.id = ev_t.id_tipo_trabalho";
                                $qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());

                                //VERIFICA SE É COORDENADOR DE SIMPÓSIO
                                $sql_coordenador = "SELECT s.id, s.id_topico FROM ev_participante p, ev_simposio s, ev_simposio_coordenador sc
							  WHERE p.id='" . $_SESSION['id_participante'] . "'
							  AND sc.id_participante=p.id
							  AND sc.id_simposio=s.id";
                                $qr_coordenador = mysql_query($sql_coordenador, $conexao) or die(mysql_error());
                                $ln_coordenador_simposio = mysql_fetch_array($qr_coordenador);
                                $registro_coordenador = mysql_num_rows($qr_coordenador);

                                //print $registro_coordenador;

                                while ($mostrar_trabalho = mysql_fetch_array($qr_trabalho)) {

                                    // Verificar se já cadastrou resumos neste simpósio
                                    $result = mysql_query("SELECT id_simposio FROM ev_simposio_coordenador WHERE id_participante='" . $_SESSION['id_participante'] . "'", $conexao);
                                    $id_simposio_coord = "";
                                    $id_simposio_coord = mysql_fetch_array($result);
                                    $id_simposio_coord = $id_simposio_coord["id_simposio"];

                                    $result = mysql_query("SELECT id FROM ev_resumo WHERE id_simposio='" . $id_simposio_coord . "'", $conexao);
                                    $ids_resumos = mysql_fetch_array($result);

                                    if (empty($ids_resumos[0])) { // verifica se já é coordenador de algum simpósio
                                        if (( $mostrar_trabalho['id'] == 1) and ($registro_coordenador > 0)) { //idtrabalho 1 -> simposio 
                                            ?>
                                            <span class="txt_titulo_destaque"><?= $mostrar_trabalho['nome']; ?></span>
                                            <p class="txt_titulo_noticias_2"><?= $mostrar_trabalho['descricao']; ?></p>
                                            <?php if ($data_hoje <= $ultima_chamada_trabalho) { ?>
                                                <p><form action="trabalho.php" method="post">
                                                        <label>
                                                            <input type="submit" name="button2" id="button2" class="botao_trabalho" value="Envie seu trabalho" />
                                                            <input name="id_trabalho" type="hidden" value="<?= $mostrar_trabalho['id']; ?>" />
                                                            <input name="id_simposio" type="hidden" value="<? print $ln_coordenador_simposio['id']; //id do simposio  ?>" />
                                                            <input name="id_topico" type="hidden" value="<? print $ln_coordenador_simposio['id_topico']; //id do simposio  ?>" />
                                                        </label>
                                                    </form></p>
                                            <?php } else { ?>
                                                <p class="dados_obrigatorios"><?php techo('O prazo para envio de trabalho encerrou.', 'The deadline for papers is over.'); ?></p>
                                            <?php } //else ?>
                                            <p>&nbsp;</p>
                                            <?php
                                        }//if verifica coordenador 
                                    }//simposio
                                    //if (!empty($mostrar['passaporte']) && strlen($mostrar['passaporte'])>=6 ){ 
                                    // coordenada e individual 
                                    if (($mostrar_trabalho['id'] != 1) and ($mostrar_trabalho['id'] != 4) and ($id_tipo_participante != 6)) {
                                        // Verifica quantidade de trabalhos inscritos deste participante
                                        if ($mostrar_trabalho['id'] == 3 && $qtd_trabalhos_cadastrados >= 2) {
                                            continue;
                                        }

                                        // Verificar se já cadastrou resumo na comunicação coordenada
                                        if ($mostrar_trabalho['id'] == 2) {
                                            ?>
                                            <span class="txt_titulo_destaque"><?php techo($mostrar_trabalho['nome'], $mostrar_trabalho['nome_en']); ?></span>
                                            <p class="txt_titulo_noticias_2"><?php techo($mostrar_trabalho['descricao'], $mostrar_trabalho['descricao_en']); ?></p>
                                            <?php if ($data_hoje <= $ultima_chamada_trabalho) { ?>
                                                <p><form action="trabalho.php" method="post">
                                                        <label>
                                                            <input type="submit" name="button" id="button" class="botao_trabalho" value="<?php techo('Envie seu trabalho', 'Send abstract'); ?>" />
                                                            <input name="id_trabalho" type="hidden" value="<?= $mostrar_trabalho['id']; ?>" />
                                                        </label>
                                                    </form></p>
                                            <?php } else { ?>
                                                <p class="dados_obrigatorios"><?php techo('O prazo para envio de trabalho encerrou.', 'The deadline for papers is over.'); ?></p>
                                            <?php } ?>
                                            <p>&nbsp;</p>
                                            <?php
                                        } //if
                                        elseif ($mostrar_trabalho['id'] == 3) {
                                            ?>
                                            <span class="txt_titulo_destaque"><?php techo($mostrar_trabalho['nome'], $mostrar_trabalho['nome_en']); ?></span>
                                            <p class="txt_titulo_noticias_2"><?php techo($mostrar_trabalho['descricao'], $mostrar_trabalho['descricao_en']); ?></p>
                                            <?php if ($data_hoje <= $ultima_chamada_trabalho) { ?>
                                                <p><form action="trabalho.php" method="post">
                                                        <label>
                                                            <input type="submit" name="button" id="button" class="botao_trabalho" value="<?php techo('Envie seu trabalho', 'Send abstract'); ?>" />
                                                            <input name="id_trabalho" type="hidden" value="<?= $mostrar_trabalho['id']; ?>" />
                                                        </label>
                                                    </form></p>
                                            <?php } else { ?>
                                                <p class="dados_obrigatorios"><?php techo('O prazo para envio de trabalho encerrou.', 'The deadline for papers is over.'); ?></p>
                                            <?php } ?>
                                            <p>&nbsp;</p>
                                            <?php
                                        } //if
                                    } //if

                                    /* Pôster */
                                    if ($qtd_trabalhos_cadastrados < 2) {
                                        if ($mostrar_trabalho['id'] == 4) { //poster 
                                            ?>
                                            <span class="txt_titulo_destaque"><?= $mostrar_trabalho['nome']; ?></span>
                                            <p class="txt_titulo_noticias_2"><?= $mostrar_trabalho['descricao']; ?></p>
                                            <?php if ($data_hoje <= $ultima_chamada_trabalho) { ?>
                                                <p><form action="trabalho.php" method="post">
                                                        <label>
                                                            <input type="submit" name="button" id="button" class="botao_trabalho" value="<?php techo('Envie seu trabalho', 'Send abstract'); ?>" />
                                                            <input name="id_trabalho" type="hidden" value="<?= $mostrar_trabalho['id']; ?>" />
                                                        </label>
                                                    </form></p>
                                            <?php } else { ?>
                                                <p class="dados_obrigatorios"><?php techo('O prazo para envio de trabalho encerrou.', 'The deadline for papers is over.'); ?></p>
                                            <?php } ?>
                                            <p>&nbsp;</p>
                                            <?php
                                        }
                                    }// fim do if ($qtd_trabalhos_cadastrados<2) (Pï¿½ster)
                                    //}//associado
                                }//while
                            }
                            ?>
                        </div>
                    <?php } else if ($modalidade_participacao == 0) {//0 -> sem apresentação de Trabalho ?>
                        <span class="txt_categorias"><strong><?php techo('Inscri&ccedil;&otilde;es SEM trabalho', 'Registrations without paper'); ?></strong></span>
                        <div id="box_trabalhos">
                            <span class="txt_titulo_destaque"><?php techo('Ouvinte', 'Auditor'); ?></span>
                            <p class="txt_titulo_noticias_2"><?php techo('Participantes sem apresenta&ccedil;&atilde;o de trabalho.', 'Participants without paper presentation.'); ?></p>
                        </div>
                    <?php } ?>

                </div>

            </div>   

            <div id="lado_direito">

                <div id="links_rapidos">
                    <div class="titulo_boxes"><h2><?php techo('&Aacute;rea do Participante', 'Participant Area'); ?></h2></div>
                    <form action="controle.php" method="post">
                        <div align="center" style="margin-top:15px;">
                            <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                                <tr>
                                    <td class="txt_topico_tabela"><?php techo('Ol&aacute;', 'Hello'); ?>, <?php print $_SESSION["nome_participante"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" ><?php techo('sair', 'logout'); ?></a></td>
                                    <!-- id = id do envento-->
                                </tr>
                            </table>
                        </div>
                    </form>

                </div>            <br />
                <!--<div id="links_rapidos">
                        <div class="titulo_boxes"><h2>Links interessantes</h2></div>
                    <ul>
                            <li><a href="#">Documento oficial</a></li>
                            <li><a href="#">Normas a serem seguidas</a></li>
                            <li><a href="#">Site da ALAB</a></li>                                                            
                    </ul>
                </div>-->
            </div><!-- lado direito -->
            <div class="clear"></div>
            <div id="footer">
                <div align="center">
                    <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
                </div>	
            </div>

        </div><!-- tudo -->
    </body>
</html>