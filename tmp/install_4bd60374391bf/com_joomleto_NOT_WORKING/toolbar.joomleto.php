<?php
/**
* @version $Id: toolbar.weblinks.php 85 2005-09-15 23:12:03Z eddieajau $
* @package Joomla
* @subpackage Weblinks
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

require_once( $mainframe->getPath( 'toolbar_html' ) );

switch ($task) {
	case 'new':
	case 'edit':
	case 'editar_clientes':
            TOOLBAR_joomleto::_EDIT_CUST();
    break;
    case 'editar_banco':
            TOOLBAR_joomleto::_EDIT_BANK();
    break;
    case 'bancos':
            TOOLBAR_joomleto::_SHOW_BANKS();
    break;
    case 'editar_boleto':
            TOOLBAR_joomleto::_EDIT_BOLETO();
    break;
    case 'boletos':
            TOOLBAR_joomleto::_SHOW_BOLETOS();
    break;
    case 'clientes':
            TOOLBAR_joomleto::_SHOW_CLIENTES();
    break;
    default:
            TOOLBAR_joomleto::_DEFAULT();
	break;
}
?>
