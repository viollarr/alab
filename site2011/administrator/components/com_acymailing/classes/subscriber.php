<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class subscriberClass extends acymailingClass{
	var $tables = array('listsub','userstats','queue','subscriber');
	var $pkey = 'subid';
	var $namekey = 'email';
	var $restrictedFields = array('key','confirmed','enabled','ip','userid','created');
	var $errors = array();
	var $checkVisitor = true;
	var $sendConf = true;
	function save($subscriber){
		$app =& JFactory::getApplication();
		$config = acymailing::config();
		if(isset($subscriber->email)){
			$subscriber->email = strtolower($subscriber->email);
			$userHelper = acymailing::get('helper.user');
			if(!$userHelper->validEmail($subscriber->email)){
				echo "<script>alert('".JText::_('VALID_EMAIL',true)."'); window.history.go(-1);</script>";
				exit;
			}
		}
		if(empty($subscriber->subid)){
			$my = JFactory::getUser();
			if($this->checkVisitor && !$app->isAdmin() && (int) $config->get('allow_visitor',1) != 1 && (empty($my->id) OR strtolower($my->email) != $subscriber->email)){
				echo "<script> alert('".JText::_('ONLY_LOGGED',true)."'); window.history.go(-1);</script>\n";
				exit;
			}
			$subscriber->subid = $this->subid($subscriber->email);
		}
		if(empty($subscriber->subid)){
			if(empty($subscriber->created)) $subscriber->created = time();
			if(empty($subscriber->ip)){
				$ipClass = acymailing::get('helper.user');
				$subscriber->ip = $ipClass->getIP();
			}
			if(empty($subscriber->name)) $subscriber->name = ucwords(str_replace(array('.','_','-'),' ',substr($subscriber->email,0,strpos($subscriber->email,'@'))));
			$subscriber->key = md5(substr($subscriber->email,0,strpos($subscriber->email,'@')).time());
			$notifyUsers = $config->get('notification_created');
			if(!$app->isAdmin() && !empty($notifyUsers) && $this->sendConf){
				$mailer = acymailing::get('helper.mailer');
				$mailer->report = false;
				$mailer->autoAddUser = true;
				$mailer->checkConfirmField = false;
				$mailer->addParam('user:name',$subscriber->name);
				$mailer->addParam('user:email',$subscriber->email);
				$mailer->addParam('user:ip',$subscriber->ip);
				$allUsers = explode(',',$notifyUsers);
				foreach($allUsers as $oneUser){
					$mailer->sendOne('notification_created',$oneUser);
				}
			}
			$status = $this->database->insertObject(acymailing::table('subscriber'),$subscriber);
		}else{
			if(count((array)$subscriber) > 1){
				$status = $this->database->updateObject(acymailing::table('subscriber'),$subscriber,'subid');
			}else{
				$status = true;
			}
		}
		if(!$status) return false;
		$subid = empty($subscriber->subid) ? $this->database->insertid() : $subscriber->subid;
		if(!$app->isAdmin() AND $this->sendConf){
			$myuser = $this->get($subid);
			$config = acymailing::config();
			if(empty($myuser->confirmed) && $config->get('require_confirmation',false)){
				$mailClass = acymailing::get('helper.mailer');
				$mailClass->checkConfirmField = false;
				$mailClass->checkEnabled = false;
				$mailClass->report = $config->get('subscription_message',1);
				$mailClass->sendOne('confirmation',$myuser);
			}
		}
		return $subid;
	}
	function subid($email){
		if(is_numeric($email)){
			$cond = ' userid = '.$email;
		}else{
			$cond = 'email = '.$this->database->Quote(trim($email));
		}
		$this->database->setQuery('SELECT subid FROM '.acymailing::table('subscriber').' WHERE '.$cond);
		return $this->database->loadResult();
	}
	function get($subid){
		$column = is_numeric($subid) ? 'subid' : 'email';
		$this->database->setQuery('SELECT * FROM '.acymailing::table('subscriber').' WHERE '.$column.' = '.$this->database->Quote(trim($subid)).' LIMIT 1');
		return $this->database->loadObject();
	}
	function getFull($subid){
		$column = is_numeric($subid) ? 'subid' : 'email';
		$this->database->setQuery('SELECT b.*, a.* FROM '.acymailing::table('subscriber').' as a LEFT JOIN '.acymailing::table('users',false).' as b on a.userid = b.id WHERE '.$column.' = '.$this->database->Quote(trim($subid)).' LIMIT 1');
		return $this->database->loadObject();
	}
	function getSubscription($subid,$index = ''){
		$query = 'SELECT a.*, b.* FROM '.acymailing::table('list').' as b ';
		$query .= 'LEFT JOIN '.acymailing::table('listsub').' as a on a.listid = b.listid AND a.subid = '.intval($subid);
		$query .= ' WHERE b.type = \'list\'';
		$query .= ' ORDER BY b.ordering ASC';
		$this->database->setQuery($query);
		return $this->database->loadObjectList($index);
	}
	function getSubscriptionStatus($subid,$listids = null){
		$query = 'SELECT status,listid FROM '.acymailing::table('listsub').' WHERE subid = '.intval($subid);
		if($listids !== null){
			JArrayHelper::toInteger($listids, array(0));
			$query .= ' AND listid IN ('.implode(',',$listids).')';
		}
		$this->database->setQuery($query);
		return $this->database->loadObjectList('listid');
	}
	function checkFields(&$data,&$subscriber){
		$app =& JFactory::getApplication();
		foreach($data as $column => $value){
			$column = trim(strtolower($column));
			if($app->isAdmin() OR !in_array($column,$this->restrictedFields)){
				acymailing::secureField($column);
				$subscriber->$column = strip_tags($value);
			}
		}
	}
	function saveForm(){
		$app =& JFactory::getApplication();
		$subscriber = null;
		$subscriber->subid = acymailing::getCID('subid');
		if(!$app->isAdmin() && !empty($subscriber->subid)){
			$user = $this->identify();
			if($user->subid != $subscriber->subid){
				die('You are not allowed to modify this user');
			}
		}
		$formData = JRequest::getVar( 'data', array(), '', 'array' );
		if(!empty($formData['subscriber'])){
			$this->checkFields($formData['subscriber'],$subscriber);
		}
		if(empty($subscriber->subid)){
			if(empty($subscriber->email)){
				echo "<script>alert('".JText::_('VALID_EMAIL',true)."'); window.history.go(-1);</script>";
				exit;
			}
			$existSubscriber = $this->get($subscriber->email);
			if(!empty($existSubscriber->subid)){
				if($app->isAdmin()){
					$this->errors[] = 'A user already exists with the e-mail '.$subscriber->email;
					$this->errors[] = 'You can <a href="'.acymailing::completeLink('subscriber&task=edit&subid='.$existSubscriber->subid).'">edit this user</a>';
					return false;
				}else{
					$subscriber->subid = $existSubscriber->subid;
				}
			}
		}
		$subid = $this->save($subscriber);
		JRequest::setVar( 'subid', $subid);
		if(empty($subid)) return false;
		if(!$app->isAdmin() && isset($subscriber->accept) && $subscriber->accept == 0) $formData['masterunsub'] = 1;
		if(empty($formData['listsub'])) return true;
		return $this->saveSubscription($subid,$formData['listsub']);
	}
	function saveSubscription($subid,$formlists){
		$addlists = array();
		$removelists = array();
		$updatelists = array();
		$listids = array_keys($formlists);
		$currentSubscription = $this->getSubscriptionStatus($subid,$listids);
		foreach($formlists as $listid => $oneList){
			if(empty($oneList['status'])){
				if(isset($currentSubscription[$listid])) $removelists[] = $listid;
				continue;
			}
			if(!isset($currentSubscription[$listid])){
				if($oneList['status'] != -1) $addlists[$oneList['status']][] = $listid;
				continue;
			}
			if($currentSubscription[$listid]->status == $oneList['status']) continue;
			$updatelists[$oneList['status']][] = $listid;
		}
		$listsubClass = acymailing::get('class.listsub');
		$status = true;
		if(!empty($updatelists)) $status = $listsubClass->updateSubscription($subid,$updatelists) && $status;
		if(!empty($removelists)) $status = $listsubClass->removeSubscription($subid,$removelists) && $status;
		if(!empty($addlists)) $status = $listsubClass->addSubscription($subid,$addlists) && $status;
		return $status;
	}
	function confirmSubscription($subid){
		$this->database->setQuery('UPDATE '.acymailing::table('subscriber').' SET `confirmed` = 1 WHERE `subid` = '.intval($subid).' LIMIT 1');
		$this->database->query();
		$this->database->setQuery('SELECT `listid` FROM '.acymailing::table('listsub').' WHERE `status` = 2 AND `subid` = '.intval($subid));
		$listids = $this->database->loadResultArray();
		if(empty($listids)) return;
		$listsubClass = acymailing::get('class.listsub');
		$listsubClass->updateSubscription($subid,array(1 => $listids));
	}
	function identify($onlyvalue = false){
		$app =& JFactory::getApplication();
		$subid = JRequest::getInt("subid",0);
		$key = JRequest::getString("key",'');
		if(empty($subid) OR empty($key)){
			$user = JFactory::getUser();
			if(!empty($user->id)){
				$userIdentified = $this->get($user->email);
				return $userIdentified;
			}
			if(!$onlyvalue) $app->enqueueMessage(JText::_('ASK_LOG'),'error');
			return false;
		}
		$this->database->setQuery('SELECT * FROM '.acymailing::table('subscriber').' WHERE `subid` = '.$this->database->Quote($subid).' AND `key` = '.$this->database->Quote($key).' LIMIT 1');
		$userIdentified = $this->database->loadObject();
		if(empty($userIdentified)){
			if(!$onlyvalue) $app->enqueueMessage(JText::_('INVALID_KEY'),'error');
			return false;
		}
		return $userIdentified;
	}
}