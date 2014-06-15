<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
 * <p>Dutch language file.</p>
 * @author Tromp Wezelman <info@uitgaanopurk.nl>
 * @version $Id: dutch.php 491 2007-02-01 22:56:07Z divivo $
 * @link http://www.ijoobi.com
 * voor fouten die gemaakt zijn in dit taalbestand kan er gemailt worden naar info@uitgaanopurk.nl
 */

### Algemeen ###
 //jnewsletter Beschrijving
define('_ACA_DESC_CORE', compa::encodeutf('jNews is een tool voor een mailinglijst, nieuwsbrieven, automatische-responder, en een makkelijke tool om doeltreffend te communiceren met uw gebruikers en klanten.  ' .
		'jNews, Uw CommunicatiePartner!'));
define('_ACA_DESC_GPL', 'jNews er forsendelseslister, nyhedsbreve, auto-svar funktion, og opfølgningsværktøj til effektiv kommunikation med dine brugere og kunder.  ' .
		'jNews, Din kommunikationspartner!');
define('_ACA_FEATURES', compa::encodeutf('jNews, uw communicatiepartner!'));

// Lijst typen
define('_ACA_NEWSLETTER', compa::encodeutf('Nieuwsbrief'));
define('_ACA_AUTORESP', compa::encodeutf('Auto-responder'));
define('_ACA_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_ECARD', compa::encodeutf('eCard'));
define('_ACA_POSTCARD', compa::encodeutf('Briefkaart'));
define('_ACA_PERF', compa::encodeutf('Prestatie'));
define('_ACA_COUPON', compa::encodeutf('Bon'));
define('_ACA_CRON', compa::encodeutf('Crontaak'));
define('_ACA_MAILING', compa::encodeutf('Mailing'));
define('_ACA_LIST', compa::encodeutf('Lijst'));

 //jnewsletter Menu
define('_ACA_MENU_LIST', compa::encodeutf('Lijstmanagement'));
define('_ACA_MENU_SUBSCRIBERS', compa::encodeutf('Abonnees'));
define('_ACA_MENU_NEWSLETTERS', compa::encodeutf('Nieuwsbrieven'));
define('_ACA_MENU_AUTOS', compa::encodeutf('Auto-responders'));
define('_ACA_MENU_COUPONS', compa::encodeutf('Bonnen'));
define('_ACA_MENU_CRONS', compa::encodeutf('Crontaken'));
define('_ACA_MENU_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_MENU_ECARD', compa::encodeutf('eCards'));
define('_ACA_MENU_POSTCARDS', compa::encodeutf('Briefkaarten'));
define('_ACA_MENU_PERFS', compa::encodeutf('Prestatie'));
define('_ACA_MENU_TAB_LIST', compa::encodeutf('Lijst'));
define('_ACA_MENU_MAILING_TITLE', compa::encodeutf('Mailings'));
define('_ACA_MENU_MAILING', compa::encodeutf('Mailings voor '));
define('_ACA_MENU_STATS', compa::encodeutf('Statistieken'));
define('_ACA_MENU_STATS_FOR', compa::encodeutf('Statistieken voor '));
define('_ACA_MENU_CONF', compa::encodeutf('Configuratie'));
define('_ACA_MENU_UPDATE', compa::encodeutf('Import'));
define('_ACA_MENU_ABOUT', compa::encodeutf('Info'));
define('_ACA_MENU_LEARN', compa::encodeutf('Leercentrum'));
define('_ACA_MENU_MEDIA', compa::encodeutf('Mediamanager'));
define('_ACA_MENU_HELP', compa::encodeutf('Help'));
define('_ACA_MENU_CPANEL', compa::encodeutf('CPanel'));
define('_ACA_MENU_IMPORT', compa::encodeutf('Importeren'));
define('_ACA_MENU_EXPORT', compa::encodeutf('Exporteren'));
define('_ACA_MENU_SUB_ALL', compa::encodeutf('Iedereen Abonneren'));
define('_ACA_MENU_UNSUB_ALL', compa::encodeutf('Niemand Abonneren'));
define('_ACA_MENU_VIEW_ARCHIVE', compa::encodeutf('Archief'));
define('_ACA_MENU_PREVIEW', compa::encodeutf('Voorbeeld'));
define('_ACA_MENU_SEND', compa::encodeutf('Versturen'));
define('_ACA_MENU_SEND_TEST', compa::encodeutf('Verstuur Testemail'));
define('_ACA_MENU_SEND_QUEUE', compa::encodeutf('Wachtrij'));
define('_ACA_MENU_VIEW', compa::encodeutf('Bekijken'));
define('_ACA_MENU_COPY', compa::encodeutf('Kopiëren'));
define('_ACA_MENU_VIEW_STATS', compa::encodeutf('Bekijk statistieken'));
define('_ACA_MENU_CRTL_PANEL', compa::encodeutf(' Configuratiescherm'));
define('_ACA_MENU_LIST_NEW', compa::encodeutf(' Creëer een Lijst'));
define('_ACA_MENU_LIST_EDIT', compa::encodeutf(' Bewerk een Lijst'));
define('_ACA_MENU_BACK', compa::encodeutf('Terug'));
define('_ACA_MENU_INSTALL', compa::encodeutf('Installatie'));
define('_ACA_MENU_TAB_SUM', compa::encodeutf('Samenvatting'));
define('_ACA_STATUS', compa::encodeutf('Status'));

// berichten
define('_ACA_ERROR', compa::encodeutf(' Een fout opgetreden! '));
define('_ACA_SUB_ACCESS', compa::encodeutf('Toegangsrechten'));
define('_ACA_DESC_CREDITS', compa::encodeutf('Credits'));
define('_ACA_DESC_INFO', compa::encodeutf('Informatie'));
define('_ACA_DESC_HOME', compa::encodeutf('Homepagina'));
define('_ACA_DESC_MAILING', compa::encodeutf('Mailinglijst'));
define('_ACA_DESC_SUBSCRIBERS', compa::encodeutf('Abonnees'));
define('_ACA_PUBLISHED', compa::encodeutf('Gepubliceerd'));
define('_ACA_UNPUBLISHED', compa::encodeutf('Niet gepubliceerd'));
define('_ACA_DELETE', compa::encodeutf('Verwijderen'));
define('_ACA_FILTER', compa::encodeutf('Filter'));
define('_ACA_UPDATE', compa::encodeutf('Update'));
define('_ACA_SAVE', compa::encodeutf('Opslaan'));
define('_ACA_CANCEL', compa::encodeutf('Annuleren'));
define('_ACA_NAME', compa::encodeutf('Naam'));
define('_ACA_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_SELECT', compa::encodeutf('Selecteren'));
define('_ACA_ALL', compa::encodeutf('Alle'));
define('_ACA_SEND_A', compa::encodeutf('Verstuur een '));
define('_ACA_SUCCESS_DELETED', compa::encodeutf(' met succes verwijderd'));
define('_ACA_LIST_ADDED', compa::encodeutf('Lijst met succes gecreëerd'));
define('_ACA_LIST_COPY', compa::encodeutf('Lijst met succes gekopieerd'));
define('_ACA_LIST_UPDATED', compa::encodeutf('Lijst met succes bijgewerkt'));
define('_ACA_MAILING_SAVED', compa::encodeutf('Mailing met succes opgeslagen.'));
define('_ACA_UPDATED_SUCCESSFULLY', compa::encodeutf('met succes geupdate.'));

### Abonnee informatie ###
//inschrijf en uitschrijf informatie
define('_ACA_SUB_INFO', compa::encodeutf('Abonnees informatie'));
define('_ACA_VERIFY_INFO', compa::encodeutf('Controleer AUB de link die u toegevoegd heeft, er mist nog enige informatie.'));
define('_ACA_INPUT_NAME', compa::encodeutf('Naam'));
define('_ACA_INPUT_EMAIL', compa::encodeutf('Email'));
define('_ACA_RECEIVE_HTML', compa::encodeutf('Ontvang HTML?'));
define('_ACA_TIME_ZONE', compa::encodeutf('Tijdzone'));
define('_ACA_BLACK_LIST', compa::encodeutf('Zwarte lijst'));
define('_ACA_REGISTRATION_DATE', compa::encodeutf('Datum gebruikersregistratie'));
define('_ACA_USER_ID', compa::encodeutf('Gebruikers id'));
define('_ACA_DESCRIPTION', compa::encodeutf('Beschrijving'));
define('_ACA_ACCOUNT_CONFIRMED', compa::encodeutf('Uw account is geactiveerd.'));
define('_ACA_SUB_SUBSCRIBER', compa::encodeutf('Abonnee'));
define('_ACA_SUB_PUBLISHER', compa::encodeutf('Uitgever'));
define('_ACA_SUB_ADMIN', compa::encodeutf('Administrator'));
define('_ACA_REGISTERED', compa::encodeutf('Geregistreerd'));
define('_ACA_SUBSCRIPTIONS', compa::encodeutf('Inschrijvingen'));
define('_ACA_SEND_UNSUBCRIBE', compa::encodeutf('Verstuur een bericht'));
define('_ACA_SEND_UNSUBCRIBE_TIPS', compa::encodeutf('Klik op Ja om een bevestigingsbericht uitschrijving te versturen.'));
define('_ACA_SUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Bevestig uw inschrijving AUB'));
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Bevestiging uitschrijving'));
define('_ACA_DEFAULT_SUBSCRIBE_MESS', compa::encodeutf('Hallo [NAME],<br />' .
		'Nog een stap en u bent toegevoegd aan de lijst. Klik AUB op de volgende link om uw inschrijving te bevestigen.' .
		'<br /><br />[CONFIRM]<br /><br />Voor vragen neemt u aub contact op met de webmaster.'));
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', compa::encodeutf('Dit is een bevestingsemail dat u bent uitgeschreven van onze lijst. We vinden het jammer dat u beslist heeft om u uit te schrijven. Wanneer u zich weer wilt inschrijven, kunt u dat altijd doen op onze website. Heeft u nog vragen, neemt u aub contact op met de webmaster.'));

// jNews abonnees
define('_ACA_SIGNUP_DATE', compa::encodeutf('Inschrijfdatum'));
define('_ACA_CONFIRMED', compa::encodeutf('Bevestigd'));
define('_ACA_SUBSCRIB', compa::encodeutf('Inschrijven'));
define('_ACA_HTML', compa::encodeutf('HTML mailings'));
define('_ACA_RESULTS', compa::encodeutf('Resultaten'));
define('_ACA_SEL_LIST', compa::encodeutf('Selecteer een lijst'));
define('_ACA_SEL_LIST_TYPE', compa::encodeutf('- Selecteer type lijst -'));
define('_ACA_SUSCRIB_LIST', compa::encodeutf('Lijst van alle abonnees'));
define('_ACA_SUSCRIB_LIST_UNIQUE', compa::encodeutf('abonnees voor : '));
define('_ACA_NO_SUSCRIBERS', compa::encodeutf('Geen abonnees gevonden voor deze lijst.'));
define('_ACA_COMFIRM_SUBSCRIPTION', compa::encodeutf('Een bevestigings-email is naar u toegestuurd. Controleer aub uw email en klik op de toegevoegde link.<br />' .
		'U moet uw email bevestigen voordat uw inschrijving actief is.'));
define('_ACA_SUCCESS_ADD_LIST', compa::encodeutf('U bent met succes toegevoegd aan de lijst.'));


 // Inschrijf informatie
