<?php

// no direct access
defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$position =  $params->get('position', 'user1');
$start_show = $params->get('start_show', 0);
$modulebase		= ''.JURI::base(true).'/modules/mod_tppromospace/';
require JModuleHelper::getLayoutPath('mod_tppromospace');

$doc =& JFactory::getDocument();

if( (int) $params->get('loadJquery', 1) ) {
	// Get from Google Google
	$doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
}

$doc->addStyleSheet($modulebase.'assets/style.css');
$doc->addScript($modulebase.'assets/jquery.cookie.js');
$doc->addScript($modulebase.'assets/script.js');
$jsinline = 'var start_show='.$start_show.';';
$doc->addScriptDeclaration($jsinline);