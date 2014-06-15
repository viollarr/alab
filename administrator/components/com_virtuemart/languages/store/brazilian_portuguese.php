<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* ================================================================================
* CORRIGIDO PARA O PORTUGU�S DO BRASIL - CORRECTED TO BRAZILIAN PORTUGUESE
* v.1.9.2 - Fernando Soares - http://www.fernandosoares.com.br - 28-Out-2009
* Para (To): VirtueMart 1.1.x
* ================================================================================
*
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2008 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'ISO-8859-1',
	'PHPSHOP_USER_FORM_FIRST_NAME' => 'Nome',
	'PHPSHOP_USER_FORM_LAST_NAME' => 'Sobrenome',
	'PHPSHOP_USER_FORM_MIDDLE_NAME' => 'Nome do Meio',
	'PHPSHOP_USER_FORM_COMPANY_NAME' => 'Empresa',
	'PHPSHOP_USER_FORM_ADDRESS_1' => 'Endere�o',
	'PHPSHOP_USER_FORM_ADDRESS_2' => 'Bairro',
	'PHPSHOP_USER_FORM_CITY' => 'Cidade',
	'PHPSHOP_USER_FORM_STATE' => 'Estado',
	'PHPSHOP_USER_FORM_ZIP' => 'CEP (apenas n�meros)',
	'PHPSHOP_USER_FORM_COUNTRY' => 'Pa�s',
	'PHPSHOP_USER_FORM_PHONE' => 'Telefone',
	'PHPSHOP_USER_FORM_PHONE2' => 'Celular',
	'PHPSHOP_USER_FORM_FAX' => 'CPF/CNPJ',
	'PHPSHOP_ISSHIP_LIST_PUBLISH_LBL' => 'Ativo',
	'PHPSHOP_ISSHIP_FORM_UPDATE_LBL' => 'Configurar M�todo de Envio',
	'PHPSHOP_STORE_FORM_FULL_IMAGE' => 'Imagem',
	'PHPSHOP_STORE_FORM_UPLOAD' => 'Carregar Imagem',
	'PHPSHOP_STORE_FORM_STORE_NAME' => 'Nome da Loja',
	'PHPSHOP_STORE_FORM_COMPANY_NAME' => 'Nome da Empresa',
	'PHPSHOP_STORE_FORM_ADDRESS_1' => 'Endere�o',
	'PHPSHOP_STORE_FORM_ADDRESS_2' => 'Bairro',
	'PHPSHOP_STORE_FORM_CITY' => 'Cidade',
	'PHPSHOP_STORE_FORM_STATE' => 'Estado',
	'PHPSHOP_STORE_FORM_COUNTRY' => 'Pa�s',
	'PHPSHOP_STORE_FORM_ZIP' => 'CEP (apenas n�meros)',
	'PHPSHOP_STORE_FORM_CURRENCY' => 'Moeda',
	'PHPSHOP_STORE_FORM_LAST_NAME' => 'Nome',
	'PHPSHOP_STORE_FORM_FIRST_NAME' => 'Sobrenome',
	'PHPSHOP_STORE_FORM_MIDDLE_NAME' => 'Nome do Meio',
	'PHPSHOP_STORE_FORM_TITLE' => 'T�tulo',
	'PHPSHOP_STORE_FORM_PHONE_1' => 'Telefone 1',
	'PHPSHOP_STORE_FORM_PHONE_2' => 'Telefone 2',
	'PHPSHOP_STORE_FORM_DESCRIPTION' => 'Descri��o',
	'PHPSHOP_PAYMENT_METHOD_LIST_LBL' => 'Lista de M�todos de Pagamento',
	'PHPSHOP_PAYMENT_METHOD_LIST_NAME' => 'Nome',
	'PHPSHOP_PAYMENT_METHOD_LIST_CODE' => 'C�digo',
	'PHPSHOP_PAYMENT_METHOD_LIST_SHOPPER_GROUP' => 'Grupo de Clientes',
	'PHPSHOP_PAYMENT_METHOD_LIST_ENABLE_PROCESSOR' => 'Tipo de m�todo de pagamento',
	'PHPSHOP_PAYMENT_METHOD_FORM_LBL' => 'Formul�rio do M�todo de Pagamento',
	'PHPSHOP_PAYMENT_METHOD_FORM_NAME' => 'Nome do M�todo de Pagamento',
	'PHPSHOP_PAYMENT_METHOD_FORM_SHOPPER_GROUP' => 'Grupo de cliente',
	'PHPSHOP_PAYMENT_METHOD_FORM_DISCOUNT' => 'Desconto',
	'PHPSHOP_PAYMENT_METHOD_FORM_CODE' => 'C�digo',
	'PHPSHOP_PAYMENT_METHOD_FORM_LIST_ORDER' => 'Ordem na listagem',
	'PHPSHOP_PAYMENT_METHOD_FORM_ENABLE_PROCESSOR' => 'Tipo de m�todo de pagamento',
	'PHPSHOP_PAYMENT_FORM_CC' => 'Cart�o de Cr�dito',
	'PHPSHOP_PAYMENT_FORM_USE_PP' => 'Usar Processamento de Pagamento',
	'PHPSHOP_PAYMENT_FORM_BANK_DEBIT' => 'D�bito banc�rio',
	'PHPSHOP_PAYMENT_FORM_AO' => 'Apenas endere�o / Dinheiro na Entrega',
	'PHPSHOP_STATISTIC_STATISTICS' => 'Estat�sticas',
	'PHPSHOP_STATISTIC_CUSTOMERS' => 'Clientes',
	'PHPSHOP_STATISTIC_ACTIVE_PRODUCTS' => 'Produtos ativos',
	'PHPSHOP_STATISTIC_INACTIVE_PRODUCTS' => 'Produtos inativos',
	'PHPSHOP_STATISTIC_NEW_ORDERS' => 'Novos Pedidos',
	'PHPSHOP_STATISTIC_NEW_CUSTOMERS' => 'Novos Clientes',
	'PHPSHOP_CREDITCARD_NAME' => 'Nome do Cart�o de Cr�dito',
	'PHPSHOP_CREDITCARD_CODE' => 'Cart�o de Cr�dito - C�digo Curto',
	'PHPSHOP_YOUR_STORE' => 'Sua Loja',
	'PHPSHOP_CONTROL_PANEL' => 'Painel de Controle',
	'PHPSHOP_CHANGE_PASSKEY_FORM' => 'Mostrar/Mudar a Senha/Chave de Transa��o',
	'PHPSHOP_TYPE_PASSWORD' => 'Por favor digite sua Senha de Usu�rio',
	'PHPSHOP_CURRENT_TRANSACTION_KEY' => 'Chave de Transa��o Atual',
	'PHPSHOP_CHANGE_PASSKEY_SUCCESS' => 'A chave de transa��o foi modificada com sucesso.',
	'VM_PAYMENT_CLASS_NAME' => 'Nome da classe de pagamento',
	'VM_PAYMENT_CLASS_NAME_TIP' => '(ex. <strong>ps_netbanx</strong>) :<br />
