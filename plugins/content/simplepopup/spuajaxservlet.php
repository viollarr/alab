<?php

/**
 * Simple PopUp - Joomla Plugin
 * 
 * @package    Joomla
 * @subpackage Plugin
 * @author Anders Wasén
 * @link http://wasen.net/
 * @license		GNU/GPL, see LICENSE.php
 * plg_simplefilegallery is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class SPUAjaxServlet {
	
	function getspucontent($sfg_dirlocation)
	{ 
		
		$return .= ModSimplePopUpHelperv10::getPopUp($msg);
		
		echo $return;      
 
	}
}


class ModSimplePopUpHelperv10
{
	function getPopUp($msg) {
	
		return "I was inside getPopUp";
	
	}
	
}

?>
