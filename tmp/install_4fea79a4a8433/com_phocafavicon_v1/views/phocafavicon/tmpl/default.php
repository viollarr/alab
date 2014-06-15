<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHTML::_('behavior.tooltip'); ?>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}

		// do field validation
		if (form.template.value == "0"){
			alert( "<?php echo JText::_( 'You must select a Template', true ); ?>" );
		} else if (form.filename.value == ""){
			alert( "<?php echo JText::_( 'You must select an Original Image', true ); ?>" );
		} else {
			submitform( pressbutton );
		}
	}
</script>

<style type="text/css">
	table.paramlist td.paramlist_key {
		width: 92px;
		text-align: left;
		height: 30px;
	}
</style>


<form action="<?php echo $this->request_url; ?>" method="post" name="adminForm" id="adminForm">
<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Create Favicon' ); ?></legend>

		<table class="admintable">
		
		<tr>
			<td valign="top" align="right" class="key">
				<?php echo JText::_( 'Template' ); ?>:
			</td>
			<td colspan="2">
				<?php echo $this->lists['template']; ?>
			</td>
		</tr>
		
		<tr>
			<td valign="middle" align="right" class="key">
				<label for="filename">
					<?php echo JText::_( 'Original Image' ); ?>:
				</label>
			</td>
			<td valign="middle">
				<input class="text_area" type="text" name="filename" id="filename" value="" size="32" maxlength="250" />
			</td>
			<td align="left" valign="middle">
				<div class="button2-left" style="display:inline">
					<div class="<?php echo $this->button->name; ?>">
						<a class="<?php echo $this->button->modalname; ?>" title="<?php echo $this->button->text; ?>" href="<?php echo $this->button->link; ?>" rel="<?php echo $this->button->options; ?>"  ><?php echo $this->button->text; ?></a>
					</div>
				</div>
			</td>
		</tr>
	</table>
	</fieldset>
</div>

<div class="clr"></div>

<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Phoca Favicon Info' ); ?></legend>
		<p><?php echo JText::_( 'Phoca Favicon Info Text' ); ?></p>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="phocafavicon" />
</form>
