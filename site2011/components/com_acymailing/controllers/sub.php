<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class SubController extends JController{
	function notask(){
		$this->setRedirect(urldecode(JRequest::getVar('redirect','','','string')),'Please enable the Javascript to be able to subscribe','notice');
		return false;
	}
	function optin(){
		acymailing::checkRobots();
		$userClass = acymailing::get('class.subscriber');
		$redirectUrl = urldecode(JRequest::getVar('redirect','','','string'));
		$user = null;
		$formData = JRequest::getVar( 'user', array(), '', 'array' );
		if(!empty($formData)){
			$userClass->checkFields($formData,$user);
		}
		if(empty($user->email)){
			$connectedUser =& JFactory::getUser();
			if(!empty($connectedUser->email)){
				$user->email = $connectedUser->email;
			}
		}
		$user->email =  trim($user->email);
		$userHelper = acymailing::get('helper.user');
		if(empty($user->email) OR !$userHelper->validEmail($user->email)){
			echo "<script>alert('".JText::_('VALID_EMAIL',true)."'); window.history.go(-1);</script>";
			exit;
		}
		$alreadyExists = $userClass->get($user->email);
		if(!empty($alreadyExists->subid)){
			$user->subid = $alreadyExists->subid;
			$currentSubscription = $userClass->getSubscriptionStatus($alreadyExists->subid);
		}else{
			$currentSubscription = array();
		}
		$user->accept = 1;
		$user->subid = $userClass->save($user);
		$myuser = $userClass->get($user->subid);
		$mailClass = acymailing::get('helper.mailer');
		$config = acymailing::config();
		$statusAdd = (empty($myuser->confirmed) AND $config->get('require_confirmation',false)) ? 2 : 1;
		$addlists = array();
		$updatelists = array();
		$removelists = array();

		$hiddenlistsstring = JRequest::getVar('hiddenlists','','','string');
		if(!empty($hiddenlistsstring)){
			$hiddenlists = explode(',',$hiddenlistsstring);
			JArrayHelper::toInteger($hiddenlists);
			foreach($hiddenlists as $id => $idOneList){
				if(!isset($currentSubscription[$idOneList])){
					$addlists[$statusAdd][] = $idOneList;
					continue;
				}
				if($currentSubscription[$idOneList]->status == $statusAdd OR $currentSubscription[$idOneList]->status == 1) continue;
				$updatelists[$statusAdd][] = $idOneList;
			}
		}
		$visibleSubscription = JRequest::getVar('subscription','','','array');
		if(!empty($visibleSubscription)){
			foreach($visibleSubscription as $idOneList){
				if(empty($idOneList)) continue;
				if(!isset($currentSubscription[$idOneList])){
					$addlists[$statusAdd][] = $idOneList;
					continue;
				}
				if($currentSubscription[$idOneList]->status == $statusAdd OR $currentSubscription[$idOneList]->status == 1) continue;
				$updatelists[$statusAdd][] = $idOneList;
			}
		}
		$visiblelistsstring = JRequest::getVar('visiblelists','','','string');
		if(!empty($visiblelistsstring)){
			$visiblelist = explode(',',$visiblelistsstring);
			JArrayHelper::toInteger($visiblelist);
			foreach($visiblelist as $idList){
				if(!in_array($idList,$visibleSubscription) AND !empty($currentSubscription[$idList]) AND $currentSubscription[$idList]->status != '-1'){
					$updatelists['-1'][] = $idList;
				}
			}
		}
		$listsubClass = acymailing::get('class.listsub');
		$status = true;
		$updateMessage = false;
		$insertMessage = false;
		if(!empty($updatelists)){
			$status = $listsubClass->updateSubscription($myuser->subid,$updatelists) && $status;
			$updateMessage = true;
		}
		if(!empty($addlists)){
			$status = $listsubClass->addSubscription($myuser->subid,$addlists) && $status;
			$insertMessage = true;
		}
		if($config->get('subscription_message',1)){
			$app =& JFactory::getApplication();
			if($statusAdd == 2){
				$app->enqueueMessage(JText::_('CONFIRMATION_SENT'));
			}else{
				if($insertMessage){
					$app->enqueueMessage(JText::_('SUBSCRIPTION_OK'));
				}elseif($updateMessage){
					$app->enqueueMessage(JText::_('SUBSCRIPTION_UPDATED_OK'));
				}else{
					$app->enqueueMessage(JText::_('ALREADY_SUBSCRIBED'));
				}
			}
		}
		$this->setRedirect($redirectUrl);
		return true;
	}
	function optout(){
		acymailing::checkRobots();
		$redirectUrl = urldecode(JRequest::getVar('redirectunsub','','','string'));
		$formData = JRequest::getVar( 'user', array(), '', 'array' );
		$email = trim(strip_tags($formData['email']));
		if(empty($email)){
			$connectedUser =& JFactory::getUser();
			if(!empty($connectedUser->email)){
				$email = $connectedUser->email;
			}
		}
		$userClass = acymailing::get('class.subscriber');
		$alreadyExists = $userClass->get($email);
		if(empty($alreadyExists->subid)){
			$this->setRedirect($redirectUrl,JText::sprintf('NOT_IN_LIST',$email),'notice');
			return false;
		}
		$visibleSubscription = JRequest::getVar('subscription','','','array');
		$currentSubscription = $userClass->getSubscriptionStatus($alreadyExists->subid);
		$hiddenSubscription = explode(',',JRequest::getVar('hiddenlists','','','string'));
		$updatelists = array();
		$removeSubscription = array_merge($visibleSubscription,$hiddenSubscription);
		foreach($removeSubscription as $idList){
			if(!empty($currentSubscription[$idList]) AND $currentSubscription[$idList]->status != '-1'){
				$updatelists[-1][] = $idList;
			}
		}
		$config = acymailing::config();
		$app =& JFactory::getApplication();
		if(!empty($updatelists)){
			$listsubClass = acymailing::get('class.listsub');
			$listsubClass->updateSubscription($alreadyExists->subid,$updatelists);
			if($config->get('subscription_message',1)){
				$app->enqueueMessage(JText::_('UNSUBSCRIPTION_OK'));
			}
		}elseif($config->get('subscription_message',1)){
			$app->enqueueMessage(JText::_('UNSUBSCRIPTION_NOT_IN_LIST'));
		}
		$this->setRedirect($redirectUrl);
		return true;
	}
}