<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$item = $GLOBALS["itens_menu"][0];
$artigos = $GLOBALS["artigos"];
?>
Itens de Menu - <?php print $GLOBALS["titulo_view"]; ?>
<br /><br />
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="item_menu_evento" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $item["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="150">
                Texto do Bot&atilde;o: 
            </td>
            <td>
                <input type="text" name="texto_botao" value="<?php echo $item["texto_botao"]; ?>" class="formulario"/>
            </td>
      	</tr>
        <tr>
            <td width="150">
                Texto do Bot&atilde;o em ingl&ecirc;s: 
            </td>
            <td>
                <input type="text" name="texto_botao_en" value="<?php echo $item["texto_botao_en"]; ?>" class="formulario"/>
            </td>
      	</tr>
        <tr>
            <td>
                Artigo: 
            </td>
            <td>
                  <select name="id_artigo" class="formulario">
                  	<option value="">Selecione o Artigo</option>
                  	<option value="">------------------</option>
                    <?php foreach($artigos as $artigo){ ?>
                        <option value="<?php print $artigo["id"]; ?>" 
							<?php if($item["id_artigo"]==$artigo["id"])
								print "selected"; 
						?>>
							<?php print $artigo["title"]; ?>
                        </option>
                    <?php }//foreach ?>
                  </select>
            </td>
        </tr>
        <tr>
            <td>
                Ordem de exibi&ccedil;&atilde;o:
            </td>
            <td>
                <input type="text" name="ordem" value="<?php echo $item["ordem"]; ?>" class="formulario" style="width:20px;"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>