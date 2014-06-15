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

class HTML_jaclplus {
	
	function showAbout( $option ) {
		?>
		<form action="index2.php" method="post" name="adminForm"><div align="left">
<h2 align="center">Component JACLPlus - Version 1.0.15a </h2>
<p>[<a href="index2.php?option=com_jaclplus&task=createLinkConfig">Create "Configuration" Menu Link</a>]</p>
<strong>JACLPlus</strong> Component <em>for Joomla! 1.0.15 Stable </em> <br />
&copy; 2005-2008 Vincent Cheah, ByOS Technologies (www.byostech.com)<br>
             All rights reserved.
  <p>      This component allows you to create new User Groups and/or new Access Levels in Joomla! 1.0.15 Stable. </p>
  <ul>
<li><b>IMPORTANT - This component includes some HACKs for Joomla! 1.0.15 Stable core files.</b></li>
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
         <p><font size="1">By using JACLPlus, 
               it's your way of answering: &quot;Yes,I know... trust me, I know what I'm 
            doing so it'll be my own fault if things go wrong and I don't care&quot;...</font>
           <br>
           <font size="1">Have fun with JACLPlus! We know you will!!!</font>
         </p></div>
		  <hr>
		  <div align="left">
		  <p><strong>Change Log</strong><br />
		    <font size="2">Version 1.0.15a - 27.April.2008</font></p>
		  <ul>
            <li><font size="2">Fix some important bugs in version 1.0.15.</font></li>
            </ul>
		  <p><font size="2">Version 1.0.15 - 27.February.2008</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.15 Stable.</font></li>
            <li><font size="2">Fix some minor bugs.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.13 - 24.July.2007</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.13 Stable.</font></li>
            <li><font size="2">Move JACLPlus functions into JACLPlus class. </font></li>
            <li><font size="2">Make all hacked files work with/without JACLPlus (Eliminate installation/uninstallation possibly cause fatal error problem). </font></li>
            <li><font size="2">+ Feature to allow Super Administrator to add any ACR. </font></li>
            <li><font size="2">Fix remove ACL bugs upon content/category/section deletion. </font></li>
		  </ul>
		  <p><font size="2">Version 1.0.12 - 28.December.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.12 Stable.</font></li>
            <li><font size="2">Enhance component security based on Joomla! 1.0.12 approach </font>.</li>
            <li><font size="2">Fixed some minor bugs.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.11 - 29.August.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.11 Stable.</font></li>
            <li><font size="2">Enhance component security</font>.</li>
            <li><font size="2">Fixed some minor installation bugs.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.10 - 26.June.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.10 Stable.</font></li>
            <li><font size="2">Only a few files need to be replaced back if uninstall. Make manually or automatically uninstall more easilier.</font></li>
            <li><font size="2">Fixed some minor bugs.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.9 - 07.June.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.9 Stable.</font></li>
            <li><font size="2">Use new term ACR (Access Control Rule) to replace ACL (Access Control List) in order to distinguish between a rule and a list.</font></li>
            <li><font size="2">Add a few new Capabilities in Advanced Settings.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.8a - 8.May.2006</font></p>
		  <ul><li><font size="2">Rework ACL checking and caching functions to reduce database queries and optimize it.</font></li>
	        <li><font size="2">Modify backend menu to make it ready for backend ACL enhancement.</font></li>
	        <li><font size="2">Add ACL custom add fields to allow easy add new type of ACL.</font></li>
	        <li><font size="2">Include Joomla proposed solutions for Joomla! 1.0.8 Stable bugs.</font></li>
		    <li><font size="2">Include typo error bugs fixes for version 1.0.8. </font></li>
		  </ul>
		  <p><font size="2">Version 1.0.8 - 27.February.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.8 Stable.</font></li>
	        <li><font size="2">Rework Frontend Content Item Management for com_content based on  Joomla! 1.0.8 Stable.</font></li>
	        <li><font size="2">Add Limit EditOwn Capability in Advanced Settings.</font></li>
	        <li><font size="2">Add Require Publish Capability for Edited Items in Advanced Settings.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.7a - 10.February.2006</font></p>
		  <ul>
            <li><font size="2">Add Move Multiple Users to Other Group Function on User Manager.</font></li>
	        <li><font size="2">Add Simple Statistics to User Group List and Access Level List.</font></li>
		    <li><font size="2">Fine Tune Frontend Content Items Management for com_content. </font></li>
		    <li><font size="2">Add Configuration to Manage Advanced Settings. </font></li>
		    <li><font size="2">Fix minor bugs found in version 1.0.7 </font></li>
		  </ul>
		  <p><font size="2">Version 1.0.7 - 17.January.2006</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.7 Stable.</font></li>
	        <li><font size="2">Fix error on edit static content from frontend.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.5 - 24.December.2005</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.5 Stable.</font></li>
	        <li><font size="2">Add handle to to allow 3PD's to add basic ACL for their modules and components.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.4a - 27.November.2005</font></p>
		  <ul>
            <li><font size="2"><strong>Able to Assign Other Access Levels to &quot;Public Frontend/Non-Registered&quot; Group.</strong><br />
- With this feature, you will able to hide items easily after user  login. Showing totally different layout to login and non-login users.</font></li>
	        <li><font size="2"><strong>Cache ACL Checking for Those Website that Enable Caching</strong><br />
	          - Although caching might not improve website performance speed, it  definitely will reduce the database server load for a big website.</font></li>
		    <li>	          <font size="2"><strong>New Enhanced Solution for Frontend Content Items Management.</strong><br />
		      - Control Joomla! website publishing at frontend will not be a big  issue anymore. Users will able to assign a group or groups to handle a  content section or sections, and/or to handle a content category or  categories, and/or even to handle a content item or items. However,  this new enhancement solution is at BETA stage only.</font></li>
		    <li><font size="2">Some others minor enhancements. </font></li>
		  </ul>
		  <p><font size="2">Version 1.0.4 - 22.November.2005</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.4 Stable.</font></li>
	        <li><font size="2">Add handle to move users to &quot;Registered&quot; group once their group has been deleted.</font></li>
		  </ul>
		  <p><font size="2">Version 1.0.3a - 4.November.2005</font></p>
		  <ul>
            <li><font size="2">Multilingual Support.</font></li>
            <li><font size="2">ACL Enhancement Stage 2. &quot;Actions Control&quot; has been implemented  in this version. Allow user to create groups that have same privileges  as Author, Editor, Publisher, Manager, Administrator, Super  Administrator, etc.</font></li>
            <li><font size="2">New Enhanced Installer. Prechecking will be conducted before  patching  Joomla! core files. No patching will be done if fail  prechecking. Safer for normal users. </font></li>
            <li><font size="2">Fixed some minor bugs.</font></li>
          </ul>
		  <p><font size="2">Version 1.0.3 - 24.October.2005</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.3 Stable.</font></li>
            <li><font size="2">First General Public  Release </font></li>
	      </ul>
		  <p><font size="2">Version 1.0.2 - 7.October.2005</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.2 Stable.</font></li>
	      </ul>
		  <p><font size="2">Version 1.0.1 - 
23.September.2005</font></p>
		  <ul>
            <li><font size="2">Switch to support Joomla! 1.0.1 Stable.</font></li>
	      </ul>
		  <p><font size="2">Version 1.0.0 - 2.September.2005</font></p>
		  <ul>
            <li><font size="2">Initial release for internal use based on  Mambo 4.5.2.3 due to customers' requests.</font></li>
	      </ul></div>
		 <input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function showGroups( &$rows, $pageNav, $option ) {
		global $_config;
		?>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="user">
			<?php echo _JACL_G_MANAGER; ?>
			</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<?php echo _JACL_G_DEFAULT; ?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="2%" class="title">
			#
			</th>
			<th width="3%" class="title">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title">
			<?php echo _JACL_G_NAME; ?>
			</th>
			<th width="60%" class="title" >
			<?php echo _JACL_G_ACCESS_LEVELS; ?> </th>
			<?php if ($_config->getCfg('show_ugstat')) { ?>
			<th width="50" class="title" align="center">
			<?php echo _JACL_G_NUM_USERS; ?> </th>
			<?php } ?>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row 	=& $rows[$i];

			$link 	= 'index2.php?option='.$option.'&amp;task=editA&amp;id='. $row->group_id. '&amp;hidemainmenu=1';
			$link2 	= 'index2.php?option=com_users&amp;task=view&amp;filter_type='. $row->group_id. '';
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->limitstart+$i+1;?>
				</td>
				<td>
				<?php echo mosHTML::idBox( $i, $row->group_id ); ?>
				</td>
				<td>
				<a href="<?php echo $link; ?>">
				<?php echo $row->name; ?>
				</a>
				</td>
				<td>
				<?php echo $row->jaclplus; ?>
				</td>
				<?php if ($_config->getCfg('show_ugstat')) { ?>
				<td align="center">
				<a href="<?php echo $link2; ?>">
				<?php echo $row->numOfUsers; ?>
				</a>
				</td>
				<?php } ?>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function editGroup( &$row, $option, $gid, $lists ) {
		global $my, $acl;
		global $mosConfig_live_site;
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			} else if (pressbutton == 'addACL') {
				form.subtask.value = "addACL";
				form.aco_section2.value = form.aco_section.value;
				form.aco_value2.value = form.aco_value.value;
				form.axo_section2.value = form.axo_section.value;
				form.axo_value2.value = form.axo_value.value;
				form.yes_no2.value = form.yes_no.value;
				submitform( 'editA' );
				return;
			} else if (pressbutton == 'addACL2') {
				form.subtask.value = "addACL";
				submitform( 'editA' );
				return;
			}
			var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");

			// do field validation
			if (trim(form.name.value) == "") {
				alert( "<?php echo _JACL_G_PROVIDE_NAME; ?>" );
			} else if (r.exec(form.name.value) || form.name.value.length < 3) {
				alert( "<?php echo _JACL_G_INVALID_CHARS; ?>" );
			} else if (!isSelected(form.access)) {
				alert( "<?php echo _JACL_G_ASSIGN_A; ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		function isSelected(form_element) {
			var form = document.adminForm;
			var isSelected = false;
			form.jaclplus.value = "";
			for (i=0; i < form_element.length; i++) {
				if (form_element.options[i].selected) {
					isSelected = true;
					form.jaclplus.value += form_element.options[i].value + ",";
				}
			}
			form.jaclplus.value = form.jaclplus.value.substr(0, form.jaclplus.value.length-1);
			return isSelected;
		}
		function specialbutton(pressbutton,aclid,myvalue) {
			var form = document.adminForm;
			form.aclid.value = aclid;
			form.myvalue.value = myvalue;
			form.hidemainmenu.value = "1";
			if (pressbutton == 'removeACL') {
				if (confirm("<?php echo _JACL_ACL_CONFIRM_REMOVE; ?>")) {
					form.subtask.value = "removeACL";
					submitform( 'editA' );
					return;
				}
			} else if (pressbutton == 'editACL') {
				if (confirm("<?php echo _JACL_ACL_CONFIRM_EDIT; ?>")) {
					form.subtask.value = "editACL";
					submitform( 'editA' );
					return;
				}
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="group">
			<?php echo _JACL_G_ID; ?> <small><?php echo $row->group_id ? _JACL_EDIT : _JACL_ADD;?></small>
			</th>
		</tr>
		</table>

		<table width="100%">
		<tr>
			<td valign="top">
				<table class="adminform">
				<tr>
					<th colspan="2">
					<?php echo _JACL_G_DETAILS; ?>
					</th>
				</tr>
				<tr>
				  <td><?php echo _JACL_G_ID; ?> </td>
				  <td><?php echo $row->group_id ? $row->group_id : _JACL_NEW;?>&nbsp;</td>
				  </tr>
				<tr>
					<td valign="top">
					<?php echo _JACL_PARENT_G; ?>
					</td>
					<td>
					<?php echo $lists['parent_id']; ?>
					</td>
				</tr>
				<tr>
					<td width="100">
					<?php echo _JACL_GROUP_NAME; ?>
					</td>
					<td width="85%">
					<?php echo $lists['name']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top">
					<?php echo _JACL_ACCESS_LEVEL; ?>
					</td>
					<td>
					<?php echo $lists['access']; ?> <?php echo _JACL_PREESS_CTL; ?>
					</td>
				</tr>
				<?php if ( $row->group_id < 1 ) { // new add only ?>
				<tr>
					<td valign="top">
					<?php echo _JACL_G_INHERIT_FROM; ?>
					</td>
					<td>
					<?php echo $lists['inheritfrom']; ?>
					</td>
				</tr>
				<?php } ?>
				</table>
			</td>
		  </tr>
		</table>
<?php
 	if( $row->group_id ) {
		 showGroupACL( $row, $option );
	}
?>
		<input type="hidden" name="id" value="<?php echo $row->group_id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="subtask" value="" />
		<input type="hidden" name="aclid" value="" />
		<input type="hidden" name="myvalue" value="" />
		<input type="hidden" name="jaclplus" value="" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function showGroupACL( &$rows, &$group_info, $lists, $option ) {
		global $my,$mosConfig_live_site;
		$canEdit = jaclplus_check( $group_info->group_id );
		?>
		<script language="JavaScript" type="text/javascript">
		// Chained Menu
		
		// Copyright Xin Yang 2004
		// Web Site: www.yxScripts.com
		// EMail: m_yangxin@hotmail.com
		// Last Updated: 2004-08-23
		
		// This script is free as long as the copyright notice remains intact.
		
		var _disable_empty_list=false;
		var _hide_empty_list=false;
		
		// ------
		
		///// DynamicDrive.com added function/////////////
		
		var onclickaction="alert"
		
		function goListGroup(){
		for (i=arguments.length-1;i>=0; i--){
		if (arguments[i].selectedIndex!=-1){
		var selectedOptionvalue=arguments[i].options[arguments[i].selectedIndex].value
		if (selectedOptionvalue!=""){
		if (onclickaction=="alert")
		alert(selectedOptionvalue)
		else if (newwindow==1)
		window.open(selectedOptionvalue)
		else
		window.location=selectedOptionvalue
		break
		}
		}
		}
		}
		
		///// END DynamicDrive.com added function//////
		
		
		if (typeof(disable_empty_list)=="undefined") { disable_empty_list=_disable_empty_list; }
		if (typeof(hide_empty_list)=="undefined") { hide_empty_list=_hide_empty_list; }
		
		var cs_goodContent=true, cs_M="M", cs_L="L", cs_curTop=null, cs_curSub=null;
		
		function cs_findOBJ(obj,n) {
		  for (var i=0; i<obj.length; i++) {
			if (obj[i].name==n) { return obj[i]; }
		  }
		  return null;
		}
		function cs_findContent(n) { return cs_findOBJ(cs_content,n); }
		
		function cs_findM(m,n) {
		  if (m.name==n) { return m; }
		
		  var sm=null;
		  for (var i=0; i<m.items.length; i++) {
			if (m.items[i].type==cs_M) {
			  sm=cs_findM(m.items[i],n);
			  if (sm!=null) { break; }
			}
		  }
		  return sm;
		}
		function cs_findMenu(n) { return (cs_curSub!=null && cs_curSub.name==n)?cs_curSub:cs_findM(cs_curTop,n); }
		
		function cs_contentOBJ(n,obj){ this.name=n; this.menu=obj; this.lists=new Array(); this.cookie=""; }; cs_content=new Array();
		function cs_topmenuOBJ(tm) { this.name=tm; this.items=new Array(); this.df=0; this.addM=cs_addM; this.addL=cs_addL; }
		function cs_submenuOBJ(dis,link,sub) {
		  this.name=sub;
		  this.type=cs_M; this.dis=dis; this.link=link; this.df=0;
		
		  var x=cs_findMenu(sub);
		  this.items=x==null?new Array():x.items;
		
		  this.addM=cs_addM; this.addL=cs_addL;
		}
		function cs_linkOBJ(dis,link) { this.type=cs_L; this.dis=dis; this.link=link; }
		
		function cs_addM(dis,link,sub) { this.items[this.items.length]=new cs_submenuOBJ(dis,link,sub); }
		function cs_addL(dis,link) { this.items[this.items.length]=new cs_linkOBJ(dis,link); }
		
		function cs_showMsg(msg) { window.status=msg; }
		function cs_badContent(n) { cs_goodContent=false; cs_showMsg("["+n+"] Not Found."); }
		
		function cs_optionOBJ(text,value) { this.text=text; this.value=value; }
		function cs_emptyList(list) { for (var i=list.options.length-1; i>=0; i--) { list.options[i]=null; } }
		function cs_refreshList(list,opt,df) {
		  cs_emptyList(list);
		
		  for (var i=0; i<opt.length; i++) {
			list.options[i]=new Option(opt[i].text, opt[i].value);
		  }
		
		  if (opt.length>0) {
			list.selectedIndex=df;
		  }
		}
		function cs_getOptions(menu) {
		  var opt=new Array();
		  for (var i=0; i<menu.items.length; i++) {
			opt[i]=new cs_optionOBJ(menu.items[i].dis, menu.items[i].link);
		  }
		  return opt;
		}
		function cs_updateListGroup(content,idx,sidx,mode) {
		  var i=0, curItem=null, menu=content.menu;
		
		  while (i<idx) {
			menu=menu.items[content.lists[i++].selectedIndex];
		  }
		
		  if (menu.items[sidx].type==cs_M && idx<content.lists.length-1) {
			var df=cs_getIdx(mode,content.cookie,idx+1,menu.items[sidx].df);
		
			cs_refreshList(content.lists[idx+1], cs_getOptions(menu.items[sidx]), df);
			if (content.cookie) {
			  cs_setCookie(content.cookie+"_"+(idx+1),df);
			}
		
			if (idx+1<content.lists.length) {
			  if (disable_empty_list) {
				content.lists[idx+1].disabled=false;
			  }
			  if (hide_empty_list) {
				content.lists[idx+1].style.display="";
			  }
		
			  cs_updateListGroup(content,idx+1,df,mode);
			}
		  }
		  else {
			for (var s=idx+1; s<content.lists.length; s++) {
			  cs_emptyList(content.lists[s]);
		
			  if (disable_empty_list) {
				content.lists[s].disabled=true;
			  }
			  if (hide_empty_list) {
				content.lists[s].style.display="none";
			  }
		
			  if (content.cookie) {
				cs_setCookie(content.cookie+"_"+s,"");
			  }
			}
		  }
		}
		function cs_initListGroup(content,mode) {
		  var df=cs_getIdx(mode,content.cookie,0,content.menu.df);
		
		  cs_refreshList(content.lists[0], cs_getOptions(content.menu), df);
		  if (content.cookie) {
			cs_setCookie(content.cookie+"_"+0,df);
		  }
		
		  cs_updateListGroup(content,0,df,mode);
		}
		
		function cs_updateList() {
		  var content=this.content;
		  for (var i=0; i<content.lists.length; i++) {
			if (content.lists[i]==this) {
			  if (content.cookie) {
				cs_setCookie(content.cookie+"_"+i,this.selectedIndex);
			  }
		
			  if (i<content.lists.length-1) {
				cs_updateListGroup(content,i,this.selectedIndex,"");
			  }
			}
		  }
		}
		
		function cs_getIdx(mode,name,idx,df) {
		  if (mode) {
			var cs_idx=cs_getCookie(name+"_"+idx);
			if (cs_idx!="") {
			  df=parseInt(cs_idx);
			}
		  }
		  return df;
		}
		
		function _setCookie(name, value) {
		  document.cookie=name+"="+value;
		}
		function cs_setCookie(name, value) {
		  setTimeout("_setCookie('"+name+"','"+value+"')",0);
		}
		
		function cs_getCookie(name) {
		  var cookieRE=new RegExp(name+"=([^;]+)");
		  if (document.cookie.search(cookieRE)!=-1) {
			return RegExp.$1;
		  }
		  else {
			return "";
		  }
		}
		
		// ----
		function addListGroup(n,tm) {
		  if (cs_goodContent) {
			cs_curTop=new cs_topmenuOBJ(tm); cs_curSub=null;
		
			var c=cs_findContent(n);
			if (c==null) {
			  cs_content[cs_content.length]=new cs_contentOBJ(n,cs_curTop);
			}
			else {
			  delete(c.menu); c.menu=cs_curTop;
			}
		  }
		}
		
		function addList(n,dis,link,sub,df) {
		  if (cs_goodContent) {
			cs_curSub=cs_findMenu(n);
		
			if (cs_curSub!=null) {
			  cs_curSub.addM(dis,link||"",sub);
			  if (typeof(df)!="undefined") { cs_curSub.df=cs_curSub.items.length-1; }
			}
			else {
			  cs_badContent(n);
			}
		  }
		}
		
		function addOption(n,dis,link,df) {
		  if (cs_goodContent) {
			cs_curSub=cs_findMenu(n);
		
			if (cs_curSub!=null) {
			  cs_curSub.addL(dis,link||"");
			  if (typeof(df)!="undefined") { cs_curSub.df=cs_curSub.items.length-1; }
			}
			else {
			  cs_badContent(n);
			}
		  }
		}
		
		function initListGroup(n) {
		  var _content=cs_findContent(n), count=0;
		  if (_content!=null) {
			content=new cs_contentOBJ("cs_"+n,_content.menu);
			cs_content[cs_content.length]=content;
		
			for (var i=1; i<initListGroup.arguments.length; i++) {
			  if (typeof(arguments[i])=="object" && arguments[i].tagName && arguments[i].tagName=="SELECT") {
				content.lists[count]=arguments[i];
		
				arguments[i].onchange=cs_updateList;
				arguments[i].content=content; arguments[i].idx=count++;
			  }
			  else if (typeof(arguments[i])=="string" && /^[a-zA-Z_]\w*$/.test(arguments[i])) {
				content.cookie=arguments[i];
			  }
			}
		
			if (content.lists.length>0) {
			  cs_initListGroup(content,content.cookie);
			}
		  }
		}
		
		function resetListGroup(n) {
		  var content=cs_findContent("cs_"+n);
		  if (content!=null && content.lists.length>0) {
			cs_initListGroup(content,"");
		  }
		}
		</script>
		<script language="JavaScript" type="text/JavaScript">
		//var hide_empty_list=true; //uncomment this line to hide empty selection lists
		var disable_empty_list=true; //uncomment this line to disable empty selection lists
		
		var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 
		
		var newwindow=0 //Open links in new window or not? 1=yes, 0=no.
		/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////
		<?php echo $lists['JavaScript']; ?>
		</script>

		<table class="adminlist">
		<tr>
			<th width="2%" class="title">
			#
			</th>
			<th class="title">
			<?php echo _JACL_ACO_SECTION; ?> </th>
			<th class="title" >
			<?php echo _JACL_ACO_VALUE; ?> </th>
			<th class="title">
			<?php echo _JACL_ARO_SECTION; ?> </th>
			<th class="title" >
			<?php echo _JACL_ARO_VALUE; ?> </th>
			<th class="title">
			<?php echo _JACL_AXO_SECTION; ?> </th>
			<th class="title" >
			<?php echo _JACL_AXO_VALUE; ?> </th>
			<th class="title" >
			<?php echo _JACL_ACL_ENABLE; ?> </th>
			<th width="3%" class="title">
			<!-- <input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count($rows); ?>);" /> -->
			<?php echo _JACL_ACO_ADD_REMOVE; ?>
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row 	=& $rows[$i];
			if ($canEdit) {
				$link 	= 'javascript: specialbutton(\'removeACL\',\''.$row->id.'\',\''.$row->enable.'\');';
				$link2 	= 'javascript: specialbutton(\'editACL\',\''.$row->id.'\',\''.$row->enable.'\');';
			} else {
				$link 	= 'javascript: void(0);';
				$link2 	= 'javascript: void(0);';
			}
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $i+1;?>
				</td>
				<td>
				<?php echo $row->aco_section; ?>
				</td>
				<td>
				<?php echo $row->aco_value; ?>
				</td>
				<td>
				<?php echo $row->aro_section; ?>
				</td>
				<td>
				<?php echo $row->aro_value; ?>
				</td>
				<td>
				<?php echo $row->axo_section; ?>
				</td>
				<td>
				<?php if(is_numeric($row->axo_value)) echo "id: "; echo $row->axo_value; ?>
				</td>
				<td>
				<a href="<?php echo $link2; ?>" title="<?php echo _JACL_ACL_EDIT_TAG; ?>">
				<?php echo $row->enable ? _JACL_ACL_YES : _JACL_ACL_NO ; ?>
				</a>
				</td>
				<td>
				<a href="<?php echo $link; ?>" title="<?php echo _JACL_ACO_REMOVE_TAG; ?>">
				<?php echo _JACL_ACO_REMOVE; ?>
				</a>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		if ($canEdit) {
		?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $i+1;?>
				</td>
				<td>
				<?php echo $lists['aco_section']; ?>
				</td>
				<td>
				<?php echo $lists['aco_value']; ?>
				</td>
				<td>
				users
				</td>
				<td>
				<?php echo strtolower($group_info->name); ?>
				</td>
				<td>
				<?php echo $lists['axo_section']; ?>
				</td>
				<td>
				<?php echo $lists['axo_value']; ?>
				</td>
				<td>
				<?php echo $lists['yes_no']; ?>
				</td>
				<td>
				<a href="javascript: submitbutton('addACL');" title="<?php echo _JACL_ACL_ADD_TAG; ?>">
				<?php echo _JACL_ACL_ADD; ?>
				</a>
				</td>
			</tr>
			<?php $k = 1 - $k; ?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $i+2;?>
				</td>
				<td>
				<input type="text" name="aco_section2" class="inputbox" style="width:100px;"/>
				</td>
				<td>
				<input type="text" name="aco_value2" class="inputbox" style="width:100px;"/>
				</td>
				<td>
				users
				</td>
				<td>
				<?php echo strtolower($group_info->name); ?>
				</td>
				<td>
				<input type="text" name="axo_section2" class="inputbox" style="width:100px;"/>
				</td>
				<td>
				<input type="text" name="axo_value2" class="inputbox" style="width:120px;"/>
				</td>
				<td>
				<?php echo $lists['yes_no2']; ?>
				</td>
				<td>
				<a href="javascript: submitbutton('addACL2');" title="<?php echo _JACL_ACL_ADD_TAG; ?>">
				<?php echo _JACL_ACL_ADD; ?>
				</a>
				</td>
			</tr>
			<tr>
				<td colspan="6">
				<?php 
				$link 	= 'index2.php?option='.$option.'&amp;task=editA&amp;id='. $my->gid. '&amp;hidemainmenu=1';
				echo _JACL_ACL_ADD_MSG; ?> 
				<a href="<?php echo $link; ?>" target="_blank">
				<?php echo _JACL_G_YOUR_ACL; ?>
				</a>
				</td>
			</tr>
		<?php } ?>
		</table>
		<script language="JavaScript" type="text/JavaScript">
		initListGroup('chainedmenu', document.adminForm.aco_section, document.adminForm.aco_value, document.adminForm.axo_section, document.adminForm.axo_value);
		</script>
		<?php
	}

	function showAccess( &$rows, $pageNav, $option ) {
		global $_config;
		?>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="user">
			<?php echo _JACL_A_MANAGER; ?>
			</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<?php echo _JACL_A_DEFAULT; ?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="2%" class="title">
			#
			</th>
			<th width="3%" class="title">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title">
			<?php echo _JACL_A_NAME; ?>
			</th>
			<?php if ($_config->getCfg('show_alstat')) { ?>
			<th class="title" width="30">
			<?php echo _JACL_A_SECTIONS; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_CATEGORIES; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_CONTENTS; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_CONTACT_DETAILS; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_MAMBOTS; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_MENU; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_MODULES; ?>
			</th>
			<th class="title" width="30">
			<?php echo _JACL_A_POLLS; ?>
			</th>
			<?php } ?>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row 	=& $rows[$i];

			$link 	= 'index2.php?option='.$option.'&amp;task=editALA&amp;id='. $row->id. '&amp;hidemainmenu=1';
			if ($_config->getCfg('show_alstat')) $row->stats = AccessStats($row->id);
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->limitstart+$i+1;?>
				</td>
				<td>
				<?php echo mosHTML::idBox( $i, $row->id ); ?>
				</td>
				<td>
				<a href="<?php echo $link; ?>">
				<?php echo $row->name; if($row->id <= 2) echo _JACL_ASTERISK;?>
				</a>
				</td>
				<?php if ($_config->getCfg('show_alstat')) foreach($row->stats as $stat) { ?>
				<td align="center">
				<?php echo $stat;?>
				</td>
				<?php } ?>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="listAL" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function editaccess( $option, $id, $lists ) {
		global $my, $acl;
		global $mosConfig_live_site;
		if($id==-1){
			$isNew = true;
		}else{
			$isNew = false;
		}
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancelAL') {
				submitform( pressbutton );
				return;
			}
			var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");

			// do field validation
			if (trim(form.name.value) == "") {
				alert( "<?php echo _JACL_A_PROVIDE_NAME; ?>" );
			} else if (r.exec(form.name.value) || form.name.value.length < 3) {
				alert( "<?php echo _JACL_A_INVALID_CHARS; ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="group">
			<?php echo _JACL_A_ID; ?> <small><?php echo $isNew ? _JACL_ADD : _JACL_EDIT;?></small>
			</th>
		</tr>
		</table>

		<table width="100%">
		<tr>
			<td width="60%" valign="top">
				<table class="adminform">
				<tr>
					<th colspan="2">
					<?php echo _JACL_A_DETAILS; ?>
					</th>
				</tr>
				<tr>
				  <td><?php echo _JACL_A_ID; ?> </td>
				  <td><?php echo $isNew ? _JACL_NEW : $id;?>&nbsp;</td>
				  </tr>
				<tr>
					<td width="100">
					<?php echo _JACL_ACCESS_LEVEL_NAME; ?>
					</td>
					<td width="85%">
					<?php echo $lists['name']; ?>
					</td>
				</tr>
				</table>
			</td>
		  </tr>
		</table>

		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="jaclplus" value="" />
		</form>
		<?php
	}

    function Configuration(&$lists, &$_config, $option) {
        global $mosConfig_absolute_path, $mosConfig_live_site, $_VERSION;
        $tabs = new mosTabs(0);

        ?>
       
        <div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<style>
			.title { background-color: #EEE; font-weight:  bold; border-bottom: 1px solid #BBB; }
			.checkList label { padding-left: 10px; }
			select option.label { background-color: #EEE; border: 1px solid #DDD; color : #333; }
		</style>
		
        <table class="adminheading">
        <tr>
           	<th class="config"><?php echo _JACL_CONFIGURATION; ?><span class="componentheading">
			<?php echo basename($_config->_path); ?> is :
			 <?php echo is_writable($_config->_path) ? '<b><font color="green">Writable</font></b>' : '<b><font color="red">Unwritable</font></b>' ?>
			</span></th>
       	</tr>
        </table>

        <script language="javascript" type="text/javascript">
            function submitbutton(pressbutton) {
                var form = document.adminForm;
                if (pressbutton == 'cancel') {
                    submitform( pressbutton );
                    return;
                }
			  $msg = "";
			  if (form.publish_alstype.value==4 && !isSelected(form.access)) {
				$msg = "\n<?php echo _JACL_G_ASSIGN_A ;?>";
			  }
			  if ( $msg != "" ){
					$msghdr = "<?php echo _JACL_ENTRY_ERRORS; ?>";
					$msghdr += '\n=================================';
					alert( $msghdr+$msg+'\n' );
			  } else {
				   submitform( pressbutton );
			  }
			}
			function isSelected(form_element) {
				var form = document.adminForm;
				var isSelected = false;
				form.publish_jaclplus.value = "";
				for (i=0; i < form_element.length; i++) {
					if (form_element.options[i].selected) {
						isSelected = true;
						form.publish_jaclplus.value += form_element.options[i].value + ",";
					}
				}
				form.publish_jaclplus.value = form.publish_jaclplus.value.substr(0, form.publish_jaclplus.value.length-1);
				return isSelected;
			}
        </script>
        <form action="index2.php?option=<?php echo $option; ?>&task=saveConfig" method="post" name="adminForm" id="adminForm">

        <?php
        $tabs->startPane("configPane");
        $tabs->startTab(_JACL_GENERAL, "general-page");

        ?>

    <table class="adminform">
        <tr>
            <td width="250"><?php echo _JACL_VERSION; ?></td>
            <td width="100"><?php echo $_config->getCfg('jaclplus_version'); ?></td>
            <td>&nbsp;<input type="hidden" name="jaclplus_version" value="<?php echo $_config->getCfg('jaclplus_version'); ?>" /></td>
        </tr>
        <tr>
            <td width="250"><?php echo _JACL_URL; ?></td>
            <td width="100"><a href="<?php echo $_config->getCfg('jaclplus_url'); ?>" title="<?php echo $_config->getCfg('jaclplus_url'); ?>" target="_blank"><?php echo $_config->getCfg('jaclplus_url'); ?></a></td>
            <td>&nbsp;<input type="hidden" name="jaclplus_url" value="<?php echo $_config->getCfg('jaclplus_url'); ?>" /></td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_ENABLEJACLPLUS; ?></td>
            <td><?php echo $lists['enable_jaclplus']; ?></td>
            <td>&nbsp;</td>
        </tr>
    </table>
        <?php
        $tabs->endTab();
        $tabs->startTab(_JACL_FRONTEND, "frontend-page");
        ?>

    <table class="adminform">
        <tr>
        	<td class="title" colspan="3"><?php echo _JACL_ADVANCE_SETTINGS; ?></td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_AUTO_DISABLECACHE; ?></td>
            <td width="100"><?php echo $lists['auto_disablecache']; ?></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_EDIT_ACCESSONLY; ?></td>
            <td width="100"><?php echo $lists['edit_accessonly']; ?></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_PUBLISH_FRONTPAGE; ?></td>
            <td width="100"><?php echo $lists['publish_frontpage']; ?></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_LIMIT_EDIT; ?></td>
            <td width="100"><?php echo $lists['limit_edit']; ?></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_LIMIT_EDITOWN; ?></td>
            <td width="100"><?php echo $lists['limit_editown']; ?></td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td width="250"><?php echo _JACL_CFG_REQUIRE_PUBLISH; ?></td>
            <td width="100"><?php echo $lists['require_publish']; ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_PUBLISH_ALTYPE; ?></td>
            <td><?php echo $lists['publish_alstype']; ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><?php echo _JACL_CFG_SPECIFIED_JACL; ?></td>
            <td><?php echo $lists['access']; ?></td>
            <td>&nbsp;<input type="hidden" name="publish_jaclplus" value="<?php echo $_config->getCfg('publish_jaclplus'); ?>" /></td>
        </tr>
        <tr>
            <td valign="top"><?php echo _JACL_CFG_NOAUTH_LINK; ?></td>
            <td><input type="text" name="noauth_link" value="<?php echo $_config->getCfg('noauth_link'); ?>" size="50" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><?php echo _JACL_CFG_NOAUTH_TEXT; ?></td>
            <td><input type="text" name="noauth_text" value="<?php echo htmlentities($_config->getCfg('noauth_text')); ?>" size="50" /></td>
            <td>&nbsp;</td>
        </tr>
    </table>
        <?php
        $tabs->endTab();
        $tabs->startTab(_JACL_BACKEND, "backend-page");
        ?>
    <table class="adminform">
        <tr>
            <td width="250"><?php echo _JACL_CFG_SHOW_UGSTAT; ?></td>
            <td width="100"><?php echo $lists['show_ugstat']; ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_SHOW_ALSTAT; ?></td>
            <td><?php echo $lists['show_alstat']; ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_CONTENT_LIMIT; ?></td>
            <td><input type="text" name="content_limit" value="<?php echo $_config->getCfg('content_limit'); ?>" size="5" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_CATEGORY_LIMIT; ?></td>
            <td><input type="text" name="category_limit" value="<?php echo $_config->getCfg('category_limit'); ?>" size="5" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_CFG_SECTION_LIMIT; ?></td>
            <td><input type="text" name="section_limit" value="<?php echo $_config->getCfg('section_limit'); ?>" size="5" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo _JACL_ADD_ANY_ACR; ?></td>
            <td><?php echo $lists['admin_acltoany']; ?></td>
            <td>&nbsp;</td>
        </tr>
    </table>
        <?php 
		$tabs->endTab();
        $tabs->endPane();
		?>
        <input type="hidden" name="id" value="">
        <input type="hidden" name="task" value="">
        <input type="hidden" name="option" value="<?php echo $option; ?>">
    </form>
    <?php
    } 
}
?>