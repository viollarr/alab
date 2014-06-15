	<?php
	 defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
	### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54


	if ( !defined('ACA_JPATH_ROOT') ) {
		if ( defined('JPATH_ROOT') AND class_exists('JFactory')) {	// joomla 15
			define ('ACA_JPATH_ROOT' , JPATH_ROOT );
		}//endif
	}//endif

	require_once( ACA_JPATH_ROOT . '/components/com_jnewsletter/defines.php');

	$_PLUGINS->registerFunction( 'onUserActive', 'userActivated','getjNewsTab' );
	$_PLUGINS->registerFunction( 'onAfterDeleteUser', 'userDeleted','getjNewsTab' );

	global $mainframe;
	 define('_JNEWSLETTERCLASS', ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');

	if(!$mainframe->isAdmin()){
		$Itemid = @$GLOBALS[ACA.'itemidAca'];
	}//endif

	class getjNewsTab extends cbTabHandler {
		function getjNewsTab() {
			$this->cbTabHandler();
		}//endfct

	    function _memGetTabParameters($user){
			$params = $this->params;

	        $TabParams["show_archive"] = $params->get('show_archive', 1);
	        $TabParams["public_view"] = $params->get('public_view', 0);
	        $TabParams["jnewsletter_itemid"] = $params->get('jnewsletter_itemid', '');

	        return $TabParams;
		}//endfct

		 function _editSubscriber($user, $subscriber, $listings, $queues, $forms, $access=false, $frontEnd=false, $cb=false ) {

			$br = "\n\r";
	        $html = '<div style="width:100%; align:left;">'.$br;
			$html .= '<fieldset class="jnewslettercss" style="padding: 10px; text-align: left">'.$br;
			$html .= '<legend><strong>'._ACA_SUB_INFO.'</strong></legend>'.$br;
			$html .= '<table cellpadding="0" cellspacing="0" align="center">'.$br;

	        if ($subscriber->receive_html) {
	            $receive_html = _CMN_YES;
	        } else {
	            $receive_html = _CMN_NO;
	        }//endif
			$html .= jnewsletter::miseEnHTML(_ACA_RECEIVE_HTML , _ACA_RECEIVE_HTML_TIPS, $receive_html);

	        if ($GLOBALS['aca_time_zone']==1) {
				$html .= jnewsletter::miseEnHTML(_ACA_TIME_ZONE_ASK , _ACA_TIME_ZONE_ASK_TIPS, $subscriber->timezone);
	 		}//endif

			$html .= '</table>';
			$html .= '</fieldset></div>';

			$html .=  getjNewsTab::_showSubscriberLists($user, $subscriber, $listings, $queues, $frontEnd, $access);

			return $html;
		}//endfct

		 function _showSubscriberLists($user, $subscriber, $lists, $queues, $frontEnd, $accessAdmin) {
			 global $Itemid;
			$tabparams = $this->_memGetTabParameters($user);

	        if (!empty($lists)) {
				$br = "\n\r";
	            $html = '<fieldset class="jnewslettercss" style="padding: 4px; text-align: left">'.$br;
				$html .= '<legend><strong>'._ACA_SUBSCRIPTIONS.'</strong></legend>' .$br;
				$html .= '<table width="100%"  border="0" cellspacing="0" cellpadding="4" class="adminlist">' .$br;
				$html .= '<tr><th class="title">#</th>' .$br;
				$html .= '<th class="title">'._ACA_LIST_NAME.'</th>' .$br;
				$html .= '<th class="title" style="text-align: center;">'._ACA_LIST_T_SUBSCRIPTION.'</th>' .$br;

	            if ($tabparams['show_archive']) {$html .= '<th class="title" style="text-align: center;">'._ACA_VIEW_ARCHIVE.'</th>' .$br;}

	            $html .= '</tr>' .$br;

				$subscribed = '';
				$i = 0;
			  	foreach ($lists as $list) {
					$i++;
					$subscribed = 0;
					if (!empty($queues)) {
						foreach ($queues as $queue) {
								if ($queue->list_id == $list->id) {
									$subscribed =1;
								}//endif
						}//endforeach
					}//endif

	                if (!empty($tabparams['jnewsletter_itemid'])) {
	                    $item_id = $tabparams['jnewsletter_itemid'];
	                } else {
	                    $item_id = $Itemid;
	                }//endif

					$html .= '<tr><td>'.$i.'</td><td>' .$br;
					$link = ( $list->hidden AND ($list->list_type =='1' or $list->list_type =='7') AND $GLOBALS[ACA.'show_archive'] ) ? 'index.php?option=com_jnewsletter&act=mailing&task=archive&listid='.$list->id.'&Itemid='.$item_id : '#';

					$html .= '<span class="aca_letter_names"';
					if ($link == "#"){$html .= " onclick='return false;' ";}
					$html .= '>'. compa::toolTip($list->list_desc ,$list->list_name,'', '', $list->list_name, $link, 1).' </span>' .$br;
					$html .= '</td><td style="text-align: center;">' .$br;

	                if ( $subscribed == 1 ) {$html .= _CMN_YES;}
	                if ( $subscribed == 0 ) {$html .= _CMN_NO;}

					$html .= '</td>' .$br;

					if ($tabparams['show_archive'] && ($list->list_type == 1 or $list->list_type == 7)) {
						$link = '.php?option=com_jnewsletter&act=mailing&listid=' .$list->id . '&listype=' .$list->list_type .'&task=archive&Itemid=' . $item_id;
						compa::completeLink($link,false);

						$img = 'move_f2.png';
						$html .=  '<td height="20" style="text-align: center;">';
						$html .=  '<a href="' . $link. '" >'."\n\r" ;
						$html .=  '<img src="components/com_jnewsletter/images/' . $img. '" width="20" height="20" border="0" alt="'._ACA_VIEW_ARCHIVE.'" /></a></td>'."\n\r" ;
					}elseif($tabparams['show_archive']) {
						$html .=  '<td height="20"><center>-</center></td>'."\n\r";
					}//endif

				}//endforeach
				$html .=  '<tr></table></fieldset>';
				 return $html;
			 }//endif

		}//endfct

	    function getDisplayTab( $tab, $user, $ui) {
		    global $Itemid;

			if ( ACA_CMSTYPE ) {	// joomla 15
				$my	=& JFactory::getUser();
				$document=& JFactory::getDocument();
				$document->addStyleSheet( 'components/com_jnewsletter/css/jnewsletter.css', 'text/css' );
			}//endif


	      if(!getjNewsTab::checkInstalled()) {
	      	return _UE_NEWSLETTERNOTINSTALLED;
	      }//endif

		  $tabparams = $this->_memGetTabParameters($user);

	      if (!$tabparams['public_view']) {
	        if (empty($my->id) OR $my->id != $user->user_id) {return;}
	      }//endif

	      $html = '';
	      require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
	      require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/views/subscribers.jnewsletter.html.php');

	      if (!empty($user->id)) {
	      	$userId = $user->user_id;
	        $subscriber = subscribers::getSubscriberInfoFromUserId($userId, false);
	      	$subscriberId = $subscriber->id;
	        $queues = listssubscribers::getSubscriberLists($subscriberId);

	      	$access = jnewsletter::checkPermissions('admin', $my->id);

	      } else {
	      	$userId = 0;
	      	$queues = '';
	      	$access = false;
	      	$subscriberId = 0;
	      	$subscriber->id =  '' ;
	      	$subscriber->user_id =  0 ;
	      	$subscriber->name =  '' ;
	      	$subscriber->email =  '' ;
	      	$subscriber->ip = subscribers::getIP();
	      	$subscriber->receive_html =  1 ;
	      	$subscriber->confirmed =  1;
	      	$subscriber->blacklist =  0;
	      	$subscriber->timezone = '00:00:00';
	      	$subscriber->language_iso = 'eng';
	      	$subscriber->params = '';
	      	$subscriber->subscribe_date =  jnewsletter::getNow();

	      	if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
	      	$subscriber->column1='';
	      	$subscriber->column2='';
	      	$subscriber->column3='';
	      	$subscriber->column4='';
	      	$subscriber->column5='';
	      	}//end if the version of jnewsletter is pro
	      }//endif

	      $lists = lists::getLists(0, 0, $subscriberId, '', false , true, false);
	      $doShowSubscribers = false;

	      $html .= getjNewsTab::_editSubscriber($user, $subscriber, $lists, $queues, '', $access, false, true );
		  $html .= jnewsletter::noShow();

	      return $html;
	    }//endfct



		function getEditTab( $tab, $user, $ui) {
			global $Itemid;

			if ( ACA_CMSTYPE ) {	// joomla 15
				$my	=& JFactory::getUser();
				if ($my->get('id') < 1) {
					echo JText::_('ALERTNOTAUTH');
					echo "<br />" . JText::_( 'You need to login.' );
					return false;
				}
			}//endif

			if(!getjNewsTab::checkInstalled()) {
				return _UE_NEWSLETTERNOTINSTALLED;
			}//endif

			$html = '';
			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/views/subscribers.jnewsletter.html.php');

			if (!empty($user->id)) {
				$userId = $user->id;
			    $subscriber = subscribers::getSubscriberInfoFromUserId($userId);
				if(empty($subscriber)){
					subscribers::syncSubscribers(true);
					$subscriber = subscribers::getSubscriberInfoFromUserId($userId);
				}//endif
				$subscriberId = $subscriber->id;
			    $queues = listssubscribers::getSubscriberLists($subscriberId);

				$access = jnewsletter::checkPermissions('admin', $my->id);

			} else {
				$userId = 0;
				$queues = '';
				$access = false;
				$subscriberId = 0;
				$subscriber->id =  '' ;
				$subscriber->user_id =  0 ;
				$subscriber->name =  '' ;
				$subscriber->email =  '' ;
				$subscriber->ip = subscribers::getIP();
				$subscriber->receive_html =  1 ;
				$subscriber->confirmed =  1;
				$subscriber->blacklist =  0;
				$subscriber->timezone = '00:00:00';
				$subscriber->language_iso = 'eng';
				$subscriber->params = '';
				$subscriber->subscribe_date =  jnewsletter::getNow();

				if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
				$subscriber->column1='';
				$subscriber->column2='';
				$subscriber->column3='';
				$subscriber->column4='';
				$subscriber->column5='';
				}//endif check of version pro
			}//endif

			$lists = lists::getLists(0, 0, $subscriberId, '', false , true, false);
			$doShowSubscribers = false;

			$mainLink = '.php?option=com_jnewsletter';
			$selectLink = '.php?option=com_jnewsletter&act=subscriber';
			compa::completeLink($mainLink,false);
			compa::completeLink($selectLink,false);

			$forms['main'] =  '<form method="post" action="'.$mainLink.'" onsubmit="submitbutton();return false;" name="mosForm" >' ."\n\r";
			$forms['select'] = '<form method="post" action="'.$selectLink.'"  name="jNewsFilterForm">';

		    $html .= subscribersHTML::editSubscriber($subscriber, $lists, $queues, $forms, $access, false, true );
			$html .=  '<input type="hidden" name="subscriber_id" value="'.$subscriber->id.'" />';

			return $html;
		}//endfct


		function saveEditTab($tab, &$user, $ui, $postdata) {

			if ( ACA_CMSTYPE ) {	// joomla 15
				$my	=& JFactory::getUser();
				if ($my->get('id') < 1) {
					echo JText::_('ALERTNOTAUTH');
					echo "<br />" . JText::_( 'You need to login.' );
					return;
				}
			}//endif

			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
			 if(!subscribers::updateOneSubscriber($user->user_id, $user))
				$this->_setErrorMSG(_ACA_ERROR);
		}


		function getDisplayRegistration($tab, $user, $ui) {

			if ( ACA_CMSTYPE ) {	// joomla 15
				$my	=& JFactory::getUser();
			}//endif

			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
			$html = '';

			if ($GLOBALS['aca_cb_plugin']=='1' ) {
				$lists = lists::getSpecifiedLists($GLOBALS['aca_cb_listIds'], false );
				if (!empty($lists)) {

					$i=0;
					$accessLevel = 18; //default access level jack 31
					$htmlOK = false;

					if (!empty($GLOBALS['aca_cb_intro'])) {
						$html .= '<tr><td class="titleCell" colspan="2">'. $GLOBALS['aca_cb_intro'] .'</td></tr>';
					}//endif

					if ($GLOBALS['aca_cb_showname']) {

						 foreach ($lists as $list) {
							$i++;
							$subscribed = 0;
						 	if ($list->html ==1) $htmlOK = true;

							$checked = $GLOBALS['aca_cb_checkLists'];
							if ($list->hidden == 1) {
								 $subscriber->blacklist = 0;
								if ($checked != 0) $checkedPrint = ' checked="checked" '; else $checkedPrint = '';
								$html .= '<tr>';
								if ($GLOBALS['aca_cb_checkLists'] == 1) {
									$text = "\n".'<td class="titleCell" style="text-align: right;"><input type="checkbox" class="inputbox" value="1" name="subscribed['.$i.']" checked="checked" /></td>';
								} else {
									$text = "\n".'<td class="titleCell" style="text-align: right;"><input type="checkbox" class="inputbox" value="1" name="subscribed['.$i.']" '.$checkedPrint.' /></td>';
								}//endif
								$text .= "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
								$text .= "\n".'<td class="fieldCell"><span class="aca_list_name" onclick=\'return false;\'>'. compa::toolTip($list->list_desc ,$list->list_name, '', '', $list->list_name , '#', 1).'</span></td>';
								$html .= $text;
								$html .= '</tr>';
							} else {
								$html .=  '<input type="hidden"  value=1 name="subscribed['.$i.']" />';
								$html .=   "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
							}//endif
						 	$html .=  "\n".'<input type="hidden" name="acc_level['.$i.']" value="'.$accessLevel.'" />';
						 }//endforeach
					} else {
						 foreach ($lists as $list) {
							$i++;
						 	$html .=  '<input type="hidden"  value="1" name="subscribed['.$i.']" />';
						 	$html .=  "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
						 	$html .=  "\n".'<input type="hidden" name="acc_level['.$i.']" value="'.$accessLevel.'" />';
						 	if ($list->html ==1) $htmlOK = true;
						 }//endforeach
					}//endif

					 $checked = $GLOBALS['aca_cb_defaultHTML'];

					 if ($htmlOK) {
						 if ($GLOBALS['aca_cb_showHTML']) {
							$html .= '<tr>';
							if ($checked != 0) $checkedPrint = ' checked="checked" '; else $checkedPrint = '';
							$text = '<td class="titleCell" style="text-align: right;"><input type="checkbox" class="inputbox" value="1" name="receive_html" '.$checkedPrint.' /></td>';
							$text .= '<td class="fieldCell">'._ACA_RECEIVE_HTML.'</td>';
							$html .=  jnewsletter::printLine(false, $text);
							$html .= '</tr>';
						 } else {
							 $html .= '<input type="hidden" value="'.$checked.'" name="receive_html" />' . "\n";
						 }//endif
					 } else {
						$html .= '<input type="hidden" value="'.$checked.'" name="receive_html" />' . "\n";
					 }
				} else {
					$html = '<input type="hidden" value="'.$GLOBALS['aca_cb_defaultHTML'].'" name="receive_html" />' . "\n";
				}//endif
			}else{
				$html = '<input type="hidden" value="'.$GLOBALS['aca_cb_defaultHTML'].'" name="receive_html" />' . "\n";
			}//endif

			return $html;
		}//endfct


		function saveRegistrationTab($tab, &$user, $ui, $postdata) {
			global $ueConfig;

			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
			$erro = new xerr( __FILE__ , __FUNCTION__ );
			if ($user->user_id >0 ) {
				$erro->ck = subscribers::updateOneSubscriber($user->user_id, $user );
				 if (!$erro->Eck(__LINE__ ,  '7002')	) {
					$this->_setErrorMSG(_ACA_ERROR);
					return;
				 }//endif
			}//endif
			return;
		}//endfct

		function userActivated($user, $success) {

			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');

			$erro = new xerr( __FILE__ , __FUNCTION__ );
			$erro->ck = subscribers::updateSubscribers( true );
			$erro->Eck(__LINE__ ,  '7007');
			$user->receive_html = -1;
			 if(!subscribers::updateOneSubscriber($user->user_id, $user, true )) {
			 	$this->_setErrorMSG(_ACA_ERROR);
			 }//endif

			return;
		}//endfct

		function userDeleted($user, $success) {

			require_once(ACA_JPATH_ROOT_NO_ADMIN . '/administrator/components/com_jnewsletter/classes/class.jnewsletter.php');
			$erro = new xerr( __FILE__ , __FUNCTION__ );
			if(!empty($user->user_id)){
				$subscriberId = subscribers::getSubscriberIdFromUserId($user->user_id);
				if(!empty($subscriberId)) subscribers::deleteOneSubscriber($subscriberId);
			}//endif
			$erro->ck = subscribers::updateSubscribers();
			$erro->Eck(__LINE__ ,  '7009');
			return true;
		}//endfct

		function checkInstalled() {
			if(!file_exists(_JNEWSLETTERCLASS)) {
				return false;
			}
			return true;
		}//endfct


	}//endclass

