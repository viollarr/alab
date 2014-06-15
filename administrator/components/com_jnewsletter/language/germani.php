<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>German informal language file.</p>
* @copyright (c) 2006 David Freund / All Rights Reserved
* @author David Freund <david@mjjd.de>
* @version 1.0.4
* @version $Id: germani.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.ijoobi.com
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', compa::encodeutf('jNews ist eine Komponente, zum Verwalten von Mailinglisten, Newslettern, Autorespondern und mehr, um effizient mit seinen Bentuzern und Kunden zu kommunizieren. ' .
		'jNews, dein Kommunikationspartner!'));
define('_ACA_DESC_GPL', compa::encodeutf('jNews ist eine Komponente, zum Verwalten von Mailinglisten, Newslettern, Autorespondern und mehr, um effizient mit seinen Bentuzern und Kunden zu kommunizieren. ' .
		'jNews, dein Kommunikationspartner!'));
define('_ACA_FEATURES', compa::encodeutf('jNews, dein Kommunikationspartner!'));

// Type of lists
define('_ACA_NEWSLETTER', compa::encodeutf(' Newsletter'));
define('_ACA_AUTORESP', compa::encodeutf('Auto-responder'));
define('_ACA_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_ECARD', compa::encodeutf('eCard'));
define('_ACA_POSTCARD', compa::encodeutf('Post card'));
define('_ACA_PERF', compa::encodeutf('Performance'));
define('_ACA_COUPON', compa::encodeutf('Coupon'));
define('_ACA_CRON', compa::encodeutf('Cron Task'));
define('_ACA_MAILING', compa::encodeutf('Mailing'));
define('_ACA_LIST', compa::encodeutf('Liste'));

 //jnewsletter Menu
define('_ACA_MENU_LIST', compa::encodeutf('Listenverwaltung'));
define('_ACA_MENU_SUBSCRIBERS', compa::encodeutf('Abonnenten'));
define('_ACA_MENU_NEWSLETTERS', compa::encodeutf(' Newsletter'));
define('_ACA_MENU_AUTOS', compa::encodeutf('Auto-responders'));
define('_ACA_MENU_COUPONS', compa::encodeutf('Coupons'));
define('_ACA_MENU_CRONS', compa::encodeutf('Cron Tasks'));
define('_ACA_MENU_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_MENU_ECARD', compa::encodeutf('eCards'));
define('_ACA_MENU_POSTCARDS', compa::encodeutf('Post cards'));
define('_ACA_MENU_PERFS', compa::encodeutf('Performance'));
define('_ACA_MENU_TAB_LIST', compa::encodeutf('Liste'));
define('_ACA_MENU_MAILING_TITLE', compa::encodeutf('Mailings'));
define('_ACA_MENU_MAILING', compa::encodeutf('Mailings für'));
define('_ACA_MENU_STATS', compa::encodeutf('Statistik'));
define('_ACA_MENU_STATS_FOR', compa::encodeutf('Statistik für'));
define('_ACA_MENU_CONF', compa::encodeutf('Konfiguration'));
define('_ACA_MENU_UPDATE', compa::encodeutf('Import'));
define('_ACA_MENU_ABOUT', compa::encodeutf('Über'));
define('_ACA_MENU_LEARN', compa::encodeutf('Lerncenter'));
define('_ACA_MENU_MEDIA', compa::encodeutf('Media Manager'));
define('_ACA_MENU_HELP', compa::encodeutf('Hilfe'));
define('_ACA_MENU_CPANEL', compa::encodeutf('CPanel'));
define('_ACA_MENU_IMPORT', compa::encodeutf('Importieren'));
define('_ACA_MENU_EXPORT', compa::encodeutf('Exportieren'));
define('_ACA_MENU_SUB_ALL', compa::encodeutf('alle eintragen'));
define('_ACA_MENU_UNSUB_ALL', compa::encodeutf('alle austragen'));
define('_ACA_MENU_VIEW_ARCHIVE', compa::encodeutf('Archiv'));
define('_ACA_MENU_PREVIEW', compa::encodeutf('Vorschau'));
define('_ACA_MENU_SEND', compa::encodeutf('Senden'));
define('_ACA_MENU_SEND_TEST', compa::encodeutf('Test senden'));
define('_ACA_MENU_SEND_QUEUE', compa::encodeutf('Prozessablauf'));
define('_ACA_MENU_VIEW', compa::encodeutf('Ansehen'));
define('_ACA_MENU_COPY', compa::encodeutf('Kopieren'));
define('_ACA_MENU_VIEW_STATS', compa::encodeutf('Zeige Statistiken'));
define('_ACA_MENU_CRTL_PANEL', compa::encodeutf(' Control Panel'));
define('_ACA_MENU_LIST_NEW', compa::encodeutf(' Erstelle eine Liste'));
define('_ACA_MENU_LIST_EDIT', compa::encodeutf(' Bearbeite eine Liste'));
define('_ACA_MENU_BACK', compa::encodeutf('Zurück'));
define('_ACA_MENU_INSTALL', compa::encodeutf('Installation'));
define('_ACA_MENU_TAB_SUM', compa::encodeutf('Zusammenfassung'));
define('_ACA_STATUS', compa::encodeutf('Status'));

// messages
define('_ACA_ERROR', compa::encodeutf(' Ein Fehler trat auf! '));
define('_ACA_SUB_ACCESS', compa::encodeutf('Zugangsrechte'));
define('_ACA_DESC_CREDITS', compa::encodeutf('Credits'));
define('_ACA_DESC_INFO', compa::encodeutf('Information'));
define('_ACA_DESC_HOME', compa::encodeutf('Homepage'));
define('_ACA_DESC_MAILING', compa::encodeutf('Mailing list'));
define('_ACA_DESC_SUBSCRIBERS', compa::encodeutf('Abonement'));
define('_ACA_PUBLISHED', compa::encodeutf('Veröffentlicht'));
define('_ACA_UNPUBLISHED', compa::encodeutf('Unveröffentlicht'));
define('_ACA_DELETE', compa::encodeutf('Löschen'));
define('_ACA_FILTER', compa::encodeutf('Filter'));
define('_ACA_UPDATE', compa::encodeutf('Update'));
define('_ACA_SAVE', compa::encodeutf('Speichern'));
define('_ACA_CANCEL', compa::encodeutf('Abbruch'));
define('_ACA_NAME', compa::encodeutf('Name'));
define('_ACA_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_SELECT', compa::encodeutf('Auswählen'));
define('_ACA_ALL', compa::encodeutf(' alle '));
define('_ACA_SEND_A', compa::encodeutf('Sende einen '));
define('_ACA_SUCCESS_DELETED', compa::encodeutf(' erfolgreich gelöscht'));
define('_ACA_LIST_ADDED', compa::encodeutf('Liste erfolgreich erstellt'));
define('_ACA_LIST_COPY', compa::encodeutf('Liste erfolgreich kopiert'));
define('_ACA_LIST_UPDATED', compa::encodeutf('Liste erfolgreich upgedated'));
define('_ACA_MAILING_SAVED', compa::encodeutf('Mailing erfolgreich gespeichert.'));
define('_ACA_UPDATED_SUCCESSFULLY', compa::encodeutf('erfolgreich upgedated.'));

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', compa::encodeutf('Abonnenteninformationen'));
define('_ACA_VERIFY_INFO', compa::encodeutf('Bitte überprüfe den übertragenden Link, einige Informationen fehlen.'));
define('_ACA_INPUT_NAME', compa::encodeutf('Name'));
define('_ACA_INPUT_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_RECEIVE_HTML', compa::encodeutf('Empfange HTML?'));
define('_ACA_TIME_ZONE', compa::encodeutf('Zeitzone'));
define('_ACA_BLACK_LIST', compa::encodeutf('Black list'));
define('_ACA_REGISTRATION_DATE', compa::encodeutf('Registrierungsdatum'));
define('_ACA_USER_ID', compa::encodeutf('Benutzer ID'));
define('_ACA_DESCRIPTION', compa::encodeutf('Beschreibung'));
define('_ACA_ACCOUNT_CONFIRMED', compa::encodeutf('Dein Account wurde aktiviert.'));
define('_ACA_SUB_SUBSCRIBER', compa::encodeutf('Abonement'));
define('_ACA_SUB_PUBLISHER', compa::encodeutf('Publisher'));
define('_ACA_SUB_ADMIN', compa::encodeutf('Administrator'));
define('_ACA_REGISTERED', compa::encodeutf('Registrierter'));
define('_ACA_SUBSCRIPTIONS', compa::encodeutf('Abonnements'));
define('_ACA_SEND_UNSUBCRIBE', compa::encodeutf('Sende Abmeldungsnachricht'));
define('_ACA_SEND_UNSUBCRIBE_TIPS', compa::encodeutf('Klicke auf Ja um eine Abmeldungsbestätigung zu verschicken.'));
define('_ACA_SUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Bitte bestätige deine Anmeldung'));
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Abmeldungsbestätigung'));
define('_ACA_DEFAULT_SUBSCRIBE_MESS', compa::encodeutf('Hi [NAME],<br />' .
		'Noch ein kurzer Schritt und du hast den Newsletter abonniert. Klicke auf den folgenden Link um deine Registrierung zu bestätigen:' .
		'<br /><br />[CONFIRM]<br /><br />Falls du Fragen hast, wende dich an den Webmaster.'));
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', compa::encodeutf('Dies ist eine Bestätigungse-mail, dass du von der Liste entfernt worden bist. Es tut uns leid, dass du dich entschieden hast, unsere E-Mails nicht weiter zu empfangen. Du kannst dich natürlich jederzeit wieder anmelden.'));

// jNews subscribers
define('_ACA_SIGNUP_DATE', compa::encodeutf('Anmeldungsdatum'));
define('_ACA_CONFIRMED', compa::encodeutf('Bestätigung'));
define('_ACA_SUBSCRIB', compa::encodeutf('Abonniert'));
define('_ACA_HTML', compa::encodeutf('HTML mailings'));
define('_ACA_RESULTS', compa::encodeutf('ERgebnisse'));
define('_ACA_SEL_LIST', compa::encodeutf('Wähle eine Liste'));
define('_ACA_SEL_LIST_TYPE', compa::encodeutf('- Wähle eine Listenart -'));
define('_ACA_SUSCRIB_LIST', compa::encodeutf('Liste aller Abonnenten'));
define('_ACA_SUSCRIB_LIST_UNIQUE', compa::encodeutf('Angemeldet für: '));
define('_ACA_NO_SUSCRIBERS', compa::encodeutf('Es gibt keine Abonnenten auf dieser Liste'));
define('_ACA_COMFIRM_SUBSCRIPTION', compa::encodeutf('Eine Bestätigungse-mail wurde dir zugesandt, bitte ruf deine E-Mails ab und klick auf den Bestätigungslink.<br />' .
		'Du musst deine E-Mailadresse bestätigen, um dein Abonnement gültig zu machen.'));
define('_ACA_SUCCESS_ADD_LIST', compa::encodeutf('Du wurdest erfolgreich der Liste hinzugefügt.'));


 // Subcription info
