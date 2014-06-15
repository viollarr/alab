<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
	$cid = JRequest::getVar( 'cid', array(0) );
	$edit		= JRequest::getVar('edit',true);
	$text = intval($edit) ? JText::_( 'Edit' ) : JText::_( 'New' );

	JToolBarHelper::title( JText::_( 'User' ) . ': <small><small>[ '. $text .' ]</small></small>' , 'user.png' );
	JToolBarHelper::save();
	JToolBarHelper::apply();
	if ( $edit ) {
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
	} else {
		JToolBarHelper::cancel();
	}
	JToolBarHelper::help( 'screen.users.edit' );
	$cparams = JComponentHelper::getParams ('com_media');
?>

<?php
	// clean item data
	JFilterOutput::objectHTMLSafe( $this->user, ENT_QUOTES, '' );

	if ($this->user->get('lastvisitDate') == "0000-00-00 00:00:00") {
		$lvisit = JText::_( 'Never' );
	} else {
		$lvisit	= JHTML::_('date', $this->user->get('lastvisitDate'), '%Y-%m-%d %H:%M:%S');
	}
?>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&]", "i");

		// do field validation
		if (trim(form.name.value) == "") {
			alert( "<?php echo JText::_( 'You must provide a name.', true ); ?>" );
		} else if (form.username.value == "") {
			alert( "<?php echo JText::_( 'You must provide a user login name.', true ); ?>" );
		} else if (r.exec(form.username.value) || form.username.value.length < 2) {
			alert( "<?php echo JText::_( 'WARNLOGININVALID', true ); ?>" );
		} else if (trim(form.email.value) == "") {
			alert( "<?php echo JText::_( 'You must provide an email address.', true ); ?>" );
		} else if (form.gid.value == "") {
			alert( "<?php echo JText::_( 'You must assign user to a group.', true ); ?>" );
		} else if (((trim(form.password.value) != "") || (trim(form.password2.value) != "")) && (form.password.value != form.password2.value)){
			alert( "<?php echo JText::_( 'Password do not match.', true ); ?>" );
		} else if (form.gid.value == "29") {
			alert( "<?php echo JText::_( 'WARNSELECTPF', true ); ?>" );
		} else if (form.gid.value == "30") {
			alert( "<?php echo JText::_( 'WARNSELECTPB', true ); ?>" );
		} else {
			submitform( pressbutton );
		}
	}

	function gotocontact( id ) {
		var form = document.adminForm;
		form.contact_id.value = id;
		submitform( 'contact' );
	}
</script>
<form action="index.php" method="post" name="adminForm" autocomplete="off">
	<div class="col width-45">
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'User Details' ); ?></legend>
			<table class="admintable" cellspacing="1">
				<tr>
					<td width="150" class="key">
						<label for="name">
							<?php echo JText::_( 'Name' ); ?>						</label>					</td>
					<td>
						<input type="text" name="name" id="name" class="inputbox" size="40" value="<?php echo $this->user->get('name'); ?>" /> 
						*					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="Anuidade2010">
							<?php echo JText::_( 'Anuidade 2010' ); ?>						</label>					</td>
					<td>
						<input type="radio" name="Anuidade2010" value="Sim" <?php if ($this->escape($this->user->get( 'Anuidade2010' ))=="Sim"){ print "checked";}?>  />Sim 
                        &nbsp;
    					<input type="radio" name="Anuidade2010" value="Não" <?php if ($this->escape($this->user->get( 'Anuidade2010' ))=="Não"){ print "checked";}?> />Não	
                        
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="Anuidade2011">
							<?php echo JText::_( 'Anuidade 2011' ); ?>						</label>					</td>
					<td>
						<input type="radio" name="Anuidade2011" value="Sim" <?php if ($this->escape($this->user->get( 'Anuidade2011' ))=="Sim"){ print "checked";}?>  />Sim 
                        &nbsp;
    					<input type="radio" name="Anuidade2011" value="Não" <?php if ($this->escape($this->user->get( 'Anuidade2011' ))=="Não"){ print "checked";}?> />Não	
                        
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="Anuidade2012">
							<?php echo JText::_( 'Anuidade 2012' ); ?>						</label>					</td>
					<td>
						<input type="radio" name="Anuidade2012" value="Sim" <?php if ($this->escape($this->user->get( 'Anuidade2012' ))=="Sim"){ print "checked";}?>  />Sim 
                        &nbsp;
    					<input type="radio" name="Anuidade2012" value="Não" <?php if ($this->escape($this->user->get( 'Anuidade2012' ))=="Não"){ print "checked";}?> />Não	
                        
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="username">
							<?php echo JText::_( 'Username' ); ?>						</label>					</td>
					<td>
						<input type="text" name="username" id="username" class="inputbox" size="40" value="<?php echo $this->user->get('username'); ?>" autocomplete="off" />
