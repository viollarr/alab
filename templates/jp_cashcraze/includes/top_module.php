

<!-- Top Content Area -->

<div id="top_module">

<?php if ($this->countModules( 'user1' )) : ?>

      <div class="usertop"><jdoc:include type="modules" name="user1" style="rounded" /></div>

    <?php endif; ?>

 

    <?php if ($this->countModules( 'user2' )) : ?>

      <div class="usertop"><jdoc:include type="modules" name="user2" style="rounded" /></div>

    <?php endif; ?>



	<?php if ($this->countModules( 'user3' )) : ?>

      <div class="usertop"><jdoc:include type="modules" name="user3" style="rounded" /></div>

    <?php endif; ?>

	

	<div class="jpclear"></div><!--AUTO HEIGH FIX FOR FIREFOX -->	



</div>



