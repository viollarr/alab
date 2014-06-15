<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTagjcalpro extends JPlugin
{
function plgAcymailingTagjcalpro(&$subject, $config){
	parent::__construct($subject, $config);
	if(!isset($this->params)){
		$plugin =& JPluginHelper::getPlugin('acymailing', 'tagjcalpro');
		$this->params = new JParameter( $plugin->params );
	}
}
 function acymailing_getPluginType() {
 	$onePlugin = null;
 	$onePlugin->name = JText::_('JOOMEXT_EVENT'). ' <small>(jCalPro)</small>';
 	$onePlugin->function = 'acymailingtagjcalpro_show';
 	$onePlugin->help = 'plugin-tagjcalpro';
 	return $onePlugin;
 }
 function acymailingtagjcalpro_show(){
	$app =& JFactory::getApplication();
	$pageInfo = null;
	$paramBase = ACYMAILING_COMPONENT.'.tagjcalpro';
	$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.extid','cmd' );
	$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
	$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
	$pageInfo->search = JString::strtolower( $pageInfo->search );
	$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
	$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
	$database =& JFactory::getDBO();
	if(!empty($pageInfo->search)){
		$searchVal = '\'%'.$database->getEscaped($pageInfo->search).'%\'';
		$filters[] = "a.extid LIKE $searchVal OR a.title LIKE $searchVal OR a.description LIKE $searchVal";
	}
	$whereQuery = '';
	if(!empty($filters)){
		$whereQuery = ' WHERE ('.implode(') AND (',$filters).')';
	}
	$query = 'SELECT SQL_CALC_FOUND_ROWS a.extid,a.title,a.description FROM '.acymailing::table('jcalpro2_events',false).' as a';
	if(!empty($whereQuery)) $query.= $whereQuery;
	if(!empty($pageInfo->filter->order->value)){
		$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
	}
	$database->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
	$rows = $database->loadObjectList();
	if(!empty($pageInfo->search)){
		$rows = acymailing::search($pageInfo->search,$rows);
	}
	$database->setQuery('SELECT FOUND_ROWS()');
	$pageInfo->elements->total = $database->loadResult();
	$pageInfo->elements->page = count($rows);
	jimport('joomla.html.pagination');
	$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
?>
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'JOOMEXT_FILTER' ); ?>:
				<input type="text" name="search" id="acymailingsearch" value="<?php echo $pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'JOOMEXT_GO' ); ?></button>
				<button onclick="document.getElementById('acymailingsearch').value='';this.form.submit();"><?php echo JText::_( 'JOOMEXT_RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1" width="100%">
		<thead>
			<tr>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'NAME'), 'a.title', $pageInfo->filter->order->dir,$pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'DESCRIPTION'), 'a.description', $pageInfo->filter->order->dir,$pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titleid">
					<?php echo JHTML::_('grid.sort',   JText::_( 'ID' ), 'a.extid', $pageInfo->filter->order->dir, $pageInfo->filter->order->value ); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10">
					<?php echo $pagination->getListFooter(); ?>
					<?php echo $pagination->getResultsCounter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				$k = 0;
				for($i = 0,$a = count($rows);$i<$a;$i++){
					$row =& $rows[$i];
			?>
				<tr id="content<?php echo $row->extid; ?>" class="<?php echo "row$k"; ?>" onclick="setTag('{jcalpro:<?php echo $row->extid; ?>}');insertTag();" style="cursor:pointer;">
					<td>
					<?php
						echo $row->title;
					?>
					</td>
					<td>
					<?php
						echo acymailing::absoluteURL($row->description);
					?>
					</td>
					<td align="center">
						<?php echo $row->extid; ?>
					</td>
				</tr>
			<?php
					$k = 1-$k;
				}
			?>
		</tbody>
	</table>
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $pageInfo->filter->order->dir; ?>" />
	<?php
 }
 function acymailing_replacetags(&$email){
	$match = '#{jcalpro:(.*)}#Ui';
	$variables = array('body','altbody');
	$found = false;
	foreach($variables as $var){
		if(empty($email->$var)) continue;
		$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
		if(empty($results[$var][0])) unset($results[$var]);
	}
	if(!$found) return;
	$tags = array();
	foreach($results as $var => $allresults){
		foreach($allresults[0] as $i => $oneTag){
			if(isset($htmlreplace[$oneTag])) continue;
			$tags[$oneTag] = $this->_replaceEvent($allresults[1][$i]);
		}
	}
	$email->body = str_replace(array_keys($tags),$tags,$email->body);
	$email->altbody = str_replace(array_keys($tags),$tags,$email->altbody);
 }
 function _replaceEvent($id){
	$query = 'SELECT a.* FROM '.acymailing::table('jcalpro2_events',false).' as a ';
	$query .= 'WHERE a.extid = '.(int) $id.' LIMIT 1';
	$db =& JFactory::getDBO();
	$db->setQuery($query);
	$row = $db->loadObject();
	if(empty($row)){
		$app =& JFactory::getApplication();
		if($app->isAdmin()){
			$app->enqueueMessage('The event "'.$id.'" could not be loaded','notice');
		}
		return '';
	}
	$link = ACYMAILING_LIVE.'index.php?option=com_jcalpro&extmode=view&extid='.$row->extid;
	$time = strtotime($row->start_date);
	$date = strftime(JText::_('DATE_FORMAT_LC'), $time);
	if(file_exists(ACYMAILING_TEMPLATE.'plugins'.DS.'tagjcalpro.php')){
		ob_start();
		require(ACYMAILING_TEMPLATE.'plugins'.DS.'tagjcalpro.php');
		return ob_get_clean();
	}
	$result = '<div class="acymailing_content"><a style="text-decoration:none;" href="'.$link.'" name="event-'.$row->extid.'" target="_blank" ><h2 class="acymailing_title">'.$row->title.'</h2></a>';
	$result .= $date.'<br/>';
	$result .= $row->description;
	$result .= '</div>';
	return $result;
}
}//endclass