* </td>
				</tr>
				<tr>
					<td class="key">
						<label for="Passport">
							<?php echo JText::_( 'Passport' ); ?>						</label>					</td>
					<td>
						<input type="text" name="Passport" id="Passport" class="inputbox" size="40" value="<?php echo $this->user->get('Passport'); ?>" autocomplete="off" />
* </td>
				</tr>
				<tr>
					<td class="key">
						<label for="email">
							<?php echo JText::_( 'Email' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="email" id="email" size="40" value="<?php echo $this->user->get('email'); ?>" />
* </td>
				</tr>
				<tr>
					<td class="key">
						<label for="password">
							<?php echo JText::_( 'New Password' ); ?>						</label>					</td>
					<td>
						<?php if(!$this->user->get('password')) : ?>
							<input class="inputbox disabled" type="password" name="password" id="password" size="40" value="" disabled="disabled" />
						<?php else : ?>
							<input class="inputbox" type="password" name="password" id="password" size="40" value=""/>
						<?php endif; ?>					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="password2">
							<?php echo JText::_( 'Verify Password' ); ?>						</label>					</td>
					<td>
						<?php if(!$this->user->get('password')) : ?>
							<input class="inputbox disabled" type="password" name="password2" id="password2" size="40" value="" disabled="disabled" />
						<?php else : ?>
							<input class="inputbox" type="password" name="password2" id="password2" size="40" value=""/>
						<?php endif; ?>					</td>
				</tr>
                <!-- CAMPOS NOVOS -->
                
                <tr>
					<td class="key">
						<label for="cpf">
							<?php echo JText::_( 'CPF' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cpf" id="cpf" size="40" value="<?php echo $this->user->get('cpf'); ?>" />
* </td>
				</tr>
                
                <tr>
					<td class="key">
						<label for="rg">
							<?php echo JText::_( 'RG' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="rg" id="rg" size="40" value="<?php echo $this->user->get('rg'); ?>" />
* </td>
				</tr>
				<tr>
					<td class="key">
						<label for="orgao_expedidor">
							<?php echo JText::_( '&Oacute;rg&atilde;o Expedidor' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="orgao_expedidor" id="orgao_expedidor" size="40" value="<?php echo $this->user->get('orgao_expedidor'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="sexo">
							<?php echo JText::_( 'Sexo' ); ?>						</label>					</td>
					<td>
						<input type="radio" name="sexo" value="Masculino" <?php if ($this->escape($this->user->get( 'sexo' ))=="Masculino"){ print "checked";}?>  />Masculino 
                        &nbsp;
    					<input type="radio" name="sexo" value="Feminino" <?php if ($this->escape($this->user->get( 'sexo' ))=="Feminino"){ print "checked";}?> />Feminino					</td>
				</tr>
                                <tr>
					<td class="key">
						<label for="data_nascimento">
							<?php echo JText::_( 'Data Nascimento' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="data_nascimento" id="data_nascimento" size="40" value="<?php echo $this->user->get('data_nascimento'); ?>" />
* </td>
				</tr>
                                <tr>
					<td class="key">
						<label for="nacionalidade">
							<?php echo JText::_( 'Nacionalidade' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="nacionalidade" id="nacionalidade" size="40" value="<?php echo $this->user->get('nacionalidade'); ?>" />
* </td>
				</tr>
                                <tr>
					<td class="key">
						<label for="titulacao_academica">
							<?php echo JText::_( 'Titula&ccedil;&atilde;o Acad&ecirc;mica' ); ?>						</label>					</td>
					<td>
						<select class="inputbox" name="titulacao_academica">
	  <?php if ($this->escape($this->user->get( 'titulacao_academica' ))!=""){ ?>
      <option value="<?php echo $this->escape($this->user->get( 'titulacao_academica' ));?>"><?php echo $this->escape($this->user->get( 'titulacao_academica' ));?></option>
      <?php }else{?>
		<option value=""> Selecione a Titula&ccedil;&atilde;o </option>
      <?php }?> 
    <option value="Mestre">Mestre</option>
    <option value="Doutor">Doutor</option>
    <option value="Livre Docente">Livre Docente</option>
    <option value="Professor">Professor Titular</option>
    <option value="Graduando">Graduando</option>
    <option value="Mestrando">Mestrando</option>
    <option value="Doutorando">Doutorando</option>
    <option value="P&oacute;s-Graduando">P&oacute;s-Graduando</option>
    <option value="Outros">Outros</option>
  </select>
* </td>
				</tr>
                                <tr>
					<td class="key">
						<label for="sigla_instituicao">
							<?php echo JText::_( 'Sigla da Institui&ccedil;&atilde;o' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="sigla_instituicao" id="sigla_instituicao" size="40" value="<?php echo $this->user->get('sigla_instituicao'); ?>" />
* </td>
				</tr>
                                <tr>
					<td class="key">
						<label for="cargo">
							<?php echo JText::_( 'Cargo' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cargo" id="cargo" size="40" value="<?php echo $this->user->get('cargo'); ?>" />
* </td>
				</tr>
				<tr>
					<td class="key">
						<label for="area_atuacao">
							<?php echo JText::_( '&Aacute;rea de atua&ccedil;&atilde;o' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="area_atuacao" id="area_atuacao" size="40" value="<?php echo $this->user->get('area_atuacao'); ?>" />
                        
     <!--<select class="inputbox" name="area_atuacao">
	  <?php //if ($this->escape($this->user->get( 'area_atuacao' ))!=""){ ?>
      <option value="<?php //echo $this->escape($this->user->get( 'area_atuacao' ));?>"><?php //echo $this->escape($this->user->get( 'area_atuacao' ));?></option>
      <?php //}else{?>
		<option value=""> Selecione a &aacute;rea de atua&ccedil;&atilde;o </option>
      <?php //}?>  
    <option value="Fon�tica e fonologia">Fon&eacute;tica e fonologia</option>
    <option value="Ensino de l�ngua(s)">Ensino de l&iacute;ngua(s)</option>
    <option value="Pr�ticas Sociais da Linguagem">Pr&aacute;ticas Sociais da Linguagem</option>
    <option value="Tradu��o">Tradu&ccedil;&atilde;o</option>
    <option value="Terminologia">Terminologia</option>
    <option value="Lingu�stica de corpus e computacional">Ling&uuml;&iacute;stica de corpus e computacional</option>
    <option value="Morfologia e sintaxe">Morfologia e sintaxe</option>
    <option value="Sem�ntica e pragm�tica">Sem&acirc;ntica e pragm&aacute;tica</option>
    <option value="Sociolingu�stica e dialetologia">Socioling&uuml;&iacute;stica e dialetologia</option>
    <option value="Lingu�stica hist�rica">Ling&uuml;&iacute;stica hist&oacute;rica</option>
    <option value="Psicolingu�stica e aquisi��o da linguagem">Psicoling&uuml;&iacute;stica e aquisi&ccedil;&atilde;o da linguagem</option>
    <option value="An&aacute;lise do texto e do discurso">An&aacute;lise do texto e do discurso</option>
    <option value="Alfabetiza��o e Letramento">Alfabetiza&ccedil;&atilde;o e Letramento</option>
    <option value="L�nguas Ind�genas">L&iacute;nguas Ind&iacute;genas</option>
  </select>-->					 
				  *</td>
				</tr>
                <tr>
					<td class="key"><b>Gradua&ccedil;&atilde;o</b></td>
					<td>&nbsp;</td>
				</tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?></td>
                  <td><input class="inputbox" type="text" name="instituicao_GR" id="instituicao_GR" size="40" value="<?php echo $this->user->get('instituicao_GR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Curso' ); ?></td>
                  <td><input class="inputbox" type="text" name="curso_GR" id="curso_GR" size="40" value="<?php echo $this->user->get('curso_GR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Cidade' ); ?></td>
                  <td><input class="inputbox" type="text" name="cidade_GR" id="cidade_GR" size="40" value="<?php echo $this->user->get('cidade_GR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Ano' ); ?></td>
                  <td><input class="inputbox" type="text" name="ano_conclusao_GR" id="ano_conclusao_GR" size="40" value="<?php echo $this->user->get('ano_conclusao_GR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><b>Especializa&ccedil;&atilde;o</b></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?></td>
                  <td><input class="inputbox" type="text" name="instituicao_ES" id="instituicao_ES" size="40" value="<?php echo $this->user->get('instituicao_ES'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Curso' ); ?></td>
                  <td><input class="inputbox" type="text" name="curso_ES" id="curso_ES" size="40" value="<?php echo $this->user->get('curso_ES'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Cidade' ); ?></td>
                  <td><input class="inputbox" type="text" name="cidade_ES" id="cidade_ES" size="40" value="<?php echo $this->user->get('cidade_ES'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Ano' ); ?></td>
                  <td><input class="inputbox" type="text" name="ano_conclusao_ES" id="ano_conclusao_ES" size="40" value="<?php echo $this->user->get('ano_conclusao_ES'); ?>" /></td>
                </tr>

                <tr>
                  <td class="key"><b>Mestrado</b></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?></td>
                  <td><input class="inputbox" type="text" name="instituicao_MT" id="instituicao_MT" size="40" value="<?php echo $this->user->get('instituicao_MT'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Curso' ); ?></td>
                  <td><input class="inputbox" type="text" name="curso_MT" id="curso_MT" size="40" value="<?php echo $this->user->get('curso_MT'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Cidade' ); ?></td>
                  <td><input class="inputbox" type="text" name="cidade_MT" id="cidade_MT" size="40" value="<?php echo $this->user->get('cidade_MT'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Ano' ); ?></td>
                  <td><input class="inputbox" type="text" name="ano_conclusao_MT" id="ano_conclusao_MT" size="40" value="<?php echo $this->user->get('ano_conclusao_MT'); ?>" /></td>
                </tr>

                <tr>
                  <td class="key"><b>Doutorado</b></td>
                  <td>&nbsp;</td>
                </tr>
				<tr>
                  <td class="key"><?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?></td>
                  <td><input class="inputbox" type="text" name="instituicao_DR" id="instituicao_DR" size="40" value="<?php echo $this->user->get('instituicao_DR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Curso' ); ?></td>
                  <td><input class="inputbox" type="text" name="curso_DR" id="curso_DR" size="40" value="<?php echo $this->user->get('curso_DR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Cidade' ); ?></td>
                  <td><input class="inputbox" type="text" name="cidade_DR" id="cidade_DR" size="40" value="<?php echo $this->user->get('cidade_DR'); ?>" /></td>
                </tr>
                <tr>
                  <td class="key"><?php echo JText::_( 'Ano' ); ?></td>
                  <td><input class="inputbox" type="text" name="ano_conclusao_DR" id="ano_conclusao_DR" size="40" value="<?php echo $this->user->get('ano_conclusao_DR'); ?>" /></td>
                </tr>

                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="key">Cadastro de Endere&ccedil;os</td>
                  <td>Residencial</td>
                </tr>
                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
					<td class="key">
						<label for="endereco_res">
							<?php echo JText::_( 'Endere&ccedil;o' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="endereco_res" id="endereco_res" size="40" value="<?php echo $this->user->get('endereco_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="complemento_res">
							<?php echo JText::_( 'Complemento' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="complemento_res" id="cpf" size="40" value="<?php echo $this->user->get('complemento_res'); ?>" /></td>
				</tr>
                <tr>
					<td class="key">
						<label for="bairro_res">
							<?php echo JText::_( 'Bairro' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="bairro_res" id="bairro_res" size="40" value="<?php echo $this->user->get('bairro_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="cidade_res">
							<?php echo JText::_( 'Cidade' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cidade_res" id="cidade_res" size="40" value="<?php echo $this->user->get('cidade_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="estado_res">
							<?php echo JText::_( 'Estado' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="estado_res" id="estado_res" size="40" value="<?php echo $this->user->get('estado_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="pais_res">
							<?php echo JText::_( 'Pa&iacute;s' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="pais_res" id="pais_res" size="40" value="<?php echo $this->user->get('pais_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="cep_res">
							<?php echo JText::_( 'CEP' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cep_res" id="cep_res" size="40" value="<?php echo $this->user->get('cep_res'); ?>" />
* </td>
				</tr>
                <tr>
					<td class="key">
						<label for="telefone_res">
							<?php echo JText::_( 'Telefone' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="telefone_res" id="telefone_res" size="40" value="<?php echo $this->user->get('telefone_res'); ?>" />					</td>
				</tr>
               <tr>
					<td class="key">
						<label for="celular">
							<?php echo JText::_( 'Celular' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="celular" id="celular" size="40" value="<?php echo $this->user->get('celular'); ?>" />					</td>
				</tr>
                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="key">Cadastro de Endere&ccedil;os</td>
                  <td>Profissional</td>
                </tr>
                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
					<td class="key">
						<label for="instituicao_prof">
							<?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="instituicao_prof" id="instituicao_prof" size="40" value="<?php echo $this->user->get('instituicao_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="departamento_prof">
							<?php echo JText::_( 'Departamento' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="departamento_prof" id="departamento_prof" size="40" value="<?php echo $this->user->get('departamento_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="endereco_prof">
							<?php echo JText::_( 'Endere&ccedil;o' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="endereco_prof" id="endereco_prof" size="40" value="<?php echo $this->user->get('endereco_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="complemento_prof">
							<?php echo JText::_( 'Complemento' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="complemento_prof" id="cpf" size="40" value="<?php echo $this->user->get('complemento_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="bairro_prof">
							<?php echo JText::_( 'Bairro' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="bairro_prof" id="bairro_prof" size="40" value="<?php echo $this->user->get('bairro_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="cidade_prof">
							<?php echo JText::_( 'Cidade' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cidade_prof" id="cidade_prof" size="40" value="<?php echo $this->user->get('cidade_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="estado_prof">
							<?php echo JText::_( 'Estado' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="estado_prof" id="estado_prof" size="40" value="<?php echo $this->user->get('estado_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="pais_prof">
							<?php echo JText::_( 'Pa&iacute;s' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="pais_prof" id="pais_prof" size="40" value="<?php echo $this->user->get('pais_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="cep_prof">
							<?php echo JText::_( 'CEP' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="cep_prof" id="cep_prof" size="40" value="<?php echo $this->user->get('cep_prof'); ?>" />					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="telefone_prof">
							<?php echo JText::_( 'Telefone' ); ?>						</label>					</td>
					<td>
						<input class="inputbox" type="text" name="telefone_prof" id="telefone_prof" size="40" value="<?php echo $this->user->get('telefone_prof'); ?>" />					</td>
				</tr>
                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="key">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <!-- CAMPOS NOVOS -->
                
				<tr>
					<td valign="top" class="key">
						<label for="gid">
							<?php echo JText::_( 'Group' ); ?>						</label>					</td>
					<td>
						<?php echo $this->lists['gid']; ?>					</td>
				</tr>
				<?php if ($this->me->authorize( 'com_users', 'block user' )) { ?>
				<tr>
					<td width="150" class="key">
						<label for="tipo_anuidade">
							<?php echo JText::_( 'Tipo de Anuidade' ); ?>						</label>					</td>
					<td><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Honorario" <?php if($this->user->get('tipo_anuidade') == "Honorario") print "checked";?> /> S&oacute;cio Honor&aacute;rio
						<br /><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Pleno" <?php if($this->user->get('tipo_anuidade') == "Pleno") print "checked";?> /> S&oacute;cio Pleno
						<br /><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Aluno" <?php if($this->user->get('tipo_anuidade') == "Aluno") print "checked";?> /> Aluno de Gradua&ccedil;&atilde;o ou P&oacute;s-Gradua&ccedil;&atilde;o
					</td>
				</tr>
				<tr>
					<td width="150" class="key">
						<label for="observacao">
							<?php echo JText::_( 'Observa&ccedil;&atilde;o' ); ?>						</label>					</td>
					<td>
						<textarea name="observacao" id="observacao" class="inputbox" style="width:100%;" rows="3"><?php echo $this->user->get('observacao'); ?></textarea>					</td>
				</tr>
				<tr>
					<td width="150" class="key">
						<label for="exibir_observacao">
							<?php echo JText::_( 'Exibir observa&ccedil;&atilde;o no site' ); ?>						</label>					</td>
					<td>
						<input type="radio" name="exibir_observacao" value="Sim" <?php if ($this->escape($this->user->get( 'exibir_observacao' ))=="Sim"){ print "checked";}?>  />Sim 
                        &nbsp;
    					<input type="radio" name="exibir_observacao" value="Nao" <?php if ($this->escape($this->user->get( 'exibir_observacao' ))=="Nao"){ print "checked";}?> />N&atilde;o
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Block User' ); ?>					</td>
					<td>
						<?php echo $this->lists['block']; ?>					</td>
				</tr>
				<?php } if ($this->me->authorize( 'com_users', 'email_events' )) { ?>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Receive System Emails' ); ?>					</td>
					<td>
						<?php echo $this->lists['sendEmail']; ?>					</td>
				</tr>
				<?php } if( $this->user->get('id') ) { ?>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Register Date' ); ?>					</td>
					<td>
						<?php echo JHTML::_('date', $this->user->get('registerDate'), '%Y-%m-%d %H:%M:%S');?>					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Last Visit Date' ); ?>					</td>
					<td>
						<?php echo $lvisit; ?>					</td>
				</tr>
				<?php } ?>
			</table>
	  </fieldset>
	</div>
	<div class="col width-55">
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'Parameters' ); ?></legend>
			<table class="admintable">
				<tr>
					<td>
						<?php
							$params = $this->user->getParameters(true);
							echo $params->render( 'params' );
						?>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'Contact Information' ); ?></legend>
		<?php if ( !$this->contact ) { ?>
			<table class="admintable">
				<tr>
					<td>
						<br />
						<span class="note">
							<?php echo JText::_( 'No Contact details linked to this User' ); ?>:
							<br />
							<?php echo JText::_( 'SEECOMPCONTACTFORDETAILS' ); ?>.
						</span>
						<br /><br />
					</td>
				</tr>
			</table>
		<?php } else { ?>
			<table class="admintable">
				<tr>
					<td width="120" class="key">
						<?php echo JText::_( 'Name' ); ?>
					</td>
					<td>
						<strong>
							<?php echo $this->contact[0]->name;?>
						</strong>
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Position' ); ?>
					</td>
					<td >
						<strong>
							<?php echo $this->contact[0]->con_position;?>
						</strong>
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Telephone' ); ?>
					</td>
					<td >
						<strong>
							<?php echo $this->contact[0]->telephone;?>
						</strong>
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Fax' ); ?>
					</td>
					<td >
						<strong>
							<?php echo $this->contact[0]->fax;?>
						</strong>
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Misc' ); ?>
					</td>
					<td >
						<strong>
							<?php echo $this->contact[0]->misc;?>
						</strong>
					</td>
				</tr>
				<?php if ($this->contact[0]->image) { ?>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Image' ); ?>
					</td>
					<td valign="top">
						<img src="<?php echo JURI::root() . $cparams->get('image_path') . '/' . $this->contact[0]->image; ?>" align="middle" alt="<?php echo JText::_( 'Contact' ); ?>" />
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td class="key">&nbsp;</td>
					<td>
						<div>
							<br />
							<input class="button" type="button" value="<?php echo JText::_( 'change Contact Details' ); ?>" onclick="gotocontact( '<?php echo $this->contact[0]->id; ?>' )" />
							<i>
								<br /><br />
								'<?php echo JText::_( 'Components -> Contact -> Manage Contacts' ); ?>'
							</i>
						</div>
					</td>
				</tr>
			</table>
			<?php } ?>
		</fieldset>
	</div>
	<div class="clr"></div>

	<input type="hidden" name="id" value="<?php echo $this->user->get('id'); ?>" />
	<input type="hidden" name="cid[]" value="<?php echo $this->user->get('id'); ?>" />
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="contact_id" value="" />
	<?php if (!$this->me->authorize( 'com_users', 'email_events' )) { ?>
	<input type="hidden" name="sendEmail" value="0" />
	<?php } ?>
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
