<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
if(in_array($db->getPrefix().'vm_orders',$tables)){
	$this->type[] = JHTML::_('select.option', 'vmorder',JText::_('VM_ORDER'));
	$types[] = 'vmorder';
	$db->setQuery('SELECT `product_id` as id, `product_sku` as namekey, `product_name` as name FROM #__vm_product ORDER BY namekey ASC');
	$allProducts = $db->loadObjectList();
	$this->vmproducts = array();
	$this->vmproducts[] =  JHTML::_('select.option',0,JText::_('VM_ONE_PRODUCT'));
	if(!empty($allProducts)){
		foreach($allProducts as $oneProduct){
			$this->vmproducts[] = JHTML::_('select.option',$oneProduct->id,$oneProduct->namekey.' ( '.$oneProduct->name.' )');
		}
	}
	$this->vmbuy = acymailing::get('type.vmbuy');
	$this->type[] = JHTML::_('select.option', 'vmgroups',JText::_('VM_GROUP'));
	$types[] = 'vmgroups';
	$this->vmgroupsparams = acymailing::get('type.operatorsin');
	$this->vmgroups = acymailing::get('type.vmgroups');
	$this->type[] = JHTML::_('select.option', 'vmfield',JText::_('VM_FIELD'));
	$types[] = 'vmfield';
	$fields = reset($db->getTableFields($db->getPrefix().'vm_user_info'));
	$this->vmfield = array();
	foreach($fields as $oneField => $fieldType){
		$this->vmfield[] = JHTML::_('select.option',$oneField,$oneField);
	}
}
if(in_array($db->getPrefix().'community_fields',$tables)){
	$this->type[] = JHTML::_('select.option', 'jomsocialfield','jomSocial');
	$types[] = 'jomsocialfield';
	$db->setQuery("SELECT `id`,`name` FROM #__community_fields WHERE `type` != 'group' ORDER BY `ordering` ASC");
	$fields = $db->loadObjectList('id');
	$this->jomsocialfields = array();
	foreach($fields as $oneField => $fieldType){
		$this->jomsocialfields[] = JHTML::_('select.option',$oneField,$fieldType->name);
	}
}
