<div style="margin-left:30px;">
    <span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impress&atilde;o de boleto</a>&nbsp;&nbsp;<?php
	require("conexao.php");

	$id_evento = $_SESSION['id_evento'];
	
	// Verificar se o particpante se inscreveu com trabalho.
	$sql = "SELECT modalidade_participacao FROM ev_participante 
		WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$_SESSION['id_participante']."'";
	$result = mysql_query($sql, $conexao) or die(mysql_error());
	list($inscricao_com_trabalho) = mysql_fetch_array($result);

	// Verificar se já pode exibir o Item de Menu CARTA
	if($inscricao_com_trabalho){
		$sql = "SELECT data_liberacao_cartas FROM ev_evento WHERE id = '".$id_evento."' ";
	
		$data_liberacao = mysql_query($sql, $conexao) or die(mysql_error());
		list($data_liberacao) = mysql_fetch_array($data_liberacao); // Por exemplo: 2011-04-15
		
		$data_hoje = date("Y-m-d");
		
		if($data_hoje >= $data_liberacao){
			//if($_SESSION['id_participante'] == 63){
				echo ($data_hoje <= ($data_liberacao + 7)) 
					? "|&nbsp;&nbsp;<a href=\"cartaaceite.php\">Carta</a>&nbsp;&nbsp;" 
					: "|&nbsp;&nbsp;<a href=\"cartaaceite.php\">Carta</a>&nbsp;&nbsp;";
			//} //if
		} //if
	} //if
    ?>|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participa&ccedil;&atilde;o</a>
    <?php
	require("conexao.php");
	// Verificar se o participante logado é um avaliador de trabalho para este evento
	$sql = "SELECT avaliador FROM ev_participante WHERE id = '".$_SESSION['id_participante']."'";
	$result = mysql_query($sql, $conexao);
	$linha  = mysql_fetch_array($result, MYSQL_ASSOC);
	$eh_avaliador = ($linha["avaliador"] == "sim") ? true : false;
    if($eh_avaliador){ ?>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="avaliacao_trabalhos.php">Avaliar Trabalhos</a>
    <?php }//if ?>
    </span>
</div>
