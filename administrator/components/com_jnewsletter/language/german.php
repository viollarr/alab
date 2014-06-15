<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>German language file.</p>
* @author Frank Jansen <digital-media@gmx.net>
* @version 1.0.8
* @version $Id: german.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.ijoobi.com
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE','jNews ist eine Komponente, zum Verwalten von Mailinglisten, Newslettern, Autorespondern und mehr, um effizient mit seinen Bentuzern und Kunden zu kommunizieren.<br />' .
		'jNews, dein Kommunikationspartner!');
define('_ACA_DESC_GPL','jNews ist eine Komponente, zum Verwalten von Mailinglisten, Newslettern, Autorespondern und mehr, um effizient mit seinen Bentuzern und Kunden zu kommunizieren.<br />' .
		'jNews, dein Kommunikationspartner!');
define('_ACA_FEATURES', 'jNews, your communication partner!');
// Type of lists
define('_ACA_NEWSLETTER','Newsletter');
define('_ACA_AUTORESP','Auto-responder');
define('_ACA_AUTORSS','Auto-RSS');
define('_ACA_ECARD','eCard');
define('_ACA_POSTCARD','Postkarte');
define('_ACA_PERF','Geschwindigkeit');
define('_ACA_COUPON','Coupon');
define('_ACA_CRON','Cron Task');
define('_ACA_MAILING','Mailing');
define('_ACA_LIST','Liste');

 //jnewsletter Menu
define('_ACA_MENU_LIST','Listenverwaltung');
define('_ACA_MENU_SUBSCRIBERS','Abonnenten');
define('_ACA_MENU_NEWSLETTERS','Newsletter');
define('_ACA_MENU_AUTOS','Auto-responders');
define('_ACA_MENU_COUPONS','Coupons');
define('_ACA_MENU_CRONS','Cron Tasks');
define('_ACA_MENU_AUTORSS','Auto-RSS');
define('_ACA_MENU_ECARD','eCards');
define('_ACA_MENU_POSTCARDS','Postkarten');
define('_ACA_MENU_PERFS','Geschwinidigkeit');
define('_ACA_MENU_TAB_LIST','Liste');
define('_ACA_MENU_MAILING_TITLE','Mailings');
define('_ACA_MENU_MAILING','Mailings für');
define('_ACA_MENU_STATS','Statistik');
define('_ACA_MENU_STATS_FOR','Statistik für');
define('_ACA_MENU_CONF','Konfiguration');
define('_ACA_MENU_UPDATE','Import');
define('_ACA_MENU_ABOUT','Über');
define('_ACA_MENU_LEARN','Lerncenter');
define('_ACA_MENU_MEDIA','Media Manager');
define('_ACA_MENU_HELP','Hilfe');
define('_ACA_MENU_CPANEL','CPanel');
define('_ACA_MENU_IMPORT','Importieren');
define('_ACA_MENU_EXPORT','Exportieren');
define('_ACA_MENU_SUB_ALL','ALLE eintragen');
define('_ACA_MENU_UNSUB_ALL','ALLE austragen');
define('_ACA_MENU_VIEW_ARCHIVE','Archiv');
define('_ACA_MENU_PREVIEW','Vorschau');
define('_ACA_MENU_SEND','Senden');
define('_ACA_MENU_SEND_TEST','Test senden');
define('_ACA_MENU_SEND_QUEUE','Prozessablauf');
define('_ACA_MENU_VIEW','Ansehen');
define('_ACA_MENU_COPY','Kopieren');
define('_ACA_MENU_VIEW_STATS','Zeige Statistiken');
define('_ACA_MENU_CRTL_PANEL',' Control Panel');
define('_ACA_MENU_LIST_NEW',' Erstelle eine Liste');
define('_ACA_MENU_LIST_EDIT',' Bearbeite eine Liste');
define('_ACA_MENU_BACK','Zurück');
define('_ACA_MENU_INSTALL','Installation');
define('_ACA_MENU_TAB_SUM','Zusammenfassung');
define('_ACA_STATUS','Status');

// messages
define('_ACA_ERROR',' Ein Fehler trat auf! ');
define('_ACA_SUB_ACCESS','Zugangsrechte');
define('_ACA_DESC_CREDITS','Gutschriften');
define('_ACA_DESC_INFO','Information');
define('_ACA_DESC_HOME','Homepage');
define('_ACA_DESC_MAILING','Mailing Liste');
define('_ACA_DESC_SUBSCRIBERS','Abonnement');
define('_ACA_PUBLISHED','Veröffentlicht');
define('_ACA_UNPUBLISHED','Unveröffentlicht');
define('_ACA_DELETE','Löschen');
define('_ACA_FILTER','Filter');
define('_ACA_UPDATE','Update');
define('_ACA_SAVE','Speichern');
define('_ACA_CANCEL','Abbruch');
define('_ACA_NAME','Name');
define('_ACA_EMAIL','E-mail');
define('_ACA_SELECT','Auswählen');
define('_ACA_ALL','Alle');
define('_ACA_SEND_A','Sende einen ');
define('_ACA_SUCCESS_DELETED',' erfolgreich gelöscht');
define('_ACA_LIST_ADDED','Liste erfolgreich erstellt');
define('_ACA_LIST_COPY','Liste erfolgreich kopiert');
define('_ACA_LIST_UPDATED','Liste erfolgreich upgedated');
define('_ACA_MAILING_SAVED','Mailing erfolgreich gespeichert.');
define('_ACA_UPDATED_SUCCESSFULLY','erfolgreich upgedated.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO','Abonnenteninformationen');
define('_ACA_VERIFY_INFO','Bitte überprüfen Sie den übertragenden Link, einige Informationen fehlen.');
define('_ACA_INPUT_NAME','Name');
define('_ACA_INPUT_EMAIL','Email');
define('_ACA_RECEIVE_HTML','Empfange HTML?');
define('_ACA_TIME_ZONE','Zeitzone');
define('_ACA_BLACK_LIST','Sperrliste');
define('_ACA_REGISTRATION_DATE','Registrierungsdatum');
define('_ACA_USER_ID','Benutzer ID');
define('_ACA_DESCRIPTION','Beschreibung');
define('_ACA_ACCOUNT_CONFIRMED','Ihr Account wurde aktiviert.');
define('_ACA_SUB_SUBSCRIBER','Abonnement');
define('_ACA_SUB_PUBLISHER','Redakteur');
define('_ACA_SUB_ADMIN','Administrator');
define('_ACA_REGISTERED','Registrierter');
define('_ACA_SUBSCRIPTIONS','Abonnements');
define('_ACA_SEND_UNSUBCRIBE','Sende Abmeldungsnachricht');
define('_ACA_SEND_UNSUBCRIBE_TIPS','Klicken Sie auf Ja um eine Abmeldungsbestätigung zu verschicken.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS','Bitte bestätigen Sie Ihre Anmeldung');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS','Abmeldungsbestätigung');
define('_ACA_DEFAULT_SUBSCRIBE_MESS','Hi [NAME],<br />' .
		'Noch ein kurzer Schritt und Sie haben den Newsletter abonniert. Klicken Sie auf den folgenden Link um Ihre Registrierung zu bestätigen:' .
		'<br /><br />[CONFIRM]<br /><br />Falls Sie Fragen haben, wenden Sie sich bitte an den Webmaster.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS','Dies ist eine Bestätigungsemail, dass Sie von der Liste entfernt worden bist. Wir bedauern, dass Sie sich entschieden haben, unsere E-Mails nicht weiter zu empfangen. Sie können sich natürlich jederzeit wieder anmelden.');

// jNews subscribers
define('_ACA_SIGNUP_DATE','Anmeldungsdatum');
define('_ACA_CONFIRMED','Bestätigung');
define('_ACA_SUBSCRIB','Abonniert');
define('_ACA_HTML','HTML mailings');
define('_ACA_RESULTS','Ergebnisse');
define('_ACA_SEL_LIST','Wählen Sie eine Liste');
define('_ACA_SEL_LIST_TYPE','- Wählen Sie eine Listenart -');
define('_ACA_SUSCRIB_LIST','Liste aller Abonnenten');
define('_ACA_SUSCRIB_LIST_UNIQUE','Angemeldet für: ');
define('_ACA_NO_SUSCRIBERS','Es gibt keine Abonnenten für diese Liste');
define('_ACA_COMFIRM_SUBSCRIPTION','Eine Bestätigungsemail wurde Ihnen zugesand. Bitte überprüfen Sie Ihre E-Mails und klicken Sie auf den Bestätigungslink.<br />' .
		'Sie müssen Ihre E-Mailadresse bestätigen, um Ihr Abonnement gültig zu machen.');
define('_ACA_SUCCESS_ADD_LIST','Sie wurden erfolgreich der Liste hinzugefügt.');


 // Subcription info
define('_ACA_CONFIRM_LINK','Klicken Sie hier um Ihr Abonnement zu bestätigen.');
define('_ACA_UNSUBSCRIBE_LINK','Klicken Sie hier um sich von der Liste wieder abzumelden.');
define('_ACA_UNSUBSCRIBE_MESS','Ihre E-Mailadresse wurde von der Liste entfernt');

define('_ACA_QUEUE_SENT_SUCCESS','Alle geplanten Mailings wurden erfolgreich versendet.');
define('_ACA_MALING_VIEW','Zeige alle Mailings');
define('_ACA_UNSUBSCRIBE_MESSAGE','Sind Sie sicher, dass Sie sich von dieser Liste abmelden wollen?');
define('_ACA_MOD_SUBSCRIBE','Abonnieren');
define('_ACA_SUBSCRIBE','Abonnieren');
define('_ACA_UNSUBSCRIBE','Abmelden');
define('_ACA_VIEW_ARCHIVE','Zeige das Archiv');
define('_ACA_SUBSCRIPTION_OR',' oder klicken Sie hier für weitere Informationen');
define('_ACA_EMAIL_ALREADY_REGISTERED','Diese E-Mailadresse wurde schon mal angemeldet.');
define('_ACA_SUBSCRIBER_DELETED','Abonnenten erfolgreich gelöscht');


