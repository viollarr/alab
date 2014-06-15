<?php
/*
 Baseado em http://scriptbrasil.com.br/forum/index.php?showtopic=91367
 e http://www.dourado.net/2007/05/15/php-converter-string-para-maiuscula-ou-minuscula-com-acentos/
*/

function special_ucwords($string) {
	
	/***********************************************************************
	 * INFELIZMENTE ESTA FUNÇÃO NÃO FUNCIONOU BEM...                       *
	 * AS PALAVRAS COM 'Ç', POR EXEMPLO, NÃO COLOCARAM O 'Ç' EM MINÚSCULO. *
	 *                                                                     *
	 * COMENTADO POR DANIEL COSTA EM 10-10-2011                            *
	 ***********************************************************************/
	
	/**
	* @autor: Carlos Reche
	* @data: 08/09/2004
	*/

	/*	
	$retorno = array();
	$string = strtolower(trim(preg_replace("/\s+/", " ", $string)));
	$palavras = explode(" ", $string);
	
	$retorno[] = ucfirst($palavras[0]);
	unset($palavras[0]);
	
	
	$excecoes = array("da", "de", "do", "das", "dos", "em", "no", "na", "nos", "nas", "à", "às", "a", "e", "o", "as", "os", "ao", "para", "por", "pela", "com", "como", "se", "que", "é", "um", "uma", "sobre", "entre", "ou");
	$excecoes_maisculas = array("LM", "AD", "OESP", "LE", "PIBID", "FLE", "EAISA", "PCN", "MT", "UFPA", "TIC", "EaD", "Ead", "EAD", "CV", "PI");
	foreach ($palavras as $palavra){
		if ( !in_array($palavra, $excecoes) ){
			$palavra = ucfirst($palavra);
		}
		if ( in_array( strtoupper($palavra), $excecoes_maisculas) ){
			$palavra = strtoupper($palavra);
		}
		$retorno[] = $palavra;
	}
	
	// Acrescentado
	foreach ($retorno as $palavra){
		$retorno_aux[] = addslashes( trim($palavra) );
	}
	///////////////
	
	return implode(" ", $retorno_aux);
	*/
	
	return $string;
}
?>