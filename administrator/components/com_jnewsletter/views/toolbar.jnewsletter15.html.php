<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class mosMenuBarCustom {
	function cancel( $alt='Cancel', $href='' ) {
		compa::showIcon('cancelT.png','back','cancel');
		compa::showIcon('cancelT.png','back','cancel',0);
		if ( $href ) {
   			$link = $href;
   		} else {
 			$link = 'javascript:window.history.back();';
		}
		?>
		<td>
  			<a class="toolbar" href="<?php echo $link; ?>" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('cancel','','<?php echo $image2; ?>',1);">
			<?php echo $image; ?>
			<?php echo $alt;?>
  		</a>
		</td>
		<?php
	}
}

 class menujNews {
	 function REGISTERED() {

		JToolBarHelper::custom('export', 'export.png', 'export.png', _ACA_MENU_EXPORT , false);
		JToolBarHelper::custom('import', 'import.png', 'import.png', _ACA_MENU_IMPORT , false);
		JToolBarHelper::divider();
		JToolBarHelper::customX('add', 'newT.png', 'newT.png', _ACA_MENU_NEW , false);
		JToolBarHelper::customX('edit', 'editT.png', 'editT.png', _ACA_MENU_EDIT , true);
		JToolBarHelper::divider();
		JToolBarHelper::customX('delete', 'deleteT.png', 'deleteT.png', _ACA_DELETE , true);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function SHOWSUBSCRIBER() {

		JToolBarHelper::custom('updateOneSub', 'saveT.png', 'saveT.png', _ACA_UPDATE , false);
		JToolBarHelper::custom('cancelSub', 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function NEWSUBSCRIBER() {
		//JToolBarHelper::save('doNew', _ACA_SAVE );
		JToolBarHelper::customX('doNew', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
		JToolBarHelper::custom('cancelSub', 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
	 }
	 function IMPORT() {
		JToolBarHelper::custom('doImport', 'import.png', 'import.png', _ACA_MENU_IMPORT , false);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function EXPORT() {
		JToolBarHelper::custom('doExport', 'export.png', 'export.png', _ACA_MENU_EXPORT , false);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function SHOW_LIST() {

		if (class_exists('pro'))
			JToolBarHelper::custom('forms','createformT.png','createformT.png', _ACA_FORM_BUTTON ,false);
		JToolBarHelper::custom('publish','publishT.png','publishT.png', _ACA_PUBLISHED ,true);
		JToolBarHelper::custom('unpublish','unpublishT.png','unpublishT.png', _ACA_UNPUBLISHED ,true);
		JToolBarHelper::divider();
		JToolBarHelper::customX('add', 'newT.png', 'newT.png', _ACA_MENU_NEW , false);
		JToolBarHelper::customX('edit', 'editT.png', 'editT.png', _ACA_MENU_EDIT , true);
		JToolBarHelper::custom( 'copy', 'copyT.png', 'copyT.png', _ACA_MENU_COPY , true);
		JToolBarHelper::divider();
		JToolBarHelper::custom( 'delete', 'deleteT.png', 'deleteT.png', _ACA_DELETE , true);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function EDIT_LIST($task) {

		JToolBarHelper::custom( 'update', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
		JToolBarHelper::custom( $task, 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function NEW_LIST($task) {
		JToolBarHelper::custom( 'doNew', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
		JToolBarHelper::custom( $task, 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function SHOW_MAILINGS() {
		JToolBarHelper::custom('unpublishMailing','publishT.png','publishT_f2.png', _ACA_UNPUBLISHED ,true);
		JToolBarHelper::custom('preview', 'previewT.png', 'previewT.png', _ACA_MENU_PREVIEW , true );
		$listype = 0;
		if (isset($_GET['listype'])){ $listype = $_GET['listype']; }
		elseif (isset($_POST['droplist'])){ $maliste = explode('-',$_POST['droplist']); $listype = $maliste[0];}
		elseif (isset($_POST['listid'])){
			$maliste = lists::getLists($_POST['listid'],0,null,'listnameA',false,false,false,false);
			$listype = $maliste[0]->list_type;
		}
		if ($listype==1) {
			JToolBarHelper::custom('sendNewsletter','message_sent.png','message_sent.png', _ACA_MENU_SEND ,true);
		}
		JToolBarHelper::divider();
		JToolBarHelper::customX('add', 'newT.png', 'newT.png', _ACA_MENU_NEW , false);
		JToolBarHelper::customX('edit', 'editT.png', 'editT.png', _ACA_MENU_EDIT , true);
		JToolBarHelper::divider();
		JToolBarHelper::custom( 'deleteMailing', 'deleteT.png', 'deleteT.png', _ACA_DELETE , true);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }
	 function NEWMAILING() {
//		$mailingID = JRequest::getInt('mailingid', '', 'request');
//		if (empty($mailingID) || $mailingID < 1) {
//			$doc =& JFactory::getDocument();
//		 	$css = 'span.icon-32-acatemplate {background-image:url('.ACA_PATH_ADMIN_IMAGES.'toolbar/templates.png)}';
//	        $doc->addStyleDeclaration($css, $type = 'text/css');
//			$toolbar = & JToolBar::getInstance('toolbar');
//			$toolbar->appendButton( 'Popup', 'acatemplate', _ACA_TEMPLATE, 'index3.php?option=com_jnewsletter&act=templates&task=template');
//			JToolBarHelper::divider();
//		}//endif
		JToolBarHelper::custom('savePreview', 'previewT.png', 'previewT.png', _ACA_MENU_PREVIEW , false);
		$listype = 0;
		if (isset($_GET['listype'])){ $listype = $_GET['listype']; }
		elseif (isset($_POST['droplist'])){ $maliste = explode('-',$_POST['droplist']); $listype = $maliste[0];}
		elseif (isset($_POST['listype'])){ $listype = $_POST['listype'];}
		elseif (isset($_GET['listid'])){
			$maliste = lists::getLists($_GET['listid'],0,null,'listnameA',false,false,false,false);
			$listype = $maliste[0]->list_type;
		}

		if ($listype==1) {
			JToolBarHelper::custom('saveSend','message_sent.png','message_sent.png', _ACA_MENU_SEND ,false);
		}
		JToolBarHelper::customX('save', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
		JToolBarHelper::custom('show', 'cancelT.png', 'cancelT.png', _ACA_MENU_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();

	 }
	 function PREVIEWMAILING($task) {

		JToolBarHelper::custom('preview', 'preview.png', 'preview.png', _ACA_MENU_SEND_TEST , false);
		JToolBarHelper::spacer();
		JToolBarHelper::custom('show', 'cancelT.png', 'cancelT.png', _ACA_MENU_CANCEL , false);
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }

	 function QUEUE_MENU(){
	 	if(class_exists('queueHTML')){
			if (class_exists('auto')) $flag = auto::viewCron(); else $flag = false;
			if ($flag) {
				JToolBarHelper::custom('pqueue','process-queue.png','process-queue.png', _ACA_MENU_SEND_QUEUE ,false);
				JToolBarHelper::spacer();
			}
			if ( class_exists('autonews') ) {
				JToolBarHelper::custom('resetsn','reset.png','reset.png', _ACA_RESET_SN ,false);
				JToolBarHelper::spacer();
			}
			JToolBarHelper::divider();
			JToolBarHelper::customX('delq', 'deleteT.png', 'deleteT.png', _ACA_DELETE , false);
			JToolBarHelper::custom('cleanq', 'clean-queue.png','clean-queue.png', _ACA_EMPTY_Q ,false);
			JToolBarHelper::divider();
			menujNews::_acaBack();
			menujNews::_acaCpanel();
			menujNews::_acaWizard();
	 	}
	 }

	 function TEMPLATES_MENU(){
	 	if(class_exists('templatesHTML')){

	 		JToolBarHelper::custom('publish','publishT.png','unpublishT.png', _ACA_PUBLISHED ,true);
			JToolBarHelper::custom('unpublish','unpublishT.png','unpublishT.png', _ACA_UNPUBLISHED ,true);
			JToolBarHelper::makedefault('default', 'Default');
			JToolBarHelper::divider();
			JToolBarHelper::customX('add', 'newT.png', 'newT.png', _ACA_MENU_NEW , false);
			JToolBarHelper::customX('edit', 'editT.png', 'editT.png', _ACA_MENU_EDIT , true);
			JToolBarHelper::custom( 'copy', 'copyT.png', 'copyT.png', _ACA_MENU_COPY , true);
			JToolBarHelper::divider();
			JToolBarHelper::customX('delete', 'deleteT.png', 'deleteT.png', _ACA_DELETE , true);
			JToolBarHelper::spacer();
			menujNews::_acaBack();
			JToolBarHelper::divider();
			menujNews::_acaCpanel();
			menujNews::_acaWizard();
	 	}
	 }
	 function NEWTEMPLATE(){
	 	if(class_exists('templatesHTML')){

			$html = '<a class="modal" href="index3.php?option=com_jnewsletter&act=templates&task=tempupload"> <img src="'. ACA_PATH_ADMIN_IMAGES .'toolbar'.DS.'export.png"> <br/><center>'._ACA_FILES_UPLOAD.'</center> </a>';
			$toolbar = & JToolBar::getInstance('toolbar');
			$toolbar->appendButton( 'Custom', $html );
	 		JToolBarHelper::divider();
	 		JToolBarHelper::customX('apply', 'applyT.png', 'applyT.png', _ACA_MENU_APPLY , false);
			JToolBarHelper::customX('save', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
			JToolBarHelper::divider();
			JToolBarHelper::custom('cancel', 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
			JToolBarHelper::divider();
			menujNews::_acaCpanel();
	 	}
	 }
	  function EDITTEMPLATE(){
	 	if(class_exists('templatesHTML')){

	 		$script = 'function getTemplate(){
	 					var form = form = document.adminForm;
							template_id = form.template_id.value;

	 		}';

			$doc =& JFactory::getDocument();
			$doc->addScriptDeclaration( $script);
			$template_id = JRequest::getVar('template_id');
	 		menujNews::_acaBack();
			JToolBarHelper::divider();
	 		JToolBarHelper::customX('apply', 'applyT.png', 'applyT.png', _ACA_MENU_APPLY , false);
	 		JToolBarHelper::customX('save', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
			JToolBarHelper::divider();
			JToolBarHelper::custom('cancel', 'cancelT.png', 'cancelT.png', _ACA_CANCEL , false);
			JToolBarHelper::divider();
			menujNews::_acaCpanel();
	 	}
	 }

	 function CONFIGURATION()
	 {
	 	//check if acajoom datas are already transferred to jnews tables
	 	// this button will trigger the update/importing of acajoom datas to jnews
	 	if( !wupdate::checkAcaUpdate() )
	 	{
	 		$database =& JFactory::getDBO();
	 		$queryshow= "SHOW TABLES LIKE '%acajoom%'";
			$database->setQuery($queryshow);
			$resultAcajoom= $database->loadResultArray();
			if (!empty($resultAcajoom)) {
		 		JToolBarHelper::custom('acaupdate', 'import.png', 'import.png', _ACA_INSTALL_ACAUPDATEBTN, false);
		 		JToolBarHelper::divider();
			}
	 	} //endif

		if (class_exists('aca_archive') ) {
			JToolBarHelper::custom('archiveAll', 'archiveT.png', 'archiveT.png', _ACA_MENU_ARCHIVE_ALL, false);
			JToolBarHelper::spacer();
		}

		if ( $GLOBALS[ACA.'type'] =='PLUS' OR $GLOBALS[ACA.'type']=='PRO' ) {
			JToolBarHelper::custom('syncUsers','subscribers.png','subscribers.png', _ACA_MENU_SYNC_USERS ,false);
			JToolBarHelper::divider();
		}

		JToolBarHelper::customX('save', 'saveT.png', 'saveT.png', _ACA_SAVE , false);
		JToolBarHelper::customX('apply', 'applyT.png', 'applyT.png', _ACA_MENU_APPLY , false);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }

	 function CANCEL_ONLY($task) {
	 	$html = '<a href=\'javascript:history.go(-1)\'> <img src="'. ACA_PATH_ADMIN_IMAGES .'toolbar'.DS.'cancelT.png"> <br/><center>'._ACA_MENU_CANCEL.'</center> </a>';
		$toolbar = & JToolBar::getInstance('toolbar');
		$toolbar->appendButton( 'Custom', $html );
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }

	 function STATISTICS() {
		JToolBarHelper::custom('refresh', 'refreshT.png', 'refreshT.png', _ACA_MENU_REFRESH_STATS, false);
		JToolBarHelper::custom('generate', 'generate.png', 'generate.png', _ACA_MENU_GENERATE_STATS, false);
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
		menujNews::_acaWizard();
	 }


	 function UPDATE() {
	 	menujNews::_acaBack();
		menujNews::_acaCpanel();
	 }

	 function DOUPDATE() {
	 	menujNews::_acaBack();
		menujNews::_acaCpanel();
	 }

	 function ABOUT() {
		menujNews::_acaBack();
		JToolBarHelper::divider();
		menujNews::_acaCpanel();
	 }

	/*
	 * <p>Function to create the wizard menu<p>
	 * @author ijinfx
	 * @return boolean
	 */
	 function _acaWizard(){
	 	if (!($GLOBALS[ACA.'show_guide'])) return false;

	 		$doc =& JFactory::getDocument();
         	$doc->addScript(ACA_PATH_ADMIN_INCLUDES.'switchcontent.js');
         	$url = '#';
			$html = '<a class="toolbar" href="'.$url.'" onclick="toggleWizard();return false;" id="acaWizard-title" >';
			$html .= '<div id="acawizard-title" >';
			$html .= '<span title="'._ACA_WIZARD.'" class="icon-32-wizard">';
			$html .= '</span>';
			$html .= _ACA_WIZARD;
			$html .= '</div>';
			$html .= '</a>';
	 		$toolbar = & JToolBar::getInstance('toolbar');
			$toolbar->appendButton( 'Custom', $html, 'acaWizard');
	 	return true;
	 }

	 /*
	  * <p>Function to create the custom back menu</p>
	  * @author ijinfx <gerald@ijoobi.com>
	  * @return boolean
	  */
	  function _acaBack(){
	  	$html = '<a href=\'javascript:history.go(-1)\'> <img src="'. ACA_PATH_ADMIN_IMAGES .'toolbar'.DS.'backT.png"> <br/><center>'._ACA_MENU_BACK.'</center> </a>';
		$toolbar = & JToolBar::getInstance('toolbar');
		$toolbar->appendButton( 'Custom', $html );
		return true;
	  }//endfct

	  /*
	  * <p>Function to create the custom cpanel menu</p>
	  * @author ijinfx <gerald@ijoobi.com>
	  * @return boolean
	  */
	  function _acaCpanel(){
	  	$link =
	  	$html = '<a href=\'index.php?option=com_jnewsletter\'> <img src="'. ACA_PATH_ADMIN_IMAGES .'toolbar'.DS.'cpanelT.png"> <br/><center>'._ACA_MENU_CPANEL.'</center> </a>';
		$toolbar = & JToolBar::getInstance('toolbar');
		$toolbar->appendButton( 'Custom', $html );
		return true;
	  }//endfct


 }

