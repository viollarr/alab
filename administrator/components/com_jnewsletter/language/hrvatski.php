<?php
if ( !defined('_JEXEC') && defined('_VALID_MOS') ) define( '_JEXEC', true );
 defined('_JEXEC') or die('...Direct Access to this location is not allowed...');

/**
* <p>Croatian language file</p>
* @author Tanja Dragisic <tanja@05vizija.net>
* @version $Id: hrvatski.php 491 2008-11-12 22:56:07Z divivo $
* @link http://www.05vizija.net
*/

#######    NOTE TO TRANSLATORS  #######
# If you wish to translate the language file to your own language, please feel free to do so
# We would apprecaite if you could send you translation to the specified email
# so that other people could benefit from your contribution
# If you feel that the file is too long feel free to do as much as you want and probably
# someone else will be happy to pick up were you stopped.
#  We did our bestt to organize the subject by order of priority so start at the top
# If you update your translation please send you updates to translation@acajoom.com
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
define('_ACA_DESC_CORE', 'jNews je alat za mailing liste, newslettere, auto-respondere, i follow up koji omogućava efikasnu komunikaciju s korisnicima.  ' .
		'jNews, Vaš komunikacijski partner!');
define('_ACA_DESC_GPL', 'jNews je alat za mailing liste, newslettere, auto-respondere, i follow up koji omogućava efikasnu komunikaciju s korisnicima.  ' .
		'jNews, Vaš komunikacijski partner!');
define('_ACA_FEATURES', 'jNews, vaš komunikacijski partner!');

// Type of lists
define('_ACA_NEWSLETTER', 'Newsletter');
define('_ACA_AUTORESP', 'Auto-responder');
define('_ACA_AUTORSS', 'Auto-RSS');
define('_ACA_ECARD', 'eRazglednica');
define('_ACA_POSTCARD', 'Razglednica');
define('_ACA_PERF', 'Rezultat');
define('_ACA_COUPON', 'Kupon');
define('_ACA_CRON', 'Cron Zadatak');
define('_ACA_MAILING', 'Skupno Pismo');
define('_ACA_LIST', 'Lista');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Liste');
define('_ACA_MENU_SUBSCRIBERS', 'Pretplatnici');
define('_ACA_MENU_NEWSLETTERS', 'Newsletteri');
define('_ACA_MENU_AUTOS', 'Auto-responderi');
define('_ACA_MENU_COUPONS', 'Kuponi');
define('_ACA_MENU_CRONS', 'Cron Zadaci');
define('_ACA_MENU_AUTORSS', 'Auto-RSS');
define('_ACA_MENU_ECARD', 'eRazglednice');
define('_ACA_MENU_POSTCARDS', 'Razglednice');
define('_ACA_MENU_PERFS', 'Rezultati');
define('_ACA_MENU_TAB_LIST', 'Liste');
define('_ACA_MENU_MAILING_TITLE', 'Skupna Pisma');
define('_ACA_MENU_MAILING' , 'Skupna Pisma za ');
define('_ACA_MENU_STATS', 'Statistika');
define('_ACA_MENU_STATS_FOR', 'Statistika za ');
define('_ACA_MENU_CONF', 'Konfiguracija');
define('_ACA_MENU_UPDATE', 'Import');
define('_ACA_MENU_ABOUT', 'O jNews');
define('_ACA_MENU_LEARN', 'Obrazovni Centar');
define('_ACA_MENU_MEDIA', 'Media Menadžer');
define('_ACA_MENU_HELP', 'Pomoć');
define('_ACA_MENU_CPANEL', 'Kontr.Ploča');
define('_ACA_MENU_IMPORT', 'Import');
define('_ACA_MENU_EXPORT', 'Export');
define('_ACA_MENU_SUB_ALL', 'Pretplati sve');
define('_ACA_MENU_UNSUB_ALL', 'Odjava pretplata');
define('_ACA_MENU_VIEW_ARCHIVE', 'Arhiva');
define('_ACA_MENU_PREVIEW', 'Pregled');
define('_ACA_MENU_SEND', 'Pošalji');
define('_ACA_MENU_SEND_TEST', 'Pošalji Test Email');
define('_ACA_MENU_SEND_QUEUE', 'Obradi red čekanja');
define('_ACA_MENU_VIEW', 'Pregled');
define('_ACA_MENU_COPY', 'Kopiraj');
define('_ACA_MENU_VIEW_STATS' , 'Pregled statistike');
define('_ACA_MENU_CRTL_PANEL' , ' Kontrolna Ploča');
define('_ACA_MENU_LIST_NEW' , ' Kreiraj listu');
define('_ACA_MENU_LIST_EDIT' , ' Uredi listu');
define('_ACA_MENU_BACK', 'Natrag');
define('_ACA_MENU_INSTALL', 'Instalacija');
define('_ACA_MENU_TAB_SUM', 'Sažetak');
define('_ACA_STATUS' , 'Status');

// messages
define('_ACA_ERROR' , ' Došlo je do greške! ');
define('_ACA_SUB_ACCESS' , 'Prava pristupa');
define('_ACA_DESC_CREDITS', 'Zasluge');
define('_ACA_DESC_INFO', 'Informacije');
define('_ACA_DESC_HOME', 'Naslovnica');
define('_ACA_DESC_MAILING', 'Mailing lista');
define('_ACA_DESC_SUBSCRIBERS', 'Pretplatnici');
define('_ACA_PUBLISHED','Objavljeno');
define('_ACA_UNPUBLISHED','Neobjavljeno');
define('_ACA_DELETE','Izbriši');
define('_ACA_FILTER','Filter');
define('_ACA_UPDATE','Ažuriranje');
define('_ACA_SAVE','Spremi');
define('_ACA_CANCEL','Odustani');
define('_ACA_NAME','Ime');
define('_ACA_EMAIL','E-mail');
define('_ACA_SELECT','Odaberi');
define('_ACA_ALL','Sve');
define('_ACA_SEND_A', 'Pošalji ');
define('_ACA_SUCCESS_DELETED', ' uspješno izbrisano');
define('_ACA_LIST_ADDED', 'Lista uspješno kreirana');
define('_ACA_LIST_COPY', 'Lista uspješno kopirana');
define('_ACA_LIST_UPDATED', 'Lista uspješno ažurirana');
define('_ACA_MAILING_SAVED', 'Skupno pismo uspješno spremljeno.');
define('_ACA_UPDATED_SUCCESSFULLY', 'uspješno ažurirano.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Informacije o pretplatniku');
define('_ACA_VERIFY_INFO', 'Molimo vas da potvrdite link kojeg ste poslali, nedostaju neke informacije.');
define('_ACA_INPUT_NAME', 'Ime');
define('_ACA_INPUT_EMAIL', 'Email');
define('_ACA_RECEIVE_HTML', 'Primati HTML?');
define('_ACA_TIME_ZONE', 'Vremenska zona');
define('_ACA_BLACK_LIST', 'Crna lista');
define('_ACA_REGISTRATION_DATE', 'Datum registracije korisnika');
define('_ACA_USER_ID', 'ID korisnika');
define('_ACA_DESCRIPTION', 'Opis');
define('_ACA_ACCOUNT_CONFIRMED', 'Vaš korisnički račun je aktiviran.');
define('_ACA_SUB_SUBSCRIBER', 'Pretplatnik');
define('_ACA_SUB_PUBLISHER', 'Izdavač');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Registrirani');
define('_ACA_SUBSCRIPTIONS', 'Vaša Pretplata');
define('_ACA_SEND_UNSUBCRIBE', 'Pošalji poruku za odjavu pretplate');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Odaberite Da za slanje poruke kojom potvrđujete odjavu pretplate.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Molimo vas da potvrdite vašu pretplatu');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Potvrda odjave pretplate');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Pozrav [NAME],<br />' .
		'Potrebno je da učinite još jedan korak kako bi se pretplatili na našu listu.  Molimo vas da kliknete na slijedeći link kako bi potvrdili vašu pretplatu.' .
		'<br /><br />[CONFIRM]<br /><br />Za dodatna pitanja kontaktirajte webmastera.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Ovim emailom potvrđujemo da ste odjavili vašu pretplatu na našu listu.  Žao nam je što ste se odlučili na ovaj korak. Ako poželite ponovno aktivirati pretplatu na našu listu, uvijek to možete učiniti na našim web stranicama.  Ako imate bilo kakvih dodatnih pitanja, slobodno kontaktirajte našeg webmastera.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Datum prijave');
define('_ACA_CONFIRMED', 'Potvrđeno');
define('_ACA_SUBSCRIB', 'Pretplata');
define('_ACA_HTML', 'HTML Skupna pisma');
define('_ACA_RESULTS', 'Rezultati');
define('_ACA_SEL_LIST', 'Odaberite listu');
define('_ACA_SEL_LIST_TYPE', '- Odaberite vrstu liste -');
define('_ACA_SUSCRIB_LIST', 'Lista svih pretplatnika');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Pretplatnici za : ');
define('_ACA_NO_SUSCRIBERS', 'Za ovu listu nema pretplatnika.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Poslan vam je emali potvrde.  Molimo vas da provjerite svoj email i kliknete na predviđeni link.<br />' .
		'Vaša pretplata bit će aktivirana nakon što potvrdite vašu email adresu.');
