<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$comunicacao = $GLOBALS["registros"][0]; 
$participantes = $GLOBALS["participantes"]; 
$linhas_tematicas = $GLOBALS["linhas_tematicas"]; 

/*
echo "Comunicação Coordenada<pre>";
print_r($comunicacao);
echo "<pre>";
echo "participantes<pre>";
print_r($participantes);
echo "<pre>";
echo "linhas_tematicas<pre>";
print_r($linhas_tematicas);
echo "<pre>";
/**/
?>
<a href="controle.php?ctrl=comunicacao_coordenada&acao=listar_resumos&id=<?php echo $comunicacao["id"]; ?>">Ver resumos</a>
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="comunicacao_coordenada" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $comunicacao["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td style="width:130px;">
                Coordenador: 
            </td>
            <td>
                  <?php /*<input type="text" name="id_coordenador" value="<?php echo $comunicacao["id_coordenador"]; ?>" class="formulario"/> */?>
                  <select name="id_coordenador" class="formulario">
                  	<option value="">Selecione</option>
                  	<option value="">-------------------</option>
                    <?php foreach($participantes as $participante): 
						$selected = ($participante['id'] == $comunicacao['id_coordenador']) ? "selected='selected'" : '';
						?>
	                  	<option value="<?php echo $participante['id'];?>" <?php echo $selected;?>><?php echo $participante['nome'] . ' | ' . $participante['email'];?></option>
                    <?php endforeach; ?>
                  </select>
            </td>
        </tr>
        <tr>
            <td>
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo_sessao" value="<?php echo htmlentities($comunicacao["titulo_sessao"]); ?>" class="formulario" style="width:99%;" />
            </td>
        </tr>
        <tr>
            <td style="vertical-align:top;">
                Resumo: 
            </td>
            <td>
                  <textarea name="resumo_sessao" class="formulario" style="width:99%; height:100px;"><?php echo $comunicacao["resumo_sessao"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Palavras-chave: 
            </td>
            <td>
                  <input type="text" name="palavras_chave_sessao" value="<?php echo $comunicacao["palavras_chave_sessao"]; ?>" class="formulario" style="width:600px;" /> (Tr&ecirc;s palavras separadas por &quot;<strong>;</strong>&quot;)
            </td>
        </tr>
        <tr>
            <td>
                Linha tem&aacute;tica: 
            </td>
            <td>
                  <?php /*<input type="text" name="id_linha_tematica" value="<?php echo $comunicacao["id_linha_tematica"]; ?>" class="formulario"/>*/ ?>
                  <select name="id_linha_tematica" class="formulario">
                  	<option value="">Selecione</option>
                  	<option value="">-------------------</option>
                    <?php foreach($linhas_tematicas as $linha_tematica): 
						$selected = ($linha_tematica['id'] == $comunicacao['id_linha_tematica']) ? "selected='selected'" : '';
						?>
	                  	<option value="<?php echo $linha_tematica['id'];?>" <?php echo $selected;?>><?php echo $linha_tematica['titulo'];?></option>
                    <?php endforeach; ?>
                  </select>
            </td>
        </tr>
        <tr>
            <td>
                Dia: 
            </td>
            <td>
                  <input type="text" name="dia" value="<?php echo $comunicacao["dia"]; ?>" class="formulario"/>
            </td>
        </tr>
        <tr>
            <td>
                Hor&aacute;rio: 
            </td>
            <td>
                  <input type="text" name="horario" value="<?php echo $comunicacao["horario"]; ?>" class="formulario"/>
            </td>
        </tr>
        <tr>
            <td>
                Local: 
            </td>
            <td>
                  <input type="text" name="local" value="<?php echo $comunicacao["local"]; ?>" class="formulario"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="Editar"  class="botao_editar"/>
</form>