<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

	$jnewsletterConfigFile = array();

	$jnewsletterConfigFile['component'] = 'jNews';
	$jnewsletterConfigFile['type'] = 'PRO';
	$jnewsletterConfigFile['version'] = '2.2.2';
	$jnewsletterConfigFile['level'] = '3';

	$jnewsletterConfigFile['emailmethod'] = 'sendmail';
	$jnewsletterConfigFile['sendmail_from'] = '';
	$jnewsletterConfigFile['sendmail_name'] = '';
	$jnewsletterConfigFile['sendmail_path'] = '/usr/sbin/sendmail';
	$jnewsletterConfigFile['smtp_host'] = '';
	$jnewsletterConfigFile['smtp_auth_required'] = '1';
	$jnewsletterConfigFile['smtp_username'] = '';
	$jnewsletterConfigFile['smtp_password'] = '';
	$jnewsletterConfigFile['embed_images'] = '0';
	$jnewsletterConfigFile['confirm_return'] = '';
	$jnewsletterConfigFile['upload_url'] = '/components/com_jnewsletter/upload';

	$jnewsletterConfigFile['enable_statistics'] = '1';
	$jnewsletterConfigFile['statistics_per_subscriber'] = '1';

	$jnewsletterConfigFile['send_data'] = '1';
	$jnewsletterConfigFile['allow_unregistered'] = '1';
	$jnewsletterConfigFile['require_confirmation'] = '0';
	$jnewsletterConfigFile['redirectconfirm'] = '';
	$jnewsletterConfigFile['show_login'] = '1';
	$jnewsletterConfigFile['show_logout'] = '1';
	$jnewsletterConfigFile['send_unsubcribe'] = '1';
	$jnewsletterConfigFile['confirm_fromname'] = '';
	$jnewsletterConfigFile['confirm_fromemail'] = '';
	$jnewsletterConfigFile['confirm_html'] = '1';
	$jnewsletterConfigFile['time_zone'] = '0';
	$jnewsletterConfigFile['show_archive'] = '1';

	$jnewsletterConfigFile['pause_time'] = '20';
	$jnewsletterConfigFile['emails_between_pauses'] = '65';
	$jnewsletterConfigFile['wait_for_user'] = '0';
	$jnewsletterConfigFile['script_timeout'] = '0';
	$jnewsletterConfigFile['display_trace'] = '1';
	$jnewsletterConfigFile['send_log'] = '1';
	$jnewsletterConfigFile['send_auto_log'] = '0';
	$jnewsletterConfigFile['send_log_simple'] = '0';
	$jnewsletterConfigFile['send_log_closed'] = '1';
	$jnewsletterConfigFile['save_log'] = '0';
	$jnewsletterConfigFile['send_email'] = '1';
	$jnewsletterConfigFile['save_log_simple'] = '0';
	$jnewsletterConfigFile['save_log_file'] = '/administrator/components/com_jnewsletter/com_jnewsletter.log';
	$jnewsletterConfigFile['send_log_address'] = '@ijoobi.com';
	$jnewsletterConfigFile['option'] = 'com_sdonkey';
	$jnewsletterConfigFile['send_log_name'] = 'jNews Mailing Report';
	$jnewsletterConfigFile['homesite'] = 'http://www.ijoobi.com';
	$jnewsletterConfigFile['report_site'] = 'http://www.ijoobi.com';

	$jnewsletterConfigFile['integration'] = '0';

	$jnewsletterConfigFile['cb_plugin'] = '1';
	$jnewsletterConfigFile['cb_listIds'] = '0';
	$jnewsletterConfigFile['cb_intro'] = '';
	$jnewsletterConfigFile['cb_showname'] = '1';
	$jnewsletterConfigFile['cb_checkLists'] = '1';
	$jnewsletterConfigFile['cb_showHTML'] = '1';
	$jnewsletterConfigFile['cb_defaultHTML'] = '1';
	$jnewsletterConfigFile['cb_integration'] = '0';
	$jnewsletterConfigFile['cb_pluginInstalled']= '0';
	$jnewsletterConfigFile['cron_max_freq'] = '10';
	$jnewsletterConfigFile['cron_max_emails'] = '60';
	$jnewsletterConfigFile['last_cron'] = '' ;
	$jnewsletterConfigFile['last_sub_update'] = '' ;
	$jnewsletterConfigFile['next_autonews'] = '' ;
	$jnewsletterConfigFile['show_footer'] = '1';
	$jnewsletterConfigFile['show_signature'] = '1';
	$jnewsletterConfigFile['update_url'] = 'http://www.ijoobi.com/update/';
	$jnewsletterConfigFile['date_update'] = '';
	$jnewsletterConfigFile['update_message'] = '';
	$jnewsletterConfigFile['show_guide'] = '1';
	$jnewsletterConfigFile['news1'] = '1';
	$jnewsletterConfigFile['news2'] = '1';
	$jnewsletterConfigFile['news3'] = '1';
	$jnewsletterConfigFile['cron_setup'] = '0';
	$jnewsletterConfigFile['queuedate'] = '';
	$jnewsletterConfigFile['update_avail'] = '0';
	$jnewsletterConfigFile['show_tips'] = '1';
	$jnewsletterConfigFile['update_notification'] = '1';
	$jnewsletterConfigFile['show_lists'] = '1';
	$jnewsletterConfigFile['use_sef'] = '0';
	$jnewsletterConfigFile['listHTMLeditor'] = '1';
	$jnewsletterConfigFile['mod_pub'] = '0';
	$jnewsletterConfigFile['firstmailing'] = '0';
	$jnewsletterConfigFile['nblist'] = '9';

	$jnewsletterConfigFile['license'] ='';
	$jnewsletterConfigFile['token'] ='';
	$jnewsletterConfigFile['maintenance'] ='';
	$jnewsletterConfigFile['admin_debug'] ='0';
	$jnewsletterConfigFile['send_error'] ='1';
	$jnewsletterConfigFile['report_error'] ='1';
	$jnewsletterConfigFile['fullcheck'] ='0';

	$jnewsletterConfigFile['frequency'] = '0';
	$jnewsletterConfigFile['nb_days'] = '7';
	$jnewsletterConfigFile['date_type'] = '1';
	$jnewsletterConfigFile['arv_cat'] = '';
	$jnewsletterConfigFile['arv_sec'] = '';
	$jnewsletterConfigFile['maintenance_clear'] = '24' ;
	$jnewsletterConfigFile['clean_stats'] = '90';
	$jnewsletterConfigFile['maintenance_date'] = '' ;
	$jnewsletterConfigFile['mail_format'] = '1';
	$jnewsletterConfigFile['mail_encoding'] = '0';
	$jnewsletterConfigFile['showtag'] = '0';

	$jnewsletterConfigFile['show_author'] = '0';
	$jnewsletterConfigFile['addEmailRedLink'] = '0';
	$jnewsletterConfigFile['itemidAca'] = '999';
	$jnewsletterConfigFile['show_jcalpro'] = '0';
	$jnewsletterConfigFile['show_jlinks'] = '0';

	//default of column 1 name and show
	$jnewsletterConfigFile['column1_name'] = 'Column 1';
	$jnewsletterConfigFile['show_column1'] = '0';
	$jnewsletterConfigFile['column2_name'] = 'Column 2';
	$jnewsletterConfigFile['show_column2'] = '0';
	$jnewsletterConfigFile['column3_name'] = 'Column 3';
	$jnewsletterConfigFile['show_column3'] = '0';
	$jnewsletterConfigFile['column4_name'] = 'Column 4';
	$jnewsletterConfigFile['show_column4'] = '0';
	$jnewsletterConfigFile['column5_name'] = 'Column 5';
	$jnewsletterConfigFile['show_column5'] = '0';

	//url
	$numchars = rand(8,15);
	$chars = explode(',','a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,0,1,2,3,4,5,6,7,8,9');
	$random='';
	for($i=0; $i<$numchars;$i++)  {
	  $random.=$chars[rand(0,count($chars)-1)];
	}

	$jnewsletterConfigFile['url_pass'] = $random;
	//option subscription notification
	$jnewsletterConfigFile['subscription_notify'] = '0';
	//captcha
	$jnewsletterConfigFile['enable_captcha'] = '0';

	$jnewsletterConfigFile['disabletooltip'] = '0';
	$jnewsletterConfigFile['minisendmail'] = '0';
	$jnewsletterConfigFile['word_wrap'] = '0';
	//module config
	$jnewsletterConfigFile['effects'] = 'normal';

	$jnewsletterConfigFile['max_queue'] = '60';
	$jnewsletterConfigFile['max_attempts'] = '5';
	$jnewsletterConfigFile['sched_prior'] = '1';
	$jnewsletterConfigFile['ar_prior'] = '2';
	$jnewsletterConfigFile['sm_prior'] = '3';

	$jnewsletterConfigFile['j_cron'] = '1';

?>