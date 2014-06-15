<?php
#****************************************************************************
#Module:		Expose Scroller module for Joomla 1.5.x
#Version:		3.2
#Author:		GotGTEK Team
#E-mail:		info@GotGTEK.net
#Web Site:		www.GotGTEK.net
#Copyright:		Copyright (C) 2010 GotGTEK. All rights reserved.
#License:		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
#****************************************************************************/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = & JFactory::getDocument();

define( 'JPATH_COMPONENTS', JPATH_BASE.DS.'components' );
define( 'JPATH_MODULE', JPATH_BASE.DS.'modules'.DS.'mod_expose_scroller' );
$exp_live_site = JURI::base();


// Retrieve the parameters
$setModuleId		= $params->get('ModuleId_sfx', 'expose_scroller1');
$setPath			= $params->get('ImagePath', '0');
$setRecurceDirs 	= $params->get('SubDirs', '1');
$setFileType 		= $params->get('type', '\.(jpg|gif|png)$'); // Set eregi() string type (search for specific file patterns)
$setLinking 		= $params->get('Linking', 'album');
$setHoverPause		= $params->get('Pause', '1');
$setWidth			= $params->get('Width', '100%');
$setHeight			= $params->get('Height', '100');
$setPicsNum			= intval($params->get('PicsNum', '10'));
$setPickMethod		= trim  ($params->get('PickMethod','random'));
$setDirection		= trim  ($params->get('Direction', 'left'));
$setSpeed			= intval($params->get('Speed', '50'));
$setSpace			= $params->get('Space', '3px');



// Sort a subarray
if(!function_exists('sortByFunc')) {
	function sortByFunc(&$arr, $func) {
		$tmpArr = array();
		foreach ($arr as $k => $e) {
			$tmpArr[] = array('f' => $func($e), 'k' => $k, 'e' =>$e);
		}
		rsort($tmpArr);
		$arr = array();
		foreach($tmpArr as $fke) {
			$arr[$fke['k']] = $fke['e'];
		}
	}
}



//****************************************************************************
//****************** READ EXPOSE XML FILES *********************************
//****************************************************************************
//if folder is just a number then analyze the Expose XML files
if (is_numeric($setPath)) {
	include_once( JPATH_MODULE.DS.'xml.php' ); // Lib for searching/loading Expose xml content files
	//open xml file, read the collection into array and return qty of records
	$cData = array(); $aData = array();

	$domobj = new exp_xml;
	$domobj->open_xmlfile( JPATH_COMPONENTS.DS.'com_expose'.DS.'expose'.DS.'xml'.DS.'albums.xml' );
	$domobj->searchId = $setPath;
	$total = $domobj->read_xml($domobj->myDOMNode, $cData);
	$domobj->close_xmlfile();

	//if user wants random selection of pics, loop trough collection array and read all albums
	if ($total == 0) {
		//If  cData is emty (albums.xml doesn't exist or has no albums), it will generate an error in foreach()  so first check!
		echo JText::_('NO_ALBUMS_FOUND');
	} else {
		//load all album files into array
		foreach ($cData as $ckey) {
			if (isset($ckey['contentxmlurl'])) {
				$domobj->open_xmlfile( JPATH_COMPONENTS.DS.'com_expose'.DS.'expose'.DS.'xml'.DS.$ckey['contentxmlurl'] );
				$domobj->albumId = $ckey['mngid'];
				$total = $domobj->read_xml($domobj->myDOMNode, $aData);
				$domobj->close_xmlfile();
			}
		}
	}

	$ExposeImgPath = $exp_live_site . 'components'.DS.'com_expose'.DS.'expose'.DS.'img'.DS;
	

// Overview created arrays for troubleshooting
//echo "\n<br><!-- Collection: \n<br>"; print_r($cData); echo "\n<br>Album: \n<br>"; print_r($aData); echo " -->";

//****************************************************************************
//****************** READ FILES FROM DIRECTORY (NON-EXPOSE) ******************
//****************************************************************************
// not numeric: search in requested folder
} else {
	include_once( JPATH_MODULE.DS.'folder.php' ); // Lib for searcheng/loading files from path
	//cleanup the provided path:
	$setPath = cleanupPath($setPath);
	//get the files now! (returns qty of files found)
	$total = recursive_dir((JPATH_SITE.DS).$setPath, $setFileType, '', $aData, $setRecurceDirs);

	// Overview created arrays for troubleshooting
	//echo "\n<br><!-- Directory: \n<br>"; print_r($aData); echo " -->";

	//adjust some settings because we're not searching in the expose-directory now
	$ExposeImgPath = $exp_live_site. $setPath;
}
//****************** CHECK PIC-QTY ******************
//make sure PicsNum < pics found in directory
if ($setPicsNum > $total) $setPicsNum = $total;
//show all pics if PicsNum = 0
elseif ($setPicsNum == 0) $setPicsNum = $total;

