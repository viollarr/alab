<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class DiagramViewDiagram extends JView
{
	function display($tpl = null)
	{
		include(ACYMAILING_BACK.'inc'.DS.'openflash'.DS.'php-ofc-library'.DS.'open-flash-chart.php');
		$function = $this->getLayout();
		$this->setLayout('diagram');
		if(method_exists($this,$function)) $this->$function();
		$filters = null;
		$diagramType = acymailing::get('type.diagram');
		$filters->task = $diagramType->display('task',JRequest::getCmd('task'));
		$this->assignRef('filters',$filters);
		$bar = & JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Link', 'back', JText::_('GLOBAL_STATISTICS'), acymailing::completeLink('stats') );
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','diagram-'.JRequest::getCmd('task','lists'));
		parent::display($tpl);
	}
	function mailing(){
		$mailid = JRequest::getInt('mailid');
		if(empty($mailid)) return;
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT * FROM '.acymailing::table('stats').' WHERE mailid = '.$mailid);
		$mailingstats = $db->loadObject();
		$mailClass = acymailing::get('class.mail');
		$mailing = $mailClass->get($mailid);
		$chart = new open_flash_chart();
		$title = new title( JText::_('SEND_PROCESS') );
		$title->set_style('font-size:12px; color: #FF8040');
		$chart->set_title( $title );
		$pie = new pie();
		$pie->set_start_angle( 35 );
		$pie->set_animate( true );
		$pie->set_tooltip( '#val# of #total#<br>#percent#' );
		$pieHTML = new pie_value((int) $mailingstats->senthtml,JText::_('HTML'));
		$pieHTML->set_colour('#00FF00');
		$pieText = new pie_value((int) $mailingstats->senttext,JText::_('TEXT'));
		$pieText->set_colour('#0000FF');
		$pieFailed = new pie_value((int) $mailingstats->fail,JText::_('FAILED'));
		$pieFailed->set_colour('#FF0000');
		$values = array();
		if(!empty($mailingstats->senthtml)) $values[] = $pieHTML;
		if(!empty($mailingstats->senttext)) $values[] = $pieText;
		if(!empty($mailingstats->fail)) $values[] = $pieFailed;
		$pie->set_values( $values );
		$chart->add_element( $pie );
		$this->assignRef('chart',$chart);
		$chart3 = new open_flash_chart();
		$title = new title( JText::_('OPEN') );
		$title->set_style('font-size:12px; color: #FF8040');
		$chart3->set_title( $title );
		$pie = new pie();
		$pie->set_start_angle( 35 );
		$pie->set_animate( true );
		$pie->set_tooltip( '#val# of #total#<br>#percent#' );
		$pieNot = new pie_value((int) $mailingstats->senthtml - (int)$mailingstats->openunique,JText::_('NOT_OPEN'));
		$pieNot->set_colour('#FF0000');
		$pieOpen = new pie_value((int) $mailingstats->openunique,JText::_('OPEN'));
		$pieOpen->set_colour('#00FF00');
		$pie->set_values( array($pieOpen,$pieNot) );
		$chart3->add_element( $pie );
		$this->assignRef('chart3',$chart3);

		$db->setQuery('SELECT min(opendate) as minval, max(opendate) as maxval FROM '.acymailing::table('userstats').' WHERE opendate > 0 AND mailid = '.$mailid);
		$datesOpen = $db->loadObject();
		$db->setQuery('SELECT min(`date`) as minval, max(`date`) as maxval FROM '.acymailing::table('urlclick').' WHERE  mailid = '.$mailid);
		$datesClick = $db->loadObject();
		$spaces = array();
		$intervals = 10;
		$minDate = min($datesOpen->minval,$datesClick->minval);
		if(empty($minDate)) $minDate = max($datesOpen->minval,$datesClick->minval);
		$maxDate = max($datesOpen->maxval,$datesClick->maxval)+1;
		$delay = ($maxDate - $minDate)/$intervals;
		for($i=0;$i<$intervals;$i++){
			$spaces[$i] = (int) ($minDate + $delay*$i);
		}
		$spaces[$intervals] = $maxDate;
		$clickresults = array();
		$openresults = array();
		$legendX = array();
		for($i = 0; $i<=$intervals; $i++ ){
			$legendX[] = acymailing::getDate($spaces[$i]);
			$db->setQuery('SELECT count(subid) FROM '.acymailing::table('userstats').' WHERE opendate < '.$spaces[$i].' AND opendate > 0 AND mailid = '.$mailid);
			$openresults[$i] = (int) $db->loadResult();
			$db->setQuery('SELECT count(subid) FROM '.acymailing::table('urlclick').' WHERE date < '.$spaces[$i].' AND mailid = '.$mailid);
			$clickresults[$i] = (int) $db->loadResult();
		}
		$chart2 = new open_flash_chart();
		$title = new title( JText::_('OPEN').' / '.JText::_('CLICKED_LINK'));
		$title->set_style('font-size:12px; color: #FF8040');
		$chart2->set_title( $title );
		$openLine = new line_base();
		$openLine->set_values($openresults);
		$openLine->set_text(JText::_('OPEN'));
		$openLine->set_colour('#94D700');
		$clickLine = new line_base();
		$clickLine->set_values($clickresults);
		$clickLine->set_text(JText::_('CLICKED_LINK'));
		$x_axis = new x_axis();
		$xlabelobject = new x_axis_labels();
		$xlabelobject->rotate(-20);
		$xlabelobject->set_labels($legendX);
		$x_axis->set_labels( $xlabelobject );
		$y_axis = new y_axis();
		$maxYValue = max($clickresults[$intervals],$openresults[$intervals]);
		$y_axis->range(0,$maxYValue,intval($maxYValue/5));
		$chart2->set_x_axis( $x_axis );
		$chart2->set_y_axis( $y_axis );
		$chart2->add_element( $clickLine );
		$chart2->add_element( $openLine );
		$this->assignRef('chart2',$chart2);
		$this->assignRef('mailing',$mailing);
		$this->assignRef('mailingstats',$mailingstats);
		$this->setLayout('mailing');
	}
	function lists(){
		acymailing::setTitle(JText::_('CHARTS'),'stats','diagram&task=lists');
		$listsClass = acymailing::get('class.list');
		$lists = $listsClass->getLists('listid');
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT listid, count(subid) as total FROM '.acymailing::table('listsub').' WHERE `status` = 1 group by listid');
		$subscribers = $db->loadObjectList('listid');
		$db->setQuery('SELECT listid, count(subid) as total FROM '.acymailing::table('listsub').' WHERE `status` = -1 group by listid');
		$unsubscribers = $db->loadObjectList('listid');
		$db->setQuery('SELECT listid, count(subid) as total FROM '.acymailing::table('listsub').' WHERE `status` = 2 group by listid');
		$waitsub = $db->loadObjectList('listid');
		$title = new title( JText::_('NB_SUB_UNSUB') );
		$title->set_style('font-size:20px; color: #FF8040');
		$xLabels = array();
		$subColumn = array();
		$unsubColumn = array();
		$waitColumn = array();
		foreach($lists as $listid => $oneList){
			$xLabels[] = $oneList->name;
			$subColumn[] = empty($subscribers[$listid]->total) ? 0 : (int) $subscribers[$listid]->total;
			$unsubColumn[] = empty($unsubscribers[$listid]->total) ? 0 : (int) $unsubscribers[$listid]->total;
			$waitColumn[] = empty($waitsub[$listid]->total) ? 0 : (int) $waitsub[$listid]->total;
		}
		$barSub = new bar();
		$barSub->set_values( $subColumn );
		$barSub->set_colour('#00FF00');
		$barSub->set_tooltip(JText::_('SUBSCRIBERS').' : #val#');
		$barUnsub = new bar();
		$barUnsub->set_values( $unsubColumn );
		$barUnsub->set_colour('#CC0000');
		$barUnsub->set_tooltip(JText::_('UNSUBSCRIBERS').' : #val#');
		if(!empty($waitsub)){
			$barWait = new bar();
			$barWait->set_values( $waitColumn );
			$barWait->set_tooltip(JText::_('PENDING_SUBSCRIPTION').' : #val#');
			$barWait->set_colour('#FF9900');
		}
		$maxSub = max($subColumn);
		$maxUnsub = max($unsubColumn);
		$maxWait = max($waitColumn);
		$yLabels[] = JText::_('SUBSCRIBERS');
		$yLabels[] = JText::_('UNSUBSCRIBERS');
		$x_axis = new x_axis();
		$xlabelobject = new x_axis_labels();
		$xlabelobject->rotate(-20);
		$xlabelobject->set_labels($xLabels);
		$x_axis->set_labels( $xlabelobject );
		$y_axis = new y_axis();
		$maxYValue = max(array($maxSub,$maxUnsub,$maxWait));
		$y_axis->range(0,$maxYValue,intval($maxYValue/10));
		$chart = new open_flash_chart();
		$chart->set_title( $title );
		$chart->set_x_axis( $x_axis );
		$chart->set_y_axis( $y_axis );
		if(!empty($waitsub)){
			$chart->add_element( $barWait );
		}
		$chart->add_element( $barSub );
		$chart->add_element( $barUnsub );
		$this->assignRef('chart',$chart);
	}
	function subscription(){
		acymailing::setTitle(JText::_('CHARTS'),'stats','diagram&task=subscription');
		$listsClass = acymailing::get('class.list');
		$lists = $listsClass->getLists('listid');
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT min(subdate) as minsubdate, min(unsubdate) as minunsubdate FROM '.acymailing::table('listsub'));
		$dates = $db->loadObject();
		$spaces = array();
		$intervals = 10;
		$dates->maxsubdate = time();
		$delay = ($dates->maxsubdate - $dates->minsubdate)/$intervals;
		for($i=0;$i<$intervals;$i++){
			$spaces[$i] = (int) ($dates->minsubdate + $delay*$i);
		}
		$spaces[$intervals] = $dates->maxsubdate;
		$results = array();
		$legendX = array();
		for($i = 0; $i<=$intervals; $i++ ){
			$legendX[] = acymailing::getDate($spaces[$i]);
			$db->setQuery('SELECT count(subid) as total, listid FROM '.acymailing::table('listsub').' WHERE `status` != 2 AND `subdate` < '.$spaces[$i].' AND (`status` = 1 OR `unsubdate`>'.$spaces[$i].') GROUP BY listid');
			$results[$i] = $db->loadObjectList('listid');
		}
		$title = new title( JText::_('SUB_HISTORY') );
		$title->set_style('font-size:20px; color: #FF8040');
		$lines = array();
		$maxSub = 0;
		foreach($lists as $listid => $oneList){
			$lines[$listid] = new line_base();
			$values = array();
			for($i = 0; $i<=$intervals; $i++ ){
				$values[] = empty($results[$i][$listid]->total) ? 0 : (int) $results[$i][$listid]->total;
			}
			$lines[$listid]->set_values($values);
			$lines[$listid]->set_text($oneList->name);
			$lines[$listid]->set_colour($oneList->color);
			$maxSub = max($maxSub,max($values));
		}
		$x_axis = new x_axis();
		$xlabelobject = new x_axis_labels();
		$xlabelobject->rotate(-20);
		$xlabelobject->set_labels($legendX);
		$x_axis->set_labels( $xlabelobject );
		$y_axis = new y_axis();
		$y_axis->range(0,$maxSub,intval($maxSub/10));
		$chart = new open_flash_chart();
		$chart->set_x_axis( $x_axis );
		$chart->set_y_axis( $y_axis );
		$chart->set_title( $title );
		foreach($lines as $oneLine){
			$chart->add_element( $oneLine );
		}
		$this->assignRef('chart',$chart);
	}
}
