<?php
require("conexao.php");
require("check_user.php");

function query($sql){
	require("conexao.php");
	$linhas = array();
	$result = mysql_query($sql, $conexao);
	while($linha = mysql_fetch_array($result, MYSQL_ASSOC)) array_push($linhas, $linha);
	
	return $linhas;
}

/*
print "<pre>";
	print_r($_REQUEST);
print "</pre>";
/**/

$id_trabalho = (int) $_REQUEST["id_trabalho"];
$id_tipo_trabalho = (int) $_REQUEST["id_tipo_trabalho"];
$observacao  = addslashes($_REQUEST["observacao"]);

$perguntas = query("SELECT * FROM ev_pergunta WHERE id_tipo_trabalho = '".$id_tipo_trabalho."' ORDER BY ordem ASC");
foreach($perguntas as $pergunta){ 
	$id_pergunta = $pergunta["id"];
	$respostas[$id_pergunta] = $_REQUEST["resposta_".$id_pergunta];
} //foreach

// Avaliacao da qual este trabalho faz parte
$avaliacoes = query("SELECT * FROM ev_avaliacao WHERE id_trabalho = '".$id_trabalho."' ");
$avaliacao  = $avaliacoes[0];

// Deletando respostas anteriores
mysql_query("DELETE FROM ev_avaliacao_perguntas WHERE id_avaliacao = '".$avaliacao["id"]."'", $conexao);

// Salvando as novas respostas
$err = 0;
foreach($perguntas as $pergunta){
	$id_pergunta = $pergunta["id"];
	$modified = date("Y-m-d h:i:s");

	$sql = "INSERT INTO ev_avaliacao_perguntas(id_avaliacao, id_pergunta, resposta, modified) 
		VALUES('".$avaliacao["id"]."', '".$pergunta["id"]."', '".$respostas[$id_pergunta]."', '".$modified."')";
	$result = mysql_query($sql, $conexao);
	$salvo = mysql_affected_rows();
	
	if(!$salvo) $err++;
}//foreach

$GLOBALS["msg_avaliacao_salva"] = 
	(!$err) ? "A avalia&ccedil;&atilde;o foi salva." : "A avalia&ccedil;&atilde;o n&atilde;o foi salva. Por favor, contacte o respons&aacute;vel";
require("avaliacao_trabalhos.php");
?>