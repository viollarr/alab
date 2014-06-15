<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<table class="adminform">
	<tr>
		<td class="key">
			<label for="subject">
				<?php echo JText::_( 'JOOMEXT_SUBJECT' ); ?>
			</label>
		</td>
		<td>
			<input type="text" name="data[mail][subject]" id="subject" class="inputbox" style="width:80%" value="<?php echo $this->escape(@$this->mail->subject); ?>" />
		</td>
		<td class="key">
        	<label for="published">
          	<?php echo JText::_( 'PUBLISHED' ); ?>
        	</label>
		</td>
		<td>
			<?php echo ($this->mail->published == 2) ? JText::_('SCHED_NEWS') : JHTML::_('select.booleanlist', "data[mail][published]" , '',$this->mail->published); ?>
		</td>
	</tr>
	<tr>
		<td class="key">
			<label for="alias">
				<?php echo JText::_( 'JOOMEXT_ALIAS' ); ?>
            </label>
		</td>
		<td>
            <input class="inputbox" type="text" name="data[mail][alias]" id="alias" size="50" value="<?php echo @$this->mail->alias; ?>" />
		</td>
		<td class="key">
			<label for="visible">
				<?php echo JText::_( 'JOOMEXT_VISIBLE' ); ?>
			</label>
		</td>
		<td>
			<?php echo JHTML::_('select.booleanlist', "data[mail][visible]" , '',$this->mail->visible); ?>
		</td>
	</tr>
	<tr>
		<td class="key">
			<?php echo JText::_( 'CREATED_DATE' ); ?>
		</td>
		<td>
			<?php echo acymailing::getDate(@$this->mail->created);?>
		</td>
		<td class="key">
			<?php echo JText::_( 'SEND_HTML' ); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.booleanlist', "data[mail][html]" , 'onchange="updateEditor(this.value)"',$this->mail->html); ?>
		</td>
	</tr>
	<?php if(!empty($this->mail->senddate)){?>
	<tr>
		<td class="key">
			<?php echo JText::_( 'SEND_DATE' ); ?>
		</td>
		<td colspan=3>
			<?php echo acymailing::getDate(@$this->mail->senddate);?>
		</td>
	</tr>
	<?php } ?>
</table>