define('_ACA_CONFIRM_LINK', compa::encodeutf('Klicke hier, um dein Abonnement zu bestätigen.'));
define('_ACA_UNSUBSCRIBE_LINK', compa::encodeutf('Klicke hier, um dich von der Liste wieder abzumelden.'));
define('_ACA_UNSUBSCRIBE_MESS', compa::encodeutf('Deine E-Mailadresse wurde von der Liste entfern'));

define('_ACA_QUEUE_SENT_SUCCESS', compa::encodeutf('alle geplanten Mailings wurden erfolgreich versendet.'));
define('_ACA_MALING_VIEW', compa::encodeutf('Zeige alle Mailings'));
define('_ACA_UNSUBSCRIBE_MESSAGE', compa::encodeutf('Bist du sicher, dass du dich von dieser Liste abmelden willst?'));
define('_ACA_MOD_SUBSCRIBE', compa::encodeutf('Abonnieren'));
define('_ACA_SUBSCRIBE', compa::encodeutf('Abonnieren'));
define('_ACA_UNSUBSCRIBE', compa::encodeutf('Abmelden'));
define('_ACA_VIEW_ARCHIVE', compa::encodeutf('Zeige das Archiv'));
define('_ACA_SUBSCRIPTION_OR', compa::encodeutf(' oder klicke heir für weitere Informationen'));
	define('_ACA_EMAIL_ALREADY_REGISTERED', compa::encodeutf('Diese E-Mailadresse wurde schon mal angemeldet.'));
define('_ACA_SUBSCRIBER_DELETED', compa::encodeutf('Abonnenten erfolgreich gelöscht'));


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', compa::encodeutf('Benutzer Kontrollmenü'));
define('_UCP_USER_MENU', compa::encodeutf('Benutzermenü'));
define('_UCP_USER_CONTACT', compa::encodeutf('Meine Abonnements'));
 //jNews Cron Menu
define('_UCP_CRON_MENU', compa::encodeutf('Cron Task Management'));
define('_UCP_CRON_NEW_MENU', compa::encodeutf('New Cron'));
define('_UCP_CRON_LIST_MENU', compa::encodeutf('Zeige meine Cron'));
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', compa::encodeutf('Coupons Management'));
define('_UCP_COUPON_LIST_MENU', compa::encodeutf('List of Coupons'));
define('_UCP_COUPON_ADD_MENU', compa::encodeutf('Add a Coupon'));

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', compa::encodeutf('Beschreibung'));
define('_ACA_LIST_T_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_LIST_T_SUBSCRIPTION', compa::encodeutf('Abonement'));
define('_ACA_LIST_T_SENDER', compa::encodeutf('Absenderinformationen'));

define('_ACA_LIST_TYPE', compa::encodeutf('Listenart'));
define('_ACA_LIST_NAME', compa::encodeutf('Listenname'));
define('_ACA_LIST_ISSUE', compa::encodeutf('Ausgabe #'));
define('_ACA_LIST_DATE', compa::encodeutf('Sendedatum'));
define('_ACA_LIST_SUB', compa::encodeutf('Mailing Betreff'));
define('_ACA_ATTACHED_FILES', compa::encodeutf('Angehängte Dateien'));
define('_ACA_SELECT_LIST', compa::encodeutf('Bitte wähle eine Liste zum editieren aus!'));

// Auto Responder box
define('_ACA_AUTORESP_ON', compa::encodeutf('Listenart'));
define('_ACA_AUTO_RESP_OPTION', compa::encodeutf('Optionen für automatische Antworten'));
define('_ACA_AUTO_RESP_FREQ', compa::encodeutf('Abonemmenten können Häufigkeit wählen'));
define('_ACA_AUTO_DELAY', compa::encodeutf('Verzögerung (in Tagen)'));
define('_ACA_AUTO_DAY_MIN', compa::encodeutf('Minimalste Häufigkeit'));
define('_ACA_AUTO_DAY_MAX', compa::encodeutf('Maximalste Häufigkeit'));
define('_ACA_FOLLOW_UP', compa::encodeutf('Specify follow up auto-responder'));
define('_ACA_AUTO_RESP_TIME', compa::encodeutf('Subscribers can choose time'));
define('_ACA_LIST_SENDER', compa::encodeutf('Absender'));

define('_ACA_LIST_DESC', compa::encodeutf('List description'));
define('_ACA_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_SENDER_NAME', compa::encodeutf('Absendernamen'));
define('_ACA_SENDER_EMAIL', compa::encodeutf('Absender-E-mail'));
define('_ACA_SENDER_BOUNCE', compa::encodeutf('Rückantwortsadresse'));
define('_ACA_LIST_DELAY', compa::encodeutf('Verzögerung'));
define('_ACA_HTML_MAILING', compa::encodeutf('HTML Mails?'));
define('_ACA_HTML_MAILING_DESC', compa::encodeutf('(wenn du dies änderst, musst du speichern und die Seite neu laden, um die Änderungen zu sehen.)'));
define('_ACA_HIDE_FROM_FRONTEND', compa::encodeutf('Im Frontend verstecken?'));
define('_ACA_SELECT_IMPORT_FILE', compa::encodeutf('Wähle eine Datei zum importieren aus'));;
define('_ACA_IMPORT_FINISHED', compa::encodeutf('Import beendet'));
define('_ACA_DELETION_OFFILE', compa::encodeutf('Löschen einer Datei'));
define('_ACA_MANUALLY_DELETE', compa::encodeutf('gescheitert, du solltest die Datei manuell löschen'));
define('_ACA_CANNOT_WRITE_DIR', compa::encodeutf('Kann in diesem Verzeichnis nicht schreiben'));
define('_ACA_NOT_PUBLISHED', compa::encodeutf('Konnte das Mailing nicht verschicken, die Liste wurde nicht veröffentlicht.'));

//  List info box
define('_ACA_INFO_LIST_PUB', compa::encodeutf('Klicke auf Ja um die Liste zu veröffentlichen'));
define('_ACA_INFO_LIST_NAME', compa::encodeutf('Trage hier den Namen deiner Liste ein. Du kannst die Liste an Hand ihres Namen identifizieren.'));
define('_ACA_INFO_LIST_DESC', compa::encodeutf('Trage hier eine kurze Beschreibung deiner Liste ein. Diese Beschreibung wird für Besucher deiner Webseite sichtbar sein.'));
define('_ACA_INFO_LIST_SENDER_NAME', compa::encodeutf('Trage hier den Namen des Absenders für die Mailings ein. Dieser Name wird sichtbar sein, wenn Abonnenten Nachrichten über diese Liste empfangen.'));
define('_ACA_INFO_LIST_SENDER_EMAIL', compa::encodeutf('Trage hier die E-Mailadresse ein, von der die Nachrichten versandt werden.'));
define('_ACA_INFO_LIST_SENDER_BOUNCED', compa::encodeutf('Trage hier die E-Mailadresse ein, auf die Benutzer antworten können. Es ist höchstempfehlenstwert, dass diese, die gleiche wie die Senderadresse ist, da Spamfilter den Nachrichten sonst eher als Spam behandeln.'));
define('_ACA_INFO_LIST_AUTORESP', compa::encodeutf('Wähle den Typ für Nachrichten dieser Liste:<br />' .
		' Newsletter: Normaler Newsletter<br />' .
		'Auto-responder: Ein auto-responder ist eine Liste, welche automatisch durch die Webseite in regelmäßigen Abständen verschickt wird.'));
define('_ACA_INFO_LIST_FREQUENCY', compa::encodeutf('Erlaube dem Benutzer wie oft sie Nachrichten von der Liste erhalten. Das gibt den Benutzern mehr Flexibilität.'));
define('_ACA_INFO_LIST_TIME', compa::encodeutf('Erlaube dem Benutzer auszuwählen, zu welcher Zeit er am liebsten Nachrichten über die Liste empfängt.'));
define('_ACA_INFO_LIST_MIN_DAY', compa::encodeutf('Definiere was die minimalste Häufigkeit an Nachrichten über die Liste ist, die ein Benutzer wählen kann.'));
define('_ACA_INFO_LIST_DELAY', compa::encodeutf('Setzte den Abstand zwischem diesem Auto-Respondern und dem vorherigen.'));
define('_ACA_INFO_LIST_DATE', compa::encodeutf('Setzte das Datum, an dem du diese Nachricht veröffentlichen willst, wenn du die Veröffentlichung verzögern willst. <br /> FORMAT : YYYY-MM-DD HH:MM:SS'));
define('_ACA_INFO_LIST_MAX_DAY', compa::encodeutf('Definiere was die maximale Häufigkeit an Nachrichten über die Liste ist, die ein Benutzer wählen kann'));
define('_ACA_INFO_LIST_LAYOUT', compa::encodeutf('Trage hier das Layout der Mailingliste ein. Du kannst jedes Layout hier eintragen'));
define('_ACA_INFO_LIST_SUB_MESS', compa::encodeutf('Diese Nachricht wird zum Benutzer geschickt, wenn er oder sie sich registriert. Du kannst jeden Text hier eintragen.'));
define('_ACA_INFO_LIST_UNSUB_MESS', compa::encodeutf('Diese Nachricht wird zum Abonnenten geschickt, wenn er sich von der Liste abgemeldet hat. Jede Nachricht kann hier eingetragen werden.'));
define('_ACA_INFO_LIST_HTML', compa::encodeutf('Wähle dieses wenn du eine HTML-Mail verschicken willst. Abonnenten haben die Möglichkeit sich auszusuchen, ob sie die HTML-Nachricht empfangen wwollen oder nur den reinen Text, wenn sie eine HTML-Liste abonniert haben.'));
define('_ACA_INFO_LIST_HIDDEN', compa::encodeutf('Klicke Ja um die Mailingliste vor dem Frontend zu verstecken. Dadruch können Benutzer sich nicht anmelden, aber du kannst weiterhin Mailings verschicken.'));
define('_ACA_INFO_LIST_ACA_AUTO_SUB', compa::encodeutf('Sollen Benutzer automatisch der Liste hinzugefügt werden?<br /><B>Neue Benutzer:</B> Jeder neu registrierte Benutzer wird der Liste hinzugefügt.<br /><B>alle Benutzer:</B> Registriert jeden Benutzer in der Datenbank.<br />(alle Optionen unterstützten den CommunityBuilder)'));
define('_ACA_INFO_LIST_ACC_LEVEL', compa::encodeutf('Bestimme die Zugangsoptionen aus dem Frontend. Damit werden Listen Benutzern gezeigt oder vor ihnen versteckt, wenn sie keinen Zugang zu ihnen haben, also sich nicht eintragen können.'));
define('_ACA_INFO_LIST_ACC_USER_ID', compa::encodeutf('Wähle den Zugangslevel der Benutzergruppe, der du erlauben willst, die Liste zu bearbeiten. Die Benutzergruppe wird in der Lage sein, Mailings zu bearbeiten und zu versenden, sowohl vom Backend, als auch vom Frontend.'));
define('_ACA_INFO_LIST_FOLLOW_UP', compa::encodeutf('Wenn du willst, dass der Auto-Responder zu einem weiteren wechselt, sobald es die letzte Nachricht erreicht hat, kannst du hier den folgenden Auto-Responder bestimmen.'));
define('_ACA_INFO_LIST_ACA_OWNER', compa::encodeutf('Das ist die ID der Person, die die Liste erstellt hat.'));
define('_ACA_INFO_LIST_WARNING', compa::encodeutf('   Diese Option ist nur beim Erstellen der Liste wählbar.'));
define('_ACA_INFO_LIST_SUBJET', compa::encodeutf(' Betreff des Mailings. Das ist der Betreff der E-Mail, die die Benutzer bekommen werden.'));
define('_ACA_INFO_MAILING_CONTENT', compa::encodeutf('^Das ist der Body der E-Mail, die du versenden willst.'));
define('_ACA_INFO_MAILING_NOHTML', compa::encodeutf('Trage hier den Body der E-Mail ein, den Benutzer erhalten sollen, die keine HTML-E-mails bekommen wollen.'));
define('_ACA_INFO_MAILING_VISIBLE', compa::encodeutf('Klicke Ja um das Mailing im Frontend anzuzeigen.'));
define('_ACA_INSERT_CONTENT', compa::encodeutf('Füge existierenden Content ein.'));

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', compa::encodeutf('Coupon erfolgreich versendet!'));
define('_ACA_CHOOSE_COUPON', compa::encodeutf('Wähle einen Coupon'));
define('_ACA_TO_USER', compa::encodeutf(' an diesen Benutzer'));

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', compa::encodeutf('Jede Stunde'));
define('_ACA_FREQ_CH2', compa::encodeutf('alle 6 Stunden'));
define('_ACA_FREQ_CH3', compa::encodeutf('alle 12 Stunden'));
define('_ACA_FREQ_CH4', compa::encodeutf('Täglich'));
define('_ACA_FREQ_CH5', compa::encodeutf('Wöchentlich'));
define('_ACA_FREQ_CH6', compa::encodeutf('Monatlich'));
define('_ACA_FREQ_NONE', compa::encodeutf('Nicht'));
define('_ACA_FREQ_NEW', compa::encodeutf('Neue Benutzer'));
define('_ACA_FREQ_ALL', compa::encodeutf('alle Benutzer'));

