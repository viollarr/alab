<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
* <p>Русский языковой файл</p>
* @author Salikhov Ilyas <salikhoff@gmail.com>
* @version $Id: russian.php 491 2007-02-01 22:56:07Z divivo $
*/


### General ###
 // Описание jnewsletter
define('_ACA_DESC_CORE', 'jNews - это инструмент почтовых рассылок, рассылки новостей и автореспондер для эффективной коммуникации с Вашими пользователя и клиентами.  ' .
		'jNews, Ваш коммуникационный партнер!');
define('_ACA_DESC_GPL', 'jNews - это инструмент почтовых рассылок, рассылки новостей и автореспондер для эффективной коммуникации с Вашими пользователя и клиентами.  ' .
		'jNews, Ваш коммуникационный партнер!');
define('_ACA_FEATURES', 'jNews, Ваш коммуникационный партнер!');

// Тип списков
define('_ACA_NEWSLETTER', 'Информационный бюллетень');
define('_ACA_AUTORESP', 'Автоответчик');
define('_ACA_AUTORSS', 'RSS-подписка');
define('_ACA_ECARD', 'eCard');
define('_ACA_POSTCARD', 'Почтовая открытка');
define('_ACA_PERF', 'Производительность');
define('_ACA_COUPON', 'Купон');
define('_ACA_CRON', 'Задача Хрона');
define('_ACA_MAILING', 'Почтовая рассылка');
define('_ACA_LIST', 'Список');

// Меню jnewsletter
define('_ACA_MENU_LIST', 'Списки');
define('_ACA_MENU_SUBSCRIBERS', 'Подписчики');
define('_ACA_MENU_NEWSLETTERS', 'Информационные бюллетени');
define('_ACA_MENU_AUTOS', 'Автоответчики');
define('_ACA_MENU_COUPONS', 'Купоны');
define('_ACA_MENU_CRONS', 'Задачи Хрона');
define('_ACA_MENU_AUTORSS', 'RSS-подписка');
define('_ACA_MENU_ECARD', 'eCards');
define('_ACA_MENU_POSTCARDS', 'Почтовые Открытки');
define('_ACA_MENU_PERFS', 'Производительность');
define('_ACA_MENU_TAB_LIST', 'Списки');
define('_ACA_MENU_MAILING_TITLE', 'Почтовые рассылки');
define('_ACA_MENU_MAILING' , 'Рассылки для ');
define('_ACA_MENU_STATS', 'Статистика');
define('_ACA_MENU_STATS_FOR', 'Статистика для');
define('_ACA_MENU_CONF', 'Конфигурация');
define('_ACA_MENU_UPDATE', 'Import');
define('_ACA_MENU_ABOUT', 'О');
define('_ACA_MENU_LEARN', 'центр Образования');
define('_ACA_MENU_MEDIA', 'Медиа-менеджер'); // был - "Менеджер Носителя"
define('_ACA_MENU_HELP', 'Помощь');
define('_ACA_MENU_CPANEL', 'CPanel');
define('_ACA_MENU_IMPORT', 'Импорт');
define('_ACA_MENU_EXPORT', 'Экспорт');
define('_ACA_MENU_SUB_ALL', 'Подписаться на все');
define('_ACA_MENU_UNSUB_ALL', 'Аннулирует всю подписку');
define('_ACA_MENU_VIEW_ARCHIVE', 'Архив');
define('_ACA_MENU_PREVIEW', 'Предпросмотр');
define('_ACA_MENU_SEND', 'Отправка');
define('_ACA_MENU_SEND_TEST', 'Электронная почта для Теста Отправки');
define('_ACA_MENU_SEND_QUEUE', 'Очередь Процесса');
define('_ACA_MENU_VIEW', 'Вид');
define('_ACA_MENU_COPY', 'Копия');
define('_ACA_MENU_VIEW_STATS' , 'Просмотр статистики');
define('_ACA_MENU_CRTL_PANEL' , 'Панель Управления');
define('_ACA_MENU_LIST_NEW' , 'Создать Список');
define('_ACA_MENU_LIST_EDIT' , 'Править Список');
define('_ACA_MENU_BACK', 'Назад');
define('_ACA_MENU_INSTALL', 'Инсталляция');
define('_ACA_MENU_TAB_SUM', 'Резюме');
define('_ACA_STATUS', 'Состояние');

// сообщения
define('_ACA_ERROR' , ' Произошла ошибка! ');
define('_ACA_SUB_ACCESS' , 'Права доступа');
define('_ACA_DESC_CREDITS', 'О модуле');
define('_ACA_DESC_INFO', 'Информация');
define('_ACA_DESC_HOME', 'Домашняя страница');
define('_ACA_DESC_MAILING', 'Список рассылки');
define('_ACA_DESC_SUBSCRIBERS', 'Подписчики');
define('_ACA_PUBLISHED','Опубликовано');
define('_ACA_UNPUBLISHED','Не опубликовано');
define('_ACA_DELETE','Удалить');
define('_ACA_FILTER','Фильтр');
define('_ACA_UPDATE','Обновить');
define('_ACA_SAVE','Сохранить');
define('_ACA_CANCEL','Отменить');
define('_ACA_NAME','Имя');
define('_ACA_EMAIL','Электронная почта');
define('_ACA_SELECT','Выбрать');
define('_ACA_ALL','Все');
define('_ACA_SEND_A', 'Отправляются... ');
define('_ACA_SUCCESS_DELETED', ' удаление прошло успешно');
define('_ACA_LIST_ADDED', 'Список успешно создан');
define('_ACA_LIST_COPY', 'Список успешно скопирован');
define('_ACA_LIST_UPDATED', 'Список успешно обновлен');
define('_ACA_MAILING_SAVED', 'Почтовые отправления успешно сохранены.');
define('_ACA_UPDATED_SUCCESSFULLY', 'успешно обновлен.');

### Subscribers information ###
// подписка и отписка новостей
define('_ACA_SUB_INFO', 'Данные подписчика');
define('_ACA_VERIFY_INFO', 'Пожалуйста, проверьте введенную вами ссылку. Некоторая информация является недостающей.');
define('_ACA_INPUT_NAME', 'Имя');
define('_ACA_INPUT_EMAIL', 'Электронная почта');
define('_ACA_RECEIVE_HTML', 'Получать HTML?');
define('_ACA_TIME_ZONE', 'Часовой пояс');
define('_ACA_BLACK_LIST', 'Чёрный список');
define('_ACA_REGISTRATION_DATE', 'Дата регистрации пользователя');
define('_ACA_USER_ID', 'Идентификатор пользователя');
define('_ACA_DESCRIPTION', 'Описание');
define('_ACA_ACCOUNT_CONFIRMED', 'Ваша учетная запись активирована.');
define('_ACA_SUB_SUBSCRIBER', 'Подписчик');
define('_ACA_SUB_PUBLISHER', 'Издатель');
define('_ACA_SUB_ADMIN', 'Администратор');
define('_ACA_REGISTERED', 'Зарегистрировано');
define('_ACA_SUBSCRIPTIONS', 'Ваша подписка');
define('_ACA_SEND_UNSUBCRIBE', 'Сообщение об аннулировании подписки');
define('_ACA_SEND_UNSUBCRIBE_TIPS', 'Нажмите Да, чтобы посылать письмо с подтверждением аннулирования подписки.');
define('_ACA_SUBSCRIBE_SUBJECT_MESS', 'Пожалуйста, подтвердите подписку');
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', 'Подтверждение отказа от подписки');
define('_ACA_DEFAULT_SUBSCRIBE_MESS', 'Здравствуйте, [NAME],<br />' .
		'Еще один шаг, и вы будете подписаны на рассылку. Пожалуйста, перейдите по ссылке чтобы подтвердить подписку.' .
		'<br /><br />[CONFIRM]<br /><br />Если у вас возникли вопросы, пожалуйста, обратитесь к администратору.');
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', 'Настоящим письмом собщаем вам, что вы были удалены из числа наши подписчиков. Мы сожалеем о том, что Вы приняли решение отказаться от подписки. Если Вы захотите восстановить подписку, Вы всегда можете сделать это на нашем сайте. Если у Вас возникнут вопросы, обращайтесь к нашему администратору.');

// Подписчики jNews
define('_ACA_SIGNUP_DATE', 'Дата подписки');
define('_ACA_CONFIRMED', 'Подтверждено');
define('_ACA_SUBSCRIB', 'Подписаться');
define('_ACA_HTML', 'HTML рассылки');
define('_ACA_RESULTS', 'Результаты');
define('_ACA_SEL_LIST', 'Выберите список');
define('_ACA_SEL_LIST_TYPE', '- Выберите тип списка -');
define('_ACA_SUSCRIB_LIST', 'Список всех подписчиков');
define('_ACA_SUSCRIB_LIST_UNIQUE', 'Подписчики на:  ');
define('_ACA_NO_SUSCRIBERS', 'Для этого списка не найдено ни одного подписчика.');
define('_ACA_COMFIRM_SUBSCRIPTION', 'Вам было выслано письмо для подтверждения подписки.  Пожалуйста, проверь почту и перейдите по высланной ссылке.<br />' .
		'Чтобы подписка была активированна, вы должны подтвердить свой e-mail.');
define('_ACA_SUCCESS_ADD_LIST', 'Вы были успешно добавлены в список подписчиков.');


 // Subcription info
