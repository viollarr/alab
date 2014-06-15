<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>Danish language file.</p>
* @copyright (c) 2006-2010 Joobi Limited / All Rights Reserved
* @author Joergen Floes<support@ijoobi.com>
* @version $Id: danish.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.ijoobi.com
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'jNews er forsendelseslister, nyhedsbreve, auto-svar funktion, og opfølgningsværktøj til effektiv kommunikation med dine brugere og kunder.  ' .
		'jNews, Din kommunikationspartner!');
define('_ACA_DESC_GPL', 'jNews er forsendelseslister, nyhedsbreve, auto-svar funktion, og opfølgningsværktøj til effektiv kommunikation med dine brugere og kunder.  ' .
		'jNews, Din kommunikationspartner!');
define('_ACA_FEATURES', 'jNews, din kommunikationspartner!');

// Type of lists
define('_ACA_NEWSLETTER', 'Nyhedsbrev');
define('_ACA_AUTORESP', 'Auto-svar');
define('_ACA_AUTORSS', 'Auto-RSS');
define('_ACA_ECARD', 'eKort');
define('_ACA_POSTCARD', 'Postkort');
define('_ACA_PERF', 'Performance');
define('_ACA_COUPON', 'Kupon');
define('_ACA_CRON', 'Cron opgave');
define('_ACA_MAILING', 'Forsendelse');
define('_ACA_LIST', 'Liste');

//jnewsletter Menu
define('_ACA_MENU_LIST', 'Administration af lister');
define('_ACA_MENU_SUBSCRIBERS', 'Abonnenter');
define('_ACA_MENU_NEWSLETTERS', 'Nyhedsbreve');
define('_ACA_MENU_AUTOS', 'Auto-svar');
define('_ACA_MENU_COUPONS', 'Kuponer');
define('_ACA_MENU_CRONS', 'Cron opgaver');
define('_ACA_MENU_AUTORSS', 'Auto-RSS');
define('_ACA_MENU_ECARD', 'eKort');
define('_ACA_MENU_POSTCARDS', 'Postkort');
define('_ACA_MENU_PERFS', 'Performances');
define('_ACA_MENU_TAB_LIST', 'Lister');
define('_ACA_MENU_MAILING_TITLE', 'Forsendelser');
define('_ACA_MENU_MAILING', 'Forsendelse af ');
define('_ACA_MENU_STATS', 'Statistik');
define('_ACA_MENU_STATS_FOR', 'Statistik for ');
define('_ACA_MENU_CONF', 'Konfiguration');
define('_ACA_MENU_UPDATE', 'Import');
define('_ACA_MENU_ABOUT', 'Om');
define('_ACA_MENU_LEARN', 'Uddannelsescenter');
define('_ACA_MENU_MEDIA', 'Media administration');
define('_ACA_MENU_HELP', 'Hjælp');
define('_ACA_MENU_CPANEL', 'CPanel');
define('_ACA_MENU_IMPORT', 'Import');
define('_ACA_MENU_EXPORT', 'Export');
define('_ACA_MENU_SUB_ALL', 'Abonner på alle');
define('_ACA_MENU_UNSUB_ALL', 'Afmeld alle');
define('_ACA_MENU_VIEW_ARCHIVE', 'Arkiv');
define('_ACA_MENU_PREVIEW', 'Preview');
define('_ACA_MENU_SEND', 'Send');
define('_ACA_MENU_SEND_TEST', 'Send Test Email');
define('_ACA_MENU_SEND_QUEUE', 'Process kø');
define('_ACA_MENU_VIEW', 'Se');
define('_ACA_MENU_COPY', 'Kopier');
define('_ACA_MENU_VIEW_STATS', 'Se statistik');
define('_ACA_MENU_CRTL_PANEL', ' CPanel');
define('_ACA_MENU_LIST_NEW', ' Opret en liste');
define('_ACA_MENU_LIST_EDIT', ' Ret en liste');
define('_ACA_MENU_BACK', 'Tilbage');
define('_ACA_MENU_INSTALL', 'Installation');
define('_ACA_MENU_TAB_SUM', 'Opsummering');
define('_ACA_STATUS', 'Status');

// messages
define('_ACA_ERROR', ' Der opstod en fejl! ');
define('_ACA_SUB_ACCESS', 'Adgangsrettigheder');
define('_ACA_DESC_CREDITS', 'Credits');
define('_ACA_DESC_INFO', 'Information');
define('_ACA_DESC_HOME', 'Hjemmeside');
define('_ACA_DESC_MAILING', 'Forsendelsesliste');
define('_ACA_DESC_SUBSCRIBERS', 'Modtagere');
define('_ACA_PUBLISHED', 'Udgivet');
define('_ACA_UNPUBLISHED', 'U-udgivet');
define('_ACA_DELETE', 'Slet');
define('_ACA_FILTER', 'Filtrer');
define('_ACA_UPDATE', 'Opdater');
define('_ACA_SAVE', 'Gem');
define('_ACA_CANCEL', 'Slet');
define('_ACA_NAME', 'Navn');
define('_ACA_EMAIL', 'E-mail');
define('_ACA_SELECT', 'Vælg');
define('_ACA_ALL', 'alle');
define('_ACA_SEND_A', 'Send en ');
define('_ACA_SUCCESS_DELETED', ' succesfuldt slettet');
define('_ACA_LIST_ADDED', 'Liste succesfuldt oprettet');
define('_ACA_LIST_COPY', 'Liste succesfuldt kopieret');
define('_ACA_LIST_UPDATED', 'List succesfuldt opdateret');
define('_ACA_MAILING_SAVED', 'Forsendelse succesfuldt gemt.');
define('_ACA_UPDATED_SUCCESSFULLY', 'succesfuldt opdateret.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Abonnentens information');
define('_ACA_VERIFY_INFO', 'Verificer det link du angav, der mangler noget information.');
define('_ACA_INPUT_NAME', 'Navn');
define('_ACA_INPUT_EMAIL', 'Email');
define('_ACA_RECEIVE_HTML', 'Modtag HTML?');
define('_ACA_TIME_ZONE', 'Tidszone');
define('_ACA_BLACK_LIST', 'Spær bruger');
define('_ACA_REGISTRATION_DATE', 'Bruger registreringsdato');
define('_ACA_USER_ID', 'Bruger id');
define('_ACA_DESCRIPTION', 'Beskrivelse');
define('_ACA_ACCOUNT_CONFIRMED', 'Din konto er blevet aktiveret.');
define('_ACA_SUB_SUBSCRIBER', 'Abonnent');
define('_ACA_SUB_PUBLISHER', 'Udgiver');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Registreret');
define('_ACA_SUBSCRIPTIONS', 'Dit abonnement');
define('_ACA_SEND_UNSUBCRIBE', 'Send afmeldingsmeddelelse');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Klik Ja for at sende en afmeld email meddelelse.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Venligst bekræft dit abonnement');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Afmeldingsbekræftelse');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Hej [NAME],<br />' .
		'Bare et trin mere og du vil blive abonnent af listen.  Venligst klik på det følgende link for at bekræftige dine abonnementer.' .
		'<br /><br />[CONFIRM]<br /><br />Hvis der er spørgsmål så kontakt webmasteren.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Denne email bekræftiger at du er blevet afmeldt fra vores liste.  Vi beklager at du besluttede at afmelde men skulle du beslutte at gentilmelde kan du altid gøre det på vore webside.  Skulle du have nogen spørgsmål da kontakt venligst vores webmaster.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Tilmeldingsdato');
define('_ACA_CONFIRMED', 'Bekræfted');
define('_ACA_SUBSCRIB', 'Abonner');
define('_ACA_HTML', 'HTML udsendelser');
define('_ACA_RESULTS', 'Resultater');
define('_ACA_SEL_LIST', 'Vælg en liste');
define('_ACA_SEL_LIST_TYPE', '- Vælg typen af listen -');
define('_ACA_SUSCRIB_LIST', 'Liste over alle abonnenter');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'abonnenter af : ');
define('_ACA_NO_SUSCRIBERS', 'Ingen abonnenter fundet til denne liste.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'En bekræftelses email er blevet sendt til dig.  Venligst check din email og klik på det angivne link.<br />' .
		'Du skal bekræfte din email for at dit abonnement træder i kraft.');