//Label CRON form
define('_ACA_LABEL_FREQ', compa::encodeutf('jNews Cron?'));
define('_ACA_LABEL_FREQ_TIPS', compa::encodeutf('Klicke Ja wenn du dieses für einen jNews Cron nutzen willst, NEin für einen anderen Conjob.<br />' .
		'Wenn du Ja Klickst, musst du keine spezielle Cron-Adresse eingeben, sie wird automatisch dazugefügt.'));
define('_ACA_SITE_URL', compa::encodeutf('Die URL deiner Webseite'));
define('_ACA_CRON_FREQUENCY', compa::encodeutf('Cron Häufigkeit'));
define('_ACA_STARTDATE_FREQ', compa::encodeutf('Anfangsdatum'));
define('_ACA_LABELDATE_FREQ', compa::encodeutf('Datum bestimmen'));
define('_ACA_LABELTIME_FREQ', compa::encodeutf('Zeit bestmmen'));
define('_ACA_CRON_URL', compa::encodeutf('Cron URL'));
define('_ACA_CRON_FREQ', compa::encodeutf('Häufigkeit'));
define('_ACA_TITLE_CRONLIST', compa::encodeutf('Cron Liste'));
define('_NEW_LIST', compa::encodeutf('Erstelle eine neue Liste'));

//title CRON form
define('_ACA_TITLE_FREQ', compa::encodeutf('Cron Bearbeiten'));
define('_ACA_CRON_SITE_URL', compa::encodeutf('Bitte trage eine gültige URL ein, beginnend mit http://'));

### Mailings ###
define('_ACA_MAILING_ALL', compa::encodeutf('alle Mailings'));
define('_ACA_EDIT_A', compa::encodeutf('Bearbeite '));
define('_ACA_SELCT_MAILING', compa::encodeutf('Bitte wähle eine Liste aus dem Drop-Down Menü um ein neues Mailing zu verfassen.'));
define('_ACA_VISIBLE_FRONT', compa::encodeutf('Sichtbar im Frontend'));

// mailer
define('_ACA_SUBJECT', compa::encodeutf('Betreff'));
define('_ACA_CONTENT', compa::encodeutf('Inhalt'));
define('_ACA_NAMEREP', compa::encodeutf('[NAME] = Dies wird durch den Namen des Abonnenten ersetzt, die E-Mail wird also personalisiert, wenn du dieses nutzt.<br />'));
define('_ACA_FIRST_NAME_REP', compa::encodeutf('[FIRSTNAME] = Dies wird durch den VORnamen des Abonnenten ersetzt.<br />'));
define('_ACA_NONHTML', compa::encodeutf('NICHT-HTML Version'));
define('_ACA_ATTACHMENTS', compa::encodeutf('Anhänge'));
define('_ACA_SELECT_MULTIPLE', compa::encodeutf('Halte Steuerung (STRG) um mehrere Anhänge zu wählen.<br />' .
		'Die Dateien, die in der Liste der Anhänge, erscheinen, sind im Ordner Attachements gespeichert. Du kannst diesen Ordner im Konfigurationsmenü ändern.'));
define('_ACA_CONTENT_ITEM', compa::encodeutf('Inhaltselement'));
define('_ACA_SENDING_EMAIL', compa::encodeutf('Versende  E-mails'));
define('_ACA_MESSAGE_NOT', compa::encodeutf('E-Mails konnte nicht versendet werden'));
define('_ACA_MAILER_ERROR', compa::encodeutf('MAil error'));
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', compa::encodeutf('E-Mail erfolgreich versendet'));
define('_ACA_SENDING_TOOK', compa::encodeutf('Diese Mail zu versenden dauerte'));
define('_ACA_SECONDS', compa::encodeutf('Sekunden'));
define('_ACA_NO_ADDRESS_ENTERED', compa::encodeutf('Keine Adresse eingetragen'));
define('_ACA_CHANGE_SUBSCRIPTIONS', compa::encodeutf('Ändere'));
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', compa::encodeutf('Ändere deine Abonnements'));
define('_ACA_WHICH_EMAIL_TEST', compa::encodeutf('Gebe die E-Mailadresse an, an die eine Textmail gesendet werden soll, oder wähle Vorschau'));
define('_ACA_SEND_IN_HTML', compa::encodeutf('Versene in HTML (für HTML-Mails)?'));
define('_ACA_VISIBLE', compa::encodeutf('Sichtbar'));
define('_ACA_INTRO_ONLY', compa::encodeutf('Nur die Einleitung'));

// stats
define('_ACA_GLOBALSTATS', compa::encodeutf('Allgemeine Statistiken'));
define('_ACA_DETAILED_STATS', compa::encodeutf('Detailierte Statistiken'));
define('_ACA_MAILING_LIST_DETAILS', compa::encodeutf('Zeige Details'));
define('_ACA_SEND_IN_HTML_FORMAT', compa::encodeutf('Sende im HTML-Format'));
define('_ACA_VIEWS_FROM_HTML', compa::encodeutf('Ansichten (aus HTML-Mails)'));
define('_ACA_SEND_IN_TEXT_FORMAT', compa::encodeutf('Sende im Textformat'));
define('_ACA_HTML_READ', compa::encodeutf('HTML lesen'));
define('_ACA_HTML_UNREAD', compa::encodeutf('HTML nicht lesen'));
define('_ACA_TEXT_ONLY_SENT', compa::encodeutf('Nur Text'));

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', compa::encodeutf('Mail'));
define('_ACA_LOGGING_CONFIG', compa::encodeutf('Logs & Statistiken'));
define('_ACA_SUBSCRIBER_CONFIG', compa::encodeutf('Abonnenten'));
define('_ACA_AUTO_CONFIG', compa::encodeutf('Cron'));
define('_ACA_MISC_CONFIG', compa::encodeutf('Verschiedenes'));
define('_ACA_MAIL_SETTINGS', compa::encodeutf('Mail Einstellungen'));
define('_ACA_MAILINGS_SETTINGS', compa::encodeutf('Mailing Einstellungen'));
define('_ACA_SUBCRIBERS_SETTINGS', compa::encodeutf('Abonemmenten Einstellungen'));
define('_ACA_CRON_SETTINGS', compa::encodeutf('Cron Einstellungen'));
define('_ACA_SENDING_SETTINGS', compa::encodeutf('Sendeeinstellungen'));
define('_ACA_STATS_SETTINGS', compa::encodeutf('Statistikeinstellungen'));
define('_ACA_LOGS_SETTINGS', compa::encodeutf('Logeinstellungen'));
define('_ACA_MISC_SETTINGS', compa::encodeutf('Verschiedene Einstellungen'));
// mail settings
define('_ACA_SEND_MAIL_FROM', compa::encodeutf('E-Mail von'));
define('_ACA_SEND_MAIL_NAME', compa::encodeutf('Von Name'));
define('_ACA_MAILSENDMETHOD', compa::encodeutf('Versandmethode'));
define('_ACA_SENDMAILPATH', compa::encodeutf('Sendmail pfad'));
define('_ACA_SMTPHOST', compa::encodeutf('SMTP Host'));
define('_ACA_SMTPAUTHREQUIRED', compa::encodeutf('SMTP Authentifizierung erforderlich'));
define('_ACA_SMTPAUTHREQUIRED_TIPS', compa::encodeutf('Wähle ja, wenn dein SMTP Server Authentifizierung erfordert'));
define('_ACA_SMTPUSERNAME', compa::encodeutf('SMTP Benutzername'));
define('_ACA_SMTPUSERNAME_TIPS', compa::encodeutf('Trage den SMTP Benutzername ein, wenn dein SMTP Server Authentifzierung verlangt'));
define('_ACA_SMTPPASSWORD', compa::encodeutf('SMTP Password'));
define('_ACA_SMTPPASSWORD_TIPS', compa::encodeutf('Trage dein SMTP Password ein, wenn dein SMTP Server Authentifizierung verlangt'));
define('_ACA_USE_EMBEDDED', compa::encodeutf('Benutze eingebettete Bilder'));
define('_ACA_USE_EMBEDDED_TIPS', compa::encodeutf('Wähle ja, wenn die Bilder in HTML E-Mails im Anhang eingebettet werden sollen oder nein, wenn sie mit Standart Bilder Tags über den Server verlinkt werden sollen'));
define('_ACA_UPLOAD_PATH', compa::encodeutf('Upload/Anhang Pfad'));
define('_ACA_UPLOAD_PATH_TIPS', compa::encodeutf('Du kannst ein Uploadverzeichnis bestimmen<br />' .
		'Gehe sicher, dass das bestimmte Verzeichnis existiert, oder erstelle es'));

