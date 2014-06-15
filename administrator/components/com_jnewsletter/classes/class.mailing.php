<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54


class xmailing {

	 function getMailings($listId, $listType, $start = -1, $limit = -1, $emailsearch, &$total, $order, $showOnlyPublished=true, $viewArchive=false) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$where = array();
		$flag = false;
		$sortList = false;
		$query = 'SELECT * FROM `#__jnews_mailings`';
		if ($listType>0) {
				$where[] = '  `mailing_type` = ' . $listType . ' ';
		}
		elseif ($listId>0) {

				// will filter the mailings shown based on the listid passed on the url
				// added by Gino <gino@ijoobi.com>
				$query2 = 'SELECT B.`mailing_id` FROM `#__jnews_listmailings` AS B WHERE B.`list_id` = '. $listId;
				$database->setQuery( $query2 );
				$result = $database->loadResultArray();
				if(!empty($result)){
					$result = implode( ',', $result);

					$where[] = ' `id` IN ( '. $result .' )';
					$sortList = true;
				} else return;
		}

		if ($showOnlyPublished) {
				$where[] = ' `published` =1 ';
				$where[] = ' `visible`=1 ';
		} else {
				$where[] = ' `published`<>-1 ';
		}

		if ( class_exists('pro') && $sortList ) {

		} elseif (!jnewsletter::checkPermissions('admin') && !$viewArchive) {
				$where[] = ' `author_id` = '. $my->id;
		}

		if (!empty($emailsearch)) {
				$where[] = ' (subject LIKE \'%' . $emailsearch . '%\' OR fromname LIKE \'%' . $emailsearch . '%\') ';
		}

		$query .= (count( $where ) ? " WHERE " . implode( ' AND ', $where ) : "");

		if (empty($order)) $order='idD';
		$query .= jnewsletter::orderBy($order);

		if ($start != -1 && $limit != -1) {
			$query .= ' LIMIT ' . $start . ', ' . $limit;
		}

		$database->setQuery($query);
		$mailing = $database->loadObjectList();
		$erro->err = $database->getErrorMsg();

