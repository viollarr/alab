<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>Sistema de Eventos ALAB - Administra&ccedil;&atilde;o <?php 
	if(isset($view)){
		/*
		$arr_view = explode("_", $view);
		foreach($arr_view as $part){
			$view_format .= strtoupper($part)." ";
		}
		$view = $view_format;
		*/
		print "(".$view.")";
	} 
?></title>

<!-- Quando for chamada pelo controle.php -->
<link href="telas/css/admin.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="telas/js/funcoes.js"></script> -->

<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script type="application/javascript">
	function mostrar(exibir, id_sub_menu){
		//alert("exibir "+id_sub_menu+": "+exibir);
	
		var sub_menu = document.getElementById(id_sub_menu);
		if(exibir) sub_menu.style.display = "block";
		else sub_menu.style.display = "none";
	}
</script>

<script type="text/javascript">
	function confirma_delecao(msg){
		if (confirm(msg)){
			return true;     
		}else{
			return false;
		}
	}
</script>

</head>

<body>
<a name="topo"></a>
<div id="titulo_admin">Sistema de Eventos ALAB - Administra&ccedil;&atilde;o</div>
<div id="sair" style="float:right">
    <form action="controle.php" method="post">
        <input type="hidden" name="sair" value="true" />
        <input type="submit" value="Sair" id="botao_sair"/>
    </form>
</div>
<?php 
$id_evento_selecionado = $GLOBALS["id_evento_admin"];

require_once("conexao.php");
require_once("../conexao.php");

//if ($_SESSION["id_evento_admin"] != 28) {
if ($_SESSION["superusuario"] == 1) {
	$sql = "SELECT id, titulo FROM ev_evento";
	$result = mysql_query($sql, $conexao);
	$eventos = array();
	while($linha = mysql_fetch_array($result)) {
		array_push($eventos, $linha);
	} //while
	?>
	<div id="bx_select_eventos">
		<form method="get" action="controle.php" id="form_select_eventos">
			Evento: 
			  <select name="id_evento_admin" id="select_eventos" class="formulario">
				<option value="">Selecione o Evento</option>
				<option value="">------------------</option>
				<?php foreach($eventos as $evento){ ?>
					<option value="<?php echo $evento["id"]; ?>" <?php if($evento["id"] == $id_evento_selecionado) print "selected='selected'"; ?>><?php echo $evento["titulo"]; ?></option>
				<?php }//foreach ?>
			</select>
			&nbsp;|&nbsp;
			<input type="submit" value="Exibir" class="botao"/>
		</form>
	</div>
<?php
}

if(isset($id_evento_selecionado)){ ?>

<style type="text/css">
#opcoes_admin{	
	/*width:1050px;*/
	height:30px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#333333;
	cursor:pointer;
	/*margin:0 auto;*/
}
</style>

<div style="width:100%; height:30px; background:#CCCCCC; border-top: 1px solid #999999; border-bottom: 1px solid #999999;">
    <div style="width:1030px; padding-left:30px; margin:0 auto; height:30px; background:#CCCCCC; ">
        <ul id="opcoes_admin">
			<?php if ($_SESSION["superusuario"] == 1): ?>
				<li><a href="controle.php?ctrl=administrador&acao=listar">Administradores</a></li>
			<?php endif; ?>
            <li><a href="controle.php?ctrl=participante&acao=listar">Participantes</a></li>
            <li><a href="controle.php?ctrl=tipo_trabalho&acao=listar_tipos_trabalho">Trabalhos</a></li>
            <li><a href="controle.php?ctrl=item_menu_evento&acao=listar">Menu do Evento</a></li>
            <li><a href="controle.php?ctrl=pagina&acao=listar">Páginas do Evento</a></li>
            <li onmouseover="javascript:mostrar(true, 'sub_opcoes_chamadas');" onmouseout="javascript:mostrar(false, 'sub_opcoes_chamadas');">
                <a href="controle.php?ctrl=chamada&acao=listar">Chamadas</a>
                <ul id="sub_opcoes_chamadas" class="sub_opcoes_admin">
                    <li><a href="controle.php?ctrl=chamada&acao=listar&tipo=trabalho">Chamadas de Trabalhos</a></li>
                    <li><a href="controle.php?ctrl=chamada&acao=listar&tipo=inscricao">Chamadas de Inscrições</a></li>
                </ul>
            </li>
            <li><a href="controle.php?ctrl=linha_tematica&acao=listar">Linhas Temáticas</a></li>
            <?php if ($_SESSION["id_evento_admin"] != 28): ?>
				<li><a href="controle.php?ctrl=topico_simposio&acao=listar">Tópicos dos Simpósios</a></li>
			<?php endif; ?>
        </ul>
    </div>
</div>
<div style="width:100%; height:30px; background:#CCCCCC; border-top: 1px solid #999999; border-bottom: 1px solid #999999;">
    <div style="width:1030px; padding-left:30px; margin:0 auto; height:30px; background:#CCCCCC; ">
        <ul id="opcoes_admin">
            <li><a href="controle.php?ctrl=relatorio&acao=relatorios">Relatórios</a></li>
			<li><a href="controle.php?ctrl=avaliacao&acao=opcoes_avaliacao">Avalia&ccedil;&atilde;o dos Trabalhos</a></li>
			<li><a href="controle.php?ctrl=evento&acao=outras_opcoes">Outras Configura&ccedil;&otilde;es</a></li>
            <li><a href="controle.php?ctrl=presenca&acao=presencas">Presen&ccedil;as</a></li>
        </ul>
    </div>
</div>
<hr style="clear:both" />
<div id="content">
	<?php if(isset($view)) { 
		if($view!="mensagem"){ ?>
			<div id="voltar" style="text-align:right"><a href="javascript:history.back()">Voltar</a></div>
        <?php 
		}//if
		require_once("telas/" . $view . ".php");
	}//if
    ?>
</div>
<?php }//if ?>
</body>
</html>