// subscribers settings
define('_ACA_ALLOW_UNREG', compa::encodeutf('Erlaube Nichtregistrierten'));
define('_ACA_ALLOW_UNREG_TIPS', compa::encodeutf('Wähle JA, wenn du willst, dass Benutzer sich eintragen dürfen, ohne auf der Seite registriert zu sein.'));
define('_ACA_REQ_CONFIRM', compa::encodeutf('Bestätigung erfordert'));
define('_ACA_REQ_CONFIRM_TIPS', compa::encodeutf('Wähle Ja, wenn du willst, dass unregistrierte Benutzer ihre E-Mailadresse bestätigen müssen.'));
define('_ACA_SUB_SETTINGS', compa::encodeutf('Abonnement Einstellungen'));
define('_ACA_SUBMESSAGE', compa::encodeutf('Abonenmenten E-mail'));
define('_ACA_SUBSCRIBE_LIST', compa::encodeutf('Trage dich in eine Liste ein'));

define('_ACA_USABLE_TAGS', compa::encodeutf('Erlaubte Tags'));
define('_ACA_NAME_AND_CONFIRM', compa::encodeutf('<b>[CONFIRM]</b> = Dies erzeugt einen Link, den Benutzer nutzen können, um ihr Abonnement zu bestätigen. Dies ist  <strong>erforderlich</strong> damit jNews richtig funktioniert.<br />'
.'<br />[NAME] = Das wird durch den Namen des Abonnmenten ersetzt, die E-Mail wird also personalisiert.br />'
.'<br />[FIRSTNAME] = Dies wird durch den VORnamen des Abonnmenten. VDer Vorname ist definiert als der Vorname, den der Abonnment eingetragen hat.<br />'));
define('_ACA_CONFIRMFROMNAME', compa::encodeutf('Bestätigung des Namen'));
define('_ACA_CONFIRMFROMNAME_TIPS', compa::encodeutf('Trage die Bestätigung des Namen ein, um eine Liste der Bestätigungen zu sehen.'));
define('_ACA_CONFIRMFROMEMAIL', compa::encodeutf('Bestätigung der E-mail'));
define('_ACA_CONFIRMFROMEMAIL_TIPS', compa::encodeutf('Trage die E-Mailadresse ein, um eine Liste der Bestätigungen zu sehen.'));
define('_ACA_CONFIRMBOUNCE', compa::encodeutf('Bestätigung die  Bounce E-Mailadresse'));
define('_ACA_CONFIRMBOUNCE_TIPS', compa::encodeutf('Trage die Bounce E-Mailadresse ein, um eine Liste der Bestätigungen zu sehen.'));
define('_ACA_HTML_CONFIRM', compa::encodeutf('HTML Bestätigung'));
define('_ACA_HTML_CONFIRM_TIPS', compa::encodeutf('Wähle Ja, wenn die Bestätigungsliste HTML sein soll, so fern der Bentuzer HTML erlaubt..'));
define('_ACA_TIME_ZONE_ASK', compa::encodeutf('Frage nach Zeitzone'));
define('_ACA_TIME_ZONE_TIPS', compa::encodeutf('Wähle Ja, wenn du willst, dass der Benutzer nach seiner Zeitzone gefragt wird. Die E-Mails werden dann auf Basis der Zeitzone versandt.'));

 // Cron Set up
define('_ACA_TIME_OFFSET_URL', compa::encodeutf('Klicke hier, um di Zeitabweichung in der Global configuration zu setzen. Global configuration --> Lokale'));
define('_ACA_TIME_OFFSET_TIPS', compa::encodeutf('Setze deine Serverzeitabweichung, so dass das gespeicherte Datum und die Zeit korrekt sind'));
define('_ACA_TIME_OFFSET', compa::encodeutf('Zeitabweichung'));
define('_ACA_CRON_TITLE', compa::encodeutf('Stelle die Cron-Funktion ein'));
define('_ACA_CRON_DESC', compa::encodeutf('<br />Wenn du die Cron-Funktion nutzt, kannst du eine automatische Aufgabe für deine Joomla Webseite einstellen!<br />' .
		'Um es zu aktivieren musst du in deinen Cronteinstellungen folgenden Befehl ergänzen:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Wenn du Hilfe bei der Einrichtung brauchst, oder Probleme hast, bitte benutzte unser Forum <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>'));
// sending settings
define('_ACA_PAUSEX', compa::encodeutf('Warte x Sekunden nach einer bestimmten Anzahl von Mails'));
define('_ACA_PAUSEX_TIPS', compa::encodeutf('Trage eine Anzahl von Sekunden ein, die jNews dem SMTP Server gibt, um die E-Mails zu versenden, bevor er mit der nächsten bestimmten Anzahl von E-Mails fortfährt.'));
define('_ACA_EMAIL_BET_PAUSE', compa::encodeutf('E-Mails zwischen den Pausen'));
define('_ACA_EMAIL_BET_PAUSE_TIPS', compa::encodeutf('Anzahl der E-Mails, die zwischen den Pausen versendet werden soll.'));
define('_ACA_WAIT_USER_PAUSE', compa::encodeutf('Warte auf den Benutzer nach einer Pause'));
define('_ACA_WAIT_USER_PAUSE_TIPS', compa::encodeutf('Soll das Skript nach der Pause zwischen den E-Mails auf eine Benutzereingabe warten.'));
define('_ACA_SCRIPT_TIMEOUT', compa::encodeutf('Skript brauchte zu lange (Time out)'));
define('_ACA_SCRIPT_TIMEOUT_TIPS', compa::encodeutf('Die Anzahl der Minuten, die das Skript laufen sollte.'));
// Stats settings
define('_ACA_ENABLE_READ_STATS', compa::encodeutf('Aktiviere Statistiken'));
define('_ACA_ENABLE_READ_STATS_TIPS', compa::encodeutf('Wähle Ja, wenn gespeichert werden soll, wie viele Leute die E-Mail angesehen haben. Das kann nur bei HTML-Mails genutzt werden.'));
define('_ACA_LOG_VIEWSPERSUB', compa::encodeutf('Speichere Anzeigen pro Benutzer'));
define('_ACA_LOG_VIEWSPERSUB_TIPS', compa::encodeutf('Wähle Ja, wenn Anzeigen pro Benutzer gespeichert werden soll. Dies kann nur bei HTML-Mails genutzt werden.'));
// Logs settings
define('_ACA_DETAILED', compa::encodeutf('Detailierte Logs'));
define('_ACA_SIMPLE', compa::encodeutf('Einfache Kogs'));
define('_ACA_DIAPLAY_LOG', compa::encodeutf('Zeige Logs'));
define('_ACA_DISPLAY_LOG_TIPS', compa::encodeutf('Wähle Ja, wenn du die Logs während des Mailversandes angezeigt haben möchtest.'));
define('_ACA_SEND_PERF_DATA', compa::encodeutf('Sendestatistik'));
define('_ACA_SEND_PERF_DATA_TIPS', compa::encodeutf('Wähle Ja, wenn du jNews erlauben willst, anonyme Berichte über deine Konfiguration, die Menge der Abonnmenten einer Liste und der Zeit die das Versenden der Mail zu versenden. Dies würde uns helfen, jNews in Zukunft zu verbessern.'));
define('_ACA_SEND_AUTO_LOG', compa::encodeutf('Sende Logdatei für Auto-Responder'));
define('_ACA_SEND_AUTO_LOG_TIPS', compa::encodeutf('Wähle Ja, wenn du willst, dass du jedes Mal einen Log bekommst, wenn die Mails verschickt werden. WARNUNG: Dies kann zu einer großen Menge Mails führen'));
define('_ACA_SEND_LOG', compa::encodeutf('Sende Log'));
define('_ACA_SEND_LOG_TIPS', compa::encodeutf('Soll ein Log an die E-Mailadresse geschickt werden, welche das Mailing verschickt hat'));
define('_ACA_SEND_LOGDETAIL', compa::encodeutf('Sende detailierten Logs'));
define('_ACA_SEND_LOGDETAIL_TIPS', compa::encodeutf('Detailiert beinhaltet Erfolg- oder Fehlermeldungen für jeden Abonnemten und eine Übersicht über diese Informationen. Einfach sendet nur die Übersicht.'));
define('_ACA_SEND_LOGCLOSED', compa::encodeutf('Sende Log wenn die Verbindung beendet wird.'));
define('_ACA_SEND_LOGCLOSED_TIPS', compa::encodeutf(' Wenn diese Option aktiviert ist, erhält der Benutzer, der das Mailing versandt hat auch einen Bericht per E-Mail.'));
define('_ACA_SAVE_LOG', compa::encodeutf('Speichere Log'));
define('_ACA_SAVE_LOG_TIPS', compa::encodeutf('Soll ein Log des Mailings an die Logdatei angehängt werden?'));
define('_ACA_SAVE_LOGDETAIL', compa::encodeutf('Speiche detailierten Log'));
define('_ACA_SAVE_LOGDETAIL_TIPS', compa::encodeutf('Detailed includes the success or failure information for each subscriber and an overview of the information. Simple only saves the overview.'));
define('_ACA_SAVE_LOGFILE', compa::encodeutf('Save log file'));
define('_ACA_SAVE_LOGFILE_TIPS', compa::encodeutf('File to which log information is appended. This file could become rather large.'));
define('_ACA_CLEAR_LOG', compa::encodeutf('Leere  Log'));
define('_ACA_CLEAR_LOG_TIPS', compa::encodeutf('Leert die Logdatei.'));

### control panel
define('_ACA_CP_LAST_QUEUE', compa::encodeutf('Letzte ausgeführte Reihe'));
define('_ACA_CP_TOTAL', compa::encodeutf('Total'));
define('_ACA_MAILING_COPY', compa::encodeutf('Mailing erfolgreich kopiert!'));

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', compa::encodeutf('Zeige Assistenten'));
define('_ACA_SHOW_GUIDE_TIPS', compa::encodeutf('Zeige den Assistenten am Anfang, um neuen Benutzern zu helfen, eigene Newsletter zu kreieren, einen Auto-Responder und um jNews richtig zu konfigurieren.'));
define('_ACA_AUTOS_ON', compa::encodeutf('Benutze Auto-Responders'));
define('_ACA_AUTOS_ON_TIPS', compa::encodeutf('Wähle Ja, wenn du Auto-Responder nicht nutzen willst, alle Auto-Responder Optionen werden deaktiviert.'));
define('_ACA_NEWS_ON', compa::encodeutf('Benutze Newsletter'));
define('_ACA_NEWS_ON_TIPS', compa::encodeutf('Select No if you don\'t want to use Newsletters, all the newsletters option will be desactivated.'));
define('_ACA_SHOW_TIPS', compa::encodeutf('Zeige Tipps'));
define('_ACA_SHOW_TIPS_TIPS', compa::encodeutf('Zeige Tipps damit Benutzer jNews einfacher bedienen können.'));
define('_ACA_SHOW_FOOTER', compa::encodeutf('Zeige den Footer'));
define('_ACA_SHOW_FOOTER_TIPS', compa::encodeutf('Soll die Copyright Hinweise im Footer angezeigt werden, oder nicht?'));
define('_ACA_SHOW_LISTS', compa::encodeutf('Zeige Listen im Frontend'));
define('_ACA_SHOW_LISTS_TIPS', compa::encodeutf('Wenn Benutzer nicht registriert sind, ziege eine Liste der möglichen Newsletter, die sie abonnieren können, sowie den Archiv Button oder das Registrierungsformular.'));
define('_ACA_CONFIG_UPDATED', compa::encodeutf('Die Konfiguration wurde upgedated!'));
define('_ACA_UPDATE_URL', compa::encodeutf('Update URL'));
define('_ACA_UPDATE_URL_WARNING', compa::encodeutf('WARNUNG! Ändere die URL nicht, es sei denn du würdest vom technischen Team von jNews darum gebeten<br />'));
define('_ACA_UPDATE_URL_TIPS', compa::encodeutf('Zum Beispiele: http://www.ijoobi.com/update/ (inklusive dem Slash am Ende)'));

