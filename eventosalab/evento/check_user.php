<?php
session_start();
if(  (!isset($_SESSION["id_participante"])) and (!isset($_SESSION["login"])) and (!isset($_SESSION["pass"])) and (!isset($_SESSION["id_evento"])) ) {//se foi inicializada a sess�o

//!isset = se a sess�o n�o foi setada
?>
<script>
		alert("� preciso estar logado na �rea do participante para acessar esta p�gina.");
		window.top.location.href='index.php';
</script>
<?php
}
?>