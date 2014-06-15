<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class NewsletterViewNewsletter extends JView
{
	var $type = 'news';
	var $gtask = 'newsletter';
	var $nameListing = 'NEWSLETTERS';
	var $nameForm = 'NEWSLETTER';
	function display($tpl = null)
	{
		JHTML::script('mootools.js', ACYMAILING_LIVE .'media/system/js/');
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function form(){
		$mailid = acymailing::getCID('mailid');
		if(!empty($mailid)){
			$mailClass = acymailing::get('class.mail');
			$mail = $mailClass->get($mailid);
		}else{
			$config =& acymailing::config();
			$mail->created = time();
			$mail->fromname = $config->get('from_name');
			$mail->fromemail = $config->get('from_email');
			$mail->replyname = $config->get('reply_name');
			$mail->replyemail = $config->get('reply_email');
			$mail->published = 0;
			$mail->visible = 1;
			$mail->html = 1;
			$mail->body = '';
			$mail->altbody = '';
			$mail->tempid = 0;
			$templateClass = acymailing::get('class.template');
			$myTemplate = $templateClass->getDefault();
			if(!empty($myTemplate->tempid)){
				$mail->body = $myTemplate->body;
				$mail->altbody = $myTemplate->altbody;
				$mail->tempid = $myTemplate->tempid;
			}
		}
		$values = null;
		$listmailClass = acymailing::get('class.listmail');
		$lists = $listmailClass->getLists($mailid);
		$my = JFactory::getUser();
		$copyAllLists = $lists;
		foreach($copyAllLists as $listid => $oneList){
			if(!$oneList->published OR empty($my->id) OR empty($my->gid)){
				unset($lists[$listid]);
				continue;
			}
			if($oneList->access_manage == 'all') continue;
			if((int)$my->id == (int)$oneList->userid) continue;
			if(!in_array($my->gid,explode(',',$oneList->access_manage))){
				unset($lists[$listid]);
				continue;
			}
		}
		if(empty($lists)){
			$app =& JFactory::getApplication();
			$app->enqueueMessage('You don\'t have the rights to add or edit an e-mail','error');
			$app->redirect(acymailing::completeLink('lists',false,true));
		}

		jimport('joomla.html.pane');
		$tabs	=& JPane::getInstance('tabs');
		$values->maxupload = (acymailing::bytes(ini_get('upload_max_filesize')) > acymailing::bytes(ini_get('post_max_size'))) ? ini_get('post_max_size') : ini_get('upload_max_filesize');
		$toggleClass = acymailing::get('helper.toggle');
		$editor = acymailing::get('helper.editor');
		$editor->name = 'editor_body';
		$editor->content = $mail->body;
		$js = "function updateEditor(htmlvalue){";
			$js .= 'if(htmlvalue == \'0\'){window.document.getElementById("htmlfieldset").style.display = \'none\'}else{window.document.getElementById("htmlfieldset").style.display = \'block\'}';
		$js .= '}';
		$js .='window.addEvent(\'load\', function(){ updateEditor('.$mail->html.'); });';
		$script = 'function addFileLoader(){
		var divfile=window.document.getElementById("loadfile");
		var input = document.createElement(\'input\');
		input.type = \'file\';
		input.size = \'30\';
		input.name = \'attachments[]\';
		divfile.appendChild(document.createElement(\'br\'));
		divfile.appendChild(input);}
		';
		$script .= 'function submitbutton(pressbutton){
						if (pressbutton == \'cancel\') {
							submitform( pressbutton );
							return;
						}';
		$script .= 'if(window.document.getElementById("subject").value.length < 2){alert(\''.JText::_('ENTER_SUBJECT',true).'\'); return false;}';
		$script .= $editor->jsCode();
		$script .= 'submitform( pressbutton );}';
		$script .= "function changeTemplate(newhtml,newtext,tempid){
			if(newhtml.length>2){".$editor->setContent('newhtml')."}
			var vartextarea =$('altbody'); if(newtext.length>2){vartextarea.setHTML(newtext);}
			var vartempid =$('tempid'); vartempid.value = tempid;
		}";
		$script .= "function insertTag(tag){ try{jInsertEditorText(tag,'editor_body'); return true;} catch(err){alert('Your editor does not enable AcyMailing to automatically insert the tag, please copy/paste it manually in your Newsletter'); return false;}}";
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js.$script );
		$toggleClass = acymailing::get('helper.toggle');
		$toggleClass->gtask = 'newsletter';
		$toggleClass->extra = '&listid='.JRequest::getInt('listid');
		$this->assignRef('lists',$lists);
		$this->assignRef('editor',$editor);
		$this->assignRef('mail',$mail);
		$this->assignRef('tabs',$tabs);
		$this->assignRef('values',$values);
		$this->assignRef('toggleClass',$toggleClass);
	}
	function preview(){
		$mailid = acymailing::getCID('mailid');
		$app =& JFactory::getApplication();
		$mailerHelper = acymailing::get('helper.mailer');
		$mail = $mailerHelper->load($mailid);
		$user =& JFactory::getUser();
		$userClass = acymailing::get('class.subscriber');
		$receiver = $userClass->get($user->email);
		$mail->sendHTML = true;
		$mailerHelper->dispatcher->trigger('acymailing_replaceusertagspreview',array(&$mail,&$receiver));
		if(!empty($mail->altbody)) $mail->altbody = $mailerHelper->textVersion($mail->altbody,false);
		$listmailClass = acymailing::get('class.listmail');
		$lists = $listmailClass->getReceivers($mail->mailid,true,false);
		$receiversClass = acymailing::get('type.testreceiver');
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName();
		$infos = null;
		$infos->receiver_type = $app->getUserStateFromRequest( $paramBase.".receiver_type", 'receiver_type', '','string' );
		$infos->test_html = $app->getUserStateFromRequest( $paramBase.".test_html", 'test_html', 1,'int' );
		$infos->test_email = $app->getUserStateFromRequest( $paramBase.".test_email", 'test_email', '','string' );
		$this->assignRef('lists',$lists);
		$this->assignRef('infos',$infos);
		$this->assignRef('receiverClass',$receiversClass);
		$this->assignRef('mail',$mail);
	}
}
