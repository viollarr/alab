<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>Traditional Chinese language file</p>
* @author Mike Ho <mikeho1980@hotmail.com>
* @version $Id: traditional_chinese.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.dogneighbor.com
*/

#######    NOTE TO TRANSLATORS  #######
# If you wish to translate the language file to your own language, please feel free to do so
# We would apprecaite if you could send you translation to the specified email
# so that other people could benefit from your contribution
# If you feel that the file is too long feel free to do as much as you want and probably
# someone else will be happy to pick up were you stopped.
#  We did our bestt to organize the subject by order of priority so start at the top
# If you update your translation please send you updates to translation@ijoobi.com
# IMPORTANT: make sure respect as much as posible the punctionation and spacing because
# sometimes the word constant are conbined...
# Don't ever remove a define as it will create an error in the code.
# when using apostrophy  '   add a back-slash before like this:  \'  otherwise it will create an error.
# sometimes you will see html tag in the define, please leave it the way it is.

# DONT FORGET if you want to be credited fro your work, make sure to change the credit
# with your name and email if you want people to contact you otherwise leave the email as it is.
# We will use that information to also include you into the About section of the component
# Thank you very much for your contribution translating in your language

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'jNews 是一件让你有效地和你的用户及客户通讯的邮寄名单, 电子报, 自动应答, 及跟进工具.' .
		'jNews, 你的通讯拍文件！');
define('_ACA_DESC_GPL', 'jNews 是一件让你有效地和你的用户及客户通讯的邮寄名单, 电子报, 自动应答, 及跟进工具.' .
		'jNews, 你的通讯拍文件！');
define('_ACA_FEATURES', 'jNews, 你的通讯拍文件！');

// Type of lists
define('_ACA_NEWSLETTER', '电子报');
define('_ACA_AUTORESP', '自动应答');
define('_ACA_AUTORSS', '自动 RSS');
define('_ACA_ECARD', '电子卡');
define('_ACA_POSTCARD', '明信片');
define('_ACA_PERF', '效能');
define('_ACA_COUPON', '优惠券');
define('_ACA_CRON', '排程工作');
define('_ACA_MAILING', '邮件');
define('_ACA_LIST', '清单');

 //jnewsletter Menu
define('_ACA_MENU_LIST', '清单');
define('_ACA_MENU_SUBSCRIBERS', '订阅者');
define('_ACA_MENU_NEWSLETTERS', '电子报');
define('_ACA_MENU_AUTOS', '自动应答');
define('_ACA_MENU_COUPONS', '优惠券');
define('_ACA_MENU_CRONS', '排程工作');
define('_ACA_MENU_AUTORSS', '自动-RSS');
define('_ACA_MENU_ECARD', '电子卡');
define('_ACA_MENU_POSTCARDS', '明信片');
define('_ACA_MENU_PERFS', '效能');
define('_ACA_MENU_TAB_LIST', '清单');
define('_ACA_MENU_MAILING_TITLE', '邮件');
define('_ACA_MENU_MAILING' , '邮件于');
define('_ACA_MENU_STATS', '统计');
define('_ACA_MENU_STATS_FOR', '统计于');
define('_ACA_MENU_CONF', '设定');
define('_ACA_MENU_UPDATE', '更新');
define('_ACA_MENU_ABOUT', '关于');
define('_ACA_MENU_LEARN', '教育中心');
define('_ACA_MENU_MEDIA', '媒体管理员');
define('_ACA_MENU_HELP', '说明');
define('_ACA_MENU_CPANEL', '控制台');
define('_ACA_MENU_IMPORT', '汇入');
define('_ACA_MENU_EXPORT', '汇出');
define('_ACA_MENU_SUB_ALL', '全部订阅');
define('_ACA_MENU_UNSUB_ALL', '取消全部订阅');
define('_ACA_MENU_VIEW_ARCHIVE', '封存');
define('_ACA_MENU_PREVIEW', '预览');
define('_ACA_MENU_SEND', '发送');
define('_ACA_MENU_SEND_TEST', '发送测试电邮');
define('_ACA_MENU_SEND_QUEUE', '指令队列');
define('_ACA_MENU_VIEW', '检视');
define('_ACA_MENU_COPY', '复制');
define('_ACA_MENU_VIEW_STATS' , '检视统计');
define('_ACA_MENU_CRTL_PANEL' , ' 控制台');
define('_ACA_MENU_LIST_NEW' , ' 建立清单');
define('_ACA_MENU_LIST_EDIT' , ' 编辑清单');
define('_ACA_MENU_BACK', '返回');
define('_ACA_MENU_INSTALL', '安装');
define('_ACA_MENU_TAB_SUM', '概览');
define('_ACA_STATUS' , '状况');

// messages
define('_ACA_ERROR' , ' 发生了错误! ');
define('_ACA_SUB_ACCESS' , '访问权限');
define('_ACA_DESC_CREDITS', '制作人员');
define('_ACA_DESC_INFO', '信息');
define('_ACA_DESC_HOME', '首页');
define('_ACA_DESC_MAILING', '邮件清单');
define('_ACA_DESC_SUBSCRIBERS', '订阅者');
define('_ACA_PUBLISHED','已发布');
define('_ACA_UNPUBLISHED','未发布');
define('_ACA_DELETE','删除');
define('_ACA_FILTER','过滤器');
define('_ACA_UPDATE','更近');
define('_ACA_SAVE','储存');
define('_ACA_CANCEL','取消');
define('_ACA_NAME','名称');
define('_ACA_EMAIL','电邮');
define('_ACA_SELECT','选择');
define('_ACA_ALL','全部');
define('_ACA_SEND_A', '发送一封 ');
define('_ACA_SUCCESS_DELETED', ' 已成功删除');
define('_ACA_LIST_ADDED', '清单已成功建立');
define('_ACA_LIST_COPY', '清单已成功复制');
define('_ACA_LIST_UPDATED', '清单已成功更新');
define('_ACA_MAILING_SAVED', '邮件已成功储存.');
define('_ACA_UPDATED_SUCCESSFULLY', '已成功更新.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', '订阅者信息');
define('_ACA_VERIFY_INFO', '请确定你传送的链接，一些信息缺失了.');
define('_ACA_INPUT_NAME', '名称');
define('_ACA_INPUT_EMAIL', '电邮');
define('_ACA_RECEIVE_HTML', '接收 HTML？');
define('_ACA_TIME_ZONE', '时区');
define('_ACA_BLACK_LIST', '黑名单');
define('_ACA_REGISTRATION_DATE', '用户注册日期');
define('_ACA_USER_ID', '用户 id');
define('_ACA_DESCRIPTION', '描述');
define('_ACA_ACCOUNT_CONFIRMED', '你的账号已经启动.');
define('_ACA_SUB_SUBSCRIBER', '订阅者');
define('_ACA_SUB_PUBLISHER', 'Publisher');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Registered');
define('_ACA_SUBSCRIPTIONS', '你的订阅');
define('_ACA_SEND_UNSUBCRIBE', '发送取消订阅讯息');
define('_ACA_SEND_UNSUBCRIBE_TIPS', '点击「是」发送取消订阅电邮确认讯息.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', '请确认你的订阅');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', '确认取消订阅');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', '[NAME]你好，<br />' .
		'还差一步你便会被加到订阅清单.  请点击以下连结确认你的订阅.' .
		'<br /><br />[CONFIRM]<br /><br />如有疑问请联系网站管理员.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', '这封电邮是确认你已经从我们的清单中取消订阅.  我们很遗憾你决定取消订阅, 如你决定再订阅, 欢迎你随时到我们的网站.  如有疑问请联系我们的网站管理员.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', '订阅日期');
define('_ACA_CONFIRMED', '已确认');
define('_ACA_SUBSCRIB', '订阅');
define('_ACA_HTML', 'HTML 邮件');
define('_ACA_RESULTS', '结果');
define('_ACA_SEL_LIST', '选择清单');
define('_ACA_SEL_LIST_TYPE', '- 选择清单类型 -');
define('_ACA_SUSCRIB_LIST', '所有订阅者清单');
define('_ACA_SUSCRIB_LIST_UNIQUE', '订阅者于 : ');
define('_ACA_NO_SUSCRIBERS', '在此清单找不到订阅者.');
define('_ACA_COMFIRM_SUBSCRIPTION', '一封确认电邮已发送给你.  请检查你的电邮及点击所提供的连结.<br />' .
		'你需要确认你的电邮你的订阅才会生效.');
define('_ACA_SUCCESS_ADD_LIST', '你已经成功加到清单.');


 // Subcription info
define('_ACA_CONFIRM_LINK', '点击这里确认你的订阅');
define('_ACA_UNSUBSCRIBE_LINK', '点击这里从清单中取消你的订阅');
define('_ACA_UNSUBSCRIBE_MESS', '你的电邮地址已从列表中移除');

define('_ACA_QUEUE_SENT_SUCCESS' , '所有已排期邮件已成功发送.');
define('_ACA_MALING_VIEW', '检视所有邮件');
define('_ACA_UNSUBSCRIBE_MESSAGE', '你确定你想从清单中取消订阅?');
define('_ACA_MOD_SUBSCRIBE', '订阅');
define('_ACA_SUBSCRIBE', '订阅');
define('_ACA_UNSUBSCRIBE', '取消订阅');
define('_ACA_VIEW_ARCHIVE', '检视封存');
define('_ACA_SUBSCRIPTION_OR', ' 或点击这里更新你的信息');
define('_ACA_EMAIL_ALREADY_REGISTERED', '此电邮地址已经注册.');
define('_ACA_SUBSCRIBER_DELETED', '订阅者已成功删除.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', '用户控制面板');
define('_UCP_USER_MENU', '用户选单');
define('_UCP_USER_CONTACT', '我的订阅');
 //jNews Cron Menu
define('_UCP_CRON_MENU', '排程工作管理');
define('_UCP_CRON_NEW_MENU', '新排程');
define('_UCP_CRON_LIST_MENU', '列出我的排程');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', '优惠券管理');
define('_UCP_COUPON_LIST_MENU', '优惠券清单');
define('_UCP_COUPON_ADD_MENU', '新增优惠券');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', '描述');
define('_ACA_LIST_T_LAYOUT', '版面设计');
define('_ACA_LIST_T_SUBSCRIPTION', '订阅');
define('_ACA_LIST_T_SENDER', '发件人信息');

define('_ACA_LIST_TYPE', '清单类型');
define('_ACA_LIST_NAME', '清单名称');
define('_ACA_LIST_ISSUE', '发行＃');
define('_ACA_LIST_DATE', '发送日期');
define('_ACA_LIST_SUB', '邮件标题');
define('_ACA_ATTACHED_FILES', '附件档案');
define('_ACA_SELECT_LIST', '请选择要编辑的清单!');

// Auto Responder box
define('_ACA_AUTORESP_ON', '清单类型');
define('_ACA_AUTO_RESP_OPTION', '自动应答选项');
define('_ACA_AUTO_RESP_FREQ', '订阅者可以选择频率');
define('_ACA_AUTO_DELAY', '延迟（以日计）');
define('_ACA_AUTO_DAY_MIN', '最小频率');
define('_ACA_AUTO_DAY_MAX', '最大频率');
define('_ACA_FOLLOW_UP', '指定跟进自动应答');
define('_ACA_AUTO_RESP_TIME', '订阅者可以选择时间');
define('_ACA_LIST_SENDER', '列出发件人');

define('_ACA_LIST_DESC', '清单描述');
define('_ACA_LAYOUT', '版面设计');
define('_ACA_SENDER_NAME', '发件人名称');
define('_ACA_SENDER_EMAIL', '发件人电邮');
define('_ACA_SENDER_BOUNCE', '发件人退回地址');
define('_ACA_LIST_DELAY', '延迟');
define('_ACA_HTML_MAILING', 'HTML 邮件?');
define('_ACA_HTML_MAILING_DESC', '(如果变更它, 你需要储存及返回此页检视变更.)');
define('_ACA_HIDE_FROM_FRONTEND', '从首页隐藏?');
define('_ACA_SELECT_IMPORT_FILE', '选择要汇入的档案');;
define('_ACA_IMPORT_FINISHED', '汇入完成');
define('_ACA_DELETION_OFFILE', '删除档案');
define('_ACA_MANUALLY_DELETE', '失败, 你应该手动删除档案');
define('_ACA_CANNOT_WRITE_DIR', '不能写入目录');
define('_ACA_NOT_PUBLISHED', '不能发送邮件, 清单未发布.');

