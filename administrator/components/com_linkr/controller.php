<?php defined('_JEXEC') or die;
/**
 * Linkr controller
 * 
 * @package	Linkr
 * @author	Frank
 */

jimport('joomla.application.component.controller');

/**
 * Linkr Controller
 *
 * @package	Linkr
 */
class LinkrController extends JController
{
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{
		// Make the documentation the homepage
		if (!JRequest::getVar('view')) {
			JRequest::setVar('view', 'docs');
		}
		
		parent::display();
	}
}

