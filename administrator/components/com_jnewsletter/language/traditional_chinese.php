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
define('_ACA_DESC_CORE', 'jNews 是一件讓你有效地和你的用戶及客戶通訊的郵寄名單, 電子報, 自動應答, 及跟進工具.' .
		'jNews, 你的通訊拍檔！');
define('_ACA_DESC_GPL', 'jNews 是一件讓你有效地和你的用戶及客戶通訊的郵寄名單, 電子報, 自動應答, 及跟進工具.' .
		'jNews, 你的通訊拍檔！');
define('_ACA_FEATURES', 'jNews, 你的通訊拍檔！');

// Type of lists
define('_ACA_NEWSLETTER', '電子報');
define('_ACA_AUTORESP', '自動應答');
define('_ACA_AUTORSS', '自動 RSS');
define('_ACA_ECARD', '電子卡');
define('_ACA_POSTCARD', '明信片');
define('_ACA_PERF', '效能');
define('_ACA_COUPON', '優惠券');
define('_ACA_CRON', '排程工作');
define('_ACA_MAILING', '郵件');
define('_ACA_LIST', '清單');

 //jnewsletter Menu
define('_ACA_MENU_LIST', '清單');
define('_ACA_MENU_SUBSCRIBERS', '訂閱者');
define('_ACA_MENU_NEWSLETTERS', '電子報');
define('_ACA_MENU_AUTOS', '自動應答');
define('_ACA_MENU_COUPONS', '優惠券');
define('_ACA_MENU_CRONS', '排程工作');
define('_ACA_MENU_AUTORSS', '自動-RSS');
define('_ACA_MENU_ECARD', '電子卡');
define('_ACA_MENU_POSTCARDS', '明信片');
define('_ACA_MENU_PERFS', '效能');
define('_ACA_MENU_TAB_LIST', '清單');
define('_ACA_MENU_MAILING_TITLE', '郵件');
define('_ACA_MENU_MAILING' , '郵件於');
define('_ACA_MENU_STATS', '統計');
define('_ACA_MENU_STATS_FOR', '統計於');
define('_ACA_MENU_CONF', '設定');
define('_ACA_MENU_UPDATE', '更新');
define('_ACA_MENU_ABOUT', '關於');
define('_ACA_MENU_LEARN', '教育中心');
define('_ACA_MENU_MEDIA', '媒體管理員');
define('_ACA_MENU_HELP', '說明');
define('_ACA_MENU_CPANEL', '控制台');
define('_ACA_MENU_IMPORT', '匯入');
define('_ACA_MENU_EXPORT', '匯出');
define('_ACA_MENU_SUB_ALL', '全部訂閱');
define('_ACA_MENU_UNSUB_ALL', '取消全部訂閱');
define('_ACA_MENU_VIEW_ARCHIVE', '封存');
define('_ACA_MENU_PREVIEW', '預覽');
define('_ACA_MENU_SEND', '發送');
define('_ACA_MENU_SEND_TEST', '發送測試電郵');
define('_ACA_MENU_SEND_QUEUE', '指令佇列');
define('_ACA_MENU_VIEW', '檢視');
define('_ACA_MENU_COPY', '複製');
define('_ACA_MENU_VIEW_STATS' , '檢視統計');
define('_ACA_MENU_CRTL_PANEL' , ' 控制台');
define('_ACA_MENU_LIST_NEW' , ' 建立清單');
define('_ACA_MENU_LIST_EDIT' , ' 編輯清單');
define('_ACA_MENU_BACK', '返回');
define('_ACA_MENU_INSTALL', '安裝');
define('_ACA_MENU_TAB_SUM', '概覽');
define('_ACA_STATUS' , '狀況');

// messages
define('_ACA_ERROR' , ' 發生了錯誤! ');
define('_ACA_SUB_ACCESS' , '存取權限');
define('_ACA_DESC_CREDITS', '製作人員');
define('_ACA_DESC_INFO', '資訊');
define('_ACA_DESC_HOME', '首頁');
define('_ACA_DESC_MAILING', '郵件清單');
define('_ACA_DESC_SUBSCRIBERS', '訂閱者');
define('_ACA_PUBLISHED','已發佈');
define('_ACA_UNPUBLISHED','未發佈');
define('_ACA_DELETE','刪除');
define('_ACA_FILTER','過濾器');
define('_ACA_UPDATE','更近');
define('_ACA_SAVE','儲存');
define('_ACA_CANCEL','取消');
define('_ACA_NAME','名稱');
define('_ACA_EMAIL','電郵');
define('_ACA_SELECT','選擇');
define('_ACA_ALL','全部');
define('_ACA_SEND_A', '發送一封 ');
define('_ACA_SUCCESS_DELETED', ' 已成功刪除');
define('_ACA_LIST_ADDED', '清單已成功建立');
define('_ACA_LIST_COPY', '清單已成功複製');
define('_ACA_LIST_UPDATED', '清單已成功更新');
define('_ACA_MAILING_SAVED', '郵件已成功儲存.');
define('_ACA_UPDATED_SUCCESSFULLY', '已成功更新.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', '訂閱者資訊');
define('_ACA_VERIFY_INFO', '請確定你傳送的連結，一些資訊缺失了.');
define('_ACA_INPUT_NAME', '名稱');
define('_ACA_INPUT_EMAIL', '電郵');
define('_ACA_RECEIVE_HTML', '接收 HTML？');
define('_ACA_TIME_ZONE', '時區');
define('_ACA_BLACK_LIST', '黑名單');
define('_ACA_REGISTRATION_DATE', '用戶註冊日期');
define('_ACA_USER_ID', '用戶 id');
define('_ACA_DESCRIPTION', '描述');
define('_ACA_ACCOUNT_CONFIRMED', '你的帳號已經啟動.');
define('_ACA_SUB_SUBSCRIBER', '訂閱者');
define('_ACA_SUB_PUBLISHER', 'Publisher');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Registered');
define('_ACA_SUBSCRIPTIONS', '你的訂閱');
define('_ACA_SEND_UNSUBCRIBE', '發送取消訂閱訊息');
define('_ACA_SEND_UNSUBCRIBE_TIPS', '點擊「是」發送取消訂閱電郵確認訊息.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', '請確認你的訂閱');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', '確認取消訂閱');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', '[NAME]你好，<br />' .
		'還差一步你便會被加到訂閱清單.  請點擊以下連結確認你的訂閱.' .
		'<br /><br />[CONFIRM]<br /><br />如有疑問請聯繫網站管理員.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', '這封電郵是確認你已經從我們的清單中取消訂閱.  我們很遺憾你決定取消訂閱, 如你決定再訂閱, 歡迎你隨時到我們的網站.  如有疑問請聯繫我們的網站管理員.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', '訂閱日期');
define('_ACA_CONFIRMED', '已確認');
define('_ACA_SUBSCRIB', '訂閱');
define('_ACA_HTML', 'HTML 郵件');
define('_ACA_RESULTS', '結果');
define('_ACA_SEL_LIST', '選擇清單');
define('_ACA_SEL_LIST_TYPE', '- 選擇清單類型 -');
define('_ACA_SUSCRIB_LIST', '所有訂閱者清單');
define('_ACA_SUSCRIB_LIST_UNIQUE', '訂閱者於 : ');
define('_ACA_NO_SUSCRIBERS', '在此清單找不到訂閱者.');
define('_ACA_COMFIRM_SUBSCRIPTION', '一封確認電郵已發送給你.  請檢查你的電郵及點擊所提供的連結.<br />' .
		'你需要確認你的電郵你的訂閱才會生效.');
define('_ACA_SUCCESS_ADD_LIST', '你已經成功加到清單.');


 // Subcription info
define('_ACA_CONFIRM_LINK', '點擊這裡確認你的訂閱');
define('_ACA_UNSUBSCRIBE_LINK', '點擊這裡從清單中取消你的訂閱');
define('_ACA_UNSUBSCRIBE_MESS', '你的電郵地址已從清單中移除');