//  List info box
define('_ACA_INFO_LIST_PUB', '点击「是」发布清单');
define('_ACA_INFO_LIST_NAME', '在此输入你的清单的名称. 你可以此名称分辨清单.');
define('_ACA_INFO_LIST_DESC', '在此输入你的清单的简单描述. 你的网站访客将会看到此描述.');
define('_ACA_INFO_LIST_SENDER_NAME', '输入邮件发件人的名称. 当订阅者从此列表收到讯息时可以看到此名称.');
define('_ACA_INFO_LIST_SENDER_EMAIL', '输入即将发送的讯息的电邮地址.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', '输入用户可以回复到的电邮地址. 强烈建议与发件人电邮相同, 因为如果它们不同滥发过滤器将会给予你的讯息更高的滥发排名.');
define('_ACA_INFO_LIST_AUTORESP', '选择此清单的邮件类型. <br />' .
		'电子报: 正常电子报<br />' .
		'自动应答: 自动应答是自动定期透过网站发送的清单.');
define('_ACA_INFO_LIST_FREQUENCY', '允许用户选择接收列表的频率.  这给予用户更大的弹性.');
define('_ACA_INFO_LIST_TIME', '让用户选择接收列表的喜好时间.');
define('_ACA_INFO_LIST_MIN_DAY', '定义用户可选择接收列表的最小频率');
define('_ACA_INFO_LIST_DELAY', '指定此自动应答与之前一个之间延迟.');
define('_ACA_INFO_LIST_DATE', '如你想延迟发布请指定发布新闻清单的日期. <br /> 格式 : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', '定义用户可选择接收列表的最大频率');
define('_ACA_INFO_LIST_LAYOUT', '在此输入你的邮件清单的版面设计. 你可以在此输入任何你的邮件的版面设计.');
define('_ACA_INFO_LIST_SUB_MESS', '此讯息将会发送到首次注册的订阅者. 你可以在此定义任何你喜欢的文字.');
define('_ACA_INFO_LIST_UNSUB_MESS', '此讯息将会发到到取消订阅的订阅者. 可在此输入任何讯息.');
define('_ACA_INFO_LIST_HTML', '如你希望发送 HTML 邮件请选取方块. 当订阅时 HTML 清单时订阅者将可以指定是否希望接收 HTML 讯息, 或纯文本讯息.');
define('_ACA_INFO_LIST_HIDDEN', '点击「是」 从前台隐藏列表, 用户将不能订阅但你仍可以发送邮件.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', '你要自动订阅用户到此列表吗?<br /><B>新用户:</B> 将会注册每位注册到网站的新用户.<br /><B>所有用户:</B> 将会注册每位在数据库的注册用户.<br />(所有选项支持 Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', '选择前台存取层级. 它会对没有权限的用户群组显示或隐藏邮件, 因此他们不能对它订阅.');
define('_ACA_INFO_LIST_ACC_USER_ID', '选择你想允许编辑的用户群组的存取层级. 该用户群组及以上将可以编辑邮件及透过前台或后台将它发送.');
define('_ACA_INFO_LIST_FOLLOW_UP', '如果你想自动应答一旦到达最后的讯息时移到另一讯息, 你可以在此指定跟进的自动应答.');
define('_ACA_INFO_LIST_ACA_OWNER', '这是建立清单者的 ID.');
define('_ACA_INFO_LIST_WARNING', '   此最后选项只于建立列表时启用.');
define('_ACA_INFO_LIST_SUBJET', ' 邮件的标题.  这是订阅者将收到的电邮的标题.');
define('_ACA_INFO_MAILING_CONTENT', '这是你想发送的电邮的主体部份.');
define('_ACA_INFO_MAILING_NOHTML', '在此输入你想发送到选择不接收 HTML 的订阅者的电邮. <BR/> 注意: 如果你留空它 jNews 将会自动转换 HTML 内容为纯文本.');
define('_ACA_INFO_MAILING_VISIBLE', '点击「是」于前台显示邮件.');
define('_ACA_INSERT_CONTENT', '插入已存在内容');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', '优惠券成功发送！');
define('_ACA_CHOOSE_COUPON', '选择优惠券');
define('_ACA_TO_USER', ' 到此用户');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', '每小时');
define('_ACA_FREQ_CH2', '每 6 小时');
define('_ACA_FREQ_CH3', '每 12 小时');
define('_ACA_FREQ_CH4', '每日');
define('_ACA_FREQ_CH5', '每周');
define('_ACA_FREQ_CH6', '每月');
define('_ACA_FREQ_NONE', '无');
define('_ACA_FREQ_NEW', '新用户');
define('_ACA_FREQ_ALL', '所有用户');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews 排程?');
define('_ACA_LABEL_FREQ_TIPS', '如果你想使用它作为 jNews 排程点击「是」, 点击「否」作为任何其他的排程工作.<br />' .
		'如果你点击「是」 你不需要指定排程地址, 它将会自动地加入.');
define('_ACA_SITE_URL' , '你的网址');
define('_ACA_CRON_FREQUENCY' , '排程频率');
define('_ACA_STARTDATE_FREQ' , '开始日期');
define('_ACA_LABELDATE_FREQ' , '指定日期');
define('_ACA_LABELTIME_FREQ' , '指定时间');
define('_ACA_CRON_URL', '排程网址');
define('_ACA_CRON_FREQ', '频率');
define('_ACA_TITLE_CRONLIST', '排程清单');
define('_NEW_LIST', '建立新清单');

//title CRON form
define('_ACA_TITLE_FREQ', '排程编辑');
define('_ACA_CRON_SITE_URL', '请输入有效的网址, 以 http:// 开始');

### Mailings ###
define('_ACA_MAILING_ALL', '所有邮件');
define('_ACA_EDIT_A', '编辑 ');
define('_ACA_SELCT_MAILING', '请在下拉式选单中选择清单以新增邮件.');
define('_ACA_VISIBLE_FRONT', '可于前台检视');

// mailer
define('_ACA_SUBJECT', '标题');
define('_ACA_CONTENT', '内容');
define('_ACA_NAMEREP', '[NAME] = 它会被订阅者所输入的名称取代, 你可以用它发送个人化电邮.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = 它会被订阅者所输入的名字取代.<br />');
define('_ACA_NONHTML', '非-html 版本');
define('_ACA_ATTACHMENTS', '附件');
define('_ACA_SELECT_MULTIPLE', '按住 ctrl（或命令）选择多个附件.<br />' .
		'附件列表中显示的档案放在附件文件夹内, 你可以在控制面板变更此位置.');
define('_ACA_CONTENT_ITEM', '内容项目');
define('_ACA_SENDING_EMAIL', '电邮发送中');
define('_ACA_MESSAGE_NOT', '讯息不能发送');
define('_ACA_MAILER_ERROR', '邮件收发机错误');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', '讯息已成功发送');
define('_ACA_SENDING_TOOK', '发送此邮件用了');
define('_ACA_SECONDS', '秒');
define('_ACA_NO_ADDRESS_ENTERED', '无提供电邮地址或订阅者');
define('_ACA_CHANGE_SUBSCRIPTIONS', '变更');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', '变更你的订阅');
define('_ACA_WHICH_EMAIL_TEST', '指出发送测试或选择预览的电邮地址');
define('_ACA_SEND_IN_HTML', '以 HTML 发送（只限 html 邮件）？');
define('_ACA_VISIBLE', '可检视');
define('_ACA_INTRO_ONLY', '只有简介');

// stats
define('_ACA_GLOBALSTATS', '全局统计');
define('_ACA_DETAILED_STATS', '详细统计');
define('_ACA_MAILING_LIST_DETAILS', '列出详情');
define('_ACA_SEND_IN_HTML_FORMAT', '以 HTML 格式发送');
define('_ACA_VIEWS_FROM_HTML', '检视（自 html 邮件）');
define('_ACA_SEND_IN_TEXT_FORMAT', '以纯文本格式发送');
define('_ACA_HTML_READ', 'HTML 已阅读');
define('_ACA_HTML_UNREAD', 'HTML 未阅读');
define('_ACA_TEXT_ONLY_SENT', '纯文本');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', '邮寄');
define('_ACA_LOGGING_CONFIG', '纪录及统计');
define('_ACA_SUBSCRIBER_CONFIG', '订阅者');
define('_ACA_MISC_CONFIG', '杂项');
define('_ACA_MAIL_SETTINGS', '邮寄设定');
define('_ACA_MAILINGS_SETTINGS', '邮件设定');
define('_ACA_SUBCRIBERS_SETTINGS', '订阅者设定');
define('_ACA_CRON_SETTINGS', '排程设定');
define('_ACA_SENDING_SETTINGS', '发送设定');
define('_ACA_STATS_SETTINGS', '统计设定');
define('_ACA_LOGS_SETTINGS', '纪录设定');
define('_ACA_MISC_SETTINGS', '杂项设定');
// mail settings
define('_ACA_SEND_MAIL_FROM', '发件人电邮');
define('_ACA_SEND_MAIL_NAME', '发件人名称');
define('_ACA_MAILSENDMETHOD', '邮件收发机模式');
define('_ACA_SENDMAILPATH', 'Sendmail 路径');
define('_ACA_SMTPHOST', 'SMTP 主机');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP 需要验证');
define('_ACA_SMTPAUTHREQUIRED_TIPS', '如你的 SMTP 服务器需要验证, 选择「是」');
define('_ACA_SMTPUSERNAME', 'SMTP 用户名称');
define('_ACA_SMTPUSERNAME_TIPS', '如你的 SMTP 服务器需要验证, 输入 SMTP 用户名称');
define('_ACA_SMTPPASSWORD', 'SMTP 密码');
define('_ACA_SMTPPASSWORD_TIPS', '如你的 SMTP 服务器需要验证, 输入 SMTP 密码');
define('_ACA_USE_EMBEDDED', '使用内嵌图像');
define('_ACA_USE_EMBEDDED_TIPS', '如附加在内容项目的图像是内嵌在 html 讯息电邮, 选择「是」; 使用默认图像卷标链接到网站图像, 选择「否」.');
define('_ACA_UPLOAD_PATH', '上载/附件路径');
define('_ACA_UPLOAD_PATH_TIPS', '你可以指定上载目录.<br />' .
		'确定你指定的目录已存在, 否则建立它.');

// subscribers settings
define('_ACA_ALLOW_UNREG', '允许未注册');
define('_ACA_ALLOW_UNREG_TIPS', '如你想允许用户无需注册到网站便可订阅到清单, 选择「是」.');
define('_ACA_REQ_CONFIRM', '需要确认');
define('_ACA_REQ_CONFIRM_TIPS', '如你需要未注册订阅者确认他们的电邮地址, 选择「是」.');
define('_ACA_SUB_SETTINGS', '订阅设定');
define('_ACA_SUBMESSAGE', '订阅电邮');
define('_ACA_SUBSCRIBE_LIST', '订阅到清单');

