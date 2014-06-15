<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class vmgroupsType{
	function vmgroupsType(){
		$this->values = array();
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT * FROM `#__vm_shopper_group` ORDER BY `shopper_group_name` ASC');
		$allGroups = $db->loadObjectList();
		foreach($allGroups as $oneGroup){
			$this->values[] = JHTML::_('select.option',$oneGroup->shopper_group_id,$oneGroup->shopper_group_name);
		}
	}
	function display($map){
		return JHTML::_('select.genericlist', $this->values, $map, 'class="inputbox" size="1"', 'value', 'text');
	}
}