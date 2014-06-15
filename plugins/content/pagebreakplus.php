<?php
/**
 * @author     GeoXeo <contact@geoxeo.com>
 * @link       http://www.geoxeo.com
 * @copyright  Copyright (C) 2010 GeoXeo - All Rights Reserved
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * 
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'plgContentPagebreakPlus' );

/**
* Compatible with core Page break plugin
*
* <b>Usage:</b>
* <code><hr class="system-pagebreak" /></code>
* <code><hr class="system-pagebreak" title="The page title" /></code>
* or
* <code><hr class="system-pagebreak" alt="The first page" /></code>
* or
* <code><hr class="system-pagebreak" title="The page title" alt="The first page" /></code>
* or
* <code><hr class="system-pagebreak" alt="The first page" title="The page title" /></code>
*
*/
function plgContentPagebreakPlus( &$row, &$params, $page=0 )
{
	// expression to search for
	$regex = '#<hr([^>]*?)class=(\"|\')system-pagebreak(\"|\')([^>]*?)\/*>#iU';

	// Get Plugin info
	$plugin			=& JPluginHelper::getPlugin('content', 'pagebreakplus');
	$pluginParams	= new JParameter( $plugin->params );

	$print   = JRequest::getBool('print');
	$showall = JRequest::getBool('showall');

	JPlugin::loadLanguage( 'plg_content_pagebreak' );

	if (!$pluginParams->get('enabled', 1)) {
		$print = true;
	}

	if ($print) {
		$row->text = preg_replace( $regex, '<br />', $row->text );
		return true;
	}

	//simple performance check to determine whether bot should process further
    if ( strpos( $row->text, 'class="system-pagebreak' ) === false && strpos( $row->text, 'class=\'system-pagebreak' ) === false ) {
		return true;
	}

    $view  = JRequest::getCmd('view');

	if(!$page) {
		$page = 0;
	}


	// check whether plugin has been unpublished
	if (!JPluginHelper::isEnabled('content', 'pagebreakplus') || $params->get( 'intro_only' )|| $params->get( 'popup' ) || $view != 'article') {
		$row->text = preg_replace( $regex, '', $row->text );
		return;
	}

	// find all instances of plugin and put in $matches
	$matches = array();
	preg_match_all( $regex, $row->text, $matches, PREG_SET_ORDER );

	if (($showall && $pluginParams->get('showall', 1) ))
	{
		$hasToc = $pluginParams->get( 'multipage_toc', 1 );
		if ( $hasToc ) {
			// display TOC
			$page = 1;
			plgContentPagebreakPlusCreateTOC( $row, $matches, $page );
		} else {
			$row->toc = '';
		}
		$row->text = preg_replace( $regex, '<br/>', $row->text );
		return true;
	}

	// split the text around the plugin
	$text = preg_split( $regex, $row->text );

	// count the number of pages
	$n = count( $text );
	
	$row->pagebreaktitle = $row->title;
	
	// we have found at least one plugin, therefore at least 2 pages
	if ($n > 1)
	{
		// Get plugin parameters
		$pluginParams = new JParameter( $plugin->params );
		$title	= $pluginParams->get( 'title', 1 );
		$hasToc = $pluginParams->get( 'multipage_toc', 1 );

		// adds heading or title to <site> Title
		if ( $title )
		{
			if ( $page ) {
				$page_text = $page + 1;
				if ( $page && @$matches[$page-1][2] )
				{
					$attrs = JUtility::parseAttributes($matches[$page-1][0]);

					if ( @$attrs['title'] ) {
						$row->title = $row->title.' - '.$attrs['title'];
					} else {
						$thispage = $page + 1;
						$row->title = $row->title.' - '.JText::_( 'Page' ).' '.$thispage;
					}
				}
			}
		}

		// traditional mos page navigation
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $n, $page, 1 );

		// reset the text, we already hold it in the $text array
		$row->text = '';

		// display TOC
		if ( $hasToc ) {
			plgContentPagebreakPlusCreateTOC( $row, $matches, $page, $n, $pageNav);
		} else {
			$row->toc = '';
		}

		// page text
		$text[$page] = str_replace("<hr id=\"\"system-readmore\"\" />", "", $text[$page]);
		$row->text .= $text[$page];

		// page links shown at bottom of page if TOC disabled
		if (!$hasToc) {
			$row->text .= '<br />';
			$row->text .= '<div class="pagenavbar">';
			$row->text .= $pageNav->getPagesLinks();
			$row->text .= '</div><br />';
		}

	}

	return true;
}

