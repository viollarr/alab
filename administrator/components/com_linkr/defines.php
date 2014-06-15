<?php
defined('_JEXEC') or die;

/*
 * Defines
 */
define('LINKR_VERSION', 236);
define('LINKR_VERSION_READ', '2.3.6');
define('LINKR_VERSION_INC', ((@$_SERVER['HTTP_HOST'] == 'localhost' || @$_SERVER['SERVER_NAME'] == 'localhost') ? time() : LINKR_VERSION));

define('LINKR_ASSETS', JURI::root() .'components/com_linkr/assets/');

