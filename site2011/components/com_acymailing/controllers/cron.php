<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class CronController extends JController{
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerDefaultTask('cron');
	}
	function cron(){
		$config = acymailing::config();
		if($config->get('queue_type') == 'manual'){
			acymailing::display(JText::_('MANUAL_ONLY'),'info');
			return false;
		}
		$cronHelper = acymailing::get('helper.cron');
		$cronHelper->report = true;
		$launched = $cronHelper->cron();
		if($launched){
			$cronHelper->report();
		}
	}
}