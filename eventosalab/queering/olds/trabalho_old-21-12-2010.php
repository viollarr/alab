<?php
	require_once("conexao.php");
	require_once("check_user.php");
	require_once("admin/funcoes/special_ucwords.php");

	$id_trabalho=(int)$_POST['id_trabalho'];
		$_SESSION['id_trabalho']=$id_trabalho;
	$id_simposio=(int)$_POST['id_simposio'];
		$_SESSION['id_simposio']=$id_simposio;
	$id_topico=(int)$_POST['id_topico'];	
		$_SESSION['id_topico']=$id_topico;
	
	$sql_participante = "SELECT nome FROM ev_participante WHERE id='".$_SESSION['id_participante']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	
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
	/*$sql_topico_simposio = "SELECT t.id, t.nome
				  FROM ev_evento_topico_simposio ev_t, ev_topico_simposio t
				  WHERE ev_t.id_evento = '".$_SESSION['id_evento']."'  
				  AND t.id = ev_t.id_topico_simposio";
	$qr_topico_simposio= mysql_query($sql_topico_simposio, $conexao) or die(mysql_error());
	*/
	
	
	
				function envia_email_ja_cadastrado($email_para_quem, $nome_para_quem, $de_quem){
							
							$id_evento_cript=base64_encode($_SESSION['id_evento']);
							
							$quemenvia="ALAB";
							$email_alab = "alab@alab.org.br";
							$assunto = "Convite para participar de evento - ALAB";
							
							$corpoemail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
											<html>
												<head><title>ALAB</title></head>
												<body>
												<div style="height: 100%; font-family:Arial; width: 100%;left: auto; top: auto;right: auto;bottom: auto;position: static;">
												<br />
												<table width="500" cellpadding="0" cellspacing="0" style="margin-left:50px;">
													 <tr>
														<td>&nbsp;</td>
													 </tr>
													 <tr>
														<td align=\"left\">Olá '.$nome_para_quem.',<br /><br />
														'.$de_quem.' lhe convidou a fazer parte de um grupo de trabalho.<br /><br /></td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>
													 <tr>
														<td><a href="http://www.alab.org.br/eventosalab/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
													 </tr>													 										 
 													 <tr>
														<td>&nbsp;</td>
													 </tr>
												</table>
											</div>	
											</body>
											</html>		
											';		
								$headers = "From: ".$quemenvia."  <".$email_alab.">\n";
								$headers .= "MIME-Version: 1.1\n";
								$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
								$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
								mail($email_para_quem, $assunto, $corpoemail, $headers);
					}
					
					
					
					
				function envia_email_nao_cadastrado($email_para_quem, $nome_para_quem, $de_quem,$senha_random){					
							
							$id_evento_cript=base64_encode($_SESSION['id_evento']);
							
							$quemenvia="ALAB";
							$email_alab = "alab@alab.org.br";
							$assunto = "Convite para participar de evento - ALAB";
							
							$corpoemail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
											<html>
												<head><title>ALAB</title></head>
												<body>
												<div style="height: 100%; font-family:Arial; width: 100%;left: auto; top: auto;right: auto;bottom: auto;position: static;">
												<br />
												<table width="500" cellpadding="0" cellspacing="0" style="margin-left:50px;">
													 <tr>
														<td>&nbsp;</td>
													 </tr>
													 <tr>
														<td align=\"left\">Olá '.$nome_para_quem.',<br /><br />
														'.$de_quem.' lhe convidou a fazer parte de um grupo de trabalho.<br /><br />
														Segue abaixo seu e-mail e senha de acesso do evento da ALAB:</td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>										 
													 <tr>
														<td align=\"left\"><strong>E-mail: </strong>'.$email_para_quem.'</td>
													 </tr>
													 <tr>
														<td align=\"left\"><strong>Senha: </strong>'.$senha_random.'</td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>
 													 <tr>
														<td><a href="http://www.alab.org.br/eventosalab/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
													 </tr>
													 <tr>
														<td>&nbsp;</td>
													 </tr>													 														 
													 <tr>
														<td>Basta entrar com o e-mail e senha na área do participante e completar seus dados.</td>
													 </tr>
 													 <tr>
														<td>&nbsp;</td>
													 </tr>
												</table>
											</div>	
											</body>
											</html>		
											';		
								$headers = "From: ".$quemenvia."  <".$email_alab.">\n";
								$headers .= "MIME-Version: 1.1\n";
								$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
								$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
								mail($email_para_quem, $assunto, $corpoemail, $headers);
					}
					
				function envia_email_recebimento($params_email_recebimento){
					/*
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo,
						"id_participante" => $id_participante,
						"conexao"      => $conexao

					);
					*/
					
					/*
					exit("id_evento: ".$params_email_recebimento["id_evento"]
						.", <br>id_tipo_trab: ".$params_email_recebimento["id_tipo_trab"]
						.", <br>titulo_trab: ".$params_email_recebimento["titulo_trab"]
						.", <br>id_participante: ".$params_email_recebimento["id_participante"]
						.", <br>conexao: ".$params_email_recebimento["conexao"]);
					/**/
					
					$conexao = $params_email_recebimento["conexao"];
					
					/* Dados evento */
					$sql = "SELECT titulo, periodo, local FROM ev_evento WHERE id=".$params_email_recebimento["id_evento"];
					//print "<br>evento: ".$sql;
					$result = mysql_query($sql, $conexao);
					$row    = mysql_fetch_array($result);
					$nome_evento  = $row[0];
					$periodo_evento   = $row[1];
					$local_evento = $row[2];
					
					/* Tipo trabalho */
					$sql = "SELECT nome FROM ev_tipo_trabalho WHERE id=".$params_email_recebimento["id_tipo_trab"];
					//print "<br>tipo trab: ".$sql;
					$result = mysql_query($sql, $conexao);
					$row    = mysql_fetch_array($result);
					$tipo_trabalho = $row[0];
				
					/* Autor */
					$sql = "SELECT email FROM ev_participante WHERE id=".$params_email_recebimento["id_participante"];
					//print "<br>autor: ".$sql;
					$result = mysql_query($sql, $conexao);
					$row    = mysql_fetch_array($result);
					$email_autor = $row[0];
				
					/* Configurando mail */
					$quemenvia="ALAB";
					$email_alab = "alab@alab.org.br";
					$assunto = "Confirmação de recebimento de proposta de apresentação de trabalho";
							
					$corpoemail = "Confirmamos o recebimento da sua proposta de <b>".$tipo_trabalho."</b> intitulada <b>".$params_email_recebimento["titulo_trab"]."</b> para apresentação no <b>".$nome_evento."</b>, a ser realizado no período de ".$periodo_evento." no local: ".$local_evento.".";
					// Frase original (email do dia 04-11-2010): "Confirmamos o recebimento da sua proposta de (comunicação coordenada/comunicação individual/pÿster) intitulada (nome da proposta inserido pelo participante) para apresentação no IX Congresso Brasileiro de Linguística Aplicada, a ser realizado no perído de 25 a 28 de julho de 2011 na Universidade Federal do Rio de Janeiro"
					
					$headers = "From: ".$quemenvia." <".$email_alab.">\n";
					$headers .= "MIME-Version: 1.1\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
					$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
					
					mail($email_autor, $assunto, $corpoemail, $headers);
					//exit("Email enviado: ".mail($email_autor, $assunto, $corpoemail, $headers));
					//print "<br>\$email_autor, \$assunto, \$corpoemail, \$headers: ".$email_autor.", ".$assunto.", ".$corpoemail.", ".$headers;
					//exit();
				}
	
	if ($_POST["insert"] == "true"){
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho'];
		$id_topico=(int)$_POST['id_topico'];		
		$titulo = special_ucwords($_POST['titulo']);
		//atributos únicos de individual e poster
		$linha_tematica=$_POST['linha_tematica'];
		//$topico=$_POST['topico_simposio'];
		$autor=addslashes(trim($_POST['autor']));
		$coautor=addslashes($_POST['coautor']);
		$email_coautor = strtolower(addslashes( trim($_POST['email_coautor']) ));
		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));
		// atributos únicos do simposio e coordenada
		$titulo_sessao = special_ucwords($_POST['titulo_sessao']);
		$resumo_sessao=addslashes(trim($_POST['resumo_sessao']));
		$palavras_sessao=addslashes(trim($_POST['palavras_sessao']));
		$debatedor=addslashes(trim($_POST['debatedor']));

		if ($id_trabalho==1){ //print "simposio";
			// TRATA OS ERROS NOS FORMULÁRIOS
			$id_simposio=(int)$_POST['id_simposio'];
			if ($debatedor==""){$error[]="Informe o debatedor"; }
			if ($titulo_sessao==""){$error[]="Informe o título da sessão"; }
			if ($resumo_sessao==""){$error[]="Informe o resumo da sessão"; }
			if ($palavras_sessao==""){$error[]="Informe as palavras-chave da sessão"; }
			
			$titulos = array();
			$autores = array();
			$emails_autor = array();
			$ids_formacao_autor = array();
			$coautores = array();
			$emails_coautor = array();
			$ids_formacao_co_autor = array();
			$resumo = array();
			$palavras = array();
			
			$titulos = $_POST["titulo"]; 
			$autores = $_POST["autor"];
			$emails_autor = $_POST["email_autor"];
			$coautores = $_POST["coautor"];
			$emails_coautor = $_POST["email_coautor"];
			$ids_formacao_co_autor = $_POST["id_formacao_co_autor"];
			$resumos = $_POST["resumo"];
			$palavras = $_POST["palavras"];
			
			$id_formacao_autor0 = $_POST["id_formacao_autor0"];
			$id_formacao_autor1 = $_POST["id_formacao_autor1"];
			$id_formacao_autor2 = $_POST["id_formacao_autor2"];
			$id_formacao_autor3 = $_POST["id_formacao_autor3"];
			$id_formacao_autor4 = $_POST["id_formacao_autor4"];
			$id_formacao_autor5 = $_POST["id_formacao_autor5"];
			$ids_formacao_autor = array($id_formacao_autor0, $id_formacao_autor1, $id_formacao_autor2, $id_formacao_autor3, $id_formacao_autor4, $id_formacao_autor5);

			$id_formacao_co_autor0 = $_POST["id_formacao_co_autor0"];
			$id_formacao_co_autor1 = $_POST["id_formacao_co_autor1"];
			$id_formacao_co_autor2 = $_POST["id_formacao_co_autor2"];
			$id_formacao_co_autor3 = $_POST["id_formacao_co_autor3"];
			$id_formacao_co_autor4 = $_POST["id_formacao_co_autor4"];
			$id_formacao_co_autor5 = $_POST["id_formacao_co_autor5"];
			$ids_formacao_co_autor = array($id_formacao_co_autor0, $id_formacao_co_autor1, $id_formacao_co_autor2, $id_formacao_co_autor3, $id_formacao_co_autor4, $id_formacao_co_autor5);

			/*
			print "<br><pre>";
				print_r($ids_formacao_autor);
			print "<br></pre>";
			/**/

			/* Verificar trabalhos */
			for($i = 0; $i <= 3; $i++){
				$k = $i+1; // para exibir a numeração a partir do número 1
			
				if( !empty($titulos[$i]) ){
					if(empty($autores[$i])) {$error[]="Informe o nome do autor no Trabalho $k."; }
					if(empty($emails_autor[$i])) {$error[]="Informe o email do autor <b>$autores[$i]</b> no Trabalho $k."; }
					if(empty($ids_formacao_autor[$i])) {$error[]="Informe a formação do autor <b>$autores[$i]</b> no Trabalho $k."; }

					if(!empty($coautores[$i])) {
						if(empty($emails_coautor[$i])) {$error[]="Informe o email do co-autor <b>$coautores[$i]</b> no Trabalho $k."; }
						if(empty($ids_formacao_co_autor[$i])) {$error[]="Informe a formação do co-autor <b>$coautores[$i]</b> no Trabalho $k."; }
					}//if
					
					if(empty($resumos[$i])) {$error[]="Informe o resumo do Trabalho $k."; }
					if(empty($palavras[$i])) {$error[]="Informe as palavras-chave do Trabalho $k."; }
				}//if
			}//foreach

			if(sizeof($error)==0){
				//atualiza o simpósio
				$sql_update_simposio = "UPDATE ev_simposio SET
									   id_evento = '$id_evento',
									   titulo_sessao = '$titulo_sessao',
									   resumo_sessao = '$resumo_sessao',
									   palavras_chave_sessao = '$palavras_sessao',
									   debatedor ='$debatedor'
									   WHERE id='$id_simposio'";
				mysql_query($sql_update_simposio, $conexao);
				$registro_atualizado=mysql_affected_rows();
				
				// Enviar email de confirmação de recebimento de proposta de trabalho
				if($registro_atualizado){
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo_sessao,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}//if

				//insere os trabalhos(resumos)
				$qtde_trab = 5;
				$array_trabalhos = array();
				$array_trabalhos = $_POST["titulo"];
				
				//print_r($array_trabalhos);
				
				for($i=0; $i<$qtde_trab; $i++){		
					if (!empty($array_trabalhos[$i])){
						$titulo = special_ucwords($_POST['titulo'][$i]);
						$autor=addslashes($_POST['autor'][$i]);
						$email_autor = strtolower(addslashes( trim($_POST['email_autor'][$i]) ));
						$coautor=addslashes($_POST['coautor'][$i]);
						$email_coautor = strtolower(addslashes( trim($_POST['email_coautor'][$i]) ));
						$resumo=addslashes($_POST['resumo'][$i]);
						$palavras=addslashes($_POST['palavras'][$i]);			
						
						$id_autor=0;
						if ($email_autor!=""){
							$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_autor' AND id_evento='$id_evento'";
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado=mysql_num_rows($resultado_email);
							$ln=mysql_fetch_array($resultado_email);
							$id_autor=$ln['id'];//id_participante_autor							
							$nome_participante=$p['nome'];
							
							if ($id_autor!=$id_participante){
								if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio						
									//function
									envia_email_ja_cadastrado($email_autor, $autor, $nome_participante);
									
								}else{//insere o e-mail do autor no banco e manda o e-mail 
									$senha_random= rand(111111,999999);
									$id_formacao_autor = (int) addslashes($_POST["id_formacao_autor$i"]);
									// Caso eles deixem em branco a formação da pessoa, é melhor fazer isso:
									if(empty($id_formacao_autor)) $id_formacao_autor = 1; // setar como Doutor
									
									$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca, modalidade_participacao, id_formacao)
												   values('$id_evento','$autor','$email_autor','$senha_random','nao', 1, '$id_formacao_autor');";
									mysql_query($sql_insert, $conexao);	
									$id_autor=mysql_insert_id();	
	
									//function
									envia_email_nao_cadastrado($email_autor, $autor, $nome_participante, $senha_random);
							
								}// if email ja cadastrado
							}	
						}//if autor diferente vazio
						
						$id_coautor=0;
						if ($email_coautor!="") {
							$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_coautor' AND id_evento='$id_evento'";
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado=mysql_num_rows($resultado_email);
							$ln=mysql_fetch_array($resultado_email);
							$id_coautor=$ln['id'];
							$nome_participante=$p['nome'];													
							
							if ($id_coautor!=$id_participante){							
								if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio
									//function
									envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
								
								}else{//insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
		
									$senha_random= rand(111111,999999);
									$id_formacao_co_autor = (int) addslashes($_POST["id_formacao_co_autor$i"]);
									// Caso eles deixem em branco a formação da pessoa, é melhor fazer isso:
									if(empty($id_formacao_co_autor)) $id_formacao_co_autor = 1; // setar como Doutor

									$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca, modalidade_participacao, id_formacao)
												   values('$id_evento','$coautor','$email_coautor','$senha_random','nao', 1, '$id_formacao_co_autor');";	
									mysql_query($sql_insert, $conexao);		
									$id_coautor=mysql_insert_id();		
									//function
									envia_email_nao_cadastrado($email_coautor, $coautor, $nome_participante, $senha_random);
								}// if email ja cadastrado
							}	
						 }//if coautor diferente de vazio
					
						$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
									   values('$id_evento','0','$id_trabalho','0','$id_simposio','$titulo','$resumo','$palavras','$id_autor','$id_coautor','nao');";	
						mysql_query($sql_insert, $conexao);
						$registro_inserido=mysql_affected_rows();
					
					}//array 	
				}//for
			}//size error
		}// id trabalho simposio

		if ($id_trabalho==2){ //print "coordenada";
			// TRATA OS ERROS NOS FORMULÁRIOS
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			if ($titulo_sessao==""){$error[]="Informe o título da sessão"; }
			if ($resumo_sessao==""){$error[]="Informe o resumo da sessão"; }
			if ($palavras_sessao==""){$error[]="Informe as palavras-chave da sessão"; }

			$titulos = array();
			$autores = array();
			$emails_autor = array();
			$ids_formacao_autor = array();
			$coautores = array();
			$emails_coautor = array();
			$ids_formacao_co_autor = array();
			$resumo = array();
			$palavras = array();
			
			$titulos = $_POST["titulo"]; 
			$autores = $_POST["autor"];
			$emails_autor = $_POST["email_autor"];
			$coautores = $_POST["coautor"];
			$emails_coautor = $_POST["email_coautor"];
			$ids_formacao_co_autor = $_POST["id_formacao_co_autor"];
			$resumos = $_POST["resumo"];
			$palavras = $_POST["palavras"];
			
			$id_formacao_autor0 = $_POST["id_formacao_autor0"];
			$id_formacao_autor1 = $_POST["id_formacao_autor1"];
			$id_formacao_autor2 = $_POST["id_formacao_autor2"];
			$id_formacao_autor3 = $_POST["id_formacao_autor3"];
			$id_formacao_autor4 = $_POST["id_formacao_autor4"];
			$id_formacao_autor5 = $_POST["id_formacao_autor5"];
			$ids_formacao_autor = array($id_formacao_autor0, $id_formacao_autor1, $id_formacao_autor2, $id_formacao_autor3, $id_formacao_autor4, $id_formacao_autor5);

			$id_formacao_co_autor0 = $_POST["id_formacao_co_autor0"];
			$id_formacao_co_autor1 = $_POST["id_formacao_co_autor1"];
			$id_formacao_co_autor2 = $_POST["id_formacao_co_autor2"];
			$id_formacao_co_autor3 = $_POST["id_formacao_co_autor3"];
			$id_formacao_co_autor4 = $_POST["id_formacao_co_autor4"];
			$id_formacao_co_autor5 = $_POST["id_formacao_co_autor5"];
			$ids_formacao_co_autor = array($id_formacao_co_autor0, $id_formacao_co_autor1, $id_formacao_co_autor2, $id_formacao_co_autor3, $id_formacao_co_autor4, $id_formacao_co_autor5);

			$count_titulos = 0;
			foreach($titulos as $titulo){
				if(!empty($titulo)) $count_titulos++;
			}
			if($count_titulos<4) {$error[]="A quantidade mínima de trabalhos inscritos na Comunicação Coordenada deve ser quatro."; }
			/*
			print "<br>Titulos: <pre>";
				print_r($titulos);
			print "<br></pre>";
			print "<br>Ids autores: <pre>";
				print_r($ids_formacao_autor);
			print "<br></pre>";
			/**/
	
			/* Verificar trabalhos */
			for($i = 0; $i <= 5; $i++){
				$k = $i+1; // para exibir a numeração a partir do número 1
			
				if( !empty($titulos[$i]) ){
					if(empty($autores[$i])) {$error[]="Informe o nome do autor no Trabalho $k."; }
					if(empty($emails_autor[$i])) {$error[]="Informe o email do autor <b>$autores[$i]</b> no Trabalho $k."; }
					if(empty($ids_formacao_autor[$i])) {$error[]="Informe a formação do autor <b>$autores[$i]</b> no Trabalho $k."; }

					if(!empty($coautores[$i])) {
						if(empty($emails_coautor[$i])) {$error[]="Informe o email do co-autor <b>$coautores[$i]</b> no Trabalho $k."; }
						if(empty($ids_formacao_co_autor[$i])) {$error[]="Informe a formação do co-autor <b>$coautores[$i]</b> no Trabalho $k."; }
					}//if
					
					if(empty($resumos[$i])) {$error[]="Informe o resumo do Trabalho $k."; }
					if(empty($palavras[$i])) {$error[]="Informe as palavras-chave do Trabalho $k."; }
				}//if
			}//foreach

			if(sizeof($error)==0){
				$sql_insert = "insert into ev_comunicacao_coordenada(id_evento,id_coordenador,titulo_sessao,resumo_sessao,palavras_chave_sessao,id_linha_tematica, confirmado)
					       values('$id_evento','$id_participante','$titulo_sessao','$resumo_sessao','$palavras_sessao','$linha_tematica','nao');";	
				mysql_query($sql_insert, $conexao);
				$id_ultima_coordenada_inserida="";
				$id_ultima_coordenada_inserida=mysql_insert_id();
				//$registro_inserido=mysql_affected_rows();

				// Enviar email de confirmação de recebimento de proposta de trabalho
				if(!empty($id_ultima_coordenada_inserida)){
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo_sessao,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}//if
				
				//insere os trabalhos(resumos)
				$qtde_trab = 6;
				$array_trabalhos = array();
				$array_trabalhos = $_POST["titulo"];
				
				for($i=0; $i<$qtde_trab; $i++){		
					if (!empty($array_trabalhos[$i])){
						$titulo = special_ucwords($_POST['titulo'][$i]);
						$autor=addslashes($_POST['autor'][$i]);
						$email_autor = strtolower(addslashes( trim($_POST['email_autor'][$i]) ));
						$coautor=addslashes($_POST['coautor'][$i]);
						$email_coautor = strtolower(addslashes( trim($_POST['email_coautor'][$i]) ));
						$resumo=addslashes($_POST['resumo'][$i]);
						$palavras=addslashes($_POST['palavras'][$i]);			
						
						$id_autor=0;
						if ($email_autor!=""){
							$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_autor' AND id_evento='$id_evento'";
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado=mysql_num_rows($resultado_email);
							$ln=mysql_fetch_array($resultado_email);
							$id_autor=$ln['id'];//id_participante_autor							
							$nome_participante=$p['nome'];
							
							if ($id_autor!=$id_participante){
							
								if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio						
									//function
									envia_email_ja_cadastrado($email_autor, $autor, $nome_participante);
									
								}else{//insere o e-mail do autor no banco e manda o e-mail 
									$senha_random= rand(111111,999999);

									$id_formacao_autor = (int) addslashes($_POST["id_formacao_autor$i"]);
									// Caso eles deixem em branco a formação da pessoa, é melhor fazer isso:
									if(empty($id_formacao_autor)) $id_formacao_autor = 1; // setar como Doutor

									$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca, modalidade_participacao, id_formacao)
												   values('$id_evento','$autor','$email_autor','$senha_random','nao', 1, '$id_formacao_autor');";
									mysql_query($sql_insert, $conexao);	
									$id_autor=mysql_insert_id();	
	
									//function
									envia_email_nao_cadastrado($email_autor, $autor, $nome_participante, $senha_random);
							
								}// if email ja cadastrado
							}	
						}//if autor diferente vazio
						
						$id_coautor=0;
						if ($email_coautor!="") {
							$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_coautor' AND id_evento='$id_evento'";
							$resultado_email = mysql_query($sql_email);
							$email_ja_cadastrado=mysql_num_rows($resultado_email);
							$ln=mysql_fetch_array($resultado_email);
							$id_coautor=$ln['id'];
							$nome_participante=$p['nome'];
							
							if ($id_coautor!=$id_participante){
								if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio
									//function
									envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
								
								}else{//insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
									$senha_random= rand(111111,999999);

									$id_formacao_co_autor = (int) addslashes($_POST["id_formacao_co_autor$i"]);
									// Caso eles deixem em branco a formação da pessoa, é melhor fazer isso:
									if(empty($id_formacao_co_autor)) $id_formacao_co_autor = 1; // setar como Doutor

									$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca, modalidade_participacao, id_formacao)
												   values('$id_evento','$coautor','$email_coautor','$senha_random','nao', 1, '$id_formacao_co_autor');";
									mysql_query($sql_insert, $conexao);		
									$id_coautor=mysql_insert_id();		
									//function
									envia_email_nao_cadastrado($email_coautor, $coautor, $nome_participante, $senha_random);
								}// if email ja cadastrado
							}	
						 }//if coautor diferente de vazio
					
						$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
									   values('$id_evento','$linha_tematica','$id_trabalho','$id_ultima_coordenada_inserida','0','$titulo','$resumo','$palavras','$id_autor','$id_coautor','nao');";	
						mysql_query($sql_insert, $conexao);
						$registro_inserido=mysql_affected_rows();
						
					}//array 	
				}//for

			}
	
		}
		if ($id_trabalho==3){
			//print "individual";
			// TRATA OS ERROS NOS FORMULÁRIOS		
			if ($titulo==""){$error[]="Informe o título"; }
			if ($autor==""){$error[]="Informe o autor"; }
			if ($resumo==""){$error[]="Digite o resumo"; }
			if ($palavras==""){$error[]="Informe as palavras-chave"; }			
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			
			if(sizeof($error)==0){
			
				$id_coautor=0;
				if ($email_coautor!="") {
					$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_coautor' AND id_evento='$id_evento'";
					$resultado_email = mysql_query($sql_email);
					$email_ja_cadastrado=mysql_num_rows($resultado_email);
					$ln=mysql_fetch_array($resultado_email);
					$id_coautor=$ln['id'];
					$nome_participante=$p['nome'];

					if ($id_coautor!=$id_participante){					
						if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio
							//function
							envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
						}else{//insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
							$senha_random= rand(111111,999999);
							$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca)
										   values('$id_evento','$coautor','$email_coautor','$senha_random','nao');";	
							mysql_query($sql_insert, $conexao);		
							$id_coautor=mysql_insert_id();		
							//function
							envia_email_nao_cadastrado($email_coautor, $coautor, $nome_participante, $senha_random);
						}// if email ja cadastrado
					}
				 }//if coautor diferente de vazio
			
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
					       values('$id_evento','$linha_tematica','$id_trabalho','0','0','$titulo','$resumo','$palavras','$id_participante','$id_coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();

				// Enviar email de confirmação de recebimento de proposta de trabalho
				if($registro_inserido){
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}//if
			}//siz error
		}
		if ($id_trabalho==4){
			//print "poster";
			// TRATA OS ERROS NOS FORMULÁRIOS	
			if ($titulo==""){$error[]="Informe o título"; }
			if ($autor==""){$error[]="Informe o autor"; }
			if ($resumo==""){$error[]="Digite o resumo"; }
			if ($palavras==""){$error[]="Informe as palavras-chave"; }			
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			
			if(sizeof($error)==0){
				$id_coautor=0;
				if ($email_coautor!="") {
					$sql_email = "SELECT id,email FROM ev_participante WHERE email='$email_coautor' AND id_evento='$id_evento'";
					$resultado_email = mysql_query($sql_email);
					$email_ja_cadastrado=mysql_num_rows($resultado_email);
					$ln=mysql_fetch_array($resultado_email);
					$id_coautor=$ln['id'];
					$nome_participante=$p['nome'];
				
					if ($id_coautor!=$id_participante){
						if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no simposio
							//function
							envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
						}else{//insere o participante com uma senha defaut e-mail do autor no banco e manda o e-mail 
							$senha_random= rand(111111,999999);
							$sql_insert = "insert into ev_participante(id_evento,nome,email,senha,presenca)
										   values('$id_evento','$coautor','$email_coautor','$senha_random','nao');";	
							mysql_query($sql_insert, $conexao);		
							$id_coautor=mysql_insert_id();		
							//function
							envia_email_nao_cadastrado($email_coautor, $coautor, $nome_participante, $senha_random);
						}// if email ja cadastrado
					}	
				 }//if coautor diferente de vazio
			
				$sql_insert = "insert into ev_resumo(id_evento,id_linha_tematica,id_tipo_trabalho,id_comunicacao_coordenada,id_simposio,titulo,resumo,palavras_chave,autor,co_autor,confirmado)
					       values('$id_evento','$linha_tematica','$id_trabalho','0','0','$titulo','$resumo','$palavras','$id_participante','$id_coautor','nao');";	
				mysql_query($sql_insert, $conexao);
				$registro_inserido=mysql_affected_rows();

				// Enviar email de confirmação de recebimento de proposta de trabalho
				if($registro_inserido){
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}//if
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
<!--
<script type="text/javascript">
<!--
function CountCharacters(){
	//alert("dentro de CountCharacters");
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
<!--
</script>
-->
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
		
		if (($_POST["insert"] == "true") and (sizeof($error)== 0)){
		  //print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	  //print "Seu trabalho foi enviado com sucesso.<br />";
		  //print "</div> <br />";
		?>
		 <script>
		 alert("Seu trabalho foi enviado com sucesso.");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="trabalho.php" >
			 <?php 
             switch($id_trabalho){
                case 1: //simposio
                    require_once('formulario_simposio.php');
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
