<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
 * <p>Potuguese language.</p>
 * @copyright (c) 2006-2010 Joobi Limited / All Rights Reserved
 * @author  Ricardo Simões <support@ijoobi.com>
 * @version $Id: portuguese.php 491 2007-02-01 22:56:07Z divivo $
* @link http://www.ijoobi.com
 */

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', compa::encodeutf('jNews é uma ferramenta de listas de mailing, newsletters, auto-respostas, e seguimento, para comunicação eficaz com os seus utilizadores e clientes. ' .
		'jNews, O Seu Parceiro De Comunicação!'));
define('_ACA_DESC_GPL', compa::encodeutf('jNews é uma ferramenta de listas de mailing, newsletters, auto-respostas, e seguimento, para comunicação eficaz com os seus utilizadores e clientes. ' .
		'jNews, O Seu Parceiro De Comunicação!'));
define('_ACA_FEATURES', compa::encodeutf('jNews, o seu parceiro de comunicação!'));

// Type of lists
define('_ACA_NEWSLETTER', compa::encodeutf('Newsletter'));
define('_ACA_AUTORESP', compa::encodeutf('Auto-resposta'));
define('_ACA_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_ECARD', compa::encodeutf('Cartão Electrónico'));
define('_ACA_POSTCARD', compa::encodeutf('Cartão Postal'));
define('_ACA_PERF', compa::encodeutf('Performance'));
define('_ACA_COUPON', compa::encodeutf('Cupão'));
define('_ACA_CRON', compa::encodeutf('Tarefa Cron'));
define('_ACA_MAILING', compa::encodeutf('Mailing'));
define('_ACA_LIST', compa::encodeutf('Lista'));

 //jnewsletter Menu
define('_ACA_MENU_LIST', compa::encodeutf('Gestão de Listas'));
define('_ACA_MENU_SUBSCRIBERS', compa::encodeutf('Assinantes'));
define('_ACA_MENU_NEWSLETTERS', compa::encodeutf('Newsletters'));
define('_ACA_MENU_AUTOS', compa::encodeutf('Auto-Respostas'));
define('_ACA_MENU_COUPONS', compa::encodeutf('Cupões'));
define('_ACA_MENU_CRONS', compa::encodeutf('Tarefas Cron'));
define('_ACA_MENU_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_MENU_ECARD', compa::encodeutf('Cartões Electrónicos'));
define('_ACA_MENU_POSTCARDS', compa::encodeutf('Cartões Postais'));
define('_ACA_MENU_PERFS', compa::encodeutf('Performances'));
define('_ACA_MENU_TAB_LIST', compa::encodeutf('Listas'));
define('_ACA_MENU_MAILING_TITLE', compa::encodeutf('Mailings'));
define('_ACA_MENU_MAILING', compa::encodeutf('Mailings para '));
define('_ACA_MENU_STATS', compa::encodeutf('Estatísticas'));
define('_ACA_MENU_STATS_FOR', compa::encodeutf('Estatísticas para '));
define('_ACA_MENU_CONF', compa::encodeutf('Configuração'));
define('_ACA_MENU_UPDATE', compa::encodeutf('Importar'));
define('_ACA_MENU_ABOUT', compa::encodeutf('Sobre'));
define('_ACA_MENU_LEARN', compa::encodeutf('Centro de Educação'));
define('_ACA_MENU_MEDIA', compa::encodeutf('Gestão de Media'));
define('_ACA_MENU_HELP', compa::encodeutf('Ajuda'));
define('_ACA_MENU_CPANEL', compa::encodeutf('Painel de Controlo'));
define('_ACA_MENU_IMPORT', compa::encodeutf('Importar'));
define('_ACA_MENU_EXPORT', compa::encodeutf('Exportar'));
define('_ACA_MENU_SUB_ALL', compa::encodeutf('Subcrever Tudo'));
define('_ACA_MENU_UNSUB_ALL', compa::encodeutf('Não-Subscrever Tudo'));
define('_ACA_MENU_VIEW_ARCHIVE', compa::encodeutf('Arquivo'));
define('_ACA_MENU_PREVIEW', compa::encodeutf('Pré-visualizar'));
define('_ACA_MENU_SEND', compa::encodeutf('Enviar'));
define('_ACA_MENU_SEND_TEST', compa::encodeutf('Enviar Email de Teste'));
define('_ACA_MENU_SEND_QUEUE', compa::encodeutf('Fila de Processamento'));
define('_ACA_MENU_VIEW', compa::encodeutf('Ver'));
define('_ACA_MENU_COPY', compa::encodeutf('Copiar'));
define('_ACA_MENU_VIEW_STATS', compa::encodeutf('Ver Estado'));
define('_ACA_MENU_CRTL_PANEL', compa::encodeutf(' Painel De Controlo'));
define('_ACA_MENU_LIST_NEW', compa::encodeutf(' Criar Lista'));
define('_ACA_MENU_LIST_EDIT', compa::encodeutf(' Editar Lista'));
define('_ACA_MENU_BACK', compa::encodeutf('Retroceder'));
define('_ACA_MENU_INSTALL', compa::encodeutf('Instalar'));
define('_ACA_MENU_TAB_SUM', compa::encodeutf('Sumário'));
define('_ACA_STATUS', compa::encodeutf('Estado'));

// messages
define('_ACA_ERROR', compa::encodeutf(' Ocorreu um erro! '));
define('_ACA_SUB_ACCESS', compa::encodeutf('Direitos de Acesso'));
define('_ACA_DESC_CREDITS', compa::encodeutf('Créditos'));
define('_ACA_DESC_INFO', compa::encodeutf('Informação'));
define('_ACA_DESC_HOME', compa::encodeutf('Página Oficial'));
define('_ACA_DESC_MAILING', compa::encodeutf('Lista de Mailing'));
define('_ACA_DESC_SUBSCRIBERS', compa::encodeutf('Assinantes'));
define('_ACA_PUBLISHED', compa::encodeutf('Publicado'));
define('_ACA_UNPUBLISHED', compa::encodeutf('Não-Publicado'));
define('_ACA_DELETE', compa::encodeutf('Apagar'));
define('_ACA_FILTER', compa::encodeutf('Filtrar'));
define('_ACA_UPDATE', compa::encodeutf('Actualizar'));
define('_ACA_SAVE', compa::encodeutf('Salvar'));
define('_ACA_CANCEL', compa::encodeutf('Cancelar'));
define('_ACA_NAME', compa::encodeutf('Nome'));
define('_ACA_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_SELECT', compa::encodeutf('Selecionar'));
define('_ACA_ALL', compa::encodeutf('Todas as'));
define('_ACA_SEND_A', compa::encodeutf('Enviar a '));
define('_ACA_SUCCESS_DELETED', compa::encodeutf(' apagado com sucesso'));
define('_ACA_LIST_ADDED', compa::encodeutf('Lista criada com sucesso'));
define('_ACA_LIST_COPY', compa::encodeutf('Lista copiada com sucesso'));
define('_ACA_LIST_UPDATED', compa::encodeutf('Lista actualizada com sucesso'));
define('_ACA_MAILING_SAVED', compa::encodeutf('Mailing salvado com sucesso.'));
define('_ACA_UPDATED_SUCCESSFULLY', compa::encodeutf('actualizado com sucesso.'));

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_SUB_INFO', compa::encodeutf('Informação do Assinante'));
define('_ACA_VERIFY_INFO', compa::encodeutf('Por favor verifique o link que submeteu, falta alguma informação.'));
define('_ACA_INPUT_NAME', compa::encodeutf('Nome'));
define('_ACA_INPUT_EMAIL', compa::encodeutf('Email'));
define('_ACA_RECEIVE_HTML', compa::encodeutf('Receber em HTML?'));
define('_ACA_TIME_ZONE', compa::encodeutf('Zona de Fuso Horário'));
define('_ACA_BLACK_LIST', compa::encodeutf('Lista Negra'));
define('_ACA_REGISTRATION_DATE', compa::encodeutf('Data de registo do utilizador'));
define('_ACA_USER_ID', compa::encodeutf('ID do Utilizador'));
define('_ACA_DESCRIPTION', compa::encodeutf('Descrição'));
define('_ACA_ACCOUNT_CONFIRMED', compa::encodeutf('A sua conta foi activada.'));
define('_ACA_SUB_SUBSCRIBER', compa::encodeutf('Assinante'));
define('_ACA_SUB_PUBLISHER', compa::encodeutf('Editor'));
define('_ACA_SUB_ADMIN', compa::encodeutf('Administrador'));
define('_ACA_REGISTERED', compa::encodeutf('Registado'));
define('_ACA_SUBSCRIPTIONS', compa::encodeutf('Subscrições'));
define('_ACA_SEND_UNSUBCRIBE', compa::encodeutf('Enviar mensagem de Cancelamento de subscrição'));
define('_ACA_SEND_UNSUBCRIBE_TIPS', compa::encodeutf('Clique SIM para enviar um email de confirmação para cancelamento de subscrição.'));
define('_ACA_SUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Por favor confirme a sua subscrição'));
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Confirmação de Cancelamento de Subscrição'));
define('_ACA_DEFAULT_SUBSCRIBE_MESS', compa::encodeutf('Olá [NAME],<br />' .
		'Apenas mais um passo e subscreverá a lista.  Por favor clique no link seguinte para confirmar a sua subscrição.' .
		'<br /><br />[CONFIRM]<br /><br />Para questões é favor contactar o Webmaster.'));
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', compa::encodeutf('Este é um email de confirmação de que você foi removido da nossa lista.  Lamentamos que tenha decidido cancelar a sua subscrição, caso queira voltar a subscrever pode sempre fazê-lo no nosso site.  Caso tenha alguma questão por favor contacte o nosso Webmaster.'));

