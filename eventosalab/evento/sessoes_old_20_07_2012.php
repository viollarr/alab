<?php
	define( '_JEXEC', 1 );
 	define('JPATH_BASE', "../../" );
 	define( 'DS', DIRECTORY_SEPARATOR );
	require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
	require_once("../conexao.php");
	require_once("../check_lang.php");

	$mainframe = JFactory::getApplication('site');
	$user   = &JFactory::getUser();

?>