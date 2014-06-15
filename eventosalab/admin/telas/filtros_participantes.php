<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.filtro{}
	.filtro label:hover{cursor:pointer; font-weight:bold;}
	.filtro input{margin-right:5px;}
</style>

<?php $tipos = $GLOBALS["tipos"]; ?>
<h3>Relat&oacute;rio de Participantes - Op&ccedil;&otilde;es de Relat&oacute;rio</h3>
<br />
<form action="controle.php" method="post" id="form_dados">
    <input type="hidden" name="ctrl" value="relatorio" />
    <input type="hidden" name="acao" value="listar_participantes_filtrados" />
    <table class="tab_admin">
        <tr class="tab_admin_head">
            <td>Op&ccedil;&otilde;es</td>
        </tr>
        <tr class="filtro">
            <td>
                <label>
                    <input type="radio" name="filtro" value="completo"> Todos (completo)
                </label>
            </td>
        </tr>
        <tr class="filtro">
            <td>
                <label>
                    <input type="radio" name="filtro" value="todos"> Todos (nome, email)
                </label>
            </td>
        </tr>
		<?php if ($_SESSION['id_evento_admin'] != 28): ?>
        <tr class="filtro">
            <td>
                <label>
                    <input type="radio" name="filtro" value="estrangeiros"> Estrangeiros
                </label>
            </td>
        </tr>
		<?php endif; ?>
        <tr class="filtro">
            <td>
                <label>
                    <input type="radio" name="filtro" value="ouvintes"> Ouvintes
                </label>
            </td>
        </tr>
        <tr class="filtro">
            <td>
            <label>
                    <input type="radio" name="filtro" value="pagantes"> 
                Pagaram</label></td>
        </tr>
        <tr class="filtro">
          <td>
            <label>
              <input type="radio" name="filtro" value="nao_pagantes"> 
              N&atilde;o pagaram
              </label></td>
        </tr>
    </table>
	<input type="submit" value="Exibir relat&oacute;rio"  class="botao_editar"/>
</form>