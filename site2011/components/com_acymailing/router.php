<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
function AcymailingBuildRoute( &$query )
{
	$segments = array();
	$newQuery = array();
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
	}else{
		if (!empty($query['Itemid'])) {
			$menus = &JSite::getMenu();
			$menu = &$menus->getItem($query['Itemid']);
			if(!empty($menu->query['view'])) $segments[] = $menu->query['view'];
			if(!empty($menu->query['layout'])) $segments[] =  $menu->query['layout'];
			if(!empty($menu->alias)){
				$segments[] =  $query['Itemid'].'-'.$menu->alias;
				unset($query['Itemid']);
			}
		}
	}
	if(!empty($query)){
		foreach($query as $name => $value){
			if($name != 'option'){
				$segments[] = $name.':'.$value;
			}else{
				$newQuery[$name] = $value;
			}
		}
		$query = $newQuery;
	}
	return $segments;
}
function AcymailingParseRoute( $segments )
{
	$vars = array();
	if(!empty($segments)){
		$i = 0;
		foreach($segments as $name){
			if(strpos($name,':')){
				list($arg,$val) = explode(':',$name);
				if(is_numeric($arg)) $vars['Itemid'] = $arg;
				else $vars[$arg] = $val;
			}else{
				$i++;
				if($i == 1) $vars['gtask'] = $name;
				elseif($i == 2) $vars['task'] = $name;
			}
		}
	}
	return $vars;
}