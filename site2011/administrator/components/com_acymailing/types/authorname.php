<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class authornameType{
	function authornameType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', "|author",JText::_('Yes'));
		$this->values[] = JHTML::_('select.option', "",JText::_('No'));
	}
	function display($map,$value){
		return JHTML::_('select.radiolist', $this->values, $map , 'size="1" onclick="updateTag();"', 'value', 'text', (string) $value);
	}
}