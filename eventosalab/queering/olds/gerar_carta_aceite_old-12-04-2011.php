<?php
require_once("conexao.php");
require_once("check_user.php");

$id_evento         = $_SESSION['id_evento'];

$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

$id_trabalho       = (int) $_REQUEST['id_trabalho'];
$categoria_carta   = addslashes($_REQUEST['categoria_carta']);

/*
CATEGORIAS DE CARTA

coordenador_simposio
resumo_simposio
debatedor
coordenador_coordenada
comunicacao_individual
poster
*/

$carta = array();
switch($categoria_carta){
	case 'coordenador_simposio':
		$sql = "SELECT s.titulo_sessao, t.nome AS topico
				   FROM ev_simposio s, ev_topico_simposio t, ev_simposio_coordenador sc
				   WHERE 
					   s.id_evento = '".$id_evento."' 
					   AND sc.id_participante = '".$id_participante."' 
					   AND s.id = sc.id_simposio
					   AND s.id = ".$id_trabalho."
					   AND s.id_topico = t.id
		";
		$trabalho = mysql_query($sql, $conexao) or die(mysql_error());
		$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
		
		$titulo_sessao = mb_strtoupper($trabalho['titulo_sessao']);
		$topico        = mb_strtoupper($trabalho['topico']);
		
		$carta['nome_arquivo'] = 'carta_de_agradecimento';
		$carta['titulo'] = 'CARTA DE AGRADECIMENTO';
		$carta['mensagem'] = '<p>Prezado/a <span style="font-weight:bold;">'.$nome_participante.'</span>,</p><br /><br /><p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer seu aceite para propor, organizar e coordenar o simp&oacute;sio <span style="font-weight:bold;">'.$titulo_sessao.'</span>, na linha tem&aacute;tica <span style="font-weight:bold;">'.$topico.'</span>, para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'resumo_simposio':
		$sql = "SELECT r.titulo, s.titulo_sessao
					FROM ev_resumo r, ev_simposio s
					WHERE 
						r.id = '".$id_trabalho."'
						AND r.id_evento = '".$id_evento."' 
						AND s.id_evento = '".$id_evento."' 
						AND r.id_tipo_trabalho = 1 
						AND r.id_simposio = s.id
		";
		//exit("gerar_carta_aceite: " . $sql);
		$trabalho = mysql_query($sql, $conexao) or die(mysql_error());
		$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
		
		$titulo        = mb_strtoupper($trabalho['titulo']);
		$titulo_sessao = mb_strtoupper($trabalho['titulo_sessao']);
		
		$carta['nome_arquivo'] = 'carta_de_agradecimento';
		$carta['titulo'] = 'CARTA DE AGRADECIMENTO';
		$carta['mensagem'] = '<p>Prezado/a <span style="font-weight:bold;">'.$nome_participante.'</span>,</p><br /><br /><p style="text-align: justify;">A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer, em nome do/a coordenador/a do simp&oacute;sio <span style="font-weight:bold;">'.$titulo_sessao.'</span>, a submiss&atilde;o do trabalho intitulado <span style="font-weight:bold;">'.$titulo.'</span>, para apresenta&ccedil;&atilde;o no referido simp&oacute;sio e evento, no per&iacute;odo de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>';
		break;

	case 'debatedor':
		break;

	case 'coordenador_coordenada':
		break;

	case 'comunicacao_individual':
		break;

	case 'poster':
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
        <p align="center">'.$carta['titulo'].' ('.$categoria_carta.')</p><br />
		<br />
		<br />
		<br />
		'.$carta['mensagem'].'
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
        <p>&nbsp;</p>
	</div>
</body>
</html>
';

$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
//$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($carta['nome_arquivo'], array('Attachment' => 1));

?>
