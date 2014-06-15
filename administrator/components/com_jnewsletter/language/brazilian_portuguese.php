<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');


/**
 * <p>Brazilian Portuguese language file.</p>
 * @copyright (c) 2006-2010 Joobi Limited / All Rights Reserved
 * @author  Navsoft <contato@aquaviarios.com>
 * @version $Id: brazilian_portuguese.php 442 2010-08-17 11:52:33Z divivo $
 * @link http://www.acajoom.com
 */

### General ###
 //jnewsletter Description
define('_ACA_DESC_CORE', compa::encodeutf('O jNews &eacute; uma ferramenta de listas de e-mail, newsletters, auto-respostas, e seguimento, para comunica&ccedil;&atilde;o eficaz com os seus usu&aacute;rios e clientes. ' .
		'jNews, O Seu Parceiro da Comunica&ccedil;&atilde;o!'));
define('_ACA_DESC_GPL', compa::encodeutf('O jNews &eacute; uma ferramenta de listas de e-mail, newsletters, auto-respostas, e seguimento, para comunica&ccedil;&atilde;o eficaz com os seus usu&aacute;rios e clientes. ' .
		'jNews, O Seu Parceiro da Comunica&ccedil;&atilde;o!'));
define('_ACA_FEATURES', compa::encodeutf('jNews, o seu parceiro de comunica&ccedil;&atilde;o!'));

// Type of lists
define('_ACA_NEWSLETTER', compa::encodeutf('Newsletter'));
define('_ACA_AUTORESP', compa::encodeutf('Auto-resposta'));
define('_ACA_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_ECARD', compa::encodeutf('Cartao Electronico'));
define('_ACA_POSTCARD', compa::encodeutf('Cart&atilde;o Postal'));
define('_ACA_PERF', compa::encodeutf('Performance'));
define('_ACA_COUPON', compa::encodeutf('Cupom'));
define('_ACA_CRON', compa::encodeutf('Tarefa Cron'));
define('_ACA_MAILING', compa::encodeutf('E-mail'));
define('_ACA_LIST', compa::encodeutf('Lista'));

 //jnewsletter Menu
define('_ACA_MENU_LIST', compa::encodeutf('Gerenciamento de Listas'));
define('_ACA_MENU_SUBSCRIBERS', compa::encodeutf('Assinantes'));
define('_ACA_MENU_NEWSLETTERS', compa::encodeutf('Newsletters'));
define('_ACA_MENU_AUTOS', compa::encodeutf('Auto-Respostas'));
define('_ACA_MENU_COUPONS', compa::encodeutf('Cupons'));
define('_ACA_MENU_CRONS', compa::encodeutf('Tarefas Cron'));
define('_ACA_MENU_AUTORSS', compa::encodeutf('Auto-RSS'));
define('_ACA_MENU_ECARD', compa::encodeutf('Cartoes Electronicos'));
define('_ACA_MENU_POSTCARDS', compa::encodeutf('Cart&otilde;es Postais'));
define('_ACA_MENU_PERFS', compa::encodeutf('Performances'));
define('_ACA_MENU_TAB_LIST', compa::encodeutf('Listas'));
define('_ACA_MENU_MAILING_TITLE', compa::encodeutf('E-mails'));
define('_ACA_MENU_MAILING', compa::encodeutf('E-mails para '));
define('_ACA_MENU_STATS', compa::encodeutf('Estat&iacute;sticas'));
define('_ACA_MENU_STATS_REPORTS', compa::encodeutf('Estat&iacute;sticas'));
define('_ACA_MENU_STATS_FOR', compa::encodeutf('Estat&iacute;sticas para '));
define('_ACA_MENU_CONF', compa::encodeutf('Configura&ccedil;&atilde;o'));
define('_ACA_MENU_UPDATE', compa::encodeutf('Importar'));
define('_ACA_MENU_ABOUT', compa::encodeutf('Sobre'));
define('_ACA_MENU_LEARN', compa::encodeutf('Centro de Educa&ccedil;&atilde;o'));
define('_ACA_MENU_MEDIA', compa::encodeutf('Gerenciamento de M&iacute;dia'));
define('_ACA_MENU_HELP', compa::encodeutf('Ajuda'));
define('_ACA_MENU_CPANEL', compa::encodeutf('Painel de Controle'));
define('_ACA_MENU_IMPORT', compa::encodeutf('Importar'));
define('_ACA_MENU_EXPORT', compa::encodeutf('Exportar'));
define('_ACA_MENU_SUB_ALL', compa::encodeutf('Assinar Tudo'));
define('_ACA_MENU_UNSUB_ALL', compa::encodeutf('N&atilde;o-Assinar Tudo'));
define('_ACA_MENU_VIEW_ARCHIVE', compa::encodeutf('Arquivo'));
define('_ACA_MENU_PREVIEW', compa::encodeutf('Pr&eacute;-visualizar'));
define('_ACA_MENU_SEND', compa::encodeutf('Enviar'));
define('_ACA_MENU_SEND_TEST', compa::encodeutf('Enviar E-mail de Teste'));
define('_ACA_MENU_SEND_QUEUE', compa::encodeutf('Fila de Processamento'));
define('_ACA_MENU_VIEW', compa::encodeutf('Ver'));
define('_ACA_MENU_COPY', compa::encodeutf('Copiar'));
define('_ACA_MENU_VIEW_STATS', compa::encodeutf('Ver Situa&ccedil;&atilde;o'));
define('_ACA_MENU_CRTL_PANEL', compa::encodeutf(' Painel de Controle'));
define('_ACA_MENU_LIST_NEW', compa::encodeutf(' Criar Lista'));
define('_ACA_MENU_LIST_EDIT', compa::encodeutf(' Editar Lista'));
define('_ACA_MENU_BACK', compa::encodeutf('Voltar'));
define('_ACA_MENU_INSTALL', compa::encodeutf('Instalar'));
define('_ACA_MENU_TAB_SUM', compa::encodeutf('Sum&aacute;rio'));
define('_ACA_STATUS', compa::encodeutf('Situa&ccedil;&atilde;o'));

// messages
define('_ACA_ERROR', compa::encodeutf(' Ocorreu um erro! '));
define('_ACA_SUB_ACCESS', compa::encodeutf('Direitos de Acesso'));
define('_ACA_DESC_CREDITS', compa::encodeutf('Cr&eacute;ditos'));
define('_ACA_DESC_INFO', compa::encodeutf('Informa&ccedil;&atilde;o'));
define('_ACA_DESC_HOME', compa::encodeutf('P&aacute;gina Oficial'));
define('_ACA_DESC_MAILING', compa::encodeutf('Lista de E-mail'));
define('_ACA_DESC_SUBSCRIBERS', compa::encodeutf('Assinantes'));
define('_ACA_PUBLISHED', compa::encodeutf('Publicado'));
define('_ACA_UNPUBLISHED', compa::encodeutf('N&atilde;o-Publicado'));
define('_ACA_DELETE', compa::encodeutf('Apagar'));
define('_ACA_FILTER', compa::encodeutf('Filtrar'));
define('_ACA_UPDATE', compa::encodeutf('Atualizar'));
define('_ACA_SAVE', compa::encodeutf('Salvar'));
define('_ACA_CANCEL', compa::encodeutf('Cancelar'));
define('_ACA_NAME', compa::encodeutf('Nome'));
define('_ACA_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_SELECT', compa::encodeutf('Selecionar'));
define('_ACA_ALL', compa::encodeutf('Todas as'));
define('_ACA_SEND_A', compa::encodeutf('Enviar a '));
define('_ACA_SUCCESS_DELETED', compa::encodeutf(' exclu&iacute;do com sucesso'));
define('_ACA_LIST_ADDED', compa::encodeutf('Lista criada com sucesso'));
define('_ACA_LIST_COPY', compa::encodeutf('Lista copiada com sucesso'));
define('_ACA_LIST_UPDATED', compa::encodeutf('Lista atualizada com sucesso'));
define('_ACA_MAILING_SAVED', compa::encodeutf('E-mail salvo com sucesso.'));
define('_ACA_UPDATED_SUCCESSFULLY', compa::encodeutf('atualizado com sucesso.'));

### Subscribers information ###
//subscribe and unsubscribe info
define('_ACA_IP', compa::encodeutf('IP')); 
define('_ACA_SUB_INFO', compa::encodeutf('Informa&ccedil;&atilde;o do Assinante'));
define('_ACA_VERIFY_INFO', compa::encodeutf('Por favor verifique o link enviado, falta alguma informa&ccedil;&atilde;o.'));
define('_ACA_INPUT_NAME', compa::encodeutf('Nome'));
define('_ACA_INPUT_EMAIL', compa::encodeutf('E-mail'));
define('_ACA_RECEIVE_HTML', compa::encodeutf('Receber em HTML?'));
define('_ACA_TIME_ZONE', compa::encodeutf('Zona de Fuso Hor&aacute;rio'));
define('_ACA_BLACK_LIST', compa::encodeutf('Lista Negra'));
define('_ACA_REGISTRATION_DATE', compa::encodeutf('Data de registro do usu&aacute;rio'));
define('_ACA_USER_ID', compa::encodeutf('ID do Usu&aacute;rio'));
define('_ACA_DESCRIPTION', compa::encodeutf('Descri&ccedil;&atilde;o'));
define('_ACA_ACCOUNT_CONFIRMED', compa::encodeutf('A sua conta foi ativada.'));
define('_ACA_SUB_SUBSCRIBER', compa::encodeutf('Assinante'));
define('_ACA_SUB_PUBLISHER', compa::encodeutf('Editor'));
define('_ACA_SUB_ADMIN', compa::encodeutf('Administrador'));
define('_ACA_REGISTERED', compa::encodeutf('Registrado'));
define('_ACA_SUBSCRIPTIONS', compa::encodeutf('Assinaturas'));
define('_ACA_SEND_UNSUBCRIBE', compa::encodeutf('Enviar mensagem de Cancelamento de assinatura'));
define('_ACA_SEND_UNSUBCRIBE_TIPS', compa::encodeutf('Clique SIM para enviar um e-mail de confirma&ccedil;&atilde;o para cancelamento de assinatura.'));
define('_ACA_SUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Por favor confirme a sua assinatura'));
define('_ACA_UNSUBSCRIBE_SUBJECT_MESS', compa::encodeutf('Confirma&ccedil;&atilde;o de Cancelamento de Assinatura'));
define('_ACA_DEFAULT_SUBSCRIBE_MESS', compa::encodeutf('Ol&aacute; [NAME],<br />' .
		'Apenas mais um passo e assinar&aacute;s a lista.  Por favor clique no link seguinte para confirmar a sua assinatura.' .
		'<br /><br />[CONFIRM]<br /><br />Para quest&otilde;es &eacute; favor contatar o Webmaster.'));
define('_ACA_DEFAULT_UNSUBSCRIBE_MESS', compa::encodeutf('Este &eacute; um e-mail de confirma&ccedil;&atilde;o de que você foi removido da nossa lista.  Lamentamos que tenha decidido cancelar a sua assinatura, caso queira voltar a assinar, pode sempre fazê-lo no nosso site.  Caso tenha alguma quest&atilde;o por favor contate o nosso Webmaster.'));

// jNews subscribers
define('_ACA_SIGNUP_DATE', compa::encodeutf('Data de Assinatura'));
define('_ACA_CONFIRMED', compa::encodeutf('Confirmado'));
define('_ACA_SUBSCRIB', compa::encodeutf('Assinar'));
define('_ACA_HTML', compa::encodeutf('E-mails em HTML'));
define('_ACA_RESULTS', compa::encodeutf('Resultados'));
define('_ACA_SEL_LIST', compa::encodeutf('Selecione uma Lista'));
define('_ACA_SEL_LIST_TYPE', compa::encodeutf('- Selecione tipo de Lista -'));
define('_ACA_SUSCRIB_LIST', compa::encodeutf('Lista Total de Assinantes'));
define('_ACA_SUSCRIB_LIST_UNIQUE', compa::encodeutf('assinantes para: '));
define('_ACA_NO_SUSCRIBERS', compa::encodeutf('Nenhum assinante encontrado para estas listas.'));
define('_ACA_COMFIRM_SUBSCRIPTION', compa::encodeutf('Foi enviado um e-mail de confirma&ccedil;&atilde;o para você.  Por favor verifique o seu e-mail e clique no link informado.<br />' .
		'O seu e-mail necessita de ser confirmado para que a sua assinatura possa ter efeito.'));
define('_ACA_SUCCESS_ADD_LIST', compa::encodeutf('Você foi adicionado à lista com sucesso.'));


 // Subcription info
define('_ACA_CONFIRM_LINK', compa::encodeutf('Clique aqui para confirmar a sua assinatura'));
define('_ACA_UNSUBSCRIBE_LINK', compa::encodeutf('Clique aqui para sair da lista'));
define('_ACA_UNSUBSCRIBE_MESS', compa::encodeutf('O seu e-mail foi removido da lista'));

