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
swfobject.embedSWF("<?php echo 'components/com_acymailing/inc/openflash/open-flash-chart.swf';?>", "my_chart", "100%", "400", "9.0.0");
</script>
<script type="text/javascript">
function open_flash_chart_data()
{
    return JSON.stringify(data);
}
function findSWF(movieName) {
  if (navigator.appName.indexOf("Microsoft")!= -1) {
    return window[movieName];
  } else {
    return document[movieName];
  }
}
var data = <?php echo $this->chart->toPrettyString(); ?>;
</script>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;gtask=diagram" method="post" name="adminForm">
<table>
	<tr>
		<td width="100%">
		</td>
		<td nowrap="nowrap">
			<?php echo $this->filters->task; ?>
		</td>
	</tr>
</table>
<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
<input type="hidden" name="gtask" value="diagram" />
</form>
<div id="my_chart"></div>