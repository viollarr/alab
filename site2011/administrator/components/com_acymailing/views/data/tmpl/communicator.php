<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
	$db =& JFactory::getDBO();
	$db->setQuery('SELECT count(*) FROM '.acymailing::table('communicator_subscribers',false));
	$resultUsers = $db->loadResult();
?>
There are <?php echo $resultUsers ?> users in Communicator.