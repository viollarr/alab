<?php
defined('_JEXEC') or die;

class LinkrControllerBookmark extends JController
{
	function __construct()
	{
		parent::__construct();
		
		// Register Extra tasks
		$this->registerTask('add', 'edit');
	}
	
	function edit()
	{
		JRequest::setVar('view', 'bookmark');
		JRequest::setVar('layout', 'edit');
		JRequest::setVar('hidemainmenu', 1);
		
		parent::display();
	}
	
	function save()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		if ($model->store($post)) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function apply()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		if ($id = $model->store($post)) {
			$msg = JText::_('NOTICE_SAVED');
			$rdir	= index .'&controller=bookmark&task=edit&bid[]='. $id;
		} else {
			$msg = $model->getError();
			$rdir	= index .'&view=bookmarks';
		}
		
		$this->setRedirect($rdir, $msg);
	}
	
	function remove()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		if(!$model->delete()) {
			$msg = JText::_('NOTICE_DEL_ERROR');
		} else {
			$msg = JText::_('NOTICE_DELETED');
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function cancel() {
		$msg	= JText::_('NOTICE_CANCELLED');
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function makepop()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		if ($model->makePopular( 1 )) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function unpop()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		if ($model->makePopular( 0 )) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function saveorder()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		$bid	= JRequest::getVar('bid', array(), 'post', 'array');
		$orders	= JRequest::getVar('order', array(), 'post', 'array');
		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($orders);
		
		if ($model->reorder($bid, $orders)) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function orderup()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		$cid	= JRequest::getVar('bid', array(), 'post', 'array');
		JArrayHelper::toInteger( $cid );
		
		if ($model->orderItem($cid[0], -1)) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
	
	function orderdown()
	{
		JRequest::checkToken() or jexit('invalid token');
		
		$model	= $this->getModel('Bookmark');
		$cid	= JRequest::getVar('bid', array(), 'post', 'array');
		JArrayHelper::toInteger( $cid );
		
		if ($model->orderItem($cid[0], 1)) {
			$msg = JText::_('NOTICE_SAVED');
		} else {
			$msg = $model->getError();
		}
		
		$this->setRedirect(index .'&view=bookmarks', $msg);
	}
}
