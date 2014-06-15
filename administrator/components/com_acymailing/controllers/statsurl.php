<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class StatsurlController extends acymailingController{
	function save(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$class = acymailing::get('class.url');
		$status = $class->saveForm();
		if($status){
			acymailing::display(JText::_( 'JOOMEXT_SUCC_SAVED'),'success');
			return true;
		}else{
			acymailing::display(JText::_( 'ERROR_SAVING'),'success');
		}
		return $this->edit();
	}
	function detaillisting(){
		JRequest::setVar( 'layout', 'detaillisting'  );
		return parent::display();
	}
}