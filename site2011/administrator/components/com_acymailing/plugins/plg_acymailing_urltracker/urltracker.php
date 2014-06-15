<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingUrltracker extends JPlugin
{
	function plgAcymailingUrltracker(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'urltracker');
			$this->params = new JParameter( $plugin->params );
		}
	}
	function acymailing_replaceusertagspreview(&$email,&$user){
		return $this->acymailing_replaceusertags($email,$user);
	}
	function acymailing_replaceusertags(&$email,&$user){
		if(!$email->sendHTML OR empty($user->subid)) return;
		$urlClass = acymailing::get('class.url');
		if($urlClass === null) return;
		$urls = array();
		if(!preg_match_all('#href[ ]*=[ ]*"(?!mailto:|\#)([^"]+)"#Ui',$email->body,$results)) return;
		foreach($results[1] as $i => $url){
			if(isset($urls[$results[0][$i]]) OR strpos($url,'subid')) continue;
			$urls[$results[0][$i]] = str_replace($url,$urlClass->getUrl($url,$email->mailid,$user->subid),$results[0][$i]);
		}
		$email->body = str_replace(array_keys($urls),$urls,$email->body);
	}//endfct
}//endclass