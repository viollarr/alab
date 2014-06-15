<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');

/**
 * <p>French language file.</p>
 * @copyright (c) 2006-2010 Joobi Limited / All Rights Reserved
 * @author Joobi Limited <support@ijoobi.com>
 * @author Christelle Gesset <support@ijoobi.com>
 * @UTF-8 Conversion: SEW Solutions <info@sewsolutions.com>
 * @version $Id: french.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.ijoobi.com
 */

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', 'jNews est un gestionaire de listes, infolettres, bulletins, et réponses automatiques pour communiquer effectivement avec vos clients.  ' .
		'jNews, votre partenaire de communication');
define('_ACA_DESC_GPL', 'jNews est un gestionaire de listes, infolettres, bulletins, et réponses automatiques pour communiquer effectivement avec vos clients.  ' .
		'jNews, votre partenaire de communication');
define('_ACA_FEATURES', 'jNews, votre partenaire de communication!');

// Type of lists
define('_ACA_NEWSLETTER', 'Infolettre');
define('_ACA_AUTORESP', 'Réponse automatique');
define('_ACA_AUTORSS', 'Auto-RSS');
define('_ACA_ECARD', 'eCard');
define('_ACA_POSTCARD', 'Carte postale');
define('_ACA_PERF', 'Performance');
define('_ACA_COUPON', 'Coupon');
define('_ACA_CRON', 'Tâche cron');
define('_ACA_MAILING', 'Emailing');
define('_ACA_LIST', 'Liste');

 //jnewsletter Menu
define('_ACA_MENU_LIST', 'Gestion de Listes');
define('_ACA_MENU_SUBSCRIBERS', 'Abonnés');
define('_ACA_MENU_NEWSLETTERS', 'Infolettres');
define('_ACA_MENU_AUTOS', 'Réponses automatiques');
define('_ACA_MENU_COUPONS', 'Coupons');
define('_ACA_MENU_CRONS', 'Taches cron');
define('_ACA_MENU_AUTORSS', 'Auto-RSS');
define('_ACA_MENU_ECARD', 'eCards');
define('_ACA_MENU_POSTCARDS', 'Carte postales');
define('_ACA_MENU_PERFS', 'Performances');
define('_ACA_MENU_TAB_LIST', 'Listes');
define('_ACA_MENU_MAILING_TITLE', 'Envoi de courriel');
define('_ACA_MENU_MAILING', 'Envoi de courriel pour ');
define('_ACA_MENU_STATS', 'Statistiques');
define('_ACA_MENU_STATS_FOR', 'Statistiques pour ');
define('_ACA_MENU_CONF', 'Configuration');
define('_ACA_MENU_UPDATE', 'Importation');
define('_ACA_MENU_ABOUT', 'À propos');
define('_ACA_MENU_LEARN', 'Centre d\'éducation');
define('_ACA_MENU_MEDIA', 'Gestion des médias');
define('_ACA_MENU_HELP', 'Aide');
define('_ACA_MENU_CPANEL', 'Paneau de configuration');
define('_ACA_MENU_IMPORT', 'Importer');
define('_ACA_MENU_EXPORT', 'Exporter');
define('_ACA_MENU_SUB_ALL', 'S\'abonner à tout');////
define('_ACA_MENU_UNSUB_ALL', 'Se désabonner de tout');////
define('_ACA_MENU_VIEW_ARCHIVE', 'Archive');
define('_ACA_MENU_PREVIEW', 'Aperçu');////
define('_ACA_MENU_SEND', 'Envoyer');
define('_ACA_MENU_SEND_TEST', 'Envoyer un essai');
define('_ACA_MENU_SEND_QUEUE', 'File d\'attente de processus');
define('_ACA_MENU_VIEW', 'Aperçu');
define('_ACA_MENU_COPY', 'Copier');
define('_ACA_MENU_VIEW_STATS', 'Afficher statistiques');
define('_ACA_MENU_CRTL_PANEL', 'Panneau de configuration');
define('_ACA_MENU_LIST_NEW', 'Créer une liste');
define('_ACA_MENU_LIST_EDIT', ' Éditer une liste');
define('_ACA_MENU_BACK', 'Retour');
define('_ACA_MENU_INSTALL', 'Installation');
define('_ACA_MENU_TAB_SUM', 'Résumer');
define('_ACA_STATUS', 'Statut');
define('_ACA_SENT_MAILING', 'Message envoyé');

// messages
define('_ACA_ERROR', 'Une erreur s\'est produite!');
define('_ACA_SUB_ACCESS', 'Droits d\'utilisateur');
define('_ACA_DESC_CREDITS', 'Crédits');
define('_ACA_DESC_INFO', 'Information');
define('_ACA_DESC_HOME', 'Accueil');
define('_ACA_DESC_MAILING', 'Liste d\'envoi');
define('_ACA_DESC_SUBSCRIBERS', 'Abonnés');
define('_ACA_PUBLISHED', 'Publié');
define('_ACA_UNPUBLISHED', 'Non publié');
define('_ACA_DELETE', 'Effacer');
define('_ACA_FILTER', 'Filtrer');
define('_ACA_UPDATE', 'Mise à jour');
define('_ACA_SAVE', 'Sauvegarder');
define('_ACA_CANCEL', 'Annuler');
define('_ACA_NAME', 'Nom');
define('_ACA_EMAIL', 'Courriel');
define('_ACA_SELECT', 'Sélectionner');
define('_ACA_ALL', 'Tout');
define('_ACA_SEND_A', 'Envoyer un');
define('_ACA_SUCCESS_DELETED', 'Supprimé avec succès');
define('_ACA_LIST_ADDED', 'Liste créée avec succès');
define('_ACA_LIST_COPY', 'Liste copiée avec succès');
define('_ACA_LIST_UPDATED', 'Liste mise à jour avec succès.');
define('_ACA_MAILING_SAVED', 'Envoi sauvegardé avec succès.');
define('_ACA_UPDATED_SUCCESSFULLY', ' mise à jour avec succès.');


### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', 'Informations Abonné');
define('_ACA_VERIFY_INFO', 'Veuillez vérifier le lien entré, des informations manquent.');
define('_ACA_INPUT_NAME', 'Nom');
define('_ACA_INPUT_EMAIL', 'Courriel');
define('_ACA_RECEIVE_HTML', 'Recevoir du HTML ?');
define('_ACA_TIME_ZONE', 'Fuseaux horaire');
define('_ACA_BLACK_LIST', 'Liste noire');
define('_ACA_REGISTRATION_DATE', 'Date d\'enregistrement de l\'utilisateur');
define('_ACA_USER_ID', 'Id Utilisateur');
define('_ACA_DESCRIPTION', 'Description');
define('_ACA_ACCOUNT_CONFIRMED', 'Votre compte a été activé.');
define('_ACA_SUB_SUBSCRIBER', 'Abonné');
define('_ACA_SUB_PUBLISHER', 'Éditeur');
define('_ACA_SUB_ADMIN', 'Administrateur');
define('_ACA_REGISTERED', 'Enregistré');
define('_ACA_SUBSCRIPTIONS', 'Abonnements');
define('_ACA_SEND_UNSUBCRIBE', 'Abonnements');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Cliquez sur Oui pour envoyer un courriel de confimation de désabonnement.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Veuillez confirmer votre abonnement');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Confirmation de désabonnement');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Bonjour [NAME],<br />' .
		'Plus qu\'une étape et vous serez inscrit sur la liste. Cliquez s\'il vous plaît sur le lien suivant pour confirmer votre abonnement.' .
		'<br /><br />[CONFIRM]<br /><br />Pour toutes questions veuillez contacter le webmaster.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Ceci un courriel de confirmation de désabonnement à notre liste. Nous sommes désolés que vous ayez décidé de vous désabonner. Si vous décidez de vous réinscrire, vous pouvez le faire sur notre site. Pour toutes questions veuillez contacter le webmaster.');

// jNews subscribers
define('_ACA_CONFIRMED', 'Confirmé');
define('_ACA_SUBSCRIB', 'Souscrire');
define('_ACA_HTML', 'Envois HTML');///
define('_ACA_RESULTS', 'Résultats');
define('_ACA_SEL_LIST', 'Selectionner une liste');
define('_ACA_SEL_LIST_TYPE', '- Sélectionner un type de liste -');
define('_ACA_SUSCRIB_LIST', 'Liste de tous les abonnés');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Abonnés pour : ');
define('_ACA_NO_SUSCRIBERS', 'Aucun abonné n\'a été trouvé pour cette liste.');

define('_ACA_COMFIRM_SUBSCRIPTION', 'Un courriel de comfirmation vous a été envoyé. Merci de vérifier votre courriel et cliquez sur le lien fourni.<br />' .
		'Vous devez confirmer votre courriel pour que votre abonnement puisse prendre effet.');
