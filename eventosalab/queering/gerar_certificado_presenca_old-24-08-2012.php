<?php
require("../conexao.php");
require_once("../check_user.php");
require_once("../dompdf_new/dompdf_config.inc.php");

$id_evento = $_SESSION['id_evento'];

// Pegar dados do participante
$id_participante   = $_SESSION['id_participante'];
$nome_participante = mb_strtoupper($_SESSION['nome_participante']);

// Dados da presenca
if(!empty($_REQUEST['id_trabalho'])) $id_trabalho = (int) $_REQUEST['id_trabalho'];
$categoria_certificado = addslashes($_REQUEST['certificado']);

$certificado = array();
switch($categoria_certificado){
	case 'ouvinte':
		// Parâmetros do certificado
		$certificado['padding'] = '295px';
		$certificado['titulo_pdf'] = 'Certificado_de_Ouvinte';
		$certificado['texto']  ='<span>This is to certify that<br /><br /><strong>' . $nome_participante . '</strong><br /><br />Attended 4th Queering Paradigms International Conference<br />during the symposia sessions of the event,<br />held in Rio de Janeiro, Brazil, from 25th to 28th July, 2012.<br /><br /><br />Rio de Janeiro, 28 July, 2012</span>';
		$certificado['imagem'] =  'cetificado_contribuicao_participacao_base.jpg';
		break;
		
	case 'coordenacao_sessao': 
		//$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' ";
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' ";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['padding'] = '285px';
		$certificado['titulo_pdf'] = 'Certificado_Coordenador_Sessao_Coordenada';
		$certificado['texto']  ='<span>This is to certify that<br /><br /><strong>'.$nome_participante.'</strong><br /><br />Coordinated the panel<br /><br /><strong>'.mb_strtoupper($trabalho['titulo']).'</strong><br /><br />Presented during the 4th Queering Paradigms International Conference<br />held in Rio de Janeiro, Brazil, from 25th to 28th July, 2012.<br /><br />Rio de Janeiro, 28 July, 2012</span>';
		$certificado['imagem'] =  'cetificado_contribuicao_coordenador_sessao_base.jpg';
		break;
		
	case 'comunicacao_individual': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_tipo_trabalho = 3";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['padding'] = '290px';
		$certificado['titulo_pdf'] = 'Certificado_Comunicacao_Individual';
		$certificado['texto']  ='<span>This is to certify that<br /><br /><strong>'.$nome_participante.'</strong><br /><br />Attended 4th Queering Paradigms International Conference<br />and presented the paper entitled<br /><br /><strong>'.mb_strtoupper($trabalho['titulo']).'</strong><br /><br />during the symposia sessions of the event,<br />held in Rio de Janeiro, Brazil, from 25th to 28th July, 2012.<br /><br />Rio de Janeiro, 28 July, 2012</span>';
		$certificado['imagem'] =  'cetificado_contribuicao_trabalho_base.jpg';
		break;
		
	case 'comunicacao_coordenada': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_comunicacao_coordenada > 0 AND id_tipo_trabalho = 2";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['padding'] = '280px';
		$certificado['titulo_pdf'] = 'Certificado_Comunicacao_Coordenada';
		$certificado['texto']  ='<span>This is to certify that<br /><br /><strong>'.$nome_participante.'</strong><br /><br />Attended 4th Queering Paradigms International Conference<br />and presented the paper entitled<br /><br /><strong>'.mb_strtoupper($trabalho['titulo']).'</strong><br /><br />during the symposia sessions of the event,<br />held in Rio de Janeiro, Brazil, from 25th to 28th July, 2012.<br /><br />Rio de Janeiro, 28 July, 2012</span>';
		$certificado['imagem'] =  'cetificado_contribuicao_trabalho_base.jpg';
		break;
				  		
} //switch

$html = '
<html>
<body>
	<div style="font-family:proxima_nova; padding-top: '.$certificado['padding'].'; position:absolute; z-index:999;">
    	<center>'.$certificado['texto'].'</center>
	</div>
	<div style="margin: 40px 0 0 0">
		<img src="http://www.alab.org.br/images/stories/alab/QP4/'.$certificado['imagem'].'"  width="100%" />
	</div>
</body>
</html>
';

//exit("<hr />gerar_certificado");
//echo $html;
$dompdf = new DOMPDF();
$dompdf->load_html($html); //, 'ISO-8859-1'
$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream($certificado['titulo_pdf'].".pdf", array('Attachment' => 1));

?>