//****************** GENERATE HTML CODE ******************
echo "\n<!-- Expose Scroller module starts here --> \n";

//patch by Yann: load scripts in header of page
	$document->addScript( 'modules'.DS.'mod_expose_scroller'.DS.'continiousscroll.js');
	$document->addScript( 'modules'.DS.'mod_expose_scroller'.DS.'scrollinit.js');

// If set, load Shadowbox scripts in page
if (eregi('shadowbox', $setLinking)) {
	// If Expose installed
	if (file_exists ( 'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'build'.DS.'js'.DS.'shadowbox.js' )) { 
		$document->addStyleSheet( 'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'build'.DS.'css'.DS.'shadowbox.css' );
		$document->addScript( 'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'build'.DS.'js'.DS.'lib'.DS.'yui-utilities.js' );
		$document->addScript( 'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'build'.DS.'js'.DS.'adapter'.DS.'shadowbox-yui.js' );
		$document->addScript( 'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'build'.DS.'js'.DS.'shadowbox.js' );
	}
}

/*
// NEW SHADOWBOX. Create Lib package instead with an huge amound of "box" scripts, which can be updated seperatly from the component, modules and plugins.
if (eregi('shadowbox', $setLinking)) {
	// If Expose installed
	if (file_exists ( 'components'.DS.'com_expose'.DS.'shadowbox'.DS.'shadowbox.js' )) { 
		$document->addStyleSheet( 'components'.DS.'com_expose'.DS.'shadowbox'.DS.'shadowbox.css' );
		$document->addScript( 'components'.DS.'com_expose'.DS.'shadowbox'.DS.'shadowbox.js' );
	}
}
*/
//create scroller divs: 1st is centering, 2nd is for visible area and 3rd has all pics 
echo "<div align='center'><div id=\"$setModuleId\" style=\"position:relative; overflow:hidden; width:$setWidth; height:$setHeight; \" ";
if (($setDirection !== 'horizontal') && ($setDirection !== 'vertical') && $setHoverPause)
	echo "onmouseover='zxcBannerStop('$setModuleId')'; onmouseout='zxcBannerStart('$setModuleId')';";
echo "> \n";
echo "<div style=\"position:absolute; top:0px; width:auto; white-space:nowrap;\"> \n";

//are there pics in the album/directory?
if (!$setPicsNum)
	echo "<div style=\"position: absolute; background-color: rgb(255, 204, 102); color: rgb(153, 102, 255); text-align: center; font-size: 13px; width: 200px; height: 102px; left: 300px; top: 0px;\">JText::_('CONTENTFILE_NOT_FOUND')</div> \n";

//if showing the latest added pictures, then sort the array
if ($setPickMethod == 'latest') {
	sortByFunc($aData,create_function('$element','return $element["timestamp"];'));
	// Set the pointer to beginning of array
	reset($aData);
}

//set picture style (padding: create space between pics; border: remove link border)
if (eregi($setDirection, 'left_right_horizontal'))
	$divstyle = "\"height: $setHeight; top: 0px; padding: 0px $setSpace 0px $setSpace; border: 0px\"";
else
	$divstyle = "\"width: $setWidth; top: 0px; padding: $setSpace 0px $setSpace 0px; border: 0px\"";

// Get $setPicsNum images from array
$picstack = '';
for ($i=0;$i<$setPicsNum;$i++) {
	// Search for a PictureId depending user settings
	if ($setPickMethod == 'filename') {
		//not very usefull, but doesn't cost anything...
		$picid=$i;
	} elseif ($setPickMethod == 'latest') {
		//use reverse-sorting: we'll need the id by array-pointer, not by referance
		$picid=key($aData);
		//prepare for next loop
		next($aData);
	} else {
		//random pick: prevent a photo from showing twice or more: check for unique picid
		do {
			$picid = rand(0,$total-1);
		} while (eregi($picid.'a', $picstack.'a'));
		//memorize used pics for check if already used
		$picstack = $picstack.$picid.'a';
	}

	// Get largest picture available to show in Shadowbox
	if (isset($aData[$picid]['largeimage']))
		$largestpic = $ExposeImgPath.$aData[$picid]['largeimage'];
	elseif (isset($aData[$picid]['image']))
		$largestpic = $ExposeImgPath.$aData[$picid]['image'];
	else
		$largestpic = $ExposeImgPath.$aData[$picid]['smallimage'];

	if (isset($aData[$picid]['title']))
		$titlepic = $aData[$picid]['title'];
	else
		$titlepic = '';
	
	// link to directory
	if(!is_numeric($setPath)) { 
		switch ($setLinking) {
			case "shadowbox":
				$Linkref = "<a href=\"".$largestpic."\" rel=\"shadowbox\" title=\"".$titlepic."\">";
				$LinkEndref="</a>";
				break;
			case "shadowboxnav":
				$Linkref = "<a href=\"".$largestpic."\" rel=\"shadowbox[expose_scroller]\" title=\"".$titlepic."\">";
				$LinkEndref="</a>";
				break;
			default: // Off
				$Linkref = "";
				$LinkEndref= "";
				break;
		}
	// link to Expose picture
	} else { 
		switch ($setLinking) {
			case "collection":
				$Linkref = "<a href=\"".JRoute::_("index.php?option=com_expose&topcoll=".$aData[$picid]['albumid'])."\">";
				$LinkEndref="</a>";
				break;
			case "album":
				$Linkref = "<a href=\"".JRoute::_("index.php?option=com_expose&album=".$aData[$picid]['albumid'])."\">";
				$LinkEndref="</a>";
				break;
			case "photo":
				$Linkref = "<a href=\"".JRoute::_("index.php?option=com_expose&album=".$aData[$picid]['albumid']."&photo=".$aData[$picid]['mngid'])."\">";
				$LinkEndref="</a>";
				break;
			case "slideshow";
				$Linkref = "<a href=\"".JRoute::_("index.php?option=com_expose&album=".$aData[$picid]['albumid']."&photo=".$aData[$picid]['mngid']."&playslideshow=yes")."\">";
				$LinkEndref="</a>";
				break;
			case "slideshowfirst":
				$Linkref = "<a href=\"".JRoute::_("index.php?option=com_expose&album=".$aData[$picid]['albumid']."&photo=1&playslideshow=yes")."\">";
				$LinkEndref="</a>";
				break;
			case "shadowbox":
				$Linkref = "<a href=\"".$largestpic."\" rel=\"shadowbox\" title=\"".$titlepic."\">";
				$LinkEndref="</a>";
				break;
			case "shadowboxnav":
				$Linkref = "<a href=\"".$largestpic."\" rel=\"shadowbox[expose_scroller]\" title=\"".$titlepic."\">";
				$LinkEndref="</a>";
				break;
			default: // Off
				$Linkref = "";
				$LinkEndref= "";
				break;
		}
	}

	//display and adjust the <img> tag depending settings
	echo $Linkref."<img style=$divstyle src=\"".$ExposeImgPath.$aData[$picid]['smallimage']."\" alt=\"".$titlepic."\" />".$LinkEndref."\n";
	//when horizontal scrolling, goto next line
	if (eregi($setDirection, 'up_down_vertical'))
		echo "<br />";
}

echo "</div></div></div>\n";

//finally, load scrollerinit and scrolling script and fire on page loading
//patch by Yann: Place scripts in header of page

/*	 Init horizontal or vertical scrolling
	 zxcCSBanner(divId, type, width, speed, contentArray)
		divId = unique ID name of the Banner <DIV>			(string)
		type = the type of banner 'H' = horizontal, 'V' = vertical.	(string, 'H' or 'V')
		width = (optional) the default width of each element.		(digits or null)
		speed = (optional) the scroll speed (1 = fast, 500 = slow).		(digits or null)
		contentArray = (optional) the Content Array name.		(array variable name, or omit)
*/

$declarationHeader = "";

// Init scroller script as horizontal or vertical placement
if (eregi($setDirection, 'left_right_horizontal'))
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcCSBanner('$setModuleId','H',0,$setSpeed);});\n";
else
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcCSBanner('$setModuleId','V',0,$setSpeed);});\n";

// Set scrolling direction to left, right, up or down
if (eregi($setDirection, 'left_up')) {
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcCngDirection('$setModuleId',-1);});\n"; //defign scroll to left
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcBannerStart('$setModuleId');});";  //start scrolling
} elseif (eregi($setDirection, 'right_down')) {
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcCngDirection('$setModuleId',1);});\n"; //defign scroll to right
	$declarationHeader .= "	ExpScrollLoadEvent(function(){zxcBannerStart('$setModuleId');});";  //start scrolling
}

// Init ShadowBox
if (eregi($setLinking, 'shadowboxnav')) {
	$declarationHeader .= "\n	ExpScrollLoadEvent(function(){Shadowbox.init({continuous:true,displayCounter:false,loadingImage:'".$exp_live_site.'components'.DS.'com_expose'.DS.'expose'.DS.'shadowbox'.DS.'images'.DS."loading.gif'});});";
}

$document->addScriptDeclaration($declarationHeader);
echo "\n<!-- Expose Scroller module ends here --> \n";
?>