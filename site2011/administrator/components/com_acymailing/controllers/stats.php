<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class StatsController extends acymailingController{
	function detaillisting(){
		JRequest::setVar( 'layout', 'detaillisting'  );
		return parent::display();
	}
	function remove(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$cids = JRequest::getVar( 'cid', array(), '', 'array' );
		$class = acymailing::get('class.stats');
		$num = $class->delete($cids);
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::sprintf('SUCC_DELETE_ELEMENTS',$num), 'message');
		return $this->listing();
	}
}