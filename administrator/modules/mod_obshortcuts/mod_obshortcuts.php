<?php
/**
 * @version		$Id: mod_obshortcuts.php 63 2011-05-16 04:33:14Z khant $
 * @package 	mod_obshortcuts
 * @author 		Thong Tran - http://foobla.com
 * @copyright 	(C) 2007-2011 foobla.com. All rights reserved.
 * @license		GNU/GPL, see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.filesystem.folder' );
JHTML::_('behavior.mootools');
$js	= "
		window.addEvent('domready', function(){
			$('vmpo').addEvent('change', function(e){
				var order_id = this.value;
				for (var i = 0; i < order_id.length; i++){
					if( order_id[i] != 0){
						order_id = order_id.substring(i);
						break;
					}
				}
         		window.location = 'index.php?page=order.order_print&limitstart=0&keyword=&order_id='+order_id+'&option=com_virtuemart';
				return;
	       	});
	});";
$css = '#module-status {
	background: none;
}';
$doc =&JFactory::getDocument();
$doc->addScriptDeclaration($js, 'text/javascript');
# clean the mess thing from rhuk template
$doc->addStyleDeclaration($css);
// order virtuemart
if ( $params->get('orderinput') ) {
	$ordernumber = JText::_('ORDER_NUMBER');
	echo '<span class="add_icons" style="margin: 0; padding: 4px"><input type="text" id="vmpo" name="vmpo" size="12px" value="'.$ordernumber.'" onfocus="this.value=\'\'"  onblur="this.value=\''.$ordernumber.'\'" /></span>';
}
if ($params->get('shortcuts')!='') {
	$shortcuts = $params->get('shortcuts');
	$shortcuts_arr = explode(';', $shortcuts);
	
	foreach ($shortcuts_arr AS $shortcut) {
		$shortcut_arr = explode('|', $shortcut);

		# get each element title|link|icon
		$title_value	= $shortcut_arr[0];
		$link_value		= $shortcut_arr[1];
		$icon_value		= $shortcut_arr[2];
		
		/**
		 * TODO
		 * If the icon can not be found, load the default icon
		 */

		# display them
		if ($link_value!='')		
			echo "<a href=\"".$link_value."\"><span class=\"foobla_shortcuts\" style=\"margin: 0; padding: 4px\"><img src=\"".$icon_value."\" alt=\"".$title_value."\" title=\"".$title_value."\" height=\"16\" width=\"16\" /></span></a>";
	}
} else {
	for ($i = 0; $i < 12; $i++) {
		# get the params name
		$title 		= 'title_'.$i;
		$link		= 'link_'.$i;
		$icon		= 'icon_'.$i;
		$icon_lib	= 'icon_'.$i.'_lib';
		
		# get the params value
		$link_value		= $params->get($link);
		$title_value	= $params->get($title);
		if (JFolder::exists(JPATH_ADMINISTRATOR.DS.'templates'.DS.'khepri')) {
			# it's absolutely Joomla 1.5
			$icon_value		= ($params->get($icon)) ? $params->get($icon) : JURI::root()."administrator/templates/khepri/images/menu/".$params->get($icon_lib);
		} else {
			$icon_value		= ($params->get($icon)) ? $params->get($icon) : JURI::root()."administrator/templates/bluestork/images/menu/".$params->get($icon_lib);
		}
		
		#$icon_value		= ($params->get($icon)) ? $params->get($icon) : JURI::root()."administrator/templates/khepri/images/menu/".$params->get($icon_lib);
		# display them
		if ($link_value!='') {
			echo "<a href=\"".$link_value."\"><span class=\"foobla_shortcuts\" style=\"margin: 0; padding: 4px\"><img src=\"".$icon_value."\" alt=\"".$title_value."\" title=\"".$title_value."\" height=\"16\" width=\"16\" /></span></a>";
		}
	}
}

// display icon
$db 	= &JFactory::getDBO();
$query 	= " SELECT id".
		  " FROM #__modules".
		  " WHERE module = 'mod_obshortcuts'"; 
$db->setQuery($query);
$cid 		= $db->loadResult();
$iconadd 	= $params->get('icon'); 
$altTitle 	= JText::_('ALT_TITLE_ICON');
if ( $iconadd ) {
	if (JFolder::exists(JPATH_ADMINISTRATOR.DS.'templates'.DS.'khepri')) {
		# it's absolutely Joomla 1.5
		echo '<a href="'.JURI::root().'administrator/index.php?option=com_modules&client=1&task=edit&cid[]='.$cid.'"><span class="add_icons" style="margin: 0; padding: 4px"><img src="'.JURI::root().'administrator/templates/khepri/images/menu/icon-16-config.png" alt="'.$altTitle.'" title="'.$altTitle.'" height="16" width="16" /></span></a>';
	} else {
		echo '<a href="'.JURI::root().'administrator/index.php?option=com_modules&task=module.edit&id='.$cid.'"><span class="add_icons" style="margin: 0; padding: 4px"><img src="'.JURI::root().'administrator/templates/bluestork/images/menu/icon-16-config.png" alt="'.$altTitle.'" title="'.$altTitle.'" height="16" width="16" /></span></a>';
	}
}

# display separater
$separate	= $params->get('separate');
if ($separate) {
	echo "<span style=\"border-right:1px solid #D8D8D8;margin: 0; padding: 4px 0px 5px 0;\">&nbsp;</span>";
}
?>