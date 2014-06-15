<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class jnewsletter_mail {

	function embedImages(&$mail){

		$normalAttachment = array();
		$a = 0;
		for($i = 0; $i < count($mail->attachment); $i++) {
      		if($mail->attachment[$i][6] != 'inline') {
      			$normalAttachment[$a] = $mail->attachment[$i];
      			$a++;
      		}
    	}
    	$mail->attachment = $normalAttachment;
		$mimetypes = array('bmp'   =>  'image/bmp',
				      'gif'   =>  'image/gif',
				      'jpeg'  =>  'image/jpeg',
				      'jpg'   =>  'image/jpeg',
				      'jpe'   =>  'image/jpeg',
				      'png'   =>  'image/png',
				      'tiff'  =>  'image/tiff',
				      'tif'   =>  'image/tiff');
	    preg_match_all("/(src|background)=\"(.*)\"/Ui", $mail->Body, $images);
	   	$result = true;
	    if(isset($images[2])) {
			$imagespath = array();
			foreach($images[2] as $i => $url) {
		      	$path = str_replace(ACA_JPATH_LIVE,ACA_JPATH_ROOT_NO_ADMIN,$url);
		      	if(isset($imagespath[$path])) continue;
		      	$imagespath[$path] = 1;
		        $filename  = basename($url);
		        $md5 = md5($filename);
		        $cid       = 'cid:' . $md5;
		        $fileParts = split("\.", $filename);
		        $ext       = $fileParts[1];
		        //We don't embed php files... it can be the stat picture for example
		        if(!isset($mimetypes[$ext])) continue;

		        $mimeType  = $mimetypes[$ext];

		        //We only change the url if we were able to embed the image.
		        //Otherwise we return false and display a warning
		        if($mail->AddEmbeddedImage($path, $md5, $filename, 'base64', $mimeType)){
		       		$mail->Body = preg_replace("/".$images[1][$i]."=\"".preg_quote($url, '/')."\"/Ui", $images[1][$i]."=\"".$cid."\"", $mail->Body);
		        }else{
		        	$result = false;
		        }
	      }
	    }
	    return $result;
	}

	 function replaceTags($content, $subscriber, $list, $mailingId, $html, $tags=null) {

		$Itemid = $GLOBALS[ACA.'itemidAca'];
		$listId = $list->id; //can be empty
		$subscriptionslink = '.php?option=com_jnewsletter&Itemid='.$Itemid.'&act=change&subscriber=' . $subscriber->id . '&cle=' . md5($subscriber->email). '&listid=' . $listId;
		$unsubscribelink = '.php?option=com_jnewsletter&Itemid='.$Itemid.'&act=unsubscribe&subscriber=' . $subscriber->id . '&cle=' . md5($subscriber->email) . '&listid=' . $listId;
		$subscriptiontext='';
		compa::completeLink($subscriptionslink,false,$GLOBALS[ACA.'use_sef']);
		compa::completeLink($unsubscribelink,false,$GLOBALS[ACA.'use_sef']);

		if($html) {
			$subscriptionslink = '<a href="' . $subscriptionslink . '" target="_blank"><span class="aca_subscribe">' . _ACA_CHANGE_EMAIL_SUBSCRIPTION . '</span></a>';
			$unsubscribelink = '<a href="' . $unsubscribelink . '" target="_blank"><span class="aca_unsubscribe">' . _ACA_UNSUBSCRIBE . '</span></a>';
			$subscriptionstext = '<p>'. $subscriptionslink . '<br />' . $unsubscribelink . '</p>';
		} else {
			$subscriptionslink = _ACA_CHANGE_EMAIL_SUBSCRIPTION . ' ( ' . $subscriptionslink . ' )';
			$unsubscribelink = _ACA_UNSUBSCRIBE . ' ( ' . $unsubscribelink . ' )';
			$subscriptionstext = "\r\n" . $subscriptionslink . "\r\n" . $unsubscribelink;
		}
		$subscriptionstext = '';
		if ($GLOBALS[ACA.'show_signature']) {
			if($html) {
				$signatureText ='<a href="http://www.ijoobi.com" target="_blank">';
				$signatureText .='<br /><center><div style="width: 99%; color:#FFF; background-color:#000; font-size: 0.8em; text-align: center; ">Powered by Joobi</div></center>';
				$signatureText .='</a>';
			} else {
				$signatureText ='Powered by Joobi ( http://www.ijoobi.com )';
			}
			$subscriptionstext .= "\r\n\r\n" . $signatureText;
		}

		$confirmlink = '.php?option=com_jnewsletter&act=confirm&listid=' . $listId . '&cle=' . md5($subscriber->email) . '&subscriber=' . $subscriber->id.'&Itemid='.$Itemid;
		compa::completeLink($confirmlink,false,$GLOBALS[ACA.'use_sef']);

        if ($html) $confirmlink = '<a href="' . $confirmlink . '" target="_blank">' . _ACA_CONFIRM_LINK . '</a>';
  	    else $confirmlink = _ACA_CONFIRM_LINK . "\n" . $confirmlink;

		$tname = explode(" ", $subscriber->name);
		$firstname = $tname[0];
		$username = empty($subscriber->username) ? $firstname : $subscriber->username;

		$archiveLink = '.php?option=com_jnewsletter&act=mailing&task=view&mailingid='.$mailingId.'&Itemid='.$Itemid;
		compa::completeLink($archiveLink,false,$GLOBALS[ACA.'use_sef']);
		$archiveAll = '<a href="'.$archiveLink.'">'._ACA_VIEWARCHIVE.'</a>';
		$replaceWhat = array('[CONFIRM]','[NAME]','[FIRSTNAME]','[EMAIL]','[DATE]','[USERNAME]','[LINK]','[ARCHIVE]', '[SUBSCRIPTIONS]', '[UNSUBSCRIBE]');

		if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
			$replaceWhat[] = '[COLUMN1]';
			$replaceWhat[] = '[COLUMN2]';
			$replaceWhat[] = '[COLUMN3]';
			$replaceWhat[] = '[COLUMN4]';
			$replaceWhat[] = '[COLUMN5]';
		}//endif check if the version of jnewsletter is pro

		if ( ACA_CMSTYPE ) {
				$replaceBy = array($confirmlink,$subscriber->name,$firstname,$subscriber->email,JHTML::_('date',jnewsletter::getNow(), JText::_('DATE_FORMAT_LC1'), 0),$username,$archiveLink,$archiveAll,$subscriptionslink,$unsubscribelink);
		} else {
				$replaceBy = array($confirmlink,$subscriber->name,$firstname,$subscriber->email,mosFormatDate(jnewsletter::getNow(), '', 0),$username,$archiveLink,$archiveAll,$subscriptionslink,$unsubscribelink);
		}

		if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
			$replaceBy[] = $subscriber->column1;
			$replaceBy[] = $subscriber->column2;
			$replaceBy[] = $subscriber->column3;
			$replaceBy[] = $subscriber->column4;
			$replaceBy[] = $subscriber->column5;
		}//endif for check version

		$content = str_replace($replaceWhat,$replaceBy, $content );

		if ( class_exists('auto') ) {
			auto::tags( $content, $tags );
		}

		$content = stristr($signatureText, 'Powered by Joobi') !== FALSE ? $content : $content.$subscriptionstext;

		if (class_exists('aca_tags') AND $tags) aca_tags::replace($content, $tags);

		if ( !empty($mailingId) AND $GLOBALS[ACA.'enable_statistics'] == 1 ) {
			if ($GLOBALS[ACA.'statistics_per_subscriber'] == 1) {

  				if($html) $content .= '<img src="' . ACA_JPATH_LIVE_NO_HTTPS . '/index.php?option=com_jnewsletter&Itemid='.$Itemid.'&act=log&listid=' . $listId . '&mailingid=' . $mailingId . '&subscriber=' . $subscriber->id . '" border="0" width="1" height="1" />';
			} else {

  				if ($html)	$content .=  '<img src="' . ACA_JPATH_LIVE_NO_HTTPS . '/index.php?option=com_jnewsletter&Itemid='.$Itemid.'&act=log&listid=' . $listId . '&mailingid=' . $mailingId . '" border="0" width="1" height="1" />';
			}
		}
		// replace for images
		//  put the good mailto tag back (replaced before the content mambot)
		$replaceTag = array('href="mailto:','@','href="#');
		$replaceBy = array('9aca7aca5','9aca4aca1','9aca12aca3');

		$content = str_replace($replaceTag,$replaceBy,$content);
		$content = preg_replace('#src[ ]*=[ ]*\"(?!https?://)(?:\.\./|\./|/)?#','src="'.ACA_JPATH_LIVE_NO_HTTPS.'/',$content);
		$content = preg_replace('#href[ ]*=[ ]*\"(?!https?://)(?:\.\./|\./|/)?#','href="'.ACA_JPATH_LIVE_NO_HTTPS.'/',$content);
		$content = str_replace($replaceBy,$replaceTag,$content);
		$content = preg_replace('#\.(jpg|gif|jpeg|png)(?:(?!").)?"#', '.\\1"', $content);

		if (!$html) $content = str_replace('&amp;', '&', $content);

		return $content;
	 }

	 function htmlToText($textonly) {
		$textonly = str_replace(array('<p>', '<P>'), "", $textonly);
		$textonly =preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $textonly);
		$returns = array('<img />','<table>','</table>','<tbody>','</tbody>','<tr>','</tr>','<td>','</td>','<div>','</div>','<br>', '<br/>', '<br />', '<br >','<BR >', '<BR>', '<BR/>', '<BR />', '</p>', '</P>', '<p />', '<p/>', '<P />', '<P/>','<h1>','</h1>','<H1>','</H1>','<h2>', '</h2>','<H2>', '</H2>','<h3>','</h3>','<H3>', '</H3>','<h4>', '</h4>','<H4>', '</H4>','<h5>', '</h5>','<H5>', '</H5>', '<h6>', '</h6>','<H6>', '</H6>');
		$textonly = str_replace($returns, " ", $textonly);
		$textonly = preg_replace('/<a href="([^"]*)"[^>]*>([^<]*)<\/a>/i','${2} ( ${1} )', $textonly);
	  	$textonly = preg_replace('/<head>.*<\/head>/i', '', $textonly);
		$textonly = preg_replace('~&#x([0-9a-f]+);~ei', chr(hexdec("\\1")), $textonly);
		$textonly = preg_replace('~&#([0-9]+);~e', chr("\\1"), $textonly);
		$trans_tbl = get_html_translation_table(HTML_ENTITIES);
		$trans_tbl = array_flip($trans_tbl);
		$textonly = strtr($textonly, $trans_tbl);
		$textonly = strip_tags($textonly);
		$textonly= trim($textonly);
		return $textonly;
	 }

	 function getMailer($mailing, $html=0) {

	 	$fromname = $mailing->fromname;
	 	$fromemail = trim($mailing->fromemail);
	 	$frombounce = empty($mailing->frombounce) ? trim($GLOBALS[ACA.'confirm_return']) : trim($mailing->frombounce);
	 	$attachments = $mailing->attachments;
		$images = $mailing->images;

		if ( ACA_CMSTYPE ) {	// joomla 15
			$conf	=& JFactory::getConfig();
		 	$frombounceName = $fromname ? $fromname : $conf->getValue('config.fromname');
			if(empty($fromemail)) $fromemail = trim($conf->getValue('config.mailfrom'));
			if(empty($fromname)) $fromname = trim($conf->getValue('config.fromname'));
		} //endif

		if (ACA_CMSTYPE) {
			jimport('joomla.mail.mail');
			$phpmailerPath = JPATH_LIBRARIES.DS.'phpmailer'.DS;
			$mail = new JMail();
		} //endif

		$mail->PluginDir =  $phpmailerPath ;
		$mail->SetLanguage('en', $phpmailerPath.'language'.DS);
		$mail->WordWrap = 150;
      	$mail->addCustomHeader("X-Mailer: ".ACA_JPATH_LIVE);
      	$mail->addCustomHeader("X-MessageID: $mailing->id");

		if ( $GLOBALS[ACA.'mail_format'] =='1' ) $mail->Encoding = 'base64';

		if($GLOBALS[ACA.'minisendmail']) $frombounceName = '';

		if(ACA_CMSTYPE){
			$mail->addReplyTo(array($frombounce, $frombounceName));
		}//endif

		$mail->From 	= trim($fromemail);
		if($GLOBALS[ACA.'minisendmail']){
			$mail->FromName = '';
		}else{
			$mail->FromName = $fromname;
		}

		$mail->Sender 	= trim($GLOBALS[ACA.'sendmail_from']);
		if(empty($mail->Sender)) $mail->Sender = '';

		switch ($GLOBALS[ACA.'emailmethod']){
			case 'mail' :
				$mail->IsMail();
				break;
			case 'sendmail':
				$mail->IsSendmail();
				if ( ACA_CMSTYPE ) {	// joomla 15
					$conf	=& JFactory::getConfig();
					$mail->Sendmail = $GLOBALS[ACA.'sendmail_path'] ? $GLOBALS[ACA.'sendmail_path'] : $conf->getValue('config.sendmail');
				} //endif
				break;
			case 'smtp':
				$mail->IsSMTP();
				if ( ACA_CMSTYPE ) {	// joomla 15
					$conf	=& JFactory::getConfig();
					$mail->Host = $GLOBALS[ACA.'smtp_host'] ? $GLOBALS[ACA.'smtp_host'] : $conf->getValue('config.smtphost');
				} //endif

				if((boolean)$GLOBALS[ACA.'smtp_auth_required']) {
					$mail->SMTPAuth = $GLOBALS[ACA.'smtp_auth_required'];
					$mail->Password = $GLOBALS[ACA.'smtp_password'];
					$mail->Username = $GLOBALS[ACA.'smtp_username'];
				}
				break;
			default:
				if ( ACA_CMSTYPE ) {	// joomla 15
					$conf	=& JFactory::getConfig();
					$mail->Mailer 	= $conf->getValue('config.mailer');
				} //endif
				break;
		}

		if (!empty($attachments)) {
			foreach ($attachments AS $attachment) {
				if(basename($attachment) !== 'index.html'){
					$mail->AddAttachment(ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'upload_url'].DS.basename($attachment));
				}
			}
		}

		switch( substr( strtoupper( PHP_OS ), 0, 3 ) ) {
			case "WIN":
				$mail->LE = "\r\n";
				break;
			case "MAC":
			case "DAR":
				$mail->LE = "\r";
			default:
				break;
		}
		return $mail;
	 }

	function getContent($images, $layout, &$content, &$textonly, $send = false) {

		$replaceTag = array('href="mailto:','@','href="#');
		$replaceBy = array('9aca7aca5','9aca4aca1','9aca12aca3');
		$content = str_replace($replaceTag,$replaceBy,$content);
		$content = str_replace('{mospagebreak}', '<br style="clear: both;" /><br />', $content);

		if (strlen(trim($textonly)) < 2 && $send) {
			$textonly = jnewsletter_mail::htmlToText($content);
			$textonly = str_replace('{mosimage}', '', $textonly);
		}

		if (!empty($images)) {
			foreach ($images as $image) {
				 $image_string = '<img src="' . ACA_JPATH_LIVE . '/images/stories/' . $image. '" />';
				 $content = preg_replace('/{mosimage}/', $image_string, $content, 1);
			 }
		}

		if (ACA_CMSTYPE) {
			global $mainframe;
			JPluginHelper::importPlugin( 'jnewsletter' );
			$bot_results = $mainframe->triggerEvent('jnewsletterbot_transformall', array(&$content, &$textonly));
		} //endif

		$content = str_replace($replaceTag,$replaceBy,$content);
		$content = preg_replace('#src[ ]*=[ ]*\"(?!https?://)(?:\.\./|\./|/)?#','src="'.ACA_JPATH_LIVE_NO_HTTPS.'/',$content);
		$content = preg_replace('#href[ ]*=[ ]*\"(?!https?://)(?:\.\./|\./|/)?#','href="'.ACA_JPATH_LIVE_NO_HTTPS.'/',$content);
		$content = str_replace($replaceBy,$replaceTag,$content);

		return true;
	 }

	 //Checking by eve
	 function send( $showHTML, $mailing, $receivers, $list, &$message, $tags=null ) {

		$h = '';
		$xf = new xonfig();
		if (empty($mailing)) {
			$message = _ACA_NO_MAILING_ENTERED;
			return false;
		} elseif (  empty($receivers) ) {
			$message = _ACA_NO_ADDRESS_ENTERED;
			return false;
		}  elseif ( empty($list) ) {
			$message = _ACA_NO_LIST_ENTERED;
			return false;
		} else {
			$message = '';
		}

		$mailingId = $mailing->id;
    	$issue_nb = $mailing->issue_nb;
	 	$subject = $mailing->subject;
	 	$content = $mailing->htmlcontent;
	 	$textonly = $mailing->textonly;
	 	$fromname = $mailing->fromname;
	 	$fromemail = $mailing->fromemail;
		$images = $mailing->images;
	 	$listId = $list->id;
	 	$html = $list->html;
	  	$layout = $list->layout;
		$totalsofar = number_format(0, 4, ',', '');
		$nbPause = 0;
		$tags['issuenb'] = $issue_nb;
		$template_id = $mailing->template_id;
		if (!ini_get('safe_mode')) {
			@set_time_limit(60 * $GLOBALS[ACA.'script_timeout']);
			@ini_set('memory_limit','128M');
		}

		ignore_user_abort(true);

		### create the mail
		$mail = jnewsletter_mail::getMailer($mailing);
		### create content
		jnewsletter_mail::getContent($images, $layout, $content, $textonly, true);

		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$starttime = $mtime;
		$html_sent = 0;
		$text_sent = 0;
		$size = sizeof($receivers);
		$i = 0;

		?>
		<form action="index2.php" method="post" name="adminForm">
			<input type="hidden" name="option" value="com_jnewsletter" />
			<input type="hidden" name="act" value="mailing" />
			<input type="hidden" name="listype" value="<?php echo $mailing->mailing_type; 	?>" />
			<input type="hidden" name="task" value="" />
		</form>
		<?php

		if ( $showHTML ) {
			echo '<form action="#" name="counterForm">';
			echo _ACA_SENDING_EMAIL;
			echo ': &nbsp;<input type="text" size="6" name="teller" value="0" style="border: 0px solid white; font-family: Arial, Helvetica, sans-serif; font-size: 1.1em;" size="1" /> of ' . $size . '</form>';
		}

		$garde = 0;
		//If two errors occur, we stop to try
		while (ob_get_level() > 0 AND $garde < 2) {
		   if(!ob_end_flush()){
		   		$garde++;
		   }
		}

		if ( ACA_CMSTYPE ) {	// joomla 15
			$skip_subscribers = @$_SESSION['skip_subscribers'.$mailing->id];
		} //endif

		$format = defined('_DATE_FORMAT_LC') ? _DATE_FORMAT_LC : JText::_('DATE_FORMAT_LC');
		$log_detailed = "\r\n" ."\r\n" .'*** '.strftime($format).' ***'."\r\n";

		if(empty($skip_subscribers)){
			if ( ACA_CMSTYPE ) {	// joomla 15
				$skip_subscribers = JRequest::getVar('skip_subscribers', '0' );
			} //endif
		}

		$nbsubscribers = count($receivers);
	    //variables used in integration of jLinks
	    $mailCatID = null;
    	$convertedLinks = null;

		foreach ($receivers as $receiver) {
			$i++;

			if ($i <= $skip_subscribers) {
				continue;
			}

			$tags['user_id'] = $receiver->user_id;

			if ($html && (intval($receiver->receive_html) == 1)) {
				$mail->IsHTML(true);
				$ashtml = 1;
				$Altbody = jnewsletter_mail::replaceTags($textonly, $receiver, $list, $mailingId, 0, $tags);

				$mail->AltBody = jnewsletter_mail::safe_utf8_encode( $Altbody, $mail->CharSet );
				$html_sent++;
				$mail->Body = jnewsletter_mail::replaceTags($content, $receiver, $list, $mailingId, $ashtml, $tags);

        		//this line is added when jLinks is integrated with jNews
				jnewsletter_mail::linkReplacement( $mailing->mailing_type, $list, $mailingId, $mailing->subject, $mail,
                $mailCatID, $convertedLinks, $receiver->id );
				//jnewsletter_mail::replaceClass($mail->Body,$mail->AltBody,$receiver);
				$styles = templates::getTemplateStyles($template_id);
				$mail->Body = templates::insertStyles($mail->Body,$mail->AltBody, $styles);
			} else {
				$mail->IsHTML(false);
				$mail->AltBody = '';
				$ashtml = 0;
				$text_sent++;
				$mail->Body = jnewsletter_mail::replaceTags($textonly, $receiver, $list, $mailingId, $ashtml, $tags);
				$simpleText = '';
				//jnewsletter_mail::replaceClass($mail->Body,$simpleText,$receiver);

				if( !empty($images) ) {
					foreach( $images as $image) {
						$img = explode('|', $image);
						$attrib = explode("/", $img[0]);
						$path = ACA_JPATH_ROOT. '/images/stories/';
						if (count($img)==1) {
							$imageName = $img[0];
						} else {
							$imageName = $attrib[count($attrib)-1];
							for ($index = 0; $index < (sizeof($attrib)-1); $index++) {
								$path .= $attrib[$index].'/';
							}
						}
						$mail->AddAttachment( $path.$imageName);
					}
				}
			}

			$tname = explode(" ", $receiver->name);
			$firstname = $tname[0];
			$toUser = $GLOBALS[ACA.'minisendmail'] ? '' : $receiver->name;
			$mail->AddAddress($receiver->email,$toUser);
			$username = empty($receiver->username) ? $firstname : $receiver->username;
			$date = ACA_CMSTYPE ? JHTML::_('date',jnewsletter::getNow(), JText::_('DATE_FORMAT_LC1'), 0) : mosFormatDate(jnewsletter::getNow(), '', 0);
			$replaceWhat = array('[NAME]','[FIRSTNAME]','[USERNAME]','[DATE]');
			$replaceBy = array($receiver->name,$firstname,$username,$date);
			$sujetReplaced = str_replace($replaceWhat, $replaceBy, $subject);

			if ( class_exists('auto') ) auto::tags( $sujetReplaced, $tags );
			$mail->Subject =  $sujetReplaced;

			if($GLOBALS[ACA.'embed_images']){
				jnewsletter_mail::embedImages($mail);
			}

			$mailssend = $mail->Send();

			if ($showHTML) echo '<br /><strong>'.$i . ': ';

			if (!$mailssend || $mail->error_count > 0) {
				$h .= $receiver->email . '</strong> -> ' . xmailing::M('red' , _ACA_MESSAGE_NOT.'! ' . _ACA_MAILER_ERROR . ': ' . $mail->ErrorInfo);
				$log_detailed .= '['.$mailingId.'] '.$subject.' : '.$receiver->email . ' -> ' . _ACA_MESSAGE_NOT . "\r\n" . _ACA_MAILER_ERROR . ': ' . $mail->ErrorInfo . "\r\n";
				if($html && (intval($receiver->receive_html) == 1)) {
					$html_sent--;
				} else{
					$text_sent--;
				}
			} else {
				$h .= $receiver->email . '</strong> -> ' . xmailing::M('green' , _ACA_MESSAGE_SENT_SUCCESSFULLY);
				$log_detailed .= '['.$mailingId.'] '.$subject.' : '.$receiver->email . ' -> ' . _ACA_MESSAGE_SENT_SUCCESSFULLY . "\r\n";

				if ($GLOBALS[ACA.'enable_statistics'] == 1 AND $GLOBALS[ACA.'statistics_per_subscriber'] == 1) {
							xmailing::insertStats( $mailingId, $receiver->id, $ashtml);
				}
			}

			$mail->ClearAddresses();

			if ($showHTML) echo '<script type="text/javascript" language="javascript">document.counterForm.teller.value=\'' . $i . '\';</script>';

			flush();

			if ((($i % $GLOBALS[ACA.'emails_between_pauses']) == 0) AND $i<$nbsubscribers) {

				if ($showHTML) echo $h;
				$h ='';
				flush();
				$mtime = microtime();
				$mtime = explode(" ",$mtime);
				$mtime = $mtime[1] + $mtime[0];
				$endtime = $mtime;
				if ($totalsofar>0) {
					$totaltime = $totalsofar;
					$totalstr = strval ($totaltime);
				} else {
					$totaltime = number_format($endtime - $starttime - $nbPause * $GLOBALS[ACA.'pause_time'], 4, ',', '');
					$totalstr = strval ($totaltime);
				}

				if($GLOBALS[ACA.'display_trace'] == 1 AND $showHTML ) {
					echo '<br/>Time to send: ' .$totalstr . ' ' ._ACA_SECONDS;
					echo '<br/>Number of subscribers: ' . ($text_sent + $html_sent) . "<br />" .
								  'HTML format: ' . $html_sent . "<br />" .
								  'Text format: ' . $text_sent . "<br />";
				} else {
					echo _ACA_QUEUE_PROCESSED;
				}

				if ($GLOBALS[ACA.'wait_for_user'] == 0) {

					$mtime = microtime();
					$mtime = explode(" ",$mtime);
					$mtime = $mtime[1] + $mtime[0];
					$endtime = $mtime;
					$totaltime = number_format($endtime - $starttime - $nbPause * $GLOBALS[ACA.'pause_time'], 4, ',', '');
					$totalstr = strval ($totaltime);

					if(!class_exists('auto')){
						$h .=  '<b>--- Total time so far: ' . $totalstr. ' seconds ---</b><br />';
					}

					$log_detailed .= "\r\n" . '--- Waiting ' . $GLOBALS[ACA.'pause_time']. ' seconds ---' . "\r\n\r\n";
					$log_detailed .= "\r\n" . '<b>--- Total time so far: ' . $totalstr. ' seconds ---</b><br />' . "\r\n\r\n";
					$nbPause++;
					echo $h;
					flush();

//ADRIEN REFRESH PAGE
					if (class_exists('auto')){
						$_SESSION['skip_subscribers'.$mailing->id] = $i;
						//Ecriture des statistiques
						if($GLOBALS[ACA.'enable_statistics'] == 1 and ($html_sent>0 OR $text_sent>0)){
							xmailing::updateStatsGlobal( $mailingId, $html_sent, $text_sent, false);
						}

						$xf->plus('totalmailingsent'.$list->list_type, $html_sent+$text_sent);
						$xf->plus('totalmailingsent0', $html_sent+$text_sent);

						$log_simple = 'Time to send: ' . $totalstr . ' ' ._ACA_SECONDS . "\r\n" .
									  'Number of subscribers: ' . ($text_sent + $html_sent) . "\r\n" .
									  'HTML format: ' . $html_sent . "\r\n" .
									  'Text format: ' . $text_sent . "\r\n";
						$log_detailed = $log_simple . 'Details: ' . "\r\n" . $log_detailed . "\r\n";

						if (class_exists('lisType')) jnewsletter_mail::writeLogs($list, $log_simple, $log_detailed);
					}
					echo '<br/><b>--- Waiting '.$GLOBALS[ACA.'pause_time'].' seconds : </b>';
					for($a=0;$a<$GLOBALS[ACA.'pause_time']-1;$a++){
						sleep(1);
						echo $GLOBALS[ACA.'pause_time'] - $a - 1 .' ';
						flush();
					}

					if (class_exists('auto')){

						$link = 'index2.php?option=com_jnewsletter&act=mailing&task=sendNewsletter&listid='.$listId.'&listype='.$mailing->mailing_type.'&mailingid='.$mailing->id.'&skip_subscribers='.$i;
						compa::redirect($link);
						exit(0);
					}

				} else{

					$log_detailed .= "\r\n" . '--- Waiting for user input to continue sending ---' . "\r\n\r\n";
					$mtime = microtime();
					$mtime = explode(" ",$mtime);
					$mtime = $mtime[1] + $mtime[0];
					$endtime = $mtime;
					$totaltime = number_format($endtime - $starttime, 4, ',', '');
					if ( ACA_CMSTYPE ) {	// joomla 15
						$timeStr = JRequest::getVar('time', '');
					} //endif
					$time = floatval($timeStr);
					$totalsofar = $endtime - $starttime + $time;
					$totalstr = strval ($totalsofar);
			?>

			<form action="index2.php" name="counterForm" method="post">
				<input type="hidden" name="option" value="com_jnewsletter" />
				<input type="hidden" name="act" value="mailing" />
				<input type="hidden" name="task" value="sendNewsletter" />
				<input type="hidden" name="listid" value="<?php echo $listId; ?>" />
				<input type="hidden" name="listype" value="<?php echo $mailing->mailing_type; 	?>" />
				<input type="hidden" name="skip_subscribers" value="<?php echo $i; ?>" />
				<input type="hidden" name="mailingid" value="<?php echo $mailing->id; ?>" />
				<input type="hidden" name="time" value="<?php echo $totalstr; ?>" />
				<br />
				<input type="submit" name="submit" value="<?php echo _ACA_CONTINUE_SENDING; ?>" />
			</form>
			<?php
				}
			}else{
				if ($showHTML) echo $h;
				$h ='';
			}
		}

		if($GLOBALS[ACA.'enable_statistics'] == 1){
			xmailing::updateStatsGlobal( $mailingId, $html_sent, $text_sent, false);
		}
		unset($_SESSION['skip_subscribers'.$mailing->id]);
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$endtime = $mtime;
		if ($totalsofar>0) {
			$totaltime = $totalsofar;
			$totalstr = strval ($totaltime);
		} else {
			$totaltime = number_format($endtime - $starttime - $nbPause * $GLOBALS[ACA.'pause_time'], 4, ',', '');
			$totalstr = strval ($totaltime);
		}
		$xf->plus('totalmailingsent'.$list->list_type, $html_sent+$text_sent);
		$xf->plus('totalmailingsent0', $html_sent+$text_sent);
		$log_simple = 'Time to send: ' . $totalstr . ' ' ._ACA_SECONDS . "\r\n" .
					  'Number of subscribers: ' . ($text_sent + $html_sent) . "\r\n" .
					  'HTML format: ' . $html_sent . "\r\n" .
					  'Text format: ' . $text_sent . "\r\n";
		$log_detailed = $log_simple . 'Details: ' . "\r\n" . $log_detailed . "\r\n";

		if($GLOBALS[ACA.'display_trace'] == 1 AND $showHTML ) {
			echo '<br /><b>' . _ACA_SENDING_TOOK . ' ' . $totalstr . ' ' . _ACA_SECONDS . '</b><br />';
			echo 'Number of subscribers: ' . ($text_sent + $html_sent) . "<br />" .
						  'HTML format: ' . $html_sent . "<br />" .
						  'Text format: ' . $text_sent . "<br />";
		} else {
			echo _ACA_QUEUE_PROCESSED;
		}

		if (class_exists('lisType')) jnewsletter_mail::writeLogs($list, $log_simple, $log_detailed);
		ob_start();
		if ($html_sent+$text_sent>0 ) {
			return true;
		} else {
			$message = xmailing::M('no' , _ACA_NO_MAILING_SENT);
			return false;
		}
	}

	function sendOne($mailing, $receivers, $list, &$message , $tags=null) {
		$mailingId = $mailing->id;
    	$issue_nb = $mailing->issue_nb;
	 	$subject = $mailing->subject;
	 	$content = $mailing->htmlcontent;
	 	$textonly = $mailing->textonly;
	 	$fromname = $mailing->fromname;
	 	$fromemail = $mailing->fromemail;
	 	$images = $mailing->images;
	 	$listId = $list->id;
	 	$html = $list->html;
	  	$layout = $list->layout;
	  	$tags['issuenb'] = $issue_nb;
	  	if(!empty($mailing->template_id)){
			$template_id = $mailing->template_id;
	  	}
		### create the mail
		$mail = jnewsletter_mail::getMailer($mailing);

		### create content
		jnewsletter_mail::getContent($images, $layout, $content, $textonly, true);

		if ( isset($receivers->user_id) ) $tags['user_id'] = $receivers->user_id;

	    //variables used in integration of jLinks
    	$mailCatID = null;
    	$convertedLinks = null;

		if(!empty($receivers)){

			if($html && (intval($receivers->receive_html) == 1)) {
				$mail->IsHTML(true);
				$ashtml = 1;
				$Altbody = jnewsletter_mail::replaceTags($textonly, $receivers, $list, $mailingId, 0, $tags);
				$mail->AltBody = jnewsletter_mail::safe_utf8_encode( $Altbody, $mail->CharSet );
				$mail->Body = jnewsletter_mail::replaceTags($content, $receivers, $list, $mailingId, $ashtml, $tags);

				//this line is added when jLinks is integrated with jnewsletter
				//jnewsletter_mail::linkReplacement( $mailing->mailing_type, $list, $mailingId, $mailing->subject, $mail,
				//$mailCatID, $convertedLinks, $receivers->id );
 				//with updates from Glenn
				//this line is added when jLinks is integrated with jnewsletter

				 if( isset($mailing->mailing_type) && !empty($mailing->mailing_type) ) {
					jnewsletter_mail::linkReplacement( $mailing->mailing_type, $list, $mailingId, $mailing->subject, $mail,
	                   $mailCatID, $convertedLinks, $receivers->id );
				 }

				//jnewsletter_mail::replaceClass($mail->Body,$mail->AltBody,$receivers);
				if(!empty($template_id)){ //checking for template id
					$styles = templates::getTemplateStyles($template_id);
				}
				if(!empty($styles)){ //checking for styles
					$mail->Body = templates::insertStyles($mail->Body, $mail->AltBody, $styles);
				}
			} else{
				$mail->IsHTML(false);
				$mail->AltBody = '';
				$ashtml = 0;
				$mail->Body = jnewsletter_mail::replaceTags($textonly, $receivers, $list, $mailingId, $ashtml, $tags);
				$simpleText = '';
				//jnewsletter_mail::replaceClass($mail->Body,$simpleText,$receivers);

				if( !empty($images) ) {
					foreach( $images as $image) {
						$img = explode('|', $image);
						$attrib = explode("/", $img[0]);
						$path = ACA_JPATH_ROOT. '/images/stories/';
						if (count($img)==1) {
							$imageName = $img[0];
						} else {
							$imageName = $attrib[count($attrib)-1];
							for ($index = 0; $index < (sizeof($attrib)-1); $index++) {
								$path .= $attrib[$index].'/';
							}
						}
						$mail->AddAttachment( $path.$imageName);
					}
				}
			}

			$tname = explode(" ", $receivers->name);
			$firstname = $tname[0];
			$toUser = $GLOBALS[ACA.'minisendmail'] ? '' : $receivers->name;
			$mail->AddAddress($receivers->email, $toUser);
			$username = empty($receivers->username) ? $firstname : $receivers->username;
			$date = ACA_CMSTYPE ? JHTML::_('date',jnewsletter::getNow(), JText::_('DATE_FORMAT_LC1'), 0) : mosFormatDate(jnewsletter::getNow(), '', 0);
			$replaceWhat = array('[NAME]','[FIRSTNAME]','[USERNAME]','[DATE]');
			$replaceBy = array($receivers->name,$firstname,$username,$date);
			$sujetReplaced = str_replace($replaceWhat, $replaceBy, $subject);
			$mail->Subject =  $sujetReplaced;

			if(empty($mail->Body) OR empty($mail->Subject)){
				echo xmailing::M('red' , 'There is not Body or Subject in your e-mail');
				return false;
			}

			if($GLOBALS[ACA.'embed_images']){
				jnewsletter_mail::embedImages($mail);
			}
			$mailssend = $mail->Send();

			if (!$mailssend || $mail->error_count > 0) {
				static $info =false;
				if(!$info AND jnewsletter::checkPermissions('admin')){
					echo '<br/>Mailer Error : ' . $mail->ErrorInfo;
					echo " : Newsletter '$sujetReplaced' to $receivers->email";
					$info = true;
				}

				$message .= xmailing::M('red' , _ACA_MESSAGE_NOT.'! ' . _ACA_MAILER_ERROR . ': ' . $mail->ErrorInfo);
				return false;
			} else {
				$message .= _ACA_MESSAGE_SENT_SUCCESSFULLY;
				return true;
			}

		} else {
			echo xmailing::M('red' , _ACA_NO_ADDRESS_ENTERED);
			return false;
		}
	}


	 function sendSchedule( $d, $showHTML, $receivers, $list, &$message, &$max, $tags=null ) {

		static $countEmails = 0;
		$mailing = $d['mailing'];
		$h = '';
		$xf = new xonfig();
		if (empty($mailing)) {
			$message = _ACA_NO_MAILING_ENTERED;
			return false;
		} elseif (  empty($receivers) ) {
			$message = _ACA_NO_ADDRESS_ENTERED;
			return false;
		}  elseif ( empty($list) ) {
			$message = _ACA_NO_LIST_ENTERED;
			return false;
		} else {
			$message = '';
		}

		$mailingId = $mailing->id;
   	    $issue_nb = $mailing->issue_nb;
	 	$subject = $mailing->subject;
	 	$content = $mailing->htmlcontent;
	 	$textonly = $mailing->textonly;
	 	$fromname = $mailing->fromname;
	 	$fromemail = $mailing->fromemail;
		$images = $mailing->images;
	 	$listId = $list->id;
	 	$html = $list->html;
	  	$layout = $list->layout;
		$totalsofar = number_format(0, 4, ',', '');
		$nbPause = 0;
		$tags['issuenb'] = $issue_nb;
		$template_id = $mailing->template_id;
		//Just in case of...
		@ini_set('max_execution_time',0);
		@ini_set('memory_limit','128M');

		ignore_user_abort(true);

		### create the mail
		$mail = jnewsletter_mail::getMailer($mailing);
		### create content
		jnewsletter_mail::getContent($images, $layout, $content, $textonly, true);

		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$starttime = $mtime;
		$html_sent = 0;
		$text_sent = 0;
		$size = sizeof($receivers);
		$format = defined('_DATE_FORMAT_LC') ? _DATE_FORMAT_LC : JText::_('DATE_FORMAT_LC');
		$log_detailed = "\r\n" ."\r\n" .'*** '.strftime($format).' ***'."\r\n";

	    //variables used in integration of jLinks
    	$mailCatID = null;
    	$convertedLinks = null;

		foreach ($receivers as $receiver) {

			$tags['user_id'] = $receiver->user_id;
			if ($html && (intval($receiver->receive_html) == 1)) {
				$mail->IsHTML(true);
				$ashtml = 1;
				$Altbody = jnewsletter_mail::replaceTags($textonly, $receiver, $list, $mailingId, 0, $tags);
				$mail->AltBody = jnewsletter_mail::safe_utf8_encode( $Altbody, $mail->CharSet );
				$html_sent++;
				$mail->Body = jnewsletter_mail::replaceTags($content, $receiver, $list, $mailingId, $ashtml, $tags);

		        //this line is added when jLinks is integrated with jNews
				jnewsletter_mail::linkReplacement( $mailing->mailing_type, $list, $mailingId, $mailing->subject, $mail,
                $mailCatID, $convertedLinks, $receiver->id );
				//jnewsletter_mail::replaceClass($mail->Body,$mail->AltBody,$receiver);
				$styles = templates::getTemplateStyles($template_id);
				$mail->Body = templates::insertStyles($mail->Body,$mail->AltBody, $styles);


			} else {
				$mail->IsHTML(false);
				$mail->AltBody = '';
				$ashtml = 0;
				$text_sent++;
				$mail->Body = jnewsletter_mail::replaceTags($textonly, $receiver, $list, $mailingId, $ashtml, $tags);
				$simpleText = '';
				//jnewsletter_mail::replaceClass($mail->Body,$simpleText,$receiver);
			}
			$tname = explode(" ", $receiver->name);
			$firstname = $tname[0];
			$toUser = $GLOBALS[ACA.'minisendmail'] ? '' : $receiver->name;
			$mail->AddAddress($receiver->email, $toUser);

			//if(!empty($receiver->id)) $mail->addCustomHeader("X-SubscriberID: $receiver->id");

			$username = empty($receiver->username) ? $firstname : $receiver->username;
			$date = ACA_CMSTYPE ? JHTML::_('date',jnewsletter::getNow(), JText::_('DATE_FORMAT_LC1'), 0) : mosFormatDate(jnewsletter::getNow(), '', 0);
			$replaceWhat = array('[NAME]','[FIRSTNAME]','[USERNAME]','[DATE]');
			$replaceBy = array($receiver->name,$firstname,$username,$date);
			$sujetReplaced = str_replace($replaceWhat, $replaceBy, $subject);

			if ( class_exists('auto') ) auto::tags( $sujetReplaced, $tags );
			$mail->Subject =  $sujetReplaced;

			if($GLOBALS[ACA.'embed_images']){
				jnewsletter_mail::embedImages($mail);
			}
			$mailssend = $mail->Send();
			$countEmails++;

			if ( $countEmails >= $GLOBALS[ACA.'cron_max_emails'] ) $max = true;

			if (!$mailssend || $mail->error_count > 0) {
				static $info =false;
				if(!$info AND jnewsletter::checkPermissions('admin')){
					echo '<br/>Mailer Error : ' . $mail->ErrorInfo;
					echo " : Newsletter '$sujetReplaced' to $receiver->email";
					$info = true;
				}
				$log_detailed .= '['.$mailingId.'] '.$subject.' : '.$receiver->email . ' -> ' . _ACA_MESSAGE_NOT . "\r\n" . _ACA_MAILER_ERROR . ': ' . $mail->ErrorInfo . "\r\n";

				if($html && (intval($receiver->receive_html) == 1))	$html_sent--;  else 	$text_sent--;

				if(!subscribers::validEmail($receiver->email,true)){
					$deleteQueue = array();
					$deleteQueue[0] = queue::whatQID( $mailingId, $receiver->id, $d['listype'] );
					queue::deleteQueues($deleteQueue);
				}

			} else {

				$log_detailed .= '['.$mailingId.'] '.$subject.' : '.$receiver->email . ' -> ' . _ACA_MESSAGE_SENT_SUCCESSFULLY . "\r\n";
				if ($GLOBALS[ACA.'enable_statistics'] == 1 AND $GLOBALS[ACA.'statistics_per_subscriber'] == 1)
					xmailing::insertStats( $mailingId, $receiver->id, $ashtml);

				$d['qids'] = array();
				$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

				if ( $d['listype']=='2' ) {

					$d['qids'][0] = queue::whatQID( $mailingId, $receiver->id, $d['listype'] );
					$erro->ck = auto::updateAutoresponderSent($d);
				 	$erro->Eck(__LINE__ ,  '8137' , $d);
				} elseif ( $d['listype']=='1' || $d['listype']=='7' ) {

					$d['qids'][0] = queue::whatQID( $mailingId, $receiver->id, $d['listype'] );
					$erro->ck = queue::deleteQueues($d['qids']);
				 	$erro->Eck(__LINE__ ,  '8127' , $d);
				}
			}

			$mail->ClearAddresses();
		}

		if($GLOBALS[ACA.'enable_statistics'] == 1){
			xmailing::updateStatsGlobal( $mailingId, $html_sent, $text_sent, false);
		}

		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$endtime = $mtime;
		if ($totalsofar>0) {
			$totaltime = $totalsofar;
			$totalstr = strval ($totaltime);
		} else {
			$totaltime = number_format($endtime - $starttime - $nbPause * $GLOBALS[ACA.'pause_time'], 4, ',', '');
			$totalstr = strval ($totaltime);
		}

		$xf->plus('totalmailingsent'.$list->list_type, $html_sent+$text_sent);
		$xf->plus('totalmailingsent0', $html_sent+$text_sent);

		$log_simple = 'Time to send: ' . $totalstr . ' ' ._ACA_SECONDS . "\r\n" .
					  'Number of subscribers: ' . ($text_sent + $html_sent) . "\r\n" .
					  'HTML format: ' . $html_sent . "\r\n" .
					  'Text format: ' . $text_sent . "\r\n";
		$log_detailed = $log_simple . 'Details: ' . "\r\n" . $log_detailed . "\r\n";

		if (class_exists('lisType')) jnewsletter_mail::writeLogs($list, $log_simple, $log_detailed);

		if ( $d['listype']=='2' ) {
			echo '<br/>'._ACA_QUEUE_AUTO_PROCESSED;
		} elseif ( $d['listype']=='1' ) {
			echo '<br/>'._ACA_QUEUE_NEWS_PROCESSED;
		}

		if ($html_sent+$text_sent>0 ) {
			return true;
		} else {
			$message = xmailing::M('no' , _ACA_NO_MAILING_SENT);
			return false;
		}

	}

	 function sendConfirmationEmail($subscriberId) {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$queue->sub_list_id = JRequest::getVar('sub_list_id', '' );
		} //endif

		if (!empty($queue->sub_list_id)) {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$queue->subscribed = JRequest::getVar('subscribed', '' );
			} //endif
			$listSub = array();
			$i = 0;
			$size = sizeof($queue->sub_list_id);
			for ($index = 1; $index <= $size; $index++) {
				if (isset($queue->subscribed[$index])) {
					if ($queue->subscribed[$index]==1) {
						$listSub[$i] = $queue->sub_list_id[$index];
						$i++;
					}
				}
			}
		} else {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$listSub[0] = (int) JRequest::getVar('listid', '' );
			} //endif
		}

		return jnewsletter_mail::processConfirmationEmail($subscriberId, $listSub);
	 }

	 function processConfirmationEmail($subscriberId, $listSub) {

		$status =  true;
		$qid[0] = $subscriberId;
		$receiver = subscribers::getSubscribersFromId($qid, false);
		$listIds = implode(",", $listSub );


		$lists = lists::getSpecifiedLists($listIds, false);

		$message = '';
		foreach ($lists as $list) {
			$Sub_TAG = '';
			if (substr_count($list->subscribemessage, '[CONFIRM]')<1) {
				$Sub_TAG = '[CONFIRM]';
			}
			$mailing = null;
			if ( empty($list->subscribemessage)) $list->subscribemessage= '    ';
		 	$mailing->subject = _ACA_SUBSCRIBE_SUBJECT_MESS;
		 	$mailing->htmlcontent = $list->subscribemessage.$Sub_TAG;
		 	$mailing->textonly = '';

		 	if(!$GLOBALS[ACA.'minisendmail']) $mailing->fromname = $list->sendername;

		 	$mailing->fromemail = $list->senderemail;
		 	$mailing->frombounce = $list->bounceadres;
		 	$mailing->id = 0;
		 	$mailing->issue_nb = 0;
		 	$mailing->images = '';
		 	$mailing->attachments = '';

			if (!jnewsletter_mail::sendOne($mailing, $receiver, $list, $message)) $status = false;

			$erro = 'Could not send the confirmation email, for list #:'.$list->id.' , please contact the webmaster!';
			break;
		}

		return $status;
	 }

 	function sendUnsubcribeEmail($subscriberId, $list) {
		$mailing=null;
		$qid[0] = $subscriberId;
		$receiver = subscribers::getSubscribersFromId($qid, false);
		$mainframe =& JFactory::getApplication();
		$message = '';
		$adminName = $mainframe->getCfg('fromname');
		$adminEmail = $mainframe->getCfg('mailfrom');
		$email = '';
		$type = '';
		$title = '';
		$author = '';
		//$fromemail = $mailing->fromemail;
		$receiverAdmin = subscribers::sendAdminMail( $adminName, $adminEmail, $email, $type, $title, $author, $url = null );

	 	$mailing->subject = _ACA_UNSUBSCRIBE_SUBJECT_MESS;
	 	$mailing->htmlcontent = $list->unsubscribemessage;
	 	$mailing->textonly = $list->unsubscribemessage;
	 	if(!$GLOBALS[ACA.'minisendmail']) $mailing->fromname = $list->sendername;

	 	$mailing->fromemail = $list->senderemail;
	 	$mailing->frombounce = $list->bounceadres;
	 	$mailing->id = 0;
	 	$mailing->issue_nb = 0;
	 	$mailing->images = '';
	 	$mailing->attachments = '';
		if(jnewsletter_mail::sendOne($mailing, $receiver, $list, $message)) {
			$erro = '';
		} else {
			$erro = 'Could not send the unsubscribe email, for list #:'.$list->id.' , please contact the webmaster!';
		}

		return $erro;
	 }//endfct

	 function adminNotification($subscriberId, $list) {

		$qid[0] = $subscriberId;
		$receiver = subscribers::getSubscribersFromId($qid, false);
		$mainframe =& JFactory::getApplication();

		//send email to admin
		$message = '';
		$adminName = $mainframe->getCfg('fromname');
		$adminEmail = $mainframe->getCfg('mailfrom');
		$email = '';
		$type = '';
		$title = '';
		$author = '';
		//$fromemail = $mailing->fromemail;
		$receiverAdmin = subscribers::sendAdminMail( $adminName, $adminEmail, $email, $type, $title, $author, $url = null );
		//end send admin

	 }//endfct

	 function writeLogs($list, $log_simple, $log_detailed) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		 if ($GLOBALS[ACA.'send_log_simple']) {
			 $send = $log_simple;
		 } else {
			 $send = $log_detailed;
		 }

		if (lisType::sendLogs($list->list_type)) {
			$database->setQuery( "SELECT * FROM `#__users` WHERE `gid` = 25 LIMIT 1" );
			if ( ACA_CMSTYPE ) {	// joomla 15
				$admin = $database->loadObject();
				$owner = subscribers::getSubscriberInfoFromUserId($list->owner);
				 if ($GLOBALS[ACA.'send_log'] == 1) {
					if (!empty($owner->email)) {
						JUTility::sendMail($admin->email, $admin->username, $owner->email, 'jNews mailing report', $send );
					} else {
						JUTility::sendMail($admin->email, $admin->username, $admin->email, 'jNews mailing report', $send );
					}
				 } else {

					if ($GLOBALS[ACA.'send_log_closed'] == 1 && connection_aborted()) {
						if (!empty($owner->email)) {
							JUTility::sendMail($admin->email, $admin->username, $owner->email, 'jNews mailing report', $send );
						} else {
							JUTility::sendMail($admin->email, $admin->username, $admin->email, 'jNews mailing report', $send );
						}
					}
				 }

			} //endif
	 	}

		 if ($GLOBALS[ACA.'save_log']) {

			 if ($GLOBALS[ACA.'save_log_simple']) {
				 @file_put_contents(ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'save_log_file'], $log_simple, FILE_APPEND);
			 } else {
				 @file_put_contents(ACA_JPATH_ROOT_NO_ADMIN . $GLOBALS[ACA.'save_log_file'], $log_detailed, FILE_APPEND);
			 }
		 }
	 }

	function logStatistics( $mailingId, $subscriberId) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif

		 if ($subscriberId != 0) {
			 $query = 'REPLACE INTO `#__jnews_stats_details` ' .
				 		'( `mailing_id`, `subscriber_id`, `html`, `read`) ' .
				 		'VALUES ( \'' . $mailingId . '\', \'' . $subscriberId . '\', \'1\', \'1\')';
			 $database->setQuery($query);
			 $database->query();
		 }

		xmailing::updateStatsGlobal( $mailingId, 0, 0, true );

		ob_end_clean();
		$filename = ACA_JPATH_ROOT . '/images/blank.png';
		$handle = fopen($filename, 'r');
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		header("Content-type: image/png");

		echo $contents;
		exit();
	}

	function safe_utf8_encode( $text, $charset ) {
		if( strtolower($charset) == 'utf-8') {
			if( !jnewsletter_mail::seems_utf8($text)) {
				$text = utf8_encode($text);
			}
		}

		$text = jnewsletter_mail::acaHtmlEntityDecode( $text, null, 'utf-8' );
		return $text;
	}

	function seems_utf8($Str) {
		for ($i=0; $i<strlen($Str); $i++) {
			if (ord($Str[$i]) < 0x80) continue; # 0bbbbbbb
			elseif ((ord($Str[$i]) & 0xE0) == 0xC0) $n=1; # 110bbbbb
			elseif ((ord($Str[$i]) & 0xF0) == 0xE0) $n=2; # 1110bbbb
			elseif ((ord($Str[$i]) & 0xF8) == 0xF0) $n=3; # 11110bbb
			elseif ((ord($Str[$i]) & 0xFC) == 0xF8) $n=4; # 111110bb
			elseif ((ord($Str[$i]) & 0xFE) == 0xFC) $n=5; # 1111110b
			else return false; # Does not match any model
			for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
				if ((++$i == strlen($Str)) || ((ord($Str[$i]) & 0xC0) != 0x80)) {
					return false;
				}
			}
		}
		return true;
	}

	function acaHtmlEntityDecode($string, $quote_style = ENT_COMPAT, $charset = null) {

		if( is_null( $charset )) {
			$charset = jnewsletter_mail::acaGetCharset();
		}
		if( function_exists( 'html_entity_decode' )) {
			return @html_entity_decode( $string, $quote_style, $charset );
		}

	    if (!is_int($quote_style) && !is_null($quote_style)) {
	        user_error(__FUNCTION__.'() expects parameter 2 to be long, ' .
	            gettype($quote_style) . ' given', 'warning');
	        return;
	    }
	    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
	    $trans_tbl = array_flip($trans_tbl);
	    $trans_tbl['&#039;'] = '\'';

	    if ($quote_style & ENT_NOQUOTES) {
	        unset($trans_tbl['&quot;']);
	    }

	    return strtr($string, $trans_tbl);
	}

	function acaGetCharset() {
		$iso = explode( '=', _ISO );
		if( !empty( $iso[1] )) {
			return $iso[1];
		}
		else {
			return 'UTF-8';
		}
	}

	/**
	 * This function is used in the integration of jLinks to jNews. jNews
	 * categories are checked and jLinks entries are categorized. This is also
	 * where the mail content is scanned for url links and replaced with
	 * jLinks generated links with the namekeys of the original links.
	 *
	 * @param int $lisType list type whether Newsletter, Auto-Responder,
	 *                     or Smart Newsletter
	 * @param object $list object containing the list details
	 * @param int $mailID email ID to be used as suffix of the mail category namekey
	 * @param string $mailTitle title or subject of the email
	 * @param object $mail email object
	 * @param int $mailCatID determines if the mail category is created or not
	 * @param array $convertedLinks container of the content converted links
	 * @param int $subsid subscriber id
	 *
	**/
	function linkReplacement( $lisType, $list, $mailID, $mailTitle, $mail, &$mailCatID, &$convertedLinks, $subsid ) {

	    if ( empty($GLOBALS[ACA.'show_jlinks']) ) return true;

	    $acajLinkey = 'acjlink5wroot';
	    $acajNewsKey = 'acja2guys7lt1';
	    $acajAutoKey = 'acjmmdj9eslt2';
	    $acajSmartKey = 'acj9okesaplt7';
	    $acajListKey = 'acj28hfdge';
	    $acajMailKey = 'acjsui9bd7sk9w';

	    static $loaded = false;
	    if ( !$loaded ){

			if ( !defined('JOOBI_SECURE') ) define( 'JOOBI_SECURE', true );

	        $joobiEntryPoint = __FILE__ ;
	        if(defined('JPATH_ROOT'))	$path = JPATH_ROOT;
	        elseif(isset($mosConfig_absolute_path)) $path = $mosConfig_absolute_path;
	        //if jLinks is not installed on the website there is no need to proceed
	        if ( !file_exists( $path.DIRECTORY_SEPARATOR.'joobi'.DIRECTORY_SEPARATOR.'entry.php' ) ) return true;
	        $status = @include( $path.DIRECTORY_SEPARATOR.'joobi'.DIRECTORY_SEPARATOR.'entry.php' );
	        if ( !$status && !defined('INSTALLER_FOLDER') ) {
	        	echo "We were unable to load Joobi library. If you removed the joobi folder, ".
	               "please also remove this plugins from the Joomla plugins manager.";
	        	return true;
	        }//endif
	        $loaded = true;
	    }

	    //jLinks API class
	    static $redirectC = null;
	    if ( empty( $redirectC ) ) $redirectC = WGet::classes( 'redirect.api' );
	    if (!method_exists($redirectC,'getCatID')){
	    	echo "We were unable to load the Redirect API";
	    	return true;
	    }

	    //jLinks Newsletter Integration class
	    static $newsletterC = null;
	    if ( empty( $newsletterC ) ) $newsletterC = WGet::classes( 'redirect.newsletter' );
	    if (!method_exists($newsletterC,'getContentLinks')){
	    	echo "We were unable to load the Redirect Newsletter API";
	    	return true;
	    }

	    $contentLinks = array();
	    //check if mail content have links to be replace else no need to create categories
		//jnewsletter_mail::getContentLinks( $mail, $contentLinks );
	    $newsletterC->getContentLinks( $mail, $contentLinks );

	    if ( empty( $contentLinks ) )  return true;
	    //check if links have  been converted already
	    if ( empty( $mailCatID ) )  {

	        //check if jNews category is created else create it
	        $acajID = $redirectC->getCatID($acajLinkey);
	        if ( empty( $acajID ) ) {
	            $acajID = $redirectC->createCategory( 'jNews', 1, null, $acajLinkey);
	        }

	        //determine the type of list
	        $mailSuffix = '';
	        $mailParentCat = '';
	        $mailParentName = '';

	        //Newsletter List type
	        if ( $lisType == 1) {
	            $mailSuffix = 'n'.$mailID;
	            $listParentCat = $acajNewsKey;
	            $listParentName = 'Newsletter';

	        //Auto-Responder List type
	        } elseif ( $lisType == 2) {
	            $mailSuffix = 'ar'.$mailID;
	            $listParentCat = $acajAutoKey;
	            $listParentName = 'Auto-Responder';

	        //Smart-Newsletter List type
	        } elseif ( $lisType ==7 ) {
	            $mailSuffix = 'sn'.$mailID;
	            $listParentCat = $acajSmartKey;
	            $listParentName = 'Smart Newsletter';
	        }
	        //check if the List type category exists else create it
	        $listParentCatID = $redirectC->getCatID( $listParentCat );
	        if ( empty( $listParentCatID ) ) {
	        //create category parameters [ name, parent id, parent namekey, namekey, namekey prefix, namekey suffix ]
	            $listParentCatID =  $redirectC->createCategory( $listParentName, $acajID, null, $listParentCat );
	        }
	        //check list name/id category exists else create it
	        $listCatID = $redirectC->getCatID( $acajListKey.'l'.$list->id );
	        //create list category if there is none
	        if ( empty( $listCatID ) ) {
	            $listCatID =  $redirectC->createCategory( $list->list_name, $listParentCatID, null, $acajListKey.'l'.$list->id);
	        }
	        //check if mail category exist else create it
	        $mailCatID = $redirectC->getCatID( $acajMailKey.$mailSuffix );
	        if ( empty( $mailCatID ) ) {
	            $mailCatID =  $redirectC->createCategory( $mailTitle, $listCatID, null, $acajMailKey.$mailSuffix);
	        }
	    }
	    // if converting of content links are done or not
	    if ( empty( $convertedLinks ) ) {
	         //find link in the content and store them
  			 //jnewsletter_mail::convertContentLinks( $contentLinks, $convertedLinks, $mailCatID );
	         $newsletterC->convertContentLinks( $contentLinks, $convertedLinks, $mailCatID, 'jnewsletter' );
	    }
	    //the replacing of the content links occurs here
		//jnewsletter_mail::replaceContentLinks( $mail, $convertedLinks, $subsid );
	    $newsletterC->replaceContentLinks( $mail, $convertedLinks, $subsid, 'jnews' );

	    return true;
	}//endfct
}//endclass