<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;gtask=campaign" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'FILTER' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<th class="title titlenum">
					<?php echo JText::_( 'NUM' );?>
				</th>
				<th class="title titlebox">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_('NAME'), 'a.name', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_('DESCRIPTION'), 'a.description', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JText::_('FOLLOWUP'); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort', JText::_('ENABLED'), 'a.published', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titleid">
					<?php echo JHTML::_('grid.sort',   JText::_( 'ID' ), 'a.listid', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="7">
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
					$publishedid = 'published_'.$row->listid;
			?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php echo JHTML::_('grid.id', $i, $row->listid ); ?>
					</td>
					<td>
						<a href="<?php echo acymailing::completeLink('campaign&task=show&listid='.$row->listid);?>">
						<?php echo $row->name; ?>
						</a>
					</td>
					<td>
						<?php echo $row->description; ?>
					</td>
					<td>
						<a href="<?php echo acymailing::completeLink('followup&task=add&campaign='.$row->listid) ?>" title="<?php echo JText::_('FOLLOWUP_ADD',true)?>" ><img src="<?php echo '../images/M_images/new.png'; ?>" alt="<?php echo JText::_('FOLLOWUP_ADD')?>"/></a>
						<?php echo JText::sprintf('NUM_FOLLOWUP_CAMPAIGN',count($row->followup));
						if(!empty($row->followup)){
							echo '<table width="100%" style="padding-left:50px">';
							foreach($row->followup as $oneFollow){
								$publishedidfollow = 'published_'.$oneFollow->mailid;
								echo '<tr><td width="60px" align="right">'.$this->delay->display($oneFollow->senddate).'</td><td width="50%" align="left"><a title="'.JText::_('EDIT',true).'" href="'.acymailing::completeLink('followup&task=edit&campaign='.$row->listid.'&mailid=').$oneFollow->mailid.'">'.$oneFollow->subject.'</a></td><td class="titletoggle" align="center"><span id="'.$publishedidfollow.'" class="spanloading">'.$this->toggleClass->toggle($publishedidfollow,(int) $oneFollow->published,'mail').'</span></td></tr>';
							}
							echo '</table>';
						}?>
					</td>
					<td align="center">
						<span id="<?php echo $publishedid ?>" class="spanloading"><?php echo $this->toggleClass->toggle($publishedid,$row->published,'list') ?></span>
					</td>
					<td align="center">
						<?php echo $row->listid; ?>
					</td>
				</tr>
			<?php
					$k = 1-$k;
				}
			?>
		</tbody>
	</table>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="gtask" value="<?php echo JRequest::getCmd('gtask'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
