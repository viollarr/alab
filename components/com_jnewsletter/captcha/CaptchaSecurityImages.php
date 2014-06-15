<?php
putenv('GDFONTPATH=' . realpath('.'));
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/*
 * Created on 11 24, 09
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$width = isset($_GET['width']) ? $_GET['width'] : '60';
$height = isset($_GET['height']) ? $_GET['height'] : '30';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '5';
$esc = $_GET['esc'];
$encpwd=$_GET['encpwd'];

CaptchaSecurityImages($width,$height,$characters,$esc,$encpwd);

	function decryptData($encoded_text, $password) {
		if(empty($key)){
			$key='';
		}
	    $iv_size = mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $original = trim(mcrypt_decrypt(MCRYPT_XTEA, $key, base64_decode($encoded_text), MCRYPT_MODE_ECB, $iv), "\0");
	    return $original;
	  }

	function CaptchaSecurityImages($width,$height,$characters,$esc,$encpwd) {

		/* Decoding the security_code*/
    	$code = decryptData($esc, $encpwd);
		$font_size = $height * 0.80;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* set the colours */
   		$c1 = mt_rand(50,200); //r(ed)
     	$c2 = mt_rand(50,200); //g(reen)
     	$c3 = mt_rand(50,200); //b(lue)
     //test if we have used up palette
     if(imagecolorstotal($image)>=255) {
          //palette used up; pick closest assigned color
          $background_color = imagecolorallocate($image, $c1, $c2, $c3);
     } else {
          //palette NOT used up; assign new color
         $background_color = imagecolorallocate($image, $c1, $c2, $c3);
     }
		$text_color = imagecolorallocate($image, 0, 0, mt_rand(50,200));
		$noise_color = imagecolorallocate($image, 253, 250, 250);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* create textbox and add text */
	    $textbox = imagettfbbox($font_size, 0, "monofont.ttf", $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, "monofont.ttf" , $code) or die('Error in imagettftext function');
		/* output captcha image to browser */
    header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		//return true;
	}
?>