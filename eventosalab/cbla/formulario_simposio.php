<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="txt_topico_tabela"><strong>T&oacute;pico do simp&oacute;sio<span class="dados_obrigatorios">*</span></strong></td>
    <td>
    <?
    	//topicos de simpósio
		$sql_topico_simposio = "SELECT id, nome FROM ev_topico_simposio WHERE id='".$_SESSION['id_topico']."'";
		$qr_topico_simposio= mysql_query($sql_topico_simposio, $conexao) or die(mysql_error());	
		$ln_topico = mysql_fetch_assoc($qr_topico_simposio);
	?>
		<select name="topico_simposio" class="formulario" id="topico_simposio">
	        <option value="<?=$ln_topico['id'];?>" selected="selected"><?=$ln_topico['nome'];?></option>
        </select>    
  </td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Debatedor<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="debatedor" type="text" class="formulario" id="debatedor" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($debatedor); } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="139" class="txt_topico_tabela"><strong>T&iacute;tulo da sess&atilde;o</strong><span class="dados_obrigatorios">*</span> </td>
    <td width="461"><input name="titulo_sessao" type="text" class="formulario" id="titulo_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo_sessao); } ?>" /></td>
  </tr>
  
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Resumo da sess&atilde;o<span class="dados_obrigatorios">*</span></strong></td>
    <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_topico_tabela">
      <textarea name="resumo_sessao" cols="65" rows="15" class="formulario" id="resumo_sessao" onkeyup="counterUpdate('resumo_sessao', 'WordCount', 2000);"><?php if(sizeof($error)!= 0){ print stripslashes($resumo_sessao); } ?></textarea>
    </span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="palavras_sessao" type="text" class="formulario" id="palavras_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras_sessao); } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
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
	$max_num_trabalho=4;
	for ($i = 0; $i < $max_num_trabalho; $i++) {
	?>
    
    
    <table width="600" border="0">
     <tr>
        <td colspan="2" ><span class="txt_titulo_destaque">Trabalho <?=$i+1;?></span></td>
        </tr>
      <tr>
        <td width="140" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
        <td width="460"><input name="titulo[]" type="text" class="formulario" id="titulo[]" size="70" maxlength="250" value="<?php print $titulos[$i]; ?>" /></td>
      </tr>
      
      <tr>
        <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
        <td><input name="autor[]" type="text" class="formulario" id="autor[]" size="30" maxlength="70" value="<?php print $autores[$i]; ?>"/> 
         <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
          <input name="email_autor[]" type="text" class="formulario" id="email_autor[]" size="30" maxlength="70" value="<?php print $emails_autor[$i]; ?>"/>
        </td>
      </tr>
      <tr>
        <td class="txt_topico_tabela"><strong>Forma&ccedil;&atilde;o Acad&ecirc;mica<span class="dados_obrigatorios">*</span></strong></td>
        <td>
        	<input type="radio" name="id_formacao_autor<?php print $i; ?>" value="1" <?php if($ids_formacao_autor[$i]==1) print "checked"; ?> /> <span class="txt_topico_tabela"><b>Doutor</b></span>
        	&nbsp;&nbsp;&nbsp;
            <input type="radio" name="id_formacao_autor<?php print $i; ?>" value="2" <?php if($ids_formacao_autor[$i]==2) print "checked"; ?> /> <span class="txt_topico_tabela"><b>Doutorando</b></span>
        </td>
      </tr>
      <tr>
        <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
        <td><input name="coautor[]" type="text" class="formulario" id="coautor[]" size="30" maxlength="70" value="<?php print $coautores[$i]; ?>" />
          <span class="txt_topico_tabela"><b>&nbsp;E-mail:</b></span>
          <input name="email_coautor[]" type="text" class="formulario" id="email_coautor[]" size="30" maxlength="70" value="<?php print $emails_coautor[$i]; ?>" /></td>
      </tr>
      <tr>
        <td class="txt_topico_tabela"><strong>Forma&ccedil;&atilde;o Acad&ecirc;mica<span class="dados_obrigatorios">*</span></strong></td>
        <td>
        	<input type="radio" name="id_formacao_co_autor<?php print $i; ?>" value="1" <?php if($ids_formacao_co_autor[$i]==1) print "checked"; ?> /> <span class="txt_topico_tabela"><b>Doutor</b></span>
        	&nbsp;&nbsp;&nbsp;
            <input type="radio" name="id_formacao_co_autor<?php print $i; ?>" value="2" <?php if($ids_formacao_co_autor[$i]==2) print "checked"; ?> /> <span class="txt_topico_tabela"><b>Doutorando</b></span>
        </td>
      </tr>
      <tr>
        <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
        <td><b><span id="WordCount<?=$i;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
      </tr>
      <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>
          <textarea name="resumo[]" cols="69" rows="10" class="formulario" id="resumo<?=$i;?>" onkeyup="counterUpdate('resumo<?=$i;?>', 'WordCount<?=$i;?>', 2000);"><?php print $resumos[$i]; ?></textarea>
        </td>
      </tr>
      <tr>
        <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
        <td><input name="palavras[]" type="text" class="formulario" id="palavras" size="70" maxlength="250" value="<?php print $palavras[$i]; ?>" /></td>
      </tr>
      <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
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
    	<input type="submit" name="button" id="button" value="Enviar trabalho" class="botao" />
        <input name="insert" type="hidden" id="insert" value="true">
        <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
        <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>">
        <input name="id_simposio" type="hidden" value="<?php print $id_simposio;?>">
		<input name="id_topico" type="hidden" value="<?php print $id_topico;?>">        
    </td>
  </tr>
</table>
