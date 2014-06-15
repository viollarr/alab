<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');

/**
* <p>Finnish language file</p>
* @author Tero Kankaanperä <tero@terokankaanpera.fi>
* @version $Id: finnish.php 491 2007-02-01 22:56:07Z divivo $
* @link http://terokankaanpera.fi
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
define('_ACA_DESC_CORE', 'jNews on sähköpostilista, uutiskirje, automaattivastaaja ja seurantatyökalu tehokkaaseen viestimiseen käyttäjiesi ja asiakkaidesi kanssa.  ' .
		'jNews, Your Communication Partner!');
define('_ACA_DESC_GPL', 'jNews on sähköpostilista, uutiskirje, automaattivastaaja ja seurantatyökalu tehokkaaseen viestimiseen käyttäjiesi ja asiakkaidesi kanssa.  ' .
		'jNews, Your Communication Partner!');
define('_ACA_FEATURES', 'jNews, your communication partner!');

// Type of lists
define('_ACA_NEWSLETTER', 'Uutiskirje');
define('_ACA_AUTORESP', 'Automaattivastaaja');
define('_ACA_AUTORSS', 'Auto-RSS');
define('_ACA_ECARD', 'eKortti');
define('_ACA_POSTCARD', 'Postikortti');
define('_ACA_PERF', 'Näytös');
define('_ACA_COUPON', 'Kuponki');
define('_ACA_CRON', 'Cron tehtävä');
define('_ACA_MAILING', 'Postitus');
define('_ACA_LIST', 'Lista');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Listat');
define('_ACA_MENU_SUBSCRIBERS', 'Tilaajat');
define('_ACA_MENU_NEWSLETTERS', 'Uutiskirjeet');
define('_ACA_MENU_AUTOS', 'Automaattivastaajat');
define('_ACA_MENU_COUPONS', 'Kupongit');
define('_ACA_MENU_CRONS', 'Cron tehtävät');
define('_ACA_MENU_AUTORSS', 'Auto-RSS');
define('_ACA_MENU_ECARD', 'eKortit');
define('_ACA_MENU_POSTCARDS', 'Postikortit');
define('_ACA_MENU_PERFS', 'Näytökset');
define('_ACA_MENU_TAB_LIST', 'Listat');
define('_ACA_MENU_MAILING_TITLE', 'Postitukset');
define('_ACA_MENU_MAILING' , 'Postitukset ');
define('_ACA_MENU_STATS', 'Tilastot');
define('_ACA_MENU_STATS_FOR', 'Tilastot ');
define('_ACA_MENU_CONF', 'Asetukset');
define('_ACA_MENU_UPDATE', 'Tuonti');
define('_ACA_MENU_ABOUT', 'Tietoa');
define('_ACA_MENU_LEARN', 'Oppimiskeskus');
define('_ACA_MENU_MEDIA', 'Medianhallinta');
define('_ACA_MENU_HELP', 'Ohje');
define('_ACA_MENU_CPANEL', 'Ohjauspaneeli');
define('_ACA_MENU_IMPORT', 'Tuo');
define('_ACA_MENU_EXPORT', 'Vie');
define('_ACA_MENU_SUB_ALL', 'Tilaa kaikki');
define('_ACA_MENU_UNSUB_ALL', 'Peru kaikki');
define('_ACA_MENU_VIEW_ARCHIVE', 'Arkisto');
define('_ACA_MENU_PREVIEW', 'Esikatselu');
define('_ACA_MENU_SEND', 'Lähetä');
define('_ACA_MENU_SEND_TEST', 'Tee koelähetys');
define('_ACA_MENU_SEND_QUEUE', 'Suorita jono');
define('_ACA_MENU_VIEW', 'Katso');
define('_ACA_MENU_COPY', 'Kopioi');
define('_ACA_MENU_VIEW_STATS' , 'Katso tilastot');
define('_ACA_MENU_CRTL_PANEL' , ' Ohjauspaneeli');
define('_ACA_MENU_LIST_NEW' , ' Luo lista');
define('_ACA_MENU_LIST_EDIT' , ' Muokkaa listaa');
define('_ACA_MENU_BACK', 'Takaisin');
define('_ACA_MENU_INSTALL', 'Asennus');
define('_ACA_MENU_TAB_SUM', 'Yhteenveto');
define('_ACA_STATUS' , 'Status');

// messages
define('_ACA_ERROR' , ' Tapahtui virhe! ');
define('_ACA_SUB_ACCESS' , 'Käyttöoikeudet');
define('_ACA_DESC_CREDITS', 'Credits');
define('_ACA_DESC_INFO', 'Tietoa');
define('_ACA_DESC_HOME', 'Kotisivu');
define('_ACA_DESC_MAILING', 'Postituslista');
define('_ACA_DESC_SUBSCRIBERS', 'Tilaajat');
define('_ACA_PUBLISHED','Julkaistu');
define('_ACA_UNPUBLISHED','Piilotettu');
define('_ACA_DELETE','Poista');
define('_ACA_FILTER','Suodata');
define('_ACA_UPDATE','Päivitä');
define('_ACA_SAVE','Tallena');
define('_ACA_CANCEL','Peru');
define('_ACA_NAME','Nimi');
define('_ACA_EMAIL','Sähköpostiosoite');
define('_ACA_SELECT','Valitse');
define('_ACA_ALL','Kaikki');
define('_ACA_SEND_A', 'Lähetä ');
define('_ACA_SUCCESS_DELETED', ' poistettiin onnistuneesti');
define('_ACA_LIST_ADDED', 'Lista luotiin onnistuneesti');
define('_ACA_LIST_COPY', 'Lista kopioitiin onnistuneesti');
define('_ACA_LIST_UPDATED', 'Lista päivitettiin onnistuneesti');
define('_ACA_MAILING_SAVED', 'Postitus tallennettiin onnistuneesti.');
define('_ACA_UPDATED_SUCCESSFULLY', 'päivitettiin onnistuneesti.');

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Tilaajan tiedot');
define('_ACA_VERIFY_INFO', 'Ole hyvä ja varmista linkki, tietoa puuttuu.');
define('_ACA_INPUT_NAME', 'Nimi');
define('_ACA_INPUT_EMAIL', 'Sähköpostiosoite');
define('_ACA_RECEIVE_HTML', 'HTML muotoilu?');
define('_ACA_TIME_ZONE', 'Aikavyöhyke');
define('_ACA_BLACK_LIST', 'Mustalista');
define('_ACA_REGISTRATION_DATE', 'Käyttäjäksi rekisteröitymispvm');
define('_ACA_USER_ID', 'Käyttäjän id');
define('_ACA_DESCRIPTION', 'Kuvaus');
define('_ACA_ACCOUNT_CONFIRMED', 'Tilisi on aktivoitu.');
define('_ACA_SUB_SUBSCRIBER', 'Tilaaja');
define('_ACA_SUB_PUBLISHER', 'Julkaisija');
define('_ACA_SUB_ADMIN', 'Ylläpitäjä');
define('_ACA_REGISTERED', 'Rekisteröitynyt');
define('_ACA_SUBSCRIPTIONS', 'Tilauksesi');
define('_ACA_SEND_UNSUBCRIBE', 'Lähetä peruutusviesti');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Napsauta Kyllä lähettääksesi peruutusviestin vahvistusviesti.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Ole hyvä ja varmista tilauksesi');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Peruutusvahvistus');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Hei [NAME],<br />' .
		'Vielä yksi askel ja olet tilannut uutiskirjeen.  Ole hyvä ja napsauta seuraavaa linkkiä vahvistaaksesi tilauksesi.' .
		'<br /><br />[CONFIRM]<br /><br />Jos sinulla on kysyttävää ota yhteyttä ylläpitäjään.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Tämä on varmistusviesti että olet peruuttanut uutiskirjeemme tilauksesi.  Olemme pahoillamme siitä, että päätit peruuttaa tilauksesi ja haluamme muistuttaa että voit uudistaa tilauksesi koska tahansa kotisivuillamme.  Jos sinulla on kysyttävää, ota yhteyttä ylläpitoomme.');

// jNews subscribers
define('_ACA_SIGNUP_DATE', 'Tilauspäivämäärä');
define('_ACA_CONFIRMED', 'Vahvistettu');
define('_ACA_SUBSCRIB', 'Tilaa');
define('_ACA_HTML', 'HTML muotoilu');
define('_ACA_RESULTS', 'Tulokset');
define('_ACA_SEL_LIST', 'Valitse lista');
define('_ACA_SEL_LIST_TYPE', '- Valitse listan tyyppi -');
define('_ACA_SUSCRIB_LIST', 'Listaa kaikki tilaajat');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Tilaajat listalle : ');
define('_ACA_NO_SUSCRIBERS', 'Listalle ei löydy tilaajia.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Vahvistus sähköposti on lähetetty sähköpostiosoitteeseesi.  Ole hyvä ja tarkista viestisi ja napsauta viestissä olevaa linkkiä.<br />' .
		'Sinun täytyy varmistaa sähköpostiosoitteesi tilauksesi voimaan saattamiseksi.');
define('_ACA_SUCCESS_ADD_LIST', 'Sinut on onnistuneesti liitetty listalle.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Napsauta tästä vahvistaaksesi tilauksesi');
define('_ACA_UNSUBSCRIBE_LINK', 'Napsauta tästä poistaaksesi itsesi listalta');
define('_ACA_UNSUBSCRIBE_MESS', 'Sähköpostiosoitteesi on poistettu listalta');

define('_ACA_QUEUE_SENT_SUCCESS' , 'Kaikki ajastetut postitukset on onnistuneesti lähetetty.');
define('_ACA_MALING_VIEW', 'Katso kaikki postitukset');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Oletko varma että haluat peruuttaa tämän listan tilauksesi?');
define('_ACA_MOD_SUBSCRIBE', 'Tilaa');
define('_ACA_SUBSCRIBE', 'Tilaa');
define('_ACA_UNSUBSCRIBE', 'Peru tilaus');
define('_ACA_VIEW_ARCHIVE', 'Katso arkisto');
define('_ACA_SUBSCRIPTION_OR', ' tai napsauta tästä päivittääksesi tietosi');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Tämä sähköpostiosoite on jo rekisteröity.');
define('_ACA_SUBSCRIBER_DELETED', 'Tilaaja on poistettu onnistuneesti.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Käyttäjän ohjauspaneeli');
define('_UCP_USER_MENU', 'Käyttäjän valikko');
define('_UCP_USER_CONTACT', 'Tilaukseni');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Cron tehtävien hallinta');
define('_UCP_CRON_NEW_MENU', 'Uusi ajastus');
define('_UCP_CRON_LIST_MENU', 'Listaa Cron tehtävät');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Kuponkien hallinta');
define('_UCP_COUPON_LIST_MENU', 'Lista kupongit');
define('_UCP_COUPON_ADD_MENU', 'Lisää kuponki');

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Kuvaus');
define('_ACA_LIST_T_LAYOUT', 'Ulkoasu');
define('_ACA_LIST_T_SUBSCRIPTION', 'Tilaukset');
define('_ACA_LIST_T_SENDER', 'Lähettäjätiedot');

define('_ACA_LIST_TYPE', 'Listan tyyppi');
define('_ACA_LIST_NAME', 'Listan nimi');
define('_ACA_LIST_ISSUE', 'Numero ');
define('_ACA_LIST_DATE', 'Lähetyspäivä');
define('_ACA_LIST_SUB', 'Postituksen otsikko');
define('_ACA_ATTACHED_FILES', 'Liitetiedostot');
define('_ACA_SELECT_LIST', 'Ole hyvä ja valitse lista muokattavaksi!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Listan tyyppi');
define('_ACA_AUTO_RESP_OPTION', 'Automaattivastaajan asetukset');
define('_ACA_AUTO_RESP_FREQ', 'Tilaajat voivat valita taajuuden');
define('_ACA_AUTO_DELAY', 'Viive (päivissä)');
define('_ACA_AUTO_DAY_MIN', 'Vähimmäistaajuus');
define('_ACA_AUTO_DAY_MAX', 'Enimmäistaajuus');
define('_ACA_FOLLOW_UP', 'Seuranta automaattivastaaja');
define('_ACA_AUTO_RESP_TIME', 'Tilaajat voivat valita ajan');
define('_ACA_LIST_SENDER', 'Listan lähettäjä');

define('_ACA_LIST_DESC', 'Listan kuvaus');
define('_ACA_LAYOUT', 'Ulkoasu');
define('_ACA_SENDER_NAME', 'Lähettäjän nimi');
define('_ACA_SENDER_EMAIL', 'Lähettäjän sähköpostiosoite');
define('_ACA_SENDER_BOUNCE', 'Lähettäjän reply-to osoite');
define('_ACA_LIST_DELAY', 'Viive');
define('_ACA_HTML_MAILING', 'HTML muotoilu?');
define('_ACA_HTML_MAILING_DESC', '(jos muutat tätä, sinun täytyy tallentaa ja palata tälle ruudulle nähdäksesi muutokset.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Piilota julkisesta liittymästä?');
define('_ACA_SELECT_IMPORT_FILE', 'Valitse tuontitiedosto');;
define('_ACA_IMPORT_FINISHED', 'Tuonti suoritettu');
define('_ACA_DELETION_OFFILE', 'Tiedoston poistaminen');
define('_ACA_MANUALLY_DELETE', 'epäonnistui, sinun täytyy poistaa tiedosto manuaalisesti');
define('_ACA_CANNOT_WRITE_DIR', 'Hakemistoon ei voi kirjoittaa');
define('_ACA_NOT_PUBLISHED', 'Postitusta ei voitu lähettää, listaa ei ole julkaistu.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Napsauta Kyllä julkaistaksesi lista');
define('_ACA_INFO_LIST_NAME', 'Kirjoita listan nimi tähän. Voit tunnistaa listan tällä nimellä.');
define('_ACA_INFO_LIST_DESC', 'Kirjoita lyhyt kuvaus listasta tähän. Tämä kuvaus on sivustosi käyttäjien luettavissa.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Anna listan postitusten lähettäjän käytetty nimi. Nimi näkyy tilaajille heidän saamissaan viesteissä.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Anna sähköpostiosoite, josta listan viestit lähtevät. ');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Anna sähköpostiosoite, johon listan vastaanottajat voivat vastata. Tämän suositellaan vakavasti olevan sama kuin lähettäjän osoite, koska roskapostisuodattimet antavat viestillesi korkeammat pisteet jos ne ovat eri osoitteita.');
define('_ACA_INFO_LIST_AUTORESP', 'Valitse postitusten tyyppi tälle listalle. <br />' .
		'Uutiskirje: tavallinen uutiskirje<br />' .
		'Automaattivastaaja: automaattivastaaja on lista, joka lähetetään sivuston kautta säännöllisin välein.');
define('_ACA_INFO_LIST_FREQUENCY', 'Anna käyttäjien valita miten usein he saavat viestin.  Tämä anta enemmän joustavuutta käyttäjille.');
define('_ACA_INFO_LIST_TIME', 'Anna käyttäjien valita mihin aikaan he haluavat saada viestin listalta.');
define('_ACA_INFO_LIST_MIN_DAY', 'Määrittele mikä on vähimmäistaajuus, jolla käyttäjät voivat listan tilata.');
define('_ACA_INFO_LIST_DELAY', 'Määrittele viive tämän ja edellisen automaattivastaajan välille.');
define('_ACA_INFO_LIST_DATE', 'Määrittele päivämäärä, jolloin haluat julkaista uutislistan jos haluat viivyttää sen julkaisemista. <br /> MUOTO : VVVV-KK-PP TT:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Määrittele mikä on enimmäistaajuus, jolla käyttäjät voivat listan tilata.');
define('_ACA_INFO_LIST_LAYOUT', 'Syotä listan viestien ulkoasu tähän. Voit määritellä ulkoasun täysin vapaasti.');
define('_ACA_INFO_LIST_SUB_MESS', 'Tämä viesti lähetetään käyttäjälle kun hän ensimmäisen kerran rekisteröityy. Voit määritellä tekstin vapaasti.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Tämä viestin lähetetään tilaajalle kun hän peruuttaa tilauksensa. Mikä tahansa viesti voidaan asettaa tässä.');
define('_ACA_INFO_LIST_HTML', 'Valitse tämä ruutu jos haluat lähettää HTML-muotoiltuja viestejä. Käyttäjät voivat HTML-listaa tilatessaan määritellä haluavatko he vastaanottaa HTML-muotoiltuja vai pelkkänä tekstinä lähetettyjä viestejä.');
define('_ACA_INFO_LIST_HIDDEN', 'Valitse Kyllä piilottaaksesi tämä lista julkisesta liittymästä, käyttäjät eivät voi tilata listaa, mutta sinä voit edelleen lähettää viestejä sille.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Haluatko automaattisesti liittää uudet käyttäjät tälle listalle?<br /><B>Uudet käyttäjät:</B> liittää kaikki uudet sivustolle rekisteröityvät.<br /><B>Kaikki käyttäjät:</B> liittää kaikki tietokannan rekisteröidyt käyttäjät.<br />(kaikki vaihtoehdot tukevat Community Builderia)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Valitse julkisen liittymän käyttöoikeustaso. Tämä näyttää tai piilottaa listan käyttäjäryhmiltä joilla ei ole riittäviä oikeusia siihen, jotta he eivät voi tilata sitä.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Valitse käyttöoikeusryhmä, jolle haluat antaa muokkausoikeuden. Tähän ja ylempiin ryhmiin kuuluvat voivat muokata postitusta ja lähettää sen, julkisesta tai ylläpitoliittymästä.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Jos haluat että automaattivastaaja siirtyy listasta toiseen kun viimeinen viesti on lähetetty voi määritellä tässä seuraavan listan.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Tämä on listan luoneen henkilön ID.');
define('_ACA_INFO_LIST_WARNING', '   Tämä viimeinen asetus on asetettavissa vain kerran listan luomisen yhteydessä.');
define('_ACA_INFO_LIST_SUBJET', ' Postituksen otsikko.  Tämä on tilaajien saaman sähköpostiviestin otsikko.');
define('_ACA_INFO_MAILING_CONTENT', 'Tämä on lähettämäsi sähköpostiviestin runko (sisältö).');
define('_ACA_INFO_MAILING_NOHTML', 'Lisää tähän pelkkänä tekstinä lähetettävän viestin runko (sisältö) niille käyttäjille, jotka valitsivat pelkän tekstimuotoisen viestin <BR/> HUOMAA: jos jätät tämän tyhjäksi jNews konvertoi HTML-muotoisen viestin automaattisesti pelkäksi tekstiksi.');
define('_ACA_INFO_MAILING_VISIBLE', 'Valitse Kyllä näyttääksesi postitus julkisessa liittymässä.');
define('_ACA_INSERT_CONTENT', 'Lisää olemassa olevaa sisältöä.');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Kuponki onnistuneesti lähetetty!');
define('_ACA_CHOOSE_COUPON', 'Valitse kuponki');
define('_ACA_TO_USER', ' tälle käyttäjälle');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Joka x. tunti');
define('_ACA_FREQ_CH2', 'Joka 6. tunti');
define('_ACA_FREQ_CH3', 'Joka 12. tunti');
define('_ACA_FREQ_CH4', 'Päivittäin');
define('_ACA_FREQ_CH5', 'Viikoittain');
define('_ACA_FREQ_CH6', 'kuukausittain');
define('_ACA_FREQ_NONE', 'Ei');
define('_ACA_FREQ_NEW', 'Uudet käyttäjät');
define('_ACA_FREQ_ALL', 'Kaikki käyttäjät');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews Cron?');
define('_ACA_LABEL_FREQ_TIPS', 'Valitse Kyllä jos haluat käyttää tätä jNews Cron-ajatukseen, Ei mitä tahansa muuta Cron-ajastusta varten.<br />' .
		'Jos valitset Kyllä sinun ei tarvitse määritellä Cron osoitetta, se lisätään automaattisesti.');
define('_ACA_SITE_URL' , 'Sivustosi URL');
define('_ACA_CRON_FREQUENCY' , 'Cron taajuus');
define('_ACA_STARTDATE_FREQ' , 'Aloitus päivämäärä');
define('_ACA_LABELDATE_FREQ' , 'Määrittele päivä');
define('_ACA_LABELTIME_FREQ' , 'Määrittele aika');
define('_ACA_CRON_URL', 'Cron URL');
define('_ACA_CRON_FREQ', 'Taajuus');
define('_ACA_TITLE_CRONLIST', 'Cron lista');
define('_NEW_LIST', 'Luo uusi lista');

//title CRON form
define('_ACA_TITLE_FREQ', 'Cron muokkaa');
define('_ACA_CRON_SITE_URL', 'Ole hyvä ja anna toimiva sivuston url, alkaen http://');

### Mailings ###
define('_ACA_MAILING_ALL', 'Kaikki postitukset');
define('_ACA_EDIT_A', 'Muokkaa ');
define('_ACA_SELCT_MAILING', 'Valitse lista alasvetovalikosta lisätäksesi uusi postitus.');
define('_ACA_VISIBLE_FRONT', 'Näkyy julkisessa liittymässä');

// mailer
define('_ACA_SUBJECT', 'Otsikko');
define('_ACA_CONTENT', 'Sisältö');
define('_ACA_NAMEREP', '[NAME] = Tämä korvataan tilaajan antamalla nimellä, lähetät kohdistettua sähköpostia kun käytät tätä.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Tämä korvataan tilaajan antamalla etunimellä.<br />');
define('_ACA_NONHTML', 'HTML:tön versio');
define('_ACA_ATTACHMENTS', 'Liitteet');
define('_ACA_SELECT_MULTIPLE', 'Pidä CTRL (tai command) pohjassa valitaksesi useita liitteitä.<br />' .
		'Tässä listassa näytetyt liitteet ovat liitehakemistossa, voit muuttaa sijaintia ohjauspaneelista.');
define('_ACA_CONTENT_ITEM', 'Sisältönimike');
define('_ACA_SENDING_EMAIL', 'Lähetetään sähköpostia');
define('_ACA_MESSAGE_NOT', 'Viestiä ei voitu lähettää');
define('_ACA_MAILER_ERROR', 'Postitusohjelma virhe');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Viesti lähetetty onnistuneesti');
define('_ACA_SENDING_TOOK', 'Tämän postituksen lähettäminen kesti');
define('_ACA_SECONDS', 'sekuntia');
define('_ACA_NO_ADDRESS_ENTERED', 'Ei sähköpostiosoitteita tai tilaajia käytettävissä');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Muuta');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Muuta tilaustasi');
define('_ACA_WHICH_EMAIL_TEST', 'Anna sähköpostiosoite johon koeviesti lähetetään tai valitse esikatselu');
define('_ACA_SEND_IN_HTML', 'Lähetä HTML-muotoiltuna (HTML-listoille)?');
define('_ACA_VISIBLE', 'Näkyvä');
define('_ACA_INTRO_ONLY', 'Vain ingressi');

// stats
define('_ACA_GLOBALSTATS', 'Kokonaistilastot');
define('_ACA_DETAILED_STATS', 'Yksityiskohtaiset tilastot');
define('_ACA_MAILING_LIST_DETAILS', 'Listan yksityiskohdat');
define('_ACA_SEND_IN_HTML_FORMAT', 'Lähetetty HTML muodossa');
define('_ACA_VIEWS_FROM_HTML', 'Lukukerrat (HTML-viesteistä)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Lähetetty tekstimuodossa');
define('_ACA_HTML_READ', 'HTML luettu');
define('_ACA_HTML_UNREAD', 'HTML lukematta');
define('_ACA_TEXT_ONLY_SENT', 'Vain teksti');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Sähköposti');
define('_ACA_LOGGING_CONFIG', 'Lokit ja tilastot');
define('_ACA_SUBSCRIBER_CONFIG', 'Tilaajat');
define('_ACA_MISC_CONFIG', 'Sekalaista');
define('_ACA_MAIL_SETTINGS', 'Sähköpostiasetukset');
define('_ACA_MAILINGS_SETTINGS', 'Postitusasetukset');
define('_ACA_SUBCRIBERS_SETTINGS', 'Tilausasetukset');
define('_ACA_CRON_SETTINGS', 'Cron asetukset');
define('_ACA_SENDING_SETTINGS', 'Lähetysasetukset');
define('_ACA_STATS_SETTINGS', 'Tilastoasetukset');
define('_ACA_LOGS_SETTINGS', 'Lokiasetukset');
define('_ACA_MISC_SETTINGS', 'Sekalaiset asetukset');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Palautuvat viestit vastaanottava osoite<br/> (käytetään kaikille viesteillesi)');
define('_ACA_SEND_MAIL_NAME', 'Lähettäjän nimi');
define('_ACA_MAILSENDMETHOD', 'Postitusohjelma');
define('_ACA_SENDMAILPATH', 'Sendmail polku');
define('_ACA_SMTPHOST', 'SMTP palvelin');
define('_ACA_SMTPAUTHREQUIRED', 'SMTP vaatii tunnistamisen');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Valitse Kyllä jos SMTP-palvelimesi vaatii tunnistamisen');
define('_ACA_SMTPUSERNAME', 'SMTP käyttäjätunnus');
define('_ACA_SMTPUSERNAME_TIPS', 'Jos palvelimesi vaatii tunnistamisen anna SMTP-käyttäjätunnus');
define('_ACA_SMTPPASSWORD', 'SMTP salasana');
define('_ACA_SMTPPASSWORD_TIPS', 'Jos palvelimesi vaatii tunnistamisen anna SMTP-salasana');
define('_ACA_USE_EMBEDDED', 'Käytä upotettuja kuvia');
define('_ACA_USE_EMBEDDED_TIPS', 'Valitse Kyllä jos liitettyyn sisältöön kuuluvat kuvat pitäisi upottaa viestiin HTML muodossa, tai Ei käyttääksesi oletusmerkintää joka linkittää kuvat viestiin sivustolta.');
define('_ACA_UPLOAD_PATH', 'Lataus/Liitehakemisto');
define('_ACA_UPLOAD_PATH_TIPS', 'Voit määritellä lataushankemiston.<br />' .
		'Varmista, että antamasi hakemisto on olemassa, muutoin luo se.');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Salli rekisteröitymättömät');
define('_ACA_ALLOW_UNREG_TIPS', 'Valitse Kyllä jos haluat sallia rekisteröitymättömien käyttäjien tilata listoja.');
define('_ACA_REQ_CONFIRM', 'Vaadi vahvistus');
define('_ACA_REQ_CONFIRM_TIPS', 'Valitse Kyllä jos vaadit että rekisteröitymättömät käyttäjät varmistavat sähköpostiosoiteensa.');
define('_ACA_SUB_SETTINGS', 'Tilausasetukset');
define('_ACA_SUBMESSAGE', 'Tilausosoite');
define('_ACA_SUBSCRIBE_LIST', 'Tilaa lista');

define('_ACA_USABLE_TAGS', 'Käytettävissä olevat merkinnät');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Tämä luo napsautettavan linkin jolla tilaaja voi vahvistaa tilauksensa. Tämä on <strong>pakollinen</strong> jotta jNews toimii oikein.<br />'
.'<br />[NAME] = Tämä korvataan käyttäjän antamalla nimellä, lähetät kohdistettua sähköpostia käyttäessäsi tätä.<br />'
.'<br />[FIRSTNAME] = Tämä korvataan tilaajan etunimellä, etunimellä tarkoitetaan käyttäjän ensin syöttämään nimä.<br />');
define('_ACA_CONFIRMFROMNAME', 'Vahvistusviestien lähettäjän nimi');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Anna lähettäjän nimi jota käytetään vahvistuksen vaativilla listoilla.');
define('_ACA_CONFIRMFROMEMAIL', 'Vahvistusviestien lähettäjän sähköpostiosoite');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Anna lähettäjän sähköpostiosoite jota käytetään vahvistuksen vaativilla listoilla.');
define('_ACA_CONFIRMBOUNCE', 'Bounce osoite');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Anna bounce osoite näytettäväksi vahvistuksen vaativilla listoilla.');
define('_ACA_HTML_CONFIRM', 'HTML vahvistus');
define('_ACA_HTML_CONFIRM_TIPS', 'Valitse Kyllä jos vahvistuksen vaativat listat ovat html-muotoisia käyttäjän sen salliessa.');
define('_ACA_TIME_ZONE_ASK', 'Kysy aikavyöhyke');
define('_ACA_TIME_ZONE_TIPS', 'Valitse Kyllä jos haluat kysyä käyttäjän aikavyöhykettä. Jonoon laitetut postituksen lähetetään aikavyöhykkeen perusteella milloin tarkoituksen mukaista');

 // Cron Set up
 define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_TIME_OFFSET_URL', 'napsauta tästä asettaaksesi aikavyöhyke sivuston asetuksissa -> Paikallisasetukset');
define('_ACA_TIME_OFFSET_TIPS', 'Aseta palvelimesi aikavyöhyke niin että päiväys ja kellonaika ovat täsmällisesti oikein');
define('_ACA_TIME_OFFSET', 'Aikavyöhyke');
define('_ACA_CRON_DESC','<br />Käyttäen cron ajastusta voit asettaa automaattisia tehtäviä Joomla sivustollesi!<br />' .
		'Asettaaksesi sen käyttöön sinun täytyy lisätä seuraava komento ohjauspaneelisi crontabiin:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Jos tarvitset apua asetuksissa tai sinulla on ongelmia, ole hyvä ja tutustu foorumiimme <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>');
// sending settings
define('_ACA_PAUSEX', 'Pysähdy x sekunniksi aina asetetun määrän viestejä lähetettyäsi');
define('_ACA_PAUSEX_TIPS', 'Anna sekuntimäätä, jonka jNews antaa postitusohjelmalle viestien lähettämiseen ennen kuin jatkaa seuraavalla asetetun suuruisella erällä.');
define('_ACA_EMAIL_BET_PAUSE', 'Viestien määrä taukojen välillä');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Montako viestiä lähetetään taukojen välillä.');
define('_ACA_WAIT_USER_PAUSE', 'Odota käyttäjän toimia ennen jatkamista');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Asettaa pitäisikö skriptin odottaa käyttäjältä hyväksyntää ennen kuin se jatkaa tauon jälkeen lähetystä.');
define('_ACA_SCRIPT_TIMEOUT', 'Skriptin timeout');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Montako minuuttia skriptin tulee antaa toimia (0 tarkoittaa rajoittamatonta).');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Ota käyttöön lukutilastot');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Valitse Kyllä jos haluat tallentaa lokiin katselukertojen määrän. Tätä tekniikkaa voidaan käyttää vain html-muotoiltujen viestien kanssa');
define('_ACA_LOG_VIEWSPERSUB', 'Kirjaa katselut tilaajittain');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Valitse Kyllä jos haluat tallentaa katselukerrat tilaajaa kohti. Tätä tekniikkaa voidaan käyttää vain html-muotoiltujen viestien kanssa');
// Logs settings
define('_ACA_DETAILED', 'Yksityiskohtaiset lokit');
define('_ACA_SIMPLE', 'Yksinkertaistetut lokit');
define('_ACA_DIAPLAY_LOG', 'Näytä lokit');
define('_ACA_DISPLAY_LOG_TIPS', 'Valitse Kyllä jos haluat näyttää lokin kun lähetys on käynnissä.');
define('_ACA_SEND_PERF_DATA', 'Lähetyksen suorituskyky');
define('_ACA_SEND_PERF_DATA_TIPS', 'Valitse Kyllä jos haluat jNewsin lähettävän anonyymejä raportteja asetuksistasi, tilaajien määrästä listoilla ja ajasta joka kului viestien lähettämiseen. Tämä antaa meille käsityksen jNewsin suorituskyvystä ja auttaa meitä parantamaan jNewsia tulevassa kehitystyössä.');
define('_ACA_SEND_AUTO_LOG', 'Lähetä loki automaattivastaajista');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Valitse Kyllä jos haluat lähettää sähköpostilokin joka kerta kun jono on käsitelty.  VAROITUS: tämä voi johtaa suureen viestimäärään.');
define('_ACA_SEND_LOG', 'Lähetysloki');
define('_ACA_SEND_LOG_TIPS', 'Pitäisikö lähetyksestä lähettää loki lähetyksen lähettäneen käyttäjän sähköpostiosoitteeseen.');
define('_ACA_SEND_LOGDETAIL', 'Yksityiskohtainen lähetysloki');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Yksityiskohtainen loki sisältää onnistumis-/epäonnistumistiedon jokaisesta tilaajasta ja katsauksen tietoon. Yksinkertainen lähettää vain katsauksen.');
define('_ACA_SEND_LOGCLOSED', 'Lähetä loki jos yhteys katkeaa');
define('_ACA_SEND_LOGCLOSED_TIPS', 'Tällä asetuksella käyttäjä joka teki postituksen saa silti raportin sähköpostitse.');
define('_ACA_SAVE_LOG', 'Tallenna loki');
define('_ACA_SAVE_LOG_TIPS', 'Pitäisikö lähetysloki lisätä lokitiedoston loppuun.');
define('_ACA_SAVE_LOGDETAIL', 'Tallenna yksityiskohtainen loki');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Yksityiskohtainen loki sisältää onnistumis-/epäonnistumistiedon jokaisesta tilaajasta ja katsauksen tietoon. Yksinkertainen tallentaa vain katsauksen.');
define('_ACA_SAVE_LOGFILE', 'Tallenna lokitiedosto');
define('_ACA_SAVE_LOGFILE_TIPS', 'Tiedosto johon lokitieto liitetään. Tämä tiedosto voi kasvaa aika suureksi.');
define('_ACA_CLEAR_LOG', 'Tyhjennä loki');
define('_ACA_CLEAR_LOG_TIPS', 'Tyhjentää lokitiedoston.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Viimeinen käsitelty jono');
define('_ACA_CP_TOTAL', 'Kokonaissumma');
define('_ACA_MAILING_COPY', 'Postitus onnistuneesti kopioitu!');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Näytä opas');
define('_ACA_SHOW_GUIDE_TIPS', 'Näytä opas alussa jotta uusien käyttäjien on helppo luoda uutiskirje, automaattivastaaja ja tehdä jNews asetukset oikein.');
define('_ACA_AUTOS_ON', 'Käytä automaattivastaajia');
define('_ACA_AUTOS_ON_TIPS', 'Valitse Ei jos et halua käyttää automaattivastaajia, kaikki automaattivastaaja-asetukset deaktivoidaan.');
define('_ACA_NEWS_ON', 'Käytä uutiskirjeitä');
define('_ACA_NEWS_ON_TIPS', 'Valitse Ei jos et halua käyttää uutiskirjeitä, kaikki uutiskirjeasetukset deaktivoidaan.');
define('_ACA_SHOW_TIPS', 'Näytä vihjeet');
define('_ACA_SHOW_TIPS_TIPS', 'Näytä vihjeet, jotta käyttäjät osaisivat käyttää jNewsia tehokkaammin.');
define('_ACA_SHOW_FOOTER', 'Näytä alatunniste');
define('_ACA_SHOW_FOOTER_TIPS', 'Pitäisikö tekijänoikeustiedotealatunniste näyttää.');
define('_ACA_SHOW_LISTS', 'Näytä listat julkisessa liittymässä');
define('_ACA_SHOW_LISTS_TIPS', 'Kun käyttäjä ei ole rekisteröitynyt näytä lista listoista jotka he voivat tilata ja nappi uutiskirjeen arkistoon vai pelkästään kirjautumislomake rekisteröitymistä varten.');
define('_ACA_CONFIG_UPDATED', 'Asetukset on päivitetty!');
define('_ACA_UPDATE_URL', 'Päivitys URL');
define('_ACA_UPDATE_URL_WARNING', 'VAROITUS! Älä muuta tätä URL-osoitetta ellei jNewsin tekninen tiimi ole sinun niin kehottanut tekemään.<br />');
define('_ACA_UPDATE_URL_TIPS', 'Esim.: http://www.ijoobi.com/update/ (sisällytä lopun kauttaviiva)');

// module
define('_ACA_EMAIL_INVALID', 'Antamasi sähköpostiosoite ei ole toimiva.');
define('_ACA_REGISTER_REQUIRED', 'Sinun täytyy rekisteröityä sivustolle ennen kuin voit tilata listoja.');

// Access level box
define('_ACA_OWNER', 'Listan luoja:');
define('_ACA_ACCESS_LEVEL', 'Aseta listan käyttöoikeustaso');
define('_ACA_ACCESS_LEVEL_OPTION', 'Käyttöoikeusasetukset');
define('_ACA_USER_LEVEL_EDIT', 'Valitse mikä käyttäjäryhmä voi muokata postitusta (julkisesta tai ylläpitoliittymästä) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Päivittäin');
define('_ACA_AUTO_DAY_CH2', 'Päivittäin, ei viikonloppuisin');
define('_ACA_AUTO_DAY_CH3', 'Joka toinen päivä');
define('_ACA_AUTO_DAY_CH4', 'Joka toinen päivä, ei viikonloppuisin');
define('_ACA_AUTO_DAY_CH5', 'Viikoittain');
define('_ACA_AUTO_DAY_CH6', 'Joka toinen viikko');
define('_ACA_AUTO_DAY_CH7', 'Kuukausittain');
define('_ACA_AUTO_DAY_CH9', 'Vuosittain');
define('_ACA_AUTO_OPTION_NONE', 'Ei');
define('_ACA_AUTO_OPTION_NEW', 'Uudet käyttäjät');
define('_ACA_AUTO_OPTION_ALL', 'Kaikki käyttäjät');

//
define('_ACA_UNSUB_MESSAGE', 'Peruuta tilaus');
define('_ACA_UNSUB_SETTINGS', 'Peruutuksen asetukset');
define('_ACA_AUTO_ADD_NEW_USERS', 'Lisää käyttäjät automaattisesti?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Päivityksiä ei ole saatavilla.');
define('_ACA_VERSION', 'jNews versio');
define('_ACA_NEED_UPDATED', 'Tiedostot jotka tulee päivittää:');
define('_ACA_NEED_ADDED', 'Tiedostot jotka tulee lisätä:');
define('_ACA_NEED_REMOVED', 'Tiedostot jotka tulee poistaa:');
define('_ACA_FILENAME', 'Tiedostonimi:');
define('_ACA_CURRENT_VERSION', 'Nykyinen versio:');
define('_ACA_NEWEST_VERSION', 'Uusin versio:');
define('_ACA_UPDATING', 'Päivittää');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Tiedostot on päivitetty onnistuneesti.');
define('_ACA_UPDATE_FAILED', 'Päivitys epäonnistui!');
define('_ACA_ADDING', 'Lisää');
define('_ACA_ADDED_SUCCESSFULLY', 'Lisätty onnistuneesti.');
define('_ACA_ADDING_FAILED', 'Lisäys epäonnistui!');
define('_ACA_REMOVING', 'Poistaa');
define('_ACA_REMOVED_SUCCESSFULLY', 'Poistettu onnistuneesti.');
define('_ACA_REMOVING_FAILED', 'Poistaminen epäonnistui!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Asenna toinen versio');
define('_ACA_CONTENT_ADD', 'Lisää sisältöä');
define('_ACA_UPGRADE_FROM', 'Tuo tietoja (uutiskirjeiden ja tilaajien tietoja) ');
define('_ACA_UPGRADE_MESS', 'Olemassa oleva datasi ei ole vaarassa. <br /> Tämä prosessi vain tuo uuden tiedon jNews tietokantaan.');
define('_ACA_CONTINUE_SENDING', 'Jatka lähetystä');

// jNews message
define('_ACA_UPGRADE1', 'Voit helposti tuoda käyttäjiä ja uutiskirjeitä ');
define('_ACA_UPGRADE2', ' jNewsiin päivityspaneelissa.');
define('_ACA_UPDATE_MESSAGE', 'Uusi versio saatavilla! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Napsauta tästä päivittääksesi!');
define('_ACA_THANKYOU', 'Kiitos kun valitsit jNewsin, Your communication partner!');
define('_ACA_NO_SERVER', 'Päivityspalvelin saavuttamattomissa, yritä myöhemmin uudelleen.');
define('_ACA_MOD_PUB', 'jNews modullia ei ole julkaistu.');
define('_ACA_MOD_PUB_LINK', 'Napsauta tästä julkaistaksesi sen!');
define('_ACA_IMPORT_SUCCESS', 'onnistuneesti tuotu');
define('_ACA_IMPORT_EXIST', 'tilaaja on jo tietokannassa');

// jNews\'s Guide
define('_ACA_GUIDE', '\'s Wizard');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNewsissa on monia hienoja ominaisuuksia ja tämä velho ohjaa sinut neljän helpon askeleen prosessin läpi jotta pääset alkuun uutiskirjeidesi ja automaattivastaajiesi kanssa!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Ensiksi, sinun täytyy perustaa lista.  Lista voi olla kahta eri tyyppiaä, joko uutiskirje tai automaattivastaaja.' .
		'  Listalla asetat kaikki asetukset jotka mahdollistavat uutiskirjeiden ja automaattivastaajien lähettämisen: lähettäjän nimen, ulkoasun, tilaajat, tervetulotoivotuksen jne...
<br /><br />Voit perustaa ensimmäisen listasi täällä: <a href="index2.php?option=com_jnewsletter&act=list" >Luo lista</a> ja napsauta Uusi nappulaa.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews tarjoaa sinulle helpon tavan tuoda kaiken datan vanhasta uutiskirjejärjestelmästäsi.<br />' .
		' Mene Tuonti välilehdelle ja valitsea aiempi uutiskirjejärjestelmäsi tuodaksesi vanhat uutiskirjeesi ja tilaajasi.<br /><br />' .
		'<span style="color:#FF5E00;" >TÄRKEÄÄ: tuonti on RISKITÖN eikä vaikuta mitenkään edellisen uutiskirjejärjestelmäsi dataan</span><br />' .
		'Tuonnin jälkeen voit hallita tilaajia ja postituksia suoraan jNewsista.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Hienoa, ensimmäinen listasi on perustettu!  Voit nyt kirjoittaa ensimmäisen %s.  Luodaksesi sen mene: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Automaattivastaajien hallinta');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Uutiskirjeiden hallinta');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' ja valitse %s. <br /> Valitse sitten %s alasvetovalikosta.  Luo ensimmäinen postituksesi napsauttamalla Uusi ');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Ennen kuin lähetät ensimmäisen uutiskirjeesi haluat ehkä tarkastaa sähköpostiasetukset.  ' .
		'Mene <a href="index2.php?option=com_jnewsletter&act=configuration" >asetukset sivulle</a> varmistaaksesi sähköpostiasetukset. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Kun olet valmis siirry takaisin Uutiskirjeet kohtaan, valitse postituksesi ja napsauta Lähetä');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Jotta automaattivastaajasi tulevat lähetetyiksi sinun pitää ensin luoda cron tehtävä palvelimellesi. ' .
		' Ole hyvä ja katso Cron välilehteä asetuspaneelissa.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >napsauta tästä</a> lukeaksesi lisää cron tehtävän luomisesta. <br />');

define('_ACA_GUIDE_MODULE', ' <br />Varmista myös että olet julkaissut jNews modullin jotta ihmiset voivat tilata listasi uutiskirjeet.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Voit nyt myös perustaa automaattivastaajan.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Voit nyt myös perustaa uutiskirjeen.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Voila! Olet nyt valmis viestimään tehokkaasti vieraidesi ja käyttäjiesi kanssa. Tämä velho päättyy heti kun olet aloittanut toisen postituksen tai voit kytkeä sen pois päältä <a href="index2.php?option=com_jnewsletter&act=configuration" >ohjauspaneelista</a>.' .
		'<br /><br />  Jos sinulla on kysymyksiä jNewsin käytöstä, ole hyvä ja tutustu ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60" >dokumentaatioon</a>. ' .
		' Löydät myös paljon tietoa tehokkaasta viestinnästä tilaajiesi kanssa osoitteesta <a href="http://www.ijoobi.com/" target="_blank" >www.jNews.com</a>.' .
		'<p /><br /><b>Kiitos että käytät jNewsia. Your Communication Partner!</b> ');
define('_ACA_GUIDE_TURNOFF', 'Velho kytketään nyt pois päältä!');
define('_ACA_STEP', 'STEP ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'jNews asetukset');
define('_ACA_INSTALL_SUCCESS', 'Asennus onnistui');
define('_ACA_INSTALL_ERROR', 'Asennuksessa tapahtui virhe');
define('_ACA_INSTALL_BOT', 'jNews liitännäinen (Bot)');
define('_ACA_INSTALL_MODULE', 'jNews modulli');
//Others
define('_ACA_JAVASCRIPT','!Varoitus! Javascriptin täytyy olla käytettävissä jotta komponentti toimisi oikein.');
define('_ACA_EXPORT_TEXT','Tilaajien vienti perustuu valitsemaasi listaan. <br />Vie tilaajat listalta');
define('_ACA_IMPORT_TIPS','Tuo tilaajat. Tiedon tiedostossa pitää olla seuraavaa muotoa: <br />' .
		'Nimi,sähköpostiosoite,vastaanotaHTML(1/0),<span style="color: rgb(255, 0, 0);">vahvistettu(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'on jo tilaaja');
define('_ACA_GET_STARTED', 'Napsauta tästä päästäksesi alkuun!');

//News since 1.0.1
define('_ACA_WARNING_1011','Varoitus: 1011: Päivitys ei toimi palvelimesi rajoituksista johtuen.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Anna lähettäjän osoitteena näkyvä sähköpostiosoite.');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Anna lähettäjä nimenä näkyvä nimi.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Valitse käytettävä postitusohjelma: PHP mail function, <span>Sendmail</span> or SMTP palvelin.');
define('_ACA_SENDMAILPATH_TIPS', 'Tämä on postipalvelimen polku');
define('_ACA_LIST_T_TEMPLATE', 'Mallipohja');
define('_ACA_NO_MAILING_ENTERED', 'Ei postitusta valittuna');
define('_ACA_NO_LIST_ENTERED', 'Ei listaa valittuna');
define('_ACA_SENT_MAILING' , 'Lähetä postitus');
define('_ACA_SELECT_FILE', 'Valitse tiedosto ');
define('_ACA_LIST_IMPORT', 'Valitse lista(t) joihin haluat tilaajat liittää.');
define('_ACA_PB_QUEUE', 'Tilaaja lisätty, mutta ongelmia hänen liittämisessään listaan/listoihin. Ole hyvä ja tarkasta manuaalisesti.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , 'Päivitystä suositellaan vakavasti!');
define('_ACA_UPDATE_MESS2' , 'Paikkaus ja pieniä korjauksia.');
define('_ACA_UPDATE_MESS3' , 'Uusi julkaisu.');
define('_ACA_UPDATE_MESS5' , 'Päivitys toimii vain Joomla 1.5\:ssä.');
define('_ACA_UPDATE_IS_AVAIL' , ' on saatavilla!');
define('_ACA_NO_MAILING_SENT', 'Postitus ei lähetetty!');
define('_ACA_SHOW_LOGIN', 'Näytä kirjautumislomake');
define('_ACA_SHOW_LOGIN_TIPS', 'Valitse Kyllä jos haluat näyttää kirjautumislomakkeen jNewsin julkisen liittymän ohjauspaneelissa jotta käyttäjät voivat rekisteröityä sivustolle.');
define('_ACA_LISTS_EDITOR', 'Listan kuvauksen muokkain');
define('_ACA_LISTS_EDITOR_TIPS', 'Valitse Kyllä käyttääksesi HTML-muokkainta listan kuvaus kentän muokkaamiseen.');
define('_ACA_SUBCRIBERS_VIEW', 'Katso tilaajia');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS' , 'Julkisen liittymän asetukset' );
define('_ACA_SHOW_LOGOUT', 'Näytä kirjaudu ulos nappula');
define('_ACA_SHOW_LOGOUT_TIPS', 'Valitse kyllä näyttääksesi kirjaudu ulos nappula jNewsin julkisen liittymän ohjauspaneelissa.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Integrointi');
define('_ACA_CB_INTEGRATION', 'Community Builder Integrointi');
define('_ACA_INSTALL_PLUGIN', 'Community Builder liitännäinen (jNews Integrointi) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'jNews liitännäistä Community Builderille ei ole asennettu!');
define('_ACA_CB_PLUGIN', 'Listat rekisteröityessä');
define('_ACA_CB_PLUGIN_TIPS', 'Valitse Kyllä näyttääksesi listat Community Builderin rekisteröitymislomakkeella');
define('_ACA_CB_LISTS', 'Listojen ID\:t');
define('_ACA_CB_LISTS_TIPS', 'TÄMÄ ON PAKOLLINEN KENTTÄ. Anna niiden listojen ID-numerot pilkulla erotettuna, joiden haluat olevan käyttäjien tilattavissa ,  (0 tarkoittaa näytä kaikki)');
define('_ACA_CB_INTRO', 'Esittelyteksti');
define('_ACA_CB_INTRO_TIPS', 'Teksti joka näytetään ennen listausta. JÄTÄ TYHJÄKSI JÄTTÄÄKSESI NÄYTTÄMÄTTÄ.  Voit käyttää HTML-merkintää muokataksesi ulkonäköä.');
define('_ACA_CB_SHOW_NAME', 'Näytä listan nimi');
define('_ACA_CB_SHOW_NAME_TIPS', 'Valitse näytetäänkö listan nimi esittelytekstin jälkeen.');
define('_ACA_CB_LIST_DEFAULT', 'Lista oletusarvoisesti valittuna');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Valitse haluatko listojen ruutujen olevan oletusarvoisesti rastittuna.');
define('_ACA_CB_HTML_SHOW', 'Näytä tilaa HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'Valitse Kyllä antaaksesi käyttäjien valita haluavatko he vastaanottaa HTML-muotoiltuja viestejä. Valitse Ei pakottaakseni vastaanottamaan HTML-viestejä.');
define('_ACA_CB_HTML_DEFAULT', 'Oletuksena HTML-muotoilu');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Valitse tämä vaihtoehto asettaaksesi HTML-muodon oletukseksi. Jos Näytä tilaa HTML on asetettu arvoon Ei, tämä vaihtoehto on oletusarvo.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'Tiedostoa ei voitu varmistaa! Tiedostoa ei korvattu.');
define('_ACA_BACKUP_YOUR_FILES', 'Tiedostojen vanhat versiot on varmistettu seuraavaan hakemistoon:');
define('_ACA_SERVER_LOCAL_TIME', 'Palvelimen paikallinen aika');
define('_ACA_SHOW_ARCHIVE', 'Näytä Arkisto nappi');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Valitse Kyllä näyttääksesi Arkisto napin julkisen liittymän uutiskirje listauksessa');
define('_ACA_LIST_OPT_TAG', 'Merkinnät');
define('_ACA_LIST_OPT_IMG', 'Kuvat');
define('_ACA_LIST_OPT_CTT', 'Sisältö');
define('_ACA_INPUT_NAME_TIPS', 'Anna kokonimesi (etunimi ensin)');
define('_ACA_INPUT_EMAIL_TIPS', 'Anna sähköpostiosoitteesi (Varmista että osoite on toimiva vastaanottaaksesi viestimme.)');
define('_ACA_RECEIVE_HTML_TIPS', 'Valitse kyllä vastaanottaaksesi HTML-muotoiltuja viestejä - Ei saadaksesi viestit vain tekstimuodossa');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Valitse aikavyöhykkeesi.');

// Since 1.0.5
define('_ACA_FILES' , 'Tiedostot');
define('_ACA_FILES_UPLOAD' , 'Lataa palvelimelle');
define('_ACA_MENU_UPLOAD_IMG' , 'Lataa kuvat palvelimelle');
define('_ACA_TOO_LARGE' , 'Tiedosto on liian suuri. Suurin sallittu koko on');
define('_ACA_MISSING_DIR' , 'Kohdehakemistoa ei ole olemassa');
define('_ACA_IS_NOT_DIR' , 'Kohdehakemistoa ei ole olemassa tai se on tiedosto.');
define('_ACA_NO_WRITE_PERMS' , 'Kohdehakemistoon ei ole annettu kirjoitusoikeuksia.');
define('_ACA_NO_USER_FILE' , 'Et valinnut yhtään tiedostoa ladattavaksi.');
define('_ACA_E_FAIL_MOVE' , 'Tiedostoa on mahdoton siirtää.');
define('_ACA_FILE_EXISTS' , 'Kohdetiedosto on jo olemassa.');
define('_ACA_CANNOT_OVERWRITE' , 'Kohdetiedosto on jo olemassa tai sitä ei voitu korvata.');
define('_ACA_NOT_ALLOWED_EXTENSION' , 'Tiedostopääte ei ole sallittu.');
define('_ACA_PARTIAL' , 'Tiedosto ladattiin vain osittain.');
define('_ACA_UPLOAD_ERROR' , 'Latausvirhe:');
define('DEV_NO_DEF_FILE' , 'Tiedosto ladattiin vain osittain.');

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Tämä korvataan tilauslinkeillä.' .
		' Tämä on <strong>pakollinen</strong> jotta jNews toimisi oikein.<br />' .
		'Jos sisällytät tähän kenttään mitään muuta sisältöä se näytetään kaikissa tämän listan postituksissa.' .
		' <br />Lisää tilausviestisi loppuun.  jNews lisää automaattisesti linkin tilaajalle tietojensa muuttamiseen ja tilauksen peruuttamiseen.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Huomautus');  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', 'Huomautukset');
define('_ACA_USE_SEF', 'SEF sähköpostiviesteissä');
define('_ACA_USE_SEF_TIPS', 'Asetusta Ei suositellaan.  Jos kuitenkin haluat että viesteihin sisällytetyt URL:t ovat SEF muotoiltuja valitse Kyllä.' .
		' <br /><b>Linkit toimivat samalla tavalla molemmissa tapauksissa.  Valinta Ei turvaa sen, että linkit toimivat aina vaikka muuttaisitkin SEFiä.</b> ');
define('_ACA_ERR_NB' , 'Virhe #: ERR');
define('_ACA_ERR_SETTINGS', 'Virheiden käsittelyn asetukset');
define('_ACA_ERR_SEND' ,'Lähetä virheraportti');
define('_ACA_ERR_SEND_TIPS' ,'Jos haluat jNewsin parantuvan tuotteena valitse KYLLÄ.  Tämä lähettää meille virheraportin.  Joten sinun ei tarvitse erikseen raportoida bugejakaan ;-) <br /> <b>YKSITYISIÄ TIETOJA EI LÄHETETÄ</b>.  Emme edes tiedä miltä sivustolta virhe tulee. Lähetämme tiedot vain jNewsin, PHP:n ja SQL:n asetuksista. ');
define('_ACA_ERR_SHOW_TIPS' ,'Valitse Kyllä näyttääkseni virhekoodin näytöllä.  Käytetään virheenkorjaamiseen. ');
define('_ACA_ERR_SHOW' ,'Näytä virheet');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Näytä peruuta tilaus linkit');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Valitse Kyllä jos haluat näyttää tilauksen peruuttamis linkit postitusten pohjalla jotta käyttäjät voivat helposti muuttaa tilaustaan. <br /> Ei poistaa linkit käytöstä.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">TÄRKEÄ HUOMAUTUS!</span> <br />Jos olet päivittämässä aiemmasta jNews versiosta sinun täytyy päivittää tietokantataulujesi rakenne napsauttamalal seuraavaa nappia (tietojesi eheyden säilyminen on turvattu)');
define('_ACA_UPDATE_INSTALL_BTN' , 'Päivitä taulut ja asetukset');
define('_ACA_MAILING_MAX_TIME', 'Jonon enimmäisaika' );
define('_ACA_MAILING_MAX_TIME_TIPS', 'Määrittele enimmäisaika sähköpostitusjonon käsittelylle. Suositellaan pidettäväksi 30 sekunnin ja 2 minuutin välillä.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'VirtueMart Integraatio');
define('_ACA_VM_COUPON_NOTIF', 'Kuponki-ilmoituksen ID');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Määrittele sen postituksen ID numero, jonka mukana haluat lähettää kuponkeja asiakkaillesi.');
define('_ACA_VM_NEW_PRODUCT', 'Uutuustuoteilmoitusten ID');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Valitse sen postituksen ID numero, jonka mukana haluat ilmoittaa uutuustuotteista.');

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Luo lomake');
define('_ACA_FORM_COPY', 'HTML koodi');
define('_ACA_FORM_COPY_TIPS', 'Kopioi luotu HTML koodi HTML sivullesi.');
define('_ACA_FORM_LIST_TIPS', 'Valitse lista jonka haluat sisällyttää lomakkeeseen');
// update messages
define('_ACA_UPDATE_MESS4' , 'Ei voida päivittää automaattisesti.');
define('_ACA_WARNG_REMOTE_FILE' , 'Ei keinoa hakea etätiedostoa.');
define('_ACA_ERROR_FETCH' , 'Virhe tiedostoa noudettaessa.');

define('_ACA_CHECK' , 'Tarkasta');
define('_ACA_MORE_INFO' , 'Lisätietoja');
define('_ACA_UPDATE_NEW' , 'Päivitä uudempaan versioon');
define('_ACA_UPGRADE' , 'Päivitä korkeampaan tuotteeseen');
define('_ACA_DOWNDATE' , 'Palaa aiempaan versioon');
define('_ACA_DOWNGRADE' , 'Palaa perustuotteeseen');
define('_ACA_REQUIRE_JOOM' , 'Edellytä Joomlaa');
define('_ACA_TRY_IT' , 'Kokeile!');
define('_ACA_NEWER', 'Uudempi');
define('_ACA_OLDER', 'Vanhempi');
define('_ACA_CURRENT', 'Nykyinen');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Kokeile yhtä muista komponenteista');
define('_ACA_MENU_VIDEO' , 'Video-oppaat');
define('_ACA_SCHEDULE_TITLE', 'Automaattinen aikatauludunktion asetus');
define('_ACA_ISSUE_NB_TIPS' , 'Numero luotu automaattisesti järjestelmässä' );
define('_ACA_SEL_ALL' , 'Kaikki postitukset');
define('_ACA_SEL_ALL_SUB' , 'Kaikki listat');
define('_ACA_INTRO_ONLY_TIPS' , 'Jos valitset tämän kohdan vain artikkelin ingressi sisällytetään positukseen sivustollesi johtavan Lue lisää -linkin kera.' );
define('_ACA_TAGS_TITLE' , 'Sisällön paikan merkki');
define('_ACA_TAGS_TITLE_TIPS' , 'Kopioi ja liitä tämä merkintä postitukseen siihen kohtaan johon haluat sisällön sijoitettavan.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Anna sähköpostiosoite johon koeviesti lähetetään');
define('_ACA_PREVIEW_TITLE' , 'Esikatselu');
define('_ACA_AUTO_UPDATE' , 'Päivitysten ilmoitin');
define('_ACA_AUTO_UPDATE_TIPS' , 'Valitse kyllä jos haluat ilmoituksen uusista päivityksistä komponenttiisi. <br />TÄRKEÄÄ!! Vihjeiden näyttämisen tulee olla päällä jotta tämä toimisi.');

// since 1.1.0
define('_ACA_LICENSE' , 'Lisenssin tiedot');

// since 1.1.1
define('_ACA_NEW' , 'Uusi');
define('_ACA_SCHEDULE_SETUP', 'Jotta automaattivastaajat lähetettäisiin sinun pitää luoda aikataulu asetuksissa.');
define('_ACA_SCHEDULER', 'Ajastin');
define('_ACA_JNEWSLETTER_CRON_DESC' , 'jos sinulla ei ole pääsyä cron tehtävien hallintaan palvelimellasi, voit rekisteröityä ilmaisen jNews cron tilin käyttäjäksi osoitteessa:' );
define('_ACA_CRON_DOCUMENTATION' , 'Löydät lisätietoja jNews Ajastimen käytöstä seuraavasta osoitteesta:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>' );
define( '_ACA_QUEUE_PROCESSED' , 'Jono käsitelty onnistuneesti...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , 'Virhe tuodun tiedoston siirrossa' );

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , 'Ajastimen taajuus' );
define( '_ACA_CRON_MAX_FREQ' , 'Ajastimen enimmäistaajuus' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , 'Aseta enimmäistaajuus jolla ajastin voi käydä ( minuuteissa ).  Tämä rajoittaa ajastimen toimintaa vaikka cron tehtävä olisikin ajastettu taajemmalle.' );
define( '_ACA_CRON_MAX_EMAIL' , 'Tehtävän enimmäisviestimäärä' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , 'Aseta enimmäismäärä yhden tehtävän sähköpostiviesteille (0 rajoittamaton).' );
define( '_ACA_CRON_MINUTES' , ' minuuttia' );
define( '_ACA_SHOW_SIGNATURE' , 'Näytä viestin alatunniste' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , 'Haluatko mainostaa jNewsia viestien alatunnisteessa.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , 'Automaattivastaajat käsitelty onnistuneesti...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , 'Ajastetut uutiskirjeet käsitelty onnistuneesti...' );
define( '_ACA_MENU_SYNC_USERS' , 'Synkronoi käyttäjät' );
define( '_ACA_SYNC_USERS_SUCCESS' , 'Käyttäjien synkronointi onnistui!' );

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Kirjaudu ulos' );
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Kyllä' );
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Ei' );
if (!defined('_HI')) define( '_HI', 'Hei' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Ylös' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Alas' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Logout' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , 'Jos valitset tämän kohdan vain artikkelin otsikko liitetään positukseen linkkinä artikkeliin sivustollasi.');
define('_ACA_TITLE_ONLY' , 'Vain otsikko');
define('_ACA_FULL_ARTICLE_TIPS' , 'Jos valitset tämän kohdan koko artikkeli sisällytetään postitukseen');
define('_ACA_FULL_ARTICLE' , 'Koko artikkeli');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Valitse nimike lisättäväksi viestiin. <br />Kopioi ja liitä <b>sisällön paikanmerkki</b> postitukseen.  Voit valita koko artikkelin, vain ingressin tai vain otsikon numerolla (0, 1, tai 2 järjestyksessä). ');
define('_ACA_SUBSCRIBE_LIST2', 'Postituslista(t)');

// smart-newsletter function
define('_ACA_AUTONEWS', 'Äly-uutiskirje');
define('_ACA_MENU_AUTONEWS', 'Äly-uutiskirjeet');
define('_ACA_AUTO_NEWS_OPTION', 'Äly-uutiskirjeiden asetukset');
define('_ACA_AUTONEWS_FREQ', 'Uutiskirjeen taajuus');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Aseta taajuus jolla haluat lähettää äly-uutiskirjeen.');
define('_ACA_AUTONEWS_SECTION', 'Artikkelien pääryhmä');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Aseta pääryhmä josta haluat artikkelit valita.');
define('_ACA_AUTONEWS_CAT', 'Artikkelien ryhmä');
define('_ACA_AUTONEWS_CAT_TIPS', 'Aseta ryhmä josta haluat artikkelit valita (Kaikki tarkoittaa kaikkia pääryhmän artikkeleita).');
define('_ACA_SELECT_SECTION', 'Valitse pääryhmä');
define('_ACA_SELECT_CAT', 'Kaikki ryhmät');
define('_ACA_AUTO_DAY_CH8', 'Neljännesvuosittain');
define('_ACA_AUTONEWS_STARTDATE', 'Aloituspäivämäärä');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Valitse päivämäärä jolloin haluat aloittaa äly-uutiskirjeen lähetykset.');
define('_ACA_AUTONEWS_TYPE', 'Sisällön käsittely');// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', 'Koko artikkeli: sisällyttää koko artikkelin uutiskirjeeseen.<br />' .
		'Vain ingressi: sisällyttää vain artikkelin ingressin uutiskirjeeseen.<br/>' .
		'Vain otsikko: sisällyttää vain artikkelin otsikon uutiskirjeeseen.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Tämä korvataan äly-uutiskirjeellä.' );

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Luo / Katso postituksia');
define('_ACA_LICENSE_CONFIG' , 'Lisenssi' );
define('_ACA_ENTER_LICENSE' , 'Anna lisenssinumero');
define('_ACA_ENTER_LICENSE_TIPS' , 'Anna lisenssinumerosi ja tallenna se.');
define('_ACA_LICENSE_SETTING' , 'Lisenssiasetukset' );
define('_ACA_GOOD_LIC' , 'Lisenssisi on voimassa.' );
define('_ACA_NOTSO_GOOD_LIC' , 'Lisenssisi ei ole voimassa: ' );
define('_ACA_PLEASE_LIC' , 'Ole hyvä ja ota yhteyttä jNews tukeen päivittääksesi lisenssisi ( license@ijoobi.com ).' );
define('_ACA_DESC_PLUS', 'jNews Plus on ensimmäinen jatkuva automaattivastaaja Joomla julkaisujärjestelmälle.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO on paras postitusjärjestelmä Joomla julkaisujärjestelmälle.  ' . _ACA_FEATURES );

//since 1.1.4
define('_ACA_ENTER_TOKEN' , 'Anna poletti');

define('_ACA_ENTER_TOKEN_TIPS' , 'Anna polettinumerosi (token) jonka sait jNewsin hankkiessasi. ');

define('_ACA_JNEWSLETTER_SITE', 'jNews sivusto:');
define('_ACA_MY_SITE', 'Minun sivustoni:');

define( '_ACA_LICENSE_FORM' , ' ' .
 		'Napsauta tästä mennäksesi lisenssilomakkeelle.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , 'Tyhjennä lisenssikenttä ja yritä uudelleen.<br />  Jos ongelma jatkuu, ' );

define( '_ACA_LICENSE_SUPPORT' , 'Jos sinulla on vielä kysyttävää, ' . _ACA_PLEASE_LIC );

define( '_ACA_LICENSE_TWO' , 'voit hankkia lisenssin manuaalisesti antamalla polettinumerosi ja sivuston URL-osoitteen (joka on merkitty vihreällä sivun ylälaidassa) lisenssilomakkeeseen. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );

define('_ACA_ENTER_TOKEN_PATIENCE', 'Poletin tallentamisen jälkeen lisenssi luodaan automaattisesti. ' .
		' Tavallisesi poletti varmistetaan parissa minuutissa.  Joissain tapauksissa se voi kuitenkin kestää jopa 15 minuuttia.<br />' .
		'<br />Tarkasta tämä ohjauspaneeli uudelleen muutaman minuutin kuluttua.  <br /><br />' .
		'Jos et saa kelvollista lisenssiavainta 15 minuutissa, '. _ACA_LICENSE_TWO);


define( '_ACA_ENTER_NOT_YET' , 'Polettiasi ei ole vielä varmistettu.');
define( '_ACA_UPDATE_CLICK_HERE' , 'Ole hyvä ja käy <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> ladataksesi uusimman version.');
define( '_ACA_NOTIF_UPDATE' , 'Saadaksesi ilmoituksen uusista päivityksistä, anna sähköpostiosoitteesi ja napsauta tilaa ');

define('_ACA_THINK_PLUS', 'Jos haluat enemmän postitusjärjestelmältäsi ajattele Plus!');
define('_ACA_THINK_PLUS_1', 'Jatkuvat automaatilähetykset');
define('_ACA_THINK_PLUS_2', 'Ajasta uutiskirjeesi toimitus ennalta määrätylle päivälle');
define('_ACA_THINK_PLUS_3', 'Ei enää palvelin rajoituksia');
define('_ACA_THINK_PLUS_4', 'ja paljon muuta...');

//since 1.2.2
define( '_ACA_LIST_ACCESS', 'Listan käyttöoikeudet' );
define( '_ACA_INFO_LIST_ACCESS', 'Aseta käyttäjäryhmä jolla on oikeus nähdä ja tilata lista' );
define( 'ACA_NO_LIST_PERM', 'Sinulla ei ole riittäviä oikeuksia tämän listan tilaamiseen' );

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Arkisto');
 define('_ACA_MENU_ARCHIVE_ALL', 'Arkistoi kaikki');

//Archive Lists
 define('_FREQ_OPT_0', 'Ei ollenkaan');
 define('_FREQ_OPT_1', 'Joka viikko');
 define('_FREQ_OPT_2', 'Joka toinen viikko');
 define('_FREQ_OPT_3', 'Joka kuukausi');
 define('_FREQ_OPT_4', 'Neljännesvuosittain');
 define('_FREQ_OPT_5', 'Vuosittain');
 define('_FREQ_OPT_6', 'Muu');

define('_DATE_OPT_1', 'Luontipäivä');
define('_DATE_OPT_2', 'Muokkauspäivä');

define('_ACA_ARCHIVE_TITLE', 'Automaattisen arkistoinnin taajuusasetukset');
define('_ACA_FREQ_TITLE', 'Arkistointitaajuus');
define('_ACA_FREQ_TOOL', 'Määrittele miten usein haluat Arkistoinnin hallinan arkistoivan sisältösi.');
define('_ACA_NB_DAYS', 'Päivien määrä');
define('_ACA_NB_DAYS_TOOL', 'Tämä on vain Muu vaihtoehtoa varten! Ole hyvä ja anna päivien määrä arkistointien välissä.');
define('_ACA_DATE_TITLE', 'Päiväyksen valinta');
define('_ACA_DATE_TOOL', 'Valitse arkistoidaanko luonti- vai muokkauspäivämäärän mukaan.');

define('_ACA_MAINTENANCE_TAB', 'Ylläpidon asetukset');
define('_ACA_MAINTENANCE_FREQ', 'Ylläpidon taajuus');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Määrittelen miten usein haluat ylläpitorutiinin tapahtuvan.' );
define( '_ACA_CRON_DAYS' , 'tunti(a)' );

define( '_ACA_LIST_NOT_AVAIL', 'Ei listaa käytettävissä.');
define( '_ACA_LIST_ADD_TAB', 'Luo/Muokkaa' );

define( '_ACA_LIST_ACCESS_EDIT', 'Postituksen luonti/muokkausoikeudet' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Aseta käyttäjäryhmä jolla on oikeus luoda ja muokata postituksia' );
define( '_ACA_MAILING_NEW_FRONT', 'Luo uusi postitus' );

define('_ACA_AUTO_ARCHIVE', 'Automaattinen arkistointi');
define('_ACA_MENU_ARCHIVE', 'Automaattinen arkistointi');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Tämä korvataan uutiskirjeen numerolla.');
define('_ACA_TAGS_DATE', '[DATE] = Tämä korvataan lähetyspäivällä.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Tämä korvataan arvolla joka otetaan Community Builderin kentästä esim. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Ylläpito' );

define('_ACA_THINK_PRO', 'Kun sinulla on ammattimaisia tarpeita, käytä ammattimaisia komponentteja!');
define('_ACA_THINK_PRO_1', 'Äly-uutiskirjeet');
define('_ACA_THINK_PRO_2', 'Aseta käyttöoikeustaso listallesi');
define('_ACA_THINK_PRO_3', 'Määrittele kuka voi luoda ja muokata postituksia');
define('_ACA_THINK_PRO_4', 'Lisää merkintöjä: lisää CB kenttiä');
define('_ACA_THINK_PRO_5', 'Joomla sisältöjen automaattinen arkistointi');
define('_ACA_THINK_PRO_6', 'Tietokannan optimointi');

define('_ACA_LIC_NOT_YET', 'Your license is not yet valid.  Please check the license Tab in the configuration panel.');
define('_ACA_PLEASE_LIC_GREEN' , 'Make sure to provide the green information at the top of the tab to our support team.' );

define('_ACA_FOLLOW_LINK' , 'Hanki lisenssi');
define( '_ACA_FOLLOW_LINK_TWO' , 'Voit noutaa lisenssisi antamalla polettinumerosi ja sivustosi URL-osoitteen (joka on merkitty vihreällä sivun yläosassa) lisenssilomakkeeseen. ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Napsauta sitten Käytä nappia sivun oikeassa yläkulmassa.' );
define( '_ACA_ENTER_LIC_NB', 'Anna lisenssinumero' );
define( '_ACA_UPGRADE_LICENSE', 'Päivitä lisenssisi');
define( '_ACA_UPGRADE_LICENSE_TIPS' , 'Jos sait poletin lisenssin päivittämistä varten täytä se tähän ja napsauta sitten Käytä ja siirry numeroon <b>2</b> saadaksesi uuden lisenssinumeron.' );

define( '_ACA_MAIL_FORMAT', 'Merkistökoodaus' );
define( '_ACA_MAIL_FORMAT_TIPS', 'Mitä merkistökoodausta haluat käyttää postituksissasi, pelkkää tekstiä vai MIME:a' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Jos sinulla ei ole pääsyä cron tehtävien hallintaan palvelimellasi voit käyttää ilmaista jCron komponenttia luodaksesi cron tehtävän sivustollesi.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Näytä kirjoittajan nimi');
define('_ACA_SHOW_AUTHOR_TIPS', 'Valitse Kyllä jos haluat listä kirjoittajan nimen kun lisäät artikkelin postitukseesi');

//since 1.3.5
define('_ACA_REGWARN_NAME','Ole hyvä ja anna nimesi.');
define('_ACA_REGWARN_MAIL','Ole hyvä ja anna kelvollinen sähköpostiosoite.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS','Jos valitset Kyllä, käyttäjän sähköpostisoite lisätään parametriksi uudelleenohjaus-URL:n (uudelleenohjaus linkki modulliisi tai ulkoiseen jNews lomakkeeseen) loppuun.<br/>Se voi olla hyödyllistä jos haluat suorittaa erityisen skriptin uudelleenohjaussivulla.');
define('_ACA_ADDEMAILREDLINK','Lisää sähköposti uudelleenohjaukseen');

//since 1.6.3
define('_ACA_ITEMID','ItemId');
define('_ACA_ITEMID_TIPS','Tämä ItemId lisätään jNews linkkeihisi.');

//since 1.6.5
define('_ACA_SHOW_JCALPRO','jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS','Näytä integraatio välilehti jCalPRO:lle <br/>(vain jos jCalPRO asennettuna sivustollesi!)');
define('_ACA_JCALTAGS_TITLE','jCalPRO merkintä:');
define('_ACA_JCALTAGS_TITLE_TIPS','Kopioi ja liitä tämä merkintä postitukseesi siihen kohtaan johon haluat tapahtumen lisättävän.');
define('_ACA_JCALTAGS_DESC','Kuvaus:');
define('_ACA_JCALTAGS_DESC_TIPS','Valitse Kyllä jos haluat lisätä tapahtuman kuvauksen');
define('_ACA_JCALTAGS_START','Alkupäivä:');
define('_ACA_JCALTAGS_START_TIPS','Valitse Kyllä jos haluat lisätä tapahtuman alkupäivämäärän');
define('_ACA_JCALTAGS_READMORE','Lue lisää:');
define('_ACA_JCALTAGS_READMORE_TIPS','Valitse Kyllä jos haluat lisätä <b>Lue lisää -linkin</b> tälle tapahtumalle');
define('_ACA_REDIRECTCONFIRMATION','Uudelleenohjaus URL');
define('_ACA_REDIRECTCONFIRMATION_TIPS','Jos vaadit vahvistuksen sähköpostiosoitteelle, sähköpostiosoite vahvistetaan ja käyttäjä ohjataan uudelleen tähän URL-osoitteeseen jos hän napsauttaa vahvistuslinkkiä.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Tallenna');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Ei vielä tunnusta?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Rekisteröidy');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','Sinulla ei ole käyttöoikeutta tähän sivuun.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP','Poista vihjeet käytöstä');
define('_ACA_DISABLETOOLTIP_TIPS', 'Poista vihjeet käytöstä julkisessa liittymässä');
define('_ACA_MINISENDMAIL', 'Käytä Mini SendMailia');
define('_ACA_MINISENDMAIL_TIPS', 'Jos palvelimesi käyttää Mini SendMailia, valitse tämä vaihtoehto jotta käyttäjän nimeä ei lisätä sähköpostin otsikkotietoihin');

//Since 3.1.5
define('_ACA_READMORE','Lue lisää...');
define('_ACA_VIEWARCHIVE','Napsauta tätä');

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