function plgContentPagebreakPlusCreateTOC( &$row, &$matches, &$page, &$n = null)
{
	// Get Plugin info
	$plugin =& JPluginHelper::getPlugin('content', 'pagebreakplus');
	$params = new JParameter( $plugin->params );
	
	if (isset($row->pagebreaktitle)) {$heading = $row->pagebreaktitle;} else {$heading = $row->title;}
	$limitstart = JRequest::getInt('limitstart', 0);
	$showall = JRequest::getInt('showall', 0);
	$setfirsttabtext = $params->get('set-first-tab-text', 0);
	$firsttabtext = $params->get('first-tab-text', '');
	$navposition = $params->get('nav-position', 0);
	$ordered_list = $params->get('ordered-list', 0);
	if($setfirsttabtext && $firsttabtext) {
		$heading = $firsttabtext;
	}
	
	// TOC Header
	$row->toc = '<div id="contenttoc">';

	if($n != null && $navposition == 1) {
		$row->toc .= '<div class="tocnav top">';
		plgContentPagebreakPlusCreateNavigation( $row, $page, $n );
		// page counter
		$pageId = $page + 1;
		$row->toc .= "$pageId - $n";
		$row->toc .= '<div style="clear: both"></div></div>';
	}

	if($ordered_list) {
		$row->toc .= '<ol>';
	}
	else {
		$row->toc .= '<ul>';
	}
	
	// TOC First Page link
	$selected = ($limitstart === 0 && $showall === 0) ? 'selected' : '';
	$row->toc .= '
	<li class="'. $selected .'">
		<a href="'. JRoute::_( '&showall=&limitstart=') .'">'
		. $heading .
		'</a>
	</li>
	';

	$i = 2;

	foreach ( $matches as $bot )
	{
		$link = JRoute::_( '&showall=&limitstart='. ($i-1) );


		if ( @$bot[0] )
		{
			$attrs2 = JUtility::parseAttributes($bot[0]);

			if ( @$attrs2['alt'] )
			{
				$title	= stripslashes( $attrs2['alt'] );
			}
			elseif ( @$attrs2['title'] )
			{
				$title	= stripslashes( $attrs2['title'] );
			}
			else
			{
				$title	= JText::sprintf( 'Page #', $i );
			}
		}
		else
		{
			$title	= JText::sprintf( 'Page #', $i );
		}

		$selected = ($limitstart == $i-1) ? 'selected' : '';
		$row->toc .= '
			<li class="'. $selected .'">
				<a href="'. $link .'">'
				. $title .
				'</a>
			</li>
			';
		$i++;
	}

	if ($params->get('showall') )
	{
		$link = JRoute::_( '&showall=1&limitstart=');
		$selected = ($showall == 1) ? 'selected' : '';
		$row->toc .= '
		<li class="'. $selected .'">
			<a href="'. $link .'">'
			. JText::_( 'All Pages' ) .
			'</a>
		</li>
		';
	}
	
	if($ordered_list) {
		$row->toc .= '</ol>';
	}
	else {
		$row->toc .= '</ul>';
	}
		
	if($n != null && $navposition == 2) {
		$row->toc .= '<div class="tocnav bottom">';
		plgContentPagebreakPlusCreateNavigation( $row, $page, $n );
		// page counter
		$pageId = $page + 1;
		$row->toc .= "$pageId - $n";
		$row->toc .= '<div style="clear: both"></div></div>';
	}
	
	$row->toc .= '</div>';
	
	// TOC style
	$style = 'default';
	$document	= & JFactory::getDocument();
	// orientation
	if (0 == $params->get('orientation', 0)) {
		$document->addStyleSheet('plugins/content/pagebreakplus/'.$style.'/vertical.css');
		if (1 == $params->get('position', 0)) {
			$document->addStyleSheet('plugins/content/pagebreakplus/'.$style.'/left.css');
		}
	}
	else {
		$document->addStyleSheet('plugins/content/pagebreakplus/'.$style.'/horizontal.css');
	}
	if(1 == $params->get('parent', 0)) {
		$document->addStyleSheet('plugins/content/pagebreakplus/'.$style.'/module.css');
		JRequest::setVar('article-toc', $row->toc);
		$row->toc = '';
	}
	
}

function plgContentPagebreakPlusCreateNavigation( &$row, $page, $n )
{
	$pnSpace = "";
	if (JText::_( '&lt' ) || JText::_( '&gt' )) $pnSpace = " ";

	$next = JText::_( 'Next' );
	$classNextInactive = " inactive";
	if ( $page < $n-1 )
	{
		$page_next = $page + 1;

		$link_next = JRoute::_( '&limitstart='. ( $page_next ) );
		// Next >>
		$next = '<a href="'. $link_next .'">' . $next .'</a>';
		$classNextInactive = "";
	}

	$classPrevInactive = " inactive";
	$prev = JText::_( 'Prev' );
	if ( $page > 0 )
	{
		$page_prev = $page - 1 == 0 ? "" : $page - 1;

		$link_prev = JRoute::_(  '&limitstart='. ( $page_prev) );
		// << Prev
		$prev = '<a href="'. $link_prev .'">'. $prev .'</a>';
		$classPrevInactive = "";
	}


	$row->toc .= '<div class="prev'.$classPrevInactive.'">' . $prev .'</div>' . '<div class="next'.$classNextInactive.'">' . $next .'</div>';
}
