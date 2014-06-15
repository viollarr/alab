<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class JElementHelp extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		JHTML::_('behavior.modal');
		$link = 'http://www.ijoobi.com/Help/jNews/How-to-configure-your-jNews-module.html';
		$text = '<a class="modal" title="'.JText::_('HELP',true).'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 900, y: 500}}"><button onclick="return false">'.JText::_('HELP').'</button></a>';
		return $text;
	}
}
