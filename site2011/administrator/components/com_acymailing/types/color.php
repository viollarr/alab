<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class colorType{
	function colorType(){
		$this->values = array();
		for($red=0; $red<6;$red++) {
		  $rhex = dechex($red * 0x33);
		  $rhex = (strlen($rhex) < 2)?"0".$rhex:$rhex;
		  for($blue=0; $blue<6;$blue++) {
		    $bhex = dechex($blue * 0x33);
		    $bhex = (strlen($bhex) < 2)?"0".$bhex:$bhex;
		    for($green=0; $green<6;$green++) {
		      $ghex = dechex($green * 0x33);
		      $ghex = (strlen($ghex) < 2)?"0".$ghex:$ghex;
		      $this->values[$red][] = '#'.$rhex.$ghex.$bhex;
		    }
		  }
		}
		$this->othervalues[] = '#000000';
		$this->othervalues[] = '#111111';
		$this->othervalues[] = '#222222';
		$this->othervalues[] = '#333333';
		$this->othervalues[] = '#444444';
		$this->othervalues[] = '#555555';
		$this->othervalues[] = '#666666';
		$this->othervalues[] = '#777777';
		$this->othervalues[] = '#888888';
		$this->othervalues[]  = '#999999';
		$this->othervalues[]  = '#AAAAAA';
		$this->othervalues[]  = '#BBBBBB';
		$this->othervalues[]  = '#CCCCCC';
		$this->othervalues[]  = '#DDDDDD';
		$this->othervalues[]  = '#EEEEEE';
		$this->othervalues[]  = '#FFFFFF';
		$this->othervalues[]  = '#FF0000';
		$this->othervalues[]  = '#00FFFF';
		$this->othervalues[]  = '#0000FF';
		$this->othervalues[]  = '#0000A0';
		$this->othervalues[]  = '#FF0080';
		$this->othervalues[]  = '#800080';
		$this->othervalues[]  = '#FFFF00';
		$this->othervalues[]  = '#00FF00';
		$this->othervalues[]  = '#FF00FF';
		$this->othervalues[]  = '#FF8040';
		$this->othervalues[]  = '#804000';
		$this->othervalues[]  = '#800000';
		$this->othervalues[]  = '#808000';
		$this->othervalues[]  = '#408080';
		$js = 'function applyColor(newcolor){document.getElementById(\'color\').value = newcolor; document.getElementById("colordiv").style.display = "none";applyColorExample();}';
		$js .= 'function applyColorExample(){document.getElementById(\'colorexample\').style.backgroundColor = document.getElementById(\'color\').value; document.getElementById("colordiv").style.display = "none";}';
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
	}
	function display($map = '',$value = ''){
		$text = '<table><tr>';
		foreach($this->othervalues as $oneColor){
			$text .= '<td style="cursor:pointer" width="10" height="10" bgcolor="'.$oneColor.'" onclick="applyColor(\''.$oneColor.'\')"></td>';
		}
		$text .= '</tr></table>';
		$text .= '<table>';
		foreach($this->values as $line){
			$text .= '<tr>';
			foreach($line as $oneColor){
				$text .= '<td style="cursor:pointer" width="10" height="10" bgcolor="'.$oneColor.'" onclick="applyColor(\''.$oneColor.'\')"></td>';
			}
			$text .= '</tr>';
		}
		$text .= '</table>';
		return $text;
	}
}