<?php
/**
 * Main File
 *
 * @package     Modules Anywhere
 * @version     1.3.4
 *
 * @author      Peter van Westen <peter@nonumber.nl>
 * @link        http://www.nonumber.nl
 * @copyright   Copyright (C) 2010 NoNumber! All Rights Reserved
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// Ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport( 'joomla.event.plugin' );

/**
* Plugin that loads modules
*/
class plgSystemModulesAnywhere extends JPlugin
{
	/**
	* Constructor
	*
	* For php4 compatability we must not use the __constructor as a constructor for
	* plugins because func_get_args ( void ) returns a copy of all passed arguments
	* NOT references.  This causes problems with cross-referencing necessary for the
	* observer design pattern.
	*/
	function plgSystemModulesAnywhere( &$subject, $config )
	{
		$mainframe =& JFactory::getApplication();
		$option = JRequest::getCmd( 'option' );

		// return if current page is an administrator page
		// or a joomfishplus page
		if ( $mainframe->isAdmin() || $option == 'com_joomfishplus' ) { return; }

		parent::__construct( $subject );

		//load the language file
		$this->loadLanguage();

		// Include the Helper
		require_once JPATH_SITE.DS.'plugins'.DS.'system'.DS.'modulesanywhere'.DS.'helper.php';
		$this->helper = new plgSystemModulesAnywhereHelper;

		// Load plugin parameters
		$params = new JParameter( $config['params'], JPATH_PLUGINS.DS.$config['type'].DS.$config['name'].'.xml' );
		$this->helper->init( $params );
	}

	function onPrepareContent( &$article )
	{
		$this->helper->replaceInArticles( $article );
	}

	function onAfterDispatch()
	{
		$this->helper->replaceInComponents();
	}

	function onAfterRender()
	{
		$this->helper->replaceInOtherAreas();
	}
}