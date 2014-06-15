<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

function overDueBills(){
    global $database, $mainframe, $mosConfig_list_limit;

    $now 		= _CURRENT_SERVER_TIME;
    
     //Start Page Navegation
    $limit 		= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	
    $where[]= "bto.bto_vencimento < ".$database->Quote($now);
    $where[]= "bto.bto_valor > bto.bto_valor_liquidado";
    $sql = "SELECT  COUNT(*) " //
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."banco AS bco      ON bto.bco_id = bco.bco_id"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
        . "\nGROUP BY bto.bto_vencimento"
		. "\nORDER BY bto.bto_vencimento";
	$database->setQuery($sql);
    $totais = $database->loadResult();
    require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $totais, $limitstart, $limit  );
	//End Page Navegation
	
	 $sql = "SELECT  SUM(bto.bto_valor) " //
		. "\nFROM ".CDBPREFIX."boleto AS bto"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
        . "\nGROUP BY bto.bto_valor";
	$database->setQuery($sql);
    $total = $database->loadResult();
    

    $sql = "SELECT bto.*, cli.*, ju.* "
		. "\nFROM ".CDBPREFIX."boleto AS bto"
		. "\nLEFT JOIN ".CDBPREFIX."cliente AS cli    ON bto.cli_id = cli.cli_id"
		. "\nLEFT JOIN #__users AS ju                  ON cli.user_id = ju.id"
        . (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "")
        . "\nORDER BY bto.bto_vencimento"
        . "\nLIMIT $pageNav->limitstart, $pageNav->limit";
    $database->setQuery( $sql );
	if(!$result = $database->query()) {
		echo $database->stderr();
		return false;
	}
	$atrasos = $database->loadObjectList();
	
	$html   = '<form action="index2.php?option='.COMFOLDER.'" method="post" name="adminForm">';

    $html   .= '<table class="adminlist"><tbody>'
            .'<tr>'
            .'<th width="5"> # </th>'
            .'<th class="title">'.JLETO_CUST_NAME.'</th>'
            .'<th class="title">'.JLETO_BOLETO_VENCIMENTO.'</th>'
            .'<th width="5">'.JLETO_BOLETO_VALOR.'</th>'
            .'</tr>';
    foreach($atrasos as $atraso){
        $html   .= '<tr><td></td>'
                .'<td>'.$atraso->cli_nome.'</td>'
                .'<td>'.$atraso->bto_vencimento.'</td>'
                .'<td>'.$atraso->bto_valor.'</td>'
                .'</tr>';
    }
    $html   .= '<tr style="font-weight:bolder"><td></td>'
        .'<td>'.JLETO_BOLETO_VALOR.' Total</td>'
        .'<td></td>'
        .'<td>'.$total.'</td>'
        .'</tr>';
                
    $html   .= '</tbody></table>';
    $html   .= $pageNav->getListFooter();
    $html   .= '<form>';
    
    return $html;

	
}
?>
