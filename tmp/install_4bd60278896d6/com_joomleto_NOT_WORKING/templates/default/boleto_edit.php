<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

global $mainframe;
$boleto_valor_padrao = '60.00';


    mosCommonHTML::loadCalendar();
    // Append JavaScript File
        //$mainframe->addCustomHeadTag('<script language="JavaScript" src="'.PATHCOMREL.'js/joomlaFormValidator.js" type="text/javascript"></script>' );
        ?>
      <script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			//if (form.bto_nosso_numero.value == ""){
			//	alert( "Nosso número não pode ser em branco" );
			//} else
			if (form.bto_valor.value == ""){
				alert( "O valor não pode ser em branco." );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
    <?
        echo '<span class="small">'.JLETO_BOLETO_EDIT.' bto_id: '.$boleto->bto_id.'</span>';
        echo '<form action="index2.php?option="'.COMFOLDER.' method="post" name="adminForm" id="adminForm" jaction="editBoleto">'
                .'<div class="adminform">
                <fieldset><legend>'.JLETO_BOLETO_EDIT.'</legend>'
                    .'<label>'.JLETO_CUST_NAME.':'
                        .$lists['clientes']
                    .'</label>'
                    .'<label>'.JLETO_BANK_NAME.':'
                        .$lists['bancos']
                    .'</label>'
                    .'<label>'.JLETO_BOLETO_NOSSO_NUMERO.':
                        <input class="inputbox jbinputbox" type="text" name="bto_nosso_numero" id="bto_nosso_numero" maxlength="100"
                        value="'.$boleto->bto_nosso_numero.'" />
                    </label>'
                    .'<label>'.JLETO_BOLETO_NUMERO_DOC.':
                        <input class="inputbox jbinputbox" type="text" name="bto_numero_doc" id="bto_numero_doc" maxlength="100"
                        value="'.$boleto->bto_numero_doc.'"  />
                    </label>'
                    .'<label>'.JLETO_BOLETO_EMISSAO.':<br />
                        <input class="inputbox" type="text" name="bto_emissao" id="bto_emissao" maxlength="100"
                        value="'.($boleto->bto_emissao > 0 ? $boleto->bto_emissao :
                                date( "Y-m-d H:i:s", mktime (date("H"), date("i"), date("s"), date("m"),  date("d"),  date("Y")))).'" />
                        <input name="reset" type="reset" class="button" onclick="return showCalendar(\'bto_emissao\', \'y-mm-dd\');" value="..." /><br />
                    </label>'
                    .'<label>'.JLETO_BOLETO_VENCIMENTO.':<br />
                        <input class="inputbox" type="text" name="bto_vencimento" id="bto_vencimento" maxlength="100"
                        value="'.($boleto->bto_vencimento > 0 ? $boleto->bto_vencimento :
                               date( "Y-m-d H:i:s", mktime (0, 0, 0, date("m")+1,  date("d"),  date("Y")))).'" />
                        <input name="reset" type="reset" class="button" onclick="return showCalendar(\'bto_vencimento\', \'y-mm-dd\');" value="..." /><br />
                    </label>'
                    .'<label>'.JLETO_BOLETO_VALOR.':
                        <input class="inputbox jbinputbox" type="text" name="bto_valor" id="bto_valor" maxlength="100"
                        value="'.($boleto->bto_valor ? $boleto->bto_valor : $boleto_valor_padrao).'" />
                    </label>';
if(!$boleto->bto_id){
            $boletos = array();
            for($bi=1;$bi<13;$bi++){
				$boletos[] = mosHTML::makeOption( $bi, $bi);
			}
			echo '<label for="boleto_qtd">Quantidade:'.
				mosHTML::selectList( $boletos, 'boleto_qtd', 'size="1" class="inputbox jbinputbox"', 'value', 'text', 1 ).'</label>';
}
                    echo '<label>'.JLETO_BOLETO_LIQUIDADO.':
                        <input class="inputbox jbinputbox" type="text" name="bto_valor_liquidado" id="bto_valor_liquidado" maxlength="100"
                        value="'.$boleto->bto_valor_liquidado.'" />
                    </label>'
					.'<label>'.JLETO_BOLETO_COMETARIO.':
                        <textarea class="inputbox jbinputbox" type="text" name="bto_comentario" id="bto_comentario"  >
                        '.$boleto->bto_comentario.'
                        </textarea>
                    </label>'
                    .($boleto->bto_acessos ? '<label>'.JLETO_BOLETO_ACESSOS.':</label>
                        <span class="jbinputbox">'.$boleto->bto_acessos.'</span>': '')
                .'</fieldset></div>'
                .'<input type="hidden" name="bto_id" value="'.$boleto->bto_id.'" />'
                .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
                .'<input type="hidden" name="task" value="" />'
                .'<input type="hidden" name="hidemainmenu" value="0"> '
            .'</form>';

?>
