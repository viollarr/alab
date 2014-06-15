<?php
	require_once("conexao.php");
	require_once("check_user.php");

	$data_hoje=date('Y-m-d');
	//$data_hoje="2011-02-01";

	$sql_chamada = "SELECT data_fim 
					FROM ev_chamada 
					WHERE id_evento='".$_SESSION['id_evento']."' AND 
					tipo='trabalho' 
					ORDER BY ordem DESC LIMIT 1";
	$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
	$m_chamada = mysql_fetch_assoc($qr_chamada);
	$ultima_chamada_trabalho = $m_chamada['data_fim'];


	
	/*VERIFICA JUNTO A TABELA USER DO JOOMLA SE O USUARIO É ASSOCIADO DA ALAB*/
	$sql_participante_user = "SELECT * FROM ev_participante ev_p, jos_users jos_u WHERE ev_p.id_associado_alab = jos_u.id AND ev_p.id=".$_SESSION['id_participante']."";
	$qr_participante_user = mysql_query($sql_participante_user, $conexao) or die(mysql_error());
	$mostrar_user=mysql_fetch_array($qr_participante_user);
	$verifica_associado_alab = mysql_num_rows($qr_participante_user);

	$block_alab = $mostrar_user['block']; // 0 habilitado no joomla, 1 desabilitado no joomla
	
	if (($verifica_associado_alab>0) and ($block_alab==0)){
		$asssociado_alab=1;
	}else{
		$asssociado_alab=0;
	}

	$sql_participante = "SELECT * FROM ev_participante WHERE id='".$_SESSION['id_participante']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$mostrar=mysql_fetch_array($qr_participante);
	$id_tipo_participante = $mostrar['id_tipo_participante'];
	$id_formacao = $mostrar['id_formacao']; //1 e 3 Doutor e Doutorando
	$modalidade_participacao = $mostrar['modalidade_participacao'];
	
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
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner_final_pequeno.jpg" width="990" height="215" />        
        </div>

        <div style="margin-left:30px;">
        	<span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impressão de boleto</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="cartaaceite.php">CartA de aceite</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participação</a></span>
		</div>
        <p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
     <?php if ($modalidade_participacao==1) {//1 -> com trabalho //1 -> é associado alab?>
       <span class="txt_categorias"><strong>Inscrições COM trabalho </strong></span>
       <div id="box_trabalhos">
         <?php 
		 	$sql_trabalhos = "SELECT t.id, t.nome, t.descricao
							  FROM ev_evento_tipo_trabalho ev_t, ev_tipo_trabalho t
							  WHERE ev_t.id_evento = '".$_SESSION['id_evento']."'  
							  AND t.id = ev_t.id_tipo_trabalho";
			$qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());
		 ?>
         <?php 
					//VERIDICA SE É COORDENADOR DE SIMPÓSIO
					$sql_coordenador="SELECT s.id, s.id_topico FROM ev_participante p, ev_simposio s, ev_simposio_coordenador sc
									  WHERE p.id='".$_SESSION['id_participante']."'
									  AND sc.id_participante=p.id
 								      AND sc.id_simposio=s.id";
					$qr_coordenador=mysql_query($sql_coordenador, $conexao) or die(mysql_error());
					$ln_coordenador_simposio=mysql_fetch_array($qr_coordenador);
					$registro_coordenador=mysql_num_rows($qr_coordenador);
						
					//print $registro_coordenador;

     				while($mostrar_trabalho=mysql_fetch_array($qr_trabalho)){ 

						if (( $mostrar_trabalho['id']==1) and ($registro_coordenador>0)) { //idtrabalho 1 -> simposio
		?>					  
         		             <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
							 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
							 <?php if ($data_hoje < $ultima_chamada_trabalho){ ?>							 
<p><form action="trabalho.php" method="post">
							 <label>
							 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
							 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
							 <input name="id_simposio" type="hidden" value="<? print $ln_coordenador_simposio['id']; //id do simposio?>" />
                             <input name="id_topico" type="hidden" value="<? print $ln_coordenador_simposio['id_topico']; //id do simposio?>" />
							 </label>
							 </form></p>
                     <?php } else{?>
						<p class="dados_obrigatorios">O prazo para envio de trabalho  encerrou.</p>
                        <?php }?>
                             
		 <p>&nbsp;</p>
		<?php					
						}//simposio
						if ($asssociado_alab==1){ 
						 
							// coordenada e individual 
							if ( ($mostrar_trabalho['id']!=1) and ($mostrar_trabalho['id']!=4) and ($id_tipo_participante!=6) ) {
								if(($id_formacao!=1) and ($id_formacao!=2) and ($id_formacao!=3) and ($id_formacao!=4)) {
									continue;
								}
							?>
							 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
									 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
									 <?php if ($data_hoje < $ultima_chamada_trabalho){ ?>
<p><form action="trabalho.php" method="post">
									 <label>
									 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
									 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
									 </label>
									 </form></p>
                                                          <?php } else{?>
						<p class="dados_obrigatorios">O prazo para envio de trabalho  encerrou.</p>
                        <?php }?>

		 <p>&nbsp;</p>
						<?php
							}	 
					 }//associado
					 if ($mostrar_trabalho['id']==4) { //poster
		 ?>		             <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
							 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
							 <?php if ($data_hoje < $ultima_chamada_trabalho){ ?>
                             <p><form action="trabalho.php" method="post">
							 <label>
							 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
							 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
							 </label>
							 </form></p>
                                                  <?php } else{?>
						<p class="dados_obrigatorios">O prazo para envio de trabalho  encerrou.</p>
                        <?php }?>

		 <p>&nbsp;</p>
         <?php 
					}
					
                }//while
		 ?>
	   </div>
       <?php 
	   }
	   else if ($modalidade_participacao==0){//0 -> sem apresentação de Trabalho ?>
       <span class="txt_categorias"><strong>Inscrições SEM trabalho </strong></span>
       <div id="box_trabalhos">
         <span class="txt_titulo_destaque">Ouvinte</span>
         <p class="txt_titulo_noticias_2"> Participantes sem apresenta&ccedil;&atilde;o de trabalho. </p>
       </div>
       <?php } ?>
       	
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