define('_ACA_QUEUE_SENT_SUCCESS', compa::encodeutf('Todos os e-mails agendados foram enviados com sucesso.'));
define('_ACA_MALING_VIEW', compa::encodeutf('Ver todos os e-mails'));
define('_ACA_UNSUBSCRIBE_MESSAGE', compa::encodeutf('Tem a certeza que quer sair da lista?'));
define('_ACA_MOD_SUBSCRIBE', compa::encodeutf('Assinar'));
define('_ACA_SUBSCRIBE', compa::encodeutf('Assinar'));
define('_ACA_UNSUBSCRIBE', compa::encodeutf('Cancelar'));
define('_ACA_VIEW_ARCHIVE', compa::encodeutf('Ver arquivo'));
define('_ACA_SUBSCRIPTION_OR', compa::encodeutf(' ou clique aqui para atualizar a sua informa&ccedil;&atilde;o'));
define('_ACA_EMAIL_ALREADY_REGISTERED', compa::encodeutf('Este endere&ccedil;o de e-mail j&aacute; se encontra registrado.'));
define('_ACA_SUBSCRIBER_DELETED', compa::encodeutf('Assinante exclu&iacute;do com sucesso.'));


### UserPanel ###
 //User Menu
define('_UCP_USER_PANEL', compa::encodeutf('Painel de Controle do Usu&aacute;rio'));
define('_UCP_USER_MENU', compa::encodeutf('Menu do Usu&aacute;rio'));
define('_UCP_USER_CONTACT', compa::encodeutf('As minhas assinaturas'));
 //jNews Cron Menu
define('_UCP_CRON_MENU', compa::encodeutf('Gerenciamento de tarefa Cron'));
define('_UCP_CRON_NEW_MENU', compa::encodeutf('Novo Cron'));
define('_UCP_CRON_LIST_MENU', compa::encodeutf('Listar o meu Cron'));
 //jNews Coupon Menu
define('_UCP_COUPON_MENU', compa::encodeutf('Gerenciamento de Cupons'));
define('_UCP_COUPON_LIST_MENU', compa::encodeutf('Lista de Cupons'));
define('_UCP_COUPON_ADD_MENU', compa::encodeutf('Adicionar um Cupom'));

### lists ###
// Tabs
define('_ACA_LIST_T_GENERAL', compa::encodeutf('Descri&ccedil;&atilde;o'));
define('_ACA_LIST_T_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_LIST_T_SUBSCRIPTION', compa::encodeutf('Assinatura'));
define('_ACA_LIST_T_SENDER', compa::encodeutf('Informa&ccedil;&atilde;o do Remetente'));

define('_ACA_LIST_TYPE', compa::encodeutf('Tipo de Lista'));
define('_ACA_LIST_NAME', compa::encodeutf('Nome da Lista'));
define('_ACA_LIST_ISSUE', compa::encodeutf('Edi&ccedil;&atilde;o Nº'));
define('_ACA_LIST_DATE', compa::encodeutf('Data de Envio'));
define('_ACA_LIST_SUB', compa::encodeutf('Assunto do E-mail'));
define('_ACA_ATTACHED_FILES', compa::encodeutf('Arquivos Anexados'));
define('_ACA_SELECT_LIST', compa::encodeutf('Por favor selecione uma lista para editar!'));

// Auto Responder box
define('_ACA_AUTORESP_ON', compa::encodeutf('Tipo de Lista'));
define('_ACA_AUTO_RESP_OPTION', compa::encodeutf('Op&ccedil;&otilde;es de Auto-resposta'));
define('_ACA_AUTO_RESP_FREQ', compa::encodeutf('Assinantes podem escolher frequência'));
define('_ACA_AUTO_DELAY', compa::encodeutf('Atraso (em dias)'));
define('_ACA_AUTO_DAY_MIN', compa::encodeutf('Frequência M&iacute;nima'));
define('_ACA_AUTO_DAY_MAX', compa::encodeutf('Frequência M&aacute;xima'));
define('_ACA_FOLLOW_UP', compa::encodeutf('Especificar seguimento de auto-resposta'));
define('_ACA_AUTO_RESP_TIME', compa::encodeutf('Assinantes podem escolher hora'));
define('_ACA_LIST_SENDER', compa::encodeutf('Remetente da Lista'));

define('_ACA_LIST_DESC', compa::encodeutf('Descri&ccedil;&atilde;o da Lista'));
define('_ACA_LAYOUT', compa::encodeutf('Layout'));
define('_ACA_SENDER_NAME', compa::encodeutf('Nome do Remetente'));
define('_ACA_SENDER_EMAIL', compa::encodeutf('E-mail do Remetente'));
define('_ACA_SENDER_BOUNCE', compa::encodeutf('Endere&ccedil;o Padr&atilde;o do Remetente'));
define('_ACA_LIST_DELAY', compa::encodeutf('Atraso'));
define('_ACA_HTML_MAILING', compa::encodeutf('E-mail em HTML?'));
define('_ACA_HTML_MAILING_DESC', compa::encodeutf('(se modificar isto, você ter&aacute; de salvar e retornar a esta tela para visualizar as mudan&ccedil;as.)'));
define('_ACA_HIDE_FROM_FRONTEND', compa::encodeutf('Esconder do Site-Principal?'));
define('_ACA_SELECT_IMPORT_FILE', compa::encodeutf('Selecione um arquivo para importa&ccedil;&atilde;o'));;
define('_ACA_IMPORT_FINISHED', compa::encodeutf('Importa&ccedil;&atilde;o terminada'));
define('_ACA_DELETION_OFFILE', compa::encodeutf('Elimina&ccedil;&atilde;o do arquivo'));
define('_ACA_MANUALLY_DELETE', compa::encodeutf('falhou, dever&aacute; excluir o arquivo manualmente'));
define('_ACA_CANNOT_WRITE_DIR', compa::encodeutf('N&atilde;o &eacute; poss&iacute;vel escrever na pasta'));
define('_ACA_NOT_PUBLISHED', compa::encodeutf('N&atilde;o foi poss&iacute;vel enviar o e-mail, a Lista n&atilde;o est&aacute; publicada.'));

//  List info box
define('_ACA_INFO_LIST_PUB', compa::encodeutf('Clique em SIM para publicar a Lista'));
define('_ACA_INFO_LIST_NAME', compa::encodeutf('Introduza o nome da sua Lista aqui. Poder&aacute; identificar a Lista com este nome.'));
define('_ACA_INFO_LIST_DESC', compa::encodeutf('Introduza uma breve descri&ccedil;&atilde;o da sua Lista aqui. Esta descri&ccedil;&atilde;o ser&aacute; vis&iacute;vel aos visitantes no seu site.'));
define('_ACA_INFO_LIST_SENDER_NAME', compa::encodeutf('Introduza o nome do Remetente do e-mail. Este nome ser&aacute; vis&iacute;vel quando os assinantes receberem mensagens desta lista.'));
define('_ACA_INFO_LIST_SENDER_EMAIL', compa::encodeutf('Introduza o endere&ccedil;o de e-mail de onde as mensagens ser&atilde;o enviadas.'));
define('_ACA_INFO_LIST_SENDER_BOUNCED', compa::encodeutf('Introduza o endere&ccedil;o de e-mail para onde os usu&aacute;rios poder&atilde;o responder. &eacute; altamente recomendado que seja igual ao do remetente, visto que existem filtros de SPAM que poder&atilde;o atribuir uma probabilidade de SPAM elevada se forem diferentes.'));
define('_ACA_INFO_LIST_AUTORESP', compa::encodeutf('Escolha o tipo de e-mails para esta Lista. <br />' .
		'Newsletter: newsletter normal<br />' .
		'Auto-resposta: uma Auto-resposta &eacute; uma Lista que &eacute; enviada automaticamente atrav&eacute;s da p&aacute;gina web em intervalos regulares.'));
define('_ACA_INFO_LIST_FREQUENCY', compa::encodeutf('Permitir aos usu&aacute;rios escolher quantas vezes recebem a Lista.  Atribui mais flexibilidade ao usu&aacute;rio.'));
define('_ACA_INFO_LIST_TIME', compa::encodeutf('Deixar que o usu&aacute;rio escolha a hora preferida do dia para receber a Lista.'));
define('_ACA_INFO_LIST_MIN_DAY', compa::encodeutf('Definir qual &eacute; a frequência m&iacute;nima que o usu&aacute;rio pode escolher para receber a lista'));
define('_ACA_INFO_LIST_DELAY', compa::encodeutf('Especificar qual o atraso entre esta auto-resposta e a anterior.'));
define('_ACA_INFO_LIST_DATE', compa::encodeutf('Especificar a data para publica&ccedil;&atilde;o da lista de not&iacute;cias, caso queira atrasar a publica&ccedil;&atilde;o. <br /> FORMATO : AAAA-MM-DD HH:MM:SS'));
define('_ACA_INFO_LIST_MAX_DAY', compa::encodeutf('Definir qual &eacute; a frequência m&aacute;xima que o usu&aacute;rio pode escolher para receber a lista'));
define('_ACA_INFO_LIST_LAYOUT', compa::encodeutf('Introduza o layout da sua lista de e-mail aqui. Pode introduzir qualquer layou para o seu e-mail aqui.'));
define('_ACA_INFO_LIST_SUB_MESS', compa::encodeutf('Esta mensagem ser&aacute; enviada ao assinante quando ele ou ela se registam pela primeira vez. Pode definir aqui qualquer texto que goste.'));
define('_ACA_INFO_LIST_UNSUB_MESS', compa::encodeutf('Esta mensagem ser&aacute; enviada ao assinante quando ele ou ela cancelarem a subscri&ccedil;&atilde;o. Pode inserir aqui qualquer mensagem.'));
define('_ACA_INFO_LIST_HTML', compa::encodeutf('Selecione a checkbox se desejar enviar e-mail em HTML. Os assinantes poder&atilde;o especificar se preferem receber mensagens em HTML, ou mensagens de apenas texto aquando da subscri&ccedil;&atilde;o de uma lista HTML.'));
define('_ACA_INFO_LIST_HIDDEN', compa::encodeutf('Clique SIM para esconder a lista do site-principal, os usu&aacute;rios n&atilde;o poder&atilde;o subscrever mas você poder&aacute; mesmo assim enviar e-mails.'));
define('_ACA_INFO_LIST_ACA_AUTO_SUB', compa::encodeutf('Deseja subscri&ccedil;&atilde;o autom&aacute;tica dos usu&aacute;rios para esta lista?<br /><B>Novos Usu&aacute;rios:</B> registar&aacute; cada novo usu&aacute;rio que se registe no site.<br /><B>Todos os Usu&aacute;rios:</B> registar&aacute; cada usu&aacute;rio registado na base de dados.<br />(todas aquelas op&ccedil;&otilde;es suportam Community Builder)'));
define('_ACA_INFO_LIST_ACC_LEVEL', compa::encodeutf('Selecione o n&iacute;vel de acesso do site-principal. Isto mostrar&aacute; ou esconder&aacute; o e-mail para os grupos de usu&aacute;rios que n&atilde;o têm acesso a ele, para que n&atilde;o sejam capazes do o subscrever.'));
define('_ACA_INFO_LIST_ACC_USER_ID', compa::encodeutf('Selecione o n&iacute;vel de acesso do grupo de usu&aacute;rios a quem permite edi&ccedil;&atilde;o. Esse grupo de usu&aacute;rios e superiores ser&atilde;o capazes de editar o e-mail e envi&aacute;-lo, quer do site-principal quer do site de administra&ccedil;&atilde;o.'));
define('_ACA_INFO_LIST_FOLLOW_UP', compa::encodeutf('Se quiser que a auto-resposta mova-se para outra assim que atingir a última mensagem, pode especificar aqui a auto-resposta seguinte.'));
define('_ACA_INFO_LIST_ACA_OWNER', compa::encodeutf('Esta &eacute; a ID da pessoa que criou a lista.'));
define('_ACA_INFO_LIST_WARNING', compa::encodeutf('   Esta última op&ccedil;&atilde;o apenas est&aacute; dispon&iacute;vel uma vez aquando da cria&ccedil;&atilde;o da lista.'));
define('_ACA_INFO_LIST_SUBJET', compa::encodeutf(' Assunto do e-mail.  Este &eacute; o assunto do e-mail que o assinante receber&aacute;.'));
define('_ACA_INFO_MAILING_CONTENT', compa::encodeutf('Este &eacute; o corpo do e-mail que você quer enviar.'));
define('_ACA_INFO_MAILING_NOHTML', compa::encodeutf('Introduza o corpo do e-mail que você quer enviar para os assinantes que escolheram receber apenas e-mails N&atilde;O-HTML. <BR/> NOTA: se deixar em branco o jNews converter&aacute; automaticamente o texto HTML para apenas texto.'));
define('_ACA_INFO_MAILING_VISIBLE', compa::encodeutf('Clique SIM para mostrar e-mail no site-principal.'));
define('_ACA_INSERT_CONTENT', compa::encodeutf('Insira o conteúdo existente'));

// Coupons
define('_ACA_SEND_COUPON_SUCCESS', compa::encodeutf('Cupom enviado com sucesso!'));
define('_ACA_CHOOSE_COUPON', compa::encodeutf('Escolha um cupom'));
define('_ACA_TO_USER', compa::encodeutf(' para este usu&aacute;rio'));

### Cron options
//drop down frequency(CRON)
define('_ACA_FREQ_CH1', compa::encodeutf('Cada hora'));
define('_ACA_FREQ_CH2', compa::encodeutf('Cada 6 horas'));
define('_ACA_FREQ_CH3', compa::encodeutf('Cada 12 horas'));
define('_ACA_FREQ_CH4', compa::encodeutf('Diariamente'));
define('_ACA_FREQ_CH5', compa::encodeutf('Semanalmente'));
define('_ACA_FREQ_CH6', compa::encodeutf('Mensalmente'));
define('_ACA_FREQ_NONE', compa::encodeutf('N&atilde;o'));
define('_ACA_FREQ_NEW', compa::encodeutf('Novos usu&aacute;rios'));
define('_ACA_FREQ_ALL', compa::encodeutf('Todos os usu&aacute;rios'));

