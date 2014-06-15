<?php
require_once("../conexao.php");
require_once("../check_user.php");

$id_participante = (int) $_GET['id_participante'];
$valor = (float) $_GET['valor'];

mysql_query("UPDATE ev_pagamento SET valor = $valor, pago = 'sim' WHERE id_participante = $id_participante");
header("location: boleto.php");