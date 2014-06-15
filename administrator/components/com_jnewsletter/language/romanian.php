<?php
if ( !defined('_JEXEC') && defined('_VALID_MOS') ) define( '_JEXEC', true ); defined('_JEXEC') or die('...Direct Access to this location is not allowed...');

/**
* <p>Romanian language file</p>
* @author Alex Cojocaru <alexcojocaru@gmail.com>
* @version $Id: romanian.php 491 2010-02-03 22:56:07Z divivo $
* @link http://www.acajoom.com
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
define('_ACA_DESC_CORE', 'jNews este o componentă care oferă funcţionalitatea de listă de mesaje, scrisoare de informare, răspuns automate şi continuare a unei conversaţii, cu scopul de a comunica efectiv cu utilizatorii şi clienţii.  ' .
		'jNews, partenerul tău de comunicare!');
define('_ACA_DESC_GPL', 'jNews este o componentă care oferă funcţionalitatea de listă de mesaje, scrisoare de informare, răspuns automate şi continuare a unei conversaţii, cu scopul de a comunica efectiv cu utilizatorii şi clienţii.  ' .
		'jNews, partenerul tău de comunicare!');
define('_ACA_FEATURES', 'jNews, partenerul tău de comunicare!');

// Type of lists
define('_ACA_NEWSLETTER', 'Scrisoare de informare');
define('_ACA_AUTORESP', 'Răspuns automat');
define('_ACA_AUTORSS', 'RSS auto');
define('_ACA_ECARD', 'eCard');
define('_ACA_POSTCARD', 'Carte poştală');
define('_ACA_PERF', 'Performantă');
define('_ACA_COUPON', 'Cupon');
define('_ACA_CRON', 'Job periodic');
define('_ACA_MAILING', 'Mesaj');
define('_ACA_LIST', 'Listă');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Liste');
define('_ACA_MENU_SUBSCRIBERS', 'Abonaţi');
define('_ACA_MENU_NEWSLETTERS', 'Scrisori de informare');
define('_ACA_MENU_AUTOS', 'Răspunsuri automate');
define('_ACA_MENU_COUPONS', 'Cupoane');
define('_ACA_MENU_CRONS', 'Job-uri periodice');
define('_ACA_MENU_AUTORSS', 'RSS automat');
define('_ACA_MENU_ECARD', 'eCards');
define('_ACA_MENU_POSTCARDS', 'Cărţi poştale');
define('_ACA_MENU_PERFS', 'Performanţe');
define('_ACA_MENU_TAB_LIST', 'Liste');
define('_ACA_MENU_MAILING_TITLE', 'Mesaje');
define('_ACA_MENU_MAILING' , 'Mesaje pentru ');
define('_ACA_MENU_STATS', 'Statistici');
define('_ACA_MENU_STATS_FOR', 'Statistici pentru ');
define('_ACA_MENU_CONF', 'Configurare');
define('_ACA_MENU_UPDATE', 'Import');
define('_ACA_MENU_ABOUT', 'Despre');
define('_ACA_MENU_LEARN', 'Centru de educare');
define('_ACA_MENU_MEDIA', 'Manager Media');
define('_ACA_MENU_HELP', 'Ajutor');
define('_ACA_MENU_CPANEL', 'CPanel');
define('_ACA_MENU_IMPORT', 'Import');
define('_ACA_MENU_EXPORT', 'Export');
define('_ACA_MENU_SUB_ALL', 'Abonează toţi');
define('_ACA_MENU_UNSUB_ALL', 'Dezabonează toţi');
define('_ACA_MENU_VIEW_ARCHIVE', 'Arhivă');
define('_ACA_MENU_PREVIEW', 'Vizualizează');
define('_ACA_MENU_SEND', 'Trimite');
define('_ACA_MENU_SEND_TEST', 'Trimite email de test');
define('_ACA_MENU_SEND_QUEUE', 'Procesează coada de aşteptare');
define('_ACA_MENU_VIEW', 'Vezi');
define('_ACA_MENU_COPY', 'Copiază');
define('_ACA_MENU_VIEW_STATS' , 'Vezi statisticile');
define('_ACA_MENU_CRTL_PANEL' , ' Panoul de control');
define('_ACA_MENU_LIST_NEW' , ' Creează o listă');
define('_ACA_MENU_LIST_EDIT' , ' Modifică o listă');
define('_ACA_MENU_BACK', 'Înapoi');
define('_ACA_MENU_INSTALL', 'Instalare');
define('_ACA_MENU_TAB_SUM', 'Sumar');
define('_ACA_STATUS' , 'Statut');

// messages
define('_ACA_ERROR' , ' A apărut o eroare! ');
define('_ACA_SUB_ACCESS' , 'Drepturi de acces');
define('_ACA_DESC_CREDITS', 'Credite');
define('_ACA_DESC_INFO', 'Informaţie');
define('_ACA_DESC_HOME', 'Pagina de start');
define('_ACA_DESC_MAILING', 'Listă de mesaje');
define('_ACA_DESC_SUBSCRIBERS', 'Abonaţi');
define('_ACA_PUBLISHED','Publicat');
define('_ACA_UNPUBLISHED','Nepublicat');
define('_ACA_DELETE','Şterge');
define('_ACA_FILTER','Filtrează');
define('_ACA_UPDATE','Actualizează');
define('_ACA_SAVE','Salvează');
define('_ACA_CANCEL','Anulează');
define('_ACA_NAME','Nume');
define('_ACA_EMAIL','Email');
define('_ACA_SELECT','Selectează');
define('_ACA_ALL','Toată lista');
define('_ACA_SEND_A', 'Trimite o ');
define('_ACA_SUCCESS_DELETED', ' şters cu succes');
define('_ACA_LIST_ADDED', 'Listă creată cu succes');
define('_ACA_LIST_COPY', 'Listă copiată cu succes');
define('_ACA_LIST_UPDATED', 'Listă actualizată cu succes');
define('_ACA_MAILING_SAVED', 'Mesaj salvat cu succes.');
define('_ACA_UPDATED_SUCCESSFULLY', 'actualizată cu succes.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Informaţii despre abonat');
define('_ACA_VERIFY_INFO', 'Verifică link-ul pe care l-ai trimis, lipsesc informaţii.');
define('_ACA_INPUT_NAME', 'Nume');
define('_ACA_INPUT_EMAIL', 'Email');
define('_ACA_RECEIVE_HTML', 'Primeşte HTML?');
define('_ACA_TIME_ZONE', 'Fus orar');
define('_ACA_BLACK_LIST', 'Lista neagră');
define('_ACA_REGISTRATION_DATE', 'Data de înregistrare a utilizatorului');
define('_ACA_USER_ID', 'ID utilizator');
define('_ACA_DESCRIPTION', 'Descriere');
define('_ACA_ACCOUNT_CONFIRMED', 'Contul tău a fost activat.');
define('_ACA_SUB_SUBSCRIBER', 'Abonat');
define('_ACA_SUB_PUBLISHER', 'Editor');
define('_ACA_SUB_ADMIN', 'Administrator');
define('_ACA_REGISTERED', 'Înregistrat');
define('_ACA_SUBSCRIPTIONS', 'Subscrieri');
define('_ACA_SEND_UNSUBCRIBE', 'Trimite mesaj de dezabonare');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Click pe Da pentru a trimite un mesaj de confirmare pentru dezabonare.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Confirmă subscrierea');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Confirmă dezabonarea');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Bună [NAME],<br />' .
		'Mai este necesar încă un pas pentru a completa subscrierea la listă. Click pe link-ul următor pentru a-ţi confirma subscrierea.' .
		'<br /><br />[CONFIRMĂ]<br /><br />Pentru orice întrebare contactează administratorul site-ului.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Acesta este un email de confirmare că ai fost dezabonat de la lista noastră. Poţi oricând să te re-abonezi în viitor, vizitând site-ul nostru web.  Dacă ai vreo întrebare contactează administratorul site-ului.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Data înregistrării');
define('_ACA_CONFIRMED', 'Confirmat');
define('_ACA_SUBSCRIB', 'Abonează');
define('_ACA_HTML', 'Mesaje HTML');
define('_ACA_RESULTS', 'Rezultate');
define('_ACA_SEL_LIST', 'Selectează o listă');
define('_ACA_SEL_LIST_TYPE', '- Selectează tipul listei -');
define('_ACA_SUSCRIB_LIST', 'Lista cu toţi abonaţii');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Abonaţi la : ');
define('_ACA_NO_SUSCRIBERS', 'Nu a fost găsit nici un abonat la această listă.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Un email de confirmare ţi-a fost trimis. Verifică-ţi email-ul şi fă click pe link-ul trimis.<br />' .
		'Trebuie să-ţi confirmi adresa de email pentru ca subscrierea să-şi facă efect.');
define('_ACA_SUCCESS_ADD_LIST', 'Ai fost adăugat cu succes la listă.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Click aici pentru a confirma subscrierea');
define('_ACA_UNSUBSCRIBE_LINK', 'Click aici pentru a te dezabona de la listă');
define('_ACA_UNSUBSCRIBE_MESS', 'Adresa ta de email a fost scoasă din listă');

define('_ACA_QUEUE_SENT_SUCCESS' , 'Toate mesajele programate au fost trimise cu succes.');
define('_ACA_MALING_VIEW', 'Vezi toate mesajele');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Eşti sigur că vrei să te dezabonezi de la această listă?');
define('_ACA_MOD_SUBSCRIBE', 'subscriere');
define('_ACA_SUBSCRIBE', 'Subscriere');
define('_ACA_UNSUBSCRIBE', 'Dezabonare');
define('_ACA_VIEW_ARCHIVE', 'Vezi arhiva');
define('_ACA_SUBSCRIPTION_OR', ' sau click aici pentru a-ţi actualiza informaţiile');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Această adresă de email a fost înregistrată deja.');
define('_ACA_SUBSCRIBER_DELETED', 'Abonatul a fost şters cu succes.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Panoul de control Utilizator');
define('_UCP_USER_MENU', 'Meniu utilizator');
define('_UCP_USER_CONTACT', 'Subscrierile mele');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Management-ul de job-uri periodice');
define('_UCP_CRON_NEW_MENU', 'Job periodic nou');
define('_UCP_CRON_LIST_MENU', 'Lista de job-uri mele periodice');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Management-ul de cupoane');
define('_UCP_COUPON_LIST_MENU', 'Lista de cupoane');
define('_UCP_COUPON_ADD_MENU', 'Adaugă un cupon');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Descriere');
define('_ACA_LIST_T_LAYOUT', 'Aşezare în pagină');
define('_ACA_LIST_T_SUBSCRIPTION', 'Subscriere');
define('_ACA_LIST_T_SENDER', 'Informaţii expeditor');

define('_ACA_LIST_TYPE', 'Tip listă');
define('_ACA_LIST_NAME', 'Nume listă');
define('_ACA_LIST_ISSUE', 'Ediţia numărul');
define('_ACA_LIST_DATE', 'Data de trimitere');
define('_ACA_LIST_SUB', 'Subiectul mesajului');
define('_ACA_ATTACHED_FILES', 'Fişiere ataşate');
define('_ACA_SELECT_LIST', 'Selectează o listă de modificat!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Tip listă');
define('_ACA_AUTO_RESP_OPTION', 'Opţiuni de răspuns automat');
define('_ACA_AUTO_RESP_FREQ', 'Abonaţii pot alege frecvenţa');
define('_ACA_AUTO_DELAY', 'Întârziere (în zile)');
define('_ACA_AUTO_DAY_MIN', 'Frecvenţa minimă');
define('_ACA_AUTO_DAY_MAX', 'Frecvenţa maximă');
define('_ACA_FOLLOW_UP', 'Specifică răspunsul automat următor');
define('_ACA_AUTO_RESP_TIME', 'Abonaţii pot alege ora');
define('_ACA_LIST_SENDER', 'Lista de expeditori');

define('_ACA_LIST_DESC', 'Descriere listă');
define('_ACA_LAYOUT', 'Aşezarea în pagină');
define('_ACA_SENDER_NAME', 'Nume expeditor');
define('_ACA_SENDER_EMAIL', 'Email expeditor');
define('_ACA_SENDER_BOUNCE', 'Adresă de răspuns a expeditorului');
define('_ACA_LIST_DELAY', 'Întârziere');
define('_ACA_HTML_MAILING', 'Mesaj în format HTML?');
define('_ACA_HTML_MAILING_DESC', '(dacă alegi această opţiune, va trebui să salvezi şi să te întorci la acest ecran pentru a vedea modificările.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Ascunde în front-end?');
define('_ACA_SELECT_IMPORT_FILE', 'Selectează un fişier de importat');;
define('_ACA_IMPORT_FINISHED', 'Importul s-a terminat');
define('_ACA_DELETION_OFFILE', 'Ştergerea fişierului');
define('_ACA_MANUALLY_DELETE', 'a eşuat, trebuie să ştergi fişierul manual');
define('_ACA_CANNOT_WRITE_DIR', 'Nu se poate scrie în director');
define('_ACA_NOT_PUBLISHED', 'Nu s-a putut trimite mesajul, lista nu este publicată.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Click Da pentru a publica lista');
define('_ACA_INFO_LIST_NAME', 'Introdu aici numele listei. Poţi identifica lista cu acest nume.');
define('_ACA_INFO_LIST_DESC', 'Introdu o scurtă descriere pentru lista ta. Această descriere va fi vizibilă vizitatorilor site-ului.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Introdu numele expeditorului mesajului. Acest nume va fi vizibil când abonaţii primesc mesaje de la această listă.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Introdu adresa de email de la care vor fi trimise mesajele.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Introdu adresa de email la care utilizatori vor putea răspunde. Este recomandat să fie aceeaşi cu adresa de la care vor fi trimise mesajele, în caz contrar filtrele SPAM vor clasifica mesajele ca având un risc mare de a fi SPAM.');
define('_ACA_INFO_LIST_AUTORESP', 'Alege tipul mesajului pentru această listă. <br />' .
		'Scrisoare de informare: scrisoare normală de informare<br />' .
		'Răspuns automat: un răspuns automat este o listă care este trimisă automat de către site-ul web la intervale regulate.');
define('_ACA_INFO_LIST_FREQUENCY', 'Permite utilizatorului să aleagă cât de des va primi lista. Această opţiune oferă utilizatorului o flexibilitate mai mare.');
define('_ACA_INFO_LIST_TIME', 'Permite utilizatorului să aleagă ora preferată din zi la care să primească lista.');
define('_ACA_INFO_LIST_MIN_DAY', 'Defineşte frecvenţa minimă cu care un utilizator poate alege să primească lista');
define('_ACA_INFO_LIST_DELAY', 'Specifică întârzierea între acest răspuns automat şi cel precedent.');
define('_ACA_INFO_LIST_DATE', 'Specifică data la care lista va fi publicată, în cazul în care doreşti ca publicarea să fie întârziată. <br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Defineşte frecvenţa minimă cu care un utilizator poate alege să primească lista');
define('_ACA_INFO_LIST_LAYOUT', 'Introdu aranjarea în pagină pentru lista de mesaje. Aici poţi introduce pentru mesaje orice aranjare în pagină.');
define('_ACA_INFO_LIST_SUB_MESS', 'Acest mesaj va fi trimis la abonat când el / ea se va înscrie pentru prima dată. Poţi defini aici orice text doreşti să fie trimis.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Acest mesaj va fi trimis la abonat când el / ea se va dezînscrie. Poţi defini aici orice text doreşti să fie trimis.');
define('_ACA_INFO_LIST_HTML', 'Bifează checkbox-ul dacă doreşti să trimiţi mesaje în format HTML. Abonaţii vor putea specifica, în momentul în care se abonează la o listă în format HTML, dacă doresc să primească mesajul HTML sau cel în format Text.');
define('_ACA_INFO_LIST_HIDDEN', 'Click Da pentru a ascunde lista în front-end, utilizatorii nu se vor putea înscrie, dar tu vrei putea să trimiţi mesaje în continuare.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Vrei să abonezi utilizatorii în mod automat la această listă?<br /><B>Utilizatori noi:</B> va abona toţi utilizatorii care se înscriu pe site-ul web.<br /><B>Toţi utilizatorii:</B> va abona toţi utilizatorii înregistraţi din baza de date.<br />(toate aceste opţiuni suportă componenta Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Selectează nivelul de acces în front end. Aceasta va ascunde sau arăta lista de mesaje acelor grupuri de utilizatori care nu au acces la ea, astfel încât ei nu se vor putea înscrie.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Selectează nivelul de acces al grupului de utilizatori care au dreptul să facă modificări. Acel grup, precum şi cele de mai sus, vor putea să modifice mesaje şi să le trimită, din front-end sau din back-end.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Dacă doreşti ca modulul de răspuns automat să de mute la altul odată ce a ajuns la ultimul mesaj, îl poţi specifica aici pe următorul.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Acesta este ID-ul persoanei care a creat lista.');
define('_ACA_INFO_LIST_WARNING', '   Această ultimă opţiune este disponibilă doar o singură dată la crearea listei.');
define('_ACA_INFO_LIST_SUBJET', ' Subiectul mesajului.  Acesta este subiectul email-ului care va fi primit de abonaţi.');
define('_ACA_INFO_MAILING_CONTENT', 'Acesta este conţinutul email-ului pe care vrei să-l trimiţi.');
define('_ACA_INFO_MAILING_NOHTML', 'Introdu aici conţinutul email-ului pe care vrei să-l trimiţi abonaţilor ce au ales să primească doar mesaje non-HTML. <BR/> NOTĂ: daca laşi acest câmp gol, jNews va converti automat conţinutul HTML în conţinut text.');
define('_ACA_INFO_MAILING_VISIBLE', 'Click Da pentru a arăta mesajul în front-end.');
define('_ACA_INSERT_CONTENT', 'Introdu conţinut ce există deja');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Cuponul a fost trimis cu succes!');
define('_ACA_CHOOSE_COUPON', 'Alege un cupon');
define('_ACA_TO_USER', ' acestui utilizator');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'în fiecare oră');
define('_ACA_FREQ_CH2', 'La fiecare 6 ore');
define('_ACA_FREQ_CH3', 'La fiecare 12 ore');
define('_ACA_FREQ_CH4', 'Zilnic');
define('_ACA_FREQ_CH5', 'Săptămânal');
define('_ACA_FREQ_CH6', 'Lunar');
define('_ACA_FREQ_NONE', 'Nu');
define('_ACA_FREQ_NEW', 'Utilizatori noi');
define('_ACA_FREQ_ALL', 'Toţi utilizatorii');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews Cron?');
define('_ACA_LABEL_FREQ_TIPS', 'Click Da dacă doreşti să foloseşti această opţiune pentru un jNews Cron, Nu pentru orice alt job cron.<br />' .
		'Dacă faci click pe Da nu trebuie să specifici adresa Cron, ea va fi adăugată automat.');
define('_ACA_SITE_URL' , 'Adresa URL a site-ului tău');
define('_ACA_CRON_FREQUENCY' , 'Frecvenţa CRON');
define('_ACA_STARTDATE_FREQ' , 'Data de început');
define('_ACA_LABELDATE_FREQ' , 'Specifică data');
define('_ACA_LABELTIME_FREQ' , 'Specifică ora');
define('_ACA_CRON_URL', 'URL Cron');
define('_ACA_CRON_FREQ', 'Frecvenţa');
define('_ACA_TITLE_CRONLIST', 'Lista Cron');
define('_NEW_LIST', 'Creează o listă nouă');

//title CRON form
define('_ACA_TITLE_FREQ', 'Modifică Cron');
define('_ACA_CRON_SITE_URL', 'Introdu un URL valid de site, care începe http://');

### Mailings ###
define('_ACA_MAILING_ALL', 'Toate mesajele');
define('_ACA_EDIT_A', 'Modifică un ');
define('_ACA_SELCT_MAILING', 'Selectează o listă din meniul drop down pentru a putea adăuga un mesaj nou.');
define('_ACA_VISIBLE_FRONT', 'Vizibil în front-end');

// mailer
define('_ACA_SUBJECT', 'Subiect');
define('_ACA_CONTENT', 'Conţinut');
define('_ACA_NAMEREP', '[NAME] = Acest text va fi înlocuit cu numele abonatului introdus, folosind acest text vei putea trimite email personalizat.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Acest text va fi înlocuit cu prenumele abonatului introdus.<br />');
define('_ACA_NONHTML', 'Versiune Non-HTML');
define('_ACA_ATTACHMENTS', 'Ataşamente');
define('_ACA_SELECT_MULTIPLE', 'Ţine apăsată tasta CTRL (sau command) pentru a selecta ataşamente multiple.<br />' .
		'Fisierele afisate în această listă de ataşamente se află în directorul de ataşamente; poţi modifică această locaţie în panoul de configurare.');
define('_ACA_CONTENT_ITEM', 'Element de conţinut');
define('_ACA_SENDING_EMAIL', 'Se trimite email');
define('_ACA_MESSAGE_NOT', 'Mesajul nu a putut fi trimis');
define('_ACA_MAILER_ERROR', 'Eroare la trimitere');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Mesajul a fost trimis cu succes');
define('_ACA_SENDING_TOOK', 'Trimiterea acestui mesaj a durat');
define('_ACA_SECONDS', 'secunde');
define('_ACA_NO_ADDRESS_ENTERED', 'Nu a fost furnizată nici o adresă de email sau nici un abonat');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Modifică');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Modifică opţiunile de subscriere');
define('_ACA_WHICH_EMAIL_TEST', 'Introdu adresa de email la care să fie trimis un mesaj de test sau selectează vizualizare');
define('_ACA_SEND_IN_HTML', 'Trimite în format HTML (pentru mesaje HTML)?');
define('_ACA_VISIBLE', 'Vizibil');
define('_ACA_INTRO_ONLY', 'Doar introducerea');

// stats
define('_ACA_GLOBALSTATS', 'Statistici globale');
define('_ACA_DETAILED_STATS', 'Statistici detaliate');
define('_ACA_MAILING_LIST_DETAILS', 'Lista detalii');
define('_ACA_SEND_IN_HTML_FORMAT', 'Trimite în format HTML');
define('_ACA_VIEWS_FROM_HTML', 'Vizualizări (de la mesajele HTML)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Trimite în format text');
define('_ACA_HTML_READ', 'HTML citit');
define('_ACA_HTML_UNREAD', 'HTML necitit');
define('_ACA_TEXT_ONLY_SENT', 'doar text');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Email');
define('_ACA_LOGGING_CONFIG', 'Log şi statistici');
define('_ACA_SUBSCRIBER_CONFIG', 'Abonaţi');
define('_ACA_MISC_CONFIG', 'Diverse');
define('_ACA_MAIL_SETTINGS', 'Setări mesaje');
define('_ACA_MAILINGS_SETTINGS', 'Setări liste de trimitere');
define('_ACA_SUBCRIBERS_SETTINGS', 'Setări abonaţi');
define('_ACA_CRON_SETTINGS', 'Setări Cron');
define('_ACA_SENDING_SETTINGS', 'Setări trimitere');
define('_ACA_STATS_SETTINGS', 'Setări statistici');
define('_ACA_LOGS_SETTINGS', 'Setări log');
define('_ACA_MISC_SETTINGS', 'Setări diverse');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'De la adresa de email');
define('_ACA_SEND_MAIL_NAME', 'De la numele');
define('_ACA_MAILSENDMETHOD', 'Metoda de trimitere');
define('_ACA_SENDMAILPATH', 'Calea către Sendmail');
define('_ACA_SMTPHOST', 'Adresa server SMTP');
define('_ACA_SMTPAUTHREQUIRED', 'Autentificare SMTP necesară');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Selectează da dacă serverul SMTP necesită autentificare');
define('_ACA_SMTPUSERNAME', 'Nume de utilizator pentru serverul SMTP');
define('_ACA_SMTPUSERNAME_TIPS', 'Introdu numele de utilizator pentru SMTP în cazul în care serverul SMTP necesită autentificare');
define('_ACA_SMTPPASSWORD', 'Parola pentru serverul SMTP');
define('_ACA_SMTPPASSWORD_TIPS', 'Introdu parola pentru SMTP în cazul în care serverul SMTP necesită autentificare');
define('_ACA_USE_EMBEDDED', 'Foloseşte imagini inserate în corpul mesajului');
define('_ACA_USE_EMBEDDED_TIPS', 'Selectează da dacă imaginile din elementele de conţinut ataşate trebuie să fie introduse în corpul mesajelor HTML, sau nu pentru a folosi tag-uri implicite de imagine care fac legătura la imaginile de pe site.');
define('_ACA_UPLOAD_PATH', 'Calea de navigare pentru upload / ataşamente');
define('_ACA_UPLOAD_PATH_TIPS', 'Poţi specifica un director de upload.<br />' .
		'Asigură-te că directorul specificat există, în caz contrar creează-l.');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Permite utilizatorii neînregistraţi');
define('_ACA_ALLOW_UNREG_TIPS', 'Selectează Da dacă vrei să permiţi utilizatorilor să se aboneze la liste fără a fi înregistraţi pe site.');
define('_ACA_REQ_CONFIRM', 'Necesită confirmare');
define('_ACA_REQ_CONFIRM_TIPS', 'Selectează Da dacă doreşti ca abonaţii neînregistraţi să-şi confirme adresa de email.');
define('_ACA_SUB_SETTINGS', 'Setări de subscriere');
define('_ACA_SUBMESSAGE', 'Email de abonat');
define('_ACA_SUBSCRIBE_LIST', 'Abonează la o listă');

define('_ACA_USABLE_TAGS', 'Tag-uri ce pot fi folosite');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Acest tag va crea un link cu care abonatul îşi poate confirma subscrierea. Este <strong>necesar</strong> pentru ca jNews să funcţioneze corect.<br />'
.'<br />[NAME] = Acest tag va fi înlocuit cu numele abonatului, cu acest tag vei trimite email personalizat.<br />'
.'<br />[FIRSTNAME] = Acest tag va fi înlocuit cu prenumele abonatului; prenumele este DEFINIT ca prenumele introdus de abonat.<br />');
define('_ACA_CONFIRMFROMNAME', 'Confirmare de la numele');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Introdu numele de afişat în listele de confirmare.');
define('_ACA_CONFIRMFROMEMAIL', 'Confirmare de la email');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Introdu adresa de email de afişat în listele de confirmare.');
define('_ACA_CONFIRMBOUNCE', 'Adresa de răspuns');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Introdu adresa de răspuns de afişat în listele de confirmare.');
define('_ACA_HTML_CONFIRM', 'Confirmă HTML');
define('_ACA_HTML_CONFIRM_TIPS', 'Selectează da dacă listele de confirmare trebuie să fie în format HTML, dacă utilizatorul permite HTML.');
define('_ACA_TIME_ZONE_ASK', 'Întreabă care este fusul orar');
define('_ACA_TIME_ZONE_TIPS', 'Selectează da dacă vrei ca utilizatorul să fie întrebat despre fusul orar. Mesajele în coada de procesare vor fi trimise funcţie de fusul orar, acolo unde este cazul');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_TIME_OFFSET_URL', 'click aici pentru a seta decalajul orar în panoul de configurare globala -> tab-ul Localizare');
define('_ACA_TIME_OFFSET_TIPS', 'Setează decalajul orar al serverului astfel încât data şi ora înregistrate să fie exacte');
define('_ACA_TIME_OFFSET', 'Decalaj orar');
define('_ACA_CRON_DESC','<br />Folosind funcţia cron poţi configura un job automat pentru site-ul tău web!<br />' .
		'Pentru configurare trebuie să adaugi în panoul de control crontab următoarea comandă:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Dacă ai nevoie de ajutor pentru configurare sau dacă ai probleme, consultă forumul nostru la adresa <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>');
// sending settings
define('_ACA_PAUSEX', 'Întrerupe x secunde fiecare volum configurat de email-uri');
define('_ACA_PAUSEX_TIPS', 'Introdu un număr de secunde pentru care jNews va aştepta serverul SMTP să efectueze trimiterea, înainte de a trece la următorul volum de mesaje.');
define('_ACA_EMAIL_BET_PAUSE', 'Email-uri între pauze');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Numărul de email-uri de trimis înainte de a face o pauză.');
define('_ACA_WAIT_USER_PAUSE', 'Aşteaptă comanda utilizatorului la pauză');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Dacă scriptul trebuie să aştepte ca utilizatorul să dea comanda de continuare atunci când este oprit între seturile de mesaje.');
define('_ACA_SCRIPT_TIMEOUT', 'Timpul de executare pentru script');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Numărul de minute permis scriptului să ruleze (0 pentru nelimitat).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Activează statisticile de citire');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Selectează da daca vrei să ţii un log al numărului de vizualizări. Această tehnică poate fi folosită doar cu mesaje HTML');
define('_ACA_LOG_VIEWSPERSUB', 'Ţine un log de vizualizări per abonat');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Selectează da daca vrei să ţii un log de vizualizări pentru fiecare abonat. Această tehnică poate fi folosită doar cu mesaje HTML');
// Logs settings
define('_ACA_DETAILED', 'Log detaliat');
define('_ACA_SIMPLE', 'Log simplu');
define('_ACA_DIAPLAY_LOG', 'Afişează log');
define('_ACA_DISPLAY_LOG_TIPS', 'Selectează daca dacă vrei ca informaţiile din log să fie afişate cât timp se trimit mesajele.');
define('_ACA_SEND_PERF_DATA', 'Trimite datele despre performanţă');
define('_ACA_SEND_PERF_DATA_TIPS', 'Selectează da dacă vrei să permiţi componentei jNews să trimită rapoarte ANONIME despre configuraţia ta, numărul de abonaţi la o listă şi timpul necesar pentru a trimite mesajele. Aceasta ne va da o idee despre performanţa componentei şi NE VA AJUTA să îmbunătăţim jNews în versiunile următoare.');
define('_ACA_SEND_AUTO_LOG', 'Trimite log pentru auto-răspuns');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Selectează da dacă doreşti să trimiţi un email cu log, de fiecare dată când coada de mesaje este procesată. ATENŢIE: aceasta poate rezulta într-un număr mare de email-uri.');
define('_ACA_SEND_LOG', 'Trimite log');
define('_ACA_SEND_LOG_TIPS', 'Dacă informaţiile de log pentru mesaj trebuie trimis sau nu prin email la adresa de email a utilizatorului care a efectuat trimiterea.');
define('_ACA_SEND_LOGDETAIL', 'Trimite log în detaliu');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Detaliile includ informaţii despre succesul / eşecul trimiterii la fiecare abonat şi sumarul informaţiilor. Log simplu trimite doar sumarul.');
define('_ACA_SEND_LOGCLOSED', 'Trimite log dacă conexiunea a fost închisă');
define('_ACA_SEND_LOGCLOSED_TIPS', 'Cu această opţiune activată, utilizatorul care a efectuat trimiterea va primi totuşi un raport prin email.');
define('_ACA_SAVE_LOG', 'Salvează log');
define('_ACA_SAVE_LOG_TIPS', 'Dacă un log al trimiterii trebuie sau nu să fie adăugat la fişierul de log.');
define('_ACA_SAVE_LOGDETAIL', 'Salvează detalii log');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Detaliile includ informaţii despre succesul / eşecul trimiterii la fiecare abonat şi sumarul informaţiilor. Log simplu trimite doar sumarul.');
define('_ACA_SAVE_LOGFILE', 'Salvează fişierul de log');
define('_ACA_SAVE_LOGFILE_TIPS', 'Fişierul la care sunt adăugate informaţii de log. Acest fişier poate deveni foarte mare.');
define('_ACA_CLEAR_LOG', 'Şterge log');
define('_ACA_CLEAR_LOG_TIPS', 'Şterge fişierul de log.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Ultima coadă de procesare executată');
define('_ACA_CP_TOTAL', 'Total');
define('_ACA_MAILING_COPY', 'Mesajul copiat cu succes!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Afişează ghidul');
define('_ACA_SHOW_GUIDE_TIPS', 'Afişează ghidul la început pentru a ajuta utilizatorii noi să creeze mesaje, auto-răspunsuri şi să configureze corect jNews.');
define('_ACA_AUTOS_ON', 'Foloseşte modulul de auto-răspuns');
define('_ACA_AUTOS_ON_TIPS', 'Selectează Nu dacă nu doreşti să foloseşti modulul de răspuns automat, toate opţiunile acestui modul vor fi dezactivate.');
define('_ACA_NEWS_ON', 'Foloseşte scrisori de informare');
define('_ACA_NEWS_ON_TIPS', 'Selectează Nu dacă nu doreşti să foloseşti scrisori de informare, toate opţiunile pentru scrisori de informare vor fi dezactivate.');
define('_ACA_SHOW_TIPS', 'Arată indicaţiile (tips)');
define('_ACA_SHOW_TIPS_TIPS', 'Arată indicaţiile pentru a ajuta utilizatorii să utilizeze jNews mai eficient.');
define('_ACA_SHOW_FOOTER', 'Arată notă de subsol');
define('_ACA_SHOW_FOOTER_TIPS', 'Dacă trebuie afişată sau nu nota de subsol cu informaţia de drept de autor.');
define('_ACA_SHOW_LISTS', 'Arată listele în front-end');
define('_ACA_SHOW_LISTS_TIPS', 'Când utilizatorul nu este înregistrat, afişează o listă cu toate listele de mesaje la care se pot abona, cu buton de arhivă sau o formă de autentificare ca să se poată înregistra.');
define('_ACA_CONFIG_UPDATED', 'Detaliile configurării au fost actualizate!');
define('_ACA_UPDATE_URL', 'Actualizează URL');
define('_ACA_UPDATE_URL_WARNING', 'ATENŢIE! Nu modifica acest URL decât dacă echipa tehnică jNews te-a rugat să faci asta.<br />');
define('_ACA_UPDATE_URL_TIPS', 'De exemplu: http://www.acajoom.com/update/ (include caracterul slash de final)');

// module
define('_ACA_EMAIL_INVALID', 'Email-ul introdus este invalid.');
define('_ACA_REGISTER_REQUIRED', 'Înregistrează-te pe site înainte de a te abona la o listă.');

// Access level box
define('_ACA_OWNER', 'Autorul listei:');
define('_ACA_ACCESS_LEVEL', 'Setează nivelul de acces pentru această listă');
define('_ACA_ACCESS_LEVEL_OPTION', 'Opţiuni pentru nivelul de acces');
define('_ACA_USER_LEVEL_EDIT', 'Selectează nivelul utilizatorilor care au dreptul să modifice un mesaj (din front-end sau back-end) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Zilnic');
define('_ACA_AUTO_DAY_CH2', 'Zilnic, fără weekend');
define('_ACA_AUTO_DAY_CH3', 'Orice altă zi');
define('_ACA_AUTO_DAY_CH4', 'Orice altă zi, fără weekend');
define('_ACA_AUTO_DAY_CH5', 'Săptămânal');
define('_ACA_AUTO_DAY_CH6', 'Bi-săptămânal');
define('_ACA_AUTO_DAY_CH7', 'Lunar');
define('_ACA_AUTO_DAY_CH9', 'Anual');
define('_ACA_AUTO_OPTION_NONE', 'Nu');
define('_ACA_AUTO_OPTION_NEW', 'Utilizatori noi');
define('_ACA_AUTO_OPTION_ALL', 'Toţi utilizatorii');

//
define('_ACA_UNSUB_MESSAGE', 'Email de dezabonare');
define('_ACA_UNSUB_SETTINGS', 'Setări de dezabonare');
define('_ACA_AUTO_ADD_NEW_USERS', 'Abonează automat utilizatorii?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Nu există momentan actualizări disponibile.');
define('_ACA_VERSION', 'Versiunea jNews');
define('_ACA_NEED_UPDATED', 'Fişierele care trebuie actualizate:');
define('_ACA_NEED_ADDED', 'Fişierele care trebuie adăugate:');
define('_ACA_NEED_REMOVED', 'Fişierele care trebuie şterse:');
define('_ACA_FILENAME', 'Nume fişier:');
define('_ACA_CURRENT_VERSION', 'Versiunea curentă:');
define('_ACA_NEWEST_VERSION', 'Versiunea nouă:');
define('_ACA_UPDATING', 'Se actualizează');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Fişierele au fost actualizate cu succes.');
define('_ACA_UPDATE_FAILED', 'Actualizarea a eşuat!');
define('_ACA_ADDING', 'Se adaugă');
define('_ACA_ADDED_SUCCESSFULLY', 'S-a adăugat cu succes.');
define('_ACA_ADDING_FAILED', 'Adăugarea a eşuat!');
define('_ACA_REMOVING', 'Se şterge');
define('_ACA_REMOVED_SUCCESSFULLY', 'S-a şters cu succes.');
define('_ACA_REMOVING_FAILED', 'Ştergerea a eşuat!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Instalează o versiune diferită');
define('_ACA_CONTENT_ADD', 'Adaugă conţinut');
define('_ACA_UPGRADE_FROM', 'Importă date (scrisori de informare şi informaţii abonaţi) din ');
define('_ACA_UPGRADE_MESS', 'Nu există riscuri pentru datele existente. <br /> Acest proces doar va importa datele în baza de date jNews.');
define('_ACA_CONTINUE_SENDING', 'Continuă trimiterea');

// jNews message
define('_ACA_UPGRADE1', 'Poţi importa uşor utilizatorii şi scrisorile de intenţie din ');
define('_ACA_UPGRADE2', ' în jNews în panoul de actualizări.');
define('_ACA_UPDATE_MESSAGE', 'O nouă versiune jNews este disponibilă! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Click aici pentru actualizare!');
define('_ACA_THANKYOU', 'Vă mulţumit pentru că aţi ales jNews, partenerul tău de comunicare!');
define('_ACA_NO_SERVER', 'Serverul de actualizare nu este disponibil, încearcă mai târziu.');
define('_ACA_MOD_PUB', 'Modulul jNews nu este publicat.');
define('_ACA_MOD_PUB_LINK', 'Click aici pentru a-l publica!');
define('_ACA_IMPORT_SUCCESS', 'importat cu succes');
define('_ACA_IMPORT_EXIST', 'abonatul există deja în baza de date');

// jNews\'s Guide
define('_ACA_GUIDE', ' - ghid de configurare');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews are multe facilitaţi şi acest ghid de configurare te va ajuta în patru paşi să începi să trimiţi scrisori de informare şi răspunsuri automate!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Mai întâi, trebuie să adaugi o listă. O listă poate fi de unul din următoarele tipuri: scrisoare de informare sau răspuns automat.' .
		'  În listă defineşti toţi parametrii necesari pentru a activa trimiterea de scrisori de informare sau răspunsuri automate: nume expeditor, aşezarea în pagină, mesajul de start pentru abonaţi, etc...
<br /><br />Poţi configura prima ta listă aici: <a href="index2.php?option=com_jnewsletter&act=list" >creează o listă</a> şi click pe butonul Nou.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews îţi oferă o modalitate uşoară de a importa toate datele dintr-un sistem anterior de scrisori de informare.<br />' .
		' Du-te la panoul de import şi alege sistemul anterior de scrisori de informare din care să se importe toate scrisorile de informare şi abonaţii.<br /><br />' .
		'<span style="color:#FF5E00;" >IMPORTANT: importul nu are nici un risc şi nu afectează în nici un fel datele existente deja în sistemul anterior</span><br />' .
		'După import vei putea să administrezi abonaţii şi trimiterile direct din jNews.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Prima ta listă a fost configurată!  Acum poţi scrie prima ta %s.  Pentru a crea, du-te la: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Administrare răspuns automat');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Administrare scrisoare de informare');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' şi selectează %s. <br /> Apoi alege %s din lista drop down.  Creează primul mesajul alegând Nou ');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Înainte de a trimite prima scrisoare de informare ar trebuie să verifici configurarea serverului de mail.  ' .
		'Du-te la <a href="index2.php?option=com_jnewsletter&act=configuration" >pagina de configurare</a> pentru a verifica setările serverului de mail. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Când ai terminat du-te înapoi la meniul Scrisori de informare, selectează mesajul şi click pe Send');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Pentru a trimite răspunsurile automate trebuie să configurezi un job periodic pe server. ' .
		' Du-te la tab-ul Cron în panoul de configurare.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >click aici</a> pentru a afla mai multe despre setarea unui job periodic. <br />');

define('_ACA_GUIDE_MODULE', ' <br />Asigură-te că modulul jNews este publicat astfel încât utilizatorii să se poată abona la listă.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Acum poţi configura de asemenea un răspuns automat.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Acum poţi configura de asemenea o scrisoare de informare.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Eşti pregătit să comunici efectiv cu vizitatorii şi utilizatorii tăi. Acest ghid de configurare va fi dezactivat de îndată ce vei introduce un al doilea mesaj sau îl poţi dezactiva din <a href="index2.php?option=com_jnewsletter&act=configuration" >panoul de control</a>.' .
		'<br /><br />  Dacă ai vreo întrebare despre folosirea componentei jNews, consultă ' .
		'<a target="_blank" href="http://www.acajoom.com/content/blogcategory/29/93/" >documentaţia</a>. ' .
		' Poţi găsi de asemenea multe informaţii despre cum să comunici efectiv cu abonaţii tăi la <a href="http://www.acajoom.com/" target="_blank" >www.jNews.com</a>.' .
		'<p /><br /><b>Îti multumim pentru că foloseşti jNews. Partenerul tău de comunicare!</b> ');
define('_ACA_GUIDE_TURNOFF', 'Ghidul de configurare este acum dezactivat!');
define('_ACA_STEP', 'PAS ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'Configurare jNews');
define('_ACA_INSTALL_SUCCESS', 'Instalare cu succes');
define('_ACA_INSTALL_ERROR', 'Eroare la instalare');
define('_ACA_INSTALL_BOT', 'Plugin jNews (Bot)');
define('_ACA_INSTALL_MODULE', 'Modul jNews');
//Others
define('_ACA_JAVASCRIPT','!Atenţie! Funcţia Javascript trebuie activată pentru o instalare corectă.');
define('_ACA_EXPORT_TEXT','Exportul abonaţilor este bazat pe lista pe care ai ales-o. <br />Exportă abonaţii listei');
define('_ACA_IMPORT_TIPS','Importă abonaţii. Informaţiile din fisier trebuie respecte următorul format: <br />' .
		'Nume,email,primeşteHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmat(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'este deja abonat');
define('_ACA_GET_STARTED', 'Click aici pentru a începe!');

//News since 1.0.1
define('_ACA_WARNING_1011','Atenţie: 1011: Actualizarea nu va funcţiona datorită restricţiilor de pe server.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Alege ce adresă de email va fi arătată ca expeditor.');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Alege ce nume va fi arătată ca expeditor.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Alege ce funcţie de trimis email vrei să foloseşti: funcţia PHP, <span>Sendmail</span> sau server SMTP.');
define('_ACA_SENDMAILPATH_TIPS', 'Acesta este directorul serverului de Email');
define('_ACA_LIST_T_TEMPLATE', 'Model');
define('_ACA_NO_MAILING_ENTERED', 'Nu a fost ales nici un mesaj');
define('_ACA_NO_LIST_ENTERED', 'Nu a fost aleasă nici o listă');
define('_ACA_SENT_MAILING' , 'Mesaje trimise');
define('_ACA_SELECT_FILE', 'Selectează un fişier pentru ');
define('_ACA_LIST_IMPORT', 'Bifează lista(ele) la care vrei să asociezi abonaţii.');
define('_ACA_PB_QUEUE', 'Abonatul a fost introdus, dar au apărut probleme la conectarea lui la listă(e). Verifică manual.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , 'Actualizare foarte recomandată!');
define('_ACA_UPDATE_MESS2' , 'Mici actualizări.');
define('_ACA_UPDATE_MESS3' , 'Versiune nouă.');
define('_ACA_UPDATE_MESS5' , 'Joomla 1.5 este necesar pentru actualizare.');
define('_ACA_UPDATE_IS_AVAIL' , ' este disponibil!');
define('_ACA_NO_MAILING_SENT', 'Nu s-au trimis mesaje!');
define('_ACA_SHOW_LOGIN', 'Arată forma de autentificare');
define('_ACA_SHOW_LOGIN_TIPS', 'Selectează Da pentru a afişa o forma de autentificare în panoul de control jNews din front-end astfel încât utilizatorii să se poată înregistra pe site.');
define('_ACA_LISTS_EDITOR', 'Editor pentru descrierea listei');
define('_ACA_LISTS_EDITOR_TIPS', 'Selectează Da pentru a folosi un editor HTML pentru editarea câmpului descriere al listei.');
define('_ACA_SUBCRIBERS_VIEW', 'Vezi abonaţii');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , 'Setări de front-end' );
define('_ACA_SHOW_LOGOUT', 'Arată butonul de ieşire');
define('_ACA_SHOW_LOGOUT_TIPS', 'Selectează Da pentru a arăta butonul de ieşire în panoul de control jNews din front-end.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integrare');
define('_ACA_CB_INTEGRATION', 'Integrare cu Community Builder');
define('_ACA_INSTALL_PLUGIN', 'Plugin Community Builder (Integrare jNews) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'Plugin-ul jNews pentru Community Builder nu este încă instalat!');
define('_ACA_CB_PLUGIN', 'Liste la înregistrare');
define('_ACA_CB_PLUGIN_TIPS', 'Selectează Da pentru a arăta listele de email în forma de înregistrare a componentei Community Builder');
define('_ACA_CB_LISTS', 'ID-uri liste');
define('_ACA_CB_LISTS_TIPS', 'ACESTA ESTE UN CÂMP OBLIGATORIU. Introdu ID_urile listelor la care utilizatorii se vor putea înscrie, separate prin virgulă , (0 pentru a arăta toate listele)');
define('_ACA_CB_INTRO', 'Text introducere');
define('_ACA_CB_INTRO_TIPS', 'Un text ce apare înaintea listei. LASĂ CÂMPUL GOL PENTRU A NU AFIŞA NIMIC.  Poţi folosi tag-uri HTML pentru customizare.');
define('_ACA_CB_SHOW_NAME', 'Arată numele listei');
define('_ACA_CB_SHOW_NAME_TIPS', 'Selectează dacă numele listei trebuie afişat după introducere sau nu.');
define('_ACA_CB_LIST_DEFAULT', 'Bifează implicit lista');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Selectează dacă vrei sau nu ca controlul check box al fiecărei liste să fie bifat implicit.');
define('_ACA_CB_HTML_SHOW', 'Arată opţiunea de primire în format HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'Selectează Da pentru a permite utilizatorilor să aleagă dacă vor să primească sau nu email-uri în format HTML. Selectează nu dacă vrei să foloseşti opţiunea implicită de primire în format HTML.');
define('_ACA_CB_HTML_DEFAULT', 'Primire implicită în format HTML');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Selectează această opţiune pentru a afişa configurarea implicită de mesaj HTML. Dacă este setată la Nu, atunci această opţiune va fi cea implicită.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'Nu s-a putut face backup la fişier! Fişierul nu a fost înlocuit.');
define('_ACA_BACKUP_YOUR_FILES', 'S-a făcut backup la versiunea veche a fişierelor în următorul director:');
define('_ACA_SERVER_LOCAL_TIME', 'Ora locală a serverului');
define('_ACA_SHOW_ARCHIVE', 'Arată butonul de arhivare');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Selectează DA pentru a arăta butonul de arhivare în front-end în lista scrisorilor de informare');
define('_ACA_LIST_OPT_TAG', 'Tag-uri');
define('_ACA_LIST_OPT_IMG', 'Imagini');
define('_ACA_LIST_OPT_CTT', 'Conţinut');
define('_ACA_INPUT_NAME_TIPS', 'Introdu numele complet (prenumele înainte)');
define('_ACA_INPUT_EMAIL_TIPS', 'Introdu adresa de email (Dacă nu este validă nu vrei primi mesajele noastre.)');
define('_ACA_RECEIVE_HTML_TIPS', 'Alege Da dacă vrei să primeşti mesaje în format HTML - Nu pentru a primi doar mesaje în format Text');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Specifică fusul orar.');

// Since 1.0.5
define('_ACA_FILES' , 'Fişiere');
define('_ACA_FILES_UPLOAD' , 'Upload');
define('_ACA_MENU_UPLOAD_IMG' , 'Upload imagini');
define('_ACA_TOO_LARGE' , 'Dimensiunea fişierului este prea mare. Dimensiunea maximă permisă este de');
define('_ACA_MISSING_DIR' , 'Directorul destinaţie nu există');
define('_ACA_IS_NOT_DIR' , 'Directorul destinaţie nu există sau este un fisier.');
define('_ACA_NO_WRITE_PERMS' , 'Directorul destinaţie nu are drepturi de scriere.');
define('_ACA_NO_USER_FILE' , 'Nu ai selectat nici un fişier pentru upload.');
define('_ACA_E_FAIL_MOVE' , 'Nu s-a putut muta fişierul.');
define('_ACA_FILE_EXISTS' , 'Fişierul destinaţie există deja.');
define('_ACA_CANNOT_OVERWRITE' , 'Fişierul destinaţie există deja şi nu s-a putut suprascrie.');
define('_ACA_NOT_ALLOWED_EXTENSION' , 'Extensia fişierului nu este permisă.');
define('_ACA_PARTIAL' , 'Fişierul a fost upload-at doar parţial.');
define('_ACA_UPLOAD_ERROR' , 'Eroare la upload:');
define('DEV_NO_DEF_FILE' , 'Fişierul a fost upload-at doar parţial.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Acest tag va fi înlocuit cu link-urile de subscriere.' .
		' Este <strong>recomandat</strong> pentru ca jNews să funcţioneze corect.<br />' .
		'Dacă introduci orice alt text în această componentă, el va fi afişat în toate mesajele corespunzătoare acestei liste.' .
		' <br />Adaugă mesajul de subscriere la sfârşit. jNews va adăuga automat un link pentru a permite abonatului să-şi modifice informaţiile şi un link pentru a permite dezabonarea de la listă.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Notificare');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Notificări');
define('_ACA_USE_SEF', 'SEF în mesaje');
define('_ACA_USE_SEF_TIPS', 'Este recomandat să alegi nu. Dacă totuşi vrei ca URL-ul inclus în mesaje să folosească SEF, atunci alege Da.' .
		' <br /><b>Link-urile vor funcţiona la fel în orice variantă. Opţiunea Nu va asigura că link-urile din mesaje vor funcţiona întotdeauna, chiar dacă modifici funcţionalitatea SEF.</b> ');
define('_ACA_ERR_NB' , 'Eroare #: ERR');
define('_ACA_ERR_SETTINGS', 'Eroare în timpul procesării setărilor');
define('_ACA_ERR_SEND' ,'Raportează eroarea');
define('_ACA_ERR_SEND_TIPS' ,'Dacă vrei ca jNews să fie un produs mai bun, alege DA. Aceasta ne va trimite un raport al erorii, astfel încât nu va mai fi nevoie să raportezi bug-uri ;-) <br /> <b>NU SE VOR TRIMITE INFORMAŢII CONFIDENŢIALE</b>.  Nu vom şti nici măcar de la ce site web primim eroarea. Se vor trimite doar informaţii despre jNews, configurarea PHP şi query-uri SQL. ');
define('_ACA_ERR_SHOW_TIPS' ,'Alege Da pentru a afişa numărul erorii pe ecran, folosit în principal pentru debuging. ');
define('_ACA_ERR_SHOW' ,'Afişează erorile');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Afişează link-urile de dezabonare');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Selectează Da pentru a afişa link-urile de dezabonare la sfârşitul mesajelor, pentru a permite utilizatorilor să-şi modifice subscrierea. <br /> Selectează Nu pentru a dezactiva nota de subsol şi link-urile.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">NOTĂ IMPORTANTĂ!</span> <br />Dacă actualizezi de la o versiune jNews anterioară, trebuie să actualizezi structura bazei de date făcând click pe următorul buton (Datele tale nu vor fi afectate)');
define('_ACA_UPDATE_INSTALL_BTN' , 'Actualizează tabelele şi configurarea');
define('_ACA_MAILING_MAX_TIME', 'Timpul maxim pentru coada de aşteptare' );
define('_ACA_MAILING_MAX_TIME_TIPS', 'Defineşte timpul maxim pentru fiecare set de email-uri trimis de coada de aşteptare. Valoarea recomandată este între 30s şi 2min.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'Integrare cu VirtueMart');
define('_ACA_VM_COUPON_NOTIF', 'ID de notificare cupon');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Specifică ID-ul mesajului pe care vrei să-l foloseşti pentru a trimite cupoane cumpărătorilor');
define('_ACA_VM_NEW_PRODUCT', 'ID de notificare pentru produse noi');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Specifică ID-ul mesajului pe care vrei să-l foloseşti pentru a trimite notificări despre produse noi.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Creează forma');
define('_ACA_FORM_COPY', 'Cod HTML');
define('_ACA_FORM_COPY_TIPS', 'Copiază codul HTML generate în pagina ta HTML.');
define('_ACA_FORM_LIST_TIPS', 'Selectează lista pe care doreşti s-o incluzi în formă');
// update messages
define('_ACA_UPDATE_MESS4' , 'Nu poate fi actualizată automat.');
define('_ACA_WARNG_REMOTE_FILE' , 'Nu s-a putut transfera fişierul extern.');
define('_ACA_ERROR_FETCH' , 'Nu s-a putut citi fişierul.');

define('_ACA_CHECK' , 'Verifică');
define('_ACA_MORE_INFO' , 'Mai multe informaţii');
define('_ACA_UPDATE_NEW' , 'Actualizează la versiunea mai nouă');
define('_ACA_UPGRADE' , 'Actualizează la produsul mai performant');
define('_ACA_DOWNDATE' , 'Înapoi la versiunea anterioară');
define('_ACA_DOWNGRADE' , 'Înapoi la produsul de bază');
define('_ACA_REQUIRE_JOOM' , 'Joomla este necesară');
define('_ACA_TRY_IT' , 'Încearcă!');
define('_ACA_NEWER', 'Mai nouă');
define('_ACA_OLDER', 'Mai veche');
define('_ACA_CURRENT', 'Curentă');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Încearcă una din celelalte componente');
define('_ACA_MENU_VIDEO' , 'Ghiduri video de configurare');
define('_ACA_SCHEDULE_TITLE', 'Setări pentru scheduler automat');
define('_ACA_ISSUE_NB_TIPS' , 'Numărul mesajului generat automat de sistem' );
define('_ACA_SEL_ALL' , 'Toate mesajele');
define('_ACA_SEL_ALL_SUB' , 'Toate listele');
define('_ACA_INTRO_ONLY_TIPS' , 'Dacă bifezi această căsuţa, doar introducerea articolului va fi inserată în mesaj, cu un link \'Citeşte mai mult\' la articolul complet de pe site-ul tău.' );
define('_ACA_TAGS_TITLE' , 'Tag-ul de conţinut');
define('_ACA_TAGS_TITLE_TIPS' , 'Copiază acest tag în mesajul care vrei să includă acest conţinut.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Indică adresa de email la care să se trimită un email de test');
define('_ACA_PREVIEW_TITLE' , 'Vizualizează');
define('_ACA_AUTO_UPDATE' , 'Notificare pentru actualizare disponibilă');
define('_ACA_AUTO_UPDATE_TIPS' , 'Selectează Da dacă vrei să fii anunţat despre actualizările disponibile la această componentă. <br />IMPORTANT!! Opţiunea de afişare a indicaţiilor (tips) trebuie să fie activată pentru ca această opţiune să funcţioneze.');

// since 1.1.0
define('_ACA_LICENSE' , 'Informaţii despre licenţă');

// since 1.1.1
define('_ACA_NEW' , 'Nouă');
define('_ACA_SCHEDULE_SETUP', 'Pentru ca răspunsurile automate să fie trimise trebuie să configurezi scheduler-ul în panoul de configurare.');
define('_ACA_SCHEDULER', 'Scheduler');
define('_ACA_JNEWSLETTER_CRON_DESC' , 'dacă nu ai acces la un manager de job-uri cron pe site-ul tău web, te poţi înregistra pentru un cont jNews Cron gratuit la:' );
define('_ACA_CRON_DOCUMENTATION' , 'Pentru a afla mai multe informaţii despre configurarea Scheduler-ului jNews, du-te la următorul url:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29"
 target="_blank">http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29</a>' );
define( '_ACA_QUEUE_PROCESSED' , 'Coada de aşteptare a fost procesată cu succes...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , 'Eroare la mutarea fişierului importat' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , 'Frecvenţă scheduler' );
define( '_ACA_CRON_MAX_FREQ' , 'Frecvenţă maximă scheduler' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , 'Specifică frecventa maximă la care poate rula scheduler-ul ( în minute ).  Aceasta va limita scheduler-ul chiar dacă task-ul cron este setat mai des.' );
define( '_ACA_CRON_MAX_EMAIL' , 'Numărul maxim de email-uri pe fiecare job' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , 'Specifică numărul maxim de email-uri care să fie trimis de fiecare job (0 pentru nelimitat).' );
define( '_ACA_CRON_MINUTES' , ' minute' );
define( '_ACA_SHOW_SIGNATURE' , 'Afişează nota de subsol în email-uri' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , 'Alege dacă jNews va fi promovat în nota de subsol din email-uri.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , 'Răspunsurile automate au fost procesate cu succes...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , 'Scrisorile de informare programate au fost procesate cu succes...' );
define( '_ACA_MENU_SYNC_USERS' , 'Sincronizează utilizatorii' );
define( '_ACA_SYNC_USERS_SUCCESS' , 'Sincronizarea utilizatorilor a avut succes!' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Ieşire' );
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Da' );
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Nu' );
if (!defined('_HI')) define( '_HI', 'Bună' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Sus' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Jos' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Ieşire' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , 'Dacă selectezi această opţiune, doar titlul articolului va fi inserat în mesaj ca link la articolul complet de pe site-ul tău.');
define('_ACA_TITLE_ONLY' , 'Doar titlul');
define('_ACA_FULL_ARTICLE_TIPS' , 'Dacă selectezi această opţiune tot articolul va fi inserat în mesaj');
define('_ACA_FULL_ARTICLE' , 'Tot articolul');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Selectează un element de conţinut care să fie adăugat la mesaj. <br />Copiază <b>tag-ul de conţinut</b> în mesaj.  Poţi alege textul complet, doar introducerea sau doar titlul (0, 1 sau 2). ');
define('_ACA_SUBSCRIBE_LIST2', 'Listă(e) de mesaje');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Scrisoare de informare inteligentă');
define('_ACA_MENU_AUTONEWS', 'Scrisori de informare inteligente');
define('_ACA_AUTO_NEWS_OPTION', 'Opţiuni pentru scrisoare de informare inteligentă');
define('_ACA_AUTONEWS_FREQ', 'Frecvenţa scrisorii de informare');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Specifică frecvenţa la care vrei să se trimită scrisoarea de informare inteligentă.');
define('_ACA_AUTONEWS_SECTION', 'Secţiunea articolelor');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Specifică secţiunea din care vrei să se aleagă articole.');
define('_ACA_AUTONEWS_CAT', 'Categoria articolelor');
define('_ACA_AUTONEWS_CAT_TIPS', 'Specifică categoria din care vrei să se aleagă articole (Toate pentru toate articolele din această secţiune).');
define('_ACA_SELECT_SECTION', 'Selectează o secţiune');
define('_ACA_SELECT_CAT', 'Toate categoriile');
define('_ACA_AUTO_DAY_CH8', 'Trimestrial');
define('_ACA_AUTONEWS_STARTDATE', 'Data de început');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Specifică data la care vrei să se înceapă trimiterea de scrisori de informare inteligente.');
define('_ACA_AUTONEWS_TYPE', 'Afişare conţinut');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Articol complet: va include articolul complet în scrisoarea de informare.<br />' .
		'Doar introducerea: va include doar introducerea articolului în scrisoarea de informare.<br/>' .
		'Doar titlul: va include doar titlul articolului în scrisoarea de informare.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Acest tag va fi înlocuit de scrisoarea de informare inteligentă.' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Creează / Vezi mesaje');
define('_ACA_LICENSE_CONFIG' , 'Licenţa' );
define('_ACA_ENTER_LICENSE' , 'Introdu licenţa');
define('_ACA_ENTER_LICENSE_TIPS' , 'Introdu codul din licenţă şi salvează-l.');
define('_ACA_LICENSE_SETTING' , 'Setări licenţă' );
define('_ACA_GOOD_LIC' , 'Licenţa ta este validă.' );
define('_ACA_NOTSO_GOOD_LIC' , 'Licenţa ta nu este validă: ' );
define('_ACA_PLEASE_LIC' , 'Contactează suportul jNews pentru a-ţi actualiza licenţa ( license@acajoom.com ).' );
define('_ACA_DESC_PLUS', 'jNews Plus este prima componentă de răspuns automat secvenţial pentru Joomla CMS.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO sistemul complet de mesaje pentru Joomla CMS.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , 'Introdu codul');

define('_ACA_ENTER_TOKEN_TIPS' , 'Introdu codul pe care l-ai primit prin email când ai cumpărat jNews. ');

define('_ACA_JNEWSLETTER_SITE', 'Site-ul jNews:');
define('_ACA_MY_SITE', 'Site-ul meu:');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'Click aici pentru a merge la forma pentru licenţă.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , 'Goleşte câmpul de licenţă şi apoi încearcă din nou.<br />  Dacă problema persistă, ' );

define( '_ACA_LICENSE_SUPPORT' , 'Dacă ai probleme în continuare, ' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , 'poţi să obţii manual licenţa introducând codul si URL-ul site-ului (care este evidenţiat în verde în partea de sus a paginii) în forma pentru licenţă. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', 'După ce salvezi codul o licenţă va fi generată automat. ' .
		' De obicei codul este validat în 2 minute, dar câteodată poate dura mai mult, până la 15 minute.<br />' .
		'<br />Verifică din nou acest panou de control în câteva minute.  <br /><br />' .
		'Dacă nu ai primit o licenţă validă în 15 minute, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , 'Codul tău nu a fost validat încă.');
define( '_ACA_UPDATE_CLICK_HERE' , 'Vizitează <a href="http://www.acajoom.com" target="_blank">www.acajoom.com</a> pentru a descărca ultima versiune.');
define( '_ACA_NOTIF_UPDATE' , 'Pentru a fi notificat despre ultimele actualizări introdu adresa de email şi click pe subscrie ');

define('_ACA_THINK_PLUS', 'Dacă vrei mai multe de la sistemul tău de mesaje, poţi încerca varianta Plus!');
define('_ACA_THINK_PLUS_1', 'Răspunsuri automate secvenţiale');
define('_ACA_THINK_PLUS_2', 'Programează trimiterea scrisorilor tale de informare la o dată predefinită');
define('_ACA_THINK_PLUS_3', 'Nu mai există limitări pe server');
define('_ACA_THINK_PLUS_4', 'şi multe altele...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', 'Accesul la listă' );
define( '_ACA_INFO_LIST_ACCESS', 'Specifică ce grup de utilizatori poate vedea şi se poate abona la această listă' );
define( 'ACA_NO_LIST_PERM', 'Nu ai dreptul să te abonezi la această listă' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Arhivează');
 define('_ACA_MENU_ARCHIVE_ALL', 'Arhivează totul');

//Archive Lists
 define('_FREQ_OPT_0', 'Nimic');
 define('_FREQ_OPT_1', 'Fiecare săptămână');
 define('_FREQ_OPT_2', 'Fiecare 2 săptămâni');
 define('_FREQ_OPT_3', 'Fiecare lună');
 define('_FREQ_OPT_4', 'Fiecare trimestru');
 define('_FREQ_OPT_5', 'Fiecare an');
 define('_FREQ_OPT_6', 'Altă modalitate');

define('_DATE_OPT_1', 'Data creării');
define('_DATE_OPT_2', 'Data modificării');

define('_ACA_ARCHIVE_TITLE', 'Setarea frecvenţei de auto-arhivare');
define('_ACA_FREQ_TITLE', 'Frecvenţa de arhivare');
define('_ACA_FREQ_TOOL', 'Defineşte cât de des vrei ca Managerul de arhive să arhiveze conţinutul site-ului tău web.');
define('_ACA_NB_DAYS', 'Numărul de zile');
define('_ACA_NB_DAYS_TOOL', 'Acesta este valabilă doar pentru opţiunea \'Altă modalitate\'! Specifică numărul de zile între arhive.');
define('_ACA_DATE_TITLE', 'Tipul datei');
define('_ACA_DATE_TOOL', 'Alege dacă vrei ca arhivarea să fie făcută la data creării sau data modificării.');

define('_ACA_MAINTENANCE_TAB', 'Setări de întreţinere');
define('_ACA_MAINTENANCE_FREQ', 'Frecvenţa întreţinerii');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Specifică frecvenţa la care vrei să ruleze rutina de întreţinere.' );
define( '_ACA_CRON_DAYS' , 'oră(e)' );

define( '_ACA_LIST_NOT_AVAIL', 'Nici o listă nu este disponibilă.');
define( '_ACA_LIST_ADD_TAB', 'Adaugă / Modifică' );

define( '_ACA_LIST_ACCESS_EDIT', 'Acces la adăugare / modificare mesaj' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Specifică ce grup de utilizatori poate adăuga sau modifică un mesaj la această listă' );
define( '_ACA_MAILING_NEW_FRONT', 'Creează un mesaj nou' );

define('_ACA_AUTO_ARCHIVE', 'Auto-arhivare');
define('_ACA_MENU_ARCHIVE', 'Auto-arhivare');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Acest tag va fi înlocuit cu numărul ediţiei scrisorii de informare.');
define('_ACA_TAGS_DATE', '[DATE] = Acest tag va fi înlocuit cu data trimiterii.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Acest tag va fi înlocuit cu valoarea din câmpul Community Builder: cum ar fi [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Întreţinere' );

define('_ACA_THINK_PRO', 'Când ai nevoie de ajutor profesional, foloseşte componente profesionale!');
define('_ACA_THINK_PRO_1', 'Scrisori de informare inteligente');
define('_ACA_THINK_PRO_2', 'Defineşte nivelul de acces pentru lista ta');
define('_ACA_THINK_PRO_3', 'Defineşte cine poate adăuga / modifica mesaje');
define('_ACA_THINK_PRO_4', 'Mai multe tag-uri: adaugă câmpurile tale CB');
define('_ACA_THINK_PRO_5', 'Auto arhivare conţinut Joomla');
define('_ACA_THINK_PRO_6', 'Optimizare baza de date');

define('_ACA_LIC_NOT_YET', 'Licenţa ta nu este încă validă.  Verifică Tab-ul de licenţă în panoul de configurare.');
define('_ACA_PLEASE_LIC_GREEN' , 'Echipa noastră de suport are nevoie de toate informaţiile marcate cu verde în partea de sus a tab-ului.' );

define('_ACA_FOLLOW_LINK' , 'Primeşte-ţi licenţa');
define( '_ACA_FOLLOW_LINK_TWO' , 'Poţi să-ţi primeşti licenţa introducând codul şi URL-ul site-ului (care este marcat cu verde în partea de sus a paginii) în forma de Licenţă. ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Apoi click pe butonul Trimite în meniul din dreapta sus.' );
define( '_ACA_ENTER_LIC_NB', 'Introdu licenţa ta' );
define( '_ACA_UPGRADE_LICENSE', 'Actualizează licenţa');
define( '_ACA_UPGRADE_LICENSE_TIPS' , 'Dacă ai primit un cod pentru a-ţi actualiza licenţa, introdu-l aici, click pe Trimite si apoi treci la numărul <b>2</b> pentru a primi noul număr de licenţă.' );

define( '_ACA_MAIL_FORMAT', 'Format de encodare' );
define( '_ACA_MAIL_FORMAT_TIPS', 'Ce format vrei să foloseşti pentru a encoda mesajele, doar Text sau MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Dacă nu ai acces la un manager de job-uri periodice pe site-ul tău web, poţi folosi componenta gratuită jCron pentru a crea un job periodic pentru site-ul tău web.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Afişează numele Autorului');
define('_ACA_SHOW_AUTHOR_TIPS', 'Selectează Da dacă doreşti să adaugi numele autorului când adaugi un articol într-un mesaj');

//since 1.3.5
define('_ACA_REGWARN_NAME','Introdu numele tău.');
define('_ACA_REGWARN_MAIL','Introdu o adresă validă de email.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','Dacă selectezi Da, email-ul utilizatorului va fi adăugat ca parametru la sfârşitul URL-ului de redirectare (link-ul de redirectare pentru modulul tău sau pentru o formă externă jNews).<br/>Această opţiune poate fi folositoare dacă doreşti să execuţi un script special în pagina de redirectare.');
define('_ACA_ADDEMAILREDLINK','Adaugă email-ul la link-ul de redirectare');

//since 1.6.3
define('_ACA_ITEMID','Id element');
define('_ACA_ITEMID_TIPS','Acest id va fi adăugat la link-urile tale jNews.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','Afişează tab-ul de integrare jCalPRO <br/>(doar dacă componenta jCalPRO este instalată pe site-ul tău web!)');
define('_ACA_JCALTAGS_TITLE','Tag jCalPRO:');
define('_ACA_JCALTAGS_TITLE_TIPS','Copiază acest tag în mesajul în care vrei să adaugi evenimentul.');
define('_ACA_JCALTAGS_DESC','Descriere:');
define('_ACA_JCALTAGS_DESC_TIPS','Selectează Da dacă doreşti să introduci descrierea evenimentului');
define('_ACA_JCALTAGS_START','Data de start:');
define('_ACA_JCALTAGS_START_TIPS','Selectează Da dacă doreşti să introduci data de start a evenimentului');
define('_ACA_JCALTAGS_READMORE','Citeşte mai mult:');
define('_ACA_JCALTAGS_READMORE_TIPS','Selectează Da dacă doreşti să introduci un <b>link \'Citeşte mai mult\'</b> pentru acest eveniment');
define('_ACA_REDIRECTCONFIRMATION','URL de redirectare');
define('_ACA_REDIRECTCONFIRMATION_TIPS','Dacă ai nevoie de un email de confirmare, utilizatorul va fi confirmat şi redirectat la acest URL dacă face click pe link-ul de confirmare.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Nu ai încă un cont?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Înregistrează-te');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','Nu ai dreptul să vezi această resursă.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP','Dezactivează indicaţiile (tooltip)');
define('_ACA_DISABLETOOLTIP_TIPS', 'Dezactivează indicaţiile (tooltip) în front-end');
define('_ACA_MINISENDMAIL', 'Foloseşte utilizatorul Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS', 'Dacă serverul tău foloseşte utilitarul Mini SendMail, selectează această opţiune pentru a nu adăuga numele utilizatorului în antetul email-ului');

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