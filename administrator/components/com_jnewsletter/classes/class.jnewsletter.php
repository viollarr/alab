<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

if(!defined('ACA_JPATH_ROOT')){
	if ( defined('JPATH_ROOT') AND class_exists('JFactory')) {
		define ('ACA_JPATH_ROOT' , JPATH_ROOT );
		if(!defined('ACA_CMSTYPE')){
			define( 'ACA_CMSTYPE', true );
		}//endif
	}//endif
	require_once( ACA_JPATH_ROOT . '/components/com_jnewsletter/defines.php');
}

require_once( WPATH_ADMIN.'compa.php');
require_once( WPATH_CLASS . 'class.erro.php');
require_once( WPATH_CLASS . 'class.mailing.php');
require_once( WPATH_CLASS . 'class.jmail.php');
require_once( WPATH_CLASS . 'class.module.php');
require_once( WPATH_CLASS . 'class.lists.php');
require_once( WPATH_CLASS . 'class.listype.php');
require_once( WPATH_CLASS . 'class.queue.php');
require_once( WPATH_CLASS . 'class.subscribers.php');
require_once( WPATH_CLASS . 'class.listssubscribers.php');
require_once( WPATH_CLASS . 'class.update.php');
require_once( WPATH_CLASS . 'class.captcha.php');
require_once( WPATH_CLASS . 'class.templates.php');
require_once( WPATH_CLASS . 'class.attachment.php');

if ( ACA_CMSTYPE ) {
	require_once( WPATH_CLASS . 'class.xonfig15.php');
}//endif

require_once( WPATH_ADMIN . 'plugins' .DS. 'class.newsletter.php' );
@include_once( WPATH_ADMIN . 'plus' .DS. 'class.auto.php' );

if (file_exists ( ACA_PATH_LANG . ACA_CONFIG_LANG . '.php')) {
	require_once( ACA_PATH_LANG . ACA_CONFIG_LANG . '.php');
} else {
	require_once( ACA_PATH_LANG . 'english.php');
}

if (!isset($GLOBALS[ACA.'component'])) {
	$xf = new xonfig();
	$xf->loadConfig();
}

global $mainframe;

if(!$mainframe->isAdmin() AND empty($Itemid)){
	$Itemid = @$GLOBALS[ACA.'itemidAca'];
}

 class jnewsletter {
	 function printYN($condition , $yesMessage, $noMessage) {
		if ($condition) return jnewsletter::printM('ok' , $yesMessage);
		else return jnewsletter::printM('no' , $noMessage);
   	}

   	function defaultYN($condition , $yesMessage, $noMessage) {
		if ($condition) return jnewsletter::printM('ok' , $yesMessage);
		else return jnewsletter::printM('defaulterror' , $noMessage);
   	}

	 function printM($type , $message) {

		switch ($type) {
			case 'warning':
				$colored_message = '<img  hspace="15"  align="absmiddle" alt="warning" src="'.ACA_PATH_ADMIN_IMAGES.'warning.png"><span style="font-size: larger; color:#F58E07; font-weight: bold;">' . $message . '</span>';
				break;
			case 'update':
				$colored_message = '<img  hspace="15" align="absmiddle" alt="upgrade" src="'.ACA_PATH_ADMIN_IMAGES.'upgrade.gif"><span style=" font-size: larger; color:#0033FF; font-weight: bold;">' . $message . '</span>';
				break;
			case 'general':
				$colored_message = '<img  hspace="15" align="absmiddle" style="width: 28px; height: 28px;" alt="general" src="'.ACA_PATH_ADMIN_IMAGES.'general.gif"><span style="font-size: larger; color:#5D00FF; font-weight: bold;">' . $message . '</span>';
				break;
			case 'cron':
				$colored_message = '<img  hspace="15" align="absmiddle" style="width: 28px; height: 28px;"  alt="cron" src="'.ACA_PATH_ADMIN_IMAGES.'cron.gif"><span style="font-size: larger; color:#F58E07; font-weight: bold;">' . $message . '</span>';
				break;
			case 'suggestion':
				$colored_message = '<img  hspace="15" align="absmiddle" style="width: 28px; height: 28px;" alt="suggestion" src="'.ACA_PATH_ADMIN_IMAGES.'status_y.png"><span style="font-size: larger; color:#00FF51; font-weight: bold;">' . $message . '</span>';
				break;
			case 'tips':
				$colored_message = '<img  hspace="15" align="absmiddle" style="width: 28px; height: 28px;" alt="tips" src="'.ACA_PATH_ADMIN_IMAGES.'status_y.png"><span style="font-size: larger; color:#0033FF; font-weight: bold;">' . $message . '</span>';
				break;
			case 'noimage':
				$colored_message = '<span style="font-size: larger; color:#5D00FF; font-weight: bold;">' . $message . '</span>';
				break;
			case 'error':
				$colored_message = '<img  hspace="15" align="absmiddle" style="width: 28px; height: 28px;" alt="Error" src="'.ACA_PATH_ADMIN_IMAGES.'warning.png"><span style="font-size: larger; color:#FF0000; font-weight: bold;">' . $message . '</span>';
				break;
			case 'ok':
				$colored_message = '<img  hspace="15" align="absmiddle" alt="ok" src="'.ACA_PATH_ADMIN_IMAGES.'button_ok.png"><span style="font-size: larger; color: rgb(0, 153, 0); font-weight: bold;">' . $message . '</span>';
				break;
			case 'no':
				$colored_message = '<img  hspace="15" align="absmiddle" alt="no" src="'.ACA_PATH_ADMIN_IMAGES.'button_cancel.gif"><span style=" font-size: larger; color: rgb(255, 0, 0); font-weight: bold;">' . $message . '</span>';
				break;
			case 'green':
				$colored_message = '<span style="font-weight: bold; color:#07C500;">' . $message . '</span>';
				break;
			case 'red':
				$colored_message = '<span style="font-weight: bold; color:#FF0000;">' . $message . '</span>';
				break;
			case 'blue':
				$colored_message = '<span style="font-weight: bold; color:#487BF0;">' . $message . '</span>';
				break;
			case 'defaulterror':
				$colored_message = '<img  hspace="15"  align="absmiddle" alt="warning" src="'.ACA_PATH_ADMIN_IMAGES.'default.png"><span style="font-size: larger; color:#F58E07; font-weight: bold;">' . $message . '</span>';
				break;
			default:
				$colored_message ='';
				break;
		}
   return $colored_message."\n\r";
   }

	 function chooseTips( $action, $task ) {
		if ( ACA_CMSTYPE ) {
			$message = '';
		}

   		return $message;
      }

	function getStats() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		# check if module is published
		$database->setQuery( "SELECT `published` FROM `#__modules` WHERE `module` LIKE '%jnewsletter%' ORDER BY `published` DESC " );
		$total = $database->loadResult();
		$xf = new xonfig();
		$xf->update('mod_pub', ($total) ? '1' : '0' );

	return $total;
   }

	function colorPicker($name, $size = 10, $colorV = ''){

		if (!isset($doc))$doc =& JFactory::getDocument();
		$doc->addStyleSheet(ACA_PATH_ADMIN_INCLUDES.'jquery/mlcolorpicker.css' ,'text/css');
		$doc->addScript(ACA_PATH_ADMIN_INCLUDES.'jquery/jquery.1.3.2.js' , 'text/javascript');
		$doc->addScript(ACA_PATH_ADMIN_INCLUDES.'jquery/mlcolorpicker.js' , 'text/javascript');

		$HTML = '<div id="acacolorPicker" style="clear: both; vertical-align: middle;">';
		$HTML .= '<input style="margin-top: 5px; float:left" type="text" name="'.$name.'" class="inputbox" size="'.$size.'" maxlength="7" value="'.$colorV.'" id="acacolorpickerField"/>';
		$HTML .= '<div  style="background-color: '.$colorV.'; border: 1px solid silver; margin: 5px; width: 35px; height: 14px; float: left;" id="acacolorPickerDiv"/>';$HTML .= '</div>';
		$js = '	<script type="text/javascript">
					<!--
					jQuery.noConflict();
	  					jQuery(function(){
							jQuery("#acacolorPicker").mlColorPicker({\'onChange\': function(val){
							jQuery("#acacolorPickerDiv").css("background-color", "#" + val);
							jQuery("#acacolorpickerField").val("#" + val);
							}});
						});

					//-->
				</script>';
		$HTML .= $js;
		return $HTML;
	}//endfct

