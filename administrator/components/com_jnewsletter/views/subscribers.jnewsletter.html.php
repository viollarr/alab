
<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class subscribersHTML {

	 function editSubscriber($subscriber, $listings, $queues, $forms, $access=false, $frontEnd=false, $cb=false ) {
		 global $mainframe;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			if(!$GLOBALS[ACA.'disabletooltip']){
				JHTML::_('behavior.tooltip');
			}
			$lists['receive_html'] = JHTML::_('select.booleanlist', 'receive_html', 'class="inputbox"', $subscriber->receive_html );
			$lists['confirmed'] = JHTML::_('select.booleanlist', 'confirmed', 'class="inputbox"', $subscriber->confirmed );
			$lists['blacklist'] = JHTML::_('select.booleanlist', 'blacklist', 'class="inputbox"', $subscriber->blacklist );
		}//endif

		$br = "\n\r";
 		$html = $forms['main'];
		$html .= '<div style="width:100%; align:left;">'.$br;
		$html .= '<fieldset class="jnewslettercss" style="padding: 10px; text-align: left">'.$br;
		$html .= '<legend><strong>'._ACA_SUB_INFO.'</strong></legend>'.$br;
		$html .= '<table cellpadding="2" cellspacing="0" align="center"><tr><td>'.$br;
	 	$text = str_replace('"', '&quot;' , $subscriber->name);
	 	if (function_exists('htmlspecialchars_decode')) {
	 		$text = htmlspecialchars_decode( $text , ENT_NOQUOTES );
	 	} elseif (function_exists('html_entity_decode')) {
	 		$text = html_entity_decode( $text , ENT_NOQUOTES );
	 	}

	 	//column1
	 	//$text2 = str_replace('"', '&quot;' , $subscriber->column1);
	 	//if (function_exists('htmlspecialchars_decode')) {
	 		//$text2 = htmlspecialchars_decode( $text2 , ENT_NOQUOTES );
	 	//} elseif (function_exists('html_entity_decode')) {
	 		//$text2 = html_entity_decode( $text2 , ENT_NOQUOTES );
	 	//}

		if (!$cb) {


		//if(!$mainframe->isAdmin()){
			//$html .= jnewsletter::miseEnHTML('<font color=white>'._ACA_INPUT_NAME .'</font>', _ACA_INPUT_NAME_TIPS, '<input type="text" name="name" size="30" value="'. $text .'" class="inputbox" />');
			//$html .= jnewsletter::miseEnHTML('<font color=white>'._ACA_INPUT_EMAIL.'</font>' , _ACA_INPUT_EMAIL_TIPS, '<input type="text" name="email" size="30" class="inputbox" value="'.$subscriber->email.'"  />');
		//}else{
			$html .= jnewsletter::miseEnHTML(_ACA_INPUT_NAME , _ACA_INPUT_NAME_TIPS, '<input type="text" name="name" size="30" value="'. $text .'" class="inputbox" />');
			$html .= jnewsletter::miseEnHTML(_ACA_INPUT_EMAIL , _ACA_INPUT_EMAIL_TIPS, '<input type="text" name="email" size="30" class="inputbox" value="'.$subscriber->email.'"  />');
		//}
			//additional columns
			//define for notice
			//$subscriber->column1='';
			//$subscriber->column2='';
			//$subscriber->column3='';
			//$subscriber->column4='';
			//$subscriber->column5='';
			if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro}
				if(empty($subscriber->column1)){//if column1 field is not defined/empty, set to =''
					$subscriber->column1='';
				}//endif
				if(empty($subscriber->column2)){//if column2 field is not defined/empty, set to =''
					$subscriber->column2='';
				}//endif
				if(empty($subscriber->column3)){//if column3 field is not defined/empty, set to =''
					$subscriber->column3='';
				}//endif
				if(empty($subscriber->column4)){//if column4 field is not defined/empty, set to =''
					$subscriber->column4='';
				}//endif
				if(empty($subscriber->column5)){//if column5 field is not defined/empty, set to =''
					$subscriber->column5='';
				}//endif
			//}//endif for check version
				if($GLOBALS[ACA.'show_column1']){//show column1
					$html .= jnewsletter::miseEnHTML($GLOBALS[ACA.'column1_name'] , _ACA_INPUT_COLUMN1_TIPS, '<input type="text" name="column1" size="30" class="inputbox" value="'.$subscriber->column1.'"  />');
				}
				if($GLOBALS[ACA.'show_column2']){//show column2
					$html .= jnewsletter::miseEnHTML($GLOBALS[ACA.'column2_name'] , _ACA_INPUT_COLUMN2_TIPS, '<input type="text" name="column2" size="30" class="inputbox" value="'.$subscriber->column2.'"  />');
				}
				if($GLOBALS[ACA.'show_column3']){//show column3
					$html .= jnewsletter::miseEnHTML($GLOBALS[ACA.'column3_name'] , _ACA_INPUT_COLUMN3_TIPS, '<input type="text" name="column3" size="30" class="inputbox" value="'.$subscriber->column3.'"  />');
				}
				if($GLOBALS[ACA.'show_column4']){//show column4
					$html .= jnewsletter::miseEnHTML($GLOBALS[ACA.'column4_name'] , _ACA_INPUT_COLUMN4_TIPS, '<input type="text" name="column4" size="30" class="inputbox" value="'.$subscriber->column4.'"  />');
				}
				if($GLOBALS[ACA.'show_column5']){//show column5
					$html .= jnewsletter::miseEnHTML($GLOBALS[ACA.'column5_name'] , _ACA_INPUT_COLUMN5_TIPS, '<input type="text" name="column5" size="30" class="inputbox" value="'.$subscriber->column5.'"  />');
				}
			}//endif for check version

		} else {
			$html .= '<input type="hidden" name="cb_integration" value="1"  />';
		}
		//if(!$mainframe->isAdmin()){
			//$html .= jnewsletter::miseEnHTML('<font color=white>'._ACA_RECEIVE_HTML.'</font>', _ACA_RECEIVE_HTML_TIPS, $lists['receive_html']);
		//}else{
			$html .= jnewsletter::miseEnHTML(_ACA_IP , _ACA_IP_TIPS, $subscriber->ip);
			$html .= jnewsletter::miseEnHTML(_ACA_RECEIVE_HTML, _ACA_RECEIVE_HTML_TIPS, $lists['receive_html']);

		//}

		if ($GLOBALS[ACA.'time_zone']==1) {
			$html .= jnewsletter::miseEnHTML(_ACA_TIME_ZONE_ASK , _ACA_TIME_ZONE_ASK_TIPS, ' <input type="text" name="timezone" size="30" class="inputbox" value="' .$subscriber->timezone.'"  />' );
 		} else {
			$html .= '<input type="hidden" name="timezone" value="'.$subscriber->timezone.'"  />';
 		}

		 if ($access) {
		 	 if ($subscriber->user_id==0) {
				$html .= jnewsletter::miseEnHTML(_ACA_CONFIRMED , '', $lists['confirmed']);

			} else {
				if(!$cb or !$mainframe->isAdmin()) $html .=  '<input type="hidden" name="confirmed" value="'. $subscriber->confirmed.'" />'; }
				$html .= jnewsletter::miseEnHTML(_ACA_BLACK_LIST , '', $lists['blacklist']);
				$html .= jnewsletter::miseEnHTML(_ACA_REGISTRATION_DATE , '', date('Y-m-d h:i', $subscriber->subscribe_date) );
				$html .= jnewsletter::miseEnHTML(_ACA_USER_ID , '', $subscriber->user_id );
		 } else {
		 	$html .=  '<input type="hidden" name="confirmed" value="'. $subscriber->confirmed.'" />';
		 	$html .=  '<input type="hidden" name="blacklist" value="'.$subscriber->blacklist.'" />';
		 }
		$html .= '</table>';

		//$html.= '<table border=1><tr><td>&nbsp;</td></tr></table>';
		$html .= '</fieldset></div>';
		$html .=  subscribersHTML::showSubscriberLists($subscriber, $listings, $queues, $frontEnd, $access);
		return $html;
	}


	 function showSubscriberLists($subscriber, $lists, $queues, $frontEnd, $accessAdmin) {
		global $Itemid,$mainframe;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}//endif

		if(empty($Itemid) AND !$mainframe->isAdmin()){
			$Itemid = $GLOBALS[ACA.'itemidAca'];
		}

		if(!empty($Itemid)){
			$item = '&Itemid=' . $Itemid;
	 	}else{
			$item ='';
		}

		$html = '';
	 	if (!empty($lists)) {
			$br = "\n\r";
			$html = '<fieldset class="jnewslettercss" style="padding: 4px; text-align: left">'.$br;
			$html .= '<legend><strong>'._ACA_SUBSCRIPTIONS.'</strong></legend>' .$br;
			$html .= '<table class="joobilist"><thead>' .$br;
			$html .= '<tr><th class="title" width="3%">#</th>' .$br;
			$html .= '<th class="title">'._ACA_LIST_NAME.'</th>' .$br;
			$html .= '<th class="title" align=center>'._ACA_SUBSCRIB.'</th>' .$br;
			if ($accessAdmin) {
			$html .= '<th class="title" width="3%"><center>ID</center></th>' .$br;
			}
		    if ($frontEnd AND $GLOBALS[ACA.'show_archive']=='1') {
                    $html .= '<th class="title"><center>' .  _ACA_VIEW_ARCHIVE . '</center></th>' .$br;
              } // end if
			$html .= '</tr></thead>' .$br;

	 		if($frontEnd AND empty($subscriber->id)){
				$forceCheck = true;
			}else{
				$forceCheck = false;
			}

			$subscribed = '';
			$i = 1;
		  	foreach ($lists as $list) {
				$i++;
				$subscribed = 0;
				if (!empty($queues)) {
					foreach ($queues as $queue) {
							if ($queue->list_id == $list->id) {
								$subscribed =1;
								$access = $queue->acc_level;
							}	else {
								$access = 29;
							}
					}
				} else {
						$access = 29;
				}
				$num = ($i + 1) % 2;
				$s = $i-1;
				$html .= '<tr class="row'.$num.'"><td><center>'.$s.'</center></td><td>' .$br;

				$link = ( $list->hidden AND ($list->list_type =='1' or $list->list_type =='7') AND $GLOBALS[ACA.'show_archive'] ) ? 'index.php?option=com_jnewsletter&act=mailing&task=archive&listid='.$list->id.'&listype='.$list->list_type.$item : '#';

				//if(!$mainframe->isAdmin()){
				//	$html .='<font color=white>'.$list->list_name.'</font>';
				//}else{
					$html .= '<span class="aca_letter_names"';
					if ($link == "#"){$html .= " onclick='return false;' ";}
					$html.= '>'.compa::toolTip($list->list_desc, $list->list_name, '', '', $list->list_name, $link, 1).' </span>' .$br;
				//}
				$html .= '</td><td align="center">' .$br;
				$html .= '<input name="subscribed['. $i.']" value="1"' ;
				 if ( $subscribed == 1 OR $forceCheck) { $html .= ' checked="checked"'; }
				$html .= ' type="radio">' ._CMN_YES.$br;
				$html .= '<input name="subscribed['. $i.']" value="0"' ;
				 if ( $subscribed == 0 AND !$forceCheck) { $html .= ' checked="checked"'; }
				$html .= ' type="radio">' ._CMN_NO.$br;
				$html .= '<input type="hidden" name="sub_list_id['. $i.']" value="'.$list->id.'" />' .$br;
				$html .= '<input type="hidden" name="passwordA" value="'.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']).'" />';//url hidden password
				$html .= '<input type="hidden" name="fromFrontend" value="1" />'."\n";
				$html .= '</td>' .$br;
				 if ($accessAdmin) {
					$html .= '<td><center>'.$list->id.'</center></td> ';
				 	$html .=  '<input type="hidden" name="acc_level['.$i.']" value="'.$access. '" />';
				 	$html .= '<input type="hidden" name="passwordA" value="'.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']).'" />';//url hidden password
				 	$html .= '<input type="hidden" name="fromFrontend" value="1" />'."\n";
				 } else {
				 	$html .=  '<input type="hidden" name="acc_level['.$i.']" value="'.$access. '" />';
				 	$html .= '<input type="hidden" name="passwordA" value="'.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']).'" />';//url hidden password
				 	$html .= '<input type="hidden" name="fromFrontend" value="1" />'."\n";
				 }

				 if ($frontEnd) {
					if (($list->list_type == 1 or $list->list_type == 7) && $GLOBALS[ACA.'show_archive']=='1' ) {

						//comment out by eve
						$link = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive' . $item;

						//$link = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id.'&task=archive' . $item;
						compa::completeLink($link,false);

						$img = 'move_f2.png';
						$html .=  '<td height="20"><center>';
						$html .=  '<a href="' . $link. '" >'."\n\r" ;
						$html .=  '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" align="center" border="0" alt="'._ACA_VIEW_ARCHIVE.'" /></a></center></td>'."\n\r" ;
					} elseif($GLOBALS[ACA.'show_archive']=='1') {
						$html .=  '<td height="20"><center>-</center></td>';
					}
				}
			}
			$html .=  '<tr></table></fieldset>';
		 }

		 return $html;

	}


	 function showSubscribers($subscribers, $action, $listId, &$lists, $start, $limit, $total, $showAdmin, $theLetterId, $emailsearch, $forms, $setLimit=null) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}//endif

	?>

	<script language="javascript" type="text/javascript">
	<!--
	function jnewsletterselectall(){
		var i = 0;
		allcheck = document.getElementById("selectallcheck");
		if(allcheck.checked) checkedvalue = 1;
		else checkedvalue = 0;

		while(myelement = document.getElementById("cid["+i+"]")){
			myelement.checked = checkedvalue;
			i++;
		}

		if(checkedvalue){
			document.getElementById("boxcount").value = i;
		}else{
			document.getElementById("boxcount").value = 0;
		}
	}
	 //-->
	</script>

	<?php
		if ($listId==0) {
	      $message =  _ACA_SUSCRIB_LIST;
	  	} else {
	      $lt_name=lists::getLists($listId, 0, null, '', false, false, true);
	      $message =  _ACA_SUSCRIB_LIST_UNIQUE."<span style='color: rgb(51, 51, 51);'>".@$lt_name[0]->list_name."</span>";
	   	}

		$filter = _ACA_SEL_LIST.'  '.$lists['listid'];
		$hidden = '<input type="hidden" name="listid" value="'.$listId.'" />';
	    $hidden .= '<input type="hidden" name="limit" value="'.$limit.'" />';

