<?php
/**
 * @version $Id$
 * @package    AtomiconGallery
 * @subpackage _ECR_SUBPACKAGE_
 * @author     Yvo van Dillen {@link http://www.atomicon.nl}
 * @author     Created on 08-Jan-2010
 */

//-- No direct access
defined('_JEXEC') or die('Restricted');

jimport('joomla.application.component.controller');

/**
 * AtomiconGallery default Controller
 *
 * @package    AtomiconGallery
 * @subpackage Controllers
 */
class AtomiconGalleryController extends JController
{
	function __construct( $default = array())
	{
		parent::__construct( $default );
	}
	
	function save_descriptions()
	{
        $folder  = JRequest::getVar('folder');
        AtomiconGallery::saveDescriptions($folder, JRequest::getVar('descriptions', array()));
        echo Atomicon::closeModalBox(true);
		die();
	}
	
	function upload()
	{
		$folder  = JRequest::getVar('folder');
		$count   = AtomiconGallery::upload($folder);
		echo Atomicon::closeModalBox(true);
		die();
	}
	
	function process_image()
	{
		//ajax function
		$message        = '';
		
		$folder         = JRequest::getVar('folder', null);
		$file           = JRequest::getVar('file', null);
		$imagelib       = JRequest::getVar('imagelib', null);
        $skip_if_exists = JRequest::getVar('skip_if_exists', 1);
		
		$tn_process    = JRequest::getVar('tn_process', 0);
		$tn_width  	   = JRequest::getVar('tn_width', 150);
		$tn_height 	   = JRequest::getVar('tn_height', 150);
		
		$img_process   = JRequest::getVar('img_process', 0);
		$img_width     = JRequest::getVar('img_width', 800);
		$img_height    = JRequest::getVar('img_height', 600);

		if (!empty($file)) {
            $message = "";
            if ($tn_process) {
                AtomiconGallery::processImage($folder, $file, $tn_width, $tn_height, $imagelib, $skip_if_exists, true);
            }
            if ($img_process) {
                AtomiconGallery::processImage($folder, $file, $img_width, $img_height, $imagelib, $skip_if_exists, false);
            }
            $message = "Done";
		}
		die($message);
	}
  
	function remove()
	{
        $folder  = JRequest::getVar('folder');
		$type    = 'message';
		$message = null;
        $array   = JRequest::getVar('cid',  0, '', 'array');

        foreach($array as $name) {
			$count += AtomiconGallery::remove($name, $folder) ? 1 : 0;
		}

		$url = AtomiconGallery::getFolderLink($folder);
		$this->setRedirect($url, $message, $type);
		
	}
	function addfolder()
	{
		$name    = JRequest::getVar('name');
		$folder  = JRequest::getVar('folder');
		$type    = 'message';
		$message = null;

		if ($name!='')
		{
			if (AtomiconGallery::addFolder($name, $folder))
			{
				$type         = 'message';
				$message      = null;
				$folder       = $folder == '' ? $name : $folder . '/' . $name;
				$descriptions = array("_folder" => JRequest::getVar('description', ''));
				AtomiconGallery::saveDescriptions($folder, $descriptions);
			} else {
                $type    = 'error';
				$message = JText::_('Could not create folder');
			}
		} else {
            $type    = 'error';
			$message = JText::_('Cannot create an empty folder');
		}

		if (empty($message))
		{
			echo Atomicon::closeModalBox(true);
			die();
		}
		die($message);
	}
	
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{
		parent::display();
	}// function
	
}// class