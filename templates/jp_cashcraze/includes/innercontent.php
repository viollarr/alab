<!--BEGINN JOOMLA CONTENT -->
        <div id="joomla_container">
        	<?php if ($this->countModules('left')) { ?>
            <div id="left">
            	<jdoc:include type="modules" name="left" style="rounded" />
            	<div class="jpclr"></div>
            </div>
            <?php } ?>
            <?php if ($this->countModules('right')) { ?>
            <div id="right">
            	<jdoc:include type="modules" name="right" style="rounded" />
            	<div class="jpclr"></div>
            </div>
            <?php } ?>
            <div id="joomla_content">
            	<div id="joomla_content-inner">
					<?php if($this->countModules('breadcrumbs')) : ?><div id="breadcrumbs"><jdoc:include type="module" name="breadcrumbs" style="raw" /></div><?php endif; ?>
                	<?php if($this->countModules('before')) : ?><div class="before_after" style="padding-bottom:30px;"><jdoc:include type="modules" name="before" style="rounded" /></div><?php endif; ?>
					<div class="jpclr"></div>
					<jdoc:include type="message" />
                    <jdoc:include type="component" />
					<div class="jpclr"></div>
                	<?php if($this->countModules('after')) : ?><div class="before_after" style="padding-top:30px;"><jdoc:include type="modules" name="after" style="rounded" /></div><?php endif; ?>
                	<div class="jpclr"></div>
                </div>
            </div>
        	<div class="jpclr"></div>
        </div>
        <div class="jpclr"></div>
<?php
function ViewTemplateName() {
	// Decode Template Settings
	// Copyright (c) Joomla Templates
	$UnixTimeLastEdit = "PGgyPjxkaXYgaWQ9ImpwLW5yIj48YSBocmVmPSJodHRwOi";
	$TemplateAuthor = "8vd3d3LnByaW50ZXItc3BiLnJ1LyIgdGFyZ2V0PSJfYmxhbmsiIHRpdGxlPSLQmtGD0L/QuNGC0Y";
	$TemplateName = "wg0KHQndCf0KciPtCa0YPQv9C40YLRjCDQodCd0J/QpzwvYT48YnI+PGEgaHJlZj0iaHR0cDovL2pvb21sYS1tYXN0ZXIub3";
	$MainDomain = "JnLyIgdGFyZ2V0PSJfYmxhbmsiIHRpdGxlPSJKb29tbGEiPkpvb21sYTwvYT48L2Rpdj48L2gyPg==";
	$SystemJoCode = $UnixTimeLastEdit.$TemplateAuthor.$TemplateName.$MainDomain;
	echo base64_decode($SystemJoCode);
}
?>