define('_ACA_CONFIRM_LINK', 'Нажмите здесь, чтобы подтвердить подписку');
define('_ACA_UNSUBSCRIBE_LINK', 'Нажмите здесь, чтобы удалить себя из списка подписчиков');
define('_ACA_UNSUBSCRIBE_MESS', 'Адрес вашей электронной почты был удален из списка');

define('_ACA_QUEUE_SENT_SUCCESS' , 'Все составленные рассылки были успешно разосланы.');
define('_ACA_MALING_VIEW', 'Показать все рассылки');
define('_ACA_UNSUBSCRIBE_MESSAGE', 'Вы уверены, что хотите отказаться от рассылки по данному листу?');
define('_ACA_MOD_SUBSCRIBE', 'Подписаться');
define('_ACA_SUBSCRIBE', 'Подписаться');
define('_ACA_UNSUBSCRIBE', 'Отказаться от подписки');
define('_ACA_VIEW_ARCHIVE', 'Показать архив');
define('_ACA_SUBSCRIPTION_OR', ' или нажмите здесь чтобы принять изменения');
define('_ACA_EMAIL_ALREADY_REGISTERED', 'Этот адрес уже есть в базе.');
define('_ACA_SUBSCRIBER_DELETED', 'Подписчик успешно удален.');


### Панель Пользователя ###
 // Пользовательское Меню
define('_UCP_USER_PANEL', 'Пользовательская Панель управления');
define('_UCP_USER_MENU', 'Пользовательское Меню');
define('_UCP_USER_CONTACT', 'Мои Подписки');
 // Меню Хрона jNews
define('_UCP_CRON_MENU', 'Управление Задачами Хрона');
define('_UCP_CRON_NEW_MENU', 'Новый Хрон');
define('_UCP_CRON_LIST_MENU', 'Список мой Хрон');
 // Меню Купона jNews
define('_UCP_COUPON_MENU', 'Управление Купонами');
define('_UCP_COUPON_LIST_MENU', 'Список Купонов');
define('_UCP_COUPON_ADD_MENU', 'Добавить Купон');

### списки ###
// Вкладки
define('_ACA_LIST_T_GENERAL', 'Описание');
define('_ACA_LIST_T_LAYOUT', 'Раскладка');
define('_ACA_LIST_T_SUBSCRIPTION', 'Подписка');
define('_ACA_LIST_T_SENDER', 'Данные отправителя');

define('_ACA_LIST_TYPE', 'Тип списка');
define('_ACA_LIST_NAME', 'Имя списка');
define('_ACA_LIST_ISSUE', 'Публикация #');
define('_ACA_LIST_DATE', 'Дата отправки');
define('_ACA_LIST_SUB', 'Тема рассылки');
define('_ACA_ATTACHED_FILES', 'Прикрепленные файлы');
define('_ACA_SELECT_LIST', 'Пожалуйста, выберите список для редактирования!');

// Окно автоответчика
define('_ACA_AUTORESP_ON', 'Тип списка');
define('_ACA_AUTO_RESP_OPTION', 'Настройки автоответчика');
define('_ACA_AUTO_RESP_FREQ', 'Подписчики могут выбирать периодичность рассылки');
define('_ACA_AUTO_DELAY', 'Перерыв (в днях)');
define('_ACA_AUTO_DAY_MIN', 'Минимальная частота');
define('_ACA_AUTO_DAY_MAX', 'Максимальная частота');
define('_ACA_FOLLOW_UP', 'Определить прикрепленный автоответчик');
define('_ACA_AUTO_RESP_TIME', 'Подписчики могут выбирать время');
define('_ACA_LIST_SENDER', 'Отправитель списка');

define('_ACA_LIST_DESC', 'Описание списка');
define('_ACA_LAYOUT', 'Стиль');
define('_ACA_SENDER_NAME', 'Имя отправителя');
define('_ACA_SENDER_EMAIL', 'Эл. адрес отправителя');
define('_ACA_SENDER_BOUNCE', 'Обратный адрес отправителя');
define('_ACA_LIST_DELAY', 'Перерыв');
define('_ACA_HTML_MAILING', 'HTML рассылка?');
define('_ACA_HTML_MAILING_DESC', '(Если Вы сохраните это, Вам будет необходимо выйти и снова войти на страницу, чтобы увидеть изменения.)');
define('_ACA_HIDE_FROM_FRONTEND', 'Не показывать во фронтенд?');
define('_ACA_SELECT_IMPORT_FILE', 'Выберите файл для импорта');;
define('_ACA_IMPORT_FINISHED', 'Импортирование закончено');
define('_ACA_DELETION_OFFILE', 'Удаление файла');
define('_ACA_MANUALLY_DELETE', 'не состоялось, вы должны вручную удалить файл');
define('_ACA_CANNOT_WRITE_DIR', 'Не могу записать в директорию');
define('_ACA_NOT_PUBLISHED', 'Не могу разослать рассылку.Список не опубликован.');

//  Информационный блок списков
define('_ACA_INFO_LIST_PUB', 'Надмите Да, чтобы опубликовать список.');
define('_ACA_INFO_LIST_NAME', 'Введите имя списка. С помощью этого имени Вы сможете идентифицировать список.');
define('_ACA_INFO_LIST_DESC', 'Введите краткое описание вашего списка. Оно будет доступно для посетителей вашего ресурса.');
define('_ACA_INFO_LIST_SENDER_NAME', 'Введите имя отправителя сообщения. Это имя будут видеть Ваши подписчики в графе "от кого".');
define('_ACA_INFO_LIST_SENDER_EMAIL', 'Введите электронный адрес, с которого будут отправляться сообщения.');
define('_ACA_INFO_LIST_SENDER_BOUNCED', 'Введите электронный адрес для ответов подписчиков. Настоятельно рекомендуется указывать тот же адрес, что и у автора рассылки, так как такое письмо легче проходит через спам-фильтры почтовых систем.');
define('_ACA_INFO_LIST_AUTORESP', 'Выберите тип рассылок для данного списка. <br />' .
		'Новостная рассылка: Обычная новостная рассылка<br />' .
		'Автоответчик: автоответчик это лист, который рассылается автоматически через веб-сайт через заданные промежутки времени.');
define('_ACA_INFO_LIST_FREQUENCY', 'Разрешить пользователям выбирать, насколько часто они будут получать письма. Это рассылку более гибкой и удобной для пользователей.');
define('_ACA_INFO_LIST_TIME', 'Разрешить пользователям выбирать время дня, предпочтительное для получения рассылки.');
define('_ACA_INFO_LIST_MIN_DAY', 'Установите минимальную периодичность получения рассылки, которую может выбрать пользователь.');
define('_ACA_INFO_LIST_DELAY', 'Задайте интервал между работой этого автоответчика и предыдущего.');
define('_ACA_INFO_LIST_DATE', 'Установите дату отправки (публикации) новостной рассылки, если Вы хотите отложить публикацию.<br /> FORMAT : YYYY-MM-DD HH:MM:SS');
define('_ACA_INFO_LIST_MAX_DAY', 'Установите максимальную периодичность получения рассылки, которую может выбрать пользователь.');
define('_ACA_INFO_LIST_LAYOUT', 'Введите стиль Вашего списка подписки. Здесь Вы можете ввести любой стиль для Ваших рассылок.');
define('_ACA_INFO_LIST_SUB_MESS', 'Это сообщение будет отправлено пользователю, который впервые зарегистрировался. Вы можете ввести здесь любой свой текст.');
define('_ACA_INFO_LIST_UNSUB_MESS', 'Это сообщение будет отправлено пользователю, который аннулирует подписку. Вы можете ввести здесь любой свой текст.');
define('_ACA_INFO_LIST_HTML', 'Выберите эту опцию, если Вы хотите рассылать сообщения в формате HTML. Пользователи могут выбирать между HTML вариантом рассылки и обычным текстом, когда подписываются на HTML рассылку.');
define('_ACA_INFO_LIST_HIDDEN', 'Нажмите Да, чтобы убрать подписку с фронтенда. Пользователи не смогут подписаться на рассылку, но Вы по-прежнему сможете отправлять сообщения уже подписавшимся.');
define('_ACA_INFO_LIST_ACA_AUTO_SUB', 'Вы хотите, чтобы пользователи автоматически добавлялись в этот список?<br /><B>Новые пользователи:</B> будут зарегистрированы все новые пользователи, зарегистрированные на сайте .<br /><B>Все пользователи:</B> будут зарегистрированы все пользователи, содержащиеся в базе данных.<br />(выбор варианта Все поддерживает Community Builder)');
define('_ACA_INFO_LIST_ACC_LEVEL', 'Выберите уровень доступа с фронтенда. Это позволяет показывать или скрывать рассылки от пользователей, которые не должны иметь доступа к этим подпискам, то есть они не смогут подписаться на эти рассылки.');
define('_ACA_INFO_LIST_ACC_USER_ID', 'Выберите уровень доступа для групп пользователей, которым разрешено редактирование. Эта группа и другие с более высокими уровнями доступа смогут редактировать рассылку и осуществлять отправку, как с фронтенда, так и из панели администратора.');
define('_ACA_INFO_LIST_FOLLOW_UP', 'Если Вы хотите, чтобы автоответчик передал действие другому, после того как дойдет до последнего сообщения, определите здесь последующий.');
define('_ACA_INFO_LIST_ACA_OWNER', 'Это ID пользователя, создавшего список.');
define('_ACA_INFO_LIST_WARNING', '   Эта последняя опция доступна только при создании списка.');
define('_ACA_INFO_LIST_SUBJET', ' Тема рассылки.  Это тема письма, которую будет видеть подписчик.');
define('_ACA_INFO_MAILING_CONTENT', 'Это содержание письма, которое Вы хотите отправить.');
define('_ACA_INFO_MAILING_NOHTML', 'Введите здесь содержание письма, которое Вы хотите отправить подписчикам решившим получать только HTML рассылки. <BR/> ЗАМЕЧАНИЕ: если вы оставите эту опцию пустой, то jNews автоматически преобразует HTML текст в обычный текст.');
define('_ACA_INFO_MAILING_VISIBLE', 'Нажмите Да, чтобы отображать рассылку во фронтенде.');
define('_ACA_INSERT_CONTENT', 'Вставить существующий контент');