### UserPanel ###
 //User Menu
define("_UCP_USER_PANEL","Benutzer Kontrollmenü");
define("_UCP_USER_MENU","Benutzermenü");
define("_UCP_USER_CONTACT","Meine Abonnements");
 //jNews Cron Menu
define("_UCP_CRON_MENU","Cron Task Management");
define("_UCP_CRON_NEW_MENU","New Cron");
define("_UCP_CRON_LIST_MENU","Zeige meine Cron");
 //jNews Coupon Menu
define("_UCP_COUPON_MENU","Coupons Management");
define("_UCP_COUPON_LIST_MENU","Couponsliste");
define("_UCP_COUPON_ADD_MENU","Coupon hinzufügen");

### lists ###
// Tabs
define("_ACA_LIST_T_GENERAL","Beschreibung");
define("_ACA_LIST_T_LAYOUT","Layout");
define("_ACA_LIST_T_SUBSCRIPTION","Abonnement");
define("_ACA_LIST_T_SENDER","Absenderinformationen");

define("_ACA_LIST_TYPE","Listenart");
define("_ACA_LIST_NAME","Listenname");
define("_ACA_LIST_ISSUE","Ausgabe #");
define("_ACA_LIST_DATE","Sendungsdatum");
define("_ACA_LIST_SUB","Mailing Betreff");
define("_ACA_ATTACHED_FILES","Angehängte Dateien");
define("_ACA_SELECT_LIST","Bitte wählen Sie eine Liste zum Editieren aus!");

// Auto Responder box
define("_ACA_AUTORESP_ON","Listenart");
define("_ACA_AUTO_RESP_OPTION","Optionen für automatische Antworten");
define("_ACA_AUTO_RESP_FREQ","Abonnenten können Häufigkeit wählen");
define("_ACA_AUTO_DELAY","Verzögerung (in Tagen)");
define("_ACA_AUTO_DAY_MIN","Minimalste Häufigkeit");
define("_ACA_AUTO_DAY_MAX","Maximalste Häufigkeit");
define("_ACA_FOLLOW_UP","Specify follow up auto-responder");
define("_ACA_AUTO_RESP_TIME","Abonnenten können die Zeit auswählen");
define("_ACA_LIST_SENDER","Listen Absender");

define("_ACA_LIST_DESC","Listen Beschreibung");
define("_ACA_LAYOUT","Layout");
define("_ACA_SENDER_NAME","Absendernamen");
define("_ACA_SENDER_EMAIL","Absender-Email");
define("_ACA_SENDER_BOUNCE","Rückantwortadresse");
define("_ACA_LIST_DELAY","Verzögerung");
define("_ACA_HTML_MAILING","HTML Mails?");
define("_ACA_HTML_MAILING_DESC","(wenn Sie dieses ändern, müssen Sie die Seite speichern und dann neu laden, um die Änderungen zu sehen.)");
define("_ACA_HIDE_FROM_FRONTEND","Im Frontend verstecken?");
define("_ACA_SELECT_IMPORT_FILE","Wählen Sie eine Datei zum importieren aus");;
define("_ACA_IMPORT_FINISHED","Import beendet");
define("_ACA_DELETION_OFFILE","Löschen einer Datei");
define("_ACA_MANUALLY_DELETE","gescheitert, Sie sollten die Datei manuell löschen");
define("_ACA_CANNOT_WRITE_DIR","In diesem Verzeichnis kann nicht geschrieben werden.");
define("_ACA_NOT_PUBLISHED","Konnte das Mailing nicht verschicken, die Liste wurde nicht veröffentlicht.");

//  List info box
define("_ACA_INFO_LIST_PUB","Klicken Sie auf Ja um die Liste zu veröffentlichen");
define("_ACA_INFO_LIST_NAME","Tragen Sie hier den Namen Ihrer Liste ein. Sie können die Liste an Hand ihres Namen identifizieren.");
define("_ACA_INFO_LIST_DESC","Tragen Sie hier eine kurze Beschreibung Ihrer Liste ein. Diese Beschreibung wird für Besucher Ihrer Webseite sichtbar sein.");
define("_ACA_INFO_LIST_SENDER_NAME","Tragen Sie hier den Namen des Absenders für die Mailings ein. Dieser Name wird sichtbar sein, wenn Abonnenten Nachrichten über diese Liste empfangen.");
define("_ACA_INFO_LIST_SENDER_EMAIL","Tragen Sie hier die E-Mailadresse ein, von der die Nachrichten versandt werden.");
define("_ACA_INFO_LIST_SENDER_BOUNCED","Tragen Sie hier die E-Mailadresse ein, auf die Benutzer antworten können. Es ist empfehlenswert, dass diese die gleiche wie die Senderadresse ist, da Spamfilter die Nachrichten sonst eher als Spam behandeln.");
define("_ACA_INFO_LIST_AUTORESP","Wählen Sie den Typ für Nachrichten dieser Liste:<br />" .
		"Newsletter: Normaler Newsletter<br />" .
		"Auto-responder: Ein Auto-Responder ist eine Liste, welche automatisch durch die Webseite in regelmäßigen Abständen verschickt wird.");
define("_ACA_INFO_LIST_FREQUENCY","Erlaube dem Benutzer auszuwählen, wie oft Sie Nachrichten von der Liste erhalten. Das gibt den Benutzern mehr Flexibilität.");
define("_ACA_INFO_LIST_TIME","Erlaube dem Benutzer auszuwählen, zu welcher Zeit er am liebsten Nachrichten über die Liste empfängt.");
define("_ACA_INFO_LIST_MIN_DAY","Definiere was die minimalste Häufigkeit an Nachrichten über die Liste ist, die ein Benutzer wählen kann.");
define("_ACA_INFO_LIST_DELAY","Setzte den Abstand zwischem diesem Auto-Respondern und dem vorherigen.");
define("_ACA_INFO_LIST_DATE","Geben Sie das Datum, an dem Sie diese Nachricht veröffentlichen wollen, wenn Sie die Veröffentlichung verzögern wollen<br /> FORMAT : YYYY-MM-DD HH:MM:SS");
define("_ACA_INFO_LIST_MAX_DAY","Definiere was die maximale Häufigkeit an Nachrichten über die Liste ist, die ein Benutzer wählen kann");
define("_ACA_INFO_LIST_LAYOUT","Tragen Sie hier das Layout der Mailingliste ein. Sie können jedes Layout hier eintragen");
define("_ACA_INFO_LIST_SUB_MESS","Diese Nachricht wird zum Benutzer geschickt, wenn er oder sie sich registriert. Sie können jeden Text hier eintragen.");
define("_ACA_INFO_LIST_UNSUB_MESS","Diese Nachricht wird zum Abonnenten geschickt, wenn er sich von der Liste abgemeldet hat. Jede Nachricht kann hier eingetragen werden.");
define("_ACA_INFO_LIST_HTML","Wählen Sie dieses wenn Sie eine HTML-Mail verschicken wollen. Abonnenten haben die Möglichkeit sich auszusuchen, ob sie die HTML-Nachricht empfangen wollen oder nur den reinen Text (falls sie eine HTML-Liste abonniert haben).");
define("_ACA_INFO_LIST_HIDDEN","Klicken Sie auf Ja um die Mailingliste vor dem Frontend zu verstecken. Dadurch können Benutzer sich nicht anmelden, aber Sie können weiterhin Mailings verschicken.");
define("_ACA_INFO_LIST_ACA_AUTO_SUB","Sollen Benutzer automatisch der Liste hinzugefügt werden?<br /><B>Neue Benutzer:</B> Jeder neu registrierte Benutzer wird der Liste hinzugefügt.<br /><B>Alle Benutzer:</B> Registriert jeden Benutzer in der Datenbank.<br />(alle Optionen unterstützten den CommunityBuilder)");
define("_ACA_INFO_LIST_ACC_LEVEL","Bestimme die Zugangsoptionen aus dem Frontend. Damit werden Listen Benutzern gezeigt oder vor ihnen versteckt, wenn sie keinen Zugang zu ihnen haben, also sich nicht eintragen können.");
define("_ACA_INFO_LIST_ACC_USER_ID","Wählen Sie den Zugangslevel der Benutzergruppe, der Sie erlauben wollen, die Liste zu bearbeiten. Die Benutzergruppe wird in der Lage sein, Mailings zu bearbeiten und zu versenden, sowohl vom Backend, als auch vom Frontend.");
define("_ACA_INFO_LIST_FOLLOW_UP","Wenn Sie wollen, dass der Auto-Responder zu einem weiteren wechselt, sobald es die letzte Nachricht erreicht hat, können Sie hier den folgenden Auto-Responder bestimmen.");
define("_ACA_INFO_LIST_ACA_OWNER","Das ist die ID der Person, die die Liste erstellt hat.");
define("_ACA_INFO_LIST_WARNING","   Diese Option ist nur beim Erstellen der Liste wählbar.");
define("_ACA_INFO_LIST_SUBJET"," Betreff des Mailings. Das ist der Betreff der E-Mail, die die Benutzer bekommen werden.");
define("_ACA_INFO_MAILING_CONTENT","Das ist der Body der E-Mail, den Sie versenden wollen.");
define("_ACA_INFO_MAILING_NOHTML","Trage hier den Body der E-Mail ein, den Benutzer erhalten sollen, die keine HTML-E-mails bekommen wollen.");
define("_ACA_INFO_MAILING_VISIBLE","Klicke Ja um das Mailing im Frontend anzuzeigen.");
define("_ACA_INSERT_CONTENT","Füge existierenden Content ein.");