define('_ACA_SUCCESS_ADD_LIST', 'Vous avez été ajouté(e) avec succès à la liste.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Cliquez ici pour confirmer votre abonnement.');
define('_ACA_UNSUBSCRIBE_LINK', 'Cliquez ici pour vous désabonnez de la liste');
define('_ACA_UNSUBSCRIBE_MESS', 'Votre adresse courriel a été supprimée des listes');
define('_ACA_QUEUE_SENT_SUCCESS', 'Tous les courriels programmés ont été envoyés avec succès.');
define('_ACA_MALING_VIEW', 'Afficher tous les envois');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Êtes-vous sûr de vouloir vous désabonner de cette liste?');
define('_ACA_MOD_SUBSCRIBE', 'S\'abonner');
define('_ACA_SUBSCRIBE', 'S\'abonner');
define('_ACA_UNSUBSCRIBE', 'Se désabonner');
define('_ACA_VIEW_ARCHIVE', 'Voir les archives');
define('_ACA_SUBSCRIPTION_OR', 'Cliquez ici pour mettre vos informations à jour');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Cette adresse courriel a déjà été enregistrée.');
define('_ACA_SUBSCRIBER_DELETED', 'Abonné supprimé avec succès.');


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', 'Panneau de configuration Utilisateur');
define('_UCP_USER_MENU', 'Menu Utilisateur');
define('_UCP_USER_CONTACT', 'Mes Abonnements');
 //jNews Cron Menu
define('_UCP_CRON_MENU', 'Gestion des tâches Cron');
define('_UCP_CRON_NEW_MENU', 'Nouveau Cron');
define('_UCP_CRON_LIST_MENU', 'Liste de mon Cron');
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', 'Gestion de coupons');
define('_UCP_COUPON_LIST_MENU', 'Liste de mes coupons');
define('_UCP_COUPON_ADD_MENU', 'Ajouter un coupon');


### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', 'Description');
define('_ACA_LIST_T_LAYOUT', 'Disposition');
define('_ACA_LIST_T_SUBSCRIPTION', 'Abonnement');
define('_ACA_LIST_T_SENDER', 'Informations sur l\'expéditeur');

define('_ACA_LIST_TYPE', 'Type de liste');
define('_ACA_LIST_NAME', 'Nom de liste');
define('_ACA_LIST_ISSUE', 'Publication N°');
define('_ACA_LIST_DATE', 'Date d\'envoi');
define('_ACA_LIST_SUB', 'Titre de la liste');/////
define('_ACA_HTML_CONTENT', 'Contenu HTML');/////
define('_ACA_ATTACHED_FILES', 'Pièces jointes');
define('_ACA_SELECT_LIST', 'Veuillez choisir une liste pour l\'édition!');

// Auto Responder box
define('_ACA_AUTORESP_ON', 'Type de liste');
define('_ACA_AUTO_RESP_OPTION', 'Options des réponses automatiques');
define('_ACA_AUTO_RESP_FREQ', 'Les abonnés peuvent choisir la fréquence');
define('_ACA_AUTO_DELAY', 'Délai (en jours)');
define('_ACA_AUTO_DAY_MIN', 'Fréquence minimale');
define('_ACA_AUTO_DAY_MAX', 'Fréquence maximale');
define('_ACA_FOLLOW_UP', 'Spécifiez la réponse automatique suivante');
define('_ACA_AUTO_RESP_TIME', 'Les abonnés peuvent choisir le temps');
define('_ACA_LIST_SENDER', 'Liste des expéditeurs');

define('_ACA_LIST_DESC', 'Description de liste');
define('_ACA_LAYOUT', 'Disposition');
define('_ACA_SENDER_NAME', 'Nom de l\'expéditeur');
define('_ACA_SENDER_EMAIL', 'Courriel de l\'expéditeur');
define('_ACA_SENDER_BOUNCE', 'Adresse de retour de l\'expéditeur');/////
define('_ACA_LIST_DELAY', 'Délai');
define('_ACA_HTML_MAILING', 'Liste d\'envoi de courriels HTML?');
define('_ACA_HTML_MAILING_DESC', '(Si vous changez ceci, vous devrez sauvegarder et revenir à cet écran pour voir les changements.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Visible du coté client ?');
define('_ACA_SELECT_IMPORT_FILE', 'Choisissez un fichier à importer');
define('_ACA_IMPORT_FINISHED', 'Importation terminée');
define('_ACA_DELETION_OFFILE', 'Suppression du fichier');
define('_ACA_MANUALLY_DELETE', 'Échoué, vous devriez supprimer manuellement le fichier');
define('_ACA_CANNOT_WRITE_DIR', 'Écriture impossible dans le répertoire');
define('_ACA_NOT_PUBLISHED', 'Les courriels ne pourront pas être envoyés, la liste n\'est pas publiée.');

//  List info box
define('_ACA_INFO_LIST_PUB', 'Cliquez sur Oui pour publier la liste');
define('_ACA_INFO_LIST_NAME', 'Entrez le nom de votre liste ici. Vous pourrez ainsi l\'identifier.');
define('_ACA_INFO_LIST_DESC', 'Entrez une brève description de votre liste ici. Cette description sera visible pour les visiteurs de votre site.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Entrez le nom de l\'expéditeur de l\'envoi. Ce nom sera visible lorsque les abonnés recevront des messages de cette liste.');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Entrez l\'adresse courriel depuis laquelle les messages seront envoyés.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Entrez l\'adresse courriel à laquelle les utilisateurs peuvent répondre. Il est fortement recommandé que ce soit le même courriel que celui de l\'expéditeur car les filtre de spams pourrons considérer votre Infolettre comme un pourriel.');
define('_ACA_INFO_LIST_AUTORESP', 'Choisir un type de liste d\'envoi. <br />' .
		'Infolettre:  infolettre normale<br />' .
		'Réponse automatique: Une réponse automatique est une liste qui est envoyée automatiquement par le site Web à intervalles réguliers.');
define('_ACA_INFO_LIST_FREQUENCY', 'Permettez aux utilisateurs de choisir combien de fois ils reçoivent la liste. Cela donne plus de souplesse à l\'utilisateur.');
define('_ACA_INFO_LIST_TIME', 'Laissez l\'utilisateur choisir son horaire préféré de réception de la liste.');
define('_ACA_INFO_LIST_MIN_DAY', 'Définissez la fréquence minimale que peut choisir un utilisateur pour recevoir la liste');
define('_ACA_INFO_LIST_DELAY', 'Spécifiez le délai entre cette réponse automatique et le précédent.');
define('_ACA_INFO_LIST_DATE', 'Spécifiez la date de publication de la liste de nouvelles si vous voulez retarder la publication. <br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Définissez la fréquence maximale que peut choisir un utilisateur pour recevoir la liste');
define('_ACA_INFO_LIST_LAYOUT', 'Entrez la disposition de votre liste d\'adresses ici. Vous pouvez entrer n\'importe quelle disposition pour votre envoi ici.');
define('_ACA_INFO_LIST_SUB_MESS', 'Ce message sera envoyé à l\'abonné quand il ou elle se sera inscrit(e). Vous pouvez définir ici n\'importe quel texte.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Ce message sera envoyé à l\'abonné quand il ou elle se désabonnera. Vous pouvez définir ici n\'importe quel message.');
define('_ACA_INFO_LIST_HTML', 'Cocher la case si vous voulez envoyer un message HTML. Les abonnés seront capables de définir s\'ils veulent recevoir les lettres au format HTML ou texte seul lorsqu\'ils souscrivent à une liste HTML.');
define('_ACA_INFO_LIST_HIDDEN', 'Cliquez sur Oui pour cacher la liste du frontend. Les utilisateurs ne pourront plus s\'abonner mais vous pourrez toujours envoyer des lettres.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Voulez-vous assigner automatiquement des utilisateurs à cette liste ? < Br / > <B> Nouveaux utilisateurs : </B > seront enregistrés tous les nouveaux utilisateurs qui s\'inscrivent sur le site Web. < Br / > < B> Tous les utilisateurs : </B > enregistrera tous les utilisateurs enregistrés dans la base de données. < Br / > (toute cette option supporte le module Community Builder))');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Choisissez le niveau d\'accès sur le frontend. Cela affichera ou cachera l\'envoi au groupe d\'utilisateurs qui n\'y a pas accès. Ils ne pourront donc pas y souscrire.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Choisissez le niveau d\'accès du groupe utilisateurs à qui vous voulez permettre les modifications. Ce groupe et ceux au dessus seront capables d\'éditer l\'envoi et pourront effectuer l\'envoi depuis le frontend et le backend.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Si vous voulez que l\'auto-répondeur se déplace sur un autre message une fois le dernier message atteint, vous pouvez spécifier ici  l\'auto-répondeur suivant.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Identifiant de la personne qui a créé la liste.');
define('_ACA_INFO_LIST_WARNING', 'Cette dernière option est seulement disponible une fois la liste créée.');
define('_ACA_INFO_LIST_SUBJET', ' Sujet de l\'envoi, c\'est le sujet du courriel que l\'abonné recevra.');
define('_ACA_INFO_MAILING_CONTENT', 'C\'est le corps du courriel que vous voulez envoyer.');
define('_ACA_INFO_MAILING_NOHTML', 'Entrez ici le corps du message pour les utilisateurs qui ont choisi de pas recevoir l\'infolettre au format HTML. <BR/> NOTE: si vous laissez cet espace vide, jNews convertira automatiquement le contenu HTML en text normal.');/////
define('_ACA_INFO_MAILING_VISIBLE', 'Cliquez sur Oui pour que l\'envoi soit visible depuis le frontend.');
define('_ACA_INSERT_CONTENT', 'Insérez un contenu existant');

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', 'Coupon envoyé avec succès!');
define('_ACA_CHOOSE_COUPON', 'Choisissez un coupon');
define('_ACA_TO_USER', ' à cet utilisateur');

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', 'Toutes les heures');
define('_ACA_FREQ_CH2', 'Toutes les 6 heures');
define('_ACA_FREQ_CH3', 'Toutes les 12 heures');
define('_ACA_FREQ_CH4', 'Quotidiennement');
define('_ACA_FREQ_CH5', 'Toutes les semaines');
define('_ACA_FREQ_CH6', 'Toutes les mois');
define('_ACA_FREQ_NONE', 'Non');
define('_ACA_FREQ_NEW', 'Nouveaux utilisateurs');
define('_ACA_FREQ_ALL', 'Tous les utilisateurs');