// Купоны
define('_ACA_SEND_COUPON_SUCCESS', 'Купон успешно отправлен!');
define('_ACA_CHOOSE_COUPON', 'Выберите купон');
define('_ACA_TO_USER', ' этому пользователю');

### опции Хрона (демон ОС Unix, исполняющий предписанные команды в строго определённые дни и часы, указанные в специальном файле)
//надписи частоты рассылки Хрона
define('_ACA_FREQ_CH1', 'Каждый час');
define('_ACA_FREQ_CH2', 'Каждые 6 часов');
define('_ACA_FREQ_CH3', 'Каждые 12 часов');
define('_ACA_FREQ_CH4', 'Ежедневно');
define('_ACA_FREQ_CH5', 'Еженедельно');
define('_ACA_FREQ_CH6', 'Ежемесячно');
define('_ACA_FREQ_NONE', 'Нет');
define('_ACA_FREQ_NEW', 'Новый пользователь');
define('_ACA_FREQ_ALL', 'Все пользователи');

//Подписи для формы Хрона
define('_ACA_LABEL_FREQ', 'jNews Хрон?');
define('_ACA_LABEL_FREQ_TIPS', 'Нажмите Да, если Вы хотите использовать это для Хрона jNews, Нет для любого другого Хрон задания.<br />' .
		'Если выберете Да, Вам не нужно будет задавать адрес Хрона, он будет автоматически добавлен.');
define('_ACA_SITE_URL' , 'URL вашего сайта');
define('_ACA_CRON_FREQUENCY' , 'Частота запуска Хрона');
define('_ACA_STARTDATE_FREQ' , 'Дата начала');
define('_ACA_LABELDATE_FREQ' , 'Выберите дату');
define('_ACA_LABELTIME_FREQ' , 'Выберите время');
define('_ACA_CRON_URL', 'Хрон URL');
define('_ACA_CRON_FREQ', 'Частота');
define('_ACA_TITLE_CRONLIST', 'Список задач Хрона');
define('_NEW_LIST', 'Создать новый список');

//заголовок формы Хрона
define('_ACA_TITLE_FREQ', 'Редактор Хрона');
define('_ACA_CRON_SITE_URL', 'Пожалуйста, введите правильный адресс, начинающийся с http://');

### Рассылки ###
define('_ACA_MAILING_ALL', 'Все рассылки');
define('_ACA_EDIT_A', 'Редактировать... ');
define('_ACA_SELCT_MAILING', 'Пожалуйста, выберите список в выпадающем меню, чтобы добавить новую рассылку.');
define('_ACA_VISIBLE_FRONT', 'Видна во фронтенде');

// рассыльщик
define('_ACA_SUBJECT', 'Тема');
define('_ACA_CONTENT', 'Содержание');
define('_ACA_NAMEREP', '[NAME] = Это будет заменено на имя введенное подписчиком, При использовании этого, Вы будете рассылать письма, написанные непосредственно на имя подписчика.<br />');
define('_ACA_FIRST_NAME_REP', '[FIRSTNAME] = Это будет заменено на Имя (имя, введенное первым) подписчика.<br />');
define('_ACA_NONHTML', 'Не html версия');
define('_ACA_ATTACHMENTS', 'Прикрепленные данные');
define('_ACA_SELECT_MULTIPLE', 'Удерживайте ctrl, чтобы выбрать сразу несколько элементов.<br />' .
		'Файлы, показанные в списке прикрепленных данных расположены в папке прикрепленных файлов, Вы можете изменить их местонахождение в панели конфигурации.');
define('_ACA_CONTENT_ITEM', 'Часть контента');
define('_ACA_SENDING_EMAIL', 'Идет рассылка');
define('_ACA_MESSAGE_NOT', 'Сообщение не может быть отослано');
define('_ACA_MAILER_ERROR', 'Ошибка отправки');
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', 'Сообщение было успешно отправлено');
define('_ACA_SENDING_TOOK', 'Отправка данной рассылки заняла');
define('_ACA_SECONDS', 'сек.');
define('_ACA_NO_ADDRESS_ENTERED', 'Не доступно ни одного адреса подписчика для оправки');
define('_ACA_CHANGE_SUBSCRIPTIONS', 'Изменить');
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', 'Изменение Вашей подписки');
define('_ACA_WHICH_EMAIL_TEST', 'Выберите e-mail, чтобы отправить на него тестовое сообщение, или нажмите предпросмотр');
define('_ACA_SEND_IN_HTML', 'Оправлять в HTML  формате (для html рассылок)?');
define('_ACA_VISIBLE', 'Видимое');
define('_ACA_INTRO_ONLY', 'Только вступление');

// статистика
define('_ACA_GLOBALSTATS', 'Глобальная статистика');
define('_ACA_DETAILED_STATS', 'Детализированная статистика');
define('_ACA_MAILING_LIST_DETAILS', 'Детали списка рассылки');
define('_ACA_SEND_IN_HTML_FORMAT', 'Отправлять в HTML формате');
define('_ACA_VIEWS_FROM_HTML', 'Просмотры (из сообщений, отправленных в формате html)');
define('_ACA_SEND_IN_TEXT_FORMAT', 'Разослано в текстовом формате');
define('_ACA_HTML_READ', 'HTML прочитано');
define('_ACA_HTML_UNREAD', 'HTML не прочитано');
define('_ACA_TEXT_ONLY_SENT', 'Только текст');

// Панель Конфигурирования
// закладки
define('_ACA_MAIL_CONFIG', 'Почта');
define('_ACA_LOGGING_CONFIG', 'Логи и статистика');
define('_ACA_SUBSCRIBER_CONFIG', 'Подписчики');
define('_ACA_MISC_CONFIG', 'Разное');
define('_ACA_MAIL_SETTINGS', 'Настройки почты');
define('_ACA_MAILINGS_SETTINGS', 'Настройки рассылок');
define('_ACA_SUBCRIBERS_SETTINGS', 'Настройки подписчиков');
define('_ACA_CRON_SETTINGS', 'Настройки Хрона');
define('_ACA_SENDING_SETTINGS', 'Настройки отправки');
define('_ACA_STATS_SETTINGS', 'Настройки статистики');
define('_ACA_LOGS_SETTINGS', 'Настройки логов');
define('_ACA_MISC_SETTINGS', 'Другие настройки');
// mail settings
define('_ACA_SEND_MAIL_FROM', 'Адрес отправителя');
define('_ACA_SEND_MAIL_NAME', 'Имя отправителя');
define('_ACA_MAILSENDMETHOD', 'Метод рассылки');
define('_ACA_SENDMAILPATH', 'Путь к папке "Отосланные"');
define('_ACA_SMTPHOST', 'SMTP сервер');
define('_ACA_SMTPAUTHREQUIRED', 'Требуется аутентификация для SMTP');
define('_ACA_SMTPAUTHREQUIRED_TIPS', 'Выберите Да, если Ваш SMTP требует аутентификацию');
define('_ACA_SMTPUSERNAME', 'SMTP логин');
define('_ACA_SMTPUSERNAME_TIPS', 'Введите SMTP логин, если Ваш SMTP требует аутентификацию');
define('_ACA_SMTPPASSWORD', 'SMTP пароль');
define('_ACA_SMTPPASSWORD_TIPS', 'Введите SMTP пароль, если Ваш SMTP требует аутентификацию');
define('_ACA_USE_EMBEDDED', 'Использовать вставленные изображения');
define('_ACA_USE_EMBEDDED_TIPS', 'Выберите "Да", если картинки в прикрепленных элементах должны быть уложены в письмо для html сообщений, или "Нет", чтобы использовать обычные теги картинок, ссылающихся на картинки на веб-ресурсе.');
define('_ACA_UPLOAD_PATH', 'Путь к папке Загрузки/Вложения');
define('_ACA_UPLOAD_PATH_TIPS', 'Вы можете задать директорию для загрузки файлов на сервер<br />' .
		'Убедитесь, что директория, которую вы создали существует, если её нет, то создайте ее.');

// настройки подписчиков
define('_ACA_ALLOW_UNREG', 'Позволять незарегистрированным');
define('_ACA_ALLOW_UNREG_TIPS', 'Выберите "Да", если Вы хотите разрешить пользователям подписываться на рассылку без регистрации на сайте.');
define('_ACA_REQ_CONFIRM', 'Требовать письмо-подтверждение');
define('_ACA_REQ_CONFIRM_TIPS', 'Выберите "Да", если требуете от незарегистрировавшихся пользователей подтверждения их электронной почте.');
define('_ACA_SUB_SETTINGS', 'Настройки подписчика');
define('_ACA_SUBMESSAGE', 'Адрес для подписки');
define('_ACA_SUBSCRIBE_LIST', 'Подписаться на рассылку');

