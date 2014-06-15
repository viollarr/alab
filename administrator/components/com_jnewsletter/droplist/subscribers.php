<?php
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
 class subscribersReportType {

 	function subscirbersType(){
		$values = array();
		$values[] = JHTML::_('select.option', 'all-users', JText::_('ACA_SUBSCRIBERS_ALL_USERS') );
		$values[] = JHTML::_('select.option', 'registered', JText::_('_ACA_SUBSCRIBERS_REGISTERED') );
		$values[] = JHTML::_('select.option', 'guests', JText::_('GUESTS') );

		return JHTML::_('select.radiolist',   $values, "subcscriberstype", 'class="inputbox" size="1"', 'value', 'text',"subcscriberstype");
	}//endfct
 }//endclass

