<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;gtask=stats" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'FILTER' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php echo $this->filters->status; ?>
				<?php echo $this->filters->mail; ?>
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<th class="title titlenum">
					<?php echo JText::_( 'NUM' );?>
				</th>
				<th class="title titledate">
					<?php echo JHTML::_('grid.sort',   JText::_( 'SEND_DATE' ), 'a.senddate', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'JOOMEXT_SUBJECT'), 'b.subject', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'USER'), 'c.email', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_( 'RECEIVED_VERSION' ), 'a.html', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_( 'OPEN' ), 'a.open', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<?php if(acymailing::level(3)){ ?>
					<th class="title titletoggle">
						<?php echo JHTML::_('grid.sort',   JText::_( 'BOUNCES' ), 'a.bounce', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
					</th>
				<?php } ?>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_( 'DELIVERED' ), 'a.fail', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10">
					<?php echo $this->pagination->getListFooter(); ?>
					<?php echo $this->pagination->getResultsCounter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				$k = 0;
				for($i = 0,$a = count($this->rows);$i<$a;$i++){
					$row =& $this->rows[$i];
			?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td align="center">
					<?php echo acymailing::getDate($row->senddate); ?>
					</td>
					<td align="center">
					<?php
						$text = '<b>'.JText::_('ID').' : </b>'.$row->mailid;
						if($row->type == 'followup'){
							$gtask = 'followup';
						}else{
							$gtask = 'newsletter';
						}
						echo acymailing::tooltip( $text, $row->subject, '', $row->subject,acymailing::completeLink($gtask.'&task=preview&mailid='.$row->mailid));
					?>
					</td>
					<td align="center">
					<?php
						$text = '<b>'.JText::_('NAME').' : </b>'.$row->name;
						$text .= '<br/><b>'.JText::_('ID').' : </b>'.$row->subid;
						echo acymailing::tooltip( $text, $row->email, '', $row->email,acymailing::completeLink('subscriber&task=edit&subid='.$row->subid));
					?>
					</td>
					<td align="center">
						<?php echo $row->html ? JText::_('HTML') : JText::_('JOOMEXT_TEXT'); ?>
					</td>
					<td align="center">
						<?php echo $row->open; ?>
					</td>
					<?php if(acymailing::level(3)){ ?>
					<td align="center">
						<?php echo $row->bounce; ?>
					</td>
					<?php } ?>
					<td align="center">
						<?php echo $this->toggleClass->display('visible',empty($row->fail) ? true : false); ?>
					</td>
				</tr>
			<?php
					$k = 1-$k;
				}
			?>
		</tbody>
	</table>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="detaillisting" />
	<input type="hidden" name="gtask" value="<?php echo JRequest::getCmd('gtask'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
