<?php
/**
* @version		$Id: view.html.php 11673 2009-03-08 20:41:00Z willebil $
* @package		Joomla
* @subpackage	Registration
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Registration component
 *
 * @package		Joomla
 * @subpackage	Registration
 * @since 1.0
 */
class UserViewRegister extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		// Check if registration is allowed
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		if (!$usersConfig->get( 'allowUserRegistration' )) {
			JError::raiseError( 403, JText::_( 'Access Forbidden' ));
			return;
		}
		$pathway  =& $mainframe->getPathway();
		$document =& JFactory::getDocument();
		$params	= &$mainframe->getParams();

		//$document->addScript( '/alab/www/media/system/js/jquery.maskedinput-1.3.js' ); // usar localmente
		//$document->addScript( '/media/system/js/jquery.maskedinput-1.3.js' ); // usar no servidor


	 	// Page Title
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	JText::_( 'Registration' ));
			}
		} else {
			$params->set('page_title',	JText::_( 'Registration' ));
		}
		$document->setTitle( $params->get( 'page_title' ) );

		$pathway->addItem( JText::_( 'New' ));
		
		JHTML::_('behavior.formvalidation');

		
		$db 		=& JFactory::getDBO();
		
		$user 		=& JFactory::getUser();

		$query = 'SELECT cod_estados, nome, sigla FROM ev_estados ORDER BY nome'; 
		$db->setQuery( $query ); 
		$estados = $db->loadAssocList(); 
		 
		$query = 'SELECT cod_cidades, nome FROM ev_cidades WHERE estados_cod_estados = "'.$user->get('id_estado_res').'"  ORDER BY nome'; 
		$db->setQuery( $query ); 
		$cidades_res = $db->loadAssocList();

		$query = 'SELECT cod_cidades, nome FROM ev_cidades WHERE estados_cod_estados = "'.$user->get('id_estado_prof').'"  ORDER BY nome'; 
		$db->setQuery( $query ); 
		$cidades_prof = $db->loadAssocList();

		// Load the form validation behavior
		
		$this->assignRef('user', 			$user);
		$this->assignRef('estados',			$estados);
		$this->assignRef('cidades_res',		$cidades_res);	
		$this->assignRef('cidades_prof',	$cidades_prof);	
		$this->assignRef('params',			$params);
		parent::display($tpl);
	}
}
