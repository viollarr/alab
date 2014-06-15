<?php
/**
 * Plugin Helper File
 *
 * @package     Modules Anywhere
 * @version     1.3.4
 *
 * @author      Peter van Westen <peter@nonumber.nl>
 * @link        http://www.nonumber.nl
 * @copyright   Copyright (C) 2010 NoNumber! All Rights Reserved
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// Ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport( 'joomla.event.plugin' );

/**
* Plugin that places Modules
*/
class plgSystemModulesAnywhereHelper
{
	function init( &$params ) {
		$this->params = $this->getParamValues( $params );

		$break_tags_start =			'(?:<p(?: [^>]*)?>\s*)?';
		$break_tags_end =			'(?:\s*</p>)?';

		$tags = array();
		$tags[] = preg_quote( $this->params->module_tag );
		$tags[] = preg_quote( $this->params->modulepos_tag );
		if ( $this->params->handle_loadposition ) { $tags[] = 'loadposition'; }
		$tags = '('.implode( '|', $tags ).')';

		$this->params->regex =		'#'.$break_tags_start.'\{'.$tags.'(?: ([^\}\|]*))?((?:\|[^\}]+)?)\}'.$break_tags_end.'#s';

		$acl =& JFactory::getACL();
		$this->params->acl = $acl->get_group_data( $this->params->articles_security_level );
		$this->params->acl = $this->params->acl['4'];
		$this->params->acls = array();
		
		$user =& JFactory::getUser();
		$this->params->aid = $user->get( 'aid', 0 );
		$this->params->aid_jaclplus = $user->get( 'jaclplus', 0 );
	}

////////////////////////////////////////////////////////////////////
// ARTICLES
////////////////////////////////////////////////////////////////////

	function replaceInArticles ( &$article ) {
		$message = '';

		if ( isset( $article->created_by ) ) {
			// Lookup group level of creator
			if ( !isset( $this->params->acls[$article->created_by] ) ) {
				$acl =& JFactory::getACL();
				$this->params->acls[$article->created_by] = $acl->getAroGroup( $article->created_by );
			}
			$article_group = $this->params->acls[$article->created_by];

			if ( !isset( $article_group->lft ) ) {
				$article_group->lft = 0;
			}

			// Set if security is passed
			// passed = creator is equal or higher than security group level
			if ( $this->params->acl > $article_group->lft ) {
				$message = JText::_( 'REMOVED, SECURITY' );
			}
		}

		if ( isset( $article->text ) ) {
			$this->processModules( $article->text, 'articles', $message );
		}
		if ( isset( $article->description ) ) {
			$this->processModules( $article->description, 'articles', $message );
		}
		if ( isset( $article->title ) ) {
			$this->processModules( $article->title, 'articles', $message );
		}
		if ( isset( $article->author ) ) {
			if ( isset( $article->author->name ) ) {
				$this->processModules( $article->author->name, 'articles', $message );
			} else if ( is_string( $article->author ) ) {
				$this->processModules( $article->author, 'articles', $message );
			}
		}
	}

////////////////////////////////////////////////////////////////////
// COMPONENTS
////////////////////////////////////////////////////////////////////

	function replaceInComponents()
	{
		$document	=& JFactory::getDocument();
		$docType = $document->getType();

		if ( $docType == 'feed' && isset( $document->items ) ) {
			for ( $i = 0; $i < count( $document->items ); $i++ ) {
				$this->replaceInArticles( $document->items[$i] );
			}
		}

		if ( isset( $document->_buffer ) ) {
			$this->tagArea( $document->_buffer, 'component' );
		}

		// PDF
		if ( $docType == 'pdf' ) {
			if ( isset( $document->_header ) ) {
				$this->replaceInTheRest( $document->_header );
				$this->cleanLeftoverJunk( $document->_header );
			}
			if ( isset( $document->title ) ) {
				$this->replaceInTheRest( $document->title );
				$this->cleanLeftoverJunk( $document->title );
			}
			if ( isset( $document->_buffer ) ) {
				$this->replaceInTheRest( $document->_buffer );
				$this->cleanLeftoverJunk( $document->_buffer );
			}
		}
	}

////////////////////////////////////////////////////////////////////
// OTHER AREAS
////////////////////////////////////////////////////////////////////
	function replaceInOtherAreas()
	{
		$document	=& JFactory::getDocument();
		$docType = $document->getType();

		// not in pdf's
		if ( $docType == 'pdf' ) { return; }

		$html = JResponse::getBody();

		$this->protect( $html );
		$this->replaceInTheRest( $html );

		// only do the handling inside the body
		if ( !( strpos( $html, '<body' ) === false ) && !( strpos( $html, '</body>' ) === false ) ) {
			$html_split = explode( '<body', $html );
			$body_split = explode( '</body>', $html_split['1'] );

			// remove generated articles outside the body
			$this->removeGeneratedModules( $html_split['0'] );
			$this->removeGeneratedModules( $body_split['1'] );

			$html_split['1'] = implode( '</body>', $body_split );
			$html = implode( '<body', $html_split );
		}

		$this->cleanLeftoverJunk( $html );
		$this->unprotect( $html );

		JResponse::setBody( $html );
	}

