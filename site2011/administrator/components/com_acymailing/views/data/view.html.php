<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class dataViewdata extends JView
{
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function import(){
		$listClass = acymailing::get('class.list');
		acymailing::setTitle(JText::_('IMPORT'),'import','data&task=import');
		$bar = & JToolBar::getInstance('toolbar');
		JToolBarHelper::custom('doimport', 'import', '',JText::_('IMPORT'), false);
		$bar->appendButton( 'Link', 'cancel', JText::_('CANCEL'), acymailing::completeLink('subscriber') );
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','data-import');
		$this->assignRef('importtype',acymailing::get('type.import'));
		$this->assignRef('lists',$listClass->getLists());
	}
	function export(){
		$listClass = acymailing::get('class.list');
		$db =& JFactory::getDBO();
		$fields = reset($db->getTableFields(acymailing::table('subscriber')));
		acymailing::setTitle(JText::_('EXPORT'),'export','data&task=export');
		$bar = & JToolBar::getInstance('toolbar');
		JToolBarHelper::custom('doexport', 'export', '',JText::_('EXPORT'), false);
		$bar->appendButton( 'Link', 'cancel', JText::_('CANCEL'), acymailing::completeLink('subscriber') );
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','data-export');
		$this->assignRef('charset',$charsetType = acymailing::get('type.charset'));
		$this->assignRef('lists',$listClass->getLists());
		$this->assignRef('fields',$fields);
	}
}
