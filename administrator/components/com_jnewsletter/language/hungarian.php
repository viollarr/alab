<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>Hungarian language file</p>
* @author Joobi Ltd <support@ijoobi.com>
* @version $Id: hungarian.php 401 2006-12-05 15:07:13Z divivo $
* @link http://www.joobiweb.com
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'Az jNews komponens egy hírlevélkezelo, automatikus válaszoló és ellenorzo eszköz a felhasználókkal való kapcsolattartás hatékonysága érdekében.  jNews, az Ön kommunikációs partnere!');
define('_ACA_DESC_GPL', 'Az jNews komponens egy hírlevélkezelo, automatikus válaszoló és ellenorzo eszköz a felhasználókkal való kapcsolattartás hatékonysága érdekében.  jNews, az Ön kommunikációs partnere!');
define('_ACA_FEATURES', 'jNews, az Ön kommunikációs partnere!');

// Type of lists
define('_ACA_NEWSLETTER', 'Hírlevél');
define('_ACA_AUTORESP', 'Automatikus válaszoló');
define('_ACA_AUTORSS', 'Automatikus RSS');
define('_ACA_ECARD', 'eCard');
define('_ACA_POSTCARD', 'Képeslap');
define('_ACA_PERF', 'Muködés');
define('_ACA_COUPON', 'Kupon');
define('_ACA_CRON', 'Idozítés feladat');
define('_ACA_MAILING', 'Levelezés');
define('_ACA_LIST', 'Lista');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Listakezelés');
define('_ACA_MENU_SUBSCRIBERS', 'Feliratkozók');
define('_ACA_MENU_NEWSLETTERS', 'Hírlevelek');
define('_ACA_MENU_AUTOS', 'Automatikus válaszolók');
define('_ACA_MENU_COUPONS', 'Kuponok');
define('_ACA_MENU_CRONS', 'Idozítés feladatok');
define('_ACA_MENU_AUTORSS', 'Automatikus RSS');
define('_ACA_MENU_ECARD', 'eKépeslapok');
define('_ACA_MENU_POSTCARDS', 'Képeslapok');
define('_ACA_MENU_PERFS', 'Muködések');
define('_ACA_MENU_TAB_LIST', 'Listák');
define('_ACA_MENU_MAILING_TITLE', 'Levelezések');
define('_ACA_MENU_MAILING', 'Levelezés: ');
define('_ACA_MENU_STATS', 'Statisztika');
define('_ACA_MENU_STATS_FOR', 'Statisztika: ');
define('_ACA_MENU_CONF', 'Beállítás');
define('_ACA_MENU_UPDATE', 'Frissítések');
define('_ACA_MENU_ABOUT', 'Névjegy');
define('_ACA_MENU_LEARN', 'Képzés központ');
define('_ACA_MENU_MEDIA', 'Média kezelo');
define('_ACA_MENU_HELP', 'Súgó');
define('_ACA_MENU_CPANEL', 'Vezérlopult');
define('_ACA_MENU_IMPORT', 'Import');
define('_ACA_MENU_EXPORT', 'Export');
define('_ACA_MENU_SUB_ALL', 'Mindet felirat');
define('_ACA_MENU_UNSUB_ALL', 'Mindet leirat');
define('_ACA_MENU_VIEW_ARCHIVE', 'Archivum');
define('_ACA_MENU_PREVIEW', 'Elonézet');
define('_ACA_MENU_SEND', 'Küld');
define('_ACA_MENU_SEND_TEST', 'Teszt levél küldés');
define('_ACA_MENU_SEND_QUEUE', 'Feladatsor');
define('_ACA_MENU_VIEW', 'Megtekintés');
define('_ACA_MENU_COPY', 'Másolás');
define('_ACA_MENU_VIEW_STATS', 'Megtekintési statisztika');
define('_ACA_MENU_CRTL_PANEL', ' Vezérlopult');
define('_ACA_MENU_LIST_NEW', ' Új lista');
define('_ACA_MENU_LIST_EDIT', ' Lista szerkesztés');
define('_ACA_MENU_BACK', 'Vissza');
define('_ACA_MENU_INSTALL', 'Telepítés');
define('_ACA_MENU_TAB_SUM', 'Összegzés');
define('_ACA_STATUS', 'Állapot');

// messages
define('_ACA_ERROR', ' Hiba történt! ');
define('_ACA_SUB_ACCESS', 'Hozzáférési jogok');
define('_ACA_DESC_CREDITS', 'Készítok');
define('_ACA_DESC_INFO', 'Információ');
define('_ACA_DESC_HOME', 'Webhely');
define('_ACA_DESC_MAILING', 'Levelezo lista');
define('_ACA_DESC_SUBSCRIBERS', 'Feliratkozók');
define('_ACA_PUBLISHED', 'Publikálva');
define('_ACA_UNPUBLISHED', 'Visszavonva');
define('_ACA_DELETE', 'Törlés');
define('_ACA_FILTER', 'Szuro');
define('_ACA_UPDATE', 'Frissítés');
define('_ACA_SAVE', 'Mentés');
define('_ACA_CANCEL', 'Mégsem');
define('_ACA_NAME', 'Név');
define('_ACA_EMAIL', 'Email');
define('_ACA_SELECT', 'Válasszon!');
define('_ACA_ALL', 'Összes');
define('_ACA_SEND_A', 'Küldés: ');
define('_ACA_SUCCESS_DELETED', ' sikeresen törölve');
define('_ACA_LIST_ADDED', 'A lista sikeresen elkészült');
define('_ACA_LIST_COPY', 'A lista sikeresen másolva');
define('_ACA_LIST_UPDATED', 'A lista sikeresen frissítve');
define('_ACA_MAILING_SAVED', 'A levelezés sikeresen mentve.');
define('_ACA_UPDATED_SUCCESSFULLY', 'sikeresen frissítve.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Feliratkozói információk');
define('_ACA_VERIFY_INFO', 'Ellenorizze a beküldött linket, néhány információ elveszett.');
define('_ACA_INPUT_NAME', 'Név');
define('_ACA_INPUT_EMAIL', 'Email');
define('_ACA_RECEIVE_HTML', 'HTML formátum?');
define('_ACA_TIME_ZONE', 'Idozóna');
define('_ACA_BLACK_LIST', 'Fekete lista');
define('_ACA_REGISTRATION_DATE', 'Felhasználói regisztrációs dátum');
define('_ACA_USER_ID', 'Felhasználó az');
define('_ACA_DESCRIPTION', 'Leírás');
define('_ACA_ACCOUNT_CONFIRMED', 'A regisztrációja aktíválva.');
define('_ACA_SUB_SUBSCRIBER', 'Feliratkozó');
define('_ACA_SUB_PUBLISHER', 'Publikáló');
define('_ACA_SUB_ADMIN', 'Adminisztrátor');
define('_ACA_REGISTERED', 'Regisztrált');
define('_ACA_SUBSCRIPTIONS', 'Feliratkozások');
define('_ACA_SEND_UNSUBCRIBE', 'Leiratkozási üzenet küldése');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Kattintson az Igen-re a leiratkozást megerosíto levél elküldéséhez!');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Kérjük, erosítse meg a feliratkozását!');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Leiratkozás megerosítése');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Kedves [NAME]!<br /><br />Még egy lépést kell megtennie a feliratkozás befejezéséig. Kattintson az alábbi linkre a feliratkozás megerosítéséhez!<br /><br />[CONFIRM]<br /><br />Bármilyen kérdéssel forduljon az adminisztrátorhoz!<br /><br />Varanka Zoltán<br />(webmester - adminisztrátor)');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Kedves [NAME]!<br /><br />Ez egy megerosíto levél a hírlevél lemondásához. Sajnáljuk a döntését. Természetesen bármikor újra feliratkozhat a listára. Bármilyen kérdéssel forduljon az adminisztrátorhoz!<br /><br />Varanka Zoltán<br />(webmester - adminisztrátor)');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Bejelentkezési dátum');
define('_ACA_CONFIRMED', 'Megerosítve');
define('_ACA_SUBSCRIB', 'Feliratkozás');
define('_ACA_HTML', 'HTML levelezések');
define('_ACA_RESULTS', 'Eredmények');
define('_ACA_SEL_LIST', 'Válasszon egy listát!');
define('_ACA_SEL_LIST_TYPE', '- Válasszon egy listatípust! -');
define('_ACA_SUSCRIB_LIST', 'Feliratkozók teljes listája');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Feliratkozók : ');
define('_ACA_NO_SUSCRIBERS', 'Ebben a listában nincsenek feliratkozók.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Küldtünk Önnek egy megerosíto levelet. Nézze át a postaládáját és kattintson a levélben levo linkre.<br />A feliratkozását meg kell erosítenie a levél segítségével.');
define('_ACA_SUCCESS_ADD_LIST', 'Ön sikeresen bekerült a listába.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Kattintson ide a feliratkozás megerosítéséhez!');
define('_ACA_UNSUBSCRIBE_LINK', 'Kattintson ide a leiratkozáshoz!');
define('_ACA_UNSUBSCRIBE_MESS', 'Az Ön email címét eltávolítottuk a listából!');

