<?php
defined('_JEXEC') or die;
jimport( 'joomla.application.component.model' );

/**
 * Bookmarks model for Linkr component
 * 
 * @package	Linkr
 * @author		Frank
 */
class LinkrModelDocs extends JModel
{
	function getTemplate()
	{
		global $mainframe;
		
		$tmpl	= $mainframe->getUserStateFromRequest('linkr.docs', 'about', '', 'word');
		
		switch ( $tmpl )
		{
			case 'bookmarks':
				$template	= 'bookmarks';
				break;
			
			case 'related':
				$template	= 'related';
				break;
			
			default:
				$template	= 'faqs';
		}
		
		return $template;
	}
	
	function &getRssFeed()
	{
		// Disabled
		$params = & JComponentHelper::getParams('com_linkr');
		if (!$params->get('rss', 1)) {
			$false	= false;
			return $false;
		}
		
		// Return feeds
		return JFactory::getXMLparser('RSS', array(
			'rssUrl'	=> 'http://feeds.feedburner.com/JoomlaLinkr'
		));
	}
}

