<?php
defined('_JEXEC') or die;
/**
 * CSS edit view for Link component
 * 
 * @package	Linkr
 * @author		Frank
 */

// Import librairies
jimport( 'joomla.application.component.view' );

class LinkrViewCss extends JView
{
	/**
	 * display method of css view
	 * @return void
	 **/
	function display($tpl = null)
	{
		// Sub menu
		JSubMenuHelper::addEntry(JText::_('DOCUMENTATION'), index .'&view=docs');
		JSubMenuHelper::addEntry(JText::_('BOOKMARKS'), index .'&view=bookmarks');
		JSubMenuHelper::addEntry('CSS', index .'&view=css', true);
		JSubMenuHelper::addEntry(JText::_('IN_EX'), index .'&view=export');
		
		// Toolbar
		JToolBarHelper::title('CSS', 'css');
		JToolBarHelper::save();
		
		$doc	= & JFactory::getDocument();
		$doc->addStyleDeclaration(
			'.icon-48-css{'.
				'background-image:url(components/com_linkr/assets/icon.pad.png);'.
			'}'.
			'textarea.text_area{'.
				'width:100%;'.
				'height:200px;'.
			'}'
		);
		
		// References
		$this->assignRef('css', $this->get('CSS'));
		
		parent::display($tpl);
	}
}