define('_ACA_QUEUE_SENT_SUCCESS', 'Minden levél sikeresen elküldésre került.');
define('_ACA_MALING_VIEW', 'Levelezések megtekintése');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Biztosan szeretne leiratkozni a listáról?');
define('_ACA_MOD_SUBSCRIBE', 'Feliratkozás');
define('_ACA_SUBSCRIBE', 'Feliratkozás');
define('_ACA_UNSUBSCRIBE', 'Leiratkozás');
define('_ACA_VIEW_ARCHIVE', 'Archívum megtekintése');
define('_ACA_SUBSCRIPTION_OR', ' vagy kattintson ide az Ön információinak a frissítéséhez!');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Ez az email cím már a listában van.');
define('_ACA_SUBSCRIBER_DELETED', 'A feliratkozó sikeresen törölve.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Felhasználói vezérlopult');
define('_UCP_USER_MENU', 'Felhasználói menü');
define('_UCP_USER_CONTACT', 'Feliratkozásaim');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Idozíto feladat kezelo');
define('_UCP_CRON_NEW_MENU', 'Új idozítés');
define('_UCP_CRON_LIST_MENU', 'Idozítom listája');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Kupon kezelo');
define('_UCP_COUPON_LIST_MENU', 'Kupon lista');
define('_UCP_COUPON_ADD_MENU', 'Új kupon hozzáadás');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Leírás');
define('_ACA_LIST_T_LAYOUT', 'Kialakítás');
define('_ACA_LIST_T_SUBSCRIPTION', 'Feliratkozás');
define('_ACA_LIST_T_SENDER', 'Infó a küldorol');

define('_ACA_LIST_TYPE', 'Lista típus');
define('_ACA_LIST_NAME', 'Lista név');
define('_ACA_LIST_ISSUE', 'Kiadás száma');
define('_ACA_LIST_DATE', 'Küldés dátuma');
define('_ACA_LIST_SUB', 'Tárgy');
define('_ACA_ATTACHED_FILES', 'Csatolt fájlok');
define('_ACA_SELECT_LIST', 'Válassza ki a szerkesztendo listát!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Lista típus');
define('_ACA_AUTO_RESP_OPTION', 'Automatikus válaszoló opciók');
define('_ACA_AUTO_RESP_FREQ', 'A feliratkozók kiválaszthatják a gyakoriságot');
define('_ACA_AUTO_DELAY', 'Késleltetés (napokban)');
define('_ACA_AUTO_DAY_MIN', 'Minimális gyakoriság');
define('_ACA_AUTO_DAY_MAX', 'Maximális gyakoriság');
define('_ACA_FOLLOW_UP', 'Az automatikus válaszoló beállítása');
define('_ACA_AUTO_RESP_TIME', 'A feliratkozók idot választhatnak');
define('_ACA_LIST_SENDER', 'Lista küldo');

define('_ACA_LIST_DESC', 'Lista leírás');
define('_ACA_LAYOUT', 'Kialakítás');
define('_ACA_SENDER_NAME', 'Küldo neve');
define('_ACA_SENDER_EMAIL', 'Küldo email címe');
define('_ACA_SENDER_BOUNCE', 'Küldo válasz címe');
define('_ACA_LIST_DELAY', 'Késleltetés');
define('_ACA_HTML_MAILING', 'HTML levél?');
define('_ACA_HTML_MAILING_DESC', '(ha megváltoztatja ezt, mentenie kell majd visszatérni ehhez a képernyohöz a változások megtekintésére.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Elrejtés a webes felületen?');
define('_ACA_SELECT_IMPORT_FILE', 'Válassza ki az importálandó fájlt!');;
define('_ACA_IMPORT_FINISHED', 'Az importálás befejezodött');
define('_ACA_DELETION_OFFILE', 'Fájl törlése');
define('_ACA_MANUALLY_DELETE', 'meghiusult, kézzel kell törölnie a fájlt');
define('_ACA_CANNOT_WRITE_DIR', 'A könyvtár nem írható');
define('_ACA_NOT_PUBLISHED', 'A levél nem küldheto el, a lista nincs publikálva.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Kattintson ide a lista publikálásához!');
define('_ACA_INFO_LIST_NAME', 'Adja meg a lista nevét itt! Ezzel a névvel azonosíthatja a listát!');
define('_ACA_INFO_LIST_DESC', 'Adja meg a lista rövid leírását! Ezt a leírást látják a felhasználók.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Adja meg a levél küldojének a nevét! Ezt a nevetlátják a feliratkozók, amikor levelet kapnak a listáról.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Adja meg azt az email címet, ahonnan az üzenetek küldésre kerülnek.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Adja meg azt az email címet,, ahova a feliratkozók válaszolhatnak. Ajánlatos, hogy ez megegyezzen a küldo email címmel, mivel a spam szurok magasabb kockázatként kezelik, ha ezek különbözoek.');
define('_ACA_INFO_LIST_AUTORESP', 'Válassza ki a levelezés típusát ehhez a listához!<br />Hírlevél: normál hírlevél<br />Automatikus válaszoló: ez egy lista, amely megadott idoközönként küld levelet.');
define('_ACA_INFO_LIST_FREQUENCY', 'A felhasznlók megválaszthatják, hogy milyen gyakran kapjanak levelet. Ez nagy rugalmasságot biztosít.');
define('_ACA_INFO_LIST_TIME', 'A felhasználók megválaszthatják, hogy a hát melyik napján kapjanak levelet.');
define('_ACA_INFO_LIST_MIN_DAY', 'Milyen legyen az a minimális gyakoriság, amelyet a felhasználók megválaszthatnak, ha be akarják állítani a levelek fogadásának gyakorisságát?');
define('_ACA_INFO_LIST_DELAY', 'Adja meg a késleltetést az elozo és ezen automatikus válaszoló között!');
define('_ACA_INFO_LIST_DATE', 'Adja meg, mikor legyen publikálva a herlevél, ha késleltetettnek lett beállítva!<br /> Formátum: ÉÉÉÉ-HH-NN ÓÓ:PP:MM');
define('_ACA_INFO_LIST_MAX_DAY', 'Milyen legyen az a maximális gyakoriság, amelyet a felhasználók megválaszthatnak, ha be akarják állítani a levelek fogadásának gyakorisságát?');
define('_ACA_INFO_LIST_LAYOUT', 'Itt adhatja meg a levél kialakítását. Bármilyen kialakítást megadhat.');
define('_ACA_INFO_LIST_SUB_MESS', 'Ez a levél kerül elküldésre a felhasználónak az elso feliratkozáskor. Bármilyen szöveget meg lehet itt adni.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Ez a levél kerül elküldésre a felhasználónak az leiratkozik. Bármilyen szöveget meg lehet itt adni.');
define('_ACA_INFO_LIST_HTML', 'Pipálja ki a kijelölodobozt, ha HTMLformában akarja a levelet elküldeni. A feliratkozók megadhatják, hogy HTML vagy szöveges formában kívánják-e fogadnia leveleket, amikor egy HTML listára iratkoznak fel.');
define('_ACA_INFO_LIST_HIDDEN', 'Kattintson az Igen-re a lista elrejtéséhez a webes felületen, a felhasználók ugyan nem iratkozhatnak fel,de azért meg lehet levelet küldeni.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Szeretné, hogy a felhasználók automatikusan feliratkozzanak erre a listára?<br /><B>Új felhasználók:</B>minden új felhasználó, aki regisztrál, feliratkozó is lesz egyben.<br /><B>Összes felhasználó:</B> minden regisztrált felhasználó feliratkozó is lesz egyben.<br />(támogatja a Community Buildert)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Válassza ki a webes felület hozzáférési szintjét! Ez megjeleníti vagy elrejti a levelezést azon csoportok esetén, amelynek nincs hozzáférési joga, tehát nem tudnak feliratkozni.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Válassza ki a hozzáférési szintjét annak a csoportnak, amelynek engedélyezni szeretmé a szerkesztést. Ez és az e feletti csoport szerkesztheti a levelezést és levelet küldhet ki mind a webes mind az adminisztrációs felületrol.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Ha szeretné az automatikus válaszolót egy másokba mozgatni, amint eléri az utolsó üzenetet, megadhatja itt a nyomköveto automatikus válaszolót.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Ez a listát lértehozó személy azonosítója.');
define('_ACA_INFO_LIST_WARNING', '   Ez az utolsó opció csak a lista létrehozásakor elérheto.');
define('_ACA_INFO_LIST_SUBJET', ' A levelezés tárgya. Ez a szöveg kerül a levél tárgyába.');
define('_ACA_INFO_MAILING_CONTENT', 'Ez az elküldendo levél törzse.');
define('_ACA_INFO_MAILING_NOHTML', 'Adja meg a levél törzsét, amelyet azoknak a feliratkozóknak kell elküldeni, akik csak szöveges levelet fogadnak. <BR/> Megjegyzés: ha üresen hagyja, a html formátumú szövegrész kerül ide szöveges formátumban.');
define('_ACA_INFO_MAILING_VISIBLE', 'Kattintson az Igen-re a levelezések megjelenítéséhez a webes felületen.');
define('_ACA_INSERT_CONTENT', 'Létezo tartalom beszúrása');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'A kupon sikeresen elküldve!');
define('_ACA_CHOOSE_COUPON', 'Válasszon kupont!');
define('_ACA_TO_USER', ' ennek a felhasználónak');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Minden órában');
define('_ACA_FREQ_CH2', 'Minden 6 órában');
define('_ACA_FREQ_CH3', 'Minden 12 órában');
define('_ACA_FREQ_CH4', 'Naponta');
define('_ACA_FREQ_CH5', 'Hetente');
define('_ACA_FREQ_CH6', 'Havonta');
define('_ACA_FREQ_NONE', 'Nem');
define('_ACA_FREQ_NEW', 'Új felhasználól');
define('_ACA_FREQ_ALL', 'Összes felhasználó');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews idozíto?');
define('_ACA_LABEL_FREQ_TIPS', 'Kattintson az Igen-re, ha használni szeretné az jNews idozítotCron, A Nem beállítása más idozíto használatát teszi lehetové.<br />Ha az Igem-re kattint, nem kell megadnia az idozíto címét, ez automatikusan hozzáadódik.');
define('_ACA_SITE_URL', 'Az Ön webhelyének URL-je');
define('_ACA_CRON_FREQUENCY', 'Idozíto gyakoriság');
define('_ACA_STARTDATE_FREQ', 'Kezdo dátum');
define('_ACA_LABELDATE_FREQ', 'Adja meg a dátumot!');
define('_ACA_LABELTIME_FREQ', 'Adja meg az idot!');
define('_ACA_CRON_URL', 'Idozíto URL');
define('_ACA_CRON_FREQ', 'Gyakoriság');
define('_ACA_TITLE_CRONLIST', 'Idozíto lista');
define('_NEW_LIST', 'Új lista készítése');

