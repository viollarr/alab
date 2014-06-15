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

jimport('joomla.application.component.controller');
// Submenu view
$view	= JRequest::getVar( 'view', '', '', 'string', JREQUEST_ALLOWRAW );

if ($view == '' || $view == 'phocafaviconcp') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_phocafavicon', true);
	JSubMenuHelper::addEntry(JText::_('Create Favicon'), 'index.php?option=com_phocafavicon&view=phocafavicon');
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_phocafavicon&view=phocafaviconin' );
}

if ($view == 'phocafavicon') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_phocafavicon');
	JSubMenuHelper::addEntry(JText::_('Create Favicon'), 'index.php?option=com_phocafavicon&view=phocafavicon', true);
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_phocafavicon&view=phocafaviconin' );
}

if ($view == 'phocafaviconin') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_phocafavicon');
	JSubMenuHelper::addEntry(JText::_('Create Favicon'), 'index.php?option=com_phocafavicon&view=phocafavicon');
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_phocafavicon&view=phocafaviconin', true );
}

class PhocaFaviconCpController extends JController
{
	function display() {
		parent::display();
	}
}
?>
