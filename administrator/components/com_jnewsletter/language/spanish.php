<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');

/**
* <p>Spanish language file</p>
* @author Jorge Pasco <servicio@eaid.org>
* @version $Id: spanish.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.eaid.org
*/

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', ('jNews es una herramienta para confeccionar listas de correo, boletines, auto-respuestas y seguimientos; que podrá utilizar para comunicarse con sus clientes y usuarios de manera efectiva.  ' .
		'¡jNews, su asistente de comunicaciones!'));
define('_ACA_DESC_GPL', ('jNews es una herramienta para confeccionar listas de correo, boletines, auto-respuestas y seguimientos; que podrá utilizar para comunicarse con sus clientes y usuarios de manera efectiva.  ' .
		'¡jNews, su asistente de comunicaciones!'));
define('_ACA_FEATURES', ('¡jNews, su asistente de comunicaciones!'));

// Type of lists
define('_ACA_NEWSLETTER', ('Boletín'));
define('_ACA_AUTORESP', ('Auto-respuesta'));
define('_ACA_AUTORSS', ('Auto-RSS'));
define('_ACA_ECARD', ('Tarjeta electrónica'));
define('_ACA_POSTCARD', ('Postal'));
define('_ACA_PERF', ('Performance'));
define('_ACA_COUPON', ('Cupón'));
define('_ACA_CRON', ('Tarea Cron'));
define('_ACA_MAILING', ('Envío'));
define('_ACA_LIST', ('Lista'));

 //jnewsletter Menu
define('_ACA_MENU_LIST', ('Listas'));
define('_ACA_MENU_SUBSCRIBERS', ('Suscriptores'));
define('_ACA_MENU_NEWSLETTERS', ('Boletines'));
define('_ACA_MENU_AUTOS', ('Auto-respuestas'));
define('_ACA_MENU_COUPONS', ('Cupones'));
define('_ACA_MENU_CRONS', ('Tareas Cron'));
define('_ACA_MENU_AUTORSS', ('Auto-RSS'));
define('_ACA_MENU_ECARD', ('Tarjetas electrónicass'));
define('_ACA_MENU_POSTCARDS', ('Postales'));
define('_ACA_MENU_PERFS', ('Performances'));
define('_ACA_MENU_TAB_LIST', ('Listas'));
define('_ACA_MENU_MAILING_TITLE', ('Envíos'));
define('_ACA_MENU_MAILING', ('Envíos para '));
define('_ACA_MENU_STATS', ('Estadísticas'));
define('_ACA_MENU_STATS_FOR', ('Estadísticas para '));
define('_ACA_MENU_CONF', ('Configuración'));
define('_ACA_MENU_UPDATE', ('Import'));
define('_ACA_MENU_ABOUT', ('Acerca de'));
define('_ACA_MENU_LEARN', ('Centro de aprendizaje'));
define('_ACA_MENU_MEDIA', ('Gestor multimedia'));
define('_ACA_MENU_HELP', ('Ayuda'));
define('_ACA_MENU_CPANEL', ('Panel de control'));
define('_ACA_MENU_IMPORT', ('Importar'));
define('_ACA_MENU_EXPORT', ('Exportar'));
define('_ACA_MENU_SUB_ALL', ('Subcribirse a todo'));
define('_ACA_MENU_UNSUB_ALL', ('De-subcribirse a todo'));
define('_ACA_MENU_VIEW_ARCHIVE', ('Archivo'));
define('_ACA_MENU_PREVIEW', ('Vista previa'));
define('_ACA_MENU_SEND', ('Enviar'));
define('_ACA_MENU_SEND_TEST', ('Enviar correo de prueba'));
define('_ACA_MENU_SEND_QUEUE', ('Cola de procesos'));
define('_ACA_MENU_VIEW', ('Ver'));
define('_ACA_MENU_COPY', ('Copiar'));
define('_ACA_MENU_VIEW_STATS', ('Ver estadísticas'));
define('_ACA_MENU_CRTL_PANEL', ('Panel de control'));
define('_ACA_MENU_LIST_NEW', (' Crear una lista'));
define('_ACA_MENU_LIST_EDIT', (' Editar una lista'));
define('_ACA_MENU_BACK', ('Regresar'));
define('_ACA_MENU_INSTALL', ('Instalación'));
define('_ACA_MENU_TAB_SUM', ('Resumen'));
define('_ACA_STATUS', ('Estado'));

// messages
define('_ACA_ERROR', (' ¡Ha ocurrido un error! '));
define('_ACA_SUB_ACCESS', ('Derechos de acceso'));
define('_ACA_DESC_CREDITS', ('Créditos'));
define('_ACA_DESC_INFO', ('Información'));
define('_ACA_DESC_HOME', ('Página de inicio'));
define('_ACA_DESC_MAILING', ('Lista de envíos'));
define('_ACA_DESC_SUBSCRIBERS', ('Suscriptores'));
define('_ACA_PUBLISHED', ('Publicado'));
define('_ACA_UNPUBLISHED', ('No Publicado'));
define('_ACA_DELETE', ('Eliminar'));
define('_ACA_FILTER', ('Filtrar'));
define('_ACA_UPDATE', ('Actualizar'));
define('_ACA_SAVE', ('Guardar'));
define('_ACA_CANCEL', ('Cancelar'));
define('_ACA_NAME', ('Nombre'));
define('_ACA_EMAIL', ('Correo'));
define('_ACA_SELECT', ('Seleccionar'));
define('_ACA_ALL', ('todo'));
define('_ACA_SEND_A', ('Enviar a '));
define('_ACA_SUCCESS_DELETED', (' eliminado con éxito'));
define('_ACA_LIST_ADDED', ('Lista creada con éxito'));
define('_ACA_LIST_COPY', ('Lista copiada con éxito'));
define('_ACA_LIST_UPDATED', ('Lista actualizada con éxito'));
define('_ACA_MAILING_SAVED', ('Envío guardado con éxito.'));
define('_ACA_UPDATED_SUCCESSFULLY', ('Actualizado con éxito.'));

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', ('Información del suscriptor'));
define('_ACA_VERIFY_INFO', ('Por favor verifique el enlace que envió, alguna información no es correcta o se ha perdido.'));
define('_ACA_INPUT_NAME', ('Nombre'));
define('_ACA_INPUT_EMAIL', ('Correo'));
define('_ACA_RECEIVE_HTML', ('¿Acepta HTML?'));
define('_ACA_TIME_ZONE', ('Zona horaria'));
define('_ACA_BLACK_LIST', ('Lista negra'));
define('_ACA_REGISTRATION_DATE', ('Fecha de registro de usuario'));
define('_ACA_USER_ID', ('Id de usuario'));
define('_ACA_DESCRIPTION', ('Descripción'));
define('_ACA_ACCOUNT_CONFIRMED', ('Su cuenta ha sido activada.'));
define('_ACA_SUB_SUBSCRIBER', ('Suscriptor'));
define('_ACA_SUB_PUBLISHER', ('Editor'));
define('_ACA_SUB_ADMIN', ('Administrador'));
define('_ACA_REGISTERED', ('Registrado'));
define('_ACA_SUBSCRIPTIONS', ('Vuestra suscripción'));
define('_ACA_SEND_UNSUBCRIBE', ('Enviar mensaje para de-suscribirse'));
define('_ACA_SEND_UNSUBCRIBE_TIPS', ('Seleccione SI para enviar un correo de confirmación a fin de de-suscribirse.'));
define('_ACA_SUBSCRIBE_SUBJECT_MESS', ('Por favor confirme su suscripción'));
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', ('Confirmación de de-suscripción'));
define('_ACA_DEFAULT_SUBSCRIBE_MESS', ('Saludos [NAME],<br />' .
		'Falta un paso más para confirmar su suscripción en la lista.  Por favor acceda al siguiente enlace a fin de confirmar su suscripción.' .
		'<br /><br />[CONFIRM]<br /><br />Para cualquier consulta contáctese con el administrador.'));
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', ('Este es un mensaje que confirma su de-suscripción de nuestra lista.  Sentimos mucho que haya decidido cancelar su suscripción, sin embargo si decide reaanudarla puede hacerlo en nuestro portal web. Si tuviese alguna consulta puede contactar al administrador.'));

// jNews Subscribers
define('_ACA_SIGNUP_DATE', ('Fecha de registro'));
define('_ACA_CONFIRMED', ('Confirmado'));
define('_ACA_SUBSCRIB', ('Suscrito'));
define('_ACA_HTML', ('Correo HTML'));
define('_ACA_RESULTS', ('Resultados'));
define('_ACA_SEL_LIST', ('Seleccione una lista'));
define('_ACA_SEL_LIST_TYPE', ('- Seleccione el tipo de lista -'));
define('_ACA_SUSCRIB_LIST', ('Lista de todos los suscriptores'));
define('_ACA_SUSCRIB_LIST_UNIQUE', ('Suscriptores para: '));
define('_ACA_NO_SUSCRIBERS', ('No se encontraron suscriptores para estas listas.'));
define('_ACA_COMFIRM_SUBSCRIPTION', ('Un mensaje de confirmación le ha sido enviado.  Por favor revise su correo y seleccione el enlace provisto.<br />' .
		'Necesita confirmar su correo para que su suscripción sea iniciada.'));
define('_ACA_SUCCESS_ADD_LIST', ('Usted ha sido añadido exitósamente a la lista.'));


 // Subscription info
define('_ACA_CONFIRM_LINK', ('Acceda aquí para confirmar la suscripción'));
define('_ACA_UNSUBSCRIBE_LINK', ('Acceda aquí para cancelar manualmente la suscripción a la lista'));
define('_ACA_UNSUBSCRIBE_MESS', ('Su correo ha sido removido de la lista'));

