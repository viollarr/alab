		<?php
		defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
		### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
		### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

		require_once( WPATH_ADMIN . 'plugins' .DS. 'class.autoresponder.php' );
		@include_once( WPATH_ADMIN . 'pro' .DS. 'class.pro.php' );

		class auto {

			function getCase($action) {

				$showPanel = false;
				switch ($action) {
					case ('cron') :
						echo "<br/>jNews Cron launched";
						auto::execute( false );
						break;
					default :
						$showPanel = true;
						break;
				}//endswitch
				return $showPanel;
			}//endfct


			 function processQueue( $showHTML, $buttonAction=false ) {

			 	@ini_set('memory_limit','128M');


				$xf = new xonfig();
				$maxFreq = ( isset($GLOBALS[ACA.'cron_max_freq']) ) ? $GLOBALS[ACA.'cron_max_freq'] : 10;
				$newTask= mktime(date("H"), date("i")-$maxFreq, date("s"), date("m"), date("d") ,  date("Y"));
				$max = false;

				if ( ($buttonAction OR $newTask > $GLOBALS[ACA.'last_cron']) && auto::good() ) {

					$xf->update('last_cron', time() );

					if ( !ACA_CMSTYPE ) {
						subscribers::updateSubscribers();
					}//endif

					/*if ( class_exists('aca_virtuemart') && isset($GLOBALS[ACA.'virtuemart']) && $GLOBALS[ACA.'virtuemart'] ) {
						aca_virtuemart::queue();
					}

					if (class_exists('cron')) {
						$err = cron::processCron();
						if (!empty($err)) {
							echo $err;
							return false;
						}
					} */

					//We clean the queue once every 10 times or when we click on process queue
					if($buttonAction OR rand( 0 ,10) == 5){
						auto::cleanQueue();
					}//endif

					//autoresponders mailing type
					if ( !auto::processAutoResponders( $showHTML, $max ) ) return false;

					if ( !$max ) { if ( !auto::processScheduledNewsletter( $showHTML, $max ) ) return false; }
					//Smartnewsletter mailing type
					if ( !$max ) { if ( !auto::processAutoNews( $showHTML, $max ) ) return false; }

					//if (class_exists('autonews')) autonews::create($xf); original commented by eve
					if (class_exists('autonews')) autonews::update($xf);

				}//endif

				if ( !$max && class_exists('pro') ) pro::cleanup();

				if (!auto::good()){ echo "<p class=\"error\"><br/>jNews can't process.<br/>Your license is not valid.<br/>Please go on <a href='http://www.ijoobi.com'>http://www.ijoobi.com</a> to get more informations<br/></p>";return false;}

				return true;
			}//endfct


			 function getReadyQueue(&$d) {
				if ( ACA_CMSTYPE ) {
					$database =& JFactory::getDBO();
				}//endif

				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
				$d['finish'] = true;
				$queuesTotal = null;

				$limit = $GLOBALS[ACA.'cron_max_emails'];
				$query = 'SELECT `mailing_id` FROM `#__jnews_queue` WHERE `suspend`= 0 ';
				$query .= lisType::getQueue($d['listype']);
				$query .=  ' AND `send_date`< \'' . jnewsletter::getNow() . '\'';
				$query .= ' AND `mailing_id` > 0';

				//Easy way for multiple queue
				if(ACA_CMSTYPE){
					$qlistid = JRequest::getInt('qlistid');
				}//endif

				$query .= ' ORDER BY `send_date` ASC';
				$query .=  ' LIMIT 1';
				$database->setQuery($query);

				if ( ACA_CMSTYPE ) {	// joomla 15
					$queuesTotal = $database->loadObject();
				}//endif

				$erro->err = $database->getErrorMsg();
				 if (!$erro->E(__LINE__ ,  '8120' , $d)	) {
					$d['err'] = $erro->mess;
					$d['finish'] = true;
					return false;
				} else {

					if (!empty($queuesTotal->mailing_id)) {
						$query = 'SELECT * FROM `#__jnews_queue` WHERE `suspend`= 0 ';
						$query .= lisType::getQueue($d['listype']);
						$query .=  ' AND `send_date`< \'' . jnewsletter::getNow() . '\' ';
						$query .=  ' AND `mailing_id` = ' . $queuesTotal->mailing_id;
						if ($limit<>0) $query .=  ' LIMIT ' . $limit;
						$database->setQuery($query);

						$d['queues'] = $database->loadObjectList();
						$erro->err = $database->getErrorMsg();
						$d['finish'] = true;
						 if (!$erro->E(__LINE__ ,  '8121', $d)	) {
							$d['err'] = $erro->mess;
							return false;
						}//endif
					}//endif
				}//endif
				return true;
			}//endfct



			 function processScheduledNewsletter( $showHTML, &$max ) {

				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		 		$d['finish'] = false;
				$receivers = array();
				while ( !$d['finish'] AND $erro->R() AND !$max ):
					$d['listype'] = 1;
					$status = auto::getReadyQueue( $d );

					if ($status AND !empty($d['queues'])) {

						$subsId = jnewsletter::convertObjectToIdList($d['queues'], 'subscriber_id');
						$qids = jnewsletter::convertObjectToIdList($d['queues'], 'qid');

						//echo ' jtrace smart-newsletter 44 <br> ';
						//$erro->ck = queue::updateSuspend($qids, 1);

						$erro->Eck(__LINE__ ,  '8125' , $d);
						$receivers = subscribers::getSubscribersFromId($subsId, true);
						if(empty($receivers)){
							echo '<br/>Error : Receiver not found : ';
						}//endif

						$mailingId = $d['queues'][0]->mailing_id;
						$database= &JFactory::getDBO();
						$query='SELECT `list_id` from `#__jnews_listmailings` WHERE `mailing_id`='.$mailingId;
						$database->setQuery($query);
						$database->query();
						$listResult=$database->loadResult();
						$listId=$listResult;
						//$listId = $d['queues'][0]->list_id; /*commented by mary*/
						//$listId=null;

			            $tags  = null;
						$erro->ck = auto::sendScheduled( $d, $showHTML, $mailingId, $listId, $receivers, $erro->err , $max, $tags);
					 	$erro->Eck(__LINE__ ,  '8126' , $d);


					}//endif
				endwhile;
		 		return $erro->R();
			 }//endfct


			 function processAutoNews( $showHTML, &$max ) {

				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		 		$d['finish'] = false;
				$receivers = array();

				while ( !$d['finish'] AND $erro->R() AND !$max ):
					$d['listype'] = 7;
					$status = auto::getReadyQueue( $d );
					if ($status AND !empty($d['queues'])) {
						$subsId = jnewsletter::convertObjectToIdList($d['queues'], 'subscriber_id');
						$qids = jnewsletter::convertObjectToIdList($d['queues'], 'qid');

						//echo ' jtrace smart-newsletter 45 <br> ';
						//$erro->ck = queue::updateSuspend($qids, 1);
						$erro->Eck(__LINE__ ,  '8125' , $d);
						$receivers = subscribers::getSubscribersFromId($subsId, true);

						$mailingId = $d['queues'][0]->mailing_id;

						//maria
						$database= &JFactory::getDBO();
						$query='SELECT `list_id` from `#__jnews_listmailings` WHERE `mailing_id`='.$mailingId;
						$database->setQuery($query);
						$database->query();
						$listResult=$database->loadResult();
						$listId=$listResult;
						//$listId = $d['queues'][0]->list_id;
			            $tags  = null;
						$erro->ck = auto::sendScheduled( $d, $showHTML, $mailingId, $listId, $receivers, $erro->err , $max, $tags);
					 	$erro->Eck(__LINE__ ,  '8126' , $d);

					}//endif
				endwhile;
		 		return $erro->R();
			 }//endfct


			function processAutoResponders( $showHTML , &$max ) {

				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		 		$d['finish'] = false;
				$receivers = array();
				$tags =  null;

				while ( !$d['finish'] AND $erro->R() AND !$max ):
					$d['listype'] = 2;
					$status = auto::getReadyQueue($d);
					if ($status AND !empty($d['queues'])) {
						$subsId = jnewsletter::convertObjectToIdList($d['queues'], 'subscriber_id');
						$d['qids'] = jnewsletter::convertObjectToIdList($d['queues'], 'qid');
					 	$erro->Eck(__LINE__ ,  '8132' , $d);
						//echo ' jtrace smart-newsletter 46 <br> ';

						$receivers = subscribers::getSubscribersFromId($subsId, true);
						if(empty($receivers)){
							echo '<br/>Error : Receiver not found : ';
						}//endif


						$mailingId = $d['queues'][0]->mailing_id;

						//maria
						$database= &JFactory::getDBO();
						$query='SELECT `list_id` from `#__jnews_listmailings` WHERE `mailing_id`='.$mailingId;
						$database->setQuery($query);
						$database->query();
						$listResult=$database->loadResult();
						$listId=$listResult;
						//$listId = $d['queues'][0]->list_id;
						$list = lists::getOneList($listId);
						$d['mailing'] = xmailing::getOneMailing($list, $mailingId, '', $new, true);
						$erro->ck = jnewsletter_mail::sendSchedule( $d, $showHTML, $receivers, $list, $erro->err, $max, $tags );
					 	$erro->Eck(__LINE__ ,  '8133' , $d);

					}//endif

				endwhile;

		 		return $erro->R();
			 }//endfct


			 function sendScheduled( $d, $showHTML, $mailingId, $listId, $receivers, &$message, &$max, $tags = null) {

				$list = lists::getOneList($listId);
				$d['mailing'] = xmailing::getOneMailing($list, $mailingId, '', $new, true);

				xmailing::_header('', '', $list->list_type , '', '');
				//$d['listype'] = $d['mailing']->list_type;	//correction of duplicates /*commented by mary*/
				$check = jnewsletter_mail::sendSchedule( $d, $showHTML, $receivers, $list, $message, $max, $tags );
				if ($check) xmailing::updateNewsletterSent($mailingId);
				return 	$check;
			 }//endfct


			 function updateAutoresponderSent( &$d ) {

				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
				$qids = $d['qids'];
				$listId = $d['mailing']->list_id;
				$mailingId = $d['mailing']->id;
				$issueNb = $d['mailing']->issue_nb;
				$delay = $d['mailing']->delay;
				if (!isset($erro->err)) $erro->err = '';

				$total = 0;
				$goNextAuto = 0;
				$newIssueNb = $issueNb;
				$noMoreMailing = false;
				do {
					$newIssueNb++;
					$newMailing = xmailing::getQuickMailingIssue($listId, $newIssueNb, $total);
					if (empty($newMailing)) {
						$noMoreMailing = true;
						$newMailing->published = 0;
					}//endif
				} while ( ($newMailing->published <> 1) AND ($newIssueNb < $total ) AND ($noMoreMailing == false) );


				if ((( $newIssueNb == $total) AND ($newMailing->published <> 1)) OR ($noMoreMailing == true)) {
					$list = lists::getOneList($listId);
					if ($list->follow_up>0 AND $list->list_type=='2' ) {
						$erro->ck = queue::updateQueues( '', $qids, $list->follow_up, $list->acc_id, true);
						$erro->Eck(__LINE__ ,  '8136' , $d);
						$myfollowlist = lists::getOneList($list->follow_up);

						if(empty($myfollowlist->list_type) OR $myfollowlist->list_type != 2){
							return queue::deleteQueues($qids);
						}//endif
						return true;
					} else {
							$erro->ck = queue::deleteQueues($qids);
							$erro->Eck(__LINE__ ,  '8137' , $d);
					}//endif
				} else {
					$queue->send_date = jnewsletter::getNow($newMailing->delay);
					$queue->suspend = 0;
					$queue->delay = $newMailing->delay;
					$queue->issue_nb = $newIssueNb;
					$queue->mailing_id = $newMailing->id;
					$erro->ck = queue::updateQueueData($qids, '', 2, $listId, $queue->mailing_id,
										$queue->issue_nb, $queue->send_date, $queue->delay, '', 1);
				}//endif
				return $erro->R();

			 }//endfct

			function insertQueuesForAuto($subId, $queueInfo ) {

				$status = true;
				for ($k=0 ;$k < count($subId); $k++) {
		            $queue = new stdClass;
		            $queue->subscriber_id = $subId[$k];
		           // $queue->list_id = $queueInfo->list_id; //mary no list id
		            $queue->mailing_id = $queueInfo->mailing_id;
		            $queue->send_date = $queueInfo->send_date;
		            $queue->suspend = '0';
		            $queue->delay = $queueInfo->delay;
		            $queue->acc_level = $queueInfo->acc_level;
		            $queue->issue_nb = $queueInfo->issue_nb;
		            $queue->published = $queueInfo->published;
		            $queue->params = '';
	     		   	//********** Added by Grace
					if (!empty($GLOBALS[ACA.'ar_prior']))$queue->priority = $GLOBALS[ACA.'ar_prior'];
					$queue->attempt = 0;
				   //**************************
		            if (!queue::insert($queue)) $status = false;
				}//endfor
				return $status;

			 }//endfct

			function delete(&$d) {

				$d['queues'] = queue::getQueueFromMailingId($d['mailing']->id);
				if (!empty($d['queues'])) {
					$d['qids'] = jnewsletter::convertObjectToIdList($d['queues'], 'qid');
					$d['err'] .= auto::updateAutoresponderSent( $d );
				}//endif

			 }//endfct



			 function execute( $showHTML ) {

				if (auto::viewCron()) {
					$status = auto::processQueue( $showHTML );
					if ($status AND $GLOBALS[ACA.'cron_setup']=='0') {
						$xf = new xonfig();
						$xf->update('cron_setup', '1');
					}//endif
				}//endif
		   }//endfct


			function good( $tok='' ) {
				static $already = false;
				static $val = false;

				if ( !$already OR !empty($tok) ) {
					$lic = ( !empty($tok) ) ? $tok : $GLOBALS[ACA.'license'];

					if ( !empty($lic) ) {
						$already = true;
						$xf = new xonfig();
						$decode['web'] = substr( $lic , 1, 32 );
						$decode['fct'] = substr( $lic , 33, 1 );
						$decode['vrs'] = substr( $lic , 34, 3 );
						$decode['soft'] = substr( $lic , 37, 32 );
						$tempVal = substr( $lic , 69, strlen($lic)-69 );
						$decode['tm'] = $tempVal/3 ;

						if ( $GLOBALS[ACA.'maintenance'] != $decode['tm'] ){
							$GLOBALS[ACA.'maintenance'] = $decode['tm'];
							$xf->update('maintenance', $decode['tm'] );
						}//endif
						$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;

						if ( substr($web, 0, 11) =='http://www.' ) {
							$web2 = 'http://' . substr($web, 11);
						} else {
							$web2 = 'http://www.' . substr( $web, 7 );
						}//endif

						//if we dont have the right URL we need to get the URL from the SERVER
						if ( !( $decode['web'] == md5($web) || $decode['web'] == md5($web2)) ) {
							$tempURL = $_SERVER['HTTP_REFERER'];
							$posU = strpos( substr($tempURL, 11), '/' );
							$web = ( $posU !==null ) ? substr( $tempURL, 0, strlen($tempURL)-$posU-11 ) : $tempURL;
						}//endif

						if ( ( $decode['web'] == md5($web) || $decode['web'] == md5($web2)) && $decode['fct'] == $GLOBALS[ACA.'level'] ) {

							if ( $decode['tm'] > time() ) {
								if ( $decode['vrs'] == str_replace( '.', '', $GLOBALS[ACA.'version']) ) {
									if ( $decode['soft'] == md5( 'Acajoom' . $GLOBALS[ACA.'type'] . $GLOBALS[ACA.'version'] ) ) $val = true;
								} else {
									$soft = md5( 'Acajoom' . $GLOBALS[ACA.'type'] . $GLOBALS[ACA.'version'] );
									$ahVar = $decode['tm'] * 3;
									$lic = 'c' . $decode['web'] . $decode['fct'] . $decode['vrs'] . $soft . $ahVar;
									$val = true;
									$xf->update('license', $lic);
								}//endif
							} else {
								if ( $decode['soft'] == md5( 'Acajoom' . $GLOBALS[ACA.'type'] . $GLOBALS[ACA.'version'] ) ) {
									if ( $decode['vrs']== str_replace( '.', '', $GLOBALS[ACA.'version']) ) $val = true;
								}//endif
							}//endif
						}
					}
				}
				if (!$val) {
					$GLOBALS['not_valid_license'] = true;
				}//endif
				return $val;
			}//endfct

			 function showQueue() {

				 if ($GLOBALS[ACA.'cron_setup'] AND !empty($GLOBALS[ACA.'queuedate'])) {
				 	return jnewsletter::printM('green' ,  '<b>'._ACA_CP_LAST_QUEUE.':<b> '.$GLOBALS[ACA.'queuedate']).'<br />';
				 }//endif
				 return '';
		   }//endfct


			 function tags( &$content, $tags=null ) {
				$content = str_replace('[ISSUENB]', $tags['issuenb'], $content);
		   }//endfct


			 function viewCron() {

					if ($GLOBALS[ACA.'listype2'] == 1
					OR $GLOBALS[ACA.'listype11'] == 1
					OR $GLOBALS[ACA.'listype3'] == 1) {
						return true;
					}//endif
				return false;
		   }//endfct

			 function updateListNb($lisType, $listId) {
				$xf = new xonfig();
				if (isset($GLOBALS[ACA.'cron_list_nb'])) {
					if ($GLOBALS[ACA.'cron_list_nb']==0 AND $lisType==11) {
		         		$xf->update('cron_list_nb' , $listId);
					}//endif
				}//endif
				if (isset($GLOBALS[ACA.'ecard_list_nb'])) {
					if ($GLOBALS[ACA.'ecard_list_nb']==0 AND $lisType==11) {
		         		$xf->update('ecard_list_nb' , $listId);
					}//endif
				}//endif
				if (isset($GLOBALS[ACA.'coupon_list_nb'])) {
					if ($GLOBALS[ACA.'coupon_list_nb']==0 AND $lisType==11) {
		         		$xf->update('coupon_list_nb' , $listId);
					}//endif
				}//endif
		   }//endif

			function licenseSettings() {
				$token = ( !empty($GLOBALS[ACA.'token'] ) ) ? '&token='.$GLOBALS[ACA.'token'] : '' ;
				define( '_ACA_LICENSE_FORM_LINK', '<a href="http://www.ijoobi.com/index.php?option=com_jstore&controller=license.my&task=token&Itemid=78&website=' .ACA_JPATH_LIVE . $token . '" target="_blank">');
				echo '<fieldset class="jnewslettercss">';
				echo '<legend>'. _ACA_LICENSE_SETTING.'</legend>';
				$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;
				echo '<br /><u>'._ACA_MY_SITE .'</u> <span style="color: rgb(51, 204, 0);">' . $web . '</span>';
				echo '<br /><u>'._ACA_VERSION .'</u> <span style="color: rgb(51, 204, 0);">' . jnewsletter::version() . '</span>';
				$maintenant = date( 'Y-m-d H:i:s', $GLOBALS[ACA.'maintenance'] );
		 if ( ACA_CMSTYPE ) {
				$showMaintenance = ( $GLOBALS[ACA.'maintenance'] > time() ) ? JHTML::_('date',$maintenant, JText::_('DATE_FORMAT_LC4'), 0) : _CMN_NO ;
		 }//endif
				echo '<br /><u>'._ACA_MAINTENANCE .'</u> <span style="color: rgb(51, 204, 0);">' . $showMaintenance  . '</span>';
				echo '<br /><br />';
				if ( auto::good() ) {
					echo jnewsletter::printM('ok' , _ACA_GOOD_LIC );
					jnewsletter::beginingOfTable('jnewslettertable');
					jnewsletter::miseEnPage(_ACA_ENTER_LICENSE, _ACA_ENTER_LICENSE_TIPS , "<textarea  name=\"config['license']\" rows=\"1\" cols=\"80\" >". (string)$GLOBALS[ACA.'license']."</textarea>" );
					jnewsletter::endOfTable();
					if ( !empty( $GLOBALS[ACA.'token']) ) auto::resetToken();
				} else {
					if ( empty($GLOBALS[ACA.'license']) ) {
						echo '<big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>1.'._ACA_ENTER_TOKEN.'</big></big>';
						echo '<br/>' . _ACA_ENTER_TOKEN_TIPS;
						jnewsletter::beginingOfTable('jnewslettertable');
						echo '<br /><br />';
						if (empty($GLOBALS[ACA.'token']))
						jnewsletter::miseEnPage(_ACA_ENTER_TOKEN, _ACA_ENTER_TOKEN_TIPS , "<textarea  name=\"config['token']\" rows=\"1\" cols=\"20\" ></textarea>" );
						else
						jnewsletter::miseEnPage(_ACA_ENTER_TOKEN, _ACA_ENTER_TOKEN_TIPS , $GLOBALS[ACA.'token'] );
						jnewsletter::endOfTable();
						echo '<br/><br/>' . auto::followLink();
						echo '<br /><br />';
						echo  '<big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>3.'._ACA_ENTER_LIC_NB.'</big></big>';
							auto::getToken( $GLOBALS[ACA.'token'] );
							if ( empty($GLOBALS[ACA.'license']) ) {
								jnewsletter::beginingOfTable('jnewslettertable');
								jnewsletter::miseEnPage(_ACA_ENTER_LICENSE, _ACA_ENTER_LICENSE_TIPS , "<textarea  name=\"config['license1']\" rows=\"1\" cols=\"80\" ></textarea>" );
								jnewsletter::endOfTable();
							} else {
								echo jnewsletter::printM('no' , _ACA_NOTSO_GOOD_LIC );
								$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;
								$web = substr( $web, 7 );
								$link4lic = 'http://www.ijoobi.com/index2.php?option=com_japplication&controller=license&task=jnewsletter&url='.$web.'&token=' . $GLOBALS[ACA.'token'];
								echo '<br><iframe src="'.$link4lic.'" width=750 height=100 scrolling=yes frameborder=0></iframe>';
								jnewsletter::beginingOfTable('jnewslettertable');
								jnewsletter::miseEnPage(_ACA_ENTER_LICENSE, _ACA_ENTER_LICENSE_TIPS , "<textarea  name=\"config['license1']\" rows=\"1\" cols=\"80\" >". (string)$GLOBALS[ACA.'license']."</textarea>" );
								jnewsletter::endOfTable();
							}//endif
					} else {
						echo '<big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>1.'._ACA_ENTER_TOKEN.'</big></big>';
						echo '<br/>' . _ACA_ENTER_TOKEN_TIPS;
						jnewsletter::beginingOfTable('jnewslettertable');
						echo '<br /><br />';
						jnewsletter::miseEnPage(_ACA_ENTER_TOKEN, _ACA_ENTER_TOKEN_TIPS , $GLOBALS[ACA.'token'] );
						jnewsletter::endOfTable();
						echo '<br/><br/>' . auto::followLink();
						echo '<br /><br />';
						echo  '<big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>3.'._ACA_ENTER_LIC_NB.'</big></big>';
						echo jnewsletter::printM('no' , _ACA_NOTSO_GOOD_LIC );
						$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;
						$web = substr( $web, 7 );
						$link4lic = 'http://www.ijoobi.com/index2.php?option=com_japplication&controller=license&task=jnewsletter&url='.$web.'&token=' . $GLOBALS[ACA.'token'];
						echo '<br><iframe src="'.$link4lic.'" width=750 height=100 scrolling=yes frameborder=0></iframe>';
						jnewsletter::beginingOfTable('jnewslettertable');
						jnewsletter::miseEnPage(_ACA_ENTER_LICENSE, _ACA_ENTER_LICENSE_TIPS , "<textarea  name=\"config['license1']\" rows=\"1\" cols=\"80\" >". $GLOBALS[ACA.'license']."</textarea>" );
						jnewsletter::endOfTable();
					}//endif
				}//endif
				echo auto::getUpgrade();
				echo '</fieldset>';
			}//endfct

			function getUpgrade() {
				echo '<br /><br /><i><b>'._ACA_LICENSE_SUPPORT.'</i></b>';
				echo '<br/><span style="color: rgb(255, 102, 0);"><b>'._ACA_PLEASE_LIC_GREEN.'</b></span>';
				echo  '<br /><br /><br /><big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>4.'._ACA_UPGRADE_LICENSE.'</big></big>';
				echo '<br /><br />';
				echo _ACA_UPGRADE_LICENSE_TIPS ;
				echo '<br /><br />';
				jnewsletter::beginingOfTable('jnewslettertable');
				jnewsletter::miseEnPage(_ACA_ENTER_TOKEN, _ACA_ENTER_TOKEN_TIPS , "<textarea  name=\"config['token_new']\" rows=\"1\" cols=\"20\" ></textarea>" );
				jnewsletter::endOfTable();
			}//endfct

			function followLink() {
				$a =  '<br/><br/><big style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);"><big>2.'._ACA_FOLLOW_LINK.'</big></big>';
				return $a. '<br/>' . _ACA_FOLLOW_LINK_TWO . '<b><big>'. _ACA_LICENSE_FORM_LINK . _ACA_LICENSE_FORM . '</big></b><br /><br/>';
			}//endfct

			function getToken($tok='') {
				$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;
				$web = base64_encode($web);
				$xf = new xonfig();
				$xf->insert('token', $tok , 0, true);
				$xf->loadConfig();
				$link = $GLOBALS[ACA.'report_site'].'/index.php?option=com_xlicense&act=license&task=getoken';
				$link .= '&token='.$tok;
				$link .= '&web='.$web;
				echo '<img src="' . $link .  '" border="0" width="1" height="1" />';
				return true;
			}//endfct

			function resetToken() {
				$web = ( substr( ACA_JPATH_LIVE , -1, 1) =='/' ) ? substr( ACA_JPATH_LIVE , 0, strlen(ACA_JPATH_LIVE)-1 ) : ACA_JPATH_LIVE;
				$web = base64_encode($web);
				$link = $GLOBALS[ACA.'report_site'].'/index.php?option=com_xlicense&act=license&task=resetoken';
				$link .= '&token='.$GLOBALS[ACA.'token'];
				$link .= '&web='.$web;
				echo '<img src="' . $link .  '" border="0" width="1" height="1" />';
				$xf = new xonfig();
				$xf->update('token', '');
				return true;
			}//endfct


			function receiveToken() {

				 ob_end_clean();
				 $filename = ACA_JPATH_ROOT . '/images/blank.png';
				 $handle = fopen($filename, 'r');
				 $contents = fread($handle, filesize($filename));
				 fclose($handle);
				 header("Content-type: image/png");
				 echo $contents;

				if ( ACA_CMSTYPE ) {	// joomla 15
					$license = JRequest::getVar('license', '');
					$rank1 = JRequest::getVar('random', '');
				}//endif

				if ( $rank1 == $GLOBALS[ACA.'token'] ) {
					$xf = new xonfig();
					$xf->insert('license', $license , 0, true);
				}//endif

				exit();
				return true;
			}//endfct


			function miscSettings($lists) {
			?>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							$tip = _ACA_NEWS_ON_TIPS ;
							$title = _ACA_NEWS_ON;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
						<?php echo $lists['listype1']; ?>
					</td>
				</tr>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							$tip = _ACA_AUTOS_ON_TIPS ;
							$title = _ACA_AUTOS_ON;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
						<?php echo $lists['listype2']; ?>
					</td>
				</tr>
			<?php
			 }//endfct

			 function otherPanel() {
				global $Itemid;


				if ( isset( $GLOBALS[ACA.'cron_list_nb']) AND $GLOBALS[ACA.'listype11'] AND $GLOBALS[ACA.'cron_list_nb']>0) {
					backHTML::controlPanelBottonStart(_UCP_CRON_MENU , 'security_f2.png' , true);


					$link = 'index.php?option=com_jnewsletter&act=listcron&Itemid='.$Itemid;
					backHTML::quickiconButton( $link, 'systeminfo.png', _UCP_CRON_LIST_MENU , false, 'Registered' , true);


					$link = 'index.php?option=com_jnewsletter&act=newcron&Itemid='.$Itemid;
					backHTML::quickiconButton( $link, 'month_f2.png', _UCP_CRON_NEW_MENU , false, 'Registered', true );

					backHTML::controlPanelBottomEnd();
				}//endif



				if ($GLOBALS[ACA.'listype4']) {
					backHTML::controlPanelBottonStart(_UCP_COUPON_MENU , 'security_f2.png');


					$link = 'index.php?option=com_jnewsletter&act=mailing&listype=4';
					backHTML::quickiconButton( $link, 'query.png', _ACA_MENU_ECARD.' '._ACA_LIST , false, 'admin' , true);


					if ($GLOBALS[ACA.'ecard_list_nb']>0) {
						$link = 'index.php?option=com_jnewsletter&act=mailing&task=edit&listid='. $GLOBALS[ACA.'ecard_list_nb'] .'&listype=5';
						backHTML::quickiconButton( $link, 'newsletter.png', _ACA_NEW.' '._ACA_ECARD , false, 'admin' , true);
					}//endif
					backHTML::controlPanelBottomEnd();
				}//endif




				if ($GLOBALS[ACA.'listype5']) {
					backHTML::controlPanelBottonStart(_UCP_COUPON_MENU , 'security_f2.png');


					$link = 'index.php?option=com_jnewsletter&act=mailing&listype=5';
					backHTML::quickiconButton( $link, 'query.png', _UCP_COUPON_LIST_MENU , false, 'agent' , true);


					if ($GLOBALS[ACA.'coupon_list_nb']>0) {
						$link = 'index.php?option=com_jnewsletter&act=mailing&task=edit&listid='. $GLOBALS[ACA.'coupon_list_nb'] .'&listype=5';
						backHTML::quickiconButton( $link, 'newsletter.png', _UCP_COUPON_ADD_MENU , false, 'agent' , true);
					}//endif
					backHTML::controlPanelBottomEnd();
				}//endif

		   }//endfct

		   function cleanQueue(){
		   		if ( ACA_CMSTYPE ) {
					$database =& JFactory::getDBO();
				}//endif

				$query = "DELETE FROM `#__jnews_subscribers` WHERE `email` NOT LIKE '%@%' ;";
				$database->setQuery($query);
				$database->query();

				$query = 'DELETE Q.* FROM `#__jnews_queue` AS Q LEFT JOIN `#__jnews_subscribers` AS S on S.id = Q.subscriber_id WHERE S.id IS NULL ;';
				$database->setQuery($query);
				$database->query();

				if(!empty($GLOBALS[ACA.'clean_stats'])){//changed senddate to sentdate
						$query = 'DELETE FROM `#__jnews_stats_details` WHERE `sentdate` < "'.date( 'Y-m-d',time() - intval($GLOBALS[ACA.'clean_stats'])*24*3600).'";';
						$database->setQuery($query);
						$database->query();
				}//endif
		   }//endfct

		   function displayStatus(){
		      	if ( ACA_CMSTYPE ) {
					$database =& JFactory::getDBO();
				}//endif

				$query = 'SELECT mailing_id as id,COUNT(*) as number,MIN(send_date) as send_date, subscriber_id FROM `#__jnews_queue` WHERE `mailing_id`>0 AND `published`>0 AND `suspend`= 0 GROUP BY `mailing_id`; ';
				$database->setQuery($query);
				$status = $database->loadObjectList();


				if(!empty($status)){
					$info = array();
					echo '<br/><br/>The actual time for jNews is '.date('Y-m-d H:i:s',jnewsletter::getNow());//mary
					foreach($status as $oneStatus){
						$info[] = 'There is still '.$oneStatus->number.' e-mails in the queue for the e-mail ID '.$oneStatus->id.'<br/>The next one will be sent after './*editedmary $oneStatus->send_date*/date('Y-m-d H:i:s',$oneStatus->send_date).' to the user '.$oneStatus->subscriber_id;
					}//endforeach
					echo '<ul><li>'.implode('</li><li>',$info).'</li></ul>';
				}else{
					echo '<br/>There are no more pending emails in your queue<br/>';
				}//endif
				//$query = 'SELECT id,list_name,published,next_date FROM `#__jnews_mailings` WHERE list_type = 7';
				$query = 'SELECT id,published,next_date,subject FROM `#__jnews_mailings` WHERE mailing_type = 7';
				$database->setQuery($query);

				$smartNews = $database->loadObjectList();

				if(!empty($smartNews)){
					echo '<br/><br/>Smart Newsletter status : ';
					$texts = array();
					$infZero = false;
					foreach($smartNews as $mySmartList){
						if($mySmartList->published > 0){
							$delaySmart = ($mySmartList->next_date - time())/60;
	                       if($mySmartList->next_date<=0){
								$texts[] = 'The Smart Newsletter "'.$mySmartList->subject.'" (ID '.$mySmartList->id.') will try to generate an e-mail in '.(int) $delaySmart.' minutes ( at 0000-00-00 00:00:00)';
	                       }else{
	                       		$texts[] = 'The Smart Newsletter "'.$mySmartList->subject.'" (ID '.$mySmartList->id.') will try to generate an e-mail in '.(int) $delaySmart.' minutes ( at '.date('Y-m-d H:i:s',$mySmartList->next_date + ACA_TIME_OFFSET *60*60 + - date('Z')).')';
	                       }
	                       if($delaySmart < 0) $infZero = true;
						}else{
							$texts[] = 'Your Smart Newsletter"'.$mySmartList->subject.'" (ID '.$mySmartList->id.') is not published so no Newsletter will be generated from this list';
						}//endif
					}//endforeach
					if($infZero) $texts[] = "One of your delay is negative, that means either you did not create any SmartNewsletter in your list or you do not have any subscriber in your Smart Newsletter list, or the start date of your List is still in the future";
					echo '<ul><li>'.implode('</li><li>',$texts).'</li></ul>';
				}//endif
		   }//endfct

		 }//endclass