//Label CRON form
define('_ACA_LABEL_FREQ', 'jNews Cron ?');
define('_ACA_LABEL_FREQ_TIPS', 'Cliquez sur Oui si vous voulez l\'utiliser pour un Cron jNews, Non pour une autre tâche cron.<br />' .
		'Si vous cliquez sur Oui vous ne devez pas spécifier l\'adresse de Cron, elle sera automatiquement ajouté.');
define('_ACA_SITE_URL', 'L\'URL de votre site');
define('_ACA_CRON_FREQUENCY', 'Fréquence Cron');
define('_ACA_STARTDATE_FREQ', 'Date de début');
define('_ACA_LABELDATE_FREQ', 'Date spécifique');
define('_ACA_LABELTIME_FREQ', 'Horaire spécifique');
define('_ACA_CRON_URL', 'URL Cron');
define('_ACA_CRON_FREQ', 'Fréquence');
define('_ACA_TITLE_CRONLIST', ' Liste Cron');
define('_NEW_LIST', 'Créer une nouvelle liste');

//title CRON form
define('_ACA_TITLE_FREQ', 'Édition de vos tâches Cron');
define('_ACA_CRON_SITE_URL', 'Veuillez entrez une URL de site valable, commençant par http://');

### Envois ###
define('_ACA_MAILING_ALL', 'Tous les envois');
define('_ACA_EDIT_A', 'Éditer un ');
define('_ACA_SELCT_MAILING', 'Vous devez choisir une liste dans la liste déroulante pour ajouter un nouvel envoi.');
define('_ACA_VISIBLE_FRONT', 'Visible depuis le frontend');

// courrieler
define('_ACA_SUBJECT', 'Sujet');
define('_ACA_CONTENT', 'Contenu');
define('_ACA_NAMEREP', '[NAME] = Ceci sera remplacé par le nom de l\'abonné entré. Vous enverrez ainsi un courriel personnalisé en l\'utilisant.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Ceci sera remplacé par le PRÉNOM de l\'abonné entré.<br />');
define('_ACA_NONHTML', 'Version texte');
define('_ACA_ATTACHMENTS', 'Pièce(s) jointe(s)');
define('_ACA_SELECT_MULTIPLE', 'Appuyez sur CTRL (ou Command) pour sélectionner des pièces jointes multiples.<br />' .
		'Les fichiers montrés dans cette liste de pièces jointes sont placés dans le dossier pièces jointes, vous pouvez changer cet emplacement dans le panneau de configuration.');
define('_ACA_CONTENT_ITEM', 'Elément de contenu');//
define('_ACA_SENDING_EMAIL', 'Envoi de courriel');
define('_ACA_MESSAGE_NOT', 'Le message n\'a pas pu être envoyé');
define('_ACA_MAILER_ERROR', 'Erreur d\'envoi');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Message envoyé avec succès');
define('_ACA_SENDING_TOOK', 'Envoyer cette infolettre ');////took
define('_ACA_SECONDS', 'secondes');
define('_ACA_NO_ADDRESS_ENTERED', 'Aucune adresse courriel ou abonné n\'a été fournie');
define('_ACA_NO_MAILING_ENTERED', 'Aucune liste d\'envoi n\'a été fournie');
define('_ACA_NO_LIST_ENTERED', 'Aucune liste n\'a été fournie');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Changement');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Changez votre abonnement');
define('_ACA_WHICH_EMAIL_TEST', 'Indiquez l\'adresse électronique à laquelle vous voulez envoyer cet essai ou sélectionnez aperçu');
define('_ACA_SEND_IN_HTML', 'Envoyer en HTML (pour les listes d\'envois en HTML )?');
define('_ACA_VISIBLE', 'Visible');
define('_ACA_INTRO_ONLY', 'Intro seulement');

// stats
define('_ACA_GLOBALSTATS', 'Statistiques globales');
define('_ACA_DETAILED_STATS', 'Statistiques détaillées ');
define('_ACA_MAILING_LIST_DETAILS', 'Listes détaillées');
define('_ACA_SEND_IN_HTML_FORMAT', 'Envois au format HTML');
define('_ACA_VIEWS_FROM_HTML', 'Vus (courriers en HTML)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Envois au format texte');
define('_ACA_HTML_READ', 'Lecture en HTML ');
define('_ACA_HTML_UNREAD', 'Non lus en HTML ');
define('_ACA_TEXT_ONLY_SENT', 'Texte uniquement');

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', 'Courriel');
define('_ACA_LOGGING_CONFIG', 'Logs & Stats');
define('_ACA_SUBSCRIBER_CONFIG', 'Abonnés');
define('_ACA_AUTO_CONFIG', 'Cron');
define('_ACA_MISC_CONFIG', 'Divers');
define('_ACA_MAIL_SETTINGS', 'Paramètres de courriel');/////
define('_ACA_MAILINGS_SETTINGS', 'Paramètres des envois');
define('_ACA_SUBCRIBERS_SETTINGS', 'Paramètres des abonnés');
define('_ACA_CRON_SETTINGS', 'Paramètres du Cron');
define('_ACA_SENDING_SETTINGS', 'Paramètres de l\'envoi');
define('_ACA_STATS_SETTINGS', ' Paramètres des statistiques');
define('_ACA_LOGS_SETTINGS', 'Paramètres des journaux de log');
define('_ACA_MISC_SETTINGS', 'Paramètres divers');
// courriel settings
define('_ACA_SEND_MAIL_FROM', 'Addresse de retour');
define('_ACA_SEND_MAIL_NAME', 'De ');
define('_ACA_MAILSENDMETHOD', 'Méthodes d\'envoi');//Courrieler method
define('_ACA_SENDMAILPATH', 'Chemin du programme sendmail');///
define('_ACA_SMTPHOST', 'Hôte SMTP');
define('_ACA_SMTPAUTHREQUIRED', 'Authentification SMTP exigée');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Choisissez oui si votre serveur de SMTP exige l\'authentification');
define('_ACA_SMTPUSERNAME', 'Nom d\'utilisateur SMTP');
define('_ACA_SMTPUSERNAME_TIPS', 'Entrez votre nom d\'utilisateur SMTP  quand votre serveur SMTP exige l\'authentification');
define('_ACA_SMTPPASSWORD', 'Mot de passe SMTP');
define('_ACA_SMTPPASSWORD_TIPS', 'Entrez votre mot de passe SMTP quand votre serveur SMTP exige l\'authentification');
define('_ACA_USE_EMBEDDED', 'Utilisez des images incorporées');
define('_ACA_USE_EMBEDDED_TIPS', 'Sélectionnez OUI pour que les images soient directement incluses dans l\'email sans être liées au site web');
define('_ACA_UPLOAD_PATH', 'Chemin des pièces jointes à envoyer');
define('_ACA_UPLOAD_PATH_TIPS', 'Vous pouvez spécifier un répertoire d\'importation.<br />' .
		'Vérifiez que le répertoire spécifié existe, sinon créez-le.');

// subscribers settings
define('_ACA_ALLOW_UNREG', 'Non enregistrés autorisés');
define('_ACA_ALLOW_UNREG_TIPS', 'Sélectionner Oui si vous voulez permettre aux utilisateurs de s\'inscrire à une liste sans être enregistrés sur le site.');
define('_ACA_REQ_CONFIRM', 'Confirmation requise');
define('_ACA_REQ_CONFIRM_TIPS', 'Sélectionner Oui si vous demandez aux utilisateurs non enregistrés de confirmer leur adresse courriel.');
define('_ACA_SUB_SETTINGS', 'Paramètres d\'inscription');
define('_ACA_SUBMESSAGE', 'Courriel d\'inscription');
define('_ACA_SUBSCRIBE_LIST', 'S\'incrire à une liste');

define('_ACA_USABLE_TAGS', 'Tags utilisables');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = Ceci crée un lien hypertexte avec lequel les utilisateurs peuvent confirmer leur inscription. Ceci est <strong>requis</strong> pour le bon fonctionnement d\'jNews.<br />'
.'<br />[NAME] = Ceci sera remplacé par le nom entré par l\'inscrit. Vous enverrez ainsi des courriels personnalisés en utilisant cette option.<br />'
.'<br />[FIRSTNAME] = Ceci sera remplacé par le prénom de l\'inscrit, le nom est défini comme le premier nom entré par l\'inscrit.<br />');
define('_ACA_CONFIRMFROMNAME', 'Confirmation du nom');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Entrer le nom qui apparaitra sur la liste des confirmés.');
define('_ACA_CONFIRMFROMEMAIL', 'Confirmation du courriel');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Entrer l\'adresse courriel qui apparaîtra sur la liste des confirmés.');
define('_ACA_CONFIRMBOUNCE', 'Confirmer l\'adresse de rebond');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Entrer l\'adresse de rebond à afficher dans les listes de confirmation.');
define('_ACA_HTML_CONFIRM', 'Confirmation HTML');
define('_ACA_HTML_CONFIRM_TIPS', 'Sélectionner oui si la liste de confirmation doit être en HTML si les utilisateurs autorisent le HTML.');
if(!defined('_ACA_TIME_ZONE')) define('_ACA_TIME_ZONE', 'Demander le fuseau horaire');
define('_ACA_TIME_ZONE_TIPS', 'Sélectionner oui si vous voulez demander le fuseau horaire de l\'utilisateur. La file d\'attente des courriels sera envoyée en tenant compte du fuseau horaire de l\'utilisateur lorsque cela est applicable');

 // Cron Set up
