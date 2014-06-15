<?php

// no direct access
defined('_JEXEC') or die;

$modules =& JModuleHelper::getModules($position); 
?>

<!-- PromoSpace module - Another Quality Freebie from TemplatePlazza -->
<div id="tppromospace" <?php if ($params->get('bgimage')): ?> style="background-image:url(<?php echo $params->get('bgimage');?>)"<?php endif;?>>

<?php 
	foreach ($modules as $module) 
		{
		echo JModuleHelper::renderModule($module);
		}
	?>
	<div id="button-close">Close</div>
	<div class="clrfix"></div>
</div>
<div id="button-show">Show</div>
<div class="clrfix"></div>