//title CRON form
define('_ACA_TITLE_FREQ', 'Idozíto szerkesztése');
define('_ACA_CRON_SITE_URL', 'Érvényes webhely URL-t adjon meg, kezdje http://-vel!');

### Mailings ###
define('_ACA_MAILING_ALL', 'Összes levelezés');
define('_ACA_EDIT_A', 'Szerkesztés: ');
define('_ACA_SELCT_MAILING', 'Válasszon egy listát a legördülo menüben új levelezés hozzáadásához!');
define('_ACA_VISIBLE_FRONT', 'Látható a webes felületen');

// mailer
define('_ACA_SUBJECT', 'Tárgy');
define('_ACA_CONTENT', 'Tartalom');
define('_ACA_NAMEREP', '[NAME] = A feliratkozó nevére cserélodik ki ez a kód, ezzel személyre szabhatja a levelet.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = A feliratkozó vezetéknevére (elso név) cserélodik ki ez a kód.<br />');
define('_ACA_NONHTML', 'Nem-html verzió');
define('_ACA_ATTACHMENTS', 'Mellékletek');
define('_ACA_SELECT_MULTIPLE', 'Tartsa lenyomva a CTRL (vagy a Command) gombot több melléklet kiválasztásához.<br />A mellékletek listájában megjeleno fájlokat egy külön könyvtárban helyezheti el, ez a könyvtár beállítható a beállítások paneljén.');
define('_ACA_CONTENT_ITEM', 'Tartalmi elem');
define('_ACA_SENDING_EMAIL', 'Levél küldése');
define('_ACA_MESSAGE_NOT', 'A levél nem küldheto el');
define('_ACA_MAILER_ERROR', 'Levélküldési hiba');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'A levél sikeresen elküldve');
define('_ACA_SENDING_TOOK', 'A levél elkóldése');
define('_ACA_SECONDS', 'másodpercet vett igénybe');
define('_ACA_NO_ADDRESS_ENTERED', 'Nincs email cím vagy feliratkozó megadva!');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Változtatás');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Változtat a feliratkozáson?');
define('_ACA_WHICH_EMAIL_TEST', 'Adja meg a tesztelésre használt email címet vagy válassza az elonézetet!');
define('_ACA_SEND_IN_HTML', 'Küldés HTML módban (HTML leveleknél)?');
define('_ACA_VISIBLE', 'Látható');
define('_ACA_INTRO_ONLY', 'Csak bevezeto');

// stats
define('_ACA_GLOBALSTATS', 'Globalis statisztika');
define('_ACA_DETAILED_STATS', 'Részletes statisztika');
define('_ACA_MAILING_LIST_DETAILS', 'Lista részletek');
define('_ACA_SEND_IN_HTML_FORMAT', 'Küldés HTML formátumban');
define('_ACA_VIEWS_FROM_HTML', 'Megtekintve (csak html leveleknél)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Küldés szöveges formátumban');
define('_ACA_HTML_READ', 'HTML olvasott');
define('_ACA_HTML_UNREAD', 'HTML nem olvasott');
define('_ACA_TEXT_ONLY_SENT', 'Csak szöveg');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Levél');
define('_ACA_LOGGING_CONFIG', 'Napló-statisztika');
define('_ACA_SUBSCRIBER_CONFIG', 'Feliratkozók');
define('_ACA_MISC_CONFIG', 'Egyéb');
define('_ACA_MAIL_SETTINGS', 'Levél beállítások');
define('_ACA_MAILINGS_SETTINGS', 'Levelezési beállítások');
define('_ACA_SUBCRIBERS_SETTINGS', 'Feliratkozó beállítások');
define('_ACA_CRON_SETTINGS', 'Idozíto beállítások');
define('_ACA_SENDING_SETTINGS', 'Küldési beállítások');
define('_ACA_STATS_SETTINGS', 'Statisztikai beállítások');
define('_ACA_LOGS_SETTINGS', 'Napló beállítások');
define('_ACA_MISC_SETTINGS', 'Egyéb beállítások');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Küldo email');
define('_ACA_SEND_MAIL_NAME', 'Küldo név');
define('_ACA_MAILSENDMETHOD', 'Levélküldo mód');
define('_ACA_SENDMAILPATH', 'Sendmail útvonal');
define('_ACA_SMTPHOST', 'SMTP kiszolgáló');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP hitelesítés szükséges');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Válassza az Igen-t, ha az MTP szerver hitelesítést igényel');
define('_ACA_SMTPUSERNAME', 'SMTP felhasználónév');
define('_ACA_SMTPUSERNAME_TIPS', 'Adja meg az SMTP felhasználónevet, ha az SMTP szerver hitelesítést igényel!');
define('_ACA_SMTPPASSWORD', 'SMTP jelszó');
define('_ACA_SMTPPASSWORD_TIPS', 'Adja meg az SMTP jelszót, ha az SMTP szerver hitelesítést igényel!');
define('_ACA_USE_EMBEDDED', 'Beágyazott képek');
define('_ACA_USE_EMBEDDED_TIPS', 'Válassza az Igen-t, ha a mellékelt képeket be kell ágyazni a levélbe html formátum esetén vagy a Nem-et, ha a képek linkjeit szeretné elküldeni a levélben.');
define('_ACA_UPLOAD_PATH', 'Feltöltési/csatolási útvonal');
define('_ACA_UPLOAD_PATH_TIPS', 'Megadhatja a feltöltési könyvtárat.<br />Ellenorizze, hogy a könyvtár létezik-e, ha szükséges hozza létre!');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Nem regisztráltak is');
define('_ACA_ALLOW_UNREG_TIPS', 'Válassza az Igen-t, ha a nem regisztrált felhasználók is feliratkozhatnak a listákra.');
define('_ACA_REQ_CONFIRM', 'Megerosítés szükséges');
define('_ACA_REQ_CONFIRM_TIPS', 'Válassza az Igen-t, ha a nem regisztrált felhasználóknak meg kell erosíteniük az email címüket.');
define('_ACA_SUB_SETTINGS', 'Feliratkozási beállítások');
define('_ACA_SUBMESSAGE', 'Feliratkozó levél');
define('_ACA_SUBSCRIBE_LIST', 'Feliratkozás egy listára');

define('_ACA_USABLE_TAGS', 'Használható címkék');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Kattintható linket készít, amellyel a feliratkozó megerosítheti a feliratkozását. Ez <strong>szükséges</strong> az jNews megfelelo muködéséhez.<br /><br />[NAME] = Lecserélodik a feliratkozó nevére, személyreszabva a küldött levelet.<br /><br />[FIRSTNAME] = Lecserélodik a feliratkozó elso nevére (vezetéknév).<br />');
define('_ACA_CONFIRMFROMNAME', 'Megerosíto feladó név');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Adja meg a megerosíto listában megjeleno nevet!');
define('_ACA_CONFIRMFROMEMAIL', 'Megerosító feladó email cím');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Adja meg a megerosíto listában megjeleno email címet!');
define('_ACA_CONFIRMBOUNCE', 'Válasz cím');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Adja meg a megerosíto listában megjeleno válasz email címet!');
define('_ACA_HTML_CONFIRM', 'HTML megerosítés');
define('_ACA_HTML_CONFIRM_TIPS', 'Vélassza az Igen-t, ha a megerosíto levelet html formában szeretné elküldeni, ha a feliratjozó lehetové teszi a html levél fogadását..');
define('_ACA_TIME_ZONE_ASK', 'Rákérdezés az idozónára');
define('_ACA_TIME_ZONE_TIPS', 'Válassza az Igen-t, ha rá szeretne kérdezni a felhasználó idozónájára. A levél a felhasználónak megfelelo idozóna szerinti idoben lesz elküldve, ahol ez alkalmazható.');

 // Cron Set up
