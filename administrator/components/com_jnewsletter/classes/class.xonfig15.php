<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class xonfig extends JTable {

	var $akey	= null;
	var $text		= null;
	var $value	= null;

	function xonfig() {
		$db =& JFactory::getDBO();
		parent::__construct( '#__jnews_xonfig', 'akey', $db );
	}


	 function saveConfig($config) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$configKeys = array_keys($config);
		$size = sizeof($configKeys);
		for ($index = 0; $index < $size; $index++) {
			if (get_magic_quotes_gpc()) {
				$key = stripslashes($configKeys[$index]);
				$text = stripslashes($config[$configKeys[$index]]);
			} else {
				$key = $configKeys[$index];
				$text = $config[$configKeys[$index]];
			}
			$key = stripslashes( $key);
			$key = str_replace( "'" , "" , $key);
			if ( $key == 'token_new' && !empty($text) ) {
				$key = 'token';
				$erro->ck = $this->update( 'license' , '' );
			}
			if ( $key=='license1' ) {
				$text = trim($text);
				$key = 'license';
			}
			if (isset($GLOBALS[ACA.$key]) and  $GLOBALS[ACA.$key]!= $text) {
				if ( $key=='token' ) $code = auto::getToken($text);
				$erro->ck = $this->update($key, $text);
			}
			$erro->E(__LINE__ ,  '9010', $config );

		}
		if(class_exists('auto')) auto::good();
		return $erro->R();
   }

	 function loadConfig() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$erro->show();
		$query = 'SELECT * FROM `#__jnews_xonfig` ';
		$database->setQuery($query);
		$configs = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();
		if ($erro->E(__LINE__ ,  '9011', $configs )) {
			foreach ($configs as $config) {
				if (!empty($config->text)) $GLOBALS[ACA.$config->akey] = $config->text;
				else $GLOBALS[ACA.$config->akey] = $config->value;
			}
		}

		return true;
   }


	function get($key) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		$query = 'SELECT `text` FROM `#__jnews_xonfig` ';
		$query .= " WHERE `akey`=  '$key' ";
		$database->setQuery($query);
		return $database->loadResult();

	 }



	function plus($key, $value) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$query = 'UPDATE `#__jnews_xonfig` SET ';
		$query .= " `value` = `value` + $value ";
		$query .= " WHERE `akey`=  '$key' ";
		$database->setQuery($query);
		$database->query();
		return $database->getErrorMsg();

	 }


	function insert($key, $text='' , $value=0, $force=false) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if (!$force AND !isset($GLOBALS[ACA.$key]) ) $force = true;
		if ( $force ) {
			$query = 'REPLACE INTO `#__jnews_xonfig` ';
			$query .= '(`akey`, `text`, `value`) ';
			$query .= " VALUES ( '$key' , '$text' , '$value' )" ;
			$database->setQuery($query);
			$database->query();
			if ($value>0) 	$GLOBALS[ACA.$key] = $value;
			 else $GLOBALS[ACA.$key] = $text;
			return $database->getErrorMsg();
		}

	 }


	function update($key, $text) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$this->akey=$key;
		$this->text=$text;
		$this->insert($key, $text, 0, true);
		$GLOBALS[ACA.$key] = $text;
		$erro->err = $this->getError();
		return $erro->E(__LINE__ ,  '9067', $this );
	 }


	function updateActiveList() {

		$xf = new xonfig();
		$j = 0;
		$nb = array();
		for($i = 1; $i < $GLOBALS[ACA.'nblist']; $i ++) {
			if ($GLOBALS[ACA.'listype'.$i] == 1) {
				$j++;
				$nb[$j] = $i;
			}
		}

		$activeList = implode(",", $nb);

		return $xf->update('activelist', $activeList);

	 }


	 function filetoDatabase($jnewsletterConfigFile) {
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$erro->show();
		$configKeys = array_keys($jnewsletterConfigFile);
		$size = sizeof($configKeys);
		for ($index = 0; $index < $size; $index++) {
			$erro->err .= $this->insert($configKeys[$index], $jnewsletterConfigFile[$configKeys[$index]], 0);
		}

		return $erro->E(__LINE__ ,  '9012' );

   }

   function cron(){

	$content = '';
	$base = ACA_JPATH_LIVE;//JURI::root();//ACA_JPATH_LIVE_NO_HTTPS;//.'/index.php?option=com_jnewsletter';
	$password=$GLOBALS[ACA.'url_pass'];

	$site= urlencode(base64_encode(serialize($base)));

	if($GLOBALS[ACA.'j_cron']){
		$publish='Yes';
	}else{
		$publish='No';
	}

	///$content .= '<img src="http://www.ijoobi.com/index.php?option=com_jscheduler&controller=jurlauncher.cron&task=save'.
		//'&site=\''.$site.'&publish=\''.$publish.'\'&password=\''.$password.'\'" border="0"&width="1"&height="1 />';

	$content .= '<img src="http://www.ijoobi.com/index.php?option=com_jscheduler&controller=jurlauncher.cron&task=save'.
		'&site='.$site.'&publish='.$publish.'&password='.$password.'&border="0"&width="1"&height="1 />';

	echo $content;

	}//endfct


 }