		if (!$erro->E(__LINE__ ,  '8400', $database)) {
			return '';
		} else {
			foreach($mailing as $key => $mail){
				$mailing[$key]->htmlcontent = stripslashes($mailing[$key]->htmlcontent);
				$mailing[$key]->subject = stripslashes($mailing[$key]->subject);
				$mailing[$key]->attachments = stripslashes($mailing[$key]->attachments);
				$mailing[$key]->images = stripslashes($mailing[$key]->images);
				$mailing[$key]->textonly = stripslashes($mailing[$key]->textonly);
				$mailing[$key]->send_date = stripslashes($mailing[$key]->send_date);
			}

		 	return $mailing;
		 }
	 }

	 function getFirstMailingId($listId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		 $list = lists::getOneList($listId);
		 if (!empty($list->id) AND $list->list_type == 2) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `id` FROM `#__jnews_mailings` WHERE ( `list_id` = '.$listId. ' AND `issue_nb`=1 AND `published`!= -1 ) ';
			$database->setQuery($query);
			$mailingId = $database->loadResult();
			$erro->err = $database->getErrorMsg();

			if (!$erro->E(__LINE__ ,  '8401', $database)) return false;
		} else {
		 	$mailingId = '';
		 }
		return $mailingId;
	 }


	 function getMailingType($mailingId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT `mailing_type` FROM `#__jnews_mailings` WHERE `id` = '.$mailingId;
		$database->setQuery($query);
		$lisType = $database->loadResult();
		$erro->err = $database->getErrorMsg();

		if (!$erro->E(__LINE__ ,  '8402', $database)) {
			return '';
		}

		return $lisType;
	 }


	 function getOneMailingSmart( $listId, $issue_nb ) {
		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		} //endif

		if ($listId>0) {
			$mailing = '';
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			//$query = 'SELECT * FROM `#__jnews_mailings` WHERE `list_id` = ' . $listId ; original commented by eve

			//The value $listId is the mailing_id now
    		$query = 'SELECT * FROM `#__jnews_mailings` WHERE `id` = ' . $listId;
			//$query .= ' AND `issue_nb` = ' . $issue_nb ; //original commented by eve
			$query .= ' AND `published` != -1';
			$database->setQuery($query);
			$mailing = $database->loadObject();

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8403', $database)) {
				return false;
			}
			else{
				$mailing->htmlcontent = stripslashes($mailing->htmlcontent);
				$mailing->subject = stripslashes($mailing->subject);
				$mailing->attachments = stripslashes($mailing->attachments);
				$mailing->images = stripslashes($mailing->images);
				$mailing->textonly = stripslashes($mailing->textonly);
				$mailing->send_date = stripslashes($mailing->send_date);
				if (!empty($mailing->attachments)) {
					$mailing->attachments = explode("\n", $mailing->attachments);
					array_pop($mailing->attachments);
				}
				if (!empty($mailing->images)) {
					$mailing->images = explode("\n", $mailing->images);
					array_pop($mailing->images);
				}
		 		return $mailing;
			}
		}
		else {
			$mailing ='';
		}
	 }


	 function getOneMailing($list, $mailingId, $issue_nb, &$new, $send = false) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$database =& JFactory::getDBO();
		}//endif

		if ($mailingId>0) {
			$mailing = '';
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_mailings` WHERE `id` = ' . $mailingId .' LIMIT 1';
			$database->setQuery($query);
					if ( ACA_CMSTYPE ) {	// joomla 15
						$mailing = $database->loadObject();
					}

			$erro->err = $database->getErrorMsg();

			if (!$erro->E(__LINE__ ,  '8403', $database)) {
				return false;
			}
		} else {
			$mailing ='';
		}

		if(empty($mailing)) {
			$mailing->id = $mailingId;
			$mailing->htmlcontent = '';
			$mailing->subject = '';
			$mailing->attachments = '';
			$mailing->images = '';
			$mailing->textonly = '';
			$mailing->published = '0';
			$mailing->visible = 1;
			$mailing->html = ( isset($list->html) ) ? $list->html : 0;
			if ($issue_nb > 1 ) $mailing->delay = 1440; else $mailing->delay = 0;
			$mailing->issue_nb = $issue_nb;
			$mailing->author_id = $my->id;
			$new = true;
			if (!empty($list)) {
				$mailing->mailing_type = ( isset( $list->list_type ) ) ? $list->list_type : 0;
				$mailing->fromname = ( isset( $list->sendername ) ) ? $list->sendername : '';
				$mailing->fromemail = ( isset( $list->senderemail ) ) ? $list->senderemail : '';
				$mailing->frombounce = ( isset( $list->bounceadres ) ) ? $list->bounceadres : '';
/*cm b mary*/	//$mailing->send_date = ($GLOBALS[ACA.'listype2'] == 1) ? date( 'Y-m-d H:i:s', time() + ACA_TIME_OFFSET *60*60 - date('Z') ) : '0000-00-00 00:00:00';
/*a b mary*/	$mailing->send_date = ($GLOBALS[ACA.'listype2'] == 1) ? date( 'Y-m-d H:i:s', time() + ACA_TIME_OFFSET *60*60 - date('Z') )  : '0';
				$mailing->htmlcontent = ( isset( $list->layout ) ) ? $list->layout : '';
			} else {
				$mailing->fromname = '';
				$mailing->fromemail = '';
				$mailing->frombounce = '';
				$mailing->mailing_type = 0;
				$mailing->send_date = '';
			}
		} else {
			$new = false;
		}

		$mailing->htmlcontent = stripslashes($mailing->htmlcontent);
		$mailing->subject = stripslashes($mailing->subject);
		$mailing->attachments = stripslashes($mailing->attachments);
		$mailing->images = stripslashes($mailing->images);
		$mailing->textonly = stripslashes($mailing->textonly);

		if (!$new) {
			$mailing->send_date = date( 'Y-m-d H:i:s' , stripslashes($mailing->send_date));
		}

		if (!empty($mailing->attachments)) {
			$mailing->attachments = explode("\n", $mailing->attachments);
			array_pop($mailing->attachments);
		} else {
			$mailing->attachments = array();
		}
		if (!empty($mailing->images)) {
			$mailing->images = explode("\n", $mailing->images);
		} else {
			$mailing->images = array();
		}
		jnewsletter_mail::getContent($mailing->images, 0, $mailing->htmlcontent, $mailing->textonly, $send);
		return $mailing;
	 }


	 function getQuickMailingIssue($listId, $issueNb, &$total) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$mailing= null;
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT * FROM `#__jnews_mailings` WHERE `list_id` = ' . $listId;
		$query .= ' AND `issue_nb` = ' . $issueNb;
		$query .= ' AND `published` != -1';
		$database->setQuery($query);
					if ( ACA_CMSTYPE ) {	// joomla 15
						$mailing = $database->loadObject();
					}
		$erro->err = $database->getErrorMsg();

		if (empty($mailing)) {
			return false;
		} else {
			$mailing->htmlcontent = stripslashes($mailing->htmlcontent);
			$mailing->subject = stripslashes($mailing->subject);
			$mailing->attachments = stripslashes($mailing->attachments);
			$mailing->images = stripslashes($mailing->images);
			$mailing->textonly = stripslashes($mailing->textonly);
			$mailing->send_date = stripslashes($mailing->send_date);

			return $mailing;
		}
	 }


	 function getMailingView($mailingId,$listId=0) {

		$archivemailing = '';
		if ($mailingId != 0) {
			if($listId > 0) {
				$list = lists::getOneList($listId);
				$archivemailing = xmailing::getOneMailing($list, $mailingId, 0, $new);
			}else{
				$archivemailing = xmailing::getOneMailing(0, $mailingId, 0, $new);
			}

			if ($new) {
				return '';
			} else {

				if(!(strlen($archivemailing->textonly) > 0)) {
					$archivemailing->textonly = jnewsletter_mail::htmlToText($archivemailing->htmlcontent);
				}

				if (ACA_CMSTYPE) {
					global $mainframe;
					JPluginHelper::importPlugin( 'jnewsletter' );
					$bot_results = $mainframe->triggerEvent('jnewsletterbot_transformall', array(&$archivemailing->htmlcontent, &$archivemailing->textonly));
				}

				preg_match_all('/<img([^>]*)src="([^">]+)"([^>]*)>/i', $archivemailing->htmlcontent, $images, PREG_SET_ORDER);
				foreach($images as $image) {
					$image[2] = preg_replace('/(\.\.\/)+/', '/', $image[2]);

					$image[2] = str_replace(array(ACA_JPATH_LIVE,ACA_JPATH_LIVE_NO_HTTPS), '', $image[2]);

					$image[2] = preg_replace('/^\//', '', $image[2]);
					if (stristr($image[2], 'http://') === false) {
						// remove unneeded directory information
						if (stristr($image[2], 'images/stories/') !== false) {
							$image[2] = '/' . stristr($image[2], 'images/stories/');
						} // end if
						$replacement = '<img ' . $image[1] . 'src="' . ACA_JPATH_LIVE_NO_HTTPS . $image[2] . '"' . $image[3] . '>';
					} else {
						$replacement = '<img ' . $image[1] . 'src="' . $image[2] . '"' . $image[3] . '>';
					} // end if
					$archivemailing->textonly = str_replace($image[0], $replacement, $archivemailing->htmlcontent);
				}

			}
		}

		return $archivemailing;
	 }


	/* Function that will count the number of mails available
	 * @param int $listId - list / mailing id
	 * @param int $listType - list / mailing Type
	 * @return int $counts
	 * Modified by : Gino
	*/
	function countMailings($listId, $listType)
	{
		if ( ACA_CMSTYPE )
		{
			$database =& JFactory::getDBO();
		} //endif

		$query = '';
		if($listId>0)
		{
			$query = "SELECT MAX(issue_nb) FROM #__jnews_mailings";
//			$query .= " WHERE `published` != -1 AND `list_id` =".$listId;
			$query .= " WHERE `published` != -1 AND `list_id` = 0";
		}
		elseif($listType<>'')
		{
			$query = "SELECT COUNT(*) FROM #__jnews_mailings";
			$query .= " WHERE `published` != -1 AND `mailing_type` =".$listType ;
		} //endif

		$database->setQuery($query);
		$counts = $database->loadResult();

		return $counts;
   	} //endfct


	 function showMailings($task, $action, $listId, $listType, $message, $showHeader, $title, $setLimit=null ) {
		if ( ACA_CMSTYPE ) {	// joomla 15
			$start = JRequest::getVar('start', '0' );
			$emailsearch = JRequest::getVar('emailsearch', '' );
			$dropList = JRequest::getVar('droplist', 'ZZZZ' );
		} //endif

		 //ADRIEN
		 //$limit = mosGetParam($_REQUEST, 'limit', $GLOBALS['mosConfig_list_limit']);
		 $limit = -1;
		 if ($dropList=='ZZZZ') $dropList = $listType .'-'. $listId;
 	     $total = 0;

		$dropListValues = explode ('-', $dropList);
		$listType = $dropListValues[0];
		$listId = $dropListValues[1];
		if ($listId>0) $listTypeM = 0; else $listTypeM = $listType;

		 $orddef = 'idD';
		 if($listType == 2){
		 	$orddef = 'idA';
		 }
		if ( ACA_CMSTYPE ) {	// joomla 15
			$order = JRequest::getVar('order', $orddef );
		}//endif

		if ($listId==0) {
	      $lists['title'] = lisType::chooseType($task, $action, $listType , 'titles', '', $title);
	   } else {
			$listing = lists::getLists($listId, 0, 1, '', false, false, true);
			$lists['title'] =  $title."<span style='color: rgb(51, 51, 51);'>".$listing[0]->list_name."</span>";
	   }

		$dropDownList =  lisType::getMailingDropList($listId, $listType, $order);
		if ( ACA_CMSTYPE ) {	// joomla 15
			$lists['droplist'] = JHTML::_('select.genericlist', $dropDownList, 'droplist', 'class="inputbox" size="1" onchange="document.jNewsFilterForm.submit();"', 'id', 'name', $dropList );
		} //endif

		$mailings = xmailing::getMailings($listId, $listTypeM, $setLimit->start,  $setLimit->end, $emailsearch, $setLimit->total, $order, false, false);

	    $forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n\r" ;
	    $forms['select'] = " <form action='index2.php' method='post' name='jNewsFilterForm'> \n\r" ;

		$show = lisType::showType($listType , 'showMailings');

		if ($showHeader) xmailing::_header($task, $action, $listType , $message, '' );
		backHTML::formStart('show_mailing' , 0 ,'' );
		mailingsHTML::showMailingList($mailings, $lists, $start, $limit, $total, $emailsearch, $listId, $listType, $forms, $show, $action, $setLimit );
		backHTML::formEnd();

	 }


	 function delete($d) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();

		$query = 'DELETE FROM `#__jnews_stats_global` WHERE  `mailing_id` = \'' . $d['mailing']->id . '\'';
		$database->setQuery($query);
		$database->query();
		$erro->err .= $database->getErrorMsg();
		$query = 'DELETE FROM `#__jnews_stats_details` WHERE  `mailing_id` = \'' . $d['mailing']->id . '\'';
		$database->setQuery($query);
		$database->query();
		$erro->err .= $database->getErrorMsg();
		$query = 'DELETE FROM `#__jnews_queue` WHERE `mailing_id` = \'' . $d['mailing']->id . '\'';
		$database->setQuery($query);
		$database->query();
		$erro->err .= $database->getErrorMsg();

		$query = 'DELETE FROM `#__jnews_mailings` ' ;
		$query .= ' WHERE `id` = \'' . $d['mailing']->id . '\' ';
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();

		if ( class_exists('auto') AND $d['mailing']->mailing_type==2 ) auto::delete($d);

		if (!$erro->E(__LINE__ ,  '8406', $database)) {
			return false;
		} else {
			$xf->plus('act_totalmailing0', -1);
			$xf->plus('act_totalmailing'.$d['mailing']->mailing_type, -1);
        	return true;
		}
	 }


	 function updateNewsletterSent($mailingId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		/*$query = 'UPDATE `#__jnews_mailings` SET  //commented by mary
	 			`send_date` = \'' . jnewsletter::getNow() . '\' , `published` = 1 WHERE `id` = ' . $mailingId;*/
	 	$query = 'UPDATE `#__jnews_mailings` SET'. //added by mary getNow is being modified
	 		'`send_date` = \'' . jnewsletter::getNow() . '\' , `published` = 1 WHERE `id` = ' . $mailingId;
	 	$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8407', $database);
	 }


 function updateMailingFromList($listId, $published, $html, $visible) {

	$mailing->published = $published;
	$mailing->html = $html;
	$mailing->visible = $visible;

	 return xmailing::updateMailings($listId, $mailing);

 }

	 function updateMailings($listId, $mailing) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		if ($listId>0 AND ( isset($mailing->html)
		 OR isset($mailing->visible) ) ) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$comma = false;
			$query = 'UPDATE `#__jnews_mailings` SET ' ;

			if (isset($mailing->html)) {
				$query .= ' `html` = \'' . $mailing->html . '\' ' ;
				$comma = true;
			}
			if (isset($mailing->visible)) {
				if ($comma) $query .= ' , `visible` = \'' . $mailing->visible . '\' ' ;
				else $query .= ' `visible` = \'' . $mailing->visible . '\' ' ;
			}
			$query .= ' WHERE `list_id` = '. $listId;
			$query .= ' AND `published` >= 0';
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			return $erro->E(__LINE__ ,  '8408', $database);
		} else {
			return false;
		}

 }


	 function updateOneMailing($mailingId, $published) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'UPDATE `#__jnews_mailings` SET ' ;
			$query .= ' `published` = \'' . $published . '\' ' ;

		$query .= ' WHERE `id` = \'' . $mailingId . '\' ';
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8409', $database);
	}

	function updateMailingData($mailing) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();
		$query = "UPDATE `#__jnews_mailings` SET " .
					"`send_date` = '$mailing->send_date', " .
					"`subject` = '".addslashes($mailing->subject)."', " .
					"`htmlcontent` = '".addslashes($mailing->htmlcontent)."', " .
					"`textonly` = '".addslashes($mailing->textonly)."', ".
					"`published` = $mailing->published " .
					"\n   ". //to be removed next release
				" WHERE `id` = ". $mailing->id;
			$database->setQuery($query);
			$database->query();

            return $erro->E(__LINE__ ,  '8419', $database);

	 }


	 function publishMailing($mailingId) {

		$d['errStatus'] = xmailing::updateOneMailing($mailingId, '1' );
		return $d['errStatus'];
 }


	 function unpublishMailing($mailingId) {
		$d['errStatus'] = xmailing::updateOneMailing($mailingId, '0' );
		return $d['errStatus'];
 }


	 function copyMailing($mailingId) {

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$mailing = xmailing::getOneMailing('', $mailingId, '', $new);
		$copyMailing = $mailing;
		$ii = 0;
		$mailingName = _ACA_COPY_SUBJECT. ' ' . $copyMailing->subject;
		$copyList->published = 0;
     	while (!$erro->Eck(__LINE__ ,  '8411') AND $ii<10):
            $ii++;
            $copyMailing->subject = $mailingName;
            $copyMailing->published = 0;
			$erro->ck = xmailing::insertMailingData($copyMailing);
			if (!$erro->Eck(__LINE__ ,  '8412')) $mailingName = $mailingName.$ii ;
         endwhile;

		return $erro->Eck(__LINE__ ,  '8413');

	 }


	function uploadFiles( $dest_dir=null ) {

		require_once( WPATH_CLASS . 'lib.upload.php' );
		$upload = new upload();
		$files = $upload->getFiles();

		foreach ($files as $file) {
			if ($file->isValid()) {
				$file->setName('real');
				if( empty($dest_dir) ) $dest_dir = ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'upload_url'];
				$dest_name = $file->moveTo($dest_dir);
				if ($file->isError()) {
					echo $dest_name->getMessage();
				} else {
					$xfiles[] = $dest_name;
				}
			} elseif ($file->isError()) {
				echo $file->errorMsg() . "\n";
			}
		}

		return $xfiles;
	}


	/* function that will save mailing
	 * @param int $mailingId - mailing id
	 * @param int $listId - list id
	 * Modified by : Gino <gino@ijoobi.com>
	*/
	function saveMailing(&$mailingId , $listId)
	{

		$list = lists::getOneList( $listId );
		$allow_html = compa::allow_html();

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();

		if ( ACA_CMSTYPE )
		{
			$database =& JFactory::getDBO();

			// check list type
			$mailingtype = JRequest::getVar('listype', 0);

			if( empty($mailingtype) )
			{
				$mySess =& JFactory::getSession();
				$listType = $mySess->set('listype', '', 'LType');
			}
			else
			{
				$listType = $mailingtype;
			} //endif


			$senddate = JRequest::getVar('senddate', 0);
			if (JRequest::getVar('task', '') == 'saveSend') {$senddate = jnewsletter::getNow();}
			$subject = JRequest::getVar('subject', '', 'request','string', $allow_html );
			$content = JRequest::getVar('content', '', 'request','string', $allow_html);
			$alt_content = JRequest::getVar('alt_content', '', _MOS_ALLOWRAW);
			$published = JRequest::getVar('published', 0);
			$visible = JRequest::getVar('visible', 1);
			$html = JRequest::getVar('html', 1);
			$new_list = JRequest::getVar('new_list', 0);
			$fromname = JRequest::getVar('fromname', '');
			$fromemail = JRequest::getVar('fromemail', '');
			$frombounce = JRequest::getVar('frombounce', '');
			$userid = JRequest::getVar('userid', 0);
			$delay = JRequest::getVar('delay', 1);
			$acc_level = JRequest::getVar('acc_level', $list->acc_id);
			$issue_nb = JRequest::getVar('issue_nb', 1);
			$attachments = JRequest::getVar('attachments', '');
			$follow_up = JRequest::getVar('follow_up', 0);
			$cat_id = implode(',',JRequest::getVar('cat_id',array()));
			$delay_max = JRequest::getVar('delay_max', 7);
			$delay_min = JRequest::getVar('delay_min', 0);
			$notify_id = JRequest::getVar('notify_id', 0);
			$next_date = JRequest::getVar('next_date', 0);
			$start_date = JRequest::getVar('start_date', 0);
			$listIdA = JRequest::getVar( 'aca', null );
			$create_date = jnewsletter::getNow();
			//get the default template
			$template = templates::getDefault();
			$template_id = JRequest::getVar('template_id', $template->template_id);

			// change start_date type from string to int
			if( !empty($senddate) ) $senddate = strtotime( $senddate );
			if( !empty($start_date) ) $start_date = strtotime( $start_date );
			if( !empty($next_date) ) $next_date = strtotime( $next_date );
			if( !empty($create_date) ) $create_date = strtotime( $create_date );
		} //endif


		$delay = $delay*24*60;

		$attach = '';
	   	if(!empty($attachments))
	   	{
			foreach ($attachments as $attachment)
			{
				$attach .= $attachment . "\n";
			} //endforeach
		} //endif

	    	if(!empty($_FILES['file_0']['name']) )
	    	{
			$otherAttachs = xmailing::uploadFiles();
			if (!empty($otherAttachs))
			{
				foreach ($otherAttachs as $otherAttach)
				{
					$attach .= '/'.$otherAttach . "\n";
				} //endforeach
			} //endif
		} //endif

		if ( ACA_CMSTYPE )
		{	// joomla 15
		    $images = JRequest::getVar('images', '');
		} //endif


		if ($html == 0)
		{
			$alt_content = $content;
		} //endif

		//if ($senddate<>'0000-00-00 00:00:00' AND $senddate > jnewsletter::getNow()) /*commented by mary*/
		if ($senddate<>'0' AND $senddate > jnewsletter::getNow()) //added by mary
		{
			$published = 2;
		} //endif


		if(!empty($list->footer))
		{
			if (substr_count($content, '[SUBSCRIPTIONS]')<1) $content .= "<br/> [SUBSCRIPTIONS] <br/>";
			if (strlen($alt_content) > 10 AND substr_count($alt_content, '[SUBSCRIPTIONS]')<1) $alt_content .= "\r\n [SUBSCRIPTIONS] \r\n";
		} //endif

		if($new_list != 0)
		{

			$query = 'INSERT INTO `#__jnews_mailings` (`list_id`, `mailing_type`, `send_date`, `subject`, `htmlcontent`, `textonly`, `attachments`, `images`, `published`, `html`, `visible`, `fromname`, `fromemail`, `frombounce`, `author_id`, `delay`, `issue_nb` , `acc_level` , `createdate`, `follow_up`, `cat_id`, `delay_max`, `delay_min`, `notify_id`, `next_date`, `start_date`, `template_id`) VALUES( \''. $listId . '\', \'' . $listType . '\', \'' . $senddate. '\', \'' . addslashes($subject) . '\', \'' . addslashes($content) . '\', \'' . addslashes($alt_content) . '\', \'' . $attach . '\', \'' . $images . '\', \'' . $published . '\', \'' . $html . '\', \'' . $visible . '\', \'' . $fromname . '\', \'' . $fromemail . '\', \'' . $frombounce . '\', \'' . $userid . '\', \'' . $delay . '\', \'' . $issue_nb . '\', \''. $acc_level . '\' , \''.$create_date.'\' , \''. $follow_up .'\' , \''. $cat_id .'\' , \''. $delay_max .'\' , \''. $delay_min .'\' , \''. $notify_id .'\' , \''. $next_date .'\' , \''. $start_date .'\' , \''. $template_id .'\' ) ';
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

			$query = 'SELECT max(id) FROM `#__jnews_mailings` WHERE `list_id` = ' . $listId . ' AND `issue_nb` = \'' . $issue_nb . '\'';
			$query .= ' AND `published` != -1 ';
			$database->setQuery($query);
			$mailingId = $database->loadResult();
			$erro->err .= $database->getErrorMsg();

			if ($mailingId==1) {
				$xf->update('firstmailing', $listType);
			}
			$xf->plus('totalmailing0', 1);
			$xf->plus('act_totalmailing0', 1);
			$xf->plus('totalmailing'.$listType, 1);
			$xf->plus('act_totalmailing'.$listType, 1);

			xmailing::insertStatsGlobal($mailingId);

			// save to cross table
			if( !empty( $listIdA ) && isset( $listIdA['aca_mailing_addto'] ) )
			{
				foreach( $listIdA['aca_mailing_addto'] as $listids=>$values )
				{
					if( $values == 1 ) xmailing::saveMailingList( $mailingId, $listids );
				} //endforeach
			} //endif
		}
		else
		{
			$query = "UPDATE `#__jnews_mailings` SET " .
					"	`subject` = '".addslashes($subject)."', " .
					"	`htmlcontent` = '".addslashes($content)."', " .
					"	`textonly` = '".addslashes($alt_content)."', " .
					"	`attachments` = '".$attach."', " .
					"	`images` = '".$images."', " .
					"	`published` = '".$published."', " .
					"	`html` = ".$html." , " .
					"	`visible` = ".$visible." , " .
					"	`fromname` = '".$fromname."', " .
					"	`fromemail` = '".$fromemail."', " .
					"	`frombounce` = '".$frombounce."', " .
					"	`author_id` =  '".$userid."' , " .
					"	`delay` = ". $delay .", " .
					"	`acc_level` = ". $acc_level .", " .
					"	`send_date` = '". $senddate ."', " .
					"	`follow_up` = ". $follow_up .", " .
					"	`cat_id` = '". $cat_id ."', " .
					"	`delay_max` = ". $delay_max .", " .
					"	`delay_min` = ". $delay_min .", " .
					"	`notify_id` = ". $notify_id .", " .
					"	`next_date` = ". $next_date .", " .
					"	`template_id` = ". $template_id .", " .
					"	`start_date` = ". $start_date ." " .
					"	WHERE `id` =". $mailingId;

			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

// < Gino > : added this codes =========
			$resultA = xmailing::getMailingList( $mailingId );

			// update cross table jnewsletter_mailings
			$resultSetA = array();
			if( !empty( $listIdA ) && isset($listIdA['aca_mailing_addto']) )
			{
				foreach( $listIdA['aca_mailing_addto'] as $listids => $values )
				{

					// if the list to be store already existed in the listing
					if( in_array( $listids, $resultA ) )
					{
						// check if it is still set to yes
						// delete from database if set to no
						if( $values != 1 ) xmailing::removeMailingList( $mailingId, $listids );
					}
					else
					{
						// if the listids didnt exist then store it to its cross table
						// store only those ids that are set to yes
						if( $values == 1 ) xmailing::saveMailingList( $mailingId, $listids );
					} //endif

					// we need to get the list ids that are set to yes and store it to different array
					if( $values == 1 ) $resultSetA[] = $listids;
				} //endforeach
			} //endif

			// we need to remove and delete the unnecessary ids from the cross table
			if( !empty( $resultSetA ) && !empty( $resultA ) )
			{
				foreach( $resultA as $results )
				{
					// if not found the result set then the unnecessary id entry needs to be deleted
					if( !in_array( $results, $resultSetA ) ) xmailing::removeMailingList( $mailingId, $results );
				} //endforeach
			} //endif
// </ Gino > =============
		} //endif

		if (!$erro->E(__LINE__ ,  '8414', $database))
		{
			return false;
		}
		else
		{
			lisType::updateNewsletters();


			if ( $listType == 2 )
			{
				if ($new_list)
				{
					$subscribers = subscribers::getSubscribers(-1, -1, '', $total, $listId ,'', 1, 1, '');
				}
				else
				{
					$subscribers = subscribers::getSubscribers(-1, -1, '', $total, $listId , $mailingId, 1, 1, '');
				} //endif

				$subsId = jnewsletter::convertObjectToIdList($subscribers , 'id');
				if (!empty($subsId))
				{
					$queues = queue::getAllOneList($listId);
					if (!empty($queues))
					{
						if ($queues[0]->mailing_id == 0 )
						{
							$qids = jnewsletter::convertObjectToIdList($queues , 'qid');
							$erro->ck = queue::updateQueues('', $qids, $listId, $acc_level, false);
						}
						else
						{
							$erro->ck = queue::updateQueues($subsId, '', $listId, $acc_level, false);
						} //endif
					}
					else
					{
						return true;
					} //endif

					if (!$erro->Eck(__LINE__ ,  '8415')) {
						return false;
					} //endif
				} //endif

			}
			elseif( $listType == 1 AND $senddate > jnewsletter::getNow() )
			{
				if(class_exists('auto'))
				{
			 		$erro->ck = queue::insert_subs_to_mailing($listId, $mailingId, $senddate, $acc_level);
			 		if($new_list != 1)
			 		{
			 			$erro->ck = queue::update_subs_to_mailing($listId, $mailingId, $senddate, $issue_nb, $acc_level);
			 		} //endif
				} //endif

			} //endif
			return true;
		}
	 } //endfct

     /*
      * This is a function to determine that the mailings is already scheduled
      */
      	function scheduleready(){
		/*	$mailid = acymailing::getCID('mailid');
			if(empty($mailid)) return false;
			$queueClass = acymailing::get('class.queue');
			$values = null;
			$values->nbqueue = $queueClass->nbQueue($mailid);
			if(!empty($values->nbqueue)){
				$messages = array();
				$messages[] = JText::sprintf('ALREADY_QUEUED',$values->nbqueue);
				$messages[] = JText::sprintf('DELETE_QUEUE');
				acymailing::display($messages,'warning');
				return;
			}
			JRequest::setVar( 'layout', 'scheduleconfirm'  );
			return parent::display(); */
		}//endfct

	 function preview($mailingId, $listId, &$message){

		$list = null;
		$new = null;
		$mailing = xmailing::getOneMailing( $list, $mailingId, '', $new );
		if ( $listId>0 ) {
			$list = lists::getOneList( $listId );
		} else {
			$list = lists::getOneList( $mailing->list_id );
		}
		$message = '';


		if ( ACA_CMSTYPE ) {	// joomla 15
			$previewemailaddress = JRequest::getVar('emailaddress', '' );
			$previewname = JRequest::getVar('name', '' );
			$previewhtml = JRequest::getVar('html', '0' );
		}

		$receivers = null;
		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
		}else{
			global $my;
		}

		$d['email'] = trim($previewemailaddress);
		$infos = subscribers::getSubscriberIdFromEmail($d);
		if(empty($infos['subscriberId'])){
			$d['email'] = $my->email;
			$infos = subscribers::getSubscriberIdFromEmail($d);
		}

		if(!empty($infos['subscriberId'])) $receivers = subscribers::getSubscribersFromId(array($infos['subscriberId']));
		else $receivers->id = 0;

		$receivers->email = $previewemailaddress;
		$receivers->name = $previewname;
		$receivers->receive_html = $previewhtml;

		return jnewsletter_mail::sendOne($mailing, $receivers, $list, $message);

	 }


	 function insertMailing($mailing){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$erro->ck = xmailing::insertMailingData($mailing);
		if ($erro->Eck(__LINE__ ,  '8417')) {

			$query = 'SELECT `id` FROM `#__jnews_mailings` WHERE ';
			$query .= ' `list_id` = ' . $mailing->list_id . ' AND `issue_nb` = \'' . $mailing->issue_nb . '\'';
			$query .= ' AND `author_id` = ' . $mailing->author_id . ' AND `mailing_type` = \'' . $mailing->mailing_type . '\'';
			$query .= ' AND `published` != -1';

			$database->setQuery($query);
			$mailingId = $database->loadResult();
			$erro->err = $database->getErrorMsg();

			if (!$erro->E(__LINE__ ,  '8418', $database)) {
				return '';
			} else {
				return $mailingId;
			}
		} else {
			return '';
		}
	 }


	 function insertMailingData($mailing) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();
		$query = "INSERT INTO `#__jnews_mailings` (`list_id`, `mailing_type`,`template_id`,`send_date`, `subject`, `htmlcontent`, `textonly`,".
				"\n `attachments`, `images`, `published`, `html`, `visible`, `fromname`, `fromemail`, `frombounce`, ".
				"\n `author_id`, `delay`,`follow_up`,`cat_id`,`delay_min`,`delay_max`,`notify_id`,`next_date`,`start_date`,`issue_nb` , `acc_level` , `createdate`) ".
				"\n VALUES ( $mailing->list_id, ". //to be removed next release
				"$mailing->mailing_type, ".
				"$mailing->template_id, ". //added by eve
				"'$mailing->send_date', ".
				"'".addslashes($mailing->subject)."', ".
				"'".addslashes($mailing->htmlcontent)."', ".
				"'".addslashes($mailing->textonly)."', ".
				"'$mailing->attachments', ".
				"'$mailing->images', ".
				"$mailing->published, ".
				"$mailing->html, ".
				"$mailing->visible, ".
				"'$mailing->fromname', ".
				"'$mailing->fromemail', ".
				"'$mailing->frombounce', ".
				"'$mailing->author_id', ".
				"$mailing->delay, ".
				"$mailing->follow_up, ".  //added by eve
				"'$mailing->cat_id', ".     //added by eve
				"$mailing->delay_min, ".  //added by eve
				"$mailing->delay_max, ".  //added by eve
				"$mailing->notify_id, ".  //added by eve
				"$mailing->next_date, ".  //added by eve
				"$mailing->start_date, ". //added by eve
				"$mailing->issue_nb, ".
				"$mailing->acc_level, ".
				"$mailing->createdate ) ";
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

			if (empty($erro->err)) {
				$xf->plus('totalmailing0', 1);
				$xf->plus('act_totalmailing0', 1);
				$xf->plus('totalmailing'.$mailing->mailing_type, 1);
				$xf->plus('act_totalmailing'.$mailing->mailing_type, 1);
			}

			$mailingId = xmailing::getLastMailingId();

			xmailing::insertStatsGlobal($mailingId);

            return $erro->E(__LINE__ ,  '8419', $database);

	 }

	 function getLastMailingId(){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


	 	$q = "SELECT LAST_INSERT_ID()";
		$database->setQuery($q);
		$mailingId = $database->loadResult();

		return $mailingId;
	 }


	 function insertStats($mailingId, $subscriberId, $html) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif


		$time = (class_exists('jnewsletter')) ? jnewsletter::getNow() : date( 'Y-m-d H:i:s',  time()  );
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'REPLACE INTO `#__jnews_stats_details` ( `mailing_id`, `subscriber_id`, `sentdate`, `html`	) VALUES ('
			. $mailingId . ', '
			. $subscriberId . ', \''
			. $time . '\', '
			. $html .  ')' ;

		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();

		return $erro->E(__LINE__ ,  '8420', $database);

	 }


	 function updateStatsGlobal( $mailingId, $html_sent, $text_sent, $html_read=false) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

