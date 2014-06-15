<?php
if ( !defined('_JEXEC') && defined('_VALID_MOS') ) define( '_JEXEC', true );
 defined('_JEXEC') or die('...Direct Access to this location is not allowed...');
/**
* <p>Hebrew language file</p>
* @authors Eszter Somos and Adam Segev
* @version Heb v0.1b
* @link http://www.joobisoft.com
*/

# This is an RTL language translation. You will need to edit the rest of the files to work with RTL.
# To display jNews correctly in your Joomla! admin ponel, you will need to install the hebrew Admin Panel.
# It can be found at www.joomla.co.il

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'jNews is a mailing lists, newsletters, auto-responders, and follow up tool to communication effectively with your users and customers.  ' .
		'jNews, Your Communication Partner!');
define('_ACA_DESC_GPL', 'jNews is a mailing lists, newsletters, auto-responders, and follow up tool to communication effectively with your users and customers.  ' .
		'jNews, Your Communication Partner!');
define('_ACA_FEATURES', 'jNews, your communication partner!');

// Type of lists
define('_ACA_NEWSLETTER', 'רשימת תפוצה');
define('_ACA_AUTORESP', 'מענה אוטומטי');
define('_ACA_AUTORSS', 'אוטומטי RSS');
define('_ACA_ECARD', 'כרטיס אלקטרוני');
define('_ACA_POSTCARD', 'גלויה');
define('_ACA_PERF', 'ביצועים');
define('_ACA_COUPON', 'קופון');
define('_ACA_CRON', 'תהליך קרון');
define('_ACA_MAILING', 'שולח');
define('_ACA_LIST', 'רשימה');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'רשימות');
define('_ACA_MENU_SUBSCRIBERS', 'מנויים');
define('_ACA_MENU_NEWSLETTERS', 'רשימת תפוצה');
define('_ACA_MENU_AUTOS', 'מענה אוטומטי');
define('_ACA_MENU_COUPONS', 'קופונים');
define('_ACA_MENU_CRONS', 'תהליכי קרון');
define('_ACA_MENU_AUTORSS', 'אוטומטי RSS');
define('_ACA_MENU_ECARD', 'כרטיס אלקטרוני');
define('_ACA_MENU_POSTCARDS', 'גלויות');
define('_ACA_MENU_PERFS', 'ביצועים');
define('_ACA_MENU_TAB_LIST', 'רשימות');
define('_ACA_MENU_MAILING_TITLE', 'דברי דואר');
define('_ACA_MENU_MAILING' , 'דברי דואר ל ');
define('_ACA_MENU_STATS', 'סטטיסטיקות ');
define('_ACA_MENU_STATS_FOR', 'סטטיסטיקות ל ');
define('_ACA_MENU_CONF', 'קונפיגורציה');
define('_ACA_MENU_UPDATE', 'ייבוא');
define('_ACA_MENU_ABOUT', 'אודות');
define('_ACA_MENU_LEARN', 'מרכז לימוד');
define('_ACA_MENU_MEDIA', 'מנהל מדיה');
define('_ACA_MENU_HELP', 'עזרה');
define('_ACA_MENU_CPANEL', 'לוח בקרה');
define('_ACA_MENU_IMPORT', 'ייבוא');
define('_ACA_MENU_EXPORT', 'ייצוא');
define('_ACA_MENU_SUB_ALL', 'עשה מנוי לכולם');
define('_ACA_MENU_UNSUB_ALL', 'בטל מנוי לכולם');
define('_ACA_MENU_VIEW_ARCHIVE', 'ארכיון');
define('_ACA_MENU_PREVIEW', 'תצוגה מקדימה');
define('_ACA_MENU_SEND', 'שלח');
define('_ACA_MENU_SEND_TEST', 'שלח מייל נסיון');
define('_ACA_MENU_SEND_QUEUE', 'תור תהליכים');
define('_ACA_MENU_VIEW', 'צפה');
define('_ACA_MENU_COPY', 'העתק');
define('_ACA_MENU_VIEW_STATS' , 'צפה בסטטיסטיקות');
define('_ACA_MENU_CRTL_PANEL' , ' לוח בקרה');
define('_ACA_MENU_LIST_NEW' , ' צור רשימה');
define('_ACA_MENU_LIST_EDIT' , ' ערוך רשימה');
define('_ACA_MENU_BACK', 'אחורה');
define('_ACA_MENU_INSTALL', 'התקנה');
define('_ACA_MENU_TAB_SUM', 'סיכום');
define('_ACA_STATUS' , 'מצב');

// messages
define('_ACA_ERROR' , ' התרחשה שגיאה ');
define('_ACA_SUB_ACCESS' , 'זכויות גישה');
define('_ACA_DESC_CREDITS', 'זכויות');
define('_ACA_DESC_INFO', 'מידע');
define('_ACA_DESC_HOME', 'דף בית');
define('_ACA_DESC_MAILING', 'רשימת תפוצה');
define('_ACA_DESC_SUBSCRIBERS', 'אנשים רשומים');
define('_ACA_PUBLISHED','מפורסם');
define('_ACA_UNPUBLISHED','לא מפורסם');
define('_ACA_DELETE','מחק');
define('_ACA_FILTER','סנן');
define('_ACA_UPDATE','עדכן');
define('_ACA_SAVE','שמור');
define('_ACA_CANCEL','בטל');
define('_ACA_NAME','שם');
define('_ACA_EMAIL','דואר אלקטרוני');
define('_ACA_SELECT','בחר');
define('_ACA_ALL','הכל');
define('_ACA_SEND_A', 'שלח ');
define('_ACA_SUCCESS_DELETED', ' נמחק בהצלחה');
define('_ACA_LIST_ADDED', 'רשימה נוצרה בהצלחה');
define('_ACA_LIST_COPY', 'רשימה הועתקה בהצלחה');
define('_ACA_LIST_UPDATED', 'רשימה עודכנה בהצלחה');
define('_ACA_MAILING_SAVED', 'דואר נשמר בהצלחה.');
define('_ACA_UPDATED_SUCCESSFULLY', 'עודכן בהצלחה');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'פרטי המנוי');
define('_ACA_VERIFY_INFO', 'נא ודא את הקישור ששלחת. הקישור או חלקו אינו תקין');
define('_ACA_INPUT_NAME', 'שם');
define('_ACA_INPUT_EMAIL', 'דואר אלקטרוני');
define('_ACA_RECEIVE_HTML', 'HTML האם ברצונך לקבל');
define('_ACA_TIME_ZONE', 'איזור זמן');
define('_ACA_BLACK_LIST', 'רשימה שחורה');
define('_ACA_REGISTRATION_DATE', 'תאריך רישום המנוי');
define('_ACA_USER_ID', 'מזהה משתמש');
define('_ACA_DESCRIPTION', 'תיאור');
define('_ACA_ACCOUNT_CONFIRMED', 'החשבון שלך אושר לשימוש');
define('_ACA_SUB_SUBSCRIBER', 'מנוי');
define('_ACA_SUB_PUBLISHER', 'מפרסם');
define('_ACA_SUB_ADMIN', 'מנהל');
define('_ACA_REGISTERED', 'רשום');
define('_ACA_SUBSCRIPTIONS', 'המנוי שלך');
define('_ACA_SEND_UNSUBCRIBE', 'שלח הודעה על ביטול מנוי');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'לחץ על כן על מנת לשלוח אישור ביטול מינוי');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'נא ודא את הרשמתך');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'וידוי ביטול מנוי');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', '[NAME] שלום,<br />' .
		'רק עוד שלב אחד ותצורף לרישמת התפוצה נא לחץ על הקישור הבא בשביל לודא את הרישום' .
		'<br /><br />[CONFIRM]<br /><br />בכל שאלה יש לפנות למנהל האתר');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'זהו מכתב אישור שהוסרת בהצלחה מרשימת התפוצה שלנו. צר לנו שהחלטת לבטל את המנוי. אם תחליט להרשם מחדש בעתיד, תוכל לעשות זאת באתר שלנו.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'תהליך רישום');
define('_ACA_CONFIRMED', 'מאושר');
define('_ACA_SUBSCRIB', 'הרשם');
define('_ACA_HTML', 'HTML דואר');
define('_ACA_RESULTS', 'תוצאות');
define('_ACA_SEL_LIST', 'בחר רשימה');
define('_ACA_SEL_LIST_TYPE', '- בחר סוג רשימה -');
define('_ACA_SUSCRIB_LIST', 'רשימה של כל המנויים');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'רשומים ל ');
define('_ACA_NO_SUSCRIBERS', 'לא נמצאו מנויים לרשימת תפוצה זו');
define('_ACA_COMFIRM_SUBSCRIPTION', 'נשלח אליך דואר אלקטרוני לאישור. נא לבדוק דואר אלקטרוני וללחוץ על הקישור המצורף.<br />' .
		'הינך צריך לאשר את כתובת הדואר אלקטרוני שלך לפני שהחשבון שלך יופעל.');