/*<p>Function to resize the image if its over the max height/width</p>
 */
	function imageResize($path, $mw='', $mh='', $alt='image'){
		 if(list($w,$h) = @getimagesize($path)) {
		    foreach(array('w','h') as $v) {
		    	$m = "m{$v}";
		        if(${$v} > ${$m} && ${$m}) {
		        	$o = ($v == 'w') ? 'h' : 'w';
		        	$r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r);
		        }//endif
		    }//endforeach

		    	return("<img src='{$path}' alt='{$alt}' width='{$w}' height='{$h}' />");
		 }//endif
    }//endfct

/*<p>Function search</p>
 * @params $forms - the html tag of the form
 * @params $hidden - the html of hidden values
 * @params $search - the value to be search
 * @params $id - the input id that will be used by the javascript in the button
 */
	function search($forms, $hiddenobj=null, $search='', $id='search', $filterobj=null, $message='', $pagination=null ){
		$html = '';
		$html .= $forms;
		$html .= $hiddenobj;
		$html .= '<table cellspacing="0" cellpadding="2" border="0" style="text-align: left; width: 100%;"><tbody>';
		$html .='<tr><td style="text-align: left; padding: 0px 0px 3px 5px; width: 300px;">'. _ACA_SEARCH;
		$html .= '<input type="text" name="'.$id.'" id="'.$id.'" value="'.$search.'" style="margin: 2px 5px;" class="inputbox" onchange="document.adminForm.submit();" />';
		$html .= '<button class="joobibutton" onclick="this.form.submit();">'. _ACA_SEARCH_GO .'</button>';
		$js = "document.getElementById('$id').value='';this.form.submit();";
		$html .= '<button class="joobibutton" onclick="'.$js.'">'. _ACA_SEARCH_RESET.'</button>';
	 	if (isset($message)){
		 	$html .= '</td><td style="text-align: center;">';
		 	$html .= $message;
	 	}//endif
	 	if (isset($pagination)){
		 	$html .= '</td><td style="text-align: right;">';
			$html .= jnewsletter::pagination($pagination);
	 	}//endif
	 	if (isset($filterobj)){
		 	$html .= '</td><td style="text-align: right;">';
			$html .= $filterobj;
	 	}//endif
	 	$html .= '</td></tr>';
		$html .= '</tbody></table>';
		$html .= '</form>';

		return $html;
	}//endfct

	 function messageMgmt($action, $task, $message) {

		if (empty($message)) {

			if ($GLOBALS[ACA.'news1'] == 1)
				return jnewsletter::printM('warning' , _ACA_UPGRADE1.'<b>Anjel</b>'._ACA_UPGRADE2);
			if ($GLOBALS[ACA.'news2'] == 1)
				return jnewsletter::printM('warning' , _ACA_UPGRADE1.'<b>Letterman</b>'._ACA_UPGRADE2);
			if ($GLOBALS[ACA.'news3'] == 1)
				return jnewsletter::printM('warning' , _ACA_UPGRADE1.'<b>YaNC</b>'._ACA_UPGRADE2);

			if ($GLOBALS[ACA.'mod_pub']==0) {
				$total = jnewsletter::getStats();
				$link = '  <a href="index2.php?option=com_modules">'._ACA_MOD_PUB_LINK.'</a>';
				if ($total['mod_pub']==0 AND $GLOBALS[ACA.'act_totalmailing0'] < 3)
					return jnewsletter::printM('warning' , _ACA_MOD_PUB.$link);
			}


			if ($GLOBALS[ACA.'act_totalmailing2']>0 AND $GLOBALS[ACA.'cron_setup'] == 0)
				return jnewsletter::printM('cron' , _ACA_SCHEDULE_SETUP);


			if ($GLOBALS[ACA.'show_tips'] == 1) {
				$ou = false;
				$message = jnewsletter::chooseTips( $action, $task );
				if (!empty($message)){
					return $message;
				}
			}

		}
		return $message;
	}

	 function convertObjectToIdList($ObjectValues , $type) {
		$tableValue = Array();
		$k = 0;

		if (!empty($ObjectValues)) {
		foreach ($ObjectValues as $ObjectValue) {
			switch ($type) {
				case 'qid':
					$tableValue[$k] = $ObjectValue->qid;
					break;
				case 'subscriber_id':
					$tableValue[$k] = $ObjectValue->subscriber_id;
					break;
				case 'id':
					$tableValue[$k] = $ObjectValue->id;
					break;
				default:
					echo '<br />Please specify the type of conversion to do';
					break;
			}
			$k++;
		}
		} else {
			$tableValue = array();
		}
		return $tableValue;
	 }



function  miseEnPage($title, $tip , $compoment){
		echo'<tr>'."\n\r";
		echo' <td width="185" class="key">'."\n\r";
		echo'  <span class="editlinktip">'."\n\r";
		echo compa::toolTip($tip, '', 280, 'tooltip.png', $title, '', 0 );
		echo '  </span>'."\n\r";
		echo ' </td>'."\n\r";
		echo ' <td>'.$compoment.' '."\n\r";
		echo ' </td>'."\n\r";
		echo '</tr>'."\n\r";
	}



