<?php
	require_once("conexao.php");
	require_once("check_user.php");
	
	$id_participante=$_SESSION['id_participante'];
	$id_evento=$_SESSION['id_evento'];	
	$data_hoje=date('Y-m-d');
	//$data_hoje="2011-03-17";
	
	$sql_participante = "SELECT * FROM ev_participante 
						 WHERE id='".$_SESSION['id_participante']."' AND id_evento='".$_SESSION['id_evento']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	$id_tipo_participante=$p['id_tipo_participante'];
	
	//print "id tipo participante: ".$id_tipo_participante."<br />";
	//print "Data hoje: ".$data_hoje."<br />";
	
	$sql_chamada = "SELECT * FROM ev_chamada WHERE id_evento='".$_SESSION['id_evento']."' AND tipo='inscricao'";
	$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
	while($ch=mysql_fetch_assoc($qr_chamada)){
		
		if (($data_hoje >= $ch['data_inicio'] ) and ($data_hoje <= $ch['data_fim'] )) {
			//print"id chamada: ". $ch['id']."<br />";
			$sql="SELECT preco FROM ev_chamada_tipo_participante WHERE id_chamada='".$ch['id']."' AND id_tipo_participante='".$id_tipo_participante."' ";
			$qr= mysql_query($sql, $conexao) or die(mysql_error());
			$ln=mysql_fetch_assoc($qr);
			$valor_boleto=$ln['preco'].",00";	
		}
	}
	
	
	
	
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
        <div style="margin-left:30px;">
        	<span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impressão de boleto</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="cartaaceite.php">CartA de aceite</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participação</a></span>
		</div>
        <p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">

    <div id="artigo">
       <div id="box_trabalhos">
       		<span class="txt_titulo_destaque">Impress&atilde;o de boleto</span>
         <p>&nbsp;</p> 
         <? 
		 if (($id_tipo_participante!=8) and ($id_tipo_participante!=10)){
			 if($valor_boleto!=""){
			 /*
			 ?>
			 <form action="boleto/boleto_bb.php" method="post" target="_blank">
			   <input type="submit" name="button" id="button" class="botao_trabalho" value="Gerar boleto" />
				 <input name="valor_boleto" type="hidden" value="<?=$valor_boleto;?>" />
				 <input name="id_evento" type="hidden" value="<?=$id_evento;?>" />
				 <input name="id_participante" type="hidden" value="<?=$id_participante;?>" />             
			 </form>
			 <? 
			 */
			 ?>
			 <p class="txt_topico_tabela">O boleto para pagamento da inscri&ccedil;&atilde;o no evento ainda n&atilde;o est&aacute; dispon&iacute;vel.</p>
             <?php
			 }else{ ?>
			 <p class="txt_topico_tabela">Não está no período de pagamento.</p> 
		 <? }
		 }else{//if participante
			 print '<p class="txt_topico_tabela">Convidados da ALAB não pagam a inscrição do evento.</p>';
		 }
		 ?>
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