define('_ACA_CONFIRM_LINK', compa::encodeutf('Klik hier om uw inschrijving te bevestigen'));
define('_ACA_UNSUBSCRIBE_LINK', compa::encodeutf('Klik hier om u zelf uit te schrijven van onze lijst'));
define('_ACA_UNSUBSCRIBE_MESS', compa::encodeutf('Uw emailadres is verwijderd uit onze lijst'));
define('_ACA_QUEUE_SENT_SUCCESS', compa::encodeutf('Alle geplande mailings zijn met succes verstuurd.'));
define('_ACA_MALING_VIEW', compa::encodeutf('Bekijk alle mailings'));
define('_ACA_UNSUBSCRIBE_MESSAGE', compa::encodeutf('Weet u het zeker dat u zich wilt uitschrijven van onze lijst?'));
define('_ACA_MOD_SUBSCRIBE', compa::encodeutf('Inschrijven'));
define('_ACA_SUBSCRIBE', compa::encodeutf('Inschrijven'));
define('_ACA_UNSUBSCRIBE', compa::encodeutf('Uitschrijven'));
define('_ACA_VIEW_ARCHIVE', compa::encodeutf('Bekijk archief'));
define('_ACA_SUBSCRIPTION_OR', compa::encodeutf(' of klik hier om uw informatie bij te werken'));
define('_ACA_EMAIL_ALREADY_REGISTERED', compa::encodeutf('Dit emailadres is al geregistreerd.'));
define('_ACA_SUBSCRIBER_DELETED', compa::encodeutf('Abonnee met succes verwijderd.'));


### Gebruikers scherm ###
 //Gebruikers Menu
define('_UCP_USER_PANEL', compa::encodeutf('Gebruikers configuratiescherm'));
define('_UCP_USER_MENU', compa::encodeutf('Gebruikers Menu'));
define('_UCP_USER_CONTACT', compa::encodeutf('Mijn inschrijvingen'));
 //jNews Cron Menu
define('_UCP_CRON_MENU', compa::encodeutf('Crontaak Management'));
define('_UCP_CRON_NEW_MENU', compa::encodeutf('Nieuwe Cron'));
define('_UCP_CRON_LIST_MENU', compa::encodeutf('Mijn Cronlijst'));
 //jNews Bon Menu
define('_UCP_COUPON_MENU', compa::encodeutf('Bonmanagement'));
define('_UCP_COUPON_LIST_MENU', compa::encodeutf('Bonnenlijst'));
define('_UCP_COUPON_ADD_MENU', compa::encodeutf('Bon toevoegen'));

### lijsts ###
// Tabs
define('_ACA_LIST_T_GENERAL', compa::encodeutf('Beschrijving'));
define('_ACA_LIST_T_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_LIST_T_SUBSCRIPTION', compa::encodeutf('Inschrijving'));
define('_ACA_LIST_T_SENDER', compa::encodeutf('Zender informatie'));
define('_ACA_LIST_TYPE', compa::encodeutf('Lijsttype'));
define('_ACA_LIST_NAME', compa::encodeutf('Namen lijst'));
define('_ACA_LIST_ISSUE', compa::encodeutf('Mail nr #'));
define('_ACA_LIST_DATE', compa::encodeutf('Verzenddatum'));
define('_ACA_LIST_SUB', compa::encodeutf('Mailingonderwerp'));
define('_ACA_ATTACHED_FILES', compa::encodeutf('bijlagen'));
define('_ACA_SELECT_LIST', compa::encodeutf('Selecteer aub een lijst om te bewerken!'));

// Auto Responder box
define('_ACA_AUTORESP_ON', compa::encodeutf('Lijsttype'));
define('_ACA_AUTO_RESP_OPTION', compa::encodeutf('Auto-responder opties'));
define('_ACA_AUTO_RESP_FREQ', compa::encodeutf('Abonnees kunnen frequentie kiezen'));
define('_ACA_AUTO_DELAY', compa::encodeutf('Vertraging (in dagen)'));
define('_ACA_AUTO_DAY_MIN', compa::encodeutf('Minimale frequentie'));
define('_ACA_AUTO_DAY_MAX', compa::encodeutf('Maximumale frequentie'));
define('_ACA_FOLLOW_UP', compa::encodeutf('Specificeren van een auto-responder'));
define('_ACA_AUTO_RESP_TIME', compa::encodeutf('Abonnees kunnen tijd kiezen'));
define('_ACA_LIST_SENDER', compa::encodeutf('Verzendlijst'));
define('_ACA_LIST_DESC', compa::encodeutf('Lijst omschrijving'));
define('_ACA_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_SENDER_NAME', compa::encodeutf('Naam verzender'));
define('_ACA_SENDER_EMAIL', compa::encodeutf('Email verzender'));
define('_ACA_SENDER_BOUNCE', compa::encodeutf('Verzender bounce adres'));
define('_ACA_LIST_DELAY', compa::encodeutf('Vertraging'));
define('_ACA_HTML_MAILING', compa::encodeutf('HTML mailing?'));
define('_ACA_HTML_MAILING_DESC', compa::encodeutf('(Als u dit wijzigt, moet u het opslaan en terugkeren naar dit scherm om de opgeslagen wijzigingen te zien.)'));
define('_ACA_HIDE_FROM_FRONTEND', compa::encodeutf('Verberg voor de voorpagina?'));
define('_ACA_SELECT_IMPORT_FILE', compa::encodeutf('Selecteer een bestand om te importeren'));;
define('_ACA_IMPORT_FINISHED', compa::encodeutf('Importeren voltooid'));
define('_ACA_DELETION_OFFILE', compa::encodeutf('Bestand verwijderen'));
define('_ACA_MANUALLY_DELETE', compa::encodeutf('Mislukt, u zult handmatig het bestand moeten verwijderen'));
define('_ACA_CANNOT_WRITE_DIR', compa::encodeutf('Map niet beschrijfbaar'));
define('_ACA_NOT_PUBLISHED', compa::encodeutf('Kan de mailing niet verzenden, de lijst in niet gepubliceerd.'));

//  Lijst informatie box
define('_ACA_INFO_LIST_PUB', compa::encodeutf('Klik op Ja om de lijst te publiceren'));
define('_ACA_INFO_LIST_NAME', compa::encodeutf('Vul de naam van uw lijst hier in. U kan de lijst herkennen aan deze naam.'));
define('_ACA_INFO_LIST_DESC', compa::encodeutf('Vul een korte omschrijving van uw lijst hier in. Deze omschrijving is zichtbaar voor de bezoekers van uw site.'));
define('_ACA_INFO_LIST_SENDER_NAME', compa::encodeutf('Vul de naam van de verzender van de mailing in. Deze naam is zichtbaar wanneer de abonnees het bericht ontvangen van deze lijst.'));
define('_ACA_INFO_LIST_SENDER_EMAIL', compa::encodeutf('Vul het emailadres in waar vandaan het bericht word verstuurd.'));
define('_ACA_INFO_LIST_SENDER_BOUNCED', compa::encodeutf('Vul het emailadres in waar gebruikers antwoord naar toe kunnen sturen. We raden u aan het zelfde email adres te gebruiken als het verzendadres, sinds spam filters uw bericht een hogere spamniveau geven als de emailadressen veschillend zijn.'));
define('_ACA_INFO_LIST_AUTORESP', compa::encodeutf('Kies het type mailing voor deze lijst. <br />' .
		'Nieuwsbrief: normale nieuwsbrief<br />' .
		'Auto-responder: een auto-responder is een lijst die automatisch word verstuurd door de website op verschillende tijden.'));
define('_ACA_INFO_LIST_FREQUENCY', compa::encodeutf('Inschakelen dat gebruikers kunnen kiezen hoe vaak ze een lijst ontvangen. Het geeft meer flexibiliteit aan de gebruiker.'));
define('_ACA_INFO_LIST_TIME', compa::encodeutf('Laat de gebruiker een bepaalde tijd van een dag kiezen wanneer zij de lijst willen ontvangen.'));
define('_ACA_INFO_LIST_MIN_DAY', compa::encodeutf('Bepaal wat de minimale frequentie is dat een gebruiker kan kiezen om een lijst te ontvangen.'));
define('_ACA_INFO_LIST_DELAY', compa::encodeutf('Specificeer de vertraging tussen deze auto-responder en de vorige.'));
define('_ACA_INFO_LIST_DATE', compa::encodeutf('Specificeer de datum om de nieuwslijst te publiceren als u de publicering wilt vertragen. <br /> FORMAAT : YYYY-MM-DD HH:MM:SS'));
define('_ACA_INFO_LIST_MAX_DAY', compa::encodeutf('Bepaal wat de maximale frequentie is dat een gebruiker kan kiezen om de lijst te ontvangen'));
define('_ACA_INFO_LIST_LAYOUT', compa::encodeutf('Voer de layout van uw mailinglijst hier in. U kunt elk layout hier invoegen voor uw mailing.'));
define('_ACA_INFO_LIST_SUB_MESS', compa::encodeutf('Dit bericht zal worden verstuurd naar de abonnee wanneer hij of zij zich voor het eerst registreert. U kan hier elke tekst invullen die nodig is.'));
define('_ACA_INFO_LIST_UNSUB_MESS', compa::encodeutf('Dit bericht word verstuurd naar de abonnee wanneer hij of zij zich uitschrijft. Elk willekeurig bericht kan hier worden ingevuld.'));
define('_ACA_INFO_LIST_HTML', compa::encodeutf('Selecteer de keuzebox als u een HTML mailing wil versturen. Abonnees kunnen instellen of ze een HTML-bericht willen ontvangen, of een tekstbericht alleen wanneer er wordt ingeschreven voor een HTML-lijst.'));
define('_ACA_INFO_LIST_HIDDEN', compa::encodeutf('Klik Ja om de lijst te verbergen voor de voorpagina, gebruikers kunnen zich niet inschrijven, maar je kunt de mailings nog wel versturen.'));
define('_ACA_INFO_LIST_ACA_AUTO_SUB', compa::encodeutf('Wilt u automatisch gebruikers toevoegen tot deze lijst?<br /><B>Nieuwe Gebruiker:</B> voegt elke gebruiker toe die zich registreert op de website.<br /><B>Alle gebruikers:</B> Voegt alle geregistreerde gebruikers van de database toe.<br />(Al deze opties ondersteunen Community Builder)'));
define('_ACA_INFO_LIST_ACC_LEVEL', compa::encodeutf('Selecteer het voorpagina toegangsniveau. Dit wil de mailing weergeven of verbergen voor gebruikersgroepen die er geen toegang tot hebben, zodat ze niet de mogelijkheid hebben om zich in te schrijven.'));
define('_ACA_INFO_LIST_ACC_USER_ID', compa::encodeutf('Selecteer het toegangsniveau van de gebruikersgroep die mogen bewerken. Die gebruikersgroep en alles daarboven heeft de rechten om mailing te bewerken en te versturen, zelfs van de frontend of backend.'));
define('_ACA_INFO_LIST_FOLLOW_UP', compa::encodeutf('Als u wilt dat de auto-responder begint met een volgende wanneer het de laatste bericht heeft bereikt, kunt u hier de volgende auto-responder instellen.'));
define('_ACA_INFO_LIST_ACA_OWNER', compa::encodeutf('Dit is de ID van de persoon die deze lijst heeft gecreëerd.'));
define('_ACA_INFO_LIST_WARNING', compa::encodeutf('Deze laatste optie is alleen beschikbaar tijdens het creëeren van de lijst.'));
define('_ACA_INFO_LIST_SUBJET', compa::encodeutf('Onderwerp van de mailing.  Dit is het onderwerp van de email die de abonnee zal ontvangen.'));
define('_ACA_INFO_MAILING_CONTENT', compa::encodeutf('Dit is de inhoud van de email die u wilt versturen.'));
define('_ACA_INFO_MAILING_NOHTML', compa::encodeutf('Voer hier de inhoud in van de email die u wilt versturen naar abonnees die gekozen hebben om alleen niet HTML mailings te ontvangen. <BR/> NOTITIE: als u het leeg laat, zal jNews automatisch de HTML tekst converteren naar alleen tekst.'));
define('_ACA_INFO_MAILING_VISIBLE', compa::encodeutf('Klik op Ja om de mailings weer te geven in de frontend.'));
define('_ACA_INSERT_CONTENT', compa::encodeutf('Voeg bestaande content toe'));

