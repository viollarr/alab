<?php



//configurações do banco 

//http://www.alab.org.br/administrator/components/maladiretaword.php

$host = "mysql04.alab.org.br"; 

$banco = "alab13"; 

$usuario = "alab13"; 

$senha = "al441301"; 



$conexao = mysql_connect($host,$usuario,$senha); 

mysql_select_db($banco); 



    $sql_busca = "SELECT name,block,endereco_res,complemento_res,bairro_res,cidade_res,estado_res,cep_res 

				  FROM jos_users

				  WHERE block='0' AND id<>'62' AND tipo_anuidade='Pleno' ORDER BY name ASC";

	$query_busca=mysql_query($sql_busca, $conexao);

	

	$html = '<html xmlns:v="urn:schemas-microsoft-com:vml"

xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:w="urn:schemas-microsoft-com:office:word"

xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"

xmlns="http://www.w3.org/TR/REC-html40">



<head>

<meta http-equiv=Content-Type content="text/html; charset=windows-1252">

<meta name=ProgId content=Word.Document>

<meta name=Generator content="Microsoft Word 12">

<meta name=Originator content="Microsoft Word 12">

<style>

<!--

 /* Font Definitions */

 @font-face

	{font-family:"Cambria Math";

	panose-1:2 4 5 3 5 4 6 3 2 4;

	mso-font-charset:0;

	mso-generic-font-family:roman;

	mso-font-pitch:variable;

	mso-font-signature:-1610611985 1107304683 0 0 159 0;}

@font-face

	{font-family:Tahoma;

	panose-1:2 11 6 4 3 5 4 4 2 4;

	mso-font-charset:0;

	mso-generic-font-family:swiss;

	mso-font-pitch:variable;

	mso-font-signature:1627400839 -2147483648 8 0 66047 0;}

 /* Style Definitions */

 p.MsoNormal, li.MsoNormal, div.MsoNormal

	{mso-style-unhide:no;

	mso-style-qformat:yes;

	mso-style-parent:"";

	margin:0cm;

	margin-bottom:.0001pt;

	mso-pagination:widow-orphan;

	font-size:12.0pt;

	mso-bidi-font-size:10.0pt;

	font-family:"Arial","sans-serif";

	mso-fareast-font-family:"Times New Roman";

	mso-bidi-font-family:"Times New Roman";

	mso-no-proof:yes;}

@page Section1

	{size:595.3pt 841.9pt;

	margin:24.9pt 20.4pt 0cm 20.4pt;

	mso-header-margin:36.0pt;

	mso-footer-margin:36.0pt;

	mso-paper-source:4;}

div.Section1

	{page:Section1;}

-->

</style>

<!--[if gte mso 10]>

<style>

 /* Style Definitions */

 table.MsoNormalTable

	{mso-style-name:"Tabela normal";

	mso-tstyle-rowband-size:0;

	mso-tstyle-colband-size:0;

	mso-style-noshow:yes;

	mso-style-unhide:no;

	mso-style-parent:"";

	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;

	mso-para-margin:0cm;

	mso-para-margin-bottom:.0001pt;

	mso-pagination:widow-orphan;

	font-size:10.0pt;

	font-family:"Times New Roman","serif";}

	

	.MsoNormal{

margin-top:0cm;margin-right:4.5pt;margin-bottom:

  0cm;margin-left:4.5pt;margin-bottom:.0001pt	

	}

	

	.MsoNormal span{

	font-size:8.0pt;

  font-family:"Tahoma","sans-serif"

  }

</style>

<![endif]-->

</head>



<body lang=PT-BR style=\'tab-interval:35.4pt\'>



<div class=Section1>



<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0

 style=\'border-collapse:collapse;mso-padding-top-alt:0cm;mso-padding-bottom-alt:

 0cm\'>';

	

	$i=0;

setlocale(LC_ALL, 'pt_BR');

	while($mostrar = mysql_fetch_array($query_busca)) {

	

		$nome=$mostrar['name'];

		$endereco=ucfirst(strtolower($mostrar['endereco_res']));

		$complemento=ucfirst(strtolower($mostrar['complemento_res']));

		$bairro=ucfirst(strtolower($mostrar['bairro_res']));

		$cidade=ucfirst(strtolower($mostrar['cidade_res']));

		$estado=ucfirst(strtolower($mostrar['estado_res']));

		$cep=ucfirst(strtolower($mostrar['cep_res']));

	

		// monta html

		if($i%2 == 0) $html .= "<tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;height:72.0pt'>";

		switch($i%2) {

			case 0 : //primeira coluna

			$html .= "<td width=308 style='width:308px;padding:7px 10px 7px 10px;height:153px;text-align:left'>

						  <p class=MsoNormal style=''><span style='font-weight:bold; text-transform:uppercase;'>$nome<o:p></o:p></span></p>

						  <p class=MsoNormal ><span style='text-transform:uppercase;' >$endereco $complemento<o:p></o:p></span></p>

						  <p class=MsoNormal ><span style='text-transform:uppercase;' >$bairro - $cidade - $estado<o:p></o:p></span></p>

						  <p class=MsoNormal ><span style='text-transform:lowercase;' >$cep<o:p></o:p></span></p>

					  </td>

					  <td width=15 style='width:15px;height:153px'>

						<p class=MsoNormal ><span ><o:p>&nbsp;</o:p></span></p>

					  </td>";

			break;

			case 1: //segunda coluna

				$html .= "<td width=308 style='width:308px;padding:7px 10px 7px 10px;height:153px;text-align:left'>

							  <p class=MsoNormal ><span style='font-weight:bold; text-transform:uppercase;' >$nome<o:p></o:p></span></p>

							  <p class=MsoNormal ><span style='text-transform:uppercase;' >$endereco $complemento<o:p></o:p></span></p>

							  <p class=MsoNormal ><span style='text-transform:uppercase;' >$bairro - $cidade/$estado<o:p></o:p></span></p>

							  <p class=MsoNormal ><span style='text-transform:lowercase;' >$cep<o:p></o:p></span></p>

						  </td>

						 ";

			break;

		}

					

		if($i%2 == 1) $html .= "</tr>";

		

		$i++;

	

	}//WHILE PESQUISA

	

	$html .= "</table>



	<p class=MsoNormal><span style='display:none;mso-hide:all'><o:p>&nbsp;</o:p></span></p>

	

	</div>

	

	</body>

	

	</html>

	";

	

	header('Content-Type: application/vnd.ms-word');

	header('Content-Disposition: attachment; filename=associados-pleno-'.date('d-m-Y-His').'.doc');

	header('Pragma: no-cache');

	header('Expires: 0');

	print $html;

	exit;



?>