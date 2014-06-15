<?php
/******************************************************************/
/* Title........: JACLPlus Component for Joomla! 1.0.15 Stable
/* Description..: Joomla! ACL Enhancements Component for Joomla! 1.0.15 Stable
/* Author.......: Vincent Cheah
/* Version......: 1.0.15 (For Joomla! 1.0.15 Stable ONLY)
/* Created......: 27/02/2008
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

//IN ADMIN.JACLPLUS.PHP
DEFINE('_JACL_G_DEFAULT','* Default Group. Can not be deleted or renamed!');
DEFINE('_JACL_G_INVALID_NAME','Invalid Group Name!');
DEFINE('_JACL_G_INVALID_NAME2','Invalid Group Name (Duplicate Name)!');
DEFINE('_JACL_G_INVALID_PARENT_ID','Invalid Parent ID!');
DEFINE('_JACL_G_INVALID_ACCESS_LEVEL','Invalid Access Level!');
DEFINE('_JACL_G_FAIL_CREATE','Fail to create New Group!');
DEFINE('_JACL_G_SAVE_PASS','Successfully Saved Changes to Group: ');
DEFINE('_JACL_G_SAVE_FAIL','Fail to Save Changes to Group: ');
DEFINE('_JACL_SELECT_DELETE_ITEM','Please select an item to delete!');
DEFINE('_JACL_G_DELETE_DEFAULT','You cannot delete Default Group!');
DEFINE('_JACL_G_DELETE_YOURS','You cannot delete Your Group!');
DEFINE('_JACL_G_DELETE_PASS', 'Successfully Deleted Selected Groups.');
DEFINE('_JACL_G_DELETE_FAIL','Fail to Delete Selected Groups.');
DEFINE('_JACL_BLOCK','block!');
DEFINE('_JACL_UNBLOCK','unblock!');
DEFINE('_JACL_SELECT_ITEM_TO','Please select an item to ');
DEFINE('_JACL_ITEM_TO_LOGOUT','Please select an item to logout!');
DEFINE('_JACL_A_DEFAULT','* Default Access Level. Can not be deleted or renamed!');
DEFINE('_JACL_A_INVALID_NAME','Invalid Access Level Name!');
DEFINE('_JACL_A_INVALID_ID','Invalid Access Level ID!');
DEFINE('_JACL_A_FAIL_CREATE','Fail to create New Access Level!');
DEFINE('_JACL_A_REACH_MAX','Reach Maximum Access Level (99)!!!');
DEFINE('_JACL_A_SAVE_PASS','Successfully Saved Changes to Access Level: ');
DEFINE('_JACL_A_SAVE_FAIL','Fail to Save Changes to Access Level: ');
DEFINE('_JACL_A_DELETE_DEFAULT','You cannot delete Default Access Level!');
DEFINE('_JACL_A_DELETE_PASS','Successfully Deleted Selected Access Levels.');
DEFINE('_JACL_A_DELETE_FAIL','Fail to Delete Selected Access Levels.');
DEFINE('_JACL_G_DELETE_FAIL_ACL','But Fail to Delete Selected Group ACR.');

//IN ADMIN.JACLPLUS.HTML.PHP
DEFINE('_JACL_G_MANAGER','Group Manager');
DEFINE('_JACL_G_NAME','Group Name');
DEFINE('_JACL_G_ACCESS_LEVELS','Access Levels');
DEFINE('_JACL_G_PROVIDE_NAME','You must provide a group name.');
DEFINE('_JACL_G_INVALID_CHARS','You group name contains invalid characters or is too short.');
DEFINE('_JACL_G_ASSIGN_A','You must assign an access level to a group.');
DEFINE('_JACL_G_ID','Group ID:');
DEFINE('_JACL_EDIT','Edit');
DEFINE('_JACL_ADD','Add');
DEFINE('_JACL_G_DETAILS','Group Details');
DEFINE('_JACL_NEW','New');
DEFINE('_JACL_PARENT_G','Parent Group:');
DEFINE('_JACL_GROUP_NAME','Group Name:');
DEFINE('_JACL_ACCESS_LEVEL','Access Level:');
DEFINE('_JACL_PREESS_CTL','*Press Ctrl button to select multiple or unselect.');
DEFINE('_JACL_A_MANAGER','Access Level Manager');
DEFINE('_JACL_A_NAME','Access Level Name');
DEFINE('_JACL_ASTERISK',' *');
DEFINE('_JACL_A_PROVIDE_NAME','You must provide an access level name.');
DEFINE('_JACL_A_INVALID_CHARS','You access level name contains invalid characters or is too short.');
DEFINE('_JACL_A_ID','Access Level ID:');
DEFINE('_JACL_A_DETAILS','Access Level Details');
DEFINE('_JACL_ACCESS_LEVEL_NAME','Access Level Name:');
DEFINE('_JACL_G_INHERIT_FROM','Inherit ACL From :');
DEFINE('_JACL_G_YOUR_ACL','( See My Group ACL )');

//IN INSTALL.JACLPLUS.HTML.PHP
DEFINE('_JACL_P_PATCH_STATUS','<b>Files Patching Status</b>');
DEFINE('_JACL_P_PERMS_DENIED','Permission denied: ');
DEFINE('_JACL_P_PRECHECKING','Pre-checking Status: ');
DEFINE('_JACL_P_PASS', 'PASS. Proceed to next step...');
DEFINE('_JACL_P_FAIL','FAIL. Can not proceed... ABORT!');
DEFINE('_JACL_P_PATCH_FILE','Patch file : ');
DEFINE('_JACL_P_FINAL_STATUS','Final Status : ');
DEFINE('_JACL_P_SUCCESSFULLY',' <font color="#00FF00">SUCCESSFULLY</font>.');
DEFINE('_JACL_P_UNSUCCESSFULLY',' <font color="#FF0000">UNSUCCESSFULLY</font> (Permission Denied).');
DEFINE('_JACL_P_RENAME_FILE',' <font color="#FF0000">Please manually rename the above file to:</font>');
DEFINE('_JACL_P_COPY_FILE',' <font color="#FF0000">And copy this file to the location:</font>');
DEFINE('_JACL_P_REPLACE_FILE_MSG',' <font color="#FF0000">Please manually replace the above file with this file:</font>');
DEFINE('_JACL_P_CONGRATULATION','Congratulation, Component JACLPlus has been installed SUCCESSFULLY.');
DEFINE('_JACL_P_WITH_ERRORS','Component JACLPlus has been installed SUCCESSFULLY with some errors.');
DEFINE('_JACL_P_SORRY','Sorry, Component JACLPlus has been installed UNSUCCESSFULLY.');
DEFINE('_JACL_P_RESTORE_FILE','Restore file : ');
DEFINE('_JACL_P_RESTORE_FILE_MSG',' <font color="#FF0000">Please manually delete and restore the file!</font>');
DEFINE('_JACL_P_SAFE_UNINSTALL','You are SAFE to Uninstall this Component as it do nothing yet :) ');

DEFINE('_JACL_ACO_SECTION','ACO Section');
DEFINE('_JACL_ACO_VALUE','ACO Value');
DEFINE('_JACL_ARO_SECTION','ARO Section');
DEFINE('_JACL_ARO_VALUE','ARO Value');
DEFINE('_JACL_AXO_SECTION','AXO Section');
DEFINE('_JACL_AXO_VALUE','AXO Value');
DEFINE('_JACL_ACL_ENABLE','Enabled');
DEFINE('_JACL_ACL_YES','<font color="#00FF00">Yes</font>');
DEFINE('_JACL_ACL_NO','<font color="#FF0000">No</font>');
DEFINE('_JACL_ACL_FAIL_EDIT','Edit ACR Fail.');
DEFINE('_JACL_ACL_ADD','[ + ]');
DEFINE('_JACL_ACL_ADD_TAG','Add ACR For This Group.');
DEFINE('_JACL_ACL_NOT_ALLOW','You are not allowed to modify your own group or top level\'s ACL.');
DEFINE('_JACL_ACL_FAIL_ADD','Add ACR Fail.');
DEFINE('_JACL_ACL_DONT_HAVE','You do not have permission to add this type of ACR.');
DEFINE('_JACL_ACL_ADD_MSG','<b>*** You only have permission to add ACR type that your group have and is enabled.</b>');
DEFINE('_JACL_ACO_ADD_REMOVE','[+/-]');
DEFINE('_JACL_ACO_REMOVE','[ - ]');
DEFINE('_JACL_ACO_REMOVE_TAG','Remove ACR For This Group.');
DEFINE('_JACL_ACL_EDIT_TAG','Edit ACR For This Group.');
DEFINE('_JACL_ACL_FAIL_DELETE','Delete ACR Fail.');
DEFINE('_JACL_ACL_CONFIRM_REMOVE','Are you sure you want to remove selected ACR?');
DEFINE('_JACL_ACL_CONFIRM_EDIT','Are you sure you want to modify selected ACR?');
DEFINE('_JACL_ACL_FAIL_DUPLICATED','This type of ACR already exists.');

//version 1.0.5
DEFINE('_JACL_ACL_PATCH_LEGEND','<div align="left"><pre>
Legend:
Error 1! - Can not read new patch file. Uploading error.
Error 2! - Can not CHMOD parent directory. Directory non-exist and Parent directory is not writable.
Error 3! - Directory non-exist and can not create new directory.
Error 4! - Can not remove new created directory in prechecking mode.
Error 5! - Can not CHMOD directory. Directory is not writable.
Error 6! - Can not CHMOD file to be patched. File to be patched is not writable.
Error 7! - Can not remove new created file in prechecking mode.
Error 8! - Can not create backup file.
Error 9! - File to be patched that need to be backup is non-exist.
Error 10! - File to be patched is not writable in prechecking mode.
Error 11! - Can not open file to be patched for writing.
</pre></div>');
DEFINE('_JACL_G_NUM_USERS','Users');
DEFINE('_JACL_A_SECTIONS','Sections');
DEFINE('_JACL_A_CATEGORIES','Catogories');
DEFINE('_JACL_A_CONTENTS','Contents');
DEFINE('_JACL_A_CONTACT_DETAILS','Contacts');
DEFINE('_JACL_A_MAMBOTS','Mambots');
DEFINE('_JACL_A_MENU','Menus');
DEFINE('_JACL_A_MODULES','Modules');
DEFINE('_JACL_A_POLLS','Polls');
//version 1.0.7
DEFINE('_JACL_CONFIGURATION','JACLPlus Configuration');
DEFINE('_JACL_ENTRY_ERRORS','Entry Errors');
DEFINE('_JACL_GENERAL','General');
DEFINE('_JACL_VERSION','JACLPlus Version');
DEFINE('_JACL_URL','JACLPlus Support Site');
DEFINE('_JACL_FRONTEND','Frontend');
DEFINE('_JACL_BACKEND','Backend');
DEFINE('_JACL_UPDATES','Updates');
DEFINE('_JACLPLUS_CONFIG_UPDATED','Configuration Updated!');
DEFINE('_JACLPLUS_CONFIG_ERROR','Configure Error!');
DEFINE('_JACL_CFG_UPDATESERVER','Update Server');
DEFINE('_JACL_RESETDEFAULT','Reset');
DEFINE('_JACL_CFG_CONTROLPANEL','Enable Frontend JACL+ Contents Control Panel');
DEFINE('_JACL_GENERAL_SETTINGS','General settings');
DEFINE('_JACL_CFG_NONLOGINITEM','Content For Non-Login User');
DEFINE('_JACL_CFG_MESSAGE','- Default Message -');
DEFINE('_JACL_CFG_NOEDITABLEITEM','Content For No Manageable User');
DEFINE('_JACL_CFG_ENABLEJACLPLUS','Enhance Frontend Access Control For com_content');
DEFINE('_JACL_CFG_EDITSECTION','Allow Edit Section If Capable');
DEFINE('_JACL_CFG_EDITCATEGORY','Allow Edit Category If Capable');
DEFINE('_JACL_ADVANCE_SETTINGS','Advance Settings for com_content <br /> (You must set "'._JACL_CFG_ENABLEJACLPLUS.'" property to \'Yes\' in order to use below features)');
DEFINE('_JACL_CFG_PUBLISH_FRONTPAGE','Allow Publish Item Into Frontpage');
DEFINE('_JACL_CFG_PUBLISH_ALTYPE','Allow Publish to Access Levels');
DEFINE('_JACL_CFG_SPECIFIED_JACL','Specified Publish to Access Levels');
DEFINE('_JACL_CFG_ALL','All');
DEFINE('_JACL_CFG_OWN','Own');
DEFINE('_JACL_CFG_ALL_EXC','All Exclude Default');
DEFINE('_JACL_CFG_OWN_EXC','Own Exclude Default');
DEFINE('_JACL_CFG_SPECIFIED','Specified');
DEFINE('_JACL_CFG_SHOW_UGSTAT','Show User Group Statistics');
DEFINE('_JACL_CFG_SHOW_ALSTAT','Show Access Level Statistics');
//version 1.0.8
DEFINE('_JACL_CFG_LIMIT_EDITOWN','Limit Edit-Own ACR to Edit Item Only');
DEFINE('_JACL_CFG_REQUIRE_PUBLISH','Edited Item Require RePublish');
//version 1.0.9
DEFINE('_JACL_CFG_LIMIT_EDIT','Limit Edit ACR to Edit Item Only');
DEFINE('_JACL_CFG_NOAUTH_LINK','Link For No Authorized Item');
DEFINE('_JACL_CFG_NOAUTH_TEXT','Text For No Authorized Item');
DEFINE('_JACL_CFG_EDIT_ACCESSONLY','Allow to Edit Accessible Item Only');
DEFINE('_JACL_CFG_AUTO_DISABLECACHE','Automatically Disable Cache Function');
//version 1.0.12
DEFINE('_JACL_ALL_ACCESS_LEVELS','*** All Access Levels ***');
DEFINE('_JACL_CFG_CATEGORY_LIMIT','Max. Categories List In Selection');
DEFINE('_JACL_CFG_SECTION_LIMIT','Max. Sections List In Selection');
DEFINE('_JACL_CFG_CONTENT_LIMIT','Max. Contents List In Selection');
//version 1.0.15
DEFINE('_JACL_ADD_ANY_ACR','Allow Super Administrator Add Any ACR');
?>