define('_ACA_QUEUE_SENT_SUCCESS', ('Todos los mensajes pendientes han sido enviados con éxito.'));
define('_ACA_MALING_VIEW', ('Ver todos los envíos'));
define('_ACA_UNSUBSCRIBE_MESSAGE', ('¿Está seguro que desea cancelar su suscripción de esta lista?'));
define('_ACA_MOD_SUBSCRIBE', ('Suscribirse'));
define('_ACA_SUBSCRIBE', ('Suscribirse'));
define('_ACA_UNSUBSCRIBE', ('De-suscribirse'));
define('_ACA_VIEW_ARCHIVE', ('Ver archivo'));
define('_ACA_SUBSCRIPTION_OR', (' o acceda aquí para actualizar su información'));
define('_ACA_EMAIL_ALREADY_REGISTERED', ('Este correo ha sido registrado previamente.'));
define('_ACA_SUBSCRIBER_DELETED', ('Suscriptor eliminado con éxito.'));


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', ('Panel de control del usuario'));
define('_UCP_USER_MENU', ('Menú del usuario'));
define('_UCP_USER_CONTACT', ('Mis suscripciones'));
 //jNews Cron Menu
define('_UCP_CRON_MENU', ('Administración de tareas Cron'));
define('_UCP_CRON_NEW_MENU', ('Nueva tarea Cron'));
define('_UCP_CRON_LIST_MENU', ('Lista de mis tareas Cron'));
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', ('Administración de cupones'));
define('_UCP_COUPON_LIST_MENU', ('Lista de cupones'));
define('_UCP_COUPON_ADD_MENU', ('Añadir un cupón'));

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', ('Descripción'));
define('_ACA_LIST_T_LAYOUT', ('Formato'));
define('_ACA_LIST_T_SUBSCRIPTION', ('Suscripción'));
define('_ACA_LIST_T_SENDER', ('Información de remitente'));

define('_ACA_LIST_TYPE', ('Tipo de lista'));
define('_ACA_LIST_NAME', ('Nombre de lista'));
define('_ACA_LIST_ISSUE', ('Edición #'));
define('_ACA_LIST_DATE', ('Fecha de envío'));
define('_ACA_LIST_SUB', ('Asunto'));
define('_ACA_ATTACHED_FILES', ('Archivos adjuntos'));
define('_ACA_SELECT_LIST', ('¡Por favor seleccione una lista para editar!'));

// Auto Responder box
define('_ACA_AUTORESP_ON', ('Tipo de lista'));
define('_ACA_AUTO_RESP_OPTION', ('Opciones de Auto-respuesta'));
define('_ACA_AUTO_RESP_FREQ', ('Los suscriptores pueden elegir la frecuencia'));
define('_ACA_AUTO_DELAY', ('Retardo (en días)'));
define('_ACA_AUTO_DAY_MIN', ('Frecuencia mínima'));
define('_ACA_AUTO_DAY_MAX', ('Frecuencia máxima'));
define('_ACA_FOLLOW_UP', ('Especificar seguimiento de auto-respuesta'));
define('_ACA_AUTO_RESP_TIME', ('Suscriptores pueden elegir el tiempo'));
define('_ACA_LIST_SENDER', ('Remitentes de lista'));

define('_ACA_LIST_DESC', ('Descripción de lista'));
define('_ACA_LAYOUT', ('Formato'));
define('_ACA_SENDER_NAME', ('Nombre de remitente'));
define('_ACA_SENDER_EMAIL', ('Correo de remitente'));
define('_ACA_SENDER_BOUNCE', ('Dirección de respuesta de remitente'));
define('_ACA_LIST_DELAY', ('Retardo'));
define('_ACA_HTML_MAILING', ('¿Envío en HTML?'));
define('_ACA_HTML_MAILING_DESC', ('(si efectúa algún cambio deberá guardarlo y retornar a esta pantalla para poder observar el efecto.)'));
define('_ACA_HIDE_FROM_FRONTEND', ('¿Esconder en el portal web?'));
define('_ACA_SELECT_IMPORT_FILE', ('Seleccione un archivo para importar'));;
define('_ACA_IMPORT_FINISHED', ('Importación finalizada'));
define('_ACA_DELETION_OFFILE', ('Eliminación de fichero'));
define('_ACA_MANUALLY_DELETE', (' falló, usted deberá eliminar el fichero manualmente'));
define('_ACA_CANNOT_WRITE_DIR', ('no se puede escribir en el directorio'));
define('_ACA_NOT_PUBLISHED', ('no puede remitirse el envío, la lista no se ha publicado.'));

//  List info box
define('_ACA_INFO_LIST_PUB', ('Seleccione SI para publicar la lista'));
define('_ACA_INFO_LIST_NAME', ('Ingrese el nombre de su lista. Usted puede identificar su lista mediante este nombre.'));
define('_ACA_INFO_LIST_DESC', ('Ingrese una breve descripción de su lista. Esta descripción será visible por los visitantes de su portal.'));
define('_ACA_INFO_LIST_SENDER_NAME', ('Ingrese el nombre del remitente del envío. Este nombre será visible cuando los suscriptores reciban mensajes de esta lista.'));
define('_ACA_INFO_LIST_SENDER_EMAIL', ('Ingrese el correo electrónico del cual serán enviados los mensajes.'));
define('_ACA_INFO_LIST_SENDER_BOUNCED', ('Ingrese el correo electrónico al cual podrán responder los suscriptores. Es áltamente recomendable que sea el mismo del cual ha sido enviado el mensaje puesto que los filtros de spam pueden considerarlo como riesgoso si encuentran diferencias.'));
define('_ACA_INFO_LIST_AUTORESP', ('Escoja el tipo de envío para esta lista. <br />' .
		'Boletín: boletín normal<br />' .
		'Auto-respuesta: una auto-respuesta es una lista que es enviada automáticamente mediante el portal web a intervalos regulares.'));
define('_ACA_INFO_LIST_FREQUENCY', ('Permitir a los usuarios seleccionar la frecuencia con la cual recibirán la lista.  Esto les provee flexibilidad de operación.'));
define('_ACA_INFO_LIST_TIME', ('Permita que el usuario escoja el momento del día en el cual recibirá la lista.'));
define('_ACA_INFO_LIST_MIN_DAY', ('Defina cual es la frecuencia mínima que el usuario podrá escoger para recibir la lista'));
define('_ACA_INFO_LIST_DELAY', ('Defina cual es el retardo entre esta auto-respuesta y la anterior.'));
define('_ACA_INFO_LIST_DATE', ('Especifique la fecha para publicar las nuevas listas si quiere retardar la publicación. <br /> FORMATO : YYYY-MM-DD HH:MM:SS'));
define('_ACA_INFO_LIST_MAX_DAY', ('Defina cual es la frecuencia máxima que el usuario podrá escoger para recibir la lista'));
define('_ACA_INFO_LIST_LAYOUT', ('Ingrese el diseño de sus envíos. Puede ingresar cualquier diseño para sus correos.'));
define('_ACA_INFO_LIST_SUB_MESS', ('Este mensaje será enviado al suscriptor cuando el o ella se registren por primera vez. Puede definir el texto que desee aquí.'));
define('_ACA_INFO_LIST_UNSUB_MESS', ('Este mensaje será enviado al suscriptor cuando el o ella se de-suscriba. Puede ingresar cualquier mensaje aquí.'));
define('_ACA_INFO_LIST_HTML', ('Seleccione la casilla de verificación si quiere enviar correos en formato HTML. Los suscriptores pueden especificar si desean recibir mensajes en formato HTML o en texto llano cuando se suscriben a una lista HTML.'));
define('_ACA_INFO_LIST_HIDDEN', ('Elija SI para esconder la lista en el portal web, los usuarios no serán capaces de suscribirse pero usted podrá seguir enviando listas a los que ya se han registrado.'));
define('_ACA_INFO_LIST_ACA_AUTO_SUB', ('¿Quiere suscribir usuarios automáticamente a esta lista?<br /><B>Nuevos usuarios:</B> serán registrados todos los nuevos usuarios que se registren a través del portal web.<br /><B>Todos los usuarios:</B> serán registrados todos los usuarios de la base de datos.<br />(todas estas opciones soportan Community Builder)'));
define('_ACA_INFO_LIST_ACC_LEVEL', ('Seleccione el nivel de acceso del portal web. Esto podrá mostrar u ocultar los envíos a los grupos de usuarios que no tengan acceso a ella, por tanto no tendrán la opción de suscribirse.'));
define('_ACA_INFO_LIST_ACC_USER_ID', ('Seleccione el nivel de acceso de los grupos de usuarios a los cuales permitirá la edición. Ese grupo y los inmediatamente superiores tendrán la posibilidad de editar los envíos y remitirlos tanto desde el portal web como desde el panel administrativo.'));
define('_ACA_INFO_LIST_FOLLOW_UP', ('Puede especificar el seguimiento  de la auto-respuesta si usted desea que sea movida a otra una vez que alcance el último mensaje.'));
define('_ACA_INFO_LIST_ACA_OWNER', ('Esta es la identificación de la persona que creó la lista.'));
define('_ACA_INFO_LIST_WARNING', ('   Esta última opción estará disponible sólo al momento de la creación de la lista.'));
define('_ACA_INFO_LIST_SUBJET', (' Asunto del envío.  Este es el asunto que mostrará el mensaje que el suscriptor reciba.'));
define('_ACA_INFO_MAILING_CONTENT', ('Este es el cuerpo del mensaje que usted quiere enviar.'));
define('_ACA_INFO_MAILING_NOHTML', ('Ingrese el cuerpo del mensaje que usted desea enviar a los suscriptores que escogieron secibir sólo mensajes en texto llano. <BR/> NOTE: Si lo deja en blanco jNews convertirá automáticamente el HTML a texto llano.'));
define('_ACA_INFO_MAILING_VISIBLE', ('Seleccione SI para mostrar el mensaje en el portal web.'));
define('_ACA_INSERT_CONTENT', ('Inserte un contenido existente'));

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', ('¡Cupón enviado con éxito!'));
define('_ACA_CHOOSE_COUPON', ('Seleccione un cupón'));
define('_ACA_TO_USER', (' para este usuario'));

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', ('Cada hora'));
define('_ACA_FREQ_CH2', ('Cada 6 horas'));
define('_ACA_FREQ_CH3', ('Cada 12 horas'));
define('_ACA_FREQ_CH4', ('Diario'));
define('_ACA_FREQ_CH5', ('Semanal'));
define('_ACA_FREQ_CH6', ('Mensual'));
define('_ACA_FREQ_NONE', ('No'));
define('_ACA_FREQ_NEW', ('Nuevos usuarios'));
define('_ACA_FREQ_ALL', ('Todos los usuarios'));

