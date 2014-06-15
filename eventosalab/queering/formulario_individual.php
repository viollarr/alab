<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="txt_topico_tabela"><strong><?php techo('Linha Tem&aacute;tica', 'Area'); ?><span class="dados_obrigatorios">*</span></strong></td>
    <td>
    	<?php /*
		<select name="linha_tematica" class="formulario" id="linha_tematica">
        <?php if (sizeof($error)!= 0) { ?>
			<option value="<?php if(sizeof($error)!= 0){ print $linha_tematica; } ?>"><?php if(sizeof($error)!= 0){ print htmlentities($nome_linha_tematica); } ?></option>
        <?php } else { ?>
            <option value="0">- <?php techo('Selecione a linha temática', 'Select the area'); ?> -</option>
        <?php }  
		while ($ln_tema = mysql_fetch_assoc($qr_tema)) { ?>
            <option  value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
		<?php } ?>
         </select>
         */ ?>
		<select name="linha_tematica" class="formulario" id="linha_tematica">
            <option value="0">- <?php techo('Selecione a linha temática', 'Select the area'); ?> -</option>
			<?php while ($ln_tema = mysql_fetch_assoc($qr_tema)) : 
				$selected = ($ln_tema['id'] == $linha_tematica) ? "selected='selected'" : '';
				?>
                <option  value="<?php print $ln_tema['id'];?>" <?php echo $selected; ?>><?php print htmlentities($ln_tema['titulo']);?></option>
            <?php endwhile ?>
         </select>
    </td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="118" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo', 'Title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
    <td width="482"><input name="titulo" type="text" class="formulario" id="titulo" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo); } ?>"  /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt_desc_tabela">&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong><?php techo('Autor', 'Author'); ?><span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="autor" type="text" class="formulario" id="autor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $autor; }else{ print $p['nome'];} ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
	<?php if (sizeof($error) != 0): 
		for($i = 0; $i < sizeof($coautor); $i++): ?>
			<tr>				
				<td colspan="2">
					<table class="co_autor" style="margin-bottom:15px;">
						<tr>
							<td class="txt_topico_tabela" width="120" ><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
							<td>
								<input name="coautor[]" type="text" class="formulario coautor" maxlength="70" value="<?php echo $coautor[$i]; ?>" style="width:150px;" />
								<span class="txt_topico_tabela"><b>&nbsp;Email:</b></span>
								<input name="email_coautor[]" type="text" class="formulario email_coautor" maxlength="70" value="<?php echo $email_coautor[$i]; ?>" style="width:230px;" /><br />
								<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
								<input name="cpf_coautor[]" type="text" class="formulario cpf_coautor" size="20" maxlength="70" value="<?php echo $cpf_coautor[$i]; ?>" />
								<?php techo('ou', 'or'); ?>
								<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
								<input name="passaporte_coautor[]" type="text" class="formulario passaporte_coautor" size="20" maxlength="70" value="<?php echo $passaporte_coautor[$i]; ?>" />
							</td>
						</tr>
						<tr>
							<td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?></strong><br /><br /></td>
							<td>
                            	<?php
								$formacao_coautor = $_POST['formacao_coautor_'.($i+1)];
								?>
								<label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="1" <?php if ($formacao_coautor == 1) echo 'checked'; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctorate degree'); ?></b></span></label>
								&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="2" <?php if ($formacao_coautor == 2) echo 'checked'; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral student'); ?></b></span></label>
								<br />
								<label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="3" <?php if ($formacao_coautor == 3) echo 'checked'; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master\'s degree'); ?></b></span></label>
								&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="4" <?php if ($formacao_coautor == 4) echo 'checked'; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s student'); ?></b></span></label>
								<br />
								<label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="6" <?php if ($formacao_coautor == 6) echo 'checked'; ?> /> <span class="txt_topico_tabela"><b><?php techo('Estudante de graduação', 'Undergrad student'); ?></b></span></label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
	<?php endfor;
	else: 
		while($i < 6): 
			?>
            <tr>
                <td colspan="2">
                    <table class="co_autor" style="margin-bottom:15px;">
                        <tr>
                            <td class="txt_topico_tabela" width="113" ><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
                            <td>
                                <input name="coautor[]" type="text" class="formulario coautor" maxlength="70" style="width:150px;" />
                                <span class="txt_topico_tabela"><b>&nbsp;Email</b></span>
                                    <input name="email_coautor[]" type="text" class="formulario email_coautor" maxlength="70" style="width:230px;" /><br />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                                <span class="txt_topico_tabela" style="margin-left:-3px;"><b>&nbsp;CPF</b></span>
                            </td>
                        	<td>
                                <input name="cpf_coautor[]" type="text" class="formulario cpf_coautor" size="20" maxlength="70" />
                                <div style="display:inline-block; width:60px; text-align:center;">
	                                <?php techo('ou', 'or'); ?>
                                </div>
                                <span class="txt_topico_tabela"><b><?php techo('Passaporte', 'Passport'); ?></b></span>
                                    <input name="passaporte_coautor[]" type="text" class="formulario passaporte_coautor" size="20" maxlength="70" />
                            </td>
                        </tr>
                        <tr>
                            <td class="txt_topico_tabela">
                            	<strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?></strong>
                                <br />
                                <br />
                            </td>
                            <td>
                                <label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="1" /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctorate degree'); ?></b></span></label>
                                &nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="2" /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral student'); ?></b></span></label>
                                <br />
                                <label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="3" /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master\'s degree'); ?></b></span></label>
                                &nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="4" /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s student'); ?></b></span></label>
								<br />
                                <label><input type="radio" name="formacao_coautor_<?php echo $i+1; ?>" value="6" /> <span class="txt_topico_tabela"><b><?php techo('Estudante de graduação', 'Undergrad student'); ?></b></span></label>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
			<?php 
			$i++;
		endwhile;
	endif; ?>
  <?php /*
  <tr>
    <td colspan="2"><a id="add_coautor" href="#">+ <?php techo('Adicionar co-autor', 'Add co-author'); ?></a></td>
  </tr>
  */ ?>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong><?php techo('Resumo', 'Summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
    <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1500 e 3500 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_topico_tabela">
      <textarea name="resumo" cols="65" rows="15" class="formulario" id="resumo"><?php if (sizeof($error) != 0) print stripslashes($resumo); ?></textarea>
    </span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="palavras" type="text" class="formulario" id="palavras" size="66" maxlength="250" value="<?php if (sizeof($error) != 0) print stripslashes($palavras); ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_desc_tabela"><?php techo('3 palavras-chave separadas por ponto e v&iacute;rgula', '3 keywords separated by semicolons'); ?></span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="<?php techo('Enviar trabalho', 'Submit proposal'); ?>" class="botao" />
        <input name="insert" type="hidden" id="insert" value="true">
        <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
        <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>">  </td>
  </tr>
</table>