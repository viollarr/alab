<?php
/******************************************************************/
/* Title........: JACLPlus Component for Joomla! 1.0.15 Stable
/* Description..: Joomla! ACL Enhancements Component for Joomla! 1.0.15 Stable
/* Author.......: Vincent Cheah
/* Version......: 1.0.15a (For Joomla! 1.0.15 Stable ONLY)
/* Created......: 27/04/2008
/* Contact......: jaclplus@byostech.com
/* Copyright....: (C) 2005-2008 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of JACLPlus package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//JACLPlus Component for Joomla! 1.0.15 Stable (Joomla! ACL Enhancements Component)
//Copyright (C) 2005-2008 Vincent Cheah, ByOS Technologies. All rights reserved.
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
###################################################################

// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href="http://www.byostech.com/jaclplus">JACLPlus Component for Joomla! 1.0.15 Stable</a> ]' );

// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
		| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_jaclplus' )
		| $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_jaclplus' ))) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}

if (file_exists($mosConfig_absolute_path . '/administrator/components/com_jaclplus/language/'.$mosConfig_lang.'.php')) {
  include($mosConfig_absolute_path . '/administrator/components/com_jaclplus/language/'.$mosConfig_lang.'.php');
} else {
  include($mosConfig_absolute_path . '/administrator/components/com_jaclplus/language/english.php');
}

if( !isset($my->jaclplus) ) mosRedirect( 'index2.php', _JACL_P_SORRY );

require_once( $mainframe->getPath( 'admin_html' ) );
//require_once( $mainframe->getPath( 'class' ) );
$_config = new JACLPlus('jaclConfig', dirname(__FILE__)."/jaclplus.config.php" );

$task 	= strval( mosGetParam( $_REQUEST, 'task' ) );
$cid 	= mosGetParam( $_REQUEST, 'cid', array( 0 ) );
$id 	= intval( mosGetParam( $_REQUEST, 'id', 0 ) );
if (!is_array( $cid )) {
	$cid = array ( 0 );
}

switch ($task) {
	case 'new':
		editGroup( 0, $option);
		break;

	case 'edit':
		editGroup( intval( $cid[0] ), $option );
		break;

	case 'editA':
		editGroup( $id, $option );
		break;

	case 'save':
	case 'apply':
 		saveGroup( $option, $task );
		break;

	case 'remove':
		removeGroups( $cid, $option );
		break;

	case 'block':
		changeGroupBlock( $cid, 1, $option );
		break;

	case 'unblock':
		changeGroupBlock( $cid, 0, $option );
		break;

	case 'logout':
		logoutGroup( $cid, $option, $task );
		break;

	case 'flogout':
		logoutGroup( $id, $option, $task );
		break;

	case 'cancel':
		cancelGroup( $option );
		break;

	case 'listAL':
		showAccess( $option );
		break;

	case 'newAL':
		editAccess( -1, $option);
		break;

	case 'editAL':
		editAccess( intval( $cid[0] ), $option );
		break;

	case 'editALA':
		editAccess( $id, $option );
		break;
		
	case 'cancelAL':
		cancelAccess( $option );
		break;

	case 'saveAL':
	case 'applyAL':
 		saveAccess( $option, $task );
		break;

	case 'removeAL':
		removeAccesses( $cid, $option );
		break;

    case "saveConfig":
        saveConfig( $option );
        break;

    case "showConfig" :
        showConfig( $option );
        break;

    case "createLinkConfig" :
        createLinkConfig( $option );
        break;

	case 'about':
		showAbout( $option );
		break;
	case 'view':
	default:
		showGroups( $option );
		break;
}

function createLinkConfig( $option ) {
	global $my, $database, $_config;
	$Query = "Select id FROM `#__components` WHERE `option` = 'com_jaclplus' AND name = 'Configuration'";
	$database->setQuery($Query);
	if(!$database->loadResult()) {
		$Query = "Select id FROM `#__components` WHERE link = 'option=com_jaclplus'";
		$database->setQuery($Query);
		$parentid = $database->loadResult();
		$Query = "INSERT INTO `#__components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`) VALUES ('', 'Configuration', '', '0', '$parentid', 'option=com_jaclplus&task=showConfig', 'Configuration', 'com_jaclplus', '2', 'js/ThemeOffice/component.png', '0', '');";
		$database->setQuery($Query);
		$database->query();
	}
	mosRedirect("index2.php?option=$option&task=showConfig");
}

function showConfig( $option ) {
	global $my, $database, $_config;

	$lists = array();
	$lists['control_panel'] = mosHTML::yesnoRadioList( 'control_panel', '', $_config->getCfg('control_panel') );
	$lists['publish_frontpage'] = mosHTML::yesnoRadioList( 'publish_frontpage', '', $_config->getCfg('publish_frontpage') );
	$lists['edit_section'] = mosHTML::yesnoRadioList( 'edit_section', '', $_config->getCfg('edit_section') );
	$lists['edit_category'] = mosHTML::yesnoRadioList( 'edit_category', '', $_config->getCfg('edit_category') );
	$lists['show_ugstat'] = mosHTML::yesnoRadioList( 'show_ugstat', '', $_config->getCfg('show_ugstat') );
	$lists['show_alstat'] = mosHTML::yesnoRadioList( 'show_alstat', '', $_config->getCfg('show_alstat') );
	$lists['enable_jaclplus'] = mosHTML::yesnoRadioList( 'enable_jaclplus', '', $_config->getCfg('enable_jaclplus') );
	$lists['access'] = jaclplusMultiAccess( $_config->getCfg('publish_jaclplus') );
	$lists['limit_editown'] = mosHTML::yesnoRadioList( 'limit_editown', '', $_config->getCfg('limit_editown') );
	$lists['limit_edit'] = mosHTML::yesnoRadioList( 'limit_edit', '', $_config->getCfg('limit_edit') );
	$lists['require_publish'] = mosHTML::yesnoRadioList( 'require_publish', '', $_config->getCfg('require_publish') );
	$lists['edit_accessonly'] = mosHTML::yesnoRadioList( 'edit_accessonly', '', $_config->getCfg('edit_accessonly') );
	$lists['auto_disablecache'] = mosHTML::yesnoRadioList( 'auto_disablecache', '', $_config->getCfg('auto_disablecache') );
	$lists['admin_acltoany'] = mosHTML::yesnoRadioList( 'admin_acltoany', '', $_config->getCfg('admin_acltoany') );
    $_config->setCfg('jaclplus_version', '1.0.15a');	

	$alstype[] = mosHTML::makeOption( '0', _JACL_CFG_ALL );
	$alstype[] = mosHTML::makeOption( '1', _JACL_CFG_OWN );
	$alstype[] = mosHTML::makeOption( '2', _JACL_CFG_ALL_EXC );
	$alstype[] = mosHTML::makeOption( '3', _JACL_CFG_OWN_EXC );
	$alstype[] = mosHTML::makeOption( '4', _JACL_CFG_SPECIFIED );
	$lists['publish_alstype'] = mosHTML::selectList( $alstype, 'publish_alstype', 'class="inputbox" size="1"', 'value', 'text', $_config->getCfg('publish_alstype') );

	HTML_jaclplus::Configuration( $lists, $_config, $option );
}

function saveConfig( $option ) {
	global $_config;

    foreach($_POST as $key => $value) {
        $_config->setCfg($key, $value);
    } 

    if ($_config->saveConfig()) {
		removeACLCache();
        mosRedirect("index2.php?option=$option&task=showConfig", _JACLPLUS_CONFIG_UPDATED);
    } else {
        mosRedirect("index2.php?option=$option&task=showConfig", _JACLPLUS_CONFIG_ERROR);
    } 
}

function showAbout( $option )
{
    HTML_jaclplus::showAbout( $option );
}

function showGroups( $option ) {
	global $database, $my, $acl, $mainframe, $mosConfig_list_limit, $mosConfig_absolute_path, $_config;

	$limit 			= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 	= intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	$convertjaclplus = TRUE;
	
	// ensure group can't see group higher than themselves and 'Public Frontend', 'Public Backend'
	$ex_groups = $acl->get_group_children( $my->gid, 'ARO', 'RECURSE' );
	if (is_array( $ex_groups ) && count( $ex_groups ) > 0) {
		//array_push($ex_groups, '29', '30');
		array_push($ex_groups, '17', '28');
	} else {
		//$ex_groups = array('29', '30'); 
		$ex_groups = array('17', '28'); 
	}
	if( $my->gid != 25 ) $ex_groups[] = '25';
	if(!empty($exclude_group)) $ex_groups[] = $exclude_group;
		
	$query = "SELECT COUNT(group_id)"
	. "\n FROM #__core_acl_aro_groups "
	. "\n WHERE group_id NOT IN ( ".implode( ',', $ex_groups )." )";
	$database->setQuery( $query );
	$total = $database->loadResult();
	if ( $total <= $limit ) {
		$limitstart = 0;
	}

	require_once( $mosConfig_absolute_path . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );

	$group_rows = $acl->_getBelow( '#__core_acl_aro_groups', 'g1.group_id, g1.name, g1.parent_id, g1.jaclplus, COUNT(g2.name) AS level',
		'g1.name', null, 'USERS', false, $limitstart, $limit );

	// remove exclude groups
	$list = array();
	foreach ( $group_rows as $group_row) {
		if (!in_array( $group_row->group_id, $ex_groups )) {
			if($group_row->group_id <= 30) {
				$group_row->name .= " *";
			}
			if($convertjaclplus){
				if($group_row->group_id == 25)
					$group_row->jaclplus = _JACL_ALL_ACCESS_LEVELS;
				else
					$group_row->jaclplus = convertALS( $group_row->jaclplus );
			}
			if ($_config->getCfg('show_ugstat')) {
				$query = "SELECT COUNT(id)"
				. "\n FROM #__users WHERE gid = $group_row->group_id";
				$database->setQuery( $query );
				$group_row->numOfUsers = $database->loadResult();
			}
			$list[] = $group_row;
		}
	}
	
	// first pass get level limits
	$n = count( $list );
	$min = 3;//$list[0]->level;
	$max = $list[0]->level;
	for ($i=0; $i < $n; $i++) {
		//$min = min( $min, $list[$i]->level );
		$max = max( $max, $list[$i]->level );
	}

	$indents = array();
	foreach (range( $min, $max ) as $i) {
		$indents[$i] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	// correction for first indent
	$indents[$min] = '';

	for ($i=0; $i < $n; $i++) {
		$shim = '';
		foreach (range( $min, $list[$i]->level ) as $j) {
			$shim .= $indents[$j];
		}
		$twist = "-&nbsp;";
		$list[$i]->name = $shim.$twist.$list[$i]->name;
	}

	HTML_jaclplus::showGroups( $list, $pageNav, $option );
}

function convertALS( $jaclplus ) {
	global $database;
	$query = "SELECT name FROM #__groups WHERE id IN ( $jaclplus )";
	$database->setQuery( $query );
	$groups = $database->loadResultArray();
	if(empty($groups)) {
		return "";
	} else {
		return implode( ", ", $groups );
	}
}

function getGroupList( $convertjaclplus=false, $exclude_group='' ) {
	global $database, $my, $acl, $mainframe;

	// ensure group can't see group higher than themselves and 'Public Frontend', 'Public Backend'
	$ex_groups = $acl->get_group_children( $my->gid, 'ARO', 'RECURSE' );
	if (is_array( $ex_groups ) && count( $ex_groups ) > 0) {
		//array_push($ex_groups, '29', '30');
		array_push($ex_groups, '17', '28');
	} else {
		//$ex_groups = array('29', '30'); 
		$ex_groups = array('17', '28'); 
	}
	if( $my->gid != 25 ) $ex_groups[] = '25';
	if(!empty($exclude_group)) $ex_groups[] = $exclude_group;
		
	$group_rows = $acl->_getBelow( '#__core_acl_aro_groups', 'g1.group_id, g1.name, g1.parent_id, g1.jaclplus, COUNT(g2.name) AS level',
		'g1.name', null, 'USERS', false );

	// remove exclude groups
	$list = array();
	foreach ( $group_rows as $group_row) {
		if (!in_array( $group_row->group_id, $ex_groups )) {
			if($group_row->group_id <= 30) {
				$group_row->name .= " *";
			}
			if($convertjaclplus){
				$group_row->jaclplus = convertALS( $group_row->jaclplus );
			}
			$list[] = $group_row;
		}
	}
	
	// first pass get level limits
	$n = count( $list );
	$min = $list[0]->level;
	$max = $list[0]->level;
	for ($i=0; $i < $n; $i++) {
		$min = min( $min, $list[$i]->level );
		$max = max( $max, $list[$i]->level );
	}

	$indents = array();
	foreach (range( $min, $max ) as $i) {
		$indents[$i] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	// correction for first indent
	$indents[$min] = '';

	for ($i=0; $i < $n; $i++) {
		$shim = '';
		foreach (range( $min, $list[$i]->level ) as $j) {
			$shim .= $indents[$j];
		}
		$twist = "-&nbsp;";
		$list[$i]->name = $shim.$twist.$list[$i]->name;
	}
	return $list;
}

function editGroup( $gid='0', $option='com_jaclplus' ) {
	global $database, $my, $acl, $mainframe, $_config;

	$ex_groups = $acl->get_group_children( $my->gid, 'ARO', 'RECURSE' );
	if (count($ex_groups)>0) {
		//array_push($ex_groups, '29', '30');
		array_push($ex_groups, '17', '28');
	} else {
		//$ex_groups = array('29', '30'); 
		$ex_groups = array('17', '28'); 
	}
	if ( $my->gid != 25 ) $ex_groups[] = '25';
	// check to ensure only super admins can edit super admin info
	if ( ( $my->gid != 25 ) && ( in_array( $gid, $ex_groups ) ) ) {
		mosRedirect( 'index2.php?option='.$option, _NOT_AUTH );
	}

	// load the row from the db table
	$row = $acl->get_group_data( $gid );
	if(empty($row)){
		$row->jaclplus = '0,1';
		$row->name = '';
		$row->group_id = '';
		$row->parent_id = '18';
	} else {
		$subtask 	= strval( mosGetParam( $_REQUEST, 'subtask', '' ) );
		switch ($subtask) {
			case 'editACL':
				editGroupACL( $row, $option);
				break;
			case 'addACL':
				saveGroupACL( $row, $option);
				break;
			case 'removeACL':
				removeGroupACL( $row, $option);
				break;
			default:
				break;
		}
	}

	// build the html select list for the group access levels
	$lists['access'] 	= jaclplusMultiAccess( $row->jaclplus );
	if( !empty($gid) && $gid <= 30 ){
		$lists['name'] = '<input type="hidden" name="name" value="'. htmlentities( $row->name ) .'" /><strong>'. $row->name .'</strong> '._JACL_G_DEFAULT;
		$lists['parent_id'] 	= $acl->get_group_name( $row->parent_id );
	}else{
		$lists['name'] = '<input type="text" name="name" class="inputbox" size="40" value="'. htmlentities( $row->name ) .'" />';
		$parentids = getGroupList( false, $row->group_id );
		$lists['parent_id'] 	= mosHTML::selectList( $parentids, 'parent_id', 'class="inputbox" size="1"', 'group_id', 'name', intval( $row->parent_id ) );
	}

	if ( $row->group_id < 1 ) {
		$inheritfrom = array();
		$inheritfrom[] = mosHTML::makeOption( '0', 'None' );
		$inheritfrom[] = mosHTML::makeOption( '-1', 'Parent Group' );
		$inheritfrom[] = mosHTML::makeOption( $my->gid, 'My Group' );
		$inheritoptions = getGroupList( false, $my->gid );
		foreach ($inheritoptions as $inheritoption) {
			$inheritfrom[] = mosHTML::makeOption( $inheritoption->group_id, $inheritoption->name );
		}
   		$lists['inheritfrom'] = mosHTML::selectList( $inheritfrom, 'inheritfrom', 'class="inputbox" size="1"', 'value', 'text', '0' );
	}
	HTML_jaclplus::editGroup( $row, $option, $gid, $lists );
}

function showGroupACL( &$row, $option ) {
	global $database, $_config;
	
	if($row->group_id == '29' || $row->group_id == '30') {
		return;
	}
	
	$query = "SELECT * FROM #__jaclplus WHERE aro_value = '".strtolower($row->name)."' ORDER BY aco_section, aco_value, axo_section, axo_value";
	$database->setQuery( $query );
	$rows = $database->loadObjectList();

	$aco_section = array();
	$aco_section[] = mosHTML::makeOption( '', 'null' );

   	$lists['aco_section'] = mosHTML::selectList( $aco_section, 'aco_section', 'class="inputbox" size="1" style="width:100px;"', 'value', 'text', 'action' );

	$aco_value = array();
	$aco_value[] = mosHTML::makeOption( '', 'null' );

   	$lists['aco_value'] = mosHTML::selectList( $aco_value, 'aco_value', 'class="inputbox" size="1" style="width:100px;"', 'value', 'text', 'add' );

	$axo_section = array();
	$axo_section[] = mosHTML::makeOption( '', 'null' );

   	$lists['axo_section'] = mosHTML::selectList( $axo_section, 'axo_section', 'class="inputbox" size="1" style="width:100px;"', 'value', 'text', '' );

	$axo_value = array();
	$axo_value[] = mosHTML::makeOption( '', 'null' );

   	$lists['axo_value'] = mosHTML::selectList( $axo_value, 'axo_value', 'class="inputbox" size="1" style="width:120px;"', 'value', 'text', '' );

	$yes_no = array();
	$yes_no[] = mosHTML::makeOption( '0', 'No' );
	$yes_no[] = mosHTML::makeOption( '1', 'Yes' );

   	$lists['yes_no'] = mosHTML::selectList( $yes_no, 'yes_no', 'class="inputbox" size="1"', 'value', 'text', 0 );
   	$lists['yes_no2'] = mosHTML::selectList( $yes_no, 'yes_no2', 'class="inputbox" size="1"', 'value', 'text', 0 );

	$lists['JavaScript'] = 'addListGroup("chainedmenu", "ACL-Select");'."\n";
	
	$lists['JavaScript'] .= "\t".'addOption("ACL-Select", "-Select-", "-1", 1); //HEADER OPTION'."\n";
	$query = "SELECT DISTINCT aco_section FROM #__jaclplus ORDER BY aco_section";
	$database->setQuery( $query );
	$axo_options = $database->loadRowList();
	foreach ($axo_options as $axo_option) {
		$lists['JavaScript'] .= "\t".'addList("ACL-Select", "'.$axo_option[0].'", "'.$axo_option[0].'", "acl_'.$axo_option[0].'");'."\n";
		$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
		$query2 = "SELECT DISTINCT aco_value FROM #__jaclplus WHERE aco_section = '".$axo_option[0]."' ORDER BY aco_value";
		$database->setQuery( $query2 );
		$axo_options2 = $database->loadRowList();
		foreach ($axo_options2 as $axo_option2) {
			$lists['JavaScript'] .= "\t".'addList("acl_'.$axo_option[0].'", "'.$axo_option2[0].'", "'.$axo_option2[0].'", "acl_'.$axo_option[0].'_'.$axo_option2[0].'");'."\n";
			$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
			$query3 = "SELECT DISTINCT axo_section FROM #__jaclplus WHERE aco_value = '".$axo_option2[0]."' AND aco_section = '".$axo_option[0]."' ORDER BY axo_section";
			$database->setQuery( $query3 );
			$axo_options3 = $database->loadRowList();
			if(is_array($axo_options3)){
				if(isset($axo_option3['axo_section'])) {
					if (in_array(array("0"=>"content", "axo_section"=>"content"), $axo_options3) && !in_array(array("0"=>"section", "axo_section"=>"section"), $axo_options3)){
						$axo_options3[] = array("0"=>"section", "axo_section"=>"section");
					}
					if (in_array(array("0"=>"content", "axo_section"=>"content"), $axo_options3) && !in_array(array("0"=>"category", "axo_section"=>"category"), $axo_options3)){
						$axo_options3[] = array("0"=>"category", "axo_section"=>"category");
					}
				} else {
					if (in_array(array("0"=>"content"), $axo_options3) && !in_array(array("0"=>"section"), $axo_options3)){
						$axo_options3[] = array("0"=>"section");
					}
					if (in_array(array("0"=>"content"), $axo_options3) && !in_array(array("0"=>"category"), $axo_options3)){
						$axo_options3[] = array("0"=>"category");
					}
				}
			}
			foreach ($axo_options3 as $axo_option3) {
				$lists['JavaScript'] .= "\t".'addList("acl_'.$axo_option[0].'_'.$axo_option2[0].'", "'.($axo_option3[0] ? $axo_option3[0] : "null").'", "'.$axo_option3[0].'", "acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'");'."\n";
				switch ($axo_option3[0]) {
					case "components":
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "all", "all");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_dbadmin", "com_dbadmin");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_languages", "com_languages");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_massmail", "com_massmail");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_menumanager", "com_menumanager");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_templates", "com_templates");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_trash", "com_trash");'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "com_users", "com_users");'."\n";
						if(!isset($components4)) { 
							$query4 = "SELECT DISTINCT `option`  FROM `#__components` WHERE `option` != '' ORDER BY `option`";
							$database->setQuery( $query4 );
							$components4 = $database->loadRowList();
						}
						$axo_options4 = $components4;
						foreach ($axo_options4 as $axo_option4) {
							$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "'.$axo_option4[0].'", "'.$axo_option4[0].'");'."\n";
						}
						break;
					case "content":
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "all", "all");'."\n";
						if($axo_option2[0]!="add"){
							$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "own", "own");'."\n";
							if(!isset($content4)) {
								$query4 = "SELECT id, title FROM `#__content` WHERE `id` > 0 AND access IN ($row->jaclplus) ORDER BY `id` DESC ";
								$database->setQuery( $query4, 0, $_config->getCfg('content_limit') );
								$content4 = $database->loadRowList();
							}
							$axo_options4 = $content4;
							foreach ($axo_options4 as $axo_option4) {
								if(strlen($axo_option4[1])> 18){
									$option_text = $axo_option4[0].':'.substr($axo_option4[1],0,15).'...';
								}else{
									$option_text = $axo_option4[0].':'.$axo_option4[1];
								}
								$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "'.addslashes(str_replace("\n", "",$option_text)).'", "'.$axo_option4[0].'");'."\n";
							}
						}
						break;
					case "section":
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
						if(!isset($section4)) {
							$query4 = "SELECT id, title FROM `#__sections` WHERE `id` > 0 AND access IN ($row->jaclplus) ORDER BY `id` DESC ";
							$database->setQuery( $query4, 0, $_config->getCfg('section_limit') );
							$section4 = $database->loadRowList();
						}
						$axo_options4 = $section4;
						foreach ($axo_options4 as $axo_option4) {
							if(strlen($axo_option4[1])> 18){
								$option_text = $axo_option4[0].':'.substr($axo_option4[1],0,15).'...';
							}else{
								$option_text = $axo_option4[0].':'.$axo_option4[1];
							}
							$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "'.addslashes(str_replace("\n", "",$option_text)).'", "'.$axo_option4[0].'");'."\n";
						}
						$got_section = true;
						break;
					case "category":
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
						if(!isset($category4)) {
							$query4 = "SELECT id, title, section FROM `#__categories` WHERE `id` > 0 AND access IN ($row->jaclplus) ORDER BY `id` DESC ";
							$database->setQuery( $query4, 0, $_config->getCfg('category_limit') );
							$category4 = $database->loadRowList();
						}
						$axo_options4 = $category4;
						foreach ($axo_options4 as $axo_option4) {
							if(is_numeric($axo_option4[2])){
								if(strlen($axo_option4[1])> 18){
									$option_text = $axo_option4[0].':'.substr($axo_option4[1],0,15).'...';
								}else{
									$option_text = $axo_option4[0].':'.$axo_option4[1];
								}
								$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "'.addslashes(str_replace("\n", "",$option_text)).'", "'.$axo_option4[0].'");'."\n";
							}
						}
						$got_section = true;
						break;
					default:
						$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "-Select-", "-1", 1); //HEADER OPTION'."\n";
						$query4 = "SELECT DISTINCT axo_value FROM #__jaclplus WHERE ".($axo_option3[0] ? "axo_section = '".$axo_option3[0]."'" : "axo_section IS NULL")." ORDER BY axo_value";
						$database->setQuery( $query4 );
						$axo_options4 = $database->loadRowList();
						foreach ($axo_options4 as $axo_option4) {
							$lists['JavaScript'] .= "\t".'addOption("acl_'.$axo_option[0].'_'.$axo_option2[0].'_'.$axo_option3[0].'", "'.($axo_option4[0] ? $axo_option4[0] : "null").'", "'.$axo_option4[0].'");'."\n";
						}
						break;
				}
			}
		}
	}

	HTML_jaclplus::showGroupACL( $rows, $row, $lists, $option );
}

function editGroupACL( &$row, $option ) {
	global $database;
	if (jaclplus_check( $row->group_id )) {
		$aclid 	= intval( mosGetParam( $_REQUEST, 'aclid', 0 ) );
		$value 	= intval( mosGetParam( $_REQUEST, 'myvalue', 0 ) );
		if($aclid >0) {
			$query = "UPDATE #__jaclplus SET enable = '".( $value ? 0 : 1)  ."' WHERE id = ".$aclid;
			$database->setQuery( $query );
			$result = $database->query();
			if(!$result){
				mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_EDIT );
			}
			removeACLCache();
		}
	} else {
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_NOT_ALLOW );
	}
}

function removeGroupACL( &$row, $option ) {
	global $database;
	if (jaclplus_check( $row->group_id )) {
		$aclid 	= intval( mosGetParam( $_REQUEST, 'aclid', 0 ) );
		$value 	= intval( mosGetParam( $_REQUEST, 'myvalue', 0 ) );
		$aro_value = strtolower($row->name);
		if($aclid >0) {
			$query = "DELETE FROM #__jaclplus WHERE id = ".$aclid." AND aro_value = '".$aro_value."' AND enable = '".( $value ? 1 : 0)."'";
			$database->setQuery( $query );
			$result = $database->query();
			if(!$result){
				mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_DELETE );
			}
			removeACLCache();
		}
	} else {
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_NOT_ALLOW );
	}
}

function saveGroupACL( &$row, $option ) {
	global $database, $my, $acl, $_config;
	if (jaclplus_check( $row->group_id )) {
		$aco_section = strval( mosGetParam( $_REQUEST, 'aco_section2', '' ) );
		$aco_value = strval( mosGetParam( $_REQUEST, 'aco_value2', '' ) );
		//$aro_section = strval( mosGetParam( $_REQUEST, 'aro_section', 'users' ) );
		$aro_section = 'users';
		$aro_value = strtolower($row->name);
		$axo_section = strval( mosGetParam( $_REQUEST, 'axo_section2', '' ) );
		$axo_value = strval( mosGetParam( $_REQUEST, 'axo_value2', '' ) );
		$yes_no = intval( mosGetParam( $_REQUEST, 'yes_no2', 0 ) );
		//check duplicate here
		$query = "SELECT id FROM #__jaclplus WHERE "
		."aco_section ='".$aco_section."' AND "
		."aco_value ='".$aco_value."' AND "
		."aro_section ='".$aro_section."' AND "
		."aro_value ='".$aro_value."' AND "
		.( $axo_section ? "axo_section ='".$axo_section."' AND " : "axo_section IS NULL AND " )
		.( $axo_value ? "axo_value ='".$axo_value."' " : "axo_value IS NULL ");
		$database->setQuery( $query );
		if($database->loadResult() > 0) { //found one similar exit
			mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_DUPLICATED );
		}
		// only allow to add ACL that user have and enabled
		if($axo_section=="section" || $axo_section=="category" || $axo_section=="content") {
			$query = "SELECT id FROM #__jaclplus WHERE "
			."aco_section ='".$aco_section."' AND "
			."aco_value ='".$aco_value."' AND "
			."aro_section ='".$aro_section."' AND "
			."aro_value ='".strtolower( $acl->get_group_name( $my->gid ) )."' AND "
			."(( axo_section ='".$axo_section."' AND axo_value ='".$axo_value."') OR "
			."( axo_section ='content' AND axo_value ='all')) ";
			// allow super administrator to add disabled ACL as long as the ACL is exist in super administrator list
			if ( $my->gid != 25 ) $query .= "AND enable=1 "; 
		} else {
			$query = "SELECT id FROM #__jaclplus WHERE "
			."aco_section ='".$aco_section."' AND "
			."aco_value ='".$aco_value."' AND "
			."aro_section ='".$aro_section."' AND "
			."aro_value ='".strtolower( $acl->get_group_name( $my->gid ) )."' AND "
			.( $axo_section ? "axo_section ='".$axo_section."' AND " : "axo_section IS NULL AND " )
			.( $axo_value ? "axo_value ='".$axo_value."' " : "axo_value IS NULL ");
			// allow super administrator to add disabled ACL as long as the ACL is exist in super administrator list
			if ( $my->gid != 25 ) $query .= "AND enable=1 "; 
		}
		$database->setQuery( $query );
		if($database->loadResult() > 0) { //okay allow - found one similar and enabled
			//if ($row->group_id != 25) { // for non super administrator group and skipped for super administrator group
				$query = "INSERT INTO #__jaclplus SET aco_section = '".$aco_section."', "
				."aco_value = '".$aco_value."', "
				."aro_section = '".$aro_section."', "
				."aro_value = '".$aro_value."', "
				.( $axo_section ? "axo_section = '".$axo_section."', " : "axo_section = NULL, " )
				.( $axo_value ? "axo_value = '".$axo_value."', " : "axo_value = NULL, ")
				."enable = '".( $yes_no ? 1 : 0)  ."'";
				$database->setQuery( $query );
				if(!$database->query()){
					mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_ADD );
				}
				removeACLCache();
			//} else {
				//mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_DUPLICATED );	
			//}
		} else {
			//allow super administrator to add new ACL type 
			$allowsuperadmin = false;
			if( $_config->getCfg('admin_acltoany') ) {
				if ($my->gid == 25) $allowsuperadmin = true;
			} else {
				if ($my->gid == 25 && $row->group_id == 25) $allowsuperadmin = true;
			}
			if ( $allowsuperadmin ) { // to any group
				$query = "INSERT INTO #__jaclplus SET aco_section = '".$aco_section."', "
				."aco_value = '".$aco_value."', "
				."aro_section = '".$aro_section."', "
				."aro_value = '".$aro_value."', "
				.( $axo_section ? "axo_section = '".$axo_section."', " : "axo_section = NULL, " )
				.( $axo_value ? "axo_value = '".$axo_value."', " : "axo_value = NULL, ")
				."enable = '".( $yes_no ? 1 : 0)  ."'";
				$database->setQuery( $query );
				if(!$database->query()){
					mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_ADD );
				}
				removeACLCache();
			} else {
				mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_DONT_HAVE );
			}
		}
	} else {
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_NOT_ALLOW );
	}
}

function saveGroup( $option, $task ) {
	global $database, $my, $acl;
	global $mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_sitename;

	$row = new stdClass();
	$row->group_id = intval( mosGetParam( $_POST, 'id', 0 ) );
	$isNew 	= !$row->group_id;
	$row->name = strval( mosGetParam( $_POST, 'name', '' ) );
	if (empty($row->name)) {
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_G_INVALID_NAME );
	}
	$old_name = $acl->get_group_name($row->group_id);
	// prevent duplicated name
	if( $old_name != $row->name ){
		if ($acl->get_group_id($row->name)) {
			mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_G_INVALID_NAME2 );
		}
	}
	$row->parent_id = intval( mosGetParam( $_POST, 'parent_id', 18 ) ); //parent id: 18 - Registered; 29 - Public Frontend
	
	if ($row->parent_id == 25 && $my->gid != 25 ){
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_G_INVALID_PARENT_ID );
	}
	
	// save access levels
	$access = mosGetParam( $_POST, 'access', '' );
	if (is_array( $access )) {
		$row->jaclplus = strval( implode( ",", $access ) );
	}else{
		$row->jaclplus = strval( mosGetParam( $_POST, 'jaclplus', '' ) );
	}
	if(strlen($row->jaclplus)<1){
		mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_G_INVALID_ACCESS_LEVEL );
	}
	
	if ($isNew) {
		$result = $acl->add_group($row->name, $row->parent_id, 'ARO', $row->jaclplus);
		if($result){
			$row->group_id = $result;
			$inheritfrom = intval( mosGetParam( $_POST, 'inheritfrom', '0' ) );
			if ($inheritfrom == -1) {
				$errorcount = inheritACL( $row->parent_id, $row->group_id );
			} else if ($inheritfrom > 0) {
				$errorcount = inheritACL( $inheritfrom, $row->group_id );
			} else {
				$errorcount = 0;
			}
		}else{
			mosRedirect( 'index2.php?option='. $option, _JACL_G_FAIL_CREATE );
		}
	} else {
		if($row->group_id <= 30){
			$result = $acl->edit_group($row->group_id, NULL, NULL, 'ARO', $row->jaclplus);
		}else{
			$result = $acl->edit_group($row->group_id, $row->name, $row->parent_id, 'ARO', $row->jaclplus);
			if($old_name!=$row->name){
				//update ACL table as well if name change
				$query = "UPDATE #__jaclplus SET aro_value = '". strtolower( $row->name ) ."' WHERE aro_value = '". strtolower( $old_name )."'";
				$database->setQuery( $query );
				$result = $database->query();
				/* if(!$result){
					mosRedirect( 'index2.php?option='. $option .'&task=editA&id='. $row->group_id. '&hidemainmenu=1', _JACL_ACL_FAIL_EDIT );
				} */
			}
		}
	}

	switch ( $task ) {
		case 'apply':
			if($result){
				$msg = _JACL_G_SAVE_PASS. $row->name;
			}else{
				$msg = _JACL_G_SAVE_FAIL. $row->name;
			}
			mosRedirect( 'index2.php?option='.$option.'&task=editA&id='. $row->group_id. '&hidemainmenu=1', $msg );
			break;

		case 'save':
		default:
			if($result){
				$msg = _JACL_G_SAVE_PASS. $row->name;
			}else{
				$msg = _JACL_G_SAVE_FAIL. $row->name;
			}
			mosRedirect( 'index2.php?option='.$option, $msg );
			break;
	}
}