//		echo jnewsletter::search($forms['select'], $hidden, $emailsearch, 'emailsearch', $filter, $message );
		echo $forms['main'];

		// top portion before the table list
		// for search
		$toSearch = null;
		$toSearch->forms = $forms['select'];
		$toSearch->hidden = $hidden;
		$toSearch->listsearch = $emailsearch;
		$toSearch->id = 'emailsearch';

		echo jnewsletter::setTop( $toSearch, $message, $setLimit, $filter );

	?>

		<table class="joobilist">
		<thead>
		<tr>
			<th class="title">#</th>
			<th class="title"><input type="checkbox" id="selectallcheck" name="allchecked" onclick="jnewsletterselectall();"/></th>
			<th class="title"><?php echo _ACA_INPUT_NAME; ?></th>
			<th class="title"><?php echo _ACA_INPUT_EMAIL; ?></th>
			<th class="title"><?php echo _ACA_SIGNUP_DATE; ?></th>
			<th class="title"><center><?php echo _ACA_REGISTERED; ?>?</center></th>
			<th class="title"><center><?php echo _ACA_CONFIRMED; ?>?</center></th>
			<th class="title"><center><?php echo _ACA_HTML; ?>?</center></th>

	<?php	if ($my->usertype == 'Administrator' OR $my->usertype == 'Super Administrator') { ?>
			<th class="title">ID
			</th>
	<?php	}
	?>