// Bonnen
define('_ACA_SEND_COUPON_SUCCESS', compa::encodeutf('Bon met succes verzonden!'));
define('_ACA_CHOOSE_COUPON', compa::encodeutf('Kies een bon'));
define('_ACA_TO_USER', compa::encodeutf(' naar deze gebruiker'));

### Cron opties
//drop down frequentie(CRON)
define('_ACA_FREQ_CH1', compa::encodeutf('Elk uur'));
define('_ACA_FREQ_CH2', compa::encodeutf('Elke 6 uur'));
define('_ACA_FREQ_CH3', compa::encodeutf('Elke 12 uur'));
define('_ACA_FREQ_CH4', compa::encodeutf('Dagelijks'));
define('_ACA_FREQ_CH5', compa::encodeutf('Wekelijks'));
define('_ACA_FREQ_CH6', compa::encodeutf('Maandelijks'));
define('_ACA_FREQ_NONE', compa::encodeutf('Nee'));
define('_ACA_FREQ_NEW', compa::encodeutf('Nieuwe Gebruikers'));
define('_ACA_FREQ_ALL', compa::encodeutf('Alle Gebruikers'));

//Label CRON formulier
define('_ACA_LABEL_FREQ', compa::encodeutf('jNews Cron?'));
define('_ACA_LABEL_FREQ_TIPS', compa::encodeutf('Klik op Ja als u dit wilt gebruiken voor een jNews Cron en klik Nee voor elke andere Cron taak.<br />' .
		'Als u op Ja klikt, dan hoeft u geen specifiek Cron-adres op te geven, het wordt automatisch toegevoegd.'));
define('_ACA_SITE_URL', compa::encodeutf('Uw website URL'));
define('_ACA_CRON_FREQUENCY', compa::encodeutf('Cronfrequentie'));
define('_ACA_STARTDATE_FREQ', compa::encodeutf('Startdatum'));
define('_ACA_LABELDATE_FREQ', compa::encodeutf('Datum opgeven'));
define('_ACA_LABELTIME_FREQ', compa::encodeutf('Tijd opgeven'));
define('_ACA_CRON_URL', compa::encodeutf('Cron URL'));
define('_ACA_CRON_FREQ', compa::encodeutf('Frequentie'));
define('_ACA_TITLE_CRONLIST', compa::encodeutf('Cronlijst'));
define('_NEW_LIST', compa::encodeutf('Creëer een nieuwe lijst'));

//titel CRON formulier
define('_ACA_TITLE_FREQ', compa::encodeutf('Bewerk Cron'));
define('_ACA_CRON_SITE_URL', compa::encodeutf('Voer AUB een geldige website url in die begint met http://'));

### Mailings ###
define('_ACA_MAILING_ALL', compa::encodeutf('Alle mailings'));
define('_ACA_EDIT_A', compa::encodeutf('Bewerk een '));
define('_ACA_SELCT_MAILING', compa::encodeutf('Selecteer aub een lijst in het drop down menu om een nieuwe mailing toe te voegen.'));
define('_ACA_VISIBLE_FRONT', compa::encodeutf('Zichtbaar op de voorpagina'));

// email
define('_ACA_SUBJECT', compa::encodeutf('Onderwerp'));
define('_ACA_CONTENT', compa::encodeutf('Inhoud'));
define('_ACA_NAMEREP', compa::encodeutf('[NAME] = Dit zal vervangen worden door de naam die de abonnee heeft ingevoerd, er wordt een gepersonaliseerde email verstuurd wanneer dit wordt gebruikt.<br />'));
define('_ACA_FIRST_NAME_REP', compa::encodeutf('[FIRSTNAME] = Dit zal vervangen worden door de voornaam die de abonnee heeft ingevuld.<br />'));
define('_ACA_NONHTML', compa::encodeutf('Niet-html versie'));
define('_ACA_ATTACHMENTS', compa::encodeutf('Bijlagen'));
define('_ACA_SELECT_MULTIPLE', compa::encodeutf('Houdt control (of command) toets vast om meerdere bijlagen te selecteren.<br />' .
		'De bestanden die weergegeven worden in deze bijlagenlijst zijn opgeslagen in de bijlagenmap, u kan deze locatie wijzigen in het configuratiescherm.'));
define('_ACA_CONTENT_ITEM', compa::encodeutf('Contentitem'));
define('_ACA_SENDING_EMAIL', compa::encodeutf('Email versturen'));
define('_ACA_MESSAGE_NOT', compa::encodeutf('Bericht kon niet worden verstuurd'));
define('_ACA_MAILER_ERROR', compa::encodeutf('Email error'));
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', compa::encodeutf('Bericht met succes verstuurd.'));
define('_ACA_SENDING_TOOK', compa::encodeutf('Versturen van deze mailing duurt'));
define('_ACA_SECONDS', compa::encodeutf('seconden'));
define('_ACA_NO_ADDRESS_ENTERED', compa::encodeutf('Geen adres ingevoerd'));
define('_ACA_CHANGE_SUBSCRIPTIONS', compa::encodeutf('Wijzig'));
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', compa::encodeutf('Wijzig uw inschrijving'));
define('_ACA_WHICH_EMAIL_TEST', compa::encodeutf('Geef het emailadres op om een testmail toe te sturen of selecteer voorbeeld'));
define('_ACA_SEND_IN_HTML', compa::encodeutf('Verstuur in HTML (voor html mailings)?'));
define('_ACA_VISIBLE', compa::encodeutf('Zichtbaar'));
define('_ACA_INTRO_ONLY', compa::encodeutf('Alleen intro'));

// statistieken
define('_ACA_GLOBALSTATS', compa::encodeutf('Globale statistieken'));
define('_ACA_DETAILED_STATS', compa::encodeutf('Gedetailleerde statistieken'));
define('_ACA_MAILING_LIST_DETAILS', compa::encodeutf('Lijstdetails'));
define('_ACA_SEND_IN_HTML_FORMAT', compa::encodeutf('Verstuur in HTML formaat'));
define('_ACA_VIEWS_FROM_HTML', compa::encodeutf('Bekeken (van html mails)'));
define('_ACA_SEND_IN_TEXT_FORMAT', compa::encodeutf('Verstuur in tekst formaat'));
define('_ACA_HTML_READ', compa::encodeutf('HTML gelezen'));
define('_ACA_HTML_UNREAD', compa::encodeutf('HTML ongelezen'));
define('_ACA_TEXT_ONLY_SENT', compa::encodeutf('Alleen tekst'));

// Configuratie scherm
// Hoofd tabs
define('_ACA_MAIL_CONFIG', compa::encodeutf('Mail'));
define('_ACA_LOGGING_CONFIG', compa::encodeutf('Logs & Stats'));
define('_ACA_SUBSCRIBER_CONFIG', compa::encodeutf('Abonnees'));
define('_ACA_AUTO_CONFIG', compa::encodeutf('Cron'));
define('_ACA_MISC_CONFIG', compa::encodeutf('Overige'));
define('_ACA_MAIL_SETTINGS', compa::encodeutf('Mail Instellingen'));
define('_ACA_MAILINGS_SETTINGS', compa::encodeutf('Instellingen mailings'));
define('_ACA_SUBCRIBERS_SETTINGS', compa::encodeutf('Abonnees-instellingen'));
define('_ACA_CRON_SETTINGS', compa::encodeutf('Croninstellingen'));
define('_ACA_SENDING_SETTINGS', compa::encodeutf('Versturen instellingen'));
define('_ACA_STATS_SETTINGS', compa::encodeutf('Statistieken-instellingen'));
define('_ACA_LOGS_SETTINGS', compa::encodeutf('Logs instellingen'));
define('_ACA_MISC_SETTINGS', compa::encodeutf('Overige instellingen'));
// mail instellingen
define('_ACA_SEND_MAIL_FROM', compa::encodeutf('Bounce Back Address<br/>(used as Bounced back for all your messages)'));
define('_ACA_SEND_MAIL_NAME', compa::encodeutf('Van Naam'));
define('_ACA_MAILSENDMETHOD', compa::encodeutf('Mail methode'));
define('_ACA_SENDMAILPATH', compa::encodeutf('Uitgaand Mail-pad'));
define('_ACA_SMTPHOST', compa::encodeutf('SMTP host'));
define('_ACA_SMTPAUTHREQUIRED', compa::encodeutf('SMTP wachtwoordverificatie vereist'));
define('_ACA_SMTPAUTHREQUIRED_TIPS', compa::encodeutf('Selecteer ja als uw SMTP server wachtwoordverificatie vereist'));
define('_ACA_SMTPUSERNAME', compa::encodeutf('SMTP gebruikersnaam'));
define('_ACA_SMTPUSERNAME_TIPS', compa::encodeutf('Voer de SMTP gebruikersnaam in wanneer uw SMPT server wachtwoordverificatie vereist'));
define('_ACA_SMTPPASSWORD', compa::encodeutf('SMTP wachtwoord'));
define('_ACA_SMTPPASSWORD_TIPS', compa::encodeutf('Voer de SMTP wachtwoord in wanneer uw SMTP server wachtwoordverificatie vereist'));
define('_ACA_USE_EMBEDDED', compa::encodeutf('Gebruik vastgezette plaatjes'));
define('_ACA_USE_EMBEDDED_TIPS', compa::encodeutf('Selecteer ja als de plaatjes in de toegevoegd content items vastgezet dienen te worden voor html berichten, of nee om de link te gebruiken van de standaard plaatjes van deze site.'));
define('_ACA_UPLOAD_PATH', compa::encodeutf('Upload directory- /bijlagenpad'));
define('_ACA_UPLOAD_PATH_TIPS', compa::encodeutf('U kan een upload directory specificeren.<br />' .
		'U moet zeker weten dat deze directory bestaat, anders creëer deze.'));

// Abonnee instellingen
define('_ACA_ALLOW_UNREG', compa::encodeutf('Sta niet geregistreerde gebruikers toe'));
define('_ACA_ALLOW_UNREG_TIPS', compa::encodeutf('Selecteer Ja als u wilt toestaan dat gebruikers zich kunnen inschrijven zonder lid te worden van de website.'));
define('_ACA_REQ_CONFIRM', compa::encodeutf('Bevestiging vereist'));
define('_ACA_REQ_CONFIRM_TIPS', compa::encodeutf('Selecteer ja als u niet geregistreerde gebruikers hun emailadres wilt laten bevestigen.'));
define('_ACA_SUB_SETTINGS', compa::encodeutf('Abonnee Instellingen'));
define('_ACA_SUBMESSAGE', compa::encodeutf('Email abonnee'));
define('_ACA_SUBSCRIBE_LIST', compa::encodeutf('Inschrijven bij een lijst'));

