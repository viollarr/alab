<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../evento/js/jquery.js"></script> 
<script src="../evento/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript">
	
		$(document).ready(function() { 
		
			$("#data_nascimento").mask("99/99/9999");
			$("#cpf").mask("999.999.999-99");
			
			if($("#escolha1").is(":checked")){
				$('#passaporte_v').hide();
				$('#cpf_v').show();
		
			}
			else if($("#escolha2").is(":checked")){
				$('#passaporte_v').show();
				$('#cpf_v').hide();
			}
			else{
				$('#passaporte_v').hide();
				$('#cpf_v').hide();
			}
			
			$('#escolha1').click(function(){
				$('#passaporte_v').hide();
				$('#cpf_v').show();
			});
			$('#escolha2').click(function(){
				$('#passaporte_v').show();
				$('#cpf_v').hide();
			});	

			if($("#escolha3").is(":checked")){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
		
			}
			else if($("#escolha4").is(":checked")){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
			}
			else{
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
			}
			
			$('#escolha3').click(function(){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
			});
			$('#escolha4').click(function(){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
			});	
						
			$(function(){
				var idCidade = $('#cidade_id_res').val();
				$('#id_estado_res').change(function(){
					if( $(this).val() ) {
						$('#id_cidade_res').hide();
						$('.carregando').show();
						$.getJSON('../../administrator/components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
							 var option = new Array();
							for (var i = 0; i < j.length; i++) {
								
								option[i] = document.createElement('option');//criando o option
											$( option[i] ).attr( {value : j[i].cod_cidades, selected : ( idCidade == j[i].cod_cidades ) ? true : false } );//colocando o value no option
											$( option[i] ).append( j[i].nome );//colocando o 'label'
											
							}	
							$('#id_cidade_res').html(option).show();
							$('.carregando').hide();
						});
					} else {
						$('#id_cidade_res').html('<option value="">-- Escolha um estado --</option>');
					}
				});
			});
		});	
</script>
<?php 
$participante = $GLOBALS["participante"]; 
$pagamento = $GLOBALS["pagamento"]; 
$cidades = $GLOBALS["cidades"];
$estados = $GLOBALS["estados"];
$formacoes = $GLOBALS["formacoes"];
$tipos = $GLOBALS["tipos"];
?>
Participante - <?php print $GLOBALS["titulo_view"]; ?>