define('_ACA_SUCCESS_ADD_LIST', 'צורפת לרשימה בהצלחה.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'לחץ כאן בכדי לאשר את המנוי שלך');
define('_ACA_UNSUBSCRIBE_LINK', 'לחץ כאן בכדי לבטל את המנוי שלך');
define('_ACA_UNSUBSCRIBE_MESS', 'כתובת הדואר אלקטרוני שלך הוצאה מרשימת התפוצה שלנו');

define('_ACA_QUEUE_SENT_SUCCESS' , 'כל דברי הדואר המתוזמנים נשלחו בהצלחה');
define('_ACA_MALING_VIEW', 'צפה בכל דברי הדואר');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'האם אתה בטוח שהינך רוצה לבטל את המנוי שלך?');
define('_ACA_MOD_SUBSCRIBE', 'הרשם');
define('_ACA_SUBSCRIBE', 'הרשם');
define('_ACA_UNSUBSCRIBE', 'בטל הרשמה');
define('_ACA_VIEW_ARCHIVE', 'צפה בארכיון');
define('_ACA_SUBSCRIPTION_OR', ' או לחץ כאן על מנת לעדכן את פרטיך');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'כתובת דואר אלקטרוני זו כבר רשומה במאגר');
define('_ACA_SUBSCRIBER_DELETED', 'מנוי נמחק בהצלחה');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'לוח בקרת משתמש');
define('_UCP_USER_MENU', 'תפריט משתמש');
define('_UCP_USER_CONTACT', 'המנויים שלי');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'ניהול משימות קרון');
define('_UCP_CRON_NEW_MENU', 'קרון חדש');
define('_UCP_CRON_LIST_MENU', 'הצג את הקרון שלי');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'ניהול קופונים');
define('_UCP_COUPON_LIST_MENU', 'רשימת קופונים');
define('_UCP_COUPON_ADD_MENU', 'הוסף קופון');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'תיאור');
define('_ACA_LIST_T_LAYOUT', 'מערך');
define('_ACA_LIST_T_SUBSCRIPTION', 'מנוי');
define('_ACA_LIST_T_SENDER', 'מידע על השלוח');

define('_ACA_LIST_TYPE', 'סוג רשימה');
define('_ACA_LIST_NAME', 'שם הרשימה');
define('_ACA_LIST_ISSUE', 'מספר מהדורה');
define('_ACA_LIST_DATE', 'תהליך שליחה');
define('_ACA_LIST_SUB', 'נושא דואר');
define('_ACA_ATTACHED_FILES', 'קבצים מצורפים');
define('_ACA_SELECT_LIST', 'נא לבחור רשימה לערוך');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'סוג רשימה');
define('_ACA_AUTO_RESP_OPTION', 'אפשרויות מענה אוטומטי');
define('_ACA_AUTO_RESP_FREQ', 'מנויים יכולים לבחור דחיפות');
define('_ACA_AUTO_DELAY', 'דחיה בימים');
define('_ACA_AUTO_DAY_MIN', 'תדירות מינימלית');
define('_ACA_AUTO_DAY_MAX', 'תדירות מקסימלית');
define('_ACA_FOLLOW_UP', 'פרט מעקב מענה אוטומטי');
define('_ACA_AUTO_RESP_TIME', 'מנויים יכולים לבחור שעה');
define('_ACA_LIST_SENDER', 'שולח הרשימה');

define('_ACA_LIST_DESC', 'תיאור הרשימה');
define('_ACA_LAYOUT', 'מערך');
define('_ACA_SENDER_NAME', 'שם השולח');
define('_ACA_SENDER_EMAIL', 'דואר אלקטרוני השולח');
define('_ACA_SENDER_BOUNCE', 'כתובת באונץ של השולח');
define('_ACA_LIST_DELAY', 'עיכוב');
define('_ACA_HTML_MAILING', 'HTMLב שליחה?');
define('_ACA_HTML_MAILING_DESC', 'אם תשנה את זה, תצטרך לשמור ולחזור למסך זה על מנת לראות את השינויים');
define('_ACA_HIDE_FROM_FRONTEND', 'להחביא מהדף הראשי?');
define('_ACA_SELECT_IMPORT_FILE', 'בחר את הקובץ שהנך רוצה לייבא');;
define('_ACA_IMPORT_FINISHED', 'תהליך ייבוא סיים');
define('_ACA_DELETION_OFFILE', 'מחיקת הקובץ');
define('_ACA_MANUALLY_DELETE', 'נכשל, הינך צריך למחוק את הקובץ בצורה ידנים');
define('_ACA_CANNOT_WRITE_DIR', 'לא יכול לכתוב תיקיה');
define('_ACA_NOT_PUBLISHED', 'לא יכול לשלוח את דברי הדואר, הרשימה אינה מפורסמת');

//  List info box
define('_ACA_INFO_LIST_PUB', 'לחץ על כן על מנת לפרסם את הרשימה');
define('_ACA_INFO_LIST_NAME', 'הכנס את שם הרשימה כאן. תוכל לזהות את הרשימה לפי השם שתכניס');
define('_ACA_INFO_LIST_DESC', 'הכנס הסבר קצר אודות הרשימה. ההסבר יהיה גלוי למבקרי האתר ומקבלי הדואר אלקטרוני');
define('_ACA_INFO_LIST_SENDER_NAME', 'הכנס את שם שולח הדואר אלקטרוני. השם שתכניס יהיה גלוי כאשר תשלח דואר אלקטרוני');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'הכנס את כתובת הדואר אלקטרוני שממנה תשלח ההודעות');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'הכנס את כתובת הדואר אלקטרוני שאליה משתמשים יכולים להגיב. מומלץ בחום להשתמש באותה הכתובת שהזנת כדואר אלקטרוני שולח בכדי למנוע בעיות עם מסנני דואר אלקטרוני זבל');
define('_ACA_INFO_LIST_AUTORESP', 'בחר סוג דברי דואר מהרשימה <br />' .
		'רשימת תפוצה: רשימה רגילה<br />' .
		'מענה אוטומטי: מענה אוטומטי הוא רשימה שנשלחת בצורה אוטומטית דרך האתר בזמנים קבועים');
define('_ACA_INFO_LIST_FREQUENCY', 'אפשר למשתמש לבחור בכל כמה זמן הוא מקבל את רשימת התפוצה');
define('_ACA_INFO_LIST_TIME', 'אפשר למשתמש לבחור באיזה זמן הוא מעדיף לקבל את רשימת התפוצה');
define('_ACA_INFO_LIST_MIN_DAY', 'הגדר את התדירות המינימלית בה משתמש יכול לבחור לקבל את הרשימה');
define('_ACA_INFO_LIST_DELAY', 'פרט את העכוב בין מענה אוטומטי זה לבין הקודם');
define('_ACA_INFO_LIST_DATE', 'ציין את התאריך בו תרצה לפרסם את רשימת התפוצה אם הינך רוצה לעכב את הפרסום. <br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'הגדר מהי התדירות המקסימלית בו משתמש יכול לבחור לקבל את רשימת התפוצה');
define('_ACA_INFO_LIST_LAYOUT', 'הזן את המערך של רשימת התפוצה כאן. הינך יכול להזין כל מערך לרשימת התפוצה שלך כאן');
define('_ACA_INFO_LIST_SUB_MESS', 'הודעה זו תשלח למנוי כאשר המנוי נרשם. הינך יכול להגדיר את הטקסט כאן');
define('_ACA_INFO_LIST_UNSUB_MESS', 'הודעה זו תשלח למנוי כאשר המנוי מבטל את הרישום שלו. הינך יכול להכניס כל הודעה שתרצה כאן');
define('_ACA_INFO_LIST_HTML', 'סמן וי בתיבת הסימון אם ברצונך לשלוח דואר ב HTML.');
define('_ACA_INFO_LIST_HIDDEN', 'לחץ על כן בשביל להחביא את הרשימה מפני מבקרים באתר. למשתמשים לא תהיה אפשרות להרשם אך לך תהיה האפשרות לשלוח דואר.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'האם ברצונך לרשום משתמשים לרשימה זו בצורה אוטומטית? משתמש חדש: ירשום כל משתמש חדש שנרשם לאתר. כל המשתמשים: ירשום כל משתמש רשום במאגר מידע');
define('_ACA_INFO_LIST_ACC_LEVEL', 'האם ברצונך לרשום משתמשים לרשימה זו בצורה אוטומטית? משתמש חדש: ירשום כל משתמש חדש שנרשם לאתר. כל המשתמשים: ירשום כל משתמש רשום במאגר מידע');
define('_ACA_INFO_LIST_ACC_USER_ID', 'בחר את רמת הגישה של קבוצת המשתמשים שהינך רוצה לאפשר עריכה. קבוצת מהשתמשים הזו ומעלה תוכל לערוך את רשימת התפוצה ולשלוח אותה מהפאנל ניהול ומהאתר עצמו.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'אם הינך רוצה שהמענה האוטומטי יעביר לאחד אחר ברגע שהוא מגיע להודעה האחרונה, הינך יכול לציין כאן את המענה האוטומטי הבא');
define('_ACA_INFO_LIST_ACA_OWNER', 'זהו המזהה של יוצר הרשימה');
define('_ACA_INFO_LIST_WARNING', '   אופציה אחרונה זו זמינה רק פעם אחת בזמן יצירת הרשימה');
define('_ACA_INFO_LIST_SUBJET', ' נושא הדואר. זהו הנושא של הדואר שהמנוי יקבל');
define('_ACA_INFO_MAILING_CONTENT', 'זהו גוף הדואר שתרצה לשלוח');
define('_ACA_INFO_MAILING_NOHTML', 'הכנס את גוף הדואר שתרצה לשלוח למנויים שבחרו לקבל רק הודעות טקסט. אם תשאיר שדה זה ריק,   טקסט לטקסט בלבדhtml  גומלה תהפוך את ה');
define('_ACA_INFO_MAILING_VISIBLE', 'לחץ על כן בשביל להראות את הדואר באתר הראשי');
define('_ACA_INSERT_CONTENT', 'הכנס תוכן קיים');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'קופון נשלח בהצלחה');
define('_ACA_CHOOSE_COUPON', 'בחר קופון');
define('_ACA_TO_USER', ' למשתמש זה');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'כל שעות');
define('_ACA_FREQ_CH2', 'כל 6 שעות');
define('_ACA_FREQ_CH3', 'כל 12 שעות');
define('_ACA_FREQ_CH4', 'יומית');
define('_ACA_FREQ_CH5', 'שבועית');
define('_ACA_FREQ_CH6', 'חודשית');
define('_ACA_FREQ_NONE', 'לא');
define('_ACA_FREQ_NEW', 'משתמשים חדשים');
define('_ACA_FREQ_ALL', 'כל המשתמשים');

//Label CRON form
define('_ACA_LABEL_FREQ', 'אקאגום קרון?');
define('_ACA_LABEL_FREQ_TIPS', 'לחץ כן אם ברצונך להשתמש בזה לקרון אקאגום. לחץ על לא בשביל כל פעולת קרון אחרת<br />' .
		'אם תלחץ על כן, אינך צריך לציין את כתובת הקרון. היא תוסף באופן אוטומטי');
define('_ACA_SITE_URL' , 'כתובת האתר שלך');
define('_ACA_CRON_FREQUENCY' , 'תדירות קרון');
define('_ACA_STARTDATE_FREQ' , 'תאריך התחלה');
define('_ACA_LABELDATE_FREQ' , 'ציין תאריך');
define('_ACA_LABELTIME_FREQ' , 'ציין שעה');
define('_ACA_CRON_URL', 'כתובת קרון');
define('_ACA_CRON_FREQ', 'תדירות');
define('_ACA_TITLE_CRONLIST', 'רשימת קרון');
define('_NEW_LIST', 'צור רשימה חדשה');

//title CRON form
define('_ACA_TITLE_FREQ', 'ערוך קרון');
define('_ACA_CRON_SITE_URL', 'אנא הזן כתובת אתר חוקית שמתחילה ב HTTP://');

### Mailings ###
define('_ACA_MAILING_ALL', 'כל הדואר');
define('_ACA_EDIT_A', 'ערוך ');
define('_ACA_SELCT_MAILING', 'נא בחר רשימה מתוך הרשימה הבאה על מנת להוסיף דבר דואר חדש');
define('_ACA_VISIBLE_FRONT', 'נראה באתר?');

// mailer
define('_ACA_SUBJECT', 'נושא');
define('_ACA_CONTENT', 'תוכן');
define('_ACA_NAMEREP', '[NAME] = תג זה יוחלף בשם בו השתמש המנוי בזמן הרישום<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = תג זה יוחלף בשמו הראשון של המנוי<br />');
define('_ACA_NONHTML', 'גרסאת טקסט');
define('_ACA_ATTACHMENTS', 'קבצים מצורפים');
define('_ACA_SELECT_MULTIPLE', 'החזק את קונטרול או קומאנד על מנת לבחור בצירופים מרובים<br />' .
		'הקבצים המוצגים ברשימת צירופים זו נמצאים בתיקית הצירופים. הינך יכול לשנות את מיקום שמירת הקבצים ב לוח הקונפיגורציה.');
define('_ACA_CONTENT_ITEM', 'פריט תוכן');
define('_ACA_SENDING_EMAIL', 'שולח דואר');
define('_ACA_MESSAGE_NOT', 'שליחת ההודעה נכשלה');
define('_ACA_MAILER_ERROR', 'שגיאה בתוכנת השליחה');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'ההודעה נשלחה בהצלחה');
define('_ACA_SENDING_TOOK', 'לשליחת דבר דואר זה, נדרשו');
define('_ACA_SECONDS', 'שניות');
define('_ACA_NO_ADDRESS_ENTERED', 'לא הוכנס כתובת דואר או מנוי');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'שינוי');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'שנה את המנוי שלך');
define('_ACA_WHICH_EMAIL_TEST', 'ציין את כתובת הדואר אליה תשלח הודעת בדיקה או בחר תצוגה מקדימה');
define('_ACA_SEND_IN_HTML', 'שלח בפורמט HTML');
define('_ACA_VISIBLE', 'נראה');
define('_ACA_INTRO_ONLY', 'הקדמה בלבד');

