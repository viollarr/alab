<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$participante = $GLOBALS["participante"]; 
$pagamento = $GLOBALS["pagamento"]; 
$cidades = $GLOBALS["cidades"];
$estados = $GLOBALS["estados"];
$formacoes = $GLOBALS["formacoes"];
$tipos = $GLOBALS["tipos"];
?>
Participante - <?php print $GLOBALS["titulo_view"]; ?>
<form action="controle.php" method="post" id="form_dados">
<input type="hidden" name="ctrl" value="participante" />
<input type="hidden" name="acao" value="salvar_edicao" />
<input type="hidden" name="id_participante" value="<?php echo $participante["id"]; ?>" />
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
            <input name="nome" type="text" class="formulario" value="<?php echo $participante["nome"]; ?>" style="width:250px;" />
        </td>
    </tr>
	<?php if ($_SESSION["id_evento_admin"] != 28): ?>
		<tr>
			<td>
			Data de Nascimento:
			  </td>
			<td>
				<?php 
				if(!empty($participante["datanascimento"]) && $participante["datanascimento"]!="0000-00-00"){
					$arr_data_nasc = explode("-", $participante["datanascimento"]);
					$data_nasc_format = $arr_data_nasc[2]."/".$arr_data_nasc[1]."/".$arr_data_nasc[0];
				}//if
				?>
				<input name="datanascimento" type="text" class="formulario" value="<?php echo $data_nasc_format; ?>" style="text-align:center" /> 
			  (Ex: dd/mm/aaaa)
			</td>
		</tr>
	<?php endif; ?>
    <tr>
        <td>
        	CPF:
        </td>
        <td>
        	<input type="text" name="cpf" value="<?php echo $participante["cpf"]; ?>"  class="formulario" /> 
        (Somente n&uacute;meros)        </td>
    </tr>
    <tr>
        <td>
        	Passaporte:
        </td>
        <td>
        	<input type="text" name="passaporte" value="<?php echo $participante["passaporte"]; ?>"  class="formulario"  style="width:250px;" /> 
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
        <td>Senha:</td>
        <td><input type="text" name="senha" value="<?php echo $participante["senha"]; ?>"  class="formulario" />        </td>
    </tr>
    <tr>
        <td>Institui&ccedil;&atilde;o:</td>
        <td><input type="text" name="instituicao" value="<?php echo $participante["instituicao"]; ?>"  class="formulario"  style="width:250px;" />      </td>
    </tr>
	<?php if ($_SESSION["id_evento_admin"] != 28): ?>
		<tr>
			<td>Pa&iacute;s:</td>
			<td><input type="text" name="pais" value="<?php echo $participante["pais"]; ?>"  class="formulario"  style="width:250px;" />      </td>
		</tr>
		<tr>
			<td>
			Estado (Brasil):
			</td>
			<td>
			<select name="id_estado" class="formulario">
				<option value="">Estados</option>
				<option value="">-----------</option>
				<?php foreach($estados as $estado){ ?>
					<option value="<?php echo $estado["cod_estados"]; ?>" <?php if($participante["id_estado"]==$estado["cod_estados"]) print "selected"; ?> ><?php echo $estado["nome"]; ?></option>
				<?php }//foreach ?>
			</select>
			</td>
		</tr>
		<tr>
			<td>
			Cidade (Brasil):
			</td>
			<td>
			<select name="id_cidade" class="formulario">
				<option value="">Cidades</option>
				<option value="">-----------</option>
				<?php foreach($cidades as $cidade){ ?>
					<option value="<?php echo $cidade["cod_cidades"]; ?>" <?php if($participante["id_cidade"]==$cidade["cod_cidades"]) print "selected"; ?> ><?php echo $cidade["nome"]; ?></option>
				<?php }//foreach ?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Endere&ccedil;o:</td>
			<td><input type="text" name="endereco" value="<?php echo $participante["endereco"]; ?>"  class="formulario"  style="width:250px;" /></td>
		</tr>
		<tr>
			<td>Bairro:</td>
			<td><input name="bairro" type="text" value="<?php echo $participante["bairro"]; ?>"  class="formulario" style="width:250px;"  />        </td>
		</tr>
		<tr>
			<td>CEP:</td>
			<td><input type="text" name="cep" value="<?php echo $participante["cep"]; ?>"  class="formulario" /> 
			(Ex.: 12345-678)        </td>
		</tr>
		<tr>
			<td>Telefone:</td>
			<td><input type="text" name="telefone" value="<?php echo $participante["telefone"]; ?>"  class="formulario" /> 
			(Ex.:   (21) 2242-6894)        </td>
		</tr>
	<?php endif; ?>
    <tr>
        <td>
        Forma&ccedil;&atilde;o: 
        </td>
        <td>
        <select name="id_formacao" class="formulario">
	        <option value="">Forma&ccedil;&atilde;o Acadêmica</option>
	        <option value="">-----------</option>
        	<?php foreach($formacoes as $formacao){ ?>
	        	<option value="<?php echo $formacao["id_formacao"]; ?>" <?php if($participante["id_formacao"]==$formacao["id_formacao"]) print "selected"; ?> ><?php echo $formacao["formacao"]; ?></option>
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
	
    <?php if ($_SESSION["id_evento_admin"] != 28 and !empty($participante["id"])) { ?>
        <tr>
            <td>Associado ALAB:        </td>
            <td>
                <?php 
                //if($participante["id_associado_alab"]>0) echo "&Eacute; associado ALAB com ID ".$participante["id_associado_alab"].".";
				if($participante["id_associado_alab"]>0) {
					echo "&Eacute; associado ALAB com nome de usuário <strong>" . $participante['username_joomla']
						. "</strong> e email <strong>" . $participante['email_joomla'] . "</strong>";
				}
                else echo "N&atilde;o &eacute; associado ALAB.";
                ?>
            </td>
        </tr>
    <?php }//if ?>
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