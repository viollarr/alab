<?
define('_SITE_PATH',$pathComRel);
$dadosboleto["bank"]    = $boleto->bco_nome_arquivo;

// DADOS DO BOLETO PARA O SEU CLIENTE
$taxa_boleto = 0;
$data_venc = date("d/m/Y",strtotime($boleto->bto_vencimento));  // Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado = $boleto->bto_valor;	//$boleto->bto_valor; // Valor - REGRA: Tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $boleto->bto_id;  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = $boleto->emissao; // Data de emissão do Boleto
$dadosboleto["data_processamento"] = $boleto->emissao; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boleto->cli_nome;
$dadosboleto["endereco1"] = $boleto->cli_end." - ".$boleto->cli_bairro;
$dadosboleto["endereco2"] = $boleto->cli_cep." - ".$boleto->cty_name." - ".$boleto->ste_abbr;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de publicidade (anuidade) no site da Focalizar.com.br";
$dadosboleto["demonstrativo2"] = "";//"Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".$taxa_boleto;
$dadosboleto["demonstrativo3"] = "";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Cobrar juros de mora de 2% ao mês";
$dadosboleto["instrucoes3"] = "<br />- Emitido pela Focalizar Publicidade Inteligente na Internet";
$dadosboleto["instrucoes4"] = "Em caso de dúvidas não hesite em entrar em contato conosco!
<br />Email:  falecom@focalizar.com.br
<br />Telefone: 47-3429-9355 - Site: www.focalizar.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"]      = "001";
$dadosboleto["valor_unitario"]  = $valor_boleto;
$dadosboleto["aceite"]          = "";
$dadosboleto["uso_banco"]       = "";
$dadosboleto["especie"]         = "R$";
$dadosboleto["especie_doc"]     = "DS";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"]         = $boleto->bco_agencia; // Num da agencia, sem digito
$dadosboleto["agencia_dv"]      = $boleto->bco_ag_dv; // Digito do Num da agencia
$dadosboleto["conta"]           = $boleto->bco_conta; 	// Num da conta, sem digito
$dadosboleto["conta_dv"]        = $boleto->bco_conta_dv; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"]   = $boleto->bco_cedente; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"]= $boleto->bco_cedente_dv; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"]        = $boleto->bco_carteira;  // Código da Carteira

// SEUS DADOS
$dadosboleto["identificacao"]   = "Focalizar Publicidade Inteligente na Internet";
$dadosboleto["cpf_cnpj"]        = "08.217.369/0001-62";
$dadosboleto["endereco"]        = "Rua Cerro azul, 1307";
$dadosboleto["cidade_uf"]       = "Joinville - SC";
$dadosboleto["cedente"]         = "Focalizar Publicidade LTDA";

// NÃO ALTERAR!
include($pathCom."include/funcoes_".$dadosboleto["bank"].".php");
include($pathCom."include/layout_".$dadosboleto["bank"].".php");



?>