	function replaceInTheRest( &$str, $docType = 'html' )
	{
		if ( $str == '' ) { return; }

		$option = JRequest::getCmd( 'option' );

		$document	=& JFactory::getDocument();
		$docType = $document->getType();

		// COMPONENT
		if ( $docType == 'feed' ) {
			$search_regex = '#(<item[^>]*>.*</item>)#si';
			$str = preg_replace( $search_regex, '<!-- START: MODA_COMPONENT -->\1<!-- END: MODA_COMPONENT -->', $str );
		}
		if ( strpos( $str, '<!-- START: MODA_COMPONENT -->' ) === false ) {
			$this->tagArea( $str, 'component' );
		}

		$components = $this->params->components;
		if ( !is_array( $components ) ) {
			$components = explode( ',', $components );
		}

		$message = '';
		if ( in_array( $option, $components ) ) {
			// For all components that are selected, set the meassage
			$message = JText::_( 'REMOVED, NOT ENABLED' );
		}

		$components = $this->getTagArea( $str, 'component' );

		foreach ( $components as $component ) {
			$this->processModules( $component[1], 'components', $message );
			$str = str_replace( $component[0], $component[1], $str );
		}

		// EVERYWHERE
		$this->processModules( $str, 'other' );
	}

	function tagArea( &$str, $area = '' )
	{
		if ( $area ) {
			if ( is_array( $str ) ) {
				foreach ( $str as $key => $val ) {
					$this->tagArea( $val, $area );
					$str[ $key ] = $val;
				}
			} else if ( $str ) {
				$str = '<!-- START: MODA_'.strtoupper( $area ).' -->'.$str.'<!-- END: MODA_'.strtoupper( $area ).' -->';
			}
		}
	}
	function getTagArea( $str, $area = '' )
	{
		$matches = array( '', '' );

		if ( $str && $area ) {
			preg_match_all( '#<\!-- START: MODA_'.strtoupper( $area ).' -->(.*?)<\!-- END: MODA_'.strtoupper( $area ).' -->#s', $str, $matches, PREG_SET_ORDER );
		}

		return $matches;
	}

	function processModules( &$string, $area = 'articles', $message = '' )
	{
		jimport('joomla.application.module.helper');

		if ( preg_match_all( $this->params->regex, $string, $matches, PREG_SET_ORDER ) > 0 ) {
			JPluginHelper::importPlugin( 'content' );

			if (
				$area == 'articles' && !$this->params->articles_enable ||
				$area == 'components' && !$this->params->components_enable ||
				$area == 'other' && !$this->params->other_enable
			) {
				$message = JText::_( 'REMOVED, NOT ENABLED' );
			}

			foreach ( $matches as $match ) {
				$module_html = $match['0'];
				$type = trim( $match['1'] );
				$module = trim( $match['2'] );
				$style = trim( $match['3'] );

				if ( $message != '' ) {
					$module_html = '<!-- '.JText::_( 'Comment - Modules Anywhere' ).': '.$message.' -->';
				} else {

					if ( $this->params->override_style && $style ) {
						$style = substr( $style, 1 );
					} else {
						$style = $this->params->style;
					}

					if ( $type == $this->params->module_tag ) {
						// module
						$module_html	= $this->processModule( $module, $style );
					} else {
						// module position
						$module_html	= $this->processPosition( $module, $style );
					}
				}
				$string = str_replace( $match['0'], '<!-- >>> Modules Anywhere >>> -->'.$module_html.'<!-- <<< Modules Anywhere <<< -->', $string );
			}
		}
	}
	function processPosition( $position, $style = 'none' )
	{
		$document	=& JFactory::getDocument();
		$renderer	= $document->loadRenderer( 'module' );

		$html = '';
		foreach ( JModuleHelper::getModules( $position ) as $mod ) {
			$html .= $renderer->render( $mod, array( 'style'=>$style ) );
		}
		return $html;
	}