define('_ACA_SUCCESS_ADD_LIST', 'Uspješno ste upisani na naš popis.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Kliknite ovdje za potvrdu vaše pretplate');
define('_ACA_UNSUBSCRIBE_LINK', 'Kliknite ovdje za odjavu vaše pretplate');
define('_ACA_UNSUBSCRIBE_MESS', 'Vaša email adresa izbrisana je s našeg popisa');

define('_ACA_QUEUE_SENT_SUCCESS' , 'Sva predviđena skupna pisma uspješno su poslana.');
define('_ACA_MALING_VIEW', 'Pregledajte sva skupna pisma');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Zaista želite odjaviti vašu pretplatu za ovu listu?');
define('_ACA_MOD_SUBSCRIBE', 'Pretplata');
define('_ACA_SUBSCRIBE', 'Pretplata');
define('_ACA_UNSUBSCRIBE', 'Odjava pretplate');
define('_ACA_VIEW_ARCHIVE', 'Pregledajte arhivu');
define('_ACA_SUBSCRIPTION_OR', ' ili kliknite ovdje za ažuriranje vaših informacija');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Ova email adresa već je registrirana.');
define('_ACA_SUBSCRIBER_DELETED', 'Pretplatnik je uspješno izbrisan.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Korisnička Kontrolna Ploča');
define('_UCP_USER_MENU', 'Korisnički Izbornik');
define('_UCP_USER_CONTACT', 'Moje Pretplate');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Upravljanje Cron zadacima');
define('_UCP_CRON_NEW_MENU', 'Novi Cron');
define('_UCP_CRON_LIST_MENU', 'Lista mojih Cronova');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Upravljanje Kuponima');
define('_UCP_COUPON_LIST_MENU', 'Lista Kupona');
define('_UCP_COUPON_ADD_MENU', 'Dodaj Kupon');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Opis');
define('_ACA_LIST_T_LAYOUT', 'Izgled');
define('_ACA_LIST_T_SUBSCRIPTION', 'Pretplata');
define('_ACA_LIST_T_SENDER', 'Informacije o pošiljatelju');

define('_ACA_LIST_TYPE', 'Vrsta Liste');
define('_ACA_LIST_NAME', 'Naziv Liste');
define('_ACA_LIST_ISSUE', 'Izdanje #');
define('_ACA_LIST_DATE', 'Datum Slanja');
define('_ACA_LIST_SUB', 'Predmet Pisma');
define('_ACA_ATTACHED_FILES', 'Datoteke u privitku');
define('_ACA_SELECT_LIST', 'Odaberite listu za uređivanje!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Vrsta Liste');
define('_ACA_AUTO_RESP_OPTION', 'Opcije Auto-respondera');
define('_ACA_AUTO_RESP_FREQ', 'Pretplatnici mogu odabrati učestalost');
define('_ACA_AUTO_DELAY', 'Odgoda (u danima)');
define('_ACA_AUTO_DAY_MIN', 'Minimalna učestalost');
define('_ACA_AUTO_DAY_MAX', 'Maximalna učestalost');
define('_ACA_FOLLOW_UP', 'Odredite follow up auto-responder');
define('_ACA_AUTO_RESP_TIME', 'Pretplatnici mogu odabrati vrijeme');
define('_ACA_LIST_SENDER', 'Pošiljatelj Liste');

define('_ACA_LIST_DESC', 'Opis Liste');
define('_ACA_LAYOUT', 'Izgled');
define('_ACA_SENDER_NAME', 'Ime pošiljatelja');
define('_ACA_SENDER_EMAIL', 'Email pošiljatelja');
define('_ACA_SENDER_BOUNCE', 'Bounce adresa pošiljatelja');
define('_ACA_LIST_DELAY', 'Odgoda');
define('_ACA_HTML_MAILING', 'HTML pisma?');
define('_ACA_HTML_MAILING_DESC', '(ako ovo izmjenite, morat će te spremiti izmjene i vratiti se u ovaj prozor kako bi vidjeli izmjene.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Sakriti od Frontenda?');
define('_ACA_SELECT_IMPORT_FILE', 'Odaberite datoteku za import');;
define('_ACA_IMPORT_FINISHED', 'Import završen');
define('_ACA_DELETION_OFFILE', 'Brisanje datoteke');
define('_ACA_MANUALLY_DELETE', 'nije uspjelo, morate ju ručno izbrisati');
define('_ACA_CANNOT_WRITE_DIR', 'Direktorij nije otvoren za zapisivanje');
define('_ACA_NOT_PUBLISHED', 'Pismo nije poslano, lista nije objavljena.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Kliknite Da za objavljivanje liste');
define('_ACA_INFO_LIST_NAME', 'Ovdje upišite naziv vaše liste. Ovu listu moći će te identificirati putem ovog imena.');
define('_ACA_INFO_LIST_DESC', 'Ovdje upišite kratki opis vaše liste. Ovaj opis bit će vidljiv posjetiteljima vaših stranica.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Upišite ime pošiljatelja ovog pisma. Ovo ime bit će vidljivo pretplatnicima kad prime poruke od ove liste.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Upišite email adresu s koje će poruka biti poslana.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Upišite email adresu na koju korisnici mogu odgovoriti. Preporuča se da to bude email adresa identična adresi pošiljatelja, jer će spam filteri dati vašoj poruci višu spam ocjenu ako su ove adrese različite.');
define('_ACA_INFO_LIST_AUTORESP', 'Odaberite vrstu pisma za ovu listu. <br />' .
		'Newsletter: normalan newsletter<br />' .
		'Auto-responder: auto-responder je lista koja se automatski šalje u regularnim intervalima.');
define('_ACA_INFO_LIST_FREQUENCY', 'Omogućite korisnicima da odaberu kako često će primati listu.  Ova opcija daje korisnicima veću fleksibilnost.');
define('_ACA_INFO_LIST_TIME', 'Dozvolite korisnicima da odaberu željeno vrijeme dana u koje će primati listu.');
define('_ACA_INFO_LIST_MIN_DAY', 'Definirajte minimalnu učestalost koju korisnik može odabrati za primanje liste');
define('_ACA_INFO_LIST_DELAY', 'Odredite odgodu između ovog i prethodnog auto-respondera.');
define('_ACA_INFO_LIST_DATE', 'Odredite datum kad će se objaviti lista vijesti, ako želite odgoditi objavljivanje. <br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Definirajte maximalnu učestalost koju korisnik može odabrati za primanje liste');
define('_ACA_INFO_LIST_LAYOUT', 'Ovdje upišite izgled vašeg skupnog pisma ove liste. Ovdje možete upisati bilo koji izgled skupnog pisma.');
define('_ACA_INFO_LIST_SUB_MESS', 'Ova poruka poslat će se pretplatnicima kad se prvi put registriraju za pretplatu. Ovdje možete upisati bilo koji tekst te poruke.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Ova poruka poslat će se pretplatniku kad odjavi pretplatu. Ovdje možete upisati bilo koju poruku.');
define('_ACA_INFO_LIST_HTML', 'Označite kućicu ako želite poslati HTML skupna pisma. Pretplatnici će prilikom pretplate na HTML listu moći odlučiti žele li primiti HTML pismo, ili samo tekst poruku.');
define('_ACA_INFO_LIST_HIDDEN', 'Kliknite Da ako želite listu sakriti od Frontenda, korisnici se neće moći pretplatiti na nju, ali vi će te i dalje moći slati skupna pisma.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Želite li automatski pretplatiti korisnike na ovu listu?<br /><B>Novi korisnici:</B> registrirat će svakog novog korisnika na vašem sajtu.<br /><B>Svi korisnici:</B> registrirat će sve registrirane korisnike u vašoj bazi podataka.<br />(obe opcije podržavaju Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Odaberite stupanj pristupa u Frontendu. Skupna pisma bit će prikazana ili skrivena od korisničkih grupa koje nemaju pravo pristupa listi, te se oni stoga neće moći pretplatiti za listu.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Odaberite stupanj pristupa korisničke grupe kojoj želite dozvoliti uređivanje liste. Ova korisnička grupa i sve iznad nje moći će uređivati i slati skupno pismo, bilo iz Frontenda ili Backenda.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Ako želite da auto-responder prijeđe u novi auto-responder nakon što dosegne posljednju poruku, ovdje možete odrediti taj slijedeći auto-responder.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Ovo je ID osobe koja je kreirala listu.');
define('_ACA_INFO_LIST_WARNING', '   Ova posljednja opcija dostupna je samo jednom, prilikom kreiranja liste.');
define('_ACA_INFO_LIST_SUBJET', ' Predmet Skupnog pisma.  Ovo je predmet emaila kojeg će pretplatnik primiti.');
define('_ACA_INFO_MAILING_CONTENT', 'Ovo je glavni dio emaila kojeg želite poslati.');
define('_ACA_INFO_MAILING_NOHTML', 'Ovdje upišite glavni dio emaila kojeg želite poslati pretplatnicima koji su odabrali da ne žele primati HTML mailove. <BR/> NAPOMENA: ako ostavite prazno, jNews će automatski pretvoriti HTML tekst u samo tekst.');
define('_ACA_INFO_MAILING_VISIBLE', 'Kliknite Da za prikazivanje Skupnog pisma u Frontendu.');
define('_ACA_INSERT_CONTENT', 'Umetni postojeći sadržaj');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Kupon je uspješno poslan!');
define('_ACA_CHOOSE_COUPON', 'Odaberite kupon');
define('_ACA_TO_USER', ' ovom korisniku');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Svaki sat');
define('_ACA_FREQ_CH2', 'Svakih 6 sati');
define('_ACA_FREQ_CH3', 'Svakih 12 sati');
define('_ACA_FREQ_CH4', 'Dnevno');
define('_ACA_FREQ_CH5', 'Tjedno');
define('_ACA_FREQ_CH6', 'Mjesečno');
define('_ACA_FREQ_NONE', 'Ne');
define('_ACA_FREQ_NEW', 'Novi korisnici');
define('_ACA_FREQ_ALL', 'Svi korisnici');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews Cron?');
define('_ACA_LABEL_FREQ_TIPS', 'Kliknite Da ako želite ovo koristiti za jNews Cron, kliknite Ne ako želite koristiti drugi cron zadatak.<br />' .
		'Ako kliknete Da, ne morate odrediti Cron Adresu, ona će biti automatski dodana.');
