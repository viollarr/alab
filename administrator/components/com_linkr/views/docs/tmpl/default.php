<?php
defined('_JEXEC') or die;

// Feed
if ($this->feed)
{
?>
<div style="margin-bottom:20px;padding-bottom:10px;border-bottom:1px solid #dddddd;text-align:center;">
<?php
	echo $this->loadTemplate('feed');
?>
</div>
<?php
}
else {
	echo '<br />';
}
?>

<a name="goto"></a>
<div>
	<a href="http://j.l33p.com/linkr" target="_blank" id="linkr">Linkr <?php echo LINKR_VERSION_READ; ?></a>
	&nbsp;&nbsp;
	<?php echo JText::_('Go to:'); ?>&nbsp;
	<a href="index.php?option=com_linkr&view=docs&about=bookmarks#goto"><?php echo JText::_('BOOKMARKING'); ?></a>
	&nbsp;|&nbsp;
	<a href="index.php?option=com_linkr&view=docs&about=related#goto"><?php echo JText::_('RELATED_ARTICLES'); ?></a>
	&nbsp;|&nbsp;
	<a href="index.php?option=com_linkr&view=docs&about=faqs#goto"><?php echo JText::_('FAQs'); ?></a>
	&nbsp;|&nbsp;
	<a href="http://extensions.joomla.org/extensions/4010/details" target="_blank">JED &#187;</a>
	<!-- http://extensions.joomla.org/index.php?option=com_mtree&task=viewlink&link_id=4010 -->
</div>

<?php echo $this->loadTemplate($this->about); ?>

<div style="margin-top:15px;padding-top:15px;border-top:1px solid #dddddd;text-align:center;">
	<?php
	$linkr	= '<a href="http://j.l33p.com/linkr/about" target="_blank">';
	$frank	= '<a href="mailto:dev@l33p.com?subject=Linkr">';
	$fback	= '<a href="http://j.l33p.com/linkr/support" target="_blank">';
	$api	= '<a href="http://j.l33p.com/api/linkr/intro" target="_blank">';
	$egs	= '<a href="http://j.l33p.com/api/linkr/tutorials" target="_blank">';
	echo JText::sprintf('LINKR_CREATED_BY', '</a>', $linkr, $frank, $fback, $api, $egs);
	?>
</div>