define('_ACA_QUEUE_SENT_SUCCESS' , '所有已排期郵件已成功發送.');
define('_ACA_MALING_VIEW', '檢視所有郵件');
define('_ACA_UNSUBSCRIBE_MESSAGE', '你確定你想從清單中取消訂閱?');
define('_ACA_MOD_SUBSCRIBE', '訂閱');
define('_ACA_SUBSCRIBE', '訂閱');
define('_ACA_UNSUBSCRIBE', '取消訂閱');
define('_ACA_VIEW_ARCHIVE', '檢視封存');
define('_ACA_SUBSCRIPTION_OR', ' 或點擊這裡更新你的資訊');
define('_ACA_EMAIL_ALREADY_REGISTERED', '此電郵地址已經註冊.');
define('_ACA_SUBSCRIBER_DELETED', '訂閱者已成功刪除.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', '用戶控制台');
define('_UCP_USER_MENU', '用戶選單');
define('_UCP_USER_CONTACT', '我的訂閱');
 //jNews Cron Menu
define('_UCP_CRON_MENU', '排程工作管理');
define('_UCP_CRON_NEW_MENU', '新排程');
define('_UCP_CRON_LIST_MENU', '列出我的排程');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', '優惠券管理');
define('_UCP_COUPON_LIST_MENU', '優惠券清單');
define('_UCP_COUPON_ADD_MENU', '新增優惠券');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', '描述');
define('_ACA_LIST_T_LAYOUT', '版面設計');
define('_ACA_LIST_T_SUBSCRIPTION', '訂閱');
define('_ACA_LIST_T_SENDER', '寄件者資訊');

define('_ACA_LIST_TYPE', '清單類型');
define('_ACA_LIST_NAME', '清單名稱');
define('_ACA_LIST_ISSUE', '發行＃');
define('_ACA_LIST_DATE', '發送日期');
define('_ACA_LIST_SUB', '郵件標題');
define('_ACA_ATTACHED_FILES', '附件檔案');
define('_ACA_SELECT_LIST', '請選擇要編輯的清單!');

// Auto Responder box
define('_ACA_AUTORESP_ON', '清單類型');
define('_ACA_AUTO_RESP_OPTION', '自動應答選項');
define('_ACA_AUTO_RESP_FREQ', '訂閱者可以選擇頻率');
define('_ACA_AUTO_DELAY', '延遲（以日計）');
define('_ACA_AUTO_DAY_MIN', '最小頻率');
define('_ACA_AUTO_DAY_MAX', '最大頻率');
define('_ACA_FOLLOW_UP', '指定跟進自動應答');
define('_ACA_AUTO_RESP_TIME', '訂閱者可以選擇時間');
define('_ACA_LIST_SENDER', '列出寄件者');

define('_ACA_LIST_DESC', '清單描述');
define('_ACA_LAYOUT', '版面設計');
define('_ACA_SENDER_NAME', '寄件者名稱');
define('_ACA_SENDER_EMAIL', '寄件者電郵');
define('_ACA_SENDER_BOUNCE', '寄件者退回地址');
define('_ACA_LIST_DELAY', '延遲');
define('_ACA_HTML_MAILING', 'HTML 郵件?');
define('_ACA_HTML_MAILING_DESC', '(如果變更它, 你需要儲存及返回此頁檢視變更.)');
define('_ACA_HIDE_FROM_FRONTEND', '從首頁隱藏?');
define('_ACA_SELECT_IMPORT_FILE', '選擇要匯入的檔案');;
define('_ACA_IMPORT_FINISHED', '匯入完成');
define('_ACA_DELETION_OFFILE', '刪除檔案');
define('_ACA_MANUALLY_DELETE', '失敗, 你應該手動刪除檔案');
define('_ACA_CANNOT_WRITE_DIR', '不能寫入目錄');
define('_ACA_NOT_PUBLISHED', '不能發送郵件, 清單未發佈.');

//  List info box
define('_ACA_INFO_LIST_PUB', '點擊「是」發佈清單');
define('_ACA_INFO_LIST_NAME', '在此輸入你的清單的名稱. 你可以此名稱分辨清單.');
define('_ACA_INFO_LIST_DESC', '在此輸入你的清單的簡單描述. 你的網站訪客將會看到此描述.');
define('_ACA_INFO_LIST_SENDER_NAME', '輸入郵件寄件者的名稱. 當訂閱者從此清單收到訊息時可以看到此名稱.');
define('_ACA_INFO_LIST_SENDER_EMAIL', '輸入即將發送的訊息的電郵地址.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', '輸入用戶可以回覆到的電郵地址. 強烈建議與寄件者電郵相同, 因為如果它們不同濫發過濾器將會給予你的訊息更高的濫發排名.');
define('_ACA_INFO_LIST_AUTORESP', '選擇此清單的郵件類型. <br />' .
		'電子報: 正常電子報<br />' .
		'自動應答: 自動應答是自動定期透過網站發送的清單.');
define('_ACA_INFO_LIST_FREQUENCY', '允許用戶選擇接收清單的頻率.  這給予用戶更大的彈性.');
define('_ACA_INFO_LIST_TIME', '讓用戶選擇接收清單的喜好時間.');
define('_ACA_INFO_LIST_MIN_DAY', '定義用戶可選擇接收清單的最小頻率');
define('_ACA_INFO_LIST_DELAY', '指定此自動應答與之前一個之間延遲.');
define('_ACA_INFO_LIST_DATE', '如你想延遲發佈請指定發佈新聞清單的日期. <br /> 格式 : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', '定義用戶可選擇接收清單的最大頻率');
define('_ACA_INFO_LIST_LAYOUT', '在此輸入你的郵件清單的版面設計. 你可以在此輸入任何你的郵件的版面設計.');
define('_ACA_INFO_LIST_SUB_MESS', '此訊息將會發送到首次註冊的訂閱者. 你可以在此定義任何你喜歡的文字.');
define('_ACA_INFO_LIST_UNSUB_MESS', '此訊息將會發到到取消訂閱的訂閱者. 可在此輸入任何訊息.');
define('_ACA_INFO_LIST_HTML', '如你希望發送 HTML 郵件請選取方塊. 當訂閱時 HTML 清單時訂閱者將可以指定是否希望接收 HTML 訊息, 或純文字訊息.');
define('_ACA_INFO_LIST_HIDDEN', '點擊「是」 從前台隱藏清單, 用戶將不能訂閱但你仍可以發送郵件.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', '你要自動訂閱用戶到此清單嗎?<br /><B>新用戶:</B> 將會註冊每位註冊到網站的新用戶.<br /><B>所有用戶:</B> 將會註冊每位在資料庫的註冊用戶.<br />(所有選項支援 Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', '選擇前台存取層級. 它會對沒有權限的用戶群組顯示或隱藏郵件, 因此他們不能對它訂閱.');
define('_ACA_INFO_LIST_ACC_USER_ID', '選擇你想允許編輯的用戶群組的存取層級. 該用戶群組及以上將可以編輯郵件及透過前台或後台將它發送.');
define('_ACA_INFO_LIST_FOLLOW_UP', '如果你想自動應答一旦到達最後的訊息時移到另一訊息, 你可以在此指定跟進的自動應答.');
define('_ACA_INFO_LIST_ACA_OWNER', '這是建立清單者的 ID.');
define('_ACA_INFO_LIST_WARNING', '   此最後選項只於建立清單時啟用.');
define('_ACA_INFO_LIST_SUBJET', ' 郵件的標題.  這是訂閱者將收到的電郵的標題.');
define('_ACA_INFO_MAILING_CONTENT', '這是你想發送的電郵的主體部份.');
define('_ACA_INFO_MAILING_NOHTML', '在此輸入你想發送到選擇不接收 HTML 的訂閱者的電郵. <BR/> 注意: 如果你留空它 jNews 將會自動轉換 HTML 內容為純文字.');
define('_ACA_INFO_MAILING_VISIBLE', '點擊「是」於前台顯示郵件.');
define('_ACA_INSERT_CONTENT', '插入已存在內容');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', '優惠券成功發送！');
define('_ACA_CHOOSE_COUPON', '選擇優惠券');
define('_ACA_TO_USER', ' 到此用戶');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', '每小時');
define('_ACA_FREQ_CH2', '每 6 小時');
define('_ACA_FREQ_CH3', '每 12 小時');
define('_ACA_FREQ_CH4', '每日');
define('_ACA_FREQ_CH5', '每週');
define('_ACA_FREQ_CH6', '每月');
define('_ACA_FREQ_NONE', '無');
define('_ACA_FREQ_NEW', '新用戶');
define('_ACA_FREQ_ALL', '所有用戶');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews 排程?');
define('_ACA_LABEL_FREQ_TIPS', '如果你想使用它作為 jNews 排程點擊「是」, 點擊「否」作為任何其他的排程工作.<br />' .
		'如果你點擊「是」 你不需要指定排程地址, 它將會自動地加入.');
