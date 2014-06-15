<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>
Serbian language file</p>
* @author Dušan Evetović <dusan@evetovic.rs>
* @version $Id: serbian_lat.php 491 2010-05-14 15:07:13Z divivo $
* @link http://www.ijoobi.com
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'jNews komponenta je alat za rukovanje mailing listama, automatsko odgovaranje i prađenje napravljena sa ciljem da komunikaciju sa vašim korisnicima učini lakšom i efikasnijom.  jNews, Vaš komunikacioni partner!');
define('_ACA_DESC_GPL', 'jNews komponenta je alat za rukovanje mailing listama, automatsko odgovaranje i prađenje napravljena sa ciljem da komunikaciju sa vašim korisnicima učini lakšom i efikasnijom.  jNews, Vaš komunikacioni partner!');
define('_ACA_FEATURES', 'jNews, Vaš komunikacioni partner!');

// Type of lists
define('_ACA_NEWSLETTER', 'Bilten');
define('_ACA_AUTORESP', 'Automatski odgovarač');
define('_ACA_AUTORSS', 'Automatski RSS');
define('_ACA_ECARD', 'eCard');
define('_ACA_POSTCARD', 'Razglednica');
define('_ACA_PERF', 'Učinak');
define('_ACA_COUPON', 'Kupon');
define('_ACA_CRON', 'Tajming');
define('_ACA_MAILING', 'Prepiska');
define('_ACA_LIST', 'Lista');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Rukovanje listom');
define('_ACA_MENU_SUBSCRIBERS', 'Prijavi me');
define('_ACA_MENU_NEWSLETTERS', 'Bilteni');
define('_ACA_MENU_AUTOS', 'Automatski odgovori');
define('_ACA_MENU_COUPONS', 'Kuponi');
define('_ACA_MENU_CRONS', 'Tajminzi');
define('_ACA_MENU_AUTORSS', 'Automatski RSS');
define('_ACA_MENU_ECARD', 'eKarte');
define('_ACA_MENU_POSTCARDS', 'Razglednice');
define('_ACA_MENU_PERFS', 'Performanse');
define('_ACA_MENU_TAB_LIST', 'Liste');
define('_ACA_MENU_MAILING_TITLE', 'Prepiske');
define('_ACA_MENU_MAILING', 'Prepiska: ');
define('_ACA_MENU_STATS', 'Statistika');
define('_ACA_MENU_STATS_FOR', 'Statistika: ');
define('_ACA_MENU_CONF', 'Podešavanje');
define('_ACA_MENU_UPDATE', 'Ažuriranje');
define('_ACA_MENU_ABOUT', 'Vizit karta');
define('_ACA_MENU_LEARN', 'Centar za obuku');
define('_ACA_MENU_MEDIA', 'Rukovanje medijama');
define('_ACA_MENU_HELP', 'Pomoc');
define('_ACA_MENU_CPANEL', 'Kontrolni panel');
define('_ACA_MENU_IMPORT', 'Uvoz');
define('_ACA_MENU_EXPORT', 'Izvoz');
define('_ACA_MENU_SUB_ALL', 'Prijavi sve');
define('_ACA_MENU_UNSUB_ALL', 'Odjavi sve');
define('_ACA_MENU_VIEW_ARCHIVE', 'Arhiva');
define('_ACA_MENU_PREVIEW', 'Pregled');
define('_ACA_MENU_SEND', 'Slanje');
define('_ACA_MENU_SEND_TEST', 'Slanje test pisma');
define('_ACA_MENU_SEND_QUEUE', 'Redosled slanja');
define('_ACA_MENU_VIEW', 'Pregled');
define('_ACA_MENU_COPY', 'Kopiranje');
define('_ACA_MENU_VIEW_STATS', 'Statistika pregleda');
define('_ACA_MENU_CRTL_PANEL', ' Kontrolni panel');
define('_ACA_MENU_LIST_NEW', ' Nova lista');
define('_ACA_MENU_LIST_EDIT', ' Uredjivanje liste');
define('_ACA_MENU_BACK', 'Nazad');
define('_ACA_MENU_INSTALL', 'Instalacija');
define('_ACA_MENU_TAB_SUM', 'Sumiranje');
define('_ACA_STATUS', 'Status');

// messages
define('_ACA_ERROR', ' Došlo je do greške ! ');
define('_ACA_SUB_ACCESS', 'Prava pristupa');
define('_ACA_DESC_CREDITS', 'Kreatori');
define('_ACA_DESC_INFO', 'Informacija');
define('_ACA_DESC_HOME', 'Polazna stranica');
define('_ACA_DESC_MAILING', 'Mailing lista');
define('_ACA_DESC_SUBSCRIBERS', 'Prijavljeni');
define('_ACA_PUBLISHED', 'Objavljeno');
define('_ACA_UNPUBLISHED', 'Povučeno');
define('_ACA_DELETE', 'Brisanje');
define('_ACA_FILTER', 'Filter');
define('_ACA_UPDATE', 'Ažuriranje');
define('_ACA_SAVE', 'Snimanje');
define('_ACA_CANCEL', 'Odustani');
define('_ACA_NAME', 'Ime');
define('_ACA_EMAIL', 'Email');
define('_ACA_SELECT', 'Izaberi!');
define('_ACA_ALL', 'Svi');
define('_ACA_SEND_A', 'Slanje: ');
define('_ACA_SUCCESS_DELETED', ' uspešno obrisano');
define('_ACA_LIST_ADDED', 'Lista je uspešno kreirana');
define('_ACA_LIST_COPY', 'Lista je uspešno kopirana');
define('_ACA_LIST_UPDATED', 'Lista je uspešno ažurirana');
define('_ACA_MAILING_SAVED', 'Dopisivanje uspešno sačuvano.');
define('_ACA_UPDATED_SUCCESSFULLY', 'uspešno ažurirano.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Informacije o primaocu');
define('_ACA_VERIFY_INFO', 'Proverite uneti link, neke informacije nedostaju.');
define('_ACA_INPUT_NAME', 'Ime');
define('_ACA_INPUT_EMAIL', 'Email');
define('_ACA_RECEIVE_HTML', 'HTML format?');
define('_ACA_TIME_ZONE', 'Vremenska zona');
define('_ACA_BLACK_LIST', 'Crna lista');
define('_ACA_REGISTRATION_DATE', 'Datum registracije korisnika');
define('_ACA_USER_ID', 'ID korisnika');
define('_ACA_DESCRIPTION', 'Opis');
define('_ACA_ACCOUNT_CONFIRMED', 'Registracija je aktivirana.');
define('_ACA_SUB_SUBSCRIBER', 'Pretplatnik');
define('_ACA_SUB_PUBLISHER', 'Izdavač');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Registrovan');
define('_ACA_SUBSCRIPTIONS', 'Prijava');
define('_ACA_SEND_UNSUBCRIBE', 'Slanje poruke za odjavljivanje');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Kliknite na Da ako želite ako želite slanje maila za potvrdu odjavljivanja!');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Molimo, potvrdite svoju prijavu!');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Potvrda odjavljivanja');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Poštovani(a) [NAME]!<br />
<br />
Za dovršetak procesa prijave potreban je još jedan korak . Kliknite na sledeći link da biste potvrdili prijavu!<br />
<br />[CONFIRM]<br /><br />
Ukoliko imate dodatnih pitanja, obratite se webmasteru!<br />
');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Poštovani(a) [NAME]!<br />
<br />
Ovo je poruka kojom možete potvrditi svoju odluku da se odjavite sa naše liste . Žao nam je što ste doneli ovakvu odluku. Ukoliko odlučite da se ponovo prijavite, to uvek možete uraditi na našem sajtu. Ukoliko imate dodatnih pitanja, obratite se našem webmasteru!<br />
');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Datum prijavljivanja');
define('_ACA_CONFIRMED', 'Potvrđeno');
define('_ACA_SUBSCRIB', 'Prijavljivanje');
define('_ACA_HTML', 'HTML poruka');
define('_ACA_RESULTS', 'Rezultati');
define('_ACA_SEL_LIST', 'Izaberite listu!');
define('_ACA_SEL_LIST_TYPE', '- Izaberite tip liste! -');
define('_ACA_SUSCRIB_LIST', 'Puna lista pretplatnika');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Pretplatnici : ');
define('_ACA_NO_SUSCRIBERS', 'U ovoj listi nema pretplatnika.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Poslali smo vam pismo sa uputstvima za dovršetak procesa prijavljivanja. Proverite svoje poštansko sanduče i kliknite na link za potvrđivanje prijave u našem pismu.');
define('_ACA_SUCCESS_ADD_LIST', 'Uspešno ste dodati na mailing listu.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Kliknite ovde za potvrdu prijave!');
define('_ACA_UNSUBSCRIBE_LINK', 'Kliknite ovde za odjavu!');
define('_ACA_UNSUBSCRIBE_MESS', 'Vaša email adresa uspešno je izbrisana iz liste!');

