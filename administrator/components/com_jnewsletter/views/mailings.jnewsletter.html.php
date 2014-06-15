<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

class mailingsHTML {

	function previewMailingHTML($mailingId, $listId, $listType){
?>
<script language="javascript" type="text/javascript">
<!--
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		submitform( pressbutton );
	}
//-->
</script>
<span class="sectionname"><?php echo _ACA_PREVIEW_EMAIL_TEST; ?>:</span><br />
<br />
<form action="index2.php" method="POST" name="adminForm">
	<input type="hidden" name="option" value="com_jnewsletter" />
	<input type="hidden" name="listype" value="<?php echo $listType; ?>" />
	<input type="hidden" name="act" value="mailing" />
	<input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="mailingid" value="<?php echo $mailingId; ?>" />
	<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="contentpane">
		<tr>
			<td align="left"><?php echo _ACA_INPUT_NAME; ?></td>
			<td align="left"><input type="text" name="name" size=50 class="inputbox" value="<?php
			if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			}else{
				global $my;
			}
			echo trim($my->name);
			?>"/></td>
		</tr>
		<tr>
			<td align="left"><?php echo _ACA_INPUT_EMAIL; ?></td>
			<td align="left"><input type="text" name="emailaddress" class="inputbox" size=50 value="<?php
			echo trim($my->email);
			?>"/></td>
		</tr>
		<tr>
			<td align="left" colspan="2"><?php echo  _ACA_SEND_IN_HTML; ?>
			<input type="checkbox" value="1" name="html" class="inputbox" checked="checked" /></td>
    	</tr>
	</table>
</form>
<br />
<?php
	 }


	 function showMailingList($mailings, &$lists, $start, $limit, $total, $emailsearch, $listId, $listType, $forms, $show, $action, $setLimit=null) {

		global $Itemid;
		 global $mainframe;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$mainPath = ACA_PATH_ADMIN_IMAGES.'header/';
			$css = '.icon-48-newsletter { background-image:url('.$mainPath .'newsletter.png)}';
			$doc =& JFactory::getDocument();
			$doc->addStyleDeclaration($css, $type = 'text/css');
			$img = 'newsletter.png';
		}//endif

		$item = ( !empty($Itemid)) ? '&Itemid=' . $Itemid : '';




	    	$hidden = '<input type="hidden" name="listid" value="'.$listId.'" />';
	    	$hidden .= '<input type="hidden" name="act" value="'.$action.'" />';
	    	$hidden .= '<input type="hidden" name="limit" value="'.$limit.'" />';