define('_ACA_USABLE_TAGS', compa::encodeutf('Te gebruiken tags'));
define('_ACA_NAME_AND_CONFIRM', compa::encodeutf('<b>[CONFIRM]</b> = Dit creëert een klikbare link waar de abonnee zijn inschrijving kan bevestigen. Dit is <strong>vereist</strong> om jNews goed te laten werken.<br />'
.'<br />[NAME] = Dit zal vervangen worden door de naam die de abonnee heeft ingevoerd. Er wordt een persoonlijke email verzonden als dit wordt gebruikt.<br />'
.'<br />[FIRSTNAME] = Dit zal vervangen worden door de voornaam van de abonnee. Voornaam is gedefinieerd als de eerste naam die de abonnee heeft ingevoerd.<br />'));
define('_ACA_CONFIRMFROMNAME', compa::encodeutf('Naam bevestigen'));
define('_ACA_CONFIRMFROMNAME_TIPS', compa::encodeutf('Voer de \'van\' naam in om om weer te geven in bevestigingslijsten.'));
define('_ACA_CONFIRMFROMEMAIL', compa::encodeutf('Email bevestigen'));
define('_ACA_CONFIRMFROMEMAIL_TIPS', compa::encodeutf('Voer het emailadres in om weer te geven op bevestingslijsten.'));
define('_ACA_CONFIRMBOUNCE', compa::encodeutf('Bevestig bounceadres'));
define('_ACA_CONFIRMBOUNCE_TIPS', compa::encodeutf('Voer het bounceadres in om weer te geven op bevestigingslijsten.'));
define('_ACA_HTML_CONFIRM', compa::encodeutf('HTML bevestigen'));
define('_ACA_HTML_CONFIRM_TIPS', compa::encodeutf('Selecteer ja als bevestingslijsten in html moet zijn als de gebruiker html heeft toegestaan.'));
define('_ACA_TIME_ZONE_ASK', compa::encodeutf('Vraag tijdzone'));
define('_ACA_TIME_ZONE_TIPS', compa::encodeutf('Selecteer ja als u de tijdzone van de gebruikers wilt vragen. De mailings die in de wachtrij staan zullen verzonden worden volgens de tijdzone'));

 // Cron configureren
define('_ACA_TIME_OFFSET_URL', compa::encodeutf('klik hier om de offset te wijzigen in het configuratiescherm -> Locale tab'));
define('_ACA_TIME_OFFSET_TIPS', compa::encodeutf('Stel uw server offset tijd in zodat opgeslagen datum en tijd gelijk zijn'));
define('_ACA_TIME_OFFSET', compa::encodeutf('Tijd offset'));
define('_ACA_CRON_TITLE', compa::encodeutf('Opzetten cronfunctie'));
define('_ACA_CRON_DESC', compa::encodeutf('<br />Door de cronfunctie te gebruiken kan u een automatische taak instellen voor uw Joomla website!<br />' .
		'Om dit in te stellen moet u een in uw Control Panel -> contrab het volgende commando:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Als u hulp nodig heeft om in te stellen of u heeft problemen, raadpleeg dan aub ons forum <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>'));

// Instellingen verzenden
define('_ACA_PAUSEX', compa::encodeutf('Pauze x seconden na elke geconfigureerde hoeveelheid emails'));
define('_ACA_PAUSEX_TIPS', compa::encodeutf('Voer het aantal seconden in. jNews zal de SMTP server de tijd geven om de berichten te versturen voordat de volgende geconfigureerde hoeveelheid berichten wordt verzonden.'));
define('_ACA_EMAIL_BET_PAUSE', compa::encodeutf('Pauzes tussen de emails'));
define('_ACA_EMAIL_BET_PAUSE_TIPS', compa::encodeutf('Het aantal verzonden emails voordat er wordt gepauzeerd.'));
define('_ACA_WAIT_USER_PAUSE', compa::encodeutf('Wachten voor gebruikersinput tijdens pauze'));
define('_ACA_WAIT_USER_PAUSE_TIPS', compa::encodeutf('of het script moet wachten voor gebruikersinput tijdens pauze tussen een reeks van mailings.'));
define('_ACA_SCRIPT_TIMEOUT', compa::encodeutf('Script timeout'));
define('_ACA_SCRIPT_TIMEOUT_TIPS', compa::encodeutf('Aantal minuten dat het script zou moeten werken.'));

// Instellingen statistieken
define('_ACA_ENABLE_READ_STATS', compa::encodeutf('Inschakelen lees statistieken'));
define('_ACA_ENABLE_READ_STATS_TIPS', compa::encodeutf('Selecteer ja als u het aantal views wilt loggen. Deze techniek kan alleen worden gebruikt voor html mailings'));
define('_ACA_LOG_VIEWSPERSUB', compa::encodeutf('Log views per abonnee'));
define('_ACA_LOG_VIEWSPERSUB_TIPS', compa::encodeutf('Selecteer ja als u het aantal views per abonnee wilt loggen. Deze techniek kan alleen worden gebruikt voor html mailings'));

// Logs instellingen
define('_ACA_DETAILED', compa::encodeutf('Gedetailleerde logs'));
define('_ACA_SIMPLE', compa::encodeutf('Eenvoudige logs'));
define('_ACA_DIAPLAY_LOG', compa::encodeutf('Logs weergeven'));
define('_ACA_DISPLAY_LOG_TIPS', compa::encodeutf('Selecteer ja als u de logs wilt weergeven tijdens het verzenden van de mailings.'));
define('_ACA_SEND_PERF_DATA', compa::encodeutf('Verzend performance'));
define('_ACA_SEND_PERF_DATA_TIPS', compa::encodeutf('Selecteer ja als u jNews wilt toestaan om onbekende raporten te versturen over uw configuratie. Het aantal abonnees van een lijst en de tijd die nodig is om een mailing te versturen. Dit geeft ons een idee over de jNews performance en zal ons helpen om jNews te verbeteren in toekomstige ontwikkelingen.'));
define('_ACA_SEND_AUTO_LOG', compa::encodeutf('Verzend log voor auto-responder'));
define('_ACA_SEND_AUTO_LOG_TIPS', compa::encodeutf('Selecteer ja als u elke keer een email log wilt versturen als de wachtrij voltooid is.  WAARSCHUWMING: dit kan leiden tot een grote hoeveelheid emails.'));
define('_ACA_SEND_LOG', compa::encodeutf('Verzend log'));
define('_ACA_SEND_LOG_TIPS', compa::encodeutf('Of een log van de mailing gemaild moet worden naar het email adres van de gebruiker die de mailing heeft verzonden.'));
define('_ACA_SEND_LOGDETAIL', compa::encodeutf('Verzend log detail'));
define('_ACA_SEND_LOGDETAIL_TIPS', compa::encodeutf('Details verzorgt het succes van error informatie voor iedere abonnee en een overzicht van de informatie. Details verzendt eenvoudig het overzicht.'));
define('_ACA_SEND_LOGCLOSED', compa::encodeutf('Verzendt log als verbinding is afgesloten'));
define('_ACA_SEND_LOGCLOSED_TIPS', compa::encodeutf('Met deze instelling van de gebruiker die de mailing verstuurd, krijgt de gebruiker toch nog een rapport via de email.'));
define('_ACA_SAVE_LOG', compa::encodeutf('Log opslaan'));
define('_ACA_SAVE_LOG_TIPS', compa::encodeutf('Of de log van de mailing toegevoegd moet worden aan het logbestand.'));
define('_ACA_SAVE_LOGDETAIL', compa::encodeutf('Logdetail opslaan'));
define('_ACA_SAVE_LOGDETAIL_TIPS', compa::encodeutf('Details verzorgt het succes van error informatie voor iedere abonnee en een overzicht van de informatie. Het verzendt eenvoudig het overzicht.'));
define('_ACA_SAVE_LOGFILE', compa::encodeutf('Logbestand opslaan'));
define('_ACA_SAVE_LOGFILE_TIPS', compa::encodeutf('Bestand waar log informatie aan wordt toegevoegd. Het bestand kan heel groot worden.'));
define('_ACA_CLEAR_LOG', compa::encodeutf('Logbestand leegmaken'));
define('_ACA_CLEAR_LOG_TIPS', compa::encodeutf('Maakt het logbestand leeg.'));

### Configuratiescherm
define('_ACA_CP_LAST_QUEUE', compa::encodeutf('Leest uitgevoerde wachtrij'));
define('_ACA_CP_TOTAL', compa::encodeutf('Totaal'));
define('_ACA_MAILING_COPY', compa::encodeutf('Mailing met succes gekopieerd!'));

// Overige instellingen
define('_ACA_SHOW_GUIDE', compa::encodeutf('Handleiding weergeven'));
define('_ACA_SHOW_GUIDE_TIPS', compa::encodeutf('Geef tijdens het starten de handleiding weer om nieuwe gebruikers te helpen om een nieuwsbrief, een auto-responder te creëeren en om jNews goed in te stellen.'));
define('_ACA_AUTOS_ON', compa::encodeutf('Gebruik Auto-responders'));
define('_ACA_AUTOS_ON_TIPS', compa::encodeutf('Selecteer Nee als u geen Auto-responders wilt gebruiken, alle auto-responders instellingen worden gedeactiveerd.'));
define('_ACA_NEWS_ON', compa::encodeutf('Gebruik Nieuwsbrieven'));
define('_ACA_NEWS_ON_TIPS', compa::encodeutf('Selecteer Nee als u geen gebruik wilt maken van Nieuwsbrieven, Alle nieuwsbrief-opties zullen worden gedeactiveerd.'));
define('_ACA_SHOW_TIPS', compa::encodeutf('Tips weergeven'));
define('_ACA_SHOW_TIPS_TIPS', compa::encodeutf('Geeft tips weer om gebruikers te helpen om jNews efficiënter te gebruiken.'));
define('_ACA_SHOW_FOOTER', compa::encodeutf('Geeft voetnoot weer'));
define('_ACA_SHOW_FOOTER_TIPS', compa::encodeutf('Of de voetnoot copyright notitie moet worden weergegeven.'));
define('_ACA_SHOW_LISTS', compa::encodeutf('Geeft lijst weer op de frontend'));
define('_ACA_SHOW_LISTS_TIPS', compa::encodeutf('Wanneer een gebruiker niet geregistreerd is, geeft een overzicht weer van de lijsten waar zij zich op kunnen inschrijven met een archief knop voor nieuwsbrieven of een eenvoudig inlogformulier zodat zij zich kunnen registreren.'));
define('_ACA_CONFIG_UPDATED', compa::encodeutf('De configuratie details zijn bijgewerkt!'));
define('_ACA_UPDATE_URL', compa::encodeutf('Update URL'));
define('_ACA_UPDATE_URL_WARNING', compa::encodeutf('WAARSCHUWING! Wijzig deze URL niet voordat dit gevraagd is door het jNews technisch team.<br />'));
define('_ACA_UPDATE_URL_TIPS', compa::encodeutf('Voorbeeld: http://www.ijoobi.com/update/ (schuine streep is belangrijk)'));

// module
define('_ACA_EMAIL_INVALID', compa::encodeutf('De ingevoerde email is ongeldig.'));
define('_ACA_REGISTER_REQUIRED', compa::encodeutf('Registreert u zichaub eerst op de site voordat u zich kan inschrijven voor de lijst.'));

// Toegangsniveau box
define('_ACA_OWNER', compa::encodeutf('Maker van de lijst:'));
define('_ACA_ACCESS_LEVEL', compa::encodeutf('Stel toegangsniveau in voor de lijst'));
define('_ACA_ACCESS_LEVEL_OPTION', compa::encodeutf('Toegansniveau Instellingen'));
define('_ACA_USER_LEVEL_EDIT', compa::encodeutf('Selecteer welk gebruikersniveau is toegestaan om een mailing te bewerken. (in de frontend of backend) '));

//  drop down opties
define('_ACA_AUTO_DAY_CH1', compa::encodeutf('Dagelijks'));
define('_ACA_AUTO_DAY_CH2', compa::encodeutf('Dagelijks, geen weekend'));
define('_ACA_AUTO_DAY_CH3', compa::encodeutf('Om de dag'));
define('_ACA_AUTO_DAY_CH4', compa::encodeutf('Om de dag, geen weekend'));
define('_ACA_AUTO_DAY_CH5', compa::encodeutf('Wekelijks'));
define('_ACA_AUTO_DAY_CH6', compa::encodeutf('Om de week'));
define('_ACA_AUTO_DAY_CH7', compa::encodeutf('Maandelijks'));
define('_ACA_AUTO_DAY_CH9', compa::encodeutf('Jaarlijks'));
define('_ACA_AUTO_OPTION_NONE', compa::encodeutf('Nee'));
define('_ACA_AUTO_OPTION_NEW', compa::encodeutf('Nieuwe Gebruikers'));
define('_ACA_AUTO_OPTION_ALL', compa::encodeutf('Alle Gebruikers'));

