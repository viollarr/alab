<?php
defined('_JEXEC') or die;

// Output filter
jimport('joomla.filter.filteroutput');

// Feed title
echo '<a href="http://feeds.feedburner.com/JoomlaLinkr" target="_blank">Linkr RSS</a>';

// Feed items
echo '<div style="padding:4px;">';
$items	= $this->feed->get_items();
$total	= count($items);
for ($n = 0; $n < $total, $n < 3; $n++)
{
	echo '<div>';
	$i	= & $items[$n];
	
	// Title
	echo '<strong>'. $i->get_title() .'</strong>';
	
	// Description
	$desc	= JFilterOutput::cleanText($i->get_description());
	//$desc	= html_entity_decode($desc, ENT_COMPAT, 'UTF-8');
	$desc	= html_entity_decode($desc, ENT_COMPAT); // PHP4 compatibility
	if (strlen($desc) > 160) {
		$desc	= substr($desc, 0, 160) .'...';
	}
	echo ' - '. htmlspecialchars($desc, ENT_COMPAT, 'UTF-8');
	
	// Item link
	$link	= $i->get_link();
	$link	= $link ? $link : 'http://j.l33p.com/linkr';
	echo ' '. JHTML::link($link, '&#187;', array('target' => '_blank'));
	
	echo '</div>';
}
echo '</div>';

