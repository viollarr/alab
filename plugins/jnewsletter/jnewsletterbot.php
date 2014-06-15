<?php
 defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

if ( !defined('ACA_JPATH_ROOT') ) {
	require_once( JPATH_ROOT . '/components/com_jnewsletter/defines.php');
}//endif


if ( strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) ) =='administrator' ) {	// joomla 15
	$adminPath = strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) );
} else {
	$adminPath = JPATH_ROOT;
}//endif

require_once( $adminPath . '/components/com_jnewsletter/defines.php');

$mainframe->registerEvent( 'jnewsletterbot_editabs', 'jnewsletterbot_content_editab' );
$mainframe->registerEvent( 'jnewsletterbot_transformall', 'jnewsletterbot_content_transformall' );
$mainframe->registerEvent( 'jnewsletterbot_transformall', 'jnewsletterbot_jcalpro_transformall' );

//register the viewonline tag as an event to be executed
if ($GLOBALS[ACA.'type']=='PLUS' OR $GLOBALS[ACA.'type']=='PRO'){
	$mainframe->registerEvent( 'jnewsletterbot_transformall', 'jnewsletterbot_viewonline_transformall' );
}
$mainframe->registerEvent('jnewsletterbot_transformfinal', 'jnewsletterbot_class_transformfinal');

 function jnewsletterbot_content_editab() {
 	 $content_items = jnewsletterbot_content_getitems();
 	 ob_start();
?>
<script language="javascript" type="text/javascript">
<!--

	function selectFormFB(){
	if(!document.adminForm){
		return 'mosForm';
	}else{
		return 'adminForm';
	}
}

function selectFB(variable){
	var formname = selectFormFB();
	return eval('document.'+formname+'.'+variable);
}

function jNewsletterInsertTag() {
	// get the info
	var form = document.adminForm;
	if(!form){
		form = document.mosForm;
	}
	var content_id = form.content_id.options[form.content_id.selectedIndex].value;

    //changed to use radio instead of checkbox - p0stman911
    for (i=0;i<form.content_type.length;i++) {
        if (form.content_type[i].checked) {
             var content_type = form.content_type[i].value;
        }
    }
    // output the tag
	form.content_tag.value = "{contentitem:" + content_id + "|" + content_type + "}";
} // end function
//-->
	</script>

<table class="jnewslettercss_bots" width="100%">
	<tr>
		<td style="vertical-align: top;">
				<span class="editlinktip">
			    <?php
				$tip =  _ACA_TITLE_ONLY_TIPS ;
            $title = _ACA_TITLE_ONLY;
			   $title_only = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";

				$tip = _ACA_INTRO_ONLY_TIPS;
				$title =  _ACA_INTRO_ONLY;
				$intro_only = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";

            $tip =  _ACA_FULL_ARTICLE_TIPS;
				$title =  _ACA_FULL_ARTICLE ;
				$full_article = "<span class=\"editlinktip\">" . compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 ) . "</span>";
				?>
				</span>
				<br /><br />
				<span class="editlinktip">
                <input type="radio" name="content_type" value="0" checked="checked" onclick="jNewsletterInsertTag();" /><?php echo $full_article; ?>
                <input type="radio" name="content_type" value="1" onclick="jNewsletterInsertTag();" /><?php echo $intro_only; ?>
                <input type="radio" name="content_type" value="2" onclick="jNewsletterInsertTag();" /><?php echo $title_only; ?>
                </span>
			<br /><br />
				<span class="editlinktip">
				<?php
					$tip = _ACA_TAGS_TITLE_TIPS;
					$title = _ACA_TAGS_TITLE.': ';
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			<input type="text" name="content_tag" class="inputbox" size="20" onfocus="this.select();" /><input type="button" value="Insert" onclick="jInsertEditorText(form.content_tag.value,'content');"/>
			<br /><br />
			<select name="content_id" class="inputbox" size="30" style="width: 420px" onchange="jNewsletterInsertTag();">
			<?php
				 if(sizeof($content_items) > 0) {
					 foreach ($content_items AS $content_item) {
					 	if(empty($content_item->section)) $sectionslash = '';
					 		else $sectionslash = '/';
					 	if(empty($content_item->category)) $categoryslash = '';
					 		else $categoryslash = '/';
						 echo '<option value="' . $content_item->id . '">' . $content_item->section . $sectionslash . $content_item->category . $categoryslash . $content_item->title . '</option>' . "\n";
					 }
				 }
			?>
			</select>
		</td>
	</tr>
