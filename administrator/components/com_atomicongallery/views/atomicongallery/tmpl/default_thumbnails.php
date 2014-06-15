<div class="modalheader">
	<div style="float: right;">
		<button onclick="processImages(); return false;">
			<?php echo JText::_('Process') ?>
		</button>
		<button onclick="window.parent.document.getElementById('sbox-window').close();" type="button">
			<?php echo JText::_('Close') ?>
		</button>
	</div>
</div>

<div id="images_process">
<fieldset>
	<legend><?php echo JText::_('Process Images'); ?></legend>

 	<table class="adminform">
		<tr>
		    <td><?php echo JText::_('Create thumbnails');?></td>
		    <td><input id="tn_process" type="checkbox" checked="checked" value="1"></td>
		</tr>

		<tr>
		    <td><?php echo JText::_('Skip if exists?');?></td>
		    <td><input id="skip_if_exists" type="checkbox" checked="checked" value="1"></td>
  		</tr>

		<tr>
		    <td><?php echo JText::_('Width');?></td>
		    <td><input type="text" id="tn_width" name="tn_width" value="<?php echo $this->params->get('tn_width', 150);?>"></td>
		</tr>

		<tr>
		    <td><?php echo JText::_('Height');?></td>
		    <td><input type="text" id="tn_height" name="tn_height" value="<?php echo $this->params->get('tn_height', 150);?>"></td>
		</tr>

  		<tr>
		    <td colspan="2"><hr></td>
		</tr>

		<tr class="hasTip" title="<?php echo JText::_('IMAGE_RESIZE_WARNING'); ?>">
		    <td><?php echo JText::_('Resize images');?></td>
		    <td><input id="img_process" type="checkbox" value="1"></td>
		</tr>

        <tr>
		    <td><?php echo JText::_('Width');?></td>
		    <td><input type="text" id="img_width" name="img_width" value="<?php echo $this->params->get('img_width', 800);?>"></td>
		</tr>

		<tr>
		    <td><?php echo JText::_('Height');?></td>
		    <td><input type="text" id="img_height" name="img_height" value="<?php echo $this->params->get('img_height', 600);?>"></td>
		</tr>

		<tr>
		    <td colspan="2"><hr></td>
		</tr>

        <tr>
		    <td><?php echo JText::_('Image library');?></td>
		    <td><?php echo imageHelper::renderLibs('imagelib'); ?></td>
  		</tr>
  		
		<tr id="progressbar-container" style="display: none;">
		    <td colspan="2">
		        <div id="progressbar"></div>
			</td>
		</tr>
	</table>
</fieldset>
<?php $count = 0; ?>
<?php foreach($this->files as $item) : ?>
<input type="hidden" id="file_<?php echo $count; ?>" value="<?php echo htmlspecialchars($item['title']); ?>">
<?php $count++; ?>
<?php endforeach; ?>
</div>