//Label CRON form
define('_ACA_LABEL_FREQ', ('¿Tarea Cron de jNews?'));
define('_ACA_LABEL_FREQ_TIPS', ('Seleccione SI en el caso que desee usar esto para una tarea Cron de jNews, NO para cualquier otra tarea Cron.<br />' .
		'Si escoge SI no necesita especificar la dirección de la tarea Cron puesto que será añadida automaticamente.'));
define('_ACA_SITE_URL', ('Su dirección URL'));
define('_ACA_CRON_FREQUENCY', ('Frecuencia de tarea Cron'));
define('_ACA_STARTDATE_FREQ', ('Fecha de inicio'));
define('_ACA_LABELDATE_FREQ', ('Especifique fecha'));
define('_ACA_LABELTIME_FREQ', ('Especifique hora'));
define('_ACA_CRON_URL', ('Dirección URL de tarea Cron'));
define('_ACA_CRON_FREQ', ('Frecuencia'));
define('_ACA_TITLE_CRONLIST', ('Lista de tareas Cron'));
define('_NEW_LIST', ('Cree una nueva lista'));

//title CRON form
define('_ACA_TITLE_FREQ', ('Editar tareas Cron'));
define('_ACA_CRON_SITE_URL', ('Por favor ingrese una URL válida que empiece con http://'));

### Mailings ###
define('_ACA_MAILING_ALL', ('Todos los envíos'));
define('_ACA_EDIT_A', ('Editar un '));
define('_ACA_SELCT_MAILING', ('Por favor seleccione una lista del menú desplegable a fin de añadir un nuevo envío.'));
define('_ACA_VISIBLE_FRONT', ('Visible en el portal web'));

// mailer
define('_ACA_SUBJECT', ('Asunto'));
define('_ACA_CONTENT', ('Contenido'));
define('_ACA_NAMEREP', ('[NAME] = Este campo será reemplazado por el nombre que el suscriptor haya ingresado al registrarse, con ello podrá personalizar sus mensajes.<br />'));
define('_ACA_FIRST_NAME_REP', ('[FIRSTNAME] = Este campo será reemplazado por el primer nombre del suscriptor.<br />'));
define('_ACA_NONHTML', ('Version en texto llano'));
define('_ACA_ATTACHMENTS', ('Archivos adjuntos'));
define('_ACA_SELECT_MULTIPLE', ('Mantenga presionado CTRL (o command) para seleccionar múltiples archivos adjuntos.<br />' .
		'Los ficheros mostrados en este grupo están localizados en la carpeta de archivos adjuntos, usted puede cambiar la ubicación en el panel de control.'));
define('_ACA_CONTENT_ITEM', ('Artículos con contenido'));
define('_ACA_SENDING_EMAIL', ('Enviando correo'));
define('_ACA_MESSAGE_NOT', ('El mensaje no pudo ser enviado'));
define('_ACA_MAILER_ERROR', ('Error del proceso de correo'));
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', ('Mensaje enviado con éxito'));
define('_ACA_SENDING_TOOK', ('Enviar este mensaje tomará'));
define('_ACA_SECONDS', ('segundos'));
define('_ACA_NO_ADDRESS_ENTERED', ('No se ha especificado dirección de correo o suscriptor'));
define('_ACA_CHANGE_SUBSCRIPTIONS', ('Cambiar'));
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', ('Cambiar la suscripción'));
define('_ACA_WHICH_EMAIL_TEST', ('Indique una dirección de correo donde enviar un mensaje de prueba para comprobar la visualización'));
define('_ACA_SEND_IN_HTML', ('¿Enviar con formato HTML (para listas html)?'));
define('_ACA_VISIBLE', ('Visible'));
define('_ACA_INTRO_ONLY', ('Sólo introducción'));

// stats
define('_ACA_GLOBALSTATS', ('Estadísticas globales'));
define('_ACA_DETAILED_STATS', ('Estadísticas detalladas'));
define('_ACA_MAILING_LIST_DETAILS', ('Estadísticas de listas'));
define('_ACA_SEND_IN_HTML_FORMAT', ('Enviar con formato HTML'));
define('_ACA_VIEWS_FROM_HTML', ('Vistas (de correos html)'));
define('_ACA_SEND_IN_TEXT_FORMAT', ('Enviar como texto llano'));
define('_ACA_HTML_READ', ('leído HTML'));
define('_ACA_HTML_UNREAD', ('no leído HTML'));
define('_ACA_TEXT_ONLY_SENT', ('Texto llano'));

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', ('Correo'));
define('_ACA_LOGGING_CONFIG', ('Registro y estadísticas'));
define('_ACA_SUBSCRIBER_CONFIG', ('Suscriptores'));
define('_ACA_MISC_CONFIG', ('Otros'));
define('_ACA_MAIL_SETTINGS', ('Configuración de cuenta de correo'));
define('_ACA_MAILINGS_SETTINGS', ('Configuración de envíos'));
define('_ACA_SUBCRIBERS_SETTINGS', ('Configuración de suscriptores'));
define('_ACA_CRON_SETTINGS', ('Configuración de tareas Cron'));
define('_ACA_SENDING_SETTINGS', ('Configuración de despachos'));
define('_ACA_STATS_SETTINGS', ('Configuración de estadísticas'));
define('_ACA_LOGS_SETTINGS', ('Configuración de registros'));
define('_ACA_MISC_SETTINGS', ('Otras configuraciones'));
// mail settings
define('_ACA_SEND_MAIL_FROM', ('Correo de envío'));
define('_ACA_SEND_MAIL_NAME', ('Nombre de envío'));
define('_ACA_MAILSENDMETHOD', ('Método de correo'));
define('_ACA_SENDMAILPATH', ('Ruta de Sendmail'));
define('_ACA_SMTPHOST', ('Servidor SMTP'));
define('_ACA_SMTPAUTHREQUIRED', ('Autentificación requerida por SMTP'));
define('_ACA_SMTPAUTHREQUIRED_TIPS', ('Seleccione SI en el caso que su servidor SMTP requiera autentificación'));
define('_ACA_SMTPUSERNAME', ('Usuario SMTP'));
define('_ACA_SMTPUSERNAME_TIPS', ('Ingrese el nombre de usuario para el servidor SMTP'));
define('_ACA_SMTPPASSWORD', ('Contraseña SMTP'));
define('_ACA_SMTPPASSWORD_TIPS', ('Ingrese la contraseña para el servidor SMTP'));
define('_ACA_USE_EMBEDDED', ('Usar imágenes incluídas'));
define('_ACA_USE_EMBEDDED_TIPS', ('Seleccione SI en el caso que las imágenes adjuntas en los artículos con contenido deban ser incluídas en el correo con formato html. Seleccione NO para usar etiquetas de imágenes que las vincularán con una dirección de su sitio web.'));
define('_ACA_UPLOAD_PATH', ('Ruta de subida/archivos adjuntos'));
define('_ACA_UPLOAD_PATH_TIPS', ('Puede especificar un directorio para carga de archivos.<br />' .
		'Asegúrese que el directorio especificado exista de lo contrario créelo.'));

// Suscriptors settings
define('_ACA_ALLOW_UNREG', ('Permitir no registrados'));
define('_ACA_ALLOW_UNREG_TIPS', ('Seleccione SI en el caso que desee que sus usuarios se suscriban a las listas sin haberse registrado en su portal web.'));
define('_ACA_REQ_CONFIRM', ('Requerir confirmación'));
define('_ACA_REQ_CONFIRM_TIPS', ('Seleccione SI en el caso que requiera que sus suscriptores no registrados confirmen sus direcciones de correo electrónico.'));
define('_ACA_SUB_SETTINGS', ('Configuración de suscripción'));
define('_ACA_SUBMESSAGE', ('Correo de suscripción'));
define('_ACA_SUBSCRIBE_LIST', ('Suscribirse a una lista'));

