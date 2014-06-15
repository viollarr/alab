<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class SubscriberViewSubscriber extends JView
{
	var $searchFields = array('a.name','a.email','a.subid');
	var $selectedFields = array('a.*','b.gid','b.username');
	var $searchFieldsChoose = array('a.name','a.email','a.id','a.username');
	var $selectedFieldsChoose = array('a.*');
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function listing(){
		$pageInfo = null;
		$app =& JFactory::getApplication();
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName();
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.subid','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
		$selectedList = $app->getUserStateFromRequest( $paramBase."filter_lists",'filter_lists',0,'int');
		$selectedStatus = $app->getUserStateFromRequest( $paramBase."filter_status",'filter_status',0,'int');
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		$database	=& JFactory::getDBO();
		$filters = array();
		if(!empty($pageInfo->search)){
			$searchVal = '\'%'.$database->getEscaped($pageInfo->search,true).'%\'';
			$filters[] = implode(" LIKE $searchVal OR ",$this->searchFields)." LIKE $searchVal";
		}
		$leftJoinQuery = array();
		if(empty($selectedList)){
			$fromQuery = ' FROM '.acymailing::table('subscriber').' as a ';
			$leftJoinQuery[] = acymailing::table('users',false).' as b ON a.userid = b.id';
			if($selectedStatus == 1){
				$filters[] = 'a.accept > 0';
			}elseif($selectedStatus == -1){
				$filters[] = 'a.accept < 1';
			}elseif($selectedStatus == -2){
				$leftJoinQuery[] = acymailing::table('listsub').' as c on a.subid = c.subid AND c.status = 1';
				$filters[] = 'c.listid IS NULL';
			}elseif($selectedStatus == 2){
				$filters[] = 'a.confirmed < 1';
			}elseif($selectedStatus == 3){
				$filters[] = 'a.enabled > 0';
			}elseif($selectedStatus == -3){
				$filters[] = 'a.enabled < 1';
			}
		}else{
			$fromQuery = ' FROM '.acymailing::table('listsub').' as c';
			$leftJoinQuery[] = acymailing::table('subscriber').' as a ON a.subid = c.subid';
			$leftJoinQuery[] = acymailing::table('users',false).' as b ON a.userid = b.id';
			$filters[] = 'c.listid = '.intval($selectedList);
			if(!in_array($selectedStatus,array(-1,1,2))) $selectedStatus = 1;
			$filters[] = 'c.status = '.$selectedStatus;
		}
		$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$this->selectedFields).$fromQuery;
		$query .= ' LEFT JOIN '.implode(' LEFT JOIN ',$leftJoinQuery);
		if(!empty($filters)){
			$query .= ' WHERE ('.implode(') AND (',$filters).')';
		}
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$database->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $database->loadObjectList();
		$database->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $database->loadResult();
		if(acymailing::level(2)){ include(dirname(__FILE__).DS.'level2.'.basename(__FILE__)); }
		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
		$filters = null;
		if(empty($selectedList)){
			$statusType = acymailing::get('type.statusfilter');
		}else{
			$statusType = acymailing::get('type.statusfilterlist');
		}
		$listsType = acymailing::get('type.lists');
		$filters->status = $statusType->display('filter_status',$selectedStatus);
		$filters->lists = $listsType->display('filter_lists',$selectedList);
		$query = 'SELECT name,id FROM #__core_acl_aro_groups';
		$database->setQuery( $query );
		$joomGroups = $database->loadObjectList('id');
		$joomGroups[0]->name = JText::_('VISITOR');
		acymailing::setTitle(JText::_('Users'),'user','subscriber');
		$bar = & JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Link', 'import', JText::_('IMPORT'), acymailing::completeLink('data&task=import') );
		$bar->appendButton( 'Link', 'export', JText::_('EXPORT'), acymailing::completeLink('data&task=export') );
		JToolBarHelper::divider();
		JToolBarHelper::addNew();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList(JText::_('VALIDDELETEITEMS',true));
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','subscriber-listing');
		$bar->appendButton( 'Link', 'acymailing', JText::_('JOOMEXT_CPANEL'), acymailing::completeLink('dashboard') );
		$this->assignRef('lists',$listsType->getData());
		$this->assignRef('toggleClass',acymailing::get('helper.toggle'));
		$this->assignRef('rows',$rows);
		$this->assignRef('filters',$filters);
		$this->assignRef('pageInfo',$pageInfo);
		$this->assignRef('joomGroups',$joomGroups);
		$this->assignRef('pagination',$pagination);
	}
	function choose(){
		$pageInfo = null;
		$app =& JFactory::getApplication();
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName().'_'.$this->getLayout();
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.name','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'asc',	'word' );
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		$db	=& JFactory::getDBO();
		$filters = array();
		if(!empty($pageInfo->search)){
			$searchVal = '\'%'.$db->getEscaped($pageInfo->search,true).'%\'';
			$filters[] = implode(" LIKE $searchVal OR ",$this->searchFieldsChoose)." LIKE $searchVal";
		}
		$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$this->selectedFieldsChoose).' FROM #__users as a';
		if(!empty($filters)){
			$query .= ' WHERE ('.implode(') AND (',$filters).')';
		}
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$db->setQuery($query);
		$db->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $db->loadObjectList();
		$db->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $db->loadResult();
		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
		$this->assignRef('rows',$rows);
		$this->assignRef('pageInfo',$pageInfo);
		$this->assignRef('pagination',$pagination);
	}
	function form(){
		$subid = acymailing::getCID('subid');
		if(!empty($subid)){
			$subscriberClass = acymailing::get('class.subscriber');
			$subscriber = $subscriberClass->getFull($subid);
			$subscription = $subscriberClass->getSubscription($subid);
		}else{
			$listType = acymailing::get('class.list');
			$subscription = $listType->getLists();
			$subscriber = null;
			$subscriber->created = time();
			$subscriber->html = 1; //TODO, make an option to set the default?
			$subscriber->confirmed = 1;
			$subscriber->blocked = 0;
			$subscriber->accept = 1;
			$subscriber->enabled = 1;
			$iphelper = acymailing::get('helper.user');
			$subscriber->ip = $iphelper->getIP();
		}
		acymailing::setTitle(JText::_('User'),'user','subscriber&task=edit&subid='.$subid);
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::divider();
		$bar = & JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Pophelp','subscriber-form');
		$filters = null;
		$quickstatusType = acymailing::get('type.statusquick');
		$filters->statusquick = $quickstatusType->display('statusquick');
		$this->assignRef('subscriber',$subscriber);
		$this->assignRef('subscription',$subscription);
		$this->assignRef('filters',$filters);
		$this->assignRef('statusType',acymailing::get('type.status'));
	}
}
