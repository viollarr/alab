<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

 global $mosConfig_live_site;

        echo '<span class="small">'.JLETO_BANKS.'</span>';
        echo '<form action="index2.php?option='.COMFOLDER.'&task=bancos" method="post" name="adminForm">';
        echo '<div style="text-align:right;padding:10px">Filtro '
            .$lists['publish']
            .'</div>';
        echo '<table class="adminlist"><tbody><tr>'
            .'<th width="5"> # </th>'
            .'<th width="5"> </th>'
            .'<th class="title">'.JLETO_BANK_NAME.'</th>'
            .'<th>'.JLETO_BANK_AG.'</th>'
            .'<th>'.JLETO_BANK_ACCOUNT.'</th>'
            .'<th>'.JLETO_BANK_CARTEIRA.'</th>'
            .'<th>'.JLETO_BANK_CEDENTE.'</th>'
            .'<th>'.JLETO_PUBLISH.'</th></tr>';
        $rowColor   = 0;
        $rowNumber  = 0;

        foreach ($banks as $bank){
            $checked 	= mosCommonHTML::CheckedOutProcessing( $bank, $rowNumber );
            $editBankURL =  'index2.php?option='.COMFOLDER.'&task=editar_banco&id='.$bank->bco_id;
            $img    =   ($bank->bco_published ? 'tick.png' : 'publish_x.png');
            $alt    =   ($bank->bco_published ? 'Publicado' : 'Não Publicado');
            $publishURL = '<a href="javascript: void(0);"
                    onclick="return listItemTask(\'cb'.$rowNumber.'\','. ($bank->published ? "'unpublish'" : "'publish'").')">
					<img src="images/'.$img.'" width="12" height="12" border="0" alt="'.$alt.'" />
					</a>';

            echo '<tr class="row'.$rowColor.'">'
                .'<td>'.++$rowNumber.'</td>'
                .'<td align="center">'.$checked.'</td>'
                .'<td><a href="'.$editBankURL.'" title="'.JLETO_BANK_EDIT.'">'.$bank->bco_nome.'</a></td>'
                .'<td align="center">'.$bank->bco_agencia. ($bank->bco_ag_dv != 0 ? '-'.$bank->bco_ag_dv : '' ).'</td>'
                .'<td align="center">'.$bank->bco_conta.($bank->bco_conta_dv != 0 ? '-'.$bank->bco_conta_dv : '' ).'</td>'
                .'<td align="center">'.$bank->bco_carteira.'</td>'
                .'<td align="center">'.$bank->bco_cedente.($bank->bco_cedente_dv != 0 ? '-'.$bank->bco_cedente_dv : '' ).'</td>'
                .'<td align="center">'.$publishURL.'</td>'
                .'</tr>';

                $rowColor = 1 - $rowColor;
        }

        echo '</tbody></table>';
        echo $pageNav->getListFooter();

        echo '<input type="hidden" name="boxchecked" value="0" />'
            .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
            .'<input type="hidden" name="hidemainmenu" value="0">'
            .'<input type="hidden" name="task" value="" />';

        echo '</form>';

?>
