<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

/* Component Name  */
define('COMNAME', 'com_joomleto');
/* Component DataBase PREFIX*/
define('CDBPREFIX', '#__jleto_');

$pathCom    = $GLOBALS['mosConfig_absolute_path'] . '/administrator/components/'.COMNAME.'/';
$pathFront    = $GLOBALS['mosConfig_absolute_path'] . '/components/'.COMNAME.'/';
$pathComRel = $GLOBALS['mosConfig_live_site']   .   '/administrator/components/'.COMNAME.'/';

/*if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', COMNAME ))) {
 mosRedirect( 'index2.php', _NOT_AUTH );
}     */

// require the html view class
//jimport('joomla.application.helper');                 // Joomla! 1.5
//require_once (JApplicationHelper :: getPath('html', COMNAME));  // Joomla! 1.5

require_once($pathFront.'joomleto.html.php'); // Joomla! 1.0.X

//$task = JRequest::getVar('task');                     // Joomla! 1.5
$task   = mosGetParam( $_REQUEST, 'task', '' );           // Joomla! 1.0.X
$id     = mosGetParam( $_REQUEST, 'id', '' );
switch ($task) {
	case 'gerar_boleto':
    case 'gb':
            gerar_boleto($id);
	break;

}

// ## FUNCTIONS

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
?>

