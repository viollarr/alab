<?php // no direct access

defined('_JEXEC') or die('Restricted access');?>


<script type="text/javascript">

<!--

	Window.onDomReady(function(){

		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);

	});

// -->

</script>
<script src="administrator/components/com_users/views/user/tmpl/jquery.maskedinput-1.3.js"></script>

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
		jQuery("#cpf").focus();
	});
	jQuery('#escolha2').click(function(){
		jQuery('#cpf_v').hide();	
		jQuery('#passaporte_v').show();
		jQuery("#Passport").focus();
	});	

// PARA  EXIBIR E OCULTAR OS TIPOS DE RESIDENCIAS  inputbox_user required
	
	if(jQuery("#escolha3").is(":checked")){
		jQuery('#estrangeiro').hide();
		jQuery('#estrangeiro1').hide();
		jQuery('#estrangeiro2').hide();
		jQuery('#estrangeiro3').hide();
		jQuery('#id_estado_res').addClass("required");
		jQuery('#id_cidade_res').addClass("required");

	}
	else if(jQuery("#escolha4").is(":checked")){
		jQuery('#nacional').hide();
		jQuery('#nacional1').hide();
		jQuery('#nacional2').hide();
		jQuery('#nacional3').hide();
		jQuery('#estado_res').addClass("required");
		jQuery('#cidade_res').addClass("required");
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
		jQuery('#id_estado_res').addClass("required");
		jQuery('#id_cidade_res').addClass("required");
		jQuery('#estado_res').addClass("required");
		jQuery('#cidade_res').addClass("required");
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
		jQuery('#tipo_residencia').removeAttr("class")
		jQuery('#id_estado_res').addClass("required");
		jQuery('#id_cidade_res').addClass("required");
		jQuery('#estado_res').removeClass("required");
		jQuery('#cidade_res').removeClass("required");
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
		jQuery('#tipo_residencia').removeAttr("class");
		jQuery('#estado_res').addClass("required");
		jQuery('#cidade_res').addClass("required");
		jQuery('#id_estado_res').removeClass("required");
		jQuery('#id_cidade_res').removeClass("required");
	});	
	
 