/*commented by mary*/		//$time = (class_exists('jnewsletter')) ? jnewsletter::getNow() : date( 'Y-m-d H:i:s',  time()  );
/*added by mary*/		//$time=time();
/*mary*/		$time = (class_exists('jnewsletter')) ? jnewsletter::getNow() : time()  ;
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'UPDATE `#__jnews_stats_global` SET `html_sent` = `html_sent` + ' . $html_sent;
		$query .= ' , `text_sent` = `text_sent` + ' . $text_sent;
		if ($html_read) $query .= ' , `html_read` = `html_read` + 1 ';
		$query .= ' , `sentdate` = \'' . $time . '\'';
		$query .= ' WHERE `mailing_id` = \'' . $mailingId . '\'';

		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8421', $database);
	 }


	 function insertStatsGlobal( $mailingId ) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$query = 'SELECT COUNT(mailing_id) FROM `#__jnews_stats_global` WHERE `mailing_id` = \'' . (int) $mailingId . '\'';
		$database->setQuery($query);
		$nb = $database->loadResult();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8430', $database);
/*added by mary*/ $delay=0;
		if ($nb < 1) {
			$query = 'INSERT INTO `#__jnews_stats_global` ( `mailing_id`, `sentdate`, `html_sent`, `text_sent`	) VALUES ('
/*added by Mary*/			//$query = 'INSERT INTO `#__jnews_stats_global` ( `mailing_id`, `senddate`, `html_sent`, `text_sent`	) VALUES ('
				.'\''. (int) $mailingId . '\', \''
/*commented by mary*/				. jnewsletter::getNow() . '\', '
/*added by mary. time() + ACA_TIME_OFFSET *60*60 + ($delay*60) - date('Z') . '\', '*/
				. ' 0 , '
				.  ' 0 )' ;
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
		}
		return $erro->E(__LINE__ ,  '8422', $database);
	 }


	 function M($type , $message) {

		if (class_exists('jnewsletter')) {
			return jnewsletter::printM($type , $message);
		} else {

			switch ($type) {
				case 'no':
					$colored_message = '<img  hspace="15" align="absmiddle" alt="no" src="'.ACA_PATH_ADMIN_IMAGES.'button_cancel.gif">' .
							'<span style=" font-size: larger; color: rgb(255, 0, 0); font-weight: bold;">' . $message . '</span>';
					break;
				case 'green':
					$colored_message = '<span style="font-weight: bold; color:#07C500;">' . $message . '</span>';
					break;
				case 'red':
					$colored_message = '<span style="font-weight: bold; color:#FF0000;">' . $message . '</span>';
					break;
				default:
					$colored_message ='';
					break;
			}
	   		return $colored_message."\n\r";
   		}

   	} //endfct


	function _header($task, $action, $listType , $message, $screen='') {
		if ($screen == 'edit') lisType::chooseType($task, $action, $listType , 'mailing_edit_header', $message,'');
		else lisType::chooseType($task, $action, $listType , 'mailing_header', $message,'');
    	} //endfct


    	/* Function that will save mailing id and list id to its cross table jnewsletter_listmailings
    	 * @param int $mailingId - mailing id
    	 * @param int $listId - list id
    	*/
    	function saveMailingList( $mailingId, $listId )
    	{
    		if( empty($mailingId) || empty( $listId ) )
    		{
    			return false;
    		} //endif

    		$query = 'INSERT INTO `#__jnews_listmailings` (`list_id`, `mailing_id`) VALUES (\'' . $listId . '\' , \''. $mailingId . '\' )';

    		$database =& JFactory::getDBO();
    		$database->setQuery( $query );
    		$database->query();

 			//********** Added by Grace

    		$subscriber_id=listssubscribers::getSubscriberFromList($listId);
    		$mailing_type=xmailing::getMailingType($mailingId);
    		$send_date=xmailing::getSendDate($mailingId);



    		if(!empty($subscriber_id))
    		{
    			foreach($subscriber_id as $subscriberid)
    			{
    				$queue = null;
    				$queue->id = 0;
		            $queue->subscriber_id = $subscriberid;
		            $queue->list_id = $listId;
		            $queue->type = $mailing_type;
		            $queue->mailing_id = $mailingId;
		            $queue->send_date = $send_date;
		         	//$queue->send_date =0;// mary
		            $queue->suspend = 0;
		            $queue->delay = 0;
		            $queue->acc_level = 29;
		            $queue->issue_nb = 0;
		            $queue->published = 0;
		          	//$queue->published = 2;
		            $queue->params = '';

		      		switch ($mailing_type)
		      		{
		      			case '1':
		      			$queue->priority = $GLOBALS[ACA.'sched_prior'];
		      			break;
		      			case '2':
						$queue->priority = $GLOBALS[ACA.'ar_prior'];
		      			break;
		      			case '7':
						$queue->priority = $GLOBALS[ACA.'sm_prior'];
		      			break;
		      			default:
		      			$queue->priority = 1;
		      			break;
		      		}//end switch

					$queue->attempt = 0;
    				queue::insert($queue);
    			}//end for
    		}//end if

    		return true;
    	} //endfct

	 function getSendDate($mailingId) {
			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
			} //endif

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `send_date` FROM `#__jnews_mailings` WHERE `id` = '.$mailingId;
			$database->setQuery($query);
			$send_date = $database->loadResult();
			$erro->err = $database->getErrorMsg();

			if (!$erro->E(__LINE__ ,  '8402', $database)) {
				return '';
			}

			return $send_date;
		 }

    	/* Function that will remove the mailing and list entry from its cross table jnewsletter_listmailings
    	 * @param int $mailingId - mailing id
    	 * @param int $listId - list id
    	*/
	function removeMailingList( $mailingId, $listId )
    	{
    		if( empty($mailingId) || empty( $listId ) )
    		{
    			return false;
    		} //endif

    		$query = 'DELETE FROM `#__jnews_listmailings` WHERE `mailing_id`='. $mailingId .' AND `list_id`='. $listId;
    		$database =& JFactory::getDBO();
    		$database->setQuery( $query );
    		$database->query();

    		return true;
	} //endfct


	/* Function that will check if the checked entry exist in cross table jnewsletter_mailings
	 * @param int $mailingId - mailing id
    	 * @param int $listId - list id
    	 * @return boolean $returnValue - true if the entry exist else will return false
	*/
	function mailingListFound( $mailingId, $listId )
	{
		if( empty($mailingId) || empty( $listId ) )
    		{
    			return false;
    		} //endif

   		$query = 'SELECT `mailing_id` FROM `#__jnews_listmailings` WHERE `mailing_id`='. $mailingId .' AND `list_id`='. $listId;
   		$database =& JFactory::getDBO();
   		$database->setQuery( $query );
   		$result = $database->loadResult();
		$returnValue = ( !empty($result) ) ? true : false;
		return $returnValue;
	} //endfct


	/* Function that will get all the list ids for the passed mailing id from its cross table jnewsletter_mailings
	 * @param int $mailingId - mailing id
	 * @return array int $resultA - array of list ids
	*/
	function getMailingList( $mailingId )
	{
		if( empty($mailingId) )
    		{
    			return false;
    		} //endif

    		$query = 'SELECT `list_id` FROM `#__jnews_listmailings` WHERE `mailing_id`='. $mailingId;
    		$database =& JFactory::getDBO();
    		$database->setQuery( $query );
    		$resultA = $database->loadResultArray();

		return $resultA;
	} //endfct


