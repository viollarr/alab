<?php
	define( '_JEXEC', 1 );
 	define('JPATH_BASE', "../" );
 	define( 'DS', DIRECTORY_SEPARATOR );
	require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

	$mainframe = JFactory::getApplication('site');
	$user   = &JFactory::getUser();

	require_once("conexao.php");

	//define("ERR_LOGIN", "header('Location: error.php');");
	
	if($_POST["logar"]){
		$login = addslashes($_POST["login"]);
		$pass = addslashes($_POST["pass"]);
		$id_evento = addslashes($_POST["id_evento"]);
		$_SESSION["id_evento"] = $id_evento;
		
		
		if(($login!="") and ($pass!="")){
			$sql = "SELECT jos.id, jos.name, jos.email, jos.password, jos.cpf, jos.Passport FROM ev_participante ev, jos_users jos WHERE (jos.cpf = '$login' OR Passport = '$login') AND ev.id_associado_alab = jos.id AND ev.id_evento = $id_evento";
			$query = mysql_query($sql);
			$mostrar = mysql_fetch_array($query);
			$id_participante = $mostrar['id'];
			$nome_participante = $mostrar['name'];
					
			$registro = mysql_num_rows($query);

			if($registro>0){

				$senhaCripto = $mostrar['password'];

				if($senhaCripto)
				{
					$partes = explode( ':', $senhaCripto );
					$cripto = $partes[0];
					$sal = $partes[1];
				
				// Criar hash com a senha fornecida com o sal (se houver)
					$novoHash = ($sal) ? md5($pass.$sal) : md5($pass);
					if( $novoHash == $cripto ) {
						$_SESSION["login"] = $login;
						$_SESSION["pass"] = $pass;
						$_SESSION["id_evento"] = $id_evento;
						$_SESSION["id_participante"] = $id_participante;
						$_SESSION["nome_participante"] = mb_strtoupper($nome_participante);
						
						$user =& JUser::getInstance($id_participante);
						$_SESSION["user"] = $user;
						
						// Seleciono o tipo do evento para poder fazer o direcionamento para a pasta correta
						if($id_evento<=28){			
							$result = mysql_query("SELECT nome FROM ev_tipo_evento WHERE id = 
													(SELECT tipo_evento FROM jos_categories WHERE id = 
														(SELECT id_categ_joomla FROM ev_evento WHERE id = {$id_evento}))");
							$tipo_evento = mysql_result($result, 0);
		
							header("Location: {$tipo_evento}/principal.php");
							
						}
						else{
							header("Location: evento/principal.php");
						}
						// processa_requisicao();
					} else {
						if($id_evento<=28){	header("Location: {$tipo_evento}/error.php"); }
						else{header("Location: evento/error.php");}
					}
				} else {
					if($id_evento<=28){	header("Location: {$tipo_evento}/error.php"); }
					else{header("Location: evento/error.php");}
				}	
			}else{
				if($id_evento<=28){	header("Location: {$tipo_evento}/error.php"); }
				else{header("Location: evento/error.php");}
			}
		}else {
			if($id_evento<=28){	header("Location: {$tipo_evento}/error.php"); }
			else{header("Location: evento/error.php");}
		}
	}else{

		$login = $_SESSION["login"];
		$pass = $_SESSION["pass"];
		$id_evento = $_SESSION["id_evento"];
		$id_participante = $_SESSION["id_participante"];
		$nome_participante = $_SESSION["nome_participante"];
		
		
		if(isset($login) and isset($pass)){
			
			// Seleciono o tipo do evento para poder fazer o direcionamento para a pasta correta
			if($id_evento<=28){			
				$result = mysql_query("SELECT nome FROM ev_tipo_evento WHERE id = 
										(SELECT tipo_evento FROM jos_categories WHERE id = 
											(SELECT id_categ_joomla FROM ev_evento WHERE id = {$id_evento}))");
				$tipo_evento = mysql_result($result, 0);
				if ($_REQUEST["acao"] == "logout"){
					//$id_evento= base64_encode($id_evento);
					session_destroy();
					// Seleciono o tipo do evento para poder fazer o direcionamento para a pasta correta
					if($id_evento<=28){				
						$result = mysql_query("SELECT nome FROM ev_tipo_evento WHERE id = 
												(SELECT tipo_evento FROM jos_categories WHERE id = 
													(SELECT id_categ_joomla FROM ev_evento WHERE id = {$id_evento}))");
						$tipo_evento = mysql_result($result, 0);
						header("Location: {$tipo_evento}/index.php?acao=logout&id=".$id_evento);
						//header("Location:index.php");
					}
					else{
						header("Location: evento/index.php?acao=logout&id=".$id_evento);
					}
				}
				header("Location: {$tipo_evento}/principal.php");
			}
			else{
				if ($_REQUEST["acao"] == "logout"){
					//$id_evento= base64_encode($id_evento);
					session_destroy();
					// Seleciono o tipo do evento para poder fazer o direcionamento para a pasta correta
					if($id_evento<=28){				
						$result = mysql_query("SELECT nome FROM ev_tipo_evento WHERE id = 
												(SELECT tipo_evento FROM jos_categories WHERE id = 
													(SELECT id_categ_joomla FROM ev_evento WHERE id = {$id_evento}))");
						$tipo_evento = mysql_result($result, 0);
						header("Location: {$tipo_evento}/index.php?acao=logout&id=".$id_evento);
						//header("Location:index.php");
					}
					else{
						header("Location: evento/index.php?acao=logout&id=".$id_evento);
					}
				}
				//header("Location: evento/principal.php");
			}
			
		}else {
			if($id_evento<=28){	header("Location: {$tipo_evento}/error.php"); }
			else{header("Location: evento/error.php");}
		}
	}
	
?>