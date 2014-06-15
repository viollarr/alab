<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;gtask=statsurl" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'FILTER' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php echo $this->filters->mail; ?>
				<?php echo $this->filters->url; ?>
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<th class="title titlenum">
					<?php echo JText::_( 'NUM' );?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'JOOMEXT_SUBJECT'), 'b.subject', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort',   JText::_( 'URL' ), 'c.name', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort',   JText::_( 'NAME' ), 'd.name', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_( 'TOTAL_HITS' ), 'a.click', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
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
					$id = 'urlclick'.$i;
			?>
				<tr class="<?php echo "row$k"; ?>" id="<?php echo $id; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php
						$text = '<b>'.JText::_('ID',true).' : </b>'.$row->mailid;
						echo acymailing::tooltip($text, $row->subject, '', $row->subject);
						?>
					</td>
					<td align="center">
					<?php
						$text = '<b>'.JText::_('ID',true).' : </b>'.$row->urlid;
						echo acymailing::tooltip($text, $row->urlname, '', $row->urlname,strip_tags($row->url));
						?>
					</td>
					<td align="center">
						<?php
						$text = '<b>'.JText::_('NAME',true).' : </b>'.$row->name;
						$text .= '<br/><b>'.JText::_('EMAIL',true).' : </b>'.$row->email;
						$text .= '<br/><b>'.JText::_('ID',true).' : </b>'.$row->subid;
						echo acymailing::tooltip($text, $row->name, '', $row->name);
						?>
					</td>
					<td align="center">
						<?php echo $row->click; ?>
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
	<input type="hidden" name="tmpl" value="component" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
