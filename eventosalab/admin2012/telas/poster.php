<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../evento/js/jquery.js"></script> 
<script src="../evento/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$("#dia").mask("99/99/9999");
		$("#horario").mask("99:99");
	});
</script>
<?php 
$poster = $GLOBALS["poster"]; 
$participantes = $GLOBALS["participantes"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 
?>
P&ocirc;ster
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="poster" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $poster["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo" value="<?php echo $poster["titulo"]; ?>" class="formulario" style="width:375px;" />
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
						if($linha_tematica["id"]==$poster["id_linha_tematica"]) $selected="selected"; ?>
                        <option value="<?php echo $linha_tematica["id"]; ?>" <?php echo $selected; ?>><?php echo $linha_tematica["titulo"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
      </tr>
        <tr>
            <td>
                Resumo: 
            </td>
            <td>
            	<textarea name="resumo" class="formulario" style="width:99%; height:150px" ><?php echo $poster["resumo"]; ?></textarea>
                <br />
				(Quantidade de caracteres com espa&ccedil;o: de 1000 &agrave; 2000)
            </td>
        </tr>
        <tr>
            <td>
                Palavras-chave: 
            </td>
            <td>
              <input type="text" name="palavras_chave" value="<?php echo $poster["palavras_chave"]; ?>" class="formulario" style="width:375px"/>
(Tr&ecirc;s palavras separadas por &quot;<strong>;</strong>&quot;)            </td>
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
						if($participante["id"]==$poster["autor"]) $selected="selected"; ?>
                        <option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
        </tr>
        <tr>
            <td>
                Co-Autor: 
            </td>
            <td>
                <select name="co_autor" class="formulario">
                    <option value="">Co-Autor</option>
                    <option value="">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						$selected = "";
						if($participante["id"]==$poster["co_autor"]) $selected="selected"; ?>
                        <option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
        </tr>
        <tr>
            <td>
                Co-Autor 2: 
            </td>
            <td>
                <select name="co_autor2" class="formulario">
                    <option value="">Co-Autor</option>
                    <option value="">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						$selected = "";
						if($participante["id"]==$poster["co_autor2"]) $selected="selected"; ?>
                        <option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
        </tr>
        <tr>
            <td>
                Co-Autor 3: 
            </td>
            <td>
                <select name="co_autor3" class="formulario">
                    <option value="">Co-Autor</option>
                    <option value="">------------------</option>
                    <?php 
					foreach($participantes as $participante){ 
						$selected = "";
						if($participante["id"]==$poster["co_autor3"]) $selected="selected"; ?>
                        <option value="<?php echo $participante["id"]; ?>" <?php echo $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                    <?php }//foreach ?>
	            </select>
            </td>
        </tr>
        <tr>
            <td>
                Dia: 
            </td>
            <td>
                  <input type="text" name="dia" value="<?php echo $poster["dia"]; ?>" id="dia" class="formulario" style="width:75px"/> 
                  (DD/MM/AAAA) 
          </td>
   	  </tr>
        <tr>
            <td>

                Hor&aacute;rio: 
            </td>
            <td>
                  <input type="text" name="horario" value="<?php echo $poster["horario"]; ?>" id="horario" class="formulario" style="width:75px; text-align:center"/> (Ex.: 13h30min =&gt; 13:30)
          </td>
   	  </tr>
        <tr>
            <td>
                Local: 
            </td>
            <td>
                  <input type="text" name="local" value="<?php echo $poster["local"]; ?>" class="formulario" style="width:375px"/> 
          </td>
   	  </tr>
    </table>
    <input type="submit" value="Editar"  class="botao_editar"/>
</form>