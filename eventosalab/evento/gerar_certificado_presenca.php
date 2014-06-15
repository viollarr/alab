<?php
require("sessoes.php");
require_once("check_user.php");
require_once("../dompdf/dompdf_config.inc.php");

$id_evento = $_SESSION['id_evento'];

// Pegar dados do participante
$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

// Dados da presenca
if(!empty($_REQUEST['id_trabalho'])) $id_trabalho = (int) $_REQUEST['id_trabalho'];
$categoria_certificado = addslashes($_REQUEST['certificado']);

//Pega dados do Evento
$select_evento = "SELECT * FROM ev_evento WHERE id = '$id_evento'";
$query_evento  = mysql_query($select_evento);
$result_evento = mysql_fetch_array($query_evento);

$certificado = array();
switch($categoria_certificado){
	case 'ouvinte':
		$certificado['titulo_pdf'] = 'Certificado_de_Ouvinte';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>';
		$certificado['mensagem'] .= utf8_decode(' participou do evento '.$result_evento['titulo'].', organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011, com duração de 30 horas.');
		break;
		
	case 'poster': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_tipo_trabalho = 4";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Poster';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' apresentou o pôster ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o evento '.$result_evento['titulo'].', organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		  
	case 'paper': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_tipo_trabalho = 5";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Paper';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' apresentou o paper ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o evento '.$result_evento['titulo'].', organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
} //switch

$html = '
<html>
<body style="margin:0px;">
    <div style="font-family:sans-serif; font-size:12px; margin:50px; padding:25px; border:3px solid #1f497c; height:500px;">
        <img src="../admin2012/telas/imgs_topo_eventos/'.$_SESSION['imagem_topo'].'" width="150" alt="'.mb_strtoupper($result_evento['titulo']).'">
		<br />
		<br />
		<br />
		<div style="line-height:250%;">'.$certificado['mensagem'].'</div>';

		// Isso é para ajustar o espaço entre o texto e a data para melhor visualização do certificado e evitar que a assinatura do certificado saia em outra página
		//if(strlen($certificado['mensagem']) < 450) $html .= '<br /><br />';

		$html .= '<div style="text-align:right">Rio de Janeiro, 28 de julho de 2011.</div>
        <div style="text-align:center;">
            <img src="../images/carta_aceite_assinatura.jpg" style="width: 170px;"><br />
            Paula Tatianne Carr&eacute;ra Szundy<br />
            Presidente da ALAB
		</div>
	</div>
</body>
</html>
';

//exit("<hr />gerar_certificado");

$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($certificado['titulo_pdf'].".pdf", array('Attachment' => 1));
?>