// module
define('_ACA_EMAIL_INVALID', compa::encodeutf('Die eingegebene E-Mail ist ungültig.'));
define('_ACA_REGISTER_REQUIRED', compa::encodeutf('Bitte registriere dich, bevor du eine Liste abonnierst.'));

// Access level box
define('_ACA_OWNER', compa::encodeutf('Hersteller der  Liste:'));
define('_ACA_ACCESS_LEVEL', compa::encodeutf('Setze Zugriffslevel für die Liste'));
define('_ACA_ACCESS_LEVEL_OPTION', compa::encodeutf('Benutzerlevel Optionen'));
define('_ACA_USER_LEVEL_EDIT', compa::encodeutf('Wähle welches Benuzterlevel Mailings bearbeiten darf (sowohl im Frontend als auch im Backend) '));

//  drop down options
define('_ACA_AUTO_DAY_CH1', compa::encodeutf('Täglich'));
define('_ACA_AUTO_DAY_CH2', compa::encodeutf('Täglich, außer Wochenenden'));
define('_ACA_AUTO_DAY_CH3', compa::encodeutf('Jeden zweiten Tag'));
define('_ACA_AUTO_DAY_CH4', compa::encodeutf('Jeden zweiten Tag, außer Wochenenden'));
define('_ACA_AUTO_DAY_CH5', compa::encodeutf('Wöchentlich'));
define('_ACA_AUTO_DAY_CH6', compa::encodeutf('Zwei-Wöchentlich'));
define('_ACA_AUTO_DAY_CH7', compa::encodeutf('Monatlich'));
define('_ACA_AUTO_DAY_CH9', compa::encodeutf('Jährlich'));
define('_ACA_AUTO_OPTION_NONE', compa::encodeutf('Nein'));
define('_ACA_AUTO_OPTION_NEW', compa::encodeutf('Neue Benutzer'));
define('_ACA_AUTO_OPTION_ALL', compa::encodeutf('alle Benutzer'));

//
define('_ACA_UNSUB_MESSAGE', compa::encodeutf('E-Mail abmelden'));
define('_ACA_UNSUB_SETTINGS', compa::encodeutf('Einstellungen abmelden'));
define('_ACA_AUTO_ADD_NEW_USERS', compa::encodeutf('Automatisch Benutzer anmelden?'));

// Update and upgrade messages
define('_ACA_NO_UPDATES', compa::encodeutf('Momentan sind keine Updates verhanden.'));
define('_ACA_VERSION', compa::encodeutf('jNews Version'));
define('_ACA_NEED_UPDATED', compa::encodeutf('Dateien die upgedatet werden müssen:'));
define('_ACA_NEED_ADDED', compa::encodeutf('Dateien die hinzugefügt werden müssen:'));
define('_ACA_NEED_REMOVED', compa::encodeutf('Dateien die gelöscht werden müssen:'));
define('_ACA_FILENAME', compa::encodeutf('Dateiname:'));
define('_ACA_CURRENT_VERSION', compa::encodeutf('Aktuelle Version:'));
define('_ACA_NEWEST_VERSION', compa::encodeutf('Neuste Version:'));
define('_ACA_UPDATING', compa::encodeutf('Update läuft'));
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', compa::encodeutf('Diese Dateien wurden erfolgreich upgedatet.'));
define('_ACA_UPDATE_FAILED', compa::encodeutf('Update fehlgeschlagen!'));
define('_ACA_ADDING', compa::encodeutf('Füge hinzu'));
define('_ACA_ADDED_SUCCESSFULLY', compa::encodeutf('Erfolgreich hinzugefügt.'));
define('_ACA_ADDING_FAILED', compa::encodeutf('Hinzufügen fehlgeschlagen!'));
define('_ACA_REMOVING', compa::encodeutf('Entfernen'));
define('_ACA_REMOVED_SUCCESSFULLY', compa::encodeutf('Erfolgreich entfernt.'));
define('_ACA_REMOVING_FAILED', compa::encodeutf('Entfernen fehlgeschlagen!'));
define('_ACA_INSTALL_DIFFERENT_VERSION', compa::encodeutf('Installiere eine andere Version'));
define('_ACA_CONTENT_ADD', compa::encodeutf('Füge Inhalt hinzu'));
define('_ACA_UPGRADE_FROM', compa::encodeutf('Importiere Daten (Newsletter- und Abonnenteninformationen) von '));
define('_ACA_UPGRADE_MESS', compa::encodeutf('Es besteht kein Risiko für bestehende Daten. <br /> Dies wird die Dateien nur in die jNews Datenbank importieren.'));
define('_ACA_CONTINUE_SENDING', compa::encodeutf('Senden fortsetzen'));

// jNews message
define('_ACA_UPGRADE1', compa::encodeutf('Du kannst Benutzer und Newsletter einfach importieren aus'));
define('_ACA_UPGRADE2', compa::encodeutf(' nach jNews im Upgrademenü.'));
define('_ACA_UPDATE_MESSAGE', compa::encodeutf('Eine neue Version von jNews ist erschienen '));
define('_ACA_UPDATE_MESSAGE_LINK', compa::encodeutf('Klicke hier, um die Version zu bekommen!'));
define('_ACA_CRON_SETUP', compa::encodeutf('Damit Auto-Responder verschickt werden, musst du einen Cron Task einrichten.'));
define('_ACA_FEATURES', compa::encodeutf('jNews, dein Kommunikationspartner!'));
define('_ACA_THANKYOU', compa::encodeutf('Danke, dass du jNews gewählt hast, deinen Kommunkationspartner!'));
define('_ACA_NO_SERVER', compa::encodeutf('Der Update Server ist nicht erreichbar, probier es später noch mal.'));
define('_ACA_MOD_PUB', compa::encodeutf('Das jNews Modul ist nicht veröffentlicht.'));
define('_ACA_MOD_PUB_LINK', compa::encodeutf('Klicke hier, um es zu veröffentlichen!'));
define('_ACA_IMPORT_SUCCESS', compa::encodeutf('Erfolgreich importiert'));
define('_ACA_IMPORT_EXIST', compa::encodeutf('Abonnmenten sind bereits in der Datenbank'));


// jNews's Guide
define('_ACA_GUIDE', compa::encodeutf('\'s Assistent'));
define('_ACA_GUIDE_FIRST_ACA_STEP', compa::encodeutf('<p>jNews has many great features and this wizard will guide you through a four easy steps process to get you started sending your newsletters and auto-responders!<p />'));
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', compa::encodeutf('First, you need to add a list.  A list could be of two types, either a newsletter or an auto-responder.' .
		'  In the list you define all the different parameters to enable the sending of your newsletters or auto-responders: sender name, layout, subscribers\' welcome message, etc...
<br /><br />You can set up your first list  here: <a href="index2.php?option=com_jnewsletter&act=list" >create a list</a> and click the New button.'));
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', compa::encodeutf('jNews provides you with an easy way to import all data from a previous newsletter system.<br />' .
		' Go to the Updates panel and choose your previous newsletter system to import the all your newsletters and subscribers.<br /><br />' .
		'<span style="color:#FF5E00;"  >IMPORTANT: the import is risk FREE and doesn\'t affect in any way the data of your previous newsletter system</span><br />' .
		'After the import you will be able to manage your subscribers and mailings directly from jNews.<br /><br />'));
define('_ACA_GUIDE_SECOND_ACA_STEP', compa::encodeutf('Great your first list is setup!  You can now write your first %s.  To create it go to: '));
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', compa::encodeutf('Auto-responder Management'));
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', compa::encodeutf(' Newsletter Management'));
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', compa::encodeutf(' and select your %s. <br /> Then choose your %s in the drop down list.  Create your first mailing by clicking New '));

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', compa::encodeutf('Before you send your first newsletter you may want to check the mail configuration.  ' .
		'Go to the <a href="index2.php?option=com_jnewsletter&act=configuration" >configuration page</a> to verify the mail settings. <br />'));
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', compa::encodeutf('<br />When you are ready go back to the Newsletters menu, select your mailing and click Send'));

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', compa::encodeutf('For your auto-responders to be sent you first need to set up a cron task on your server. ' .
		' Please refer to the Cron tab in the configuration panel.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >click here</a> to learn about setting up a cron task. <br />'));

define('_ACA_GUIDE_MODULE', compa::encodeutf(' <br />Make also sure that you have published jNews module so that people can sign up for the list.'));

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', compa::encodeutf(' You can now also set up an auto-responder.'));
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', compa::encodeutf(' You can now also set up a newsletter.'));
define('_ACA_GUIDE_FOUR_ACA_STEP', compa::encodeutf('<p><br />Voila! You are ready to effectively communicate with you visitors and users. This wizard will end as soon as you have entered a second mailing or you can turn it off in the <a href="index2.php?option=com_jnewsletter&act=configuration" >configuration panel</a>.' .
		'<br /><br />  If you have any question while using jNews, please refer to the ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60" >documentation</a>. ' .
		' You will also find lots of information on how to communicate effectively with your subscribers on <a href="http://www.ijoobi.com/"  target="_blank">www.jNews.com</a>.' .
		'<p /><br /><b>Thank you for using jNews. Your Communication Partner!<b/> '));
define('_ACA_GUIDE_TURNOFF', compa::encodeutf('Der Assitent wird abgeschaltet!'));
define('_ACA_STEP', compa::encodeutf('Schritt '));

// jNews Install
define('_ACA_INSTALL_CONFIG', compa::encodeutf('jNews Konfiguration'));
define('_ACA_INSTALL_SUCCESS', compa::encodeutf('Erfolgreich installiert'));
define('_ACA_INSTALL_ERROR', compa::encodeutf('Installationsfehler'));
define('_ACA_INSTALL_BOT', compa::encodeutf('jNews Plugin (Bot)'));
define('_ACA_INSTALL_MODULE', compa::encodeutf('jNews Modul'));
//Others
define('_ACA_JAVASCRIPT', compa::encodeutf('!Warnung! Javascript muss erlaubt sein, damit jNews ordentlich funktioniert.'));
define('_ACA_EXPORT_TEXT', compa::encodeutf('Die zu exportierenden Abonnenten stammen aus der gewählten Liste. <br />Exportiere Abonnenten für Liste:'));
define('_ACA_IMPORT_TIPS', compa::encodeutf('Importiere Abonnenten. Die Informationen in dieser Datei müssen im folgenden Format sein: <br />' .
		'Name,E-mail,receiveHTML(1/0),confirmed(1/0)'));
define('_ACA_SUBCRIBER_EXIT', compa::encodeutf('ist bereits eingetragen'));
define('_ACA_GET_STARTED', compa::encodeutf('Klicke hier, um zu beginnen!'));