// jNews subscribers
define('_ACA_SIGNUP_DATE', compa::encodeutf('Data de Subscrição'));
define('_ACA_CONFIRMED', compa::encodeutf('Confirmado'));
define('_ACA_SUBSCRIB', compa::encodeutf('Subscrever'));
define('_ACA_HTML', compa::encodeutf('Mailings em HTML'));
define('_ACA_RESULTS', compa::encodeutf('Resultados'));
define('_ACA_SEL_LIST', compa::encodeutf('Selecione uma Lista'));
define('_ACA_SEL_LIST_TYPE', compa::encodeutf('- Selecione tipo de Lista -'));
define('_ACA_SUSCRIB_LIST', compa::encodeutf('Lista Total de Assinantes'));
define('_ACA_SUSCRIB_LIST_UNIQUE', compa::encodeutf('assinantes para : '));
define('_ACA_NO_SUSCRIBERS', compa::encodeutf('Nenhum assinante encontrado para estas listas.'));
define('_ACA_COMFIRM_SUBSCRIPTION', compa::encodeutf('Foi enviado um email de confirmação para si.  Por favor verifique o seu email e clique no link fornecido.<br />' .
		'O seu email necessita de ser confirmado para que a sua subscrição possa ter efeito.'));
define('_ACA_SUCCESS_ADD_LIST', compa::encodeutf('Você foi adicionado a lista com sucesso.'));


 // Subcription info
define('_ACA_CONFIRM_LINK', compa::encodeutf('Clique aqui para confirmar a sua subscrição'));
define('_ACA_UNSUBSCRIBE_LINK', compa::encodeutf('Clique aqui para remover-se da lista'));
define('_ACA_UNSUBSCRIBE_MESS', compa::encodeutf('O seu email foi removido da lista'));

define('_ACA_QUEUE_SENT_SUCCESS', compa::encodeutf('Todos os mailings agendados foram enviados com sucesso.'));
define('_ACA_MALING_VIEW', compa::encodeutf('Ver todos os mailings'));
define('_ACA_UNSUBSCRIBE_MESSAGE', compa::encodeutf('Tem a certeza que quer remover-se da lista?'));
define('_ACA_MOD_SUBSCRIBE', compa::encodeutf('Subscrever'));
define('_ACA_SUBSCRIBE', compa::encodeutf('Subscrever'));
define('_ACA_UNSUBSCRIBE', compa::encodeutf('Remover subscrição'));
define('_ACA_VIEW_ARCHIVE', compa::encodeutf('Ver arquivo'));
define('_ACA_SUBSCRIPTION_OR', compa::encodeutf(' ou clique aqui para actualizar a sua informação'));
define('_ACA_EMAIL_ALREADY_REGISTERED', compa::encodeutf('Este endereço de email já se encontra registado.'));
define('_ACA_SUBSCRIBER_DELETED', compa::encodeutf('Assinante apagado com sucesso.'));


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', compa::encodeutf('Painel de Controlo do Utilizador'));
define('_UCP_USER_MENU', compa::encodeutf('Menu do Utilizador'));
define('_UCP_USER_CONTACT', compa::encodeutf('As minhas subscrições'));
 //jNews Cron Menu
define('_UCP_CRON_MENU', compa::encodeutf('Gestão de tarefa Cron'));
define('_UCP_CRON_NEW_MENU', compa::encodeutf('Novo Cron'));
define('_UCP_CRON_LIST_MENU', compa::encodeutf('Listar o meu Cron'));
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', compa::encodeutf('Gestão de Cupões'));
define('_UCP_COUPON_LIST_MENU', compa::encodeutf('Lista de Cupões'));
define('_UCP_COUPON_ADD_MENU', compa::encodeutf('Adicionar um Cupão'));

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', compa::encodeutf('Descrição'));
define('_ACA_LIST_T_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_LIST_T_SUBSCRIPTION', compa::encodeutf('Subscrição'));
define('_ACA_LIST_T_SENDER', compa::encodeutf('Informação do Remetente'));

define('_ACA_LIST_TYPE', compa::encodeutf('Tipo de Lista'));
define('_ACA_LIST_NAME', compa::encodeutf('Nome da Lista'));
define('_ACA_LIST_ISSUE', compa::encodeutf('Edição N #'));
define('_ACA_LIST_DATE', compa::encodeutf('Data de Envio'));
define('_ACA_LIST_SUB', compa::encodeutf('Assunto do Mailing'));
define('_ACA_ATTACHED_FILES', compa::encodeutf('Ficheiros Anexados'));
define('_ACA_SELECT_LIST', compa::encodeutf('Por favor selecione uma lista para editar!'));

// Auto Responder box
define('_ACA_AUTORESP_ON', compa::encodeutf('Tipo de Lista'));
define('_ACA_AUTO_RESP_OPTION', compa::encodeutf('Opções de Auto-resposta'));
define('_ACA_AUTO_RESP_FREQ', compa::encodeutf('Assinantes podem escolher frequência'));
define('_ACA_AUTO_DELAY', compa::encodeutf('Atraso (em dias)'));
define('_ACA_AUTO_DAY_MIN', compa::encodeutf('Frequência Mínima'));
define('_ACA_AUTO_DAY_MAX', compa::encodeutf('Frequência Máxima'));
define('_ACA_FOLLOW_UP', compa::encodeutf('Especificar seguimento de auto-resposta'));
define('_ACA_AUTO_RESP_TIME', compa::encodeutf('Assinantes podem escolher hora'));
define('_ACA_LIST_SENDER', compa::encodeutf('Remetente da Lista'));

define('_ACA_LIST_DESC', compa::encodeutf('Descrição da Lista'));
define('_ACA_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_SENDER_NAME', compa::encodeutf('Nome do Remetente'));
define('_ACA_SENDER_EMAIL', compa::encodeutf('Email do Remetente'));
define('_ACA_SENDER_BOUNCE', compa::encodeutf('Endereço de bounce do Remetente'));
define('_ACA_LIST_DELAY', compa::encodeutf('Atraso'));
define('_ACA_HTML_MAILING', compa::encodeutf('Mailing em HTML?'));
define('_ACA_HTML_MAILING_DESC', compa::encodeutf('(se modificar isto, você terá de salvar e retornar a este ecran para visualizar as mudanças.)'));
define('_ACA_HIDE_FROM_FRONTEND', compa::encodeutf('Esconder do Sítio-Principal?'));
define('_ACA_SELECT_IMPORT_FILE', compa::encodeutf('Selecione um ficheiro para importação'));;
define('_ACA_IMPORT_FINISHED', compa::encodeutf('Importação terminada'));
define('_ACA_DELETION_OFFILE', compa::encodeutf('Eliminação do ficheiro'));
define('_ACA_MANUALLY_DELETE', compa::encodeutf('falhou, deverá apagar o ficheiro manualmente'));
define('_ACA_CANNOT_WRITE_DIR', compa::encodeutf('Não é possível escrever na directoria'));
define('_ACA_NOT_PUBLISHED', compa::encodeutf('Não foi possível enviar o mailing, a Lista não está publicada.'));

//  List info box
define('_ACA_INFO_LIST_PUB', compa::encodeutf('Clique em SIM para publicar a Lista'));
define('_ACA_INFO_LIST_NAME', compa::encodeutf('Introduza o nome da sua Lista aqui. Poderá identificar a Lista com este nome.'));
define('_ACA_INFO_LIST_DESC', compa::encodeutf('Introduza uma breve descrição da sua Lista aqui. Esta descrição será visível aos visitantes no seu site.'));
define('_ACA_INFO_LIST_SENDER_NAME', compa::encodeutf('Introduza o nome do Remetente do mailing. Este nome será visível quando os assinantes receberem mensagens desta lista.'));
define('_ACA_INFO_LIST_SENDER_EMAIL', compa::encodeutf('Introduza o endereço de email de onde as mensagens serão enviadas.'));
define('_ACA_INFO_LIST_SENDER_BOUNCED', compa::encodeutf('Introduza o endereço de email para onde os utilizadores poderão responder. É altamente recomendado que seja igual ao do remetente, visto que existem filtros de SPAM que poderão atribuir uma probabilidade de SPAM elevada se forem diferentes.'));
define('_ACA_INFO_LIST_AUTORESP', compa::encodeutf('Escolha o tipo de mailings para esta Lista. <br />' .
		'Newsletter: newsletter normal<br />' .
		'Auto-resposta: uma Auto-resposta é uma Lista que é enviada automaticamente através da página web em intervalos regulares.'));
