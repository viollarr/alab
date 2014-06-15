<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgSystemVmacymailing extends JPlugin
{
	function plgSystemVmacymailing(&$subject, $config){
		parent::__construct($subject, $config);
    }
	function onAfterRoute(){
		if(empty($_POST['option']) OR empty($_POST['page']) OR $_POST['option'] != 'com_virtuemart' OR !in_array($_POST['page'],array('account.index','checkout.index'))) return;
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('system', 'vmacymailing');
			$this->params = new JParameter( $plugin->params );
		}
		$subscribeField = $this->params->get('checkfield','user_email');
		$emailValue =  JRequest::getString('email');
		$subscribeValue = (($subscribeField == 'user_email') ? $emailValue : JRequest::getString($subscribeField));
		if(empty($subscribeValue) OR empty($emailValue) OR in_array(strtolower($subscribeValue),array('no','none','nein','non'))) return;
		if(!include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php')) return;
		$user = null;
		$user->email = trim(strip_tags($emailValue));
		$firstName = JRequest::getString('first_name','');
		$middleName = JRequest::getString('middle_name','');
		$lastName = JRequest::getString('last_name','');
		$user->name = '';
		if(!empty($firstName)) $user->name .= $firstName.' ';
		if(!empty($middleName)) $user->name .= $middleName.' ';
		if(!empty($lastName)) $user->name .= $lastName;
		$user->name = trim($user->name);
		if($this->params->get('subconf','default') == 'yes') $user->confirmed = 1;
		$userClass = acymailing::get('class.subscriber');
		$userClass->checkVisitor = false;
		$userClass->sendConf = false;
		if($this->params->get('sendconf','no') == 'yes') $userClass->sendConf = true;
		$user_id = JRequest::getInt('user_id');
		if(!empty($user_id)){
			$user->userid = $user_id;
			$user->subid = $userClass->subid($user_id);
		}
		$subid = $userClass->save($user);
		if(empty($subid)) return;
		$listsToSubscribe = $this->params->get('lists','all');
		$config = acymailing::config();
		$listsClass = acymailing::get('class.list');
		$allLists = $listsClass->getLists('listid');
		if(acymailing::level(1)){
			$allLists = $listsClass->onlyCurrentLanguage($allLists);
		}
		$listsArray = array();
		if(strpos($listsToSubscribe,',') OR is_numeric($listsToSubscribe)){
			$listsArrayParam = explode(',',$listsToSubscribe);
			foreach($allLists as $oneList){
				if($oneList->published AND in_array($oneList->listid,$listsArrayParam)){$listsArray[] = $oneList->listid;}
			}
		}elseif(strtolower($listsToSubscribe) == 'all'){
			foreach($allLists as $oneList){
				if($oneList->published){$listsArray[] = $oneList->listid;}
			}
		}
		if(empty($listsArray)) return;
		$inserteduser = $userClass->get($subid);
		$currentSubscription = $userClass->getSubscriptionStatus($subid);
		$statusAdd = (empty($inserteduser->confirmed) AND $config->get('require_confirmation',false)) ? 2 : 1;
		$addlists = array();
		foreach($listsArray as $idOneList){
			if(!isset($currentSubscription[$idOneList])){
				$addlists[$statusAdd][] = $idOneList;
			}
		}
		if(!empty($addlists)) {
			$listsubClass = acymailing::get('class.listsub');
			$listsubClass->addSubscription($subid,$addlists);
		}
	 }
}//endclass