<div class="modalheader">
	<div style="float: right;">
		<button onclick="submitbutton('addfolder');">
			<?php echo JText::_('Save') ?>
		</button>
		<button onclick="window.parent.document.getElementById('sbox-window').close();" type="button">
			<?php echo JText::_('Close') ?>
		</button>
	</div>
</div>

<fieldset>
<legend><?php echo JText::_('New folder');?></legend>
	<table class="adminform">
	<tr>
		<td class="modal_key"><?php echo JText::_('Name');?></td>
		<td><input type="text" name="name" size="50" value=""></td>
	</tr>
	<tr>
		<td class="modal_key"><?php echo JText::_('Description');?></td>
		<td><textarea name="description" cols="50" rows="10"></textarea></td>
	</tr>
	</table>
</fieldset>