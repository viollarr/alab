<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$resumo = $GLOBALS["resumo"];
$participantes = $GLOBALS["participantes"];
$sessao = $GLOBALS["sessao"];

/*
echo 'tela resumo_comunicacao_coordenada<pre>';
	print_r($resumo);
echo '</pre>';
/**/
?>
Resumo
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="resumo" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $resumo["id"]; ?>" />
    <input type="hidden" name="id_comunicacao_coordenada" value="<?php echo $sessao["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo" value="<?php echo $resumo["titulo"]; ?>" class="formulario" style="width:375px;"/> 
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
                    <option value="">Autor</option>
                    <option value="">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						$selected = "";
						if($participante["id"]==$resumo["autor"]) $selected="selected"; ?>
                        <option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
                    <?php }//foreach ?>
	            </select>
          </td>
   	  </tr>
        <tr>
            <td style="vertical-align:top;">
                Co-Autor: 
            </td>
			<?php if ($_SESSION['id_evento_admin'] == 28): ?>
				<td>
					<select name="co_autor[]" class="formulario" multiple="multiple" size="10">
						<?php 
						foreach ($participantes as $participante) { 
							$selected = "";
							if (in_array($participante["id"], $resumo["co_autor"])) $selected = "selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php } //foreach ?>
					</select>
					<br />
					(Pressione CTRL e clique em um co-autor para marcar/desmarc&aacute;-lo.)
				</td>
			<?php else: ?>
				<td>
					<select name="co_autor" class="formulario">
						<option value="">Co-Autor</option>
						<option value="">------------------</option>
						<?php 
						foreach($participantes as $participante){ 
							$selected = "";
							if($participante["id"]==$resumo["co_autor"]) $selected="selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php }//foreach ?>
					</select>
				</td>
			<?php endif; ?>

   	  </tr>
      <?php /*
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
      */ ?>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>