define('_ACA_TIME_OFFSET_URL', 'Cliquer ici pour paramètrer le décalage dans le panneau de configuration globale -> onglet Local');
define('_ACA_TIME_OFFSET_TIPS', 'Paramètrer le décalage temporel de votre serveur de sorte que la date et l\'heure enregistrées soient exactes ');
define('_ACA_TIME_OFFSET', 'Décalage temporel');
define('_ACA_CRON_TITLE', 'Installation de la fonction cron');
define('_ACA_CRON_DESC', '<br />En utilisant la fonction CRON vous pouvez paramètrer des tâches planifiées pour votre site web Joomla !<br />' .
		'Pour l\'installer, vous devez ajouter dans le panneau de configuration crontab la commande suivante :<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Si vous avez besoin d\'aide pour l\'installation ou que vous avez des difficultés, n\hésitez pas à consulter notre forum <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');
// sending settings
define('_ACA_PAUSEX', 'Pause de x secondes après chaque quantité configurée de courriels');
define('_ACA_PAUSEX_TIPS', 'Entrer un nombre en secondes qu\'jNews donnera au serveur SMTP pour lui laisser le temps d\'envoyer les messages avant de procéder à la prochaine quantité de messages configurée.');
define('_ACA_EMAIL_BET_PAUSE', 'Courriels entre les pauses');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Le nombre de courriels à envoyer avant de faire une pause.');
define('_ACA_WAIT_USER_PAUSE', 'Attente d\'une entrée utilisateur comme pause');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Si le script doit attendre une entrée utilisateur lors des pauses entre les lots de courriels.');
define('_ACA_SCRIPT_TIMEOUT', 'Arrêt du script');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Le nombre de minutes pendant lequel le script doit être capable de fonctionner.');
// Stats settings
define('_ACA_ENABLE_READ_STATS', 'Permettre la lecture des statistiques');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Sélectionner Oui si vous vouler noter le nombre de vus. Cette technique peut seulement être utilisée avec les courriels html');
define('_ACA_LOG_VIEWSPERSUB', 'Noter le nombre de vus par abonné');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Sélectionner Oui si vous vouler noter le nombre de vus par abonné. Cette technique peut seulement être utilisée avec les courriels html');
// Logs settings
define('_ACA_DETAILED', 'Logs détaillés');
define('_ACA_SIMPLE', 'Logs simplifiés');
define('_ACA_DIAPLAY_LOG', 'Afficher les logs');
define('_ACA_DISPLAY_LOG_TIPS', 'Sélectionner Oui si vous voulez afficher les logs lors de l\'envoi des courriels.');
define('_ACA_SEND_PERF_DATA', 'Envoyer les données d\'éxécution');
define('_ACA_SEND_PERF_DATA_TIPS', 'Sélectionner oui si vous voulez permettre à jNews d\'envoyer des rapports anonymes sur votre configuration, le nombre d\'abonnés à une liste et le temps mis pour envoyer les courriels. Ceci nous donnera une idée sur les performances d\'jNews et nous AIDERA à améliorer jNews dans les développements futurs.');
define('_ACA_SEND_AUTO_LOG', 'Envoyer les logs pour les réponses automatiques');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Sélectionnez oui si vous voulez envoyer an courriel de log à chaque traitement de la liste d\'envois. AVERTISSEMENT : Cela peut aboutir à un très grand nombre de courriels.');
define('_ACA_SEND_LOG', 'Envoyer les logs');
define('_ACA_SEND_LOG_TIPS', 'Si une notification de courriel doit être envoyée à l\'adresse courriel de l\'utilisateur qui a envoyé les courriels.');
define('_ACA_SEND_LOGDETAIL', 'Envoyer les logs détaillés');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Détaillé inclut l\'information sur le succès ou l\'échec pour chaque abonné et un aperçu de l\'information. Simple envoie seulement l\'aperçu.');
define('_ACA_SEND_LOGCLOSED', 'Envoyer une notification si la connexion est interrompue');
define('_ACA_SEND_LOGCLOSED_TIPS', 'Avec cette option sur on, l\'utilisateur qui envoie le courriel recevra un rapport par courriel.');
define('_ACA_SAVE_LOG', 'Sauvegarder les logs');
define('_ACA_SAVE_LOG_TIPS', 'Si un log concernant l\'envoi doit être ajouté au fichier de log.');
define('_ACA_SAVE_LOGDETAIL', 'Sauvegarder les logs détaillés');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Détails inclut l\'information sur le succès ou l\'échec pour chaque abonné et un aperçu de l\'information. Simple envoie seulement l\'aperçu.');
define('_ACA_SAVE_LOGFILE', 'Sauvegarder les fichiers de logs');
define('_ACA_SAVE_LOGFILE_TIPS', 'Fichier auquel les informations sur les logs doivent être ajoutés. Ce fichier peut devenir assez volumineux.');
define('_ACA_CLEAR_LOG', 'Effacement logs');
define('_ACA_CLEAR_LOG_TIPS', 'Effacer les fichiers de logs.');

### control panel
define('_ACA_CP_LAST_QUEUE', 'Dernière file d\'attente exécutée');
define('_ACA_CP_TOTAL', 'Total');
define('_ACA_MAILING_COPY', 'Copie réussie des envois !');

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', 'Afficher le guide');
define('_ACA_SHOW_GUIDE_TIPS', 'Afficher le guide pour aider les nouveaux utilisateurs à créer une infolettre, une réponse automatique et installer jNews correctement.');
define('_ACA_AUTOS_ON', 'Utiliser les réponses automatiques');
define('_ACA_AUTOS_ON_TIPS', 'Sélectionner Non si vous ne voulez pas utiliser les réponses automatiques. Toutes les options des réponses automatiques seront désactivées.');
define('_ACA_NEWS_ON', 'Utiliser les infolettres');
define('_ACA_NEWS_ON_TIPS', 'Sélectionner Non si vous ne voulez pas utiliser les infolettres. Toutes les options d\'infolettres seront désactivées.');
define('_ACA_SHOW_TIPS', 'Afficher les astuces');
define('_ACA_SHOW_TIPS_TIPS', 'Afficher les astuces, pour aider les utilisateurs à se servir d\'jNews plus efficacement.');
define('_ACA_SHOW_FOOTER', 'Montrer le titre de bas de page');
define('_ACA_SHOW_FOOTER_TIPS', 'Si oui ou non le copyright de bas de page doit être affiché.');
define('_ACA_SHOW_LISTS', 'Montrer les listes sur le fontend');
define('_ACA_SHOW_LISTS_TIPS', 'Lorsque les utilisateurs ne sont pas enregistrés, montrer la liste des listes auquelles ils peuvent s\'abonner avec le bouton d\'archive pour les infolettres ou simplement une formulaire de login pour qu\'ils puissent s\'enregistrer.');
define('_ACA_CONFIG_UPDATED', 'Les détails de configuration ont été mis à jour !');
define('_ACA_UPDATE_URL', 'Mettre à jour l\'URL');
define('_ACA_UPDATE_URL_WARNING', ' AVERTISSEMENT ! Ne changez pas cette URL à moins que vous n\'ayiez été invités à le faire par l\'équipe technique d\'jNews.<br />');
define('_ACA_UPDATE_URL_TIPS', 'Par exemple: http://www.ijoobi.com/update/ (inclut le slash de fin)');

// module
define('_ACA_EMAIL_INVALID', 'Le courriel entré est invalide.');
define('_ACA_REGISTER_REQUIRED', 'Merci de vous enregistrer sur le site avant de pouvoir vous abonner à une liste.');
define('_ACA_SIGNUP_DATE', 'Date d\'inscription');

// Access level box
define('_ACA_OWNER', 'Créateur de la liste :');
define('_ACA_ACCESS_LEVEL', 'Définir un niveau d\'accès pour la liste ');
define('_ACA_ACCESS_LEVEL_OPTION', 'Options du niveau d\'accès');
define('_ACA_USER_LEVEL_EDIT', 'Sélectionner quel niveau d\'utilisateur est autorisé à éditer un envoi (frontend ou backend) ');

//  drop down options
define('_ACA_AUTO_DAY_CH1', 'Journalier');
define('_ACA_AUTO_DAY_CH2', 'Journalier hors weekend');
define('_ACA_AUTO_DAY_CH3', 'Tous les autres jours');
define('_ACA_AUTO_DAY_CH4', 'Tous les autres jours hors weekend');
define('_ACA_AUTO_DAY_CH5', 'Hebdomadaire');
define('_ACA_AUTO_DAY_CH6', 'Bi-hebdomadaire');
define('_ACA_AUTO_DAY_CH7', 'Mensuel');
define('_ACA_AUTO_DAY_CH9', 'Annuel');
define('_ACA_AUTO_OPTION_NONE', 'Non');
define('_ACA_AUTO_OPTION_NEW', 'Nouveaux utilisateurs');
define('_ACA_AUTO_OPTION_ALL', 'Tous les utilisations');

