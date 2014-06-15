<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Favicon
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

class PhocaFaviconCpControllerPhocaFavicon extends PhocaFaviconCpController
{
	function __construct()
	{
		parent::__construct();
		$this->registerTask( 'create'  , 'create' );
		$this->registerTask( 'favicon'  , 'favicon' );
	}
	function favicon()
	{
		$msg = JText::_( 'Phoca Favicon successfully created' );
		$link = 'index.php?option=com_phocafavicon';
		$this->setRedirect($link, $msg);
	}

	function create()
	{
		$post			= JRequest::get('post');
		$model = $this->getModel( 'phocafavicon' );

		if ($model->create($post)) {
			$msg = JText::_( 'Phoca Favicon successfully created' );
		} else {
			$msg = JText::_( 'Error Creating Phoca Favicon' );
		}

		$link = 'index.php?option=com_phocafavicon';
		$this->setRedirect($link, $msg);
	}

	function cancel()
	{
		$link = 'index.php?option=com_phocafavicon';
		$this->setRedirect($link, $msg);
	}
}
?>