//Label CRON form
define('_ACA_LABEL_FREQ', compa::encodeutf('Cron jNews?'));
define('_ACA_LABEL_FREQ_TIPS', compa::encodeutf('Clique em SIM se quiser utilizar isto para uma Cron jNews, N&atilde;O para qualquer outra tarefa Cron.<br />' .
		'Se clicar em SIM n&atilde;o necessita de especificar o endere&ccedil;o do Cron, este ser&aacute; automaticamente adicionado.'));
define('_ACA_SITE_URL', compa::encodeutf('O endere&ccedil;o URL do seu site'));
define('_ACA_CRON_FREQUENCY', compa::encodeutf('Frequência do Cron'));
define('_ACA_STARTDATE_FREQ', compa::encodeutf('Data de Come&ccedil;o'));
define('_ACA_LABELDATE_FREQ', compa::encodeutf('Especifique Data'));
define('_ACA_LABELTIME_FREQ', compa::encodeutf('Especifique Hora'));
define('_ACA_CRON_URL', compa::encodeutf('URL do Cron'));
define('_ACA_CRON_FREQ', compa::encodeutf('Frequência'));
define('_ACA_TITLE_CRONLIST', compa::encodeutf('Lista Cron'));
define('_NEW_LIST', compa::encodeutf('Criar uma nova lista'));

//title CRON form
define('_ACA_TITLE_FREQ', compa::encodeutf('Editar Cron'));
define('_ACA_CRON_SITE_URL', compa::encodeutf('Por favor introduza um endere&ccedil;o URL v&aacute;lido, come&ccedil;ado por http://'));

### Mailings ###
define('_ACA_MAILING_ALL', compa::encodeutf('Todos os e-mails'));
define('_ACA_EDIT_A', compa::encodeutf('Editar um '));
define('_ACA_SELCT_MAILING', compa::encodeutf('Por favor selecione a Lista na caixa de possibilidades com vista a adicionar um novo e-mail.'));
define('_ACA_VISIBLE_FRONT', compa::encodeutf('Vis&iacute;vel no site-principal'));

// mailer
define('_ACA_SUBJECT', compa::encodeutf('Assunto'));
define('_ACA_CONTENT', compa::encodeutf('Conteúdo'));
define('_ACA_NAMEREP', compa::encodeutf('[NAME] = Isto ser&aacute; substitu&iacute;do pelo nome que o assinante introduziu, você estar&aacute; a enviar e-mails personalizados ao usar isto.<br />'));
define('_ACA_FIRST_NAME_REP', compa::encodeutf('[FIRSTNAME] = Isto ser&aacute; substitu&iacute;do pelo PRIMEIRO nome que o assinante introduziu.<br />'));
define('_ACA_NONHTML', compa::encodeutf('Vers&atilde;o N&atilde;o-html'));
define('_ACA_ATTACHMENTS', compa::encodeutf('Anexos'));
define('_ACA_SELECT_MULTIPLE', compa::encodeutf('Carregue na tecla CONTROL (ou COMANDO) para selecionar múltiplos anexos.<br />' .
		'Os arquivos apresentados nesta lista de anexos est&atilde;o localizados na directoria de anexos, pode alterar esta localiza&ccedil;&atilde;o no painel de controlo em Configura&ccedil;&atilde;o.'));
define('_ACA_CONTENT_ITEM', compa::encodeutf('Item do Conteúdo'));
define('_ACA_SENDING_EMAIL', compa::encodeutf('A enviar e-mail'));
define('_ACA_MESSAGE_NOT', compa::encodeutf('A Mensagem n&atilde;o pode ser enviada'));
define('_ACA_MAILER_ERROR', compa::encodeutf('Erro no Mailer'));
define('_ACA_MESSAGE_SENT_SUCCESSFULLY', compa::encodeutf('Mensagem enviada com sucesso'));
define('_ACA_SENDING_TOOK', compa::encodeutf('O envio deste e-mail foi de'));
define('_ACA_SECONDS', compa::encodeutf('segundos'));
define('_ACA_NO_ADDRESS_ENTERED', compa::encodeutf('Nenhum assinante ou endere&ccedil;o de e-mail fornecido'));
define('_ACA_CHANGE_SUBSCRIPTIONS', compa::encodeutf('Modificar'));
define('_ACA_CHANGE_EMAIL_SUBSCRIPTION', compa::encodeutf('Modificar a sua subscri&ccedil;&atilde;o'));
define('_ACA_WHICH_EMAIL_TEST', compa::encodeutf('Indique o endere&ccedil;o de e-mail para enviar um teste ou selecione pr&eacute;-visualizar'));
define('_ACA_SEND_IN_HTML', compa::encodeutf('Enviar em HTML (para e-mails html)?'));
define('_ACA_VISIBLE', compa::encodeutf('Vis&iacute;vel'));
define('_ACA_INTRO_ONLY', compa::encodeutf('Apenas Introdu&ccedil;&atilde;o'));

// stats
define('_ACA_GLOBALSTATS', compa::encodeutf('Estat&iacute;sticas Globais'));
define('_ACA_DETAILED_STATS', compa::encodeutf('Estat&iacute;sticas Detalhadas'));
define('_ACA_MAILING_LIST_DETAILS', compa::encodeutf('Detalhes de Listas'));
define('_ACA_SEND_IN_HTML_FORMAT', compa::encodeutf('Envio em formato HTML'));
define('_ACA_VIEWS_FROM_HTML', compa::encodeutf('Vistos (de e-mails em html)'));
define('_ACA_SEND_IN_TEXT_FORMAT', compa::encodeutf('Envio em formtato Texto'));
define('_ACA_HTML_READ', compa::encodeutf('Lidos HTML'));
define('_ACA_HTML_UNREAD', compa::encodeutf('N&atilde;o-Lidos HTML'));
define('_ACA_TEXT_ONLY_SENT', compa::encodeutf('Apenas Texto'));

// Configuration panel
// main tabs
define('_ACA_MAIL_CONFIG', compa::encodeutf('Mail'));
define('_ACA_LOGGING_CONFIG', compa::encodeutf('Hist. & Estat.'));
define('_ACA_SUBSCRIBER_CONFIG', compa::encodeutf('Assinantes'));
define('_ACA_AUTO_CONFIG', compa::encodeutf('Cron'));
define('_ACA_MISC_CONFIG', compa::encodeutf('Miscelânea'));
define('_ACA_MAIL_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Mail'));
define('_ACA_MAILINGS_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de E-mails'));
define('_ACA_SUBCRIBERS_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Assinantes'));
define('_ACA_CRON_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Cron'));
define('_ACA_SENDING_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Envio'));
define('_ACA_STATS_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Estat&iacute;sticas'));
define('_ACA_LOGS_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Hist&oacute;ricos'));
define('_ACA_MISC_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Miscelânea'));
// mail settings
define('_ACA_SEND_MAIL_FROM', compa::encodeutf('Email do remetente'));
define('_ACA_SEND_MAIL_NAME', compa::encodeutf('Nome do remetente'));
define('_ACA_MAILSENDMETHOD', compa::encodeutf('M&eacute;todo do Mailer'));
define('_ACA_SENDMAILPATH', compa::encodeutf('Caminho do Sendmail'));
define('_ACA_SMTPHOST', compa::encodeutf('SMTP host'));
define('_ACA_SMTPAUTHREQUIRED', compa::encodeutf('Requer Autentica&ccedil;&atilde;o SMTP'));
define('_ACA_SMTPAUTHREQUIRED_TIPS', compa::encodeutf('Selecione SIM se o seu servidor SMTP requer autentica&ccedil;&atilde;o'));
define('_ACA_SMTPUSERNAME', compa::encodeutf('Nome da conta SMTP'));
define('_ACA_SMTPUSERNAME_TIPS', compa::encodeutf('Introduza o nome da conta para o SMTP quando o seu servidor SMTP requerer autentica&ccedil;&atilde;o'));
define('_ACA_SMTPPASSWORD', compa::encodeutf('palavra-passe SMTP'));
define('_ACA_SMTPPASSWORD_TIPS', compa::encodeutf('Introduza a palavra-passe para o SMTP quando o seu servidor SMTP requerer autentica&ccedil;&atilde;o'));
define('_ACA_USE_EMBEDDED', compa::encodeutf('Usar imagens embebidas'));
define('_ACA_USE_EMBEDDED_TIPS', compa::encodeutf('Selecione SIM se as imagens dos items de conteúdo anexo dever&atilde;o ser embebidas no e-mail para mensagens em html, ou N&atilde;O para usar as tags de imagem por defeito que fazem link para as imagens no site.'));
define('_ACA_UPLOAD_PATH', compa::encodeutf('Caminho de Envio/Anexos'));
define('_ACA_UPLOAD_PATH_TIPS', compa::encodeutf('Pode especificar uma directoria para envio.<br />' .
		'Certifique-se que a directoria que especificar existe, caso contr&aacute;rio crie-a.'));

// subscribers settings
define('_ACA_ALLOW_UNREG', compa::encodeutf('Permitir n&atilde;o-registados'));
define('_ACA_ALLOW_UNREG_TIPS', compa::encodeutf('Selecione SIM se quiser permitir usu&aacute;rios assinarem listas sem estarem registados no site.'));
define('_ACA_REQ_CONFIRM', compa::encodeutf('Requerer Confirma&ccedil;&atilde;o'));
define('_ACA_REQ_CONFIRM_TIPS', compa::encodeutf('Selecione SIM se quiser obrigar os usu&aacute;rios assinantes n&atilde;o-registados a confirmar o seu endere&ccedil;o de e-mail.'));
define('_ACA_SUB_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de Subscri&ccedil;&atilde;o'));
define('_ACA_SUBMESSAGE', compa::encodeutf('Email de Subscri&ccedil;&atilde;o'));
define('_ACA_SUBSCRIBE_LIST', compa::encodeutf('Assinar uma lista'));

define('_ACA_USABLE_TAGS', compa::encodeutf('Tags utiliz&aacute;veis'));
define('_ACA_NAME_AND_CONFIRM', compa::encodeutf('<b>[CONFIRM]</b> = Isto cria um link clic&aacute;vel onde o assinante pode confirmar a sua subscri&ccedil;&atilde;o. Isto &eacute; <strong>obrigat&oacute;rio</strong> para que o jNews funcione correctamente.<br />'
.'<br />[NAME] = Isto ser&aacute; substitu&iacute;do pelo nome que o assinante introduziu, estar&aacute; a enviar e-mails personalizados ao usar isto.<br />'
.'<br />[FIRSTNAME] = Isto ser&aacute; substitu&iacute;do pelo PRIMEIRO nome do assinante, o primeiro nome &eacute; DEFINIDO pelo primeiro nome introduzido pelo assinante.<br />'));
define('_ACA_CONFIRMFROMNAME', compa::encodeutf('Confirmar o nome do Remetente'));
define('_ACA_CONFIRMFROMNAME_TIPS', compa::encodeutf('Introduza o nome do remetente a mostrar na confirma&ccedil;&atilde;o das listas.'));
define('_ACA_CONFIRMFROMEMAIL', compa::encodeutf('Confirmar o e-mail do remetente'));
define('_ACA_CONFIRMFROMEMAIL_TIPS', compa::encodeutf('Introduza o endere&ccedil;o de e-mail do remetente a mostrar na confirma&ccedil;&atilde;o das listas.'));
define('_ACA_CONFIRMBOUNCE', compa::encodeutf('Endere&ccedil;o de Bounce'));
define('_ACA_CONFIRMBOUNCE_TIPS', compa::encodeutf('Introduza o endere&ccedil;o padr&atilde;o do remetente a mostrar na confirma&ccedil;&atilde;o das listas.'));
define('_ACA_HTML_CONFIRM', compa::encodeutf('Confirmar HTML'));
define('_ACA_HTML_CONFIRM_TIPS', compa::encodeutf('Selecione SIM se as listas de confirma&ccedil;&atilde;o devem ser em HTML se o usu&aacute;rio permitir HTML.'));
define('_ACA_TIME_ZONE_ASK', compa::encodeutf('Perguntar Zona de Fuso Hor&aacute;rio'));
define('_ACA_TIME_ZONE_TIPS', compa::encodeutf('Selecione SIM se quiser perguntar ao usu&aacute;rio qual a sua zona de fuso hor&aacute;rio. Quando aplic&aacute;vel, os e-mails em espera ser&atilde;o enviados baseados na zona de fuso hor&aacute;rio'));

 // Cron Set up
define('_ACA_TIME_OFFSET_URL', compa::encodeutf('clique aqui para definir a zona de fuso hor&aacute;rio no painel de configura&ccedil;&atilde;o global do Joomla -> Separador Locale'));
define('_ACA_TIME_OFFSET_TIPS', compa::encodeutf('Defina a zona de fuso hor&aacute;rio do seu servidor para que a data e hora guardadas sejam exactas'));
define('_ACA_TIME_OFFSET', compa::encodeutf('Fuso Hor&aacute;rio'));
define('_ACA_CRON_TITLE', compa::encodeutf('Definir uma fun&ccedil;&atilde;o Con'));
define('_ACA_CRON_DESC', compa::encodeutf('<br />Usar a fun&ccedil;&atilde;o Cron automatiza tarefas para o seu site Joomla!<br />' .
		'Para a accionar precisa de adicionar no painel de controlo (separador cron)o seguinte comando:<br />' .
		'<b>' . ACA_JPATH_LIVE . '/index.php?option=com_jnewsletter&act=cron</b> ' .
		'<br /><br />Se precisar de ajuda para parametrizar ou tiver problemas por favor consulte o nosso f&oacute;rum <a href="http://www.acajoom.com" target="_blank">http://www.acajoom.com</a>'));
