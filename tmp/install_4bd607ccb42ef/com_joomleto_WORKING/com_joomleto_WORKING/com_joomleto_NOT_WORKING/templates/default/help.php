<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

global $pathComRel;
        echo '<span class="small">'.JLETO_HELP.'</span>';
        echo '<div class="adminform">'.JLETO_DESC.'<br />'.JLETO_GET_HELP.'</div>'
            .'<div style="text-align:center">'
                .'<iframe frameborder=no style="width:80%" src="'.$pathComRel.'help/screen.joomleto.html" height="500"></iframe></div>';



?>
