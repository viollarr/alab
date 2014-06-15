<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class NewsletterController extends acymailingController{
	function listing(){
		$listid = JRequest::getInt('listid');
		$redirect = empty($listid) ? acymailing::completeLink('lists',false,true) : acymailing::completeLink('archive&listid='.$listid,false,true);
		$this->setRedirect($redirect);
	}
	function checkAccess(){
		static $access = false;
		if(!$access){
			$listid = JRequest::getInt('listid');
			if(empty($listid)) die('Invalid List');
			$my = JFactory::getUser();
			$listClass = acymailing::get('class.list');
			$myList = $listClass->get($listid);
			if(empty($myList->listid)) die('Invalid List');
   			if(!empty($my->id) AND (int)$my->id == (int)$myList->userid){ $access = true; return;}
			if(empty($my->id) OR empty($my->gid) OR $myList->access_manage =='none') die('Invalid Access');
			if($myList->access_manage != 'all'){
				if(!in_array($my->gid,explode(',',$myList->access_manage))) die('Invalid Access');
			}
		}
		$access = true;
	}
	function delete(){
		$this->checkAccess();
		list($mailid,$attachid) = explode('_',JRequest::getCmd('value'));
		$mailid = intval($mailid);
		if(empty($mailid)) return false;
		$db	=& JFactory::getDBO();
		$db->setQuery('SELECT `attach` FROM '.acymailing::table('mail').' WHERE mailid = '.$mailid.' LIMIT 1');
		$attachment = $db->loadResult();
		if(empty($attachment)) return;
		$attach = unserialize($attachment);
		unset($attach[$attachid]);
		$attachdb = serialize($attach);
		$db->setQuery('UPDATE '.acymailing::table('mail').' SET attach = '.$db->Quote($attachdb).' WHERE mailid = '.$mailid.' LIMIT 1');
		$db->query();
		exit;
	}
	function store(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$this->checkAccess();
		$app =& JFactory::getApplication();
		$mailClass = acymailing::get('class.mail');
		$status = $mailClass->saveForm();
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
			if(!empty($mailClass->errors)){
				foreach($mailClass->errors as $oneError){
					$app->enqueueMessage($oneError, 'error');
				}
			}
		}
	}
	function edit(){
		$this->checkAccess();
		JRequest::setVar( 'layout', 'form'  );
		return parent::display();
	}
	function savepreview(){
		$this->store();
		return $this->preview();
	}
	function preview(){
		$this->checkAccess();
		JRequest::setVar( 'layout', 'preview'  );
		return parent::display();
	}
	function sendtest(){
		$this->_sendtest();
		return $this->preview();
	}
	function send(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$this->checkAccess();
		$app =& JFactory::getApplication();
		$mailid = acymailing::getCID('mailid');
		if(empty($mailid)) exit;
		$time = time();
		$queueClass = acymailing::get('class.queue');
		$nbEmails = $queueClass->nbQueue($mailid);
		if($nbEmails > 0){
			$app->enqueueMessage(JText::sprintf('ALREADY_QUEUED',$nbEmails),'notice');
			return $this->preview();
		}
		$totalSub = $queueClass->queue($mailid,$time);
		if(empty($totalSub)){
			$app->enqueueMessage(JText::_('NO_RECEIVER'),'notice');
			return $this->preview();
		}
		$mailObject = null;
		$mailObject->senddate = $time;
		$mailObject->published = 1;
		$mailObject->mailid = $mailid;
		$db =& JFactory::getDBO();
		$db->updateObject(acymailing::table('mail'),$mailObject,'mailid');
		$app->enqueueMessage(JText::sprintf('ADDED_QUEUE',$totalSub));
		$app->enqueueMessage(JText::sprintf('AUTOSEND_CONFIRMATION',$totalSub));
		return $this->preview();
	}
	function _sendtest(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$this->checkAccess();
		$mailid = acymailing::getCID('mailid');
		$receiver_type = JRequest::getVar('receiver_type','','','string');
		if(empty($mailid) OR empty($receiver_type)) return false;
		$mailer = acymailing::get('helper.mailer');
		$mailer->forceVersion = JRequest::getVar('test_html',1,'','int');
		$mailer->autoAddUser = true;
		$mailer->checkConfirmField = false;
		$receivers = array();
		if($receiver_type == 'user'){
			$user = JFactory::getUser();
			$receivers[] = $user->email;
		}elseif($receiver_type == 'other'){
			$receivers[] = JRequest::getVar('test_email','','','string');
		}else{
			$gid = substr($receiver_type,strpos($receiver_type,'_')+1);
			if(empty($gid)) return false;
			$db =& JFactory::getDBO();
			$db->setQuery('SELECT email from '.acymailing::table('users',false).' WHERE gid = '.intval($gid));
			$receivers = $db->loadResultArray();
		}
		if(empty($receivers)){
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('NO_SUBSCRIBER'), 'notice');
			return false;
		}
		$result = true;
		foreach($receivers as $receiver){
			$result = $mailer->sendOne($mailid,$receiver) && $result;
		}
		return $result;
	}
}