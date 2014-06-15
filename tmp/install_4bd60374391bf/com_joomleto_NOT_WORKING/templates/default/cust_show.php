<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

  global $pathComRel;

        echo '<span class="small">'.JLETO_CUSTOMERS.'</span>';
        echo '<form action="index2.php?option='.COMFOLDER.'&task=clientes" method="post" name="adminForm">';
        echo '<div style="text-align:right;padding:10px">Filtro '
            .'<input type="text" name="search" value="'.htmlspecialchars( $search ).'" class="text_area"
                onChange="document.adminForm.submit();" /> '
            .'Ordenação: '
            .$lists['orderby']
            .'</div>';
        echo '<table class="adminlist"><tbody><tr>'
            .'<th width="5"> # </th>'
            .'<th width="5"> </th>'
            .'<th class="title">'.JLETO_CUST_NAME.'</th>'
            .'<th>'.JLETO_CUST_CITY.'</th>'
            .'<th>'.JLETO_CUST_STATE.'</th>'
            .'<th>'.JLETO_GERAR_BOLETO.'</th>'
            .'<th>'.JLETO_CUST_EMAIL.'</th>'
            .'<th>'.JLETO_CUST_DATE.'</th>'
            .'<th>'.JLETO_CUST_ID.'</th></tr>';
        $rowColor   = 0;
        $rowNumber  = 0;

        foreach ($users as $user){
            $user->registerDate = mosFormatDate($user->registerDate,_CURRENT_SERVER_TIME_FORMAT);
            $checked 	= mosCommonHTML::CheckedOutProcessing( $user, $rowNumber );
            $editCustURL = 'index2.php?option='.COMFOLDER.'&task=editar_clientes&'.($user->cli_id != '' ? 'id='.$user->cli_id : 'juid='.$user->id);
            $makeBoletoURL = 'index2.php?option='.COMFOLDER.'&task=editar_boleto&user_id='.$user->cli_id;
            $makeBoletoIMG = '<img src="'.$pathComRel.'images/gear.gif" alt="'.JLETO_GERAR_BOLETO.'" border="0" />';
            echo '<tr class="row'.$rowColor.'">'
                .'<td>'.++$rowNumber.'</td>'
                .'<td align="center">'.$checked.'</td>'
                .'<td><a href="'.$editCustURL.'" title="'.JLETO_CUST_EDIT.'">'.($user->cli_nome != "" ? $user->cli_nome : $user->name).'</a></td>'
                .'<td align="center">'.$user->cty_name.'</td>'
                .'<td align="center">'.$user->ste_abbr.'</td>'
                .'<td align="center"><a href="'.$makeBoletoURL.'" title="'.JLETO_GERAR_BOLETO.'">'.$makeBoletoIMG.'</a></td>'
                .'<td align="center">'.$user->email.'</td>'
                .'<td align="center">'.$user->registerDate.'</td>'
                .'<td align="center">'.$user->id.'</td>'
                .'</tr>';

                $rowColor = 1 - $rowColor;
        }

        echo '</tbody></table>';
        echo $pageNav->getListFooter();


        echo '<input type="hidden" name="boxchecked" value="0" />'
            .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
            .'<input type="hidden" name="hidemainmenu" value="0">'
            .'<input type="hidden" name="task" value="clientes" />';

        echo '</form>';
?>