//News since 1.0.1
define('_ACA_WARNING_1011', compa::encodeutf('Warnung: 1011: Update funktioniert nicht, wegen deiner Servereinstellungen.'));
define('_ACA_SEND_MAIL_FROM_TIPS', compa::encodeutf('Wähle, welche E-Mailadresse als Absender gezeigt wird.'));
define('_ACA_SEND_MAIL_NAME_TIPS', compa::encodeutf('Wähle welcher Name als Absender gezeigt wird.'));
define('_ACA_MAILSENDMETHOD_TIPS', compa::encodeutf('Wähle welche E-Mailfunktion du nutzen willst: PHP mail function, <span>Sendmail</span> oder SMTP Server.'));
define('_ACA_SENDMAILPATH_TIPS', compa::encodeutf('Dies ist das Verzeichnis des Mailservers'));
define('_ACA_LIST_T_TEMPLATE', compa::encodeutf('Template'));
define('_ACA_NO_MAILING_ENTERED', compa::encodeutf('Kein Mailing ausgewählt'));
define('_ACA_NO_LIST_ENTERED', compa::encodeutf('Keine Liste ausgewählt'));
define('_ACA_SENT_MAILING', compa::encodeutf('Sende Mailings'));
define('_ACA_SELECT_FILE', compa::encodeutf('Bitte wähle eine Datei um '));
define('_ACA_LIST_IMPORT', compa::encodeutf('Wähle die Liste(n) mit denen Abonnenten verbunden werden sollen.'));
define('_ACA_PB_QUEUE', compa::encodeutf('Abonnent hinzugefügt, aber es gibt Probleme ihn/sie zur Liste hinzuzufügen. Bitte überprüfe dieses manuell'));
define('_ACA_UPDATE_MESS', compa::encodeutf(''));
define('_ACA_UPDATE_MESS1', compa::encodeutf('Update dringend empfohlen!'));
define('_ACA_UPDATE_MESS2', compa::encodeutf('Patch und kleine Fixe.'));
define('_ACA_UPDATE_MESS3', compa::encodeutf('Neues Release.'));
define('_ACA_UPDATE_MESS5', compa::encodeutf('Joomla 1.5 ist erforderlich um upzudaten.'));
define('_ACA_UPDATE_IS_AVAIL', compa::encodeutf(' ist erhätlich!'));
define('_ACA_NO_MAILING_SENT', compa::encodeutf('Kein Mailing versendet!'));
define('_ACA_SHOW_LOGIN', compa::encodeutf('Zeige Loginformular'));
define('_ACA_SHOW_LOGIN_TIPS', compa::encodeutf('Wähle Ja um ein Loginformular im Frontend von jNews zu zeigen, so dass Benutzer sich auf der Webseite registrieren können.'));
define('_ACA_LISTS_EDITOR', compa::encodeutf('Editor der Listenbeschreibung'));
define('_ACA_LISTS_EDITOR_TIPS', compa::encodeutf('Wähle Ja um einen HTMl Editor zu vewenden, um die Listenbeschreibung zu ändern.'));
define('_ACA_SUBCRIBERS_VIEW', compa::encodeutf('Zeige Abonnenten'));

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', compa::encodeutf('Front-End Einstellungen'));
define('_ACA_SHOW_LOGOUT', compa::encodeutf('Zeige Abmelde-Button'));
define('_ACA_SHOW_LOGOUT_TIPS', compa::encodeutf('Wähle Ja um einen Abmelde-Button im Ajacoom-Bereich auf der Webseite zu zeigen.'));

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', compa::encodeutf('Integration'));
define('_ACA_CB_INTEGRATION', compa::encodeutf('Community Builder Integration'));
define('_ACA_INSTALL_PLUGIN', compa::encodeutf('Community Builder Plugin (jNews Integration) '));
define('_ACA_CB_PLUGIN_NOT_INSTalleD', compa::encodeutf('jNews Plugin für den Community Builder ist noch nicht installiert!'));
define('_ACA_CB_PLUGIN', compa::encodeutf('Listen bei Registrierung'));
define('_ACA_CB_PLUGIN_TIPS', compa::encodeutf('WÄhle Ja um die Mailinglisten im Registrierungsformaler des Community Builders zu zeigen'));
define('_ACA_CB_LISTS', compa::encodeutf('Listen IDs'));
define('_ACA_CB_LISTS_TIPS', compa::encodeutf('DIESES FELD WIRD BENÖTIGT: Trage die ID der Listen ein, die Benutzer abonnieren können sollen, getrennt durch Komma , (0 zeigt alle Listen).'));
define('_ACA_CB_INTRO', compa::encodeutf('Einführungstext'));
define('_ACA_CB_INTRO_TIPS', compa::encodeutf('Dieser Text erscheit vor der Liste. WENN ER LEER IST, WIRD NICHTS ANGEZEIGT. benutze cb_pretext für das CSS Layout.'));
define('_ACA_CB_SHOW_NAME', compa::encodeutf('Zeigen Listenname'));
define('_ACA_CB_SHOW_NAME_TIPS', compa::encodeutf('Wähle ob der Listenname nach dem Einführungstext angezeigt werden soll oder nicht.'));
define('_ACA_CB_LIST_DEFAULT', compa::encodeutf('Wähle Liste standartmässig aus'));
define('_ACA_CB_LIST_DEFAULT_TIPS', compa::encodeutf('Wähle ob die Checkbox für jede Liste standartmässig aktiviert sein soll.'));
define('_ACA_CB_HTML_SHOW', compa::encodeutf('Zeige HTML empfangen'));
define('_ACA_CB_HTML_SHOW_TIPS', compa::encodeutf('Setzte dieses auf JA um Benutzern zu erlauben auszuwählen, ob sie HTML E-Mails bekommen wollen oder nicht. Setze auf Nein um Standarteinstellungen zu verwenden.'));
define('_ACA_CB_HTML_DEFAULT', compa::encodeutf('Standartmässig HTML empfangen'));
define('_ACA_CB_HTML_DEFAULT_TIPS', compa::encodeutf('Setze diese Einstellung um die Standart HTML Konfiguration zu zeigen. Wenn  HTML empfangen auf Nein steht, ist diese Option die Standartoption.'));


define('_ACA_CONTENTREP', compa::encodeutf('[SUBSCRIPTIONS] = Dieses wird mit den Ein-/Austragungslinks ersetzt.' .
		' Es ist <strong>notwendig</strong> damit jNews ordentlich funktioniert.<br />' .
		'Wenn du weiteren Content in dieser Box plaziert, wird er in allen Mailings dieser Liste angezeigt.' .
		' <br />Füge deine Abonnementsnachricht am Ende hinzu.  jNews wird automatisch einen Link hinzufügen, damit Abonnenten ihre Abonnements ändern und sich abmelden können.'));

// since 1.0.6
define('_ACA_NOTIFICATION', compa::encodeutf('Hinweis'));  // shortcut for E-mail notification
define('_ACA_NOTIFICATIONS', compa::encodeutf('Hinweise'));
define('_ACA_USE_SEF', compa::encodeutf('SEF in Mailings'));
define('_ACA_USE_SEF_TIPS', compa::encodeutf('Es ist empfohlen NEIN zu wählen. Wenn du umbedingt willst, dass die URL in deiner Mail SEF verwendet, dann wähle JA.' .
		' <br /><b>Die Links funktionieren für beide Optionen. NEIN stellt sicher, dass die Links auch funktionieren, wenn du deine SEF änderst.</b> '));
define('_ACA_ERR_NB', compa::encodeutf('Fehler #: ERR'));
define('_ACA_ERR_SETTINGS', compa::encodeutf('Fehler beim Bearbeiten der Einstellungen'));
define('_ACA_ERR_SEND', compa::encodeutf('Sende Fehlerbericht'));
define('_ACA_ERR_SEND_TIPS', compa::encodeutf('Wenn du willst, dass jNews verbessert wird, wähle JA. Das wird uns einen Fehlerbericht senden, so dass du uns Bugs nicht mehr melden musst. ;-) <br /><b>KEINE PRIVATEN INFORMATIONEN WERDEN VERSANDT</b> Wir erfahren nicht mal von welcher Webseite der Fehler kommt, lediglich jNews Informationen, sowie das PHP-Setup und SQL-Queries werden versandt. '));
define('_ACA_ERR_SHOW_TIPS', compa::encodeutf('Wähle Ja um die Fehlernummer anzuzeigen. Hauptsächlich für Debugging Zwecke. '));
define('_ACA_ERR_SHOW', compa::encodeutf('Zeige Fehler'));
define('_ACA_LIST_SHOW_UNSUBCRIBE', compa::encodeutf('Zeige Abmeldungslinks'));
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', compa::encodeutf('Wähle Ja um am Ende der E-Mails die Abmeldungslinks anzuzeigen, um Benutzern erlauben ihre Abonnements zu ändern <br /> No entfernt den Footer und die Links.'));
define('_ACA_UPDATE_INSTALL', compa::encodeutf('<span style="color: rgb(255, 0, 0);">WICHTIGER HINWEIS!</span> <br />Wenn du von einer vorherigen jNewsversion upgradest, muss deine Datenbank upgedatet werden, indem du hier klickst (Deine Daten bleiben erhalten)'));
define('_ACA_UPDATE_INSTALL_BTN', compa::encodeutf('Update Tabellen und Konfiguration'));
define('_ACA_MAILING_MAX_TIME', compa::encodeutf('Max Bearbeitungszeit'));
define('_ACA_MAILING_MAX_TIME_TIPS', compa::encodeutf('Definiere die maximale Zeit für einzelne E-Mailpackete, die versandt werden sollen. Empfohlen werden Zeiten zwischen 30s 2mins..'));

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', compa::encodeutf('VirtueMart Integration'));
define('_ACA_VM_COUPON_NOTIF', compa::encodeutf('Coupon Hinweis ID'));
define('_ACA_VM_COUPON_NOTIF_TIPS', compa::encodeutf('Wähle die ID Nummer des Mailings, dass du nutzen willst um Coupons an deine Kunden zu versenden'));
define('_ACA_VM_NEW_PRODUCT', compa::encodeutf('Hinweis ID für neue Projekte'));
define('_ACA_VM_NEW_PRODUCT_TIPS', compa::encodeutf('Wähle die ID des Mailings, dass du nutzen willst, um Informationen über neue Produkte zu versenden.'));


// Since 1.0.4
define('_ACA_BACKUP_FAILED', compa::encodeutf('Could not backup the file! File not replaced.'));
define('_ACA_BACKUP_YOUR_FILES', compa::encodeutf('The old version of the files have been backed up into the following directory:'));
define('_ACA_SERVER_LOCAL_TIME', compa::encodeutf('Server local time'));
define('_ACA_SHOW_ARCHIVE', compa::encodeutf('Show archive button'));
define('_ACA_SHOW_ARCHIVE_TIPS', compa::encodeutf('Select YES to show the archive button in the front end on the Newsletter listing'));
define('_ACA_LIST_OPT_TAG', compa::encodeutf('Tags'));
define('_ACA_LIST_OPT_IMG', compa::encodeutf('Images'));
define('_ACA_LIST_OPT_CTT', compa::encodeutf('Content'));
define('_ACA_INPUT_NAME_TIPS', compa::encodeutf('Enter your full name (firstname first)'));
define('_ACA_INPUT_EMAIL_TIPS', compa::encodeutf('Enter your email address (Make sure this is a valid email address if you want to receive our mailings.)'));
define('_ACA_RECEIVE_HTML_TIPS', compa::encodeutf('Choose Yes if you want to receive HTML mailings - No to receive Text only mailings'));
define('_ACA_TIME_ZONE_ASK_TIPS', compa::encodeutf('Specify your time zone.'));


