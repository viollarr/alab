<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php if($this->values->filter) { ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="100%">
				<?php echo JText::_( 'JOOMEXT_FILTER' ); ?>:
				<input type="text" name="search" id="acymailingsearch" value="<?php echo $this->escape($this->pageInfo->search);?>" class="inputbox" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'JOOMEXT_GO' ); ?></button>
				<button onclick="document.getElementById('acymailingsearch').value='';this.form.submit();"><?php echo JText::_( 'JOOMEXT_RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
			</td>
		</tr>
	</table>
<?php } ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php
		$nbcols = $this->values->show_senddate ? 3 : 2;
		if($this->values->show_headings) { ?>
		<thead>
			<tr>
				<td class="sectiontableheader<?php echo $this->values->suffix; ?>" align="center">
					<?php echo JText::_( 'NUM' );?>
				</td>
				<td class="sectiontableheader<?php echo $this->values->suffix; ?>" align="center">
					<?php echo JHTML::_('grid.sort', JText::_('JOOMEXT_SUBJECT').' ', 'a.subject', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</td>
				<?php if($this->values->show_senddate) { ?>
				<td class="sectiontableheader<?php echo $this->values->suffix; ?>" align="center">
					<?php echo JHTML::_('grid.sort', JText::_('SEND_DATE').' ', 'a.senddate', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</td>
				<?php } ?>
			</tr>
		</thead>
	<?php } ?>
		<tfoot>
			<tr>
				<td colspan="<?php echo $nbcols ?>" class="sectiontablefooter<?php echo $this->values->suffix; ?>" align="center">
					<?php echo $this->pagination->getPagesLinks(); ?>
				</td>
			</tr>
			<tr>
				<td colspan="<?php echo $nbcols ?>" class="sectiontablefooter<?php echo $this->values->suffix; ?>" align="right">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				$k = 1;
				for($i = 0,$a = count($this->rows);$i<$a;$i++){
					$row =& $this->rows[$i];
			?>
				<tr class="<?php echo "sectiontableentry$k".$this->values->suffix; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td>
						<a href="<?php echo acymailing::completeLink('archive&task=view&listid='.$this->list->listid.':'.$this->list->alias.'&mailid='.$row->mailid.':'.$row->alias); ?>">
							<?php echo $row->subject; ?>
						</a>
						<?php if($this->access->frontEndManament){ ?>
							<a href="<?php echo acymailing::completeLink('newsletter&task=edit&mailid='.$row->mailid.'&listid='.$this->list->listid); ?>"><img src="<?php if($row->visible AND $row->published) echo "images/M_images/edit.png"; else echo "images/M_images/edit_unpublished.png"; ?>"/></a>
						<?php }?>
					</td>
					<?php if($this->values->show_senddate) { ?>
					<td align="center" nowrap="nowrap">
						<?php echo acymailing::getDate($row->senddate); ?>
					</td>
					<?php } ?>
				</tr>
			<?php
					$k = 3-$k;
				}
			?>
		</tbody>
	</table>