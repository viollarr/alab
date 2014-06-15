<?php
	require_once("conexao.php");
	require_once("check_user.php");

	$id_trabalho=(int)$_POST['id_trabalho'];
	$_SESSION['id_trabalho']=$id_trabalho;
	
	$sql_trabalhos = "SELECT id, nome, descricao
					  FROM ev_tipo_trabalho 
					  WHERE id = '".$_SESSION['id_trabalho']."'";
	$qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());	
	$mostrar=mysql_fetch_array($qr_trabalho);
	
	//linhas temáticas para comunicação coordenada, individual e poster
	$sql_temas = "SELECT t.id, t.titulo
				  FROM ev_linha_tematica t
				  WHERE t.id_evento = '".$_SESSION['id_evento']."'";
	$qr_tema= mysql_query($sql_temas, $conexao) or die(mysql_error());
	
	//topicos de simpósio
	$sql_topico_simposio = "SELECT t.id, t.nome
				  FROM ev_evento_topico_simposio ev_t, ev_topico_simposio t
				  WHERE ev_t.id_evento = '".$_SESSION['id_evento']."'  
				  AND t.id = ev_t.id_topico_simposio";
	$qr_topico_simposio= mysql_query($sql_topico_simposio, $conexao) or die(mysql_error());
	

	if ($_POST["insert"] == "true"){
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho'];
		$titulo= addslashes(trim($_POST['titulo']));
		// atributos únicos de individual e poster
		$linha_tematica=$_POST['linha_tematica'];
		$topico=$_POST['topico_simposio'];
		$autor=addslashes(trim($_POST['autor']));
		$coautor=addslashes(trim($_POST['coautor']));
		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));
		// atributos únicos do simposio e coordenada
		$titulo_sessao=addslashes(trim($_POST['titulo_sessao']));
		$resumo_sessao=addslashes(trim($_POST['resumo_sessao']));
		$palavras_sessao=addslashes(trim($_POST['palavras_sessao']));
		$debatedor=addslashes(trim($_POST['debatedor']));

		if ($id_trabalho==1){
			//print "simposio";
			// TRATA OS ERROS NOS FORMULÁRIOS
			if (($topico=="") or ($topico==0)){$error[]="Selecione o tópico desejado"; }
			if ($debatedor==""){$error[]="Infome o debatedor"; }
			if ($titulo_sessao==""){$error[]="Infome o título da sessão"; }
			if ($resumo_sessao==""){$error[]="Infome o resumo da sessão"; }
			if ($palavras_sessao==""){$error[]="Informe as palavras-chave da sessão"; }
			if(sizeof($error)==0){
				$sql_insert_simposio = "insert into ev_simposio(id_evento,id_topico,titulo_sessao,resumo_sessao,palavras_chave_sessao,debatedor,confirmado)
					       values('$id_evento','$topico','$titulo_sessao','$resumo_sessao','$palavras_sessao','$debatedor','nao');";	
				mysql_query($sql_insert_simposio, $conexao);
				$new_id_inserido_simposio = mysql_insert_id();		   
				$sql_insert_associativa_simposio_coordenador = "insert into ev_simposio_coordenador(id_simposio,id_participante)
					                                            values('$new_id_inserido_simposio','$id_participante');";	
				mysql_query($sql_insert_associativa_simposio_coordenador, $conexao);		   
				$registro_inserido=mysql_affected_rows();
			}

		}
		if ($id_trabalho==2){
			//print "coordenada";
			// TRATA OS ERROS NOS FORMULÁRIOS
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			if ($titulo_sessao==""){$error[]="Infome o título da sessão"; }
			if ($resumo_sessao==""){$error[]="Infome o resumo da sessão"; }
			if ($palavras_sessao==""){$error[]="Informe as palavras-chave da sessão"; }
			if(sizeof($error)==0){
				$sql_insert = "insert into ev_comunicacao_coordenada(id_evento,id_coordenador,titulo_sessao,resumo_sessao,palavras_chave_sessao,id_linha_tematica, confirmado)
					       values('$id_evento','$id_participante','$titulo_sessao','$resumo_sessao','$palavras_sessao','$linha_tematica','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();

			}
	
		}
		if ($id_trabalho==3){
			//print "individual";
			// TRATA OS ERROS NOS FORMULÁRIOS		
			if ($titulo==""){$error[]="Infome o título"; }
			if ($autor==""){$error[]="Infome o autor"; }
			if ($resumo==""){$error[]="Digite o resumo"; }
			if ($palavras==""){$error[]="Infome as palavras-chave"; }			
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			if(sizeof($error)==0){
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,id_apresentador,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
					       values('$id_evento','$linha_tematica','$id_trabalho','0','0','$id_participante','$titulo','$resumo','$palavras','$autor','$coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();

			}
		}
		if ($id_trabalho==4){
			//print "poster";
			// TRATA OS ERROS NOS FORMULÁRIOS	
			if ($titulo==""){$error[]="Infome o título"; }
			if ($autor==""){$error[]="Infome o autor"; }
			if ($resumo==""){$error[]="Digite o resumo"; }
			if ($palavras==""){$error[]="Infome as palavras-chave"; }			
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			if(sizeof($error)==0){
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,id_apresentador,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
					       values('$id_evento','$linha_tematica','$id_trabalho','0','0','$id_participante','$titulo','$resumo','$palavras','$autor','$coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();
			}
		}


	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />


<script type="text/javascript">
<!--
function CountCharacters(){
    document.form_trabalho.CharacterCount.value=document.form_trabalho.resumo.value.length;
	//Conta caracteres
    wordcounter=0;
    for (x=0;x<document.form_trabalho.resumo.value.length;x++) {
        if (document.form_trabalho.resumo.value.charAt(x) == " " && document.form_trabalho.resumo.value.charAt(x-1) != " ")  {
            if (wordcounter < 10)
				wordcounter++
        }  // Counts the spaces while ignoring double spaces, usually one in between each word.
        document.form_trabalho.WordCount.value=wordcounter+1;
        WordCount.innerHTML = document.form_trabalho.WordCount.value=wordcounter+1;
    }
    return false;   
}
-->

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
		<div id="box_trabalhos">
	    <p class="txt_categorias"><strong>Envio de trabalho</strong></p>
       <p class="txt_titulo_destaque"><?=$mostrar['nome']; ?></p>
       <p class="txt_titulo_noticias_2"><?=$mostrar['descricao']; ?></p>
       <p class="txt_titulo_noticias_2">Entre abaixo com os dados referentes ao seu trabalho.</p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		
		if($registro_inserido>0){
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   print "Seu trabalho foi enviado com sucesso.<br />";
		   print "</div> <br />";
		?>
		 <!--<script>
		 //alert("Seu trabalho foi enviado com sucesso.");
		 //window.top.location.href='trabalho.php';
		 </script>-->
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
       <form id="form_trabalho" name="form_trabalho" method="post" action="trabalho.php">
         <?php 
		 switch($id_trabalho){
		 	case 1: //simposio
	        	include('formulario_simposio.php');	        	
        		break;
		 	case 2: //coordenada 
	        	include('formulario_coordenada.php');
        		break;
		 	case 3: //individual
	        	include('formulario_individual.php');
        		break;
		 	case 4: //poster
	        	include('formulario_poster.php');
        		break;
		 }
		 
		 ?>
       </form>
       <p>&nbsp;</p>
       <p>&nbsp;</p>       
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
            <div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Links interessantes</h2></div>
            	<ul>
                	<li><a href="#">Documento oficial</a></li>
                	<li><a href="#">Normas a serem seguidas</a></li>
                	<li><a href="#">Site da ALAB</a></li>                                                            
                </ul>
            </div>
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