//
define('_ACA_UNSUB_MESSAGE', compa::encodeutf('Uitschrijvings email'));
define('_ACA_UNSUB_SETTINGS', compa::encodeutf('Uitschrijvings instellingen'));
define('_ACA_AUTO_ADD_NEW_USERS', compa::encodeutf('Automatisch inschrijven gebruiker?'));

// Update and upgrade berichten
define('_ACA_NO_UPDATES', compa::encodeutf('Er zijn momenteel geen updates beschikbaar.'));
define('_ACA_VERSION', compa::encodeutf('jNews Versie'));
define('_ACA_NEED_UPDATED', compa::encodeutf('Bestanden die bijgewerkt moeten worden:'));
define('_ACA_NEED_ADDED', compa::encodeutf('Bestanden die toegevoegd moeten worden:'));
define('_ACA_NEED_REMOVED', compa::encodeutf('Bestanden die verwijderd moeten worden:'));
define('_ACA_FILENAME', compa::encodeutf('Bestandsnaam:'));
define('_ACA_CURRENT_VERSION', compa::encodeutf('Huidige versie:'));
define('_ACA_NEWEST_VERSION', compa::encodeutf('Nieuwste versie:'));
define('_ACA_UPDATING', compa::encodeutf('Bezig met Updaten'));
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', compa::encodeutf('De bestanden zijn met succes bijgewerkt.'));
define('_ACA_UPDATE_FAILED', compa::encodeutf('Update mislukt!'));
define('_ACA_ADDING', compa::encodeutf('Toevoegen'));
define('_ACA_ADDED_SUCCESSFULLY', compa::encodeutf('Met succes toegevoegd.'));
define('_ACA_ADDING_FAILED', compa::encodeutf('Toevoegen mislukt!'));
define('_ACA_REMOVING', compa::encodeutf('Verwijderen'));
define('_ACA_REMOVED_SUCCESSFULLY', compa::encodeutf('Met succes verwijderd.'));
define('_ACA_REMOVING_FAILED', compa::encodeutf('Verwijderen mislukt!'));
define('_ACA_INSTALL_DIFFERENT_VERSION', compa::encodeutf('Installeer een andere versie'));
define('_ACA_CONTENT_ADD', compa::encodeutf('Content toevoegen'));
define('_ACA_UPGRADE_FROM', compa::encodeutf('Importeer data (nieuwsbrieven en abonnees informatie) van '));
define('_ACA_UPGRADE_MESS', compa::encodeutf('Uw bestaande data loopt geen risico. <br /> Dit proces zal de data in de jNews database importeren.'));
define('_ACA_CONTINUE_SENDING', compa::encodeutf('Doorgaan met verzenden'));

// jNews bericht
define('_ACA_UPGRADE1', compa::encodeutf('U kan eenvoudig uw gebruikers en nieuwsbrieven importeren van '));
define('_ACA_UPGRADE2', compa::encodeutf(' naar jNews in het updatescherm.'));
define('_ACA_UPDATE_MESSAGE', compa::encodeutf('Een nieuwe versie van jNews is beschikbaar. '));
define('_ACA_UPDATE_MESSAGE_LINK', compa::encodeutf('Klik hier om de update te starten!'));
define('_ACA_CRON_SETUP', compa::encodeutf('Om autoresponders te versturen moet u een crontaak instellen.'));
define('_ACA_THANKYOU', compa::encodeutf('Bedankt voor het kiezen van jNews, uw communicatie partner!'));
define('_ACA_NO_SERVER', compa::encodeutf('Update Server niet beschikbaar, controleer later nog een keer aub.'));
define('_ACA_MOD_PUB', compa::encodeutf('jNews module is niet gepubliceerd.'));
define('_ACA_MOD_PUB_LINK', compa::encodeutf('Klik hier om deze te publiceren!'));
define('_ACA_IMPORT_SUCCESS', compa::encodeutf('Succesvol geimporteerd'));
define('_ACA_IMPORT_EXIST', compa::encodeutf('Abonnee bestaat al in de database'));


// jNews's handleiding
define('_ACA_GUIDE', compa::encodeutf('\'s Wizard'));
define('_ACA_GUIDE_FIRST_ACA_STEP', compa::encodeutf('<p>jNews heeft veel voordelen en de wizard zal u eenvoudig door 4 stappen heenleiden om te starten met het versturen van nieuwsbrieven en auto-responders!<p />'));
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', compa::encodeutf('Als eerste moet u een lijst maken. Een lijst kan uit twee typen bestaan,' .
		' een nieuwsbrief of een auto-responder.  In de lijst definieert u alle verschillende parameters om het versturen' .
		' van nieuwsbrieven of auto-responders in te schakelen: Naam van de verzender, layout, abonnees, welkombericht, etc...' .
		'<br /><br />U kan uw eerste lijst hier configureren: <a href="index2.php?option=com_jnewsletter&act=list" >' .
				'creëer een lijst</a> en klik op de knop: Nieuw'));
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', compa::encodeutf('jNews biedt u een eenvoudige manier om data te importeren uit uw vorige nieuwsbriefsysteem.<br />' .
		' Ga naar het Updatescherm en kies het vorige nieuwsbriefsysteem om alle data te importeren.<br /><br />' .
		'<span style="color:#FF5E00;" >BELANGRIJK: het importeren is risicovrij en zal de data van uw vorige nieuwsbriefsysteem niet beschadigen</span><br />' .
		'Na het importeren kunt u de abonnees en mailings meteen beheren vanuit jNews.<br /><br />'));
define('_ACA_GUIDE_SECOND_ACA_STEP', compa::encodeutf('Creëer uw eerste lijst!  U kunt nu uw eerste %s opstellen.  Om deze te creëeren ga naar: '));
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', compa::encodeutf('Auto-responder Management'));
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', compa::encodeutf('Nieuwsbrief Management'));
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', compa::encodeutf(' en select uw %s. <br /> Kies dan uw %s in de drop-down lijst.  Creëer uw eerste mailing door te klikken op Nieuw '));

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', compa::encodeutf('Voordat u uw eerste nieuwsbrief verstuurt, moet u uw mailconfiguratie nakijken.  ' .
		'Ga naar het <a href="index2.php?option=com_jnewsletter&act=configuration" >configuratiescherm</a> om de emailinstellingen te controleren. <br />'));
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', compa::encodeutf('<br />Als u klaar bent ga dan terug naar het nieuwsbrief menu, selecteer uw mailing en klik op Verzenden'));

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', compa::encodeutf('Om uw auto-responders te verzenden moet u eerst een crontaak instellen op uw server. ' .
		' Refereer aub naar de Cron tab in het configuratiescherm.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration">klik hier</a> om te leren hoe u een crontaak kunt instellen. <br />'));

define('_ACA_GUIDE_MODULE', compa::encodeutf(' <br />U moet de jNews module hebben gepubliceerd zodat belangstellenden zich kunnen inschrijven voor de lijst.'));

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', compa::encodeutf(' U kan nu eventueel een auto-responder instellen.'));
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', compa::encodeutf(' U kan nu ook een nieuwsbrief instellen.'));

define('_ACA_GUIDE_FOUR_ACA_STEP', compa::encodeutf('<p><br />Eindelijk! U bent klaar om effectief te communiceren met uw bezoekers en gebruikers.' .
		' Deze wizard zal stoppen wanneer u een tweede mailing heeft aangemaakt of u kunt deze deactiveren in het ' .
		'<a href="index2.php?option=com_jnewsletter&act=configuration" >configuratiescherm</a>.' .
		'<br /><br />  Als u nog vragen heeft tijdens het gebruik van jNews, refereer aub naar het ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60">forum</a>. ' .
		' U zult veel informatie vinden over hoe te communiceren op een effectieve manier met uw abonnees op <a href="http://www.ijoobi.com/" target="_blank">www.ijoobi.com</a>.' .
		'<p /><br /><b>Bedankt voor het gebruiken van jNews. Uw Communicatie Partner!</b> '));
define('_ACA_GUIDE_TURNOFF', compa::encodeutf('De wizard is nu uitgeschakeld!'));
define('_ACA_STEP', compa::encodeutf('STAP '));

// jNews Installatie
define('_ACA_INSTALL_CONFIG', compa::encodeutf('jNews Configuratie'));
define('_ACA_INSTALL_SUCCESS', compa::encodeutf('Succesvol Geinstalleerd'));
define('_ACA_INSTALL_ERROR', compa::encodeutf('Installatie Error'));
define('_ACA_INSTALL_BOT', compa::encodeutf('jNews Plugin (Bot)'));
define('_ACA_INSTALL_MODULE', compa::encodeutf('jNews Module'));
//Overig
define('_ACA_JAVASCRIPT', compa::encodeutf('!Waarschuwing! Javascript moet ingeschakeld worden voor een goede werking.'));
define('_ACA_EXPORT_TEXT', compa::encodeutf('Het exporteren van abonnees is gebaseerd op de lijst die u heeft gekozen. <br />Exporteer abonnees voor de lijst'));
define('_ACA_IMPORT_TIPS', compa::encodeutf('Importeer abonnees. De informatie in het bestand moet in het volgende formaat staan: <br />' .
		'Name,email,receiveHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmed(1/0)</span>'));
define('_ACA_SUBCRIBER_EXIT', compa::encodeutf('is al abonnee'));
define('_ACA_GET_STARTED', compa::encodeutf('Klik hier om te starten!'));

