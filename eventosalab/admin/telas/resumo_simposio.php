<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$resumo = $GLOBALS["resumo"];
$participantes = $GLOBALS["participantes"];
$sessao = $GLOBALS["sessao"];
//print "<br>\$sessao: "; print_r($sessao);
?>
Resumo
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="resumo" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $resumo["id"]; ?>" />
    <input type="hidden" name="id_simposio" value="<?php echo $sessao["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo" value="<?php echo $resumo["titulo"]; ?>" class="formulario" style="width:99%;"/> 
          </td>
   	  </tr>
        <tr>
            <td style="vertical-align:top">
                Resumo: 
            </td>
            <td>
            	<textarea name="resumo" class="formulario" style="width:99%; height:150px" ><?php echo $resumo["resumo"]; ?></textarea>
                <br />
				(Quantidade de caracteres com espa&ccedil;o: de 1000 &agrave; 2000)
          </td>
   	  </tr>
        <tr>
            <td>
                Palavras-chave: 
            </td>
          <td>
                  <input type="text" name="palavras_chave" value="<?php echo $resumo["palavras_chave"]; ?>" class="formulario" style="width:375px"/>                (Tr&ecirc;s palavras separadas por &quot;<strong>;</strong>&quot;)          </td>
   	  </tr>
        <tr>
            <td>
                Autor: 
            </td>
            <td>
                <select name="autor" class="formulario">
                    <option value="0">Autor</option>
                    <option value="0">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						if($participante['id_formacao'] == 1 || $participante['id_formacao'] == 2){
							$selected = "";
							if($participante["id"]==$resumo["autor"]) $selected="selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php 
						} else continue;
					}//foreach ?>
	            </select>
                <br />
                <?php /* echo "autor: ".$resumo["autor"]; */ ?>
          </td>
   	  </tr>
        <tr>
            <td>
                Co-Autor: 
            </td>
            <td>
                <select name="co_autor" class="formulario">
                    <option value="0">Co-Autor</option>
                    <option value="0">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						if($participante['id_formacao'] == 1 || $participante['id_formacao'] == 2){
							$selected = "";
							if($participante["id"]==$resumo["co_autor"]) $selected="selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php 
						} else continue;
					}//foreach ?>
	            </select>
                <br />
                <?php //echo "co_autor: ".$resumo["co_autor"]; ?>
          </td>
   	  </tr>
      <!--
        <tr>
            <td>
                Dia: 
            </td>
            <td>
                  <input type="text" name="dia" value="<?php echo $sessao["dia"]; ?>" class="formulario" style="width:75px"/> 
                  (DD/MM/AAAA) 
          </td>
   	  </tr>
        <tr>
            <td>
                Hor&aacute;rio: 
            </td>
            <td>
                  <input type="text" name="horario" value="<?php echo $sessao["horario"]; ?>" class="formulario" style="width:75px; text-align:center"/> (Ex.: 13h30min =&gt; 13:30)
          </td>
   	  </tr>
        <tr>
            <td>
                Local: 
            </td>
            <td>
                  <input type="text" name="local" value="<?php echo $sessao["local"]; ?>" class="formulario" style="width:375px"/> 
          </td>
   	  </tr>
      -->
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>