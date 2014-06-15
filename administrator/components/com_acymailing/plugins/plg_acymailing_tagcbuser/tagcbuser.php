<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTagcbuser extends JPlugin
{
	function plgAcymailingTagcbuser(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'tagcbuser');
			$this->params = new JParameter( $plugin->params );
		}
    }
	 function acymailing_getPluginType() {
	 	$onePlugin = null;
	 	$onePlugin->name = JText::_('CB User');
	 	$onePlugin->function = 'acymailingtagcb_show';
	 	$onePlugin->help = 'plugin-tagcbuser';
	 	return $onePlugin;
	 }
	 function acymailingtagcb_show(){
		$text = '<table class="adminlist" cellpadding="1">';
		$db =& JFactory::getDBO();
		$tableInfos = $db->getTableFields(acymailing::table('comprofiler',false));
		$db->setQuery('SELECT name,type FROM #__comprofiler_fields');
		$fieldType = $db->loadObjectList('name');
		$k = 0;
		$fields = reset($tableInfos);
		$text .= '<tr style="cursor:pointer" class="row1" onclick="setTag(\'{cbtag:thumb}\');insertTag();" ><td>Thumb Avatar</td></tr>';
		foreach($fields as $fieldname => $oneField){
			$type = '';
			if(strpos(strtolower($oneField),'date') !== false) $type = '|type:date';
			if(!empty($fieldType[$fieldname]) AND $fieldType[$fieldname]->type == 'image') $type = '|type:image';
			$text .= '<tr style="cursor:pointer" class="row'.$k.'" onclick="setTag(\'{cbtag:'.$fieldname.$type.'}\');insertTag();" ><td>'.$fieldname.'</td></tr>';
			$k = 1-$k;
		}
		$text .= '</table>';
		echo $text;
	 }
	function acymailing_replaceusertagspreview(&$email,&$user){
		return $this->acymailing_replaceusertags($email,$user);
	}
	function acymailing_replaceusertags(&$email,&$user){
		$match = '#{cbtag:(.*)}#Ui';
		$variables = array('subject','body','altbody');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return;
		$values = null;
		if(!empty($user->userid)){
			$db= JFactory::getDBO();
			$db->setQuery('SELECT * FROM '.acymailing::table('comprofiler',false).' WHERE user_id = '.$user->userid.' LIMIT 1');
			$values = $db->loadObject();
		}
		$tags = array();
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				if(isset($tags[$oneTag])) continue;
				$arguments = explode('|',$allresults[1][$i]);
				$field = $arguments[0];
				unset($arguments[0]);
				$mytag = null;
				$mytag->default = $this->params->get('default_'.$field,'');
				if(!empty($arguments)){
					foreach($arguments as $onearg){
						$args = explode(':',$onearg);
						if(isset($args[1])){
							$mytag->$args[0] = $args[1];
						}else{
							$mytag->$args[0] = 1;
						}
					}
				}
				$replaceme = isset($values->$field) ? $values->$field : $mytag->default;
				if(!empty($mytag->type)){
					if($mytag->type == 'date'){
						$replaceme = acymailing::getDate(strtotime($replaceme));
					}
					if($mytag->type == 'image' AND !empty($replaceme)){
						$replaceme = '<img src="'.ACYMAILING_LIVE.'images/comprofiler/'.$replaceme.'"/>';
					}
				}
				if($field == 'thumb'){
					$replaceme = '<img src="'.ACYMAILING_LIVE.'images/comprofiler/tn'.$values->avatar.'"/>';
				}elseif($field == 'avatar'){
					$replaceme = '<img src="'.ACYMAILING_LIVE.'images/comprofiler/'.$values->avatar.'"/>';
				}
				$tags[$oneTag] = $replaceme;
			}
		}
		foreach($results as $var => $allresults){
			$email->$var = str_replace(array_keys($tags),$tags,$email->$var);
		}
	 }//endfct
}//endclass