	function processModule( $module, $style = 'none' )
	{
		$mainframe =& JFactory::getApplication();

		$db =& JFactory::getDBO();
			
		$where = ' AND ( m.title='.$db->Quote( html_entity_decoder( $module ) ).'';
		if ( is_numeric( $module ) ) {
			$where .= ' OR m.id='.$module;
		}
		$where .=  ' ) ';
		if ( !$this->params->ignore_state ) {
			$where .= ' AND m.published = 1';
		}
		
		$query =
			'SELECT *'
			.' FROM #__modules AS m'
			.' WHERE m.access '.( defined( '_JACL' ) ? 'IN ('.$this->params->aid_jaclplus.')' : '<= '. (int) $this->params->aid )
			.' AND m.client_id = '.(int) $mainframe->getClientId()
			.$where
			.' ORDER BY ordering'
			.' LIMIT 1';

		$db->setQuery( $query );
		$row = $db->loadObject();

		$html = '';
		if ( $row ) {
			//determine if this is a custom module
			$row->user = ( substr( $row->module, 0, 4 ) == 'mod_' ) ? 0 : 1;
			$row->style = $style;

			$attribs = array();
			$attribs['style'] = $style;

			$module = new JModuleHelper;
			$html =& $module->renderModule( $row, $attribs );
		}
		return $html;
	}

		/*
	 * Protect input and text area's
	 */
	function protect( &$string )
	{
		$mainframe =& JFactory::getApplication();
		$option = JRequest::getCmd( 'option' );
		$task = JRequest::getCmd( 'task' );

		// Protect complete adminForm (to prevent articles from being created when editing articles and such)
		$regex = '#<form [^>]*name="adminForm".*?>.*?<div id="editor-xtd-buttons".*?</form>#si';
		if ( preg_match_all( $regex, $string, $matches, PREG_SET_ORDER ) > 0 ) {
			$protected_syntax = $this->protectStr( '{'.$this->params->module_tag );
			foreach ( $matches as $match ) {
				if ( !( strpos( $match[0], '{'.$this->params->module_tag ) === false ) ) {
					$form_string = str_replace( '{'.$this->params->module_tag, $protected_syntax, $match[0] );
					$string = str_replace( $match[0], $form_string, $string );
				}
			}
		}
	}

	function unprotect( &$string )
	{
		$protected_start = $this->protectStr( '{'.$this->params->module_tag );
		$string = str_replace( $protected_start, '{'.$this->params->module_tag, $string );
	}

	function protectStr( $string )
	{
		$string = base64_encode( $string );
		return $string;
	}

	function cleanLeftoverJunk( &$str )
	{
		$str = preg_replace( $this->params->regex, '', $str );
		$str = preg_replace( '#<\!-- (START|END): MODA_[^>]* -->#', '', $str );
	}

	function removeGeneratedModules( &$str )
	{
		$start_comment = '<!-- >>> Modules Anywhere >>> -->';
		$end_comment = '<!-- <<< Modules Anywhere <<< -->';
		$str = preg_replace( '#'.preg_quote( $start_comment, '#' ).'.*?'.preg_quote( $end_comment, '#' ).'\s*#s', '', $str );
		$str = preg_replace( '#'.preg_quote( htmlentities( $start_comment ), '#' ).'.*?'.preg_quote( htmlentities( $end_comment ), '#' ).'\s*#s', '', $str );
	}
	
	function getParamValues( &$params ) {
		$values = '';
		if ( isset( $params->_xml ) ) {
			foreach ( $params->_xml as $xml_group ) {
				foreach ( $xml_group->children() as $xml_child ) {
					$key = $xml_child->attributes('name');
					if ( !empty( $key ) && $key['0'] != '@' ) {
						$val = $params->get( $key );
						if ( !is_array( $val ) && !strlen( $val ) ) {
							$val = $xml_child->attributes('default');
							if ( $xml_child->attributes('type') == 'textarea' ) {
								$val = str_replace( '<br />', "\n", $val );
							}
						}
						$values->$key = $val;
					}
				}
			}
		}

		return $values;
	}
}

if ( !function_exists( 'html_entity_decoder' ) ) {
	function html_entity_decoder( $given_html, $quote_style = ENT_QUOTES, $charset = 'UTF-8' ) {
		if ( phpversion() < '5.0.0' ) {
			$trans_table = array_flip( get_html_translation_table( HTML_SPECIALCHARS, $quote_style ) );
			$trans_table['&#39;'] = "'";
			return ( strtr( $given_html, $trans_table ) );
		}else {
			return html_entity_decode( $given_html, $quote_style, $charset );
		}
	}
}