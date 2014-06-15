<?php
	require_once("../conexao.php");
	require_once("../check_user.php");

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
	$passaporte = $mostrar['passaporte'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

</head>

<body>
<div id="tudo">

		<div id="header">
		<?php /*
        <img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner_final_pequeno.jpg" width="990" height="215" />
        */ ?>
        <img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />        
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
     <?php if ($modalidade_participacao==1) {//1 -> com trabalho //1 -> é associado alab?>
       <span class="txt_categorias"><strong>Inscrições COM trabalho </strong></span>
       <div id="box_trabalhos">
       	<span class="txt_topico_tabela">Para poder inscrever seu trabalho <?php /*nas modalidades Comunica&ccedil;&atilde;o Coordenada e Comunica&ccedil;&atilde;o Individual */?>&eacute; preciso ser Associado ALAB. Para os estrangeiros n&atilde;o &eacute; necess&aacute;ria esta associa&ccedil;&atilde;o.</span>
       <br />
       <ul><span class="txt_topico_tabela">Caso voc&ecirc;:</span>
       	<li>j&aacute; seja Associado ALAB, entre em EDITAR DADOS acima, marque a op&ccedil;&atilde;o &quot;Sim&quot; em &quot;J&aacute; &eacute; associado da ALAB?&quot; e informe o seu <em>username</em> e senha de associado;</li>
        <li>n&atilde;o seja Associado ALAB, entre em   <a href="http://www.alab.org.br/" target="_blank" style="color:#0080C2">http://www.alab.org.br/</a> e clique na aba Associados para efetuar o seu cadastro.</li>
       </ul>
       <?php /*
	   <span class="txt_topico_tabela">Cada participante s&oacute; pode apresentar no m&aacute;ximo dois trabalhos.</span>
       <br />
	   */ ?>
        <br />
        <?php
		///////////////////////////////////////
		// Verificar quantidade de trabalhos //
		///////////////////////////////////////
		
		$qtd_trabalhos_cadastrados = 0;
		$trabalhos_cadastrados = array();
		$j = 0;
		
		// Autor: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
		$sql = "SELECT id, id_tipo_trabalho, titulo FROM ev_resumo 
			WHERE autor='".$_SESSION['id_participante']."' ORDER BY id ASC";
		$result = mysql_query($sql, $conexao);
		while($resumo = mysql_fetch_array($result)){
			$trabalhos_cadastrados[$j]["id"]               = $resumo["id"];
			$trabalhos_cadastrados[$j]["id_tipo_trabalho"] = $resumo["id_tipo_trabalho"];
			$trabalhos_cadastrados[$j]["titulo"]           = $resumo["titulo"];
			$trabalhos_cadastrados[$j]["eh_autor"]         = true;
			$j++;
		}//while
		
		// Co-autor: Pôster, Comunicação Individual, resumo de Comunic. Coordenada e resumo de Simpósio
		$sql = "SELECT id, id_tipo_trabalho, titulo FROM ev_resumo 
			WHERE co_autor='".$_SESSION['id_participante']."' ORDER BY id ASC";
		$result = mysql_query($sql, $conexao);
		while($resumo = mysql_fetch_array($result)){
			$trabalhos_cadastrados[$j]["id"]               = $resumo["id"];
			$trabalhos_cadastrados[$j]["id_tipo_trabalho"] = $resumo["id_tipo_trabalho"];
			$trabalhos_cadastrados[$j]["titulo"]           = $resumo["titulo"];
			$trabalhos_cadastrados[$j]["eh_co_autor"]      = true;
			$j++;
		}//while
		
		/*
		// Coordenador de Comunicação Coordenada
		$sql = "SELECT id, titulo_sessao FROM ev_comunicacao_coordenada 
			WHERE id_coordenador='".$_SESSION['id_participante']."' ORDER BY id ASC";
		$result = mysql_query($sql, $conexao);
		while($resumo = mysql_fetch_array($result)){
			$trabalhos_cadastrados[$j]["id"]               = $resumo["id"];
			$trabalhos_cadastrados[$j]["titulo"]           = $resumo["titulo_sessao"];
			$trabalhos_cadastrados[$j]["id_tipo_trabalho"] = 2;
			$trabalhos_cadastrados[$j]["eh_coordenador"]   = true;
			$j++;
		}//while
		
		// Coordenador de Simpósio
		$sql = "SELECT s.id, s.titulo_sessao, sp.ordem 
			FROM ev_simposio_coordenador sp, ev_simposio s
			WHERE 
				id_participante = '".$_SESSION['id_participante']."'
				AND sp.id_simposio = s.id
			ORDER BY id ASC";
		$result = mysql_query($sql, $conexao);
		while($resumo = mysql_fetch_array($result)){
			$trabalhos_cadastrados[$j]["id"]               = $resumo["id"];
			$trabalhos_cadastrados[$j]["titulo"]           = $resumo["titulo_sessao"];
			$trabalhos_cadastrados[$j]["id_tipo_trabalho"] = 1;
			$trabalhos_cadastrados[$j]["eh_coordenador"]   = true;
			$j++;
		}//while
		*/
		
		$qtd_trabalhos_cadastrados = $j;
		//print "\$qtd_trabalhos_cadastrados: ".$qtd_trabalhos_cadastrados."</br>";
		if($qtd_trabalhos_cadastrados>=2){
			?>
			<span class="txt_topico_tabela">Limite de cadastro de trabalhos alcan&ccedil;ado.
            <br />
            <ul>
			<?php
			foreach($trabalhos_cadastrados as $trabalho_cadastrado){
				echo "<li>";
				switch($trabalho_cadastrado["id_tipo_trabalho"]){
					case 1:
						if($trabalho_cadastrado["eh_coordenador"]) echo "Coordenador do Simpósio <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>. Caso ainda não tenha cadastrado os trabalhos do simpósio será exibido um botão <b>Envie seu trabalho</b> abaixo.";
						elseif($trabalho_cadastrado["eh_autor"]) echo "Autor do trabalho <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b> em um Simpósio.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor do trabalho <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b> em um Simpósio.";
						break;
					
					case 2:
						if($trabalho_cadastrado["eh_coordenador"]) echo "Coordenador da Comunicação Coordenada <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						elseif($trabalho_cadastrado["eh_autor"]) echo "Autor do trabalho <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b> em uma Comunicação Coordenada.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor do trabalho <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b> em uma Comunicação Coordenada.";
						break;
					
					case 3:
						if($trabalho_cadastrado["eh_autor"]) echo "Autor da Comunicação Individual <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor da Comunicação Individual <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						break;
					
					case 4:
						if($trabalho_cadastrado["eh_autor"]) echo "Autor do Pôster <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
						elseif($trabalho_cadastrado["eh_co_autor"]) echo "Co-autor do Pôster <b><span style=\"text-transform:uppercase\">".$trabalho_cadastrado["titulo"]."</span></b>.";
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
					//VERIFICA SE É COORDENADOR DE SIMPÓSIO
					$sql_coordenador="SELECT s.id, s.id_topico FROM ev_participante p, ev_simposio s, ev_simposio_coordenador sc
									  WHERE p.id='".$_SESSION['id_participante']."'
									  AND sc.id_participante=p.id
 								      AND sc.id_simposio=s.id";
					$qr_coordenador=mysql_query($sql_coordenador, $conexao) or die(mysql_error());
					$ln_coordenador_simposio=mysql_fetch_array($qr_coordenador);
					$registro_coordenador=mysql_num_rows($qr_coordenador);
						
					//print $registro_coordenador;

     				while($mostrar_trabalho=mysql_fetch_array($qr_trabalho)){ 

						// Verificar se já cadastrou resumos neste simpósio
						$result = mysql_query("SELECT id_simposio FROM ev_simposio_coordenador WHERE id_participante='".$_SESSION['id_participante']."'", $conexao);
						$id_simposio_coord = "";
						$id_simposio_coord = mysql_fetch_array($result);
						$id_simposio_coord = $id_simposio_coord["id_simposio"];

						$result = mysql_query("SELECT id FROM ev_resumo WHERE id_simposio='".$id_simposio_coord."'", $conexao);
						$ids_resumos = mysql_fetch_array($result);

						if(empty($ids_resumos[0])){ // verifica se já é coordenador de algum simpósio
							if (( $mostrar_trabalho['id']==1) and ($registro_coordenador>0)) { //idtrabalho 1 -> simposio
								?>
                                 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
                                 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
                                 <?php //if ($data_hoje <= $ultima_chamada_trabalho){ ?>
								 <p><form action="trabalho.php" method="post">
                                 <label>
                                 <input type="submit" name="button2" id="button2" class="botao_trabalho" value="Envie seu trabalho" />
                                 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
                                 <input name="id_simposio" type="hidden" value="<? print $ln_coordenador_simposio['id']; //id do simposio?>" />
                                 <input name="id_topico" type="hidden" value="<? print $ln_coordenador_simposio['id_topico']; //id do simposio?>" />
                                 </label>
              </form></p>
								<?php /*} else{?>
                                    <p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
                                <?php }//else 
								*/
								?>
								<p>&nbsp;</p>
								<?php
							}//if verifica coordenador 
						}//simposio
						if ($asssociado_alab==1 || (!empty($mostrar['passaporte']) && strlen($mostrar['passaporte'])>=6 )){ 
						 
							// coordenada e individual 
							if ( ($mostrar_trabalho['id']!=1) and ($mostrar_trabalho['id']!=4) and ($id_tipo_participante!=6) ) {
								if(($id_formacao!=1) and ($id_formacao!=2) and ($id_formacao!=3) and ($id_formacao!=4)) {
									continue;
								}
								// Verifica quantidade de trabalhos inscritos deste participante
								if ($mostrar_trabalho['id']==3 && $qtd_trabalhos_cadastrados>=2){
									continue;
								}

								// Verificar se já cadastrou resumo na comunicação coordenada
								if($mostrar_trabalho['id']==2){
										?>
										 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
										 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
										 <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
                                    <p><form action="trabalho.php" method="post">
                                         <label>
                                         <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
                                         <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
                                         </label>
                                         </form></p>
                                         <?php } else{?>
                                            <p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
                                         <?php }//else
										 ?>
                                         <p>&nbsp;</p>
                                         <?php
									//}//if
								}//if
								elseif($mostrar_trabalho['id']==3){
									?>
									 <span class="txt_titulo_destaque"><?=$mostrar_trabalho['nome'];?></span>
									 <p class="txt_titulo_noticias_2"><?=$mostrar_trabalho['descricao'];?></p>
									 <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
<p><form action="trabalho.php" method="post">
									 <label>
									 <input type="submit" name="button" id="button" class="botao_trabalho" value="Envie seu trabalho" />
									 <input name="id_trabalho" type="hidden" value="<?=$mostrar_trabalho['id'];?>" />
									 </label>
									 </form></p>
									 <?php } else{?>
										<p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
									 <?php }//else
									 ?>
									 <p>&nbsp;</p>
									 <?php
								}//if
								?>
							<?php
							} //if

							/* Pôster */
							if ($qtd_trabalhos_cadastrados<2){
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
								 <?php } else{ ?>
									<p class="dados_obrigatorios">O prazo para envio de trabalho encerrou.</p>
								 <?php } // else ?>
								 <p>&nbsp;</p>
								<?php } 
							}// fim do if ($qtd_trabalhos_cadastrados<2) (Pôster)
					 	}//associado
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
                    <form action="../controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="../controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
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