// Coupons
define("_ACA_SEND_COUPON_SUCCESS","Coupon erfolgreich versendet!");
define("_ACA_CHOOSE_COUPON","Wähle einen Coupon");
define("_ACA_TO_USER"," an diesen Benutzer");

### Cron options
//drop down frequency(CRON)
define("_ACA_FREQ_CH1","Jede Stunde");
define("_ACA_FREQ_CH2","Alle 6 Stunden");
define("_ACA_FREQ_CH3","Alle 12 Stunden");
define("_ACA_FREQ_CH4","Täglich");
define("_ACA_FREQ_CH5","Wöchentlich");
define("_ACA_FREQ_CH6","Monatlich");
define("_ACA_FREQ_NONE","Nicht");
define("_ACA_FREQ_NEW","Neue Benutzer");
define("_ACA_FREQ_ALL","Alle Benutzer");

//Label CRON form
define("_ACA_LABEL_FREQ","jNews Cron?");
define("_ACA_LABEL_FREQ_TIPS","Klicken Sie Ja wenn Sie dieses für einen jNews Cron nutzen wollen, Nein für einen anderen Cronjob.<br />" .
		"Wenn Sie Ja klicken, müssen Sie keine spezielle Cron-Adresse eingeben, sie wird automatisch dazugefügt.");
define("_ACA_SITE_URL","Die URL Ihrer Webseite");
define("_ACA_CRON_FREQUENCY","Cron Häufigkeit");
define("_ACA_STARTDATE_FREQ","Anfangsdatum");
define("_ACA_LABELDATE_FREQ","Datum bestimmen");
define("_ACA_LABELTIME_FREQ","Zeit bestimmen");
define("_ACA_CRON_URL","Cron URL");
define("_ACA_CRON_FREQ","Häufigkeit");
define("_ACA_TITLE_CRONLIST","Cron Liste");
define("_NEW_LIST","Neue Liste erstellen");

//title CRON form
define("_ACA_TITLE_FREQ","Cron Bearbeiten");
define("_ACA_CRON_SITE_URL","Bitte tragen Sie eine gültige URL ein, beginnend mit http://");

### Mailings ###
define("_ACA_MAILING_ALL","Alle Mailings");
define("_ACA_EDIT_A","Bearbeite ein ");
define("_ACA_SELCT_MAILING","Bitte wählen Sie eine Liste aus dem Drop-Down Menü um ein neues Mailing zu verfassen.");
define("_ACA_VISIBLE_FRONT","Sichtbar im Frontend");

// mailer
define("_ACA_SUBJECT","Betreff");
define("_ACA_CONTENT","Inhalt");
define("_ACA_NAMEREP","[NAME] = Dies wird durch den Namen des Abonnenten ersetzt, die E-Mail wird also personalisiert, wenn Sie dieses nutzen.<br />");
define("_ACA_FIRST_NAME_REP","[FIRSTNAME] = Dies wird durch den Vornamen des Abonnenten ersetzt.<br />");
define("_ACA_NONHTML","NICHT-HTML Version");
define("_ACA_ATTACHMENTS","Anhänge");
define("_ACA_SELECT_MULTIPLE","Halten Sie Steuerung (STRG) um mehrere Anhänge zu wählen.<br />" .
		"Die Dateien, die in der Liste der Anhänge erscheinen, sind im Ordner Attachements gespeichert. Sie können diesen Ordner im Konfigurationsmenü ändern.");
define("_ACA_CONTENT_ITEM","Inhaltselement");
define("_ACA_CONTENT_ITEM_SELECT","Wählen Sie ein Element, um es in die Nachricht einzufügen<br />Kopieren Sie den <b>Platzhalter</b> und fügen ihn in die Nachricht ein.  Sie können wählen ob Sie nur das Intro oder den gesamten Text in der Mail haben wollen (0 or 1).");
define("_ACA_SENDING_EMAIL","Versende  E-mails");
define("_ACA_MESSAGE_NOT","E-Mails konnten nicht versendet werden");
define("_ACA_MAILER_ERROR","Versende Fehler");
define("_ACA_MESSAGE_SENT_SUCCESSFULLY","E-Mail erfolgreich versendet");
define("_ACA_SENDING_TOOK","Das Versenden dieser Mail dauerte");
define("_ACA_SECONDS","Sekunden");
define("_ACA_NO_ADDRESS_ENTERED","Keine Adresse eingetragen");
define("_ACA_CHANGE_SUBSCRIPTIONS","Ändere");
define("_ACA_CHANGE_EMAIL_SUBSCRIPTION","Ändern Sie Ihre Abonnements");
define("_ACA_WHICH_EMAIL_TEST","Geben Sie die E-Mailadresse an, an die eine Textmail gesendet werden soll, oder wählen Sie Vorschau");
define("_ACA_SEND_IN_HTML","Versende in HTML (für HTML-Mails)?");
define("_ACA_VISIBLE","Sichtbar");
define("_ACA_INTRO_ONLY","Nur die Einleitung");

// stats
define("_ACA_GLOBALSTATS","Allgemeine Statistiken");
define("_ACA_DETAILED_STATS","Detaillierte Statistiken");
define("_ACA_MAILING_LIST_DETAILS","Zeige Details");
define("_ACA_SEND_IN_HTML_FORMAT","Sende im HTML-Format");
define("_ACA_VIEWS_FROM_HTML","Ansichten (aus HTML-Mails)");
define("_ACA_SEND_IN_TEXT_FORMAT","Sende im Textformat");
define("_ACA_HTML_READ","HTML lesen");
define("_ACA_HTML_UNREAD","HTML nicht lesen");
define("_ACA_TEXT_ONLY_SENT","Nur Text");

// Configuration panel
// main tabs
define("_ACA_MAIL_CONFIG","Mail");
define("_ACA_LOGGING_CONFIG","Logs & Statistiken");
define("_ACA_SUBSCRIBER_CONFIG","Abonnenten");
define("_ACA_AUTO_CONFIG","Cron");
define("_ACA_MISC_CONFIG","Verschiedenes");
define("_ACA_MAIL_SETTINGS","Mail Einstellungen");
define("_ACA_MAILINGS_SETTINGS","Mailing Einstellungen");
define("_ACA_SUBCRIBERS_SETTINGS","Abonnenten Einstellungen");
define("_ACA_CRON_SETTINGS","Cron Einstellungen");
define("_ACA_SENDING_SETTINGS","Sendeeinstellungen");
define("_ACA_STATS_SETTINGS","Statistikeinstellungen");
define("_ACA_LOGS_SETTINGS","Logeinstellungen");
define("_ACA_MISC_SETTINGS","Verschiedene Einstellungen");
// mail settings
define("_ACA_SEND_MAIL_FROM","E-Mail von");
define("_ACA_SEND_MAIL_NAME","Von Name");
define("_ACA_MAILSENDMETHOD","Versandmethode");
define("_ACA_SENDMAILPATH","Sendmail pfad");
define("_ACA_SMTPHOST","SMTP Host");
define("_ACA_SMTPAUTHREQUIRED","SMTP Authentifizierung erforderlich");
define("_ACA_SMTPAUTHREQUIRED_TIPS","Wählen Sie ja, wenn Ihr SMTP Server Authentifizierung erfordert");
define("_ACA_SMTPUSERNAME","SMTP Benutzername");
define("_ACA_SMTPUSERNAME_TIPS","Tragen Sie den SMTP Benutzernamen ein, wenn Ihr SMTP Server Authentifzierung verlangt");
define("_ACA_SMTPPASSWORD","SMTP Passwort");
define("_ACA_SMTPPASSWORD_TIPS","Tragen Sie Ihr SMTP Passwort ein, wenn Ihr SMTP Server Authentifizierung verlangt");
define("_ACA_USE_EMBEDDED","Eingebettete Bilder benutzen");
define("_ACA_USE_EMBEDDED_TIPS","Wählen Sie ja, wenn die Bilder in HTML E-Mails im Anhang eingebettet werden sollen oder nein, wenn Sie mit Standard Bilder Tags über den Server verlinkt werden sollen");
define("_ACA_UPLOAD_PATH","Upload/Anhang Pfad");
define("_ACA_UPLOAD_PATH_TIPS","Sie können ein Verzeichnis zum Hochladen bestimmen<br />" .
		"Gehen Sie sicher, dass das bestimmte Verzeichnis existiert, oder erstellen Sie es");

// subscribers settings
define("_ACA_ALLOW_UNREG","Erlaube Anonyme");
define("_ACA_ALLOW_UNREG_TIPS","Wählen Sie JA, wenn Sie wollen, dass Benutzer sich eintragen dürfen, ohne auf der Seite registriert zu sein.");
define("_ACA_REQ_CONFIRM","Bestätigung erfordert");
define("_ACA_REQ_CONFIRM_TIPS","Wählen Sie Ja, wenn Sie wollen, dass unregistrierte Benutzer Ihre E-Mailadresse bestätigen müssen.");
define("_ACA_SUB_SETTINGS","Abonnement Einstellungen");
define("_ACA_SUBMESSAGE","Abonnenten Email");
define("_ACA_SUBSCRIBE_LIST","Tragen Sie sich in eine Liste ein");

