<?php
/**
* "Minted One-Point-Five" Administrator Template for Joomla 1.0.x - Version 1.0 (index.php)
* License: http://www.gnu.org/copyleft/gpl.html
* Author: Fotis Evangelou
* Date Created: October 16th, 2006
* Copyright (c) 2006 JoomlaWorks.gr - http://www.joomlaworks.gr
* Project page at http://www.joomlaworks.gr - Demos at http://demo.joomlaworks.gr

* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Restricted access' );

$tstart = mosProfiler::getmicrotime();
require( "templates/".$mainframe->getTemplate()."/lang/en.php" );
$iso = explode( '=', _ISO );
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title><?php echo $mosConfig_sitename; ?><?php echo $admin_title; ?></title>
	<link rel="stylesheet" href="templates/<?php echo $mainframe->getTemplate();?>/css/template_css.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $mainframe->getTemplate();?>/css/theme.css" type="text/css" />
    <script type="text/javascript" language="JavaScript" src="<?php echo $mosConfig_live_site; ?>/includes/js/JSCookMenu_mini.js"></script>
    <script language="JavaScript" src="<?php echo $mosConfig_live_site; ?>/administrator/includes/js/ThemeOffice/theme.js" type="text/javascript"></script>
    <script type="text/javascript" language="JavaScript" src="<?php echo $mosConfig_live_site; ?>/includes/js/joomla.javascript.js"></script>
    <?php
    include_once( $mosConfig_absolute_path . '/editor/editor.php' );
    initEditor();
    ?>
    <link rel="shortcut icon" href="<?php echo $mosConfig_live_site .'/images/favicon.ico';?>" />
    </head>

	<?php 
	// Load the JUGA class
	require_once($mosConfig_absolute_path.'/administrator/components/com_juga/juga.class.php');

	// Load the JUGA Admin HTML class 
	require_once($mosConfig_absolute_path.'/administrator/components/com_juga/admin.juga.html.php');


	if (file_exists($mosConfig_absolute_path.'/administrator/components/com_juga/languages/'.$mosConfig_lang.'.php')) {
		  include_once($mosConfig_absolute_path.'/administrator/components/com_juga/languages/'.$mosConfig_lang.'.php');
	} else {
		  include_once($mosConfig_absolute_path.'/administrator/components/com_juga/languages/english.php');
	}


	// **********************************************************************
	// check user's rights to be on selected page with option, section, task, id
	
	if (!$option) {
	  if (mosGetParam($_POST, "option")) { $option = mosGetParam($_POST, "option"); }
	  elseif (mosGetParam($_GET, "option")) { $option = mosGetParam($_GET, "option"); }
	}
	
	if (!$section) {
	  if (mosGetParam($_POST, "section")) { $section = mosGetParam($_POST, "section"); }
	  elseif (mosGetParam($_GET, "section")) { $section = mosGetParam($_GET, "section"); }
	}

	if (!$task) {
	  if (mosGetParam($_POST, "task")) { $task = mosGetParam($_POST, "task"); }
	  elseif (mosGetParam($_GET, "task")) { $task = mosGetParam($_GET, "task"); }
	}
	
	if (!$id) {
	  if (mosGetParam($_POST, "id")) { $id = mosGetParam($_POST, "id"); }
	  elseif (mosGetParam($_GET, "id")) { $id = mosGetParam($_GET, "id"); }
	}


	$details["user"] = $my; $details["option"] = $option; $details["section"] = $section; $details["task"] = $task;  $details["id"] = $id;
	$access = jugaRightsCheck( $details );
		
	?>



    <body onload="MM_preloadImages('images/help_f2.png','images/archive_f2.png','images/back_f2.png','images/cancel_f2.png','images/delete_f2.png','images/edit_f2.png','images/new_f2.png','images/preview_f2.png','images/publish_f2.png','images/save_f2.png','images/unarchive_f2.png','images/unpublish_f2.png','images/upload_f2.png')">
    <div id="minted">
      <div id="header">
        <div id="hc">
          <div id="hl">
            <div id="hr">
              <div id="home"><a href="index2.php" title="<?php echo $admin_index; ?>">&nbsp;</a></div>
            </div>
          </div>
        </div>
      </div>
      <div id="content_wrapper">
        <div class="menubar">
		<?php if ($my->gid == "25") { ?>
          <div class="mod_fullmenu">
            <?php mosLoadAdminModule( 'fullmenu' );?>
          </div>
        <?php } else { ?>
          <div class="mod_fullmenu">
            <?php 
            $hide = intval( mosGetParam( $_REQUEST, 'hidemainmenu', 0 ) );

            if ( $hide ) {
                jugaMenu::showDisabled( $my );
            } else {
                jugaMenu::show( $my );
            }
			
			?>
          </div>
        <?php } ?>
          <div class="logout"><a href="index2.php?option=logout"><?php echo $admin_logout; ?></a><?php echo $my->username;?></div>
          <div class="mod_header">
            <?php mosLoadAdminModules( 'header', 2 );?>
          </div>
          <div class="clr"></div>
        </div>
        <div class="menubar">
          <table class="pathway_toolbar white">
            <tr>
              <td class="mod_pathway"><?php mosLoadAdminModule( 'pathway' );?></td>
              <td class="mod_toolbar" align="right">
			  	<?php if ($access["access"]) { mosLoadAdminModule( 'toolbar' ); } ?>
              </td>
            </tr>
          </table>
          <div class="clr"></div>
        </div>
        <div id="inner" align="center">
			<?php 
            if ($access["access"]) {
			  mosLoadAdminModule( 'mosmsg' );
			  mosMainBody_Admin();			
			} else {
				// if editing, un-checkout content item
				if (($option == "com_content" || $option == "com_typedcontent") && $task == "edit" && $id > 0) {
					$content = new mosContent( $database );
					$content->load( (int)$id );
					$content->checkin();
				} elseif (($option == "com_content" || $option == "com_typedcontent") && $task == "edit" && $cid[0] > 0) {
					$content = new mosContent( $database );
					$content->load( (int)$cid[0] );
					$content->checkin();
				}
                $lists["head"] = _JUGA_RESTRICTEDRESOURCE; $lists["notice"] = _NOT_AUTH;	
                HTML_juga::standardMessage ($option, $section, $row, $lists, $search, $pageNav); 
            } 
            ?>
          <div class="clr"></div>
        </div>
      </div>
      <link rel="stylesheet" href="templates/<?php echo $mainframe->getTemplate();?>/css/tabpane.css" type="text/css" />
      <div class="footer"> <?php echo $_VERSION->URL; ?>
        <div class="smallgrey">
        	<a href="http://anonym.to/?http://www.dioscouri.com" target="_blank"><?php echo $dsc_admin_credits; ?></a>
            <?php echo "&nbsp;".$and."&nbsp;"; ?>
        	<a href="http://anonym.to/?http://www.joomlaworks.gr" target="_blank"><?php echo $jw_admin_credits; ?></a>
            <br />
            
          <?php echo $version; ?><br />
          <a href="http://www.joomla.org/content/blogcategory/32/66/" target="_blank"><?php echo $admin_checkversion; ?></a> </div>
        <?php
                if ( $mosConfig_debug ) {
                    echo '<div class="smallgrey">';
                    $tend = mosProfiler::getmicrotime();
                    $totaltime = ($tend - $tstart);
                    printf ("Page was generated in %f seconds", $totaltime);
                    echo '</div>';
                }
                ?>
      </div>
    </div>
    <?php mosLoadAdminModules( 'debug' );?>
    <!-- JW "Minted One-Point-Five" Admin Template (v1.0) -->
    </body>
    
    </html>