// sending settings
define('_ACA_PAUSEX', compa::encodeutf('Pausa x segundos por cada quantidade de e-mails configurada'));
define('_ACA_PAUSEX_TIPS', compa::encodeutf('Introduza o número de segundos que o jNews dar&aacute; ao servidor de SMTP para enviar as mensagens antes de proceder a novo envio do grupo seguinte de mensagens.'));
define('_ACA_EMAIL_BET_PAUSE', compa::encodeutf('Emails entre pausas'));
define('_ACA_EMAIL_BET_PAUSE_TIPS', compa::encodeutf('Número de e-mails a enviar antes de fazer pausa.'));
define('_ACA_WAIT_USER_PAUSE', compa::encodeutf('Esperar por a&ccedil;&atilde;o do usu&aacute;rio numa pausa'));
define('_ACA_WAIT_USER_PAUSE_TIPS', compa::encodeutf('Caso o script deva esperar por a&ccedil;&atilde;o do usu&aacute;rio quando pausado entre conjuntos de e-mails.'));
define('_ACA_SCRIPT_TIMEOUT', compa::encodeutf('Tempo de intervalo do Script'));
define('_ACA_SCRIPT_TIMEOUT_TIPS', compa::encodeutf('Número de minutos que o script dever&aacute; ter para correr (0 para ilimitados).'));
// Stats settings
define('_ACA_ENABLE_READ_STATS', compa::encodeutf('Activar leitura de estat&iacute;sticas'));
define('_ACA_ENABLE_READ_STATS_TIPS', compa::encodeutf('Selecione SIM se quiser guardar no hist&oacute;rico o número de visualiza&ccedil;&otilde;es. Esta t&eacute;cnica s&oacute; pode ser usada com e-mails em html'));
define('_ACA_LOG_VIEWSPERSUB', compa::encodeutf('Guardar hist&oacute;rico de visualiza&ccedil;&otilde;es por assinante'));
define('_ACA_LOG_VIEWSPERSUB_TIPS', compa::encodeutf('Selecione SIM se quiser guardar no hist&oacute;rico o número de visualiza&ccedil;&otilde;es por assinante. Esta t&eacute;cnica s&oacute; pode ser usada com e-mails em html'));
// Logs settings
define('_ACA_DETAILED', compa::encodeutf('Hist&oacute;ricos detalhados'));
define('_ACA_SIMPLE', compa::encodeutf('Hist&oacute;ricos simplificados'));
define('_ACA_DIAPLAY_LOG', compa::encodeutf('Mostrar hist&oacute;ricos'));
define('_ACA_DISPLAY_LOG_TIPS', compa::encodeutf('Selecione SIM se quiser mostrar os hist&oacute;ricos enquanto envia e-mails.'));
define('_ACA_SEND_PERF_DATA', compa::encodeutf('Envio de performance para fora'));
define('_ACA_SEND_PERF_DATA_TIPS', compa::encodeutf('Selecione SIM se quiser permitir ao jNews enviar relat&oacute;rios ANÔNIMOS sobre a sua configura&ccedil;&atilde;o, número de assinantes de uma lista e o tempo que levou e enviar o e-mail. Isto d&aacute;-nos uma ideia acerca da performance do jNews e AJUDA-NOS a melhorar o jNews em futuros desenvolvimentos.'));
define('_ACA_SEND_AUTO_LOG', compa::encodeutf('Hist&oacute;rico de envio para o Auto-resposta'));
define('_ACA_SEND_AUTO_LOG_TIPS', compa::encodeutf('Selecione SIM se quiser enviar um e-mail com hist&oacute;rico cada vez que a fila for processada.  AVISO: isto pode resultar numa grande quantidade de e-mails.'));
define('_ACA_SEND_LOG', compa::encodeutf('Hist&oacute;rico de envio'));
define('_ACA_SEND_LOG_TIPS', compa::encodeutf('Caso deva ser enviado um e-mail com o hist&oacute;rico do e-mail para o endere&ccedil;o de e-mail do usu&aacute;rio que enviou o e-mail.'));
define('_ACA_SEND_LOGDETAIL', compa::encodeutf('Detalhe do hist&oacute;rico de envio'));
define('_ACA_SEND_LOGDETAIL_TIPS', compa::encodeutf('DETALHADO inclúe a informa&ccedil;&atilde;o de sucesso ou falha para cada assinante e um resumo geral da informa&ccedil;&atilde;o. SIMPLES apenas envia o resumo geral.'));
define('_ACA_SEND_LOGCLOSED', compa::encodeutf('Enviar hist&oacute;rico se a conex&atilde;o for fechada'));
define('_ACA_SEND_LOGCLOSED_TIPS', compa::encodeutf('Com esta op&ccedil;&atilde;o ativada o usu&aacute;rio que enviou o e-mail receber&aacute; na mesma o relat&oacute;rio por e-mail.'));
define('_ACA_SAVE_LOG', compa::encodeutf('Salvar Hist&oacute;rico'));
define('_ACA_SAVE_LOG_TIPS', compa::encodeutf('Caso o hist&oacute;rico do e-mail deva ser anexado ao arquivo do hist&oacute;rico.'));
define('_ACA_SAVE_LOGDETAIL', compa::encodeutf('Guardar hist&oacute;rico detalhado'));
define('_ACA_SAVE_LOGDETAIL_TIPS', compa::encodeutf('DETALHADO inclúe a informa&ccedil;&atilde;o de sucesso ou falha para cada assinante e um resumo geral da informa&ccedil;&atilde;o. SIMPLES apenas envia o resumo geral.'));
define('_ACA_SAVE_LOGFILE', compa::encodeutf('Salvar arquivo de Hist&oacute;rico'));
define('_ACA_SAVE_LOGFILE_TIPS', compa::encodeutf('Ficheiro ao qual a inform&ccedil;&atilde;o de hist&oacute;rico ser&aacute; anexada. Este arquivo poder&aacute; ficar muito grande.'));
define('_ACA_CLEAR_LOG', compa::encodeutf('Limpar Hist&oacute;rico'));
define('_ACA_CLEAR_LOG_TIPS', compa::encodeutf('Limpa o arquivo de Hist&oacute;rico.'));

### control panel
define('_ACA_CP_LAST_QUEUE', compa::encodeutf('Última fila executada'));
define('_ACA_CP_TOTAL', compa::encodeutf('Total'));
define('_ACA_MAILING_COPY', compa::encodeutf('E-mail copiado com sucesso!'));

// Miscellaneous settings
define('_ACA_SHOW_GUIDE', compa::encodeutf('Mostrar Guia'));
define('_ACA_SHOW_GUIDE_TIPS', compa::encodeutf('Mostra o Guia no in&iacute;cio para ajudar novos usu&aacute;rios a criar uma newsletter, uma auto-resposta e parametrizar correctamente o jNews.'));
define('_ACA_AUTOS_ON', compa::encodeutf('Usar Auto-respostas'));
define('_ACA_AUTOS_ON_TIPS', compa::encodeutf('Selecione N&atilde;O se n&atilde;o quiser usar Auto-respostas, todas as op&ccedil;&otilde;es de auto-respostas ser&atilde;o desativadas.'));
define('_ACA_NEWS_ON', compa::encodeutf('Usar Newsletters'));
define('_ACA_NEWS_ON_TIPS', compa::encodeutf('Selecione N&atilde;O se n&atilde;o quiser usar Newsletters, todas as op&ccedil;&otilde;es de newsletters ser&atilde;o desativadas.'));
define('_ACA_SHOW_TIPS', compa::encodeutf('Mostrar Dicas'));
define('_ACA_SHOW_TIPS_TIPS', compa::encodeutf('Mostra dicas para ajudar os usu&aacute;rios a usar o jNews de forma eficaz.'));
define('_ACA_SHOW_FOOTER', compa::encodeutf('Mostrar Rodap&eacute;'));
define('_ACA_SHOW_FOOTER_TIPS', compa::encodeutf('Caso deva ou n&atilde;o ser mostrado os direitos de c&oacute;pia no rodap&eacute;.'));
define('_ACA_SHOW_LISTS', compa::encodeutf('Mostrar Listas no site-principal'));
define('_ACA_SHOW_LISTS_TIPS', compa::encodeutf('Quando o usu&aacute;rio n&atilde;o est&aacute; registado mostra uma lista das listas que pode subscrever atrav&eacute;s de um bot&atilde;o de arquivo para as newsletters  ou simplesmente um formul&aacute;rio de login para que se possam registar.'));
define('_ACA_CONFIG_UPDATED', compa::encodeutf('Os detalhes da configura&ccedil;&atilde;o foram atualizados!'));
define('_ACA_UPDATE_URL', compa::encodeutf('URL de Atualiza&ccedil;&atilde;o'));
define('_ACA_UPDATE_URL_WARNING', compa::encodeutf('AVISO! N&atilde;o mude este URL a n&atilde;o ser que lhe seja pedido para o fazer pela equipa t&eacute;cnica do jNews.<br />'));
define('_ACA_UPDATE_URL_TIPS', compa::encodeutf('Por exemplo: http://www.acajoom.com/update/ (inclua a barra no final)'));

// module
define('_ACA_EMAIL_INVALID', compa::encodeutf('O endere&ccedil;o de e-mail introduzido &eacute; inv&aacute;lido.'));
define('_ACA_REGISTER_REQUIRED', compa::encodeutf('&eacute; necess&aacute;rio registar-se primeiro no site para poder ser assinante de uma lista.'));

// Access level box
define('_ACA_OWNER', compa::encodeutf('Criador da Lista:'));
define('_ACA_ACCESS_LEVEL', compa::encodeutf('Definir n&iacute;vel de acesso para a lista'));
define('_ACA_ACCESS_LEVEL_OPTION', compa::encodeutf('Op&ccedil;&otilde;es de n&iacute;vel de acesso'));
define('_ACA_USER_LEVEL_EDIT', compa::encodeutf('Selecione que n&iacute;vel de usu&aacute;rio tem permiss&atilde;o para editar um e-mail (quer do site-principal quer do site de administra&ccedil;&atilde;o) '));

//  drop down options
define('_ACA_AUTO_DAY_CH1', compa::encodeutf('Diariamente'));
define('_ACA_AUTO_DAY_CH2', compa::encodeutf('Diariamente, excepto fim-de-semana'));
define('_ACA_AUTO_DAY_CH3', compa::encodeutf('Dia sim, dia n&atilde;o'));
define('_ACA_AUTO_DAY_CH4', compa::encodeutf('Dia sim, dia n&atilde;o, excepto fim-de-semana'));
define('_ACA_AUTO_DAY_CH5', compa::encodeutf('Semanalmente'));
define('_ACA_AUTO_DAY_CH6', compa::encodeutf('Bi-semanal'));
define('_ACA_AUTO_DAY_CH7', compa::encodeutf('Mensal'));
define('_ACA_AUTO_DAY_CH9', compa::encodeutf('Anual'));
define('_ACA_AUTO_OPTION_NONE', compa::encodeutf('N&atilde;o'));
define('_ACA_AUTO_OPTION_NEW', compa::encodeutf('Novos Usu&aacute;rios'));
define('_ACA_AUTO_OPTION_ALL', compa::encodeutf('Todos os Usu&aacute;rios'));

//
define('_ACA_UNSUB_MESSAGE', compa::encodeutf('Email para N&atilde;o-subscri&ccedil;&atilde;o'));
define('_ACA_UNSUB_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de N&atilde;o-subscri&ccedil;&atilde;o'));
define('_ACA_AUTO_ADD_NEW_USERS', compa::encodeutf('Subscri&ccedil;&atilde;o autom&aacute;tica de Usu&aacute;rios?'));

// Update and upgrade messages
define('_ACA_NO_UPDATES', compa::encodeutf('N&atilde;o existem atualiza&ccedil;&otilde;es dispon&iacute;veis de momento.'));
define('_ACA_VERSION', compa::encodeutf('Vers&atilde;o jNews'));
define('_ACA_NEED_UPDATED', compa::encodeutf('Ficheiros que precisam de ser atualizados:'));
define('_ACA_NEED_ADDED', compa::encodeutf('Ficheiros que precisam de ser adicionados:'));
define('_ACA_NEED_REMOVED', compa::encodeutf('Ficheiros que precisam de ser removidos:'));
define('_ACA_FILENAME', compa::encodeutf('Ficheiro:'));
define('_ACA_CURRENT_VERSION', compa::encodeutf('Vers&atilde;o actual:'));
define('_ACA_NEWEST_VERSION', compa::encodeutf('Última vers&atilde;o:'));
define('_ACA_UPDATING', compa::encodeutf('Atualizando'));
define('_ACA_UPDATE_UPDATED_SUCCESSFULLY', compa::encodeutf('Os arquivos foram atualizados com sucesso.'));
define('_ACA_UPDATE_FAILED', compa::encodeutf('A Atualiza&ccedil;&atilde;o Falhou!'));
define('_ACA_ADDING', compa::encodeutf('Adicionando'));
define('_ACA_ADDED_SUCCESSFULLY', compa::encodeutf('Adicionado com sucesso.'));
define('_ACA_ADDING_FAILED', compa::encodeutf('A Adi&ccedil;&atilde;o Falhou!'));
define('_ACA_REMOVING', compa::encodeutf('Removendo'));
define('_ACA_REMOVED_SUCCESSFULLY', compa::encodeutf('Removido com sucesso.'));
define('_ACA_REMOVING_FAILED', compa::encodeutf('A Remo&ccedil;&atilde;o Falhou!'));
define('_ACA_INSTALL_DIFFERENT_VERSION', compa::encodeutf('Instale uma vers&atilde;o diferente'));
define('_ACA_CONTENT_ADD', compa::encodeutf('Adicionar conteúdo'));
define('_ACA_UPGRADE_FROM', compa::encodeutf('Importar dados (newsletters e informa&ccedil;&atilde;o de assinantes) de '));
define('_ACA_UPGRADE_MESS', compa::encodeutf('N&atilde;o existem riscos para os seus dados existentes. <br /> Este processo simplesmente apenas importa dados para a base de dados do jNews.'));
define('_ACA_CONTINUE_SENDING', compa::encodeutf('Continuar e enviar'));

