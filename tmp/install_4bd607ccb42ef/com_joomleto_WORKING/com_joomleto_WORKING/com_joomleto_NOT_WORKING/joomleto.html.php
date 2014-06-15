<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X


class joomleto_HTML {
   function gerar_boleto(&$boleto){
        global $pathCom, $pathComRel;
        require_once($pathCom.'gerar_boleto.php');
    }
}
?>

