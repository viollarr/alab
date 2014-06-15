<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54


//if(defined('JPATH_ROOT')) define ('ACA_JPATH_ROOT' , JPATH_ROOT );
if ( !defined('ACA_CMSTYPE') ) {
	if ( defined('JPATH_ROOT') AND class_exists('JFactory') ) {	// joomla 15
		define( 'ACA_CMSTYPE', true );
	}//endif
}//endif


if ( ACA_CMSTYPE ) {	// joomla 15
	global $mainframe;

	define ('ACA_JPATH_ROOT_NO_ADMIN' , JPATH_ROOT );
	define( 'ACA_DEBUG', $mainframe->getCfg('debug') );

	$site_url = $mainframe->getCfg('live_site');
	if(empty($site_url)) $site_url = JURI::root();
	define( 'ACA_JPATH_LIVE', rtrim( $site_url, "/" ));

	define( 'ACA_SITE_NAME', $mainframe->getCfg('sitename') );
	define( 'ACA_TIME_OFFSET', $mainframe->getCfg('offset') );
	$lang= JFactory::getLanguage();
	define( 'ACA_CONFIG_LANG', $lang->_metadata['backwardlang'] );

}//endif

define( 'ACA_JPATH_LIVE_NO_HTTPS',str_replace('https:','http:',ACA_JPATH_LIVE));
define( 'ACA_OPTION', 'com_jnewsletter' );
//Make it absolute (needed inside Newsletters)
$urls = parse_url(ACA_JPATH_LIVE_NO_HTTPS);
if(!empty($urls['path'])){
	define('ACA_COMPLETE_URL',substr(ACA_JPATH_LIVE_NO_HTTPS,0,strrpos(ACA_JPATH_LIVE_NO_HTTPS,$urls['path'])).'/');
	//define('ACA_COMPLETE_URL',str_replace($urls['path'],'',ACA_JPATH_LIVE_NO_HTTPS).'/');
	define('ACA_URL_MORE',trim(str_replace(ACA_COMPLETE_URL,'',ACA_JPATH_LIVE_NO_HTTPS),'/').'/');
}else{
	define('ACA_COMPLETE_URL',ACA_JPATH_LIVE_NO_HTTPS.'/');
	define('ACA_URL_MORE',false);
}
define('ACA', 'aca_');
if (!defined('DS'))  define( 'DS', DIRECTORY_SEPARATOR );
define( 'WPATH_ADMIN' , ACA_JPATH_ROOT_NO_ADMIN . DS . 'administrator' . DS . 'components' . DS . ACA_OPTION . DS );
define( 'WPATH_SITE', ACA_JPATH_ROOT_NO_ADMIN . DS . 'administrator' . DS . 'components' . DS . ACA_OPTION . DS );
define( 'WPATH_FRONT' , ACA_JPATH_ROOT_NO_ADMIN . DS . 'components' . DS . ACA_OPTION . DS );
define( 'WPATH_CLASS', WPATH_ADMIN  . 'classes' .DS );
define( 'WPATH_SITE_VIEW', WPATH_SITE  . 'views' .DS );
define( 'WPATH_FRONT_VIEW', WPATH_FRONT  . 'views' .DS );
define( 'WPATH_FRONT_CLASS', WPATH_FRONT  . 'classes' .DS );
define( 'WPATH_ADMIN_VIEW', WPATH_ADMIN  . 'views' .DS );
define( 'WPATH_ADMIN_CONTROLLER', WPATH_ADMIN  . 'controllers' .DS );
define( 'WPATH_CLASS_SITE', WPATH_SITE  . 'classes' .DS );
define( 'WJ_ADMIN_IMG', ACA_JPATH_LIVE .DS . 'administrator' . DS .'images'. DS );
define( 'WCOMP_AIMG', ACA_JPATH_LIVE .DS . 'administrator' . DS . 'components' . DS . ACA_OPTION . DS .'images'. DS );
define( 'ACA_PATH_LANG', ACA_JPATH_ROOT_NO_ADMIN . DS . 'administrator' . DS . 'components'. DS . ACA_OPTION . DS. 'language' .DS );
define('WPATH_FRONT_TEMPLATES', WPATH_FRONT  . 'templates' .DS);
if (!defined('_MOS_NOTRIM')) define( '_MOS_NOTRIM', 0x0001 );
if (!defined('_MOS_ALLOWHTML')) define( '_MOS_ALLOWHTML', 0x0002 );
if (!defined('_MOS_ALLOWRAW')) define( '_MOS_ALLOWRAW', 0x0004 );
if(!defined('_BUTTON_LOGIN') and defined('BUTTON_LOGIN')) define('_BUTTON_LOGIN',BUTTON_LOGIN);

if ($mainframe->isAdmin()){
	define( 'ACA_PATH_ADMIN', JURI::base().'components' .DS. 'com_jnewsletter' .DS );
}else{
	define( 'ACA_PATH_ADMIN', JURI::base().'administrator'.DS.'components' .DS. 'com_jnewsletter' .DS );
}
define( 'ACA_PATH_ADMIN_IMAGES', ACA_PATH_ADMIN.'images'.DS );
define( 'ACA_PATH_ADMIN_INCLUDES', ACA_PATH_ADMIN.'includes'.DS );
define( 'ACA_PATH_ADMIN_THUMBNAIL_SHOW', ACA_PATH_ADMIN .DS. 'templates' .DS. 'thumbnail' .DS );
define( 'ACA_PATH_ADMIN_THUMBNAIL_UPLOAD', WPATH_ADMIN. 'templates' .DS. 'thumbnail' );
