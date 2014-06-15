<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class aclType{
	function aclType(){
		$acl =& JFactory::getACL();
		$this->groups = $acl->get_group_children_tree( null, 'USERS', false );
		$this->choice = array();
		$this->choice[] = JHTML::_('select.option','none',JText::_('NONE'));
		$this->choice[] = JHTML::_('select.option','all',JText::_('ALL'));
		$this->choice[] = JHTML::_('select.option','special',JText::_('ACY_CUSTOM'));
		$js = "function updateACL(map){
			choice = eval('document.adminForm.choice_'+map);
			choiceValue = 'special';
			for (var i=0; i < choice.length; i++){
			   if (choice[i].checked){
			     choiceValue = choice[i].value;
				}
			}
			hiddenVar = document.getElementById('hidden_'+map);
			if(choiceValue != 'special'){
				hiddenVar.value = choiceValue;
				document.getElementById('div_'+map).style.display = 'none';
			}else{
				document.getElementById('div_'+map).style.display = 'block';
				specialVar = eval('document.adminForm.special_'+map);
				finalValue = '';
				for (var i=0; i < specialVar.length; i++){
					if (specialVar[i].checked){
			     		finalValue += specialVar[i].value+',';
					}
				}
				hiddenVar.value = finalValue;
			}
		}";
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
	}
	function display($map,$values){
		$js ='window.addEvent(\'domready\', function(){ updateACL(\''.$map.'\'); });';
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
		$choiceValue = ($values == 'none' OR $values == 'all') ?  $values : 'special';
		$return = JHTML::_('select.radiolist',   $this->choice, "choice_".$map, 'onclick="updateACL(\''.$map.'\');"', 'value', 'text',$choiceValue);
		$return .= '<input type="hidden" name="data[list]['.$map.']" id="hidden_'.$map.'" value="'.$values.'"/>';
		$valuesArray = explode(',',$values);
		$listAccess = '<div style="display:none" id="div_'.$map.'"><table>';
		foreach($this->groups as $oneGroup){
			$listAccess .= '<tr><td>';
			if(!in_array($oneGroup->value,array(29,30))) $listAccess .= '<input type="checkbox" onclick="updateACL(\''.$map.'\');" value="'.$oneGroup->value.'" '.(in_array($oneGroup->value,$valuesArray) ? 'checked' : '').' name="special_'.$map.'" id="special_'.$map.'_'.$oneGroup->value.'"/>';
			$listAccess .= '</td><td>'.$oneGroup->text.'</td></tr>';
		}
		$listAccess .= '</table></div>';
		$return .= $listAccess;
		return $return;
	}
}