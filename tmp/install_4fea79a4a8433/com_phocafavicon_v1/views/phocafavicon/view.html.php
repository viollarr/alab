<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Favicon
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class PhocaFaviconCpViewPhocaFavicon extends JView
{

	function display($tpl = null)
	{
		global $mainframe;
		
		if($this->getLayout() == 'default') {
			$this->_displayForm($tpl);
			return;
		}
		parent::display($tpl);
	}

	function _displayForm($tpl)
	{
		global $mainframe, $option;

		$db		=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();
		
		JHTML::stylesheet( 'phocafavicon.css', 'administrator/components/com_phocafavicon/assets/' );
		//Data from model
		$phocafavicon	=& $this->get('Data');
		
		//Image button
		$link = 'index.php?option=com_phocafavicon&amp;view=phocafaviconi&amp;tmpl=component';
		JHTML::_('behavior.modal', 'a.modal-button');
		$button = new JObject();
		$button->set('modal', true);
		$button->set('link', $link);
		$button->set('text', JText::_( 'Image' ));
		$button->set('name', 'image');
		$button->set('modalname', 'modal-button');
		$button->set('options', "{handler: 'iframe', size: {x: 620, y: 400}}");
		
		// Set toolbar items for the page
		$text = JText::_( 'Create Favicon' );
		JToolBarHelper::title(   JText::_( 'Phoca Favicon' ).': <small><small>[ ' . $text.' ]</small></small>', 'favicon' );
		JToolBarHelper::customX('Create', 'new.png', '', JText::_( 'Create' ), false);
		JToolBarHelper::cancel( 'cancel', 'Close' );
		JToolBarHelper::help( 'screen.phocafavicon', true );

		$lists = array();
		$lists['template'] = '<select name="template" id="template" class="inputbox" size="1" >'
							.'<option value="0"  selected="selected">- '.JText::_( 'SELECT A TEMPLATE' ).' -</option>';
		foreach ($phocafavicon as $key =>$value)
		{
			$lists['template']	.= '<option value="'.$value->name.'" >'.$value->name.'</option>';
		}
		$lists['template']	.= '</select>';
		
		$this->assignRef('lists', $lists);
		$this->assignRef('button', $button);
		$this->assignRef('request_url',	$uri->toString());

		parent::display($tpl);
	}
}
?>
