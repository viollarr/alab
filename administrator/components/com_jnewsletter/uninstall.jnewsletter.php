<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

//Uninstall jNews component
function com_uninstall() {

	if ( defined('JPATH_ROOT') ) {	// joomla 15
		define ('ACA_JPATH_ROOT' , JPATH_ROOT );
	}//endif

	require_once( ACA_JPATH_ROOT . '/components/com_jnewsletter/defines.php');

	 $return = removeBots();
	 $return = removeModule() AND $return ;
	 return $return;
 }//endfct

//Uninstall plugins
 function removeBots() {

	if(ACA_CMSTYPE) {
		$database =& JFactory::getDBO();
		$pathBots = ACA_JPATH_ROOT . DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'jnewsletter'.DIRECTORY_SEPARATOR;
	}

	 $bot_files = array('jnewsletterbot.php', 'jnewsletterbot.xml', 'index.html', 'module.php', 'module.xml');
	 foreach ($bot_files as $bot_file) {
		 if (!unlink($pathBots . $bot_file)) {
			 echo '<p><b>Error (uninstall.jnewsletter.php-> line ' . __LINE__ . '):</b> Error deleting bot file ' . $bot_file . ' from bot directory.</p>';
		 }
	 }
	 if(file_exists(trim($pathBots,DIRECTORY_SEPARATOR))){
		 if (!rmdir(trim($pathBots,DIRECTORY_SEPARATOR))) {
			 echo '<br /> Error deleting the mambot jnewsletter directory.';
		 }
	 }

	if(ACA_CMSTYPE) {
		$database =& JFactory::getDBO();
		$pathBots = ACA_JPATH_ROOT . DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR;
	}

	 $bot_files = array( 'acasyncuser.php', 'acasyncuser.xml');
	 foreach ($bot_files as $bot_file) {
		 if (!unlink($pathBots . $bot_file)) {
			 echo '<p><b>Error (uninstall.jnewsletter.php-> line ' . __LINE__ . '):</b> Error deleting bot file ' . $bot_file . ' from bot directory.</p>';
		 }
	 }

	$erro->err = "";
	 $bot_infos = array('jnewsletterbot','module','acasyncuser');
	 foreach ($bot_infos as $bot_info) {
	 	if(ACA_CMSTYPE){
			$query = 'DELETE FROM `#__plugins` WHERE element = \'' . $bot_info . '\'';
	 	}
		 $database->setQuery($query);
		 $database->query();
		 $erro->err .= $database->getErrorMsg();
	 }

	 return true;
 }//endfct

//Uninstall Module
 function removeModule() {

	if ( ACA_CMSTYPE ) {
		$database =& JFactory::getDBO();
	}//endif

	$query = "UPDATE `#__modules` SET `published`= 0 WHERE `module` LIKE '%jnewsletter%' " ;
	 $database->setQuery($query);
	 $database->query();
 }//endfct

//Remove Folders during Uninstall process
 function removeFolder($fichier) {
	if (file_exists($fichier)){
		chmod($fichier,0777);
		if (is_dir($fichier)){
			$id_dossier = opendir($fichier);
			while($element = readdir($id_dossier)){
				if ($element != "." && $element != "..")
					unlink($fichier.DIRECTORY_SEPARATOR.$element);
			}
			closedir($id_dossier);
			return rmdir($fichier);
		}
	}
	return false;
}//endfct