define('_ACA_AUTO_CONFIG', 'Idozíto');
define('_ACA_TIME_OFFSET_URL', 'kattintson ide az eltolás beállításához az General Settings oldal Locale fülén');
define('_ACA_TIME_OFFSET_TIPS', 'Beállítja a szerver idoeltolását, hogy a felvett dátum és ido adatok pontosak legyenek');
define('_ACA_TIME_OFFSET', 'Ido eltolás');
define('_ACA_CRON_DESC', '<br />Az idozíto funkcióval automatikus feladatot lehet beállítani a Joomla webhelyen!<br />Beállításához az alábbi utasítást kell adni az idozíto vezérlopulthoz:<br /><b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> <br /><br />Ha segítségre van szüksége, keresse fel a <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a> oldal fórumát!');
// sending settings
define('_ACA_PAUSEX', 'Várakozzon x másodpercet minden beállított mennyiségu levélnél');
define('_ACA_PAUSEX_TIPS', 'Adja meg azt at idot másodpercben, ameddig az jNews várakozik, mielott a következo adag levelet elküldi.');
define('_ACA_EMAIL_BET_PAUSE', 'Levéladagok száma');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Az egyszerre elküldheto levelek száma.');
define('_ACA_WAIT_USER_PAUSE', 'Várakozás felhasználói bevitelte');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Két adag levél elküldése közben várakozzon-e a program felhasználói bevitelre?');
define('_ACA_SCRIPT_TIMEOUT', 'Ido kifutás');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Ido másodpercben, ameddig a program futhat.');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Statisztika olvasásának engedélyezése');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Válasszon Igen-t, ha szeretné naplózni a megtekintések számát. Ez csak html leveleknél használható');
define('_ACA_LOG_VIEWSPERSUB', 'Megtekintések naplózása feliratkozókként');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Válasszon Igen-t, ha szeretné naplózni a megtekintések számát felhasználókként. Ez csak html leveleknél használható');
// Logs settings
define('_ACA_DETAILED', 'Részletes napló');
define('_ACA_SIMPLE', 'Egyszeru napló');
define('_ACA_DIAPLAY_LOG', 'Napló megjelenítése');
define('_ACA_DISPLAY_LOG_TIPS', 'Válassza az Igen-t, ha szeretné megjeleníteni a naplózást a levelek elküldése során.');
define('_ACA_SEND_PERF_DATA', 'Küldési muvelet');
define('_ACA_SEND_PERF_DATA_TIPS', 'Válassza az Igen-t, ha szeretne jelentést kapni a beállításokról, a feliratkozók számáról és az elküldés idotartamáról. Ez informáiót ad az jNews muködésérol.');
define('_ACA_SEND_AUTO_LOG', 'Napló elküldése az automatikus válaszolónak.');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Válassza az Igen-t, ha a naplót szeretné elküldeni minden alkalommal, amikor a rendszer levelet küld. Figyelem: ez nagy méretu levelet is jelenthet.');
define('_ACA_SEND_LOG', 'Napló küldése');
define('_ACA_SEND_LOG_TIPS', 'Küldjön-e naplót a rendszer a levél küldojének a címére.');
define('_ACA_SEND_LOGDETAIL', 'Részletes napló küldése');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Információ arról, hogy sikeres volt-e a levél elküldése az egyes feliratkozóknak. Alapban csak áttekintést küld.');
define('_ACA_SEND_LOGCLOSED', 'Napló küldése, ha megszakad a kapcsolat');
define('_ACA_SEND_LOGCLOSED_TIPS', 'Ezzel az opcióval a küldo minden esetben jelentést kap az elküldésekrol.');
define('_ACA_SAVE_LOG', 'Napló mentése');
define('_ACA_SAVE_LOG_TIPS', 'A levelezés naplóbejegyzése bekerüljön-e a naplófájlba?');
define('_ACA_SAVE_LOGDETAIL', 'Részletes napló mentése');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'A részletes bejegyzés tartalmazza minden feliratkozóhoz elküldött levél sikerességét vagy meghiúsulását. At egyszeru csak áttekintést ad.');
define('_ACA_SAVE_LOGFILE', 'Naplófájl mentése');
define('_ACA_SAVE_LOGFILE_TIPS', 'Az a fájl, amibe a naplóbejegyzés kerül.Ez a fájl nagy méreture is növekedhet.');
define('_ACA_CLEAR_LOG', 'Napló törlése');
define('_ACA_CLEAR_LOG_TIPS', 'Törli a napló fájl tartalmát.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Utoljára lefuttatott feladat');
define('_ACA_CP_TOTAL', 'Összes');
define('_ACA_MAILING_COPY', 'A levelezés sikeresen másolva!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Sorvezeto használata');
define('_ACA_SHOW_GUIDE_TIPS', 'Jelenítse meg a sorvezetot a használat elején segítve az új felhasználókat egy hírlvél, egy automatikus válaszoló létrehozásában és az jNews megfelelo beállításában.');
define('_ACA_AUTOS_ON', 'Automatikus válaszolók használata');
define('_ACA_AUTOS_ON_TIPS', 'Válasszon Nem-et, ha nem akarja használni az automatikus válaszokókat, minden automatikus válaszoló kikapcsol.');
define('_ACA_NEWS_ON', 'Hírlevelek használata');
define('_ACA_NEWS_ON_TIPS', 'Válasszon Nem-t, ha nem akarja használni a hírleveleket, minden hírlevél opció kikapcsol.');
define('_ACA_SHOW_TIPS', 'Tippek megjelenítése');
define('_ACA_SHOW_TIPS_TIPS', 'Tippek megjelenítése a nagyobb hatékonyság érdekében.');
define('_ACA_SHOW_FOOTER', 'Lábléc megjelenítése');
define('_ACA_SHOW_FOOTER_TIPS', 'Megjelenjen-e a lábléc a copyright szöveggel.');
define('_ACA_SHOW_LISTS', 'Listák megjelenítése a webes felületen');
define('_ACA_SHOW_LISTS_TIPS', 'Ha a felhasználó nincs bejelentkezve, megjeleníti a listát illetve bejelentkezhetnek vagy regisztrálhatnak.');
define('_ACA_CONFIG_UPDATED', 'A konfigurációs beálítások frissítve!');
define('_ACA_UPDATE_URL', 'URL frissítése');
define('_ACA_UPDATE_URL_WARNING', 'Figyelem! Ne változtassa meg az URL-t, hacsak nem kért engedélyt az jNews technikai csapatától.<br />');
define('_ACA_UPDATE_URL_TIPS', 'Például: http://www.ijoobi.com/update/ (tartalmazza a lezáró perjelet)');

// module
define('_ACA_EMAIL_INVALID', 'A megadott email cím érvénytelen!');
define('_ACA_REGISTER_REQUIRED', 'Regisztráljon a feliratkozás elott!');

// Access level box
define('_ACA_OWNER', 'Lista készíto:');
define('_ACA_ACCESS_LEVEL', 'Adja meg a lista hozzáférésének a szintjét!');
define('_ACA_ACCESS_LEVEL_OPTION', 'Hozzáférési szint opciók');
define('_ACA_USER_LEVEL_EDIT', 'Válassza ki, melyik szintnek van engedélyezve a levelezések szerkesztése (a webes vagy az adminisztrációs felületrol');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Naponta');
define('_ACA_AUTO_DAY_CH2', 'Naponta hétvége kivételével');
define('_ACA_AUTO_DAY_CH3', 'Minden másnap');
define('_ACA_AUTO_DAY_CH4', 'Minden másnap hétvége kivételével');
define('_ACA_AUTO_DAY_CH5', 'Hetente');
define('_ACA_AUTO_DAY_CH6', 'Kéthetente');
define('_ACA_AUTO_DAY_CH7', 'Havonta');
define('_ACA_AUTO_DAY_CH9', 'Évente');
define('_ACA_AUTO_OPTION_NONE', 'Nem');
define('_ACA_AUTO_OPTION_NEW', 'Új felhasználók');
define('_ACA_AUTO_OPTION_ALL', 'Összes felhasználó');

