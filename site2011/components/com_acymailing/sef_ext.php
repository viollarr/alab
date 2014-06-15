<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class sef_acymailing {
    function create($string) {
		$string = str_replace("&amp;", "&", preg_replace('#(index\.php\??)#i','',$string));
		$query = array();
		$allValues = explode('&',$string);
		foreach($allValues as $oneValue){
			list($var,$val) = explode('=',$oneValue);
			$query[$var] = $val;
		}
		$segments = array();
		if (isset($query['gtask'])) {
			$segments[] = $query['gtask'];
			unset( $query['gtask'] );
			if (isset($query['task'])) {
				$segments[] = $query['task'];
				unset( $query['task'] );
			}
		}elseif(isset($query['view'])){
			$segments[] = $query['view'];
			unset( $query['view'] );
			if(isset($query['layout'])){
				$segments[] = $query['layout'];
				unset( $query['layout'] );
			}
		}
		unset($query['option']);
		if(!empty($query)){
			foreach($query as $name => $value){
				$segments[] = $name.':'.$value;
			}
		}
        return implode('/',$segments);
    }
}