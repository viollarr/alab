<?php
/******************************************************************/
/* Title........: Patch Component for Joomla!/Mambo
/* Description..: Patch Component Make your Joomla!/Mambo Patch Easy
/* Author.......: Vincent Cheah
/* Version......: 1.0.1
/* Created......: 02/12/2005
/* Contact......: com_patch@byostech.com
/* Copyright....: (C) 2005 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of Patch Component package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//Patch Component for Joomla!/Mambo
//Copyright (C) 2005  Vincent Cheah, ByOS Technologies. All rights reserved.
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

//IN ADMIN.PATCH.PHP
DEFINE('_COM_PATCH_DEFAULT','Patch Component for Joomla!/Mambo.');
DEFINE('_COM_PATCH_SAFE_UNINSTALL','You are SAFE to Uninstall this Patch Component :) ');
DEFINE('_COM_PATCH_EXE_SQL','Executed SQL Queries >>');
DEFINE('_COM_PATCH_SQL_QUERY','SQL Query ');
DEFINE('_COM_PATCH_REPLACED_FILES','Replaced Files >>');
DEFINE('_COM_PATCH_REPLACED_FILE','Replaced File ');
DEFINE('_COM_PATCH_BACKUP_FILE','Backup File ');
DEFINE('_COM_PATCH_PATCH_STATUS','Files Patching Status: ');
DEFINE('_COM_PATCH_PERMS_DENIED','Permission denied: ');
DEFINE('_COM_PATCH_PRECHECKING','Pre-checking Status: ');
DEFINE('_COM_PATCH_PASS', 'PASS. Proceed to next step...');
DEFINE('_COM_PATCH_FAIL','FAIL. Can Not proceed... ABORT!');
DEFINE('_COM_PATCH_PATCH_FILE','Patch file : ');
DEFINE('_COM_PATCH_FINAL_STATUS','Final Status : ');
DEFINE('_COM_PATCH_SUCCESSFULLY',' <font color="#00FF00">SUCCESSFULLY</font>.');
DEFINE('_COM_PATCH_UNSUCCESSFULLY',' <font color="#FF0000">UNSUCCESSFULLY</font> (Permission Denied).');
DEFINE('_COM_PATCH_RENAME_FILE',' <font color="#FF0000">Please manually rename the above file to:</font>');
DEFINE('_COM_PATCH_COPY_FILE',' <font color="#FF0000">And copy this file to the location:</font>');
DEFINE('_COM_PATCH_REPLACE_FILE_MSG',' <font color="#FF0000">Please manually replace the above file with this file:</font>');
DEFINE('_COM_PATCH_CONGRATULATION','Congratulation, Patch Component has patched your Joomla!/Mambo SUCCESSFULLY.');
DEFINE('_COM_PATCH_WITH_ERRORS','Patch Component has patched your Joomla!/Mambo SUCCESSFULLY with some errors.');
DEFINE('_COM_PATCH_SORRY','Sorry, Patch Component has patched your Joomla!/Mambo UNSUCCESSFULLY.');

//version 1.0.1
DEFINE('_COM_PATCH_LEGEND','<div align="left"><pre>
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
?>