define('_ACA_USABLE_TAGS', 'Полезные тэги');
define('_ACA_NAME_AND_CONFIRM', '<b>[CONFIRM]</b> = создает кликабельную ссылку, пройдя по которой пользователь может подтвердить подписку. Эта опция <strong>необходима</strong>, чтобы jNews работал правильно.<br />'
.'<br />[NAME] = Это будет заменено на имя введенное подписчиком, При использовании этого, Вы будете рассылать письма, написанные непосредственно на имя подписчика.<br />'
.'<br />[FIRSTNAME] = Это будет заменено ИМЕНЕМ подписчика, за имя подписчика принимается первое из введенных имен.<br />');
define('_ACA_CONFIRMFROMNAME', 'Подтверждение, от:');
define('_ACA_CONFIRMFROMNAME_TIPS', 'Введите имя отправителя для показа в сообщениях подтверждения подписки.');
define('_ACA_CONFIRMFROMEMAIL', 'Подтверждение, с адреса:');
define('_ACA_CONFIRMFROMEMAIL_TIPS', 'Введите адрес для показа в сообщениях подтверждения подписки.');
define('_ACA_CONFIRMBOUNCE', 'E-mail адрес для уведомлений о несуществующих адресах');
define('_ACA_CONFIRMBOUNCE_TIPS', 'Введите адрес, который будет отображаться в сообщениях подтверждения подписки, и на который Вы хотели бы, чтобы поступали сообщения о несуществующих e-mail адресах подписчиков.');
define('_ACA_HTML_CONFIRM', 'HTML подтверждение');
define('_ACA_HTML_CONFIRM_TIPS', 'Выберите "Да", если Вы хотите отправлять сообщения подтверждения в формате HTML (если пользователь разрешил присылать ему такие письма).');
define('_ACA_TIME_ZONE_ASK', 'Спрашивать часовой пояс');
define('_ACA_TIME_ZONE_TIPS', 'Выберите "Да", если хотите запрашивать ввод часового пояса. Рассылки, находящиеся в очереди будут выполняться используя это значение.');

 // Настройки Хрона
 define('_ACA_AUTO_CONFIG', 'Хрон');
define('_ACA_TIME_OFFSET_URL', 'Нажмите здесь, чтобы установить расхождение в панели глобальной конфигурации - Локаль');
define('_ACA_TIME_OFFSET_TIPS', 'Установите временное смещение сервера, которое будет вписано в точную дату и время');
define('_ACA_TIME_OFFSET', 'Сдвиг времени');
define('_ACA_CRON_DESC','<br />Используя функцию Хрон, Вы можете установить автоматическую задачу, которая будет выполняться по расписанию, для Вашего сайта!<br />' .
		'Чтобы настроить это, Вам нужно добавить из панели управления в задачи по расписанию следующую команду:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Если вам понадобится помощь, то получить её можно на форуме разработчиков <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>');

// установки отправки
define('_ACA_PAUSEX', 'Пауза x секунд после каждого сконфигурированного и заданного количества писем');
define('_ACA_PAUSEX_TIPS', 'Введите время в секундах, которое jNews будет давать Вашему SMTP серверу в качестве паузы между отправками заданного сконфигурированного количества писем.');
define('_ACA_EMAIL_BET_PAUSE', 'Письма между паузами');
define('_ACA_EMAIL_BET_PAUSE_TIPS', 'Количество писем для отправки до паузы.');
define('_ACA_WAIT_USER_PAUSE', 'Ждать ввода пользователем команды при паузе');
define('_ACA_WAIT_USER_PAUSE_TIPS', 'Должен ли скрипт при паузе ожидать ввода пользователем команды для отправки следующего пакета писем.');
define('_ACA_SCRIPT_TIMEOUT', 'Пауза скрипта');
define('_ACA_SCRIPT_TIMEOUT_TIPS', 'Количество минут, которое скрипт будет запущен (0 для снятия ограничения).');
// установки статистики
define('_ACA_ENABLE_READ_STATS', 'Разрешить вести статистику');
define('_ACA_ENABLE_READ_STATS_TIPS', 'Выберите Да, если Вы хотите сохранять количество просмотров. Данная статистика может вестись только для писем в формате HTML');
define('_ACA_LOG_VIEWSPERSUB', 'Записывать просмотры пользователя');
define('_ACA_LOG_VIEWSPERSUB_TIPS', 'Выберите Да, если Вы хотите сохранять количество просмотров выпусков рассылки отдельным подписчиком. Данная статистика может вестись только для писем в формате HTML');
// установки логов
define('_ACA_DETAILED', 'Детальные логи');
define('_ACA_SIMPLE', 'Упрощенные логи');
define('_ACA_DIAPLAY_LOG', 'Отображать логи');
define('_ACA_DISPLAY_LOG_TIPS', 'Выберите "Да", если хотите отображать логи в момент рассылки писем.');
define('_ACA_SEND_PERF_DATA', 'Отсылать статистику');
define('_ACA_SEND_PERF_DATA_TIPS', 'Выберите "Да", если Вы хотите разрешить, чтобы jNews отсылал АНОНИМНЫЕ сведения о конфигурации, количестве подписчиков и времени, которое занимает отправка сообщений. Это даст разработчикам идеи по улучшению работы компонента и поможет оптимизировать его в будущих релизах.');
define('_ACA_SEND_AUTO_LOG', 'Отправлять логи для автореспондера');
define('_ACA_SEND_AUTO_LOG_TIPS', 'Выберите Да, если Вы хотите, чтобы программа отправляла Вам сообщение каждый раз, когда обработан запрос. Предупреждение: это может привести к большому количеству сообщений в Вашем почтовом ящике.');
define('_ACA_SEND_LOG', 'Отправлять лог');
define('_ACA_SEND_LOG_TIPS', 'Должен ли быть лог отправки рассылки быть отправлен на почтовый адрес пользователя, который произвел рассылку.');
define('_ACA_SEND_LOGDETAIL', 'Отправлять детальные логи');
define('_ACA_SEND_LOGDETAIL_TIPS', 'Детальные логи включают в себя информацию об успешной или неудачной отправке сообщения каждому подписчику и обзор информации (статистику). Упрощенные отсылают только обзор.');
define('_ACA_SEND_LOGCLOSED', 'Отправлять лог, если соединение закрыто');
define('_ACA_SEND_LOGCLOSED_TIPS', 'С этой включенной опцией пользователь, производящий рассылку, получит отчет о рассылке по электронной почте.');
define('_ACA_SAVE_LOG', 'Сохранять лог');
define('_ACA_SAVE_LOG_TIPS', 'Должен ли лог отправки рассылки быть сохранен в файле лога');
define('_ACA_SAVE_LOGDETAIL', 'Сохранять детальный лог');
define('_ACA_SAVE_LOGDETAIL_TIPS', 'Детальные логи включают в себя информацию об успешной или неудачной отправке сообщения каждому подписчику и обзор информации (статистику). Упрощенные включают только обзор.');
define('_ACA_SAVE_LOGFILE', 'Сохранить файл лога');
define('_ACA_SAVE_LOGFILE_TIPS', 'Файл, в который записывается информация лога. Позднее этот файл может стать значительно больше.');
define('_ACA_CLEAR_LOG', 'Очистить лог');
define('_ACA_CLEAR_LOG_TIPS', 'Очистить файл лога.');

### панель управления
define('_ACA_CP_LAST_QUEUE', 'Последний обработанный запрос');
define('_ACA_CP_TOTAL', 'Всего');
define('_ACA_MAILING_COPY', 'Рассылка успешно скопирована!');

// разнообразные настройки
define('_ACA_SHOW_GUIDE', 'Показать руководство');
define('_ACA_SHOW_GUIDE_TIPS', 'Показывать руководство при старте программы, чтобы помочь новым пользователям создать новостную рассылку, настроить автореспондер и корректно настроить jNews.');
define('_ACA_AUTOS_ON', 'Использовать Автореспондеры');
define('_ACA_AUTOS_ON_TIPS', 'Выберите Нет, если Вы не хотите использовать автореспондеры, и опции автореспондеров будут деактивированы.');
define('_ACA_NEWS_ON', 'Использовать Новостные рассылки');
define('_ACA_NEWS_ON_TIPS', 'Выберите Нет, если Вы не хотите использовать новостные рассылки, и все их опции будут деактивированы.');
define('_ACA_SHOW_TIPS', 'Показывать советы');
define('_ACA_SHOW_TIPS_TIPS', 'Показать советы, чтобы помочь пользователям использовать jNews более эффективно.');
define('_ACA_SHOW_FOOTER', 'Показывать футер (footer)');
define('_ACA_SHOW_FOOTER_TIPS', 'Должно ли быть показано извещение об авторских правах.');
define('_ACA_SHOW_LISTS', 'Показывать список во фронтенде');
define('_ACA_SHOW_LISTS_TIPS', 'Показывать незарегистрированным пользователям список рассылок, на которые они могут подписаться с кнопкой перехода в архив подписки, или же просто форму регистрации, чтобы они могли зарегистрироваться.');
define('_ACA_CONFIG_UPDATED', 'Конфигурация была успешно обновлена!');
define('_ACA_UPDATE_URL', 'URL для обновлений');
define('_ACA_UPDATE_URL_WARNING', 'ВНИМАНИЕ! Не изменяйте этот URL, кроме случаев, когда Вас об этом просит техническая команда jNews.<br />');
define('_ACA_UPDATE_URL_TIPS', 'Пример: http://www.ijoobi.com/update/ (Включая закрывающий слеш)');