define('_ACA_USABLE_TAGS', '可用的标签');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = 它建立可点击连结使订阅者可以确认他们的订阅. 这是让 jNews 正常运作所<strong>必须的</strong>.<br />'
.'<br />[NAME] = 它会被订阅者所输入的名称取代, 你可以用它发送个人化电邮.<br />'
.'<br />[FIRSTNAME] = 它会被订阅者所输入的名字取代, 名字是由订阅者定义.<br />');
define('_ACA_CONFIRMFROMNAME', '确认发件人名称');
define('_ACA_CONFIRMFROMNAME_TIPS', '输入显示在确认列表的发件人名称.');
define('_ACA_CONFIRMFROMEMAIL', '发件人电邮确认');
define('_ACA_CONFIRMFROMEMAIL_TIPS', '输入显示在确认列表的电邮地址.');
define('_ACA_CONFIRMBOUNCE', '退回地址');
define('_ACA_CONFIRMBOUNCE_TIPS', '输入显示在确认列表的退回地址.');
define('_ACA_HTML_CONFIRM', 'HTML 确认');
define('_ACA_HTML_CONFIRM_TIPS', '如用户允许 html 确认列表便是 html, 选择「是」.');
define('_ACA_TIME_ZONE_ASK', '询问时区');
define('_ACA_TIME_ZONE_TIPS', '如你想询问用户的时区, 选择「是」. 适用时排程邮件会按时区发送');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', '排程');
define('_ACA_TIME_OFFSET_URL', '点击这里在全局设定控制台 -> 地区分页设定时差');
define('_ACA_TIME_OFFSET_TIPS', '设定你的服务器时差使纪录日期及时间准确');
define('_ACA_TIME_OFFSET', '时差');
define('_ACA_CRON_DESC','<br />使用排程功能你可以为你的 Joomla 网站设定自动化工作!<br />' .
		'要设定你需要在你的控制面板 crontab 新增以下指令:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />如需协助设定或有问题请咨询我们的讨论区 <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');
// sending settings
define('_ACA_PAUSEX', '每设定数量电邮等待ｘ秒');
define('_ACA_PAUSEX_TIPS', '输入 jNews 将会给予 SMTP 服务器在执行下一设定数量讯息前发送讯息的时间秒数.');
define('_ACA_EMAIL_BET_PAUSE', '电邮之间暂停');
define('_ACA_EMAIL_BET_PAUSE_TIPS', '暂停前要发送的电邮数目.');
define('_ACA_WAIT_USER_PAUSE', '暂停时等待用户输入');
define('_ACA_WAIT_USER_PAUSE_TIPS', '当邮件组之间暂停时程序是否应等待用户输入.');
define('_ACA_SCRIPT_TIMEOUT', '程序逾时');
define('_ACA_SCRIPT_TIMEOUT_TIPS', '程序可执行分钟时数（０代表不限）.');
// Stats settings
define('_ACA_ENABLE_READ_STATS', '允许阅读统计');
define('_ACA_ENABLE_READ_STATS_TIPS', '如你想纪录检视数目, 选择「是」. 此技术只可用于 html 邮件');
define('_ACA_LOG_VIEWSPERSUB', '纪录每位订阅者检视');
define('_ACA_LOG_VIEWSPERSUB_TIPS', '如你想纪录每位订阅者的检视数目, 选择「是」. 此技术只可用于 html 邮件');
// Logs settings
define('_ACA_DETAILED', '详细纪录');
define('_ACA_SIMPLE', '简单纪录');
define('_ACA_DIAPLAY_LOG', '显示纪录');
define('_ACA_DISPLAY_LOG_TIPS', '如你想在发送邮件时显示纪录, 选择「是」.');
define('_ACA_SEND_PERF_DATA', '发送效能');
define('_ACA_SEND_PERF_DATA_TIPS', '如你想允许 jNews 发送你的设定、清单上订阅者数目及发送邮件所消耗时间的昵名报告, 选择「是」. 这让我们更了解 jNews 的效能及帮助我们改进 jNews 将来的开发.');
define('_ACA_SEND_AUTO_LOG', '发送自动应答纪录');
define('_ACA_SEND_AUTO_LOG_TIPS', '如你想每次执行排程时发送电邮纪录, 选择「是」.  警告: 这可导致大量电邮.');
define('_ACA_SEND_LOG', '发送纪录');
define('_ACA_SEND_LOG_TIPS', '是否电邮邮件纪录到发送邮件的用户的电邮地址.');
define('_ACA_SEND_LOGDETAIL', '发送详细纪录');
define('_ACA_SEND_LOGDETAIL_TIPS', '详细纪录包括每位订阅者的成功及失败信息及信息概览. 简单纪录只发送概览.');
define('_ACA_SEND_LOGCLOSED', '如联机关闭发送纪录');
define('_ACA_SEND_LOGCLOSED_TIPS', '有了此选项, 发送邮件的用户仍会接收到报告电邮.');
define('_ACA_SAVE_LOG', '储存纪录');
define('_ACA_SAVE_LOG_TIPS', '是否附加邮件纪录到纪录文件.');
define('_ACA_SAVE_LOGDETAIL', '储存详细纪录');
define('_ACA_SAVE_LOGDETAIL_TIPS', '详细纪录包括每位订阅者的成功及失败信息及信息概览. 简单纪录只发送概览.');
define('_ACA_SAVE_LOGFILE', '储存纪录文件');
define('_ACA_SAVE_LOGFILE_TIPS', '纪录信息所附加到的档案. 此档案可能变得很大.');
define('_ACA_CLEAR_LOG', '清除纪录');
define('_ACA_CLEAR_LOG_TIPS', '清除纪录文件.');

### control panel
define('_ACA_CP_LAST_QUEUE', '最后执行排程');
define('_ACA_CP_TOTAL', '合共');
define('_ACA_MAILING_COPY', '成功复制邮件！');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', '显示指南');
define('_ACA_SHOW_GUIDE_TIPS', '在开始时显示指南协助新用户建立电子报, 自动应答及正确地设定 jNews.');
define('_ACA_AUTOS_ON', '使用自动应答');
define('_ACA_AUTOS_ON_TIPS', '如你不想使用自动应答, 选择「否」, 所有自动应答选项将会关闭.');
define('_ACA_NEWS_ON', '使用电子报');
define('_ACA_NEWS_ON_TIPS', '如你不想使用电子报, 选择「否」, 所有电子报选项将会关闭.');
define('_ACA_SHOW_TIPS', '显示提示');
define('_ACA_SHOW_TIPS_TIPS', '显示提示, 协助用户更有效地使用 jNews.');
define('_ACA_SHOW_FOOTER', '显示脚注');
define('_ACA_SHOW_FOOTER_TIPS', '是否显示脚注版权通告.');
define('_ACA_SHOW_LISTS', '在前台显示列表');
define('_ACA_SHOW_LISTS_TIPS', '当用户未注册时显示他们可订阅的电子报列表及封存按钮或简单地显示登入窗体让他们注册.');
define('_ACA_CONFIG_UPDATED', '设定详情已更新！');
define('_ACA_UPDATE_URL', '更新网址');
define('_ACA_UPDATE_URL_WARNING', '警告！除非是 jNews 技术团队提出，否则不要变更此网址.<br />');
define('_ACA_UPDATE_URL_TIPS', '例如：http://www.ijoobi.com/update/（包括结尾斜线）');

// module
define('_ACA_EMAIL_INVALID', '所输入的电邮无效.');
define('_ACA_REGISTER_REQUIRED', '在你订阅清单前请先到网站注册.');

// Access level box
define('_ACA_OWNER', '清单建立者:');
define('_ACA_ACCESS_LEVEL', '设定清单存取层级');
define('_ACA_ACCESS_LEVEL_OPTION', '存取层级选项');
define('_ACA_USER_LEVEL_EDIT', '选择哪个用户层级允许编辑邮件 (从前台或后台) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', '每日');
define('_ACA_AUTO_DAY_CH2', '每日，除了周末');
define('_ACA_AUTO_DAY_CH3', '每一其他日子');
define('_ACA_AUTO_DAY_CH4', '每一其他日子, 除了周末');
define('_ACA_AUTO_DAY_CH5', '每周');
define('_ACA_AUTO_DAY_CH6', '双周');
define('_ACA_AUTO_DAY_CH7', '每月');
define('_ACA_AUTO_DAY_CH9', '每年');
define('_ACA_AUTO_OPTION_NONE', '无');
define('_ACA_AUTO_OPTION_NEW', '新用户');
define('_ACA_AUTO_OPTION_ALL', '所有用户');

//
define('_ACA_UNSUB_MESSAGE', '取消订阅电邮');
define('_ACA_UNSUB_SETTINGS', '取消订阅设定');
define('_ACA_AUTO_ADD_NEW_USERS', '自动订阅用户?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', '暂时没有可用更新.');
define('_ACA_VERSION', 'jNews 版本');
define('_ACA_NEED_UPDATED', '需要更新的档案:');
define('_ACA_NEED_ADDED', '需要新增的档案：');
define('_ACA_NEED_REMOVED', '需要移除的档案：');
define('_ACA_FILENAME', '文件名：');
define('_ACA_CURRENT_VERSION', '现在版本：');
define('_ACA_NEWEST_VERSION', '最新版本：');
define('_ACA_UPDATING', '更新中');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', '档案成功更新.');
define('_ACA_UPDATE_FAILED', '更新失败！');
define('_ACA_ADDING', '新增中');
define('_ACA_ADDED_SUCCESSFULLY', '新增成功.');
define('_ACA_ADDING_FAILED', '新增失败！');
define('_ACA_REMOVING', '移除中');
define('_ACA_REMOVED_SUCCESSFULLY', '移除成功.');
define('_ACA_REMOVING_FAILED', '移除失败！');
define('_ACA_INSTALL_DIFFERENT_VERSION', '安装不同版本');
define('_ACA_CONTENT_ADD', '新增内容');
define('_ACA_UPGRADE_FROM', '汇入数据（电子报及订阅者信息）自 ');
define('_ACA_UPGRADE_MESS', '此程序只简单地汇入数据到 jNews 数据库. <br /> 对你现存的数据不会构成风险.');
define('_ACA_CONTINUE_SENDING', '继续发送');

// jNews message
define('_ACA_UPGRADE1', '你可以简易地于更新控制面板汇入你的用户及电子报从 ');
define('_ACA_UPGRADE2', ' 到 jNews.');
define('_ACA_UPDATE_MESSAGE', '有新版本的 jNews！');
define('_ACA_UPDATE_MESSAGE_LINK', '点击这里更新!');
define('_ACA_THANKYOU', '多谢选择 jNews, 你的通讯拍文件！');
define('_ACA_NO_SERVER', '更新服务器暂停, 请稍后再尝试.');
define('_ACA_MOD_PUB', 'jNews 模块未发布.');
define('_ACA_MOD_PUB_LINK', '点击这里发布它！');
define('_ACA_IMPORT_SUCCESS', '成功汇入');
define('_ACA_IMPORT_EXIST', '订阅者已经于数据库');

// jNews\'s Guide
define('_ACA_GUIDE', '精灵');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews 有很多强大的功能, 此精露会引导你渡过四个简单步骤, 让你开始发送你的电子报及自动应答！<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', '首先, 你需要新增清单.  列表有两类, 电子报或自动应答.' .
		'  于清单内你需定定义所有不同参数才能发送你的电子报或自动应答: 发件人名称, 版面设计, 订阅者欢迎辞等...
<br /><br />你可以在这里设立你的首张清单: <a href="index2.php?option=com_jnewsletter&amp;act=list" >建立清单</a> 及点击新增按钮.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews 给你提供简易途径从之前的电子报系统汇入所有数据.<br />' .
		' 前往更新控制台及选择你之前的电子报系统汇入所有你的电子报及订阅者.<br /><br />' .
		'<span style="color:#FF5E00;" >重要: 汇入是没有风险的及不会影响你之前电子报系统的数据</span><br />' .
		'汇入后你将可以直接从 jNews 管理你的订阅者及邮件.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', '你的首张清单已建立!  你现在可以撰写你的首项%s.  要建立它前往: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', '自动应答管理');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', '电子报管理');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', '及选择你的%s. <br /> 然后在下拉式清单选择你的%s.  点击新增建立你的首项邮件');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', '在你发送你的首项电子报前你可能需要检查邮寄设定.  ' .
		'前往 <a href="index2.php?option=com_jnewsletter&amp;act=configuration" >设定页</a> 确认邮寄设定. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />当你准备好, 返回电子报选单, 选择你的邮件及点击发送');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', '你需要先于你的服务器设定排程工作, 才能发送你的自动应答. ' .
		' 请参考控制台排程分页.' .
		' <a href="index2.php?option=com_jnewsletter&amp;act=configuration" >点击这里</a> 学习关于设定排程工作. <br />');