define('_ACA_SITE_URL' , '你的網址');
define('_ACA_CRON_FREQUENCY' , '排程頻率');
define('_ACA_STARTDATE_FREQ' , '開始日期');
define('_ACA_LABELDATE_FREQ' , '指定日期');
define('_ACA_LABELTIME_FREQ' , '指定時間');
define('_ACA_CRON_URL', '排程網址');
define('_ACA_CRON_FREQ', '頻率');
define('_ACA_TITLE_CRONLIST', '排程清單');
define('_NEW_LIST', '建立新清單');

//title CRON form
define('_ACA_TITLE_FREQ', '排程編輯');
define('_ACA_CRON_SITE_URL', '請輸入有效的網址, 以 http:// 開始');

### Mailings ###
define('_ACA_MAILING_ALL', '所有郵件');
define('_ACA_EDIT_A', '編輯 ');
define('_ACA_SELCT_MAILING', '請在下拉式選單中選擇清單以新增郵件.');
define('_ACA_VISIBLE_FRONT', '可於前台檢視');

// mailer
define('_ACA_SUBJECT', '標題');
define('_ACA_CONTENT', '內容');
define('_ACA_NAMEREP', '[NAME] = 它會被訂閱者所輸入的名稱取代, 你可以用它發送個人化電郵.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = 它會被訂閱者所輸入的名字取代.<br />');
define('_ACA_NONHTML', '非-html 版本');
define('_ACA_ATTACHMENTS', '附件');
define('_ACA_SELECT_MULTIPLE', '按住 ctrl（或命令）選擇多個附件.<br />' .
		'附件清單中顯示的檔案放在附件資料夾內, 你可以在控制台變更此位置.');
define('_ACA_CONTENT_ITEM', '內容項目');
define('_ACA_SENDING_EMAIL', '電郵發送中');
define('_ACA_MESSAGE_NOT', '訊息不能發送');
define('_ACA_MAILER_ERROR', '郵件收發機錯誤');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', '訊息已成功發送');
define('_ACA_SENDING_TOOK', '發送此郵件用了');
define('_ACA_SECONDS', '秒');
define('_ACA_NO_ADDRESS_ENTERED', '無提供電郵地址或訂閱者');
define('_ACA_CHANGE_SUBSCRIPTIONS', '變更');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', '變更你的訂閱');
define('_ACA_WHICH_EMAIL_TEST', '指出發送測試或選擇預覽的電郵地址');
define('_ACA_SEND_IN_HTML', '以 HTML 發送（只限 html 郵件）？');
define('_ACA_VISIBLE', '可檢視');
define('_ACA_INTRO_ONLY', '只有簡介');

// stats
define('_ACA_GLOBALSTATS', '全域統計');
define('_ACA_DETAILED_STATS', '詳細統計');
define('_ACA_MAILING_LIST_DETAILS', '列出詳情');
define('_ACA_SEND_IN_HTML_FORMAT', '以 HTML 格式發送');
define('_ACA_VIEWS_FROM_HTML', '檢視（自 html 郵件）');
define('_ACA_SEND_IN_TEXT_FORMAT', '以純文字格式發送');
define('_ACA_HTML_READ', 'HTML 已閱讀');
define('_ACA_HTML_UNREAD', 'HTML 未閱讀');
define('_ACA_TEXT_ONLY_SENT', '純文字');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', '郵寄');
define('_ACA_LOGGING_CONFIG', '紀錄及統計');
define('_ACA_SUBSCRIBER_CONFIG', '訂閱者');
define('_ACA_MISC_CONFIG', '雜項');
define('_ACA_MAIL_SETTINGS', '郵寄設定');
define('_ACA_MAILINGS_SETTINGS', '郵件設定');
define('_ACA_SUBCRIBERS_SETTINGS', '訂閱者設定');
define('_ACA_CRON_SETTINGS', '排程設定');
define('_ACA_SENDING_SETTINGS', '發送設定');
define('_ACA_STATS_SETTINGS', '統計設定');
define('_ACA_LOGS_SETTINGS', '紀錄設定');
define('_ACA_MISC_SETTINGS', '雜項設定');
// mail settings
define('_ACA_SEND_MAIL_FROM', '寄件者電郵');
define('_ACA_SEND_MAIL_NAME', '寄件者名稱');
define('_ACA_MAILSENDMETHOD', '郵件收發機模式');
define('_ACA_SENDMAILPATH', 'Sendmail 路徑');
define('_ACA_SMTPHOST', 'SMTP 主機');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP 需要驗證');
define('_ACA_SMTPAUTHREQUIRED_TIPS', '如你的 SMTP 伺服器需要驗證, 選擇「是」');
define('_ACA_SMTPUSERNAME', 'SMTP 用戶名稱');
define('_ACA_SMTPUSERNAME_TIPS', '如你的 SMTP 伺服器需要驗證, 輸入 SMTP 用戶名稱');
define('_ACA_SMTPPASSWORD', 'SMTP 密碼');
define('_ACA_SMTPPASSWORD_TIPS', '如你的 SMTP 伺服器需要驗證, 輸入 SMTP 密碼');
define('_ACA_USE_EMBEDDED', '使用內嵌圖像');
define('_ACA_USE_EMBEDDED_TIPS', '如附加在內容項目的圖像是內嵌在 html 訊息電郵, 選擇「是」; 使用預設圖像標籤連結到網站圖像, 選擇「否」.');
define('_ACA_UPLOAD_PATH', '上載/附件路徑');
define('_ACA_UPLOAD_PATH_TIPS', '你可以指定上載目錄.<br />' .
		'確定你指定的目錄已存在, 否則建立它.');

// subscribers settings
define('_ACA_ALLOW_UNREG', '允許未註冊');
define('_ACA_ALLOW_UNREG_TIPS', '如你想允許用戶無需註冊到網站便可訂閱到清單, 選擇「是」.');
define('_ACA_REQ_CONFIRM', '需要確認');
define('_ACA_REQ_CONFIRM_TIPS', '如你需要未註冊訂閱者確認他們的電郵地址, 選擇「是」.');
define('_ACA_SUB_SETTINGS', '訂閱設定');
define('_ACA_SUBMESSAGE', '訂閱電郵');
define('_ACA_SUBSCRIBE_LIST', '訂閱到清單');

