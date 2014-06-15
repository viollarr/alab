<?php
/**
* "Minted One-Point-Five" Administrator Template for Joomla 1.0.x - Version 1.0 (cpanel.php)
* License: http://www.gnu.org/copyleft/gpl.html
* Author: Fotis Evangelou
* Date Created: October 16th, 2006
* Copyright (c) 2006 JoomlaWorks.gr - http://www.joomlaworks.gr
* Project page at http://www.joomlaworks.gr - Demos at http://demo.joomlaworks.gr

* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Restricted access' );

?>

<table class="adminform" id="controlpanel">
  <tr>
    <td width="55%" valign="top"><?php mosLoadAdminModules( 'icon', 0 ); ?></td>
    <td width="45%" valign="top">
		<form action="index2.php" method="post" name="adminForm">
			<?php mosLoadAdminModules( 'cpanel', 1 ); ?>
		</form>
	</td>
  </tr>
</table>