//Nieuw sinds 1.0.1
define('_ACA_WARNING_1011', compa::encodeutf('Waarschuwing: 1011: Update zal niet werken door uw server restricties.'));
define('_ACA_SEND_MAIL_FROM_TIPS', compa::encodeutf('used as Bounced back for all your messages'));
define('_ACA_SEND_MAIL_NAME_TIPS', compa::encodeutf('Kies welke naam moet worden weergegeven als verzender.'));
define('_ACA_MAILSENDMETHOD_TIPS', compa::encodeutf('Kies welke mailmethode u wilt gebruiken: PHP mail functie, <span>Sendmail</span> of SMTP Server.'));
define('_ACA_SENDMAILPATH_TIPS', compa::encodeutf('Dit is de directory van de Mail-server'));
define('_ACA_LIST_T_TEMPLATE', compa::encodeutf('Template'));
define('_ACA_NO_MAILING_ENTERED', compa::encodeutf('Geen mailing beschikbaar'));
define('_ACA_NO_LIST_ENTERED', compa::encodeutf('Geen lijst beschikbaar'));
define('_ACA_SENT_MAILING', compa::encodeutf('Verzend mailings'));
define('_ACA_SELECT_FILE', compa::encodeutf('Selecteer aub ook een bestand '));
define('_ACA_LIST_IMPORT', compa::encodeutf('Selecteer de lijst(en) waar u abonnees mee geassocieerd wilt hebben.'));
define('_ACA_PB_QUEUE', compa::encodeutf('Abonnee toegevoegd, maar er is een probleem om hem/haar aan de lijst(en) te verbinden. Kijk AUB in de handleiding.'));
define('_ACA_UPDATE_MESS', compa::encodeutf(''));
define('_ACA_UPDATE_MESS1', compa::encodeutf('Update dringend geadviseerd!'));
define('_ACA_UPDATE_MESS2', compa::encodeutf('Patch en kleine foutoplossingen'));
define('_ACA_UPDATE_MESS3', compa::encodeutf('Nieuwe release.'));
define('_ACA_UPDATE_MESS5', compa::encodeutf('Joomla 1.5 is vereist om te updaten.'));
define('_ACA_UPDATE_IS_AVAIL', compa::encodeutf(' is beschikbaar!'));
define('_ACA_NO_MAILING_SENT', compa::encodeutf('Geen mailing verstuurd!'));
define('_ACA_SHOW_LOGIN', compa::encodeutf('Geef login formulier weer'));
define('_ACA_SHOW_LOGIN_TIPS', compa::encodeutf('Selecteer Ja om een loginformulier weer te geven op de front-end jNews configuratiescherm zodat een gebruiker zich kan registreren op de website.'));
define('_ACA_LISTS_EDITOR', compa::encodeutf('Editor lijst beschijving'));
define('_ACA_LISTS_EDITOR_TIPS', compa::encodeutf('Selecteer Ja om een HTML-editor te gebruiken om de lijst omschrijving veld te bewerken.'));
define('_ACA_SUBCRIBERS_VIEW', compa::encodeutf('Bekijk abonnees'));

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', compa::encodeutf('Front-end Settings'));
define('_ACA_SHOW_LOGOUT', compa::encodeutf('Laat logout knop zien'));
define('_ACA_SHOW_LOGOUT_TIPS', compa::encodeutf('Selecteer Ja om een logoutknop op het jNews panel te laten zien.'));

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', compa::encodeutf('Integratie'));
define('_ACA_CB_INTEGRATION', compa::encodeutf('Community Builder Integratie'));
define('_ACA_INSTALL_PLUGIN', compa::encodeutf('Community Builder Plugin (jNews Integratie) '));
define('_ACA_CB_PLUGIN_NOT_INSTALLED', compa::encodeutf('jNews Plugin voor Community Builder is nog niet genstalleerd!'));
define('_ACA_CB_PLUGIN', compa::encodeutf('Registratielijsten'));
define('_ACA_CB_PLUGIN_TIPS', compa::encodeutf('Kies Ja om de maillijst in het in het Community Builder registratieformulier te laten zien'));
define('_ACA_CB_LISTS', compa::encodeutf('Lijst IDs'));
define('_ACA_CB_LISTS_TIPS', compa::encodeutf('DIT IS EN VERPLICHT VELD. Vul het id nummer in van de lijst waarop gebruikers zich kunnen inschrijven, gescheiden door een komma,  (0 toont alle lijsten)'));
define('_ACA_CB_INTRO', compa::encodeutf('Introductietekst'));
define('_ACA_CB_INTRO_TIPS', compa::encodeutf('Een tekst die ingevuld wordt  zal voor de lijst getoond worden. LAAT LEEG OM NIETS TE TONEN.  Gebruik  cb_pretekst voor CSS layout.'));
define('_ACA_CB_SHOW_NAME', compa::encodeutf('Toon de lijstnaam'));
define('_ACA_CB_SHOW_NAME_TIPS', compa::encodeutf('Kies om de naam van de lijst al dan niet te tonen na de introductie. '));
define('_ACA_CB_LIST_DEFAULT', compa::encodeutf('Standaard Aanvinken'));
define('_ACA_CB_LIST_DEFAULT_TIPS', compa::encodeutf('Kies of het keuzevakje standaard ingevuld moet worden voor elke lijst. '));
define('_ACA_CB_HTML_SHOW', compa::encodeutf('Toon Ontvang HTML'));
define('_ACA_CB_HTML_SHOW_TIPS', compa::encodeutf('Kies Ja om gebruikers een keuze te laten maken of ze HTML mails willen ontvangen of niet. Kies Nee om standaard HTML te ontvangen. '));
define('_ACA_CB_HTML_DEFAULT', compa::encodeutf('Standaard ontvangst HTML'));
define('_ACA_CB_HTML_DEFAULT_TIPS', compa::encodeutf('Kies voor deze optie om de standaard HTML mailconfiguratie te tonen. Als het Standaard ontvangst HTML  op Nee staat is deze optie standaard. '));

// Since 1.0.4
define('_ACA_BACKUP_FAILED', compa::encodeutf('Kan geen backup van het bestand maken! Bestand niet vervangen.'));
define('_ACA_BACKUP_YOUR_FILES', compa::encodeutf('De backup van de oude versie van de bestanden zijn in de volgende directory geplaatst:'));
define('_ACA_SERVER_LOCAL_TIME', compa::encodeutf('Lokale Server tijd'));
define('_ACA_SHOW_ARCHIVE', compa::encodeutf('Geef archiefknop weer'));
define('_ACA_SHOW_ARCHIVE_TIPS', compa::encodeutf('Selecteer JA om de archiefknop in de nieuwsbrievenlijst op de front-end weer te geven'));
define('_ACA_LIST_OPT_TAG', compa::encodeutf('Tags'));
define('_ACA_LIST_OPT_IMG', compa::encodeutf('Plaatjes'));
define('_ACA_LIST_OPT_CTT', compa::encodeutf('Inhoud'));
define('_ACA_INPUT_NAME_TIPS', compa::encodeutf('Voer uw volledige naam in (voornaam eerst)'));
define('_ACA_INPUT_EMAIL_TIPS', compa::encodeutf('Voer uw email adres in (Dit moet een geldig email adres zijn als u onze mailings wilt ontvangen.)'));
define('_ACA_RECEIVE_HTML_TIPS', compa::encodeutf('Kies Ja als u HTML mailings wilt ontvangen - Nee om alleen tekst mailings te ontvangen'));
define('_ACA_TIME_ZONE_ASK_TIPS', compa::encodeutf('Bepaal uw tijdzone.'));

// Since 1.0.5
define('_ACA_FILES', compa::encodeutf('Bestanden'));
define('_ACA_FILES_UPLOAD', compa::encodeutf('Upload'));
define('_ACA_MENU_UPLOAD_IMG', compa::encodeutf('Upload Plaatjes'));
define('_ACA_TOO_LARGE', compa::encodeutf('Bestandgrootte is te groot. De maximale toegestane grootte is'));
define('_ACA_MISSING_DIR', compa::encodeutf('Doeldirectory bestaat niet'));
define('_ACA_IS_NOT_DIR', compa::encodeutf('Doeldirectory bestaat niet of het is een normaal bestand.'));
define('_ACA_NO_WRITE_PERMS', compa::encodeutf('De doeldirectory heeft geen schrijf rechten.'));
define('_ACA_NO_USER_FILE', compa::encodeutf('U heeft geen bestand geselecteerd voor uploaden.'));
define('_ACA_E_FAIL_MOVE', compa::encodeutf('Onmogelijk om het bestand te verplaatsen.'));
define('_ACA_FILE_EXISTS', compa::encodeutf('Het doelbestand bestaat reeds.'));
define('_ACA_CANNOT_OVERWRITE', compa::encodeutf('Het doelbestand bestaat reeds of kan niet overschreven worden.'));
define('_ACA_NOT_ALLOWED_EXTENSION', compa::encodeutf('Bestands extentie niet toegestaan.'));
define('_ACA_PARTIAL', compa::encodeutf('Het bestand was alleen ten dele geupload.'));
define('_ACA_UPLOAD_ERROR', compa::encodeutf('Upload error:'));
define('DEV_NO_DEF_FILE', compa::encodeutf('Het bestand was alleen ten dele geupload.'));
define('_ACA_CONTENTREP', compa::encodeutf('[SUBSCRIPTIONS] = Dit zal worden vervangen door de inschrijvingslinks.' .
		' Dit is <strong>vereist</strong> om jNews goed te laten werken.<br />' .
		'Als u andere content in deze box plaatst, word het weergegeven in alle mailings die betrekking hebben met deze lijst.' .
		' <br />Voeg uw inschrijvingsbericht toe op het eind. jNews zal automatisch een link toevoegen voor de abonnee om hun gegevens aan te passen en een link om zich uit te schrijven van de lijst.'));

// since 1.0.6
define('_ACA_NOTIFICATION', compa::encodeutf('Notificatie'));  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', compa::encodeutf('Notificatie'));
define('_ACA_USE_SEF', compa::encodeutf('SEF in mailings'));
define('_ACA_USE_SEF_TIPS', compa::encodeutf('Het is aanbevolen om Nee te kiezen. Als u toch de URL in de mailings als SEF wilt gebruiken, kies dan Ja.' .
		' <br /><b>De link werkt hetzelfde voor de beide opties.  We kunnen niet verzekeren dat de links in de mailings altijd werken, zelfs als u uw SEF wijzigt.</b> '));
define('_ACA_ERR_NB', compa::encodeutf('Error #: ERR'));
define('_ACA_ERR_SETTINGS', compa::encodeutf('Error afhandelings instellingen'));
define('_ACA_ERR_SEND', compa::encodeutf('Verzend error rapport'));
define('_ACA_ERR_SEND_TIPS', compa::encodeutf('Als u jNews wilt helpen verbeteren, selecteer aub JA.  Deze keuze zal ons een error rapport sturen.  Zo hoeft u geen bugs meer te rapporteren. ;-) <br /> <b>ER WORD GEEN PERSOONLIJKE INFORMATIE VERSTUURD</b>.  We weten niet eens van welke website de error vandaan komt. We versturen alleen de informatie over jNews, de PHP instellingen en de SQL queries. '));
define('_ACA_ERR_SHOW_TIPS', compa::encodeutf('Kies Ja om de error nummer weer te geven.  Hoofdzakelijk gebruikt voor debugging. '));
define('_ACA_ERR_SHOW', compa::encodeutf('Geef errors weer'));
define('_ACA_LIST_SHOW_UNSUBCRIBE', compa::encodeutf('Geef uitschrijvings links weer'));
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', compa::encodeutf('Selecteer Ja om uitschrijvings links op het eind van de mailing weer te geven om gebruikers hun inschrijvingen te kunnen laten wijzigen. <br /> Niet de voetnoot en de links uitschakelen.'));
define('_ACA_UPDATE_INSTALL', compa::encodeutf('<span style="color: rgb(255, 0, 0);">BELANGRIJKE INFORMATIE!</span> <br />Als u een vorige jNews installatie bijwerkt, moet u de database structuur bijwerken door op de volgende knop te klikken (Uw gegevens zullen bewaard blijven)'));
define('_ACA_UPDATE_INSTALL_BTN', compa::encodeutf('Tabbellen en configuratie bijwerken'));
define('_ACA_MAILING_MAX_TIME', compa::encodeutf('Max queue tijd'));
define('_ACA_MAILING_MAX_TIME_TIPS', compa::encodeutf('Definieer de maximale tijd voor elke set emails verstuurd door de queue. Aanbevolen tussen 30s en 2 minuten.'));

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', compa::encodeutf('VirtueMart intergratie'));
define('_ACA_VM_COUPON_NOTIF', compa::encodeutf('Bon notificatie ID.'));
define('_ACA_VM_COUPON_NOTIF_TIPS', compa::encodeutf('Specificeer de ID nummer van de mailing die u wilt gebruiken om bonnen te verzenden naar uw klanten.'));
define('_ACA_VM_NEW_PRODUCT', compa::encodeutf('Nieuwe producten notificatie ID'));
define('_ACA_VM_NEW_PRODUCT_TIPS', compa::encodeutf('Specificeer de ID nummer van de mailing die u wilt gebruiken om nieuwe product notificatie te verzenden.'));

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', compa::encodeutf('Creëer formulier'));
define('_ACA_FORM_COPY', compa::encodeutf('HTML code'));
define('_ACA_FORM_COPY_TIPS', compa::encodeutf('Kopiëer de gegenereerde HTML code in uw HTML pagina.'));
define('_ACA_FORM_LIST_TIPS', compa::encodeutf('Selecteer de lijst die u wilt invoegen in het formulier'));
// update messages
define('_ACA_UPDATE_MESS4', compa::encodeutf('Het Kan niet automatisch worden geupdate.'));
define('_ACA_WARNG_REMOTE_FILE', compa::encodeutf('Het bestand kan niet verwijderd worden.'));
define('_ACA_ERROR_FETCH', compa::encodeutf('Error tijdens openen bestand.'));

