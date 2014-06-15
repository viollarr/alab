<?php
/**
 * @author     GeoXeo <contact@geoxeo.com>
 * @link       http://www.geoxeo.com
 * @copyright  Copyright (C) 2010 GeoXeo - All Rights Reserved
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * 
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$toc = JRequest::getString('article-toc', '', '', 4); // 4: means allow HTML in Request Var
if($toc) {
	require(JModuleHelper::getLayoutPath('mod_pagebreakplus'));
}