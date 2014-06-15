<?php
// INCLUDES

require("../conexao.php");
require_once("../check_user.php");
require_once("../check_lang.php");


// FUNÇÕES

function carregar_trabalho($sql){
	require("../conexao.php");

	$trabalho = array();
	$trabalho = mysql_query($sql, $conexao);// or die(mysql_error());
	$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
	
	/*
	foreach($trabalho as $key => $value){
		// Gerar nome do trabalho para o arquivo PDF
		if($key = 'titulo_sessao'){ $trabalho['nome_arquivo'] = tratar_nome($value); }
		elseif($key = 'titulo'){ $trabalho['nome_arquivo'] = tratar_nome($value); }
	} //foreach
	*/

	/*
	echo "<br/>SQL: " . $sql;
	echo "<br/>Trabalho: <pre>";
		print_r($trabalho);
	echo "</pre>";
	exit("<hr>gerar_carta_aceite");
	/**/
	
	return $trabalho;
}

/*
function aceito($id_trabalho, $tipo){
	require("../conexao.php");

	$id_evento  = $_SESSION['id_evento'];
	$nota_corte = 3;
	
	if($tipo == 'resumo_em_coordenada'){
		$sql = "
			SELECT id_comunicacao_coordenada 
				FROM ev_resumo
				WHERE 
					id = '".$id_trabalho."'
					AND id_evento = '".$id_evento."'
					AND id_tipo_trabalho = 2
					AND id_comunicacao_coordenada <> 0
			";
		$result = mysql_query($sql, $conexao) or die(mysql_error());
		list($id_trabalho) = mysql_fetch_array($result);
		$tipo = 'comunicacao_coordenada';
		// print_r($id_trabalho);
		// exit("<hr>gerar_carta");
	}//if

	$sql = "
		SELECT avp.resposta 
		FROM ev_avaliacao av, ev_avaliacao_perguntas avp
		WHERE 
			av.id_evento = '".$id_evento."'
			AND av.id_trabalho = ".$id_trabalho."
			AND av.tipo_trabalho = '".$tipo."'
			AND avp.id_avaliacao = av.id
		";
	$notas = array();
	$result = mysql_query($sql, $conexao) or die(mysql_error());
	while( $nota = mysql_fetch_array($result, MYSQL_ASSOC)){
		array_push($notas, $nota['resposta']);
	}
	$respostas = array_count_values($notas);
	$num_sim = $respostas['sim'];

	if( $num_sim >= $nota_corte) return true;
	else return false;
}//aceito
*/

function tratar_nome($string){
	$string = utf8_encode($string);
	
	$variaveis = array(
		"Á"=>"A", 
		"À"=>"A", 
		"Â"=>"A", 
		"Ã"=>"A", 
		"É"=>"E", 
		"È"=>"E", 
		"Ê"=>"E", 
		"Í"=>"I", 
		"Ì"=>"I", 
		"Î"=>"I", 
		"Ó"=>"O", 
		"Ò"=>"O", 
		"Ô"=>"O", 
		"Õ"=>"O", 
		"Ú"=>"U", 
		"Ù"=>"U", 
		"Û"=>"U", 
		"º"=>"o", 
		"ª"=>"a", 
		"Ç"=>"C", 
		" "=>"_", 
		"-"=>"_", 
		","=>"_", 

		"("=>"_", 
		")"=>"_", 
		"["=>"_", 
		"]"=>"_", 
		"{"=>"_", 
		"}"=>"_", 

		"!"=>"_", 
		"?"=>"_", 
		"%"=>"_", 
		"&"=>"_", 
		"*"=>"_", 
		"@"=>"_", 

		"/"=>"_", 
		"\\"=>"_", 

		"ä"=>"_", 
		"ë"=>"_", 
		"ï"=>"_", 
		"ö"=>"_", 
		"ü"=>"_", 

		"'"=>"_", 
		"\""=>"_",
		"."=>"_",
		":"=>"_"
	);
	foreach($variaveis as $search => $replace){
		$string = str_replace($search, $replace, $string);
	} //foreach

	// Outro exemplo pode ser visto em http://www.revistaphp.com.br/artigo.php?id=14
	
	return $string;
}// tratar_nome()


