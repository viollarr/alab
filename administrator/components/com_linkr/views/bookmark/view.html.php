<?php defined('_JEXEC') or die;
/**
 * Bookmark view for Link component
 * 
 * @package	Linkr
 * @author	Frank
 */

// Import librairies
jimport( 'joomla.application.component.view' );

class LinkrViewBookmark extends JView
{
	/**
	 * display method of bookmark view
	 * @return void
	 **/
	function display($tpl = null)
	{
		// Toolbar
		$bookmark	= & $this->get( 'Bookmark' );
		$isNew		= ( $bookmark->id < 1 );
		$text 		= $isNew ? JText::_( 'NEW' ) : JText::_( 'EDIT' );
		JToolBarHelper::title( JText::_( 'BOOKMARK' ).': <small><small>[ ' . $text.' ]</small></small>', 'bookmark' );
		JToolBarHelper::save();
		JToolBarHelper::apply();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			JToolBarHelper::cancel('cancel', JText::_('CLOSE'));
		}
		
		JHTML::_('behavior.modal');
		$doc	= & JFactory::getDocument();
		$doc->addStyleDeclaration(
			'.icon-48-bookmark{'.
				'background-image:url(components/com_linkr/assets/icon.bm.png);'.
			'}'
		);
		
		$this->assignRef('bookmark', $bookmark);
		$this->assignRef('lists', $this->get('Lists'));
		
		parent::display($tpl);
	}
}
