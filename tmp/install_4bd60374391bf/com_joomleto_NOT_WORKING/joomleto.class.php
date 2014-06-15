<?php
/**
* @version $Id: joomleto.class.php 5072 2006-09-15 22:56:27Z friesengeist $
* @package Joomla
* @subpackage Joomleto
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

/**
* Category database table class
* @package Joomleto
*/
class jleto_cliente extends mosDBTable {
	/** @var int Primary key */
	var $cli_id				= null;
	/** @var int */
	var $cty_id    			= null;
	/** @var int */
	var $user_id			= null;
	/** @var string */
	var $cli_nome			= null;
	/** @var string */
	var $cli_end			= null;
	/** @var string */
	var $cli_bairro    		= null;
	/** @var int */
	var $cli_cep			= null;
	/** @var bigInt */
	var $cli_cnpj			= null;
	/** @var BigInt */
	var $cli_ie    			= null;


	function jleto_cliente( &$db ) {
		$this->mosDBTable( '#__jleto_cliente', 'cli_id', $db );
	}
	/** overloaded check function */
}

class jleto_banco extends mosDBTable {
	/** @var int Primary key */
	var $bco_id				= null;
    var $bco_nome    		= null;
    var $bco_numero    		= null;
    var $bco_agencia   		= null;
    var $bco_ag_dv    		= null;
    var $bco_conta    		= null;
    var $bco_conta_dv  		= null;
    var $bco_cedente   		= null;
    var $bco_cedente_dv		= null;
    var $bco_carteira  		= null;
    var $bco_nome_arquivo	= null;
    var $bco_published 		= null;
    var $bco_ordem 			= null;

	function jleto_banco( &$db ) {
		$this->mosDBTable( '#__jleto_banco', 'bco_id', $db );
	}
	/** overloaded check function */
}
class jleto_boleto extends mosDBTable {
	/** @var int Primary key */
	var $bto_id				= null;
    var $cli_id				= null;
    var $bco_id				= null;
    var $bto_nosso_numero	= null;
    var $bto_numero_doc		= null;
    var $bto_emissao		= null;
    var $bto_vencimento		= null;
    var $bto_valor			= null;
    var $bto_valor_liquidado= null;
    var $bto_comentario		= null;
    var $bto_acessos    	= null;

	function jleto_boleto( &$db ) {
		$this->mosDBTable( '#__jleto_boleto', 'bto_id', $db );
	}
	/** overloaded check function */
}

?>
