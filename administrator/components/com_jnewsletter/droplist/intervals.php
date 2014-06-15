<?php
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
 class intervalReportType {

 	function intervalType($selected){
		$values = array();
		$values[] = JHTML::_('select.option','daily', JText::_('_ACA_INTERVAL_DAILY') );
		$values[] = JHTML::_('select.option', 'weekly', JText::_('_ACA_INTERVAL_WEEKLY') );
		$values[] = JHTML::_('select.option', 'monthly', JText::_('_ACA_INTERVAL_MONTHLY') );
		$values[] = JHTML::_('select.option', 'yearly', JText::_('_ACA_INTERVAL_YEARLY') );

		return JHTML::_('select.radiolist',   $values, "rptinterval", 'class="inputbox" size="1"','value', 'text',$selected);
	}//endfct
 }//endclass

