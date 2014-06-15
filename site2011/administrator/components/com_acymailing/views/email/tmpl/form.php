<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm" autocomplete="off" enctype="multipart/form-data">
	<fieldset>
		<div class="header icon-48-newsletter" style="float: left;"><?php echo JText::_('EMAIL_NAME').' : '.$this->mail->subject; ?></div>
		<div class="toolbar" id="toolbar" style="float: right;">
			<button type="button" onclick="javascript:submitbutton('test')"><?php echo JText::_('SEND_TEST'); ?></button>
			<button type="button" onclick="javascript:submitbutton('apply')"><?php echo JText::_('SAVE'); ?></button>
		</div>
	</fieldset>
		<?php include(dirname(__FILE__).DS.'param.'.basename(__FILE__)); ?>
		<br/>
		<fieldset class="adminform" width="100%" id="htmlfieldset">
			<legend><?php echo JText::_( 'HTML_VERSION' ); ?></legend>
			<?php echo $this->editor->display(); ?>
		</fieldset>
		<fieldset class="adminform" >
			<legend><?php echo JText::_( 'TEXT_VERSION' ); ?></legend>
			<textarea style="width:100%" rows="20" name="data[mail][altbody]" id="altbody" ><?php echo @$this->mail->altbody; ?></textarea>
		</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo @$this->mail->mailid; ?>" />
	<?php if(!empty($this->mail->type)){ ?>
		<input type="hidden" name="data[mail][type]" value="<?php echo $this->mail->type; ?>" />
	<?php } ?>
	<input type="hidden" id="tempid" name="data[mail][tempid]" value="<?php echo @$this->mail->tempid; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="gtask" value="email" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>