define('_ACA_SITE_URL' , 'URL vašeg sajta');
define('_ACA_CRON_FREQUENCY' , 'Cron učestalost');
define('_ACA_STARTDATE_FREQ' , 'Datum početka');
define('_ACA_LABELDATE_FREQ' , 'Odredite datum');
define('_ACA_LABELTIME_FREQ' , 'Odredite vrijeme');
define('_ACA_CRON_URL', 'Cron URL');
define('_ACA_CRON_FREQ', 'Učestalost');
define('_ACA_TITLE_CRONLIST', 'Cron Lista');
define('_NEW_LIST', 'Kreiraj novu listu');

//title CRON form
define('_ACA_TITLE_FREQ', 'Uredi Cron');
define('_ACA_CRON_SITE_URL', 'Upišite valjani URL sajta, započnite s http://');

### Mailings ###
define('_ACA_MAILING_ALL', 'Sva Skupna Pisma');
define('_ACA_EDIT_A', 'Uredi ');
define('_ACA_SELCT_MAILING', 'Za dodavanje novog skupnog pisma odaberite listu iz padajućeg izbornika.');
define('_ACA_VISIBLE_FRONT', 'Vidljivo u Frontendu');

// mailer
define('_ACA_SUBJECT', 'Predmet');
define('_ACA_CONTENT', 'Sadržaj');
define('_ACA_NAMEREP', '[NAME] = Ovo će biti zamijenjeno imenom pretplatnika koje je on prijavio. Ako koristite ovu opciju slat će te osobne emailove.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Ovo će biti zamijenjeno osobnim imenom kojeg je pretplatnik prijavio.<br />');
define('_ACA_NONHTML', 'Ne-html verzija');
define('_ACA_ATTACHMENTS', 'Privitci');
define('_ACA_SELECT_MULTIPLE', 'Držite control (ili command) za odabir više privitaka.<br />' .
		'Datoteke prikazane u ovom popisu privitaka nalaze se u mapi privitaka, ovu lokaciju možete izmijeniti u postavkama Konfiguracije.');
define('_ACA_CONTENT_ITEM', 'Članak');
define('_ACA_SENDING_EMAIL', 'Slanje emaila');
define('_ACA_MESSAGE_NOT', 'Poruka nije poslana');
define('_ACA_MAILER_ERROR', 'Mailer greška');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Poruka uspješno poslana');
define('_ACA_SENDING_TOOK', 'Za slanje ovog pisma trebalo je');
define('_ACA_SECONDS', 'sekundi');
define('_ACA_NO_ADDRESS_ENTERED', 'Nije upisana email adresa ili pretplatnik');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Promjeni');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Promjenite vašu pretplatu');
define('_ACA_WHICH_EMAIL_TEST', 'Odredite email adresu na koju će se poslati test ili odaberite Pregled');
define('_ACA_SEND_IN_HTML', 'Poslati u HTML (za html skupna pisma)?');
define('_ACA_VISIBLE', 'Vidljivo');
define('_ACA_INTRO_ONLY', 'Samo uvod');

// stats
define('_ACA_GLOBALSTATS', 'Globalna statistika');
define('_ACA_DETAILED_STATS', 'Detaljna statistika');
define('_ACA_MAILING_LIST_DETAILS', 'Detalji liste');
define('_ACA_SEND_IN_HTML_FORMAT', 'Pošalji u HTML formatu');
define('_ACA_VIEWS_FROM_HTML', 'Pregleda (iz html mailova)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Pošalji u tekst formatu');
define('_ACA_HTML_READ', 'HTML pročitan');
define('_ACA_HTML_UNREAD', 'HTML nepročitan');
define('_ACA_TEXT_ONLY_SENT', 'Samo Tekst');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Mail');
define('_ACA_LOGGING_CONFIG', 'Logovi & Statistika');
define('_ACA_SUBSCRIBER_CONFIG', 'Pretplatnici');
define('_ACA_MISC_CONFIG', 'Razno');
define('_ACA_MAIL_SETTINGS', 'Mail Postavke');
define('_ACA_MAILINGS_SETTINGS', 'Postavke Mailova');
define('_ACA_SUBCRIBERS_SETTINGS', 'Postavke Pretplatnika');
define('_ACA_CRON_SETTINGS', 'Cron Postavke');
define('_ACA_SENDING_SETTINGS', 'Postavke Slanja');
define('_ACA_STATS_SETTINGS', 'Postavke Statistike');
define('_ACA_LOGS_SETTINGS', 'Postavke Logova');
define('_ACA_MISC_SETTINGS', 'Razne Postavke');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Od Email');
define('_ACA_SEND_MAIL_NAME', 'Od Ime');
define('_ACA_MAILSENDMETHOD', 'Mailer metoda');
define('_ACA_SENDMAILPATH', 'Sendmail putanja');
define('_ACA_SMTPHOST', 'SMTP host');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP Autorizacija obvezna');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Odaberite Da ako vaš SMTP server zahtijeva autorizaciju');
define('_ACA_SMTPUSERNAME', 'SMTP korisničko ime');
define('_ACA_SMTPUSERNAME_TIPS', 'Upišite SMTP korisničko ime ako vaš SMTP server zahtijeva autorizaciju');
define('_ACA_SMTPPASSWORD', 'SMTP šifra');
define('_ACA_SMTPPASSWORD_TIPS', 'Upišite SMTP šifru ako vaš SMTP server zahtijeva autorizaciju');
define('_ACA_USE_EMBEDDED', 'Koristiti umetnute slike');
define('_ACA_USE_EMBEDDED_TIPS', 'Odaberite Da ako će slike u pridruženim sadržajima biti umetnute u email kod html poruka, ili Ne ako će se koristiti standardni tagovi za slike koji povezuju na slike na sajtu.');
define('_ACA_UPLOAD_PATH', 'Upload/privitci putanja');
define('_ACA_UPLOAD_PATH_TIPS', 'Možete odrediti upload direktorij.<br />' .
		'Pripazite da taj direktorij postoji, ili ga kreirajte.');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Dozvoli neregistriranima');
define('_ACA_ALLOW_UNREG_TIPS', 'Odaberite Da ako želite dozvoliti neregistriranim korisnicima da se pretplate na liste bez registracije na sajtu.');
define('_ACA_REQ_CONFIRM', 'Obvezna potvrda');
define('_ACA_REQ_CONFIRM_TIPS', 'Odaberite Da ako želite da neregistrirani pretplatnici moraju potvrditi svoju email adresu.');
define('_ACA_SUB_SETTINGS', 'Postavke Pretplate');
define('_ACA_SUBMESSAGE', 'Email Pretplate');
define('_ACA_SUBSCRIBE_LIST', 'Pretplati se za listu');

