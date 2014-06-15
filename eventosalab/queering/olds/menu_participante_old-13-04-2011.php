<div style="margin-left:30px;">
    <span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impress&atilde;o de boleto</a>&nbsp;&nbsp;<?php
	//print_r($_SESSION);
	if($_SESSION['id_participante'] == 63){
		?>
		|&nbsp;&nbsp;<a href="cartaaceite.php">Carta</a>&nbsp;&nbsp;
		<?php
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
    <? }//if ?>
    </span>
</div>
