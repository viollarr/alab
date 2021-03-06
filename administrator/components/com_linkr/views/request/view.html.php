<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

/*
 * JSON request view
 */
class LinkrViewRequest extends JView
{
	function display($tpl = null)
	{
		// No error reporting
		if (!LinkrHelper::debug()) {
			error_reporting(0);
			ini_set('display_errors', 0);
		}
		
		// Frontpage hack
		$this->addTemplatePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'views'.DS.'request'.DS.'tmpl');
		
		// JSON wrapper
		if (!function_exists('json_encode')) {
			$this->addHelperPath(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers');
			$this->loadHelper('json');
		}
		
		// Send results
		echo $this->get('Request');
		
		// Shutdown application
		global $mainframe;
		$mainframe->close();
	}
}

