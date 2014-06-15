<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="contentheading"><?php echo $this->mail->subject; ?>
<?php
		if($this->frontEndManagement){
	?>
		<a href="<?php echo acymailing::completeLink('newsletter&task=edit&mailid='.$this->mail->mailid.'&listid='.$this->list->listid); ?>"><img src="images/M_images/edit.png"/></a>
	<?php } ?>
</div>
<div class="newsletter_body" ><?php echo $this->mail->html ? $this->mail->body : nl2br($this->mail->altbody); ?></div>
<?php if(!empty($this->mail->attachments)){?>
<fieldset><legend><?php echo JText::_( 'ATTACHMENTS' ); ?></legend>
<table>
	<?php foreach($this->mail->attachments as $attachment){
			echo '<tr><td><a href="'.$attachment->url.'" target="_blank">'.$attachment->name.'</a></td></tr>';
	}?>
</table>
</fieldset>
<?php } ?>