define('_ACA_CHECK', compa::encodeutf('Controleer'));
define('_ACA_MORE_INFO', compa::encodeutf('Meer info'));
define('_ACA_UPDATE_NEW', compa::encodeutf('Bijwerken naar een nieuwere versie'));
define('_ACA_UPGRADE', compa::encodeutf('Bijwerken naar een betere produkt'));
define('_ACA_DOWNDATE', compa::encodeutf('Bijwerken naar een vorige versie'));
define('_ACA_DOWNGRADE', compa::encodeutf('Terug naar het basis produkt'));
define('_ACA_REQUIRE_JOOM', compa::encodeutf('Joomla Vereist'));
define('_ACA_TRY_IT', compa::encodeutf('Probeer het!'));
define('_ACA_NEWER', compa::encodeutf('Nieuwer'));
define('_ACA_OLDER', compa::encodeutf('Ouder'));
define('_ACA_CURRENT', compa::encodeutf('Huidige'));

// since 1.0.9
define('_ACA_CHECK_COMP', compa::encodeutf('Probeer een van de andere componenten'));
define('_ACA_MENU_VIDEO', compa::encodeutf('Video tutorials'));
define('_ACA_AUTO_SCHEDULE', compa::encodeutf('Rooster'));
define('_ACA_SCHEDULE_TITLE', compa::encodeutf('Automatische setting roosterfunctie '));
define('_ACA_ISSUE_NB_TIPS', compa::encodeutf('Mailnummer wordt automatisch gegenereerd door het systeem'));
define('_ACA_SEL_ALL', compa::encodeutf('Alle mailings'));
define('_ACA_SEL_ALL_SUB', compa::encodeutf('Alle lijsten'));
define('_ACA_INTRO_ONLY_TIPS', compa::encodeutf('Als je dit hokje aanvinkt zal alleen het introductiedeel van het artikel in de nieuwsbrief geplaatst worden met een "lees meer" link naar het volledige artikel op je site.'));
define('_ACA_TAGS_TITLE', compa::encodeutf('Inhoudslabel'));
define('_ACA_TAGS_TITLE_TIPS', compa::encodeutf('Kopieer en plak de label in de nieuwsbrief waar de inhoud geplaatst moet worden.'));
define('_ACA_PREVIEW_EMAIL_TEST', compa::encodeutf('Vermeld het emailadres waar de testmail naar toe gestuurd wordt'));
define('_ACA_PREVIEW_TITLE', compa::encodeutf('Preview'));
define('_ACA_AUTO_UPDATE', compa::encodeutf('Nieuwe updatemelding'));
define('_ACA_AUTO_UPDATE_TIPS', compa::encodeutf('Kies Ja als u geinformeerd wilt worden over nieuwe updates voor uw component. <br />BELANGRIJK!! Tips weergeven! moet op Ja staan om deze functie te laten werken.'));

// since 1.1.0
define('_ACA_LICENSE', compa::encodeutf('Lincensie Informatie'));

// since 1.1.1
define('_ACA_NEW', compa::encodeutf('Nieuw'));
define('_ACA_SCHEDULE_SETUP', compa::encodeutf('In welke volgorde de Auto-responder moet worden verstuurd, moet u een planning instellen in de configuratie.'));
define('_ACA_SCHEDULER', compa::encodeutf('Planning'));
define('_ACA_JNEWSLETTER_CRON_DESC', compa::encodeutf('als u geen toegang heeft tot een cron taak manager op uw website, kan u zich registreren voor een gratis jNews Cron Account op:'));
define('_ACA_CRON_DOCUMENTATION', compa::encodeutf('U kunt meer informatie vinden over het instellen van een jNews Planning op de volgende url:'));
define('_ACA_CRON_DOC_URL', compa::encodeutf('<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>'));
define( '_ACA_QUEUE_PROCESSED', compa::encodeutf('Wachtrij succesvol verwerkt...'));
define( '_ACA_ERROR_MOVING_UPLOAD', compa::encodeutf('Error met verplaatsen geïmporteerd bestand'));

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', compa::encodeutf('Planning frequentie'));
define( '_ACA_CRON_MAX_FREQ', compa::encodeutf('Planning max frequentie'));
define( '_ACA_CRON_MAX_FREQ_TIPS', compa::encodeutf('Geef de maximale frequentie op dat de planning kan opereren ( in minuten ).  Dit zal de planning beperken, zelfs wanneer de cron taak is ingesteld met meer frequentie.'));
define( '_ACA_CRON_MAX_EMAIL', compa::encodeutf('Maximale emails per taak'));
define( '_ACA_CRON_MAX_EMAIL_TIPS', compa::encodeutf('Geef het aantal emails op dat verstuurd word per taak (0 ongelimiteerd).'));
define( '_ACA_CRON_MINUTES', compa::encodeutf(' minuten'));
define( '_ACA_SHOW_SIGNATURE', compa::encodeutf('Geef email voetnoot weer'));
define( '_ACA_SHOW_SIGNATURE_TIPS', compa::encodeutf('Of u jNews in de voetnoot van de e-mails wel of niet wil promoten.'));
define( '_ACA_QUEUE_AUTO_PROCESSED', compa::encodeutf('Auto-responders succesvol verwerkt...'));
define( '_ACA_QUEUE_NEWS_PROCESSED', compa::encodeutf('Geplande nieuwsbrieven succesvol verwerkt...'));
define( '_ACA_MENU_SYNC_USERS', compa::encodeutf('Synchronisatie Gebruikers'));
define( '_ACA_SYNC_USERS_SUCCESS', compa::encodeutf('Gebruikers Synchronisatie Succesvol!'));

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Uitloggen'));
if (!defined('_CMN_YES')) define( '_CMN_YES', compa::encodeutf('Ja'));
if (!defined('_CMN_NO')) define( '_CMN_NO', compa::encodeutf('Nee'));
if (!defined('_HI')) define( '_HI', compa::encodeutf('Hallo'));
if (!defined('_CMN_TOP')) define( '_CMN_TOP', compa::encodeutf('Bovenkant'));
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', compa::encodeutf('Onderkant'));
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Logout'));

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', compa::encodeutf('Indien u alleen dit selecteerd, zal in de mailing alleen de titel van het artikel worden toegevoegd als een link naar het complete artikel op uw website.'));
define('_ACA_TITLE_ONLY', compa::encodeutf('Title alleen'));
define('_ACA_FULL_ARTICLE_TIPS', compa::encodeutf('Als u dit selecteerd word het complete artikel toegevoegd in de mailing'));
define('_ACA_FULL_ARTICLE', compa::encodeutf('Volledige Artikel'));
define('_ACA_CONTENT_ITEM_SELECT_T', compa::encodeutf('Selecteer een content item om bij het bericht toe te voegen. <br />kopiëer en plak <b>content tag</b> in de mailing.  U kan kiezen voor volledige tekst, alleen de introductie of alleen de titel met (0, 1, or 2 respectievelijk). '));
define('_ACA_SUBSCRIBE_LIST2', compa::encodeutf('Mailing lijst(en)'));

// smart-newsletter function
define('_ACA_AUTONEWS', compa::encodeutf('Slimme-Nieuwsbrieven'));
define('_ACA_MENU_AUTONEWS', compa::encodeutf('Slimme-Nieuwsbrieven'));
define('_ACA_AUTO_NEWS_OPTION', compa::encodeutf('Slim-Nieuwsbrief instellingen'));
define('_ACA_AUTONEWS_FREQ', compa::encodeutf('Nieuwsbrief Frequentie'));
define('_ACA_AUTONEWS_FREQ_TIPS', compa::encodeutf('Geef de frequentie op waarmee u de slim-nieuwsbrief sturen wil.'));
define('_ACA_AUTONEWS_SECTION', compa::encodeutf('Artikel Onderdeel'));
define('_ACA_AUTONEWS_SECTION_TIPS', compa::encodeutf('Geef het onderdeel op waarvan u de artikelen kiezen wil.'));
define('_ACA_AUTONEWS_CAT', compa::encodeutf('Artikel Categorie'));
define('_ACA_AUTONEWS_CAT_TIPS', compa::encodeutf('Geef de categorie op waarvan u de artikelen kiezen wil (Alles voor alle artikelen in dat onderdeel).'));
define('_ACA_SELECT_SECTION', compa::encodeutf('Selecteer een onderdeel'));
define('_ACA_SELECT_CAT', compa::encodeutf('Alle Categorieëen'));
define('_ACA_AUTO_DAY_CH8', compa::encodeutf('Quaterly'));
define('_ACA_AUTONEWS_STARTDATE', compa::encodeutf('Start datum'));
define('_ACA_AUTONEWS_STARTDATE_TIPS', compa::encodeutf('Geef de datum op waarmee u wilt beginnen met de Slimme Nieuwsbrief te sturen.'));
define('_ACA_AUTONEWS_TYPE', compa::encodeutf('Inhoud interpretatie'));// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', compa::encodeutf('Volledige Artikel: zal het volledige artikel in de nieuwsbrief toevoegen.<br />' .
		'Introductie alleen: Zal enkel de introductie van het artikel in de nieuwsbrief toevoegen.<br/>' .
		'Titel alleen: Zal enkel de titel van het artikel in de nieuwsbrief toevoegen.'));
define('_ACA_TAGS_AUTONEWS', compa::encodeutf('[SMARTNEWSLETTER] = Dit zal door de Slim-Nieuwsbrief vervangen worden.'));

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', compa::encodeutf('Creëer / Bekijk de mailings'));
define('_ACA_LICENSE_CONFIG', compa::encodeutf('licentie'));
define('_ACA_ENTER_LICENSE', compa::encodeutf('Voer licentie in'));
define('_ACA_ENTER_LICENSE_TIPS', compa::encodeutf('Voer uw licentie nummer in en klik op opslaan.'));
define('_ACA_LICENSE_SETTING', compa::encodeutf('licentie instellingen'));
define('_ACA_GOOD_LIC', compa::encodeutf('U heeft een geldige licentie.'));
define('_ACA_NOTSO_GOOD_LIC', compa::encodeutf('U heeft een ongeldige licentie: '));
define('_ACA_PLEASE_LIC', compa::encodeutf('Contacteer AUB jNews support om uw licentie bij te werken ( license@ijoobi.com ).'));

define('_ACA_DESC_PLUS', compa::encodeutf('jNews Plus is de eerste logische auto-responder voor Joomla CMS.  ' . _ACA_FEATURES));
define('_ACA_DESC_PRO', compa::encodeutf('jNews PRO de ultieme E-mail systeem voor Joomla CMS.  ' . _ACA_FEATURES));

//since 1.1.4
define('_ACA_ENTER_TOKEN', compa::encodeutf('Voer bewijs in'));
define('_ACA_ENTER_TOKEN_TIPS', compa::encodeutf('Voer AUB uw bewijsnummer in die u via de e-mail heeft ontvangen toen u jNews heeft aangeschaft. '));
define('_ACA_JNEWSLETTER_SITE', compa::encodeutf('jNews site:'));
define('_ACA_MY_SITE', compa::encodeutf('Mijn site:'));
define( '_ACA_LICENSE_FORM', compa::encodeutf(' ' .
 		'Klik hier om naar het licentie formulier te gaan.</a>'));
define('_ACA_PLEASE_CLEAR_LICENSE', compa::encodeutf('Maak AUB licentie veld leeg en probeer opnieuw.<br />  Als het probleem blijft bestaan, '));
define( '_ACA_LICENSE_SUPPORT', compa::encodeutf('Heeft u nog steeds vragen, ' . _ACA_PLEASE_LIC));
define( '_ACA_LICENSE_TWO', compa::encodeutf('u kan uw lincentie handmatig verkrijgen door uw bewijsnummer en site URL (wat in groen aan de bovenkant van deze pagina staat) in te voeren in de Licentie formulier. '
					     . _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT));
