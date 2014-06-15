<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pariticipantes com mais de três trabalhos</title>
</head>

<body>
	<?php
	require_once("../conexao.php");
	
	$participantes = $participantes_mais_trabs = array();
	$limit_trab = 2;

	$sql = "SELECT id FROM ev_participante";
	$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
	while(list($id) = mysql_fetch_array($result)){
		array_push($participantes, $id);
	}//while

	foreach($participantes as $id_participante){
	$sql = "SELECT id FROM ev_resumo WHERE autor = ".$id_participante." OR co_autor = ".$id_participante;
		$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
		if(mysql_num_rows($result) > $limit_trab){
			$p["id"]        = $id_participante;
			$p["qtd_trabs"] = mysql_num_rows($result);
			array_push($participantes_mais_trabs, $p);
		}//if
	}//foreach
	
	?>
    Tabela - Participantes com mais de <?=$limit_trab?> trabalhos
	<hr />
	asdasd
	<table width="100%" border="1">
	  <tr>
		<td>#</td>
		<td>ID</td>
		<td>Nome</td>
		<td>Email</td>
		<td align="center">Quantidade de trabalhos inscritos</td>
	  </tr>
		<?php 
			$i = 1;
			foreach($participantes_mais_trabs as $p){
			$sql = "SELECT id, nome, email FROM ev_participante WHERE id = ".$p["id"];
			$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
			while(list($id, $nome, $email) = mysql_fetch_array($result)){
				?>
				<tr>
					<td><?=$i;?></td>
					<td><?=$id;?></td>
					<td><?= utf8_encode($nome);?></td>
					<td><?=$email;?></td>
					<td align="center"><?=$p["qtd_trabs"];?></td>
				</tr>
				<?php
			}//while
			$i++;
		}//foreach
		?>
	</table>
</body>
</html>
