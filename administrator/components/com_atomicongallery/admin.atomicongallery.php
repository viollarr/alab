<?php
/**
 * @version $Id$
 * @package    AtomiconGallery
 * @subpackage _ECR_SUBPACKAGE_
 * @author     Yvo van Dillen {@link http://www.atomicon.nl}
 * @author     Created on 08-Jan-2010
 */

//-- No direct access
defined('_JEXEC') or die('Restricted');

// Require the base controller
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'atomicon.php' );
require_once( JPATH_COMPONENT.DS.'controllers'.DS.'atomicongallery.php' );

Atomicon::errors(true);
Atomicon::loadHelpers();

// Require specific controller if requested
if( $controller = JRequest::getWord('controller'))
{
   $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if( file_exists($path))
	{
		require_once $path;
	} else
	{
		$controller = '';
	}
}

// Create the controller
$classname    = 'AtomiconGalleryController'.$controller;
$controller   = new $classname( );

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();