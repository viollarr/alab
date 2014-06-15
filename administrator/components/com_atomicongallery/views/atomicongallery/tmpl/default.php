<?php
/**
 * @version $Id$
 * @package    AtomiconGallery
 * @subpackage _ECR_SUBPACKAGE_
 * @author     Yvo van Dillen {@link http://www.atomicon.nl}
 * @author     Created on 08-Jan-2010
 */

//-- No direct access
defined('_JEXEC') or die('Restricted');

?>

<?php echo Atomicon::startAdminForm(array(), true); ?>
<input type="hidden" id="folder" name="folder" value="<?php echo htmlspecialchars($this->folder);?>">
<input type="hidden" name="boxchecked" value="" />

<?php echo $this->loadTemplate($this->template); ?>

<?php echo Atomicon::endAdminForm(); ?>