define('_ACA_GUIDE_MODULE', ' <br />确定你已发布 jNews 模块让人们可以注册列表.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' 你现在亦可以设定自动应答.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' 你现在亦可以设定电子报.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />瞧! 你已准备好有效地与你的访客及用户通讯. 当你输入第二项邮件时此精露将会结束或你可以于 <a href="index2.php?option=com_jnewsletter&act=configuration" >控制台</a> 关闭它.' .
		'<br /><br />  当你使用 jNews 时如有任何问题, 请参考 ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >讨论区</a>. ' .
		' 你亦可以到<a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a> 找到更多关于如何有效与你的订阅者通讯的信息 .' .
		'<p /><br /><b>感谢你使用 jNews. 你的通讯拍文件!</b> ');
define('_ACA_GUIDE_TURNOFF', '精灵现在关闭!');
define('_ACA_STEP', '步骤 ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews 设定');
define('_ACA_INSTALL_SUCCESS', '安装成功');
define('_ACA_INSTALL_ERROR', '安装错误');
define('_ACA_INSTALL_BOT', 'jNews 插件（Bot）');
define('_ACA_INSTALL_MODULE', 'jNews 模块');
//Others
define('_ACA_JAVASCRIPT','!警告! Javascript 必须启用才可正常运作.');
define('_ACA_EXPORT_TEXT','订阅者是基于你所选清单导出. <br />导出订阅者到清单');
define('_ACA_IMPORT_TIPS','汇入订阅者. 档案内信息需要是以下格式: <br />' .
		'名称,电邮,接收HTML(1/0),<span style="color: rgb(255, 0, 0);">已确定(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', '已经是订阅者');
define('_ACA_GET_STARTED', '点击这里开始!');

//News since 1.0.1
define('_ACA_WARNING_1011','警告: 1011: 因你的服务器限制不能更新.');
define('_ACA_SEND_MAIL_FROM_TIPS', '选择发件人显示哪个电邮地址.');
define('_ACA_SEND_MAIL_NAME_TIPS', '选择发件人显示什么名称.');
define('_ACA_MAILSENDMETHOD_TIPS', '选择使用哪个邮件收发机: PHP 邮寄功能, <span>Sendmail</span> 或 SMTP 服务器.');
define('_ACA_SENDMAILPATH_TIPS', '这是邮件服务器目录');
define('_ACA_LIST_T_TEMPLATE', '主题');
define('_ACA_NO_MAILING_ENTERED', '无提供寄件');
define('_ACA_NO_LIST_ENTERED', '无提供清单');
define('_ACA_SENT_MAILING' , '已发送邮件');
define('_ACA_SELECT_FILE', '请选择档案 ');
define('_ACA_LIST_IMPORT', '检查你想与订阅者关联连的清单.');
define('_ACA_PB_QUEUE', '订阅者已插入但连接它到清单时出现问题. 请手动检查.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , '强烈建议更新！');
define('_ACA_UPDATE_MESS2' , '补丁及轻微修正.');
define('_ACA_UPDATE_MESS3' , '新版本.');
define('_ACA_UPDATE_MESS5' , '更新需要 Joomla 1.5.');
define('_ACA_UPDATE_IS_AVAIL' , ' 已经推出!');
define('_ACA_NO_MAILING_SENT', '无发送邮件!');
define('_ACA_SHOW_LOGIN', '显示登入窗体');
define('_ACA_SHOW_LOGIN_TIPS', '选择「是」于 jNews 控制面板前台显示登入窗体使用户能注册到网站.');
define('_ACA_LISTS_EDITOR', '列出描述编辑');
define('_ACA_LISTS_EDITOR_TIPS', '选择「是」使用 HTML 编辑器编辑清单描述栏.');
define('_ACA_SUBCRIBERS_VIEW', '检视订阅者');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , '前台设定' );
define('_ACA_SHOW_LOGOUT', '显示注销按钮');
define('_ACA_SHOW_LOGOUT_TIPS', '选择「是」在前台 jNews 控制面板显示注销按钮.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', '整合');
define('_ACA_CB_INTEGRATION', 'Community Builder 整合');
define('_ACA_INSTALL_PLUGIN', 'Community Builder 插件（jNews 整合）');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', '未安装 jNews 的 Community Builder 插件!');
define('_ACA_CB_PLUGIN', '于注册表显示列表');
define('_ACA_CB_PLUGIN_TIPS', '选择「是」于 community builder 注册表格显示邮件列表');
define('_ACA_CB_LISTS', '清单 ID');
define('_ACA_CB_LISTS_TIPS', '这是必填字段. 以逗号分隔输入你想允许用户订阅的列表的 id 号码 (0 显示所有列表)');
define('_ACA_CB_INTRO', '介绍文字');
define('_ACA_CB_INTRO_TIPS', '列表列出前将显示的文字. 留空则不显示任何文字.  你可使用 HTML 标签自定义外观及感觉.');
define('_ACA_CB_SHOW_NAME', '显示列表名称');
define('_ACA_CB_SHOW_NAME_TIPS', '选择简介后是否显示列表名称.');
define('_ACA_CB_LIST_DEFAULT', '默认剔选清单');
define('_ACA_CB_LIST_DEFAULT_TIPS', '选择是否让每个清单的方块默认为已点选.');
define('_ACA_CB_HTML_SHOW', '显示接收 HTML');
define('_ACA_CB_HTML_SHOW_TIPS', '选择「是」允许用户决定他们想接收 HTML 电邮与否. 选择「否」使用预设接收 html.');
define('_ACA_CB_HTML_DEFAULT', '预设接收 HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', '设定此项显示默认 html 邮件设定. 如显示接收 HTML 设定为「否」此选项将为默认.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', '不能备份文件! 档案没有被替代.');
define('_ACA_BACKUP_YOUR_FILES', '档案的旧版本已备份到以下目录:');
define('_ACA_SERVER_LOCAL_TIME', '服务器本机时间');
define('_ACA_SHOW_ARCHIVE', '显示封存按钮');
define('_ACA_SHOW_ARCHIVE_TIPS', '选择「是」于前台电子报列表显示封存按钮');
define('_ACA_LIST_OPT_TAG', '标签');
define('_ACA_LIST_OPT_IMG', '图像');
define('_ACA_LIST_OPT_CTT', '内容');
define('_ACA_INPUT_NAME_TIPS', '输入你的全名（名字先）');
define('_ACA_INPUT_EMAIL_TIPS', '输入你的电邮地址（如你想接收我们的邮件, 请确定这是有效的电邮地址.）');
define('_ACA_RECEIVE_HTML_TIPS', '如你想接收 HTML 邮件, 选择「是」－纯文本邮件，选择「否」');
define('_ACA_TIME_ZONE_ASK_TIPS', '指定你的时区.');

// Since 1.0.5
define('_ACA_FILES' , '档案');
define('_ACA_FILES_UPLOAD' , '上载');
define('_ACA_MENU_UPLOAD_IMG' , '上载图像');
define('_ACA_TOO_LARGE' , '档案太大. 最大限制是');
define('_ACA_MISSING_DIR' , '目的地目录不存在');
define('_ACA_IS_NOT_DIR' , '目的地目录不存在或是普通档案.');
define('_ACA_NO_WRITE_PERMS' , '目的地目录没有写入权限.');
define('_ACA_NO_USER_FILE' , '你没有选择要上载的档案.');
define('_ACA_E_FAIL_MOVE' , '不可能移动档案.');
define('_ACA_FILE_EXISTS' , '目的地档案已经存在.');
define('_ACA_CANNOT_OVERWRITE' , '目的地档案已存在及不能被覆盖.');
define('_ACA_NOT_ALLOWED_EXTENSION' , '文件类型不被允许.');
define('_ACA_PARTIAL' , '档案只是部份被上载.');
define('_ACA_UPLOAD_ERROR' , '上载错误:');
define('DEV_NO_DEF_FILE' , '档案只是部份被上载.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = 它会被订阅连结取代.' .
		' 这是 <strong>必填的</strong> jNews 才能正常运作.<br />' .
		'如你在此方块放置其他内容, 它会在所有相应到此列表的邮件内显示.' .
		' <br />新增你的订阅讯息于结尾.  jNews 会自动为订阅者新增变更信息及取消订阅链接.');

// since 1.0.6
define('_ACA_NOTIFICATION', '通知');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', '通知');
define('_ACA_USE_SEF', '于邮件开启友善搜寻');
define('_ACA_USE_SEF_TIPS', '建议你选择「否」.  但如你想你的邮件所包含的网址都使用 SEF, 则选择「是」.' .
		' <br /><b>链接在两种选项下均可运作.  选择「否」确保邮件中连结总是运作, 即使你变更了你的 SEF.</b> ');
define('_ACA_ERR_NB' , '错误 #: ERR');
define('_ACA_ERR_SETTINGS', '错误处理设定');
define('_ACA_ERR_SEND' ,'发送错误报告');
define('_ACA_ERR_SEND_TIPS' ,'如你想 jNews 更完善请选择「是」.  它会发送错误报告给我们.  故此你甚至不需要再报告臭虫 ;-) <br /> <b>不会发送任何私人信息</b>.  我们甚至不知道错误从哪个网址送来. 我们只发送关于 jNews 的信息, PHP 设定及 SQL 询问. ');
define('_ACA_ERR_SHOW_TIPS' ,'选择「是」于屏幕显示错误编号.  主要用作除错作用. ');
define('_ACA_ERR_SHOW' ,'显示错误');
define('_ACA_LIST_SHOW_UNSUBCRIBE', '显示取消订阅链接');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', '选择「是」于邮件底部显示取消链接让用户变更他们的订阅. <br /> 选择「否」关闭脚注及连结.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">重要通告！</span> <br />如你是从之前的  jNews 安装升级，你需要点击以下按钮升级你的数据库结构（你的数据会完整保留）');
define('_ACA_UPDATE_INSTALL_BTN' , '升级表格及设定');
define('_ACA_MAILING_MAX_TIME', '最大排程时间' );
define('_ACA_MAILING_MAX_TIME_TIPS', '定义每组排程发送电邮的最大时间. 建议在 30 秒至 2 分钟之间.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart 整合');
define('_ACA_VM_COUPON_NOTIF', '优惠券通知 ID');
define('_ACA_VM_COUPON_NOTIF_TIPS', '指定你想用作发送优惠券到你的顾客的邮件 ID 号码.');
define('_ACA_VM_NEW_PRODUCT', '新产品通知 ID');
define('_ACA_VM_NEW_PRODUCT_TIPS', '指定你想用作发送新产品通知的邮件 ID 号码.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', '建立窗体');
define('_ACA_FORM_COPY', 'HTML 编码');
define('_ACA_FORM_COPY_TIPS', '复制所产生的 HTML 编码到你的 HTML 页.');
define('_ACA_FORM_LIST_TIPS', '选择你想包括窗体的列表');
// update messages
define('_ACA_UPDATE_MESS4' , '不能自动更新.');
define('_ACA_WARNG_REMOTE_FILE' , '不能取得远程档案.');
define('_ACA_ERROR_FETCH' , '颉取档案错误.');

define('_ACA_CHECK' , '检查');
define('_ACA_MORE_INFO' , '更多信息');
define('_ACA_UPDATE_NEW' , '更新到新版本');
define('_ACA_UPGRADE' , '升级到更高档产品');
define('_ACA_DOWNDATE' , '返回之前版本');
define('_ACA_DOWNGRADE' , '返回基本产品');
define('_ACA_REQUIRE_JOOM' , '需要 Joomla');
define('_ACA_TRY_IT' , '尝试它！');
define('_ACA_NEWER', '较新的');
define('_ACA_OLDER', '较旧的');
define('_ACA_CURRENT', '现在的');