define("_ACA_USABLE_TAGS","Erlaubte Tags");
define("_ACA_NAME_AND_CONFIRM","<b>[CONFIRM]</b> = Dies erzeugt einen Link, den Benutzer nutzen können, um ihr Abonnement zu bestätigen. Dies ist  <strong>erforderlich</strong> damit jNews richtig funktioniert.<br />"
."<br />[NAME] = Das wird durch den Namen des Abonnenten ersetzt, die E-Mail wird also personalisiert.br />"
."<br />[FIRSTNAME] = Dies wird durch den Vornamen des Abonnenten ersetzt. Der Vorname ist definiert als der Vorname, den der Abonnent eingetragen hat.<br />");
define("_ACA_CONFIRMFROMNAME","Bestätigung des Namen");
define("_ACA_CONFIRMFROMNAME_TIPS","Tragen Sie den 'von'-Namen ein, der auf Bestätigungslisten erscheinen soll.");
define("_ACA_CONFIRMFROMEMAIL","Bestätigung der E-mail");
define("_ACA_CONFIRMFROMEMAIL_TIPS","Tragen Sie die E-Mail Adresse ein, um eine Liste der Bestätigungen zu sehen.");
define("_ACA_CONFIRMBOUNCE","Bestätigung der  Bounce E-Mail Adresse");
define("_ACA_CONFIRMBOUNCE_TIPS","Tragen Sie die Bounce E-Mail Adresse ein, um eine Liste der Bestätigungen zu sehen.");
define("_ACA_HTML_CONFIRM","HTML Bestätigung");
define("_ACA_HTML_CONFIRM_TIPS","Wähle Ja, wenn die Bestätigungsliste HTML sein soll, sofern der Benutzer HTML erlaubt.");
define("_ACA_TIME_ZONE_ASK","Frage nach Zeitzone");
define("_ACA_TIME_ZONE_TIPS","Wählen Sie Ja, wenn der Benutzer nach seiner Zeitzone gefragt werden soll. Die E-Mails werden dann auf Basis der Zeitzone versandt.");

 // Cron Set up
define("_ACA_TIME_OFFSET_URL","Klicken Sie hier, um die Zeitabweichung in der globalen Konfiguration zu setzen. globale Konfiguration --> Lokale");
define("_ACA_TIME_OFFSET_TIPS","Setzen Sie Ihre Serverzeitabweichung, so dass das gespeicherte Datum und die Zeit korrekt sind");
define("_ACA_TIME_OFFSET","Zeitabweichung");
define("_ACA_CRON_TITLE","Stelle die Cron-Funktion ein");
define('_ACA_CRON_DESC','<br />Wenn Sie die Cron-Funktion nutzen, können Sie eine automatische Aufgabe für Ihre Joomla Webseite einstellen!<br />' .
		'Um es zu aktivieren müssen Sie in Ihren Cron-Einstellungen folgenden Befehl ergänzen:<br />' .
		'/usr/bin/php  /home/joomla/public_dev/index2.php?option=com_jnewsletter&act=cron' .
		'<br /><br />Anmerkungen:<br />' .
		' - wenn Ihr PHP-Pfad anders als /usr/bin/php ist, nutzen Sie bitte dieses, format /$php_path/php' .
 		'<br /><br />Für mehr Informationen, wie man ein Cron aufsetzt<br />' .
		' - Cpanel klicken Sie hier ' .
 		'<a href="http://www.visn.co.uk/cpanel-docs/cron-jobs.html" target="_blank">http://www.visn.co.uk/cpanel-docs/cron-jobs.html</a><br />' .
 		' - Bitte klicke hier ' .
 		'<a href="http://www.swsoft.com/doc/tutorials/Plesk/Plesk7/plesk_plesk7_eu/plesk7_eu_crontab.htm" target="_blank">' .
 		'http://www.swsoft.com/doc/tutorials/Plesk/Plesk7/plesk_plesk7_eu/plesk7_eu_crontab.htm</a><br />' .
 		' - Interworx klicke hier ' .
 		'<a href="http://www.sagonet.com/interworx/tutorials/siteworx/cron.php" target="_blank">' .
 		'http://www.sagonet.com/interworx/tutorials/siteworx/cron.php</a><br />' .
 		' - Allgemiene Linux crontab Informationen klicke hier ' .
 		'<a href="http://www.computerhope.com/unix/ucrontab.htm#01" target="_blank">http://www.computerhope.com/unix/ucrontab.htm#01</a><br />' .
 		'<br />Wenn Sie Hilfe bei der Einrichtung brauchen oder Probleme haben, benutzen Sie bitte unser Forum <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');
// sending settings
define("_ACA_PAUSEX","Warte x Sekunden nach einer bestimmten Anzahl von Mails");
define("_ACA_PAUSEX_TIPS","Tragen Sie eine Anzahl von Sekunden ein, die jNews dem SMTP Server gibt, um die E-Mails zu versenden, bevor er mit der nächsten bestimmten Anzahl von E-Mails fortfährt.");
define("_ACA_EMAIL_BET_PAUSE","E-Mails zwischen den Pausen");
define("_ACA_EMAIL_BET_PAUSE_TIPS","Anzahl der E-Mails, die zwischen den Pausen versendet werden soll.");
define("_ACA_WAIT_USER_PAUSE","Warte auf den Benutzer nach einer Pause");
define("_ACA_WAIT_USER_PAUSE_TIPS","Soll das Skript nach der Pause zwischen den E-Mails auf eine Benutzereingabe warten.");
define("_ACA_SCRIPT_TIMEOUT","Skript brauchte zu lange (Time out)");
define("_ACA_SCRIPT_TIMEOUT_TIPS","Die Anzahl der Minuten, die das Skript laufen sollte.");
// Stats settings
define("_ACA_ENABLE_READ_STATS","Aktiviere Statistiken");
define("_ACA_ENABLE_READ_STATS_TIPS","Wählen Sie Ja, wenn gespeichert werden soll, wie viele Leute die E-Mail angesehen haben. Das kann nur bei HTML-Mails genutzt werden.");
define("_ACA_LOG_VIEWSPERSUB","Speichere Anzeigen pro Benutzer");
define("_ACA_LOG_VIEWSPERSUB_TIPS","Wählen Sie Ja, wenn Anzeigen pro Benutzer gespeichert werden soll. Dies kann nur bei HTML-Mails genutzt werden.");
// Logs settings
define("_ACA_DETAILED","Detaillierte Logs");
define("_ACA_SIMPLE","Einfache Logs");
define("_ACA_DIAPLAY_LOG","Zeige Logs");
define("_ACA_DISPLAY_LOG_TIPS","Wählen Sie Ja, wenn Sie die Logs während des Mailversandes angezeigt haben möchten.");
define("_ACA_SEND_PERF_DATA","Sendestatistik");
define("_ACA_SEND_PERF_DATA_TIPS","Wählen Sie Ja, wenn Sie jNews erlauben wöllen, anonyme Berichte über ihre Konfiguration, die Menge der Abonnmenten einer Liste und der Zeit die das Versenden der Mail zu versenden. Dies würde uns helfen, jNews in Zukunft zu verbessern.");
define("_ACA_SEND_AUTO_LOG","Sende Logdatei für Auto-Responder");
define("_ACA_SEND_AUTO_LOG_TIPS","Wählen Sie Ja, wenn Sie wollen, dass Sie jedes Mal einen Log bekommen, wenn die Mails verschickt werden. WARNUNG: Dies kann zu einer großen Menge Mails führen");
define("_ACA_SEND_LOG","Sende Log");
define("_ACA_SEND_LOG_TIPS","Soll ein Log an die E-Mailadresse geschickt werden, welche das Mailing verschickt hat");
define("_ACA_SEND_LOGDETAIL","Sende detaillierte Logs");
define("_ACA_SEND_LOGDETAIL_TIPS","Detailliert beinhaltet Erfolg- oder Fehlermeldungen für jeden Abonnenten und eine Übersicht über diese Informationen. Einfach sendet nur die Übersicht.");
define("_ACA_SEND_LOGCLOSED","Sende Log wenn die Verbindung beendet wird.");
define("_ACA_SEND_LOGCLOSED_TIPS","Wenn diese Option aktiviert ist, erhält der Benutzer, der das Mailing versandt hat auch einen Bericht per E-Mail.");
define("_ACA_SAVE_LOG","Speichere Log");
define("_ACA_SAVE_LOG_TIPS","Soll ein Log des Mailings an die Logdatei angehängt werden?");
define("_ACA_SAVE_LOGDETAIL","Speichere detaillierten Log");
define("_ACA_SAVE_LOGDETAIL_TIPS","Detailliert beinhaltet die Erfolgs- oder Fehlerinformation für jeden Abonnenten und eine Übersicht der Informationen. Einfach, speichert nur die Übersicht.");
define("_ACA_SAVE_LOGFILE","Logdatei speichern");
define("_ACA_SAVE_LOGFILE_TIPS","Datei, an welche die Log Informationen angehängt werden. Diese Datei kann sehr groß werden.");
define("_ACA_CLEAR_LOG","Leere  Log");
define("_ACA_CLEAR_LOG_TIPS","Leert die Logdatei.");

### control panel
define("_ACA_CP_LAST_QUEUE","Letzte ausgeführte Reihe");
define("_ACA_CP_TOTAL","Total");
define("_ACA_MAILING_COPY","Mailing erfolgreich kopiert!");

