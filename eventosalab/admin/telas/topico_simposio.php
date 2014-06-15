<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $topico = $GLOBALS["topico"]; ?>
T&oacute;pico Simp&oacute;sio - <?php print $GLOBALS["titulo_view"]; ?>
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="topico_simposio" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $topico["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td>
                T&iacute;tulo: 
                  <input type="text" name="nome" value="<?php echo $topico["nome"]; ?>" class="formulario" style="width:375px"/> 
          </td>
   	  </tr>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>