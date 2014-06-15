<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
	
	$id_participante=$_SESSION['id_participante'];
	$id_evento=$_SESSION['id_evento'];	
	$data_hoje=date('Y-m-d');
	//$data_hoje="2011-03-17";
	
	$sql_participante = "SELECT us.*, ev.id_tipo_participante, tp.isento_inscricao FROM ev_participante ev, jos_users us, ev_tipo_participante tp
						 WHERE ev.id='".$_SESSION['id_participante']."' AND ev.id_evento='".$_SESSION['id_evento']."' AND ev.id_associado_alab = us.id AND (ev.id_tipo_participante = tp.id AND tp.id_evento='".$_SESSION['id_evento']."' )";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	$id_tipo_participante=$p['id_tipo_participante'];
	//$isento_inscricao = $p['isento_inscricao'];
		
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
<style type="text/css">
	.titulo_boxes {
		color:#FFFFFF;
		text-align:center;
		text-transform:uppercase;
	}
</style>
<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
</head>

<body>
<div id="tudo">

		<div id="header">
            <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">

    <div id="artigo">
       <div id="box_trabalhos">
       		<span class="txt_titulo_destaque">Impress&atilde;o de boleto</span>
         <p>&nbsp;</p> 
         <? 
		 if ($isento_inscricao!="sim"){
			 if($valor_boleto!=""){
			 ?>
			 <form action="boleto/boleto_bb.php" method="post" target="_blank">
			   <input type="submit" name="button" id="button" class="botao_trabalho" value="Gerar boleto" />
				 <input name="valor_boleto" type="hidden" value="<?=$valor_boleto;?>" />
				 <input name="id_evento" type="hidden" value="<?=$id_evento;?>" />
				 <input name="id_participante" type="hidden" value="<?=$id_participante;?>" />             
			 </form>
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