function pegar_autores($id_trabalho, $id_tipo_trabalho){
	require("../conexao.php");
	
	$id_evento  = $_SESSION['id_evento'];

	$sql = "SELECT UPPER(p.nome) AS nome
		FROM ev_participante p
	        INNER JOIN ev_participante_resumo pr
	        ON p.id = pr.id_participante
	    WHERE 
	        p.id_evento = {$id_evento} AND pr.id_evento = {$id_evento}
	        AND pr.id_resumo = {$id_trabalho}
	        AND pr.tipo_trabalho = {$id_tipo_trabalho}
	        AND (pr.tipo_participante = 'autor' OR pr.tipo_participante = 'coautor')
	    ORDER BY p.nome";
		
	//echo "<br />SQL: " . $sql;
	//exit("<hr />gerar_carta_aceite pegar_autores");
		
	$result = mysql_query($sql, $conexao);// or die(mysql_error());
	while(list($nome) = mysql_fetch_array($result)){
		$autores[] = $nome;
	} //while
	
	/*
	echo "<br/>Autores: <pre>";
		print_r($autores);
	echo "</pre>";
	exit("<hr>gerar_carta_aceite autores");
	/**/

	// Colocar vírgulas entre os nomes e 'and' antes do último nome de autor
	$autores_format = '';
	for($i = 0; $i < count($autores); $i++){
		$autores_format .= trim($autores[$i]);
		if($i == (count($autores) - 2)){
			$autores_format .= ' and ';
		}elseif($i == (count($autores) - 1)){
			$autores_format .= '';
		}else $autores_format .= ', ';
	}
	
	return $autores_format;
}


function nome_participante($id_participante){
	require("../conexao.php");

	$id_evento  = $_SESSION['id_evento'];

	$result = mysql_query("SELECT UPPER(nome) AS nome FROM ev_participante WHERE id_evento = {$id_evento} AND id = {$id_participante} LIMIT 1", $conexao);
	list($nome) = mysql_fetch_array($result);
	return trim($nome);
}

// fim: Funções


$id_evento         = $_SESSION['id_evento'];

$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

$id_trabalho       = (int) $_REQUEST['id_trabalho'];
$categoria_carta   = addslashes($_REQUEST['categoria_carta']);

