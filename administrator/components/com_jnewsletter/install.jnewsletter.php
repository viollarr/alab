<?php
 defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 function com_install() {

 	 	@ini_set('max_execution_time',0);
	 	@ini_set('memory_limit','128M');

	if ( defined('JPATH_ROOT') AND class_exists('JFactory')) {
		define ('ACA_JPATH_ROOT' , JPATH_ROOT );
	}//endif

	require_once( ACA_JPATH_ROOT . '/components/com_jnewsletter/defines.php');
	require_once( WPATH_ADMIN . 'controllers/config.jnewsletter.php');
	require_once( WPATH_ADMIN . 'admin.jnewsletter.html.php' );
 	require_once( WPATH_CLASS . 'class.jnewsletter.php');
 	require_once( WPATH_ADMIN . 'controllers/cron.jnewsletter.php');
	$update = new wupdate();
	$xf = new xonfig();
	$return = '';

	if ( ACA_CMSTYPE ) {
		$database =& JFactory::getDBO();
	}//endif

	if (!is_writable(ACA_JPATH_ROOT_NO_ADMIN . $jnewsletterConfigFile['upload_url'])){
		@chmod(ACA_JPATH_ROOT_NO_ADMIN . $jnewsletterConfigFile['upload_url'], 0777);
	}

	  //jNews Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/jnewsletter_icon.png'
	  WHERE admin_menu_link='option=com_jnewsletter'";

	  //List Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/lists.png',
	  name='"._ACA_MENU_LIST."',
	  admin_menu_alt='"._ACA_MENU_LIST."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=list&pg=20'";

	  //Subscriber Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/subscribers.png' ,
	  name='"._ACA_MENU_SUBSCRIBERS."',
	  admin_menu_alt='"._ACA_MENU_SUBSCRIBERS."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=subscribers&pg=20'";

	  //Newsletter Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/newsletter.png' ,
	  name='"._ACA_MENU_NEWSLETTERS."',
	  admin_menu_alt='"._ACA_MENU_NEWSLETTERS."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=mailing&listype=1&pg=20'";

	  //Autoresponder Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/autoresponder.png' ,
	  name='"._ACA_MENU_AUTOS."',
	  admin_menu_alt='"._ACA_MENU_AUTOS."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=mailing&listype=2&pg=20'";

	   //Smart-Newsletter Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/smart_newsletter.png',
	   name='"._ACA_MENU_AUTONEWS."',
	   admin_menu_alt='"._ACA_MENU_AUTONEWS."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=mailing&listype=7&pg=20'";

	  //Statistics Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/statistics.png' ,
	   name='"._ACA_MENU_STATS."',
	   admin_menu_alt='"._ACA_MENU_STATS."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=statistics'";

	   //Queue Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/queue.png',
	   name='"._ACA_MENU_QUEUE."',
	   admin_menu_alt='"._ACA_MENU_QUEUE."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=queue&pg=20'";

	  //Template Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/templates.png',
	  	name='"._ACA_MENU_TEMPLATES."',
	   	admin_menu_alt='"._ACA_MENU_TEMPLATES."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=templates&pg=20'";

	  //Configuration Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/configuration.png' ,
	   name='"._ACA_MENU_CONF."',
	   admin_menu_alt='"._ACA_MENU_CONF."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=configuration'";

	  //Import Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/import.png' ,
	  name='"._ACA_MENU_UPDATE."',
	  admin_menu_alt='"._ACA_MENU_UPDATE."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=update'";

	  //About Menu
	  $query[] = "UPDATE #__components
	  SET admin_menu_img='../administrator/components/com_jnewsletter/images/16/about.png' ,
	  name='"._ACA_MENU_ABOUT."',
	  admin_menu_alt='"._ACA_MENU_ABOUT."'
	  WHERE admin_menu_link='option=com_jnewsletter&act=about'";

   	$version=jnewsletter::getVersion();
     if (empty($err) AND !empty($version) AND $version >= '1.2.0' AND $version <= '2.2.2') {
		$query[] = 'ALTER TABLE `#__jnews_lists` ADD `notifyadminmsg` text NOT NULL';
		$xf->insert('j_cron', '1', 0);
	 }

	$q = " SELECT `text` FROM `#__jnews_xonfig` WHERE `akey` = 'version' ";
	$database->setQuery($q);
	$vers = $database->loadResult();
	$err = $database->getErrorMsg();

	//Query to quickly synchronise all your subscribers during the install!
	$query[] = "INSERT IGNORE INTO `#__jnews_subscribers` ( `user_id` , `name` , `email` , `receive_html` , `confirmed` , `blacklist` , `subscribe_date` )" .
			"SELECT U.id, U.name, U.email, '1', '1', U.block , UNIX_TIMESTAMP(U.registerDate) from `#__users` as U;";

	if ( !defined('WADMIN') ) define('WADMIN', 'administrator' .DS . 'components' . DS . 'com_jnewsletter' . DS );
	if ( !defined('WFRONT') ) define('WFRONT', 'components' . DS . 'com_jnewsletter' . DS );
	$file[] = 'templates';
	$file[] = 'templates/default';
	$file[] = 'templates/index.html';
	$file[] = 'templates/default/default.html';
	$file[] = 'templates/default/tpl0_abovefooter.jpg';
	$file[] = 'templates/default/tpl0_powered_by.gif';
	$file[] = 'templates/default/tpl0_spacer.gif';
	$file[] = 'templates/default/tpl0_top_header.jpg';
	$file[] = 'templates/default/tpl0_underban.jpg';
	$file[] = 'templates/default/index.html';

	foreach( $file as $key5 => $ins ) {
		if ( !file_exists( ACA_JPATH_ROOT .DS.WFRONT.$ins) && file_exists( ACA_JPATH_ROOT .DS.WADMIN.$ins) )
		 @rename( ACA_JPATH_ROOT.DS.WADMIN.$ins, ACA_JPATH_ROOT.DS.WFRONT.$ins );
	}

	// if the user uses acajoom component then update their license to jnews
	if( wupdate::checkAcajoom() )
	{
		wupdate::moveAcaLicense();
	} //endif

	//Insert Default Template to Template Table
	$querytemplate= "SELECT * FROM #__jnews_templates";
	$database->setQuery($querytemplate);
	$result= $database->loadObject();

	$color_bg = array('#4c4c4c','#08395a','#FFFFFF','#054669','#003300');
	$aca_online = array('color:#FFFFFF', 'color:#FFFFFF', 'color:#0000ff', 'color:#FFFFFF', 'color:#FFFFFF');

	$namekey = array('Black Theme', 'Blue Theme', 'jNews Default Template', 'Elegant Navy Theme', 'Green Theme');
	$thumbnail = array('black.jpg', 'blue.jpg', '', 'elegantnavy.png', 'green.jpg');
	$premium = array(0,0,1,0,0);
	$template = null;

		$index=0;
		$scanfiles=scandir(WPATH_FRONT_TEMPLATES.'default');
		foreach ($scanfiles as $scanfile){
			$fileInfo= pathinfo(WPATH_FRONT_TEMPLATES.'default/'.$scanfile, PATHINFO_EXTENSION);
			if ($fileInfo == 'html') {
				if(stripos($scanfile, 'index') === false ) {
					$filescanned=$scanfile;
					if(empty($result)){
						$generatedfile[$index] =file_get_contents(WPATH_FRONT_TEMPLATES.'default/'.$filescanned);
					}else{
						if(!in_array($result->namekey,$namekey)){
							$generatedfile[$index] =file_get_contents(WPATH_FRONT_TEMPLATES.'default/'.$filescanned);
						}else{
							$fileDetail= pathinfo(WPATH_FRONT_TEMPLATES.'default/'.$filescanned, PATHINFO_BASENAME);
							if($fileDetail != 'default.html'){
								$generatedfile[] =file_get_contents(WPATH_FRONT_TEMPLATES.'default/'.$fileDetail);

							}
						}

				   }

			   }
			$index++;
		   }

		}

	//for upgrade purposes
	if(!empty($result) && in_array($result->namekey,$namekey) ){
		unset($namekey);
		unset($premium);
		unset($color_bg);
		unset($thumbnail);
		unset($aca_online);
		$namekey = array('Black Theme','Blue Theme','Elegant Navy Theme','Green Theme');
		$thumbnail = array('black.png', 'blue.png', 'elegantnavy.png', 'green.png');
		$premium = array(0,0,0,0);
		$color_bg = array('#4c4c4c','#08395a','#054669','#003300');
		$aca_online = array('color:#FFFFFF', 'color:#FFFFFF', 'color:#FFFFFF', 'color:#FFFFFF');
	}


	if(!empty($generatedfile)){
		$index=0;
		foreach($generatedfile as $file){
			if(!empty($file)){
				$template->name=$namekey[$index];
				$template->description=$namekey[$index];
				$template->body = $file;
				$template->altbody = '';
				$template->created = jnewsletter::getNow();
				$template->premium = $premium[$index];
				$template->namekey = $namekey[$index];
				$template->published = 1;
				$template->styles = serialize(array('color_bg' => $color_bg[$index],'aca_online' => $aca_online[$index] ));

				$template->thumbnail= $thumbnail[$index];

				$query[] = "INSERT INTO `#__jnews_templates` (`name`,`description` , `body` , `altbody`, `created`, `premium` ," .
					 " `namekey` , `published` , `styles`, `thumbnail` ) " .
						"\n VALUES ( '".addslashes($template->name)."', '".addslashes($template->description)."', ".
						"'".addslashes($template->body)."', ".
						"'".addslashes($template->altbody)."', ".
						"'".$template->created."', ".
						"'".$template->premium."', ".
						"'".addslashes($template->namekey)."', ".
						"'".$template->published."', ".
						"'".addslashes($template->styles)."', ".
						"'".$template->thumbnail."' )";
				$index++;

			}
		}
	}

	$size = sizeof($query);
	for ($index = 0; $index < $size; $index++) {
		$database->setQuery($query[$index]);
		$database->query();
	}


	if (empty($vers)) {
		$xf->filetoDatabase($jnewsletterConfigFile);
	}

	$return .= setupMaiOptions($jnewsletterConfigFile);
	$return .= installBots();
	$return .= installModule();

	if (jnewsletter::checkCB()) $return .= installPlugin();
	subscribers::updateSubscribers( true, true );
	require_once( WPATH_ADMIN . 'version.php' );
	$xf->update('component',$localVersion['component'] );
	$xf->update('type',$localVersion['type'] );
	$xf->update('version',$localVersion['version'] );
	$xf->update('level',$localVersion['level'] );

	if ( !($jnewsletterConfigFile['type'] =='GPL' OR $jnewsletterConfigFile['type'] =='CORE') ) {
		$message = jnewsletter::printM('noimage' , _ACA_THANKYOU);
	}
	 backHTML::_header( _ACA_MENU_INSTALL , 'install.png' , $message , '', '' );

	$link = 'index2.php?option=com_jnewsletter&act=start';
	$docuLink = 'http://www.ijoobi.com/index.php?option=com_content&view=article&id=7871:installation-errors&catid=29:jnewsletter&Itemid=72';
	$html .='&nbsp;'. _ACA_INSTALL_ERRORN.' <a href="'.$docuLink.'">'._ACA_INSTALL_DOC.'</a>';

	// if acajoom component exist... means this would be an update
	// display an update button
	if( wupdate::checkAcajoom() )
	{
		//check if acajoom datas are already transferred to jnews tables
		if( !wupdate::checkAcaUpdate() )
		{
			$html .= '<div style="border: 5px groove #F0F8FF; padding: 10px; position: fixed; right: 1px; top: 150px; background-color: #F0F8FF;">';
			$html .= '<img border="0" align="right" alt="jNews Logo" src="components/com_jnewsletter/images/jnewsletter.png" width="25">';
			$html .= '<br><br><span style="font-size:15px;text-decoration:none;">'. _ACA_INSTALL_ACAUPDATEMSG .'</span></b>';
			$html .= '<a href="index2.php?option=com_jnewsletter&amp;act=acaupdate">';
			$html .= '<div style="background-image: url('.ACA_PATH_ADMIN_IMAGES.'btn_orange.png); background-repeat:no-repeat; height: 15px; width: 170px; border:none; padding:13px 40px 15px; position:relative; left:50px; top:10px;">';
			$html .= '<span style="color: #FFF; font-weight: bold; padding-right:30px; margin-top: 5px; text-decoration: none;"> '. _ACA_INSTALL_ACAUPDATEBTN .' </span>';
			$html .= '</div></a>';

			$html .= '<br><br>';
			$html .= '<b>'. _ACA_INSTALL_ACAUPDATENOTE .'</b>';
			$html .= '<br><br>';
			$html .= '</div>';
		} //endif
	} //endif

	$html .= '<div style="float:center;padding: 20px; width:470px; margin-right: 10px;"><center>' .
				'<a href="index2.php?option=com_jnewsletter&amp;act=start">
				<div style="background-image: url('.ACA_PATH_ADMIN_IMAGES.'btn_orange.png); background-repeat:no-repeat; height: 40px; width: 232px; border:none; padding:12px 0 15px 0;">
				<span style="color: #FFF; font-weight: bold; padding-right:30px; margin-top: 5px; text-decoration: none;">'._ACA_INSTALL_CLICKSTART.'</span></div>
				</a></center></div><div style="clear:both;"></div>';
	if ( $jnewsletterConfigFile['type'] =='PRO' ) {
		backHTML::about();
		echo '<center>'.$html;
		echo $return.'</center>';
	} elseif ( $jnewsletterConfigFile['type'] =='PLUS' ) {
		 backHTML::installPRO($html,$return);
	} else{
		 backHTML::installPlus($html, $return);
	}

	return $return;
 }

 //Install jNews Setup
 function setupMaiOptions($jnewsletterConfigFile) {

		$xf = new xonfig();
		$return =  '<br />' ._ACA_INSTALL_CONFIG .' : ';
		$config = array();
		$exist = jnewsletter::checkExisting();
		if ($exist['news1']==0) $config['news1'] = '0';
		if ($exist['news2']==0) $config['news2'] = '0';
		if ($exist['news3']==0) $config['news3'] = '0';


		if ( ACA_CMSTYPE ) {	// joomla 15
			$conf	=& JFactory::getConfig();
			$config['emailmethod'] = $conf->getValue('config.mailer');
			$config['sendmail_path'] = $conf->getValue('config.sendmail');
			$config['sendmail_from'] = $conf->getValue('config.mailfrom');
			$config['sendmail_name'] = $conf->getValue('config.fromname');
			$config['smtp_host'] = $conf->getValue('config.smtphost');
			$config['smtp_auth_required'] = $conf->getValue('config.smtpauth');
			$config['smtp_username'] = $conf->getValue('config.smtpuser');
			$config['smtp_password'] = $conf->getValue('config.smtppass');
			$config['confirm_fromname'] = $conf->getValue('config.fromname');
			$config['confirm_fromemail'] = $conf->getValue('config.mailfrom');
			$config['confirm_return'] = $conf->getValue('config.mailfrom');
			$config['max_queue'] = $conf->getValue('max_queue');
			$config['max_attempts'] = $conf->getValue('max_attempts');
		}//endif


		$config['date_update'] = jnewsletter::getNow();

		for ($index = 0; $index < $jnewsletterConfigFile['nblist'] ; $index++) {
			$xf->insert('listname'.$index , '', 0);
			$xf->insert('listnames'.$index , '', 0);
			$xf->insert('listype'.$index , '', 0);
			$xf->insert('listshow'.$index , '', 0);
			$xf->insert('classes'.$index , '', 0);
			$xf->insert('listlogo'.$index , '', 0);
			$xf->insert('totallist'.$index , '', 0);
			$xf->insert('act_totallist'.$index , '', 0);
			$xf->insert('totalmailing'.$index , '', 0);
			$xf->insert('totalmailingsent'.$index , '', 0);
			$xf->insert('act_totalmailing'.$index , '', 0);
			$xf->insert('totalsubcribers'.$index , '', 0);
			$xf->insert('act_totalsubcribers'.$index , '', 0);
		}

		$activeList = '1,2,7';
		$activeMailing='1,2,7'; //for mailing_type
		$config['classes1'] ='newsletter';
		$config['classes2'] ='autoresponder';
		$config['classes7'] ='autonews';

		$xf->insert('activelist' ,$activeList, 0, true);
		$xf->insert('activemailing', $activeMailing,0,true); //for mailing_type
		$xf->insert('option' ,'com_sdonkey', 0, true);

		$config['listype0'] = '1';
		$config['listname0'] = '';
		$config['listnames0'] = _ACA_MAILING_ALL;
		$config['listshow0'] = '1';
		$config['listlogo0'] = 'subscribers.png';
		$config['classes0'] ='';

		$config['listype1'] = '1';
		$config['listname1'] = '_ACA_NEWSLETTER';
		$config['listnames1'] = '_ACA_MENU_NEWSLETTERS';
		$config['listshow1'] = '1';
		$config['listlogo1'] = 'newsletter.png';

		$nb = explode(',', $activeList);
		$size = sizeof($nb);
		for($k = 0; $k < $size; $k ++) {
			$index = $nb[$k];
			if (class_exists($config['classes'.$index])) {
				$classConfig = new $config['classes'.$index];
				$config = array_merge($config, $classConfig->getActive());
			}
		}
		wupdate::queue2();
		if ($xf->saveConfig($config)) $return .= jnewsletter::printM('green' , _ACA_INSTALL_SUCCESS).'<br />'; else $return .='Configuration file not updated.<br />';
	 return $return;
 }

