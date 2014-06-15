<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php $admin = $GLOBALS["admin"]; ?>

Administrador - <?php print $GLOBALS["titulo_view"]; ?>
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="administrador" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $admin["ID"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td width="120">
                Login:
            </td>
            <td>
                  <input type="text" name="login" value="<?php echo $admin["login"]; ?>" class="formulario" style="width:375px;" />
            </td>
        </tr>
        <tr>
            <td width="120">
                Senha: 
            </td>
            <td>
                  <input type="password" name="senha" value="<?php echo $admin["senha"]; ?>" class="formulario" style="width:375px;" />
            </td>
        </tr>
    </table>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>