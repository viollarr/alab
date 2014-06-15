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
			
		} else if ((form.tipo_documento[0].checked) || (form.tipo_documento[1].checked)) {
			if ((trim(form.cpf.value) == "") && (form.tipo_documento[0].checked)){
				alert( "<?php echo JText::_( 'Você deve informar um CPF.', true ); ?>" );
			} else if((trim(form.Passport.value) == "") && (form.tipo_documento[1].checked)){
				alert( "<?php echo JText::_( 'Você deve informar um PASSAPORTE.', true ); ?>" );
			} else {
				submitform( pressbutton );	
			}
			
		} else if ((form.tipo_residencia[0].checked) || (form.tipo_residencia[1].checked)) {
			var valida_est_cid = 0;
			if(form.tipo_residencia[0].checked){
				if ((trim(form.id_estado_res.value) == "") || (trim(form.id_cidade_res.value) == "")){
					alert( "<?php echo JText::_( 'Você deve selecionar uma Cidade e um Estado.', true ); ?>" );
				}
				else{
					valida_est_cid++;	
				}
			}
			else if(form.tipo_residencia[1].checked){
				if((trim(form.estado_res.value) == "") || (trim(form.cidade_res.value) == "")){
					alert( "<?php echo JText::_( 'Você deve informar uma Cidade e um Estado.', true ); ?>" );
				}
				else{
					valida_est_cid++;
				}
			}
			if (valida_est_cid > 0){
				submitform( pressbutton );
			}
			
		}
		else {
			submitform( pressbutton );

		}

	}



	function gotocontact( id ) {

		var form = document.adminForm;

		form.contact_id.value = id;

		submitform( 'contact' );

	}

</script>
<script src="components/com_users/views/user/tmpl/jquery.maskedinput-1.3.js"></script>
<script language="javascript" type="text/javascript">