define('_ACA_USABLE_TAGS', ('Etiquetas usables'));
define('_ACA_NAME_AND_CONFIRM', ('<b>[CONFIRM]</b> = Este campo crea un vínculo donde el suscriptor puede confirmar su suscripción, es <strong>requerida</strong> para que jNews funcione correctamente.<br />'
.'<br />[NAME] = Este campo será reemplazado por el nombre que el suscriptor haya ingresado al registrarse, con ello podrá personalizar sus mensajes.<br />'
.'<br />[FIRSTNAME] = Este campo será reemplazado por el primer nombre del suscriptor.<br />'));
define('_ACA_CONFIRMFROMNAME', ('Nombre de remitente en correo de confirmación'));
define('_ACA_CONFIRMFROMNAME_TIPS', ('Ingrese el nombre para mostrar en la confirmación de listas.'));
define('_ACA_CONFIRMFROMEMAIL', ('Correo de remitente en confirmación'));
define('_ACA_CONFIRMFROMEMAIL_TIPS', ('Ingrese la dirección de correo que se mostrará en la confirmación de listas.'));
define('_ACA_CONFIRMBOUNCE', ('Correo de respuesta'));
define('_ACA_CONFIRMBOUNCE_TIPS', ('Ingrese la dirección de correo de respuesta en la confirmación de listas.'));
define('_ACA_HTML_CONFIRM', ('Confirmación de HTML'));
define('_ACA_HTML_CONFIRM_TIPS', ('Seleccione SI  en el caso que que la confirmación de la lista deba ser html si es que el usuario lo permite.'));
define('_ACA_TIME_ZONE_ASK', ('Solicitar zona horaria'));
define('_ACA_TIME_ZONE_TIPS', ('Seleccione SI en el caso que desee preguntar al usuario su zona horaria. Los correos pendientes se basarán en la zona horaria cuando sea aplicable'));

 // Cron Set up
 define('_ACA_AUTO_CONFIG', ('Tareas Cron'));
define('_ACA_TIME_OFFSET_URL', ('Seleccione para configurar la compensación horaria (offset) en el panel de configuracioón global -> Tabulador Local'));
define('_ACA_TIME_OFFSET_TIPS', ('Configure la compensación horaria en su servidor a fin que los registros de fecha y hora sean exactos'));
define('_ACA_TIME_OFFSET', ('Compensación horaria'));
define('_ACA_CRON_DESC', ('<br />¡Usando la función de tareas Cron podrá configurar la automatización de trabajos para su sitio Joomla!<br />' .
		'Para configurarlo usted necesitará añadir en las tareas Cron de su panel de control el siguiente commando:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Si usted necesita ayuda para efectuar la configuración o tiene problemas por favor remítase a nuestros foros en <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>'));
// sending settings
define('_ACA_PAUSEX', ('Detener x segundos cada cierta cantidad de correos'));
define('_ACA_PAUSEX_TIPS', ('Ingrese el número de segundos que jNews deberá dar al servidor SMTP para enviar los mensajes antes de proceder con la siguiente cantidad configurada de mensajes.'));
define('_ACA_EMAIL_BET_PAUSE', ('Correos entre pausas'));
define('_ACA_EMAIL_BET_PAUSE_TIPS', ('La cantidad de correos a enviar antes de detener.'));
define('_ACA_WAIT_USER_PAUSE', ('Esperar por confirmación de usuario en la pausa'));
define('_ACA_WAIT_USER_PAUSE_TIPS', ('En el caso que el script deba esperar a la confirmación del usuario entre los grupos de mensajes.'));
define('_ACA_SCRIPT_TIMEOUT', ('Tiempo de espera del Script'));
define('_ACA_SCRIPT_TIMEOUT_TIPS', ('La cantidad de minutos que el script debe esperar en ejecución (0 para ilimitado).'));
// Stats settings
define('_ACA_ENABLE_READ_STATS', ('Permitir estadísticas de lectura'));
define('_ACA_ENABLE_READ_STATS_TIPS', ('Seleccione SI en el caso que desee registrar la cantidad de lecturas. Esta técnica sólo puede ser usada en los envíos html'));
define('_ACA_LOG_VIEWSPERSUB', ('Registro de lecturas por suscriptor'));
define('_ACA_LOG_VIEWSPERSUB_TIPS', ('Seleccione SI en el caso que desee registrar el número de lecturas por suscriptor. Esta técnica sólo puede ser usada en los envíos html'));
// Logs settings
define('_ACA_DETAILED', ('Registros detallados'));
define('_ACA_SIMPLE', ('Registros simples'));
define('_ACA_DIAPLAY_LOG', ('Mostrar registros'));
define('_ACA_DISPLAY_LOG_TIPS', ('Seleccione SI en el caso que desee mostrar los registros mientras procesa sus envíos.'));
define('_ACA_SEND_PERF_DATA', ('Performance de envíos'));
define('_ACA_SEND_PERF_DATA_TIPS', ('Seleccione SI en el caso que desee permitir a jNews enviar reportes ANÓNIMOS respecto a su configuración, número de suscriptores de una lista y el tiempo que tomó realizar el envío. Esto puede darnos una idea del performance de jNews y nos podrá AYUDAR a mejorar jNews en entregas futuras.'));
define('_ACA_SEND_AUTO_LOG', ('Enviar registros para auto-respuestas'));
define('_ACA_SEND_AUTO_LOG_TIPS', ('Seleccione SI en el caso que desee enviar un correo de registro cada vez que un proceso es ejecutado.  ADVERTENCIA: esto puede desencadenar la generación de una alta cantidad de correos.'));
define('_ACA_SEND_LOG', ('Enviar Registro'));
define('_ACA_SEND_LOG_TIPS', ('Si un registro del envío debe ser remitido a la dirección de correo del usuario que programó el mismo.'));
define('_ACA_SEND_LOGDETAIL', ('Enviar detalles de registro'));
define('_ACA_SEND_LOGDETAIL_TIPS', ('Detallado: Incluye información detallada del éxito o fracaso por cada suscriptor junto con un resumen global. Simple: Sólo envía el resumen.'));
define('_ACA_SEND_LOGCLOSED', ('Enviar registro si la conexión se cerró'));
define('_ACA_SEND_LOGCLOSED_TIPS', ('Con esta opción el usuario que generó el envío podrá recibir un reporte por correo.'));
define('_ACA_SAVE_LOG', ('Guardar registro'));
define('_ACA_SAVE_LOG_TIPS', ('Si un registro de envío debe ser guardado en un archivo.'));
define('_ACA_SAVE_LOGDETAIL', ('Guardar detalles de registro'));
define('_ACA_SAVE_LOGDETAIL_TIPS', ('Detallado: Incluye información detallada del éxito o fracaso por cada Suscriptor junto con un resumen global. Simple: Sólo envía el resumen.'));
define('_ACA_SAVE_LOGFILE', ('Archivo de registro'));
define('_ACA_SAVE_LOGFILE_TIPS', ('Archivo donde la información será guardada. Este archivo puede ser extenso.'));
define('_ACA_CLEAR_LOG', ('Borrar registros'));
define('_ACA_CLEAR_LOG_TIPS', ('Limpia el archivo de registros.'));

### control panel
define('_ACA_CP_LAST_QUEUE', ('Último proceso ejecutado'));
define('_ACA_CP_TOTAL', ('Total'));
define('_ACA_MAILING_COPY', ('¡Envío copiado con éxito!'));

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', ('Mostrar guía'));
define('_ACA_SHOW_GUIDE_TIPS', ('Muestra la guía cuando inicia el componente a fin de facilitar a los nuevos usuarios la tarea de crear boletines, auto-respuestas y configurar jNews correctamente.'));
define('_ACA_AUTOS_ON', ('Usar Auto-respuestas'));
define('_ACA_AUTOS_ON_TIPS', ('Seleccione NO en el caso que no desee usar Auto-respuestas, todas las opciones de auto-respuestas serán desactivadas.'));
define('_ACA_NEWS_ON', ('Usar Boletiness'));
define('_ACA_NEWS_ON_TIPS', ('Select NO en el caso que no desee usar Boletines, todas las opciones de boletines serán desactivadas.'));
define('_ACA_SHOW_TIPS', ('Mostrar consejos'));
define('_ACA_SHOW_TIPS_TIPS', ('Mostrar consejos para ayudar a los usuarios a ejecutar jNews con mayor efectividad.'));
define('_ACA_SHOW_FOOTER', ('Mostrar pie de página'));
define('_ACA_SHOW_FOOTER_TIPS', ('Decidir si el pie de página con los derechos reservados debe ser o no mostrado.'));
define('_ACA_SHOW_LISTS', ('Mostrar listas en el portal web'));
define('_ACA_SHOW_LISTS_TIPS', ('Cuando un usuario no está registrado permite mostrar una lista de las listas a las cuales puede suscribirse con un botón de archivo para boletines o un simple formulario de registro.'));
define('_ACA_CONFIG_UPDATED', ('¡Los detalles de configuración han sido actualizados!'));
define('_ACA_UPDATE_URL', ('URL para actualizaciones'));
define('_ACA_UPDATE_URL_WARNING', ('¡ADVERTENCIA! No cambie esta URL si antes no ha consultado con el equipo técnico de jNews.<br />'));
define('_ACA_UPDATE_URL_TIPS', ('Por ejemplo: http://www.ijoobi.com/update/ (incluya la barra de cierre)'));

// module
define('_ACA_EMAIL_INVALID', ('El correo ingresado no es válido.'));
define('_ACA_REGISTER_REQUIRED', ('Por favor regístrese en el portal antes de registrarse en una lista.'));

// Access level box
define('_ACA_OWNER', ('Creador de la lista:'));
define('_ACA_ACCESS_LEVEL', ('Defina el nivel de acceso para la lisra'));
define('_ACA_ACCESS_LEVEL_OPTION', ('Opciones de nivel de acceso'));
define('_ACA_USER_LEVEL_EDIT', ('Seleccione qué nivel de usuario es permitido para editar un envío (tanto desde el portal como desde el panel de administración) '));

