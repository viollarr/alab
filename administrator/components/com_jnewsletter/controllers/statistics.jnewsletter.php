<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/*
 * Function to generate the reports(Mailing Report, Subscribers Report, Lists Report)
 * Get all the parameters from the filter header to retrieve correct data
 * @param: $action - action is statistics
 * 			$task - if the task is generate or refresh
 */
 function statistics( $listId, $listType, $mailingId, $message, $task, $action ){

	//From Specified fieldset
	$sDate =  JRequest::getVar('startdate');
	$eDate =  JRequest::getVar('enddate');

	//Predefined fieldset
	$currentInterval =  JRequest::getVar('rptinterval');
	$currentRange =  JRequest::getVar('rptrange');

	if(empty($currentRange)) $currentRange = 'this-month';
	if(empty($currentInterval)) $currentInterval = 'weekly';

	if(($sDate == '0000-00-00' && $eDate == '0000-00-00')){
		$sDate = 0;
		$eDate = 0;
	}//endif

	if((!empty($sDate) && !empty($eDate))){
		if($sDate != '0000-00-00' && $eDate != '0000-00-00'){
			$sDate = strtotime($sDate);
			$eDate = 	strtotime($eDate);
		}elseif($sDate != '0000-00-00' && $eDate == '0000-00-00'){
			$sDate = strtotime($sDate);
			$eDate = 	time() - ACA_TIME_OFFSET * 3600 ;
		}elseif($sDate == '0000-00-00' && $eDate != '0000-00-00'){
			echo jnewsletter::printM('warning',_ACA_REPORT_WARN_MESSAGE);
			$sDate = 0;
			$eDate = 0;
			//JRequest::setVar('startdate', '0000-00-00');
		}//endif...specified date
	}else{
		//Set the correct startDateTime and endDateTime
		//Set also the correct intervals appropriate for each range
		//current datetime base on the website setting configuration
		$currDate = $eDate = time() - ACA_TIME_OFFSET * 3600 ;

		switch( $currentRange ) {
				case 'today': 	//today
					$sDate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
					$eDate = mktime(23, 59, 59, date('m'), date('d'), date('Y'));
					$currentInterval = 'daily';
					break;
				case 'yesterday': 	//yesterday
					$sDate = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));
					$eDate = mktime(23, 59, 59, date('m'), date('d')-1, date('Y'));
					$currentInterval = 'daily';
					break;
				case 'this-week':	//this week
					$sDate = mktime(0, 0, 0, date('n'), date('j'), date('Y')) - ((date('N')-1)*3600*24);
					//if selected intervals is monthly or yearly
					if($currentInterval == 'monthly' || $currentInterval == 'yearly') $currentInterval = 'weekly';
					break;
				case 'last-week':
					//last week..start of the week is Monday at 00:00:00 and will end on Sunday at 23:59:59:
					$sDate = mktime(0, 0, 0, date('n'), date('j')-6, date('Y')) - ((date('N'))*3600*24);
					$eDate = mktime(23, 59, 59, date('n'), date('j'), date('Y')) - ((date('N'))*3600*24);
					//if selected intervals is monthly or yearly
					if($currentInterval == 'monthly' || $currentInterval == 'yearly') $currentInterval = 'weekly';
					break;
				case 'last-2-weeks':
					//last 2 weeks
					$sDate = mktime(0, 0, 0, date('n'), date('j')-13, date('Y')) - ((date('N'))*3600*24);
					$eDate = mktime(23, 59, 59, date('n'), date('j'), date('Y')) - ((date('N'))*3600*24);
					//if selected intervals is monthly or yearly
					if($currentInterval == 'monthly' || $currentInterval == 'yearly') $currentInterval = 'weekly';
					break;
				case 'last-month':
					//last month..starts at the first day to the last day
					$sDate = strtotime((date('m')-1).'/01/'.date('Y'), $currDate);
					$eDate = $sDate + 30*24*3600; //mktime(23, 59, 59, date('m'));
					if($currentInterval == 'yearly') $currentInterval = 'weekly';
					break;
				case 'this-year':
					//this year..starts
					$sDate = strtotime('01/01/'.date('Y'), $currDate);
					break;
				case 'last-year':
					//last year...starts jan 1 and ends dec 31
					$sDate = mktime(0,0,0,1,1,date('Y')-1);
					$eDate = mktime(23,59,59,12,31,date('Y')-1);
					break;
				case '2-years-ago':
					//2 Years ago
					if($currentInterval == 'yearly'){	//if the interval is yearly
						$sDate = mktime(0,0,0,1,1,date('Y')-2);		//starts jan 1
					}else{
						$eDate =  mktime(23,59,59,12,31,date('Y')-2);	//ends dec 31
						$sDate = mktime(0,0,0,1,1,date('Y')-2);		//starts jan 1
					}//endif
					break;
				case '3-years-ago':
					//3 Years ago
					if($currentInterval == 'yearly'){	//if the interval is yearly
						$sDate = mktime(0,0,0,1,1,date('Y')-3);	//starts jan 1
					}else{
					$eDate = mktime(23,59,59,12,31,date('Y')-3);	//ends dec 31
					$sDate = mktime(0,0,0,1,1,date('Y')-3);		//starts jan 1
					}//endif
					break;
				case 'this-month':	//this month
				default:
					$sDate = strtotime(date('m').'/01/'.date('Y'), $currDate);
					if($currentInterval == 'yearly') $currentInterval = 'weekly';
					break;
		}//endswitch...presetdate
	}//endif

	//Still need to double check if there's really values on the start and end date
	if(!empty($sDate) && !empty($eDate)){

		//Title header
		$doc =& JFactory::getDocument();
		$css = '.icon-48-statistics_header { background-image:url('.ACA_PATH_ADMIN_IMAGES .'header/statistics.png)}';
		$doc->addStyleDeclaration($css, $type = 'text/css');
		$img = 'statistics_header.png';
		$message = '';
		$start = date('F j, Y', $sDate);
		$end = date('F j, Y', $eDate);

		if($currentRange == 'today' || $currentRange == 'yesterday'){
			$title = _ACA_REPORT_HEADER .': '.$start;
			$fileNameExport = $start;
		}else{
			$title = _ACA_REPORT_HEADER .': '.$start.' '._ACA_REPORT_HEADER_TO . ' '. $end;
			$fileNameExport = $start.' '._ACA_REPORT_HEADER_TO . ' '. $end;

		}//endif...$currentRange
		backHTML::_header($title, $img , $message, $task, $action );
	}//endif


	$dateFormat = 'FROM_UNIXTIME(';
	switch( $currentInterval ) {
			case 'yearly':	//yearly
				$specialFormat = ',\'%Y\'';
				$dateFormat4DateNumber = 'FROM_UNIXTIME(';	//.$columnModif.', \'' .substr($special, 10).'\'))';
				$specialNo = ',\'%Y%m%d\')';
				break;
			case 'weekly':	//weekly
				$specialFormat = ',\'%M %d, %Y\'';
				$dateFormat4DateNumber = 'WEEK('. $dateFormat;
				$dateFormat4DateNumber = 'WEEK(FROM_UNIXTIME(';	//'dtfrmtweek%Y-%m-%d';	// WEEK(DATE_FORMAT(cdate, '%Y-%m-%d'))
				$specialNo = ',\'%Y-%m-%d\'))';
				break;
			case 'daily':	//daily
				$specialFormat = ',\'%M %d, %Y\'';
				$dateFormat4DateNumber = 'FROM_UNIXTIME(';		//'dateformat%Y%m%d';
				$specialNo = ',\'%Y%m%d\')';
				break;
			case 'monthly':	//monthly
			default:
				$specialFormat = ',\'%M, %Y\'';
				$dateFormat4DateNumber = 'FROM_UNIXTIME(';	//'dateformat%Y%m%d';
				$specialNo = ',\'%Y%m%d\')';
				break;
	}//endswitch...interval

	$queryfilters = array();
	$queryfilters['enddate'] = '\''.$eDate. '\'';
	$queryfilters['startdate'] = '\''.$sDate. '\'';
	$queryfilters['dateFormat'] = $dateFormat;
	$queryfilters['specialFormat'] = $specialFormat;
	$queryfilters['dateFormat4DateNumber'] = $dateFormat4DateNumber;
	$queryfilters['specialNo'] = $specialNo;
	$queryfilters['mailingId'] = $mailingId;
	$queryfilters['task'] = $task;

 	//go to class.stats to display the view of stats
	require_once(WPATH_CLASS.'class.statistics.php');

	outputReportGraph::initIncludes();

	if ( 'graph' == $task ){
		$results = null;
		$results['subject'] = JRequest::getVar( 'subject', '' );
		$results['html_sent'] = JRequest::getVar( 'html_sent', '0' );
		$results['text_sent'] = JRequest::getVar( 'text_sent', '0' );
		$results['html_views'] = JRequest::getVar( 'html_views', '0' );
		$results['html_unread'] = JRequest::getVar( 'html_unread', '0' );
		$results['pending'] = JRequest::getVar( 'pending', '0' );
		$results['failed'] = JRequest::getVar( 'failed', '0' );
		$results['bounces'] = JRequest::getVar( 'bounces', '0' );
		$results['sent'] = JRequest::getVar( 'sent', '0' );
		$results['id'] = JRequest::getVar( 'id' );
		outputReportGraph::mailingSpecificGraph($results);
	} else {
		outputReportGraph::headerFilter($currentInterval);
		outputReportGraph::tabReports($queryfilters, $task, $fileNameExport);
	}//endif

	echo '</form>';
	return true;
 }//endfct

