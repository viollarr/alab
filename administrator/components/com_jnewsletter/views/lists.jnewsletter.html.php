<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 class listsHTML {

	 function showListingLists($lists, $action, $task, $forms, $show, $listsearch='', $limit=0, $setLimit=null ) {
		global $Itemid,$mainframe;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}//endif

		$loggedin = false;
		 if ($my->id >0) {
			$loggedin = true;
		 }

		if(empty($Itemid) AND !$mainframe->isAdmin() and !empty($GLOBALS[ACA.'itemidAca'])){
			$Itemid = $GLOBALS[ACA.'itemidAca'];
		}

		if(!empty($Itemid)){
			$item = '&Itemid=' . $Itemid;
		}else{
			$item ='';
		}

		//only show the filter at the backend
		if($mainframe->isAdmin())
		{
			$filter = _ACA_FILTER_LIST .'  '. $forms['droplist'];
			$hidden = '<input type="hidden" name="limit" value="'.$limit.'" />';
		}//endif

		echo $forms['main'];

		// top portion before the table list
		if($mainframe->isAdmin())
		{
			// for search
			$toSearch = null;
			$toSearch->forms = $forms['select'];
			$toSearch->hidden = $hidden;
			$toSearch->listsearch = $listsearch;
			$toSearch->id = 'listsearch';

			echo jnewsletter::setTop( $toSearch, null, $setLimit, $filter );
		} //endif

		echo '<table class="joobilist"><thead><tr>';

		echo '<th width="2%" class="title">#</td>';
		if ($show['select']) echo '<th width="3%" class="title"></th>' ;
        //lala if ($show['color']) echo '<th width="3%" class="title"></th>' ;
		echo '<th width="30%" class="title"><center>'. _ACA_LIST_NAME . '</th>';
		if ($show['sender']) echo '<th width="20%" class="title"><center>'.  _ACA_LIST_SENDER. '</center> </th>' ;
		if ($show['sender_email']) echo ' <th width="15%" class="title"><center>'.  _ACA_SENDER_EMAIL . '</center></th>';
		if ($show['mailings_link']) echo '<th width="17%" class="title"><center>' . _ACA_MENU_MAILING_TITLE . '</center></th>' ;
		if ($show['mailings_sub']) echo '<th width="17%" class="title"><center>' . _ACA_SUBSCRIBER_CONFIG . '</center></th>' ;
		if ($show['list_type']) echo '<th width="10%" class="title"><center>' . _ACA_LIST_TYPE . '</center></th>' ;
		if ($show['visible']) echo '<th width="5%" class="title"><center>' .  _ACA_VISIBLE . '</center></th>' ;
		if ($show['published']) echo '<th width="5%" class="title"><center>'. _ACA_PUBLISHED.  '</center></th>' ;
		if ($show['buttons']) {
			if($GLOBALS[ACA.'allow_unregistered'] OR $loggedin){
				echo '<th class="title" width="90"><center>' .  _ACA_SUBSCRIB . '</center></th>' ;
			}
			if ($GLOBALS[ACA.'show_archive']=='1') {
				echo '<th class="title" width="90"><center>' .  _ACA_VIEW_ARCHIVE . '</center></th>' ;
			}
		}
		if ($show['id']) echo '<th width="2%" class="title">ID</th>';
		echo '</tr></thead>';
		$i = 0;
		foreach ($lists as $list) {
			$i++;
			if ($list->list_type == 1 or $list->list_type == 7) {
				$linkArchive = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item ;
			} else {
				$linkArchive = '#';
			}

		?>
		<tr class="row<?php echo ($i + 2) % 2; ?>">
			<?php $num = $i; echo '<td width="2%" class="title"><center>'.$num.'</center></td>'; ?>
			<?php 	if ($show['select']) { ?>
			<td><input type="radio" name="listid" value="<?php echo $list->id; ?>" onclick="isChecked(this.checked);" /></td>
			<?php }

            /*lala if ($show['color']){
			  $doc =& JFactory::getDocument(); //lala
              $doc->addStyleSheet(ACA_JPATH_LIVE.DS .'administrator'.DS.'components'.DS.'com_jnewsletter'.DS.'admin'.DS.'cssadmin'.DS.'jnewsletter.css');
			?>
			<td align="center">
			<div id="circs" style="background-color:<?php echo $list->color?>;"></div></td>
			<?php }
            */

			if ($show['index'] == 'index') {
				if ( jnewsletter::checkPermissions('admin' ) ) {
					$link = '.php?option=com_jnewsletter&act=' . $action . '&task=' .$task . '&listid=' . $list->id . $item;
				} else {
					$link = $linkArchive;
				}
				compa::completeLink($link,false);
			} else {
				$link = '.php?option=com_jnewsletter&act=' . $action . '&task=' .$task . '&listid=' . $list->id;
				compa::completeLink($link);
			}

			?>
			<td>
				<span class="aca_letter_names" <?php if ($link == "#" or $link == "administrator/#" ){echo " onclick='return false;' ";} ?>>
				<?php
					 echo compa::toolTip($list->list_desc ,$list->list_name, '' , '',  $list->list_name , $link, 1 );
				 ?>
				</span>
			</td>

			<?php
			if ($show['sender']) echo '<td>' . $list->sendername . '</td>';
			if ($show['sender_email']) echo ' <td width="20%" class="title">'.  $list->senderemail . '</td>';
			if ($show['mailings_link']) {

				$ltype = ( isset($list->list_type) && ( $list->list_type == 2 ) ) ? 2 : 1;

				if ($show['index'] == 'index') {
					$link =  '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id;
					if( !empty($ltype) ) $link .= '&listype='. $ltype;
					$link .= $item;
					compa::completeLink($link,false);
				} else {
					$link = '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id;
					if( !empty($ltype) ) $link .= '&listype='. $ltype;
					compa::completeLink($link);
				}

				/*if ($show['index'] == 'index') {
					$link =  '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id . $item ;
					compa::completeLink($link,false);
				} else {
					$link = '.php?option=com_jnewsletter&act=mailing&task=show&listid=' . $list->id;
					compa::completeLink($link);
				}*/
			 ?>
				<td><center><a href="<?php echo $link; ?>"> <?php echo _ACA_MALING_EDIT_VIEW; ?></a></center></td>
			<?php }
			if ($show['mailings_sub']) {

				if ($show['index'] == 'index') {
					$link = '.php?option=com_jnewsletter&act=subscribers&listid=' . $list->id. $item;
					compa::completeLink($link,false);
				} else {
					$link = '.php?option=com_jnewsletter&act=subscribers&listid=' . $list->id;
					compa::completeLink($link);
				}

			 ?>
				<td><center><a href="<?php echo $link; ?>"> <?php echo _ACA_SUBCRIBERS_VIEW; ?></a></center></td>
			<?php }
			if ($show['list_type'])
			{
                // Gino : modified the List Types text
				switch( $list->list_type )
				{
					case '1': $text = _ACA_LIST;
						break;
					case '2': $text = _ACA_CAMPAIGN;
						break;
					default : $text = _ACA_LIST;
						break;
				} //endswitch

				/*<td><a href="<?php	echo $link;  ?>" ><?php	echo @constant( $GLOBALS[ACA.'listname'.$list->list_type] );  ?></a></td>*/
			 ?>
				<td><center><?php echo $text;  ?></center></td>
			<?php }
				if ($show['visible']) {

					 if ($list->hidden == 1) {

						 $img = '16/status_g.png';
						 jnewsletter::getLegend( 'status_g.png', _ACA_VISIBLE .'/'. _ACA_TEMPLATE_PUBLISH );
					 } else {

						 $img = '16/status_r.png';
						 jnewsletter::getLegend( 'status_r.png',_ACA_NOTVISIBLE .'/'. _ACA_UNPUBLISHED );
					 }
			?>
			<td height="20"><center>
				<a href="<?php echo jnewsletter::createToggleLink( 'list', 'hidden', 'listid' , $list->id ); ?>"> <img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img; ?>" width="12" height="12" border="0" alt="" /> </a>
			</center></td>
			<?php }
				if ($show['published']) {
			 ?>
			<td align="center"><center>
				<?php
						if ($list->published == 1) {
							$img = '16/status_g.png';
						  	$alt = 'Published';
						  	jnewsletter::getLegend( 'status_g.png', _ACA_VISIBLE .'/'. _ACA_TEMPLATE_PUBLISH );
						} else if ($list->published == 2) {
							$img = '16/status_y.png';
							  $alt = 'Scheduled';
							  jnewsletter::getLegend( 'status_y.png', _ACA_SCHEDULED );
						} else {
							$img = '16/status_r.png';
							 $alt = 'Unpublished';
							 jnewsletter::getLegend( 'status_r.png', _ACA_NOTVISIBLE .'/'. _ACA_UNPUBLISHED );
						}
					$status = ( !empty($list->published) && ( $list->published == 1 ) ) ? 'unpublish' : 'publish';
				?>
				<a href="<?php echo jnewsletter::createToggleLink( 'list', $status, 'listid' , $list->id, 'togle' );  ?>"> <img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" /> </a>
			</center></td>
			<?php }

			?>


	<?php
		if ($show['buttons']) {
			$backendLink = $show['index'] == 'index' ? false : true;

			if($GLOBALS[ACA.'allow_unregistered'] OR $loggedin){

				$link = '.php?option=com_jnewsletter&act=subone&listid=' .$list->id . $item ;
				compa::completeLink($link,$backendLink);

				$img = 'folder_add_f2.png';
				echo '<td align="center" height="24"><center>';
				echo '<a href="' . $link. '" >'."\n\r" ;
				echo '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" border="0" alt="" /></a></center></td>'."\n\r" ;
			}
			if (($list->list_type == 1 or $list->list_type == 2) && $GLOBALS[ACA.'show_archive']=='1' ) {

				$linkArchive = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item;
				compa::completeLink($linkArchive,$backendLink);

				$img = 'move_f2.png';
				echo '<td height="24"><center>';
				echo '<a href="' . $linkArchive. '" >'."\n\r" ;
				echo '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" border="0" alt="'._ACA_VIEW_ARCHIVE.'" /></a></center></td>'."\n\r" ;
			} elseif($GLOBALS[ACA.'show_archive']=='1'){
				echo '<td height="24"><center>-</center></td>'."\n\r";
			}
		}
	if ($show['id']) echo '<td width="2%" class="title"><center>' . $list->id . '</center></td>';
	echo '	</tr>'."\n\r";

	}
	echo '</table>';

	echo '<br />';
	echo jnewsletter::setLegend();
}




	 function prepList($listEdit) {

		$lists = array();
		$jour = array();

		$listEdit->unsubscribesend = ( isset($listEdit->unsubscribesend) ) ? $listEdit->unsubscribesend : '';
		$listEdit->unsubscribenotifyadmin = ( isset($listEdit->unsubscribenotifyadmin) ) ? $listEdit->unsubscribenotifyadmin : '';

		if ( ACA_CMSTYPE ) {	// joomla 15

			$my	=& JFactory::getUser();
			$acl =& JFactory::getACL();
			$gtree = $acl->get_group_children_tree( null, 'USERS', false );
			$jour[] = JHTML::_('select.option','1800','Every 30 minutes');
			$jour[] = JHTML::_('select.option','3600','Every hour');
			$jour[] = JHTML::_('select.option','43200','Every 12 hours');
			$jour[] = JHTML::_('select.option', '1', _ACA_AUTO_DAY_CH1 );
			$jour[] = JHTML::_('select.option', '3', _ACA_AUTO_DAY_CH3 );
			$jour[] = JHTML::_('select.option', '5', _ACA_AUTO_DAY_CH5 );
			$jour[] = JHTML::_('select.option', '6', _ACA_AUTO_DAY_CH6 );
			$jour[] = JHTML::_('select.option', '7', _ACA_AUTO_DAY_CH7 );
			$jour[] = JHTML::_('select.option', '8', _ACA_AUTO_DAY_CH8 );
			$jour[] = JHTML::_('select.option', '9', _ACA_AUTO_DAY_CH9 );

			$auto_option[] = JHTML::_('select.option', '0', _ACA_AUTO_OPTION_NONE );
			$auto_option[] = JHTML::_('select.option', '1', _ACA_AUTO_OPTION_NEW );

			if ($listEdit->new_letter == 1) $auto_option[] = JHTML::_('select.option', '2', _ACA_AUTO_OPTION_ALL );

			$lists['delay_min'] = JHTML::_('select.genericlist', $jour, 'delay_min', 'class="inputbox" size="1"', 'value', 'text', $listEdit->delay_min );
			$lists['gid'] 		= JHTML::_('select.genericlist', $gtree, 'acc_id', 'size="10"', 'value', 'text', $listEdit->acc_id );
			$lists['edit_perms'] 	= JHTML::_('select.genericlist', $gtree, 'acc_level', 'size="10"', 'value', 'text', $listEdit->acc_level );

			$lists['auto_add'] = JHTML::_('select.genericlist', $auto_option,'auto_add', 'class="inputbox"','value', 'text',$listEdit->auto_add);

			$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $listEdit->published );
			$lists['hidden'] = JHTML::_('select.booleanlist', 'hidden', 'class="inputbox"', $listEdit->hidden );

			$lists_option = lisType::getListOption(2);
			$lists['list_type'] = listsHTML::aca_radioList($lists_option,'list_type', 'class="inputbox"',$listEdit->list_type);

			$lists['html_mailings'] = JHTML::_('select.booleanlist', 'html', 'class="inputbox"', $listEdit->html );
			$lists['unsubscribesend'] = JHTML::_('select.booleanlist', "unsubscribesend" , 'class="inputbox"', $listEdit->unsubscribesend );
			$lists['unsubscribenotifyadmin'] = JHTML::_('select.booleanlist', "unsubscribenotifyadmin" , 'class="inputbox"', $listEdit->unsubscribenotifyadmin );
			$lists['footer'] = JHTML::_('select.booleanlist', "footer" , 'class="inputbox"', $listEdit->footer );
		}//endif


		$my_group = strtolower( $acl->get_group_name( $listEdit->acc_id, 'ARO' ) );

	return $lists;
	}


	 function editList($listEdit, $forms, $show) {
		$lists = listsHTML::prepList($listEdit);
		$html = $listEdit->html;
		if ($listEdit->footer=='0') $show['unsusbcribe'] = false;
	 	echo $forms['main'];

			if ( ACA_CMSTYPE ) {
				 $config_tabs = new mosTabs15(0);
			}//endif
		 $config_tabs->startPane('acaListEdit');
		 $config_tabs->startTab(_ACA_LIST_T_GENERAL, 'acaListEdit.general');
		listsHTML::description($listEdit, $lists, $show, $html);
		$config_tabs->endTab();

		if ($show['unsusbcribe'] OR $show['auto_subscribe'] OR $GLOBALS[ACA.'require_confirmation']
		 OR ($show['email_unsubcribe'] AND class_exists('auto')) ) {
		$config_tabs->startTab(_ACA_LIST_T_SUBSCRIPTION, 'acaListEdit.subscriber');
		listsHTML::subscription($listEdit, $lists, $show, $html);
		$config_tabs->endTab();
		}

		//admin notification if the user unsubscribes to the list
		if ($show['unsusbcribe'] OR $show['auto_subscribe'] OR $GLOBALS[ACA.'require_confirmation']
		 OR ($show['email_unsubcribe'] AND class_exists('auto')) ) {
		$config_tabs->startTab(_ACA_LIST_T_ADMIN_NOTIFICATION, 'acaListEdit.subscriber');
		listsHTML::notification($listEdit, $lists, $show, $html);
		$config_tabs->endTab();
		}


		if ( class_exists('pro') ) {
			$config_tabs->startTab(_ACA_LIST_ADD_TAB, 'acaListEdit.pro');
			pro::editTab($listEdit, $lists, $show, $html);
			$config_tabs->endTab();
		}
		$config_tabs->endPane();
	 }



	function description($listEdit, $lists, $show, $html) {

	if (ACA_CMSTYPE) $editor =& JFactory::getEditor();

	?>
	<fieldset class="jnewslettercss">
	<table class="jnewslettertable" width="100%"  cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_PUB ;
					$title = _ACA_PUBLISHED;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td><?php echo $lists['published']; ?></td>
		</tr>
	<?php if ($show['hide']) {?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_MAILING_VISIBLE;
					$title = _ACA_VISIBLE_FRONT;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td><?php echo $lists['hidden']; ?></td>
		</tr>
	<!--	<tr> //for next release purpose
			<td width="185" class="key">
				<span class="editlinktip">
                                <?php
//                                        $tip = _ACA_LIST_COLOR_TIP ;
//                                        $title = _ACA_LIST_COLOR;
//                                        echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
                                ?>
               	</span>

			</td>
		<td>
				<?php

//				if (empty($listEdit->color)) $colorV = '#ffff00';
//				else $colorV = $listEdit->color;
//				echo jnewsletter::colorPicker('listcolor', 10, $colorV)
				?>
			</td>
	</tr> -->

	<?php } else { echo '<input type="hidden" name="hidden" value="' .$listEdit->hidden .'" />'; } ?>
	<?php if ($listEdit->new_letter == 1 AND !empty($lists['list_type'])) { ?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_AUTORESP;
					$title = _ACA_AUTORESP_ON;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td><?php echo $lists['list_type']; ?></td>
		</tr>
	<?php } else { ?>
		<input type="hidden" name="list_type" value="<?php echo $listEdit->list_type; ?>">
	<?php
	 }  ?>
		</tbody>
	</table>
	</fieldset>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_LIST_T_GENERAL; ?></legend>
	<table class="jnewslettertable" width="100%" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_NAME;
					$title = _ACA_LIST_NAME;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
			<?php
			 	$text = str_replace('"', '&quot;' , $listEdit->list_name);
			 	if (function_exists('htmlspecialchars_decode')) {
			 		$text = htmlspecialchars_decode( $text , ENT_NOQUOTES);
			 	} elseif (function_exists('html_entity_decode')) {
			 		$text = html_entity_decode( $text , ENT_NOQUOTES);
			 	}
				echo ' <input type="text" name="list_name" class="inputbox" size="50" maxlength="64" value="' . $text .'" />' ;
			 ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_DESC ;
					$title = _ACA_LIST_DESC;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
			<?php
				if ($GLOBALS[ACA.'listHTMLeditor'] == '1') {
					if (ACA_CMSTYPE) echo $editor->display( 'list_desc',  $listEdit->list_desc , '100%', '200', '75', '10' ) ;
					else 	editorArea( 'editor1',  $listEdit->list_desc , 'list_desc', '100%;', '200', '75', '10' ) ;
				}
			?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
<?php if ($show['sender_info']) {?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_LIST_T_SENDER; ?></legend>
	<table class="jnewslettertable" width="100%" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SENDER_NAME ;
					$title = _ACA_SENDER_NAME;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
			<?php
			 	$text = str_replace('"', '&quot;' , $listEdit->sendername);
			 	if (function_exists('htmlspecialchars_decode')) {
			 		$text = htmlspecialchars_decode( $text , ENT_NOQUOTES);
			 	} elseif (function_exists('html_entity_decode')) {
			 		$text = html_entity_decode( $text , ENT_NOQUOTES);
			 	}
				echo ' <input type="text" name="sendername" class="inputbox" size="40" maxlength="64" value="' . $text .'" />' ;

// Subscriber Box List for sender field ==========================================
			?>
				<?php
					// clickable image for sender list
				?>
				&nbsp;<img src="components/com_jnewsletter/images/16/profile.png" id="popbtn" name="popbtn" onClick="document.getElementById('poplist').style.display = 'inline'; document.getElementById('popbtn').style.display = 'none';" title="<?php echo _ACA_SENDER_LIST_INFO; ?>" style="position:absolute;">

				<?php
					//Select tag with script
				?>
				<select id="poplist" name="poplist" style="display:none;position:relative;" onChange="document.getElementById('poplist').style.display = 'none'; document.getElementById('popbtn').style.display = 'inline';">

				<?php
					//create a default sender value for NONE/NULL
				?>
				<option value="0" onClick="document.adminForm.sendername.value=''; document.adminForm.senderemail.value='';"> </option>
			<?php
				// 2nd parameter of this function should be a preference
				// we need to limit it so that it wouldnt cause any problems when loading a bunch of datas e.g hundreds or thousands of users
				// get subscribers list
				$subscribersLists = subscribers::getListOfSubscribers( 'name', 50 );

				// create options for list
				if( !empty($subscribersLists) )
				{
					foreach( $subscribersLists as $subscribersList )
					{
						$name = $subscribersList->name;
						$email = $subscribersList->email;

						$selected = ( (isset($listEdit->sendername) && ($listEdit->sendername==$name)) && (isset($listEdit->senderemail) && ($listEdit->senderemail==$email)) ) ? true : false;
				?>
						<option value="<?php echo $subscribersList->name; ?>" onClick="document.adminForm.sendername.value='<?php echo $name; ?>'; document.adminForm.senderemail.value='<?php echo $email; ?>';" <?php if($selected) {echo 'selected';} ?>> <?php echo $subscribersList->name .' ('. $subscribersList->email .')'; ?> </option>
				<?php
					} //endforeach
				} //endif
			 ?>
			 	</select>
<?php // ==========================================
?>

			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SENDER_EMAIL ;
					$title = _ACA_SENDER_EMAIL;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input type="text" name="senderemail" class="inputbox" size="40" maxlength="64" value="<?php echo $listEdit->senderemail; ?>" />
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SENDER_BOUNCED ;
					$title = _ACA_SENDER_BOUNCE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input type="text" name="bounceadres" class="inputbox" size="40" maxlength="64" value="<?php echo $listEdit->bounceadres; ?>" />
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_ACA_OWNER ;
					$title = _ACA_OWNER;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $listEdit->owner; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php } else {
		echo '<input type="hidden" name="sendername" value="' .$listEdit->sendername .'" />';
		echo '<input type="hidden" name="senderemail" value="' .$listEdit->senderemail .'" />';
		echo '<input type="hidden" name="bounceadres" value="' .$listEdit->bounceadres .'" />';
		}
	}


	function layout($listEdit, $lists, $show, $html) {

		if (ACA_CMSTYPE) $editor =& JFactory::getEditor();

	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_LIST_T_LAYOUT; ?></legend>
	<table class="jnewslettertable" width="100%" cellspacing="1">
		<tbody>
		<?php if ($show['htmlmailing']) {?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_HTML;
					$title = _ACA_HTML_MAILING;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
			</td>
			<td>
				<?php echo $lists['html_mailings'];?>
				<?php echo _ACA_HTML_MAILING_DESC; ?><br /><br />
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td width="185" class="key" style="vertical-align: top;">
				<span class="editlinktip">
				<?php
					$tip =  _ACA_INFO_LIST_LAYOUT;
					$title = _ACA_LIST_T_TEMPLATE ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span><br />
				<strong><?php echo _ACA_USABLE_TAGS; ?></strong><br />
				<?php echo _ACA_CONTENTREP; ?>
			</td>
			<td>
				<?php
				 if ($html) {
					if (ACA_CMSTYPE) echo $editor->display( 'layout',  $listEdit->layout , '100%', '600', '75', '20' ) ;
					else editorArea( 'editor2',  $listEdit->layout , 'layout', '100%;', '600', '75', '20' );
				 } else {
					 echo '<textarea name="layout" rows="20" cols="80">' . $listEdit->layout . '</textarea>';
				 }
				?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php
	}



	function subscription($listEdit, $lists, $show, $html) {

		if (ACA_CMSTYPE) $editor =& JFactory::getEditor();

 if ( $show['access'] OR $show['auto_subscribe'] ) {?>
	<fieldset class="jnewslettercss">
	<table class="jnewslettertable" width="100%" cellspacing="1">
		<tbody>
	<?php if ($show['auto_subscribe']) {?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_ACA_AUTO_SUB;
					$title = _ACA_AUTO_ADD_NEW_USERS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['auto_add'];?>
				<?php if ($listEdit->new_letter == 1) { ?>
				<span style=" color: rgb(255, 0, 0); font-weight: bold;">
				<?php echo _ACA_INFO_LIST_WARNING;	?></span>
				<?php } ?><br /><br />
			</td>
		</tr>
<?php } ?>
<?php if ( class_exists('auto') && $show['access'] ) {?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_ACCESS;
					$title = _ACA_LIST_ACCESS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['gid'];?>
			</td>
		</tr>
<?php } ?>
		</tbody>
	</table>
	</fieldset>
<?php }

	if ($GLOBALS[ACA.'require_confirmation']) { ?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_SUB_SETTINGS; ?></legend>
	<table class="jnewslettertable"  width="100%" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key" style="vertical-align: top;">
			<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SUB_MESS;
					$title = _ACA_SUBMESSAGE;
				?>
				<?php echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ); ?>
				</span><br />
				<strong><?php echo _ACA_USABLE_TAGS; ?></strong><br />
				<?php echo _ACA_NAME_AND_CONFIRM; ?>
			</td>
			<td>
				<?php
				 if ($html) {
					if (ACA_CMSTYPE) echo $editor->display( 'subscribemessage',  $listEdit->subscribemessage , '100%', '200', '75', '20' ) ;
				 } else {
					 echo '<textarea name="subscribemessage" rows="20" cols="75">' . $listEdit->subscribemessage . '</textarea>';
				 }
				?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php }

	//unsubscribe settings
	if ($show['unsusbcribe']) { ?>
	<fieldset class="jnewslettercss">
	<legend><span class="editlinktip"><?php echo _ACA_UNSUB_SETTINGS; ?></span></legend>
	<table class="jnewslettertable" width="100%"  cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SEND_UNSUBCRIBE_TIPS;
					$title = _ACA_SEND_UNSUBCRIBE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['unsubscribesend']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key" style="vertical-align: top;">
			<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_UNSUB_MESS;
					$title = _ACA_UNSUB_MESSAGE;
				?>
				<?php echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ); ?>
				</span><br />
				<strong><?php echo _ACA_USABLE_TAGS; ?></strong><br />
				<?php echo _ACA_NAMEREP; ?><br />
				<?php echo _ACA_FIRST_NAME_REP; ?>
			</td>
			<td>
				<?php
				 if ($html) {
					if (ACA_CMSTYPE) echo $editor->display( 'unsubscribemessage',  $listEdit->unsubscribemessage , '100%', '200', '75', '20' ) ;
				 } else {
					 echo '<textarea name="unsubscribemessage" rows="20" cols="75">' . $listEdit->unsubscribemessage . '</textarea>';
				 }
				?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php }//end unsubscribe settings

	//show unsubscribe links
	if ($show['email_unsubcribe'] AND class_exists('auto')) {   ?>
	<fieldset class="jnewslettercss">
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_LIST_SHOW_UNSUBCRIBE_TIPS;
					$title = _ACA_LIST_SHOW_UNSUBCRIBE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['footer']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
<?php }//end show unsubscribe links

	}

	//function that sends notification to the admin if the user unsubcribes to the list
	function notification($listEdit, $lists, $show, $html) {

		if (ACA_CMSTYPE) $editor =& JFactory::getEditor();

	if ($show['unsusbcribe']) { ?>
	<fieldset class="jnewslettercss">
	<legend><span class="editlinktip"><?php echo _ACA_UNSUB_SETTINGS; ?></span></legend>
	<table class="jnewslettertable" width="100%"  cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SEND_UNSUBNOTIFY_TIPS;
					$title =_ACA_UNSUB_NOTIFYMSG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['unsubscribenotifyadmin']; ?>
				<br /><br />
			</td>
		</tr>
		<tr>
			<td width="185" class="key" style="vertical-align: top;">
			<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_AMIN_UNSUB_NOTIFY;
					$title = _ACA_UNSUB_ADMINMESSAGE;
				?>
				<?php echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ); ?>
				</span><br />
				<strong><?php //echo _ACA_USABLE_TAGS; ?></strong><br />
				<?php //echo _ACA_NAMEREP; ?><br />
				<?php //echo _ACA_FIRST_NAME_REP; ?>
			</td>
			<td>
				<?php
				 if ($html) {
				 	echo $editor->display( 'notifyadminmsg',  $listEdit->notifyadminmsg, '100%', '200', '75', '20' ) ;
				 }
				?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php }

	}//end function notification

	function aca_radioList( &$arr, $tag_name, $tag_attribs, $selected=null, $key='value', $text='text' ) {
		reset( $arr );
		$html = "";
		for ($i=0, $n=count( $arr ); $i < $n; $i++ ) {
			$k = $arr[$i]->$key;
			$t = $arr[$i]->$text;
			$dis = $arr[$i]->dis;
			$id = ( isset($arr[$i]->id) ? @$arr[$i]->id : null);

			$extra = '';
			$extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
			if (is_array( $selected )) {
				foreach ($selected as $obj) {
					$k2 = $obj->$key;
					if ($k == $k2) {
						$extra .= " selected=\"selected\"";
						break;
					}
				}
			} else {
				$extra .= ($k == $selected ? " checked=\"checked\"" : '');
			}
			$disable = ($dis) ? ' DISABLED ' : '';
			$html .= "\n\t<input type=\"radio\" name=\"$tag_name\" id=\"$tag_name$k\" value=\"".$k."\"$extra $tag_attribs $disable />";
			$html .= "\n\t<label for=\"$tag_name$k\">$t</label>";
		}
		$html .= "\n";

		return $html;
	}
 }
