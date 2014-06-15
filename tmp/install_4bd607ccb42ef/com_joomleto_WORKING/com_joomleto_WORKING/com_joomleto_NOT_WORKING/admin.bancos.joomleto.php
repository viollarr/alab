<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

function showBanks(){
    global $database, $mainframe, $mosConfig_list_limit;

    $lists      = array();
    $publish	= mosGetParam( $_REQUEST, 'publish', '1' );
    $publishOpt = array();
    $publishOpt[] = mosHTML::makeOption( '1', 'Publicado');
    $publishOpt[] = mosHTML::makeOption( '0', 'Não Publicado');
    $lists['publish']  = mosHTML::selectList( $publishOpt, 'publish',
                'size="1" class="inputbox"  onChange="document.adminForm.submit();" ', 'value', 'text', $publish );
    //Start Page Navegation
    $limit 		= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );

    //building WHERE statement
     $where[]    = "\n b.bco_published  = '".$publish."' ";  //Filtra por bancos ativos ou não

	$sql = "SELECT COUNT(*) "
		. "\nFROM ".CDBPREFIX."banco AS b"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY b.bco_nome ASC";
	$database->setQuery($sql);
    $total = $database->loadResult();
    require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );
	//End Page Navegation

    $sql = "SELECT b.* "
        . "\nFROM ".CDBPREFIX."banco AS b"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY b.bco_nome ASC"
        . "\nLIMIT $pageNav->limitstart, $pageNav->limit";

    $database->setQuery( $sql );
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$bancos = $database->loadObjectList();
    joomleto_HTML::header();
    joomleto_HTML::showBanks($bancos,$pageNav,$lists);
}
function editBank(&$id){
    global $database, $mainframe,$defaultState,$defaultCity;
    //Get user info
    if ($id != 0){
        $sql = "SELECT b.* "
		      . "\nFROM ".CDBPREFIX."banco AS b"
		      . "\nWHERE b.bco_id  = ".$id;
        $database->setQuery($sql);
        if(!$result = $database->query()) {
            echo $database->stderr();
            return false;
        }
        $user=NULL;
        $database->loadObject($user);
    }
    $lists      = array();
    $publish	= mosGetParam( $_REQUEST, 'publish', '1' );
    $publishOpt = array();
    $publishOpt[] = mosHTML::makeOption( '1', 'Publicado');
    $publishOpt[] = mosHTML::makeOption( '0', 'Não Publicado');
    $lists['publish']  = mosHTML::selectList( $publishOpt, 'publish',
                'size="1" class="inputbox jbinputbox"  onChange="document.adminForm.submit();" ', 'value', 'text', $publish );

    joomleto_HTML::header();
    joomleto_HTML::editBank($user,$lists);
}
function saveBank($option=COMFOLDER) {
	global $database, $my;
	$row = new jleto_banco( $database );
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
	mosRedirect( "index2.php?option=".$option."&task=bancos&mosmsg=Banco+salvo+com+sucesso!" );
}

?>

