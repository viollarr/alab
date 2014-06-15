<?php defined('_JEXEC') or die('Restricted access'); ?>		
<div class="phocafavicon-box-file-i">
	<center>
		<div class="phocafavicon-box-file-first-i">
			<div class="phocafavicon-box-file-second">
				<div class="phocafavicon-box-file-third">
					<center>
					<a href="#" onclick="window.top.document.forms.adminForm.elements.filename.value = '<?php echo $this->_tmp_img->path_with_name_relative_no; ?>';window.parent.document.getElementById('sbox-window').close();">
	<?php echo JHTML::_( 'image.administrator', $this->_tmp_img->linkthumbnailpath, ''); ?></a>
					</center>
				</div>
			</div>
		</div>
	</center>
	
	<div class="name"><?php echo $this->_tmp_img->name; ?></div>
		<div class="detail" style="text-align:right">
			<a href="#" onclick="window.top.document.forms.adminForm.elements.filename.value = '<?php echo $this->_tmp_img->path_with_name_relative_no; ?>';window.parent.document.getElementById('sbox-window').close();"><img src="../administrator/components/com_phocafavicon/assets/images/icon-insert.gif" alt="<?php echo JText::_('Insert image') ?>" title="<?php echo JText::_('Insert image') ?>" /></a>
		</div>
		<div style="clear:both"></div>
	</div>
</div>
