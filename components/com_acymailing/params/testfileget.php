<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JElementTestfileget extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		JHTML::_('behavior.modal');
		if(!include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php')){
			return 'This module can not work without the AcyMailing Component';
		}
		$config =& acymailing::config();
		$itemid = $config->get('itemid');
		$item = empty($itemid) ? '' : '&Itemid='.$itemid;
		$link = ACYMAILING_LIVE.'index.php?option=com_acymailing&tmpl=component&gtask=moduleloader&task=test'.$item;
		$text = '<a class="modal" title="Test"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 600, y: 150}}"><button onclick="return false">Test</button></a>';
		return $text;
	}
}