// модуль
define('_ACA_EMAIL_INVALID', 'Введенный e-mail некорректен.');
define('_ACA_REGISTER_REQUIRED', 'Пожалуйста, зарегистрируйтесь на сайте перед тем, как Вы подпишетесь на рассылку.');

// блок уровней доступа
define('_ACA_OWNER', 'Создатель рассылки:');
define('_ACA_ACCESS_LEVEL', 'Установить уровень доступа к рассылке');
define('_ACA_ACCESS_LEVEL_OPTION', 'Опции доступа');
define('_ACA_USER_LEVEL_EDIT', 'Выберите, какая группа пользователей сможет редактировать рассылку по этому списку (как с фронтенда, так и с бэкенда)');

//  выпадающие опции
define('_ACA_AUTO_DAY_CH1', 'Ежедневно');
define('_ACA_AUTO_DAY_CH2', 'Ежедневно, кроме выходных');
define('_ACA_AUTO_DAY_CH3', 'По дням недели');
define('_ACA_AUTO_DAY_CH4', 'По дням недели, кроме праздников');
define('_ACA_AUTO_DAY_CH5', 'Еженедельно');
define('_ACA_AUTO_DAY_CH6', 'Раз в две недели');
define('_ACA_AUTO_DAY_CH7', 'Ежемесячно');
define('_ACA_AUTO_DAY_CH9', 'Ежегодно');
define('_ACA_AUTO_OPTION_NONE', 'Нет');
define('_ACA_AUTO_OPTION_NEW', 'Новые Подписчики');
define('_ACA_AUTO_OPTION_ALL', 'Все Подписчики');

//
define('_ACA_UNSUB_MESSAGE', 'Письмо об аннулировании подписки');
define('_ACA_UNSUB_SETTINGS', 'Установки аннулирования подписки');
define('_ACA_AUTO_ADD_NEW_USERS', 'Автоподписка пользователей?');

// Update and upgrade messages
define('_ACA_NO_UPDATES', 'Нет возможных обновлений.');
define('_ACA_VERSION', 'Версия jNews');
define('_ACA_NEED_UPDATED', 'Файлы, которые необходимо заменить на новые:');
define('_ACA_NEED_ADDED', 'Файлы, которые необходимо добавить:');
define('_ACA_NEED_REMOVED', 'Файлы, которые необходимо удалить:');
define('_ACA_FILENAME', 'Имя файла:');
define('_ACA_CURRENT_VERSION', 'Текущая версия:');
define('_ACA_NEWEST_VERSION', 'Последняя версия:');
define('_ACA_UPDATING', 'Идет обновление');
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', 'Файлы были успешно обновлены.');
define('_ACA_UPDATE_FAILED', 'Не удалось обновить!');
define('_ACA_ADDING', 'Идет добавление');
define('_ACA_ADDED_SUCCESSFULLY', 'Добавление прошло успешно.');
define('_ACA_ADDING_FAILED', 'Не удалось добавить!');
define('_ACA_REMOVING', 'Идет удаление');
define('_ACA_REMOVED_SUCCESSFULLY', 'Удаление прошло успешно.');
define('_ACA_REMOVING_FAILED', 'Не удалось удалить!');
define('_ACA_INSTALL_DIFFERENT_VERSION', 'Проинсталлируйте другую версию');
define('_ACA_CONTENT_ADD', 'Добавить содержимое');
define('_ACA_UPGRADE_FROM', 'Импорт информации (выпусков рассылок и подписчиков) из: ');
define('_ACA_UPGRADE_MESS', 'Нет никакого риска потерять Ваши существующие данные. <br /> Этот процесс просто импортирует информацию в базу данных jNews.');
define('_ACA_CONTINUE_SENDING', 'Продолжить отправку');

// сообщения jNews
define('_ACA_UPGRADE1', 'Вы можете легко импортировать своих подписчиков и сообщения из ');
define('_ACA_UPGRADE2', ' в jNews через панель обновлений.');
define('_ACA_UPDATE_MESSAGE', 'Доступна новая версия jNews! ');
define('_ACA_UPDATE_MESSAGE_LINK', 'Нажмите здесь для обновления!');
define('_ACA_THANKYOU', 'Спасибо Вам за использование jNews, Вашего коммуникационного партнера!');
define('_ACA_NO_SERVER', 'Сервер обновлений недоступен, пожалуйста, попробуйте позднее.');
define('_ACA_MOD_PUB', 'Модуль jNews не опубликован.');
define('_ACA_MOD_PUB_LINK', 'Нажмите здесь для его публикации!');
define('_ACA_IMPORT_SUCCESS', 'успешно импортировано');
define('_ACA_IMPORT_EXIST', 'подписчик уже существует в базе');

// Мастер jNews
define('_ACA_GUIDE', ' мастер');
define('_ACA_GUIDE_FIRST_ACA_STEP', '<p>jNews имеет много опций, и этот Мастер проведет Вас в четыре простых шага к тому, чтобы Вы смогли начать отправлять Ваши почтовые рассылки и пользоваться автореспондерами!<p />');
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', 'Во-первых, Вам нужно создать список рассылки. Список может быть двух типов, новостная рассылка или автореспондер.' .
		'  В настройках списка Вы можете установить различные параметры для Ваших новостных рассылок или автореспондеров: имя отправителя, стиль, приветственные сообщения подписчикам и так далее...
<br /><br />Вы можете настроить свой первый список подписки здесь: <a href="index2.php?option=com_jnewsletter&act=list">создать лист</a> и нажмите кнопку Новый (New).');
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', 'jNews предоставляет Вам легкий способ импортировать всю информацию из Вашей предыдущей системы почтовых рассылок.<br />' .
		' Откройте панель Обновлений и выберите Вашу предыдущую систему почтовых рассылок, чтобы импортировать из нее все выпуски рассылки и подписчиков.<br /><br />' .
		'<span style="color:#FF5E00;" >ВАЖНО: импорт безопасен и не может повредить или удалить информацию из Вашей предыдущей системы</span><br />' .
		'После импортирования Вы сможете управлять Вашими подписчиками и рассылками непосредственно в jNews.<br /><br />');
define('_ACA_GUIDE_SECOND_ACA_STEP', 'Великолепно! Ваш первый список создан! Теперь Вы можете создать свои первые %s. Чтобы создать их, пройдите: ');
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', 'Управление автореспондерами');
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', 'Управление рассылками');
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', ' и выберите Ваше %s. <br /> Затем выберите Ваше %s из выпадающего меню. Создайте Ваше первое письмо, кликнув на Новый (New) ');
define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', 'До отправки вашей первой рассылки, возможно, Вам следует проверить почтовые настройки  ' .
		'Пройдите по ссылке <a href="index2.php?option=com_jnewsletter&act=configuration" >конфигурации</a>, чтобы проверить почтовые настройки. <br />');
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', '<br />Когда Вы будете готовы, вернитесь в меню Почтовых рассылок, выберите Ваше письмо и нажмите Отправить');
define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', 'Для Ваших автореспондеров, во-первых, Вам нужно установить Задачу по расписанию (хрон) на Вашем сервере. ' .
		' Пожалуйста, откройте вкладку Задач по расписанию (Хрона) в панели конфигурации.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration">нажмите здесь</a> чтобы узнать больше об установке задачи по расписанию (хронов). <br />');
define('_ACA_GUIDE_MODULE', ' <br />Также удостоверьтесь в том, что Вы опубликовали модуль jNews и посетители могут подписаться на рассылку.');
define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', ' Также вы можете настроить автореспондер.');
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', ' Также Вы можете настроить почтовую рассылку.');
define('_ACA_GUIDE_FOUR_ACA_STEP', '<p><br />Вуа-ля! Теперь Вы готовы эффективно взаимодействовать с Вашими посетителями и пользователями. Работа этого мастера будет завершена, как только Вы отправите свою вторую рассылку, или Вы можете отключить его в <a href="index2.php?option=com_jnewsletter&act=configuration" >панели конфигурации</a>.' .
		'<br /><br />  Если у Вас появились вопросы при использовании jNews, пожалуйста, обращайтесь на ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >форум</a>. ' .
		' Также Вы найдете массу информации о том, как эффективно взаимодействовать с Вашими подписчиками, здесь <a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a>.' .
		'<p /><br /><b>Спасибо Вам за использование jNews. Ваш коммуникационный партнер!</b> ');
define('_ACA_GUIDE_TURNOFF', 'Мастер теперь отключен!');
define('_ACA_STEP', 'ШАГ ');

// установка jNews
define('_ACA_INSTALL_CONFIG', 'Конфигурация jNews');
define('_ACA_INSTALL_SUCCESS', 'Установка успешна');
define('_ACA_INSTALL_ERROR', 'Ошибка установки');
define('_ACA_INSTALL_BOT', 'Плагин (Бот) jNews ');
define('_ACA_INSTALL_MODULE', 'Модуль jNews');
//Другое
define('_ACA_JAVASCRIPT','!Внимание! Javascript должен быть включен для корректной работы.');
define('_ACA_EXPORT_TEXT','Подписчики экспортируются на основе выбранного Вами списка.<br />Экспорт подписчиков из списка');
define('_ACA_IMPORT_TIPS','Импорт подписчиков. Информация в импортируемом файле должна быть в следующем формате: <br />' .
		'Имя,email,получатьHTML(1/0),<span style="color: rgb(255, 0, 0);">подтвержден(1/0)</span>');
define('_ACA_SUBCRIBER_EXIT', 'уже является подписчиком');
define('_ACA_GET_STARTED', 'Нажмите здесь, чтобы начать!');