define('_ACA_SUCCESS_ADD_LIST', 'Du er succesfuldt blevet tilføjet til listen.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Klik her for at bekræfte dit abonnement');
define('_ACA_UNSUBSCRIBE_LINK', 'Klik her for at afmelde dig selv fra listen');
define('_ACA_UNSUBSCRIBE_MESS', 'Din email adresse er blevet afmeldt fra listen');

define('_ACA_QUEUE_SENT_SUCCESS', 'Alle planlagte forsendelser er blevet succesfuldt udsendt.');
define('_ACA_MALING_VIEW', 'Se alle forsendelser');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Er du sikker på at du vil afmeldes fra denne liste?');
define('_ACA_MOD_SUBSCRIBE', 'Abonner');
define('_ACA_SUBSCRIBE', 'Abonner');
define('_ACA_UNSUBSCRIBE', 'Afmeld');
define('_ACA_VIEW_ARCHIVE', 'Se arkivet');
define('_ACA_SUBSCRIPTION_OR', ' eller klik her for at opdatere dine informationer');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Denne email adresse er allerede blevet registreret.');
define('_ACA_SUBSCRIBER_DELETED', 'Abonnent succesfuldt slettet.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Bruger kontrolpanel');
define('_UCP_USER_MENU', 'Bruger menu');
define('_UCP_USER_CONTACT', 'Mine abonnementer');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Cron opgave administration');
define('_UCP_CRON_NEW_MENU', 'Ny Cron');
define('_UCP_CRON_LIST_MENU', 'List mine Cron');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Kupon administration');
define('_UCP_COUPON_LIST_MENU', 'Liste over kuponner');
define('_UCP_COUPON_ADD_MENU', 'Tilføj en kupon');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Beskrivelse');
define('_ACA_LIST_T_LAYOUT', 'Layout');
define('_ACA_LIST_T_SUBSCRIPTION', 'Abonnement');
define('_ACA_LIST_T_SENDER', 'Afsender information');

define('_ACA_LIST_TYPE', 'Liste type');
define('_ACA_LIST_NAME', 'Liste navn');
define('_ACA_LIST_ISSUE', 'Hændelse #');
define('_ACA_LIST_DATE', 'Sendt dato');
define('_ACA_LIST_SUB', 'Forsendelsens emne');
define('_ACA_ATTACHED_FILES', 'Vedhæftede filer');
define('_ACA_SELECT_LIST', 'Vælg en liste der skal rettes!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Typen af listen');
define('_ACA_AUTO_RESP_OPTION', 'Auto-svar muligheder');
define('_ACA_AUTO_RESP_FREQ', 'Abonnenterne kan vælge frekvensen');
define('_ACA_AUTO_DELAY', 'Forsinkelse (i dage)');
define('_ACA_AUTO_DAY_MIN', 'Minimum frekvens');
define('_ACA_AUTO_DAY_MAX', 'Maximum frekvens');
define('_ACA_FOLLOW_UP', 'Angiv opfølgende auto-svar');
define('_ACA_AUTO_RESP_TIME', 'Abonnenter kan bestemme tidspunkt');
define('_ACA_LIST_SENDER', 'Liste afsendere');

define('_ACA_LIST_DESC', 'Liste beskrivelser');
define('_ACA_LAYOUT', 'Layout');
define('_ACA_SENDER_NAME', 'Afsender navn');
define('_ACA_SENDER_EMAIL', 'Afsender email');
define('_ACA_SENDER_BOUNCE', 'Afsenderens svar adresse');
define('_ACA_LIST_DELAY', 'Forsinkelse');
define('_ACA_HTML_MAILING', 'HTML forsendelse?');
define('_ACA_HTML_MAILING_DESC', '(hvis du ændrer dette, skal du gemme og komme tilbage til dette skærmbillede for at se ændringerne.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Skjul fra front-end?');
define('_ACA_SELECT_IMPORT_FILE', 'Vælg en fil der skal importeres');;
define('_ACA_IMPORT_FINISHED', 'Import afsluttet');
define('_ACA_DELETION_OFFILE', 'Sletning af fil');
define('_ACA_MANUALLY_DELETE', 'fejlede, du skal slette filen manuelt');
define('_ACA_CANNOT_WRITE_DIR', 'Kan ikke skrive i biblioteket');
define('_ACA_NOT_PUBLISHED', 'Kunne ikke sende forsendelsen, listen er ikke udgivet.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Klik Ja for at udgive listen');
define('_ACA_INFO_LIST_NAME', 'Skriv navnet på din liste her. Du kan identificere listen med dette navn.');
define('_ACA_INFO_LIST_DESC', 'Indtast en kort beskrivelse af din liste her. Denne beskrivelse vil være synlig for gæster på din webside.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Indtast navnet på afsenderen af brevet. Dette navn vil være synligt når abonnenterne modtager meddelelser fra denne liste.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Skriv den email adresse som meddelelsen skal sendes fra.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Skriv den email adresse hvor bruger kan svare til. Det anbefales at det er den samme som afsenderen af emailen, da spam filtere vil give din meddelelse en højere spam ranking hvis de er forskellige.');
define('_ACA_INFO_LIST_AUTORESP', 'Vælg typen af forsendelser på denne liste. <br />' .
		'Nyhedsbrev: normalt nyhedsbrev<br />' .
		'Auto-svar: en auto-svar er en liste som sendes automatisk gennnem websiden på en fast interval.');
define('_ACA_INFO_LIST_FREQUENCY', 'Tillad brugerne at vælge hvor ofte de vil modtage fra listen.  Det giver mere fleksibilitet for brugeren.');
define('_ACA_INFO_LIST_TIME', 'Lad brugeren vælge deres foretrukne tid på dagen for at modtage denne liste.');
define('_ACA_INFO_LIST_MIN_DAY', 'Definer hvad der er den mindste frekvens en bruger kan vælge at modtage fra listen');
define('_ACA_INFO_LIST_DELAY', 'Angiv en forsinkelse mellem denne auto-svar og den forrige.');
define('_ACA_INFO_LIST_DATE', 'Angiv datoen hvor nyhedslisten skal udgives, hvis du vil forsinke udgivelsen. <br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Definer hvad der er den maksimale frekvens en bruger kan vælge at modtage fra listen');
define('_ACA_INFO_LIST_LAYOUT', 'Angiv layout for din forsendelseliste her. Du kan angive et hvilket som helst layout for din forsendelse her.');
define('_ACA_INFO_LIST_SUB_MESS', 'Denne meddelelse vil blive sendt til abonnenten når han eller hun registreres første gang. Du kan skrive lige den tekst du vil have her.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Denne meddelelse vil blive sendt til abonnenten når han eller hun afmelder. En hvilken som helst tekst kan indtastes her.');
define('_ACA_INFO_LIST_HTML', 'Vælg afkrydsningsboxen hvis du ønsker at sende en HTML udsendelse. Abonnenter vil have mulighed for at angive hvis de ønsker at modtage HTML meddelelsen HTML, eller kun tekst meddelelsen når de abonnerer på en HTML liste.');
define('_ACA_INFO_LIST_HIDDEN', 'Klik Ja for at skjule listen fra front-end, brugerne vil ikke have mulighed for at abonnere men du vil stadig have mulighed for at sende udsendelsen.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Vil du have at brugerne automatisk tilmeldes til denne liste?<br /><B>Nye brugere:</B> vil registrere alle nye brugere der registrer sig på websiden.<br /><B>Alle brugere:</B> vil registre alle brugere der er registreret i databasen.<br />(alle disse funktioner understøtter Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Vælg front-end adgangsniveauet. Dette vil vise elle skjule udsendelsen for brugergrupper der ikke har adgang til den, så de ikke har mulighed for at abonnere på den.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Vælg adgangsniveauet for den brugergruppe du ønsker skal kunne rette. Denne brugegruppe og overliggende vil kunne rette forsendelserne og sende dem ud, enten fra front-end eller back-end.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Hvis du ønsker at auto-svaret skal flytte til en anden når den når til den sidste meddelelse kan du angive den efterfølgnede auto-svar her.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Dette er ID\'et for den person som oprettede listen.');
define('_ACA_INFO_LIST_WARNING', '   Denne sidste mulighed er kun tilgængelig en gang når listen oprettes.');
define('_ACA_INFO_LIST_SUBJET', ' Emnet for brevet.  Dette er emnet på den email som abonnenten vil modtage.');
define('_ACA_INFO_MAILING_CONTENT', 'Det er hoveddelen af den email du ønsker at sende.');
define('_ACA_INFO_MAILING_NOHTML', 'Indtast hoveddelen af den email du ønsker at sende til abonnenter der vælger kun at modtage ikke-HTML forsendelser. <BR/> NOTE: hvis du lader den være blank vil jNews automatisk konvertere HTML teksten til ren tekst.');
define('_ACA_INFO_MAILING_VISIBLE', 'Klik Ja for at vise forsendelsen i front-end.');
define('_ACA_INSERT_CONTENT', 'Indsæt eksisterende indhold');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Kupon sendt succesfuldt!');
define('_ACA_CHOOSE_COUPON', 'Vælg en kupon');
define('_ACA_TO_USER', ' til denne bruger');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Hver time');
define('_ACA_FREQ_CH2', 'Hver 6 time');
define('_ACA_FREQ_CH3', 'Hver 12 time');
define('_ACA_FREQ_CH4', 'Dagligt');
define('_ACA_FREQ_CH5', 'Ugentligt');
define('_ACA_FREQ_CH6', 'Månedslig');
define('_ACA_FREQ_NONE', 'Ingen');
define('_ACA_FREQ_NEW', 'Nye brugere');
define('_ACA_FREQ_ALL', 'Alle brugere');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews Cron?');
define('_ACA_LABEL_FREQ_TIPS', 'Klik Ja hvis du ønsker at bruge denne til en Acajomm Cron, Nej for en anden cron opgave.<br />' .
		'Hvis du klikker Ja behøver du ikke angive Cron adressen, den vil automatisk blive tilføjet.');
