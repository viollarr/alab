<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

   global $mosConfig_live_site;
/* Import the js for our tabs and sliders if needed */
//jimport('joomla.html.pane');  //Joomla 1.5

        echo '<span class="small">'.JLETO_CPANEL.'</span>';
        echo '<table class="adminform"><tr><td class="left"><div id="cpanel">';

        foreach ($menu as $menuItem){
            echo '<div style="float: left;"><div class="icon">';
            echo '<a href="'.$menuItem->menu_link.'" title="'.$menuItem->menu_name.'">';
            echo '<img src="'.PATHCOMREL.$menuItem->menu_img.'" alt="'.$menuItem->menu_name.'" border="0" aling="top" />';
            echo '<span>'.$menuItem->menu_name.'</span>';
            echo '</a></div></div>';
        }

        echo '</div></td><td valign="top">';
       /* $pane   =& JPane::getInstance('sliders');
        $pane->startPane("content-pane");
            $title = 'Comissão a receber';
            $pane->startPanel( $title, "cpanel-panel" );
                echo "Vazio";
            $pane->endPanel();
            $title = 'Histórico';
            $pane->startPanel( $title, "cpanel-panel" );
                echo "Vazio";
            $pane->endPanel();
            $title = 'Clientes em atrazo';
            $pane->startPanel( $title, "cpanel-panel" );
                echo "Vazio";
            $pane->endPanel();
        $pane->endPane();  */
        
        $tabs = new mosTabs(0);
        
        $tabs->startPane("summary");
            $tabs->startTab("A Receber","receber-page");

            $tabs->endTab();
            $tabs->startTab("Em Atraso","em-atraso-page");
                echo overDueBills(); //localzado em general_functions.php
            $tabs->endTab();
        $tabs->endPane("summary");

         echo '</td></tr></table>';
?>