// Since 1.0.5
define('_ACA_FILES', compa::encodeutf('Files'));
define('_ACA_FILES_UPLOAD', compa::encodeutf('Upload'));
define('_ACA_MENU_UPLOAD_IMG', compa::encodeutf('Upload Images'));
define('_ACA_TOO_LARGE', compa::encodeutf('File size too large. The maximum permitted size is'));
define('_ACA_MISSING_DIR', compa::encodeutf('Destination directory doesn\'t exist'));
define('_ACA_IS_NOT_DIR', compa::encodeutf('The destination directory doesn\'t exist or is a regular file.'));
define('_ACA_NO_WRITE_PERMS', compa::encodeutf('The destination directory doesn\'t have write perms.'));
define('_ACA_NO_USER_FILE', compa::encodeutf('You haven\'t selected any file for uploading.'));
define('_ACA_E_FAIL_MOVE', compa::encodeutf('Impossible to move the file.'));
define('_ACA_FILE_EXISTS', compa::encodeutf('The destination file already exists.'));
define('_ACA_CANNOT_OVERWRITE', compa::encodeutf('The destination file already exists and could not be overwritten.'));
define('_ACA_NOT_ALLOWED_EXTENSION', compa::encodeutf('File extension not permitted.'));
define('_ACA_PARTIAL', compa::encodeutf('The file was only partially uploaded.'));
define('_ACA_UPLOAD_ERROR', compa::encodeutf('Upload error:'));
define('DEV_NO_DEF_FILE', compa::encodeutf('The file was only partially uploaded.'));


// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', compa::encodeutf('Create form'));
define('_ACA_FORM_COPY', compa::encodeutf('HTML code'));
define('_ACA_FORM_COPY_TIPS', compa::encodeutf('Copy the generated HTML code into your HTML page.'));
define('_ACA_FORM_LIST_TIPS', compa::encodeutf('Select the list you want to include in the form'));
// update messages
define('_ACA_UPDATE_MESS4', compa::encodeutf('It can\'t be updated automatically.'));
define('_ACA_WARNG_REMOTE_FILE', compa::encodeutf('No way to get remote file.'));
define('_ACA_ERROR_FETCH', compa::encodeutf('Error fetching file.'));

define('_ACA_CHECK', compa::encodeutf('Check'));
define('_ACA_MORE_INFO', compa::encodeutf('More info'));
define('_ACA_UPDATE_NEW', compa::encodeutf('Update to newer version'));
define('_ACA_UPGRADE', compa::encodeutf('Upgrade to higher product'));
define('_ACA_DOWNDATE', compa::encodeutf('Roll back to previous version'));
define('_ACA_DOWNGRADE', compa::encodeutf('Back to basic product'));
define('_ACA_REQUIRE_JOOM', compa::encodeutf('Require Joomla'));
define('_ACA_TRY_IT', compa::encodeutf('Try it!'));
define('_ACA_NEWER', compa::encodeutf('Newer'));
define('_ACA_OLDER', compa::encodeutf('Older'));
define('_ACA_CURRENT', compa::encodeutf('Current'));

// since 1.0.9
define('_ACA_CHECK_COMP', compa::encodeutf('Try one of the other components'));
define('_ACA_MENU_VIDEO', compa::encodeutf('Video tutorials'));
define('_ACA_AUTO_SCHEDULE', compa::encodeutf('Schedule'));
define('_ACA_SCHEDULE_TITLE', compa::encodeutf('Automatic schedule function setting'));
define('_ACA_ISSUE_NB_TIPS', compa::encodeutf('Issue number generated automatically by the system'));
define('_ACA_SEL_ALL', compa::encodeutf('All mailings'));
define('_ACA_SEL_ALL_SUB', compa::encodeutf('All lists'));
define('_ACA_INTRO_ONLY_TIPS', compa::encodeutf('If you check this box only the introduction of the article will be inserted into the mailing with a read more link to the complete article on your site.'));
define('_ACA_TAGS_TITLE', compa::encodeutf('Content tag'));
define('_ACA_TAGS_TITLE_TIPS', compa::encodeutf('Copy and paste this tag into the mailing where you want to have the content to be placed.'));
define('_ACA_PREVIEW_EMAIL_TEST', compa::encodeutf('Indicate the email address to send a test to'));
define('_ACA_PREVIEW_TITLE', compa::encodeutf('Preview'));
define('_ACA_AUTO_UPDATE', compa::encodeutf('New update notification'));
define('_ACA_AUTO_UPDATE_TIPS', compa::encodeutf('Select Yes if you want to be notified of new updates for your component. <br />IMPORTANT!! Show tips needs to be on for this function to work.'));

// since 1.1.0
define('_ACA_LICENSE', compa::encodeutf('License Information'));


// since 1.1.1
define('_ACA_NEW', compa::encodeutf('New'));
define('_ACA_SCHEDULE_SETUP', compa::encodeutf('In order for the autoresponders to be sent you need to setup scheduler in the configuration.'));
define('_ACA_SCHEDULER', compa::encodeutf('Scheduler'));
define('_ACA_JNEWSLETTER_CRON_DESC', compa::encodeutf('if you do not have access to a cron task manager on your website, you can register for a Free jNews Cron account at:'));
define('_ACA_CRON_DOCUMENTATION', compa::encodeutf('You can find further information on setting up the jNews Scheduler at the following url:'));
define('_ACA_CRON_DOC_URL', compa::encodeutf('<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>'));
define( '_ACA_QUEUE_PROCESSED', compa::encodeutf('Queue processed succefully...'));
define( '_ACA_ERROR_MOVING_UPLOAD', compa::encodeutf('Error moving imported file'));

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', compa::encodeutf('Scheduler frequency'));
define( '_ACA_CRON_MAX_FREQ', compa::encodeutf('Scheduler max frequency'));
define( '_ACA_CRON_MAX_FREQ_TIPS', compa::encodeutf('Specify the maximum frequency the scheduler can run ( in minutes ).  This will limit the scheduler even if the cron task is set up more frequently.'));
define( '_ACA_CRON_MAX_EMAIL', compa::encodeutf('Maximum emails per task'));
define( '_ACA_CRON_MAX_EMAIL_TIPS', compa::encodeutf('Specify the maximum number of emails sent per task (0 unlimited).'));
define( '_ACA_CRON_MINUTES', compa::encodeutf(' minutes'));
define( '_ACA_SHOW_SIGNATURE', compa::encodeutf('Show email footer'));
define( '_ACA_SHOW_SIGNATURE_TIPS', compa::encodeutf('Whether or not you want to promote jNews in the footer of the emails.'));
define( '_ACA_QUEUE_AUTO_PROCESSED', compa::encodeutf('Auto-responders processed successfully...'));
define( '_ACA_QUEUE_NEWS_PROCESSED', compa::encodeutf('Scheduled newsletters processed successfully...'));
define( '_ACA_MENU_SYNC_USERS', compa::encodeutf('Sync Users'));
define( '_ACA_SYNC_USERS_SUCCESS', compa::encodeutf('Users Synchronization Successful!'));

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Logout'));
if (!defined('_CMN_YES')) define( '_CMN_YES', compa::encodeutf('Yes'));
if (!defined('_CMN_NO')) define( '_CMN_NO', compa::encodeutf('No'));
if (!defined('_HI')) define( '_HI', compa::encodeutf('Hi'));
if (!defined('_CMN_TOP')) define( '_CMN_TOP', compa::encodeutf('Top'));
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', compa::encodeutf('Bottom'));
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Logout'));

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', compa::encodeutf('If you select this only the title of the article will be inserted into the mailing as a link to the complete article on your site.'));
define('_ACA_TITLE_ONLY', compa::encodeutf('Title Only'));
define('_ACA_FULL_ARTICLE_TIPS', compa::encodeutf('If you select this the complete article will be inserted into the mailing'));
define('_ACA_FULL_ARTICLE', compa::encodeutf('Full Article'));
define('_ACA_CONTENT_ITEM_SELECT_T', compa::encodeutf('Select a content item to append to the message. <br />Copy and paste the <b>content tag</b> into the mailing.  You can choose to have the full text, intro only, or title only with (0, 1, or 2 respectively). '));
define('_ACA_SUBSCRIBE_LIST2', compa::encodeutf('Mailing list(s)'));

// smart-newsletter function
define('_ACA_AUTONEWS', compa::encodeutf(' Smart-Newsletter'));
define('_ACA_MENU_AUTONEWS', compa::encodeutf(' Smart-Newsletters'));
define('_ACA_AUTO_NEWS_OPTION', compa::encodeutf(' Smart-Newsletter options'));
define('_ACA_AUTONEWS_FREQ', compa::encodeutf(' Newsletter Frequency'));
define('_ACA_AUTONEWS_FREQ_TIPS', compa::encodeutf('Specify the frequency at which you want to send the smart-newsletter.'));
define('_ACA_AUTONEWS_SECTION', compa::encodeutf('Article Section'));
define('_ACA_AUTONEWS_SECTION_TIPS', compa::encodeutf('Specify the section you want to choose the articles from.'));
define('_ACA_AUTONEWS_CAT', compa::encodeutf('Article Category'));
define('_ACA_AUTONEWS_CAT_TIPS', compa::encodeutf('Specify the category you want to choose the articles from (All for all article in that section).'));
define('_ACA_SELECT_SECTION', compa::encodeutf('All Sections'));
define('_ACA_SELECT_CAT', compa::encodeutf('All Categories'));
define('_ACA_AUTO_DAY_CH8', compa::encodeutf('Quaterly'));
define('_ACA_AUTONEWS_STARTDATE', compa::encodeutf('Start date'));
define('_ACA_AUTONEWS_STARTDATE_TIPS', compa::encodeutf('Specify the date you want to start sending the Smart Newsletter.'));
define('_ACA_AUTONEWS_TYPE', compa::encodeutf('Content rendering'));// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', compa::encodeutf('Full Article: will include the entire article in the newsletter.<br />' .
		'Intro only: will include only the introduction of the article in the newsletter.<br/>' .
		'Title only: will include only the title of the article in the newsletter.'));
define('_ACA_TAGS_AUTONEWS', compa::encodeutf('[SMARTNEWSLETTER] = This will be replaced by the Smart-newsletter.'));

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', compa::encodeutf('Mailing erstellen / ansehen'));
define('_ACA_LICENSE_CONFIG', compa::encodeutf('License'));
define('_ACA_ENTER_LICENSE', compa::encodeutf('Enter license'));
define('_ACA_ENTER_LICENSE_TIPS', compa::encodeutf('Enter your license number and save it.'));
define('_ACA_LICENSE_SETTING', compa::encodeutf('License settings'));
define('_ACA_GOOD_LIC', compa::encodeutf('Your license is valid.'));
define('_ACA_NOTSO_GOOD_LIC', compa::encodeutf('Your license is not valid: '));
define('_ACA_PLEASE_LIC', compa::encodeutf('Please contact jNews support to upgrade your license ( license@ijoobi.com ).'));

