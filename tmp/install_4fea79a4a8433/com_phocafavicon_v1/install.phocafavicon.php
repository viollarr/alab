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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.filesystem.folder' );

function com_install()
{
	global $mainframe;
	// -->
	$folder[0][0]	=	'images' . DS . 'phocafavicon' . DS ;
	$folder[0][1]	= 	JPATH_ROOT . DS .  $folder[0][0];
	
	$message = '';
	$error	 = array();
	foreach ($folder as $key => $value)
	{
		if (!JFolder::exists( $value[1]))
		{
			if (JFolder::create( $value[1], 0777 ))
			{
				$message .= '<span style="color:#009933">Folder</span> ' . $value[0] 
						   .' <span style="color:#009933">created!</span>';
				$message .= '<br /><span style="padding-left:30px">PhocaFavicon successfully installed.</span>';
				$error[] = 0;
			}	 
			else
			{
				$message .= '<span style="color:#CC0033">Folder</span> ' . $value[0]
						   .' <span style="color:#CC0033">creation failed!</span> <span>Please create it manually.</span>';
				$error[] = 1;
			}
		}
		else//Folder exist
		{
			$message .= '<span style="color:#009933">Folder</span> ' . $value[0] 
						   .' <span style="color:#009933">exists!</span>';
			$message .= '<br /><span style="padding-left:30px">PhocaFavicon successfully installed.</span>';
			$error[] = 0;
		}
	}
	
	$link = 'index.php?option=com_phocafavicon';
	$mainframe->redirect($link, $message);
}

?>