</table>

<?php

	 $return = ob_get_contents();
	 ob_end_clean();
	 return array(_ACA_CONTENT_ITEM, $return);
 }//endfct

 function jnewsletterbot_content_getitems() {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} else {
			global $database ;
		}//endif

		//get the parameters from the plugin
		$plugin =& JPluginHelper::getPlugin('jnewsletter', 'jnewsletterbot');
		$params = new JParameter( $plugin->params );
		//get the limit parameter
		$content_limit = $params->get('content_limit','0');
		if(empty($content_limit)) $content_limit = 5000;
		// 1 is ordered by Category
		if ($params->get('content_order','0') == '1') $query = "SELECT a.id as id, a.title as title, c.title as category FROM #__content as a LEFT JOIN #__sections as b ON a.sectionid = b.id LEFT JOIN #__categories AS c ON a.catid = c.id WHERE a.created > '".date('Y-m-d H:i:s',time()-30240000)."' ORDER BY a.sectionid, a.catid ASC LIMIT ".$content_limit;
		// 2 is ordered by Date
		else if ($params->get('content_order','0') == '2') $query = "SELECT a.id as id, a.title as title,  b.title as section, c.title as category FROM #__content as a LEFT JOIN #__sections as b ON a.sectionid = b.id LEFT JOIN #__categories AS c ON a.catid = c.id WHERE a.created > '".date('Y-m-d H:i:s',time()-30240000)."' ORDER BY a.created DESC LIMIT ".$content_limit;
		// 3 is ordered by Alphabetical order
		else if ($params->get('content_order','0') == '3') $query = "SELECT a.id as id, a.title as title FROM #__content as a LEFT JOIN #__sections as b ON a.sectionid = b.id LEFT JOIN #__categories AS c ON a.catid = c.id WHERE a.created > '".date('Y-m-d H:i:s',time()-30240000)."' ORDER BY a.title ASC LIMIT ".$content_limit;
		// 0 is ordered by Section
		else $query = "SELECT a.id as id, a.title as title, b.title as section, c.title as category FROM #__content as a LEFT JOIN #__sections as b ON a.sectionid = b.id LEFT JOIN #__categories AS c ON a.catid = c.id WHERE a.created > '".date('Y-m-d H:i:s',time()-30240000)."' ORDER BY a.sectionid, a.catid, a.created DESC LIMIT ".$content_limit;
	 $database->setQuery($query);
	 $contentitems = $database->loadObjectList();
	 return $contentitems;
 }//endfct

 function jnewsletterbot_content_transformall($html, $text) {
	 global  $mainframe;

 	 $content_items = array();
	 preg_match_all('/\{contentitem:(.{1,8})\|(.{1})}/', $html, $content_items, PREG_SET_ORDER);
	 foreach ($content_items as $content_item) {

		 $Itemid = $mainframe->getItemId($content_item[1]);
		 if(empty($Itemid)){
		 	$Itemid = $GLOBALS[ACA.'itemidAca'];
		 }
		 $replacement = jnewsletterbot_content_getitem($content_item[1]);
		 if ($GLOBALS[ACA.'show_author'] == 1){
		 		$author = '<br />'.$replacement->created_by_alias;
	 	}
	 	else{
	 		$author = '';
	 	}

		 if ($content_item[2] == 0) {
			 $html = str_replace($content_item[0], '<div class="aca_content"><span class="aca_title">' . $replacement->title . '</span>' . "\r\n" . $author .'<br />' . $replacement->introtext . '<br />' . "\r\n" . $replacement->fulltext . "\r\n".'</div>', $html);
		 } else {

			$link = '.php?option=com_content&view=article&id='.$content_item[1].'&Itemid='.$Itemid;
			compa::completeLink($link,false,$GLOBALS[ACA.'use_sef']);

             if ($content_item[2] == 1) {
             	if(empty($replacement->fulltext) AND !empty($GLOBALS[ACA.'word_wrap'])){
             		//Limit the number of words
             		if(strlen($replacement->introtext) > $GLOBALS[ACA.'word_wrap']){
             			$fulltext = strip_tags($replacement->introtext,'<br><img>');
             			if(strlen($fulltext) > $GLOBALS[ACA.'word_wrap']){
	             			//We make sure we won't cut any html tag :
	             			$open = 0;
	             			$limitText = strlen($fulltext) - 1;
	             			for($i=0;$i<strlen($fulltext);$i++){
	             				if($replacement->introtext[$i] == '<'){ $open++; continue;}
	             				if($replacement->introtext[$i] == '>'){$open--; continue;}
	             				if($replacement->introtext[$i] == " " AND $i>$GLOBALS[ACA.'word_wrap'] AND $open == 0){
	             					$limitText = $i-1;
	             					break;
	             				}
	             			}
	             			$replacement->introtext = substr($fulltext,0,$limitText).'...';
             			}
             		}
             	}
			    $html = str_replace($content_item[0], '<div class="aca_content"><span class="aca_title">' . $replacement->title . '</span>' . "\r\n" . $author . '<br />' . $replacement->introtext . '<br />' . "\r\n" . '<a href="' . $link . '"><span class="aca_readmore">' . _ACA_READMORE . '</span></a>' . "\r\n".'</div>', $html);
             }
             else {
			    $html = str_replace($content_item[0], '<a href="' . $link . '"><span class="aca_title">' . $replacement->title . '</span></a>', $html);
             }
        }

		 $images = jnewsletterbot_content_getimage($replacement->images);
		 foreach($images as $image) {
			 $image_string = '<img src="' . ACA_JPATH_LIVE_NO_HTTPS . '/images/stories/' . $image['image'] . '" align="' . $image['align'] . '" alt="' . $image['alttext'] . '" border="' . $image['border'] . '" />';
			 $html = preg_replace('/{mosimage}/', $image_string, $html, 1);
		 }
	 }
	 $content_items = array();
	 preg_match_all('/\{contentitem:(.{1,5})\|(.{1})}/', $text, $content_items, PREG_SET_ORDER);
	 foreach ($content_items as $content_item) {

		 $Itemid = $mainframe->getItemId($content_item[1]);
		 if(empty($Itemid)){
		 	$Itemid = $GLOBALS[ACA.'itemidAca'];
		 }
		 $replacement = jnewsletterbot_content_getitem($content_item[1]);
 		if ($GLOBALS[ACA.'show_author'] == 1){
		 	$author = "\r\n".$replacement->created_by_alias;
	 	}
	 	else{
	 		$author = '';
	 	}

		 $replacement->title ="<b>". strtoupper(jnewsletter_mail::htmlToText($replacement->title)) ."</b>";
		 $replacement->introtext = jnewsletter_mail::htmlToText($replacement->introtext);
		 $replacement->fulltext = jnewsletter_mail::htmlToText($replacement->fulltext);
		 if ($content_item[2] == 0) {
			 $text = str_replace($content_item[0], $replacement->title . $author . "\r\n" . $replacement->introtext . "\r\n" . $replacement->fulltext . "\r\n", $text);
		 } else {

		 	$link = '.php?option=com_content&view=article&id=' . $content_item[1].'&Itemid='.$Itemid ;
		 	compa::completeLink($link,false,$GLOBALS[ACA.'use_sef']);

             if ($content_item[2] == 1) {
				if(empty($replacement->fulltext) AND !empty($GLOBALS[ACA.'word_wrap'])){
             		if(strlen($replacement->introtext) > $GLOBALS[ACA.'word_wrap']){
             			$replacement->introtext = substr(strip_tags($replacement->introtext),0,$GLOBALS[ACA.'word_wrap']).'...';
             		}
             	}
			    $text = str_replace($content_item[0], $replacement->title . $author . "\r\n" . $replacement->introtext . "\r\n" . '* ' . _ACA_READMORE . ' ( '. $link . ' )' . "\r\n", $text);
             }
             else {
			    $text = str_replace($content_item[0], $replacement->title . ' ( ' . $link . ' )', $text);
             }
         }
		 $text = str_replace('{mosimage}', '', $text);
	 }

	 $html = str_replace('{mospagebreak}', '<div style="clear: both;" ></div>', $html);
	 $text = str_replace('{mospagebreak}', "\r\n \r\n", $text);

 }//endfct

 function jnewsletterbot_content_getitem($id) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} else {
			global $database ;
		}//endif

	$erro = new xerr( __FILE__ , __FUNCTION__ );
	$query = "SELECT a.title as title, a.sectionid as sectionid, a.catid as catid, a.introtext as introtext, b.name as name, a.created_by_alias as created_by_alias, a.fulltext as `fulltext`, a.images as images FROM #__content as a LEFT JOIN #__users as b ON a.created_by = b.id WHERE a.id = $id";
	$database->setQuery($query);
				if ( ACA_CMSTYPE ) {	// joomla 15
					$content_item = $database->loadObject();
				} else {									//joomla 1x
					$database->loadObject($content_item);
				}//endif

	$erro->err = $database->getErrorMsg();
	$erro->show();

	if($content_item->created_by_alias == ''){$content_item->created_by_alias = $content_item->name;}

	 if (!$erro->E(__LINE__ ,  '8011')	) {
		return false;
	} else {
		if(get_magic_quotes_runtime()) {
			$content_item->title ="<b>". stripslashes($content_item->title)."</b>";
			$content_item->introtext = stripslashes($content_item->introtext);
			$content_item->fulltext = stripslashes($content_item->fulltext);
			$content_item->images = stripslashes($content_item->images);
			$content_item->created_by_alias = stripslashes($content_item->created_by_alias);
		}

		return $content_item;
	}
 }//endfct

 function jnewsletterbot_content_getimage($images) {

	$first = @explode("\n",$images);

	for($i=0, $n=count($first); $i < $n; $i++) {
		$second = explode('|',$first[$i] . '|||');
		$third[$i]['image'] = $second[0];
		$third[$i]['align'] = $second[1];
		$third[$i]['alttext'] = $second[2];
		$third[$i]['border'] = $second[3];
	}
	return $third;
 }//endfct

 function jnewsletterbot_jcalpro_transformall($html, $text) {

	$database =& JFactory::getDBO();

	$Itemid = $GLOBALS[ACA.'itemidAca'];

 	preg_match_all('#{jcalevent:.{7,15}}#', $html.$text, $tags);
 	$replace = array();
 	$replacebyHTML = array();
 	$replacebyText = array();
 	if(!empty($tags[0])){
 		foreach ($tags[0] as $tag){
			$isolate = explode(':',$tag);
			if(count($isolate)!=2) continue;
			$parameters = explode('|',$isolate[1]);
			if(count($parameters)!=4) continue;
			if(!empty($replace[$tag])) continue;
			$replace[$tag] = $tag;
			$query = 'SELECT `title`, `description`, `end_date`, `start_date`, `extid` from #__jcalpro2_events where `extid` = '.intval($parameters[0]);
			$database->setQuery($query);
				if ( ACA_CMSTYPE ) {	// joomla 15
					$event = $database->loadObject();
				} else {									//joomla 1x
					$database->loadObject($event);
				}//endif

			if(empty($event->extid)){
				$replacebyHTML[$tag] = '';
				$replacebyText[$tag] = '';
				continue;
			}

			if(get_magic_quotes_runtime()) {
				$event->title = stripslashes($event->title);
				$event->description = stripslashes($event->description);
			}

			$eventhtml = '';
			if($parameters[2]){
				$eventhtml .= '<div class="aca_jcalcontent">';
			}
			$eventhtml .=  '<span class="aca_jcaltitle">' . $event->title . '</span>';
			$eventtext = strtoupper(jnewsletter_mail::htmlToText($event->title));

			if($parameters[1]){
				$start_date_array = (explode('-',$event->start_date));
				$start_time_array = (explode(':',substr($event->start_date,10,15)));
				$date = strftime(JText::_('DATE_FORMAT_LC'), mktime($start_time_array[0], $start_time_array[1], 0, $start_date_array[1], $start_date_array[2], $start_date_array[0]));
				$eventhtml.= '<br/>'.$date;
				$eventtext.= "\r\n".$date;
			}
			if($parameters[2]){
				$eventhtml.= '<br/>'.$event->description;
				$eventtext.= "\r\n".jnewsletter_mail::htmlToText($event->description);
			}
			if($parameters[3]){
				$link = '.php?option=com_jcalpro&extmode=view&extid='.$event->extid.'&Itemid='.$Itemid ;
				compa::completeLink($link,false,$GLOBALS[ACA.'use_sef']);

				$eventhtml.= '<br/><a href="' . $link . '"><span class="aca_readmore">' . _ACA_READMORE . '</span></a>';
				$eventtext.= "\r\n".' * ' . _ACA_READMORE . ' ( '. $link . ' )';
			}

			if($parameters[2]){
				$eventhtml .= '</div>';
			}

			$replacebyHTML[$tag] = $eventhtml;
			$replacebyText[$tag] = $eventtext;
 		}
 	}
 	$html = str_replace($replace,$replacebyHTML,$html);
	$text = str_replace($replace,$replacebyText,$text);
 }//endfct