// since 1.0.9
define('_ACA_CHECK_COMP', '尝试其他组件');
define('_ACA_MENU_VIDEO' , '影片教学');
define('_ACA_SCHEDULE_TITLE', '自动日程功能设定');
define('_ACA_ISSUE_NB_TIPS' , '发行编号自动由系统产生' );
define('_ACA_SEL_ALL' , '所有邮件');
define('_ACA_SEL_ALL_SUB' , '所有清单');
define('_ACA_INTRO_ONLY_TIPS' , '如你只点选此方块, 插入到邮件的文章简介将会附有「详细内容...」连结到完整文章.' );
define('_ACA_TAGS_TITLE' , '内容标签');
define('_ACA_TAGS_TITLE_TIPS' , '复制及贴上此标签到邮件中你想放置内容的位置.');
define('_ACA_PREVIEW_EMAIL_TEST', '指定发送测试到这个电邮地址');
define('_ACA_PREVIEW_TITLE' , '预览');
define('_ACA_AUTO_UPDATE' , '更新通知');
define('_ACA_AUTO_UPDATE_TIPS' , '如欲当组件有更新时通知你, 选择「是」. <br />重要!! 此功能需要开启提示.');

// since 1.1.0
define('_ACA_LICENSE' , '许可协议信息');

// since 1.1.1
define('_ACA_NEW' , '新');
define('_ACA_SCHEDULE_SETUP', '你需要于设定设定日程表, 才可发送自动应答.');
define('_ACA_SCHEDULER', '日程表');
define('_ACA_JNEWSLETTER_CRON_DESC' , '如你没有你网站排程任务管理器的访问权限, 你可以注册免费的 jNews Cron 户口于:' );
define('_ACA_CRON_DOCUMENTATION' , '你可以于以下网址找到更多设定 jNews 日程表数据:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>' );
define( '_ACA_QUEUE_PROCESSED' , '成功执行排程...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , '移动汇入档案错误' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , '日程表频率' );
define( '_ACA_CRON_MAX_FREQ' , '日程表最大频率' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , '指定日程表可执行的最大频率（分钟）.  它会限制日程表即使排程工作设定更高频率.' );
define( '_ACA_CRON_MAX_EMAIL' , '每件工作最大电邮' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , '指定每项工作的最大发送电邮数目（0 无限）.' );
define( '_ACA_CRON_MINUTES' , ' 分钟' );
define( '_ACA_SHOW_SIGNATURE' , '显示电邮脚注' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , '你是否想于电邮脚注推广 jNews.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , '自动应答成功执行...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , '已排程电子报成功执行...' );
define( '_ACA_MENU_SYNC_USERS' , '同步用户' );
define( '_ACA_SYNC_USERS_SUCCESS' , '成功同步用户！' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', '注销' );
if (!defined('_CMN_YES')) define( '_CMN_YES', '是' );
if (!defined('_CMN_NO')) define( '_CMN_NO', '否' );
if (!defined('_HI')) define( '_HI', '你好' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', '顶部' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', '底部' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', '注销' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , '如你选择它, 只有插入到邮件的文章标题会连结到完整文章.');
define('_ACA_TITLE_ONLY' , '只有标题');
define('_ACA_FULL_ARTICLE_TIPS' , '如你选择它, 完整文章会插入到邮件');
define('_ACA_FULL_ARTICLE' , '完整文章');
define('_ACA_CONTENT_ITEM_SELECT_T', '选择附加到讯息的内容项目. <br />复制及贴上 <b>内容标签</b> 到邮件.  你可 (分别地用 0, 1, 或 2) 选择完整文章, 只有简介, 或只有标题. ');
define('_ACA_SUBSCRIBE_LIST2', '邮件清单');

// smart-newsletter function
define('_ACA_AUTONEWS', '智能-电子报');
define('_ACA_MENU_AUTONEWS', '智能-电子报');
define('_ACA_AUTO_NEWS_OPTION', '智能-电子报选项');
define('_ACA_AUTONEWS_FREQ', '电子报频率');
define('_ACA_AUTONEWS_FREQ_TIPS', '指定你想发送智能-电子报的频率.');
define('_ACA_AUTONEWS_SECTION', '文章单元');
define('_ACA_AUTONEWS_SECTION_TIPS', '指定你想选择文章来自哪个单元.');
define('_ACA_AUTONEWS_CAT', '文章分类');
define('_ACA_AUTONEWS_CAT_TIPS', '指定你想选择文章来自哪个分类 (该单元内所有文章).');
define('_ACA_SELECT_SECTION', '选择单元');
define('_ACA_SELECT_CAT', '所有分类');
define('_ACA_AUTO_DAY_CH8', '季度的');
define('_ACA_AUTONEWS_STARTDATE', '开始日期');
define('_ACA_AUTONEWS_STARTDATE_TIPS', '指定你想开始发送智能-电子报的日期.');
define('_ACA_AUTONEWS_TYPE', '内容翻译');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', '完整文章: 将于电子报包含完整文章.<br />' .
		'只有简介: 将于电子报包含只有文章的简介.<br/>' .
		'只有标题: 将于电子报包含只有文章的标题.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = 它会由智能-电子报取代.' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', '建立 / 检视邮件');
define('_ACA_LICENSE_CONFIG' , '许可协议' );
define('_ACA_ENTER_LICENSE' , '输入许可协议');
define('_ACA_ENTER_LICENSE_TIPS' , '输入你的许可协议号码及储存它.');
define('_ACA_LICENSE_SETTING' , '许可协议设定' );
define('_ACA_GOOD_LIC' , '你的许可协议有效.' );
define('_ACA_NOTSO_GOOD_LIC' , '你的许可协议无效：' );
define('_ACA_PLEASE_LIC' , '请联络 jNews 支持升级你的许可协议（license@ijoobi.com）.' );
define('_ACA_DESC_PLUS', 'jNews Plus 是首个 Joomla CMS 的自动应答.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO 是 Joomla CMS 的终极邮件系统.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , '输入筹号');

define('_ACA_ENTER_TOKEN_TIPS' , '请输入你在惠顾 jNews 时从电邮收到的筹号. ');

define('_ACA_JNEWSLETTER_SITE', 'jNews 网站：');
define('_ACA_MY_SITE', '我的网站：');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'点击这里前往许可协议表格.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , '请消除许可协议栏及重试.<br />  如问题持续, ' );

define( '_ACA_LICENSE_SUPPORT' , '如你仍有疑问，' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , '你可于许可协议窗体输入你的筹号取得许可协议手册及网址（本页顶部绿色高亮部分）. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', '储存你的筹号后许可协议将会自动产生. ' .
		' 通常筹号确认需时 2 分钟.  但是某些情况可能需时至 15 分钟.<br />' .
		'<br />几分钟后返回此控制台检查.  <br /><br />' .
		'如你在 15 分钟内接收不到有效的许可协议, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , '你的筹号尚未确认.');
define( '_ACA_UPDATE_CLICK_HERE' , '请到访 <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> 下载最新版本.');
define( '_ACA_NOTIF_UPDATE' , '要在有更新时通知你, 输入你的电邮地址及点击订阅 ');

define('_ACA_THINK_PLUS', '如你想你的邮件系统具备更多功能请考虑 Plus!');
define('_ACA_THINK_PLUS_1', '连续的自动应答');
define('_ACA_THINK_PLUS_2', '排程于预定日子发送你的电子报');
define('_ACA_THINK_PLUS_3', '再没有服务器限制');
define('_ACA_THINK_PLUS_4', '及更多...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', '清单访问权限' );
define( '_ACA_INFO_LIST_ACCESS', '指定哪个群组的用户可以检视及订阅到此清单' );
define( 'ACA_NO_LIST_PERM', '你没有足够权限订阅此清单' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', '封存');
 define('_ACA_MENU_ARCHIVE_ALL', '封存全部');

//Archive Lists
 define('_FREQ_OPT_0', '无');
 define('_FREQ_OPT_1', '每周');
 define('_FREQ_OPT_2', '每 2 周');
 define('_FREQ_OPT_3', '每月');
 define('_FREQ_OPT_4', '每季');
 define('_FREQ_OPT_5', '每年');
 define('_FREQ_OPT_6', '其他');

define('_DATE_OPT_1', '建立日期');
define('_DATE_OPT_2', '修改日期');

define('_ACA_ARCHIVE_TITLE', '设定自动-封存频率');
define('_ACA_FREQ_TITLE', '封存频率');
define('_ACA_FREQ_TOOL', '定义你想封存管理员每隔多久封存你的网站内容.');
define('_ACA_NB_DAYS', '日数');
define('_ACA_NB_DAYS_TOOL', '只适用于其他选项! 请指定每次封存相隔日数.');
define('_ACA_DATE_TITLE', '日期类型');
define('_ACA_DATE_TOOL', '定义应否在建立日期或修改日期封存.');

define('_ACA_MAINTENANCE_TAB', '维护设定');
define('_ACA_MAINTENANCE_FREQ', '维护频率');
define( '_ACA_MAINTENANCE_FREQ_TIPS', '定义你想定期执行维护的频率.' );
define( '_ACA_CRON_DAYS' , '小时' );

define( '_ACA_LIST_NOT_AVAIL', '没有可用清单.');
define( '_ACA_LIST_ADD_TAB', '新增/编辑' );

define( '_ACA_LIST_ACCESS_EDIT', '新增邮件/编辑访问权限' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', '指定哪个群组用户可以为此列表新增或编辑新邮件' );
define( '_ACA_MAILING_NEW_FRONT', '建立新邮件' );

define('_ACA_AUTO_ARCHIVE', '自动存档');
define('_ACA_MENU_ARCHIVE', '自动存档');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = 它会由电子报的发行号码取代.');
define('_ACA_TAGS_DATE', '[DATE] = 它会由发送日期取代.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = 它会由 Community Builder 字段取得的数值取代: 例. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', '维护' );

define('_ACA_THINK_PRO', '有专业需要, 使用专业组件!');
define('_ACA_THINK_PRO_1', '智能-电子报');
define('_ACA_THINK_PRO_2', '为你的清单定义权限层级');
define('_ACA_THINK_PRO_3', '定义谁可以编辑/新增邮件');
define('_ACA_THINK_PRO_4', '更多标签: 新增你的 CB 字段');
define('_ACA_THINK_PRO_5', 'Joomla 内容自动存档');
define('_ACA_THINK_PRO_6', '优化数据库');

define('_ACA_LIC_NOT_YET', '你的许可协议尚未确认.  请检查控制台许可协议分页.');
define('_ACA_PLEASE_LIC_GREEN' , '确定已提供分页顶部的绿色信息给我们的支持团队.' );

define('_ACA_FOLLOW_LINK' , '取得你的许可协议');
define( '_ACA_FOLLOW_LINK_TWO' , '你可以在许可协议窗体输入筹号及网址取得许可协议 (本页顶部绿色高亮部分). ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' 然后点击顶部右方选单的套用按钮.' );
define( '_ACA_ENTER_LIC_NB', '输入你的许可协议' );
define( '_ACA_UPGRADE_LICENSE', '升级你的许可协议');
define( '_ACA_UPGRADE_LICENSE_TIPS' , '如你收到升级你的许可协议筹号请在此输入, 点击套用及继续第 <b>2</b> 步取得你的新许可协议号码.' );

define( '_ACA_MAIL_FORMAT', '编码格式' );
define( '_ACA_MAIL_FORMAT_TIPS', '你的邮件想用什么格式的编码, 纯文本或 MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', '如你没有你网站排程任务管理器的访问权限, 你可以使用免费的 jCron 组件从你的网站建立排程工作.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', '显示作者名称');
define('_ACA_SHOW_AUTHOR_TIPS', '如你想在邮件新增文章时新增作者名称, 选择「是」.');

//since 1.3.5
define('_ACA_REGWARN_NAME','请输入你的名称.');
define('_ACA_REGWARN_MAIL','请输入有效的电邮地址.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','如果你选择是, 用户的电邮将会被新增你的重新导向网址的结尾处作为参数.');
define('_ACA_ADDEMAILREDLINK','新增电邮到重新导向链接');

//since 1.6.3
define('_ACA_ITEMID','ItemId');
define('_ACA_ITEMID_TIPS','此 ItemId 将会加到你的 jNews 连结.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','显示 jCalPRO 的整合分页<br/>（只适用于如果 jCalPRO 已经安装在你的网站！）');
define('_ACA_JCALTAGS_TITLE','jCalPRO 标签:');
define('_ACA_JCALTAGS_TITLE_TIPS','复制及贴上此卷标于邮件列表内你欲放置项目（Event）的位置.');
define('_ACA_JCALTAGS_DESC','描述:');
define('_ACA_JCALTAGS_DESC_TIPS','如果你想插入项目的描述，选择「是」');
define('_ACA_JCALTAGS_START','开始日期:');
define('_ACA_JCALTAGS_START_TIPS','如果你想插入项目的开始日期，选择「是」');
define('_ACA_JCALTAGS_READMORE','阅读更多:');
define('_ACA_JCALTAGS_READMORE_TIPS','如果你想插入 <b>阅读更多链接</b> 到此项目，选择「是」');
define('_ACA_REDIRECTCONFIRMATION','重新导向 URL');
define('_ACA_REDIRECTCONFIRMATION_TIPS','如果你需要确认电邮, 当用户点击确认链接时他将会被确认及重新导向到此 URL.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','No account yet?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Register');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','You are not authorised to view this resource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP', compa::encodeutf('Disable Tooltip'));
define('_ACA_DISABLETOOLTIP_TIPS', compa::encodeutf('Disable the tooltip on the frontend'));
define('_ACA_MINISENDMAIL', compa::encodeutf('Use Mini SendMail'));
define('_ACA_MINISENDMAIL_TIPS', compa::encodeutf('If your server use Mini SendMail, select this option to don\'t add the name of the user in the header of the e-mail'));

//Since 3.1.5
define('_ACA_READMORE',compa::encodeutf('Read more...'));
define('_ACA_VIEWARCHIVE',compa::encodeutf('Click here'));

//since 4.0.0
define('_ACA_SHOW_JLINKS',compa::encodeutf('Link Tracking'));
define('_ACA_SHOW_JLINKS_TIPS',compa::encodeutf('Enables the integration with jLinks to be able to do link tracking for each links in the newsletter.'));

//since 4.1.0
define( '_ACA_MAIL_ENCODING', 'Mail encoding' );
define( '_ACA_MAIL_ENCODING_TIPS', 'What encoding format do you want to use UTF-8 (highly recommended) or ISO-8859-2' );
define( '_ACA_COPY_SUBJECT', 'Copy Subject' );

//since 5.0.0
//mary for columns
define('_ACA_MCOLUMN1','Column 1');//$GLOBALS[ACA.'column1_name']);
define('_ACA_MCOLUMN2','Column 2');//$GLOBALS[ACA.'column2_name']);
define('_ACA_MCOLUMN3','Column 3');//$GLOBALS[ACA.'column3_name']);
define('_ACA_MCOLUMN4','Column 4');//$GLOBALS[ACA.'column4_name']);
define('_ACA_MCOLUMN5','Column 5');//$GLOBALS[ACA.'column5_name']);
//fieldset for column configuration
define('_ACA_COLUMN','User-defined Columns');
define('_ACA_COLUMN1','Show Column 1');
define('_ACA_COLUMN2','Show Column 2');
define('_ACA_COLUMN3','Show Column 3');
define('_ACA_COLUMN4','Show Column 4');
define('_ACA_COLUMN5','Show Column 5');
define('_ACA_COL1_NAME', 'Column 1 Name');
define('_ACA_COL2_NAME', 'Column 2 Name');
define('_ACA_COL3_NAME', 'Column 3 Name');
define('_ACA_COL4_NAME', 'Column 4 Name');
define('_ACA_COL5_NAME', 'Column 5 Name');
//define('_ACA_COL1_TIPS','Enter the alias name of column 1 to be shown in the subscribers module');
define('_ACA_SHOW_COLUMN1_TIPS','Show/hide this column in your subscribers list-BE');
define('_ACA_SHOW_COLUMN2_TIPS','Show/hide this column in your subscribers list-BE');
define('_ACA_SHOW_COLUMN3_TIPS','Show/hide this column in your subscribers list-BE');
define('_ACA_SHOW_COLUMN4_TIPS','Show/hide this column in your subscribers list-BE');
define('_ACA_SHOW_COLUMN5_TIPS','Show/hide this column in your subscribers list-BE');
define('_ACA_INPUT_COLUMN1','Column 1');//$GLOBALS[ACA.'column1_name']);
define('_ACA_INPUT_COLUMN2','Column 2');//$GLOBALS[ACA.'column2_name']);
define('_ACA_INPUT_COLUMN3','Column 3');//$GLOBALS[ACA.'column3_name']);
define('_ACA_INPUT_COLUMN4','Column 4');//$GLOBALS[ACA.'column4_name']);
define('_ACA_INPUT_COLUMN5','Column 5');//$GLOBALS[ACA.'column5_name']);
define('_ACA_INPUT_COLUMN1_TIPS','Enter your column 1');
define('_ACA_INPUT_COLUMN2_TIPS','Enter your column 2');
define('_ACA_INPUT_COLUMN3_TIPS','Enter your column 3');
define('_ACA_INPUT_COLUMN4_TIPS','Enter your column 4');
define('_ACA_INPUT_COLUMN5_TIPS','Enter your column 5');
define('_ACA_COLUMN1_REP', '[COLUMN1] = This will be replaced by your user defined column 1');
define('_ACA_COLUMN2_REP', '[COLUMN2] = This will be replaced by your user defined column 2');
define('_ACA_COLUMN3_REP', '[COLUMN3] = This will be replaced by your user defined column 3');
define('_ACA_COLUMN4_REP', '[COLUMN4] = This will be replaced by your user defined column 4');
define('_ACA_COLUMN5_REP', '[COLUMN5] = This will be replaced by your user defined column 5');
define('_ACA_REGWARN_COLUMN1','Please enter your');
define('_ACA_REGWARN_COLUMN2','Please enter your');
define('_ACA_REGWARN_COLUMN3','Please enter your');
define('_ACA_REGWARN_COLUMN4','Please enter your');
define('_ACA_REGWARN_COLUMN5','Please enter your');
//end of columns
//url
define('_ACA_URL_PASS','Password');
define('_ACA_URL_PASS_TIPS','Enter the password to be able to add a subscriber by entering the url. Append the catcher variable password in the URL.<br>(For Plus and PRO this code will used for captcha.)');
define('_ACA_URL_MES','Please subscribe through the Subscriber Module or subscribe through the frontend.');
define('_ACA_URL_PASS_WARN','(In the PRO If you change this password, please update the hidden password in your external form as well.)');
define('_ACA_ENABLE_CAPTCHA', 'Enable Captcha');
define('_ACA_ENABLE_CAPTCHA_TIPS','Enable captcha functionality in the subscriber module and in the subscription via external form in the PRO.');
//url
// subscription notification
define('_ACA_SUBSCRIPTION_NOTIFY','Send Subscription Notification');
define('_ACA_SUBSCRIPTION_NOTIFY_TIPS','Admin will be sent with subscription notification email after users subscribe in the jNews Subscribers Module. The notification will be sent to: ');
define('_ACA_SUBSCRIPTION_NOTIFY_MSG1','A subscription notification email has been sent to the administrator.');
define('_ACA_SUBSCRIPTION_NOTIFY_MSG2','No subscription notification email sent.');
define('_ACA_NEW_SUB','jNews Newsletter Subscription');
define('_ACA_SUBSCRIPTION_NOTIFY_ERR','Unable in sending a subscription notification to the administrator.');
//subscription notification messages
//for captcha
define('_ACA_CAPTCHA_CAPTION','Code: ');
define('ACA_WRONG_CAPTCHA_ENTERED','<p style=\'text-align: justify;\'><b>CAPTCHA security code is incorrect or the information you provided are invalid.</b><br>(The security code is necessary to prevent automatic registrations by bots and to verify that registrations are made by a person.)<br><br><b><font color=#ff0000>Your subscription was not processed.</font></b><br><br>Please fill in your information and the security code more carefully and click the <b>Subscribe</b> button.<br><br>Thanks for your understanding.</p><br>');
define('_ACA_REGWARN_CAPTCHA','Enter the captcha code.');
define('_ACA_SUB_ERR','<br>Error in subscribing.');

//since 6.0.0
define('_ACA_MOOTOOLS_BTNTEXT' , 'Subscribe Here');
define('_ACA_QUEUE_SUBJECT','Subject');
define('_ACA_QUEUE_EMAIL','Email');
define('_ACA_QUEUE_PRIOR','Priority');
define('_ACA_QUEUE_ATT','Attempts');
define('_ACA_QUEUE_DEL', 'Delete');
define('_ACA_PROCESS_Q','Process Queue');
define('_ACA_CLEAN_Q','Clean Queue');
define('_ACA_SENDDATE','Send date');
define('_ACA_MAILING_Q','All Mailings in Queue');
define('_ACA_MENU_QUEUE', 'Queue');
define('_ACA_MENU_TEMPLATES','Templates');
define('_ACA_MENU_TAB_QUEUE' , 'Queue');
define('_ACA_Q_PROCESS' , 'Queue Configuration');
define('_ACA_MAX_Q','Maximum number of e-mails per batch');
define('_ACA_SUBS_LIST_LABEL' , 'This Newsletter will be sent to the subscribers of the following selected lists:');
define('_ACA_SUBS_LIST_CAMPAIGN' , 'This Newsletter will be sent to the subscribers of the following selected campaigns:');
define('_ACA_SUBS_LIST_RECEIVE', 'Receive' );
define('_ACA_SUBS_LIST_TOALL', 'Select All' );
define('_ACA_SUBS_LIST_TONONE', 'None' );
define('_ACA_LIST_COLOR','Color');
define('_ACA_LIST_COLOR_TIP','Select the color for your list. It can be usefull for the statistics.');
define('_ACA_MENU_NEW', 'New');
define('_ACA_MENU_EDIT', 'Edit');
define('_ACA_MENU_APPLY', 'Apply');
define('_ACA_MENU_CANCEL', 'Cancel');
define('_ACA_MENU_TEMPLATE', 'Template');
define('_ACA_HTML_VERSION', 'HTML Version');
define('_ACA_NONHTML_VERSION', 'Non-HTML Version');
define('_ACA_TAG_NAME_DESC' , 'This will be replaced by the name the subscriber entered, you will be sending personalized email when using this.');
define('_ACA_TAG_FNAME_DESC' , 'This will be replaced by the FIRST name of the subscriber entered.');
define('_ACA_TAG_ISSUENB_DESC' , 'This will be replaced by the issue number of the newsletter.');
define('_ACA_TAG_DATE_DESC' , 'This will be replaced by the sent date.');
define('_ACA_TAG_CBNAME' , '[CBTAG:{field_name}]');
define('_ACA_TAG_CBNAME_DESC' , 'This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] ');
define('_ACA_TAG_LOADMODINFO_DESC' , 'This will be replaced by the Joomla module where id is equal to id of the joomla module. For example {module=1}.<br /> The modules can only be loaded through the cron task. <br /> ');
define('_ACA_DATETIME' , 'Date and Time');
define('_ACA_TEMPLATE_COPY' , '_copy');
define('_ACA_TEMPLATE_DEFAULT_NODEL' , 'You cannot delete a default template!');
define('_ACA_TEMPLATE_DEFAULT_SUCCS' , 'Successfully set to default!');
define('_ACA_TEMPLATE' , 'Template');
define('_ACA_TEMPLATES' , 'Templates');
define('_ACA_CAMPAIGN' , 'Campaign');
define('_ACA_SELCT_MAILINGLIST', 'Please select a list in the List tab in order to add a mailing.');
define('_ACA_SELCT_MAILINGCAMPAIGN', 'Please select a campaign in the List tab in order to add a mailing.');
define('_ACA_TEMPLATE_AVAIL', 'All Available Templates');
define('_ACA_TEMPLATE_NAME', 'Name');
define('_ACA_TEMPLATE_NAME_T', 'Enter the name of the template.');
define('_ACA_TEMPLATE_NAMEKEY', 'Namekey');
define('_ACA_TEMPLATE_NAMEKEY_T', 'Enter the namekey of the template.');
define('_ACA_TEMPLATE_DESC', 'Description');
define('_ACA_TEMPLATE_DEFAULT', 'Default');
define('_ACA_TEMPLATE_DEFAULT_T', 'Select "Yes" to set as the default template.');
define('_ACA_TEMPLATE_PUBLISH', 'Publish');
define('_ACA_TEMPLATE_PUBLISH_T', 'Select "Yes" to publish the template.');
define('_ACA_TEMPLATE_BG', 'Background Color');
define('_ACA_TEMPLATE_BG_T', 'Select the template background color.');
define('_ACA_TEMPLATE_UPLOAD', 'Upload Thumbnail');
define('_ACA_TEMPLATE_UPLOAD_T', 'Upload an image thumbnail of the template.');
define('_ACA_TEMPLATE_DESC_T', 'Enter the description of the template.');
define('_ACA_TEMPLATE_STYLE_TH1', 'Title h1');
define('_ACA_TEMPLATE_STYLE_TH2', 'Title h2');
define('_ACA_TEMPLATE_STYLE_TH3', 'Title h3');
define('_ACA_TEMPLATE_STYLE_TH4', 'Title h4');
define('_ACA_TEMPLATE_STYLE_UNSUB', 'Style for the Unsubscribe Link');
define('_ACA_TEMPLATE_STYLE_SUB', 'Style for the "Change Your Subscription" Link');
define('_ACA_TEMPLATE_STYLE_CONTENT', 'Style for the content area');
define('_ACA_TEMPLATE_STYLE_CHEAD', 'Style for the content title');
define('_ACA_TEMPLATE_STYLE_CREADMORE', 'Style for the read more link');
define('_ACA_TEMPLATE_STYLE_VONLINE', 'Style for the "View it online" Link');
define('_ACA_TEMPLATE_STYLE_NEW', 'Add a New Style');
define('_ACA_TEMPLATE_STYLE_NEWC', 'Name of the CSS Class');
define('_ACA_TEMPLATE_STYLE_NEWAPPLIED', 'CSS that will be applied to the class.');

//statistics & reports
define('_ACA_REPORTS_SUBS', 'Subscribers Reports');
define('_ACA_REPORTS_MAIL', 'Mailing Reports');
define('_ACA_REPORTS_LIST', 'List Reports');
define('_ACA_LIST_SUBCRIBERS', 'No. of Subscribers');
define('_ACA_LIST_UNSUBSCRIBERS', 'No. of Unsubscribers');
define('_ACA_LIST_CONFIRMED', 'No. of Confirmed Emails');
define('_ACA_LIST_UNCONFIRMED', 'No. of Unconfirmed Emails');
define('_ACA_LIST_SUB_DATE', 'Subscribed Date');
define('_ACA_MAILING_SEND_DATE','Send Date');
define('_ACA_MAILING_SUBJECT', 'Subject');
define('_ACA_MAILING_SENT_HTML','Sent in HTML');
define('_ACA_MAILING_SENT_TEXT','Sent in Text');
define('_ACA_MAILING_FAILED', 'Send Fails');
define('_ACA_MAILING_PENDING', 'Mail Pending');
define('_ACA_MAILING_BOUNCES','Bounces');
define('_ACA_MAILING_SENT', 'Total Sent');

//stats filters
define('_ACA_GROUP_PREDEFINED_DATE','Predefined Date');		//legend
define('_ACA_GROUP_SPECIFIED_DATE','Specified Date');
define('_ACA_LABEL_SET_INTERVAL', 'Set Interval');		//labels
define('_ACA_LABEL_DATE_RANGE','Date Range');
define('_ACA_LABEL_CURRENT_SERVER_TIME', 'Current Server Time');
define('_ACA_LABEL_REPORT_TYPE','Report Type');
define('_ACA_INTERVAL_DAILY','Daily');					//intervals
define('_ACA_INTERVAL_WEEKLY','Weekly');
define('_ACA_INTERVAL_MONTHLY', 'Monthly');
define('_ACA_INTERVAL_YEARLY','Yearly');
define('_ACA_DEFINED_RANGE_YESTERDAY','Yesterday');		//predefined range
define('_ACA_DEFINED_RANGE_TODAY', 'Today');
define('_ACA_DEFINED_RANGE_THIS_WEEK','This Week');
define('_ACA_DEFINED_RANGE_LAST_WEEK','Last Week');
define('_ACA_DEFINED_RANGE_LAST_TWO_WEEK','Last 2 Weeks');
define('_ACA_DEFINED_RANGE_THIS_MONTH','This Month');
define('_ACA_DEFINED_RANGE_LAST_MONTH','Last Month');
define('_ACA_DEFINED_RANGE_THIS_YEAR','This Year');
define('_ACA_DEFINED_RANGE_LAST_YEAR','Last Year');
define('_ACA_DEFINED_RANGE_TWO_YEARS_AGO','2 Years Ago');
define('_ACA_DEFINED_RANGE_3_YEARS_AGO','3 Years Ago');
define('_ACA_BUTTON_REFRESH','Refresh');				//buttons
define('_ACA_BUTTON_GENERATE','Generate');
define('_ACA_BUTTON_RESET', 'Reset');
define('_ACA_SPECIFIED_DATE_START','Start');			//specified date
define('_ACA_SPECIFIED_DATE_END','End');
define('_ACA_REPORT_LISTING','Listing');
define('_ACA_REPORT_GRAPH','Graph');
define('_ACA_REPORT_EXPORT','Export');
define('-ACA_SUBSCRIBERS_ALL_USERS', 'All Users');		//subscribers
define('_ACA_SUBSCRIBERS_REGISTERED', 'Registered');
define('_ACA_SUBSCRIBERS-GUESTS','Guests');
define('_ACA_REPORT_WARN_MESSAGE', 'Incomplete Date Selection in Specified Fieldset!');

//stats export
define('_ACA_STATS_EXPORT', 'Export');
define('_ACA_EXPORT_WARN_MESSAGE', 'No Data to be Exported');
define('_ACA_GRAPH_WARN_MESSAGE', 'No Data to be Displayed');
define('_ACA_REPORT_HEADER', 'Report');
define('_ACA_REPORT_HEADER_TO', 'to');
define('_ACA_PIE_WARN_MESSAGE', 'No Data for Mailing Process');

//stats graph labels
define('_ACA_GRAPH_LBL_HTML', 'HTML');
define('_ACA_GRAPH_LBL_TEXT', 'TEXT');
define('_ACA_GRAPH_TITLE_FORMAT', 'HTML/TEXT Format');
define('_ACA_GRAPH_PIE_TITLE_MAIL', 'Mailing Process');
define('_ACA_PIE_SUBS', 'Subscribers');
define('_ACA_PIE_UNSUBS', 'Unsubscribers');
define('_ACA_PIE_UNCONFIRMED', 'Unconfirmed');
define('_ACA_PIE_CONFIRMED', 'Confirmed');
define('_ACA_MAILING_SUBJECT_HEADER', 'Subject');


//Wizards
define('_ACA_WIZARD', 'Wizard');
define('_ACA_CHECKLISTFOUND', 'Please create your list first and be sure that it is published.');

define('_ACA_CHECKCAMPAIGNFOUND', 'Please create your campaign(list) first and be sure that it is published.');
define('_ACA_TEMPLATE_ALERT_NAMEKEY', 'Template must have a namekey!');
define('_ACA_LIST_GUIDE', '<strong>List Management:</strong> <br/>'.
       '<ul><li>The first thing you have to do to start with jNews is to create your list.</li>'.
       '<li>You will be able to subscribe users to this list and send one or more Newsletters.</li>'.
       '<li>You can specify here the basic information of the list including your <i><u>Sender Information</u></i>.</li>'.
       '<li>And be able to specify users or group of users who can subscribe to that list.</li>'.
       '<li>For <i>Plus</i> and <i>Pro</i> version you can specify what group of user or user who can add or edit mailings for this list.</li>'.
       '<li>For <i>Pro</i> version you have the option to send <i><u>Unsubscription</u></i> and <i><u>Subscription Notification</u></i> to the owner of the list or the admin of the site.</li></ul>');
define('_ACA_SUBSCRIBERS_GUIDE', '<strong>Subscriber Management:</strong> </br>' .
	    '<ul><li><strong>During Creation: </strong></li><br>'.
        '<ul><li>You can proceed here adding your subscribers.</li>'.
        '<li>Specify your <i><u>Subscriber Information</i></u></li>'.
        '<li>And select which <i><u>List</u></i> you want your subscriber to subscribe to, provided that you have created list.</li>'.
        '<li>You can Confirm your added subscriber to receive your newsletters.</li>'.
        '<li>You can also allow your subscriber to recieve the HTML format of your newsletter.</li>'.
        '<li><i><u>IP</u></i> field is added to automatically detect the IP of your subscriber from the frontend of your site. </li></ul></ul>'.
        '<ul><li><strong>Export Button</strong></li>' .
        '<ul><li>This allows you to <i><u>Export</u></i> your subscribers from all your lists or selected lists.</li></ul></ul>' .
        '<ul><li><strong>Import Button</strong></li>' .
        '<ul><li>This allows you to <i><u>Import</u></i> your subscribers to all your lists or selected lists.</li></ul></ul>');
define('_ACA_NEWSLETTER_GUIDE', '<strong>Newsletter Management:</strong> <br/>'.
        '<ul><li>Provided that you have created List(s) you can now proceed creating your <i><u>Newsletters</u></i>.</li>'.
        '<li>For the <i><u>Plus</u></i> version you can create <i><u>Scheduled Newsletter</u></i> and also <i><u>Autoresponder</u></i> or <i><u>Campaign</u></i> type of mailing.</li>'.
        '<li>For <i><u>PRO</u></i> you have the functionality with <i><u>Smart-Newsletter</u></i>, which takes your <i>latest created</i>, <i>modified</i> and <i>published articles</i> of your site.</li></ul>'.
        '<ul><li><strong>During Creation:</strong></li>'.
		'<ul><li><i><u>Newsletter Content Area</u></i> -> where you put all the contents of your Newsletter.</li>'.
		'<li><i><u>List Tab</u></i> -> the area where you can send the newsletter to one or more Lists.</li>'.
		'<li><i><u>Sender Tab</u></i> -> the area of the Sender Information Settings of your Newsletter.</li>'.
		'<li><i><u>Content Tab</u></i> -> the area where you can look for the contents of your site and specify which article to insert into your Newsletter.</li>'.
        '<li><i><u>Attachments</u></i> -> Newsletter Attachement Information area.</li></ul></ul>' .
        '<ul><li><strong>Unpublished Button</strong></li>' .
        '<ul><li>Enables you to unpublished your newsletter.</li></ul></ul>' .
        '<ul><li><strong>Preview Button</strong></li>' .
        '<ul><li>Preview the content and format of your newsletter.</li></ul></ul>' .
        '<ul><li><strong>Send Button</strong></li>' .
        '<ul><li>Enables you to manually send the newsletter to your list of subscribers.</li></ul></ul>' .
        '<ul><li><i>Note: You can only edit an unpublished newsletter.</i></li></ul>');
define('_ACA_AUTORESPONDER_GUIDE', '<strong>Autoresponder Management:</strong><br/>'.
		  '<ul><li>Provided that you have created <i><u>Campaign</u></i> type of list you can proceed creating your <i><u>Autoresponder</u></i>.</li>'.
		  '<li>During the creation process you can specify the <i><u>Number of Delays</u></i> for your autoresponder, after the previous one has been processed.</li>' .
		  '<li> The process is more or less the same on how to create your newsletter.</li></ul>');
define('_ACA_SMARTNEWSLETTER_GUIDE', '<strong>Smart-Newsletter Management:</strong> <br/>' .
		 '<ul><li>Provided that you have created <i>list(s)</i> and <i>latest created</i>, <i>modified</i> and <i>published article</i> on your site you can proceed creating <i><u>SmartNewsletter</u></i>.</li>'.
         '<li>The creation process is more or less the same with Newsletter Creation.</li>' .
         '<li>From the <i><u>Smart-Newsletter Tab</u></i> during creation you can specify your settings for the processing of your Smart-Newsletters.</li>');
define('_ACA_TEMPLATES_GUIDE', '<strong>Template Management:</strong><br><ul><li>Templates can be very useful in creating newsletter.</li>' .
		'<li>This view will allow you to create Templates for your newsletters</li>' .
		'<li><i><u>Default Template</u></i> will be applied to the newly created newsletter.</li>' .
		'<li><i><u>Inline CSS</u></i> of the template will be applied/inherited to the created newsletter.</li>' .
		'<li>You can also choose a <i><u>Background Color</u></i> that will be a background of the newsletter.</li>' .
		'<li>Note: Only newly created newsletter will get the html of the default template</li></ul>' .
		'<ul><strong>Default Button</strong>'.
		'<ul><li>Inorder to make your Template as the default template to be used in your newsletter you just need to click on this button.</li></ul></ul>');
define('_ACA_QUEUE_GUIDE','<strong>Queue Management:</strong><br/> ' .
		'<ul><li>This view enables you to see your <i><u>Queued Mailings</u></i>.' .
		'<li>These are your <i><u>Scheduled Newsletters</i></u>, <i><u>Autoresponders</i></u> and <i><u>Smart-Newsletters</i></u></li>'.
        '<li>The <i><u>Process Queue Button</i></u> will allow you to proces your queued mailings manually by just clicking the said button.</li>' .
        '<li>The <i><u>Reset S.N. Counter Button</i></u> will allow you to reset the <i>next send date</i> or <i>generated date</i> of your Smart-Newsletter.</li>' .
        '<li>The <i><u>Empty Queue Button</i></u> will allow you to clean the whole queue.</li></ul>');
define('_ACA_ABOUT_GUIDE','JNEWSLETTER');
define('_ACA_IMPORT_GUIDE','<strong>Import Management:</strong><br/>'.
         '<ul><li>Here you can import your subscribers to all your lists or to select lists.</li>'.
         '<li>By following the link given below, you can proceed importing your subscribers.</li>'.
         '<li><i>Note: You need to create first your lists before importing your subscribers.</i></li></ul>');
define('_ACA_CONFIGURATION_GUIDE','<strong>Configuration:</strong><br/>'.
        '<ul>All the jnewsletter configuration settings can be done in this area.<br/><br/>'.
	    '<strong>Mail Tab:</strong>'.
	    '<ul><li>The area where you can define the Mail Settings and Sending Settings of jNews depending on your server requirements.</li></ul>'.
	    '<br/><strong>Subscribers Tab:</strong>'.
	    '<ul><li>The area where we can define the subscription settings both from the backend and frontend of your site.</li></ul>'.
	    '<br/><strong>Scheduler Tab:</strong>'.
	    '<ul><li>The area where we can specify the Scheduler Frequency so do with Maintenance Settings on the sending of your mailings.</li>
         <li>The Information entered on this area depends also on your server requirements or server limitation.</li></ul>'.
	    '<br/><strong>Logs & Stats Tab:</strong>'.
	    '<ul><li>The area to specify the Statistics Settings and Logs Settings.</li></ul>'.
	    '<br/><strong>Archive Tab:</strong>'.
	    '<ul><li>This is mainly used for the auto archive frequency.</li></ul>'.
	    '<br/><strong>Miscellaneous Tab:</strong>'.
	    '<ul><li>All the other settings and preferences can be found here.</li></ul>'.
	    '<br/><strong>Queue Tab:</strong>'.
	    '<ul><li>Mainly used for the Queue Management View (available for Plus and Pro Version).</li></ul>'.
	    '<br/><strong>License Tab:</strong>'.
	    '<ul><li>The area where we can validate the license by just following the steps presented.</li></ul></ul>');
define('_ACA_EMPTY_Q','Empty Queue');
define('_ACA_RESET_SN','Reset S.N. Counter');
define('_ACA_Q_M1','There are no emails in the queue.');
define('_ACA_INSTALL_CLICKSTART', 'Click here to get started!');
define('_ACA_INSTALL_DESC', 'Thank you for choosing jNews.<br><br>
jNews is a mailing lists, newsletters, auto-responders and follow up tool for communicating effectively with your users and customers.');
define('_ACA_INSTALL_ERRORN' , 'If you have error during the installation process, please refer to our');
define('_ACA_INSTALL_DOC' , 'documentation here.');
define('_ACA_INSTALL_SUCC' , 'Successfuly Installed.');
define('_ACA_INSTALL_STATUS_CONFIG' , 'jNews Configuration:');
define('_ACA_INSTALL_STATUS_PLUGIN' , 'jNews Plugin(Bot):');
define('_ACA_INSTALL_STATUS_MOD' , 'jNews Module:');
define('_ACA_INSTALL_UPDATES' , 'jNews Updates');
define('_ACA_STATS_GUIDE', '<strong>Mailing Reports: </strong><br/>'.
		'<ul> <li>It will generate a list of mailings sent based on the given date range. </li> ' .
		'<li>It will count the following: <ul><li> the no. of mails sent in HTML & Text Format,</li>' .
			'<li> no. of how many viewed the mails in HTML format, </li>' .
			'<li>how many mail sent that are failed, </li><li>still on-process (pending), ' .
			'</li><li>email bounced,</li> <li>and the total sent is the no. of emails sent on each mailing.</li> </ul></li></ul>'.
		'<strong>List Reports:</strong> <br/>'.
		'<ul> <li>It will generate a listing of List Names based on the date of subscriptions on a given date range. </li>' .
			'<li>It will list the following:  <ul><li>total no. of subscribers who made a subscription </li> ' .
			'<li>total no. of subscribers who unsubscribed, </li>' .
			'<li>total no. of confirmed and unconfirmed subscribers on each list type. </li>  </ul></li></ul>'.
		'<strong>Subscribers Report:</strong> <br/>'.
		'<ul> <li>It will generate a report on the total no. of subscribers on a given date range.</li> </ul>'.
		'<strong>How to Export the Report into CSV File:</strong>'.
		'<ul> <li>On each Reports (Mailing, List and Subscribers), an export icon is found at the upper right of each tab.</li>'.
		'<li>Click the export icon to export the file.</li></ul>'
		);
define('_ACA_TEMPLATE_ALIAS' , 'Alias');
define('_ACA_SEARCH' , 'Search');
define('_ACA_SEARCH_GO' , 'Go');
define('_ACA_SEARCH_RESET' , 'Reset');
define('_ACA_SENDER_LIST_INFO', 'Click to select sender from list' );
define('_ACA_FILTER_MAILING' , 'Select a Mailing ');
define('_ACA_MESSAGE_QUEUE' , 'All Mailings in the Queue ');
define('_ACA_FILTER_LIST' , 'Select Type');
define('_ACA_MAILING_TAG' , 'Tag');
define('_ACA_MAILING_TAGINSERT' , 'Insert');
define('_ACA_MAILING_TAG_INSTRUCT' , '<p>Select the desired tag to be added and click insert.<br> Note: <i>Make sure to place the cursor in the text editor where you want to insert.</i></p>');
define('_ACA_COLUMN1_DESC', 'This will be replaced by your user defined column 1');
define('_ACA_COLUMN2_DESC', 'This will be replaced by your user defined column 2');
define('_ACA_COLUMN3_DESC', 'This will be replaced by your user defined column 3');
define('_ACA_COLUMN4_DESC', 'This will be replaced by your user defined column 4');
define('_ACA_COLUMN5_DESC', 'This will be replaced by your user defined column 5');
define('_ACA_TAG_SUBSCRIPTION', '[SUBSCRIPTIONS]');
define('_ACA_TAG_UNSUBSCRIBE', '[UNSUBSCRIBE]');
define('_ACA_TAG_SUBSCRIPTION_DESC', 'This will be replaced by the defined constant "_ACA_CHANGE_EMAIL_SUBSCRIPTION" in the translation.');
define('_ACA_TAG_UNSUBSCRIBE_DESC', 'This will be replaced by the defined constant "_ACA_UNSUBSCRIBE" in the translation.');
define('_ACA_TAG_VIEWONLINETXT', '{viewonline:text here}');
define('_ACA_TAG_VIEWONLINE', 'view it in your browser');
define('_ACA_TAG_VIEWONLINE_DESC', 'This will be replaced by either the default text or what you put in the "text here" with a link.');

//since 1.1.0

define('_ACA_SHOW_CRON','Use this Cron');

define('_ACA_SHOW_CRON_TIPS','Enables the cron set up upon the installation of jNews.<br>This cron was set up in http://www.ijoobi.com and will be triggered every 15 minutes');
define('_ACA_CRON_FSETTINGS' , 'Cron Settings');

define('_ACA_INSTALL_ACAUPDATEMSG' , 'Do you want to import your database from Acajoom to jNews?');
define('_ACA_INSTALL_ACAUPDATEBTN' , 'Import Acajoom Data');
define('_ACA_INSTALL_ACAUPDATENOTE' , 'NOTE : This will transfer data stored from Acajoom tables to jNews tables.');

define('_ACA_MAILING_UPDATED' , 'Mailings successfully updated.');
define('_ACA_DETAIL_UPDATED' , 'Details successfully updated.');
define('_ACA_GLOBAL_UPDATED' , 'Globals successfully updated.');
define('_ACA_SUBSCRIBER_UPDATED' , 'Subscribers successfully updated.');
define('_ACA_QUEUE_UPDATED' , 'Queues successfully updated.');
define('_ACA_LISTSUBSCRIBER_UPDATED' , 'List Subscribers successfully updated.');

define('_ACA_LIST_UPDATED_FAILED' , 'Lists failed to update!');
define('_ACA_MAILING_UPDATED_FAILED' , 'Mailings failed to update!');
define('_ACA_DETAIL_UPDATED_FAILED' , 'Details failed to update!');
define('_ACA_GLOBAL_UPDATED_FAILED' , 'Globals failed to update!');
define('_ACA_SUBSCRIBER_UPDATED_FAILED' , 'Subscribers failed to update!');
define('_ACA_QUEUE_UPDATED_FAILED' , 'Queues failed to update!');
define('_ACA_LISTSUBSCRIBER_UPDATED_FAILED' , 'List Subscribers failed to update!');

define('_ACA_LEGEND' , 'Legend');
define('_ACA_NOTVISIBLE', 'Not Visible');
define('_ACA_SCHEDULED', 'Scheduled');
define('_ACA_SUBSCRIBERS_UNREGISTERED', 'Unregistered');
define('_ACA_TEMPLATE_UPLOAD_SUCCESS', 'Successfully uploaded template' );
define('_ACA_TEMPLATE_UPLOAD_FAIL', 'Fail to upload template' );
define('_ACA_UPLOAD_ZIP_INVALID', 'Can only upload templates in zip files' );
define('_ACA_CUSTOMCSS', 'Input your Custom CSS here');
define('_ACA_TEMPLATE_ALERT', 'Template name and alias are required!');

//since 2.2.0
define('_ACA_UNSUB_NOTIFYMSG','Send Unsubscribe Notification');
define('_ACA_SEND_UNSUBNOTIFY_TIPS', 'Click Yes to send an unsubscribe notification message.');
define('_ACA_UNSUB_ADMINMESSAGE', 'Unsubscribe Notification Message');
define('_ACA_INFO_AMIN_UNSUB_NOTIFY', 'This message will be send to the Admin when a subscriber unsubscribes to one or many lists. Any message can be entered here.');

//templates
define('_ACA_CSS_TOGGLESTYLE','Toggle Styling');
define('_ACA_EXTERNALCSS_LINK','Add External CSS Link');
define('_ACA_EXTERNALCSS_PROCESS','Process');
define('_ACA_TEMP_COMBINECLASS','Combined class selector');
define('_ACA_COMBINECLASS_SUPPORT','is not supported');
define('_ACA_TEMP_COMBINECLASS_IN','in');
define('_ACA_TEMP_HTMLTAG','Found html tag ');
define('_ACA_TEMP_CONTDEV','You may contact developer for it to be added');
define('_ACA_TEMP_COMBCLASSPSEUDO','Combined pseudo-class selector');
define('_ACA_TEMP_COMBCLASSEID','or element id');

//Menus
define('_ACA_MENU_LIVE_SUPPORT','Live Support');

//Tags
define ('_ACA_SMART_TAG', 'This will be replaced by the latest created, modified and published article when you create a Smart-Newsletter type of mailing.');

//Toobar Menus
define('_ACA_DONEW_SUBSCRIBERB', 'Name and Email are required!');