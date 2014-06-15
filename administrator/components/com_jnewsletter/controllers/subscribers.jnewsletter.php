<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
function subscribers( $action, $task, $userid, $listId, $cid ) {
	$erro = new xerr( __FILE__ , __FUNCTION__ );

	if ( ACA_CMSTYPE ) {	// joomla 15
		$subscriberId = intval(JRequest::getVar('subscriber_id', ''));
		$message = JRequest::getVar('message', '');
		$css = '.icon-48-subscribers { background-image:url('.ACA_PATH_ADMIN_IMAGES .'header/subscribers.png)}';
		$doc =& JFactory::getDocument();
		$doc->addStyleDeclaration($css, $type = 'text/css');
		$img = 'subscribers.png';
		$emailField=JRequest::getVar('email', '');
	}//endif
	$doShowSubscribers = true;

	 switch ($task) {

		case ('updateOneSub') :
			$doShowSubscribers = true;
		  	$message = jnewsletter::printYN( subscribers::updateOneSubscriber() ,  _ACA_UPDATED_SUCCESSFULLY , _ACA_ERROR );
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message  , $task, $action );
		break;

		case ('deleteOneSub') :
			$doShowSubscribers = true;
		  	$message = jnewsletter::printYN( subscribers::deleteOneSubscriber($subscriberId) ,  _ACA_SUBSCRIBER_DELETED , _ACA_ERROR );
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message  , $task, $action );
			break;

		case ('cancelSub') :
			$doShowSubscribers = true;
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message  , $task, $action );
			break;

		case ('edit') :
			foreach ($cid as $id) {
				compa::redirect('index2.php?option=com_jnewsletter&act=subscribers&task=show&userid='.$id);
			}
			break;
		case ('show') :

			$doShowSubscribers = false;
			$qid[0] = $userid;
		    $subscriber = subscribers::getSubscribersFromId($qid, false);
		    $lists = lists::getLists(0, 0, 1 , '', false, false);
            $queues = listssubscribers::getSubscriberLists($userid);
	    	$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		     backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message , $task, $action );
		     backHTML::formStart('', 0 ,'' );
		     echo subscribersHTML::editSubscriber($subscriber, $lists, $queues, $forms, jnewsletter::checkPermissions('admin'), false, false );
			$go[] = jnewsletter::makeObj('act', $action);
			$go[] = jnewsletter::makeObj('subscriber_id', $subscriber->id);
			$go[] = jnewsletter::makeObj('user_id', $subscriber->user_id);
			backHTML::formEnd($go);
		break;

		case ('new') :
		case ('add') :


			$doShowSubscribers = false;
			$newSubscriber->id =  '' ;
			$newSubscriber->user_id =  0 ;
			$newSubscriber->name =  '' ;
			$newSubscriber->email =  '' ;
			$newSubscriber->ip = subscribers::getIP();
			$newSubscriber->receive_html =  1 ;
			$newSubscriber->confirmed =  1;
			$newSubscriber->blacklist =  0;
			$newSubscriber->timezone = '00:00:00';
			$newSubscriber->language_iso = 'eng';
			$newSubscriber->params = '';
			$newSubscriber->subscribe_date =  jnewsletter::getNow();
			//column
			if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnews is pro}
			$newSubscriber->column1='';
			$newSubscriber->column2='';
			$newSubscriber->column3='';
			$newSubscriber->column4='';
			$newSubscriber->column5='';
			}//endif for check version
		    $lists = lists::getLists(0, 0, 1 , '', false, false);
            $queues = '';
	    	$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		     backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action );
		     backHTML::formStart('addsubsback' , 0 ,'' );
		     echo subscribersHTML::editSubscriber($newSubscriber, $lists, $queues, $forms, jnewsletter::checkPermissions('admin'), false, false );
			$go[] = jnewsletter::makeObj('act', $action);
			$go[] = jnewsletter::makeObj('subscriber_id', $newSubscriber->id);
			$go[] = jnewsletter::makeObj('user_id', $newSubscriber->user_id);
			backHTML::formEnd($go);

			break;

		case ('doNew') :
				$doShowSubscribers = true;
			  	$message = jnewsletter::printYN( subscribers::insertOneSubscriber() ,  _ACA_UPDATED_SUCCESSFULLY , _ACA_ERROR );
			    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action );
			break;

		case ('delete') :

			if (!is_array( $cid ) || count( $cid ) < 1) {
					echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
					return false;
			} else {
				$status = true;
				foreach ($cid as $id) {
					$erro->ck = subscribers::deleteOneSubscriber($id);
					if (!$erro->ck) $status = false;
				}
		  	$message = jnewsletter::printYN( $status ,  _ACA_SUBSCRIBER_DELETED , _ACA_ERROR );
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message  , $task, $action );
			}
			break;

		case ('update') :
			if (!is_array( $cid ) || count( $cid ) < 1) {
				echo "<script> alert('Select an item to update'); window.history.go(-1);</script>\n";
				return false;
			} else {
				foreach ($cid as $id) {
					if ( ACA_CMSTYPE ) {	// joomla 15
						$changes = JRequest::getVar( $id, array(0));
					}

					if (!isset($changes['receive_html'])) {
						$changes['receive_html'] = 0;
					}
					if (!isset($changes['confirmed'])) {
						$changes['confirmed'] = 0;
					}
				}
			}
			$message = jnewsletter::print_message (_ACA_UPDATED_SUCCESSFULLY , 1 );
			break;

		case ('export') :
			$doShowSubscribers = false;
			subscribersHTML::export($action, $listId);
			break;

		case ('doExport') :
		  	$message = jnewsletter::printYN( subscribers::export($listId) ,  _EXPORT , _ACA_ERROR );
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action );
			break;

		case ('import') :
			$doShowSubscribers = false;
			$lists = lists::getLists(0, 0, 1, 'listnameA', false, false, true);
			subscribersHTML::import($action, $lists);
			break;

		case ('doImport') :
		  	$message = jnewsletter::printYN( subscribers::import($listId) ,  _ACA_IMPORT_FINISHED , _ACA_ERROR );
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action );
			break;
			break;

		case ('subscribeAll') :
			break;

		case ('unsubscribeAll') :
			break;
		case ('cancel') :

			if ($listId != 0) {
				$listId = 0;
			} else {
				compa::redirect('index2.php?option=com_jnewsletter');
			}
			backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action  );
			break;
	case ('cpanel') :
		backHTML::controlPanel();
		$doShowSubscribers = 0;
		break;
	case ('toggle') :
			$subid = JRequest::getVar( 'subid' );
			$column = JRequest::getVar( 'col' );

			if( !empty($subid) && !empty($column) )
			{
				$passObj = null;
				$passObj->tableName = '#__jnews_subscribers';
				$passObj->columnName = $column;
				$passObj->whereColumn = 'id';
				$passObj->whereColumnValue = $subid;

				jnewsletter::toggle( $passObj );
			} //endif

			compa::redirect( 'index.php?option=com_jnewsletter&act=subscribers' );
			break;
	default :
		    backHTML::_header( _ACA_MENU_SUBSCRIBERS , $img , $message, $task, $action  );
		break;
	 }

	 if ($doShowSubscribers) {

		/*if ( ACA_CMSTYPE ) {	// joomla 15
			 $start = intval(JRequest::getVar('start', 0));
			$conf	=& JFactory::getConfig();
			$mail->Mailer 	= $conf->getValue('config.mailer'); // $GLOBALS['mosConfig_mailer'];

			 $limit = intval(JRequest::getVar('limit', $conf->getValue('config.list_limit')  $GLOBALS['mosConfig_list_limit']   ));
			 $emailsearch = JRequest::getVar('emailsearch', '');
			 echo $limit;
		}//endif
 	     $total = 0;*/
  		$limit = -1;
  		$emailsearch = JRequest::getVar('emailsearch', '');
		// added this code for pagination ===========================
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
		// ====================================
    	 	$subscribers = subscribers::getSubscribers($setLimit->start, $setLimit->end, $emailsearch, $setLimit->total, $listId, '','','','sub_dateD');

		if ($listId != 0) {
			$showAdmin = true;
		} else {
			$showAdmin = false;
		}
		$dropDownList =  lisType::getListsDropList(0, '', '');

		if ( ACA_CMSTYPE ) {	// joomla 15
	       $lists['listid'] = JHTML::_('select.genericlist', $dropDownList, 'listid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'id', 'list_name', $listId );
		}//endif

	    $forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		$forms['select'] = " <form method='post' name='jNewsFilterForm'> \n" ;
		backHTML::formStart('show_mailing' , 0  ,'' );

		subscribersHTML::showSubscribers($subscribers, $action, $listId, $lists, $setLimit->start, $setLimit->end, $setLimit->total, $showAdmin, $listId, $emailsearch, $forms, $setLimit);

	 }
	return true;
 }//endfct
