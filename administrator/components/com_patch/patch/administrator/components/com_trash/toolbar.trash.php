<?php
/**
* @version $Id: toolbar.trash.php 10002 2008-02-08 10:56:57Z willebil $
* @package Joomla
* @subpackage Trash
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
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

	case 'settings':
		TOOLBAR_Trash::_SETTINGS();
		break;

	case 'restoreconfirm':
	case 'deleteconfirm':
		TOOLBAR_Trash::_DELETE();
		break;

	default:
		TOOLBAR_Trash::_DEFAULT();
		break;
}
?>