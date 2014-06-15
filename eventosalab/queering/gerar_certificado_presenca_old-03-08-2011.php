<?php
require("conexao.php");
require_once("check_user.php");
require_once("dompdf/dompdf_config.inc.php");

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
		$certificado['titulo_pdf'] = 'Certificado_de_Ouvinte';
		$certificado['mensagem']  = 'Certificamos que '.$nome_participante;
		$certificado['mensagem'] .= utf8_decode(' participou do IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011, com duração de 30 horas.');
		break;

	case 'comissao':
		$certificado['titulo_pdf'] = 'Certificado_de_Comissao_Academico_Cientifica';
		$certificado['mensagem']  = 'Certificamos que '.$nome_participante;
		$certificado['mensagem'] .= utf8_decode(' integrou a Comissão Acadêmico-Científica do IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;

	case 'coordenacao_simposio': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo_sessao AS titulo FROM ev_simposio WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' ";
		$result = mysql_query($sql);
		$linha = mysql_fetch_array($result, MYSQL_ASSOC);
		$titulo_trabalho = $linha['titulo'];
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Coordenador_Simposio';
		$certificado['mensagem']  = 'Certificamos que ' . $nome_participante . utf8_decode(' coordenou o simpósio ') . '<span style="font-style:italic">' . $titulo_trabalho . '</span>';
		$certificado['mensagem'] .= utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'trabalho_em_simposio': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo, id_simposio FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_simposio > 0 AND id_tipo_trabalho = 1";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Pegando o nome do simpósio deste trabalho
		$sql = "SELECT titulo_sessao AS titulo FROM ev_simposio WHERE id_evento = '".$id_evento."' AND id = '".$trabalho['id_simposio']."' ";
		$result = mysql_query($sql);
		$simposio = mysql_fetch_array($result, MYSQL_ASSOC);


		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Apresentacao_Simposio';
		$certificado['mensagem']  = 'Certificamos que ' . $nome_participante . ' apresentou o trabalho <span style="font-style:italic">' . $trabalho['titulo'] . '</span>' . utf8_decode(' no simpósio ') . '<span style="font-style:italic">' . $simposio['titulo'] . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'coordenacao_sessao': 
		//$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' ";
		break;
		
	case 'comunicacao_individual': 
		//$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_tipo_trabalho = 3";
		break;
		
	case 'comunicacao_coordenada': 
		//$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_comunicacao_coordenada > 0 AND id_tipo_trabalho = 2";
		break;
		
	case 'poster': 
		//$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' AND id_tipo_trabalho = 4";
		break;
		  
} //switch

$html = '
<html>
<body style="margin:0px;">
    <div style="font-family:sans-serif; font-size:12px; margin:50px; padding:25px; border:3px solid #1f497c; height:500px;">
        <img src="images/certificado_header.jpg" width="150" alt="IX CBLA">
		<br />
		<br />
		<br />
		<div style="line-height:250%;">'.$certificado['mensagem'].'</div>
		<br />
		<br />
		<p align="right">Rio de Janeiro, 28 de julho de 2011.</p>
		<br />
		<br />
        <div style="text-align:center;">
            <img src="images/carta_aceite_assinatura.jpg" style="width: 170px;"><br />
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
$dompdf->stream($certificado['titulo_pdf'], array('Attachment' => 1));
?>