define('_ACA_USABLE_TAGS', '可用的標籤');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = 它建立可點擊連結使訂閱者可以確認他們的訂閱. 這是讓 jNews 正常運作所<strong>必須的</strong>.<br />'
.'<br />[NAME] = 它會被訂閱者所輸入的名稱取代, 你可以用它發送個人化電郵.<br />'
.'<br />[FIRSTNAME] = 它會被訂閱者所輸入的名字取代, 名字是由訂閱者定義.<br />');
define('_ACA_CONFIRMFROMNAME', '確認寄件者名稱');
define('_ACA_CONFIRMFROMNAME_TIPS', '輸入顯示在確認清單的寄件者名稱.');
define('_ACA_CONFIRMFROMEMAIL', '寄件者電郵確認');
define('_ACA_CONFIRMFROMEMAIL_TIPS', '輸入顯示在確認清單的電郵地址.');
define('_ACA_CONFIRMBOUNCE', '退回地址');
define('_ACA_CONFIRMBOUNCE_TIPS', '輸入顯示在確認清單的退回地址.');
define('_ACA_HTML_CONFIRM', 'HTML 確認');
define('_ACA_HTML_CONFIRM_TIPS', '如用戶允許 html 確認清單便是 html, 選擇「是」.');
define('_ACA_TIME_ZONE_ASK', '詢問時區');
define('_ACA_TIME_ZONE_TIPS', '如你想詢問用戶的時區, 選擇「是」. 適用時排程郵件會按時區發送');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', '排程');
define('_ACA_TIME_OFFSET_URL', '點擊這裡在全域設定控制台 -> 地區分頁設定時差');
define('_ACA_TIME_OFFSET_TIPS', '設定你的伺服器時差使紀錄日期及時間準確');
define('_ACA_TIME_OFFSET', '時差');
define('_ACA_CRON_DESC','<br />使用排程功能你可以為你的 Joomla 網站設定自動化工作!<br />' .
		'要設定你需要在你的控制台 crontab 新增以下指令:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />如需協助設定或有問題請咨詢我們的討論區 <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');
// sending settings
define('_ACA_PAUSEX', '每設定數量電郵等待ｘ秒');
define('_ACA_PAUSEX_TIPS', '輸入 jNews 將會給予 SMTP 伺服器在執行下一設定數量訊息前發送訊息的時間秒數.');
define('_ACA_EMAIL_BET_PAUSE', '電郵之間暫停');
define('_ACA_EMAIL_BET_PAUSE_TIPS', '暫停前要發送的電郵數目.');
define('_ACA_WAIT_USER_PAUSE', '暫停時等待用戶輸入');
define('_ACA_WAIT_USER_PAUSE_TIPS', '當郵件組之間暫停時程式是否應等待用戶輸入.');
define('_ACA_SCRIPT_TIMEOUT', '程式逾時');
define('_ACA_SCRIPT_TIMEOUT_TIPS', '程式可執行分鐘時數（０代表不限）.');
// Stats settings
define('_ACA_ENABLE_READ_STATS', '允許閱讀統計');
define('_ACA_ENABLE_READ_STATS_TIPS', '如你想紀錄檢視數目, 選擇「是」. 此技術只可用於 html 郵件');
define('_ACA_LOG_VIEWSPERSUB', '紀錄每位訂閱者檢視');
define('_ACA_LOG_VIEWSPERSUB_TIPS', '如你想紀錄每位訂閱者的檢視數目, 選擇「是」. 此技術只可用於 html 郵件');
// Logs settings
define('_ACA_DETAILED', '詳細紀錄');
define('_ACA_SIMPLE', '簡單紀錄');
define('_ACA_DIAPLAY_LOG', '顯示紀錄');
define('_ACA_DISPLAY_LOG_TIPS', '如你想在發送郵件時顯示紀錄, 選擇「是」.');
define('_ACA_SEND_PERF_DATA', '發送效能');
define('_ACA_SEND_PERF_DATA_TIPS', '如你想允許 jNews 發送你的設定、清單上訂閱者數目及發送郵件所消耗時間的暱名報告, 選擇「是」. 這讓我們更了解 jNews 的效能及幫助我們改進 jNews 將來的開發.');
define('_ACA_SEND_AUTO_LOG', '發送自動應答紀錄');
define('_ACA_SEND_AUTO_LOG_TIPS', '如你想每次執行排程時發送電郵紀錄, 選擇「是」.  警告: 這可導致大量電郵.');
define('_ACA_SEND_LOG', '發送紀錄');
define('_ACA_SEND_LOG_TIPS', '是否電郵郵件紀錄到發送郵件的用戶的電郵地址.');
define('_ACA_SEND_LOGDETAIL', '發送詳細紀錄');
define('_ACA_SEND_LOGDETAIL_TIPS', '詳細紀錄包括每位訂閱者的成功及失敗資訊及資訊概覽. 簡單紀錄只發送概覽.');
define('_ACA_SEND_LOGCLOSED', '如連線關閉發送紀錄');
define('_ACA_SEND_LOGCLOSED_TIPS', '有了此選項, 發送郵件的用戶仍會接收到報告電郵.');
define('_ACA_SAVE_LOG', '儲存紀錄');
define('_ACA_SAVE_LOG_TIPS', '是否附加郵件紀錄到紀錄檔.');
define('_ACA_SAVE_LOGDETAIL', '儲存詳細紀錄');
define('_ACA_SAVE_LOGDETAIL_TIPS', '詳細紀錄包括每位訂閱者的成功及失敗資訊及資訊概覽. 簡單紀錄只發送概覽.');
define('_ACA_SAVE_LOGFILE', '儲存紀錄檔');
define('_ACA_SAVE_LOGFILE_TIPS', '紀錄資訊所附加到的檔案. 此檔案可能變得很大.');
define('_ACA_CLEAR_LOG', '清除紀錄');
define('_ACA_CLEAR_LOG_TIPS', '清除紀錄檔.');

### control panel
define('_ACA_CP_LAST_QUEUE', '最後執行排程');
define('_ACA_CP_TOTAL', '合共');
define('_ACA_MAILING_COPY', '成功複製郵件！');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', '顯示指南');
define('_ACA_SHOW_GUIDE_TIPS', '在開始時顯示指南協助新用戶建立電子報, 自動應答及正確地設定 jNews.');
define('_ACA_AUTOS_ON', '使用自動應答');
define('_ACA_AUTOS_ON_TIPS', '如你不想使用自動應答, 選擇「否」, 所有自動應答選項將會關閉.');
define('_ACA_NEWS_ON', '使用電子報');
define('_ACA_NEWS_ON_TIPS', '如你不想使用電子報, 選擇「否」, 所有電子報選項將會關閉.');
define('_ACA_SHOW_TIPS', '顯示提示');
define('_ACA_SHOW_TIPS_TIPS', '顯示提示, 協助用戶更有效地使用 jNews.');
define('_ACA_SHOW_FOOTER', '顯示註腳');
define('_ACA_SHOW_FOOTER_TIPS', '是否顯示註腳版權通告.');
define('_ACA_SHOW_LISTS', '在前台顯示清單');
define('_ACA_SHOW_LISTS_TIPS', '當用戶未註冊時顯示他們可訂閱的電子報清單及封存按鈕或簡單地顯示登入表單讓他們註冊.');
define('_ACA_CONFIG_UPDATED', '設定詳情已更新！');
define('_ACA_UPDATE_URL', '更新網址');
define('_ACA_UPDATE_URL_WARNING', '警告！除非是 jNews 技術團隊提出，否則不要變更此網址.<br />');
define('_ACA_UPDATE_URL_TIPS', '例如：http://www.ijoobi.com/update/（包括結尾斜線）');

// module
define('_ACA_EMAIL_INVALID', '所輸入的電郵無效.');
define('_ACA_REGISTER_REQUIRED', '在你訂閱清單前請先到網站註冊.');

