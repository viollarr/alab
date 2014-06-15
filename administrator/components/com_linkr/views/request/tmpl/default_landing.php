<?php defined('_JEXEC') or die; ?>
<div id="linkr">

<div class="llGroup" style="border-bottom:2px solid #ddd;">
	<div class="llTitle">
		<img alt="..." src="<?php echo JURI::root(); ?>administrator/components/com_linkr/assets/linkr.gif" />
	</div>
	<div class="llContent">
		<a href="#" onclick="LinkrBookmarks.landing()">
			<?php echo JText::_('CREATE_BOOKMARK'); ?>
		</a>&nbsp;|&nbsp;
		<a href="#" onclick="LinkrRelated.landing()">
			<?php echo JText::_('CREATE_RELATED'); ?>
		</a>&nbsp;|&nbsp;
		<a href="#" onclick="LinkrHelper.insertAtEnd('{linkr:none}')">
			{linkr:none}
		</a>&nbsp;|&nbsp;<?php echo LINKR_VERSION_READ; ?>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="llGroup" style="border-bottom:2px solid silver;">
	<div class="llTitle">
		<?php echo JText::_('LINK'); ?>
	</div>
	<div class="llContent">
		<?php echo implode(' | ', $this->links); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div id="layout">
	<div style="padding:50px;text-align:center;font-size:14px;letter-spacing:3px;">
		<?php echo JText::_('LL_INSTRUCTIONS'); ?>
	</div>
</div>

</div>
