<?php
/******************************************************************/
/* Title........: JACLPlus Component for Joomla! 1.0.15 Stable
/* Description..: Joomla! ACL Enhancements Component for Joomla! 1.0.15 Stable
/* Author.......: Vincent Cheah
/* Version......: 1.0.15 (For Joomla! 1.0.15 Stable ONLY)
/* Created......: 27/02/2008
/* Contact......: jaclplus@byostech.com
/* Copyright....: (C) 2005-2008 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of JACLPlus package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//JACLPlus Component for Joomla! 1.0.15 Stable (Joomla! ACL Enhancements Component)
//Copyright (C) 2005-2008 Vincent Cheah, ByOS Technologies. All rights reserved.
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
###################################################################

// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href="http://www.byostech.com/jaclplus">JACLPlus Component for Joomla! 1.0.15 Stable</a> ]' );

class JACLPlus {
    /**
    * @var string The path to the configuaration file
    */
    var $_path = null;

    /**
    * @var string The name of the configuaration class
    */
    var $_name = null;

    /**
    * @var object An object of configuration variables
    */
    var $_config = null;

    function JACLPlus($name, $path)
    {
        $this->_path = $path;
        $this->_name = $name;
        $this->_loadConfig();
    } 

    /**
    * @param string $ The name of the variable
    * @return mixed The value of the configuration variable or null if not found
    */
    function getCfg($varname , $default = null)
    {
        if (isset($this->_config->$varname)) {
            return $this->_config->$varname;
        } else {
            if (! is_null($default)) {
                $this->_config->$varname = $default;
            } 
            return $default;
        } 
    } 

    /**
    * @param string $ The name of the variable
    * @param string $ The new value of the variable
    * @return bool True if succeeded, otherwise false.
    */
    function setCfg($varname, $value, $create = false)
    {
        if ($create || isset($this->_config->$varname)) {
            $this->_config->$varname = $value;
            return true;
        } else {
            return false;
        } 
    } 

    /**
    * Loads the configuration file and creates a new class
    */
    function _loadConfig()
    {
        if (file_exists($this->_path)) {
            require_once($this->_path);
            $this->_config = new $this->_name();
        } else {
            $this->_config = new StdClass();
        } 
    } 

    /**
    * Saves the configuration object
    */
    function saveConfig()
    {
        global $my;

        $config = "<?php\n";
        $config .= "defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href=\"http://www.byostech.com/jaclplus\">JACLPlus Component for Joomla! 1.0.15 Stable</a> ]' );\n\n";
        $config .= "class " . $this->_name . "\n{\n";
        $config .= "// Last Edit: " . strftime("%a, %Y-%b-%d %R") . "\n";
        $config .= "// Edited by: " . $my->username . "\n";

        $vars = get_object_vars($this->_config);
        foreach($vars as $key => $value) {
            if (is_array($value)) {
                $config .= 'var $' . $key . ' = ' . var_export($value , true) . ";\n" ;
            } else {
               	$config .= 'var $' . $key . ' = "' . (get_magic_quotes_gpc() ? str_replace(array('\\','\"','"'), array('\\\\','\\\"','\"'), stripslashes($value)) : str_replace(array('\\','\"','"'), array('\\\\','\\\"','\"'), $value) ) . "\";\n" ;
            } 
        } 

        $config .= "}\n";
        $config .= "?>";

        if ($fp = fopen($this->_path, "w")) {
            fputs($fp, $config, strlen($config));
            fclose ($fp);
            return true;
        } else {
            return false;
        } 
    } 

	function InList ( $value, $list ) 
	{
		return in_array( $value, explode( ",", $list ) );
	}
	
	function DefaultAL() 
	{
		global $database, $acl;
		
		$CacheLite =& mosCache::getCache( 'com_jaclplus' );
		$cache_id = "JACLPlus::DefaultAL";
		$jaclplus = '';
		if ( is_string($CacheLite->_cache->get($cache_id, $CacheLite->_cache->_defaultGroup) ) ) {
			$jaclplus = $CacheLite->_cache->get($cache_id, $CacheLite->_cache->_defaultGroup);
		}
		if (strlen($jaclplus)<1) {
			//get jaclplus for 29 - Public Frontend
			$database->setQuery( "SELECT jaclplus FROM #__core_acl_aro_groups WHERE group_id='29'" );
			$jaclplus = trim($database->loadResult());
			if (strlen($jaclplus)<1) {
				$jaclplus = '0';
			}
			$CacheLite->_cache->save($jaclplus, $cache_id, $CacheLite->_cache->_defaultGroup);
		}
		return $jaclplus;
	}
	
	function RemoveACL ( $array_axo_value = array('0'), $axo_section='content') 
	{
		global $database;
	
		$axo_values = implode( ',', $array_axo_value );
		$query = "DELETE FROM #__jaclplus WHERE axo_value IN ( ". $database->getEscaped( $axo_values ) ." ) AND axo_section = " . $database->Quote( $axo_section );
		$database->setQuery( $query );
		return $result = $database->query();
	}
	
	function AccessChecking($user, $controlside) 
	{
		global $mosConfig_absolute_path, $option;
		
		//$option = strval( strtolower( mosGetParam( $_REQUEST, 'option' ) ) );
		$rule_file = $mosConfig_absolute_path . '/administrator/components/com_jaclplus/rules/' . $controlside . '_' . $option . '.php';
		if(file_exists($rule_file)) {
			require_once( $rule_file );
		}
		//print_r($rule_file);
	}
} 

?>