//
define('_ACA_UNSUB_MESSAGE', 'Leiratkozó levél');
define('_ACA_UNSUB_SETTINGS', 'Leiratkozó beállítások');
define('_ACA_AUTO_ADD_NEW_USERS', 'Felhasználók automatikus feliratkozása?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Jelenleg nincs elérheto frissítés.');
define('_ACA_VERSION', 'jNews verzió');
define('_ACA_NEED_UPDATED', 'Frissítendo fájlok:');
define('_ACA_NEED_ADDED', 'Hozzáadandó fájlok:');
define('_ACA_NEED_REMOVED', 'Eltávolítandó fájlok:');
define('_ACA_FILENAME', 'Fájlnév:');
define('_ACA_CURRENT_VERSION', 'Aktuális verzió:');
define('_ACA_NEWEST_VERSION', 'Legfrissebb verzió:');
define('_ACA_UPDATING', 'Frissítés');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'A fájlok sikeresen frissítve.');
define('_ACA_UPDATE_FAILED', 'A frissítés meghiúsult');
define('_ACA_ADDING', 'Hozzáadás');
define('_ACA_ADDED_SUCCESSFULLY', 'Sikeresen hozzáadva.');
define('_ACA_ADDING_FAILED', 'A hozzáadás meghiúsult!');
define('_ACA_REMOVING', 'Eltávolítás');
define('_ACA_REMOVED_SUCCESSFULLY', 'Sikeresen eltávolítva.');
define('_ACA_REMOVING_FAILED', 'Az eltávolítás meghiúsult!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Másik verzió telepítése');
define('_ACA_CONTENT_ADD', 'Tartalom hozzáadás');
define('_ACA_UPGRADE_FROM', 'Adatok importálása (névlevél és feliratkozó információ) : ');
define('_ACA_UPGRADE_MESS', 'A létezo adatok nincsenek veszélyben.<br />Ez a muvelet csak importálja az adatokat az jNews adatbázisába.');
define('_ACA_CONTINUE_SENDING', 'Küldés folytatása');

// jNews message
define('_ACA_UPGRADE1', 'Könnyen importálhatja a felhasználókat és a hírleveleket: ');
define('_ACA_UPGRADE2', ' az jNewsba a frissítési panelen.');
define('_ACA_UPDATE_MESSAGE', 'Elérheto az jNews új verziója! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Kattintson ide a frissítéshez!');
define('_ACA_THANKYOU', 'Köszönjük, hogy az jNews-ot, az Ön kommunikációs partnerét választotta!');
define('_ACA_NO_SERVER', 'A frissíto szerver nem érheto el, ellenorizze késobb!');
define('_ACA_MOD_PUB', 'Az jNews modul még nincs publikálva!');
define('_ACA_MOD_PUB_LINK', 'Kattintson ide a publikáláshoz!');
define('_ACA_IMPORT_SUCCESS', 'Sikeresen importálva');
define('_ACA_IMPORT_EXIST', 'A feliratkozó már az adatbázisban van');

// jNews's Guide
define('_ACA_GUIDE', ' varázsló');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>Az jNews számtalan sajátsággal rendelkezik, ez a varázsló végig vezeti Önt négy egyszeru lépésen, amellyel el tudja készíteni hírleveleit és automatikus válaszolóit!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Elso lépésként létre kell hozni egy listát. Egy lista két típus egyike lehet vagy hírlevél vagy automatikus válaszoló. A listában paraméterekkel lehet szabályozni a hírlevelek küldését és és az automatikus válaszolók muködését: küldo neve, kialakítás, feliratkozók üdvözlo üzenetei stb.<br /><br />Itt készítheti el az elso listát: <a href="index2.php?option=com_jnewsletter&act=list" >lista készítés</a> és kattintson a New gombon!');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'Az jNews lehetoséget nyújt egy korábbi hírlevél rendszervol adatok importálására.<br />Menjen a Frissítés panelre és válassza ki azt a hírlevél rendszert, ahonnan importálni szeretné a hírleveleket és a feliratkozókat.<br /><br /><span style="color:#FF5E00;" >Fontos: az importálás nem érinti a korábbi hírlevél rendszer adatait.</span><br />Az importálás után a levelezéseket és a feliratkozókat közvetlenül az jNews-ban tudja kezelni.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Gratulákunk, elkészült az elso lista!  Megírhatja az elso valamit: %s.  Ehhet menjen ide: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Automatikus válaszoló kezelo');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Hírlevél kezelo');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' és válassza ki: %s. <br />Majd válassza: %s a legördülo listában. Az elso levelezés elkészítéséhez kattintson a New gombra!');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Mielott elküldi az elso hírlevelet, be kell állítani a levelezési konfigurációt. Menjen a <a href="index2.php?option=com_jnewsletter&act=configuration" >beállítások oldalra</a> ellenorizni a beállításokat. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Ha ez kész, menjen vissza a Hírlevelek menübe és válassza ki a levelet és kattintson a Küldés gombra!');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Az elso automatikus véálaszoló hasznlatához egy idozítot kell beállítania a szerveren. Keresse meg a beállítások panelen az Idozíto fület! <a href="index2.php?option=com_jnewsletter&act=configuration" >Kattintson ide</a> az idozíto beállításával kapcsolatps további információkért!<br />');

