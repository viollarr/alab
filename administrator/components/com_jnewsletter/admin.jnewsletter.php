<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
if (!defined('DS'))  define( 'DS', DIRECTORY_SEPARATOR );

if ( defined('JPATH_ROOT') AND class_exists('JFactory')) {	// joomla 15
	global $mainframe;
	define( 'ACA_CMSTYPE', true );

//if( $action == 'acauninstall' )	define ('ACA_JPATH_ROOT' , JPATH_ROOT );
//else define ('ACA_JPATH_ROOT' , JPATH_ROOT . DS . 'administrator' );
	define ('ACA_JPATH_ROOT' , JPATH_ROOT . DS . 'administrator' );


	$userid = JRequest::getInt('userid', 0, 'request');
	$listId = JRequest::getInt('listid', 0, 'request');
	$listType = JRequest::getInt('listype', 0, 'request');
	$mailingId = JRequest::getInt('mailingid', 0, 'request');
	$action = JRequest::getString('act', '', 'request');
	$task = JRequest::getString('task', '', 'request');
	$message = JRequest::getString('message', '', 'request');
	$cid = JRequest::getVar('cid', array(), 'request');
	$template_id = JRequest::getInt('template_id', 0, 'request');
	JHTML::_('behavior.tooltip');

	require_once( JPATH_ROOT . '/components/com_jnewsletter/defines.php');

}//endif

if( ACA_DEBUG ) {
	ini_set('display_errors',true);
	error_reporting(E_ALL);
}

require_once( $mainframe->getPath( 'admin_html','com_jnewsletter' ) );
require_once( WPATH_CLASS . 'class.jnewsletter.php');
require_once( WPATH_CLASS . 'class.tableupdate.php');
require_once( WPATH_ADMIN . 'controllers/lists.jnewsletter.php');//require_once( WPATH_ADMIN . 'lists.jnewsletter.php');
require_once( WPATH_ADMIN . 'controllers/subscribers.jnewsletter.php');//require_once( WPATH_ADMIN . 'subscribers.jnewsletter.php');
require_once( WPATH_ADMIN . 'controllers/queue.jnewsletter.php');
require_once( WPATH_ADMIN. 'controllers/templates.jnewsletter.php');
require_once( WPATH_ADMIN . 'controllers/mailings.jnewsletter.php');//require_once( WPATH_ADMIN . 'mailings.jnewsletter.php');
require_once( WPATH_ADMIN . 'controllers/update.jnewsletter.php');//require_once( WPATH_ADMIN . 'update.jnewsletter.php');
require_once( WPATH_ADMIN . 'admin.jnewsletter.html.php' );//require_once( WPATH_ADMIN . 'admin.jnewsletter.html.php' );
require_once( WPATH_ADMIN . 'views/lists.jnewsletter.html.php' );//require_once( WPATH_ADMIN . 'lists.jnewsletter.html.php' );
require_once( WPATH_ADMIN . 'views/subscribers.jnewsletter.html.php' );//require_once( WPATH_ADMIN . 'subscribers.jnewsletter.html.php' );
require_once( WPATH_ADMIN . 'views/queue.jnewsletter.html.php');
require_once( WPATH_ADMIN . 'views/mailings.jnewsletter.html.php' );//require_once( WPATH_ADMIN . 'mailings.jnewsletter.html.php' );
require_once( WPATH_ADMIN . 'views/config.jnewsletter.html.php' );//require_once( WPATH_ADMIN . 'config.jnewsletter.html.php' );
require_once( WPATH_ADMIN . 'controllers/statistics.jnewsletter.php');//controllers for statistics
require_once( WPATH_ADMIN . 'views/templates.jnewsletter.html.php');
//include('debug.php');

//css injection for the images
$mainPath = JURI::base().'components/com_jnewsletter/images/header';
$doc =& JFactory::getDocument();
$css = '.icon-48-about { background-image:url('.$mainPath .'/about.png)}';
$css .='.icon-48-configuration { background-image:url('.$mainPath .'/configuration.png)}';
$doc->addStyleDeclaration($css, $type = 'text/css');

