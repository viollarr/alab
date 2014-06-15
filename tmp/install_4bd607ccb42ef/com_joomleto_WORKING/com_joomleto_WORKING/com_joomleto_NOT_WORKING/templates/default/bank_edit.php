<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

global $mainframe;
    ?>
      <script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (form.bco_nome.value == ""){
				alert( "Nome não pode ser em branco" );
			} else if (form.bco_numero == ""){
				alert( "O número do banco não pode ser em branco." );
			} else if (form.bco_agencia.value == ""){
				alert( "O número da agência não pode ser em branco." );
            } else if (form.bco_conta.value == ""){
				alert( "O número da conta não pode ser em branco." );
			} else {

				submitform( pressbutton );
			}
		}
		</script>
    <?
        echo '<span class="small">'.JLETO_BANK_EDIT.' bco_id: '.$bank->bco_id.'</span>';
        echo '<form action="index2.php?option='.COMFOLDER.'&task=bancos" method="post" name="adminForm" id="adminForm" jaction="editBank">'
                .'<div class="adminform">
                <fieldset><legend>'.JLETO_BANK_EDIT.'</legend>'
                    .'<label style="display:block">'.JLETO_BANK_ID.': '.$bank->bco_id.'
                    </label>'
                    .'<label>'.JLETO_BANK_NAME.':
                        <input class="inputbox jbinputbox" type="text" name="bco_nome" id="bco_nome" maxlength="100"
                        value="'.$bank->bco_nome.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_NUMBER.':
                        <input class="inputbox jbinputbox" type="text" name="bco_number" id="bco_number" maxlength="100"
                        value="'.$bank->bco_numero.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_AG.':
                        <input class="inputbox jbinputbox" type="text" name="bco_agencia" id="bco_agencia" maxlength="100"
                        value="'.$bank->bco_agencia.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_AG_DV.':
                        <input class="inputbox jbinputbox" type="text" name="bco_ag_dv" id="bco_ag_dv" maxlength="100"
                        value="'.$bank->bco_ag_dv.'"  />
                    </label>'
                    .'<label>'.JLETO_BANK_ACCOUNT.':
                        <input class="inputbox jbinputbox" type="text" name="bco_conta" id="bco_conta" maxlength="100"
                        value="'.$bank->bco_conta.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_ACCOUNT_DV.':
                        <input class="inputbox jbinputbox" type="text" name="bco_conta_dv" id="bco_conta_dv" maxlength="100"
                        value="'.$bank->bco_conta_dv.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_CEDENTE.':
                        <input class="inputbox jbinputbox" type="text" name="bco_cedente" id="bco_cedente" maxlength="100"
                        value="'.$bank->bco_cedente.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_CEDENTE_DV.':
                        <input class="inputbox jbinputbox" type="text" name="bco_cedente_dv" id="bco_cedente_dv" maxlength="100"
                        value="'.$bank->bco_cedente_dv.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_CARTEIRA.':
                        <input class="inputbox jbinputbox" type="text" name="bco_carteira" id="bco_carteira" maxlength="100"
                        value="'.$bank->bco_carteira.'" />
                    </label>'
                    .'<label>'.JLETO_BANK_NOME_ARQUIVO.':
                        <input class="inputbox jbinputbox" type="text" name="bco_nome_arquivo" id="bco_nome_arquivo" maxlength="100"
                        value="'.$bank->bco_nome_arquivo.'" />
                    </label>'
                    .'<label>'.JLETO_PUBLISH.':
                        '.$lists['publish'].'
                    </label>'

                .'</fieldset></div>'
                .'<input type="hidden" name="bco_id" value="'.$bank->bco_id.'" />'
                .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
                .'<input type="hidden" name="task" value="" />'
                .'<input type="hidden" name="hidemainmenu" value="0"> '
            .'</form>';

?>
