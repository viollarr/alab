<?php
require_once("../conexao.php");

$participantes_duplo_registro = array();

$sql = "
	SELECT p1.cpf, p1.senha, p1.id, p1.nome, p1.email, p2.id, p2.nome, p2.email
	FROM ev_participante p1
	INNER JOIN ev_participante p2 ON p1.cpf = p2.cpf
	WHERE p1.id <> p2.id
	AND p1.cpf <>  ''
	AND p2.cpf <>  ''
	ORDER BY p1.id DESC";
print "SQL:<pre>";
	print_r($sql);
print "</pre>";
$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
while(list($cpf, $senha, $id1, $nome1, $email1, $id2, $nome2, $email2) = mysql_fetch_array($result)){
	$linha["cpf"] = $cpf;
	$linha["senha"] = $senha;
	$linha["id1"]    = $id1;
	$linha["nome1"]  = $nome1;
	$linha["email1"] = $email1;
	$linha["id2"]     = $id2;
	$linha["nome2"]   = $nome2;
	$linha["email2"]  = $email2;

	array_push($participantes_duplo_registro, $linha);


} //while

/*
print "Participantes:<pre>";
	print_r($participantes_duplo_registro);
print "</pre>";
exit("<br><br>[mais_de_um_cadastro]");
/**/

?>
<hr>
Tabela
<hr>
<table width="100%" border="1">
	<tr style="text-align:center">
        <td>CPF</td>
        <td>Senha</td>
        <td>ID 1</td>
        <td>Nome 1</td>
        <td>Email 1</td>
        <td>ID 2</td>
        <td>Nome 2</td>
        <td>Email 2</td>
    </tr>
	<?php 
	$participantes_ja_listados = $participantes_apagar = $participantes_definitivos = array();
	$k = 1;
	foreach($participantes_duplo_registro as $participante){ 
		if (!in_array($participante["id2"], $participantes_ja_listados)){
			?>
			  <tr>
				<td><?=$participante["cpf"]?></td>
				<td><?=$participante["senha"]?></td>
				<td><?=$participante["id1"]?></td>
				<td><?=$participante["nome1"]?></td>
				<td><?=$participante["email1"]?></td>
				<td><?=$participante["id2"]?></td>
				<td><?=$participante["nome2"]?></td>
				<td><?=$participante["email2"]?></td>
			  </tr>
			<?php 
			array_push($participantes_ja_listados, $participante["id1"]);
			array_push($participantes_definitivos, $participante);
			$k++;
			if($k % 10 == 0){ ?>
				<tr style="text-align:center">
					<td>CPF</td>
					<td>Senha</td>
					<td>ID 1</td>
					<td>Nome 1</td>
					<td>Email 1</td>
					<td>ID 2</td>
					<td>Nome 2</td>
					<td>Email 2</td>
				</tr>
			<?php }//if
		}//if
		else array_push($participantes_apagar, $participante["id1"]);
	 }//foreach 
	?>
</table>
<hr>
<?php
print "Quantidade de registros: ".$k; 

print "<br><hr style=\"border:3px solid\">";

foreach($participantes_definitivos as $linha){

	$id1 = $linha["id1"];
	$id2 = $linha["id2"];

	/**/
	////////////////////////////////////////////////////////////////////////////////////////
	// Alterações para manter um único casdastro por participante. (SETANDO IDS CORRETAS) //
	////////////////////////////////////////////////////////////////////////////////////////
	
	// Verifica se é Autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
	print "".$sql = "UPDATE ev_resumo SET autor = ".$id1." WHERE autor = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";
	
	// Verifica se é Co-autor de algum trabalho: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
	print "<br>".$sql = "UPDATE ev_resumo SET co_autor = ".$id1." WHERE co_autor = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";

	// Verifica se é Coordenador de Simpósio
	print "<br>".$sql = "UPDATE ev_simposio_coordenador SET id_participante = ".$id1." WHERE id_participante = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";

	// Verifica se é Coordenador de Comunicação Coordenada
	print "<br>".$sql = "UPDATE ev_comunicacao_coordenada SET id_coordenador = ".$id1." WHERE id_coordenador = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";

	// Apagar os pagamentos do registro mais antigo
	//print "<br>".$sql = "UPDATE ev_pagamento SET id_participante = ".$id1." WHERE id_participante = ".$id2." ";
	print "<br>".$sql = "DELETE FROM ev_pagamento WHERE id_participante = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";


	///////////////////////////////////////////////////////////////////////////////////////////////
	// Alterações para manter um único casdastro por participante. (APAGAR CADASTROS DUPLICADOS) //
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	// Apagar cadastro participante duplicado
	/**/
	print "<br>".$sql = "DELETE FROM ev_participante WHERE id = ".$id2." ";
	//mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	print "<div style=\"float:right\">[Linhas afetadas: ".mysql_affected_rows($conexao)."]</div>";
	/**/

	print "<hr>";

}//foreach
/**/

?>
