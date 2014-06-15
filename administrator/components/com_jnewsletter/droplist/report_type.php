<?php
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
 class outputReportType {

 	function reportType($selected){
		$values = array();
		$values[] = JHTML::_('select.option', 'listing', JText::_('_ACA_REPORT_LISTING') );
		$values[] = JHTML::_('select.option', 'graph', JText::_('_ACA_REPORT_GRAPH') );

		return JHTML::_('select.radiolist',   $values, "rpttype", 'class="inputbox" size="1"', 'value', 'text',$selected);
	}//endfct
 }//endclass

