<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 function lists( $action, $task, $listId, $listType )
 {
	if ( ACA_CMSTYPE ) {	// joomla 15
		$database =& JFactory::getDBO();
		$my	=& JFactory::getUser();
		$css = '.icon-48-lists { background-image:url('.ACA_PATH_ADMIN_IMAGES .'header/lists.png)}';
		$doc =& JFactory::getDocument();
		$doc->addStyleDeclaration($css, $type = 'text/css');
		$img = 'lists.png';
	}//endif
	$listsearch = JRequest::getVar('listsearch', '' );
	$message ='' ;
	$xf = new xonfig();
	$erro = new xerr( __FILE__ , __FUNCTION__ );
	$erro->show();

	$showLists = true;

	// defined toggle for publish and unpublish of mailings
	if( !empty($task) && ( $task == 'togle' ) )
	{
		$id = JRequest::getVar( 'listid' );
		$col = JRequest::getVar( 'col' );

		$listId = ( !empty( $id ) && !empty($col) ) ? $id : $listId;
		$task = ( !empty( $listId ) && !empty($col) ) ? $col : $task;
	} //endif

	switch ($task) {

		case ('new') :
		case ('add') :
			if ($listType<1) $listType=1;
			//$filename = ACA_JPATH_ROOT. '/components/com_jnewsletter/views/templates/default/default.html';
			//$handle = fopen($filename, "rb");
			//$template = fread($handle, filesize($filename));
			//fclose($handle);
			//$template = str_replace('src="', 'src="'.ACA_JPATH_LIVE.'/', $template);
			$subscriber = subscribers::getSubscriberInfoFromUserId($my->id);

			$showLists = false;
			$newList->id = '';
			$newList->html = 1;
			$newList->new_letter = 1;
			$newList->list_name = '';
			$newList->list_desc = '';
			if(empty($subscriber)){
				$newList->sendername = '';
				$newList->senderemail = '';
				$newList->bounceadres = $GLOBALS[ACA.'sendmail_from'];
			}else{
				$newList->sendername = $subscriber->name;
				$newList->senderemail = $subscriber->email;
				$newList->bounceadres = $subscriber->email;
			}
			//$newList->layout = $template;
			//$newList->template = 0;
			$newList->hidden = 1;
			$newList->auto_add = 0;
			$newList->list_type = $listType;
			$newList->delay_min = 1;
			$newList->delay_max = 7;
			$newList->user_choose = 0;
			$newList->cat_id = '0:0';
			$newList->follow_up ='';
			$newList->notify_id =0;
			$newList->owner = $my->id;
			$newList->acc_level = 25;
			$newList->acc_id = 29;
			$newList->published = 0;
			$newList->start_date = date( 'Y-m-d',  time() );
			$newList->next_date = time();
			$newList->subscribemessage = _ACA_DEFAULT_SUBSCRIBE_MESS;
			$newList->unsubscribemessage =  _ACA_DEFAULT_UNSUBSCRIBE_MESS;
			$newList->notifyadminmsg =  _ACA_UNSUBSCRIBE_ADMIN_NOTIFICATION;
			$newList->unsubscribesend = 1;
			$newList->unsubscribenotifyadmin = 1;
			$newList->footer = 1;
           //$newList->color = ''; commented by lala

		    $forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n " ;
			$show = lisType::showType($newList->list_type , 'editlist');
         	backHTML::_header( _ACA_NEW.' '._ACA_LIST , $img , $message , $task, $action  );
			backHTML::formStart('listedit', $newList->html, '' );
       		listsHTML::editList($newList, $forms, $show);
			$go[] = jnewsletter::makeObj('act', $action);
			$go[] = jnewsletter::makeObj('listid', $newList->id);
			backHTML::formEnd($go);
			break;

		case ('doNew') :
			if ( ACA_CMSTYPE ) {	// joomla 15
				$listname = JRequest::getVar('list_name', '');
				$listType = intval(JRequest::getVar('list_type', 0));
			}//endif

			//$colo = JRequest::getVar('listcolor', ''); commented by lala
			$now = jnewsletter::getNow();
   			$query = "SELECT `id` FROM `#__jnews_lists` WHERE `list_name`= '".addslashes($listname)."' ";
	     	$database->setQuery($query);
			$lId = $database->loadResult();
   			$erro->err = $database->getErrorMsg();
   			$erro->E(__LINE__ ,  '1091' , $database);
			if ($lId>0) {
				echo "<script> alert(' This list already exist, please choose another name. '); window.history.go(-1);</script>\n";
				return false;
			} else {
				//$query = "INSERT INTO `#__jnews_lists` (`list_name`,`createdate`, `color`) VALUES ( '".addslashes($listname)."'  , '$now' , '$colo' )"; //commented by lala
				$query = "INSERT INTO `#__jnews_lists` (`list_name`,`createdate`) VALUES ( '".addslashes($listname)."'  , '$now' )" ;
				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();
			}
			if ($erro->E(__LINE__ ,  '1001' , $database)) {

	   			$query = "SELECT * FROM `#__jnews_lists` WHERE `list_name`= '".addslashes($listname)."' ";
		     	$database->setQuery($query);

					if ( ACA_CMSTYPE ) {	// joomla 15
						$mynewlist = $database->loadObject();
					}//endif

				$mynewlist->list_name = stripslashes($mynewlist->list_name);
				$mynewlist->list_desc = stripslashes($mynewlist->list_desc);
				$mynewlist->layout = stripslashes($mynewlist->layout);
				$mynewlist->subscribemessage = stripslashes($mynewlist->subscribemessage);
				$mynewlist->unsubscribemessage = stripslashes($mynewlist->unsubscribemessage);
				$mynewlist->notifyadminmsg = stripslashes($mynewlist->notifyadminmsg);

	   			$erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ ,  '1005' );
		     	$listId = $mynewlist->id;
		     	$message = jnewsletter::printYN( lists::updateListFromEdit($listId, '', true) ,  _ACA_LIST_ADDED , _ACA_ERROR );
				$xf->plus('totallist0', 1);
				$xf->plus('act_totallist0', 1);
				$xf->plus('totallist'. $listType , 1);
				$xf->plus('act_totallist'. $listType , 1);
			}
			break;

		case ('edit') :

			if ($listId == 0) {
				echo "<script> alert('".addslashes(_ACA_SELECT_LIST)."'); window.history.go(-1);</script>\n";
				return false;
			} else {
				$showLists = false;

				$query = 'SELECT * FROM `#__jnews_lists` WHERE `id` = ' . intval($listId);
				$database->setQuery($query);
				if ( ACA_CMSTYPE ) {	// joomla 15
					$listEdit = $database->loadObject();
				}//endif

				$erro->err = $database->getErrorMsg();
				if (!$erro->E(__LINE__ ,  '1002' )) {
					return false;
				} else {
					$listEdit->list_name = stripslashes($listEdit->list_name);
					$listEdit->list_desc = stripslashes($listEdit->list_desc);
					$listEdit->layout = stripslashes($listEdit->layout);
					$listEdit->subscribemessage = stripslashes($listEdit->subscribemessage);
					$listEdit->unsubscribemessage = stripslashes($listEdit->unsubscribemessage);
					$listEdit->notifyadminmsg = stripslashes($listEdit->notifyadminmsg);

	         		$listEdit->new_letter = 0;
				    $forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n " ;
					$show = lisType::showType($listEdit->list_type , 'editlist');
		         	backHTML::_header( _ACA_EDIT_A. @constant( $GLOBALS[ACA.'listname'.$listEdit->list_type] ).' '._ACA_LIST , $img , $message , $task, $action );
					backHTML::formStart('listedit', $listEdit->html, '' );
		       		listsHTML::editList($listEdit, $forms, $show);
					$go[] = jnewsletter::makeObj('act', $action);
					$go[] = jnewsletter::makeObj('listid', $listEdit->id);
					backHTML::formEnd($go);
				}
			}
			break;

		case ('update') :
		     	$message = jnewsletter::printYN( lists::updateListFromEdit($listId, '', false) ,  _ACA_LIST_UPDATED , _ACA_ERROR );
			break;
		case ('delete') :
           		$message = jnewsletter::printYN( lists::deleteList($listId) ,  _ACA_LIST. _ACA_SUCCESS_DELETED , _ACA_ERROR );
			break;
	   	case ('copy') :
	         	$message = jnewsletter::printYN( lists::copyList($listId) ,  _ACA_LIST_COPY , _ACA_ERROR );
			 break;
	   	case ('publish') :
	      		$message = jnewsletter::printYN( lists::updateListFromList($listId, true, false) ,  _ACA_PUBLISHED , _ACA_ERROR );
			compa::redirect( 'index.php?option=com_jnewsletter&act=list' );
			break;
	   	case ('unpublish') :
			$message = jnewsletter::printYN( lists::updateListFromList($listId, false, false) ,  _ACA_UNPUBLISHED , _ACA_ERROR );
			compa::redirect( 'index.php?option=com_jnewsletter&act=list' );
			break;
		case ('forms') :
		case ('make') :
			if (class_exists('createForm')) {
				createForm::taskOptions($task);
				$showLists = false;
			} else {
				$showLists = true;
			}
			break;
	  case ('cpanel') :
			backHTML::controlPanel();
			return true;
			break;
		case ('toggle') : // main toggle for all usage
				$listid = JRequest::getVar( 'listid' );
				$column = JRequest::getVar( 'col' );

				if( !empty($listid) && !empty($column) )
				{
					$passObj = null;
					$passObj->tableName = '#__jnews_lists';
					$passObj->columnName = $column;
					$passObj->whereColumn = 'id';
					$passObj->whereColumnValue = $listid;

					jnewsletter::toggle( $passObj );
				} //endif

				compa::redirect( 'index.php?option=com_jnewsletter&act=list' );
				break;
	}

	if ($showLists) {
		$listType = JRequest::getVar( 'list_type' );
		$listType = ( !empty($listType) ) ? $listType : 0;

		// create a droplist of list types
		$forms['select'] = "<form  method='post' name='jNewsFilterForm'> ";
		$dropDownList = lisType::getListOption(2, true);
		$forms['droplist'] = JHTML::_('select.genericlist', $dropDownList, 'list_type', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $listType );

		$limit = -1;
		//Title header
   		backHTML::_header( _ACA_MENU_LIST , $img , $message , $task, $action );
   		$show = lisType::showType(0 , 'showListsBack');
		$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		backHTML::formStart('show_mailing' , ''  ,'' );
		//($listId, $listType, $author=null, $order='listnameA', $autoAdd=false, $onlyPublished=true, $onlyName=false, $notification=false, $onlyVisible=false, $listsearch='' ) {

        // added this code for pagination ===========================
		$paginationStart = JRequest::getVar( 'pg' );

		if( !empty($paginationStart) )
		{
			$limitstart = 0;
			$limitend = $paginationStart;
		}else{
			$app =& JFactory::getApplication();
			$limitstart = $app->getUserStateFromRequest( 'limitstart', 'limitstart', 0, 'int' );
			$limitend = $app->getUserStateFromRequest( 'limit', 'limit', 0, 'int' );
		} //endif
		$limittotal = lists::getListCount( $listType );
		$setLimit = null;
		$setLimit->total = ( !empty($limittotal) ) ? $limittotal : 0;
		$setLimit->start = ( !empty( $limitstart ) ) ? $limitstart : 0;
		$setLimit->end = ( !empty($limitend) ) ? $limitend : 20;
       // ====================================

		$listing = lists::getLists(0, $listType, 1, '', false, false,  false, false, false, $listsearch, $setLimit);
		listsHTML::showListingLists( $listing, $action , 'edit' , $forms, $show, $listsearch, $limit, $setLimit);
		$go[] = jnewsletter::makeObj('act', $action);
		backHTML::formEnd($go);
		return true;
	}
 }

