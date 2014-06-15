<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $linha = $GLOBALS["registros"][0]; ?>
Linha Temática - <?php print $GLOBALS["titulo_view"]; ?>
<br /><br />
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="linha_tematica" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $linha["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td>
                T&iacute;tulo: 
                  <input type="text" name="titulo" value="<?php echo $linha["titulo"]; ?>" class="formulario"/> 
          </td>
   	  </tr>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>