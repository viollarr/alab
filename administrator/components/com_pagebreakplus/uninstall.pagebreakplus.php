<?php

/**
 * Installer File
 * Performs an install / update of GeoXeo extensions
 *
 * @author     GeoXeo <contact@geoxeo.com>
 * @link       http://www.geoxeo.com
 * @copyright  Copyright (C) 2010 GeoXeo - All Rights Reserved
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * 
 */


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Delete plugin files
if ( is_file( JPATH_PLUGINS.DS.'content'.DS.'pagebreakplus.php' ) ) {
	JFile::delete( JPATH_PLUGINS.DS.'content'.DS.'pagebreakplus.php' );
}
if ( is_file( JPATH_PLUGINS.DS.'content'.DS.'pagebreakplus.xml' ) ) {
	JFile::delete( JPATH_PLUGINS.DS.'content'.DS.'pagebreakplus.xml' );
}
JFolder::delete(JPATH_PLUGINS.DS.'content'.DS.'pagebreakplus');

// Delete module files
JFolder::delete( JPATH_SITE.DS.'modules'.DS.'mod_pagebreakplus' );

// Delete plugin language files
$file_orginal_lang_path = JPATH_ADMINISTRATOR.DS.'language';
$dir_folders = JFolder::folders( $file_orginal_lang_path );
foreach ( $dir_folders as $lang_name ) {
	$file_lang_file = $file_orginal_lang_path.DS.$lang_name.DS.$lang_name.'.plg_content_pagebreakplus.ini';
	if ( is_file( $file_lang_file ) ) {
		JFile::delete( $file_lang_file );
	}
}

$file_orginal_lang_path = JPATH_ROOT.DS.'language';
$dir_folders = JFolder::folders( $file_orginal_lang_path );
foreach ( $dir_folders as $lang_name ) {
	$file_lang_file = $file_orginal_lang_path.DS.$lang_name.DS.$lang_name.'.plg_content_pagebreakplus.ini';
	if ( is_file( $file_lang_file ) ) {
		JFile::delete( $file_lang_file );
	}
}