<?php
	require_once("conexao.php");
	require_once("check_user.php");
	$data_hoje=date('Y-m-d');
	//$data_hoje="2011-02-01";

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
	//$ultima_chamada_trabalho = "2011-01-25"; // teste
	
	//RESUMOS DE COMUNICAÇÃO INDIVIDUAL E POSTER
	$sql_resumos = "SELECT r.id AS idresumo, tt.nome AS tipodetrabalho, r.titulo AS tituloresumo, r.id_linha_tematica, r.titulo, r.id_tipo_trabalho, r.id_simposio, r.id_comunicacao_coordenada, r.autor, r.co_autor, r.resumo, r.palavras_chave   
					FROM ev_resumo r, ev_tipo_trabalho tt
					WHERE  r.id_tipo_trabalho = tt.id AND
					(r.autor='".$_SESSION['id_participante']."' OR r.co_autor='".$_SESSION['id_participante']."') AND 
					r.id_evento='".$_SESSION['id_evento']."' AND
					(r.id_tipo_trabalho='3' OR r.id_tipo_trabalho='4')
					ORDER BY r.id ASC";
	$resumos = mysql_query($sql_resumos, $conexao) or die(mysql_error());
	
	//RESUMOS DE COMUNICAÇÃO INDIVIDUAL E POSTER em Simpósio ou Comunicação Coordenada
	$sql_resumos_sessao = "SELECT r.id AS idresumo, tt.nome AS tipodetrabalho, r.titulo AS tituloresumo, r.id_linha_tematica, r.titulo, r.id_tipo_trabalho, r.id_simposio, r.id_comunicacao_coordenada, r.autor, r.co_autor, r.resumo, r.palavras_chave   
					FROM ev_resumo r, ev_tipo_trabalho tt
					WHERE  r.id_tipo_trabalho = tt.id AND
					(r.autor='".$_SESSION['id_participante']."' OR r.co_autor='".$_SESSION['id_participante']."') AND 
					r.id_evento='".$_SESSION['id_evento']."' AND
					(r.id_tipo_trabalho='1' OR r.id_tipo_trabalho='2')
					ORDER BY r.id_tipo_trabalho ASC, r.id ASC";
	$resumos_sessao = mysql_query($sql_resumos_sessao, $conexao) or die(mysql_error());
	
	
	$sql_simposio = "SELECT s.id AS idsimposio, s.id_topico, s.titulo_sessao, s.resumo_sessao, s.palavras_chave_sessao, s.debatedor
					 FROM  ev_simposio s, ev_participante p, ev_simposio_coordenador sc
					 WHERE s.id_evento = '".$_SESSION['id_evento']."' AND
					 p.id = '".$_SESSION['id_participante']."' AND
					 p.id = sc.id_participante AND
					 s.id = sc.id_simposio
					 ORDER BY s.id ASC";
	$simposios = mysql_query($sql_simposio, $conexao) or die(mysql_error());
	$existe_simposio=mysql_num_rows($simposios);
	$exib_btn_edit_simp = true;
	if(empty($existe_simposio)){
		$sql_simposio = "SELECT s.id AS idsimposio, s.id_topico, s.titulo_sessao, s.resumo_sessao, s.palavras_chave_sessao, s.debatedor
						 FROM  ev_simposio s, ev_resumo r
						 WHERE 
						 	s.id_evento  = '".$_SESSION['id_evento']."' 
							AND (r.autor = '".$_SESSION['id_participante']."' OR r.co_autor = '".$_SESSION['id_participante']."')
							AND s.id     = r.id_simposio
						 ORDER BY s.id ASC";
		$simposios = mysql_query($sql_simposio, $conexao) or die(mysql_error());
		$existe_simposio=mysql_num_rows($simposios);
		/*
		print "<pre>Existe Simpósio: ";
			print_r($existe_simposio);
		print "</pre>";
		*/
		$exib_btn_edit_simp = false;
	}


	$sql_coordenada = "SELECT p.nome AS nomeparticipante, c.id AS idcoordenada, c.id_linha_tematica, c.titulo_sessao, c.resumo_sessao, c.palavras_chave_sessao
					 FROM ev_comunicacao_coordenada c, ev_participante p
					 WHERE c.id_evento = '".$_SESSION['id_evento']."' AND
					 c.id_coordenador = '".$_SESSION['id_participante']."' AND
					 c.id_coordenador = p.id
					 ORDER BY c.id ASC";
    $coordenadas = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
	$existe_coordenada=mysql_num_rows($coordenadas);
	$exib_btn_edit_comunic = true;
	if(empty($existe_coordenada)){
		/*
		$sql_coordenada = "SELECT p.nome AS nomeparticipante, c.id AS idcoordenada, c.id_linha_tematica, c.titulo_sessao, c.resumo_sessao, c.palavras_chave_sessao
						 FROM ev_comunicacao_coordenada c, ev_participante p, ev_resumo r
						 WHERE 
						 	c.id_evento  = '".$_SESSION['id_evento']."'
							AND (r.autor = '".$_SESSION['id_participante']."' OR r.co_autor = '".$_SESSION['id_participante']."')
							AND c.id     = r.id_comunicacao_coordenada
							AND r.id_tipo_trabalho = 2
						 ORDER BY c.id ASC";
		/*
		print "\$sql_coordenada: <pre>";
			print_r($sql_coordenada);
		print "</pre>";
		*/
		/*
		$sql_coordenada = "SELECT *
						 FROM ev_comunicacao_coordenada c, ev_resumo r
						 WHERE 
						 	c.id_evento  = '".$_SESSION['id_evento']."'
							AND (r.autor = '".$_SESSION['id_participante']."' OR r.co_autor = '".$_SESSION['id_participante']."')
							AND c.id     = r.id_comunicacao_coordenada
							AND r.id_tipo_trabalho = 2
						 ORDER BY c.id ASC";
		*/
		$sql_coordenada = "SELECT p.nome AS nomeparticipante, c.id AS idcoordenada, c.id_linha_tematica, c.titulo_sessao, c.resumo_sessao, c.palavras_chave_sessao
						 FROM ev_comunicacao_coordenada c, ev_resumo r, ev_participante p
						 WHERE 
						 	c.id_evento  = '".$_SESSION['id_evento']."'
							AND (r.autor = '".$_SESSION['id_participante']."' OR r.co_autor = '".$_SESSION['id_participante']."')
							AND c.id     = r.id_comunicacao_coordenada
							AND r.id_tipo_trabalho = 2
							AND p.id = '".$_SESSION['id_participante']."'
						 ORDER BY c.id ASC";
		$coordenadas = mysql_query($sql_coordenada, $conexao) or die(mysql_error());
		$existe_coordenada=mysql_num_rows($coordenadas);
		/*
		print "<pre>Existe Comunic Coord: ";
			print_r($existe_simposio);
		print "</pre>";
		*/
		$exib_btn_edit_comunic = false;
	}//if

	
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
/*
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
*/		
		
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
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Resumos enviados</span>
		<p>&nbsp;</p>
        <?php 
		if ($existe_simposio>0){
			while($m_simposios=mysql_fetch_array($simposios)){
				//busca nome do topico
				$sql_topico="SELECT nome FROM ev_topico_simposio WHERE id='".$m_simposios['id_topico']."'";
				$qr_topico=mysql_query($sql_topico, $conexao) or die(mysql_error());
				$ln_topico=mysql_fetch_array($qr_topico);

		?>	
					 <p class="txt_categorias"><b>Simpósio</b></p>
                     <div style="background:#F2FBFF; border:1px solid #AADBFF; padding:10px 10px 0 10px;">
                     <?php 
					 if ($exib_btn_edit_simp){
						 //if ($data_hoje <= $ultima_chamada_trabalho){ ?>
						 <form action="editarsimposio.php" method="post">
						 <input name="id_simposio" type="hidden" value="<?=$m_simposios['idsimposio']?>" />
						 <input name="" type="image" src="http://www.alab.org.br/eventosalab/images/edit_f2.png" />
						 </form>
						 <?php 
						 /*
						 } else{?>
							<p class="dados_obrigatorios">O prazo para edi&ccedil;&atilde;o de trabalho encerrou.</p>
						 <?php }//else
						 */
					 }//if ?>
                     <br />

                     <table width="550" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Tópico do simpósio:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_topico['nome'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Título da sessão:</strong></td>
                        <td width="403" class="txt_resposta" ><span style="text-transform:uppercase"><?php print $m_simposios['titulo_sessao'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Debatedor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $m_simposios['debatedor']; if ($m_simposios['debatedor']==''){print '-';}?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Resumo da sessão:</strong></td>
                        <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_simposios['resumo_sessao']);?></td>
                      </tr>                  
                      <tr>
                        <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                        <td class="txt_resposta"><?php print $m_simposios['palavras_chave_sessao'];?></td>
                      </tr>
                    </table>
					<br />
                    <?php
					//resumos associados ao simposio
					$sql_resumos_simposios="SELECT * FROM ev_resumo WHERE id_simposio='".$m_simposios['idsimposio']."'";
					$resumos_simposios=mysql_query($sql_resumos_simposios, $conexao) or die(mysql_error());
					$cont_trabalhos=1;
					while($m_resumos_simposios=mysql_fetch_array($resumos_simposios)){
						//busca nome do autor se existir
						$sql_autor = $qr_autor = $ln_autor = "";
						if ($m_resumos_simposios['autor']!=0){
							$sql_autor="SELECT nome FROM ev_participante WHERE id='".$m_resumos_simposios['autor']."'";
							$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
							$ln_autor=mysql_fetch_array($qr_autor);
						}
						//busca nome do cocautor de existir
						$sql_coautor = $qr_coautor = $ln_coautor = "";
						if ($m_resumos_simposios['co_autor']!=0){
							$sql_coautor="SELECT nome FROM ev_participante WHERE id='".$m_resumos_simposios['co_autor']."'";
							$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
							$ln_coautor=mysql_fetch_array($qr_coautor);
						}
						
					?>
                        <table width="550" border="0" cellpadding="0" cellspacing="0" style="margin-left:30px; table-layout:fixed;">
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Título:</strong></td>
                            <td width="403" class="txt_resposta" ><span style="text-transform:uppercase"><?php print $m_resumos_simposios['titulo'];?></span></td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Autor:</strong></td>
                            <td width="403" class="txt_resposta">
								<?php 
								print $ln_autor['nome'];
								if ($m_resumos_simposios['autor']==0){print '-';}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Co-autor:</strong></td>
                            <td width="403" class="txt_resposta">
								<?php 
								print $ln_coautor['nome'];
								if ($m_resumos_simposios['co_autor']==0){print '-';}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Resumo:</strong></td>
                            <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_resumos_simposios['resumo']);?></td>
                          </tr>                  
                          <tr>
                            <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                            <td class="txt_resposta"><?php print $m_resumos_simposios['palavras_chave'];?></td>
                          </tr>
                        </table>
                        <br />
        <?php
					//$cont_trabalhos++;		
					}//while resumos simposios
			print '</div>';		      			
			}//while simpósio
			//print '<p>&nbsp;</p>';
		}//if existe simposio
		?>
        <?php 
		if ($existe_coordenada>0){
			while($m_coordenada=mysql_fetch_array($coordenadas)){
				//busca nome da linha tematica
				$sql_tematica="SELECT titulo FROM ev_linha_tematica WHERE id='".$m_coordenada['id_linha_tematica']."'";
				$qr_tematica=mysql_query($sql_tematica, $conexao) or die(mysql_error());
				$ln_tematica=mysql_fetch_array($qr_tematica);
		?>	
                     <br />
                     <p class="txt_categorias"><b>Comunicação Coordenada</b></p>
                     <div style="background:#F2FBFF; border:1px solid #AADBFF; padding:10px 10px 0 10px;">
                     
                     <?php 
					 if ($exib_btn_edit_comunic){
						 if ($data_hoje <= $ultima_chamada_trabalho){ ?>
						 <form action="editarcoordenada.php" method="post">
						 <input name="id_coordenada" type="hidden" value="<?=$m_coordenada['idcoordenada'];?>" />
						 <input name="" type="image" src="http://www.alab.org.br/eventosalab/images/edit_f2.png" />
						 </form>
						 <?php } else{?>
							<p class="dados_obrigatorios">O prazo para edi&ccedil;&atilde;o de trabalho encerrou.</p>
						 <?php }//else
					 }//if
					 ?>
                     <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Linha temática:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_tematica['titulo'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Título da sessão:</strong></td>
                        <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $m_coordenada['titulo_sessao'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Coordenador:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $m_coordenada['nomeparticipante']; ?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Resumo da sessão:</strong></td>
                        <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_coordenada['resumo_sessao']);?></td>
                      </tr>                  
                      <tr>
                        <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                        <td class="txt_resposta"><?php print $m_coordenada['palavras_chave_sessao'];?></td>
                      </tr>
                    </table>
                    <br />
                    <?php 
					//resumos associados a coordenada					
					$sql_resumos_coordenadas="SELECT * FROM ev_resumo WHERE id_comunicacao_coordenada='".$m_coordenada['idcoordenada']."'";
					$resumos_coordenadas=mysql_query($sql_resumos_coordenadas, $conexao) or die(mysql_error());
					$cont_trabalhos=1;
					while($m_resumos_coordenadas=mysql_fetch_array($resumos_coordenadas)){
						//busca nome do autor se existir
						$sql_autor = $qr_autor = $ln_autor = "";
						if ($m_resumos_coordenadas['autor']!=0){
							$sql_autor="SELECT nome FROM ev_participante WHERE id='".$m_resumos_coordenadas['autor']."'";
							$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
							$ln_autor=mysql_fetch_array($qr_autor);
						}
						//busca nome do cocautor de existir
						$sql_coautor = $qr_coautor = $ln_coautor = "";
						if ($m_resumos_coordenadas['co_autor']!=0){
							$sql_coautor="SELECT nome FROM ev_participante WHERE id='".$m_resumos_coordenadas['co_autor']."'";
							$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
							$ln_coautor=mysql_fetch_array($qr_coautor);
						}
						
					?>
                      <table width="550" cellpadding="0" cellspacing="0" style="margin-left:30px; table-layout:fixed;">
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Título:</strong></td>
                            <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $m_resumos_coordenadas['titulo'];?></span></td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Autor:</strong></td>
                            <td width="403" class="txt_resposta">
								<?php 
								print $ln_autor['nome'];
								if ($m_resumos_coordenadas['autor']==0){print '-';}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Co-autor:</strong></td>
                            <td width="403" class="txt_resposta">
								<?php 
								print $ln_coautor['nome']; 
								if ($m_resumos_coordenadas['co_autor']==0){print '-';}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td width="137" class="txt_topico_tabela"><strong>Resumo:</strong></td>
                            <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_resumos_coordenadas['resumo']);?></td>
                          </tr>                  
                          <tr>
                            <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                            <td class="txt_resposta"><?php print $m_resumos_coordenadas['palavras_chave'];?></td>
                          </tr>
                       </table>
                        <br />
        <?php      	
					//$cont_trabalhos++;		
					}//while resumos coordenadas
			?>		
			</div>
			<? }//while coordenada
		}//if existe coordenada
		?>
        <?php 
		/*********************************************
		* Comunicações Individuais e Pôsteres *
		**********************************************/
		while($m_resumos=mysql_fetch_array($resumos)){ 
			//busca nome da linha tematica
			$sql_tematica="SELECT titulo FROM ev_linha_tematica WHERE id='".$m_resumos['id_linha_tematica']."'";
			$qr_tematica=mysql_query($sql_tematica, $conexao) or die(mysql_error());
			$ln_tematica=mysql_fetch_array($qr_tematica);
			//busca nome do autor se existir
			if ($m_resumos['autor']!=0){
				$sql_autor="SELECT nome FROM ev_participante WHERE id='".$m_resumos['autor']."'";
				$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
				$ln_autor=mysql_fetch_array($qr_autor);
			}
			//busca nome do cocautor de existir
			if ($m_resumos['co_autor']!=0){
				$sql_coautor="SELECT nome FROM ev_participante WHERE id='".$m_resumos['co_autor']."'";
				$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
				$ln_coautor=mysql_fetch_array($qr_coautor);
			}
					
			?>
			         <p>&nbsp;</p>
					 <p class="txt_categorias"><b><?php if ($m_resumos['id_tipo_trabalho']==3){print "Comunicação Individual";} if ($m_resumos['id_tipo_trabalho']==4){print "Pôster";} ?></b></p>
                     <div style="background:#F2FBFF; border:1px solid #AADBFF; padding:10px 10px 0 10px;">
                     <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
                     <form action="editarresumo.php" method="post">
                     <input name="id_resumo" type="hidden" value="<?=$m_resumos['idresumo'];?>" />
                     <input name="" type="image" src="http://www.alab.org.br/eventosalab/images/edit_f2.png" />
                     </form>
                     <?php } else{?>
							<p class="dados_obrigatorios">O prazo para edi&ccedil;&atilde;o de trabalho encerrou.</p>
						 <?php }//else?>
                     <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Linha temática:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_tematica['titulo'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Título:</strong></td>
                        <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $m_resumos['titulo'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_autor['nome'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Co-autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_coautor['nome']; if ($m_resumos['co_autor']==0){print '-';}?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Resumo:</strong></td>
                        <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_resumos['resumo']);?></td>
                      </tr>                  
                      <tr>
                        <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                        <td class="txt_resposta"><?php print $m_resumos['palavras_chave'];?></td>
                      </tr>
                    </table>
					<br />
         </div>
		 <?php
		 } // while
		/**************************************************
		* fim: Comunicações Individuais e Pôsteres *
		**************************************************/

		/*************************************************************************
		* Resumos em sessões (Simpósio e Comunicação Coordenada) *
		*************************************************************************/
		while($m_resumos = mysql_fetch_array($resumos_sessao, MYSQL_ASSOC)){ 
			/*
			print "<pre>";
				print_r($m_resumos);
			print "</pre>";
			*/
			
			//busca nome da linha tematica no caso de resumo de Comunicação Coordenada
			if ($m_resumos['id_tipo_trabalho']==2){
				$sql_tematica="SELECT titulo FROM ev_linha_tematica WHERE id='".$m_resumos['id_linha_tematica']."'";
				$qr_tematica=mysql_query($sql_tematica, $conexao) or die(mysql_error());
				$ln_tematica=mysql_fetch_array($qr_tematica);
			}//linha temática
			//busca nome do autor se existir
			if ($m_resumos['autor']!=0){
				$sql_autor="SELECT nome FROM ev_participante WHERE id='".$m_resumos['autor']."'";
				$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
				$ln_autor=mysql_fetch_array($qr_autor);
			}
			//busca nome do cocautor de existir
			if ($m_resumos['co_autor']!=0){
				$sql_coautor="SELECT nome FROM ev_participante WHERE id='".$m_resumos['co_autor']."'";
				$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
				$ln_coautor=mysql_fetch_array($qr_coautor);
			}
			?>
			         <p>&nbsp;</p>
					 <p class="txt_categorias"><b>
					 	<?php 
						if ($m_resumos['id_tipo_trabalho']==1){print "Resumo em Simp&oacute;sio";} 
						elseif ($m_resumos['id_tipo_trabalho']==2){print "Resumo em Comunica&ccedil;&atilde;o Coordenada";} 
						?>
                        </b></p>
                     <div style="background:#F2FBFF; border:1px solid #AADBFF; padding:10px 10px 0 10px;">
                     <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
                     		<?php
							switch($m_resumos['id_tipo_trabalho']){
								case 1:
									$sql = "SELECT titulo_sessao 
													 FROM ev_simposio
													 WHERE id = '".$m_resumos['id_simposio']."' ";
									$result = mysql_query($sql, $conexao);
									list($titulo_sessao_resumo) = mysql_fetch_array($result);
									break;
									
								case 2:
									$sql = "SELECT titulo_sessao 
													 FROM ev_comunicacao_coordenada
													 WHERE id = '".$m_resumos['id_comunicacao_coordenada']."' ";
									$result = mysql_query($sql, $conexao);
									list($titulo_sessao_resumo) = mysql_fetch_array($result);
									break;
							}//switch
							?>
							<tr>
                                <td width="137" class="txt_topico_tabela"><strong>Sessão:</strong></td>
                                <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $titulo_sessao_resumo;?></span></td>
                            </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Linha temática:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_tematica['titulo'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Título:</strong></td>
                        <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $m_resumos['titulo'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_autor['nome'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Co-autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_coautor['nome']; if ($m_resumos['co_autor']==0){print '-';}?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Resumo:</strong></td>
                        <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_resumos['resumo']);?></td>
                      </tr>                  
                      <tr>
                        <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                        <td class="txt_resposta"><?php print $m_resumos['palavras_chave'];?></td>
                      </tr>
                    </table>
					<br />
         </div>
		 <?php
		 } // while
		 ?>           
         <p>&nbsp;</p>
         <?php
		/*****************************************************************************
		* fim: Resumos em sessões (Simpósio e Comunicação Coordenada) *
		******************************************************************************/
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