// Miscellaneous settings
define("_ACA_SHOW_GUIDE","Zeige Assistenten");
define("_ACA_SHOW_GUIDE_TIPS","Zeigt den Assistenten am Anfang, um neuen Benutzern zu helfen, eigene Newsletter zu kreieren, einen Auto-Responder und um jNews richtig zu konfigurieren.");
define("_ACA_AUTOS_ON","Benutze Auto-Responders");
define("_ACA_AUTOS_ON_TIPS","Wählen Sie Ja, wenn Sie Auto-Responder nicht nutzen wollen, alle Auto-Responder Optionen werden deaktiviert.");
define("_ACA_NEWS_ON","Benutze Newsletter");
define("_ACA_NEWS_ON_TIPS","Wählen Sie NEIN wenn Sie keinen Newsletter nutzen möchten, alle Newsletter Optionen werden deaktiviert.");
define("_ACA_SHOW_TIPS","Zeige Tipps");
define("_ACA_SHOW_TIPS_TIPS","Zeige Tipps damit Benutzer jNews einfacher bedienen können.");
define("_ACA_SHOW_FOOTER","Zeige den Footer");
define("_ACA_SHOW_FOOTER_TIPS","Soll die Copyright Hinweise im Footer angezeigt werden, oder nicht?");
define("_ACA_SHOW_LISTS","Zeige Listen im Frontend");
define("_ACA_SHOW_LISTS_TIPS","Wenn Benutzer nicht registriert sind, zeige eine Liste der möglichen Newsletter, die Sie abonnieren können, sowie den Archiv Button oder das Registrierungsformular.");
define("_ACA_CONFIG_UPDATED","Die Konfiguration wurde upgedated!");
define("_ACA_UPDATE_URL","Update URL");
define("_ACA_UPDATE_URL_WARNING","WARNUNG! Ändern Sie die URL nicht, es sei denn Sie würden vom technischen Team von jNews darum gebeten<br />");
define("_ACA_UPDATE_URL_TIPS","Zum Beispiele: http://www.ijoobi.com/update/ (inklusive dem Slash am Ende)");

// module
define("_ACA_EMAIL_INVALID","Die eingegebene E-Mail ist ungültig.");
define("_ACA_REGISTER_REQUIRED","Bitte registrieren Sie sich, bevor Sie eine Liste abonnieren.");

// Access level box
define("_ACA_OWNER","Hersteller der  Liste:");
define("_ACA_ACCESS_LEVEL","Setze Zugriffslevel für die Liste");
define("_ACA_ACCESS_LEVEL_OPTION","Benutzerlevel Optionen");
define("_ACA_USER_LEVEL_EDIT","Wählen Sie welcher Benutzerlevel Mailings bearbeiten darf (sowohl im Frontend als auch im Backend) ");

//  drop down options
define("_ACA_AUTO_DAY_CH1","Täglich");
define("_ACA_AUTO_DAY_CH2","Täglich, außer Wochenenden");
define("_ACA_AUTO_DAY_CH3","Jeden zweiten Tag");
define("_ACA_AUTO_DAY_CH4","Jeden zweiten Tag, außer Wochenenden");
define("_ACA_AUTO_DAY_CH5","Wöchentlich");
define("_ACA_AUTO_DAY_CH6","Zwei-Wöchentlich");
define("_ACA_AUTO_DAY_CH7","Monatlich");
define("_ACA_AUTO_DAY_CH8","Zwei-Monatlich");
define("_ACA_AUTO_DAY_CH9","Jährlich");
define("_ACA_AUTO_OPTION_NONE","Nein");
define("_ACA_AUTO_OPTION_NEW","Neue Benutzer");
define("_ACA_AUTO_OPTION_ALL","Alle Benutzer");

//
define("_ACA_UNSUB_MESSAGE","E-Mail abmelden");
define("_ACA_UNSUB_SETTINGS","Einstellungen abmelden");
define("_ACA_AUTO_ADD_NEW_USERS","Automatisch Benutzer anmelden?");

// Update and upgrade messages
define("_ACA_NO_UPDATES","Momentan sind keine Updates vorhanden.");
define("_ACA_VERSION","jNews Version");
define("_ACA_NEED_UPDATED","Dateien die upgedatet werden müssen:");
define("_ACA_NEED_ADDED","Dateien die hinzugefügt werden müssen:");
define("_ACA_NEED_REMOVED","Dateien die gelöscht werden müssen:");
define("_ACA_FILENAME","Dateiname:");
define("_ACA_CURRENT_VERSION","Aktuelle Version:");
define("_ACA_NEWEST_VERSION","Neuste Version:");
define("_ACA_UPDATING","Update läuft");
define("_ACA_UPDATE_UPDATED_SUCCESSFULLY","Diese Dateien wurden erfolgreich upgedatet.");
define("_ACA_UPDATE_FAILED","Update fehlgeschlagen!");
define("_ACA_ADDING","Füge hinzu");
define("_ACA_ADDED_SUCCESSFULLY","Erfolgreich hinzugefügt.");
define("_ACA_ADDING_FAILED","Hinzufügen fehlgeschlagen!");
define("_ACA_REMOVING","Entfernen");
define("_ACA_REMOVED_SUCCESSFULLY","Erfolgreich entfernt.");
define("_ACA_REMOVING_FAILED","Entfernen fehlgeschlagen!");
define("_ACA_INSTALL_DIFFERENT_VERSION","Installiere eine andere Version");
define("_ACA_CONTENT_ADD","Füge Inhalt hinzu");
define("_ACA_UPGRADE_FROM","Importiere Daten (Newsletter- und Abonnenteninformationen) von ");
define("_ACA_UPGRADE_MESS","Es besteht kein Risiko für bestehende Daten. <br /> Dies wird die Dateien nur in die jNews Datenbank importieren.");
define("_ACA_CONTINUE_SENDING","Senden fortsetzen");

// jNews message
define("_ACA_UPGRADE1","Die können Benutzer und Newsletter einfach importieren aus");
define("_ACA_UPGRADE2"," nach jNews im Uprademenü.");
define("_ACA_UPDATE_MESSAGE","Eine neue Version von jNews ist erschienen ");
define("_ACA_UPDATE_MESSAGE_LINK","Klicken Sie hier um upzudaten!");
define("_ACA_CRON_SETUP","Damit Auto-Responder verschickt werden, müssen Sie einen Cron Task einrichten.");
define("_ACA_FEATURES",'jNews, dein Kommunikationspartner!');
define("_ACA_THANKYOU",'Danke, dass Sie jNews gewählt haben, Ihr Kommunkationspartner!');
define("_ACA_NO_SERVER",'Der Update Server ist nicht erreichbar, probieren Sie es später noch mal.');
define("_ACA_MOD_PUB",'Das jNews Modul ist nicht veröffentlicht.');
define("_ACA_MOD_PUB_LINK",'Klicke hier um es zu veröffentlichen!');
define("_ACA_IMPORT_SUCCESS",'Erfolgreich importiert');
define("_ACA_IMPORT_EXIST",'Abonnenten sind bereits in der Datenbank');