define('_ACA_SITE_URL', 'Din websides URL');
define('_ACA_CRON_FREQUENCY', 'Cron Frekvens');
define('_ACA_STARTDATE_FREQ', 'Start dato');
define('_ACA_LABELDATE_FREQ', 'Angiv dato');
define('_ACA_LABELTIME_FREQ', 'Angiv tid');
define('_ACA_CRON_URL', 'Cron URL');
define('_ACA_CRON_FREQ', 'Frekvens');
define('_ACA_TITLE_CRONLIST', 'Cron List');
define('_NEW_LIST', 'Opret en ny liste');

//title CRON form
define('_ACA_TITLE_FREQ', 'Ret Cron');
define('_ACA_CRON_SITE_URL', 'Indtast en gyldig webside URL, startende med http://');

### Mailings ###
define('_ACA_MAILING_ALL', 'Alle forsendelser');
define('_ACA_EDIT_A', 'Ret en ');
define('_ACA_SELCT_MAILING', 'Vælg en liste i rullemenuen for at kunne tilføje en ny forsendelse.');
define('_ACA_VISIBLE_FRONT', 'Synlig i front-end');

// mailer
define('_ACA_SUBJECT', 'Emne');
define('_ACA_CONTENT', 'Indhold');
define('_ACA_NAMEREP', '[NAME] = Dette vil blive erstattet med det navn abonnenten har indtastet, du vil sende personaliserede email når du bruger denne.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Dette vil blive erstattet med det FØRSTE navn som abonnenten har indtastet.<br />');
define('_ACA_NONHTML', 'Ikke-HTML version');
define('_ACA_ATTACHMENTS', 'Vedhæftninger');
define('_ACA_SELECT_MULTIPLE', 'Hold control (eller ctrl) for at vælge flere vedhæftninger.<br />' .
		'De viste filer i denne vedhæftningsliste er placeret i vedhæftningsfolderen, du kan ændre denne placering i kofigurationspanelet.');
define('_ACA_CONTENT_ITEM', 'Indholdsdokument');
define('_ACA_SENDING_EMAIL', 'Afsender email');
define('_ACA_MESSAGE_NOT', 'Meddelelsen kunne ikke sendes');
define('_ACA_MAILER_ERROR', 'Udsendelses fejl');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Meddelelse sendt succesfuldt');
define('_ACA_SENDING_TOOK', 'Afsendelsen af denne forsendelse tog');
define('_ACA_SECONDS', 'sekunder');
define('_ACA_NO_ADDRESS_ENTERED', 'Ingen email adressse eller modtager angivet');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Ændre');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Ændre dit abonnement');
define('_ACA_WHICH_EMAIL_TEST', 'Angiv den email adresse der sendes en test til eller vælg forevisning');
define('_ACA_SEND_IN_HTML', 'Send i HTML (for HTML udsendelser)?');
define('_ACA_VISIBLE', 'Synlig');
define('_ACA_INTRO_ONLY', 'Kun introduktionen');

// stats
define('_ACA_GLOBALSTATS', 'Global statistik');
define('_ACA_DETAILED_STATS', 'Detaljeret statistik');
define('_ACA_MAILING_LIST_DETAILS', 'Liste detaljer');
define('_ACA_SEND_IN_HTML_FORMAT', 'Sendt i HTML format');
define('_ACA_VIEWS_FROM_HTML', 'Visninger (fra HTML forsendelse)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Send i tekstformat');
define('_ACA_HTML_READ', 'HTML læst');
define('_ACA_HTML_UNREAD', 'HTML ulæst');
define('_ACA_TEXT_ONLY_SENT', 'Kun tekst');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Mail');
define('_ACA_LOGGING_CONFIG', 'Logs & Statistikker');
define('_ACA_SUBSCRIBER_CONFIG', 'Abonnenter');
define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_MISC_CONFIG', 'Diverse');
define('_ACA_MAIL_SETTINGS', 'Brev opsætning');
define('_ACA_MAILINGS_SETTINGS', 'Forsendelses opsætning');
define('_ACA_SUBCRIBERS_SETTINGS', 'Abonnements opsætning');
define('_ACA_CRON_SETTINGS', 'Cron Settings');
define('_ACA_SENDING_SETTINGS', 'Afsendelses opsætning');
define('_ACA_STATS_SETTINGS', 'Statistik opsætning');
define('_ACA_LOGS_SETTINGS', 'Logs Settings');
define('_ACA_MISC_SETTINGS', 'Diverse opsætninger');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Afsender Email');
define('_ACA_SEND_MAIL_NAME', 'Afsender navn');
define('_ACA_MAILSENDMETHOD', 'Afsendelses metode');
define('_ACA_SENDMAILPATH', 'Sendmail sti');
define('_ACA_SMTPHOST', 'SMTP host');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP identifikation kræves');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Vælg Ja hvis din SMTP server kræver identifikation');
define('_ACA_SMTPUSERNAME', 'SMTP brugernavn');
define('_ACA_SMTPUSERNAME_TIPS', 'Indtast SMTP brugernavnet når din SMTP server kræver identifikation');
define('_ACA_SMTPPASSWORD', 'SMTP kodeord');
define('_ACA_SMTPPASSWORD_TIPS', 'Indtast SMTP kodeordet når din SMTP server kræver identifikation');
define('_ACA_USE_EMBEDDED', 'Brug indlejrede billeder');
define('_ACA_USE_EMBEDDED_TIPS', 'Vælg Ja hvis billederne i det vedhæftede indholdsdokument skal være indlejret i emailen ved HTML meddelelser, eller Nej for at bruge standard billed afmærkninger som linker til billederne på websiden.');
define('_ACA_UPLOAD_PATH', 'Upload/vedhæftnings sti');
define('_ACA_UPLOAD_PATH_TIPS', 'Du kan angive et upload bibliotek.<br />' .
		'Kontroller at biblioteket du angiver eksisterer, ellers opret det.');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Tillad uregistrerede');
define('_ACA_ALLOW_UNREG_TIPS', 'Vælg Ja hvis du vil tillade brugere at abonnere på lister uden at være registrerede brugere på websiden.');
define('_ACA_REQ_CONFIRM', 'Kræv bekræftelse');
define('_ACA_REQ_CONFIRM_TIPS', 'Vælg Ja hvis du kræver at uregistrerede abonnenter bekræfter deres email adresse.');
define('_ACA_SUB_SETTINGS', 'Abonnerings opsætning');
define('_ACA_SUBMESSAGE', 'Abonnerings email');
define('_ACA_SUBSCRIBE_LIST', 'Abonner på en liste');

