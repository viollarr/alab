	<?php
	defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
	### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54


	 class autonews {

		function editmailing() {

			$show['sender_info'] = true;
			$show['published'] = false;
			$show['pub_date'] = false;
			$show['hide'] = true;
			$show['issuenb'] = false;
			$show['delay'] = false;
			$show['htmlcontent'] = true;
			$show['textcontent'] = true;
			$show['attachement'] = true;
			$show['images'] = true;
			$show['sitecontent'] = true;
			return $show;

		}//endfct


		function editlist() {
			$show['sender_info'] = true;
			$show['hide'] = true;
			$show['auto_option'] = false;
			$show['htmlmailing'] = true;
			$show['auto_subscribe'] = true;
			$show['email_unsubcribe'] = true;
			$show['unsusbcribe'] = true;
			return $show;

		}//endfct


		function showMailings() {
			$show['id'] = true;
			$show['dropdown'] = true;
			$show['select'] = true;
			$show['issue'] = true;
			$show['sentdate'] = true;
			$show['delay'] = false;
			$show['status'] = true;
			return $show;
		}//endfct


		function getQueue() {
			$query =  ' AND `mailing_id` > 0 ';
			$query .= ' AND `issue_nb` > 0 ';
			$query .= ' AND `type`= 7  ';
			$query .= ' AND `published` > 0';
			$query .=  ' AND `mailing_id` IN (' .
						'	SELECT M.`id` FROM #__jnews_mailings AS M WHERE M.`published` > 0 '.
					') ';
			return $query;
		}//endfct


		 function getActive() {
			$config['listype7'] = '1';
			$config['listname7'] = '_ACA_AUTONEWS';
			$config['listnames7'] = '_ACA_MENU_AUTONEWS';
			$config['listshow7'] = '1';
			$config['listlogo7'] = 'smartnewsletter.png';
			$config['classes7'] ='autonews';
			return $config;
		}//endfct



		 function update($xf) {
			if ( auto::good()) {
				//$lists = lists::getListsDate( 7 ); original commented by eve
				$lists=lists::getMailingsDate(7);
				$nextDates  = array();
				if ( empty($lists) ) return true;
				foreach( $lists as $list ) {
					if ( $list->next_date < time() ){
						$delay = 0;
						$monthlay=0;
						$seconds = 0;
						switch ($list->delay_min) {
							case '1':
							case '2':
								$delay = 1;
								break;
							case '3':
							case '4':
								$delay = 2;
								break;
							case '5':
								$delay = 7;
								break;
							case '6':
								$delay = 14;
								break;
							case '7':
								$monthlay = 1;
								break;
							case '8':
								$monthlay = 3;
								break;
							case '9':
								$monthlay = 12;
								break;
							default :
								$seconds = $list->delay_min;
								break;
						}//endswitch

						$tm = $list->next_date;
						//$tm = $GLOBALS[ACA.'next_autonews'];
						$lastDate = @mktime(date("H", $tm), date("i", $tm), date("s", $tm), date("m", $tm)-$monthlay, date("d", $tm)-$delay ,  date("Y", $tm));
						$lastDate = $lastDate + $seconds;
						 if($tm==0){
							$lastDate='0';
						}
						if($lastDate>=time() OR $lastDate <=0) $lastDate = time() - $seconds - $monthlay*60*60*30*24 - $delay*60*60*24;

						autonews::createNewsletter( $list , $lastDate );

						$list->next_date = mktime(date("H", $tm), date("i", $tm), date("s", $tm), date("m", $tm)+$monthlay, date("d", $tm)+$delay ,  date("Y", $tm));
						$list->next_date = $list->next_date + $seconds;
						if($list->next_date < time()){
							$list->next_date = mktime(date("H"), date("i"), date("s"), date("m")+$monthlay, date("d")+$delay ,  date("Y"));
						}//endif
						$nextDates[] = $list->next_date;
						lists::updateMailingData($list);
					}//endif

				}//endforeach

				$higherDate = $GLOBALS[ACA.'next_autonews'];
				foreach( $nextDates as $nextDate) {
					if ( $nextDate > $higherDate ) $higherDate = $nextDate;
				}//endforeach

				$xf->update('next_autonews', $higherDate );
			}//endif

		}//endfct

	function createNewsletter( $list , $lastDate ) {

                $database =& JFactory::getDBO();
                global $mainframe;

                $erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

                $smartNews = '';
                $query = 'SELECT `id` FROM `#__content`';
                $query .= ' WHERE ( `publish_up` >\''.jnewsletter::getDBDate($lastDate).'\'';
                $query .= ' OR `modified` > \''.jnewsletter::getDBDate($lastDate).'\'';
                $query .= ' OR `created` >\''.jnewsletter::getDBDate($lastDate).'\' )';
                $query .= ' AND `created` < \'' .jnewsletter::getDBDate() .'\'';
                $query .= ' AND `publish_up` < \'' .jnewsletter::getDBDate() .'\'';
                $query .= ' AND (`publish_down` > \''.jnewsletter::getDBDate() .'\' OR `publish_down` = 0)';
                $query .= ' AND `state` = 1';

                $conditions = array();
                $allCategories = explode(',',$list->cat_id);
                foreach($allCategories as $oneCat){
                        $secat = explode(':',$oneCat);
                        if(empty($secat[0])){
                                continue;
                        }
                        if(empty($secat[1])){
                                $conditions[] = '`sectionid` = '.intval($secat[0]).' AND `catid` > 0';
                                continue;
                        }
                        $conditions[] = '`sectionid` = '.intval($secat[0]).' AND `catid` = '.intval($secat[1]);
                }

                if(!empty($conditions))        $query .= ' AND ((' . implode(') OR (',$conditions). '))';

                $ordering[0] = ' ORDER BY `created` DESC ';
                $ordering[1] = ' ORDER BY `title` ASC ';
                $ordering[2] = ' ORDER BY `ordering` ASC ';

                $query .= $ordering[$list->notify_id];

                $database->setQuery($query);
                $newsLists = $database->loadObjectList();
                $erro->err = $database->getErrorMsg();

                if($mainframe->isAdmin()){
                        $nbArticles = count($newsLists);
                        echo '<br/>The system tried to genenerate a SmartNewsletter ('.$list->subject.') and found '.$nbArticles.' new published articles between '.jnewsletter::getDBDate($lastDate);
                        if(ACA_CMSTYPE) echo ' GMT';
                        echo ' and '.jnewsletter::getDBDate();
                        if(ACA_CMSTYPE) echo ' GMT'; else echo ' Server Time';
                        echo '<br/>';
                        echo 'The query executed was : '.$query.'<br/><br/>';
                }

                if (!$erro->E(__LINE__ ,  '8400', $database)) return '';

                if (!empty( $newsLists )) {
                        foreach( $newsLists as $newsList ) {
                                $smartNews .= '{contentitem:'.$newsList->id.'|'.$list->delay_max.'}';
                                $smartNews .= '<br /><br />';
                        }

                        $mailing = xmailing::getOneMailingSmart( $list->id, 0 );

                        if ( !empty($mailing) AND isset($mailing->list_id)) {

                                //$currentList = xmailing::countMailings( $list->id, $list->list_type );
                                $currentList = xmailing::countMailings( $list->id, $list->mailing_type );
                                $mailing->issue_nb = $currentList+1;
                                $mailing->published = 2;
                                $mailing->send_date = jnewsletter::getNow();

                                $mailing->htmlcontent = str_replace('[SMARTNEWSLETTER]', $smartNews , $mailing->htmlcontent);
                                if ( !empty($mailing->textonly) ){
                                        $mailing->textonly = str_replace('[SMARTNEWSLETTER]', $smartNews , $mailing->textonly);
                                        $mailing->textonly = str_replace(array('<br>', '<br/>', '<br />', '<br >','<BR >', '<BR>', '<BR/>', '<BR />', '</p>', '</P>', '<p />', '<p/>', '<P />', '<P/>'), "\n", $mailing->textonly);
                                }

                                $error = xmailing::insertMailingData($mailing);
                                $list_mailingId=$list->id;
                                if (!$error) {

                                } else {
                                        $q = "SELECT LAST_INSERT_ID()";
                                        $database->setQuery($q);
                                        $mailingId = $database->loadResult();

//echo '<br>mailing id: '. $mailingId;

										$q2='INSERT IGNORE INTO `#__jnews_listmailings` (`list_id`,`mailing_id`)' .
												'SELECT `LM`.`list_id`,`id` FROM `#__jnews_listmailings` as `LM`, `#__jnews_mailings` AS `M`' .
												'WHERE `M`.`id`='.$mailingId;
//echo '<br>Q2: '.$q2;

										$database->setQuery($q2);
										$database->query();

                              // if (autonews::countSubscribers($list->id) > 0) {
                                            $info = null;
                                            //$info->list_id = $mailing->list_id;
                                            $info->delay = 0;
                                            $info->acc_level = 25;
                                            $info->mailing_id = $mailingId;
                                            $info->send_date = $mailing->send_date;
                                            $info->issue_nb = $mailing->issue_nb;
                                            $info->published = 2;
                                           	$erro->ck = autonews::insertQueuesForAutoNews2($info);

                                            $erro->Eck(__LINE__ ,  '8416', 'put here 2 $d');
                                      // }//endif
                                }
                        }
                }//endif


        }

		 function countSubscribers( $listId ) {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$database =& JFactory::getDBO();
				$my	=& JFactory::getUser();
			}//endif

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$subscribers = 0;

		    if ($listId > 0) {
		    	$query = 'SELECT count(q.subscriber_id) nSubs FROM `#__jnews_queue` q, `#__jnews_subscribers` s
							WHERE s.id = q.subscriber_id
							AND s.blacklist = 0
							AND s.confirmed = 1
							AND q.published != 2
							AND q.mailing_id ='.$listId;
							//AND q.list_id = '.$listId.' original commented by eve
				$database->setQuery($query);
				$subscribers = $database->loadResult();
				$erro->err = $database->getErrorMsg();
				$erro->E(__LINE__ , '8611', $database );
		    }//endif

			return $subscribers;
		}//endfct


		 function getSubscribersAutoNews( $listId ) {

			if ( ACA_CMSTYPE ) {	// joomla 15
				$database =& JFactory::getDBO();
				$my	=& JFactory::getUser();
			}//endif

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		    if ($listId > 0) {
			    $query = 'SELECT M.* FROM `#__jnews_subscribers` AS M LEFT JOIN `#__jnews_queue` AS N' .
		    		' ON  M.id = N.subscriber_id  WHERE  N.list_id ='.$listId .' AND  N.published<>2 ';//icheck
		    }//endif
			$query .= ' AND M.blacklist = 0 AND M.confirmed = 1  ';
			$query .= ' AND N.mailing_id = 0';

			$database->setQuery($query);
			$subscribers = $database->loadObjectList();
			$erro->err = $database->getErrorMsg();
			$erro->E(__LINE__ , '8611', $database );
			return $subscribers;
		}//endfct

		 function getNbSubscribers($subId, $info ) {
			$status = true;
			for ($k=0 ;$k < count($subId); $k++) {
	            $queue = new stdClass;
	            $queue->id = 0;
	            $queue->subscriber_id = $subId[$k];
	            //$queue->list_id = $info->list_id; commented by eve
	            $queue->type = '7';
	            $queue->suspend = '0';
	            $queue->delay = $info->delay;
	            $queue->acc_level = $info->acc_level;
	            $queue->mailing_id = $info->mailing_id;
	            $queue->send_date = $info->send_date;
	            $queue->issue_nb = $info->issue_nb;
	            $queue->published = $info->published;
		        $queue->params = '';

	     		//********** Added by Grace
				if (!empty($GLOBALS[ACA.'sm_prior']))$queue->priority = $GLOBALS[ACA.'sm_prior'];
				$queue->attempt = 0;
				//**************************

	            if (!queue::insert($queue)) $status = false;
			}//endfor
			return $status;
		 }//endfct


		 function insertQueuesForAutoNews($subId, $info ) {
			$status = true;
			for ($k=0 ;$k < count($subId); $k++) {
	            $queue = new stdClass;
	            $queue->id = 0;
	            $queue->subscriber_id = $subId[$k];
	            //$queue->list_id = $info->list_id; original commented by eve
	            $queue->type = '7';
	            $queue->suspend = '0';
	            $queue->delay = $info->delay;
	            $queue->acc_level = $info->acc_level;
	            $queue->mailing_id = $info->mailing_id;
	            $queue->send_date = $info->send_date;
	            $queue->issue_nb = $info->issue_nb;
	            $queue->published = $info->published;
		        $queue->params = '';

	     		//********** Added by Grace
				if (!empty($GLOBALS[ACA.'sm_prior']))$queue->priority = $GLOBALS[ACA.'sm_prior'];
				$queue->attempt = 0;
				//**************************

	            if (!queue::insert($queue)) $status = false;
			}//endfor
			return $status;
		 }//endfct

	 function insertQueuesForAutoNews2($info) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} else {
			global $database ;
		}//endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$status = true;

		$listids=xmailing::getMailingList($info->mailing_id);
		$query=array();
		foreach($listids as $listId){
			$query[] = 'INSERT IGNORE INTO `#__jnews_queue` (`type` , `subscriber_id` , `mailing_id`, `issue_nb`, `send_date`, `suspend` , `delay`, `acc_level`, `published` )
				(SELECT 7, `LS`.`subscriber_id`,'.intval($info->mailing_id).', '.intval($info->issue_nb).', \''.$info->send_date.'\', 0, '.$info->delay.', '.$info->acc_level.', '.$info->published.'
				FROM `#__jnews_listssubscribers` AS `LS`, `#__jnews_queue` AS `Q`
				WHERE `LS`.unsubscribe = 0 AND `Q`.`mailing_id` IN (SELECT `LM`.`mailing_id` FROM `#__jnews_listmailings` as `LM` WHERE `LM`.`list_id`='.$listId.'))';
		}

		$size = sizeof($query);
		for ($index = 0; $index < $size; $index++) {
			$database->setQuery($query[$index]);
			$database->query();
		}

		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ , '8534', $database )) { $status = false; }

		return $status;
	 }

		 function updateQueuesForAutoNews($info) {
			if ( ACA_CMSTYPE ) { //joomla 15
				$database =& JFactory::getDBO();
			}//endif

			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$status = true;

			$query = 'UPDATE `#__jnews_queue` SET ' .
						'`issue_nb` = '.intval($info->issue_nb).','.
						'`send_date` = \''.$info->send_date.'\', ' .
						'`published` = 2 ' .
					'WHERE `mailing_id` = '. $info->mailing_id;
			//WHERE subscriber_id = '.$info->subscriber_id.')';

			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ , '8534', $database )) { $status = false; }
			return $status;
		 }//endfct


		function edit($listEdit, $lists, $show, $html) {

			$order[0] = 'Created date (newest first)';
			$order[1] = 'Title';
			$order[2] = 'Order';

			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
				$jour[] = JHTML::_('select.option',  '0', _ACA_FULL_ARTICLE );
				$jour[] = JHTML::_('select.option',  '1', _ACA_INTRO_ONLY );
				$jour[] = JHTML::_('select.option',  '2', _ACA_TITLE_ONLY );
				if( !isset($lists['delay_max']) ) $lists['delay_max'] = null;
				$lists['delay_max'] = JHTML::_('select.radiolist',$jour,'delay_max', 'class="inputbox"', 'value', 'text', ( isset( $listEdit->delay_max ) ) ? $listEdit->delay_max : 0);
				JHTML::_('behavior.calendar');

				$joomOrder = array();
				foreach($order as $key => $oneOrder){
					$joomOrder[] = JHTML::_('select.option',  $key, $oneOrder );
				}//endif
				if( !isset($lists['notify_id']) ) $lists['notify_id'] = null;
				$lists['notify_id'] = JHTML::_('select.radiolist',$joomOrder,'notify_id', 'class="inputbox"','value','text', ( isset( $listEdit->notify_id) ) ? $listEdit->notify_id : 0);

			}//endif


			if (empty($listEdit->cat_id)) {
				$listEdit->cat_id= '0:0';
			}//endif

			$query = "SELECT s.id as secid, s.title, c.id as catid, c.title as name"
			. "\n FROM #__categories as c LEFT JOIN #__sections AS s on c.section = s.id"
			. "\n WHERE s.id > 0 ORDER BY s.ordering, c.ordering";
			$database->setQuery( $query );
			$allCats = $database->loadObjectList();

			$allselect = explode(',',$listEdit->cat_id);
			$elementSelected = array();
			foreach($allselect as $oneSelect){
				$elementSelected[$oneSelect] = true;
			}//endforeach
			$displayCats = '<select multiple name="cat_id[]">';
			$displayCats .= '<option value="0:0"';
			if(!empty($elementSelected['0:0'])) $displayCats .= ' SELECTED ';
			$displayCats .= '>'._ACA_SELECT_SECTION.'</option>';
			$prevSecId = 0;
			foreach($allCats as $oneCat){
				if($prevSecId != $oneCat->secid){
					if(!empty($prevSecId)) $displayCats .= '</OPTGROUP>';
					$displayCats .= '<OPTGROUP LABEL="'.$oneCat->title.'">';
					$displayCats .= '<option value="'.$oneCat->secid.':0"';
					if(!empty($elementSelected[$oneCat->secid.':0'])) $displayCats .= ' SELECTED ';
					$displayCats .= '>'._ACA_SELECT_CAT.' ('.$oneCat->title.')</option>';
					$prevSecId = $oneCat->secid;
				}//endif
				$displayCats .= '<option value="'.$oneCat->secid.':'.$oneCat->catid.'"';
				if(!empty($elementSelected[$oneCat->secid.':'.$oneCat->catid])) $displayCats .= ' SELECTED ';
				$displayCats .= '>'.$oneCat->name.'</option>';
			}//endforeach
			if(!empty($prevSecId)) $displayCats .= '</OPTGROUP>';

			$lists['sectionid'] = $displayCats;

			?><fieldset class="jnewslettercss">
		<legend><?php echo _ACA_AUTO_NEWS_OPTION; ?></legend>
		<table class="jnewslettertable" cellspacing="1">
			<tbody>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_STARTDATE_TIPS;
						$title = _ACA_AUTONEWS_STARTDATE;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php
						if (!isset($doc)) $doc =& JFactory::getDocument();
				             	$doc->addStyleSheet(ACA_PATH_ADMIN_INCLUDES.'calendar2/css/calendar.css');
				             	$doc->addScript(ACA_PATH_ADMIN_INCLUDES.'calendar2/js/calendar.js');
					?>
					<input id="acaCalendar" type="text" value="<?php if( !empty($listEdit->start_date)) { echo date( 'Y-m-d h:i' ,$listEdit->start_date); } else { echo date( 'Y-m-d h:i', time()); } ?>" readonly name="start_date">
							<input title="<?php echo _ACA_DATETIME; ?>" type="button" class="calendarDash" value="" onclick="displayCalendar(document.getElementById('acaCalendar'),'yyyy-mm-dd hh:ii',this,true)">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'The next time jNews will generate a Newsletter', '', 280, 'tooltip.png', 'Next generated date', '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php $listEdit->next_date = ( isset($listEdit->next_date) ) ? $listEdit->next_date : time() ?>
					<!--<input class="inputbox" type="text" name="next_date" id="next_date" size="25" maxlength="22" value="<?php //echo date('Y-m-d H:i',$listEdit->next_date - date('Z')).' GMT'?>" />-->
					<input class="inputbox" type="text" name="next_date" id="next_date" size="25" maxlength="22" value="<?php echo date('Y-m-d H:i',$listEdit->next_date).' GMT'?>" />
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_FREQ_TIPS;
						$title = _ACA_AUTONEWS_FREQ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['delay_min'];?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_CAT_TIPS;
						$title = _ACA_AUTONEWS_CAT;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['sectionid']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Select the way you want your articles to be ordered', '', 280, 'tooltip.png', 'Ordering', '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['notify_id']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_TYPE_TIPS;
						$title = _ACA_AUTONEWS_TYPE;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['delay_max']; ?>
				</td>
			</tr>
			</tbody>
		</table>
		</fieldset>
		<?php

		}//endfct

	 }//endclass
