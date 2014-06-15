<?php
/*

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// O Rodrigo Borba precisou acessar as telas de avaliação - principalmente o formulário que contem as questões - para mostrar a FAPERJ. //
// Ver email recebido pelo Daniel Costa em "19 de março de 2012 20:20" (sistema de avaliacao) no qual o Rodrigo fala sobre isso.        //
// Por isso, o código responsável por salvar as avaliações foi comentado, para evitar que as avaliações fossem re-feitas.               //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require("../conexao.php");
require("../check_user.php");

function query($sql){
	//echo "<br />SQL: " . $sql;
	
	require("../conexao.php");
	
	$linhas = array();
	$result = mysql_query($sql, $conexao);
	while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) array_push($linhas, $linha);
	
	return $linhas;
}

$id_trabalho = (int) $_REQUEST["id_trabalho"];
$id_tipo_trabalho = (int) $_REQUEST["id_tipo_trabalho"];
$observacao  = addslashes($_REQUEST["observacao"]);

$tipo_trabalho = "";
switch($id_tipo_trabalho){
	case 2:
		$tipo_trabalho = "comunicacao_coordenada";
		break;
		
	case 3:
		$tipo_trabalho = "comunicacao_individual";
		break;
}//switch

$perguntas = query("SELECT * FROM ev_pergunta WHERE id_tipo_trabalho = '".$id_tipo_trabalho."' AND id_evento = '".$_SESSION['id_evento']."' ORDER BY ordem ASC");
foreach($perguntas as $pergunta){ 
	$id_pergunta = $pergunta["id"];
	$respostas[$id_pergunta] = $_REQUEST["resposta_".$id_pergunta];
} //foreach

// Avaliacao da qual este trabalho faz parte
// Repare que deve estar "amarrado" com o id do avaliador, pois no caso do Queering Paradigms, pode haver mais de um avaliador por trabalho.
$avaliacoes = query("SELECT * FROM ev_avaliacao 
	WHERE 
		id_trabalho = '".$id_trabalho."' 
		AND tipo_trabalho = '".$tipo_trabalho."' 
		AND id_evento = '".$_SESSION['id_evento']."' 
		AND id_avaliador = '".$_SESSION['id_participante']."' ");
$avaliacao  = $avaliacoes[0];

// Deletando respostas anteriores
mysql_query("DELETE FROM ev_avaliacao_perguntas WHERE id_avaliacao = '".$avaliacao["id"]."' ", $conexao);

// Salvando as novas respostas
$err = 0;
foreach($perguntas as $pergunta){
	$id_pergunta = $pergunta["id"];
	$modified = date("Y-m-d h:i:s");
	
	$resposta = (empty($respostas[$id_pergunta])) ? 'nao' : $respostas[$id_pergunta];

	$sql = "INSERT INTO ev_avaliacao_perguntas(id_avaliacao, id_pergunta, resposta, modified) 
			VALUES('".$avaliacao["id"]."', '".$pergunta["id"]."', '".$resposta."', '".$modified."')";
	$result = mysql_query($sql, $conexao);
	$salvo  = mysql_affected_rows($conexao);
	
	if(!$salvo) $err++;
}//foreach

// Salvando a observação
$sql = "UPDATE ev_avaliacao SET observacao = '".$observacao."' 
	WHERE 
		id_trabalho = '".$id_trabalho."' 
		AND tipo_trabalho = '".$tipo_trabalho."' 
		AND id_evento = '".$_SESSION['id_evento']."' 
		AND id_avaliador = '".$_SESSION['id_participante']."' ";
$result = mysql_query($sql, $conexao);
$salvo  = mysql_affected_rows($conexao);
//if(!$salvo) $err++;

if(!$err)
	$GLOBALS["msg_avaliacao_salva"] = ($_SESSION['lang'] == 'en') ? 'The review was saved.' : 'A avalia&ccedil;&atilde;o foi salva.';
else 
	$GLOBALS["msg_avaliacao_salva"] = ($_SESSION['lang'] == 'en') ? 'The review <strong>not</ strong> has been saved. Please contact the administrator.' : 'A avalia&ccedil;&atilde;o <strong>n&atilde;o</strong> foi salva. Por favor, contacte o administrador.';
	
require("avaliacao_trabalhos.php");
*/
?>