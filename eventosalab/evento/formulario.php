<table width="600" border="0" cellspacing="0" cellpadding="0">
	<?php
		if($id_trabalho == 4){
	?>
            <tr>
                <td class="txt_topico_tabela"><strong>Modalidade<span class="dados_obrigatorios">*</span></strong></td>
                <td>
                	<input type="radio" name="tipo_poster" <?php if($tipo_poster == 1){ echo 'checked="checked"'; } ?> value="1" />&nbsp;Online&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="tipo_poster" <?php if($tipo_poster == 2){ echo 'checked="checked"'; } ?> value="2" />&nbsp;Presencial
                </td>
            </tr>
            <tr>
                <td class="txt_topico_tabela">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
    <?php } ?>
    <tr> 
        <td class="txt_topico_tabela"><strong>Linha Tem&aacute;tica<span class="dados_obrigatorios">*</span></strong></td>
        <td>
            <select name="linha_tematica" class="formulario" id="linha_tematica">
                <option value="0">- Selecione a linha temática -</option>
            <?php while($ln_tema = mysql_fetch_assoc($qr_tema)){?>
                <option <?php if($linha_tematica == $ln_tema['id']){ echo 'selected="selected"'; } ?> value="<?php print $ln_tema['id'];?>"><?php print htmlentities($ln_tema['titulo']);?></option>
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
        <td width="482"><input name="titulo" type="text" class="formulario" id="titulo" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo); } ?>"  /></td>
    </tr>
    <tr>
        <td colspan="2" class="txt_desc_tabela">&nbsp;</td>
    </tr>
    <tr>
        <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
        <td><input name="autor" type="text" class="formulario" id="autor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $autor; }else{ print $p['name'];} ?>" /></td>
    </tr>
 <!-- linha 1  Co-autor exibe como padrao-->   
    <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
        <td>
        	<input name="cpf_passport_coautor" type="text" class="formulario" id="cpf_passport_coautor" size="30" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $cpf_passport_coautor; } ?>" />
            <span class="txt_topico_tabela"><b>&nbsp;(CPF ou Passport)</b></span>&nbsp;&nbsp;&nbsp;<span id="add" class="adicionar_tr" onclick="add(this);"><strong>+ co-autor</strong></span>
        </td>
    </tr>
    <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td><input type="hidden" name="k" id="k" value="0" /></td>
    </tr>
    <tr class="mostrar_coautor">
        <td class="txt_topico_tabela"><strong>Nome Co-autor</strong></td>
        <td><span id="nome_coautor"></span></td>
    </tr>
    <tr class="mostrar_coautor">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="mostrar_coautor">
        <td class="txt_topico_tabela"><strong>Email</strong></td>
        <td><span id="email_coautor"></span></td>
    </tr>
    <tr class="mostrar_coautor">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;<span id="id_coautor"></span></td>
    </tr>
 <!-- linha 2  Co-autor nao exibe só se clicar no + -->   
    <tr class="ln2">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="ln2">
        <td class="txt_topico_tabela"><strong>Co-autor 2</strong></td>
        <td>
        	<input name="cpf_passport_coautor2" type="text" class="formulario" id="cpf_passport_coautor2" size="30" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $cpf_passport_coautor2; } ?>" />
            <span class="txt_topico_tabela"><b>&nbsp;(CPF ou Passport)</b></span>&nbsp;&nbsp;&nbsp;<span id="menos2" title="mostrar_coautor2" class="remover_tr" onclick="remove(this);"><strong>remover</strong></span>
        </td>
    </tr>
    <tr class="ln2">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="mostrar_coautor2">
        <td class="txt_topico_tabela"><strong>Nome Co-autor</strong></td>
        <td><span id="nome_coautor2"></span></td>
    </tr>
    <tr class="mostrar_coautor2">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="mostrar_coautor2">
        <td class="txt_topico_tabela"><strong>Email</strong></td>
        <td><span id="email_coautor2"></span></td>
    </tr>
    <tr class="mostrar_coautor2">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;<span id="id_coautor2"></span></td>
    </tr>
 <!-- linha 3  Co-autor nao exibe só se clicar no + -->   
    <tr class="ln3">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="ln3">
        <td class="txt_topico_tabela"><strong>Co-autor 3</strong></td>
        <td>
        	<input name="cpf_passport_coautor3" type="text" class="formulario" id="cpf_passport_coautor3" size="30" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $cpf_passport_coautor3; } ?>" />
            <span class="txt_topico_tabela"><b>&nbsp;(CPF ou Passport)</b></span>&nbsp;&nbsp;&nbsp;<span id="menos3" title="mostrar_coautor3" class="remover_tr" onclick="remove(this);"><strong>remover</strong></span>
        </td>
    </tr>
    <tr class="ln3">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="mostrar_coautor3">
        <td class="txt_topico_tabela"><strong>Nome Co-autor</strong></td>
        <td><span id="nome_coautor3"></span></td>
    </tr>
    <tr class="mostrar_coautor3">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="mostrar_coautor3">
        <td class="txt_topico_tabela"><strong>Email</strong></td>
        <td><span id="email_coautor3"></span></td>
    </tr>
    <tr class="mostrar_coautor3">
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;<span id="id_coautor3"></span></td>
    </tr>
    <tr>
        <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
        <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
    </tr>
    <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>
            <p>
                <textarea id="resumo" name="resumo" onkeyup="counterUpdate('resumo', 'WordCount', 2000);" cols="65" rows="15" class="formulario"><?php if(sizeof($error)!= 0){ print stripslashes($resumo); } ?></textarea>
            </p>
        </td>
    </tr>
    <tr>
        <td class="txt_topico_tabela">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
        <td><input name="palavras" type="text" class="formulario" id="palavras" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras); } ?>" /></td>
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
            <input type="submit" name="button" id="button" value="Enviar trabalho" class="botao" />
            <input name="insert" type="hidden" id="insert" value="true">
            <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
            <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>">
        </td>
    </tr>
</table>