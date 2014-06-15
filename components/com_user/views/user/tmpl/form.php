<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});

// -->
</script>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" name="userform" autocomplete="off" class="form-validate">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php endif; ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<?php if($this->user->get('exibir_observacao') == "Sim"){ ?>
<tr>
	<td colspan="2">Aten&ccedil;&atilde;o: <?php echo $this->escape($this->user->get('observacao'));?></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<?php }//fim if ?>
<tr>
	<td>
		<label for="username">
			<?php echo JText::_( 'User Name' ); ?>:		</label>	</td>
	<td width="23%">
		<span><?php echo $this->user->get('username');?></span>	</td>
</tr>
<tr>
	<td width="77%">
	<label for="name">
			<?php echo JText::_( 'Your Name' ); ?>:		</label>	</td>
	<td>
		<input class="inputbox required" type="text" id="name" name="name" value="<?php echo $this->escape($this->user->get('name'));?>" size="40" /> *	</td>
</tr>
<tr>
	<td width="77%">
	<label for="Passport">
			<?php echo JText::_( 'Passport' ); ?>:		</label>	</td>
	<td>
		<input class="inputbox required" type="text" id="Passport" name="Passport" value="<?php echo $this->escape($this->user->get('Passport'));?>" size="40" /> (somente para estrangeiros)	</td>
</tr>
<tr>
	<td>
		<label for="email">
			<?php echo JText::_( 'email' ); ?>:		</label>	</td>
	<td>
		<input class="inputbox required validate-email" type="text" id="email" name="email" value="<?php echo $this->escape($this->user->get('email'));?>" size="40" />
		* </td>
</tr>
<?php if($this->user->get('password')) : ?>
<tr>
	<td>
		<label for="password">
			<?php echo JText::_( 'Password' ); ?>:		</label>	</td>
	<td>
		<input class="inputbox validate-password" type="password" id="password" name="password" value="" size="40" /></td>
</tr>
<tr>
	<td>
		<label for="password2">
			<?php echo JText::_( 'Verify Password' ); ?>:		</label>	</td>
	<td>
		<input class="inputbox validate-passverify" type="password" id="password2" name="password2" size="40" /></td>
</tr>
<!-- NOVOS CAMPOS -->

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
	<td><label id="cpfmsg" for="cpf"><?php echo JText::_( 'CPF' ); ?>:</label>	</td>
	<td><input type="text" id="cpf" name="cpf" size="13" value="<?php echo $this->escape($this->user->get( 'cpf' ));?>" class="inputbox_user" maxlength="11" />	   (somente para residentes no Brasil)	</td>
</tr>
<tr>
  <td><label id="rgmsg" for="rg"><?php echo JText::_( 'RG' ); ?>:</label></td>
  <td><input name="rg" type="text" value="<?php echo $this->escape($this->user->get( 'rg' ));?>" size="20" maxlength="20" class="inputbox_user required" />
    *</td>