// jNews message
define('_ACA_UPGRADE1', compa::encodeutf('Você pode facilmente importar os seus usu&aacute;rios e newsletters '));
define('_ACA_UPGRADE2', compa::encodeutf(' para o jNews no painel de atualiza&ccedil;&otilde;es.'));
define('_ACA_UPDATE_MESSAGE', compa::encodeutf('Est&aacute; dispon&iacute;vel uma nova vers&atilde;o do jNews! '));
define('_ACA_UPDATE_MESSAGE_LINK', compa::encodeutf('Clique aqui para atualizar!'));
define('_ACA_CRON_SETUP', compa::encodeutf('Para que as auto-respostas sejam enviadas tem de configurar uma tarefa Cron.'));
define('_ACA_THANKYOU', compa::encodeutf('Obrigado por escolher jNews, o Seu Parceiro de Comunica&ccedil;&atilde;o!'));
define('_ACA_NO_SERVER', compa::encodeutf('Servidor de atualiza&ccedil;&atilde;o n&atilde;o dispon&iacute;vel, por favor verifique mais tarde.'));
define('_ACA_MOD_PUB', compa::encodeutf('O m&oacute;dulo jNews n&atilde;o est&aacute; publicado.'));
define('_ACA_MOD_PUB_LINK', compa::encodeutf('Clique aqui para o publicar!'));
define('_ACA_IMPORT_SUCCESS', compa::encodeutf('importado com sucesso'));
define('_ACA_IMPORT_EXIST', compa::encodeutf('assinante j&aacute; est&aacute; na base de dados'));


