<?php
/**
 * @version		$Id: view.html.php 945 2008-06-09 17:28:15Z Fritz Elfert $
 * @copyright	Copyright (C) 2008 Fritz Elfert. All rights reserved.
 * @license		GNU/GPLv2
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Grabber View
 */
class AvReloadedViewGrabber extends JView
{
    /**
     * display method of Grabber view
     * @return void
     **/
    function display($tpl = null)
    {
        //get the hello
        JToolBarHelper::title(JText::_('AVR_TITLE_GRABBER').' - AllVideos Reloaded');
        JToolBarHelper::save();
        JToolBarHelper::cancel();
        parent::display($tpl);
    }
}