function cancelGroup( $option ) {
	mosRedirect( 'index2.php?option='. $option .'&task=view' );
}

function removeGroups( $cid, $option ) {
	global $database, $acl, $my;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		mosRedirect( 'index2.php?option='. $option, _JACL_SELECT_DELETE_ITEM );
	}

	if ( count( $cid ) ) {
		foreach ($cid as $gid) {
			// check for default groups
			if ( $gid <= 30 ) {
				$msg = _JACL_G_DELETE_DEFAULT;
 			} else if ( $gid == $my->gid ){
 				$msg = _JACL_G_DELETE_YOURS;
			} else {
				$old_name = $acl->get_group_name($gid);
				if($acl->del_group($gid)){
					$Queries = array();
					//$Queries[] = "UPDATE #__session SET gid = '18' WHERE gid = $gid";
					$Queries[] = "DELETE FROM #__session WHERE gid = $gid"; // logout group users
					$Queries[] = "UPDATE #__users SET gid = '18' WHERE gid = $gid";
					$Queries[] = "UPDATE #__core_acl_groups_aro_map SET group_id = '18' WHERE group_id = $gid";
					foreach( $Queries as $Query ) {
						$database->setQuery($Query);
						if (!$database->query()) {
							$echostr = $database->getErrorMsg()."<br/>\n";
							echo $echostr;
						}
					}

					$msg = _JACL_G_DELETE_PASS;
					//delete ACL table as well
					$query = "DELETE FROM #__jaclplus WHERE aro_value = '". strtolower( $old_name )."'";
					$database->setQuery( $query );
					$result = $database->query();
					if(!$result){
						$msg .= _JACL_G_DELETE_FAIL_ACL;
					}
				}else{
					$msg = _JACL_G_DELETE_FAIL;
				}
			}
		}
	}

	mosRedirect( 'index2.php?option='. $option, $msg );
}