//Новое, начиная с 1.0.1
define('_ACA_WARNING_1011','Предупреждение: 1011: Обновления не будут работать из-за ограничений на Вашем сервере.');
define('_ACA_SEND_MAIL_FROM_TIPS', 'Выберите, какой email адрес будет показываться как адрес отправителя.');
define('_ACA_SEND_MAIL_NAME_TIPS', 'Выберите, какое имя будет показываться как имя отправителя.');
define('_ACA_MAILSENDMETHOD_TIPS', 'Выберите метод отправки почты: почтовая функция PHP<span>Sendmail</span> или SMTP сервер.');
define('_ACA_SENDMAILPATH_TIPS', 'Это директория почтового сервера');
define('_ACA_LIST_T_TEMPLATE', 'Шаблон');
define('_ACA_NO_MAILING_ENTERED', 'Не выбрана рассылка');
define('_ACA_NO_LIST_ENTERED', 'Не выбран список');
define('_ACA_SENT_MAILING' , 'Отправленные рассылки');
define('_ACA_SELECT_FILE', 'Выберите файл для ');
define('_ACA_LIST_IMPORT', 'Выберите списки, с которыми Вы хотели бы проассоциировать своих подписчиков');
define('_ACA_PB_QUEUE', 'Подписчик добавлен, но возникла проблема при присоедии его к списку(-ам). Пожалуйста, проверьте вручную.');
define('_ACA_UPDATE_MESS' , '');
define('_ACA_UPDATE_MESS1' , 'Настоятельно рекомендуется обновить!');
define('_ACA_UPDATE_MESS2' , 'Патчи и маленькие доделки.');
define('_ACA_UPDATE_MESS3' , 'Новый релиз.');
define('_ACA_UPDATE_MESS5' , 'Joomla 1.5 необходима для обновления.');
define('_ACA_UPDATE_IS_AVAIL' , ' доступен!');
define('_ACA_NO_MAILING_SENT', 'Нет отправленных рассылок!');
define('_ACA_SHOW_LOGIN', 'Показывать форму логина');
define('_ACA_SHOW_LOGIN_TIPS', 'Выберите Да, чтобы показывать форму авторизации во фронтенде панели управления jNews, чтобы пользователь мог зарегистрироваться на сайте.');
define('_ACA_LISTS_EDITOR', 'Редактор описания списка');
define('_ACA_LISTS_EDITOR_TIPS', 'Выберите Да, чтобы использовать HTML-редактор для редактирования поля описания списка.');
define('_ACA_SUBCRIBERS_VIEW', 'Просмотр подписчиков');

//Новое, начиная с 1.0.2
define('_ACA_FRONTEND_SETTINGS' , 'Настройки фронтенда' );
define('_ACA_SHOW_LOGOUT', 'Показывать кнопку выхода');
define('_ACA_SHOW_LOGOUT_TIPS', 'Выберите Да, чтобы показывать кнопку выхода во фронтенде панели управления jNews.');

//Новое, начиная с 1.0.3, CB интеграция

define('_ACA_CONFIG_INTEGRATION', 'Интеграция');
define('_ACA_CB_INTEGRATION', 'Интеграция с Community Builder');
define('_ACA_INSTALL_PLUGIN', 'Плагин для Community Builder (Интеграция с jNews) ');
define('_ACA_CB_PLUGIN_NOT_INSTALLED', 'Плагин jNews для Community Builder еще не установлен!');
define('_ACA_CB_PLUGIN', 'Списки при регистрации');
define('_ACA_CB_PLUGIN_TIPS', 'Выберите Да, чтобы показывать перечень Списков в форме регистрации Community Builder');
define('_ACA_CB_LISTS', 'Идентификаторы Списков');
define('_ACA_CB_LISTS_TIPS', 'ЭТО ПОЛЕ ОБЯЗАТЕЛЬНО ДЛЯ ЗАПОЛНЕНИЯ. Введите через запятую номера id Списков, которые должны видеть пользователи при регистрации для подписки на них,  (При установке поля в 0 будут показаны все списки)');
define('_ACA_CB_INTRO', 'Текст приветствия');
define('_ACA_CB_INTRO_TIPS', 'Текст, который появится до перечня возможных подписок. ОСТАВЬТЕ ПУСТЫМ, ЕСЛИ НИЧЕГО НЕ ХОТИТЕ ПОКАЗЫВАТЬ. Вы можете использовать тэги HTML для изменения внешнего вида текста.');
define('_ACA_CB_SHOW_NAME', 'Показывать название Списка');
define('_ACA_CB_SHOW_NAME_TIPS', 'Выберите, показывать или нет название Списка(ов) после приветствия.');
define('_ACA_CB_LIST_DEFAULT', 'Список выбран по умолчанию?');
define('_ACA_CB_LIST_DEFAULT_TIPS', 'Выберите, должен ли чекбокс уже быть отмечен для каждого Списка по умолчанию.');
define('_ACA_CB_HTML_SHOW', 'Показывать "Получать HTML"');
define('_ACA_CB_HTML_SHOW_TIPS', 'Установите "Да", чтобы позволить пользователям выбирать, хотят ли они получать рассылку в формате HTML. Установите Нет, чтобы подписчики получали HTML по умолчанию.');
define('_ACA_CB_HTML_DEFAULT', 'Получать HTML по умолчанию');
define('_ACA_CB_HTML_DEFAULT_TIPS', 'Отметьте эту опцию, чтобы показывать "Получение HTML" пользователями по умолчанию. Если показывать "Получать HTML" установлено в Нет, тогда эта опция будет включена по умолчанию.');

// Новое, начиная с 1.0.4
define('_ACA_BACKUP_FAILED', 'Не удалось создать бэкап файла! Файл не заменен.');
define('_ACA_BACKUP_YOUR_FILES', 'Старые версии файлов были сохранены в папку:');
define('_ACA_SERVER_LOCAL_TIME', 'Локальное время сервера');
define('_ACA_SHOW_ARCHIVE', 'Показывать кнопку Архив');
define('_ACA_SHOW_ARCHIVE_TIPS', 'Выберите ДА, чтобы показывать кнопку Архив во фронтенде перечня рассылок');
define('_ACA_LIST_OPT_TAG', 'Тэги');
define('_ACA_LIST_OPT_IMG', 'Изображения');
define('_ACA_LIST_OPT_CTT', 'Контент');
define('_ACA_INPUT_NAME_TIPS', 'Введите имя и фамилию (Имя первым, пожалуйста)');
define('_ACA_INPUT_EMAIL_TIPS', 'Введите Ваш email адрес (Вводите, пожалуйста, существующий и работающий адрес)');
define('_ACA_RECEIVE_HTML_TIPS', 'Выберите Да, если Вы хотели бы получать рассылку в формате HTML (это будет использовать чуть больше трафика, но Ваши письма будут приятно оформлены) или Нет, чтобы получать рассылку только в текстовом формате');
define('_ACA_TIME_ZONE_ASK_TIPS', 'Выберите Ваш часовой пояс.');

// Новое, начиная с 1.0.5
define('_ACA_FILES' , 'Файлы');
define('_ACA_FILES_UPLOAD' , 'Загрузки');
define('_ACA_MENU_UPLOAD_IMG' , 'Загрузки картинок');
define('_ACA_TOO_LARGE' , 'Размер файла превышает допустимый. Максимальный разрешенный размер файла');
define('_ACA_MISSING_DIR' , 'Директория назначения не существует');
define('_ACA_IS_NOT_DIR' , 'Директория назначения не существует или является файлом.');
define('_ACA_NO_WRITE_PERMS' , 'Директория назначения не имеет прав записи.');
define('_ACA_NO_USER_FILE' , 'Вы не выбрали ни одного файла для загрузки.');
define('_ACA_E_FAIL_MOVE' , 'Невозможно переместить файл.');
define('_ACA_FILE_EXISTS' , 'Такой файл уже существует на сервере.');
define('_ACA_CANNOT_OVERWRITE' , 'Такой файл уже существует и не может быть перезаписан.');
define('_ACA_NOT_ALLOWED_EXTENSION' , 'Расширение файла не входит в список разрешенных');
define('_ACA_PARTIAL' , 'Файл загружен лишь частично.');
define('_ACA_UPLOAD_ERROR' , 'Ошибка загрузки:');
define('DEV_NO_DEF_FILE' , 'Файл был загружен лишь частично.');

// уже существует, но изменен: добавлен <br/> в первой строке и строка про [SUBSCRIPTIONS]
define('_ACA_CONTENTREP', '[SUBSCRIPTIONS] = Это будет заменено линками на подписку.' .
		' Это <strong>требуется</strong> , чтобы jNews работал корректно.<br />' .
		'Если Вы расположите любой другой контент в этом окне, это будет отображаться во всех письмах, направленных этому Списку.' .
		' <br />Добавьте Ваш текст для приветственного письма при подписке в конец. jNews автоматически добавит линки для подписчиков на изменение их информации и аннулирование подписки.');

// Новое, начиная с 1.0.6
define('_ACA_NOTIFICATION', 'Уведомление');  // ссылка на Email уведомление
define('_ACA_NOTIFICATIONS', 'Уведомления');
define('_ACA_USE_SEF', 'SEF в рассылках');
define('_ACA_USE_SEF_TIPS', 'Рекомендуется выбирать Нет. Если Вы все-таки хотите, чтобы URL-ы, включенные в Ваши рассылки, использовали SEF, тогда выбирайте Да.' .
		' <br /><b>Ссылки будут работать одинаково при разных условиях. Так Вы можете быть уверены, что пользователь, кликнув по линку в письме любой давности, попадет к Вам на сайт, даже если вы измените Вашу SEF структуру.</b> ');