// jNews's Guide
define("_ACA_GUIDE","\'s Assistent");
define("_ACA_GUIDE_FIRST_ACA_STEP","<p>jNews has many great features and this wizard will guide you through a four easy steps process to get you started sending your newsletters and auto-responders!<p />");
define("_ACA_GUIDE_FIRST_ACA_STEP_DESC",'First, you need to add a list.  A list could be of two types, either a newsletter or an auto-responder.' .
		'  In the list you define all the different parameters to enable the sending of your newsletters or auto-responders: sender name, layout, subscribers\' welcome message, etc...
<br /><br />You can set up your first list  here: <a href="index2.php?option=com_jnewsletter&act=list">create a list</a> and click the New button.');
define("_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE","jNews provides you with an easy way to import all data from a previous newsletter system.<br />" .
		" Go to the Updates panel and choose your previous newsletter system to import the all your newsletters and subscribers'.<br /><br />" .
		"<span style='color:#FF5E00;' >IMPORTANT: the import is risk FREE and doesn't affect in any way the data of your previous newsletter system'</span><br />" .
		"After the import you will be able to manage your subscribers and mailings directly from jNews.<br /><br />");
define("_ACA_GUIDE_SECOND_ACA_STEP","Great your first list is setup!  You can now write your first %s.  To create it go to: ");
define("_ACA_GUIDE_SECOND_ACA_STEP_AUTO","Auto-responder Management");
define("_ACA_GUIDE_SECOND_ACA_STEP_NEWS","Newsletter Management");
define("_ACA_GUIDE_SECOND_ACA_STEP_FINAL"," and select your %s. <br /> Then choose your %s in the drop down list.  Create your first mailing by clicking New ");

define("_ACA_GUIDE_THRID_ACA_STEP_NEWS",'Before you send your first newsletter you may want to check the mail configuration.  ' .
		'Go to the <a href="index2.php?option=com_jnewsletter&act=configuration">configuration page</a> to verify the mail settings. <br />');
define("_ACA_GUIDE_THRID2_ACA_STEP_NEWS",'<br />When you are ready go back to the Newsletters menu, select your mailing and click Send');

define("_ACA_GUIDE_THRID_ACA_STEP_AUTOS",'For your auto-responders to be sent you first need to set up a cron task on your server. ' .
		' Please refer to the Cron tab in the configuration panel.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration">click here</a> to learn about setting up a cron task. <br />');

define("_ACA_GUIDE_MODULE"," <br />Make also sure that you have published jNews module so that people can sign up for the list.");

define("_ACA_GUIDE_FOUR_ACA_STEP_NEWS"," You can now also set up an auto-responder.");
define("_ACA_GUIDE_FOUR_ACA_STEP_AUTOS"," You can now also set up a newsletter.");
define("_ACA_GUIDE_FOUR_ACA_STEP",'<p><br />Voila! You are ready to effectively communicate with you visitors and users. This wizard will end as soon as you have entered a second mailing or you can turn it off in the <a href="index2.php?option=com_jnewsletter&act=configuration">configuration panel</a>.' .
		'<br /><br />  If you have any question while using jNews, please refer to the ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60">documentation</a>. ' .
		' You will also find lots of information on how to communicate effectively with your subscribers on <a href="http://www.ijoobi.com/" target="blank">www.ijoobi.com</a>.' .
		'<p /><br /><b>Thank you for using jNews. Your Communication Partner!<b/> ');
define("_ACA_GUIDE_TURNOFF","Der Assistent wird abgeschaltet!");
define("_ACA_STEP","Schritt ");

// jNews Install
define("_ACA_INSTALL_CONFIG","jNews Konfiguration");
define("_ACA_INSTALL_SUCCESS","Erfolgreich installiert");
define("_ACA_INSTALL_ERROR","Installationsfehler");
define("_ACA_INSTALL_BOT","jNews Plugin (Bot)");
define("_ACA_INSTALL_MODULE","jNews Modul");
//Others
define('_ACA_JAVASCRIPT','!Warnung! Javascript muss erlaubt sein, damit jNews ordentlich funktioniert.');
define('_ACA_EXPORT_TEXT','Die zu exportierenden Abonnenten stammen aus der gewählten Liste. <br />Exportiere Abonnenten für Liste:');
define('_ACA_IMPORT_TIPS','Importiere Abonnenten. Die Informationen in dieser Datei müssen im folgenden Format sein: <br />' .
		'Name,email,receiveHTML(0/1),confirmed(0/1)');
define("_ACA_SUBCRIBER_EXIT","ist bereits eingetragen");
define("_ACA_GET_STARTED","Klicke hier um zu beginnen!");

//News since 1.0.1
define('_ACA_WARNING_1011','Warnung: 1011: Update funktioniert nicht, wegen ihrer Servereinstellungen.');
define('_ACA_SEND_MAIL_FROM_TIPS','Wählen Sie welche E-Mailadresse als Absender gezeigt wird.');
define('_ACA_SEND_MAIL_NAME_TIPS','Wählen Sie welcher Name als Absender gezeigt wird.');
define('_ACA_MAILSENDMETHOD_TIPS','Wählen Sie welche E-Mailfunktion Sie nutzen wollen: PHP mail function, <span>Sendmail</span> oder SMTP Server.');
define('_ACA_SENDMAILPATH_TIPS','Dies ist das Verzeichnis des Mailservers');
define('_ACA_LIST_T_TEMPLATE','Template');
define('_ACA_NO_MAILING_ENTERED','Kein Mailing ausgewählt');
define('_ACA_NO_LIST_ENTERED','Keine Liste ausgewählt');
define('_ACA_SENT_MAILING','Sende Mailings');
define('_ACA_SELECT_FILE','Bitte wähle eine Datei um ');
define('_ACA_LIST_IMPORT','Wählen Sie die Liste(n) mit denen Abonnenten verbunden werden sollen.');
define('_ACA_PB_QUEUE','Abonnent hinzugefügt, aber es gibt Probleme ihn/sie zur Liste hinzuzufügen. Bitte überprüfe dieses manuell');
define('_ACA_UPDATE_MESS','');
define('_ACA_UPDATE_MESS1','Update dringend empfohlen!');
define('_ACA_UPDATE_MESS2','Patch und kleine Fixe.');
define('_ACA_UPDATE_MESS3','Neues Release.');
define('_ACA_UPDATE_MESS5','Joomla 1.5 ist erforderlich um upzudaten.');
define('_ACA_UPDATE_IS_AVAIL',' ist erhätlich!');
define('_ACA_NO_MAILING_SENT','Kein Mailing versendet!');
define('_ACA_SHOW_LOGIN','Zeige Loginformular');
define('_ACA_SHOW_LOGIN_TIPS','Wählen Sie Ja um ein Loginformular im Frontend von jNews zu zeigen, so dass Benutzer sich auf der Webseite registrieren können.');
define('_ACA_LISTS_EDITOR','Editor der Listenbeschreibung');
define('_ACA_LISTS_EDITOR_TIPS','Wählen Sie Ja um einen HTMl Editor zu verwenden, um die Listenbeschreibung zu ändern.');
define('_ACA_SUBCRIBERS_VIEW','Zeige Abonnenten');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS','Front-End Einstellungen');
define('_ACA_SHOW_LOGOUT','Zeige Abmelde-Button');
define('_ACA_SHOW_LOGOUT_TIPS','Wählen Sie Ja um einen Abmelde-Button im Ajacoom-Bereich auf der Webseite zu zeigen.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION','Integration');
define('_ACA_CB_INTEGRATION','Community Builder Integration');
define('_ACA_INSTALL_PLUGIN','Community Builder Plugin (jNews Integration) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED','jNews Plugin für den Community Builder ist noch nicht installiert!');
define('_ACA_CB_PLUGIN','Listen bei Registrierung');
define('_ACA_CB_PLUGIN_TIPS','Wählen Sie Ja um die Mailinglisten im Registrierungsformular des Community Builders zu zeigen');
define('_ACA_CB_LISTS','Listen IDs');
define('_ACA_CB_LISTS_TIPS','DIESES FELD WIRD BENÖTIGT: Tragen Sie die ID der Listen ein, die Benutzer abonnieren können sollen, getrennt durch Komma , (0 zeigt alle Listen).');
define('_ACA_CB_INTRO','Einführungstext');
define('_ACA_CB_INTRO_TIPS','Dieser Text erscheit vor der Liste. WENN ER LEER IST, WIRD NICHTS ANGEZEIGT. Benutzen Sie cb_pretext für das CSS Layout.');
define('_ACA_CB_SHOW_NAME','Zeige Listenname');
define('_ACA_CB_SHOW_NAME_TIPS','Wählen Sie ob der Listenname nach dem Einführungstext angezeigt werden soll oder nicht.');
define('_ACA_CB_LIST_DEFAULT','Wähle Liste Standardmässig aus');
define('_ACA_CB_LIST_DEFAULT_TIPS','Wählen Sie ob die Checkbox für jede Liste standardmässig aktiviert sein soll.');
define('_ACA_CB_HTML_SHOW','Zeige HTML empfangen');
define('_ACA_CB_HTML_SHOW_TIPS','Setzten Sie dieses auf JA um Benutzern zu erlauben auszuwählen, ob sie HTML E-Mails bekommen wollen oder nicht. Setzen Sie auf Nein um Standardeinstellungen zu verwenden.');
define('_ACA_CB_HTML_DEFAULT','Standardmässig HTML empfangen');
define('_ACA_CB_HTML_DEFAULT_TIPS','Setzen Sie diese Einstellung um die Standard HTML Konfiguration zu zeigen. Wenn  HTML empfangen auf Nein steht, ist diese Option die Standardoption.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED','Konnte Datei nicht sichern! Datei nicht ersetzt.');
define('_ACA_BACKUP_YOUR_FILES','Die alte Version der Datei wurde in folgendem Verzeichnis gesichert:');
define('_ACA_SERVER_LOCAL_TIME','lokale Serverzeit');
define('_ACA_SHOW_ARCHIVE','Zeige Archiv Knopf');
define('_ACA_SHOW_ARCHIVE_TIPS','Wählen Sie JA um den Archiv Knopf in der Newsletter Liste im Frontend anzuzeigen');
define('_ACA_LIST_OPT_TAG','Tags');
define('_ACA_LIST_OPT_IMG','Bilder');
define('_ACA_LIST_OPT_CTT','Inhalt');
define('_ACA_INPUT_NAME_TIPS','Geben Sie Ihren vollen Namen ein (Vorname zuerst)');
define('_ACA_INPUT_EMAIL_TIPS','Geben Sie Ihre e-mail Adresse ein (Stellen Sie sicher das dies eine gültige e-mail Addresse ist, wenn Sie unsere Mailings empfangen möchten.)');
define('_ACA_RECEIVE_HTML_TIPS','Wählen Sie Ja wenn Sie HTML Mailings empfangen möchten - Nein um reine Text Mailings zu empfangen');
define('_ACA_TIME_ZONE_ASK_TIPS','Wählen Sie Ihre Zeitzone.');


// Since 1.0.5
define('_ACA_FILES','Dateien');
define('_ACA_FILES_UPLOAD','Hochladen');
define('_ACA_MENU_UPLOAD_IMG','Bilder hochladen');
define('_ACA_TOO_LARGE','Die Datei ist zu groß. Die maximal erlaubte Größe beträgt');
define('_ACA_MISSING_DIR','Das Zielverzeichnis existiert nicht');
define('_ACA_IS_NOT_DIR','Das Zielverzeichnis existiert nicht oder ist eine Datei.');
define('_ACA_NO_WRITE_PERMS','Sie haben keine Schreibberechtigung für das Zielverzeichnis.');
define('_ACA_NO_USER_FILE','Sie haben keine Datei zum hochladen ausgewählt.');
define('_ACA_E_FAIL_MOVE','Kann Datei nicht verschieben.');
define('_ACA_FILE_EXISTS','Die Datei existiert bereits.');
define('_ACA_CANNOT_OVERWRITE','Die Datei existiert bereits und kann nicht überschrieben werden.');
define('_ACA_NOT_ALLOWED_EXTENSION','Diese Dateierweiterung ist nicht erlaubt.');
define('_ACA_PARTIAL','Die Datei wurde nur teilweise hochgeladen.');
define('_ACA_UPLOAD_ERROR','Fehler beim hochladen:');
define('DEV_NO_DEF_FILE','Die Datei wurde nur teilweise hochgeladen.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define("_ACA_CONTENTREP",'[SUBSCRIPTIONS] = Dieses wird durch die Abonnement Links ersetzt.' .
		'Es ist <strong>notwendig</strong> damit jNews ordentlich funktioniert.<br />' .
		'Wenn du weiteren Content in dieser Box plaziert, wird er in allen Mailings dieser Liste angezeigt.' .
		' <br />Füge deine Abonnementsnachricht am Ende hinzu.  jNews wird automatisch einen Link hinzufügen, damit Abonnenten Ihre Abonnements ändern und sich abmelden können.');

// since 1.0.6
define('_ACA_NOTIFICATION','Benachrichtigung');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS','Benachrichtigungen');
define('_ACA_USE_SEF','SEF in Mailings');
define('_ACA_USE_SEF_TIPS','Es wird empfohlen NEIN zu wählen. Wenn Sie möchten das diese URL in Ihre Mailings eingefügt wird um SEF zu benutzen dann wählen Sie JA.' .
		' <br /><b>Die Links verhalten sich genauso bei anderen Optionen.  Es gibt keine Garantie das die Links in den Mailings immer funktionieren werden, auch wenn Sie Ihr SEF ändern.</b> ');
define('_ACA_ERR_NB','Fehler #: ERR');
define('_ACA_ERR_SETTINGS','Einstellungen zur Fehlerbehandlung');
define('_ACA_ERR_SEND','Sende Fehler Bericht');
define('_ACA_ERR_SEND_TIPS','Wenn Sie möchten das jNews stetig verbessert wird wählen Sie JA. Dadurch wird ein Fehlerbericht zu uns gesendet.  Somit brauchen Sie uns keinen manuellen Fehlerbericht mehr zu senden <br /> <b>ES WERDEN KEINE PRIVATEN INFORMATIONEN GESENDET</b>.  Wir erfahren noch nichteinmal von welcher Webseite der Fehlerbericht kommt. Wir versenden ausschließlich Informationen über jNews , das PHP Setup und SQL abfragen. ');
define('_ACA_ERR_SHOW_TIPS','Wählen Sie JA um die Fehlernummer anzuzeigen.  Wird zu debugging Zwecken genutzt. ');
define('_ACA_ERR_SHOW','Fehler anzeigen');
define('_ACA_LIST_SHOW_UNSUBCRIBE','Zeige Kündigungs Links');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS','Wählen Sie Ja um die Kündigungs Links am Ende der Mailings damit die Empfänger ihr Abonnement ändern können.<br /> Nein,um Fusszeilen und Links zu deaktivieren.');
define('_ACA_UPDATE_INSTALL','<span style="color: rgb(255, 0, 0);">WICHTIGE MITTEILUNG!</span> <br />Wenn Sie von einer älteren jNews Installation wechseln wollen, müssen Sie Ihre Datenbankstruktur aktualisieren, indem Sie folgenden Knopf klicken (Ihre Daten bleiben dabei erhalten)');
define('_ACA_UPDATE_INSTALL_BTN','Aktualisiere Tabellen und Konfiguration');
define('_ACA_MAILING_MAX_TIME','Max Warteschlangen Zeit');
define('_ACA_MAILING_MAX_TIME_TIPS','Geben Sie die maximale Zeit für jedes E-Mail Paket das von der Warteschlange gesendet wird ein. Empfohlene Werte liegen zwischen 30 Sek. and 2 Min.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION','VirtueMart Integration');
define('_ACA_VM_COUPON_NOTIF','Coupon Benachrichtigungs ID');
define('_ACA_VM_COUPON_NOTIF_TIPS','Geben Sie die ID Nummer des Mailings an welches Sie benutzen möchten um die Coupons zu Ihren Kunden zu schicken.');
define('_ACA_VM_NEW_PRODUCT','Neue Produktbenachrichtigungs ID');
define('_ACA_VM_NEW_PRODUCT_TIPS','Geben Sie die ID Nummer des Mailings an um neue Produktbenachrichtigungen zu verschicken.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON','Formular erstellen');
define('_ACA_FORM_COPY','HTML code');
define('_ACA_FORM_COPY_TIPS','Kopiere den generierten HTML code in Ihre HTML Seite.');
define('_ACA_FORM_LIST_TIPS','Wählen Sie die Liste aus die Sie in Ihr Formular einfügen möchten');
// update messages
define('_ACA_UPDATE_MESS4','Kann\Kann nicht automatisch updaten.');
define('_ACA_WARNG_REMOTE_FILE','Kann entfernte Datei nicht laden.');
define('_ACA_ERROR_FETCH','Fehler beim holen der Datei.');

define('_ACA_CHECK','Überprüfen');
define('_ACA_MORE_INFO','Mehr Informationen');
define('_ACA_UPDATE_NEW','Update auf neuere Version');
define('_ACA_UPGRADE','Auf erweitertes Produkt aktualisieren');
define('_ACA_DOWNDATE','Zurück zur letzten Version');
define('_ACA_DOWNGRADE','Zurück zum Basis Produkt');
define('_ACA_REQUIRE_JOOM','Benötige Joomla');
define('_ACA_TRY_IT','Ausprobieren!');
define('_ACA_NEWER','Neuer');
define('_ACA_OLDER','Älter');
define('_ACA_CURRENT','Aktuell');

// since 1.0.9
define('_ACA_CHECK_COMP','Versuchen Sie eine der anderen Komponenten');
define('_ACA_MENU_VIDEO','Video Anleitungen');
define('_ACA_AUTO_SCHEDULE','Zeitplan');
define('_ACA_SCHEDULE_TITLE','Automatische Zeitplan Einstellungen');
define('_ACA_ISSUE_NB_TIPS','Ausgabenummer wird automatisch vom System generiert');
define('_ACA_SEL_ALL','Alle Mailings');
define('_ACA_SEL_ALL_SUB','Alle Listen');
define('_ACA_INTRO_ONLY_TIPS','Wenn Sie diese Option auswählen, wird nur der Einführungstext des Artikels in Ihr Mailing eingesetzt. Dazu ein Link zu dem kompletten Artikel auf Ihrer Seite.');
define('_ACA_TAGS_TITLE','Inhalts Variable');
define('_ACA_TAGS_TITLE_TIPS','Kopieren und fügen Sie diese Variable in Ihr Mailing, an der Stelle an der der Inhalt erscheinen soll.');
define('_ACA_PREVIEW_EMAIL_TEST','Geben Sie eine e-Mail Adresse an, zu welcher der Test gesendet werden soll');
define('_ACA_PREVIEW_TITLE','Vorschau');
define('_ACA_AUTO_UPDATE','Neue Update Benachrichtigung');
define('_ACA_AUTO_UPDATE_TIPS','Wählen Sie JA wenn Sie über neue Updates der Komponente benachrichtigt werden wollen. <br />Wichtig!! "Tips anzeigen" muss eingeschaltet sein damit diese Funktion arbeitet.');

// since 1.1.0
define('_ACA_LICENSE','Lizenz Information');

// since 1.1.1
define('_ACA_NEW','New');
define('_ACA_SCHEDULE_SETUP','In order for the autoresponders to be sent you need to setup scheduler in the configuration.');
define('_ACA_SCHEDULER','Scheduler');
define('_ACA_JNEWSLETTER_CRON_DESC','if you do not have access to a cron task manager on your website, you can register for a Free jNews Cron account at:');
define('_ACA_CRON_DOCUMENTATION','You can find further information on setting up the jNews Scheduler at the following url:');
define('_ACA_CRON_DOC_URL','<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>');
define( '_ACA_QUEUE_PROCESSED','Queue processed succefully...');
define( '_ACA_ERROR_MOVING_UPLOAD','Error moving imported file');

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY','Scheduler frequency');
define( '_ACA_CRON_MAX_FREQ','Scheduler max frequency');
define( '_ACA_CRON_MAX_FREQ_TIPS','Specify the maximum frequency the scheduler can run ( in minutes ).  This will limit the scheduler even if the cron task is set up more frequently.');
define( '_ACA_CRON_MAX_EMAIL','Maximum emails per task');
define( '_ACA_CRON_MAX_EMAIL_TIPS','Specify the maximum number of emails sent per task (0 unlimited).');
define( '_ACA_CRON_MINUTES',' minutes');
define( '_ACA_SHOW_SIGNATURE','Show email footer');
define( '_ACA_SHOW_SIGNATURE_TIPS','Whether or not you want to promote jNews in the footer of the emails.');
define( '_ACA_QUEUE_AUTO_PROCESSED','Auto-responders processed successfully...');
define( '_ACA_QUEUE_NEWS_PROCESSED','Scheduled newsletters processed successfully...');
define( '_ACA_MENU_SYNC_USERS','Sync Users');
define( '_ACA_SYNC_USERS_SUCCESS','Users Synchronization Successful!');

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT','Logout');
if (!defined('_CMN_YES')) define( '_CMN_YES','Yes');
if (!defined('_CMN_NO')) define( '_CMN_NO','No');
if (!defined('_HI')) define( '_HI','Hi');
if (!defined('_CMN_TOP')) define( '_CMN_TOP','Top');
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM','Bottom');
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT','Logout');

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS','If you select this only the title of the article will be inserted into the mailing as a link to the complete article on your site.');
define('_ACA_TITLE_ONLY','Title Only');
define('_ACA_FULL_ARTICLE_TIPS','If you select this the complete article will be inserted into the mailing');
define('_ACA_FULL_ARTICLE','Full Article');
define('_ACA_CONTENT_ITEM_SELECT_T','Select a content item to append to the message. <br />Copy and paste the <b>content tag</b> into the mailing.  You can choose to have the full text, intro only, or title only with (0, 1, or 2 respectively). ');
define('_ACA_SUBSCRIBE_LIST2','Mailing list(s)');

// smart-newsletter function
define('_ACA_AUTONEWS','Smart-Newsletter');
define('_ACA_MENU_AUTONEWS','Smart-Newsletters');
define('_ACA_AUTO_NEWS_OPTION','Smart-Newsletter options');
define('_ACA_AUTONEWS_FREQ','Newsletter Frequency');
define('_ACA_AUTONEWS_FREQ_TIPS','Specify the frequency at which you want to send the smart-newsletter.');
define('_ACA_AUTONEWS_SECTION','Article Section');
define('_ACA_AUTONEWS_SECTION_TIPS','Specify the section you want to choose the articles from.');
define('_ACA_AUTONEWS_CAT','Article Category');
define('_ACA_AUTONEWS_CAT_TIPS','Specify the category you want to choose the articles from (All for all article in that section).');
define('_ACA_SELECT_SECTION','All Sections');
define('_ACA_SELECT_CAT','All Categories');
define('_ACA_AUTONEWS_STARTDATE','Start date');
define('_ACA_AUTONEWS_STARTDATE_TIPS','Specify the date you want to start sending the Smart Newsletter.');
define('_ACA_AUTONEWS_TYPE','Content rendering');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS','Full Article: will include the entire article in the newsletter.<br />' .
		'Intro only: will include only the introduction of the article in the newsletter.<br/>' .
		'Title only: will include only the title of the article in the newsletter.');
