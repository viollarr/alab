<?php
/**
 * Grabber controller for AllVideos Reloaded
 *
 * @version		$Id: grabber.php 945 2008-06-09 17:28:15Z Fritz Elfert $
 * @copyright	Copyright (C) 2008 Fritz Elfert. All rights reserved.
 * @license		GNU/GPLv2
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 *  Grabber Controller
 */
class AvReloadedControllerGrabber extends AvReloadedController
{
    /**
     * constructor (registers additional tasks to methods)
     * @return void
     */
    function __construct() {
        parent::__construct();
        // Register Extra tasks
        $this->registerTask('add', 'edit');
    }

    /**
     * display the edit form
     * @return void
     */
    function edit() {
        JRequest::setVar('view', 'grabber');
        JRequest::setVar('layout', 'form');
        JRequest::setVar('hidemainmenu', 1);
        parent::display();
    }

    /**
     * save a record (and redirect to main page)
     * @return void
     */
    function save()
    {
        /*
        $model = $this->getModel('hello');

        if ($model->store($post)) {
            $msg = JText::_( 'Greeting Saved!' );
        } else {
            $msg = JText::_( 'Error Saving Greeting' );
        }

        // Check the table in so it can be edited.... we are done with it anyway
         */
        $link = 'index.php?option=com_avreloaded';
        $this->setRedirect($link, $msg);
    }

    /**
     * remove record(s)
     * @return void
     */
    function remove()
    {
        //$model = $this->getModel('hello');
        //if(!$model->delete()) {
        //	$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
        //} else {
        $msg = JText::_('Greeting(s) Deleted');
        //}
        $this->setRedirect('index.php?option=com_avreloaded', $msg );
    }

    /**
     * cancel editing a record
     * @return void
     */
    function cancel()
    {
        $msg = JText::_('Operation Cancelled');
        $this->setRedirect( 'index.php?option=com_avreloaded', $msg );
    }
}
