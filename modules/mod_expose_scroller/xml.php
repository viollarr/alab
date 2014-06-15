<?php
/****************************************************************************
#Module:		Expose Scroller module for Joomla 1.5.x
#Version:		3.2
#Author:		GotGTEK Team
#E-mail:		info@GotGTEK.net
#Web Site:		www.GotGTEK.net
#Copyright:		Copyright (C) 2010 GotGTEK. All rights reserved.
#License:		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*****************************************************************************/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class exp_xml {

	var $myDOMNode;
	var $myOwnerDocument;
	var $prearray;
	var $nName;
	var $searchId; //search for specific album/collection id
	var $albumId;  //store album id next to photo id for creating link to expose

	function open_xmlfile($fName) {
		$this->myDOMNode=new DOMDocument();
		if(!$this->myDOMNode->load($fName)) {
			echo $fName . JText::_('STRUCTUREFILE_NOT_FOUND');
			exit;
		}
	}

	function close_xmlfile() {
		$this->myDOMNode=null;
		$this->myOwnerDocument=null;
		$this->prearray = null;
		$this->nName = '';
		$this->searchId = 0;
		$this->albumId = null;
	}

	function read_xml($node, &$array) {
	
		$hasidattrib = '';

		foreach ($node->childNodes as $cnode) {
			if ($cnode->nodeType==XML_TEXT_NODE) {
				$nValue = trim($cnode->nodeValue);
				if (!empty($nValue)) {
					$this->prearray[$this->nName] = $nValue;
				}
			} elseif ($cnode->nodeType==XML_ELEMENT_NODE) {
				switch ($cnode->nodeName) {
					case 'album':
					case 'picture':
					case 'video':
						// New mnid found: save current prearray data here !?
						$hasidattrib = $cnode->getAttribute('_mngid');
						if ($hasidattrib) {
							$this->prearray='';
							$this->prearray['mngid'] = $hasidattrib;
							$this->prearray['albumid'] = $this->albumId;
						}
						break;
					case 'url':
						break;
					case 'thumb':
						$this->nName = 'smallimage';
						break;
					default:
						$this->nName = $cnode->nodeName;
				}
				$ntext = exp_xml::read_xml($cnode, $array);
				if ($hasidattrib)
					if (empty($this->searchId) || $hasidattrib == $this->searchId)
						$array[] = $this->prearray;
			}
		}
		return count($array);
	}
}
?>