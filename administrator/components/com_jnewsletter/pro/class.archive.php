	<?php
	defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
	### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

	 class aca_archive {
		function archive() {

			if ( $GLOBALS[ACA.'frequency']>0 ) {

			  switch ($GLOBALS[ACA.'frequency']) {
			  	case '0':
					return false;
					break;
			  	case '1':
			  		$delay = mktime(0, 0, 0, date("m"), date("d")-7,  date("Y"));
			  		break;
			  	case '2':
			  		$delay = mktime(0, 0, 0, date("m"), date("d")-14,  date("Y"));
			  		break;
			  	case '3':
			  		$delay = mktime(0, 0, 0, date("m")-1, date("d"),  date("Y"));
			  		break;
			  	case '4':
			  		$delay = mktime(0, 0, 0, date("m")-3, date("d"),  date("Y"));
			  		break;
			  	case '5':
			  		$delay = mktime(0, 0, 0, date("m"), date("d"),  date("Y")-1);
			  		break;
			  	case '6':
			  		$delay = mktime(0, 0, 0, date("m"), date("d"),  date("Y")-$GLOBALS[ACA.'date_type']);
			  		break;
			  	default:
			  		return false;
			  		break;
			  }//endswitch
			  $archiveDate = date ( 'Y-m-d H:i:s', $delay );
			  $cids = aca_archive :: getallOutDatedContent ($archiveDate);
				if ( !empty($cids) ) return aca_archive :: changeContent( $cids, -1 );

			}//endif
		}//endfct


		function changeContent( $cid=null, $state=0 ) {

			if ( ACA_CMSTYPE ) {	// joomla 15
				$database =& JFactory::getDBO();
				$my	=& JFactory::getUser();
			}//endif


			if ( empty($cid) ) return true;

			if ( !is_array($cid) ) {
				$cid2 = $cid;
				unset($cid);
				$cid[]=$cid2;
			}//endif

			$total = count ( $cid );
			if($total<1) return true;

			$cids = implode( ',', $cid );
			$query = "UPDATE #__content"
			. "\n SET state = $state, modified = " . $database->Quote( date( 'Y-m-d H:i:s' ) )
			. "\n WHERE id IN ( $cids ) AND ( checked_out = 0 )"
			;
			$database->setQuery( $query );
			if (!$database->query()) {
				return false;
			}//endif
			if (count( $cid ) == 1) {
				$row = new mosContent( $database );
				$row->checkin( $cid[0] );
			}//endif
			return true;
		}//endfct


		function getallOutDatedContent($date) {

			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
			}//endif

			$query = 'SELECT `id` FROM `#__content`' ;
			if ($GLOBALS[ACA.'date_type'] = 1) {
				$query .= ' WHERE `created`< \''.$date . '\'';
			} else {
				$query .= ' WHERE `modified`< \''.$date . '\'';
			}//endif

			if ( $GLOBALS[ACA.'arv_cat'] > 0 ) $query .= ' AND `catid`= \''.$GLOBALS[ACA.'arv_cat'] . '\'';
			if ( $GLOBALS[ACA.'arv_sec'] > 0 ) $query .= ' AND `sectionid`= \''.$GLOBALS[ACA.'arv_sec'] . '\'';
			$database->setQuery($query);
			$contents = $database->loadObjectList();
			$error = $database->getErrorMsg();
			$i = 0;
			foreach ($contents as $content ) {
				$i++;
				$cids[$i] = $content->id;
			}//endforeach

			if (!empty($error)) {

				return false;
			} else {
		       return $cids;
	       }//endif
		 }//endforeach

	function showArchive($lists) {

			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
				JHTML::_('behavior.calendar');
				$sections[] = JHTML::_('select.option', '0', _ACA_SELECT_SECTION, 'id', 'title' );
			}//endif

			if (empty($GLOBALS[ACA.'arv_cat'])) {
				$GLOBALS[ACA.'arv_cat']= (int)0;
			}//endif
			if(empty($GLOBALS[ACA.'arv_sec'])) {
				$GLOBALS[ACA.'arv_sec']= (int)0;
				$GLOBALS[ACA.'arv_cat']= (int)0;
			}//endif

			$javascript = "onchange=\"changeDynaList( 'arv_cat', sectioncategories, document.adminForm.arv_sec.options[document.adminForm.arv_sec.selectedIndex].value, 0, 0);saveSec();\"";
	        $cat_javascript = "onchange=\"saveCat();\"";

			$query = "SELECT s.id, s.title"
			. "\n FROM #__sections AS s"
			. "\n ORDER BY s.ordering";
			$database->setQuery( $query );
			$allSections = $database->loadObjectList();
			$sections = array_merge( $sections, $allSections );

			$sectioncategories 			= array();
			$sectioncategories[0] 		= array();
			$sectioncategoriesStart = array();
			if ( ACA_CMSTYPE ) {	// joomla 15
				$lists['sectionid'] = JHTML::_('select.genericlist', $sections, "arv_sec", 'class="inputbox" size="1" '. $javascript, 'id', 'title' , intval( $GLOBALS[ACA.'arv_sec'] ));
				$sectioncategories[0][] 	= JHTML::_('select.option', '0', _ACA_SELECT_CAT, 'id', 'name' );
		 		$sectioncategoriesStart[] 		= JHTML::_('select.option', '0', _ACA_SELECT_CAT, 'id', 'name' );
			}//endif

			$contentSection = '';
			foreach($sections as $section) {
				$section_list[] = $section->id;
				if ( $section->id == $GLOBALS[ACA.'arv_cat'] ) {
					$contentSection = $section->title;
				}//endif

			}//endforeach
			$section_list 				= implode( '\', \'', $section_list );
			$query = "SELECT id, title as name, section"
			. "\n FROM #__categories"
			. "\n WHERE section IN ( '$section_list' )"
			. "\n ORDER BY ordering"
			;
			$database->setQuery( $query );
			$cat_list = $database->loadObjectList();
			foreach($sections as $section) {
				$sectioncategories[$section->id] = array();
				$rows2 = array();
				foreach($cat_list as $cat) {
					if ($cat->section == $section->id) {
						$rows2[] = $cat;
					}
				}
				if ( ACA_CMSTYPE ) {	// joomla 15
			 		$sectioncategories[$section->id][] 	= JHTML::_('select.option', '0', _ACA_SELECT_CAT, 'id', 'name' );
				} else {									//joomla 1x
			 		$sectioncategories[$section->id][] 	= mosHTML::makeOption( '0', _ACA_SELECT_CAT, 'id', 'name' );
				}//endif
				foreach($rows2 as $row2) {
					if ( ACA_CMSTYPE ) {	// joomla 15
						$sectioncategories[$section->id][] = JHTML::_('select.option', $row2->id, $row2->name, 'id', 'name' );
					}//endif
				}
			}//endforeach

		  	if ( !$GLOBALS[ACA.'arv_sec'] && !$GLOBALS[ACA.'arv_cat'] ) {
				if ( ACA_CMSTYPE ) {	// joomla 15
			 		$categories[] 		= JHTML::_('select.option', '0', _ACA_SELECT_CAT, 'id', 'name' );
			 		$lists['catid'] 	= JHTML::_('select.genericlist', $categories, 'arv_cat', 'class="inputbox" size="1" ' . $cat_javascript, 'id', 'name' );
				}//endif
		  	}//endif
		  	else {
				foreach($cat_list as $cat) {
					if ($cat->section == $GLOBALS[ACA.'arv_sec']) {
						$categoriesA[] = $cat;
						}
				}//endforeach
				if ( ACA_CMSTYPE ) {	// joomla 15
			 		$categories[] 		= JHTML::_('select.option', '0', _ACA_SELECT_CAT, 'id', 'name' );
				}//endif
				$categories 		= array_merge( $categories, $categoriesA );
				if ( ACA_CMSTYPE ) {	// joomla 15
			 		$lists['catid'] 	= JHTML::_('select.genericlist', $categories, 'arv_cat', 'class="inputbox" size="1" ' . $cat_javascript, 'id', 'name', intval( $GLOBALS[ACA.'arv_cat'] ) );
				}//endif

		  	}//endif

			?>
			<script language="javascript" type="text/javascript">
			<!--
			var sectioncategories = new Array;
			<?php
			$i = 0;
			foreach ($sectioncategories as $k=>$items) {
				foreach ($items as $v) {
					echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->name )."' );\t";
				}//endforeach
			}//endforeach
			?>
	        function saveCat() {
	            document.getElementById('arvcat').value=document.adminForm.arv_cat.options[document.adminForm.arv_cat.selectedIndex].value;
	            document.getElementById('arvsec').value=document.adminForm.arv_sec.options[document.adminForm.arv_sec.selectedIndex].value;
	        }
	        function saveSec() {
	            document.getElementById('arvsec').value=document.adminForm.arv_sec.options[document.adminForm.arv_sec.selectedIndex].value;
	            document.getElementById('arvcat').value=document.adminForm.arv_cat.options[document.adminForm.arv_cat.selectedIndex].value;
	        }
			//-->
			</script>
		<fieldset class="jnewslettercss">
		<legend><?php echo _ACA_ARCHIVE_TITLE; ?></legend>
		<table class="jnewslettertable" cellspacing="1">
			<tbody>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_FREQ_TOOL ;
						$title = _ACA_FREQ_TITLE;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['frequency'] ; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_NB_DAYS_TOOL;
						$title = _ACA_NB_DAYS;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['nb_days']" size="5" maxlength="9" value="<?php echo $GLOBALS[ACA.'nb_days']; ?>">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_DATE_TOOL ;
						$title = _ACA_DATE_TITLE;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['date_type'] ; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_SECTION_TIPS;
						$title = _ACA_AUTONEWS_SECTION;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['sectionid']; ?>
					<input type="hidden" name="config['arv_sec']" id="arvsec" value="<?php echo $GLOBALS[ACA.'arv_sec']; ?>"/>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_AUTONEWS_CAT_TIPS;
						$title = _ACA_AUTONEWS_CAT;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['catid']; ?>
					<input type="hidden" name="config['arv_cat']" id="arvcat" value="<?php echo $GLOBALS[ACA.'arv_cat']; ?>" />
				</td>
			</tr>
			</tbody>
		</table>
		</fieldset>
		<?php
	}//endfct
	 }//endclass
