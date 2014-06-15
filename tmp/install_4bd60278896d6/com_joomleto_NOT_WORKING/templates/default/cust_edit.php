<?php
// no direct access
//defined('_JEXEC') or die('Restricted access');        // Joomla! 1.5
defined( '_VALID_MOS' ) or die( 'Restricted access.' ); // Joomla! 1.0.X

global $mainframe;
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

			// do field validation
			if (form.cli_cnpj.value == ""){
				alert( "CNPJ não pode ser em branco." );
			} else if (form.cli_end.value == ""){
				alert( "Preencher o endereço." );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
    <?
        echo '<span class="small">'.JLETO_CUST_EDIT.' cli_id: '.$user->cli_id.'</span>';
        echo '<form action="index2.php" method="post" name="adminForm" id="adminForm" jaction="editCust">'
                .'<div class="adminform">
                <fieldset><legend>'.JLETO_CUST_EDIT.': '.$user->name.' - ID: '.$user->id.' </legend>';
                
				if($user->cli_id && $user->cli_nome)
					echo '<label>'.JLETO_CUST_NAME.':</label> '.$user->cli_nome.'<br />';
				else
				    echo '<label>'.JLETO_CUST_NAME.':
						<input class="inputbox jbinputbox" type="text" name="cli_nome" id="cli_nome" maxlength="100"
                        value="'.$user->name.'" /></label> ';
				    
                    echo '<label>'.JLETO_CUST_CNPJ.':
                        <input class="inputbox jbinputbox" type="text" name="cli_cnpj" id="cli_cnpj" maxlength="100"
                        value="'.$user->cli_cnpj.'" />
                    </label>'
                    .'<label>'.JLETO_CUST_IE.':
                        <input class="inputbox jbinputbox" type="text" name="cli_ie" id="cli_ie" maxlength="100"
                        value="'.$user->cli_ie.'" />
                    </label>'
                    .'<label>'.JLETO_CUST_END.':
                        <input class="inputbox jbinputbox" type="text" name="cli_end" id="cli_end" maxlength="100"
                        value="'.$user->cli_end.'"  />
                    </label>'
                    .'<label>'.JLETO_CUST_BAIRRO.':
                        <input class="inputbox jbinputbox" type="text" name="cli_bairro" id="cli_bairro" maxlength="100"
                        value="'.$user->cli_bairro.'" />
                    </label>'
                    .'<label>'.JLETO_CUST_CEP.':
                        <input class="inputbox jbinputbox" type="text" name="cli_cep" id="cli_cep" maxlength="100"
                        value="'.$user->cli_cep.'" />
                    </label>'
                    .'<label>'.JLETO_CUST_ESTADO.':
                        '.$lists['state'].'
                    </label>'
                    .'<label>'.JLETO_CUST_CIDADE.':
                        '.$lists['city'].'
                    </label>'

                .'</fieldset></div>'
                .'<input type="hidden" name="cli_id" value="'.$user->cli_id.'" />'
                .'<input type="hidden" name="option" value="'.COMFOLDER.'" />'
                .'<input type="hidden" name="task" value="" />'
                .'<input type="hidden" name="hidemainmenu" value="0"> '
            .'</form>';


?>
