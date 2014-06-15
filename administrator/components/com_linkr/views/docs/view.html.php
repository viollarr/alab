<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class LinkrViewDocs extends JView
{
	function display($tpl = null)
	{
		// Sub menu
		JSubMenuHelper::addEntry(JText::_('DOCUMENTATION'), index .'&view=docs', true);
		JSubMenuHelper::addEntry(JText::_('BOOKMARKS'), index .'&view=bookmarks');
		JSubMenuHelper::addEntry('CSS', index .'&view=css');
		JSubMenuHelper::addEntry(JText::_('IN_EX'), index .'&view=export');
		
		// Toolbar
		JToolBarHelper::title(JText::_('DOCUMENTATION'), 'info');
		JToolBarHelper::preferences('com_linkr', 200, 600);
		
		// Content styles
		$doc	= & JFactory::getDocument();
		$doc->addStyleDeclaration(
			'.icon-48-info{'.
				'background-image:url(components/com_linkr/assets/icon.docs.png);'.
			'}'.
			'.linkrc{'.
				'padding:0 20px;'.
			'}'.
			'#linkr{'.
				'margin:0 20px;'.
				'padding:5px;'.
				'border:1px solid;'.
			'}'.
			'#linkr:hover{}'
		);
		
		// HTML examples
		define('lTab', '&nbsp;&nbsp;&nbsp;');
		define('lDivL', '&lt;div class=&quot;%s&quot;&gt;');
		define('lDiv', lDivL .'<br/>');
		
		// Template
		$this->assign('about', $this->get('Template'));
		
		// RSS feed
		$this->assignRef('feed', $this->get('RssFeed'));
		
		parent::display($tpl);
	}
}