function changeGroupBlock( $cid=null, $block=1, $option ) {
	global $database;

	if (count( $cid ) < 1) {
		$action = $block ? _JACL_BLOCK : _JACL_UNBLOCK;
		mosRedirect( 'index2.php?option='. $option, _JACL_SELECT_ITEM_TO.$action );
	}

	$cids = implode( ',', $cid );

	$query = "UPDATE #__groups"
	. "\n SET block = $block"
	. "\n WHERE id IN ( $cids )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		mosRedirect( 'index2.php?option='. $option, $database->getErrorMsg() );
	}

	mosRedirect( 'index2.php?option='. $option );
}

function logoutGroup( $cid=null, $option, $task ) {
	global $database, $my;

	$cids = $cid;
	if ( is_array( $cid ) ) {
		if (count( $cid ) < 1) {
			mosRedirect( 'index2.php?option='. $option, _JACL_ITEM_TO_LOGOUT );
		}
		$cids = implode( ',', $cid );
	}

	$query = "DELETE FROM #__session"
 	. "\n WHERE gid IN ( $cids )"
 	;
	$database->setQuery( $query );
	$database->query();

	switch ( $task ) {
		case 'flogout':
			mosRedirect( 'index2.php', $database->getErrorMsg() );
			break;

		default:
			mosRedirect( 'index2.php?option='. $option, $database->getErrorMsg() );
			break;
	}
}

