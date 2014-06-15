<?php
	session_start();
	require_once("conexao.php");

	//define("ERR_LOGIN", "header('Location: error.php');");
	
	if($_POST["logar"]){
		$login = addslashes($_POST["login"]);
		$pass = addslashes($_POST["pass"]);
		$id_evento = addslashes($_POST["id_evento"]);
		$_SESSION["id_evento"] = $id_evento;
		
		if( ($login!="") && ($pass!="") ){
			$sql = "SELECT id,nome,email,senha FROM ev_participante WHERE email='$login' AND senha='$pass' AND id_evento='$id_evento'";
			$query = mysql_query($sql);
			$mostrar=mysql_fetch_array($query);
			$id_participante=$mostrar['id'];
			$nome_participante=$mostrar['nome'];			
		
			$registro = mysql_num_rows($query);

			if($registro>0){
				$_SESSION["login"] = $login;
				$_SESSION["pass"] = $pass;
				$_SESSION["id_evento"] = $id_evento;
				$_SESSION["id_participante"] = $id_participante;
				$_SESSION["nome_participante"] = mb_strtoupper($nome_participante);

				header("Location: principal.php");
				//processa_requisicao();
				
			}else  header('Location: error.php');
		}else  header('Location: error.php');
	}else{
		$login = $_SESSION["login"];
		$pass = $_SESSION["pass"];
		$id_evento = $_SESSION["id_evento"];
		$id_participante = $_SESSION["id_participante"];
		$nome_participante = $_SESSION["nome_participante"];
		
		if( isset($login) && isset($pass) ){
			
			header("Location: principal.php");
			
		}else header('Location: error.php');
	}
	
	if($_REQUEST["acao"]=="logout"){
		$id_evento=$_SESSION["id_evento"];
		$id_evento= base64_encode($id_evento);
		session_destroy();
		header("Location:index.php?acao=logout&id=".$id_evento."");
		//header("Location:index.php");
	}
?>