//
define('_ACA_UNSUB_MESSAGE', 'Se désincrire des courriels');
define('_ACA_UNSUB_SETTINGS', 'Paramètres de désincription');
define('_ACA_AUTO_ADD_NEW_USERS', 'Inscription automatique des utilisateurs?');

// Update and upgrade messages
define('_ACA_VERSION', 'Version d\'jNews');
define('_ACA_NO_UPDATES', 'Il n\'y a pas actuellement de mises à jours disponibles.');
define('_ACA_NEED_UPDATED', 'Fichiers qui ont besoin d\'être mis à jour :');
define('_ACA_NEED_ADDED', 'Fichiers qui ont besoin d\'être ajoutés :');
define('_ACA_NEED_REMOVED', 'Fichiers qui ont besoin d\'être supprimés :');
define('_ACA_FILENAME', 'Nom de fichier :');
define('_ACA_CURRENT_VERSION', 'Version actuelle :');
define('_ACA_NEWEST_VERSION', 'Version la plus récente :');
define('_ACA_UPDATING', 'Mettre à jour');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Les fichiers ont été mis à jour avec succès.');
define('_ACA_UPDATE_FAILED', 'La mise à jour à échoué !');
define('_ACA_ADDING', 'Ajouter');
define('_ACA_ADDED_SUCCESSFULLY', 'Ajouter avec succès.');
define('_ACA_ADDING_FAILED', 'L\'ajout a échoué !');
define('_ACA_REMOVING', 'Supprimer');
define('_ACA_REMOVED_SUCCESSFULLY', 'Supprimer avec succès.');
define('_ACA_REMOVING_FAILED', 'La suppression a échoué!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Installer une version différente');
define('_ACA_CONTENT_ADD', 'Ajouter un contenu');
define('_ACA_UPGRADE_FROM', 'Importer des données (informations sur les infolettres et les abonnés) de ');
define('_ACA_UPGRADE_MESS', 'Il n\'y a aucun risque pour vos données existantes. <br /> Le processus va simplement importer les données dans la base de données d\'jNews.');
define('_ACA_CONTINUE_SENDING', 'Continuer l\'envoi');

// jNews message
define('_ACA_UPGRADE1', 'Vous pouvez facilement importer vos utilisateurs et vos infolettres de ');
define('_ACA_UPGRADE2', ' vers jNews dans le panneau de mise à jour.');
define('_ACA_UPDATE_MESSAGE', 'Une nouvelle version d\'jNews est disponible. ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Une nouvelle version d\'jNews est disponible. Cliquez ici pour faire la mise à jour !');
define('_ACA_CRON_SETUP', 'Pour utiliser les réponses automatiques, vous avec besoin d\'installer une tâche cron.');
define('_ACA_THANKYOU', 'Merci d\'avoir choisi jNews, Votre partenaire de communication !');
define('_ACA_NO_SERVER', 'Le serveur de mise à jour n\'est pas disponible, merci de revenir un peu plus tard.');
define('_ACA_MOD_PUB', 'Le module jNews n\'est pas publié.');
define('_ACA_MOD_PUB_LINK', 'Cliquez ici pour le publier!');
define('_ACA_IMPORT_SUCCESS', 'Importer avec succès');
define('_ACA_IMPORT_EXIST', 'Utilisateur déjà présent dans la base de données');


// jNews's Guide
define('_ACA_GUIDE', '\'s User Guide');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews a de nombreuses caractéristiques et ce tutoriel vous guidera au travers d\'un processus en quatre étapes pour vous permettre d\'envoyer des infolettres et des réponses automatiques!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Premièrement, vous avez besoin d\'ajouter une liste. Une liste peut être de deux types, soit une infolettre soit une réponse automatique.' .
		'  Dans une liste, you définissez tous les différents paramètres permettant l\'envoi de vos infolettres ou de vos réponses automatiques : nom de l\'expéditeur, la disposition, les abonnés\' le message de bienvenue, etc...
<br /><br />Vous pouvez créer votre première liste ici : <a href="index2.php?option=com_jnewsletter&act=list" >Créer une liste</a> et cliquer sur le Nouveau bouton.');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews vous fournit un moyen facile d\'importer toutes vos données depuis une version antérieure de système d\'infolettres.<br />' .
		' Allez dans le panneau d\'importation et choisissez votre ancien système d\'infolettres pour importer toutes vos infolettres et tous vos abonnés.<br /><br />' .
		'<span style="color:#FF5E00;" >IMPORTANT: L\'importation ne présente AUCUN risque et n\'affectera d\'aucune manière les données de votre ancien système d\'infolettres</span><br />' .
		'Après l\'importation, vous pourrez gérer vos abonnés et l\'envoi des courriels directement à partir d\'jNews.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Super ! Votre première liste est créée !  Vous pouvez maintenant écrire votre première %s. Pour la créer, aller dans : ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Gestion des réponses automatiques');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Gestion d\'infolettres');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' et sélectionner votre %s. <br /> Ensuite choisissez %s dans le menu déroulant.  Créer votre premier envoie en cliquant sur Nouveau ');

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'Avant d\envoyer votre première infolettre vous voudrez peut-être vérifier la configuration des courriels.  ' .
		'Allez à la <a href="index2.php?option=com_jnewsletter&act=configuration" >page de configuration</a> pour vérifier les paramètres des courriels. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Quand vous êtes prêt, retournez au menu Infolettres, sélectionnez votre courriel et cliquez sur Envoyer');

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Pour l\'envoi des réponses automatiques vous avez besoin premièrement d\'installer une tâche cron sur votre serveur. ' .
		' Merci de vous référer au Cron tab dans le panneau de configuration.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >Cliquez ici</a> pour apprendre comment installer une tâche cron. <br />');

define('_ACA_GUIDE_MODULE', ' <br />Assurez-vous également d\'avoir publié le module jNews pour que les utilisateurs puissent s\'inscrire sur les listes.');

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Vous pouvez maintemant également créer une réponse automatique.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Vous pouvez maintemant également créer une infolettre.');

define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Voilà ! Vous êtes prêt à communiquer efficacement avec vos visiteurs et vos utilisateurs. Ce tutoriel se terminera dès que vous aurez entré un second courriel ou vous pouvez l\arrêter dans le panneau de configuration.' .
		'<br /><br />  Si vous avez des questions sur l\'utilisation d\'jNews, merci de vous référer à la ' .
		'<a target="_blank"  href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60" >documentation</a>. ' .
		' Vous pouvez aussi trouver de nombreuses informations sur comment communiquer efficacement avec vos abonnés sur <a href="http://www.ijoobi.com/" target="_blank"">www.ijoobi.com</a>.' .
		'<p /><br /><b>Merci d\'utiliser jNews. Votre Partenaire de Communication !</b> ');
define('_ACA_GUIDE_TURNOFF', 'Le guide est maintenant arrêté !');
define('_ACA_STEP', 'STEP ');

