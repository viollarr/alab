<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="page-files">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'FILES' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
					<?php echo acymailing::tooltip(JText::_('ALLOWED_FILES_DESC'), JText::_('ALLOWED_FILES'), '', JText::_('ALLOWED_FILES')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" name="config[allowedfiles]" size="60" value="<?php echo strtolower(str_replace(' ','',$this->config->get('allowedfiles'))); ?>">
				</td>
			</tr>
			<tr>
				<td class="key">
					<?php echo acymailing::tooltip(JText::_('UPLOAD_FOLDER_DESC'), JText::_('UPLOAD_FOLDER'), '', JText::_('UPLOAD_FOLDER')); ?>
				</td>
				<td>
					<input class="inputbox" type="text" name="config[uploadfolder]" size="60" value="<?php echo $this->config->get('uploadfolder'); ?>">
				</td>
			</tr>
		</table>
	</fieldset>
</div>