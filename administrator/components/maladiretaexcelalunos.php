<?php



//configurações do banco 

$host = "mysql04.alab.org.br"; 

$banco = "alab13"; 

$usuario = "alab13"; 

$senha = "al441301"; 



$conexao = mysql_connect($host,$usuario,$senha); 

mysql_select_db($banco); 



	$html = '<table>

				<thead>

					<tr>
					
						<th>ID</th>					

						<th>Nome</th>

						<th>E-mail</th>

						<th>Habilitado</th>

					</tr>

				</thead>';



    $sql_busca = "SELECT id, name, email, block FROM jos_users WHERE id<>'62' AND tipo_anuidade='Aluno' ORDER BY id DESC";

	$query_busca=mysql_query($sql_busca, $conexao);

	

	while($mostrar = mysql_fetch_array($query_busca)) {

		$id=$mostrar['id'];
		
		$nome=$mostrar['name'];

		$email=$mostrar['email'];

		$block=$mostrar['block'];

		if ($block=='0') $block='Sim';

		if ($block=='1') $block='Não';

		// monta html

		$html .= "<tr>

					<td>$id</td>
					
					<td>$nome</td>

					<td>$email</td>

					<td>$block</td>

				  </tr>";

	}

	$html .= '</table>';

	

	header('Content-Type: application/vnd.ms-excel');

	header('Content-Disposition: attachment; filename=associados-alunos-'.date('d-m-Y-His').'.xls');

	header('Pragma: no-cache');

	header('Expires: 0');

	print $html;

	exit;



?>