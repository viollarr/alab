<?php
require_once("conexao.php");
require_once("check_user.php");

$id_evento         = $_SESSION['id_evento'];

$id_participante   = $_SESSION['id_participante'];
$nome_participante = $_SESSION['nome_participante'];

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

$mensagem = "";
switch($categoria_carta){
	case 'coordenador_simposio':
		$sql = "SELECT s.titulo_sessao, t.nome AS topico
				   FROM  ev_simposio s, ev_topico_simposio t, ev_simposio_coordenador sc
				   WHERE 
					   s.id_evento = '".$id_evento."' 
					   AND sc.id_participante = '".$id_participante."' 
					   AND s.id = sc.id_simposio
					   AND s.id = ".$id_trabalho."
					   AND s.id_topico = t.id
		";
		$trabalho = mysql_query($sql, $conexao) or die(mysql_error());
		$trabalho = mysql_fetch_array($trabalho, MYSQL_ASSOC);
		print_r($trabalho);
		
		$mensagem = '
        <p style="text-align:justify; margin-bottom:60px;">Prezado/a <span style="font-weight:bold;">'. strtoupper($nome_participante).'</span>,<br><br>
A comiss&atilde;o organizadora do IX Congresso Brasileiro de Lingu&iacute;stica Aplicada gostaria de agradecer seu aceite para propor, organizar e coordenar o simp&oacute;sio <span style="font-weight:bold;">'.$trabalho['titulo_sessao'].'</span>, na linha tem&aacute;tica <span style="font-weight:bold;">'.$trabalho['topico'].'</span>, para apresenta&ccedil;&atilde;o no referido evento, que ocorrer&aacute; de 25 a 28 de julho de 2011, na Universidade Federal do Rio de Janeiro.</p>
		';
		break;

	case 'resumo_simposio':
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
        <p>&nbsp;</p>
        <p align="center">CARTA DE ACEITE ('.$categoria_carta.')</p>
        <p>&nbsp;</p>
		'.$mensagem.'
        <p align="center">Cordialmente,</p>
        <div style="text-align:center;">
            <img src="images/carta_aceite_assinatura.jpg"><br>
            Paula Tatianne Carr&eacute;ra Szundy<br>
            Presidente da ALAB<br>
            Comiss&atilde;o  Executiva do IX CBLA
</div>
        <p>&nbsp;</p>
	</div>
</body>
</html>
';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>