define('_ACA_USABLE_TAGS', 'Primjenjivi tagovi');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Ovo kreira link na kojeg pretplatnik može kliknuti da potvrdi svoju pretplatu. Ovo je <strong>obvezno</strong> ako želite da jNews ispravno funkcionira.<br />'
.'<br />[NAME] = Ovo će biti zamijenjeno imenom kojeg je pretplatnik prijavio, kad koristite ovu opciju, slat će te osobne email poruke.<br />'
.'<br />[FIRSTNAME] = Ovo će biti zamijenjeno imenom pretplatnika, to je prvo ime koje je pretplatnik upisao tijekom pretplate.<br />');
define('_ACA_CONFIRMFROMNAME', 'Potvrda Od Ime');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Upišite ime pošiljatelja koje će se prikazati na listi potvrda.');
define('_ACA_CONFIRMFROMEMAIL', 'Potvrda Od Email');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Upišite email adresu koja će se prikazivati na listi potvrda.');
define('_ACA_CONFIRMBOUNCE', 'Bounce Adresa');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Upišite bounce adresu koja će se prikazivati na listi potvrda.');
define('_ACA_HTML_CONFIRM', 'HTML Potvrda');
define('_ACA_HTML_CONFIRM_TIPS', 'Odaberite Da ako će liste potvrde biti u HTML, ako korisnik dozvoljava HTML poruke.');
define('_ACA_TIME_ZONE_ASK', 'Vremenska Zona');
define('_ACA_TIME_ZONE_TIPS', 'Odaberite Da ako želite korisnika pitati o njegovoj vremenskoj zoni. Mailovi koji čekaju na slanje slat će se temeljem vremenske zone, gdje je to primjenjivo');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_TIME_OFFSET_URL', 'kliknite ovdje da bi odredili pomak u Globalnoj Konfiguraciji -> kartica za Lokalizaciju');
define('_ACA_TIME_OFFSET_TIPS', 'Odredite pomak vašeg servera kako bi zabilježen datum i vrijeme bili točni');
define('_ACA_TIME_OFFSET', 'Vremenski Pomak');
define('_ACA_CRON_DESC','<br />Korištenjem cron funkcije možete postaviti automatske zadatke za vaš Joomla sajt!<br />' .
		'Da bi ste ih postavili, morate u vašoj Kontrolnoj Ploči, u cron karticu dodati slijedeću komandu:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Ako trebate pomoć u postavljanju crona ili imate problema s njime, posjetite naš forum na <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>');
// sending settings
define('_ACA_PAUSEX', 'Pauziraj x sekundi za svaku konfiguriranu količinu emailova');
define('_ACA_PAUSEX_TIPS', 'Upišite broj sekundi koje će jNews dati SMTP serveru za slanje poruka, prije nastavljanja slanja slijedeće konfigurirane količine poruka.');
define('_ACA_EMAIL_BET_PAUSE', 'Emailovi između pauzi');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Broj emailova koji će se slati prije pauze.');
define('_ACA_WAIT_USER_PAUSE', 'Čekaj unos korisnika pri pauzi');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Da li će skripta čekati na unos korisnika kad se pauzira između dvije skupine poruka.');
define('_ACA_SCRIPT_TIMEOUT', 'Istek Skripte');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Broj minuta za procesuiranje skripte (0 za neograničeno).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Uključi statistiku čitanja');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Odaberite Da ako želite zabilježiti broj čitanja. Ovu tehniku možete koristiti samo za html mailove');
define('_ACA_LOG_VIEWSPERSUB', 'Zabilježi čitanja po pretplatniku');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Odaberite Da ako želite bilježiti broj čitanja po pojedinom pretplatniku. Ovu tehniku možete koristiti samo za html mailove');
// Logs settings
define('_ACA_DETAILED', 'Detaljni Logovi');
define('_ACA_SIMPLE', 'Jednostavni Logovi');
define('_ACA_DIAPLAY_LOG', 'Prikazati Logove');
define('_ACA_DISPLAY_LOG_TIPS', 'Odaberite Da ako želite prikazati logove dok se šalju skupna pisma.');
define('_ACA_SEND_PERF_DATA', 'Poslati Učinkovitost');
define('_ACA_SEND_PERF_DATA_TIPS', 'Odaberite Da ako želite dozvoliti jNews da šalje ANONIMNA izvješća o vašoj konfiguraciji, broju pretplatnika na liste, i vrijeme koje je trebalo za slanje poruke. Ovo će na pomoći da saznamo više o jNews učinkovitosti i POMOĆI ĆE NAM da usavršimo njegov rad u budućim verzijama.');
define('_ACA_SEND_AUTO_LOG', 'Poslati log za auto-responder');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Odaberite Da ako želite slati email log svaki put kad se procesuira slanje mailova.  UPOZORENJE: ovo može dovesti do velikog broja mailova.');
define('_ACA_SEND_LOG', 'Poslati Log');
define('_ACA_SEND_LOG_TIPS', 'Da li će se na email adresu korisniku koji je poslao mailove poslati log tog slanja.');
define('_ACA_SEND_LOGDETAIL', 'Poslati Detalje Loga');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Detaljan log uključuje informacije o uspješnom ili nesupješnom slanju maila za svakog korisnika. Jednostavan log šalje samo pregled informacija.');
define('_ACA_SEND_LOGCLOSED', 'Poslati log uz zatvorenu vezu');
define('_ACA_SEND_LOGCLOSED_TIPS', 'S ovom opcijom korisnik koji je poslao mailove ipak će primiti izvješće putem maila.');
define('_ACA_SAVE_LOG', 'Spremiti Log');
define('_ACA_SAVE_LOG_TIPS', 'Da li će se log slanja mailova dodati log datoteci.');
define('_ACA_SAVE_LOGDETAIL', 'Spremiti Log Detalje');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Detaljan log uključuje informacije o uspješnom ili nesupješnom slanju maila za svakog korisnika. Jednostavan log šalje samo pregled informacija.');
define('_ACA_SAVE_LOGFILE', 'Spremiti Log Datoteku');
define('_ACA_SAVE_LOGFILE_TIPS', 'Datoteka kojoj će se dodati log informacije. Ova datoteka bi mogla postati vrlo velika.');
define('_ACA_CLEAR_LOG', 'Očistiti Log');
define('_ACA_CLEAR_LOG_TIPS', 'Očisti log datoteku.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Posljednje uspješno slanje');
define('_ACA_CP_TOTAL', 'Ukupno');
define('_ACA_MAILING_COPY', 'Skupno pismo uspješno kopirano!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Prikazati Upute');
define('_ACA_SHOW_GUIDE_TIPS', 'Prikazati upute novim korisnicima koje će im pomoći da kreiraju newsletter i auto-responder, i da ispravno postave jNews.');
define('_ACA_AUTOS_ON', 'Koristiti Auto-respondere');
define('_ACA_AUTOS_ON_TIPS', 'Odaberite Ne ako ne želite koristiti Auto-respondere, sve auto-responder opcije bit će deaktivirane.');
define('_ACA_NEWS_ON', 'Koristiti Newslettere');
define('_ACA_NEWS_ON_TIPS', 'Odaberite Ne ako ne želite koristiti Newslettere, sve newsletter opcije bit će deaktivirane.');
define('_ACA_SHOW_TIPS', 'Prikazati Savjete');
define('_ACA_SHOW_TIPS_TIPS', 'Prikazati savjete koji će korisnicima pomoći da efikasno koriste jNews.');
define('_ACA_SHOW_FOOTER', 'Prikazati Footer');
define('_ACA_SHOW_FOOTER_TIPS', 'Da li će se prikazivati footer copyright obavijest.');
define('_ACA_SHOW_LISTS', 'Prikazati liste u Frontendu');
define('_ACA_SHOW_LISTS_TIPS', 'Prikazati neregistriranim korisnicima popis svih listi na koje se mogu pretplatiti, s dugmetom za arhivu newslettera, ili samo obrazac za prijavu kako bi se mogli registrirati.');
define('_ACA_CONFIG_UPDATED', 'Konfiguracija je ažurirana!');
define('_ACA_UPDATE_URL', 'Ažuriraj URL');
define('_ACA_UPDATE_URL_WARNING', 'UPOZORENJE! Ne mijenjajte ovaj URL, osim ako to od vas ne zatraži jNews tehnički tim.<br />');
define('_ACA_UPDATE_URL_TIPS', 'Na primjer: http://www.acajoom.com/update/ (dodati krajnju nakošenu crtu)');

// module
define('_ACA_EMAIL_INVALID', 'Upisani email nije valjan.');
define('_ACA_REGISTER_REQUIRED', 'Molimo vas da se prije prijave za listu prvo registrirate na našim stranicama.');

// Access level box
define('_ACA_OWNER', 'Kreator liste:');
define('_ACA_ACCESS_LEVEL', 'Odredite stupanj pristupa ovoj listi');
define('_ACA_ACCESS_LEVEL_OPTION', 'Opcije stupnja pristupa');
define('_ACA_USER_LEVEL_EDIT', 'Odredite koja će grupa korisnika moći uređivati skupna pisma (bilo iz Frontenda ili Backenda) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Dnevno');
define('_ACA_AUTO_DAY_CH2', 'Dnevno bez vikenda');
define('_ACA_AUTO_DAY_CH3', 'Svaki drugi dan');
define('_ACA_AUTO_DAY_CH4', 'Svaki drugi dan bez vikenda');
define('_ACA_AUTO_DAY_CH5', 'Tjedno');
define('_ACA_AUTO_DAY_CH6', 'Svaka 2 tjedna');
define('_ACA_AUTO_DAY_CH7', 'Mjesečno');
define('_ACA_AUTO_DAY_CH9', 'Godišnje');
define('_ACA_AUTO_OPTION_NONE', 'Ne');
define('_ACA_AUTO_OPTION_NEW', 'Novi Korisnici');
define('_ACA_AUTO_OPTION_ALL', 'Svi Korisnici');