define('_ACA_GUIDE_MODULE', ' <br />Ellenorizze, hogy publikálta-e az jNews modult, amivel a érdeklodok feliratkozhatnak a listára.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Beállíthatja az automatikus válaszolót is.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Beállíthat egy hírlevelet is!');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Ön készen áll a hatékony kapcsolatra látogatóival és felhasználóival. Ez a varázsló befejezi muködését, amint elkészíti a második levelezést vagy kikapcsolhatja <a href="index2.php?option=com_jnewsletter&act=configuration" >beállítások panelen</a>.<br /><br />Ha kérdése van az jNews, használatával kapcsolatban, használja a <a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >fórumot</a>! Emellett számos információt is talál, hogy kommunikáljon hatékonyan a feliratkozókkal a <a href="http://www.ijoobi.com/" target="_blank">www.ijoobi.com</a> oldalán.<p /><br /><b>Köszönjük, hogy az jNews-ot használja. Az Ön kommunikációs partnere!</b> ');
define('_ACA_GUIDE_TURNOFF', 'A varázsló kikapcsolásra kerül.');
define('_ACA_STEP', 'lépés ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews beállítás');
define('_ACA_INSTALL_SUCCESS', 'Sikeres telepítés');
define('_ACA_INSTALL_ERROR', 'Telepítési hiba');
define('_ACA_INSTALL_BOT', 'jNews beépülo (robot)');
define('_ACA_INSTALL_MODULE', 'jNews modul');
define('_ACA_JAVASCRIPT', 'Figyelem: A Javascript-et engedélyezni kell a megfelelo muködéshez.');
define('_ACA_EXPORT_TEXT', 'Az exportált feliratkozók a válaszott listán alapulnak.<br />Feliratkozók exportálása listából');
define('_ACA_IMPORT_TIPS', 'Feliratkozók importálása. A fájlban levo tartalomnak az alábbi formátumúnak kell lennie: <br />Name,Email,ReceiveHTML(1/0),<span style="color: rgb(255, 0, 0);">Registered(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'már létezo feliratkozó');
define('_ACA_GET_STARTED', 'Kattintson ide az indításhoz!');

//News since 1.0.1
define('_ACA_WARNING_1011', 'Figyelem: 1011: A frissítés nem muködik, mert a szerver visszautasította.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Válassza ki, melyik email cím jelenjen meg küldoként!');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Válassza ki, milyen név jelenjen meg küldoként!');
define('_ACA_MAILSENDMETHOD_TIPS', 'Válassza ki milyen levélküldot szeretne jasználni: PHP mail függvény, <span>Sendmail</span> or SMTP szerver.');
define('_ACA_SENDMAILPATH_TIPS', 'Ez a levél szerver könyvtára');
define('_ACA_LIST_T_TEMPLATE', 'Sablon');
define('_ACA_NO_MAILING_ENTERED', 'Nincs levelezés megadva');
define('_ACA_NO_LIST_ENTERED', 'Nincs lista megadva');
define('_ACA_SENT_MAILING', 'Levelek elküldése');
define('_ACA_SELECT_FILE', 'Válasszon egy fájlt: ');
define('_ACA_LIST_IMPORT', 'Ellenorizze a listát, amelyhez feliratkozókat szeretne hozzárendelni.');
define('_ACA_PB_QUEUE', 'A feliratkozó be lett szúrva de probléma van vele a listához csatolásnál. Ellenorizze manuálisan!');
define('_ACA_UPDATE_MESS', '');
define('_ACA_UPDATE_MESS1', 'A frissítés erosen ajánlott!');
define('_ACA_UPDATE_MESS2', 'Folt és kisebb javítások.');
define('_ACA_UPDATE_MESS3', 'Új kiadás.');
define('_ACA_UPDATE_MESS5', 'Joomla 1.5 szükséges a frissítéshez.');
define('_ACA_UPDATE_IS_AVAIL', ' elérheto!');
define('_ACA_NO_MAILING_SENT', 'Nem lett elküldve levél!');
define('_ACA_SHOW_LOGIN', 'Bejelentkezési urlap megjelenítése');
define('_ACA_SHOW_LOGIN_TIPS', 'Válasszon Igen-t, ha szeretné, hogy a bejelentkezési urlap megjelenjen az jNews webes felületének vezérlopultján, hogy a felhasználók regisztrálhassanak a webhelyen..');
define('_ACA_LISTS_EDITOR', 'Lista leíró szerkeszto');
define('_ACA_LISTS_EDITOR_TIPS', 'Válasszon Igen-t HTML szövegszerkeszto használatához a a lista leírásának mezojében.');
define('_ACA_SUBCRIBERS_VIEW', 'Feliratkozók megtekintése');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', 'Webes beállítások');
define('_ACA_SHOW_LOGOUT', 'Kijelentkezés gomb megjelenítése');
define('_ACA_SHOW_LOGOUT_TIPS', 'Válassza az Igen-t, ha meg akarja jeleníteni a Kijelentkezés gombot az AcaJoom vezérlopult webes felületén.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integráció');
define('_ACA_CB_INTEGRATION', 'Community Builder integráció');
define('_ACA_INSTALL_PLUGIN', 'Community Builder beépülo (jNews integráció) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'Az jNews beépülo a Community Builderbe még nincs telepítve!');
define('_ACA_CB_PLUGIN', 'Listák regisztráláskor');
define('_ACA_CB_PLUGIN_TIPS', 'Válassza az Igen-t, ha a levelezo listákat meg akarja jeleníteni a Community Builder regisztrációs urlapján');
define('_ACA_CB_LISTS', 'Lista azonosítók');
define('_ACA_CB_LISTS_TIPS', 'EZ KÖTELEZO MEZO. Adja meg a listák azonosítóját vesszovel elválasztva, amely ekre a felhasználó feliratkozhat . (0 az összes listát megjeleníti)');
define('_ACA_CB_INTRO', 'Bevezeto szöveg');
define('_ACA_CB_INTRO_TIPS', 'A lista elott megjeleno szöveg. HAGYJA ÜRESEN, HA NEM AKAR MEGJELENÍTENI SEMMIT!. Használja a cb_pretext-et a CSS-hez!.');
define('_ACA_CB_SHOW_NAME', 'Listanév megjelenítése');
define('_ACA_CB_SHOW_NAME_TIPS', 'Döntse el, hogy szeretné-e megjeleníteni a listaneveket a bevezeto után!');
define('_ACA_CB_LIST_DEFAULT', 'Listák bejelölése alapértelmezésként');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Döntse el, hogy szeretné-e alapértelmezésként bejelölni minden listát!');
define('_ACA_CB_HTML_SHOW', 'HTML formátumban?');
define('_ACA_CB_HTML_SHOW_TIPS', 'Válassza az Igen-t, ha a felhasználók eldönthetik, hogy szeretnének-e HTML leveleket vagy sem. Állítsa Nem-re, ha alapértelmezésként HTML levelet akar használni!');
define('_ACA_CB_HTML_DEFAULT', 'Alapértelmezetten HTML formátumban?');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Állítsa be ezt a lehetoséget az alapértelmezett HTML levelezési beállítások megjelenítéséhez! Ha a HTML formátumban? bejegyzés Nem, akkor ez az opció lesz az alapértelmezett.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'A fájlrol nem készítheto biztonsági másolat! A fájl nem került lecserélésre.');
define('_ACA_BACKUP_YOUR_FILES', 'A fájlok régebbi verziója mentésre került a következo könyvtárban:');
define('_ACA_SERVER_LOCAL_TIME', 'Helyi szerver ido');
define('_ACA_SHOW_ARCHIVE', 'Archívum gomb megjelenítése');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Válasszon Igen-t a hírlevelek listájának végén az Archívum gomb megjelenítéséhez');
define('_ACA_LIST_OPT_TAG', 'Kódok');
define('_ACA_LIST_OPT_IMG', 'Képek');
define('_ACA_LIST_OPT_CTT', 'Tartalom');
define('_ACA_INPUT_NAME_TIPS', 'Adja meg a teljes nevét (a keresztnevével kezdje)!');
define('_ACA_INPUT_EMAIL_TIPS', 'Adja meg az email címét! Ellenorizze, hogy ez egy valódi email cím, ha valóban szeretne hírleveletet kapni!');
define('_ACA_RECEIVE_HTML_TIPS', 'Válasszon Igen-t, ha HTML hírleveleket szeretne kapni - vagy Nem-et, ha csak szöveges hírleveleket.');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Adja meg az idozónáját!');

// Since 1.0.5
define('_ACA_FILES', 'Fájlok');
define('_ACA_FILES_UPLOAD', 'Feltöltés');
define('_ACA_MENU_UPLOAD_IMG', 'Képek feltöltése');
define('_ACA_TOO_LARGE', 'A fájl mérete túl nagy. A maximális méret:');
define('_ACA_MISSING_DIR', 'A célkönyvtár nem létezik');
define('_ACA_IS_NOT_DIR', 'A célkönyvtár nem létezik vagy pedig egy szabályos fájl.');
define('_ACA_NO_WRITE_PERMS', 'A célkönyvtáron nincs írási jog.');
define('_ACA_NO_USER_FILE', 'Nem válaszotta ki a feltöltendo fájlt!');
define('_ACA_E_FAIL_MOVE', 'A fájl nem helyezheto át!');
define('_ACA_FILE_EXISTS', 'A célfájl már létezik.');
define('_ACA_CANNOT_OVERWRITE', 'A célfájl már létezik vagy nem írható felül.');
define('_ACA_NOT_ALLOWED_EXTENSION', 'Nem engedélyezett fájlkiterjesztés.');
define('_ACA_PARTIAL', 'A fájl csak részben került feltöltésre.');
define('_ACA_UPLOAD_ERROR', 'Feltöltési hiba:');
define('DEV_NO_DEF_FILE', 'A fájl csak részben került feltöltésre.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Ez lecserélésre kerül a feliratkozási linkekkel. Ez <strong>szükséges</strong> az jNews helyes muködéséhez.<br />Ha bármilyen más tartalmat helyez el ebben a dobozban, ez a lista összes levelezésében meg fog jelenni.<br />Tegye a saját feiratkozási üzeneteit a végére Az jNews automatikusan hozzáadja a feliratkozás megváltoztatásához és a leiratkozáshoz szükséges linkeket.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Értesítés');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Értesítések');
define('_ACA_USE_SEF', 'SEF a levelezésben');
define('_ACA_USE_SEF_TIPS', 'Ajánlott a nem választása. Ha szeretné, hogy a levelezésben használt URL használja a SEF-et, akkor válassza az igent!<br /><b>A linkek mindegyik opcióhoz ugyanúgy muködnek. Nem biztos, hogy a levelezésben a linkek mindig muködnek, ha megváltozik a SEF.</b> ');
define('_ACA_ERR_SETTINGS', 'Hibakezelo beállítások');
define('_ACA_ERR_SEND', 'Hiba jelentés küldése');
define('_ACA_ERR_SEND_TIPS', 'Ha szeretné, hogy az jNews jobb termékké váljon, válassza az Igen-t! Ez hibajelentést küld a fejlesztoknek. Így nem szükséges hibakutatást végeznie.<br /> <b>SEMMILYEN MAGÁNJELLEGU INFORMÁCIÓNEM KERÜL ELKÜLDÉSRE</b>. Még azt sem fogják tudni, melyik webhelyrol érkezik a hibajelentés. Csak az Acojoomról kapnak informciót, a PHP beállításokról és az SQL lekérdezésekrol. ');
define('_ACA_ERR_SHOW_TIPS', 'Válasszon Igen-t a hiba sorszámának megjelenítéséhez a képernyon. Foleg hibakeresésre lehet használni. ');
define('_ACA_ERR_SHOW', 'Hibák megjelenítése');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Leiratkozási linkek megtekintése');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Válasszon Igen-t a leiratkozáso linkek megjelenítéséhez  a levél alján, ahol a felhasználók megváltoztathatják a feliratkozásaikat. <br /> A Nem letiltja a láblécet és a linkeket.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">FONTOS MEGJEGYZÉS!</span> <br />Ha korábbi jNews verzióról frissít, frissíteni kell az adatbázis struktúrát is a következo gombra kattintva (az adatok integritása megmarad)');
define('_ACA_UPDATE_INSTALL_BTN', 'A táblák és a beállítások frissítése');
define('_ACA_MAILING_MAX_TIME', 'Maximális várakozási ido');
define('_ACA_MAILING_MAX_TIME_TIPS', 'Megadja azt a maximális idot, ameddig a leveleknek várakozniuk kell asorban. Az ajánlott érték 30 másodperc és 2 perc közöztt van.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart integráció');
define('_ACA_VM_COUPON_NOTIF', 'Kupon értesítési azonosító');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Megadja a levelezés azonosítószámát, amit kuponok küldésekor szeretne használni.');
define('_ACA_VM_NEW_PRODUCT', 'Új termék értesítés azonosító');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Megadja a levelezés azonosítószámát, amit új termék értesítésnél szeretne használni.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Urlap létrehozása');
define('_ACA_FORM_COPY', 'HTML kód');
define('_ACA_FORM_COPY_TIPS', 'Másolja a generált HTML kódot a HTML oldalra!');
define('_ACA_FORM_LIST_TIPS', 'Válassza ki a listából az urlapba beszúrandó tartalmat!');
// update messages
define('_ACA_UPDATE_MESS4', 'Nem frissítheto automatikusan.');
define('_ACA_WARNG_REMOTE_FILE', 'Távoli fájl nem érheto el.');
define('_ACA_ERROR_FETCH', 'Hiba a fájl elérésekor.');

