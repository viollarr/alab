<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class listssubscribers {

	/**
	 * This function is used to store data in the listssubscriber table
	 */
	function insertToListSubscribers($subscriber) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}

		$erro = new xerr( __FILE__ , __FUNCTION__ );
		$erro->show();

	    if(!empty($subscriber->list_id)) $listids=$subscriber->list_id;
	    if(!empty($subscriber->id)) $subscriber_id=$subscriber->id;
	    $subdate=(!empty($subscriber->subdate)) ? $subscriber->subdate : time();
		$unsubdate = (!empty($subscriber->unsubdate)) ? $subscriber->unsubdate : 0;
        $unsubscribe= (!empty($subscriber->unsubscribe)) ? $subscriber->unsubscribe : 0;

		if (is_array($listids)){


			foreach($listids as $list_id){

		 			$query = "INSERT IGNORE INTO `#__jnews_listssubscribers` (`list_id`,`subscriber_id`,`subdate`,`unsubdate`,`unsubscribe`)";
	 				$query .= " VALUES ( $list_id ,$subscriber_id,$subdate,$unsubdate,$unsubscribe) ";
	 				$database->setQuery($query);
					$database->query();
					$erro->err = $database->getErrorMsg();
					$erro->Eck(__LINE__ , '8521' );

			}//endforeach
		}
		else{

			$database->setQuery("SELECT `id`,`acc_id` FROM `#__jnews_lists` WHERE `id` ='.$listids.'");
			$result = $database->loadObjectList('id');
			$list_id=array_keys($result);
			$query = "INSERT IGNORE INTO `#__jnews_listssubscribers` (`list_id`,`subscriber_id`,`subdate`,`unsubdate`,`unsubscribe`)";
	 		$query .= " VALUES ( $listids ,$subscriber_id,$subdate,$unsubdate,$unsubscribe) ";
	 		$database->setQuery($query);
			$database->query();
			//echo $query;
			$erro->err = $database->getErrorMsg();
			$erro->Eck(__LINE__ , '8521' );
		}//endif
		return $erro->R();
	}//endfct

	/**
	 * This function is used for the retrieval of the subscription done by the subscribers
	 */
	function getSubscription($subscriber_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		$query = 'SELECT * FROM `#__jnews_listssubscribers` as a LEFT JOIN `#__jnews_lists` as b on a.list_id = b.id WHERE a.subscriber_id = '.$subscriber_id.' ORDER BY b.id ASC';
		$database->setQuery($query);
		return $database->loadObject('list_id');
	}//endfct

	/**
	 * This function is used for deletion or removal of subscribers subscribed to lists
	 */
	function removeSubscription($subscriber_id,$listids=0){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if ($subscriber_id>0) {
			$query = 'DELETE FROM `#__jnews_listssubscribers` WHERE `subscriber_id` = ' . $subscriber_id;
			if ($listids>0) $query .=' AND `list_id` ='.$listids;

			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8539', $database );
			queue::deleteSubsQueue($subscriber_id,$listids);
		}
    return $erro->R();
  }//endfct

	function updateOneSuscription($subscriberId) {

		$queue = '';
		$queue->user_id = $subscriberId;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
			$listIds = JRequest::getVar('listid', '0' );
		} //endif

		if ( !empty($listIds) ) {
			$accessName = '';

			if ( ACA_CMSTYPE ) {	// joomla 15
				$userid = intval(JRequest::getVar('userid', 0));
			}
			$query = "SELECT usertype "
			. "\n FROM #__users"
			. "\n WHERE id = " . (int) $userid
			;

			$database->setQuery( $query );
			$accessName = $database->loadResult();
			$groupId = $acl->get_group_id($accessName , 'ARO');

			if(empty($groupId)){$groupId = 29;}

			$idslists = explode(",", $listIds);
			foreach($idslists as $i => $listId){
				$listId = intval($listId);
				if($listId<=0) break;

				$list = lists::getOneList($listId);
				if ( empty($list)) {
					echo jnewsletter::printM('red' , 'List not defined' );
					return false;
				}
				$ex_groups = $acl->get_group_children( $list->acc_id , 'ARO',  'RECURSE' );
				$ex_groups[] = $list->acc_id;
				$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );

				if ( !in_array( $gidAdmin , $ex_groups ) ) {
					$ex_groups2 = $acl->get_group_children( $gidAdmin , 'ARO',  'RECURSE' );
					$ex_groups2[] = $gidAdmin;
					$ex_groups = array_merge( $ex_groups, $ex_groups2 );
				}

				if ( !in_array( $groupId, $ex_groups ) ) {
					echo jnewsletter::printM('red' , ACA_NO_LIST_PERM );
					return false;
				}

				$queue->sub_list_id[$i] = $listId;
				$queue->subscribed[$i] = 1;
				$queue->acc_level[$i] = $list->acc_id;
			}

		} else {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$queue->sub_list_id = JRequest::getVar('sub_list_id', 0);
				$queue->subscribed = JRequest::getVar('subscribed', 0);
			} //endif

			if($queue->subscribed == 0) {
				$queue->subscribed = array();
				if(!empty($queue->sub_list_id)){
					foreach($queue->sub_list_id as $key=>$value){
						$queue->subscribed[$key] = 0;
					}
				}
			}

			if ( ACA_CMSTYPE ) {	// joomla 15
				$queue->acc_level = intval(JRequest::getVar('acc_level', 29));
			} //endif
			if(!empty($queue->sub_list_id)){
				foreach($queue->sub_list_id as $key=>$value){
					if(empty($queue->subscribed[$key]) or $queue->subscribed[$key] != 1){
						$queue->subscribed[$key] = 0;
					}
				}
			}
		}
		if (!empty($queue->subscribed) AND $subscriberId>0) {
			return listssubscribers::updateSuscription($queue);
		}
 		return true;
	 }//endfct

	  function updateSuscription($suscription) {
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$subscriber=null;
		foreach($suscription->sub_list_id as $i=>$value){
			//get the info from list subscriber
			$listssubscribers=listssubscribers::getListSubscriberInfo($suscription->user_id , $suscription->sub_list_id[$i]);
		if (isset($suscription->subscribed[$i])) {

			if (!empty($listssubscribers)) {//if the user is already in the list subscriber

				if ($listssubscribers->unsubscribe) {//not subscribed

					if ( $suscription->subscribed[$i] == 1) {//if YES (means the user wants to subscribe)
						$suscription->unsubscribe=0;//subscribe the user
						$suscription->subdate=time();
						$subscriber->list_id=$suscription->sub_list_id[$i];
						$erro->ck = listssubscribers::updateListSubs($suscription->user_id , $subscriber->list_id, $suscription->unsubscribe, 0 ,$suscription->subdate);
						queue::insertQueuesForNews($suscription->user_id , $subscriber->list_id, 29);
						$erro->Eck(__LINE__ , '8520' );
					}//endif ( $suscription->subscribed[$i] == 1)
				}
				else{ //the user is subscribed

					if ( $suscription->subscribed[$i] == 0) {//if NO (the user unsubscribed)
						$suscription->unsubscribe=1;
						$suscription->unsubdate=time();
						$subscriber->list_id=$suscription->sub_list_id[$i];
						$erro->ck = listssubscribers::updateListSubs($suscription->user_id , $subscriber->list_id, $suscription->unsubscribe,$suscription->unsubdate);
						queue::deleteSubsQueue($suscription->user_id , $subscriber->list_id);

						$erro->Eck(__LINE__ , '8520' );
					}//endif if ( $suscription->subscribed[$i] == 0)

				}
			}
			else {	//not on the list

					if ( $suscription->subscribed[$i] == 1) {
						$subList = ( isset($suscription->sub_list_id[$i]) ) ? $suscription->sub_list_id[$i] : 0;
						$subscriber=null;
				        $subscriber->list_id=$suscription->sub_list_id[$i];
				        $subscriber->id=$suscription->user_id;
				        listssubscribers::insertToListSubscribers($subscriber);
						$erro->ck= queue::insertQueuesForNews($suscription->user_id, $suscription->sub_list_id[$i], 29 );
						$erro->Eck(__LINE__ , '8522');
						} //endif ( $suscription->subscribed[$i] == 1)
			}//endif (!empty($listssubscribers))
		}//endif (isset($suscription->subscribed[$i]))
	  } //while (count($suscription->sub_list_id ) > $i );
     return $erro->R();
	 }//endfct

	 function updateListSubs($subscriber_id, $listId, $unsubscribe,$unsubdate=0,$subdate=0) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if ($subscriber_id>0) {
			$query = 'UPDATE `#__jnews_listssubscribers` SET ';
			$query .= ' `subdate` = ' . $subdate. ',';
			$query .= ' `unsubdate` = ' . $unsubdate. ',';
			$query .= ' `unsubscribe` = ' . $unsubscribe;
			$query.=is_array($subscriber_id)? ' WHERE `subscriber_id` IN ( '.implode(',',$subscriber_id).' )': ' WHERE `subscriber_id` ='.$subscriber_id;
			if ($listId>0) $query .=' AND `list_id` ='.$listId;
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8539', $database );

		}
        return $erro->R();
	 }//endfct

 function deleteListsSubs($subscriber_id , $listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if ($subscriber_id>0) {
			$query = 'DELETE FROM `#__jnews_listssubscribers` WHERE `subscriber_id` = ' . $subscriber_id;
			if ($listId>0) $query .=' AND `list_id` ='.$listId;

			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8539', $database );

		}
        return $erro->R();
	 }
	  function getSubscriberLists($userId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		if ($userId>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		    $query = 'SELECT LS.*, L.acc_level FROM `#__jnews_listssubscribers` AS LS LEFT JOIN `#__jnews_lists` AS L' .
		    		' ON  LS.list_id = L.id  WHERE LS.subscriber_id='.$userId;
		    $query .= ' AND `unsubscribe`= 0';
			$query .= jnewsletter::orderBy('list_idA');
			$database->setQuery($query);
			$queue = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();

			return $erro->Ertrn( __LINE__ , '8500', $database, $queue );

		}else {
			return '';
		}
	 }

	//************* Added by Grace
	//This function whill return the ListSubscriber object
	 function getListSubscriberInfo( $subscriber_id , $listId ) {// Changed by grace (previously suscriptionExist)

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT * FROM `#__jnews_listssubscribers`';
		$query.=is_array($subscriber_id)? ' WHERE `subscriber_id` IN ( '.implode(',',$subscriber_id).' )': ' WHERE `subscriber_id` ='.$subscriber_id;
		$query .=  ' AND `list_id` ='.$listId;
		$database->setQuery($query);
		$queue = $database->loadObject();
		$erro->err = $database->getErrorMsg();
		return $erro->Ertrn(__LINE__ , '8541', $database, $queue );
	 }//endfct

	 function getSubscriberMail($id){
	 	if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query='SELECT email from `#__jnews_subscribers` where id='. $id;
		$database->setQuery($query);
		$database->query();
		$email=$database->loadResult();
		$erro->err = $database->getErrorMsg();
		return $erro->Ertrn( __LINE__ , '8500', $database, $email );

	 }//endfct

	  function getSubscriberFromList($list_id){
	 	if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query='SELECT `subscriber_id` from `#__jnews_listssubscribers` where `list_id`='. $list_id;
		$query.=' AND `unsubscribe`=0';
		$query.=' AND `subscriber_id` in (SELECT `id` from `#__jnews_subscribers` where `confirmed` = 1)';
		$database->setQuery($query);
		$database->query();
		$subscriber_id=$database->loadResultArray();
		$erro->err = $database->getErrorMsg();

		return $subscriber_id;

	 }//endfct
}//endclass