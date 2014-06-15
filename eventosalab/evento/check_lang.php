<?php
session_start();

$idiomas_possiveis = array('en', 'pt');

if (isset($_GET['lang']) and in_array($_GET['lang'], $idiomas_possiveis))
	$_SESSION['lang'] = $_GET['lang'];
	
if (!isset($_SESSION['lang']))
	$_SESSION['lang'] = 'pt'; // define portugues como idioma padrão
	
function techo($portuguese_text, $english_text) {
	if ($_SESSION['lang'] == 'pt')
		echo $portuguese_text;
	else
		echo $english_text;
}

function stecho($portuguese_text, $english_text) {
	if ($_SESSION['lang'] == 'pt')
		return $portuguese_text;
	return $english_text;
}