// Access level box
define('_ACA_OWNER', '清單建立者:');
define('_ACA_ACCESS_LEVEL', '設定清單存取層級');
define('_ACA_ACCESS_LEVEL_OPTION', '存取層級選項');
define('_ACA_USER_LEVEL_EDIT', '選擇哪個用戶層級允許編輯郵件 (從前台或後台) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', '每日');
define('_ACA_AUTO_DAY_CH2', '每日，除了週末');
define('_ACA_AUTO_DAY_CH3', '每一其他日子');
define('_ACA_AUTO_DAY_CH4', '每一其他日子, 除了週末');
define('_ACA_AUTO_DAY_CH5', '每週');
define('_ACA_AUTO_DAY_CH6', '雙週');
define('_ACA_AUTO_DAY_CH7', '每月');
define('_ACA_AUTO_DAY_CH9', '每年');
define('_ACA_AUTO_OPTION_NONE', '無');
define('_ACA_AUTO_OPTION_NEW', '新用戶');
define('_ACA_AUTO_OPTION_ALL', '所有用戶');

//
define('_ACA_UNSUB_MESSAGE', '取消訂閱電郵');
define('_ACA_UNSUB_SETTINGS', '取消訂閱設定');
define('_ACA_AUTO_ADD_NEW_USERS', '自動訂閱用戶?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', '暫時沒有可用更新.');
define('_ACA_VERSION', 'jNews 版本');
define('_ACA_NEED_UPDATED', '需要更新的檔案:');
define('_ACA_NEED_ADDED', '需要新增的檔案：');
define('_ACA_NEED_REMOVED', '需要移除的檔案：');
define('_ACA_FILENAME', '檔案名稱：');
define('_ACA_CURRENT_VERSION', '現在版本：');
define('_ACA_NEWEST_VERSION', '最新版本：');
define('_ACA_UPDATING', '更新中');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', '檔案成功更新.');
define('_ACA_UPDATE_FAILED', '更新失敗！');
define('_ACA_ADDING', '新增中');
define('_ACA_ADDED_SUCCESSFULLY', '新增成功.');
define('_ACA_ADDING_FAILED', '新增失敗！');
define('_ACA_REMOVING', '移除中');
define('_ACA_REMOVED_SUCCESSFULLY', '移除成功.');
define('_ACA_REMOVING_FAILED', '移除失敗！');
define('_ACA_INSTALL_DIFFERENT_VERSION', '安裝不同版本');
define('_ACA_CONTENT_ADD', '新增內容');
define('_ACA_UPGRADE_FROM', '匯入資料（電子報及訂閱者資訊）自 ');
define('_ACA_UPGRADE_MESS', '此程序只簡單地匯入資料到 jNews 資料庫. <br /> 對你現存的資料不會構成風險.');
define('_ACA_CONTINUE_SENDING', '繼續發送');

// jNews message
define('_ACA_UPGRADE1', '你可以簡易地於更新控制台匯入你的用戶及電子報從 ');
define('_ACA_UPGRADE2', ' 到 jNews.');
define('_ACA_UPDATE_MESSAGE', '有新版本的 jNews！');
define('_ACA_UPDATE_MESSAGE_LINK', '點擊這裡更新!');
define('_ACA_THANKYOU', '多謝選擇 jNews, 你的通訊拍檔！');
define('_ACA_NO_SERVER', '更新伺服器暫停, 請稍後再嘗試.');
define('_ACA_MOD_PUB', 'jNews 模組未發佈.');
define('_ACA_MOD_PUB_LINK', '點擊這裡發佈它！');
define('_ACA_IMPORT_SUCCESS', '成功匯入');
define('_ACA_IMPORT_EXIST', '訂閱者已經於資料庫');

// jNews\'s Guide
define('_ACA_GUIDE', '精靈');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews 有很多強大的功能, 此精露會引導你渡過四個簡單步驟, 讓你開始發送你的電子報及自動應答！<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', '首先, 你需要新增清單.  清單有兩類, 電子報或自動應答.' .
		'  於清單內你需定定義所有不同參數才能發送你的電子報或自動應答: 寄件者名稱, 版面設計, 訂閱者歡迎辭等...
<br /><br />你可以在這裡設立你的首張清單: <a href="index2.php?option=com_jnewsletter&amp;act=list" >建立清單</a> 及點擊新增按鈕.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews 給你提供簡易途徑從之前的電子報系統匯入所有資料.<br />' .
		' 前往更新控制台及選擇你之前的電子報系統匯入所有你的電子報及訂閱者.<br /><br />' .
		'<span style="color:#FF5E00;" >重要: 匯入是沒有風險的及不會影響你之前電子報系統的資料</span><br />' .
		'匯入後你將可以直接從 jNews 管理你的訂閱者及郵件.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', '你的首張清單已建立!  你現在可以撰寫你的首項%s.  要建立它前往: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', '自動應答管理');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', '電子報管理');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', '及選擇你的%s. <br /> 然後在下拉式清單選擇你的%s.  點擊新增建立你的首項郵件');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', '在你發送你的首項電子報前你可能需要檢查郵寄設定.  ' .
		'前往 <a href="index2.php?option=com_jnewsletter&amp;act=configuration" >設定頁</a> 確認郵寄設定. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />當你準備好, 返回電子報選單, 選擇你的郵件及點擊發送');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', '你需要先於你的伺服器設定排程工作, 才能發送你的自動應答. ' .
		' 請參考控制台排程分頁.' .
		' <a href="index2.php?option=com_jnewsletter&amp;act=configuration" >點擊這裡</a> 學習關於設定排程工作. <br />');

define('_ACA_GUIDE_MODULE', ' <br />確定你已發佈 jNews 模組讓人們可以註冊清單.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' 你現在亦可以設定自動應答.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' 你現在亦可以設定電子報.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />瞧! 你已準備好有效地與你的訪客及用戶通訊. 當你輸入第二項郵件時此精露將會結束或你可以於 <a href="index2.php?option=com_jnewsletter&act=configuration" >控制台</a> 關閉它.' .
		'<br /><br />  當你使用 jNews 時如有任何問題, 請參考 ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >討論區</a>. ' .
		' 你亦可以到<a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a> 找到更多關於如何有效與你的訂閱者通訊的資訊 .' .
		'<p /><br /><b>感謝你使用 jNews. 你的通訊拍檔!</b> ');
define('_ACA_GUIDE_TURNOFF', '精靈現在關閉!');
define('_ACA_STEP', '步驟 ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews 設定');
define('_ACA_INSTALL_SUCCESS', '安裝成功');
define('_ACA_INSTALL_ERROR', '安裝錯誤');
define('_ACA_INSTALL_BOT', 'jNews 插件（Bot）');
define('_ACA_INSTALL_MODULE', 'jNews 模組');
//Others
define('_ACA_JAVASCRIPT','!警告! Javascript 必須啟用才可正常運作.');
define('_ACA_EXPORT_TEXT','訂閱者是基於你所選清單匯出. <br />匯出訂閱者到清單');
define('_ACA_IMPORT_TIPS','匯入訂閱者. 檔案內資訊需要是以下格式: <br />' .
		'名稱,電郵,接收HTML(1/0),<span style="color: rgb(255, 0, 0);">已確定(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', '已經是訂閱者');
define('_ACA_GET_STARTED', '點擊這裡開始!');

