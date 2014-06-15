<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

class aca_module {

        var $shownamefield =  0;
        var $receivehtmldefault = 1;
        var $showreceivehtml =  0;
        var $listIds =         null;
        var $linear =  0;
        var $fieldsize =  10;
        var $introtext = null;
        var $redirectURL = null;
        var $showListName =  0;
        var $buttonUnregistered = _ACA_MOD_SUBSCRIBE ;
        var $imgUnregistered = null;
        var $buttonRegistered =  _ACA_CHANGE_SUBSCRIPTIONS ;
        var $imgRegistered = null;
        var $moduleclass_sfx = null;
        var $mod_align = null;
        var $posttext = null;
        var $defaultchecked =  1 ;
        var $notifType = null;
        var $catId = null;
        var $effect = 'normal';
        var $cssfile = 'default.css';
        var $mootools_btntext = _ACA_MOOTOOLS_BTNTEXT ;
        var $mootools_boxw = 200;
        var $mootools_boxh = 210;
        //mary var for user1
        //if($GLOBALS[ACA.'version']=='5.0.2'){//check if the version of jnewsletter is pro
        var $column1=0;
        var $column2=0;
        var $column3=0;
        var $column4=0;
        var $column5=0;
        //}//endif for check version

        var $lists = null;

        var $_content = null;
        var $_html        = null;
        //to be able to show more than one module in the same page
        var $num = 0;

         function aca_module() {
                 static $num = 0;
                 $this->num = ++$num;
         }

         function normal($params) {

                $this->shownamefield = $params->get('shownamefield', 0);
                $this->receivehtmldefault = $params->get('receivehtmldefault', 1);
                $this->showreceivehtml = $params->get('showreceivehtml', 0);
                $this->listIds = $params->get('listids', 0);
                $this->linear = $params->get('linear', 0);
                $this->fieldsize = $params->get('fieldsize', 10);
                $this->introtext = $params->get('introtext', '');
                $this->redirectURL = str_replace('&','&amp;',$params->get('red_url', ''));
                $this->showListName = $params->get('showlistname', 1);
                $this->buttonUnregistered = $params->get('button_text', _ACA_MOD_SUBSCRIBE );
                $this->imgUnregistered = $params->get('button_img', null);
                $this->buttonRegistered = $params->get('button_text_change', _ACA_CHANGE_SUBSCRIPTIONS );
                $this->imgRegistered = $params->get('button_img_change', null);
                $this->moduleclass_sfx = $params->get('moduleclass_sfx', null);
                $this->mod_align = $params->get('mod_align', '');
                $this->posttext = $params->get('posttext', '');
                $this->defaultchecked = $params->get('defaultchecked', 1);
                $this->dropdown = $params->get('dropdown',0);
                $this->selecteddrop = intval($params->get('selecteddrop',0));
              	$this->effect = $params->get('effect', 'normal');
              	$this->cssfile = $params->get('cssfile' , 'default.css');
				$this->mootools_btntext = $params->get('mootools_btntext' , _ACA_MOOTOOLS_BTNTEXT );
				$this->mootools_boxw = $params->get('mootools_boxw' , 200);
				$this->mootools_boxh = $params->get('mootools_boxh' , 210);

                if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro
                        $this->column1 = $params->get('column1',0);
                        $this->column2 = $params->get('column2',0);
                        $this->column3 = $params->get('column3',0);
                        $this->column4 = $params->get('column4',0);
                        $this->column5 = $params->get('column5',0);
                }//end if for check version pro

                $this->lists = lists::getSpecifiedLists( $this->listIds );
                $this->_html = '<!--  Beginning Module : '.jnewsletter::version().'   -->'."\n\r";
                $this->_html .= $this->create();
                $this->_html .= '<!--  End Module : '.jnewsletter::version().'   -->'."\n\r";
                $this->_html .= jnewsletter::noShow();

