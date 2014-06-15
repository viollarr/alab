<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class queue {

	 //Used by mailings.jnewsletter
	 //Checking by eve
	 function sendNewsletter( $showHTML, $mailingId, $listId, $receivers, &$message , $tags = null) {

		$list = lists::getOneList($listId);
		$mailing = xmailing::getOneMailing($list, $mailingId, '', $new, true);

		//xmailing::_header('', '', $list->list_type , '', '');
		$check = jnewsletter_mail::send($showHTML ,$mailing, $receivers, $list, $message , $tags );
		if ($check) xmailing::updateNewsletterSent($mailingId);

		return 	$check;
	 }

	 //To be transfer
	 //Used by class.lists
	 //Used by class.mailings
	 function getAllOneList($listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ($listId>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_queue` WHERE `list_id`='.$listId.' ORDER BY `qid` ';
			$database->setQuery($query);
			$queue = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();
			return $erro->Ertrn( __LINE__ , '8501', $database, $queue );
       }
	 }

	//Used by class.jmail
	 function whatQID( $mailingId, $subId, $lisType ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ( $mailingId>0 AND $subId>0 ) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `qid` FROM `#__jnews_queue` WHERE `mailing_id`='.$mailingId;
			$query .= ' AND `subscriber_id`='.$subId;
			$query .= ' AND `type`='.$lisType;
			if ($lisType=='1') $query .= ' AND `published`=2';
			$database->setQuery($query);
			$qid = $database->loadResult();
			$erro->err = $database->getErrorMsg();

			return $erro->Ertrn( __LINE__ , '8555', $database, $qid );
       }
	 }

	 //Used by class.auto
	 function getQueueFromMailingId($mailingId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ($mailingId>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_queue` WHERE `mailing_id`='.$mailingId.' ORDER BY `qid` ';
			$database->setQuery($query);
			$queues = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();

			return $erro->Ertrn( __LINE__ , '8502', $database, $queues );
		} else {
			return '';
		}
	 }


	 //Used by class.queue
	 function getValidMailing(&$list, $mailingId) {

		$listId = $list->id;
		$ready = false;
	     do {
				if ($mailingId<1) {
					$mailingId = xmailing::getFirstMailingId($listId);
					if (empty($mailingId)) return '';
				}

				$mailing = xmailing::getOneMailing('', $mailingId, '', $new);
				if (!empty($mailing)) {
					if ($mailing->published == 1) {
						$newMailing = $mailing;
						$ready = true;
					} else {
						$newIssueNb = $mailing->issue_nb;
						$noMoreMailing = false;
						do {
								$newIssueNb++;
								$newMailing = xmailing::getQuickMailingIssue($listId, $newIssueNb, $total);
								if (empty($newMailing)) {
									$noMoreMailing = true;
									$newMailing->published = 0;
								}
						} while ( ($newMailing->published <> 1) AND ($newIssueNb < $total ) AND ($noMoreMailing == false) );

						if ((( $newIssueNb == $total) AND ($newMailing->published <> 1)) OR ($noMoreMailing == true)) {

							if ($list->follow_up > 0  AND $list->list_type=='2' ) {
								$list = lists::getOneList($list->follow_up);
								if (!empty($list)) {
									if ($list->list_type == 2) {
										$mailingId = xmailing::getFirstMailingId($list->id);
									} else {
										$newMailing = '';
										$newMailing->list_type = 1;
										$newMailing->list_id = $list->id;
							           	$ready = true;
									}
								} else {
					           	$newMailing = '';
								$ready = true;
								}
							} else {
					           	$newMailing = '';
								$ready = true;
							}
						} else {

							$ready = true;
						}
					}
				} else {
					$ready = true;
					$newMailing = '';
				}
	    } while (!$ready);

      return $newMailing;
	 }

	//Used by class.lists
	//Used by class.mailing
	 function updateQueues($subId, $qids, $listId, $acc_level, $new) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$list = lists::getOneList($listId);
		$newQueue = null;
		$total=0;
		if ($list->list_type == 1) {
	        if ($new) {
	            	if (!empty($subId)) {
	            		$erro->ck = queue::insertQueuesForNews($subId, $listId, $acc_level);
						$erro->Eck(__LINE__ , '8504' );
	            	} else {

					if ( !empty($qids) ) {
						$qid = implode( ',' , $qids );
						$query = 'SELECT `subscriber_id` FROM `#__jnews_queue` WHERE `qid` IN ( '.$qid.' ) ' ;
						$database->setQuery($query);
						$subIds = $database->loadObjectList();
						$erro->err = $database->getErrorMsg();
			       }
						foreach ($subIds as $v ) {
							$subId[]=$v->subscriber_id;
						}
	            		$erro->ck = queue::insertQueuesForNews($subId, $listId, $acc_level);
						$erro->E(__LINE__ , '8505' );
	            	}
	        } else {
	            	if (!empty($subId)) {
	            		//possible to be replaced by updateListsSubsData by eve
						$erro->ck = queue::updateQueueData('', $subId, 0, $listId, 0, 0, 0, 0, $acc_level, 0);
						$erro->Eck(__LINE__ , '8506' );
	            	} elseif (!empty($qids)) {
	            		//possible to be replaced by updateListsSubsData by eve
	            		$erro->ck = queue::updateQueueData($qids , '', 0, $listId, 0, 0, 0, 0, $acc_level, 0);
						$erro->Eck(__LINE__ , '8507' );
	            	}
	        }
		} elseif ($list->list_type == 7) {
          //	elseif ($list->)
    		$newQueue->list_id = $list->id;
    		$newQueue->mailing_id = 0;
    		$newQueue->issue_nb = 0;
    		//$newQueue->send_date = 0; commented by eve
    		$newQueue->send_date = jnewsletter::getNow();
    		$newQueue->delay = 0;
    		$newQueue->acc_level = $acc_level;
    		$newQueue->published = $list->published;
    		$erro->ck = autonews::insertQueuesForAutoNews($subId, $newQueue);
			$erro->Eck(__LINE__ , '8508' );
		} else {
		        if ($new) {
		            	if (!empty($subId)) {
		            		$mailingId = 0;
		            		$mailing = queue::getValidMailing($list, $mailingId);

		            		if (!empty($mailing)) {
								if (class_exists('auto')) {
			            			if ($mailing->mailing_type == 2) {
					            		$newQueue->list_id = $mailing->list_id;
					            		$newQueue->mailing_id = $mailing->id;
					            		$newQueue->issue_nb = $mailing->issue_nb;
/*commented by mary*/			   		$newQueue->send_date = jnewsletter::getNow($mailing->delay);
/*added by mary						$newQueue->send_date = time($mailing->delay);*/
					            		$newQueue->delay = $mailing->delay;
					            		$newQueue->acc_level = $acc_level;
					            		$newQueue->published = $list->published;
					            		$erro->ck = auto::insertQueuesForAuto($subId, $newQueue);
										$erro->Eck(__LINE__ , '8508' );
			            			}	else {
			            				$erro->ck = queue::insertQueuesForNews($subId, $mailing->list_id, $acc_level);
										$erro->Eck(__LINE__ , '8509' );
			            			}
		            			}
		            		} else {
								if (class_exists('auto')) {
				            		$newQueue->list_id = $list->id;
				            		$newQueue->mailing_id = 0;
				            		$newQueue->issue_nb = 0;
				            		$newQueue->send_date = 0;
				            		$newQueue->delay = 0;
				            		$newQueue->acc_level = $acc_level;
				            		$newQueue->published = $list->published;
				            		$erro->ck = auto::insertQueuesForAuto($subId, $newQueue);
									$erro->Eck(__LINE__ , '8510' );
		            			}
		            		}
		            	} elseif (!empty($qids)) {
		            		//On récupére le premier mail du follow up
		            		$mailingId = xmailing::getFirstMailingId($listId);

		            		if (!empty($mailingId)) {

		            			$mailing = queue::getValidMailing($list, $mailingId);
			            		if (!empty($mailing)) {
			            			if ($mailing->mailing_type == 2) {
					            		//$subscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , $listId, '', 1, 1,'' );
	      								//$subId = jnewsletter::convertObjectToIdList($subscribers , 'id');
										if (!empty($subId)) {
											//possible to be replaced by updateListsSubsData by eve
						      				$erro->ck = queue::updateQueueData( '', $subId, $mailing->mailing_type, $listId, $mailing->id, $mailing->issue_nb, 0, $mailing->delay, 0, 1);
											$erro->Eck(__LINE__ , '8511' );
										}else{
											//possible to be replaced by updateListsSubsData by eve
											$erro->ck = queue::updateQueueData( $qids, '', $mailing->mailing_type, $listId, $mailing->id, $mailing->issue_nb, 0, $mailing->delay, 0, 1);
											$erro->Eck(__LINE__ , '8511' );
										}
			            			}	else {

					            		$subscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , $listId, '', 1, 1,'' );
	      								$subId = jnewsletter::convertObjectToIdList($subscribers , 'id');
			            				$erro->ck = queue::insertQueuesForNews($subId, $mailing->list_id, $acc_level);
										$erro->Eck(__LINE__ , '8512' );
			            			}
			            		}
		            		}
		            	}
		        } else {
		            	if (!empty($subId)) {
							$mailing = queue::getValidMailing($list, 0);
							//possible to be replaced by updateListsSubsData by eve
							if (!empty($mailing)) $erro->ck = queue::updateQueueData( '', $subId, $list->list_type , $listId, '', '', 0, '', 0, $list->published );
							//possible to be replaced by updateListsSubsData by eve
							else $erro->ck = queue::updateQueueData('', $subId, $mailing->mailing_type, $mailing->list_id,
/*commented by mary*/		$mailing->id, $mailing->issue_nb, jnewsletter::getNow(), $mailing->delay, $acc_level, $mailing->published);
/*replaced by mary		$mailing->id, $mailing->issue_nb, time(), $mailing->delay, $acc_level, $mailing->published);*/
							$erro->E(__LINE__ , '8513' );
		            	} elseif (!empty($qids)) {
		            			$mailing = queue::getValidMailing($list, 0);
			            		if (!empty($mailing)) {
			            			if ($mailing->mailing_type == 2) {
			            				//possible to be replaced by updateListsSubsData by eve
			            				$erro->ck = queue::updateQueueData( $qids, '', $list->list_type , $listId, $mailing->id, $mailing->issue_nb, jnewsletter::getNow(), $mailing->delay, 0, 1);
										$erro->E(__LINE__ , '8514' );
			            			}	else {

			            				$subId = jnewsletter::convertObjectToIdList($qids , 'subscriber_id');
			            				$erro->ck = queue::deleteQueues($qids);
										$erro->Eck(__LINE__ , '8515' );
			            				$erro->ck = queue::insertQueuesForNews($subId, $mailing->list_id, $acc_level);
										$erro->Eck(__LINE__ , '8516' );
			            			}
			            		}
		            	}
		        }
		}
      return $erro->R();
	 }

	//Used by class.queue
	 function updateAccessLevel($queue) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($queue) and !empty($queue->acc_level) and !empty($queue->qid)) {
		   $query = 'UPDATE `#__jnews_queue` SET
		 			`acc_level` = ' . $queue->acc_level . '
		 			WHERE `qid` = ' . $queue->qid . ';';
	 	  $database->setQuery($query);
		  $database->query();
		  $erro->err = $database->getErrorMsg();
		}

		return $erro->E(__LINE__ , '8525', $database );

	 }


	//Used by class.frontend

	 function updateSuspend($qid, $value) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($qid)) {
			$qids = implode (',', $qid);
		    $query = "UPDATE `#__jnews_queue` SET `suspend` =". $value . " WHERE `qid` IN ( $qids ) ";
		    if ($value == 0) $query .= " AND `suspend` =1"; else $query .= " AND `suspend` =0";

	 	  	$database->setQuery($query);
		  	$database->query();
		  	$erro->err = $database->getErrorMsg();

			return $erro->E(__LINE__ , '8527', $database );
		}
	    return true;
	 }

	//Used by class.lists
	 function updatePublished($qid, $value=0) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($qid)) {
			$qids = implode (',', $qid);
			$textVal = ($value) ? '1' : '0';
		    $query = "UPDATE `#__jnews_queue` SET `published` = '$textVal' WHERE `qid` IN ( $qids ) ";
	 	  	$database->setQuery($query);
		  	$database->query();
		  	$erro->err = $database->getErrorMsg();

			return $erro->E(__LINE__ , '8529', $database );
		 }
	    return true;
	 }

	 //Used by class.queue
	 //Used by class.auto
	 function updateQueueData($qid, $subsId, $type, $listId, $mailingId, $issue, $date, $delay, $accLevel, $published) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($qid) OR !empty($subsId)) {
			$query = 'UPDATE `#__jnews_queue` SET ';
			$query .= ' `type` = ' . $type . ',';

			//added by mary
			/*$query2= 'SELECT `list_id` from `#__jnews_listmailings` where `mailing_id`='. $mailingId;
			$database->setQuery($query);
			$database->query();
			$listResult=$database->loadResult();

			//$query .= ' `list_id` = ' . $listId . ',';
			$query .= '`list_id` = '. $listResult;*/
			if (!empty($mailingId)) $query .= ' `mailing_id` = ' . $mailingId . ',';
			if (!empty($date)) $query .= ' `send_date` = \'' . $date . '\', ' ;
			if (!empty($delay)) $query .= ' `delay` = ' . $delay . ' ,';
			if (!empty($issue)) $query .= ' `issue_nb` = ' . $issue . ' , ' ;
		 	if ($accLevel <>0)	$query .= '	`acc_level` = ' . $accLevel . ' ,' ;
		 	$query .= '	`published` = ' . $published;

			if (!empty($qid)) {
				$qids = implode (',', $qid);
			    $query .= ' WHERE `qid` IN ( '.$qids.' ) ';
			} else {
				$subsIds = implode (',', $subsId);
				if ($mailingId>0) {
					$query .= ' WHERE `subscriber_id` IN ( '.$subsIds.' ) AND `mailing_id` ='.$mailingId;
				} else {
/*commented by*/	//$query .= ' WHERE `subscriber_id` IN ( '.$subsIds.' ) AND `list_id` ='.$listId;	//wala nay list_id sa queue
/*added by mary*/	$query .=' WHERE `subscriber_id` IN ( '.$subsIds.' )';
				}
			}
	 	 	$database->setQuery($query);
			if(!$database->query() AND !empty($qid)){
				queue::deleteQueues($qid);
			}
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8532', $database );
		}
		return $erro->R();
	 }

	//To be transfer
	//Used by class.mailing
	 function update_subs_to_mailing($list_id, $mailing_id, $date, $issue, $acc_level) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$query = 'UPDATE `#__jnews_queue` SET ';
		if (!empty($date))   $query .= ' `send_date` = \'' . $date . '\', ' ;
		if (!empty($issue))  $query .= ' `issue_nb` = ' . $issue . ', ' ;
	 	if ($acc_level != 0) $query .= ' `acc_level` = ' . $acc_level . ', ' ;

	 	$query .= '	`published` = 2 ';

	 	if ($mailing_id > 0) {
			$query .= ' WHERE `mailing_id` ='.$mailing_id;
		} else {
		    return true;
		}

		$database->setQuery($query);
	 	$database->query();

	 	$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ , '8532', $database );

		return $erro->R();
	 }

	//Used by class.jnewsletter.php
	//And class.queue.php
	 function insertQueuesForNews($subId, $listId, $acc_level ) {
	 $mailing_ids=array();
	 $mailing_ids=xmailing::getListMailing( $listId );
	 $status = true;


	if(is_array($subId))
	{
		for ($k=0 ;$k < count($subId); $k++)
		 {

	 		if(is_array($mailing_ids))
	 		{
					for($i=0;$i<sizeOf($mailing_ids);$i++)

					{
				            $queue = new stdClass;
				            $queue->id = 0;
				            $queue->subscriber_id = $subId[$k];
				            $queue->list_id = $listId;
				            $queue->type = 1;
				            $queue->mailing_id = $mailing_ids[$i];
	 						$queue->send_date = xmailing::getSendDate($mailing_ids[$i]); //gicomment nko
				            $queue->suspend = 0;
				            $queue->delay = 0;
				            $queue->acc_level = $acc_level;
				            $queue->issue_nb = 0;
				            $queue->published = 0;
				            $queue->params = '';
				      //********** Added by Grace
							$queue->priority = 0;
							$queue->attempt = 0;
					//**************************

				            queue::insert($queue);
							}
							$subscriber=null;
					        $subscriber->list_id=$listId;
					        $subscriber->id=$subId[$k];
					        listssubscribers::insertToListSubscribers($subscriber);

					 }
					 else{
					 	$queue = new stdClass;
			            $queue->id = 0;
			            $queue->subscriber_id = $subId[$k];
			            $queue->list_id = $listId;
			            $queue->type = 1;
 			            $queue->mailing_id = $mailing_ids;
						$queue->send_date = xmailing::getSendDate($mailing_ids);
			            $queue->suspend = 0;
			            $queue->delay = 0;
			            $queue->acc_level = $acc_level;
			            $queue->issue_nb = 0;
			            $queue->published = 0;
			            $queue->params = '';
						$queue->priority = 0;
						$queue->attempt = 0;
						$subscriber=null;
				        $subscriber->list_id=$listId;
				        $subscriber->id=$subId[$k];
				        listssubscribers::insertToListSubscribers($subscriber);
			            queue::insert($queue);

					 }
			 	}
	 	}else{
			if(is_array($mailing_ids)){
					for($i=0;$i<sizeOf($mailing_ids);$i++){
				            $queue = new stdClass;
				            $queue->id = 0;
				            $queue->subscriber_id = $subId;
				            $queue->list_id = $listId;
				            $queue->type = 1;
				            $queue->mailing_id = $mailing_ids[$i];
							$queue->send_date = xmailing::getSendDate($mailing_ids[$i]);
				            $queue->suspend = 0;
				            $queue->delay = 0;
				            $queue->acc_level = $acc_level;
				            $queue->issue_nb = 0;
				            $queue->published = 0;
				            $queue->params = '';
				     	    //********** Added by Grace
							$queue->priority = 0;
							$queue->attempt = 0;
							//**************************
 				            queue::insert($queue);
					}
					$subscriber=null;
					$subscriber->list_id=$listId;
					$subscriber->id=$subId;
					listssubscribers::insertToListSubscribers($subscriber);
			}else{
				$queue = new stdClass;
			    $queue->id = 0;
			    $queue->subscriber_id = $subId;
			    $queue->list_id = $listId;
			    $queue->type = 1;
 			    $queue->mailing_id = $mailing_ids;
				$queue->send_date = xmailing::getSendDate($mailing_ids);
			    $queue->suspend = 0;
			    $queue->delay = 0;
			    $queue->acc_level = $acc_level;
			    $queue->issue_nb = 0;
			    $queue->published = 0;
			    $queue->params = '';
				$queue->priority = 0;
				$queue->attempt = 0;
				$subscriber=null;
				$subscriber->list_id=$listId;
				$subscriber->id=$subId;
				listssubscribers::insertToListSubscribers($subscriber);
			    queue::insert($queue);
			}
		}
	return $status;
    }//endfct

	 //Used by acasyncuser
	 //Used by queue
	 function insert($queue) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ( $queue->subscriber_id<0 ) return false;

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$exist=queue::queueExist($queue->subscriber_id,$queue->mailing_id);

