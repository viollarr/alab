<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54


function createGuide() {

		if ( ACA_CMSTYPE ) {	// joomla 15
			$my	=& JFactory::getUser();
			$doc =& JFactory::getDocument();
		}//endif


	$xf = new xonfig();
	if ( ACA_CMSTYPE ) {	// joomla 15
		$option = JRequest::getVar('option', '' );
	}

	if (($GLOBALS[ACA.'show_guide'])) {
		//$js = ' function toggleWizard() {
		//			var acaWizard = document.getElementById(\'acaWizard\')
		//		if (acaWizard.style.display == "none")
		//			acaWizard.style.display = "";
		//		else
		//			acaWizard.style.display = "none";
		//	  }';
		//$doc->addScriptDeclaration( $js );
		//$doc->addScriptDeclaration( $js );

		$css = 'fieldset.menubackgr {-moz-border-radius:8px;-webkit-border-radius:8px;} div#acaWizard ul {list-style-image:url('.ACA_PATH_ADMIN_IMAGES.'bullet_01.png);padding-left:50px; }';

		//disabled wizard for stats popup graph
		$task = JRequest::getVar( 'task', '' );
		$act = JRequest::getVar( 'act', '' );
		if ( $act = 'statistics' && $task == 'graph' )
			$css = 'fieldset.menubackgr {display:none;}';

	//	$doc->addStyleDeclaration($css);
	}
	$guide='';
	 if ( $option != 'com_installer') {
		$guide .= '<div width="80%" id="acawizard" class="acawizard"><center><fieldset class="menubackgr" style="padding: 10px; text-align: left">' ;
		$guide .="<legend><img src='".ACA_PATH_ADMIN_IMAGES."toolbar/wizard.png' border='0' align='absmiddle' alt='jnewsletter guide' style='width: 35px; height: 35px;' hspace='6'>" ;
		$guide .= "<strong>jNews". _ACA_GUIDE ."</strong></legend>";

		if ($GLOBALS[ACA.'act_totallist0'] <= 0 ) {
				$guide .= _HI.' '.$my->username."!"._ACA_GUIDE_FIRST_ACA_STEP;
				$guide .= '<strong><u>'._ACA_STEP.'1</u></strong><br />';
				if (($GLOBALS[ACA.'news1'] == 1
				OR $GLOBALS[ACA.'news2'] == 1
				OR $GLOBALS[ACA.'news3'] == 1) AND $option<>'com_installer') 	$guide .= _ACA_GUIDE_FIRST_ACA_STEP_UPGRADE;
				$guide .= _ACA_GUIDE_FIRST_ACA_STEP_DESC;
				$guide .= "<a href='index2.php?option=com_jnewsletter&act=list&task=new'>";
				$guide .= "<img src='".ACA_PATH_ADMIN_IMAGES."toolbar/newT.png' border='0' align='absmiddle' alt='jnewsletter guide' style='width: 26px; height: 26px;' hspace='6'>";
				$guide .= "</a>";

		} elseif ( $GLOBALS[ACA.'act_totalmailing0']  <= 0 ) {
		       if ($GLOBALS[ACA.'act_totallist1'] == 1) {
			       	$type_list = _ACA_NEWSLETTER;
					$link = '<a href="index2.php?option=com_jnewsletter&act=mailing&listype=1">'._ACA_GUIDE_SECOND_ACA_STEP_NEWS.'</a>';
				 } else {
			       	$type_list = _ACA_AUTORESP;
					$link = '<a href="index2.php?option=com_jnewsletter&act=mailing&listype=2">'._ACA_GUIDE_SECOND_ACA_STEP_AUTO.'</a>';
				 }
				$guide .= '<strong><u>'._ACA_STEP.'2</u></strong><br />';
				$guide .= sprintf (_ACA_GUIDE_SECOND_ACA_STEP, $type_list);
				$guide .= $link;
				$guide .= sprintf (_ACA_GUIDE_SECOND_ACA_STEP_FINAL, $type_list, $type_list);
				$guide .= "<img src='".ACA_PATH_ADMIN_IMAGES."toolbar/newT.png' border='0' align='absmiddle' alt='jnewsletter guide' style='width: 26px; height: 26px;' hspace='6'>";

		} elseif ($GLOBALS[ACA.'act_totalmailing0'] < 2 AND $GLOBALS[ACA.'mod_pub']==0) {


				jnewsletter::resetUpgrade();
			    if ($GLOBALS[ACA.'firstmailing'] == 2) {
					$guide .= '<strong><u>'._ACA_STEP.'3</u></strong><br />';
					$guide .= _ACA_GUIDE_THRID_ACA_STEP_AUTOS;
					if ($GLOBALS[ACA.'mod_pub']==0) $guide .= _ACA_GUIDE_MODULE;
				 } else {
					$guide .= '<strong><u>'._ACA_STEP.'3</u></strong><br />';
					$guide .= _ACA_GUIDE_THRID_ACA_STEP_NEWS;
					if ($GLOBALS[ACA.'mod_pub']==0) $guide .= _ACA_GUIDE_MODULE;
					$guide .= _ACA_GUIDE_THRID2_ACA_STEP_NEWS;
					$guide .= "<img src='".ACA_PATH_ADMIN_IMAGES."toolbar/message_sent.png' border='0' align='absmiddle' alt='jnewsletter guide' style='width: 26px; height: 26px;' hspace='6'>";
				 }

		} elseif (($GLOBALS[ACA.'mod_pub']==1 OR $GLOBALS[ACA.'act_totallist0'] > 1) AND ($GLOBALS[ACA.'act_totalmailing0'] < 2)) {

			    if ($GLOBALS[ACA.'firstmailing'] == 1) {
					$guide .= '<strong><u>'._ACA_STEP.'4</u></strong><br />';
					if ($GLOBALS[ACA.'listype2'] == 1 AND class_exists('auto')) $guide .= _ACA_GUIDE_FOUR_ACA_STEP_NEWS.'<br />'._ACA_GUIDE_THRID_ACA_STEP_AUTOS;
				 } else {
					$guide .= '<strong><u>'._ACA_STEP.'4</u></strong><br />';
					$guide .= _ACA_GUIDE_FOUR_ACA_STEP_AUTOS.'<br />'._ACA_GUIDE_THRID_ACA_STEP_NEWS;
				 }
				$guide .= _ACA_GUIDE_FOUR_ACA_STEP;
		} else {

			$act = JRequest::getVar('act', '' );

			switch( $act )
			{
				case 'templates':
							$guide .= _ACA_TEMPLATES_GUIDE;
							break;
				case 'queue':
							$guide .= _ACA_QUEUE_GUIDE;
							break;
				case 'mailing':
							$mailingType = JRequest::getVar( 'listype' );

							switch( $mailingType )
							{
								case '1': $guide .= _ACA_NEWSLETTER_GUIDE;
										break;
								case '2': $guide .= _ACA_AUTORESPONDER_GUIDE;
										break;
								case '7': $guide .= _ACA_SMARTNEWSLETTER_GUIDE;
										break;
								default: $guide .= _ACA_NEWSLETTER_GUIDE;
										break;
							} //endswitch

							break;
				case 'statistics':
							$guide .= _ACA_STATS_GUIDE;
							break;
				case 'list':
							$guide .= _ACA_LIST_GUIDE;
							break;
				case 'subscribers':
							$guide .= _ACA_SUBSCRIBERS_GUIDE;
							break;
				case 'configuration':
							$guide .= _ACA_CONFIGURATION_GUIDE;
							break;
				case 'update':
							$guide .= _ACA_IMPORT_GUIDE ;
							break;
				case 'about':
							$guide .= _ACA_ABOUT_GUIDE;
							break;
				default :	$guide .= '<strong>'._ACA_GUIDE_TURNOFF.'</strong>';
							$config = array();
							$config['show_guide'] = '1';
							$xf->saveConfig($config);
							break;
			} //endswitch
		}

	$guide .= '</fieldset></center></div>';
	$guide .= '<script type="text/javascript">
				var jNewsSwitchContent=new switchcontent("acawizard", "div") //Limit scanning of switch contents to just "div" elements
				jNewsSwitchContent.setPersist(true)
				jNewsSwitchContent.collapsePrevious(true) //Only one content open at any given time
				jNewsSwitchContent.init()
				</script>';
	 }
	return $guide;
}