jQuery(document).ready(function() {
	
	jQuery("#cpf").mask("999.999.999-99");
	jQuery("#data_nascimento").mask("99/99/9999");
	//jQuery("#cep_res").mask("99999-999");
	//jQuery("#cep_prof").mask("99999-999");

	if(jQuery("#escolha2").is(":checked")){
	   jQuery('#cpf_v').hide();
	}
	else if(jQuery("#escolha1").is(":checked")){
	   jQuery('#passaporte_v').hide();
	}
	else{
	   jQuery('#passaporte_v').hide();
	   jQuery('#cpf_v').hide();
	}
	
	jQuery('#escolha1').click(function(){
		jQuery('#passaporte_v').hide();	
		jQuery('#cpf_v').show();
	});
	jQuery('#escolha2').click(function(){
		jQuery('#cpf_v').hide();	
		jQuery('#passaporte_v').show();
	});	
	
// PARA  EXIBIR E OCULTAR OS TIPOS DE RESIDENCIAS  inputbox_user required
	
	if(jQuery("#escolha3").is(":checked")){
		jQuery('#estrangeiro').hide();
		jQuery('#estrangeiro1').hide();
		jQuery('#estrangeiro2').hide();
		jQuery('#estrangeiro3').hide();

	}
	else if(jQuery("#escolha4").is(":checked")){
		jQuery('#nacional').hide();
		jQuery('#nacional1').hide();
		jQuery('#nacional2').hide();
		jQuery('#nacional3').hide();
	}
	else{
		jQuery('#estrangeiro').hide();
		jQuery('#estrangeiro1').hide();
		jQuery('#estrangeiro2').hide();
		jQuery('#estrangeiro3').hide();
		jQuery('#nacional').hide();
		jQuery('#nacional1').hide();
		jQuery('#nacional2').hide();
		jQuery('#nacional3').hide();
	}
	
	jQuery('#escolha3').click(function(){
		jQuery('#estrangeiro').hide();
		jQuery('#estrangeiro1').hide();
		jQuery('#estrangeiro2').hide();
		jQuery('#estrangeiro3').hide();
		jQuery('#nacional').show();
		jQuery('#nacional1').show();
		jQuery('#nacional2').show();
		jQuery('#nacional3').show();
	});
	jQuery('#escolha4').click(function(){
		jQuery('#nacional').hide();
		jQuery('#nacional1').hide();
		jQuery('#nacional2').hide();
		jQuery('#nacional3').hide();
		jQuery('#estrangeiro').show();
		jQuery('#estrangeiro1').show();
		jQuery('#estrangeiro2').show();
		jQuery('#estrangeiro3').show();
	});	
 
jQuery(function(){
	var idCidade = jQuery('#cidade_id_res').val();
	jQuery('#id_estado_res').change(function(){
		if( jQuery(this).val() ) {
			jQuery('#id_cidade_res').hide();
			jQuery('.carregando').show();
			jQuery.getJSON('components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: jQuery(this).val(), ajax: 'true'}, function(j){
				//var options = '<option value=""></option>';	
				 var option = new Array();
				for (var i = 0; i < j.length; i++) {
					
					option[i] = document.createElement('option');//criando o option
								jQuery( option[i] ).attr( {value : j[i].cod_cidades, selected : ( idCidade == j[i].cod_cidades ) ? true : false } );//colocando o value no option
								jQuery( option[i] ).append( j[i].nome );//colocando o 'label'
								
					//options += '<option value="' + j[i].cod_cidades + '" >' + j[i].nome + '</option>';
				}	
				jQuery('#id_cidade_res').html(option).show();
				jQuery('.carregando').hide();
			});
		} else {
			jQuery('#id_cidade_res').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});

jQuery(function(){
	var idCidade2 = jQuery('#cidade_id_prof').val();
	jQuery('#id_estado_prof').change(function(){
		if( jQuery(this).val() ) {
			jQuery('#id_cidade_prof').hide();
			jQuery('.carregando').show();
			jQuery.getJSON('components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: jQuery(this).val(), ajax: 'true'}, function(j){
				//var options = '<option value=""></option>';	
				 var option = new Array();
				for (var i = 0; i < j.length; i++) {
					
					option[i] = document.createElement('option');//criando o option
								jQuery( option[i] ).attr( {value : j[i].cod_cidades, selected : ( idCidade2 == j[i].cod_cidades ) ? true : false } );//colocando o value no option
								jQuery( option[i] ).append( j[i].nome );//colocando o 'label'
								
					//options += '<option value="' + j[i].cod_cidades + '" >' + j[i].nome + '</option>';
				}	
				jQuery('#id_cidade_prof').html(option).show();
				jQuery('.carregando').hide();
			});
		} else {
			jQuery('#id_cidade_prof').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});


});

function validar(obj) { // recebe um objeto
    var s = (obj.value).replace(/\D/g,'');
    var tam=(s).length; // removendo os caracteres não numéricos
// se for CPF
    if (tam==11 ){
        if (!validaCPF(s)){ // chama a função que valida o CPF
            obj.focus();
			alert("'"+obj.value+"' Não é um CPF válido!" ); // se quiser mostrar o erro
            //obj.select();  // se quiser selecionar o campo em questão
            return false;
        }
        obj.value=s;    // se validou o CPF mascaramos corretamente
        return true;
    }
	else{
		obj.focus();
        alert("'"+s+"' Não é do tipo CPF!" ); // tamanho inválido
        return false;
	}
}
// fim da funcao validar()
// funcao que valida CPF
// O algortimo de validao de CPF  baseado em clculos
// para o dgito verificador (os dois ltimos)
// No entrarei em detalhes de como funciona
function validaCPF(s) {
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    for (var i=0; i<9; i++) {
        d1 += c.charAt(i)*(10-i);
     }
    if (d1 == 0) return false;
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        return false;
    }
    d1 *= 2;
    for (var i = 0; i < 9; i++)    {
         d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        return false;
    }
    return true;
}

function nu(campo){
	var digits="0123456789"
	var campo_temp 
	for (var i=0;i<campo.value.length;i++){
		campo_temp=campo.value.substring(i,i+1) 
		if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
		}
	}
}
function ValidaEmail(){
  var obj = eval("document.forms[0].email");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 1))){
    obj.focus();
	alert('Email incorreto');
  }
}

