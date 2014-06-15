<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<td align="right">
<?php foreach($row->subscription as $listid => $subinfo){
		$statuslistid = 'status_'.$listid.'_'.$subinfo->subid;
		echo '<div id="'.$statuslistid.'" class="loading">';
		$extra = null;
		$extra['color'] = $this->lists[$listid]->color;
		$extra['tooltip'] = '<b>'.$this->lists[$listid]->name.'</b><br/><br/>';
		if($subinfo->status > 0){
			$extra['tooltip'] .= '<b>Status : </b>';
			$extra['tooltip'] .= ($subinfo->status == '1') ? 'Subscribed' : 'Wait Confirmation';
			$extra['tooltip'] .= '<br/><b>Signed up date : </b>'.acymailing::getDate($subinfo->subdate);
		}else{
			$extra['tooltip'] .= '<b>Status : </b>Unsubscribed<br/>';
			$extra['tooltip'] .= '<b>Unsubscribe date : </b>'.acymailing::getDate($subinfo->unsubdate);
		}
		echo $this->toggleClass->toggle($statuslistid,$subinfo->status,'listsub',$extra);
		echo '</div>';
	}
?>
</td>