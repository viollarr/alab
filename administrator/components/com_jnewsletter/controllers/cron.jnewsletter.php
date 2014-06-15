<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

$content = '';
$base = ACA_JPATH_LIVE;//JURI::root();//ACA_JPATH_LIVE_NO_HTTPS;//.'/index.php?option=com_jnewsletter';
$password=$GLOBALS[ACA.'url_pass'];

//echo $password.'<br>';

$site= urlencode(base64_encode(serialize($base)));

//$content .= '<img src="http://www.ijoobi.com/index.php?option=com_jscheduler&controller=jurlauncher.cron&task=save' .
//	'&site=\''.$site.'\'&password=\''.$password.'\'" border="0"&width="1"&height="1" />';

$content .= '<img src="http://www.ijoobi.com/index.php?option=com_jscheduler&controller=jurlauncher.cron&task=save' .
	'&site='.$site.'&password='.$password.'&border="0"&width="1"&height="1"" />';

echo $content;