define('_ACA_USABLE_TAGS', 'Brugbare markeringer');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Denne opretter et link hvor abonnenten kan bekræfte sine abonnementer. Denne er <strong>krævet</strong> for at få jNews til at fungere korrekt.<br />'
.'<br />[NAME] = Denne vil blive erstattet med navnet på abonnenten, du vil derved sende personaliserede emails ved brug af denne.<br />'
.'<br />[FIRSTNAME] = Dette vil blive erstattet af FORNAVNET på abonnenten, fornavnet er defineret som det første navn indtastet af abonnenten.<br />');
define('_ACA_CONFIRMFROMNAME', 'Bekræft AFSENDER navnet');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Indtast det afsender navn der vises på bekræftelses listen.');
define('_ACA_CONFIRMFROMEMAIL', 'Bekræft AFSENDER email');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Indtast den afsender email adresse der vises på bekræftelses listen.');
define('_ACA_CONFIRMBOUNCE', 'Retur adressen');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Indtast retur adressen som vises på bekræftelseslisten.');
define('_ACA_HTML_CONFIRM', 'HTML bekræftelse');
define('_ACA_HTML_CONFIRM_TIPS', 'Vælg Ja hvis bekræftelses listen skal være HTML hvis brugeren tillader HTML.');
define('_ACA_TIME_ZONE_ASK', 'Spørg om tidszone');
define('_ACA_TIME_ZONE_TIPS', 'Vælg Ja hvis du ønsker at spørge om brugerens tidzone. De ventende forsendelser vil blive sendt på baggrund af tidszone hvis muligt');

 // Cron Set up
define('_ACA_TIME_OFFSET_URL', 'klik her for at sætte offset i det globale konfigurations panel -> Lokal tab');
define('_ACA_TIME_OFFSET_TIPS', 'Sæt din servers tids offset så de registrede datoer og tider er eksakte');
define('_ACA_TIME_OFFSET', 'Tids offset');
define('_ACA_CRON_TITLE', 'Opsætning af cron funktion');
define('_ACA_CRON_DESC', '<br />Ved brug af cron funktionen kan du oprette en automatisk opgave på din Joomla webside!<br />' .
		'For at oprette den skal du tilføje følgende kommando i dit crontab kontrolpanel:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Hvis du har brug for hjælp til at sætte op eller har problemer så konsulter vores forum <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');
// sending settings
define('_ACA_PAUSEX', 'Pause x sekunder for hvert konfigureret antal emails');
define('_ACA_PAUSEX_TIPS', 'Indtast antallet af sekunder som jNews vil give SMTP serveren til at sende meddelelserne før der fortsættes med det næste konfigurered antal meddelelser.');
define('_ACA_EMAIL_BET_PAUSE', 'Emails mellem pauser');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Antallet af emails der sendes før der holdes pause.');
define('_ACA_WAIT_USER_PAUSE', 'Vent for bruger input under pausen');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Hvad enten scriptet skal vente på bruger input når der er pause mellem et sæt forsendelser.');
define('_ACA_SCRIPT_TIMEOUT', 'Script timeout');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Antallet af minutter scriptet skal kunne køre (0 for uendeligt).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Aktiver læse statistik');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Vælg Ja hvis du ønsker at logge antallet af visninger. Denne teknik kan kun bruges ved HTML forsendelser');
define('_ACA_LOG_VIEWSPERSUB', 'Log visninger per abonnent');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Vælg Ja hvis du vil logge antallet af visninger per abonnent. Denne teknik kan kun bruges ved HTML forsendelser');
// Logs settings
define('_ACA_DETAILED', 'Detaljerede logs');
define('_ACA_SIMPLE', 'Simple logs');
define('_ACA_DIAPLAY_LOG', 'Vis logs');
define('_ACA_DISPLAY_LOG_TIPS', 'Vælg Ja hvis du vil vise logs mens forsendelser sendes.');
define('_ACA_SEND_PERF_DATA', 'Afsendelses ydelsen');
define('_ACA_SEND_PERF_DATA_TIPS', 'Vælg Ja hvis du ønsker at tillade jNews at sende ANONYME rapporter om din konfiguration, antallet af abonnementer på en liste og tiden det tog at sende forsendelsen. Dette vil give os en ide om jNews ydelsen og vil HJÆLPE OS	med at forbedre jNews i den fremtidige udvikling.');
define('_ACA_SEND_AUTO_LOG', 'Send log over auto-svar');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Vælg Ja hvis du ønsker at sende en email log hvoer gang en kø er behandlet.  ADVARSEL: dette kan resultere i en stor mængde emails.');
define('_ACA_SEND_LOG', 'Send loggen');
define('_ACA_SEND_LOG_TIPS', 'Hvad enten en log over forsendelsen skal blive sendt til email adressen på brugeren der sendte forsendelsen.');
define('_ACA_SEND_LOGDETAIL', 'Send log detailer');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Detailjeret indeholder succes eller fejl information for hver enkelt abonnent og et overblik over informationen. Simpel sender kun overblikket.');
define('_ACA_SEND_LOGCLOSED', 'Send log hvis forbindelsen er lukket');
define('_ACA_SEND_LOGCLOSED_TIPS', ' Med dette valg hos brugeren, der sender forsendelsen, vil der stadig blive modtaget en rapport via email.');
define('_ACA_SAVE_LOG', 'Gem loggen');
define('_ACA_SAVE_LOG_TIPS', 'Om en log over en forsendels bliver tilføjet til logfilen eller ej.');
define('_ACA_SAVE_LOGDETAIL', 'Gem detaljeret log');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Detailjeret indeholder succes eller fejl information for hver enkelt abonnent og et overblik over informationen. Simpel gemmer kun overblikket.');
define('_ACA_SAVE_LOGFILE', 'Gem logfilen');
define('_ACA_SAVE_LOGFILE_TIPS', 'Filen til hvilken log informationen tilføjes. Denne fil kan blive ganske stor.');
define('_ACA_CLEAR_LOG', 'Slet loggen');
define('_ACA_CLEAR_LOG_TIPS', 'Sletter logfilen.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Sidst udførte kø');
define('_ACA_CP_TOTAL', 'Totalt');
define('_ACA_MAILING_COPY', 'Forsendelsen kopieret succesfuldt!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Vis guide');
define('_ACA_SHOW_GUIDE_TIPS', 'Viser guidelines i begyndelsen til at hjælpe nye brugere med at oprette et nyhedsbrev, en auto-responder og sætte jNews korrekt op.');
define('_ACA_AUTOS_ON', 'Brug Auto-svar');
define('_ACA_AUTOS_ON_TIPS', 'Vælg Nej hvis du ikke vil bruge Auto-svar, så vil alle auto-svar valgmulighederne blive deaktiveret.');
define('_ACA_NEWS_ON', 'Brug nyhedsbreve');
define('_ACA_NEWS_ON_TIPS', 'Vælg Nej hvis du ikke ønsker at bruge nyhedsbreve, så vil alle valgmulighederne for nyhedsbreve blive deaktiveret.');
define('_ACA_SHOW_TIPS', 'Vis tips');
define('_ACA_SHOW_TIPS_TIPS', 'Vis tips for at hjælpe brugerene til at bruge jNews mere effektivt.');
define('_ACA_SHOW_FOOTER', 'Vis sidebunden');
define('_ACA_SHOW_FOOTER_TIPS', 'Om sidebunden med copyright beskeden vil blive vist eller ej.');
define('_ACA_SHOW_LISTS', 'Vis lister i front-end');
define('_ACA_SHOW_LISTS_TIPS', 'Når en bruger ikke er registreret vises en liste over lister som de kan abonnere på med arkiv knap for nyhedsbreve eller en login formular så de kan registrere sig.');
define('_ACA_CONFIG_UPDATED', 'Konfigurationsdetaljerne er blevet opdateret!');
define('_ACA_UPDATE_URL', 'Opdater URL');
define('_ACA_UPDATE_URL_WARNING', 'ADVARSEL! Ændrer ikke denne URL medmindre du er blevet bedt om at gøre det af det tekniske team fra jNews.<br />');
define('_ACA_UPDATE_URL_TIPS', 'For eksempel: http://www.ijoobi.com/update/ (inkluder den afsluttende skråstreg)');

// module
define('_ACA_EMAIL_INVALID', 'Den indtastede email er ukorrekt.');
define('_ACA_REGISTER_REQUIRED', 'Venligst registrer til websiden før du kan vælge en liste.');