//
define('_ACA_UNSUB_MESSAGE', 'Email za odjavu pretplate');
define('_ACA_UNSUB_SETTINGS', 'Postavke odjave pretplate');
define('_ACA_AUTO_ADD_NEW_USERS', 'Auto Pretplata Korisnika?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Trenutno nema dostupnih novih verzija.');
define('_ACA_VERSION', 'jNews Verzija');
define('_ACA_NEED_UPDATED', 'Datoteke koje treba ažurirati:');
define('_ACA_NEED_ADDED', 'Datoteke koje treba dodati:');
define('_ACA_NEED_REMOVED', 'Datoteke koje treba izbrisati:');
define('_ACA_FILENAME', 'Naziv datoteke:');
define('_ACA_CURRENT_VERSION', 'Trenutna verzija:');
define('_ACA_NEWEST_VERSION', 'Najnovija verzija:');
define('_ACA_UPDATING', 'Ažuriranje');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Datoteke su uspješno ažurirane.');
define('_ACA_UPDATE_FAILED', 'Ažuriranje neuspješno!');
define('_ACA_ADDING', 'Dodavanje');
define('_ACA_ADDED_SUCCESSFULLY', 'Uspješno dodano.');
define('_ACA_ADDING_FAILED', 'Dodavanje neuspješno!');
define('_ACA_REMOVING', 'Brisanje');
define('_ACA_REMOVED_SUCCESSFULLY', 'Uspješno izbrisano.');
define('_ACA_REMOVING_FAILED', 'Brisanje neuspješno!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Instalacija drugačije verzije');
define('_ACA_CONTENT_ADD', 'Dodaj sadržaj');
define('_ACA_UPGRADE_FROM', 'Import podataka (newslettera i pretplatnika) iz ');
define('_ACA_UPGRADE_MESS', 'Nema rizika za vaše postojeće podatke. <br /> Ovaj postupak će jednostavno importirati podatke u jNews bazu podataka.');
define('_ACA_CONTINUE_SENDING', 'Nastavi slati');

// jNews message
define('_ACA_UPGRADE1', 'Možete vrlo jednostavno importirati vaše korisnike i newslettere iz ');
define('_ACA_UPGRADE2', ' u jNews, putem opcije Ažuriranje.');
define('_ACA_UPDATE_MESSAGE', 'Dostupna je nova jNews verzija! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Kliknite ovdje za ažuriranje!');
define('_ACA_THANKYOU', 'Hvala vam što ste odabrali jNews, vašeg komunikacijskog partnera!');
define('_ACA_NO_SERVER', 'Server za ažuriranje nije dostupan, pokušajte ponovno malo kasnije.');
define('_ACA_MOD_PUB', 'jNews modul nije objavljen.');
define('_ACA_MOD_PUB_LINK', 'Kliknite ovdje za njegovo objavljivanje!');
define('_ACA_IMPORT_SUCCESS', 'uspješno importirano');
define('_ACA_IMPORT_EXIST', 'pretplatnik je već u bazi podataka');

// jNews\'s Guide
define('_ACA_GUIDE', ' Čarobnjak');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews ima mnogo dobrih karakteristika, a ovaj Čarobnjak vodit će vas kroz četiri jednostavna koraka putem kojih će te moći početi slati vaše newslettere i auto-respondere!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Kao prvo, trebate dodati jednu listu.  Vrsta liste može biti ili newsletter ili auto-responder.' .
		'  U listi će te definirati razne parametre koji će omogućiti slanje vašeg newslettera ili auto-respondera: ime pošiljatelja, izgled, pozdravna poruka za pretplatnike, itd...
<br /><br />Vašu prvu listu možete odrediti ovdje: <a href="index2.php?option=com_jnewsletter&act=list" >kreiraj listu</a> i klikni na dugme Novo.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews vam omogućava da na jednostavan način importirate sve podatke iz drugih newsletter sistema.<br />' .
		' Otiđite u opciju Import i odaberite newsletter sistem iz kojeg će te importirati sve vaše newslettere i pretplatnike.<br /><br />' .
		'<span style="color:#FF5E00;" >VAŽNO: Postupak importiranja je BEZ rizika i ne utječe na bilo koji način na vaš drugi sistem newslettera</span><br />' .
		'Nakon importiranja moći će te upravljati vašim pretplatnicima i skupnim pismima direktno iz jNews komponente.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Izvrsno, odredili ste vašu prvu listu!  Sad možete napisati vaš prvi %s.  Da bi ste ga kreirali otiđite u: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Upravljanje Auto-responderima');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Upravljanje Newsletterima');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' i odaberite vaš %s. <br /> Zatim iz padajućeg popisa odaberite vaš %s.  Kreirajte vaše prvo skupno pismo klikom na Novo ');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Prije slanja vašeg prvog newslettera, bilo bi dobro da provjerite mail konfiguraciju.  ' .
		'Otiđite na <a href="index2.php?option=com_jnewsletter&act=configuration" >stranicu za konfiguraciju</a> i potvrdite vaše mail postavke. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Kad ste spremni za povratak u Newsletter izbornik, odaberite vaše skupno pismo i kliknite Pošalji');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Prije slanja vašeg auto-respondera, prvo morate postaviti cron zadatak na vašem serveru. ' .
		' Molimo vas da pogledate Cron karticu u vašoj Konfiguraciji.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >kliknite ovdje</a> za informacije o postavljanju cron zadatka. <br />');

define('_ACA_GUIDE_MODULE', ' <br />Provjerite da li ste objavili jNews modul kako bi se korisnici mogli pretplatiti na listu.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Sad možete kreirati i auto-responder.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Sad možete kreirati i newsletter.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Voila! Spremni ste za efikasnu komunikaciju s vašim posjetiteljima i korisnicima. Ovaj Čarobnjak zatvorit će se čim upišete drugo skupno pismo ili ga možete isključiti u <a href="index2.php?option=com_jnewsletter&act=configuration" >Konfiguraciji</a>.' .
		'<br /><br />  Ako imate bilo kakvih dodatnih pitanja o jNews primjeni, pogledajte ' .
		'<a target="_blank" href="http://www.acajoom.com/content/blogcategory/29/93/" >dokumentaciju</a>. ' .
		' Dodatne informacije o efikasnoj komunikaciji s vašim pretplatnicima pronaći će te i na <a href="http://www.acajoom.com/" target="_blank" >www.jNews.com</a>.' .
		'<p /><br /><b>Hvala vam što koristite jNews, vaš komunikacijski partner!</b> ');
