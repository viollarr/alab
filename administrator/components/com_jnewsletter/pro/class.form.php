	<?php
	defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
	### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
	 class createForm {
		function taskOptions($task) {

			 switch ($task) {
				case ('make') :
					createForm::make();
					break;
				default :
					createForm::doNew();
					break;
			 }//endswitch
		}//endif

		function make() {

			if ( ACA_CMSTYPE ) {	// joomla 15
				$d['listId'] = JRequest::getVar('listid', '');
			}//endif

			$lists = lists::getLists($d['listId'], 0, 1, '', false, true, true);
			$d['listName'] = $lists[0]->list_name;
			$formsInfo = createForm::sampleForm($d);
			createForm::doNew($formsInfo);
		}//endif

		function doNew($formsInfo='') {
			$dropDownList =  lisType::getListsDropList(0, '', '');
			if ( ACA_CMSTYPE ) {	// joomla 15
		       $lists['listid'] = JHTML::_('select.genericlist', $dropDownList, 'listid', 'class="inputbox" size="1" onchange="document.jNewsletterFilterForm.submit();"', 'id', 'list_name', 0 );
			}//endif

		    $forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
			$forms['select'] = " <form action='index2.php' method='post' name='jNewsletterFilterForm'> \n" ;
			backHTML::formStart('show_mailing' , 0  ,'' );
			echo $forms['select'];
			?>
			<input type="hidden" name="option" value="com_jnewsletter" />
			<input type="hidden" name="act" value="list" />
			<input type="hidden" name="task" value="make" />
	    	<input type="hidden" name="boxchecked" value="0" />
			<fieldset class="jnewslettercss">
			<legend><?php echo _ACA_FORM_BUTTON; ?></legend>
			<table class="jnewslettertable" cellspacing="1">
				<tbody>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							$title = _ACA_SEL_LIST ;
							$tip = _ACA_FORM_LIST_TIPS;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
						<?php echo $lists['listid']." ";?>
					</td>
				</tr>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							$title = _ACA_FORM_COPY ;
							$tip = _ACA_FORM_COPY_TIPS;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
					<?php
							 echo '<textarea name="forms_info" rows="30" cols="75">' . $formsInfo . '</textarea>';
						?>
					</td>
				</tr>
				</tbody>
			</table>
			</fieldset>
			</form>
			<?php
		}//endfct

		function sampleForm($d) {
			global $Itemid;
			$nr = "\n";
			$col='<br>';

			if($GLOBALS[ACA.'show_column1']){//show column1
				//$col .= '<br />'.$nr;
				$col .='<input id="wz_13" type="text" size="10" value="'.$GLOBALS[ACA.'column1_name'].'" class="inputbox" name="column1" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column1_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column1_name'] .'\') this.value=\'\' ; " />'.$nr;
			}//endif
			if($GLOBALS[ACA.'show_column2']){//show column2
				$col .='<br />'.$nr;
				$col .='<input id="wz_14" type="text" size="10" value="'.$GLOBALS[ACA.'column2_name'].'" class="inputbox" name="column2" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column2_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column2_name'] .'\') this.value=\'\' ; " />'.$nr;
			}//endif
			if($GLOBALS[ACA.'show_column3']){//show column3
				$col .='<br />'.$nr;
				$col .='<input id="wz_15" type="text" size="10" value="'.$GLOBALS[ACA.'column3_name'].'" class="inputbox" name="column3" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column3_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column3_name'] .'\') this.value=\'\' ; " />'.$nr;
			}//endif
			if($GLOBALS[ACA.'show_column4']){//show column4
				$col .='<br />'.$nr;
				$col .='<input id="wz_16" type="text" size="10" value="'.$GLOBALS[ACA.'column4_name'].'" class="inputbox" name="column4" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column4_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column4_name'] .'\') this.value=\'\' ; " />'.$nr;
			}//endif
			if($GLOBALS[ACA.'show_column5']){//show column4
				$col .='<br />'.$nr;
				$col .='<input id="wz_17" type="text" size="10" value="'.$GLOBALS[ACA.'column5_name'].'" class="inputbox" name="column5" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column5_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column5_name'] .'\') this.value=\'\' ; " />'.$nr;
				$col .='<br />'.$nr;
			}//endif

			//for captcha
						$code = captchajNewsletter::generateCode('5');

						//echo $code.'**';
	  					$escaptcha = captchajNewsletter::encryptData($code, crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));
	  					//echo $escaptcha;

						$esc = $escaptcha;//$_GET['esc'];

						$decrypt=captchajNewsletter::decryptData($esc, crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));
						//echo $decrypt;
						$captcha='<br>';

						$captcha .= _ACA_CAPTCHA_CAPTION.' ';

						if(ACA_CMSTYPE){//joomla 15
							$path2= ACA_JPATH_LIVE_NO_HTTPS.'/administrator/components/com_jnewsletter/plus/captcha/monofont.ttf';
							//$path= ACA_JPATH_LIVE_NO_HTTPS.'/administrator/components/com_jnewsletter/plus/captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc='. $esc.'&path='.$path2.'&encpwd='.$GLOBALS[ACA.'url_pass'];
							$path= ACA_JPATH_LIVE_NO_HTTPS.'/administrator/components/com_jnewsletter/plus/captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc='. $esc.'&encpwd='.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']);
						}else{//joomla 10
							$path2=$GLOBALS['mosConfig_live_site'].'/administrator/components/com_jnewsletter/plus/captcha/monofont.ttf';
							//$path=$GLOBALS['mosConfig_live_site'].'/administrator/components/com_jnewsletter/plus/captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc='. $esc.'&path='.$path2.'&encpwd='.$GLOBALS[ACA.'url_pass'];
							$path=$GLOBALS['mosConfig_live_site'].'/administrator/components/com_jnewsletter/plus/captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc='. $esc.'&encpwd='.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']);
						}
						//echo $path;

						$captcha .='<img border=\'0\' src="'. $path .'">';
						//$h .='<img border="0" src="'.ACA_JPATH_LIVE_NO_HTTPS.'/administrator/components/com_jnewsletter/plus/captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc='. $esc.'">';
						$captcha .='<input class="inputbox" style="background-color: #ddeaf8;" name="security_code" size="4" type="text" /><br>';
						//$h .= "<img border=\"0\" src=\"./captcha/CaptchaSecurityImages.php?width=60&height=25&characters=5&esc=$esc\"/>".' '.'<input class="inputbox" style="background-color: #ddeaf8;" name="security_code" size="4" type="text" /><br>';

			$html = '<!--  Begining : jNews Form    -->'.$nr;
			$html .= '<div>'.$nr;
			$html .= '<form action="'.ACA_JPATH_LIVE.'/index.php?option=com_jnewsletter" method="post" name="modjnewsletterForm">'.$nr;
			$html .= '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
			if(isset($d['listName']) AND strlen($d['listName'])>0){
				$html .= '<input id="wz_31" type="checkbox" class="inputbox" value="1" name="subscribed[1]" checked="checked" />'.$nr;
			}else{
				$html .= '<input id="wz_31" type="hidden" class="inputbox" value="1" name="subscribed[1]" />'.$nr;
			}//endif
			$html .= '<input type="hidden" name="sub_list_id[1]" value="'.$d['listId'].'" />'.$nr;
			if(isset($d['listName']) AND strlen($d['listName'])>0){
				$html .= $d['listName'].'<br />'.$nr;
			}//endif
			$html .= '<input type="hidden" name="acc_level[1]" value="29" />'.$nr;
			$html .= '<input id="wz_11" type="text" size="10" value="Name" class="inputbox" name="name" onblur="if(this.value==\'\') this.value=\'Name\';" onfocus="if(this.value==\'Name\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_12" type="text" size="10" value="E-mail" class="inputbox" name="email" onblur="if(this.value==\'\') this.value=\'E-mail\';" onfocus="if(this.value==\'E-mail\') this.value=\'\' ; " />'.$nr;

			//for columns
			$html .= $col;
			/* for additional columns
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_13" type="text" size="10" value="'.$GLOBALS[ACA.'column1_name'].'" class="inputbox" name="column1" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column1_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column1_name'] .'\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_14" type="text" size="10" value="'.$GLOBALS[ACA.'column2_name'].'" class="inputbox" name="column2" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column2_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column2_name'] .'\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_15" type="text" size="10" value="'.$GLOBALS[ACA.'column3_name'].'" class="inputbox" name="column3" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column3_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column3_name'] .'\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_16" type="text" size="10" value="'.$GLOBALS[ACA.'column4_name'].'" class="inputbox" name="column4" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column4_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column4_name'] .'\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_17" type="text" size="10" value="'.$GLOBALS[ACA.'column5_name'].'" class="inputbox" name="column5" onblur="if(this.value==\'\') this.value=\''.$GLOBALS[ACA.'column5_name'].'\';" onfocus="if(this.value==\''.$GLOBALS[ACA.'column5_name'] .'\') this.value=\'\' ; " />'.$nr;
			$html .= '<br />'.$nr;//end of columns
	 		*/
			$html .= '<br />';
			if($GLOBALS[ACA.'enable_captcha']){//if captcha is enable
				$html .= $captcha;//captcha
			}//end of if
			$html .= '<input id="wz_2" type="checkbox" class="inputbox" value="1" name="receive_html"  checked="checked"  />'. _ACA_RECEIVE_HTML.$nr;
			$html .= '<br />'.$nr;
			$html .= '<input id="wz_22" type="submit" value="Subscribe" class="button" />'.$nr;
			$html .= '<input type="hidden" name="act" value="subscribe" />'.$nr;
			$html .= '<input type="hidden" name="listname" value="1" />'.$nr;
			$html .= '<input type="hidden" name="passwordA" value="'.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']).'" />'.$nr;//added by mary
			$html .= '<input type="hidden" name="fromSubscribe" value="1" />'."\n";
			$html .= '<input type="hidden" name="security_captcha" value="'.$esc.'" />';
			$html .= '</form>'.$nr;
			$html .= '</div>'.$nr;

			$html .= '<!--  End : jNews Form    -->'.$nr;
			return $html;
		}//endfct
	 }//endclass