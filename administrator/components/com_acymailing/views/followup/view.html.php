<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include(ACYMAILING_BACK.'views'.DS.'newsletter'.DS.'view.html.php');
class FollowupViewFollowup extends NewsletterViewNewsletter
{
	var $type = 'followup';
	var $gtask = 'followup';
	var $nameForm = 'FOLLOWUP';
}
