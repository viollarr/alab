<?php
require("sessoes.php");
require_once("check_user.php");

$id_evento         = $_SESSION['id_evento'];

$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

$id_trabalho       = (int) $_REQUEST['id_trabalho'];
$categoria_carta   = addslashes($_REQUEST['categoria_carta']);

$select_evento = "SELECT titulo, apelido, local, periodo FROM ev_evento WHERE id = '$id_evento'";
$query_evento  = mysql_query($select_evento);
$result_evento = mysql_fetch_array($query_evento);
$apelido_evento= $result_evento["apelido"];
$titulo_evento = $result_evento["titulo"];
$periodo_evento= $result_evento["periodo"];
$local_evento  = $result_evento["local"];

function carregar_trabalho($sql){
	require("sessoes.php");

	$trabalho = array();
	$trabalho = mysql_query($sql) or die(mysql_error());
	$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
	
	// print_r($trabalho);
	// exit("<hr>gerar_carta_aceite");
	
	foreach($trabalho as $key => $value){
		$trabalho[$key] = mb_strtoupper($value);

		// Gerar nome do trabalho para o arquivo PDF
		if($key = 'titulo_sessao'){ $trabalho['nome_arquivo'] = tratar_nome(mb_strtoupper($value)); }
		elseif($key = 'titulo'){ $trabalho['nome_arquivo'] = tratar_nome(mb_strtoupper($value)); }
	} //foreach

	return $trabalho;
}

function aceito($id_trabalho, $tipo){
	require("sessoes.php");

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
		$result = mysql_query($sql) or die(mysql_error());
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
	$result = mysql_query($sql) or die(mysql_error());
	while( $nota = mysql_fetch_array($result, MYSQL_ASSOC)){
		array_push($notas, $nota['resposta']);
	}
	$respostas = array_count_values($notas);
	$num_sim = $respostas['sim'];

	if( $num_sim >= $nota_corte) return true;
	else return false;
}//aceito

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

$carta = array();
switch($categoria_carta){
	case 'poster':
		$trabalho = carregar_trabalho("
					SELECT titulo
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND ( autor = '".$id_participante."' OR co_autor = '".$id_participante."' OR co_autor2 = '".$id_participante."' OR co_autor3 = '".$id_participante."' )
						AND id_tipo_trabalho = 4
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
		");
		
		if(aceito($id_trabalho, 'poster')){
			$carta['pdf'] = $apelido_evento.'_-_' . $trabalho['nome_arquivo'];
			$carta['titulo'] = 'CARTA DE ACEITE';
			$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do evento '.$titulo_evento.', ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que o trabalho <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceito para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de '.$periodo_evento.', na '.$local_evento.'.</p>';
		}else{
			$carta['pdf'] = $apelido_evento.'_-_' . $trabalho['nome_arquivo'];
			$carta['titulo'] = '&nbsp;';
			$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do evento '.$titulo_evento.', ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, informa que, devido aos crit&eacute;rios de avalia&ccedil;&atilde;o estabelecidos, ao grande n&uacute;mero de propostas recebidas e a limita&ccedil;&otilde;es de espa&ccedil;o f&iacute;sico, n&atilde;o p&ocirc;de aceitar o trabalho <span style="font-weight:bold;"> '.$trabalho['titulo'].' </span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>. Contamos com sua compreens&atilde;o e esperamos poder receb&ecirc;-lo em um pr&oacute;ximo evento.</p>';
		} //else
		break;

	case 'paper':
		$trabalho = carregar_trabalho("
					SELECT titulo
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND ( autor = '".$id_participante."' OR co_autor = '".$id_participante."' OR co_autor2 = '".$id_participante."' OR co_autor3 = '".$id_participante."' )
						AND id_tipo_trabalho = 5
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
		");
		
		if(aceito($id_trabalho, 'paper')){
			$carta['pdf'] = $apelido_evento.'_-_' . $trabalho['nome_arquivo'];
			$carta['titulo'] = 'CARTA DE ACEITE';
			$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do evento '.$titulo_evento.', ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que o trabalho <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceito para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de '.$periodo_evento.', na '.$local_evento.'.</p>';
		}else{
			$carta['pdf'] = $apelido_evento.'_-_' . $trabalho['nome_arquivo'];
			$carta['titulo'] = '&nbsp;';
			$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do evento '.$titulo_evento.', ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, informa que, devido aos crit&eacute;rios de avalia&ccedil;&atilde;o estabelecidos, ao grande n&uacute;mero de propostas recebidas e a limita&ccedil;&otilde;es de espa&ccedil;o f&iacute;sico, n&atilde;o p&ocirc;de aceitar o trabalho <span style="font-weight:bold;"> '.$trabalho['titulo'].' </span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>. Contamos com sua compreens&atilde;o e esperamos poder receb&ecirc;-lo em um pr&oacute;ximo evento.</p>';
		} //else
		break;
} //switch

require_once("../dompdf/dompdf_config.inc.php");

$html = '
<html>
<body style="margin:0px;">
    <div style="font-family:sans-serif; font-size:12px; margin:0px; padding:60px 80px;">
        <p align="right" style="margin-bottom:60px"><img src="../admin2012/telas/imgs_topo_eventos/'.$_SESSION['imagem_topo'].'" alt="'.$titulo_evento.'"></p>
		<p align="right">Rio de Janeiro,  15 de abril de 2011.</p>
		<br />
		<br /> 
		<br />
        <p align="center">'.$carta['titulo'].'</p><br />
		<br />
		<br />
		<br />
		'.$carta['mensagem'].'
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
        <p align="center">Cordialmente,</p>
        <div style="text-align:center;">
            <img src="../images/carta_aceite_assinatura.jpg" style="width: 170px;"><br />
            Paula Tatianne Carr&eacute;ra Szundy<br />
            Presidente da ALAB<br />
            Comiss&atilde;o Executiva do '.$titulo_evento.'
		</div>
	</div>
</body>
</html>
';

$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
//$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($carta['pdf'].".pdf", array('Attachment' => 1));

?>
