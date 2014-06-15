<?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
	  ?>
<table width="600" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td class="txt_topico_tabela"><strong>E-mail do participante</strong><span class="dados_obrigatorios">*</span></td>
    <td><input name="email_participante" type="text" class="formulario" id="email_participante" size="61" maxlength="250" value="<?php if(sizeof($error)!= 0){ print $email_participante; } ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt_topico_tabela"><span class="txt_desc_tabela">É preciso ser o e-mail do participante cadastrado neste evento.</span></td>
  </tr>
  <tr>
    <td width="159" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
    <td width="435"><input name="titulo" type="text" class="formulario" id="titulo" size="61" maxlength="250" value="<?php if(sizeof($error)!= 0){ print $titulo; } ?>" /></td>
  </tr>
  
  <tr>
    <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="autor" type="text" class="formulario" id="autor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $autor; } ?>" /></td>
  </tr>

  <tr>
    <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
    <td><input name="coautor" type="text" class="formulario" id="coautor" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $coautor; } ?>" /></td>
  </tr>

  <tr>
    <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
    <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_topico_tabela">
      <textarea name="resumo" cols="60" rows="15" class="formulario" id="resumo" onkeyup="counterUpdate('resumo', 'WordCount', 2000);"><?php if(sizeof($error)!= 0){ print $resumo; } ?></textarea>
    </span></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
    <td><input name="palavras" type="text" class="formulario" id="palavras" size="61" maxlength="250" value="<?php if(sizeof($error)!= 0){ print $palavras; } ?>" /></td>
  </tr>
  <tr>
    <td class="txt_topico_tabela">&nbsp;</td>
    <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="Enviar trabalho" class="botao" />
        <input name="insert" type="hidden" id="insert" value="true">
        <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
        <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>">
        <input name="id_sessao_trabalho" type="hidden" value="<?php print $id_sessao;?>">
        <input name="id_linha_tematica" type="hidden" value="<?php print $id_linha_tematica;?>">
        
        </td>
  </tr>
</table>
