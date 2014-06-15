<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

function showCust(){
    global $database, $mainframe, $mosConfig_list_limit;

    $lists      = array();
    //Order to show
    $orderby 	= mosGetParam( $_REQUEST, 'orderby', 'bu.cli_nome' );
    $ordOptions = array();
    $ordOptions[] = mosHTML::makeOption( 'ju.name', 'Nome do Usuário');
    $ordOptions[] = mosHTML::makeOption( 'jcity.cty_name', 'Cidade');
    $ordOptions[] = mosHTML::makeOption( 'js.ste_name', 'Estado');
    $lists['orderby']  = mosHTML::selectList( $ordOptions, 'orderby',
                'size="1" class="inputbox"  onChange="document.adminForm.submit();" ', 'value', 'text', $orderby );
    
    //search keyword
    $search 	= mosGetParam( $_REQUEST, 'search', '' );
	if (get_magic_quotes_gpc()) {
		$search	= stripslashes( $search );
	}
	
    //Start Page Navegation
    $limit 		= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	
	//building WHERE statement
   // $where[]    = "\n ju.block  = 0";  //Pega apenas usuários do Joomla ativos
    if ($search) {
		$where[]= "LOWER(bu.cli_nome) LIKE '%" . $database->getEscaped(trim(strtolower($search)))."%'";
	}
    
	$sql = "SELECT COUNT(*) "
		. "\nFROM ".CDBPREFIX."cliente AS bu"
		. "\nLEFT JOIN #__city AS jcity ON bu.cty_id = jcity.cty_id"
		. "\nLEFT JOIN #__state AS js ON jcity.ste_id = js.ste_id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY ".$orderby." ASC";
	$database->setQuery($sql);
    $total = $database->loadResult();
    require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );
	//End Page Navegation

    $sql = "SELECT  bu.*, jcity.*,js.* "
		. "\nFROM ".CDBPREFIX."cliente AS bu"
		. "\nLEFT JOIN #__city AS jcity ON bu.cty_id = jcity.cty_id"
		. "\nLEFT JOIN #__state AS js ON jcity.ste_id = js.ste_id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY ".$orderby." ASC"
        . "\nLIMIT $pageNav->limitstart, $pageNav->limit";

/*SQL PARA MOSTRAR A QUATIDADE DE BOLETOS NÃO ESTÁ FUNCIONANDO

$sql = "SELECT ju.*, bu.*, jcity.*,js.*,        count(jb.cli_id) as qtd_boleto  "     //Adição no SQL ACIMA!
		. "\nFROM ".CDBPREFIX."cliente AS bu"
		. "\nRIGHT JOIN #__users AS ju ON bu.user_id = ju.id"
		. "\nLEFT JOIN #__city AS jcity ON bu.cty_id = jcity.cty_id"
		. "\nLEFT JOIN #__state AS js ON jcity.ste_id = js.ste_id"
		. "\nLEFT JOIN ".CDBPREFIX."boleto AS jb ON jb.cli_id = bu.cli_id"                 //Adição no SQL ACIMA!
		. "\nWHERE ju.block  = 0"  //Pega apenas usuários do Joomla ativos
		. "\nGROUP BY bu.cli_nome"                                                         //Adição no SQL ACIMA!
		. "\nORDER BY ju.name ASC";
         */
	//$database->setQuery( $sql, $pageNav->limitstart, $pageNav->limit );              //doesn't work for some reason unknow to me
	$database->setQuery( $sql );
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$users = $database->loadObjectList();
    joomleto_HTML::header();
    joomleto_HTML::showCust($users,$pageNav,$search,$lists);
}
function editCust(&$id, &$juid){
    global $database, $mainframe,$defaultState,$defaultCity;
    //Get user info
    if ($id != 0){
        $sql = "SELECT bu.*, jcity.cty_id,js.ste_id "
		      . "\nFROM ".CDBPREFIX."cliente AS bu"
		      . "\nLEFT JOIN #__city AS jcity ON bu.cty_id = jcity.cty_id"
		      . "\nLEFT JOIN #__state AS js ON jcity.ste_id = js.ste_id"
		      . "\nWHERE bu.cli_id  = ".$id;
    }else{
        $sql = "SELECT ju.*, bu.*, jcity.*,js.* "
		      . "\nFROM ".CDBPREFIX."cliente AS bu"
		      . "\nRIGHT JOIN #__users AS ju ON bu.user_id = ju.id"
		      . "\nLEFT JOIN #__city AS jcity ON bu.cty_id = jcity.cty_id"
		      . "\nLEFT JOIN #__state AS js ON jcity.ste_id = js.ste_id"
		      . "\nWHERE ju.id  = ".$juid
		      . "\nORDER BY ju.name ASC";
    }

    $database->setQuery($sql);
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
    $user=NULL;
	$database->loadObject($user);

	$lists         = array();
	//Build States dropdown menu
	$sql    = "SELECT * FROM #__state WHERE ctry_id = '1' ORDER BY ste_name";
    $database->setQuery($sql);
	$jos_states    = $database->loadObjectList();
    $joptions = array();
    foreach($jos_states as $state){
        $joptions[] = mosHTML::makeOption($state->ste_id , $state->ste_name);
    }
	$lists['state']=  mosHTML::selectList( $joptions, 'ste_id', 'size="1" class="inputbox jbinputbox"', 'value', 'text',
                     ($user->ste_id != '' ? $user->ste_id : $defaultState));
	   //Build cities dropdown menu  from current state
        $sql    = "SELECT * FROM #__city WHERE ste_id = ".($user->ste_id != '' ? $user->ste_id : $defaultState)." ORDER BY cty_name";
        $database->setQuery($sql);
        $jos_cities    = $database->loadObjectList();
        $joptions = array();
        foreach($jos_cities as $city){
            $joptions[] = mosHTML::makeOption($city->cty_id , $city->cty_name);
        }
	   $lists['city']=  mosHTML::selectList( $joptions, 'cty_id', 'size="1" class="inputbox jbinputbox"', 'value', 'text',
                        ($user->cty_id != '' ? $user->cty_id : $defaultCity) );


    joomleto_HTML::header();
    joomleto_HTML::editCust($user,$lists);
}
function saveCliente($option=COMNAME) {
	global $database, $my;

	$row = new jleto_cliente( $database );
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
	mosRedirect( "index2.php?option=".COMNAME."&task=clientes&mosmsg=Cliente+salvo+com+sucesso" );
}

