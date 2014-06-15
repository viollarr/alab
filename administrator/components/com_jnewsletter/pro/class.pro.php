<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

require_once( WPATH_ADMIN . 'plugins' .DS. 'class.autonews.php' );
require_once( WPATH_ADMIN . 'pro' .DS. 'class.archive.php' );
require_once( WPATH_ADMIN . 'pro' .DS. 'class.aca_tags.php' );
require_once( WPATH_ADMIN . 'pro' .DS. 'class.form.php' );

class pro {

	function updateAccess() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$listTypeIds = explode( ',' , $GLOBALS[ACA.'activelist']);
		$listTypeIds = array_diff($listTypeIds, array( 5 , 9 ) );

		if ( !empty($listTypeIds) ) {
			foreach( $listTypeIds as $key => $type ) {

				$lists = lists::getLists( 0 , $type );
				if ( !empty($lists) ) {
					foreach( $lists as $list ) {

						if ( $list->id >0 ) {

							$query = 'UPDATE `#__jnews_queue` SET ';
							$query .= ' `acc_level` = ' . $list->acc_id ;
							//$query .= ' WHERE `list_id` = '.$list->id; //no list id
							$query .= " AND `acc_level` != $list->acc_id" ;
							$database->setQuery( $query );
							$database->query();
							$erro->err = $database->getErrorMsg();

							$query = 'UPDATE `#__jnews_mailings` SET ';
							$query .= ' `acc_level` = ' . $list->acc_id ;
							$query .= ' WHERE `list_id` = '.$list->id; //no list id
							$query .= " AND `acc_level` != $list->acc_id" ;
							$database->setQuery( $query );
							$database->query();
							$erro->err = $database->getErrorMsg();

				       }//endif

					}//endif
				}//endif
			}//endforeach
		}//endif

//		pro::updateAccessJack();

	}//endfct

	function updateAccessJack() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
		}//endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$lists = lists::getLists(0,0, null, '', false, false, '', false);

		if ( !empty($lists)) {
			$oldUsers = array();
			foreach( $lists as $list ) {
				$groupAccess = $acl->get_group_children( $list->acc_id , 'ARO',  'RECURSE' );

				$groupAccess[] = $list->acc_id;

				$gidFront = $acl->get_group_id( 'Public Frontend' , 'ARO' );
				$ex_groups2 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
				$ex_groups2[] = $gidFront;

				if ( in_array( $list->acc_id , $ex_groups2 ) ) {
					$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );
					$ex_groups3 = $acl->get_group_children( $gidAdmin , 'ARO',  'RECURSE' );
					$ex_groups3[] = $gidAdmin;
					$groupAccess = array_merge( $groupAccess, $ex_groups3 );
				}//endif

				$access = implode( ',' , $groupAccess );

				$query = "SELECT  Q.qid FROM `#__jnews_queue` as Q ";
				$query .= " LEFT JOIN `#__jnews_subscribers` as S ON Q.subscriber_id = S.id ";
				$query .= " LEFT JOIN `#__core_acl_aro` as A ON S.user_id = A.value ";
				$query .= " LEFT JOIN `#__core_acl_groups_aro_map` as M ON A.aro_id = M.aro_id ";

				$query .= "  WHERE  S.user_id !=0 ";
				//$query .= "  AND  Q.list_id = ".$list->id; //no list id
				$query .= "  AND  M.group_id NOT IN ( $access ) ";

				$database->setQuery( $query );
				$oldUser = $database->loadResultArray();
				$erro->err = $database->getErrorMsg();
				$oldUsers = array_merge( $oldUsers, $oldUser );

			}//endforeach

			return queue::deleteQueues( $oldUsers );

		}//endif

	}//endfct



	function cleanup() {

		$xf = new xonfig();
		$maxFreq = ( isset($GLOBALS[ACA.'maintenance_clear']) ) ? $GLOBALS[ACA.'maintenance_clear'] : 24;
		$newTask= mktime(date("H")-$maxFreq+ ACA_TIME_OFFSET, date("i"), date("s"), date("m"), date("d") ,  date("Y"));
		if (  $newTask > strtotime($GLOBALS[ACA.'maintenance_date']) ) {
			pro::updateAccess();
			if ( (int)$GLOBALS[ACA.'frequency'] > 0 ) aca_archive::archive();
/*commented by mary*/ //$xf->update('maintenance_date', jnewsletter::getNow() );
			$delay=0;
			$xf->update('maintenance_date', date( 'Y-m-d H:i:s',  time() + ACA_TIME_OFFSET *60*60 + ($delay*60) - date('Z')) );
		}//endif

	}//endfct

	function editTab($listEdit, $lists, $show, $html) {

	?>
	<fieldset class="jnewslettercss">
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							$tip = _ACA_INFO_LIST_ACCESS_EDIT;
							$title = _ACA_LIST_ACCESS_EDIT;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
						<?php echo $lists['edit_perms'];?>
					</td>
				</tr>
		</tbody>
	</table>
	</fieldset>
	<?php


	}//endfct



		 function showListingLists($lists, $action, $task, $forms, $show) {
			global $Itemid;
			$item = '&Itemid=' . $Itemid ;
			$show['id'] = true;
			$show['published'] = true;
			$show['sender'] = true;
			$show['sender_email'] = false;
			$show['list_type'] = true;
			$show['visible'] = true;
			$show['mailings_link'] = true;
			$show['front'] = true;
			$show['color'] = true;
			if ( jnewsletter::checkPermissions('admin' ) && $show['index'] != 'index' ) $show['mailings_sub'] = true;
			else $show['mailings_sub'] = false;

			echo $forms['main'];
			echo '<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist"><tr>';

			if ($show['id']) echo '<th width="2%" class="title">id#</td>';
			if ($show['select']) echo '<th width="3%" class="title"></th>' ;
			if ($show['published']) echo '<th width="5%" class="title">'. _ACA_PUBLISHED.  '</th>' ;
			//if ($show['color']) echo '<th width="5%" class="title">Color</th>' ;
			echo '<th width="30%" class="title">'. _ACA_LIST_NAME . '</th>';
			if ($show['sender']) echo '<th width="20%" class="title">'.  _ACA_LIST_SENDER. ' </th>' ;
			if ($show['sender_email']) echo ' <th width="15%" class="title">'.  _ACA_SENDER_EMAIL . '</th>';
			if ($show['mailings_link']) echo '<th width="17%" class="title">' . _ACA_MENU_MAILING_TITLE . '</th>' ;
			if ($show['mailings_sub']) echo '<th width="17%" class="title">' . _ACA_SUBSCRIBER_CONFIG . '</th>' ;
			if ($show['list_type']) echo '<th width="10%" class="title">' . _ACA_LIST_TYPE . '</th>' ;
			if ($show['visible']) echo '<th width="5%" class="title">' .  _ACA_VISIBLE . '</th>' ;
			if ($show['buttons']) {
				echo '<th class="title" width="90"><center>' .  _ACA_SUBSCRIB . '</center></th>' ;
				if ($GLOBALS[ACA.'show_archive']=='1') {
					echo '<th class="title" width="90"><center>' .  _ACA_VIEW_ARCHIVE . '</center></th>' ;
				}//endif
			}//endif
			echo '</tr>';

			$i = 0;
			foreach ($lists as $list) {

				if ( jnewsletter::checkPermissions('hello', 0, $list->acc_level ) ) {
					$show['id'] = true;
					$show['published'] = true;
					$show['sender'] = true;
					$show['sender_email'] = false;
					$show['list_type'] = true;
					$show['visible'] = true;
					$show['mailings_link'] = true;
					$show['front'] = true;
					$show['color'] = true;

				} else {
					$show['id'] = false;
					$show['published'] = false;
					$show['sender'] = false;
					$show['sender_email'] = false;
					$show['list_type'] = false;
					$show['visible'] = false;
					$show['mailings_link'] = false;
					$show['front'] = true;
					$show['color'] = false;
				}//endif


				$i++;
				if (($list->list_type == 1 or $list->list_type =='7')) {
					if ($show['front']) {
						$linkArchive = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item ;
					} else {
						$linkArchive = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item ;
					}//endif
				} else {
					$linkArchive = '#';
				}//endif
				compa::completeLink($linkArchive,false);

				if ($list->published == 1) {
						$img = 'publish_g.png';
					   $alt = 'Published';
				} else if ($list->published == 2) {
						$img = 'publish_y.png';
					   $alt = 'Scheduled';
				} else {
						$img = 'publish_x.png';
					   $alt = 'Unpublished';
				}//endif
			?>
			<tr class="row<?php echo ($i % 2); ?>">

				<?php 	if ($show['id']) echo '<td width="2%" class="title"><center>' . $list->id . '<center></td>';
							else echo '<td width="2%" class="title"><center>-<center></td>';
				?>
				<?php 	if ($show['select']) { ?>
				<td><input type="radio" name="listid" value="<?php echo $list->id; ?>" onclick="isChecked(this.checked);" /></td>
				<?php }
				if ($show['published']) {
				 ?>
				<td align="center"><center>
					<img src="<?php echo ACA_JPATH_LIVE; ?>/administrator/images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
				</center></td>
				<?php } else {
				 ?>
				<td align="center"><center>-</center></td>
				<?php }

				/*lala
				if ($show['color']){
			  	$doc =& JFactory::getDocument(); //lala
              	$doc->addStyleSheet(ACA_PATH_ADMIN.DS.'cssadmin'.DS.'jnewsletter.css');
				?>
				<td align="center">
				<div id="circs" style="background-color:<?php echo $list->color?>;"></div></td>
				<?php }
				*/

				if ($show['index'] == 'index') {
					if ( jnewsletter::checkPermissions('admin' ) ) {
						$link = '.php?option=com_jnewsletter&act=' . $action . '&task=' .$task . '&listid=' . $list->id . $item;
					} elseif ( jnewsletter::checkPermissions('admin', 0, $list->acc_level ) ) {
						$link =  '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id . '&listype=' .$list->list_type . $item ;
					} else {
						$link = $linkArchive;
					}
					compa::completeLink($link,false);

				} else {
					if ( jnewsletter::checkPermissions('admin' ) ) {
						$link = '.php?option=com_jnewsletter&act=' . $action . '&task=' .$task . '&listid=' . $list->id . $item;
					} else {
						$link =  '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id . '&listype=' .$list->list_type . $item ;
					}
					compa::completeLink($link);
				}
				if ( $show['index'] == 'index2' ) compa::completeLink($link);
				?>
				<td>
					<span class="aca_letter_names"
					<?php if ($link == "#") {echo" onclick='return false;' ";} ?>
					>
					<?php echo compa::toolTip( $list->list_desc, $list->list_name, '' , '',  $list->list_name , $link, 1 ); ?>
					</span>
				</td>
				<?php
				if ($show['sender'])  echo '<td><center>' . $list->sendername . '</center></td>';
				else   echo '<td><center>-</center></td>';
				if ($show['sender_email']) echo ' <td width="20%" class="title"><center>'.  $list->senderemail . '</center></td>';

				if ($show['mailings_link']) {

					if ($show['index'] == 'index') {
						$link =  '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id . '&listype=' .$list->list_type . $item ;
					} else {
						$link = '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id . '&listype=' .$list->list_type . $item;
					}
					if ( $show['index'] == 'index2' ) compa::completeLink($link);
					else compa::completeLink($link,false);

				 ?>
					<td><center><a href="<?php echo $link; ?>"><?php echo _ACA_MALING_EDIT_VIEW; ?></a></center></td>
				<?php } else {
				?>
					<td><center>-</center></td>
				<?php
				}
				if ($show['mailings_sub']) {

				 ?>
					<td><center><a href="<?php echo $link; ?>"> <?php echo _ACA_SUBCRIBERS_VIEW; ?></a></center></td>
				<?php }

				if ($show['list_type']) {

				 ?>
					<td><center><a
					<?php if ($link == "#"){echo " onclick='return false;' ";}

					if ($show['index'] == 'index') {
						$link = '.php?option=com_jnewsletter&act=mailing&listype=' .$list->list_type . $item ;
						compa::completeLink($link,false);
					} else {
						$link = $show['index'].'.php?option=com_jnewsletter&act=mailing&listype=' .$list->list_type;
					}
				?>
					href="<?php	echo $link;  ?>" ><?php	echo @constant( $GLOBALS[ACA.'listname'.$list->list_type] );  ?></a></center></td>
				<?php } else {
				?>
					<td><center>-</center></td>
				<?php
				}
					if ($show['visible']) {

						 if ($list->hidden == 1) {

							 $img = '16/status_g.png';
						 } else {

							 $img = '16/status_x.png';
						 }
				?>
				<td height="20"><center><img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img; ?>" width="12" height="12" border="0" alt="" /></center></td>
				<?php	} else {
				?>
					<td><center>-</center></td>
				<?php
				}
				if ($show['buttons']) {

				$backendLink = $show['index'] == 'index' ? false : true;
				$link = '.php?option=com_jnewsletter&act=subone&listid=' .$list->id . $item;
				compa::completeLink($link,$backendLink);

				$img = 'folder_add_f2.png';
				echo '<td align="center" height="24"><center>';
				echo '<a href="' . $link. '" >'."\n\r" ;
				echo '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" border="0" alt="" /></a></center></td>'."\n\r" ;

				if (($list->list_type == 1 or $list->list_type == 7) AND $GLOBALS[ACA.'show_archive']=='1') {

					$linkArchive = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item;
					compa::completeLink($linkArchive,$backendLink);

					$img = 'move_f2.png';
					echo '<td height="24"><center>';
					echo '<a href="' . $linkArchive. '" >'."\n\r" ;
					echo '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" border="0" alt="'._ACA_VIEW_ARCHIVE.'" /></a></center></td>'."\n\r" ;
				} elseif($GLOBALS[ACA.'show_archive']=='1') {
					echo '<td height="24"><center>-</center></td>'."\n\r";
				}
			}

		echo '	</tr>'."\n\r";
		}
		echo '</table>';
	}
 }