define('_ACA_INFO_LIST_FREQUENCY', compa::encodeutf('Permitir aos utilizadores escolher quantas vezes recebem a Lista.  Atribui mais flexibilidade ao utilizador.'));
define('_ACA_INFO_LIST_TIME', compa::encodeutf('Deixar que o utilizador escolha a hora preferida do dia para receber a Lista.'));
define('_ACA_INFO_LIST_MIN_DAY', compa::encodeutf('Definir qual é a frequência mínima que o utilizador pode escolher para receber a lista'));
define('_ACA_INFO_LIST_DELAY', compa::encodeutf('Especificar qual o atraso entre esta auto-resposta e a anterior.'));
define('_ACA_INFO_LIST_DATE', compa::encodeutf('Especificar a data para publicação da lista de notícias, caso queira atrasar a publicação. <br /> FORMATO : AAAA-MM-DD HH:MM:SS'));
define('_ACA_INFO_LIST_MAX_DAY', compa::encodeutf('Definir qual é a frequência máxima que o utilizador pode escolher para receber a lista'));
define('_ACA_INFO_LIST_LAYOUT', compa::encodeutf('Introduza o layout da sua lista de mailing aqui. Pode introduzir qualquer layou para o seu mailing aqui.'));
define('_ACA_INFO_LIST_SUB_MESS', compa::encodeutf('Esta mensagem será enviada ao assinante quando ele ou ela se registam pela primeira vez. Pode definir aqui qualquer texto que goste.'));
define('_ACA_INFO_LIST_UNSUB_MESS', compa::encodeutf('Esta mensagem será enviada ao assinante quando ele ou ela cancelarem a subscrição. Pode inserir aqui qualquer mensagem.'));
define('_ACA_INFO_LIST_HTML', compa::encodeutf('Selecione a checkbox se desejar enviar mailing em HTML. Os assinantes poderão especificar se preferem receber mensagens em HTML, ou mensagens de apenas texto aquando da subscrição de uma lista HTML.'));
define('_ACA_INFO_LIST_HIDDEN', compa::encodeutf('Clique SIM para esconder a lista do sítio-principal, os utilizadores não poderão subscrever mas você poderá mesmo assim enviar mailings.'));
define('_ACA_INFO_LIST_ACA_AUTO_SUB', compa::encodeutf('Deseja subscrição automática dos utilizadores para esta lista?<br /><B>Novos Utilizadores:</B> registará cada novo utilizador que se registe no site.<br /><B>Todos os Utilizadores:</B> registará cada utilizador registado na base de dados.<br />(todas aquelas opções suportam Community Builder)'));
define('_ACA_INFO_LIST_ACC_LEVEL', compa::encodeutf('Selecione o nível de acesso do sítio-principal. Isto mostrará ou esconderá o mailing para os grupos de utilizadores que não têm acesso a ele, para que não sejam capazes do o subscrever.'));
define('_ACA_INFO_LIST_ACC_USER_ID', compa::encodeutf('Selecione o nível de acesso do grupo de utilizadores a quem permite edição. Esse grupo de utilizadores e superiores serão capazes de editar o mailing e enviá-lo, quer do sítio-principal quer do sítio de administração.'));
define('_ACA_INFO_LIST_FOLLOW_UP', compa::encodeutf('Se quiser que a auto-resposta mova-se para outra assim que atingir a última mensagem, pode especificar aqui a auto-resposta seguinte.'));
define('_ACA_INFO_LIST_ACA_OWNER', compa::encodeutf('Esta é a ID da pessoa que criou a lista.'));
define('_ACA_INFO_LIST_WARNING', compa::encodeutf('   Esta última opção apenas está disponível uma vez aquando da criação da lista.'));
define('_ACA_INFO_LIST_SUBJET', compa::encodeutf(' Assunto do mailing.  Este é o assunto do email que o assinante receberá.'));
define('_ACA_INFO_MAILING_CONTENT', compa::encodeutf('Este é o corpo do email que você quer enviar.'));
define('_ACA_INFO_MAILING_NOHTML', compa::encodeutf('Introduza o corpo do email que você quer enviar para os assinantes que escolheram receber apenas mailings NÃO-HTML. <BR/> NOTA: se deixar em branco o jNews converterá automaticamente o texto HTML para apenas texto.'));
define('_ACA_INFO_MAILING_VISIBLE', compa::encodeutf('Clique SIM para mostrar mailing no sítio-principal.'));
define('_ACA_INSERT_CONTENT', compa::encodeutf('Insira o conteúdo existente'));

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', compa::encodeutf('Cupão enviado com sucesso!'));
define('_ACA_CHOOSE_COUPON', compa::encodeutf('Escolha um cupão'));
define('_ACA_TO_USER', compa::encodeutf(' para este utilizador'));

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', compa::encodeutf('Cada hora'));
define('_ACA_FREQ_CH2', compa::encodeutf('Cada 6 horas'));
define('_ACA_FREQ_CH3', compa::encodeutf('Cada 12 horas'));
define('_ACA_FREQ_CH4', compa::encodeutf('Diariamente'));
define('_ACA_FREQ_CH5', compa::encodeutf('Semanalmente'));
define('_ACA_FREQ_CH6', compa::encodeutf('Mensalmente'));
define('_ACA_FREQ_NONE', compa::encodeutf('Não'));
define('_ACA_FREQ_NEW', compa::encodeutf('Novos utilizadores'));
define('_ACA_FREQ_ALL', compa::encodeutf('Todos os utilizadores'));

//Label CRON form
define('_ACA_LABEL_FREQ', compa::encodeutf('Cron jNews?'));
define('_ACA_LABEL_FREQ_TIPS', compa::encodeutf('Clique em SIM se quiser utilizar isto para uma Cron jNews, NÃO para qualquer outra tarefa Cron.<br />' .
		'Se clicar em SIM não necessita de especificar o endereço do Cron, este será automaticamente adicionado.'));
define('_ACA_SITE_URL', compa::encodeutf('O endereço URL do seu site'));
define('_ACA_CRON_FREQUENCY', compa::encodeutf('Frequência do Cron'));
define('_ACA_STARTDATE_FREQ', compa::encodeutf('Data de Começo'));
define('_ACA_LABELDATE_FREQ', compa::encodeutf('Especifique Data'));
define('_ACA_LABELTIME_FREQ', compa::encodeutf('Especifique Hora'));
define('_ACA_CRON_URL', compa::encodeutf('URL do Cron'));
define('_ACA_CRON_FREQ', compa::encodeutf('Frequência'));
define('_ACA_TITLE_CRONLIST', compa::encodeutf('Lista Cron'));
define('_NEW_LIST', compa::encodeutf('Criar uma nova lista'));

//title CRON form
define('_ACA_TITLE_FREQ', compa::encodeutf('Editar Cron'));
define('_ACA_CRON_SITE_URL', compa::encodeutf('Por favor introduza um endereço URL válido, começado por http://'));

### Mailings ###
define('_ACA_MAILING_ALL', compa::encodeutf('Todos os mailings'));
define('_ACA_EDIT_A', compa::encodeutf('Editar uma '));
define('_ACA_SELCT_MAILING', compa::encodeutf('Por favor selecione a Lista na caixa de possibilidades com vista a adicionar um novo mailing.'));
define('_ACA_VISIBLE_FRONT', compa::encodeutf('Visível no sítio-principal'));

// mailer
define('_ACA_SUBJECT', compa::encodeutf('Assunto'));
define('_ACA_CONTENT', compa::encodeutf('Conteúdo'));
define('_ACA_NAMEREP', compa::encodeutf('[NAME] = Isto será substituído pelo nome que o assinante introduziu, você estará a enviar emails personalizados ao usar isto.<br />'));
define('_ACA_FIRST_NAME_REP', compa::encodeutf('[FIRSTNAME] = Isto será substituído pelo PRIMEIRO nome que o assinante introduziu.<br />'));
define('_ACA_NONHTML', compa::encodeutf('Versão Não-html'));
define('_ACA_ATTACHMENTS', compa::encodeutf('Anexos'));
define('_ACA_SELECT_MULTIPLE', compa::encodeutf('Carregue na tecla CONTROL (ou COMANDO) para selecionar múltiplos anexos.<br />' .
		'Os ficheiros apresentados nesta lista de anexos estão localizados na directoria de anexos, pode alterar esta localização no painel de controlo em Configuração.'));
define('_ACA_CONTENT_ITEM', compa::encodeutf('Item do Conteúdo'));
define('_ACA_SENDING_EMAIL', compa::encodeutf('A enviar email'));
define('_ACA_MESSAGE_NOT', compa::encodeutf('A Mensagem não pode ser enviada'));
define('_ACA_MAILER_ERROR', compa::encodeutf('Erro no Mailer'));
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', compa::encodeutf('Mensagem enviada com sucesso'));
define('_ACA_SENDING_TOOK', compa::encodeutf('O envio deste mailing foi de'));
define('_ACA_SECONDS', compa::encodeutf('segundos'));
define('_ACA_NO_ADDRESS_ENTERED', compa::encodeutf('Nenhum assinante ou endereço de email fornecido'));
define('_ACA_CHANGE_SUBSCRIPTIONS', compa::encodeutf('Modificar'));
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', compa::encodeutf('Modificar a sua subscrição'));
define('_ACA_WHICH_EMAIL_TEST', compa::encodeutf('Indique o endereço de email para enviar um teste ou selecione pré-visualizar'));
define('_ACA_SEND_IN_HTML', compa::encodeutf('Enviar em HTML (para mailings html)?'));
define('_ACA_VISIBLE', compa::encodeutf('Visível'));
define('_ACA_INTRO_ONLY', compa::encodeutf('Apenas Introdução'));

// stats
define('_ACA_GLOBALSTATS', compa::encodeutf('Estatísticas Globais'));
define('_ACA_DETAILED_STATS', compa::encodeutf('Estatísticas Detalhadas'));
define('_ACA_MAILING_LIST_DETAILS', compa::encodeutf('Detalhes de Listas'));
define('_ACA_SEND_IN_HTML_FORMAT', compa::encodeutf('Envio em formato HTML'));
define('_ACA_VIEWS_FROM_HTML', compa::encodeutf('Vistos (de emails em html)'));
define('_ACA_SEND_IN_TEXT_FORMAT', compa::encodeutf('Envio em formtato Texto'));
define('_ACA_HTML_READ', compa::encodeutf('Lidos HTML'));
define('_ACA_HTML_UNREAD', compa::encodeutf('Não-Lidos HTML'));
define('_ACA_TEXT_ONLY_SENT', compa::encodeutf('Apenas Texto'));

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', compa::encodeutf('Mail'));
define('_ACA_LOGGING_CONFIG', compa::encodeutf('Hist. & Estat.'));
define('_ACA_SUBSCRIBER_CONFIG', compa::encodeutf('Assinantes'));
define('_ACA_AUTO_CONFIG', compa::encodeutf('Cron'));
define('_ACA_MISC_CONFIG', compa::encodeutf('Miscelânea'));
define('_ACA_MAIL_SETTINGS', compa::encodeutf('Definições de Mail'));
define('_ACA_MAILINGS_SETTINGS', compa::encodeutf('Definições de Mailings'));
define('_ACA_SUBCRIBERS_SETTINGS', compa::encodeutf('Definições de Assinantes'));
define('_ACA_CRON_SETTINGS', compa::encodeutf('Definições de Cron'));
define('_ACA_SENDING_SETTINGS', compa::encodeutf('Definições de Envio'));
define('_ACA_STATS_SETTINGS', compa::encodeutf('Definições de Estatísticas'));
define('_ACA_LOGS_SETTINGS', compa::encodeutf('Definições de Históricos'));
define('_ACA_MISC_SETTINGS', compa::encodeutf('Definições de Miscelânea'));
// mail settings
define('_ACA_SEND_MAIL_FROM', compa::encodeutf('Email do remetente'));
define('_ACA_SEND_MAIL_NAME', compa::encodeutf('Nome do remetente'));
define('_ACA_MAILSENDMETHOD', compa::encodeutf('Método do Mailer'));
define('_ACA_SENDMAILPATH', compa::encodeutf('Caminho do Sendmail'));
define('_ACA_SMTPHOST', compa::encodeutf('SMTP host'));
define('_ACA_SMTPAUTHREQUIRED', compa::encodeutf('Requer Autenticação SMTP'));
define('_ACA_SMTPAUTHREQUIRED_TIPS', compa::encodeutf('Selecione SIM se o seu servidor SMTP require autenticação'));
define('_ACA_SMTPUSERNAME', compa::encodeutf('nome da conta SMTP'));
define('_ACA_SMTPUSERNAME_TIPS', compa::encodeutf('Introduza o nome da conta para o SMTP quando o seu servidor SMTP requerer autenticação'));
define('_ACA_SMTPPASSWORD', compa::encodeutf('palavra-passe SMTP'));
define('_ACA_SMTPPASSWORD_TIPS', compa::encodeutf('Introduza a palavra-passe para o SMTP quando o seu servidor SMTP requerer autenticação'));
define('_ACA_USE_EMBEDDED', compa::encodeutf('Usar imagens embebidas'));
define('_ACA_USE_EMBEDDED_TIPS', compa::encodeutf('Selecione SIM se as imagens dos items de conteúdo anexo deverão ser embebidas no email para mensagens em html, ou NÃO para usar as tags de imagem por defeito que fazem link para as imagens no site.'));
define('_ACA_UPLOAD_PATH', compa::encodeutf('Caminho de Envio/Anexos'));
define('_ACA_UPLOAD_PATH_TIPS', compa::encodeutf('Pode especificar uma directoria para envio.<br />' .
		'Certifique-se que a directoria que especificar existe, caso contrário crie-a.'));