//  drop down options
define('_ACA_AUTO_DAY_CH1', ('Diario'));
define('_ACA_AUTO_DAY_CH2', ('Diario menos en fin de semana'));
define('_ACA_AUTO_DAY_CH3', ('Cualquier otro día'));
define('_ACA_AUTO_DAY_CH4', ('Cualquier otro día menos en fin de semana'));
define('_ACA_AUTO_DAY_CH5', ('Semanal'));
define('_ACA_AUTO_DAY_CH6', ('Cada 2 semanas'));
define('_ACA_AUTO_DAY_CH7', ('Mensual'));
define('_ACA_AUTO_DAY_CH9', ('Anual'));
define('_ACA_AUTO_OPTION_NONE', ('No'));
define('_ACA_AUTO_OPTION_NEW', ('Nuevos usuarios'));
define('_ACA_AUTO_OPTION_ALL', ('Todos los usuarios'));

//
define('_ACA_UNSUB_MESSAGE', ('Correo de de-suscripción'));
define('_ACA_UNSUB_SETTINGS', ('Ajustes de de-suscripción'));
define('_ACA_AUTO_ADD_NEW_USERS', ('¿Auto suscribir usuarios?'));

// Update and upgrade messages
define('_ACA_NO_UPDATES', ('No hay actualizaciones disponibles.'));
define('_ACA_VERSION', ('Versión de jNews'));
define('_ACA_NEED_UPDATED', ('Archivos que necesitan ser actualizados:'));
define('_ACA_NEED_ADDED', ('Archivos que necesitan ser añadidos:'));
define('_ACA_NEED_REMOVED', ('Archivos que necesitan ser eliminados:'));
define('_ACA_FILENAME', ('Nombre de archivo:'));
define('_ACA_CURRENT_VERSION', ('Versión actual:'));
define('_ACA_NEWEST_VERSION', ('Última Versión:'));
define('_ACA_UPDATING', ('Actualizando'));
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', ('Los archivos han sido actualizados con éxito.'));
define('_ACA_UPDATE_FAILED', ('¡Actualización fallida!'));
define('_ACA_ADDING', ('Añadiendo'));
define('_ACA_ADDED_SUCCESSFULLY', ('Añadido con éxito.'));
define('_ACA_ADDING_FAILED', ('¡Fallo al añadir!'));
define('_ACA_REMOVING', ('Eliminando'));
define('_ACA_REMOVED_SUCCESSFULLY', ('Eliminado con éxito.'));
define('_ACA_REMOVING_FAILED', ('¡Falló la eliminación!'));
define('_ACA_INSTALL_DIFFERENT_VERSION', ('Instale una versión diferente'));
define('_ACA_CONTENT_ADD', ('Añadir contenido'));
define('_ACA_UPGRADE_FROM', ('Importar datos (información de boletines y suscriptores) de '));
define('_ACA_UPGRADE_MESS', ('No hay riesgo para la información existente. <br /> Este proceso sólo importará la información a la base de datos de jNews.'));
define('_ACA_CONTINUE_SENDING', ('Continúe el envío'));

// jNews message
define('_ACA_UPGRADE1', ('Puede fácilmente importar sus usuarios y boletines desde '));
define('_ACA_UPGRADE2', (' hacia jNews en el panel de actualizaciones.'));
define('_ACA_UPDATE_MESSAGE', ('¡Una nueva versión de jNews está disponible! '));
define('_ACA_UPDATE_MESSAGE_LINK', ('¡Seleccione para actualizar!'));
define('_ACA_CRON_SETUP', ('Para que las auto-respuestas puedan ser enviadas debe configurar una tarea Cron.'));
define('_ACA_THANKYOU', ('Gracias por escoger jNews, ¡Su asistente de comunicaciones!'));
define('_ACA_NO_SERVER', ('Servidor de actualizaciones no disponible, por favor inténtelo más tarde.'));
define('_ACA_MOD_PUB', ('El módulo de jNews no está publicado.'));
define('_ACA_MOD_PUB_LINK', ('¡Presione aquí para publicarlo!'));
define('_ACA_IMPORT_SUCCESS', ('Importado con éxito'));
define('_ACA_IMPORT_EXIST', ('Suscriptor ya registrado en la base de datos'));

// jNews\'s Guide
define('_ACA_GUIDE', (' Asistente'));
define('_ACA_GUIDE_FIRST_ACA_STEP', ('<p>¡jNews cuenta con grandes funcionalidades y este asistente lo guiará en un simple proceso de cuatro pasos para que pueda empezar a enviar sus boletines y auto-respuestas!<p />'));
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', ('Primero: usted necesita añadir una lista.  Una lista puede ser de dos tipos: boletín o auto-respuesta.' .
		'  En la lista usted define todos los parámetros para hacer posible el envío de sus boletínes o auto-respuestas: nombre del remitente, diseño, mensaje de bienvenida a los suscriptores, etc...
<br /><br />Usted puede crear su primera lista aquí: <a href="index2.php?option=com_jnewsletter&act=list" >crear una lista</a> y seleccionar el botón "Nuevo".'));
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', ('jNews le brinda la facilidad de importar toda la información de sistemas de boletines anteriores.<br />' .
		' Vaya al panel de actualizaciones y escoja su antiguo sistema de boletines para importar los datos completos de usuarios y contenidos.<br /><br />' .
		'<span style="color:#FF5E00;" >IMPORTANTE: La importación esta libre de riesgos y no afectará de ninguna manera la información de su anterior sistema</span><br />' .
		'Luego de la importación usted podrá manejar sus suscriptores y envíos directamente en jNews.<br /><br />'));
define('_ACA_GUIDE_SECOND_ACA_STEP', ('¡Felicitaciones su primera lista ha sido creada!  Ahora podrá usted escribir su primer %s.  Para crearlo vaya a: '));
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', ('Manejador de Auto-respuestas'));
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', ('Manejador de boletines'));
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', (' y seleccione su %s. <br /> Luego seleccione su %s en la lista desplegable.  Cree su primer envío seleccionando "Nuevo"'));

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', ('Antes de enviar su primer boletín puede necesitar revisar la configuración de correo.  ' .
		'Vaya a la <a href="index2.php?option=com_jnewsletter&act=configuration" >página de configuraciones</a> para verificar sus parámetros de correo. <br />'));
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', ('<br />Cuando este listo regrese al menú de boletines seleccione su envío y presione enviar'));

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', ('Para que su auto-respuesta sea enviada primero debe configurar una tarea Cron en su servidor. ' .
		' Por favor refiérase al tabulador Cron en el panel de configuración.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >presione aquí</a> para aprender acerca de configaciones de tareas Cron. <br />'));

define('_ACA_GUIDE_MODULE', (' <br />Asegúrese de haber publicado su módulo de jNews para que las personas puedan registrarse en sus listas.'));

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', (' Ahora también puede configurar auto-respuestas.'));
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', (' Ahora también puede configurar un boletín.'));

define('_ACA_GUIDE_FOUR_ACA_STEP', ('<p><br />¡Voila! Está listo para comunicarse efectivamente con sus usuarios. Este asistente terminará tan pronto como usted haya ingresado un segundo envío o lo haya desactivado en el <a href="index2.php?option=com_jnewsletter&act=configuration" >panel de control</a>.' .
		'<br /><br />  Si tuviera alguna consulta acerca de del uso de jNews, por favor refiérase a este ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >foro</a>. ' .
		' Usted podrá encontrar gran cantidad de información acerca de cómo comunicarse efectivamente con sus suscriptores en <a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a>.' .
		'<p /><br /><b>Gracias por usar jNews. ¡Su asistente de comunicaciones!</b> '));
define('_ACA_GUIDE_TURNOFF', ('El asistente ha sido desactivado!'));
define('_ACA_STEP', ('PASO '));

// jNews Install
define('_ACA_INSTALL_CONFIG', ('Configuración jNews'));
define('_ACA_INSTALL_SUCCESS', ('Instalado con éxito'));
define('_ACA_INSTALL_ERROR', ('¡Error en la instalación'));
define('_ACA_INSTALL_BOT', ('Plugin jNews (Bot)'));
define('_ACA_INSTALL_MODULE', ('Módulo jNews'));
//Others
define('_ACA_JAVASCRIPT', ('!Advertencia! Javascript debe estar habilitado para permitir una correcta operación.'));
define('_ACA_EXPORT_TEXT', ('La exportación de suscriptores estará basada en la lista que usted escoja. <br />Exportar suscriptores a lista'));
define('_ACA_IMPORT_TIPS', ('Importar suscriptores. La información en el archivo necesita tener el siguiente formato: <br />' .
		'Nombre,correo,recibeHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmado(1/0)</span>'));
define('_ACA_SUBCRIBER_EXIT', ('es ya un suscriptor'));
define('_ACA_GET_STARTED', ('¡Presione aquí para iniciar!'));

