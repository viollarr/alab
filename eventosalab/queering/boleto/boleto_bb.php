<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +--------------------------------------------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>              		             				|
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rog�rio Dias Pereira|
// +--------------------------------------------------------------------------------------------------------+


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
	require_once("../../conexao.php");

	$valor_do_boleto_passado=$_POST['valor_boleto'];
	$id_participante=$_POST['id_participante'];
	$id_evento=$_POST['id_evento'];

	if(empty($valor_do_boleto_passado) || empty($id_participante) || empty($id_evento)) exit("Os dados do boleto n�o est�o corretos.");
	
	$dias_de_prazo_para_pagamento = 7;
	$taxa_boleto = 4.50;
	$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
	//$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado=$valor_do_boleto_passado;
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

	$sql_participante = "SELECT id, nome FROM ev_participante WHERE id='".$id_participante."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	
	$sql_pag = "SELECT id FROM ev_pagamento WHERE id_participante='".$id_participante."'";
	$qr_pag = mysql_query($sql_pag, $conexao) or die(mysql_error());
	$ja_tem_pagamento=mysql_num_rows($qr_pag);

	$valor_tabela_pagamento = ($valor_cobrado+$taxa_boleto);
	
	if ($ja_tem_pagamento>0){ // ja solicitou boleto antes - atualiza
				$sql_update = "UPDATE ev_pagamento SET
							   valor = '$valor_tabela_pagamento',
							   pago = 'nao'
					           WHERE id_participante='$id_participante'";	
				mysql_query($sql_update, $conexao);
	}else{ //primeira vez - insere
		$sql_insert_pagamento = "insert into ev_pagamento(id_participante,valor,pago)
					   values('$id_participante','$valor_tabela_pagamento','nao');";	
		mysql_query($sql_insert_pagamento, $conexao);
	}




$dadosboleto["nosso_numero"] = $p['id'];
$dadosboleto["numero_documento"] = $p['id'];	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $p['nome'];
//$dadosboleto["endereco1"] = $p['endereco'];
//$dadosboleto["endereco2"] = $p['cep'];

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a pagamento de evento<br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "www.alab.org.br";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = "";//- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: alab@alab.org.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido por - www.alab.org.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "1";
//$dadosboleto["valor_unitario"] = "10";
$dadosboleto["aceite"] = "N";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - BANCO DO BRASIL
//3603-X
$dadosboleto["agencia"] = "3603"; // Num da agencia, sem digito
$dadosboleto["conta"] = "30184"; 	// Num da conta, sem digito
//30184-1
// DADOS PERSONALIZADOS - BANCO DO BRASIL
$dadosboleto["convenio"] = "2100973";  // Num do conv�nio - REGRA: 6 ou 7 ou 8 d�gitos
//$dadosboleto["contrato"] = "999999"; // Num do seu contrato
$dadosboleto["carteira"] = "17";
//17
$dadosboleto["variacao_carteira"] = "-019";  // Varia��o da Carteira, com tra�o (opcional)

// TIPO DO BOLETO
$dadosboleto["formatacao_convenio"] = "7"; // REGRA: 8 p/ Conv�nio c/ 8 d�gitos, 7 p/ Conv�nio c/ 7 d�gitos, ou 6 se Conv�nio c/ 6 d�gitos
$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Conv�nio c/ 6 d�gitos: informe 1 se for NossoN�mero de at� 5 d�gitos ou 2 para op��o de at� 17 d�gitos

/*
#################################################
DESENVOLVIDO PARA CARTEIRA 18

- Carteira 18 com Convenio de 8 digitos
  Nosso n�mero: pode ser at� 9 d�gitos

- Carteira 18 com Convenio de 7 digitos
  Nosso n�mero: pode ser at� 10 d�gitos

- Carteira 18 com Convenio de 6 digitos
  Nosso n�mero:
  de 1 a 99999 para op��o de at� 5 d�gitos
  de 1 a 99999999999999999 para op��o de at� 17 d�gitos

#################################################
*/


// SEUS DADOS
$dadosboleto["identificacao"] = "ALAB - Associa��o de Lingu�stica Aplicada do Brasil";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Av. Hor�cio Macedo 2151 sala F-317 Cidade Universit�ria - CEP 21.941-917";
$dadosboleto["cidade_uf"] = "Rio de Janeiro / RJ";
$dadosboleto["cedente"] = "ALAB - Associa��o de Lingu�stica Aplicada do Brasil";

// N�O ALTERAR!
include("include/funcoes_bb.php"); 
include("include/layout_bb.php");
?>