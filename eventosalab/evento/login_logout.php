<?php 
if($_SESSION['guest']){
?>
    <div id="links_rapidos">
        <div class="titulo_boxes"><h2><?php techo('&Aacute;rea do Participante', 'Participant Area'); ?></h2></div>
        <form action="controle.php" method="post">
            <div align="center" style="margin-top:15px;">
                <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                    <tr>
                        <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                    </tr>
                    <tr>
                        <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>            
<?php
}else{
?>
    <div id="links_rapidos">
        <div class="titulo_boxes"><h2><?php techo('&Aacute;rea do Participante', 'Participant Area'); ?></h2></div>
        <form action="controle.php" method="post">
            <div align="center" style="margin-top:13px;">
                <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                    <tr>
                        <td width="50%" class="txt_topico_tabela">CPF ou Passport:</td>
                        <td width="50%" ><input name="login" type="text" class="formulario" size="13"></td>
                    </tr>
                    <tr>
                        <td class="txt_topico_tabela"><?php techo('senha:', 'password:'); ?></td>
                        <td>
                        	<input name="pass" type="password" class="formulario" size="13" >&nbsp;
                            <input type="submit" class="botao" value="entrar" />
                            <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>">
                            <input type="hidden" name="logar" value="true">
                       	</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="txt"><div align="left"><a href="http://www.alab.org.br/pt/component/user/reset" target="_blank" ><?php techo('esqueci minha senha', 'forgot my password'); ?></a></div></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<?php
}
?>