define('_ACA_CHECK', 'Ellenorzés');
define('_ACA_MORE_INFO', 'További infó');
define('_ACA_UPDATE_NEW', 'Frissítés újabb verzióra');
define('_ACA_UPGRADE', 'Frissítés a legfrissebb termékre');
define('_ACA_DOWNDATE', 'Visszaállás elozo verzióra');
define('_ACA_DOWNGRADE', 'Vissza az alaptermékre');
define('_ACA_REQUIRE_JOOM', 'Joomla szükséges');
define('_ACA_TRY_IT', 'Próbálja ki!');
define('_ACA_NEWER', 'Újabb');
define('_ACA_OLDER', 'Régebbi');
define('_ACA_CURRENT', 'Aktuális');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Próbáljon ki egyet a többi komponens közül!');
define('_ACA_MENU_VIDEO', 'Videó bemutatók');
define('_ACA_SCHEDULE_TITLE', 'Automatikus idobeállító funkció beállítása');
define('_ACA_ISSUE_NB_TIPS', 'A kiadás számának automatikus generálása');
define('_ACA_SEL_ALL', 'Összes levelezés');
define('_ACA_SEL_ALL_SUB', 'Összes lista');
define('_ACA_INTRO_ONLY_TIPS', 'Ha kipipálja ezt a dobozt, csak a cikk bevezeto szövege kerül be a levélbe egy Tovább linkkel.');
define('_ACA_TAGS_TITLE', 'Tartalom kód');
define('_ACA_TAGS_TITLE_TIPS', 'Vágólapon keresztül tegye ezt a kódot a levél, ahol a tartalmat szeretné elhelyezni.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Jelzi az email címet, ahova a tesztet el kell küldeni');
define('_ACA_PREVIEW_TITLE', 'Elonézet');
define('_ACA_AUTO_UPDATE', 'Új frissítési értesítés');
define('_ACA_AUTO_UPDATE_TIPS', 'Válasszon Igen-t, ha szeretne értesítést a komponens frissítésérol! <br />FONTOS! A tippek megjelenítése szükséges ennek afunkciónak a muködéséhez.');

// since 1.1.0
define('_ACA_LICENSE', 'Licensz információ');

// since 1.1.1
define('_ACA_NEW', 'Új');
define('_ACA_SCHEDULE_SETUP', 'Az automatikus válaszoló muködéséhez be kell állítani az idozítot a beállításoknál..');
define('_ACA_SCHEDULER', 'Idozíto');
define('_ACA_JNEWSLETTER_CRON_DESC', 'ha nincs hozzáférése a webhelyen az idozíto feladat kezelohöz, regisztrálhat egy ingyenes jNews idozítot itt:');
define('_ACA_CRON_DOCUMENTATION', 'Az jNews idozíto beállításaihoz további információkat itt talál:');
define('_ACA_CRON_DOC_URL', '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>');
define( '_ACA_QUEUE_PROCESSED', 'A feladatsor sikeresen feldolgozásra került...');
define( '_ACA_ERROR_MOVING_UPLOAD', 'Hiba az importált fájl mozgatása közben');

//since 1.1.2
define( '_ACA_SCHEDULE_FREQUENCY', 'Idozíto gyakoriság');
define( '_ACA_CRON_MAX_FREQ', 'Idozíto maximális gyakoriság');
define( '_ACA_CRON_MAX_FREQ_TIPS', 'Adja meg azt a maximális gykoriságot, amikor az idozíto fut (percekben).  Ez korlázozza az idozítot még akkor is, ha az idozíto feladat gyakorisága ennél rövidebb idore van beállítva.');
define( '_ACA_CRON_MAX_EMAIL', 'Feladatonkénti maximális levélszám');
define( '_ACA_CRON_MAX_EMAIL_TIPS', 'Megadja meg a feladatonként elküldheto levelek maximális számát (0 - korlátlan).');
define( '_ACA_CRON_MINUTES', ' perc');
define( '_ACA_SHOW_SIGNATURE', 'Levél lábléc megjelenítése');
define( '_ACA_SHOW_SIGNATURE_TIPS', 'Megjelenjen-e az jNews-ot népszerusíto lábléc a levelekben.');
define( '_ACA_QUEUE_AUTO_PROCESSED', 'Az automatikus válaszolók feladatai sikeresen feldolgozva...');
define( '_ACA_QUEUE_NEWS_PROCESSED', 'Az idozített hírlevelek feldolgozása sikeres...');
define( '_ACA_MENU_SYNC_USERS', 'Felhasználók szinkronizásása');
define( '_ACA_SYNC_USERS_SUCCESS', 'A felhasználók szinkronizásása sikeres!');

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Kijelentkezés');
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Igen');
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Nem');
if (!defined('_HI')) define( '_HI', 'Üdvözöljük');
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Felül');
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Lent');
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Kijelentkezés');

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', 'Ha ezt kijelöli, csak a teljes cikkre mutató cikk cím kerül be linkként a levélbe.');
define('_ACA_TITLE_ONLY', 'Csak cím');
define('_ACA_FULL_ARTICLE_TIPS', 'Ha ezt kijelöli, a levélbe a cikk teljes tartalma bekerül');
define('_ACA_FULL_ARTICLE', 'Teljes cikk');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Válasszon ki egy tartalmi elemet, amely bekerül a levélba.<br />Vágólapon keresztül helyezze el a <b>tartalom kódot</b> a levélbe!  Választhatja a teljes szöveget, csak a bevezetot vagy csak a címet (0, 1, vagy 2). ');
define('_ACA_SUBSCRIBE_LIST2', 'Levelezo listák');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Gyors hírlevél');
define('_ACA_MENU_AUTONEWS', 'Gyors hírlevelek');
define('_ACA_AUTO_NEWS_OPTION', 'Gyors hírlevél opciók');
define('_ACA_AUTONEWS_FREQ', 'Hírlevél gyakoriság');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Adja meg azt a gyakoriságot, ami szerint küldeni szeretné a gyors hírleveleket!');
define('_ACA_AUTONEWS_SECTION', 'Cikk szekció');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Válassza ki a szekciót, amelybol cikket szeretne kijelölni!');
define('_ACA_AUTONEWS_CAT', 'Cikk kategória');
define('_ACA_AUTONEWS_CAT_TIPS', 'Válassza ki a kategóriát, amelybol cikket szeretne kijelölni (Mind - összes cikk az adott szekcióból)!');
define('_ACA_SELECT_SECTION', 'Válasszon szekciót!');
define('_ACA_SELECT_CAT', 'Összes kategória');
define('_ACA_AUTO_DAY_CH8', 'Negyedévente');
define('_ACA_AUTONEWS_STARTDATE', 'Kezdo dátum');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Adja meg azt a kezdo dátumot, amitol a gyors hírleveleket küldeni szeretné!');
define('_ACA_AUTONEWS_TYPE', 'Tartalom összeállítás');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Teljes cikk: a teljes cikk bekerül a levélbe<br />' .		'Csak bevezeto: csak a cikk bevezetoje kerül be a levélbe<br/>' .		'Csak cím: csak a cikk címe kerül be a levélbe');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Ezt a gyors hírlevél cseréli le.');

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Levelezés létrehozás / megtekintés');
define('_ACA_LICENSE_CONFIG', 'Licensz');
define('_ACA_ENTER_LICENSE', 'Adja meg a licensz kódot!');
define('_ACA_ENTER_LICENSE_TIPS', 'Írja be a licensz kódot és mentse el.');
define('_ACA_LICENSE_SETTING', 'Licensz beállítások');
define('_ACA_GOOD_LIC', 'Érvényes licensz.');
define('_ACA_NOTSO_GOOD_LIC', 'Nem érvényes licensz: ');
define('_ACA_PLEASE_LIC', 'Vegye fel a kapcsolatot az jNews támogatóival a licensz frissítése érdekében  ( license@ijoobi.com ).');
define('_ACA_DESC_PLUS', 'Az jNews Plus az elso szekvenciális automatikus válaszoló komponens Joomla rendszerre.  ' . _ACA_FEATURES);
define('_ACA_DESC_PRO', 'Az jNews PRO egy fejlett hírlevélküldo rendszer Joomla rendszerre.  ' . _ACA_FEATURES);

//since 1.1.4
define('_ACA_ENTER_TOKEN', 'Adja meg az azonosítót!');

define('_ACA_ENTER_TOKEN_TIPS', 'Adja meg azt az azonosítót, amit emailben kapott meg az jNews megvásárlásakor!<br />Ezután mentsen! Az jNews automatikusan kapcsolódik a szerverhez egy licenszszám lekéréséhez.');

define('_ACA_JNEWSLETTER_SITE', 'jNews webhely:');
define('_ACA_MY_SITE', 'Webhelyem:');

define( '_ACA_LICENSE_FORM', ' ' .	'Kattintson ide a licensz urlaphoz ugráshoz!</a>');
define('_ACA_PLEASE_CLEAR_LICENSE', 'Törölje a licensz mezot ás próbálja meg újra!<br />Ha a probléma továbba is fennáll, ');

define( '_ACA_LICENSE_SUPPORT', 'A még mindig van kérdése, ' . _ACA_PLEASE_LIC);