define('_ACA_TAGS_AUTONEWS','[SMARTNEWSLETTER] = This will be replaced by the Smart-newsletter.');

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW','Create / View Mailings');
define('_ACA_LICENSE_CONFIG','License');
define('_ACA_ENTER_LICENSE','Enter license');
define('_ACA_ENTER_LICENSE_TIPS','Enter your license number and save it.');
define('_ACA_LICENSE_SETTING','License settings');
define('_ACA_GOOD_LIC','Your license is valid.');
define('_ACA_NOTSO_GOOD_LIC','Your license is not valid: ');
define('_ACA_PLEASE_LIC','Please contact jNews support to upgrade your license ( license@ijoobi.com ).');

define('_ACA_DESC_PLUS','jNews Plus is the first sequencial auto-responders for Joomla CMS.  ' . _ACA_FEATURES);
define('_ACA_DESC_PRO','jNews PRO the ultimate mailing system for Joomla CMS.  ' . _ACA_FEATURES);

//since 1.1.4
define('_ACA_ENTER_TOKEN','Enter token');
define('_ACA_ENTER_TOKEN_TIPS','Please enter your token number you received by email when you purchased jNews. ');
define('_ACA_JNEWSLETTER_SITE','jNews site:');
define('_ACA_MY_SITE','My site:');
define( '_ACA_LICENSE_FORM',' ' .
 		'Click here to go to the license form.</a>');
