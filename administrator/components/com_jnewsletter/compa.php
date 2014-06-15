<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
global $_VERSION;

class compa{

	function completeLink(&$link,$back = true,$sef = true){
		if($link == "#") return;

		if(ACA_CMSTYPE){
			if($back){
				$link = 'index'.$link;
			}else{
				$rest = 'index'.$link;
				if($sef){
					$rest = ltrim(JRoute::_($rest),'/');
				}
				if(ACA_URL_MORE AND strpos($rest,ACA_URL_MORE) === false){
					$rest = ACA_URL_MORE.$rest;
				}
				$link = ACA_COMPLETE_URL.$rest;
			}
		}
	}

	function showIcon($image,$text,$text2 = '',$option = 1){

		if ( $image == 'query.png' || $image == 'systeminfo.png' || $image == 'month_f2.png')
			$path = 'administrator/images/'.$image;
		else
			$path = ACA_PATH_ADMIN_IMAGES . $image;

		if(ACA_CMSTYPE){
			echo '<img alt="'.$text.'" src="'.$path.'"/>';
		}
	}

	function toolTip($tooltip, $title='', $width='', $image='tooltip.png', $text='', $href='', $link=1){

		global $mainframe;

		if($GLOBALS[ACA.'disabletooltip'] AND !$mainframe->isAdmin()){
			$text = str_replace(array("'",'"'),array("&#039;",'&quot;'),$text);
			$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$title);

			$return = '<span class="editlinktip">';
			if(!empty($href) AND !preg_match("/#/",$href)){
				$return .='<a href="'. $href .'">';
			}
			$return .= $text ;
			if(!empty($href) AND !preg_match("/#/",$href)){
				$return .='</a>';
			}
			$return .= '</span>';

			return $return;
		}

		if(ACA_CMSTYPE){
			$text = str_replace(array("'",'"'),array("&#039;",'&quot;'),$text);
			$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$title);

			if(preg_match("/#/",$href)){
				$href = null;
			}
			return JHTML::_('tooltip', $tooltip, $title, $image, $text, $href, $link);
		}
	}

	function allow_html(){
		if(ACA_CMSTYPE){
			return JREQUEST_ALLOWRAW;
		}
	}

	function redirect($link, $message = ''){
		global $mainframe;
		if(ACA_CMSTYPE){
			$mainframe->redirect( $link, trim($message) );
			exit;
		}
	}

	function encodeutf($string){
		if(ACA_CMSTYPE){	//j15
			if ( empty($GLOBALS[ACA.'mail_encoding']) ) {
				return iconv("ISO-8859-2", "UTF-8", $string);
			} else {
				return $string;
			}//endif

         // return utf8_encode($string); - this is a bug - this function uses 8859-1
		}
	}//endfct
}//endclass


