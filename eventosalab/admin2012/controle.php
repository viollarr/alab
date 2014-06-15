<?php
	session_start();
	require_once("conexao.php");
	
	if($_POST["logar"]){
		$user = addslashes($_POST["username"]);
		$pass = addslashes($_POST["password"]);
		if( isset($user) && isset($pass) ){			
			$query = mysql_query("SELECT * FROM ev_usuarios WHERE login = '$user' AND senha = '$pass'");
			//if(($user=="admin" && $pass=="alabbienio0910") or ($user == "qp4" and $pass == "qp441301")){
			if (mysql_num_rows($query) > 0) {
				$usuario = mysql_fetch_assoc($query);
				$_SESSION["login"] = $user;
				$_SESSION["senha"] = $pass;
		
				if ($usuario["super"] == 1)
					$_SESSION["superusuario"] = 1;
				else 
				{
					$GLOBALS["id_evento_admin"] = $_SESSION["id_evento_admin"] = $usuario["id_evento"];
					// query para saber o tipo de evento
					$query = mysql_query("SELECT tipo_evento FROM jos_categories WHERE id = {$usuario["id_evento"]}");
					$_SESSION["tipo_evento"] = mysql_result($query, 0);
					
					if( $_SESSION["id_evento_admin"] <= 28){
						header("Location: ../admin/controle.php");
					}
				}
				
				processa_requisicao();
				//require_once("telas/tela.php");
			}else require_once("telas/err_login.php"); //echo ERR_LOGIN;
		}else require_once("telas/err_login.php"); //echo ERR_LOGIN;
	}elseif($_POST["sair"]){
		/* http://br.php.net/manual/pt_BR/function.session-destroy.php */
		// Initialize the session.
		// If you are using session_name("something"), don't forget it now!
		session_start();
		
		// Unset all of the session variables.
		$_SESSION = array();
		
		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// Finally, destroy the session.
		session_destroy();
		
		header("Location: index.php");
	}elseif($_POST["new"]){
		$user = $_SESSION["login"];
		$pass = $_SESSION["senha"];
		$super_usuario = $_SESSION["superusuario"];
		if( isset($user) && isset($pass) && isset($super_usuario) ){
			if($_POST['new']){
				$ctrl = addslashes($_GET["ctrl"]);
				$acao = addslashes($_GET["acao"]);
				processa_requisicao($ctrl, $acao);
			}else{
				require_once("telas/err_login.php");
			}
		}else require_once("telas/err_login.php"); //echo ERR_LOGIN;
		
	}else{
		$user = $_SESSION["login"];
		$pass = $_SESSION["senha"];
		if( isset($user) && isset($pass) ){
			//$GLOBALS["id_evento_admin"] = addslashes((int)$_GET["id_evento"]);
			if(isset($_GET["id_evento_admin"])){
				$_SESSION["id_evento_admin"] = addslashes((int)$_GET["id_evento_admin"]);
			if($id_evento_admin <= 28){
				if($_SESSION["id_evento_admin"] == 0){
					echo "<script>alert('Selecione o evento para poder prosseguir.')</script>";		
				}
				else{
					header("Location: ../admin/controle.php?id_evento_admin=".$_SESSION["id_evento_admin"]."");
				}
			}
				// query pra saber o tipo do evento
				//$query = mysql_query("SELECT tipo_evento FROM jos_categories WHERE id = {$_SESSION["id_evento_admin"]}");
				//$_SESSION["tipo_evento"] = mysql_result($query, 0);
			}
			
			$ctrl = addslashes($_GET["ctrl"]);
			$acao = addslashes($_GET["acao"]);
			
			if(empty($ctrl) && empty($acao)){
				$ctrl = addslashes($_POST["ctrl"]);
				$acao = addslashes($_POST["acao"]);
			}
			processa_requisicao($ctrl, $acao);
		}else require_once("telas/err_login.php"); //echo ERR_LOGIN;
	}
	
	function processa_requisicao($ctrl= NULL, $acao = NULL){
		if(!empty($ctrl) && !empty($acao)){
			require_once("controles/ctrl_generico.php");
			
			$nome_classe = "ctrl_".$ctrl;
			$uri_ctrl = "controles/" . $nome_classe . ".php";
			require_once($uri_ctrl);
			
		
			$controle = new $nome_classe;
			$view = $controle->$acao();
			
		}
		require_once("telas/tela.php");
	}
?>