// stats
define('_ACA_GLOBALSTATS', 'סטטיסטיקות גלובליות');
define('_ACA_DETAILED_STATS', 'סטטיסטקות בפרטי פרטים');
define('_ACA_MAILING_LIST_DETAILS', 'פרטי רשימה');
define('_ACA_SEND_IN_HTML_FORMAT', 'שלח בפורמט HTML');
define('_ACA_VIEWS_FROM_HTML', 'צפיות מדואר HTML');
define('_ACA_SEND_IN_TEXT_FORMAT', 'שלח בפורמט טקסט');
define('_ACA_HTML_READ', 'HTML נקרא');
define('_ACA_HTML_UNREAD', 'HTML לא נקרא ');
define('_ACA_TEXT_ONLY_SENT', 'טקסט בלבד');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'דואר');
define('_ACA_LOGGING_CONFIG', 'תיעוד וסטטיסטיקות');
define('_ACA_SUBSCRIBER_CONFIG', 'מנויים');
define('_ACA_MISC_CONFIG', 'שונות');
define('_ACA_MAIL_SETTINGS', 'הגדרות דואר');
define('_ACA_MAILINGS_SETTINGS', 'הגדרות דיוור');
define('_ACA_SUBCRIBERS_SETTINGS', 'הגדרות מנוי');
define('_ACA_CRON_SETTINGS', 'הגדרות קרון');
define('_ACA_SENDING_SETTINGS', 'הגדרות שליחה');
define('_ACA_STATS_SETTINGS', 'הגדרות סטטיסטיקה');
define('_ACA_LOGS_SETTINGS', 'הגדרות תיעוד');
define('_ACA_MISC_SETTINGS', 'הגדרות שונות');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'מכתובת דואר');
define('_ACA_SEND_MAIL_NAME', 'משם:');
define('_ACA_MAILSENDMETHOD', 'שיטת שליחה');
define('_ACA_SENDMAILPATH', 'Sendmail path');
define('_ACA_SMTPHOST', 'SMTP host');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP Authentication required');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Select yes if your SMTP server requires authentication');
define('_ACA_SMTPUSERNAME', 'SMTP username');
define('_ACA_SMTPUSERNAME_TIPS', 'Enter the SMTP username when your SMTP server requires authentication');
define('_ACA_SMTPPASSWORD', 'SMTP password');
define('_ACA_SMTPPASSWORD_TIPS', 'Enter the SMTP password when your SMTP server requires authentication');
define('_ACA_USE_EMBEDDED', 'השתמש בתמונות מוטמעות');
define('_ACA_USE_EMBEDDED_TIPS', 'בחר כן אם התמונות בתוכן המצורף צריכות להיות מוטמעות בהודעת הדואר להודעות אייץ טי אם אל, או לא על מנת להשתמש בטגיות ברירת מחדל שמקשרות לתמונות באתר.');
define('_ACA_UPLOAD_PATH', 'העלה/צירופים path');
define('_ACA_UPLOAD_PATH_TIPS', 'הינך יכול לציין תיקית העלאה<br />' .
		'וודא שהתיקיה שציינת קיימת. אם היא לא קיימת, צור אותה');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'הרשה לא רשומים');
define('_ACA_ALLOW_UNREG_TIPS', 'לחץ כן אם ברצונך להרשות למשתמשים להרשם לרשימות ללא הרשמה לאתר');
define('_ACA_REQ_CONFIRM', 'דרוש אישור?');
define('_ACA_REQ_CONFIRM_TIPS', 'לחץ כן אם אתה רוצה לדרוש שמנויים לא רשומים יאשרו את כתובת הדואר שלהם');
define('_ACA_SUB_SETTINGS', 'הגדרות מינוי');
define('_ACA_SUBMESSAGE', 'דואר אלקטרוני מינוי');
define('_ACA_SUBSCRIBE_LIST', 'עשה מינוי לרשימת התפוצה');

define('_ACA_USABLE_TAGS', 'טגיות ניתנות לשימוש');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = זה יוצר קישור שאפשר ללחוץ עליו, שבו המנויים יכולים לאשר את המנוי שלהם. זה דרוש על מנת לגרום לאקאגום לעבוד בצורה נכונה.<br />'
.'<br />[NAME] = זה יוחלף בשם של המנוי שהכנסת. אתה תשלח דואר אישי כאשר תשתמש בזה<br />'
.'<br />[FIRSTNAME] = זה יוחלף בשמו הפרטי של המנוי. השם הראשון מוגדר על ידי המנוי כאשר הוא נרשם<br />');
define('_ACA_CONFIRMFROMNAME', 'וודא משם');
define('_ACA_CONFIRMFROMNAME_TIPS', 'הזן את שם השולח שיופיע ברשימות האישור');
define('_ACA_CONFIRMFROMEMAIL', 'אשר מכתובת דואר');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'הזן את כתובת הדואר שתוצג על רשימות האישורים.');
define('_ACA_CONFIRMBOUNCE', 'כתובת Bounce');
define('_ACA_CONFIRMBOUNCE_TIPS', 'הזן את כתובת הBounce שתופיע על רשימות האישורים');
define('_ACA_HTML_CONFIRM', 'וודא HTML');
define('_ACA_HTML_CONFIRM_TIPS', 'לחץ כן אם רשימות האישורים צריכות להיות בHTML, אם המשתמש מאשר HTML');
define('_ACA_TIME_ZONE_ASK', 'שאל איזור זמן');
define('_ACA_TIME_ZONE_TIPS', 'לחץ על כן אם ברצונך לשאול את המשתמש מהו איזור הזמן בו הוא נמצא. דברי דואר בתור, יישלחו על פי פרטים אלו כאשר אופציה זו פועלת');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_TIME_OFFSET_URL', 'לחץ כאן לעריכת קיזוז בלוח הקונפיגורציה הגלובלית -> לשונית איזור');
define('_ACA_TIME_OFFSET_TIPS', 'ערוך את קיזוז הזמן של השרת על מנת שהתאריך והזמן הרשומים מדוייקים.');
define('_ACA_TIME_OFFSET', 'קיזוז זמן');
define('_ACA_CRON_DESC','<br />שימוש בפעולת הקרון תאפשר משימות אוטומטיות באתר הגומלה שלכם.<br />' .
		'בשביל לערוך את זה, הינך צרים להוסיף בלוח הבקרה contrab את הפקודה הבאה:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />אם הינך צריך עזרה בהתקנה של זה או אם יש לך בעיות עם זה, אנא בקר בפורום <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>');
