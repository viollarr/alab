<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/**
* <p>queue view</p>
* <p>This class contains functions to create the queue view</p>
* @author Joobi Limited <wwww.ijoobi.com>
*/
class queueHTML {

	function showMailingQueue($mailingq=null,$lists=null, $form, $start,$limit,$mailingsearch,$setLimit=null){
	$listId = null;

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
			if(empty($mailingq)){
				echo '<center>'. jnewsletter::printM( true , _ACA_Q_M1 , _ACA_ERROR).'</center>';
			}

			if ($listId==0) {
		     	$message = _ACA_MESSAGE_QUEUE;
		   	} else {
		   		$lt_name=lists::getLists($listId, 0, null, '', false, false,  true, false, false, '');
			    $message =  _ACA_SUSCRIB_LIST_UNIQUE."<span style='color: rgb(51, 51, 51);'>".@$lt_name[0]->list_name."</span>";
		   	}


		if(!isset($action))  $action = JRequest::getVar('act', '' );
		$dropDown = queue::listDrop();
		$filter = _ACA_FILTER_MAILING.$dropDown;
		$hidden = '<input type="hidden" name="option" value="com_jnewsletter" />';
	    $hidden .= '<input type="hidden" name="act" value="'.$action.'" />';
	    $hidden .= '<input type="hidden" name="limit" value="'.$limit.'" />';

//		echo jnewsletter::search($form['select'],$hidden, $mailingsearch, 'mailingsearch', $filter, $message );
		?>

	<?php
		echo $form['main'];

		// top portion before the table list
		// for search
		$toSearch = null;
		$toSearch->forms = $form['select'];
		$toSearch->hidden = $hidden;
		$toSearch->listsearch = $mailingsearch;
		$toSearch->id = 'mailingsearch';

		echo jnewsletter::setTop( $toSearch, $message, $setLimit, $filter );
	?>
		<table class="joobilist">
			<thead><tr>
				<th width="2%" class="title">#</th>
				<th width="2%" class="title"><input type="checkbox" id="selectallcheck" name="allchecked" onclick="jnewsletterselectall();"></th>
				<th width="3%" class="title">Published</th>
				<th width="22%" class="title"><?php echo _ACA_QUEUE_SUBJECT; ?></th>
				<th width="22%" class="title"><?php echo _ACA_QUEUE_EMAIL; ?></th>
				<th width="22%" class="title"><?php echo _ACA_SENDDATE; ?></th>
				<th width="3%" class="title"><center><?php echo _ACA_QUEUE_PRIOR; ?></center></th>
				<!--<th width="2%" class="title"><center><?php echo _ACA_QUEUE_ATT;
				?></center></th>-->
				<th width="3%" class="title">ID</th>
			</thead></tr>
			<?php
				$i=0;
if(!empty($mailingq)){
	$mailingId = JRequest::getVar( 'mailingid', '');
	if(!empty($mailingsearch)){
				foreach($mailingq as  $ndx => $mailingQ){
					foreach($mailingQ as $mail){
?>
								<tr class="row<?php echo ($i + 1) % 2;?>">
									<td><center><?php echo $i+1;?></center></td>
									<td><center><input type="checkbox" id="cid[<?php echo $i; ?>]" name="cid[<?php echo $i; ?>]" value="<?php echo $mail->qid;?>" onclick="isChecked(this.checked);"></center></td>
									<td><center><?php
									if ($mail->published == 1) {
												$img = '16/status_g.png';
											   	$alt = 'Published';
											 jnewsletter::getLegend( 'status_g.png', _ACA_TEMPLATE_PUBLISH );
										} else if ($mail->published == 2) {
												$img = '16/status_y.png';
											   	$alt = 'Scheduled';
											  jnewsletter::getLegend( 'status_y.png', _ACA_SCHEDULED );
										} else {
												$img = '16/status_r.png';
											   	$alt = 'Unpublished';
											  jnewsletter::getLegend( 'status_r.png', _ACA_UNPUBLISHED );
										}
									//echo $mail->published;
									?>
									<img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
									</center></td>
									<td><?php $subject= queue::getMailingsSubject($mail->mailing_id);
									echo $subject;
									?></td>
									<td><?php $email= listssubscribers::getSubscriberMail($mail->subscriber_id);
									echo $email;
									?></td>
									<td><?php
									if($mail->send_date==0){
										echo '0000-00-00 00:00:00';
									}else{
										echo date('Y-m-d H:i:s',$mail->send_date);
									}?></td>
									<td><center><?php echo $mail->priority;?></center></td>
									<!--<td><center><?php echo $mail->attempt;
									?></center></td>-->
									<td><center><?php echo $mail->qid;?></center></td>
								</tr>
							<?php $i=$i+1;
					}//endforeach
				}//endforeach
			//}//endif
			?>



		<?php }else{
			foreach($mailingq as  $mailingQ){
			?>
				<tr class="row<?php echo ($i + 1) % 2;?>">
					<td><center><?php echo $i+1;?></center></td>
					<td><center><input type="checkbox" id="cid[<?php echo $i; ?>]" name="cid[<?php echo $i; ?>]" value="<?php echo $mailingQ->qid;?>" onclick="isChecked(this.checked);"></center></td>
					<td><center><?php
							if ($mailingQ->published == 1) {
								$img = '16/status_g.png';
								$alt = 'Published';
								jnewsletter::getLegend( 'status_g.png', _ACA_TEMPLATE_PUBLISH );
							} else if ($mailingQ->published == 2) {
								$img = '16/status_y.png';
								$alt = 'Scheduled';
								jnewsletter::getLegend( 'status_y.png', _ACA_SCHEDULED );
							} else {
								$img = '16/status_r.png';
								$alt = 'Unpublished';
								jnewsletter::getLegend( 'status_r.png', _ACA_UNPUBLISHED );
							}
							//echo $mail->published;
							?>
							<img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
					</center></td>
					<td><?php $subject= queue::getMailingsSubject($mailingQ->mailing_id);
					echo $subject;
					?></td>
					<td><?php $email= listssubscribers::getSubscriberMail($mailingQ->subscriber_id);
					echo $email;
					?></td>
					<td><?php
					if($mailingQ->send_date==0){
							echo '0000-00-00 00:00:00';
					}else{
							echo date('Y-m-d H:i:s',$mailingQ->send_date);
					}
					?></td>
					<td><center><?php echo $mailingQ->priority;?></center></td>
					<!-- <td><center><?php echo $mailingQ->attempt;?></center></td>-->
					<td><center><?php echo $mailingQ->qid;?></center></td>
				</tr>
			<?php $i=$i+1;
				}//endforeach

			}//endif
		}//endif
?>
		</table>
		<?php

		echo '<br />';
		echo jnewsletter::setLegend();
	}//endfunction



 }//endclass


