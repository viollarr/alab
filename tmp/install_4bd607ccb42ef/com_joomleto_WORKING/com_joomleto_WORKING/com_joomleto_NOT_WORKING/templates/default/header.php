<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X


	    global $mainframe, $mosConfig_live_site;
	    // Append StyleSheeet (CSS)        // Adiciona folha de estilos (CSS)
        $mainframe->addCustomHeadTag('<link rel="stylesheet" type="text/css" href="'.PATHCOMREL.'css/template.css" />' );
        echo '<link rel="stylesheet" type="text/css" href="'.PATHCOMREL.'css/template.css" />';
        // Require language file           // Requer o arquivo de idioma
        echo '<br /><div class="componentheading"><a title="'.JLETO_TITLE.'" href="index2.php?option='.COMFOLDER.'">'.JLETO_TITLE.'</a></div>';


?>
