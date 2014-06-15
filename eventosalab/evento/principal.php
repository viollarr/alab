<?php
	require_once("sessoes.php");
	$_SESSION["id_evento"] = $id_evento;
	$select_evento = "SELECT * FROM ev_evento WHERE id = '".$_SESSION["id_evento"]."'";
	$query_evento = mysql_query($select_evento);	
	$rows = mysql_num_rows($query_evento);
	if($rows == 1){
		$evento_conteudo = mysql_fetch_array($query_evento);
	}

	$select_estados = "SELECT * FROM ev_estados ORDER BY nome ASC";
	$query_estados = mysql_query($select_estados);
	while($x = mysql_fetch_assoc($query_estados)){
		$estados[] = $x;
	}
	
	$data_hoje=date('Y-m-d');

	$sql_chamada = "SELECT data_fim 
					FROM ev_chamada 
					WHERE 
						id_evento='".$_SESSION['id_evento']."' 
						AND tipo='trabalho' 
						AND estado = 'ativa'
					ORDER BY ordem DESC LIMIT 1";
	$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
	$m_chamada = mysql_fetch_assoc($qr_chamada);
	$ultima_chamada_trabalho = $m_chamada['data_fim'];

	$sql_participante = "SELECT us.*, ev.id_tipo_participante, ev.modalidade_participacao FROM ev_participante ev, jos_users us WHERE ev.id='".$_SESSION['id_participante']."' AND ev.id_associado_alab = us.id";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$mostrar=mysql_fetch_array($qr_participante);
	$id_tipo_participante = $mostrar['id_tipo_participante'];
	$formacao = $mostrar['titulacao_academica'];
	$modalidade_participacao = $mostrar['modalidade_participacao'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />
<style type="text/css">
	.titulo_boxes {
		color:#FFFFFF;
		text-align:center;
		text-transform:uppercase;
	}
	.titulo_boxes_modal {
		padding-top:10px;
	}
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

<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript">
	
<?php
	if($_SESSION['modelo']['tipo_residencia'] == 0){
?>

		$(document).ready(function() { 
		
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
	
			$("#boxes").show(1000);
				
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
		});	
<?php } ?>

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
                <div id='botao' align="center" style="margin-top:15px; margin-bottom:10px;">
            		<input class="botao" type="button" value="Atualizar" onclick="submit(this);" />
                </div>
            </div>
    	</form>
    </div>
    <div id="mask" style="display:none;"></div>   
	<div id="header">
		<?php /*
        <img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner_final_pequeno.jpg" width="990" height="215" />
        */ ?>
        	<img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
     <?php if ($modalidade_participacao==1) {//1 -> com trabalho //1 -> é associado alab?>
       <span class="txt_categorias"><strong>Inscrições COM trabalho </strong></span>
       <div id="box_trabalhos">
       	<span class="txt_topico_tabela">Cada participante s&oacute; pode ser autor ou co-autor de um trabalho.</span>
       	<!--<span class="txt_topico_tabela">Para poder inscrever seu trabalho <?php /*nas modalidades Comunica&ccedil;&atilde;o Coordenada e Comunica&ccedil;&atilde;o Individual */?>&eacute; preciso ser Associado ALAB.</span>-->
       	<br />
        <br />
        <?php
		///////////////////////////////////////
		// Verificar quantidade de trabalhos //
		///////////////////////////////////////
		
		$qtd_trabalhos_cadastrados = 0;
		$trabalhos_cadastrados = array();
		$j = 0;
		
		// Autor: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
		//comentado abaixo para exibir o formulario de resumo somente se o participante não tenha sido ainda autor de nenhum resumo
		//$sql = "SELECT id, id_tipo_trabalho, titulo FROM ev_resumo WHERE (autor='".$_SESSION['id_participante']."' OR co_autor='".$_SESSION['id_participante']."') AND id_evento='".$_SESSION['id_evento']."' ORDER BY id ASC";
		$sql = "SELECT id, id_tipo_trabalho, titulo FROM ev_resumo WHERE autor='".$_SESSION['id_participante']."' AND id_evento='".$_SESSION['id_evento']."' ORDER BY id ASC";
		
		$result = mysql_query($sql, $conexao);
		while($resumo = mysql_fetch_array($result)){
			$trabalhos_cadastrados[$j]["id"]               = $resumo["id"];
			$trabalhos_cadastrados[$j]["id_tipo_trabalho"] = $resumo["id_tipo_trabalho"];
			$trabalhos_cadastrados[$j]["titulo"]           = $resumo["titulo"];
			if($resumo['autor'] == $_SESSION['id_participante']){
				$trabalhos_cadastrados[$j]["eh_autor"]     = true;
			}
			elseif($resumo['co-autor'] == $_SESSION['id_participante']){
				$trabalhos_cadastrados[$j]["eh_co_autor"]  = true;
			}
			$j++;
		}//while		
		
		$qtd_trabalhos_cadastrados = $j;
		//print "\$qtd_trabalhos_cadastrados: ".$qtd_trabalhos_cadastrados."</br>";
		if($qtd_trabalhos_cadastrados>=1){
			?>
			<span class="txt_topico_tabela">Limite de cadastro de trabalhos alcan&ccedil;ado.
            <br />
            <ul>
			<?php
			foreach($trabalhos_cadastrados as $trabalho_cadastrado){
				echo "<li>";
				switch($trabalho_cadastrado["id_tipo_trabalho"]){
					case 4:
						if($trabalho_cadastrado["eh_autor"]) echo "Autor do Pôster <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor do Pôster <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						break;
					case 5:
						if($trabalho_cadastrado["eh_autor"]) echo "Autor do Paper <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor do Paper <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						break;
				}
				echo "</li>";
			}//foreach
			?>
            </ul>
            <br />
            Para ver os detalhes dos trabalhos enviados clique em <span class="menuinterno"><a href="resumos.php" title="Detalhes dos trabalhos enviados">RESUMOS ENVIADOS</a></span>.</span>
            <br />
            <br />
            <?php
		}//if
		
		////////////////////////////////////////////
		// fim: Verificar quantidade de trabalhos //
		////////////////////////////////////////////
        ?>
         <?php 
		 	$sql_trabalhos = "SELECT t.id, t.nome, t.descricao
							  FROM ev_evento_tipo_trabalho ev_t, ev_tipo_trabalho t
							  WHERE ev_t.id_evento = '".$_SESSION['id_evento']."'  
							  AND t.id = ev_t.id_tipo_trabalho";
			$qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());
		 ?>
         <?php 
			while($mostrar_trabalho=mysql_fetch_array($qr_trabalho)){ 						
				if ($qtd_trabalhos_cadastrados<1){
					###############  MODALIDADE  POSTER #####################################################################
					if ($mostrar_trabalho['id']==4) { //poster ?>
						 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
						 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
						 <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
						 <p><form action="trabalho.php" method="post">
						 <label>
						 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
						 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
						 </label>
						 </form></p>
                      <?php } elseif(empty($ultima_chamada_trabalho)){ ?> 
                     		<p class="dados_obrigatorios">N&atilde;o foi aberta as inscri&ccedil;&otilde;es.</p>    
					 <?php } else{ ?>
						<p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
					 <?php } // else ?>
					 <p>&nbsp;</p>
					<?php } 
					
					###############  MODALIDADE  PAPER #####################################################################
					if ($mostrar_trabalho['id']==5) { //poster ?>
						 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
						 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
						 <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
						 <p><form action="trabalho.php" method="post">
						 <label>
						 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
						 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
						 </label>
						 </form></p>
                     <?php } elseif(empty($ultima_chamada_trabalho)){ ?> 
                     		<p class="dados_obrigatorios">N&atilde;o foi aberta as inscri&ccedil;&otilde;es.</p>
					 <?php } else{ ?>
						<p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
					 <?php } // else ?>
					 <p>&nbsp;</p>
					<?php } 
				}// fim do if ($qtd_trabalhos_cadastrados<1) (Pôster e Paper)
			}//while
		 ?>
	   </div>
       <?php 
	   }
	   else if ($modalidade_participacao==0){//0 -> sem apresentação de Trabalho ?>
       <span class="txt_categorias"><strong>Inscrições SEM trabalho </strong></span>
       <div id="box_trabalhos">
         <p class="txt_titulo_noticias_2"> Participantes sem apresenta&ccedil;&atilde;o de trabalho. </p>
       </div>
       <?php } ?>
       	
    </div>
       
  </div>   

  		<div id="lado_direito">
			<?php require_once("login_logout.php"); ?>
            <br />
        </div><!-- lado direito -->
        <div class="clear"></div>
		<div id="footer">
              <div align="center">
                  <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
              </div>	
        </div>

    </div><!-- tudo -->
</body>
</html>
