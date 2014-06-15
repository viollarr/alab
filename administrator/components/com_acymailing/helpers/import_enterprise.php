<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
if($filterType == 'vmorder'){

	$query = "SELECT DISTINCT b.user_email FROM #__vm_order_item as a LEFT JOIN #__vm_user_info as b on a.user_info_id = b.user_info_id WHERE a.order_status IN ('C','S')";
	if(!empty($filters[$filterNum]['vmorder_product']) AND is_numeric($filters[$filterNum]['vmorder_product']))  $query .= " AND a.product_id = ".(int) $filters[$filterNum]['vmorder_product'];
	$this->db->setQuery($query);
	$allEmails  = $this->db->loadResultArray();
	if(empty($allEmails)) $allEmails[] = 'none';
	if(empty($filters[$filterNum]['vmorder_type'])){
		$allFilters['filters'][] = "a.email NOT IN ('".implode("','",$allEmails)."')";
	}else{
		$allFilters['filters'][] = "a.email IN ('".implode("','",$allEmails)."')";
	}
}
if($filterType == 'vmgroups'){
	$query = 'SELECT DISTINCT b.`user_email` FROM `#__vm_shopper_vendor_xref` as a LEFT JOIN `#__vm_user_info` as b on a.`user_id` = b.`user_id` WHERE a.`shopper_group_id` ';
	$query .= ($filters[$filterNum]['vmgroups_type'] == 'IN') ? '= ' : "!= ";
	$query .= (int) $filters[$filterNum]['vmgroups'];
	$this->db->setQuery($query);
	$allEmails  = $this->db->loadResultArray();
	if(empty($allEmails)) $allEmails[] = 'none';
	$allFilters['filters'][] = "a.email IN ('".implode("','",$allEmails)."')";
}
if($filterType == 'vmfield'){
	$operator = $filters[$filterNum]['vmfield_operator'];
	$value = $filters[$filterNum]['vmfield_value'];
	$column = $filters[$filterNum]['vmfield'];
	$query = "SELECT DISTINCT a.user_email FROM #__vm_user_info as a WHERE ".$this->_convertQuery('a',$column,$operator,$value);
	$this->db->setQuery($query);
	$allEmails  = $this->db->loadResultArray();
	if(empty($allEmails)) $allEmails[] = 'none';
	$allFilters['filters'][] = "a.email IN ('".implode("','",$allEmails)."')";
}
if($filterType == 'jomsocialfield'){
	$operator = $filters[$filterNum]['jomsocialfield_operator'];
	$value = $filters[$filterNum]['jomsocialfield_value'];
	$column = $filters[$filterNum]['jomsocialfield'];
	$query = "SELECT DISTINCT a.user_id FROM #__community_fields_values as a WHERE a.field_id = ".(int) $column." AND ".$this->_convertQuery('a','value',$operator,$value);
	$this->db->setQuery($query);
	$allUseridJomSocial  = $this->db->loadResultArray();
	if(empty($allUseridJomSocial)) $allUseridJomSocial[] = -1;
	$allFilters['filters'][] = 'a.userid IN ('.implode(',',$allUseridJomSocial).')';
}