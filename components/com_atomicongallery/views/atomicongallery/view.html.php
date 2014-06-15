<?php
/**
 * @version $Id$
 * @package    AtomiconGallery
 * @subpackage _ECR_SUBPACKAGE_
 * @author     Atomicon {@link http://www.atomicon.nl}
 * @author     Created on 12-Jan-2010
 */

//-- No direct access
defined('_JEXEC') or die('Restricted');

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the AtomiconGallery Component
 *
 * @package    AtomiconGallery
 */
 
jimport( 'joomla.application.pathway' );

class AtomiconGalleryViewAtomiconGallery extends JView
{
    function display($tpl = null)
    {
		global $mainframe;
		$assets_url     = Atomicon::fixURL(Atomicon::getComponentURL(null, false, true)).'assets/';
		$doc            = &JFactory::getDocument();

		$this->params         = Atomicon::getComponentParameters('com_atomicongallery');
		$this->folder_param   = $this->params->get('folder','');
            $this->folder         = JRequest::getVar('folder', $this->folder_param);
		$this->rel            = trim($this->params->get('rel',''));

		if ($this->rel=='') {
			$this->rel = 'lightbox[atomicongallery]';
		}


		//simulate open_basedir
		if ($this->folder_param!='')
		{
			if ($this->folder == '' || strpos($this->folder, $this->folder_param)===false)
			{
				$this->folder = $this->folder_param;
			}
			
			if (strpos($this->folder, '..')!==false)
			{
				$this->folder = $this->folder_param;
			}
		}
		
		
		$this->gallery  = AtomiconGallery::getGallery($this->folder);
		$this->folders  = $this->gallery['folders'];
		$this->files    = $this->gallery['files'];
		$this->cleargif = $assets_url . 'images/clear.gif';
		
		//add the gallery breadcrumbs
		AtomiconGallery::addPathway($this->folder, $this->folder_param);
		
		// add default stylesheet
		$css = $assets_url . 'css/style.css';
		$doc->addStyleSheet($css);

		// add the slimbox (lightbox)
		JHTML::_('behavior.mootools');
		$doc->addScript($assets_url.'slimbox/js/slimbox.js');
		$doc->addStyleSheet($assets_url.'slimbox/css/slimbox.css');
		
		// add style if chosen
		$style = $this->params->get('style', 'light');
		if ($style!='none' && $style!= '') {
			$style_css = $assets_url . 'css/' . $style . '.css';
			$doc->addStyleSheet($style_css);
		}

        parent::display($tpl);
    }
}