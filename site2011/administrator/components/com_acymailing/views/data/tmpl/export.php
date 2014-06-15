<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm">
	<table width="100%">
		<tbody>
			<tr>
				<td valign="top" width="50%">
					<fieldset class="adminform">
					<legend><?php echo JText::_( 'FIELD_EXPORT' ); ?></legend>
						<table class="adminlist" cellpadding="1">
						<?php
						$k = 0;
						foreach( $this->fields as $fieldName => $fieldType){?>
							<tr class="<?php echo "row$k"; ?>">
								<td>
									<?php echo $fieldName ?>
								</td>
								<td align="center">
									<?php echo JHTML::_('select.booleanlist', "exportdata[".$fieldName."]",'',in_array($fieldName,array('email','name','confirmed','html')) ? 1 : 0); ?>
								</td>
							</tr>
							<?php
							$k = 1-$k;
						}?>
							<tr>
								<td>
									<?php echo JText::_('EXPORT_FORMAT'); ?>
								</td>
								<td align="center">
									<?php echo $this->charset->display('exportformat','UTF-8'); ?>
								</td>
							</tr>
						</table>
					</fieldset>
					<fieldset>
					<legend><?php echo JText::_( 'FILTERS' ); ?></legend>
						<table class="adminlist" cellpadding="1">
							<tr class="row0">
								<td>
									<?php echo JText::_('EXPORT_SUB_LIST'); ?>
								</td>
								<td align="center">
									<?php echo JHTML::_('select.booleanlist', "exportfilter[subscribed]",'',1,JText::_('Yes'),JText::_('No').' : '.JText::_('ALL_USERS')); ?>
								</td>
							</tr>
							<tr class="row1">
								<td>
									<?php echo JText::_('EXPORT_CONFIRMED'); ?>
								</td>
								<td align="center">
									<?php echo JHTML::_('select.booleanlist', "exportfilter[confirmed]",'',0,JText::_('Yes'),JText::_('No').' : '.JText::_('ALL_USERS')); ?>
								</td>
							</tr>
							<tr class="row0">
								<td>
									<?php echo JText::_('EXPORT_REGISTERED'); ?>
								</td>
								<td align="center">
									<?php echo JHTML::_('select.booleanlist', "exportfilter[registered]",'',0,JText::_('Yes'),JText::_('No').' : '.JText::_('ALL_USERS')); ?>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
				<td valign="top">
					<fieldset class="adminform">
						<legend><?php echo JText::_( 'LISTS' ); ?></legend>
						<table class="adminlist" cellpadding="1">
						<?php
						$k = 0;
						foreach( $this->lists as $row){?>
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
								<td align="center">
									<?php echo JHTML::_('select.booleanlist', "exportlists[".$row->listid."]",'',1); ?>
								</td>
							</tr>
							<?php
							$k = 1-$k;
						}?>
						</table>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="gtask" value="<?php echo JRequest::getCmd('gtask'); ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