<?php
	if(!empty($GLOBALS["participante_novo"])){
?>
<form action="controle.php" method="post" id="form_dados">
<input type="hidden" name="ctrl" value="participante" />
<input type="hidden" name="acao" value="salvar_edicao" />
<input type="hidden" name="id_participante" value="<?php echo $participante["id_participante"]; ?>" />
<input type="hidden" name="id_joomla" value="<?php echo $participante["id"]; ?>" />
<!--<input type="hidden" name="id_pagamento" value="<?php echo (!empty($pagamento["id"])) ? $pagamento["id"] : ""; ?>" />-->
<table class="tab_admin">
    <tr>
        <td width="140">
            Escolha o Participante:
        </td>
        <td>
            <select name="id_joomla" class="formulario" >
                <option value="">Usu&aacute;rios</option>
                <option value="">-----------------------</option>
                <?php foreach($GLOBALS["participante_novo"] as $usuario){ ?>
                
                    <option value="<?php echo $usuario["id"]; ?>" ><?php echo $usuario["name"]; ?></option>
                <?php }//foreach ?>
            </select>
        </td>
    </tr>
    
    <tr>
        <td width="140">
            Tipos de inscri&ccedil;&atilde;o:
        </td>
        <td>
            <select name="id_tipo_participante" class="formulario" >
                <option value="">Tipos de inscri&ccedil;&atilde;o</option>
                <option value="">-----------------------</option>
                <?php foreach($tipos as $tipo){ ?>
                    <option value="<?php echo $tipo["id"]; ?>" <?php if($participante["id_tipo_participante"]==$tipo["id"]) print "selected"; ?>><?php echo $tipo["nome"]; ?></option>
                <?php }//foreach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td width="140">
            Modalidade de participa&ccedil;&atilde;o:
        </td>
        <td>
            <input type="radio" name="modalidade_participacao" value="1"  
                <?php echo ($participante["modalidade_participacao"]==1) ? "checked" : "" ; ?> /> Com apresenta&ccedil;&atilde;o de trabalho
            <br />
            <input type="radio" name="modalidade_participacao" value="0" 
                <?php echo ($participante["modalidade_participacao"]==0) ? "checked" : "" ; ?> /> Sem apresenta&ccedil;&atilde;o de trabalho
      </td>
    </tr>
    <tr>
        <td colspan="2">
        Boleto<?php if(!empty($pagamento["valor"])) echo " no valor de R$ ".str_replace(".", ",", $pagamento["valor"]); ?> foi pago?
        <input type="radio" name="pago" value="sim" <?php if($pagamento["pago"]=="sim") echo "checked"; ?> />Sim
        <input type="radio" name="pago" value="nao" <?php if($pagamento["pago"]=="nao") echo "checked"; ?> />N&atilde;o
        </td>
    </tr>
</table>
<input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>
<?php
	}
	else{
?>
<form action="controle.php" method="post" id="form_dados">
<input type="hidden" name="ctrl" value="participante" />
<input type="hidden" name="acao" value="salvar_edicao" />
<input type="hidden" name="id_participante" value="<?php echo $participante["id_participante"]; ?>" />
<input type="hidden" name="id_joomla" value="<?php echo $participante["id"]; ?>" />
<!--<input type="hidden" name="id_pagamento" value="<?php echo (!empty($pagamento["id"])) ? $pagamento["id"] : ""; ?>" />-->
<table class="tab_admin">
    <tr>
        <td width="140">
            Tipos de inscri&ccedil;&atilde;o:
        </td>
        <td>
            <select name="id_tipo_participante" class="formulario" >
           		<option value="">Tipos de inscri&ccedil;&atilde;o</option>
           		<option value="">-----------------------</option>
            	<?php foreach($tipos as $tipo){ ?>
            		<option value="<?php echo $tipo["id"]; ?>" <?php if($participante["id_tipo_participante"]==$tipo["id"]) print "selected"; ?>><?php echo $tipo["nome"]; ?></option>
            	<?php }//foreach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td width="140">
            Modalidade de participa&ccedil;&atilde;o:
        </td>
        <td>
            <input type="radio" name="modalidade_participacao" value="1"  
				<?php echo ($participante["modalidade_participacao"]==1) ? "checked" : "" ; ?> /> Com apresenta&ccedil;&atilde;o de trabalho
            <br />
            <input type="radio" name="modalidade_participacao" value="0" 
            	<?php echo ($participante["modalidade_participacao"]==0) ? "checked" : "" ; ?> /> Sem apresenta&ccedil;&atilde;o de trabalho
      </td>
    </tr>
    <tr>
        <td width="140">
            Nome:
        </td>
        <td>
            <input name="nome" type="text" class="formulario" value="<?php echo $participante["name"]; ?>" style="width:250px;" />
        </td>
    </tr>
	<?php if ($_SESSION["id_evento_admin"] != 28): ?>
		<tr>
			<td>
			Data de Nascimento:
			  </td>
			<td>
				<?php 
				if(!empty($participante["data_nascimento"]) && $participante["data_nascimento"]!="0000-00-00"){
					//$arr_data_nasc = explode("-", $participante["data_nascimento"]);
					$data_nasc_format = $participante["data_nascimento"];
				}//if
				?>
				<input name="data_nascimento" id="data_nascimento" type="text" class="formulario" value="<?php echo $data_nasc_format; ?>" style="text-align:center" /> 
			  (Ex: dd/mm/aaaa)
			</td>
		</tr>
	<?php endif; ?>
    <tr>
        <td>Tipo de documento: </td>
        <td>
            <input type="radio" name="tipo_documento" id="escolha1" value="1" <?php echo ($participante["tipo_documento"]==1) ? "checked='checked'" : "" ; ?> /><label>CPF</label>
            <input type="radio" name="tipo_documento" id="escolha2" value="2" style="margin-left:10px;" <?php echo ($participante["tipo_documento"]==2) ? "checked='checked'" : "" ; ?> /><label>Passport</label>
        </td>
    </tr>
    <tr id="cpf_v">
        <td>
        	CPF:
        </td>
        <td><input type="text" name="cpf" id="cpf" value="<?php echo $participante["cpf"]; ?>"  class="formulario" /></td>
    </tr>
    <tr id="passaporte_v">
        <td>
        	Passaporte:
        </td>
        <td>
        	<input type="text" name="Passport" value="<?php echo $participante["Passport"]; ?>"  class="formulario"  style="width:250px;" /> 
        </td>
    </tr>
    <tr>
        <td>
        	Email:
        </td>
        <td>
        	<input type="text" name="email" value="<?php echo $participante["email"]; ?>"  class="formulario" style="width:250px;"  />        </td>
    </tr>
    <tr>
        <td>Institui&ccedil;&atilde;o:</td>
        <td><input type="text" name="sigla_instituicao" value="<?php echo $participante["sigla_instituicao"]; ?>"  class="formulario"  style="width:250px;" />      </td>
    </tr>
    <tr>
        <td>Tipo de Residência: </td>
        <td>
            <input type="radio" name="tipo_residencia" id="escolha3" value="1" <?php echo ($participante["tipo_residencia"]==1) ? "checked='checked'" : "" ; ?> /><label>Brasil</label>
            <input type="radio" name="tipo_residencia" id="escolha4" value="2" style="margin-left:10px;" <?php echo ($participante["tipo_residencia"]==2) ? "checked='checked'" : "" ; ?> /><label>Outro país</label>
        </td>
    </tr>
    <tr>
        <td>Pa&iacute;s:</td>
        <td><input type="text" name="pais" value="<?php echo $participante["pais_res"]; ?>"  class="formulario"  style="width:250px;" />      </td>
    </tr>
    <tr id="estado_nacional">
        <td>
        Estado (Brasil):
        </td>
        <td>
        <select name="id_estado_res" id="id_estado_res" class="formulario">
            <option value="">Estados</option>
            <option value="">-----------</option>
            <?php foreach($estados as $estado){ ?>
                <option value="<?php echo $estado["cod_estados"]; ?>" <?php if($participante["id_estado_res"]==$estado["cod_estados"]) print "selected"; ?> ><?php echo $estado["nome"]; ?></option>
            <?php }//foreach ?>
        </select>
        </td>
    </tr>
    <tr id="cidade_nacional">
        <td>
        Cidade (Brasil):
        </td>
        <td>
        <input type="hidden" name="cidade_id_res" id="cidade_id_res" value="<?php echo $participante["id_cidade_res"];?>" />
        <select name="id_cidade_res"  id="id_cidade_res" class="formulario">
            <option value="">Cidades</option>
            <option value="">-----------</option>
            <?php foreach($cidades as $cidade){ ?>
                <option value="<?php echo $cidade["cod_cidades"]; ?>" <?php if($participante["id_cidade_res"]==$cidade["cod_cidades"]) print "selected"; ?> ><?php echo $cidade["nome"]; ?></option>
            <?php }//foreach ?>
        </select>
        </td>
    </tr>
    <tr id="estado_outro">
        <td>Estado (Outro país):</td>
        <td><input type="text" name="estado_res" value="<?php echo $participante["estado_res"]; ?>"  class="formulario"  style="width:250px;" /></td>
    </tr>
    <tr id="cidade_outro">
        <td>Cidade (Outro país):</td>
        <td><input type="text" name="cidade_res" value="<?php echo $participante["cidade_res"]; ?>"  class="formulario"  style="width:250px;" /></td>
    </tr>
    <tr>
        <td>Endere&ccedil;o:</td>
        <td><input type="text" name="endereco" value="<?php echo $participante["endereco_res"]; ?>"  class="formulario"  style="width:250px;" /></td>
    </tr>
    <tr>
        <td>Bairro:</td>
        <td><input name="bairro" type="text" value="<?php echo $participante["bairro_res"]; ?>"  class="formulario" style="width:250px;"  />        </td>
    </tr>
    <tr>
        <td>CEP:</td>
        <td><input type="text" name="cep" value="<?php echo $participante["cep_res"]; ?>"  class="formulario" /> 
        (Ex.: 12345-678)        </td>
    </tr>
    <tr>
        <td>Telefone:</td>
        <td><input type="text" name="telefone" value="<?php echo $participante["telefone_res"]; ?>"  class="formulario" /> 
        (Ex.:   (21) 2242-6894)        </td>
    </tr>
    <tr>
        <td>
        Forma&ccedil;&atilde;o: 
        </td>
        <td>
        <select name="formacao" class="formulario">
	        <option value="">Forma&ccedil;&atilde;o Acadêmica</option>
	        <option value="">-----------</option>
        	<?php foreach($formacoes as $formacao){ ?>
	        	<option value="<?php echo $formacao["formacao"]; ?>" <?php if($participante["titulacao_academica"]==$formacao["formacao"]) print "selected"; ?> ><?php echo $formacao["formacao"]; ?></option>
            <?php }//foreach ?>
        </select>
        </td>
    </tr>
	
	<?php if ($_SESSION["id_evento_admin"] == 28): ?>
		<tr>
			<td style="vertical-align:top;">Observa&ccedil;&otilde;es:</td>
			<td><textarea name="observacoes" class="formulario" style="width:99%; height:80px"><?php echo $participante["observacoes"]; ?></textarea></td>
		</tr>
	<?php endif; ?>
    <tr>
        <td colspan="2">
        Boleto<?php if(!empty($pagamento["valor"])) echo " no valor de R$ ".str_replace(".", ",", $pagamento["valor"]); ?> foi pago?
        <input type="radio" name="pago" value="sim" <?php if($pagamento["pago"]=="sim") echo "checked"; ?> />Sim
		<?php if ($_SESSION["id_evento_admin"] == 28): ?>
			<input type="radio" name="pago" value="nao" <?php if($pagamento["pago"]!="sim") echo "checked"; ?> />N&atilde;o
		<?php else: ?>
			<input type="radio" name="pago" value="nao" <?php if($pagamento["pago"]=="nao") echo "checked"; ?> />N&atilde;o
        <?php endif; ?>
		</td>
    </tr>
</table>
<input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>
<?php
	}
?>