// sending settings
define('_ACA_PAUSEX', 'עצור כל X שניות של כמות אימיילים מקונפגים');
define('_ACA_PAUSEX_TIPS', 'הזן את כמות השניות אקאגום תתן לשרת הSMTP לשלוח את ההודעות לפני שתמשיך עם כמות ההודעות המקונפגות הבאות');
define('_ACA_EMAIL_BET_PAUSE', 'אימיילים בין הפסקות');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'כמות האימיילים לפני הפסקה');
define('_ACA_WAIT_USER_PAUSE', 'חכה להתערבות משתמש בזמן הפסקה');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'האם הסקריפט צריך לחכות להתערבות משתמש כאשר המערכת בהפסקה בין סדרות של שליחת דואר');
define('_ACA_SCRIPT_TIMEOUT', 'סקריפט timeout');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'מספר הדקות שהסקריפט ירוץ. (הכנס 0 לבלתי מוגבל).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'אפשר קריאת סטטיסטיקות');
define('_ACA_ENABLE_READ_STATS_TIPS', 'לחץ כן אם ברצונך לתעד את מספר הצפיות. טכניקה זו יכולה להיות מיושמת רק עם דואר HTML');
define('_ACA_LOG_VIEWSPERSUB', 'מספר צפיות למנוי');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'לחץ כן אם ברצונך לתעד את מספר הצפיות לכל מנוי. טכניקה זו יכולה להיות מיושמת רק עם דואר HTML');
// Logs settings
define('_ACA_DETAILED', 'תיעוד בהרחבה');
define('_ACA_SIMPLE', 'תיעוד פשוט');
define('_ACA_DIAPLAY_LOG', 'הצג תיעודים');
define('_ACA_DISPLAY_LOG_TIPS', 'לחץ כן אם ברצונך לצפות בתיעודים בזמן שליחת דברי דואר.');
define('_ACA_SEND_PERF_DATA', 'שלח החוצה ביצועים');
define('_ACA_SEND_PERF_DATA_TIPS', 'לחץ כן אם ברצונך לאפשר לאקאגום לשלוח דוחות אנונימיים אודות הקונפוגורציה שלך, מספר הרשומים בכל רשימה והזמן שלקח לשלוח את דברי הדואר. זה ייתן לנו מידע אודות הפעילות של אקאגום ויעזור לנו לשפר את האופן בה התוכנה פועלת');
define('_ACA_SEND_AUTO_LOG', 'שלח תיעוד בשביל מענה אוטומטי');
define('_ACA_SEND_AUTO_LOG_TIPS', 'לחץ כן אם ברצונך לשלוח אימייל עם תיעוד בכל פעם שהתור מעובד. אזהרה!!! פעולה זו יכולה לגרום לכמות גדולה של אימיילים להווצר');
define('_ACA_SEND_LOG', 'שלח דוח תיעוד');
define('_ACA_SEND_LOG_TIPS', 'אם דוח תיעוד של שליחת דברי דואר צריך להשלח לכתובת האימייל של המשתמש ששלח את דבר הדואר');
define('_ACA_SEND_LOGDETAIL', 'שלח פירוט תיעוד');
define('_ACA_SEND_LOGDETAIL_TIPS', 'מפורט כולל את הצלחתו או כשלונו של מידע לכל מנוי וסקירה של המידע. פשוט רק שולח את הסקירה.');
define('_ACA_SEND_LOGCLOSED', 'שלח דוח אם החיבור נסגר');
define('_ACA_SEND_LOGCLOSED_TIPS', 'אם אופציה זו על המשתמש ששלח את דבר הדואר עדיין יקבל דוח באימייל.');
define('_ACA_SAVE_LOG', 'שמור דוח');
define('_ACA_SAVE_LOG_TIPS', 'אם תיעוד של דבר הדואר יהיה מצורף לקובץ התיעוד');
define('_ACA_SAVE_LOGDETAIL', 'שמור תיעוד בפרטים');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'מפורט כולל את הצלחתו או כשלונו של מידע עבור כל מנוי וסקירה של המידע. פשוט רק שומר את הסקירה.');
define('_ACA_SAVE_LOGFILE', 'שמור תיעוד לקובץ');
define('_ACA_SAVE_LOGFILE_TIPS', 'קובץ אליו מידע מהתיעוד יהיה מצורף. קובץ זה יכול להגיע לגודל די גדול.');
define('_ACA_CLEAR_LOG', 'נקה תיעוד');
define('_ACA_CLEAR_LOG_TIPS', 'מנקה לגמרי את קובץ התיעוד');