//News since 1.0.1
define('_ACA_WARNING_1011', ('Advertencia: 1011: La actualización no funcionará por restricciones de su servidor.'));
define('_ACA_SEND_MAIL_FROM_TIPS', ('Elija la dirección de correo que mostrará el remitente.'));
define('_ACA_SEND_MAIL_NAME_TIPS', ('Elija el nombre que mostrará el remitente.'));
define('_ACA_MAILSENDMETHOD_TIPS', ('Elija el mensajero que desea usar: función de correo PHP, <span>Sendmail</span> o servidor SMTP.'));
define('_ACA_SENDMAILPATH_TIPS', ('Este es el directorio del servidor de correo'));
define('_ACA_LIST_T_TEMPLATE', ('Plantilla'));
define('_ACA_NO_MAILING_ENTERED', ('No se ha provisto envío'));
define('_ACA_NO_LIST_ENTERED', ('No se ha provisto lista'));
define('_ACA_SENT_MAILING', ('Envíos completados'));
define('_ACA_SELECT_FILE', ('Por favor seleccione un archivo para '));
define('_ACA_LIST_IMPORT', ('Revise la lista(s) a las cuales desea que sean asociados sus suscriptores.'));
define('_ACA_PB_QUEUE', ('Suscriptor insertado pero presenta problemas al conectarlo/la a la lista(s). Por favor revise manualmente.'));
define('_ACA_UPDATE_MESS1', ('¡Actualización áltamente recomendada!'));
define('_ACA_UPDATE_MESS2', ('Parches y pequeñas reparaciones.'));
define('_ACA_UPDATE_MESS3', ('Nueva entrega.'));
define('_ACA_UPDATE_MESS5', ('Es requerido Joomla 1.5 para actualizar.'));
define('_ACA_UPDATE_IS_AVAIL', (' está disponible!'));
define('_ACA_NO_MAILING_SENT', ('¡No se procesó envío!'));
define('_ACA_SHOW_LOGIN', ('Mostrar formulario de ingreso'));
define('_ACA_SHOW_LOGIN_TIPS', ('Seleccione SI para mostrar el formulario de ingreso en el panel de control de jNews del portal web a fin que los usuarios se registren.'));
define('_ACA_LISTS_EDITOR', ('Editor de descripción de lista'));
define('_ACA_LISTS_EDITOR_TIPS', ('Seleccione SI para usar un editor HTML a fin de modificar el campo descriptivo de la lista.'));
define('_ACA_SUBCRIBERS_VIEW', ('Ver suscriptores'));

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', ('Configuración en portal web'));
define('_ACA_SHOW_LOGOUT', ('Mostrar botón de salida'));
define('_ACA_SHOW_LOGOUT_TIPS', ('Seleccione SI a fin de mostrar el botón de salida en el panel de control de jNews en el portal web.'));

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', ('Integración'));
define('_ACA_CB_INTEGRATION', ('Integración con Community Builder'));
define('_ACA_INSTALL_PLUGIN', ('Plugin de Community Builder Plugin (Integración con jNews) '));
define('_ACA_CB_PLUGIN_NOT_INSTALLED', ('¡El plugin jNews para Community Builder no ha sido instalado!'));
define('_ACA_CB_PLUGIN', ('Listas al registrarse'));
define('_ACA_CB_PLUGIN_TIPS', ('Seleccione SI a fin de mostrar las listas de correo al momento de registrarse con el formulario de Community Builder'));
define('_ACA_CB_LISTS', ('IDs de listas'));
define('_ACA_CB_LISTS_TIPS', ('ESTE ES UN CAMPO REQUERIDO. Ingrese el número identificador de las listas a las cuales desea que sus usuarios tengan acceso de suscripción separadas por comas (0 mostrará todas las listas)'));
define('_ACA_CB_INTRO', ('Texto introductorio'));
define('_ACA_CB_INTRO_TIPS', ('Texto que aparecerá antes de las listas. DÉJELO EN BLANCO PARA NO MOSTRAR NADA.  Usted puede usar etiquetas HTML para dar efectos visuales.'));
define('_ACA_CB_SHOW_NAME', ('Mostrar nombres de listas'));
define('_ACA_CB_SHOW_NAME_TIPS', ('Seleciónelo en el caso que desee o no mostrar el nombre de la lista luego de la introducción.'));
define('_ACA_CB_LIST_DEFAULT', ('Activar listas por defecto'));
define('_ACA_CB_LIST_DEFAULT_TIPS', ('Seleciónelo en el caso que desee o no mostrar activada la casilla de verificación por defecto.'));
define('_ACA_CB_HTML_SHOW', ('Mostrar aceptación de HTML'));
define('_ACA_CB_HTML_SHOW_TIPS', ('Seleccione SI para permitir a los usuarios la selección de correos con formato HTML. Seleccione NO para definir HTML por defecto.'));
define('_ACA_CB_HTML_DEFAULT', ('Recibir HTML por defecto'));
define('_ACA_CB_HTML_DEFAULT_TIPS', ('Configure esta opción para mostrar que los correos serán enviados en html por defecto. En el caso que "mostrar recepción como HTML" esté configurado en NO entonces esta será la opción por defecto.'));

// Since 1.0.4
define('_ACA_BACKUP_FAILED', ('¡No pudo realizarse la copia de seguridad del archivo! El archivo no fue reemplazado.'));
define('_ACA_BACKUP_YOUR_FILES', ('La versión antigua de los archivos ha sido guardada en el siguiente directorio:'));
define('_ACA_SERVER_LOCAL_TIME', ('Hora local del servidor'));
define('_ACA_SHOW_ARCHIVE', ('Mostrar botón de Archivo'));
define('_ACA_SHOW_ARCHIVE_TIPS', ('Seleccione SI a fin de mostrar el botón de archivo en la sección de la lista ubicada en el portal web'));
define('_ACA_LIST_OPT_TAG', ('Etiquetas'));
define('_ACA_LIST_OPT_IMG', ('Imágenes'));
define('_ACA_LIST_OPT_CTT', ('Contenido'));
define('_ACA_INPUT_NAME_TIPS', ('Ingrese su nombre completo (nombre de pila al inicio)'));
define('_ACA_INPUT_EMAIL_TIPS', ('ingrese su correo electrónico (asegúrese que es una dirección válida si desea recibir nuestros envíos.)'));
define('_ACA_RECEIVE_HTML_TIPS', ('Seleccione SI a fin de recibir envíos HTML - Seleccione NO para recibir los envíos en texto llano'));
define('_ACA_TIME_ZONE_ASK_TIPS', ('Especifique su zona horaria.'));

// Since 1.0.5
define('_ACA_FILES', ('Archivos'));
define('_ACA_FILES_UPLOAD', ('Cargar'));
define('_ACA_MENU_UPLOAD_IMG', ('Cargar imágenes'));
define('_ACA_TOO_LARGE', ('Archivo demasiado grande. El máximo tamaño permitido es'));
define('_ACA_MISSING_DIR', ('El directorio de destino no existe'));
define('_ACA_IS_NOT_DIR', ('El directorio de destino no existe o es un archivo regular.'));
define('_ACA_NO_WRITE_PERMS', ('El directorio de destino no tiene permisos de escritura.'));
define('_ACA_NO_USER_FILE', ('No ha seleccionado ningún archivo para cargar.'));
define('_ACA_E_FAIL_MOVE', ('Imposible mover el archivo.'));
define('_ACA_FILE_EXISTS', ('El archivo de destino ya existe.'));
define('_ACA_CANNOT_OVERWRITE', ('El archivo de destino ya existe y no puede ser sobreescrito.'));
define('_ACA_NOT_ALLOWED_EXTENSION', ('La extensión del archivo no está permitida.'));
define('_ACA_PARTIAL', ('El archivo fue parcialmente cargado.'));
define('_ACA_UPLOAD_ERROR', ('Error de carga:'));
define('DEV_NO_DEF_FILE', ('El archivo fue parcialmente cargado.'));

// already exist but modified  added a <br/ on first line and added [SUBSCRIPTIONS] line>
define('_ACA_CONTENTREP', ('[SUBSCRIPTIONS] = Este campo será reemplazado con el enlace de suscripción.' .
		' Esto es <strong>requerido</strong> para que jNews trabaje correctamente.<br />' .
		'Si usted coloca cualquier otro contenido en esta area, el mismo será mostrado en todos los envíos correspondientes a esta lista.' .
		' <br />Añada su mensaje de suscripción al final.  jNews añadirá automáticamente un enlace para que el suscriptor cambie su información y otro enlace para de-suscribirse de la lista.'));

// since 1.0.6
define('_ACA_NOTIFICATION', ('Notificación'));  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', ('Notificaciones'));
define('_ACA_USE_SEF', ('SEF en envíos'));
define('_ACA_USE_SEF_TIPS', ('Es recomendable que usted elija NO.  Sin embargo si usted desea que las URL incluídas en su envío usen SEF seleccione SI.' .
		' <br /><b>Los enlaces trabajarán en cualquira de las opciones.  No podemos asegurar que los enlaces trabajarán siempre si usted cambia su SEF.</b> '));
define('_ACA_ERR_NB', ('Error #: ERR'));
define('_ACA_ERR_SETTINGS', ('Error manejando la configuración'));
define('_ACA_ERR_SEND', ('Enviar reportes de error'));
define('_ACA_ERR_SEND_TIPS', ('Si usted desea que jNews sea un mejor producto por favor seleccione SI.  Esto permitirá que nos envíe un reporte de error. Sin embargo usted no necesitará enviar nunca más reportes de errores ;-) <br /> <b>NINGUNA INFORMACIÓN PRIVADA ES ENVIADA</b>.  Nunca sabremos de que portal web proviene el error. Nosotros sólo enviamos información sobre jNews, la configuración PHP y las consultas SQL. '));
define('_ACA_ERR_SHOW_TIPS', ('Seleccione SI para mostrar el número de error en su pantalla.  Principalmente usado para correción de fallas. '));
define('_ACA_ERR_SHOW', ('Mostrar errores'));
define('_ACA_LIST_SHOW_UNSUBCRIBE', ('Mostrar enlaces de de-suscripción'));
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', ('Seleccione SI para mostrar los enlaces de de-suscripción al final de los envíos para que los usuarios puedan cambiar sus suscripciones. <br /> No desactive el pie de página y los vínculos.'));
define('_ACA_UPDATE_INSTALL', ('<span style="color: rgb(255, 0, 0);">¡NOTICIA IMPORTANTE!</span> <br />Si usted está actualizando de una versión previamente instalada de jNews, necesitará actualizar la estructura de su base de datos presionando el siguiente botón (Su información se mantendrá íntegra)'));
define('_ACA_UPDATE_INSTALL_BTN', ('Actualizar tablas y configuración'));
define('_ACA_MAILING_MAX_TIME', ('Máximo tiempo de espera'));
define('_ACA_MAILING_MAX_TIME_TIPS', ('Defina el máximo periodo de tiempo para cada grupo de correos enviados por el proceso. Se recomienda que sea entre 30s y 2mins.'));

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', ('Integración con VirtueMart'));
define('_ACA_VM_COUPON_NOTIF', ('ID de notificación de cupón'));
define('_ACA_VM_COUPON_NOTIF_TIPS', ('Especifique el número de ID del envío que usted desea usar para remitir cupones a sus compradores.'));
define('_ACA_VM_NEW_PRODUCT', ('ID de Notificación de nuevos productos'));
define('_ACA_VM_NEW_PRODUCT_TIPS', ('Especifique el número de ID del envío que usted desea usar para notificar la existencia de nuevos productos.'));

