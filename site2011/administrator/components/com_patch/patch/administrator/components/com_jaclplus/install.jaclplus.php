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

global $mosConfig_lang;
if (file_exists(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php')) {
  include(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php');
} else {
  include(dirname(__FILE__) . '/language/english.php');
}

function com_install()
{
global $database, $mosConfig_absolute_path, $my, $acl;
require(dirname(__FILE__).'/config.jaclplus.php');

?>
<h2 align="center"><?php echo $title; ?></h2>
<?php echo $message; ?>
<table>
<tr>
<td align="left">
<strong>JACLPlus</strong> Component <em>for Joomla! 1.0.15 Stable </em> <br />
&copy; 2005-2008 Vincent Cheah, ByOS Technologies (www.byostech.com)<br>
             All rights reserved.
  <p>      This component allows you to create new Groups and/or new Access Levels in Joomla! 1.0.15 Stable. </p>
  <ul>
<li><b>IMPORTANT - This component is a HACK for Joomla! 1.0.15 Stable core files.</b></li>
<li><b>IMPORTANT - This component does not work with any other versions of Joomla! except Joomla! 1.0.15 Stable. You have to install this component on Joomla! 1.0.15 Stable ONLY.</b></li>
<li><b>IMPORTANT - This component does not work with any other components, modules, mambots or hacks as the effects of using them with this component is unknown.  
	It is recommended that you install this component on clean/fresh installation of Joomla! 1.0.15 Stable. For components, modules, mambots or hacks that work with this component, please go to <a href="http://www.byostech.com/component/option,com_joomlaboard/Itemid,6/func,showcat/catid,5/">http://www.byostech.com/forum</a> to check.</b></li>
<li>For questions and support please contact the author at <a href="mailto:jaclplus@byostech.com">jaclplus@byostech.com</a> or go to <a href="http://www.byostech.com/forum">http://www.byostech.com/forum</a>.</li>
<li>With this component, you can control your contents to be viewed by groups that created by you. To do this, you can create a new group and assign multiple access levels to that group. This will be more flexible, and you can decide whether to allow registered users to gain access or not.</li>
</ul>
         <p>
            <strong><font color="#FF8000">Note for all version of JACLPlus: </font></strong><br>
            <font size="1">JACLPlus is provided as free software and therefore provided 'as-is'.
            The ByOS Technologies, its subsidiaries, its developers, contributors 
            and its parental legal entities (formally or informally) (these will further be referenced as 'BYOS') 
            offer you JACLPlus for absolutely free for your own personal use, pleasure and education. 
            The BYOS reserves the right to charge corporate or  commercial users of the Software for this 
           or future versions or support on a paid basis. </font>        </p>
         <p><font size="1">Any JACLPlus version may contain errors, bugs and/or can cause problems otherwise. By installing this software, you have agreed to waive BYOS from whatever form of liability and/or 
            responsibility for any problems and/or damages done by this software to you, your web environment 
            or in any other way legally, financially, socially, emotionally or whatever other ~ally you could 
   possibly imagine and find a legal article for that favours your rights...<br>
     In short and slightly more human readable: Use this software at your own risk; 
      we don't guarantee anything! </font></p>
         <p><font size="1">By clicking 'continue' below and using JACLPlus, 
               it's your way of answering: &quot;Yes,I know... trust me, I know what I'm 
            doing so it'll be my own fault if things go wrong and I don't care&quot;...</font>
           <br>
           <font size="1">Have fun with JACLPlus! We know you will!!!</font>
         </p>
    </td>
</tr>
<tr>
  <td align="left"><?php echo _JACL_P_PATCH_STATUS ?><br/>
    <?php 
	$error_count = 0;
	// pre-checking
	foreach( $Replace_Files as $file ) {
		$oldfile = $mosConfig_absolute_path.$file[0];
		$newfile = dirname(__FILE__).$file[1];
		if ( !patchFile($oldfile, $newfile, $file[2], true, $backupext ) ) {
			$error_count++;
			$echostr = _JACL_P_PERMS_DENIED."<font color=\"#FF0000\">".$oldfile."</font><br/>\n";
			echo $echostr;
		}
	}
	if( $error_count==0 ) {
		$echostr = _JACL_P_PRECHECKING."<font color=\"#00FF00\">"._JACL_P_PASS."</font><br/><br/>\n";
		echo $echostr;
		$firstSQL = true;
		foreach( $Install_SQL_Queries as $Query ) {
			$database->setQuery($Query[0]);
			if (!$database->query()) {
				$echostr = $database->getErrorMsg().$Query[1]."<br/>\n";
				echo $echostr;
				$error_count++;
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
				$echostr = _JACL_P_PATCH_FILE.$oldfile._JACL_P_SUCCESSFULLY."<br/>\n";
				echo $echostr;
			} else {
				if ($file[2]) {
					$echostr = _JACL_P_PATCH_FILE.$oldfile._JACL_P_UNSUCCESSFULLY."<br/>\n"
					._JACL_P_RENAME_FILE."<br/>\n"
					.$oldfile.$backupext."<br/>\n"
					._JACL_P_COPY_FILE."<br/>\n"
					.$newfile."<br/>\n";
				} else {
					$echostr = _JACL_P_PATCH_FILE.$oldfile._JACL_P_UNSUCCESSFULLY."<br/>\n"
					._JACL_P_REPLACE_FILE_MSG."<br/>\n"
					.$newfile."<br/>\n";
				}
				echo $echostr;
				$error_count++;
			}
		}
		if( $error_count==0 ) {
			$echostr = _JACL_P_FINAL_STATUS."<font color=\"#00FF00\">"._JACL_P_CONGRATULATION."</font><br/>\n";
			echo $echostr;
		} else if ( $error_count < (count($Install_SQL_Queries) + count($Replace_Files)) ) {
			$echostr = _JACL_P_FINAL_STATUS."<font color=\"#0000FF\">"._JACL_P_WITH_ERRORS."</font><br/>\n";
			echo $echostr;
		} else {
			$echostr = _JACL_P_FINAL_STATUS."<font color=\"#FF0000\">"._JACL_P_SORRY."</font><br/>\n</td></tr></table>";
			echo $echostr;
		}
		$grp 			= $acl->getAroGroup( $my->id );
		$my->gid 		= $grp->group_id;
		$_SESSION['session_jaclplus'] 	= '0,1,2';
		$database->setQuery( "UPDATE #__session SET gid = '$my->gid' , jaclplus = '0,1,2' WHERE userid = '$my->id' ;");
		$database->query();
		//force logout all except me and super admin
		$database->setQuery( "DELETE FROM #__session WHERE userid != '$my->id' AND gid != '25';");
		$database->query();
	} else {
		$echostr = _JACL_P_PRECHECKING."<font color=\"#FF0000\">"._JACL_P_FAIL."</font><br/><br/>\n"._JACL_P_SAFE_UNINSTALL."<br/>\n";
		echo $echostr;
	}
  ?></td>
</tr>
</table>
<?php
	if($error_count>0) {
		if(defined('_JACL_ACL_PATCH_LEGEND')) echo _JACL_ACL_PATCH_LEGEND;
		return $echostr;
	}else{
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
