<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<fieldset>
	<div class="header" style="float: left;"><h1><?php echo JText::_('PREVIEW').' : '.@$this->mail->subject; ?></h1></div>
	<div class="toolbar" id="toolbar" style="float: right;">
		<button type="button" onclick="if(confirm('<?php echo JText::_('PROCESS_CONFIRMATION',true); ?>')){submitbutton('send')};"><?php echo JText::_('SEND'); ?></button>
		<button type="button" onclick="javascript:submitbutton('cancel')"><?php echo JText::_('CANCEL'); ?></button>
	</div>
</fieldset>