function showAccess( $option ) {
	global $database, $my, $acl, $mainframe, $mosConfig_list_limit, $mosConfig_absolute_path, $_config;

	$limit 			= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 	= intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );

	$query = "SELECT COUNT(id)"
	. "\n FROM #__groups";
	$database->setQuery( $query );
	$total = $database->loadResult();
	if ( $total <= $limit ) {
		$limitstart = 0;
	}

	require_once( $mosConfig_absolute_path . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );

	$query = "SELECT id, name"
	. "\n FROM #__groups"
	. "\n ORDER BY id"
	;
	$database->setQuery( $query, $limitstart, $limit );
	$groups = $database->loadObjectList();

	HTML_jaclplus::showAccess( $groups, $pageNav, $option );
}

function editAccess( $aid='-1', $option='com_jaclplus' ) {
	global $database, $my, $acl, $mainframe;

	// check to ensure only super admins can manage access level
	/* if ( $my->gid != 25 ) {
		mosRedirect( 'index2.php?option='.$option, _NOT_AUTH );
	} */

	if( $aid != -1 && $aid <= 2 ){
		$msg = _JACL_A_DEFAULT;
		mosRedirect( 'index2.php?option='. $option .'&task=listAL', $msg );
	}
	
	$query = "SELECT name"
	. "\n FROM #__groups"
	. "\n WHERE id = '".$aid."'"
	. "\n ORDER BY id"
	;
	$database->setQuery( $query );
	$name = $database->loadResult();

	$lists['name'] = '<input type="text" name="name" class="inputbox" size="40" value="'. htmlentities( $name ) .'" />';

	HTML_jaclplus::editaccess( $option, $aid, $lists );
}

