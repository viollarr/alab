<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.model');

/**
 * CSS edit model for Linkr component
 * 
 * @package	Linkr
 * @author		Frank
 */
class LinkrModelCss extends JModel
{
	function __construct() {
		parent::__construct();
	}
	
	function getCSS()
	{
		// Get params
		$table	= & JTable::getInstance('component');
		$table->loadByOption('com_linkr');
		$params	= new JParameter($table->params);
		
		// Return CSS
		return array(
			'bcss'	=> base64_decode($params->get('bcss', '')),
			'rcss'	=> base64_decode($params->get('rcss', ''))
		);
	}
}
