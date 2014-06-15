<?php
/**
 * @version             $Id: embedanyscript.php revision date tushev $
 * @package             Joomla
 * @subpackage  System
 * @copyright   Copyright (C) S.A. Tushev, 2010. All rights reserved.
 * @license     GNU GPL v2.0
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
 
 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
class plgSystemEmbedAnyScript extends JPlugin {
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param object $subject The object to observe
	 * @param object $params  The object that holds the plugin parameters
	 * @since 1.5
	 */
	function plgSystemEmbedAnyScript( &$subject, $params )
	{
			parent::__construct( $subject, $params );
			$this->p = new JParameter($params['params']);
	}
	
	function onAfterRoute() {
		$document = &JFactory::getDocument();
		$document->setGenerator($document->getGenerator().'; EmbedAnyScript by tushev.org');
		
		$emergency=false; // Use this param if you need to disable embedded adminpanel scripts, but you have no access to adminpanel
		$juri = &JFactory::getURI();
		
		//if(admin_allowed and !EMERGENCY and in_adminpanel)
		if($this->p->get('allowadmin',0) && !$emergency && strpos($juri->getPath(),'/administrator/')!==false)
		{
			$list = $this->parseList($this->p->get('adminlist',''));
			if($list) $this->addScripts($list);
			return;
		}
		
		//if !in_adminpanel
		if(strpos($juri->getPath(),'/administrator/')===false)
		{
			$list = $this->parseList($this->p->get('list',''));
			if($list) $this->addScripts($list);
		}
		
	}
	function onAfterRender()
	{					
		$juri = &JFactory::getURI();
		if(strpos($juri->getPath(),'/administrator/')!==false) return;
		
		if(!$this->p->get('processarticles',1)) return;
		
		$text = JResponse::getBody();
		$text = $this->processText($text);
		JResponse::setBody($text);
		
	}
	function addScripts($path_array)
	{
		$document = &JFactory::getDocument();
		foreach($path_array as $p)
		{
			if($p) $document->addScript($p);
		}
		
	}
	function parseList($list)
	{
		if(!$list) return false;
		$list = str_ireplace("\r\n", "\n", $list);
		return explode("\n", $list);
	}
	function processText($text)
	{
		$pattern = "/(\{\s*embedscript\s*\})\s*(.+)\s?\s*(\{\s*\/\s*embedscript\s*\})/i";
		$replacement="<script src=\"$2\"></script>";
		return preg_replace($pattern, $replacement, $text);
	}
}
?>