// Access level box
define('_ACA_OWNER', 'Ejeren af listen:');
define('_ACA_ACCESS_LEVEL', 'Sæt adgangsniveau for listen');
define('_ACA_ACCESS_LEVEL_OPTION', 'Adgangsniveau mulighederne');
define('_ACA_USER_LEVEL_EDIT', 'Vælg hvilket brugerniveau der kræves for at rette en forsendelse (enten fra front-end eller back-end) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Dagligt');
define('_ACA_AUTO_DAY_CH2', 'Dagligt  ikke weekend');
define('_ACA_AUTO_DAY_CH3', 'Hver anden dag');
define('_ACA_AUTO_DAY_CH4', 'Hver anden dag ikke weekend');
define('_ACA_AUTO_DAY_CH5', 'Ugentligt');
define('_ACA_AUTO_DAY_CH6', 'Hver anden uge');
define('_ACA_AUTO_DAY_CH7', 'Månedslig');
define('_ACA_AUTO_DAY_CH9', 'Årligt');
define('_ACA_AUTO_OPTION_NONE', 'Ingen');
define('_ACA_AUTO_OPTION_NEW', 'Nye brugere');
define('_ACA_AUTO_OPTION_ALL', 'Alle brugere');

//
define('_ACA_UNSUB_MESSAGE', 'Afmeld email');
define('_ACA_UNSUB_SETTINGS', 'Afmeldings opsætning');
define('_ACA_AUTO_ADD_NEW_USERS', 'Automatisk abonner brugere?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Der er iøjeblikket ikke nogen opdatering tilgængelig.');
define('_ACA_VERSION', 'jNews Version');
define('_ACA_NEED_UPDATED', 'Filer der skal opdateres:');
define('_ACA_NEED_ADDED', 'Filer der skal tilføjes:');
define('_ACA_NEED_REMOVED', 'Filer der skal slettes:');
define('_ACA_FILENAME', 'Filenavn:');
define('_ACA_CURRENT_VERSION', 'Nuværende version:');
define('_ACA_NEWEST_VERSION', 'Nyeste version:');
define('_ACA_UPDATING', 'Opdaterer');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Filerne er blevet succesfuldt opdateret.');
define('_ACA_UPDATE_FAILED', 'Opdatering fejlede!');
define('_ACA_ADDING', 'Tilføjer');
define('_ACA_ADDED_SUCCESSFULLY', 'Tilføjet succesfuldt.');
define('_ACA_ADDING_FAILED', 'Tilføjelse fejlede!');
define('_ACA_REMOVING', 'Fjerner');
define('_ACA_REMOVED_SUCCESSFULLY', 'Fjernet succesfuldt.');
define('_ACA_REMOVING_FAILED', 'Sletning fejlet!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Installer en anden version');
define('_ACA_CONTENT_ADD', 'Tilføj sideindhold');
define('_ACA_UPGRADE_FROM', 'Importer data (nyhedsbreve og abonnenters information) fra ');
define('_ACA_UPGRADE_MESS', 'Der er ingen risiko for dine eksisterende data. <br /> Denne process vil simpelthen importere dataene i jNews databasen.');
define('_ACA_CONTINUE_SENDING', 'Fortsæt afsendelse');

// jNews message
define('_ACA_UPGRADE1', 'Du kan let importere dine brugere og nyhedsbreve fra ');
define('_ACA_UPGRADE2', ' til jNews i opdaterings panelet.');
define('_ACA_UPDATE_MESSAGE', 'En ny version af jNews er tilgængelig! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Klik her for at opdatere!');
define('_ACA_CRON_SETUP', 'For at auto-svarene kan sendes skal du oprette en cron opgave.');
define('_ACA_THANKYOU', 'Tak fordi du valgte jNews, Din kommunikations partner!');
define('_ACA_NO_SERVER', 'Opdaterings server er ikke tilgængelig, venligst check igen senere.');
define('_ACA_MOD_PUB', 'jNews module er ikke udgivet.');
define('_ACA_MOD_PUB_LINK', 'Klik her for at udgive det!');
define('_ACA_IMPORT_SUCCESS', 'succesfuldt importeret');
define('_ACA_IMPORT_EXIST', 'abonnent allerede i database');

// jNews\'s Guide
define('_ACA_GUIDE', '\'s Wizard');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews har mange gode faciliteter og denne wizard til at guide dig gennem en simpel fire trins process til at få dig igang med at sende dine nyhedsbreve og auto-svar!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Først, skal du tilføje en liste.  En liste kan være af to forskellige typer, enten et nyhedsbrev eller en auto-svar.' .
		'  I listen definerer du alle de forskellige parametre for at aktivere afsendelsen af dit nyhedsbrev eller auto-svar: afsendernavn, layout, abonnenternes velkomst meddelelse, etc...
<br /><br />Du kan oprette din første liste  her: <a href="index2.php?option=com_jnewsletter&act=list" >Opret en liste</a> og klik på Ny knappen.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews giver dig en let måde at importere alle data fra et tidligere nyhedsbrevssystem.<br />' .
		' Gå til opdaterings panelet og vælg dit tidligere nyhedsbrevssystem for at importere all dine nyhedsbreve og abonnenter.<br /><br />' .
		'<span style="color:#FF5E00;" >VIGTIGT: importen er risikofri og påvirker ikke på nogen måde data i dit tidligere nyhedsbrevsystem</span><br />' .
		'Efter importen vil du kunne administre abonnenter og forsendelser direkte i jNews.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Godt din første liste er oprettet!  Du kan nu skrive dit første %s.  For at oprette det gå til: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Auto-svar administration');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Nyhedsbrevs administration');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' og vælg din %s. <br /> Derefter vælger du %s i drop down listen.  Opret din første forsendelse ved at klikke Ny ');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Før du sender dit første nyhedsbrev vil du måske checke mail konfigurationen.  ' .
		'Gå til <a href="index2.php?option=com_jnewsletter&act=configuration" >konfigurationssiden</a> for at kontrollere mail opsætningen. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Når du er klar til at gå tilbage til Nyhedsbrev menuen, vælg da dit brev og klik send');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'For at dit auto-svar kan sendes skal du først oprette en cron opgave på din server. ' .
		' Venligst benyt Cron fanebladet i kontrolpanelet.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >klik her</a> for at lære hvordan man opretter en cron opgave. <br />');

define('_ACA_GUIDE_MODULE', ' <br />Kontroller at du har publiceret jNews modulet så brugerne kan tilmelde sig listen.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Du kan nu også oprette et auto-svar.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Du kan nu også oprette et nyhedsbrev.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Flot! Nu er du klar til effektivt at kommunikere med dine besøgende og brugere. Denne wizard vil blive afsluttet så snart du har indtastet din anden forsendelse eller du slå den fra i <a href="index2.php?option=com_jnewsletter&act=configuration" >konfigurations panelet</a>.' .
		'<br /><br />  Hvis du har nogle spørgsmål når du bruger jNews, så kontakt venligst vores ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >forum</a>. ' .
		' Du kan også finde en mængde information om hvordan man effektivt kommunikerer med sine abonnenter på <a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a>.' .
		'<p /><br /><b>Tak fordi du bruger jNews. Din kommunications partner!</b> ');
define('_ACA_GUIDE_TURNOFF', 'Wizarden er nu slået fra!');
define('_ACA_STEP', 'TRIN ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews konfiguration');
define('_ACA_INSTALL_SUCCESS', 'Succesfuldt Installeret');
define('_ACA_INSTALL_ERROR', 'Installations fejl');
define('_ACA_INSTALL_BOT', 'jNews Plugin (Bot)');
define('_ACA_INSTALL_MODULE', 'jNews modul');
//Others
define('_ACA_JAVASCRIPT', '!Advarsel! Javascript skal være aktiveret for korrekt funktion.');
define('_ACA_EXPORT_TEXT', 'De abonnenter der er eksporteret er baseret på den liste du valgte. <br />Export abonnenter for liste');
define('_ACA_IMPORT_TIPS', 'Import subscribers. The information in the file need to be to the following format: <br />' .
		'Name,email,receiveHTML(0/1),<span style="color: rgb(255, 0, 0);">confirmed(0/1)</span>');
