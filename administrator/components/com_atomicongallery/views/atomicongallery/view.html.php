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

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the AtomiconGallery Component
 *
 * @package    AtomiconGallery
 * @subpackage Views
 */

class AtomiconGalleryViewAtomiconGallery extends JView
{
    /**
     * AtomiconGallery view display method
     * 
     * @return void
     **/
	function display($tpl = null)
	{
        $doc  = &JFactory::getDocument();
  		$task = JRequest::getVar('task');
  		$tpl  = null;
  		
  		$assets_url = Atomicon::fixURL(Atomicon::getComponentURL(null, true, true)).'assets/';
  		
  		JHTML::_('behavior.mootools');
  		JHTML::_('behavior.tooltip');

		$css  = $assets_url . 'css/style.css';
		$js   = $assets_url . 'js/script.js';

		$doc->addStyleSheet($css);
		$doc->addScript($js);
		
		$this->folder    = JRequest::getVar('folder', '');
		$this->template  = JRequest::getVar('template', 'list');
		$this->url       = AtomiconGallery::getFolderLink($this->folder, true);
		$this->imagelibs = imageHelper::getLibs(false);
		
		$this->params    = Atomicon::getComponentParameters();

		$this->data      = AtomiconGallery::getGallery($this->folder, false);
		$this->folders   = $this->data['folders'];
		$this->files     = $this->data['files'];

		$this->count   = count($this->folders) + count($this->files);

		Atomicon::addToolbarPopup('new', JText::_('New folder'), $this->url . '&template=addfolder', 550, 400);
		Atomicon::addToolbarPopup('upload', JText::_('Upload'), $this->url . '&template=upload', 550, 400);
		Atomicon::addToolbarPopup('descriptions', JText::_('Descriptions'), $this->url . '&template=descriptions', 550, 400);
		
		//do we have files and image libraries?
		if (count($this->files) > 0 && count($this->imagelibs)>0)
		{
			Atomicon::addToolbarPopup('thumbnails', JText::_('Thumbnails'), $this->url . '&template=thumbnails', 550, 400);
		}
		
		JToolbarHelper::preferences('com_atomicongallery', 400, 550);

		JToolBarHelper::divider();
		JToolBarHelper::deleteList();

		JToolBarHelper::title(  'AtomiconGallery' . ($this->folder == '' ? '' : ' - ' . $this->folder), 'atomicon' );

		parent::display($tpl);
    }// function
}// class
