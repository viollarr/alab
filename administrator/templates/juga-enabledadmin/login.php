<?php
/**
* "Minted One-Point-Five" Administrator Template for Joomla 1.0.x - Version 1.0 (login.php)
* License: http://www.gnu.org/copyleft/gpl.html
* Author: Fotis Evangelou
* Date Created: October 12th, 2006
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
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $mosConfig_sitename; ?><?php echo $login_title; ?></title>
	<link rel="stylesheet" href="templates/<?php echo $mainframe->getTemplate();?>/css/template_css.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $mainframe->getTemplate();?>/css/theme.css" type="text/css" />
    <script language="javascript" type="text/javascript">
        function setFocus() {
            document.loginForm.usrname.select();
            document.loginForm.usrname.focus();
        }
    </script>
    <link rel="shortcut icon" href="<?php echo $mosConfig_live_site .'/images/favicon.ico';?>" />
    </head>
    <body onload="setFocus();" id="login">
    <div id="minted">
    <div id="header">
      <div id="hc">
        <div id="hl">
          <div id="hr">
            <div id="home"><a href="index.php" title="<?php echo $login_index; ?>">&nbsp;</a></div>
          </div>
        </div>
      </div>
    </div>
    <div id="content_wrapper">
      <div id="inner">
        <?php
        // handling of mosmsg text in url
        include_once( $mosConfig_absolute_path .'/administrator/modules/mod_mosmsg.php' ); 
        ?>
        <noscript>
        <div class="message"><?php echo $login_nojs; ?></div>
        </noscript>
        <div class="login_credentials">
          <h1><?php echo $login_h1; ?></h1>
          <form action="index.php" method="post" name="loginForm" id="loginForm">
            <label><?php echo $login_username; ?></label>
            <input name="usrname" type="text" class="inputbox" />
            <label><?php echo $login_password; ?></label>
            <input name="pass" type="password" class="inputbox" />
            <div class="enter">
              <div class="enter_inner">
                <input type="submit" name="submit" value="<?php echo $login_enter; ?>" />
              </div>
            </div>
          </form>
          <br />
          <?php echo $login_welcometext; ?> </div>
      </div>
    </div>
    <div class="footer"><?php echo $_VERSION->URL; ?><br />
      <br />
        <a href="http://anonym.to/?http://www.dioscouri.com" target="_blank"><?php echo $dsc_admin_credits; ?></a>
        <?php echo "&nbsp;".$and."&nbsp;"; ?>
        <a href="http://anonym.to/?http://www.joomlaworks.gr" target="_blank"><?php echo $jw_admin_credits; ?></a>

    <!-- JW "Minted One-Point-Five" Admin Template (v1.0) -->
    </body>
    </html>
