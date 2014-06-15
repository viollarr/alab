<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
function com_install(){
	include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php');
	acymailing::increasePerf();
	$lang =& JFactory::getLanguage();
	$lang->load(ACYMAILING_COMPONENT,JPATH_SITE);
	$installClass = new acymailingInstall();
	$installClass->updateJoomailing();
	$installClass->addPref();
	$installClass->updatePref();
	$installClass->updateSQL();
	$installClass->displayInfo();
}
class acymailingInstall{
	var $level = 'enterprise';
	var $version = '1.1.2';
	var $update = false;
	var $fromLevel = '';
	var $fromVersion = '';
	var $db;
	function acymailingInstall(){
		$this->db =& JFactory::getDBO();
	}
	function displayInfo(){
		unset($_SESSION['acymailing']['li']);
		echo '<h1>Please wait... </h1><h2>AcyMailing will now automatically install the Plugins and the Module</h2>';
		$url = 'index.php?option=com_acymailing&gtask=update&task=install';
		echo '<a href="'.$url.'">Please click here if you are not automatically redirected within 3 seconds</a>';
		echo "<script language=\"javascript\" type=\"text/javascript\">document.location.href='$url';</script>\n";
	}
	function updatePref(){
		$this->db->setQuery("SELECT `namekey`, `value` FROM `#__acymailing_config` WHERE `namekey` IN ('version','level') LIMIT 2");
		$results = $this->db->loadObjectList('namekey');
		if($results['version'] == $this->version AND $results['level'] == $this->level) return true;
		$this->update = true;
		$this->fromLevel = $results['level'];
		$this->fromVersion = $results['version'];
		$query = "REPLACE INTO `#__acymailing_config` (`namekey`,`value`) VALUES ('level',".$this->db->Quote($this->level)."),('version',".$this->db->Quote($this->version)."),('installcomplete','0')";
		$this->db->setQuery($query);
		$this->db->query();
	}
	function updateSQL(){
		if(!$this->update) return true;
	}
	function updateJoomailing(){
		$this->db->setQuery("SHOW TABLES LIKE '".$this->db->getPrefix()."joomailing_config'");
		$result = $this->db->loadResult();
		if(empty($result)) return true;
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_config` (`namekey`,`value`) SELECT `namekey`, REPLACE(`value`,'com_joomailing','com_acymailing') FROM `#__joomailing_config`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_list` (`name`, `description`, `ordering`, `listid`, `published`, `userid`, `alias`, `color`, `visible`, `welmailid`, `unsubmailid`, `type`) SELECT `name`, `description`, `ordering`, `listid`, `published`, `userid`, `alias`, `color`, `visible`, `welmailid`, `unsubmailid`, `type` FROM `#__joomailing_list`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_listcampaign` (`campaignid`, `listid`) SELECT `campaignid`, `listid` FROM `#__joomailing_listcampaign`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_listmail` (`listid`, `mailid`) SELECT `listid`, `mailid` FROM `#__joomailing_listmail`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_listsub` (`listid`, `subid`, `subdate`, `unsubdate`, `status`) SELECT `listid`, `subid`, `subdate`, `unsubdate`, `status` FROM `#__joomailing_listsub`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_mail` (`mailid`, `subject`, `body`, `altbody`, `published`, `senddate`, `created`, `fromname`, `fromemail`, `replyname`, `replyemail`, `type`, `visible`, `userid`, `alias`, `attach`, `html`, `tempid`, `key`, `frequency`, `params`) SELECT `mailid`, `subject`, REPLACE(`body`,'joomailing','acymailing'), REPLACE(`altbody`,'joomailing','acymailing'), `published`, `senddate`, `created`, `fromname`, `fromemail`, `replyname`, `replyemail`, `type`, `visible`, `userid`, `alias`, REPLACE(`attach`,'com_joomailing','com_acymailing'), `html`, `tempid`, `key`, `frequency`, REPLACE(`params`,'com_joomailing','com_acymailing') FROM `#__joomailing_mail`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_queue` (`senddate`, `subid`, `mailid`, `priority`, `try`) SELECT `senddate`, `subid`, `mailid`, `priority`, `try` FROM `#__joomailing_queue`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_stats` (`mailid`, `senthtml`, `senttext`, `senddate`, `openunique`, `opentotal`, `bounceunique`, `fail`, `clicktotal`, `clickunique`, `unsub`, `forward`) SELECT `mailid`, `senthtml`, `senttext`, `senddate`, `openunique`, `opentotal`, `bounceunique`, `fail`, `clicktotal`, `clickunique`, `unsub`, `forward` FROM `#__joomailing_stats`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_subscriber` (`subid`, `email`, `userid`, `name`, `created`, `confirmed`, `enabled`, `accept`, `ip`, `html`, `key`) SELECT `subid`, `email`, `userid`, `name`, `created`, `confirmed`, `enabled`, `accept`, `ip`, `html`, `key` FROM `#__joomailing_subscriber`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_template` (`tempid`, `name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`) SELECT `tempid`, `name`, REPLACE(`description`,'joomailing','acymailing'), REPLACE(`body`,'joomailing','acymailing'), REPLACE(`altbody`,'joomailing','acymailing'), `created`, `published`, `premium`, `ordering`, `namekey`, REPLACE(`styles`,'joomailing','acymailing') FROM `#__joomailing_template`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_url` (`urlid`, `name`, `url`) SELECT `urlid`, REPLACE(`name`,'com_joomailing','com_acymailing'), REPLACE(`url`,'com_joomailing','com_acymailing') FROM `#__joomailing_url`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_urlclick` (`urlid`, `mailid`, `click`, `subid`, `date`) SELECT `urlid`, `mailid`, `click`, `subid`, `date` FROM `#__joomailing_urlclick`");
		$this->db->query();
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_userstats` (`mailid`, `subid`, `html`, `sent`, `senddate`, `open`, `opendate`, `bounce`, `fail`) SELECT `mailid`, `subid`, `html`, `sent`, `senddate`, `open`, `opendate`, `bounce`, `fail` FROM `#__joomailing_userstats`");
		$this->db->query();
		$this->db->setQuery("DROP TABLE IF EXISTS `#__joomailing_config`, `#__joomailing_list`, `#__joomailing_listcampaign`, `#__joomailing_listmail`, `#__joomailing_listsub`, `#__joomailing_mail`, `#__joomailing_queue` , `#__joomailing_stats`, `#__joomailing_subscriber`, `#__joomailing_template` , `#__joomailing_url`, `#__joomailing_urlclick`, `#__joomailing_userstats`");
		$this->db->query();
		$this->db->setQuery("UPDATE `#__modules` SET `title` = REPLACE(`title`,'JooMailing','AcyMailing'), `module` = REPLACE(`module`,'joomailing','acymailing'), `params` = REPLACE(`params`,'joomailing','acymailing')");
		$this->db->query();
		$this->db->setQuery("UPDATE `#__plugins` SET `name` = REPLACE(REPLACE(REPLACE(`name`,'jooMailing','AcyMailing'),'joomailing','acymailing'),'JooMailing','AcyMailing'), `element` = REPLACE(`element`,'joomailing','acymailing'), `folder` = REPLACE(`folder`,'joomailing','acymailing'), `params` = REPLACE(`params`,'joomailing','acymailing')");
		$this->db->query();
		$this->db->setQuery("DELETE FROM `#__components` WHERE `option` LIKE '%joomailing%' OR `admin_menu_link` LIKE '%joomailing%'");
		$this->db->query();
		$this->db->setQuery("UPDATE `#__menu` SET `menutype` = REPLACE(`menutype`,'joomailing','acymailing'), `name` = REPLACE(`name`,'joomailing','acymailing'), `alias` = REPLACE(`alias`,'joomailing','acymailing'), `link` = REPLACE(`link`,'joomailing','acymailing')");
		$this->db->query();
		$newFile = '<?php
					$app =& JFactory::getApplication();
					$url = \'index.php?option=com_acymailing\';
					foreach($_GET as $name => $value){
						if($name == \'option\') continue;
						$url .= \'&\'.$name.\'=\'.$value;
					}
					$app->redirect($url);
					';
		@file_put_contents(rtrim(JPATH_SITE,DS).DS.'components'.DS.'com_joomailing'.DS.'joomailing.php',$newFile);
		@file_put_contents(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_joomailing'.DS.'admin.joomailing.php',$newFile);
	}
	function addPref(){
		$conf	=& JFactory::getConfig();
		$this->level = ucfirst($this->level);
		$allPref = array();
		$allPref['level'] =  $this->level;
		$allPref['version'] = $this->version;
		$allPref['from_name'] = $conf->getValue('config.fromname');
		$allPref['from_email'] = $conf->getValue('config.mailfrom');
		$allPref['reply_name'] = $conf->getValue('config.fromname');
		$allPref['reply_email'] =  $conf->getValue('config.mailfrom');
		$allPref['bounce_email'] =  '';
		$allPref['add_names'] = '1';
		$allPref['mailer_method'] =  $conf->getValue('config.mailer');
		$allPref['encoding_format'] =  '8bit';
		$allPref['charset'] = 'UTF-8';
		$allPref['word_wrapping'] = '150';
		$allPref['hostname'] =  '';
		$allPref['embed_images'] = '0';
		$allPref['embed_files'] = '1';
		$allPref['multiple_part'] =  '1';
		$allPref['sendmail_path'] =  $conf->getValue('config.sendmail');
		$smtpinfos = explode(':',$conf->getValue('config.smtphost'));
		$allPref['smtp_host'] =  $smtpinfos[0];
		$allPref['smtp_port'] =  '';
		if(isset($smtpinfos[1])) $allPref['smtp_port'] = $smtpinfos[1];
		$allPref['smtp_secured'] = $conf->getValue('config.smtpsecure');
		if(!in_array($allPref['smtp_secured'],array('tls','ssl'))) $allPref['smtp_secured'] = '';
		$allPref['smtp_auth'] =  $conf->getValue('config.smtpauth');
		$allPref['smtp_username'] =  $conf->getValue('config.smtpuser');
		$allPref['smtp_password'] =  $conf->getValue('config.smtppass');
		$allPref['smtp_keepalive'] =  '1';
		$allPref['queue_nbmail'] =  '60';
		$allPref['queue_type'] = 'auto';
		$allPref['queue_delay'] =  '3600';
		$allPref['queue_try'] = '3';
		$allPref['allow_visitor'] = '1';
		$allPref['require_confirmation'] =  '0';
		$allPref['priority_newsletter'] =  '3';
		$allPref['allowedfiles'] = 'zip,doc,docx,pdf,xls,txt,gzip,rar,jpg,gif,xlsx,pps,csv,bmp,epg,ico,odg,odp,ods,odt,png,ppt,swf,xcf';
		$allPref['uploadfolder'] = 'components/com_acymailing/upload';
		$allPref['editor'] =  '0';
		$allPref['confirm_redirect'] = '';
		$allPref['subscription_message'] =  '1';
		$allPref['notification_unsuball'] = '';
		$allPref['cron_next'] = '1251990901';
		$allPref['confirmation_message'] =  '1';
		$allPref['welcome_message'] = '1';
		$allPref['unsub_message'] = '1';
		$allPref['cron_last'] =  '0';
		$allPref['cron_fromip'] = '';
		$allPref['cron_report'] = '';
		$allPref['cron_frequency'] = '300';
		$allPref['cron_sendreport'] =  '2';
		$allPref['cron_sendto'] =  $conf->getValue('config.mailfrom');
		$allPref['cron_fullreport'] =  '1';
		$allPref['cron_savereport'] =  '2';
		$allPref['cron_savefolder'] =  'administrator/components/com_acymailing/upload/report.log';
		$allPref['cron_savepath'] =  'administrator/components/com_acymailing/logs/report.log';
		$allPref['notification_created'] =  '';
		$allPref['notification_accept'] =  '';
		$allPref['notification_refuse'] = '';
		$allPref['forward'] =  '0';
		$descriptions = array('Joomla!<sup style="font-size:4px;">TM</sup> Newsletter Extension','Joomla!<sup style="font-size:4px;">TM</sup> Mailing Extension','Joomla!<sup style="font-size:4px;">TM</sup> Newsletter System','Joomla!<sup style="font-size:4px;">TM</sup> E-mail Marketing');
		$allPref['description_starter'] = $descriptions[rand(0,3)];
		$allPref['description_essential'] = $descriptions[rand(0,3)];
		$allPref['description_business'] = $descriptions[rand(0,3)];
		$allPref['description_enterprise'] = 'Joomla!<sup style="font-size:4px;">TM</sup> Marketing Campaign';
		$allPref['priority_followup'] =  '2';
		$allPref['unsub_redirect'] =  '';
		$allPref['show_footer'] = '1';
		$allPref['use_sef'] =  '0';
		$allPref['itemid'] =  '0';
		$allPref['css_module'] = 'default';
		$allPref['css_frontend'] = 'default';
		$allPref['css_backend'] = 'default';
		$allPref['installcomplete'] = '0';
		$allPref['bounce_email_bounce'] = 'delete';
		$allPref['bounce_regex_bounce'] = 'deliver|daemon|fail|system|return|impos';
		$allPref['bounce_action_bounce'] = 'unsub';
		$allPref['bounce_rules_bounce'] = 'Mailbox not accessible';
		$allPref['bounce_email_end'] = 'forward';
		$allPref['bounce_forward_end'] = $conf->getValue('config.mailfrom');
		$allPref['bounce_rules_end'] = 'Final Action';
		$allPref['Starter'] =  '0';
		$allPref['Essential'] =  '1';
		$allPref['Business'] =  '2';
		$allPref['Enterprise'] =  '3';
		$query = "INSERT IGNORE INTO `#__acymailing_config` (`namekey`,`value`) VALUES ";
		foreach($allPref as $namekey => $value){
			$query .= '('.$this->db->Quote($namekey).','.$this->db->Quote($value).'),';
		}
		$query = rtrim($query,',');
		$this->db->setQuery($query);
		$this->db->query();
	}
}