// since 1.0.8
// create forms for Suscripcións
define('_ACA_FORM_BUTTON', ('Crear formulario'));
define('_ACA_FORM_COPY', ('Código HTML'));
define('_ACA_FORM_COPY_TIPS', ('Copie el código HTML generado en su página HTML.'));
define('_ACA_FORM_LIST_TIPS', ('Seleccione la lista que desea incluir en el formulario'));
// update messages
define('_ACA_UPDATE_MESS4', ('No puede ser actualizado automáticamente.'));
define('_ACA_WARNG_REMOTE_FILE', ('No hay forma de recuperar el archivo remoto.'));
define('_ACA_ERROR_FETCH', ('Error recuperando archivo.'));

define('_ACA_CHECK', ('Revisar'));
define('_ACA_MORE_INFO', ('Más información'));
define('_ACA_UPDATE_NEW', ('Actualizar a nueva versión'));
define('_ACA_UPGRADE', ('Actualizar a un producto mayor'));
define('_ACA_DOWNDATE', ('Regresar a la versión previa'));
define('_ACA_DOWNGRADE', ('Regresar al producto básico'));
define('_ACA_REQUIRE_JOOM', ('Requiere Joomla'));
define('_ACA_TRY_IT', ('¡Puébelo!'));
define('_ACA_NEWER', ('Nuevo'));
define('_ACA_OLDER', ('Antiguo'));
define('_ACA_CURRENT', ('Actual'));

// since 1.0.9
define('_ACA_CHECK_COMP', ('Pruebe uno de los otros componentes'));
define('_ACA_MENU_VIDEO', ('Video tutoriales'));
define('_ACA_AUTO_SCHEDULE', ('Programación'));
define('_ACA_SCHEDULE_TITLE', ('Configuración de la función de programación automática'));
define('_ACA_ISSUE_NB_TIPS', ('Número de publicación generado automáticamente por el sistema'));
define('_ACA_SEL_ALL', ('Todos los envíos'));
define('_ACA_SEL_ALL_SUB', ('Todas las listas'));
define('_ACA_INTRO_ONLY_TIPS', ('Si usted selecciona esta opción, sólo la introducción del artículo será insertada en el envío junto con un enlace de "leer más" que lo dirigirpa hacia el artículo completo en el portal web.'));
define('_ACA_TAGS_TITLE', ('Etiqueta de contenido'));
define('_ACA_TAGS_TITLE_TIPS', ('Copie y pegue esta etiqueta dentro del envío en el cual desea que el contenido sea colocado.'));
define('_ACA_PREVIEW_EMAIL_TEST', ('Indique la dirección a la cual se enviará el correo de prueba.'));
define('_ACA_PREVIEW_TITLE', ('Vista previa'));
define('_ACA_AUTO_UPDATE', ('Notificación de nuevas actualizaciones'));
define('_ACA_AUTO_UPDATE_TIPS', ('Seleccione SI en el caso que desee ser notificado de nuevas actualizaciones para su componente. <br />¡IMPORTANTE!! Mostar consejos necesita estar activado para que esta función trabaje correctamente.'));

// since 1.1.0
define('_ACA_LICENSE', ('Información de Licencia'));


// since 1.1.1
define('_ACA_NEW', ('New'));
define('_ACA_SCHEDULE_SETUP', ('In order for the autoresponders to be sent you need to setup scheduler in the configuration.'));
define('_ACA_SCHEDULER', ('Scheduler'));
define('_ACA_JNEWSLETTER_CRON_DESC', ('if you do not have access to a cron task manager on your website, you can register for a Free jNews Cron account at:'));
define('_ACA_CRON_DOCUMENTATION', ('You can find further information on setting up the jNews Scheduler at the following url:'));
define('_ACA_CRON_DOC_URL', ('<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>'));
define( '_ACA_QUEUE_PROCESSED', ('Queue processed succefully...'));
define( '_ACA_ERROR_MOVING_UPLOAD', ('Error moving imported file'));

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', ('Scheduler frequency'));
define( '_ACA_CRON_MAX_FREQ', ('Scheduler max frequency'));
define( '_ACA_CRON_MAX_FREQ_TIPS', ('Specify the maximum frequency the scheduler can run ( in minutes ).  This will limit the scheduler even if the cron task is set up more frequently.'));
define( '_ACA_CRON_MAX_EMAIL', ('Maximum emails per task'));
define( '_ACA_CRON_MAX_EMAIL_TIPS', ('Specify the maximum number of emails sent per task (0 unlimited).'));
define( '_ACA_CRON_MINUTES', (' minutes'));
define( '_ACA_SHOW_SIGNATURE', ('Show email footer'));
define( '_ACA_SHOW_SIGNATURE_TIPS', ('Whether or not you want to promote jNews in the footer of the emails.'));
define( '_ACA_QUEUE_AUTO_PROCESSED', ('Auto-responders processed successfully...'));
define( '_ACA_QUEUE_NEWS_PROCESSED', ('Scheduled newsletters processed successfully...'));
define( '_ACA_MENU_SYNC_USERS', ('Sync Users'));
define( '_ACA_SYNC_USERS_SUCCESS', ('Users Synchronization Successful!'));

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', ('Logout'));
if (!defined('_CMN_YES')) define( '_CMN_YES', ('Yes'));
if (!defined('_CMN_NO')) define( '_CMN_NO', ('No'));
if (!defined('_HI')) define( '_HI', ('Hi'));
if (!defined('_CMN_TOP')) define( '_CMN_TOP', ('Top'));
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', ('Bottom'));
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', ('Logout'));

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', ('If you select this only the title of the article will be inserted into the mailing as a link to the complete article on your site.'));
define('_ACA_TITLE_ONLY', ('Title Only'));
define('_ACA_FULL_ARTICLE_TIPS', ('If you select this the complete article will be inserted into the mailing'));
define('_ACA_FULL_ARTICLE', ('Full Article'));
define('_ACA_CONTENT_ITEM_SELECT_T', ('Select a content item to append to the message. <br />Copy and paste the <b>content tag</b> into the mailing.  You can choose to have the full text, intro only, or title only with (0, 1, or 2 respectively). '));
define('_ACA_SUBSCRIBE_LIST2', ('Mailing list(s)'));

// smart-newsletter function
define('_ACA_AUTONEWS', ('Smart-Newsletter'));
define('_ACA_MENU_AUTONEWS', ('Smart-Newsletters'));
define('_ACA_AUTO_NEWS_OPTION', ('Smart-Newsletter options'));
define('_ACA_AUTONEWS_FREQ', ('Newsletter Frequency'));
define('_ACA_AUTONEWS_FREQ_TIPS', ('Specify the frequency at which you want to send the smart-newsletter.'));
define('_ACA_AUTONEWS_SECTION', ('Article Section'));
define('_ACA_AUTONEWS_SECTION_TIPS', ('Specify the section you want to choose the articles from.'));
define('_ACA_AUTONEWS_CAT', ('Article Category'));
define('_ACA_AUTONEWS_CAT_TIPS', ('Specify the category you want to choose the articles from (All for all article in that section).'));
define('_ACA_SELECT_SECTION', ('All Sections'));
define('_ACA_SELECT_CAT', ('All Categories'));
define('_ACA_AUTO_DAY_CH8', ('Quaterly'));
define('_ACA_AUTONEWS_STARTDATE', ('Start date'));
define('_ACA_AUTONEWS_STARTDATE_TIPS', ('Specify the date you want to start sending the Smart Newsletter.'));
define('_ACA_AUTONEWS_TYPE', ('Content rendering'));// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', ('Full Article: will include the entire article in the newsletter.<br />' .
		'Intro only: will include only the introduction of the article in the newsletter.<br/>' .
		'Title only: will include only the title of the article in the newsletter.'));
define('_ACA_TAGS_AUTONEWS', ('[SMARTNEWSLETTER] = This will be replaced by the Smart-newsletter.'));

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', ('Create / View Mailings'));
define('_ACA_LICENSE_CONFIG', ('License'));
define('_ACA_ENTER_LICENSE', ('Enter license'));
define('_ACA_ENTER_LICENSE_TIPS', ('Enter your license number and save it.'));
define('_ACA_LICENSE_SETTING', ('License settings'));
define('_ACA_GOOD_LIC', ('Your license is valid.'));
define('_ACA_NOTSO_GOOD_LIC', ('Your license is not valid: '));
define('_ACA_PLEASE_LIC', ('Please contact jNews support to upgrade your license ( license@ijoobi.com ).'));

define('_ACA_DESC_PLUS', ('jNews Plus is the first sequencial auto-responders for Joomla CMS.  ' . _ACA_FEATURES));
define('_ACA_DESC_PRO', ('jNews PRO the ultimate mailing system for Joomla CMS.  ' . _ACA_FEATURES));

