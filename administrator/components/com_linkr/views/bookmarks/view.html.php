<?php
defined('_JEXEC') or die;

// Import librairies
jimport('joomla.application.component.view');

class LinkrViewBookmarks extends JView
{
	function display($tpl = null)
	{
		// Sub menu
		JSubMenuHelper::addEntry(JText::_('DOCUMENTATION'), index .'&view=docs');
		JSubMenuHelper::addEntry(JText::_('BOOKMARKS'), index .'&view=bookmarks', true);
		JSubMenuHelper::addEntry('CSS', index .'&view=css');
		JSubMenuHelper::addEntry(JText::_('IN_EX'), index .'&view=export');
		
		// Toolbar
		JToolBarHelper::title(JText::_('BOOKMARKS'), 'bookmarks');
		JToolBarHelper::deleteListX(JText::_('VALIDDELETEITEMS', true));
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		
		$doc	= & JFactory::getDocument();
		$doc->addStyleDeclaration(
			'.icon-48-bookmarks{'.
				'background-image:url(components/com_linkr/assets/icon.bms.png);'.
			'}'
		);
		
		$this->assignRef('bookmarks', $this->get('Bookmarks'));
		$this->assignRef('page', $this->get('Pagination'));
		$this->assignRef('order', $this->get('Order'));
		
		parent::display($tpl);
	}
}
