<?php
// no direct access
global $mosConfig_absolute_path, $mosConfig_live_site,$mosConfig_alang;
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

/* Component Folder  */
define('COMFOLDER', 'com_joomleto');
/* Component Name  */
define('COMNAME', 'joomleto');
/* Component DataBase PREFIX*/
define('CDBPREFIX', '#__jleto_');
define('PATHCOM',$mosConfig_absolute_path . '/administrator/components/'.COMFOLDER.'/');
define('PATHCOMREL', $mosConfig_live_site   .   '/administrator/components/'.COMFOLDER.'/');
$pathCom    = $mosConfig_absolute_path . '/administrator/components/'.COMFOLDER.'/';
$pathComRel = $mosConfig_live_site   .   '/administrator/components/'.COMFOLDER.'/';
$comTemplate	= $pathCom.'templates/default';
$defaultState   = '24';    // 24 = Santa Catarina
$defaultCity    = '8278';    // 8278 = Joinville replace with '0' for no selected city

if( file_exists ($pathCom.'languages/'.$mosConfig_alang.'.php'))
    require_once($pathCom.'languages/'.$mosConfig_alang.'.php');
else
    require_once($pathCom.'languages/english.php');
/*if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', COMFOLDER ))) {
 mosRedirect( 'index2.php', _NOT_AUTH );
}     */

// require the html view class
//jimport('joomla.application.helper');                 // Joomla! 1.5
//require_once (JApplicationHelper :: getPath('html', COMFOLDER));  // Joomla! 1.5

//require_once($mainframe->getPath('html',COMFOLDER)); // Joomla! 1.0.X    //error???? and don't know why!
require_once($pathCom.'admin.'.COMNAME.'.html.php'); // Joomla! 1.0.X
require_once($mainframe->getPath('class'));
require_once($pathCom.'admin.cliente.'.COMNAME.'.php');
require_once($pathCom.'admin.bancos.'.COMNAME.'.php');
require_once($pathCom.'admin.boletos.'.COMNAME.'.php');

//$task = JRequest::getVar('task');                     // Joomla! 1.5
//$action = JRequest::getVar('action');                 // Joomla! 1.5
$id     = mosGetParam( $_REQUEST, 'id', '0' );          // Joomla! 1.0.X
$task   = mosGetParam( $_REQUEST, 'task', '' );         // Joomla! 1.0.X
$action = mosGetParam( $_REQUEST, 'action', '' );       // Joomla! 1.0.X
$juid   = mosGetParam( $_REQUEST, 'juid', '0' );        // Joomla! 1.0.X
$cid 	= mosGetParam( $_POST, 'cid', array(0) );
//$show   = mosGetParam( $_REQUEST, 'show', 'link' );     // para uso quando $task = 'enviar_boleto';
switch ($task) {
    case 'help':
        showHelp();
	break;
	case 'config':
        showConfig();
	break;
	case 'saveCliente':
        saveCliente();
	break;
	case 'editar_clientes':
            editCust($id,$juid);
	break;
	case 'clientes':
            showCust();
	break;
	case 'bancos':
            showBanks();
	break;
	case 'editar_banco':
            editBank($id);
	break;
	case 'saveBank':
        saveBank();
	break;
	case 'boletos':
            showBoletos();
	break;
	case 'editar_boleto':
            editBoleto($id,mosGetParam( $_REQUEST, 'user_id', '' ));
	break;
/* */
	case 'enviar_boleto':
            enviar_boleto($id, $action);
	break;
	case 'deleteBoleto':
            deleteBoleto($option, $cid);
	break;
	case 'saveBoleto':
        saveBoleto($option,mosGetParam( $_REQUEST, 'bto_id', '' ));
	break;
	case 'importMtree':
        	editBoleto($id,importMtree($id,mosGetParam( $_REQUEST, 'link_id', '' )));
	break;
	case 'show':
	default:
        showFront();
	break;
}

// ## FUNCTIONS

function showFront(){
    global $database, $mainframe;
//TODO: USER CHECK - menu_access
    $sql = "SELECT j.* "
		. "\nFROM ".CDBPREFIX."menu AS j"
		. "\nWHERE j.menu_publish = 1"
		. "\nORDER BY j.menu_ordering ASC";
	$database->setQuery($sql);

	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$menu = $database->loadObjectList();

    joomleto_HTML::header();
    joomleto_HTML::buildCpanel($menu);
}

function showHelp($helpPage = ''){
    joomleto_HTML::header();
     joomleto_HTML::help();
}
function showConfig(){
    joomleto_HTML::header();
     joomleto_HTML::showConfig();
}

?>

