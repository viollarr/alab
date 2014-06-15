<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
if (!defined('DS'))  define( 'DS', DIRECTORY_SEPARATOR );

if ( (defined('ACA_CMSTYPE') AND ACA_CMSTYPE) OR (defined('JPATH_ROOT') AND class_exists('JFactory'))) {
	global $mainframe;
	if(!defined('ACA_JPATH_ROOT')) define ('ACA_JPATH_ROOT' , JPATH_ROOT );
	if(!defined('ACA_CMSTYPE')) define( 'ACA_CMSTYPE', true );

	 $subscriberId = JRequest::getInt('subscriber');
	 $listId = JRequest::getInt('listid');
	 $lisType = JRequest::getInt('listype');
	 $mailingId = JRequest::getInt('mailingid');
	$action = JRequest::getString('act');
	$task = JRequest::getString('task');
	$message = JRequest::getString('message');

	$name = JRequest::getString('name');
	$email = JRequest::getString('email');
	$cle = JRequest::getVar('cle');
	$redirectlink = str_replace('&amp;','&',trim( JRequest::getString('redirectlink') ));
}//endif

require_once( ACA_JPATH_ROOT . '/components/com_jnewsletter/defines.php');
 require_once($mainframe->getPath('front_html'));
 require_once( WPATH_CLASS . 'class.jnewsletter.php');
 require_once( WPATH_FRONT_CLASS . 'class.frontend.php');
 require_once( WPATH_ADMIN . 'admin.jnewsletter.html.php' );
 require_once( WPATH_ADMIN . 'views/subscribers.jnewsletter.html.php' );
 require_once( WPATH_ADMIN . 'views/lists.jnewsletter.html.php' );
 require_once( WPATH_ADMIN . 'views/mailings.jnewsletter.html.php' );
if( ACA_DEBUG ) {
	ini_set('display_errors',true);
	error_reporting(E_ALL);
}

if(ACA_CMSTYPE){
	$my =& JFactory::getUser();
}

$userId = $my->id;
$validated = false;
 if ( $subscriberId>0 && !empty($cle) && $userId<1) {
	if (subscribers::checkValidKey($subscriberId, $cle)) {
		$userId = $subscriberId;
		$validated = true;
	} else {
		 echo jnewsletter::printM('red' , _NOT_AUTH);
		 $subscriberId = 0;
	}
 }

if ( ACA_CMSTYPE ) {
	$document=& JFactory::getDocument();
	$document->addStyleSheet( 'components/com_jnewsletter/css/jnewsletter.css', 'text/css' );
}//endif


$d['subscriberId'] = $subscriberId;
$d['cle'] = $cle;
 if ( $userId>0 && empty($cle)){
 	$validated = true;
 	$subscriberId = subscribers::getSubscriberIdFromUserId($userId);
 }
$showPanel = false;
echo '<!--  Beginning : '.jnewsletter::version().'   -->'."\n\r";

switch ($action) {
	case ('confirm') :
		$message = jnewsletter::printYN( frontend::confirmRegistration($d) ,  _ACA_ACCOUNT_CONFIRMED , _ACA_VERIFY_INFO );
		$showPanel = true;
		if(!empty($GLOBALS[ACA.'redirectconfirm'])){
			compa::redirect($GLOBALS[ACA.'redirectconfirm'], $message);
		}
		break;
	case ('sublist') :
		frontEnd::showSubscriberLists($subscriberId, 'subscribeAll');
		break;
	case ('mailing') :
		frontEnd::mailingOptions( $action, $task, $listId, $mailingId, $subscriberId, $lisType);
		break;
	case ('savemailing') :
		$message = jnewsletter::printYN( xmailing::saveMailing($mailingId, $listId) ,  _ACA_MAILING_SAVED , _ACA_ERROR );
		$showPanel = true;
		break;
	case ('show') :
		if(!$validated) $subscriberId=0;
		frontEnd::subscriptions($subscriberId, 0, 'save');
		break;
	case ('subone') :
		if(!$validated) $subscriberId=0;
		frontEnd::subscriptions($subscriberId, $listId, 'subscribe');
		break;
	case ('change') :
		frontEnd::changeSubscriptions($subscriberId, $cle, $listId, 'save');
		break;
	case ('unsubscribe') :
		frontEnd::unsubscribe($subscriberId, $cle, $listId, 'remove');
		$showPanel = false;
		break;
	case ('remove') :
		$message = jnewsletter::printYN( frontEnd::remove($subscriberId, $cle, $listId) ,  _ACA_UNSUBSCRIBE_MESS , _NOT_AUTH );
		$showPanel = true;
		break;
	case ('save') :
		$message = jnewsletter::printYN( subscribers::updateOneSubscriber() ,  _ACA_UPDATED_SUCCESSFULLY , _ACA_ERROR );
		$showPanel = true;
		break;
	case ('log') :
		jnewsletter_mail::logStatistics($mailingId, $subscriberId);
		break;
	case ('updatesubscription') :
		 $message = frontEnd::updateFrontSubscription($subscriberId);
		if (!empty($redirectlink)) {
			compa::redirect($redirectlink, $message);
		} else {
			$showPanel = true;
		}
		break;
	case ('subscribe') :
		if ( ACA_CMSTYPE ) {
			$userid = intval(JRequest::getVar('userid', 0));
		}//endif

		if ( $userid>0 ) {
			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
			}//endif

			$query = 'SELECT * FROM `#__users` WHERE `id` = \'' . $userid . '\'';
	     	$database->setQuery($query);
					if ( ACA_CMSTYPE ) {
						$user = $database->loadObject();
					}//endif

			if (!empty($user) ) {
				$name = $user->name;
				$email = $user->email;
			} else {
				break;
			}
		} elseif ( !subscribers::validEmail($email)) {
			echo '<br />'.jnewsletter::printM('red' , _ACA_EMAIL_INVALID );
			echo "<script>alert('".addslashes(_ACA_EMAIL_INVALID)."'); window.history.go(-1);</script>\n";
			break;
		}

		if($userid>0){
			$message = frontEnd::newSubscriber($name, $email,true);
		}else{
			$message = frontEnd::newSubscriber($name, $email);
		}
		if($GLOBALS[ACA.'addEmailRedLink'] ){
			if(strpos($redirectlink,'?')){
				$redirectlink .= '&email='.$email;
			}else{
				$redirectlink .= '?email='.$email;
			}
		}

		if ( ACA_CMSTYPE ) {
		 	$showMessage = JRequest::getVar('listname', 0);
		}//endif

		if (!empty($redirectlink)) {
			if (!$showMessage)  $message = '';
			compa::redirect($redirectlink, $message);
		} else {
			$showPanel = true;
		}
		break;
	case ('list'):
		frontEnd::showLists($subscriberId, $listId, $lisType, $action, $task);
		break;
	case ('token'):
		auto::receiveToken();
		break;
	default:
		if (class_exists('auto')) {
			$showPanel = auto::getCase($action);
		} else {
			$showPanel = true;
		}
		break;
 }
echo $message;
if ($showPanel)	 frontEnd::introduction($subscriberId, $listId, $lisType);
	frontHTML::_footer();
echo "\n\r".'<!--  End : '.jnewsletter::version().'   -->'."\n\r";