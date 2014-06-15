<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm" autocomplete="off">
	<table cellspacing="1" width="100%">
		<tr>
			<td valign="top" width="50%">
				<fieldset class="adminform">
					<legend><?php echo JText::_( 'DESCRIPTION' ); ?></legend>
					<?php echo $this->list->description; ?>
				</fieldset>
			</td>
			<td valign="top">
				<fieldset class="adminform">
					<legend><?php echo JText::_( 'LISTS' ); ?></legend>
					<?php echo JText::_('CAMPAIGN_START')?>
					<table class="adminlist" cellpadding="1">
						<tbody>
					<?php
							$k = 0;
							for($i = 0,$a = count($this->lists);$i<$a;$i++){
								$row =& $this->lists[$i];
					?>
							<tr class="<?php echo "row$k"; ?>">
								<td>
									<?php echo '<div class="roundsubscrib rounddisp" style="background-color:'.$row->color.'"></div>'; ?>
									<?php
									$text = '<b>'.JText::_('ID').' : </b>'.$row->listid;
									$text .= '<br/>'.str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->description);
									$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->name);
									echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title);
									?>
								</td>
							</tr>
					<?php
								$k = 1-$k;
							}
						?>
						</tbody>
					</table>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php include(dirname(__FILE__).DS.'followup.php'); ?>
			</td>
		</tr>
	</table>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo $this->list->listid; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="gtask" value="campaign" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
