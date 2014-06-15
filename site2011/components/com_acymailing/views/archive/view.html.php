<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class archiveViewArchive extends JView
{
  function display($tpl = null)
  {
    $function = $this->getLayout();
    if(method_exists($this,$function)) $this->$function();
    parent::display($tpl);
  }
	function forward(){
		return $this->view();
	}
  function listing(){
    global $Itemid;
    $app =& JFactory::getApplication();
	$my =& JFactory::getUser();
	$pathway	=& $app->getPathway();
	$values = null;
	$menus	= &JSite::getMenu();
	$menu	= $menus->getActive();
	if(empty($menu) AND !empty($Itemid)){
		$menus->setActive($Itemid);
		$menu	= $menus->getItem($Itemid);
	}
	if (is_object( $menu )) {
		$menuparams = new JParameter( $menu->params );
	}
	$pageInfo = null;
	$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName();
	$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.senddate','cmd' );
	$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
	$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
	$pageInfo->search = JString::strtolower( $pageInfo->search );
	$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
	$pageInfo->limit->start = JRequest::getInt('limitstart',0);
    $listClass = acymailing::get('class.list');
    $listid = acymailing::getCID('listid');
    if(empty($listid) AND !empty($menuparams)){
    	$listid = $menuparams->get('listid');
    }
    if(empty($listid)){
    	return JError::raiseError( 404, 'Mailing List not found' );
    }
    $oneList = $listClass->get($listid);
    if(empty($oneList->listid)){
    	return JError::raiseError( 404, 'Mailing List not found : '.$listid );
    }
	$access = null;
    $access->frontEndManament = false;
    $access->frontEndAccess = true;
    if(acymailing::level(3)){
    	if(!empty($my->id) AND (int)$my->id == (int)$oneList->userid){
    		$access->frontEndManament = true;
    	}
    	if(!empty($my->gid) AND !empty($my->id)){
    		if($oneList->access_manage == 'all' OR in_array($my->gid,explode(',',$oneList->access_manage))){
    			 $access->frontEndManament = true;
    		}
    	}
    	if($oneList->access_sub != 'all' AND ($oneList->access_sub == 'none' OR empty($my->gid) OR empty($my->id) OR !in_array($my->gid,explode(',',$oneList->access_sub)))){
    		$access->frontEndAccess = false;
    	}
    }
    if(!$access->frontEndManament AND (!$oneList->published OR !$oneList->visible OR !$access->frontEndAccess)){
    	return JError::raiseError( 404, 'Mailing List not accessible : '.$listid );
    }
    $values->suffix = empty($menuparams) ? '' : $menuparams->get('pageclass_sfx');
    if(!empty($menuparams)){
    	$values->suffix = $menuparams->get('pageclass_sfx','');
    	$values->page_title = $menuparams->get('page_title');
    	$values->show_page_title = $menuparams->get('show_page_title',1);
    	$values->show_description = $menuparams->get('show_description',1);
    	$values->show_headings = $menuparams->get('show_headings',1);
    	$values->show_senddate = $menuparams->get('show_senddate',1);
    	$values->filter = $menuparams->get('filter',1);
    }else{
    	$values->suffix = '';
    	$values->show_page_title = 1;
     	$values->show_description = 1;
    	$values->show_headings = 1;
    	$values->show_senddate = 1;
    	$values->filter = 1;
    }
    if(empty($values->page_title)) $values->page_title = $oneList->name;
    if(empty($menuparams)){
    	$pathway->addItem(JText::_('MAILING_LISTS'),acymailing::completeLink('lists'));
    	$pathway->addItem($values->page_title);
    }else{
    	$pathway->addItem($values->page_title);
    }
	$document	=& JFactory::getDocument();
	$document->setTitle( $values->page_title );
	$db =& JFactory::getDBO();
	$searchMap = array('a.mailid','a.subject','a.alias');
	$filters = array();
	if(!empty($pageInfo->search)){
		$searchVal = '\'%'.$db->getEscaped($pageInfo->search,true).'%\'';
		$filters[] = implode(" LIKE $searchVal OR ",$searchMap)." LIKE $searchVal";
	}
	$filters[] = 'a.type = \'news\'';
	if(!$access->frontEndManament){
		$filters[] = 'a.published = 1';
		$filters[] = 'a.visible = 1';
	}
	$filters[] = 'c.listid = '.$oneList->listid;
	$selection = array_merge($searchMap,array('a.senddate','a.visible','a.published','a.fromname','a.fromemail','a.replyname','a.replyemail'));
	$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$selection);
	$query .= ' FROM '.acymailing::table('listmail').' as c';
	$query .= ' LEFT JOIN '.acymailing::table('mail').' as a on a.mailid = c.mailid ';
	$query .= ' WHERE ('.implode(') AND (',$filters).')';
	$query .= ' ORDER BY '.acymailing::secureField($pageInfo->filter->order->value).' '.acymailing::secureField($pageInfo->filter->order->dir);
	$db->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
	$rows = $db->loadObjectList();
	if(!empty($pageInfo->search)){
		$rows = acymailing::search($pageInfo->search,$rows);
	}
	$db->setQuery('SELECT FOUND_ROWS()');
	$pageInfo->elements->total = $db->loadResult();
	$pageInfo->elements->page = count($rows);
	jimport('joomla.html.pagination');
	$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
$js = 'function tableOrdering( order, dir, task ){
		var form = document.adminForm;
		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}';
	$doc =& JFactory::getDocument();
	$doc->addScriptDeclaration( $js);
	$this->assignRef('access',$access);
	$this->assignRef('rows',$rows);
	$this->assignRef('values',$values);
	$this->assignRef('list',$oneList);
	$this->assignRef('pagination',$pagination);
	$this->assignRef('pageInfo',$pageInfo);
  }
	function view(){
		$app =& JFactory::getApplication();
	    $pathway	=& $app->getPathway();
		$frontEndManagement = false;
	    $listid = acymailing::getCID('listid');
	    if(!empty($listid)){
	       	$listClass = acymailing::get('class.list');
       		$oneList = $listClass->get($listid);
       		if(!empty($oneList->visible) AND $oneList->published){
       			$pathway->addItem($oneList->name,acymailing::completeLink('archive&listid='.$oneList->listid.':'.$oneList->alias));
       		}
       		if(!empty($oneList->listid) AND acymailing::level(3)){
       			$my = JFactory::getUser();
       			if(!empty($my->id) AND (int)$my->id == (int)$oneList->userid){
    				$frontEndManagement = true;
    			}
				if(!empty($my->gid) AND !empty($my->id)){
		    		if($oneList->access_manage == 'all' OR in_array($my->gid,explode(',',$oneList->access_manage))){
		    			 $frontEndManagement = true;
		    		}
		    	}
       		}
	    }
	    $mailid = acymailing::getCID('mailid');
		if(empty($mailid)){
    		return JError::raiseError( 404, 'Newsletter not found');
    	}
		$access_sub = true;
	   	if(acymailing::level(3)){
			$listmail = acymailing::get('class.listmail');
			$allLists = $listmail->getLists($mailid);
			$access_sub = false;
			if(!empty($allLists)){
				$my = JFactory::getUser();
				foreach($allLists as $alist){
					if(empty($alist->mailid)) continue;
					if(!$alist->published OR !$alist->visible OR $alist->access_sub == 'none') continue;
					if($alist->access_sub == 'all'){
						$access_sub = true;
						break;
					}
					if(empty($my->id) OR empty($my->gid)) continue;
					if(in_array($my->gid,explode(',',$alist->access_sub))){
						$access_sub = true;
						break;
					}
				}
			}
	   	}
    	$mailClass = acymailing::get('helper.mailer');
    	$oneMail = $mailClass->load($mailid);
    	if(empty($oneMail->mailid)){
    		return JError::raiseError( 404, 'Newsletter not found : '.$mailid );
    	}
    	if(!$frontEndManagement AND (!$access_sub OR !$oneMail->published OR !$oneMail->visible)){
    		$key = JRequest::getString('key');
    		if(empty($key) OR $key !== $oneMail->key){
    			$app->enqueueMessage('You can not have access to this e-mail','error');
    			$app->redirect(acymailing::completeLink('lists',false,true));
    			return false;
    		}
    	}
		$user =& JFactory::getUser();
		if(!empty($user->email)){
			$userClass = acymailing::get('class.subscriber');
			$receiver = $userClass->get($user->email);
		}else{
			$receiver = null;
			$receiver->name = JText::_('VISITOR');
		}
		$oneMail->sendHTML = true;
		$mailClass->dispatcher->trigger('acymailing_replaceusertagspreview',array(&$oneMail,&$receiver));
    	$pathway->addItem($oneMail->subject);
		$document	=& JFactory::getDocument();
		$document->setTitle( $oneMail->subject );
    	$this->assignRef('mail',$oneMail);
    	$this->assignRef('frontEndManagement',$frontEndManagement);
		$this->assignRef('list',$oneList);
	}
}