define( '_ACA_LICENSE_TWO', 'a Licensz urlapon lekérheti a licenszet kézi módszerrel is az azonosító és a saját webhely URL megadásával (amelyik zöld színnek jelenik meg ennek az oldalnak a felso részén). ' . _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT);

define('_ACA_ENTER_TOKEN_PATIENCE', 'Az azonosító mentése után automatikusan egy licensz kód generálódik. Az azonosító általában 2 percen belül ellenorzésre kerül, de bizonyos esetekben 15 percig is eltarthat..<br /><br />Térjen vissza erre az ellenorzésre néhány perc mulva!<br /><br />Ha nem kap érvényes licensz kódot 15 percen belül, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET', 'A megadott azonosító még nem lett ellenorizve.');
define( '_ACA_UPDATE_CLICK_HERE', 'Látogasson el a <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> oldalra a legfrissebb verzió letöltéséhez.');
define( '_ACA_NOTIF_UPDATE', 'Ahhoz, hogy értesüljön az új frissítésekrol, adja meg az email címét és kattintson a Feliratkozás linkre!');

define('_ACA_THINK_PLUS', 'Ha többet szeretne kihozni levelezo rendszerébol, gondoljon a Plus verzióra!');
define('_ACA_THINK_PLUS_1', 'Szekvenciális automatikus válaszolók');
define('_ACA_THINK_PLUS_2', 'Hírlevél idozítése egy elore megadott idopontra!');
define('_ACA_THINK_PLUS_3', 'Nincs többé szerver korlát');
define('_ACA_THINK_PLUS_4', 'És sok más egyéb...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', 'Lista hozzáférés');
define( '_ACA_INFO_LIST_ACCESS', 'Adja meg, hogy milyen felhasználócsoportok láthatják és iratkozhatnak fel erre a listára!');
define( 'ACA_NO_LIST_PERM', 'Nincs jogosultsága feliratkozni erre a listára!');

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Archívál');
 define('_ACA_MENU_ARCHIVE_ALL', 'Mindet archívál');

//Archive Lists
 define('_FREQ_OPT_0', 'Nincs');
 define('_FREQ_OPT_1', 'Hetente');
 define('_FREQ_OPT_2', 'Két hetente');
 define('_FREQ_OPT_3', 'Havonta');
 define('_FREQ_OPT_4', 'Negyed évente');
 define('_FREQ_OPT_5', 'Évente');
 define('_FREQ_OPT_6', 'Egyéb');

define('_DATE_OPT_1', 'Létrehozás dátum');
define('_DATE_OPT_2', 'Módosítás dátum');

define('_ACA_ARCHIVE_TITLE', 'Automatikus archíválás gyakoriságának beállítása');
define('_ACA_FREQ_TITLE', 'Archíválási gyakoriság');
define('_ACA_FREQ_TOOL', 'Adja meg, hogy milyen gyakran arhíválja az Archívum kezelo a webhelye tartalmát!.');
define('_ACA_NB_DAYS', 'Napok száma');
define('_ACA_NB_DAYS_TOOL', 'Ez csak az Egyéb opcióra vonatkozik! Adja meg a napok számát két archíválás között!');
define('_ACA_DATE_TITLE', 'Dátum típus');
define('_ACA_DATE_TOOL', 'Adja meg, hogy a létrehozás dátuma vagy a módosítás dátuma alapján archíváljon!');

define('_ACA_MAINTENANCE_TAB', 'Karbantartási beállítások');
define('_ACA_MAINTENANCE_FREQ', 'Karbantartási gyakoriság');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Adja meg azt a gyakoriságot, amikor a karbantartási muvelet lefut!');
define( '_ACA_CRON_DAYS', 'óra');

define( '_ACA_LIST_NOT_AVAIL', 'Jelenleg nincs elérheto lista.');
define( '_ACA_LIST_ADD_TAB', 'Hozzáad/szerkeszt');

define( '_ACA_LIST_ACCESS_EDIT', 'Levelezés hozzáférés hozzáadás/szerkesztés');
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Adja meg azt a felhasználói csoportot, amely bovítheti vagy szerkesztheti ehhez az listához tartozó levelezéseket!');
define( '_ACA_MAILING_NEW_FRONT', 'Új levelezés létrehozás');

define('_ACA_AUTO_ARCHIVE', 'Auto-Archívál');
define('_ACA_MENU_ARCHIVE', 'Auto-Archívál');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Lecserélodik a hírlevél kiadás számára.');
define('_ACA_TAGS_DATE', '[DATE] = Lecserélodik a küldés dátumára.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Lecserélodik a Community Builder mezojének értékére: pl.: [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Joobi Care');

define('_ACA_THINK_PRO', 'Professzionális igényekhez professzionális komponensek!');
define('_ACA_THINK_PRO_1', 'Okos hírlevelek');
define('_ACA_THINK_PRO_2', 'Adja meg a hozzáférés szintjét a listához!');
define('_ACA_THINK_PRO_3', 'Adja meg, hogy ki szerkeszthet/adhat hozzá levelezést!');
define('_ACA_THINK_PRO_4', 'További adatok: adja hozzá saját CB mezoit!');
define('_ACA_THINK_PRO_5', 'A Joomla tartalmaz Auto-archiválást!');
define('_ACA_THINK_PRO_6', 'Adatbázis optimalizálás');

define('_ACA_LIC_NOT_YET', 'Az Ön licensze még nem érvényes. Ellenorizze a Licensz fület a konfigurációs panelen!');
define('_ACA_PLEASE_LIC_GREEN', 'Ügyeljen, hogy friss és valódi információkat adjon támogató csoportunknak ennek a fülnek a tetején!');

define('_ACA_FOLLOW_LINK', 'Licensz kérés');
define( '_ACA_FOLLOW_LINK_TWO', 'Kérheti licenszét azonosítója és webhelyének URL-je megadásával (amelyik zöld színnel jelenik meg az oldal tetején) a Licensz urlapban.');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Majd kattintson az Alkalmaz gombon a jobb felso menüben!');
define( '_ACA_ENTER_LIC_NB', 'Írja be a licenszét!');
define( '_ACA_UPGRADE_LICENSE', 'Licensz frissítése');
define( '_ACA_UPGRADE_LICENSE_TIPS', 'Ha kapott azonosítót a licensz frissítéséhez, azt itt adja meg, majd kattintson az Alkalmaz gombon és folytassa a <b>2.</b> lépéssel licensz számának lekéréséhez!');

define( '_ACA_MAIL_FORMAT', 'Kódolási formátum');
define( '_ACA_MAIL_FORMAT_TIPS', 'Milyen kódolási formát szeretne használni levelezéseiben: csak szöveges vagy MIME');
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Ha nincs hozzáférése a webhelyén idozíto kezelohöz, használhatja az ingyenes jCron komponenst az idozítési feladatok megoldására!');

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'A szerzo nevének megjelenítése');
define('_ACA_SHOW_AUTHOR_TIPS', 'Válasszon Igen-t, ha a szerzo nevét is el szeretné helyezni a levélbe elhelyezett cikknél!');

//since 1.3.5
define('_ACA_REGWARN_NAME', 'Adja meg a nevét!');
define('_ACA_REGWARN_MAIL', 'Érvényes email címet adjon meg!');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', 'If you select Yes, the e-mail of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be usefull if you want to execute a special script in your redirect page.');
define('_ACA_ADDEMAILREDLINK', 'Add e-mail to the redirect link');

//since 1.6.3
define('_ACA_ITEMID', 'ItemId');
define('_ACA_ITEMID_TIPS', 'This ItemId will be added to your jNews links.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO', 'jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS', 'Show the integration tab for jCalPRO <br/>(only if jCalPRO is installed on your website!)');
define('_ACA_JCALTAGS_TITLE', 'jCalPRO Tag:');
define('_ACA_JCALTAGS_TITLE_TIPS', 'Copy and paste this tag into the mailing where you want to have the event to be placed.');
define('_ACA_JCALTAGS_DESC', 'Description:');
define('_ACA_JCALTAGS_DESC_TIPS', 'Select Yes if you want to insert the description of the event');
define('_ACA_JCALTAGS_START', 'Start date:');
define('_ACA_JCALTAGS_START_TIPS', 'Select Yes if you want to insert the start date of the event');
define('_ACA_JCALTAGS_READMORE', 'Read more:');
define('_ACA_JCALTAGS_READMORE_TIPS', 'Select Yes if you want to insert a <b>read more link</b> for this event');
define('_ACA_REDIRECTCONFIRMATION', 'Redirect URL');
define('_ACA_REDIRECTCONFIRMATION_TIPS', 'If you require a confirmation e-mail, the user will be confirmed and redirected to this URL if he clicks on the confirmation link.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','No account yet?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Register');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','You are not authorised to view this resource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP', 'Disable Tooltip');
define('_ACA_DISABLETOOLTIP_TIPS', 'Disable the tooltip on the frontend');
define('_ACA_MINISENDMAIL', 'Use Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS', 'If your server use Mini SendMail, select this option to don\'t add the name of the user in the header of the e-mail');

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