define('_ACA_GUIDE_TURNOFF', 'Čarobnjak se isključuje!');
define('_ACA_STEP', 'STEP ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews Konfiguracija');
define('_ACA_INSTALL_SUCCESS', 'Instalacija uspješna');
define('_ACA_INSTALL_ERROR', 'Greška u instalaciji');
define('_ACA_INSTALL_BOT', 'jNews Plugin (Bot)');
define('_ACA_INSTALL_MODULE', 'jNews Modul');
//Others
define('_ACA_JAVASCRIPT','!Upozorenje! Javascript treba biti uključen za ispravno funkcioniranje.');
define('_ACA_EXPORT_TEXT','Export pretplatnika temelji se na listi koju ste odabrali. <br />Export pretplatnika za listu');
define('_ACA_IMPORT_TIPS','Import pretplatnika. Informacije u datoteci trebaju biti u slijedećem formatu: <br />' .
		'Name,email,receiveHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmed(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'već je pretplatnik');
define('_ACA_GET_STARTED', 'Kliknite ovdje za početak!');

//News since 1.0.1
define('_ACA_WARNING_1011','Upozorenje: 1011: Ažuriranje nije moguće zbog ograničenja vašeg servera.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Odaberite email adresu koja će se prikazati kao pošiljatelj.');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Odaberite ime koje će se prikazatu kao pošiljatelj.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Odaberite koji mailer želite koristiti: PHP mail function, <span>Sendmail</span> ili SMTP Server.');
define('_ACA_SENDMAILPATH_TIPS', 'Ovo je direktorij Mail servera');
define('_ACA_LIST_T_TEMPLATE', 'Predložak');
define('_ACA_NO_MAILING_ENTERED', 'Nije odabrano skupno pismo');
define('_ACA_NO_LIST_ENTERED', 'Nije odabrana lista');
define('_ACA_SENT_MAILING' , 'Poslana skupna pisma');
define('_ACA_SELECT_FILE', 'Odaberite datoteku za ');
define('_ACA_LIST_IMPORT', 'Označite listu(e) s kojim će se pretplatnik povezati.');
define('_ACA_PB_QUEUE', 'Pretplatnik je dodan ali postoji problem u njegovom povezivanju s listom. Molimo provjerite ručno.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , 'Preporuča se ažuriranje!');
define('_ACA_UPDATE_MESS2' , 'Zakrpa i mali popravci.');
define('_ACA_UPDATE_MESS3' , 'Novo izdanje.');
define('_ACA_UPDATE_MESS5' , 'Potrebno Joomla 1.5 ažuriranje.');
define('_ACA_UPDATE_IS_AVAIL' , ' dostupno!');
define('_ACA_NO_MAILING_SENT', 'Skupno pismo nije poslano!');
define('_ACA_SHOW_LOGIN', 'Prikazati obrazac za prijavu');
define('_ACA_SHOW_LOGIN_TIPS', 'Odaberite Da ako želite prikazati obrazac za prijavu u Frontendu jNews Kontrolne Ploče, kako bi se korisnici mogli registrirati na sajtu.');
define('_ACA_LISTS_EDITOR', 'Editor opisa liste');
define('_ACA_LISTS_EDITOR_TIPS', 'Odaberite Da ako želite koristiti HTML editor za uređivanje polja opisa liste.');
define('_ACA_SUBCRIBERS_VIEW', 'Pogledaj pretplatnike');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , 'Frontend Postavke' );
define('_ACA_SHOW_LOGOUT', 'Prikazati dugme za odjavu');
define('_ACA_SHOW_LOGOUT_TIPS', 'Odaberite Da ako u jNews kontrolnoj ploči u Frontendu želite prikazivati dugme za odjavu.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integracija');
define('_ACA_CB_INTEGRATION', 'Community Builder Integracija');
define('_ACA_INSTALL_PLUGIN', 'Community Builder Plugin (jNews Integracija) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'jNews Plugin za Community Builder nije instaliran!');
define('_ACA_CB_PLUGIN', 'Liste prilikom registracije');
define('_ACA_CB_PLUGIN_TIPS', 'Odaberite Da ako želite prikazati mailing liste u Community Builder obrascu za registraciju');
define('_ACA_CB_LISTS', 'List ID');
define('_ACA_CB_LISTS_TIPS', 'OVO JE OBVEZNO POLJE. Upišite ID-eve lista na koje će se korisnici moći pretplatiti, ID odvojite zarezom ,  (0 prikazuje sve liste)');
define('_ACA_CB_INTRO', 'Tekst uvoda');
define('_ACA_CB_INTRO_TIPS', 'Tekst koji će se prikazivati prije popisa. OSTAVITE PRAZNO AKO NIŠTA NE ŽELITE PRIKAZATI.  Tekst i izgled možete urediti pomoću HTML tagova.');
define('_ACA_CB_SHOW_NAME', 'Prikazati naziv liste');
define('_ACA_CB_SHOW_NAME_TIPS', 'Odaberite da li nakon uvoda prikazati ili ne prikazati naziv liste.');
define('_ACA_CB_LIST_DEFAULT', 'Standarna check lista');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Odaberite da li želite da se kućica za odabir liste automatski prikazuje kao označena.');
define('_ACA_CB_HTML_SHOW', 'Prikazati Primaj HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'Odaberite Da ako korisnicima želite dozvoliti da odlučuju da li žele primati HTML mailove. Odaberite Ne ako želite da svi primaju html.');
define('_ACA_CB_HTML_DEFAULT', 'Standardni Primaj HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Odaberite ovu opciju za prikazivanje standardne html mailing konfiguracije. Ako je Prikazati Primaj HTML postavljeno na Ne, ovo će biti standardna opcija.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'Backup datoteke nije uspio! Datoteka nije zamijenjena.');
define('_ACA_BACKUP_YOUR_FILES', 'Backup stare verzije datoteka napravljen je u slijedećem direktoriju:');
define('_ACA_SERVER_LOCAL_TIME', 'Lokalno vrijeme servera');
define('_ACA_SHOW_ARCHIVE', 'Prikazati dugme Arhiva');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Odaberite Da za prikazivanje dugmeta Arhiva u Frontendu popisa newslettera');
define('_ACA_LIST_OPT_TAG', 'Tagovi');
define('_ACA_LIST_OPT_IMG', 'Slike');
define('_ACA_LIST_OPT_CTT', 'Sadržaj');
define('_ACA_INPUT_NAME_TIPS', 'Upišite ime i prezime (prvo vaše ime)');
define('_ACA_INPUT_EMAIL_TIPS', 'Upišite vašu email adresu (Adresa mora biti valjana ako želite primati naše poruke.)');
define('_ACA_RECEIVE_HTML_TIPS', 'Odaberite Da ako želite primati HTML poruke - Ne ako želite primati samo tekst poruke');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Odredite vašu vremensku zonu.');

// Since 1.0.5
define('_ACA_FILES' , 'Datoteke');
define('_ACA_FILES_UPLOAD' , 'Upload');
define('_ACA_MENU_UPLOAD_IMG' , 'Upload Slika');
define('_ACA_TOO_LARGE' , 'Datoteka je prevelika. Maksimalna dozvoljena veličina je');
define('_ACA_MISSING_DIR' , 'Odredišni direktorij ne postoji');
define('_ACA_IS_NOT_DIR' , 'Odredišni direktorij ne postoji ili je samo obična datoteka.');
define('_ACA_NO_WRITE_PERMS' , 'Odredišni direktorij nije otvoren za zapisivanje.');
define('_ACA_NO_USER_FILE' , 'Niste odabrali datoteku za upload.');
define('_ACA_E_FAIL_MOVE' , 'Premještanje datoteke nije moguće.');
define('_ACA_FILE_EXISTS' , 'Odredišna datoteka već postoji.');
define('_ACA_CANNOT_OVERWRITE' , 'Odredišna datoteka već postoji, nije ju moguće zamijeniti.');
define('_ACA_NOT_ALLOWED_EXTENSION' , 'Ekstenzija datoteke nije dozvoljena.');
define('_ACA_PARTIAL' , 'Datoteka je samo djelomično uploadirana.');
define('_ACA_UPLOAD_ERROR' , 'Upload greška:');
define('DEV_NO_DEF_FILE' , 'Datoteka je samo djelomično uploadirana.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Ovo će biti zamijenjeno s linkovima za pretplatu.' .
		' Ovo je <strong>obvezno</strong> kako bi jNews ispravno funkcionirao.<br />' .
		'Ako u ovo polje ubaciti bilo koji drugi sadržaj, on će se prikazivati u svim skupnim pismima povezanim s ovom listom.' .
		' <br />Na kraju dodajte svoju poruku pretplatnicima.  jNews će automatski dodati link za pretplatnike putem kojeg će oni moći izmjeniti svoje informacije ili odjaviti pretplatu na listu.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Obavijest');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Obavijesti');
define('_ACA_USE_SEF', 'SEF u mailovima');
define('_ACA_USE_SEF_TIPS', 'Preporuča se da odaberete Ne.  Ali, ako želite da URL u vašim mailovima koristi SEF, onda odaberite Da.' .
		' <br /><b>Linkovi će funkcionirati na isti način u obe opcije.  Opcija Ne osigurat će da linkovi u mailovima uvijek rade, čak i kad izmjenite vaš SEF.</b> ');
define('_ACA_ERR_NB' , 'Greška #: ERR');
define('_ACA_ERR_SETTINGS', 'Greška u radu s postavkama');
define('_ACA_ERR_SEND' ,'Slanje izvješća o greški');
define('_ACA_ERR_SEND_TIPS' ,'Ako želite da jNews bude bolji proizvod, odaberite DA.  Ova opcija poslat će nam izvješća o greškama.  Više ne morate slati bug izvješća ;-) <br /> <b>NE ŠALJE SE NIKAKVA PRIVATNA INFORMACIJA</b>.  Mi čak ni ne znamo s kojeg se sajta šalje izvješće, šaljemo samo informacije o jNews, PHP postavkama i SQL upitima. ');
define('_ACA_ERR_SHOW_TIPS' ,'Odaberite Da za prikazivanje broja greške na ekranu.  Većinom se koristi za debuging svrhu. ');
define('_ACA_ERR_SHOW' ,'Prikazati greške');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Prikazati linkove za odjavu');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Odaberite Da za prikazivanje linkova za odjavu pretplate na dnu skupnog pisma kako bi pretplatnici mogli mijenjati svoje pretplate. <br /> Opcija Ne isključuje footer i linkove.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">VAŽNA OBAVIJEST!</span> <br />Ako vršite ažuriranje iz prethodnih jNews instalacija, morat će te ažurirati strukturu vaše baze podataka klikom na slijedeće dugme (Vaši podaci ostat će netaknuti)');
define('_ACA_UPDATE_INSTALL_BTN' , 'Ažuriraj tablice i konfiguraciju');
define('_ACA_MAILING_MAX_TIME', 'Max vrijeme čekanja' );
define('_ACA_MAILING_MAX_TIME_TIPS', 'Definirajte max, vrijeme za slanje svake grupe mailova koji se šalju iz reda čekanja. Preporuča se između 30 sek i 2 min.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart Integracija');
define('_ACA_VM_COUPON_NOTIF', 'ID kupona obavijesti');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Odredite ID broj skupnog pisma kojeg želite koristiti za slanje kupona vašim kupcima.');
define('_ACA_VM_NEW_PRODUCT', 'ID obavijesti novih proizvoda');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Odredite ID broj skupnog pisma kojeg želite koristiti za slanje obavijesti o novim proizvodima.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Kreiraj obrazac');
define('_ACA_FORM_COPY', 'HTML kod');
define('_ACA_FORM_COPY_TIPS', 'Kopiraj generirani HTML kod u vašu HTML stranicu.');
define('_ACA_FORM_LIST_TIPS', 'Odaberite listu koju želite dodati u obrazac');
// update messages
define('_ACA_UPDATE_MESS4' , 'Automatsko ažuriranje nije moguće.');
define('_ACA_WARNG_REMOTE_FILE' , 'Udaljena datoteka nedostupna.');
define('_ACA_ERROR_FETCH' , 'Greška u pristupu datoteci.');

define('_ACA_CHECK' , 'Provjera');
define('_ACA_MORE_INFO' , 'Dodatni info');
define('_ACA_UPDATE_NEW' , 'Ažuriranje na novu verziju');
define('_ACA_UPGRADE' , 'Ažuriranje u jači proizvod');
define('_ACA_DOWNDATE' , 'Povratak na prethodnu verziju');
define('_ACA_DOWNGRADE' , 'Povratak na temeljni proizvod');
define('_ACA_REQUIRE_JOOM' , 'Zahtijeva Joomla');
define('_ACA_TRY_IT' , 'Isprobajte!');
define('_ACA_NEWER', 'Nikad');
define('_ACA_OLDER', 'Starija');
define('_ACA_CURRENT', 'Sadašnja');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Isprobajte neku od drugih komponenti');
define('_ACA_MENU_VIDEO' , 'Video tutorijali');
define('_ACA_SCHEDULE_TITLE', 'Postavke automatskog rasporeda');
define('_ACA_ISSUE_NB_TIPS' , 'Sistem automatski generira broj izdanja' );
define('_ACA_SEL_ALL' , 'Sva skupna pisma');
define('_ACA_SEL_ALL_SUB' , 'Sve liste');
define('_ACA_INTRO_ONLY_TIPS' , 'Ako označite ovu kućici, u skupno pismo umetnut će se samo uvod članka s linkom Opširnije za nastavak članka na vašem sajtu.' );
define('_ACA_TAGS_TITLE' , 'Tag Sadržaja');
define('_ACA_TAGS_TITLE_TIPS' , 'Kopirajte i zalijepite ovaj tag u skupno pismo na mjesto na koje želite umetnuti ovaj sadržaj.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Odredite email adresu na koju će se poslati test');
define('_ACA_PREVIEW_TITLE' , 'Pregled');
define('_ACA_AUTO_UPDATE' , 'Obavijest o ažuriranju');
define('_ACA_AUTO_UPDATE_TIPS' , 'Odaberite Da ako želite primati obavijesti o novim verzijama i nadopunama komponente. <br />VAŽNO!! Za ovu funkciju potrebno je uključiti opciju Prikazati Savjete.');

// since 1.1.0
define('_ACA_LICENSE' , 'Info o Licenci');

// since 1.1.1
define('_ACA_NEW' , 'Novo');
define('_ACA_SCHEDULE_SETUP', 'Ako želite slati autorespondere, morate u konfiguraciji utvrditi postavke planera.');
define('_ACA_SCHEDULER', 'Planer');
define('_ACA_JNEWSLETTER_CRON_DESC' , 'ako na sajtu nemate pristup upravljanju cron zadacima, možete se registrirati za besplatni jNews Cron račun na:' );
define('_ACA_CRON_DOCUMENTATION' , 'Dodatne informacije o uređivanju jNews Planera možete pronaći na url:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29"
 target="_blank">http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29</a>' );
define( '_ACA_QUEUE_PROCESSED' , 'Red čekanja uspješno procesuiran...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , 'Greška u premještanju importirane datoteke' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , 'Učestalost Planera' );
define( '_ACA_CRON_MAX_FREQ' , 'Max. Učestalost Planera' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , 'Odredite max. učestalost rada Planera ( u minutama ).  Ovo će ograničiti Planer čak i ako je definiran češći cron zadatak.' );
define( '_ACA_CRON_MAX_EMAIL' , 'Max. mailova po zadatku' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , 'Odredite max. broj mailova koji će se slati po pojedinom zadatku (0 neograničeno).' );
define( '_ACA_CRON_MINUTES' , ' minuta' );
define( '_ACA_SHOW_SIGNATURE' , 'Prikazati email footer' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , 'Želite li ili ne promovirati jNews u footeru mailova.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , 'Auto-responderi uspješno procesuirani...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , 'Planirani newsletteri uspješno procesuirani...' );
define( '_ACA_MENU_SYNC_USERS' , 'Sinkronizacija Korisnika' );
define( '_ACA_SYNC_USERS_SUCCESS' , 'Korisnici uspješno sinkronizirani!' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Odjava' );
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Da' );
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Ne' );
if (!defined('_HI')) define( '_HI', 'Pozdrav' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Vrh' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Dno' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Odjava' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , 'Ako odaberete ovu opciju, u mailove će biti umetnut samo naslov članka kao link za cijeli članak na vašem sajtu.');
define('_ACA_TITLE_ONLY' , 'Samo Naslov');
define('_ACA_FULL_ARTICLE_TIPS' , 'Ako odaberete ovu opciju, u mail će se umetnut cijeli članak');
define('_ACA_FULL_ARTICLE' , 'Cijeli Članak');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Odaberite članak koji će se dodati poruci. <br />Kopirajte i zalijepite <b>tag članka</b> u skupno pismo.  Možete odabrati umetanje cijelog teksta, samo uvoda ili samo naslova (odnosno, opcija 0, 1, ili 2). ');
define('_ACA_SUBSCRIBE_LIST2', 'Mailing lista(e)');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Smart-Newsletter');
define('_ACA_MENU_AUTONEWS', 'Smart-Newsletteri');
define('_ACA_AUTO_NEWS_OPTION', 'Smart-Newsletter opcije');
define('_ACA_AUTONEWS_FREQ', 'Newsletter Učestalost');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Odredite kako često će se slati smart-newsletter.');
define('_ACA_AUTONEWS_SECTION', 'Sekcija Članka');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Odredite sekciju iz koje će te odabrati članke.');
define('_ACA_AUTONEWS_CAT', 'Kategorija Članka');
define('_ACA_AUTONEWS_CAT_TIPS', 'Odredite kategoriju iz koje će te odabrati članke (Sve za sve članke u toj sekciji).');
define('_ACA_SELECT_SECTION', 'Odabir sekcije');
define('_ACA_SELECT_CAT', 'Sve kategorije');
define('_ACA_AUTO_DAY_CH8', 'Kvartalno');
define('_ACA_AUTONEWS_STARTDATE', 'Datum početka');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Odredite datum na kojeg će te početi slati Smart Newsletter.');
define('_ACA_AUTONEWS_TYPE', 'Prikazivanje sadržaja');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Cijeli Članak: u newsletteru prikazuje cijeli članak.<br />' .
		'Samo Uvod: u newsletteru prikazuje samo uvod članka.<br/>' .
		'Samo Naslov: u newsletteru prikazuje samo naslov članka.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Ovo će biti zamijenjeno Smart-newsletterom.' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Kreiraj / Pregledaj Mailove');
define('_ACA_LICENSE_CONFIG' , 'Licenca' );
define('_ACA_ENTER_LICENSE' , 'Upiši licencu');
define('_ACA_ENTER_LICENSE_TIPS' , 'Upišite broj licence i spremite ga.');
define('_ACA_LICENSE_SETTING' , 'Postavke Licence' );
define('_ACA_GOOD_LIC' , 'Vaša licenca je valjana.' );
define('_ACA_NOTSO_GOOD_LIC' , 'Vaša licenca nije valjana: ' );
define('_ACA_PLEASE_LIC' , 'Molimo vas da kontaktirate jNews podršku za nadogradnju vaše licence ( license@acajoom.com ).' );
define('_ACA_DESC_PLUS', 'jNews Plus su prvi sekvencionalni auto-responderi za Joomla CMS.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO je sveobuhvatan mailing sistem za Joomla CMS.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , 'Upišite token');

define('_ACA_ENTER_TOKEN_TIPS' , 'Molimo vas da upišete broj tokena kojeg ste primili mailom kad ste kupili jNews. ');

define('_ACA_JNEWSLETTER_SITE', 'jNews sajt:');
define('_ACA_MY_SITE', 'Moj sajt:');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'Kliknite ovdje za odlazak u obrazac za licencu.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , 'Molimo vas da očistite polje za licencu i pokušate ponovno.<br />  Ako je problem i dalje prisutan, ' );

define( '_ACA_LICENSE_SUPPORT' , 'Ako imate dodatnih pitanja, ' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , 'možete dobiti svoj priručnik za licencu tako što će te u obrazac za licencu upisati vaš broj tokena i URL sajta (koji je označen zelenom bojom na vrhu ove stranice). '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', 'Licenca će se automatski generirati nakon spremanja tokena. ' .
		' Token se obično potvrdi u 2 minute.  Međutim, u nekim slučajevima to može potrajati i 15 minuta.<br />' .
		'<br />Provjerite ovu kontrolnu ploču za par minuta.  <br /><br />' .
		'Ako niste primili valjani ključ licence za 15 minuta, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , 'Vaš token još nije potvrđen.');
define( '_ACA_UPDATE_CLICK_HERE' , 'Molimo vas da posjetite <a href="http://www.acajoom.com" target="_blank">www.acajoom.com</a> za download najnovije verzije.');
define( '_ACA_NOTIF_UPDATE' , 'Za primanje obavijesti o novim verzijama upišite svoju email adresu i kliknite subscribe ');

define('_ACA_THINK_PLUS', 'Ako želite više od vašeg mailing sistema, mislite Plus!');
define('_ACA_THINK_PLUS_1', 'Sekvencionalni auto-responderi');
define('_ACA_THINK_PLUS_2', 'Napravite raspored slanja newslettera na određeni datum');
define('_ACA_THINK_PLUS_3', 'Nema više ograničenja servera');
define('_ACA_THINK_PLUS_4', 'i mnogo više...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', 'Pristup Listi' );
define( '_ACA_INFO_LIST_ACCESS', 'Odredite koja grupa korisnika može čitati i pretplatiti se na ovu listu' );
define( 'ACA_NO_LIST_PERM', 'Nemate dozvolu za pretplatu na ovu listu' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Arhiva');
 define('_ACA_MENU_ARCHIVE_ALL', 'Sva Arhiva');

//Archive Lists
 define('_FREQ_OPT_0', 'Nijedna');
 define('_FREQ_OPT_1', 'Svaki tjedan');
 define('_FREQ_OPT_2', 'Svaka 2 tjedna');
 define('_FREQ_OPT_3', 'Svaki mjesec');
 define('_FREQ_OPT_4', 'Svaki kvartal');
 define('_FREQ_OPT_5', 'Svake godine');
 define('_FREQ_OPT_6', 'Drugo');

define('_DATE_OPT_1', 'Datum stvaranja');
define('_DATE_OPT_2', 'Datum izmjena');

define('_ACA_ARCHIVE_TITLE', 'Određivanje učestalosti auto-arhive');
define('_ACA_FREQ_TITLE', 'Učestalost Arhive');
define('_ACA_FREQ_TOOL', 'Odredite kako često želite da vaš Menadžer Arhive arhivira sadržaje vašeg sajta.');
define('_ACA_NB_DAYS', 'Broj Dana');
define('_ACA_NB_DAYS_TOOL', 'Ovo je samo za opciju Drugo! Odredite broj dana između svake arhive.');
define('_ACA_DATE_TITLE', 'Tip Datuma');
define('_ACA_DATE_TOOL', 'Odredite da li će se arhiviranje izvršiti na datum kreiranja ili datum izmjena.');

define('_ACA_MAINTENANCE_TAB', 'Postavke održavanja');
define('_ACA_MAINTENANCE_FREQ', 'Učestalost održavanja');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Odredite učestalost postupka održavanja.' );
define( '_ACA_CRON_DAYS' , 'sat(i)' );

define( '_ACA_LIST_NOT_AVAIL', 'Nema dostupnih lista.');
define( '_ACA_LIST_ADD_TAB', 'Dodaj/Uredi' );

define( '_ACA_LIST_ACCESS_EDIT', 'Pristup Dodaj/Uredi Mail' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Odredite grupu korisnika koja može dodati ili urediti skupno pismo za ovu listu' );
define( '_ACA_MAILING_NEW_FRONT', 'Kreiraj novo Skupno Pismo' );

define('_ACA_AUTO_ARCHIVE', 'Auto-Arhiva');
define('_ACA_MENU_ARCHIVE', 'Auto-Arhiva');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Ovo će biti zamijenjeno brojem izdanja newslettera.');
define('_ACA_TAGS_DATE', '[DATE] = Ovo će biti zamijenjeno datumom slanja.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Ovo će biti zamijenjeno vrijednošću preuzetom iz Community Builder polja: npr. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Održavanje' );

define('_ACA_THINK_PRO', 'Kad imate profesionalne potrebe, koristite profesionalne komponente!');
define('_ACA_THINK_PRO_1', 'Smart-Newsletteri');
define('_ACA_THINK_PRO_2', 'Definirajte stupanj pristupa vašoj listi');
define('_ACA_THINK_PRO_3', 'Definirajte tko može dodati/urediti mailove');
define('_ACA_THINK_PRO_4', 'Više tagova: dodajte vaša CB polja');
define('_ACA_THINK_PRO_5', 'Auto-arhiviranje Joomla članaka');
define('_ACA_THINK_PRO_6', 'Optimizacija baze podataka');

define('_ACA_LIC_NOT_YET', 'Vaša licenca još nije potvrđena.  Molimo vas da provjerite karticu Licenca u Konfiguraciji sajta.');
define('_ACA_PLEASE_LIC_GREEN' , 'Provjerite da li ste našem timu za podršku poslali informaciju istaknutu zelenim slovima na vrhu kartice.' );

define('_ACA_FOLLOW_LINK' , 'Uzmi svoju Licencu');
define( '_ACA_FOLLOW_LINK_TWO' , 'Vašu licencu možete dobiti upisom broja tokena i URL sajta (istaknut zelenom bojom na vrhu ove stranice) u obrazac za licencu. ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Zatim kliknite na Primjeni dugme u gornjem desnom izborniku.' );
define( '_ACA_ENTER_LIC_NB', 'Upišite vašu Licencu' );
define( '_ACA_UPGRADE_LICENSE', 'Nadogradite vašu Licencu');
define( '_ACA_UPGRADE_LICENSE_TIPS' , 'Ako ste primili token za ažuriranje vaše licence, upišite ga ovdje pa zatim kliknite na Primjeni i nastavite na broj <b>2</b> da bi dobili svoj novi broj licence.' );

define( '_ACA_MAIL_FORMAT', 'Format Kodiranja' );
define( '_ACA_MAIL_FORMAT_TIPS', 'Koji format kodiranja želite koristiti za vaša skupna pisma, samo za Tekst ili MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Ako nemate pristup upravljanju cron zadacima na vašem sajtu, možete koristiti besplatnu jCron komponentu za kreiranje cron zadataka.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Prikazati Ime Autora');
define('_ACA_SHOW_AUTHOR_TIPS', 'Odaberite Da ako želite članku kojeg dodajete u skupno pismo dodati i ime autora članka');

//since 1.3.5
define('_ACA_REGWARN_NAME','Upišite svoje ime.');
define('_ACA_REGWARN_MAIL','Upišite valjanu email adresu.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','Ako odaberete Da, email korisnika dodat će se kao parametar na kraju vašeg URL-a preusmjeravanja (link preusmjeravanja za vaš modul ili za vanjski jNews obrazac).<br/>Ovo može biti korisno kad želite izvršiti neku posebnu skriptu na vašoj stranici preusmjeravanja.');
define('_ACA_ADDEMAILREDLINK','Dodaj e-mail u link preusmjeravanja');

//since 1.6.3
define('_ACA_ITEMID','ItemId');
define('_ACA_ITEMID_TIPS','Ovaj ItemId dodat će se vašim jNews linkovima.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','Prikazati integriranu karticu za jCalPRO <br/>(samo ako je jCalPRO instaliran na vašem sajtu!)');
define('_ACA_JCALTAGS_TITLE','jCalPRO Tag:');
define('_ACA_JCALTAGS_TITLE_TIPS','Kopiraj i zalijepi ovaj tag u skupno pismo, na mjesto na koje želite umetnuti događaj.');
define('_ACA_JCALTAGS_DESC','Opis:');
define('_ACA_JCALTAGS_DESC_TIPS','Odaberite Da ako želite umetnuti opis događaja');
define('_ACA_JCALTAGS_START','Datum početka:');
define('_ACA_JCALTAGS_START_TIPS','Odaberite Da ako želite umetnuti datum početka događaja');
define('_ACA_JCALTAGS_READMORE','Opširnije:');
define('_ACA_JCALTAGS_READMORE_TIPS','Odaberite Da ako želite umetnuti <b>link Opširnije</b> za ovaj događaj');
define('_ACA_REDIRECTCONFIRMATION','URL preusmjeravanja');
define('_ACA_REDIRECTCONFIRMATION_TIPS','Ako trebate e-mail potvrde, korisnik će nakon klika na link potvrde biti potvrđen i preusmjeren na ovaj URL.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Spremi');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Nemate korisnički račun?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Registracija');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','Niste ovlašteni za pregled ovih podataka.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP','Isključiti Objašnjenje');
define('_ACA_DISABLETOOLTIP_TIPS', 'Isključiti objašnjenja u Frontendu');
define('_ACA_MINISENDMAIL', 'Koristiti Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS', 'Ako vaš server koristi Mini SendMail, odaberite ovu opciju koja neće dodati ime korisnika u zaglavlje emaila');

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