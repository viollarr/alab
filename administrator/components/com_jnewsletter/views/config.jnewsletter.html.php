<?php
defined('_JEXEC') OR defined('_VALID_MOS') or die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

 class configHTML {
	function mailSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_MAIL_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_MAILSENDMETHOD ;
					$tip = _ACA_MAILSENDMETHOD_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['mailermethod']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SEND_MAIL_FROM ;
					$tip = _ACA_SEND_MAIL_FROM_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['sendmail_from']" size="50" value="<?php echo $GLOBALS[ACA.'sendmail_from']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SEND_MAIL_NAME;
					$tip = _ACA_SEND_MAIL_NAME_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['sendmail_name']" size="50" value="<?php echo $GLOBALS[ACA.'sendmail_name']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SENDMAILPATH ;
					$tip = _ACA_SENDMAILPATH_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['sendmail_path']" size="50" value="<?php echo $GLOBALS[ACA.'sendmail_path']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_MINISENDMAIL ;
					$tip = _ACA_MINISENDMAIL_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['minisendmail']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SMTPAUTHREQUIRED;
					$tip = _ACA_SMTPAUTHREQUIRED_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['auth_required']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SMTPUSERNAME;
					$tip = _ACA_SMTPUSERNAME_TIPS ;
					echo compa::toolTip($tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['smtp_username']" size="50" value="<?php echo $GLOBALS[ACA.'smtp_username']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SMTPPASSWORD;
					$tip = _ACA_SMTPPASSWORD_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="password" name="config['smtp_password']" size="50" value="<?php echo $GLOBALS[ACA.'smtp_password']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title =_ACA_SMTPHOST;
					$tip = _ACA_SMTPHOST . ' mail.yoursite.com' ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['smtp_host']" size="50" value="<?php echo $GLOBALS[ACA.'smtp_host']; ?>">
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_MAILINGS_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_MAIL_FORMAT;
					$tip = _ACA_MAIL_FORMAT_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php
				 echo $lists['mail_format'];
				 ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_MAIL_ENCODING;
					$tip = _ACA_MAIL_ENCODING_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php
				 echo $lists['mail_encoding'];
				 ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_USE_EMBEDDED;
					$tip = _ACA_USE_EMBEDDED_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php
				 echo $lists['embed_images'];
				 ?>
			</td>

		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_CONFIRMBOUNCE;
					$tip = _ACA_CONFIRMBOUNCE_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['confirm_return']" size="50" value="<?php echo $GLOBALS[ACA.'confirm_return']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_UPLOAD_PATH;
					$tip = _ACA_UPLOAD_PATH_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['upload_url']" size="50" value="<?php echo $GLOBALS[ACA.'upload_url']; ?>">
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
		<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_SENDING_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_PAUSEX_TIPS;
					$title = _ACA_PAUSEX;
					echo compa::toolTip($tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['pause_time']" size="50" value="<?php echo $GLOBALS[ACA.'pause_time']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_EMAIL_BET_PAUSE_TIPS ;
					$title = _ACA_EMAIL_BET_PAUSE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['emails_between_pauses']" size="50" value="<?php echo $GLOBALS[ACA.'emails_between_pauses']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_WAIT_USER_PAUSE;
					$tip = _ACA_WAIT_USER_PAUSE_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['wait_for_user']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SCRIPT_TIMEOUT;
					$tip = _ACA_SCRIPT_TIMEOUT_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['script_timeout']" size="50" value="<?php echo $GLOBALS[ACA.'script_timeout']; ?>">
			</td>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_TIME_OFFSET_TIPS ;
					$title = _ACA_TIME_OFFSET;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<a href="index2.php?option=com_config&hidemainmenu=1"><?php echo _ACA_TIME_OFFSET_URL; ?></a>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php
	}
	function subcriberSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_SUBCRIBERS_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_ALLOW_UNREG_TIPS ;
					$title = _ACA_ALLOW_UNREG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['allow_unregistered']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_REQ_CONFIRM_TIPS;
					$title = _ACA_REQ_CONFIRM;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['require_confirmation']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_REDIRECTCONFIRMATION_TIPS;
					$title = _ACA_REDIRECTCONFIRMATION;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['redirectconfirm']" size="30" value="<?php echo $GLOBALS[ACA.'redirectconfirm'];?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_CONFIRMFROMNAME;
					$tip = _ACA_CONFIRMFROMNAME_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['confirm_fromname']" size="50" value="<?php echo $GLOBALS[ACA.'confirm_fromname']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_CONFIRMFROMEMAIL;
					$tip = _ACA_CONFIRMFROMEMAIL_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['confirm_fromemail']" size="50" value="<?php echo $GLOBALS[ACA.'confirm_fromemail']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_HTML_CONFIRM_TIPS;
					$title =_ACA_HTML_CONFIRM;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['confirm_html']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_TIME_ZONE_TIPS;
					$title =_ACA_TIME_ZONE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['time_zone']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_FRONTEND_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SHOW_ARCHIVE_TIPS;
					$title = _ACA_SHOW_ARCHIVE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_archive']; ?>
			</td>
		</tr>
		<!--Mary for subscription through url/captcha-->
		<?php if($GLOBALS[ACA.'type']=='PRO' or $GLOBALS[ACA.'type']=='PLUS'){//check if version is plus or pro
		?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_ENABLE_CAPTCHA_TIPS;
					$title = _ACA_ENABLE_CAPTCHA;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['enable_captcha']; ?>
			</td>
		</tr>
		<?php } //endif check plus or pro
		?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_URL_PASS_TIPS;
					$title = _ACA_URL_PASS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['url_pass']" size="20" value="<?php echo $GLOBALS[ACA.'url_pass']; ?>"><span style=" color: rgb(255, 0, 0); font-weight: bold;"><?php echo ' '. _ACA_URL_PASS_WARN;?></span>
			</td>
		</tr>
		<!--url-->

		</tbody>
	</table>
	</fieldset>
	<?php
	}
	function cronSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_SCHEDULE_FREQUENCY; ?></legend>
	<table class="jnewslettertable" cellspacing="1" width="100%" >
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_CRON_MAX_FREQ_TIPS;
					$title = _ACA_CRON_MAX_FREQ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['cron_max_freq']" size="5" value="<?php echo $GLOBALS[ACA.'cron_max_freq']; ?>">
				<?php echo _ACA_CRON_MINUTES ; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_CRON_MAX_EMAIL_TIPS;
					$title = _ACA_CRON_MAX_EMAIL;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['cron_max_emails']" size="5" value="<?php echo $GLOBALS[ACA.'cron_max_emails']; ?>">
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php
		if (class_exists('pro')) {
		  ?>
			<fieldset class="jnewslettercss">
			<legend><?php echo _ACA_MAINTENANCE_TAB; ?></legend>
			<table class="jnewslettertable" cellspacing="1" width="100%" >
				<tbody>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php

							$tip = _ACA_MAINTENANCE_FREQ_TIPS;
							$title = _ACA_MAINTENANCE_FREQ;
							echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
						?>
						</span>
					</td>
					<td>
						<input class="inputbox" type="text" name="config['maintenance_clear']" size="5" value="<?php echo $GLOBALS[ACA.'maintenance_clear']; ?>">
						<?php echo _ACA_CRON_DAYS ; ?>
					</td>
				</tr>
				<tr>
					<td width="185" class="key">
						<span class="editlinktip">
						<?php
							echo compa::toolTip( 'The system will automatically delete statistics older than the specified value', '', 280, 'tooltip.png', 'Clean Statistics', '', 0 );
						?>
						</span>
					</td>
					<td>
						<input class="inputbox" type="text" name="config['clean_stats']" size="5" value="<?php echo $GLOBALS[ACA.'clean_stats']; ?>">
						<?php echo 'days' ; ?>
					</td>
				</tr>
				</tbody>
			</table>
			</fieldset>
			<?php
		}
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_SCHEDULE_TITLE; ?></legend>
	<table class="jnewslettertable" cellspacing="1" width="100%" >
		<tbody>
		<tr>
			<td>
			<?php
				echo _ACA_JNEWSLETTER_CRON_DESC;
			?>
								<br/>
				<a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>
				<br/>
				<br/>
				You need to be registered to our Website <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a> to have access to this free service.
				<br/>
				After having registered and confirmed your e-mail, please log in on <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a> and click on the menu 'my cron task' to configure your cron task.
				<br/>
				You will have to enter this URL : <b><?php echo ACA_JPATH_LIVE; ?></b> in our form.
				<hr>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo _ACA_CRON_DOCUMENTATION . '<br />'. _ACA_CRON_DOC_URL ; ?>
				<hr>
				<?php echo _ACA_CRON_DESC ; ?>
			</td>
		</tr>

		</tbody>
	</table>
	</fieldset>
	<?php
	}
	function logsSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_STATS_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_ENABLE_READ_STATS_TIPS ;
					$title = _ACA_ENABLE_READ_STATS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['enable_statistics']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_LOG_VIEWSPERSUB_TIPS ;
					$title = _ACA_LOG_VIEWSPERSUB;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['statistics_per_subscriber']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_LOGS_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_DISPLAY_LOG_TIPS;
					$title = _ACA_DIAPLAY_LOG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['display_trace']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SEND_PERF_DATA_TIPS;
					$title = _ACA_SEND_PERF_DATA;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_data']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SEND_LOG_TIPS ;
					$title = _ACA_SEND_LOG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_log']; ?>
			</td>
		</tr>
		<?php
		if (class_exists('auto')) $flag = auto::viewCron(); else $flag = false;
		if ($flag) {
		?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SEND_AUTO_LOG_TIPS ;
					$title = _ACA_SEND_AUTO_LOG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_auto_log']; ?>
			</td>
		</tr>
		<?php }  ?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SEND_LOGDETAIL;
					$tip = _ACA_SEND_LOGDETAIL_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_log_simple']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SEND_LOGCLOSED;
					$tip = _ACA_SEND_LOGCLOSED_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_log_closed']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SAVE_LOG;
					$tip = _ACA_SAVE_LOG_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['save_log']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SAVE_LOGDETAIL_TIPS ;
					$title =_ACA_SAVE_LOGDETAIL;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['save_log_simple']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SAVE_LOGFILE_TIPS ;
					$title =_ACA_SAVE_LOGFILE;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['save_log_file']" size="50" value="<?php echo $GLOBALS[ACA.'save_log_file']; ?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_CLEAR_LOG_TIPS ;
					$title =_ACA_CLEAR_LOG;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['clear_log']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<?php
	}
	function miscSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_MISC_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
	<!--	<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SHOW_GUIDE;
					$tip = _ACA_SHOW_GUIDE_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_guide']; ?>
			</td>
		</tr> -->
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SHOW_TIPS;
					$tip = _ACA_SHOW_TIPS_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_tips']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_ITEMID;
					$tip = _ACA_ITEMID_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['itemidAca']" size="5" value="<?php echo $GLOBALS[ACA.'itemidAca'];?>">
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_DISABLETOOLTIP ;
					$tip = _ACA_DISABLETOOLTIP_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png',  $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['disabletooltip']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					echo compa::toolTip( 'If your Joomla article does not have a read more link, jNews will consider the introduction of your article as the first X characters of the full article. <br/> If you specify the value 0, jNews will take the full article', '', 280, 'tooltip.png', 'Article introduction', '', 0 );
				?>
				</span>
			</td>
			<td>
				<input class="inputbox" type="text" name="config['word_wrap']" size="10" value="<?php echo $GLOBALS[ACA.'word_wrap']; ?>">
			</td>
		</tr>

		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SHOW_LISTS_TIPS ;
					$title = _ACA_SHOW_LISTS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_lists']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_USE_SEF;
					$tip = _ACA_USE_SEF_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['use_sef']; ?>
			</td>
		</tr>
		<?php
		if (class_exists('auto')) auto::miscSettings($lists);
		?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_SHOW_FOOTER_TIPS ;
					$title = _ACA_SHOW_FOOTER;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_footer']; ?>
			</td>
		</tr>
				<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SHOW_AUTHOR;
					$tip = _ACA_SHOW_AUTHOR_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_author']; ?>
			</td>
		</tr>
		<?php if(class_exists('pro')){ ?>
				<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SHOW_JCALPRO;
					$tip = _ACA_SHOW_JCALPRO_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_jcalpro']; ?>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_SHOW_JLINKS;
					$tip = _ACA_SHOW_JLINKS_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['show_jlinks']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_ADDEMAILREDLINK;
					$tip = _ACA_ADDEMAILREDLINK_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['addEmailRedLink']; ?>
			</td>
		</tr>
		<?php
		if ( $GLOBALS[ACA.'type'] =='PLUS' OR $GLOBALS[ACA.'type']=='PRO' ) {
		?>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$tip = _ACA_SHOW_SIGNATURE_TIPS ;
						$title = _ACA_SHOW_SIGNATURE;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_signature']; ?>
				</td>
			</tr>


			<?php if($GLOBALS[ACA.'type']=='PRO'){?>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =  _ACA_SUBSCRIPTION_NOTIFY;
						$tip = _ACA_SUBSCRIPTION_NOTIFY_TIPS. trim($GLOBALS[ACA.'sendmail_from']) ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['subscription_notify']; ?>
				</td>
			</tr>
			<?php }
			?>


		<?php
		}
		?>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$tip = _ACA_LISTS_EDITOR_TIPS ;
					$title = _ACA_LISTS_EDITOR;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['listHTMLeditor']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>
	<fieldset class="jnewslettercss">
	<legend><?php echo _ACA_ERR_SETTINGS; ?></legend>
	<table class="jnewslettertable" cellspacing="1">
		<tbody>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = 'Full check Email address';
					$tip = 'Check the domain name of the e-mail address during the send process and remove the e-mail from the queue is the e-mail address is not valid' ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['fullcheck']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_ERR_SHOW;
					$tip = _ACA_ERR_SHOW_TIPS ;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['report_error']; ?>
			</td>
		</tr>
		<tr>
			<td width="185" class="key">
				<span class="editlinktip">
				<?php
					$title = _ACA_ERR_SEND;
					$tip = _ACA_ERR_SEND_TIPS;
					echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
				?>
				</span>
			</td>
			<td>
				<?php echo $lists['send_error']; ?>
			</td>
		</tr>
		</tbody>
	</table>
	</fieldset>

	<!--mary columns config-->
	<?php if($GLOBALS[ACA.'type']=='PRO'){//check if the version of jnews is 5.0.2
	?>
	<fieldset class="jnewslettercss">
		<legend><?php echo _ACA_COLUMN; ?></legend>
		<table class="jnewslettertable" cellspacing="1">
		<tbody>
			<tr><!--column1-->
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =_ACA_COLUMN1;
						$tip = _ACA_SHOW_COLUMN1_TIPS ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_column1']; ?>
				</td>
				<!--end of column1-->
			</tr>
			<tr>
			<!--column1 name-->
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Enter the alias name of column 1 to be shown in the subscribers module', '', 280, 'tooltip.png', _ACA_COL1_NAME, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['column1_name']" size="20" value="<?php echo $GLOBALS[ACA.'column1_name']; ?>">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =_ACA_COLUMN2;
						$tip = _ACA_SHOW_COLUMN2_TIPS ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_column2']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Enter the alias name of column 2 to be shown in the subscribers module', '', 280, 'tooltip.png', _ACA_COL2_NAME, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['column2_name']" size="20" value="<?php echo $GLOBALS[ACA.'column2_name']; ?>">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =_ACA_COLUMN3;
						$tip = _ACA_SHOW_COLUMN3_TIPS ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_column3']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Enter the alias name of column 3 to be shown in the subscribers module', '', 280, 'tooltip.png', _ACA_COL3_NAME, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['column3_name']" size="20" value="<?php echo $GLOBALS[ACA.'column3_name']; ?>">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =_ACA_COLUMN4;
						$tip = _ACA_SHOW_COLUMN4_TIPS ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_column4']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Enter the alias name of column 4 to be shown in the subscribers module', '', 280, 'tooltip.png', _ACA_COL4_NAME, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['column4_name']" size="20" value="<?php echo $GLOBALS[ACA.'column4_name']; ?>">
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						$title =_ACA_COLUMN5;
						$tip = _ACA_SHOW_COLUMN5_TIPS ;
						echo compa::toolTip( $tip, '', 280, 'tooltip.png', $title, '', 0 );
					?>
					</span>
				</td>
				<td>
					<?php echo $lists['show_column5']; ?>
				</td>
			</tr>
			<tr>
				<td width="185" class="key">
					<span class="editlinktip">
					<?php
						echo compa::toolTip( 'Enter the alias name of column 5 to be shown in the subscribers module', '', 280, 'tooltip.png', _ACA_COL5_NAME, '', 0 );
					?>
					</span>
				</td>
				<td>
					<input class="inputbox" type="text" name="config['column5_name']" size="20" value="<?php echo $GLOBALS[ACA.'column5_name']; ?>">
				</td>
			</tr>
			<!--end columns name-->
			</tbody>
		</table>
	</fieldset>
	<?php } //endif for check version
	?>
	<!--end columns config mary-->
	<?php
	}
	function queueSettings($lists) {
	?>
	<fieldset class="jnewslettercss">
		<legend><?php echo _ACA_CRON_FSETTINGS ?></legend>
		<table class="jnewslettertable" cellspacing="1">
			<tbody>
				<tr>
					<td width="185" class="key">
						<span>
							<?php
								echo compa::toolTip( _ACA_SHOW_CRON_TIPS, '', 280, 'tooltip.png', _ACA_SHOW_CRON, '', 0 );
							?>
						</span>
					</td>
					<td>
						<?php echo $lists['j_cron'];
						if($GLOBALS[ACA.'j_cron']==1){
							$img = '16/status_g.png';
							$alt = 'Published';
						}else{
							$img = '16/status_r.png';
							$alt = 'Unpublished';
						}?>
						<!--
						<img src="<?php echo ACA_PATH_ADMIN_IMAGES.$img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
						-->
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Your cron: <?php
						echo '<br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ';

						if($GLOBALS[ACA.'j_cron']){
							$a=ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron';
						}else{
							$a='#';
						}

						?><?if($GLOBALS[ACA.'j_cron']){
				?>
						<a href="<?php echo $a;?>">
						Launch Cron</a>
					</td>
				</tr>
				<?}
				?>
			</tbody>
		</table>
	</fieldset>
	<fieldset class="jnewslettercss">
		<legend><?php echo _ACA_Q_PROCESS ?></legend>
			<table class="jnewslettertable" cellspacing="1">
				<tbody>
					<tr>
						<td width="185" class="key">
							<span class="editlinktip">
							<?php
								echo compa::toolTip( 'Enter the maximum number of emails to be processed per batch', '', 280, 'tooltip.png', _ACA_MAX_Q, '', 0 );
							?>
							</span>
						</td>
						<td>
							<input class="inputbox" type="text" name="config['max_queue']" size="20" value="<?php echo $GLOBALS[ACA.'max_queue']; ?>">
						</td>
					</tr>
					<tr>
						<td width="185" class="key">
							<span class="editlinktip">
							<?php
								echo compa::toolTip( 'Maximum number of attempts to send the queue', '', 280, 'tooltip.png', 'Maximum number of attempts', '', 0 );
							?>
							</span>
						</td>
						<td>
							<input class="inputbox" type="text" name="config['max_attempts']" size="20" value="<?php echo $GLOBALS[ACA.'max_attempts']; ?>">
						</td>
					</tr>
				</tbody>
			</table>

	</fieldset>
	<fieldset class="jnewslettercss">
		<legend><?php echo 'Newsletter Priority' ?></legend>
			<table class="jnewslettertable" cellspacing="1">
				<tbody>
					<tr>
						<td width="185" class="key">
							<span class="editlinktip">
							<?php
								echo compa::toolTip( 'Choose the priority for scheduled Newsletters', '', 280, 'tooltip.png', 'Scheduled Newsletter', '', 0 );
							?>
							</span>
						</td>
						<td>
							<?php echo $lists['sched_prior']; ?>
						</td>
					</tr>
					<tr>
						<td width="185" class="key">
							<span class="editlinktip">
							<?php
								echo compa::toolTip( 'Choose the priority for auto-responders', '', 280, 'tooltip.png', 'Auto-responder', '', 0 );
							?>
							</span>
						</td>
						<td>
							<?php echo $lists['ar_prior']; ?>
						</td>
					</tr>
					<tr>
						<td width="185" class="key">
							<span class="editlinktip">
							<?php
								echo compa::toolTip( 'Choose the priority for smart-newsletters', '', 280, 'tooltip.png', 'Smart-Newsletter', '', 0 );
							?>
							</span>
						</td>
						<td>
							<?php echo $lists['sm_prior']; ?>
						</td>
					</tr>
				</tbody>
			</table>

	</fieldset>
<!--end queueSettings-->
	<?php
}

	function cbSettings() {

		if ( ACA_CMSTYPE ) {
			 $lists['cb_plugin'] = JHTML::_('select.booleanlist', "config['cb_plugin']" , 'class="inputbox"', $GLOBALS[ACA.'cb_plugin'] );
			 $lists['cb_showname'] = JHTML::_('select.booleanlist', "config['cb_showname']" , 'class="inputbox"', $GLOBALS[ACA.'cb_showname'] );
			 $lists['cb_checkLists'] = JHTML::_('select.booleanlist', "config['cb_checkLists']" , 'class="inputbox"', $GLOBALS[ACA.'cb_checkLists'] );
			 $lists['cb_showHTML'] = JHTML::_('select.booleanlist', "config['cb_showHTML']" , 'class="inputbox"', $GLOBALS[ACA.'cb_showHTML'] );
			 $lists['cb_defaultHTML'] = JHTML::_('select.booleanlist', "config['cb_defaultHTML']" , 'class="inputbox"', $GLOBALS[ACA.'cb_defaultHTML'] );
		}//endif

		?>
		<fieldset class="jnewslettercss">
		<legend><?php echo _ACA_CB_INTEGRATION; ?></legend>
		<?php
		jnewsletter::beginingOfTable('jnewslettertable');
		if ($GLOBALS[ACA.'cb_pluginInstalled']==0) {
			if (!jnewsletter::checkCBPlugin()) {
				 jnewsletter::miseEnPage(jnewsletter::WarningIcon( _ACA_CB_PLUGIN_NOT_INSTALLED ), ' ' , '<span style="color: rgb(255, 0, 0);">'._ACA_CB_PLUGIN_NOT_INSTALLED.'</span>' );
			}
		}
		 jnewsletter::miseEnPage(_ACA_CB_PLUGIN, _ACA_CB_PLUGIN_TIPS , $lists['cb_plugin']);
		 jnewsletter::miseEnPage(_ACA_CB_LISTS, _ACA_CB_LISTS_TIPS , "<input class=\"inputbox\" type=\"text\" name=\"config['cb_listIds']\" size=\"30\" value=\"". $GLOBALS[ACA.'cb_listIds']."\" >" );
		 jnewsletter::miseEnPage(_ACA_CB_INTRO, _ACA_CB_INTRO_TIPS , "<textarea  name=\"config['cb_intro']\" rows=\"3\" cols=\"40\" >". $GLOBALS[ACA.'cb_intro']."</textarea>" );
		 jnewsletter::miseEnPage(_ACA_CB_SHOW_NAME, _ACA_CB_SHOW_NAME_TIPS , $lists['cb_showname']);
		 jnewsletter::miseEnPage(_ACA_CB_LIST_DEFAULT, _ACA_CB_LIST_DEFAULT_TIPS , $lists['cb_checkLists']);
		 jnewsletter::miseEnPage(_ACA_CB_HTML_SHOW, _ACA_CB_HTML_SHOW_TIPS , $lists['cb_showHTML']);
		 jnewsletter::miseEnPage(_ACA_CB_HTML_DEFAULT, _ACA_CB_HTML_DEFAULT_TIPS , $lists['cb_defaultHTML']);
		 jnewsletter::endOfTable();
		echo '</fieldset>';
	}
	 function showConfigEdit($GLOBALS) {


		if ( ACA_CMSTYPE ) {	// joomla 15
			 $mailOpt[] = JHTML::_('select.option', 'mail' , 'PHP mail function' );
			 $mailOpt[] = JHTML::_('select.option','sendmail' ,  'Sendmail');
			 $mailOpt[] = JHTML::_('select.option', 'smtp' , 'SMTP Server');
			 $logFormat[] = JHTML::_('select.option', '0' , _ACA_DETAILED );
			 $logFormat[] = JHTML::_('select.option', '1' , _ACA_SIMPLE );
			$lists['mailermethod'] = JHTML::_('select.genericlist', $mailOpt, "config['emailmethod']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'emailmethod'] );
			 $lists['send_log_simple'] = JHTML::_('select.genericlist', $logFormat, "config['send_log_simple']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'send_log_simple'] );
			 $lists['save_log_simple'] = JHTML::_('select.genericlist', $logFormat, "config['save_log_simple']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'save_log_simple'] );

			 $lists['auth_required'] = JHTML::_('select.booleanlist', "config['smtp_auth_required']" , 'class="inputbox"', $GLOBALS[ACA.'smtp_auth_required'] );
			 $lists['allow_unregistered'] = JHTML::_('select.booleanlist', "config['allow_unregistered']" , 'class="inputbox"', $GLOBALS[ACA.'allow_unregistered'] );
			 $lists['require_confirmation'] = JHTML::_('select.booleanlist', "config['require_confirmation']" , 'class="inputbox"', $GLOBALS[ACA.'require_confirmation'] );
			 $lists['show_login'] = JHTML::_('select.booleanlist', "config['show_login']" , 'class="inputbox"', $GLOBALS[ACA.'show_login'] );
			 $lists['show_logout'] = JHTML::_('select.booleanlist', "config['show_logout']" , 'class="inputbox"', $GLOBALS[ACA.'show_logout'] );
			 $lists['confirm_html'] = JHTML::_('select.booleanlist', "config['confirm_html']" , 'class="inputbox"', $GLOBALS[ACA.'confirm_html'] );
			 $lists['time_zone'] = JHTML::_('select.booleanlist', "config['time_zone']" , 'class="inputbox"', $GLOBALS[ACA.'time_zone'] );
			 $lists['show_archive'] = JHTML::_('select.booleanlist', "config['show_archive']" , 'class="inputbox"', $GLOBALS[ACA.'show_archive'] );
			 $lists['enable_statistics'] = JHTML::_('select.booleanlist', "config['enable_statistics']" , 'class="inputbox"', $GLOBALS[ACA.'enable_statistics'] );
			 $lists['statistics_per_subscriber'] = JHTML::_('select.booleanlist', "config['statistics_per_subscriber']" , 'class="inputbox"', $GLOBALS[ACA.'statistics_per_subscriber'] );
			 $lists['wait_for_user'] = JHTML::_('select.booleanlist', "config['wait_for_user']" , 'class="inputbox"', $GLOBALS[ACA.'wait_for_user'] );
			 $lists['display_trace'] = JHTML::_('select.booleanlist', "config['display_trace']" , 'class="inputbox"', $GLOBALS[ACA.'display_trace'] );
			 $lists['send_data'] = JHTML::_('select.booleanlist', "config['send_data']" , 'class="inputbox"', $GLOBALS[ACA.'send_data'] );
			 $lists['send_auto_log'] = JHTML::_('select.booleanlist', "config['send_auto_log']" , 'class="inputbox"', $GLOBALS[ACA.'send_auto_log'] );
			 $lists['send_log'] = JHTML::_('select.booleanlist', "config['send_log']" , 'class="inputbox"', $GLOBALS[ACA.'send_log'] );
			 $lists['save_log'] = JHTML::_('select.booleanlist', "config['save_log']" , 'class="inputbox"', $GLOBALS[ACA.'save_log'] );
			 $lists['send_log_closed'] = JHTML::_('select.booleanlist', "config['send_log_closed']" , 'class="inputbox"', $GLOBALS[ACA.'send_log_closed'] );
			 $lists['clear_log'] = JHTML::_('select.booleanlist', "clear_log" , 'class="inputbox"', 0 );
			 $lists['show_footer'] = JHTML::_('select.booleanlist', "config['show_footer']" , 'class="inputbox"', $GLOBALS[ACA.'show_footer'] );
			 $lists['show_jcalpro'] = JHTML::_('select.booleanlist', "config['show_jcalpro']" , 'class="inputbox"', $GLOBALS[ACA.'show_jcalpro'] );
			 $lists['show_jlinks'] = JHTML::_('select.booleanlist', "config['show_jlinks']" , 'class="inputbox"', $GLOBALS[ACA.'show_jlinks'] );
			 //column1
			 $lists['show_column1'] = JHTML::_('select.booleanlist', "config['show_column1']" , 'class="inputbox"', $GLOBALS[ACA.'show_column1'] );
			 $lists['show_column2'] = JHTML::_('select.booleanlist', "config['show_column2']" , 'class="inputbox"', $GLOBALS[ACA.'show_column2'] );
			 $lists['show_column3'] = JHTML::_('select.booleanlist', "config['show_column3']" , 'class="inputbox"', $GLOBALS[ACA.'show_column3'] );
			 $lists['show_column4'] = JHTML::_('select.booleanlist', "config['show_column4']" , 'class="inputbox"', $GLOBALS[ACA.'show_column4'] );
			 $lists['show_column5'] = JHTML::_('select.booleanlist', "config['show_column5']" , 'class="inputbox"', $GLOBALS[ACA.'show_column5'] );
			 //end of columns
			 //subscription notification
			 $lists['subscription_notify'] = JHTML::_('select.booleanlist', "config['subscription_notify']" , 'class="inputbox"', $GLOBALS[ACA.'subscription_notify'] );
			 //end of subscription notification
			 //captcha
			 $lists['enable_captcha'] = JHTML::_('select.booleanlist', "config['enable_captcha']" , 'class="inputbox"', $GLOBALS[ACA.'enable_captcha'] );
			 $lists['j_cron'] = JHTML::_('select.booleanlist', "config['j_cron']" , 'class="inputbox"', $GLOBALS[ACA.'j_cron'] );
			 $lists['show_signature'] = JHTML::_('select.booleanlist', "config['show_signature']" , 'class="inputbox"', $GLOBALS[ACA.'show_signature'] );
			 $lists['show_lists'] = JHTML::_('select.booleanlist', "config['show_lists']" , 'class="inputbox"', $GLOBALS[ACA.'show_lists'] );
			 $lists['embed_images'] = JHTML::_('select.booleanlist', "config['embed_images']" , 'class="inputbox"', $GLOBALS[ACA.'embed_images'] );
			 $lists['show_guide'] = JHTML::_('select.booleanlist', "config['show_guide']" , 'class="inputbox"', $GLOBALS[ACA.'show_guide'] );
			 $lists['show_author'] = JHTML::_('select.booleanlist', "config['show_author']" , 'class="inputbox"', $GLOBALS[ACA.'show_author'] );
			 $lists['show_tips'] = JHTML::_('select.booleanlist', "config['show_tips']" , 'class="inputbox"', $GLOBALS[ACA.'show_tips'] );
			 //$lists['update_notification'] = JHTML::_('select.booleanlist', "config['update_notification']" , 'class="inputbox"', $GLOBALS[ACA.'update_notification'] );
			 $lists['use_sef'] = JHTML::_('select.booleanlist', "config['use_sef']" , 'class="inputbox"', $GLOBALS[ACA.'use_sef'] );
			 $lists['listype1'] = JHTML::_('select.booleanlist', "config['listype1']" , 'class="inputbox"', $GLOBALS[ACA.'listype1'] );
			 $lists['listype2'] = JHTML::_('select.booleanlist', "config['listype2']" , 'class="inputbox"', $GLOBALS[ACA.'listype2'] );
			 $lists['listHTMLeditor'] = JHTML::_('select.booleanlist', "config['listHTMLeditor']" , 'class="inputbox"', $GLOBALS[ACA.'listHTMLeditor'] );
			 $lists['send_error'] = JHTML::_('select.booleanlist', "config['send_error']" , 'class="inputbox"', $GLOBALS[ACA.'send_error'] );
			 $lists['report_error'] = JHTML::_('select.booleanlist', "config['report_error']" , 'class="inputbox"', $GLOBALS[ACA.'report_error'] );
			 $lists['fullcheck'] = JHTML::_('select.booleanlist', "config['fullcheck']" , 'class="inputbox"', $GLOBALS[ACA.'fullcheck'] );
			 $lists['addEmailRedLink'] = JHTML::_('select.booleanlist', "config['addEmailRedLink']" , 'class="inputbox"', $GLOBALS[ACA.'addEmailRedLink'] );
			 $lists['disabletooltip'] = JHTML::_('select.booleanlist', "config['disabletooltip']" , 'class="inputbox"', $GLOBALS[ACA.'disabletooltip'] );
			 $lists['minisendmail'] = JHTML::_('select.booleanlist', "config['minisendmail']" , 'class="inputbox"', $GLOBALS[ACA.'minisendmail'] );

			 //<!-- content ordering -->

			$sortContent[]=JHTML::_('select.option','0', _ACA_SORT_DATE);
			$sortContent[]=JHTML::_('select.option','1', _ACA_SORT_SECTION);
			$sortContent[]=JHTML::_('select.option','2', _ACA_SORT_CATEGORY);

			//$lists['content_order'] = JHTML::_('select.genericlist', $sortContent, "config['content_order']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'content_order'] );

			$schedPrior=array();
			$schedPrior[]=JHTML::_('select.option','1', '1');
			$schedPrior[]=JHTML::_('select.option','2', '2');
			$schedPrior[]=JHTML::_('select.option','3', '3');

			$GLOBALS[ACA.'sched_prior'] = ( isset($GLOBALS[ACA.'sched_prior']) ) ? $GLOBALS[ACA.'sched_prior'] : '';
			$lists['sched_prior'] = JHTML::_('select.radiolist', $schedPrior, "config['sched_prior']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'sched_prior'] );

			$arPrior=array();
			$arPrior[]=JHTML::_('select.option','1', '1');
			$arPrior[]=JHTML::_('select.option','2', '2');
			$arPrior[]=JHTML::_('select.option','3', '3');

			$GLOBALS[ACA.'ar_prior'] = ( isset($GLOBALS[ACA.'ar_prior']) ) ? $GLOBALS[ACA.'ar_prior'] : '';
			$lists['ar_prior'] = JHTML::_('select.radiolist', $arPrior, "config['ar_prior']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'ar_prior'] );

			$smPrior=array();
			$smPrior[]=JHTML::_('select.option','1', '1');
			$smPrior[]=JHTML::_('select.option','2', '2');
			$smPrior[]=JHTML::_('select.option','3', '3');

			$GLOBALS[ACA.'sm_prior'] = ( isset($GLOBALS[ACA.'sm_prior']) ) ? $GLOBALS[ACA.'sm_prior'] : '';
			$lists['sm_prior'] = JHTML::_('select.radiolist', $arPrior, "config['sm_prior']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'sm_prior'] );


		}//endif

		if (class_exists('aca_archive') ) {
			if ( ACA_CMSTYPE ) {	// joomla 15
				$jour = array();
				$jour[] = JHTML::_('select.option', '0', _FREQ_OPT_0 );
				$jour[] = JHTML::_('select.option', '1', _FREQ_OPT_1 );
				$jour[] = JHTML::_('select.option', '2', _FREQ_OPT_2 );
				$jour[] = JHTML::_('select.option', '3', _FREQ_OPT_3 );
				$jour[] = JHTML::_('select.option', '4', _FREQ_OPT_4 );
				$jour[] = JHTML::_('select.option', '5', _FREQ_OPT_5 );
				$jour[] = JHTML::_('select.option', '6', _FREQ_OPT_6 );
				$dateType = array();
				$dateType[] = JHTML::_('select.option', '1', _DATE_OPT_1 );
				$dateType[] = JHTML::_('select.option', '2', _DATE_OPT_2 );
				$lists['frequency'] = JHTML::_('select.genericlist', $jour, "config['frequency']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'frequency'] );
				$lists['date_type'] = JHTML::_('select.genericlist', $dateType, "config['date_type']" , 'class="inputbox" size="1"', 'value', 'text', $GLOBALS[ACA.'date_type'] );
			}
		}//endif

		//encoding format
		if ( ACA_CMSTYPE ) {
			$mail_format[] = JHTML::_('select.option', '0', 'Text (8bit)' );
			$mail_format[] = JHTML::_('select.option', '1', 'MIME (base64)' );

			$lists['mail_format'] = JHTML::_('select.radiolist', $mail_format, "config['mail_format']", 'class="inputbox"', 'value', 'text', $GLOBALS[ACA.'mail_format'] );
		}//endif

		//encoding formart
		if ( ACA_CMSTYPE ) {
			$mail_encoding[] = JHTML::_('select.option', '0', 'UTF-8' );
			$mail_encoding[] = JHTML::_('select.option', '1', 'ISO-8859-2' );

			$lists['mail_encoding'] = JHTML::_('select.radiolist', $mail_encoding, "config['mail_encoding']", 'class="inputbox"', 'value', 'text', $GLOBALS[ACA.'mail_encoding'] );
		}//endif


	backHTML::formStart('configpanel', 0 ,'' );
	?>
	<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>
	<form action="index2.php" method="post" name="adminForm">
	<?php

			if ( ACA_CMSTYPE ) {
				 $config_tabs = new mosTabs15(1);
			}//endif

			 $config_tabs->startPane('acaConfig');
			 $config_tabs->startTab(_ACA_MAIL_CONFIG, 'mail');
			configHTML::mailSettings($lists);
			$config_tabs->endTab();
			$config_tabs->startTab(_ACA_SUBSCRIBER_CONFIG, 'subscribers');
			configHTML::subcriberSettings($lists);
			$config_tabs->endTab();
			if (class_exists('auto')) $flag = auto::viewCron(); else $flag = false;
			if ($flag) {
				$config_tabs->startTab(_ACA_SCHEDULER, 'scheduler');
				configHTML::cronSettings($lists);
				$config_tabs->endTab();
			}
			$config_tabs->startTab(_ACA_LOGGING_CONFIG, 'logging');
			configHTML::logsSettings($lists);
			$config_tabs->endTab();
			if ($GLOBALS[ACA.'integration']
			 AND ( $GLOBALS[ACA.'cb_integration']
			  OR ( class_exists('aca_virtuemart') && $GLOBALS[ACA.'virtuemart'] ) ) ) {
				$config_tabs->startTab(_ACA_CONFIG_INTEGRATION, 'integration');
				if ($GLOBALS[ACA.'cb_integration']) configHTML::cbSettings();
				if ( class_exists('aca_virtuemart') && isset($GLOBALS[ACA.'virtuemart']) && $GLOBALS[ACA.'virtuemart'] ) aca_virtuemart::tab();
				$config_tabs->endTab();
			}
			if (class_exists('aca_archive') ) {
				$config_tabs->startTab(_ACA_MENU_TAB_ARCHIVE, 'archive');
				aca_archive::showArchive($lists);
				$config_tabs->endTab();
			}
			$config_tabs->startTab(_ACA_MISC_CONFIG, 'misc');
			configHTML::miscSettings($lists);
			$config_tabs->endTab();

			$config_tabs->startTab(_ACA_MENU_TAB_QUEUE, 'queue');
			configHTML::queueSettings($lists);
			$config_tabs->endTab();


			if (class_exists('auto')) {
				$config_tabs->startTab(_ACA_LICENSE_CONFIG, 'licence');
				auto::licenseSettings($lists);
				$config_tabs->endTab();
			}
			$config_tabs->endPane();
	?>
		<input type="hidden" name="option" value="com_jnewsletter" />
		<input type="hidden" name="act" value="configuration" />
    	<input type="hidden" name="boxchecked" value="0" />
    	<input type="hidden" name="task" value="" />
	</form>
	</td></tr></tbody></table>
	<?php
	 }
 }
