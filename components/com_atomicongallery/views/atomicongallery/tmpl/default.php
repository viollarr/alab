<?php
/**
 * @version $Id$
 * @package    AtomiconGallery
 * @subpackage _ECR_SUBPACKAGE_
 * @author     Atomicon {@link http://www.atomicon.nl}
 * @author     Created on 12-Jan-2010
 */

//-- No direct access
defined('_JEXEC') or die('Restricted');

//Atomicon::debug($this->gallery);
if ($this->params->get('add_inline_css',1)) {
	$css = '
#atomicongallery .thumbnail
{
	width: '.$this->params->get('tn_width', 100).'px;
	height: '.$this->params->get('tn_height', 100).'px;
}
';
	$doc = &JFactory::getDocument();
	$doc->addStyleDeclaration($css);
}
//

?>
<?php defined('_JEXEC') or die('Restricted access'); ?>

<div id="atomicongallery">

<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->params->get( 'page_title' ); ?>
</div>
<?php endif; ?>

<?php echo $this->loadTemplate('folders'); ?>
<?php echo $this->loadTemplate('files'); ?>

</div>