//		echo jnewsletter::search($forms['select'], $hidden, $emailsearch, 'emailsearch', '', $lists['title'] );

		echo $forms['main'];

		// top portion before the table list
		// for search
		$toSearch = null;
		$toSearch->forms = $forms['select'];
		$toSearch->hidden = $hidden;
		$toSearch->listsearch = $emailsearch;
		$toSearch->id = 'emailsearch';

		echo jnewsletter::setTop($toSearch, $lists['title'], $setLimit );
		 ?>

	<table class="joobilist">
		<thead>
			<tr>
				<th width="40" height="20" align="center" class="title"><center>#</center></th>
				 <?php if ($show['select']) { ?>
				<th width="32"  align="center" class="title">&nbsp;</th>
				 <?php } if ($show['status']) { ?>
				<th  width="40" class="title" align="center"><center><?php echo _ACA_PUBLISHED; ?></center></th>
				 <?php } if ($show['delay']) { ?>
				<th width="80"  class="title" align="center"><center><?php echo _ACA_LIST_DELAY; ?></center></th>
				 <?php } if ($show['sentdate']) { ?>
				<th width="140"  class="title"><?php if($mainframe->isAdmin()){echo _ACA_LIST_DATE; }else{ echo _ACA_LIST_DATE;} ?></th>
				 <?php } if ($show['issue']) { ?>
				<th width="60"  class="title"><?php echo _ACA_LIST_ISSUE; ?></th>
				<?php } ?>
				<th class="title" align="left"><?php echo _ACA_LIST_SUB; ?></th>
				 <?php if($mainframe->isAdmin()){ if ($show['status']) { ?>
				<th  width="40" class="title" align="center"><center><?php echo _ACA_VISIBLE; ?></center></th>
				 <?php } } if ($show['id']) { ?>
				<th width="40" class="title"><center>ID</center></th>
				<?php } ?>
			</tr>
		</thead>
	<?php

		 if (!empty($mailings)) {

			 $i = 0;
			 foreach ($mailings as $mailing) {
	?>
	<tr class="row<?php echo ($i + 1) % 2;?>">
		<td  height="20" align="center"><center><?php echo $i + 1 + $start; ?></center></td>
		 <?php if ($show['select'])  { ?>
		<td  align="center"><input type="radio" id="cb<?php echo $i;?>" name="mailingid" value="<?php echo $mailing->id; ?>" onclick="isChecked(this.checked);" /></td>
		 <?php
		 }
		 if ($show['status']) {

				 switch ($mailing->published) {
				 	case '1':
						 $img = '16/status_g.png';
						 jnewsletter::getLegend( 'status_g.png', _ACA_VISIBLE .'/'. _ACA_TEMPLATE_PUBLISH );
				 		break;
				 	case '2':
						$img = '16/status_y.png';
						jnewsletter::getLegend( 'status_y.png', _ACA_SCHEDULED );
				 		break;
				 	default:
						$img = '16/status_r.png';
						jnewsletter::getLegend( 'status_r.png',_ACA_NOTVISIBLE .'/'. _ACA_UNPUBLISHED );
				 		break;
				 }

		$publishStatus = ( !empty($mailing->published) && ( $mailing->published == 1 ) ) ? 'unpublishMailing' : 'publishMailing';
		?>
		<td  align="center"><center><a href="<?php echo jnewsletter::createToggleLink( 'mailing', $publishStatus, 'mailingid' , $mailing->id, 'togle' ); ?>"><img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img; ?>" width="12" height="12" border="0" alt="" /></a></center></td>

		 <?php } if ($show['delay']) {
		 $delay = $mailing->delay / 1440;
		  ?>
		<td  align="center"><?php echo $delay; ?></td>
		 <?php } if ($show['sentdate']) { ?>
		<td ><?php
		if($mailing->send_date==0){
			echo '0000-00-00 00:00:00';
		}else{
			echo date( 'Y-m-d H:i:s', $mailing->send_date);
		}
		//if( !empty($mailing->send_date) ) { echo date( 'Y-m-d H:i:s', $mailing->send_date); } else { echo ''; }
		?></td>
		 <?php } if ($show['issue']) { ?>
		<td  align="center"><center><?php echo $mailing->issue_nb; ?></center></td>
		<?php }
		//if (!isset($mailing->list_id) or $mailing->list_id < 1) {$mailing->list_id = 0;}

		$backendLink = ($show['index'] == 'index') ? false : true;
		if ((!$show['admin']) OR ( $mailing->published == 1 AND ($mailing->mailing_type == 1 or $mailing->mailing_type == 7 or $mailing->mailing_type == 2))) {
			$link = 'index.php?option=com_jnewsletter&act=' . $action . '&task=view&listid='.$listId.'&mailingid=' .$mailing->id . '&listype=' .$mailing->mailing_type . $item ;
		} else {
			$link = '.php?option=com_jnewsletter&act=' . $action . '&task=edit&mailingid=' .$mailing->id . '&listid=' . $listId . '&listype=' .$mailing->mailing_type . $item;
			compa::completeLink($link,$backendLink);
		}


		?>
		<td align="left"><a href="<?php echo $link;  ?>" >
		<?php echo $mailing->subject; ?></a></td>
		 <?php if($mainframe->isAdmin()){ if ($show['status']) {

			 if ($mailing->visible == 1) {

				 $img = '16/status_g.png';
				 jnewsletter::getLegend( 'status_g.png', _ACA_VISIBLE .'/'. _ACA_TEMPLATE_PUBLISH );
			 } else {

				 $img = '16/status_r.png';
				 jnewsletter::getLegend( 'status_r.png',_ACA_NOTVISIBLE .'/'. _ACA_UNPUBLISHED );
			 }
		?>
		<td align="center"><center>
			<a href="<?php echo jnewsletter::createToggleLink( 'mailing', 'visible', 'mailingid' , $mailing->id ); ?>"> <img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img; ?>" width="12" height="12" border="0" alt="" /> </a>
		</center></td>
		 <?php }  } if ($show['id']) { ?>
		<td align="center"><center><?php echo $mailing->id; ?></center></td>
		<?php } ?>
	</tr>
	<?php
			$i++;
			 }
		 }
	?>
	</table>
    <input type="hidden" name="act" value="<?php echo $action; ?>" />
    <input type="hidden" name="listid" value="<?php echo $listId; ?>" />
    <input type="hidden" name="listype" value="<?php echo $listType; ?>" />
	<?php

	echo '<br />';
	echo jnewsletter::setLegend();
	 } //endfct


	 function editMailing($mailingEdit, $new, $listId, $forms, $show) {
		$lists = array();

		$folders 	= array();
		if ( ACA_CMSTYPE ) {
			$my	=& JFactory::getUser();
			$folders[] 	= JHTML::_('select.option', '/' );
			$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $mailingEdit->published );
			$lists['visible'] = JHTML::_('select.booleanlist', 'visible', 'class="inputbox"', $mailingEdit->visible );
		}//endif

		$images = $mailingEdit->images;
		if (!isset($mailingEdit->list_id)) $mailingEdit->list_id = $listId;

		$pathA 		= ACA_JPATH_ROOT_NO_ADMIN .'/images/stories';
		$pathL 		= ACA_JPATH_LIVE .'/images/stories';
		$images 	= array();


		if( ACA_CMSTYPE ){

			mailingsHTML::ReadImages( $pathA, '/', $folders, $images );

			if ( !isset($images['/'] ) ) {
				$images['/'][] = JHTML::_('select.option',  '' );
			}
			$javascript	= "onchange=\"previewImage( 'imagefiles', 'view_imagefiles', '$pathL/' )\"";
			$lists['imagefiles']	= JHTML::_('select.genericlist',   $images['/'], 'imagefiles', 'class="inputbox" size="10" multiple="multiple" '. $javascript , 'value', 'text', null );

			$javascript 	= "onchange=\"changeDynaList( 'imagefiles', folderimages, document.adminForm.folders.options[document.adminForm.folders.selectedIndex].value, 0, 0);  previewImage( 'imagefiles', 'view_imagefiles', '$pathL/' );\"";
			$lists['folders'] 	= JHTML::_('select.genericlist',   $folders, 'folders', 'class="inputbox" size="1" '. $javascript, 'value', 'text', '/' );

			$images2 = array();
			foreach( $mailingEdit->images as $file ) {
				$temp = explode( '|', $file );
				if( strrchr($temp[0], '/') ) {
					$filename = substr( strrchr($temp[0], '/' ), 1 );
				} else {
					$filename = $temp[0];
				}
				$images2[] = JHTML::_('select.option',  $file, $filename );
			}
			//$javascript	= "onchange=\"previewImage( 'imagelist', 'view_imagelist', '$path/' ); showImageProps( '$path/' ); \" onfocus=\"previewImage( 'imagelist', 'view_imagelist', '$path/' )\"";
			$javascript	= "onchange=\"previewImage( 'imagelist', 'view_imagelist', '$pathL/' ); showImageProps( '$pathL/' ); \"";
			$lists['imagelist'] 	= JHTML::_('select.genericlist',   $images2, 'imagelist', 'class="inputbox" size="10" '. $javascript, 'value', 'text' );

		  	$lists['_align'] 			= JHTML::_('list.positions', '_align' );
			$lists['_caption_align'] 	= JHTML::_('list.positions', '_caption_align' );
		}//endif


		if ( ACA_CMSTYPE ) {	// joomla 15
			$pos[] = JHTML::_('select.option', 'bottom', _CMN_BOTTOM );
			$pos[] = JHTML::_('select.option', 'top', _CMN_TOP );
			$lists['_caption_position'] = JHTML::_('select.genericlist', $pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text' );
		}//endif

		backHTML::formStart('edit_mailing', $mailingEdit->html, $images);
		echo $forms['main'];
//		if ( $new AND $mailingEdit->mailing_type==7 )
//		if ( $new )
//		{
//			$mailingEdit->issue_nb=0;
//		}

		mailingsHTML::layout($mailingEdit, $lists, $show);
		//echo 'My mailing edit:'. $mailingEdit->next_date;

		?>
		<input type="hidden" name="images" value="" />
		<input type="hidden" name="html" value="<?php echo $mailingEdit->html; ?>" />
		<input type="hidden" name="new_list" value="<?php echo $new; ?>" />
		<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
		<input type="hidden" name="listype" value="<?php echo $mailingEdit->mailing_type; ?>" />
		<input type="hidden" name="mailingid" value="<?php echo $mailingEdit->id; ?>" />
		<input type="hidden" name="issue_nb" value="<?php echo $mailingEdit->issue_nb; ?>" />
	    <input type="hidden" name="userid" value="<?php echo $my->id; ?>" />
	    <?php
	 }

	function lists($list) {

// Gino : added listType
	$listType = JRequest::getVar( 'listype' );
	if( !isset( $mailingEdit->list_type ) )
	{
		$mySess =& JFactory::getSession();
		if( !empty($mySess) ) $mailingEdit->list_type = $mySess->get('listype', '', 'LType');

	} //endif
	$listType = ( !empty($listType) ) ? $listType : $mailingEdit->list_type;
	$typeList = ( !empty($listType) && ( $listType == 2 ) ) ? 2 : 1;

?>
	<div style="padding: 2px;"><span style="font-size: 12px;"><?php if( $typeList == 2 ) { echo _ACA_SUBS_LIST_CAMPAIGN; } else { echo _ACA_SUBS_LIST_LABEL; } ?></span></div>
	<table class="joobilist">
		<thead>
				<tr>
					<th class="title">
						#
					</th>
					<th class="title">
						<?php echo _ACA_LIST_NAME; ?>
					</th>
					<th class="title">
						<?php echo _ACA_SUBS_LIST_RECEIVE; ?>
					</th>
				</tr>
		</thead>
		<tbody>

		<?php
		//echo 'list type:'.$typeList;
			$lists = lists::getLists('', $typeList, '', '', false, true, false,false,false);
			$k = 0;
			$i = 0;

			foreach($lists as $list){
		?>
				<tr class="<?php echo "row$k"; ?>">
					<td width="5%">
						<center>
							<?php
								echo $i+1;
							 ?>
					 	</center>
					</td>
					<td>
						<?php

// < Gino > : added this code
						$getMailingId = ( !empty($mailingEdit->id) ) ? $mailingEdit->id : JRequest::getVar( 'mailingid' );
						$result = xmailing::mailingListFound( $getMailingId, $list->id );
						$result = ( $result ) ? 1 : 0;
// </ Gino >

						//function booleanlist( $name, $attribs = null, $selected = null, $yes='yes', $no='no', $id=false )
						$text = '<b>List ID: </b>'.$list->id;
						$text .= '<br/>'.str_replace(array("'",'"'),array("&#039;",'&quot;'),$list->list_desc);
						$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$list->list_name);
						//echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
						echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title);
						?>
					</td>
					<td  width="100px" nowrap="nowrap">
						<center>
							<?php
							if ( ACA_CMSTYPE ) {
							echo JHTML::_('select.booleanlist', "aca[aca_mailing_addto][".$list->id."]" , 'class="inputbox"',$result,'Yes','No');
							}//endif
							?>
						</center>
					</td>
				</tr>
			<?php
					$k = 1-$k;
					$i++;
				}
				if (count($lists>3)){
			?>
				<tr>
					<td colspan="3" align="center" nowrap="nowrap">
						<script language="javascript" type="text/javascript">
							function updateStatus(statusval){
								<?php foreach($lists as $row){?>
								window.document.getElementById('aca[aca_mailing_addto][<?php echo $row->id; ?>]'+statusval).checked = true;
								<?php } ?>
							}
						</script>
						<div style="float:right; font-size: 12px;"><a title="Click to select all list" href="#" onclick="updateStatus(1);"><?php echo _ACA_SUBS_LIST_TOALL; ?></a> | <a href="#" onclick="updateStatus(0);"><?php echo _ACA_SUBS_LIST_TONONE; ?></a></div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>



		<?php
	 }
	function subject($mailingEdit, $lists, $show) {

?>	<fieldset class="jnewslettercss">
		<table class="jnewslettertabletable" cellspacing="1" border="0">
			<tbody>
				<tr>
					<td width="110px" class="key">
						<span class="editlinktip">
							<?php
								$tip = _ACA_INFO_LIST_SUBJET ;
								$title = _ACA_SUBJECT;
								echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
							?>
							</span>
						</td>
						<td>
							<?php
							 	$text = str_replace('"', '&quot;' , $mailingEdit->subject);
							 	if (function_exists('htmlspecialchars_decode')) {
							 		$text = htmlspecialchars_decode( $text , ENT_NOQUOTES);
							 	} elseif (function_exists('html_entity_decode')) {
							 		$text = html_entity_decode( $text , ENT_NOQUOTES);
							 	}
								echo ' <input type="text" name="subject" class="inputbox" size="50" maxlength="64" value="' .  $text  .'" />' ;
							 ?>
						</td>
					</tr>

					<?php if ($show['delay']) {?>
							<tr>
								<td class="key">
									<span class="editlinktip">
									<?php
										$tip = _ACA_INFO_LIST_DELAY ;
										$title = _ACA_AUTO_DELAY;
										echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
									?>
									</span>
								</td>
								<td>
								<?php
								$mailid = JRequest::getVar( 'mailingid' );
								$delay = ( !empty($mailid) ) ? $mailingEdit->delay / 1440 : xmailing::countMailings(0, 2);
								//$delay = $mailingEdit->delay / 1440;
								?>
									<input type="text" name="delay" class="inputbox" size="5" maxlength="10" value="<?php echo $delay; ?>" />
								</td>
							</tr>
					<?php } ?>
					<?php if (($show['pub_date']) AND ($GLOBALS[ACA.'listype2']=='1') AND class_exists('auto')) { ?>
						<tr>
							<td class="key">
								<span class="editlinktip">
								<?php
									$tip = _ACA_INFO_LIST_DATE ;
									$title = _ACA_LIST_DATE;
									$tip .= '<br/>(Actual server time is '. jnewsletter::getNow() .' )';
									echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
								?>
								</span>
							</td>
							<td>
							<?php
							 if(ACA_CMSTYPE){//Joomla 1.5
							 if (!isset($doc)) $doc =& JFactory::getDocument();
				             	 $doc->addStyleSheet(ACA_PATH_ADMIN_INCLUDES.'calendar2/css/calendar.css');
				             	 $doc->addScript(ACA_PATH_ADMIN_INCLUDES.'calendar2/js/calendar.js');
			             	}//endif
			             	?>
							<input id="acaCalendar" type="text" value="<?php echo $mailingEdit->send_date; ?>" name="senddate">
							<input title="<?php echo _ACA_DATETIME; ?>" type="button" class="calendarDash" value="" onclick="displayCalendar(document.getElementById('acaCalendar'),'yyyy-mm-dd hh:ii',this,true)">
							</td>
						</tr>
					<?php } ?>
						<?php if ($show['published']) {?>
						<tr>
							<td width="80" class="key">
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
					<?php } ?>
					<?php if ($show['hide']) {?>
						<tr>
							<td width="80" class="key">
								<span class="editlinktip">
								<?php
									$tip = _ACA_INFO_MAILING_VISIBLE;
									$title = _ACA_VISIBLE_FRONT;
									echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
								?>
								</span>
							</td>
							<td><?php echo $lists['visible']; ?></td>
						</tr>
					<?php } ?>
						</tbody>
					</table>
					</fieldset>

	<?php
	 }
	function contenttag($mailingEdit) {
	?>
	<script language="javascript" type="text/javascript">
<!--

	function jNewsTagInsert(jtag) {
	var form = document.adminForm;
	if(!form){
		form = document.mosForm;
	}

	form.jnewstag.value = jtag;
	}
//-->
</script>
	<?php echo _ACA_MAILING_TAG_INSTRUCT;?>
	<div style="margin: 2px;">
	<input type="text" onfocus="this.select();" size="30" class="inputbox" name="jnewstag">
	<input type="button" class="joobibutton" onclick="jInsertEditorText(form.jnewstag.value,'content');" value="<?php echo _ACA_MAILING_TAGINSERT;?>">
	</div>
	<table class="joobilist">
			<tbody>
				<thead>
					<tr>
						<th class="title"><center></center></th>
						<th class="title"><center><?php echo _ACA_MAILING_TAG; ?></center></th>
						<th class="title"><center><?php echo _ACA_TEMPLATE_DESC; ?></center></th>
					</tr>
				</thead>
				<tr class="row0">
					<td><input type="radio" name="jtagname" value="[NAME]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[NAME]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_NAME_DESC; ?>
					</td>
				</tr>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[FIRSTNAME]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[FIRSTNAME]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_FNAME_DESC; ?>
					</td>
				</tr>
				<tr class="row0">
					<td><input type="radio" name="jtagname" value="[ISSUENB]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[ISSUENB]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_ISSUENB_DESC; ?>
					</td>
				</tr>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[DATE]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[DATE]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_DATE_DESC;
							$mailingType=JRequest::getInt( 'listype',0 );
							  if ($mailingType == 7){
						 ?>
					</td>
				</tr>

				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[SMARTNEWSLETTER]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php  echo '[SMARTNEWSLETTER]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_SMART_TAG; }?>
					</td>
				</tr>



				<tr class="row0">
					<td><input type="radio" name="jtagname" value="[SUBSCRIPTIONS]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[SUBSCRIPTIONS]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_SUBSCRIPTION_DESC ?>
					</td>
				</tr>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[UNSUBSCRIBE]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[UNSUBSCRIBE]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_UNSUBSCRIBE_DESC ?>
					</td>
				</tr>
				<tr class="row0">
					<td><input type="radio" name="jtagname" value="{viewonline:<?php echo _ACA_TAG_VIEWONLINE;?>}" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php if ($GLOBALS[ACA.'type']=='PLUS' OR $GLOBALS[ACA.'type']=='PRO'){
									echo "{viewonline:text here}";
						         ?>
						 </strong>
					</td>
					<td>
						<?php echo _ACA_TAG_VIEWONLINE_DESC ?>
					</td>
				</tr>

				<tr class="row0">
					<td><input type="radio" name="jtagname" value="{module=id}" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo "{module=id}"; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_LOADMODINFO_DESC; } ?>
					</td>
				</tr>

				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[CBTAG:{field_name}]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo "[CBTAG:{field_name}]"; ?></strong>
					</td>
					<td>
						<?php echo _ACA_TAG_CBNAME_DESC ?>
					</td>
				</tr>

			<?php if($GLOBALS[ACA.'type']=='PRO'){
				if($GLOBALS[ACA.'show_column1']==1){?>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[COLUMN1]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[COLUMN1]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_COLUMN1_DESC ?>
					</td>
				</tr>
				<?php
				}
				if($GLOBALS[ACA.'show_column2']==1){
				?>
				<tr class="row0">
					<td><input type="radio" name="jtagname" value="[COLUMN2]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[COLUMN2]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_COLUMN2_DESC ?>
					</td>
				</tr>
				<?php
				}
				if($GLOBALS[ACA.'show_column3']==1){
				?>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[COLUMN3]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[COLUMN3]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_COLUMN3_DESC ?>
					</td>
				</tr>
				<?php
				}
				if($GLOBALS[ACA.'show_column4']==1){
				?>
				<tr class="row0">
					<td><input type="radio" name="jtagname" value="[COLUMN4]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[COLUMN4]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_COLUMN4_DESC ?>
					</td>
				</tr>
				<?php
				}
				if($GLOBALS[ACA.'show_column5']==1){
				?>
				<tr class="row1">
					<td><input type="radio" name="jtagname" value="[COLUMN5]" onclick="isChecked(this.checked); jNewsTagInsert(this.value);" /></td>
					<td>
						<strong><?php echo '[COLUMN5]'; ?></strong>
					</td>
					<td>
						<?php echo _ACA_COLUMN5_DESC ?>
					</td>
				</tr>
			<?php } //endif
				}//endif
				 ?>
			</tbody>
		</table>

	<?php
	 }
	function senderinfo($mailingEdit, $lists, $show) {
	?>
	<?php if ($show['sender_info']) {?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_LIST_T_SENDER; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SENDER_NAME ;
					$title = _ACA_SENDER_NAME;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
			<?php
				$text = str_replace('"', '&quot;' , $mailingEdit->fromname);
			 	if (function_exists('htmlspecialchars_decode')) {
			 		$text = htmlspecialchars_decode( $text , ENT_NOQUOTES);
			 	} elseif (function_exists('html_entity_decode')) {
			 		$text = html_entity_decode( $text , ENT_NOQUOTES);
			 	}
				echo '<input type="text" name="fromname" class="inputbox" size="20" maxlength="64" value="' . $text  .'" />';


// Subscriber Box List for sender tab ==========================================
			?>
				<?php // clickable image for sender list
				?>
				&nbsp;<img src="components/com_jnewsletter/images/16/profile.png" id="popbtn" name="popbtn" onClick="document.getElementById('poplist').style.display = 'inline'; document.getElementById('popbtn').style.display = 'none';" title="<?php echo _ACA_SENDER_LIST_INFO; ?>" style="position:absolute;">

				<?php //Select tag with script
				?>
				<select id="poplist" name="poplist" style="display:none;position:absolute;" onChange="document.getElementById('poplist').style.display = 'none'; document.getElementById('popbtn').style.display = 'inline';">

				<?php //create a default sender value for NONE/NULL
				?>
				<option value="0" onClick="document.adminForm.fromname.value=''; document.adminForm.fromemail.value='';"> </option>
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

						$selected = ( (isset($mailingEdit->fromname) && ($mailingEdit->fromname==$name)) && (isset($mailingEdit->fromemail) && ($mailingEdit->fromemail==$email)) ) ? true : false;
				?>
						<option value="<?php echo $subscribersList->name; ?>" onClick="document.adminForm.fromname.value='<?php echo $name; ?>'; document.adminForm.fromemail.value='<?php echo $email; ?>';" <?php if($selected) {echo 'selected';} ?>> <?php echo $subscribersList->name .' ('. $subscribersList->email .')'; ?> </option>
				<?
					} //endf
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
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input type="text" name="fromemail" class="inputbox" size="20" maxlength="64" value="<?php echo $mailingEdit->fromemail; ?>" />
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_SENDER_BOUNCED ;
					$title = _ACA_SENDER_BOUNCE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input type="text" name="frombounce" class="inputbox" size="20" maxlength="64" value="<?php echo $mailingEdit->frombounce; ?>" />
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_ACA_OWNER ;
					$title = _ACA_OWNER;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $mailingEdit->author_id; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>

	<?php
	 }
	}
	function layout($mailingEdit, $lists, $show) {

		if (ACA_CMSTYPE) $editor =& JFactory::getEditor();
		if(!empty($_SESSION['skip_subscribers'.$mailingEdit->id])){
			echo 'If you click on the Send button, the process will skip the first '.$_SESSION['skip_subscribers'.$mailingEdit->id].' subscribers';
		}
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo @constant( $GLOBALS[ACA.'listname'.$mailingEdit->mailing_type] ).' '. _ACA_CONTENT ; ?></legend>
	<table class="jnewslettertable" cellspacing="1" width="99%" border="0">
		<tbody>
		<tr>
			<td valign="top">

		<?php
		mailingsHTML::subject($mailingEdit, $lists, $show);

		if( !isset($mailingEdit->id) || ( empty($mailingEdit->id) && $mailingEdit->id < 1 ) ){

			if (!empty($mailingEdit->template_id) || isset($mailingEdit->template_id)) {
				$template = templates::getOneTemplate($mailingEdit->template_id);

			}else{
				$template = templates::getDefault();
				$mailingEdit->template_id = $template->template_id;
			}//endif

			$mailingEdit->htmlcontent = ( isset( $template->body ) ) ? $template->body : '';

		}//endif

		 if ($show['htmlcontent']) {
				if (ACA_CMSTYPE) {
					echo '<fieldset class="jnewslettercss" id="htmlfieldset">';
					echo '<legend>';
					echo _ACA_HTML_VERSION ;
					echo '</legend>';
					echo $editor->display( 'content',  $mailingEdit->htmlcontent , '100%', '400', '80', '30' ) ;
					echo '</fieldset>';
				}
		}
		 ?>
			</td>
			<td valign="top" width="490px" rowspan="2">
			<?php
			if ( ACA_CMSTYPE ) {
				 $config_tabs = new mosTabs15(0);
			}//endif

			$config_tabs->startPane('acaMailingOptions');

			$config_tabs->startTab(_ACA_LIST_T_LIST, 'acaMailingOptions.general');
			mailingsHTML::lists($mailingEdit, $lists, $show);
			$config_tabs->endTab();

			$config_tabs->startTab(_ACA_LIST_T_SENDER, 'acaMailingOptions.general');
			mailingsHTML::senderinfo($mailingEdit, $lists, $show);
			$config_tabs->endTab();

			$config_tabs->startTab(_ACA_LIST_OPT_TAG, 'acaMailingOptions.options');
			mailingsHTML::contenttag($mailingEdit);
			$config_tabs->endTab();

			 if ($show['sitecontent']) {
				$config_tabs->startTab(_ACA_LIST_OPT_CTT, 'acaMailingOptions.content');

				echo  _ACA_CONTENT_ITEM_SELECT_T;

				if (ACA_CMSTYPE) {
					global $mainframe;
					JPluginHelper::importPlugin( 'jnewsletter' );
					$bot_results = $mainframe->triggerEvent( 'jnewsletterbot_editabs' );

				}

				 if (!empty($bot_results)) {
					 foreach($bot_results as $bot_result) {
						 echo $bot_result[1];
					 }
				 }
				$config_tabs->endTab();
			}

			if ($GLOBALS[ACA.'show_jcalpro'] and class_exists('pro')) {
				$config_tabs->startTab(_ACA_SHOW_JCALPRO, 'acaMailingOptions.jcalpro');
				mailingsHTML::jcalpro();
				$config_tabs->endTab();
			}

			if ($show['attachement'] ) {
				$config_tabs->startTab(_ACA_ATTACHMENTS, 'acaMailingOptions.attachement');
				mailingsHTML::attachement($mailingEdit, null, null);
				$config_tabs->endTab();
			}


			if ( $mailingEdit->mailing_type=='2' AND class_exists('autoresponder') )
			{
				$config_tabs->startTab(_ACA_AUTORESP, 'acaListEdit.autorespond');
				autoresponder::edit($mailingEdit, $lists, $show, $mailingEdit->html );
				$config_tabs->endTab();
		 	} //endif

			if ( $mailingEdit->mailing_type=='7' AND class_exists('autonews') )
			{
				$listA = array();
				$jour = array();

				if ( ACA_CMSTYPE )
				{	// joomla 15

					$my =& JFactory::getUser();
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

					if( isset($mailingEdit->new_letter) && $mailingEdit->new_letter == 1) $auto_option[] = JHTML::_('select.option', '2', _ACA_AUTO_OPTION_ALL );

					if( !isset($listA['delay_min']) ) $listA['delay_min'] = null;
					$listA['delay_min'] = JHTML::_('select.genericlist', $jour, 'delay_min', 'class="inputbox" size="1"', 'value', 'text', ( isset($mailingEdit->delay_min) ) ? $mailingEdit->delay_min : 0 );
				} //endif

				$config_tabs->startTab(_ACA_AUTONEWS, 'acaListEdit.smartnews');
				autonews::edit($mailingEdit, $listA, $show, $mailingEdit->html);
				$config_tabs->endTab();
			} //endif

			$config_tabs->endPane();
			?>
			</td>
		</tr>


	<?php if (($show['textcontent'])) {?>
		<tr>
			<td>
				<fieldset class="jnewslettercss">
				<legend><?php echo _ACA_NONHTML_VERSION; ?></legend>
				<textarea name="textcontent_" id="altbody" rows="20" cols="70" style="width: 100%; height: 400px;">
					<?php echo strip_tags($mailingEdit->textonly) ; ?>
				</textarea>
				</fieldset>
			</td>
			<td>
			</td>
		</tr>
	<?php } ?>
		</tbody>
	</table>
	</fieldset>
	<input type="hidden" id="template_id" name="template_id" value="<?php echo $mailingEdit->template_id; ?>" />
	<?php
	}
	function insertTemplate($editor) {

	?>
		<table style="border: 1px solid #000; width: 100%;" cellpadding="10" cellspacing="5">
			<tbody>
				<tr>
					<td>
					<?php
					$applyEditor = $editor->setContent($editor->_name, 'newbody');

				$script = "function changeTemplate(newbody,newaltbody,template_id){
			if(newbody.length>2){".$applyEditor."}
			var vartextarea =$('altbody'); if(newaltbody.length>2){vartextarea.setHTML(newaltbody);}
			var vartempid =$('tempid'); vartempid.value = tempid;
				}
				";
				$doc =& JFactory::getDocument();
				$doc->addScriptDeclaration( $script );

						$templates = templates::getTemplates(false, false, true, '', -1, 3);
						$i=0;
						foreach($templates as $template){

							$imgPath = ACA_PATH_ADMIN_THUMBNAIL_SHOW.$template->thumbnail;
							$img = jnewsletter::imageResize($imgPath, 100, 100, $template->thumbnail);
							$html = '';
							$html = '<a href="#" onclick="changeTemplate(document.getElementById(\'jnewshtmlcontent\').innerHTML, document.getElementById(\'jnewsaltbody\').innerHTML, '.$template->template_id.');">';
							$html .= '<div style="margin:5px; float: left; border: 1px solid #000;">'.$img.'</div>';
							$html .= '<div id="jnewshtmlcontent" style="display:none;">'.$template->body.'</div>';
							$html .= '<div id ="jnewsaltbody" style="display:none;">'.$template->altbody.'</div>';
							$html .= '</a>';
							echo $html;
							$i=$i+1;
						}//endforeach
					?>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}
	function attachement($mailingEdit, $lists, $show) {
		foreach($mailingEdit->attachments as $attach => $k){
			$mailingEdit->attachments[$attach] = basename($k);
		}

		if ( ACA_CMSTYPE ) {	// joomla 15
			$path = ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'upload_url'];

			$arr = array(null);
			// Get the files and folders
			jimport('joomla.filesystem.folder');
			$files2		= JFolder::files($path, '.', true, true);
			$folders	= JFolder::folders($path, '.', true, true);
			// Merge files and folders into one array
			$files = array_merge($files2, $folders);
			// Sort them all
			asort($files);
		}//endif

		// check deleted attachments
		$rem = JRequest::getVar( 'rem' );
		if( !empty($rem) )
		{
			// get the lenght of the previous url
			$reml = JRequest::getVar( 'reml' );

			attachment::deleteAttachment($rem);
			attachment::deleteAttachmentQuery($rem);

			$urlInstances = JURI::getInstance();
			if( isset($urlInstances->_uri) && !empty($urlInstances->_uri) )
			{
				$url = $urlInstances->_uri;
				$url = substr( $url, 0, '-'.(int)$reml );

				// refresh or reload page with the extra url [previous]
				//header("Refresh: 0.5; url=$url");
				compa::redirect( $url );
			} //endif
		} //endif

		if(sizeof($files) > 0)
		{
			$delImgPath = ACA_JPATH_LIVE .DS. 'administrator' .DS. 'images' .DS. 'delete_f2.png';

			foreach( $files as $file )
			{
				$file = basename($file);

				// create delete link for attachment files
				$urlInstances = JURI::getInstance();
				if( isset($urlInstances->_uri) && !empty($urlInstances->_uri) )
				{
					$url = $urlInstances->_uri;

					$urlExtra = "&rem=". $file ."&reml=";
					$urlExtraMain = $urlExtra;

					// we need to get the extra url length
					$urlExtraLength = strlen( $urlExtra );

					// now we need to add the length count
					$urlExtra .= $urlExtraLength;

					// we need to get the extra url length again with its length count
					$urlExtraLength = strlen( $urlExtra );

					// we need to set the length count again [ now with its full count] and set it as our final url
					$url .= $urlExtraMain.$urlExtraLength;

					//$link = '<a href="'.$url.'" onClick="callAlert()">';
					$link = '<a href="'. $url .'">';
				}
				else
				{
					$url = "Link Error";

					//$link = '<a href="'.$url.'" onClick="callAlert()">';
					$link = '<a href="'. $url .'" onClick="window.alert("wee");">';
				} //endif

				if(in_array($file, $mailingEdit->attachments))
				{
					echo "<input name='attachments[]' type='checkbox' value='".$file."' checked> ". $file ." ". $link ." <img src='". $delImgPath ."' title='Delete ". $file ."' style='width:16px;height:16px;'></a> <br>";
				}
				else
				{
					echo "<input name='attachments[]' type='checkbox' value='".$file."'> ". $file ." ". $link ." <img src='". $delImgPath ."' title='Delete ". $file ."' style='width:16px;height:16px;'></a> <br>";
				} //endif
			} //endforeach
		} //endif

		echo "<br><br>";