define('_ACA_QUEUE_SENT_SUCCESS', 'Sva pisma su uspešno poslata.');
define('_ACA_MALING_VIEW', 'Pregled prepiske');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Sigurni ste da želite da se odjavite sa liste?');
define('_ACA_MOD_SUBSCRIBE', 'Prijavljivanje');
define('_ACA_SUBSCRIBE', 'Prijavljivanje');
define('_ACA_UNSUBSCRIBE', 'Odjavljivanje');
define('_ACA_VIEW_ARCHIVE', 'Pregled arhive');
define('_ACA_SUBSCRIPTION_OR', ' ili kliknite ovde za promenu vaših podataka!');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Ova email adresa već postoji u listi.');
define('_ACA_SUBSCRIBER_DELETED', 'Pretplatnik je uspešno obrisan.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Kontrolni panel korisnika');
define('_UCP_USER_MENU', 'Korisnički meni');
define('_UCP_USER_CONTACT', 'Moje mailing liste');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Upravljanje tajmerom');
define('_UCP_CRON_NEW_MENU', 'Novi tajming');
define('_UCP_CRON_LIST_MENU', 'Moja lista tajmera');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Upravljanje kuponima');
define('_UCP_COUPON_LIST_MENU', 'Lista kupona');
define('_UCP_COUPON_ADD_MENU', 'Novi kupon');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Opis');
define('_ACA_LIST_T_LAYOUT', 'Izgled');
define('_ACA_LIST_T_SUBSCRIPTION', 'Prijavljivanje');
define('_ACA_LIST_T_SENDER', 'Informacije o pošiljaocu');

define('_ACA_LIST_TYPE', 'Tip liste');
define('_ACA_LIST_NAME', 'Naziv liste');
define('_ACA_LIST_ISSUE', 'Broj izdanja');
define('_ACA_LIST_DATE', 'Datum slanja');
define('_ACA_LIST_SUB', 'Predmet');
define('_ACA_ATTACHED_FILES', 'Prikačeni fajlovi');
define('_ACA_SELECT_LIST', 'Izaberite listu koju želite urediti!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Tip liste');
define('_ACA_AUTO_RESP_OPTION', 'Opcije automatskog odgovora');
define('_ACA_AUTO_RESP_FREQ', 'Pretplatnici mogu izabrati učestalost');
define('_ACA_AUTO_DELAY', 'Zadrška (u danima)');
define('_ACA_AUTO_DAY_MIN', 'Minimalna učestalost');
define('_ACA_AUTO_DAY_MAX', 'Maksimalna učestalost');
define('_ACA_FOLLOW_UP', 'Podešavanja utomatskog odgovaranja');
define('_ACA_AUTO_RESP_TIME', 'Pretplatnici mogu izabrati vreme');
define('_ACA_LIST_SENDER', 'Lista pošiljalaca');

