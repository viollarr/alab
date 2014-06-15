<?php

//configura��es do banco 
$host = "mysql05.alab.org.br"; 
$banco = "alab14"; 
$usuario = "alab14"; 
$senha = "w62c11AL"; 

$conexao = mysql_connect($host,$usuario,$senha); 
mysql_select_db($banco); 

	$html = '<table>
				<thead>
					<tr>
					    <th>ID</th>	
						<th>Nome</th>
						<th>E-mail</th>
						<th>Habilitado</th>
						<th></th>
						<th>Anuidade 2009</th>
						<th>Anuidade 2010</th>
						<th>Anuidade 2011</th>
						<th>Anuidade 2012</th>
					</tr>
				</thead>';

    $sql_busca = "SELECT id, name, Anuidade2009, Anuidade2010, Anuidade2011, Anuidade2012, email, block FROM jos_users WHERE id<>'62'";
	$query_busca=mysql_query($sql_busca, $conexao);
	
	while($mostrar = mysql_fetch_array($query_busca)) {
		$id=$mostrar['id'];
		$nome=$mostrar['name'];
		$Anuidade2009=$mostrar['Anuidade2009'];
		if ($Anuidade2009=='0') $Anuidade2009='Sim';
		if ($Anuidade2009=='1') $Anuidade2009='N&atilde;o';
		$Anuidade2010=$mostrar['Anuidade2010'];
		if ($Anuidade2010=='0') $Anuidade2010='Sim';
		if ($Anuidade2010=='1') $Anuidade2010='N&atilde;o';
		$Anuidade2011=$mostrar['Anuidade2011'];
		if ($Anuidade2011=='0') $Anuidade2011='Sim';
		if ($Anuidade2011=='1') $Anuidade2011='N&atilde;o';
		$Anuidade2012=$mostrar['Anuidade2012'];
		if ($Anuidade2012=='0') $Anuidade2012='Sim';
		if ($Anuidade2012=='1') $Anuidade2012='N&atilde;o';
		$email=$mostrar['email'];
		$block=$mostrar['block'];
		if ($block=='0') $block='Sim';
		if ($block=='1') $block='N�o';
		// monta html
		$html .= "<tr>
		            <td>$id</td>
					<td>$nome</td>
					<td>$email</td>
					<td>$block</td>
					<td>$Pagamento</td>
					<td>$Anuidade2009</td>
					<td>$Anuidade2010</td>
					<td>$Anuidade2011</td>
					<td>$Anuidade2012</td>
				  </tr>";
	}
	$html .= '</table>';
	
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=associados-'.date('d-m-Y-His').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	print $html;
	exit;

?>