function cancelAccess( $option ) {
	mosRedirect( 'index2.php?option='. $option .'&task=listAL' );
}

function saveAccess( $option, $task ) {
	global $database, $my, $acl;

	$row = new stdClass();
	$row->name = strval( mosGetParam( $_POST, 'name', NULL ) );
	if (empty($row->name)) {
		mosRedirect( 'index2.php?option='. $option .'&task=listAL', _JACL_A_INVALID_NAME );
	}
	$row->id = intval( mosGetParam( $_POST, 'id', -1 ) );
	if($row->id == -1){
		$isNew 	= true;
	}else if ($row->id < 2) {
		mosRedirect( 'index2.php?option='. $option .'&task=listAL', _JACL_A_INVALID_ID );
	}else{
		$isNew 	= false;
	}

	if ($isNew) {
		$database->setQuery( "SELECT MAX(id)+1 FROM #__groups" );
		$row->id = intval( $database->loadResult() );
		if ($row->id < 99) { //as limited by Joomla!
			$query = "INSERT INTO #__groups"
			. "\n SET id = '$row->id', name = '$row->name'"
			;
			$database->setQuery( $query );
			$result = $database->query();
			if(!$result){
				mosRedirect( 'index2.php?option='. $option .'&task=listAL', _JACL_A_FAIL_CREATE );
			}
			// Update super administrator access levels
			$database->setQuery( "SELECT jaclplus FROM #__core_acl_aro_groups WHERE group_id = '25'" );
			$jaclplus = $database->loadResult();
			if(empty($jaclplus)) {
				$jaclplus = $row->id;
			}else{
				$jaclplus = $jaclplus.",".$row->id;
			}
			$database->setQuery( "UPDATE #__core_acl_aro_groups SET jaclplus = '$jaclplus' WHERE group_id = '25'");
			$result = $database->query();
		} else {
			$result = false;
			$row->name = _JACL_A_REACH_MAX;
		}
	} else {
		$database->setQuery( "UPDATE #__groups SET name = '$row->name' WHERE id = $row->id");
		$result = $database->query();
	}

	switch ( $task ) {
		case 'applyAL':
			if($result){
				$msg = _JACL_A_SAVE_PASS. $row->name;
			}else{
				$msg = _JACL_A_SAVE_FAIL. $row->name;
			}
			mosRedirect( 'index2.php?option='. $option .'&task=editALA&hidemainmenu=1&id='.$row->id, $msg );
			break;

		case 'saveAL':
		default:
			if($result){
				$msg = _JACL_A_SAVE_PASS. $row->name;
			}else{
				$msg = _JACL_A_SAVE_FAIL. $row->name;
			}
			mosRedirect( 'index2.php?option='. $option .'&task=listAL', $msg );
			break;
	}
}