// subscribers settings
define('_ACA_ALLOW_UNREG', compa::encodeutf('Permitir não-registados'));
define('_ACA_ALLOW_UNREG_TIPS', compa::encodeutf('Selecione SIM se quiser permitir utilizadores susbcreverem listas sem estarem registados no site.'));
define('_ACA_REQ_CONFIRM', compa::encodeutf('Requerer Confirmação'));
define('_ACA_REQ_CONFIRM_TIPS', compa::encodeutf('Selecione SIM se quiser obrigar os utilizadores assinantes não-registados a confirmar o seu endereço de email.'));
define('_ACA_SUB_SETTINGS', compa::encodeutf('Definições de Subscrição'));
define('_ACA_SUBMESSAGE', compa::encodeutf('Email de Subscrição'));
define('_ACA_SUBSCRIBE_LIST', compa::encodeutf('Subscrever uma lista'));

define('_ACA_USABLE_TAGS', compa::encodeutf('Tags utilizáveis'));
define('_ACA_NAME_AND_CONFIRM', compa::encodeutf('<b>[CONFIRM]</b> = Isto cria um link clicável onde o assinante pode confirmar a sua subscrição. Isto é <strong>obrigatório</strong> para que o jNews funcione correctamente.<br />'
.'<br />[NAME] = Isto será substituído pelo nome que o assinante introduziu, estará a enviar emails personalizados ao usar isto.<br />'
.'<br />[FIRSTNAME] = Isto será substituído pelo PRIMEIRO nome do assinante, o primeiro nome é DEFINIDO pelo primeiro nome introduzido pelo assinante.<br />'));
define('_ACA_CONFIRMFROMNAME', compa::encodeutf('Confirmar o nome do Remetente'));
define('_ACA_CONFIRMFROMNAME_TIPS', compa::encodeutf('Introduza o nome do remetente a mostrar na confirmação das listas.'));
define('_ACA_CONFIRMFROMEMAIL', compa::encodeutf('Confirmar o email do remetente'));
define('_ACA_CONFIRMFROMEMAIL_TIPS', compa::encodeutf('Introduza o endereço de email do remetente a mostrar na confirmação das listas.'));
define('_ACA_CONFIRMBOUNCE', compa::encodeutf('Endereço de Bounce'));
define('_ACA_CONFIRMBOUNCE_TIPS', compa::encodeutf('Introduza o endereço de bounce do remetente a mostrar na confirmação das listas.'));
define('_ACA_HTML_CONFIRM', compa::encodeutf('Confirmar HTML'));
define('_ACA_HTML_CONFIRM_TIPS', compa::encodeutf('Selecione SIM se as listas de confirmação devem ser em HTML se o utilizador permitir HTML.'));
define('_ACA_TIME_ZONE_ASK', compa::encodeutf('Perguntar Zona de Fuso Horário'));
define('_ACA_TIME_ZONE_TIPS', compa::encodeutf('Selecione SIM se quiser perguntar ao utilizador qual a sua zona de fuso horário. Quando aplicável, os mailings em espera serão enviados baseados na zona de fuso horário'));

 // Cron Set up
define('_ACA_TIME_OFFSET_URL', compa::encodeutf('clique aqui para definir a zona de fuso horário no painel de configuração global do Joomla -> Separador Locale'));
define('_ACA_TIME_OFFSET_TIPS', compa::encodeutf('Defina a zona de fuso horário do seu servidor para que a data e hora guardadas sejam exactas'));
define('_ACA_TIME_OFFSET', compa::encodeutf('Fuso Horário'));
define('_ACA_CRON_TITLE', compa::encodeutf('Definir uma função Con'));
define('_ACA_CRON_DESC', compa::encodeutf('<br />Usar a função Cron automatiza tarefas para o seu site Joomla!<br />' .
		'Para a accionar precisa de adicionar no painel de controlo (separador cron)o seguinte comando:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index2.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Se precisar de ajuda para parametrizar ou tiver problemas por favor consulte o nosso forum <a href="http://www.ijoobi.com" target="_blank">http://www.ijoobi.com</a>'));
// sending settings
define('_ACA_PAUSEX', compa::encodeutf('Pausa x segundos por cada quantidade de emails configurada'));
define('_ACA_PAUSEX_TIPS', compa::encodeutf('Introduza o número de segundos que o jNews dará ao servidor de SMTP para enviar as mensagens antes de proceder a novo envio do grupo seguinte de mensagens.'));
define('_ACA_EMAIL_BET_PAUSE', compa::encodeutf('Emails entre pausas'));
define('_ACA_EMAIL_BET_PAUSE_TIPS', compa::encodeutf('Número de emails a enviar antes de fazer pausa.'));
define('_ACA_WAIT_USER_PAUSE', compa::encodeutf('Esperar por acção do utilizador numa pausa'));
define('_ACA_WAIT_USER_PAUSE_TIPS', compa::encodeutf('Caso o script deva esperar por acção do utilizador quando pausado entre conjuntos de mailings.'));
define('_ACA_SCRIPT_TIMEOUT', compa::encodeutf('Tempo de intervalo do Script'));
define('_ACA_SCRIPT_TIMEOUT_TIPS', compa::encodeutf('Número de minutos que o script deverá ter para correr (0 para ilimitados).'));
// Stats settings
define('_ACA_ENABLE_READ_STATS', compa::encodeutf('Activar leitura de estatísticas'));
define('_ACA_ENABLE_READ_STATS_TIPS', compa::encodeutf('Selecione SIM se quiser guardar no histórico o número de visualizações. Esta técnica só pode ser usada com mailings em html'));
define('_ACA_LOG_VIEWSPERSUB', compa::encodeutf('Guardar histórico de visualizações por assinante'));
define('_ACA_LOG_VIEWSPERSUB_TIPS', compa::encodeutf('Selecione SIM se quiser guardar no histórico o número de visualizações por assinante. Esta técnica só pode ser usada com mailings em html'));
// Logs settings
define('_ACA_DETAILED', compa::encodeutf('Históricos detalhados'));
define('_ACA_SIMPLE', compa::encodeutf('Históricos simplificados'));
define('_ACA_DIAPLAY_LOG', compa::encodeutf('Mostrar históricos'));
define('_ACA_DISPLAY_LOG_TIPS', compa::encodeutf('Selecione SIM se quiser mostrar os históricos enquanto envia mailings.'));
define('_ACA_SEND_PERF_DATA', compa::encodeutf('Envio de performance para fora'));
define('_ACA_SEND_PERF_DATA_TIPS', compa::encodeutf('Selecione SIM se quiser permitir ao jNews enviar relatórios ANÓNIMOS sobre a sua configuração, número de assinantes de uma lista e o tempo que levou e enviar o mailing. Isto dá-nos uma ideia acerca da performance do jNews e AJUDA-NOS a melhorar o jNews em futuros desenvolvimentos.'));
define('_ACA_SEND_AUTO_LOG', compa::encodeutf('Histórico de envio para o Auto-resposta'));
define('_ACA_SEND_AUTO_LOG_TIPS', compa::encodeutf('Selecione SIM se quiser enviar um email com histórico cada vez que a fila for processada.  AVISO: isto pode resultar numa grande quantidade de emails.'));
define('_ACA_SEND_LOG', compa::encodeutf('Histórico de envio'));
define('_ACA_SEND_LOG_TIPS', compa::encodeutf('Caso deva ser enviado um email com o histórico do mailing para o endereço de email do utilizador que envioou o mailing.'));
define('_ACA_SEND_LOGDETAIL', compa::encodeutf('Detalhe do histórico de envio'));
define('_ACA_SEND_LOGDETAIL_TIPS', compa::encodeutf('DETALHADO inclúe a informação de sucesso ou falha para cada assinante e um resumo geral da informação. SIMPLES apenas envia o resumo geral.'));
define('_ACA_SEND_LOGCLOSED', compa::encodeutf('Enviar histórico se a conexão for fechada'));
define('_ACA_SEND_LOGCLOSED_TIPS', compa::encodeutf('Com esta opção activada o utilizador que enviou o mailing receberá na mesma o relatório por email.'));
define('_ACA_SAVE_LOG', compa::encodeutf('Salvar Histórico'));
define('_ACA_SAVE_LOG_TIPS', compa::encodeutf('Caso o histórico do mailing deva ser anexado ao ficheiro do histórico.'));
define('_ACA_SAVE_LOGDETAIL', compa::encodeutf('Guardar histórico detalhado'));
define('_ACA_SAVE_LOGDETAIL_TIPS', compa::encodeutf('DETALHADO inclúe a informação de sucesso ou falha para cada assinante e um resumo geral da informação. SIMPLES apenas envia o resumo geral.'));
define('_ACA_SAVE_LOGFILE', compa::encodeutf('Salvar ficheiro de Histórico'));
define('_ACA_SAVE_LOGFILE_TIPS', compa::encodeutf('Ficheiro ao qual a informção de histórico será anexada. Este ficheiro poderá ficar muito grande.'));
define('_ACA_CLEAR_LOG', compa::encodeutf('Limpar Histórico'));
define('_ACA_CLEAR_LOG_TIPS', compa::encodeutf('Limpa o ficheiro de Histórico.'));