define('_ACA_ENTER_TOKEN_PATIENCE', compa::encodeutf('Na opslaan van uw bewijsnummer zal een licentie automatisch worden gegenereerd. ' .
		' Normaal gesproken is uw bewijsnummer in 2 minuten goed gekeurd. Echter, is sommige gevallen kan het tot 15 minute duren.<br />' .
		'<br />Controleer over een paar minuten uw configuratiescherm opnieuw.  <br /><br />' .
						     'Als u geen geldige licentienummer binnen 15 heeft ontvangen, '. _ACA_LICENSE_TWO));
define( '_ACA_ENTER_NOT_YET', compa::encodeutf('Uw bewijsnummer is nog niet geldig verklaard.'));
define( '_ACA_UPDATE_CLICK_HERE', compa::encodeutf('Bezoek AUB <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> om de nieuwste versie te downloaden.'));
define( '_ACA_NOTIF_UPDATE', compa::encodeutf('Om over nieuwe updates op de hoogte te worden gesteld, vul uw e-mail adres in en klik op inschrijven '));

define('_ACA_THINK_PLUS', compa::encodeutf('Als u meer uit uw mailingsysteem wilt halen, denk dan aan jNews Plus!'));
define('_ACA_THINK_PLUS_1', compa::encodeutf('Opeenvolgende auto-responders'));
define('_ACA_THINK_PLUS_2', compa::encodeutf('Plan de aflevering van uw nieuwsbrief voor een bepaalde datum'));
define('_ACA_THINK_PLUS_3', compa::encodeutf('Geen limieten/beperkingen meer'));
define('_ACA_THINK_PLUS_4', compa::encodeutf('en veel meer...'));


//since 1.2.2
define( '_ACA_LIST_ACCESS', compa::encodeutf('Lijst Toegang'));
define( '_ACA_INFO_LIST_ACCESS', compa::encodeutf('Specificeer welke groep gebruikers deze lijst kan zien en abonnee kan worden'));
define( 'ACA_NO_LIST_PERM', compa::encodeutf('U heeft niet voldoende rechten om abonnee te worden van deze lijst'));

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', compa::encodeutf('Archief'));
 define('_ACA_MENU_ARCHIVE_ALL', compa::encodeutf('Archiveer Alles'));

//Archive Lists
 define('_FREQ_OPT_0', compa::encodeutf('Geen'));
 define('_FREQ_OPT_1', compa::encodeutf('Elke Week'));
 define('_FREQ_OPT_2', compa::encodeutf('Elke 2 Weken'));
 define('_FREQ_OPT_3', compa::encodeutf('Elke Maand'));
 define('_FREQ_OPT_4', compa::encodeutf('Elk Kwartaal'));
 define('_FREQ_OPT_5', compa::encodeutf('Elk Jaar'));
 define('_FREQ_OPT_6', compa::encodeutf('Anders'));

define('_DATE_OPT_1', compa::encodeutf('Datum gecreëerd'));
define('_DATE_OPT_2', compa::encodeutf('Datum gewijzigd'));

define('_ACA_ARCHIVE_TITLE', compa::encodeutf('Stel auto-archief frequentie in'));
define('_ACA_FREQ_TITLE', compa::encodeutf('Archief frequentie'));
define('_ACA_FREQ_TOOL', compa::encodeutf('Bepaal hoe vaak dat u wilt dat de Archief Manager uw website content in het archief zet.'));
define('_ACA_NB_DAYS', compa::encodeutf('Aantal dagen'));
define('_ACA_NB_DAYS_TOOL', compa::encodeutf('Dit is alleen voor de Anders optie! Geef het aantal dagen op tussen elke Archivering.'));
define('_ACA_DATE_TITLE', compa::encodeutf('Datum type'));
define('_ACA_DATE_TOOL', compa::encodeutf('Bepaal of het in het archief zetten gedaan moet worden op datum gecreëerd of op datum gewijzigd.'));

define('_ACA_MAINTENANCE_TAB', compa::encodeutf('Onderhoud instellingen'));
define('_ACA_MAINTENANCE_FREQ', compa::encodeutf('Onderhoud frequentie'));
define( '_ACA_MAINTENANCE_FREQ_TIPS', compa::encodeutf('Specificeer de frequentie hoe vaak u de onderhoud wilt laten uitvoeren.'));
define( '_ACA_CRON_DAYS', compa::encodeutf('uur(en)'));

define( '_ACA_LIST_NOT_AVAIL', compa::encodeutf('Er is geen lijst beschikbaar.'));
define( '_ACA_LIST_ADD_TAB', compa::encodeutf('Toevoegen/Bewerken'));

define( '_ACA_LIST_ACCESS_EDIT', compa::encodeutf('Mailing Toevoegen/Bewerken Rechten'));
define( '_ACA_INFO_LIST_ACCESS_EDIT', compa::encodeutf('Specificeer wat voor groep gebruikers nieuwe mailing kan toevoegen of bewerken voor deze lijst'));
define( '_ACA_MAILING_NEW_FRONT', compa::encodeutf('Creëer een nieuwe Mailing'));

define('_ACA_AUTO_ARCHIVE', compa::encodeutf('Auto-Archief'));
define('_ACA_MENU_ARCHIVE', compa::encodeutf('Auto-Archief'));

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', compa::encodeutf('[ISSUENB] = Dit zal vervangen worden door het onderwerp nummer van de nieuwsbrief.'));
define('_ACA_TAGS_DATE', compa::encodeutf('[DATE] = Dit zal vervangen worden door de verzend datum.'));
define('_ACA_TAGS_CB', compa::encodeutf('[CBTAG:{field_name}] = Dit zal vervangen worden met de waarde gehaald uit de Community Builder veld: vb. [CBTAG:firstname] '));
define( '_ACA_MAINTENANCE', compa::encodeutf('Joobi Care'));


define('_ACA_THINK_PRO', compa::encodeutf('Wanneer u professioneel wilt werken, gebruikt u professionele components!'));
define('_ACA_THINK_PRO_1', compa::encodeutf('Slimme-Nieuwsbrieven'));
define('_ACA_THINK_PRO_2', compa::encodeutf('Bepaal rechten niveau voor uw lijst'));
define('_ACA_THINK_PRO_3', compa::encodeutf('Bepaal wie kan bewerken/toevoegen van mailings'));
define('_ACA_THINK_PRO_4', compa::encodeutf('Meer tags: Voeg uw CB velden toe'));
define('_ACA_THINK_PRO_5', compa::encodeutf('Joomla contents Auto-archief'));
define('_ACA_THINK_PRO_6', compa::encodeutf('Database optimalisatie'));

define('_ACA_LIC_NOT_YET', compa::encodeutf('Uw lincentie is nog niet geldig. Controleer AUB uw licentie tab in het configuratie scherm.'));
define('_ACA_PLEASE_LIC_GREEN', compa::encodeutf('Weet zeker dat u de groene informatie verschaft aan de bovenkant van de tab aan onze support team.'));

define('_ACA_FOLLOW_LINK', compa::encodeutf('Verkrijg Uw Licentie'));
define( '_ACA_FOLLOW_LINK_TWO', compa::encodeutf('U kan uw licentie verkrijgen door uw bewijsnummer en uw website url in te voeren (dat in groen te zien is aan de bovenkant van deze pagina ) in het Licentie formulier. '));
define( '_ACA_ENTER_TOKEN_TIPS2', compa::encodeutf(' Klik daarna op Toepassen in het bovenste rechter menu.'));
define( '_ACA_ENTER_LIC_NB', compa::encodeutf('Voer uw Licentie in'));
define( '_ACA_UPGRADE_LICENSE', compa::encodeutf('Upgrade uw Licentie'));
define( '_ACA_UPGRADE_LICENSE_TIPS', compa::encodeutf('Als u een bewijsnummer heeft ontvangen om uw licentie bij te werken voer het hier in, klik op Toepassen en ga verder met nummer <b>2</b> om u nieuwe licentie nummer te verkrijgen.'));

define( '_ACA_MAIL_FORMAT', compa::encodeutf('Encodering formaat'));
define( '_ACA_MAIL_FORMAT_TIPS', compa::encodeutf('Wat voor formaat wilt u gebruiken voor encoderen van uw mailings, Alleen Tekst of MIME'));
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', compa::encodeutf('Als u geen toegang heeft tot de cron taak manager op uw website, kan u de gratis JCron component gebruiken om een cron taak van uw website te creëren.'));

//sinds 1.3.1
define('_ACA_SHOW_AUTHOR', compa::encodeutf('Toon Auteurs Naam'));
define('_ACA_SHOW_AUTHOR_TIPS', compa::encodeutf('Selecteer Ja als u de naam van de Auteur wilt toevoegen als u een artikel toevoegd in de Mailing'));

//sinds 1.3.5
define('_ACA_REGWARN_NAME', compa::encodeutf('Voer uw naam in.'));
define('_ACA_REGWARN_MAIL', compa::encodeutf('Voer een geldig e-mail adres in.'));

//sinds 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', compa::encodeutf('Als u Ja selecteerd, zal de e-mail van de gebruiker toegevoegd worden als parameter aan het einde van uw doorvoer link (uw doorvoer link voor uw module of voor een extern jNews formulier).Dat kan handig zijn als u een speciaal script wilt uitvoeren op uw doorvoer pagina.'));
define('_ACA_ADDEMAILREDLINK', compa::encodeutf('Voeg e-mail toe aan de doorvoer link'));

//sinds 1.6.3
define('_ACA_ITEMID', compa::encodeutf('ItemId'));
define('_ACA_ITEMID_TIPS', compa::encodeutf('Dit ItemId wordt toegevoegd aan uw jNews links.'));

//since 1.6.5
define('_ACA_SHOW_JCALPRO', compa::encodeutf('jCalPRO'));
define('_ACA_SHOW_JCALPRO_TIPS', compa::encodeutf('Laat de integratietab zien voor jCalPRO <br/>(alleen als jCalPRO op uw website geïnstalleerd is!)'));
define('_ACA_JCALTAGS_TITLE', compa::encodeutf('jCalPRO Tag:'));
define('_ACA_JCALTAGS_TITLE_TIPS', compa::encodeutf('Kopieer en plak deze tag in de mailing waar u hem wilt plaatsen.'));
define('_ACA_JCALTAGS_DESC', compa::encodeutf('Beschrijving:'));
define('_ACA_JCALTAGS_DESC_TIPS', compa::encodeutf('Kies Ja als u de beschrijving van de gebeurtenis wilt toevoegen'));
define('_ACA_JCALTAGS_START', compa::encodeutf('Startdatum:'));
define('_ACA_JCALTAGS_START_TIPS', compa::encodeutf('Kies Ja als u de startdatum van de gebeurtenis wilt toevoegen'));
define('_ACA_JCALTAGS_READMORE', compa::encodeutf('Lees meer:'));
define('_ACA_JCALTAGS_READMORE_TIPS', compa::encodeutf('Kies Ja als u een <b>lees meer</b> knop van de gebeurtenis wilt toevoegen'));
define('_ACA_REDIRECTCONFIRMATION', compa::encodeutf('Redirect URL'));
define('_ACA_REDIRECTCONFIRMATION_TIPS', compa::encodeutf('Als u een bevestigingsmail wilt ontvangen, zal de gebruiker naar deze URL doorgestuurd worden als hij op de bevestigingslink klikt.'));

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Bewaar');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Nog geen account?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Registreer');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','U bent niet geautoriseerd om dit te bekijken.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP', compa::encodeutf('Schakel Tooltip uit'));
define('_ACA_DISABLETOOLTIP_TIPS', compa::encodeutf('Schakel de tooltip op de homepage uit'));
define('_ACA_MINISENDMAIL', compa::encodeutf('Gebruik Mini SendMail'));
define('_ACA_MINISENDMAIL_TIPS', compa::encodeutf('Als uw server Mini SendMail kan gebruiken, kies deze optie om dit te gebruiken. Voeg de gebrukersnam niet in op de header van de e-mail'));

//Since 3.1.5
define('_ACA_READMORE',compa::encodeutf('Lees meer...'));
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