//since 1.1.4
define('_ACA_ENTER_TOKEN', ('Enter token'));
define('_ACA_ENTER_TOKEN_TIPS', ('Please enter your token number you received by email when you purchased jNews. '));
define('_ACA_JNEWSLETTER_SITE', ('jNews site:'));
define('_ACA_MY_SITE', ('My site:'));
define( '_ACA_LICENSE_FORM', (' ' .
 		'Click here to go to the license form.</a>'));
define('_ACA_PLEASE_CLEAR_LICENSE', ('Please clear the license field so it is empty and try again.<br />  If the problem persists, '));
define( '_ACA_LICENSE_SUPPORT', ('If you still have questions, ' . _ACA_PLEASE_LIC));
define( '_ACA_LICENSE_TWO', ('you can get your license manual by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT));
define('_ACA_ENTER_TOKEN_PATIENCE', ('After saving your token a license will be generated automatically. ' .
		' Usually the token is validated in 2 minutes.  However, in some cases it can take up to 15 minutes.<br />' .
		'<br />Check back this control panel in few minutes.  <br /><br />' .
						     'If you didn\'t receive a valid license key in 15 minutes, '. _ACA_LICENSE_TWO));
define( '_ACA_ENTER_NOT_YET', ('Your token has not yet been validated.'));
define( '_ACA_UPDATE_CLICK_HERE', ('Pleae visit <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a> to download the newest version.'));
define( '_ACA_NOTIF_UPDATE', ('To be notified of new updates enter your email address and click subscribe '));

define('_ACA_THINK_PLUS', ('If you want more out of your mailing system think Plus!'));
define('_ACA_THINK_PLUS_1', ('Sequential auto-responders'));
define('_ACA_THINK_PLUS_2', ('Schedule the delivery of your newsletter for a predefined date'));
define('_ACA_THINK_PLUS_3', ('No more server limitation'));
define('_ACA_THINK_PLUS_4', ('and much more...'));


//since 1.2.2
define( '_ACA_LIST_ACCESS', ('List Access'));
define( '_ACA_INFO_LIST_ACCESS', ('Specify what group of users can view and subscribe to this list'));
define( 'ACA_NO_LIST_PERM', ('You don\'t have enough permission to subscribe to this list'));

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', ('Archive'));
 define('_ACA_MENU_ARCHIVE_ALL', ('Archive All'));

//Archive Lists
 define('_FREQ_OPT_0', ('None'));
 define('_FREQ_OPT_1', ('Every Week'));
 define('_FREQ_OPT_2', ('Every 2 Weeks'));
 define('_FREQ_OPT_3', ('Every Month'));
 define('_FREQ_OPT_4', ('Every Quarter'));
 define('_FREQ_OPT_5', ('Every Year'));
 define('_FREQ_OPT_6', ('Other'));

define('_DATE_OPT_1', ('Created date'));
define('_DATE_OPT_2', ('Modified date'));

define('_ACA_ARCHIVE_TITLE', ('Setting up auto-archive frequency'));
define('_ACA_FREQ_TITLE', ('Archive frequency'));
define('_ACA_FREQ_TOOL', ('Define how often you want the Archive Manager to arhive your website content.'));
define('_ACA_NB_DAYS', ('Number of days'));
define('_ACA_NB_DAYS_TOOL', ('This is only for the Other option! Please specify the number of days between each Archive.'));
define('_ACA_DATE_TITLE', ('Date type'));
define('_ACA_DATE_TOOL', ('Define if the archived should be done on the created date or modified date.'));

define('_ACA_MAINTENANCE_TAB', ('Maintenance settings'));
define('_ACA_MAINTENANCE_FREQ', ('Maintenance frequency'));
define( '_ACA_MAINTENANCE_FREQ_TIPS', ('Specify the frequency at which you want the maintenance routine to run.'));
define( '_ACA_CRON_DAYS', ('hour(s)'));

define( '_ACA_LIST_NOT_AVAIL', ('There is no list available.'));
define( '_ACA_LIST_ADD_TAB', ('Add/Edit'));

define( '_ACA_LIST_ACCESS_EDIT', ('Mailing Add/Edit Access'));
define( '_ACA_INFO_LIST_ACCESS_EDIT', ('Specify what group of users can add or edit a new mailing for this list'));
define( '_ACA_MAILING_NEW_FRONT', ('Createa New Mailing'));

define('_ACA_AUTO_ARCHIVE', ('Auto-Archive'));
define('_ACA_MENU_ARCHIVE', ('Auto-Archive'));

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', ('[ISSUENB] = This will be replaced by the issue number of  the newsletter.'));
define('_ACA_TAGS_DATE', ('[DATE] = This will be replaced by the sent date.'));
define('_ACA_TAGS_CB', ('[CBTAG:{field_name}] = This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] '));
define( '_ACA_MAINTENANCE', ('Joobi Care'));


define('_ACA_THINK_PRO', ('When you have professional needs, you use professional components!'));
define('_ACA_THINK_PRO_1', ('Smart-Newsletters'));
define('_ACA_THINK_PRO_2', ('Define access level for your list'));
define('_ACA_THINK_PRO_3', ('Define who can edit/add mailings'));
define('_ACA_THINK_PRO_4', ('More tags: add your CB fields'));
define('_ACA_THINK_PRO_5', ('Joomla contents Auto-archive'));
define('_ACA_THINK_PRO_6', ('Database optimization'));

define('_ACA_LIC_NOT_YET', ('Your license is not yet valid.  Please check the license Tab in the configuration panel.'));
define('_ACA_PLEASE_LIC_GREEN', ('Make sure to provide the green information at the top of the tab to our support team.'));

define('_ACA_FOLLOW_LINK', ('Get Your License'));
define( '_ACA_FOLLOW_LINK_TWO', ('You can get your license by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. '));
define( '_ACA_ENTER_TOKEN_TIPS2', (' Then click on Apply button in the top right menu.'));
define( '_ACA_ENTER_LIC_NB', ('Enter your License'));
define( '_ACA_UPGRADE_LICENSE', ('Upgrade Your License'));
define( '_ACA_UPGRADE_LICENSE_TIPS', ('If you received a token to upgrade your license please enter it here, click Apply and proceed to number <b>2</b> to get your new license number.'));

define( '_ACA_MAIL_FORMAT', ('Encoding format'));
define( '_ACA_MAIL_FORMAT_TIPS', ('What format do you want to use for encoding your mailings, Text only or MIME'));
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', ('If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.'));

//since 1.3.1
define('_ACA_SHOW_AUTHOR', ('Show Author\'s Name'));
define('_ACA_SHOW_AUTHOR_TIPS', ('Select Yes if you want to add the name of the author when you add an article in the Mailing'));

//since 1.3.5
define('_ACA_REGWARN_NAME', ('Escriba su nombre.'));
define('_ACA_REGWARN_MAIL', ('Escriba su e-mail.'));

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', ('If you select Yes, the e-mail of the user will be added as a parameter at the end of your redirect URL (the redirect link for your module or for an external jNews form).<br/>That can be useful if you want to execute a special script in your redirect page.'));
define('_ACA_ADDEMAILREDLINK', ('Add e-mail to the redirect link'));

//since 1.6.3
define('_ACA_ITEMID', ('ItemId'));
define('_ACA_ITEMID_TIPS', ('This ItemId will be added to your jNews links.'));

//since 1.6.5
define('_ACA_SHOW_JCALPRO', ('jCalPRO'));
define('_ACA_SHOW_JCALPRO_TIPS', ('Show the integration tab for jCalPRO <br/>(only if jCalPRO is installed on your website!)'));
define('_ACA_JCALTAGS_TITLE', ('jCalPRO Tag:'));
define('_ACA_JCALTAGS_TITLE_TIPS', ('Copy and paste this tag into the mailing where you want to have the event to be placed.'));
define('_ACA_JCALTAGS_DESC', ('Description:'));
define('_ACA_JCALTAGS_DESC_TIPS', ('Select Yes if you want to insert the description of the event'));
define('_ACA_JCALTAGS_START', ('Start date:'));
define('_ACA_JCALTAGS_START_TIPS', ('Select Yes if you want to insert the start date of the event'));
define('_ACA_JCALTAGS_READMORE', ('Read more:'));
define('_ACA_JCALTAGS_READMORE_TIPS', ('Select Yes if you want to insert a <b>read more link</b> for this event'));
define('_ACA_REDIRECTCONFIRMATION', ('Redirect URL'));
define('_ACA_REDIRECTCONFIRMATION_TIPS', ('If you require a confirmation e-mail, the user will be confirmed and redirected to this URL if he clicks on the confirmation link.'));

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Save');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','No account yet?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Register');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','You are not authorised to view this resource.');

//since 3.0.0
define('_ACA_DISABLETOOLTIP', ('Disable Tooltip'));
define('_ACA_DISABLETOOLTIP_TIPS', ('Disable the tooltip on the frontend'));
define('_ACA_MINISENDMAIL', ('Use Mini SendMail'));
define('_ACA_MINISENDMAIL_TIPS', ('If your server use Mini SendMail, select this option to don\'t add the name of the user in the header of the e-mail'));

//Since 3.1.5
define('_ACA_READMORE',('Read more...'));
define('_ACA_VIEWARCHIVE',('Click here'));

//since 4.0.0
define('_ACA_SHOW_JLINKS',('Link Tracking'));
define('_ACA_SHOW_JLINKS_TIPS',('Enables the integration with jLinks to be able to do link tracking for each links in the newsletter.'));

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
