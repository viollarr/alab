<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class importHelper{
	var $importUserInLists = array();
	var $totalInserted = 0;
	var $totalTry = 0;
	var $totalValid = 0;
	var $allSubid = array();
	var $db;
	function importHelper(){
		acymailing::increasePerf();
		$this->db =& JFactory::getDBO();
	}
	function file(){
		$app =& JFactory::getApplication();
		$importFile =  JRequest::getVar( 'importfile', array(), 'files','array');
		if(empty($importFile['name'])){
			$app->enqueueMessage(JText::_('BROWSE_FILE'),'notice');
			return false;
		}
		jimport('joomla.filesystem.file');
		$config =& acymailing::config();
		$allowedFiles = explode(',',strtolower($config->get('allowedfiles')));
		$uploadFolder = JPath::clean(html_entity_decode($config->get('uploadfolder')));
		$uploadFolder = trim($uploadFolder,DS.' ').DS;
		$uploadPath = JPath::clean(ACYMAILING_ROOT.$uploadFolder);
		if(!is_dir($uploadPath)){
			jimport('joomla.filesystem.folder');
			JFolder::create($uploadPath);
		}
		if(!is_writable($uploadPath)){
			@chmod($uploadPath,'0755');
			if(!is_writable($uploadPath)){
				$app->enqueueMessage(JText::sprintf( 'WRITABLE_FOLDER',$uploadPath), 'notice');
			}
		}
		$attachment = null;
		$attachment->filename = strtolower(JFile::makeSafe($importFile['name']));
		$attachment->size = $importFile['size'];
		$attachment->extension = strtolower(substr($attachment->filename,strrpos($attachment->filename,'.')+1));
		if(!in_array($attachment->extension,$allowedFiles)){
			$app->enqueueMessage(JText::sprintf( 'ACCEPTED_TYPE',$attachment->extension,$config->get('allowedfiles')), 'notice');
			return false;
		}
		if ( !move_uploaded_file($importFile['tmp_name'], $uploadPath . $attachment->filename)) {
			if(!JFile::upload($importFile['tmp_name'], $uploadPath . $attachment->filename)){
				$app->enqueueMessage(JText::sprintf( 'FAIL_UPLOAD',$importFile['tmp_name'],$uploadPath . $attachment->filename), 'error');
			}
		}
		$contentFile = file_get_contents($uploadPath . $attachment->filename);
		if(!$contentFile){
			$app->enqueueMessage(JText::sprintf( 'FAIL_OPEN',$uploadPath . $attachment->filename), 'error');
			return false;
		};
		$contentFile = str_replace(array("\r\n","\r"),"\n",$contentFile);
		$importLines = explode("\n", $contentFile);
		$i = 0;
		while(empty($this->header)){
			$this->header = trim($importLines[$i]);
			$i++;
		}
		if(!$this->_autoDetectHeader()){
			$app->enqueueMessage(JText::sprintf('IMPORT_HEADER',$this->header),'error');
			$app->enqueueMessage(JText::_('IMPORT_EMAIL'),'error');
			$app->enqueueMessage(JText::_('IMPORT_EXAMPLE'),'error');
			return false;
		}
		$numberColumns = count($this->columns);
		$userHelper = acymailing::get('helper.user');
		$importUsers = array();
		$charsetConvert = JRequest::getString('charsetconvert','');
		$encodingHelper = acymailing::get('helper.encoding');
		while (isset($importLines[$i])) {
			$data = explode($this->separator,$importLines[$i]);
			$i++;
			if(empty($importLines[$i-1])) continue;
			$this->totalTry++;
			if(count($data) != $numberColumns){
				static $errorcount = false;
				if(!$errorcount){
					$errorcount = true;
					$app->enqueueMessage(JText::sprintf('IMPORT_ARGUMENTS',$numberColumns),'error');
				}
				$app->enqueueMessage(JText::sprintf('IMPORT_ERRORLINE',$importLines[$i-1]),'notice');
				if($this->totalTry == 1) return false;
				continue;
			}
			$newUser = null;
			foreach($data as $num => $value){
				$field = $this->columns[$num];
				if($field == 'listids'){
					$liststosub = explode('-',trim($value,'\'" '));
					foreach($liststosub as $onelistid){
						$this->importUserInLists[$onelistid][] = $this->db->Quote($newUser->email);
					}
					continue;
				}
				$newUser->$field = trim($value,'\'" ');
				if(!empty($charsetConvert)){
					$newUser->$field = $encodingHelper->change($newUser->$field,$charsetConvert,'UTF-8');
				}
			}
			if(!$userHelper->validEmail($newUser->email)){
				$app->enqueueMessage(JText::sprintf('NOT_VALID_EMAIL',$newUser->email),'notice');
				continue;
			}
			$this->_checkData($newUser);
			$importUsers[] = $newUser;
			$this->totalValid++;
			if( $this->totalValid%50 == 0){
				$this->_insertUsers($importUsers);
				$importUsers = array();
			}
		}
		$this->_insertUsers($importUsers);
		unlink($uploadPath . $attachment->filename);
		$app->enqueueMessage(JText::sprintf('IMPORT_REPORT',$this->totalTry,$this->totalInserted,$this->totalTry - $this->totalValid,$this->totalValid - $this->totalInserted));
		$this->_subscribeUsers();
		return true;
	}
	function _subscribeUsers(){
		$app =& JFactory::getApplication();
		if(empty($this->allSubid)) return true;
		$subdate = time();
		if(empty($this->importUserInLists)){
			$lists = JRequest::getVar('importlists',array());
			$listsSubscribe = array();
			foreach($lists as $listid => $val){
				if(!empty($val)){
					$listid = (int) $listid;
					$query = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (listid,subid,subdate,status) VALUES ';
					foreach($this->allSubid as $subid){
						$query .= "($listid,$subid,$subdate,1),";
					}
					$query = rtrim($query,',');
					$this->db->setQuery($query);
					$this->db->query();
					$nbsubscribed = $this->db->getAffectedRows();
					$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIBE_CONFIRMATION',$nbsubscribed,$listid));
				}
			}
		}else{
			foreach($this->importUserInLists as $listid => $arrayEmails){
				if(!empty($listid)){
					$listid = (int) $listid;
					$query = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (listid,subid,subdate,status) ';
					$query .= "SELECT $listid,`subid`,$subdate,1 FROM ".acymailing::table('subscriber')." WHERE `email` IN (";
					$query .= implode(',',$arrayEmails).')';
					$this->db->setQuery($query);
					$this->db->query();
					$nbsubscribed = $this->db->getAffectedRows();
					$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIBE_CONFIRMATION',$nbsubscribed,$listid));
				}
			}
		}
		return true;
	}
	function _insertUsers($users){
		if(empty($users)) return true;
		$columns = reset($users);
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`'.implode('`,`',array_keys(get_object_vars($columns))).'`) VALUES (';
		$values = array();
		$allemails = array();
		foreach($users as $a => $oneUser){
			$value = array();
			foreach($oneUser as $map => $oneValue){
				if($map == 'created' AND !is_numeric($oneValue)){
					$oneValue = strtotime($oneValue);
				}
				$value[] = $this->db->Quote($oneValue);
				if($map == 'email'){
					$allemails[] = $this->db->Quote($oneValue);
				}
			}
			$values[] = implode(',',$value);
		}
		$query .= implode('),(',$values).')';
		$this->db->setQuery($query);
		$this->db->query();
		$this->totalInserted += $this->db->getAffectedRows();
		$this->db->setQuery('SELECT subid FROM '.acymailing::table('subscriber').' WHERE email IN ('.implode(',',$allemails).')');
		$this->allSubid = array_merge($this->allSubid,$this->db->loadResultArray());
		return true;
	}
	function _checkData(&$user){
		if(empty($user->created)) $user->created = time();
		elseif(!is_numeric($user->created)) $user->created = strtotime($user->created);
		if(empty($user->name)) $user->name = substr($user->email,0,strpos($user->email,'@'));
		if(empty($user->key)) $user->key = md5(substr($user->email,0,strpos($user->email,'@')).time());
	}
	function _autoDetectHeader(){
		$app =& JFactory::getApplication();
		$this->separator = ',';
		$this->header = str_replace("\xEF\xBB\xBF","",$this->header);
		$listSeparators = array("\t",';',',');
		foreach($listSeparators as $sep){
			if(strpos($this->header,$sep) !== false){
				$this->separator = $sep;
				break;
			}
		}
		$this->columns = explode($this->separator,$this->header);
		$columnsTable = $this->db->getTableFields(acymailing::table('subscriber'));
		$columns = reset($columnsTable);
		foreach($this->columns as $i => $oneColumn){
			$this->columns[$i] = strtolower(trim($oneColumn,'" '));
			if($this->columns[$i] == 'listids') continue;
			if(!isset($columns[$this->columns[$i]])){
				$app->enqueueMessage(JText::sprintf('IMPORT_ERROR_FIELD',$this->columns[$i],implode(' | ',array_keys($columns))),'error');
				return false;
			}
		}
		if(!in_array('email',$this->columns)) return false;
		return true;
	}
	function joomla(){
		$app =& JFactory::getApplication();
		$query = 'UPDATE IGNORE '.acymailing::table('users',false).' as b, '.acymailing::table('subscriber').' as a SET a.userid = b.id WHERE a.email = b.email';
		$this->db->setQuery($query);
		$this->db->query();
		$nbUpdated = $this->db->getAffectedRows();
		$query = 'UPDATE IGNORE '.acymailing::table('users',false).' as b, '.acymailing::table('subscriber').' as a SET a.email = b.email, a.name = b.name, a.enabled = 1 - b.block WHERE a.userid = b.id AND a.userid > 0';
		$this->db->setQuery($query);
		$this->db->query();
		$nbUpdated += $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_UPDATE',$nbUpdated));
		$query = 'SELECT subid FROM '.acymailing::table('subscriber').' as a LEFT JOIN '.acymailing::table('users',false).' as b on a.userid = b.id WHERE b.id IS NULL AND a.userid > 0';
		$this->db->setQuery($query);
		$deletedSubid = $this->db->loadResultArray();
		if(!empty($deletedSubid)){
			$userClass = acymailing::get('class.subscriber');
			$deletedUsers = $userClass->delete($deletedSubid);
			$app->enqueueMessage(JText::sprintf('IMPORT_DELETE',$deletedUsers));
		}
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`email`,`name`,`confirmed`,`userid`,`created`,`enabled`,`accept`,`html`) SELECT `email`,`name`,1-`block`,`id`,'.$time.',1-`block`,1,1 FROM '.acymailing::table('users',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		if(!empty($insertedUsers)){
		}
		$lists = JRequest::getVar('importlists',array());
		$listsSubscribe = array();
		foreach($lists as $listid => $val){
			if(!empty($val)) $listsSubscribe[] = (int) $listid;
		}
		if(empty($listsSubscribe)) return true;
		$query = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (`listid`,`subid`,`subdate`,`status`) ';
		$query.= 'SELECT a.`listid`, b.`subid` ,'.$time.',1 FROM '.acymailing::table('list').' as a, '.acymailing::table('subscriber').' as b  WHERE a.`listid` IN ('.implode(',',$listsSubscribe).') AND b.`userid` > 0';
		$this->db->setQuery($query);
		$this->db->query();
		$nbsubscribed = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIPTION',$nbsubscribed));
		return true;
	}
	function acajoom(){
		$app =& JFactory::getApplication();
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (email,name,confirmed,created,enabled,accept,html) SELECT email,name,confirmed,'.$time.',1-blacklist,1,receive_html FROM '.acymailing::table('acajoom_subscribers',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		if(JRequest::getInt('acajoom_lists',0) == 1) $this->_importAcajoomLists();
		$query = 'SELECT b.subid FROM '.acymailing::table('acajoom_subscribers',false).' as a LEFT JOIN '.acymailing::table('subscriber').' as b on a.email = b.email';
		$this->db->setQuery($query);
		$this->allSubid = $this->db->loadResultArray();
		$this->_subscribeUsers();
		return true;
	}
	function _importYancLists(){
		$app =& JFactory::getApplication();
		$query = 'SELECT `id`, `name`, `description`, `state` as `published` FROM `#__yanc_letters`';
		$this->db->setQuery($query);
		$yancLists = $this->db->loadObjectList('id');
		$user =& JFactory::getUser();
		$query = 'SELECT `listid`, `alias` FROM '.acymailing::table('list').' WHERE `alias` IN (\'yanclist'.implode('\',\'yanclist',array_keys($yancLists)).'\')';
		$this->db->setQuery($query);
		$joomLists = $this->db->loadObjectList('alias');
		$listClass = acymailing::get('class.list');
		$time = time();
		foreach($yancLists as $oneList){
			$oneList->alias = 'yanclist'.$oneList->id;
			$oneList->userid = $user->id;
			$yancListId = $oneList->id;
			if(isset($joomLists[$oneList->alias])){
				$joomListId = $joomLists[$oneList->alias]->listid;
			}else{
				unset($oneList->id);
				$joomListId = $listClass->save($oneList);
				$app->enqueueMessage(JText::sprintf('IMPORT_LIST',$oneList->name));
			}
			$querySelect = 'SELECT DISTINCT c.subid,'.$joomListId.','.$time.',1 FROM `#__yanc_subscribers` as a ';
			$querySelect .= 'LEFT JOIN '.acymailing::table('subscriber').' as c on a.email = c.email ';
			$querySelect .= 'WHERE a.lid = '.$yancListId.' AND a.state = 1 AND c.subid > 0';
			$queryInsert = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (subid,listid,subdate,status) ';
			$this->db->setQuery($queryInsert.$querySelect);
			$this->db->query();
			$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIBE_CONFIRMATION',$this->db->getAffectedRows(),$oneList->name));
		}
		return true;
	}
	function _importAcajoomLists(){
		$app =& JFactory::getApplication();
		$query = 'SELECT `id`, `list_name` as `name`, `hidden` as `visible`, `list_desc` as `description`, `published`, `owner` as `userid` FROM '.acymailing::table('acajoom_lists',false);
		$this->db->setQuery($query);
		$acaLists = $this->db->loadObjectList('id');
		$query = 'SELECT `listid`, `alias` FROM '.acymailing::table('list').' WHERE `alias` IN (\'acajoomlist'.implode('\',\'acajoomlist',array_keys($acaLists)).'\')';
		$this->db->setQuery($query);
		$joomLists = $this->db->loadObjectList('alias');
		$listClass = acymailing::get('class.list');
		$time = time();
		foreach($acaLists as $oneList){
			$oneList->alias = 'acajoomlist'.$oneList->id;
			$acaListId = $oneList->id;
			if(isset($joomLists[$oneList->alias])){
				$joomListId = $joomLists[$oneList->alias]->listid;
			}else{
				unset($oneList->id);
				$joomListId = $listClass->save($oneList);
				$app->enqueueMessage(JText::sprintf('IMPORT_LIST',$oneList->name));
			}
			$querySelect = 'SELECT DISTINCT c.subid,'.$joomListId.','.$time.',1 FROM '.acymailing::table('acajoom_queue',false).' as a ';
			$querySelect .= 'LEFT JOIN '.acymailing::table('acajoom_subscribers',false).' as b on a.subscriber_id = b.id ';
			$querySelect .= 'LEFT JOIN '.acymailing::table('subscriber').' as c on b.email = c.email ';
			$querySelect .= 'WHERE a.list_id = '.$acaListId.' AND c.subid > 0';
			$queryInsert = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (subid,listid,subdate,status) ';
			$this->db->setQuery($queryInsert.$querySelect);
			$this->db->query();
			$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIBE_CONFIRMATION',$this->db->getAffectedRows(),$oneList->name));
		}
		return true;
	}
	function letterman(){
		$app =& JFactory::getApplication();
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`email`,`name`,`confirmed`,`created`,`enabled`,`accept`,`html`) SELECT `subscriber_email`,`subscriber_name`,`confirmed`,'.$time.',1,1,1 FROM '.acymailing::table('letterman_subscribers',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		$query = 'SELECT b.subid FROM '.acymailing::table('letterman_subscribers',false).' as a LEFT JOIN '.acymailing::table('subscriber').' as b on a.subscriber_email = b.email';
		$this->db->setQuery($query);
		$this->allSubid = $this->db->loadResultArray();
		$this->_subscribeUsers();
		return true;
	}
	function yanc(){
		$app =& JFactory::getApplication();
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`email`,`name`,`confirmed`,`created`,`enabled`,`accept`,`html`, `ip`) SELECT `email`,`name`,`confirmed`,'.$time.',`state`,1,`html`,`ip` FROM '.acymailing::table('yanc_subscribers',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		if(JRequest::getInt('yanc_lists',0) == 1) $this->_importYancLists();
		$query = 'SELECT b.subid FROM '.acymailing::table('yanc_subscribers',false).' as a LEFT JOIN '.acymailing::table('subscriber').' as b on a.email = b.email';
		$this->db->setQuery($query);
		$this->allSubid = $this->db->loadResultArray();
		$this->_subscribeUsers();
	}
	function ccnewsletter(){
		$app =& JFactory::getApplication();
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`email`,`name`,`confirmed`,`created`,`enabled`,`accept`,`html`) SELECT `email`,`name`,`enabled`,'.$time.',`enabled`,1,1-`plainText` FROM '.acymailing::table('ccnewsletter_subscribers',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		$query = 'SELECT b.subid FROM '.acymailing::table('ccnewsletter_subscribers',false).' as a LEFT JOIN '.acymailing::table('subscriber').' as b on a.email = b.email';
		$this->db->setQuery($query);
		$this->allSubid = $this->db->loadResultArray();
		$this->_subscribeUsers();
		return true;
	}
	function communicator(){
		$app =& JFactory::getApplication();
		$time = time();
		$query = 'INSERT IGNORE INTO '.acymailing::table('subscriber').' (`email`,`name`,`confirmed`,`created`,`enabled`,`accept`,`html`) SELECT `subscriber_email`,`subscriber_name`,`confirmed`,'.$time.',1,1,1 FROM '.acymailing::table('communicator_subscribers',false);
		$this->db->setQuery($query);
		$this->db->query();
		$insertedUsers = $this->db->getAffectedRows();
		$app->enqueueMessage(JText::sprintf('IMPORT_NEW',$insertedUsers));
		$query = 'SELECT b.subid FROM '.acymailing::table('communicator_subscribers',false).' as a LEFT JOIN '.acymailing::table('subscriber').' as b on a.subscriber_email = b.email';
		$this->db->setQuery($query);
		$this->allSubid = $this->db->loadResultArray();
		$this->_subscribeUsers();
		return true;
	}
	function mass($add = true){
		$app =& JFactory::getApplication();
		$importLists = JRequest::getVar('importlists',array(),'','array');
		$allLists = array();
		foreach($importLists as $listid => $value){
			if(!empty($value)) $allLists[] = intval($listid);
		}
		if(empty($allLists)){
			$app->enqueueMessage('Please select at least one list','notice');
			return false;
		}
		$filters = JRequest::getVar('filter',array(),'','array');

		$allFilters = array();
		foreach($filters['type'] as $filterNum => $filterType){
			if(empty($filterType)) continue;
			if($filterType == 'acymailingfield'){
				$operator = $filters[$filterNum]['acymailingfield_operator'];
				$value = $filters[$filterNum]['acymailingfield_value'];
				$column = $filters[$filterNum]['acymailingfield'];
				$allFilters['a'] = true;
				$allFilters['filters'][] = $this->_convertQuery('a',$column,$operator,$value);
				continue;
			}
			if($filterType == 'cbfield'){
				$operator = $filters[$filterNum]['cbfield_operator'];
				$value = $filters[$filterNum]['cbfield_value'];
				$column = $filters[$filterNum]['cbfield'];
				$allFilters['d'] = true;
				$allFilters['filters'][] = $this->_convertQuery('d',$column,$operator,$value);
				continue;
			}
			if($filterType == 'joomlafield'){
				$operator = $filters[$filterNum]['joomlafield_operator'];
				$value = $filters[$filterNum]['joomlafield_value'];
				$column = $filters[$filterNum]['joomlafield'];
				$allFilters['c'] = true;
				$allFilters['filters'][] = $this->_convertQuery('c',$column,$operator,$value);
				continue;
			}
			if($filterType == 'group'){
				$operator = '=';
				$value = $filters[$filterNum]['group'];
				$column = 'gid';
				$allFilters['c'] = true;
				$allFilters['filters'][] = $this->_convertQuery('c',$column,$operator,$value);
				continue;
			}
			if($filterType == 'list'){
				$query = 'b'.$filterNum.'.status = '.$this->db->Quote($filters[$filterNum]['list_status']).' AND b'.$filterNum.'.listid = '.$this->db->Quote($filters[$filterNum]['list']);
				$allFilters['b'][$filterNum] = true;
				$allFilters['filters'][] = $query;
				continue;
			}
			if(acymailing::level(3)){
				include(dirname(__FILE__).DS.'import_enterprise.php');
			}
		}
		$subdate = time();
		foreach($allLists as $listid){
			if($add){
				$query = 'INSERT IGNORE INTO '.acymailing::table('listsub').' (listid,subid,subdate,status) ';
				$query .= 'SELECT '.$listid.',a.subid,'.$subdate.',1 FROM '.acymailing::table('subscriber').' as a ';
			}else{
				$query = 'DELETE d.* FROM '.acymailing::table('listsub').' as d ';
				$query .= 'LEFT JOIN '.acymailing::table('subscriber').' as a on a.subid = d.subid ';
				$allFilters['filters']['listdelete'] = 'd.listid = '.$listid;
			}
			if(!empty($allFilters['c'])){
				$query .= 'LEFT JOIN '.acymailing::table('users',false).' as c on a.userid = c.id ';
			}
			if(!empty($allFilters['b'])){
				foreach($allFilters['b'] as $as => $conditions){
					$query .= 'LEFT JOIN '.acymailing::table('listsub').' as b'.$as.' on a.subid = b'.$as.'.subid ';
				}
			}
			if(!empty($allFilters['d'])){
				$query .= 'LEFT JOIN '.acymailing::table('comprofiler',false).' as d on a.userid = d.user_id ';
			}
			if(!empty($allFilters['filters'])){
				$query .= ' WHERE ('.implode(') AND (',$allFilters['filters']).')';
			}
			$this->db->setQuery($query);
			$this->db->query();
			$nbsubscribed = $this->db->getAffectedRows();
			if($add){
				$app->enqueueMessage(JText::sprintf('IMPORT_SUBSCRIBE_CONFIRMATION',$nbsubscribed,$listid));
			}else{
				$app->enqueueMessage(JText::sprintf('IMPORT_REMOVE',$nbsubscribed,$listid));
			}
		}
		return true;
	}
	function _convertQuery($as,$column,$operator,$value){
		if($operator == 'CONTAINS'){
			$operator = 'LIKE';
			$value = '%'.$value.'%';
		}elseif($operator == 'BEGINS'){
			$operator = 'LIKE';
			$value = $value.'%';
		}elseif($operator == 'END'){
			$operator = 'LIKE';
			$value = '%'.$value;
		}elseif(!in_array($operator,array('IS NULL','IS NOT NULL','NOT LIKE','LIKE','=','!=','>','<','>=','<='))){
			die('Operator not safe : '.$operator);
		}
		$value = $this->db->Quote($value);
		if(in_array($operator,array('IS NULL','IS NOT NULL'))){
			$value = '';
		}
		return $as.'.`'.acymailing::secureField($column).'` '.$operator.' '.$value;
	}
}