                return $this->_html;
         }


         function notification() {
                $Itemid = $GLOBALS[ACA.'itemidAca'];
                $item = ( !empty($Itemid)) ? '&Itemid=' . $Itemid : '';

                if ( isset( $this->catId ) AND isset( $this->notifType ) ) {

                        if ( lists::getNotifLists( $this->lists , $this->notifType, $this->catId ) ) {
                                $this->linear = 1;
                                $this->introtext = 'Notify me of new product';
                                $this->redirectURL = 'index.php?option=com_virtuemart&page=shop.browse&category_id='.$this->catId.$item;
                                $this->buttonRegistered = _CMN_YES;
                                $this->buttonUnregistered = _CMN_NO;
                                $this->_html = '<!--  Beginning Module : '.jnewsletter::version().'   -->'."\n\r";
                                $this->_html .= $this->create();
                                $this->_html .= '<!--  End Module : '.jnewsletter::version().'   -->'."\n\r";
                        }
                }
                return $this->_html;
         }


         function setListIds( $listIds ) {
                $this->listIds = $listIds;
         }


         function setNotifType( $type ) {
                $this->notifType = $type;
         }

         function setCatId( $id ) {
                $this->catId = $id;
         }

/*<p> Function to create the HTML of the module</p>
 *
 */
         function create() {

                if ( ACA_CMSTYPE ) {        // joomla 15
                        $my =& JFactory::getUser();
                } //endif

                $Itemid = $GLOBALS[ACA.'itemidAca'];
                if(!empty($Itemid)){
                        $item = '&Itemid=' . $Itemid ;
                }else{
                        $item = '';
                }//endif

                if(ACA_CMSTYPE){//Joomla 1.5
                    $doc =& JFactory::getDocument();
                	if(isset($this->cssfile) && ($this->cssfile != -1) && isset($this->moduleclass_sfx)) {
                		$doc->addStyleSheet('components/com_jnewsletter/modules/css/'.$this->cssfile);
                    } else {
                    	$doc->addStyleSheet('components/com_jnewsletter/modules/css/default.css');
                    }//endfi
                }//endif

                $hidden = '';
                $htmlOK = false;
                $HTML = '';
                $formname = 'modjnewsletterForm'.$this->num;
                //check if subscription listing is not empty
                //if not empty print the module
                //else just print the message


						switch ($this->effect) {
						    case 'default':
						        	$HTML .= '<div class="aca_module">';
						        break;
						    case 'mootools-slide':
								if ( ACA_CMSTYPE ) {
									JHTML::script('mootools.js', ACA_PATH_ADMIN_INCLUDES);
								$js = "<!--
										window.addEvent('domready', function(){
											var mySlide = new Fx.Slide('modjnewslettertoggle');
											mySlide.hide();
											$('acatoggleclick').addEvent('click', function(e){
												e = new Event(e);
												mySlide.toggle();
												e.stop();
											});
										});
										//-->";
								$doc->addScriptDeclaration( $js );
								$link = 'id="acatoggleclick"';
								$HTML .= '<center><a '.$link;
								$HTML .= ' style="text-decoration: none;" href="#">';

								if (isset($this->mootools_btntext)) {
									$HTML .= '<div id="aca_clickcontainer" style="padding:4px;"><center><span>'.$this->mootools_btntext.'</span></center></div></a></center>';
								}else{
										$HTML .= '<div id="aca_clickcontainer" style="padding:4px;"><center><span>'. _ACA_MOOTOOLS_BTNTEXT .'</span></center></div></a></center>';
								}//endif

		                     	$HTML .= '<div id="modjnewslettertoggle">';
			                    $HTML .= '<div id="acamoduletoggle" style="padding: 3px;">';

								}
						        break;
						    case 'mootools-modal':
						       if ( ACA_CMSTYPE ) {
                               		JHTML::_('behavior.modal');
                                	$link = "rel=\"{handler: 'adopt', adopt:'acapop', size: {x:$this->mootools_boxw, y:$this->mootools_boxh}}\" class=\"modal aca_clicklink\"";
	                      			$HTML .= '<center><a '.$link;
									$HTML .= ' style="text-decoration: none;" href="#">';

									if (isset($this->mootools_btntext)) {
									$HTML .= '<div id="aca_clickcontainer" style="padding:4px;"><center><span>'.$this->mootools_btntext.'</center></span></div></a></center>';
									}else{
											$HTML .= '<div id="aca_clickcontainer" style="padding:4px;"><center><span>'. _ACA_MOOTOOLS_BTNTEXT .'</span></center></div></a></center>';
									}//endif

									$HTML .= '<div style="margin: 0px; overflow: hidden; height: 0px;">';
			                      	$HTML .= '<div class="aca_module" style="display: none;">';
		                 	       	$HTML .= '<div id="acapop" style="padding: 15px;">';
                             	}//endif
						        break;

						    default:
						       $HTML .= '';
						}//endswitch
 if (!empty($this->lists)) {
                        $subscriber = '';
                         if ($my->id >0) {//login
                                $loggedin = true;
                                $subscriber = subscribers::getSubscriberInfoFromUserId($my->id);
                                if(empty($subscriber)){
                                        subscribers::syncSubscribers(true);
                                        $subscriber = subscribers::getSubscriberInfoFromUserId($my->id);
                                }
                                if(empty($subscriber)) $loggedin = false;
                         } else {//logout
                                 $loggedin = false;
                         }//endif

                         if (!$loggedin && $GLOBALS[ACA.'allow_unregistered']) {
                                 $HTML .= $this->_printscript();
                         }//endif

                         if(!$GLOBALS[ACA.'disabletooltip']){
                                if ( ACA_CMSTYPE ) {
                                       JHTML::_('behavior.tooltip');
                                }//endif
                        }//endif

                        $linkForm = '.php?option=com_jnewsletter';
                        compa::completeLink($linkForm,false);

                        $HTML .= '<form action="'.$linkForm.'" method="post" name="modjnewsletterForm'.$this->num.'">';

                        //pretext
                        if (!empty($this->introtext)) {
                                $text = '<span class="pretext">'. $this->introtext .'</span>';
                                $HTML .= jnewsletter::printLine($this->linear, $text);
                        }//endif

                        //subscription list
                        $HTML .= $this->_showSubcriptionList($subscriber, $loggedin, $item);

                        //if (!$loggedin) {
                                if ($GLOBALS[ACA.'allow_unregistered']) {

                                         //name field
                                         if ($this->shownamefield) {
                                                /*$text = '<input id="wz_11" type="text" size="'. $this->fieldsize.'" value="'. addslashes(_ACA_NAME).'" class="inputbox" name="name" onblur="if(this.value==\'\') this.value=\''. addslashes(_ACA_NAME).'\';" onfocus="if(this.value==\''. addslashes(_ACA_NAME).'\') this.value=\'\' ; " />';*/
                                                $text = 'Nome <input id="wz_11" type="text" size="'. $this->fieldsize.'" class="inputbox" name="name" style="margin-left:2px;"  />';												
                                                $HTML .= jnewsletter::printLine($this->linear, $text);
                                         } else {
                                                $text = '<input id="wz_11" type="hidden" value="" name="name" />';
                                         }//endif

                                        //email field
                                        /*$text = ' E-mail: <input id="wz_12" type="text" size="' .$this->fieldsize .'" value="' . addslashes(_ACA_EMAIL) .'" class="inputbox" name="email" onblur="if(this.value==\'\') this.value=\'' . addslashes(_ACA_EMAIL) .'\';" onfocus="if(this.value==\'' . addslashes(_ACA_EMAIL) .'\') this.value=\'\' ; " />';*/
						                $text = ' <div class="linha_email">E-mail <input id="wz_12" type="text" size="' .$this->fieldsize .'" class="inputbox" name="email"  /></div>';
                                        $HTML .= jnewsletter::printLine($this->linear, $text);
										$text = '<input id="wz_2" type="hidden" class="inputbox" value="1" name="receive_html"  />';
										
                                        //for field columns
                                        if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro

                                                if ($this->column1){//show column1 in the subscribers module
                                                        $text = '<input id="wz_13" type="text" size="' .$this->fieldsize .'" value="' . addslashes($GLOBALS[ACA.'column1_name']) .'" class="inputbox" name="column1" onblur="if(this.value==\'\') this.value=\'' . addslashes($GLOBALS[ACA.'column1_name']) .'\';" onfocus="if(this.value==\'' . addslashes($GLOBALS[ACA.'column1_name']) .'\') this.value=\'\' ; " />';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                }//endif

                                                if ($this->column2){//show column2 in the subscribers module
                                                        $text = '<input id="wz_14" type="text" size="' .$this->fieldsize .'" value="' . addslashes($GLOBALS[ACA.'column2_name']) .'" class="inputbox" name="column2" onblur="if(this.value==\'\') this.value=\'' . addslashes($GLOBALS[ACA.'column2_name']) .'\';" onfocus="if(this.value==\'' . addslashes($GLOBALS[ACA.'column2_name']) .'\') this.value=\'\' ; " />';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                }//endif

                                                if ($this->column3){//show column3 in the subscribers module
                                                        $text = '<input id="wz_15" type="text" size="' .$this->fieldsize .'" value="' . addslashes($GLOBALS[ACA.'column3_name']) .'" class="inputbox" name="column3" onblur="if(this.value==\'\') this.value=\'' . addslashes($GLOBALS[ACA.'column3_name']) .'\';" onfocus="if(this.value==\'' . addslashes($GLOBALS[ACA.'column3_name']) .'\') this.value=\'\' ; " />';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                }//endif

                                                if ($this->column4){//show column4 in the subscribers module
                                                        $text = '<input id="wz_16" type="text" size="' .$this->fieldsize .'" value="' . addslashes($GLOBALS[ACA.'column4_name']) .'" class="inputbox" name="column4" onblur="if(this.value==\'\') this.value=\'' . addslashes($GLOBALS[ACA.'column4_name']) .'\';" onfocus="if(this.value==\'' . addslashes($GLOBALS[ACA.'column4_name']) .'\') this.value=\'\' ; " />';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                }//endif
                                                if ($this->column5){//show column5 in the subscribers module
                                                        $text = '<input id="wz_17" type="text" size="' .$this->fieldsize .'" value="' . addslashes($GLOBALS[ACA.'column5_name']) .'" class="inputbox" name="column5" onblur="if(this.value==\'\') this.value=\'' . addslashes($GLOBALS[ACA.'column5_name']) .'\';" onfocus="if(this.value==\'' . addslashes($GLOBALS[ACA.'column5_name']) .'\') this.value=\'\' ; " />';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                }//endif
                                        }//endif for PRO || PLUS
/*

                                }else{//required registered
                                        $HTML .= jnewsletter::printLine( $this->linear, jnewsletter::printM('green', _ACA_REGISTER_REQUIRED) );
                                        $text = _NO_ACCOUNT." ";
                                        if ( isset( $GLOBALS[ACA.'cb_integration'] ) && $GLOBALS[ACA.'cb_integration'] ) {
                                                $linkme = '.php?option=com_comprofiler&amp;task=registers';
                                        } else {
                                                if(ACA_CMSTYPE){//Joom1.5
                                                        $linkme = '.php?option=com_user&amp;task=register';
                                                }//endif
                                        }//endif

                                        compa::completeLink($linkme,false);

                                        $text .= '<a href="'. $linkme.'">';
                                        $text .= _CREATE_ACCOUNT."</a>";
                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                        $htmlOK = false;

                                }//endif
*/
                                $checked = !empty($subscriber) ? $subscriber->receive_html : $this->receivehtmldefault;
                                if ($this->showreceivehtml) {
                                        
										/*$checkedPrint = ($checked != 0) ? 'checked="checked"' : '';*/
                                        $text = '<input id="wz_2" type="hidden" class="inputbox" value="1" name="receive_html" '.$checkedPrint.' />';
                                        /*$text .= ' '._ACA_RECEIVE_HTML;*/
                                } else {
                                         $hidden .= '<input id="wz_2" type="hidden" value="'.$checked.'" name="receive_html" />' . "\n";
                                }//endif

                                //for captcha
                                if($GLOBALS[ACA.'type']=='PRO' or $GLOBALS[ACA.'type']=='PLUS'){//check the version is plus or pro
                                        if(empty($esc) && $GLOBALS[ACA.'enable_captcha']){//check if $esc has been initialized
                                        		$code = captchajNewsletter::generateCode('5');
                                                $HTML .= $this->_showCaptcha($code , $GLOBALS[ACA.'enable_captcha']);
                                                $hidden .= $this->_showCaptchaHidden($code, $GLOBALS[ACA.'enable_captcha']);
                                        }//endif
                                }//endif
                                $HTML .= $this->_showButton(false);
                        } else {//login

                                $HTML .= $this->_showButton(true);

                        }//endif

                        if (!empty($this->posttext)) {
                                $text = '<span class="postext">'. $this->posttext .'</span>';
                                $HTML .= jnewsletter::printLine($this->linear, $text);
                        }//endif

                        $HTML .= $hidden . '</form>';
                } else {// no listing
                        $HTML .= '<div class="aca_module">';
                        //$HTML .= jnewsletter::printM('blue' , _ACA_LIST_NOT_AVAIL );
                         $HTML .= '<p class="jnews-nolist">'. _ACA_LIST_NOT_AVAIL .'</p>';
                }//endif

                $HTML .= '';

                switch ($this->effect) {
					case 'default':
						$HTML .= '</div>';
					break;
					case 'mootools-slide':
						$HTML .= '</div></div></div>';
					break;
					case 'mootools-modal':
						$HTML .= '</div></div></div></div>';
					break;
				}

                $this->_content = $HTML;
                return $HTML;
         }//endfct

         function _printscript(){

         	global $mainframe;

                $js = '';
                $js .= '
                                <script language="javascript" type="text/javascript">
                                <!--
                                        function submitjnewslettermod'.$this->num.'(formname) {
                                                var form = eval(\'document.\'+formname);' .
                                                'if(!form.elements) form = form[1];' .
                                                'var place = form.email.value.indexOf("@",1);' .
                                                'var point = form.email.value.indexOf(".",place+1);';

                if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnewsletter is pro

                        if ($this->column1) {//for column1
                                $js .=
                                        'if (form.column1.value == "" || form.column1.value == "'.addslashes($GLOBALS[ACA.'column1_name']).'") {
                                                alert( "' . addslashes(_ACA_REGWARN_COLUMN1) .' '.$GLOBALS[ACA.'column1_name']. '" );' .
                                                'return false;
                                        }';
                        }//endif

                        if ($this->column2) {//for column2
                                $js .=
                                        'if (form.column2.value == "" || form.column2.value == "'.addslashes($GLOBALS[ACA.'column2_name']).'") {
                                                alert( "' . addslashes(_ACA_REGWARN_COLUMN2) .' '.$GLOBALS[ACA.'column2_name']. '" );' .
                                                'return false;
                                        }';
                        }//endif

                        if ($this->column3) {//for column3
                                $js .=
                                        'if (form.column3.value == "" || form.column3.value == "'.addslashes($GLOBALS[ACA.'column3_name']).'") {
                                                alert( "' . addslashes(_ACA_REGWARN_COLUMN3) .' '.$GLOBALS[ACA.'column3_name']. '" );' .
                                                'return false;
                                        }';
                        }//endif

                        if ($this->column4) {//for column4
                                $js .=
                                        'if (form.column4.value == "" || form.column4.value == "'.addslashes($GLOBALS[ACA.'column4_name']).'") {
                                                alert( "' . addslashes(_ACA_REGWARN_COLUMN4) .' '.$GLOBALS[ACA.'column4_name']. '" );' .
                                                'return false;
                                        }';
                        }//endif

                        if ($this->column5) {//for column5
                                $js .=
                                        'if (form.column5.value == "" || form.column5.value == "'.addslashes($GLOBALS[ACA.'column5_name']).'") {
                                                alert( "' . addslashes(_ACA_REGWARN_COLUMN5) .' '.$GLOBALS[ACA.'column5_name']. '" );' .
                                                'return false;
                                        }';
                        }//endif
                }//end if for check version pro

				if($mainframe->isAdmin()){
	                //captcha checking
	                if($GLOBALS[ACA.'type']=='PRO' || $GLOBALS[ACA.'type']=='PLUS'){//check if the version is plus or pro
	                        //captcha is enable
	                        if($GLOBALS[ACA.'enable_captcha']){#4c8a5b
	                                $js .=
	                                        'if (form.security_code.value == "") {
	                                                alert( "' . addslashes(_ACA_REGWARN_CAPTCHA) .' " );' .
	                                                'return false;
	                                        }';

	                        }//endif
	                }//endif
                }

                //name field checking
                if ($this->shownamefield) {
                        $js .= '
                                if (form.name.value == "" || form.name.value == "'.addslashes(_ACA_NAME).'") {
                                        alert( "' . addslashes(_ACA_REGWARN_NAME) . '" );' .
                                        'return false;
                                }';
                }//endif

                //email field checking
                $js .= ' if (form.email.value == "" || form.email.value == "'.addslashes(_ACA_EMAIL).'") ' .
                                                                 '{' .
                                                                         'alert( "' . addslashes(_ACA_REGWARN_MAIL) .'" );' .
                                                                                'return false;
                                                                        } else ' .
                                                                                '{' .
                                                                                        'if ((place > -1)&&(form.email.value.length >2)&&(point > 1))' .
                                                                                                '{' .
                                                                                                        'form.submit();' .
                                                                                                        'return true;
                                                                                                } ' .
                                                                                        'else ' .
                                                                                                '{' .
                                                                                                        'alert( "' . addslashes(_ACA_REGWARN_MAIL) .'" );' .
                                                                                                        'return false;' .
                                                                                                '}'.
                                                                '}'.
                                                        '}
                                                //-->
                        </script>';

                return $js;
         }//endif


         /*<p>function to create the subscription listing where the user can choose to subscribe</p>
          * @params log
         */
          function _showSubcriptionList($subscriber, $loggedin=true, $item){

                        $HTML = '';
                  //We create the dropdown
                        if($this->dropdown){
                                $dropdown = '<input type="hidden" value="1" name="subscribed[99]"  />';
                                $dropdown .= '<select class="aca_list_drop" name="sub_list_id[99]">';								
                        }//endif
						
                        $i=0;
                        $accessLevel = 0;
                        $queues = $loggedin ? listssubscribers::getSubscriberLists($subscriber->id) : '';
						if ( $this->showListName ) {

						            foreach ($this->lists as $list) {

                                        $i++;
                                        $subscribed = 0;
                                        $accessLevel = 0;
                                        if ($loggedin) {
                                                if (!empty($queues)) {
                                                        foreach ($queues as $queue) {
                                                                if ($list->id == $queue->list_id) {
                                                                        $subscribed = 1;
                                                                        $accessLevel = $queue->acc_level;
                                                                }
                                                        }
                                                }
                                        }
                                         if ($list->html ==1) $htmlOK = true;

                                         $checked = 0;

                                         if ($loggedin) {
                                                 $checked = $subscribed;
                                         } else {
                                         	if ($this->defaultchecked) {$checked = 1;}
                                            $subscriber->blacklist = 0;

                                         }

                                        $checkedPrint = ($checked != 0) ? 'checked="checked"' : '';

                                        if ($list->hidden == 1) {
                                                if($this->dropdown){
                                                        $extraselect = ($list->id == $this->selecteddrop) ? 'selected' : '';
                                                        $dropdown .= '<option value="'.$list->id.'" '.$extraselect.'>'.$list->list_name.'</option>';
                                                }else{
                                                        if ($subscriber->blacklist == 0) {
                                                                $text = "\n".'<input id="wz_3'.$i.'" type="checkbox" class="inputbox" value="1" name="subscribed['.$i.']" '.$checkedPrint.' />';
                                                        } else {
                                                                $text = "\n".'<input type="checkbox" class="inputbox" value="1" name="subscribedfake['.$i.']" '.$checkedPrint.'  />';
                                                                $text .= "\n".'<input type="hidden" value="0" name="subscribed['.$i.']"  />';
                                                        }
                                                        $text .= "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
                                                        $link = (($list->list_type =='1' or $list->list_type =='7') && $GLOBALS[ACA.'show_archive'] ) ? 'index.php?option=com_jnewsletter'.$item.'&act=mailing&task=archive&listid='. $list->id .'&listype=' . $list->list_type : '#';
                                                        $text .= "\n".'<span class="aca_list_name"';
                                                        if ($link == "#"){$text .= " onclick='return false;' ";}
                                                        $text .='>'.compa::toolTip($list->list_desc, $list->list_name, '', '', $list->list_name, $link, 1).'</span>';
                                                        $HTML .= jnewsletter::printLine($this->linear, $text);
                                                        $HTML .= "\n".'<input type="hidden" name="acc_level['.$i.']" value="'.$accessLevel.'" />'."\n\r";
                                                }
                                        } else {
                                                if (!$loggedin) {
                                                        $HTML .= '<input type="hidden"  value="1" name="subscribed['.$i.']" />';
                                                        $HTML .=  "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
                                                }
                                        }
                                 }
                        } else {
                                 foreach ($this->lists as $list) {
                                        $i++;
                                        $subscribed = 0;
                                        $accessLevel = 0;
                                        if ($loggedin) {
                                                if (!empty($queues)) {
                                                        foreach ($queues as $queue) {
                                                                if ($list->id == $queue->list_id) {
                                                                        $subscribed = 1;
                                                                        $accessLevel = $queue->acc_level;
                                                                }
                                                        }
                                                }
                                        }
                                         if ($list->html ==1) $htmlOK = true;

                                         $checked = 0;
                                         if ($loggedin) {
                                                 $checked = $subscribed;
                                         } else {
                                                 if ($this->defaultchecked) {$checked = 1;}
                                         }

                                         $HTML .= '<input type="hidden"  value="'.$checked.'" name="subscribed['.$i.']" />';
                                         $HTML .= "\n".'<input type="hidden" name="sub_list_id['.$i.']" value="'.$list->id.'" />';
                                         $HTML .= "\n".'<input type="hidden" name="acc_level['.$i.']" value="'.$accessLevel.'" />';
                                         if ($list->html ==1) $htmlOK = true;
                                 }
                        }

                        if($this->dropdown){
                                $dropdown .= '</select><br/>';
                                $HTML .= $dropdown;
                        }

                  return $HTML;
          }//endfct

        /*<p>function to show captcha </p>
         *
         */
        function _showCaptcha($code,$enable = true){

				if ( session_id() == "" ) {
					session_start();
				}
                $captchaHTML='';
                $security_code='';
                $esc='';

                if($enable){//if captcha is enabled

                     	$escaptcha = captchajNewsletter::encryptData($code, crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));
                        $esc = $escaptcha;
                        $decrypt=captchajNewsletter::decryptData($esc, crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));
                       	$captchaHTML .= '<table><tr>';
                        $captchaHTML .= '<td>'._ACA_CAPTCHA_CAPTION.'</td>';
					    if(ACA_CMSTYPE){//joomla 15
                                $path2= ACA_JPATH_LIVE_NO_HTTPS.'/components/com_jnewsletter/captcha/monofont.ttf';
                                $path= ACA_JPATH_LIVE_NO_HTTPS.'/components/com_jnewsletter/captcha/CaptchaSecurityImages.php?width=80&height=25&characters=5&esc='. $esc.'&encpwd='.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']);
                        }
                        $captchaHTML .='<td><img border="0" src="'. $path .'"></td>';
                        $captchaHTML .= '<td><a title="Refresh Security" href="javascript:location.reload(false)"><img src="'. JURI::base().'/administrator/components/com_jnewsletter/images/refresh.png"></a></td>';
                        $captchaHTML .='<tr><td></td><td><input class="inputbox" title ="Enter Security Code Here" name="security_code" size="7" type="text" /></td></tr>';
               			$captchaHTML .= '</tr></table>';
                }else{
                        return '';
                }//endif

                return $captchaHTML;

        }//endfct

        function _showCaptchaHidden($code, $enable=false){
				if(!$enable) return '';
                //$code = captchajNewsletter::generateCode('5');
                $escaptcha = captchajNewsletter::encryptData($code, crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']));
                $esc = $escaptcha;
                $captchaHidden ='<input type="hidden" name="security_captcha" value="'.$esc.'" />';//captcha

                return $captchaHidden;
        }//endfct

        function _showButton($registered=false){
                        $btnHTML = '';
                if (!$registered){
                        if ( isset($this->imgUnregistered) ) {
                                $btn = '<input id="aca_22" type="image" src="'.$this->imgUnregistered.'" value="'.$this->buttonUnregistered.'" alt="'.$this->buttonUnregistered.'" name="'.$this->buttonUnregistered.'" onclick="return submitjnewslettermod'.$this->num.'(\'modjnewsletterForm'.$this->num.'\');" />';
                        }else{
                                $btn = '<div class="box_assinar_news">Desejo assinar newsletter ALAB <input id="aca_22" type="button" value=" " class="button" name="'.$this->buttonUnregistered.'" onclick="return submitjnewslettermod'.$this->num.'(\'modjnewsletterForm'.$this->num.'\');" /></div>';
                        }//endif

                        $btnHTML .= jnewsletter::printLine($this->linear, $btn);
                        $hidden = '<input type="hidden" name="act" value="subscribe" />';
                        $hidden .= '<input type="hidden" name="redirectlink" value="' . $this->redirectURL .'" />';
                        $hidden .= '<input type="hidden" name="listname" value="' . $this->showListName .'" />';
                        $hidden .= '<input type="hidden" name="passwordA" value="'.crypt($GLOBALS[ACA.'url_pass'],$GLOBALS[ACA.'url_pass']).'" />';
                        $hidden .= '<input type="hidden" name="fromSubscribe" value="1" />';

                        $btnHTML .= $hidden;
                }else{ // Se tiver logado

                        if ( isset($this->imgRegistered) ) {
                                $btn = '<input id="aca_22" type="image" src="'.$this->imgRegistered.'" value="'.$this->buttonRegistered.'" alt="'.$this->buttonRegistered.'" name="'.$this->buttonRegistered.'"/>';
                        } else {
                                $btn = '<input id="aca_22"  type="submit" value=" " name="'.$this->buttonRegistered.'" class="button" />';
                        }//endif

                        $btnHTML .= jnewsletter::printLine($this->linear, $btn);
                        $hidden = '<input type="hidden" name="act" value="updatesubscription" />';
                        $hidden .= '<input type="hidden" name="redirectlink" value="' . $this->redirectURL .'" />';
                        $hidden .= '<input type="hidden" name="listname" value="' . $this->showListName .'" />';
                        $btnHTML .= $hidden;
                }//endif

                return $btnHTML;
        }//endfct

 }//endclass
