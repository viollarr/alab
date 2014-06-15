<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 class frontEnd {
	function introduction($subscriberId, $listId,$lisType) {
		if ($subscriberId>0) {
			frontHTML::showPanel();
		} else {
			if ($GLOBALS[ACA.'show_lists']) {
				frontEnd::showLists($subscriberId, $listId, $lisType, 'show', '');
			}
		}
   }

	function showLists($subscriberId, $listId,$lisType,$action, $task) {
		global $Itemid;

		switch ($task) {
			case 'edit':
				if (jnewsletter::checkPermissions('admin')) {
					$task = 'save';
					$list = lists::getLists($listId, $lisType, $subscriberId, '', false, false, false);
					$listEdit = $list[0];
					$listEdit->new_letter = 0 ;
					if (!empty($listEdit)) {
						$linkForm = '.php?option=com_jnewsletter';
						compa::completeLink($linkForm,false);
					    $forms['main'] = "<form action='$linkForm' method='post' name='adminForm'> \n " ;
						$show = lisType::showType($listEdit->list_type , 'editlist');
						frontHTML::formStart( _ACA_EDIT_A.@constant( $GLOBALS[ACA.'listname'.$lisType] ).' '._ACA_LIST  , $listEdit->html , 'listedit' );
			       		listsHTML::editList($listEdit, $forms, $show);

						$go[] = jnewsletter::makeObj('list_id', $listEdit->id);
						$go[] = jnewsletter::makeObj('act', $action);
						$go[] = jnewsletter::makeObj('task', 'save');
						frontHTML::formEndFN(_ACA_SAVE, $go);

					}
				}

				break;

				case 'save':
					$message = jnewsletter::printYN( lists::updateListFromEdit($listId, '', false) ,  _ACA_LIST_UPDATED , _ACA_ERROR );
					echo $message;
					$listId = 0;
			default:
		   		$show = lisType::showType('' , 'showListsFront');
		   		$link = '.php?option=com_jnewsletter&act='.$action;
		   		compa::completeLink($link,false);

				$forms['main'] = '<form method="post" action="'. $link .'" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";
				$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
				$order = 'listnameA';

				if (jnewsletter::checkPermissions('admin')) {
					$lists = lists::getLists($listId, $lisType, $subscriberId, $order, false, false, false);
				} else {
					if ($lisType==0) {
						$lists1 = lists::getLists($listId, 1, $subscriberId, $order, false, true, false);
						$lists2 = lists::getLists($listId, 2, $subscriberId, $order, false, true, false);
						$lists7 = lists::getLists($listId, 7, $subscriberId, $order, false, true, false);
						$lists = array_merge($lists1, $lists2, $lists7);
					} elseif ( $lisType==1 OR $lisType==2 OR $lisType==7) {
						$lists = lists::getLists($listId, $lisType, $subscriberId, $order, false, true, false);
					} else {
						$lists = '';
					}
				}

				if (!empty($lists)) {
					frontHTML::formStart( _ACA_SUBSCRIBE_LIST2  , 0 , '' );
					if ($show['list_type']) $show['list_type'] = lisType::checkOthers();

					if ( class_exists('pro') ) {

						$access = false;
						foreach( $lists as $list ) {
							$bit = jnewsletter::checkPermissions('hello', 0, $list->acc_level );
							if ( $bit ) {
								$access = true;
								break;
							}
						}
						if ( $access ) {
							pro::showListingLists($lists , $action , 'edit' , $forms, $show);
						} else {
							listsHTML::showListingLists($lists , $action , 'edit' , $forms, $show);
						}
					} else {
						listsHTML::showListingLists($lists , $action , 'edit' , $forms, $show);
					}
					$go[] = jnewsletter::makeObj('act', $action);
					frontHTML::formEnd('', $go);
				}
				break;
		}

   }

	function mailingOptions( $action, $task, $listId, $mailingId, $subscriberId, $listType) {

		global $Itemid;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$acl =& JFactory::getACL();
			$database =& JFactory::getDBO();
			$my	=& JFactory::getUser();
		}//endif

		if($listType<1)
		{
			if (isset($_POST['droplist'])){  $maliste = explode('-',$_POST['droplist']); $listType = $maliste[0]; $listId = $maliste[1];}
			elseif ($listId>0){
				$maliste = lists::getLists($listId,0,null,'listnameA',false,false,false,false);
				$listType = $maliste[0]->list_type;
			}
		}

		switch ($task) {
			case 'edit':
				frontEnd::mailingEdit($subscriberId, $mailingId, $listId, $listType, 'savemailing');
				break;
			case 'new':
			case 'add':
				break;
			case 'archive':
				if (  class_exists('pro')  ) {

					$gidFront = $acl->get_group_id( 'Public Frontend' , 'ARO' );

					if ( isset($my->id) && $my->id>0 ) {
						$aro_id = $acl->get_object_id( 'users', $my->id, 'ARO' );
						$qacl = "SELECT `group_id` FROM `#__core_acl_groups_aro_map` WHERE `aro_id` =".$aro_id;
						$database->setQuery( $qacl );
						$gidd = $database->loadResult();
					} else {
						$gidd = $gidFront;
					}

					$gid = ( $gidd > 0 ) ? $gidd : $gidFront;

					$ex_groups = $acl->get_group_parents( $gid , 'ARO',  'RECURSE' );
					$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );
					if ( in_array( $gidAdmin , $ex_groups ) ) {
						$ex_groups2 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
						$ex_groups2[] = $gidFront;
						$ex_groups = array_merge( $ex_groups, $ex_groups2 );
					}
					$ex_groups[] = $gid;
					$list = lists::getOneList( $listId );

					if ( !in_array( $list->acc_id , $ex_groups ) ) break;
				}

				frontEnd::showMailingsFront( $task, $action, $subscriberId, $listId, $listType, true, _ACA_MENU_VIEW_ARCHIVE . ' ');
				break;
			case 'view':
				if ($mailingId != 0) {
					if($listId > 0) {
						$archivemailing = xmailing::getMailingView($mailingId,$listId);
					}else{
						$archivemailing = xmailing::getMailingView($mailingId);
					}

					//jnewsletter_mail::replaceClass($archivemailing->htmlcontent,$archivemailing->textonly);
					$styles = templates::getTemplateStyles($archivemailing->template_id);
					templates::insertStyles($archivemailing->htmlcontent, '', $styles);
					$archivemailing->htmlcontent = str_replace('[SUBSCRIPTIONS]','',$archivemailing->htmlcontent);

					$linkZ = '.php?option=com_jnewsletter';
					compa::completeLink($linkZ,false);
					$forms['main'] = '<form method="post" action="'.$linkZ.'" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";


					$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';

					frontHTML::formStart('Newsletter Archive' , 0,'' );
					mailingsHTML::viewMailing($archivemailing, $forms);
					$go[] = jnewsletter::makeObj('act', 'mailing');
					$go[] = jnewsletter::makeObj('task', 'viewmailing');
					$go[] = jnewsletter::makeObj('listid', $archivemailing->list_id);
					frontHTML::formEnd('', $go);
				} else {
					frontEnd::showMailingsFront( $task, $action , $subscriberId, $listId, $listType, false, _ACA_MENU_MAILING);
				}
				break;
			default:
				if (jnewsletter::checkPermissions('Registered')) frontEnd::showMailingsFront( $task, $action , $subscriberId, $listId, $listType, false, _ACA_MENU_MAILING);

				$link = '.php?option=com_jnewsletter&act=mailing&task=edit&listid='.$listId.'&listype='.$listType.'&Itemid='.$Itemid;
				compa::completeLink($link,false);

				if ($listType>0 AND $listId>0){
					echo '<br/><a href="'.$link.'"><span style="font-weight: bold;">'. _ACA_MAILING_NEW_FRONT.'</span></a><br/>';
				}

				break;
		}
   	return true;
   }


	 function updateFrontSubscription($subscriberId) {
		$message = subscribers::updateReceiveHtml($subscriberId);
		$status = listssubscribers::updateOneSuscription($subscriberId);
		return jnewsletter::printYN($status , _ACA_UPDATED_SUCCESSFULLY, _ACA_ERROR);
   }

	 function newSubscriber($name, $email,$confirm = false) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
			$rHTML = JRequest::getVar('receive_html', '0', 'request');
			$timezone = JRequest::getVar('timezone', '00:00:00' );
			$lang6 = JRequest::getVar('lang', 'eng' );
			$p=JRequest::getVar('passwordA','');

			if($GLOBALS[ACA.'type']=='PRO'){
				$column1=JRequest::getVar('column1','');
				$column2=JRequest::getVar('column2','');
				$column3=JRequest::getVar('column3','');
				$column4=JRequest::getVar('column4','');
				$column5=JRequest::getVar('column5','');
			}
			if($GLOBALS[ACA.'type']=='PRO' or $GLOBALS[ACA.'type']=='PLUS'){
				$security=JRequest::getVar('security_code','');
				$captcha=JRequest::getVar('security_captcha','');
			}
			$fromSubscribe=JRequest::getVar('fromSubscribe','');
			$fromFrontend=JRequest::getVar('fromFrontend','');
		}//endif

		$canInsert=false;
		$message='';

		if($p==$GLOBALS[ACA.'url_pass'] and empty($fromSubscribe) and empty($fromFrontend)){
			$fromURL=true;
		}else{
			$fromURL=false;
		}

		if($fromSubscribe){//check from the conditions if the request if coming from the module and external form
			if($GLOBALS[ACA.'type']=='PRO'or $GLOBALS[ACA.'type']=='PLUS'){//check if the version us plus or pro}
				if($GLOBALS[ACA.'enable_captcha']){//if captcha is enabled
					$decryptSecurity='';
					$decryptCaptcha='';
					$decryptSecurity=captchajNewsletter::decryptData($security,crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));//decrypt the entered code
					$decryptCaptcha=captchajNewsletter::decryptData($captcha,crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));//decrypt the true code
					if($security==$decryptCaptcha){//check captcha entered and captcha code
						$canInsert=true;
					}else{
						$message .= ACA_WRONG_CAPTCHA_ENTERED;

					}//endif for captcha entered and captcha code
				}else{
					$canInsert=true;
				}//endif if captcha is enabled
			}else{
				$canInsert=true;
			}//endif check if the version is plus or pro

		}elseif($fromFrontend){//check if the request is coming from the frontend
				$canInsert=true;
		}elseif($fromURL){//check if the request to insert subscriber is directly from entering the URL
				$canInsert=true;
		}else{
			$message .=jnewsletter::printM('red' , _ACA_URL_MES);
		}//endif for conditions

		if($canInsert){
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$newSubscriber = new stdClass;
			$newSubscriber->id =  0;
			$newSubscriber->user_id =  0 ;
			$newSubscriber->name =  $name ;
			$newSubscriber->email =  $email ;
			$newSubscriber->receive_html =  $rHTML;

			if($GLOBALS[ACA.'type']=='PRO'){
				$newSubscriber->column1 =  $column1;
				$newSubscriber->column2 =  $column2;
				$newSubscriber->column3 =  $column3;
				$newSubscriber->column4 =  $column4;
				$newSubscriber->column5 =  $column5;
			}

			if ($GLOBALS[ACA.'require_confirmation'] and (!$confirm)) $newSubscriber->confirmed =  0;
			else $newSubscriber->confirmed =  1;

			$newSubscriber->ip =  subscribers::getIP() ;
			$newSubscriber->blacklist =  0;
			$newSubscriber->timezone = $timezone;
			$newSubscriber->language_iso = $lang6;
			$newSubscriber->params = '';
			$newSubscriber->subscribe_date = jnewsletter::getNow();
			$dontParse[] = 'params';
			jnewsletter::objectHTMLSafe( $newSubscriber, ENT_QUOTES, $dontParse );

			$confirmation = true;
			$d['email'] = $newSubscriber->email;
			$erro->ck = subscribers::insertSubscriber($newSubscriber, $subscriberId);

			if (!$erro->Eck(__LINE__ , '8280')) {
				$erro->ck = subscribers::getSubscriberIdFromEmail($d);
				if ($erro->Eck(__LINE__ , '8270')) {
					$confirmation = false;
				} else {
					return jnewsletter::printM('blue' , _ACA_ERROR);
				}
			}

			if ($GLOBALS[ACA.'require_confirmation'] AND $confirmation AND (!$confirm) AND !subscribers::userConfirmed($newSubscriber->email)) {
				$erro->ck = jnewsletter_mail::sendConfirmationEmail($subscriberId);
				$erro->Eck(__LINE__ , '8281');
				$needConfirm = true;
			}else{
				$needConfirm = false;
			}

			$erro->ck = listssubscribers::updateOneSuscription($subscriberId);
			if (!$erro->Eck(__LINE__ ,  '8272')) {
				return jnewsletter::printM('blue' , _ACA_ERROR);
			}


			if ($needConfirm) {

				$queues = listssubscribers::getSubscriberLists($subscriberId);

				//$qids = jnewsletter::convertObjectToIdList($queues , 'qid');
				$qids = jnewsletter::convertObjectToIdList($queues , 'subscriber_id');
				$erro->ck = queue::updateSuspend($qids, 1);
				if (!$erro->Eck(__LINE__ ,  '8273')) {
					return $erro->mess;
				}
				$message = jnewsletter::printM('blue' , _ACA_COMFIRM_SUBSCRIPTION);
				} else {
						$message = jnewsletter::printM('green' , _ACA_SUCCESS_ADD_LIST);

				}

				//send notification
				$optionNotify=$GLOBALS[ACA.'subscription_notify'];

				if($GLOBALS[ACA.'type']=='PRO'){//check if version if pro}
				if($GLOBALS[ACA.'subscription_notify']){
					//get the sendmail_from of jnewsletter

						$SubjectMessage=null;
						$NotifyMessage=null;

						$sendToName=null;
						$AdminEmail=null;
						$DateofSubscription=null;
						$nameofNew=null;
						$EmailofNew=null;
						$SubscribedList=null;
						$sub=null;
						$sId=null;

						$SubjectMessage="jNews New Subscription";

						//get sendName
						$sendToName= trim($GLOBALS[ACA.'sendmail_name']);

						//get email
						$mail->Sender 	= trim($GLOBALS[ACA.'sendmail_from']);
						if(empty($mail->Sender)) $mail->Sender = '';
						$AdminEmail = $mail->Sender;

						$NotifyMessage="This is a subscription notification email.<br><br>Dear ".$AdminEmail.",<br><br>This is an automated message from <u>".$sendToName."</u>.<br><br>A user subscribed to your newsletter list/s.<br>Details:<br>";

						//get date of subscription
						$newSubscriber->subscribe_date = jnewsletter::getNow();
						$DateofSubscription=$newSubscriber->subscribe_date;
						$NotifyMessage= $NotifyMessage. "Date and Time of Subscription: <u>".date('Y-m-d H:i:s',$DateofSubscription) ."</u><br>";

						//get name of subscribers
						$newSubscriber->name =  $name ;
						$nameofNew=$newSubscriber->name;
						$NotifyMessage= $NotifyMessage. "Name of Subscriber: <u>". $nameofNew ."</u><br>";

						//get email address of the subscribers
						$newSubscriber->email =  $email ;
						$EmailofNew=$newSubscriber->email;
						$NotifyMessage= $NotifyMessage. "Email Address: <u>" . $EmailofNew. "</u><br>";

						//get subscriber id of the new subscriber
						$sId= subscribers::getSubscriberId($DateofSubscription);

						//get listname/s subscribed to
/*original query*/		//$query= "Select list_name from `#__jnews_lists` where `id` in(Select `list_id` from `#__jnews_queue` where `subscriber_id`='".$sId."')";
						//$query= 'SELECT `A.list_name` from `#__jnews_lists` as `A`, `#__jnews_listssubscribers` as `B`, `#__jnews_subscribers` as `C` ';
						//$query .='WHERE `A.id`=`B.list_id` and `B.subscriber_id`=`C.id` and `C.subscribe_date`='.$DateofSubscription;
						$query = 'SELECT `list_name` from `#__jnews_lists` WHERE `id` in (';
						$query .='SELECT `list_id` from `#__jnews_listssubscribers` WHERE `subscriber_id` = (';
						$query .='SELECT `id` from `#__jnews_subscribers` WHERE `subscribe_date`='.$DateofSubscription ;
						$query .='))';
						$database->setQuery($query);
						$SubscribedList = $database->loadObjectList();
						$error = $database->getErrorMsg();

						if (!empty($error)){
								echo  $error;
								return false;
						}else{
							$sub="";
							foreach($SubscribedList AS $subscribed){
									$sub=$sub. $subscribed->list_name .'<br>';//assign to $sub values retreived from the database
							}//end of foreach
						}//end of if$error

						$NotifyMessage= $NotifyMessage ."Subscribed to List/s: <br><u>". $sub."</u><br>";//body of notification message

						$mailing = null;
						$mailing->id = 1;
						$mailing->fromname = $sendToName;
						$mailing->fromemail = $AdminEmail;
						$mailing->attachments = '';
						$mailing->images = '';

						### create the mail
						$mail = jnewsletter_mail::getMailer($mailing);

						//### create content
						$mail->IsHTML(true);
						$mail->Body = $NotifyMessage;
						$mail->AddAddress( $mailing->fromemail,$mailing->fromname) ;
						$mail->Subject =  _ACA_NEW_SUB;
						$mailssend = $mail->Send();

						if (!$mailssend || $mail->error_count > 0){
							$message=$message. "<br>".jnewsletter::printM('red' , _ACA_SUBSCRIPTION_NOTIFY_ERR);
						}else{
							$message=$message. "<br>".jnewsletter::printM('green' , _ACA_SUBSCRIPTION_NOTIFY_MSG1);
						}
						//end of send notification
					}else{
							$message=$message;//. "<br>".jnewsletter::printM('green' ,_ACA_SUBSCRIPTION_NOTIFY_MSG2);
					}//end of send notification
				}//end of check version pro
			}//end of if for canInsert
     	return $message;

   }

	 function subscriptions($subscriberId, $listId, $action) {

		global $Itemid;

			if (!empty($subscriberId)) {
				$qid[0] = $subscriberId;
			    $subscriber = subscribers::getSubscribersFromId($qid, false);
			    $queues = listssubscribers::getSubscriberLists($subscriberId);
			} else {
				$subscriber->id =  '' ;
				$subscriber->user_id =  0 ;
				$subscriber->name =  '' ;
				$subscriber->email =  '' ;
				$subscriber->ip = subscribers::getIP() ;
				$subscriber->receive_html =  1 ;
				$subscriber->confirmed =  1;
				$subscriber->blacklist =  0;
				$subscriber->timezone = '00:00:00';
				$subscriber->language_iso = 'eng';
				$newSubscriber->params = '';

				//column
				if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
					$newSubscriber->column1='';
					$newSubscriber->column2='';
					$newSubscriber->column3='';
					$newSubscriber->column4='';
					$newSubscriber->column5='';
				}//end check of version pro

				$subscriber->subscribe_date = jnewsletter::getNow();
            	$queues = '';
			}


			if ($subscriber->user_id>0) {
				$access = jnewsletter::checkPermissions('admin', $subscriber->user_id);
			} else {
				$access = false;
			}

			$lists = lists::getLists($listId, 0, $subscriberId, '', false , true, false);
			$doShowSubscribers = false;

			$mainLink = '.php?option=com_jnewsletter';
			$selectLink = '.php?option=com_jnewsletter&act='.$action;
			compa::completeLink($mainLink,false);
			compa::completeLink($selectLink,false);

			$forms['main'] = '<form method="post" action="'. $mainLink . '" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";
			$forms['select'] = '<form method="post" action="'. $selectLink . '"  name="jNewsFilterForm">';


			$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
			$forms['select'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';

			frontHTML::formStart( _ACA_SUBSCRIPTIONS, 0, 'name_email');
		    echo subscribersHTML::editSubscriber($subscriber, $lists, $queues, $forms, $access, true, false );
			$go[] = jnewsletter::makeObj('act', $action);
			$go[] = jnewsletter::makeObj('subscriber_id', $subscriber->id);
			$go[] = jnewsletter::makeObj('user_id', $subscriber->user_id);
			frontHTML::formEnd(_ACA_SAVE, $go);

   return true;
   }

	 function changeSubscriptions($subscriberId, $cle='', $listId, $action) {
		global $Itemid;

		if (!empty($subscriberId) AND !empty($cle)) {
			$qid[0] = $subscriberId;
		    $subscriber = subscribers::getSubscribersFromId($qid, false);
		    $confirmed = false;
		    if ( md5($subscriber->email) == $cle ) {
			    $queues = listssubscribers::getSubscriberLists($subscriberId);

				$confirmed = true;

				if ($subscriber->user_id>0) {
					$access = jnewsletter::checkPermissions('admin', $subscriber->user_id);
				} else {
					$access = false;
				}

				if ($subscriberId>0) $author = 0;
				$lists = lists::getLists($listId, 0, $subscriberId, '', false , true, false);
				$doShowSubscribers = false;

				$mainLink = '.php?option=com_jnewsletter';
				$selectLink = '.php?option=com_jnewsletter&act='.$action;
				compa::completeLink($mainLink,false);
				compa::completeLink($selectLink,false);

				$forms['main'] = '<form method="post" action="'. $mainLink . '" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";
				$forms['select'] = '<form method="post" action="'. $selectLink . '"  name="jNewsFilterForm">'."\n\r";


				$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
				$forms['select'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
				$forms['main'] .= '<input type="hidden" name="confirmed" value="'.$confirmed.'" />';
				frontHTML::formStart( _ACA_SUBSCRIPTIONS, 0, 'name_email');
			    echo subscribersHTML::editSubscriber($subscriber, $lists, $queues, $forms, $access, true, false);
				$go[] = jnewsletter::makeObj('act', $action);
				$go[] = jnewsletter::makeObj('subscriber_id', $subscriber->id);
				$go[] = jnewsletter::makeObj('user_id', $subscriber->user_id);
				frontHTML::formEnd(_ACA_CHANGE_SUBSCRIPTIONS, $go);
				return true;
			} else {
			 	return false;
			}
		} else {
			return false;
		}

   }

	function confirmRegistration($d) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		if (!empty($d['subscriberId']) AND !empty($d['cle'])) {
			$qid[0] = $d['subscriberId'];
		    $subscriber = subscribers::getSubscribersFromId($qid, false);
		    if ( md5($subscriber->email) == $d['cle'] ) {
				$subscriber->confirmed = 1;
				$erro->ck = subscribers::updateSubscriber($subscriber, $notused);


				if ($erro->Eck(__LINE__ ,  '8275', $d)) {
					$queues = listssubscribers::getSubscriberLists($d['subscriberId']);
					//$qids = jnewsletter::convertObjectToIdList($queues , 'qid');
					$qids = jnewsletter::convertObjectToIdList($queues , 'subscriber_id');
					$erro->ck = queue::updateSuspend($qids, 0);
					return $erro->Eck(__LINE__ ,  '8276');
				}
		    }
		}
		return false;

   }

	 function remove($subscriberId, $cle='', $listId) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($subscriberId) AND !empty($cle) AND $listId>0) {
			$qid[0] = $subscriberId;
		    $subscriber = subscribers::getSubscribersFromId($qid, false);
		    if ( md5($subscriber->email) == $cle ) {

				$suscription = new stdClass;
				$suscription->user_id = $subscriberId;
				$suscription->sub_list_id[1] = $listId;
				$suscription->subscribed[1] = 0;
				$suscription->acc_level[1] = 0;

				$erro->ck = listssubscribers::updateSuscription($suscription);
				$erro->Eck(__LINE__ ,  '8277');
				$list = lists::getOneList($listId);
				if ($list->unsubscribesend ==1) {
					$erro->err = jnewsletter_mail::sendUnsubcribeEmail($subscriberId, $list);
					$erro->E(__LINE__ ,  '8278');
				}
				//JHEN ADMIN NOTIFICATION
				if ($list->unsubscribenotifyadmin == 1) {
					$erro->err = jnewsletter_mail::adminNotification($subscriberId, $list);
					$erro->E(__LINE__ ,  '8278');
				}
			}
		}
		return $erro->R();
   }


	function unsubscribe($subscriberId, $cle='', $listId, $action) {
		global $Itemid;

		if (!empty($subscriberId) AND !empty($cle) AND $listId>0) {
			$qid[0] = $subscriberId;
		    $subscriber = subscribers::getSubscribersFromId($qid, false);
		    if ( md5($subscriber->email) == $cle ) {
			    $queues = listssubscribers::getSubscriberLists($subscriberId);
				$lists = lists::getLists($listId, 0 ,null,'', false, false, true);

				$list = $lists[0];

				$mainLink = '.php?option=com_jnewsletter';
				compa::completeLink($mainLink,false);

				$forms['main'] = '<form method="post" action="'. $mainLink . '" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";
				$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
				$link = '.php?option=com_jnewsletter&act=change&subscriber=' . $subscriberId . '&cle=' . $cle. '&listid=' . $listId .'&Itemid=' . $Itemid;
				compa::completeLink($link,false);

				frontHTML::formStart( _ACA_SUBSCRIPTIONS, 0, 'unsubscribe');
			    subscribersHTML::unsubscribe($subscriber, $list, $queues, $action, $forms);
				frontHTML::formEndYesNo($link, $cle, $subscriberId, $listId);

			} else {
			 	return false;
			}
		} else {
			return false;
		}

   }

	 function showSubscriberLists($subscriberId, $action) {

		$lists = lists::getLists(0, 0, $subscriberId, '', false , true, false);

		if ($subscriberId==0) {
			$subscriber ='';
			$queues = '';
			subscribersHTML::showSubscriberLists($subscriber, $lists, $queues, true);
		} else {
			frontEnd::subscriptions($subscriberId, 0, 'save');
		}
	    return true;
   }


	 function showMailingsFront( $task, $action, $subscriberId, $listId, $listType='', $viewArchive, $pageTile) {
		global $Itemid;

		if ( ACA_CMSTYPE ) {
			$start = JRequest::getVar('start', '0' );
			$emailsearch = JRequest::getVar('emailsearch', '' );
			$order = JRequest::getVar('order', 'idD' );
			$dropList = JRequest::getVar('droplist', 'ZZZZ' );
		} //endif

		 $limit = -1;
 	     $total = 0;
		 if ($dropList=='ZZZZ') $dropList = $listType .'-'. $listId;
 	     $total = 0;

		$dropListValues = explode ('-', $dropList);
		$listType = $dropListValues[0];
		$listId = $dropListValues[1];

		if ( class_exists('pro') && $listId>0 ) {
			$list = lists::getOneList($listId);
			$accessGrant = jnewsletter::checkPermissions('hello', 0, $list->acc_level );
		} else {
			$accessGrant = jnewsletter::checkPermissions('admin');
		}

		if ( $accessGrant ) {
			if ($listId>0) {
				$mailings = xmailing::getMailings($listId, 0, $start, $limit, $emailsearch, $total, $order, false, $viewArchive);
			} else {
				$mailings = xmailing::getMailings($listId, $listType, $start, $limit, $emailsearch, $total, $order, false, $viewArchive);
			}
		} else {
			if ($listType==1 OR $listType==2 OR $listType==7) {
				$mailings = xmailing::getMailings($listId, 0, $start, $limit, $emailsearch, $total, $order, true, $viewArchive);
			} elseif ($listType==0) {
				$mailings1 = xmailing::getMailings($listId, 1, $start, $limit, $emailsearch, $total, $order, true, $viewArchive);
				$mailings2 = xmailing::getMailings($listId, 2, $start, $limit, $emailsearch, $total, $order, true, $viewArchive);
				$mailings7 = xmailing::getMailings($listId, 7, $start, $limit, $emailsearch, $total, $order, true, $viewArchive);
				$mailings = array_merge($mailings1, $mailings2, $mailings7);
			} else {
				$mailings = '';
			}
		}

		if ($listId==0) {
	      $lists['title'] = lisType::chooseType($task, $action, $listType , 'titles', '', _ACA_MENU_MAILING);
	   } else {
			$listing = lists::getLists($listId, 0, $subscriberId, '', false, false, true);
			$listType = ( $listType>0 ) ? $listType : '0' ;
			$lists['title'] = 'Newsletter Archive';
	   }

		$dropDownList = lisType::getMailingDropList($listId, $listType, $order);
		if ( ACA_CMSTYPE ) {
			$lists['droplist'] = JHTML::_('select.genericlist', $dropDownList, 'droplist', 'class="inputbox" size="1" onchange="document.jNewsFilterForm.submit();"', 'id', 'name', $dropList );
		} //endif

		$linkMain = '.php?option=com_jnewsletter&act=' . $action;
		compa::completeLink($linkMain,false);

		$forms['main'] = '<form method="post" action="'. $linkMain . '" onsubmit="submitbutton();return false;" name="mosForm" >'."\n\r";
		$forms['select'] = '<form method="post" action="'. $linkMain . '"  name="jNewsFilterForm">'."\n\r";


		$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
		$forms['select'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';

		$show = lisType::showType($listType , 'showMailings');
		$show['index'] = 'index';
		$show['select']= false;
		$show['buttons'] = true;

		if ( class_exists('pro') && !$viewArchive) {
			$show['admin'] = true;
			$show['status'] = true;
		}

		frontHTML::formStart( $lists['title'] , 0, 'show_mailing');
		mailingsHTML::showMailingList($mailings, $lists, $start, $limit, $total, $emailsearch, $listId, $listType, $forms, $show, $action );
		frontHTML::formEnd();

	    return true;
   }

	 function mailingEdit($subscriberId, $mailingId, $listId, $listType='', $action) {
		global $my, $Itemid;

		if ( ACA_CMSTYPE ) {
			$issue_nb = JRequest::getVar('issue_nb', '0' );
			$my	=& JFactory::getUser();
		} //endif

		$accessGrant = false;
		$new=0;
		if ( class_exists('pro') ) {

 			if ($issue_nb == 0) {
 				$issue_nb = xmailing::countMailings($listId, '');
				$issue_nb++;
 			}

			if ($listId>0) {
				$list = lists::getOneList($listId);
				$mailing = xmailing::getOneMailing($list, $mailingId, $issue_nb, $new);
				$acc_level = $list->acc_level;
			} else {
				return false;
			}

			if ( jnewsletter::checkPermissions('hello',0, $acc_level ) ) $accessGrant = true;

		} else {
			if ($subscriberId<>0 AND ($my->usertype == 'Administrator'
			OR $my->usertype == 'Super Administrator' ) ) {
				$accessGrant = true;
			}
		}

		if ( $accessGrant ) {

 			if ($issue_nb == 0) {
 				$issue_nb = xmailing::countMailings($listId, '');
				$issue_nb++;
 			}

			if ( empty($mailing) ) {
				if ($mailingId>0 ) {
					$mailing = xmailing::getOneMailing('', $mailingId, $issue_nb, $new);
				} else if ($listId>0) {
					$list = lists::getOneList($listId);
					$mailing = xmailing::getOneMailing($list, $mailingId, $issue_nb, $new);
				} else {
					return false;
				}
			}


		$mainLink = '.php?option=com_jnewsletter&act=savemailing';
		compa::completeLink($mainLink,false);
		$forms['main'] = '<form method="post" enctype="multipart/form-data" action="'. $mainLink . '" onsubmit="submitbutton();return false;" name="adminForm" >'."\n\r";


			$forms['main'] .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
			$show = lisType::showType($mailing->mailing_type , 'editmailing');

    	    frontHTML::formStart( _ACA_EDIT_A. @constant( $GLOBALS[ACA.'listname'.$mailing->mailing_type] ) ,$mailing->html, 'edit_mailing');
			mailingsHTML::editMailing($mailing, $new, $listId, $forms, $show);
			$go[] = jnewsletter::makeObj('act', $action);
			frontHTML::formEnd( _CMN_SAVE .' '. @constant( $GLOBALS[ACA.'listname'.$mailing->mailing_type] ), $go);
		} else {
		 	echo jnewsletter::printM('red' , _NOT_AUTH);
		}

	    return true;
   }

 }