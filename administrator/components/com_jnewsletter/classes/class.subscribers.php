<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class subscribers {

	function userConfirmed($email){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$email = htmlspecialchars($email,ENT_QUOTES);
		$query = "SELECT confirmed FROM `#__jnews_subscribers` WHERE email = '$email' LIMIT 1" ;
		$database->setQuery($query);
		$confirmed = $database->loadResult();
		if(empty($confirmed)) return false;
		return true;

	}

	function getSubscribersFromId($qid, $objList = false) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($qid)) {
			$qids = implode (',', $qid);

			if ( empty($qids) ) return '';
			$query = "SELECT A.*, B.username FROM `#__jnews_subscribers` as A LEFT JOIN `#__users` as B on A.user_id = B.id WHERE A.`id` IN ( $qids )" ;

			$database->setQuery($query);
			$subscribers = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();

			if (!$erro->E(__LINE__ , '8601', $database )) {
				return '';
			} else {
				if (count($subscribers)==1 AND !$objList) {

					foreach( $subscribers[0] as $myProperty => $mysubc ) {
						$subscriber->$myProperty = $mysubc;
					}

				} else {
					$subscriber = $subscribers;
				}
				return $subscriber;
			}
		} else {
			return '';
		}
	 }

	 //function send admin a notification if the user unsubscribes to the list //by JHEN
	 function sendAdminMail( $adminName, $adminEmail, $email, $type, $title, $author, $url = null )
    {
    	$subject='';
    	$message='';
        $subject = JText::_( '_ACA_UNSUBSCRIBE_SUBJECT_MESS' ) . $type;
        $message .= JText::_( '_ACA_HELLO' ). $adminName . ", \n\n";
        $message .= JText::_('_ACA_UNSUBSCRIBE_ADMIN_NOTIFICATION') ."\n\n";
        $message .= JText::_( 'MAIL_MSG') ."\n";

          // Get a JMail instance
        $mail =& JFactory::getMailer();
        $mail->addRecipient($adminEmail);
        $mail->setSubject($subject);
        $mail->setBody($message);

        return  $mail->Send();
    }//endfct send admin a notification

	 function getSubscriberId($date) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT `id` FROM `#__jnews_subscribers` WHERE `subscribe_date` = \'' . $date . '\'';
		$database->setQuery($query);
		$id = $database->loadResult();
		$erro->err = $database->getErrorMsg();
		return $erro->Ertrn( __LINE__ , '8603', $database, $id );
	 }


	 function getSubscriberIdFromEmail(&$d) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if ($d['email']) {
			$query = 'SELECT `id` FROM `#__jnews_subscribers` WHERE `email` = \'' . $d['email'] . '\' LIMIT 1 ';
			$database->setQuery($query);
			$d['subscriberId'] = $database->loadResult();
			$erro->err = $database->getErrorMsg();
		}
		return $erro->Ertrn( __LINE__ , '8605', $database, $d );
	 }


	function getSubscriberIdFromUserId($userId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($userId))  {
			$query = 'SELECT `id` FROM `#__jnews_subscribers` WHERE `user_id` = \'' . $userId . '\' LIMIT 1';
			$database->setQuery($query);
			$id = $database->loadResult();
			$erro->err = $database->getErrorMsg();
		}
		return $erro->Ertrn( __LINE__ , '8607', $database, $id );

	 }


	function getSubscriberInfoFromUserId($userId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($userId))  {
			$query = 'SELECT * FROM `#__jnews_subscribers` WHERE `user_id` = \'' . $userId . '\' LIMIT 1';
	     	$database->setQuery($query);

					if ( ACA_CMSTYPE ) {	// joomla 15
						$subscriber = $database->loadObject();
					} else {									//joomla 1x
						$database->loadObject($subscriber);
					}//endif

			$erro->err = $database->getErrorMsg();
		}
		return $erro->Ertrn( __LINE__ , '8609', $database, $subscriber );

	 }


	 function getSubscribers($start = -1, $limit = -1, $emailsearch, &$total, $listId, $mailingId, $blackList =0 , $confirmed = 0, $order='') {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$my	=& JFactory::getUser();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$flag = false;
		$limitFlag = false;
	    if ($listId == 0) {
			$query = 'SELECT M.*,U.username FROM `#__jnews_subscribers` AS M  LEFT JOIN `#__users` as U ON M.user_id = U.id ';
	    } else {

	    	 $query = 'SELECT M.*,U.username FROM `#__jnews_subscribers` AS M LEFT JOIN `#__users` as U ON M.user_id = U.id LEFT JOIN `#__jnews_listssubscribers` AS N' .
	    		' ON  M.id = N.subscriber_id  WHERE  N.list_id ='.$listId;

			$flag = true;
	    }

		if ($mailingId>0 AND $flag) $query .= ' AND N.mailing_id = '.$mailingId;


		if ($listId == 0) {
			if ($blackList == 1) {
				if ($confirmed == 1) {
					$query .= ' WHERE M.blacklist = 0 AND M.confirmed = 1  ';
					$flag = true;
				} else {
					$query .= ' WHERE M.blacklist = 0 ';
					$flag = true;
				}
			}
		} else {
			if ($blackList == 1) {
				if ($confirmed == 1) {
					$query .= ' AND M.blacklist = 0 AND M.confirmed = 1  ';
					$flag = true;
				} else {
					$query .= ' AND M.blacklist = 0 ';
					$flag = true;
				}
			}
		}


		if (!empty($emailsearch)) {
			if ($flag) {
				$query .= ' AND (M.email LIKE \'%' . $emailsearch . '%\' OR M.name LIKE \'%' . $emailsearch . '%\') ';
			} else {
				$query .= ' WHERE M.email LIKE \'%' . $emailsearch . '%\' OR M.name LIKE \'%' . $emailsearch . '%\' ';
			}
		}

		if ( $listId != 0 ) $query .= ' GROUP BY M.id ';

		if (!empty($order)) $query .= jnewsletter::orderBy($order);

		if ($start != -1 && $limit != -1) {
			$query .= ' LIMIT ' . $start . ', ' . $limit;
			$limitFlag = true;
		}

		$database->setQuery($query);
		$subscribers = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();

/* // remove to avoid conflict for the new pagination @ top table
		if ($erro->E(__LINE__ , '8611', $database )) {
			if ($limitFlag) {
				$flag = false;

				$query = 'SELECT COUNT(M.id) FROM #__jnews_subscribers AS M';
				if ($mailingId>0) {
					$query .= ' LEFT JOIN `#__jnews_queue` AS N  ON  M.id = N.subscriber_id  WHERE  N.mailing_id = '.$mailingId;
					$flag = true;
				} elseif ($listId>0) {
					$query .= ' LEFT JOIN `#__jnews_listssubscribers` AS N  ON  M.id = N.subscriber_id  AND N.list_id = '.$listId;
					$flag = true;
				}

				if (!empty($emailsearch)) {
					if ($flag) {
						$query .= ' AND (M.email LIKE \'%' . $emailsearch . '%\' OR M.name LIKE \'%' . $emailsearch . '%\') ';
					} else {
						$query .= ' WHERE M.email LIKE \'%' . $emailsearch . '%\' OR M.name LIKE \'%' . $emailsearch . '%\' ';
					}
				}

				$database->setQuery($query);
				$total = $database->loadResult();

			} else {
				$total = count($subscribers);
			}
		}
*/
		return $subscribers;

	 }


	function getUserType($userId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$database->setQuery( "SELECT `usertype` FROM #__users WHERE `id` =".$userId );
		$userType = $database->loadResult();
		$erro->err = $database->getErrorMsg();
		return $erro->Ertrn( __LINE__ , '8613', $database, $userType );

	 }


	function getAdmins() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = "SELECT S.* FROM `#__jnews_subscribers` as S ";
		$query .= " LEFT JOIN `#__users` as U ON S.user_id = U.id ";
		$query .= "  WHERE  ( U.usertype = 'superadministrator' ";
		$query .= "  OR  U.usertype  = 'Super Administrator' ";
		$query .= "  OR  U.usertype  = 'super administrator' ) ";
		$database->setQuery( $query );
		$admins = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();
		return $erro->Ertrn( __LINE__ , '8666', $database, $admins );

	}


	function insertOneSubscriber() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		 $oneSubscriber = '';

		if ( ACA_CMSTYPE ) {	// joomla 15
			 $oneSubscriber->id = intval(JRequest::getVar('subscriber_id', ''));
			 $oneSubscriber->user_id = intval(JRequest::getVar('user_id', ''));
			 $oneSubscriber->name = JRequest::getVar('name', '');
			 $oneSubscriber->email = JRequest::getVar('email', '');
			 $oneSubscriber->receive_html = intval(JRequest::getVar('receive_html', 0));
			 $oneSubscriber->confirmed = intval(JRequest::getVar('confirmed', 0));
			 $oneSubscriber->blacklist = JRequest::getVar('blacklist', 0);
			 $oneSubscriber->timezone = JRequest::getVar('timezone', '');
			 $oneSubscriber->language_iso = JRequest::getVar('language_iso', '');
			 $oneSubscriber->params = JRequest::getVar('params', '');
			 //column
			 if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
				 $oneSubscriber->column1=JRequest::getVar('column1','');
				 $oneSubscriber->column2=JRequest::getVar('column2','');
				 $oneSubscriber->column3=JRequest::getVar('column3','');
				 $oneSubscriber->column4=JRequest::getVar('column4','');
				 $oneSubscriber->column5=JRequest::getVar('column5','');
			 }//end check of version pro
		} //endif

		if ($GLOBALS[ACA.'require_confirmation'] == '1') {
			$oneSubscriber->confirmed = 0;
		}

		$dontParse[] = 'params';
		jnewsletter::objectHTMLSafe( $oneSubscriber, ENT_QUOTES, $dontParse );
		$oneSubscriber->ip = subscribers::getIP();	//lala
        $oneSubscriber->subscribe_date = jnewsletter::getNow();

		//subscribers::_printscript();


	    $erro->ck = subscribers::insertSubscriber($oneSubscriber, $subscriberId);
	    $erro->Eck(__LINE__ , '8630');
		if ($GLOBALS[ACA.'require_confirmation'] == '1') {
			$erro->ck = jnewsletter_mail::sendConfirmationEmail($subscriberId);
		}
		if (!$erro->result) {
			if ($subscriberId<1) return false;
		} else {

			$subscriberId ='';
			$query = 'SELECT `id` FROM `#__jnews_subscribers` WHERE `email`= \'' . $oneSubscriber->email . '\'';
	     	$database->setQuery($query);
			$subscriberId = $database->loadResult();
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8631', $database );
		 }
		//aca_module::_printscript();
		return listssubscribers::updateOneSuscription($subscriberId);

	 }


	function insertSubscriber($subscriber, &$subscriberId) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			JFilterOutput::objectHTMLSafe( $subscriber );
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();


		$d['confirm'] = true;
		$d['email'] = $subscriber->email;

		if (empty($subscriber->ip)) $subscriber->ip = subscribers::getIP();
		if ($subscriber->ip == '0.0.0.0') $subscriber->ip = '0';

		$erro->ck = subscribers::getSubscriberIdFromEmail($d);
		if ($erro->Eck(__LINE__ , '8675')) {
			if ($d['subscriberId']<1) {
				$query = "INSERT INTO `#__jnews_subscribers` (`name`,`email` ,`ip`, `receive_html` , `confirmed` ";
				$query .= " , `subscribe_date` , `language_iso` , `timezone`, `blacklist` , `params`";
				//mary!column query
				if($GLOBALS[ACA.'type']=='PRO'){ //check if the version of jnewsletter is pro
				$query .= " , `column1`";
				$query .= " , `column2`";
				$query .= " , `column3`";
				$query .= " , `column4`";
				$query .= " , `column5`";
				}//endif for check version pro
				if(!empty($subscriber->user_id)){
					$query .= " , `user_id` ";
				}
				$query .= ") VALUES (" .
				 " '$subscriber->name' , " .
				 " '$subscriber->email' , " .
				  " '$subscriber->ip' , " .        //lala
				 " '$subscriber->receive_html' , " .
				 " '$subscriber->confirmed' , " .
				 " '$subscriber->subscribe_date', " .
				 " '$subscriber->language_iso', " .
				 " '$subscriber->timezone', " .
				 " '$subscriber->blacklist' , " ;
				 //" '$subscriber->params' , ".
				 if($GLOBALS[ACA.'type']!='PRO'){//check if the version is not pro 5.0.2
				 	$query .=" '$subscriber->params' ";
				 }//end check of pro version
				//mary!
				if($GLOBALS[ACA.'type']=='PRO'){//check if the version is pro 5.0.2}
				 $query .=" '$subscriber->params' , ".
				  " '$subscriber->column1',  ".
				  " '$subscriber->column2',  ".
				  " '$subscriber->column3',  ".
				  " '$subscriber->column4',  ".
				  " '$subscriber->column5' ";
				}//endif for check version

				if(!empty($subscriber->user_id)){
					$query .= " , ".intval($subscriber->user_id);
				}
				$query .= ")" ;
				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();

				$d['email'] = $subscriber->email;
				if ($erro->E(__LINE__ , '8615', $database )) {
					$erro->ck = subscribers::getSubscriberIdFromEmail($d);
					$erro->Eck(__LINE__ , '8657');

					$d['confirm'] = false;
					$xf->plus('totalsubcribers0', 1);
					$xf->plus('act_totalsubcribers0', 1);
				}
			}
		}
		if ($d['subscriberId']>0) $subscriberId = $d['subscriberId'];
		else $subscriberId = 0;
		return $erro->R();
	 }


	function updateOneSubscriber($userId=0, $user=null, $confirmed='0' ) {
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		 $oneSubscriber = '';


		if ( ACA_CMSTYPE ) {	// joomla 15
			 $oneSubscriber->name = JRequest::getVar('name', '');
			 $oneSubscriber->receive_html = intval(JRequest::getVar('receive_html',0));
			 $oneSubscriber->confirmed = intval(JRequest::getVar('confirmed', 0));
			 $oneSubscriber->blacklist = JRequest::getVar('blacklist', 0);
			 $oneSubscriber->timezone = JRequest::getVar('timezone', '');
			 $oneSubscriber->language_iso = JRequest::getVar('language_iso', '');
			 $oneSubscriber->params = JRequest::getVar('params', '');
			 $oneSubscriber->email = JRequest::getVar('email', '');
			 //update column 1
			 if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is 5.0.2}
				 $oneSubscriber->column1 = JRequest::getVar('column1', '');
				 $oneSubscriber->column2 = JRequest::getVar('column2', '');
				 $oneSubscriber->column3 = JRequest::getVar('column3', '');
				 $oneSubscriber->column4 = JRequest::getVar('column4', '');
				 $oneSubscriber->column5 = JRequest::getVar('column5', '');
			 }//endif for check version of pro 5.0.2
		} //endif


		 if ( isset($user) ) {
			$oneSubscriber->email = $user->email;
			if ( empty($oneSubscriber->email) OR !subscribers::validEmail($oneSubscriber->email)) {
				echo '<br />'.jnewsletter::printM('red' , _ACA_EMAIL_INVALID );
				echo "<script> alert('".addslashes(_ACA_EMAIL_INVALID)."'); window.history.go(-1);</script>\n";
				return false;
			}
			$oneSubscriber->user_id = $user->id;
		 	$oneSubscriber->id = subscribers::getSubscriberIdFromUserId($user->id);
			$subscriberId = $oneSubscriber->id;
			if(!empty($user->name)){
				$oneSubscriber->name = $user->name;
			}

			if($oneSubscriber->confirmed OR $confirmed) $oneSubscriber->confirmed = 1;
			if(isset($user->receive_html)){
				$oneSubscriber->receive_html = $user->receive_html;
			}

		 } elseif ($userId!=0) {
			$oneSubscriber->user_id = $userId;
			$subscriberId = subscribers::getSubscriberIdFromUserId($userId);
		 	$oneSubscriber->id = $subscriberId;
		 } else {
			if ( ACA_CMSTYPE ) {	// joomla 15
				 $oneSubscriber->user_id = intval(JRequest::getVar('id', ''));
				 $subscriberId = intval(JRequest::getVar('subscriber_id', 0));
			} //endif
			 $oneSubscriber->id = $subscriberId;
		 }

		$dontParse[] = 'params';
		jnewsletter::objectHTMLSafe( $oneSubscriber, ENT_QUOTES, $dontParse );
	    $erro->ck = subscribers::updateSubscriber($oneSubscriber, $subscriberId);
		$erro->Eck(__LINE__ , '8635');
	    if ($erro->ck) {

			$erro->ck = listssubscribers::updateOneSuscription($subscriberId);
			$erro->Eck(__LINE__ , '8636');
		 }
		return $erro->R();
	 }



	 function updateSubscribers( $force=false, $install=false ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$time = ( isset($GLOBALS[ACA.'last_sub_update']) && $GLOBALS[ACA.'last_sub_update']>0 ) ? $GLOBALS[ACA.'last_sub_update'] : 200000;
		$newTask= mktime(date("H")-1, date("i"), date("s"), date("m"), date("d"),  date("Y"));

		if ( $force OR ( $newTask > $GLOBALS[ACA.'last_sub_update'] ) ) {

			$query = 'UPDATE IGNORE `#__jnews_subscribers` as S LEFT JOIN `#__users` AS U ON U.`id` = S.`user_id` SET S.`name` = U.`name`, S.`email` = U.`email`, S.`confirmed` = 1 - U.`block`  WHERE U.`id` > 0 AND S.`user_id` > 0';
			$database->setQuery($query);
			$database->query();

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$xf = new xonfig();
			$newtime= mktime(date("H", $time), date("i", $time), date("s", $time), date("m", $time), date("d", $time)-2 ,  date("Y", $time));
			if ( $install ) $newtime=0;
			$oneDay = date( 'Y-m-d H:i:s', $newtime );

		    $query = 'SELECT M.* FROM `#__users` AS M ' .
		    		' LEFT JOIN `#__jnews_subscribers` AS N ON M.email = N.email ';
	    	$query .= ' WHERE M.registerDate > \'' . $oneDay .'\'';
	    	$query .= ' AND  N.id IS NULL AND M.block=0 ';

		    $database->setQuery($query);
		    $rows = $database->loadObjectList();
		    $erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8638', $database );

		    if ($erro->result AND !empty($rows)) {
			   foreach ($rows as $row) {
		 			$query = "INSERT INTO `#__jnews_subscribers` (`user_id`,`subscribe_date`, `name`,`email`,`confirmed`)";
		 			$query .= " VALUES ( $row->id , '$row->registerDate', '".addslashes($row->name)."', '".addslashes($row->email)."' , 1 ) ";
				    $database->setQuery($query);
		   		 	$database->query();
				    $erro->err = $database->getErrorMsg();
					$xf->plus('totalsubcribers0', 1);
					$xf->plus('act_totalsubcribers0', 1);

			     	$lists = lists::getLists(0, 0, null, '', true, false, false);

			     	if (!empty($lists)) {
					   foreach ($lists as $list) {
						   	 $qid[0] = subscribers::getSubscriberId($row->registerDate);
						   	 $subscriber = subscribers::getSubscribersFromId($qid, false);
						   	 $subId = array();
						   	 if ( isset($subscriber->id) ) {
							   	 $subId[0] =  $subscriber->id;
							   	 $erro->ck = queue::updateQueues($subId, '', $list->id, @$list->acc_id, true);
							   	 $erro->Eck(__LINE__ , '8640');
						   	 }
					   }
			     	}
		  	 	}
		    }

		    $query = 'SELECT M.* FROM `#__jnews_subscribers` AS M ' .
		    		' LEFT JOIN `#__users` AS N ON N.id = M.user_id ' ;

	    	$query .= ' WHERE N.registerDate > \'' . $oneDay .'\'';
	    	$query .= ' AND M.subscribe_date > \'' . $oneDay .'\'';
		    $query .= ' AND  N.id IS NULL  AND M.user_id>0 ORDER BY N.id ';
		    $database->setQuery($query);
		    $rows = $database->loadObjectList();

		    $erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8641', $database );
		    if ($erro->result AND !empty($rows)) {
			     foreach ($rows as $row) {
				    $query = 'DELETE FROM `#__jnews_subscribers` WHERE `id` = ' . $row->id;
		   		 	$database->setQuery($query);
			     	$database->query();
				    $erro->err = $database->getErrorMsg();
				    $erro->E(__LINE__ , '8643', $database );
					$xf->plus('act_totalsubcribers0', -1);


				   // $erro->ck = queue::deleteSubsQueue($row->id , '');
				    $erro->ck =listssubscribers::removeSubscription($row->id,'');
				    $erro->Eck(__LINE__ , '8644' );
		   		 }
		    }

		    $query = 'SELECT N.id, N.name , N.email , N.block  FROM `#__users` AS N ' .
		    		' LEFT JOIN `#__jnews_subscribers` AS M ON N.id = M.user_id ' ;

	    	$query .= ' WHERE  N.registerDate > \'' . $oneDay .'\'';
	    	$query .= ' AND M.subscribe_date > \'' . $oneDay .'\'';
	    	$query .= ' AND M.name != N.name  OR M.email != N.email OR N.block = M.confirmed ';

		    $database->setQuery($query);
		    $rows = $database->loadObjectList();

		    $erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8646', $database );
		    if ($erro->result AND !empty($rows)) {
			     foreach ($rows as $row) {
			    	if ($row->block ==1) $status=0; else $status=1;
				    $query = "UPDATE IGNORE `#__jnews_subscribers` SET `name` ='" .addslashes($row->name) ."' " .
				    		", `email` = '" .addslashes($row->email). "' " .
				    				", `confirmed` ='" .$status ."'  WHERE `user_id` = " . $row->id;
		   		 	$database->setQuery($query);
			     	$database->query();
				    $erro->err = $database->getErrorMsg();
		   		 }

		    }

		    $query = 'SELECT N.id , N.email FROM `#__users` AS N ' ;
		    $query .= 'LEFT JOIN `#__jnews_subscribers` AS M ON N.email = M.email ' ;

	    	$query .= ' WHERE N.registerDate > \'' . $oneDay .'\'';
	    	$query .= ' AND M.subscribe_date > \'' . $oneDay .'\'';
	    	$query .= ' AND M.user_id = 0 AND N.block = 0 ';

		    $database->setQuery($query);
		    $rows = $database->loadObjectList();
		    $erro->err = $database->getErrorMsg();
		    if ($erro->E(__LINE__ , '8662', $database ) AND !empty($rows)) {
			     foreach ($rows as $row) {
				    $query = "UPDATE `#__jnews_subscribers` AS S SET `user_id` = " .$row->id ;
				    $query .= " WHERE S.email = '$row->email'" ;
		   		 	$database->setQuery($query);
			     	$database->query();
				    $erro->err = $database->getErrorMsg();
		   		 }

		    }

			$xf->update('last_sub_update', time() );
			return $erro->R();
		}

	}


	 function syncSubscribers($onlyAdd = false) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();

		$query = 'UPDATE IGNORE `#__jnews_subscribers` as S LEFT JOIN `#__users` AS U ON U.`id` = S.`user_id` SET S.`name` = U.`name`, S.`email` = U.`email`, S.`confirmed` = 1 - U.`block` WHERE U.`id` > 0 AND S.`user_id` > 0';
		$database->setQuery($query);
		$database->query();

	    $query = 'SELECT M.* FROM `#__users` AS M ' .
	    		' LEFT JOIN `#__jnews_subscribers` AS N ON M.email = N.email ' .
	    		' WHERE N.id IS NULL AND M.block=0 AND M.registerDate<>\'0000-00-00 00:00:00\' ';

	    $database->setQuery($query);
	    $rows = $database->loadObjectList();
	    $erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ , '8638', $database );
	    if ($erro->result AND !empty($rows)) {
		   foreach ($rows as $row) {
	 			$query = "INSERT INTO `#__jnews_subscribers` (`user_id`,`subscribe_date`, `name`,`email`,`confirmed`)";
	 			$query .= " VALUES ( $row->id , '$row->registerDate', '".addslashes($row->name)."', '".addslashes($row->email)."' , 1 ) ";
			    $database->setQuery($query);
	   		 	$database->query();
			    $erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ , '8639', $database );

				$xf->plus('totalsubcribers0', 1);
				$xf->plus('act_totalsubcribers0', 1);


		     	$lists = lists::getLists(0, 0, null, '', true, false, false);


		     	if (!empty($lists)) {
				   foreach ($lists as $list) {

					   	 $qid[0] = subscribers::getSubscriberId($row->registerDate);
					   	 $subscriber = subscribers::getSubscribersFromId($qid, false);

					   	 $subId = array();
					   	 $subId[0] =  $subscriber->id;
					   	 $erro->ck = queue::updateQueues($subId, '', $list->id, @$list->acc_id, true);
					   	 $erro->Eck(__LINE__ , '8640');
				   }
		     	}
	  	 	}

	    }

	    if($onlyAdd) return true;


	    $query = 'SELECT M.* FROM `#__jnews_subscribers` AS M ' .
	    		' LEFT JOIN `#__users` AS N ON N.id = M.user_id ' .
	    		' WHERE N.id IS NULL AND M.user_id>0 ';	// ORDER BY N.id
	    $database->setQuery($query);
	    $rows = $database->loadObjectList();
	    $erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ , '8641', $database );
	    if ($erro->result  AND !empty($rows)) {
		     foreach ($rows as $row) {
			    $query = 'DELETE FROM `#__jnews_subscribers` WHERE `id` = ' . $row->id;
	   		 	$database->setQuery($query);
		     	$database->query();
			    $erro->err = $database->getErrorMsg();
			    $erro->E(__LINE__ , '8643', $database );
				$xf->plus('act_totalsubcribers0', -1);


			    $erro->ck = queue::deleteSubsQueue($row->id , '');
			    $erro->Eck(__LINE__ , '8644' );
	   		 }

	    }


	    $query = 'SELECT N.id, N.name , N.email , N.block  FROM `#__users` AS N ' .
	    		' LEFT JOIN `#__jnews_subscribers` AS M ON N.id = M.user_id ' .
	    		' WHERE M.name != N.name  OR M.email != N.email OR N.block = M.confirmed';
	    $database->setQuery($query);
	    $rows = $database->loadObjectList();
	    $erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ , '8646', $database );
	    if ($erro->result AND !empty($rows)) {
		     foreach ($rows as $row) {
		    	if ($row->block ==1) $status=0; else $status=1;
			    $query = "UPDATE IGNORE `#__jnews_subscribers` SET `name` ='" .$row->name ."' " .
			    		", `email` = '" .$row->email. "' " .
			    				", `confirmed` ='" .$status ."'  WHERE `user_id` = " . $row->id;
	   		 	$database->setQuery($query);
		     	$database->query();
			    $erro->err = $database->getErrorMsg();
	   		 }

	    }



	    $query = 'SELECT N.id , N.email FROM `#__users` AS N ' ;
	    $query .= 'LEFT JOIN `#__jnews_subscribers` AS M ON N.email = M.email ' ;
	    $query .= ' WHERE M.user_id = 0 AND N.block = 0 ';
	    $database->setQuery($query);
	    $rows = $database->loadObjectList();
	    $erro->err = $database->getErrorMsg();
	    if ($erro->E(__LINE__ , '8662', $database ) AND !empty($rows)) {
		     foreach ($rows as $row) {
			    $query = "UPDATE `#__jnews_subscribers` AS S SET `user_id` = " .$row->id ;
			    $query .= " WHERE S.email = '$row->email'" ;
	   		 	$database->setQuery($query);
		     	$database->query();
			    $erro->err = $database->getErrorMsg();
	   		 }

	    }

	return $erro->R();
	}


	 function updateSubscriber($subscriber, &$subscriberId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			JFilterOutput::objectHTMLSafe( $subscriber );
		} //endif


		if(!isset($subscriber->params)){
			$subscriber->params = '';
		}
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if ($subscriber->id >0 ) {
		   	$query = "UPDATE `#__jnews_subscribers` SET ";
		   	if(!empty($subscriber->name)){
			$query .=" `name` = '$subscriber->name' , ";
		   	}
		   	if(!empty($subscriber->email)){
				$query .=" `email` = '$subscriber->email' , ";
		   	}

		   	//column1
		   	if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is 5.0.2}
			   	if(!empty($subscriber->column1)){
					$query .=" `column1` = '$subscriber->column1' , ";
			   	}
			   	if(!empty($subscriber->column2)){
					$query .=" `column2` = '$subscriber->column2' , ";
			   	}
				if(!empty($subscriber->column3)){
					$query .=" `column3` = '$subscriber->column3' , ";
			   	}
			   	if(!empty($subscriber->column4)){
					$query .=" `column4` = '$subscriber->column4' , ";
			   	}
			   	if(!empty($subscriber->column5)){
					$query .=" `column5` = '$subscriber->column5' , ";
			   	}
		   	}//endif for check version
			if($subscriber->receive_html>=0){
				$query.= " `receive_html` = $subscriber->receive_html  , ";
			}
			$query.= " `confirmed` =  $subscriber->confirmed  , " .
			" `timezone` = '$subscriber->timezone' , ";
			if(!empty($subscriber->language_iso)){
				$query.= " `language_iso` = '$subscriber->language_iso' , ";
			}
			if(isset($subscriber->blacklist)){
				$query.= " `blacklist` = $subscriber->blacklist , ";
			}
			$query .= " `params` = '$subscriber->params'  " .
			" WHERE `id` = $subscriber->id ";
	 		$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

		} else {
			$subscriber->ip = subscribers::getIP(); //lala
			$subscriber->subscribe_date = jnewsletter::getNow();
			$erro->ck = subscribers::insertSubscriber($subscriber, $subscriberId);
		  	$erro->Eck( __LINE__ , '7625' );
		}

      return $erro->R();
    }

	 function updateReceiveHtml($subscriberId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$htmlReceive =  intval(JRequest::getVar('receive_html',0));
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		if ($subscriberId >0 ) {
		   	$query = "UPDATE `#__jnews_subscribers` SET ".
			" `receive_html` = $htmlReceive " .
			" WHERE `id` = $subscriberId ";
	 		$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
		}

		return $erro->err;
    }

	 function deleteOneSubscriber($subscriberId) {

		 if (!subscribers::deleteSubscriber($subscriberId)) {
		      return false;
		 }  else {

			 //return queue::deleteSubsQueue($subscriberId , '');
			 return listssubscribers::removeSubscription($subscriberId , '');
		 }
	}



	 function deleteSubscriber($subId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'DELETE FROM `#__jnews_subscribers` WHERE `id` = ' . $subId;
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();

		if ($erro->E(__LINE__ , '8625', $database )) {
			$xf = new xonfig();
			$xf->plus('act_totalsubcribers0', -1);
		}
		return $erro->R();
		listssubscribers::removeSubscription($subId,'');
	 }


	function import($listId) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		@set_time_limit(0);
		@ini_set('memory_limit','128M');


		$queue = '';
		if ( ACA_CMSTYPE ) {	// joomla 15
			$queue->sub_list_id = JRequest::getVar('sub_list_id', '');
			$queue->subscribed = JRequest::getVar('subscribed', '');
			$queue->acc_level = JRequest::getVar('acc_level', 29);
		} //endif


		$path = ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'upload_url'];
		$filename = $_FILES['importfile']['name'];
		$path = str_replace(array('/','\\'),DS,$path);

		if (is_writable($path)) {
			if ( !@move_uploaded_file($_FILES['importfile']['tmp_name'], $path . $filename)) {
				$path .= DS;
				if ( !@move_uploaded_file($_FILES['importfile']['tmp_name'], $path . $filename)) {
					echo  _ACA_ERROR_MOVING_UPLOAD ;
					echo '<br/>Please make sure the path '.ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'upload_url'] . ' is writable';
				}
			}

			$import = file_get_contents($path . $filename);
			$import = str_replace(array("\r\n","\r"),"\n",$import);

			$array = explode("\n", $import);

			if (sizeof($array) > 0) {

				foreach ($array AS $row) {
					$row = trim($row);
					if (empty($row)) {
						continue;
					}

					$values = explode(',', $row);
					if(count($values) < 4){
						echo '<br />'.jnewsletter::printM('red' , $row.' : jNews needs 4 arguments for each user separated by a comma (,)' );
						continue;
					}
					$values[0] = trim($values[0]);
					$values[1] = trim($values[1]);
					$values[2] = trim($values[2]);
					$values[3] = trim($values[3]);
					$values[4] = trim($values[4]);
					$values[5] = trim($values[5]);
					$values[6] = trim($values[6]);
					$values[7] = trim($values[7]);
					$values[8] = trim($values[8]);
					$values[9] = trim($values[9]);

					if ( isset($values[1]) ) {
						$valid = subscribers::validEmail($values[1]);
						if (!$valid) {
							echo '<br />'.jnewsletter::printM('red' , $values[1] . ': ' . _ACA_EMAIL_INVALID );
							continue;
						} else {
							 $subscriber = null;
							 $values[0] = compa::encodeutf(trim($values[0]));
				 			 $subscriber->name = addslashes($values[0]);
				 			 $subscriber->email = $values[1];
				 			 $subscriber->ip  = '0.0.0.0'; //lala
				 			 $subscriber->receive_html  = (empty($values[2])) ? '0' : '1';
				 			 $subscriber->confirmed = ((($values[3]) == 1) AND $GLOBALS[ACA.'require_confirmation'] ) ? '0' : '1';//fix from a customer
				 			 $subscriber->subscribe_date  = jnewsletter::getNow();
				 			 $subscriber->language_iso  = 'eng';
				 			 $subscriber->timezone  = '00:00:00';
				 			 $subscriber->blacklist  = '0';
				 			 $subscriber->params  = '';
				 			 //column
				 			 if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro 5.0.2}
					 			 $subscriber->column1 = $values[4];
					 			 $subscriber->column2 = $values[5];
					 			 $subscriber->column3 = $values[6];
					 			 $subscriber->column4 = $values[7];
					 			 $subscriber->column5 = $values[8];
					 			 $subscriber->ip = $values[9];
				 			 }//endif check of pro version
				 			 $d['email'] = $subscriber->email;
				 			 $erro->ck = subscribers::getSubscriberIdFromEmail($d );
							$erro->Eck(__LINE__ , '8679');
				 			 $subscriberId = $d['subscriberId'];

				 			 if ($subscriberId<1) {
								$erro->ck = subscribers::insertSubscriber($subscriber, $subscriberId);
								$erro->Eck(__LINE__ , '8650');
				 			 }
							if (!$erro->ck) {
								echo '<br />'.jnewsletter::printM('red' , $values[0] . ': ' . _ACA_SUBCRIBER_EXIT );
							} else {
								if (!empty($queue->subscribed) and $subscriberId>0) {
									$queue->user_id = $subscriberId;
									$erro->ck = listssubscribers::updateSuscription($queue);
									$erro->Eck(__LINE__ , '8651');

									if ($GLOBALS[ACA.'require_confirmation'] == '1' AND $values[3]== 0) {//fix from the customer
										$listIds = array();
										$size = sizeof($queue->sub_list_id);
										for ($index = 0; $index < $size; $index++) {
											if (isset($queue->subscribed[$index])) {
												if ($queue->subscribed[$index]>0) $listIds[]= $queue->sub_list_id[$index];
											}
										}
										$erro->ck = jnewsletter_mail::processConfirmationEmail($subscriberId, $listIds);
										$erro->Eck(__LINE__ , '8652');
									}
									if ($erro->ck) {
										echo '<br />'.jnewsletter::printM('green' , $values[0] . ': ' . _ACA_IMPORT_SUCCESS );
									} else {
										echo '<br />'.jnewsletter::printM('blue' , $values[0] . ': ' . _ACA_PB_QUEUE);
									}
								}
							}
						}
					}
				}
				return true;
			}

			$erro->ck = unlink($path . $filename);
			$erro->Eck(__LINE__ , '8655');
			if (!$erro->ck) {
				echo  _ACA_DELETION_OFFILE . ' ' . $path . $filename . ' ' . _ACA_MANUALLY_DELETE . '.</p>';
			}
		} else {
			echo  _ACA_CANNOT_WRITE_DIR . ' ' . $path . '</p>';
			return false;
		}

	 }


	 function export($listId) {

			$doShowSubscribers = false;
			@set_time_limit(0);
			@ini_set('memory_limit','128M');

			if (ereg('Opera(/| )([0-9].[0-9]{1,2})', $HTTP_USER_AGENT)) {
				$UserBrowser = 'Opera';
			} elseif (ereg('MSIE ([0-9].[0-9]{1,2})', $HTTP_USER_AGENT)) {
				$UserBrowser = 'IE';
			} else {
				$UserBrowser = '';
			}

			$mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ? 'application/octetstream' : 'application/octet-stream';
			$filename = "subscribers_list_" .$listId. "_" . date("Y.d.m");

			ob_end_clean();
			ob_start();

			$subscribers = subscribers::getSubscribers(-1,  -1, '', $total, $listId, '', 1 , 1, 'name');

	        // header of the imported file
			//$export = 'Name,Email,ReceiveHTML,Confirmed'."\r\n";
			foreach ($subscribers AS $subscriber) {

				if(get_magic_quotes_runtime()) {
					$subscriber->name = stripslashes($subscriber->name);
					$subscriber->email = stripslashes($subscriber->email);
				}
				$export .= $subscriber->name . '' ;
				$export .= ',' . $subscriber->email . '' ;
				$export .= ',' . $subscriber->receive_html . '' ;
				$export .= ',' . $subscriber->confirmed . '';
				//export column1 - column5
				$export .= ','. $subscriber->column1 . '' ;
				$export .= ','. $subscriber->column2 . '' ;
				$export .= ','. $subscriber->column3 . '' ;
				$export .= ','. $subscriber->column4 . '' ;
				$export .= ','. $subscriber->column5 . '' ;
				$export .= ','. $subscriber->ip . "\r\n" ;
			}

			header('Content-Type: ' . $mime_type);
			header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');

			if ($UserBrowser == 'IE') {
				header('Content-Disposition: inline; filename="' . $filename . '.csv"');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
			} else {
				header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
				header('Pragma: no-cache');
			}

			print $export;
			exit();
			return true;
	 }


	 function updateUserstojNews( $force=false ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$time = ( isset($GLOBALS[ACA.'last_sub_update']) && $GLOBALS[ACA.'last_sub_update']>0 ) ? $GLOBALS[ACA.'last_sub_update'] : 10000;
		$newTask= mktime(date("H")-1, date("i"), date("s"), date("m"), date("d")-1 ,  date("Y"));

		if ( $force OR ( $newTask > $GLOBALS[ACA.'last_sub_update'] ) ) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$xf = new xonfig();

			$newtime= mktime(date("H", $time)-1, date("i", $time), date("s", $time), date("m", $time), date("d", $time) ,  date("Y", $time));
			$oneDay = date( 'Y-m-d H:i:s', $newtime );

		    $query = 'SELECT M.* FROM `#__users` AS M ' .
		    		' LEFT JOIN `#__jnews_subscribers` AS N ON M.email = N.email ';

	    	$query .= ' WHERE M.registerDate > \'' . $oneDay .'\'';
	    	$query .= ' AND  N.id IS NULL AND M.block=0 ';

		    $database->setQuery($query);
		    $rows = $database->loadObjectList();

		    $erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8638', $database );

		    if ($erro->result AND !empty($rows)) {
			   foreach ($rows as $row) {
		 			$query = "INSERT INTO `#__jnews_subscribers` (`user_id`,`subscribe_date`, `name`,`email`,`confirmed`)";
		 			$query .= " VALUES ( $row->id , '$row->registerDate', '$row->name', '$row->email' , 1 ) ";
				    $database->setQuery($query);
		   		 	$database->query();
				    $erro->err = $database->getErrorMsg();

					$xf->plus('totalsubcribers0', 1);
					$xf->plus('act_totalsubcribers0', 1);


			     	$lists = lists::getLists(0, 0, null, '', true, false, false);


			     	if (!empty($lists)) {
					   foreach ($lists as $list) {

						   	 $qid[0] = subscribers::getSubscriberId($row->registerDate);
						   	 $subscriber = subscribers::getSubscribersFromId($qid, false);

						   	 $subId = array();
						   	 $subId[0] =  $subscriber->id;
						   	 $erro->ck = queue::updateQueues($subId, '', $list->id, @$list->acc_id, true);
						   	 $erro->Eck(__LINE__ , '8640');
					   }
			     	}
		  	 	}

		    }
		}
	 }



	 function checkValidKey($subscriberId, $cle) {

		$qid[0] = $subscriberId;
		$subscriber = subscribers::getSubscribersFromId($qid, false);
		if (md5($subscriber->email)==$cle) return true; else return false;

	 }


	 function validEmail($email,$fullCheck = false) {
		if(!preg_match("/^[a-z0-9]([a-z0-9_+\-\.])*@([a-z0-9\-]+\.)+[a-z]{2,7}$/i", $email)) return false;

		if(!$fullCheck OR !$GLOBALS[ACA.'fullcheck']) return true;

		// gets domain name
		list($user,$domain)=split('@',$email);

		// checks for if MX records in the DNS
		//This function does not exist on windows... that's why there is a check first
		//We need to add a dot at the end of the domain name
		if(function_exists('checkdnsrr') AND !checkdnsrr($domain.'.', 'MX')) {
			return false;
		}

		return true;
	 }

	 //function to get the ip of the user //lala
	function getIP(){
		$ip = '';
		if( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) AND strlen($_SERVER['HTTP_X_FORWARDED_FOR'])>6 ){
	        $ip = strip_tags($_SERVER['HTTP_X_FORWARDED_FOR']);
	    }elseif( !empty($_SERVER['HTTP_CLIENT_IP']) AND strlen($_SERVER['HTTP_CLIENT_IP'])>6 ){
			 $ip = strip_tags($_SERVER['HTTP_CLIENT_IP']);
		}elseif(!empty($_SERVER['REMOTE_ADDR']) AND strlen($_SERVER['REMOTE_ADDR'])>6){
			 $ip = strip_tags($_SERVER['REMOTE_ADDR']);
	    }//endif
		return strip_tags($ip);

	}//endfct get IP


	function getListOfSubscribers( $orderBy, $limit=100 )
	{
		static $database=null;
		if( !isset( $database ) ) $database =& JFactory::getDBO();

		$query = "SELECT `name`, `email` FROM `#__jnews_subscribers` ORDER BY `". $orderBy ."` LIMIT ". $limit;
		$database->setQuery( $query );
		$resultA = $database->loadObjectList();

		return $resultA;
	} //endfct


	function getSubscribersCount( $listId=0 )
	{
		static $database=null;
		if( !isset( $database ) ) $database =& JFactory::getDBO();

		$query = "SELECT count(`A`.`id`) FROM `#__jnews_subscribers` AS `A`";
		if( !empty($listId) ) $query .= " LEFT JOIN `#__jnews_listssubscribers` AS `B` ON `A`.`id` = `B`.`subscriber_id` WHERE `B`.`list_id` = ". $listId;

	    	$database->setQuery( $query );
	    	$result = $database->loadResult();

	    	$result = ( !empty($result) ) ? $result : $result;
	    	return $result;
	} //endfct

 } //endclass
