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

if (file_exists(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php')) {
  include(dirname(__FILE__) . '/language/'.$mosConfig_lang.'.php');
} else {
  include(dirname(__FILE__) . '/language/english.php');
}

showAbout( $option );

	function showAbout( $option ) {
		global $mosConfig_absolute_path;
		require(dirname(__FILE__).'/config.patch.php');
		?>
		<form action="index2.php" method="post" name="adminForm"><div align="left">
<h3 align="center">Patch Component for Joomla!/Mambo</h3>
<h2 align="center"><?php echo $title; ?></h2>
<h3 align="center" style="color:#00FF00 "><?php echo _COM_PATCH_SAFE_UNINSTALL ?></h3>
<?php echo $message; ?>
<strong>Patch Component v1.0.1</strong> <em>for Joomla!/Mambo</em><br />
&copy; 2005 Vincent Cheah, ByOS Technologies (www.byostech.com)<br>
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
		 <p style="color:#0000FF; ">
<?php 
	if (count($Install_SQL_Queries)>0) {
		$echostr = _COM_PATCH_EXE_SQL."<br/>\n";
		echo $echostr;
		$count = 0;
		foreach( $Install_SQL_Queries as $Query ) {
			$count++;
			$echostr = _COM_PATCH_SQL_QUERY.$count." : ".$Query[0]."<br/>\n";
			echo $echostr;
		}
	}
	if (count($Replace_Files)>0) {
		$echostr = "<br/>\n"._COM_PATCH_REPLACED_FILES."<br/>\n";
		echo $echostr;
		$count = 0;
		foreach( $Replace_Files as $file ) {
			$oldfile = $mosConfig_absolute_path.$file[0];
			$count++;
			$echostr = _COM_PATCH_REPLACED_FILE.$count." : ".$oldfile."<br/>\n";
			echo $echostr;
			if ($file[2]) {
			$echostr = _COM_PATCH_BACKUP_FILE.$count." : ".$oldfile.$backupext."<br/>\n";
			echo $echostr;
			}
		}
	}
?>
         </p></div>
		 <input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}
?>