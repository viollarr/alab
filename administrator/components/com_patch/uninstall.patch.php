<?php
/******************************************************************/
/* Title........: Patch Component for Joomla!/Mambo
/* Description..: Patch Component Make your Joomla!/Mambo Patch Easy
/* Author.......: Vincent Cheah
/* Version......: 1.0.1
/* Created......: 02/12/2005
/* Contact......: com_patch@byostech.com
/* Copyright....: (C) 2005 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of Patch Component package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//Patch Component for Joomla!/Mambo
//Copyright (C) 2005  Vincent Cheah, ByOS Technologies. All rights reserved.
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
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href="http://www.byostech.com">Patch Component for Joomla!/Mambo</a> ]' );

function com_uninstall()
{
	$echostr = "Patch Component has been uninstalled successfully.";
	//echo $echostr;
	return $echostr;
}
?>