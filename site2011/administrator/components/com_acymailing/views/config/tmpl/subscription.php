<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="page-subscription">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'SUBSCRIPTION' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('ALLOW_VISITOR_DESC'), JText::_('ALLOW_VISITOR'), '', JText::_('ALLOW_VISITOR')); ?>
				</td>
				<td>
					<?php echo $this->elements->allow_visitor; ?>
				</td>
			</tr>
			<tr>
				<td class="key">
				<?php echo acymailing::tooltip(JText::_('REQUIRE_CONFIRM_DESC'), JText::_('REQUIRE_CONFIRM'), '', JText::_('REQUIRE_CONFIRM')); ?>
				</td>
				<td>
					<?php echo $this->elements->require_confirmation; ?>
					<?php echo $this->elements->editConfEmail; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'NOTIFICATIONS' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('NOTIF_CREATE_DESC'), JText::_('NOTIF_CREATE'), '', JText::_('NOTIF_CREATE')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" name="config[notification_created]" size="50" value="<?php echo $this->config->get('notification_created'); ?>">
					<?php echo $this->elements->edit_notification_created; ?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('NOTIF_UNSUBALL_DESC'), JText::_('NOTIF_UNSUBALL'), '', JText::_('NOTIF_UNSUBALL')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" name="config[notification_unsuball]" size="50" value="<?php echo $this->config->get('notification_unsuball'); ?>">
					<?php echo $this->elements->edit_notification_unsuball; ?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('NOTIF_REFUSE_DESC'), JText::_('NOTIF_REFUSE'), '', JText::_('NOTIF_REFUSE')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" name="config[notification_refuse]" size="50" value="<?php echo $this->config->get('notification_refuse'); ?>">
					<?php echo $this->elements->edit_notification_refuse; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'REDIRECTIONS' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key">
				<?php echo acymailing::tooltip(JText::_('REDIRECTION_CONFIRM_DESC'), JText::_('REDIRECTION_CONFIRM'), '', JText::_('REDIRECTION_CONFIRM')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" id="confirm_redirect" name="config[confirm_redirect]" size="60" value="<?php echo $this->config->get('confirm_redirect') ?>">
				</td>
			</tr>
			<tr>
				<td class="key">
				<?php echo acymailing::tooltip(JText::_('REDIRECTION_UNSUB_DESC'), JText::_('REDIRECTION_UNSUB'), '', JText::_('REDIRECTION_UNSUB')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" id="unsub_redirect" name="config[unsub_redirect]" size="60" value="<?php echo $this->config->get('unsub_redirect') ?>">
				</td>
			</tr>
		</table>
	</fieldset>
</div>