### control panel
define('_ACA_CP_LAST_QUEUE', compa::encodeutf('Última fila executada'));
define('_ACA_CP_TOTAL', compa::encodeutf('Total'));
define('_ACA_MAILING_COPY', compa::encodeutf('Mailing copiado com sucesso!'));

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', compa::encodeutf('Mostrar Guia'));
define('_ACA_SHOW_GUIDE_TIPS', compa::encodeutf('Mostra o Guia no início para ajudar novos utilizadores a criar uma newsletter, uma auto-resposta e parametrizar correctamente o jNews.'));
define('_ACA_AUTOS_ON', compa::encodeutf('Usar Auto-respostas'));
define('_ACA_AUTOS_ON_TIPS', compa::encodeutf('Selecione NÃO se não quiser usar Auto-respostas, todas as opções de auto-respostas serão desactivadas.'));
define('_ACA_NEWS_ON', compa::encodeutf('Usar Newsletters'));
define('_ACA_NEWS_ON_TIPS', compa::encodeutf('Selecione NÃO se não quiser usar Newsletters, todas as opções de newsletters serão desactivadas.'));
define('_ACA_SHOW_TIPS', compa::encodeutf('Mostrar Dicas'));
define('_ACA_SHOW_TIPS_TIPS', compa::encodeutf('Mostra dicas para ajudar os utilizadores a usar o jNews de forma eficaz.'));
define('_ACA_SHOW_FOOTER', compa::encodeutf('Mostrar Rodapé'));
define('_ACA_SHOW_FOOTER_TIPS', compa::encodeutf('Caso deva ou não ser mostrado os direitos de cópia no rodapé.'));
define('_ACA_SHOW_LISTS', compa::encodeutf('Mostrar Listas no sítio-principal'));
define('_ACA_SHOW_LISTS_TIPS', compa::encodeutf('Quando o utilizador não está registado mostra uma lista das listas que pode subscrever através de um botão de arquivo para as newsletters  ou simplesmente um formulário de login para que se possam registar.'));
define('_ACA_CONFIG_UPDATED', compa::encodeutf('Os detalhes da configuração foram actualizados!'));
define('_ACA_UPDATE_URL', compa::encodeutf('URL de Actualização'));
define('_ACA_UPDATE_URL_WARNING', compa::encodeutf('AVISO! Não mude este URL a não ser que lhe seja pedido para o fazer pela equipa técnica do jNews.<br />'));
define('_ACA_UPDATE_URL_TIPS', compa::encodeutf('Por exemplo: http://www.ijoobi.com/update/ (inclua a barra no final)'));

// module
define('_ACA_EMAIL_INVALID', compa::encodeutf('O endereço de email introduzido é inválido.'));
define('_ACA_REGISTER_REQUIRED', compa::encodeutf('É necessário registar-se primeiro no site para poder ser assinante de uma lista.'));

// Access level box
define('_ACA_OWNER', compa::encodeutf('Criador da Lista:'));
define('_ACA_ACCESS_LEVEL', compa::encodeutf('Definir nível de acesso para a lista'));
define('_ACA_ACCESS_LEVEL_OPTION', compa::encodeutf('Opções de nível de acesso'));
define('_ACA_USER_LEVEL_EDIT', compa::encodeutf('Selecione que nível de utilizador tem permissão para editar um mailing (quer do sítio-principal quer do sítio de administração) '));

//  drop down options
define('_ACA_AUTO_DAY_CH1', compa::encodeutf('Diariamente'));
define('_ACA_AUTO_DAY_CH2', compa::encodeutf('Diariamente, excepto fim-de-semana'));
define('_ACA_AUTO_DAY_CH3', compa::encodeutf('Dia sim, dia não'));
define('_ACA_AUTO_DAY_CH4', compa::encodeutf('Dia sim, dia não, excepto fim-de-semana'));
define('_ACA_AUTO_DAY_CH5', compa::encodeutf('Semanalmente'));
define('_ACA_AUTO_DAY_CH6', compa::encodeutf('Bi-semanal'));
define('_ACA_AUTO_DAY_CH7', compa::encodeutf('Mensal'));
define('_ACA_AUTO_DAY_CH9', compa::encodeutf('Anual'));
define('_ACA_AUTO_OPTION_NONE', compa::encodeutf('Não'));
define('_ACA_AUTO_OPTION_NEW', compa::encodeutf('Novos Utilizadores'));
define('_ACA_AUTO_OPTION_ALL', compa::encodeutf('Todos os Utilizadores'));

//
define('_ACA_UNSUB_MESSAGE', compa::encodeutf('Email para Não-subscrição'));
define('_ACA_UNSUB_SETTINGS', compa::encodeutf('Definições de Não-subscrição'));
define('_ACA_AUTO_ADD_NEW_USERS', compa::encodeutf('Subscrição automática de Utilizadores?'));

// Update and upgrade messages
define('_ACA_NO_UPDATES', compa::encodeutf('Não existem actualizações disponíveis de momento.'));
define('_ACA_VERSION', compa::encodeutf('Versão jNews'));
define('_ACA_NEED_UPDATED', compa::encodeutf('Ficheiros que precisam de ser actualizados:'));
define('_ACA_NEED_ADDED', compa::encodeutf('Ficheiros que precisam de ser adicionados:'));
define('_ACA_NEED_REMOVED', compa::encodeutf('Ficheiros que precisam de ser removidos:'));
define('_ACA_FILENAME', compa::encodeutf('Ficheiro:'));
define('_ACA_CURRENT_VERSION', compa::encodeutf('Versão actual:'));
define('_ACA_NEWEST_VERSION', compa::encodeutf('Última versão:'));
define('_ACA_UPDATING', compa::encodeutf('Actualizando'));
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', compa::encodeutf('Os ficheiros foram actualizados com sucesso.'));
define('_ACA_UPDATE_FAILED', compa::encodeutf('A Actualização Falhou!'));
define('_ACA_ADDING', compa::encodeutf('Adicionando'));
define('_ACA_ADDED_SUCCESSFULLY', compa::encodeutf('Adicionado com sucesso.'));
define('_ACA_ADDING_FAILED', compa::encodeutf('A Adição Falhou!'));
define('_ACA_REMOVING', compa::encodeutf('Removendo'));
define('_ACA_REMOVED_SUCCESSFULLY', compa::encodeutf('Removido com sucesso.'));
define('_ACA_REMOVING_FAILED', compa::encodeutf('A Remoção Falhou!'));
define('_ACA_INSTALL_DIFFERENT_VERSION', compa::encodeutf('Instale uma versão diferente'));
define('_ACA_CONTENT_ADD', compa::encodeutf('Adicionar conteúdo'));
define('_ACA_UPGRADE_FROM', compa::encodeutf('Importar dados (newsletters e informação de assinantes) de '));
define('_ACA_UPGRADE_MESS', compa::encodeutf('Não existem riscos para os seus dados existentes. <br /> Este processo simplesmente apenas importa dados para a base de dados do jNews.'));
define('_ACA_CONTINUE_SENDING', compa::encodeutf('Continuar e enviar'));

// jNews message
define('_ACA_UPGRADE1', compa::encodeutf('Você pode facilmente importar os seus utilizadores e newsletters '));
define('_ACA_UPGRADE2', compa::encodeutf(' para o jNews no painel de actualizações.'));
define('_ACA_UPDATE_MESSAGE', compa::encodeutf('Está disponível uma nova versão do jNews! '));
define('_ACA_UPDATE_MESSAGE_LINK', compa::encodeutf('Clique aqui para actualizar!'));
define('_ACA_CRON_SETUP', compa::encodeutf('Para que as auto-respostas sejam enviadas tem de configurar uma tarefa Cron.'));
define('_ACA_THANKYOU', compa::encodeutf('Obrigado por escolher jNews, o Seu Parceiro de Comunicação!'));
define('_ACA_NO_SERVER', compa::encodeutf('Servidor de actualização não disponível, por favor verifique mais tarde.'));
define('_ACA_MOD_PUB', compa::encodeutf('O módulo jNews não está publicado.'));
define('_ACA_MOD_PUB_LINK', compa::encodeutf('Clique aqui para o publicar!'));
define('_ACA_IMPORT_SUCCESS', compa::encodeutf('importado com sucesso'));
define('_ACA_IMPORT_EXIST', compa::encodeutf('assinante já está na base de dados'));


// jNews\'s Guide
define('_ACA_GUIDE', compa::encodeutf('Assistente'));
define('_ACA_GUIDE_FIRST_ACA_STEP', compa::encodeutf('<p>O jNews tem muitas caracteristicas grandiosas e este assistente vai guia-lo através de um processo de 4 passos fáceis para que começe a enviar newsletters e auto-respostas!<p />'));
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', compa::encodeutf('Primeiro, precisa de adicionar uma lista.  Uma lista pode ser de dois tipos, newsletter ou auto-resposta.' .
		'  Na lista você define todos os diferentes parâmetros para activar o envio das suas newsletters ou auto-respostas: nome do remetente, layout, mensagem de boas-vindas aos assinantes\' , etc...
