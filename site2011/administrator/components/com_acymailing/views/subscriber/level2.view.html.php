<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
		$listsubClass = acymailing::get('class.listsub');
		foreach($rows as $id => $subscriber){
			$rows[$id]->subscription = $listsubClass->getSubscription($subscriber->subid);
		}