//Install Bots Plugin
 function installBots() {
		return 	installBots15();
 }

//Install jNews Subscriber Module
 function installModule() {

	$error = '';
	if ( ACA_CMSTYPE ) {
		$database =& JFactory::getDBO();
		$folder =  'modules'.DS.'mod_jnewsletter'.DS;
	//create the module Folder...
			if(!is_dir(ACA_JPATH_ROOT.DS. $folder)){
				if(!@mkdir (ACA_JPATH_ROOT.DS. $folder,0755)){
					$error .= 'Error creating folder : '.ACA_JPATH_ROOT.DS . $folder;
				}else{
					@chmod(ACA_JPATH_ROOT.DS. $folder, 0755);
				}
			}
	}//endif

	 $return = '<b>'._ACA_INSTALL_MODULE.'</b> : ';

	 $module_files = array('mod_jnewsletter.php', 'mod_jnewsletter.xml');
	 foreach ($module_files as $module_file) {

		 if (is_file(ACA_JPATH_ROOT . DS . $folder . $module_file)) {
			 @unlink( ACA_JPATH_ROOT . DS . $folder . $module_file );
		 }//endif

		if (!@rename( WPATH_ADMIN .'modules'.DS . $module_file, ACA_JPATH_ROOT .DS. $folder . $module_file)) {

			 $error .= '<br /> Error copying module file ' . $module_file . ' to module directory .';
			 $error .= '<br/>From '.WPATH_ADMIN . 'modules'.DS . $module_file.' To '. ACA_JPATH_ROOT . DS.$folder . $module_file;
		 }
	 }

	 if (!@unlink( WPATH_ADMIN . 'modules'.DS.'index.html')) {
	 	$error.= '<br /> Error deleting : '.WPATH_ADMIN . 'modules'.DS.'index.html';
	 }
	 elseif (!@rmdir( WPATH_ADMIN .'modules'.DS)) {
		 $error .= '<br /> Error deleting the temporary modules directory : '.WPATH_ADMIN .'modules'.DS;
	 }

	 $module_infos = array( array('jNews Subscriber Module', 'mod_jnewsletter', 'left'));
	 foreach ($module_infos as $module_info) {
		 $query = 'SELECT id FROM `#__modules` WHERE module = \'' . $module_info[1] . '\'';
		 $database->setQuery($query);
		 $database->query();
		 $sqlerror = $database->getErrorMsg();
		 if (!empty($sqlerror)) {
			 $error .= '<br />Error getting module information from module table for "' . $module_info[0] . '". Database error: <br />' . $sqlerror;
		 } else {
			 $id = $database->loadResult();
			 if (!$id) {

				if ( ACA_CMSTYPE ) {
					JLoader::register('JTableModule'   , JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'table'.DS.'module.php');
					 $row = new JTableModule($database);
				}//endif

				 $row->title = $module_info[0];
				 $row->ordering = 99;
				 $row->iscore = 0;
				 $row->client_id = 0;
				 $row->showtitle = 1;
				 $row->position = $module_info[2];
				 $row->access = 0;
				 $row->module = $module_info[1];
				 $row->published = 0;
				 if (!$row->store()) {
					$error .= '<br />Error adding module information to module table for "' . $module_info[0] . '".';
				 }
			 }
		 }
	 }
	 if (empty($error)) $return .= jnewsletter::printM('green' , _ACA_INSTALL_SUCCESS) .'<br />';
	 else $return .= $error.jnewsletter::printM('red' , _ACA_INSTALL_ERROR) .'<br />';

	 return $return;
 }


 function installPlugin() {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

	 $return = '<b>'._ACA_INSTALL_PLUGIN.'</b> : ';

	$error = '';

	 $files = array('jnewsletter_cb.php', 'jnewsletter_cb.xml' , 'index.html');
	 if (!is_file(ACA_JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin/jnewsletter_cb.php')) {
	 	@mkdir(ACA_JPATH_ROOT .'/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin', 0755);
	 	@chmod(ACA_JPATH_ROOT .'/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin', 0755);
	 }
	 foreach ($files as $file) {

		 if (is_file(ACA_JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin/' . $file)) {

			 @unlink( WPATH_ADMIN . 'cbplugin/' . $file);
		 } else if (!@rename( WPATH_ADMIN . 'cbplugin/' . $file, ACA_JPATH_ROOT .'/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin/' . $file)) {

			 $error .= '<br /> Error copying plugin file ' . $file . ' to CB plugin directory.';
		 }
	 }
	 if (is_file(ACA_JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin/jnewsletter_cb.php')) {
	 	@chmod(ACA_JPATH_ROOT .'/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin', 0755);
	 }
	 if (!@rmdir( WPATH_ADMIN . 'cbplugin/')) {
		 $error .= '<br /> Error deleting the temporary cbplugin directory.';
	 }

	 $query = "SELECT `id` FROM `#__comprofiler_plugin` WHERE `folder` = 'plug_jnewslettercbplugin' " ;
	 $database->setQuery($query);
	 $database->query();
	 $id = $database->loadResult();
	 $mysqlerror = $database->getErrorMsg();
	 if (!empty($mysqlerror)) {
		 $error .= '<br />Error getting plugin information from cb plugin table. Database error: <br />' . $mysqlerror . '';
	 } else {
		 if ($id<1) {
			 $row->name = 'jNews CB Plugin';
			 $row->element = 'jnewsletter_cb';
			 $row->type = 'user';
			 $row->folder = 'plug_jnewslettercbplugin';
			 $row->ordering = '99';
			$query = "INSERT INTO `#__comprofiler_plugin` (`name` , `element`, `type`, `ordering`, `folder`) VALUES ( ".
				"'$row->name', ".
				"'$row->element', ".
				"'$row->type', ".
				"'$row->ordering', ".
				" '$row->folder' ) ";
			$database->setQuery($query);
			$database->query();
			$error .= $database->getErrorMsg();
			 if (!empty($error)) {
				$error .= '<br />Error adding plug information to CB plug table.';
			 }
			 $query = "SELECT `id` FROM `#__comprofiler_plugin` WHERE `folder` = 'plug_jnewslettercbplugin' " ;
			 $database->setQuery($query);
			 $database->query();
			 $id = $database->loadResult();
			 $error .= $database->getErrorMsg();
			 $row = '';
			 $row->title = 'Mailing Lists';
			 $row->description = 'Listing of all the mailing lists for jNews';
			 $row->ordering = '99';
			 $row->width = '.5';
			 $row->enabled = '0';
			 $row->pluginclass = 'getjNewsTab';
			 $row->pluginid = $id;
			 $row->sys = '0';
			 $row->params = 'NULL';
			 $row->displaytype = 'tab';
			 $row->position = 'cb_tabmain';
			$query = "INSERT INTO `#__comprofiler_tabs` (`title` , `description`, `ordering`, `width`, `enabled`, " .
					" `pluginclass` , `pluginid`, `sys`, `displaytype`, `params` , `position` ) VALUES ( ".
				"'$row->title', ".
				"'$row->description', ".
				"'$row->ordering', ".
				"'$row->width', ".
				"'$row->enabled', ".
				"'$row->pluginclass', ".
				"'$row->pluginid', ".
				"'$row->sys', ".
				"'$row->displaytype', ".
				"'$row->params', ".
				"'$row->position' ) ";
			$database->setQuery($query);
			$database->query();
			 $error .= $database->getErrorMsg();
			 if (!empty($error)) {
				$error .= '<br />Error adding plug information to CB tab table.';
			 }
		 }
	 }
	 if (empty($error)) {
		$xf = new xonfig();
	 	$xf->update('cb_pluginInstalled', '1');
	 	$return .= jnewsletter::printM('green' , _ACA_INSTALL_SUCCESS) .'<br />';
	 } else {
	 	$return .= $error.jnewsletter::printM('red' , _ACA_INSTALL_ERROR) .'<br />';
	 }
	 return $return;
 }

 function installBots15() {

	$database =& JFactory::getDBO();

	$error = '';
	 $return = '<b>'._ACA_INSTALL_BOT.'</b> : ';

	 if(!is_dir(ACA_JPATH_ROOT . '/plugins/jnewsletter')){
		 if(!@mkdir(ACA_JPATH_ROOT . '/plugins/jnewsletter', 0755)) {
			 $return .= '<br /> Error adding bot directory.';
		 }else{
		 	@chmod(ACA_JPATH_ROOT . '/plugins/jnewsletter', 0755);
		 }
	 }

	 $bot_files = array('jnewsletterbot.php', 'jnewsletterbot.xml', 'index.html', 'module.php', 'module.xml');
	 foreach ($bot_files as $bot_file) {
		 if (is_file(ACA_JPATH_ROOT . '/plugins/jnewsletter/' . $bot_file)) {

			 @unlink( WPATH_ADMIN . 'bots15/' . $bot_file);
		 } else if (!@rename( WPATH_ADMIN . 'bots15/' . $bot_file, ACA_JPATH_ROOT . '/plugins/jnewsletter/' . $bot_file)) {

			 $error .= '<br />Error copying bot file ' . $bot_file . ' to bot directory.';
		 }
	 }
	 @chmod(ACA_JPATH_ROOT . '/plugins/jnewsletter', 0755);
	 if (!@rmdir( WPATH_ADMIN . 'bots15/')) {
		 $error .= '<br /> Error deleting the temporary bot directory.';
	 }

	 $botUserSyncFiles = array( 'acasyncuser.php', 'acasyncuser.xml');
	 foreach ($botUserSyncFiles as $botUserSyncFile) {
		 if (is_file(ACA_JPATH_ROOT . '/plugins/user/' . $botUserSyncFile )) {
			 @unlink( WPATH_ADMIN . 'botsync15/' . $botUserSyncFile);
		 } else if (!@rename( WPATH_ADMIN . 'botsync15/' . $botUserSyncFile, ACA_JPATH_ROOT . '/plugins/user/' . $botUserSyncFile)) {
			 $error .= '<br />Error copying bot file ' . $botUserSyncFile . ' to bot directory.';
		 }
	 }


	 ### jNews bot

	 $bot_infos = array('jNews Content Bot', 'jnewsletterbot');
		 $query = "SELECT `id` FROM `#__plugins` WHERE `element` = 'jnewsletterbot'" ;
		 $database->setQuery($query);
		 $database->query();
		 $errorDB = $database->getErrorMsg();
		 if (!empty($errorDB)) {
			 $error .= '<br /> Error getting bot information from bot table for "' . $bot_infos[0] . '". Database error: <br />' . $errorDB . '<br />';
		 } else {
			 $id = $database->loadResult();
			 if (!$id) {

				JLoader::register('JTablePlugin'   , JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'table'.DS.'plugin.php');

				 $row = new JTablePlugin($database);
				 $row->name = $bot_infos[0];
				 $row->ordering = 0;
				 $row->folder = 'jnewsletter';
				 $row->iscore = 0;
				 $row->access = 0;
				 $row->client_id = 0;
				 $row->element = $bot_infos[1];
				 $row->published = 1;
				 if (!$row->store()) {
					$error .= '<br />Error adding bot information to bot table for "' . $bot_infos[0] . '".';
				 }

				 $bot_infos = array('Load a Module into jNews', 'module');
				 $row = new JTablePlugin($database);
				 $row->name = $bot_infos[0];
				 $row->ordering = 0;
				 $row->folder = 'jnewsletter';
				 $row->iscore = 0;
				 $row->access = 0;
				 $row->client_id = 0;
				 $row->element = $bot_infos[1];
				 $row->published = 1;
				 if (!$row->store()) {
					$error .= '<br />Error adding bot information to bot table for "' . $bot_infos[0] . '".';
				 }
			 }
		 }

	 $bot_infos = array('jNews User Synchronization', 'acasyncuser');
	 foreach ($bot_infos as $bot_info) {
		 $query = "SELECT `id` FROM `#__plugins` WHERE `element` = 'acasyncuser'" ;
		 $database->setQuery($query);
		 $database->query();
		 $errorDB = $database->getErrorMsg();
		 if (!empty($errorDB)) {
			 $error .= '<br /> Error getting bot information from bot table for "' . $bot_info[0] . '". Database error: <br />' . $errorDB . '<br />';
		 } else {
			 $id = $database->loadResult();
			 if (!$id) {

				JLoader::register('JTablePlugin'   , JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'table'.DS.'plugin.php');

				 $row = new JTablePlugin($database);
				 $row->name = $bot_infos[0];
				 $row->ordering = 9;
				 $row->folder = 'user';
				 $row->iscore = 0;
				 $row->access = 0;
				 $row->client_id = 0;
				 $row->element = $bot_infos[1];
				 $row->published = 1;
				 if (!$row->store()) {
					$error .= '<br />Error adding bot information to bot table for "' . $bot_info[0] . '".';
				 }
			 }
		 }
	 }


	 if (empty($error)) $return .= jnewsletter::printM('green' , _ACA_INSTALL_SUCCESS) .'<br />';
	 else $return .= $error.jnewsletter::printM('red' , _ACA_INSTALL_ERROR) .'<br />';
	 return $return;
 }//endfct