// This function adds the viewonline tag
//	It will take the text inside the tag and create a link on it to direct the user to the online version of the newsletter
 function jnewsletterbot_viewonline_transformall($html, $text) {

	$database =& JFactory::getDBO();
	$Itemid = $GLOBALS[ACA.'itemidAca'];
	$viewonlinehtml='';
	$viewonlinetext='';

	// catches all the viewonline tags on the newsletter html and text body
 	preg_match_all('#{viewonline:.{3,}#', $html.$text, $tags);
 	$replace = array();
 	$replacebyHTML = array();

 	$replacebyText = array();
 	if(!empty($tags[0])){

 		foreach ($tags[0] as $tag){

			$isolate = explode(':',$tag);
			$details = explode('}',$isolate[1]);

			if(!empty($replace[$tag])) continue;
			$replace[$tag] = $tag;
			$Itemid = $GLOBALS[ACA.'itemidAca'];
			$mailingId = JRequest::getInt('mailingid', 0, 'request');

			$listId = JRequest::getInt('listid', 0, 'request');

			//create the link
			$link = '2.php?option=com_jnewsletter&act=mailing&task=view&listid='.$listId.'&mailingid='.$mailingId.'&Itemid='.$Itemid;
			compa::completeLink($link,false,$GLOBALS[ACA.'use_sef']);

			$viewonlinehtml.= '<a href="' . $link . '"><span class="aca_online">'.$details[0].'</span></a>';
			$viewonlinetext.= "".' * '.$details[0].' ( '. $link . ' )';

			$replacebyHTML[$tag] = $viewonlinehtml;
			$replacebyText[$tag] = $viewonlinetext;

 		}
 	}
	//replace the tag with the exact link
 	$html = str_replace($replace,$replacebyHTML,$html);
	$text = str_replace($replace,$replacebyText,$text);
 }
// end of viewonline tag function

 function jnewsletterbot_class_transformfinal($html, $text,$params = null) {

	$database =& JFactory::getDBO();

	 $replace = array();
	 $replaceby = array();
	 $i = 0;
	 if(!empty($params)){
		 foreach($params as $class => $style){
			if(preg_match('#class_#',$class) AND !empty($style)){
				$class = str_replace('class_','',$class);
				$replace[$i] = 'class="'.$class.'"';
				$replaceby[$i] = 'style="'.$style.'"';
				$i++;
			}
		}
	}

	$html = str_replace($replace,$replaceby,$html);
 }//endfct