<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$comunicacao = $GLOBALS["comunicacao"]; 
$participantes = $GLOBALS["participantes"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 
?>
Comunica&ccedil;&atilde;o Individual
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="comunicacao_individual" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $comunicacao["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo" value="<?php echo htmlentities($comunicacao["titulo"]); ?>" class="formulario" style="width:99%;" />
            </td>
        </tr>
        <tr>
            <td>
                Linha Tem&aacute;tica:            </td>
            <td>
                <select name="id_linha_tematica" class="formulario">
                    <option value="">Linha Temática</option>
                    <option value="">------------------</option>
                    <?php 
					foreach($linhas_tematicas as $linha_tematica){ 
						$selected = "";
						if($linha_tematica["id"]==$comunicacao["id_linha_tematica"]) $selected="selected"; ?>
                        <option value="<?php echo $linha_tematica["id"]; ?>" <?php echo $selected; ?>><?php echo $linha_tematica["titulo"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
      </tr>
        <tr>
            <td style="vertical-align:top;">
                Resumo: 
            </td>
            <td>
            	<textarea name="resumo" class="formulario" style="width:99%; height:150px" ><?php echo $comunicacao["resumo"]; ?></textarea>
                <br />
				<?php if ($_SESSION['id_evento_admin'] == 28): ?>
					(Quantidade de caracteres com espa&ccedil;o: de 1500 &agrave; 3500)
				<?php else: ?>
					(Quantidade de caracteres com espa&ccedil;o: de 1000 &agrave; 2000)
				<?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>
                Palavras-chave: 
            </td>
            <td>
              <input type="text" name="palavras_chave" value="<?php echo $comunicacao["palavras_chave"]; ?>" class="formulario" style="width:600px"/> (Tr&ecirc;s palavras separadas por &quot;<strong>;</strong>&quot;)</td>
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
						if($participante["id"]==$comunicacao["autor"]) $selected="selected"; ?>
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
							if (in_array($participante["id"], $comunicacao["co_autor"])) $selected = "selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php } //foreach ?>
					</select>
					<br />
					(Pressione CTRL e clique em um co-autor para marcar/desmarcá-lo.)
				</td>
			<?php else: ?>
				<td>
					<select name="co_autor" class="formulario">
						<option value="">Co-Autor</option>
						<option value="">------------------</option>
						<?php 
						foreach($participantes as $participante){ 
							$selected = "";
							if($participante["id"]==$comunicacao["co_autor"]) $selected="selected"; ?>
							<option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["nome"]." | ".$participante["email"]; ?></option>
						<?php }//foreach ?>
					</select>
				</td>
			<?php endif; ?>
        </tr>
		<?php if ($_SESSION['id_evento_admin'] != 28): ?>
			<tr>
				<td>Dia:</td>
				<td>
					<input type="text" name="dia" value="<?php echo $comunicacao["dia"]; ?>" class="formulario" style="width:75px"/> 
					(DD/MM/AAAA) 
				</td>
			</tr>
			<tr>
				<td>Hor&aacute;rio:</td>
				<td><input type="text" name="horario" value="<?php echo $comunicacao["horario"]; ?>" class="formulario" style="width:75px; text-align:center"/> (Ex.: 13h30min =&gt; 13:30)</td>
			</tr>
			<tr>
				<td>Local:</td>
				<td><input type="text" name="local" value="<?php echo $comunicacao["local"]; ?>" class="formulario" style="width:375px"/></td>
			</tr>
		<?php endif; ?>
    </table>
    <input type="submit" value="Editar"  class="botao_editar"/>
</form>