<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class ConfigViewConfig extends JView
{
	function display($tpl = null)
	{
		JHTML::_('behavior.modal');
		$config = acymailing::config();
		acymailing::setTitle(JText::_('CONFIGURATION'),'config','config');
		if(acymailing::level(3)){
			JToolBarHelper::custom('bounce', 'send', '',JText::_('BOUNCE_TEST'), false);
		}
		JToolBarHelper::custom('test', 'send', '',JText::_('SEND_TEST'), false);
		JToolBarHelper::divider();
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel('cancel',JText::_('CLOSE'));
		JToolBarHelper::divider();
		$bar = & JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Pophelp','config');
		$bar->appendButton( 'Link', 'acymailing', JText::_('JOOMEXT_CPANEL'), acymailing::completeLink('dashboard') );
		$elements = null;
		$elements->add_names = JHTML::_('select.booleanlist', "config[add_names]" , '',$config->get('add_names',true) );
		$elements->embed_images = JHTML::_('select.booleanlist', "config[embed_images]" , '',$config->get('embed_images',0) );
		$elements->embed_files = JHTML::_('select.booleanlist', "config[embed_files]" , '',$config->get('embed_files',1) );
		$elements->multiple_part = JHTML::_('select.booleanlist', "config[multiple_part]" , '',$config->get('multiple_part',0) );
		$mailerMethod = acymailing::get('type.mailermethod');
		$elements->mailer_method = $mailerMethod->display("config[mailer_method]",$config->get('mailer_method','phpmail'));
		$encoding = acymailing::get('type.encoding');
		$elements->encoding_format = $encoding->display("config[encoding_format]",$config->get('encoding_format','base64'));
		$charset = acymailing::get('type.charset');
		$elements->charset = $charset->display("config[charset]",$config->get('charset','UTF-8'));
		$secured = acymailing::get('type.secured');
		$elements->smtp_secured = $secured->display("config[smtp_secured]",$config->get('smtp_secured'));
		$elements->smtp_auth = JHTML::_('select.booleanlist', "config[smtp_auth]" , '',$config->get('smtp_auth',0) );
		$elements->smtp_keepalive = JHTML::_('select.booleanlist', "config[smtp_keepalive]" , '',$config->get('smtp_keepalive',1) );
		$queueType = acymailing::get('type.queuetype');
		$elements->queue_type = $queueType->display("config[queue_type]",$config->get('queue_type','auto'));
		$elements->allow_visitor = JHTML::_('select.booleanlist', "config[allow_visitor]" , '',$config->get('allow_visitor',1) );
		$editorType = acymailing::get('type.editor');
		$elements->editor = $editorType->display('config[editor]',$config->get('editor'));
		$elements->subscription_message = JHTML::_('select.booleanlist', "config[subscription_message]" , '',$config->get('subscription_message',1) );
		$elements->confirmation_message = JHTML::_('select.booleanlist', "config[confirmation_message]" , '',$config->get('confirmation_message',1) );
		$elements->welcome_message = JHTML::_('select.booleanlist', "config[welcome_message]" , '',$config->get('welcome_message',1) );
		$elements->unsub_message = JHTML::_('select.booleanlist', "config[unsub_message]" , '',$config->get('unsub_message',1) );
		if(acymailing::level(1)){
			$elements->show_footer = JHTML::_('select.booleanlist', "config[show_footer]" , '',$config->get('show_footer',1) );
			$elements->forward = JHTML::_('select.booleanlist', "config[forward]" , '',$config->get('forward',false) );
		}else{
			$elements->show_footer = '<small style="color:red">'.JText::_('ONLY_FROM_ESSENTIAL').'</small>';
			$elements->forward = '<small style="color:red">'.JText::_('ONLY_FROM_ESSENTIAL').'</small>';
		}
		$cssFiles = acymailing::get('type.css');
		$cssFiles->type = 'component';
		$elements->css_frontend = $cssFiles->display('config[css_frontend]',$config->get('css_frontend','default'));
		$cssFiles->type = 'module';
		$elements->css_module = $cssFiles->display('config[css_module]',$config->get('css_module','default'));
		$cssFiles->type = 'component';
		$elements->css_backend = $cssFiles->display('config[css_backend]',$config->get('css_backend','default'));
		$elements->use_sef = JHTML::_('select.booleanlist', "config[use_sef]" , '',$config->get('use_sef',0) );
		$menuType = acymailing::get('type.menus');
		$elements->acymailing_menu = $menuType->display('config[itemid]',$config->get('itemid'));
		if(acymailing::level(1)){
			$cronTypeReport = acymailing::get('type.cronreport');
			$elements->cron_sendreport = $cronTypeReport->display('config[cron_sendreport]',$config->get('cron_sendreport',2));
			$cronTypeReportSave = acymailing::get('type.cronreportsave');
			$elements->cron_savereport = $cronTypeReportSave->display('config[cron_savereport]',$config->get('cron_savereport',0));
			$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=config&amp;task=cleanreport';
			$elements->deleteReport = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 400, y: 100}}"><button onclick="return false">'.JText::_('REPORT_DELETE').'</button></a>';
			$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=config&amp;task=seereport';
			$elements->seeReport = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('REPORT_SEE').'</button></a>';
			$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=report';
			$elements->editReportEmail = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('REPORT_EDIT').'</button></a>';
			$delayType = acymailing::get('type.delay');
			$elements->cron_frequency = $delayType->display('config[cron_frequency]',$config->get('cron_frequency',0),0);
			$elements->cron_url = ACYMAILING_LIVE.'index2.php?option=com_acymailing&gtask=cron';
			$item = $config->get('itemid');
			if(!empty($item)) $elements->cron_url.= '&Itemid='.$item;
			$informations = null;
			$informations->version = $config->get('version');
			$informations->level = $config->get('level');
			$informations->website = ACYMAILING_LIVE;
			$informations->component = 'acymailing';
			$informations->cronurl = $elements->cron_url;
			$infos = urlencode(base64_encode(serialize($informations)));
			$urlCron = 'http://www.acyba.com/index.php?option=com_doc&gtask=launcher&task=edit&infos='.$infos;
			$elements->cron_edit = '<a class="modal" href="'.$urlCron.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('CREATE_CRON').'</button></a>';
		}
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=confirmation';
		$elements->editConfEmail = '<a class="modal" id="confirmemail"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('EDIT_CONF_MAIL').'</button></a>';
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=notification_created';
		$elements->edit_notification_created = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('EDIT_NOTIFICATION_MAIL').'</button></a>';
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=notification_refuse';
		$elements->edit_notification_refuse = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('EDIT_NOTIFICATION_MAIL').'</button></a>';
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=email&amp;task=edit&amp;mailid=notification_unsuball';
		$elements->edit_notification_unsuball = '<a class="modal" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('EDIT_NOTIFICATION_MAIL').'</button></a>';
		if(acymailing::level(3)){
			$elements->bounce = JHTML::_('select.booleanlist', "config[bounce]" , '',$config->get('bounce',0) );
			$connectionType = acymailing::get('type.connection');
			$elements->bounce_connection = $connectionType->display('config[bounce_connection]',$config->get('bounce_connection','imap'));
			$elements->bounce_secured = $secured->display("config[bounce_secured]",$config->get('bounce_secured'));
			$elements->bounce_certif = JHTML::_('select.booleanlist', "config[bounce_certif]" , '',$config->get('bounce_certif',0) );
			$this->assignRef('bounceaction',acymailing::get('type.bounceaction'));
			$this->assignRef('emailaction',acymailing::get('type.emailaction'));
		}
		jimport('joomla.filesystem.folder');
		$path = JLanguage::getLanguagePath(JPATH_ROOT);
		$dirs = JFolder::folders( $path );
		foreach ($dirs as $dir)
		{
			$xmlFiles = JFolder::files( $path.DS.$dir, '^([-_A-Za-z]*)\.xml$' );
			$xmlFile = reset($xmlFiles);
			if(empty($xmlFile)) continue;
			$data = JApplicationHelper::parseXMLLangMetaFile($path.DS.$dir.DS.$xmlFile);
			$oneLanguage = null;
			$oneLanguage->language 	= $dir;
			$oneLanguage->name = $data['name'];
			$languageFiles = JFolder::files( $path.DS.$dir, '^(.*)\.com_acymailing\.ini$' );
			$languageFile = reset($languageFiles);
			if(!empty($languageFile)){
				$linkEdit = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=file&amp;task=language&amp;code='.$oneLanguage->language;
				$oneLanguage->edit = '<a class="modal" title="'.JText::_('EDIT_LANGUAGE_FILE',true).'"  href="'.$linkEdit.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><img id="image'.$oneLanguage->language.'" src="../images/M_images/edit.png" alt="'.JText::_('EDIT_LANGUAGE_FILE',true).'"/></a>';
			}else{
				$linkEdit = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=file&amp;task=language&amp;code='.$oneLanguage->language;
				$oneLanguage->edit = '<a class="modal" title="'.JText::_('ADD_LANGUAGE_FILE',true).'"  href="'.$linkEdit.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><img id="image'.$oneLanguage->language.'" src="../images/M_images/new.png" alt="'.JText::_('ADD_LANGUAGE_FILE',true).'"/></a>';
			}
			$languages[] = $oneLanguage;
		}
		$js = "function updateConfirmation(newvalue){";
		$js .= "if(newvalue == 0) {window.document.getElementById('confirmemail').style.display = 'none'; window.document.getElementById('confirm_redirect').disabled = true;}else{window.document.getElementById('confirmemail').style.display = 'inline'; window.document.getElementById('confirm_redirect').disabled = false;}";
		$js .= '}';
		$js .='window.addEvent(\'load\', function(){ updateConfirmation('.$config->get('require_confirmation',0).'); });';
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
		$elements->require_confirmation = JHTML::_('select.booleanlist', "config[require_confirmation]" , 'onclick="updateConfirmation(this.value)"',$config->get('require_confirmation',0) );
		$delayType2 = acymailing::get('type.delay');
		$elements->queue_delay = $delayType2->display('config[queue_delay]',$config->get('queue_delay',0),2);
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT name,published,id FROM '.acymailing::table('plugins',false).' WHERE `folder` = \'acymailing\' ORDER BY published DESC, ordering ASC');
		$plugins = $db->loadObjectList();
		$db->setQuery('SELECT name,published,id FROM '.acymailing::table('plugins',false).' WHERE `folder` != \'acymailing\' AND `name` LIKE \'%acymailing%\' ORDER BY published DESC, ordering ASC');
		$integrationplugins = $db->loadObjectList();
		$this->assignRef('config',$config);
		$this->assignRef('languages',$languages);
		$this->assignRef('elements',$elements);
		$this->assignRef('plugins',$plugins);
		$this->assignRef('integrationplugins',$integrationplugins);
		$toggleClass = acymailing::get('helper.toggle');
		jimport('joomla.html.pane');
		$tabs	=& JPane::getInstance('tabs');
		$this->assignRef('tabs',$tabs);
		$this->assignRef('toggleClass',$toggleClass);
		return parent::display($tpl);
	}
}
