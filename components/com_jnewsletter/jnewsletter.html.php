<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 class frontHTML {

	 function formStart($title='', $html=0, $javascriptType='') {

	 if(!$GLOBALS[ACA.'disabletooltip']){
		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			JHTML::_('behavior.tooltip');
		}//endif
	 }//endif
	 ?>
		 <script language="javascript" type="text/javascript">
	<?php switch ($javascriptType) {
		case 'name_email':
			?>
			function submitbutton(task) {
				var form = document.mosForm;

				if (form.name.value == "") {
					alert( "<?php echo addslashes(_ACA_REGWARN_NAME);?>" );
				} else if (form.email.value == "") {
					alert( "<?php echo addslashes(_ACA_REGWARN_MAIL);?>" );
				} else {
					form.task.value = task;
					form.submit();
				}
			}
			<?php
			break;
		case 'edit_mailing':
				break;
			case 'show_mailing':
			?>
				function checkcid(myField) {
					myField.checked = true;
					isChecked(true);
				}
			<?php
				break;
			case 'unsubscribe':
				?>
				function submitbutton(task) {
					var form = document.mosForm;
						form.task.value = task;
						form.submit();
				}
				<?php
				break;
		case 'cron':
			?>
			function submitbutton(task) {
				var form = document.mosForm;

				if (form.siteurl.value.length < 14) {
					alert( "<?php echo addslashes(_ACA_CRON_SITE_URL) ;?>" );
				} else {
					form.task.value = task;
					form.submit();
				}
			}
			<?php
			break;
			default:
			?>
				function submitbutton(task) {
					var form = document.mosForm;
						form.task.value = task;
						form.submit();
				}
			<?php
				break;
		 }; ?>
		 </script>
		 <link rel="stylesheet" href="components/com_jnewsletter/css/jnewsletter.css" type="text/css" >
		 <div class="componentheading"><?php echo $title; ?></div>
 		<?php
 	 }

	function formEndFN($button='', $values='') {
	 	global $Itemid;
		echo '<div style="clear:both"></div>';
		if (!empty($values)) {
			foreach ($values as $value) {
				echo '<input type="hidden" name="'.$value->name.'" value="'.$value->value.'" />';
			}
		}
		echo '<input type="hidden" name="option" value="com_jnewsletter" />';
    	echo '<input type="hidden" name="boxchecked" value="0" />';
       	echo '<input type="hidden" name="Itemid" value="'.$Itemid.'" />' ;
		if (!empty($button)) echo '<input type="submit" value="'.$button.'" class="button"/>';
		echo 'aaa</form> ';
	}

	 function formEnd($button='', $values='') {
	 	global $Itemid;
		echo '<div style="clear:both"></div>';
		if (!empty($values)) {
			foreach ($values as $value) {
				echo '<input type="hidden" name="'.$value->name.'" value="'.$value->value.'" />';
			}
		}
		echo '<input type="hidden" name="option" value="com_jnewsletter" />';
		echo '<input type="hidden" name="task" value="" />';
    	echo '<input type="hidden" name="boxchecked" value="0" />';
    	echo '<input type="hidden" name="Itemid" value="'.$Itemid.'" />' ;
		if (!empty($button)) echo '<input type="submit" value="'.$button.'" class="button"/>';
		echo 'bbb</form> ';
	 }

	 function formEndYesNo($link, $cle, $subscriberId, $listId) {
		echo '<input type="submit" class="button" value="'._CMN_YES.'" /> '."\n\r";
		echo '<input type="hidden" name="listid" value="'.$listId.'" /> '."\n\r";
		echo '<input type="hidden" name="subscriber" value="'.$subscriberId.'" /> '."\n\r";
		echo '<input type="hidden" name="cle" value="'.$cle.'" /> '."\n\r";
		echo ' <br /><a href="'.$link.'">' ._ACA_SUBSCRIPTION_OR. '</a>' ;
		echo '</form> ';
	 }
	 function _header($message) {
		echo '<div Style="text-align:center;">';
		echo $message;
		echo '</div>';
	 }
	function _footer() {
		if ($GLOBALS[ACA.'show_footer']) {
			backHTML::_footerSignature();
		} else {
			echo jnewsletter::noShow();
		}
    }
	function showPanel() {
		global $Itemid;

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
			$my	=& JFactory::getUser();
		}//endif

		if ( isset($my->id) && $my->id>0 ) {

			if ( !empty($my->username) ) {
				$greeting_message = _HI.' '. $my->username;
			} else {
				$greeting_message = '';
			}
			backHTML::controlPanelBottonStart(_UCP_USER_MENU , 'cpanel.png');

			$link = '.php?option=com_jnewsletter&act=show&Itemid='.$Itemid;
			compa::completeLink($link,false);

			backHTML::quickiconButton( $link, 'addusers.png', _UCP_USER_CONTACT ,  false, 'Registered' , false);
			if ( class_exists('pro')  ) {

				$aro_id = ( isset($my->id) && $my->id>0 ) ? $acl->get_object_id( 'users', $my->id, 'ARO' ) : 1;
				$qacl = "SELECT `group_id` FROM `#__core_acl_groups_aro_map` WHERE `aro_id` =".$aro_id;
				$database->setQuery( $qacl );
				$usergid = $database->loadResult();
				$gidAdmin = $acl->get_group_id( 'Administrator' , 'ARO' );
				$ex_groups = $acl->get_group_children( $gidAdmin , 'ARO',  'RECURSE' );
				$ex_groups[] = $gidAdmin;
				if ( in_array( $usergid, $ex_groups) ) {

				    $link = '.php?option=com_jnewsletter&act=list&Itemid='.$Itemid;
				    compa::completeLink($link,false);

				    backHTML::quickiconButton( $link, 'addedit.png', _ACA_MENU_LIST , false, 'admin' , false);
				} else {

					$lists = lists::getLists(0, 0, true );
					$access = false;
					foreach( $lists as $list ) {
						$bit = jnewsletter::checkPermissions('hello', 0, $list->acc_level );
						if ( $bit ) {
							$access = true;
							break;
						}
					}


				    $link = '.php?option=com_jnewsletter&act=list&Itemid='.$Itemid;

				    compa::completeLink($link,false);

				    if ($access) backHTML::quickiconButton( $link, 'addedit.png', _ACA_MENU_LIST , false, 'Registered' , false);
				}
			} else {

			    $link = '.php?option=com_jnewsletter&act=list&Itemid='.$Itemid;
			    compa::completeLink($link,false);

			    backHTML::quickiconButton( $link, 'addedit.png', _ACA_MENU_LIST , false, 'admin' , false);
			}

			backHTML::controlPanelBottomEnd();
			if (class_exists('auto')) auto::otherPanel();
		}
	}
	 function login() {

	 }
 }