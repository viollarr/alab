<?php
	require_once("conexao.php");
	require_once("check_user.php");
	
	//$id_participante=$_SESSION['id_participante'];
	//$id_evento=$_SESSION['id_evento'];	
	//RESUMOS DE COMUNICAÇÃO INDIVIDUAL E POSTER
	$sql_resumos = "SELECT r.id AS idresumo, tt.nome AS tipodetrabalho, r.titulo AS tituloresumo, r.id_linha_tematica, r.titulo, r.id_tipo_trabalho, r.id_simposio, r.id_comunicacao_coordenada, r.autor, r.co_autor, r.resumo, r.palavras_chave, r.confirmado   
					FROM ev_resumo r, ev_tipo_trabalho tt
					WHERE  r.id_tipo_trabalho = tt.id AND
					(r.autor='".$_SESSION['id_participante']."' OR r.co_autor='".$_SESSION['id_participante']."') AND 
					r.id_evento='".$_SESSION['id_evento']."' AND
					(r.id_tipo_trabalho='3' OR r.id_tipo_trabalho='4')
					ORDER BY r.id ASC";
	$resumos = mysql_query($sql_resumos, $conexao) or die(mysql_error());
	
	
	$sql_simposio = "SELECT s.id AS idsimposio, s.id_topico, s.titulo_sessao, s.resumo_sessao, s.palavras_chave_sessao, s.debatedor,s.confirmado
					 FROM  ev_simposio s, ev_participante p, ev_simposio_coordenador sc
					 WHERE s.id_evento = '".$_SESSION['id_evento']."' AND
					 p.id = '".$_SESSION['id_participante']."' AND
					 p.id = sc.id_participante AND
					 s.id = sc.id_simposio
					 ORDER BY s.id ASC";
	$simposio = mysql_query($sql_simposio, $conexao) or die(mysql_error());
	$existe_simposio=mysql_num_rows($simposio);				 

	$sql_coordenada = "SELECT p.nome AS nomeparticipante, c.id AS idcoordenada, c.id_linha_tematica, c.titulo_sessao, c.resumo_sessao, c.palavras_chave_sessao, c.confirmado
					 FROM ev_comunicacao_coordenada c, ev_participante p
					 WHERE c.id_evento = '".$_SESSION['id_evento']."' AND
					 c.id_coordenador = '".$_SESSION['id_participante']."' AND
					 c.id_coordenador = p.id
					 ORDER BY c.id ASC";
    $coordenada = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
	$existe_coordenada=mysql_num_rows($coordenada);				
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Carta de Aceite</span>
         <p>&nbsp;</p> 
		 <?php if ($existe_simposio>0){
       			while($mostrar_simposio= mysql_fetch_array($simposio)){
				$id_sessao=$mostrar_simposio['idsimposio'];
				$id_linha_tematica=0;
				$id_trabalho=1; // 1 = simposio;
				?>
         <p class="destaque"><?php print $mostrar_simposio['titulo_sessao'];?> <span class="txt_categorias"><strong> (Simpósio)</strong></span></p>
         	
				<? if ($mostrar_simposio['confirmado']=='sim'){ ?>
                 <span class="menuinterno"><a href="#">Visualizar carta de aceite</a></span>
                <? }else{ ?> 
                 <span class="menuinterno"><a href="#">A carta de aceite ainda não está disponível</a></span>
                <? }?>

         
         <p>&nbsp;</p>
       <?php 
	   		}
	   } 
	   ?>

       <?php if ($existe_coordenada>0){
       			while($mostrar_coordenada= mysql_fetch_array($coordenada)){
				$id_sessao=$mostrar_coordenada['idcoordenada'];	
				$id_linha_tematica=$mostrar_coordenada['id_linha_tematica'];			
				$id_trabalho=2; // 2 = coordenada;
				?>
         <p class="destaque"><?php print $mostrar_coordenada['titulo_sessao'];?> <span class="txt_categorias"><strong> (Comunicação Coordenada)</strong></span></p>
         
				<? if ($mostrar_coordenada['confirmado']=='sim'){ ?>
                 <span class="menuinterno"><a href="#">Visualizar carta de aceite</a></span>
                <? }else{ ?> 
                 <span class="menuinterno"><a href="#">A carta de aceite ainda não está disponível</a></span>
                <? }?>
         
         <p>&nbsp;</p>
       <?php 
	   		}
	   } ?>
<?php while($mostrar= mysql_fetch_array($resumos)){ 
			if (($mostrar['id_comunicacao_coordenada']==0) and ($mostrar['id_simposio']==0)){
	   ?>
	     <p class="destaque"><?php print $mostrar['tituloresumo'];?> <span class="txt_categorias"><strong> (<?php print $mostrar['tipodetrabalho'];?>)</strong></span></p>
		
				<? if ($mostrar['confirmado']=='sim'){ ?>
                 <span class="menuinterno"><a href="#">Visualizar carta de aceite</a></span>
                <? }else{ ?> 
                 <span class="menuinterno"><a href="#">A carta de aceite ainda não está disponível</a></span>
                <? }?>

         <p>&nbsp;</p>
         <?php 
	   		}
	   } ?>
      </div>
    </div>
       
  </div>   

  		<div id="lado_direito">
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Área do Participante</h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
                            <!-- id = id do envento-->
                          </tr>
                        </table>
                      </div>
                    </form>

            </div>            <br />
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

    </div><!-- tudo -->
</body>
</html>
