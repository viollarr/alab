<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/**
* <p>queue controller</p>
* <p>This function is the controller to view the queue view</p>
* @author Joobi Limited <wwww.ijoobi.com>
*/
function queue( $action, $task, $listid, $mailingid, $lists, $cid) {

	if ( ACA_CMSTYPE ) {	// joomla 15
		$database =& JFactory::getDBO();
		$my	=& JFactory::getUser();
		$start = intval(JRequest::getVar('start', 0));
		$css = '.icon-48-queue { background-image:url('.ACA_PATH_ADMIN_IMAGES .'header/queue.png)}';
		$doc =& JFactory::getDocument();
		$doc->addStyleDeclaration($css, $type = 'text/css');
		$img = 'queue.png';

	}//endif

	$message ='' ;
	$xf = new xonfig();
	$erro = new xerr( __FILE__ , __FUNCTION__ );
	$erro->show();
	$conf	=& JFactory::getConfig();
	$mail->Mailer 	= $conf->getValue('config.mailer');
	$mailingsearch = JRequest::getVar('mailingsearch', '');
	$start = intval(JRequest::getVar('start', 0));
	$limit = intval(JRequest::getVar('limit', $conf->getValue('config.list_limit')));
	?>

	<script language="javascript" type="text/javascript">
			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'cpanel') {
					form.action = 'index.php?option=com_jnewsletter&act=queue&task=cpanel';
				}else if (pressbutton == 'resetsn') {
					var $ok = confirm('Are you sure you want to reset Smart-Newsletters?');
					if ( $ok == true ){
						form.action = 'index.php?option=com_jnewsletter&act=queue&task=resetsn';
					}else{
						return;
					}
				}else if (pressbutton == 'pqueue') {
					var $ok = confirm('Are you sure you want to process queue?');
					if ( $ok == true ){
						form.action = 'index.php?option=com_jnewsletter&act=queue&task=pqueue';
					}else{
						return;
					}
				}else if (pressbutton == 'delq') {
					var $ok = confirm('Are you sure you want to delete?');
					if ( $ok == true ){
						form.action = 'index.php?option=com_jnewsletter&act=queue&task=delq';
					}else{
						return;
					}
				}else if (pressbutton == 'cleanq') {
					var $ok = confirm('Are you sure you want to clear the queue?');
					if ( $ok == true ){
						form.action = 'index.php?option=com_jnewsletter&act=queue&task=cleanq';
					}else{
						return;
					}
				}
				submitform( pressbutton );
			}
			</script>
	<?php
	$message = JRequest::getVar('message', '' );
	$showqueue = true;

	switch ($task) {
		case ('pqueue') :
				if (class_exists('auto')){
					$message= jnewsletter::printYN( auto::processQueue( true, true ) , 'Queue processed' , _ACA_ERROR);
					auto::displayStatus();
	   			   //backHTML::_header( 'Mailing Queue' , 'menu.png' , $message , $task, $action );
				  // queueHTML::showMailingQueue();
				}
				break;
		 case ('resetsn') :
		 		//print_r($xf);
				$xf->update('next_autonews', '' );
				$xf->update('last_cron', '' );
				$xf->update('last_sub_update', '' );
				$query="UPDATE #__jnews_mailings SET `next_date` = '0' WHERE mailing_type =7";
				 $database->setQuery($query);
				 $database->query();
				$message= jnewsletter::printYN( true , ' Smart-Newsletter counter reset successful! ' , _ACA_ERROR);
			 	break;
		case ('cpanel'):
			compa::redirect('index.php?option=com_jnewsletter');
     		break;
     	case ('delq'):
     		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
     		if (!is_array( $cid ) || count( $cid ) < 1) {
					echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
					return false;
			} else {
				$status = true;
				foreach ($cid as $id) {
					$message = jnewsletter::printYN( queue::deleteMailingQueue($id) ,  'Successfully deleted the mailings in the queue.' , _ACA_ERROR );
				}
			}
     		break;
     	case ('cleanq'):
     		queue::clearQueue();
     		$message= jnewsletter::printYN( true , ' Successfully cleared the mailings in the queue! ' , _ACA_ERROR);
     		break;
	}//endswitch
     	if ($showqueue) {
		// added this code for pagination ===========================
		$paginationStart = JRequest::getVar( 'pg' );

		if( !empty($paginationStart) ){
			$limitstart = 0;
			$limitend = $paginationStart;
		}else{
			$app =& JFactory::getApplication();
			$limitstart = $app->getUserStateFromRequest( 'limitstart', 'limitstart', 0, 'int' );
			$limitend = $app->getUserStateFromRequest( 'limit', 'limit', 0, 'int' );
		} //endif
		$limittotal = queue::getQueueCount( $mailingid );

		$setLimit = null;
		$setLimit->total = ( !empty($limittotal) ) ? $limittotal : 0;
		$setLimit->start = ( !empty( $limitstart ) ) ? $limitstart : 0;
		$setLimit->end = ( !empty($limitend) ) ? $limitend: 20;
		// ====================================

     		$form['main'] = " <form  name='adminForm' method='POST' action='index2.php' > \n" ;
     		$form['select'] = " <form name='jNewsletterFilterForm' method='POST' action='index2.php'> \n" ;
     		backHTML::_header( 'Mailing Queue' , $img , $message , $task, $action  );
			$mailingq=queue::getMailingqueue($mailingsearch, $mailingid, $setLimit->start, $setLimit->end );
			queueHTML::showMailingQueue($mailingq,$lists, $form,$setLimit->start,$setLimit->end,$mailingsearch, $setLimit);
			$go[] = jnewsletter::makeObj('act', $action);

			backHTML::formEnd($go);
     	}
			global $totalm;
            //backHTML::footerCountsQueue($start, $limit, $mailingsearch, $totalm, 8, $action);

	return true;
}//endfct