### control panel
define('_ACA_CP_LAST_QUEUE', 'התור האחרון שבוצע בהצלחה');
define('_ACA_CP_TOTAL', 'סך הכל');
define('_ACA_MAILING_COPY', 'דברי דואר הועתקו בהצלחה!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'הראה מדריך');
define('_ACA_SHOW_GUIDE_TIPS', 'הראה את המדריך בהתחלה על מנת לעזור למשתמשים חדשים ליצור רשימת תפוצה, מענה אוטומטי ואיך לערוך את אקאגום בצורה נכונה.');
define('_ACA_AUTOS_ON', 'השתמש במענה אוטומטי');
define('_ACA_AUTOS_ON_TIPS', 'בחר בלא אם אינך רוצה להשתמש במענה אוטומטי. כל המענים האוטומטיים ינוטרלו.');
define('_ACA_NEWS_ON', 'השתמש ברשימות תפוצה');
define('_ACA_NEWS_ON_TIPS', 'בחר בלא אם אינך רוצה להשתמש ברשימות תפוצה. כל רשימות התפוצה ינוטרלו.');
define('_ACA_SHOW_TIPS', 'הצג טיפים');
define('_ACA_SHOW_TIPS_TIPS', 'הצג את הטיפים על מנת לעזור למשתמשים להשתמש באקאגום בצורה יותר יעילה');
define('_ACA_SHOW_FOOTER', 'הצג סיומת עמוד');
define('_ACA_SHOW_FOOTER_TIPS', 'אם זכיויות יוצרים יוצג בסיומת העמוד.');
define('_ACA_SHOW_LISTS', 'מראה רשימות באתר');
define('_ACA_SHOW_LISTS_TIPS', 'כאשר משתמש אינו רשום, הראה רשימה של הרשימות שהם יכולים להרשם אליהם עם כפתור לארכיון, לרשימות תפוצה, או פשוט טופס כניסה בכדי שיוכלו להרשם.');
define('_ACA_CONFIG_UPDATED', 'פרטי הקונפיגורציה עודכנו בהצלחה!');
define('_ACA_UPDATE_URL', 'עדכן כתובת URL');
define('_ACA_UPDATE_URL_WARNING', 'אזהרה!!! אל תשנה את כתובת URL זו אלא אם כן התבקשת לעשות כך על ידי הצוות הטכני של אקאגום<br />');
define('_ACA_UPDATE_URL_TIPS', 'לדוגמא: http://www.acajoom.com/update/ (כולל את הלוכסן הסוגר!)');

// module
define('_ACA_EMAIL_INVALID', 'כתובת הדואר האלקטרוני שהוכנסה אינה חוקית');
define('_ACA_REGISTER_REQUIRED', 'יש להרשם לאתר לפני שתוכל להרשם לרשימה זו.');

// Access level box
define('_ACA_OWNER', 'יוצר הרשימה:');
define('_ACA_ACCESS_LEVEL', 'קבע רמת גישה לרישמה זו.');
define('_ACA_ACCESS_LEVEL_OPTION', 'אפשרויות רמת גישה');
define('_ACA_USER_LEVEL_EDIT', 'בחר איזה רמת משתמש מורשה לערוך דבר דואר. (מהאתר, או פאנל הניהול) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'יומי');
define('_ACA_AUTO_DAY_CH2', 'יומי ללא סופי שבוע');
define('_ACA_AUTO_DAY_CH3', 'כל יומיים');
define('_ACA_AUTO_DAY_CH4', 'כל יומיים ללא סופי שבוע');
define('_ACA_AUTO_DAY_CH5', 'שבועי');
define('_ACA_AUTO_DAY_CH6', 'דו שבועי');
define('_ACA_AUTO_DAY_CH7', 'חודשי');
define('_ACA_AUTO_DAY_CH9', 'שנתי');
define('_ACA_AUTO_OPTION_NONE', 'לא');
define('_ACA_AUTO_OPTION_NEW', 'משתמשים חדשים');
define('_ACA_AUTO_OPTION_ALL', 'כל המשתמשים');

//

define('_ACA_UNSUB_MESSAGE', 'אימייל ביטול הרשמה');
define('_ACA_UNSUB_SETTINGS', 'הגדרות ביטול הרשמה');
define('_ACA_AUTO_ADD_NEW_USERS', 'הוסף משתמשים כמנויים בצורה אוטומטית?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'כרגע לא קיימים עדכונים');
define('_ACA_VERSION', 'אקאגות גרסא');
define('_ACA_NEED_UPDATED', 'קבצים שצריכים עדכון:');
define('_ACA_NEED_ADDED', 'קבצים שצריכים להוסיף');
define('_ACA_NEED_REMOVED', 'קבצים שצריכים הסרה');
define('_ACA_FILENAME', 'שם קובץ:');
define('_ACA_CURRENT_VERSION', 'גרסא עכשיוית:');
define('_ACA_NEWEST_VERSION', 'הגרסא הכי חדישה כרגע:');
define('_ACA_UPDATING', 'מעדכן');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'הקבצים עודכנו בהצלחה');
define('_ACA_UPDATE_FAILED', 'העדכון כשל!');
define('_ACA_ADDING', 'מוסיף');
define('_ACA_ADDED_SUCCESSFULLY', 'הוסף בהצלחה');
define('_ACA_ADDING_FAILED', 'ההוספה נכשלה!');
define('_ACA_REMOVING', 'מסיר');
define('_ACA_REMOVED_SUCCESSFULLY', 'הוסר בהצלחה.');
define('_ACA_REMOVING_FAILED', 'ההסרה נכשלה');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'התקן גרסא אחרת');
define('_ACA_CONTENT_ADD', 'הוסף תוכן');
define('_ACA_UPGRADE_FROM', 'ייבא תוכן (רשומות תפוצה מידע על מנויים) מ ');
define('_ACA_UPGRADE_MESS', 'אין סכנה למידע הקיים. <br /> פעולה זו פשוט תייבא את המידע אל מסד הנתונים של אקאגום.');
define('_ACA_CONTINUE_SENDING', 'המשך שליחה');
// jNews message

define('_ACA_UPGRADE1', 'הינך יכול לייבא את המשתמשים ורשימות התפוצה שלך מ ');
define('_ACA_UPGRADE2', ' לאקאגום בלוח העידכונים.');
define('_ACA_UPDATE_MESSAGE', 'גרסא חדשה לאקאגום זמינה! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'לחץ כאן לעידכון!');
define('_ACA_THANKYOU', 'תודה על בחירתך באקאגום! אתה שותך לתקשורת!');
define('_ACA_NO_SERVER', 'עידכון שרת לא זמין, אנא חזור לבדוק מאוחר יותר');
define('_ACA_MOD_PUB', 'מודול אקאגום לא פורסם');
define('_ACA_MOD_PUB_LINK', 'לחץ כאן כדי לפרסם זאת!');
define('_ACA_IMPORT_SUCCESS', 'יובא בהצלחה');
define('_ACA_IMPORT_EXIST', 'מנוי נמצא בבסיס הנתונים');

// jNews\'s Guide
define('_ACA_GUIDE', '\'s Wizard');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>לאקאגופ יש מאפיינים רבים נהדרים ואשף זה ידריך אותך בתהליך של ארבעה צעדים פשוטים כדי שתתחיל להחזיק רשימת תפוצה ומענה אוטומטי משלך!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'קודם כל תצטרך להוסיף רשימה. יש שני סוגי רשימות - רשימת תפוצה או מענה אוטומטי' .
		'  ברשימה בחר את כל הפרמטרים השונים שיאפשרו שליחה לרשימת התפוצה או מענה אוטומטי: שם שולח, מערך, מנויים, הודעת ברוך הבא וכולי
<br /><br />תוכל להגדיר את הרשימה הראשונה שלך כאן: <a href="index2.php?option=com_jnewsletter&act=list" >צור רשימה</a> ולחץ על כפתור חדש.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'אקאגופ מספק לך דרך קלה לייבא כל נתון ממערכת רשימת תפוצה קודמת<br />' .
		' לך ללוח הייבוא ובחר במערכת רשימת תפוצה קודמת כדי לייבא את כל רשימות התפוצה והמנויים  <br /><br />' .
		'<span style="color:#FF5E00;" >חשוב: הייבוא נטול סיכונים ולא משפיע בשום דרך על הנתונית של מערכת רשימה התפוצה הקודמת שלך</span><br />' .
		'אחרי הייבוא, תוכל לנהל את המנוייל והדיוור ישירות מאקאגום<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'נהדר! הרשימה הראשונה שלך נוצרה!  אתה עכשיו יכול לכתוב %s.  בשביל ליצור אחד, גש ל: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'ניהול מענה אוטומטי');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'ניהול רשימות התפוצה');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' ותבחר את ה %s. <br /> אז תבחר את ה %s שלך מתוך הרשימה.  צור את הדיוור הראשון שלך על ידי לחיצה על חדש.');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'לפני שתשלח דואר לרשימת התפוצה שלך בפעם הראשונה, ייתכן ותרצה לבדוק את הגדרות הדואר.  ' .
		'גש אל <a href="index2.php?option=com_jnewsletter&act=configuration" >דף קונפיגורציה</a> על מנת לוודא את הגדרות הדואר <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />כאשר אתה מוכן לחזור את תפריט רשימות התפוצה, בחר את דבר הדואר שלך ולחץ על שלח');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'בשביל שהמענה האוטומטי ייפעל כשורה, הינך חיייב ליצור משימת cron על השרת שלך. ' .
		' Please refer to the Cron tab in the configuration panel.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >לחץ כאן</a> בשביל ללמוד איך ליצור משימת cron <br />');

define('_ACA_GUIDE_MODULE', ' <br />וודא כי אכן הפעלת את מודול אקאגום, בכדי שאנשים יוכלו להרשם לרשימה.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' הינך יכול עכשיו ליצור מענה אוטומטי');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' הינך יכול עכשיו ליצור רשימת תפוצה');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />זהו! אתה מוכן ליצור קשר עם מבקרים ומשתמשים. אשף זה יסיים ברגע שתכניס רשימת תפוצה שניה, או שאתה יכול לכבות את האשף ב <a href="index2.php?option=com_jnewsletter&act=configuration" >לוח הקונפיגורציה</a>.' .
		'<br /><br /> אם יש לך שאלות לגבי אקאגום, נא פנה ל ' .
		'<a target="_blank" href="http://www.acajoom.com/index.php?option=com_joomlaboard&Itemid=26&task=listcat&catid=22" >פורום</a>. ' .
		' בנוסף, אתה תמצא כמות גדולה של מידע על איך ליצור קשר עם המנויים שלך בצורה נכונה ב <a href="http://www.acajoom.com/" target="_blank" >www.jNews.com</a>.' .
		'<p /><br /><b>תודה שהשתמשת באקאגום, הדרך הטובה ביותר ליצור קשר עם הלקוחות שלך!</b> ');
define('_ACA_GUIDE_TURNOFF', 'האשף עכשיו מכבה את עצמו');
define('_ACA_STEP', 'שלב ');