<?php
if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
 if ($GLOBALS[ACA.'show_column1']==1){?><!--check to show/hide column 1 heading in the subscribers list-->
			<th class="title"><center><?php echo $GLOBALS[ACA.'column1_name'];
			}//<!--/center></th><!--column 1 in the subscribers list-BE-->
	  if ($GLOBALS[ACA.'show_column2']==1){?><!--check to show/hide column 2 heading in the subscribers list-->
			<th class="title"><center><?php echo $GLOBALS[ACA.'column2_name'];
			}
	  if ($GLOBALS[ACA.'show_column3']==1){?><!--check to show/hide column 3 heading in the subscribers list-->
			<th class="title"><center><?php echo $GLOBALS[ACA.'column3_name'];
			}
	  if ($GLOBALS[ACA.'show_column4']==1){?><!--check to show/hide column 4 heading in the subscribers list-->
			<th class="title"><center><?php echo $GLOBALS[ACA.'column4_name'];
			}
	  if ($GLOBALS[ACA.'show_column5']==1){?><!--check to show/hide column 5 heading in the subscribers list-->
			<th class="title"><center><?php echo $GLOBALS[ACA.'column5_name'];
			}
}			?>
		</tr>
		</thead>
		<?php
			$i = 0;
			if (!empty($subscribers)) {
				foreach ($subscribers as $subscriber) {

				if ($subscriber->user_id <> 0) {
						$img = '16/status_g.png';
					   	$alt = 'Registered';
					   	jnewsletter::getLegend( 'status_g.png', _ACA_REGISTERED .'/'. _ACA_CONFIRMED );
				} else {
						$img = '16/status_r.png';
					   	$alt = 'Unregistered';
					   	jnewsletter::getLegend( 'status_r.png', _ACA_SUBSCRIBERS_UNREGISTERED .'/'. _ACA_PIE_UNCONFIRMED );
				}
				if ($subscriber->confirmed == 1) {
						$imgC = '16/status_g.png';
					   	$altC = 'Confirmed';
					   	jnewsletter::getLegend( 'status_g.png', _ACA_REGISTERED .'/'. _ACA_CONFIRMED );
				} else {
						$imgC = '16/status_r.png';
					   	$altC = 'Not confirmed';
					   	jnewsletter::getLegend( 'status_r.png', _ACA_SUBSCRIBERS_UNREGISTERED .'/'. _ACA_PIE_UNCONFIRMED );
				}
				if ($subscriber->receive_html == 1) {
						$imgH = '16/status_g.png';
					   	$altH = 'HTML';
					   	jnewsletter::getLegend( 'status_g.png', _ACA_REGISTERED .'/'. _ACA_CONFIRMED );
				} else {
						$imgH = '16/status_r.png';
					   	$altH = 'TEXT';
					   	jnewsletter::getLegend( 'status_r.png', _ACA_SUBSCRIBERS_UNREGISTERED .'/'. _ACA_PIE_UNCONFIRMED );
				}
		?>
				<tr class="row<?php echo ($i + 1) % 2;?>">
					<td><center><?php echo $i+1+ $start; ?></center></td>
					<td>
						<center><input type="checkbox" id="cid[<?php echo $i; ?>]" name="cid[<?php echo $i; ?>]" value="<?php echo $subscriber->id; ?>" onclick="isChecked(this.checked);" /></center>
					</td>
					<td>
					<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&task=show&userid=<?php echo $subscriber->id; ?>" >
					<?php echo $subscriber->name; ?></a></td>
					<td><?php echo $subscriber->email; ?></td>
					<td><?php echo date('Y-m-d H:i:s',$subscriber->subscribe_date); ?></td>
					<td align="center">
						<img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
					</td>

					<td align="center">
						<a href="<?php echo jnewsletter::createToggleLink( 'subscribers', 'confirmed', 'subid' , $subscriber->id ); ?>"> <img src="<?php echo ACA_PATH_ADMIN_IMAGES.$imgC;?>" width="12" height="12" border="0" alt="<?php echo $altC; ?>" /> </a>
					</td>
					<td align="center">
						<a href="<?php echo jnewsletter::createToggleLink( 'subscribers', 'receive_html', 'subid' , $subscriber->id ); ?>"> <img src="<?php echo ACA_PATH_ADMIN_IMAGES.$imgH;?>" width="12" height="12" border="0" alt="<?php echo $altH; ?>" /> </a>
					</td>
					<?php
					$i++;
					if ($my->usertype == 'Administrator' OR $my->usertype == 'Super Administrator') {
						echo '<td align="center">'.$subscriber->id.'</td>';
					}?>
					<?php
					if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is 5.0.2
						if ($GLOBALS[ACA.'show_column1']==1){ ?> <!--check to show/hide column 1 data in the subscribers list-->
						<td align="center"> <!--data for column1-->
							<?php echo $subscriber->column1; }?>
						</td>
						<?php if ($GLOBALS[ACA.'show_column2']==1){ ?> <!--check to show/hide column 2 data in the subscribers list-->
						<td align="center"> <!--data for column1-->
							<?php echo $subscriber->column2;} ?>
						</td>
						<?php if ($GLOBALS[ACA.'show_column3']==1){ ?> <!--check to show/hide column 3 data in the subscribers list-->
						<td align="center"> <!--data for column3-->
							<?php echo $subscriber->column3; }?>
						</td>
						<?php if ($GLOBALS[ACA.'show_column4']==1){ ?> <!--check to show/hide column 4 data in the subscribers list-->
						<td align="center"> <!--data for column4-->
							<?php echo $subscriber->column4; }?>
						</td>
						<?php if ($GLOBALS[ACA.'show_column5']==1){ ?> <!--check to show/hide column 5 data in the subscribers list-->
						<td align="center"> <!--data for column5-->
							<?php echo $subscriber->column5; }
					}//end check of version
					?>
					</td>
				<?php }
			}
			?>
			</tr>
	</table>
	<input type="hidden" name="option" value="com_jnewsletter" />
		<input type="hidden" name="act" value="<?php echo $action; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="userid" value="" />
    	<input type="hidden" id="boxcount" name="boxchecked" value="0" />
