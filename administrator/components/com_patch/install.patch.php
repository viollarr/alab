<?php
/******************************************************************/
/* Title........: Patch Component for Joomla!/Mambo
/* Description..: Patch Component Make your Joomla!/Mambo Patch Easy
/* Author.......: Vincent Cheah
/* Version......: 1.1.0
/* Created......: 02/27/2008
/* Contact......: com_patch@byostech.com
/* Copyright....: (C) 2008 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of Patch Component package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//Patch Component for Joomla!/Mambo
//Copyright (C) 2008  Vincent Cheah, ByOS Technologies. All rights reserved.
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
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href="http://www.byostech.com">Patch Component for Joomla!/Mambo</a> ]' );

global $mosConfig_lang;
if (file_exists(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php')) {
  include(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php');
} else {
  include(dirname(__FILE__) . '/language/english.php');
}

function com_install()
{
global $database, $mosConfig_absolute_path;
require(dirname(__FILE__).'/config.patch.php');

?>
<h3 align="center">Patch Component for Joomla!/Mambo</h3>
<h2 align="center"><?php echo $title; ?></h2>
<h3 align="center" style="color:#00FF00 "><?php echo _COM_PATCH_SAFE_UNINSTALL ?></h3>
<?php echo $message; ?>
<table>
<tr>
<td align="left">
<strong>Patch Component v1.1.0</strong> <em>for Joomla!/Mambo</em><br />
&copy; 2005 - 2008 Vincent Cheah, ByOS Technologies (www.byostech.com)<br>
             All rights reserved.
  <p>      This component has patched your Joomla!/Mambo as mentioned on the above. </p>
  <ul>
<li>For questions and support please contact the author at <a href="mailto:jaclplus@byostech.com">com_patch@byostech.com</a> or go to <a href="http://www.byostech.com/forum">http://www.byostech.com/forum</a>.</li>
<li>This component make patching of your Joomla!/Mambo, their components, modules, hacks, etc easy because you can do it with a couple of clicks only.</li>
</ul>
         <p>
            <strong><font color="#FF8000">Note for all version of Patch Component: </font></strong><br>
            <font size="1">Patch Component is provided as free software and therefore provided 'as-is'.
            The ByOS Technologies, its subsidiaries, its developers, contributors 
            and its parental legal entities (formally or informally) (these will further be referenced as 'BYOS') 
            offer you Patch Component for absolutely free for your own personal use, pleasure and education. 
            The BYOS reserves the right to charge corporate or  commercial users of the Software for this 
      or future versions or support on a paid basis. </font>        </p>
         <p><font size="1">Any Patch Component version may contain errors, bugs and/or can cause problems otherwise. By installing this software, you have agreed to waive BYOS from whatever form of liability and/or 
            responsibility for any problems and/or damages done by this software to you, your web environment 
            or in any other way legally, financially, socially, emotionally or whatever other ~ally you could 
   possibly imagine and find a legal article for that favors your rights...<br>
     In short and slightly more human readable: Use this software at your own risk; 
      we don't guarantee anything! </font></p>
         <p><font size="1">By clicking 'continue' below and using Patch Component, 
               it's your way of answering: &quot;Yes,I know... trust me, I know what I'm 
            doing so it'll be my own fault if things go wrong and I don't care&quot;...</font>
           <br>
           <font size="1">Have fun with Patch Component! We know you will!!!</font>
         </p>
    </td>
</tr>
<tr>
  <td align="left"><?php echo _COM_PATCH_PATCH_STATUS ?><br/>
    <?php 
	$status = 0; // 1 to disable and for test pre-checking
	// pre-checking
	foreach( $Replace_Files as $file ) {
		$oldfile = $mosConfig_absolute_path.$file[0];
		$newfile = dirname(__FILE__).$file[1];
		if ( !patchFile($oldfile, $newfile, $file[2], true, $backupext ) ) {
			$status++;
			$echostr = _COM_PATCH_PERMS_DENIED."<font color=\"#FF0000\">".$oldfile."</font><br/>\n";
			echo $echostr;
		}
	}
	if( $status==0 ) {
		$echostr = _COM_PATCH_PRECHECKING."<font color=\"#00FF00\">"._COM_PATCH_PASS."</font><br/><br/>\n";
		echo $echostr;
		$firstSQL = true;
		foreach( $Install_SQL_Queries as $Query ) {
			$database->setQuery($Query[0]);
			if (!$database->query()) {
				$echostr = $database->getErrorMsg().$Query[1]."<br/>\n";
				echo $echostr;
				$status++;
				if ($firstSQL) { 
					$echostr = "</td></tr></table>";
					echo $echostr;
					return false;
				}
			}
			$firstSQL = false;
		}
		foreach( $Replace_Files as $file ) {
			$oldfile = $mosConfig_absolute_path.$file[0];
			$newfile = dirname(__FILE__).$file[1];
			if ( patchFile($oldfile, $newfile, $file[2], false, $backupext ) ) {
				$echostr = _COM_PATCH_PATCH_FILE.$oldfile._COM_PATCH_SUCCESSFULLY."<br/>\n";
				echo $echostr;
			} else {
				if ($file[2]) {
					$echostr = _COM_PATCH_PATCH_FILE.$oldfile._COM_PATCH_UNSUCCESSFULLY."<br/>\n"
					._COM_PATCH_RENAME_FILE."<br/>\n"
					.$oldfile.$backupext."<br/>\n"
					._COM_PATCH_COPY_FILE."<br/>\n"
					.$newfile."<br/>\n";
				} else {
					$echostr = _COM_PATCH_PATCH_FILE.$oldfile._COM_PATCH_UNSUCCESSFULLY."<br/>\n"
					._COM_PATCH_REPLACE_FILE_MSG."<br/>\n"
					.$newfile."<br/>\n";
				}
				echo $echostr;
				$status++;
			}
		}
		if( $status==0 ) {
			$echostr = _COM_PATCH_FINAL_STATUS."<font color=\"#00FF00\">"._COM_PATCH_CONGRATULATION."</font><br/>\n";
			echo $echostr;
		} else if ( $status < (count($Install_SQL_Queries) + count($Replace_Files)) ) {
			$echostr = _COM_PATCH_FINAL_STATUS."<font color=\"#0000FF\">"._COM_PATCH_WITH_ERRORS."</font><br/>\n";
			echo $echostr;
		} else {
			$echostr = _COM_PATCH_FINAL_STATUS."<font color=\"#FF0000\">"._COM_PATCH_SORRY."</font><br/>\n</td></tr></table>";
			echo $echostr;
		}
	} else {
		$echostr = _COM_PATCH_PRECHECKING."<font color=\"#FF0000\">"._COM_PATCH_FAIL."</font><br/><br/>\n"._COM_PATCH_SAFE_UNINSTALL."<br/>\n";
		echo $echostr;
	}
  ?></td>
</tr>
</table>
<?php 
	if($status) {
		echo _COM_PATCH_LEGEND;
		return $echostr;
	}else{
		/* $Query = "Select id FROM `#__components` WHERE admin_menu_link = 'option=com_jaclplus&task=showConfig'";
		$database->setQuery($Query);
		if(!$database->loadResult()) {
			$Query = "Select id FROM `#__components` WHERE link = 'option=com_jaclplus'";
			$database->setQuery($Query);
			$parentid = $database->loadResult();
			$Query = "INSERT INTO `#__components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`) VALUES ('', 'Configuration', '', '0', '$parentid', 'option=com_jaclplus&task=showConfig', 'Configuration', 'com_jaclplus', '2', 'js/ThemeOffice/component.png', '0', '');";
			$database->setQuery($Query);
			$database->query();
		} */
		require_once( $mosConfig_absolute_path . '/administrator/components/com_jaclplus/language/english.php' );
		require_once( $mosConfig_absolute_path . '/administrator/components/com_jaclplus/jaclplus.class.php' );
		$_config = new JACLPlus('jaclConfig', $mosConfig_absolute_path . '/administrator/components/com_jaclplus/jaclplus.config.php' );

		$_config->setCfg('jaclplus_version', '1.0.15');
		$_config->setCfg('jaclplus_url', $_config->getCfg('jaclplus_url', "http://www.byostech.com"));
		$_config->setCfg('smart_update', $_config->getCfg('smart_update', "To be implemented..."));
		$_config->setCfg('control_panel', $_config->getCfg('control_panel', "1"));
		$_config->setCfg('publish_frontpage', $_config->getCfg('publish_frontpage', "1"));
		$_config->setCfg('publish_alstype', $_config->getCfg('publish_alstype', "1"));
		$_config->setCfg('publish_jaclplus', $_config->getCfg('publish_jaclplus', "0,1"));
		$_config->setCfg('enable_jaclplus', $_config->getCfg('enable_jaclplus', "1"));
		$_config->setCfg('edit_section', $_config->getCfg('edit_section', "1"));
		$_config->setCfg('edit_category', $_config->getCfg('edit_category', "1"));
		$_config->setCfg('show_ugstat', $_config->getCfg('show_ugstat', "1"));
		$_config->setCfg('show_alstat', $_config->getCfg('show_alstat', "1"));
		$_config->setCfg('limit_editown', $_config->getCfg('limit_editown', "0"));
		$_config->setCfg('limit_edit', $_config->getCfg('limit_edit', "0"));
		$_config->setCfg('require_publish', $_config->getCfg('require_publish', "0"));
		$_config->setCfg('noauth_link', $_config->getCfg('noauth_link', "#"));
		$_config->setCfg('noauth_text', $_config->getCfg('noauth_text', "Upgrade to read more..."));
		$_config->setCfg('edit_accessonly', $_config->getCfg('edit_accessonly', "1"));
		$_config->setCfg('auto_disablecache', $_config->getCfg('auto_disablecache', "1"));
		$_config->setCfg('content_limit', $_config->getCfg('content_limit', "50"));
		$_config->setCfg('category_limit', $_config->getCfg('category_limit', "50"));
		$_config->setCfg('section_limit', $_config->getCfg('section_limit', "50"));
		$_config->setCfg('admin_acltoany', $_config->getCfg('admin_acltoany', "1"));

		if ($_config->saveConfig()) {
			$echostr = _JACLPLUS_CONFIG_UPDATED;
		} else {
			$echostr = _JACLPLUS_CONFIG_ERROR;
		}
		
		return $echostr;
	}
	
} 

