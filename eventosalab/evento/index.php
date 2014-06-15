<?php
	require_once("sessoes.php");
		
	$id_evento = (int) $_REQUEST['id'];
	$_SESSION["id_evento"] = $id_evento;
	$pagina = end(explode("/", $_SERVER['PHP_SELF']));
	
/*	$_SESSION["login"] = $user->cpf;
	$_SESSION["pass"] = $user->password;
	$_SESSION["id_evento"] = $id_evento;
	$_SESSION["nome_participante"] = mb_strtoupper($user->name);
	
	$select_id = "SELECT id FROM ev_participante WHERE id_associado_alab = ".$user->id." AND id_evento = ".$id_evento." ";
	$query_id = mysql_query($select_id);
	$id_participante = mysql_fetch_array($query_id);
	$_SESSION["id_participante"] = $id_participante["id"];
*/

	$select_estados = "SELECT * FROM ev_estados ORDER BY nome ASC";
	$query_estados = mysql_query($select_estados);
	while($x = mysql_fetch_assoc($query_estados)){
		$estados[] = $x;
	}

 	$select_evento = "SELECT * FROM ev_evento WHERE id = '".$_SESSION["id_evento"]."'";
	$query_evento = mysql_query($select_evento);	
	$rows = mysql_num_rows($query_evento);
	if($rows == 1){
		$evento_conteudo = mysql_fetch_array($query_evento);
		$sql = "SELECT id, titulo, conteudo FROM ev_paginas WHERE id_evento = $id_evento";
		$qr = mysql_query($sql,$conexao) or die(mysql_error());
		$ln = mysql_fetch_array($qr);
		$id_artigo = $ln['id'];
		$title = $ln['titulo'];
		$conteudo = $ln['conteudo'];
		$_SESSION['imagem_topo'] = $evento_conteudo['imagem_topo'] ;
		
		$query_title = mysql_query("SELECT titulo_en FROM ev_paginas WHERE id = $id_artigo");
		$query_conteudo = mysql_query("SELECT conteudo_en FROM ev_paginas WHERE id = $id_artigo");
		if (mysql_num_rows($query_title))
			$title_en = mysql_result($query_title, 0);
		if (mysql_num_rows($query_conteudo))
			$conteudo_en = mysql_result($query_conteudo, 0);
		
		
		// Para puxar as imagens do lugar certo! Ou seja, sair de eventosalab e ir para a raiz do site
		// images/
		$conteudo = str_replace("src=\"images/", "src=\"../../images/", $conteudo);
		$conteudo_en = str_replace("src=\"images/", "src=\"../../images/", $conteudo_en);
		
		// <a href="images/stories/alab/CBLA/anais-modelo-ixcbla.doc">anais-modelo-ixcbla.doc <img border="0" src="../components/com_linkr/assets/img/files.icon.doc.png"></a>
		$conteudo = str_replace("href=\"images/", "href=\"../../images/", $conteudo);
		$conteudo_en = str_replace("href=\"images/", "href=\"../../images/", $conteudo_en);
		
		// Componente Linkr
		// <img border="0" src="components/com_linkr/assets/img/files.icon.doc.png">
		$conteudo = str_replace("src=\"components/", "src=\"../../components/", $conteudo);
		$conteudo_en = str_replace("src=\"components/", "src=\"../../components/", $conteudo_en);
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Sistema de eventos ALAB</title>
    <link rel="stylesheet" href="css/template.css" type="text/css" />
	<style type="text/css">
        .tipo_residencia{
            width:20%;
        }
        .residencia{
            height:18px; 
            margin-left:10px; 
            border:solid 1px #007EC2; 
            font-size:14px;
        }
        .select_model{
            font-size:14px; 
            margin-left:10px; 
            border:solid 1px #007EC2;	
        }
    </style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
<?php
	if(($_SESSION['modelo']['tipo_residencia'] == 0)&&($_SESSION['guest'])){
?>
			if($("#escolha3").is(":checked")){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
				$('#botao').show();
		
			}
			else if($("#escolha4").is(":checked")){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#botao').show();
			}
			else{
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#botao').hide();
			}
			
			$('#escolha3').click(function(){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
				$('#botao').show();
			});
			$('#escolha4').click(function(){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#botao').show();
			});	
		
			$("#boxes").show();
			var maskHeight = $(document).height();
            var maskWidth = $(window).width();

            $('#mask').css({'width':maskWidth,'height':maskHeight,'z-index':99,'position':'absolute','display':'block','background-color':'#CCC','opacity':0.8});
			$('#mask').fadeIn(1000);        
			$('#mask').fadeTo("slow",0.8);
			
			var winH = '40%';
			var winW = '40%';
			
		  
		  	//$("#boxes").css({'top':winH,'left':winW,'position':'absolute','z-index':999,'background-color':'#FFF','display':'block'});
	
			$("#boxes").show(2000);
				
			$(function(){
				var idCidade = $('#cidade_id_res').val();
				$('#id_estado_res').change(function(){
					if( $(this).val() ) {
						$('#id_cidade_res').hide();
						$('.carregando').show();
						$.getJSON('../../administrator/components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
							 var option = new Array();
							for (var i = 0; i < j.length; i++) {
								
								option[i] = document.createElement('option');//criando o option
											$( option[i] ).attr( {value : j[i].cod_cidades, selected : ( idCidade == j[i].cod_cidades ) ? true : false } );//colocando o value no option
											$( option[i] ).append( j[i].nome );//colocando o 'label'
											
							}	
							$('#id_cidade_res').html(option).show();
							$('.carregando').hide();
						});
					} else {
						$('#id_cidade_res').html('<option value="">-- Escolha um estado --</option>');
					}
				});
			});
<?php } ?>
		});
		$(function() {
			$('#datanascimento').mask('99/99/9999');
			$('#cep').mask('99999-999');
			$('#cpf').mask('99999999999');
			$('#telefone').mask('(99) 9999-9999');
		});
    </script>