define('_ACA_LIST_DESC', 'Opis liste');
define('_ACA_LAYOUT', 'Izgled');
define('_ACA_SENDER_NAME', 'Ime pošiljaoca');
define('_ACA_SENDER_EMAIL', 'Email adresa pošiljaoca');
define('_ACA_SENDER_BOUNCE', 'Adresa za odgovor pošiljaoca');
define('_ACA_LIST_DELAY', 'Zadrška');
define('_ACA_HTML_MAILING', 'HTML pismo?');
define('_ACA_HTML_MAILING_DESC', '(ako izmenite ovo, morate snimiti i vratiti se na ovu stranicu da biste videli promene.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Sakriti za posetioce sajta?');
define('_ACA_SELECT_IMPORT_FILE', 'Izaberite fajl za uvoz!');;
define('_ACA_IMPORT_FINISHED', 'Uvoz je završen');
define('_ACA_DELETION_OFFILE', 'Brisanje fajla');
define('_ACA_MANUALLY_DELETE', 'nije uspelo, morate ručno izbrisati fajl');
define('_ACA_CANNOT_WRITE_DIR', 'Nije moguće pisati u direktorijumu');
define('_ACA_NOT_PUBLISHED', 'Pismo ne može da se pošalje, lista nije objavljena.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Kliknite ovde da objavite listu!');
define('_ACA_INFO_LIST_NAME', 'Ovde dajte ime liste! Pod ovim imenom možete identifikovati listu!');
define('_ACA_INFO_LIST_DESC', 'Dajte kratki opis liste! Ovaj opis videće i pretplatnici.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Unesite ime pošiljaoca pisma! Ovo ime videće pretplatnici kada dobiju pismo sa liste.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Unesite email adresu sa koje se pisma šalju.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Unesite email adresu na koju pretplatnici mogu odgovoriti. Preporučujemo da ona bude ista kao adresa pošiljaoca, inače će spam filteri da ocene poruku kao veći rizik.');
define('_ACA_INFO_LIST_AUTORESP', 'Izaberite tip prepiske za ovu listu!<br />
Mailing lista: normalna mailing lista <br />
Automatsko odgovaranje: lista koja šalje pisma u određenim vremenskim razmacima.');
define('_ACA_INFO_LIST_FREQUENCY', 'Korisnici mogu izabrati koliko često da dobiju pismo. Ovo omogućuje veću fleksibilnost korisniku.');
define('_ACA_INFO_LIST_TIME', 'Korisnici mogu izabrati doba dana kada žele da dobiju poruku.');
define('_ACA_INFO_LIST_MIN_DAY', 'Kolika da bude minimalna učestalost kojom korisnici dobijaju pisma?');
define('_ACA_INFO_LIST_DELAY', 'Kolika da bude zadrška između prethodnog i ovog automatskog pisma?');
define('_ACA_INFO_LIST_DATE', 'Unesite datum objavljivanja i slanja pisma, ako ste podesili slanje sa zadrškom!<br />
 Format datuma: YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Kolika da bude maksimalna učestalost kojom korisnici dobijaju pisma?');
define('_ACA_INFO_LIST_LAYOUT', 'Unesite izgled svoje mailing liste. Možete zadati bilo kakav izgled.');
define('_ACA_INFO_LIST_SUB_MESS', 'Ovo pismo se šalje korisnicima kada se prvi put prijave na listu. Možete uneti bilo kakav tekst.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Ovo pismo se šalje pretplatnicima kada se odjave sa liste. Možete uneti bilo kakav tekst.');
define('_ACA_INFO_LIST_HTML', 'Štiklirajte kućicu ako želite da se pisma šalju u HTML formi. Pretplatnici mogu birati da li žele da primaju HTML ili tekstualna pisma, ako se prijave na listu koja šalje pisma u HTML formatu.');
define('_ACA_INFO_LIST_HIDDEN', 'Kliknite DA ako želite da sakrijete listu sa stranica dostupnih korisnicima, novi korisnici tada neće moći da se prijave, ali će pisma i dalje moći da se šalju.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Da li želite da se korisnici automatski upišu na listu?<br />
<B>Novi korisnici:</B> Svaki novi registrovani korisnik sajta postaje ujedno i pretplatnim mailing liste.<br />
<B>Svi korisnici:</B> svi registrovani korisnici sajta postaju i pretplatnici liste.<br />
(ove opcije podržavaju Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Izaberite nivo pristupa stranicama sajta! Ovim možete prikazati ili sakriti listu onim korisnicima koji nemaju pravo pristupa, znači ne mogu se prijaviti.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Izaberite nivo pristupa one grupe kojoj želite omogućiti uređivanje. Ova grupa, kao i grupe sa većim pravima pristupa, mogu uređivati liste i slati pisma ili sa sajta ili iz administrativnog dela sajta.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Ako želite da utomatski odgovarač pređe na sledeći zadatak čim pošalje poslednju poruku, ovde navedite sledeći automatski odgovarač.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Ovo je ID osobe koja je kreirala listu.');
define('_ACA_INFO_LIST_WARNING', '   Ova poslednja opcija dostupna je samo jednom kod kreiranja liste.');
define('_ACA_INFO_LIST_SUBJET', ' Predmet liste. Ovaj tekst ide u predmet (Subject) poruke.');
define('_ACA_INFO_MAILING_CONTENT', 'Ovo je telo (Body) poruke koju želite poslati.');
define('_ACA_INFO_MAILING_NOHTML', 'Unesite telo (Body) poruke koju želite poslati onim pretplatnicima koji primaju samo pisma u tekstualnom formatu. <BR/>
 Primedba: ako ovo ostavite prazno, biće poslat tekstualni deo HTML pisma.');
define('_ACA_INFO_MAILING_VISIBLE', 'Kliknite DA ako želite da se mailing lista vidi na stranicama sajta.');
define('_ACA_INSERT_CONTENT', 'Ubacite postojeći sadržaj');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Kupon je uspešno poslat!');
define('_ACA_CHOOSE_COUPON', 'Izaberite kupon!');
define('_ACA_TO_USER', ' ovom korisniku');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Svakog sata');
define('_ACA_FREQ_CH2', 'Svakih 6 sati');
define('_ACA_FREQ_CH3', 'Svakih 12 sati');
define('_ACA_FREQ_CH4', 'Dnevno');
define('_ACA_FREQ_CH5', 'Nedeljno');
define('_ACA_FREQ_CH6', 'Mesečno');
define('_ACA_FREQ_NONE', 'Ne');
define('_ACA_FREQ_NEW', 'Novi korisnici');
define('_ACA_FREQ_ALL', 'Svi korisnici');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews tajmer?');
define('_ACA_LABEL_FREQ_TIPS', 'Kliknite DA ako želite korisititi AjcomCron za tajmer, NE ako želite koristiti drugi tajmer.<br />
Ako kliknete DA, no morate uneti adresu tajmera, ona će biti dodata automatski.');
define('_ACA_SITE_URL', 'URL vašeg sajta');
define('_ACA_CRON_FREQUENCY', 'Učestalost');
define('_ACA_STARTDATE_FREQ', 'Početni datum');
define('_ACA_LABELDATE_FREQ', 'Unesite datum!');
define('_ACA_LABELTIME_FREQ', 'Unesite vreme!');
define('_ACA_CRON_URL', 'URL tajmera');
define('_ACA_CRON_FREQ', 'Učestalost');
define('_ACA_TITLE_CRONLIST', 'Lista tajmera');
define('_NEW_LIST', 'Nova lista');

//title CRON form
define('_ACA_TITLE_FREQ', 'Uređivanje tajmera');
define('_ACA_CRON_SITE_URL', 'Unestite važeći URL, počnite sa http://!');

### Mailings ###
define('_ACA_MAILING_ALL', 'Sve prepiske');
define('_ACA_EDIT_A', 'Uređivanje: ');
define('_ACA_SELCT_MAILING', 'Za dodavanje nove prepiske izaberite listu iz padajućeg menija!');
define('_ACA_VISIBLE_FRONT', 'Vidljivo na sajtu');

// mailer
define('_ACA_SUBJECT', 'Predmet');
define('_ACA_CONTENT', 'Sadržaj');
define('_ACA_NAMEREP', '[NAME] = Skript će ovo zameniti imenom i prezimenom korisnika, čime ćete dobiti personalizovanu poruku.<br />
');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Skript će ovo zameniti imenom korisnika.<br />
');
define('_ACA_NONHTML', 'Tekstualna verzija');
define('_ACA_ATTACHMENTS', 'Prilozi');
define('_ACA_SELECT_MULTIPLE', 'Držite pritisnut Ctrl (ili Command) taster da biste izabrali više priloga.<br />
Fajlove sa liste izabranih priloga možete smestiti u posebnom direktorijumu, koji možete izabrati u konfiguracionom panelu.');
define('_ACA_CONTENT_ITEM', 'Stavka sadržaja');
define('_ACA_SENDING_EMAIL', 'Slanje pisma');
define('_ACA_MESSAGE_NOT', 'Pismo ne može biti poslato');
define('_ACA_MAILER_ERROR', 'Greška kod slanja');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Pismo je uspešno poslato');
define('_ACA_SENDING_TOOK', 'Slanje pisma je trajalo ');
define('_ACA_SECONDS', 'sekundi');
define('_ACA_NO_ADDRESS_ENTERED', 'Nije zadat pretplatnik ili email adresa!');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Promena');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Promena prijave?');
define('_ACA_WHICH_EMAIL_TEST', 'Navedite email adresu na koju će test pismo biti poslato ili izaberite pregled!');
define('_ACA_SEND_IN_HTML', 'Slanje u HTML formatu (kod HTML pisama)?');
define('_ACA_VISIBLE', 'Vidljivo');
define('_ACA_INTRO_ONLY', 'Samo uvod');

// stats
define('_ACA_GLOBALSTATS', 'Globalna statistika');
define('_ACA_DETAILED_STATS', 'Detaljna statistika');
define('_ACA_MAILING_LIST_DETAILS', 'Detalji liste');
define('_ACA_SEND_IN_HTML_FORMAT', 'Slanje u HTML formatu');
define('_ACA_VIEWS_FROM_HTML', 'Pregledi (samo kod HTML pisama)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Slanje u tekstualnom obliku');
define('_ACA_HTML_READ', 'HTML pročitano');
define('_ACA_HTML_UNREAD', 'HTML nepročitano');
define('_ACA_TEXT_ONLY_SENT', 'Samo tekst');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Pismo');
define('_ACA_LOGGING_CONFIG', 'Dnevnici i statistike');
define('_ACA_SUBSCRIBER_CONFIG', 'Pretplatnici');
define('_ACA_MISC_CONFIG', 'Ostalo');
define('_ACA_MAIL_SETTINGS', 'Podešavanja pisma');
define('_ACA_MAILINGS_SETTINGS', 'Podešavanje prepiske');
define('_ACA_SUBCRIBERS_SETTINGS', 'Podešavanje pretplatnika');
define('_ACA_CRON_SETTINGS', 'Podešavanje tajmera');
define('_ACA_SENDING_SETTINGS', 'Podešavanje slanja');
define('_ACA_STATS_SETTINGS', 'Podešavanje statistike');
define('_ACA_LOGS_SETTINGS', 'Podešavanje dnevnika');
define('_ACA_MISC_SETTINGS', 'Ostala podešavanja');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Adresa pošiljaoca <br/>
(tu stižu odgovori na sva vaša pisma)');
define('_ACA_SEND_MAIL_NAME', 'Ime pošiljaoca');
define('_ACA_MAILSENDMETHOD', 'Način slanja pisama');
define('_ACA_SENDMAILPATH', 'Putanja do Sendmail programa');
define('_ACA_SMTPHOST', 'SMTP server');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP autentikacija neophodna');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Izaberite DA ako SMTP server zahteva autentikaciju');
define('_ACA_SMTPUSERNAME', 'SMTP korisničko ime');
define('_ACA_SMTPUSERNAME_TIPS', 'Unesite SMTP korisničko ime ako vaš SMTP server zahteva autentikaciju!');
define('_ACA_SMTPPASSWORD', 'SMTP lozinka');
define('_ACA_SMTPPASSWORD_TIPS', 'Unesite SMTP lozinku ako vaš SMTP server zahteva autentikaciju!');
define('_ACA_USE_EMBEDDED', 'Koristi ugrađene slike');
define('_ACA_USE_EMBEDDED_TIPS', 'Unesite DA ako želite da sed HTML pisama slike iz priloga ugrade u telo poruke, NE ako želite poslati linkove ka slikama u prilogu u mailu.');
define('_ACA_UPLOAD_PATH', 'Putanja do priloga/uploada');
define('_ACA_UPLOAD_PATH_TIPS', 'Ovde možete zadati direktorijum za upload.<br />
Proverite da li direktorijum postoji, ako ne, onda ga kreirajte!');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Dozvoli neregistrovanim');
define('_ACA_ALLOW_UNREG_TIPS', 'Izaberite DA ako želite da dozvolite neregistrovanim korisnicima sajta da se pretplate na listu.');
define('_ACA_REQ_CONFIRM', 'Neophodna je potvrda');
define('_ACA_REQ_CONFIRM_TIPS', 'Izaberite DA ako želite da novi korisnici potvrde svoju email adresu.');
define('_ACA_SUB_SETTINGS', 'Podešavanje prijavljivanja');
define('_ACA_SUBMESSAGE', 'Pismo za prijavljivanje');
define('_ACA_SUBSCRIBE_LIST', 'Prijavljivanje na listu');

define('_ACA_USABLE_TAGS', 'Tagovi koji se mogu kosristiti');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Kreira link na koji pretplatnik mora kliknuti kako bi potvrdio prijavljivanje. Ovo je <strong>neophodno</strong> za ispravno funkcionisanje jNews-a..<br />
<br />
[NAME] = Menja se imenom i prezimenom pretplatnika, čime se pismo dodatno personalizuje.<br />
<br />
[FIRSTNAME] = Menja se imenom pretplatnika.');
define('_ACA_CONFIRMFROMNAME', 'Potvrdi ime pošiljaoca');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Unesite ime pošiljaoca koje će se pojaviti na listi potvrđenih!');
define('_ACA_CONFIRMFROMEMAIL', 'Potvrda email adrese pošiljaoca');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Unesite email adresu pošiljaoca koja će se pojaviti na listi potvrđenih!');
define('_ACA_CONFIRMBOUNCE', 'Email adresa za odgovor');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Unesite email adresu za odgovor koja će se pojaviti na listi potvrđenih!');
define('_ACA_HTML_CONFIRM', 'Potvrda HTML formata');
define('_ACA_HTML_CONFIRM_TIPS', 'Izaberite DA ako želite potvrditi slanje pisma u HTML formatu kada je pretplatnik izabrao HTML pisma.');
define('_ACA_TIME_ZONE_ASK', 'Upit vremenske zone');
define('_ACA_TIME_ZONE_TIPS', 'Izaberite DA ako želite pitati pretplatnika za njegovu vremensku zonu. Pismo će biti poslato u skladu sa vremenskom zonom pretplatnika, ako je to moguće.');

 // Cron Set up
define('_ACA_AUTO_CONFIG', 'Tajmer');
define('_ACA_TIME_OFFSET_URL', 'Kliknite ovde kako biste podesili zadršku kod slanja pisama na tabu Local Globalnih podešavanja');
define('_ACA_TIME_OFFSET_TIPS', 'Podešava zadršku kod servera, kako bi podaci o datumu i vremenu bili tačni');
define('_ACA_TIME_OFFSET', 'Vremenska razlika');
define('_ACA_CRON_DESC', '<br />
Pomoću tajmera možete podesiti izvršavanje određenih zadataka na vašem Joomla sajtu!<br />
Za njegovo podešavanje treba uneti sledeće podešavanje u Tahmer tabu vašeg kontrolnog panela:<br />
<b>' . ACA_JPATH_LIVE . '/index.php?option=com_jnewsletter&act=cron</b> <br /><br />
Ako vam treba pomoć , potražite naš forum na adresi <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a> ');
// sending settings
define('_ACA_PAUSEX', 'Sačekaj x sekundi kod svake konfiguriane količine pisama');
define('_ACA_PAUSEX_TIPS', 'Unesite broj sekundi koliko jNews čeka pre slanja naredne količine pisama.');
define('_ACA_EMAIL_BET_PAUSE', 'Pisama između pauza');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Broj pisama koja se šalju odjednom.');
define('_ACA_WAIT_USER_PAUSE', 'Čekanje na input korisnika kod pauze');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Da li da program čeka na input korisnika između dve ture pisama?');
define('_ACA_SCRIPT_TIMEOUT', 'Tajmaut skripta');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Vreme (u minutima) koje program može da radi (0 za neograničeno vreme).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Omogući statistike pregleda');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Izaberite DA ako želite da se broj pregleda unosi u dnevnik. Moguće samo kod HTML pisama');
define('_ACA_LOG_VIEWSPERSUB', 'Unošenje pregleda u dnevnik po pretplatniku');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Izaberite DA ako želite da se u dnevnik unose upisi o broju pregleda za svakog pretplatnika. Moguće samo kod HTML pisama');
// Logs settings
define('_ACA_DETAILED', 'Detaljni denvnik');
define('_ACA_SIMPLE', 'Jednostavni dnevnik');
define('_ACA_DIAPLAY_LOG', 'Prikaži dnevnik');
define('_ACA_DISPLAY_LOG_TIPS', 'Izaberite DA ako želite prikazati dnevnik dok šaljete pisma.');
define('_ACA_SEND_PERF_DATA', 'Performanse slanja');
define('_ACA_SEND_PERF_DATA_TIPS', 'Izaberite DA ako dozvoljavate da se pošalje anonimni izveštaj o podešavanjima, broju pretplatnika i vremenu koje je bilo potrebnom za slanje. Ovo će nam omogućiti uvid u performanse jNewsa i omogućiti da ga usavršimo tokom budućeg razvoja.');
define('_ACA_SEND_AUTO_LOG', 'Pošalji dnevnik za automatski odgovarač .');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Izaberite DA ako želite da se pošalje mail kod svakog pisma koji sistem pošalje. Upozorenje: ovo može da znači veliki broj pisama.');
define('_ACA_SEND_LOG', 'Slanje dnevnika');
define('_ACA_SEND_LOG_TIPS', 'Da li da se pošalje dnevnik slanja na email adresu korisnika koji je poslao pisma?');
define('_ACA_SEND_LOGDETAIL', 'Slanje detaljnog dnevnika');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Informacije o tome da li je slanje pisma svakom korisniku uspelo ili nije, kao i pregled informacija. Jednostavni dnevnik šalje samo pregled informacija.');
define('_ACA_SEND_LOGCLOSED', 'Slanje dnevnika ako se veza prekine');
define('_ACA_SEND_LOGCLOSED_TIPS', 'Ako je ova opcija uključena, korisnik koji je poslao pisma biće u svakom slučaju obavešten.');
define('_ACA_SAVE_LOG', 'Sačuvaj dnevnik');
define('_ACA_SAVE_LOG_TIPS', 'Da li da se zapis o slanju doda u dnevnik?');
define('_ACA_SAVE_LOGDETAIL', 'Sačuvaj detalje u dnevnik');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Informacije o tome da li je slanje pisma svakom korisniku uspelo ili nije, kao i pregled informacija. Jednostavni dnevnik šalje samo pregled informacija.');
define('_ACA_SAVE_LOGFILE', 'Čuvanje fajla dnevnika');
define('_ACA_SAVE_LOGFILE_TIPS', 'To je fajl u koji se upisuje dnevnik. Fajl je velik, i veličina mu se stalno povećava.');
define('_ACA_CLEAR_LOG', 'Brisanje dnevnika');
define('_ACA_CLEAR_LOG_TIPS', 'Briše sadržaj dnevnika.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Poslednji izvršen zadatak');
define('_ACA_CP_TOTAL', 'Svega');
define('_ACA_MAILING_COPY', 'Prepiska uspešno izakopirana!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Koristi vodič');
define('_ACA_SHOW_GUIDE_TIPS', 'Prikaži vodič na početku upotrebe kako bi novi korisnici lakše kreirali svoje prvo pismo, automatski odgovarač i lakše podesili jNews.');
define('_ACA_AUTOS_ON', 'Koristi automatski odgovarač');
define('_ACA_AUTOS_ON_TIPS', 'Izaberite NE ako ne želite koristiti automatski odgovarač (auto-responder). Time će sve opcije automatskog odgovarača biti isključene.');
define('_ACA_NEWS_ON', 'Koristi mailing liste');
define('_ACA_NEWS_ON_TIPS', 'Izaberite NE ako ne želite koristiti mailing liste. SVe opcije vezane za mailing liste biće isključene.');
define('_ACA_SHOW_TIPS', 'Prikaži saveta');
define('_ACA_SHOW_TIPS_TIPS', 'Prikazuje savete da Vam olakša korišćenje jNews-a.');
define('_ACA_SHOW_FOOTER', 'Prikaži podnožje');
define('_ACA_SHOW_FOOTER_TIPS', 'Da li da se prikaže podnožje (Footer) sa kopirajt stavkama?');
define('_ACA_SHOW_LISTS', 'Prikaži liste na stranicama');
define('_ACA_SHOW_LISTS_TIPS', 'Kada korisnici nisu registrovani, prikaži spisak lista na sajtu tako da korisnici mogu da se prijave ili registruju.');
define('_ACA_CONFIG_UPDATED', 'Detalji podešavanja su ažurirani!');
define('_ACA_UPDATE_URL', 'URL za ažuriranje');
define('_ACA_UPDATE_URL_WARNING', 'Pažnja! Nemojte menjati URL ako nemate eksplicitnu dozvolu jNews-a za to.<br />
');
define('_ACA_UPDATE_URL_TIPS', 'Na primer: http://www.ijoobi.com/update/ (obavezno uneti i kosu crtu na kraju)');

// module
define('_ACA_EMAIL_INVALID', 'Data email adresa je nevažeća!');
define('_ACA_REGISTER_REQUIRED', 'Registrujte se pre prijavljivanja!');

// Access level box
define('_ACA_OWNER', 'Kreator liste:');
define('_ACA_ACCESS_LEVEL', 'Unesite nivo pristupa za listu!');
define('_ACA_ACCESS_LEVEL_OPTION', 'Opcije nivoa pristupa');
define('_ACA_USER_LEVEL_EDIT', 'Izaberite nivo pristupa koji omogućuje uređivanje mailing liste, i sa sajta, i iz administracije sajta');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Dnevno');
define('_ACA_AUTO_DAY_CH2', 'Dnevno, osim vikendom');
define('_ACA_AUTO_DAY_CH3', 'Dvodnevno');
define('_ACA_AUTO_DAY_CH4', 'Dvodnevno, osim vikendom');
define('_ACA_AUTO_DAY_CH5', 'Nedeljno');
define('_ACA_AUTO_DAY_CH6', 'Dvonedeljno');
define('_ACA_AUTO_DAY_CH7', 'Mesečno');
define('_ACA_AUTO_DAY_CH9', 'Godišnje');
define('_ACA_AUTO_OPTION_NONE', 'Ne');
define('_ACA_AUTO_OPTION_NEW', 'Novi korisnici');
define('_ACA_AUTO_OPTION_ALL', 'Svi korisnici');

//
define('_ACA_UNSUB_MESSAGE', 'Pismo za odjavljivanje');
define('_ACA_UNSUB_SETTINGS', 'Podešavanja odjavljivanja');
define('_ACA_AUTO_ADD_NEW_USERS', 'Automatsko prijavljivanje korisnika?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Trenutno nema novih ažuriranja.');
define('_ACA_VERSION', 'jNews verzija');
define('_ACA_NEED_UPDATED', 'Fajlovi za ažuriranje:');
define('_ACA_NEED_ADDED', 'Fajlovi za dodavanje:');
define('_ACA_NEED_REMOVED', 'Fajlovi za brisanje:');
define('_ACA_FILENAME', 'Naziv fajla :');
define('_ACA_CURRENT_VERSION', 'Aktuelna verzija:');
define('_ACA_NEWEST_VERSION', 'Najsvežija verzija:');
define('_ACA_UPDATING', 'Ažuriranje');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Fajlovi su uspešno ažurirani.');
define('_ACA_UPDATE_FAILED', 'Ažuriranje nije uspelo');
define('_ACA_ADDING', 'Dodavanje');
define('_ACA_ADDED_SUCCESSFULLY', 'Uspešno dodato.');
define('_ACA_ADDING_FAILED', 'Dodavanje nije uspelo!');
define('_ACA_REMOVING', 'Brisanje');
define('_ACA_REMOVED_SUCCESSFULLY', 'Uspešno obrisano.');
define('_ACA_REMOVING_FAILED', 'Brisanje nije uspelo!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Instaliraj drugu verziju');
define('_ACA_CONTENT_ADD', 'Dodaj sadržaj');
define('_ACA_UPGRADE_FROM', 'Uvoz podataka (pisma i podaci o pretplatnicima) iz');
define('_ACA_UPGRADE_MESS', 'Postojeći podaci nisu izloženi opasnosti.<br />
Operacija samo uvozi podatke u jNews bazu.');
define('_ACA_CONTINUE_SENDING', 'Nastavak slanja');

// jNews message
define('_ACA_UPGRADE1', 'Könnyen importálhatja a felhasználókat és a hírleveleket: ');
define('_ACA_UPGRADE2', ' az jNewsba a frissítési panelen.');
define('_ACA_UPDATE_MESSAGE', 'Nova verzija jNews je dostupna! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Kliknite ovde za ažuriranje!');
define('_ACA_THANKYOU', 'Köszönjük, hogy az jNews-ot, az Ön kommunikációs partnerét választotta!');
define('_ACA_NO_SERVER', 'A frissítõ szerver nem érhetõ el, ellenõrizze késõbb!');
define('_ACA_MOD_PUB', 'Az jNews modul még nincs publikálva!');
define('_ACA_MOD_PUB_LINK', 'Kattintson ide a publikáláshoz!');
define('_ACA_IMPORT_SUCCESS', 'Sikeresen importálva');
define('_ACA_IMPORT_EXIST', 'A feliratkozó már az adatbázisban van');

// jNews's Guide
define('_ACA_GUIDE', ' varázsló');
define('_ACA_GUIDE_FIRST_ACA_STEP', '
<p>Az jNews számtalan sajátsággal rendelkezik, ez a varázsló végig vezeti Önt négy egyszerû lépésen, amellyel el tudja készíteni hírleveleit és automatikus válaszolóit!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Elsõ lépésként létre kell hozni egy listát. Egy lista két típus egyike lehet vagy hírlevél vagy automatikus válaszoló. A listában paraméterekkel lehet szabályozni a hírlevelek küldését és és az automatikus válaszolók mûködését: küldõ neve, kialakítás, feliratkozók üdvözlõ üzenetei stb.<br /><br />Itt készítheti el az elsõ listát: <a href="index2.php?option=com_jnewsletter&act=list" >lista készítés</a> és kattintson a New gombon!');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'Az jNews lehetõséget nyújt egy korábbi hírlevél rendszervõl adatok importálására.<br />Menjen a Frissítés panelre és válassza ki azt a hírlevél rendszert, ahonnan importálni szeretné a hírleveleket és a feliratkozókat.<br /><br /><span style="color:#FF5E00;" >Fontos: az importálás nem érinti a korábbi hírlevél rendszer adatait.</span><br />Az importálás után a levelezéseket és a feliratkozókat közvetlenül az jNews-ban tudja kezelni.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Gratulákunk, elkészült az elsõ lista!  Megírhatja az elsõ valamit: %s.  Ehhet menjen ide: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Automatikus válaszoló kezelõ');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Hírlevél kezelõ');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' és válassza ki: %s. <br />Majd válassza: %s a legördülõ listában. Az elsõ levelezés elkészítéséhez kattintson a New gombra!');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Mielõtt elküldi az elsõ hírlevelet, be kell állítani a levelezési konfigurációt. Menjen a <a href="index2.php?option=com_jnewsletter&act=configuration" >beállítások oldalra</a> ellenõrizni a beállításokat. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Ha ez kész, menjen vissza a Hírlevelek menübe és válassza ki a levelet és kattintson a Küldés gombra!');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Az elsõ automatikus véálaszoló hasznlatához egy idõzítõt kell beállítania a szerveren. Keresse meg a beállítások panelen az Idõzítõ fület! <a href="index2.php?option=com_jnewsletter&act=configuration" >Kattintson ide</a> az idõzítõ beállításával kapcsolatps további információkért!<br />');

define('_ACA_GUIDE_MODULE', ' <br />Ellenõrizze, hogy publikálta-e az jNews modult, amivel a érdeklõdõk feliratkozhatnak a listára.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Beállíthatja az automatikus válaszolót is.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Beállíthat egy hírlevelet is!');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Ön készen áll a hatékony kapcsolatra látogatóival és felhasználóival. Ez a varázsló befejezi mûködését, amint elkészíti a második levelezést vagy kikapcsolhatja <a href="index2.php?option=com_jnewsletter&act=configuration" >beállítások panelen</a>.<br /><br />Ha kérdése van az jNews, használatával kapcsolatban, használja a <a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >fórumot</a>! Emellett számos információt is talál, hogy kommunikáljon hatékonyan a feliratkozókkal a <a href="http://www.ijoobi.com/" target="_blank">www.ijoobi.com</a> oldalán.<p /><br /><b>Köszönjük, hogy az jNews-ot használja. Az Ön kommunikációs partnere!</b> ');
define('_ACA_GUIDE_TURNOFF', 'A varázsló kikapcsolásra kerül.');
define('_ACA_STEP', 'lépés ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews beállítás');
define('_ACA_INSTALL_SUCCESS', 'Sikeres telepítés');
define('_ACA_INSTALL_ERROR', 'Telepítési hiba');
define('_ACA_INSTALL_BOT', 'jNews beépülõ (robot)');
define('_ACA_INSTALL_MODULE', 'jNews modul');
//Others
define('_ACA_JAVASCRIPT', 'Figyelem: A Javascript-et engedélyezni kell a megfelelõ mûködéshez.');
define('_ACA_EXPORT_TEXT', 'Az exportált feliratkozók a válaszott listán alapulnak.<br />Feliratkozók exportálása listából');
define('_ACA_IMPORT_TIPS', 'Feliratkozók importálása. A fájlban levõ tartalomnak az alábbi formátumúnak kell lennie: <br />Name,Email,ReceiveHTML(1/0),<span style="color: rgb(255, 0, 0);">Registered(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'már létezõ feliratkozó');
define('_ACA_GET_STARTED', 'Kattintson ide az indításhoz!');

//News since 1.0.1
define('_ACA_WARNING_1011', 'Figyelem: 1011: A frissítés nem mûködik, mert a szerver visszautasította.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Válassza ki, melyik email cím jelenjen meg küldõként!');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Válassza ki, milyen név jelenjen meg küldõként!');
define('_ACA_MAILSENDMETHOD_TIPS', 'Válassza ki milyen levélküldõt szeretne jasználni: PHP mail függvény, <span>Sendmail</span> or SMTP szerver.');
define('_ACA_SENDMAILPATH_TIPS', 'Ez a levél szerver könyvtára');
define('_ACA_LIST_T_TEMPLATE', 'Sablon');
define('_ACA_NO_MAILING_ENTERED', 'Nincs levelezés megadva');
define('_ACA_NO_LIST_ENTERED', 'Nincs lista megadva');
define('_ACA_SENT_MAILING', 'Levelek elküldése');
define('_ACA_SELECT_FILE', 'Válasszon egy fájlt: ');
define('_ACA_LIST_IMPORT', 'Ellenõrizze a listát, amelyhez feliratkozókat szeretne hozzárendelni.');
define('_ACA_PB_QUEUE', 'A feliratkozó be lett szúrva de probléma van vele a listához csatolásnál. Ellenõrizze manuálisan!');
define('_ACA_UPDATE_MESS', '');
define('_ACA_UPDATE_MESS1', 'A frissítés erõsen ajánlott!');
define('_ACA_UPDATE_MESS2', 'Folt és kisebb javítások.');
define('_ACA_UPDATE_MESS3', 'Új kiadás.');
define('_ACA_UPDATE_MESS5', 'Joomla 1.5 szükséges a frissítéshez.');
define('_ACA_UPDATE_IS_AVAIL', ' elérhetõ!');
define('_ACA_NO_MAILING_SENT', 'Nem lett elküldve levél!');
define('_ACA_SHOW_LOGIN', 'Bejelentkezési ûrlap megjelenítése');
define('_ACA_SHOW_LOGIN_TIPS', 'Válasszon Igen-t, ha szeretné, hogy a bejelentkezési ûrlap megjelenjen az jNews webes felületének vezérlõpultján, hogy a felhasználók regisztrálhassanak a webhelyen..');
define('_ACA_LISTS_EDITOR', 'Lista leíró szerkesztõ');
define('_ACA_LISTS_EDITOR_TIPS', 'Válasszon Igen-t HTML szövegszerkesztõ használatához a a lista leírásának mezõjében.');
define('_ACA_SUBCRIBERS_VIEW', 'Feliratkozók megtekintése');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', 'Webes beállítások');
define('_ACA_SHOW_LOGOUT', 'Kijelentkezés gomb megjelenítése');
define('_ACA_SHOW_LOGOUT_TIPS', 'Válassza az Igen-t, ha meg akarja jeleníteni a Kijelentkezés gombot az AcaJoom vezérlõpult webes felületén.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integráció');
define('_ACA_CB_INTEGRATION', 'Community Builder integráció');
define('_ACA_INSTALL_PLUGIN', 'Community Builder beépülõ (jNews integráció) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'Az jNews beépülõ a Community Builderbe még nincs telepítve!');
define('_ACA_CB_PLUGIN', 'Listák regisztráláskor');
define('_ACA_CB_PLUGIN_TIPS', 'Válassza az Igen-t, ha a levelezõ listákat meg akarja jeleníteni a Community Builder regisztrációs ûrlapján');
define('_ACA_CB_LISTS', 'Lista azonosítók');
define('_ACA_CB_LISTS_TIPS', 'EZ KÖTELEZÕ MEZÕ. Adja meg a listák azonosítóját vesszõvel elválasztva, amely ekre a felhasználó feliratkozhat . (0 az összes listát megjeleníti)');
define('_ACA_CB_INTRO', 'Bevezetõ szöveg');
define('_ACA_CB_INTRO_TIPS', 'A lista elõtt megjelenõ szöveg. HAGYJA ÜRESEN, HA NEM AKAR MEGJELENÍTENI SEMMIT!. Használja a cb_pretext-et a CSS-hez!.');
define('_ACA_CB_SHOW_NAME', 'Listanév megjelenítése');
define('_ACA_CB_SHOW_NAME_TIPS', 'Döntse el, hogy szeretné-e megjeleníteni a listaneveket a bevezetõ után!');
define('_ACA_CB_LIST_DEFAULT', 'Listák bejelölése alapértelmezésként');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Döntse el, hogy szeretné-e alapértelmezésként bejelölni minden listát!');
define('_ACA_CB_HTML_SHOW', 'HTML formátumban?');
define('_ACA_CB_HTML_SHOW_TIPS', 'Válassza az Igen-t, ha a felhasználók eldönthetik, hogy szeretnének-e HTML leveleket vagy sem. Állítsa Nem-re, ha alapértelmezésként HTML levelet akar használni!');
define('_ACA_CB_HTML_DEFAULT', 'Alapértelmezetten HTML formátumban?');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Állítsa be ezt a lehetõséget az alapértelmezett HTML levelezési beállítások megjelenítéséhez! Ha a HTML formátumban? bejegyzés Nem, akkor ez az opció lesz az alapértelmezett.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'A fájlrõl nem készíthetõ biztonsági másolat! A fájl nem került lecserélésre.');
define('_ACA_BACKUP_YOUR_FILES', 'A fájlok régebbi verziója mentésre került a következõ könyvtárban:');
define('_ACA_SERVER_LOCAL_TIME', 'Helyi szerver idõ');
define('_ACA_SHOW_ARCHIVE', 'Archívum gomb megjelenítése');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Válasszon Igen-t a hírlevelek listájának végén az Archívum gomb megjelenítéséhez');
define('_ACA_LIST_OPT_TAG', 'Kódok');
define('_ACA_LIST_OPT_IMG', 'Képek');
define('_ACA_LIST_OPT_CTT', 'Tartalom');
define('_ACA_INPUT_NAME_TIPS', 'Adja meg a teljes nevét (a keresztnevével kezdje)!');
define('_ACA_INPUT_EMAIL_TIPS', 'Adja meg az email címét! Ellenõrizze, hogy ez egy valódi email cím, ha valóban szeretne hírleveletet kapni!');
define('_ACA_RECEIVE_HTML_TIPS', 'Válasszon Igen-t, ha HTML hírleveleket szeretne kapni - vagy Nem-et, ha csak szöveges hírleveleket.');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Adja meg az idõzónáját!');

// Since 1.0.5
define('_ACA_FILES', 'Fájlok');
define('_ACA_FILES_UPLOAD', 'Feltöltés');
define('_ACA_MENU_UPLOAD_IMG', 'Képek feltöltése');
define('_ACA_TOO_LARGE', 'A fájl mérete túl nagy. A maximális méret:');
define('_ACA_MISSING_DIR', 'A célkönyvtár nem létezik');
define('_ACA_IS_NOT_DIR', 'A célkönyvtár nem létezik vagy pedig egy szabályos fájl.');
define('_ACA_NO_WRITE_PERMS', 'A célkönyvtáron nincs írási jog.');
define('_ACA_NO_USER_FILE', 'Nem válaszotta ki a feltöltendõ fájlt!');
define('_ACA_E_FAIL_MOVE', 'A fájl nem helyezhetõ át!');
define('_ACA_FILE_EXISTS', 'A célfájl már létezik.');
define('_ACA_CANNOT_OVERWRITE', 'A célfájl már létezik vagy nem írható felül.');
define('_ACA_NOT_ALLOWED_EXTENSION', 'Nem engedélyezett fájlkiterjesztés.');
define('_ACA_PARTIAL', 'A fájl csak részben került feltöltésre.');
define('_ACA_UPLOAD_ERROR', 'Feltöltési hiba:');
define('DEV_NO_DEF_FILE', 'A fájl csak részben került feltöltésre.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Ez lecserélésre kerül a feliratkozási linkekkel. Ez <strong>szükséges</strong> az jNews helyes mûködéséhez.<br />Ha bármilyen más tartalmat helyez el ebben a dobozban, ez a lista összes levelezésében meg fog jelenni.<br />Tegye a saját feiratkozási üzeneteit a végére Az jNews automatikusan hozzáadja a feliratkozás megváltoztatásához és a leiratkozáshoz szükséges linkeket.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Értesítés');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Értesítések');
define('_ACA_USE_SEF', 'SEF a levelezésben');
define('_ACA_USE_SEF_TIPS', 'Ajánlott a nem választása. Ha szeretné, hogy a levelezésben használt URL használja a SEF-et, akkor válassza az igent!<br /><b>A linkek mindegyik opcióhoz ugyanúgy mûködnek. Nem biztos, hogy a levelezésben a linkek mindig mûködnek, ha megváltozik a SEF.</b> ');
define('_ACA_ERR_SETTINGS', 'Hibakezelõ beállítások');
define('_ACA_ERR_SEND', 'Hiba jelentés küldése');
define('_ACA_ERR_SEND_TIPS', 'Ha szeretné, hogy az jNews jobb termékké váljon, válassza az Igen-t! Ez hibajelentést küld a fejlesztõknek. Így nem szükséges hibakutatást végeznie.<br /> <b>SEMMILYEN MAGÁNJELLEGÛ INFORMÁCIÓNEM KERÜL ELKÜLDÉSRE</b>. Még azt sem fogják tudni, melyik webhelyrõl érkezik a hibajelentés. Csak az Acojoomról kapnak informciót, a PHP beállításokról és az SQL lekérdezésekrõl. ');
define('_ACA_ERR_SHOW_TIPS', 'Válasszon Igen-t a hiba sorszámának megjelenítéséhez a képernyõn. Fõleg hibakeresésre lehet használni. ');
define('_ACA_ERR_SHOW', 'Hibák megjelenítése');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Leiratkozási linkek megtekintése');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Válasszon Igen-t a leiratkozáso linkek megjelenítéséhez  a levél alján, ahol a felhasználók megváltoztathatják a feliratkozásaikat. <br /> A Nem letiltja a láblécet és a linkeket.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">FONTOS MEGJEGYZÉS!</span> <br />Ha korábbi jNews verzióról frissít, frissíteni kell az adatbázis struktúrát is a következõ gombra kattintva (az adatok integritása megmarad)');
define('_ACA_UPDATE_INSTALL_BTN', 'A táblák és a beállítások frissítése');
define('_ACA_MAILING_MAX_TIME', 'Maximális várakozási idõ');
define('_ACA_MAILING_MAX_TIME_TIPS', 'Megadja azt a maximális idõt, ameddig a leveleknek várakozniuk kell asorban. Az ajánlott érték 30 másodperc és 2 perc közöztt van.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart integráció');
define('_ACA_VM_COUPON_NOTIF', 'Kupon értesítési azonosító');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Megadja a levelezés azonosítószámát, amit kuponok küldésekor szeretne használni.');
define('_ACA_VM_NEW_PRODUCT', 'Új termék értesítés azonosító');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Megadja a levelezés azonosítószámát, amit új termék értesítésnél szeretne használni.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Ûrlap létrehozása');
define('_ACA_FORM_COPY', 'HTML kód');
define('_ACA_FORM_COPY_TIPS', 'Másolja a generált HTML kódot a HTML oldalra!');
define('_ACA_FORM_LIST_TIPS', 'Válassza ki a listából az ûrlapba beszúrandó tartalmat!');
// update messages
define('_ACA_UPDATE_MESS4', 'Nem frissíthetõ automatikusan.');
define('_ACA_WARNG_REMOTE_FILE', 'Távoli fájl nem érhetõ el.');
define('_ACA_ERROR_FETCH', 'Hiba a fájl elérésekor.');

define('_ACA_CHECK', 'Ellenõrzés');
define('_ACA_MORE_INFO', 'További infó');
define('_ACA_UPDATE_NEW', 'Frissítés újabb verzióra');
define('_ACA_UPGRADE', 'Frissítés a legfrissebb termékre');
define('_ACA_DOWNDATE', 'Visszaállás elõzõ verzióra');
define('_ACA_DOWNGRADE', 'Vissza az alaptermékre');
define('_ACA_REQUIRE_JOOM', 'Joomla szükséges');
define('_ACA_TRY_IT', 'Próbálja ki!');
define('_ACA_NEWER', 'Újabb');
define('_ACA_OLDER', 'Régebbi');
define('_ACA_CURRENT', 'Aktuális');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Próbáljon ki egyet a többi komponens közül!');
define('_ACA_MENU_VIDEO', 'Videó bemutatók');
define('_ACA_SCHEDULE_TITLE', 'Automatikus idõbeállító funkció beállítása');
define('_ACA_ISSUE_NB_TIPS', 'A kiadás számának automatikus generálása');
define('_ACA_SEL_ALL', 'Összes levelezés');
define('_ACA_SEL_ALL_SUB', 'Összes lista');
define('_ACA_INTRO_ONLY_TIPS', 'Ha kipipálja ezt a dobozt, csak a cikk bevezetõ szövege kerül be a levélbe egy Tovább linkkel.');
define('_ACA_TAGS_TITLE', 'Tartalom kód');
define('_ACA_TAGS_TITLE_TIPS', 'Vágólapon keresztül tegye ezt a kódot a levél, ahol a tartalmat szeretné elhelyezni.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Jelzi az email címet, ahova a tesztet el kell küldeni');
define('_ACA_PREVIEW_TITLE', 'Elõnézet');
define('_ACA_AUTO_UPDATE', 'Új frissítési értesítés');
define('_ACA_AUTO_UPDATE_TIPS', 'Válasszon Igen-t, ha szeretne értesítést a komponens frissítésérõl! <br />
FONTOS! A tippek megjelenítése szükséges ennek afunkciónak a mûködéséhez.');

// since 1.1.0
define('_ACA_LICENSE', 'Licensz információ');

// since 1.1.1
define('_ACA_NEW', 'Új');
define('_ACA_SCHEDULE_SETUP', 'Az automatikus válaszoló mûködéséhez be kell állítani az idõzítõt a beállításoknál..');
define('_ACA_SCHEDULER', 'Idõzítõ');
define('_ACA_JNEWSLETTER_CRON_DESC', 'ha nincs hozzáférése a webhelyen az idõzítõ feladat kezelõhöz, regisztrálhat egy ingyenes jNews idõzítõt itt:');
define('_ACA_CRON_DOCUMENTATION', 'Az jNews idõzítõ beállításaihoz további információkat itt talál:');
define('_ACA_CRON_DOC_URL', '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>');
define( '_ACA_QUEUE_PROCESSED', 'A feladatsor sikeresen feldolgozásra került...');
define( '_ACA_ERROR_MOVING_UPLOAD', 'Hiba az importált fájl mozgatása közben');

//since 1.1.2
define( '_ACA_SCHEDULE_FREQUENCY', 'Idõzítõ gyakoriság');
define( '_ACA_CRON_MAX_FREQ', 'Idõzítõ maximális gyakoriság');
define( '_ACA_CRON_MAX_FREQ_TIPS', 'Adja meg azt a maximális gykoriságot, amikor az idõzítõ fut (percekben).  Ez korlázozza az idõzítõt még akkor is, ha az idõzítõ feladat gyakorisága ennél rövidebb idõre van beállítva.');
define( '_ACA_CRON_MAX_EMAIL', 'Feladatonkénti maximális levélszám');
define( '_ACA_CRON_MAX_EMAIL_TIPS', 'Megadja meg a feladatonként elküldhetõ levelek maximális számát (0 - korlátlan).');
define( '_ACA_CRON_MINUTES', ' perc');
define( '_ACA_SHOW_SIGNATURE', 'Levél lábléc megjelenítése');
define( '_ACA_SHOW_SIGNATURE_TIPS', 'Megjelenjen-e az jNews-ot népszerûsítõ lábléc a levelekben.');
define( '_ACA_QUEUE_AUTO_PROCESSED', 'Az automatikus válaszolók feladatai sikeresen feldolgozva...');
define( '_ACA_QUEUE_NEWS_PROCESSED', 'Az idõzített hírlevelek feldolgozása sikeres...');
define( '_ACA_MENU_SYNC_USERS', 'Felhasználók szinkronizásása');
define( '_ACA_SYNC_USERS_SUCCESS', 'A felhasználók szinkronizásása sikeres!');

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Kijelentkezés');
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Da');
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Ne');
if (!defined('_HI')) define( '_HI', 'Pozdrav!');
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Gore');
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Dole');
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Odjava');

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', 'Ha ezt kijelöli, csak a teljes cikkre mutató cikk cím kerül be linkként a levélbe.');
define('_ACA_TITLE_ONLY', 'Csak cím');
define('_ACA_FULL_ARTICLE_TIPS', 'Ha ezt kijelöli, a levélbe a cikk teljes tartalma bekerül');
define('_ACA_FULL_ARTICLE', 'Teljes cikk');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Válasszon ki egy tartalmi elemet, amely bekerül a levélba.<br />
Vágólapon keresztül helyezze el a <b>tartalom kódot</b> a levélbe!  Választhatja a teljes szöveget, csak a bevezetõt vagy csak a címet (0, 1, vagy 2). ');
define('_ACA_SUBSCRIBE_LIST2', 'Levelezõ listák');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Gyors hírlevél');
define('_ACA_MENU_AUTONEWS', 'Gyors hírlevelek');
define('_ACA_AUTO_NEWS_OPTION', 'Gyors hírlevél opciók');
define('_ACA_AUTONEWS_FREQ', 'Hírlevél gyakoriság');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Adja meg azt a gyakoriságot, ami szerint küldeni szeretné a gyors hírleveleket!');
define('_ACA_AUTONEWS_SECTION', 'Cikk szekció');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Válassza ki a szekciót, amelybõl cikket szeretne kijelölni!');
define('_ACA_AUTONEWS_CAT', 'Cikk kategória');
define('_ACA_AUTONEWS_CAT_TIPS', 'Válassza ki a kategóriát, amelybõl cikket szeretne kijelölni (Mind - összes cikk az adott szekcióból)!');
define('_ACA_SELECT_SECTION', 'Válasszon szekciót!');
define('_ACA_SELECT_CAT', 'Összes kategória');
define('_ACA_AUTO_DAY_CH8', 'Negyedévente');
define('_ACA_AUTONEWS_STARTDATE', 'Kezdõ dátum');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Adja meg azt a kezdõ dátumot, amitõl a gyors hírleveleket küldeni szeretné!');
define('_ACA_AUTONEWS_TYPE', 'Tartalom összeállítás');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Teljes cikk: a teljes cikk bekerül a levélbe<br />' .		'Csak bevezetõ: csak a cikk bevezetõje kerül be a levélbe<br/>' .		'Csak cím: csak a cikk címe kerül be a levélbe');
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
define('_ACA_DESC_PLUS', 'Az jNews Plus az elsõ szekvenciális automatikus válaszoló komponens Joomla rendszerre.  ' . _ACA_FEATURES);
define('_ACA_DESC_PRO', 'Az jNews PRO egy fejlett hírlevélküldõ rendszer Joomla rendszerre.  ' . _ACA_FEATURES);

//since 1.1.4
define('_ACA_ENTER_TOKEN', 'Adja meg az azonosítót!');

define('_ACA_ENTER_TOKEN_TIPS', 'Adja meg azt az azonosítót, amit emailben kapott meg az jNews megvásárlásakor!<br />Ezután mentsen! Az jNews automatikusan kapcsolódik a szerverhez egy licenszszám lekéréséhez.');

define('_ACA_JNEWSLETTER_SITE', 'jNews webhely:');
define('_ACA_MY_SITE', 'Webhelyem:');

define( '_ACA_LICENSE_FORM', ' ' .	'Kattintson ide a licensz ûrlaphoz ugráshoz!</a>');
define('_ACA_PLEASE_CLEAR_LICENSE', 'Törölje a licensz mezõt ás próbálja meg újra!<br />Ha a probléma továbba is fennáll, ');

define( '_ACA_LICENSE_SUPPORT', 'A még mindig van kérdése, ' . _ACA_PLEASE_LIC);

define( '_ACA_LICENSE_TWO', 'a Licensz ûrlapon lekérheti a licenszet kézi módszerrel is az azonosító és a saját webhely URL megadásával (amelyik zöld színnek jelenik meg ennek az oldalnak a felsõ részén). ' . _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT);

define('_ACA_ENTER_TOKEN_PATIENCE', 'Az azonosító mentése után automatikusan egy licensz kód generálódik. Az azonosító általában 2 percen belül ellenõrzésre kerül, de bizonyos esetekben 15 percig is eltarthat..<br /><br />Térjen vissza erre az ellenõrzésre néhány perc mulva!<br /><br />Ha nem kap érvényes licensz kódot 15 percen belül, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET', 'A megadott azonosító még nem lett ellenõrizve.');
define( '_ACA_UPDATE_CLICK_HERE', 'Látogasson el a <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> oldalra a legfrissebb verzió letöltéséhez.');
define( '_ACA_NOTIF_UPDATE', 'Ahhoz, hogy értesüljön az új frissítésekrõl, adja meg az email címét és kattintson a Feliratkozás linkre!');

define('_ACA_THINK_PLUS', 'Ha többet szeretne kihozni levelezõ rendszerébõl, gondoljon a Plus verzióra!');
define('_ACA_THINK_PLUS_1', 'Szekvenciális automatikus válaszolók');
define('_ACA_THINK_PLUS_2', 'Hírlevél idõzítése egy elõre megadott idõpontra!');
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
define('_ACA_FREQ_TOOL', 'Adja meg, hogy milyen gyakran arhíválja az Archívum kezelõ a webhelye tartalmát!.');
define('_ACA_NB_DAYS', 'Napok száma');
define('_ACA_NB_DAYS_TOOL', 'Ez csak az Egyéb opcióra vonatkozik! Adja meg a napok számát két archíválás között!');
define('_ACA_DATE_TITLE', 'Dátum típus');
define('_ACA_DATE_TOOL', 'Adja meg, hogy a létrehozás dátuma vagy a módosítás dátuma alapján archíváljon!');

define('_ACA_MAINTENANCE_TAB', 'Karbantartási beállítások');
define('_ACA_MAINTENANCE_FREQ', 'Karbantartási gyakoriság');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Adja meg azt a gyakoriságot, amikor a karbantartási mûvelet lefut!');
define( '_ACA_CRON_DAYS', 'óra');

define( '_ACA_LIST_NOT_AVAIL', 'Jelenleg nincs elérhetõ lista.');
define( '_ACA_LIST_ADD_TAB', 'Hozzáad/szerkeszt');

define( '_ACA_LIST_ACCESS_EDIT', 'Levelezés hozzáférés hozzáadás/szerkesztés');
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Adja meg azt a felhasználói csoportot, amely bõvítheti vagy szerkesztheti ehhez az listához tartozó levelezéseket!');
define( '_ACA_MAILING_NEW_FRONT', 'Új levelezés létrehozás');

define('_ACA_AUTO_ARCHIVE', 'Auto-Archívál');
define('_ACA_MENU_ARCHIVE', 'Auto-Archívál');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Lecserélõdik a hírlevél kiadás számára.');
define('_ACA_TAGS_DATE', '[DATE] = Lecserélõdik a küldés dátumára.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Lecserélõdik a Community Builder mezõjének értékére: pl.: [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Joobi Care');

define('_ACA_THINK_PRO', 'Professzionális igényekhez professzionális komponensek!');
define('_ACA_THINK_PRO_1', 'Okos hírlevelek');
define('_ACA_THINK_PRO_2', 'Adja meg a hozzáférés szintjét a listához!');
define('_ACA_THINK_PRO_3', 'Adja meg, hogy ki szerkeszthet/adhat hozzá levelezést!');
define('_ACA_THINK_PRO_4', 'További adatok: adja hozzá saját CB mezõit!');
define('_ACA_THINK_PRO_5', 'A Joomla tartalmaz Auto-archiválást!');
define('_ACA_THINK_PRO_6', 'Adatbázis optimalizálás');

define('_ACA_LIC_NOT_YET', 'Az Ön licensze még nem érvényes. Ellenõrizze a Licensz fület a konfigurációs panelen!');
define('_ACA_PLEASE_LIC_GREEN', 'Ügyeljen, hogy friss és valódi információkat adjon támogató csoportunknak ennek a fülnek a tetején!');

define('_ACA_FOLLOW_LINK', 'Licensz kérés');
define( '_ACA_FOLLOW_LINK_TWO', 'Kérheti licenszét azonosítója és webhelyének URL-je megadásával (amelyik zöld színnel jelenik meg az oldal tetején) a Licensz ûrlapban.');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Majd kattintson az Alkalmaz gombon a jobb felsõ menüben!');
define( '_ACA_ENTER_LIC_NB', 'Írja be a licenszét!');
define( '_ACA_UPGRADE_LICENSE', 'Licensz frissítése');
define( '_ACA_UPGRADE_LICENSE_TIPS', 'Ha kapott azonosítót a licensz frissítéséhez, azt itt adja meg, majd kattintson az Alkalmaz gombon és folytassa a <b>2.</b> lépéssel licensz számának lekéréséhez!');

define( '_ACA_MAIL_FORMAT', 'Kódolási formátum');
define( '_ACA_MAIL_FORMAT_TIPS', 'Milyen kódolási formát szeretne használni levelezéseiben: csak szöveges vagy MIME');
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Ha nincs hozzáférése a webhelyén idõzítõ kezelõhöz, használhatja az ingyenes jCron komponenst az idõzítési feladatok megoldására!');

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'A szerzõ nevének megjelenítése');
define('_ACA_SHOW_AUTHOR_TIPS', 'Válasszon Igen-t, ha a szerzõ nevét is el szeretné helyezni a levélbe elhelyezett cikknél!');

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