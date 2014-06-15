<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
function mailing( $action, $task, $listId, $listType, $mailingId, $message ) {
	$showMailings = false;
	$database =& JFactory::getDBO();

	// defined toggle for publish and unpublish of mailings
	if( !empty($task) && ( $task == 'togle' ) ){
		$id = JRequest::getVar( 'mailingid' );
		$col = JRequest::getVar( 'col' );
		$mailingId = ( !empty( $id ) && !empty($col) ) ? $id : $mailingId;
		$task = ( !empty( $mailingId ) && !empty($col) ) ? $col : $task;
	} //endif

	switch ($task) {

		case ('edit') :

			if ( ACA_CMSTYPE ){	// joomla 15
				$issue_nb = intval(JRequest::getVar('issue_nb', 1));
			}//endif

			$mailingType = JRequest::getVar( 'listype' );
			$mySess =& JFactory::getSession();
    		$mySess->set('listype', $mailingType, 'LType');

			if( !empty($listId) ){
				$list = lists::getOneList($listId);
			}
			else{
				$list = lists::getListFirstEntry();
			} //endif

			$new = (empty($mailingId) || $mailingId == 0) ? true : false;

			$mailing = xmailing::getOneMailing($list, $mailingId, $issue_nb, $new);
			$mailing->mailing_type = $mailingType;
			// set default mailing parameters
			$my =& JFactory::getUser();
			$subscribers = subscribers::getSubscriberInfoFromUserId($my->id);

			$subscribers->name = (isset($subscribers->name)) ? $subscribers->name : '';
			$subscribers->email = (isset($subscribers->email)) ? $subscribers->email : '';
			$mailing->fromname = ( !isset( $mailing->fromname ) || empty( $mailing->fromname ) ) ? $subscribers->name : $mailing->fromname;
			$mailing->fromemail = ( !isset( $mailing->fromemail ) || empty( $mailing->fromemail ) ) ? $subscribers->email : $mailing->fromemail;
			$mailing->frombounce = ( !isset( $mailing->frombounce ) || empty( $mailing->frombounce ) ) ? $GLOBALS[ACA.'sendmail_from'] : $mailing->frombounce;

			$show = lisType::showType($mailing->mailing_type , 'editmailing');
			if ($mailing->published !=1 OR $mailing->mailing_type != 1 OR (isset($show['admin']) AND $show['admin'])){
			   	$forms['main'] = " <form action='index2.php' method='post' enctype='multipart/form-data' name='adminForm'> \n " ;
	    	    xmailing::_header($task, $action, $mailing->mailing_type , $message, 'edit');
	    	    //echo 'MYYY:'. $mailing->next_date;
				mailingsHTML::editMailing($mailing, $new, $listId, $forms, $show);
				$go[] = jnewsletter::makeObj('act', $action);
				backHTML::formEnd($go);
			}else{
				$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n\r" ;
              	xmailing::_header($task, $action, $mailing->mailing_type , $message );
				//backHTML::formStart();
				mailingsHTML::viewMailing($mailing, $forms);
				$go[] = jnewsletter::makeObj('act', 'mailing');
				$go[] = jnewsletter::makeObj('task', 'viewmailing');
				$go[] = jnewsletter::makeObj('mailingid', $mailing->id);
				backHTML::formEnd($go);
			}
			break;

		case ('new') :
		case ('add') :
				// check if atleast one list exist and published
				// if false then restrict entry
				$mailingType = JRequest::getVar( 'listype' );
				$type = ( $mailingType == 2 ) ? 2 : 1;
				$result = lists::checkListNotEmpty( $type );
				if( !$result ){
					if( $type == 2 ) $disp = addslashes(_ACA_CHECKCAMPAIGNFOUND);
					else $disp = addslashes(_ACA_CHECKLISTFOUND);
					echo "<script> alert('". $disp ."'); window.history.go(-1);</script>\n";
					break;
				} //endif

				$mailingType = JRequest::getVar( 'listype' );
				if( empty($listId) ) $listId = JRequest::getVar( 'listid' );
				if( !empty($listId) ) $mailingType = ( lisType::getListType( $listId ) == 2 ) ? 2 : 1;
				JRequest::setVar( 'listype', $mailingType );

				$total = xmailing::countMailings($listId, $mailingType);
				$total++;
				compa::redirect('index2.php?option=com_jnewsletter&act=mailing&task=edit&mailingid=0&issue_nb='.$total.'&listype='.$mailingType);
			break;
		case ('saveSend') :
			xmailing::saveMailing($mailingId, $listId);

		//Checking by eve
		case ('sendNewsletter') :
			if ($listId<1 OR $listType<0 ) {
				$mailing = xmailing::getOneMailing('', $mailingId, '', $new, true);
				$query='Select list_id from #__jnews_listmailings where mailing_id='.$mailingId;
				$database->setQuery($query);
				$database->query();
				$listId=$database->loadResult();
				//$listType=$listResult->list_type;

				$mailingType = $mailing->mailing_type;
				//$listType = $mailing->list_type;
				//$listId = $mailing->id;
			}
            if ( lisType::sendType($mailingType) ) {
				$checkStatus = lists::checkStatus($listId);
				if ( $checkStatus == false ) {
					$message = jnewsletter::printYN( 0 , _ACA_MESSAGE_SENT_SUCCESSFULLY , _ACA_NOT_PUBLISHED);
					$showMailings = true;
				} else {
					$receivers = subscribers::getSubscribers(-1, -1, '', $total, $listId, '', 1, 1, 'sub_emailA');
					if (empty($receivers)) {
						$message = jnewsletter::printYN( 0 , _ACA_MESSAGE_SENT_SUCCESSFULLY , _ACA_NO_SUSCRIBERS);
						$showMailings = true;
					} else {
				        $status = queue::sendNewsletter( true, $mailingId, $listId, $receivers, $message);
				        $message = jnewsletter::printYN( $status ,  _ACA_MESSAGE_SENT_SUCCESSFULLY , $message );
						$showMailings = true;
						flush();
						sleep(5);
						//compa::redirect('index2.php?option=com_jnewsletter&act=mailing&mailingtype='.$mailingType, $message);
						compa::redirect('index2.php?option=com_jnewsletter&act=mailing&listype='.$mailingType, $message);
					}
				}
			} else {
				if (class_exists('auto'))
					$message = jnewsletter::printYN( auto::processQueue( true ) , _ACA_QUEUE_SENT_SUCCESS , _ACA_ERROR);
					$showMailings = true;
			}
			break;

		case ('savePreview') :
			xmailing::saveMailing($mailingId, $listId);

		case ('preview') :
			if ( ACA_CMSTYPE ) {	// joomla 15
				$emailaddress = JRequest::getVar('emailaddress', '');
			}//endif
			if(!empty($emailaddress)){
				$status = xmailing::preview($mailingId, $listId, $message);
				$message = jnewsletter::printYN( $status ,  _ACA_MESSAGE_SENT_SUCCESSFULLY , $message );
			}
         	backHTML::_header( _ACA_PREVIEW_TITLE  , 'preview.png' , $message , $task, $action );
			mailingsHTML::previewMailingHTML($mailingId, $listId, $listType);

			if($listId > 0) {
				$archivemailing = xmailing::getMailingView($mailingId,$listId);
			}else{
				$archivemailing = xmailing::getMailingView($mailingId);
			}
			$forms['main'] = '';
			$list = lists::getOneList($archivemailing->list_id);
			$textonly = '';
			jnewsletter_mail::getContent($archivemailing->images, $list->layout, $archivemailing->htmlcontent, $textonly);

			//modified by gerald
			if (!isset($template_id) || empty($template_id)) $template_id = templates::getTemplateID($mailingId);
			$styles = templates::getTemplateStyles($template_id);
			$archivemailing->htmlcontent = templates::insertStyles($archivemailing->htmlcontent, $textonly, $styles);
			//
			//jnewsletter_mail::replaceClass($archivemailing->htmlcontent,$textonly);
			mailingsHTML::viewMailing($archivemailing, $forms);
			break;

		case ('view') :
			$mailingType = JRequest::getVar( 'listype' );
			if( !empty($mailingType) ){
				$mySess =& JFactory::getSession();
    				$mySess->set('listype', $mailingType, 'LType');
			} //endif

			if ($mailingId != 0) {
				if($listId > 0) {
					$archivemailing = xmailing::getMailingView($mailingId,$listId);
				}else{
					$archivemailing = xmailing::getMailingView($mailingId);
				}
				$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n\r" ;
               xmailing::_header ($task, $action, $listType , $message );
				backHTML::formStart('' , 0  ,'' );
				mailingsHTML::viewMailing($archivemailing, $forms);
				$go[] = jnewsletter::makeObj('act', 'mailing');
				$go[] = jnewsletter::makeObj('task', 'viewmailing');
				$go[] = jnewsletter::makeObj('listid', $archivemailing->list_id);
				backHTML::formEnd($go);
			}
			break;
		case ('deleteMailing') :
			$d['mailing'] = xmailing::getOneMailing('', $mailingId, '', $new);
			$message = jnewsletter::printYN( xmailing::delete( $d ) , @constant( $GLOBALS[ACA.'listname'.$d['mailing']->list_type] ). _ACA_SUCCESS_DELETED , _ACA_ERROR );
			$showMailings = true;
			break;
		case ('cancel') :
			compa::redirect( 'index2.php?option=com_jnewsletter' );
			break;
	   	case ('copy') :
	   		$message = jnewsletter::printYN( xmailing::copyMailing($mailingId) ,  _ACA_MAILING_COPY , _ACA_ERROR );
			$showMailings = true;
			break;
		case ('cancelMailing') :
			$showMailings = true;
			break;
	   	case ('publishMailing') :
	   		$mailing = xmailing::getOneMailing('', $mailingId, '', $new);
	   		$message = jnewsletter::printYN( xmailing::publishMailing($mailingId) ,  @constant( $GLOBALS[ACA.'listname'.$mailing->mailing_type] ) .' '. _ACA_PUBLISHED , _ACA_ERROR );

			$mailingType = xmailing::getMailingType( $mailingId );
	   		compa::redirect( 'index.php?option=com_jnewsletter&act=mailing&listype='. $mailingType );
	      		break;
	   	case ('unpublishMailing') :
	   		$mailing = xmailing::getOneMailing('', $mailingId, '', $new);
	   		$message = jnewsletter::printYN( xmailing::unpublishMailing($mailingId) ,  @constant( $GLOBALS[ACA.'listname'.$mailing->mailing_type] ) .' '. _ACA_UNPUBLISHED , _ACA_ERROR );

	   		$mailingType = xmailing::getMailingType( $mailingId );
	   		compa::redirect( 'index.php?option=com_jnewsletter&act=mailing&listype='. $mailingType );
			break;
	   	case ('cpanel') :
			backHTML::controlPanel();
			break;

		case ('save') :
			$mySess =& JFactory::getSession();
			$mailingType = $mySess->get('listype', '', 'LType');

			$listIdA = JRequest::getVar( 'aca', null );

			// check if atleast one list or campaign is set for the save mailing
			$found = false;
			foreach( $listIdA['aca_mailing_addto'] as $listids => $values ){
				if( $values == 1 )
				{
					$found = true;
					break;
				} //endif
			} //endforeach

			// if there are no list or campaign selected... then redirect back to form
			if( !$found )
			{
				$text = ( $mailingType == 2 ) ? _ACA_SELCT_MAILINGCAMPAIGN : _ACA_SELCT_MAILINGLIST;

				echo "<script> alert('".addslashes($text)."'); window.history.go(-1);</script>\n";
				return false;
			} //endif

			$message = jnewsletter::printYN( xmailing::saveMailing($mailingId, $listId) ,  _ACA_MAILING_SAVED , _ACA_ERROR );

			if( !empty($mailingtype) ){
				compa::redirect( 'index.php?option=com_jnewsletter&act=mailing&listype='.$mailingType );
			}else{
				$showMailings = true;
				unset($GLOBALS["task"]);
	 			unset($_REQUEST["task"]);
			} //endif

			break;
		case ('show') :
			$mySess =& JFactory::getSession();
			$mailingType = $mySess->get('listype', '', 'LType');
			if( !empty( $mailintType ) ){
				$link = 'index.php?option=com_jnewsletter&act=mailing&listype='.$mailingType;
				compa::redirect( $link );
				break;
			} //endif
			$showMailings = true;
			break;
		case ('toggle') : // main toggle for all usage
				$mailingId = JRequest::getVar( 'mailingid' );
				$column = JRequest::getVar( 'col' );
				if( !empty($mailingId) && !empty($column) ){
					$passObj = null;
					$passObj->tableName = '#__jnews_mailings';
					$passObj->columnName = $column;
					$passObj->whereColumn = 'id';
					$passObj->whereColumnValue = $mailingId;

					jnewsletter::toggle( $passObj );
				} //endif
				$mailingType = xmailing::getMailingType( $mailingId );
	   			compa::redirect( 'index.php?option=com_jnewsletter&act=mailing&listype='. $mailingType );
				break;
		default :
			$showMailings = true;
			break;
	}



	if ($showMailings){
		// added this code for pagination ===========================

		$paginationStart = JRequest::getVar( 'pg' );

		if( !empty($paginationStart) )
		{
			$limitstart = 0;
			$limitend = $paginationStart;
		}
		else
		{
			$app =& JFactory::getApplication();
			$limitstart = $app->getUserStateFromRequest( 'limitstart', 'limitstart', 0, 'int' );
			$limitend = $app->getUserStateFromRequest( 'limit', 'limit', 0, 'int' );
		} //endif

		$limittotal = xmailing::countMailings( 0, $listType );

		$setLimit = null;
		$setLimit->total = ( !empty($limittotal) ) ? $limittotal : 0;
		$setLimit->start = ( !empty( $limitstart ) ) ? $limitstart : 0;
		$setLimit->end = ( !empty($limitend) ) ? $limitend : 20;
		// ====================================
		xmailing::showMailings($task, $action, $listId, $listType, $message, true, _ACA_MENU_MAILING, $setLimit);
	} //endif
	return true;
 }//endfct

