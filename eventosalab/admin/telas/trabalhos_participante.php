<link href="telas/css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css"/>
<script src="telas/js/jquery-1.4.4.min.js"></script>
<script src="telas/js/ui/jquery-ui-1.8.9.custom.js"></script>

<script>
	$(document).ready(function() {
		$("#accordion").accordion();
	});
</script>

<?php
$resumos = $GLOBALS["resumos"];
$id_participante = $GLOBALS["id_participante"];
$comunicacoes_coordenadas = $GLOBALS["comunicacoes_coordenadas"];
$simposios_coordenados    = $GLOBALS["simposios_coordenados"];

$sql = "SELECT id, nome, email FROM ev_participante WHERE id = '".$id_participante."' ";
$result = mysql_query($sql, $conexao);
list($id, $nome, $email) = mysql_fetch_array($result);
?>

<h4>Trabalhos do participante: <?=$nome;?></h4>
<div style="border:#CCCCCC 2px solid; padding:10px; margin-bottom:15px; margin-top:10px; border-radius: 5px;">
	Dados do Participante
    <br />
    <strong>ID: </strong><?=$id;?>
    <br />
    <strong>Nome: </strong><a href="controle.php?ctrl=participante&acao=abrir_edicao&id_participante=<?=$id_participante?>" style="text-decoration:underline;"><?=$nome;?></a>
    <br />
    <strong>Email: </strong><?=$email;?>