define('_ACA_DESC_PLUS', compa::encodeutf('jNews Plus is the first sequencial auto-responders for Joomla CMS.  ' . _ACA_FEATURES));
define('_ACA_DESC_PRO', compa::encodeutf('jNews PRO the ultimate mailing system for Joomla CMS.  ' . _ACA_FEATURES));

//since 1.1.4
define('_ACA_ENTER_TOKEN', compa::encodeutf('Enter token'));
define('_ACA_ENTER_TOKEN_TIPS', compa::encodeutf('Please enter your token number you received by email when you purchased jNews. '));
define('_ACA_JNEWSLETTER_SITE', compa::encodeutf('jNews site:'));
define('_ACA_MY_SITE', compa::encodeutf('My site:'));
define( '_ACA_LICENSE_FORM', compa::encodeutf(' ' .
 		'Click here to go to the license form.</a>'));
define('_ACA_PLEASE_CLEAR_LICENSE', compa::encodeutf('Please clear the license field so it is empty and try again.<br />  If the problem persists, '));
define( '_ACA_LICENSE_SUPPORT', compa::encodeutf('If you still have questions, ' . _ACA_PLEASE_LIC));
define( '_ACA_LICENSE_TWO', compa::encodeutf('you can get your license manual by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT));
define('_ACA_ENTER_TOKEN_PATIENCE', compa::encodeutf('After saving your token a license will be generated automatically. ' .
		' Usually the token is validated in 2 minutes.  However, in some cases it can take up to 15 minutes.<br />' .
		'<br />Check back this control panel in few minutes.  <br /><br />' .
						     'If you didn\'t receive a valid license key in 15 minutes, '. _ACA_LICENSE_TWO));
define( '_ACA_ENTER_NOT_YET', compa::encodeutf('Your token has not yet been validated.'));
define( '_ACA_UPDATE_CLICK_HERE', compa::encodeutf('Pleae visit <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> to download the newest version.'));
define( '_ACA_NOTIF_UPDATE', compa::encodeutf('To be notified of new updates enter your email address and click subscribe '));

define('_ACA_THINK_PLUS', compa::encodeutf('If you want more out of your mailing system think Plus!'));
define('_ACA_THINK_PLUS_1', compa::encodeutf('Sequential auto-responders'));
define('_ACA_THINK_PLUS_2', compa::encodeutf('Schedule the delivery of your newsletter for a predefined date'));
define('_ACA_THINK_PLUS_3', compa::encodeutf('No more server limitation'));
define('_ACA_THINK_PLUS_4', compa::encodeutf('and much more...'));


//since 1.2.2
define( '_ACA_LIST_ACCESS', compa::encodeutf('List Access'));
define( '_ACA_INFO_LIST_ACCESS', compa::encodeutf('Specify what group of users can view and subscribe to this list'));
define( 'ACA_NO_LIST_PERM', compa::encodeutf('You don\'t have enough permission to subscribe to this list'));

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', compa::encodeutf('Archive'));
 define('_ACA_MENU_ARCHIVE_ALL', compa::encodeutf('Archive All'));

//Archive Lists
 define('_FREQ_OPT_0', compa::encodeutf('None'));
 define('_FREQ_OPT_1', compa::encodeutf('Every Week'));
 define('_FREQ_OPT_2', compa::encodeutf('Every 2 Weeks'));
 define('_FREQ_OPT_3', compa::encodeutf('Every Month'));
 define('_FREQ_OPT_4', compa::encodeutf('Every Quarter'));
 define('_FREQ_OPT_5', compa::encodeutf('Every Year'));
 define('_FREQ_OPT_6', compa::encodeutf('Other'));

define('_DATE_OPT_1', compa::encodeutf('Created date'));
define('_DATE_OPT_2', compa::encodeutf('Modified date'));

define('_ACA_ARCHIVE_TITLE', compa::encodeutf('Setting up auto-archive frequency'));
define('_ACA_FREQ_TITLE', compa::encodeutf('Archive frequency'));
define('_ACA_FREQ_TOOL', compa::encodeutf('Define how often you want the Archive Manager to arhive your website content.'));
define('_ACA_NB_DAYS', compa::encodeutf('Number of days'));
define('_ACA_NB_DAYS_TOOL', compa::encodeutf('This is only for the Other option! Please specify the number of days between each Archive.'));
define('_ACA_DATE_TITLE', compa::encodeutf('Date type'));
define('_ACA_DATE_TOOL', compa::encodeutf('Define if the archived should be done on the created date or modified date.'));

define('_ACA_MAINTENANCE_TAB', compa::encodeutf('Maintenance settings'));
define('_ACA_MAINTENANCE_FREQ', compa::encodeutf('Maintenance frequency'));
define( '_ACA_MAINTENANCE_FREQ_TIPS', compa::encodeutf('Specify the frequency at which you want the maintenance routine to run.'));
define( '_ACA_CRON_DAYS', compa::encodeutf('hour(s)'));

define( '_ACA_LIST_NOT_AVAIL', compa::encodeutf('There is no list available.'));
define( '_ACA_LIST_ADD_TAB', compa::encodeutf('Add/Edit'));

define( '_ACA_LIST_ACCESS_EDIT', compa::encodeutf('Mailing Erstellen/Bearbeiten Zugang'));
define( '_ACA_INFO_LIST_ACCESS_EDIT', compa::encodeutf('Lege fest, welche Benutzergruppen ein  Mailing für diese Liste neu erstellen oder bearbeiten dürfen'));
define( '_ACA_MAILING_NEW_FRONT', compa::encodeutf('Neues Mailing erstellen'));

define('_ACA_AUTO_ARCHIVE', compa::encodeutf('Auto-Archive'));
define('_ACA_MENU_ARCHIVE', compa::encodeutf('Auto-Archive'));

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', compa::encodeutf('[ISSUENB] = Das wird duch die Ausgaben-Nummer des Mailings ersetzt.'));
define('_ACA_TAGS_DATE', compa::encodeutf('[DATE] = Das wird durch das Sendedatum ersetzt.'));
define('_ACA_TAGS_CB', compa::encodeutf('[CBTAG:{field_name}] = Das wird durch einen Wert aus der Drittanbieter-Komponente Community Builder ersetzt, z.B. [CBTAG:firstname] '));
define( '_ACA_MAINTENANCE', compa::encodeutf('Joobi Care'));


define('_ACA_THINK_PRO', compa::encodeutf('When you have professional needs, you use professional components!'));
define('_ACA_THINK_PRO_1', compa::encodeutf(' Smart-Newsletters'));
define('_ACA_THINK_PRO_2', compa::encodeutf('Define access level for your list'));
define('_ACA_THINK_PRO_3', compa::encodeutf('Define who can edit/add mailings'));
define('_ACA_THINK_PRO_4', compa::encodeutf('More tags: add your CB fields'));
define('_ACA_THINK_PRO_5', compa::encodeutf('Joomla contents Auto-archive'));
define('_ACA_THINK_PRO_6', compa::encodeutf('Database optimization'));

define('_ACA_LIC_NOT_YET', compa::encodeutf('Your license is not yet valid.  Please check the license Tab in the configuration panel.'));
define('_ACA_PLEASE_LIC_GREEN', compa::encodeutf('Make sure to provide the green information at the top of the tab to our support team.'));

define('_ACA_FOLLOW_LINK', compa::encodeutf('Get Your License'));
define( '_ACA_FOLLOW_LINK_TWO', compa::encodeutf('You can get your license by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '));
define( '_ACA_ENTER_TOKEN_TIPS2', compa::encodeutf(' Then click on Apply button in the top right menu.'));
define( '_ACA_ENTER_LIC_NB', compa::encodeutf('Enter your License'));
define( '_ACA_UPGRADE_LICENSE', compa::encodeutf('Upgrade Your License'));
define( '_ACA_UPGRADE_LICENSE_TIPS', compa::encodeutf('If you received a token to upgrade your license please enter it here, click Apply and proceed to number <b>2</b> to get your new license number.'));

define( '_ACA_MAIL_FORMAT', compa::encodeutf('Encoding format'));
define( '_ACA_MAIL_FORMAT_TIPS', compa::encodeutf('What format do you want to use for encoding your mailings, Text only or MIME'));
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', compa::encodeutf('If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.'));

//since 1.3.1
define('_ACA_SHOW_AUTHOR', compa::encodeutf('Show Author\'s Name'));
define('_ACA_SHOW_AUTHOR_TIPS', compa::encodeutf('Select Yes if you want to add the name of the author when you add an article in the Mailing'));

//since 1.3.5
define('_ACA_REGWARN_NAME', compa::encodeutf('Bitte Ihren Namen eingeben.'));
define('_ACA_REGWARN_MAIL', compa::encodeutf('Bitte Ihre E-Mail Adresse eingeben.'));

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', compa::encodeutf('If you select Yes, the e-mail of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be usefull if you want to execute a special script in your redirect page.'));
define('_ACA_ADDEMAILREDLINK', compa::encodeutf('Add e-mail to the redirect link'));

//since 1.6.3
define('_ACA_ITEMID', compa::encodeutf('ItemId'));
define('_ACA_ITEMID_TIPS', compa::encodeutf('This ItemId will be added to your jNews links.'));

//since 1.6.5
define('_ACA_SHOW_JCALPRO', compa::encodeutf('jCalPRO'));
define('_ACA_SHOW_JCALPRO_TIPS', compa::encodeutf('Show the integration tab for jCalPRO <br/>(only if jCalPRO is installed on your website!)'));
define('_ACA_JCALTAGS_TITLE', compa::encodeutf('jCalPRO Tag:'));
define('_ACA_JCALTAGS_TITLE_TIPS', compa::encodeutf('Copy and paste this tag into the mailing where you want to have the event to be placed.'));
define('_ACA_JCALTAGS_DESC', compa::encodeutf('Description:'));
define('_ACA_JCALTAGS_DESC_TIPS', compa::encodeutf('Select Yes if you want to insert the description of the event'));
define('_ACA_JCALTAGS_START', compa::encodeutf('Start date:'));
define('_ACA_JCALTAGS_START_TIPS', compa::encodeutf('Select Yes if you want to insert the start date of the event'));
define('_ACA_JCALTAGS_READMORE', compa::encodeutf('Read more:'));
define('_ACA_JCALTAGS_READMORE_TIPS', compa::encodeutf('Select Yes if you want to insert a <b>read more link</b> for this event'));
define('_ACA_REDIRECTCONFIRMATION', compa::encodeutf('Redirect URL'));
define('_ACA_REDIRECTCONFIRMATION_TIPS', compa::encodeutf('If you require a confirmation e-mail, the user will be confirmed and redirected to this URL if he clicks on the confirmation link.'));

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