//css injection for the images
$mainPath = JURI::base().'components/com_jnewsletter/images/header';
$doc =& JFactory::getDocument();
$css = '.icon-48-about { background-image:url('.$mainPath .'/about.png)}';
$css .='.icon-48-configuration { background-image:url('.$mainPath .'/configuration.png)}';
$doc->addStyleDeclaration($css, $type = 'text/css');

 if (!is_array( $cid )) {
	 $cid = array(0);
 }

 if ( !ACA_CMSTYPE ) {	// joomla 15
	if ( !function_exists( 'sefRelToAbs' ) )
	{
//		if( $action == 'acauninstall' ) @include_once( ACA_JPATH_ROOT .'administrator/includes/sef.php' );
//		else @include_once( ACA_JPATH_ROOT .'/includes/sef.php' );
		@include_once( ACA_JPATH_ROOT .'/includes/sef.php' );
	} //endif
 }//endif

 switch ($action) {
 	case ('templates'):
  		templates( $action, $task, $template_id);
 		break;
	case ('list') :
		lists( $action, $task, $listId, $listType );
		break;
	case ('subscribers') :
		subscribers( $action, $task, $userid, $listId, $cid );
		break;
	case ('mailing') :
		mailing( $action, $task, $listId, $listType, $mailingId, $message );
		break;
	case ('statistics') :
		statistics( $listId, $listType, $mailingId, $message, $task, $action );
		break;
	case ('queue'):
 		queue( $action, $task, $listId, $mailingId, $lists='', $cid);
 		break;
	case ('configuration') :
		if ($GLOBALS[ACA.'integration'] == '0'  OR $GLOBALS[ACA.'cb_integration'] =='0') {
			$xf = new xonfig();
			if (jnewsletter::checkCB())	$xf->loadConfig();
		}
		configuration( $action, $task );
		break;
	case ('update') :
		update( $action, $task );
		break;
	case ('about') :
		about($message, $task, $action);
		break;
	case ('cpanel') :
	case ('help'):
	case ('learn') :
		backHTML::controlPanel();
		break;
	case ('start') :
	    backHTML::_header( _ACA_MENU_CONF , 'configuration.png' , $message , $task, $action );
		backHTML::controlPanel();
		break;
	case ( 'acaupdate' ) :
		// update jnews datas from acajoom
		$msg = tableUpdate::executeUpdate();
		echo $msg .'<br><br>';

		backHTML::controlPanel();
		break;
	default :
		backHTML::controlPanel();
		break;
 }
 backHTML::_footer();
 return true;

 function configuration($action, $task ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

	$config = array();
	$redirect = true;
	$xf = new xonfig();
	if ( ACA_CMSTYPE ) {	// joomla 15
		$message = JRequest::getVar('message', '' );
	}//endif

	switch ($task) {
		/* case ('sendQueue') :
				if (class_exists('auto'))
					echo jnewsletter::printYN( auto::processQueue( true, true ) , 'Queue processed' , _ACA_ERROR);
					auto::displayStatus();
	   			   backHTML::_header( _ACA_MENU_CONF , 'menu.png' , $message , $task, $action );
				 	configHTML::showConfigEdit($GLOBALS);
				break;
		 case ('reset') :
				$xf->update('next_autonews', '' );
				$xf->update('last_cron', '' );
				$xf->update('last_sub_update', '' );
				$query = "UPDATE #__jnews_lists SET `next_date` = '0' WHERE list_type = 7";
				 $database->setQuery($query);
				 $database->query();
				echo jnewsletter::printYN( true , ' Smart-Newsletter counter reset successful! ' , _ACA_ERROR);
				backHTML::_header( _ACA_MENU_CONF , 'menu.png' , $message , $task, $action );
			 	configHTML::showConfigEdit($GLOBALS);
			 	break;*/
		 case ('syncUsers') :
				echo jnewsletter::printYN( subscribers::syncSubscribers() , _ACA_SYNC_USERS_SUCCESS , _ACA_ERROR);
				backHTML::_header( _ACA_MENU_CONF , 'configuration.png' , $message , $task, $action );
				configHTML::showConfigEdit($GLOBALS);
			 	break;
		 case ('apply') :
				if ( ACA_CMSTYPE ) {	// joomla 15
					$clear_log = JRequest::getVar('clear_log', '0' );
				} else {									//joomla 1x
					$clear_log = mosGetParam($_REQUEST, 'clear_log', 0);
				}//endif
				if ($clear_log != 0) {
					unlink(ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'save_log_file']);
				}
				if (empty($config)) {
					$config = $_REQUEST['config'];
				}
				$message = strip_tags(jnewsletter::printYN($xf->saveConfig($config) , _ACA_CONFIG_UPDATED , _ACA_ERROR));
				$xf->updateActiveList();
				xonfig::cron();
			 	compa::redirect('index2.php?option=com_jnewsletter&act=configuration&message='.$message);

				break;
		 case ('save') :

			if ( ACA_CMSTYPE ) {	// joomla 15
				$clear_log = JRequest::getVar('clear_log', '0' );
			}//endif
			if ($clear_log != 0) {
				@unlink(ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'save_log_file']);
			}
			if (empty($config)) {
				$config = $_REQUEST['config'];
			}
			$message = jnewsletter::printYN($xf->saveConfig($config) , _ACA_CONFIG_UPDATED , _ACA_ERROR);
			$xf->updateActiveList();
			xonfig::cron();
		 	backHTML::controlPanel();

		 	break;
		case ('cancel') :
			compa::redirect('index2.php?option=com_jnewsletter');
			break;
       	case ('cpanel') :
	      		backHTML::controlPanel();
     			break;
     	case ('acaupdate') :
			// update jnews datas from acajoom
			$msg = tableUpdate::executeUpdate();
			echo $msg .'<br><br>';

			backHTML::_header( _ACA_MENU_CONF , 'configuration.png' , $message , $task, $action );
		 	configHTML::showConfigEdit($GLOBALS);
     			break;
		 default :
		   	backHTML::_header( _ACA_MENU_CONF , 'configuration.png' , $message , $task, $action );
		 	configHTML::showConfigEdit($GLOBALS);
		 	break;
	 }
	 return true;
 }

 function queueMenu($action, $task, $listid, $mailingid){
 	$message = JRequest::getVar('message', '' );
	switch ($task) {
		/*case ('pqueue') :
				if (class_exists('auto'))
					echo jnewsletter::printYN( auto::processQueue( true, true ) , 'Queue processed' , _ACA_ERROR);
					auto::displayStatus();
	   			   backHTML::_header( _ACA_MENU_CONF , 'menu.png' , $message , $task, $action );
				 	configHTML::showConfigEdit($GLOBALS);
				break;
		 case ('resetsn') :
				$xf->update('next_autonews', '' );
				$xf->update('last_cron', '' );
				$xf->update('last_sub_update', '' );
				$query = "UPDATE #__jnews_lists SET `next_date` = '0' WHERE list_type = 7";
				 $database->setQuery($query);
				 $database->query();
				echo jnewsletter::printYN( true , ' Smart-Newsletter counter reset successful! ' , _ACA_ERROR);
				backHTML::_header( _ACA_MENU_CONF , 'menu.png' , $message , $task, $action );
			 	configHTML::showConfigEdit($GLOBALS);
			 	break;*/
		default:
     		backHTML::controlPanel();
     		break;
	}
 }

 function about( $message , $task, $action ) {
	 switch ($task) {
      	case ('cpanel') :
	     	backHTML::controlPanel();
        	break;
        default:
        	backHTML::_header( _ACA_MENU_ABOUT.' jNews' , 'about.png' , $message , $task, $action );
			backHTML::about();
	 }
 }