if(empty($queue->list_id)){
	$queue->published=2;
}

		if (!$exist){
			$query = 'INSERT IGNORE INTO `#__jnews_queue` (`type` , `subscriber_id` ,  `mailing_id`, `issue_nb`,' .
					' `send_date`, `suspend` , `delay`, `acc_level`, `published`, `priority`, `attempt` , `params`	) VALUES ('
			. intval($queue->type) . ', '
			. intval($queue->subscriber_id) . ' , '
			. intval($queue->mailing_id) . ', '
			. intval($queue->issue_nb) . ', \''
			. $queue->send_date . '\', '
			. $queue->suspend . ' , '
			. $queue->delay . ' , '
			. $queue->acc_level . ' , '
			. $queue->published . ' , '
			. $queue->priority . ' , '
			. $queue->attempt
			." ,  '$queue->params'  ) ";
			$database->setQuery($query);
			$database->query();

			$erro->err = $database->getErrorMsg();

if(!empty($queue->list_id)){
			$query='SELECT `list_type` from `#__jnews_lists` where `id` = '. $queue->list_id;
			$database->setQuery($query);
			$database->query();
			$type=$database->loadResult();

			if($type==2){
				$query='SELECT `delay` from `#__jnews_mailings` WHERE `id` ='.$queue->mailing_id;
				$database->setQuery($query);
				$database->query();
				$delays=$database->loadObjectList();

				foreach($delays as $value){
					if($value->delay==0){
						$value->delay=15;
					}
					$newQueue->delay = $value->delay;
					$newQueue->send_date = jnewsletter::getNow($value->delay);
					$newQueue->published = 2;
					$newQueue->priority = $GLOBALS[ACA.'ar_prior'];

					$query='UPDATE `#__jnews_queue` SET `send_date`='.$newQueue->send_date;
					$query .= ' , `delay`='. $newQueue->delay;
					$query .= ' , `published`='. $newQueue->published;
					$query .= ' , `priority`='. $newQueue->priority;
					$query .= ' WHERE `subscriber_id` = '.$queue->subscriber_id ;
					$query .= ' and `mailing_id` = '.$queue->mailing_id ;

					//echo '<br>'.$query;

					$database->setQuery($query);
					$database->query();

				}//endfor
}
				return true;
			}//end if

			if($type==7){
//echo '<br>Type: '. $type;
			}

			return $erro->E(__LINE__ , '8534', $database );
		}//endif

	 }//endfct

	//Used by class.mailing
	//To be transfer
	function insert_subs_to_mailing($list_id, $mailing_id, $send_date, $acc_level){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		$query='UPDATE `#__jnews_queue` SET `published` =2';
		$query .=' WHERE `mailing_id`='.$mailing_id;
		//$query .=' AND `subscriber_id`='. $subs;
		$database->setQuery($query);
		$database->query();

		$database->setQuery('SELECT COUNT(*) FROM `#__jnews_queue` WHERE `mailing_id` = '.intval($mailing_id) .' and `published` = 2');
		$number =$database->loadResult();
		$gmtTime=$send_date;
		$send_date=date('Y-m-d H:i:s',$send_date);

		$gmtDate = date('Y-m-d H:i:s',$gmtTime - ACA_TIME_OFFSET *60*60);
		echo jnewsletter::printM('blue',$number.' e-mails are in the queue for the mailing ID'.intval($mailing_id).' and will be sent at '.$send_date.' ('.$gmtDate.' GMT )');

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$erro->err = $database->getErrorMsg();

		return $erro->E(__LINE__ , '8534', $database );
	}//endfct

	 //Used by class.queue
	 //Used by class.jmail
	 //Used by class.auto
	 //Used by class.pro
	 function deleteQueues($qid) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($qid)) {
			$qids = implode (',', $qid);
			If (!empty( $qids )) {
				$query = "DELETE FROM `#__jnews_queue` WHERE qid IN ( $qids ) " ;
				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ , '8536', $database );
			}
		}
        return $erro->R();
	 }//endfct

	 //Used by queue controller
	 function getMailingqueue($mailingsearch, $mailingId, $start, $limit){
	 	if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		global $totalm;

		if(empty($mailingId)){
			//echo 'empty';

	 		if(empty($mailingsearch)){
				$query='SELECT * from `#__jnews_queue` order by `qid`';
				$database->setQuery($query, $start, $limit);
		 		$mailingQueue=$database->loadObjectList();

		 		$query='SELECT COUNT(*) from `#__jnews_queue`';
		 		$database->setQuery($query);
		 		$database->query();
		 		$totalm=$database->loadResult();
		 		$erro->err =$database->getErrorMsg();
		 		return $erro->Ertrn( __LINE__ , '8500', $database, $mailingQueue );
			}else{
				$mailing=queue::getMailingSubs($mailingsearch, $mailingId);

				$mails=array();
				foreach($mailing as $mailings){
					$query='SELECT * from `#__jnews_queue` where `mailing_id` = '. $mailings->id ;
			 		$database->setQuery($query, $start, $limit);
			 		$mails[]=$database->loadObjectList();
			 		$erro->err =$database->getErrorMsg();
				}//end4each

			 	//return $mails;
			 	$totalm=sizeof($mails);
			 	return $erro->Ertrn( __LINE__ , '8500', $database, $mails );

	 		}//endif -- mailingsearch
		}else{
			if(empty($mailingsearch)){
				$query='SELECT * from `#__jnews_queue` where `mailing_id`='.$mailingId.'  order by `qid` ';
				$database->setQuery($query, $start, $limit);
		 		$mailingQueue=$database->loadObjectList();
		 		$query='SELECT COUNT(*) from `#__jnews_queue` where `mailing_id`='.$mailingId;
		 		$database->setQuery($query);
		 		$database->query();
		 		$totalm=$database->loadResult();
		 		$erro->err =$database->getErrorMsg();
		 		return $erro->Ertrn( __LINE__ , '8500', $database, $mailingQueue );
			}else{
				$mailing=queue::getMailingSubs($mailingsearch, $mailingId);

				$mails=array();
				foreach($mailing as $mailings){
					$query='SELECT * from `#__jnews_queue` where `mailing_id` = '. $mailings->id;//.' and `mailing_id`='. $mailingId;
			 		$database->setQuery($query, $start, $limit);
			 		$mails[]=$database->loadObjectList();
			 		$erro->err =$database->getErrorMsg();
				}//end4each

			 	//return $mails;
			 	$totalm=sizeof($mails);
			 	return $erro->Ertrn( __LINE__ , '8500', $database, $mails );
			}//endif mailingsearch
		}//endif -- mailingid

	 }//endfct

	 function getMailingSubs($mailingsearch, $mailingId){
	 	if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

	 	$query='SELECT `id` from `#__jnews_mailings` where `subject` LIKE "%'.$mailingsearch.'%"';
	 	if(!empty($mailingId)) $query .= ' or `id` = '.$mailingId;
		$database->setQuery($query);
		$database->query();
		$mailing=$database->loadObjectList();
	 	$erro->err =$database->getErrorMsg();
	 	return $erro->Ertrn( __LINE__ , '8500', $database, $mailing );
	 }//endfct

	 function deleteMailingQueue($id){
		if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

	 	$query='DELETE from `#__jnews_queue` where `qid`='. $id;
	 	$database->setQuery($query);
	 	$database->query();
	 	$erro->err =$database->getErrorMsg();
	 	$erro->E( __LINE__ , '8500', $database );
	 	return true;

	 }//endfct

	 function clearQueue(){
	 	if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

	 	$query='DELETE from `#__jnews_queue`';// where `mailing_id`>0';
	 	$database->setQuery($query);
	 	$database->query();
	 	$erro->err =$database->getErrorMsg();
	 	return $erro->Ertrn( __LINE__ , '8500', $database );
	 }//endfct

	function listDrop(){//TODO select this should be dynamic
		$lists = '';
		$lists[0]->subject = 'All Mailings';
		$lists[0]->id = 0;

		$lt = array_merge($lists, queue::getMailingsQueue());

		$mailingId = JREquest::getVar('mailingid', '');
		$lists['mailings'] = JHTML::_('select.genericlist', $lt, 'mailingid', '' .
				'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'id', 'subject', $mailingId );

		return $lists['mailings'];

	}//endfct

	function getMailingsQueue(){
		$database =& JFactory::getDBO();
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query='SELECT `subject`, `id` from `#__jnews_mailings`';
		$database->setQuery($query);
		$database->query();
		$mailingsQ=$database->loadObjectList();

		return $erro->Ertrn( __LINE__ , '8500', $database, $mailingsQ );
	}//endfct

	function getMailingsSubject($id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query='SELECT subject from `#__jnews_mailings` where id='. $id;
		$database->setQuery($query);
		$database->query();

		$subject=$database->loadResult();
		$erro->err = $database->getErrorMsg();

		return $erro->Ertrn( __LINE__ , '8500', $database, $subject );
	}//endfct

	function getQueue($start = -1, $limit = -1, $mailingsearch, &$total){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$my	=& JFactory::getUser();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$flag = false;
		$limitFlag = false;

	}//endfct


	function getSubscriberLists($userId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ($userId>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_queue` WHERE `subscriber_id`='.$userId;
			$query .= jnewsletter::orderBy('list_idA');

			$database->setQuery($query);
			$queue = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();

			return $erro->Ertrn( __LINE__ , '8500', $database, $queue );

		}else {
			return '';
		}
	 }//endfct

	 function deleteSubsQueue($subscriber_id , $listId=0) {

	 		if ( ACA_CMSTYPE )
	 		{
				$database =& JFactory::getDBO();
			} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

	 	if ($listId==0){
					$query = 'DELETE FROM `#__jnews_queue` WHERE `subscriber_id` = ' . $subscriber_id;
					$database->setQuery($query);
					$database->query();
					$erro->err = $database->getErrorMsg();
					$erro->E(__LINE__ , '8539', $database );
					return $erro->R();
	   }else{
		//get mailing id fron the list (listmailing table)
		$mailing_ids=xmailing::getListMailing( $listId );

		//if not empty $mailing_ids
		if(!empty($mailing_ids)){

				foreach($mailing_ids as $mailing_id)
				{
					queue::_deleteSubsQueue($subscriber_id,$mailing_id,$listId);
				}//end for


		}//endif
	}//endif
  }//endfct

	//This is a private function called by deleteSubsQueue function
	function _deleteSubsQueue($subscriber_id,$mailing_ids,$listID){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$status=true;

		$listIds =xmailing::getMailingList( $mailing_ids);


		$key = array_search($listID,$listIds);
		unset($listIds[$key]);
			if(!empty($listIds)){
				if(is_array($listIds)){
					foreach($listIds as $listId){
						$listssubscribers=listssubscribers::getListSubscriberInfo( $subscriber_id , $listId);
						if (!empty($listssubscribers)){
							if (!$listssubscribers->unsubscribe){
								$status=  false;
							}

						}
					}//endfor
				}else{
					$listssubscribers=listssubscribers::getListSubscriberInfo( $subscriber_id , $listIds );
					$status= (!empty($listssubscribers)) ? true:false;
				}
			}//end if
		if($status){
			if ($subscriber_id>0) {
					$query = 'DELETE FROM `#__jnews_queue` WHERE `subscriber_id` = ' . $subscriber_id;
					$query .= ' AND `mailing_id` = ' . $mailing_ids;
					$database->setQuery($query);
					$database->query();
					$erro->err = $database->getErrorMsg();
					$erro->E(__LINE__ , '8539', $database );
					return $erro->R();
				}
			}
	}//endfct

	function queueExist($subscriberId,$mailingId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_queue` WHERE `subscriber_id`='.$subscriberId;
			$query .= ' AND `mailing_id`='.$mailingId;
			$database->setQuery($query);
			$queue = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();
			return $queue;

    }//endfct

	 function getQueueCount( $mailingId=0 ){
	 	if ( ACA_CMSTYPE ){
			$database =& JFactory::getDBO();
		} //endif

		$query = "SELECT count(`qid`) FROM `#__jnews_queue` ";
		if( !empty($mailingId) ) $query .= "WHERE `mailing_id` = ". $mailingId;
		$database->setQuery( $query );
		$result = $database->loadResult();

		return $result;
	 } //endfct
 }//end class

