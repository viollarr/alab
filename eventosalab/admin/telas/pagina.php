<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$pagina = $GLOBALS["pagina"]; 
$pagina["conteudo"] = str_replace("src=\"images/", "src=\"../../images/", $pagina["conteudo"]);
$pagina["conteudo_en"] = str_replace("src=\"images/", "src=\"../../images/", $pagina["conteudo_en"]);
?>
<script type="text/javascript" src="telas/js/ckeditor/ckeditor.js"></script>

P&aacute;gina - <?php print $GLOBALS["titulo_view"]; ?>
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="pagina" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $pagina["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                T&iacute;tulo: 
            </td>
            <td>
                  <input type="text" name="titulo" value="<?php echo $pagina["titulo"]; ?>" class="formulario" style="width:375px;" />
            </td>
        </tr>
        <tr>
            <td width="120">
                T&iacute;tulo em ingl&ecirc;s: 
            </td>
            <td>
                  <input type="text" name="titulo_en" value="<?php echo $pagina["titulo_en"]; ?>" class="formulario" style="width:375px;" />
            </td>
        </tr>
        <tr>
            <td>
                Conte&uacute;do: 
            </td>
            <td>
            	<textarea id="editor1" name="conteudo" class="formulario" style="width:99%; height:150px" ><?php echo $pagina["conteudo"]; ?></textarea>
				<script type="text/javascript">
				CKEDITOR.replace('editor1', {
					resize_enabled: false,
					skin: 'v2',
					toolbar: [
						['Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', '-', 'Bold', 'Italic', 'BulletedList', 'NumberedList', '-', 'Image', '-', 'Maximize', 'Source', '-', 'Link', 'Unlink']
					],
					toolbarCanCollapse: false,
					filebrowserImageBrowseUrl: '/eventosalab/admin/telas/js/ckeditor/ckfinder/ckfinder.html?type=Images',
					filebrowserImageUploadUrl: '/eventosalab/admin/telas/js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
				});
				</script>
            </td>
        </tr>
		<tr>
            <td>
                Conte&uacute;do em ingl&ecirc;s: 
            </td>
            <td>
            	<textarea id="editor2" name="conteudo_en" class="formulario" style="width:99%; height:150px" ><?php echo $pagina["conteudo_en"]; ?></textarea>
				<script type="text/javascript">
				CKEDITOR.replace('editor2', {
					resize_enabled: false,
					skin: 'v2',
					toolbar: [
						['Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', '-', 'Bold', 'Italic', 'BulletedList', 'NumberedList', '-', 'Image', '-', 'Maximize', 'Source', '-', 'Link', 'Unlink']
					],
					toolbarCanCollapse: false,
					filebrowserImageBrowseUrl: '/eventosalab/admin/telas/js/ckeditor/ckfinder/ckfinder.html?type=Images',
					filebrowserImageUploadUrl: '/eventosalab/admin/telas/js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
				});
				</script>
            </td>
        </tr>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>