// jNews\'s Guide
define('_ACA_GUIDE', compa::encodeutf('Assistente'));
define('_ACA_GUIDE_FIRST_ACA_STEP', compa::encodeutf('<p>O jNews tem muitas caracteristicas grandiosas e este assistente vai guia-lo atrav&eacute;s de um processo de 4 passos f&aacute;ceis para que come&ccedil;e a enviar newsletters e auto-respostas!<p />'));
define('_ACA_GUIDE_FIRST_ACA_STEP_DESC', compa::encodeutf('Primeiro, precisa de adicionar uma lista.  Uma lista pode ser de dois tipos, newsletter ou auto-resposta.' .
		'  Na lista você define todos os diferentes parâmetros para activar o envio das suas newsletters ou auto-respostas: nome do remetente, layout, mensagem de boas-vindas aos assinantes\' , etc...
<br /><br />Pode criar a sua primeira lista aqui: <a href="index2.php?option=com_jnewsletter&act=list" >criar uma lista</a> e clicar no bot&atilde;o novo.'));
define('_ACA_GUIDE_FIRST_ACA_STEP_UPGRADE', compa::encodeutf('O jNews proporciona-lhe uma maneira f&aacute;cil de importar toda a informa&ccedil;&atilde;o de um sistema pr&eacute;vio de newsletter.<br />' .
		' V&aacute; ao painel de Atualiza&ccedil;&otilde;es e escolha o seu sistema pr&eacute;vio de newsletter para importar todas as suas newsletters e assinantes.<br /><br />' .
		'<span style="color:#FF5E00;" >IMPORTANTE: a inmporata&ccedil;&atilde;o &eacute; LIVRE de risco e n&atilde;o afecta de forma alguma a informa&ccedil;&atilde;o do seu sistema pr&eacute;vio de newsletter</span><br />' .
		'Depois da importa&ccedil;&atilde;o ser&aacute; capaz de gerir os seus assinantes e e-mails directamente a partir do jNews.<br /><br />'));
define('_ACA_GUIDE_SECOND_ACA_STEP', compa::encodeutf('Optimo a sua primeira lista est&aacute; criada!  Agora pode escrever o seu primeiro %s.  Para criar v&aacute; para: '));
define('_ACA_GUIDE_SECOND_ACA_STEP_AUTO', compa::encodeutf('Gest&atilde;o de Auto-responder'));
define('_ACA_GUIDE_SECOND_ACA_STEP_NEWS', compa::encodeutf('Gest&atilde;o de Newsletters'));
define('_ACA_GUIDE_SECOND_ACA_STEP_FINAL', compa::encodeutf(' e selecione o seu %s. <br /> Depois escolha o seu %s na lista de possibilidades.  Crie o seu primeiro e-mail clicando em NOVO '));

define('_ACA_GUIDE_THRID_ACA_STEP_NEWS', compa::encodeutf('Antes de enviar a sua primeira newsletter poder&aacute; querer verificar a configura&ccedil;&atilde;o de mail.  ' .
		'V&aacute; para <a href="index2.php?option=com_jnewsletter&act=configuration" >P&aacute;gina de Configura&ccedil;&atilde;o</a> para verificar as defini&ccedil;&otilde;es de mail. <br />'));
define('_ACA_GUIDE_THRID2_ACA_STEP_NEWS', compa::encodeutf('<br />Quando estiver pronto retroceda para o Menu Newsletters, selecione o seu e-mail e clique em ENVIAR'));

define('_ACA_GUIDE_THRID_ACA_STEP_AUTOS', compa::encodeutf('Para que as suas auto-respostas sejam enviadas necessita que primeiro esteja criada uma tarefa Cron no seu servidor. ' .
		' Por favor refira-se ao separador Cron no painel de configura&ccedil;&atilde;o.' .
		' <a href="index2.php?option=com_jnewsletter&act=configuration" >clique aqui</a> para aparender como criar uma tarefa Cron. <br />'));

define('_ACA_GUIDE_MODULE', compa::encodeutf(' <br />Certifique tamb&eacute;m que publicou o m&oacute;dulo jNews para que as pessoas possam assinar a lista.'));

define('_ACA_GUIDE_FOUR_ACA_STEP_NEWS', compa::encodeutf(' Pode agora criar uma auto-resposta.'));
define('_ACA_GUIDE_FOUR_ACA_STEP_AUTOS', compa::encodeutf(' Pode agora tamb&eacute;m criar uma newsletter.'));

define('_ACA_GUIDE_FOUR_ACA_STEP', compa::encodeutf('<p><br />A&iacute; est&aacute;! Est&aacute; agora pronto para comunicar de forma eficaz com os seus visitantes e usu&aacute;rios. Este assistente terminar&aacute; assim que você introduzir um segundo e-mail ou ent&atilde;o pode desliga-lo no <a href="index2.php?option=com_jnewsletter&act=configuration" >Painel de Configura&ccedil;&atilde;o</a>.' .
		'<br /><br />  Se tiver alguma quest&atilde;o enquanto usar o jNews, por favor refira-se ao ' .
		'<a target="_blank" href="http://www.acajoom.com/index.php?option=com_joomlaboard&Itemid=26&task=listcat&catid=22" >forum</a>. ' .
		' Encontrar&aacute; tamb&eacute;m muita informa&ccedil;&atilde;o sobre como comunicar de forma eficaz com os seus assinantes em <a href="http://www.acajoom.com/" target="_blank" >www.jNews.com</a>.' .
		'<p /><br /><b>Obrigado por usar o jNews. O Seu Parceiro de Comunica&ccedil;&atilde;o!</b> '));
define('_ACA_GUIDE_TURNOFF', compa::encodeutf('O assitente esta agora a ser desligado!'));
define('_ACA_STEP', compa::encodeutf('STEP '));

// jNews Install
define('_ACA_INSTALL_CONFIG', compa::encodeutf('Configura&ccedil;&atilde;o jNews'));
define('_ACA_INSTALL_SUCCESS', compa::encodeutf('Instala&ccedil;&atilde;o com Sucesso'));
define('_ACA_INSTALL_ERROR', compa::encodeutf('Erro na instala&ccedil;&atilde;o'));
define('_ACA_INSTALL_BOT', compa::encodeutf('Plugin (Bot) jNews'));
define('_ACA_INSTALL_MODULE', compa::encodeutf('M&oacute;dulo jNews'));
//Others
define('_ACA_JAVASCRIPT', compa::encodeutf('!Aviso! Para uma correcta opera&ccedil;&atilde;o o Javascript deve estar ativado.'));
define('_ACA_EXPORT_TEXT', compa::encodeutf('Os assinantes exportados s&atilde;o baseados na lista que escolheu. <br />Exportar assinantes para lista'));
define('_ACA_IMPORT_TIPS', compa::encodeutf('Importar assinantes. A informa&ccedil;&atilde;o no arquivo precisa de ter o seguinte formato: <br />' .
		'Nome,e-mail,recebeHTML(1/0),<span style="color: rgb(255, 0, 0);">confirmado(1/0)</span>'));
define('_ACA_SUBCRIBER_EXIT', compa::encodeutf('j&aacute; &eacute; assinante'));
define('_ACA_GET_STARTED', compa::encodeutf('Clique aqui para come&ccedil;ar!'));

//News since 1.0.1
define('_ACA_WARNING_1011', compa::encodeutf('Aviso: 1011: A Atualiza&ccedil;&atilde;o n&atilde;o funcionar&aacute; por causa das restri&ccedil;&otilde;es do seu server.'));
define('_ACA_SEND_MAIL_FROM_TIPS', compa::encodeutf('Escolha que endere&ccedil;o de e-mail ser&aacute; mostrado como remetente.'));
define('_ACA_SEND_MAIL_NAME_TIPS', compa::encodeutf('Escolha que nome se mostrado como remetente.'));
define('_ACA_MAILSENDMETHOD_TIPS', compa::encodeutf('Escolha que mailer deseja usar: PHP mail function, <span>Sendmail</span> ou SMTP Server.'));
define('_ACA_SENDMAILPATH_TIPS', compa::encodeutf('Esta &eacute; a directoria do servidor de Mail'));
define('_ACA_LIST_T_TEMPLATE', compa::encodeutf('Tema Padr&atilde;o'));
define('_ACA_NO_MAILING_ENTERED', compa::encodeutf('Nenhum e-mail fornecido'));
define('_ACA_NO_LIST_ENTERED', compa::encodeutf('Nenhuma lista fornecida'));
define('_ACA_SENT_MAILING', compa::encodeutf('E-mails Enviados'));
define('_ACA_SELECT_FILE', compa::encodeutf('Por favor selecione um arquivo para '));
define('_ACA_LIST_IMPORT', compa::encodeutf('Verifique a(s) lista(s) que você quer que tenha(m) assinantes associados.'));
define('_ACA_PB_QUEUE', compa::encodeutf('Subscriber inserted but problem to connect him/her to the list(s). Please check manually.'));
define('_ACA_UPDATE_MESS', compa::encodeutf(''));
define('_ACA_UPDATE_MESS1', compa::encodeutf('Atualiza&ccedil;&atilde;o Altamente Recomendada!'));
define('_ACA_UPDATE_MESS2', compa::encodeutf('Remendo e pequenas corre&ccedil;&otilde;es.'));
define('_ACA_UPDATE_MESS3', compa::encodeutf('Novo lan&ccedil;amento.'));
define('_ACA_UPDATE_MESS5', compa::encodeutf('&eacute; obrigat&oacute;rio Joomla 1.5 para atualizar.'));
define('_ACA_UPDATE_IS_AVAIL', compa::encodeutf(' est&aacute; dispon&iacute;vel!'));
define('_ACA_NO_MAILING_SENT', compa::encodeutf('Nenhum e-mail enviado!'));
define('_ACA_SHOW_LOGIN', compa::encodeutf('Mostra formul&aacute;rio de login'));
define('_ACA_SHOW_LOGIN_TIPS', compa::encodeutf('Selecione SIM para mostrar um formul&aacute;rio de login no site-principal do Painel de Controle do jNews para que o usu&aacute;rio possa registar-se no site.'));
define('_ACA_LISTS_EDITOR', compa::encodeutf('Editor de Descri&ccedil;&atilde;o da Lista'));
define('_ACA_LISTS_EDITOR_TIPS', compa::encodeutf('Selecione SIM para usar um editor HTML para editar o campo Descri&ccedil;&atilde;o da Lista.'));
define('_ACA_SUBCRIBERS_VIEW', compa::encodeutf('Ver assinantes'));

//News since 1.0.2
define('_ACA_FRONTEND_SETTINGS', compa::encodeutf('Defini&ccedil;oes do S&iacute;tio-Principal'));
define('_ACA_SHOW_LOGOUT', compa::encodeutf('Mostra bot&atilde;o de logout'));
define('_ACA_SHOW_LOGOUT_TIPS', compa::encodeutf('Selecione SIM para mostrar um bot&atilde;o de logout no front-end do painal de controle do jNews.'));

//News since 1.0.3 CB integration
define('_ACA_CONFIG_INTEGRATION', compa::encodeutf('Integra&ccedil;&atilde;o'));
define('_ACA_CB_INTEGRATION', compa::encodeutf('Integra&ccedil;&atilde;o com o Community Builder'));
define('_ACA_INSTALL_PLUGIN', compa::encodeutf('Plugin Community Builder (Integra&ccedil;&atilde;o jNews) '));
define('_ACA_CB_PLUGIN_NOT_INSTALLED', compa::encodeutf('O plugin jNews para o Community Builder ainda n&atilde;o est&aacute; instalado!'));
define('_ACA_CB_PLUGIN', compa::encodeutf('Listas aquando do registo'));
define('_ACA_CB_PLUGIN_TIPS', compa::encodeutf('Selecione SIM para mostrar as listas de e-mail no formul&aacute;rio de registo do community builder'));
define('_ACA_CB_LISTS', compa::encodeutf('Listas de IDs'));
define('_ACA_CB_LISTS_TIPS', compa::encodeutf('ESTE CAMPO &eacute; OBRIGAT&oacute;RIO. Introduza o número de ID das listas que você quer permitir aos usu&aacute;rios assinar separados por v&iacute;rgula ,  (0 mostra todas as listas)'));
define('_ACA_CB_INTRO', compa::encodeutf('Texto de Introdu&ccedil;&atilde;o'));
define('_ACA_CB_INTRO_TIPS', compa::encodeutf('Um texto aparecer&aacute; antes da listagem. DEIXE EM BRANCO PARA N&atilde;O MOSTRAR NADA.  Use cb_pretext para layout CSS.'));
define('_ACA_CB_SHOW_NAME', compa::encodeutf('Mostra Nome da Lista'));
define('_ACA_CB_SHOW_NAME_TIPS', compa::encodeutf('Selecione se deve ou n&atilde;o mostrar o nome da lista depois da introdu&ccedil;&atilde;o.'));
define('_ACA_CB_LIST_DEFAULT', compa::encodeutf('Verifica lista por defeito'));
define('_ACA_CB_LIST_DEFAULT_TIPS', compa::encodeutf('Selecione se quer ou n&atilde;o, ter uma caixa de verifica&ccedil;&atilde;o para cada lista verificado por defeito.'));
define('_ACA_CB_HTML_SHOW', compa::encodeutf('Mostra Receber HTML'));
define('_ACA_CB_HTML_SHOW_TIPS', compa::encodeutf('Escolha SIM para permitir aos usu&aacute;rios decidir se querem ou n&atilde;o, receber e-mails em HTML. Escolha N&atilde;O para usar o receber HTML por defeito.'));
define('_ACA_CB_HTML_DEFAULT', compa::encodeutf('Receber HTML por defeito'));
define('_ACA_CB_HTML_DEFAULT_TIPS', compa::encodeutf('Escolha esta op&ccedil;&atilde;o para mostrar a configura&ccedil;&atilde;o de mail em HTML por defeito. Se o Mostra Receber Html estiver para N&atilde;O ent&atilde;o esta ser&aacute; a op&ccedil;&atilde;o por defeitot.'));

// Since 1.0.4
define('_ACA_BACKUP_FAILED', compa::encodeutf('N&atilde;o foi poss&iacute;vel efectuar a c&oacute;pia de seguran&ccedil;a do arquivo! O arquivo n&atilde;o foi substitu&iacute;do.'));
define('_ACA_BACKUP_YOUR_FILES', compa::encodeutf('Foi efectuada uma c&oacute;pia de seguran&ccedil;a dos arquivos da vers&atilde;o antiga na seguinte direct&oacute;ria:'));
define('_ACA_SERVER_LOCAL_TIME', compa::encodeutf('Hora local do Servidor'));
define('_ACA_SHOW_ARCHIVE', compa::encodeutf('Mostrar bot&atilde;o de Arquivo'));
define('_ACA_SHOW_ARCHIVE_TIPS', compa::encodeutf('Selecione SIM para mostrar o bot&atilde;o de Arquivo no front-end das listas de Newsletter'));
define('_ACA_LIST_OPT_TAG', compa::encodeutf('Tags'));
define('_ACA_LIST_OPT_IMG', compa::encodeutf('Imagens'));
define('_ACA_LIST_OPT_CTT', compa::encodeutf('Conteúdo'));
define('_ACA_INPUT_NAME_TIPS', compa::encodeutf('Introduza o seu nome completo (primeiro nome primeiro)'));
define('_ACA_INPUT_EMAIL_TIPS', compa::encodeutf('Introduza o seu endere&ccedil;o de e-mail (Certifique-se de que este &eacute; um endere&ccedil;o de e-mail v&aacute;lido para que possa receber as nossas Newsletters.)'));
define('_ACA_RECEIVE_HTML_TIPS', compa::encodeutf('Escolha SIM se quiser receber mails em HTML - N&atilde;O para receber mails em apenas texto'));
define('_ACA_TIME_ZONE_ASK_TIPS', compa::encodeutf('Especifique a sua zona de fuso hor&aacute;rio.'));

// Since 1.0.5
define('_ACA_FILES', compa::encodeutf('Ficheiros'));
define('_ACA_FILES_UPLOAD', compa::encodeutf('Envio'));
define('_ACA_MENU_UPLOAD_IMG', compa::encodeutf('Envio de Imagens'));
define('_ACA_TOO_LARGE', compa::encodeutf('Tamanho do arquivo demasiado grande. O tamanho m&aacute;ximo permitido &eacute;'));
define('_ACA_MISSING_DIR', compa::encodeutf('O direct&oacute;rio de destino n&atilde;o existe'));
define('_ACA_IS_NOT_DIR', compa::encodeutf('O direct&oacute;rio de destino n&atilde;o existe ou &eacute; um arquivo regular.'));
define('_ACA_NO_WRITE_PERMS', compa::encodeutf('O direct&oacute;rio de destino n&atilde;o tem permiss&atilde;o de escrita.'));
define('_ACA_NO_USER_FILE', compa::encodeutf('N&atilde;o selecionou nenhum arquivo para envio.'));
define('_ACA_E_FAIL_MOVE', compa::encodeutf('Imposs&iacute;vel mover o arquivo.'));
define('_ACA_FILE_EXISTS', compa::encodeutf('O arquivo destino j&aacute; existe.'));
define('_ACA_CANNOT_OVERWRITE', compa::encodeutf('O arquivo destino j&aacute; existe e n&atilde;o pode ser sobreposto.'));
define('_ACA_NOT_ALLOWED_EXTENSION', compa::encodeutf('Extens&atilde;o de arquivo n&atilde;o permitida.'));
define('_ACA_PARTIAL', compa::encodeutf('O arquivo foi enviado apenas parcialmente.'));
define('_ACA_UPLOAD_ERROR', compa::encodeutf('Erro de envio:'));
define('DEV_NO_DEF_FILE', compa::encodeutf('O arquivo foi enviado apenas parcialmente.'));
define('_ACA_CONTENTREP', compa::encodeutf('[SUBSCRIPTIONS] = Isto ser&aacute; substiu&iacute;do pelos links de subscri&ccedil;&atilde;o.' .
		' Isto &eacute; <strong>obrigat&oacute;rio</strong> para que o jNews funcione correctamente.<br />' .
		'Se colocar algum outro conteúdo nesta caixa o mesmo ser&aacute; mostrado em todos os e-mails correspondentes a esta Lista.' .
		' <br />Adicione a sua mensagem de subscri&ccedil;&atilde;o no final.  O jNews adicionar&aacute; automaticamente um link para que o assinante altere a informa&ccedil;&atilde;o dele, e um link para remover-se da Lista.'));

// since 1.0.6
define('_ACA_NOTIFICATION', compa::encodeutf('Notifica&ccedil;&atilde;o'));  // shortcut for Email notification
define('_ACA_NOTIFICATIONS', compa::encodeutf('Notifica&ccedil;&otilde;es'));
define('_ACA_USE_SEF', compa::encodeutf('SEF nos e-mails'));
define('_ACA_USE_SEF_TIPS', compa::encodeutf('&eacute; recomendado que escolha N&atilde;O.  No entanto se desejar que o URL inclu&iacute;do nos seus e-mails use SEF ent&atilde;o escolha SIM.' .
		' <br /><b>Os links funcionar&atilde;o de igual forma para ambas as op&ccedil;&otilde;es.  N&atilde;O, assegurar&aacute; que os links nos e-mails funcionar&atilde;o sempre mesmo que altere o seu SEF.</b> '));
define('_ACA_ERR_NB', compa::encodeutf('Erro #: ERR'));
define('_ACA_ERR_SETTINGS', compa::encodeutf('Defini&ccedil;&otilde;es de manuseio de Erros'));
define('_ACA_ERR_SEND', compa::encodeutf('Enviar relat&oacute;rio de erros'));
define('_ACA_ERR_SEND_TIPS', compa::encodeutf('Se deseja que o jNews seja um produto melhor por favor selecione SIM.  Isto envia-nos um relat&oacute;rio de erros.  Por isso nunca mais necessita de reportar bugs ;-) <br /> <b>NENHUMA INFORMA&ccedil;&atilde;O PRIVADA &eacute; ENVIADA</b>.  N&oacute;s nem sequer saberemos a que site perten&ccedil;e o erro. Apenas enviamos informa&ccedil;&atilde;o sobre o jNews , a instala&ccedil;&atilde;o PHP e queries SQL. '));
define('_ACA_ERR_SHOW_TIPS', compa::encodeutf('Escolha SIM para mostrar o número do erro no ecr&aacute;n.  Usado principalmente para efeitos de debuging. '));
define('_ACA_ERR_SHOW', compa::encodeutf('Mostra erros'));
define('_ACA_LIST_SHOW_UNSUBCRIBE', compa::encodeutf('Mostra links de remo&ccedil;&atilde;o'));
define('_ACA_LIST_SHOW_UNSUBCRIBE_TIPS', compa::encodeutf('Selecione SIM para mostrar links de remo&ccedil;&atilde;o no rodap&eacute; dos e-mails para que os usu&aacute;rios possam mudar as suas subscri&ccedil;&otilde;es. <br /> N&atilde;O, desactiva os links e rodap&eacute;.'));
define('_ACA_UPDATE_INSTALL', compa::encodeutf('<span style="color: rgb(255, 0, 0);">NOT&iacute;CIA IMPORTANTE!</span> <br />Se est&aacute; a fazer uma atualiza&ccedil;&atilde;o a partir de uma vers&atilde;o anterior do jNews, precisa de atualizar a estrutura da sua base de dados clicando no bot&atilde;o seguinte (A sua informa&ccedil;&atilde;o ficar&aacute; &iacute;ntegra)'));
define('_ACA_UPDATE_INSTALL_BTN', compa::encodeutf('Atualizar tabelas e configura&ccedil;&atilde;o'));
define('_ACA_MAILING_MAX_TIME', compa::encodeutf('Tempo m&aacute;ximo da fila'));
define('_ACA_MAILING_MAX_TIME_TIPS', compa::encodeutf('Define o tempo m&aacute;ximo para cada conjunto de e-mails enviados pela fila. Recomendado entre 30s e 2mins.'));

// virtuemart integration beta
define('_ACA_VM_INTEGRATION', compa::encodeutf('Integra&ccedil;&atilde;o com VirtueMart'));
define('_ACA_VM_COUPON_NOTIF', compa::encodeutf('Notifica&ccedil;&atilde;o de ID do Cupom'));
define('_ACA_VM_COUPON_NOTIF_TIPS', compa::encodeutf('Especifica o número de ID do e-mail que quiser usar para enviar cupons para os seus clientes.'));
define('_ACA_VM_NEW_PRODUCT', compa::encodeutf('Notifica&ccedil;&atilde;o de ID de novos produtos'));
define('_ACA_VM_NEW_PRODUCT_TIPS', compa::encodeutf('Especifica o número de ID do e-mail que quiser usar para enviar notifica&ccedil;&atilde;o de novos produtos.'));

// since 1.0.8
// create forms for subscriptions
define('_ACA_FORM_BUTTON', compa::encodeutf('Criar Formul&aacute;rio'));
define('_ACA_FORM_COPY', compa::encodeutf('C&oacute;digo HTML'));
define('_ACA_FORM_COPY_TIPS', compa::encodeutf('Copie o c&oacute;digo HTML gerado para a sua p&aacute;gina HTML.'));
define('_ACA_FORM_LIST_TIPS', compa::encodeutf('Selecione a lista que quer incluir neste formul&aacute;rio'));
// update messages
define('_ACA_UPDATE_MESS4', compa::encodeutf('N&atilde;o pode ser atualizado automaticamente.'));
define('_ACA_WARNG_REMOTE_FILE', compa::encodeutf('N&atilde;o h&aacute; maneira de conseguir o arquivo remoto.'));
define('_ACA_ERROR_FETCH', compa::encodeutf('Erro de acesso ao arquivo.'));

define('_ACA_CHECK', compa::encodeutf('Verificar'));
define('_ACA_MORE_INFO', compa::encodeutf('Mais informa&ccedil;&atilde;o'));
define('_ACA_UPDATE_NEW', compa::encodeutf('Atualizar para nova vers&atilde;o'));
define('_ACA_UPGRADE', compa::encodeutf('Upgrade para produto mais elevado'));
define('_ACA_DOWNDATE', compa::encodeutf('Voltar a instalar vers&atilde;o anterior'));
define('_ACA_DOWNGRADE', compa::encodeutf('Voltar para o produto b&aacute;sico'));
define('_ACA_REQUIRE_JOOM', compa::encodeutf('Requere Joomla'));
define('_ACA_TRY_IT', compa::encodeutf('Experimentar!'));
define('_ACA_NEWER', compa::encodeutf('Novo'));
define('_ACA_OLDER', compa::encodeutf('Antigo'));
define('_ACA_CURRENT', compa::encodeutf('Actual'));

// since 1.0.9
define('_ACA_CHECK_COMP', compa::encodeutf('Experimentar um dos outros componentes'));
define('_ACA_MENU_VIDEO', compa::encodeutf('Tutoriais Video'));
define('_ACA_AUTO_SCHEDULE', compa::encodeutf('Temporizador'));
define('_ACA_SCHEDULE_TITLE', compa::encodeutf('Defini&ccedil;&otilde;es de fun&ccedil;&otilde;es autom&aacute;ticas temporizadas'));
define('_ACA_ISSUE_NB_TIPS', compa::encodeutf('Atribuir número automaticamente gerado pelo sistema'));
define('_ACA_SEL_ALL', compa::encodeutf('Todos os e-mails'));
define('_ACA_SEL_ALL_SUB', compa::encodeutf('Todas as listas'));
define('_ACA_INTRO_ONLY_TIPS', compa::encodeutf('Se assinalar esta caixa apenas a introdu&ccedil;&atilde;o do artigo ser&aacute; inserida no e-mail com um link LER MAIS para a leitura completa do mesmo no seu site.'));
define('_ACA_TAGS_TITLE', compa::encodeutf('Tag de conteúdo'));
define('_ACA_TAGS_TITLE_TIPS', compa::encodeutf('Copie e cole esta tag para o seu e-mail, no site onde quer colocar o conteúdo.'));
define('_ACA_PREVIEW_EMAIL_TEST', compa::encodeutf('Indica o endere&ccedil;o de e-mail para onde enviar um teste'));
define('_ACA_PREVIEW_TITLE', compa::encodeutf('Pr&eacute;-visualizar'));
define('_ACA_AUTO_UPDATE', compa::encodeutf('Nova notifica&ccedil;&atilde;o de atualiza&ccedil;&atilde;o'));
define('_ACA_AUTO_UPDATE_TIPS', compa::encodeutf('Selecione SIM se quiser ser notificado de novas atualiza&ccedil;&otilde;es para o seu componente. <br />IMPORTANTE!! Mostrar Dicas tem de estar ativado para que esta fun&ccedil;&atilde;o funcione.'));

// since 1.1.0
define('_ACA_LICENSE', compa::encodeutf('Informa&ccedil;&atilde;o de Licenceamento'));

// since 1.1.1
define('_ACA_NEW', compa::encodeutf('Novo'));
define('_ACA_SCHEDULE_SETUP', compa::encodeutf('Para que as auto-respostas sejam enviadas tem de definir uma agenda na configura&ccedil;&atilde;o.'));
define('_ACA_SCHEDULER', compa::encodeutf('Agendador'));
define('_ACA_JNEWSLETTER_CRON_DESC', compa::encodeutf('se n&atilde;o tem acesso à administra&ccedil;&atilde;o de tarefas cron no seu website, pode registar-se para uma Conta Tarefa Cron jNews Gr&aacute;tis em:'));
define('_ACA_CRON_DOCUMENTATION', compa::encodeutf('Pode encontrar mais informa&ccedil;&atilde;o sobre como definir o Agendador jNews no url seguinte:'));
define('_ACA_CRON_DOC_URL', compa::encodeutf('<a href="http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29"
 target="_blank">http://www.acajoom.com/index.php?option=com_content&task=blogcategory&id=29</a>'));
define( '_ACA_QUEUE_PROCESSED', compa::encodeutf('Fila processada com sucesso...'));
define( '_ACA_ERROR_MOVING_UPLOAD', compa::encodeutf('Erro ao mover arquivo importado'));

//since 1.1.4
define( '_ACA_SCHEDULE_FREQUENCY', compa::encodeutf('Frequência do Agenda'));
define( '_ACA_CRON_MAX_FREQ', compa::encodeutf('Frequência M&aacute;xima da Agenda'));
define( '_ACA_CRON_MAX_FREQ_TIPS', compa::encodeutf('Especifica a frequência m&aacute;xima que a agenda pode ser executada ( em minutos ).  Isto limitar&aacute; a atenda mesmo que a tarefa cron esteja definida com maior frequência.'));
define( '_ACA_CRON_MAX_EMAIL', compa::encodeutf('M&aacute;ximo de e-mails por tarefa'));
define( '_ACA_CRON_MAX_EMAIL_TIPS', compa::encodeutf('Especifica o número m&aacute;ximo de e-mails enviados por tarefa (0 ilimitados).'));
define( '_ACA_CRON_MINUTES', compa::encodeutf(' minutos'));
define( '_ACA_SHOW_SIGNATURE', compa::encodeutf('Mostra rodap&eacute; do e-mail'));
define( '_ACA_SHOW_SIGNATURE_TIPS', compa::encodeutf('Caso queira ou n&atilde;o promover o jNews no rodap&eacute; dos e-mails.'));
define( '_ACA_QUEUE_AUTO_PROCESSED', compa::encodeutf('Auto-respostas processadas com sucesso...'));
define( '_ACA_QUEUE_NEWS_PROCESSED', compa::encodeutf('Newsletters agendadas processadas com sucesso...'));
define( '_ACA_MENU_SYNC_USERS', compa::encodeutf('Sincronizar Usu&aacute;rios'));
define( '_ACA_SYNC_USERS_SUCCESS', compa::encodeutf('Sincroniza&ccedil;&atilde;o de Usu&aacute;rios processada com sucesso!'));

// compatibility with Joomla 15
if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Sair'));
if (!defined('_CMN_YES')) define( '_CMN_YES', compa::encodeutf('Sim'));
if (!defined('_CMN_NO')) define( '_CMN_NO', compa::encodeutf('N&atilde;o'));
if (!defined('_HI')) define( '_HI', compa::encodeutf('Ol&aacute;'));
if (!defined('_CMN_TOP')) define( '_CMN_TOP', compa::encodeutf('Topo'));
if (!defined('_CMN_BOTTOM')) define( '_CMN_BOTTOM', compa::encodeutf('Fundo'));
//if (!defined('_BUTTON_LOGOUT')) define( '_BUTTON_LOGOUT', compa::encodeutf('Logout'));

// For include title only or full article in content item tab in newsletter edit - p0stman911
define('_ACA_TITLE_ONLY_TIPS', compa::encodeutf('Se selecionar isto apenas o t&iacute;tulo do artigo ser&aacute; inserido no e-mail como link para o artigo completo no seu site.'));
define('_ACA_TITLE_ONLY', compa::encodeutf('Apenas T&iacute;tulo'));
define('_ACA_FULL_ARTICLE_TIPS', compa::encodeutf('Se selecionar isto o artigo completo ser&aacute; inserido no e-mail'));
define('_ACA_FULL_ARTICLE', compa::encodeutf('Artigo Completo'));
define('_ACA_CONTENT_ITEM_SELECT_T', compa::encodeutf('Selecione um item de conteúdo para ser adicionado à mensagem. <br />Copie e cole o<b>content tag</b> para o e-mail.  Pode escolher ter a totalidade do texto, apenas introdu&ccedil;&atilde;o, ou apenas t&iacute;tulo com (0, 1, ou 2 respectivamente). '));
define('_ACA_SUBSCRIBE_LIST2', compa::encodeutf('Lista(s) de E-mail'));

// smart-newsletter function
define('_ACA_AUTONEWS', compa::encodeutf('Smart-Newsletter'));
define('_ACA_MENU_AUTONEWS', compa::encodeutf('Smart-Newsletters'));
define('_ACA_AUTO_NEWS_OPTION', compa::encodeutf('Op&ccedil;&otilde;es da Smart-Newsletter'));
define('_ACA_AUTONEWS_FREQ', compa::encodeutf('Frequência da Newsletter'));
define('_ACA_AUTONEWS_FREQ_TIPS', compa::encodeutf('Especifica a frequência com que deseja enviar as smart-newsletter.'));
define('_ACA_AUTONEWS_SECTION', compa::encodeutf('Se&ccedil;&atilde;o de Artigos'));
define('_ACA_AUTONEWS_SECTION_TIPS', compa::encodeutf('Especifica a se&ccedil;&atilde;o de que quer escolher os artigos.'));
define('_ACA_AUTONEWS_CAT', compa::encodeutf('Categoria do Artigo'));
define('_ACA_AUTONEWS_CAT_TIPS', compa::encodeutf('Especifica a categoria de que quer escolher os artigos (TODAS para todos os artigos naquela se&ccedil;&atilde;o).'));
define('_ACA_SELECT_SECTION', compa::encodeutf('Selecione se&ccedil;&atilde;o'));
define('_ACA_SELECT_CAT', compa::encodeutf('Todas as Categorias'));
define('_ACA_AUTO_DAY_CH8', compa::encodeutf('Quaternalmente'));
define('_ACA_AUTONEWS_STARTDATE', compa::encodeutf('Data de come&ccedil;o'));
define('_ACA_AUTONEWS_STARTDATE_TIPS', compa::encodeutf('Especifica a data para come&ccedil;ar a enviar a Smart Newsletter.'));
define('_ACA_AUTONEWS_TYPE', compa::encodeutf('Renderiza&ccedil;&atilde;o do Conteúdo'));// how we see the content which is included in the newsletter
define('_ACA_AUTONEWS_TYPE_TIPS', compa::encodeutf('Artigo Completo: will include the entire article in the newsletter.<br />' .
		'Apenas Introdu&ccedil;&atilde;o: ser&aacute; incluida apenas a introdu&ccedil;&atilde;o do artigo na newsletter.<br/>' .
		'Apenas T&iacute;tulo: ser&aacute; incluido apenas o t&iacute;tulo do artigo na newsletter.'));
define('_ACA_TAGS_AUTONEWS', compa::encodeutf('[SMARTNEWSLETTER] = Isto ser&aacute; substitu&iacute;do pela Smart-newsletter.'));

//since 1.1.3
define('_ACA_MALING_EDIT_VIEW', compa::encodeutf('Criar / Ver E-mails'));
define('_ACA_LICENSE_CONFIG', compa::encodeutf('Licen&ccedil;a'));
define('_ACA_ENTER_LICENSE', compa::encodeutf('Digitar a licen&ccedil;a'));
define('_ACA_ENTER_LICENSE_TIPS', compa::encodeutf('Digite o número da sua licen&ccedil;a e salve-o.'));
define('_ACA_LICENSE_SETTING', compa::encodeutf('Configura&ccedil;&otilde;es da Licen&ccedil;a'));
define('_ACA_GOOD_LIC', compa::encodeutf('A sua Licen&ccedil;a &eacute; v&aacute;lida.'));
define('_ACA_NOTSO_GOOD_LIC', compa::encodeutf('A sua Licen&ccedil;a n&atilde;o &eacute; v&aacute;lida: '));
define('_ACA_PLEASE_LIC', compa::encodeutf('Favor entrar em contato com o suporte jNews para atualizar a sua Licen&ccedil;a ( license@acajoom.com ).'));
define('_ACA_DESC_PLUS', compa::encodeutf('O jNews Plus &eacute; o primeiro auto-respondedor seqüencial para o Joomla CMS.  ' . _ACA_FEATURES));
define('_ACA_DESC_PRO', compa::encodeutf('O jNews PRO &eacute; o melhor sistema de e-mail para o Joomla CMS.  ' . _ACA_FEATURES));

//since 1.1.4
define('_ACA_ENTER_TOKEN', compa::encodeutf('Digite o token'));
define('_ACA_ENTER_TOKEN_TIPS', compa::encodeutf('Favor digitar o número do token que você recebeu por e-mail quando você comprou o jNews. '));
define('_ACA_JNEWSLETTER_SITE', compa::encodeutf('Site do jNews:'));
define('_ACA_MY_SITE', compa::encodeutf('Meu site:'));
define( '_ACA_LICENSE_FORM', compa::encodeutf(' ' . 'Clique aqui para ir para o formul&aacute;rio de Licen&ccedil;a.</a>'));
define('_ACA_PLEASE_CLEAR_LICENSE', compa::encodeutf('Favor limpar o campo da Licen&ccedil;a para que ele esteja vazio e tente novamente.<br />  Se o problema persistir, '));
define( '_ACA_LICENSE_SUPPORT', compa::encodeutf('Se você tiver ainda alguma dúvida, ' . _ACA_PLEASE_LIC ));
define( '_ACA_LICENSE_TWO', compa::encodeutf('você pode obter a sua licen&ccedil;a manualmente inserindo o número do token e a URL do site (que est&aacute; real&ccedil;ada em verde na parte superior desta p&aacute;gina) no formul&aacute;rio da Licen&ccedil;a. '
					. _ACA_LICENSE_FORM . '<br /><br/>' . _ACA_LICENSE_SUPPORT ));
define('_ACA_ENTER_TOKEN_PATIENCE', compa::encodeutf('Ap&oacute;s salvar o seu token, uma licen&ccedil;a ser&aacute; gerada automaticamente. ' .
		' Normalmente o token &eacute; validado em 2 minutos.  Entretanto, em alguns casos isto pode levar at&eacute; 15 minutos.<br />' .
		'<br />Verifique novamente este Painel de Controle em alguns minutos.  <br /><br />' .
						'Se você n&atilde;o receber uma chave de licen&ccedil;a v&aacute;lida em 15 minutos, '. _ACA_LICENSE_TWO));
define( '_ACA_ENTER_NOT_YET', compa::encodeutf('O seu token ainda n&atilde;o foi validado.'));
define( '_ACA_UPDATE_CLICK_HERE', compa::encodeutf('Favor visitar <a href="http://www.acajoom.com" target="_blank">www.acajoom.com</a> para o download da vers&atilde;o mais recente.'));
define( '_ACA_NOTIF_UPDATE', compa::encodeutf('Para ser notificado sobre novas atualiza&ccedil;&otilde;es, informe o seu endere&ccedil;o de e-mail e clique em assinar '));

define('_ACA_THINK_PLUS', compa::encodeutf('Se você deseja mais do seu sistema de e-mail, pense no Plus!'));
define('_ACA_THINK_PLUS_1', compa::encodeutf('Auto-Respondedores Seqüenciais'));
define('_ACA_THINK_PLUS_2', compa::encodeutf('Agende a entrega da sua newsletter para uma data predefinida'));
define('_ACA_THINK_PLUS_3', compa::encodeutf('Sem limites no Servidor'));
define('_ACA_THINK_PLUS_4', compa::encodeutf('e muito mais...'));

//since 1.2.2
define( '_ACA_LIST_ACCESS', compa::encodeutf('Listar Acessos'));
define( '_ACA_INFO_LIST_ACCESS', compa::encodeutf('Especificar qual grupo de usu&aacute;rios pode ver e assinar esta lista'));
define( 'ACA_NO_LIST_PERM', compa::encodeutf('Você n&atilde;o tem permiss&atilde;o suficiente para assinar esta lista'));

//Archive Configuration
 define('_ACA_MENU_TAB_ARCHIVE', compa::encodeutf('Arquivar'));
 define('_ACA_MENU_ARCHIVE_ALL', compa::encodeutf('Arquivar Tudo'));


//Archive Lists
 define('_FREQ_OPT_0', compa::encodeutf('Nenhum'));
 define('_FREQ_OPT_1', compa::encodeutf('Semanalmente'));
 define('_FREQ_OPT_2', compa::encodeutf('Quinzenalmente'));
 define('_FREQ_OPT_3', compa::encodeutf('Mensalmente'));
 define('_FREQ_OPT_4', compa::encodeutf('Trimestralmente'));
 define('_FREQ_OPT_5', compa::encodeutf('Anualmente'));
 define('_FREQ_OPT_6', compa::encodeutf('Outros'));

define('_DATE_OPT_1', compa::encodeutf('Data de cria&ccedil;&atilde;o'));
define('_DATE_OPT_2', compa::encodeutf('Data de modifica&ccedil;&atilde;o'));

define('_ACA_ARCHIVE_TITLE', compa::encodeutf('Configura&ccedil;&atilde;o da freqüência de auto-arquivamento'));
define('_ACA_FREQ_TITLE', compa::encodeutf('Freqüência de arquivamento'));
define('_ACA_FREQ_TOOL', compa::encodeutf('Definir a freqüência com a qual você deseja que o Gerenciador de Arquivos arquive o conteúdo do seu website.'));
define('_ACA_NB_DAYS', compa::encodeutf('Número de dias'));
define('_ACA_NB_DAYS_TOOL', compa::encodeutf('Isto &eacute; apenas para a op&ccedil;&atilde;o Outros! Favor especificar o número de dias entre cada Arquivo.'));
define('_ACA_DATE_TITLE', compa::encodeutf('Tipo de data'));
define('_ACA_DATE_TOOL', compa::encodeutf('Definir se o arquivamento ser&aacute; feito de acordo com a data de cria&ccedil;&atilde;o ou de modifica&ccedil;&atilde;o.'));

define('_ACA_MAINTENANCE_TAB', compa::encodeutf('Configura&ccedil;&otilde;es de manuten&ccedil;&atilde;o'));
define('_ACA_MAINTENANCE_FREQ', compa::encodeutf('Freqüência de manuten&ccedil;&atilde;o'));
define( '_ACA_MAINTENANCE_FREQ_TIPS', compa::encodeutf('Especificar a freqüência com que você deseja executar a rotina de manuten&ccedil;&atilde;o.'));
define( '_ACA_CRON_DAYS', compa::encodeutf('hora(s)'));

define( '_ACA_LIST_NOT_AVAIL', compa::encodeutf('N&atilde;o existe uma lista dispon&iacute;vel.'));
define( '_ACA_LIST_ADD_TAB', compa::encodeutf('Adicionar/Editar'));

define( '_ACA_LIST_ACCESS_EDIT', compa::encodeutf('Adicionar E-mail/Editar Acesso'));
define( '_ACA_INFO_LIST_ACCESS_EDIT', compa::encodeutf('Especifique que grupo de usu&aacute;rios pode adicionar ou editar um novo e-mail para esta lista'));
define( '_ACA_MAILING_NEW_FRONT', compa::encodeutf('Criar um Novo E-mail'));

define('_ACA_AUTO_ARCHIVE', compa::encodeutf('Auto-Arquivar'));
define('_ACA_MENU_ARCHIVE', compa::encodeutf('Auto-Arquivar'));

//Extra tags:
define('_ACA_TAGS_ISSUE_NB', compa::encodeutf('[ISSUENB] = Isto ser&aacute; substitu&iacute;do pelo número da edi&ccedil;&atilde;o da newsletter.'));
define('_ACA_TAGS_DATE', compa::encodeutf('[DATE] = Isto ser&aacute; substitu&iacute;do pela data de envio.'));
define('_ACA_TAGS_CB', compa::encodeutf('[CBTAG:{field_name}] = Isto ser&aacute; substitu&iacute;do pelo valor obtido a partir do campo Community Builder, p. ex. [CBTAG:firstname] '));
define( '_ACA_MAINTENANCE', compa::encodeutf('Manuten&ccedil;&atilde;o'));

define('_ACA_THINK_PRO', compa::encodeutf('Quando você possui necessidades profissionais, você utiliza componentes profissionais!'));
define('_ACA_THINK_PRO_1', compa::encodeutf('Smart-Newsletters'));
define('_ACA_THINK_PRO_2', compa::encodeutf('Definir o n&iacute;vel de acesso para a sua lista'));
define('_ACA_THINK_PRO_3', compa::encodeutf('Definir quem pode adicionar/editar e-mails'));
define('_ACA_THINK_PRO_4', compa::encodeutf('Mois tags: adicionar seus campos CB'));
define('_ACA_THINK_PRO_5', compa::encodeutf('Auto-Arquivar conteúdo do CMS'));
define('_ACA_THINK_PRO_6', compa::encodeutf('Otimiza&ccedil;&atilde;o do Banco de Dados'));

define('_ACA_LIC_NOT_YET', compa::encodeutf('A sua licen&ccedil;a n&atilde;o &eacute; maisv&aacute;lida.  Favor verificar a aba Licen&ccedil;a no painel de configura&ccedil;&atilde;o.'));
define('_ACA_PLEASE_LIC_GREEN', compa::encodeutf('Certifique-se de fornecer a informa&ccedil;&atilde;o verde no topo da p&aacute;gina para a nossa equipe de suporte.'));

define('_ACA_FOLLOW_LINK', compa::encodeutf('Obtenha Sua Licen&ccedil;a'));
define( '_ACA_FOLLOW_LINK_TWO', compa::encodeutf('Você pode obter a sua licen&ccedil;a digitando o número do token e a URL do site (a qual est&aacute; real&ccedil;ada em verde no topo desta p&aacute;gina) no formul&aacute;rio de Licen&ccedil;a. '));
define( '_ACA_ENTER_TOKEN_TIPS2', compa::encodeutf(' Clique ent&atilde;o no bot&atilde;o Aplicar no menu superior direito.'));
define( '_ACA_ENTER_LIC_NB', compa::encodeutf('Digite a sua Licen&ccedil;a'));
define( '_ACA_UPGRADE_LICENSE', compa::encodeutf('Atualize Sua Licen&ccedil;a'));
define( '_ACA_UPGRADE_LICENSE_TIPS', compa::encodeutf('Se você recebeu um token para atualizar a sua Licen&ccedil;a, favor digit&aacute;-lo aqui. Clique ent&atilde;o em Aplicar e proceda para o número <b>2</b> para obter o novo número da sua Licen&ccedil;a.'));

define( '_ACA_MAIL_FORMAT', compa::encodeutf('Formato da codifica&ccedil;&atilde;o'));
define( '_ACA_MAIL_FORMAT_TIPS', compa::encodeutf('Qual formato você deseja usar para codificar os seus e-mails, Somente Texto ou MIME'));
define( '_ACA_JNEWSLETTER_CRON_DESC_ALT', compa::encodeutf('Se você n&atilde;o tem acesso ao Gerenciador de Tarefas Cron no seu website, você pode usar o componente Free jCron para criar uma tarefa Cron para o seu website.'));

//since 1.3.1
define('_ACA_SHOW_AUTHOR', compa::encodeutf('Exibir Nome do Autor'));
define('_ACA_SHOW_AUTHOR_TIPS', compa::encodeutf('Selecione SIM se você deseja adicionar o nome do Autor quando você adicionar um artigo no E-mail'));

//since 1.3.5
define('_ACA_REGWARN_NAME', compa::encodeutf('Por favor, informe seu nome.'));
define('_ACA_REGWARN_MAIL', compa::encodeutf('Por favor, informe um endereço de e-mail válido.'));

//since 1.5.6
define('_ACA_ADDEMAILREDLINK_TIPS', compa::encodeutf('Se você selecionar SIM, o e-mail do usu&aacute;rio ser&aacute; adicionado como um parâmetro no final da sua URL de redirecionamento (o redirecionamento vai para o m&oacute;dulo do seu site ou para um formul&aacute;rio jNews externo).<br/>Isto pode ser útil se você deseja executar um script especial na sua p&aacute;gina de redirecionamento.'));
define('_ACA_ADDEMAILREDLINK', compa::encodeutf('Adicionar e-mail para o link de redirecionamento'));

//since 1.6.3
define('_ACA_ITEMID', compa::encodeutf('ID do Item'));
define('_ACA_ITEMID_TIPS', compa::encodeutf('Esta ID do Item ser&aacute; adicionada aos seus links do jNews.'));

//since 1.6.5
define('_ACA_SHOW_JCALPRO', compa::encodeutf('jCalPRO'));
define('_ACA_SHOW_JCALPRO_TIPS', compa::encodeutf('Exibir a aba de integra&ccedil;&atilde;o para o jCalPRO <br/>(somente se o jCalPRO estiver instalado no seu website!)'));
define('_ACA_JCALTAGS_TITLE', compa::encodeutf('jCalPRO Tag:'));
define('_ACA_JCALTAGS_TITLE_TIPS', compa::encodeutf('Copiar e colar esta tag no e-mail onde você deseja que o evento seja inserido.'));
define('_ACA_JCALTAGS_DESC', compa::encodeutf('Descri&ccedil;&atilde;o:'));
define('_ACA_JCALTAGS_DESC_TIPS', compa::encodeutf('Selecione SIM se você deseja inserir a descri&ccedil;&atilde;o do evento'));
define('_ACA_JCALTAGS_START', compa::encodeutf('Data de in&iacute;cio:'));
define('_ACA_JCALTAGS_START_TIPS', compa::encodeutf('Selecione SIM se você deseja inserir a data de in&iacute;cio do evento'));
define('_ACA_JCALTAGS_READMORE', compa::encodeutf('Leia mais:'));
define('_ACA_JCALTAGS_READMORE_TIPS', compa::encodeutf('Selecione SIM se você deseja inserir um <b>link Leia mais</b> para este evento'));
define('_ACA_REDIRECTCONFIRMATION', compa::encodeutf('URL de Redirecionamento'));
define('_ACA_REDIRECTCONFIRMATION_TIPS', compa::encodeutf('Se você exigir um e-mails de confirma&ccedil;&atilde;o, o usu&aacute;rio ser&aacute; confirmado e redirecionado para esta URL se ele clicar no link de confirma&ccedil;&atilde;o.'));

//since 2.0.0 compatibility with Joomla 1.5
if(!defined('_CMN_SAVE') and defined('CMN_SAVE')) define('_CMN_SAVE',CMN_SAVE);
if(!defined('_CMN_SAVE')) define('_CMN_SAVE','Salvar');
if(!defined('_NO_ACCOUNT')) define('_NO_ACCOUNT','Ainda sem conta?');
if(!defined('_CREATE_ACCOUNT')) define('_CREATE_ACCOUNT','Registrar');
if(!defined('_NOT_AUTH')) define('_NOT_AUTH','Você n&atilde;o est&aacute; autorizado a ver este recurso.');

//since 3.0.0

define('_ACA_DISABLETOOLTIP', compa::encodeutf('Desabilitar Dicas'));

define('_ACA_DISABLETOOLTIP_TIPS', compa::encodeutf('Desabilitar as dicas na p&aacute;gina inicial'));

define('_ACA_MINISENDMAIL', compa::encodeutf('Usar o Mini SendMail'));

define('_ACA_MINISENDMAIL_TIPS', compa::encodeutf('Se o seu Servidor usar o Mini SendMail, selecione esta op&ccedil;&atilde;o para n&atilde;o adicionar o nome do usu&aacute;rio no cabe&ccedil;alho do e-mail'));

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