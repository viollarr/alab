<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

function showBoletos(){
    global $database, $mainframe, $mosConfig_list_limit;

    $lists      = array();
    //Order to show
    $orderby 	= mosGetParam( $_REQUEST, 'orderby', 'bto.bto_emissao' );
    $ordOpt     = array();
    $ordOpt[]   = mosHTML::makeOption( 'bto.bto_vencimento', 'Vencimento');
    $ordOpt[]   = mosHTML::makeOption( 'bto.bto_emissao', 'Emissão');
    $ordOpt[]   = mosHTML::makeOption( 'bto.bto_valor', 'Valor');
    $ordOpt[]   = mosHTML::makeOption( 'bco.bco_nome', 'Banco');
    $ordOpt[]   = mosHTML::makeOption( 'cli.cli_nome', 'Cliente');
    $ordOpt[]   = mosHTML::makeOption( 'bto.bto_acessos', 'Qtd de acessos');
    $lists['orderby']  = mosHTML::selectList( $ordOpt, 'orderby',
                'size="1" class="inputbox"  onChange="document.adminForm.submit();" ', 'value', 'text', $orderby );
                
    //order to show ASC or DESC
    $direction 	= mosGetParam( $_REQUEST, 'direction', 'DESC' );
    $dirOpt     = array();
    $dirOpt[]   = mosHTML::makeOption( 'ASC', 'Ascendente');
    $dirOpt[]   = mosHTML::makeOption( 'DESC', 'Descendente');
    $lists['direction']  = mosHTML::selectList( $dirOpt, 'direction',
                'size="1" class="inputbox"  onChange="document.adminForm.submit();" ', 'value', 'text', $direction );

    //search keyword
    $search 	= mosGetParam( $_REQUEST, 'search', '' );
	if (get_magic_quotes_gpc()) {
		$search	= stripslashes( $search );
	}
	
	
    //Start Page Navegation
    $limit 		= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );

    //building WHERE statement
    // $where[]    = "\n bco.bco_published  = '".$publish."' ";  //Filtra por bancos ativos ou não
     if ($search) {
		$where[]= "LOWER(cli.cli_nome) LIKE '%" . $database->getEscaped(trim(strtolower($search)))."%'";
	}

	$sql = "SELECT COUNT(*) "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."banco AS bco      ON bto.bco_id = bco.bco_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS ju     ON cli.user_id = ju.id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY ".$orderby." ".$direction;
	$database->setQuery($sql);
    $total = $database->loadResult();
    require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );
	//End Page Navegation

    $sql = "SELECT bto.*, bco.*, cli.*, ju.* "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."banco AS bco      ON bto.bco_id = bco.bco_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN #__users AS ju                  ON cli.user_id = ju.id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY ".$orderby." ".$direction
        . "\nLIMIT $pageNav->limitstart, $pageNav->limit";

    $database->setQuery( $sql );
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$boletos = $database->loadObjectList();
    joomleto_HTML::header();
    joomleto_HTML::showBoletos($boletos,$pageNav,$search,$lists);
}
function editBoleto(&$id, $user_id = ''){
    global $database, $mainframe,$defaultState,$defaultCity;
    //Get user info
    if ($id){
        $sql = "SELECT bto.*, bco.*, cli.*, ju.* "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."banco AS bco      ON bto.bco_id = bco.bco_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN #__users AS ju                 ON cli.user_id = ju.id"
        . "\nWHERE bto.bto_id  = ".$id;
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $boleto=NULL;
        $database->loadObject($boleto);
    }
    $lists      = array();

    //Seleciona os bancos cadastrados
    $sql = "SELECT bco.bco_id, bco.bco_nome "
		. "\nFROM ".CDBPREFIX."banco AS bco";
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $bancos=NULL;
        $bancos = $database->loadObjectList();

    //preenche selectlist com os bancos cadastrados e publicados
    $bankOpt    = array();
    foreach($bancos as $banco){
        $bankOpt[]  = mosHTML::makeOption( $banco->bco_id, $banco->bco_nome);
    }
    $lists['bancos']  = mosHTML::selectList( $bankOpt, 'bco_id',
                'size="1" class="inputbox jbinputbox" id="bco_id"', 'value', 'text', $boleto->bco_id );

    //Seleciona os clientes cadastrados
    //$where[]    = "\n ju.block  = 0";  //Pega apenas usuários do Joomla ativos
    $sql = "SELECT cli.cli_id, cli.cli_nome "
		. "\nFROM ".CDBPREFIX."cliente AS cli"
		//. "\nLEFT JOIN #__users AS ju ON cli.user_id = ju.id"
		. (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY cli.cli_nome ASC";
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $clientes=NULL;
        $clientes = $database->loadObjectList();

    //preenche selectlist com os clientes cadastrados e publicados
    $cliOpt    = array();
    foreach($clientes as $cliente){
        $cliOpt[]  = mosHTML::makeOption( $cliente->cli_id, $cliente->cli_nome);
    }
    $lists['clientes']  = mosHTML::selectList( $cliOpt, 'cli_id',
                'size="1" class="inputbox jbinputbox" id="cli_id"', 'value', 'text', (!$boleto->cli_id ? $user_id : $boleto->cli_id) );

    joomleto_HTML::header();
    joomleto_HTML::editBoleto($boleto,$lists);
}
function saveBoleto($option=COMFOLDER,$bto_id='') {
	global $database, $my;
	$boleto_qtd     = mosGetParam( $_REQUEST, 'boleto_qtd', '1' );          // Joomla! 1.0.X
	$bto_vencimento	= mosGetParam( $_REQUEST, 'bto_vencimento', '1' );

  for($i=1;$i<=$boleto_qtd;$i++){
    $row = new jleto_boleto( $database );
	if ($i>1) //Para mais de um boleto
		$bto_vencimento = date("Y-m-d",mktime (0, 0, 0, date("m",strtotime($bto_vencimento))+1, date("d",strtotime($bto_vencimento)), date("Y",strtotime($bto_vencimento))));
		
	if (!$row->bind( $_POST )) {
 	echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$id = $row->get( 'bto_id' );
	$action = 'link';
	unset($row);
	if(!$bto_id)    // Se for um boleto novo, envia boleto por email automaticamente
		$email_enviado = enviar_boleto(&$id, &$action);
  }
    if(!$bto_id)
        mosRedirect( 'index2.php?option=com_joomleto&task=boletos', $email_enviado);
	else
		mosRedirect( "index2.php?option=".$option."&task=boletos&mosmsg=Boleto+salvo+com+sucesso!" );
}
function gerar_boleto(&$id){
    global $database, $mainframe,$defaultState,$defaultCity;
    //Get user info
        $sql = "SELECT bto.*, bco.*, cli.*, ju.*, ste.*, cty.* "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."banco AS bco      ON bto.bco_id = bco.bco_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN #__users AS ju                 ON cli.user_id = ju.id"
        . "\nLEFT JOIN #__city AS cty                 ON cty.cty_id = cli.cty_id"
        . "\nLEFT JOIN #__state AS ste                ON cty.ste_id = ste.ste_id"
        . "\nWHERE bto.bto_id  = ".$id;
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $boleto=NULL;
        $database->loadObject($boleto);
    joomleto_HTML::gerar_boleto($boleto);
}

function enviar_boleto(&$id, &$action){
    global $mosConfig_live_site,$database;
    global $mosConfig_sitename;
	global $mosConfig_mailfrom, $mosConfig_fromname;
    $sql = "SELECT bto.*, cli.*, ju.* "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN #__users AS ju                 ON cli.user_id = ju.id"
        . "\nWHERE bto.bto_id  = ".$id;
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $email=NULL;
        $database->loadObject($email);
        
        $subject    = "Cobrança para dia: ".date("d-m-Y",strtotime($email->bto_vencimento))."  - $mosConfig_sitename";
        $mode       = 0; // 0 = Plain text; 1 = HTML
        $boletoURL  = $mosConfig_live_site.'/index2.php?option='.COMFOLDER.'&task=gb&id='.$id.'&i=975';
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
                    
       	mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $email->email, $subject, $message, $mode );

       return "Email enviado para $email->username com sucesso!";
}
function deleteBoleto($option, $cid) {
	global $database;

	if (!is_array($cid) || count($cid) < 1) {
		echo "<script> alert('Selecione boletos para excluir'); window.history.go(-1);</script>\n";
		exit();
	}
	
	if (count($cid)){
		$ids = implode(',', $cid);
		$database->setQuery("DELETE FROM ".CDBPREFIX."boleto WHERE bto_id IN ($ids)");
	}
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
	}
	mosRedirect("index2.php?option=$option&task=boletos","Boletos Excluídos!");
}
	
?>