/* Function that will get all the mailing list ids for the passed list id from its cross table jnewsletter_listmailings
	 * @param int $listID - list id
	 * @return array int $resultA - array of mailing list ids
	*/
	function getListMailing( $listID )
	{
		if( empty($listID) )
    		{
    			return false;
    		} //endif

    		$query = 'SELECT `mailing_id` FROM `#__jnews_listmailings` WHERE `list_id`='. $listID;

    		$database =& JFactory::getDBO();
    		$database->setQuery( $query );
    		$resultA = $database->loadResultArray();

		return $resultA;
	} //endfct

/*<p>Function to get the styles of the template being used in the mail</p>
 * @param $mailingID - id of the mail
 * @param $template_id - id of the template
 * @result - string styles
 */
 	function getTemplateStyles($template_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		if ($template_id>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `styles` FROM `#__jnews_templates` WHERE `template_id`='.intval($template_id);
			$database->setQuery($query);
			$result = null;
				if ( ACA_CMSTYPE ) {
					$result = $database->loadObject();
				} else {
					$database->loadObject($result);
				}//endif

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
			$styles = unserialize($result->styles);
		} else {
			$result = '';
			$styles= '';
		}//endif

		return $styles;
 	}//endif

/*<p>Function to get template ID in the mailing table</p>
 * @param int $mailingID - id of the mail
 * @result - int template_id
 */
 	function getTemplateID($mailingID){

 		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		if ($mailingID>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `template_id` FROM `#__jnews_mailings` WHERE `id`='.intval($mailingID);
			$database->setQuery($query);
			$result = null;
					if ( ACA_CMSTYPE ) {
						$result = $database->loadObject();
					} else {
						$database->loadObject($result);
					}//endif

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
			$template_id = $result->template_id;
		} else {
			$result = '';
			$template_id = '';
		}//endif

		return $template_id;

 	}//endif

} //endclass