// jNews Install
define('_ACA_INSTALL_CONFIG', 'Configuration jNews');
define('_ACA_INSTALL_SUCCESS', 'Installation réussie');
define('_ACA_INSTALL_ERROR', 'Erreur d installation');
define('_ACA_INSTALL_BOT', 'Plugin jNews (Bot)');
define('_ACA_INSTALL_MODULE', 'Module jNews');
//Others
define('_ACA_JAVASCRIPT', '! Attention ! Pour une bonne opération, Le javascript doit être activé.');
define('_ACA_EXPORT_TEXT', 'L\'exportation des abonnés est basé sur la liste que vous avez choisie. <br />Exporter les abonnés de la liste');
define('_ACA_IMPORT_TIPS', 'Importation des abonnés. Les informations dans le fichier nécessitent d\'être au format suivant : <br />' .
		'Nom,courriel,recevoirHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmé(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'est déjà abonné');
define('_ACA_GET_STARTED', 'Cliquez ici pour commencer !');

//News since 1.0.1
define('_ACA_WARNING_1011', 'Avertissement: 1011: La mise à jour ne fonctionnera pas à cause des restrictions sur votre serveur.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Utilisée comme addresse de rebond pour tous les e-mails');
define('_ACA_SEND_MAIL_NAME_TIPS', ' Choisissez le nom qui apparaitra comme expéditeur.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Choisissez quel type de serveur vous désirez utiliser : Fonction PHP MAIL, <span>Sendmail</span> ou Serveur SMTP.');
define('_ACA_SENDMAILPATH_TIPS', 'Ceci est le répertoire du serveur Courriel');
define('_ACA_LIST_T_TEMPLATE', 'Template');
if(!defined('_ACA_NO_MAILING_ENTERED')) define('_ACA_NO_MAILING_ENTERED', 'Pas de courriel fourni');
if(!defined('_ACA_NO_LIST_ENTERED')) define('_ACA_NO_LIST_ENTERED', 'Pas de liste fournie');
if(!defined('_ACA_SENT_MAILING')) define('_ACA_SENT_MAILING', 'Courriels envoyés');
define('_ACA_SELECT_FILE', 'Merci de sélectionner un fichier ');
define('_ACA_LIST_IMPORT', ' Vérifier les listes auxquelles vous voulez que les abonnés soient associés.');
define('_ACA_PB_QUEUE', ' Abonné ajouté mais un problème est survenu pour le/la relier aux listes. Merci de vérifier manuellement.');
define('_ACA_UPDATE_MESS', '');
define('_ACA_UPDATE_MESS1', 'Mise à jour hautement recommandée!');
define('_ACA_UPDATE_MESS2', 'Correctif(patch) et petites corrections.');
define('_ACA_UPDATE_MESS3', 'Nouvelle version.');
define('_ACA_UPDATE_MESS5', 'Joomla 1.5 est requis pour mettre à jour.');
define('_ACA_UPDATE_IS_AVAIL', ' est disponible ! ');
define('_ACA_NO_MAILING_SENT', 'Aucun courriel envoyé ! ');
define('_ACA_SHOW_LOGIN', 'Afficher le formulaire d\'enregistrement');
define('_ACA_SHOW_LOGIN_TIPS', 'Sélectionner Oui pour montrer le formulaire d\'enregistrement depuis le frontend du panneau de configuration d\'jNews pour permettre aux utilisateurs de s\'enregistrer sur le site web.');
define('_ACA_LISTS_EDITOR', 'Éditeur de description des listes');
define('_ACA_LISTS_EDITOR_TIPS', 'Sélectionner Oui pour utiliser un éditeur HTML pour éditer le champ description des listes.');
define('_ACA_SUBCRIBERS_VIEW', 'Voir les abonnés');

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', 'Paramètres du frontend');
define('_ACA_SHOW_LOGOUT', 'Montrer le bouton de déconnexion');
define('_ACA_SHOW_LOGOUT_TIPS', 'Sélectionner Oui pour afficher un bouton de déconnexion dans le panneau de configuration du Front End d\'jNews.');

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', 'Intégration');
define('_ACA_CB_INTEGRATION', 'Intégration de Community Builder');
define('_ACA_INSTALL_PLUGIN', 'Plugin de Community Builder (Intégration d\'jNews) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'Le plugin pour Community Builder d\'jNews n\'est pas encore installé !');
define('_ACA_CB_PLUGIN', 'Listes à l\'enregistrement');
define('_ACA_CB_PLUGIN_TIPS', 'Sélectionner Oui pour afficher les listes d\'envoi dans le formulaire d\'enregistrement de Community builder');
define('_ACA_CB_LISTS', 'Listes des identifiants');
define('_ACA_CB_LISTS_TIPS', 'Ceci est un champ obligatoire. Entrez l\'identifiant numérique des listes auxquelles vous souhaitez permettre aux utilisateurs de s\'abonner, séparés par une virgule, (0 montrer toutes les listes)');
define('_ACA_CB_INTRO', 'Texte d\'introduction');
define('_ACA_CB_INTRO_TIPS', 'Le texte qui apparaîtra avant les listes. Laisser vide pour ne rien afficher. Utiliser cb_pretext pour la disposition CSS.');
define('_ACA_CB_SHOW_NAME', 'Afficher le nom des listes');
define('_ACA_CB_SHOW_NAME_TIPS', 'Sélectionner si afficher ou non le nom des listes après l\'introduction.');
define('_ACA_CB_LIST_DEFAULT', 'Vérifier les listes par défaut');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Sélectionner si oui ou non vous voulez les cases à cocher pour chaque liste choisie par défaut.');
define('_ACA_CB_HTML_SHOW', 'Montrer recevoir en HTML');
define('_ACA_CB_HTML_SHOW_TIPS', 'Indiquez Oui si vous autorisez les utilisateurs à choisir s\'ils veulent ou non recevoir les courriels en HTML. Indiquer Non pour utiliser par défaut la réception des courriels en html.');
define('_ACA_CB_HTML_DEFAULT', 'Recevoir en HTML par défaut');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Renseignez cette option pour afficher la configuration des envois en HTML par défaut. Si Recevoir en HTML par défaut est positionné sur Non, alors cette option sera par défaut.');

// Since 1.0.4
define('_ACA_BACKUP_FAILED', 'Les fichiers n\'ont pas pu être sauvegardés ! Fichiers non remplacés.');
define('_ACA_BACKUP_YOUR_FILES', 'L\'ancienne version des fichiers a été sauvegardée dans le répertoire suivant :');
define('_ACA_SERVER_LOCAL_TIME', 'Serveur local de temps');
define('_ACA_SHOW_ARCHIVE', 'Montrer le bouton Archive');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Sélectionnez Oui pour montrer le bouton Archive dans le listing des Infolettres du front end');
define('_ACA_LIST_OPT_TAG', 'Tags');
define('_ACA_LIST_OPT_IMG', 'Images');
define('_ACA_LIST_OPT_CTT', 'Contenu');
define('_ACA_INPUT_NAME_TIPS', 'Entrez votre nom complet (Prénom en premier)');
define('_ACA_INPUT_EMAIL_TIPS', 'Entrez votre addresse courriel (Vérifiez que l\'adresse courriel est valide si vous voulez recevoir nos courriels.)');
define('_ACA_RECEIVE_HTML_TIPS', 'Choisissez Oui si vous voulez recevoir les courriels au format HTML - Non pour recevoir seulement les courriels au format texte');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Indiquez votre fuseau horaire.');

// Since 1.0.5
define('_ACA_FILES', 'Fichiers');
define('_ACA_FILES_UPLOAD', 'Importer');
define('_ACA_MENU_UPLOAD_IMG', 'Importer Images');
define('_ACA_TOO_LARGE', 'La taille du fichier est trop importante. Le maximum autorisé est ');
define('_ACA_MISSING_DIR', 'Le répertoire de destination n\'existe pas');
define('_ACA_IS_NOT_DIR', 'Le répertoire de destination n\'existe pas ou est un fichier.');
define('_ACA_NO_WRITE_PERMS', 'Le répertoire de destination n\'a pas les droits en écriture.');
define('_ACA_NO_USER_FILE', 'Vous n\'avez pas sélectionné de fichiers pour l\'importation.');
define('_ACA_E_FAIL_MOVE', 'Impossible de déplacer le fichier.');
define('_ACA_FILE_EXISTS', 'Le répertoire de destination existe déjà.');
define('_ACA_CANNOT_OVERWRITE', 'Le répertoire de destination existe déjà et il est impossible de l\'écraser.');
define('_ACA_NOT_ALLOWED_EXTENSION', 'L\'extention du fichier n\'est pas autorisé.');
define('_ACA_PARTIAL', 'Le fichier a été partiellement importé.');
define('_ACA_UPLOAD_ERROR', 'Erreur d\'importation :');
define('DEV_NO_DEF_FILE', 'Le fichier a été partiellement importé.');
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Ceci sera remplacé par les liens de souscription.' .
		' Ceci est <strong>nécessaire</strong> pour qu\'jNews fonctionne correctement.<br />' .
		'Si vous placez n\'importe quel autre contenu dans ce cadre il sera affiché dans tous les envois correspondants à cette liste.' .
		' <br />Ajouter votre message de souscription à la fin.  jNews ajoutera automatiquement un lien pour que les utilisateurs puissent modifier leurs informations et un lien pour se désabonner de la liste.');

// since 1.0.6
define('_ACA_NOTIFICATION', 'Notification');  // shortcut for Courriel notification
define('_ACA_NOTIFICATIONS', 'Notifications');
define('_ACA_USE_SEF', 'SEF dans les envois');
define('_ACA_USE_SEF_TIPS', 'Il est recommandé de choisir non. Cependant si vous voulez que l\'url incluse dans vos envois utilise le mode SEF choisissez Oui.' .
		' <br /><b>Les liens fonctionneront de la même manière pour l\'une ou l\'autre des options. Rien n\'assurera que les liens dans les envois fonctionneront toujours si vous changez votre SEF.</b> ');
define('_ACA_ERR_NB', 'Erreur N° : ERR');
define('_ACA_ERR_SETTINGS', 'Paramètres de gestion des erreurs');
define('_ACA_ERR_SEND', 'Envoyer un rapport d\'erreur');
define('_ACA_ERR_SEND_TIPS', 'Si vous voulez qu\'jNews s\'améliore, sélectionnez Oui. Cela nous enverra un rapport d\'erreur. Ainsi, vous même n\'avez plus besoin de rapporter les bugs  ;-) <br /> <b>AUCUNE INFORMATION PRIVEE N\'EST ENVOYEE</b>. Nous ne savons même pas de quel site Web l\'erreur provient. Nous envoyons seulement des informations sur jNews, l\'installation PHP et les requêtes SQL. ');
define('_ACA_ERR_SHOW_TIPS', 'Choississez Oui pour afficher le nombre d\'erreurs à l\'écran. Utilisé principalement à des fins de débogage. ');
define('_ACA_ERR_SHOW', 'Afficher erreurs');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Afficher les liens de désabonnement');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Sélectionner Oui pour afficher les liens de désabonnement en bas des courriels pour permettre aux utilisateurs de modifier leurs inscriptions. <br /> Non désactive le bas de page et les liens.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">IMPORTANT AVERTISSEMENT!</span> <br />Si vous mettez à jour votre précendente installation d\'jNews, vous avez besoin de mettre à jour votre structure de base de données en cliquant sur le bouton suivant (Vos données resteront en intégralité)');
define('_ACA_UPDATE_INSTALL_BTN', 'Mettre à jour les tables et la configuration');
define('_ACA_MAILING_MAX_TIME', 'Délai d\'attente maximum ');
define('_ACA_MAILING_MAX_TIME_TIPS', 'Définissez le temps maximum pour que chaque lot de courriels soit envoyé par la file d\'attente. valeur recommandée : entre 30 s et 2 mins.');

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', 'Integration à VirtueMart');
define('_ACA_VM_COUPON_NOTIF', 'Identifiant de notification du coupon');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Spécifiez le numéro d\'identifiant de la liste que vous voulez utiliser pour envoyer les coupons à vos clients.');
define('_ACA_VM_NEW_PRODUCT', 'Identifiant de notification de nouveaux produits');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Spécifiez le numéro d\'identifiant de la liste que vous voulez utiliser pour envoyer la notification de nouveaux produits.');


// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', 'Créer un formulaire');
define('_ACA_FORM_COPY', 'Code HTML');
define('_ACA_FORM_COPY_TIPS', 'Copiez le code HTML généré dans votre page HTML.');
define('_ACA_FORM_LIST_TIPS', 'Sélectionnez la liste que vous voulez inclure dans votre formulaire');
// update messages
define('_ACA_UPDATE_MESS4', 'Ceci ne peut pas être mis à jour automatiquement.');
define('_ACA_WARNG_REMOTE_FILE', 'Aucun moyen d\'obtenir le dossier à distance .');
define('_ACA_ERROR_FETCH', 'Erreur lors de la recherche du fichier.');

define('_ACA_CHECK', 'Vérifier');
define('_ACA_MORE_INFO', 'Plus d\'informations');
define('_ACA_UPDATE_NEW', 'Passer à la nouvelle version');
define('_ACA_UPGRADE', 'Passer à un produit avancé');
define('_ACA_DOWNDATE', 'Retour à la version précedente');
define('_ACA_DOWNGRADE', 'Retour au produit de base');
define('_ACA_REQUIRE_JOOM', 'Requiert Joomla');
define('_ACA_TRY_IT', 'Essayez le !');
define('_ACA_NEWER', 'Nouveau');
define('_ACA_OLDER', 'Ancien');
define('_ACA_CURRENT', 'Courant');

// since 1.0.9
define('_ACA_CHECK_COMP', 'Essayer un des autres composants');
define('_ACA_MENU_VIDEO', 'Tutoriels Vidéo');
define('_ACA_AUTO_SCHEDULE', 'Plannification');
define('_ACA_SCHEDULE_TITLE', 'Paramètres de la fonction de plannification automatique');
define('_ACA_ISSUE_NB_TIPS', 'Nombre de questions générées automatiquement par le système ');
define('_ACA_SEL_ALL', 'Tous les envoies');
define('_ACA_SEL_ALL_SUB', 'Toutes les listes');
define('_ACA_INTRO_ONLY_TIPS', 'Si vous cochez cette case, seule l\'introduction de votre article sera insérée dans vos envois avec un lien \'lire la suite\' vers l\'article entier sur votre site web.');
define('_ACA_TAGS_TITLE', 'Tag Contenu');
define('_ACA_TAGS_TITLE_TIPS', 'Copiez et collez ce tag dans vos envois à l\'endroit où vous voulez placer le contenu.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Indiquez l\'adresse courriel pour envoyer un courriel de test');
define('_ACA_PREVIEW_TITLE', 'Aperçu');
define('_ACA_AUTO_UPDATE', 'Notification de nouvelle mise à jour');
define('_ACA_AUTO_UPDATE_TIPS', 'Sélectionnez Oui si vous voulez être averti des nouvelles mises à jour pour votre composant. <br />IMPORTANT!! Afficher astuces doit être activé pour que cela fonctionne.');

// since 1.1.0
define('_ACA_LICENSE', 'Information sur la licence');


// since 1.1.1
define('_ACA_NEW', 'Nouveau');
define('_ACA_SCHEDULE_SETUP', 'Pour envoyer des réponses automatiques, vous avez besoin d\'installer le planificateur dans la configuration.');
define('_ACA_SCHEDULER', 'Programmateur');
define('_ACA_JNEWSLETTER_CRON_DESC', 'Si vous n\'avez pas accès au gestionnaire des tâches Cron de votre site internet, vous pouvez vous enregistrer à un compte libre d\'jNews Cron à :');
define('_ACA_CRON_DOCUMENTATION', 'Vous pouvez trouvez des informations supplémentaires sur l\'installation du planificateur d\'jNews à l\'adresse suivante :');
define('_ACA_CRON_DOC_URL', '<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>');
define( '_ACA_QUEUE_PROCESSED', 'File d\'attente traitée avec succès...');
define( '_ACA_ERROR_MOVING_UPLOAD', 'Erreur lors du déplacement du fichier importé');

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', 'Fréquence du planificateur');
define( '_ACA_CRON_MAX_FREQ', 'Fréquence maximum du planificateur');
define( '_ACA_CRON_MAX_FREQ_TIPS', 'Spécifier la fréquence maximale à laquelle le planificateur peut fonctionner (en minutes). Cela va limiter le planificateur même si la tâche cron est plus fréquente.');
define( '_ACA_CRON_MAX_EMAIL', 'Courriels maximum par tâche');
define( '_ACA_CRON_MAX_EMAIL_TIPS', 'Spécifier le nombre maximum de courriels envoyés par tâche (0 illimité).');
define( '_ACA_CRON_MINUTES', ' minutes');
define( '_ACA_SHOW_SIGNATURE', 'Montrer le pied de page du courriel');
define( '_ACA_SHOW_SIGNATURE_TIPS', 'Si vous voulez ou non promouvoir jNews dans le pied de page de vos courriels.');
define( '_ACA_QUEUE_AUTO_PROCESSED', 'Réponses automatiques traitées avec succès...');
define( '_ACA_QUEUE_NEWS_PROCESSED', 'Infolettres programmées traitées avec succès...');
define( '_ACA_MENU_SYNC_USERS', 'Synchronisation des utilisateurs');
define( '_ACA_SYNC_USERS_SUCCESS', 'Synchronisation des utilisateurs réussie!');

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Déconnexion');
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Oui');
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Non');
if (!defined('_HI')) define( '_HI', 'Bonjour');
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Haut');
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Bas');
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Déconnexion');

// For include title only or full article in content item tab in infolettre edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', 'Si vous sélectionnez ceci, seul le titre de l\'article sera inséré dans l\'envoi comme lien vers l\'article entier situé sur votre site.');
define('_ACA_TITLE_ONLY', 'Titre seul');
define('_ACA_FULL_ARTICLE_TIPS', 'Si vous sélectionnez ceci l\'article entier sera inséré dans votre envoi');
define('_ACA_FULL_ARTICLE', 'Article entier');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Sélectionnez un article à insérer dans votre message. <br />Copiez et collez le <b>tag de contenu</b> dans votre Infolettre. Vous pouvez choisir d\'avoir le texte entier, une introduction seule ou le titre seul (0, 1 ou 2 respectivement). ');
define('_ACA_SUBSCRIBE_LIST2', 'Liste(s) d\'envois');

// smart-infolettre function
define('_ACA_AUTONEWS', 'Smart-Infolettre');
define('_ACA_MENU_AUTONEWS', 'Smart-Infolettres');
define('_ACA_AUTO_NEWS_OPTION', 'Options Smart-Infolettre');
define('_ACA_AUTONEWS_FREQ', 'Fréquence des Infolettres');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Spécifiez la fréquence à laquelle vous voulez envoyer les smart-infolettre.');
define('_ACA_AUTONEWS_SECTION', 'Section Article');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Spécifiez la section à partir de laquelle vous voulez choisir les articles.');
define('_ACA_AUTONEWS_CAT', 'Catégorie Article');
define('_ACA_AUTONEWS_CAT_TIPS', 'Spécifiez la catégorie à partir de laquelle vous voulez choisir les articles (Toutes pour tous les articles de la section).');
define('_ACA_SELECT_SECTION', 'Sélectionner une section');
define('_ACA_SELECT_CAT', 'Toutes les categories');
define('_ACA_AUTO_DAY_CH8', 'Trimestriel');
define('_ACA_AUTONEWS_STARTDATE', 'Date de début');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Spécifiez la date à laquelle vous souhaitez débuter les envois de Smart Infolettre.');
define('_ACA_AUTONEWS_TYPE', 'Rendu du contenu');// how we see the content which is included in the infolettre
define('_ACA_AUTONEWS_TYPE_TIPS', 'Article Entier: inclura l\'article entier dans la infolettre.<br />' .
		'Intro seulement: inclura seulement l\'introduction de l\'article dans la infolettre.<br/>' .
		'Titre seulement: inclura seulement le titre de l\'article dans la infolettre.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Ceci sera remplacé par la Smart-infolettre.');

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Créer / Voir les envois');
define('_ACA_LICENSE_CONFIG', 'Licence');
define('_ACA_ENTER_LICENSE', 'Enter licence');
define('_ACA_ENTER_LICENSE_TIPS', 'Entrez votre numéro de licence et sauvegardez-le.');
define('_ACA_LICENSE_SETTING', 'Paramètres licence');
define('_ACA_GOOD_LIC', 'Votre licence est valide.');
define('_ACA_NOTSO_GOOD_LIC', 'Votre licence n\'est pas valable: ');
define('_ACA_PLEASE_LIC', 'Merci de contacter l\'assistance jNews pour mettre votre licence à jour (license@ijoobi.com ).');

