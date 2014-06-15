<div class="modalheader">
	<div style="float: right;">
		<button onclick="submitbutton('save_descriptions');">
			<?php echo JText::_('Save') ?>
		</button>
		<button onclick="window.parent.document.getElementById('sbox-window').close();" type="button">
			<?php echo JText::_('Close') ?>
		</button>
	</div>
</div>

<fieldset>
<legend><?php echo JText::_('Folder description');?></legend>
	<table class="adminform">
	<tr>
		<td class="modal_key"><?php echo JText::_('Folder description');?></td>
		<td><textarea name="descriptions[_folder]" rows="5" cols="50"><?php echo htmlspecialchars(AtomiconGallery::getFolderDescription($this->folder));?></textarea></td>
	</tr>
	</table>
</fieldset>

<?php if (count($this->files) > 0) : ?>

<fieldset>
<legend><?php echo JText::_('File descriptions');?></legend>
	<table class="adminform">
<?php $count = 0; ?>
<?php foreach($this->files as $item) : ?>
	<tr class="row<?php echo $count & 1;?>">
		<td class="modal_key">
		    <span class="hasTip" title="<img src=&quot;<?php echo $item['thumbnail'];?>&quot;>">
				<img src="<?php echo $item['thumbnail'];?>" width="20">
				<?php echo htmlspecialchars($item['title']); ?>
			</span>
		</td>
		<td><input type="text" name="descriptions[<?php echo htmlspecialchars($item['title']); ?>]" size="50" value="<?php echo htmlspecialchars($item['description']);?>"></td>
	</tr>
<?php $count ++; ?>
<?php endforeach; ?>
	</table>
</fieldset>

<?php endif; // count files ?>