//News since 1.0.1
define('_ACA_WARNING_1011','警告: 1011: 因你的伺服器限制不能更新.');
define('_ACA_SEND_MAIL_FROM_TIPS', '選擇寄件者顯示哪個電郵地址.');
define('_ACA_SEND_MAIL_NAME_TIPS', '選擇寄件者顯示什麼名稱.');
define('_ACA_MAILSENDMETHOD_TIPS', '選擇使用哪個郵件收發機: PHP 郵寄功能, <span>Sendmail</span> 或 SMTP 伺服器.');
define('_ACA_SENDMAILPATH_TIPS', '這是郵件伺服器目錄');
define('_ACA_LIST_T_TEMPLATE', '佈景主題');
define('_ACA_NO_MAILING_ENTERED', '無提供寄件');
define('_ACA_NO_LIST_ENTERED', '無提供清單');
define('_ACA_SENT_MAILING' , '已發送郵件');
define('_ACA_SELECT_FILE', '請選擇檔案 ');
define('_ACA_LIST_IMPORT', '檢查你想與訂閱者關聯連的清單.');
define('_ACA_PB_QUEUE', '訂閱者已插入但連接它到清單時出現問題. 請手動檢查.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , '強烈建議更新！');
define('_ACA_UPDATE_MESS2' , '補丁及輕微修正.');
define('_ACA_UPDATE_MESS3' , '新版本.');
define('_ACA_UPDATE_MESS5' , '更新需要 Joomla 1.5.');
define('_ACA_UPDATE_IS_AVAIL' , ' 已經推出!');
define('_ACA_NO_MAILING_SENT', '無發送郵件!');
define('_ACA_SHOW_LOGIN', '顯示登入表單');
define('_ACA_SHOW_LOGIN_TIPS', '選擇「是」於 jNews 控制台前台顯示登入表單使用戶能註冊到網站.');
define('_ACA_LISTS_EDITOR', '列出描述編輯');
define('_ACA_LISTS_EDITOR_TIPS', '選擇「是」使用 HTML 編輯器編輯清單描述欄.');
define('_ACA_SUBCRIBERS_VIEW', '檢視訂閱者');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , '前台設定' );
define('_ACA_SHOW_LOGOUT', '顯示登出按鈕');
define('_ACA_SHOW_LOGOUT_TIPS', '選擇「是」在前台 jNews 控制台顯示登出按鈕.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', '整合');
define('_ACA_CB_INTEGRATION', 'Community Builder 整合');
define('_ACA_INSTALL_PLUGIN', 'Community Builder 插件（jNews 整合）');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', '未安裝 jNews 的 Community Builder 插件!');
define('_ACA_CB_PLUGIN', '於註冊表顯示清單');
define('_ACA_CB_PLUGIN_TIPS', '選擇「是」於 community builder 註冊表格顯示郵件清單');
define('_ACA_CB_LISTS', '清單 ID');
define('_ACA_CB_LISTS_TIPS', '這是必填欄位. 以逗號分隔輸入你想允許用戶訂閱的清單的 id 號碼 (0 顯示所有清單)');
define('_ACA_CB_INTRO', '介紹文字');
define('_ACA_CB_INTRO_TIPS', '清單列出前將顯示的文字. 留空則不顯示任何文字.  你可使用 HTML 標籤自訂外觀及感覺.');
define('_ACA_CB_SHOW_NAME', '顯示清單名稱');
define('_ACA_CB_SHOW_NAME_TIPS', '選擇簡介後是否顯示清單名稱.');
define('_ACA_CB_LIST_DEFAULT', '預設剔選清單');
define('_ACA_CB_LIST_DEFAULT_TIPS', '選擇是否讓每個清單的方塊預設為已點選.');
define('_ACA_CB_HTML_SHOW', '顯示接收 HTML');
define('_ACA_CB_HTML_SHOW_TIPS', '選擇「是」允許用戶決定他們想接收 HTML 電郵與否. 選擇「否」使用預設接收 html.');
define('_ACA_CB_HTML_DEFAULT', '預設接收 HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', '設定此項顯示預設 html 郵件設定. 如顯示接收 HTML 設定為「否」此選項將為預設.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', '不能備份檔案! 檔案沒有被替代.');
define('_ACA_BACKUP_YOUR_FILES', '檔案的舊版本已備份到以下目錄:');
define('_ACA_SERVER_LOCAL_TIME', '伺服器本機時間');
define('_ACA_SHOW_ARCHIVE', '顯示封存按鈕');
define('_ACA_SHOW_ARCHIVE_TIPS', '選擇「是」於前台電子報清單顯示封存按鈕');
define('_ACA_LIST_OPT_TAG', '標籤');
define('_ACA_LIST_OPT_IMG', '圖像');
define('_ACA_LIST_OPT_CTT', '內容');
define('_ACA_INPUT_NAME_TIPS', '輸入你的全名（名字先）');
define('_ACA_INPUT_EMAIL_TIPS', '輸入你的電郵地址（如你想接收我們的郵件, 請確定這是有效的電郵地址.）');
define('_ACA_RECEIVE_HTML_TIPS', '如你想接收 HTML 郵件, 選擇「是」－純文字郵件，選擇「否」');
define('_ACA_TIME_ZONE_ASK_TIPS', '指定你的時區.');

// Since 1.0.5
define('_ACA_FILES' , '檔案');
define('_ACA_FILES_UPLOAD' , '上載');
define('_ACA_MENU_UPLOAD_IMG' , '上載圖像');
define('_ACA_TOO_LARGE' , '檔案太大. 最大限制是');
define('_ACA_MISSING_DIR' , '目的地目錄不存在');
define('_ACA_IS_NOT_DIR' , '目的地目錄不存在或是普通檔案.');
define('_ACA_NO_WRITE_PERMS' , '目的地目錄沒有寫入權限.');
define('_ACA_NO_USER_FILE' , '你沒有選擇要上載的檔案.');
define('_ACA_E_FAIL_MOVE' , '不可能移動檔案.');
define('_ACA_FILE_EXISTS' , '目的地檔案已經存在.');
define('_ACA_CANNOT_OVERWRITE' , '目的地檔案已存在及不能被覆蓋.');
define('_ACA_NOT_ALLOWED_EXTENSION' , '檔案類型不被允許.');
define('_ACA_PARTIAL' , '檔案只是部份被上載.');
define('_ACA_UPLOAD_ERROR' , '上載錯誤:');
define('DEV_NO_DEF_FILE' , '檔案只是部份被上載.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = 它會被訂閱連結取代.' .
		' 這是 <strong>必填的</strong> jNews 才能正常運作.<br />' .
		'如你在此方塊放置其他內容, 它會在所有相應到此清單的郵件內顯示.' .
		' <br />新增你的訂閱訊息於結尾.  jNews 會自動為訂閱者新增變更資訊及取消訂閱連結.');

// since 1.0.6
define('_ACA_NOTIFICATION', '通知');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', '通知');
define('_ACA_USE_SEF', '於郵件開啟友善搜尋');
define('_ACA_USE_SEF_TIPS', '建議你選擇「否」.  但如你想你的郵件所包含的網址都使用 SEF, 則選擇「是」.' .
		' <br /><b>連結在兩種選項下均可運作.  選擇「否」確保郵件中連結總是運作, 即使你變更了你的 SEF.</b> ');
define('_ACA_ERR_NB' , '錯誤 #: ERR');
define('_ACA_ERR_SETTINGS', '錯誤處理設定');
define('_ACA_ERR_SEND' ,'發送錯誤報告');
define('_ACA_ERR_SEND_TIPS' ,'如你想 jNews 更完善請選擇「是」.  它會發送錯誤報告給我們.  故此你甚至不需要再報告臭蟲 ;-) <br /> <b>不會發送任何私人資訊</b>.  我們甚至不知道錯誤從哪個網址送來. 我們只發送關於 jNews 的資訊, PHP 設定及 SQL 詢問. ');
define('_ACA_ERR_SHOW_TIPS' ,'選擇「是」於螢幕顯示錯誤編號.  主要用作除錯作用. ');
define('_ACA_ERR_SHOW' ,'顯示錯誤');
define('_ACA_LIST_SHOW_UNSUBCRIBE', '顯示取消訂閱連結');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', '選擇「是」於郵件底部顯示取消連結讓用戶變更他們的訂閱. <br /> 選擇「否」關閉註腳及連結.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">重要通告！</span> <br />如你是從之前的  jNews 安裝升級，你需要點擊以下按鈕升級你的資料庫結構（你的資料會完整保留）');
define('_ACA_UPDATE_INSTALL_BTN' , '升級表格及設定');
define('_ACA_MAILING_MAX_TIME', '最大排程時間' );
define('_ACA_MAILING_MAX_TIME_TIPS', '定義每組排程發送電郵的最大時間. 建議在 30 秒至 2 分鐘之間.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart 整合');
define('_ACA_VM_COUPON_NOTIF', '優惠券通知 ID');
define('_ACA_VM_COUPON_NOTIF_TIPS', '指定你想用作發送優惠券到你的顧客的郵件 ID 號碼.');
define('_ACA_VM_NEW_PRODUCT', '新產品通知 ID');
define('_ACA_VM_NEW_PRODUCT_TIPS', '指定你想用作發送新產品通知的郵件 ID 號碼.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', '建立表單');
define('_ACA_FORM_COPY', 'HTML 編碼');
define('_ACA_FORM_COPY_TIPS', '複製所產生的 HTML 編碼到你的 HTML 頁.');
define('_ACA_FORM_LIST_TIPS', '選擇你想包括表單的清單');
// update messages
define('_ACA_UPDATE_MESS4' , '不能自動更新.');
define('_ACA_WARNG_REMOTE_FILE' , '不能取得遠端檔案.');
define('_ACA_ERROR_FETCH' , '頡取檔案錯誤.');