// this function need to be optimized
function patchFile($patchfile, $newfile, $backup=true, $simulate=true, $backupext) {
	$file_writable = false;
	$dir_writable = false;
	$file_exist = file_exists($patchfile);
		
	if ( $fp = @fopen( $newfile, 'rb' ) ) {
		if (!$simulate) $content = @fread( $fp, filesize( $newfile ) );
		fclose( $fp );
	} else {
		echo "Can not read source file!<br/>\n";
		return false;
	}
	
	if ($backup && !$file_exist) {
		echo "File that need to be backup is not existed!<br/>\n";
		return false;
	}
	
	$oldperms = NULL;
	$diroldperms = NULL;
	if ($file_exist) {
		if(is_writable($patchfile)) {
			$file_writable = true;
		} else {
			$oldperms = fileperms($patchfile);
			if(@chmod($patchfile, 0777)){
				$file_writable = true;
			} else {
				echo "File that need to be patched is not writable!<br/>\n";
				return false;
			}
		}
		if ($backup){
			$dir = dirname($patchfile);
			if (is_writable($dir)) {
				$dir_writable = true;
			} else {
				$diroldperms = fileperms($dir);
				if(@chmod($dir, 0777)){
					$dir_writable = true;
				} else {
					echo "Can not create backup file because directory is not writable!<br/>\n";
					return false;
				}
			}
		}
	} else {
		$dir = dirname($patchfile);
		if (!file_exists($dir)) {
			$parent_diroldperms = NULL;
			$parent_dir = dirname($dir);
			if (!is_writable($parent_dir)) {
				$parent_diroldperms = fileperms($parent_dir);
				if(!(@chmod($parent_dir, 0777))){
					echo "Directory is not existed and parent directory is not writable!<br/>\n";
					return false;
				}
			}
			if (!(@mkdir($dir, 0777))) {
				if ($parent_diroldperms) @chmod($parent_dir, $parent_diroldperms);
				echo "Directory is not existed and create directory failed!<br/>\n";
				return false;
			}
			if ($parent_diroldperms) @chmod($parent_dir, $parent_diroldperms);
		}
		if (is_writable($dir)) {
			$dir_writable = true;
			$file_writable = true;
		} else {
			$diroldperms = fileperms($dir);
			if(@chmod($dir, 0777)){
				$dir_writable = true;
				$file_writable = true;
			} else {
				echo "Can not create new file because directory is not writable!<br/>\n";
				return false;
			}
		}
	}
	
	if ($backup && !$dir_writable) {
		echo "Can not create backup file because directory is not writable!<br/>\n";
		return false;
	}
	
	if(!$file_writable) {
		echo "File that need to be patched is not writable!<br/>\n";
		return false;
	}

	if ($simulate) {
		if ($oldperms) @chmod($patchfile, $oldperms);
		if ($diroldperms) @chmod($dir, $diroldperms);
		return true;
	} else {
		if($backup) {
			$backupfile = $patchfile.$backupext;
			if (@copy($patchfile,$backupfile)) {
			} else {
				if ($oldperms) @chmod($patchfile, $oldperms);
				if ($diroldperms) @chmod($dir, $diroldperms);
				echo "Create backup file failed!<br/>\n";
				return false;
			}
		}
		if ($fp = @fopen ($patchfile, 'wb')) {
			fputs( $fp, $content );
			fclose( $fp );
			if ($oldperms) {
				@chmod($patchfile, $oldperms);
			} else {
				@chmod($patchfile, 0644);
			}
			if ($diroldperms) @chmod($dir, $diroldperms);
			return true;
		} else {
			if ($oldperms) @chmod($patchfile, $oldperms);
			if ($diroldperms) @chmod($dir, $diroldperms);
			echo "File that need to be patched is not writable!<br/>\n";
			return false;
		}
	}
}
?>
