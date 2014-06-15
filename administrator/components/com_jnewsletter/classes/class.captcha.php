<?php
/*
 * Created on 11 24, 09
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

class captchajNewsletter{

 function encryptData($original_text, $password) {
 	if(empty($key)){//check if key is empty
 		$key='';
 	}
    $iv_size = mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $enc_base64 = base64_encode(mcrypt_encrypt(MCRYPT_XTEA, $key, $original_text, MCRYPT_MODE_ECB, $iv));

    return $enc_base64;
  }//endfunction

  function generateCode($characters) {
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) {
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}

		return $code;
	}//endfct

  function decryptData($encoded_text, $password) {
  	if(empty($key)){
			$key='';
	}
    $iv_size = mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $original = trim(mcrypt_decrypt(MCRYPT_XTEA, $key, base64_decode($encoded_text), MCRYPT_MODE_ECB, $iv), "\0");

    return $original;
  }

  /**
   * <p>Function to remove high/extented ascii characters. Example. A`,E:
   * @params string $string - the string to check and remove any high ascii
   * @author ijinfx
   */
  function removeHighASCII($string='') {

	//do nothing if empty
	if (empty($string)) return $string;

	//check if the string is in ASCII
	//if not in ASCII we detect the encoding and convert it to ASCII
	if (!mb_detect_encoding($string)) $string = mb_convert_encoding($string, 'ASCII', mb_detect_encoding($string));

  	$characters = str_split($string);
	$i = 0;
	foreach ($characters as $letter) {
		$i++;
		if ((ord($letter) > 31) && (ord($letter) < 127)) {
			$charArray[$i] = $letter;
		}//endif
	}//endforeach
	return trim(implode("", $charArray));
  }//endfct
}//endclass