define('_ACA_CHECK' , '檢查');
define('_ACA_MORE_INFO' , '更多資訊');
define('_ACA_UPDATE_NEW' , '更新到新版本');
define('_ACA_UPGRADE' , '升級到更高檔產品');
define('_ACA_DOWNDATE' , '返回之前版本');
define('_ACA_DOWNGRADE' , '返回基本產品');
define('_ACA_REQUIRE_JOOM' , '需要 Joomla');
define('_ACA_TRY_IT' , '嘗試它！');
define('_ACA_NEWER', '較新的');
define('_ACA_OLDER', '較舊的');
define('_ACA_CURRENT', '現在的');

// since 1.0.9
define('_ACA_CHECK_COMP', '嘗試其他元件');
define('_ACA_MENU_VIDEO' , '影片教學');
define('_ACA_SCHEDULE_TITLE', '自動日程功能設定');
define('_ACA_ISSUE_NB_TIPS' , '發行編號自動由系統產生' );
define('_ACA_SEL_ALL' , '所有郵件');
define('_ACA_SEL_ALL_SUB' , '所有清單');
define('_ACA_INTRO_ONLY_TIPS' , '如你只點選此方塊, 插入到郵件的文章簡介將會附有「詳細內容...」連結到完整文章.' );
define('_ACA_TAGS_TITLE' , '內容標籤');
define('_ACA_TAGS_TITLE_TIPS' , '複製及貼上此標籤到郵件中你想放置內容的位置.');
define('_ACA_PREVIEW_EMAIL_TEST', '指定發送測試到這個電郵地址');
define('_ACA_PREVIEW_TITLE' , '預覽');
define('_ACA_AUTO_UPDATE' , '更新通知');
define('_ACA_AUTO_UPDATE_TIPS' , '如欲當元件有更新時通知你, 選擇「是」. <br />重要!! 此功能需要開啟提示.');

// since 1.1.0
define('_ACA_LICENSE' , '授權合約資訊');

