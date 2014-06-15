<?php
session_start();
if(  (!isset($_SESSION["id_participante"])) and (!isset($_SESSION["login"])) and (!isset($_SESSION["pass"])) and (!isset($_SESSION["id_evento"])) ) {//se foi inicializada a sessão

//!isset = se a sessão não foi setada
?>
<script>
		alert("É preciso estar logado na área do participante para acessar esta página.");
		window.top.location.href='index.php';
</script>
<?php
}
?>