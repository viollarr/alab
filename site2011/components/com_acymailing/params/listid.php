<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JElementListid extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php');
		$listType = acymailing::get('type.lists');
		array_shift($listType->values);
		return $listType->display($control_name.'[listid]',(int) $value,false);
	}
}