define('_ACA_SUBCRIBER_EXIT', 'er allerede en abonnent');
define('_ACA_GET_STARTED', 'Klik her for at komme igang!');

//News since 1.0.1
define('_ACA_WARNING_1011', 'Advarsel: 1011: Opdatering vil ikke fungere på grund af din servers begrænsninger.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Vælg den email adresse der vil blive vist som afsender.');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Vælg det navn der vil blive vist som afsender.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Vælg den afsendelsesfunktion du ønsker at bruge: PHP mail, <span>Sendmail</span> eller SMTP server.');
define('_ACA_SENDMAILPATH_TIPS', 'Dette er biblioteket på mail serveren');
define('_ACA_LIST_T_TEMPLATE', 'Skabelon');
define('_ACA_NO_MAILING_ENTERED', 'Ingen forsendelser udvalgt');
define('_ACA_NO_LIST_ENTERED', 'Ingen liste udvalgt');
define('_ACA_SENT_MAILING', 'Afsendte forsendelser');
define('_ACA_SELECT_FILE', 'Vælg venligst en fil til ');
define('_ACA_LIST_IMPORT', 'Marker de lister du ønsker abonnenterne tilknyttet til.');
define('_ACA_PB_QUEUE', 'Abonnent oprettet men problem med at forbinde ham/hende med listerne. Vælg dem venligst manuelt.');
define('_ACA_UPDATE_MESS', '');
define('_ACA_UPDATE_MESS1', 'Opdatering kraftigt anbefalet!');
define('_ACA_UPDATE_MESS2', 'Rettelse og små fixes.');
define('_ACA_UPDATE_MESS3', 'Ny udgave.');
define('_ACA_UPDATE_MESS5', 'Joomla 1.5 er krævet for at opdatere.');
define('_ACA_UPDATE_IS_AVAIL', ' er tilgængelig!');
define('_ACA_NO_MAILING_SENT', 'Ingen forsendelser afsendt!');
define('_ACA_SHOW_LOGIN', 'Vis login formular');
define('_ACA_SHOW_LOGIN_TIPS', 'Vælg Ja for at vise en login formular i jNews front-end kontrolpanelet så brugeren kan registrere sig til websiden.');
define('_ACA_LISTS_EDITOR', 'List Description Editor');
define('_ACA_LISTS_EDITOR_TIPS', 'Vælg Ja for at bruge en HTML editor til at rette i listens beskrivelses felt.');
define('_ACA_SUBCRIBERS_VIEW', 'Vis abonnenter');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', 'Front-end opsætning');
define('_ACA_SHOW_LOGOUT', 'Vis logout knap');
define('_ACA_SHOW_LOGOUT_TIPS', 'Vælg Ja for at vise logout knappen i jNews front-end kontrolpanelet.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integration');
define('_ACA_CB_INTEGRATION', 'Community Builder Integration');
define('_ACA_INSTALL_PLUGIN', 'Community Builder Plugin (jNews Integration) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'jNews Plugin for Community Builder er ikke installeret endnu!');
define('_ACA_CB_PLUGIN', 'Lister ved registringen');
define('_ACA_CB_PLUGIN_TIPS', 'Vælg Ja for at vise forsendelseslisten i Community Builder registreringsformularen');
define('_ACA_CB_LISTS', 'List ID');
define('_ACA_CB_LISTS_TIPS', 'DETTE ER ET PÅKRÆVET FELT. Indtast ID nummeret på den liste du ønsker at tillade brugerne at abonnere på adskildt med komma ,  (0 = vis alle listerne)');
define('_ACA_CB_INTRO', 'Introduktions tekst');
define('_ACA_CB_INTRO_TIPS', 'En tekst der vil fremkomme før oversikten. LAD DEN VÆRE BLANK FOR IKKE AT VISE NOGET.  Du kan bruge HTML tags til at tilrette udseendet.');
define('_ACA_CB_SHOW_NAME', 'Vis liste navn');
define('_ACA_CB_SHOW_NAME_TIPS', 'Vælg om navnet på listen vises eller ej efter introduktionen.');
define('_ACA_CB_LIST_DEFAULT', 'Marker listen som standard');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Vælg om afkrydsningsboxen for hver enkelt liste er markeret som standard eller ej.');
define('_ACA_CB_HTML_SHOW', 'Vis modtag HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'Sæt til Ja for at tillade brugere at vælge om de vil have HTML emails eller ej. Sæt til Nej for at bruge standard Modtag HTML.');
define('_ACA_CB_HTML_DEFAULT', 'Standard Modtag HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Sæt denne valgmulighed for vise standard HTML forsendelses konfigurationen. Hvis Vis modtag HTML er sat til Nej så vil denne valgmulighed være standard.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'Kunne ikke sikkerhedskopiere filen! Filen blev ikke erstattet.');
define('_ACA_BACKUP_YOUR_FILES', 'Den gamle versio af filerne er blevet sikkerhedskopiere ind i følgende bibliotek:');
define('_ACA_SERVER_LOCAL_TIME', 'Server lokal tid');
define('_ACA_SHOW_ARCHIVE', 'Vis arkiv knap');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Vælg Ja for at vise en arkiv knap i front-end på Nyhedsbrev listen');
define('_ACA_LIST_OPT_TAG', 'Tags');
define('_ACA_LIST_OPT_IMG', 'Billeder');
define('_ACA_LIST_OPT_CTT', 'Indhold');
define('_ACA_INPUT_NAME_TIPS', 'Indtast hele dit navn (fornavn først)');
define('_ACA_INPUT_EMAIL_TIPS', 'Indtast din email adresse (Vær sikker på at dette er en gyldig email adresse hvis du vil modtage vores forsendelser.)');
define('_ACA_RECEIVE_HTML_TIPS', 'Vælg Ja hvis du ønsker at modtage HTML forsendelser - Ikke at modtage kun tekst forsendelser');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Angiv din tidszone.');

// Since 1.0.5
define('_ACA_FILES', 'Filer');
define('_ACA_FILES_UPLOAD', 'Upload');
define('_ACA_MENU_UPLOAD_IMG', 'Upload billeder');
define('_ACA_TOO_LARGE', 'Fil størrelsen er for stor. Den maksimalt tilladte størrelse er');
define('_ACA_MISSING_DIR', 'Destinations biblioteket findes ikke');
define('_ACA_IS_NOT_DIR', 'Destinations bibliotektet findes ikke eller er ikke en regulær fil.');
define('_ACA_NO_WRITE_PERMS', 'Der er ikke skrive rettigheder i destinations biblioteket.');
define('_ACA_NO_USER_FILE', 'Du har ikke valgt nogen fil at uploade.');
define('_ACA_E_FAIL_MOVE', 'Umuligt at flytte filen.');
define('_ACA_FILE_EXISTS', 'Destinations filen findes allerede.');
define('_ACA_CANNOT_OVERWRITE', 'Destinations filen findes allerede og kunne ikke overskrives.');
define('_ACA_NOT_ALLOWED_EXTENSION', 'Fil extention er ikke tilladt.');
define('_ACA_PARTIAL', 'Filen blev kun delvist uploaded.');
define('_ACA_UPLOAD_ERROR', 'Upload fejl:');
define('DEV_NO_DEF_FILE', 'Filen blev kun delvist uploaded.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Dette vil blive erstattet med abonnement links.' .
		' Dette er <strong>krævet</strong> for at jNews kan fungere korrekt.<br />' .
		'Hvis du andet indhold i denne box vildet blive vist i alle forsendelser som hører til denne liste.' .
		' <br />Tilføj din abonnements besked i slutningen.  jNews vil automatisk tilføje en link til abonnenten så de kan ændre deres information og en link til afmelding fra listen.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Notification');
// shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Notificationer');
define('_ACA_USE_SEF', 'SEF i forsendelser');
define('_ACA_USE_SEF_TIPS', 'Det anbefales at du vælger Nej.  Hvis du ønsker URLen inkluderet i din forsendelse for at bruge SEF da vælg Ja.' .
		' <br /><b>Linkene vil fungere på samme måde uanset hviken du vælger.  Nej vil sikre at links i forsendelser altid vil fungere selv hvis du ændrer din SEF.</b> ');
define('_ACA_ERR_NB', 'Fejl #: ERR');
define('_ACA_ERR_SETTINGS', 'Fejlhåndterings opsætning');
define('_ACA_ERR_SEND', 'Send fejlrapport');
define('_ACA_ERR_SEND_TIPS', 'Hvis du vil have jNews til at blive et bedre produkt så vælg venligst Ja.  Det vil sende os en fejlrapport.  Så du behøver ikke engang at rapportere fejl mere ;-) <br /> <b>INGEN PRIVATE INFORMATIONER BLIVER SENDT</b>.  Vi vil end ikke vide fra hvilken webside fejlen er sendt fra. Vi sender kun informationer om jNews, PHP opsætningen og SQL forespørgsler. ');
define('_ACA_ERR_SHOW_TIPS', 'Vælg Ja for at vise antallet af fejl på skærmen.  Primært anvendt for at kunne debuging løsningen. ');
define('_ACA_ERR_SHOW', 'Vis fejl');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Vis afmeldings links');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Vælg Ja for at vise afmeldings links i bunde af forsendelsen så brugerne kan ændre deres abonnementer. <br /> Nej vil slå sidefoden og links fra.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">VIGTIG BEMÆRKNING!</span> <br />Hvis du opgraderer fra en tidligere jNews installation skal du opgradere din database struktur ved at klikke på følgende knap (Dine data vil forblive uændret)');
define('_ACA_UPDATE_INSTALL_BTN', 'Opgrader tabeller og konfiguration');
define('_ACA_MAILING_MAX_TIME', 'Maks. kø tid');
define('_ACA_MAILING_MAX_TIME_TIPS', 'Definer den maksimale tid for hver sæt af emails der sendes af køen. Anbefales mellem 30 sek og 2 min.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart Integration');
define('_ACA_VM_COUPON_NOTIF', 'Kupon notifications ID');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Angiv ID nummeret på den forsendelse du ønsker at bruge til at sende kuponner til dine handlende.');
define('_ACA_VM_NEW_PRODUCT', 'Ny produkt notification ID');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Angiv ID nummeret på den forsendelse du ønsker at sende som ny produkt notification.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Opret formular');
define('_ACA_FORM_COPY', 'HTML kode');
define('_ACA_FORM_COPY_TIPS', 'Kopier den genererede HTML kode ind i din HTML side.');
define('_ACA_FORM_LIST_TIPS', 'Vælg den liste du vil inkludere i formularen');
// update messages
define('_ACA_UPDATE_MESS4', 'Den kan ikke opdateres automatisk.');
define('_ACA_WARNG_REMOTE_FILE', 'Der er ingen måde at hente den remote fil.');
define('_ACA_ERROR_FETCH', 'Fejl under henting af fil.');

define('_ACA_CHECK', 'Check');
define('_ACA_MORE_INFO', 'Mere information');
define('_ACA_UPDATE_NEW', 'Opgrader til nyere version');
define('_ACA_UPGRADE', 'Opgrader til højere produkt');
define('_ACA_DOWNDATE', 'Rul tilbage til den tidligere version');
define('_ACA_DOWNGRADE', 'Tilbage til det grundlæggende produkt');
define('_ACA_REQUIRE_JOOM', 'Kræv Joomla');
define('_ACA_TRY_IT', 'Prøv det!');
define('_ACA_NEWER', 'Nyere');
define('_ACA_OLDER', 'Ældre');
define('_ACA_CURRENT', 'Gældende');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Prøv en af de andre komponenter');
define('_ACA_MENU_VIDEO', 'Video uddannelse');
define('_ACA_AUTO_SCHEDULE', 'Plan');
define('_ACA_SCHEDULE_TITLE', 'Automatisk planlægningsfunktions opsætning');
define('_ACA_ISSUE_NB_TIPS', 'Problem nummer genereret automatisk af systemet');
define('_ACA_SEL_ALL', 'Alle forsendelser');
define('_ACA_SEL_ALL_SUB', 'Alle lister');
define('_ACA_INTRO_ONLY_TIPS', 'Hvis du vælger denne box er det kun intoduktionen til artiklen der vil bliv indsat i forsendelsen med en "læs mere" link til den komplette artikel på din webside.');
define('_ACA_TAGS_TITLE', 'Placeringsmærker');
define('_ACA_TAGS_TITLE_TIPS', 'Klip og klister denne markering in i forsendelse der hvor du vil have indholdet placeret.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Angiv den email adresse som testen skal sendes til');
define('_ACA_PREVIEW_TITLE', 'Preview');
define('_ACA_AUTO_UPDATE', 'Ny opdaterings besked');
define('_ACA_AUTO_UPDATE_TIPS', 'Vælg Ja hvis du vil have besked om nye opdateringer til din komponent. <br />VIGTIGT!! Vis tips skal være slået til for at denne funktion vil virke.');

// since 1.1.0
define('_ACA_LICENSE', 'Licens information');

// since 1.1.1
define('_ACA_NEW', 'Ny');
define('_ACA_SCHEDULE_SETUP', 'For at auto-svaret kan blive send skal du opsætte din scheduler i konfigurationen.');
define('_ACA_SCHEDULER', 'Scheduler');
define('_ACA_JNEWSLETTER_CRON_DESC', 'Hvis du ikke har adgang til en cron opgave adminstrator på din webside, kan du registrere dig til en fri jNews Cron konto på:');
define('_ACA_CRON_DOCUMENTATION', 'Du kan finde yderligere information om opsætningen af jNews scheduleren på følgende url:');
define('_ACA_CRON_DOC_URL', '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>');
define( '_ACA_QUEUE_PROCESSED', 'Køen behandlet succesfuldt...');
define( '_ACA_ERROR_MOVING_UPLOAD', 'Fejl ved flytning af importeret fil');

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', 'Scheduler frekvens');
define( '_ACA_CRON_MAX_FREQ', 'Scheduler max frekvens');
define( '_ACA_CRON_MAX_FREQ_TIPS', 'Specificer den maximale frekvens som scheduleren kan køre med ( i minuter ).  Dette vil begrænse scheduleren selv om cron opgaverne er opsat til oftere.');
define( '_ACA_CRON_MAX_EMAIL', 'Maximum emails per opgave');
define( '_ACA_CRON_MAX_EMAIL_TIPS', 'Angiv det maximale antal emails der sendes per opgave (0 ubegrænset).');
define( '_ACA_CRON_MINUTES', ' minuter');
define( '_ACA_SHOW_SIGNATURE', 'Vis email sidefoden');
define( '_ACA_SHOW_SIGNATURE_TIPS', 'Hvad enten du vil eller ikke vil fremhæve jNews i bunden af emailene.');
define( '_ACA_QUEUE_AUTO_PROCESSED', 'Auto-svarene er behandlet succesfuldt...');
define( '_ACA_QUEUE_NEWS_PROCESSED', 'Planlagte nyhedsbreve er behandlet succesfuldt...');
define( '_ACA_MENU_SYNC_USERS', 'Synkroniser brugere');
define( '_ACA_SYNC_USERS_SUCCESS', 'Brugere synkroniseret succesfuldt!');

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Logout');
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Ja');
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Nej');
if (!defined('_HI')) define( '_HI', 'Hej');
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Top');
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Bund');
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Logout');

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', 'Hvis du markerer denne så vil kun titlen af artiklen blive indsat i forsendelsen som en link til den komplette artikel på din webside.');
define('_ACA_TITLE_ONLY', 'Kun titel');
define('_ACA_FULL_ARTICLE_TIPS', 'Hvis du markerer denne vil den komplette artikel blive indsat i forsendelsen');
define('_ACA_FULL_ARTICLE', 'Fuld artikel');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Vælg det indhold der skal vedlægges til meddelelsen. <br />Klip og klistre <b>content tag</b> ind i forsendelsen.  Du kan vælge at have hele teksten, kun introduktionen, eller kun titlen med (0, 1, eller 2 respektivt). ');
define('_ACA_SUBSCRIBE_LIST2', 'Forsendelseslister');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Smart-Nyhedsbrev');
define('_ACA_MENU_AUTONEWS', 'Smart-Nyhedsbreve');
define('_ACA_AUTO_NEWS_OPTION', 'Smart-Nyhedsbrev valg');
define('_ACA_AUTONEWS_FREQ', 'Nyhedsbrevs frekvens');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Angiv frekvensen for hvor ofte du vil sende Smart-nyhedsbrevet.');
define('_ACA_AUTONEWS_SECTION', 'Artikel sektion');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Angiv den sektion du vil vælge artikler fra.');
define('_ACA_AUTONEWS_CAT', 'Artikel kategori');
define('_ACA_AUTONEWS_CAT_TIPS', 'Angiv den kategori du vil vælge artikler fra (Alle for alle artikler i den sektion).');
define('_ACA_SELECT_SECTION', 'Vælg en sektion');
define('_ACA_SELECT_CAT', 'Alle kategorier');
define('_ACA_AUTO_DAY_CH8', 'Kvartalsvis');
define('_ACA_AUTONEWS_STARTDATE', 'Start dato');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Angiv den dato du vil starte med at sende dit Smart-Nyhedsbrev.');
define('_ACA_AUTONEWS_TYPE', 'Indholdet behandles');
// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Fuld artikel: Vil inkludere hele artiklen i nyhedsbrevet.<br />' .
		'Kun intro: Vil kun inkludere introduktionen til artiklen i nyhedsbrevet.<br/>' .
		'Kun titel: Vil kun inkludere titlen til artiklen i nyhedsbrevet.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Dette vil blive udskiftet med Smart-Nyhedsbrevet.');

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Opret / Se forsendelser');
define('_ACA_LICENSE_CONFIG', 'Licens');
define('_ACA_ENTER_LICENSE', 'Indtast licens');
define('_ACA_ENTER_LICENSE_TIPS', 'Indtast dit licens nummer og gem det.');
define('_ACA_LICENSE_SETTING', 'Licens opsætning');
define('_ACA_GOOD_LIC', 'Din licens er gyldig.');
define('_ACA_NOTSO_GOOD_LIC', 'Din licens er ugyldig: ');
define('_ACA_PLEASE_LIC', 'Venligst kontakt jNews support for at opgradere din licens ( license@ijoobi.com ).');

define('_ACA_DESC_PLUS', 'jNews Plus er den første sekvensielle auto-svar til Joomla CMS.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO det ultimative mailing system til Joomla CMS.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN', 'Indtast token');
define('_ACA_ENTER_TOKEN_TIPS', 'Venligst indtast det token nummer du modtog på email da du købte jNews.');
define('_ACA_JNEWSLETTER_SITE', 'jNews website:');
define('_ACA_MY_SITE', 'Mit website:');
define( '_ACA_LICENSE_FORM', ' ' .
 		'Klik her for at gå til licens formularen.</a>');
define('_ACA_PLEASE_CLEAR_LICENSE', 'Venligst slet licens feltet så det er tomt og prøv igen.<br />  Hvis problemet fortsætter, ');
define( '_ACA_LICENSE_SUPPORT', 'Hvis du stadig har spørgsmål, ' . _ACA_PLEASE_LIC );
define( '_ACA_LICENSE_TWO', 'du kan få din licens manuelt ved at indtaste token nummeret og website URL (som er fremhævet i grønt øverst på denne side) i licens formularen. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );
define('_ACA_ENTER_TOKEN_PATIENCE', 'Efter at have gemt din token vil en licens blive genereret automatisk. ' .
		' Normalt bliver token valideret i 2 minutter.  Uanset, in nogle tilfælde kan det tage op til 15 minuter.<br />' .
		'<br />Kontroller dette kontrolpanel om få minutter.  <br /><br />' .
						'Hvis du ikke modtog en valid licenskode inden for 15 minuter, '. _ACA_LICENSE_TWO );
define( '_ACA_ENTER_NOT_YET', 'Din token er endnu ikke blivet valideret.');
define( '_ACA_UPDATE_CLICK_HERE', 'Venligst besøg <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> for at downloade den nyeste version.');
define( '_ACA_NOTIF_UPDATE', 'For at blive notificeret om nye opdatering skal du indtaste din email adresse og klikke abonner ');


//since 1.2.2
define( '_ACA_LIST_ACCESS', 'List Access');
define( '_ACA_INFO_LIST_ACCESS', 'Specify what group of users can view and subscribe to this list');
define( 'ACA_NO_LIST_PERM', 'You don\'t have enough permission to subscribe to this list');

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Archive');
 define('_ACA_MENU_ARCHIVE_ALL', 'Archive All');

//Archive Lists
 define('_FREQ_OPT_0', 'None');
 define('_FREQ_OPT_1', 'Every Week');
 define('_FREQ_OPT_2', 'Every 2 Weeks');
 define('_FREQ_OPT_3', 'Every Month');
 define('_FREQ_OPT_4', 'Every Quarter');
 define('_FREQ_OPT_5', 'Every Year');
 define('_FREQ_OPT_6', 'Other');

define('_DATE_OPT_1', 'Created date');
define('_DATE_OPT_2', 'Modified date');

define('_ACA_ARCHIVE_TITLE', 'Setting up auto-archive frequency');
define('_ACA_FREQ_TITLE', 'Archive frequency');
define('_ACA_FREQ_TOOL', 'Define how often you want the Archive Manager to arhive your website content.');
define('_ACA_NB_DAYS', 'Number of days');
define('_ACA_NB_DAYS_TOOL', 'This is only for the Other option! Please specify the number of days between each Archive.');
define('_ACA_DATE_TITLE', 'Date type');
define('_ACA_DATE_TOOL', 'Define if the archived should be done on the created date or modified date.');

define('_ACA_MAINTENANCE_TAB', 'Maintenance settings');
define('_ACA_MAINTENANCE_FREQ', 'Maintenance frequency');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Specify the frequency at which you want the maintenance routine to run.');
define( '_ACA_CRON_DAYS', 'hour(s)');

define( '_ACA_LIST_NOT_AVAIL', 'There is no list available.');
define( '_ACA_LIST_ADD_TAB', 'Add/Edit');

define( '_ACA_LIST_ACCESS_EDIT', 'Mailing Add/Edit Access');
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Specify what group of users can add or edit a new mailing for this list');
define( '_ACA_MAILING_NEW_FRONT', 'Createa New Mailing');

define('_ACA_AUTO_ARCHIVE', 'Auto-Archive');
define('_ACA_MENU_ARCHIVE', 'Auto-Archive');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = This will be replaced by the issue number of  the newsletter.');
define('_ACA_TAGS_DATE', '[DATE] = This will be replaced by the sent date.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Joobi Care');


define('_ACA_THINK_PRO', 'When you have professional needs, you use professional components!');
define('_ACA_THINK_PRO_1', 'Smart-Newsletters');
define('_ACA_THINK_PRO_2', 'Define access level for your list');
define('_ACA_THINK_PRO_3', 'Define who can edit/add mailings');
define('_ACA_THINK_PRO_4', 'More tags: add your CB fields');
define('_ACA_THINK_PRO_5', 'Joomla contents Auto-archive');
define('_ACA_THINK_PRO_6', 'Database optimization');

define('_ACA_LIC_NOT_YET', 'Your license is not yet valid.  Please check the license Tab in the configuration panel.');
define('_ACA_PLEASE_LIC_GREEN', 'Make sure to provide the green information at the top of the tab to our support team.');

define('_ACA_FOLLOW_LINK', 'Get Your License');
define( '_ACA_FOLLOW_LINK_TWO', 'You can get your license by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Then click on Apply button in the top right menu.');
define( '_ACA_ENTER_LIC_NB', 'Enter your License');
define( '_ACA_UPGRADE_LICENSE', 'Upgrade Your License');
define( '_ACA_UPGRADE_LICENSE_TIPS', 'If you received a token to upgrade your license please enter it here, click Apply and proceed to number <b>2</b> to get your new license number.');

define( '_ACA_MAIL_FORMAT', 'Encoding format');
define( '_ACA_MAIL_FORMAT_TIPS', 'What format do you want to use for encoding your mailings, Text only or MIME');
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.');

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Show Author\'s Name');
define('_ACA_SHOW_AUTHOR_TIPS', 'Select Yes if you want to add the name of the author when you add an article in the Mailing');

//since 1.3.5
define('_ACA_REGWARN_NAME', 'Angiv dit navn.');
define('_ACA_REGWARN_MAIL', 'Angiv en gyldig e-mailadresse.');


//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', 'If you select Yes, the e-mail of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be useful if you want to execute a special script in your redirect page.');
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
if(!defined('_CMN_SAVE')) define('_CMN_SAVE', 'Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT', 'No account yet?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT', 'Register');
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