<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X


class joomleto_HTML {
	function header() {
        global $comTemplate;
        require_once($comTemplate.'/header.php');
    }
	function buildCpanel(&$menu){
        global $comTemplate;
        require_once($comTemplate.'/general_functions.php');
        require_once($comTemplate.'/cpanel_build.php');
	}
	function help(){
	    global $comTemplate;
        require_once($comTemplate.'/help.php');
    }
    function showConfig(){
        global $comTemplate;
        require_once($comTemplate.'/config_show.php');
    }
    function showCust(&$users,&$pageNav,&$search,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/cust_show.php');
    }
    function editCust(&$user,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/cust_edit.php');
    }
    function showBoletos(&$boletos,&$pageNav,&$search,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/boletos_show.php');
    }
    function editBoleto(&$boleto,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/boleto_edit.php');
    }
/* */
    function gerar_boleto(&$boleto){
        global $pathComRel;
        require_once($pathCom.'gerar_boleto.php');
    }

    function showBanks(&$banks,&$pageNav,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/bank_show.php');
    }
    function editBank(&$bank,&$lists){
        global $comTemplate;
        require_once($comTemplate.'/bank_edit.php');
    }
}
?>

