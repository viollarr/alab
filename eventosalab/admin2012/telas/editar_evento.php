<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script src="telas/js/jquery-1.7.1.src.js"></script>
<script src="telas/js/funcao.js" charset="utf-8"></script>
<script language="javascript" type="text/ecmascript">
$(document).ready(function(e) {
	
    $("#titulo").keyup( function(){
		var string = retira_acentos($(this).val());
		var string2 = string.toLowerCase().replace(/\W/g,'-');
		
		$("#apelido").val(string2);
	});
	$("#apelido").keyup( function(){
		var string = retira_acentos($(this).val());
		var string2 = string.toLowerCase().replace(/\W/g,'-');
		$(this).val(string2);
	});
	
	
});


</script>

<?php 
$editar_evento = $GLOBALS["editar_evento"];
?>
Alterar Evento<br /><br />
<?php
if(!empty($_SESSION['error'])){
	foreach($_SESSION['error'] AS $exibir){
			echo "<font color='#FF0000'>".$exibir."</font><br />";
	}
	unset($_SESSION['error']);
}elseif(!empty($_SESSION['sucesso'])){
	foreach($_SESSION['sucesso'] AS $exibir){
			echo "<font color='#009900'>".$exibir."</font>";
	}
	unset($_POST, $_SESSION['sucesso']);
}
?>
<form action="controle.php" method="post" id="form_dados" enctype="multipart/form-data">
	<input type="hidden" name="ctrl" value="new_evento" />
	<input type="hidden" name="acao" value="criticarCampos" />
    <input type="hidden" name="editar_evento_alteracao" value="salvar_alteracao_evento" />
    <input type="hidden" name="id_evento" value="<?php echo (!empty($_POST))? $_POST['id_evento'] : $editar_evento["id"]; ?>" />
    <input type="hidden" name="imagem_topo" value="<?php echo (!empty($_POST))? $_POST['imagem_topo'] : $editar_evento["imagem_topo"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="150">
                T&iacute;tulo Evento: 
            </td>
            <td>
                <input type="text" name="titulo" id="titulo" size="50" value="<?php echo (!empty($_POST))? $_POST['titulo'] : $editar_evento["titulo"]; ?>" class="formulario"/>
            </td>
      	</tr>
        <tr>
            <td width="150">
                Apelido: 
            </td>
            <td>
                <input type="text" name="apelido" id="apelido"  size="50" value="<?php echo (!empty($_POST))? $_POST['apelido'] : $editar_evento["apelido"]; ?>" class="formulario"/>
            </td>
      	</tr>
        <tr>
            <td>
                Imagem do topo:
            </td>
            <td>
                <input type="file" name="imagem" id="imagem_topo" /> padr&atilde;o: ( 990 X 215 px)<br /><br />
                <img src="telas/imgs_topo_eventos/<?php echo (!empty($_POST))? $_POST['imagem_topo'] : $editar_evento["imagem_topo"]; ?>" title="<?php  echo (!empty($_POST))? $_POST['titulo'] : $editar_evento["titulo"]; ?>" width="50%" height="50%" />           
            </td>
        </tr>
        <tr>
            <td>
                Per&iacute;odo:
            </td>
            <td>
                <input type="text" name="periodo" id="periodo" size="50" value="<?php echo (!empty($_POST))? $_POST['periodo'] : $editar_evento["periodo"]; ?>" class="formulario" /> ex.(25 a 28 de julho de 2012)
            </td>
        </tr>
        <tr>
            <td>
                Local:
            </td>
            <td>
                <input type="text" name="local" id="local" size="50" value="<?php echo (!empty($_POST))? $_POST['local'] : $editar_evento["local"]; ?>" class="formulario" /> ex.(Universidade Federal do Rio de Janeiro)
            </td>
        </tr>
    </table>
<input type="submit" value="Alterar"  class="botao_editar"/>
</form>