$carta = array();
switch($categoria_carta){
	case 'comunicacao_individual':
		$trabalho = carregar_trabalho("
					SELECT UPPER(titulo) AS titulo, aceito 
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND id_tipo_trabalho = 3
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
					");
					
		//echo "Titulo trabalho: " . $trabalho['titulo'];
		//exit("<hr />gerar_carta_aceite");
		//$trabalho['titulo'] = "CONCEPÇÃO E ABORDAGEM DOS ESPAÇOS HOMOSSEXUAIS DE CUIABÁ-MT.";
		//$trabalho['titulo'] = substr($trabalho['titulo'], 0, -2);
		
		/*
		if($id_participante == 2127):
			$trabalho['titulo'] = utf8_decode("CONCEPÇÃO E ABORDAGEM DOS ESPAÇOS HOMOSSEXUAIS DE CUIABÁ/MT");
		endif;
		*/
		
		if($trabalho['aceito'] == 'sim'){
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			//$carta['titulo'] = 'CARTA DE ACEITE';
			$carta['mensagem'] = "<p style=\"text-align: justify;\">We are very pleased to inform you that the submission of the paper titled <strong>{$trabalho['titulo']}</strong>, authored by <strong>" . pegar_autores($id_trabalho, 3) . "</strong>, <span style=\"text-decoration:underline\">has been accepted</span> for presentation at the 4th International <em>Queering Paradigms</em> Conference to be held at Universidade Federal do Rio de Janeiro and Universidade Federal do Estado do Rio de Janeiro, Rio de Janeiro, Brazil, on July 25-28, 2012.</p><br/><br/><br/><br/>Looking forward to seeing you at QP4!<br/><br/><br/>";
		}else{
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			//$carta['titulo'] = 'CARTA DE ACEITE';
			$carta['mensagem'] = "<p style=\"text-align: justify;\">The <em>Queering Paradigms 4</em> Organizing Committee regrets to inform you that due to the criteria used by our international board of reviewers and the huge number of proposals submitted to the conference, the paper <strong>{$trabalho['titulo']}</strong>, authored by <strong>" . pegar_autores($id_trabalho, 3) . "</strong>, <span style=\"text-decoration:underline\">has not been accepted</span> for presentation at the conference. We hope you will understand and would like to encourage you to participate in the conference as an auditor (no paper presentation).";
		} //else
		break;

	case 'coordenador':
		$trabalho = carregar_trabalho("
					SELECT UPPER(titulo_sessao) AS titulo, aceito 
					FROM ev_comunicacao_coordenada
					WHERE 
						id_evento = {$id_evento} 
						AND id = {$id_trabalho}
						AND id_coordenador = {$id_participante}
					");
		
		if($trabalho['aceito'] == 'sim'){
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			$carta['mensagem'] = "<p style=\"text-align: justify;\">We are very pleased to inform you that the submission of the panel session titled <strong>{$trabalho['titulo']}</strong>, coordinated by <strong>".nome_participante($id_participante)."</strong>, <span style=\"text-decoration:underline\">has been accepted</span> for presentation at the 4th International <em>Queering Paradigms</em> Conference to be held at Universidade Federal do Rio de Janeiro and Universidade Federal do Estado do Rio de Janeiro, Rio de Janeiro, Brazil, on July 25-28, 2012.</p><br/><br/><br/><br/>Looking forward to seeing you at QP4!<br/><br/><br/>";
		}else{
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			$carta['mensagem'] = "<p style=\"text-align: justify;\">The <em>Queering Paradigms 4</em> Organizing Committee regrets to inform you that due to the criteria used by our international board of reviewers and the huge number of proposals submitted to the conference, the panel session <strong>{$trabalho['titulo']}</strong>, proposed by <strong>".nome_participante($id_participante)."</strong>, <span style=\"text-decoration:underline\">has not been accepted</span> for presentation at the conference. We hope you will understand and would like to encourage you to participate in the conference as an auditor (no paper presentation).";
		} //else
		break;

	case 'resumo_em_coordenada':
		$trabalho = carregar_trabalho("
					SELECT UPPER(r.titulo) AS titulo, UPPER(cc.titulo_sessao) AS titulo_sessao, cc.aceito, UPPER(p.nome) AS coordenador 
					FROM ev_resumo r
						INNER JOIN ev_participante_resumo pr ON r.id = pr.id_resumo 
						INNER JOIN ev_comunicacao_coordenada cc ON cc.id = r.id_comunicacao_coordenada
						INNER JOIN ev_participante p ON p.id = cc.id_coordenador 
					WHERE 
						r.id = {$id_trabalho} 
						AND r.id_tipo_trabalho = 2 
						AND r.id_evento = {$id_evento} 
						AND pr.tipo_trabalho = 2 
						AND r.id_comunicacao_coordenada <> 0
						AND pr.id_participante = {$id_participante}
					");
		
		if($trabalho['aceito'] == 'sim'){
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			$carta['mensagem'] = "<p style=\"text-align: justify;\">We are very pleased to inform you that the submission of the paper titled <strong>{$trabalho['titulo']}</strong>, authored by <strong>" . pegar_autores($id_trabalho, 2) . "</strong>, <span style=\"text-decoration:underline\">has been accepted</span> for presentation as part of the panel <strong>{$trabalho['titulo_sessao']}</strong>, coordinated by <strong>{$trabalho['coordenador']}</strong>, at the 4th International <em>Queering Paradigms</em> Conference to be held at Universidade Federal do Rio de Janeiro and Universidade Federal do Estado do Rio de Janeiro, Rio de Janeiro, Brazil, on July 25-28, 2012.</p><br/><br/><br/><br/>Looking forward to seeing you at QP4!<br/><br/><br/>";
		}else{
			/* COMO TODAS AS COMUNICAÇÕES COORDENADAS FORAM ACEITAS PARA ESTE EVENTO - QP4 - NÃO FOI NECESSÁRIO GERAR CARTA DE RECUSA PARA NENHUM RESUMO EM SESSÃO.
			// Ver email do Rodrigo Borba: "Re: cartas de aceite" do dia "8 de fevereiro de 2012 17:20" na cisa de email do Daniel Costa
			
			$carta['pdf'] = stecho("QP4_Carta_-_", "QP4_Letter_-_") . tratar_nome($trabalho['titulo']);
			//$carta['titulo'] = 'CARTA DE ACEITE';
			$carta['mensagem'] = "<p style=\"text-align: justify;\">The <em>Queering Paradigms 4</em> Organizing Committee regrets to inform you that due to the criteria used by our international board of reviewers and the huge number of proposals submitted to the conference, the paper <strong>{$trabalho['titulo']}</strong>, authored by <strong>" . pegar_autores($id_trabalho, 3) . "</strong>, <span style=\"text-decoration:underline\">has not been accepted</span> for presentation at the conference. We hope you will understand and would like to encourage you to participate in the conference as an auditor (no paper presentation).";
			*/
		} //else
		break;

} //switch

require_once("dompdf/dompdf_config.inc.php");

$html = "
<html>
<body style=\"margin:0px;\">
    <div style=\"font-family:sans-serif; font-size:12px; margin:0px; padding-left:80px; padding-right:80px; padding-top:60px;\">
        <p align=\"right\" style=\"margin-bottom:40px\"><img src=\"../images/carta_aceite_header_queering.jpg\" alt=\"QP4\"></p>
		<p align=\"right\">Rio de Janeiro, February, 2012.</p>
		<br />
		<br />
		<br />
		{$carta['mensagem']}
		<br />
		<br />
		<br />
		<p>Best regards,</p>
		<br>
		<br>
		<p>Queering Paradigms 4 Organizing Committee</p>
		<p>Universidade Federal do Rio de Janeiro</p>
		<p>Universidade Federal do Estado do Rio de Janeiro</p>
	</div>
</body>
</html>
";

$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
$dompdf->set_paper("letter");
//$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($carta['pdf'].".pdf", array('Attachment' => 1));

?>