function removeAccesses( $cid, $option ) {
	global $database, $acl, $my;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		mosRedirect( 'index2.php?option='. $option .'&task=listAL', _JACL_SELECT_DELETE_ITEM );
	}

	if ( count( $cid ) ) {
		foreach ($cid as $aid) {
			// check for default groups
			if ( $aid <= 2 ) {
				$msg = _JACL_A_DELETE_DEFAULT;
			} else {
				$database->setQuery( "SELECT group_id, jaclplus FROM #__core_acl_aro_groups WHERE jaclplus LIKE '%$aid%'" );
				$rows = $database->loadObjectList();
				foreach ($rows as $row) {
					$jaclplusarray = explode(",", $row->jaclplus);
					$i = 0;
					$result = count( $jaclplusarray );
					while ($i < $result) {
						if (intval($jaclplusarray[$i]) == $aid) {
							array_splice( $jaclplusarray, $i, 1 );
						} else {
							$i++;
						}
					}
					if(count( $jaclplusarray )>0){
						$new_jaclplus = implode(",", $jaclplusarray);
					}else{
						$new_jaclplus = '0';
					}
					if($new_jaclplus != $row->jaclplus){
						$database->setQuery( "UPDATE #__core_acl_aro_groups SET jaclplus = '$new_jaclplus' WHERE group_id = $row->group_id");
						$result = $database->query();
					}
				}
				$database->setQuery( "DELETE FROM #__groups WHERE id = $aid" );
				if($database->query()){
					$Queries = array();
					$Queries[] = "UPDATE #__categories SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__contact_details SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__content SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__mambots SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__menu SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__modules SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__polls SET access = '2' WHERE access = $aid";
					$Queries[] = "UPDATE #__sections SET access = '2' WHERE access = $aid";
					foreach( $Queries as $Query ) {
						$database->setQuery($Query);
						if (!$database->query()) {
							$echostr = $database->getErrorMsg()."<br/>\n";
							echo $echostr;
						}
					}
					$msg = _JACL_A_DELETE_PASS;
				}else{
					$msg = _JACL_A_DELETE_FAIL;
				}
			}
		}
	}

	mosRedirect( 'index2.php?option='. $option .'&task=listAL', $msg );
}

