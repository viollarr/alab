<?php
require("conexao.php");
require_once("check_user.php");

$id_evento         = $_SESSION['id_evento'];

$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

$id_trabalho       = (int) $_REQUEST['id_trabalho'];
$categoria_carta   = addslashes($_REQUEST['categoria_carta']);

function carregar_trabalho($sql){
	require("conexao.php");

	$trabalho = array();
	$trabalho = mysql_query($sql, $conexao) or die(mysql_error());
	$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
	
	foreach($trabalho as $key => $value){
		$trabalho[$key] = mb_strtoupper($value);
	} //foreach

	return $trabalho;
}

function aceito($id_trabalho, $tipo, $id_evento){
	require("conexao.php");
	$nota_corte = 3;

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
	//$num_nao = $respostas['sim'];

	//exit("<hr>gerar_carta");

	if( $num_sim >= $nota_corte) return true;
	else return false;
}

$carta = array();
switch($categoria_carta){
	case 'coordenador_simposio':
		$trabalho = carregar_trabalho("SELECT s.titulo_sessao, t.nome AS topico
				   FROM ev_simposio s, ev_topico_simposio t, ev_simposio_coordenador sc
				   WHERE 
					   s.id_evento = '".$id_evento."' 
					   AND sc.id_participante = '".$id_participante."' 
					   AND s.id = sc.id_simposio
					   AND s.id = ".$id_trabalho."
					   AND s.id_topico = t.id
		");
		
		$carta['pdf'] = 'IX_CBLA_Carta_de_Agradecimento_Coordenador_Simposio';
		$carta['titulo'] = 'CARTA DE AGRADECIMENTO';
		$carta['mensagem'] = '<p>Prezado/a <span style="font-weight:bold;">'.$nome_participante.'</span>,</p><br /><br /><p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer seu aceite para propor, organizar e coordenar o simp&oacute;sio <span style="font-weight:bold;">'.$trabalho['titulo_sessao'].'</span>, na linha tem&aacute;tica <span style="font-weight:bold;">'.$trabalho['topico'].'</span>, para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'resumo_em_simposio':
		$trabalho = carregar_trabalho("SELECT r.titulo, s.titulo_sessao
					FROM ev_resumo r, ev_simposio s
					WHERE 
						r.id = '".$id_trabalho."'
						AND r.id_evento = '".$id_evento."' 
						AND s.id_evento = '".$id_evento."' 
						AND r.id_tipo_trabalho = 1 
						AND r.id_simposio = s.id
		");
		
		$carta['pdf'] = 'IX_CBLA_Carta_de_Agradecimento_Apresentador_Simposio';
		$carta['titulo'] = 'CARTA DE AGRADECIMENTO';
		$carta['mensagem'] = '<p>Prezado/a <span style="font-weight:bold;">'.$nome_participante.'</span>,</p><br /><br /><p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer, em nome do/a coordenador/a do simp&oacute;sio <span style="font-weight:bold;">'.$trabalho['titulo_sessao'].'</span>, a submiss&atilde;o do trabalho intitulado <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, para apresenta&ccedil;&atilde;o no referido simp&oacute;sio e evento, no per&iacute;odo de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'debatedor':
		$trabalho = carregar_trabalho("SELECT s.titulo_sessao
				   FROM ev_simposio s
				   WHERE 
					   s.id_evento = '".$id_evento."' 
					   AND s.id = ".$id_trabalho."
					   AND (
					   		id_participante_debatedor = '".$id_participante."'
							OR id_participante_debatedor_2 = '".$id_participante."'
					   )
		");
		
		$carta['pdf'] = 'IX_CBLA_Carta_de_Agradecimento_Debatedor_Simposio';
		$carta['titulo'] = 'CARTA DE AGRADECIMENTO';
		$carta['mensagem'] = '<p>Prezado/a <span style="font-weight:bold;">'.$nome_participante.'</span>,</p><br /><br /><p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer seu aceite para participar como debatedor no simp&oacute;sio <span style="font-weight:bold;">'.$trabalho['titulo_sessao'].'</span>, durante o referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'coordenador_coordenada':
		$trabalho = carregar_trabalho("SELECT titulo_sessao
				   FROM ev_comunicacao_coordenada
				   WHERE 
					   id_evento = '".$id_evento."' 
					   AND id = ".$id_trabalho."
					   AND id_coordenador = '".$id_participante."' 
		");
		
		if(aceito($id_trabalho, 'comunicacao_coordenada', $id_evento)) exit("Comunicacao Coordenada Aceita");
		else exit("Comunicacao Coordenada Recusada");

		$carta['pdf'] = 'IX_CBLA_Carta_de_Aceite_Comunicacao_Coordenada';
		$carta['titulo'] = 'CARTA DE ACEITE';
		$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada, ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que a sess&atilde;o coordenada <span style="font-weight:bold;">'.$trabalho['titulo_sessao'].'</span>, proposta por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceita para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'resumo_em_coordenada':
		$trabalho = carregar_trabalho("
					SELECT titulo
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND ( autor = '".$id_participante."' OR co_autor = '".$id_participante."' )
						AND id_tipo_trabalho = 2
						AND id_comunicacao_coordenada <> 0
		");

		$carta['pdf'] = 'IX_CBLA_Carta_de_Aceite_Trabalho';
		$carta['titulo'] = 'CARTA DE ACEITE';
		$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada, ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que o trabalho <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceito para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'comunicacao_individual':
		$trabalho = carregar_trabalho("
					SELECT titulo
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND ( autor = '".$id_participante."' OR co_autor = '".$id_participante."' )
						AND id_tipo_trabalho = 3
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
		");

		$carta['pdf'] = 'IX_CBLA_Carta_de_Aceite_Trabalho';
		$carta['titulo'] = 'CARTA DE ACEITE';
		$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada, ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que o trabalho <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceito para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'poster':
		$trabalho = carregar_trabalho("
					SELECT titulo
					FROM ev_resumo
					WHERE 
						id_evento = '".$id_evento."' 
						AND id = ".$id_trabalho."
						AND ( autor = '".$id_participante."' OR co_autor = '".$id_participante."' )
						AND id_tipo_trabalho = 4
						AND id_comunicacao_coordenada = 0
						AND id_simposio = 0
		");
		
		$carta['pdf'] = 'IX_CBLA_Carta_de_Aceite_Trabalho';
		$carta['titulo'] = 'CARTA DE ACEITE';
		$carta['mensagem'] = '<p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada, ap&oacute;s submiss&atilde;o dos resumos ao Comit&ecirc; Cient&iacute;fico, tem a satisfa&ccedil;&atilde;o de informar que o trabalho <span style="font-weight:bold;">'.$trabalho['titulo'].'</span>, proposto por <span style="font-weight:bold;">'.$nome_participante.'</span>, foi aceito para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;
} //switch

require_once("dompdf/dompdf_config.inc.php");

$html = '
<html>
<body style="margin:0px;">
    <div style="font-family:sans-serif; font-size:12px; margin:0px; padding:60px 80px;">
        <p align="right" style="margin-bottom:60px"><img src="images/carta_aceite_header.jpg" alt="IX CBLA"></p>
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
            <img src="images/carta_aceite_assinatura.jpg" style="width: 170px;"><br />
            Paula Tatianne Carr&eacute;ra Szundy<br />
            Presidente da ALAB<br />
            Comiss&atilde;o Executiva do IX CBLA
		</div>
	</div>
</body>
</html>
';

$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
//$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($carta['pdf'], array('Attachment' => 1));

?>
