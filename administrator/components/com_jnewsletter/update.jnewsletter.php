<?php
 defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

function update( $action, $task ) {
	$update = new wupdate();
	$showListing = true;
	$showComplete = false;

	if ( ACA_CMSTYPE ) {	// joomla 15
		 $message = JRequest::getVar('message', '');
	}//endif

	 if (ini_get('safe_mode')) {

	 } else {
	 	 @set_time_limit(60 * $GLOBALS[ACA.'script_timeout']);
	 }

	 /*if ((ini_get('allow_url_fopen') == false && !in_array('curl', get_loaded_extensions())) || ini_get('safe_mode') == true) {
		 echo _ACA_WARNING_1011;
		 return;
	 }*/
	 //css injection for the images
	$mainPath = JURI::base().'components/com_jnewsletter/admin/images/header';
	$doc =& JFactory::getDocument();
	$css = '.icon-48-import { background-image:url('.$mainPath .'/import.png)}';
	$doc->addStyleDeclaration($css, $type = 'text/css');

	switch ($task) {
		 case ('doUpdate') :
			backHTML::_header( _ACA_MENU_UPDATE , 'update' , $message  , $task, $action );
			$update->doUpdate();
	     	$showListing = false;
	     	$showComplete = false;
	     	break;
		 case ('version') :
			$update->getVersion();
			break;
		 case ('complete') :
			$showComplete = true;
	     	$showListing = false;
			break;
		 case ('cancel') :
		 	compa::redirect('index2.php?option=com_jnewsletter&act=update');
	     	$showListing = false;
			break;
      	case ('cpanel'):
		 	compa::redirect('index2.php?option=com_jnewsletter');
	     	$showListing = false;
        	break;
      	case ('new1'):
	 		backHTML::_header( _ACA_MENU_UPDATE , 'import.png' , $message , $task, $action  );
      		$message = jnewsletter::printYN( jnewsletter::upgrade_News1() ,  '<br />' ._ACA_IMPORT_SUCCESS.' Anjel data' , _ACA_ERROR );
	   		jnewsletter::resetUpgrade(1);
	   		echo '<br />'.$message;
        	break;
      	case ('new2'):
	 		backHTML::_header( _ACA_MENU_UPDATE , 'import.png' , $message , $task, $action  );
      		$message = jnewsletter::printYN( jnewsletter::upgrade_News2() ,  '<br />' ._ACA_IMPORT_SUCCESS.' Letterman data' , _ACA_ERROR );
	     	jnewsletter::resetUpgrade(2);
	   		echo '<br />'.$message;
        	break;
      	case ('new3'):
	 		backHTML::_header( _ACA_MENU_UPDATE , 'import.png' , $message , $task, $action  );
      		$message = jnewsletter::printYN( jnewsletter::upgrade_News3() ,  '<br />' ._ACA_IMPORT_SUCCESS.' YaNC data' , _ACA_ERROR );
	     	jnewsletter::resetUpgrade(3);
	   		echo '<br />'.$message;
        	break;
	 }

	 if ($showListing) {
		backHTML::_header( _ACA_MENU_UPDATE , 'import.png' , $message , $task, $action  );
 		backHTML::_upgrade();
 		$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		echo $forms['main'];
		backHTML::formStart('' , ''  ,'' );
		backHTML::showCompsList($update);
		$go[] = jnewsletter::makeObj('act', $action);
		backHTML::formEnd($go);
	 } elseif ($showComplete) {
		backHTML::_header( _ACA_MENU_UPDATE , 'import.png' , $message , $task, $action  );
 		$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		echo $forms['main'];
		backHTML::formStart('' , ''  ,'' );
		backHTML::showUpdateOptions($update);
		$go[] = jnewsletter::makeObj('act', $action);
		backHTML::formEnd($go);
	 }
 }