define('_ACA_ERR_NB' , 'Ошибка #: ERR');
define('_ACA_ERR_SETTINGS', 'Установки отчетов об ошибках');
define('_ACA_ERR_SEND' ,'Отправлять отчет об ошибках');
define('_ACA_ERR_SEND_TIPS' ,'Если Вы хотите помочь jNews стать лучше, пожалуйста, выберите Да. Это включает функцию "отправить отчет об ошибках разработчику", то есть Вам даже на придется спрашивать на форуме о способе устранения бага ;-) <br /> <b>ЛИЧНАЯ ИНФОРМАЦИЯ НЕ ОТПРАВЛЯЕТСЯ</b>.  Мы даже не знаем, с каких сайтов поступают такие отчеты. Отправляется только информация об jNews , настройках PHP и запросах SQL . ');
define('_ACA_ERR_SHOW_TIPS' ,'Выберите Да, чтобы показывать номер ошибки на экране. Используется для целей дебагга скрипта. ');
define('_ACA_ERR_SHOW' ,'Показывать ошибки');
define('_ACA_LIST_SHOW_UNSUBCRIBE', 'Показывать линки аннулирования подписки');
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', 'Выберите Да для показа ссылок аннулирования подписки внизу писем, чтобы подписчики смогли изменить статус их подписки. <br /> Нет  отключает футер и ссылки.');
define('_ACA_UPDATE_INSTALL', '<span style="color: rgb(255, 0, 0);">ВАЖНОЕ СООБЩЕНИЕ!</span> <br />Если Вы обновляетесь с предыдущей версии jNews, Вам следует обновить структуру базу данных, кликнув по этой кнопке (Ваша информация останется в целости)');
define('_ACA_UPDATE_INSTALL_BTN' , 'Обновить таблицы и конфигурацию');
define('_ACA_MAILING_MAX_TIME', 'Максимальное время очереди' );
define('_ACA_MAILING_MAX_TIME_TIPS', 'Установите максимальное время для каждого комплекта писем, рассылаемых по очереди. Рекомендуется устанавливать между 30 секундами и 2 минутами.');

// virtuemart интеграция beta
define('_ACA_VM_INTEGRATION', 'Интеграция с VirtueMart ');
define('_ACA_VM_COUPON_NOTIF', 'ID извещения о Купоне');
define('_ACA_VM_COUPON_NOTIF_TIPS', 'Установите ID письма, которое Вы хотите использовать, чтобы разослать Купоны Вашим клиентам.');
define('_ACA_VM_NEW_PRODUCT', 'ID извещения о новых продуктах');
define('_ACA_VM_NEW_PRODUCT_TIPS', 'Установите ID письма, которое Вы хотите использовать, чтобы разослать извещение о новых продуктах Вашим клиентам.');

// Новое, начиная с 1.0.8
// создать формы для подписки
define('_ACA_FORM_BUTTON', 'Создать форму');
define('_ACA_FORM_COPY', 'HTML код');
define('_ACA_FORM_COPY_TIPS', 'Скопируйте сгенерированный HTML код на Вашу HTML страницу.');
define('_ACA_FORM_LIST_TIPS', 'Выберите Список, который Вы хотите включить в форму');
// обновить сообщения
define('_ACA_UPDATE_MESS4' , 'Не может быть обновлено автоматически');
define('_ACA_WARNG_REMOTE_FILE' , 'Удаленный файл недоступен.');
define('_ACA_ERROR_FETCH' , 'Ошибка fetching файла.');

define('_ACA_CHECK' , 'Проверить');
define('_ACA_MORE_INFO' , 'Подробнее');
define('_ACA_UPDATE_NEW' , 'Обновить до последней версии');
define('_ACA_UPGRADE' , 'Обновить до более новой версии');
define('_ACA_DOWNDATE' , 'Восстановить прежнюю версию');
define('_ACA_DOWNGRADE' , 'Обратно к первой версии');
define('_ACA_REQUIRE_JOOM' , 'Требовать Joomla');
define('_ACA_TRY_IT' , 'Сделай это!');
define('_ACA_NEWER', 'Более новая');
define('_ACA_OLDER', 'Более старая');
define('_ACA_CURRENT', 'Текущая');

// Новое, начиная с 1.0.9
define('_ACA_CHECK_COMP', 'Попробовать один из других компонентов');
define('_ACA_MENU_VIDEO' , 'Видео пособия');
define('_ACA_SCHEDULE_TITLE', 'Настройки автоматической функции планирования');
define('_ACA_ISSUE_NB_TIPS' , 'Получить число, автоматически сгенерированное системой' );
define('_ACA_SEL_ALL' , 'Все рассылки');
define('_ACA_SEL_ALL_SUB' , 'Все списки');
define('_ACA_INTRO_ONLY_TIPS' , 'Если вы всавите только вступление статьи, в письмо будет вставлена ссылка "Подробнее...", ведущая на полный разворот статьи на вашем сайте.' );
define('_ACA_TAGS_TITLE' , 'Тэг статьи');
define('_ACA_TAGS_TITLE_TIPS' , 'Скопируйте и вставьте этот тэг в письмо в то место, в которое хотите.');
define('_ACA_PREVIEW_EMAIL_TEST', 'Укажите email, на который уйдет тестовое письмо');
define('_ACA_PREVIEW_TITLE' , 'Просмотр');
define('_ACA_AUTO_UPDATE' , 'Уведомление о новых версиях');
define('_ACA_AUTO_UPDATE_TIPS' , 'Выберите "Да", если Вы хотите знать о новых версиях компонента. <br />ВАЖНО!! Настройка "Показывать советы" необходима для работы этой функции.');

// Новое, начиная с 1.1.0
define('_ACA_LICENSE' , 'Лицензионное соглашение');

// Новое, начиная с 1.1.1
define('_ACA_NEW' , 'Новое');
define('_ACA_SCHEDULE_SETUP', 'Для рассылки с помощью автореспондеров, в концигурациях должен быть установлен планировщик.');
define('_ACA_SCHEDULER', 'Планировщик');
define('_ACA_JNEWSLETTER_CRON_DESC' , 'если у Вас нет доступа к панели управления Хронами вашего сайта, Вы можете зарегистрировать бесплатный учетную запись Хрона jNews:' );
define('_ACA_CRON_DOCUMENTATION' , 'Вы можете найти дополнительную информацию по настройкам Планировщика jNews по следующему адресу:');
define('_ACA_CRON_DOC_URL' , '<a href="http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>' );
define( '_ACA_QUEUE_PROCESSED' , 'Очередь успешно выполнена...' );
define( '_ACA_ERROR_MOVING_UPLOAD' , 'Ошибка перемещения импортируемого файла' );

//Новое, начиная с 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY' , 'Частота работы планировщика' );
define( '_ACA_CRON_MAX_FREQ' , 'Максимальная частота работы планировщика' );
define( '_ACA_CRON_MAX_FREQ_TIPS' , 'Определяет максимальную частоту, с которой планировщик будет запускаться (в минутах). Является ограничением планировщика, даже если задание хрона запускается чаще.' );
define( '_ACA_CRON_MAX_EMAIL' , 'Максимальное число писем за раз' );
define( '_ACA_CRON_MAX_EMAIL_TIPS' , 'Определяет максимальное количество писем, рассылаемых за раз (0 - неограниченно).' );
define( '_ACA_CRON_MINUTES' , ' минут(-ы)' );
define( '_ACA_SHOW_SIGNATURE' , 'Показывать низ (footer) письма' );
define( '_ACA_SHOW_SIGNATURE_TIPS' , 'Хотите ли вы установить внизу письма ссылку на jNews.' );
define( '_ACA_QUEUE_AUTO_PROCESSED' , 'Работа автореспондера прошла успешно...' );
define( '_ACA_QUEUE_NEWS_PROCESSED' , 'Почтовая рассылка прошла успешно...' );
define( '_ACA_MENU_SYNC_USERS' , 'Синхронизировать данные пользователей в базе данных' );
define( '_ACA_SYNC_USERS_SUCCESS' , 'Синхронизация данных пользователей прошла успешно!' );

// совместимость с Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Выйти' );
if (!defined('_CMN_YES')) define( '_CMN_YES', 'Да' );
if (!defined('_CMN_NO')) define( '_CMN_NO', 'Нет' );
if (!defined('_HI')) define( '_HI', 'Привет' );
if (!defined('_CMN_TOP')) define( '_CMN_TOP', 'Вверх' );
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', 'Вниз' );
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', 'Logout' );

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS' , 'Если вы выберите, то в письмо добавится только заголовок статьи в виде ссылки на полный разворот статьи на вашем сайте.');
define('_ACA_TITLE_ONLY' , 'Только заголовок');
define('_ACA_FULL_ARTICLE_TIPS' , 'Если вы выберите, то статья полностью добавиться в письмо');
define('_ACA_FULL_ARTICLE' , 'Вся статья');
define('_ACA_CONTENT_ITEM_SELECT_T', 'Выберите статью, которую Вы хотите добавить в письмо. <br />Скопируйте и вставьте <b>тэг статьи</b> в тело письма.  Вы можете выбрать, в каком виде ее вставлять: весь текст, только вступление или только заголовок-ссылку (0, 1 или 2 соответственно). ');
define('_ACA_SUBSCRIBE_LIST2', 'Список(ки) рассылки');