<br /><br />Pode criar a sua primeira lista aqui: <a href="index2.php?option=com_jnewsletter&act=list" >criar uma lista</a> e clicar no botão novo.'));
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', compa::encodeutf('O jNews proporciona-lhe uma maneira fácil de importar toda a informação de um sistema prévio de newsletter.<br />' .
		' Vá ao painel de Actualizações e escolha o seu sistema prévio de newsletter para importar todas as suas newsletters e assinantes.<br /><br />' .
		'<span style="color:#FF5E00;" >IMPORTANTE: a inmporatação é LIVRE de risco e não afecta de forma alguma a informação do seu sistema prévio de newsletter</span><br />' .
		'Depois da importação será capaz de gerir os seus assinantes e mailings directamente a partir do jNews.<br /><br />'));
define('_ACA_GUIDE_SECOND_ACA_STEP', compa::encodeutf('Optimo a sua primeira lista está criada!  Agora pode escrever o seu primeiro %s.  Para criar vá para: '));
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', compa::encodeutf('Gestão de Auto-responder'));
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', compa::encodeutf('Gestão de Newsletters'));
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', compa::encodeutf(' e selecione o seu %s. <br /> Depois escolha o seu %s na lista de possibilidades.  Crie o seu primeiro mailing clicando em NOVO '));

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', compa::encodeutf('Antes de enviar a sua primeira newsletter poderá querer verificar a configuração de mail.  ' .
		'Vá para <a href="index2.php?option=com_jnewsletter&act=configuration" >Página de Configuração</a> para verificar as definições de mail. <br />'));
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', compa::encodeutf('<br />Quando estiver pronto retroceda para o Menu Newsletters, selecione o seu mailing e clique em ENVIAR'));

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', compa::encodeutf('Para que as suas auto-respostas sejam enviadas necessita que primeiro esteja criada uma tarefa Cron no seu servidor. ' .
		' Por favor refira-se ao separador Cron no painel de configuração.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >clique aqui</a> para aparender como criar uma tarefa Cron. <br />'));

define('_ACA_GUIDE_MODULE', compa::encodeutf(' <br />Certifique também que publicou o módulo jNews para que as pessoas possam assinar a lista.'));

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', compa::encodeutf(' Pode agora criar uma auto-resposta.'));
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', compa::encodeutf(' Pode agora também criar uma newsletter.'));

define('_ACA_GUIDE_FOUR_ACA_STEP', compa::encodeutf('<p><br />Aí está! Está agora pronto para comunicar de forma eficaz com os seus visitantes e utilizadores. Este assistente terminará assim que você introduzir um segundo mailing ou então pode desliga-lo no <a href="index2.php?option=com_jnewsletter&act=configuration" >Painel de Configuração</a>.' .
		'<br /><br />  Se tiver alguma questão enquanto usar o jNews, por favor refira-se ao ' .
		'<a target="_blank" href="http://www.ijoobi.com/index.php?option=com_agora&Itemid=60" >forum</a>. ' .
		' Encontrará também muita informação sobre como comunicar de forma eficaz com os seus assinantes em <a href="http://www.ijoobi.com/" target="_blank" >www.ijoobi.com</a>.' .
		'<p /><br /><b>Obrigado por usar o jNews. O Seu Parceiro de Comunicação!</b> '));
define('_ACA_GUIDE_TURNOFF', compa::encodeutf('O assitente esta agora a ser desligado!'));
define('_ACA_STEP', compa::encodeutf('STEP '));

// jNews Install
define('_ACA_INSTALL_CONFIG', compa::encodeutf('Configuração jNews'));
define('_ACA_INSTALL_SUCCESS', compa::encodeutf('Instalação com Sucesso'));
define('_ACA_INSTALL_ERROR', compa::encodeutf('Erro na instalação'));
define('_ACA_INSTALL_BOT', compa::encodeutf('Plugin (Bot) jNews'));
define('_ACA_INSTALL_MODULE', compa::encodeutf('Módulo jNews'));
//Others
define('_ACA_JAVASCRIPT', compa::encodeutf('!Aviso! Para uma correcta operação o Javascript deve estar activado.'));
define('_ACA_EXPORT_TEXT', compa::encodeutf('Os assinantes exportados são baseados na lista que escolheu. <br />Exportar assinantes para lista'));
define('_ACA_IMPORT_TIPS', compa::encodeutf('Importar assinantes. A informação no ficheiro precisa de ter o seguinte formato: <br />' .
		'Nome,email,recebeHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmado(1/0)</span>'));
define('_ACA_SUBCRIBER_EXIT', compa::encodeutf('já é assinante'));
define('_ACA_GET_STARTED', compa::encodeutf('Clique aqui para começar!'));

//News since 1.0.1
define('_ACA_WARNING_1011', compa::encodeutf('Aviso: 1011: A Actualização não funcionará por causa das restrições do seu server.'));
define('_ACA_SEND_MAIL_FROM_TIPS', compa::encodeutf('Escolha que endereço de email será mostrado como remetente.'));
define('_ACA_SEND_MAIL_NAME_TIPS', compa::encodeutf('Escolha que nome se mostrado como remetente.'));
define('_ACA_MAILSENDMETHOD_TIPS', compa::encodeutf('Escolha que mailer deseja usar: PHP mail function, <span>Sendmail</span> ou SMTP Server.'));
define('_ACA_SENDMAILPATH_TIPS', compa::encodeutf('Esta é a directoria do servidor de Mail'));
define('_ACA_LIST_T_TEMPLATE', compa::encodeutf('Tema Padrão'));
define('_ACA_NO_MAILING_ENTERED', compa::encodeutf('Nenhum mailing fornecido'));
define('_ACA_NO_LIST_ENTERED', compa::encodeutf('Nenhuma lista fornecida'));
define('_ACA_SENT_MAILING', compa::encodeutf('Mailings Enviados'));
define('_ACA_SELECT_FILE', compa::encodeutf('Por favor selecione um ficheiro para '));
define('_ACA_LIST_IMPORT', compa::encodeutf('Verifique a(s) lista(s) que você quer que tenha(m) assinantes associados.'));
define('_ACA_PB_QUEUE', compa::encodeutf('Subscriber inserted but problem to connect him/her to the list(s). Please check manually.'));
define('_ACA_UPDATE_MESS', compa::encodeutf(''));
define('_ACA_UPDATE_MESS1', compa::encodeutf('Actualização Altamente Recomendada!'));
define('_ACA_UPDATE_MESS2', compa::encodeutf('Remendo e pequenas correcções.'));
define('_ACA_UPDATE_MESS3', compa::encodeutf('Novo lançamento.'));
define('_ACA_UPDATE_MESS5', compa::encodeutf('É obrigatório Joomla 1.5 para actualizar.'));
define('_ACA_UPDATE_IS_AVAIL', compa::encodeutf(' está disponível!'));
define('_ACA_NO_MAILING_SENT', compa::encodeutf('Nenhum mailing enviado!'));
define('_ACA_SHOW_LOGIN', compa::encodeutf('Mostra formulário de login'));
define('_ACA_SHOW_LOGIN_TIPS', compa::encodeutf('Selecione SIM para mostrar um formulário de login no sítio-principal do Painel de Controlo do jNews para que o utilizador possa registar-se no site.'));
define('_ACA_LISTS_EDITOR', compa::encodeutf('Editor de Descrição da Lista'));
define('_ACA_LISTS_EDITOR_TIPS', compa::encodeutf('Selecione SIM para usar um editor HTML para editar o campo Descrição da Lista.'));
define('_ACA_SUBCRIBERS_VIEW', compa::encodeutf('Ver assinantes'));

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', compa::encodeutf('Definiçoes do Sítio-Principal'));
define('_ACA_SHOW_LOGOUT', compa::encodeutf('Mostra botão de logout'));
define('_ACA_SHOW_LOGOUT_TIPS', compa::encodeutf('Selecione SIM para mostrar um botão de logout no front-end do painal de controlo do jNews.'));

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', compa::encodeutf('Integração'));
define('_ACA_CB_INTEGRATION', compa::encodeutf('Integração com o Community Builder'));
define('_ACA_INSTALL_PLUGIN', compa::encodeutf('Plugin Community Builder (Integração jNews) '));
define('_ACA_CB_PLUGIN_NOT_INSTALLED', compa::encodeutf('O plugin jNews para o Community Builder ainda não está instalado!'));
define('_ACA_CB_PLUGIN', compa::encodeutf('Listas aquando do registo'));
define('_ACA_CB_PLUGIN_TIPS', compa::encodeutf('Selecione SIM para mostrar as listas de mailing no formulário de registo do community builder'));
define('_ACA_CB_LISTS', compa::encodeutf('Listas de IDs'));
define('_ACA_CB_LISTS_TIPS', compa::encodeutf('ESTE CAMPO É OBRIGATÓRIO. Introduza o número de ID das listas que você quer permitir aos utilizadores assinar separados por vírgula ,  (0 mostra todas as listas)'));
define('_ACA_CB_INTRO', compa::encodeutf('Texto de Introdução'));
define('_ACA_CB_INTRO_TIPS', compa::encodeutf('Um texto aparecerá antes da listagem. DEIXE EM BRANCO PARA NÃO MOSTRAR NADA.  Use cb_pretext para layout CSS.'));
define('_ACA_CB_SHOW_NAME', compa::encodeutf('Mostra Nome da Lista'));
define('_ACA_CB_SHOW_NAME_TIPS', compa::encodeutf('Selecione se deve ou não mostrar o nome da lista depois da introdução.'));
define('_ACA_CB_LIST_DEFAULT', compa::encodeutf('Verifica lista por defeito'));
define('_ACA_CB_LIST_DEFAULT_TIPS', compa::encodeutf('Selecione se quer ou não, ter uma caixa de verificação para cada lista verificado por defeito.'));
define('_ACA_CB_HTML_SHOW', compa::encodeutf('Mostra Receber HTML'));
define('_ACA_CB_HTML_SHOW_TIPS', compa::encodeutf('Escolha SIM para permitir aos utilizadores decidir se querem ou não, receber emails em HTML. Escolha NÃO para usar o receber HTML por defeito.'));
define('_ACA_CB_HTML_DEFAULT', compa::encodeutf('Receber HTML por defeito'));
define('_ACA_CB_HTML_DEFAULT_TIPS', compa::encodeutf('Escolha esta opção para mostrar a configuração de mail em HTML por defeito. Se o Mostra Receber Html estiver para NÃO então esta será a opção por defeitot.'));

