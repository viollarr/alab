<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 class backHTML {

	 function formStart($javascriptType='', $html = 0, $images=null) {

		if (ACA_CMSTYPE) {
			$editor =& JFactory::getEditor();
		}//endif

		//echo $javascriptType.'445';

		 echo '<script language="javascript" type="text/javascript">';
		 switch ($javascriptType) {
			case 'edit_mailing':
				if(!ACA_CMSTYPE){
					?>
					var folderimages = new Array;
					<?php
					$i = 0;
					foreach ($images as $k=>$items) {
						foreach ($items as $v) {
							echo "folderimages[".$i++."] = new Array( '$k','".addslashes( ampReplace( $v->value ) )."','".addslashes( ampReplace( $v->text ) )."' );\t";
						}
					}
				}
			?>

			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'show' || pressbutton == 'cpanel') {
					submitform( pressbutton );
					return;
				}
				<?php
				if(!ACA_CMSTYPE){
				?>
					var temp = new Array;
					for (var i=0, n=form.imagelist.options.length; i < n; i++) {
						temp[i] = form.imagelist.options[i].value;
					}
					form.images.value = temp.join( '\n' );
				<?php
				}
				?>

				if (form.subject.value == ""){
					alert( "Mailing must have a title" );
				} else {
					<?php
					if($html != 0) {
						if (ACA_CMSTYPE) echo $editor->save( 'content' );
					 }
					?>
					if(pressbutton){
						if (pressbutton == 'saveSend') {
							if (!confirm('Are you sure you want to proceed?')){return;}
							form.action = 'index2.php?option=com_jnewsletter&act=mailing';
						}
						form.task.value=pressbutton;
					}
					form.submit();
				}

			}
		<?php
				break;
			case 'show_mailing':
			?>
			function checkcid(myField) {
				myField.checked = true;
				isChecked(true);
			}
			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				}
				if (pressbutton == 'sendNewsletter') {
					if (!confirm('Are you sure you want to proceed?')){return;}
					form.action = 'index2.php?option=com_jnewsletter&act=mailing';
				}
				submitform( pressbutton );
			}
			<?php
				break;
			case 'template':
			?>
				function submitbutton(pressbutton) {
					var form = document.adminForm;
					if (pressbutton == 'cancel' || pressbutton == 'cpanel') {
					submitform( pressbutton );
					return;
					}
					if (pressbutton == 'save' || pressbutton == 'apply'){
						if(form.template_namekey.value == "" || form.template_namekey.value == ""){
							alert( "<?php echo _ACA_TEMPLATE_ALERT; ?>" );
						}else{
							submitform( pressbutton );
						}

						return;
					}

				}

			<?php
				break;
			case 'addsubsback':
			?>
				function submitbutton(pressbutton) {
					var form = document.adminForm;
					if (pressbutton == 'cancelSub' || pressbutton == 'cpanel') {
					submitform( pressbutton );
					return;
					}
					if (pressbutton == 'doNew'){
						if(form.email.value == ""){
							alert( "<?php echo _ACA_DONEW_SUBSCRIBERB; ?>" );
						}else{
							submitform( pressbutton );
						}

						return;
					}

				}

			<?php
				break;
			case 'configpanel':
			?>
			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				}
				if (pressbutton == 'sendQueue') {
					form.action = 'index2.php?option=com_jnewsletter&act=mailing';
				}
				submitform( pressbutton );
			}
			<?php
				break;
			case 'editlist':
				?>
				function submitbutton(pressbutton) {
					var form = document.adminForm;
					if (pressbutton == 'cancel') {
						submitform( pressbutton );
						return;
					}
				<?php
					if ($GLOBALS[ACA.'listHTMLeditor'] == '1') {
					if (ACA_CMSTYPE) echo $editor->save( 'list_desc' );
					}
					if($html) {
						if (ACA_CMSTYPE) {
							$editor->save( 'subscribemessage' );
							$editor->save( 'unsubscribemessage' );
							$editor->save( 'notifyadminmsg' );
						}
					}
				?>
					submitform( pressbutton );
				}
				<?php
				break;
			default:
			?>
			function submitbutton(pressbutton) {
 				var form = document.adminForm;
				if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				}
				submitform( pressbutton );
			}
			<?php
				break;
		 	};
		echo '</script>';
	 }

	 function formEnd($values = '') {

		if (!empty($values)) {
			foreach ($values as $value) {
				echo '<input type="hidden" name="'.$value->name.'" value="'.$value->value.'" />'."\n\r";
			}
		}
		echo '<input type="hidden" name="option" value="com_jnewsletter" />'."\n\r";
		echo '<input type="hidden" name="task" value="" />'."\n\r";
    	echo '<input type="hidden" name="boxchecked" value="0" />'."\n\r";
		echo '</form>'."\n\r";

	 }


	 function _header($title, $img , $message, $task, $action ) {

		$GLOBALS[ACA . 'titlteHeader'] = $title;
		$GLOBALS[ACA . 'titlteImg'] = $img;
	     $message = jnewsletter::messageMgmt($action, $task, $message);

		if ( ACA_CMSTYPE ) {
			backHTML::_header15( $title, $img , $message, $task, $action );
		}//endif

		 $act = JRequest::getVar('act', '' );
		 if ($act != 'about') {
		 	 if ($GLOBALS[ACA.'show_guide'] == 1 AND
		  	$task !='edit' AND $task !='doNew' AND ( $task !='new' && $task !='add')) {
			require_once( WPATH_ADMIN . 'controllers/guide.jnewsletter.php' );//require_once( WPATH_ADMIN . 'guide.jnewsletter.php' );
		  	echo createGuide();
			 }
		 }

}


	 function _header10($title, $img , $message, $task, $action ) {

?>
         <link rel="stylesheet" href="components/com_jnewsletter/cssadmin/jnewsletter.css" type="text/css" >
         <div id="jnewsletter">
         <table class="adminheading" width="99%">
         <tr>
         <?php if (empty($message))  {   ?>
               <th style="padding-left:60px; background: url(<?php echo ACA_JPATH_LIVE;?>/administrator/images/<?php echo $img;?>) no-repeat left;" align="left"><?php echo $title;?></th>
               <td  align="right"><a href="index2.php?option=com_jnewsletter"><img src="components/com_jnewsletter/images/jnewsletter.png" alt="jNews Logo" border="0" align="right" /></a></td>
         <?php } else {
         	$lgt=  strlen($title)*11+80;
         ?>
               <td align="left" width="<?php echo $lgt;?>">
                  <table class="adminheading">
                     <tr>
		               <th style="padding-left:60px; background: url(<?php echo ACA_JPATH_LIVE;?>/administrator/images/<?php echo $img;?>) no-repeat left;" align="left">
		               <?php

		                echo $title;
		                ?>
		               </th>
                     </tr>
                  </table>
               </td>
               <td>
               		<center>
                  <table style="width: 100%; text-align: center; margin-left: auto; margin-right: auto;">
                     <tr>
                     <td class="none" align="center"><?php echo $message;?></td>
                     <td  width="120px" align="right"><a href="index2.php?option=com_jnewsletter" target="_blank"><img src="components/com_jnewsletter/images/jnewsletter.png" alt="jNews Logo" border="0" align="right" /></a></td>
                     </tr>
                  </table>
               		</center>
                </td>
         <?php }   ?>

         </tr>
         </table>
         </div>
<?php

}


	 function _header15($title, $img , $message, $task, $action ) {

?>
         <link rel="stylesheet" href="components/com_jnewsletter/cssadmin/jnewsletter.css" type="text/css" >
         <div id="jnewsletter">
         <table class="adminheading" width="99%">
         <tr>
         <?php if (empty($message))  {   ?>



         <?php } else {
//         	$lgt=  strlen($title)*11+80;
         ?>
               <td>
               		<center>
                  <table style="width: 100%; text-align: center; margin-left: auto; margin-right: auto;">
                     <tr>
                     <td class="none" align="center"><?php echo $message;?></td>
                     <td  width="120px" align="right"><a href="index2.php?option=com_jnewsletter" target="_blank"><img src="components/com_jnewsletter/images/jnewsletter.png" alt="jNews Logo" border="0" align="right" /></a></td>
                     </tr>
                  </table>
               		</center>
                </td>
         <?php }   ?>

         </tr>
         </table>
         </div>
<?php

}



	function _footer() {
		backHTML::_footerSignature();
	}


	 function _footerSignature() {

		$x = "@";
		$y="support";
		$z="ijoobi.com";
		$mail=$y.$x.$z;
		echo '<div style="clear:both;"></div>';
		echo '<br /><div align="center" class="footer"><span class="footer">'. jnewsletter::version() .
				', <a href="http://www.ijoobi.com" target="_blank" class="footer">Joomla extensions</a> powered by Joobi.';
		echo '</div>';
    }

	function footerCountsQueue($start, $limit,$mailingsearch,$total,$colspan,$action){
 	$ranges = array(5, 10, 15, 20, 25, 50, 100, 150, 200);

	?>
		<center>
	<table width="100%"  border="0" cellspacing="0" cellpadding="4" class="adminlist">
		<tr>
			<th colspan="<?php echo $colspan; ?>" align="center">
				<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=0&limit=<?php echo $limit;?>&mailingsearch=<?php echo $mailingsearch; ?> class="pageNav"><< </a>&nbsp;
		<?php
			if (($limit * 5) < $start) {
					$i = $start - 50;
				} else {
					$i = 0;
				}
				$last = 10 + (intval($i / $limit) + 1);
				for ($j = (intval($i / $limit) + 1); $i < $total && $j <= $last; $i += $limit, $j++) {
					if($i == $start) {
						echo $j . '&nbsp;';
					} else {
	?>
				<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=<?php echo $i; ?>&limit=<?php echo $limit;?>&mailingsearch=<?php echo $mailingsearch; ?>" class="pageNav"><?php echo $j;?></a>&nbsp;
	<?php
				}
			}
			if (($total - $limit) < 0) {
				$laststart = 0;
			} else {
				$laststart = $total - $limit;
			}
	?>
		<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=<?php echo $laststart;?>&limit=<?php echo $limit;?>&mailingsearch=<?php echo $mailingsearch; ?>" class="pageNav"> >></a>&nbsp;
			</th>
		</tr>
		<tr>
			<td colspan="<?php echo $colspan;?>" align="center">
				<form action="index2.php" method="post" name="selectForm">
					<select name="limit" class="inputbox" size="1" onchange="document.selectForm.submit();">
	<?php
			//for($i = 10; $i <= 50; $i += 10) {
//			for($i = 50; $i <= 200; $i += 50) {
			foreach( $ranges as $i ){
	?>
			<option value="<?php echo $i;?>" <?php if($i == $limit) { echo "selected=\"selected\""; } ?>><?php echo $i;?></option>
	<?php
			}
	?>
					</select>
					<input type="hidden" name="option" value="com_jnewsletter" />
					<input type="hidden" name="act" value="<?php echo $action; ?>" />
					<input type="hidden" name="task" value="" />
					<input type="hidden" name="userid" value="" />
			    	<input type="hidden" name="boxchecked" value="0" />
					<input type="hidden" name="start" value="<?php echo $start; ?>" />
					<input type="hidden" name="emailsearch" value="<?php echo $mailingsearch;?>" />
				&nbsp;

	<?php
			if (($start + $limit) > $total) {
				$through = $total;
			} else {
				$through = $start + $limit;
			}
			echo _ACA_RESULTS . ' ' . ($start + 1) . ' - ' . ($through) . ' of ' . $total; ?>
				</form>
			</td>
		</tr>
	</table>
	</center>
	<?php
	}//endfct

	 function footerCounts($start, $limit, $emailsearch, $total, $colspan, $action, $listId, $listType) {

	?>
	<center>
	<table width="100%"  border="0" cellspacing="0" cellpadding="4" class="adminlist">
		<tr>
			<th colspan="<?php echo $colspan; ?>" align="center">
				<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=0&limit=<?php echo $limit;?>&emailsearch=<?php echo $emailsearch; ?>&listype=<?php echo $listType; ?>&listid=<?php echo $listId; ?>" class="pageNav"><< </a>&nbsp;
	<?php
			if (($limit * 5) < $start) {
				$i = $start - 50;
			} else {
				$i = 0;
			}
			$last = 10 + (intval($i / $limit) + 1);
			for ($j = (intval($i / $limit) + 1); $i < $total && $j <= $last; $i += $limit, $j++) {
				if($i == $start) {
					echo $j . '&nbsp;';
				} else {
	?>
				<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=<?php echo $i; ?>&limit=<?php echo $limit;?>&emailsearch=<?php echo $emailsearch; ?>&listype=<?php echo $listType; ?>&listid=<?php echo $listId; ?>" class="pageNav"><?php echo $j;?></a>&nbsp;
	<?php
				}
			}
			if (($total - $limit) < 0) {
				$laststart = 0;
			} else {
				$laststart = $total - $limit;
			}
	?>
				<a href="index2.php?option=com_jnewsletter&act=<?php echo $action; ?>&start=<?php echo $laststart;?>&limit=<?php echo $limit;?>&emailsearch=<?php echo $emailsearch; ?>&listype=<?php echo $listType; ?>&listid=<?php echo $listId; ?>" class="pageNav"> >></a>&nbsp;
			</th>
		</tr>
		<tr>
			<td colspan="<?php echo $colspan;?>" align="center">
				<form action="index2.php" method="post" name="selectForm">
					<select name="limit" class="inputbox" size="1" onchange="document.selectForm.submit();">
	<?php
			//for($i = 10; $i <= 50; $i += 10) {
			for($i = 15 ; $i <= 90; $i += 15) {
	?>
						<option value="<?php echo $i;?>" <?php if($i == $limit) { echo "selected=\"selected\""; } ?>><?php echo $i;?></option>
	<?php
			}
	?>
					</select>
					<input type="hidden" name="option" value="com_jnewsletter" />
					<input type="hidden" name="act" value="<?php echo $action; ?>" />
					<input type="hidden" name="task" value="" />
					<input type="hidden" name="userid" value="" />
			    	<input type="hidden" name="boxchecked" value="0" />
					<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
					<input type="hidden" name="listype" value="<?php echo $listType; ?>" />
					<input type="hidden" name="start" value="<?php echo $start; ?>" />
					<input type="hidden" name="emailsearch" value="<?php echo $emailsearch;?>" />
				</form>
				&nbsp;
	<?php
			if (($start + $limit) > $total) {
				$through = $total;
			} else {
				$through = $start + $limit;
			}
			echo _ACA_RESULTS . ' ' . ($start + 1) . ' - ' . ($through) . ' of ' . $total; ?>
			</td>
		</tr>
	</table>
	</center>
	<?php
	 }

	 function controlPanel() {
	 	//hack for JOomla 13 ADRIEN
	 		unset($GLOBALS["task"]);
	 		unset($_REQUEST["task"]);

?>

	<?php
		if(ACA_CMSTYPE){//Joomla 1.5
	    	$doc =& JFactory::getDocument();
	       	$doc->addStyleSheet('components/com_jnewsletter/cssadmin/jnewsletter.css');
	    }//endif
	?>
<div align="center" class="centermain">
<div id="jnewsletter">
		<table class="">
            <tr>
         	<td width="58%" valign="top">
				<?php echo backHTML::iconsPanel(); ?>
			</td>
			<td width="42%" valign="top">

			<div style="width=100%;">
			<form action="index2.php" method="post" name="adminForm">
			<?php

			if ( ACA_CMSTYPE ) {
				 $tabs = new mosTabs15(1);
			}//endif

			$tabs->startPane( 'acaControlPanel' );
			$tabs->startTab( _ACA_MENU_TAB_SUM , "acaControlPanel.Summary");
			?>
			<table class="joobilist">
			<tbody>
			<thead>
				<tr>
					 <th class="title" style="text-align: center;"><?php echo '#'; ?></th>
					 <th class="title" style="text-align: center;"><?php echo _ACA_MENU_TAB_LIST; ?></th>
					 <th class="title" style="text-align: center;"><?php echo _ACA_MENU_MAILING_TITLE; ?></th>
					 <th class="title" style="text-align: center;"><?php echo _ACA_SENT_MAILING; ?></th>

				</tr>
			</thead>
			 <?php
			$html = '';
			$totalist = 0;
			$totalmail = 0;
			$totalsub = $GLOBALS[ACA.'act_totalsubcribers0'];
			$totalsent = 0;
			$nb = explode(',', $GLOBALS[ACA.'activelist']);
			$size = sizeof($nb);
			for($i = 0; $i < $size; $i ++) {
				$index = $nb[$i];
				if ($GLOBALS[ACA.'listshow'.$index]>0 AND $GLOBALS[ACA.'listype'.$index] == 1) {
					$row = ($i + 1) % 2;
					$html .= '<tr class="row'.$row.'">';
					$html .= '<td><b>'.@constant( $GLOBALS[ACA.'listnames'.$index] ).'</b></td>';
					$html .= '<td style="text-align: center; ">' .$GLOBALS[ACA.'act_totallist'.$index].' </td>';
					$html .= '<td style="text-align: center; ">' .$GLOBALS[ACA.'act_totalmailing'.$index].' </td>';
					$html .= '<td style="text-align: center; ">' .$GLOBALS[ACA.'totalmailingsent'.$index].' </td>';
					//$html .= '<td style="text-align: center; ">' .$GLOBALS[ACA.'act_totalsubcribers'.$index].' </td>';
					$html .= '</tr>';
					$totalist = $totalist + $GLOBALS[ACA.'act_totallist'.$index];
					$totalmail = $totalmail + $GLOBALS[ACA.'act_totalmailing'.$index];
					$totalsent = $totalsent + $GLOBALS[ACA.'totalmailingsent'.$index];
					if ($GLOBALS[ACA.'act_totalsubcribers'.$index]>$totalsub) $totalsub = $GLOBALS[ACA.'act_totalsubcribers'.$index];
				}
			}

			$html .= '<tr>';
			$html .= '<td style="background-color: #CCFFFF;"><b>'._ACA_CP_TOTAL.'</b></td>';
			$html .= '<td style="text-align: center; text-decoration: bold; background-color: #CCFFFF; border-top: 1px solid #000; ">' .$totalist.' </td>';
			$html .= '<td style="text-align: center; text-decoration: bold; background-color: #CCFFFF; border-top: 1px solid #000; ">' .$totalmail.' </td>';
			$html .= '<td style="text-align: center; text-decoration: bold; background-color: #CCFFFF; border-top: 1px solid #000; ">' .$totalsent.' </td>';
			//$html .= '<td style="text-align: center; ">' .$totalsub.' </td>';
			$html .= '</tr>';
			echo $html;
			?>
			 </tbody></table>
			 <br />
			<?php

			if (class_exists('auto')) echo auto::showQueue();
			$tabs->endTab();

			$tabs->startTab( _ACA_MENU_SUBSCRIBERS , "acaControlPanel.Subscribers");
			$emailsearch = '';
      		$listId = 0;

			if ( ACA_CMSTYPE ) {	// joomla 15
	      		$start = intval(JRequest::getVar('start', 0));
			 	$limit = intval(JRequest::getVar('limit', 15));
			 	$order = JRequest::getVar('order', 'date');
			}//endif

 	     	$total = 0;

			$subscribers = subscribers::getSubscribers($start, $limit, $emailsearch, $total, $listId, '', 1, 1, 'sub_dateD');
			if ( ACA_CMSTYPE ) {
				JHTML::_('behavior.tooltip');
			}//endif
			//for pagination
			$paginationStart = JRequest::getVar( 'pg' );
			if( !empty($paginationStart) ){
				$limitstart = 0;
				$limitend = $paginationStart;
			}else{
				$app =& JFactory::getApplication();
				$limitstart = $app->getUserStateFromRequest( 'limitstart', 'limitstart', 0, 'int' );
				$limitend = $app->getUserStateFromRequest( 'limit', 'limit', 0, 'int' );
			} //endif
			$limittotal = subscribers::getSubscribersCount($listId);
			$setLimit = null;
			$setLimit->total = ( !empty($limittotal) ) ? $limittotal : 0;
			$setLimit->start = ( !empty( $limitstart ) ) ? $limitstart : 0;
			$setLimit->end = ( !empty($limitend) ) ? $limitend: 20;
			//end pagination
			?>
			<script type="text/javascript">
				function checkcid(myField) {
					myField.checked = true;
					isChecked(true);
				}
			</script>
<!--			<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>  -->

			<form action="index2.php" method="post" name="adminForm">
				<input type="hidden" name="option" value="com_jnewsletter" />
				<input type="hidden" name="act" value="jnewsletter" />
				<input type="hidden" name="task" value="" />
				<input type="hidden" name="userid" value="" />
		    	<input type="hidden" name="boxchecked" value="0" />
				<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
				<input type="hidden" name="start" value="<?php echo $start; ?>" />
				<input type="hidden" name="limit" value="<?php echo $limit; ?>" />
				<input type="hidden" name="emailsearch" value="<?php echo $emailsearch;?>" />
			<table class="joobilist">
				<thead>
					<tr>
						<th class="title">#</th>
						<th class="title" style="text-align: left;"><?php echo _ACA_INPUT_NAME; ?></th>
						<th class="title" style="text-align: left;"><?php echo _ACA_INPUT_EMAIL; ?></th>
						<th class="title" style="text-align: center;"><?php echo _ACA_SIGNUP_DATE; ?></th>
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($subscribers as $subscriber) {
					$i++;
				?>
				<tr class="row<?php echo ($i + 2) % 2;?>">
					<td><center><?php echo $i + $start; ?></center></td>
					<td style="text-align: left;">
					<a href="index2.php?option=com_jnewsletter&act=subscribers&task=show&userid=<?php echo $subscriber->id; ?>" >
					<?php echo $subscriber->name; ?></a></td>
					<td style="text-align: left;"><?php echo $subscriber->email; ?></td>
					<td style="text-align: center;">
<?php
 if ( ACA_CMSTYPE ) {
	echo JHTML::_('date', $subscriber->subscribe_date,  '%x' );
}
 ?></td>
				</tr>
				<?php		}   ?>
			</table>
			</form>
			<div style="margin-top: 10px;">
			<?php echo jnewsletter::setTop('', '', $setLimit ); ?>
			</div>
			<?php
			//backHTML::footerCounts($start, $limit, $emailsearch, $total, 4, '', $listId, '');
			//backHTML::subsfooterCounts($start, $limit, $emailsearch, $total, 9, $action, $listId, '');

			$tabs->endTab();

			$tabs->startTab( _ACA_MENU_TAB_LIST , "acaControlPanel.Lists");

			$lists = lists::getLists(0, 0, 1, '', false , false, false);
			?>

			<table class="joobilist">
				<thead>
				<tr>
					<th class="title">#</th>
					<th class="title" width="65%"  style="text-align: left;"><?php echo _ACA_LIST_NAME; ?></th>
					<th class="title" width="25%"  style="text-align: left;"><?php echo _ACA_LIST_TYPE; ?></th>
					<th class="title"  style="text-align: center;">ID</th>
				</tr>
				</thead>
			<?php
			$i = 0;
			foreach ($lists as $list) {
				$i++;
				$link = 'index2.php?option=com_jnewsletter&act=mailing&task=show&listid='. $list->id;
				?>
				<tr class="row<?php echo ($i + 2) % 2;?>">
					<td><?php echo $i; ?></td>
					<td  style="text-align: left;">
						<a href="<?php echo $link; ?>">
							<?php echo $list->list_name;?></a>
					</td>
					<td  style="text-align: left;"><?php if( $list->list_type == 1 ) { echo _ACA_LIST; } else { echo _ACA_CAMPAIGN; }  ?></td>
					<td  style="text-align: center;"><?php echo $list->id; ?></td>
					</tr>
			<?php
			}
			?>
			<tr>
				<th colspan="4">
				</th>
			</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->endPane();
?>
			</form>
		</div>
		<div style="clear:both; float:left; margin-top: 10px;">
		<?php
 if ( ACA_CMSTYPE ) {
		 echo jnewsletter::printM('blue', _ACA_SERVER_LOCAL_TIME.' :'. JHTML::_('date', jnewsletter::getNow(), ' %A, %d %B %Y %H:%M', 0));
 }
 		 ?>
		</div>
   <td>
   </tr>
   </table>
   </div>
</div>
<?php
	 }

	 function iconsPanel() {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}//endif

		echo '<div id="cpanel">';

	    $link = 'index2.php?option=com_jnewsletter&act=list&pg=20';
	    backHTML::quickiconButton( $link, 'header/lists.png', _ACA_MENU_LIST , false, 'admin' );

		$link = 'index2.php?option=com_jnewsletter&act=subscribers&pg=20';
   	    backHTML::quickiconButton( $link, 'header/subscribers.png', _ACA_MENU_SUBSCRIBERS, false, 'admin'  );

		$nb = explode(',', $GLOBALS[ACA.'activelist']);
		$size = sizeof($nb);
		for($i = 0; $i < $size; $i ++) {
			$index = $nb[$i];
			if ($GLOBALS[ACA.'listshow'.$index]>0
			 AND $GLOBALS[ACA.'listype'.$index] == 1 ) {
				$link = 'index2.php?option=com_jnewsletter&act=mailing&listype='.$index.'&pg=20';
				backHTML::quickiconButton( $link, 'header/'.$GLOBALS[ACA.'listlogo'.$index], @constant($GLOBALS[ACA.'listnames'.$index]) , false, 'admin' );
			}
		}

		$link = 'index2.php?option=com_media';
		backHTML::quickiconButton( $link, 'header/media_manager.png', _ACA_MENU_MEDIA , false, 'admin' );

		$link = 'index2.php?option=com_jnewsletter&act=statistics';
		if($GLOBALS[ACA.'version'] == 'PLUS'){
			backHTML::quickiconButton( $link, 'header/statistics.png', _ACA_MENU_STATS , false, 'admin' );
		}else{
			backHTML::quickiconButton( $link, 'header/statistics.png', _ACA_MENU_STATS_REPORTS , false, 'admin' );
		}//endif..version
		if($GLOBALS[ACA.'type'] == 'PRO' OR $GLOBALS[ACA.'type'] == 'PLUS'){
			$link = 'index2.php?option=com_jnewsletter&act=queue&pg=20';
			backHTML::quickiconButton( $link, 'header/queue.png', _ACA_MENU_QUEUE , false, 'admin' );

			$link = 'index2.php?option=com_jnewsletter&act=templates&pg=20';
			backHTML::quickiconButton( $link, 'header/templates.png', _ACA_MENU_TEMPLATE , false, 'admin' );
		}
		$link = 'index2.php?option=com_jnewsletter&act=configuration';
		backHTML::quickiconButton( $link, 'header/configuration.png', _ACA_MENU_CONF , false, 'admin' );

		$link = "http://www.ijoobi.com/component/option,com_jtickets/Itemid,65/controller,ticket/pjid,4/task,listing";
		backHTML::quickiconButton( $link, 'header/help.png', _ACA_MENU_HELP, true, 'Registered' );

		$link = 'http://demo.ijoobi.com/';
		backHTML::quickiconButton( $link, 'header/education_center.png', _ACA_MENU_LEARN , true, 'Registered' );

		$link = "http://www.ijoobi.com/organization/about/welcome-to-joobi-live-support.html";
		backHTML::quickiconButton( $link, 'header/live_support.gif', _ACA_MENU_LIVE_SUPPORT, true, 'Registered' );

		$link = 'index2.php?option=com_jnewsletter&act=about';
		backHTML::quickiconButton( $link, 'header/about.png', _ACA_MENU_ABOUT , false, 'Registered' );

		echo '</div>';

	 }


	 function controlPanelBottonStart($title , $img) {
		?>
		<link rel="stylesheet" href="components/com_jnewsletter/css/jnewsletter.css" type="text/css" >
		<div align="center" class="centermain">
		<div id="jnewsletter">
				<table class="panelheading" border="0">
				<tr>
					<th class="jnewsletter" style=" height: 55px; background: url(administrator/images/<?php echo $img; ?>) no-repeat left;">
					<?php echo  $title;?></th>
				</tr>
				</table>
				<table class="panelheading">
		            <tr>
		         	<td width="58%" valign="top">
			<div id="cpanel">
		<?php
	 }


	function controlPanelBottomEnd() {
		?>
			</div>
			</td>
		 	</tr>
		 	</table>
		 	</div></div>
	 	<?php
	 }
	function switchContentStart() {
		if (ACA_CMSTYPE){//Joomla 1.5
			$switchcontentcss = 'div.jnewsmenucontainer {
							    cursor:hand;
							    cursor:pointer;
							    float:left;
							    margin: 1px;
							    border: 1px solid #000;
							    background-color: #000;
							}
							';
        	$doc =& JFactory::getDocument();
         	$doc->addScript(ACA_PATH_ADMIN_INCLUDES.'switchcontent.js');
         	$doc->addStyleDeclaration($switchcontentcss);
        }
		?>
			<table width="100%">
				<tbody>
					<tr>
						<td>
	 	<?php
	 }
	 /**
	  * <p>Funtion to create the header/menu of the swicth content</p>
	  * @para string $title - the label/title of the header/menu
	  */
	 function switchContentMenu($title) {
		?>
		<div id="jnewscontent1-title" class="jnewsmenucontainer"><?php echo $title; ?></div><div style="clear:both"/>
	 	<?php
	 }
	 /**
	  * <p>Function to create the html of the content</p>
	  */
	 function switchContent($html) {
		?>
			<div id="jnewscontent1" class="jnewswitch">
				<div><?php echo $html; ?></div>
			</div>
	 	<?php
	 }
	 function switchContentEnd() {
		?>
		<script type="text/javascript">
		var jNewsSwitchContent=new switchcontent("jnewswitch", "div") //Limit scanning of switch contents to just "div" elements
		jNewsSwitchContent.setStatus('<img src="http://www.roast-horse.com/tutorials/_tutorials/css_js_collapse_menu/_images/expandbutton-open.gif" /> ', '<img src="http://www.roast-horse.com/tutorials/_tutorials/css_js_collapse_menu/_images/expandbutton-close.gif" /> ')
		jNewsSwitchContent.setColor('white', 'blue')
		jNewsSwitchContent.setPersist(true)
		jNewsSwitchContent.collapsePrevious(true) //Only one content open at any given time
		jNewsSwitchContent.init()
		</script>
						</td>
					</tr>
				</tbody>
			</table>
	 	<?php
	 }
	function about(){

		echo '<table width="100%" align="left"><tr>';
		echo '<td>';
		echo '<form action="index2.php" method="post" name="adminForm">';
		jnewsletter::beginingOfTable('jnewstable');
		jnewsletter::miseEnPage('Description', '', constant('_ACA_DESC_' .strtoupper($GLOBALS[ACA.'type'])));
		jnewsletter::miseEnPage('Project Manager', '', 'Evelyn Lopez');
		jnewsletter::miseEnPage('Developers','','Mary Michelle Piquero, Gerald R. Zalsos, Ebony Grace Ursua, Mary Grace Arabis, Gino Tayo, <br/>Glenn Jaime Chan, Adel Fomar Dulanas, Lalene Cababat, Jhen Bontilao');
		jnewsletter::miseEnPage('Contributor','', 'Amir Ben Avraham, Christelle Gesset & Adrien Baborier');
		jnewsletter::miseEnPage('Captcha Contributor','','Sorin Rosen');
		jnewsletter::miseEnPage('Designer', '', 'Rochel Abrasaldo');
		jnewsletter::miseEnPage('CB Integration', '', 'Mikko R&ouml;nkk&ouml;');
		jnewsletter::miseEnPage('Add-ons', '', 'Kyle Witt');
		jnewsletter::miseEnPage('Language Translation', '', '');
		jnewsletter::miseEnPage('Brazilian_portuguese', '', 'Navsoft');
		jnewsletter::miseEnPage('Danish', '', 'Joergen Floes');
		jnewsletter::miseEnPage('Dutch', '', 'Tromp Wezelman & Bart Bevers');
		jnewsletter::miseEnPage('Finnish', '', 'Tero Kankaanperä');
		jnewsletter::miseEnPage('French', '', 'Christelle Gesset');
		jnewsletter::miseEnPage('German', '', 'David Freund & Frank Jansen');
		jnewsletter::miseEnPage('Hebrew', '', 'Eszter Somos & Adam Segev');
		jnewsletter::miseEnPage('Hungarian', '', 'Zolt&aacute;n Varanka');
		jnewsletter::miseEnPage('Italian', '', 'Maria Luisa Rossari');
		jnewsletter::miseEnPage('Norwegian', '', '<a href="http://www.timeoffice.com" target="_blank">Irma Rustad</a>');
		jnewsletter::miseEnPage('Polish', '', 'Andrzej Herzberg');
		jnewsletter::miseEnPage('Portuguese', '', 'Ricardo Sim&otilde;es');
		jnewsletter::miseEnPage('Simplified Chinese', '', '<a href="http://www.joomlagate.com" target="_blank">Baijianpeng</a>');
		jnewsletter::miseEnPage('Spanish', '', '<a href="http://www.eaid.org" target="_blank">Jorge Pasco</a>');
		jnewsletter::miseEnPage('Swedish', '', 'Janne Karlsson');
		jnewsletter::miseEnPage('Turkish','','Anonymous');
		jnewsletter::miseEnPage(' ', '', '   ');
		jnewsletter::miseEnPage(_ACA_VERSION, '', jnewsletter::version());
		jnewsletter::miseEnPage(' ', '', '   ');
		jnewsletter::miseEnPage(_ACA_DESC_HOME, '', '<a href="'.$GLOBALS[ACA.'homesite'].'" target="_blank">www.ijoobi.com</a>');
		jnewsletter::miseEnPage(_ACA_MENU_HELP, '', '<a href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60" target="_blank">Documentation</a>');
		jnewsletter::miseEnPage(_ACA_MENU_LIVE_SUPPORT, '', '<a href="http://www.ijoobi.com/organization/about/welcome-to-joobi-live-support.html" target="_blank">Help</a>');
		jnewsletter::miseEnPage(_ACA_MENU_LEARN, '', '<a href="http://www.demo.ijoobi.com" target="_blank">Education Center</a>');
		jnewsletter::miseEnPage('Copyrights', '', 'jNews <i>Your Communciation Partner</i>, &copy; Joobi Limited');
		jnewsletter::miseEnPage( _ACA_LICENSE , '', '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54" target="_blank">&copy; Joobi Limited</a>');
		jnewsletter::endOfTable();
		backHTML::formEnd();
		echo '</td>';
		echo '<td width="380px">';
		$logo='jnews_logo'. (!empty($GLOBALS[ACA.'type'])?'_'.strtolower($GLOBALS[ACA.'type']):'').'.png';
		echo '<a href="http://www.ijoobi.com" target="_blank"><img src="http://www.ijoobi.com/images/'.$logo.'" alt="jNews Logo" border="0" align="center" /></a>';
		echo '</td>';
		echo '</tr></table>';

	 }

	function installPRO($button='',$return=''){

		$doc =& JFactory::getDocument();
       	$css = 'div.acaInstallList ul { list-style-image:url('.ACA_PATH_ADMIN_IMAGES.'bullet_01.png);padding-left:180px;}';
		$doc->addStyleDeclaration($css);
		$type = ( isset($GLOBALS[ACA.'type']) ) ? $GLOBALS[ACA.'type'] : 'News';
		$html = '';
		$html .= '<div style="float:left;padding-left: 30px; width:470px; margin-right: 10px;">';
		$logo = 'jnews_logo_'. strtolower( $type ).'.png';
		$html .= '<a href="http://www.ijoobi.com" target="_blank"><img src="http://www.ijoobi.com/images/'.$logo.'" alt="jNews Logo" border="0" align="center" /></a><br>';

		$html .= '<p style="font-size: 1em; text-align: justify;">'._ACA_INSTALL_DESC.'</p><br><br>';
		$html .= $button;
		$html .= $return;
		$html .= '</div>';
		$html .= '<div style="float:left; padding-left: 30px; width:470px;">';
		$proStore = '';
		$proStore = '<div style="height: 195px; margin-top: 20px;" class="acaInstallList"><img style="padding-right: 10px" src="http://www.ijoobi.com/images/jnewsletter_pro.jpg" align="left">';
		$proStore .= '<br><b>'._ACA_THINK_PRO.'</b><br>';
		$proStore .= '<ul><li>'._ACA_THINK_PRO_1.'</li><li>'._ACA_THINK_PRO_2.'</li><li>'._ACA_THINK_PRO_3.'</li><li>'._ACA_THINK_PRO_4.'</li><li>'._ACA_THINK_PRO_5.'</li><li>'._ACA_THINK_PRO_6.'</li></ul>';
		$proStore .= '<a target="_blank" href="http://www.ijoobi.com/component/option,com_jmarket/Itemid,49/controller,product-display/eid,8/task,show/">';
		$proStore .= '<div style="background-image: url('.ACA_PATH_ADMIN_IMAGES.'btn_white.png); background-repeat:no-repeat; height: 41px; width: 131px; border: none; float:right; padding:10px 0 0 20px; ">';
		$proStore .= '<span style="font-size: 13px; color:#333"><b>Click Here</b></span></div></a></div>';
		$html .= $proStore;
		$html .= '</div>';

		echo $html;

	 }

	function installPlus($button='',$return=''){
		$doc =& JFactory::getDocument();
        $doc->addStyleSheet(ACA_JPATH_LIVE.'/components/com_jnewsletter/modules/css/gray.css');

		$css = 'div.acaInstallList ul { list-style-image:url('.ACA_PATH_ADMIN_IMAGES.'bullet_01.png);padding-left:180px;}';
		$doc->addStyleDeclaration($css);
		$type = ( isset($GLOBALS[ACA.'type']) ) ? $GLOBALS[ACA.'type'] : 'News';
		$html = '';
		$html .= '<div style="float:left;padding-left: 30px; width:470px; margin-right: 10px; border:1px solid #000;">';
		$logo = 'jnews_logo_'. strtolower( $type ).'.png';
		$html .= '<a href="http://www.ijoobi.com" target="_blank"><img src="http://www.ijoobi.com/images/'.$logo.'" alt="jNews Logo" border="0" align="center" /></a><br>';
		$html .= '<p style="font-size: 1.3em; text-align: justify;">'._ACA_INSTALL_DESC.'</p><br><br><br><br>';
		$html .= $button;
		$html .= $return;
		$html .= '</div>';
		$html .= '<div style="float:left; padding-left: 30px; width:470px;">';
		$html .= '<fieldset class="jnewslettercss" style="padding: 10px; text-align: left; -moz-border-radius:3px;-webkit-border-radius:3px;">';
		$html .= '<legend><strong>'._ACA_NOTIF_UPDATE.'</strong></legend>';
		$listID = 11;
		$name = 'jNews Updates';
		$module = '<div class="module_green" style="width: 200px;"><div><div><div><div class="aca_module">';
		$module .= '<!--  Begining : jNews Form  -->';
		$module .= '<form action="http://www.ijoobi.com/index.php?option=com_jnewsletter" method="post" name="modjnewsForm">';
		$module .= '<input id="wz_31" type="checkbox" class="inputbox" value="1" name="subscribed[1]" checked="checked" />';
		$module .= '<input type="hidden" name="sub_list_id[1]" value="'.$listID.'" /> '._ACA_INSTALL_UPDATES;
		$module .= '<input id="wz_11" type="text" size="30" value="Name" class="inputbox" name="name" onblur="if(this.value==\'\') this.value=\'Name\';" onfocus="if(this.value==\'Name\') this.value=\'\' ; " />';
		$module .= '<br><input id="wz_12" type="text" size="30" value="E-mail" class="inputbox" name="email" onblur="if(this.value==\'\') this.value=\'E-mail\';" onfocus="if(this.value==\'E-mail\') this.value=\'\' ; " />';
		$module .= '<br><input id="wz_2" type="checkbox" class="inputbox" value="1" name="receive_html"  checked="checked"  />';
		$module .= _ACA_RECEIVE_HTML;
		$module .= '<br><input id="wz_22" type="submit" value="Subscribe" class="button" />';
		$module .= '<input type="hidden" name="act" value="subscribe" />';
		$module .= '</form>';
		$module .= '<!--  Begining : jNews Form  -->';
		$module .= '</div></div></div></div>';
		$html .= $module;
		$html .= '</fieldset>';

		$plusStore = '<div style="height: 195px;" class="acaInstallList"><img style="padding-right: 10px" alt="jNews PLUS" src="http://www.ijoobi.com/images/jnewsletter_plus.jpg" align="left">';
		$plusStore .= '<br><b>'._ACA_THINK_PLUS.'</b><br>';
		$plusStore .= '<ul><li>'._ACA_THINK_PLUS_1.'<li>'._ACA_THINK_PLUS_2.'<li>'._ACA_THINK_PLUS_3.'<li>'._ACA_THINK_PLUS_4.'<br></ul>';
		$plusStore .= '<a target="_blank" href="http://www.ijoobi.com/component/option,com_jmarket/Itemid,49/controller,product-display/eid,9/task,show/">';
		$plusStore .= '<div style="background-image: url('.ACA_PATH_ADMIN_IMAGES.'btn_white.png); background-repeat:no-repeat; height: 41px; width: 131px; border: none; float:right; padding:10px 0 0 20px; ">';
		$plusStore .= '<span style="font-size: 13px; color:#333"><b>Click Here</b></span></div></a></div>';

		$proStore = '';
		$proStore = '<div style="height: 195px; margin-top: 20px;" class="acaInstallList"><img alt="jNews PRO" src="http://www.ijoobi.com/images/jnewsletter_pro.jpg" align="left">';
		$proStore .= '<br><b>'._ACA_THINK_PRO.'</b><br>';
		$proStore .= '<ul><li>'._ACA_THINK_PRO_1.'</li><li>'._ACA_THINK_PRO_2.'</li><li>'._ACA_THINK_PRO_3.'</li><li>'._ACA_THINK_PRO_4.'</li><li>'._ACA_THINK_PRO_5.'</li><li>'._ACA_THINK_PRO_6.'</li></ul>';
		$proStore .= '<a target="_blank" href="http://www.ijoobi.com/component/option,com_jmarket/Itemid,49/controller,product-display/eid,8/task,show/">';
		$proStore .= '<div style="background-image: url('.ACA_PATH_ADMIN_IMAGES.'btn_white.png); background-repeat:no-repeat; height: 41px; width: 131px; border: none; float:right; padding:10px 0 0 20px; ">';
		$proStore .= '<span style="font-size: 13px; color:#333"><b>Click Here</b></span></div></a></div>';

		$html .= $plusStore;
		$html .= $proStore;
		$html .= '</div>';
		echo $html;


	 }

	 function showStatistics($listStats, $mailing, $globalStats, $html_read, $html_unread, $text, $listId) {


?>
<form action="index2.php" method="post" name="adminForm">
<table class="joobilist">
	<tr>
		<th colspan="2" class="title"><?php echo _ACA_MAILING_LIST_DETAILS; ?>:</th>
	</tr>
	<tr>
		<td width="200" align="left"><?php echo @constant( $GLOBALS[ACA.'listname'.$listStats->list_type] ); ?>:</td>
		<td align="left"><?php echo $listStats->list_name; ?></td>
	</tr>
	<tr>
		<td width="200" align="left"><?php echo _ACA_DESCRIPTION; ?>:</td>
		<td align="left"><?php echo $listStats->list_desc; ?></td>
	</tr>
	<tr>
		<td width="200" align="left"><?php echo _ACA_LIST_ISSUE; ?>:</td>
		<td align="left"><?php echo $mailing->issue_nb; ?></td>
	</tr>
	<tr>
		<td width="200" align="left"><?php echo _ACA_SUBJECT; ?>:</td>
		<td align="left"><?php echo $mailing->subject;?></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
<?php
			if ( ACA_CMSTYPE ) {
				 $stat_tabs = new mosTabs15(0);
			}//endif

		  $stat_tabs->startPane('acaStats');
		  $stat_tabs->startTab(_ACA_GLOBALSTATS, 'acaStats');
?>
	<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="joobilist">
<?php

		 if($listStats->html == 1) {

?>
		<tr>
			<td width="200" align="left"><?php echo _ACA_SEND_IN_HTML_FORMAT; ?>:</td>
			<td align="left"><?php echo $globalStats->html_sent; ?></td>
		</tr>
		<tr>
			<td width="200" align="left"><?php echo _ACA_VIEWS_FROM_HTML; ?>:</td>
			<td align="left"><?php echo $globalStats->html_read; ?></td>
		</tr>
<?php
		 }
?>
		<tr>
			<td width="200" align="left"><?php echo _ACA_SEND_IN_TEXT_FORMAT; ?>:</td>
			<td align="left"><?php echo $globalStats->text_sent; ?></td>
		</tr>
	</table>
<?php
		  $stat_tabs->endTab();
		  $stat_tabs->startTab(_ACA_DETAILED_STATS, 'acaStats.detail');
?>

			<table width="100%" cellpadding="4" cellspacing="0" border="1" align="center" class="joobilist">
				<thead>
					<tr>
						<th class="title"><?php echo _ACA_HTML_READ; ?></th>
						<th class="title"><?php echo _ACA_HTML_UNREAD; ?></th>
						<th class="title"><?php echo _ACA_TEXT_ONLY_SENT; ?></th>
					</tr>
				</thead>
					<tr>
						<td valign="top" align="left" width="33%">
<?php

		 if (sizeof($html_read) > 0) {

			 foreach ($html_read as $htmlread){
				 echo $htmlread->name . ' (' . $htmlread->email . ')<br />';
			 }
		 }
?>
						</td>
						<td valign="top" align="left" width="33%">
<?php

		 if (sizeof($html_unread) > 0) {

			 foreach ($html_unread as $htmlunread){
				 echo $htmlunread->name . ' (' . $htmlunread->email . ')<br />';
			 }
		 }
?>
						</td>
						<td valign="top" align="left" width="33%">
<?php

		 if (sizeof($text) > 0) {

			 foreach ($text as $atext){
				 echo $atext->name . ' (' . $atext->email . ')<br />';
			 }
		 }
?>
						</td>
					</tr>
				</table>

<?php
		  $stat_tabs->endTab();
		  $stat_tabs->endpane();
?>
   	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="option" value="com_jnewsletter" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="act" value="statistics" />
	<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
	<input type="hidden" name="mailingid" value="<?php echo $mailing->mailing_id; ?>" />
	<input type="hidden" name="tab" value="<?php echo $tab; ?>" />
</form>
<?php
	 }


	function showCompsList($update) {

		$link = '.php?option=com_jnewsletter&act=subscribers&task=import';
		compa::completeLink($link);
		?>
		</table>
		If you want to import a list of subscribers from a file, <a href="<?php echo $link; ?>">please click here.</a>
		<br/>
		<?php
		if ($update->otherComponent) {
				?>
				<table width="100%" cellpadding="4" cellspacing="0" border="0" align="left" class="adminlist">
					<tr>
						<th colspan="4"><?php echo _ACA_CHECK_COMP; ?></th>
					</tr>
				<?php

				 foreach ($update->otherComponent as $component) {
					$moreLink = '<a href="'.$component->homePath.'" traget="_blank">'. _ACA_MORE_INFO . '</a>';
					$tryitLink = '<a href="'.$component->download.'" traget="_blank">'. _ACA_TRY_IT . '</a>';
				?>
					<tr>
						<td>
						<?php
							echo $component->longVersion;
							echo '<br />'.$component->desc;
						 ?>
						</td>
					<td>
					<?php
						echo $tryitLink;
					 ?>
					</td>
					<td>
					<?php
						echo $moreLink;
					 ?>
					</td>
					</tr>
				<?php
				}
				?>
				</table>
				<?php
		}
	}


	function showUpdateOptions($update) {


 if ((!empty($update->needAdd)) || (!empty($update->needRemove)) || (!empty($update->needUpdate))) {
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table width="100%" cellpadding="4" cellspacing="0" border="0" align="left" class="adminlist">
			<tr>
				<th colspan="4"><?php echo _ACA_NEED_UPDATED; ?></th>
			</tr>
			<tr class="row0">
				<td>&nbsp;</td>
				<td><?php echo _ACA_FILENAME; ?></td>
				<td><center><?php echo _ACA_CURRENT_VERSION; ?></center></td>
				<td><center><?php echo _ACA_NEWEST_VERSION; ?></center></td>
			</tr>
		<?php

		 	 foreach ($update->needUpdate as $file) {
		?>
			<tr>
				<td><input type="checkbox" name="needUpdated[]" value="<?php echo $file; ?>" checked="checked" class="inputbox" /></td>
				<td><?php echo $file; ?></td>
				<td><center><?php echo $update->local[$file]; ?></center></td>
				<td><center><?php echo $update->globalVersion[$file]; ?></center></td>
			</tr>
		<?php
		 	 }
		?>
			<tr>
				<th colspan="4"><?php echo _ACA_NEED_ADDED; ?></th>
			</tr>
			<tr class="row0">
				<td>&nbsp;</td>
				<td><?php echo _ACA_FILENAME; ?></td>
				<td><center><?php echo _ACA_CURRENT_VERSION; ?></center></td>
				<td><center><?php echo _ACA_NEWEST_VERSION; ?></center></td>
			</tr>
		<?php

		 	 foreach ($update->needAdd as $file) {
		?>
			<tr>
				<td><input type="checkbox" name="needAdded[]" value="<?php echo $file; ?>" checked="checked" class="inputbox" /></td>
				<td><?php echo $file; ?></td>
				<td>&nbsp;</td>
				<td><center><?php echo $update->globalVersion[$file]; ?></center></td>
			</tr>
		<?php
		 	 }
		?>
			<tr>
				<th colspan="4"><?php echo _ACA_NEED_REMOVED; ?></th>
			</tr>
			<tr class="row0">
				<td>&nbsp;</td>
				<td><?php echo _ACA_FILENAME; ?></td>
				<td><center><?php echo _ACA_CURRENT_VERSION; ?></center></td>
				<td><center><?php echo _ACA_NEWEST_VERSION; ?></center></td>
			</tr>
		<?php

		 	 foreach ($update->needRemove as $file) {
		?>
			<tr>
				<td><input type="checkbox" name="needRemoved[]" value="<?php echo $file; ?>" checked="checked" class="inputbox" /></td>
				<td><?php echo $file; ?></td>
				<td><center><?php echo $update->local[$file]; ?></center></td>
				<td>&nbsp;</td>
			</tr>
		<?php
		 	 }
		?>
		</table>
			<input type="hidden" name="option" value="com_jnewsletter" />
			<input type="hidden" name="act" value="update" />
		   	<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="task" value="doUpdate" />
			<input type="hidden" name="updatepath" value="<?php echo strtolower( $update->local['component'] . DS . $update->local['type'] ) . DS . $update->globalVersion['version'] . DS ; ?>" />
		</form>
		<br />
		<?php
		 }

}


	function _upgrade() {
		$config['news1'] = false;
		$config['news2'] = false;
		$config['news3'] = false;

		$exist = jnewsletter::checkExisting();
		if (!empty($exist['news1'])) $config['news1'] = true;
		if (!empty($exist['news2'])) $config['news2'] = true;
		if (!empty($exist['news3'])) $config['news3'] = true;

		$mess ='';
		if ($config['news1'] OR $config['news2'] OR $config['news3']) {
		$mess = jnewsletter::printM('blue' , _ACA_UPGRADE_MESS). '<br />';
		}

		if ($config['news1']) {
			$mess .=  '<a href="index2.php?option=com_jnewsletter&act=update&task=new1">';
			$mess .= jnewsletter::printM('ok' ,_ACA_UPGRADE_FROM.'Anjel');
			$mess .=  '</a><br />';
		}

		if ($config['news2']) {
			$mess .=  '<a href="index2.php?option=com_jnewsletter&act=update&task=new2">';
			$mess .= jnewsletter::printM('ok' ,_ACA_UPGRADE_FROM.'Letterman');
			$mess .=  '</a><br />';
		}

		if ($config['news3']) {
			$mess .=  '<a href="index2.php?option=com_jnewsletter&act=update&task=new3">';
			$mess .= jnewsletter::printM('ok' ,_ACA_UPGRADE_FROM.'YaNC');
			$mess .=  '</a><br />';
		}
		echo $mess;
	}


	function quickiconButton( $link, $image, $text, $external=false, $accessLevel='' , $frontEnd=false) {
		if ( jnewsletter::checkPermissions($accessLevel)) {
			if ( ACA_CMSTYPE ) {	// joomla 15
				if ( $frontEnd ) {
				    $link = JRoute::_($link);
				}
			}//endif
		?>
		<div style="float:left;">
			<div class="icon">
				<a href="<?php echo $link; ?>" <?php if ($external) echo 'target="_blank"'; ?>>
				<?php compa::showIcon($image,$text); ?>
					<span><?php echo $text; ?></span>
				</a>
			</div>
		</div>
		<?php
		}
	}


 }
