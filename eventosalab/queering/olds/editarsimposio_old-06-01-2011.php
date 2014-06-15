<?php
	require_once("conexao.php");
	require_once("check_user.php");

	if ($_POST["update"] == "true"){
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho'];
		$id_topico=(int)$_POST['id_topico'];		
		
		$sql_topico_simposio_esp = "SELECT t.id, t.nome
			  FROM ev_topico_simposio t
				  WHERE t.id = '".$id_topico."'";
		$qr_topico_simposio_esp= mysql_query($sql_topico_simposio_esp, $conexao) or die(mysql_error());
		$ln_topico_esp=mysql_fetch_array($qr_topico_simposio_esp);
		$nome_topico=$ln_topico_esp['nome'];

		$idsimposio=(int)$_POST['idsimposio'];		
		$id_topico=(int)$_POST['id_topico'];
		$debatedor=addslashes(trim($_POST['debatedor']));
		$titulo_sessao=addslashes(trim($_POST['titulo_sessao']));
		$resumo_sessao=addslashes(trim($_POST['resumo_sessao']));
		$palavras_sessao=addslashes(trim($_POST['palavras_sessao']));


		if (($id_topico=="") or ($id_topico==0)){$error[]="Selecione o tópico"; }
		if ($debatedor==""){$error[]="Infome o debatedor"; }
		if ($titulo_sessao==""){$error[]="Infome o título da sessão"; }
		if ($resumo_sessao==""){$error[]="Infome o resumo da sessão"; }
		if ($palavras_sessao==""){$error[]="Informe as palavras-chave da sessão"; }

			if(sizeof($error)==0){
				$sql_update = "UPDATE ev_simposio SET
							   id_topico = '$id_topico',
							   titulo_sessao = '$titulo_sessao',
							   resumo_sessao = '$resumo_sessao',
							   palavras_chave_sessao = '$palavras_sessao',
							   debatedor = '$debatedor'
					           WHERE id='$idsimposio'";	
				mysql_query($sql_update, $conexao);
				
				//insere os trabalhos(resumos)
				$array_trabalhos = array();
				$array_trabalhos = $_POST["id_resumo"];
				
				$qtde_trab = count($array_trabalhos);
				
				for($i=0; $i<$qtde_trab; $i++){		

					if (!empty($array_trabalhos[$i])){
						$id_resumo=addslashes($_POST['id_resumo'][$i]);
						$titulo=addslashes($_POST['titulo'][$i]);
						$resumo=addslashes($_POST['resumo'][$i]);
						$palavras=addslashes($_POST['palavras'][$i]);			
						
						$sql_update_trabalho = "UPDATE ev_resumo SET
									   titulo = '$titulo',
									   resumo = '$resumo',
									   palavras_chave = '$palavras'
									   WHERE id='$id_resumo'";
						mysql_query($sql_update_trabalho, $conexao);

					}//array 	
				}//for
		}//size error
	}// update
	
	$id_simposio=(int)$_POST['id_simposio'];	
	
	$sql_simposio = "SELECT s.id AS idsimposio, s.id_topico, s.titulo_sessao, s.resumo_sessao, s.palavras_chave_sessao, s.debatedor
					 FROM  ev_simposio s, ev_participante p, ev_simposio_coordenador sc
					 WHERE s.id = '$id_simposio' AND
					 p.id = '".$_SESSION['id_participante']."' AND
					 p.id = sc.id_participante AND
					 s.id = sc.id_simposio";
	$simposios = mysql_query($sql_simposio, $conexao) or die(mysql_error());
	$ln=mysql_fetch_array($simposios);

	/*$sql_topico_simposio = "SELECT t.id, t.nome
				  FROM ev_evento_topico_simposio ev_t, ev_topico_simposio t
				  WHERE ev_t.id_evento = '".$_SESSION['id_evento']."'  
				  AND t.id = ev_t.id_topico_simposio";
	$qr_topico_simposio= mysql_query($sql_topico_simposio, $conexao) or die(mysql_error());*/
	
	$sql_topico_simposio_esp = "SELECT t.id, t.nome
				  FROM ev_topico_simposio t
				  WHERE t.id = '".$ln['id_topico']."'";
	$qr_topico_simposio_esp= mysql_query($sql_topico_simposio_esp, $conexao) or die(mysql_error());
	$ln_topico_esp=mysql_fetch_array($qr_topico_simposio_esp);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />


<script language="javascript">
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
	    <p class="txt_categorias"><strong>EDI&Ccedil;&Atilde;O de trabalho</strong></p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		
		if (($_POST["update"] == "true") and (sizeof($error)==0)){
		   //print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   //print "Seu trabalho foi enviado com sucesso.<br />";
		   //print "</div> <br />";
		?>
		 <script>
		 alert("Seu trabalho foi atualizado com sucesso.");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="editarsimposio.php">
          <table width="600" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="txt_topico_tabela"><strong>T&oacute;pico do simp&oacute;sio<span class="dados_obrigatorios">*</span></strong></td>
              <td><select name="id_topico" class="formulario" id="id_topico">
                 <?php if(sizeof($error)!= 0){ ?>
                  <option value="<?php print $id_topico; ?>" selected><?php print $nome_topico; ?></option>
                 <? }else{ ?>
	                <option value="<?php print $ln['id_topico']; ?>" selected><?php print $ln_topico_esp['nome']; ?></option>
                 <? } ?>
                </select>              
             </td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
               <td class="txt_topico_tabela"><strong>Debatedor<span class="dados_obrigatorios">*</span></strong></td>
               <td><input name="debatedor" type="text" class="formulario" id="debatedor" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($debatedor); }else{ print $ln['debatedor'];} ?>" /></td>
            </tr>            
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>            
            
            <tr>
              <td width="139" class="txt_topico_tabela"><strong>T&iacute;tulo da sess&atilde;o</strong><span class="dados_obrigatorios">*</span> </td>
              <td width="461"><input name="titulo_sessao" type="text" class="formulario" id="titulo_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($titulo_sessao); }else{ print $ln['titulo_sessao'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong>Resumo da sess&atilde;o<span class="dados_obrigatorios">*</span></strong></td>
              <td><b><span id="WordCount" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_topico_tabela">
                <textarea name="resumo_sessao" cols="65" rows="10" class="formulario" id="resumo_sessao" onkeyup="counterUpdate('resumo_sessao', 'WordCount', 2000);"><?php if(sizeof($error)!= 0){ print stripslashes($resumo_sessao); }else{ print $ln['resumo_sessao'];} ?></textarea>
              </span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
              <td><input name="palavras_sessao" type="text" class="formulario" id="palavras_sessao" size="66" maxlength="250" value="<?php if(sizeof($error)!= 0){ print stripslashes($palavras_sessao); }else{ print $ln['palavras_chave_sessao'];} ?>" /></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
            </tr>
            <tr>
              <td class="txt_topico_tabela">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">--------------------------------------------------------------------------------------------------<br /><br /></td>
            </tr>
            <tr>
              <td colspan="2">
			  <?php

			   //busca resumos
			   	$sql_resumo="SELECT * 
					  FROM ev_resumo 
					  WHERE id_simposio = '".$ln['idsimposio']."'";
				$qr_resumo=mysql_query($sql_resumo, $conexao);
				

			   $i=0;
			   while ($ln_resumo=mysql_fetch_array($qr_resumo)){
				   if ($ln_resumo['autor']!=0){
						$sql_autor="SELECT id,nome,email FROM ev_participante WHERE id='".$ln_resumo['autor']."'";
						$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
						$ln_autor=mysql_fetch_array($qr_autor);
					}
					//busca nome do cocautor de existir
					if ($ln_resumo['co_autor']!=0){
						$sql_coautor="SELECT id,nome,email FROM ev_participante WHERE id='".$ln_resumo['co_autor']."'";
						$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
						$ln_coautor=mysql_fetch_array($qr_coautor);
					}
			   ?>
            <table width="600" border="0">
                    <tr>
                      <td width="140" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
                      <td width="460">
                      <input name="id_resumo[]" type="hidden" id="id_resumo[]" value="<?=$ln_resumo['id'];?>" />
                      <input name="titulo[]" type="text" class="formulario" id="titulo[]" size="72" maxlength="250" value="<?=$ln_resumo['titulo'];?>" /></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
                      <td class="txt_resposta"><?php print $ln_autor['nome'].' ('.$ln_autor['email'].')'; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
                      <td class="txt_resposta"><?php if ($ln_resumo['co_autor']!=0){ print $ln_coautor['nome'].' ('.$ln_coautor['email'].')';} if ($ln_resumo['co_autor']==0){print '-';}?></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
                      <td><b><span id="WordCount<?=$i;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><textarea name="resumo[]" cols="71" rows="10" class="formulario" id="resumo<?=$i;?>" onkeyup="counterUpdate('resumo<?=$i;?>', 'WordCount<?=$i;?>', 2000);"><?=$ln_resumo['resumo'];?></textarea>                      </td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
                      <td><input name="palavras[]" type="text" class="formulario" id="palavras[]" size="72" maxlength="250" value="<?=$ln_resumo['palavras_chave'];?>" /></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  --------------------------------------------------------------------------------------------------
                  <?php
				$i++;
			}
			   	
		//      $max_num_trabalho=6;
		//	   if ($i < $max_num_trabalho){
		//	     $outros_campos= $max_num_trabalho-$i;
		//	   	 for ($j = 0; $j < $outros_campos; $i++) {
			?>
          <!--       <table width="600" border="0">
                    <tr>
                      <td width="140" class="txt_topico_tabela"><strong>T&iacute;tulo</strong><span class="dados_obrigatorios">*</span> </td>
                      <td width="460"><input name="titulo[]" type="text" class="formulario" id="titulo[]" size="72" maxlength="250" value="" /></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Autor<span class="dados_obrigatorios">*</span></strong></td>
                      <td><span class="txt_topico_tabela"><b>&nbsp;</b></span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Co-autor</strong></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Resumo<span class="dados_obrigatorios">*</span></strong></td>
                      <td><b><span id="WordCount<?=$i;?>" class="txt_desc_tabela">0</span></b><span class="txt_desc_tabela"> caracteres digitados- Obs: Entre 1000 e 2000 caracteres</span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><textarea name="resumo[]" cols="71" rows="10" class="formulario" id="resumo<?=$i;?>" onkeyup="counterUpdate('resumo<?=$i;?>', 'WordCount<?=$i;?>', 2000);"></textarea>                      </td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela"><strong>Palavras-chave<span class="dados_obrigatorios">*</span></strong></td>
                      <td><input name="palavras[]" type="text" class="formulario" id="palavras[]" size="72" maxlength="250" value="" /></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td><span class="txt_desc_tabela">3 palavras-chave separadas por ponto e v&iacute;rgula</span></td>
                    </tr>
                    <tr>
                      <td class="txt_topico_tabela">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                </table>
              -------------------------------------------------------------------------------------------------- 
              <br />
              <br />-->
			  <?php
				//$j++;
				//}
			//}
			?>              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="button" id="button" value="Atualizar trabalho" class="botao" />
                  <input name="update" type="hidden" id="insert" value="true" />
                  <input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>" />
                  <input name="id_trabalho" type="hidden" value="<?php print $id_trabalho;?>" />
                  <input name="idsimposio" type="hidden" value="<?php print $ln['idsimposio'];?>" />              </td>
            </tr>
          </table>
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