/**
* build the select list for multi access levels
*/
function jaclplusMultiAccess( $jaclplus ) {
	global $database;

	$jaclplusarray = explode( ",", $jaclplus );
	$i = 0;
	$result = count($jaclplusarray);
	while($i < $result){
		$jaclpluslists[$i] = new stdClass();
		$jaclpluslists[$i]->value = $jaclplusarray[$i];
		$i++;
	}

	$query = "SELECT id AS value, name AS text"
	. "\n FROM #__groups"
	. "\n ORDER BY id"
	;
	$database->setQuery( $query );
	$groups = $database->loadObjectList();
	$access = mosHTML::selectList( $groups, 'access', 'class="inputbox" size="8" multiple="true"', 'value', 'text', $jaclpluslists );

	return $access;
}

function jaclplus_check( $gid ) {
	global $database, $my, $acl;

	$ex_groups = $acl->get_group_children( $my->gid, 'ARO', 'RECURSE' );
	if (count($ex_groups)>0) {
		//array_push($ex_groups, '29', '30');
		array_push($ex_groups, '17', '28', '29', '30');
	} else {
		//$ex_groups = array( '29', '30'); 
		$ex_groups = array( '17', '28', '29', '30'); 
	}
	if ( $my->gid != 25 ) {
		array_push($ex_groups, '25', $my->gid); //not allow to edit own group as well
	}
	// check to ensure only super admins can edit super admin info
	if ( ( $my->gid != 25 ) && ( in_array( $gid, $ex_groups ) ) ) {
		//mosRedirect( 'index2.php?option='.$option, _NOT_AUTH );
		return false;
	}
	return true;
}

