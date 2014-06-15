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
	var $icon = 'newsletter';
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function listing(){
		$app =& JFactory::getApplication();
		$pageInfo = null;
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName();
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.mailid','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$selectedList = $app->getUserStateFromRequest( $paramBase."filter_list",'filter_list',0,'int');
		$selectedCreator = $app->getUserStateFromRequest( $paramBase."filter_creator",'filter_creator',0,'int');
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		$database	=& JFactory::getDBO();
		$searchMap = array('a.mailid','a.subject','a.fromname','a.fromemail','a.replyname','a.replyemail','a.userid','b.name','b.username','b.email');
		$filters = array();
		if(!empty($pageInfo->search)){
			$searchVal = '\'%'.$database->getEscaped($pageInfo->search,true).'%\'';
			$filters[] = implode(" LIKE $searchVal OR ",$searchMap)." LIKE $searchVal";
		}
		$filters[] = 'a.type = \''.$this->type.'\'';
		if(!empty($selectedList)) $filters[] = 'c.listid = '.$selectedList;
		if(!empty($selectedCreator)) $filters[] = 'a.userid = '.$selectedCreator;
		$selection = array_merge($searchMap,array('a.created','a.frequency','a.senddate','a.published','a.type','a.visible'));
		if(empty($selectedList)){
			$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$selection).' FROM '.acymailing::table('mail').' as a';
		}else{
			$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$selection).' FROM '.acymailing::table('listmail').' as c';
			$query .= ' LEFT JOIN '.acymailing::table('mail').' as a on a.mailid = c.mailid ';
		}
		$query.= ' LEFT JOIN '.acymailing::table('users',false).' as b on a.userid = b.id ';
		$query.= ' WHERE ('.implode(') AND (',$filters).')';
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$database->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $database->loadObjectList();
		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$database->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $database->loadResult();
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
		acymailing::setTitle(JText::_($this->nameListing),$this->icon,$this->gtask);
		$bar = & JToolBar::getInstance('toolbar');
		$buttonPreview = JText::_('PREVIEW');
		if($this->type == 'autonews'){
			JToolBarHelper::custom('generate', 'process', '',JText::_('GENERATE'),false);
		}elseif($this->type == 'news'){
			$buttonPreview.=' / '.JText::_('SEND');
		}
		JToolBarHelper::custom('preview', 'preview', '',$buttonPreview);
		JToolBarHelper::divider();
		JToolBarHelper::addNew();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList(JText::_('VALIDDELETEITEMS'));
		JToolBarHelper::spacer();
		JToolBarHelper::custom( 'copy', 'copy.png', 'copy.png', JText::_('COPY') );
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp',$this->gtask.'-listing');
		$bar->appendButton( 'Link', 'acymailing', JText::_('JOOMEXT_CPANEL'), acymailing::completeLink('dashboard') );
		$filters = null;
		$listmailType = acymailing::get('type.listsmail');
		$listmailType->type = $this->type;
		$mailcreatorType = acymailing::get('type.mailcreator');
		$mailcreatorType->type = $this->type;
		$filters->list = $listmailType->display('filter_list',$selectedList);
		$filters->creator = $mailcreatorType->display('filter_creator',$selectedCreator);
		$toggleClass = acymailing::get('helper.toggle');
		$this->assignRef('filters',$filters);
		$this->assignRef('toggleClass',$toggleClass);
		$this->assignRef('rows',$rows);
		$this->assignRef('pageInfo',$pageInfo);
		$this->assignRef('pagination',$pagination);
		$this->assignRef('delay',acymailing::get('type.delaydisp'));
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
				$mail->body = acymailing::absoluteURL($myTemplate->body);
				$mail->altbody = $myTemplate->altbody;
				$mail->tempid = $myTemplate->tempid;
			}
			if($this->type == 'autonews'){
				$mail->frequency = 604800;
			}
		}
		if(JRequest::getVar('task','') == 'replacetags'){
			$mailerHelper = acymailing::get('helper.mailer');
			JPluginHelper::importPlugin('acymailing');
			$dispatcher = &JDispatcher::getInstance();
			$dispatcher->trigger('acymailing_replacetags',array(&$mail));
			if(!empty($mail->altbody)) $mail->altbody = $mailerHelper->textVersion($mail->altbody,false);
		}
		$extraInfos = '';
		$values = null;
		if($this->type == 'followup'){
			$campaignid = JRequest::getInt('campaign',0);
			$extraInfos .= '&campaign='.$campaignid;
			$values->delay = acymailing::get('type.delay');
			$this->assignRef('campaignid',$campaignid);
		}else{
			$listmailClass = acymailing::get('class.listmail');
			$lists = $listmailClass->getLists($mailid);
		}
		acymailing::setTitle(JText::_($this->nameForm),$this->icon,$this->gtask.'&task=edit&mailid='.$mailid.$extraInfos);

		$bar = & JToolBar::getInstance('toolbar');
		if(empty($mail->mailid)){
			$bar->appendButton( 'Popup', 'acytemplate', JText::_('TEMPLATE'), acymailing::completeLink("template&task=theme",true ));
		}
		$bar->appendButton( 'Popup', 'tag', JText::_('TAGS'), acymailing::completeLink("tag&task=tag&type=".$this->type,true ),750,550);
		if(in_array($this->type,array('news','followup'))){
			JToolBarHelper::custom('replacetags', 'replacetag', '',JText::_('REPLACE_TAGS'), false);
		}
		$buttonPreview = JText::_('PREVIEW');
		if($this->type=='news'){
			$buttonPreview .= ' / '.JText::_('SEND');
		}
		JToolBarHelper::divider();
		JToolBarHelper::custom('savepreview', 'preview', '',$buttonPreview, false);
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp',$this->gtask.'-form');
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
		$script .= 'submitform( pressbutton );}
		';
		$script .= "function changeTemplate(newhtml,newtext,tempid){
			if(newhtml.length>2){".$editor->setContent('newhtml')."}
			var vartextarea =$('altbody'); if(newtext.length>2){vartextarea.setHTML(newtext);}
			var vartempid =$('tempid'); vartempid.value = tempid;
		}
		";
		$script .= "function insertTag(tag){ try{jInsertEditorText(tag,'editor_body'); return true;} catch(err){alert('Your editor does not enable AcyMailing to automatically insert the tag, please copy/paste it manually in your Newsletter'); return false;}}";
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js.$script );
		if($this->type == 'autonews'){
			JHTML::_('behavior.modal');
			$this->assignRef('delay',acymailing::get('type.delay'));
			$this->assignRef('generatingMode',acymailing::get('type.generatemode'));
			$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=notification_autonews';
			$values->editnotification = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('EDIT_NOTIFICATION_MAIL').'</button></a>';
		}
		$this->assignRef('toggleClass',$toggleClass);
		$this->assignRef('lists',$lists);
		$this->assignRef('editor',$editor);
		$this->assignRef('mail',$mail);
		$this->assignRef('tabs',$tabs);
		$this->assignRef('values',$values);
	}
	function preview(){
		$app =& JFactory::getApplication();
		$mailid = acymailing::getCID('mailid');
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
		acymailing::setTitle(JText::_('PREVIEW').' : '.$mail->subject,$this->icon,$this->gtask.'&task=preview&mailid='.$mailid);
		$bar = & JToolBar::getInstance('toolbar');
		if($this->type == 'news'){
			if(acymailing::level(1)){
				if($mail->published == 2){
					JToolBarHelper::custom('unschedule', 'unschedule', '',JText::_('UNSCHEDULE'), false);
				}else{
					$bar->appendButton( 'Popsched', acymailing::completeLink("send&task=scheduleready&mailid=".$mailid,true ));
				}
			}
			$bar->appendButton( 'Popup', 'send', JText::_('SEND'), acymailing::completeLink("send&task=sendready&mailid=".$mailid,true ));
			JToolBarHelper::divider();
		}
		JToolBarHelper::custom(JText::_('EDIT'), 'edit', '',JText::_('EDIT'), false);
		JToolBarHelper::cancel();
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp',$this->gtask.'-preview');
		$this->assignRef('lists',$lists);
		$this->assignRef('infos',$infos);
		$this->assignRef('receiverClass',$receiversClass);
		$this->assignRef('mail',$mail);
	}
}
