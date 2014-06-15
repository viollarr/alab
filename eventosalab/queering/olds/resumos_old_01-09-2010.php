<?php
	require_once("conexao.php");
	require_once("check_user.php");
	
	if ($_POST["insert"] == "true"){

		$id_evento=(int)$_SESSION['id_evento'];
		$id_sessao_trabalho=(int)$_POST['id_sessao_trabalho'];
		$linha_tematica=(int)$_POST['id_linha_tematica'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho']; // 1-simposio 2-coordenada
		$titulo= addslashes(trim($_POST['titulo']));
		$autor=addslashes(trim($_POST['autor']));
		$coautor=addslashes(trim($_POST['coautor']));
		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));
		
		$email_participante= trim($_POST['email_participante']);
		
		if ($email_participante==""){
			$error[]="Infome o e-mail do participante"; 
		}else if (!eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email_participante)) {
			$error[]="O e-mail informado não é válido"; 
		}
		//verifica se o email informado está cadastrado no site e se é associado alab.
		$sql_email = "SELECT id,email,id_formacao,id_associado_alab FROM ev_participante WHERE email='$email_participante'";
		$resultado_email = mysql_query($sql_email);
		$mostrar_participante = mysql_fetch_assoc($resultado_email);
		$id_participante_trabalho=$mostrar_participante['id'];
		$id_formacao=$mostrar_participante['id_formacao'];
		$id_associado_alab=$mostrar_participante['id_associado_alab'];
		$email_ja_cadastrado=mysql_affected_rows();
		if ($email_ja_cadastrado<=0){
			$error[]="O e-mail informado não está cadastrado para esse evento.";
		}
		if (($id_associado_alab=="") or ($id_associado_alab==0)){$error[]="Para enviar um resumo o participante deve estar associado à ALAB"; }
		if ($titulo==""){$error[]="Infome o título"; }
		if ($autor==""){$error[]="Infome o autor"; }
		if ($resumo==""){$error[]="Digite o resumo"; }
		if ($palavras==""){$error[]="Infome as palavras-chave"; }			

		if ($id_trabalho==1){ //simposio (só para doutor ou doutorando)
			if (($id_formacao!=1) and ($id_formacao!=3)){$error[]="".$id_formacao."O simpósio é restrito a doutores e doutorandos"; }		
			if(sizeof($error)==0){
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,id_apresentador,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
						   values('$id_evento','0','$id_trabalho','0','$id_sessao_trabalho','$id_participante_trabalho','$titulo','$resumo','$palavras','$autor','$coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();
			}
		}
		if ($id_trabalho==2){ //coordenada (só para mestre, mestrando, doutor e doutorando)
			if (($id_formacao!=1) and ($id_formacao!=2) and ($id_formacao!=3) and ($id_formacao!=4)){$error[]="A comunicação coordenada é restrita a doutores, doutorandos, mestres e mestrando"; }
			if(sizeof($error)==0){
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,id_apresentador,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
						   values('$id_evento','$linha_tematica','$id_trabalho','$id_sessao_trabalho','0','$id_participante_trabalho','$titulo','$resumo','$palavras','$autor','$coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();
			}
		
		}
	}//if insert
	
	
	//$id_participante=$_SESSION['id_participante'];
	//$id_evento=$_SESSION['id_evento'];	
	
	//RESUMOS ASSOCIADOS
	/*
	$sql_resumos = "SELECT ev_tipo_trabalho.nome AS tipodetrabalho, ev_linha_tematica.titulo AS nomelinhatematica, ev_resumo.titulo AS tituloresumo, ev_resumo.autor, ev_resumo.co_autor, ev_resumo.resumo, ev_resumo.palavras_chave  
					FROM ev_resumo 
					INNER JOIN ev_tipo_trabalho	ON ev_resumo.id_tipo_trabalho = ev_tipo_trabalho.id 
					INNER JOIN ev_linha_tematica ON ev_resumo.id_linha_tematica = ev_linha_tematica.id 
				    WHERE id_apresentador='".$_SESSION['id_participante']."' AND ev_resumo.id_evento='".$_SESSION['id_evento']."'";
	$resumos = mysql_query($sql_resumos, $conexao) or die(mysql_error());
	*/
	//RESUMOS soltos
	$sql_resumos = "SELECT ev_tipo_trabalho.nome AS tipodetrabalho, ev_resumo.titulo AS tituloresumo, ev_resumo.id_linha_tematica, ev_resumo.id_simposio, ev_resumo.id_comunicacao_coordenada, ev_resumo.autor, ev_resumo.co_autor, ev_resumo.resumo, ev_resumo.palavras_chave   
					FROM ev_resumo 
					INNER JOIN ev_tipo_trabalho	ON ev_resumo.id_tipo_trabalho = ev_tipo_trabalho.id 
				    WHERE id_apresentador='".$_SESSION['id_participante']."' AND ev_resumo.id_evento='".$_SESSION['id_evento']."'";
	$resumos = mysql_query($sql_resumos, $conexao) or die(mysql_error());
	
	$sql_coordenada = "SELECT ev_comunicacao_coordenada.id AS idcoordenada,ev_comunicacao_coordenada.id_linha_tematica,ev_comunicacao_coordenada.titulo_sessao,ev_comunicacao_coordenada.resumo_sessao,ev_comunicacao_coordenada.palavras_chave_sessao,
					   ev_linha_tematica.titulo 
					   FROM ev_comunicacao_coordenada 
					   INNER JOIN ev_linha_tematica ON ev_comunicacao_coordenada.id_linha_tematica = ev_linha_tematica.id 
					   WHERE id_coordenador='".$_SESSION['id_participante']."' AND ev_comunicacao_coordenada.id_evento='".$_SESSION['id_evento']."'";
	$coordenada = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
	$existe_coordenada = mysql_num_rows($coordenada);
					
	$sql_simposio = "SELECT ev_simposio.id AS idsimposio,ev_simposio.id_topico,ev_simposio.titulo_sessao,ev_simposio.resumo_sessao,ev_simposio.palavras_chave_sessao,ev_simposio.debatedor,
					ev_topico_simposio.nome
					FROM ev_simposio 
					INNER JOIN ev_simposio_coordenador ON ev_simposio.id = ev_simposio_coordenador.id_simposio 
					INNER JOIN  ev_topico_simposio ON ev_simposio.id_topico =  ev_topico_simposio.id 
				    WHERE ev_simposio_coordenador.id_participante='".$_SESSION['id_participante']."' AND ev_simposio.id_evento='".$_SESSION['id_evento']."'";
	$simposio = mysql_query($sql_simposio, $conexao) or die(mysql_error());
	$existe_simposio = mysql_num_rows($simposio);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

<script type="text/javascript">

	
	function mostra_div(id) {
    //tem que tratar browsers diferentemente
	  if (document.getElementById) { // DOM3 = IE5, NS6
			document.getElementById(id).style.display = 'block';
	  }
	  else {
			if (document.layers) { // Netscape 4
			  document.id.display = 'block';
			}
			else { // IE 4
			  document.all.id.style.display = 'block';
			}
	  }
	}
	function esconde_div(id) {
	  //tem que tratar browsers diferentemente
	  if (document.getElementById) { // DOM3 = IE5, NS6
			document.getElementById(id).style.display = 'none';
	  }
	  else {
			if (document.layers) { // Netscape 4
			  document.id.display = 'none';
			}
			else { // IE 4
			  document.all.id.style.display = 'none';
			}
	  }
	 } 
		
		
	function counterUpdate(opt_countedTextBox, opt_countBody, opt_maxSize) {
        var countedTextBox = opt_countedTextBox ?
                opt_countedTextBox : "countedTextBox";
        var countBody = opt_countBody ? opt_countBody : "countBody";
        var maxSize = opt_maxSize ? opt_maxSize : 1024;
    
        var field = document.getElementById(countedTextBox);
        if (field && field.value.length >= maxSize) {
            field.value = field.value.substring(0, maxSize);
        }
        var txtField = document.getElementById(countBody);
        if (txtField) {  
            txtField.innerHTML = field.value.length;
        }
    }	
</script>
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner_final_pequeno.jpg" width="990" height="215" />        
        </div>

        <div style="margin-left:30px;">
        	<span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impressão de boleto</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="cartaaceite.php">CartA de aceite</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participação</a></span>
		</div>
        <p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Resumos enviados</span>
        <p>&nbsp;</p> 
		 <?php if ($existe_simposio>0){
       			while($mostrar_simposio= mysql_fetch_array($simposio)){
				$id_sessao=$mostrar_simposio['idsimposio'];
				$id_linha_tematica=0;
				$id_trabalho=1; // 1 = simposio;
				
 			   //sql conta quantos resumos tem cadastrados para esta sessao
  			    $sql_resumos_inseridos_s= "SELECT * FROM ev_resumo 
										   WHERE id_evento='".$_SESSION['id_evento']."' 
										   AND id_simposio='$id_sessao'";
				$resumos_inseridos_s = mysql_query($sql_resumos_inseridos_s, $conexao) or die(mysql_error());
				$num_resumos_inseridos_s = mysql_num_rows($resumos_inseridos_s);

 /* 			    $sql_resumos_inseridos_s= "SELECT r.id,r.titulo,r.autor,r.co_autor,r.resumo,r.palavras_chave,
										   FROM ev_resumo r, ev_simposio s
										   WHERE r.id_evento='".$_SESSION['id_evento']."' 
										   AND r.id_simposio='$id_sessao'";
				$resumos_inseridos_s = mysql_query($sql_resumos_inseridos_s, $conexao) or die(mysql_error());
				$num_resumos_inseridos_s = mysql_num_rows($resumos_inseridos_s);
*/				
				?>
         <p class="destaque"><?php print $mostrar_simposio['titulo_sessao'];?> <span class="txt_categorias"><strong> (Simpósio)</strong></span></p>

  		 <?php if ($num_resumos_inseridos_s >= 5){?>
         <span class="menuinterno"><u>Já foram envados o máximo de <b><?php print $num_resumos_inseridos_s;?></b> resumos permitidos para esta sessão</u></span>
         <?php }else{?>
         <span class="menuinterno"><span onClick="mostra_div('resumo_simposio');" style="cursor:pointer"><u>Inserir resumo para esta sessão de simpósio</u></span></span> <span class="txt">[Número de resumos enviados: <?php print $num_resumos_inseridos_s;?>]</span>         
         <?php }?>
      

        <?php
        if( ($registro_inserido>0) and ($_POST['id_trabalho']==1) ){
		   /*print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   print "Seu trabalho foi enviado com sucesso.<br />";
		   print "</div> <br />";*/
		 ?>  
		 <script>
		 alert("O resumo foi enviado com sucesso.");
		 window.top.location.href='resumos.php';
		 </script>
		 <?php }	?>

                <div id="resumo_simposio" <?  if((sizeof($error)!= 0) and ($_POST['id_trabalho']==1)) {print print 'style="display: block; width:560px; background-color:#EAEAEA; border: 1px solid #C9C9C9; padding: 10px 0 10px 16px; margin-top:10px;"';}else{print 'style="display: none; width:560px; background-color:#EAEAEA; border: 1px solid #C9C9C9; padding: 10px 0 10px 16px; margin-top:10px;"';}?> >
				   <p>                   
                   <span class="link_fechar_box" style="cursor:pointer;" onClick="esconde_div('resumo_simposio');">[Fechar]</span>
				   </p>	
                   <form id="form_trabalho" name="form_trabalho" method="post" action="resumos.php">
                     <?php include('formulario_resumo_participante.php'); ?>
                   </form>                    

                </div>
                <p>
                <table width="550" border="0" style="margin-left:50px;">
                  <tr>
                    <td width="137"><span class="txt_topico_tabela"><strong>Tópico do simpósio:</strong></span></td>
                    <td width="403"><span class="txt_resposta"><?php print $mostrar_simposio['nome'];?></span></td>
                  </tr>
                  <tr>
                    <td width="137"><span class="txt_topico_tabela"><strong>Resumo da sessão:</strong></span></td>
                    <td width="403"><span class="txt_resposta"><?php print nl2br($mostrar_simposio['resumo_sessao']);?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar_simposio['palavras_chave_sessao'];?></span></td>
                  </tr>
         </table>
		 </p>
         <?php
         	//exibe os resumos da sessao x
			if ($num_resumos_inseridos_s > 0){
	        print '<div id="box_resumos_associados">';
			 	while($mostrar_resumos_simposio= mysql_fetch_array($resumos_inseridos_s)){         
			?>
            		 <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Título:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_simposio['titulo'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Autor:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_simposio['autor'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Co-autor:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_simposio['co_autor'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Resumo:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print nl2br($mostrar_resumos_simposio['resumo']);?></span></td>
                      </tr>                  
                      <tr>
                        <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                        <td><span class="txt_resposta"><?php print $mostrar_resumos_simposio['palavras_chave'];?></span></td>
                      </tr>
                    </table>
                    <br />
					

			<?
				}
            print '</div>';
            }
		 ?>         
         <p>&nbsp;</p>
       <?php 
	   		}
	   } ?>

       <?php if ($existe_coordenada>0){
       			while($mostrar_coordenada= mysql_fetch_array($coordenada)){
				$id_sessao=$mostrar_coordenada['idcoordenada'];	
				$id_linha_tematica=$mostrar_coordenada['id_linha_tematica'];			
				$id_trabalho=2; // 2 = coordenada;
				
				//sql conta quantos resumos tem cadastrados para esta sessao
  			   /* 
			    $sql_resumos_inseridos_c= "SELECT * FROM ev_resumo WHERE id_evento='".$_SESSION['id_evento']."' AND id_comunicacao_coordenada='$id_sessao'";
				$resumos_inseridos_c = mysql_query($sql_resumos_inseridos_c, $conexao) or die(mysql_error());
				$num_resumos_inseridos_c = mysql_num_rows($resumos_inseridos_c);
			   */

				$sql_resumos_inseridos_c= "SELECT * 
										   FROM ev_resumo 
										   WHERE id_evento='".$_SESSION['id_evento']."' AND id_comunicacao_coordenada='$id_sessao'";
				$resumos_inseridos_c = mysql_query($sql_resumos_inseridos_c, $conexao) or die(mysql_error());
				$num_resumos_inseridos_c = mysql_num_rows($resumos_inseridos_c);
			   
				?>
         <p class="destaque"><?php print $mostrar_coordenada['titulo_sessao'];?> <span class="txt_categorias"><strong> (Comunicação Coordenada)</strong></span></p>
		 <?php if ($num_resumos_inseridos_c >= 6){?>
         <span class="menuinterno"><u>Já foram envados o máximo de <b><?php print $num_resumos_inseridos_c;?></b> resumos permitidos para esta sessão</u></span>
         <?php }else{?>
         <span class="menuinterno"><span onClick="mostra_div('resumo_coordenada');" style="cursor:pointer"><u>Inserir resumo para esta sessão de comunicação coordenada</u></span></span> <span class="txt">[Número de resumos enviados: <?php print $num_resumos_inseridos_c;?>]</span>
         <?php }?>

        <?php
        if( ($registro_inserido>0) and ($_POST['id_trabalho']==2) ){
		  /* print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   print "Seu trabalho foi enviado com sucesso.<br />";
		   print "</div> <br />";*/
		 ?>  
		 <script>
		 alert("O resumo foi enviado com sucesso.");
		 window.top.location.href='resumos.php';
		</script>
		<?php }	?>
             <div id="resumo_coordenada" <?  if((sizeof($error)!= 0) and ($_POST['id_trabalho']==2)) {print print 'style="display: block; width:560px; background-color:#EAEAEA; border: 1px solid #C9C9C9; padding: 10px 0 10px 16px; margin-top:10px;"';}else{print 'style="display: none; width:560px; background-color:#EAEAEA; border: 1px solid #C9C9C9; padding: 10px 0 10px 16px; margin-top:10px;"';}?> >
				   <p>
                   <span class="link_fechar_box" style="cursor:pointer;" onClick="esconde_div('resumo_coordenada');" >[Fechar]</span>
                   </p>
                   <form id="form_trabalho" name="form_trabalho" method="post" action="resumos.php">
                     <?php include('formulario_resumo_participante.php'); ?>
                   </form>                    
                    
         </div>
                <p>
<table width="600" border="0" style=" margin-left:50px;">
                  <tr>
                    <td width="131"><span class="txt_topico_tabela"><strong>Linha temática:</strong></span></td>
                    <td width="459"><span class="txt_resposta"><?php print $mostrar_coordenada['titulo'];?></span></td>
                  </tr>
<tr>
                    <td width="131"><span class="txt_topico_tabela"><strong>Resumo da sessão:</strong></span></td>
                    <td width="459"><span class="txt_resposta"><?php print nl2br($mostrar_coordenada['resumo_sessao']);?></span></td>
          </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar_coordenada['palavras_chave_sessao'];?></span></td>
                  </tr>
         </table>
		 </p>
         
                  <?php
         	//exibe os resumos da sessao x
			if ($num_resumos_inseridos_c > 0){
	        print '<div id="box_resumos_associados">';
			 	while($mostrar_resumos_coordenada= mysql_fetch_array($resumos_inseridos_c)){         
			?>
            		 <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Título:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_coordenada['titulo'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Autor:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_coordenada['autor'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Co-autor:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print $mostrar_resumos_coordenada['co_autor'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137"><span class="txt_topico_tabela"><strong>Resumo:</strong></span></td>
                        <td width="403"><span class="txt_resposta"><?php print nl2br($mostrar_resumos_coordenada['resumo']);?></span></td>
                      </tr>                  
                      <tr>
                        <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                        <td><span class="txt_resposta"><?php print $mostrar_resumos_coordenada['palavras_chave'];?></span></td>
                      </tr>
                    </table>
                    <br />
					

			<?
				}
            print '</div>';
            }
		 ?>         

         
         <p>&nbsp;</p>
       <?php 
	   		}
	   } ?>
	  <?php while($mostrar= mysql_fetch_array($resumos)){ 
				if (($mostrar['id_comunicacao_coordenada']==0) and ($mostrar['id_simposio']==0)){
			
				$sql= "SELECT * FROM ev_linha_tematica WHERE id='".$mostrar['id_linha_tematica']."'";
				$qr= mysql_query($sql, $conexao) or die(mysql_error());
				$ln=mysql_fetch_array($qr);
				
				
	   ?>
	      	    <p class="destaque"><?php print $mostrar['tituloresumo'];?> <span class="txt_categorias"><strong> (<?php print $mostrar['tipodetrabalho'];?>)</strong></span></p>
                <p>
                <table width="550" border="0" style="margin-left:50px;">
                  
                  <tr>
                    <td width="112"><span class="txt_topico_tabela"><strong>Linha temática:</strong></span></td>
                    <td width="428"><span class="txt_resposta"><?php print $ln['titulo'];?></span></td>
                  </tr>
                  
                  <tr>
                    <td width="112"><span class="txt_topico_tabela"><strong>Autor:</strong></span></td>
                    <td width="428"><span class="txt_resposta"><?php print $mostrar['autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Co-autor:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['co_autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Resumo:</strong></span></td>
                    <td><span class="txt_resposta"><?php print nl2br($mostrar['resumo']);?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['palavras_chave'];?></span></td>
                  </tr>
         </table>
		 </p>
         <p>&nbsp;</p>
         <?php 
	   		}
			if (($mostrar['id_comunicacao_coordenada']==0) and ($mostrar['id_simposio']!=0)){ // RESUMO PARTICIPANTE DE SIMPOSIO

				$sql= "SELECT * FROM ev_simposio 
					   INNER JOIN ev_topico_simposio ON ev_simposio.id_topico = ev_topico_simposio.id
					   WHERE ev_simposio.id='".$mostrar['id_simposio']."'";
				$qr= mysql_query($sql, $conexao) or die(mysql_error());
				$ln=mysql_fetch_array($qr); 	
			
		 ?>
	      	    <p class="destaque"><?php print $mostrar['tituloresumo'];?> <span class="txt_categorias"><strong> (<?php print $mostrar['tipodetrabalho'];?>)</strong></span></p>
                <p>
                <table width="550" border="0" style="margin-left:50px;">
                  
                  <tr>
                    <td width="164"><span class="txt_topico_tabela"><strong>Tópico do simpósio:</strong></span></td>
                    <td width="376"><span class="txt_resposta"><?php print $ln['nome'];?></span></td>
                  </tr>
                  <tr>
                    <td width="164"><span class="txt_topico_tabela"><strong>Título da sessão:</strong></span></td>
                    <td width="376"><span class="txt_resposta"><?php print $ln['titulo_sessao'];?></span></td>
                  </tr>

                  <tr>
                    <td width="164"><span class="txt_topico_tabela"><strong>Debatedor da sessão:</strong></span></td>
                    <td width="376"><span class="txt_resposta"><?php print $ln['debatedor'];?></span></td>
                  </tr>                  
                  <tr>
                    <td width="164"><span class="txt_topico_tabela"><strong>Autor:</strong></span></td>
                    <td width="376"><span class="txt_resposta"><?php print $mostrar['autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Co-autor:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['co_autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Resumo:</strong></span></td>
                    <td><span class="txt_resposta"><?php print nl2br($mostrar['resumo']);?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['palavras_chave'];?></span></td>
                  </tr>
         </table>
		 </p>
         <p>&nbsp;</p> 
         <?php 
	   		}
			if (($mostrar['id_comunicacao_coordenada']!=0) and ($mostrar['id_simposio']==0)){ // RESUMO PARTICIPANTE DE COORDENADA

			$sql= "SELECT * FROM ev_linha_tematica WHERE id='".$mostrar['id_linha_tematica']."'";
			$qr= mysql_query($sql, $conexao) or die(mysql_error());
			$ln=mysql_fetch_array($qr);
			
			$sql_cc= "SELECT id_coordenador FROM ev_comunicacao_coordenada WHERE id='".$mostrar['id_comunicacao_coordenada']."'";
			$qr_cc= mysql_query($sql_cc, $conexao) or die(mysql_error());
			$ln_cc=mysql_fetch_array($qr_cc); 		 

			$sql_p= "SELECT nome FROM ev_participante WHERE id='".$ln_cc['id_coordenador']."'";
			$qr_p= mysql_query($sql_p, $conexao) or die(mysql_error());
			$ln_p=mysql_fetch_array($qr_p); 		 			
 		 
		 
		 ?>
	      	    <p class="destaque"><?php print $mostrar_partic['tituloresumo'];?> <span class="txt_categorias"><strong> (<?php print $mostrar_partic['tipodetrabalho'];?>)</strong></span></p>
                <p>
                <table width="550" border="0" style="margin-left:50px;">
                  
                  <tr>
                    <td width="163"><span class="txt_topico_tabela"><strong>Linha temática:</strong></span></td>
                    <td width="377"><span class="txt_resposta"><?php print $ln['titulo'];?></span></td>
                  </tr>
                  <tr>
                    <td width="163"><span class="txt_topico_tabela"><strong>Coordenador da sessão:</strong></span></td>
                    <td width="377"><span class="txt_resposta"><?php print $ln_p['nome'];?></span></td>
                  </tr>                  
                  <tr>
                    <td width="163"><span class="txt_topico_tabela"><strong>Autor:</strong></span></td>
                    <td width="377"><span class="txt_resposta"><?php print $mostrar['autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Co-autor:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['co_autor'];?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Resumo:</strong></span></td>
                    <td><span class="txt_resposta"><?php print nl2br($mostrar['resumo']);?></span></td>
                  </tr>
                  <tr>
                    <td><span class="txt_topico_tabela"><strong>Palavras-chave:</strong></span></td>
                    <td><span class="txt_resposta"><?php print $mostrar['palavras_chave'];?></span></td>
                  </tr>
         </table>
		 </p>
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