function inheritACL( $gid, $inherit_gid ) {
	global $database, $acl, $my;
	
	$query = "SELECT * FROM #__jaclplus WHERE aro_value ='".strtolower( $acl->get_group_name( $gid ) )."' ";
	if ($my->gid != 25) $query .= "AND enable=1 "; 
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	$inherit_group_name = strtolower( $acl->get_group_name( $inherit_gid ) );
	$status = 0;
	for ($i=0, $n=count( $rows ); $i < $n; $i++) {
		$row 	=& $rows[$i];
		$query = "INSERT INTO #__jaclplus SET aco_section = '".$row->aco_section."', "
			."aco_value = '".$row->aco_value."', "
			."aro_section = '".$row->aro_section."', "
			."aro_value = '".$inherit_group_name."', " //to new user
			.( $row->axo_section ? "axo_section = '".$row->axo_section."', " : "axo_section = NULL, " )
			.( $row->axo_value ? "axo_value = '".$row->axo_value."', " : "axo_value = NULL, ")
			."enable = '".( $row->enable ? 1 : 0)  ."'";
		$database->setQuery( $query );
		if(!$database->query()){
			$status++;
		}
	}
	return $status; // 0 for no error or ACL inherited
}

function AccessStats( $aid ) {
	global $database;

	$Queries = array();
	$Queries[] = "SELECT COUNT(*) FROM #__sections WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__categories WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__content WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__contact_details WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__mambots WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__menu WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__modules WHERE access = $aid";
	$Queries[] = "SELECT COUNT(*) FROM #__polls WHERE access = $aid";
	$Stats = array();
	foreach( $Queries as $Query ) {
		$database->setQuery($Query);
		$Stats[] = $database->loadResult();
	}
	return $Stats;
}

function removeACLCache() {
	mosCache::cleanCache( 'com_content' );
	mosCache::cleanCache( 'com_jaclplus' );
}
?>