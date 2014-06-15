<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class contentorderType{
	function contentorderType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', "|order:id,DESC",JText::_('ID'));
		$this->values[] = JHTML::_('select.option', "|order:ordering,ASC",JText::_('ORDERING'));
		$this->values[] = JHTML::_('select.option', "|order:created,DESC",JText::_('CREATED_DATE'));
		$this->values[] = JHTML::_('select.option', "|order:modified,DESC",JText::_('MODIFIED_DATE'));
		$this->values[] = JHTML::_('select.option', "|order:title,ASC",JText::_('TITLE'));
	}
	function display($map,$value){
		return JHTML::_('select.genericlist', $this->values, $map , 'size="1" onclick="updateTag();"', 'value', 'text', (string) $value);
	}
}