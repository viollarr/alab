<?php
/* "Joomleto" Component for Joomla! 1.0.x - Version 1.0
	License: 	http://www.gnu.org/copyleft/gpl.html
	Author:		Douglas Machado
	Copyright (c) 2006 - 2007 Focalizar - http://www.Focalizar.com.br
*/

define( '_VALID_MOS', 1 );

require_once('../../../../configuration.php');
require_once($mosConfig_absolute_path.'/includes/database.php');
require_once($mosConfig_absolute_path.'/includes/joomla.php');

if ( $mosConfig_db != "") {
	$database = new database( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );
}
	$now = date( "Y-m-d");  //, mktime (date("H"), date("i"), date("s"), date("m"),  date("d"),  date("Y")))
	
 $sql = "SELECT bto.*, cli.*, ju.* "
		. "\nFROM 		#__jleto_boleto		AS bto"
		. "\nLEFT JOIN	#__jleto_cliente	AS cli	ON bto.cli_id	= cli.cli_id"
		. "\nLEFT JOIN	#__users 			AS ju	ON cli.user_id	= ju.id"
        . "\nWHERE bto.bto_vencimento = '$now'"
		;

    $database->setQuery( $sql );
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$emails = NULL;
	$emails = $database->loadObjectList();
	
	foreach($emails as $email){
	  //$subject    = "Cobrança para dia: ".date("d-m-Y",strtotime($email->bto_vencimento))."  - $mosConfig_sitename";
	  $assunto    = 'Lembrete de cobrança para dia: '.date("d-m-Y",strtotime($email->bto_vencimento)).'  - Focalizar Publicidade';
        $mode       = 0; // 0 = Plain text; 1 = HTML
        $boletoURL  = $mosConfig_live_site.'/index2.php?option=com_joomleto&task=gb&id='.$email->bto_id.'&i=975';
        $message    =   "Prezado(a) $email->cli_nome,"
                    ."\n\n Você adquiriu algum dos serviços ou produtos da Focalizar.com.br, seu pedido já foi cadastrado "
                    ."e já encontra-se disponível no site."
                    ."\n\nMais Informações:"
                    ."\nData de vencimento:". date("d-m-Y",strtotime($email->bto_vencimento))
                    ."\nValor:$email->bto_valor"
                    ."\n\n"
                    ."\nSeu nome de usuário no site:"
                    ."\n$email->username"
                    ."\n\nAbaixo segue o link para imprimir o Boleto:"
                    ."\n$boletoURL"
                    ."\n\nEm caso de dúvida entre em contato conosco através do site\n\n"
					."Atenciosamente,\n\n"
					."Equipe Focalizar\n"
					."47-3429-9355\n"
					."http://Focalizar.com.br - Sua empresa em evidência\n"
					."Para pesquisar na internet use: http://Google.Focalizar.com.br\n"
					."\n\n\n---------------"
                    ."\nEste email foi gerado automaticamente.";

       	mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $email->email, $assunto, $message, $mode );

	}
	
	

?>