define('_ACA_DESC_PLUS', 'jNews Plus is the first sequencial auto-responders for Joomla CMS.  ' . _ACA_FEATURES);
define('_ACA_DESC_PRO', 'jNews PRO the ultimate envoie system for Joomla CMS.  ' . _ACA_FEATURES);

//since 1.1.4
define('_ACA_ENTER_TOKEN', 'Enter token');
define('_ACA_ENTER_TOKEN_TIPS', 'Please enter your token number you received by courriel when you purchased jNews. ');
define('_ACA_JNEWSLETTER_SITE', 'jNews site:');
define('_ACA_MY_SITE', 'My site:');
define( '_ACA_LICENSE_FORM', ' ' .
 		'Click here to go to the license form.</a>');
define('_ACA_PLEASE_CLEAR_LICENSE', 'Please clear the license field so it is empty and try again.<br />  If the problem persists, ');
define( '_ACA_LICENSE_SUPPORT', 'If you still have questions, ' . _ACA_PLEASE_LIC);
define( '_ACA_LICENSE_TWO', 'you can get your license manual by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT);
define('_ACA_ENTER_TOKEN_PATIENCE', 'After saving your token a license will be generated automatically. ' .
		' Usually the token is validated in 2 minutes.  However, in some cases it can take up to 15 minutes.<br />' .
		'<br />Check back this control panel in few minutes.  <br /><br />' .
						     'If you didn\'t receive a valid license key in 15 minutes, '. _ACA_LICENSE_TWO);
define( '_ACA_ENTER_NOT_YET', 'Your token has not yet been validated.');
define( '_ACA_UPDATE_CLICK_HERE', 'Pleae visit <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> to download the newest version.');
define( '_ACA_NOTIF_UPDATE', 'To be notified of new updates enter your courriel address and click subscribe ');

define('_ACA_THINK_PLUS', 'If you want more out of your envoie system think Plus!');
define('_ACA_THINK_PLUS_1', 'Sequential auto-responders');
define('_ACA_THINK_PLUS_2', 'Schedule the delivery of your infolettre for a predefined date');
define('_ACA_THINK_PLUS_3', 'No more server limitation');
define('_ACA_THINK_PLUS_4', 'and much more...');


//since 1.2.2
define( '_ACA_LIST_ACCESS', 'Accès liste');
define( '_ACA_INFO_LIST_ACCESS', 'Indiquez quel groupe d\'utilisateurs peut voir et s\'inscrire à cette liste');
define( 'ACA_NO_LIST_PERM', 'Vous n\'avez pas une permission suffisante pour vous inscrire à cette liste');

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', 'Archivage');
 define('_ACA_MENU_ARCHIVE_ALL', 'Archiver tout');

//Archive Lists
 define('_FREQ_OPT_0', 'Aucune');
 define('_FREQ_OPT_1', 'Hebdomadaire');
 define('_FREQ_OPT_2', 'Toutes les 2 semaines');
 define('_FREQ_OPT_3', 'Mensuel');
 define('_FREQ_OPT_4', 'Trimestriel');
 define('_FREQ_OPT_5', 'Annuel');
 define('_FREQ_OPT_6', 'Autre');

define('_DATE_OPT_1', 'Date de création');
define('_DATE_OPT_2', 'Date de modification');

define('_ACA_ARCHIVE_TITLE', 'Définition de la fréquence d\'auto-archivage');
define('_ACA_FREQ_TITLE', 'Fréquence');
define('_ACA_FREQ_TOOL', 'Définit à quelle fréquence vous souhaitez que l\'Archive Manager archive le contenu de votre site web.');
define('_ACA_NB_DAYS', 'Nombre de jours');
define('_ACA_NB_DAYS_TOOL', 'Ceci est valable uniquement pour le choix \'Autre\' ! Merci de préciser le nombre de jours entre chaque archivage.');
define('_ACA_DATE_TITLE', 'Type date');
define('_ACA_DATE_TOOL', 'Define if the archived should be done on the created date or modified date.');

define('_ACA_MAINTENANCE_TAB', 'Maintenance settings');
define('_ACA_MAINTENANCE_FREQ', 'Maintenance frequency');
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Specify the frequency at which you want the maintenance routine to run.');
define( '_ACA_CRON_DAYS', 'hour(s)');

define( '_ACA_LIST_NOT_AVAIL', 'There is no list available.');
define( '_ACA_LIST_ADD_TAB', 'Add/Edit');

define( '_ACA_LIST_ACCESS_EDIT', 'Ajouter/Editer un emailing');
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Indiquez quel groupe d\'utilisateurs peut ajouter ou modifier un nouvel envoi pour cette liste');
define( '_ACA_MAILING_NEW_FRONT', 'Créer un nouvel emailing');

define('_ACA_AUTO_ARCHIVE', 'Auto-Archive');
define('_ACA_MENU_ARCHIVE', 'Auto-Archive');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = Cela sera remplacé par le numéro de l\'infolettre.');
define('_ACA_TAGS_DATE', '[DATE] = Cela sera remplacé par la date d\'envoi.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = Cela sera remplacé par la valeur récupérée depuis le champ Community Builder : p.ex. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Joobi Care');


define('_ACA_THINK_PRO', 'When you have professional needs, you use professional components!');
define('_ACA_THINK_PRO_1', 'Smart-Infolettres');
define('_ACA_THINK_PRO_2', 'Define access level for your list');
define('_ACA_THINK_PRO_3', 'Define who can edit/add envoies');
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


define( '_ACA_MAIL_ENCODING', 'Format d\'encodage');
define( '_ACA_MAIL_ENCODING_TIPS', 'Choisir le mode d\'encodage');

define( '_ACA_MAIL_FORMAT', 'Format d\'encodage');
define( '_ACA_MAIL_FORMAT_TIPS', 'Quel format d\'encodage voulez-vous utiliser pour vos envois, Texte seul ou MIME');
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'Si vous n\'avez pas accès à un gestionnaire cron sur votre site, vous pouvez utiliser le composant GRATUIT jCron.');


//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Afficher l\'auteur de l\'article');
define('_ACA_SHOW_AUTHOR_TIPS', 'Cliquez sur Oui si vous voulez ajouter le nom de l\'auteur des articles insérés dans les Envois');

//since 1.3.5
define('_ACA_REGWARN_NAME', 'Saisissez votre nom.');
define('_ACA_REGWARN_MAIL', 'Saisissez une adresse courriel valide.');

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', 'If you select Yes, the courriel of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be usefull if you want to execute a special script in your redirect page.');
define('_ACA_ADDEMAILREDLINK', 'Add courriel to the redirect link');

//since 1.6.3
define('_ACA_ITEMID', 'ItemId');
define('_ACA_ITEMID_TIPS', 'Cet Itemid va être ajouté aux liens d\'jNews');

//since 1.6.5
define('_ACA_SHOW_JCALPRO', 'jCalPRO');
define('_ACA_SHOW_JCALPRO_TIPS', 'Afficher le tab pour ajouter des évènements du composant jCalPro <br/>(uniquement si jcalPro est installé sur votre site!)');
define('_ACA_JCALTAGS_TITLE', 'jCalPRO Tag:');
define('_ACA_JCALTAGS_TITLE_TIPS', 'Copier/coller ce tag dans votre Infolettre et il sera remplacé par l\'évènement sélectionné');
define('_ACA_JCALTAGS_DESC', 'Description :');
define('_ACA_JCALTAGS_DESC_TIPS', 'Sélectionnez OUI si vous voulez que la description de l\'évènement soit ajoutée');
define('_ACA_JCALTAGS_START', 'Date de début:');
define('_ACA_JCALTAGS_START_TIPS', 'Sélectionnez OUI si vous voulez que la date de début de l\'évènement soit ajoutée');
define('_ACA_JCALTAGS_READMORE', 'Lire la suite:');
define('_ACA_JCALTAGS_READMORE_TIPS', 'Sélectionnez OUI si vous voulez qu\'un lien pour lire la suite de de l\'évènement soit ajouté');
define('_ACA_REDIRECTCONFIRMATION', 'URL de redirection');
define('_ACA_REDIRECTCONFIRMATION_TIPS', 'Si vous avez besoin de courriel de confirmation, l\'utilisateur sera confirmé et redirigé vers cette URL s\'il clique sur le lien de confirmation.');

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Enregistrer');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Pas encore de compte&nbsp;?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Enregistrez-vous');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','Vous n\'êtes pas autorisé à voir cette ressource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP', 'Désactiver les infobulles');
define('_ACA_DISABLETOOLTIP_TIPS', 'Désactive les infobulles sur le frontend');
define('_ACA_MINISENDMAIL', 'Utiliser Mini SendMail');
define('_ACA_MINISENDMAIL_TIPS', 'Si votre serveur utilise Mini SendMail, choisissez cette option pour ne pas ajouter le nom de l\utilisateur dans l\entête de ce courriel');

//Since 3.1.5
define('_ACA_READMORE','Lire la suite...');
define('_ACA_VIEWARCHIVE','Cliquez ici');

//jNews GPL
define('_ACA_DESC_GPL',_ACA_DESC_NEWS);

//since 4.0.0
define('_ACA_SHOW_JLINKS','Link Tracking');
define('_ACA_SHOW_JLINKS_TIPS','Enables the integration with jLinks to be able to do link tracking for each links in the newsletter.');

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