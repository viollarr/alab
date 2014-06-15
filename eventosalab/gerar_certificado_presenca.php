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
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>';
		$certificado['mensagem'] .= utf8_decode(' participou do IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011, com duração de 30 horas.');
		break;

	case 'comissao':
		$certificado['titulo_pdf'] = 'Certificado_de_Comissao_Academico_Cientifica';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>';
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
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' coordenou o simpósio ') . '<span style="font-style:italic">' . mb_strtoupper($titulo_trabalho) . '</span>';
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
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . ' apresentou o trabalho <span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' no simpósio ') . '<span style="font-style:italic">' . mb_strtoupper($simposio['titulo']) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'coordenacao_sessao': 
		//$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$presenca['id_trabalho']."' ";
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo_sessao AS titulo FROM ev_comunicacao_coordenada WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' ";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Coordenador_Sessao_Coordenada';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' coordenou a sessão de comunicações coordenadas intitulada ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'comunicacao_individual': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_tipo_trabalho = 3";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Comunicacao_Individual';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' apresentou a comunicação individual ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'comunicacao_coordenada': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_comunicacao_coordenada > 0 AND id_tipo_trabalho = 2";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Comunicacao_Coordenada';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' apresentou a comunicação coordenada ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		
	case 'poster': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo FROM ev_resumo WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' AND id_tipo_trabalho = 4";
		$result = mysql_query($sql);
		$trabalho = mysql_fetch_array($result, MYSQL_ASSOC);
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Poster';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' apresentou o pôster ') . '<span style="font-style:italic">' . mb_strtoupper($trabalho['titulo']) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
		break;
		  
	case 'debatedor_simposio': 
		// Pegando o título do trabalho
		$sql = "SELECT id, titulo_sessao AS titulo FROM ev_simposio WHERE id_evento = '".$id_evento."' AND id = '".$id_trabalho."' ";
		$result = mysql_query($sql);
		$linha = mysql_fetch_array($result, MYSQL_ASSOC);
		$titulo_trabalho = $linha['titulo'];
		
		// Parâmetros do certificado
		$certificado['titulo_pdf'] = 'Certificado_Debatedor_Simposio';
		$certificado['mensagem']  = 'Certificamos que <span style="font-weight:bold">' . $nome_participante . '</span>' . utf8_decode(' atuou como debatedor no simpósio ') . '<span style="font-style:italic">' . mb_strtoupper($titulo_trabalho) . '</span>' . utf8_decode(' durante o IX Congresso Brasileiro de Linguística Aplicada, organizado pela Associação de Linguística Aplicada do Brasil no período de 25 a 28 de julho de 2011.');
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
		<div style="line-height:250%;">'.$certificado['mensagem'].'</div>';

		// Isso é para ajustar o espaço entre o texto e a data para melhor visualização do certificado e evitar que a assinatura do certificado saia em outra página
		//if(strlen($certificado['mensagem']) < 450) $html .= '<br /><br />';

		$html .= '<div style="text-align:right">Rio de Janeiro, 28 de julho de 2011.</div>
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
$dompdf->stream($certificado['titulo_pdf'].".pdf", array('Attachment' => 1));
?>