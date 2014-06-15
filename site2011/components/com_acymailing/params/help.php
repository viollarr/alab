<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JElementHelp extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		JHTML::_('behavior.modal');
		if(!include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php')){
			return 'This module can not work without the AcyMailing Component';
		}
		$config =& acymailing::config();
		$level = $config->get('level');
		$link = ACYMAILING_HELPURL.$value.'&level='.$level;
		$text = '<a class="modal" title="'.JText::_('HELP',true).'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('HELP').'</button></a>';
		return $text;
	}
}