function  miseEnHTML($title, $tip , $compoment){
		$html = '<tr>'."\n\r";
		$html .= ' <td width="185" class="key">'."\n\r";
		$html .= '  <span class="editlinktip">'."\n\r";
		$html .=  compa::toolTip($tip, '', 280, 'tooltip.png', $title, '', 0 );
		$html .=  '  </span>'."\n\r";
		$html .=  ' </td>'."\n\r";
		$html .=  ' <td>'.$compoment.' '."\n\r";
		$html .=  ' </td>'."\n\r";
		$html .=  '</tr>'."\n\r";
		return $html;
	}



	function beginingOfTable($class){
		echo'<table class="'.$class.'" cellspacing="1" align="left">'."\n\r";
		echo'<tbody>'."\n\r";
	}


	function endOfTable(){
		echo '</tbody>'."\n\r";
		echo '</table>'."\n\r";
	}




	function orderBy($order) {


		switch ($order) {
			case 'listnameA' :
				$query = ' ORDER BY `list_name` ASC ';
				break;
			case 'subjectA' :
				$query = ' ORDER BY `subject` ASC ';
				break;
			case 'listtypeA' :
				$query = ' ORDER BY `list_type` ASC ';
				break;
			case 'idA' :
				$query = ' ORDER BY `id` ASC ';
				break;
			case 'idD' :
				$query = ' ORDER BY `id` DESC ';
				break;
			case 'createdateA' :
				$query = ' ORDER BY `createdate` ASC ';
				break;
			case 'sub_nameA' :
				$query = ' ORDER BY `name` ASC ';
				break;
			case 'sub_nameD' :
				$query = ' ORDER BY `name` DESC ';
				break;
			case 'sub_emailA' :
				$query = ' ORDER BY `email` ASC ';
				break;
			case 'sub_dateA' :
				$query = ' ORDER BY `subscribe_date` ASC ';
				break;
			case 'sub_dateD' :
				$query = ' ORDER BY `subscribe_date` DESC ';
				break;
			case 'list_idA' :
				$query = ' ORDER BY `list_id` ASC ';
				break;
			case 'listype_name' :
				$query = ' ORDER BY `list_type` ASC , `list_name` ASC  ';
				break;
			default :
				$query = '';
				break;
		}

	return $query;
	}


	function checkPermissions($accessLevel, $userId=0, $gid=0 ) {
		global $mainframe;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$acl =& JFactory::getACL();
			$my	=& JFactory::getUser();
		} //endif

		if($mainframe->isAdmin()){
			return true;
		}

		$show = false;
		$groupAccess=array();

		if ($userId>0) {
			$userType = subscribers::getUserType($userId);
		} elseif (!empty($my->usertype)) {
			$userType = $my->usertype;
		} else {
			return false;
		}
		$userGrouId = $acl->get_group_id($userType, 'ARO');

		if ( class_exists('pro') && $gid>0 ) {
			$groupAccess = $acl->get_group_children( $gid , 'ARO',  'RECURSE' );
			$groupAccess[] = $gid;
			$gidFront = $acl->get_group_id( 'Public Frontend' , 'ARO' );
			$ex_groups2 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
			if ( in_array( $gid , $ex_groups2 ) ) {
				$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );
				$ex_groups3 = $acl->get_group_children( $gidAdmin , 'ARO',  'RECURSE' );
				$ex_groups3[] = $gidAdmin;
				$groupAccess = array_merge( $groupAccess, $ex_groups3 );
			}
		} else {
			if ($accessLevel=='admin') $accessLevel='Administrator';

			$gidAdmin = $acl->get_group_id( $accessLevel , 'ARO' );
			$groupAccess = $acl->get_group_children( $gidAdmin , 'ARO',  'RECURSE' );
			$groupAccess[] = $gidAdmin;

			$gidAdminP = $acl->get_group_id( 'Public Frontend' , 'ARO' );
			$ex_groups3 = $acl->get_group_children( $gidAdminP , 'ARO',  'RECURSE' );
			$ex_groups3[] = $gidAdminP;

			if ( in_array( $gidAdmin, $ex_groups3 ) ) {
				$gidFront = $acl->get_group_id( 'Public Backend' , 'ARO' );
				$ex_groups4 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
				$ex_groups4[] = $gidFront;
				$groupAccess = array_merge( $groupAccess, $ex_groups4 );

			}
		}

		if ( in_array( $userGrouId, $groupAccess) ) {
			$show = true;
		}



		return $show;
	}

	function WarningIcon($warning, $title='Joomla Warning')	{


		$mouseover 	= 'return overlib(\''. $warning .'\', CAPTION, \''. $title .'\', BELOW, RIGHT);';

		$tip  = '<!--'. $title .'-->';
		$tip .= '<a href="javascript:void(0)" onmouseover="'. $mouseover .'" onmouseout="return nd();">';
		$tip .= '<img src="'. ACA_PATH_ADMIN_IMAGES .'warning.png" border="0"  alt="warning"/></a>';

		return $tip;
	}

	 function makeObj($name, $value) {
	 	$object = null;
		$object->name = $name;
		$object->value = $value;
		return $object;
	 }

	 function checkExisting() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		$database->setQuery( "SELECT COUNT(*) FROM #__components WHERE `option` ='com_anjel' " );
		$exist["news1"] = $database->loadResult();

		$database->setQuery( "SELECT COUNT(*) FROM #__components WHERE `option` ='com_letterman' " );
		$exist["news2"] = $database->loadResult();

		$database->setQuery( "SELECT COUNT(*) FROM #__components WHERE `option` ='com_yanc' " );
		$exist["news3"] = $database->loadResult();

	return $exist;
   }

	 function checkCB() {


		$xf = new xonfig();

		if(!file_exists(ACA_JPATH_ROOT. '/administrator/components/com_comprofiler/admin.comprofiler.php')) {
			$xf->update('cb_integration', '0');
			return false;
		}
		$xf->update('cb_integration', '1');
		$xf->update('integration', '1');
		jnewsletter::checkCBPlugin();
		return true;

   }

	 function checkCBPlugin() {


		$xf = new xonfig();
		if(!file_exists(ACA_JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_jnewslettercbplugin/jnewsletter_cb.php' )
			AND !file_exists(ACA_JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_jnewslettercb/jnewsletter_cb.php')) {
			$xf->update('cb_pluginInstalled', '0');
			return false;
		}
		$xf->update('cb_pluginInstalled', '1');
		$xf->update('cb_integration', '1');
		return true;

   }

     function noShow() {
        if ( @$GLOBALS[ACA.'showtag'] !='1' && file_exists( ACA_JPATH_LIVE . '/components/com_jnewsletter/css/jnewsletter.css' ) ) {
	        $title = substr( ACA_SITE_NAME , 0, 20);
	        $text = ' Joomla : ' . $title;
	        $html =  '<a href="http://www.ijoobi.com" target="_blank" class="noshow">';
	        $html .=  '<div class="noshow">'. $text .'</div></a>' ;
	        return $html;
        }
    }

	function getNow($delay = 0) {
			//return date( 'Y-m-d H:i:s',  time() + ACA_TIME_OFFSET *60*60 + ($delay*60) - date('Z'));
			return time() + ACA_TIME_OFFSET *60*60 + ($delay*60) - date('Z');

	}

	function getDBDate($time = 0,$delay = 0){
		if(empty($time)) $time = time();

		if(ACA_CMSTYPE)//Joomla 1.5
		{
			$time = $time - date('Z');
		}

		return @date( 'Y-m-d H:i:s',$time + $delay*60);
	}

	function version($short=false) {

		if ($short) {
			return $GLOBALS[ACA.'version'];
		} else {
			return $GLOBALS[ACA.'component'].' '.$GLOBALS[ACA.'type'].' '.$GLOBALS[ACA.'version'];
		}

	}

	function objectHTMLSafe( &$mixed, $quote_style=ENT_QUOTES, $exclude_keys='' )
	{
		if (is_object( $mixed ))
		{
			foreach (get_object_vars( $mixed ) as $k => $v)
			{
				if (is_array( $v ) || is_object( $v ) || $v == NULL || substr( $k, 1, 1 ) == '_' ) {
					continue;
				}

				if (is_string( $exclude_keys ) && $k == $exclude_keys) {
					continue;
				} else if (is_array( $exclude_keys ) && in_array( $k, $exclude_keys )) {
					continue;
				}

				$mixed->$k = htmlspecialchars( $v, $quote_style );
			}
		}
	}

	function printLine($linear, $text) {


		 if ($linear) {
			 $etr = ' ';
		 } else {
			 $etr = '<br />';
		 }

		return $text . "\n" . $etr . " \n ";
	}



	function resetUpgrade($index=0)	{
		$xf = new xonfig();
		$config = array();
		if ($index==0) {
			$config['news1'] = '0';
			$config['news2'] = '0';
			$config['news3'] = '0';
		} else {
			$config['news'.$index] = '0';
		}
		return $xf->saveConfig($config);
	}

	function getVersion() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		# check if module is published
		$database->setQuery( "SELECT `text` FROM `#__jnews_xonfig` WHERE `akey`='version' LIMIT 1" );
		$version = $database->loadResult();

	return $version;
   }

	function upgrade_News1()	{

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$xf = new xonfig();
		$newLists = array();
		$idImportedList = array();
		$i = 0;
		$database->setQuery("SELECT * FROM #__anjel_letters");
		$newsletters = $database->loadObjectList();
		$error = $database->getErrorMsg();

		if (!empty($error)) {
			echo  '<p><b>Error (class.upgrade.php->upgrade_News1 () line ' . __LINE__ . '):</b> Error getting newsletters. Database error: <br />' . $error . '</p>';
			return false;
		} else {
			foreach ($newsletters AS $newsletter) {
				$list->list_name = $newsletter->list_name;
				$list->list_desc = $newsletter->list_desc;
				$list->sendername = $newsletter->sendername;
				$list->senderemail = $newsletter->senderemail;
				$list->bounceadres = $newsletter->bounceadres;
				$list->layout = $newsletter->layout;
				$list->template = 0;
				$list->subscribemessage = $newsletter->subscribemessage;
				$list->unsubscribemessage = $newsletter->unsubscribemessage;
				$list->notifyadminmsg=$newsletter->notifyadminmsg;
				$list->html = $newsletter->html;
				if (!empty($newsletter->hidden)) {
					$list->hidden = !$newsletter->hidden;
				} else {
					$list->hidden = 1;
				}
				$list->list_type = '1' ;
				$list->unsubscribesend = 1;
				$list->unsubscribenotifyadmin = 1;
				$list->auto_add = 0;
				$list->user_choose = 0;
				$list->cat_id = '0:0';
				$list->delay_min = 0;
				$list->delay_max = 0;
				$list->follow_up = 0;
				$list->owner = $my->id;
				$list->auto_add = 0;
				$list->acc_level = 25;
				$list->acc_id = 29;
				$list->published = 1;
				$list->createdate = jnewsletter::getNow();
				$list->footer = 1;
				$list->notify_id = 0;
				$list->notification = 0;


				$query = 'INSERT INTO `#__jnews_lists` (`list_name`) VALUES (\'' . $list->list_name . '\'  )';
				$database->setQuery($query);
				$database->query();
				$error = $database->getErrorMsg();

				if (!empty($error)) {
					echo '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error adding list to database. Database error: <br />' . $error . '</p><br /><br />Are you trying to insert a list name which is already in use?    The list name has to be different for each list! <br /><br />';
				} else {

		   			$query = 'SELECT `list_id` FROM `#__jnews_lists` WHERE `list_name`= \'' . $list->list_name . '\'';
			     	$database->setQuery($query);

					if ( ACA_CMSTYPE ) {	// joomla 15
						$mynewlist = $database->loadObject();
					}

		   			$error = $database->getErrorMsg();
		   			$xf->plus('totallist0', 1);
					$xf->plus('act_totallist0', 1);
					$xf->plus('totallist1', 1);
					$xf->plus('act_totallist1', 1);
					if (!empty($error)) {
						echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error getting listname. Database error: <br />' . $error . '</p>';
						return false;
					} else {
						$idImportedList[$newsletter->id] = $mynewlist->list_id;
						$newLists[$i] = $mynewlist->list_id;
						$i++;
						$list->id = $mynewlist->list_id;
						$error = lists::updateListData($list);
						if ( !$error ) {
							echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error inserting list. Database error: <br />' . $error . '</p>';
							return false;
						} else {
							echo '<br /><b>'.@constant( $GLOBALS[ACA.'listnames1'] ). ': </b>'.$list->list_name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
							$database->setQuery("SELECT * FROM #__anjel_mailing WHERE `list_id`=".$newsletter->id);
							$mailingsImports = $database->loadObjectList();
							$error = $database->getErrorMsg();

							if (!empty($error)) {
								echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error getting mailings. Database error: <br />' . $error . '</p>';
								return false;
							} else {
								$issue_nb = 1;
								foreach ($mailingsImports AS $mailingsImport) {

									$mailings->list_id = $mynewlist->list_id;
									$mailings->list_type = '1';
									$mailings->send_date = $mailingsImport->send_date;
									$mailings->subject = $mailingsImport->list_subject;
									$mailings->htmlcontent = $mailingsImport->htmlcontent;
									$mailings->textonly = $mailingsImport->textonly;
									$mailings->attachments = $mailingsImport->attachments;
									$mailings->images = $mailingsImport->images;
									$mailings->published = $mailingsImport->published;
									$mailings->visible = $mailingsImport->visible;
									$mailings->html = $newsletter->html;
									$mailings->fromname = $mailingsImport->fromname;
									$mailings->fromemail = $mailingsImport->fromemail;
									$mailings->frombounce = $mailingsImport->frombounce;
									$mailings->author_id = $mailingsImport->subscriber_id;
									$mailings->delay = 0;
									$mailings->issue_nb = $issue_nb;
									$mailings->acc_level = 25;
									$mailings->createdate = $list->createdate;
									$issue_nb++;
									$error = xmailing::insertMailingData($mailings);
									if (!$error) {
										echo  '<p><b>Error (class.upgrade.php->upgrade_News1 () line ' . __LINE__ . '):</b> Error inserting mailing. Database error: <br />' . $error . '</p>';

									} else {

										echo '<br /><b>'._ACA_MAILING. ': </b>'.$mailingsImport->list_subject.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
									}
								}
							}
						}
					}
				}
			}

			### Insert registered subscribers
			$database->setQuery( "SELECT * FROM #__anjel_subscribers" );
			$subscribers = $database->loadObjectList();
			$error = $database->getErrorMsg();

			if (!empty($error)) {
				echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error getting subscribers. Database error: <br />' . $error . '</p>';
				return false;
			} else {
				foreach ($subscribers AS $subscriber) {
					$newSubs = true;
					$jnewslettersubscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , 0, '', '', '','' );

					$database->setQuery( "SELECT `name`, `email` FROM #__users WHERE `id`=".$subscriber->subscriber_id);
					$userInfo = $database->loadObjectList();
					$error = $database->getErrorMsg();

					if (!empty($error)) {
						echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error getting users info. Database error: <br />' . $error . '</p>';
						return false;
					} else {

						foreach ($jnewslettersubscribers AS $jnewslettersubscriber) {
							if ($userInfo[0]->email == $jnewslettersubscriber->email) {
								$newSubs = false;
								$subId[0] = $jnewslettersubscriber->id;
							}
						}

							if ($newSubs) {
								$newSubscriber = null;
								$newSubscriber->user_id = $subscriber->subscriber_id;
								$newSubscriber->name = $userInfo[0]->name;
								$newSubscriber->email = $userInfo[0]->email;
								$newSubscriber->ip = $subscriber->ip;
								$newSubscriber->receive_html = $subscriber->receive_html;
								$newSubscriber->confirmed = $subscriber->confirmed;
								$newSubscriber->subscribe_date = $subscriber->subscribe_date;
								$newSubscriber->blacklist = $subscriber->blacklist;
								$newSubscriber->timezone = '00:00:00';
								$newSubscriber->language_iso = 'eng';
								$newSubscriber->params = '';


								if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
								$newSubscriber->column1=$subscriber->column1;
								$newSubscriber->column2=$subscriber->column2;
								$newSubscriber->column3=$subscriber->column3;
								$newSubscriber->column4=$subscriber->column4;
								$newSubscriber->column5=$subscriber->column5;
								}//end if for pro version

								$error = subscribers::insertSubscriber($newSubscriber, $subscriberId);

								if (!empty($error)) {
									if ($subscriberId<1) echo 'Error inserting subscriber: duplicate subscriber';
									$error ='';
									$subId[0] = $subscriberId;

								} else {
									echo '<br /><b>Registered '._ACA_MENU_SUBSCRIBERS. ': </b>'.$newSubscriber->name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
						 			 $d['email'] = $subscriber->email;
						 			 $erro->ck = subscribers::getSubscriberIdFromEmail($d );
									$erro->Eck(__LINE__ , '8301');
						 			 $subId[0] = $d['subscriberId'];
								}
							} else {
								echo '<br /><b>Registered '._ACA_MENU_SUBSCRIBERS. ': </b>'.$userInfo[0]->name .': '. jnewsletter::printM('red' , _ACA_IMPORT_EXIST);
								$subId[0] = $subscriber->subscriber_id;
							}

						$j = 0;
						foreach ($newsletters as $newsletter) {
							$letterid = $newsletter->id;
							$list_Id = 'list_' . $letterid;
							if ($subscriber->$list_Id>0) {
								$error = queue::insertQueuesForNews($subId, $idImportedList[$letterid], 29 );
								if (!$error) {
									echo  '<p><b>Error (class.upgrade.php->upgrade_News1 () line ' . __LINE__ . '):</b> Error inserting queue. Database error: <br />' . $error . '</p>';

								}
							}
						}
					}
				}
			}

			### Insert unregistered subscribers
			$database->setQuery( "SELECT * FROM #__anjel_unregistered" );
			$subscribers = $database->loadObjectList();
			$error = $database->getErrorMsg();

			if (!empty($error)) {
				echo  '<p><b>Error (class.upgrade.php->upgrade_News1 () line ' . __LINE__ . '):</b> Error getting subscribers. Database error: <br />' . $error . '</p>';
				return false;
			} else {
				foreach ($subscribers AS $subscriber) {
					$newSubs = true;
					$jnewslettersubscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , 0, '', '', '','' );

						foreach ($jnewslettersubscribers as $jnewslettersubscriber) {
							if ($subscriber->email == $jnewslettersubscriber->email) {
								$newSubs = false;
								$subId[0] = $jnewslettersubscriber->id;
							}
						}

						if ($newSubs) {
								$newSubscriber->user_id = 0;
								$newSubscriber->name = $subscriber->name;
								$newSubscriber->email = $subscriber->email;
								$newSubscriber->ip = $subscriber->ip;
								$newSubscriber->receive_html = $subscriber->receive_html;
								$newSubscriber->confirmed = $subscriber->confirmed;
								$newSubscriber->subscribe_date = $subscriber->subscribe_date;
								$newSubscriber->blacklist = $subscriber->blacklist;
								$newSubscriber->timezone = '00:00:00';
								$newSubscriber->language_iso = 'eng';
								$newSubscriber->params = '';


								//$newSubscriber->column1='';
								if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
								$newSubscriber->column1=$subscriber->column1;
								$newSubscriber->column2=$subscriber->column2;
								$newSubscriber->column3=$subscriber->column3;
								$newSubscriber->column4=$subscriber->column4;
								$newSubscriber->column5=$subscriber->column5;
								}//end for check version pro

								$error = subscribers::insertSubscriber($newSubscriber, $subscriberId);

								if (!empty($error)) {
									if ($subscriberId<1) echo 'Error inserting subscriber: Name:'.$subscriber->name.'<br />Email:'.$subscriber->email.'<br /> Error:'.$error ;
									$error ='';
									$subId[0] = $subscriberId;

								} else {
									echo '<br /><b>Unregistered '._ACA_MENU_SUBSCRIBERS. ': </b>'.$newSubscriber->name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
						 			 $d['email'] = $subscriber->email;
						 			 $erro->ck = subscribers::getSubscriberIdFromEmail($d );
									$erro->Eck(__LINE__ , '8302');
						 			 $subId[0] = $d['subscriberId'];
								}
						} else {
							echo '<br /><b>Unregistered '._ACA_MENU_SUBSCRIBERS. ': </b>'.$subscriber->name .': '. jnewsletter::printM('red' , _ACA_IMPORT_EXIST);
						}

						$j = 0;
						foreach ($newsletters as $newsletter) {
							$letterid = $newsletter->id;
							$list_Id = 'list_' . $letterid;
							if ($subscriber->$list_Id >0 ) {
								$queue = listssubscribers::getListSubscriberInfo( $subId[0] , $idImportedList[$letterid] );
								if (empty($queue)) {
									$error = queue::insertQueuesForNews($subId, $idImportedList[$letterid], 29 );
									if (!$error) {
										echo  '<p><b>Error (class.upgrade.php->upgrade_News1() line ' . __LINE__ . '):</b> Error inserting queue. Database error: <br />' . $error . '</p>';

									}
								}
							}
						}
				}
			}
		}
		return true;
	}

	function upgrade_News2()	{

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$xf = new xonfig();
		$newLists = array();
		$i = 0;
		$database->setQuery("SELECT * FROM #__letterman");
		$newsletters = $database->loadObjectList();
		$error = $database->getErrorMsg();

		if (!empty($error)) {
			echo  '<p><b>Error (class.upgrade.php->upgrade_News2 () line ' . __LINE__ . '):</b> Error getting newsletters. Database error: <br />' . $error . '</p>';
			return false;
		} else {
			echo '<br /><b>'.@constant( $GLOBALS[ACA.'listnames1'] ). ':</b>';
			foreach ($newsletters AS $newsletter) {
				$list->list_name = $newsletter->subject;
				$list->list_desc = $newsletter->subject;

				if ( ACA_CMSTYPE ) {	// joomla 15
					$conf	=& JFactory::getConfig();
					$list->sendername = $conf->getValue('config.fromname');
					$list->senderemail = $conf->getValue('config.mailfrom');
					$list->bounceadres = $conf->getValue('config.mailfrom');
				} //endif

				$list->layout = '[CONTENT]';
				$list->template = 0;
				$list->subscribemessage = '[CONFIRM]';
				$list->unsubscribemessage = '';
				$list->unsubscribesend = 1;
				$list->unsubscribenotifyadmin = 1;
				$list->html = 1;
				$list->hidden = 1;
				$list->list_type = '1';
				$list->auto_add = 0;
				$list->user_choose = 0;
				$list->cat_id = '0:0';
				$list->delay_min = 0;
				$list->delay_max = 0;
				$list->follow_up = 0;
				$list->owner = $my->id;
				$list->auto_add = 0;
				$list->acc_level = $newsletter->access;
				$list->acc_id = 29;
				$list->published = $newsletter->published;
				$list->createdate = $newsletter->created;
				$list->footer = 1;
				$list->notify_id = 0;
				$list->notification = 0;


				$query = 'INSERT INTO `#__jnews_lists` (`list_name`) VALUES (\'' . $list->list_name . '\'  )';
				$database->setQuery($query);
				$database->query();
				$error = $database->getErrorMsg();

				if (!empty($error)) {
					echo '<p><b>Error (class.upgrade.php->upgrade_News2() line ' . __LINE__ . '):</b> Error adding list to database. Database error: <br />' . $error . '</p><br /><br />Are you trying to insert a list name which is already in use?    The list name has to be different for each list! <br /><br />';
				} else {

		   			$query = 'SELECT * FROM `#__jnews_lists` WHERE `list_name`= \'' . $list->list_name . '\'';
			     	$database->setQuery($query);
					if ( ACA_CMSTYPE ) {	// joomla 15
						$mynewlist = $database->loadObject();
					} //endif

		   			$error = $database->getErrorMsg();
		   			$xf->plus('totallist0', 1);
					$xf->plus('act_totallist0', 1);
					$xf->plus('totallist1', 1);
					$xf->plus('act_totallist1', 1);
					if (!empty($error)) {
						echo  '<p><b>Error (class.upgrade.php->upgrade_News2 () line ' . __LINE__ . '):</b> Error getting listname. Database error: <br />' . $error . '</p>';
						return false;
					} else {
						$newLists[$i] = $mynewlist->list_id;
						$i++;
						$list->id = $mynewlist->list_id;
						$error = lists::updateListData($list);
						if ( !$error ) {
							echo  '<p><b>Error (class.upgrade.php->upgrade_News2 () line ' . __LINE__ . '):</b> Error inserting list. Database error: <br />' . $error . '</p>';
							return false;
						} else {
								echo '<br />'.$list->list_name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
								$mailings->list_id = $mynewlist->list_id;
								$mailings->list_type = '1';
								$mailings->send_date = $newsletter->send;
								$mailings->subject = $newsletter->subject;
								$mailings->htmlcontent = $newsletter->headers.$newsletter->html_message;
								$mailings->textonly = $newsletter->headers.$newsletter->message;
								$mailings->attachments = '';
								$mailings->images = '';
								$mailings->published = $newsletter->published;
								$mailings->visible = 1;
								$mailings->html = 1;
								$mailings->fromname = $list->sendername;
								$mailings->fromemail = $list->senderemail;
								$mailings->frombounce = $list->bounceadres;
								$mailings->author_id = $my->id;
								$mailings->delay = 0;
								$mailings->issue_nb = 1;
								$mailings->acc_level = $newsletter->access;
								$mailings->createdate = $newsletter->created;

								$error = xmailing::insertMailingData($mailings);
								if (!$error) {
									echo  '<p><b>Error (class.upgrade.php->upgrade_News2 () line ' . __LINE__ . '):</b> Error inserting mailing. Database error: <br />' . $error . '</p>';

								}
						}
					}
				}
			}

			$database->setQuery( "SELECT * FROM #__letterman_subscribers " );
			$subscribers = $database->loadObjectList();
			$error = $database->getErrorMsg();

			if (!empty($error)) {
				echo  '<p><b>Error (class.upgrade.php->upgrade_News2() line ' . __LINE__ . '):</b> Error getting subscribers. Database error: <br />' . $error . '</p>';
				return false;
			} else {
				echo '<br /><b>'._ACA_MENU_SUBSCRIBERS. ':</b>';
				foreach ($subscribers AS $subscriber) {
					$newSubs = true;
					$jnewslettersubscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , 0, '', '', '','' );

						foreach ($jnewslettersubscribers AS $jnewslettersubscriber) {
							if ($subscriber->subscriber_email == $jnewslettersubscriber->email) {
								$newSubs = false;
								$subId[0] = $jnewslettersubscriber->id;
							}
						}

						if ($newSubs) {
								$newSubscriber->user_id = $subscriber->user_id;
								$newSubscriber->name = $subscriber->subscriber_name;
								$newSubscriber->email = $subscriber->subscriber_email;
								$newSubscriber->ip = $subscriber->ip;
								$newSubscriber->receive_html = 1;
								$newSubscriber->confirmed = $subscriber->confirmed;
								$newSubscriber->subscribe_date = $subscriber->subscribe_date;
								$newSubscriber->blacklist = 0;
								$newSubscriber->timezone = '00:00:00';
								$newSubscriber->language_iso = 'eng';
								$newSubscriber->params = '';


								if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
								$newSubscriber->column1=$newSubscriber->column1;
								$newSubscriber->column2=$newSubscriber->column2;
								$newSubscriber->column3=$newSubscriber->column3;
								$newSubscriber->column4=$newSubscriber->column4;
								$newSubscriber->column5=$newSubscriber->column5;
								}//endif for check version of pro

								$error = subscribers::insertSubscriber($newSubscriber, $subscriberId);

								if (!empty($error)) {
									if ($subscriberId<1) echo 'Error inserting subscriber: '.$newSubscriber->name;
									$error ='';
									$subId[0] = $subscriberId;

								} else {
									echo '<br />'.$newSubscriber->name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
						 			 $d['email'] = $subscriber->email;
						 			 $erro->ck = subscribers::getSubscriberIdFromEmail($d );
									$erro->Eck(__LINE__ , '8303');
						 			 $subId[0] = $d['subscriberId'];
								}
						} else {
								echo '<br />'.$subscriber->subscriber_name .': '. jnewsletter::printM('red' , _ACA_IMPORT_EXIST);
						}

						$j = 0;
						$error = '';
						for ($j = 0; $j< count($newLists); $j++) {
							$queue = listssubscribers::getListSubscriberInfo( $subId[0] , $newLists[$j] );
							if (empty($queue)) {
								$error = queue::insertQueuesForNews($subId, $newLists[$j], 29 );
								if (!$error) {
									echo  '<p><b>Error (class.upgrade.php->upgrade_News2 () line ' . __LINE__ . '):</b> Error inserting queue. Database error: <br />' . $error . '</p>';

								}
							}
						}
				}
			}
		}
		return true;
	}

	function upgrade_News3()	{

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$xf = new xonfig();
		$newLists = array();
		$idImportedList = array();
		$i = 0;
		$database->setQuery("SELECT * FROM #__yanc_letters");
		$newsletters = $database->loadObjectList();
		$error = $database->getErrorMsg();

		if (!empty($error)) {
			echo  '<p><b>Error (class.upgrade.php->upgrade_News3 () line ' . __LINE__ . '):</b> Error getting newsletters. Database error: <br />' . $error . '</p>';
			return false;
		} else {
			foreach ($newsletters AS $newsletter) {
				$list->list_name = $newsletter->list_name;
				$list->list_desc = $newsletter->list_desc;
				$list->sendername = $newsletter->sendername;
				$list->senderemail = $newsletter->senderemail;
				$list->bounceadres = $newsletter->bounceadres;
				$list->layout = $newsletter->layout;
				$list->template = 0;
				$list->subscribemessage = $newsletter->subscribemessage;
				$list->unsubscribemessage = $newsletter->unsubscribemessage;
				$list->notifyadminmsg=$newsletter->notifyadminmsg;
				$list->html = $newsletter->html;
				$list->hidden = !$newsletter->hidden;
				$list->unsubscribesend = 1;
				$list->unsubscribenotifyadmin = 1;
				$list->list_type = '1';
				$list->auto_add = 0;
				$list->user_choose = 0;
				$list->cat_id = '0:0';
				$list->delay_min = 0;
				$list->delay_max = 0;
				$list->follow_up = 0;
				$list->owner = $my->id;
				$list->auto_add = 0;
				$list->acc_level = $newsletter->aid;
				$list->acc_id = 29;
				$list->published = 1;
				$list->createdate = jnewsletter::getNow();
				$list->footer = 1;
				$list->notify_id = 0;
				$list->notification = 0;


				$query = 'INSERT INTO `#__jnews_lists` (`list_name`) VALUES (\'' . $list->list_name . '\'  )';
				$database->setQuery($query);
				$database->query();
				$error = $database->getErrorMsg();

				if (!empty($error)) {
					echo '<p><b>Error (class.upgrade.php->upgrade_News3() line ' . __LINE__ . '):</b> Error adding list to database. Database error: <br />' . $error . '</p><br /><br />Are you trying to insert a list name which is already in use?    The list name has to be different for each list! <br /><br />';
				} else {

		   			$query = 'SELECT * FROM `#__jnews_lists` WHERE `list_name`= \'' . $list->list_name . '\'';
			     	$database->setQuery($query);
					if ( ACA_CMSTYPE ) {	// joomla 15
						$mynewlist = $database->loadObject();
					} //endif
		   			$error = $database->getErrorMsg();
		   			$xf->plus('totallist0', 1);
					$xf->plus('act_totallist0', 1);
					$xf->plus('totallist1', 1);
					$xf->plus('act_totallist1', 1);
					if (!empty($error)) {
						echo  '<p><b>Error (class.upgrade.php->upgrade_News3() line ' . __LINE__ . '):</b> Error getting listname. Database error: <br />' . $error . '</p>';
						return false;
					} else {
						$idImportedList[$newsletter->id] = $mynewlist->list_id;
						$newLists[$i] = $mynewlist->list_id;
						$i++;
						$list->id = $mynewlist->list_id;
						$error = lists::updateListData($list);
						if ( !$error ) {
							echo  '<p><b>Error (class.upgrade.php->upgrade_News3 () line ' . __LINE__ . '):</b> Error inserting list. Database error: <br />' . $error . '</p>';

						} else {
							echo '<br /><b>'.@constant( $GLOBALS[ACA.'listnames1'] ). ': </b>'.$list->list_name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
							$database->setQuery("SELECT * FROM #__yanc_letters WHERE `list_id`=".$newsletter->id);
							$mailingsImports = $database->loadObjectList();
							$error = $database->getErrorMsg();

							if (!empty($error)) {
								echo  '<p><b>Error (class.upgrade.php->upgrade_News3() line ' . __LINE__ . '):</b> Error getting mailings. Database error: <br />' . $error . '</p>';
								return false;
							} else {
								$issue_nb = 1;
								foreach ($mailingsImports AS $mailingsImport) {

									$mailings->list_id = $mynewlist->list_id;
									$mailings->list_type = '1';
									$mailings->send_date = $mailingsImport->send_date;
									$mailings->subject = $mailingsImport->subject;
									$mailings->htmlcontent = $mailingsImport->htmlcontent;
									$mailings->textonly = $mailingsImport->textonly;
									$mailings->attachments = $mailingsImport->attachments;
									$mailings->images = $mailingsImport->images;
									$mailings->published = $mailingsImport->published;
									$mailings->visible = $mailingsImport->visible;
									$mailings->html = $mynewlist->html;
									$mailings->fromname = $list->sendername;
									$mailings->fromemail = $list->senderemail;
									$mailings->frombounce = $list->bounceadres;
									$mailings->author_id = $my->id;
									$mailings->delay = 0;
									$mailings->issue_nb = $issue_nb;
									$mailings->acc_level = 25;
									$mailings->createdate = $list->createdate;
									$issue_nb++;
									$error = xmailing::insertMailingData($mailings);
									if (!$error) {
										echo  '<p><b>Error (class.upgrade.php->upgrade_News3() line ' . __LINE__ . '):</b> Error inserting mailing. Database error: <br />' . $error . '</p>';

									} else {
										echo '<br /><b>'._ACA_MENU_MAILING_TITLE. ': </b>'.$mailingsImport->subject.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
									}
								}
							}
						}
					}
				}
			}

			$database->setQuery( "SELECT * FROM #__yanc_subscribers" );
			$subscribers = $database->loadObjectList();
			$error = $database->getErrorMsg();

			if (!empty($error)) {
				echo  '<p><b>Error (class.upgrade.php->upgrade_News3() line ' . __LINE__ . '):</b> Error getting subscribers. Database error: <br />' . $error . '</p>';
				return false;
			} else {
				foreach ($subscribers AS $subscriber) {
					$newSubs = true;
					$jnewslettersubscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , 0, '', '', '','' );

						foreach ($jnewslettersubscribers AS $jnewslettersubscriber) {
							if ($subscriber->subscriber_email == $jnewslettersubscriber->email) {
								$newSubs = false;
								$subId[0] = $jnewslettersubscriber->id;
							}
						}

						if ($newSubs) {
								$newSubscriber->user_id = $subscriber->userid;
								$newSubscriber->name = $subscriber->subscriber_name;
								$newSubscriber->email = $subscriber->subscriber_email;
								$newSubscriber->ip = $subscriber->ip;
								$newSubscriber->receive_html = $subscriber->receive_html;
								$newSubscriber->confirmed = $subscriber->confirmed;
								$newSubscriber->subscribe_date = $subscriber->subscribe_date;
								$newSubscriber->blacklist = 0;
								$newSubscriber->timezone = '00:00:00';
								$newSubscriber->language_iso = 'eng';
								$newSubscriber->params = '';


								//$newSubscriber->column1=$newSubscriber->column1;
								if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
								$newSubscriber->column1=$newSubscriber->column1;
								$newSubscriber->column2=$newSubscriber->column2;
								$newSubscriber->column3=$newSubscriber->column3;
								$newSubscriber->column4=$newSubscriber->column4;
								$newSubscriber->column5=$newSubscriber->column5;
								}//end if for check version pro

								$error = subscribers::insertSubscriber($newSubscriber, $subscriberId);

								if (!empty($error)) {
									if ($subscriberId<1) echo ' Error inserting subscriber:'.$newSubscriber->name;
									$error ='';
									$subId[0] = $subscriberId;

								} else {
									echo '<br /><b>'._ACA_MENU_SUBSCRIBERS. ': </b>'.$newSubscriber->name.': '. jnewsletter::printM('green' , _ACA_IMPORT_SUCCESS);
						 			 $d['email'] = $subscriber->email;
						 			 $erro->ck = subscribers::getSubscriberIdFromEmail($d );
									$erro->Eck(__LINE__ , '8304');
						 			 $subId[0] = $d['subscriberId'];
								}
						} else {
							echo '<br /><b>'._ACA_MENU_SUBSCRIBERS. ': </b>'.$subscriber->subscriber_name .': '. jnewsletter::printM('red' , _ACA_IMPORT_EXIST);
						}

						$j = 0;
						$queue = listssubscribers::getListSubscriberInfo( $subId[0] , $idImportedList[$subscriber->list_id] );
						if (empty($queue)) {
							$error = queue::insertQueuesForNews($subId, $idImportedList[$subscriber->list_id], 29 );
							if (!$error) {
								echo  '<p><b>Error (class.upgrade.php->upgrade_News3 () line ' . __LINE__ . '):</b> Error inserting queue. Database error: <br />' . $error . '</p>';

							}
						}
				}
			}
		}
		return true;
	}

		/* Function that will create toggle link
	 * @param text $act - act name
	 * @param text $column - table column to be toggled
	 * @param text $variableName - variable link name
	 * @param mixed $variableValue - variable link value
	 * @return string $link
	 * Author : Gino
	*/
	function createToggleLink($act, $column, $variableName, $variableValue, $task='toggle')
	{
		$link = null;

		$link = JURI::base() .'index.php?option=com_jnewsletter&act='. $act .'&task='. $task .'&'. $variableName .'='. $variableValue .'&col='. $column;

		return $link;
	} //endfct


	/* Function that will toggle the values in database
	 * for now this will only works for bit 0 or 1
	 * @param object $passObj - contains the necessary infos
	 * Author : Gino
	*/
	function toggle( $passObj )
	{
		// check if parameter if empty
		if( empty( $passObj ) ) return false;

		$tableName = $passObj->tableName;
		$columnName = $passObj->columnName;
		$whereColumn = $passObj->whereColumn;
		$whereColumnValue = $passObj->whereColumnValue;

		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		if( isset($database) )
		{
			$query = "SELECT `". $columnName ."` FROM `". $tableName ."` WHERE `". $whereColumn ."` = ". $whereColumnValue;
			$database->setQuery( $query );
			$result = $database->loadResult();

			$columnValue = ( !empty($result) && ( $result > 0 ) ) ? 0 : 1;

			$query = "UPDATE `". $tableName ."` SET `". $columnName ."` = ". $columnValue ." WHERE `". $whereColumn ."` = ". $whereColumnValue;
			$database->setQuery( $query );
			$database->query();
		} //endif

		return true;
	} //endfct


	/* function for search
	 * @params $forms - the html tag of the form
	 * @params $hidden - the html of hidden values
 	 * @params $search - the value to be search
 	 * @return $html
	*/
	function _searchbox( $forms, $hiddenobj=null, $search='', $id='search' )
	{
		$html = '';
		$html .= $forms;
		$html .= $hiddenobj;
		$html .= '<input type="text" name="'.$id.'" id="'.$id.'" value="'.$search.'" style="margin: 2px 5px;" class="inputbox" onchange="document.adminForm.submit();" />';
		$html .= '<button class="joobibutton" onclick="this.form.submit();">'. _ACA_SEARCH_GO .'</button>';
		$js = "document.getElementById('$id').value='';this.form.submit();";
		$html .= '<button class="joobibutton" onclick="'.$js.'">'. _ACA_SEARCH_RESET.'</button>';
		//$html .= '</form>';

		return $html;
	} //endfct

	/* function that will create pagination for views
	 * @param object $setLimit
	 		* total - total number of rows
	 		* start - number or index to start e.g 0 ( will start from 0 - limit )
	 		* value - ending number or limit e.g 20 ( will only show 20 rows )
	 * @return $display
	*/
	function _pagination( $setLimit )
	{
 		jimport('joomla.html.pagination');
 		$total = $setLimit->total;
 		$start = $setLimit->start;
 		$value = $setLimit->end;
 		$pagination = new JPagination( $total, $start, $value );
 		$display = $pagination->getListFooter();
		return $display;
	} //endfct

	/* function that will set the top row before the table
	 * @param object $search
	 * @param string $message
	 * @param object $pagination
	 * @param mixed $filter
	 * @return $html
	*/
	function setTop( $search=null, $message=null, $pagination=null, $filter=null )
	{
		$html = '';
		$html .= '<table cellspacing="0" cellpadding="2" border="0" style="text-align: left; width: 100%;"><tbody><tr>';

		// for search box
		if( !empty($search) )
		{
			// get necessary parameters
			$forms = $search->forms;
			$hidden = $search->hidden;
			$listsearch = $search->listsearch;
			$id = $search->id;

		 	$html .= '<td style="text-align:left;float:left;">';
		 	$html .= _ACA_SEARCH . jnewsletter::_searchbox( $forms, $hidden, $listsearch, $id );
		 	$html .= '</td>';
	 	}//endif

		// for text found in the upper part before that table list
		if( !empty($message) )
		{
		 	$html .= '<td style="text-align:center;">';
		 	$html .= $message;
		 	$html .= '</td>';
	 	}//endif

	 	// for pagination
	 	if( !empty($pagination) )
	 	{
		 	$html .= '<td style="text-align:center;">';
			$html .= jnewsletter::_pagination($pagination);
			$html .= '</td>';
	 	}//endif

	 	// for filter
	 	if( !empty($filter) )
	 	{
		 	$html .= '<td style="text-align: right;float:right">';
			$html .= $filter;
			$html .= '</td>';
	 	}//endif

		$html .= '</tr></tbody></table>';

		return $html;
	} //endfct

	/* Function that will get the legend to be set
	 * @param string $imgName - image name
	 * @param string $text
	 * @return array-request legend
	*/
	function getLegend( $imgName, $text=null )
	{
		$getLegendA = JRequest::getVar( 'legend' );
		if( empty( $getLegendA ) )
		{
			$imageO = null;
			$imageO->img = $imgName;
			$imageO->text = $text;

			$getLegendA = array();
			$getLegendA[$imgName] = $imageO;
		}
		else
		{
			if( !isset( $getLegendA[$imgName] ) )
			{
				$imageO = null;
				$imageO->img = $imgName;
				$imageO->text = $text;

				$getLegendA[$imgName] = $imageO;
			} //endif
		} //endif

		return JRequest::setVar( 'legend', $getLegendA );
	} //endfct

	/* Function that will set and display Legend
	 * @return string $html - display output
	*/
	function setLegend()
	{
		$getLegendA = JRequest::getVar( 'legend' );

		if( !empty($getLegendA) )
		{
			$html = '';
			$html .= '<div><center>';
			$html .= _ACA_LEGEND .' : ';

			$count = count( $getLegendA );
			$ctr = 0;
			foreach( $getLegendA as $key=>$legendO )
			{
				$ctr = $ctr + 1;

				$html .= ( isset($legendO->img) && !empty($legendO->img) ) ? '<img src="'. ACA_PATH_ADMIN_IMAGES .'16'.DS.$legendO->img.'"> ' : '';
				$html .= ( isset($legendO->text) && !empty($legendO->text) ) ? $legendO->text .' ' : ' ';
				$html .= ( $ctr != $count ) ? ' <b>|</b> ' : '';

			} //endforeach
			$html .= '</center></div>';

			return $html;
		}
		else
		{
			return '';
		} //endif
	} //endfct

 } //endclass


if ( ACA_CMSTYPE ) {

		JLoader::register('JPaneTabs',  JPATH_LIBRARIES.DS.'joomla'.DS.'html'.DS.'pane.php');

		class mosTabs15 extends JPaneTabs
		{
			var $useCookies = false;

			function __construct( $useCookies, $xhtml = null) {
				parent::__construct( array('useCookies' => $useCookies) );
			}

			function startTab( $tabText, $paneid ) {
				echo $this->startPanel( $tabText, $paneid);
			}

			function endTab() {
				echo $this->endPanel();
			}

			function startPane( $tabText ){
				echo parent::startPane( $tabText );
			}

			function endPane(){
				echo parent::endPane();
			}
		}

}//endif


