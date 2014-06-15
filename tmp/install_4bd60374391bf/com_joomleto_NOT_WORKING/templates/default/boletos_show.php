<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

global $pathComRel,$mosConfig_live_site;

        echo '<span class="small">'.JLETO_BOLETOS.'</span>';
        echo '<form action="index2.php?option='.COMFOLDER.'&task=boletos" method="post" name="adminForm">';
        echo '<div style="text-align:right;padding:10px">Filtro '
            .'<input type="text" name="search" value="'.htmlspecialchars( $search ).'" class="text_area"
                onChange="document.adminForm.submit();" /> '
            .'Ordenação: '
            .$lists['orderby']
            .$lists['direction']
            .'</div>';
        echo '<table class="adminlist"><tbody><tr>'
            .'<th width="5"> # </th>'
            .'<th width="5"> </th>'
            .'<th class="title">'.JLETO_CUST_NAME.'</th>'
            .'<th>'.JLETO_BANK_NAME.'</th>'
            .'<th>'.JLETO_CUST_EMAIL.'</th>'
            .'<th rowspan="1"><table width="100%"><tr><td colspan=2  align="center">'.JLETO_CUST_SEND_EMAIL.'</td></tr>
                    <tr><td align="center">Link</td><td  align="center">PDF</td></tr></table></th>'
            .'<th>'.JLETO_BOLETO_VER.'</th>'
            .'<th>'.JLETO_BOLETO_EMISSAO.'</th>'
            .'<th>'.JLETO_BOLETO_VENCIMENTO.'</th>'
            .'<th>'.JLETO_BOLETO_VALOR.'</th>'
            .'<th>'.JLETO_BOLETO_LIQUIDADO.'</th>'
            .'<th>'.JLETO_BOLETO_DEBITO.'</th>'
            .'<th>'.JLETO_BOLETO_ACESSOS.'</th>'
            .'</tr>';
        $rowColor   = 0;
        $rowNumber  = 0;

        foreach ($boletos as $boleto){
            //$checked 	= mosCommonHTML::CheckedOutProcessing( $boleto->bto_id, $rowNumber );
            $checked 		= mosHTML::idBox( $rowNumber, $boleto->bto_id, false, 'cid' ) ;
            $editBoletoURL  = 'index2.php?option='.COMFOLDER.'&task=editar_boleto&id='.$boleto->bto_id;
            $sendBtoUrlLINK = 'index2.php?option='.COMFOLDER.'&task=enviar_boleto&id='.$boleto->bto_id.'&action=link';
            $sendBtoImgLINK = '<img src="'.$pathComRel.'images/email.png" alt="'.JLETO_CUST_SEND_EMAIL.'" border="0" />';
            $sendBtoUrlPDF  = 'index2.php?option='.COMFOLDER.'&task=enviar_boleto&id='.$boleto->bto_id.'&action=pdf';
            $sendBtoImgPDF  = '<img src="'.$pathComRel.'images/pdf.png" alt="'.JLETO_CUST_SEND_EMAIL.'" border="0" />';
            $viewBtoUrl     = $mosConfig_live_site.'/index2.php?option='.COMFOLDER.'&task=gerar_boleto&id='.$boleto->bto_id.'&increment=0';
            $viewBtoImg     = '<img src="'.$pathComRel.'images/visit.gif" alt="'.JLETO_BOLETO_VER.'" border="0" />';
            $debito          = ($boleto->bto_valor - $boleto->bto_valor_liquidado);
            if( $debito == 0)
                $paid       = 1;
            else if($debito < 0){  /*se pagou mais do que devia  */
                $overPaid   = 1;
                $paid       = 1;
            }else{
                $paid       = 0;
                $overPaid   = 0;
            }

            echo '<tr class="row'.$rowColor.'">'
                .'<td>'.++$rowNumber.'</td>'
                .'<td align="center">'.$checked.'</td>'
                .'<td><a href="'.$editBoletoURL.'" title="'.JLETO_BOLETO_EDIT.'">'.$boleto->cli_nome.'</a></td>'
                .'<td align="center">'.$boleto->bco_nome.'</td>'
                .'<td align="center">'.$boleto->email.'</td>'
                .'<td align="center">'.(!$paid ? '<table width="100%" style="border:0;padding:0;margin:0"><tr>'
                    .'<td align="center" style="border:0;padding:0;margin:0">
                        <a href="'.$sendBtoUrlLINK.'" title="'.JLETO_CUST_SEND_EMAIL.': Link">'.$sendBtoImgLINK.'</a></td>'
                    .'<td align="center" style="border:0;padding:0;margin:0">
                        <a href="'.$sendBtoUrlPDF.'" title="'.JLETO_CUST_SEND_EMAIL.': PDF">'.$sendBtoImgPDF.'</a></td>'
                .'</tr></table>' : 'PAGO').'</td>'
                .'<td align="center">'.
                    (!$paid ? '<a onclick="window.open(\''.$viewBtoUrl.'\',\'win2\',\'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=yes,resizable=yes,width=800,height=500,directories=no,location=no\'); return false;"
                     href="'.$viewBtoUrl.'" target="_blank" title="'.JLETO_BOLETO_VER.'">'.$viewBtoImg.'</a>': ' - ').'</td>'
                .'<td align="center">'.mosFormatDate($boleto->bto_emissao,'%d-%m-%Y', '0' ).'</td>'
                .'<td align="center">'.mosFormatDate($boleto->bto_vencimento,'%d-%m-%Y').'</td>'
                .'<td align="center">'.$boleto->bto_valor.'</td>'
                .'<td align="center">'.$boleto->bto_valor_liquidado.'</td>'
                .'<td align="center" '.
                        ((!$paid) ? 'style="color:#C63110;' : ($overPaid ? 'style="color:#316AC5;' : '') ).'font-weight:bolder">'.$debito.'</td>'
                .'<td align="center">'.$boleto->bto_acessos.'</td>'
                .'</tr>';

                $rowColor = 1 - $rowColor;
        }

        echo '</tbody></table>';
        echo $pageNav->getListFooter();

        echo '<input type="hidden" name="boxchecked" value="0" />'
            .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
            .'<input type="hidden" name="hidemainmenu" value="0">'
            .'<input type="hidden" name="task" value="boletos" />';

        echo '</form>';

?>
