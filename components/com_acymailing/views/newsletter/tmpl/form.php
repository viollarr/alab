<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php include(dirname(__FILE__).DS.'form_menu.php'); ?>
<div id="acymailing_edit">
<form action="<?php echo acymailing::completeLink('newsletter'); ?>" method="post" name="adminForm" autocomplete="off" enctype="multipart/form-data">
	<?php include(ACYMAILING_BACK.'views'.DS.'newsletter'.DS.'tmpl'.DS.'info.form.php'); ?>
	<?php include(ACYMAILING_BACK.'views'.DS.'newsletter'.DS.'tmpl'.DS.'param.form.php'); ?>
	<fieldset class="adminform" width="100%" id="htmlfieldset">
		<legend><?php echo JText::_( 'HTML_VERSION' ); ?></legend>
		<div style="float:right;"><?php if(empty($this->mail->mailid)){ ?><a class="modal"  rel="{handler: 'iframe', size: {x: 750, y: 550}}" href="<?php echo acymailing::completeLink("fronttemplate&task=theme",true ); ?>"><button type="button" onclick="return false"><?php echo JText::_('ACY_TEMPLATE'); ?></button></a> <?php } ?>
		<a class="modal" rel="{handler: 'iframe', size: {x: 750, y: 550}}" href="<?php echo acymailing::completeLink("fronttag&task=tag&type=".$this->type,true ); ?>"><button type="button" onclick="return false"><?php echo JText::_('TAGS'); ?></button></a></div>
		<div style="clear:both"><?php echo $this->editor->display(); ?></div>
	</fieldset>
	<fieldset class="adminform" >
		<legend><?php echo JText::_( 'TEXT_VERSION' ); ?></legend>
		<textarea style="width:100%" rows="20" name="data[mail][altbody]" id="altbody" ><?php echo @$this->mail->altbody; ?></textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo @$this->mail->mailid; ?>" />
	<input type="hidden" id="tempid" name="data[mail][tempid]" value="<?php echo @$this->mail->tempid; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="data[mail][type]" value="news" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="gtask" value="newsletter" />
	<input type="hidden" name="listid" value="<?php echo JRequest::getInt('listid'); ?>"/>
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>