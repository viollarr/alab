<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<style type="text/css">
div.templatearea{
	float:left;
	border:1px solid #ccc;
	margin:5px;
	padding:5px;
	cursor:pointer;
	height:200px;
}
div.templatearea:hover{
	background-color : #FFFFDD;
	border :2px solid #ccc;
	margin : 4px;
}
div.templatetitle{
	white-space: nowrap;
	font-size:12pt;
}
div.templatedescription{
}
</style>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'JOOMEXT_FILTER' ); ?>:
				<input type="text" name="search" id="acymailingsearch" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'JOOMEXT_GO' ); ?></button>
				<button onclick="document.getElementById('acymailingsearch').value='';this.form.submit();"><?php echo JText::_( 'JOOMEXT_RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<td>
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</thead>
	</table>
			<?php
				for($i = 0,$a = count($this->rows);$i<$a;$i++){
					$row =& $this->rows[$i];
			?>
				<div class="templatearea" onclick="applyTemplate(<?php echo $row->tempid?>);">
						<div class="templatetitle"><?php echo $row->name; ?></div>
						<div class="templatedescription"><?php echo acymailing::absoluteURL($row->description);	?></div>
						<div style="display:none" id="htmlcontent_<?php echo $row->tempid;?>"><?php echo acymailing::absoluteURL($row->body);?></div>
						<div style="display:none" id="textcontent_<?php echo $row->tempid;?>"><?php echo $row->altbody;?></div>
				</div>
			<?php
				}
			?>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="theme" />
	<input type="hidden" name="gtask" value="<?php echo JRequest::getCmd('gtask'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
