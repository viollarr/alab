<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class LinkrViewExport extends JView
{
	function display($tpl = null)
	{
		// Sub menu
		JSubMenuHelper::addEntry(JText::_('DOCUMENTATION'), index .'&view=docs');
		JSubMenuHelper::addEntry(JText::_('BOOKMARKS'), index .'&view=bookmarks');
		JSubMenuHelper::addEntry('CSS', index .'&view=css');
		JSubMenuHelper::addEntry(JText::_('IN_EX'), index .'&view=export', true);
		
		// Toolbar
		JToolBarHelper::title(JText::_('BOOKMARKS') .' - '. JText::_('IN_EX'), 'export');
		
		// Content styles
		$doc	= & JFactory::getDocument();
		$doc->addStyleDeclaration(
			'.icon-48-export{'.
				'background-image:url(images/backup.png);'.
			'}'
		);
		
		parent::display($tpl);
	}
}
