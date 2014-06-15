<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class lists {

	function getLists($listId, $listType, $author=null, $order='listnameA', $autoAdd=false, $onlyPublished=true, $onlyName=false, $notification=false, $onlyVisible=false, $listsearch='', $setLimit=null  ) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
			$my	=& JFactory::getUser();
		}

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		if ($onlyName) $query = 'SELECT `id` AS id, `list_name` AS list_name, `list_desc` AS list_desc, `list_type` AS list_type FROM `#__jnews_lists`';
		else $query = 'SELECT * FROM `#__jnews_lists` ';
		$where = array();

		if ($listId>0) {
			$where[] = ' `id`='.intval($listId);
		}
		if ($listType>0) {
			$where[] = ' `list_type`='.intval($listType);
		}

		if ($autoAdd) $where[] = ' `auto_add`=1 ';
		//if ($onlyPublished == true) $where[] = ' `published`=1 AND `hidden`=1 ';
		if ($onlyPublished == true) $where[] = ' `published`=1 ';
		if ($onlyVisible == true) $where[] = ' `hidden`=1 ';

		if (!empty($listsearch)) {

			$where[] = ' (list_name LIKE \'%' . $listsearch . '%\') ';

		}

		if (  class_exists('pro') && isset($author)) {

			$aro_id = ( isset($my->id) && $my->id>0 ) ? $acl->get_object_id( 'users', $my->id, 'ARO' ) : 1;
			$qacl = "SELECT `group_id` FROM `#__core_acl_groups_aro_map` WHERE `aro_id` =".$aro_id;
			$database->setQuery( $qacl );
			$gidd = $database->loadResult();
			$gidFront = $acl->get_group_id( 'Public Frontend' , 'ARO' );
			$gid = ( $gidd > 0 ) ? $gidd : $gidFront;
			$ex_groups = $acl->get_group_parents( $gid , 'ARO',  'RECURSE' );
			$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );

			if ( in_array( $gidAdmin , $ex_groups ) ) {
				$ex_groups2 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
				$ex_groups2[] = $gidFront;
				$ex_groups = array_merge( $ex_groups, $ex_groups2 );
			}
			$ex_groups[] = $gid;
			$ex_groups[] = 0;
			$accIds = implode( ',' , $ex_groups );
			$where[] = " `acc_id` IN ( $accIds ) ";
		}

		if (!$notification) $where[] = ' `notification`=0 ';

		$wheretag = (count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '');
		$query .= $wheretag;
		$query .= ( class_exists('jnewsletter') ) ? jnewsletter::orderBy($order) : '';

        // Modified for pagination =====================
		if( !empty($setLimit) )
		{
			$limitStart = $setLimit->start;
			$limitEnd = ( !empty($setLimit->end) ) ? $setLimit->end : '-1';
			$database->setQuery($query, $limitStart, $limitEnd);
		}
		else
		{
			$database->setQuery($query);
		} //endif
        // ===============================

		$lists = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();

		if(!empty($lists)){
			foreach ($lists as $key => $list){
				$lists[$key]->list_name = stripslashes($lists[$key]->list_name);
				$lists[$key]->list_desc = stripslashes($lists[$key]->list_desc);
			}
		}

		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
	       return $lists;
       }
	}

	function getSpecifiedLists( $listIds, $useAccess=true ) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
			$acl =& JFactory::getACL();
			$my	=& JFactory::getUser();
		}//endif

		$myexplode = explode( ',', $listIds );
		if ( !empty($myexplode) ) {
			foreach( $myexplode as $myexp ) {
				$escapedArray[] = intval($myexp);
			}//endif
		} else {
			$escapedArray = array();
			$escaped = '';
		}//endif

		$escaped = implode( ',', $escapedArray );
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		if ($listIds==0) {
			$query = "SELECT * FROM `#__jnews_lists` WHERE `published` = 1 " ;
		} elseif (!empty($escaped)) {
			$query = "SELECT * FROM `#__jnews_lists` WHERE `id` IN ( $escaped ) AND `published` = 1 " ;
		} else {
			return '';
		}

		if ( class_exists('pro') && $useAccess ) {

			$aro_id = ( isset($my->id) && $my->id>0 ) ? $acl->get_object_id( 'users', $my->id, 'ARO' ) : 1;
			$qacl = "SELECT `group_id` FROM `#__core_acl_groups_aro_map` WHERE `aro_id` =".$aro_id;
			$database->setQuery( $qacl );
			$gidd = $database->loadResult();
			$gidFront = $acl->get_group_id( 'Public Frontend' , 'ARO' );
			$gid = ( $gidd > 0 ) ? $gidd : $gidFront;
			$ex_groups = $acl->get_group_parents( $gid , 'ARO',  'RECURSE' );
			$gidAdmin = $acl->get_group_id( 'Public Backend' , 'ARO' );
			if ( !empty($ex_groups) AND is_array($ex_groups) AND in_array( $gidAdmin , $ex_groups ) ) {
				$ex_groups2 = $acl->get_group_children( $gidFront , 'ARO',  'RECURSE' );
				$ex_groups2[] = $gidFront;
				$ex_groups = array_merge( $ex_groups, $ex_groups2 );
			}
			$ex_groups[] = $gid;
			$ex_groups[] = 0;
			$accIds = implode( ',' , $ex_groups );
			$query .= " AND `acc_id` IN ( $accIds ) ";
			//only jack
			//if ( empty($gidd) ) $gidd = '0';
			//$query .= " AND `acc_level` IN ( $accIds ) ";
			//$where[] = " `acc_level` = $gid  ";

		}
		$database->setQuery( $query );
		$lists = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();

		if (!$erro->E(__LINE__ ,  '8301')) {
			$lists = '';
			echo 'Please specify a list to subscribe to in your module settings. <br /> If you have several lists to subcribe to please seperate them by a comma ,  ';
			return false;
		}

		if(!empty($lists)){
			foreach ($lists as $key => $list){
				$lists[$key]->list_name = stripslashes($lists[$key]->list_name);
				$lists[$key]->list_desc = stripslashes($lists[$key]->list_desc);
				$lists[$key]->layout = stripslashes($lists[$key]->layout);
				$lists[$key]->subscribemessage = stripslashes($lists[$key]->subscribemessage);
				$lists[$key]->unsubscribemessage = stripslashes($lists[$key]->unsubscribemessage);
				$lists[$key]->notifyadminmsg=stripslashes($lists[$key]->notifyadminmsg);
			}
		}

		return $lists;
	}

	function getNotifLists( &$list, $type, $catId ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		if ( $type!=0 AND $catId > 0 ) {
			$query = "SELECT * FROM `#__jnews_lists` WHERE `notification` = $type  AND `notify_id` = $catId " ;
		} else {
			return false;
		}

		$database->setQuery($query);
		$list = $database->loadObjectList();
		if(!empty($list)){
			foreach ($list as $key => $listdetail){
				$list[$key]->list_name = stripslashes($list[$key]->list_name);
				$list[$key]->list_desc = stripslashes($list[$key]->list_desc);
				$list[$key]->layout = stripslashes($list[$key]->layout);
				$list[$key]->subscribemessage = stripslashes($list[$key]->subscribemessage);
				$list[$key]->unsubscribemessage = stripslashes($list[$key]->unsubscribemessage);
				$lists[$key]->notifyadminmsg=stripslashes($lists[$key]->notifyadminmsg);
			}
		}

		$erro->err = $database->getErrorMsg();

		if ( $erro->E(__LINE__ ,  '8371') AND !empty( $list ) ) {
			return true;
		} else {
			return false;
		}
	}


	function getListsDate( $listType=7 ) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT * FROM `#__jnews_lists` ';
		$query .= ' WHERE  `next_date` <'.time();
		/*commented by mary*/ //$query .= ' AND  `start_date` <= \'' .date( 'Y-m-d',  time() ).'\'' ;
		/*added by mary*/		$query .= ' AND  `start_date` <= \'' .time().'\'' ;
		$query .= ' AND  `list_type` ='.intval($listType);
		$query .= ' AND `published` = 1 ';

		$database->setQuery($query);
		$lists = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
		if(!empty($lists)){
			foreach ($lists as $key => $listdetail){
				$lists[$key]->list_name = stripslashes($lists[$key]->list_name);
				$lists[$key]->list_desc = stripslashes($lists[$key]->list_desc);
				$lists[$key]->layout = stripslashes($lists[$key]->layout);
				$lists[$key]->subscribemessage = stripslashes($lists[$key]->subscribemessage);
				$lists[$key]->unsubscribemessage = stripslashes($lists[$key]->unsubscribemessage);
				$lists[$key]->notifyadminmsg=stripslashes($lists[$key]->notifyadminmsg);
			}
		}
         return $lists;
       }
	}

    /**
     * This function is used for retrieving the Mailings Date (start and next send_date) of the SmartNewsletter
     * type of mailing
     */
	function getMailingsDate( $mailingType=7 ) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT * FROM `#__jnews_mailings` ';
		$query .= ' WHERE  `next_date` <'.time();
		$query .= ' AND  `start_date` <= \'' .time().'\'' ;
		$query .= ' AND  `mailing_type` = '.$mailingType;
		//$query .= ' AND `published` = 1'; commented by eve

		$database->setQuery($query);
		$lists = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
		if(!empty($lists)){
			foreach ($lists as $key => $listdetail){
				$lists[$key]->subsject=stripslashes($lists[$key]->subject);
				//Original commented by eve
				//$lists[$key]->list_name = stripslashes($lists[$key]->list_name);
				//$lists[$key]->list_desc = stripslashes($lists[$key]->list_desc);
				//$lists[$key]->layout = stripslashes($lists[$key]->layout);
				//$lists[$key]->subscribemessage = stripslashes($lists[$key]->subscribemessage);
				//$lists[$key]->unsubscribemessage = stripslashes($lists[$key]->unsubscribemessage);
			}
		}
         return $lists;
       }
	}

	function getOneList($listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		if ($listId>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_lists` WHERE `id`='.intval($listId);
			$database->setQuery($query);
			$list = null;
					if ( ACA_CMSTYPE ) {	// joomla 15
						$list = $database->loadObject();
					}

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
		} else {
			$list = '';
		}

		if(empty($list)) {
			$list->id = '';
			$list->list_name = '';
			$list->list_desc = '';
			$list->sendername = '';
			$list->senderemail = '';
			$list->bounceadres = '';
			$list->layout = '';
			$list->template = 0;
			$list->html = 1;
			$list->hidden = 1;
			$list->list_type = 0;
			$list->auto_add = 0;
			$list->user_choose = 0;
			$list->cat_id = '0:0';
			$list->delay_min = 0;
			$list->delay_max = 0;
			$list->follow_up = 0;
			$list->owner = '';
			$list->acc_level = 25;
			$list->acc_id = 29;
			$list->published = 0;
			$list->subscribemessage = '';
			$list->unsubscribemessage = '';
			$list->notifyadminmsg='';
			$list->unsubscribesend = 1;
			$list->unsubscribenotifyadmin = 1;
			$list->footer = 1;
			$list->notify_id = 0;
			$list->notification = 0;
			$list->start_date = date( 'Y-m-d',  time() );
			$list->next_date = time();
			//lala $list->color = '';
		}

		$list->list_name = stripslashes($list->list_name);
		$list->list_desc = stripslashes($list->list_desc);
		$list->sendername = stripslashes($list->sendername);
		$list->senderemail = stripslashes($list->senderemail);
		$list->bounceadres = stripslashes($list->bounceadres);
		$list->layout = stripslashes($list->layout);
		$list->subscribemessage = stripslashes($list->subscribemessage);
		$list->unsubscribemessage = stripslashes($list->unsubscribemessage);
		$list->notifyadminmsg=stripslashes($list->notifyadminmsg);
		return $list;
	}

	function checkStatus($listId) {
         $list = lists::getOneList($listId);
         if ( $list->published )  $status = true; else  $status = false;
	    return $status;
	}

	function updateListFromEdit($listId, $status, $new) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$listUpdated = '';
		$total = 0;
		$allow_html  = compa::allow_html();
		$listUpdated->id = $listId;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$issue_nb = JRequest::getVar('issue_nb', '0' );
			$listUpdated->list_name = JRequest::getVar('list_name', '', 'request','string', $allow_html );
			$listUpdated->list_desc = JRequest::getVar('list_desc', '', 'request','string', $allow_html );
			$listUpdated->sendername = JRequest::getVar('sendername' , '');
			$listUpdated->senderemail = JRequest::getVar('senderemail' , '');
			$listUpdated->bounceadres = JRequest::getVar('bounceadres' , '');
			$listUpdated->layout = JRequest::getVar('layout', '', 'request','string', $allow_html );
			$listUpdated->template = JRequest::getVar('template', 0);
			$listUpdated->subscribemessage = JRequest::getVar('subscribemessage', '', 'request','string', $allow_html );
			$listUpdated->unsubscribemessage = JRequest::getVar('unsubscribemessage', '', 'request', 'string',$allow_html );
			$listUpdated->notifyadminmsg = JRequest::getVar('notifyadminmsg', '', 'request', 'string',$allow_html );
			$listUpdated->unsubscribesend = JRequest::getVar('unsubscribesend', 1);
			$listUpdated->unsubscribenotifyadmin = JRequest::getVar('unsubscribenotifyadmin', 1);
			$listUpdated->html = JRequest::getVar('html', 1);
			$listUpdated->hidden = JRequest::getVar('hidden', 0);
			$listUpdated->list_type = JRequest::getVar('list_type', 1);
			$listUpdated->auto_add = JRequest::getVar('auto_add', 0);
			$listUpdated->user_choose = JRequest::getVar('user_choose', 0);
			$listUpdated->cat_id = implode(',',JRequest::getVar('cat_id',array()));
			$listUpdated->delay_min = JRequest::getVar('delay_min', 0);
			$listUpdated->delay_max = JRequest::getVar('delay_max', 0);
			$listUpdated->follow_up = JRequest::getVar('follow_up', 0);
			$listUpdated->notify_id = ($listUpdated->list_type=='7') ? JRequest::getVar('notify_id', 0) : 0;
			$listUpdated->auto_add = JRequest::getVar('auto_add', 0);
			$listUpdated->acc_level = JRequest::getVar('acc_level', 25);
			$listUpdated->acc_id = JRequest::getVar('acc_id', 29);
			$listUpdated->footer = JRequest::getVar('footer', 1);
			$listUpdated->start_date = JRequest::getVar('start_date', '');
			$listUpdated->next_date = JRequest::getVar('next_date', 0);
			//lala $listUpdated->color = JRequest::getVar('listcolor', '');

		} //endif

		$listUpdated->owner = $my->id;
		$listUpdated->notification =  0;

		if ($status =='') {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$listUpdated->published = JRequest::getVar('published', 0);
			}
		} else {
			$listUpdated->published = $status;
		}

		if ($listUpdated->published == 0 AND ( $listUpdated->list_type == 2 OR $listUpdated->list_type == 3 )){
			$published = 0;
		}
		else{
			$published =$listUpdated->published;
		}
		if (!empty($listUpdated->hidden)){
			$visible = $listUpdated->hidden;
		}
		else{
			$visible =0;
		}

		if ($new) $published = $listUpdated->published;

		if (!lists::updateList($listId, $listUpdated, $listUpdated->published, $new)) return false;

		if ($listUpdated->list_type<>11) {
			return xmailing::updateMailingFromList($listId, $published, $listUpdated->html, $visible);
		} else {
			return true;
		}

	 }

	 function updateListFromList($listId, $status, $new) {

		$listUpdated = lists::getOneList($listId);
		$listUpdated->published = $status;


		if (!$status AND ( $listUpdated->list_type == 2 OR $listUpdated->list_type == 3 )) {
			$published = 0;
			xmailing::updateMailingFromList($listId, $published, $listUpdated->html, '');
		}
		if ($status) {
			$d['published'] = 1;
		} else {
			$d['published'] = 0;
		}
		$d['list_id'] = $listId;

		return lists::updatePublish($d);

	 }

	 function updateList($listId, $listUpdated, $status, $new) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$total = 0;
		@set_time_limit(0);

		if ( $listUpdated->list_type !='7' AND $listUpdated->delay_min > $listUpdated->delay_max ) { $listUpdated->delay_min  = $listUpdated->delay_max;}

	    $erro->ck = lists::updateListData($listUpdated);
	    if (!$erro->Eck(__LINE__ ,  '8304')) {
	         return false;
	    } else {
		  	if ($listUpdated->auto_add == 2) {
					if ( !ACA_CMSTYPE ) {
						subscribers::updateSubscribers( true );
					}//endif
		      	  $subscribers = subscribers::getSubscribers( -1 , -1 , '' , $total , 0, '', 1, 1,'' );
			     	$subId = jnewsletter::convertObjectToIdList($subscribers , 'id');
		      	  if (!empty($subId)) {
				    $erro->ck = queue::updateQueues($subId, '', $listId, $listUpdated->acc_id, $new);
					if (!$erro->Eck(__LINE__ ,  '8305')) return false;
		      	  }
	         } elseif ($status =='' AND $listUpdated->list_type == 2) {
				$queues = queue::getAllOneList($listId);

		      $qid = jnewsletter::convertObjectToIdList($queues , 'qid');
		      $erro->ck = queue::updatePublished($qid, $status);
		      if (!$erro->Eck(__LINE__ , '8306')) return false;
	         } else {
	         	if (class_exists('auto'))
	         		auto::updateListNb($listUpdated->list_type, $listUpdated->id);
	         }
		 }

		lisType::updateNewsletters();

		 return true;
	 }


	function updateListData($listUpdated) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		/*if (substr_count($listUpdated->layout, '[CONTENT]')<1) {
			$listUpdated->layout .= '[CONTENT]';
		}*/

		if(!empty($listUpdated->footer)){
			if (substr_count($listUpdated->layout, '[SUBSCRIPTIONS]')<1) {
				$listUpdated->layout .= '<p>[SUBSCRIPTIONS]</p>';
			}
		}

		$query = "UPDATE `#__jnews_lists` SET ".
		" `list_name` = '".addslashes($listUpdated->list_name)."', ".
		" `list_desc` = '".addslashes($listUpdated->list_desc)."', ".
		" `sendername` = '".trim($listUpdated->sendername)."', ".
		" `senderemail` = '".trim($listUpdated->senderemail)."', ".
		" `bounceadres` = '".trim($listUpdated->bounceadres)."', ".
		" `layout` = '".addslashes($listUpdated->layout)."', ".
		" `template` = '$listUpdated->template', ".
		" `subscribemessage` = '".addslashes($listUpdated->subscribemessage)."', ".
		" `unsubscribemessage` = '".addslashes($listUpdated->unsubscribemessage)."', ".
		" `notifyadminmsg` = '".addslashes($listUpdated->notifyadminmsg)."', ".
		" `unsubscribesend` = '$listUpdated->unsubscribesend', ".
		" `unsubscribenotifyadmin` = '$listUpdated->unsubscribenotifyadmin', ".
		" `html` = '$listUpdated->html',".
		" `hidden` = '$listUpdated->hidden', ".
		" `list_type` = '$listUpdated->list_type', ".
		" `auto_add` = '$listUpdated->auto_add',".
		" `user_choose` = '$listUpdated->user_choose',".
		" `cat_id` = '$listUpdated->cat_id',".
		" `delay_min` = '$listUpdated->delay_min',".
		" `delay_max` = '$listUpdated->delay_max',".
		" `follow_up` = '$listUpdated->follow_up',".
		" `owner` = '$listUpdated->owner',".
		" `acc_level` = '$listUpdated->acc_level',".
		" `acc_id` = '$listUpdated->acc_id' ,".
		" `footer` = '$listUpdated->footer' ,".
		" `notification` = '$listUpdated->notification' ,".
		" `notify_id` = '$listUpdated->notify_id' ,".
		" `published` = '$listUpdated->published'";
		//lala	" `color` = '$listUpdated->color' ";
		//if ( isset($listUpdated->next_date) ){
			//if(!is_numeric($listUpdated->next_date)) $listUpdated->next_date = strtotime($listUpdated->next_date);
			//$query .= ", `next_date` = '$listUpdated->next_date' ";
		//}
		//if ( isset($listUpdated->start_date) ) //$query .= ", `start_date` = '$listUpdated->start_date' ";
		$query .= " WHERE `id` = ".intval($listUpdated->id);
 		$database->setQuery($query);
		$database->query();

		$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8349', $database);

    }

function updateMailingData($listUpdated) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = "UPDATE `#__jnews_mailings` SET ".
		" `cat_id` = '$listUpdated->cat_id',".
		" `delay_min` = '$listUpdated->delay_min',".
		" `delay_max` = '$listUpdated->delay_max',".
		" `published` = '$listUpdated->published'";
		if ( isset($listUpdated->next_date) ){
			if(!is_numeric($listUpdated->next_date)) $listUpdated->next_date = strtotime($listUpdated->next_date);
			$query .= ", `next_date` = '$listUpdated->next_date' ";
		}
		if ( isset($listUpdated->start_date) ) $query .= ", `start_date` = '$listUpdated->start_date' ";

		$query .= " WHERE `id` = ".intval($listUpdated->id);
 		$database->setQuery($query);
		$database->query();

		$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8349', $database);

    }


	function updatePublish($d) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
	 	$query = "UPDATE `#__jnews_lists` SET ";
		$query .= " `published` = ".$d['published'] ;
		$query .= " WHERE `id` = ".$d['list_id'];
 		$database->setQuery($query);
		$database->query();
	 	$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8347', $database);

    }

	function copyList($listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();
		$list = lists::getOneList($listId);
		$copyList = $list;
		$erro->err = 'do once';
		$ii = 0;
		$time = time();
		$listname = $copyList->list_name.'_'.$time;
		$copyList->published = 0;
     	while (!empty($erro->err) AND $ii<10):
            $ii++;
            $copyList->list_name = $listname;
			//$copyList->subscribemessage = 'test-jnewsletter';
			//lala do not forget to add color field here

			$query = "INSERT INTO `#__jnews_lists` (`list_name`,`list_desc` , `sendername` , `senderemail`, `bounceadres`, `layout` ," .
					" `template` , `subscribemessage`, 	`unsubscribemessage`,`notifyadminmsg` ,	`unsubscribesend` , `unsubscribenotifyadmin`, `html` ," .
					" `hidden` , `list_type`, `auto_add` ,	`user_choose` ,  `cat_id` , 	`delay_min` ," .
					" 	`delay_max`, 	`follow_up` , 	`owner` , `acc_level` ,	`acc_id` ,	`published`,	`footer`,	`notify_id`	) " .
				"\n VALUES ( '".addslashes($copyList->list_name)."', '".addslashes($copyList->list_desc)."', ".
				"'".$copyList->sendername."', ".
				"'".$copyList->senderemail."', ".
				"'".$copyList->bounceadres."', ".
				"'".addslashes($copyList->layout)."', ".
				"'".$copyList->template."', ".
				"'".addslashes($copyList->subscribemessage)."', ".
				"'".addslashes($copyList->unsubscribemessage)."', ".
				"'".addslashes($copyList->notifyadminmsg)."', ".
				"'".$copyList->unsubscribesend."', ".
				"'".$copyList->unsubscribenotifyadmin."', ".
				"'".$copyList->html."', ".
				"'".$copyList->hidden."', ".
				"'".$copyList->list_type."', ".
				"'".$copyList->auto_add."', ".
				"'".$copyList->user_choose."', ".
				"'".$copyList->cat_id."', ".
				"'".$copyList->delay_min."', ".
				"'".$copyList->delay_max."', ".
				"'".$copyList->follow_up."', ".
				"'".$copyList->owner."', ".
				"'".$copyList->acc_level."', ".
				"'".$copyList->acc_id."', ".
				"'".$copyList->published."', ".
				"'".$copyList->footer."', ".
				//lala "'".$copyList->color."', ".
				"'".$copyList->notify_id."' )";

			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8307')) $listname = $listname.$ii ;

         endwhile;

		if (!$erro->E(__LINE__ ,  '8308')) {
			return false;
		} else {
  			$xf->plus('totallist0', 1);
			$xf->plus('act_totallist0', 1);
			$xf->plus('totallist1', 1);
			$xf->plus('act_totallist1', 1);
        	return true;
		}
	}

	function deleteList($listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();
		$list = lists::getOneList($listId);
		$query = 'DELETE FROM `#__jnews_lists` WHERE `id` = ' . $listId;
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8317', $database);

		$listmail=xmailing::getListMailing( $listId );


		if(!empty($listmail)){
			foreach($listmail as $listmailId){
				//byMaria delete mailings in queue where mailingid=mailingid
				$query = 'DELETE FROM `#__jnews_queue` WHERE `mailing_id` = ' . $listmailId;
				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ ,  '8319', $database);
				//byMaria delete mailins in mailings where mailingid=mailingid
				$query = 'DELETE FROM `#__jnews_mailings` WHERE `id` = ' . $listmailId;
				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ ,  '8319', $database);
			}
		}

		//byMaria delete mailings in listmailings where listid=listid
		$query = 'DELETE FROM `#__jnews_listmailings` WHERE `list_id` = ' . $listId;
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8319', $database);
		//byMaria delete listsubscribers in listsubscribers where listid=listid
		$query = 'DELETE FROM `#__jnews_listssubscribers` WHERE `list_id` = ' . $listId;
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8319', $database);


		/*//$list_id=xmailing::getMailingList($mailingId);
		$query = 'DELETE FROM `#__jnews_queue` WHERE `list_id` = ' . $listId;
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8319', $database);*/

		$mailings = xmailing::getMailings($listId, '', -1, -1, '', $total, '', false, false);
		if (!empty($mailings)) {
			foreach($mailings as $mailing) {
				$listingList[] = $mailing->id;
			}

			$query = "DELETE FROM `#__jnews_stats_global` WHERE `mailing_id` IN ( ".implode( ' , ', $listingList )." ) " ;
			$database->setQuery($query);
			$database->query();
			$erro->err .= $database->getErrorMsg();
			$erro->E(__LINE__ ,  '8320', $database);

			$query = "DELETE FROM `#__jnews_stats_details` WHERE  `mailing_id` IN ( ".implode( ' , ', $listingList )." ) ";
			$database->setQuery($query);
			$database->query();
			$erro->err .= $database->getErrorMsg();
			$erro->E(__LINE__ ,  '8321', $database);
		}

		if (!$erro->result) {
			return false;
		} else {
			$xf->plus('act_totallist0', -1);
			$xf->plus('act_totalmailing'.$list->list_type, -1);
        	return true;
		}

	}

	/* Function that will get the an entry in the jnewsletter list depend on the type passed
    	 * Ive created this function to avoid problems regarding the current structure of jnewsletter
    	 * because ive modifications has been done in the current structure and i need this entry for the previous structure of jnewsletter to work
    	 * @param int $mailType - mailing type
    	 * @return int $id - mailing id
    	 * Author : Gino <gino@ijoobi.com>
    	*/
	function getListFirstEntry( $mailType=0 )
	{
		static $database=null;
		if( !isset( $database ) ) $database =& JFactory::getDBO();
		if( !empty($listType) ) $query = 'SELECT `id` FROM `#__jnews_mailings` WHERE `mailing_type`='. $mailType;
		else $query = 'SELECT `id` FROM `#__jnews_mailings` LIMIT 1';
		$database->setQuery($query);
		$result = $database->loadResult();

		return $result;
	} //endfct

	/* Function that will check if the list table is empty/published or not
	 * @return boolean $returnValue - will return true if theres at list one list published or existed
	 * Author : Gino
	*/
	function checkListNotEmpty($listType=1)
	{
		static $database=null;
		if( !isset( $database ) ) $database =& JFactory::getDBO();
		$query = "SELECT `id` FROM `#__jnews_lists` WHERE `published` = 1 AND `list_type` = ". $listType;
		$database->setQuery($query);
		$result = $database->loadResult();

		$returnValue = ( !empty($result) ) ? true : false;
		return $returnValue;
	} //endfct

	function getListCount( $listType=0 )
	{
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		$query = "SELECT count(`id`) FROM `#__jnews_lists` ";
		if( !empty($listType) ) $query .= "WHERE `list_type` =". $listType;
		$database->setQuery( $query );
		$result = $database->loadResultArray();

		$count = ( !empty($result) ) ? $result : 0;
		return $count;
	} //endfct


 } //endclass


