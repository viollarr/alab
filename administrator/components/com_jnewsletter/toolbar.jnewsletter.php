<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

if ( ACA_CMSTYPE ) {
	require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
	$doc =& JFactory::getDocument();
	$path = ACA_PATH_ADMIN_IMAGES.'toolbar/';
	$css  = ".icon-32-tool { background-image: url( ".$path ."cpanelT.png ); }";
	$css  .= ".icon-32-upload { background-image: url( ".$path ."export.png); }";
	$css  .= ".icon-32-refreshT { background-image: url( ".$path ."refreshT.png ); }";
	$css  .= ".icon-32-forward { background-image: url( ".$path ."message_sent.png ); }";
	$css  .= ".icon-32-addusers { background-image: url( ".$path ."subscribers.png ); }";
	$css  .= ".icon-32-subscribers 	{ background-image: url( ".$path ."subscribers.png ); }";
	$css  .= ".icon-32-export { background-image:url(".$path ."export.png)}";
	$css  .= ".icon-32-import { background-image:url(".$path ."import.png)}";
	$css  .= ".icon-32-createformT { background-image:url(".$path ."createformT.png)}";
	$css  .= ".icon-32-publishT { background-image:url(".$path ."publishT.png)}";
	$css  .= ".icon-32-unpublishT { background-image:url(".$path ."unpublishT.png)}";
	$css  .= ".icon-32-copyT { background-image:url(".$path ."copyT.png)}";
	$css  .= ".icon-32-newT { background-image:url(".$path ."newT.png)}";
	$css  .= ".icon-32-deleteT { background-image:url(".$path ."deleteT.png)}";
	$css  .= ".icon-32-editT { background-image:url(".$path ."editT.png)}";
	$css  .= ".icon-32-copyT { background-image:url(".$path ."copyT.png)}";
	$css  .= ".icon-32-backT { background-image:url(".$path ."backT.png)}";
	$css  .= ".icon-32-cancelT { background-image:url(".$path ."cancelT.png)}";
	$css  .= ".icon-32-saveT { background-image:url(".$path ."saveT.png)}";
	$css  .= ".icon-32-process-queue { background-image:url(".$path ."process-queue.png)}";
	$css  .= ".icon-32-clean-queue { background-image:url(".$path ."clean-queue.png)}";
	$css  .= ".icon-32-message_sent { background-image:url(".$path ."message_sent.png)}";
	$css  .= ".icon-32-applyT { background-image:url(".$path ."applyT.png)}";
	$css  .= ".icon-32-archiveT { background-image:url(".$path ."archiveT.png)}";
	$css  .= ".icon-32-cpanelT { background-image:url(".$path ."cpanelT.png)}";
	$css  .= ".icon-32-previewT { background-image:url(".$path ."previewT.png)}";
	$css  .= ".icon-32-generate { background-image:url(".$path ."generate.png)}";
	$css  .= ".icon-32-reset { background-image:url(".$path ."reset.png)}";
	$css  .= ".icon-32-wizard { background-image:url(".$path ."wizard.png)}";
	$css  .= ".icon-32-defaultT { background-image:url(".$path ."defaultT.png)}";
	$doc->addStyleDeclaration($css);
}

if ( ACA_CMSTYPE ) {	// joomla 15
	$listId = JRequest::getInt('listid', 0, 'request');
	$listType = JRequest::getInt('listype', 0, 'request');
	$action = JRequest::getString('act', '', 'request');
	$task = JRequest::getString('task', '', 'request');

	if ( !isset($GLOBALS[ACA . 'titlteHeader']) ) $GLOBALS[ACA . 'titlteHeader'] = '';
	if ( !isset($GLOBALS[ACA . 'titlteImg']) ) $GLOBALS[ACA . 'titlteImg'] = '';
	JToolBarHelper::title( $GLOBALS[ACA . 'titlteHeader'] , $GLOBALS[ACA . 'titlteImg'] );
}//endif


 switch ($action) {
	 case ('subscribers') :

	 	switch ($task) {
			case ('import') :
				menujNews::IMPORT();
				break;
			case ('export') :
				menujNews::EXPORT();
				break;
			case ('new') :
			case ('add') :
				menujNews::NEWSUBSCRIBER();
				break;
			case ('show') :
				menujNews::SHOWSUBSCRIBER();
				break;
			case ('doExport') :
			case ('cpanel') :

				break;
			default :
				menujNews::REGISTERED();
				break;
	 	}
	 	break;
	 case ('list') :

	 	switch ($task) {
			case ('new') :
			case ('add') :
				menujNews::NEW_LIST('');
				break;
			case ('edit') :
				menujNews::EDIT_LIST('');
				break;
			case ('cpanel') :

				break;
			default:
				menujNews::SHOW_LIST();
				break;
	 	}
	 	break;

	 case ('mailing') :

	 	switch ($task) {
			case ('edit') :
				menujNews::NEWMAILING();
				break;
			case ('preview') :
				menujNews::PREVIEWMAILING('show');
				break;
			case ('savePreview') :
				menujNews::PREVIEWMAILING('show');
				break;
			case ('view') :
				menujNews::CANCEL_ONLY('show');
				break;
			case ('publish') :
				menujNews::CANCEL_ONLY('');
				break;
			case ('cpanel') :

				break;
			case ('show') :
			default :
				menujNews::SHOW_MAILINGS();
				break;
	 	}
	 	break;
	 case ('configuration') :

	 	switch ($task) {
			case ('save') :
			case ('cpanel') :

				break;
			default :
				menujNews::CONFIGURATION();
				break;
	 	}
	 	break;
	 case ('statistics') :

	 	switch ($task) {
			case ('edit') :
				menujNews::CANCEL_ONLY('cancel');
				break;
			case ('cpanel') :

				break;
			default :
				menujNews::STATISTICS();
				break;
	 	}
	 	break;

	case('queue'):

	 	switch ($task) {
			case ('pqueue') :
				menujNews::QUEUE_MENU('pqueue');
				break;
			case ('resetsn') :
				menujNews::QUEUE_MENU('resetsn');
				break;
			case ('delq') :
				menujNews::QUEUE_MENU('delq');
				break;
			case ('cleanq') :
				menujNews::QUEUE_MENU('cleanq');
				break;

			case ('cpanel') :

				break;
			default :

				menujNews::QUEUE_MENU();

				break;
	 	}
	 	break;

	 	case('templates'):
	 	switch ($task) {
	 		case ('new') :
			case ('add') :
				menujNews::NEWTEMPLATE('');
				break;
			case ('edit') :
				menujNews::EDITTEMPLATE('');
				break;
			case ('cpanel') :

				break;

			default :
				menujNews::TEMPLATES_MENU();
				break;
	 	}
	 	break;

	 case ('update') :

	 	switch ($task) {
			case ('doUpdate'):
			case ('version'):
			case ('new1'):
			case ('new2'):
			case ('new3'):
				menujNews::CANCEL_ONLY('show');
				break;
			case ('cpanel') :

				break;
			case ('complete') :
				menujNews::DOUPDATE();
				break;
			case ('show') :
			default :
				menujNews::UPDATE();
				break;
	 	}
	 	break;
	 case ('about') :

	 	switch ($task) {
			case ('cpanel') :

				break;
			default :
				menujNews::ABOUT();
				break;
	 	}
	 	break;
	 default :
	 	break;
 }
