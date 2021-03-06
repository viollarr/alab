<?php
/**
 * @version $Id$
 * Kunena Component
 * @package Kunena
 *
 * @Copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 *
 **/
defined ( '_JEXEC' ) or die ();

?>
<div class="kblock kinfomessage">
	<div class="kheader">
		<h2><span><?php echo $this->header; ?></span></h2>
	</div>
	<div class="kcontainer">
		<div class="kbody">
			<?php echo $this->contents; ?>
		</div>
	</div>
</div>