</tr>
<tr>
  <td><label id="orgao_expedidormsg" for="orgao_expedidor"><?php echo JText::_( '&Oacute;rg&atilde;o Expedidor' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="orgao_expedidor" type="text" value="<?php echo $this->escape($this->user->get( 'orgao_expedidor' ));?>" size="15" maxlength="20" />
    *</td>
</tr>
<tr>
  <td><label id="sexomsg" for="sexo"><?php echo JText::_( 'Sexo' ); ?>:</label></td>
  <td><input type="radio" name="sexo" value="Masculino" <?php if ($this->escape($this->user->get( 'sexo' ))=="Masculino"){ print "checked";}?>  />Masculino &nbsp;
    <input type="radio" name="sexo" value="Feminino" <?php if ($this->escape($this->user->get( 'sexo' ))=="Feminino"){ print "checked";}?> />Feminino </td>
</tr>
<tr>
  <td><label id="data_nascimentomsg" for="data_nascimento"><?php echo JText::_( 'Data Nascimento' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="data_nascimento" type="text" value="<?php echo $this->escape($this->user->get( 'data_nascimento' ));?>" size="10" maxlength="10" />     (dd/mm/aaaa)*</td>
</tr>
<tr>
  <td><label id="nacionalidademsg" for="nacionalidade"><?php echo JText::_( 'Nacionalidade' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="nacionalidade" type="text" id="nacionalidade" value="<?php echo $this->escape($this->user->get( 'nacionalidade' ));?>" size="50" maxlength="50" />
    *</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><label id="titulacao_academicamsg" for="titulacao_academica"><?php echo JText::_( 'Titula&ccedil;&atilde;o Acad&ecirc;mica' ); ?>:</label></td>
  <td><select class="inputbox_user required" name="titulacao_academica">
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
  <td><label id="sigla_instituicaomsg" for="sigla_instituicao"><?php echo JText::_( 'Sigla da Institui&ccedil;&atilde;o' ); ?>:</label></td>
  <td><input class="inputbox_user required" type="text" size="40" name="sigla_instituicao" maxlength="25" value="<?php echo $this->escape($this->user->get( 'sigla_instituicao' ));?>" />
    * </td>
</tr>
<tr >
  <td><label id="cargomsg" for="cargo_instituicao"><?php echo JText::_( 'Cargo / Fun&ccedil;&atilde;o' ); ?>: </label></td>
  <td><input class="inputbox_user required" name="cargo" type="text" value="<?php echo $this->escape($this->user->get( 'cargo' ));?>" size="40" maxlength="60" />
    * </td>
</tr>
<tr >
  <td><label id="area_atuacaomsg" for="area_atuacao"><?php echo JText::_( '&Aacute;rea de atua&ccedil;&atilde;o na LA' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="area_atuacao" type="text" value="<?php echo $this->escape($this->user->get( 'area_atuacao' ));?>" size="40" maxlength="60" /> *
  
  <!--<select class="inputbox_user" name="area_atuacao">
	  <?php //if ($this->escape($this->user->get( 'area_atuacao' ))!=""){ ?>
      <option value="<?php //echo $this->escape($this->user->get( 'area_atuacao' ));?>"><?php //echo $this->escape($this->user->get( 'area_atuacao' ));?></option>
      <?php //}else{?>
		<option value=""> Selecione a &aacute;rea de atua&ccedil;&atilde;o </option>
      <?php //}?>  
    <option value="Fon&eacute;tica e fonologia">Fon&eacute;tica e fonologia</option>
    <option value="Ensino de l&iacute;ngua(s)">Ensino de l&iacute;ngua(s)</option>
    <option value="Pr&aacute;ticas Sociais da Linguagem">Pr&aacute;ticas Sociais da Linguagem</option>
    <option value="Tradu&ccedil;&atilde;o">Tradu&ccedil;&atilde;o</option>
    <option value="Terminologia">Terminologia</option>
    <option value="Lingu&iacute;stica de corpus e computacional">Lingu&iacute;stica de corpus e computacional</option>
    <option value="Morfologia e sintaxe">Morfologia e sintaxe</option>
    <option value="Sem&acirc;ntica e pragm&aacute;tica">Sem&acirc;ntica e pragm&aacute;tica</option>
    <option value="Sociolingu�stica e dialetologia">Sociolingu&iacute;stica e dialetologia</option>
    <option value="Lingu&iacute;stica hist&oacute;rica">Lingu&iacute;stica hist&oacute;rica</option>
    <option value="Psicolingu&iacute;stica e aquisi&ccedil;&atilde;o da linguagem">Psicolingu&iacute;stica e aquisi&ccedil;&atilde;o da linguagem</option>
    <option value="An&aacute;lise do texto e do discurso">An&aacute;lise do texto e do discurso</option>
    <option value="Alfabetiza&ccedil;&atilde;o e Letramento">Alfabetiza&ccedil;&atilde;o e Letramento</option>
    <option value="L&iacute;nguas Ind&iacute;genas">L&iacute;nguas Ind&iacute;genas</option>
  </select>  --></td>
</tr>
<tr >
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td><b>Forma&ccedil;&atilde;o Acad&ecirc;mica</b></td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="2"><table border="0" width="460">
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <td width="165">Institui&ccedil;&atilde;o</span></td>
        <td width="165">Curso</span></td>
        <td width="165">Cidade</span></td>
        <td>Ano</td>
      </tr>
      <tr >
        <td width="108" >Gradua&ccedil;&atilde;o</td>
        <td width="165" ><input class="inputbox_user" name="instituicao_GR" type="text" id="instituicao_GR" value="<?php echo $this->escape($this->user->get( 'instituicao_GR' ));?>" size="20" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="curso_GR" type="text" id="curso_GR" value="<?php echo $this->escape($this->user->get( 'curso_GR' ));?>" size="18" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="cidade_GR" type="text" id="cidade_GR" value="<?php echo $this->escape($this->user->get( 'cidade_GR' ));?>" size="12" maxlength="50" />        </td>
        <td width="86" ><input class="inputbox_user" name="ano_conclusao_GR" type="text" id="ano_conclusao_GR" value="<?php echo $this->escape($this->user->get( 'ano_conclusao_GR' ));?>" size="5" maxlength="4" /></td>
      </tr>
      <tr >
        <td width="108" >Especializa&ccedil;&atilde;o</td>
        <td width="165" ><input class="inputbox_user" name="instituicao_ES" type="text" id="instituicao_ES" value="<?php echo $this->escape($this->user->get( 'instituicao_ES' ));?>" size="20" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="curso_ES" type="text" id="curso_ES" value="<?php echo $this->escape($this->user->get( 'curso_ES' ));?>" size="18" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="cidade_ES" type="text" id="cidade_ES" value="<?php echo $this->escape($this->user->get( 'cidade_ES' ));?>" size="12" maxlength="50" />        </td>
        <td width="86" ><input class="inputbox_user" name="ano_conclusao_ES" type="text" id="ano_conclusao_ES" value="<?php echo $this->escape($this->user->get( 'ano_conclusao_ES' ));?>" size="5" maxlength="4" />        </td>
      </tr>
      <tr >
        <td width="108" >Mestrado</td>
        <td width="165" ><input class="inputbox_user" name="instituicao_MT" type="text" id="instituicao_MT" value="<?php echo $this->escape($this->user->get( 'instituicao_MT' ));?>" size="20" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="curso_MT" type="text" id="curso_MT" value="<?php echo $this->escape($this->user->get( 'curso_MT' ));?>" size="18" maxlength="100" />        </td>
        <td width="165" ><input class="inputbox_user" name="cidade_MT" type="text" id="cidade_MT" value="<?php echo $this->escape($this->user->get( 'cidade_MT' ));?>" size="12" maxlength="50" />        </td>
        <td width="86" ><input class="inputbox_user" name="ano_conclusao_MT" type="text" id="ano_conclusao_MT" value="<?php echo $this->escape($this->user->get( 'ano_conclusao_MT' ));?>" size="5" maxlength="4" />        </td>
      </tr>
      <tr>
        <td>Doutorado</td>
        <td width="165" ><input class="inputbox_user" name="instituicao_DR" type="text" id="instituicao_DR" value="<?php echo $this->escape($this->user->get( 'instituicao_DR' ));?>" size="20" maxlength="100" /></td>
        <td width="165" ><input class="inputbox_user" name="curso_DR" type="text" id="curso_DR" value="<?php echo $this->escape($this->user->get( 'curso_DR' ));?>" size="18" maxlength="100" /></td>
        <td width="165" ><input class="inputbox_user" name="cidade_DR" type="text" id="cidade_DR" value="<?php echo $this->escape($this->user->get( 'cidade_DR' ));?>" size="12" maxlength="50" /></td>
        <td><input class="inputbox_user" name="ano_conclusao_DR" type="text" id="ano_conclusao_DR" value="<?php echo $this->escape($this->user->get( 'ano_conclusao_DR' ));?>" size="5" maxlength="4" /></td>
      </tr>
    </tbody>
  </table></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><strong>Cadastro de Endere&ccedil;os</b> </td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><b>Residencial</b></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><label id="endereco_resmsg" for="endereco_res"><?php echo JText::_( 'Endere&ccedil;o' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="endereco_res" type="text" id="endereco_res" value="<?php echo $this->escape($this->user->get( 'endereco_res' ));?>" size="50" maxlength="70" />
    *</td>
</tr>
<tr>
  <td><label id="complemento_resmsg" for="complemento_res"><?php echo JText::_( 'Complemento' ); ?>:</label></td>
  <td><input class="inputbox_user" name="complemento_res" type="text" id="complemento_res" value="<?php echo $this->escape($this->user->get( 'complemento_res' ));?>" size="20" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="bairro_resmsg" for="bairro_res"><?php echo JText::_( 'Bairro' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="bairro_res" type="text" id="bairro_res" value="<?php echo $this->escape($this->user->get( 'bairro_res' ));?>" size="40" maxlength="50" />
    *</td>
</tr>
<tr>
  <td><label id="cidade_resmsg" for="cidade_res"><?php echo JText::_( 'Cidade' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="cidade_res" type="text" id="cidade_res" value="<?php echo $this->escape($this->user->get( 'cidade_res' ));?>" size="30" maxlength="50" />
    *</td>
</tr>
<tr>
  <td><label id="estado_resmsg" for="estado_res"><?php echo JText::_( 'Estado' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="estado_res" type="text" id="estado_res" value="<?php echo $this->escape($this->user->get( 'estado_res' ));?>" size="30" maxlength="50" />
    *</td>
</tr>
<tr>
  <td><label id="pais_resmsg" for="pais_res"><?php echo JText::_( 'Pa&iacute;s' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="pais_res" type="text" id="pais_res" value="<?php echo $this->escape($this->user->get( 'pais_res' ));?>" size="25" maxlength="50" />
    *</td>
</tr>
<tr>
  <td><label id="cep_resmsg" for="cep_res"><?php echo JText::_( 'CEP' ); ?>:</label></td>
  <td><input class="inputbox_user required" name="cep_res" type="text" id="cep_res" value="<?php echo $this->escape($this->user->get( 'cep_res' ));?>" size="12" maxlength="10" />
    *</td>
</tr>
<tr>
  <td><label id="telefone_resmsg" for="telefone_res"><?php echo JText::_( 'Telefone' ); ?>:</label></td>
  <td><input class="inputbox_user" name="telefone_res" type="text" id="telefone_res" value="<?php echo $this->escape($this->user->get( 'telefone_res' ));?>" size="15" maxlength="20" /></td>
</tr>
<tr>
  <td><label id="celularmsg" for="celular"><?php echo JText::_( 'Celular' ); ?>:</label></td>
  <td><input class="inputbox_user" name="celular" type="text" id="celular" value="<?php echo $this->escape($this->user->get( 'celular' ));?>" size="15" maxlength="20" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><b>Profissional</b></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><label id="instituicao_profmsg" for="instituicao_prof"><?php echo JText::_( 'Institui&ccedil;&atilde;o' ); ?>:</label></td>
  <td><input class="inputbox_user" name="instituicao_prof" type="text" id="instituicao_prof" value="<?php echo $this->escape($this->user->get( 'instituicao_prof' ));?>" size="50" maxlength="70" /></td>
</tr>
<tr>
  <td><label id="departamento_profmsg" for="departamento_prof"><?php echo JText::_( 'Departamento' ); ?>:</label></td>
  <td><input class="inputbox_user" name="departamento_prof" type="text" id="departamento_prof" value="<?php echo $this->escape($this->user->get( 'departamento_prof' ));?>" size="50" maxlength="70" /></td>
</tr>
<tr>
  <td><label id="endereco_profmsg" for="endereco_prof"><?php echo JText::_( 'Endere&ccedil;o' ); ?>:</label></td>
  <td><input class="inputbox_user" name="endereco_prof" type="text" id="endereco_prof" value="<?php echo $this->escape($this->user->get( 'endereco_prof' ));?>" size="50" maxlength="70" /></td>
</tr>
<tr>
  <td><label id="complemento_profmsg" for="complemento_prof"><?php echo JText::_( 'Complemento' ); ?>:</label></td>
  <td><input class="inputbox_user" name="complemento_prof" type="text" id="complemento_prof" value="<?php echo $this->escape($this->user->get( 'complemento_prof' ));?>" size="20" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="bairro_profmsg" for="bairro_prof"><?php echo JText::_( 'Bairro' ); ?>:</label></td>
  <td><input class="inputbox_user" name="bairro_prof" type="text" id="bairro_prof" value="<?php echo $this->escape($this->user->get( 'bairro_prof' ));?>" size="40" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="cidade_profmsg" for="cidade_prof"><?php echo JText::_( 'Cidade' ); ?>:</label></td>
  <td><input class="inputbox_user" name="cidade_prof" type="text" id="cidade_prof" value="<?php echo $this->escape($this->user->get( 'cidade_prof' ));?>" size="30" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="estado_profmsg" for="estado_prof"><?php echo JText::_( 'Estado' ); ?>:</label></td>
  <td><input class="inputbox_user" name="estado_prof" type="text" id="estado_prof" value="<?php echo $this->escape($this->user->get( 'estado_prof' ));?>" size="30" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="pais_profmsg" for="pais_prof"><?php echo JText::_( 'Pa&iacute;s' ); ?>:</label></td>
  <td><input class="inputbox_user" name="pais_prof" type="text" id="pais_prof" value="<?php echo $this->escape($this->user->get( 'pais_prof' ));?>" size="25" maxlength="50" /></td>
</tr>
<tr>
  <td><label id="cep_profmsg" for="cep_prof"><?php echo JText::_( 'CEP' ); ?>:</label></td>
  <td><input class="inputbox_user" name="cep_prof" type="text" id="cep_prof" value="<?php echo $this->escape($this->user->get( 'cep_prof' ));?>" size="12" maxlength="10" /></td>
</tr>
<tr>
  <td><label id="telefone_profmsg" for="telefone_prof"><?php echo JText::_( 'Telefone' ); ?>:</label></td>
  <td><input class="inputbox_user" name="telefone_prof" type="text" id="telefone_prof" value="<?php echo $this->escape($this->user->get( 'telefone_prof' ));?>" size="15" maxlength="20" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<!--<tr >
  <td><label id="endereco_envio" for="endereco_envio"><?php //echo JText::_( 'Endere&ccedil;o para correspond&ecirc;ncia' ); ?>:</label></td>
  <td><input type="radio" name="endereco_envio" value="Residencial" />
    Residencial &nbsp;
    <input type="radio" name="endereco_envio" value="Profissional" />
    Profissional </td>
</tr>-->
<?php if( ($this->user->get('tipo_anuidade')=="Pleno") || ($this->user->get('tipo_anuidade')=="Aluno") ){ ?>
	<tr>
	  <td colspan="2"><b>Valor da anuidade:</b></td>
	</tr>
	<tr>
	  <td colspan="2"><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Pleno" <?php if( $this->escape($this->user->get('tipo_anuidade')) == "Pleno") print "checked";?>/>
	  S&oacute;cio Pleno (R$ 100,00)</td>
	</tr>
	<tr>
	  <td colspan="2"><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Aluno" <?php if( $this->escape($this->user->get('tipo_anuidade')) == "Aluno") print "checked";?>/>
	  Aluno de Gradua&ccedil;&atilde;o ou de P&oacute;s-Gradua&ccedil;&atilde;o (R$ 50,00)</td>
	</tr>
<?php }//fim if ?>
<tr >
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>



<!-- NOVOS CAMPOS -->
<?php endif; ?>
</table>
<?php //if(isset($this->params)) :  echo $this->params->render( 'params' ); endif; ?>
	<button class="button validate" type="submit" onclick="submitbutton( this.form );return false;"><?php echo JText::_('Save'); ?></button>

	<input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
	<input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
	<input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="save" />
	<?php echo JHTML::_( 'form.token' ); ?>
    
    <!-- MAMBOLETO -->
    <?php 
	$data_documento = date("d/m/Y") ;
	$vencimento = date("d/m/Y",time()+3600*24*7);
	//$valor_documento="60,00";  
	$nosso_numero= $this->escape($this->user->get( 'id' ));
	$numero_documento= $this->escape($this->user->get( 'id' ));
	//$id_banco=3; //id do boleto a ser emetido 3 -> Bradesco
	$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil
	$sacado=$this->escape($this->user->get( 'name' ));
	$endereco=$this->escape($this->user->get( 'endereco_res' ));
	$cgc_cpf=$this->escape($this->user->get( 'cpf' ));
	?>
   	<input type="hidden" name="data_documento" value="<?php echo $data_documento;?>" />
    <input type="hidden" name="vencimento" value="<?php echo $vencimento;?>" />
   	<!--<input type="hidden" name="valor_documento" value="<?php //echo $valor_documento;?>" />-->
    <input type="hidden" name="nosso_numero" value="<?php echo $nosso_numero;?>" />
   	<input type="hidden" name="numero_documento" value="<?php echo $numero_documento;?>" />
    <input type="hidden" name="id_banco" value="<?php echo $id_banco;?>" />
   	<input type="hidden" name="sacado" value="<?php echo $sacado;?>" />
    <input type="hidden" name="endereco" value="<?php echo $endereco;?>" />
   	<input type="hidden" name="cgc_cpf" value="<?php echo $cgc_cpf;?>" />
    <!-- MAMBOLETO -->    
</form>