// since 1.1.1
define('_ACA_NEW' , '新');
define('_ACA_SCHEDULE_SETUP', '你需要於設定設定日程表, 才可發送自動應答.');
define('_ACA_SCHEDULER', '日程表');
define('_ACA_JNEWSLETTER_CRON_DESC' , '如你沒有你網站排程工作管理員的存取權限, 你可以註冊免費的 jNews Cron 戶口於:' );
define('_ACA_CRON_DOCUMENTATION' , '你可以於以下網址找到更多設定 jNews 日程表資料:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>' );
define( '_ACA_QUEUE_PROCESSED' , '成功執行排程...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , '移動匯入檔案錯誤' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , '日程表頻率' );
define( '_ACA_CRON_MAX_FREQ' , '日程表最大頻率' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , '指定日程表可執行的最大頻率（分鐘）.  它會限制日程表即使排程工作設定更高頻率.' );
define( '_ACA_CRON_MAX_EMAIL' , '每件工作最大電郵' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , '指定每項工作的最大發送電郵數目（0 無限）.' );
define( '_ACA_CRON_MINUTES' , ' 分鐘' );
define( '_ACA_SHOW_SIGNATURE' , '顯示電郵註腳' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , '你是否想於電郵註腳推廣 jNews.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , '自動應答成功執行...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , '已排程電子報成功執行...' );
define( '_ACA_MENU_SYNC_USERS' , '同步用戶' );
define( '_ACA_SYNC_USERS_SUCCESS' , '成功同步用戶！' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', '登出' );
if (!defined('_CMN_YES')) define( '_CMN_YES', '是' );
if (!defined('_CMN_NO')) define( '_CMN_NO', '否' );
if (!defined('_HI')) define( '_HI', '你好' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', '頂部' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', '底部' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', '登出' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , '如你選擇它, 只有插入到郵件的文章標題會連結到完整文章.');
define('_ACA_TITLE_ONLY' , '只有標題');
define('_ACA_FULL_ARTICLE_TIPS' , '如你選擇它, 完整文章會插入到郵件');
define('_ACA_FULL_ARTICLE' , '完整文章');
define('_ACA_CONTENT_ITEM_SELECT_T', '選擇附加到訊息的內容項目. <br />複製及貼上 <b>內容標籤</b> 到郵件.  你可 (分別地用 0, 1, 或 2) 選擇完整文章, 只有簡介, 或只有標題. ');
define('_ACA_SUBSCRIBE_LIST2', '郵件清單');

// smart-newsletter function
define('_ACA_AUTONEWS', '智能-電子報');
define('_ACA_MENU_AUTONEWS', '智能-電子報');
define('_ACA_AUTO_NEWS_OPTION', '智能-電子報選項');
define('_ACA_AUTONEWS_FREQ', '電子報頻率');
define('_ACA_AUTONEWS_FREQ_TIPS', '指定你想發送智能-電子報的頻率.');
define('_ACA_AUTONEWS_SECTION', '文章單元');
define('_ACA_AUTONEWS_SECTION_TIPS', '指定你想選擇文章來自哪個單元.');
define('_ACA_AUTONEWS_CAT', '文章分類');
define('_ACA_AUTONEWS_CAT_TIPS', '指定你想選擇文章來自哪個分類 (該單元內所有文章).');
define('_ACA_SELECT_SECTION', '選擇單元');
define('_ACA_SELECT_CAT', '所有分類');
define('_ACA_AUTO_DAY_CH8', '季度的');
define('_ACA_AUTONEWS_STARTDATE', '開始日期');
define('_ACA_AUTONEWS_STARTDATE_TIPS', '指定你想開始發送智能-電子報的日期.');
define('_ACA_AUTONEWS_TYPE', '內容翻譯');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', '完整文章: 將於電子報包含完整文章.<br />' .
		'只有簡介: 將於電子報包含只有文章的簡介.<br/>' .
		'只有標題: 將於電子報包含只有文章的標題.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = 它會由智能-電子報取代.' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', '建立 / 檢視郵件');
define('_ACA_LICENSE_CONFIG' , '授權合約' );
define('_ACA_ENTER_LICENSE' , '輸入授權合約');
define('_ACA_ENTER_LICENSE_TIPS' , '輸入你的授權合約號碼及儲存它.');
define('_ACA_LICENSE_SETTING' , '授權合約設定' );
define('_ACA_GOOD_LIC' , '你的授權合約有效.' );
define('_ACA_NOTSO_GOOD_LIC' , '你的授權合約無效：' );
define('_ACA_PLEASE_LIC' , '請聯絡 jNews 支援升級你的授權合約（license@ijoobi.com）.' );
define('_ACA_DESC_PLUS', 'jNews Plus 是首個 Joomla CMS 的自動應答.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO 是 Joomla CMS 的終極郵件系統.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , '輸入籌號');

define('_ACA_ENTER_TOKEN_TIPS' , '請輸入你在惠顧 jNews 時從電郵收到的籌號. ');

define('_ACA_JNEWSLETTER_SITE', 'jNews 網站：');
define('_ACA_MY_SITE', '我的網站：');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'點擊這裡前往授權合約表格.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , '請消除授權合約欄及重試.<br />  如問題持續, ' );

define( '_ACA_LICENSE_SUPPORT' , '如你仍有疑問，' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , '你可於授權合約表單輸入你的籌號取得授權合約手冊及網址（本頁頂部綠色高亮部分）. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', '儲存你的籌號後授權合約將會自動產生. ' .
		' 通常籌號確認需時 2 分鐘.  但是某些情況可能需時至 15 分鐘.<br />' .
		'<br />幾分鐘後返回此控制台檢查.  <br /><br />' .
		'如你在 15 分鐘內接收不到有效的授權合約, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , '你的籌號尚未確認.');
define( '_ACA_UPDATE_CLICK_HERE' , '請到訪 <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> 下載最新版本.');
define( '_ACA_NOTIF_UPDATE' , '要在有更新時通知你, 輸入你的電郵地址及點擊訂閱 ');

define('_ACA_THINK_PLUS', '如你想你的郵件系統具備更多功能請考慮 Plus!');
define('_ACA_THINK_PLUS_1', '連續的自動應答');
define('_ACA_THINK_PLUS_2', '排程於預定日子發送你的電子報');
define('_ACA_THINK_PLUS_3', '再沒有伺服器限制');
define('_ACA_THINK_PLUS_4', '及更多...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', '清單存取權限' );
define( '_ACA_INFO_LIST_ACCESS', '指定哪個群組的用戶可以檢視及訂閱到此清單' );
define( 'ACA_NO_LIST_PERM', '你沒有足夠權限訂閱此清單' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', '封存');
 define('_ACA_MENU_ARCHIVE_ALL', '封存全部');

//Archive Lists
 define('_FREQ_OPT_0', '無');
 define('_FREQ_OPT_1', '每週');
 define('_FREQ_OPT_2', '每 2 週');
 define('_FREQ_OPT_3', '每月');
 define('_FREQ_OPT_4', '每季');
 define('_FREQ_OPT_5', '每年');
 define('_FREQ_OPT_6', '其他');

define('_DATE_OPT_1', '建立日期');
define('_DATE_OPT_2', '修改日期');

define('_ACA_ARCHIVE_TITLE', '設定自動-封存頻率');
define('_ACA_FREQ_TITLE', '封存頻率');
define('_ACA_FREQ_TOOL', '定義你想封存管理員每隔多久封存你的網站內容.');
define('_ACA_NB_DAYS', '日數');
define('_ACA_NB_DAYS_TOOL', '只適用於其他選項! 請指定每次封存相隔日數.');
define('_ACA_DATE_TITLE', '日期類型');
define('_ACA_DATE_TOOL', '定義應否在建立日期或修改日期封存.');

define('_ACA_MAINTENANCE_TAB', '維護設定');
define('_ACA_MAINTENANCE_FREQ', '維護頻率');
define( '_ACA_MAINTENANCE_FREQ_TIPS', '定義你想定期執行維護的頻率.' );
define( '_ACA_CRON_DAYS' , '小時' );

define( '_ACA_LIST_NOT_AVAIL', '沒有可用清單.');
define( '_ACA_LIST_ADD_TAB', '新增/編輯' );

define( '_ACA_LIST_ACCESS_EDIT', '新增郵件/編輯存取權限' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', '指定哪個群組用戶可以為此清單新增或編輯新郵件' );
define( '_ACA_MAILING_NEW_FRONT', '建立新郵件' );

define('_ACA_AUTO_ARCHIVE', '自動封存');
define('_ACA_MENU_ARCHIVE', '自動封存');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = 它會由電子報的發行號碼取代.');
define('_ACA_TAGS_DATE', '[DATE] = 它會由發送日期取代.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = 它會由 Community Builder 欄位取得的數值取代: 例. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', '維護' );

define('_ACA_THINK_PRO', '有專業需要, 使用專業元件!');
define('_ACA_THINK_PRO_1', '智能-電子報');
define('_ACA_THINK_PRO_2', '為你的清單定義權限層級');
define('_ACA_THINK_PRO_3', '定義誰可以編輯/新增郵件');
define('_ACA_THINK_PRO_4', '更多標籤: 新增你的 CB 欄位');
define('_ACA_THINK_PRO_5', 'Joomla 內容自動封存');
define('_ACA_THINK_PRO_6', '最佳化資料庫');

define('_ACA_LIC_NOT_YET', '你的授權合約尚未確認.  請檢查控制台授權合約分頁.');
define('_ACA_PLEASE_LIC_GREEN' , '確定已提供分頁頂部的綠色資訊給我們的支援團隊.' );

define('_ACA_FOLLOW_LINK' , '取得你的授權合約');
define( '_ACA_FOLLOW_LINK_TWO' , '你可以在授權合約表單輸入籌號及網址取得授權合約 (本頁頂部綠色高亮部分). ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' 然後點擊頂部右方選單的套用按鈕.' );
define( '_ACA_ENTER_LIC_NB', '輸入你的授權合約' );
define( '_ACA_UPGRADE_LICENSE', '升級你的授權合約');
define( '_ACA_UPGRADE_LICENSE_TIPS' , '如你收到升級你的授權合約籌號請在此輸入, 點擊套用及繼續第 <b>2</b> 步取得你的新授權合約號碼.' );

define( '_ACA_MAIL_FORMAT', '編碼格式' );
define( '_ACA_MAIL_FORMAT_TIPS', '你的郵件想用什麼格式的編碼, 純文字或 MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', '如你沒有你網站排程工作管理員的存取權限, 你可以使用免費的 jCron 元件從你的網站建立排程工作.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', '顯示作者名稱');
define('_ACA_SHOW_AUTHOR_TIPS', '如你想在郵件新增文章時新增作者名稱, 選擇「是」.');

//since 1.3.5
define('_ACA_REGWARN_NAME','請輸入你的名稱.');
define('_ACA_REGWARN_MAIL','請輸入有效的電郵地址.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','如果你選擇是, 用戶的電郵將會被新增你的重新導向網址的結尾處作為參數.');
define('_ACA_ADDEMAILREDLINK','新增電郵到重新導向連結');

//since 1.6.3
define('_ACA_ITEMID','ItemId');
define('_ACA_ITEMID_TIPS','此 ItemId 將會加到你的 jNews 連結.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','顯示 jCalPRO 的整合分頁<br/>（只適用於如果 jCalPRO 已經安裝在你的網站！）');
define('_ACA_JCALTAGS_TITLE','jCalPRO 標籤:');
define('_ACA_JCALTAGS_TITLE_TIPS','複製及貼上此標籤於郵件清單內你欲放置項目（Event）的位置.');
define('_ACA_JCALTAGS_DESC','描述:');
define('_ACA_JCALTAGS_DESC_TIPS','如果你想插入項目的描述，選擇「是」');
define('_ACA_JCALTAGS_START','開始日期:');
define('_ACA_JCALTAGS_START_TIPS','如果你想插入項目的開始日期，選擇「是」');
define('_ACA_JCALTAGS_READMORE','閱讀更多:');
define('_ACA_JCALTAGS_READMORE_TIPS','如果你想插入 <b>閱讀更多連結</b> 到此項目，選擇「是」');
define('_ACA_REDIRECTCONFIRMATION','重新導向 URL');
define('_ACA_REDIRECTCONFIRMATION_TIPS','如果你需要確認電郵, 當用戶點擊確認連結時他將會被確認及重新導向到此 URL.');

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