// jNews Install
define('_ACA_INSTALL_CONFIG', 'קונפיגורציית אקאגום');
define('_ACA_INSTALL_SUCCESS', 'ההתקנה הסתיימה בהצלחה');
define('_ACA_INSTALL_ERROR', 'תקלת התקנה');
define('_ACA_INSTALL_BOT', 'הרחב אקאגום (בוט)  ');
define('_ACA_INSTALL_MODULE', 'מודול אקאגום');
//Others
define('_ACA_JAVASCRIPT','אזהרה! גאווה סקריפט חייב להיות מאושר לפעולה ראוייה!');
define('_ACA_EXPORT_TEXT','המנויים שמיוצאים מבוססים על הרשימה שבחרת. <br /> ייצא מנויים בשביל הרשימה.');
define('_ACA_IMPORT_TIPS','ייבא מנויים. המידע בקובץ צריך להיות בפורמט הבא:  <br />' .
		'שם, כתובת דואר אלקטרונית, מקבלHTML (0/1),<span style="color: rgb(255, 0, 0);"> אושר(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'כבר מנוי');
define('_ACA_GET_STARTED', 'הקלק כאן כדי להתחיל!');

//News since 1.0.1
define('_ACA_WARNING_1011','אזהרה 1011: עדכון לא יעבוד בגלל הגבלה של השרת שלך');
define('_ACA_SEND_MAIL_FROM_TIPS', 'בחר את כתובת הדואר האלקטרונית שתופיע כשולח');
define('_ACA_SEND_MAIL_NAME_TIPS', 'בחר את השם שיופיע בשורת השולח');
define('_ACA_MAILSENDMETHOD_TIPS', 'בחר באיזה דואר ברצונך להשתמש: פונקציית דואר PHP <span> סנדמייל</span> או שרת SMTP');
define('_ACA_SENDMAILPATH_TIPS', 'זוהי הספרייה של שרת הדואר האלקטרוני');
define('_ACA_LIST_T_TEMPLATE', 'תבנית');
define('_ACA_NO_MAILING_ENTERED', 'לא סופק דואר');
define('_ACA_NO_LIST_ENTERED', 'לא סופקה רשימה');
define('_ACA_SENT_MAILING' , 'דואר שנשלח');
define('_ACA_SELECT_FILE', 'אנא בחר קובץ ל ');
define('_ACA_LIST_IMPORT', 'סמן את הרשימות שתרצה שהרשומים ישתייכו אליהם');
define('_ACA_PB_QUEUE', 'רשומים נכנסו אבל יש בעיה לקשר אותם לרשימותץ אנא בדוק ידנית');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , 'עדכון מומלץ ביותר!');
define('_ACA_UPDATE_MESS2' , 'החל טלאי ותיקונים קטנים');
define('_ACA_UPDATE_MESS3' , 'שחרור גרסא חדשה');
define('_ACA_UPDATE_MESS5' , 'גומלה 1.5 דורש עידכון');
define('_ACA_UPDATE_IS_AVAIL' , 'זמין!');
define('_ACA_NO_MAILING_SENT', 'אין דואר נשלח!');
define('_ACA_SHOW_LOGIN', 'הראה טופס הרשמה');
define('_ACA_SHOW_LOGIN_TIPS', 'בחר כן כדי להראות טופס כניסה בלוח בקרה באתר אקאגום כך שהמשתמש יוכל להרשם לאתר');
define('_ACA_LISTS_EDITOR', 'עורך תיאור רשימה');
define('_ACA_LISTS_EDITOR_TIPS', 'בחר כן כדי להשתמש בעורך HTML בשביל לערוך את שדה תיאור רשימה');
define('_ACA_SUBCRIBERS_VIEW', 'הראה מינויים');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , 'הגדרות אתר' );
define('_ACA_SHOW_LOGOUT', 'הראה כפתור יציאה מהמערכת');
define('_ACA_SHOW_LOGOUT_TIPS', 'בחר כן כדי להראות את כפתור היציאה מהמערכת בלוח הבקרה באתר אקאגום');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'שילוב');
define('_ACA_CB_INTEGRATION', 'שילוב קומיוניטי בילדר');
define('_ACA_INSTALL_PLUGIN', 'הרחבות קומיוניטי בילדר  (שילוב אקאגום) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'הרחבות אקאגום לקומיוניטי בילדר טרם הותקנו');
define('_ACA_CB_PLUGIN', 'הראה רשימה בהרשמות');
define('_ACA_CB_PLUGIN_TIPS', 'בחר כן על מנת להראות את רשימות התפוצה בטפסי הרשמות של קומיוניטי בילדר');
define('_ACA_CB_LISTS', 'זיהוי רשימה מספר');
define('_ACA_CB_LISTS_TIPS', 'זהו שדה חובה. הכנס את מספר זיהוי הרשימה שהנך רוצה לתת אפשרות לרשומים לעשות מנוי אל מופרד בפסיק , (0 מראה את כל הרשימות)');
define('_ACA_CB_INTRO', 'טקסט הקדמה');
define('_ACA_CB_INTRO_TIPS', 'טקסט שמופיע יופיע לפני הרשומות. השאר ריק בשביל לא להראות דבר. תוכל להשתמש בתגיות HTML בשביל להתאים אישית את המראה וההרגשה');
define('_ACA_CB_SHOW_NAME', 'הראה שם רשימה');
define('_ACA_CB_SHOW_NAME_TIPS', 'בחר אם אתה רוצה להראות את שם הרשימה אחרי ההקדמה');
define('_ACA_CB_LIST_DEFAULT', 'סמן רשימה כברירת מחדל');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Sבחר אם אתה רוצה שתיבת הסימון תהיה מסומנת לכל רשימה כברירת מחדל.');
define('_ACA_CB_HTML_SHOW', 'הראה קבלת HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'בחר כן בשביל להרשות למשתמשים להחליט אם הם רוצים דואר אלקטרוני בHTML או לא. בחר לא בשביל להשתמתש בברירת מחדל HTML');
define('_ACA_CB_HTML_DEFAULT', 'ברירת מחדל קבלת HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'בחר באופציה זו כדי להראות את ברירת המחדל של קונפיגורציית שליחת דואר HTML. אם הצג קבלת HTML מכוון ללא אז אופציה זו תהיה ברירת המחדל');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'לא הייתה אפשרות לגבות קובץ! קובץ לא הוחלף');
define('_ACA_BACKUP_YOUR_FILES', 'הגרסא הישנה של הקבצים גובו לספרייה הבאה:');
define('_ACA_SERVER_LOCAL_TIME', 'שעת שרת בזמן מקומי');
define('_ACA_SHOW_ARCHIVE', 'הראה כפתור ארכיון');
define('_ACA_SHOW_ARCHIVE_TIPS', 'בחר כן בשביל להראות כפתור ארכיון בסוף כל רשימת תפוצה');
define('_ACA_LIST_OPT_TAG', 'תגיות');
define('_ACA_LIST_OPT_IMG', 'תמונות');
define('_ACA_LIST_OPT_CTT', 'תוכן');
define('_ACA_INPUT_NAME_TIPS', 'הכנס שם מלא ( שם פרטי קודם) ');
define('_ACA_INPUT_EMAIL_TIPS', 'הכנס את כתובת הדואר האלקטרוני שלך. וודא כי זו כתובת בתוקף אם אתה רוצה להיות ברשימת התפוצה שלנו');
define('_ACA_RECEIVE_HTML_TIPS', 'בחר כן אם ברצונך לקבל מכתבים בHTML  - בחר לא בשביל לקבל מכתבים בטקסט בלבד');
define('_ACA_TIME_ZONE_ASK_TIPS', 'ציין את איזור הזמן שלך');

// Since 1.0.5
define('_ACA_FILES' , 'קבצים');
define('_ACA_FILES_UPLOAD' , 'העלאה');
define('_ACA_MENU_UPLOAD_IMG' , 'העלה תמונה');
define('_ACA_TOO_LARGE' , 'הקובץ גדול מידי. גודל המקסימום הוא');
define('_ACA_MISSING_DIR' , 'תיקיית היעד איננה קיימת');
define('_ACA_IS_NOT_DIR' , 'תיקיית היעד איננה קיימת או שהיא קובץ רגיל');
define('_ACA_NO_WRITE_PERMS' , 'לתיקיית היעד אין הרשאות כתיבה');
define('_ACA_NO_USER_FILE' , 'לא נבחר קובץ להעלאה');
define('_ACA_E_FAIL_MOVE' , 'לא ניתן להזיז את הקובץ');
define('_ACA_FILE_EXISTS' , 'יעד הקובץ כבר קיים');
define('_ACA_CANNOT_OVERWRITE' , 'יעד הקובץ כבר קיים ולא ניתן לשכתבו');
define('_ACA_NOT_ALLOWED_EXTENSION' , 'סיומת הקובץ לא חוקית');
define('_ACA_PARTIAL' , 'הקובץ הועלה באופן חלקי בלבד');
define('_ACA_UPLOAD_ERROR' , 'תקלה בהעלאה:');
define('DEV_NO_DEF_FILE' , 'הקובץ הועלה חלקית בלבד');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = זה יוחלף עם קישורי ההרשמה' .
		' זה <strong> נדרש </strong> בשביל שאקאגום יעבוד כראוי<br />' .
		'אם תמקם כל תוכן אחר בתיבה זו הוא יוצג בכל רשימות התפוצה בהתאם לרשומה זו' .
		' <br /> הוסף הודעת הרשמה בסוף. אקאגום יוסיף קישור בצורה אוטומטית לרשומים לשנות את המידע שלהם וקישור להסרה מרשימת התפוצה');

// since 1.0.6
define('_ACA_NOTIFICATION', 'הודעה');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'הודעות');
define('_ACA_USE_SEF', 'SEF ברשימות תפוצה');
define('_ACA_USE_SEF_TIPS', 'מומלץ שתבחר לא. בכל מקרה אם תרצה שהURL יכלל ברשימת התפוצה שלך לשימוש SEF אז בחר כן' .
		' <br /> <b> הקישורים יעבדו אותו הדבר בשתי האופציות. אין הבטחה כי הקישורים ברשימת התפוצה יעבדו תמיד, גם אם שינית את הSEF שלך.</b> ');
define('_ACA_ERR_NB' , 'Error #: ERR');
define('_ACA_ERR_SETTINGS', 'הגדרות התמודדות עם תקלות');
define('_ACA_ERR_SEND' ,'שלח דוח שגיאות');
define('_ACA_ERR_SEND_TIPS' ,'אם תרצה את אקאגום כמוצר טוב יותר אנא בחר כן. יישלחו דוחות שגיאה כך שלא תצטרך לדווח על באגים יותר  <br /> <b>מידע פרטי לא נשלח!</b>. אנחנו אפילו לא נדע מאיזה אתר מגיע דוח השגיאה. אנו נשלח אך ורק מידע על אקאגום, הגדרות הPHP וחקירות SQL ');
define('_ACA_ERR_SHOW_TIPS' ,'בחר כן אם ברצונך להראות מספר תקלה על המסך שלך. שמיש בעיקר להצעה לדיבאגינג ');
define('_ACA_ERR_SHOW' ,'הראה תקלות');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'הראה לינקים לא רשומים');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'בחר כן בשביל להראות לינק לביטול הרשמה בתחתית רשימת התפוצה למשתמשים שרוצים לשנות הסכמתם <br /> לא למנוע את תוך המיילים והלינקים');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">הודעה חשובה!</span> <br />אם אתה מעדכן גרסא קודמת של אקאגום תצטרך לעדכן את מבנה בסיס הנתונים על ידי לחיצה על הכפתור הבא (הנתונים שלך ישארו אחידים)');
define('_ACA_UPDATE_INSTALL_BTN' , 'שדרג טבלאות וקונפיגורציה');
define('_ACA_MAILING_MAX_TIME', 'מקסימום זמן תור' );
define('_ACA_MAILING_MAX_TIME_TIPS', 'ציין את זמן המקסימום לכל סט של מכתבים נשלחים בתור. מומלץ בין 30 שניות לשתי דקות');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart שילוב');
define('_ACA_VM_COUPON_NOTIF', 'מזהה הודעות קופונים');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'ציין את המספר המזהה של רשימת התפוצה בה תרצה להשתמש לשליחת קופונים לקונים שלך');
define('_ACA_VM_NEW_PRODUCT', 'New products notification ID');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'ציין את המספר המזהה של רשימת התפוצה בה תרצה להשתמש לשליחת הודעות על מוצרים חדשים');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'צור טופס');
define('_ACA_FORM_COPY', 'קוד HTML');
define('_ACA_FORM_COPY_TIPS', 'העתק את קוד הHTML שנוצר לתוך דף הHTML שלך');
define('_ACA_FORM_LIST_TIPS', 'בחר את הרשימה שתרצה לכלו בטופס');
// update messages
define('_ACA_UPDATE_MESS4' , 'זה לא יכול להשתדרג באופן אוטומטי');
define('_ACA_WARNG_REMOTE_FILE' , 'אין דרך לקבל קובץ מרוחק');
define('_ACA_ERROR_FETCH' , 'תקלה בקליטת קובץ.');

