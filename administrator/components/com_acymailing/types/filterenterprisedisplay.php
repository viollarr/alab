<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
if(!empty($this->vmproducts)){
	$this->filters['vmorder'] = $this->vmbuy->display("filter[$i][vmorder_type]").' ';
	$this->filters['vmorder'] .= JHTML::_('select.genericlist',   $this->vmproducts, "filter[$i][vmorder_product]", 'class="inputbox" size="1"', 'value', 'text');
}
if(!empty($this->vmgroups)){
	$this->filters['vmgroups'] = $this->vmgroupsparams->display("filter[$i][vmgroups_type]").' ';
	$this->filters['vmgroups'] .= $this->vmgroups->display("filter[$i][vmgroups]");
}
if(!empty($this->jomsocialfields)){
	$this->filters['jomsocialfield'] = JHTML::_('select.genericlist',   $this->jomsocialfields, "filter[$i][jomsocialfield]", 'class="inputbox" size="1"', 'value', 'text');
	$this->filters['jomsocialfield'].= ' '.$this->operators->display("filter[$i][jomsocialfield_operator]").' <input class="inputbox" type="text" name="filter['.$i.'][jomsocialfield_value]" size="50" value="">';
}
if(!empty($this->vmfield)){
	$this->filters['vmfield'] = JHTML::_('select.genericlist',   $this->vmfield, "filter[$i][vmfield]", 'class="inputbox" size="1"', 'value', 'text');
	$this->filters['vmfield'].= ' '.$this->operators->display("filter[$i][vmfield_operator]").' <input class="inputbox" type="text" name="filter['.$i.'][vmfield_value]" size="50" value="">';
}
