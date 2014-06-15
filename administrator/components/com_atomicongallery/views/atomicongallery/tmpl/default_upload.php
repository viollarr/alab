<div class="modalheader">
	<div style="float: right;">
		<button onclick="submitbutton('upload');">
			<?php echo JText::_('Upload') ?>
		</button>
		<button onclick="window.parent.document.getElementById('sbox-window').close();" type="button">
			<?php echo JText::_('Close') ?>
		</button>
	</div>
</div>

<div class="notice center">
	<?php echo JText::_('Maximum size: ') . Atomicon::getByteSize(Atomicon::getMaxUploadSize()); ?>
</div>

<fieldset>
	<legend><?php echo JText::_('Add Images'); ?></legend>
	<table class="adminform">
	    <tr>
	        <td><?php echo JText::_('Add images or a zipfile');?></td>
		</tr>
		<tr>
	        <td id="file_upload_container">
	            <?php for($i=0;$i<10;$i++) { ?>
				<input class="file_upload" type="file" id="upload_file_<?php echo $i;?>" name="upload_file_<?php echo $i;?>" onchange="addFileUpload(<?php echo $i+1;?>)">
				<?php } ?>
			</td>
		</tr>
	</table>
</fieldset>