</div>
<div id="accordion">
	<?php foreach($resumos as $resumo) { ?>
        <h3>
        	<a href="#">
				<?php 
                $sql = "SELECT id, nome FROM ev_tipo_trabalho WHERE id = '".$resumo["id_tipo_trabalho"]."' ";
                $result = mysql_query($sql, $conexao);
                list($id_tipo_trabalho, $nome_tipo_trabalho) = mysql_fetch_array($result);
				
				if($id_tipo_trabalho==1 || $id_tipo_trabalho==2) print "Resumo em ".$nome_tipo_trabalho;
				else print "Resumo de ".$nome_tipo_trabalho;
                ?> 
            </a>
        </h3>
        <div id="bloco_trabalhos_participante">
            <?php
			/*
			print "<pre>";
				print_r($resumo);
			print "</pre>";
			*/
			?>
            <div id="trabalho_titulo" >
            	<div style="float:left; width:770px">
	            	<strong>T&iacute;tulo:</strong> <?=$resumo["titulo"];?>
                </div>
                <div id="trabalho_botoes" style="float:right; ">
                	<?php
					$link_editar = $link_deletar = $frase_confirma_delecao = "";

					switch($resumo["id_tipo_trabalho"]){
						// Editar/Deletar Resumo de Simp�sio
						case 1:
							$link_editar = "controle.php?ctrl=resumo&acao=abrir_edicao&id=".$resumo["id"]."&id_simposio=".$resumo["id_simposio"];
							
							$link_deletar = "controle.php?ctrl=resumo&acao=deletar&id=".$resumo["id"];
							$frase_confirma_delecao = "Voc� tem certeza que deseja deletar este resumo?";

							break;
						
						// Editar/Deletar Resumo de Comunica��o Coordendada
						case 2:
							$link_editar = "controle.php?ctrl=resumo&acao=abrir_edicao&id=".$resumo["id"]."&id_comunicacao_coordenada=".$resumo["id_comunicacao_coordenada"];

							$link_deletar = "controle.php?ctrl=resumo&acao=deletar&id=".$resumo["id"];
							$frase_confirma_delecao = "Voc� tem certeza que deseja deletar este resumo?";

							break;
						
						// Editar/Deletar Comunica��o Individual
						case 3:
							$link_editar = "controle.php?ctrl=comunicacao_individual&acao=abrir_edicao&id=".$resumo["id"];

							$link_deletar = "controle.php?ctrl=comunicacao_individual&acao=deletar&id=".$resumo["id"];
							$frase_confirma_delecao = "Voc� tem certeza que deseja deletar esta comunica��o individual?";

							break;
						
						// Editar/Deletar P�ster
						case 4:
							$link_editar = "controle.php?ctrl=poster&acao=abrir_edicao&id=".$resumo["id"];

							$link_deletar = "controle.php?ctrl=poster&acao=deletar&id=".$resumo["id"];
							$frase_confirma_delecao = "Voc� tem certeza que deseja deletar este p�ster?";

							break;
					}//switch
					?>
                
                	<a href="<?=$link_editar?>" style="font-family: font-size:8px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Editar</a>
                	<a href="<?=$link_deletar?>" onclick="return confirma_delecao('<?=$frase_confirma_delecao?>');" style="font-family: font-size:8px; color:#ffffff; background:#EF3423; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Deletar</a>
                </div>
                <div style="clear:both"></div>
            </div>
            <div id="trabalho_autor" style="margin-top:10px;">
				<?php
				if ($_SESSION["id_evento_admin"] == 28)
					$sql = "SELECT id, nome, email FROM ev_participante WHERE id = (SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = {$resumo["id"]} AND tipo_participante = 'autor')";
				else
					$sql = "SELECT id, nome, email FROM ev_participante WHERE id = '".$resumo["autor"]."' ";
				
				$result = mysql_query($sql, $conexao);
				list($id, $nome, $email) = mysql_fetch_array($result);
				?>
                <strong>Autor:</strong>
                <?php
                if(!empty($id)) { ?> <a href="controle.php?ctrl=participante&acao=abrir_edicao&id_participante=<?=$id?>" style="text-decoration:underline;"><?php print $nome ." (". $email .")"; ?></a>
                <?php } else { ?> - <?php }//else ?>
            </div>
            <div id="trabalho_co_autor" style="margin-bottom:10px;" >
				<?php
				if ($_SESSION["id_evento_admin"] == 28)
					$sql = "SELECT id, nome, email FROM ev_participante WHERE id IN 
							(SELECT id_participante FROM ev_participante_resumo WHERE id_resumo = {$resumo["id"]} AND tipo_participante = 'coautor')";
				else
					$sql = "SELECT id, nome, email FROM ev_participante WHERE id = '".$resumo["co_autor"]."' ";
				
				$result = mysql_query($sql, $conexao);
				?>
                <strong>Co-Autor:</strong>
                <?php
				$link_co_autores = "";
				while(list($id, $nome, $email) = mysql_fetch_array($result)){
					$link_co_autores .= "<a href='controle.php?ctrl=participante&acao=abrir_edicao&id_participante=".$id."' style='text-decoration:underline;'>";
					$link_co_autores .= $nome . " (". $email .")</a>, ";
				} //while
				$link_co_autores = substr($link_co_autores, 0, -2);
				if(!empty($link_co_autores)) echo $link_co_autores;
				else echo "-";
				?>
			</div>
            <div id="trabalho_resumo" style="text-align:justify; margin-bottom:10px;"><?=$resumo["resumo"];?></div>
            <div id="trabalho_palavras_chave" ><strong>Palavras-chave:</strong> <?=$resumo["palavras_chave"];?></div>
        </div>
    <?php }//foreach
	/****************************************
	* Coordenador de Comunica��o Coordenada *
	*****************************************/
	foreach($comunicacoes_coordenadas as $comunicacao_coordenada) { ?>
        <h3>
        	<a href="#">Coordenador de Comunica&ccedil;&atilde;o Coordenada</a>
        </h3>
        <div id="bloco_trabalhos_participante">
            <div id="trabalho_titulo" >
            	<div style="float:left; width:680px; ">
	            	<strong>T&iacute;tulo da Sess&atilde;o:</strong> <?=$comunicacao_coordenada["titulo_sessao"];?>
                </div>
                <div id="trabalho_botoes" style="float:right; ">
                	<?php
					$link_editar = $link_deletar = $frase_confirma_delecao = "";
					
					$link_resumos = "controle.php?ctrl=comunicacao_coordenada&acao=listar_resumos&id=".$comunicacao_coordenada["id"];
					$link_editar  = "controle.php?ctrl=comunicacao_coordenada&acao=abrir_edicao&id=".$comunicacao_coordenada["id"];
					$link_deletar = "controle.php?ctrl=comunicacao_coordenada&amp;acao=deletar&amp;id=".$comunicacao_coordenada["id"];
					$frase_confirma_delecao = "Voc� tem certeza que deseja deletar esta comunica��o coordenada?";
					?>
                	<a href="<?=$link_resumos?>" style="font-family: font-size:8px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Resumos</a>
                	<a href="<?=$link_editar?>" style="font-family: font-size:8px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Editar</a>
                	<a href="<?=$link_deletar?>" onclick="return confirma_delecao('<?=$frase_confirma_delecao?>');" style="font-family: font-size:8px; color:#ffffff; background:#EF3423; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Deletar</a>
                </div>
                <div style="clear:both"></div>
            </div>
            <div id="trabalho_resumo" style="text-align:justify; margin-bottom:10px; margin-top:15px;"><?=$comunicacao_coordenada["resumo_sessao"];?></div>
            <div id="trabalho_palavras_chave" ><strong>Palavras-chave:</strong> <?=$comunicacao_coordenada["palavras_chave_sessao"];?></div>
        </div>
    <?php }//foreach 
	/*********************************************
	* Fim: Coordenador de Comunica��o Coordenada *
	**********************************************/
	
	/**************************
	* Coordenador de Simp�sio *
	***************************/
	foreach($simposios_coordenados as $simposio_coordenado) { ?>
        <h3>
        	<a href="#">Coordenador de Simp&oacute;sio</a>
        </h3>
        <div id="bloco_trabalhos_participante">
            <div id="trabalho_titulo" >
            	<div style="float:left; width:680px; ">
	            	<strong>T&iacute;tulo da Sess&atilde;o:</strong> <?=$simposio_coordenado["titulo_sessao"];?>
                </div>
                <div id="trabalho_botoes" style="float:right; ">
                	<?php
					$link_editar = $link_deletar = $frase_confirma_delecao = "";
					
					$link_resumos = "controle.php?ctrl=simposio&acao=listar_resumos&id_simposio=".$simposio_coordenado["id"];
					$link_editar  = "controle.php?ctrl=simposio&acao=abrir_edicao&id=".$simposio_coordenado["id"];
					$link_deletar = "controle.php?ctrl=simposio&acao=deletar&id=".$simposio_coordenado["id"];
					$frase_confirma_delecao = "Voc� tem certeza que deseja deletar este simp�sio?";
					?>
                	<a href="<?=$link_resumos?>" style="font-family: font-size:8px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Resumos</a>
                	<a href="<?=$link_editar?>" style="font-family: font-size:8px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Editar</a>
                	<a href="<?=$link_deletar?>" onclick="return confirma_delecao('<?=$frase_confirma_delecao?>');" style="font-family: font-size:8px; color:#ffffff; background:#EF3423; border: 1px solid #CCCCCC; padding: 2px 7px; cursor:pointer;">Deletar</a>
                </div>
                <div style="clear:both"></div>
            </div>
            <div id="trabalho_resumo" style="text-align:justify; margin-bottom:10px; margin-top:15px;"><?=$simposio_coordenado["resumo_sessao"];?></div>
            <div id="trabalho_palavras_chave" ><strong>Palavras-chave:</strong> <?=$simposio_coordenado["palavras_chave_sessao"];?></div>
        </div>
    <?php }//foreach 
	/*******************************
	* Fim: Coordenador de Simp�sio *
	********************************/
?>
</div>