<?php
require_once dirname(__FILE__).'/subinstall.php';
/**
 * API entry point. Called from main installer.
 */
function com_install() {
    $si = new SubInstaller();
    $si->install();
}

/**
 * API entry point. Called from main installer.
 */
function com_uninstall() {
    $si = new SubInstaller();
    $si->uninstall();
}
