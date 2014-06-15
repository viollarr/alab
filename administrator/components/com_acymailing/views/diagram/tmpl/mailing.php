<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript" src="<?php echo 'components/com_acymailing/inc/openflash/js/json/json2.js'; ?>"></script>
<script type="text/javascript" src="<?php echo 'components/com_acymailing/inc/openflash/js/swfobject.js'; ?>"></script>
<script type="text/javascript">
swfobject.embedSWF("<?php echo 'components/com_acymailing/inc/openflash/open-flash-chart.swf';?>", "sendprocess", "300", "200", "9.0.0", "expressInstall.swf",{"get-data":"get_data_1"});
swfobject.embedSWF("<?php echo 'components/com_acymailing/inc/openflash/open-flash-chart.swf';?>", "openclick", "100%", "300", "9.0.0", "expressInstall.swf",{"get-data":"get_data_2"});
swfobject.embedSWF("<?php echo 'components/com_acymailing/inc/openflash/open-flash-chart.swf';?>", "open", "300", "200", "9.0.0", "expressInstall.swf",{"get-data":"get_data_3"});
</script>
<script type="text/javascript">
function get_data_1()
{
	return JSON.stringify(data_1);
}
function get_data_2()
{
	return JSON.stringify(data_2);
}
function get_data_3()
{
	return JSON.stringify(data_3);
}
function findSWF(movieName) {
  if (navigator.appName.indexOf("Microsoft")!= -1) {
    return window[movieName];
  } else {
    return document[movieName];
  }
}
var data_1 = <?php echo $this->chart->toPrettyString(); ?>;
var data_2 = <?php echo $this->chart2->toPrettyString(); ?>;
var data_3 = <?php echo $this->chart3->toPrettyString(); ?>;
</script>
<div>
<h1><?php echo $this->mailing->subject.' : '.JText::sprintf('TOTAL_EMAIL_SENT',(int) $this->mailingstats->senthtml + (int)$this->mailingstats->senttext); ?></h1>
</div>
<table width="100%">
	<tr>
		<td valign="top" width="300">
			<div id="sendprocess"></div>
		</td>
		<td>
			<div style="float:left">
				<table style="text-align:left">
					<tr>
						<td>
							<div class="roundsubscrib rounddisp" style="background-color:#00FF00"></div>
						</td>
						<td>
						<?php echo $this->mailingstats->senthtml.' '.JText::_('SENT_HTML'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<div class="roundsubscrib rounddisp" style="background-color:#0000FF"></div>
						</td>
						<td>
						<?php echo $this->mailingstats->senttext.' '.JText::_('SENT_TEXT'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<div class="roundsubscrib rounddisp" style="background-color:#FF0000">
						</td>
						<td>
						<?php echo $this->mailingstats->fail.' '.JText::_('FAILED'); ?>
						</td>
					</tr>
				</table>
			</div>
			<div style="float:right;margin-top:50px">
				<table style="text-align:right">
					<tr>
						<td>
						<?php if(!empty($this->mailingstats->senthtml)) echo substr($this->mailingstats->openunique/$this->mailingstats->senthtml*100,0,5).'% '.JText::_('OPEN'); ?>
						</td>
						<td>
							<div class="roundsubscrib rounddisp" style="background-color:#00FF00"></div>
						</td>
					</tr>
					<tr>
						<td>
						<?php echo $this->mailingstats->senthtml - $this->mailingstats->openunique.' '.JText::_('NOT_OPEN'); ?>
						</td>
						<td>
							<div class="roundsubscrib rounddisp" style="background-color:#FF0000">
						</td>
					</tr>
				</table>
			</div>
		</td>
		<td  width="300">
			<div id="open"></div>
		</td>
	</tr>
</table>
<br/>
<div id="openclick"></div>