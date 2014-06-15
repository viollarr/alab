<table width="600" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="txt_topico_tabela"><strong><?php techo('Linha Tem&aacute;tica', 'Area'); ?><span class="dados_obrigatorios">*</span></strong></td>
		<td>
			<select name="linha_tematica" class="formulario" id="linha_tematica">
            <?php if (sizeof($error) != 0) { ?>
                <option value="<?php if(sizeof($error)!= 0){ print $linha_tematica; } ?>"><?php if(sizeof($error)!= 0){ print htmlentities($nome_linha_tematica); } ?></option>
            <?php 
			} else { ?>
                <option value="0">- <?php techo('Selecione a linha temática', 'Select the area'); ?> -</option>
            <?php 
			}  
			while ($ln_tema = mysql_fetch_assoc($qr_tema)) { ?>
				<option value="<?php print $ln_tema['id'];?>" <?php if ($linha_tematica == $ln_tema['id']) print "selected"; ?> ><?php print htmlentities($ln_tema['titulo']); ?></option>
			<?php 
			} ?>
			</select>    
		</td>
	</tr>
	<tr>
		<td class="txt_topico_tabela">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="139" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo da sess&atilde;o', 'Session title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
		<td width="461"><input name="titulo_sessao" type="text" class="formulario" id="titulo_sessao" size="66" maxlength="250" value="<?php if (sizeof($error) != 0) print stripslashes($titulo_sessao); ?>" /></td>
	</tr>  
	<tr>
		<td class="txt_topico_tabela">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="txt_topico_tabela"><strong><?php techo('Resumo da sess&atilde;o', 'Session summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
		<td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1500 e 3500 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
	</tr>
	<tr>
		<td class="txt_topico_tabela">&nbsp;</td>
		<td>
			<span class="txt_topico_tabela">
				<textarea name="resumo_sessao" cols="65" rows="10" class="formulario" id="resumo_sessao"><?php if (sizeof($error)!= 0) print stripslashes($resumo_sessao); ?></textarea>
			</span>
		</td>
	</tr>
	<tr>
		<td class="txt_topico_tabela">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
		<td><input name="palavras_sessao" type="text" class="formulario" id="palavras_sessao" size="66" maxlength="250" value="<?php if (sizeof($error) != 0) print stripslashes($palavras_sessao); ?>" /></td>
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
		<td colspan="2">
		<?php
		$max_num_trabalho = 6;
		for ($i = 0; $i < $max_num_trabalho; $i++) { ?>
			<table width="600" border="0">
				<tr>
					<td colspan="2" ><span class="txt_titulo_destaque"><?php techo('Trabalho', 'Paper'); ?> <?php echo $i + 1;?></span></td>
				</tr>
				<tr>
					<td width="140" class="txt_topico_tabela"><strong><?php techo('T&iacute;tulo', 'Title'); ?></strong><span class="dados_obrigatorios">*</span> </td>
					<td width="460"><input name="titulo[]" type="text" class="formulario" id="titulo[]" size="72" maxlength="250" value="<?php print $titulos[$i]; ?>" /></td>
				</tr>
				<tr>
					<td class="txt_topico_tabela"><strong><?php techo('Autor', 'Author'); ?><span class="dados_obrigatorios">*</span></strong></td>
					<td>
						<input name="autor[]" type="text" class="formulario" id="autor[]" size="30" maxlength="70" value="<?php print $autores[$i]; ?>" />
						<span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
						<input name="email_autor[]" type="text" class="formulario" id="email_autor[]" size="30" maxlength="70" value="<?php print $emails_autor[$i]; ?>" />
						<br />
						<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
						<input name="cpf_autor[]" type="text" class="formulario cpf_autor" size="20" maxlength="70" value="<?php echo $cpfs_autor[$i]; ?>" />
						<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
						<input name="passaporte_autor[]" type="text" class="formulario passaporte_autor" size="20" maxlength="70" value="<?php echo $passaportes_autor[$i]; ?>" />
					</td>
				</tr>
				<tr>
					<td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?><span class="dados_obrigatorios">*</span></strong></td>
					<td>
						<input type="radio" name="id_formacao_autor[<?php print $i; ?>]" value="1" <?php if ($ids_formacao_autor[$i] == 1) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctorate degree'); ?></b></span>
						&nbsp;&nbsp;&nbsp;
						<input type="radio" name="id_formacao_autor[<?php print $i; ?>]" value="2" <?php if ($ids_formacao_autor[$i] == 2) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral student'); ?></b></span>
						<br />
						<input type="radio" name="id_formacao_autor[<?php print $i; ?>]" value="3" <?php if ($ids_formacao_autor[$i] == 3) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master\'s degree'); ?></b></span>
						&nbsp;&nbsp;&nbsp;
						<input type="radio" name="id_formacao_autor[<?php print $i; ?>]" value="4" <?php if ($ids_formacao_autor[$i] == 4) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s student'); ?></b></span>
						<br />
						<input type="radio" name="id_formacao_autor[<?php print $i; ?>]" value="6" <?php if ($ids_formacao_autor[$i] == 6) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Estudante de graduação', 'Undergrad student'); ?></b></span>
					</td>
				</tr>
				<?php 
				if (sizeof($error) != 0): 
					for($j = 0; $j < sizeof($coautores[$i]); $j++): ?>
						<tr>
							<td colspan="2">
								<table class="co_autor_<?php echo $i; ?>">
									<tr>
										<td class="txt_topico_tabela"><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
										<td>
											<input name="coautor[<?php echo $i; ?>][]" type="text" class="formulario" size="30" maxlength="70" value="<?php print $coautores[$i][$j]; ?>" /> <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
											<input name="email_coautor[<?php echo $i; ?>][]" type="text" class="formulario" size="30" maxlength="70" value="<?php print $emails_coautor[$i][$j]; ?>" />
											<br />
											<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
											<input name="cpf_coautor[<?php echo $i; ?>][]" type="text" class="formulario cpf_coautor" size="20" maxlength="70" value="<?php echo $cpfs_coautor[$i][$j]; ?>" />
											<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
											<input name="passaporte_coautor[<?php echo $i; ?>][]" type="text" class="formulario passaporte_coautor" size="20" maxlength="70" value="<?php echo $passaportes_coautor[$i][$j]; ?>" />
										</td>
									</tr>
									<tr>
										<td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?><span class="dados_obrigatorios">*</span></strong></td>
										<td>
											<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][<?php echo $j; ?>]" value="1" <?php if ($ids_formacao_co_autor[$i][$j] == 1) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctorate degree'); ?></b></span>
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][<?php echo $j; ?>]" value="2" <?php if ($ids_formacao_co_autor[$i][$j] == 2) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral student'); ?></b></span>
											<br />
											<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][<?php echo $j; ?>]" value="3" <?php if ($ids_formacao_co_autor[$i][$j] == 3) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master\'s degree'); ?></b></span>
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][<?php echo $j; ?>]" value="4" <?php if ($ids_formacao_co_autor[$i][$j] == 4) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s student'); ?></b></span>
											<br />
											<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][<?php echo $j; ?>]" value="6" <?php if ($ids_formacao_co_autor[$i][$j] == 6) print "checked"; ?> /> <span class="txt_topico_tabela"><b><?php techo('Estudante de graduação', 'Undergrad student'); ?></b></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					<?php 
					endfor;
				else: ?>
					<tr>
						<td colspan="2">
							<table class="co_autor_<?php echo $i; ?>">
								<tr>
									<td class="txt_topico_tabela"><strong><?php techo('Co-autor', 'Co-author'); ?></strong></td>
									<td>
										<input name="coautor[<?php echo $i; ?>][]" type="text" class="formulario" size="30" maxlength="70" /> <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
										<input name="email_coautor[<?php echo $i; ?>][]" type="text" class="formulario" size="30" maxlength="70" />
										<br />
										<span class="txt_topico_tabela"><b>&nbsp;CPF:</b></span>
										<input name="cpf_coautor[<?php echo $i; ?>][]" type="text" class="formulario cpf_coautor" size="20" maxlength="70" />
										<span class="txt_topico_tabela"><b>&nbsp;<?php techo('Passaporte', 'Passport'); ?>:</b></span>
										<input name="passaporte_coautor[<?php echo $i; ?>][]" type="text" class="formulario passaporte_coautor" size="20" maxlength="70" />
									</td>
								</tr>
								<tr>
									<td class="txt_topico_tabela"><strong><?php techo('Forma&ccedil;&atilde;o Acad&ecirc;mica', 'Academic Degree'); ?><span class="dados_obrigatorios">*</span></strong></td>
									<td>
										<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][0]" value="1" /> <span class="txt_topico_tabela"><b><?php techo('Doutor', 'Doctorate degree'); ?></b></span>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][0]" value="2" /> <span class="txt_topico_tabela"><b><?php techo('Doutorando', 'Doctoral student'); ?></b></span>
										<br />
										<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][0]" value="3" /> <span class="txt_topico_tabela"><b><?php techo('Mestre', 'Master\'s degree'); ?></b></span>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][0]" value="4" /> <span class="txt_topico_tabela"><b><?php techo('Mestrando', 'Master\'s student'); ?></b></span>
										<br />
										<input type="radio" name="id_formacao_co_autor[<?php echo $i; ?>][0]" value="6" /> <span class="txt_topico_tabela"><b><?php techo('Estudante de graduação', 'Undergrad student'); ?></b></span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				<?php endif; ?>
				<tr>	  
					<td colspan="2">
						<a id="add_coautor_<?php echo $i; ?>" href="#" onclick="return coautor_comunicacao_coordenada(<?php echo $i; ?>);">+ <?php techo('Adicionar co-autor', 'Add co-author'); ?></a>
					</td>
				</tr>
				<tr>
					<td class="txt_topico_tabela"><strong><?php techo('Resumo', 'Summary'); ?><span class="dados_obrigatorios">*</span></strong></td>
					<td><b><span id="WordCount<?=$i;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> <?php techo('caracteres restantes - Obs: Entre 1500 e 3500 caracteres', 'characters remaining - Between 1500 and 3500 characters'); ?></span></td>
				</tr>
				<tr>
					<td class="txt_topico_tabela">&nbsp;</td>
					<td>
						<textarea name="resumo[]" cols="71" rows="10" class="formulario resumo" id="resumo<?=$i;?>"><?php print $resumos[$i]; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="txt_topico_tabela"><strong><?php techo('Palavras-chave', 'Keywords'); ?><span class="dados_obrigatorios">*</span></strong></td>
					<td><input name="palavras[]" type="text" class="formulario" id="palavras[]" size="72" maxlength="250" value="<?php print $palavras[$i]; ?>" /></td>
				</tr>
				<tr>
					<td class="txt_topico_tabela">&nbsp;</td>
					<td><span class="txt_desc_tabela"><?php techo('3 palavras-chave separadas por ponto e v&iacute;rgula', '3 keywords separated by semicolons'); ?></span></td>
				</tr>
				<tr>
					<td class="txt_topico_tabela">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		<?php 
		}
		?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="button" id="button" value="<?php techo('Enviar trabalho', 'Submit proposal'); ?>" class="botao" />
			<input name="insert" type="hidden" id="insert" value="true">
			<input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
			<input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>">
		</td>
	</tr>
</table>