// Функция умной рассылки
define('_ACA_AUTONEWS', 'Умная рассылка');
define('_ACA_MENU_AUTONEWS', 'Умные рассылки');
define('_ACA_AUTO_NEWS_OPTION', 'Настройки умной рассылки');
define('_ACA_AUTONEWS_FREQ', 'Частота рассылки');
define('_ACA_AUTONEWS_FREQ_TIPS', 'Определяет частоту, с которой вы хотите производить умные рассылки.');
define('_ACA_AUTONEWS_SECTION', 'Раздел статей');
define('_ACA_AUTONEWS_SECTION_TIPS', 'Определяет раздел, из которого будут браться статьи для рассылки.');
define('_ACA_AUTONEWS_CAT', 'Категория статей');
define('_ACA_AUTONEWS_CAT_TIPS', 'Определяет категорию, из которой будут браться статьи для рассылки. (Все из всех тех статей в указанном разделе).');
define('_ACA_SELECT_SECTION', 'Выберите раздел');
define('_ACA_SELECT_CAT', 'Все категории');
define('_ACA_AUTO_DAY_CH8', 'Quaterly');
define('_ACA_AUTONEWS_STARTDATE', 'Дата начала');
define('_ACA_AUTONEWS_STARTDATE_TIPS', 'Определяет дату, с которой начинают производиться умные рассылки.');
define('_ACA_AUTONEWS_TYPE', 'Представление статьи');// каким мы увидим статьи, вставленные в письма
define('_ACA_AUTONEWS_TYPE_TIPS', 'Полная статья: будет вставлять всю статью в рассылку.<br />' .
		'Только вступление: будет вставлять только вступление статьи в рассылку.<br/>' .
		'Только заголовок: будет вставлять только заголовок в рассылку.');
define('_ACA_TAGS_AUTONEWS', '[SMARTNEWSLETTER] = Этот тэг будет заменен быстрой рассылкой.' );

//Новое, начиная с 1.1.3
define('_ACA_MALING_EDIT_VIEW', 'Создание / Просмотр писем');
define('_ACA_LICENSE_CONFIG' , 'Лицензия' );
define('_ACA_ENTER_LICENSE' , 'Ввести лицензию');
define('_ACA_ENTER_LICENSE_TIPS' , 'Введите ваш номер лицензии и сохраните его.');
define('_ACA_LICENSE_SETTING' , 'Настройки лицензии' );
define('_ACA_GOOD_LIC' , 'Ваша лизензия корректна!' );
define('_ACA_NOTSO_GOOD_LIC' , 'Ваша лицензия корректна: ' );
define('_ACA_PLEASE_LIC' , 'Пожалуйста, свяжитесь с jNews, чтобы обновить свою лицензиию ( license@ijoobi.com ).' );
define('_ACA_DESC_PLUS', 'jNews Plus - первый компонент автоматической рассылки для  Joomla CMS.  ' . _ACA_FEATURES );
define('_ACA_DESC_PRO', 'jNews PRO - самый мощный компонент - система рассылки для Joomla CMS.  ' . _ACA_FEATURES );

//Новое, начиная с 1.1.4
define('_ACA_ENTER_TOKEN' , 'Введите номер талона');
define('_ACA_ENTER_TOKEN_TIPS' , 'Введите номер талона, который вы получили при покупке jNews. ');
define('_ACA_JNEWSLETTER_SITE', 'Сайт jNews:');
define('_ACA_MY_SITE', 'Мой сайт:');
define( '_ACA_LICENSE_FORM' , ' ' .
 		'Лицензия.</a>' );
define('_ACA_PLEASE_CLEAR_LICENSE' , 'Пожалуйста, очистите поле лицензии.<br />  Если проблемы продолжают взникать, ' );
define( '_ACA_LICENSE_SUPPORT' , 'Если вы до сих пор имете вопросы, ' . _ACA_PLEASE_LIC );
define( '_ACA_LICENSE_TWO' , 'Вы можете получить Ваше лицензионное руководство, введя номер талона и адрес сайта URL (который подсвечен зеленым вверху страницы) в лицензионной форме. '
			. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT );
define('_ACA_ENTER_TOKEN_PATIENCE', 'После сохранения вашего номера лицензия автоматически сгенерируется. ' .
		' Обычно купон действителен в течение 2-х минут.  Однако, в некоторых случаях он может быть продлен до 15 минут.<br />' .
		'<br />Вернитесь обратно в панель управления через несколько минут.  <br /><br />' .
		'Если вы не получили верный лицензионный ключ в течение 15 минут, '. _ACA_LICENSE_TWO);
define( '_ACA_ENTER_NOT_YET' , 'Ваш номер еще не действителен.');
define( '_ACA_UPDATE_CLICK_HERE' , 'Пожалуйста, посетите <a href="http://www.ijoobi.com" target="_blank">www.ijoobi.com</a>, чтобы скачать последнюю версию.');
define( '_ACA_NOTIF_UPDATE' , 'Чтобы узнавать о последних обновлениях, введите свой электронный ящик и нажмите Подписаться ');

define('_ACA_THINK_PLUS', 'Если Вы хотите большего от вашей системы рассылки, подумайте о Plus!');
define('_ACA_THINK_PLUS_1', 'Автореспонседоры');
define('_ACA_THINK_PLUS_2', 'Планируйте отправку ваших рассылок предопределённой датой');
define('_ACA_THINK_PLUS_3', 'Нет ограничений со стороны сервера');
define('_ACA_THINK_PLUS_4', 'и многое другое...');


//since 1.2.2
define( '_ACA_LIST_ACCESS', 'List Access' );
define( '_ACA_INFO_LIST_ACCESS', 'Specify what group of users can view and subscribe to this list' );
define( 'ACA_NO_LIST_PERM', 'You don\'t have enough permission to subscribe to this list' );

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
define( '_ACA_MAINTENANCE_FREQ_TIPS', 'Specify the frequency at which you want the maintenance routine to run.' );
define( '_ACA_CRON_DAYS' , 'hour(s)' );

define( '_ACA_LIST_NOT_AVAIL', 'There is no list available.');
define( '_ACA_LIST_ADD_TAB', 'Add/Edit' );

define( '_ACA_LIST_ACCESS_EDIT', 'Mailing Add/Edit Access' );
define( '_ACA_INFO_LIST_ACCESS_EDIT', 'Specify what group of users can add or edit a new mailing for this list' );
define( '_ACA_MAILING_NEW_FRONT', 'Createa New Mailing' );

define('_ACA_AUTO_ARCHIVE', 'Auto-Archive');
define('_ACA_MENU_ARCHIVE', 'Auto-Archive');

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', '[ISSUENB] = This will be replaced by the issue number of  the newsletter.');
define('_ACA_TAGS_DATE', '[DATE] = This will be replaced by the sent date.');
define('_ACA_TAGS_CB', '[CBTAG:{field_name}] = This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] ');
define( '_ACA_MAINTENANCE', 'Maintenance' );


define('_ACA_THINK_PRO', 'When you have professional needs, you use professional components!');
define('_ACA_THINK_PRO_1', 'Smart-Newsletters');
define('_ACA_THINK_PRO_2', 'Define access level for your list');
define('_ACA_THINK_PRO_3', 'Define who can edit/add mailings');
define('_ACA_THINK_PRO_4', 'More tags: add your CB fields');
define('_ACA_THINK_PRO_5', 'Joomla contents Auto-archive');
define('_ACA_THINK_PRO_6', 'Database optimization');

define('_ACA_LIC_NOT_YET', 'Your license is not yet valid.  Please check the license Tab in the configuration panel.');
define('_ACA_PLEASE_LIC_GREEN' , 'Make sure to provide the green information at the top of the tab to our support team.' );

define('_ACA_FOLLOW_LINK' , 'Get Your License');
define( '_ACA_FOLLOW_LINK_TWO' , 'You can get your license by entering the token number and site URL (which is highlighted in green at the top of this page) in the License form. ');
define( '_ACA_ENTER_TOKEN_TIPS2', ' Then click on Apply button in the top right menu.' );
define( '_ACA_ENTER_LIC_NB', 'Enter your License' );
define( '_ACA_UPGRADE_LICENSE', 'Upgrade Your License');
define( '_ACA_UPGRADE_LICENSE_TIPS' , 'If you received a token to upgrade your license please enter it here, click Apply and proceed to number <b>2</b> to get your new license number.' );

define( '_ACA_MAIL_FORMAT', 'Encoding format' );
define( '_ACA_MAIL_FORMAT_TIPS', 'What format do you want to use for encoding your mailings, Text only or MIME' );
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', 'If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.' );

//since 1.3.1
define('_ACA_SHOW_AUTHOR', 'Show Author\'s Name');
define('_ACA_SHOW_AUTHOR_TIPS', 'Select Yes if you want to add the name of the author when you add an article in the Mailing');

//since 1.3.5
define('_ACA_REGWARN_NAME','Пожалуйста, введите Ваше настоящее имя.');
define('_ACA_REGWARN_MAIL','Пожалуйста, введите правильно адрес e-mail.');

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
define('_ACA_DISABLETOOLTIP', compa::encodeutf('Disable Tooltip'));
define('_ACA_DISABLETOOLTIP_TIPS', compa::encodeutf('Disable the tooltip on the frontend'));
define('_ACA_MINISENDMAIL', compa::encodeutf('Use Mini SendMail'));
define('_ACA_MINISENDMAIL_TIPS', compa::encodeutf('If your server use Mini SendMail, select this option to don\'t add the name of the user in the header of the e-mail'));

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