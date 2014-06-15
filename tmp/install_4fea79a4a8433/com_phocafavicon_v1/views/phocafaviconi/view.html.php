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

jimport( 'joomla.application.component.view');

class PhocaFaviconCpViewPhocaFaviconi extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		// Do not allow cache
		JResponse::allowCache(false);
		
		$document		= & JFactory::getDocument();
		$document->addStyleSheet('../administrator/components/com_phocafavicon/assets/phocafavicon.css');
		$document->addCustomTag("<!--[if IE]>\n<link rel=\"stylesheet\" href=\"../administrator/components/com_phocafavicon/assets/phocafaviconieall.css\" type=\"text/css\" />\n<![endif]-->");

		$path 			= PhocaFaviconHelper::getPathSet();
		$path_orig_rel 	= $path['orig_rel_ds'];
		$this->assign('path_orig_rel', $path_orig_rel);
		$this->assignRef('images', $this->get('images'));
		$this->assignRef('folders', $this->get('folders'));
		$this->assignRef('state', $this->get('state'));

		parent::display($tpl);
	}

	function setFolder($index = 0)
	{
		if (isset($this->folders[$index])) {
			$this->_tmp_folder = &$this->folders[$index];
		} else {
			$this->_tmp_folder = new JObject;
		}
	}

	function setImage($index = 0)
	{
		if (isset($this->images[$index])) {
			$this->_tmp_img = &$this->images[$index];
		} else {
			$this->_tmp_img = new JObject;
		}
	}
}
