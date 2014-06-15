

				<div class="logo">
					<h1><a href="<?php echo $this->baseurl;?>"><img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template ?>/images/logo.png" alt="<?php echo $app->getCfg('sitename'); ?>"  /></a></h1>
				</div>
			
			<?php if($this->countModules('banner')) : ?>
				<div class="banner">
					<jdoc:include type="modules" name="banner" style="raw" />	
				</div>
			<?php endif; ?>
				<hr />
