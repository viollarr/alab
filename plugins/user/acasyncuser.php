	<?php
	 defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.

	jimport('joomla.plugin.plugin');


	/**
	 * Plugin to sync user with jNews
	 */
	class plgUserAcasyncuser extends JPlugin {

		function plgUserAcasyncuser( &$subject, $config) {
			parent::__construct($subject, $config);
		}//endfct


		/**
		 * Example store user method
		 *
		 * Method is called after user data is stored in the database
		 *
		 * @param 	array		holds the new user data
		 * @param 	boolean		true if a new user is stored
		 * @param	boolean		true if user was succesfully stored in the database
		 * @param	string		message
		 */
		function onAfterStoreUser($user, $isnew, $success, $msg)
		{
			global $mainframe;

			if ( strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) ) =='administrator' ) {	// joomla 15
				$adminPath = strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) );
			} else {
				$adminPath = JPATH_ROOT;
			}//endif

			if ( !@include_once( $adminPath . '/components/com_jnewsletter/defines.php') ) return;
			include_once( WPATH_CLASS . 'class.jnewsletter.php');

			// convert the user parameters passed to the event
			// to a format the external application

			if ($isnew) {

				$subscriber = null;
				$subscriberId = 0;
				$subscriber->user_id = $user['id'];
				$subscriber->name = $user['name'];
				$subscriber->email = $user['email'];
				$subscriber->ip = subscribers::getIP();
				$subscriber->receive_html = 1;
				$subscriber->confirmed = 1;
				    $subscriber->subscribe_date = jnewsletter::getNow();
				    $subscriber->language_iso = 'eng';
				    $subscriber->timezone = '00:00:00';
				    $subscriber->blacklist = 0;
				    $subscriber->params = '';
				    $subscriber->admin_id = 0;

				//notice columns
				if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
				$subscriber->column1='';
				$subscriber->column2='';
				$subscriber->column3='';
				$subscriber->column4='';
				$subscriber->column5='';
				}//end if check if the version is pro

	            subscribers::insertSubscriber($subscriber, $subscriberId);

				$database =& JFactory::getDBO();

				//get subscriber id of the new user
				$sId= subscribers::getSubscriberId($subscriber->subscribe_date);

				//get list ids of auto_add lists
				$query='SELECT `id` from `#__jnews_lists` WHERE `auto_add`=1';
				$database->setQuery($query);
				$autoListId=$database->loadObjectList();
				$error = $database->getErrorMsg();

				if (!empty($error)){
					echo  $error;
					return false;
				}else{
					foreach($autoListId AS $autoId){
						$mailing_ids=xmailing::getListMailing( $autoId->id );

		 				if(!empty($mailing_ids)) {
							foreach($mailing_ids as $mailing_id){

								$queue = new stdClass;
								$queue->id = 0;
								$queue->subscriber_id = $sId;
								$queue->list_id = $autoId->id;
								$queue->type = 1;
								$queue->mailing_id = $mailing_id;

								$queue->send_date = xmailing::getSendDate($mailing_id);

								$queue->suspend = 0;
								$queue->delay = 0;
								$queue->priority = 0;
								$queue->attempt = 0;
								$queue->acc_level = intval(JRequest::getVar('acc_level', 29));
								$queue->issue_nb = 0;
								$queue->published = 0;
								$queue->params = '';

								$subscriber=null;
								$subscriber->list_id=$autoId->id;
								$subscriber->id=$sId;
								listssubscribers::insertToListSubscribers($subscriber);

								queue::insert($queue);
							}//endfor
						}else{
							$mailing_id=0;
							$queue = new stdClass;
							$queue->id = 0;
							$queue->subscriber_id = $sId;
							$queue->list_id = $autoId->id;
							$queue->type = 1;
							$queue->mailing_id = $mailing_id;

							$queue->send_date = xmailing::getSendDate($mailing_id);

							$queue->suspend = 0;
							$queue->delay = 0;
							$queue->priority = 0;
							$queue->attempt = 0;
							$queue->acc_level = intval(JRequest::getVar('acc_level', 29));
							$queue->issue_nb = 0;
							$queue->published = 0;
							$queue->params = '';

							$subscriber=null;
							$subscriber->list_id=$autoId->id;
							$subscriber->id=$sId;
							listssubscribers::insertToListSubscribers($subscriber);

							queue::insert($queue);

						}//endif
					}//end of foreach
				}//end if
			}//endif
		}//endif

	}//endclass