// Since 1.0.4
define('_ACA_BACKUP_FAILED', compa::encodeutf('Não foi possível efectuar a cópia de segurança do ficheiro! O ficheiro não foi substituído.'));
define('_ACA_BACKUP_YOUR_FILES', compa::encodeutf('Foi efectuada uma cópia de segurança dos ficheiros da versão antiga na seguinte directória:'));
define('_ACA_SERVER_LOCAL_TIME', compa::encodeutf('Hora local do Servidor'));
define('_ACA_SHOW_ARCHIVE', compa::encodeutf('Mostrar botão de Arquivo'));
define('_ACA_SHOW_ARCHIVE_TIPS', compa::encodeutf('Selecione SIM para mostrar o botão de Arquivo no front-end das listas de Newsletter'));
define('_ACA_LIST_OPT_TAG', compa::encodeutf('Tags'));
define('_ACA_LIST_OPT_IMG', compa::encodeutf('Imagens'));
define('_ACA_LIST_OPT_CTT', compa::encodeutf('Conteúdo'));
define('_ACA_INPUT_NAME_TIPS', compa::encodeutf('Introduza o seu nome completo (primeiro nome primeiro)'));
define('_ACA_INPUT_EMAIL_TIPS', compa::encodeutf('Introduza o seu endereço de email (Certifique-se de que este é um endereço de email válido para que possa receber as nossas Newsletters.)'));
define('_ACA_RECEIVE_HTML_TIPS', compa::encodeutf('Escolha SIM se quiser receber mails em HTML - NÃO para receber mails em apenas texto'));
define('_ACA_TIME_ZONE_ASK_TIPS', compa::encodeutf('Especifique a sua zona de fuso horário.'));


// Since 1.0.5
define('_ACA_FILES', compa::encodeutf('Ficheiros'));
define('_ACA_FILES_UPLOAD', compa::encodeutf('Envio'));
define('_ACA_MENU_UPLOAD_IMG', compa::encodeutf('Envio de Imagens'));
define('_ACA_TOO_LARGE', compa::encodeutf('Tamanho do ficheiro demasiado grande. O tamanho máximo permitido é'));
define('_ACA_MISSING_DIR', compa::encodeutf('O directório de destino não existe'));
define('_ACA_IS_NOT_DIR', compa::encodeutf('O directório de destino não existe ou é um ficheiro regular.'));
define('_ACA_NO_WRITE_PERMS', compa::encodeutf('O directório de destino não tem permissão de escrita.'));
define('_ACA_NO_USER_FILE', compa::encodeutf('Não selecionou nenhum ficheiro para envio.'));
define('_ACA_E_FAIL_MOVE', compa::encodeutf('Impossível mover o ficheiro.'));
define('_ACA_FILE_EXISTS', compa::encodeutf('O ficheiro destino já existe.'));
define('_ACA_CANNOT_OVERWRITE', compa::encodeutf('O ficheiro destino já existe e não pode ser sobreposto.'));
define('_ACA_NOT_ALLOWED_EXTENSION', compa::encodeutf('Extensão de ficheiro não permitida.'));
define('_ACA_PARTIAL', compa::encodeutf('O ficheiro foi enviado apenas parcialmente.'));
define('_ACA_UPLOAD_ERROR', compa::encodeutf('Erro de envio:'));
define('DEV_NO_DEF_FILE', compa::encodeutf('O ficheiro foi enviado apenas parcialmente.'));
define('_ACA_CONTENTREP', compa::encodeutf('[SUBSCRIPTIONS] = Isto será substiuído pelos links de subscrição.' .
		' Isto é <strong>obrigatório</strong> para que o jNews funcione correctamente.<br />' .
		'Se colocar algum outro conteúdo nesta caixa o mesmo será mostrado em todos os mailings correspondentes a esta Lista.' .
		' <br />Adicione a sua mensagem de subscrição no final.  O jNews adicionará automaticamente um link para que o assinante altere a informação dele, e um link para remover-se da Lista.'));

// since 1.0.6
define('_ACA_NOTIFICATION', compa::encodeutf('Notificação'));  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', compa::encodeutf('Notificações'));
define('_ACA_USE_SEF', compa::encodeutf('SEF nos mailings'));
define('_ACA_USE_SEF_TIPS', compa::encodeutf('É recomendado que escolha NÃO.  No entanto se desejar que o URL incluído nos seus mailings use SEF então escolha SIM.' .
		' <br /><b>Os links funcionarão de igual forma para ambas as opções.  NÃO, assegurará que os links nos mailings funcionarão sempre mesmo que altere o seu SEF.</b> '));
define('_ACA_ERR_NB', compa::encodeutf('Erro #: ERR'));
define('_ACA_ERR_SETTINGS', compa::encodeutf('Definições de manuseamento de Erros'));
define('_ACA_ERR_SEND', compa::encodeutf('Enviar relatório de erros'));
define('_ACA_ERR_SEND_TIPS', compa::encodeutf('Se deseja que o jNews seja um produto melhor por favor selecione SIM.  Isto envia-nos um relatório de erros.  Por isso nunca mais necessita de reportar bugs ;-) <br /> <b>NENHUMA INFORMAÇÃO PRIVADA É ENVIADA</b>.  Nós nem sequer saberemos a que site pertençe o erro. Apenas enviamos informação sobre o jNews , a instalação PHP e queries SQL. '));
define('_ACA_ERR_SHOW_TIPS', compa::encodeutf('Escolha SIM para mostrar o número do erro no ecrán.  Usado principalmente para efeitos de debuging. '));
define('_ACA_ERR_SHOW', compa::encodeutf('Mostra erros'));
define('_ACA_LIST_SHOW_UNSUBCRIBE', compa::encodeutf('Mostra links de remoção'));
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', compa::encodeutf('Selecione SIM para mostrar links de remoção no rodapé dos mailings para que os utilizadores possam mudar as suas subscrições. <br /> NÃO, desactiva os links e rodapé.'));
define('_ACA_UPDATE_INSTALL', compa::encodeutf('<span style="color: rgb(255, 0, 0);">NOTÍCIA IMPORTANTE!</span> <br />Se está a fazer uma actualização a partir de uma versão anterior do jNews, precisa de actualizar a estrutura da sua base de dados clicando no botão seguinte (A sua informação ficará íntegra)'));
define('_ACA_UPDATE_INSTALL_BTN', compa::encodeutf('Actualizar tabelas e configuração'));
define('_ACA_MAILING_MAX_TIME', compa::encodeutf('Tempo máximo da fila'));
define('_ACA_MAILING_MAX_TIME_TIPS', compa::encodeutf('Define o tempo máximo para cada conjunto de emails enviados pela fila. Recomendado entre 30s e 2mins.'));

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', compa::encodeutf('Integração com VirtueMart'));
define('_ACA_VM_COUPON_NOTIF', compa::encodeutf('Notificação de ID do Cupão'));
define('_ACA_VM_COUPON_NOTIF_TIPS', compa::encodeutf('Especifica o número de ID do mailing que quiser usar para enviar cupões para os seus clientes.'));
define('_ACA_VM_NEW_PRODUCT', compa::encodeutf('Notificação de ID de novos produtos'));
define('_ACA_VM_NEW_PRODUCT_TIPS', compa::encodeutf('Especifica o número de ID do mailing que quiser usar para enviar notificação de novos produtos.'));


// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', compa::encodeutf('Criar Formulário'));
define('_ACA_FORM_COPY', compa::encodeutf('Código HTML'));
define('_ACA_FORM_COPY_TIPS', compa::encodeutf('Copie o código HTML gerado para a sua página HTML.'));
define('_ACA_FORM_LIST_TIPS', compa::encodeutf('Selecione a lista que quer incluir neste formulário'));
// update messages
define('_ACA_UPDATE_MESS4', compa::encodeutf('Não pode ser actualizado automaticamente.'));
define('_ACA_WARNG_REMOTE_FILE', compa::encodeutf('Não há maneira de conseguir o ficheiro remoto.'));
define('_ACA_ERROR_FETCH', compa::encodeutf('Erro de acesso ao ficheiro.'));

define('_ACA_CHECK', compa::encodeutf('Verificar'));
define('_ACA_MORE_INFO', compa::encodeutf('Mais informação'));
define('_ACA_UPDATE_NEW', compa::encodeutf('Actualizar para nova versão'));
define('_ACA_UPGRADE', compa::encodeutf('Upgrade para produto mais elevado'));
define('_ACA_DOWNDATE', compa::encodeutf('Voltar a instalar versão anterior'));
define('_ACA_DOWNGRADE', compa::encodeutf('Voltar para o produto básico'));
define('_ACA_REQUIRE_JOOM', compa::encodeutf('Requere Joomla'));
define('_ACA_TRY_IT', compa::encodeutf('Experimentar!'));
define('_ACA_NEWER', compa::encodeutf('Novo'));
define('_ACA_OLDER', compa::encodeutf('Antigo'));
define('_ACA_CURRENT', compa::encodeutf('Actual'));

// since 1.0.9
define('_ACA_CHECK_COMP', compa::encodeutf('Experimentar um dos outros componentes'));
define('_ACA_MENU_VIDEO', compa::encodeutf('Tutoriais Video'));
define('_ACA_AUTO_SCHEDULE', compa::encodeutf('Temporizador'));
define('_ACA_SCHEDULE_TITLE', compa::encodeutf('Definições de funções automáticas temporizadas'));
define('_ACA_ISSUE_NB_TIPS', compa::encodeutf('Atribuir número automaticamente gerado pelo sistema'));
define('_ACA_SEL_ALL', compa::encodeutf('Todos os mailings'));
define('_ACA_SEL_ALL_SUB', compa::encodeutf('Todas as listas'));
define('_ACA_INTRO_ONLY_TIPS', compa::encodeutf('Se assinalar esta caixa apenas a introdução do artigo será inserida no mailing com um link LER MAIS para a leitura completa do mesmo no seu site.'));
define('_ACA_TAGS_TITLE', compa::encodeutf('Tag de conteúdo'));
define('_ACA_TAGS_TITLE_TIPS', compa::encodeutf('Copie e cole esta tag para o seu mailing, no sítio onde quer colocar o conteúdo.'));
define('_ACA_PREVIEW_EMAIL_TEST', compa::encodeutf('Indica o endereço de email para onde enviar um teste'));
define('_ACA_PREVIEW_TITLE', compa::encodeutf('Pré-visualizar'));
define('_ACA_AUTO_UPDATE', compa::encodeutf('Nova notificação de actualização'));
define('_ACA_AUTO_UPDATE_TIPS', compa::encodeutf('Selecione SIM se quiser ser notificado de novas actualizações para o seu componente. <br />IMPORTANTE!! Mostrar Dicas tem de estar activado para que esta função funcione.'));