<?php
/* // remove for the pagination to work
		<input type="hidden" name="listid" value="<?php echo $listId; ?>" />

		<input type="hidden" name="start" value="<?php echo $start; ?>" />
		<input type="hidden" name="limit" value="<?php echo $limit; ?>" />

		<input type="hidden" name="emailsearch" value="<?php echo $emailsearch;?>" />
*/
?>
	</form>
	<?php
//	backHTML::footerCounts($start, $limit, $emailsearch, $total, 9, $action, $listId, '');

	echo '<br />';
	echo jnewsletter::setLegend();
	 } //endfct



	 function unsubscribe($subscriber, $list, $queues, $action, $forms ) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}//endif

 		echo $forms['main'];
		 ?>
   		<input type="hidden" name="option" value="com_jnewsletter" />
		<input type="hidden" name="act" value="<?php echo $action; ?>" />
   		<input type="hidden" name="task" value="" />
    	<input type="hidden" name="boxchecked" value="0" />
   		<input type="hidden" name="subscriber_id" value="<?php echo $subscriber->id; ?>" />
   		<input type="hidden" name="cle" value="<?php echo md5($subscriber->email); ?>" />
   		<input type="hidden" name="listid" value="<?php echo $list->id; ?>" />
   		<div class="subscribe">
		<?php echo _ACA_UNSUBSCRIBE_MESSAGE.' '; ?>
		<span class="aca_letter_names" onclick='return false;'><?php echo compa::toolTip($list->list_desc, $list->list_name, '', '', $list->list_name, '#', 1); ?></span>
		</div>
		<?php
	}

	 function export($action, $listId) {
		?>
		<form action="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&listid=<?php echo $listId; ?>" method="post" name="adminForm" >
			<input type="hidden" name="task" value="" />
			<br /><br />
			<?php echo _ACA_EXPORT_TEXT.' #: '.$listId; ?><br /><br />
			<input type="button" value="Export" class="button" onclick="submitbutton('doExport')" />
		</form>
		<?php
	 }


	 function import($action, $lists) {

		?>
		<script language="javascript" type="text/javascript">
			function submitbutton(pressbutton) {
				var form = document.adminForm;


				if (form.importfile.value == "") {
					alert( "<?php echo addslashes(_ACA_SELECT_FILE).' '. addslashes(_ACA_MENU_IMPORT).'!'; ?>" );
				} else {
					submitform(pressbutton);
				}
			}
		</script>
		<form action="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&listid=<?php echo $listId; ?>" method="post" name="adminForm" enctype="multipart/form-data" >
			<input type="hidden" name="task" value="" />
		<table cellpadding="0" cellspacing="0" align="center" class="jnewslettercss">
			<tr>
				<th><?php echo _ACA_IMPORT_TIPS; ?></th>
			</tr>
			<tr>
				<td>
					<br />
					<?php echo _ACA_SELECT_IMPORT_FILE.' :'; ?>
					<input type="file" name="importfile" class="inputbox" />
				</td>
			</tr>
		</table>
		<?php

		if(!$GLOBALS[ACA.'disabletooltip']){
			if ( ACA_CMSTYPE ) {
				JHTML::_('behavior.tooltip');
			}//endif
		}

		echo '<br /><br /><table>';
		echo '<tr><th colspan="2">';
		echo _ACA_LIST_IMPORT;
		echo '</th></tr>';
		$i = 0;
		 foreach ($lists as $list) {
			$i++;
			echo '<tr><td width="40">';
			echo  "\n".'<input type="checkbox" class="inputbox" value="1" name="subscribed['.$i.']" />';
			echo  "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
			echo  '</td><td>';
			echo  "\n".'<span class="aca_list_name  onclick=\'return false;\'">'. compa::toolTip($list->list_desc,$list->list_name, '', '', $list->list_name, '#', 1).'</span>';
			echo "\n".'<input type="hidden" name="acc_level['.$i.']" value="0" />';
			echo '</td></tr>';

		 }
		echo '<tr><td colspan="2"><center><input type="button" value="Import" class="button" onclick="submitbutton(\'doImport\')" /></center></td></tr>';
		echo '</table></form>';

	 }



 }

