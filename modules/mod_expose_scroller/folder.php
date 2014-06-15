<?php
/****************************************************************************
Module: Expose Thumbnail Scroller Module for Joomla 1.5.x
Version  : 3.2
Author   : Bruno Marchant
E-mail   : bruno@gotgtek.net
Web Site : www.gotgtek.net
Copyright: Copyright 2007-2008 by GTEK Technologies
License  : Expose thumbnail scroller is released under GNU/GPL licence
*****************************************************************************/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(!function_exists('cleanupPath')) {
	function cleanupPath($strPath) {
		$exp_abs_path = JPATH_SITE;
		$exp_live_site = JURI::base();


		//if folder doesnt contain trailing slash, add it
		if ( substr($strPath, -1, 1) != '/') $strPath = $strPath . '/';
		//replace all '/' or '\'  by server-slashes
		$strPath = str_replace("\\", "/", $strPath);
		//if folder includes livesite info, remove it
		if ( strpos($strPath, $exp_live_site) === 0 ) $strPath = str_replace( $exp_live_site, '', $strPath );
		//if folder includes absolute path, remove it
		if ( strpos($strPath, $exp_abs_path) === 0 ) $strPath= str_replace( $exp_abs_path, '', $strPath );
		//if folder contains leading slash, remove it
		if ( strpos($strPath, '/') == 0 ) $strPath = ltrim($strPath, '/');
		return $strPath;
	}
}


// Search for files with specific extention in current and subfolders. Snippet from phpbuilder.com
/* recursive_dir(
	$root: rootdirectory to start search in,
	$check_ext: file extension to search for (if left blank then will show all files -- eregi() function setting),
	$new_path_ext: new subfolder to continou search in (code only),
	$array: array with all files found (with subdirectoryinfo added to filepath)
	$InSub: search also in subfolders
*/
if(!function_exists('recursive_dir')) {
	function recursive_dir($root, $check_ext = "jpg", $new_path_ext = "", &$array, $InSub = "1") { //, &$piccounter) {
		// to check: mosReadDirectory function
		static $piccounter;
		if ($new_path_ext == "") $piccounter = 0;
		//echo $root." AA ".$new_path_ext. " AA ";
		$dh = opendir($root.$new_path_ext);
		
		//keep reading as long as files are found
		while(false !== ($entry=readdir($dh))) {
			//if subdirectory found, recall this function
			if($entry != "." && $entry != ".." && is_dir($root.$new_path_ext.$entry) && $InSub) {
				recursive_dir($root,$check_ext,$new_path_ext.$entry."/", $array, $InSub, $piccounter);
			}
			//if picture file found and matching the user-filter, then add it to array 
			elseif($entry != "." && $entry != ".." && eregi("($check_ext)$",$entry)) {
				$array_ptr = &$array[$piccounter];
				$array_ptr['smallimage'] = $new_path_ext.$entry;
				$array_ptr['timestamp'] = filemtime($root.$new_path_ext.$entry);
				$array_ptr['title'] = $entry;
				//$array_ptr['albumid'] = '';  //trap undefigned variable error
				$piccounter++;
			}
		}
		closedir($dh);
		return $piccounter;
	}
}
?>