/*
		echo '<select name="attachments[]" multiple="multiple" style="width: 100%;" size="10">';
		if(sizeof($files) > 0) {
			 foreach ($files as $file) {
				 $file = basename($file);
				 if(in_array($file, $mailingEdit->attachments)) {
					 echo '<option selected="selected">' . $file . '</option>' . "\n";
				 } else {
					 echo '<option>' . $file . '</option>' . "\n";
				 }
			 }
		}
		echo '</select>';
*/

?>
<script src="<?php echo ACA_PATH_ADMIN_INCLUDES; ?>multifile.js"></script>

<input id="my_file_element" type="file" name="file_1" >
</input>

<br /><b><?php echo _ACA_FILES ; ?>:</b>

<div id="files_list"></div>
<script>

	var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), 10 );
	multi_selector.addElement( document.getElementById( 'my_file_element' ) );
</script>

<?php

	}


	 function images($lists) {

		if(ACA_CMSTYPE){
			return '';
		}
	?>
				<table class="adminform" width="100%">
				<tr>
					<th colspan="2">
						MOSImage Control
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<table width="100%">
						<tr>
							<td width="48%" valign="top">
								<div align="center">
									Gallery Images:
									<br />
									<?php echo $lists['imagefiles'];?>
								</div>
							</td>
							<td width="2%">
								<input class="button" type="button" value=">>" onclick="addSelectedToList(selectFormFB(),'imagefiles','imagelist')" title="Add" />
								<br />
								<input class="button" type="button" value="<<" onclick="delSelectedFromList(selectFormFB(),'imagelist')" title="Remove" />
							</td>
							<td width="48%">
								<div align="center">
									Content Images:
									<br />
									<?php echo $lists['imagelist'];?>
									<br />
									<input class="button" type="button" value="Up" onclick="moveInList(selectFormFB(),'imagelist',selectFB('imagelist.selectedIndex'),-1)" />
									<input class="button" type="button" value="Down" onclick="moveInList(selectFormFB(),'imagelist',selectFB('imagelist.selectedIndex'),+1)" />
								</div>
							</td>
						</tr>
						</table>
						Sub-folder: <?php echo $lists['folders'];?>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<div align="center">
							Sample Image:<br />
							<img name="view_imagefiles" src="../images/M_images/blank.png" alt="Sample Image" width="100" />
						</div>
					</td>
					<td valign="top">
						<div align="center">
							Active Image:<br />
							<img name="view_imagelist" src="../images/M_images/blank.png" alt="Active Image" width="100" />
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Edit the image selected:
						<table>
						<tr>
							<td align="right">
							Source:
							</td>
							<td>
							<input class="text_area" type="text" name= "_source" value="" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Image Align:
							</td>
							<td>
							<?php echo $lists['_align']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Alt Text:
							</td>
							<td>
							<input class="text_area" type="text" name="_alt" value="" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Border:
							</td>
							<td>
							<input class="text_area" type="text" name="_border" value="" size="3" maxlength="1" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Caption:
							</td>
							<td>
							<input class="text_area" type="text" name="_caption" value="" size="30" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Caption Position:
							</td>
							<td>
							<?php echo $lists['_caption_position']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Caption Align:
							</td>
							<td>
							<?php echo $lists['_caption_align']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Caption Width:
							</td>
							<td>
							<input class="text_area" type="text" name="_width" value="" size="5" maxlength="5" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<input class="button" type="button" value="Apply" onclick="applyImageProps()" />
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
	<?php
	}


	 function viewMailing($mailing, $forms) {

	echo $forms['main'];
	?>
	<table width="100%" cellpadding="4" cellspacing="0" border="0" align="left" class="adminlist">
		<tr>
			<th width="100px" align="left">
				<strong><?php echo _ACA_SUBJECT; ?>:</strong>
			</th>
			<th align="left">
				<?php echo $mailing->subject; ?>
			</th>
		</tr>
		<tr>
			<th align="left">
				<strong><?php echo _ACA_LIST_DATE; ?>:</strong>
			</th>
			<th align="left">
				<?php echo $mailing->send_date; ?>
			</th>
		</tr>
		<tr>
			<th align="left">
				<strong><?php echo _ACA_LIST_ISSUE; ?>:</strong>
			</th>
			<th  align="left">
				<?php echo $mailing->issue_nb; ?>
			</th>
		</tr>

		<tr>
			<th width="100%" align="left" colspan="2">
				<strong><?php echo _ACA_CONTENT; ?>:</strong>
			</th>
		</tr>
		<tr>
			<td  align="left" colspan="2">
				<?php echo $mailing->htmlcontent; ?>
			</td>
		</tr>

		<?php if(!empty($mailing->attachments)) { ?>
		<tr>
			<th align="left" valign="top">
				<strong><?php echo _ACA_ATTACHED_FILES; ?>:</strong>
			</th>
			<td align="left">
				<?php
				foreach ($mailing->attachments as $file) {
					echo '<a href="'.ACA_JPATH_LIVE.$GLOBALS[ACA.'upload_url'].DS.basename($file).'" target="_blank">'.basename($file).'</a><br />';
				}
				?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php

	}

	function jcalpro(){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif


		$tip =  _ACA_JCALTAGS_DESC_TIPS;
		$title =  _ACA_JCALTAGS_DESC ;
		$desc = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";
		$tip =  _ACA_JCALTAGS_START_TIPS;
		$title =  _ACA_JCALTAGS_START ;
		$start = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";
		$tip =  _ACA_JCALTAGS_READMORE_TIPS;
		$title =  _ACA_JCALTAGS_READMORE ;
		$read = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";

		 $query = "SELECT `cat_id`,`cat_name` FROM #__jcalpro2_categories";
		 $database->setQuery($query);
		 $jcalcats = $database->loadObjectList();

		$events = array();
		$year = intval(date('Y'));
		 if(!empty($jcalcats)){
		 	foreach($jcalcats as $jcalcat){
				 $query = "SELECT `extid`, `title` ,`start_date` FROM #__jcalpro2_events where `cat` = ".$jcalcat->cat_id." AND (`start_date` >= '".$year."' OR `end_date` >= '".$year."' ) ORDER BY `start_date` DESC";
				 $database->setQuery($query);
				 $events[$jcalcat->cat_id] = $database->loadObjectList();
			}
		 }

?>
<script type="text/javascript">
<!--

var events = new Array;

<?php
if(!empty($events)){
	$i = 0;
	foreach($events as $cat => $eventcat){
		if(!empty($eventcat)){
			foreach ($eventcat as $event){
				echo 'events['.$i.'] = new Array(\''.$cat.'\',\''.$event->extid.'\',\''.addslashes($event->title).' ('.$event->start_date.')\');'."\n";
				$i++;
			}
		}
	}
}
?>
var formname = 'adminForm';
if(!document.adminForm){
	formname = 'mosForm';
}

function updatejCalCat(){

	var catid = eval('document.'+formname+'.jcal_cat.value');
	var list = eval( 'document.'+formname+'.jcal_event');

	var i = 0;
	// empty the list
	for (i in list.options.length) {
		list.options[i] = null;
	}
	i = 0;
	for (a in events) {
		if (events[a][0] == catid) {
			opt = new Option();
			opt.value = events[a][1];
			opt.text = events[a][2];
			list.options[i++] = opt;
		}
	}
	list.length = i;

}

function updatejCaltag(){
	var eventid = eval('document.'+formname+'.jcal_event.value');
	var start = eval('document.'+formname+'.jcal_start');
	var desc = eval('document.'+formname+'.jcal_desc');
	var read = eval('document.'+formname+'.jcal_read');
	var tag = eval('document.'+formname+'.jcal_tag');

	for (i=0;i<start.length;i++) {
        if (start[i].checked) {
             var start_value = start[i].value;
        }
    }
	for (i=0;i<desc.length;i++) {
        if (desc[i].checked) {
             var desc_value = desc[i].value;
        }
    }
	for (i=0;i<read.length;i++) {
        if (read[i].checked) {
             var read_value = read[i].value;
        }
    }

	tag.value = "{jcalevent:" + eventid + "|" + start_value + "|" + desc_value + "|" + read_value + "}";
}
//-->
</script>

		<table class="jnewslettercss_bots" width="100%">
			<tr>
				<td style="vertical-align: top;" colspan="2">
				<?php
					$tip = _ACA_JCALTAGS_TITLE_TIPS;
					$title = _ACA_JCALTAGS_TITLE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
					<input class="inputbox" type="text" onfocus="this.select();" size="20" name="jcal_tag"/>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $start ?>
				</td>
				<td>
	                <input type="radio" name="jcal_start" value="0" onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_PATH_ADMIN_IMAGES; ?>16/status_r.png" width="12" height="12" border="0" alt="No" />
	                <input type="radio" name="jcal_start" value="1" checked="checked" onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_PATH_ADMIN_IMAGES; ?>16/status_g.png" width="12" height="12" border="0" alt="Yes" />
	             </td>
			</tr>
			<tr>
				<td>
					<?php echo $desc ?>
				</td>
				<td>
					<input type="radio" name="jcal_desc" value="0"  onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_PATH_ADMIN_IMAGES; ?>16/status_r.png" width="12" height="12" border="0" alt="No" />
	                <input type="radio" name="jcal_desc" value="1"  checked="checked" onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_PATH_ADMIN_IMAGES; ?>16/status_g.png" width="12" height="12" border="0" alt="Yes" />
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $read ?>
				</td>
				<td>
					<input type="radio" name="jcal_read" value="0" onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_JPATH_LIVE; ?>/administrator/images/publish_x.png" width="12" height="12" border="0" alt="No" />
	                <input type="radio" name="jcal_read" value="1" checked="checked" onclick="updatejCaltag();" />
	                <img src="<?php echo ACA_JPATH_LIVE; ?>/administrator/images/tick.png" width="12" height="12" border="0" alt="Yes" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
<?php
	 	echo '<select class="inputbox" onchange="updatejCalCat();" size="1" name="jcal_cat">';
		 if(!empty($jcalcats)){
		 	foreach($jcalcats as $jcalcat){
				echo '<option value="'.$jcalcat->cat_id.'">'.$jcalcat->cat_name.'</option>';
		 	}
		 }

		echo '</select>';
?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<select name="jcal_event" class="inputbox" size="30" onchange="updatejCaltag();">
					<?php
					if(!empty($jcalcats)){
						 if(!empty($events[$jcalcats[0]->cat_id])) {
							 foreach ($events[$jcalcats[0]->cat_id] AS $event) {
								 echo '<option value="' . $event->extid . '">' . $event->title.' ('.$event->start_date.') </option>' . "\n";
							 }
						 }
 					}
					?>
					</select>
				</td>
			</tr>
		</table>
<?php
	}



	function ReadImages( $imagePath, $folderPath, &$folders, &$images )
	{

		jimport( 'joomla.filesystem.folder' );
		$imgFiles = JFolder::files( $imagePath );

		if ( !empty($imgFiles) ) {
			foreach ($imgFiles as $file)
			{
				$ff_ 	= $folderPath.DS.$file;
				$ff 	= $folderPath.DS.$file;
				$i_f 	= $imagePath .'/'. $file;

				if ( is_dir( $i_f ) && $file <> 'CVS' && $file <> '.svn') {
					$folders[] = JHTML::_('select.option',  $ff_ );
					mailingsHTML::ReadImages( $i_f, $ff_, $folders, $images );
				} else if ( eregi( "bmp|gif|jpg|png", $file ) && is_file( $i_f ) ) {
					// leading / we don't need
					$imageFile = substr( $ff, 1 );
					$images[$folderPath][] = JHTML::_('select.option',  $imageFile, $file );
				}
			}
		}//endif

	}


 }
