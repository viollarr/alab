		<?php if($this->countModules('header1 or header2 or header3 or header4 or header5 or header6 or header7 or header8 or header9 or header10 or header11 or header12')) : ?>
			<div class="slide_module">
				<div class="template_width">

					<!-- Start Slider-->
					<div class="mask1">
						<div id="box">
						
						<!-- Slide 1-->
						<?php if($this->countModules('header1')) : ?>
						
							<jdoc:include type="modules" name="header1" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 2-->
						<?php if($this->countModules('header2')) : ?>

							<jdoc:include type="modules" name="header2" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 3-->
						<?php if($this->countModules('header3')) : ?>

							<jdoc:include type="modules" name="header3" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 4-->
						<?php if($this->countModules('header4')) : ?>

							<jdoc:include type="modules" name="header4" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 5-->
						<?php if($this->countModules('header5')) : ?>

							<jdoc:include type="modules" name="header5" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 6-->
						<?php if($this->countModules('header6')) : ?>

							<jdoc:include type="modules" name="header6" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 7-->
						<?php if($this->countModules('header7')) : ?>

							<jdoc:include type="modules" name="header7" style="xhtml" />	

						<?php endif; ?>
			
						<!-- Slide 8-->
						<?php if($this->countModules('header8')) : ?>

							<jdoc:include type="modules" name="header8" style="xhtml" />	

						<?php endif; ?>

						<!-- Slide 9-->
						<?php if($this->countModules('header9')) : ?>

							<jdoc:include type="modules" name="header9" style="xhtml" />	

						<?php endif; ?>
			
						<!-- Slide 10-->
						<?php if($this->countModules('header10')) : ?>

							<jdoc:include type="modules" name="header10" style="xhtml" />	

						<?php endif; ?>
			
						<!-- Slide 11-->
						<?php if($this->countModules('header11')) : ?>

							<jdoc:include type="modules" name="header11" style="xhtml" />	

						<?php endif; ?>
			
						<!-- Slide 12-->
						<?php if($this->countModules('header12')) : ?>

							<jdoc:include type="modules" name="header12" style="xhtml" />	

						<?php endif; ?>

						</div>
					</div>
						<div class="slider_controls" <?php if($this->params->get('sliderArrows') == 1) : ?><?php else: ?> style="display:none"<?php endif; ?>>
								<p class="buttons">
								<span id="prev"><a href="#">&nbsp;</a></span>
								<span id="play"><a href="#">&nbsp;</a></span>
								<span id="stop"><a href="#">&nbsp;</a></span>
								<span id="next"><a href="#">&nbsp;</a></span>
							</p>
						</div>
								
				</div>
			</div>
			<hr />
		<?php endif; ?>