define('_ACA_CHECK' , 'בדוק');
define('_ACA_MORE_INFO' , 'מידע נוסף');
define('_ACA_UPDATE_NEW' , 'שדרג לגרסא חדשה יותר');
define('_ACA_UPGRADE' , 'שדרג למוצר חדש יותר');
define('_ACA_DOWNDATE' , 'חזור לגרסא הקודמת');
define('_ACA_DOWNGRADE' , 'חזור למוצר הבסיסי');
define('_ACA_REQUIRE_JOOM' , 'דרוש גומלה');
define('_ACA_TRY_IT' , 'נסה זאת!');
define('_ACA_NEWER', 'חדש יותר');
define('_ACA_OLDER', 'ישן יותר');
define('_ACA_CURRENT', 'נוכחי');

// since 1.0.9
define('_ACA_CHECK_COMP', 'נסה אחד מרכיבינו הנוספים');
define('_ACA_MENU_VIDEO' , 'מדריכי ווידאו');
define('_ACA_SCHEDULE_TITLE', 'תיזמון אוטומטי של הגדרות פונקציות');
define('_ACA_ISSUE_NB_TIPS' , 'מספר הגיליון יווצר אוטומטית על ידי המערכת' );
define('_ACA_SEL_ALL' , 'כל רשימות התפוצה');
define('_ACA_SEL_ALL_SUB' , 'כל הרשימות');
define('_ACA_INTRO_ONLY_TIPS' , 'אם תסמן תיבה זו, רק ההקדמה של המאמר תוכנה לרשימת התפוצה עם קישור להמשך הקריאה למאמר המלא באתר שלך' );
define('_ACA_TAGS_TITLE' , 'תגית תוכן');
define('_ACA_TAGS_TITLE_TIPS' , 'העתק והדבק תגית זו לתוך רשימת התפוצה היכן שתרצה למקם את התוכן');
define('_ACA_PREVIEW_EMAIL_TEST', 'ציין כתובת דואר אלקטרוני אליה יישלח מבחן');
define('_ACA_PREVIEW_TITLE' , 'תצוגה מקדימה');
define('_ACA_AUTO_UPDATE' , 'הודעות על עידכונים חדשים');
define('_ACA_AUTO_UPDATE_TIPS' , 'בחר כן אם ברצונך לקבל הודעות על עידכונים לרכיבים שלך <br />חשוב!! אופציית הראה טיפים צריכה לפעול בשביל שפונקציה זו תעבוד');

// since 1.1.0
define('_ACA_LICENSE' , 'מידע על הרישיון');

// since 1.1.1
define('_ACA_NEW' , 'חדש');
define('_ACA_SCHEDULE_SETUP', 'בשביל שמענה אוטומטי יישלח, תצטרך להגדיר מתזמן בקונפיגורציה');
define('_ACA_SCHEDULER', 'מתזמן');
define('_ACA_JNEWSLETTER_CRON_DESC' , 'אם אין לך גישה למנהל משימות קרון באתר שלך תוכל להרשם לחשבון אקאגום קרון חינם ב:' );
define('_ACA_CRON_DOCUMENTATION' , 'תוכל למצוא מידע נוסף על הגדרות מתזמן האקאגום בכתובת היו.אר.אל הבאה:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29"
 target="_blank">http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29</a>' );
define( '_ACA_QUEUE_PROCESSED' , 'תור עובד בהצלחה' );
define( '_ACA_ERROR_MOVING_UPLOAD' , 'תקלה בהעברת קובץ מיובא' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , 'תדירות המתזמן' );
define( '_ACA_CRON_MAX_FREQ' , 'תדירות מקסימלית למתזמן' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , 'ציין את התדירות המקסימלית שבה המתזמן ירוץ (בדקות). זה יגביל את המתזמן גם כשמשימת הקרון מכוונת לתדירות גבוהה יותר' );
define( '_ACA_CRON_MAX_EMAIL' , 'מקסימום מכתבי דואר אלקטרוני למשמיה' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , 'ציין את מספר המכתבים המקסימלי שיישלח לכל משימה (0 ללא הגבלה)' );
define( '_ACA_CRON_MINUTES' , ' דקות' );
define( '_ACA_SHOW_SIGNATURE' , 'הראה סיומת עמוד של הדואר' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , 'תרצה או לא לקדם את אקאגום בסוף מכתבי הדואר האלקטרוניים שלך' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , 'מענה אוטומטי עובד בהצלחה' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , 'לוח הזמנים של רשימות התפוצה עובד בהצלחה' );
define( '_ACA_MENU_SYNC_USERS' , 'סנכרן משתמשים' );
define( '_ACA_SYNC_USERS_SUCCESS' , 'סנכרון המשתמשים הצליח!' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'יציאה מהמערכת' );
if (!defined('_CMN_YES')) define( '_CMN_YES', 'כן' );
if (!defined('_CMN_NO')) define( '_CMN_NO', 'לא' );
if (!defined('_HI')) define( '_HI', 'שלום' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'למעלה' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'כפתור' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Logout' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , 'אם תבחר בזה, כותרת המאמר בלבד תוכנס לרשימת התפוצה בצורת לינק למאמר המלא באתר שלך');
define('_ACA_TITLE_ONLY' , 'כותרת בלבד');
define('_ACA_FULL_ARTICLE_TIPS' , 'אם תבחר בזה, המאמר השלם יופיע ברשימת התפוצה');
define('_ACA_FULL_ARTICLE' , 'מאמר שלם');
define('_ACA_CONTENT_ITEM_SELECT_T', 'בחר אייטם תוכן להוסיף להודעה.  <br />העתק והדבק <b>את תגית התוכן</b>לרשימת התפוצה.  תוכל לבחור בטקסט מלא, הקדמה בלבד או כותרת בלבד עם (1,0 או 2 בהתאמה) ');
define('_ACA_SUBSCRIBE_LIST2', 'רשימת תפוצה');

// smart-newsletter function
define('_ACA_AUTONEWS', 'רשימת תפוצה חכמה');
define('_ACA_MENU_AUTONEWS', 'רשימות תפוצה חכמות');
define('_ACA_AUTO_NEWS_OPTION', 'אפשרויות רשימת תפוצה חכמה');
define('_ACA_AUTONEWS_FREQ', 'תדירות רשימת תפוצה');
define('_ACA_AUTONEWS_FREQ_TIPS', 'ציין את התדירות בה תרצה לשלוח רשימת תפוצה חכמה');
define('_ACA_AUTONEWS_SECTION', 'איזור מאמרים');
define('_ACA_AUTONEWS_SECTION_TIPS', 'ציין את האיזור בו תרצה לבחור את טופס המאמר');
define('_ACA_AUTONEWS_CAT', 'קטגוריית מאמרים');
define('_ACA_AUTONEWS_CAT_TIPS', 'Specify the category you want to choose the articles from (All for all article in that section).');
define('_ACA_SELECT_SECTION', 'בחר איזור');
define('_ACA_SELECT_CAT', 'כל הקטגוריות');
define('_ACA_AUTO_DAY_CH8', 'Quaterly');
define('_ACA_AUTONEWS_STARTDATE', 'תאריך התחלה');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'ציין את התאריך בו תרצה להתחיל לשלוח רשימת תפוצה חכמה');
define('_ACA_AUTONEWS_TYPE', 'ביצוע תוכן');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'מאמר שלם: יכלול את כל המאמר ברשימת התפוצה<br />' .
		'פתיחה בלבד: יכלול את רק את ההקדמה של המאמר ברשימת התפוצה<br/>' .
		'כותרת בלבד: יכלול רק את כותרת המאמר ברשימת התפוצה');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = זה יוחלף על ידי רשימת התפוצה החכמה' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'צור / צפה ברשימות תפוצה');
define('_ACA_LICENSE_CONFIG' , 'רישיון' );
define('_ACA_ENTER_LICENSE' , 'הכנס רישיון');
define('_ACA_ENTER_LICENSE_TIPS' , 'הכנס את מספר הרישיון שלך ושמור אותו');
define('_ACA_LICENSE_SETTING' , 'הגדרות רישיון' );
define('_ACA_GOOD_LIC' , 'רשיונך בתוקף' );
define('_ACA_NOTSO_GOOD_LIC' , 'רשיונך לא בתוקף: ' );
define('_ACA_PLEASE_LIC' , 'אנא צור קשר עם שירות התמיכה של jNews לשדרוג הרישיון שלך (license@acajoom.com)' );
define('_ACA_DESC_PLUS', 'אקאגום פלוס הוא המענה האוטומטמי הרציף הראשון לגומלה מערכת ניהול תוכן' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'אקאגום פרו היא מערכת רשימת התפוצה האולטימטיבית לגומלה מערכות ניהול תוכן' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , 'הכנס מפתח');

define('_ACA_ENTER_TOKEN_TIPS' , 'אנא הכנס את מספר המפתח שלך שקיבלת בדואר האלקטרוני כשרכשת jNews ');

define('_ACA_JNEWSLETTER_SITE', 'אתר jNews:');
define('_ACA_MY_SITE', 'האתר שלי:');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'לחץ כאן בכדי לגשת לטופס הרשיון</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , 'אנא מחק את שמופיע בשדה הרישיון עד שיהיה ריק ונסה למלאו שוב<br />  אם הבעיה ממשיכה' );

