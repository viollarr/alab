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
$simposio = $GLOBALS["simposio"]; 
$topicos = $GLOBALS["topicos"];
$participantes = $GLOBALS["participantes"];
?>
Simp&oacute;sio - <?php print $GLOBALS["titulo_view"]; ?>
<form action="controle.php" method="post">
<input type="hidden" name="ctrl" value="simposio" />
<input type="hidden" name="acao" value="salvar_edicao" />
<input type="hidden" name="id" value="<?php echo $simposio["id"]; ?>" />
<table class="tab_admin">
    <tr>
        <td width="120">T&oacute;pico:</td>
        <td>
            <select name="id_topico" class="formulario">
           		<option value="">Tópicos</option>
           		<option value="">-----------</option>
            	<?php foreach($topicos as $topico){ ?>
            		<option value="<?php echo $topico["id"]; ?>" <?php if($topico["id"]==$simposio["id_topico"]) print "selected"; ?>><?php echo $topico["nome"]; ?></option>
                <?php }//foreach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            Coordenador 1: 
        </td>
        <td>
            <select name="ids_coordenadores[]" class="formulario">
           		<option value="">Doutores / Doutorandos</option>
           		<option value="">-------------------------</option>
            	<?php
				foreach($participantes as $participante){ 
					$selected = "";
					$sql_simp_coord = "SELECT * FROM ev_simposio_coordenador 
						WHERE 
							id_simposio='".$simposio["id"]."'
							AND id_participante='".$participante["id"]."'
							AND ordem='1'
						";
					$result_simp_coord = mysql_query($sql_simp_coord, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
					print "<br>id_simposio: ".$simposio["id"]." | id_participante: ".$participante["id"];
					while($simp_coord = mysql_fetch_array($result_simp_coord)){
						print "<br>simp_coord: "; print_r($simp_coord);
						if($simp_coord["id_participante"]==$participante["id"]) $selected = "selected";
					}
					?>
            		<option value="<?php echo $participante["id"]; ?>" <?php print $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                <?php }//foreach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            Coordenador 2: 
        </td>
        <td>
            <select name="ids_coordenadores[]" class="formulario">
           		<option value="">Doutores / Doutorandos</option>
           		<option value="">-------------------------</option>
            	<?php
				foreach($participantes as $participante){ 
					$selected = "";
					$sql_simp_coord = "SELECT * FROM ev_simposio_coordenador 
						WHERE 
							id_simposio='".$simposio["id"]."'
							AND id_participante='".$participante["id"]."'
							AND ordem='2'
						";
					$result_simp_coord = mysql_query($sql_simp_coord, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
					print "<br>id_simposio: ".$simposio["id"]." | id_participante: ".$participante["id"];
					while($simp_coord = mysql_fetch_array($result_simp_coord)){
						print "<br>simp_coord: "; print_r($simp_coord);
						if($simp_coord["id_participante"]==$participante["id"]) $selected = "selected";
					}
					?>
            		<option value="<?php echo $participante["id"]; ?>" <?php print $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                <?php }//foreach ?>
            </select>
        </td>
    </tr>
    <?php if(!empty($simposio["id"])) { ?>
        <tr>
            <td>
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo_sessao" value="<?php echo $simposio["titulo_sessao"]; ?>" class="formulario" style="width:99%;" />
            </td>
        </tr>
        <tr>
            <td style="vertical-align:top">
                Resumo: 
            </td>
            <td>
                  <textarea name="resumo_sessao" class="formulario" style="width:99%; height:150px" ><?php echo $simposio["resumo_sessao"]; ?></textarea> 
                  <br />
                  (Quantidade de caracteres com espa&ccedil;o: de 1000 &agrave; 2000)
            </td>
        </tr>
        <tr>
            <td>
                Palavras-chave: 
            </td>
            <td>
                  <input type="text" name="palavras_chave_sessao" value="<?php echo $simposio["palavras_chave_sessao"]; ?>" class="formulario" style="width:75%"/> 
                  (Tr&ecirc;s palavras separadas por &quot;<b>;</b>&quot;)
            </td>
        </tr>
    <?php } //if ?>
    <tr>
        <td>
            Debatedor 1: 
        </td>
        <td>
			<?php if(!empty($simposio["id"]) && !empty($simposio["debatedor"])) { ?>
              O nome do Debatedor abaixo foi inserido pelo Coordenador do Simpósio:
              <br />
              <input type="text" name="debatedor" value="<?php echo $simposio["debatedor"]; ?>" class="formulario" style="width:375px"/>
              <br /><br />
              Por favor, selecione o cadastro de participante para este Debatedor na seguinte listagem: 
              <br />
            <?php }//if ?>
              <select name="id_participante_debatedor" class="formulario">
                <option value="">Doutores / Doutorandos</option>
                <option value="">-------------------------</option>
                <?php
                foreach($participantes as $participante){ 
                    $selected = ($simposio["id_participante_debatedor"] == $participante["id"]) ? $selected = "selected" : ""; ?>
                    <option value="<?php echo $participante["id"]; ?>" <?php print $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
                <?php }//foreach ?>
        </select></td>
    </tr>
    <tr>
        <td>
            Debatedor 2: 
        </td>
        <td>
            <select name="id_participante_debatedor_2" class="formulario">
              <option value="">Doutores / Doutorandos</option>
              <option value="">-------------------------</option>
              <?php
              foreach($participantes as $participante){ 
                  $selected = ($simposio["id_participante_debatedor_2"] == $participante["id"]) ? $selected = "selected" : ""; ?>
                  <option value="<?php echo $participante["id"]; ?>" <?php print $selected; ?>><?php echo $participante["name"]." | ".$participante["email"]; ?></option>
              <?php }//foreach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            Dia: 
        </td>
        <td>
              <input type="text" name="dia" id="dia" value="<?php echo $simposio["dia"]; ?>" class="formulario" style="width:75px"/> 
              (DD/MM/AAAA)</td>
    </tr>
    <tr>
        <td>
            Hor&aacute;rio: 
        </td>
        <td>
              <input type="text" name="horario" id="horario" value="<?php echo $simposio["horario"]; ?>" class="formulario" style="width:75px; text-align:center"/> 
              (Ex.: 13h30min =&gt; 13:30)
        </td>
    </tr>
    <tr>
        <td>
            Local: 
        </td>
        <td>
              <input type="text" name="local" value="<?php echo $simposio["local"]; ?>" class="formulario" style="width:375px"/>
        </td>
    </tr>
</table>
<input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>