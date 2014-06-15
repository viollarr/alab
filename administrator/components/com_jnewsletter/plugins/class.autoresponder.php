<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
 class autoresponder {

	function editmailing() {

		$show['sender_info'] = true;
		$show['published'] = true;
		$show['pub_date'] = false;
		$show['hide'] = true;
		$show['issuenb'] = true;
		$show['delay'] = true;
		$show['htmlcontent'] = true;
		$show['textcontent'] = true;
		$show['attachement'] = true;
		$show['images'] = true;
		$show['sitecontent'] = true;
		return $show;

	}//endfct


	function editlist() {

		$show['sender_info'] = true;
		$show['hide'] = true;
		$show['auto_option'] = true;
		$show['htmlmailing'] = true;
		$show['auto_subscribe'] = true;
		$show['email_unsubcribe'] = true;
		$show['unsusbcribe'] = true;
		return $show;

	}//endfct


	function showMailings() {

		$show['id'] = true;
		$show['dropdown'] = true;
		$show['select'] = true;
		$show['issue'] = true;
		$show['sentdate'] = false;
		$show['delay'] = true;
		$show['status'] = true;
		return $show;

	}//endfct


	function getQueue() {

		$query =  ' AND `mailing_id`> 0 ';
		$query .=  ' AND `issue_nb`> 0 ';
		$query .=  ' AND `published`= 1  ';
		$query .=  ' AND `type`= 2  ';
		return $query;

	}//endfct


	 function getActive() {

		$config['listype2'] = '1';
		$config['listname2'] = '_ACA_AUTORESP';
		$config['listnames2'] = '_ACA_MENU_AUTOS';
		$config['listshow2'] = '1';
		$config['listlogo2'] = 'autoresponder.png';
		$config['classes2'] ='autoresponder';
		return $config;

	}//endfct


	function edit($listEdit, $lists, $show, $html) {

	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_AUTO_RESP_OPTION; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_INFO_LIST_FOLLOW_UP;
					$title = _ACA_FOLLOW_UP;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input type="text" name="follow_up" class="inputbox" size="6" maxlength="10" value="<?php if( isset( $listEdit->follow_up ) ) { echo $listEdit->follow_up; } else { echo ''; } ?>" />
			<?php
			if ( !auto::good() ) {
				echo jnewsletter::printM('no' , _ACA_NOTSO_GOOD_LIC );
				echo _ACA_PLEASE_LIC;
			}//endif
			?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php
	}//endfct


 }//endclass