define( '_ACA_LICENSE_SUPPORT' , 'אם יש לך עדיין שאלות' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , 'תוכל לקבל מדריך הרשיון שלך על ידי הכנסת מספר המפתח שלך וURL האתר שלך (יסומן בירוק בראש העמוד) בטופס הרישיון'
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', 'אחרי שמירת מפתח הרשיון שלח, רשיון יווצר באופן אוטומטי ' .
		' בדרך כלל המפתח יאושר בשתי דקות. בכל מקרה, במקרים מסויימים התהליך יכול לקחת עד 15 דקות<br />' .
		'<br />חזור לבדוק את לוח הבקרה עוד מספר דקות  <br /><br />' .
		'אם לא קיבלת אישור לרישיון בתוך 15  דקות '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , 'מפתח הרישום שלך טרם נכנס לתוקף');
define( '_ACA_UPDATE_CLICK_HERE' , 'אנא בקר <a href="http://www.acajoom.com" target="_blank">www.acajoom.com</a>להורדת הגרסא החדשה ביותר');
define( '_ACA_NOTIF_UPDATE' , 'כדי לקבל עידכונים חדשים הכנס את כתובת הדואר האלקטרוני שלך ולחץ על הרשם');

define('_ACA_THINK_PLUS', 'אם אתה רוצה יותר ממערכת רשימת התפוצה שלך תחשוב PLUS!');
define('_ACA_THINK_PLUS_1', 'מענה אוטומטי רציף');
define('_ACA_THINK_PLUS_2', 'לוח זמנים קבוע מראש לשליחת רשימת תפוצה');
define('_ACA_THINK_PLUS_3', 'לא עוד הגבלת שרת');
define('_ACA_THINK_PLUS_4', 'וכיוצא בזה');

//since 1.2.2
define( '_ACA_LIST_ACCESS', 'גישה לרשימה' );
define( '_ACA_INFO_LIST_ACCESS', 'ציין איזו קבוצת משתמשים יכולה לצפות ולהרשם לקבוצה זו' );
define( 'ACA_NO_LIST_PERM', 'אין לך הרשאות להרשם לרשימה זו' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'ארכיון');
 define('_ACA_MENU_ARCHIVE_ALL', 'הכנס הכל לארכיון');

//Archive Lists
 define('_FREQ_OPT_0', 'אף פעם');
 define('_FREQ_OPT_1', 'כל שבוע');
 define('_FREQ_OPT_2', 'כל שבועיים');
 define('_FREQ_OPT_3', 'כל חודש');
 define('_FREQ_OPT_4', 'כל רבעון');
 define('_FREQ_OPT_5', 'כל שנה');
 define('_FREQ_OPT_6', 'אחר');

define('_DATE_OPT_1', 'צור תאריך');
define('_DATE_OPT_2', 'תאריך שונה');

define('_ACA_ARCHIVE_TITLE', 'הגדרות לארכיון אוטומטי');
define('_ACA_FREQ_TITLE', 'תדירות ארכיון');
define('_ACA_FREQ_TOOL', 'הגדר באיזו תכיפות תרצה שמנהל הארכיון יכניס לארכיון את תוכן האתר');
define('_ACA_NB_DAYS', 'מספר ימים');
define('_ACA_NB_DAYS_TOOL', 'זה לאופציה השניה בלבד! אנא ציין את מספר הימים בין כל ארכיון');
define('_ACA_DATE_TITLE', 'סוג תאריך');
define('_ACA_DATE_TOOL', 'הגדר אם הארכיון צריך להעשות בתאריך בו הוקם או בתאריך שהשתנה');

define('_ACA_MAINTENANCE_TAB', 'הגדרות אחזקה');
define('_ACA_MAINTENANCE_FREQ', 'תדירות האחזקה');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'ציין את התדירות בה תרצה שרוטינת האחזקה תבוצע.' );
define( '_ACA_CRON_DAYS' , 'שעה/ות' );

define( '_ACA_LIST_NOT_AVAIL', 'אין רשימה זמינה');
define( '_ACA_LIST_ADD_TAB', 'הוסף/ערוך' );

define( '_ACA_LIST_ACCESS_EDIT', 'גישה להוספת/עריכת דואר' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'ציין איזו קבוצת משתמשים תוכל להוסיף או לערוך דואר חדש לרשימה זו' );
define( '_ACA_MAILING_NEW_FRONT', 'צור דואר חדש' );

define('_ACA_AUTO_ARCHIVE', 'ארכיון אוטומטי');
define('_ACA_MENU_ARCHIVE', 'ארכיון אוטומטי');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = זה יוחלף במספר הגיליון של רשימת התפוצה');
define('_ACA_TAGS_DATE', '[DATE] = זה יוחלף בתאריך המשלוח');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = זה יוחלף עם ערך שיילקח משדה קמיוניטי בילדר:  eg. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'תחזוקה' );

define('_ACA_THINK_PRO', 'כשיש לך צרכים מקצועיים, אתה משתמש ברכיבים מקצועיים!');
define('_ACA_THINK_PRO_1', 'רשימות תפוצה חכמות');
define('_ACA_THINK_PRO_2', 'הגדר רמת גישה לרשימה שלך');
define('_ACA_THINK_PRO_3', 'הגדר מי יכול לערוך/להוסיף דואר');
define('_ACA_THINK_PRO_4', 'עוד תגיות: הוסף את שדות CB שלך');
define('_ACA_THINK_PRO_5', 'ארכיון אוטומטי של תוכן Joomla');
define('_ACA_THINK_PRO_6', 'אופטימיזצית מאגר המידע');

define('_ACA_LIC_NOT_YET', 'רשיונך טרם אושר. אנא בדוק לשונית רשיון בפאנל הקונפיגורציה');
define('_ACA_PLEASE_LIC_GREEN' , 'דאג לספק את המידע הירוק בראש הלשונית לקבוצת התמיכה שלנו' );

define('_ACA_FOLLOW_LINK' , 'קבל רשיונך');
define( '_ACA_FOLLOW_LINK_TWO' , 'תוכל לקבל רשיונך על ידי הכנסת מספר תזכורת וURL האתר (מודגש בירוק בראש עמוד זה) בטופס הרשיון ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' אז לחץ על כפתור החל בתפריט הימני העליון' );
define( '_ACA_ENTER_LIC_NB', 'הכנס רשיונך' );
define( '_ACA_UPGRADE_LICENSE', 'שדרוג רשיונך');
define( '_ACA_UPGRADE_LICENSE_TIPS' , 'אם קיבלת מפתח לשדרוג הרשיון, אנא הכנס זאת כאן, לחץ על החל והמשך למספר <b>2</b> לקבלת מספר רשיון חדש' );

define( '_ACA_MAIL_FORMAT', 'פורמט קידוד' );
define( '_ACA_MAIL_FORMAT_TIPS', 'באיזה פורמט תרצה להשתמש לקידוד הדואר שלך, טקסט בלבד או MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'אם אין לך גישה למנהל משימות קרון באתר שלך, תוכל להשתמש במרכיב Free jCron בכדי ליצור משימות קרון מהאתר שלך.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'הראה שם מחבר/ים');
define('_ACA_SHOW_AUTHOR_TIPS', 'בחר כן אם ברצונך להוסיף שם מחבר למאמר שנשלח לדיוור');

//since 1.3.5
define('_ACA_REGWARN_NAME','אנא הכנס את שמך');
define('_ACA_REGWARN_MAIL','אנא הכנס אימייל בר-תוקף');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','אם תבחר כן, האימייל של המשתמש יוסף כפרמטר בסוף הURL המכוון מחדש (הקישור המכוון מחדש למודול שלך או לטופס jNews חיצוני)<br/>דבר זה יכול להיות יעיל אם תרצה להשלים סקריפט מיוחד בעמוד המכוון מחדש');
define('_ACA_ADDEMAILREDLINK','הוסף אימייל ללינק המכוון מחדש');

//since 1.6.3
define('_ACA_ITEMID','מזהה פריט');
define('_ACA_ITEMID_TIPS','מזהה פריט יוסף לקישורי jNews שלך.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','הראה את לשונית השילוב ל jCalPRO <br/>(רק אם jCalPRO מותקן באתר שלך!)');
define('_ACA_JCALTAGS_TITLE','תגית jCalPRO:');
define('_ACA_JCALTAGS_TITLE_TIPS','העתק והדבק תגית זו לתוך הדיוור איפה שתרצה שהאירוע ימוקם');
define('_ACA_JCALTAGS_DESC','תיאור:');
define('_ACA_JCALTAGS_DESC_TIPS','בחר כן אם ברצונך להכניס תיאור האירוע');
define('_ACA_JCALTAGS_START','תאריך התחלה:');
define('_ACA_JCALTAGS_START_TIPS','בחר כן אם ברצונך להכניס את תאריך תחילת האירוע');
define('_ACA_JCALTAGS_READMORE','קרא עוד:');
define('_ACA_JCALTAGS_READMORE_TIPS','בחר כן אם תרצה לבחור <b>קרא עוד קישורים</b> לאירוע זה');
define('_ACA_REDIRECTCONFIRMATION','לכוון מחדש כתובת');
define('_ACA_REDIRECTCONFIRMATION_TIPS','אם תבקש מייל אישור, המשתמש יכוון לכתובת  זו אם ילחץ על לינק האישור');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','שמור');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','אין לך חשבון עדיין?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','הרשמה');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','You are not authorised to view this resource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP','Disable Tooltip');
define('_ACA_DISABLETOOLTIP_TIPS', 'Disable the tooltip on the frontend');
define('_ACA_MINISENDMAIL', 'Use Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS', 'If your server uses Mini SendMail, select this option to do not add the name of the user in the header of the e-mail');

//Since 3.1.5
define('_ACA_READMORE','Read more...');
define('_ACA_VIEWARCHIVE','Click here');

//since 4.0.0
define('_ACA_SHOW_JLINKS','Link Tracking');
define('_ACA_SHOW_JLINKS_TIPS','Enables the integration with jLinks to be able to do link tracking for each links in the newsletter.');

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