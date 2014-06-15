<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="txt_topico_tabela"><strong>Linha Tem&aacute;tica<span class="dados_obrigatorios">*</span></strong></td>
    <td>
		<select name="linha_tematica" class="formulario" id="linha_tematica">
                    <?php if(sizeof($error)!= 0){ ?>
                    <option value="<?php if(sizeof($error)!= 0){ print $linha_tematica; } ?>"><?php if(sizeof($error)!= 0){ print htmlentities($nome_linha_tematica); } ?></option>
                    <?php } else{ ?>
                    <option value="0">- Selecione a linha temática -</option>
                    <?php }  while($ln_tema = mysql_fetch_assoc($qr_tema)){?>
               		<option  value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
			        <?php } ?>
         </select>
    </td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="118" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
    <td width="482"><input name="titulo" type="text" class="formulario" id="titulo" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print $titulo; } ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt_desc_tabela">&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="autor" type="text" class="formulario" id="autor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $autor; } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
    <td><input name="coautor" type="text" class="formulario" id="coautor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $coautor; } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
    <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> palavras - Obs: Entre 150 e 300 palavras</span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>
        <p>
        <textarea onKeyUp="CountCharacters()" name="resumo" cols="65" rows="15" class="formulario"></textarea>
        </p>
        <p style="display:none"><input maxlength=10 size=1 name="WordCount"> words</p>
        <p style="display:none"><input maxlength=10 size=9 name="CharacterCount"> characters</p>
        <br /><br />
        <!--<span id="WordCount">0</span>-->
        <!-- 
        <span class="txt_topico_tabela">
          <textarea name="resumo" cols="65" rows="15" class="formulario" id="resumo" onKeyUp="CountCharacters()" ><?php if(sizeof($error)!= 0){ print $resumo; } ?></textarea>
        </span>
        -->
    </td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="palavras" type="text" class="formulario" id="palavras" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print $palavras; } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_desc_tabela">Separados por v&iacute;rgula</span></td>
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
    <td colspan="2"><input type="submit" name="button" id="button" value="Enviar trabalho" class="botao" />
        <input name="insert" type="hidden" id="insert" value="true">
        <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
        <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>"></td>
  </tr>
</table>