function importMtree($id,$link_id) {
	global $database, $my;
	$sql = "SELECT bu.*"
		      . "\nFROM ".CDBPREFIX."cliente AS bu"
		      . "\nRIGHT JOIN #__users AS ju ON bu.user_id = ju.id"
		      . "\nWHERE ju.id  = '".$id."'"
		      . "\nORDER BY ju.name ASC";

	$database->setQuery($sql);
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
    $user=NULL;
	$database->loadObject($user);
	
	if(!$user->cli_id){ // Se não houver usuário no Joomleto então:

		//tabela
		$tabela = '#__mt_links';

		//campos na tabela jos_mt_links
		$cnpj 	= 'cust_10';
		$ie     = 'cust_11';
		$endereco= 'address';
		$bairro = 'cust_1';
		$cep    = 'postcode';
		$estado = 'state';
		$cidade = 'city';
		$nome   = 'link_name';

        //pega codigo do estado
		$sql = "SELECT js.ste_id"
		      . "\nFROM #__state AS js"
		      . "\nRIGHT JOIN ".$tabela." AS ps ON js.ste_name = ps.".$estado
		      . "\nWHERE ps.link_id  = '".$link_id."'";

		$database->setQuery($sql);
		if(!$result = $database->query()) {
			echo $database->stderr();
			return false;
		}
    	$estado=NULL;
		$database->loadObject($estado);
		
		//pega codigo da cidade
		$sql = "SELECT js.cty_id"
		      . "\nFROM #__city AS js"
		      . "\nRIGHT JOIN ".$tabela." AS ps ON js.cty_name = ps.".$cidade
		      . "\nWHERE ps.link_id  = '".$link_id."' AND js.ste_id = '".$estado->ste_id."'";

		$database->setQuery($sql);
		if(!$result = $database->query()) {
			echo $database->stderr();
			return false;
		}
    	$cidade=NULL;
		$database->loadObject($cidade);

		$sql = "SELECT ".$cnpj." AS cnpj, ".$ie." AS ie, ".$endereco." AS endereco, ".$bairro." AS bairro, ".$cep." AS cep, ".$nome." AS nome "
		      . "\nFROM ".$tabela
		      . "\nWHERE link_id  = '".$link_id."'";

		$database->setQuery($sql);
		if(!$result = $database->query()) {
			echo $database->stderr();
			return false;
		}
    	$info=NULL;
		$database->loadObject($info);
		
		
		$user = new stdClass;
  		$user->cli_id	= NULL;
  		$user->cty_id	= $cidade->cty_id;
  		$user->user_id	= $id;
  		$user->cli_nome = $info->nome;
  		$user->cli_end	= $info->endereco;
  		$user->cli_bairro= $info->bairro;
  		$user->cli_cep	= str_replace("-", "",str_replace(".", "",str_replace(" ", "",$info->cep)));
  		$user->cli_cnpj	= str_replace("-", "",str_replace("/", "",str_replace(" ", "",$info->cnpj)));
  		$user->cli_ie	= $info->ie;
  		
  		if (!$database->insertObject( CDBPREFIX.'cliente', $user, 'cli_id',true )) {
			echo $database->stderr();
			return false;
		}
	}
//	mosRedirect( "index2.php?option=".COMNAME."&task=editar_boleto&id=&user_id=".$user->cli_id );
  return $user->cli_id;

}

?>