// since 1.1.0
define('_ACA_LICENSE', compa::encodeutf('Informação de Licenceamento'));


// since 1.1.1
define('_ACA_NEW', compa::encodeutf('Novo'));
define('_ACA_SCHEDULE_SETUP', compa::encodeutf('Para que as auto-respostas sejam enviadas tem de definir uma agenda na configuração.'));
define('_ACA_SCHEDULER', compa::encodeutf('Agendador'));
define('_ACA_JNEWSLETTER_CRON_DESC', compa::encodeutf('se não tem acesso à administração de tarefas cron no seu website, pode registar-se para uma Conta Tarefa Cron jNews Grátis em:'));
define('_ACA_CRON_DOCUMENTATION', compa::encodeutf('Pode encontrar mais informação sobre como definir o Agendador jNews no url seguinte:'));
define('_ACA_CRON_DOC_URL', compa::encodeutf('<a href="http://www.ijoobi.com/index.php?option=com_content&view=article&id=4249&catid=29&Itemid=72"
 target="_blank">http://www.ijoobi.com/index.php?option=com_content&Itemid=72&view=category&layout=blog&id=29&limit=60</a>'));
define( '_ACA_QUEUE_PROCESSED', compa::encodeutf('Fila processada com sucesso...'));
define( '_ACA_ERROR_MOVING_UPLOAD', compa::encodeutf('Erro ao mover ficheiro importado'));

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', compa::encodeutf('Frequência do Agenda'));
define( '_ACA_CRON_MAX_FREQ', compa::encodeutf('Frequência Máxima da Agenda'));
define( '_ACA_CRON_MAX_FREQ_TIPS', compa::encodeutf('Especifica a frequência máxima que a agenda pode ser executada ( em minutos ).  Isto limitará a atenda mesmo que a tarefa cron esteja definida com maior frequência.'));
define( '_ACA_CRON_MAX_EMAIL', compa::encodeutf('Máximo de emails por tarefa'));
define( '_ACA_CRON_MAX_EMAIL_TIPS', compa::encodeutf('Especifica o número máximo de emails enviados por tarefa (0 ilimitados).'));
define( '_ACA_CRON_MINUTES', compa::encodeutf(' minutos'));
define( '_ACA_SHOW_SIGNATURE', compa::encodeutf('Mostra rodapé do email'));
define( '_ACA_SHOW_SIGNATURE_TIPS', compa::encodeutf('Caso queira ou não promover o jNews no rodapé dos emails.'));
define( '_ACA_QUEUE_AUTO_PROCESSED', compa::encodeutf('Auto-respostas processadas com successo...'));
define( '_ACA_QUEUE_NEWS_PROCESSED', compa::encodeutf('Newsletters agendadas processadas com sucesso...'));
define( '_ACA_MENU_SYNC_USERS', compa::encodeutf('Sincronizar Utilizadores'));
define( '_ACA_SYNC_USERS_SUCCESS', compa::encodeutf('Sincronização de Utilizadores processada com sucesso!'));

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Sair'));
if (!defined('_CMN_YES')) define( '_CMN_YES', compa::encodeutf('Sim'));
if (!defined('_CMN_NO')) define( '_CMN_NO', compa::encodeutf('Não'));
if (!defined('_HI')) define( '_HI', compa::encodeutf('Olá'));
if (!defined('_CMN_TOP')) define( '_CMN_TOP', compa::encodeutf('Topo'));
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', compa::encodeutf('Fundo'));
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Logout'));

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', compa::encodeutf('Se selecionar isto apenas o título do artigo será inserido no mailing como link para o artigo completo no seu site.'));
define('_ACA_TITLE_ONLY', compa::encodeutf('Apenas Título'));
define('_ACA_FULL_ARTICLE_TIPS', compa::encodeutf('Se selecionar isto o artigo completo será inserido no mailing'));
define('_ACA_FULL_ARTICLE', compa::encodeutf('Artigo Completo'));
define('_ACA_CONTENT_ITEM_SELECT_T', compa::encodeutf('Selecione um item de conteúdo para ser adicionado à mensagem. <br />Copie e cole o<b>content tag</b> para o mailing.  Pode escolher ter a totalidade do texto, apenas introdução, ou apenas título com (0, 1, ou 2 respectivamente). '));
define('_ACA_SUBSCRIBE_LIST2', compa::encodeutf('Lista(s) de Mailing'));

// smart-newsletter function
define('_ACA_AUTONEWS', compa::encodeutf('Smart-Newsletter'));
define('_ACA_MENU_AUTONEWS', compa::encodeutf('Smart-Newsletters'));
define('_ACA_AUTO_NEWS_OPTION', compa::encodeutf('Opções da Smart-Newsletter'));
define('_ACA_AUTONEWS_FREQ', compa::encodeutf('Frequência da Newsletter'));
define('_ACA_AUTONEWS_FREQ_TIPS', compa::encodeutf('Especifica a frequência com que deseja enviar as smart-newsletter.'));
define('_ACA_AUTONEWS_SECTION', compa::encodeutf('Secção de Artigos'));
define('_ACA_AUTONEWS_SECTION_TIPS', compa::encodeutf('Especifica a secção de que quer escolher os artigos.'));
define('_ACA_AUTONEWS_CAT', compa::encodeutf('Categoria do Artigo'));
define('_ACA_AUTONEWS_CAT_TIPS', compa::encodeutf('Especifica a categoria de que quer escolher os artigos (TODAS para todos os artigos naquela secção).'));
define('_ACA_SELECT_SECTION', compa::encodeutf('Selecione secção'));
define('_ACA_SELECT_CAT', compa::encodeutf('Todas as Categorias'));
define('_ACA_AUTO_DAY_CH8', compa::encodeutf('Quaternalmente'));
define('_ACA_AUTONEWS_STARTDATE', compa::encodeutf('Data de começo'));
define('_ACA_AUTONEWS_STARTDATE_TIPS', compa::encodeutf('Especifica a data para começar a enviar a Smart Newsletter.'));
define('_ACA_AUTONEWS_TYPE', compa::encodeutf('Renderização do Conteúdo'));// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', compa::encodeutf('Artigo Completo: will include the entire article in the newsletter.<br />' .
		'Apenas Introdução: será incluida apenas a introdução do artigo na newsletter.<br/>' .
		'Apenas Título: será incluido apenas o título do artigo na newsletter.'));
define('_ACA_TAGS_AUTONEWS', compa::encodeutf('[SMARTNEWSLETTER] = Isto será substituído pela Smart-newsletter.'));

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', compa::encodeutf('Create / View Mailings'));
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

define( '_ACA_LIST_ACCESS_EDIT', compa::encodeutf('Mailing Add/Edit Access'));
define( '_ACA_INFO_LIST_ACCESS_EDIT', compa::encodeutf('Specify what group of users can add or edit a new mailing for this list'));
define( '_ACA_MAILING_NEW_FRONT', compa::encodeutf('Createa New Mailing'));

define('_ACA_AUTO_ARCHIVE', compa::encodeutf('Auto-Archive'));
define('_ACA_MENU_ARCHIVE', compa::encodeutf('Auto-Archive'));

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', compa::encodeutf('[ISSUENB] = This will be replaced by the issue number of  the newsletter.'));
define('_ACA_TAGS_DATE', compa::encodeutf('[DATE] = This will be replaced by the sent date.'));
define('_ACA_TAGS_CB', compa::encodeutf('[CBTAG:{field_name}] = This will be replaced by the value taken from the Community Builder field: eg. [CBTAG:firstname] '));
define( '_ACA_MAINTENANCE', compa::encodeutf('Joobi Care'));

define('_ACA_THINK_PRO', compa::encodeutf('When you have professional needs, you use professional components!'));
define('_ACA_THINK_PRO_1', compa::encodeutf('Smart-Newsletters'));
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

define( '_ACA_MAIL_FORMAT', compa::encodeutf('Formato de codificação'));
define( '_ACA_MAIL_FORMAT_TIPS', compa::encodeutf('Que formato utiliza para codificar os mailings, somente texto ou MIME'));
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', compa::encodeutf('If you do not have access to a cron task manager on your website, you can use the Free jCron component to create a cron task from your website.'));

//since 1.3.1
define('_ACA_SHOW_AUTHOR', compa::encodeutf('Mostrar nome do autor'));
define('_ACA_SHOW_AUTHOR_TIPS', compa::encodeutf('Seleccione Sim se pretende adicionar o nome do autor quando adiciona um artigo ao Mailing'));

//since 1.3.5
define('_ACA_REGWARN_NAME', compa::encodeutf('Por favor, informe seu nome.'));
define('_ACA_REGWARN_MAIL', compa::encodeutf('Por favor, informe um endereço de e-mail válido.'));

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', compa::encodeutf('Se seleccionar Sim o e-mail do utilizador será adicionado como parametro no final do url redireccionado (o link redireccionado para o seu modulo or para um formulário jNews externo).<br/>Pode ser útil se pretender executar scripts especiais na sua página redireccionada.'));
define('_ACA_ADDEMAILREDLINK', compa::encodeutf('Adicionar e-mail para redireccionar link'));

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
define('_ACA_REDIRECTCONFIRMATION', compa::encodeutf('URL redireccionado'));
define('_ACA_REDIRECTCONFIRMATION_TIPS', compa::encodeutf('Se requer um e-mail de confirmação, o utilizador quando confirmar será remetido para este URL.'));

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