</head>
<body>
    <div id="tudo">
    <div id="boxes" style="display:none;">
    	<form action="controle.php" enctype="multipart/form-data" method="post">
        	<input type="hidden" name="atualiza_cidade" value="true" />
            <input name="pagina" type="hidden" value="<?php echo $pagina ;?>" />
            <input name="id_evento" type="hidden" value="<?php echo $_SESSION['id_evento']; ?>" />
            <input type="hidden" name="id_joomla" value="<?php echo $_SESSION['id_joomla']; ?>" />
            <h3>Atualize seus dados</h3><br />
        	<div id="dialog2" class="window" style="padding-left:10px;"><span style="font-weight:bold;">Tipo de Residência: </span>
                <input type="radio" name="tipo_residencia" id="escolha3" value="1" class="tipo_residencia" /><label style="margin-left:-7%;">Brasil</label>
                <input type="radio" name="tipo_residencia" id="escolha4" value="2" class="tipo_residencia" /><label style="margin-left:-7%;">Outro país</label>
            	<div id="estado_nacional" style="margin-top:30px;"><label style="font-weight:bold;">Estado: </label>
                    <select name="id_estado_res" id="id_estado_res" class="select_model">
                        <option value=""></option>
                        <?php
                            foreach($estados AS $estado){
                                echo '<option uf="'.$estado['sigla'].'" value="'.$estado['cod_estados'].'" '.$select.'>'.$estado['nome'].'</option>';
                            }
                        ?>
                    </select> 
                </div>
            	<div id="cidade_nacional" style="margin-top:15px;"><label style="font-weight:bold;">Cidade: </label>
                    <select name="id_cidade_res" id="id_cidade_res" class="select_model">
                        <option value="">-- Escolha um estado --</option>
                    </select> 
                </div>
            	<div id="estado_outro"  style="margin-top:30px;"><label style="font-weight:bold;">Estado: </label>
                    <input type="text" name="estado_res" size="30" class="residencia" /> 
                </div>
            	<div id="cidade_outro" style="margin-top:15px;"><label style="font-weight:bold;">Cidade: </label>
                    <input type="text" name="cidade_res" size="30" class="residencia" /> 
                </div>
                <div id='botao' align="center" style="margin-top:30px; margin-bottom:10px; text-align:left;">
            		<input class="botao" type="button" value="Atualizar" onclick="submit(this);" />
                </div>
            </div>
    	</form>
    </div>
    <div id="mask" style="display:none;"></div>   
        <div id="header">
            <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
    	<div class="clear"></div>
   		 <?php require_once("inscreva_se.php");?>
        <div id="centro">
            <div id="artigo">
                <div id="box_trabalhos">
                    <p><span class="txt_titulo_destaque"><?php techo($title, $title_en); ?></span><br /></p>
                    <p>&nbsp;</p>
                <div id="texto_conteudo">
                    <p><?php techo($conteudo, $conteudo_en);?></p>       
                </div>
            </div>
        </div>
    </div>   
    <div id="lado_direito">
		<?php require_once("login_logout.php"); ?>
        <br />
        <!--<div id="links_rapidos">
        <div class="titulo_boxes"><h2>Links interessantes</h2></div>
            <ul>
                <li><a href="#">Documento oficial</a></li>
                <li><a href="#">Normas a serem seguidas</a></li>
                <li><a href="#">Site da ALAB</a></li>                                                            
            </ul>
        </div>-->
    </div><!-- lado direito -->
    <div class="clear"></div>
    <div id="footer">
        <div align="center">
            <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
        </div>	
    </div>
</div>
</body>
</html>