jQuery(function(){
	var idCidade = jQuery('#cidade_id_res').val();
	jQuery('#id_estado_res').change(function(){
		if( jQuery(this).val() ) {
			jQuery('#id_cidade_res').hide();
			jQuery('.carregando').show();
			jQuery.getJSON('../../administrator/components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: jQuery(this).val(), ajax: 'true'}, function(j){
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
			jQuery.getJSON('../../administrator/components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: jQuery(this).val(), ajax: 'true'}, function(j){
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

function Passport_validate(){
	if(jQuery("#Passport").val() == ""){
		jQuery("#Passport").focus();
		jQuery("#Passport").attr("class","required");
	}
	else{
		jQuery("#Passport").removeAttr("class");
		jQuery("#cpf").removeAttr("class");
	}
}
function validar(obj) { // recebe um objeto
    var s = (obj.value).replace(/\D/g,'');
    var tam=(s).length; // removendo os caracteres não numéricos
// se for CPF
    if (tam==11 ){
        if (!validaCPF(s)){ // chama a função que valida o CPF
            obj.focus();
			jQuery("#cpf").attr("class","required");
			alert("'"+obj.value+"' Não é um CPF válido!" ); // se quiser mostrar o erro
            //obj.select();  // se quiser selecionar o campo em questão
            return false;
        }
        obj.value=s;    // se validou o CPF mascaramos corretamente
		jQuery("#cpf").removeAttr("class");
		jQuery("#Passport").removeAttr("class");
        return true;
    }
	else{
		obj.focus();
		jQuery("#cpf").attr("class","required");
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
		jQuery("#tipo_residencia").removeAttr("class");
	}
	else{
		jQuery("#tipo_residencia").addClass("invalid");
		alert("Selecione o Tipo de residência acima");
		jQuery("#endereco_res").focus();
	}
}

</script>


<?php

	if(isset($this->message)){
		$this->display('message');
	}

?>

<style type="text/css">

<!--

.style1 {font-weight: bold}

-->

</style>





<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">



<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>

<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->escape($this->params->get('page_title')); ?></div>

<?php endif; ?>



<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">

<tr>

  <td colspan="2"><?php echo JText::_( 'REGISTER_REQUIRED' ); ?> </td>

  </tr>

<tr>

  <td colspan="2">&nbsp;</td>

</tr>

<tr>

	<td width="23%"><strong>Dados Pessoais</strong></td>

  	<td width="77%">&nbsp;</td>

</tr>

<tr>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr>

	<td width="23%" >

<label id="namemsg" for="name">

			<?php echo JText::_( 'Name' ); ?>:		</label>	</td>

  	<td width="77%">

  		<input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' ));?>" class="inputbox_user required" maxlength="50" /> *  	</td>

</tr>

<tr>

	<td >

		<label id="usernamemsg" for="username">

			<?php echo JText::_( 'User name' ); ?>:		</label>	</td>

	<td>

		<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' ));?>" class="inputbox_user required validate-username" maxlength="25" /> *	</td>

</tr>

<tr>

	<td >

		<label id="emailmsg" for="email">

			<?php echo JText::_( 'Email' ); ?>:		</label>	</td>

	<td>

		<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' ));?>" class="inputbox_user required validate-email" maxlength="100" /> *	</td>

</tr>

<tr>

	<td >

		<label id="pwmsg" for="password">

			<?php echo JText::_( 'Password' ); ?>:		</label>	</td>

  	<td>

  		<input class="inputbox_user required validate-password" type="password" id="password" name="password" size="40" value="" /> *  	</td>

</tr>

<tr>

	<td >

		<label id="pw2msg" for="password2">

			<?php echo JText::_( 'Verify Password' ); ?>:		</label>	</td>

	<td>

		<input class="inputbox_user required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /> *	</td>

</tr>

<tr>

  <td >&nbsp;</td>

  <td>&nbsp;</td>

</tr>



<!-- NOVOS CAMPOS -->

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
<tr id="passaporte_v">
	<td ><label id="CPFmsg" for="Passport"><?php echo JText::_( 'Passport' ); ?>:</label></td>
	<td><input type="text" id="Passport" name="Passport" size="40" onblur="Passport_validate(this);" value="<?php echo $this->escape($this->user->get( 'Passport' ));?>" class="inputbox_user validate-username" maxlength="25" /> (somente para estrangeiros)</td>
</tr>
<tr id="cpf_v">
	<td><label id="cpfmsg" for="cpf"><?php echo JText::_( 'CPF' ); ?>:</label>	</td>
	<td><input type="text" id="cpf" name="cpf" size="13"  onblur="validar(this)" value="<?php echo $this->escape($this->user->get( 'cpf' ));?>" class="inputbox_use" maxlength="11" />	   (somente para residentes no Brasil)	</td>
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

  <td><input class="inputbox_user required" name="data_nascimento" id="data_nascimento" type="text" value="<?php echo $this->escape($this->user->get( 'data_nascimento' ));?>" size="10" maxlength="10" />     (dd/mm/aaaa)*</td>

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

  <td>

    <label id="area_atuacaomsg" for="area_atuacao"><?php echo JText::_( '&Aacute;rea de atua&ccedil;&atilde;o na LA' ); ?>:</label></td>

  <td><input class="inputbox_user required" name="area_atuacao" type="text" value="<?php echo $this->escape($this->user->get( 'area_atuacao' ));?>" size="40" maxlength="60" />

    * 

  

  

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

  </select>-->  </td>

</tr>

<tr >

  <td>&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr >

  <td colspan="2"><b>Forma&ccedil;&atilde;o Acad&ecirc;mica</b></td>

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

  <td colspan="2"><b>Cadastro de Endere&ccedil;os</b></td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td colspan="2"><b>Residencial</b></td>

  <td>&nbsp;</td>

</tr>
<tr>
    <td>
        <label for="escolha" id="tipo_residencia">
            <?php echo JText::_( 'Tipo de Residência' ); ?>
        </label>
    </td>
    <td>
        <input type="radio" class="inputbox_user" name="tipo_residencia" id="escolha3" value="1" <?php if($this->user->get('tipo_residencia')==1){ echo 'checked="checked"'; } ?> />Brasil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" class="inputbox_user" name="tipo_residencia" id="escolha4" value="2" <?php if($this->user->get('tipo_residencia')==2){ echo 'checked="checked"'; } ?> /> Outro país
    </td>
</tr>  
<tr>

  <td><label id="endereco_resmsg" for="endereco_res"><?php echo JText::_( 'Endere&ccedil;o' ); ?>:</label></td>

  <td><input class="inputbox_user required" name="endereco_res" type="text" id="endereco_res" value="<?php echo $this->escape($this->user->get( 'endereco_res' ));?>" onblur="Residencia(this);" size="50" maxlength="70" />

    *</td>

</tr>

<tr>

  <td><label id="complemento_resmsg" for="complemento_res"><?php echo JText::_( 'Complemento' ); ?>:</label></td>

  <td><input class="inputbox_user" name="complemento_res" type="text" id="complemento_res" value="<?php echo $this->escape($this->user->get( 'complemento_res' ));?>" size="20" maxlength="50" />

    </td>

</tr>

<tr>

  <td><label id="bairro_resmsg" for="bairro_res"><?php echo JText::_( 'Bairro' ); ?>:</label></td>

  <td><input class="inputbox_user required" name="bairro_res" type="text" id="bairro_res" value="<?php echo $this->escape($this->user->get( 'bairro_res' ));?>" size="40" maxlength="50" />

    *</td>

</tr>

<tr id="nacional">
    <td class="key"><label for="id_estado_res"><?php echo JText::_( 'Estado' ); ?></label></td>
    <td>
        <select class="inputbox_user" name="id_estado_res" id="id_estado_res">
            <option value=""></option>
            <?php
				if($this->user->get('id') != 0){
					if($this->user->get('id_estado_res') == ''){
						echo "<script> alert('Atualize seus dados residênciais.');</script>";
					}
				}
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
        </select>  *
    </td>
</tr>
<tr id="nacional1">
    <td><label for="id_cidade_res"><?php echo JText::_( 'Cidade' ); ?></label></td>
    <td>
        <input type="hidden" name="cidade_id_res" id="cidade_id_res" value="<?php echo $this->user->get('id_cidade_res');?>" />
        <select class="inputbox_user" name="id_cidade_res" id="id_cidade_res">
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
            
            
        </select> *
    </td>
</tr>
<tr id="estrangeiro">

  <td><label id="cidade_resmsg" for="cidade_res"><?php echo JText::_( 'Cidade' ); ?>:</label></td>

  <td><input class="inputbox_user" name="cidade_res" type="text" id="cidade_res" value="<?php echo $this->escape($this->user->get( 'cidade_res' ));?>" size="30" maxlength="50" /> *</td>

</tr>

<tr id="estrangeiro1">

  <td><label id="estado_resmsg" for="estado_res"><?php echo JText::_( 'Estado' ); ?>:</label></td>

  <td><input class="inputbox_user" name="estado_res" type="text" id="estado_res" value="<?php echo $this->escape($this->user->get( 'estado_res' ));?>" size="30" maxlength="50" /> *</td>

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

  <td colspan="2"><b>Profissional</b></td>

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

  <td><input class="inputbox_user" name="complemento_prof" type="text" id="complemento_prof" value="<?php echo $this->escape($this->user->get( 'complemento_prof' ));?>" size="20" maxlength="50" />

    </td>

</tr>

<tr>

  <td><label id="bairro_profmsg" for="bairro_prof"><?php echo JText::_( 'Bairro' ); ?>:</label></td>

  <td><input class="inputbox_user" name="bairro_prof" type="text" id="bairro_prof" value="<?php echo $this->escape($this->user->get( 'bairro_prof' ));?>" size="40" maxlength="50" /></td>

</tr>
<tr id="nacional2">
    <td><label  for="estado_prof"><?php echo JText::_( 'Estado' ); ?></label></td>
    <td>
        <select class="inputbox_user" name="id_estado_prof" id="id_estado_prof">
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
    <td><label for="cidade_prof"><?php echo JText::_( 'Cidade' ); ?></label></td>
    <td>
        <input type="hidden" name="cidade_id_prof" id="cidade_id_prof" value="<?php echo $this->user->get('id_cidade_prof');?>" />
        <select class="inputbox_user" name="id_cidade_prof" id="id_cidade_prof">
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

  <td><label id="cidade_resmsg" for="cidade_res"><?php echo JText::_( 'Cidade' ); ?>:</label></td>

  <td><input class="inputbox_user" name="cidade_res" type="text" id="cidade_res" value="<?php echo $this->escape($this->user->get( 'cidade_prof' ));?>" size="30" maxlength="50" /></td>

</tr>

<tr id="estrangeiro3">

  <td><label id="estado_resmsg" for="estado_res"><?php echo JText::_( 'Estado' ); ?>:</label></td>

  <td><input class="inputbox_user" name="estado_res" type="text" id="estado_res" value="<?php echo $this->escape($this->user->get( 'estado_prof' ));?>" size="30" maxlength="50" /></td>

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

<tr>

  <td colspan="2"><b>Valor da anuidade:</b></td>

</tr>

<tr>

  <td colspan="2"><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Pleno" checked="checked"/>

  S&oacute;cio Pleno (R$ 100,00)</td>

</tr>

<tr>

  <td colspan="2"><input type="radio" name="tipo_anuidade" id="tipo_anuidade" value="Aluno" />

  Aluno de Gradua&ccedil;&atilde;o ou de P&oacute;s-Gradua&ccedil;&atilde;o (R$ 50,00)</td>

</tr>

<tr>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr >

  <td colspan="2">Forma de Pagamento:&nbsp;<input type="radio" name="forma_pagamento" value="Boleto" checked="checked" /> Boleto Banc&aacute;rio</td>

</tr>







<!-- NOVOS CAMPOS -->





<tr>

	<td colspan="2" >&nbsp;</td>

</tr>

<tr>

  <td colspan="2" >&nbsp;</td>

</tr>

</table>

  <button class="button validate" id="button_validador" type="submit" ><?php echo JText::_('Register'); ?></button>

	<input type="hidden" name="task" value="register_save" />

	<input type="hidden" name="id" value="0" />

	<input type="hidden" name="gid" value="0" />

	<?php echo JHTML::_( 'form.token' ); ?>

    

        <!-- MAMBOLETO -->

    <?php 

	$data_documento = date("d/m/Y") ;

	$vencimento = date("d/m/Y",time()+3600*24*7);

	//$valor_documento="60,00"; 

	$nosso_numero= "nn".$this->escape($this->user->get( 'id' ));

	$numero_documento= "nd".$this->escape($this->user->get( 'id' ));

	//$id_banco=3; //id do boleto a ser emetido 3 -> Bradesco

	$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil

	$sacado=$this->escape($this->user->get( 'name' ));

	$endereco=$this->escape($this->user->get( 'endereco_res' ));

	$cgc_cpf=$this->escape($this->user->get( 'cpf' ));

	?>

   	<input type="hidden" name="data_documento" value="<?php echo $data_documento;?>" />

    <input type="hidden" name="vencimento" value="<?php echo $vencimento;?>" />

   	<!-- <input type="hidden" name="valor_documento" value="<?php //echo $valor_documento;?>" />-->

    <input type="hidden" name="nosso_numero" value="<?php echo $nosso_numero;?>" />

   	<input type="hidden" name="numero_documento" value="<?php echo $numero_documento;?>" />

    <input type="hidden" name="id_banco" value="<?php echo $id_banco;?>" />

   	<!--<input type="hidden" name="sacado" value="<?php echo $sacado;?>" />

    <input type="hidden" name="endereco" value="<?php echo $endereco;?>" />

   	<input type="hidden" name="cgc_cpf" value="<?php echo $cgc_cpf;?>" />-->

    <!-- MAMBOLETO -->    



</form>