define('_ACA_PLEASE_CLEAR_LICENSE','Please clear the license field so it is empty and try again.<br />  If the problem persists, ');
define( '_ACA_LICENSE_SUPPORT','If you still have questions, ' . _ACA_PLEASE_LIC);
define( '_ACA_LICENSE_TWO','you can get your license manual by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT);
define('_ACA_ENTER_TOKEN_PATIENCE','After saving your token a license will be generated automatically. ' .
		' Usually the token is validated in 2 minutes.  However, in some cases it can take up to 15 minutes.<br />' .
		'<br />Check back this control panel in few minutes.  <br /><br />' .
						     'If you didn\'t receive a valid license key in 15 minutes, '. _ACA_LICENSE_TWO);
define( '_ACA_ENTER_NOT_YET','Your token has not yet been validated.');
define( '_ACA_UPDATE_CLICK_HERE','Pleae visit <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> to download the newest version.');
define( '_ACA_NOTIF_UPDATE','To be notified of new updates enter your email address and click subscribe ');

define('_ACA_THINK_PLUS','If you want more out of your mailing system think Plus!');
define('_ACA_THINK_PLUS_1','Sequential auto-responders');
define('_ACA_THINK_PLUS_2','Schedule the delivery of your newsletter for a predefined date');
define('_ACA_THINK_PLUS_3','No more server limitation');
define('_ACA_THINK_PLUS_4','and much more...');



//since 1.2.2
define( '_ACA_LIST_ACCESS','List Access');
define( '_ACA_INFO_LIST_ACCESS','Specify what group of users can view and subscribe to this list');
define( 'ACA_NO_LIST_PERM','You don\'t have enough permission to subscribe to this list');

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE','Archive');
 define('_ACA_MENU_ARCHIVE_ALL','Archive All');

//Archive Lists
 define('_FREQ_OPT_0','None');
 define('_FREQ_OPT_1','Every Week');
 define('_FREQ_OPT_2','Every 2 Weeks');
 define('_FREQ_OPT_3','Every Month');
 define('_FREQ_OPT_4','Every Quarter');
 define('_FREQ_OPT_5','Every Year');
 define('_FREQ_OPT_6','Other');

define('_DATE_OPT_1','Created date');
define('_DATE_OPT_2','Modified date');

define('_ACA_ARCHIVE_TITLE','Setting up auto-archive frequency');
define('_ACA_FREQ_TITLE','Archive frequency');
define('_ACA_FREQ_TOOL','Define how often you want the Archive Manager to arhive your website content.');
define('_ACA_NB_DAYS','Number of days');
define('_ACA_NB_DAYS_TOOL','This is only for the Other option! Please specify the number of days between each Archive.');
define('_ACA_DATE_TITLE','Date type');
define('_ACA_DATE_TOOL','Define if the archived should be done on the created date or modified date.');

define('_ACA_MAINTENANCE_TAB','Maintenance settings');
define('_ACA_MAINTENANCE_FREQ','Maintenance frequency');
define( '_ACA_MAINTENANCE_FREQ_TIPS','Specify the frequency at which you want the maintenance routine to run.');
define( '_ACA_CRON_DAYS','hour(s)');

define( '_ACA_LIST_NOT_AVAIL','There is no list available.');
define( '_ACA_LIST_ADD_TAB','Add/Edit');

define( '_ACA_LIST_ACCESS_EDIT','Mailing Add/Edit Access');
define( '_ACA_INFO_LIST_ACCESS_EDIT','Specify what group of users can add or edit a new mailing for this list');
define( '_ACA_MAILING_NEW_FRONT','Createa New Mailing');

define('_ACA_AUTO_ARCHIVE','Auto-Archive');
define('_ACA_MENU_ARCHIVE','Auto-Archive');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB','[ISSUENB] = This will be replaced by the issue number of  the newsletter.');
define('_ACA_TAGS_DATE','[DATE] = This will be replaced by the sent date.');
define('_ACA_TAGS_CB','[CBTAG:{field_name}] = This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE','Joobi Care');


define('_ACA_THINK_PRO','When you have professional needs, you use professional components!');
define('_ACA_THINK_PRO_1','Smart-Newsletters');
define('_ACA_THINK_PRO_2','Define access level for your list');
define('_ACA_THINK_PRO_3','Define who can edit/add mailings');
define('_ACA_THINK_PRO_4','More tags: add your CB fields');
define('_ACA_THINK_PRO_5','Joomla contents Auto-archive');
define('_ACA_THINK_PRO_6','Database optimization');

define('_ACA_LIC_NOT_YET','Your license is not yet valid.  Please check the license Tab in the configuration panel.');
define('_ACA_PLEASE_LIC_GREEN','Make sure to provide the green information at the top of the tab to our support team.');

define('_ACA_FOLLOW_LINK','Get Your License');
define( '_ACA_FOLLOW_LINK_TWO','You can get your license by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. ');
define( '_ACA_ENTER_TOKEN_TIPS2',' Then click on Apply button in the top right menu.');
define( '_ACA_ENTER_LIC_NB','Enter your License');
define( '_ACA_UPGRADE_LICENSE','Upgrade Your License');
define( '_ACA_UPGRADE_LICENSE_TIPS','If you received a token to upgrade your license please enter it here, click Apply and proceed to number <b>2</b> to get your new license number.');

define( '_ACA_MAIL_FORMAT','Encoding format');
define( '_ACA_MAIL_FORMAT_TIPS','What format do you want to use for encoding your mailings, Text only or MIME');
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT','If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.');

//since 1.3.1
define('_ACA_SHOW_AUTHOR','Show Author\'s Name');
define('_ACA_SHOW_AUTHOR_TIPS','Select Yes if you want to add the name of the author when you add an article in the Mailing');

//since 1.3.5
define('_ACA_REGWARN_NAME','Bitte Ihren Namen eingeben.');
define('_ACA_REGWARN_MAIL','Bitte Ihre E-Mail Adresse eingeben.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','If you select Yes, the e-mail of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be usefull if you want to execute a special script in your redirect page.');
define('_ACA_ADDEMAILREDLINK','Add e-mail to the redirect link');

//since 1.6.3
define('_ACA_ITEMID','ItemId');
define('_ACA_ITEMID_TIPS','This ItemId will be added to your jNews links.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','Show the integration tab for jCalPRO <br/>(only if jCalPRO is installed on your website!)');
define('_ACA_JCALTAGS_TITLE','jCalPRO Tag:');
define('_ACA_JCALTAGS_TITLE_TIPS','Copy and paste this tag into the mailing where you want to have the event to be placed.');
define('_ACA_JCALTAGS_DESC','Description:');
define('_ACA_JCALTAGS_DESC_TIPS','Select Yes if you want to insert the description of the event');
define('_ACA_JCALTAGS_START','Start date:');
define('_ACA_JCALTAGS_START_TIPS','Select Yes if you want to insert the start date of the event');
define('_ACA_JCALTAGS_READMORE','Read more:');
define('_ACA_JCALTAGS_READMORE_TIPS','Select Yes if you want to insert a <b>read more link</b> for this event');
define('_ACA_REDIRECTCONFIRMATION','Redirect URL');
define('_ACA_REDIRECTCONFIRMATION_TIPS','If you require a confirmation e-mail, the user will be confirmed and redirected to this URL if he clicks on the confirmation link.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','No account yet?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Register');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','You are not authorised to view this resource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP','Disable Tooltip');
define('_ACA_DISABLETOOLTIP_TIPS','Disable the tooltip on the frontend');
define('_ACA_MINISENDMAIL','Use Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS','If your server use Mini SendMail, select this option to don\'t add the name of the user in the header of the e-mail');

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