padr�o: ps_payment<br />
<i>Deixe em branco se voc� n�o tem certeza do que deve preencher!</i>',
	'VM_PAYMENT_EXTRAINFO' => 'Informa��es Extra do Pagamento',
	'VM_PAYMENT_EXTRAINFO_TIP' => 'S�o exibidas na P�gina de Confirma��o de Pedido. Pode ser: Formul�rio em C�digo HTML do seu Provedor de Servi�os de Pagamento, Sugest�es ao cliente, etc.',
	'VM_PAYMENT_ACCEPTED_CREDITCARDS' => 'Tipos de Cart�o de Cr�dito Aceitos',
	'VM_PAYMENT_METHOD_DISCOUNT_TIP' => 'Para transformar o desconto em uma taxa, use um valor negativo aqui (Exemplo: <strong>-2.00</strong>).',
	'VM_PAYMENT_METHOD_DISCOUNT_MAX_AMOUNT' => 'Quantia m�xima de desconto',
	'VM_PAYMENT_METHOD_DISCOUNT_MIN_AMOUNT' => 'Quantia m�nima de desconto',
	'VM_PAYMENT_FORM_FORMBASED' => 'Baseado em formul�rio HTML (ex. PayPal)',
	'VM_ORDER_EXPORT_MODULE_LIST_LBL' => 'Lista de M�dulos de Exporta��o',
	'VM_ORDER_EXPORT_MODULE_LIST_NAME' => 'Nome',
	'VM_ORDER_EXPORT_MODULE_LIST_DESC' => 'Descri��o',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES' => 'Lista de moedas aceitas',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES_TIP' => 'Esta lista define todas as moedas que voc� aceita quando as pessoas est�o comprando qualquer coisa na sua loja. <strong>Nota:</strong> Todas as moedas selecionadas aqui podem ser usadas na finaliza&ccedil;�&atilde;o! Se voc� n�o deseja isso, basta selecionar a moeda de seu pa�s (=padr�o).',
	'VM_EXPORT_MODULE_FORM_LBL' => 'Formul�rio do M�dulo de Exporta��o',
	'VM_EXPORT_MODULE_FORM_NAME' => 'Nome do M�dulo de Exporta��o',
	'VM_EXPORT_MODULE_FORM_DESC' => 'Descri��o',
	'VM_EXPORT_CLASS_NAME' => 'Nome da Classe de Exporta��o',
	'VM_EXPORT_CLASS_NAME_TIP' => '(ex. <strong>ps_orders_csv</strong>) :<br /> padr�o: ps_xmlexport<br /> <i>Deixe em branco se voc� n�o tem certeza do que deve preencher!</i>',
	'VM_EXPORT_CONFIG' => 'Configura��o dos Extras da Exporta��o',
	'VM_EXPORT_CONFIG_TIP' => 'Define a configura��o de expota��o para m�dulos de exporta��o definidos pelo usu�rio ou define configura��es adicionais de configura��o. O c�digo  precisa ser um c�digo PHP v�lido.',
	'VM_SHIPPING_MODULE_LIST_NAME' => 'Nome',
	'VM_SHIPPING_MODULE_LIST_E_VERSION' => 'Vers�o',
	'VM_SHIPPING_MODULE_LIST_HEADER_AUTHOR' => 'Autor',
	'PHPSHOP_STORE_ADDRESS_FORMAT' => 'Formato do Endere�o da Loja',
	'PHPSHOP_STORE_ADDRESS_FORMAT_TIP' => 'Voc� pode usar os seguintes coringas aqui',
	'PHPSHOP_STORE_DATE_FORMAT' => 'Formato de Data da Loja',
	'VM_PAYMENT_METHOD_ID_NOT_PROVIDED' => 'Erro: ID do M�todo de Pagamento n�o fornecido.',
	'VM_SHIPPING_MODULE_CONFIG_LBL' => 'Configura��o do M�dulo de Envio',
	'VM_SHIPPING_MODULE_CLASSERROR' => 'N�o foi poss�vel instanciar a Classe {shipping_module}'
); $VM_LANG->initModule( 'store', $langvars );
?>