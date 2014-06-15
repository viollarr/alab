<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class ModuleloaderController extends JController{
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerDefaultTask('load');
	}
	function load(){
		$timeVar = JRequest::getInt('time');
		$time = time();
		if($time < $timeVar OR $time > $timeVar +3) exit;
		$moduleId = (int) JRequest::getInt('id');
		if(empty($moduleId)){
			echo 'OK! TEST VALID';
			exit;
		}
		$db =& JFactory::getDBO();
	 	$db->setQuery('SELECT * FROM #__modules WHERE id = '.$moduleId.' LIMIT 1');
	 	$module = $db->loadObject();
	 	if(empty($module)) exit;
		$module->user  	= substr( $module->module, 0, 4 ) == 'mod_' ?  0 : 1;
		$module->name = $module->user ? $module->title : substr( $module->module, 4 );
		$module->style = null;
		$module->module = preg_replace('/[^A-Z0-9_\.-]/i', '', $module->module);
		$params = array();
		echo JModuleHelper::renderModule($module, $params);
		exit;
	}
	function test(){
		@ini_set('default_socket_timeout',10);
		@ini_set('user_agent', 'My-Application/2.5');
		@ini_set('allow_url_fopen', '1');
		$config =& acymailing::config();
		$itemid = $config->get('itemid');
		$item = empty($itemid) ? '' : '&Itemid='.$itemid;
		$loc = ACYMAILING_LIVE.'index.php?option=com_acymailing&tmpl=component&gtask=moduleloader&time='.time().$item;
		$content = file_get_contents($loc);
		if($content){
			acymailing::display($content,'success');
		}else{
			acymailing::display('Error. Please make sure the function file_get_contents is enabled on your website','error');
			if(function_exists('curl_init')){
				acymailing::display('The cURL function is apparently enabled on your server so you should select the cURL option','success');
			}
		}
	}
}