function Residencia(){
	if((jQuery("#escolha3").is(":checked"))||(jQuery("#escolha4").is(":checked"))){

	}
	else{
		alert("Selecione o Tipo de residência acima");
	}
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
                
                <?php
					$ano1 = date('Y');
					$ano2 = (date('Y')-1);
					$ano3 = (date('Y')-2);
					
					
					foreach ($this->inadimplente AS $key => $inadimplente){
						if($inadimplente['nome'] == $ano3){
							$check_inadimplentes_3 = true;
						} 
						if($inadimplente['nome'] == $ano2){
							$check_inadimplentes_2 = true;
						} 
						if($inadimplente['nome'] == $ano1){
							$check_inadimplentes_1 = true;
						}
					}
				?>
				
				<tr>

					<td class="key">

						<label for="Anuidade<?php echo $ano3;?>">

							<?php echo JText::_( 'Anuidade '.$ano3 ); ?>						</label>					</td>

					<td>

						<input type="radio" name="Anuidade3" value="<?php echo $ano3; ?>" <?php if ($check_inadimplentes_3){ print "checked";}?>  />Sim 

                        &nbsp;

    					<input type="radio" name="Anuidade3" value="<?php echo "NO".$ano3; ?>" <?php if (!$check_inadimplentes_3){ print "checked";}?> />Não	

                        

					</td>

				</tr>

				<tr>

					<td class="key">

						<label for="Anuidade<?php echo $ano2;?>">

							<?php echo JText::_( 'Anuidade '.$ano2 ); ?>						</label>					</td>

					<td>

						<input type="radio" name="Anuidade2" value="<?php echo $ano2; ?>" <?php if ($check_inadimplentes_2){ print "checked";}?>  />Sim 

                        &nbsp;

    					<input type="radio" name="Anuidade2" value="<?php echo "NO".$ano2; ?>" <?php if (!$check_inadimplentes_2){ print "checked";}?> />Não	

                        

					</td>

				</tr>

				<tr>

					<td class="key">

						<label for="Anuidade<?php echo $ano1;?>">

							<?php echo JText::_( 'Anuidade '.$ano1 ); ?>						</label>					</td>

					<td>

						<input type="radio" name="Anuidade1" value="<?php echo $ano1; ?>" <?php if ($check_inadimplentes_1){ print "checked";}?>  />Sim 

                        &nbsp;

    					<input type="radio" name="Anuidade1" value="<?php echo "NO".$ano1; ?>" <?php if (!$check_inadimplentes_1){ print "checked";}?> />Não	

                        

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

						<label for="email">

							<?php echo JText::_( 'Email' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="email" id="email" size="40" onchange="ValidaEmail(this);" value="<?php echo $this->user->get('email'); ?>" />

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
						<label for="escolha">
							<?php echo JText::_( 'Tipo de Documento' ); ?>
						</label>
                    </td>
					<td>
                    	<input type="radio" name="tipo_documento" id="escolha1" value="1" <?php if($this->user->get('tipo_documento')==1){ echo 'checked="checked"'; } ?> />CPF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="tipo_documento" id="escolha2" value="2" <?php if($this->user->get('tipo_documento')==2){ echo 'checked="checked"'; } ?> /> Passaporte
					</td>
                </tr>
                
              <!--               -->
				<tr id="passaporte_v">

					<td class="key">

						<label for="Passport">

							<?php echo JText::_( 'Passport' ); ?>						</label>					</td>

					<td>

						<input type="text" name="Passport" id="Passport" class="inputbox" size="40" value="<?php echo $this->user->get('Passport'); ?>" autocomplete="off" />

* </td>

				</tr>

                <tr id="cpf_v">

					<td class="key">

						<label for="cpf">

							<?php echo JText::_( 'CPF' ); ?>						</label>					</td>

					<td>
                    	<?php
							if($this->user->get('cpf') != ''){
								$cpf_formatado =  substr($this->user->get('cpf'), 0,3).'.'.substr($this->user->get('cpf'), 3,3).'.'.substr($this->user->get('cpf'), 6,3).'-'.substr($this->user->get('cpf'), 9,2);
							}
						?>
						<input class="inputbox" type="text" name="cpf" id="cpf" onblur="validar(this)" size="40" value="<?php echo $cpf_formatado; ?>" />

* </td>

				</tr>

                

                <tr>

					<td class="key">

						<label for="rg">

							<?php echo JText::_( 'RG' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="rg" id="rg" size="40" onKeyUp="nu(this)" value="<?php echo $this->user->get('rg'); ?>" />

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
						<label for="escolha">
							<?php echo JText::_( 'Tipo de Residência' ); ?>
						</label>
                    </td>
					<td>
                    	<input type="radio" name="tipo_residencia" id="escolha3" value="1" <?php if($this->user->get('tipo_residencia')==1){ echo 'checked="checked"'; } ?> />Brasil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="tipo_residencia" id="escolha4" value="2" <?php if($this->user->get('tipo_residencia')==2){ echo 'checked="checked"'; } ?> /> Outro país
					</td>
                </tr>  
                <tr>

					<td class="key">

						<label for="endereco_res">

							<?php echo JText::_( 'Endere&ccedil;o' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="endereco_res" id="endereco_res" size="40" onblur="Residencia(this);" value="<?php echo $this->user->get('endereco_res'); ?>" />

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
                <tr id="nacional">
                	<td class="key">
                    	<label for="id_estado_res">
							<a><?php echo JText::_( 'Estado' ); ?></a>
						</label>
                    </td>
                    <td>
						<select name="id_estado_res" id="id_estado_res">
							<option value=""></option>
							<?php
                               foreach($this->estados AS $estado){
								   if($this->user->get('id_estado_res') == $estado['cod_estados']){
									   $select = 'selected="selected"';
								   }
								   else{
									 	$select = '';  
								   }
                                    echo '<option uf="'.$estado['sigla'].'" value="'.$estado['cod_estados'].'" '.$select.'>'.$estado['nome'].'</option>';
                                }
                            ?>
							</option>
                      	</select> 
                        <?php
							if($this->user->get('id')!=""){
								if($this->user->get("id_estado_res") == ''){
									echo "Atualize para ( <b>".$this->user->get('estado_res')."</b> )";
								}
							}
                        ?>
                    </td>
                </tr>
                <tr id="nacional1">
                	<td class="key">
                    	<label for="id_cidade_res">
							<a><?php echo JText::_( 'Cidade' ); ?></a>
						</label>
                    </td>
                    <td id="nacional">
                    	<input type="hidden" name="cidade_id_res" id="cidade_id_res" value="<?php echo $this->user->get('id_cidade_res');?>" />
						<select name="id_cidade_res" id="id_cidade_res">
							<option value="">-- Escolha um estado --</option>
							<?php
							if ($this->user->get('id_cidade_res') != ""){
                               foreach($this->cidades_res AS $cidade){
								   if($this->user->get('id_cidade_res') == $cidade['cod_cidades']){
									   $select = 'selected="selected"';
								   }
								   else{
									 	$select = '';  
								   }
                                    echo '<option value="'.$cidade['cod_cidades'].'" '.$select.'>'.$cidade['nome'].'</option>';
                                }
							}
                            ?>
                            
                            
						</select> 
                        <?php
							if($this->user->get('id')!=""){
								if($this->user->get("id_cidade_res") == ''){
									echo "Atualize para ( <b>".$this->user->get('cidade_res')."</b> )";
								}
							}
                        ?>
                    </td>
                </tr>
                <tr id="estrangeiro">

					<td class="key">

						<label for="cidade_prof">

							<?php echo JText::_( 'Cidade' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="cidade_prof" id="cidade_prof" size="40" value="<?php echo $this->user->get('cidade_res'); ?>" />					</td>

				</tr>

                <tr id="estrangeiro1">

					<td class="key">

						<label for="estado_prof">

							<?php echo JText::_( 'Estado' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="estado_prof" id="estado_prof" size="40" value="<?php echo $this->user->get('estado_res'); ?>" />					</td>

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
                <tr id="nacional2">
                	<td class="key">
                    	<label for="estado_prof">
							<a><?php echo JText::_( 'Estado' ); ?></a>
						</label>
                    </td>
                    <td>
						<select name="id_estado_prof" id="id_estado_prof">
							<option value=""></option>
							<?php
                               foreach($this->estados AS $estado){
								   if($this->user->get('id_estado_prof') == $estado['cod_estados']){
									   $select = 'selected="selected"';
								   }
								   else{
									 	$select = '';  
								   }
                                    echo '<option uf="'.$estado['sigla'].'" value="'.$estado['cod_estados'].'" '.$select.'>'.$estado['nome'].'</option>';
                                }
                            ?>
							</option>
                      	</select>
                    </td>
                </tr>
                <tr id="nacional3">
                	<td class="key">
                    	<label for="cidade_prof">
							<a><?php echo JText::_( 'Cidade' ); ?></a>
						</label>
                    </td>
                    <td>
                    	<input type="hidden" name="cidade_id_prof" id="cidade_id_prof" value="<?php echo $this->user->get('id_cidade_prof');?>" />
						<select name="id_cidade_prof" id="id_cidade_prof">
							<option value="">-- Escolha um estado --</option>
							<?php
							if ($this->user->get('id_cidade_prof') != ""){
                               foreach($this->cidades_prof AS $cidade){
								   if($this->user->get('id_cidade_prof') == $cidade['cod_cidades']){
									   $select = 'selected="selected"';
								   }
								   else{
									 	$select = '';  
								   }
                                    echo '<option value="'.$cidade['cod_cidades'].'" '.$select.'>'.$cidade['nome'].'</option>';
                                }
							}
                            ?>
                            
                            
						</select>
                    </td>
                </tr>
                <tr id="estrangeiro2">

					<td class="key">

						<label for="cidade_prof">

							<?php echo JText::_( 'Cidade' ); ?>						</label>					</td>

					<td>

						<input class="inputbox" type="text" name="cidade_prof" id="cidade_prof" size="40" value="<?php echo $this->user->get('cidade_prof'); ?>" />					</td>

				</tr>
                <tr id="estrangeiro3">

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

